/* empty css              *//* empty css                     *//* empty css                   */import{Q as _,$ as K,a9 as q,a7 as y,ab as W,g as r,o as c,c as d,h as t,w as n,X as H,d as o,t as l,aa as w,l as U,n as L,a as O,b as Z,F as ee,H as te,P as ae,R as oe,u as ne,x as se,I as le,J as ie,K as re,M as ce}from"./inputnumber.esm-e362c3ab.js";import{u as G,a as de,T as ue,B as pe,S as me,s as _e,b as ve}from"./toastservice.esm-8d63d505.js";import"./blockui.esm-da95937b.js";import{a as fe}from"./datatable.esm-5f85e77a.js";import{u as he,C as ge}from"./confirmationservice.esm-62abe3ae.js";import{s as ye}from"./progressspinner.esm-dd1a9f95.js";import{s as be}from"./tag.esm-97cd34b7.js";import{s as we}from"./textarea.esm-36dc9b1f.js";import{d as Se,c as xe}from"./pinia-641035e3.js";import{a as M}from"./index-362795f3.js";import{h as ke}from"./moment-fbc5633a.js";import{S as X}from"./Service-4ef425c0.js";/* empty css                                                                       */import{d as Ce}from"./dayjs.min-2f06af28.js";import{L as Ae}from"./LoadingSpinner-235e9bb4.js";import"./_plugin-vue_export-helper-c27b6911.js";const Q=Se("UseAttendance",()=>({canShowLoadingScreen:_(!1)}));const Te={class:"confirmation-content"},Re=o("i",{class:"mr-2 text-red-600 pi pi-exclamation-triangle",style:{"font-size":"1.3rem"}},null,-1),$e={class:"my-auto"},De={class:"flex w-full p-2 justify-left"},Le={class:"flex items-center !justify-left"},Ne=["src"],Ve={class:"pl-2"},je={class:"text-right"},ze={class:"p-2 text-center"},Ue={key:0},Be={key:1},Ie={class:"text-bold"},Oe={class:"text-bold"},Me={class:"text-bold"},Fe={key:1},Ye={key:0,style:{width:"250px",display:"block"}},Ee={__name:"attendance_regularization",setup(F){const u=Q();let N=_(),p=_(!1);_(!1),he();const C=G(),T=_(""),S=_(),x=X();K("$swal"),q(()=>{p&&(S.value=null)});const k=_({global:{value:null,matchMode:y.CONTAINS},employee_name:{value:null,matchMode:y.STARTS_WITH,matchMode:y.EQUALS,matchMode:y.CONTAINS},status:{value:"Pending",matchMode:y.EQUALS}}),B=_(["Pending","Approved","Rejected"]);let b=null,R=null;W(()=>{I()});function I(){u.canShowLoadingScreen=!0;let m=window.location.origin+"/fetch-att-regularization-data";M.get(m).then(s=>{N.value=Object.values(s.data)}).finally(()=>{u.canShowLoadingScreen=!1})}function V(m,s){p.value=!0,b=s,T.value=s,R=m}function Y(m){p.value=!1,m&&j()}function j(){b="",R=null}const v=m=>{switch(m){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};function f(){Y(!1),u.canShowLoadingScreen=!0,M.post(window.location.origin+"/attendance-regularization-approvals",{record_id:R.id,approver_user_code:x.current_user_code,status:b=="Approve"?"Approved":b=="Reject"?"Rejected":b,status_text:S.value}).then(m=>{m.data.status=="success"?C.add({severity:"success",summary:"Success",detail:"Your request has been recorded successfully",life:3e3}):Swal.fire("Failure",`${m.data.message}`,"error"),j()}).catch(m=>{u.canShowLoadingScreen=!1,j()}).finally(()=>{S.value=null,u.canShowLoadingScreen=!1,I()})}return(m,s)=>{const E=r("Textarea"),$=r("Button"),D=r("Dialog"),P=r("InputText"),h=r("Column"),J=r("Tag"),a=r("Dropdown"),A=r("DataTable");return c(),d("div",null,[t(D,{header:"Confirmation",visible:w(p),"onUpdate:visible":s[2]||(s[2]=e=>H(p)?p.value=e:p=e),breakpoints:{"960px":"80vw","640px":"90vw"},style:{width:"380px"},modal:!0},{footer:n(()=>[t($,{label:"Yes",icon:"pi pi-check",onClick:f,class:"p-button-text",autofocus:""}),t($,{label:"No",icon:"pi pi-times",onClick:s[1]||(s[1]=e=>H(p)?p.value=!1:p=!1),class:"p-button-text"})]),default:n(()=>[o("div",Te,[Re,o("span",$e,"Are you sure you want to "+l(w(b))+"?",1)]),o("div",De,[t(E,{modelValue:S.value,"onUpdate:modelValue":s[0]||(s[0]=e=>S.value=e),rows:"3",cols:"30",class:"border rounded-md"},null,8,["modelValue"])])]),_:1},8,["visible"]),o("div",null,[t(A,{value:w(N),paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],sortField:"attendance_date",sortOrder:-1,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:k.value,"onUpdate:filters":s[3]||(s[3]=e=>k.value=e),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:n(()=>[U(" No Employeee found. ")]),loading:n(()=>[U(" Loading customers data. Please wait. ")]),default:n(()=>[t(h,{field:"employee_name",header:"Employee Name",class:"",style:{width:"12rem !important"}},{body:n(e=>[o("div",Le,[o("div",null,[JSON.parse(e.data.employee_avatar).type=="shortname"?(c(),d("p",{key:0,class:L(["p-2 font-semibold text-white rounded-full w-[30px] text-[14px]",w(x).getBackgroundColor(e.index)])},l(JSON.parse(e.data.employee_avatar).data),3)):(c(),d("img",{key:1,class:"rounded-circle userActive-status profile-img",style:{height:"30px !important",width:"30px !important"},src:`data:image/png;base64,${JSON.parse(e.data.employee_avatar).data}`,srcset:"",alt:""},null,8,Ne))]),o("div",null,[o("p",Ve,l(e.data.employee_name),1)])])]),filter:n(({filterModel:e,filterCallback:z})=>[t(P,{modelValue:e.value,"onUpdate:modelValue":g=>e.value=g,onInput:g=>z(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(h,{field:"attendance_date",header:"Date",sortable:!0,style:{"min-width":"10rem"}},{body:n(e=>[o("h1",je,l(w(ke)(e.data.attendance_date).format("DD-MM-YYYY")),1)]),_:1}),t(h,{field:"regularization_type",header:"Type",style:{"min-width":"10rem"}},{body:n(e=>[o("div",ze,l(e.data.regularization_type),1)]),_:1}),t(h,{field:"user_time",header:"Actual Time",style:{"min-width":"10rem"}}),t(h,{field:"regularize_time",header:"Regularize Time",style:{"min-width":"10rem"}}),t(h,{field:"reason_type",header:"Reason",style:{"min-width":"18rem"}},{body:n(e=>[e.data.reason_type=="Others"?(c(),d("span",Ue,l(e.data.custom_reason),1)):(c(),d("span",Be,l(e.data.reason_type),1))]),_:1}),t(h,{field:"reviewer_name",header:"Approve Name"},{body:n(e=>[o("p",Ie,l(e.data.reviewer_name?e.data.reviewer_name:"---"),1)]),_:1}),t(h,{field:"reviewer_comments",header:"Approve Comments"},{body:n(e=>[o("p",Oe,l(e.data.reviewer_comments?e.data.reviewer_comments:"---"),1)]),_:1}),t(h,{field:"reviewer_reviewed_date",header:"Reviewed Date"},{body:n(e=>[o("p",Me,l(e.data.reviewer_reviewed_date?e.data.reviewer_reviewed_date:"---"),1)]),_:1}),t(h,{field:"status",header:"Status",icon:"pi pi-check"},{body:n(({data:e})=>[t(J,{value:e.status,severity:v(e.status)},null,8,["value","severity"])]),filter:n(({filterModel:e,filterCallback:z})=>[t(a,{modelValue:e.value,"onUpdate:modelValue":g=>e.value=g,onChange:g=>z(),options:B.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:n(g=>[g.value?(c(),d("span",{key:0,class:L("customer-badge status-"+g.value)},l(g.value),3)):(c(),d("span",Fe,l(g.placeholder),1))]),option:n(g=>[o("span",{class:L("customer-badge status-"+g.option)},l(g.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(h,{field:"",header:"Action"},{body:n(e=>[e.data.status=="Pending"?(c(),d("span",Ye,[t($,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approval",onClick:z=>V(e.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t($,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Rejected",style:{"margin-left":"8px",height:"2em"},onClick:z=>V(e.data,"Reject")},null,8,["onClick"])])):O("",!0)]),_:1})]),_:1},8,["value","filters"])])])}}},Pe={class:"flex items-center !justify-left"},Je=["src"],Qe={class:"pl-2"},He={class:"text-bold"},Ke={class:"text-bold"},qe={class:"text-bold"},We={key:1},Ge={key:0,style:{width:"250px",display:"block"}},Xe={class:"confirmation-content"},Ze=o("i",{class:"mr-2 text-red-600 pi pi-exclamation-triangle",style:{"font-size":"1.3rem"}},null,-1),et={class:"my-auto"},tt={key:0,class:"flex w-full p-2 justify-left"},at={__name:"absent_Regularization",setup(F){const u=Q(),N=G(),p=_(),C=X();K("$swal");const T=_(!1);_(!1);const S=_(""),x=_();let k=null,B=null;const b=_({global:{value:null,matchMode:y.CONTAINS},employee_name:{value:null,matchMode:y.STARTS_WITH,matchMode:y.EQUALS,matchMode:y.CONTAINS},status:{value:"Pending",matchMode:y.EQUALS}});q(()=>{T&&(x.value=null)}),W(()=>{R()});async function R(){u.canShowLoadingScreen=!0,await M.get("/fetch-absent-regularization-data").then(v=>{p.value=v.data}).finally(()=>{u.canShowLoadingScreen=!1})}const I=v=>{switch(v){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};function V(v,f){u.canShowLoadingScreen=!0,k=f,S.value=f,B=v}function Y(){u.canShowLoadingScreen=!1}function j(){Y(),u.canShowLoadingScreen=!0,M.post("/approveRejectAbsentRegularization",{record_id:B.id,approver_user_code:C.current_user_code,status:k=="Approve"?"Approved":k=="Reject"?"Rejected":k,status_text:x.value,user_code:C.current_user_code}).then(v=>{v.data.status=="success"?N.add({severity:"success",summary:"Success",detail:"Your request has been recorded successfully",life:3e3}):Swal.fire("Failure",`${v.data.message}`,"error"),R()}).catch(v=>{u.canShowLoadingScreen=!1}).finally(()=>{u.canShowLoadingScreen=!1,x.value=null})}return(v,f)=>{const m=r("InputText"),s=r("Column"),E=r("Tag"),$=r("Dropdown"),D=r("Button"),P=r("DataTable"),h=r("Textarea"),J=r("Dialog");return c(),d("div",null,[t(P,{value:p.value,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],sortField:"attendance_date",sortOrder:-1,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:b.value,"onUpdate:filters":f[0]||(f[0]=a=>b.value=a),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:n(()=>[U(" No Employeee found. ")]),loading:n(()=>[U(" Loading customers data. Please wait. ")]),default:n(()=>[t(s,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:n(a=>[o("div",Pe,[o("div",null,[JSON.parse(a.data.employee_avatar).type=="shortname"?(c(),d("p",{key:0,class:L(["p-2 font-semibold text-white rounded-full w-[30px] text-[14px]",w(C).getBackgroundColor(a.index)])},l(JSON.parse(a.data.employee_avatar).data),3)):(c(),d("img",{key:1,class:"rounded-circle userActive-status profile-img",style:{height:"30px !important",width:"30px !important"},src:`data:image/png;base64,${JSON.parse(a.data.employee_avatar).data}`,srcset:"",alt:""},null,8,Je))]),o("div",null,[o("p",Qe,l(a.data.employee_name),1)])])]),filter:n(({filterModel:a,filterCallback:A})=>[t(m,{modelValue:a.value,"onUpdate:modelValue":e=>a.value=e,onInput:e=>A(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(s,{class:"font-bold",field:"attendance_date",sortable:!0,header:"Attendance Date"},{body:n(a=>[U(l(w(Ce)(a.data.attendance_date).format("DD-MMM-YYYY")),1)]),_:1}),t(s,{class:"font-bold",field:"regularization_type",header:"Regularization Type"}),t(s,{class:"font-bold",field:"checkin_time",header:"Checkin Time"}),t(s,{class:"font-bold",field:"checkout_time",header:"Checkout Time"}),t(s,{class:"font-bold",field:"reason",header:"Reason"}),t(s,{class:"font-bold",field:"custom_reason",header:"Custom Reason"}),t(s,{field:"reviewer_name",header:"Approve Name"},{body:n(a=>[o("p",He,l(a.data.reviewer_name?a.data.reviewer_name:"---"),1)]),_:1}),t(s,{field:"reviewer_comments",header:"Approve Comments"},{body:n(a=>[o("p",Ke,l(a.data.reviewer_comments?a.data.reviewer_comments:"---"),1)]),_:1}),t(s,{field:"reviewer_reviewed_date",header:"Reviewed Date"},{body:n(a=>[o("p",qe,l(a.data.reviewer_reviewed_date?a.data.reviewer_reviewed_date:"---"),1)]),_:1}),t(s,{class:"font-bold",field:"status",header:"Status"},{body:n(({data:a})=>[t(E,{value:a.status,severity:I(a.status)},null,8,["value","severity"])]),filter:n(({filterModel:a,filterCallback:A})=>[t($,{modelValue:a.value,"onUpdate:modelValue":e=>a.value=e,onChange:e=>A(),options:v.statuses,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:n(e=>[e.value?(c(),d("span",{key:0,class:L("customer-badge status-"+e.value)},l(e.value),3)):(c(),d("span",We,l(e.placeholder),1))]),option:n(e=>[o("span",{class:L("customer-badge status-"+e.option)},l(e.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(s,{class:"font-bold",field:"",header:"Action"},{body:n(a=>[a.data.status=="Pending"?(c(),d("span",Ge,[t(D,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approval",onClick:A=>V(a.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t(D,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Rejected",style:{"margin-left":"8px",height:"2em"},onClick:A=>V(a.data,"Reject")},null,8,["onClick"])])):O("",!0)]),_:1})]),_:1},8,["value","filters"]),t(J,{header:"Confirmation",visible:T.value,"onUpdate:visible":f[3]||(f[3]=a=>T.value=a),breakpoints:{"960px":"80vw","640px":"90vw"},style:{width:"380px"},modal:!0},{footer:n(()=>[t(D,{label:"Yes",icon:"pi pi-check",onClick:j,class:"p-button-text",autofocus:""}),t(D,{label:"No",icon:"pi pi-times",onClick:f[2]||(f[2]=a=>T.value=!1),class:"p-button-text"})]),default:n(()=>[o("div",Xe,[Ze,o("span",et,"Are you sure you want to "+l(w(k))+"?",1)]),S.value=="Reject"?(c(),d("div",tt,[t(h,{modelValue:x.value,"onUpdate:modelValue":f[1]||(f[1]=a=>x.value=a),rows:"3",cols:"30",class:"border rounded-md"},null,8,["modelValue"])])):O("",!0)]),_:1},8,["visible"])])}}},ot={class:"w-full"},nt=o("h6",{class:"mb-0 text-lg font-semibold"},"Attendance Regularization Approvals",-1),st=o("div",{class:"p-2 pb-0 my-2 mb-3 rounded-lg shadow tw-card left-line"},[o("div",{class:"flex justify-between"},[o("ul",{class:"bg-white divide-x py-auto nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},[o("li",{class:"nav-item text-muted",role:"presentation"},[o("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#leave_balance","aria-selected":"true",role:"tab"}," Attendance Regularization")]),o("li",{class:"nav-item text-muted",role:"presentation"},[o("a",{class:"pb-2 mx-4 nav-link","data-bs-toggle":"tab",href:"#team_leaveBalance","aria-selected":"false",tabindex:"-1",role:"tab"}," Absent Regularization")])])])],-1),lt={class:"tab-content h-[100vh]",id:"pills-tabContent"},it={class:"tab-pane show fade active",id:"leave_balance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},rt={class:"tab-pane fade show",id:"team_leaveBalance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},ct={__name:"AttRegularizationApproval",setup(F){const u=Q();return(N,p)=>{const C=r("Toast");return c(),d(ee,null,[t(C),w(u).canShowLoadingScreen?(c(),Z(Ae,{key:0,class:"absolute z-50 bg-white w-[100%] h-[100%]"})):O("",!0),o("div",ot,[nt,st,o("div",lt,[o("div",it,[t(Ee)]),o("div",rt,[t(at)])])])],64)}}},i=te(ct),dt=xe();i.use(ae,{ripple:!0});i.use(ge);i.use(de);i.use(dt);i.directive("tooltip",ue);i.directive("badge",pe);i.directive("ripple",oe);i.directive("styleclass",me);i.directive("focustrap",ne);i.component("Button",se);i.component("DataTable",fe);i.component("Column",le);i.component("ConfirmDialog",_e);i.component("Toast",ve);i.component("Dialog",ie);i.component("Dropdown",re);i.component("ProgressSpinner",ye);i.component("InputText",ce);i.component("Tag",be);i.component("Textarea",we);i.mount("#vjs_regularizationTable");
