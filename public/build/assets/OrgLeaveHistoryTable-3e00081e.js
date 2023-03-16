import{V as u,Q as H,X as M,W as G,c as m,h as t,w as o,Y as S,a2 as P,e as p,L as y,g as c,o as v,t as i,j as g,n as k,a as Q,E as W,P as q,G as z,R as J,q as Y}from"./index-39918fa6.js";import{u as K,C as X,T as Z,B as ee,S as te,F as ae,d as oe,c as ne,e as le,b as se,f as ie}from"./styleclass.esm-f772d017.js";import"./blockui.esm-a7a43aa2.js";import{D as re}from"./dialogservice.esm-20532b1b.js";import{s as ce}from"./columngroup.esm-9dd1458e.js";import{s as pe}from"./row.esm-6ebc942e.js";import{s as ue}from"./overlaypanel.esm-754bb968.js";import{s as de}from"./progressspinner.esm-2f2847cf.js";const me=p("h5",{style:{"text-align":"center"}},"Please wait...",-1),ve={class:"confirmation-content"},ge=p("i",{class:"pi pi-exclamation-triangle mr-3",style:{"font-size":"2rem"}},null,-1),_e=p("div",null,null,-1),fe={key:0},ye={key:1},he={key:1},be={key:0},we={__name:"OrgLeaveHistoryTable",setup(Ce){const h=u();u();let d=u(!1),_=u(!1);K(),H();const A=u(!0),T=u(),V=s=>{T.value.toggle(s)},x=u({global:{value:null,matchMode:y.CONTAINS},name:{value:null,matchMode:y.STARTS_WITH,matchMode:y.EQUALS,matchMode:y.CONTAINS},status:{value:null,matchMode:y.EQUALS}}),N=u(["Pending","Approved","Rejected"]);let b=null,C=null;M(()=>{let s=window.location.origin+"/fetch-leaverequests/org/Approved,Rejected,Pending";console.log("Fetching ORG LEAVE from url : "+s),G.get(s).then(n=>{h.value=n.data,console.log("org_Leave_history"+h.value),A.value=!1,console.log("Response Data ORG Leave History : "+h.value.reviewer_avatar)})});function D(s,n){d.value=!0,b=n,C=s,console.log("Selected Row Data : "+JSON.stringify(s))}function L(s){d.value=!1,s&&$()}function $(){b="",C=null}function O(){L(!1),_.value=!0,console.log("Processing Rowdata : "+JSON.stringify(C)),console.log("currentlySelectedStatus : "+b)}return(s,n)=>{const B=c("Toast"),E=c("ProgressSpinner"),R=c("Dialog"),w=c("Button"),U=c("InputText"),r=c("Column"),I=c("OverlayPanel"),j=c("Dropdown"),F=c("DataTable");return v(),m("div",null,[t(B),t(R,{header:"Header",visible:S(_),"onUpdate:visible":n[0]||(n[0]=e=>P(_)?_.value=e:_=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:o(()=>[t(E,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:o(()=>[me]),_:1},8,["visible"]),t(R,{header:"Confirmation",visible:S(d),"onUpdate:visible":n[3]||(n[3]=e=>P(d)?d.value=e:d=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:o(()=>[t(w,{label:"Yes",icon:"pi pi-check",onClick:n[1]||(n[1]=e=>O()),class:"p-button-text",autofocus:""}),t(w,{label:"No",icon:"pi pi-times",onClick:n[2]||(n[2]=e=>L(!0)),class:"p-button-text"})]),default:o(()=>[p("div",ve,[ge,p("span",null,"Are you sure you want to "+i(S(b))+"?",1)])]),_:1},8,["visible"]),p("div",null,[t(F,{value:h.value,paginator:!0,rows:5,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:x.value,"onUpdate:filters":n[4]||(n[4]=e=>x.value=e),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:o(()=>[g(" No Employee data..... ")]),loading:o(()=>[g(" Loading customers data. Please wait. ")]),default:o(()=>[t(r,{field:"name",header:"Employee Name"},{body:o(e=>[_e,g(" "+i(e.data.employee_name),1)]),filter:o(({filterModel:e,filterCallback:f})=>[t(U,{modelValue:e.value,"onUpdate:modelValue":l=>e.value=l,onInput:l=>f(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(r,{field:"leave_type",header:"Leave Type",style:{"min-width":"8rem"}}),t(r,{field:"start_date",header:"Start Date"},{body:o(e=>[g(i(e.data.start_date.slice(0,10)),1)]),_:1}),t(r,{field:"end_date",header:"End Date",dataType:"date"},{body:o(e=>[g(i(e.data.end_date.slice(0,10)),1)]),_:1}),t(r,{field:"leave_reason",header:"Leave Reason",style:{"min-width":"12rem"}},{body:o(e=>[e.data.leave_reason.length>70?(v(),m("div",fe,[p("p",{onClick:V,class:"text-orange-400 underline font-medium cursor-pointer"},"explore more..."),t(I,{ref_key:"overlayPanel",ref:T,style:{height:"80px"}},{default:o(()=>[g(i(e.data.leave_reason),1)]),_:2},1536)])):(v(),m("div",ye,i(e.data.leave_reason),1))]),_:1}),t(r,{field:"reviewer_name",header:"Approvar Name"}),t(r,{field:"reviewer_comments",header:"Approvar Comments"}),t(r,{field:"status",header:"Status",icon:"pi pi-check"},{body:o(({data:e})=>[p("span",{class:k("customer-badge status-"+e.status)},i(e.status),3)]),filter:o(({filterModel:e,filterCallback:f})=>[t(j,{modelValue:e.value,"onUpdate:modelValue":l=>e.value=l,onClick:l=>f(),options:N.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:o(l=>[l.value?(v(),m("span",{key:0,class:k("customer-badge status-"+l.value)},i(l.value),3)):(v(),m("span",he,i(l.placeholder),1))]),option:o(l=>[p("span",{class:k("customer-badge status-"+l.option)},i(l.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onClick","options"])]),_:1}),t(r,{field:"",header:"Action",style:{"min-width":"15rem"}},{body:o(e=>[e.data.status=="Pending"?(v(),m("span",be,[t(w,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:f=>D(e.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t(w,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2em"},onClick:f=>D(e.data,"Reject")},null,8,["onClick"])])):Q("",!0)]),_:1})]),_:1},8,["value","filters"])])])}}},a=W(we);a.use(q,{ripple:!0});a.use(X);a.use(z);a.use(re);a.directive("tooltip",Z);a.directive("badge",ee);a.directive("ripple",J);a.directive("styleclass",te);a.directive("focustrap",ae);a.component("DataTable",oe);a.component("Column",ne);a.component("Button",Y);a.component("ColumnGroup",ce);a.component("Row",pe);a.component("Dialog",le);a.component("InputText",se);a.component("Dropdown",ie);a.component("ProgressSpinner",de);a.component("OverlayPanel",ue);a.mount("#vjs_orgLeaveHistoryTable");
