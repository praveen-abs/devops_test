/* empty css              *//* empty css                     *//* empty css                   */import{H as m,a1 as K,ab as q,a9 as b,I as W,g as r,o as d,c as _,h as t,w as o,_ as H,d as n,t as l,J as k,l as N,n as I,a as M,b as Z,F as ee,K as te,P as ae,R as oe,u as ne,x as se,L as le,M as ie,N as re,S as ce}from"./inputnumber.esm-2ef94937.js";import{u as G,a as de,T as ue,B as pe,S as me,s as _e,b as ve}from"./toastservice.esm-a2aa885f.js";import"./blockui.esm-1772f2aa.js";import{a as fe}from"./datatable.esm-9e333783.js";import{u as he,C as ge}from"./confirmationservice.esm-d19112e7.js";import{s as be}from"./progressspinner.esm-311b8ec7.js";import{s as ye}from"./tag.esm-6b8c150f.js";import{s as we}from"./textarea.esm-e60302eb.js";import{d as Se,c as xe}from"./pinia-0d96afee.js";import{a as F}from"./index-362795f3.js";import{h as Ce}from"./moment-fbc5633a.js";import{S as X}from"./Service-344253a0.js";/* empty css                                                                       */import{d as ke}from"./dayjs.min-2f06af28.js";import{L as Ae}from"./LoadingSpinner-9dbead47.js";import"./_plugin-vue_export-helper-c27b6911.js";const Q=Se("UseAttendance",()=>({canShowLoadingScreen:m(!1)}));const Te={class:"confirmation-content"},Re=n("i",{class:"mr-2 text-red-600 pi pi-exclamation-triangle",style:{"font-size":"1.3rem"}},null,-1),$e={class:"my-auto"},Le={class:"flex w-full p-2 justify-left"},De={class:"pl-2 text-left"},Ve={class:"text-right"},je={class:"p-2 text-center"},ze={key:0},Ne={key:1},Ue={class:"text-bold"},Be={class:"text-bold"},Ie={class:"text-bold"},Me={key:1},Fe={key:0,style:{width:"250px",display:"block"}},Pe={__name:"attendance_regularization",setup(P){const c=Q();let D=m(),u=m(!1);m(!1),he();const A=G(),T=m(""),w=m(),x=X();K("$swal"),q(()=>{u&&(w.value=null)});const S=m({global:{value:null,matchMode:b.CONTAINS},employee_name:{value:null,matchMode:b.STARTS_WITH,matchMode:b.EQUALS,matchMode:b.CONTAINS},status:{value:"Pending",matchMode:b.EQUALS}}),U=m(["Pending","Approved","Rejected"]);let y=null,R=null;W(()=>{B()});function B(){c.canShowLoadingScreen=!0;let p=window.location.origin+"/fetch-att-regularization-data";F.get(p).then(s=>{D.value=Object.values(s.data)}).finally(()=>{c.canShowLoadingScreen=!1})}function V(p,s){u.value=!0,y=s,T.value=s,R=p}function O(p){u.value=!1,p&&j()}function j(){y="",R=null}const v=p=>{switch(p){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};function f(){O(!1),c.canShowLoadingScreen=!0,F.post(window.location.origin+"/attendance-regularization-approvals",{record_id:R.id,approver_user_code:x.current_user_code,status:y=="Approve"?"Approved":y=="Reject"?"Rejected":y,status_text:w.value}).then(p=>{p.data.status=="success"?A.add({severity:"success",summary:"Success",detail:"Your request has been recorded successfully",life:3e3}):Swal.fire("Failure",`${p.data.message}`,"error"),j()}).catch(p=>{c.canShowLoadingScreen=!1,j()}).finally(()=>{w.value=null,c.canShowLoadingScreen=!1,B()})}return(p,s)=>{const Y=r("Textarea"),$=r("Button"),L=r("Dialog"),E=r("InputText"),h=r("Column"),J=r("Tag"),a=r("Dropdown"),C=r("DataTable");return d(),_("div",null,[t(L,{header:"Confirmation",visible:k(u),"onUpdate:visible":s[2]||(s[2]=e=>H(u)?u.value=e:u=e),breakpoints:{"960px":"80vw","640px":"90vw"},style:{width:"380px"},modal:!0},{footer:o(()=>[t($,{label:"Yes",icon:"pi pi-check",onClick:f,class:"p-button-text",autofocus:""}),t($,{label:"No",icon:"pi pi-times",onClick:s[1]||(s[1]=e=>H(u)?u.value=!1:u=!1),class:"p-button-text"})]),default:o(()=>[n("div",Te,[Re,n("span",$e,"Are you sure you want to "+l(k(y))+"?",1)]),n("div",Le,[t(Y,{modelValue:w.value,"onUpdate:modelValue":s[0]||(s[0]=e=>w.value=e),rows:"3",cols:"30",class:"border rounded-md"},null,8,["modelValue"])])]),_:1},8,["visible"]),n("div",null,[t(C,{value:k(D),paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],sortField:"attendance_date",sortOrder:-1,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:S.value,"onUpdate:filters":s[3]||(s[3]=e=>S.value=e),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:o(()=>[N(" No Employeee found. ")]),loading:o(()=>[N(" Loading customers data. Please wait. ")]),default:o(()=>[t(h,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:o(e=>[n("p",De,l(e.data.employee_name),1)]),filter:o(({filterModel:e,filterCallback:z})=>[t(E,{modelValue:e.value,"onUpdate:modelValue":g=>e.value=g,onInput:g=>z(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(h,{field:"attendance_date",header:"Date",sortable:!0,style:{"min-width":"10rem"}},{body:o(e=>[n("h1",Ve,l(k(Ce)(e.data.attendance_date).format("DD-MM-YYYY")),1)]),_:1}),t(h,{field:"regularization_type",header:"Type",style:{"min-width":"10rem"}},{body:o(e=>[n("div",je,l(e.data.regularization_type),1)]),_:1}),t(h,{field:"user_time",header:"Actual Time",style:{"min-width":"10rem"}}),t(h,{field:"regularize_time",header:"Regularize Time",style:{"min-width":"10rem"}}),t(h,{field:"reason_type",header:"Reason",style:{"min-width":"18rem"}},{body:o(e=>[e.data.reason_type=="Others"?(d(),_("span",ze,l(e.data.custom_reason),1)):(d(),_("span",Ne,l(e.data.reason_type),1))]),_:1}),t(h,{field:"reviewer_name",header:"Approve Name"},{body:o(e=>[n("p",Ue,l(e.data.reviewer_name?e.data.reviewer_name:"---"),1)]),_:1}),t(h,{field:"reviewer_comments",header:"Approve Comments"},{body:o(e=>[n("p",Be,l(e.data.reviewer_comments?e.data.reviewer_comments:"---"),1)]),_:1}),t(h,{field:"reviewer_reviewed_date",header:"Reviewed Date"},{body:o(e=>[n("p",Ie,l(e.data.reviewer_reviewed_date?e.data.reviewer_reviewed_date:"---"),1)]),_:1}),t(h,{field:"status",header:"Status",icon:"pi pi-check"},{body:o(({data:e})=>[t(J,{value:e.status,severity:v(e.status)},null,8,["value","severity"])]),filter:o(({filterModel:e,filterCallback:z})=>[t(a,{modelValue:e.value,"onUpdate:modelValue":g=>e.value=g,onChange:g=>z(),options:U.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:o(g=>[g.value?(d(),_("span",{key:0,class:I("customer-badge status-"+g.value)},l(g.value),3)):(d(),_("span",Me,l(g.placeholder),1))]),option:o(g=>[n("span",{class:I("customer-badge status-"+g.option)},l(g.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(h,{field:"",header:"Action"},{body:o(e=>[e.data.status=="Pending"?(d(),_("span",Fe,[t($,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approval",onClick:z=>V(e.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t($,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Rejected",style:{"margin-left":"8px",height:"2em"},onClick:z=>V(e.data,"Reject")},null,8,["onClick"])])):M("",!0)]),_:1})]),_:1},8,["value","filters"])])])}}},Oe={class:"flex justify-content-center align-items-center"},Ye={key:0,if:"",class:"w-3 p-2 text-white bg-blue-900 rounded-full h-18 text-semibold"},Ee=["src"],Je={class:"pl-2 text-left"},Qe={class:"text-bold"},He={class:"text-bold"},Ke={class:"text-bold"},qe={key:1},We={key:0,style:{width:"250px",display:"block"}},Ge={class:"confirmation-content"},Xe=n("i",{class:"mr-2 text-red-600 pi pi-exclamation-triangle",style:{"font-size":"1.3rem"}},null,-1),Ze={class:"my-auto"},et={key:0,class:"flex w-full p-2 justify-left"},tt={__name:"absent_Regularization",setup(P){const c=Q(),D=G(),u=m(),A=X();K("$swal");const T=m(!1);m(!1);const w=m(""),x=m();let S=null,U=null;const y=m({global:{value:null,matchMode:b.CONTAINS},employee_name:{value:null,matchMode:b.STARTS_WITH,matchMode:b.EQUALS,matchMode:b.CONTAINS},status:{value:"Pending",matchMode:b.EQUALS}});q(()=>{T&&(x.value=null)}),W(()=>{R()});async function R(){c.canShowLoadingScreen=!0,await F.get("/fetch-absent-regularization-data").then(v=>{u.value=v.data}).finally(()=>{c.canShowLoadingScreen=!1})}const B=v=>{switch(v){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};function V(v,f){c.canShowLoadingScreen=!0,S=f,w.value=f,U=v}function O(){c.canShowLoadingScreen=!1}function j(){O(),c.canShowLoadingScreen=!0,F.post("/approveRejectAbsentRegularization",{record_id:U.id,approver_user_code:A.current_user_code,status:S=="Approve"?"Approved":S=="Reject"?"Rejected":S,status_text:x.value,user_code:A.current_user_code}).then(v=>{v.data.status=="success"?D.add({severity:"success",summary:"Success",detail:"Your request has been recorded successfully",life:3e3}):Swal.fire("Failure",`${v.data.message}`,"error"),R()}).catch(v=>{c.canShowLoadingScreen=!1}).finally(()=>{c.canShowLoadingScreen=!1,x.value=null})}return(v,f)=>{const p=r("InputText"),s=r("Column"),Y=r("Tag"),$=r("Dropdown"),L=r("Button"),E=r("DataTable"),h=r("Textarea"),J=r("Dialog");return d(),_("div",null,[t(E,{value:u.value,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],sortField:"attendance_date",sortOrder:-1,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:y.value,"onUpdate:filters":f[0]||(f[0]=a=>y.value=a),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:o(()=>[N(" No Employeee found. ")]),loading:o(()=>[N(" Loading customers data. Please wait. ")]),default:o(()=>[t(s,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:o(a=>[n("div",Oe,[JSON.parse(a.data.employee_avatar).type=="shortname"?(d(),_("p",Ye,l(JSON.parse(a.data.employee_avatar).data),1)):(d(),_("img",{key:1,class:"w-3 rounded-circle img-md userActive-status profile-img",style:{height:"30px !important"},src:`data:image/png;base64,${JSON.parse(a.data.employee_avatar).data}`,srcset:"",alt:""},null,8,Ee)),n("p",Je,l(a.data.employee_name),1)])]),filter:o(({filterModel:a,filterCallback:C})=>[t(p,{modelValue:a.value,"onUpdate:modelValue":e=>a.value=e,onInput:e=>C(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(s,{class:"font-bold",field:"attendance_date",sortable:!0,header:"Attendance Date"},{body:o(a=>[N(l(k(ke)(a.data.attendance_date).format("DD-MMM-YYYY")),1)]),_:1}),t(s,{class:"font-bold",field:"regularization_type",header:"Regularization Type"}),t(s,{class:"font-bold",field:"checkin_time",header:"Checkin Time"}),t(s,{class:"font-bold",field:"checkout_time",header:"Checkout Time"}),t(s,{class:"font-bold",field:"reason",header:"Reason"}),t(s,{class:"font-bold",field:"custom_reason",header:"Custom Reason"}),t(s,{field:"reviewer_name",header:"Approve Name"},{body:o(a=>[n("p",Qe,l(a.data.reviewer_name?a.data.reviewer_name:"---"),1)]),_:1}),t(s,{field:"reviewer_comments",header:"Approve Comments"},{body:o(a=>[n("p",He,l(a.data.reviewer_comments?a.data.reviewer_comments:"---"),1)]),_:1}),t(s,{field:"reviewer_reviewed_date",header:"Reviewed Date"},{body:o(a=>[n("p",Ke,l(a.data.reviewer_reviewed_date?a.data.reviewer_reviewed_date:"---"),1)]),_:1}),t(s,{class:"font-bold",field:"status",header:"Status"},{body:o(({data:a})=>[t(Y,{value:a.status,severity:B(a.status)},null,8,["value","severity"])]),filter:o(({filterModel:a,filterCallback:C})=>[t($,{modelValue:a.value,"onUpdate:modelValue":e=>a.value=e,onChange:e=>C(),options:v.statuses,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:o(e=>[e.value?(d(),_("span",{key:0,class:I("customer-badge status-"+e.value)},l(e.value),3)):(d(),_("span",qe,l(e.placeholder),1))]),option:o(e=>[n("span",{class:I("customer-badge status-"+e.option)},l(e.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(s,{class:"font-bold",field:"",header:"Action"},{body:o(a=>[a.data.status=="Pending"?(d(),_("span",We,[t(L,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approval",onClick:C=>V(a.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t(L,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Rejected",style:{"margin-left":"8px",height:"2em"},onClick:C=>V(a.data,"Reject")},null,8,["onClick"])])):M("",!0)]),_:1})]),_:1},8,["value","filters"]),t(J,{header:"Confirmation",visible:T.value,"onUpdate:visible":f[3]||(f[3]=a=>T.value=a),breakpoints:{"960px":"80vw","640px":"90vw"},style:{width:"380px"},modal:!0},{footer:o(()=>[t(L,{label:"Yes",icon:"pi pi-check",onClick:j,class:"p-button-text",autofocus:""}),t(L,{label:"No",icon:"pi pi-times",onClick:f[2]||(f[2]=a=>T.value=!1),class:"p-button-text"})]),default:o(()=>[n("div",Ge,[Xe,n("span",Ze,"Are you sure you want to "+l(k(S))+"?",1)]),w.value=="Reject"?(d(),_("div",et,[t(h,{modelValue:x.value,"onUpdate:modelValue":f[1]||(f[1]=a=>x.value=a),rows:"3",cols:"30",class:"border rounded-md"},null,8,["modelValue"])])):M("",!0)]),_:1},8,["visible"])])}}},at={class:"w-full"},ot=n("h6",{class:"mb-0 text-lg font-semibold"},"Attendance Regularization Approvals",-1),nt=n("div",{class:"p-2 pb-0 my-2 mb-3 rounded-lg shadow tw-card left-line"},[n("div",{class:"flex justify-between"},[n("ul",{class:"bg-white divide-x py-auto nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},[n("li",{class:"nav-item text-muted",role:"presentation"},[n("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#leave_balance","aria-selected":"true",role:"tab"}," Attendance Regularization")]),n("li",{class:"nav-item text-muted",role:"presentation"},[n("a",{class:"pb-2 mx-4 nav-link","data-bs-toggle":"tab",href:"#team_leaveBalance","aria-selected":"false",tabindex:"-1",role:"tab"}," Absent Regularization")])])])],-1),st={class:"tab-content h-[100vh]",id:"pills-tabContent"},lt={class:"tab-pane show fade active",id:"leave_balance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},it={class:"tab-pane fade show",id:"team_leaveBalance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},rt={__name:"AttRegularizationApproval",setup(P){const c=Q();return(D,u)=>{const A=r("Toast");return d(),_(ee,null,[t(A),k(c).canShowLoadingScreen?(d(),Z(Ae,{key:0,class:"absolute z-50 bg-white w-[100%] h-[100%]"})):M("",!0),n("div",at,[ot,nt,n("div",st,[n("div",lt,[t(Pe)]),n("div",it,[t(tt)])])])],64)}}},i=te(rt),ct=xe();i.use(ae,{ripple:!0});i.use(ge);i.use(de);i.use(ct);i.directive("tooltip",ue);i.directive("badge",pe);i.directive("ripple",oe);i.directive("styleclass",me);i.directive("focustrap",ne);i.component("Button",se);i.component("DataTable",fe);i.component("Column",le);i.component("ConfirmDialog",_e);i.component("Toast",ve);i.component("Dialog",ie);i.component("Dropdown",re);i.component("ProgressSpinner",be);i.component("InputText",ce);i.component("Tag",ye);i.component("Textarea",we);i.mount("#vjs_regularizationTable");