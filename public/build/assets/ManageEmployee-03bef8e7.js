import{B as v,K as p,E as D,g as d,o as C,c as T,h as o,w as s,V as b,a1 as $,e as a,j as u,t as w,G as E,P as M,H as L,R as V,q as k}from"./toastservice.esm-be32db1e.js";import{d as R,c as B}from"./pinia-7c782b8f.js";import{T as I,B as N,S as U,b as j,a as F}from"./styleclass.esm-ba8fdf63.js";import"./blockui.esm-dd521861.js";import{C as O,F as Y,b as H,s as J,a as G}from"./inputtext.esm-e9caa4ce.js";import{s as Q}from"./confirmdialog.esm-bc3d19a4.js";import{D as W}from"./dialogservice.esm-7f45f84c.js";import{s as X}from"./toast.esm-798d9fce.js";import{s as K}from"./progressspinner.esm-08c4bf67.js";import{s as q}from"./progressbar.esm-512dbc2d.js";import{s as z}from"./row.esm-6ebc942e.js";import{s as Z}from"./columngroup.esm-9dd1458e.js";import{s as ee}from"./calendar.esm-edf22c1b.js";import{s as te}from"./textarea.esm-36055c89.js";import{s as ae}from"./chips.esm-727e3d13.js";import{s as oe}from"./multiselect.esm-93c336fb.js";import{d as se}from"./dayjs.min-ed58423a.js";import{a as x}from"./index-f7a317fc.js";const le=R("manageEmployees",()=>{const f=v(),c=v(),l=v();async function y(){let n=window.location.origin+"/vmt-activeemployees-fetchall";console.log("AJAX URL : "+n),await x.get(n).then(i=>{f.value=i.data})}async function h(){let n=window.location.origin+"/vmt-yet-to-activeemployees-fetchall";console.log("AJAX URL : "+n),await x.get(n).then(i=>{console.log("Axios : "+i.data),c.value=i.data})}async function m(){let n=window.location.origin+"/vmt-exitemployees-fetchall";console.log("AJAX URL : "+n),await x.get(n).then(i=>{console.log("Axios : "+i.data),l.value=i.data})}return{array_active_employees:f,yet_to_active_employees_data:c,exit_employees_data:l,getActiveEmployees:y,ajax_yet_to_active_employees_data:h,ajax_exit_employees_data:m}});const ne=a("h5",{style:{"text-align":"center"}},"Please wait...",-1),ie={__name:"active_employees",setup(f){const c=le();let l=v(!0);const y=v({global:{value:null,matchMode:p.CONTAINS},emp_name:{value:null,matchMode:p.STARTS_WITH,matchMode:p.EQUALS,matchMode:p.CONTAINS},emp_code:{value:null,matchMode:p.STARTS_WITH,matchMode:p.EQUALS,matchMode:p.CONTAINS},status:{value:null,matchMode:p.EQUALS}});return D(async()=>{await c.getActiveEmployees(),l.value=!1}),(h,m)=>{const n=d("ProgressSpinner"),i=d("Dialog"),S=d("InputText"),r=d("Column"),A=d("Button"),P=d("DataTable");return C(),T("div",null,[o(i,{header:"Header",visible:b(l),"onUpdate:visible":m[0]||(m[0]=t=>$(l)?l.value=t:l=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[o(n,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[ne]),_:1},8,["visible"]),a("div",null,[o(P,{value:b(c).array_active_employees,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:y.value,"onUpdate:filters":m[1]||(m[1]=t=>y.value=t),filterDisplay:"menu",loading:b(l),globalFilterFields:["emp_name","emp_code","status"]},{empty:s(()=>[u(" No customers found.")]),loading:s(()=>[u(" Loading customers data. Please wait. ")]),default:s(()=>[o(r,{field:"emp_name",header:"Employee Name"},{body:s(t=>[u(w(t.data.emp_name),1)]),filter:s(({filterModel:t,filterCallback:g})=>[o(S,{modelValue:t.value,"onUpdate:modelValue":_=>t.value=_,onInput:_=>g(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),o(r,{field:"emp_code",header:"Employee Code"},{filter:s(({filterModel:t,filterCallback:g})=>[o(S,{modelValue:t.value,"onUpdate:modelValue":_=>t.value=_,onInput:_=>g(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),o(r,{field:"emp_designation",header:"Designation"}),o(r,{field:"l1_manager_name",header:"Reporting Manager"}),o(r,{field:"doj",header:"DOJ"},{body:s(t=>[u(w(b(se)(t.data.doj).format("DD-MMM-YYYY")),1)]),_:1}),o(r,{field:"blood_group_name",header:"Blood Group"}),o(r,{field:"profile_completeness",header:"Profile Completeness"},{body:s(t=>[u(w(t.data.profile_completeness+"%"),1)]),_:1}),o(r,{style:{width:"300px"},field:"",header:"View Profile"},{body:s(t=>[o(A,{type:"button",icon:"pi pi-eye",class:"p-button-secondary Button",label:"View",onClick:g=>h.showConfirmDialog(t.data,"Approve"),style:{height:"2em"},text:"",raised:""},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters","loading"])])])}}};const re={class:"manage_employee-wrapper mt-30"},pe=a("div",{class:"mb-2 card left-line"},[a("div",{class:"pt-1 pb-0 card-body"},[a("ul",{class:"nav nav-pills nav-tabs-dashed",role:"tablist"},[a("li",{class:"nav-item text-muted",role:"presentation"},[a("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#active_employees","aria-selected":"true",role:"tab"}," Active Employees ")]),a("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[a("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#not_active_employees","aria-selected":"true",role:"tab"}," Yet To Active Employees ")]),a("li",{class:"nav-item text-muted",role:"presentation"},[a("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#exit_employees","aria-selected":"true",role:"tab"}," Exit Employee ")])])])],-1),ce={class:"card"},me={class:"card-body"},de={class:"tab-content",id:"pills-tabContent"},_e={class:"tab-pane show fade active",id:"active_employees",role:"tabpanel","aria-labelledby":"pills-profile-tab"},ue=a("div",{class:"tab-pane fade",id:"not_active_employees",role:"tabpanel","aria-labelledby":"pills-profile-tab"},null,-1),ve=a("div",{class:"tab-pane fade",id:"exit_employees",role:"tabpanel","aria-labelledby":"pills-profile-tab"},null,-1),fe={__name:"ManageEmployee",setup(f){return(c,l)=>(C(),T("div",re,[pe,a("div",ce,[a("div",me,[a("div",de,[a("div",_e,[o(ie)]),ue,ve])])])]))}},e=E(fe),ye=B();e.use(M,{ripple:!0});e.use(O);e.use(L);e.use(W);e.use(ye);e.directive("tooltip",I);e.directive("badge",N);e.directive("ripple",V);e.directive("styleclass",U);e.directive("focustrap",Y);e.component("Button",k);e.component("DataTable",j);e.component("Column",F);e.component("ColumnGroup",Z);e.component("Row",z);e.component("Toast",X);e.component("ConfirmDialog",Q);e.component("Dropdown",H);e.component("InputText",J);e.component("Dialog",G);e.component("ProgressSpinner",K);e.component("Calendar",ee);e.component("Textarea",te);e.component("Chips",ae);e.component("MultiSelect",oe);e.component("ProgressBar",q);e.mount("#vjs_manage_employee");
