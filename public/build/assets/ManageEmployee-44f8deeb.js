import{X as B,B as _,E as M,K as y,g as c,o as O,c as I,h as e,w as a,V as w,a1 as U,e as s,t as V,j as S,a as H,G as W,P as G,H as Q,R as X,q as K}from"./toastservice.esm-be32db1e.js";import{d as Y,c as q}from"./pinia-7c782b8f.js";import{T as Z,B as ee,S as te,b as oe,a as ae}from"./styleclass.esm-ba8fdf63.js";import"./blockui.esm-dd521861.js";import{u as J,C as le,F as se,b as ne,s as ie,a as re}from"./inputtext.esm-e9caa4ce.js";import{s as pe}from"./confirmdialog.esm-bc3d19a4.js";import{D as de}from"./dialogservice.esm-7f45f84c.js";import{s as ce}from"./toast.esm-798d9fce.js";import{s as ue}from"./progressspinner.esm-08c4bf67.js";import{s as me}from"./progressbar.esm-512dbc2d.js";import{s as ve}from"./row.esm-6ebc942e.js";import{s as fe}from"./columngroup.esm-9dd1458e.js";import{s as ge}from"./calendar.esm-edf22c1b.js";import{s as _e}from"./textarea.esm-36055c89.js";import{s as ye}from"./chips.esm-727e3d13.js";import{s as he}from"./multiselect.esm-93c336fb.js";import{a as k}from"./index-f7a317fc.js";import"./moment-fbc5633a.js";const z=Y("Service",()=>{B();const L=_(),b=_(),h=_();return{active_employees_data:L,yet_to_active_employees_data:b,exit_employees_data:h,ajax_active_employees_data:()=>{let u=window.location.origin+"/vmt-activeemployees-fetchall";console.log("AJAX URL : "+u),k.get(u).then(n=>{console.log("Axios : "+n.data),L.value=n.data})},ajax_yet_to_active_employees_data:()=>{let u=window.location.origin+"/vmt-yet-to-activeemployees-fetchall";console.log("AJAX URL : "+u),k.get(u).then(n=>{console.log("Axios : "+n.data),b.value=n.data})},ajax_exit_employees_data:()=>{let u=window.location.origin+"/vmt-exitemployees-fetchall";console.log("AJAX URL : "+u),k.get(u).then(n=>{console.log("Axios : "+n.data),h.value=n.data})}}});const be=s("h5",{style:{"text-align":"center"}},"Please wait...",-1),we=s("h5",{style:{"text-align":"center"}},"Please wait...",-1),xe={class:"confirmation-content"},Se=s("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Ce={__name:"active_employees",setup(L){const b=z();M(()=>{b.ajax_active_employees_data()});let h=_(!1),d=_(!1);J();const v=B(),R=_({global:{value:null,matchMode:y.CONTAINS},employee_name:{value:null,matchMode:y.STARTS_WITH,matchMode:y.EQUALS,matchMode:y.CONTAINS},status:{value:null,matchMode:y.EQUALS}});_(["Pending","Approved","Rejected"]);let u=null,n=null;function x(m,f){h.value=!0,u=f,n=m,console.log("Selected Row Data : "+JSON.stringify(m))}function $(m){h.value=!1,m&&A()}function A(){u="",n=null}function D(){$(!1),d.value=!0,console.log("Processing Rowdata : "+JSON.stringify(n)),k.post(window.location.origin+"/attendance-regularization-approvals",{id:n.id,status:u=="Approve"?"Approved":u=="Reject"?"Rejected":u,status_text:""}).then(m=>{console.log("Response : "+m),d.value=!1,v.add({severity:"success",summary:"Info",detail:"Success",life:3e3}),ajax_GetAttRegularizationData(),A()}).catch(m=>{d.value=!1,A(),console.log(m.toJSON())})}return(m,f)=>{const l=c("Toast"),o=c("ProgressSpinner"),T=c("Dialog"),C=c("Button"),P=c("InputText"),g=c("Column"),E=c("DataTable");return O(),I("div",null,[e(l),e(T,{header:"Header",visible:m.loading,"onUpdate:visible":f[0]||(f[0]=t=>m.loading=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:a(()=>[e(o,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:a(()=>[be]),_:1},8,["visible"]),e(T,{header:"Header",visible:w(d),"onUpdate:visible":f[1]||(f[1]=t=>U(d)?d.value=t:d=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:a(()=>[e(o,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:a(()=>[we]),_:1},8,["visible"]),e(T,{header:"Confirmation",visible:w(h),"onUpdate:visible":f[4]||(f[4]=t=>U(h)?h.value=t:h=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:a(()=>[e(C,{label:"Yes",icon:"pi pi-check",onClick:f[2]||(f[2]=t=>D()),class:"p-button-text",autofocus:""}),e(C,{label:"No",icon:"pi pi-times",onClick:f[3]||(f[3]=t=>$(!0)),class:"p-button-text"})]),default:a(()=>[s("div",xe,[Se,s("span",null,"Are you sure you want to "+V(w(u))+"?",1)])]),_:1},8,["visible"]),s("div",null,[e(E,{value:w(b).active_employees_data,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:R.value,"onUpdate:filters":f[5]||(f[5]=t=>R.value=t),filterDisplay:"menu",loading:m.loading2,globalFilterFields:["name","status"]},{empty:a(()=>[S(" No customers found. ")]),loading:a(()=>[S(" Loading customers data. Please wait. ")]),default:a(()=>[S(),S(),e(g,{field:"employee_name",header:"Employee Name"},{body:a(t=>[S(V(t.data.employee_name),1)]),filter:a(({filterModel:t,filterCallback:N})=>[e(P,{modelValue:t.value,"onUpdate:modelValue":p=>t.value=p,onInput:p=>N(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(g,{field:"employee_code",header:"Employee Code",sortable:!0}),e(g,{field:"designation",header:"Designation"}),e(g,{field:"l1_manager",header:"Reporting Manager"}),e(g,{field:"doj",header:"DOJ"}),e(g,{field:"blood_group",header:"Blood Group"}),e(g,{field:"com",header:"Profile Completeness"}),e(g,{style:{width:"300px"},field:"",header:"View Profile"},{body:a(t=>[e(C,{type:"button",icon:"pi pi-eye",class:"p-button-secondary Button",label:"View",onClick:N=>x(t.data,"Approve"),style:{height:"2em"},text:"",raised:""},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters","loading"])])])}}};const Pe=s("h5",{style:{"text-align":"center"}},"Please wait...",-1),Ae=s("h5",{style:{"text-align":"center"}},"Please wait...",-1),ke={class:"confirmation-content"},Re=s("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),De={key:0},Te={__name:"yet_to_active_employees",setup(L){const b=z();M(()=>{b.ajax_yet_to_active_employees_data()});let h=_(),d=_(!1),v=_(!1);J();const R=B(),u=_({global:{value:null,matchMode:y.CONTAINS},employee_name:{value:null,matchMode:y.STARTS_WITH,matchMode:y.EQUALS,matchMode:y.CONTAINS},status:{value:null,matchMode:y.EQUALS}});_(["Pending","Approved","Rejected"]);let n=null,x=null;function $(){let l=window.location.origin+"/fetch-att-regularization-data";console.log("AJAX URL : "+l),k.get(l).then(o=>{console.log("Axios : "+o.data),h.value=o.data,loading.value=!1})}function A(l,o){d.value=!0,n=o,x=l,console.log("Selected Row Data : "+JSON.stringify(l))}function D(l){d.value=!1,l&&m()}function m(){n="",x=null}function f(){D(!1),v.value=!0,console.log("Processing Rowdata : "+JSON.stringify(x)),k.post(window.location.origin+"/attendance-regularization-approvals",{id:x.id,status:n=="Approve"?"Approved":n=="Reject"?"Rejected":n,status_text:""}).then(l=>{console.log("Response : "+l),v.value=!1,R.add({severity:"success",summary:"Info",detail:"Success",life:3e3}),$(),m()}).catch(l=>{v.value=!1,m(),console.log(l.toJSON())})}return(l,o)=>{const T=c("Toast"),C=c("ProgressSpinner"),P=c("Dialog"),g=c("Button"),E=c("InputText"),t=c("Column"),N=c("ProgressBar"),p=c("DataTable");return O(),I("div",null,[e(T),e(P,{header:"Header",visible:l.loading,"onUpdate:visible":o[0]||(o[0]=r=>l.loading=r),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:a(()=>[e(C,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:a(()=>[Pe]),_:1},8,["visible"]),e(P,{header:"Header",visible:w(v),"onUpdate:visible":o[1]||(o[1]=r=>U(v)?v.value=r:v=r),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:a(()=>[e(C,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:a(()=>[Ae]),_:1},8,["visible"]),e(P,{header:"Confirmation",visible:w(d),"onUpdate:visible":o[4]||(o[4]=r=>U(d)?d.value=r:d=r),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:a(()=>[e(g,{label:"Yes",icon:"pi pi-check",onClick:o[2]||(o[2]=r=>f()),class:"p-button-text",autofocus:""}),e(g,{label:"No",icon:"pi pi-times",onClick:o[3]||(o[3]=r=>D(!0)),class:"p-button-text"})]),default:a(()=>[s("div",ke,[Re,s("span",null,"Are you sure you want to "+V(w(n))+"?",1)])]),_:1},8,["visible"]),s("div",null,[e(p,{value:w(b).yet_to_active_employees_data,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:u.value,"onUpdate:filters":o[5]||(o[5]=r=>u.value=r),filterDisplay:"menu",loading:l.loading2,globalFilterFields:["name","status"]},{empty:a(()=>[S(" No customers found. ")]),loading:a(()=>[S(" Loading customers data. Please wait. ")]),default:a(()=>[e(t,{field:"emp_name",header:"Employee Name"},{body:a(r=>[S(V(r.data.emp_name),1)]),filter:a(({filterModel:r,filterCallback:j})=>[e(E,{modelValue:r.value,"onUpdate:modelValue":F=>r.value=F,onInput:F=>j(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(t,{field:"emp_code",header:"Employee Code",sortable:!0}),e(t,{field:"emp_designation",header:"Designation"}),e(t,{field:"l1_manager_name",header:"Reporting Manager"}),e(t,{field:"doj",header:"DOJ"}),e(t,{field:"blood_group_id",header:"Blood Group"}),e(t,{field:"profile_completeness",header:"Profile Completeness"},{body:a(r=>[e(N,{value:r.data.profile_completeness},null,8,["value"])]),_:1}),e(t,{field:"emp_status",header:"Onboarding Status"}),e(t,{field:"emp_status",header:"Approval Status"}),e(t,{field:"",header:"View Profile"},{body:a(()=>[e(g,{icon:"pi pi-eye",severity:"success",label:"View",style:{height:"2em"},raised:""})]),_:1}),e(t,{style:{width:"300px"},field:"",header:"Action"},{body:a(r=>[r.data.status=="Pending"?(O(),I("span",De,[e(g,{type:"button",icon:"pi pi-check-circle",severity:"success",label:"Approval",onClick:j=>A(r.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),e(g,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Rejected",style:{"margin-left":"8px",height:"2em"},onClick:j=>A(r.data,"Reject")},null,8,["onClick"])])):H("",!0)]),_:1})]),_:1},8,["value","filters","loading"])])])}}};const Le=s("h5",{style:{"text-align":"center"}},"Please wait...",-1),$e=s("h5",{style:{"text-align":"center"}},"Please wait...",-1),Ne={class:"confirmation-content"},je=s("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Ue={__name:"exit_employees",setup(L){const b=z();M(()=>{b.ajax_exit_employees_data()});let h=_(),d=_(!1),v=_(!1);J();const R=B(),u=_({global:{value:null,matchMode:y.CONTAINS},employee_name:{value:null,matchMode:y.STARTS_WITH,matchMode:y.EQUALS,matchMode:y.CONTAINS},status:{value:null,matchMode:y.EQUALS}});_(["Pending","Approved","Rejected"]);let n=null,x=null;function $(){let l=window.location.origin+"/fetch-att-regularization-data";console.log("AJAX URL : "+l),k.get(l).then(o=>{console.log("Axios : "+o.data),h.value=o.data,loading.value=!1})}function A(l,o){d.value=!0,n=o,x=l,console.log("Selected Row Data : "+JSON.stringify(l))}function D(l){d.value=!1,l&&m()}function m(){n="",x=null}function f(){D(!1),v.value=!0,console.log("Processing Rowdata : "+JSON.stringify(x)),k.post(window.location.origin+"/attendance-regularization-approvals",{id:x.id,status:n=="Approve"?"Approved":n=="Reject"?"Rejected":n,status_text:""}).then(l=>{console.log("Response : "+l),v.value=!1,R.add({severity:"success",summary:"Info",detail:"Success",life:3e3}),$(),m()}).catch(l=>{v.value=!1,m(),console.log(l.toJSON())})}return(l,o)=>{const T=c("Toast"),C=c("ProgressSpinner"),P=c("Dialog"),g=c("Button"),E=c("InputText"),t=c("Column"),N=c("DataTable");return O(),I("div",null,[e(T),e(P,{header:"Header",visible:l.loading,"onUpdate:visible":o[0]||(o[0]=p=>l.loading=p),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:a(()=>[e(C,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:a(()=>[Le]),_:1},8,["visible"]),e(P,{header:"Header",visible:w(v),"onUpdate:visible":o[1]||(o[1]=p=>U(v)?v.value=p:v=p),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:a(()=>[e(C,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:a(()=>[$e]),_:1},8,["visible"]),e(P,{header:"Confirmation",visible:w(d),"onUpdate:visible":o[4]||(o[4]=p=>U(d)?d.value=p:d=p),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:a(()=>[e(g,{label:"Yes",icon:"pi pi-check",onClick:o[2]||(o[2]=p=>f()),class:"p-button-text",autofocus:""}),e(g,{label:"No",icon:"pi pi-times",onClick:o[3]||(o[3]=p=>D(!0)),class:"p-button-text"})]),default:a(()=>[s("div",Ne,[je,s("span",null,"Are you sure you want to "+V(w(n))+"?",1)])]),_:1},8,["visible"]),s("div",null,[e(N,{value:w(b).exit_employees_data,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:u.value,"onUpdate:filters":o[5]||(o[5]=p=>u.value=p),filterDisplay:"menu",loading:l.loading2,globalFilterFields:["name","status"]},{empty:a(()=>[S(" No customers found. ")]),loading:a(()=>[S(" Loading customers data. Please wait. ")]),default:a(()=>[e(t,{field:"employee_name",header:"Employee Name"},{body:a(p=>[S(V(p.data.employee_name),1)]),filter:a(({filterModel:p,filterCallback:r})=>[e(E,{modelValue:p.value,"onUpdate:modelValue":j=>p.value=j,onInput:j=>r(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(t,{field:"employee_code",header:"Employee Code",sortable:!0}),e(t,{field:"designation",header:"Designation"}),e(t,{field:"l1_manager",header:"Reporting Manager"}),e(t,{field:"doj",header:"DOJ"}),e(t,{field:"blood_group",header:"Blood Group"}),e(t,{field:"com",header:"Profile Completeness"}),e(t,{field:"onstatus",header:"Onboarding Status"}),e(t,{field:"onstatus",header:"Approval Status"}),e(t,{style:{width:"300px"},field:"",header:"View Profile"},{body:a(p=>[e(g,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"View",onClick:r=>A(p.data,"Approve"),style:{height:"2em"},text:"",raised:""},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters","loading"])])])}}},Ve={class:"manage_employee-wrapper mt-30"},Ee=s("div",{class:"mb-2 card left-line"},[s("div",{class:"pt-1 pb-0 card-body"},[s("ul",{class:"nav nav-pills nav-tabs-dashed",role:"tablist"},[s("li",{class:"nav-item text-muted",role:"presentation"},[s("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#active_employees","aria-selected":"true",role:"tab"}," Active Employees ")]),s("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[s("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#not_active_employees","aria-selected":"true",role:"tab"}," Yet To Active Employees ")]),s("li",{class:"nav-item text-muted",role:"presentation"},[s("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#exit_employees","aria-selected":"true",role:"tab"}," Exit Employee ")])])])],-1),Oe={class:"card"},Ie={class:"card-body"},Be={class:"tab-content",id:"pills-tabContent"},Me={class:"tab-pane show fade active",id:"active_employees",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Je={class:"tab-pane fade",id:"not_active_employees",role:"tabpanel","aria-labelledby":"pills-profile-tab"},ze={class:"tab-pane fade",id:"exit_employees",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Fe={__name:"ManageEmployee",setup(L){return(b,h)=>(O(),I("div",Ve,[Ee,s("div",Oe,[s("div",Ie,[s("div",Be,[s("div",Me,[e(Ce)]),s("div",Je,[e(Te)]),s("div",ze,[e(Ue)])])])])]))}},i=W(Fe),He=q();i.use(G,{ripple:!0});i.use(le);i.use(Q);i.use(de);i.use(He);i.directive("tooltip",Z);i.directive("badge",ee);i.directive("ripple",X);i.directive("styleclass",te);i.directive("focustrap",se);i.component("Button",K);i.component("DataTable",oe);i.component("Column",ae);i.component("ColumnGroup",fe);i.component("Row",ve);i.component("Toast",ce);i.component("ConfirmDialog",pe);i.component("Dropdown",ne);i.component("InputText",ie);i.component("Dialog",re);i.component("ProgressSpinner",ue);i.component("Calendar",ge);i.component("Textarea",_e);i.component("Chips",ye);i.component("MultiSelect",he);i.component("ProgressBar",me);i.mount("#ManageEmployee");