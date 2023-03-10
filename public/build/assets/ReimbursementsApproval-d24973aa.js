import{S as c,a4 as V,a5 as U,a6 as N,c as L,h as t,w as s,a8 as h,X as E,e as r,L as _,g as u,o as $,t as v,j as f,n as M,a as z,E as F,P as J,G,R as H,q as W}from"./index-2ae128bc.js";import{u as K,C as Q,T as X,B as q,S as Y,F as Z,d as ee,c as te,f as ae,b as oe,e as se}from"./styleclass.esm-8e825099.js";import"./blockui.esm-2d1aba62.js";import{s as ne}from"./confirmdialog.esm-7dc38e47.js";import{D as le}from"./dialogservice.esm-bc6edf52.js";import{s as ie}from"./toast.esm-d6ebe423.js";import{s as re}from"./progressspinner.esm-e9e97f98.js";import{s as pe}from"./row.esm-6ebc942e.js";import{s as de}from"./columngroup.esm-9dd1458e.js";const ce=r("h5",{style:{"text-align":"center"}},"Please wait...",-1),ue=r("h5",{style:{"text-align":"center"}},"Please wait...",-1),me={class:"confirmation-content"},ve=r("i",{class:"pi pi-exclamation-triangle mr-3",style:{"font-size":"2rem"}},null,-1),fe={key:0},_e={class:"orders-subtable"},ge={__name:"ReimbursementsApproval",setup(be){let S=c(),m=c(!1),p=c(!1);K();const j=V(),w=c(!0),C=c([]);c({global:{value:null,matchMode:_.CONTAINS},name:{value:null,matchMode:_.STARTS_WITH,matchMode:_.EQUALS,matchMode:_.CONTAINS},status:{value:null,matchMode:_.EQUALS}}),c(["Pending","Approved","Rejected"]);let d=null,g=null;U(()=>{R()});function R(){let n=window.location.origin+"/fetch_all_reimbursements_as_groups";console.log("AJAX URL : "+n),N.get(n).then(o=>{S.value=o.data,console.log(o.data),w.value=!1,console.log(Object.keys(o.data))})}function T(n,o){m.value=!0,d=o,g=n,console.log("Selected Row Data : "+JSON.stringify(n))}function k(n){m.value=!1,n&&x()}function x(){d="",g=null}function B(){k(!1),p.value=!0,console.log("Processing Rowdata : "+JSON.stringify(g)),console.log("currentlySelectedStatus : "+d),N.post(window.location.origin+"/reimbursements_bulk_approval",{reimbursement_id:g,status:d=="Approve"?"Approved":d=="Reject"?"Rejected":d,reviewer_comments:""}).then(n=>{console.log(n),p.value=!1,j.add({severity:"info",summary:"Info",detail:"Success",life:3e3}),R(),x()}).catch(n=>{p.value=!1,x(),console.log(n.toJSON())})}return(n,o)=>{const I=u("Toast"),D=u("ProgressSpinner"),y=u("Dialog"),b=u("Button"),l=u("Column"),O=u("InputText"),A=u("DataTable");return $(),L("div",null,[t(I),t(y,{header:"Header",visible:w.value,"onUpdate:visible":o[0]||(o[0]=e=>w.value=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[t(D,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[ce]),_:1},8,["visible"]),t(y,{header:"Header",visible:h(p),"onUpdate:visible":o[1]||(o[1]=e=>E(p)?p.value=e:p=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[t(D,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[ue]),_:1},8,["visible"]),t(y,{header:"Confirmation",visible:h(m),"onUpdate:visible":o[4]||(o[4]=e=>E(m)?m.value=e:m=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:s(()=>[t(b,{label:"Yes",icon:"pi pi-check",onClick:o[2]||(o[2]=e=>B()),class:"p-button-text",autofocus:""}),t(b,{label:"No",icon:"pi pi-times",onClick:o[3]||(o[3]=e=>k(!0)),class:"p-button-text"})]),default:s(()=>[r("div",me,[ve,r("span",null,"Are you sure you want to "+v(h(d))+"?",1)])]),_:1},8,["visible"]),r("div",null,[t(A,{value:h(S),paginator:!0,rows:10,dataKey:"user_id",onRowExpand:n.onRowExpand,onRowCollapse:n.onRowCollapse,expandedRows:C.value,"onUpdate:expandedRows":o[5]||(o[5]=e=>C.value=e),paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{empty:s(()=>[f(" No Reimbursement data for the selected status filter ")]),loading:s(()=>[f(" Loading customers data. Please wait. ")]),expansion:s(e=>[r("div",_e,[t(A,{value:e.data.reimbursement_data,responsiveLayout:"scroll"},{default:s(()=>[t(l,{field:"date",header:"Date",sortable:""}),t(l,{field:"from",header:"From"}),t(l,{field:"to",header:"To"}),t(l,{class:"fontSize13px",field:"distance_travelled",header:"Distance Covered"}),t(l,{class:"fontSize13px",field:"total_expenses",header:"Total Expenses"},{body:s(i=>[f(v("₹ "+i.data.total_expenses),1)]),_:2},1024),t(l,{field:"status",header:"Status",sortable:""},{body:s(i=>[r("span",{class:M("order-badge order-"+i.data.status)},v(i.data.status),3)]),_:2},1024)]),_:2},1032,["value"])])]),default:s(()=>[t(l,{expander:!0,headerStyle:"width: 0.5rem"}),t(l,{field:"user_code",header:"Employee Id",sortable:""}),t(l,{field:"name",header:"Employee Name"},{body:s(e=>[f(v(e.data.employee_name),1)]),filter:s(({filterModel:e,filterCallback:i})=>[t(O,{modelValue:e.value,"onUpdate:modelValue":P=>e.value=P,onInput:P=>i(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(l,{class:"fontSize13px",field:"total_distance_travelled",header:"Overall Distance Travelled",sortable:!1},{body:s(e=>[f(v(e.data.total_distance_travelled+" KM"),1)]),_:1}),t(l,{class:"fontSize13px",field:"total_expenses",header:"Overall Expenses",sortable:!1},{body:s(e=>[f(v("₹ "+e.data.total_expenses),1)]),_:1}),t(l,{field:"",header:"Action"},{body:s(e=>[e.data.has_pending_reimbursements=="true"?($(),L("span",fe,[t(b,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:i=>T(e.data,"Approve"),style:{height:"2.5em"}},null,8,["onClick"]),t(b,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2.5em"},onClick:i=>T(e.data,"Reject")},null,8,["onClick"])])):z("",!0)]),_:1})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows"])])])}}},a=F(ge);a.use(J,{ripple:!0});a.use(Q);a.use(G);a.use(le);a.directive("tooltip",X);a.directive("badge",q);a.directive("ripple",H);a.directive("styleclass",Y);a.directive("focustrap",Z);a.component("Button",W);a.component("DataTable",ee);a.component("Column",te);a.component("ColumnGroup",de);a.component("Row",pe);a.component("Toast",ie);a.component("ConfirmDialog",ne);a.component("Dropdown",ae);a.component("InputText",oe);a.component("Dialog",se);a.component("ProgressSpinner",re);a.mount("#vjs_reimbursementsApprovalTable");
