import{S as m,a4 as F,a5 as M,a6 as L,c as y,h as t,w as n,a8 as w,X as z,e as u,L as f,g as r,o as b,t as v,j as T,n as k,a as J,E as H,P as W,G,R as Q,q as X}from"./index-2ae128bc.js";import{u as q,C as K,T as Y,B as Z,S as ee,F as te,d as ae,c as oe,e as ne,f as se,b as le}from"./styleclass.esm-8e825099.js";import"./blockui.esm-2d1aba62.js";import{s as ie}from"./confirmdialog.esm-7dc38e47.js";import{s as re}from"./toast.esm-d6ebe423.js";import{s as ue}from"./progressspinner.esm-e9e97f98.js";const pe=u("h5",{style:{"text-align":"center"}},"Please wait...",-1),ce=u("h5",{style:{"text-align":"center"}},"Please wait...",-1),de={class:"confirmation-content"},me=u("i",{class:"pi pi-exclamation-triangle mr-3",style:{"font-size":"2rem"}},null,-1),ve={key:1},ge={key:0},fe={__name:"AttRegularizationApproval",setup(he){let A=m(),c=m(!1),p=m(!1);q();const $=F(),C=m(!0),R=m({global:{value:null,matchMode:f.CONTAINS},employee_name:{value:null,matchMode:f.STARTS_WITH,matchMode:f.EQUALS,matchMode:f.CONTAINS},status:{value:null,matchMode:f.EQUALS}}),U=m(["Pending","Approved","Rejected"]);let d=null,h=null;M(()=>{D()});function D(){let s=window.location.origin+"/fetch-att-regularization-data";console.log("AJAX URL : "+s),L.get(s).then(o=>{console.log("Axios : "+o.data),A.value=o.data,C.value=!1})}function P(s,o){c.value=!0,d=o,h=s,console.log("Selected Row Data : "+JSON.stringify(s))}function N(s){c.value=!1,s&&S()}function S(){d="",h=null}function B(){N(!1),p.value=!0,console.log("Processing Rowdata : "+JSON.stringify(h)),L.post(window.location.origin+"/attendance-regularization-approvals",{id:h.id,status:d=="Approve"?"Approved":d=="Reject"?"Rejected":d,status_text:""}).then(s=>{console.log("Response : "+s),p.value=!1,$.add({severity:"success",summary:"Info",detail:"Success",life:3e3}),D(),S()}).catch(s=>{p.value=!1,S(),console.log(s.toJSON())})}return(s,o)=>{const j=r("Toast"),V=r("ProgressSpinner"),x=r("Dialog"),_=r("Button"),I=r("InputText"),i=r("Column"),E=r("Dropdown"),O=r("DataTable");return b(),y("div",null,[t(j),t(x,{header:"Header",visible:C.value,"onUpdate:visible":o[0]||(o[0]=e=>C.value=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:n(()=>[t(V,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:n(()=>[pe]),_:1},8,["visible"]),t(x,{header:"Header",visible:w(p),"onUpdate:visible":o[1]||(o[1]=e=>z(p)?p.value=e:p=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:n(()=>[t(V,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:n(()=>[ce]),_:1},8,["visible"]),t(x,{header:"Confirmation",visible:w(c),"onUpdate:visible":o[4]||(o[4]=e=>z(c)?c.value=e:c=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:n(()=>[t(_,{label:"Yes",icon:"pi pi-check",onClick:o[2]||(o[2]=e=>B()),class:"p-button-text",autofocus:""}),t(_,{label:"No",icon:"pi pi-times",onClick:o[3]||(o[3]=e=>N(!0)),class:"p-button-text"})]),default:n(()=>[u("div",de,[me,u("span",null,"Are you sure you want to "+v(w(d))+"?",1)])]),_:1},8,["visible"]),u("div",null,[t(O,{value:w(A),paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:R.value,"onUpdate:filters":o[5]||(o[5]=e=>R.value=e),filterDisplay:"menu",loading:s.loading2,globalFilterFields:["name","status"]},{empty:n(()=>[T(" No customers found. ")]),loading:n(()=>[T(" Loading customers data. Please wait. ")]),default:n(()=>[t(i,{field:"employee_name",header:"Employee Name"},{body:n(e=>[T(v(e.data.employee_name),1)]),filter:n(({filterModel:e,filterCallback:g})=>[t(I,{modelValue:e.value,"onUpdate:modelValue":l=>e.value=l,onInput:l=>g(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(i,{field:"attendance_date",header:"Date",sortable:!0}),t(i,{field:"regularization_type",header:"Type"}),t(i,{field:"user_time",header:"Actual Time"}),t(i,{field:"regularize_time",header:"Regularize Time"}),t(i,{field:"reason_type",header:"Reason"}),t(i,{field:"reviewer_comments",header:"Approve Comments"}),t(i,{field:"reviewer_reviewed_date",header:"Reviewed Date"}),t(i,{field:"status",header:"Status",icon:"pi pi-check"},{body:n(({data:e})=>[u("span",{class:k("customer-badge status-"+e.status)},v(e.status),3)]),filter:n(({filterModel:e,filterCallback:g})=>[t(E,{modelValue:e.value,"onUpdate:modelValue":l=>e.value=l,onChange:l=>g(),options:U.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:n(l=>[l.value?(b(),y("span",{key:0,class:k("customer-badge status-"+l.value)},v(l.value),3)):(b(),y("span",ve,v(l.placeholder),1))]),option:n(l=>[u("span",{class:k("customer-badge status-"+l.option)},v(l.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(i,{style:{width:"300px"},field:"",header:"Action"},{body:n(e=>[e.data.status=="Pending"?(b(),y("span",ge,[t(_,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approval",onClick:g=>P(e.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t(_,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Rejected",style:{"margin-left":"8px",height:"2em"},onClick:g=>P(e.data,"Reject")},null,8,["onClick"])])):J("",!0)]),_:1})]),_:1},8,["value","filters","loading"])])])}}},a=H(fe);a.use(W,{ripple:!0});a.use(K);a.use(G);a.directive("tooltip",Y);a.directive("badge",Z);a.directive("ripple",Q);a.directive("styleclass",ee);a.directive("focustrap",te);a.component("Button",X);a.component("DataTable",ae);a.component("Column",oe);a.component("ConfirmDialog",ie);a.component("Toast",re);a.component("Dialog",ne);a.component("Dropdown",se);a.component("ProgressSpinner",ue);a.component("InputText",le);a.mount("#vjs_regularizationTable");
