/* empty css              */import{$ as y,af as r,I as F,g as c,o as m,c as C,h as e,w as o,aj as f,a3 as B,d as s,l as x,n as k,t as w,b as L,a as V,ah as W,J as X,P as G,K as q,u as Z,L as ee,R as ae,S as te,x as oe,y as le,M as se,Y as ne,N as ie,V as re,X as ce,Q as de}from"./toastservice.esm-134e08fe.js";/* empty css                 */import{d as pe,c as me}from"./pinia-c1aabf4a.js";import"./blockui.esm-295a960b.js";import{a as ue}from"./datatable.esm-fbdcd6d6.js";import{D as _e,s as fe}from"./dialogservice.esm-2c10dc9f.js";import{u as z,C as ve}from"./confirmationservice.esm-bbe3e128.js";import{s as ge}from"./progressspinner.esm-bde8140b.js";import{s as ye}from"./progressbar.esm-c699f6c2.js";import{s as he}from"./row.esm-6ebc942e.js";import{s as be}from"./calendar.esm-f9446500.js";import{s as we}from"./textarea.esm-ae59a329.js";import{s as Se}from"./chips.esm-87881c67.js";import{s as xe}from"./multiselect.esm-06406285.js";import{d as Q}from"./dayjs.min-2f06af28.js";import{p as Ce}from"./ProfilePagesStore-49333c02.js";import{a as j}from"./index-362795f3.js";import{S as H}from"./Service-c397fabe.js";const J=pe("manageEmployees",()=>{const E=y(),N=y(),h=y();async function v(){let _=window.location.origin+"/vmt-activeemployees-fetchall";console.log("AJAX URL : "+_),await j.get(_).then(b=>{E.value=b.data})}async function d(){let _=window.location.origin+"/vmt-yet-to-activeemployees-fetchall";console.log("AJAX URL : "+_),await j.get(_).then(b=>{console.log("Axios : "+b.data),N.value=b.data})}async function M(){let _=window.location.origin+"/vmt-exitemployees-fetchall";console.log("AJAX URL : "+_),await j.get(_).then(b=>{console.log("Axios : "+b.data),h.value=b.data})}return{array_active_employees:E,yet_to_active_employees_data:N,exit_employees_data:h,getActiveEmployees:v,ajax_yet_to_active_employees_data:d,ajax_exit_employees_data:M}});const ke=s("h5",{style:{"text-align":"center"}},"Please wait...",-1),Ae={class:"flex justify-center items-center"},Te=["src"],$e={class:"text-left pl-2 font-semibold fs-6"},De={__name:"active_employees",setup(E){const N=H(),h=J(),v=Ce();let d=y(!0);const M=y(),_=y({global:{value:null,matchMode:r.CONTAINS},emp_name:{value:null,matchMode:r.STARTS_WITH,matchMode:r.EQUALS,matchMode:r.CONTAINS},emp_code:{value:null,matchMode:r.STARTS_WITH,matchMode:r.EQUALS,matchMode:r.CONTAINS},status:{value:null,matchMode:r.EQUALS}});F(async()=>{await h.getActiveEmployees(),d.value=!1});async function b(A){console.log(A),M.value=A.data,v.user_code=A.enc_user_id,window.location.href="/pages-profile-new?uid="+A.enc_user_id}return(A,u)=>{const S=c("ProgressSpinner"),P=c("Dialog"),$=c("InputText"),T=c("Column"),p=c("ProgressBar"),i=c("Button"),I=c("DataTable");return m(),C("div",null,[e(P,{header:"Header",visible:f(d),"onUpdate:visible":u[0]||(u[0]=l=>B(d)?d.value=l:d=l),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:o(()=>[e(S,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:o(()=>[ke]),_:1},8,["visible"]),s("div",null,[e(I,{value:f(h).array_active_employees,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rowsPerPageOptions:[5,10,25],filters:_.value,"onUpdate:filters":u[1]||(u[1]=l=>_.value=l),filterDisplay:"menu",loading:f(d),globalFilterFields:["emp_name","emp_code","status"]},{empty:o(()=>[x(" No customers found.")]),loading:o(()=>[x(" Loading customers data. Please wait. ")]),default:o(()=>[e(T,{class:"font-bold",field:"emp_name",header:"Employee Name",style:{"min-width":"20rem","text-align":"center:  !important"}},{body:o(l=>[s("div",Ae,[JSON.parse(l.data.emp_avatar).type=="shortname"?(m(),C("p",{key:0,class:k(["p-2 w-11 fs-6 font-semibold rounded-full text-white",f(N).getBackgroundColor(l.index)])},w(JSON.parse(l.data.emp_avatar).data),3)):(m(),C("img",{key:1,class:"rounded-circle img-md w-10 userActive-status profile-img",style:{height:"30px !important"},src:`data:image/png;base64,${JSON.parse(l.data.emp_avatar).data}`,srcset:"",alt:""},null,8,Te)),s("p",$e,w(l.data.emp_name),1)])]),filter:o(({filterModel:l,filterCallback:t})=>[e($,{modelValue:l.value,"onUpdate:modelValue":g=>l.value=g,onInput:g=>t(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(T,{field:"emp_code",header:"Employee Code",class:"",style:{"min-width":"5rem !important"}},{filter:o(({filterModel:l,filterCallback:t})=>[e($,{modelValue:l.value,"onUpdate:modelValue":g=>l.value=g,onInput:g=>t(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(T,{field:"emp_designation",header:"Designation",style:{"min-width":"15rem"}}),e(T,{field:"reporting_manager_name",header:"Reporting Manager"}),e(T,{field:"doj",header:"DOJ",style:{"min-width":"10rem"}},{body:o(l=>[x(w(f(Q)(l.data.doj).format("DD-MMM-YYYY")),1)]),_:1}),e(T,{field:"profile_completeness",header:"Profile Completeness"},{body:o(l=>[l.data.profile_completeness<=39?(m(),L(p,{key:0,value:l.data.profile_completeness,class:k([l.data.profile_completeness<=39?"progressbar":""])},null,8,["value","class"])):V("",!0),l.data.profile_completeness>=40&&l.data.profile_completeness<=59?(m(),L(p,{key:1,class:k(["progressbar_val2",[l.data.profile_completeness>=40&&l.data.profile_completeness<=59]]),value:l.data.profile_completeness},null,8,["class","value"])):V("",!0),l.data.profile_completeness>=60?(m(),L(p,{key:2,class:k(["progressbar_val3",[l.data.profile_completeness>=60]]),value:l.data.profile_completeness},null,8,["class","value"])):V("",!0)]),_:1}),e(T,{field:"enc_user_id",header:"View Profile"},{body:o(l=>[e(i,{icon:"pi pi-eye",severity:"success",raised:"",label:"View",onClick:t=>b(l.data),style:{height:"2em"}},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters","loading"])])])}}},Ne=s("h5",{style:{"text-align":"center"}},"Please wait...",-1),Le={class:"confirmation-content"},Ve=s("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Re={class:"flex justify-center items-center"},Me=["src"],Ie={class:"text-left pl-2 font-semibold fs-6"},Ee={key:0},Pe={key:1},Ue={__name:"yet_to_active_employees",setup(E){const N=H(),h=J();F(()=>{h.ajax_yet_to_active_employees_data()}),y();let v=y(!1),d=y(!1);z();const M=W();function _(p){window.location.href="/pages-profile-new?uid="+p}const b=y({global:{value:null,matchMode:r.CONTAINS},emp_name:{value:null,matchMode:r.STARTS_WITH,matchMode:r.EQUALS,matchMode:r.CONTAINS},emp_code:{value:null,matchMode:r.STARTS_WITH,matchMode:r.EQUALS,matchMode:r.CONTAINS},status:{value:null,matchMode:r.EQUALS}});y(["Pending","Approved","Rejected"]);let A=null,u=null;function S(p,i){p.emp_code,p.emp_status,console.log(J.emp_status),console.log(p.emp_status),v.value=!0,A=i,u=p,console.log("Selected Row Data : "+JSON.stringify(p))}function P(p){v.value=!1,p&&$()}function $(){A="",u=null}function T(){P(!1),d.value=!0,console.log("Processing Rowdata : "+JSON.stringify(u)),j.post(window.location.origin+"/onboarding/updateEmployeeActive",{user_code:u.emp_code,active_status:1}).then(p=>{console.log("Response : "+p),M.add({severity:"success",summary:"Activated",detail:`${u.emp_name} Activated Successfully`,life:3e3}),$()}).catch(p=>{d.value=!1,$()}).finally(()=>{h.ajax_yet_to_active_employees_data(),h.getActiveEmployees(),d.value=!1})}return(p,i)=>{const I=c("Toast"),l=c("ProgressSpinner"),t=c("Dialog"),g=c("Button"),R=c("InputText"),D=c("Column"),Y=c("ProgressBar"),K=c("DataTable");return m(),C("div",null,[e(I),e(t,{header:"Header",visible:f(d),"onUpdate:visible":i[0]||(i[0]=a=>B(d)?d.value=a:d=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:o(()=>[e(l,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:o(()=>[Ne]),_:1},8,["visible"]),e(t,{header:"Confirmation",visible:f(v),"onUpdate:visible":i[3]||(i[3]=a=>B(v)?v.value=a:v=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:o(()=>[e(g,{label:"Yes",icon:"pi pi-check",onClick:i[1]||(i[1]=a=>T()),class:"p-button-text",autofocus:""}),e(g,{label:"No",icon:"pi pi-times",onClick:i[2]||(i[2]=a=>P(!0)),class:"p-button-text"})]),default:o(()=>[s("div",Le,[Ve,s("span",null,"Are you sure you want to "+w(f(A))+"?",1)])]),_:1},8,["visible"]),s("div",null,[e(K,{value:f(h).yet_to_active_employees_data,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rowsPerPageOptions:[5,10,25],filters:b.value,"onUpdate:filters":i[4]||(i[4]=a=>b.value=a),filterDisplay:"menu",loading:p.loading2,globalFilterFields:["emp_name","emp_code","status"]},{empty:o(()=>[x(" No customers found. ")]),loading:o(()=>[x(" Loading customers data. Please wait. ")]),default:o(()=>[e(D,{class:"font-bold",field:"emp_name",header:"Employee Name",style:{"min-width":"20rem"}},{body:o(a=>[s("div",Re,[JSON.parse(a.data.emp_avatar).type=="shortname"?(m(),C("p",{key:0,class:k(["p-2 w-11 fs-6 font-semibold rounded-full text-white",f(N).getBackgroundColor(a.index)])},w(JSON.parse(a.data.emp_avatar).data),3)):(m(),C("img",{key:1,class:"rounded-circle img-md w-10 userActive-status profile-img",style:{height:"30px !important"},src:`data:image/png;base64,${JSON.parse(a.data.emp_avatar).data}`,srcset:"",alt:""},null,8,Me)),s("p",Ie,w(a.data.emp_name),1)])]),filter:o(({filterModel:a,filterCallback:U})=>[e(R,{modelValue:a.value,"onUpdate:modelValue":O=>a.value=O,onInput:O=>U(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(D,{field:"emp_code",header:"Employee Code"},{body:o(a=>[x(w(a.data.emp_code),1)]),filter:o(({filterModel:a,filterCallback:U})=>[e(R,{modelValue:a.value,"onUpdate:modelValue":O=>a.value=O,onInput:O=>U(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(D,{field:"emp_designation",header:"Designation",style:{"min-width":"15rem"}}),e(D,{field:"reporting_manager_name",header:"Reporting Manager"}),e(D,{field:"doj",header:"DOJ",style:{"min-width":"10rem"}},{body:o(a=>[x(w(f(Q)(a.data.doj).format("DD-MMM-YYYY")),1)]),_:1}),e(D,{field:"profile_completeness",header:"Profile Completeness"},{body:o(a=>[a.data.profile_completeness<=39?(m(),L(Y,{key:0,value:a.data.profile_completeness,class:k([a.data.profile_completeness<=39?"progressbar":""])},null,8,["value","class"])):V("",!0),a.data.profile_completeness>=40&&a.data.profile_completeness<=59?(m(),L(Y,{key:1,class:k(["progressbar_val2",[a.data.profile_completeness>=40&&a.data.profile_completeness<=59]]),value:a.data.profile_completeness},null,8,["class","value"])):V("",!0),a.data.profile_completeness>=60?(m(),L(Y,{key:2,class:k(["progressbar_val3",[a.data.profile_completeness>=60]]),value:a.data.profile_completeness},null,8,["class","value"])):V("",!0)]),_:1}),e(D,{field:"is_onboarded",header:"Onboarding Status"},{body:o(a=>[x(w(a.data.is_onboarded?"Completed":"Pending"),1)]),_:1}),e(D,{field:"doc_status",header:"Docs Approval Status"},{body:o(a=>[x(w(a.data.is_onboarded&&a.data.doc_status?"Approved":"Pending"),1)]),_:1}),e(D,{field:"enc_user_id",header:"View Profile"},{body:o(a=>[e(g,{icon:"pi pi-eye",severity:"success",label:"View",onClick:U=>_(a.data.enc_user_id),style:{height:"2em"},raised:""},null,8,["onClick"])]),_:1}),e(D,{style:{width:"300px"},field:"",header:"Action"},{body:o(a=>[a.data.is_onboarded&&a.data.doc_status?(m(),C("div",Ee,[e(g,{icon:"pi pi-check-circle",severity:"success",label:"Activate",class:"p-button-success Button",onClick:U=>S(a.data,"Active"),style:{height:"2em"}},null,8,["onClick"])])):(m(),C("div",Pe))]),_:1})]),_:1},8,["value","filters","loading"])])])}}},Oe={class:"confirmation-content"},je=s("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Be={class:"flex justify-center items-center"},Je=["src"],Ye={class:"text-left pl-2 font-semibold fs-6"},Fe={__name:"exit_employees",setup(E){const N=H(),h=J();F(()=>{h.ajax_exit_employees_data()}),y();let v=y(!1),d=y(!1);z();const M=W(),_=y({global:{value:null,matchMode:r.CONTAINS},employee_name:{value:null,matchMode:r.STARTS_WITH,matchMode:r.EQUALS,matchMode:r.CONTAINS},status:{value:null,matchMode:r.EQUALS},status:{value:null,matchMode:r.EQUALS}});function b(u){window.location.href="/pages-profile-new?uid="+u}function A(){hideConfirmDialog(!1),d.value=!0,console.log("Processing Rowdata : "+JSON.stringify(currentlySelectedRowData)),j.post(window.location.origin+"/attendance-regularization-approvals",{id:currentlySelectedRowData.id,status:currentlySelectedStatus=="Approve"?"Approved":currentlySelectedStatus=="Reject"?"Rejected":currentlySelectedStatus,status_text:""}).then(u=>{console.log("Response : "+u),d.value=!1,M.add({severity:"success",summary:"Info",detail:"Success",life:3e3}),ajax_GetAttRegularizationData(),resetVars()}).catch(u=>{d.value=!1,resetVars()})}return(u,S)=>{const P=c("Toast"),$=c("Button"),T=c("Dialog"),p=c("InputText"),i=c("Column"),I=c("ProgressBar"),l=c("DataTable");return m(),C("div",null,[e(P),e(T,{header:"Confirmation",visible:f(v),"onUpdate:visible":S[2]||(S[2]=t=>B(v)?v.value=t:v=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:o(()=>[e($,{label:"Yes",icon:"pi pi-check",onClick:S[0]||(S[0]=t=>A()),class:"p-button-text",autofocus:""}),e($,{label:"No",icon:"pi pi-times",onClick:S[1]||(S[1]=t=>u.hideConfirmDialog(!0)),class:"p-button-text"})]),default:o(()=>[s("div",Oe,[je,s("span",null,"Are you sure you want to "+w(u.currentlySelectedStatus)+"?",1)])]),_:1},8,["visible"]),s("div",null,[e(l,{value:f(h).exit_employees_data,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rowsPerPageOptions:[5,10,25],filters:_.value,"onUpdate:filters":S[3]||(S[3]=t=>_.value=t),filterDisplay:"menu",loading:f(d),globalFilterFields:["emp_name","emp_code","status"]},{empty:o(()=>[x(" No customers found.")]),loading:o(()=>[x(" Loading customers data. Please wait. ")]),default:o(()=>[e(i,{class:"font-bold",field:"emp_name",header:"Employee Name",style:{"min-width":"20rem"}},{body:o(t=>[s("div",Be,[JSON.parse(t.data.emp_avatar).type=="shortname"?(m(),C("p",{key:0,class:k(["p-2 w-11 fs-6 font-semibold rounded-full text-white",f(N).getBackgroundColor(t.index)])},w(JSON.parse(t.data.emp_avatar).data),3)):(m(),C("img",{key:1,class:"rounded-circle img-md w-10 userActive-status profile-img",style:{height:"30px !important"},src:`data:image/png;base64,${JSON.parse(t.data.emp_avatar).data}`,srcset:"",alt:""},null,8,Je)),s("p",Ye,w(t.data.emp_name),1)])]),filter:o(({filterModel:t,filterCallback:g})=>[e(p,{modelValue:t.value,"onUpdate:modelValue":R=>t.value=R,onInput:R=>g(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(i,{field:"emp_code",header:"Employee Code",style:{"min-width":"15rem"}},{filter:o(({filterModel:t,filterCallback:g})=>[e(p,{modelValue:t.value,"onUpdate:modelValue":R=>t.value=R,onInput:R=>g(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(i,{field:"emp_designation",header:"Designation",style:{"min-width":"15rem"}}),e(i,{field:"reporting_manager_name",header:"Reporting Manager"}),e(i,{field:"doj",header:"DOJ",style:{"min-width":"10rem"}},{body:o(t=>[x(w(f(Q)(t.data.doj).format("DD-MMM-YYYY")),1)]),_:1}),e(i,{field:"profile_completeness",header:"Profile Completeness"},{body:o(t=>[t.data.profile_completeness<=39?(m(),L(I,{key:0,value:t.data.profile_completeness,class:k([t.data.profile_completeness<=39?"progressbar":""])},null,8,["value","class"])):V("",!0),t.data.profile_completeness>=40&&t.data.profile_completeness<=59?(m(),L(I,{key:1,class:k(["progressbar_val2",[t.data.profile_completeness>=40&&t.data.profile_completeness<=59]]),value:t.data.profile_completeness},null,8,["class","value"])):V("",!0),t.data.profile_completeness>=60?(m(),L(I,{key:2,class:k(["progressbar_val3",[t.data.profile_completeness>=60]]),value:t.data.profile_completeness},null,8,["class","value"])):V("",!0)]),_:1}),e(i,{field:"enc_user_id",header:"View Profile"},{body:o(t=>[e($,{icon:"pi pi-eye",severity:"success",label:"View",onClick:g=>b(t.data.enc_user_id),style:{height:"2em"},raised:""},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters","loading"])])])}}};const Qe={class:""},He=s("div",{class:"mb-2 card left-line"},[s("div",{class:"pt-1 pb-0 card-body"},[s("ul",{class:"nav nav-pills nav-tabs-dashed",role:"tablist"},[s("li",{class:"nav-item text-muted",role:"presentation"},[s("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#active_employees","aria-selected":"true",role:"tab"}," Active Employees ")]),s("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[s("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#not_active_employees","aria-selected":"true",role:"tab"}," Yet To Active Employees ")]),s("li",{class:"nav-item text-muted",role:"presentation"},[s("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#exit_employees","aria-selected":"true",role:"tab"}," Exit Employee ")])])])],-1),We={class:"card"},ze={class:"card-body"},Ke={class:"tab-content",id:"pills-tabContent"},Xe={class:"tab-pane show fade active",id:"active_employees",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Ge={class:"tab-pane fade",id:"not_active_employees",role:"tabpanel","aria-labelledby":"pills-profile-tab"},qe={class:"tab-pane fade",id:"exit_employees",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Ze={__name:"ManageEmployee",setup(E){return(N,h)=>(m(),C("div",Qe,[He,s("div",We,[s("div",ze,[s("div",Ke,[s("div",Xe,[e(De)]),s("div",Ge,[e(Ue)]),s("div",qe,[e(Fe)])])])])]))}},n=X(Ze),ea=me();n.use(G,{ripple:!0});n.use(ve);n.use(q);n.use(_e);n.use(ea);n.directive("tooltip",Z);n.directive("badge",ee);n.directive("ripple",ae);n.directive("styleclass",te);n.directive("focustrap",oe);n.component("Button",le);n.component("DataTable",ue);n.component("Column",se);n.component("ColumnGroup",fe);n.component("Row",he);n.component("Toast",ne);n.component("ConfirmDialog",ie);n.component("Dropdown",re);n.component("InputText",ce);n.component("Dialog",de);n.component("ProgressSpinner",ge);n.component("Calendar",be);n.component("Textarea",we);n.component("Chips",Se);n.component("MultiSelect",xe);n.component("ProgressBar",ye);n.mount("#vjs_manage_employee");
