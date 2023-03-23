import{I as d,G as E,K as J,J as L,c as b,h as t,w as s,L as w,V as $,e as r,S as g,g as i,o as y,t as m,j as k,n as T,a as H,B as W,P as z,E as G,R as K,q as Q}from"./index-296d05eb.js";import{u as q,C as X,T as Y,B as Z,S as ee,F as te,c as oe,b as ae,d as se,e as ne,a as le}from"./styleclass.esm-00d66bb1.js";import"./blockui.esm-effafc02.js";import{s as ie}from"./confirmdialog.esm-a3be1b39.js";import{s as re}from"./toast.esm-e2cdcf4e.js";import{s as pe}from"./progressspinner.esm-5bc84119.js";const ce=r("h5",{style:{"text-align":"center"}},"Please wait...",-1),ue=r("h5",{style:{"text-align":"center"}},"Please wait...",-1),de={class:"confirmation-content"},me=r("i",{class:"pi pi-exclamation-triangle mr-3",style:{"font-size":"2rem"}},null,-1),ve={key:1},fe={key:0},ge={__name:"PMSApprovalTable",setup(_e){let A=d(),c=d(!1),p=d(!1);q();const B=E(),S=d(!0),P=d({global:{value:null,matchMode:g.CONTAINS},employee_name:{value:null,matchMode:g.STARTS_WITH,matchMode:g.EQUALS,matchMode:g.CONTAINS},status:{value:null,matchMode:g.EQUALS}}),M=d(["Pending","Approved","Rejected"]);let u=null,_=null;J(()=>{D()});function D(){let n=window.location.origin+"/fetch_approvals_pmsforms";console.log("AJAX URL : "+n),L.get(n).then(a=>{console.log("Axios : "+a.data),A.value=a.data,S.value=!1})}function R(n,a){c.value=!0,u=a,_=n,console.log("Selected Row Data : "+JSON.stringify(n))}function N(n){c.value=!1,n&&C()}function C(){u="",_=null}function U(){N(!1),p.value=!0,console.log("Processing Rowdata : "+JSON.stringify(_)),L.post(window.location.origin+"/approvals-pms",{kpiform_review_id:_.pms_kpiform_review_id,status:u=="Approve"?"Approved":u=="Reject"?"Rejected":u}).then(n=>{console.log("Response : "+n),p.value=!1,B.add({severity:"success",summary:"Info",detail:"Success",life:3e3}),D(),C()}).catch(n=>{p.value=!1,C(),console.log(n.toJSON())})}return(n,a)=>{const I=i("Toast"),V=i("ProgressSpinner"),x=i("Dialog"),h=i("Button"),j=i("InputText"),v=i("Column"),F=i("Dropdown"),O=i("DataTable");return y(),b("div",null,[t(I),t(x,{header:"Header",visible:S.value,"onUpdate:visible":a[0]||(a[0]=e=>S.value=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[t(V,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[ce]),_:1},8,["visible"]),t(x,{header:"Header",visible:w(p),"onUpdate:visible":a[1]||(a[1]=e=>$(p)?p.value=e:p=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[t(V,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[ue]),_:1},8,["visible"]),t(x,{header:"Confirmation",visible:w(c),"onUpdate:visible":a[4]||(a[4]=e=>$(c)?c.value=e:c=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:s(()=>[t(h,{label:"Yes",icon:"pi pi-check",onClick:a[2]||(a[2]=e=>U()),class:"p-button-text",autofocus:""}),t(h,{label:"No",icon:"pi pi-times",onClick:a[3]||(a[3]=e=>N(!0)),class:"p-button-text"})]),default:s(()=>[r("div",de,[me,r("span",null,"Are you sure you want to "+m(w(u))+"?",1)])]),_:1},8,["visible"]),r("div",null,[t(O,{value:w(A),paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:P.value,"onUpdate:filters":a[5]||(a[5]=e=>P.value=e),filterDisplay:"menu",loading:n.loading2,globalFilterFields:["name","status"]},{empty:s(()=>[k(" No PMS forms found. ")]),loading:s(()=>[k(" Loading PMS forms data. Please wait. ")]),default:s(()=>[t(v,{field:"assignee_name",header:"Assignee Name"},{body:s(e=>[k(m(e.data.assignee_name),1)]),filter:s(({filterModel:e,filterCallback:f})=>[t(j,{modelValue:e.value,"onUpdate:modelValue":l=>e.value=l,onInput:l=>f(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(v,{field:"assignment_period",header:"Assignment Period"}),t(v,{field:"reviewer_name",header:"Reviewer Name"}),t(v,{field:"status",header:"Status",icon:"pi pi-check"},{body:s(({data:e})=>[r("span",{class:T("customer-badge status-"+e.status)},m(e.status),3)]),filter:s(({filterModel:e,filterCallback:f})=>[t(F,{modelValue:e.value,"onUpdate:modelValue":l=>e.value=l,onChange:l=>f(),options:M.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:s(l=>[l.value?(y(),b("span",{key:0,class:T("customer-badge status-"+l.value)},m(l.value),3)):(y(),b("span",ve,m(l.placeholder),1))]),option:s(l=>[r("span",{class:T("customer-badge status-"+l.option)},m(l.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(v,{style:{width:"300px"},field:"",header:"Action"},{body:s(e=>[e.data.status=="Pending"?(y(),b("span",fe,[t(h,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:f=>R(e.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),t(h,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2em"},onClick:f=>R(e.data,"Reject")},null,8,["onClick"])])):H("",!0)]),_:1})]),_:1},8,["value","filters","loading"])])])}}},o=W(ge);o.use(z,{ripple:!0});o.use(X);o.use(G);o.directive("tooltip",Y);o.directive("badge",Z);o.directive("ripple",K);o.directive("styleclass",ee);o.directive("focustrap",te);o.component("Button",Q);o.component("DataTable",oe);o.component("Column",ae);o.component("ConfirmDialog",ie);o.component("Toast",re);o.component("Dialog",se);o.component("Dropdown",ne);o.component("ProgressSpinner",pe);o.component("InputText",le);o.mount("#vjs_pmsApproval_Table");
