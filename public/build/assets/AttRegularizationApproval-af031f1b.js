import{B as v,X as E,E as F,c as f,h as t,w as a,V as h,a1 as z,e as u,K as y,g as p,o as g,t as r,j as C,n as T,a as Y,G as H,P as J,H as W,R as G,q as K}from"./toastservice.esm-be32db1e.js";import{T as Q,B as X,S as q,b as Z,a as ee}from"./styleclass.esm-ba8fdf63.js";import"./blockui.esm-dd521861.js";import{u as te,C as ae,F as oe,a as se,b as ne,s as le}from"./inputtext.esm-e9caa4ce.js";import{s as ie}from"./confirmdialog.esm-bc3d19a4.js";import{s as re}from"./toast.esm-798d9fce.js";import{s as pe}from"./progressspinner.esm-08c4bf67.js";import{a as L}from"./index-f7a317fc.js";import{h as ue}from"./moment-fbc5633a.js";const ce=u("h5",{style:{"text-align":"center"}},"Please wait...",-1),de=u("h5",{style:{"text-align":"center"}},"Please wait...",-1),me={class:"confirmation-content"},ve=u("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),fe={key:0},ge={key:1},_e={key:1},he={key:0},ye={__name:"AttRegularizationApproval",setup(be){let A=v(),d=v(!1),c=v(!1);te();const $=E(),S=v(!0),D=v({global:{value:null,matchMode:y.CONTAINS},employee_name:{value:null,matchMode:y.STARTS_WITH,matchMode:y.EQUALS,matchMode:y.CONTAINS},status:{value:null,matchMode:y.EQUALS}}),B=v(["Pending","Approved","Rejected"]);let m=null,b=null;F(()=>{R()});function R(){let n=window.location.origin+"/fetch-att-regularization-data";console.log("AJAX URL : "+n),L.get(n).then(s=>{console.log("Axios : "+s.data),A.value=s.data,S.value=!1})}function N(n,s){d.value=!0,m=s,b=n,console.log("Selected Row Data : "+JSON.stringify(n))}function P(n){d.value=!1,n&&x()}function x(){m="",b=null}function U(){P(!1),c.value=!0,console.log("Processing Rowdata : "+JSON.stringify(b)),L.post(window.location.origin+"/attendance-regularization-approvals",{id:b.id,status:m=="Approve"?"Approved":m=="Reject"?"Rejected":m,status_text:""}).then(n=>{console.log("Response : "+n),c.value=!1,$.add({severity:"success",summary:"Info",detail:"Success",life:3e3}),R(),x()}).catch(n=>{c.value=!1,x(),console.log(n.toJSON())})}return(n,s)=>{const j=p("Toast"),V=p("ProgressSpinner"),k=p("Dialog"),w=p("Button"),I=p("InputText"),i=p("Column"),M=p("Dropdown"),O=p("DataTable");return g(),f("div",null,[t(j),t(k,{header:"Header",visible:S.value,"onUpdate:visible":s[0]||(s[0]=e=>S.value=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:a(()=>[t(V,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:a(()=>[ce]),_:1},8,["visible"]),t(k,{header:"Header",visible:h(c),"onUpdate:visible":s[1]||(s[1]=e=>z(c)?c.value=e:c=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:a(()=>[t(V,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:a(()=>[de]),_:1},8,["visible"]),t(k,{header:"Confirmation",visible:h(d),"onUpdate:visible":s[4]||(s[4]=e=>z(d)?d.value=e:d=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:a(()=>[t(w,{label:"Yes",icon:"pi pi-check",onClick:s[2]||(s[2]=e=>U()),class:"p-button-text",autofocus:""}),t(w,{label:"No",icon:"pi pi-times",onClick:s[3]||(s[3]=e=>P(!0)),class:"p-button-text"})]),default:a(()=>[u("div",me,[ve,u("span",null,"Are you sure you want to "+r(h(m))+"?",1)])]),_:1},8,["visible"]),u("div",null,[t(O,{value:h(A),paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:D.value,"onUpdate:filters":s[5]||(s[5]=e=>D.value=e),filterDisplay:"menu",loading:n.loading2,globalFilterFields:["name","status"]},{empty:a(()=>[C(" No customers found. ")]),loading:a(()=>[C(" Loading customers data. Please wait. ")]),default:a(()=>[t(i,{field:"employee_name",header:"Employee Name"},{body:a(e=>[C(r(e.data.employee_name),1)]),filter:a(({filterModel:e,filterCallback:_})=>[t(I,{modelValue:e.value,"onUpdate:modelValue":l=>e.value=l,onInput:l=>_(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(i,{field:"attendance_date",header:"Date",sortable:!0},{body:a(e=>[C(r(h(ue)(e.data.attendance_date).format("DD-MM-YYYY")),1)]),_:1}),t(i,{field:"regularization_type",header:"Type"}),t(i,{field:"user_time",header:"Actual Time"}),t(i,{field:"regularize_time",header:"Regularize Time"}),t(i,{field:"reason_type",header:"Reason"},{body:a(e=>[e.data.reason_type=="Others"?(g(),f("span",fe,r(e.data.custom_reason),1)):(g(),f("span",ge,r(e.data.reason_type),1))]),_:1}),t(i,{field:"reviewer_comments",header:"Approve Comments"}),t(i,{field:"reviewer_reviewed_date",header:"Reviewed Date"}),t(i,{field:"status",header:"Status",icon:"pi pi-check"},{body:a(({data:e})=>[u("span",{class:T("customer-badge status-"+e.status)},r(e.status),3)]),filter:a(({filterModel:e,filterCallback:_})=>[t(M,{modelValue:e.value,"onUpdate:modelValue":l=>e.value=l,onChange:l=>_(),options:B.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:a(l=>[l.value?(g(),f("span",{key:0,class:T("customer-badge status-"+l.value)},r(l.value),3)):(g(),f("span",_e,r(l.placeholder),1))]),option:a(l=>[u("span",{class:T("customer-badge status-"+l.option)},r(l.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(i,{style:{width:"300px"},field:"",header:"Action"},{body:a(e=>[e.data.status=="Pending"?(g(),f("span",he,[t(w,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approval",onClick:_=>N(e.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t(w,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Rejected",style:{"margin-left":"8px",height:"2em"},onClick:_=>N(e.data,"Reject")},null,8,["onClick"])])):Y("",!0)]),_:1})]),_:1},8,["value","filters","loading"])])])}}},o=H(ye);o.use(J,{ripple:!0});o.use(ae);o.use(W);o.directive("tooltip",Q);o.directive("badge",X);o.directive("ripple",G);o.directive("styleclass",q);o.directive("focustrap",oe);o.component("Button",K);o.component("DataTable",Z);o.component("Column",ee);o.component("ConfirmDialog",ie);o.component("Toast",re);o.component("Dialog",se);o.component("Dropdown",ne);o.component("ProgressSpinner",pe);o.component("InputText",le);o.mount("#vjs_regularizationTable");