/* empty css              *//* empty css                     *//* empty css                   */import{Q as d,a7 as g,ae as E,o as w,c as b,h as t,w as s,aa as y,X as L,d as r,t as m,l as k,n as P,a as J,g as i,H,P as Q,R as W,u as z,x as K,I as X,J as G,K as Y,M as q}from"./inputnumber.esm-4a242a4c.js";import{u as Z,a as ee,T as te,B as oe,S as ae,s as se,b as ne}from"./toastservice.esm-7cd08f1b.js";import"./blockui.esm-1564f54d.js";import{a as le}from"./datatable.esm-83d66cb3.js";import{u as ie,C as re}from"./confirmationservice.esm-644d08c2.js";import{s as pe}from"./progressspinner.esm-e2d013d8.js";import{a as M}from"./index-362795f3.js";const ce=r("h5",{style:{"text-align":"center"}},"Please wait...",-1),ue=r("h5",{style:{"text-align":"center"}},"Please wait...",-1),de={class:"confirmation-content"},me=r("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),ve={key:1},fe={key:0},ge={__name:"PMSApprovalTable",setup(_e){let T=d(),c=d(!1),p=d(!1);ie();const $=Z(),S=d(!0),A=d({global:{value:null,matchMode:g.CONTAINS},employee_name:{value:null,matchMode:g.STARTS_WITH,matchMode:g.EQUALS,matchMode:g.CONTAINS},status:{value:null,matchMode:g.EQUALS}}),U=d(["Pending","Approved","Rejected"]);let u=null,_=null;E(()=>{D()});function D(){let n=window.location.origin+"/fetch_approvals_pmsforms";console.log("AJAX URL : "+n),M.get(n).then(a=>{console.log("Axios : "+a.data),T.value=a.data,S.value=!1})}function R(n,a){c.value=!0,u=a,_=n,console.log("Selected Row Data : "+JSON.stringify(n))}function N(n){c.value=!1,n&&C()}function C(){u="",_=null}function B(){N(!1),p.value=!0,console.log("Processing Rowdata : "+JSON.stringify(_)),M.post(window.location.origin+"/approvals-pms",{kpiform_review_id:_.pms_kpiform_review_id,status:u=="Approve"?"Approved":u=="Reject"?"Rejected":u}).then(n=>{console.log("Response : "+n),p.value=!1,$.add({severity:"success",summary:"Info",detail:"Success",life:3e3}),D(),C()}).catch(n=>{p.value=!1,C(),console.log(n.toJSON())})}return(n,a)=>{const I=i("Toast"),V=i("ProgressSpinner"),x=i("Dialog"),h=i("Button"),j=i("InputText"),v=i("Column"),O=i("Dropdown"),F=i("DataTable");return w(),b("div",null,[t(I),t(x,{header:"Header",visible:S.value,"onUpdate:visible":a[0]||(a[0]=e=>S.value=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[t(V,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[ce]),_:1},8,["visible"]),t(x,{header:"Header",visible:y(p),"onUpdate:visible":a[1]||(a[1]=e=>L(p)?p.value=e:p=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[t(V,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[ue]),_:1},8,["visible"]),t(x,{header:"Confirmation",visible:y(c),"onUpdate:visible":a[4]||(a[4]=e=>L(c)?c.value=e:c=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:s(()=>[t(h,{label:"Yes",icon:"pi pi-check",onClick:a[2]||(a[2]=e=>B()),class:"p-button-text",autofocus:""}),t(h,{label:"No",icon:"pi pi-times",onClick:a[3]||(a[3]=e=>N(!0)),class:"p-button-text"})]),default:s(()=>[r("div",de,[me,r("span",null,"Are you sure you want to "+m(y(u))+"?",1)])]),_:1},8,["visible"]),r("div",null,[t(F,{value:y(T),paginator:!0,rows:10,dataKey:"id",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:A.value,"onUpdate:filters":a[5]||(a[5]=e=>A.value=e),filterDisplay:"menu",loading:n.loading2,globalFilterFields:["name","status"],style:{"white-space":"nowrap"}},{empty:s(()=>[k(" No PMS forms found. ")]),loading:s(()=>[k(" Loading PMS forms data. Please wait. ")]),default:s(()=>[t(v,{class:"font-bold",field:"assignee_name",header:"Assignee Name"},{body:s(e=>[k(m(e.data.assignee_name),1)]),filter:s(({filterModel:e,filterCallback:f})=>[t(j,{modelValue:e.value,"onUpdate:modelValue":l=>e.value=l,onInput:l=>f(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(v,{field:"assignment_period",header:"Assignment Period"}),t(v,{field:"reviewer_name",header:"Reviewer Name"}),t(v,{field:"status",header:"Status",icon:"pi pi-check"},{body:s(({data:e})=>[r("span",{class:P("customer-badge status-"+e.status)},m(e.status),3)]),filter:s(({filterModel:e,filterCallback:f})=>[t(O,{modelValue:e.value,"onUpdate:modelValue":l=>e.value=l,onChange:l=>f(),options:U.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:s(l=>[l.value?(w(),b("span",{key:0,class:P("customer-badge status-"+l.value)},m(l.value),3)):(w(),b("span",ve,m(l.placeholder),1))]),option:s(l=>[r("span",{class:P("customer-badge status-"+l.option)},m(l.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(v,{style:{width:"300px"},field:"",header:"Action"},{body:s(e=>[e.data.status=="Pending"?(w(),b("span",fe,[t(h,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:f=>R(e.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t(h,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2em"},onClick:f=>R(e.data,"Reject")},null,8,["onClick"])])):J("",!0)]),_:1})]),_:1},8,["value","filters","loading"])])])}}},o=H(ge);o.use(Q,{ripple:!0});o.use(re);o.use(ee);o.directive("tooltip",te);o.directive("badge",oe);o.directive("ripple",W);o.directive("styleclass",ae);o.directive("focustrap",z);o.component("Button",K);o.component("DataTable",le);o.component("Column",X);o.component("ConfirmDialog",se);o.component("Toast",ne);o.component("Dialog",G);o.component("Dropdown",Y);o.component("ProgressSpinner",pe);o.component("InputText",q);o.mount("#vjs_pmsApproval_Table");
