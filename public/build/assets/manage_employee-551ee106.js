import{X as M,G as f,a as A,H as B,M as _,i as c,o as V,b as E,j as e,w as l,_ as b,a3 as j,g as s,t as U,l as x,d as F,I as H,P as W,J as G,R as Q,v as X}from"./toastservice.esm-00869179.js";import{d as Y,c as K}from"./pinia-2a477ea6.js";import{T as q,B as Z,S as ee,b as te,a as oe}from"./styleclass.esm-7a6b1127.js";import"./blockui.esm-6b43c010.js";import{F as ae,b as le,s as ne,a as se}from"./inputtext.esm-2f6a5e2d.js";import{s as ie}from"./confirmdialog.esm-f4112131.js";import{D as re}from"./dialogservice.esm-baf8c35b.js";import{s as de}from"./toast.esm-a9461f00.js";import{u as J,C as pe}from"./confirmationservice.esm-be9d1e76.js";import{s as ce}from"./progressspinner.esm-c6e45385.js";import{s as ue}from"./row.esm-6ebc942e.js";import{s as me}from"./columngroup.esm-9dd1458e.js";import{s as ve}from"./calendar.esm-0d078b66.js";import{s as ge}from"./textarea.esm-e16f0346.js";import{s as fe}from"./chips.esm-2823a625.js";import{s as _e}from"./multiselect.esm-cfe5b9c4.js";import"./moment-fbc5633a.js";const z=Y("Service",()=>{M();const L=f(),h=f(),y=f();return{active_employees_data:L,yet_to_active_employees_data:h,exit_employees_data:y,ajax_active_employees_data:()=>{let p=window.location.origin+"/fetch-att-regularization-data";console.log("AJAX URL : "+p),A.get(p).then(i=>{console.log("Axios : "+i.data),L.value=i.data})},ajax_yet_to_active_employees_data:()=>{let p=window.location.origin+"/fetch-att-regularization-data";console.log("AJAX URL : "+p),A.get(p).then(i=>{console.log("Axios : "+i.data),h.value=i.data})},ajax_exit_employees_data:()=>{let p=window.location.origin+"/fetch-att-regularization-data";console.log("AJAX URL : "+p),A.get(p).then(i=>{console.log("Axios : "+i.data),y.value=i.data})}}});const ye=s("h5",{style:{"text-align":"center"}},"Please wait...",-1),he=s("h5",{style:{"text-align":"center"}},"Please wait...",-1),be={class:"confirmation-content"},we=s("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),xe={__name:"active_employees",setup(L){const h=z();B(()=>{h.ajax_active_employees_data()});let y=f(!1),d=f(!1);J();const m=M(),k=f({global:{value:null,matchMode:_.CONTAINS},employee_name:{value:null,matchMode:_.STARTS_WITH,matchMode:_.EQUALS,matchMode:_.CONTAINS},status:{value:null,matchMode:_.EQUALS}});f(["Pending","Approved","Rejected"]);let p=null,i=null;function w(u,v){y.value=!0,p=v,i=u,console.log("Selected Row Data : "+JSON.stringify(u))}function $(u){y.value=!1,u&&S()}function S(){p="",i=null}function R(){$(!1),d.value=!0,console.log("Processing Rowdata : "+JSON.stringify(i)),A.post(window.location.origin+"/attendance-regularization-approvals",{id:i.id,status:p=="Approve"?"Approved":p=="Reject"?"Rejected":p,status_text:""}).then(u=>{console.log("Response : "+u),d.value=!1,m.add({severity:"success",summary:"Info",detail:"Success",life:3e3}),ajax_GetAttRegularizationData(),S()}).catch(u=>{d.value=!1,S(),console.log(u.toJSON())})}return(u,v)=>{const n=c("Toast"),a=c("ProgressSpinner"),D=c("Dialog"),C=c("Button"),P=c("InputText"),g=c("Column"),I=c("DataTable");return V(),E("div",null,[e(n),e(D,{header:"Header",visible:u.loading,"onUpdate:visible":v[0]||(v[0]=o=>u.loading=o),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:l(()=>[e(a,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:l(()=>[ye]),_:1},8,["visible"]),e(D,{header:"Header",visible:b(d),"onUpdate:visible":v[1]||(v[1]=o=>j(d)?d.value=o:d=o),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:l(()=>[e(a,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:l(()=>[he]),_:1},8,["visible"]),e(D,{header:"Confirmation",visible:b(y),"onUpdate:visible":v[4]||(v[4]=o=>j(y)?y.value=o:y=o),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:l(()=>[e(C,{label:"Yes",icon:"pi pi-check",onClick:v[2]||(v[2]=o=>R()),class:"p-button-text",autofocus:""}),e(C,{label:"No",icon:"pi pi-times",onClick:v[3]||(v[3]=o=>$(!0)),class:"p-button-text"})]),default:l(()=>[s("div",be,[we,s("span",null,"Are you sure you want to "+U(b(p))+"?",1)])]),_:1},8,["visible"]),s("div",null,[e(I,{value:b(h).active_employees_data,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:k.value,"onUpdate:filters":v[5]||(v[5]=o=>k.value=o),filterDisplay:"menu",loading:u.loading2,globalFilterFields:["name","status"]},{empty:l(()=>[x(" No customers found. ")]),loading:l(()=>[x(" Loading customers data. Please wait. ")]),default:l(()=>[x(),x(),e(g,{field:"employee_name",header:"Employee Name"},{body:l(o=>[x(U(o.data.employee_name),1)]),filter:l(({filterModel:o,filterCallback:N})=>[e(P,{modelValue:o.value,"onUpdate:modelValue":t=>o.value=t,onInput:t=>N(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(g,{field:"employee_code",header:"Employee Code",sortable:!0}),e(g,{field:"designation",header:"Designation"}),e(g,{field:"l1_manager",header:"Reporting Manager"}),e(g,{field:"doj",header:"DOJ"}),e(g,{field:"blood_group",header:"Blood Group"}),e(g,{field:"com",header:"Profile Completeness"}),e(g,{style:{width:"300px"},field:"",header:"View Profile"},{body:l(o=>[e(C,{type:"button",icon:"pi pi-eye",class:"p-button-secondary Button",label:"View",onClick:N=>w(o.data,"Approve"),style:{height:"2em"},text:"",raised:""},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters","loading"])])])}}};const Se=s("h5",{style:{"text-align":"center"}},"Please wait...",-1),Ce=s("h5",{style:{"text-align":"center"}},"Please wait...",-1),Pe={class:"confirmation-content"},Ae=s("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),ke={key:0},Re={__name:"yet_to_active_employees",setup(L){const h=z();B(()=>{h.ajax_yet_to_active_employees_data()});let y=f(),d=f(!1),m=f(!1);J();const k=M(),p=f({global:{value:null,matchMode:_.CONTAINS},employee_name:{value:null,matchMode:_.STARTS_WITH,matchMode:_.EQUALS,matchMode:_.CONTAINS},status:{value:null,matchMode:_.EQUALS}});f(["Pending","Approved","Rejected"]);let i=null,w=null;function $(){let n=window.location.origin+"/fetch-att-regularization-data";console.log("AJAX URL : "+n),A.get(n).then(a=>{console.log("Axios : "+a.data),y.value=a.data,loading.value=!1})}function S(n,a){d.value=!0,i=a,w=n,console.log("Selected Row Data : "+JSON.stringify(n))}function R(n){d.value=!1,n&&u()}function u(){i="",w=null}function v(){R(!1),m.value=!0,console.log("Processing Rowdata : "+JSON.stringify(w)),A.post(window.location.origin+"/attendance-regularization-approvals",{id:w.id,status:i=="Approve"?"Approved":i=="Reject"?"Rejected":i,status_text:""}).then(n=>{console.log("Response : "+n),m.value=!1,k.add({severity:"success",summary:"Info",detail:"Success",life:3e3}),$(),u()}).catch(n=>{m.value=!1,u(),console.log(n.toJSON())})}return(n,a)=>{const D=c("Toast"),C=c("ProgressSpinner"),P=c("Dialog"),g=c("Button"),I=c("InputText"),o=c("Column"),N=c("DataTable");return V(),E("div",null,[e(D),e(P,{header:"Header",visible:n.loading,"onUpdate:visible":a[0]||(a[0]=t=>n.loading=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:l(()=>[e(C,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:l(()=>[Se]),_:1},8,["visible"]),e(P,{header:"Header",visible:b(m),"onUpdate:visible":a[1]||(a[1]=t=>j(m)?m.value=t:m=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:l(()=>[e(C,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:l(()=>[Ce]),_:1},8,["visible"]),e(P,{header:"Confirmation",visible:b(d),"onUpdate:visible":a[4]||(a[4]=t=>j(d)?d.value=t:d=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:l(()=>[e(g,{label:"Yes",icon:"pi pi-check",onClick:a[2]||(a[2]=t=>v()),class:"p-button-text",autofocus:""}),e(g,{label:"No",icon:"pi pi-times",onClick:a[3]||(a[3]=t=>R(!0)),class:"p-button-text"})]),default:l(()=>[s("div",Pe,[Ae,s("span",null,"Are you sure you want to "+U(b(i))+"?",1)])]),_:1},8,["visible"]),s("div",null,[e(N,{value:b(h).yet_to_active_employees_data,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:p.value,"onUpdate:filters":a[5]||(a[5]=t=>p.value=t),filterDisplay:"menu",loading:n.loading2,globalFilterFields:["name","status"]},{empty:l(()=>[x(" No customers found. ")]),loading:l(()=>[x(" Loading customers data. Please wait. ")]),default:l(()=>[e(o,{field:"employee_name",header:"Employee Name"},{body:l(t=>[x(U(t.data.employee_name),1)]),filter:l(({filterModel:t,filterCallback:T})=>[e(I,{modelValue:t.value,"onUpdate:modelValue":O=>t.value=O,onInput:O=>T(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(o,{field:"employee_code",header:"Employee Code",sortable:!0}),e(o,{field:"designation",header:"Designation"}),e(o,{field:"l1_manager",header:"Reporting Manager"}),e(o,{field:"doj",header:"DOJ"}),e(o,{field:"blood_group",header:"Blood Group"}),e(o,{field:"com",header:"Profile Completeness"}),e(o,{field:"onstatus",header:"Onboarding Status"}),e(o,{field:"onstatus",header:"Approval Status"}),e(o,{field:"",header:"View Profile"},{body:l(t=>[e(g,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"View",onClick:T=>S(t.data,"Approve"),style:{height:"2em"},text:"",raised:""},null,8,["onClick"])]),_:1}),e(o,{style:{width:"300px"},field:"",header:"Action"},{body:l(t=>[t.data.status=="Pending"?(V(),E("span",ke,[e(g,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approval",onClick:T=>S(t.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),e(g,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Rejected",style:{"margin-left":"8px",height:"2em"},onClick:T=>S(t.data,"Reject")},null,8,["onClick"])])):F("",!0)]),_:1})]),_:1},8,["value","filters","loading"])])])}}};const De=s("h5",{style:{"text-align":"center"}},"Please wait...",-1),Te=s("h5",{style:{"text-align":"center"}},"Please wait...",-1),Le={class:"confirmation-content"},$e=s("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Ne={__name:"exit_employees",setup(L){const h=z();B(()=>{h.ajax_exit_employees_data()});let y=f(),d=f(!1),m=f(!1);J();const k=M(),p=f({global:{value:null,matchMode:_.CONTAINS},employee_name:{value:null,matchMode:_.STARTS_WITH,matchMode:_.EQUALS,matchMode:_.CONTAINS},status:{value:null,matchMode:_.EQUALS}});f(["Pending","Approved","Rejected"]);let i=null,w=null;function $(){let n=window.location.origin+"/fetch-att-regularization-data";console.log("AJAX URL : "+n),A.get(n).then(a=>{console.log("Axios : "+a.data),y.value=a.data,loading.value=!1})}function S(n,a){d.value=!0,i=a,w=n,console.log("Selected Row Data : "+JSON.stringify(n))}function R(n){d.value=!1,n&&u()}function u(){i="",w=null}function v(){R(!1),m.value=!0,console.log("Processing Rowdata : "+JSON.stringify(w)),A.post(window.location.origin+"/attendance-regularization-approvals",{id:w.id,status:i=="Approve"?"Approved":i=="Reject"?"Rejected":i,status_text:""}).then(n=>{console.log("Response : "+n),m.value=!1,k.add({severity:"success",summary:"Info",detail:"Success",life:3e3}),$(),u()}).catch(n=>{m.value=!1,u(),console.log(n.toJSON())})}return(n,a)=>{const D=c("Toast"),C=c("ProgressSpinner"),P=c("Dialog"),g=c("Button"),I=c("InputText"),o=c("Column"),N=c("DataTable");return V(),E("div",null,[e(D),e(P,{header:"Header",visible:n.loading,"onUpdate:visible":a[0]||(a[0]=t=>n.loading=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:l(()=>[e(C,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:l(()=>[De]),_:1},8,["visible"]),e(P,{header:"Header",visible:b(m),"onUpdate:visible":a[1]||(a[1]=t=>j(m)?m.value=t:m=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:l(()=>[e(C,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:l(()=>[Te]),_:1},8,["visible"]),e(P,{header:"Confirmation",visible:b(d),"onUpdate:visible":a[4]||(a[4]=t=>j(d)?d.value=t:d=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:l(()=>[e(g,{label:"Yes",icon:"pi pi-check",onClick:a[2]||(a[2]=t=>v()),class:"p-button-text",autofocus:""}),e(g,{label:"No",icon:"pi pi-times",onClick:a[3]||(a[3]=t=>R(!0)),class:"p-button-text"})]),default:l(()=>[s("div",Le,[$e,s("span",null,"Are you sure you want to "+U(b(i))+"?",1)])]),_:1},8,["visible"]),s("div",null,[e(N,{value:b(h).exit_employees_data,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:p.value,"onUpdate:filters":a[5]||(a[5]=t=>p.value=t),filterDisplay:"menu",loading:n.loading2,globalFilterFields:["name","status"]},{empty:l(()=>[x(" No customers found. ")]),loading:l(()=>[x(" Loading customers data. Please wait. ")]),default:l(()=>[e(o,{field:"employee_name",header:"Employee Name"},{body:l(t=>[x(U(t.data.employee_name),1)]),filter:l(({filterModel:t,filterCallback:T})=>[e(I,{modelValue:t.value,"onUpdate:modelValue":O=>t.value=O,onInput:O=>T(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(o,{field:"employee_code",header:"Employee Code",sortable:!0}),e(o,{field:"designation",header:"Designation"}),e(o,{field:"l1_manager",header:"Reporting Manager"}),e(o,{field:"doj",header:"DOJ"}),e(o,{field:"blood_group",header:"Blood Group"}),e(o,{field:"com",header:"Profile Completeness"}),e(o,{field:"onstatus",header:"Onboarding Status"}),e(o,{field:"onstatus",header:"Approval Status"}),e(o,{style:{width:"300px"},field:"",header:"View Profile"},{body:l(t=>[e(g,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"View",onClick:T=>S(t.data,"Approve"),style:{height:"2em"},text:"",raised:""},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters","loading"])])])}}},je={class:"manage_employee-wrapper mt-30"},Ue=s("div",{class:"mb-2 card left-line"},[s("div",{class:"pt-1 pb-0 card-body"},[s("ul",{class:"nav nav-pills nav-tabs-dashed",role:"tablist"},[s("li",{class:"nav-item text-muted",role:"presentation"},[s("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#active_employees","aria-selected":"true",role:"tab"}," Active Employees ")]),s("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[s("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#not_active_employees","aria-selected":"true",role:"tab"}," Yet To Active Employees ")]),s("li",{class:"nav-item text-muted",role:"presentation"},[s("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#exit_employees","aria-selected":"true",role:"tab"}," Exit Employee ")])])])],-1),Ie={class:"card"},Oe={class:"card-body"},Ve={class:"tab-content",id:"pills-tabContent"},Ee={class:"tab-pane show fade active",id:"active_employees",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Me={class:"tab-pane fade",id:"not_active_employees",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Be={class:"tab-pane fade",id:"exit_employees",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Je={__name:"manage_employee",setup(L){return(h,y)=>(V(),E("div",je,[Ue,s("div",Ie,[s("div",Oe,[s("div",Ve,[s("div",Ee,[e(xe)]),s("div",Me,[e(Re)]),s("div",Be,[e(Ne)])])])])]))}},r=H(Je),ze=K();r.use(W,{ripple:!0});r.use(pe);r.use(G);r.use(re);r.use(ze);r.directive("tooltip",q);r.directive("badge",Z);r.directive("ripple",Q);r.directive("styleclass",ee);r.directive("focustrap",ae);r.component("Button",X);r.component("DataTable",te);r.component("Column",oe);r.component("ColumnGroup",me);r.component("Row",ue);r.component("Toast",de);r.component("ConfirmDialog",ie);r.component("Dropdown",le);r.component("InputText",ne);r.component("Dialog",se);r.component("ProgressSpinner",ce);r.component("Calendar",ve);r.component("Textarea",ge);r.component("Chips",fe);r.component("MultiSelect",_e);r.mount("#ManageEmployee");
