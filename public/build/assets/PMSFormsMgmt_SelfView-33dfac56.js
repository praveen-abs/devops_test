import{B as u,E as h,c as w,h as o,w as i,e as l,W as y,g as n,o as b,t as f,j as m,G as C,P,H as D,R as M,q as T}from"./toastservice.esm-c4f6de4c.js";import{T as k,B as F,S as $,b as L,a as N}from"./styleclass.esm-ea560a03.js";import"./blockui.esm-85692cd0.js";import{C as A,F as B,b as x,s as R,a as V}from"./inputtext.esm-5faf66bf.js";import{s as E}from"./confirmdialog.esm-51539a4d.js";import{D as I}from"./dialogservice.esm-b46cc252.js";import{s as U}from"./toast.esm-8d255b70.js";import{s as H}from"./progressspinner.esm-455f2fd3.js";import{s as O}from"./row.esm-6ebc942e.js";import{s as W}from"./columngroup.esm-9dd1458e.js";import{u as j}from"./PMSFormsMgmtService-fff73572.js";import"./pinia-0f325ab3.js";import"./index-f7a317fc.js";import"./Service-72c2c125.js";const G=l("h5",{style:{"text-align":"center"}},"Please wait...",-1),Y={class:"confirmation-content"},q=l("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),z={__name:"PMSFormsMgmt_SelfView",setup(J){const g=j(),c=u({global:{value:null,matchMode:FilterMatchMode.CONTAINS},employee_name:{value:null,matchMode:FilterMatchMode.STARTS_WITH,matchMode:FilterMatchMode.EQUALS,matchMode:FilterMatchMode.CONTAINS}});return u(),h(()=>{}),(s,a)=>{const v=n("Toast"),S=n("ProgressSpinner"),d=n("Dialog"),p=n("Button"),r=n("Column"),_=n("DataTable");return b(),w("div",null,[o(v),o(d,{header:"Header",visible:s.canShowLoadingScreen,"onUpdate:visible":a[0]||(a[0]=t=>s.canShowLoadingScreen=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:i(()=>[o(S,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:i(()=>[G]),_:1},8,["visible"]),o(d,{header:"Confirmation",visible:s.canShowConfirmation,"onUpdate:visible":a[3]||(a[3]=t=>s.canShowConfirmation=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:i(()=>[o(p,{label:"Yes",icon:"pi pi-check",onClick:a[1]||(a[1]=t=>s.processApproveReject()),class:"p-button-text",autofocus:""}),o(p,{label:"No",icon:"pi pi-times",onClick:a[2]||(a[2]=t=>s.hideConfirmDialog(!0)),class:"p-button-text"})]),default:i(()=>[l("div",Y,[q,l("span",null,"Are you sure you want to "+f(s.currentlySelectedStatus)+"?",1)])]),_:1},8,["visible"]),l("div",null,[o(_,{value:y(g).array_single_employees_list,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:c.value,"onUpdate:filters":a[4]||(a[4]=t=>c.value=t),filterDisplay:"menu",loading:s.loading2,globalFilterFields:["name","status"]},{empty:i(()=>[m(" No Employee found ")]),loading:i(()=>[m(" Loading customers data. Please wait. ")]),default:i(()=>[o(r,{field:"form_name",header:"Form Name"},{body:i(t=>[m(f(t.data.form_name),1)]),_:1}),o(r,{field:"calendar_type",header:"Calendar Type"}),o(r,{field:"year",header:"Year"}),o(r,{field:"assignment_period",header:"Date",sortable:!0}),o(r,{style:{width:"300px"},field:"",header:"Action"},{body:i(t=>[o(p,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approval",onClick:K=>s.showConfirmDialog(t.data,"Approve"),style:{height:"2em"}},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters","loading"])])])}}},e=C(z);e.use(P,{ripple:!0});e.use(A);e.use(D);e.use(I);e.directive("tooltip",k);e.directive("badge",F);e.directive("ripple",M);e.directive("styleclass",$);e.directive("focustrap",B);e.component("Button",T);e.component("DataTable",L);e.component("Column",N);e.component("ColumnGroup",W);e.component("Row",O);e.component("Toast",U);e.component("ConfirmDialog",E);e.component("Dropdown",x);e.component("InputText",R);e.component("Dialog",V);e.component("ProgressSpinner",H);e.mount("#VJS_PMSFormsMgmt_SelfView");
