import{H as v,ai as J,a4 as Y,I as H,c as g,h as t,w as o,a3 as h,a9 as V,e as u,_ as y,g as r,o as f,t as c,k as S,n as L,a as Q,J as W,P as K,K as G,L as X,R as q,u as Z,v as ee,M as te,V as ae,N as oe,Q as ne,S as se,A as le}from"./toastservice.esm-1e19bead.js";import{T as ie,B as re,S as ce,b as pe,a as ue}from"./styleclass.esm-fce48f9f.js";import"./blockui.esm-2f48c23f.js";import{s as de}from"./tag.esm-f22ea366.js";import{a as $}from"./index-f7a317fc.js";import{h as me}from"./moment-fbc5633a.js";const ve=u("h5",{style:{"text-align":"center"}},"Please wait...",-1),ge=u("h5",{style:{"text-align":"center"}},"Please wait...",-1),fe={class:"confirmation-content"},_e=u("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),he={key:0},ye={key:1},we={key:1},be={key:0,style:{width:"250px",display:"block"}},Se={__name:"AttRegularizationApproval",setup(Ce){let T=v(),d=v(!1),p=v(!1);J();const z=Y(),C=v(!0),A=v({global:{value:null,matchMode:y.CONTAINS},employee_name:{value:null,matchMode:y.STARTS_WITH,matchMode:y.EQUALS,matchMode:y.CONTAINS},status:{value:"Pending",matchMode:y.EQUALS}}),U=v(["Pending","Approved","Rejected"]);let m=null,w=null;H(()=>{R()});function R(){let s=window.location.origin+"/fetch-att-regularization-data";console.log("AJAX URL : "+s),$.get(s).then(n=>{console.log("Axios : "+n.data),T.value=n.data,C.value=!1})}function D(s,n){d.value=!0,m=n,w=s,console.log("Selected Row Data : "+JSON.stringify(s))}function P(s){d.value=!1,s&&k()}function k(){m="",w=null}const B=s=>{switch(s){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};function I(){P(!1),p.value=!0,console.log("Processing Rowdata : "+JSON.stringify(w)),$.post(window.location.origin+"/attendance-regularization-approvals",{id:w.id,status:m=="Approve"?"Approved":m=="Reject"?"Rejected":m,status_text:""}).then(s=>{console.log("Response : "+s),p.value=!1,z.add({severity:"success",summary:"Info",detail:"Success",life:3e3}),R(),k()}).catch(s=>{p.value=!1,k(),console.log(s.toJSON())})}return(s,n)=>{const j=r("Toast"),N=r("ProgressSpinner"),x=r("Dialog"),b=r("Button"),M=r("InputText"),i=r("Column"),O=r("Tag"),E=r("Dropdown"),F=r("DataTable");return f(),g("div",null,[t(j),t(x,{header:"Header",visible:C.value,"onUpdate:visible":n[0]||(n[0]=e=>C.value=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:o(()=>[t(N,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:o(()=>[ve]),_:1},8,["visible"]),t(x,{header:"Header",visible:h(p),"onUpdate:visible":n[1]||(n[1]=e=>V(p)?p.value=e:p=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:o(()=>[t(N,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:o(()=>[ge]),_:1},8,["visible"]),t(x,{header:"Confirmation",visible:h(d),"onUpdate:visible":n[4]||(n[4]=e=>V(d)?d.value=e:d=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:o(()=>[t(b,{label:"Yes",icon:"pi pi-check",onClick:n[2]||(n[2]=e=>I()),class:"p-button-text",autofocus:""}),t(b,{label:"No",icon:"pi pi-times",onClick:n[3]||(n[3]=e=>P(!0)),class:"p-button-text"})]),default:o(()=>[u("div",fe,[_e,u("span",null,"Are you sure you want to "+c(h(m))+"?",1)])]),_:1},8,["visible"]),u("div",null,[t(F,{value:h(T),paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:A.value,"onUpdate:filters":n[5]||(n[5]=e=>A.value=e),filterDisplay:"menu",loading:s.loading2,globalFilterFields:["name","status"]},{empty:o(()=>[S(" No Employeee found. ")]),loading:o(()=>[S(" Loading customers data. Please wait. ")]),default:o(()=>[t(i,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:o(e=>[S(c(e.data.employee_name),1)]),filter:o(({filterModel:e,filterCallback:_})=>[t(M,{modelValue:e.value,"onUpdate:modelValue":l=>e.value=l,onInput:l=>_(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(i,{field:"attendance_date",header:"Date",sortable:!0},{body:o(e=>[S(c(h(me)(e.data.attendance_date).format("DD-MM-YYYY")),1)]),_:1}),t(i,{field:"regularization_type",header:"Type"}),t(i,{field:"user_time",header:"Actual Time"}),t(i,{field:"regularize_time",header:"Regularize Time"}),t(i,{field:"reason_type",header:"Reason",style:{"min-width":"18rem"}},{body:o(e=>[e.data.reason_type=="Others"?(f(),g("span",he,c(e.data.custom_reason),1)):(f(),g("span",ye,c(e.data.reason_type),1))]),_:1}),t(i,{field:"reviewer_comments",header:"Approve Comments"}),t(i,{field:"reviewer_reviewed_date",header:"Reviewed Date"}),t(i,{field:"status",header:"Status",icon:"pi pi-check"},{body:o(({data:e})=>[t(O,{value:e.status,severity:B(e.status)},null,8,["value","severity"])]),filter:o(({filterModel:e,filterCallback:_})=>[t(E,{modelValue:e.value,"onUpdate:modelValue":l=>e.value=l,onChange:l=>_(),options:U.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:o(l=>[l.value?(f(),g("span",{key:0,class:L("customer-badge status-"+l.value)},c(l.value),3)):(f(),g("span",we,c(l.placeholder),1))]),option:o(l=>[u("span",{class:L("customer-badge status-"+l.option)},c(l.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(i,{field:"",header:"Action"},{body:o(e=>[e.data.status=="Pending"?(f(),g("span",be,[t(b,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approval",onClick:_=>D(e.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t(b,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Rejected",style:{"margin-left":"8px",height:"2em"},onClick:_=>D(e.data,"Reject")},null,8,["onClick"])])):Q("",!0)]),_:1})]),_:1},8,["value","filters","loading"])])])}}},a=W(Se);a.use(K,{ripple:!0});a.use(G);a.use(X);a.directive("tooltip",ie);a.directive("badge",re);a.directive("ripple",q);a.directive("styleclass",ce);a.directive("focustrap",Z);a.component("Button",ee);a.component("DataTable",pe);a.component("Column",ue);a.component("ConfirmDialog",te);a.component("Toast",ae);a.component("Dialog",oe);a.component("Dropdown",ne);a.component("ProgressSpinner",se);a.component("InputText",le);a.component("Tag",de);a.mount("#vjs_regularizationTable");
