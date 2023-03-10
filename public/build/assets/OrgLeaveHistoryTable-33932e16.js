import{S as p,a4 as I,a5 as j,a6 as F,c as y,h as t,w as n,a8 as S,X as R,e as c,L as g,g as r,o as b,t as d,j as C,n as T,a as H,E as M,P as G,G as q,R as z,q as J}from"./index-2ae128bc.js";import{u as Q,C as W,T as K,B as X,S as Y,F as Z,d as ee,c as te,e as ae,b as oe,f as ne}from"./styleclass.esm-8e825099.js";import"./blockui.esm-2d1aba62.js";import{D as se}from"./dialogservice.esm-bc6edf52.js";import{s as le}from"./columngroup.esm-9dd1458e.js";import{s as ie}from"./row.esm-6ebc942e.js";import{s as re}from"./progressspinner.esm-e9e97f98.js";const ce=c("h5",{style:{"text-align":"center"}},"Please wait...",-1),pe={class:"confirmation-content"},ue=c("i",{class:"pi pi-exclamation-triangle mr-3",style:{"font-size":"2rem"}},null,-1),de=c("div",null,null,-1),me={key:1},ve={key:0},ge={__name:"OrgLeaveHistoryTable",setup(fe){const f=p();p();let u=p(!1),m=p(!1);Q(),I();const A=p(!0),k=p({global:{value:null,matchMode:g.CONTAINS},name:{value:null,matchMode:g.STARTS_WITH,matchMode:g.EQUALS,matchMode:g.CONTAINS},status:{value:null,matchMode:g.EQUALS}}),P=p(["Pending","Approved","Rejected"]);let _=null,w=null;j(()=>{let i=window.location.origin+"/fetch-leaverequests/org/Approved,Rejected,Pending";console.log("Fetching ORG LEAVE from url : "+i),F.get(i).then(o=>{f.value=o.data,console.log("org_Leave_history"+f.value),A.value=!1,console.log("Response Data ORG Leave History : "+f.value.reviewer_avatar)})});function D(i,o){u.value=!0,_=o,w=i,console.log("Selected Row Data : "+JSON.stringify(i))}function x(i){u.value=!1,i&&N()}function N(){_="",w=null}function V(){x(!1),m.value=!0,console.log("Processing Rowdata : "+JSON.stringify(w)),console.log("currentlySelectedStatus : "+_)}return(i,o)=>{const $=r("Toast"),B=r("ProgressSpinner"),L=r("Dialog"),h=r("Button"),E=r("InputText"),l=r("Column"),O=r("Dropdown"),U=r("DataTable");return b(),y("div",null,[t($),t(L,{header:"Header",visible:S(m),"onUpdate:visible":o[0]||(o[0]=e=>R(m)?m.value=e:m=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:n(()=>[t(B,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:n(()=>[ce]),_:1},8,["visible"]),t(L,{header:"Confirmation",visible:S(u),"onUpdate:visible":o[3]||(o[3]=e=>R(u)?u.value=e:u=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:n(()=>[t(h,{label:"Yes",icon:"pi pi-check",onClick:o[1]||(o[1]=e=>V()),class:"p-button-text",autofocus:""}),t(h,{label:"No",icon:"pi pi-times",onClick:o[2]||(o[2]=e=>x(!0)),class:"p-button-text"})]),default:n(()=>[c("div",pe,[ue,c("span",null,"Are you sure you want to "+d(S(_))+"?",1)])]),_:1},8,["visible"]),c("div",null,[t(U,{value:f.value,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:k.value,"onUpdate:filters":o[4]||(o[4]=e=>k.value=e),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:n(()=>[C(" No Employee data..... ")]),loading:n(()=>[C(" Loading customers data. Please wait. ")]),default:n(()=>[t(l,{field:"name",header:"Employee Name"},{body:n(e=>[de,C(" "+d(e.data.employee_name),1)]),filter:n(({filterModel:e,filterCallback:v})=>[t(E,{modelValue:e.value,"onUpdate:modelValue":s=>e.value=s,onInput:s=>v(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(l,{field:"leave_type",header:"Leave Type"}),t(l,{field:"start_date",header:"Start Date"}),t(l,{field:"end_date",header:"End Date"}),t(l,{field:"leave_reason",header:"Leave Reason"}),t(l,{field:"reviewer_name",header:"Approvar Name"}),t(l,{field:"reviewer_comments",header:"Approvar Comments"}),t(l,{field:"status",header:"Status",icon:"pi pi-check"},{body:n(({data:e})=>[c("span",{class:T("customer-badge status-"+e.status)},d(e.status),3)]),filter:n(({filterModel:e,filterCallback:v})=>[t(O,{modelValue:e.value,"onUpdate:modelValue":s=>e.value=s,onClick:s=>v(),options:P.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:n(s=>[s.value?(b(),y("span",{key:0,class:T("customer-badge status-"+s.value)},d(s.value),3)):(b(),y("span",me,d(s.placeholder),1))]),option:n(s=>[c("span",{class:T("customer-badge status-"+s.option)},d(s.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onClick","options"])]),_:1}),t(l,{field:"",header:"Action"},{body:n(e=>[e.data.status=="Pending"?(b(),y("span",ve,[t(h,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:v=>D(e.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t(h,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2em"},onClick:v=>D(e.data,"Reject")},null,8,["onClick"])])):H("",!0)]),_:1})]),_:1},8,["value","filters"])])])}}},a=M(ge);a.use(G,{ripple:!0});a.use(W);a.use(q);a.use(se);a.directive("tooltip",K);a.directive("badge",X);a.directive("ripple",z);a.directive("styleclass",Y);a.directive("focustrap",Z);a.component("DataTable",ee);a.component("Column",te);a.component("Button",J);a.component("ColumnGroup",le);a.component("Row",ie);a.component("Dialog",ae);a.component("InputText",oe);a.component("Dropdown",ne);a.component("ProgressSpinner",re);a.mount("#vjs_orgLeaveHistoryTable");
