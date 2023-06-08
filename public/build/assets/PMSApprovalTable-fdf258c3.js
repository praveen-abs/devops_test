import{H as d,ag as E,I as J,c as w,h as t,w as s,af as b,a6 as L,e as r,X as g,g as i,o as y,t as m,k,n as P,a as H,J as Q,P as W,K as z,R as K,u as X,v as G,L as Y,Q as q,M as Z,N as ee,A as te}from"./toastservice.esm-b0df8430.js";import{T as ae,B as oe,S as se,b as ne,a as le}from"./styleclass.esm-c88657ea.js";import"./blockui.esm-7963e732.js";import{u as ie,C as re}from"./confirmationservice.esm-6f4a46b4.js";import{s as pe}from"./progressspinner.esm-6cc3039f.js";import{a as M}from"./index-362795f3.js";const ce=r("h5",{style:{"text-align":"center"}},"Please wait...",-1),ue=r("h5",{style:{"text-align":"center"}},"Please wait...",-1),de={class:"confirmation-content"},me=r("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),ve={key:1},fe={key:0},ge={__name:"PMSApprovalTable",setup(_e){let T=d(),c=d(!1),p=d(!1);ie();const $=E(),S=d(!0),A=d({global:{value:null,matchMode:g.CONTAINS},employee_name:{value:null,matchMode:g.STARTS_WITH,matchMode:g.EQUALS,matchMode:g.CONTAINS},status:{value:null,matchMode:g.EQUALS}}),U=d(["Pending","Approved","Rejected"]);let u=null,_=null;J(()=>{D()});function D(){let n=window.location.origin+"/fetch_approvals_pmsforms";console.log("AJAX URL : "+n),M.get(n).then(o=>{console.log("Axios : "+o.data),T.value=o.data,S.value=!1})}function R(n,o){c.value=!0,u=o,_=n,console.log("Selected Row Data : "+JSON.stringify(n))}function N(n){c.value=!1,n&&C()}function C(){u="",_=null}function B(){N(!1),p.value=!0,console.log("Processing Rowdata : "+JSON.stringify(_)),M.post(window.location.origin+"/approvals-pms",{kpiform_review_id:_.pms_kpiform_review_id,status:u=="Approve"?"Approved":u=="Reject"?"Rejected":u}).then(n=>{console.log("Response : "+n),p.value=!1,$.add({severity:"success",summary:"Info",detail:"Success",life:3e3}),D(),C()}).catch(n=>{p.value=!1,C(),console.log(n.toJSON())})}return(n,o)=>{const I=i("Toast"),V=i("ProgressSpinner"),x=i("Dialog"),h=i("Button"),j=i("InputText"),v=i("Column"),O=i("Dropdown"),F=i("DataTable");return y(),w("div",null,[t(I),t(x,{header:"Header",visible:S.value,"onUpdate:visible":o[0]||(o[0]=e=>S.value=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[t(V,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[ce]),_:1},8,["visible"]),t(x,{header:"Header",visible:b(p),"onUpdate:visible":o[1]||(o[1]=e=>L(p)?p.value=e:p=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[t(V,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[ue]),_:1},8,["visible"]),t(x,{header:"Confirmation",visible:b(c),"onUpdate:visible":o[4]||(o[4]=e=>L(c)?c.value=e:c=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:s(()=>[t(h,{label:"Yes",icon:"pi pi-check",onClick:o[2]||(o[2]=e=>B()),class:"p-button-text",autofocus:""}),t(h,{label:"No",icon:"pi pi-times",onClick:o[3]||(o[3]=e=>N(!0)),class:"p-button-text"})]),default:s(()=>[r("div",de,[me,r("span",null,"Are you sure you want to "+m(b(u))+"?",1)])]),_:1},8,["visible"]),r("div",null,[t(F,{value:b(T),paginator:!0,rows:10,dataKey:"id",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:A.value,"onUpdate:filters":o[5]||(o[5]=e=>A.value=e),filterDisplay:"menu",loading:n.loading2,globalFilterFields:["name","status"],style:{"white-space":"nowrap"}},{empty:s(()=>[k(" No PMS forms found. ")]),loading:s(()=>[k(" Loading PMS forms data. Please wait. ")]),default:s(()=>[t(v,{class:"font-bold",field:"assignee_name",header:"Assignee Name"},{body:s(e=>[k(m(e.data.assignee_name),1)]),filter:s(({filterModel:e,filterCallback:f})=>[t(j,{modelValue:e.value,"onUpdate:modelValue":l=>e.value=l,onInput:l=>f(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(v,{field:"assignment_period",header:"Assignment Period"}),t(v,{field:"reviewer_name",header:"Reviewer Name"}),t(v,{field:"status",header:"Status",icon:"pi pi-check"},{body:s(({data:e})=>[r("span",{class:P("customer-badge status-"+e.status)},m(e.status),3)]),filter:s(({filterModel:e,filterCallback:f})=>[t(O,{modelValue:e.value,"onUpdate:modelValue":l=>e.value=l,onChange:l=>f(),options:U.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:s(l=>[l.value?(y(),w("span",{key:0,class:P("customer-badge status-"+l.value)},m(l.value),3)):(y(),w("span",ve,m(l.placeholder),1))]),option:s(l=>[r("span",{class:P("customer-badge status-"+l.option)},m(l.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(v,{style:{width:"300px"},field:"",header:"Action"},{body:s(e=>[e.data.status=="Pending"?(y(),w("span",fe,[t(h,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:f=>R(e.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t(h,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2em"},onClick:f=>R(e.data,"Reject")},null,8,["onClick"])])):H("",!0)]),_:1})]),_:1},8,["value","filters","loading"])])])}}},a=Q(ge);a.use(W,{ripple:!0});a.use(re);a.use(z);a.directive("tooltip",ae);a.directive("badge",oe);a.directive("ripple",K);a.directive("styleclass",se);a.directive("focustrap",X);a.component("Button",G);a.component("DataTable",ne);a.component("Column",le);a.component("ConfirmDialog",Y);a.component("Toast",q);a.component("Dialog",Z);a.component("Dropdown",ee);a.component("ProgressSpinner",pe);a.component("InputText",te);a.mount("#vjs_pmsApproval_Table");
