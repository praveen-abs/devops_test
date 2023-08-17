/* empty css              *//* empty css                     */import{I as g,ah as J,a6 as K,ai as q,af as y,ak as G,g as r,o as c,c as u,h as t,w as o,aj as R,a3 as W,d as s,t as n,a as B,l as L,n as M,F as Z,K as ee,P as te,L as ae,u as oe,M as se,R as le,S as ne,x as ie,y as re,N as de,Q as ce,_ as ue,V as pe,W as me,Y as _e}from"./toastservice.esm-3d6796bd.js";import"./blockui.esm-fba20899.js";import{a as ve}from"./datatable.esm-30f5a7e6.js";import{u as fe,C as he}from"./confirmationservice.esm-5ceb5613.js";import{s as ge}from"./progressspinner.esm-2bee3521.js";import{s as be}from"./tag.esm-bbf86d31.js";import{s as ye}from"./textarea.esm-bd97b02a.js";import{c as we}from"./pinia-5332ebd8.js";import{a as O}from"./index-362795f3.js";import{h as xe}from"./moment-fbc5633a.js";import{S as X}from"./Service-bda4280b.js";import{d as ke}from"./dayjs.min-2f06af28.js";const Ce=s("h5",{style:{"text-align":"center"}},"Please wait...",-1),Se={class:"confirmation-content"},Te=s("i",{class:"mr-2 pi pi-exclamation-triangle text-red-600",style:{"font-size":"1.3rem"}},null,-1),Re={class:"my-auto"},$e={key:0,class:"w-full flex justify-left p-2"},Ae={class:"text-left pl-2"},De={class:"text-right"},Ve={class:"text-center p-2"},je={key:0},Ne={key:1},ze={class:"text-bold"},Le={class:"text-bold"},Pe={class:"text-bold"},Ue={key:1},Ie={key:0,style:{width:"250px",display:"block"}},Be={__name:"attendance_regularization",setup(H){let V=g(),p=g(!1),m=g(!1);fe();const x=J(),b=g(""),k=g(),S=X();K("$swal"),q(()=>{p&&(k.value=null)});const C=g({global:{value:null,matchMode:y.CONTAINS},employee_name:{value:null,matchMode:y.STARTS_WITH,matchMode:y.EQUALS,matchMode:y.CONTAINS},status:{value:"Pending",matchMode:y.EQUALS}}),P=g(["Pending","Approved","Rejected"]);let w=null,$=null;G(()=>{U()});function U(){m.value=!0;let _=window.location.origin+"/fetch-att-regularization-data";O.get(_).then(l=>{V.value=Object.values(l.data)}).finally(()=>{m.value=!1})}function j(_,l){p.value=!0,w=l,b.value=l,$=_}function F(_){p.value=!1,_&&N()}function N(){w="",$=null}const f=_=>{switch(_){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};function d(){F(!1),m.value=!0,O.post(window.location.origin+"/attendance-regularization-approvals",{record_id:$.id,approver_user_code:S.current_user_code,status:w=="Approve"?"Approved":w=="Reject"?"Rejected":w,status_text:k.value}).then(_=>{_.data.status=="success"?x.add({severity:"success",summary:"Success",detail:"Your request has been recorded successfully",life:3e3}):Swal.fire("Failure",`${_.data.message}`,"error"),N()}).catch(_=>{m.value=!1,N()}).finally(()=>{k.value=null,m.value=!1,U()})}return(_,l)=>{const Y=r("ProgressSpinner"),I=r("Dialog"),A=r("Textarea"),D=r("Button"),E=r("InputText"),v=r("Column"),Q=r("Tag"),a=r("Dropdown"),T=r("DataTable");return c(),u("div",null,[t(I,{header:"Header",visible:R(m),"onUpdate:visible":l[0]||(l[0]=e=>W(m)?m.value=e:m=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:o(()=>[t(Y,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:o(()=>[Ce]),_:1},8,["visible"]),t(I,{header:"Confirmation",visible:R(p),"onUpdate:visible":l[3]||(l[3]=e=>W(p)?p.value=e:p=e),breakpoints:{"960px":"80vw","640px":"90vw"},style:{width:"380px"},modal:!0},{footer:o(()=>[t(D,{label:"Yes",icon:"pi pi-check",onClick:d,class:"p-button-text",autofocus:""}),t(D,{label:"No",icon:"pi pi-times",onClick:l[2]||(l[2]=e=>W(p)?p.value=!1:p=!1),class:"p-button-text"})]),default:o(()=>[s("div",Se,[Te,s("span",Re,"Are you sure you want to "+n(R(w))+"?",1)]),b.value=="Reject"?(c(),u("div",$e,[t(A,{modelValue:k.value,"onUpdate:modelValue":l[1]||(l[1]=e=>k.value=e),rows:"3",cols:"30",class:"border rounded-md"},null,8,["modelValue"])])):B("",!0)]),_:1},8,["visible"]),s("div",null,[t(T,{value:R(V),paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],sortField:"attendance_date",sortOrder:-1,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:C.value,"onUpdate:filters":l[4]||(l[4]=e=>C.value=e),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:o(()=>[L(" No Employeee found. ")]),loading:o(()=>[L(" Loading customers data. Please wait. ")]),default:o(()=>[t(v,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:o(e=>[s("p",Ae,n(e.data.employee_name),1)]),filter:o(({filterModel:e,filterCallback:z})=>[t(E,{modelValue:e.value,"onUpdate:modelValue":h=>e.value=h,onInput:h=>z(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(v,{field:"attendance_date",header:"Date",sortable:!0,style:{"min-width":"10rem"}},{body:o(e=>[s("h1",De,n(R(xe)(e.data.attendance_date).format("DD-MM-YYYY")),1)]),_:1}),t(v,{field:"regularization_type",header:"Type",style:{"min-width":"10rem"}},{body:o(e=>[s("div",Ve,n(e.data.regularization_type),1)]),_:1}),t(v,{field:"user_time",header:"Actual Time",style:{"min-width":"10rem"}}),t(v,{field:"regularize_time",header:"Regularize Time",style:{"min-width":"10rem"}}),t(v,{field:"reason_type",header:"Reason",style:{"min-width":"18rem"}},{body:o(e=>[e.data.reason_type=="Others"?(c(),u("span",je,n(e.data.custom_reason),1)):(c(),u("span",Ne,n(e.data.reason_type),1))]),_:1}),t(v,{field:"reviewer_name",header:"Approve Name"},{body:o(e=>[s("p",ze,n(e.data.reviewer_name?e.data.reviewer_name:"---"),1)]),_:1}),t(v,{field:"reviewer_comments",header:"Approve Comments"},{body:o(e=>[s("p",Le,n(e.data.reviewer_comments?e.data.reviewer_comments:"---"),1)]),_:1}),t(v,{field:"reviewer_reviewed_date",header:"Reviewed Date"},{body:o(e=>[s("p",Pe,n(e.data.reviewer_reviewed_date?e.data.reviewer_reviewed_date:"---"),1)]),_:1}),t(v,{field:"status",header:"Status",icon:"pi pi-check"},{body:o(({data:e})=>[t(Q,{value:e.status,severity:f(e.status)},null,8,["value","severity"])]),filter:o(({filterModel:e,filterCallback:z})=>[t(a,{modelValue:e.value,"onUpdate:modelValue":h=>e.value=h,onChange:h=>z(),options:P.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:o(h=>[h.value?(c(),u("span",{key:0,class:M("customer-badge status-"+h.value)},n(h.value),3)):(c(),u("span",Ue,n(h.placeholder),1))]),option:o(h=>[s("span",{class:M("customer-badge status-"+h.option)},n(h.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(v,{field:"",header:"Action"},{body:o(e=>[e.data.status=="Pending"?(c(),u("span",Ie,[t(D,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approval",onClick:z=>j(e.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t(D,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Rejected",style:{"margin-left":"8px",height:"2em"},onClick:z=>j(e.data,"Reject")},null,8,["onClick"])])):B("",!0)]),_:1})]),_:1},8,["value","filters"])])])}}},Me={class:"flex justify-content-center align-items-center"},Oe={key:0,if:"",class:"p-2 w-3 h-18 text-semibold rounded-full bg-blue-900 text-white"},Fe=["src"],Ye={class:"text-left pl-2"},Ee={class:"text-bold"},Qe={class:"text-bold"},We={class:"text-bold"},He={key:1},Je={key:0,style:{width:"250px",display:"block"}},Ke={class:"confirmation-content"},qe=s("i",{class:"mr-2 pi pi-exclamation-triangle text-red-600",style:{"font-size":"1.3rem"}},null,-1),Ge={class:"my-auto"},Xe={key:0,class:"w-full flex justify-left p-2"},Ze=s("h5",{style:{"text-align":"center"}},"Please wait...",-1),et={__name:"absent_Regularization",setup(H){const V=J(),p=g(),m=X();K("$swal");const x=g(!1),b=g(!1),k=g(""),S=g();let C=null,P=null;const w=g({global:{value:null,matchMode:y.CONTAINS},employee_name:{value:null,matchMode:y.STARTS_WITH,matchMode:y.EQUALS,matchMode:y.CONTAINS},status:{value:"Pending",matchMode:y.EQUALS}});q(()=>{x&&(S.value=null)}),G(()=>{$()});async function $(){b.value=!0,await O.get("/fetch-absent-regularization-data").then(f=>{p.value=f.data}).finally(()=>{b.value=!1})}const U=f=>{switch(f){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};function j(f,d){x.value=!0,C=d,k.value=d,P=f}function F(){x.value=!1}function N(){F(),b.value=!0,O.post("/approveRejectAbsentRegularization",{record_id:P.id,approver_user_code:m.current_user_code,status:C=="Approve"?"Approved":C=="Reject"?"Rejected":C,status_text:S.value,user_code:m.current_user_code}).then(f=>{f.data.status=="success"?V.add({severity:"success",summary:"Success",detail:"Your request has been recorded successfully",life:3e3}):Swal.fire("Failure",`${f.data.message}`,"error"),$()}).catch(f=>{b.value=!1}).finally(()=>{b.value=!1,S.value=null})}return(f,d)=>{const _=r("InputText"),l=r("Column"),Y=r("Tag"),I=r("Dropdown"),A=r("Button"),D=r("DataTable"),E=r("Textarea"),v=r("Dialog"),Q=r("ProgressSpinner");return c(),u("div",null,[t(D,{value:p.value,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],sortField:"attendance_date",sortOrder:-1,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:w.value,"onUpdate:filters":d[0]||(d[0]=a=>w.value=a),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:o(()=>[L(" No Employeee found. ")]),loading:o(()=>[L(" Loading customers data. Please wait. ")]),default:o(()=>[t(l,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:o(a=>[s("div",Me,[JSON.parse(a.data.employee_avatar).type=="shortname"?(c(),u("p",Oe,n(JSON.parse(a.data.employee_avatar).data),1)):(c(),u("img",{key:1,class:"rounded-circle img-md w-3 userActive-status profile-img",style:{height:"30px !important"},src:`data:image/png;base64,${JSON.parse(a.data.employee_avatar).data}`,srcset:"",alt:""},null,8,Fe)),s("p",Ye,n(a.data.employee_name),1)])]),filter:o(({filterModel:a,filterCallback:T})=>[t(_,{modelValue:a.value,"onUpdate:modelValue":e=>a.value=e,onInput:e=>T(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(l,{class:"font-bold",field:"attendance_date",sortable:!0,header:"Attendance Date"},{body:o(a=>[L(n(R(ke)(a.data.attendance_date).format("DD-MMM-YYYY")),1)]),_:1}),t(l,{class:"font-bold",field:"regularization_type",header:"Regularization Type"}),t(l,{class:"font-bold",field:"checkin_time",header:"Checkin Time"}),t(l,{class:"font-bold",field:"checkout_time",header:"Checkout Time"}),t(l,{class:"font-bold",field:"reason",header:"Reason"}),t(l,{class:"font-bold",field:"custom_reason",header:"Custom Reason"}),t(l,{field:"reviewer_name",header:"Approve Name"},{body:o(a=>[s("p",Ee,n(a.data.reviewer_name?a.data.reviewer_name:"---"),1)]),_:1}),t(l,{field:"reviewer_comments",header:"Approve Comments"},{body:o(a=>[s("p",Qe,n(a.data.reviewer_comments?a.data.reviewer_comments:"---"),1)]),_:1}),t(l,{field:"reviewer_reviewed_date",header:"Reviewed Date"},{body:o(a=>[s("p",We,n(a.data.reviewer_reviewed_date?a.data.reviewer_reviewed_date:"---"),1)]),_:1}),t(l,{class:"font-bold",field:"status",header:"Status"},{body:o(({data:a})=>[t(Y,{value:a.status,severity:U(a.status)},null,8,["value","severity"])]),filter:o(({filterModel:a,filterCallback:T})=>[t(I,{modelValue:a.value,"onUpdate:modelValue":e=>a.value=e,onChange:e=>T(),options:f.statuses,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:o(e=>[e.value?(c(),u("span",{key:0,class:M("customer-badge status-"+e.value)},n(e.value),3)):(c(),u("span",He,n(e.placeholder),1))]),option:o(e=>[s("span",{class:M("customer-badge status-"+e.option)},n(e.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(l,{class:"font-bold",field:"",header:"Action"},{body:o(a=>[a.data.status=="Pending"?(c(),u("span",Je,[t(A,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approval",onClick:T=>j(a.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t(A,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Rejected",style:{"margin-left":"8px",height:"2em"},onClick:T=>j(a.data,"Reject")},null,8,["onClick"])])):B("",!0)]),_:1})]),_:1},8,["value","filters"]),t(v,{header:"Confirmation",visible:x.value,"onUpdate:visible":d[3]||(d[3]=a=>x.value=a),breakpoints:{"960px":"80vw","640px":"90vw"},style:{width:"380px"},modal:!0},{footer:o(()=>[t(A,{label:"Yes",icon:"pi pi-check",onClick:N,class:"p-button-text",autofocus:""}),t(A,{label:"No",icon:"pi pi-times",onClick:d[2]||(d[2]=a=>x.value=!1),class:"p-button-text"})]),default:o(()=>[s("div",Ke,[qe,s("span",Ge,"Are you sure you want to "+n(R(C))+"?",1)]),k.value=="Reject"?(c(),u("div",Xe,[t(E,{modelValue:S.value,"onUpdate:modelValue":d[1]||(d[1]=a=>S.value=a),rows:"3",cols:"30",class:"border rounded-md"},null,8,["modelValue"])])):B("",!0)]),_:1},8,["visible"]),t(v,{header:"Header",visible:b.value,"onUpdate:visible":d[4]||(d[4]=a=>b.value=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:o(()=>[t(Q,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:o(()=>[Ze]),_:1},8,["visible"])])}}},tt={class:"w-full"},at=s("div",{class:"p-2 pb-0 mb-3 rounded-lg shadow tw-card left-line"},[s("div",{class:"flex justify-between"},[s("ul",{class:"bg-white divide-x py-auto nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},[s("li",{class:"nav-item text-muted",role:"presentation"},[s("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#leave_balance","aria-selected":"true",role:"tab"}," Attendance Regularization")]),s("li",{class:"nav-item text-muted",role:"presentation"},[s("a",{class:"pb-2 mx-4 nav-link","data-bs-toggle":"tab",href:"#team_leaveBalance","aria-selected":"false",tabindex:"-1",role:"tab"}," Absent Regularization")])])])],-1),ot={class:"tab-content h-[100vh]",id:"pills-tabContent"},st={class:"tab-pane show fade active",id:"leave_balance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},lt={class:"tab-pane fade show",id:"team_leaveBalance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},nt={__name:"AttRegularizationApproval",setup(H){return(V,p)=>{const m=r("Toast");return c(),u(Z,null,[t(m),s("div",tt,[at,s("div",ot,[s("div",st,[t(Be)]),s("div",lt,[t(et)])])])],64)}}},i=ee(nt),it=we();i.use(te,{ripple:!0});i.use(he);i.use(ae);i.use(it);i.directive("tooltip",oe);i.directive("badge",se);i.directive("ripple",le);i.directive("styleclass",ne);i.directive("focustrap",ie);i.component("Button",re);i.component("DataTable",ve);i.component("Column",de);i.component("ConfirmDialog",ce);i.component("Toast",ue);i.component("Dialog",pe);i.component("Dropdown",me);i.component("ProgressSpinner",ge);i.component("InputText",_e);i.component("Tag",be);i.component("Textarea",ye);i.mount("#vjs_regularizationTable");
