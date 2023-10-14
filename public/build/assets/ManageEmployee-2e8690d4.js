import{d as j}from"./dayjs.min-2f06af28.js";import{q as z,r as y,R as l,o as J,c as u,e as p,f as T,g as s,n as e,l as o,i as S,p as L,h as b,t as h,k as U,j as R,I as Q,y as F,L as H,F as K}from"./app-d92eb619.js";import{p as W}from"./ProfilePagesStore-a82953b6.js";import{a as O}from"./index-362795f3.js";import{S as B}from"./Service-03ae2cf4.js";/* empty css                                                                       */import{L as X}from"./LoadingSpinner-82c49d54.js";const P=z("manageEmployees",()=>{const $=y(),C=y(),c=y(),f=y(!0);async function k(){let r=window.location.origin+"/vmt-activeemployees-fetchall";console.log("AJAX URL : "+r),await O.get(r).then(m=>{$.value=m.data})}async function V(){let r=window.location.origin+"/vmt-yet-to-activeemployees-fetchall";console.log("AJAX URL : "+r),await O.get(r).then(m=>{console.log("Axios : "+m.data),C.value=m.data})}async function N(){let r=window.location.origin+"/vmt-exitemployees-fetchall";console.log("AJAX URL : "+r),await O.get(r).then(m=>{console.log("Axios : "+m.data),c.value=m.data})}return{array_active_employees:$,yet_to_active_employees_data:C,exit_employees_data:c,getActiveEmployees:k,ajax_yet_to_active_employees_data:V,ajax_exit_employees_data:N,canShowLoadingScreen:f}});const q={class:"w-full"},G={class:"flex items-center justify-center"},Z=["src"],ee={class:"pl-2 font-semibold text-left fs-6"},ae=s("i",{class:"h-6 py-1 mx-2 pi pi-eye text-[#000]"},null,-1),te={__name:"active_employees",setup($){const C=B(),c=P(),f=W(),k=y(),V=y({global:{value:null,matchMode:l.CONTAINS},emp_name:{value:null,matchMode:l.STARTS_WITH,matchMode:l.EQUALS,matchMode:l.CONTAINS},emp_code:{value:null,matchMode:l.STARTS_WITH,matchMode:l.EQUALS,matchMode:l.CONTAINS},emp_designation:{value:null,matchMode:l.STARTS_WITH,matchMode:l.EQUALS,matchMode:l.CONTAINS},reporting_manager_name:{value:null,matchMode:l.STARTS_WITH,matchMode:l.EQUALS,matchMode:l.CONTAINS},status:{value:null,matchMode:l.EQUALS}});J(async()=>{await c.getActiveEmployees(),c.canShowLoadingScreen=!1});async function N(r){console.log(r),console.log("user code ::",r.emp_code),k.value=r.data,f.user_code=r.emp_code}return(r,m)=>{const M=u("InputText"),d=u("Column"),v=u("ProgressBar"),D=u("RouterLink"),_=u("DataTable");return p(),T("div",q,[s("div",null,[e(_,{value:b(c).array_active_employees,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rowsPerPageOptions:[5,10,25],filters:V.value,"onUpdate:filters":m[0]||(m[0]=t=>V.value=t),filterDisplay:"menu",loading:r.canShowLoadingScreen,globalFilterFields:["emp_name","emp_code","emp_designation","reporting_manager_name","status"]},{empty:o(()=>[S(" No customers found.")]),loading:o(()=>[S(" Loading customers data. Please wait. ")]),default:o(()=>[e(d,{class:"font-bold",field:"emp_name",header:"Employee Name",style:{"min-width":"5rem !important","text-align":"center:  !important"}},{body:o(t=>[s("div",G,[JSON.parse(t.data.emp_avatar).type=="shortname"?(p(),T("p",{key:0,class:L(["p-2 font-semibold text-white rounded-full w-11 fs-6",b(C).getBackgroundColor(t.index)])},h(JSON.parse(t.data.emp_avatar).data),3)):(p(),T("img",{key:1,class:"rounded-circle userActive-status profile-img",style:{height:"30px !important",width:"30px !important"},src:`data:image/png;base64,${JSON.parse(t.data.emp_avatar).data}`,srcset:"",alt:""},null,8,Z)),s("p",ee,h(t.data.emp_name),1)])]),filter:o(({filterModel:t,filterCallback:g})=>[e(M,{modelValue:t.value,"onUpdate:modelValue":i=>t.value=i,onInput:i=>g(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(d,{field:"emp_code",header:"Employee Code",class:"",style:{}},{filter:o(({filterModel:t,filterCallback:g})=>[e(M,{modelValue:t.value,"onUpdate:modelValue":i=>t.value=i,onInput:i=>g(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(d,{field:"emp_designation",header:"Designation",class:""},{filter:o(({filterModel:t,filterCallback:g})=>[e(M,{modelValue:t.value,"onUpdate:modelValue":i=>t.value=i,onInput:i=>g(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(d,{field:"reporting_manager_name",header:"Reporting Manager"},{filter:o(({filterModel:t,filterCallback:g})=>[e(M,{modelValue:t.value,"onUpdate:modelValue":i=>t.value=i,onInput:i=>g(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(d,{field:"doj",header:"DOJ",style:{"min-width":"10rem"}},{body:o(t=>[S(h(b(j)(t.data.doj).format("DD-MMM-YYYY")),1)]),_:1}),e(d,{field:"profile_completeness",header:"Profile Completeness"},{body:o(t=>[t.data.profile_completeness<=39?(p(),U(v,{key:0,value:t.data.profile_completeness,class:L([t.data.profile_completeness<=39?"progressbar":""])},null,8,["value","class"])):R("",!0),t.data.profile_completeness>=40&&t.data.profile_completeness<=59?(p(),U(v,{key:1,class:L(["progressbar_val2",[t.data.profile_completeness>=40&&t.data.profile_completeness<=59]]),value:t.data.profile_completeness},null,8,["class","value"])):R("",!0),t.data.profile_completeness>=60?(p(),U(v,{key:2,class:L(["progressbar_val3",[t.data.profile_completeness>=60]]),value:t.data.profile_completeness},null,8,["class","value"])):R("",!0)]),_:1}),e(d,{field:"enc_user_id",header:"View Profile"},{body:o(t=>[e(D,{to:`/profile-page/${t.data.user_id}`,onClick:g=>N(t.data),class:"px-2 py-1"},{default:o(()=>[ae]),_:2},1032,["to","onClick"])]),_:1})]),_:1},8,["value","filters","loading"])])])}}},oe={class:"confirmation-content"},le=s("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),ne={class:"flex items-center justify-center"},se=["src"],ie={class:"pl-2 font-semibold text-left fs-6"},re=["onClick"],de=s("i",{class:"h-6 py-1 mx-2 pi pi-eye"},null,-1),ce={key:0},pe={key:1},ue={__name:"yet_to_active_employees",setup($){const C=B(),c=P();J(()=>{c.ajax_yet_to_active_employees_data()}),y();let f=y(!1);y(!1),Q();const k=F();function V(_){window.location.href="/pages-profile-new?uid="+_}const N=y({global:{value:null,matchMode:l.CONTAINS},emp_name:{value:null,matchMode:l.STARTS_WITH,matchMode:l.EQUALS,matchMode:l.CONTAINS},emp_code:{value:null,matchMode:l.STARTS_WITH,matchMode:l.EQUALS,matchMode:l.CONTAINS},emp_designation:{value:null,matchMode:l.STARTS_WITH,matchMode:l.EQUALS,matchMode:l.CONTAINS},reporting_manager_name:{value:null,matchMode:l.STARTS_WITH,matchMode:l.EQUALS,matchMode:l.CONTAINS},status:{value:null,matchMode:l.EQUALS}});y(["Pending","Approved","Rejected"]);let r=null,m=null;function M(_,t){_.emp_code,_.emp_status,console.log(P.emp_status),console.log(_.emp_status),f.value=!0,r=t,m=_,console.log("Selected Row Data : "+JSON.stringify(_))}function d(_){c.canShowLoadingScreen=!1,f.value=!1,_&&v()}function v(){r="",m=null}function D(){d(!1),c.canShowLoadingScreen=!0,console.log("Processing Rowdata : "+JSON.stringify(m)),O.post(window.location.origin+"/onboarding/updateEmployeeActive",{user_code:m.emp_code,active_status:1}).then(_=>{console.log("Response : "+_),k.add({severity:"success",summary:"Activated",detail:`${m.emp_name} Activated Successfully`,life:3e3}),v()}).catch(_=>{c.canShowLoadingScreen=!1,v()}).finally(()=>{c.ajax_yet_to_active_employees_data(),c.getActiveEmployees(),c.canShowLoadingScreen=!1,f.value=!1})}return(_,t)=>{const g=u("Toast"),i=u("Button"),Y=u("Dialog"),E=u("InputText"),n=u("Column"),x=u("ProgressBar"),w=u("DataTable");return p(),T("div",null,[e(g),e(Y,{header:"Confirmation",visible:b(f),"onUpdate:visible":t[2]||(t[2]=a=>H(f)?f.value=a:f=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:o(()=>[e(i,{label:"Yes",icon:"pi pi-check",onClick:t[0]||(t[0]=a=>D()),class:"p-button-text",autofocus:""}),e(i,{label:"No",icon:"pi pi-times",onClick:t[1]||(t[1]=a=>d(!0)),class:"p-button-text"})]),default:o(()=>[s("div",oe,[le,s("span",null,"Are you sure you want to "+h(b(r))+"?",1)])]),_:1},8,["visible"]),s("div",null,[e(w,{value:b(c).yet_to_active_employees_data,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rowsPerPageOptions:[5,10,25],filters:N.value,"onUpdate:filters":t[3]||(t[3]=a=>N.value=a),filterDisplay:"menu",globalFilterFields:["emp_name","emp_code","emp_designation","reporting_manager_name","status"]},{empty:o(()=>[S(" No customers found. ")]),loading:o(()=>[S(" Loading customers data. Please wait. ")]),default:o(()=>[e(n,{class:"font-bold",field:"emp_name",header:"Employee Name",style:{"min-width":"5rem"}},{body:o(a=>[s("div",ne,[JSON.parse(a.data.emp_avatar).type=="shortname"?(p(),T("p",{key:0,class:L(["p-2 font-semibold text-white rounded-full w-11 fs-6",b(C).getBackgroundColor(a.index)])},h(JSON.parse(a.data.emp_avatar).data),3)):(p(),T("img",{key:1,class:"w-10 rounded-circle img-md userActive-status profile-img",style:{height:"30px !important",width:"30px !important"},src:`data:image/png;base64,${JSON.parse(a.data.emp_avatar).data}`,srcset:"",alt:""},null,8,se)),s("p",ie,h(a.data.emp_name),1)])]),filter:o(({filterModel:a,filterCallback:I})=>[e(E,{modelValue:a.value,"onUpdate:modelValue":A=>a.value=A,onInput:A=>I(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(n,{field:"emp_code",header:"Employee Code"},{body:o(a=>[S(h(a.data.emp_code),1)]),filter:o(({filterModel:a,filterCallback:I})=>[e(E,{modelValue:a.value,"onUpdate:modelValue":A=>a.value=A,onInput:A=>I(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(n,{field:"emp_designation",header:"Designation",class:""},{filter:o(({filterModel:a,filterCallback:I})=>[e(E,{modelValue:a.value,"onUpdate:modelValue":A=>a.value=A,onInput:A=>I(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(n,{field:"reporting_manager_name",header:"Reporting Manager"},{filter:o(({filterModel:a,filterCallback:I})=>[e(E,{modelValue:a.value,"onUpdate:modelValue":A=>a.value=A,onInput:A=>I(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(n,{field:"doj",header:"DOJ",style:{"min-width":"10rem"}},{body:o(a=>[S(h(b(j)(a.data.doj).format("DD-MMM-YYYY")),1)]),_:1}),e(n,{field:"profile_completeness",header:"Profile Completeness"},{body:o(a=>[a.data.profile_completeness<=39?(p(),U(x,{key:0,value:a.data.profile_completeness,class:L([a.data.profile_completeness<=39?"progressbar":""])},null,8,["value","class"])):R("",!0),a.data.profile_completeness>=40&&a.data.profile_completeness<=59?(p(),U(x,{key:1,class:L(["progressbar_val2",[a.data.profile_completeness>=40&&a.data.profile_completeness<=59]]),value:a.data.profile_completeness},null,8,["class","value"])):R("",!0),a.data.profile_completeness>=60?(p(),U(x,{key:2,class:L(["progressbar_val3",[a.data.profile_completeness>=60]]),value:a.data.profile_completeness},null,8,["class","value"])):R("",!0)]),_:1}),e(n,{field:"is_onboarded",header:"Onboarding Status"},{body:o(a=>[S(h(a.data.is_onboarded?"Completed":"Pending"),1)]),_:1}),e(n,{field:"doc_status",header:"Docs Approval Status"},{body:o(a=>[S(h(a.data.is_onboarded&&a.data.doc_status?"Approved":"Pending"),1)]),_:1}),e(n,{field:"enc_user_id",header:"View Profile"},{body:o(a=>[s("button",{onClick:I=>V(a.data.enc_user_id),class:"px-2 py-1 text-center text-white bg-orange-700 rounded-md whitespace-nowrap"},[de,S("View")],8,re)]),_:1}),e(n,{style:{width:"300px"},field:"",header:"Action"},{body:o(a=>[a.data.is_onboarded&&a.data.doc_status?(p(),T("div",ce,[e(i,{icon:"pi pi-check-circle",severity:"success",label:"Activate",class:"p-button-success Button",onClick:I=>M(a.data,"Active"),style:{height:"2em"}},null,8,["onClick"])])):(p(),T("div",pe))]),_:1})]),_:1},8,["value","filters"])])])}}},me={class:"confirmation-content"},_e=s("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),fe={class:"flex items-center justify-center"},ve=["src"],ge={class:"pl-2 font-semibold text-left fs-6"},he=s("i",{class:"h-6 py-1 mx-2 pi pi-eye text-[#000]"},null,-1),ye={__name:"exit_employees",setup($){const C=B(),c=P();J(()=>{c.ajax_exit_employees_data()}),y();let f=y(!1),k=y(!1);Q();const V=F(),N=W(),r=y({global:{value:null,matchMode:l.CONTAINS},emp_name:{value:null,matchMode:l.STARTS_WITH,matchMode:l.EQUALS,matchMode:l.CONTAINS},emp_code:{value:null,matchMode:l.STARTS_WITH,matchMode:l.EQUALS,matchMode:l.CONTAINS},emp_designation:{value:null,matchMode:l.STARTS_WITH,matchMode:l.EQUALS,matchMode:l.CONTAINS},reporting_manager_name:{value:null,matchMode:l.STARTS_WITH,matchMode:l.EQUALS,matchMode:l.CONTAINS},status:{value:null,matchMode:l.EQUALS},status:{value:null,matchMode:l.EQUALS}});function m(d){console.log("user code ::",d.emp_code),enc_user_id.value=d.data,N.user_code=d.emp_code}function M(){hideConfirmDialog(!1),k.value=!0,console.log("Processing Rowdata : "+JSON.stringify(currentlySelectedRowData)),O.post(window.location.origin+"/attendance-regularization-approvals",{id:currentlySelectedRowData.id,status:currentlySelectedStatus=="Approve"?"Approved":currentlySelectedStatus=="Reject"?"Rejected":currentlySelectedStatus,status_text:""}).then(d=>{console.log("Response : "+d),k.value=!1,V.add({severity:"success",summary:"Info",detail:"Success",life:3e3}),ajax_GetAttRegularizationData(),resetVars()}).catch(d=>{k.value=!1,resetVars()})}return(d,v)=>{const D=u("Toast"),_=u("Button"),t=u("Dialog"),g=u("InputText"),i=u("Column"),Y=u("RouterLink"),E=u("DataTable");return p(),T("div",null,[e(D),e(t,{header:"Confirmation",visible:b(f),"onUpdate:visible":v[2]||(v[2]=n=>H(f)?f.value=n:f=n),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:o(()=>[e(_,{label:"Yes",icon:"pi pi-check",onClick:v[0]||(v[0]=n=>M()),class:"p-button-text",autofocus:""}),e(_,{label:"No",icon:"pi pi-times",onClick:v[1]||(v[1]=n=>d.hideConfirmDialog(!0)),class:"p-button-text"})]),default:o(()=>[s("div",me,[_e,s("span",null,"Are you sure you want to "+h(d.currentlySelectedStatus)+"?",1)])]),_:1},8,["visible"]),s("div",null,[e(E,{value:b(c).exit_employees_data,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rowsPerPageOptions:[5,10,25],filters:r.value,"onUpdate:filters":v[3]||(v[3]=n=>r.value=n),filterDisplay:"menu",globalFilterFields:["emp_name","emp_code","emp_designation","reporting_manager_name","status"]},{empty:o(()=>[S(" No customers found.")]),loading:o(()=>[S(" Loading customers data. Please wait. ")]),default:o(()=>[e(i,{class:"font-bold",field:"emp_name",header:"Employee Name"},{body:o(n=>[s("div",fe,[JSON.parse(n.data.emp_avatar).type=="shortname"?(p(),T("p",{key:0,class:L(["p-2 font-semibold text-white rounded-full w-[35px] fs-6",b(C).getBackgroundColor(n.index)])},h(JSON.parse(n.data.emp_avatar).data),3)):(p(),T("img",{key:1,class:"w-10 rounded-circle img-md userActive-status profile-img",style:{height:"30px !important",width:"30px !important"},src:`data:image/png;base64,${JSON.parse(n.data.emp_avatar).data}`,srcset:"",alt:""},null,8,ve)),s("p",ge,h(n.data.emp_name),1)])]),filter:o(({filterModel:n,filterCallback:x})=>[e(g,{modelValue:n.value,"onUpdate:modelValue":w=>n.value=w,onInput:w=>x(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(i,{field:"emp_code",header:"Employee Code"},{filter:o(({filterModel:n,filterCallback:x})=>[e(g,{modelValue:n.value,"onUpdate:modelValue":w=>n.value=w,onInput:w=>x(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(i,{field:"emp_designation",header:"Designation"},{filter:o(({filterModel:n,filterCallback:x})=>[e(g,{modelValue:n.value,"onUpdate:modelValue":w=>n.value=w,onInput:w=>x(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(i,{field:"reporting_manager_name",header:"Reporting Manager"},{filter:o(({filterModel:n,filterCallback:x})=>[e(g,{modelValue:n.value,"onUpdate:modelValue":w=>n.value=w,onInput:w=>x(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),e(i,{field:"doj",header:"DOJ"},{body:o(n=>[S(h(b(j)(n.data.doj).format("DD-MMM-YYYY")),1)]),_:1}),e(i,{field:"dol",header:"Exit Date"},{body:o(n=>[S(h(b(j)(n.data.dol).format("DD-MMM-YYYY")),1)]),_:1}),e(i,{field:"enc_user_id",header:"View Profile"},{body:o(n=>[e(Y,{to:`/profile-page/${n.data.user_id}`,onClick:x=>m(n.data),class:"px-2 py-1"},{default:o(()=>[he]),_:2},1032,["to","onClick"])]),_:1})]),_:1},8,["value","filters"])])])}}};const Se={class:""},be=s("div",{class:"mb-2 card left-line"},[s("div",{class:"pt-1 pb-0 card-body"},[s("ul",{class:"nav nav-pills nav-tabs-dashed",role:"tablist"},[s("li",{class:"nav-item text-muted",role:"presentation"},[s("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#active_employees","aria-selected":"true",role:"tab"}," Active Employees ")]),s("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[s("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#not_active_employees","aria-selected":"true",role:"tab"}," Yet To Active Employees ")]),s("li",{class:"nav-item text-muted",role:"presentation"},[s("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#exit_employees","aria-selected":"true",role:"tab"}," Exit Employee ")])])])],-1),we={class:"card"},xe={class:"card-body"},Te={class:"tab-content",id:"pills-tabContent"},Ae={class:"tab-pane show fade active",id:"active_employees",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Ce={class:"tab-pane fade",id:"not_active_employees",role:"tabpanel","aria-labelledby":"pills-profile-tab"},ke={class:"tab-pane fade",id:"exit_employees",role:"tabpanel","aria-labelledby":"pills-profile-tab"},$e={__name:"ManageEmployee",setup($){const C=P();return(c,f)=>(p(),T(K,null,[b(C).canShowLoadingScreen?(p(),U(X,{key:0,class:"absolute z-50 bg-white w-[100%] h-[100%]"})):R("",!0),s("div",Se,[be,s("div",we,[s("div",xe,[s("div",Te,[s("div",Ae,[e(te)]),s("div",Ce,[e(ue)]),s("div",ke,[e(ye)])])])])])],64))}};export{$e as default};
