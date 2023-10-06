import{a as O}from"./index-362795f3.js";import{s as X,r as m,I as Z,z as q,y as H,b as K,R as g,o as W,c as i,e as r,f as d,n as t,l as o,L as Q,g as n,t as s,h as b,i as z,p as $,j as I,k as ee,F as te}from"./app-e27ee384.js";import{h as ae}from"./moment-fbc5633a.js";import{S as G}from"./Service-cb704971.js";/* empty css                                                                       */import{d as ne}from"./dayjs.min-2f06af28.js";import{L as oe}from"./LoadingSpinner-9bb4493a.js";const P=X("UseAttendance",()=>({canShowLoadingScreen:m(!1)}));const le={class:"confirmation-content"},se=n("i",{class:"mr-2 text-red-600 pi pi-exclamation-triangle",style:{"font-size":"1.3rem"}},null,-1),ie={class:"my-auto"},re={class:"flex w-full p-2 justify-left"},de={class:"flex items-center !justify-left"},ce=["src"],ue={class:"pl-2"},pe={class:"text-right"},me={class:"p-2 text-center"},_e={key:0},ve={key:1},fe={class:"text-bold"},he={class:"text-bold"},ge={class:"text-bold"},ye={key:1},be={key:0,style:{width:"250px",display:"block"}},we={__name:"attendance_regularization",setup(M){const c=P();let D=m(),u=m(!1);m(!1),Z();const k=q(),A=m(""),w=m(),S=G();H("$swal"),K(()=>{u&&(w.value=null)});const x=m({global:{value:null,matchMode:g.CONTAINS},employee_name:{value:null,matchMode:g.STARTS_WITH,matchMode:g.EQUALS,matchMode:g.CONTAINS},status:{value:"Pending",matchMode:g.EQUALS}}),U=m(["Pending","Approved","Rejected"]);let y=null,R=null;W(async()=>{await B()});async function B(){c.canShowLoadingScreen=!0;let p=window.location.origin+"/fetch-att-regularization-data";await O.get(p).then(l=>{D.value=Object.values(l.data)}).finally(()=>{c.canShowLoadingScreen=!1})}function N(p,l){u.value=!0,y=l,A.value=l,R=p}function F(p){u.value=!1,p&&j()}function j(){y="",R=null}const _=p=>{switch(p){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};function v(){F(!1),c.canShowLoadingScreen=!0,O.post(window.location.origin+"/attendance-regularization-approvals",{record_id:R.id,approver_user_code:S.current_user_code,status:y=="Approve"?"Approved":y=="Reject"?"Rejected":y,status_text:w.value}).then(p=>{p.data.status=="success"?k.add({severity:"success",summary:"Success",detail:"Your request has been recorded successfully",life:3e3}):Swal.fire("Failure",`${p.data.message}`,"error"),j()}).catch(p=>{c.canShowLoadingScreen=!1,j()}).finally(()=>{w.value=null,c.canShowLoadingScreen=!1,B()})}return(p,l)=>{const Y=i("Textarea"),T=i("Button"),L=i("Dialog"),E=i("InputText"),f=i("Column"),J=i("Tag"),a=i("Dropdown"),C=i("DataTable");return r(),d("div",null,[t(L,{header:"Confirmation",visible:b(u),"onUpdate:visible":l[2]||(l[2]=e=>Q(u)?u.value=e:u=e),breakpoints:{"960px":"80vw","640px":"90vw"},style:{width:"380px"},modal:!0},{footer:o(()=>[t(T,{label:"Yes",icon:"pi pi-check",onClick:v,class:"p-button-text",autofocus:""}),t(T,{label:"No",icon:"pi pi-times",onClick:l[1]||(l[1]=e=>Q(u)?u.value=!1:u=!1),class:"p-button-text"})]),default:o(()=>[n("div",le,[se,n("span",ie,"Are you sure you want to "+s(b(y))+"?",1)]),n("div",re,[t(Y,{modelValue:w.value,"onUpdate:modelValue":l[0]||(l[0]=e=>w.value=e),rows:"3",cols:"30",class:"border rounded-md"},null,8,["modelValue"])])]),_:1},8,["visible"]),n("div",null,[t(C,{value:b(D),paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],sortField:"attendance_date",sortOrder:-1,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:x.value,"onUpdate:filters":l[3]||(l[3]=e=>x.value=e),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:o(()=>[z(" No Employeee found. ")]),loading:o(()=>[z(" Loading customers data. Please wait. ")]),default:o(()=>[t(f,{field:"employee_name",header:"Employee Name",class:"",style:{width:"12rem !important"}},{body:o(e=>[n("div",de,[n("div",null,[JSON.parse(e.data.employee_avatar).type=="shortname"?(r(),d("p",{key:0,class:$(["p-2 font-semibold text-white rounded-full w-[30px] text-[14px]",b(S).getBackgroundColor(e.index)])},s(JSON.parse(e.data.employee_avatar).data),3)):(r(),d("img",{key:1,class:"rounded-circle userActive-status profile-img",style:{height:"30px !important",width:"30px !important"},src:`data:image/png;base64,${JSON.parse(e.data.employee_avatar).data}`,srcset:"",alt:""},null,8,ce))]),n("div",null,[n("p",ue,s(e.data.employee_name),1)])])]),filter:o(({filterModel:e,filterCallback:V})=>[t(E,{modelValue:e.value,"onUpdate:modelValue":h=>e.value=h,onInput:h=>V(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(f,{field:"attendance_date",header:"Date",sortable:!0,style:{"min-width":"10rem"}},{body:o(e=>[n("h1",pe,s(b(ae)(e.data.attendance_date).format("DD-MM-YYYY")),1)]),_:1}),t(f,{field:"regularization_type",header:"Type",style:{"min-width":"10rem"}},{body:o(e=>[n("div",me,s(e.data.regularization_type),1)]),_:1}),t(f,{field:"user_time",header:"Actual Time",style:{"min-width":"10rem"}}),t(f,{field:"regularize_time",header:"Regularize Time",style:{"min-width":"10rem"}}),t(f,{field:"reason_type",header:"Reason",style:{"min-width":"18rem"}},{body:o(e=>[e.data.reason_type=="Others"?(r(),d("span",_e,s(e.data.custom_reason),1)):(r(),d("span",ve,s(e.data.reason_type),1))]),_:1}),t(f,{field:"reviewer_name",header:"Approve Name"},{body:o(e=>[n("p",fe,s(e.data.reviewer_name?e.data.reviewer_name:"---"),1)]),_:1}),t(f,{field:"reviewer_comments",header:"Approve Comments"},{body:o(e=>[n("p",he,s(e.data.reviewer_comments?e.data.reviewer_comments:"---"),1)]),_:1}),t(f,{field:"reviewer_reviewed_date",header:"Reviewed Date"},{body:o(e=>[n("p",ge,s(e.data.reviewer_reviewed_date?e.data.reviewer_reviewed_date:"---"),1)]),_:1}),t(f,{field:"status",header:"Status",icon:"pi pi-check"},{body:o(({data:e})=>[t(J,{value:e.status,severity:_(e.status)},null,8,["value","severity"])]),filter:o(({filterModel:e,filterCallback:V})=>[t(a,{modelValue:e.value,"onUpdate:modelValue":h=>e.value=h,onChange:h=>V(),options:U.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:o(h=>[h.value?(r(),d("span",{key:0,class:$("customer-badge status-"+h.value)},s(h.value),3)):(r(),d("span",ye,s(h.placeholder),1))]),option:o(h=>[n("span",{class:$("customer-badge status-"+h.option)},s(h.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(f,{field:"",header:"Action"},{body:o(e=>[e.data.status=="Pending"?(r(),d("span",be,[t(T,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approval",onClick:V=>N(e.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t(T,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Rejected",style:{"margin-left":"8px",height:"2em"},onClick:V=>N(e.data,"Reject")},null,8,["onClick"])])):I("",!0)]),_:1})]),_:1},8,["value","filters"])])])}}},Se={class:"flex items-center !justify-left"},xe=["src"],ke={class:"pl-2"},Ce={class:"text-bold"},Ae={class:"text-bold"},Re={class:"text-bold"},Te={key:1},Le={key:0,style:{width:"250px",display:"block"}},$e={class:"confirmation-content"},De=n("i",{class:"mr-2 text-red-600 pi pi-exclamation-triangle",style:{"font-size":"1.3rem"}},null,-1),Ne={class:"my-auto"},je={key:0,class:"flex w-full p-2 justify-left"},Ve={__name:"absent_Regularization",setup(M){const c=P(),D=q(),u=m(),k=G();H("$swal");const A=m(!1);m(!1);const w=m(""),S=m();let x=null,U=null;const y=m({global:{value:null,matchMode:g.CONTAINS},employee_name:{value:null,matchMode:g.STARTS_WITH,matchMode:g.EQUALS,matchMode:g.CONTAINS},status:{value:"Pending",matchMode:g.EQUALS}});K(()=>{A&&(S.value=null)}),W(async()=>{await R()});async function R(){c.canShowLoadingScreen=!0,await O.get("/fetch-absent-regularization-data").then(_=>{u.value=_.data}).finally(()=>{c.canShowLoadingScreen=!1})}const B=_=>{switch(_){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};function N(_,v){c.canShowLoadingScreen=!0,x=v,w.value=v,U=_}function F(){c.canShowLoadingScreen=!1}function j(){F(),c.canShowLoadingScreen=!0,O.post("/approveRejectAbsentRegularization",{record_id:U.id,approver_user_code:k.current_user_code,status:x=="Approve"?"Approved":x=="Reject"?"Rejected":x,status_text:S.value,user_code:k.current_user_code}).then(_=>{_.data.status=="success"?D.add({severity:"success",summary:"Success",detail:"Your request has been recorded successfully",life:3e3}):Swal.fire("Failure",`${_.data.message}`,"error"),R()}).catch(_=>{c.canShowLoadingScreen=!1}).finally(()=>{c.canShowLoadingScreen=!1,S.value=null})}return(_,v)=>{const p=i("InputText"),l=i("Column"),Y=i("Tag"),T=i("Dropdown"),L=i("Button"),E=i("DataTable"),f=i("Textarea"),J=i("Dialog");return r(),d("div",null,[t(E,{value:u.value,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],sortField:"attendance_date",sortOrder:-1,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:y.value,"onUpdate:filters":v[0]||(v[0]=a=>y.value=a),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:o(()=>[z(" No Employeee found. ")]),loading:o(()=>[z(" Loading customers data. Please wait. ")]),default:o(()=>[t(l,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:o(a=>[n("div",Se,[n("div",null,[JSON.parse(a.data.employee_avatar).type=="shortname"?(r(),d("p",{key:0,class:$(["p-2 font-semibold text-white rounded-full w-[30px] text-[14px]",b(k).getBackgroundColor(a.index)])},s(JSON.parse(a.data.employee_avatar).data),3)):(r(),d("img",{key:1,class:"rounded-circle userActive-status profile-img",style:{height:"30px !important",width:"30px !important"},src:`data:image/png;base64,${JSON.parse(a.data.employee_avatar).data}`,srcset:"",alt:""},null,8,xe))]),n("div",null,[n("p",ke,s(a.data.employee_name),1)])])]),filter:o(({filterModel:a,filterCallback:C})=>[t(p,{modelValue:a.value,"onUpdate:modelValue":e=>a.value=e,onInput:e=>C(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(l,{class:"font-bold",field:"attendance_date",sortable:!0,header:"Attendance Date"},{body:o(a=>[z(s(b(ne)(a.data.attendance_date).format("DD-MMM-YYYY")),1)]),_:1}),t(l,{class:"font-bold",field:"regularization_type",header:"Regularization Type"}),t(l,{class:"font-bold",field:"checkin_time",header:"Checkin Time"}),t(l,{class:"font-bold",field:"checkout_time",header:"Checkout Time"}),t(l,{class:"font-bold",field:"reason",header:"Reason"}),t(l,{class:"font-bold",field:"custom_reason",header:"Custom Reason"}),t(l,{field:"reviewer_name",header:"Approve Name"},{body:o(a=>[n("p",Ce,s(a.data.reviewer_name?a.data.reviewer_name:"---"),1)]),_:1}),t(l,{field:"reviewer_comments",header:"Approve Comments"},{body:o(a=>[n("p",Ae,s(a.data.reviewer_comments?a.data.reviewer_comments:"---"),1)]),_:1}),t(l,{field:"reviewer_reviewed_date",header:"Reviewed Date"},{body:o(a=>[n("p",Re,s(a.data.reviewer_reviewed_date?a.data.reviewer_reviewed_date:"---"),1)]),_:1}),t(l,{class:"font-bold",field:"status",header:"Status"},{body:o(({data:a})=>[t(Y,{value:a.status,severity:B(a.status)},null,8,["value","severity"])]),filter:o(({filterModel:a,filterCallback:C})=>[t(T,{modelValue:a.value,"onUpdate:modelValue":e=>a.value=e,onChange:e=>C(),options:_.statuses,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:o(e=>[e.value?(r(),d("span",{key:0,class:$("customer-badge status-"+e.value)},s(e.value),3)):(r(),d("span",Te,s(e.placeholder),1))]),option:o(e=>[n("span",{class:$("customer-badge status-"+e.option)},s(e.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(l,{class:"font-bold",field:"",header:"Action"},{body:o(a=>[a.data.status=="Pending"?(r(),d("span",Le,[t(L,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approval",onClick:C=>N(a.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t(L,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Rejected",style:{"margin-left":"8px",height:"2em"},onClick:C=>N(a.data,"Reject")},null,8,["onClick"])])):I("",!0)]),_:1})]),_:1},8,["value","filters"]),t(J,{header:"Confirmation",visible:A.value,"onUpdate:visible":v[3]||(v[3]=a=>A.value=a),breakpoints:{"960px":"80vw","640px":"90vw"},style:{width:"380px"},modal:!0},{footer:o(()=>[t(L,{label:"Yes",icon:"pi pi-check",onClick:j,class:"p-button-text",autofocus:""}),t(L,{label:"No",icon:"pi pi-times",onClick:v[2]||(v[2]=a=>A.value=!1),class:"p-button-text"})]),default:o(()=>[n("div",$e,[De,n("span",Ne,"Are you sure you want to "+s(b(x))+"?",1)]),w.value=="Reject"?(r(),d("div",je,[t(f,{modelValue:S.value,"onUpdate:modelValue":v[1]||(v[1]=a=>S.value=a),rows:"3",cols:"30",class:"border rounded-md"},null,8,["modelValue"])])):I("",!0)]),_:1},8,["visible"])])}}},ze={class:"w-full"},Ue=n("h6",{class:"mb-0 text-lg font-semibold"},"Attendance Regularization Approvals",-1),Be=n("div",{class:"p-2 pb-0 my-2 mb-3 rounded-lg shadow tw-card left-line"},[n("div",{class:"flex justify-between"},[n("ul",{class:"bg-white divide-x py-auto nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},[n("li",{class:"nav-item text-muted",role:"presentation"},[n("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#leave_balance","aria-selected":"true",role:"tab"}," Attendance Regularization")]),n("li",{class:"nav-item text-muted",role:"presentation"},[n("a",{class:"pb-2 mx-4 nav-link","data-bs-toggle":"tab",href:"#team_leaveBalance","aria-selected":"false",tabindex:"-1",role:"tab"}," Absent Regularization")])])])],-1),Oe={class:"tab-content h-[100vh]",id:"pills-tabContent"},Ie={class:"tab-pane show fade active",id:"leave_balance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Me={class:"tab-pane fade show",id:"team_leaveBalance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},He={__name:"AttRegularizationApproval",setup(M){const c=P();return(D,u)=>{const k=i("Toast");return r(),d(te,null,[t(k),b(c).canShowLoadingScreen?(r(),ee(oe,{key:0,class:"absolute z-50 bg-white w-[100%] h-[100%]"})):I("",!0),n("div",ze,[Ue,Be,n("div",Oe,[n("div",Ie,[t(we)]),n("div",Me,[t(Ve)])])])],64)}}};export{He as default};
