/* empty css              *//* empty css                     *//* empty css                   */import{V as _,a1 as q,ab as H,a9 as b,ad as W,g as r,o as c,c as u,h as t,w as o,_ as K,d as n,t as l,ac as A,a as U,l as N,n as M,b as Z,F as ee,J as te,P as ae,R as oe,u as ne,x as se,K as le,L as ie,M as re,Q as ce}from"./inputnumber.esm-73df9aee.js";import{u as G,a as de,T as ue,B as pe,S as me,s as _e,b as ve}from"./toastservice.esm-e531ed3d.js";import"./blockui.esm-10f5dbc9.js";import{a as fe}from"./datatable.esm-0b74867b.js";import{u as he,C as ge}from"./confirmationservice.esm-2dc1d679.js";import{s as be}from"./progressspinner.esm-66af5c33.js";import{s as ye}from"./tag.esm-15a4ad47.js";import{s as we}from"./textarea.esm-9f7becb0.js";import{d as Se,c as xe}from"./pinia-86197d42.js";import{a as F}from"./index-362795f3.js";import{h as ke}from"./moment-fbc5633a.js";import{S as X}from"./Service-80d25ec3.js";/* empty css                                                                       */import{d as Ce}from"./dayjs.min-2f06af28.js";import{L as Ae}from"./LoadingSpinner-badf5592.js";import"./_plugin-vue_export-helper-c27b6911.js";const J=Se("UseAttendance",()=>({canShowLoadingScreen:_(!1)}));const Te={class:"confirmation-content"},Re=n("i",{class:"mr-2 text-red-600 pi pi-exclamation-triangle",style:{"font-size":"1.3rem"}},null,-1),$e={class:"my-auto"},Le={key:0,class:"flex w-full p-2 justify-left"},De={class:"pl-2 text-left"},Ve={class:"text-right"},je={class:"p-2 text-center"},ze={key:0},Ne={key:1},Ue={class:"text-bold"},Be={class:"text-bold"},Ie={class:"text-bold"},Me={key:1},Fe={key:0,style:{width:"250px",display:"block"}},Pe={__name:"attendance_regularization",setup(P){const d=J();let D=_(),p=_(!1);_(!1),he();const T=G(),x=_(""),w=_(),k=X();q("$swal"),H(()=>{p&&(w.value=null)});const S=_({global:{value:null,matchMode:b.CONTAINS},employee_name:{value:null,matchMode:b.STARTS_WITH,matchMode:b.EQUALS,matchMode:b.CONTAINS},status:{value:"Pending",matchMode:b.EQUALS}}),B=_(["Pending","Approved","Rejected"]);let y=null,R=null;W(()=>{I()});function I(){d.canShowLoadingScreen=!0;let m=window.location.origin+"/fetch-att-regularization-data";F.get(m).then(s=>{D.value=Object.values(s.data)}).finally(()=>{d.canShowLoadingScreen=!1})}function V(m,s){p.value=!0,y=s,x.value=s,R=m}function O(m){p.value=!1,m&&j()}function j(){y="",R=null}const v=m=>{switch(m){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};function f(){O(!1),d.canShowLoadingScreen=!0,F.post(window.location.origin+"/attendance-regularization-approvals",{record_id:R.id,approver_user_code:k.current_user_code,status:y=="Approve"?"Approved":y=="Reject"?"Rejected":y,status_text:w.value}).then(m=>{m.data.status=="success"?T.add({severity:"success",summary:"Success",detail:"Your request has been recorded successfully",life:3e3}):Swal.fire("Failure",`${m.data.message}`,"error"),j()}).catch(m=>{d.canShowLoadingScreen=!1,j()}).finally(()=>{w.value=null,d.canShowLoadingScreen=!1,I()})}return(m,s)=>{const Y=r("Textarea"),$=r("Button"),L=r("Dialog"),E=r("InputText"),h=r("Column"),Q=r("Tag"),a=r("Dropdown"),C=r("DataTable");return c(),u("div",null,[t(L,{header:"Confirmation",visible:A(p),"onUpdate:visible":s[2]||(s[2]=e=>K(p)?p.value=e:p=e),breakpoints:{"960px":"80vw","640px":"90vw"},style:{width:"380px"},modal:!0},{footer:o(()=>[t($,{label:"Yes",icon:"pi pi-check",onClick:f,class:"p-button-text",autofocus:""}),t($,{label:"No",icon:"pi pi-times",onClick:s[1]||(s[1]=e=>K(p)?p.value=!1:p=!1),class:"p-button-text"})]),default:o(()=>[n("div",Te,[Re,n("span",$e,"Are you sure you want to "+l(A(y))+"?",1)]),x.value=="Reject"?(c(),u("div",Le,[t(Y,{modelValue:w.value,"onUpdate:modelValue":s[0]||(s[0]=e=>w.value=e),rows:"3",cols:"30",class:"border rounded-md"},null,8,["modelValue"])])):U("",!0)]),_:1},8,["visible"]),n("div",null,[t(C,{value:A(D),paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],sortField:"attendance_date",sortOrder:-1,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:S.value,"onUpdate:filters":s[3]||(s[3]=e=>S.value=e),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:o(()=>[N(" No Employeee found. ")]),loading:o(()=>[N(" Loading customers data. Please wait. ")]),default:o(()=>[t(h,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:o(e=>[n("p",De,l(e.data.employee_name),1)]),filter:o(({filterModel:e,filterCallback:z})=>[t(E,{modelValue:e.value,"onUpdate:modelValue":g=>e.value=g,onInput:g=>z(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(h,{field:"attendance_date",header:"Date",sortable:!0,style:{"min-width":"10rem"}},{body:o(e=>[n("h1",Ve,l(A(ke)(e.data.attendance_date).format("DD-MM-YYYY")),1)]),_:1}),t(h,{field:"regularization_type",header:"Type",style:{"min-width":"10rem"}},{body:o(e=>[n("div",je,l(e.data.regularization_type),1)]),_:1}),t(h,{field:"user_time",header:"Actual Time",style:{"min-width":"10rem"}}),t(h,{field:"regularize_time",header:"Regularize Time",style:{"min-width":"10rem"}}),t(h,{field:"reason_type",header:"Reason",style:{"min-width":"18rem"}},{body:o(e=>[e.data.reason_type=="Others"?(c(),u("span",ze,l(e.data.custom_reason),1)):(c(),u("span",Ne,l(e.data.reason_type),1))]),_:1}),t(h,{field:"reviewer_name",header:"Approve Name"},{body:o(e=>[n("p",Ue,l(e.data.reviewer_name?e.data.reviewer_name:"---"),1)]),_:1}),t(h,{field:"reviewer_comments",header:"Approve Comments"},{body:o(e=>[n("p",Be,l(e.data.reviewer_comments?e.data.reviewer_comments:"---"),1)]),_:1}),t(h,{field:"reviewer_reviewed_date",header:"Reviewed Date"},{body:o(e=>[n("p",Ie,l(e.data.reviewer_reviewed_date?e.data.reviewer_reviewed_date:"---"),1)]),_:1}),t(h,{field:"status",header:"Status",icon:"pi pi-check"},{body:o(({data:e})=>[t(Q,{value:e.status,severity:v(e.status)},null,8,["value","severity"])]),filter:o(({filterModel:e,filterCallback:z})=>[t(a,{modelValue:e.value,"onUpdate:modelValue":g=>e.value=g,onChange:g=>z(),options:B.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:o(g=>[g.value?(c(),u("span",{key:0,class:M("customer-badge status-"+g.value)},l(g.value),3)):(c(),u("span",Me,l(g.placeholder),1))]),option:o(g=>[n("span",{class:M("customer-badge status-"+g.option)},l(g.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(h,{field:"",header:"Action"},{body:o(e=>[e.data.status=="Pending"?(c(),u("span",Fe,[t($,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approval",onClick:z=>V(e.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t($,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Rejected",style:{"margin-left":"8px",height:"2em"},onClick:z=>V(e.data,"Reject")},null,8,["onClick"])])):U("",!0)]),_:1})]),_:1},8,["value","filters"])])])}}},Oe={class:"flex justify-content-center align-items-center"},Ye={key:0,if:"",class:"w-3 p-2 text-white bg-blue-900 rounded-full h-18 text-semibold"},Ee=["src"],Qe={class:"pl-2 text-left"},Je={class:"text-bold"},Ke={class:"text-bold"},qe={class:"text-bold"},He={key:1},We={key:0,style:{width:"250px",display:"block"}},Ge={class:"confirmation-content"},Xe=n("i",{class:"mr-2 text-red-600 pi pi-exclamation-triangle",style:{"font-size":"1.3rem"}},null,-1),Ze={class:"my-auto"},et={key:0,class:"flex w-full p-2 justify-left"},tt={__name:"absent_Regularization",setup(P){const d=J(),D=G(),p=_(),T=X();q("$swal");const x=_(!1);_(!1);const w=_(""),k=_();let S=null,B=null;const y=_({global:{value:null,matchMode:b.CONTAINS},employee_name:{value:null,matchMode:b.STARTS_WITH,matchMode:b.EQUALS,matchMode:b.CONTAINS},status:{value:"Pending",matchMode:b.EQUALS}});H(()=>{x&&(k.value=null)}),W(()=>{R()});async function R(){d.canShowLoadingScreen=!0,await F.get("/fetch-absent-regularization-data").then(v=>{p.value=v.data}).finally(()=>{d.canShowLoadingScreen=!1})}const I=v=>{switch(v){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};function V(v,f){d.canShowLoadingScreen=!0,S=f,w.value=f,B=v}function O(){d.canShowLoadingScreen=!1}function j(){O(),d.canShowLoadingScreen=!0,F.post("/approveRejectAbsentRegularization",{record_id:B.id,approver_user_code:T.current_user_code,status:S=="Approve"?"Approved":S=="Reject"?"Rejected":S,status_text:k.value,user_code:T.current_user_code}).then(v=>{v.data.status=="success"?D.add({severity:"success",summary:"Success",detail:"Your request has been recorded successfully",life:3e3}):Swal.fire("Failure",`${v.data.message}`,"error"),R()}).catch(v=>{d.canShowLoadingScreen=!1}).finally(()=>{d.canShowLoadingScreen=!1,k.value=null})}return(v,f)=>{const m=r("InputText"),s=r("Column"),Y=r("Tag"),$=r("Dropdown"),L=r("Button"),E=r("DataTable"),h=r("Textarea"),Q=r("Dialog");return c(),u("div",null,[t(E,{value:p.value,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],sortField:"attendance_date",sortOrder:-1,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:y.value,"onUpdate:filters":f[0]||(f[0]=a=>y.value=a),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:o(()=>[N(" No Employeee found. ")]),loading:o(()=>[N(" Loading customers data. Please wait. ")]),default:o(()=>[t(s,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:o(a=>[n("div",Oe,[JSON.parse(a.data.employee_avatar).type=="shortname"?(c(),u("p",Ye,l(JSON.parse(a.data.employee_avatar).data),1)):(c(),u("img",{key:1,class:"w-3 rounded-circle img-md userActive-status profile-img",style:{height:"30px !important"},src:`data:image/png;base64,${JSON.parse(a.data.employee_avatar).data}`,srcset:"",alt:""},null,8,Ee)),n("p",Qe,l(a.data.employee_name),1)])]),filter:o(({filterModel:a,filterCallback:C})=>[t(m,{modelValue:a.value,"onUpdate:modelValue":e=>a.value=e,onInput:e=>C(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(s,{class:"font-bold",field:"attendance_date",sortable:!0,header:"Attendance Date"},{body:o(a=>[N(l(A(Ce)(a.data.attendance_date).format("DD-MMM-YYYY")),1)]),_:1}),t(s,{class:"font-bold",field:"regularization_type",header:"Regularization Type"}),t(s,{class:"font-bold",field:"checkin_time",header:"Checkin Time"}),t(s,{class:"font-bold",field:"checkout_time",header:"Checkout Time"}),t(s,{class:"font-bold",field:"reason",header:"Reason"}),t(s,{class:"font-bold",field:"custom_reason",header:"Custom Reason"}),t(s,{field:"reviewer_name",header:"Approve Name"},{body:o(a=>[n("p",Je,l(a.data.reviewer_name?a.data.reviewer_name:"---"),1)]),_:1}),t(s,{field:"reviewer_comments",header:"Approve Comments"},{body:o(a=>[n("p",Ke,l(a.data.reviewer_comments?a.data.reviewer_comments:"---"),1)]),_:1}),t(s,{field:"reviewer_reviewed_date",header:"Reviewed Date"},{body:o(a=>[n("p",qe,l(a.data.reviewer_reviewed_date?a.data.reviewer_reviewed_date:"---"),1)]),_:1}),t(s,{class:"font-bold",field:"status",header:"Status"},{body:o(({data:a})=>[t(Y,{value:a.status,severity:I(a.status)},null,8,["value","severity"])]),filter:o(({filterModel:a,filterCallback:C})=>[t($,{modelValue:a.value,"onUpdate:modelValue":e=>a.value=e,onChange:e=>C(),options:v.statuses,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:o(e=>[e.value?(c(),u("span",{key:0,class:M("customer-badge status-"+e.value)},l(e.value),3)):(c(),u("span",He,l(e.placeholder),1))]),option:o(e=>[n("span",{class:M("customer-badge status-"+e.option)},l(e.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(s,{class:"font-bold",field:"",header:"Action"},{body:o(a=>[a.data.status=="Pending"?(c(),u("span",We,[t(L,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approval",onClick:C=>V(a.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t(L,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Rejected",style:{"margin-left":"8px",height:"2em"},onClick:C=>V(a.data,"Reject")},null,8,["onClick"])])):U("",!0)]),_:1})]),_:1},8,["value","filters"]),t(Q,{header:"Confirmation",visible:x.value,"onUpdate:visible":f[3]||(f[3]=a=>x.value=a),breakpoints:{"960px":"80vw","640px":"90vw"},style:{width:"380px"},modal:!0},{footer:o(()=>[t(L,{label:"Yes",icon:"pi pi-check",onClick:j,class:"p-button-text",autofocus:""}),t(L,{label:"No",icon:"pi pi-times",onClick:f[2]||(f[2]=a=>x.value=!1),class:"p-button-text"})]),default:o(()=>[n("div",Ge,[Xe,n("span",Ze,"Are you sure you want to "+l(A(S))+"?",1)]),w.value=="Reject"?(c(),u("div",et,[t(h,{modelValue:k.value,"onUpdate:modelValue":f[1]||(f[1]=a=>k.value=a),rows:"3",cols:"30",class:"border rounded-md"},null,8,["modelValue"])])):U("",!0)]),_:1},8,["visible"])])}}},at={class:"w-full"},ot=n("h6",{class:"mb-0 text-lg font-semibold"},"Attendance Regularization Approvals",-1),nt=n("div",{class:"p-2 pb-0 my-2 mb-3 rounded-lg shadow tw-card left-line"},[n("div",{class:"flex justify-between"},[n("ul",{class:"bg-white divide-x py-auto nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},[n("li",{class:"nav-item text-muted",role:"presentation"},[n("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#leave_balance","aria-selected":"true",role:"tab"}," Attendance Regularization")]),n("li",{class:"nav-item text-muted",role:"presentation"},[n("a",{class:"pb-2 mx-4 nav-link","data-bs-toggle":"tab",href:"#team_leaveBalance","aria-selected":"false",tabindex:"-1",role:"tab"}," Absent Regularization")])])])],-1),st={class:"tab-content h-[100vh]",id:"pills-tabContent"},lt={class:"tab-pane show fade active",id:"leave_balance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},it={class:"tab-pane fade show",id:"team_leaveBalance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},rt={__name:"AttRegularizationApproval",setup(P){const d=J();return(D,p)=>{const T=r("Toast");return c(),u(ee,null,[t(T),A(d).canShowLoadingScreen?(c(),Z(Ae,{key:0,class:"absolute z-50 bg-white w-[100%] h-[100%]"})):U("",!0),n("div",at,[ot,nt,n("div",st,[n("div",lt,[t(Pe)]),n("div",it,[t(tt)])])])],64)}}},i=te(rt),ct=xe();i.use(ae,{ripple:!0});i.use(ge);i.use(de);i.use(ct);i.directive("tooltip",ue);i.directive("badge",pe);i.directive("ripple",oe);i.directive("styleclass",me);i.directive("focustrap",ne);i.component("Button",se);i.component("DataTable",fe);i.component("Column",le);i.component("ConfirmDialog",_e);i.component("Toast",ve);i.component("Dialog",ie);i.component("Dropdown",re);i.component("ProgressSpinner",be);i.component("InputText",ce);i.component("Tag",ye);i.component("Textarea",we);i.mount("#vjs_regularizationTable");
