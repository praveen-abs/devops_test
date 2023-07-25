import{G as d,a9 as E,ac as g,I as J,o as w,c as b,h as t,w as s,H as y,_ as L,d as r,t as m,l as k,n as P,a as H,g as i,J as Q,P as W,K as z,R as G,u as K,v as X,L as Y,Q as q,M as Z,N as ee,A as te}from"./toastservice.esm-3137c6bd.js";import{T as oe,B as ae,S as se,b as ne,a as le}from"./styleclass.esm-144d12d2.js";import"./blockui.esm-1641b8a1.js";import{u as ie,C as re}from"./confirmationservice.esm-ec2f14f9.js";import{s as pe}from"./progressspinner.esm-0e6c68e2.js";import{a as M}from"./index-362795f3.js";const ce=r("h5",{style:{"text-align":"center"}},"Please wait...",-1),ue=r("h5",{style:{"text-align":"center"}},"Please wait...",-1),de={class:"confirmation-content"},me=r("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),ve={key:1},fe={key:0},ge={__name:"PMSApprovalTable",setup(_e){let T=d(),c=d(!1),p=d(!1);ie();const $=E(),S=d(!0),A=d({global:{value:null,matchMode:g.CONTAINS},employee_name:{value:null,matchMode:g.STARTS_WITH,matchMode:g.EQUALS,matchMode:g.CONTAINS},status:{value:null,matchMode:g.EQUALS}}),U=d(["Pending","Approved","Rejected"]);let u=null,_=null;J(()=>{D()});function D(){let n=window.location.origin+"/fetch_approvals_pmsforms";console.log("AJAX URL : "+n),M.get(n).then(a=>{console.log("Axios : "+a.data),T.value=a.data,S.value=!1})}function R(n,a){c.value=!0,u=a,_=n,console.log("Selected Row Data : "+JSON.stringify(n))}function N(n){c.value=!1,n&&C()}function C(){u="",_=null}function B(){N(!1),p.value=!0,console.log("Processing Rowdata : "+JSON.stringify(_)),M.post(window.location.origin+"/approvals-pms",{kpiform_review_id:_.pms_kpiform_review_id,status:u=="Approve"?"Approved":u=="Reject"?"Rejected":u}).then(n=>{console.log("Response : "+n),p.value=!1,$.add({severity:"success",summary:"Info",detail:"Success",life:3e3}),D(),C()}).catch(n=>{p.value=!1,C(),console.log(n.toJSON())})}return(n,a)=>{const I=i("Toast"),V=i("ProgressSpinner"),x=i("Dialog"),h=i("Button"),j=i("InputText"),v=i("Column"),O=i("Dropdown"),F=i("DataTable");return w(),b("div",null,[t(I),t(x,{header:"Header",visible:S.value,"onUpdate:visible":a[0]||(a[0]=e=>S.value=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[t(V,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[ce]),_:1},8,["visible"]),t(x,{header:"Header",visible:y(p),"onUpdate:visible":a[1]||(a[1]=e=>L(p)?p.value=e:p=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[t(V,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[ue]),_:1},8,["visible"]),t(x,{header:"Confirmation",visible:y(c),"onUpdate:visible":a[4]||(a[4]=e=>L(c)?c.value=e:c=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:s(()=>[t(h,{label:"Yes",icon:"pi pi-check",onClick:a[2]||(a[2]=e=>B()),class:"p-button-text",autofocus:""}),t(h,{label:"No",icon:"pi pi-times",onClick:a[3]||(a[3]=e=>N(!0)),class:"p-button-text"})]),default:s(()=>[r("div",de,[me,r("span",null,"Are you sure you want to "+m(y(u))+"?",1)])]),_:1},8,["visible"]),r("div",null,[t(F,{value:y(T),paginator:!0,rows:10,dataKey:"id",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:A.value,"onUpdate:filters":a[5]||(a[5]=e=>A.value=e),filterDisplay:"menu",loading:n.loading2,globalFilterFields:["name","status"],style:{"white-space":"nowrap"}},{empty:s(()=>[k(" No PMS forms found. ")]),loading:s(()=>[k(" Loading PMS forms data. Please wait. ")]),default:s(()=>[t(v,{class:"font-bold",field:"assignee_name",header:"Assignee Name"},{body:s(e=>[k(m(e.data.assignee_name),1)]),filter:s(({filterModel:e,filterCallback:f})=>[t(j,{modelValue:e.value,"onUpdate:modelValue":l=>e.value=l,onInput:l=>f(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(v,{field:"assignment_period",header:"Assignment Period"}),t(v,{field:"reviewer_name",header:"Reviewer Name"}),t(v,{field:"status",header:"Status",icon:"pi pi-check"},{body:s(({data:e})=>[r("span",{class:P("customer-badge status-"+e.status)},m(e.status),3)]),filter:s(({filterModel:e,filterCallback:f})=>[t(O,{modelValue:e.value,"onUpdate:modelValue":l=>e.value=l,onChange:l=>f(),options:U.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:s(l=>[l.value?(w(),b("span",{key:0,class:P("customer-badge status-"+l.value)},m(l.value),3)):(w(),b("span",ve,m(l.placeholder),1))]),option:s(l=>[r("span",{class:P("customer-badge status-"+l.option)},m(l.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(v,{style:{width:"300px"},field:"",header:"Action"},{body:s(e=>[e.data.status=="Pending"?(w(),b("span",fe,[t(h,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:f=>R(e.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t(h,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2em"},onClick:f=>R(e.data,"Reject")},null,8,["onClick"])])):H("",!0)]),_:1})]),_:1},8,["value","filters","loading"])])])}}},o=Q(ge);o.use(W,{ripple:!0});o.use(re);o.use(z);o.directive("tooltip",oe);o.directive("badge",ae);o.directive("ripple",G);o.directive("styleclass",se);o.directive("focustrap",K);o.component("Button",X);o.component("DataTable",ne);o.component("Column",le);o.component("ConfirmDialog",Y);o.component("Toast",q);o.component("Dialog",Z);o.component("Dropdown",ee);o.component("ProgressSpinner",pe);o.component("InputText",te);o.mount("#vjs_pmsApproval_Table");
