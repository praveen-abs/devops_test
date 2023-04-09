import{G as v,K as F,H as M,a as z,b as g,j as t,w as s,N as w,V as L,g as p,S as h,i as r,o as f,t as u,l as k,n as T,d as J,I as H,P as W,J as G,R as K,v as Q}from"./toastservice.esm-755d2ad6.js";import{T as X,B as Y,S as q,b as Z,a as ee}from"./styleclass.esm-1d8483e4.js";import"./blockui.esm-f3fe064f.js";import{u as te,C as ae,F as oe,a as se,b as ne,s as le}from"./inputtext.esm-2a9cd591.js";import{s as ie}from"./confirmdialog.esm-5e71e7d6.js";import{s as re}from"./toast.esm-2756820d.js";import{s as ue}from"./progressspinner.esm-edc846f6.js";const pe=p("h5",{style:{"text-align":"center"}},"Please wait...",-1),ce=p("h5",{style:{"text-align":"center"}},"Please wait...",-1),de={class:"confirmation-content"},me=p("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),ve={key:0},ge={key:1},fe={key:1},_e={key:0},he={__name:"AttRegularizationApproval",setup(ye){let A=v(),d=v(!1),c=v(!1);te();const $=F(),C=v(!0),R=v({global:{value:null,matchMode:h.CONTAINS},employee_name:{value:null,matchMode:h.STARTS_WITH,matchMode:h.EQUALS,matchMode:h.CONTAINS},status:{value:null,matchMode:h.EQUALS}}),U=v(["Pending","Approved","Rejected"]);let m=null,y=null;M(()=>{D()});function D(){let n=window.location.origin+"/fetch-att-regularization-data";console.log("AJAX URL : "+n),z.get(n).then(o=>{console.log("Axios : "+o.data),A.value=o.data,C.value=!1})}function N(n,o){d.value=!0,m=o,y=n,console.log("Selected Row Data : "+JSON.stringify(n))}function P(n){d.value=!1,n&&S()}function S(){m="",y=null}function B(){P(!1),c.value=!0,console.log("Processing Rowdata : "+JSON.stringify(y)),z.post(window.location.origin+"/attendance-regularization-approvals",{id:y.id,status:m=="Approve"?"Approved":m=="Reject"?"Rejected":m,status_text:""}).then(n=>{console.log("Response : "+n),c.value=!1,$.add({severity:"success",summary:"Info",detail:"Success",life:3e3}),D(),S()}).catch(n=>{c.value=!1,S(),console.log(n.toJSON())})}return(n,o)=>{const I=r("Toast"),V=r("ProgressSpinner"),x=r("Dialog"),b=r("Button"),j=r("InputText"),i=r("Column"),O=r("Dropdown"),E=r("DataTable");return f(),g("div",null,[t(I),t(x,{header:"Header",visible:C.value,"onUpdate:visible":o[0]||(o[0]=e=>C.value=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[t(V,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[pe]),_:1},8,["visible"]),t(x,{header:"Header",visible:w(c),"onUpdate:visible":o[1]||(o[1]=e=>L(c)?c.value=e:c=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[t(V,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[ce]),_:1},8,["visible"]),t(x,{header:"Confirmation",visible:w(d),"onUpdate:visible":o[4]||(o[4]=e=>L(d)?d.value=e:d=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:s(()=>[t(b,{label:"Yes",icon:"pi pi-check",onClick:o[2]||(o[2]=e=>B()),class:"p-button-text",autofocus:""}),t(b,{label:"No",icon:"pi pi-times",onClick:o[3]||(o[3]=e=>P(!0)),class:"p-button-text"})]),default:s(()=>[p("div",de,[me,p("span",null,"Are you sure you want to "+u(w(m))+"?",1)])]),_:1},8,["visible"]),p("div",null,[t(E,{value:w(A),paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:R.value,"onUpdate:filters":o[5]||(o[5]=e=>R.value=e),filterDisplay:"menu",loading:n.loading2,globalFilterFields:["name","status"]},{empty:s(()=>[k(" No customers found. ")]),loading:s(()=>[k(" Loading customers data. Please wait. ")]),default:s(()=>[t(i,{field:"employee_name",header:"Employee Name"},{body:s(e=>[k(u(e.data.employee_name),1)]),filter:s(({filterModel:e,filterCallback:_})=>[t(j,{modelValue:e.value,"onUpdate:modelValue":l=>e.value=l,onInput:l=>_(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(i,{field:"attendance_date",header:"Date",sortable:!0}),t(i,{field:"regularization_type",header:"Type"}),t(i,{field:"user_time",header:"Actual Time"}),t(i,{field:"regularize_time",header:"Regularize Time"}),t(i,{field:"reason_type",header:"Reason"},{body:s(e=>[e.data.reason_type=="Others"?(f(),g("span",ve,u(e.data.custom_reason),1)):(f(),g("span",ge,u(e.data.reason_type),1))]),_:1}),t(i,{field:"reviewer_comments",header:"Approve Comments"}),t(i,{field:"reviewer_reviewed_date",header:"Reviewed Date"}),t(i,{field:"status",header:"Status",icon:"pi pi-check"},{body:s(({data:e})=>[p("span",{class:T("customer-badge status-"+e.status)},u(e.status),3)]),filter:s(({filterModel:e,filterCallback:_})=>[t(O,{modelValue:e.value,"onUpdate:modelValue":l=>e.value=l,onChange:l=>_(),options:U.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:s(l=>[l.value?(f(),g("span",{key:0,class:T("customer-badge status-"+l.value)},u(l.value),3)):(f(),g("span",fe,u(l.placeholder),1))]),option:s(l=>[p("span",{class:T("customer-badge status-"+l.option)},u(l.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(i,{style:{width:"300px"},field:"",header:"Action"},{body:s(e=>[e.data.status=="Pending"?(f(),g("span",_e,[t(b,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approval",onClick:_=>N(e.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t(b,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Rejected",style:{"margin-left":"8px",height:"2em"},onClick:_=>N(e.data,"Reject")},null,8,["onClick"])])):J("",!0)]),_:1})]),_:1},8,["value","filters","loading"])])])}}},a=H(he);a.use(W,{ripple:!0});a.use(ae);a.use(G);a.directive("tooltip",X);a.directive("badge",Y);a.directive("ripple",K);a.directive("styleclass",q);a.directive("focustrap",oe);a.component("Button",Q);a.component("DataTable",Z);a.component("Column",ee);a.component("ConfirmDialog",ie);a.component("Toast",re);a.component("Dialog",se);a.component("Dropdown",ne);a.component("ProgressSpinner",ue);a.component("InputText",le);a.mount("#vjs_regularizationTable");