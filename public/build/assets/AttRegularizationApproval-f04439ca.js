import{a as O}from"./index-0d903406.js";import{C as te,r as u,H as ae,G as K,a3 as W,b as X,a1 as b,o as Z,c,e as p,f as m,n as t,l as n,Q as G,g as o,t as s,h as x,i as z,p as L,j as I,k as oe,F as ne}from"./app-97e3c529.js";import{h as le}from"./moment-fbc5633a.js";import{S as ee}from"./Service-a263ad12.js";import{d as F}from"./dayjs.min-25482546.js";/* empty css                                                                       */import{L as se}from"./LoadingSpinner-34e5ba8a.js";const q=te("UseAttendance",()=>({canShowLoadingScreen:u(!1)}));const ie={class:"confirmation-content"},re=o("i",{class:"mr-2 text-red-600 pi pi-exclamation-triangle",style:{"font-size":"1.3rem"}},null,-1),de={class:"my-auto"},ce={class:"flex w-full p-2 justify-left"},ue={class:"relative"},pe={class:"absolute top-[-80px] right-0"},me={class:"flex items-center !justify-left"},_e=["src"],ve={class:"pl-2"},he={class:"text-right"},fe={class:"p-2 text-center"},ge={key:0},ye={key:1},be={class:"text-bold"},we={class:"text-bold"},xe={class:"text-bold"},Se={key:1},ke={key:0,style:{width:"250px",display:"block"}},Ce={__name:"attendance_regularization",setup(Y){const _=q();let V=u(),v=u(!1);u(!1),ae();const C=K(),A=u(""),S=u(),k=ee();W("$swal");const y=u();X(()=>{v&&(S.value=null)});const N=u({global:{value:null,matchMode:b.CONTAINS},employee_name:{value:null,matchMode:b.STARTS_WITH,matchMode:b.EQUALS,matchMode:b.CONTAINS},status:{value:"Pending",matchMode:b.EQUALS}}),$=u(["Pending","Approved","Rejected"]);let w=null,j=null;Z(async()=>{await R(F().month()+1,F().year())});async function R(l,i){_.canShowLoadingScreen=!0;let T=window.location.origin+"/fetch-att-regularization-data";await O.post(T,{month:l,year:i}).then(r=>{V.value=r.data.data}).finally(()=>{_.canShowLoadingScreen=!1})}function B(l,i){v.value=!0,w=i,A.value=i,j=l}function M(l){v.value=!1,l&&U()}function U(){w="",j=null}const E=l=>{switch(l){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};function g(){M(!1),_.canShowLoadingScreen=!0,O.post(window.location.origin+"/attendance-regularization-approvals",{record_id:j.id,approver_user_code:k.current_user_code,status:w=="Approve"?"Approved":w=="Reject"?"Rejected":w,status_text:S.value}).then(l=>{l.data.status=="success"?C.add({severity:"success",summary:"Success",detail:"Your request has been recorded successfully",life:3e3}):Swal.fire("Failure",`${l.data.message}`,"error"),U()}).catch(l=>{_.canShowLoadingScreen=!1,U()}).finally(()=>{S.value=null,_.canShowLoadingScreen=!1,R()})}return(l,i)=>{const T=c("Textarea"),r=c("Button"),J=c("Dialog"),Q=c("Calendar"),D=c("InputText"),h=c("Column"),H=c("Tag"),P=c("Dropdown"),a=c("DataTable");return p(),m("div",null,[t(J,{header:"Confirmation",visible:x(v),"onUpdate:visible":i[2]||(i[2]=e=>G(v)?v.value=e:v=e),breakpoints:{"960px":"80vw","640px":"90vw"},style:{width:"380px"},modal:!0},{footer:n(()=>[t(r,{label:"Yes",icon:"pi pi-check",onClick:g,class:"p-button-text",autofocus:""}),t(r,{label:"No",icon:"pi pi-times",onClick:i[1]||(i[1]=e=>G(v)?v.value=!1:v=!1),class:"p-button-text"})]),default:n(()=>[o("div",ie,[re,o("span",de,"Are you sure you want to "+s(x(w))+"?",1)]),o("div",ce,[t(T,{modelValue:S.value,"onUpdate:modelValue":i[0]||(i[0]=e=>S.value=e),rows:"3",cols:"30",class:"border rounded-md"},null,8,["modelValue"])])]),_:1},8,["visible"]),o("div",ue,[o("div",pe,[t(Q,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:y.value,"onUpdate:modelValue":i[3]||(i[3]=e=>y.value=e),style:{"border-radius":"7px",height:"30px"},onDateSelect:i[4]||(i[4]=e=>R(y.value.getMonth()+1,y.value.getFullYear()))},null,8,["modelValue"])]),t(a,{value:x(V),paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],sortField:"attendance_date",sortOrder:-1,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:N.value,"onUpdate:filters":i[5]||(i[5]=e=>N.value=e),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:n(()=>[z(" No Employeee found. ")]),loading:n(()=>[z(" Loading customers data. Please wait. ")]),default:n(()=>[t(h,{field:"employee_name",header:"Employee Name",class:"",style:{width:"12rem !important"}},{body:n(e=>[o("div",me,[o("div",null,[e.data.employee_avatar&&JSON.parse(e.data.employee_avatar).type=="shortname"?(p(),m("p",{key:0,class:L(["p-2 font-semibold text-white rounded-full w-[30px] text-[14px]",x(k).getBackgroundColor(e.index)])},s(e.data.employee_avatar?JSON.parse(e.data.employee_avatar).data:null),3)):(p(),m("img",{key:1,class:"rounded-circle userActive-status profile-img",style:{height:"30px !important",width:"30px !important"},src:`data:image/png;base64,${e.data.employee_avatar?JSON.parse(e.data.employee_avatar).data:""}`,srcset:"",alt:""},null,8,_e))]),o("div",null,[o("p",ve,s(e.data.employee_name),1)])])]),filter:n(({filterModel:e,filterCallback:d})=>[t(D,{modelValue:e.value,"onUpdate:modelValue":f=>e.value=f,onInput:f=>d(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(h,{field:"attendance_date",header:"Date",sortable:!0,style:{"min-width":"10rem"}},{body:n(e=>[o("h1",he,s(x(le)(e.data.attendance_date).format("DD-MM-YYYY")),1)]),_:1}),t(h,{field:"regularization_type",header:"Type",style:{"min-width":"10rem"}},{body:n(e=>[o("div",fe,s(e.data.regularization_type),1)]),_:1}),t(h,{field:"user_time",header:"Actual Time",style:{"min-width":"10rem"}}),t(h,{field:"regularize_time",header:"Regularize Time",style:{"min-width":"10rem"}}),t(h,{field:"reason_type",header:"Reason",style:{"min-width":"18rem"}},{body:n(e=>[e.data.reason_type=="Others"?(p(),m("span",ge,s(e.data.custom_reason),1)):(p(),m("span",ye,s(e.data.reason_type),1))]),_:1}),t(h,{field:"reviewer_name",header:"Approve Name"},{body:n(e=>[o("p",be,s(e.data.reviewer_name?e.data.reviewer_name:"---"),1)]),_:1}),t(h,{field:"reviewer_comments",header:"Approve Comments"},{body:n(e=>[o("p",we,s(e.data.reviewer_comments?e.data.reviewer_comments:"---"),1)]),_:1}),t(h,{field:"reviewer_reviewed_date",header:"Reviewed Date"},{body:n(e=>[o("p",xe,s(e.data.reviewer_reviewed_date?e.data.reviewer_reviewed_date:"---"),1)]),_:1}),t(h,{field:"status",header:"Status",icon:"pi pi-check"},{body:n(({data:e})=>[t(H,{value:e.status,severity:E(e.status)},null,8,["value","severity"])]),filter:n(({filterModel:e,filterCallback:d})=>[t(P,{modelValue:e.value,"onUpdate:modelValue":f=>e.value=f,onChange:f=>d(),options:$.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:n(f=>[f.value?(p(),m("span",{key:0,class:L("customer-badge status-"+f.value)},s(f.value),3)):(p(),m("span",Se,s(f.placeholder),1))]),option:n(f=>[o("span",{class:L("customer-badge status-"+f.option)},s(f.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(h,{field:"",header:"Action"},{body:n(e=>[e.data.status=="Pending"?(p(),m("span",ke,[t(r,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approval",onClick:d=>B(e.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t(r,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Rejected",style:{"margin-left":"8px",height:"2em"},onClick:d=>B(e.data,"Reject")},null,8,["onClick"])])):I("",!0)]),_:1})]),_:1},8,["value","filters"])])])}}},Ae={class:"relative"},Re={class:"absolute top-[-80px] right-0"},Te={class:"flex items-center !justify-left"},$e=["src"],De={class:"pl-2"},Le={class:"text-bold"},Ve={class:"text-bold"},Ne={class:"text-bold"},je={key:1},Ue={key:0,style:{width:"250px",display:"block"}},ze={class:"confirmation-content"},Fe=o("i",{class:"mr-2 text-red-600 pi pi-exclamation-triangle",style:{"font-size":"1.3rem"}},null,-1),Be={class:"my-auto"},Me={key:0,class:"flex w-full p-2 justify-left"},Oe={__name:"absent_Regularization",setup(Y){const _=q(),V=K(),v=u(),C=ee();W("$swal");const A=u(!1);u(!1);const S=u(""),k=u();let y=null,N=null;const $=u(),w=u({global:{value:null,matchMode:b.CONTAINS},employee_name:{value:null,matchMode:b.STARTS_WITH,matchMode:b.EQUALS,matchMode:b.CONTAINS},status:{value:"Pending",matchMode:b.EQUALS}}),j=u(["Pending","Approved","Rejected"]);X(()=>{A&&(k.value=null)}),Z(async()=>{await R(F().month()+1,F().year())});async function R(g,l){_.canShowLoadingScreen=!0;let i=window.location.origin+"/fetch-absent-regularization-data";await O.post(i,{month:g,year:l}).then(T=>{v.value=T.data.data}).finally(()=>{_.canShowLoadingScreen=!1})}const B=g=>{switch(g){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};function M(g,l){y=l,S.value=l,N=g,A.value=!0}function U(){_.canShowLoadingScreen=!1}function E(){U(),_.canShowLoadingScreen=!0,O.post("/approveRejectAbsentRegularization",{record_id:N.id,approver_user_code:C.current_user_code,status:y=="Approve"?"Approved":y=="Reject"?"Rejected":y,status_text:k.value,user_code:C.current_user_code}).then(g=>{g.data.status=="success"?V.add({severity:"success",summary:"Success",detail:"Your request has been recorded successfully",life:3e3}):Swal.fire("Failure",`${g.data.message}`,"error"),R()}).catch(g=>{_.canShowLoadingScreen=!1}).finally(()=>{_.canShowLoadingScreen=!1,k.value=null})}return(g,l)=>{const i=c("Calendar"),T=c("InputText"),r=c("Column"),J=c("Tag"),Q=c("Dropdown"),D=c("Button"),h=c("DataTable"),H=c("Textarea"),P=c("Dialog");return p(),m("div",Ae,[o("div",Re,[t(i,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:$.value,"onUpdate:modelValue":l[0]||(l[0]=a=>$.value=a),style:{"border-radius":"7px",height:"30px"},onDateSelect:l[1]||(l[1]=a=>R($.value.getMonth()+1,$.value.getFullYear()))},null,8,["modelValue"])]),t(h,{value:v.value,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],sortField:"attendance_date",sortOrder:-1,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:w.value,"onUpdate:filters":l[2]||(l[2]=a=>w.value=a),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:n(()=>[z(" No Employeee found. ")]),loading:n(()=>[z(" Loading customers data. Please wait. ")]),default:n(()=>[t(r,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:n(a=>[o("div",Te,[o("div",null,[JSON.parse(a.data.employee_avatar).type=="shortname"?(p(),m("p",{key:0,class:L(["p-2 font-semibold text-white rounded-full w-[30px] text-[14px]",x(C).getBackgroundColor(a.index)])},s(JSON.parse(a.data.employee_avatar).data),3)):(p(),m("img",{key:1,class:"rounded-circle userActive-status profile-img",style:{height:"30px !important",width:"30px !important"},src:`data:image/png;base64,${JSON.parse(a.data.employee_avatar).data}`,srcset:"",alt:""},null,8,$e))]),o("div",null,[o("p",De,s(a.data.employee_name),1)])])]),filter:n(({filterModel:a,filterCallback:e})=>[t(T,{modelValue:a.value,"onUpdate:modelValue":d=>a.value=d,onInput:d=>e(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(r,{class:"font-bold",field:"attendance_date",sortable:!0,header:"Attendance Date"},{body:n(a=>[z(s(x(F)(a.data.attendance_date).format("DD-MMM-YYYY")),1)]),_:1}),t(r,{class:"font-bold",field:"regularization_type",header:"Regularization Type"}),t(r,{class:"font-bold",field:"checkin_time",header:"Checkin Time"}),t(r,{class:"font-bold",field:"checkout_time",header:"Checkout Time"}),t(r,{class:"font-bold",field:"reason",header:"Reason"}),t(r,{class:"font-bold",field:"custom_reason",header:"Custom Reason"}),t(r,{field:"reviewer_name",header:"Approve Name"},{body:n(a=>[o("p",Le,s(a.data.reviewer_name?a.data.reviewer_name:"---"),1)]),_:1}),t(r,{field:"reviewer_comments",header:"Approve Comments"},{body:n(a=>[o("p",Ve,s(a.data.reviewer_comments?a.data.reviewer_comments:"---"),1)]),_:1}),t(r,{field:"reviewer_reviewed_date",header:"Reviewed Date"},{body:n(a=>[o("p",Ne,s(a.data.reviewer_reviewed_date?a.data.reviewer_reviewed_date:"---"),1)]),_:1}),t(r,{class:"font-bold",field:"status",header:"Status"},{body:n(({data:a})=>[t(J,{value:a.status,severity:B(a.status)},null,8,["value","severity"])]),filter:n(({filterModel:a,filterCallback:e})=>[t(Q,{modelValue:a.value,"onUpdate:modelValue":d=>a.value=d,onChange:d=>e(),options:j.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:n(d=>[d.value?(p(),m("span",{key:0,class:L("customer-badge status-"+d.value)},s(d.value),3)):(p(),m("span",je,s(d.placeholder),1))]),option:n(d=>[o("span",{class:L("customer-badge status-"+d.option)},s(d.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(r,{class:"font-bold",field:"",header:"Action"},{body:n(a=>[a.data.status=="Pending"?(p(),m("span",Ue,[t(D,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approval",onClick:e=>M(a.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t(D,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Rejected",style:{"margin-left":"8px",height:"2em"},onClick:e=>M(a.data,"Reject")},null,8,["onClick"])])):I("",!0)]),_:1})]),_:1},8,["value","filters"]),t(P,{header:"Confirmation",visible:A.value,"onUpdate:visible":l[5]||(l[5]=a=>A.value=a),breakpoints:{"960px":"80vw","640px":"90vw"},style:{width:"380px"},modal:!0},{footer:n(()=>[t(D,{label:"Yes",icon:"pi pi-check",onClick:E,class:"p-button-text",autofocus:""}),t(D,{label:"No",icon:"pi pi-times",onClick:l[4]||(l[4]=a=>A.value=!1),class:"p-button-text"})]),default:n(()=>[o("div",ze,[Fe,o("span",Be,"Are you sure you want to "+s(x(y))+"?",1)]),S.value=="Reject"?(p(),m("div",Me,[t(H,{modelValue:k.value,"onUpdate:modelValue":l[3]||(l[3]=a=>k.value=a),rows:"3",cols:"30",class:"border rounded-md"},null,8,["modelValue"])])):I("",!0)]),_:1},8,["visible"])])}}},Ie={class:"w-full"},Ye=o("h6",{class:"mb-0 text-[18px] font-semibold my-4"},"Attendance Regularization Approvals",-1),Ee=o("div",{class:"p-2 pb-0 my-2 mb-3 rounded-lg"},[o("div",{class:"flex justify-between"},[o("ul",{class:"py-auto nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},[o("li",{class:"nav-item text-muted",role:"presentation"},[o("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#leave_balance","aria-selected":"true",role:"tab"}," Attendance Regularization")]),o("li",{class:"nav-item text-muted",role:"presentation"},[o("a",{class:"pb-2 mx-4 nav-link","data-bs-toggle":"tab",href:"#team_leaveBalance","aria-selected":"false",tabindex:"-1",role:"tab"}," Absent Regularization")])])])],-1),Je={class:"tab-content h-[100vh]",id:"pills-tabContent"},Qe={class:"tab-pane show fade active",id:"leave_balance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},He={class:"tab-pane fade show",id:"team_leaveBalance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},et={__name:"AttRegularizationApproval",setup(Y){const _=q();return(V,v)=>{const C=c("Toast");return p(),m(ne,null,[t(C),x(_).canShowLoadingScreen?(p(),oe(se,{key:0,class:"absolute z-50 bg-white w-[100%] h-[100%]"})):I("",!0),o("div",Ie,[Ye,Ee,o("div",Je,[o("div",Qe,[t(Ce)]),o("div",He,[t(Oe)])])])],64)}}};export{et as default};
