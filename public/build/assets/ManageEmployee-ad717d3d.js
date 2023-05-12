import{H as g,W as r,I as B,g as d,o as R,c as V,h as e,w as a,a1 as b,a7 as E,e as n,k as v,t as S,ag as j,a2 as Y,J as Q,P as H,K as W,L as G,R as z,u as K,v as X,N as q,A as Z,M as ee}from"./toastservice.esm-55c6bc57.js";import{d as te,c as ae}from"./pinia-7d464185.js";import{T as oe,B as le,S as ne,b as se,a as ie}from"./styleclass.esm-d0955109.js";import"./blockui.esm-dfd3470d.js";import{a as re,s as de}from"./toast.esm-ed5ea1ae.js";import{D as ce}from"./dialogservice.esm-b0ef9e19.js";import{s as pe}from"./progressspinner.esm-3e903105.js";import{s as ue}from"./progressbar.esm-b0556340.js";import{s as me}from"./row.esm-6ebc942e.js";import{s as _e}from"./columngroup.esm-9dd1458e.js";import{s as ve}from"./calendar.esm-bc739ce3.js";import{s as fe}from"./textarea.esm-6a3ca6d3.js";import{s as ge}from"./chips.esm-4e8c1244.js";import{s as ye}from"./multiselect.esm-77e30b91.js";import{d as O}from"./dayjs.min-ed58423a.js";import{a as N}from"./index-f7a317fc.js";const U=te("manageEmployees",()=>{const L=g(),f=g(),i=g();async function u(){let p=window.location.origin+"/vmt-activeemployees-fetchall";console.log("AJAX URL : "+p),await N.get(p).then(m=>{L.value=m.data})}async function k(){let p=window.location.origin+"/vmt-yet-to-activeemployees-fetchall";console.log("AJAX URL : "+p),await N.get(p).then(m=>{console.log("Axios : "+m.data),f.value=m.data})}async function P(){let p=window.location.origin+"/vmt-exitemployees-fetchall";console.log("AJAX URL : "+p),await N.get(p).then(m=>{console.log("Axios : "+m.data),i.value=m.data})}return{array_active_employees:L,yet_to_active_employees_data:f,exit_employees_data:i,getActiveEmployees:u,ajax_yet_to_active_employees_data:k,ajax_exit_employees_data:P}});const he=n("h5",{style:{"text-align":"center"}},"Please wait...",-1),be={__name:"active_employees",setup(L){const f=U();let i=g(!0);const u=g({global:{value:null,matchMode:r.CONTAINS},emp_name:{value:null,matchMode:r.STARTS_WITH,matchMode:r.EQUALS,matchMode:r.CONTAINS},emp_code:{value:null,matchMode:r.STARTS_WITH,matchMode:r.EQUALS,matchMode:r.CONTAINS},status:{value:null,matchMode:r.EQUALS}});B(async()=>{await f.getActiveEmployees(),i.value=!1});function k(P){window.location.href="/pages-profile-new?uid="+P}return(P,p)=>{const m=d("ProgressSpinner"),_=d("Dialog"),y=d("InputText"),h=d("Column"),x=d("ProgressBar"),$=d("Button"),c=d("DataTable");return R(),V("div",null,[e(_,{header:"Header",visible:b(i),"onUpdate:visible":p[0]||(p[0]=t=>E(i)?i.value=t:i=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:a(()=>[e(m,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:a(()=>[he]),_:1},8,["visible"]),n("div",null,[e(c,{value:b(f).array_active_employees,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rowsPerPageOptions:[5,10,25],filters:u.value,"onUpdate:filters":p[1]||(p[1]=t=>u.value=t),filterDisplay:"menu",loading:b(i),globalFilterFields:["emp_name","emp_code","status"]},{empty:a(()=>[v(" No customers found.")]),loading:a(()=>[v(" Loading customers data. Please wait. ")]),default:a(()=>[e(h,{class:"font-bold",field:"emp_name",header:"Employee Name"},{body:a(t=>[v(S(t.data.emp_name),1)]),filter:a(({filterModel:t,filterCallback:A})=>[e(y,{modelValue:t.value,"onUpdate:modelValue":C=>t.value=C,onInput:C=>A(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(h,{field:"emp_code",header:"Employee Code"},{filter:a(({filterModel:t,filterCallback:A})=>[e(y,{modelValue:t.value,"onUpdate:modelValue":C=>t.value=C,onInput:C=>A(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(h,{field:"emp_designation",header:"Designation",style:{"min-width":"15rem"}}),e(h,{field:"l1_manager_name",header:"Reporting Manager"}),e(h,{field:"doj",header:"DOJ",style:{"min-width":"10rem"}},{body:a(t=>[v(S(b(O)(t.data.doj).format("DD-MMM-YYYY")),1)]),_:1}),e(h,{field:"blood_group_name",header:"Blood Group"}),e(h,{field:"profile_completeness",header:"Profile Completeness"},{body:a(t=>[e(x,{value:t.data.profile_completeness},null,8,["value"])]),_:1}),e(h,{field:"enc_user_id",header:"View Profile"},{body:a(t=>[e($,{icon:"pi pi-eye",severity:"success",label:"View",onClick:A=>k(t.data.enc_user_id),class:"btn btn-orange",style:{height:"2em"},raised:""},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters","loading"])])])}}};const we=n("h5",{style:{"text-align":"center"}},"Please wait...",-1),Se={class:"confirmation-content"},Pe=n("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),xe={key:0},Ce={key:1},Te={__name:"yet_to_active_employees",setup(L){const f=U();B(()=>{f.ajax_yet_to_active_employees_data()}),g();let i=g(!1),u=g(!1);j();const k=Y();function P(c){window.location.href="/pages-profile-new?uid="+c}const p=g({global:{value:null,matchMode:r.CONTAINS},emp_name:{value:null,matchMode:r.STARTS_WITH,matchMode:r.EQUALS,matchMode:r.CONTAINS},emp_code:{value:null,matchMode:r.STARTS_WITH,matchMode:r.EQUALS,matchMode:r.CONTAINS},status:{value:null,matchMode:r.EQUALS}});g(["Pending","Approved","Rejected"]);let m=null,_=null;function y(c,t){c.emp_code,c.emp_status,console.log(U.emp_status),console.log(c.emp_status),i.value=!0,m=t,_=c,console.log("Selected Row Data : "+JSON.stringify(c))}function h(c){i.value=!1,c&&x()}function x(){m="",_=null}function $(){h(!1),u.value=!0,console.log("Processing Rowdata : "+JSON.stringify(_)),N.post(window.location.origin+"/onboarding/updateEmployeeActive",{user_code:_.emp_code,active_status:1}).then(c=>{console.log("Response : "+c),k.add({severity:"success",summary:"Activated",detail:`${_.emp_name} Activated Successfully`,life:3e3}),x()}).catch(c=>{u.value=!1,x()}).finally(()=>{f.ajax_yet_to_active_employees_data(),f.getActiveEmployees(),u.value=!1})}return(c,t)=>{const A=d("Toast"),C=d("ProgressSpinner"),s=d("Dialog"),T=d("Button"),D=d("InputText"),w=d("Column"),F=d("ProgressBar"),J=d("DataTable");return R(),V("div",null,[e(A),e(s,{header:"Header",visible:b(u),"onUpdate:visible":t[0]||(t[0]=o=>E(u)?u.value=o:u=o),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:a(()=>[e(C,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:a(()=>[we]),_:1},8,["visible"]),e(s,{header:"Confirmation",visible:b(i),"onUpdate:visible":t[3]||(t[3]=o=>E(i)?i.value=o:i=o),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:a(()=>[e(T,{label:"Yes",icon:"pi pi-check",onClick:t[1]||(t[1]=o=>$()),class:"p-button-text",autofocus:""}),e(T,{label:"No",icon:"pi pi-times",onClick:t[2]||(t[2]=o=>h(!0)),class:"p-button-text"})]),default:a(()=>[n("div",Se,[Pe,n("span",null,"Are you sure you want to "+S(b(m))+"?",1)])]),_:1},8,["visible"]),n("div",null,[e(J,{value:b(f).yet_to_active_employees_data,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rowsPerPageOptions:[5,10,25],filters:p.value,"onUpdate:filters":t[4]||(t[4]=o=>p.value=o),filterDisplay:"menu",loading:c.loading2,globalFilterFields:["emp_name","emp_code","status"]},{empty:a(()=>[v(" No customers found. ")]),loading:a(()=>[v(" Loading customers data. Please wait. ")]),default:a(()=>[e(w,{class:"font-bold",field:"emp_name",header:"Employee Name"},{body:a(o=>[v(S(o.data.emp_name),1)]),filter:a(({filterModel:o,filterCallback:M})=>[e(D,{modelValue:o.value,"onUpdate:modelValue":I=>o.value=I,onInput:I=>M(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(w,{field:"emp_code",header:"Employee Code"},{body:a(o=>[v(S(o.data.emp_code),1)]),filter:a(({filterModel:o,filterCallback:M})=>[e(D,{modelValue:o.value,"onUpdate:modelValue":I=>o.value=I,onInput:I=>M(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(w,{field:"emp_designation",header:"Designation",style:{"min-width":"15rem"}}),e(w,{field:"reporting_manager_name",header:"Reporting Manager"}),e(w,{field:"doj",header:"DOJ",style:{"min-width":"10rem"}},{body:a(o=>[v(S(b(O)(o.data.doj).format("DD-MMM-YYYY")),1)]),_:1}),e(w,{field:"blood_group_name",header:"Blood Group"}),e(w,{field:"profile_completeness",header:"Profile Completeness"},{body:a(o=>[e(F,{value:o.data.profile_completeness},null,8,["value"])]),_:1}),e(w,{field:"is_onboarded",header:"Onboarding Status"},{body:a(o=>[v(S(o.data.is_onboarded?"Completed":"Pending"),1)]),_:1}),e(w,{field:"doc_status",header:"Docs Approval Status"},{body:a(o=>[v(S(o.data.is_onboarded&&o.data.doc_status?"Approved":"Pending"),1)]),_:1}),e(w,{field:"enc_user_id",header:"View Profile"},{body:a(o=>[e(T,{icon:"pi pi-eye",severity:"success",label:"View",onClick:M=>P(o.data.enc_user_id),class:"btn btn-orange",style:{height:"2em"},raised:""},null,8,["onClick"])]),_:1}),e(w,{style:{width:"300px"},field:"",header:"Action"},{body:a(o=>[o.data.is_onboarded&&o.data.doc_status?(R(),V("div",xe,[e(T,{icon:"pi pi-check-circle",severity:"success",label:"Activate",class:"p-button-success Button",onClick:M=>y(o.data,"Active"),style:{height:"2em"}},null,8,["onClick"])])):(R(),V("div",Ce))]),_:1})]),_:1},8,["value","filters","loading"])])])}}};const Ae={class:"confirmation-content"},De=n("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),ke={__name:"exit_employees",setup(L){const f=U();B(()=>{f.ajax_exit_employees_data()}),g();let i=g(!1),u=g(!1);j();const k=Y(),P=g({global:{value:null,matchMode:r.CONTAINS},employee_name:{value:null,matchMode:r.STARTS_WITH,matchMode:r.EQUALS,matchMode:r.CONTAINS},status:{value:null,matchMode:r.EQUALS},status:{value:null,matchMode:r.EQUALS}});function p(_){window.location.href="/pages-profile-new?uid="+_}function m(){hideConfirmDialog(!1),u.value=!0,console.log("Processing Rowdata : "+JSON.stringify(currentlySelectedRowData)),N.post(window.location.origin+"/attendance-regularization-approvals",{id:currentlySelectedRowData.id,status:currentlySelectedStatus=="Approve"?"Approved":currentlySelectedStatus=="Reject"?"Rejected":currentlySelectedStatus,status_text:""}).then(_=>{console.log("Response : "+_),u.value=!1,k.add({severity:"success",summary:"Info",detail:"Success",life:3e3}),ajax_GetAttRegularizationData(),resetVars()}).catch(_=>{u.value=!1,resetVars()})}return(_,y)=>{const h=d("Toast"),x=d("Button"),$=d("Dialog"),c=d("InputText"),t=d("Column"),A=d("ProgressBar"),C=d("DataTable");return R(),V("div",null,[e(h),e($,{header:"Confirmation",visible:b(i),"onUpdate:visible":y[2]||(y[2]=s=>E(i)?i.value=s:i=s),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:a(()=>[e(x,{label:"Yes",icon:"pi pi-check",onClick:y[0]||(y[0]=s=>m()),class:"p-button-text",autofocus:""}),e(x,{label:"No",icon:"pi pi-times",onClick:y[1]||(y[1]=s=>_.hideConfirmDialog(!0)),class:"p-button-text"})]),default:a(()=>[n("div",Ae,[De,n("span",null,"Are you sure you want to "+S(_.currentlySelectedStatus)+"?",1)])]),_:1},8,["visible"]),n("div",null,[e(C,{value:b(f).exit_employees_data,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rowsPerPageOptions:[5,10,25],filters:P.value,"onUpdate:filters":y[3]||(y[3]=s=>P.value=s),filterDisplay:"menu",loading:b(u),globalFilterFields:["emp_name","emp_code","status"]},{empty:a(()=>[v(" No customers found.")]),loading:a(()=>[v(" Loading customers data. Please wait. ")]),default:a(()=>[e(t,{class:"font-bold",field:"emp_name",header:"Employee Name"},{body:a(s=>[v(S(s.data.emp_name),1)]),filter:a(({filterModel:s,filterCallback:T})=>[e(c,{modelValue:s.value,"onUpdate:modelValue":D=>s.value=D,onInput:D=>T(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(t,{field:"emp_code",header:"Employee Code"},{filter:a(({filterModel:s,filterCallback:T})=>[e(c,{modelValue:s.value,"onUpdate:modelValue":D=>s.value=D,onInput:D=>T(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(t,{field:"emp_designation",header:"Designation",style:{"min-width":"15rem"}}),e(t,{field:"l1_manager_name",header:"Reporting Manager"}),e(t,{field:"doj",header:"DOJ",style:{"min-width":"10rem"}},{body:a(s=>[v(S(b(O)(s.data.doj).format("DD-MMM-YYYY")),1)]),_:1}),e(t,{field:"blood_group_name",header:"Blood Group"}),e(t,{field:"profile_completeness",header:"Profile Completeness"},{body:a(s=>[e(A,{value:s.data.profile_completeness},null,8,["value"])]),_:1}),e(t,{field:"enc_user_id",header:"View Profile"},{body:a(s=>[e(x,{icon:"pi pi-eye",severity:"success",label:"View",onClick:T=>p(s.data.enc_user_id),class:"btn btn-orange",style:{height:"2em"},raised:""},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters","loading"])])])}}};const Le={class:"manage_employee-wrapper mt-30"},Re=n("div",{class:"mb-2 card left-line"},[n("div",{class:"pt-1 pb-0 card-body"},[n("ul",{class:"nav nav-pills nav-tabs-dashed",role:"tablist"},[n("li",{class:"nav-item text-muted",role:"presentation"},[n("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#active_employees","aria-selected":"true",role:"tab"}," Active Employees ")]),n("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[n("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#not_active_employees","aria-selected":"true",role:"tab"}," Yet To Active Employees ")]),n("li",{class:"nav-item text-muted",role:"presentation"},[n("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#exit_employees","aria-selected":"true",role:"tab"}," Exit Employee ")])])])],-1),Ve={class:"card"},$e={class:"card-body"},Me={class:"tab-content",id:"pills-tabContent"},Ie={class:"tab-pane show fade active",id:"active_employees",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Ne={class:"tab-pane fade",id:"not_active_employees",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Ee={class:"tab-pane fade",id:"exit_employees",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Ue={__name:"ManageEmployee",setup(L){return(f,i)=>(R(),V("div",Le,[Re,n("div",Ve,[n("div",$e,[n("div",Me,[n("div",Ie,[e(be)]),n("div",Ne,[e(Te)]),n("div",Ee,[e(ke)])])])])]))}},l=Q(Ue),Be=ae();l.use(H,{ripple:!0});l.use(W);l.use(G);l.use(ce);l.use(Be);l.directive("tooltip",oe);l.directive("badge",le);l.directive("ripple",z);l.directive("styleclass",ne);l.directive("focustrap",K);l.component("Button",X);l.component("DataTable",se);l.component("Column",ie);l.component("ColumnGroup",_e);l.component("Row",me);l.component("Toast",re);l.component("ConfirmDialog",de);l.component("Dropdown",q);l.component("InputText",Z);l.component("Dialog",ee);l.component("ProgressSpinner",pe);l.component("Calendar",ve);l.component("Textarea",fe);l.component("Chips",ge);l.component("MultiSelect",ye);l.component("ProgressBar",ue);l.mount("#vjs_manage_employee");