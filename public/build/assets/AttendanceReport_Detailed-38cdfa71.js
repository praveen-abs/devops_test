import{H as x,aa as g,G as I,o as f,c as _,h as o,w as t,d as i,t as s,l as n,k as y,F as h,f as b,g as u,am as w,I as M,P as B,J as E,R as F,u as O,v as H,N as Q,K as q,M as J,A as Y,L as j}from"./toastservice.esm-daaadd68.js";import{T as z,B as G,S as K,b as W,a as X}from"./styleclass.esm-238cf974.js";import"./blockui.esm-6e7e82a0.js";import{D as Z}from"./dialogservice.esm-5cd09541.js";import{C as ee}from"./confirmationservice.esm-adca2b55.js";import{s as ae}from"./progressspinner.esm-428ecd71.js";import{s as oe}from"./row.esm-6ebc942e.js";import{s as te}from"./columngroup.esm-9dd1458e.js";import{a as A}from"./index-362795f3.js";const le=i("h5",{style:{"text-align":"center"}},"Please wait...",-1),ne={class:"confirmation-content"},ie=i("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),se=["value"],re=["value"],de=["value"],pe=["value"],ue={__name:"AttendanceReport_Detailed",setup(me){const m={name:"Choose",value:""},U=[{name:"Choose",value:""},{name:"Financial Year",value:"financial_year"},{name:"Calendar Year",value:"calendar_year"}],T={name:"Choose",value:""},R=[{name:"Choose",value:""},{name:"April - 2021 to March - 2022",value:"April - 2021 to March - 2022"},{name:"April - 2022 to March - 2023",value:"April - 2022 to March - 2023"}],P=[{name:"Choose",value:""},{name:"Q1",value:"q1"},{name:"Q2",value:"q2"},{name:"Q3",value:"q3"},{name:"Q4",value:"q4"}],V=x({global:{value:null,matchMode:g.CONTAINS},employee_name:{value:null,matchMode:g.STARTS_WITH,matchMode:g.EQUALS,matchMode:g.CONTAINS}}),k=x();I(()=>{let r=window.location.origin+"/fetch-regularization-approvals";console.log("AJAX URL : "+r),A.get(r).then(a=>{console.log("Axios : "+a.data),k.value=a.data})});function $(r){console.log("Processing Rowdata : "+JSON.stringify(r)),A.get(window.location.origin+"/report-download-pmsforms",{pms_form_id:r}).then(a=>{let C=new Blob([a.data],{type:"data:application/vnd.ms-excel"}),S=window.URL.createObjectURL(C);var c=document.createElement("a");c.href=S,c.download="pdf_name.xlsx",c.click(),console.log(a)}).catch(a=>{console.log(a.toJSON())})}return(r,a)=>{const C=u("Toast"),S=u("ProgressSpinner"),c=u("Dialog"),D=u("Button"),L=u("InputText"),d=u("Column"),N=u("DataTable");return f(),_("div",null,[o(C),o(c,{header:"Header",visible:r.canShowLoadingScreen,"onUpdate:visible":a[0]||(a[0]=e=>r.canShowLoadingScreen=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:t(()=>[o(S,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:t(()=>[le]),_:1},8,["visible"]),o(c,{header:"Confirmation",visible:r.canShowConfirmation,"onUpdate:visible":a[3]||(a[3]=e=>r.canShowConfirmation=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:t(()=>[o(D,{label:"Yes",icon:"pi pi-check",onClick:a[1]||(a[1]=e=>r.processApproveReject()),class:"p-button-text",autofocus:""}),o(D,{label:"No",icon:"pi pi-times",onClick:a[2]||(a[2]=e=>r.hideConfirmDialog(!0)),class:"p-button-text"})]),default:t(()=>[i("div",ne,[ie,i("span",null,"Are you sure you want to "+s(r.currentlySelectedStatus)+"?",1)])]),_:1},8,["visible"]),i("div",null,[i("div",null,[n("Calander Type : "),y(i("select",{"onUpdate:modelValue":a[4]||(a[4]=e=>m.value=e)},[(f(),_(h,null,b(U,e=>i("option",{value:e.value},s(e.name),9,se)),64))],512),[[w,m.value]])]),i("div",null,[n("Year : "),y(i("select",{"onUpdate:modelValue":a[5]||(a[5]=e=>T.value=e)},[(f(),_(h,null,b(R,e=>i("option",{value:e.value},s(e.name),9,re)),64))],512),[[w,T.value]])]),i("div",null,[n("Legal Entity : "),y(i("select",{"onUpdate:modelValue":a[6]||(a[6]=e=>m.value=e)},[(f(),_(h,null,b(P,e=>i("option",{value:e.value},s(e.name),9,de)),64))],512),[[w,m.value]])]),i("div",null,[n("Department : "),y(i("select",{"onUpdate:modelValue":a[7]||(a[7]=e=>m.value=e)},[(f(),_(h,null,b(P,e=>i("option",{value:e.value},s(e.name),9,pe)),64))],512),[[w,m.value]])]),i("div",null,[o(D,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Download Excel",onClick:a[8]||(a[8]=e=>$(1)),style:{height:"2em"}})]),o(N,{value:k.value,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:V.value,"onUpdate:filters":a[9]||(a[9]=e=>V.value=e),filterDisplay:"menu",loading:r.loading2,globalFilterFields:["name","status"]},{empty:t(()=>[n(" No Employee found ")]),loading:t(()=>[n(" Loading customers data. Please wait. ")]),default:t(()=>[o(d,{field:"employee_name",header:"Employee Name"},{body:t(e=>[n(s(e.data.employee_name),1)]),filter:t(({filterModel:e,filterCallback:v})=>[o(L,{modelValue:e.value,"onUpdate:modelValue":p=>e.value=p,onInput:p=>v(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),o(d,{field:"department",header:"Designation"},{body:t(e=>[n(s(e.data.designation),1)]),filter:t(({filterModel:e,filterCallback:v})=>[o(L,{modelValue:e.value,"onUpdate:modelValue":p=>e.value=p,onInput:p=>v(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),o(d,{field:"department",header:"Department"},{body:t(e=>[n(s(e.data.department),1)]),filter:t(({filterModel:e,filterCallback:v})=>[o(L,{modelValue:e.value,"onUpdate:modelValue":p=>e.value=p,onInput:p=>v(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),o(d,{field:"employee_name",header:"PD"},{body:t(e=>[n(s(e.data.pd),1)]),_:1}),o(d,{field:"employee_name",header:"HD"},{body:t(e=>[n(s(e.data.pd),1)]),_:1}),o(d,{field:"employee_name",header:"HO"},{body:t(e=>[n(s(e.data.pd),1)]),_:1}),o(d,{field:"employee_name",header:"OD"},{body:t(e=>[n(s(e.data.pd),1)]),_:1}),o(d,{field:"employee_name",header:"SL/CL"},{body:t(e=>[n(s(e.data.pd),1)]),_:1}),o(d,{field:"employee_name",header:"EL"},{body:t(e=>[n(s(e.data.pd),1)]),_:1}),o(d,{field:"employee_name",header:"SL"},{body:t(e=>[n(s(e.data.pd),1)]),_:1}),o(d,{field:"employee_name",header:"CL"},{body:t(e=>[n(s(e.data.pd),1)]),_:1}),o(d,{field:"employee_name",header:"ML"},{body:t(e=>[n(s(e.data.pd),1)]),_:1})]),_:1},8,["value","filters","loading"])])])}}},l=M(ue);l.use(B,{ripple:!0});l.use(ee);l.use(E);l.use(Z);l.directive("tooltip",z);l.directive("badge",G);l.directive("ripple",F);l.directive("styleclass",K);l.directive("focustrap",O);l.component("Button",H);l.component("DataTable",W);l.component("Column",X);l.component("ColumnGroup",te);l.component("Row",oe);l.component("Toast",Q);l.component("ConfirmDialog",q);l.component("Dropdown",J);l.component("InputText",Y);l.component("Dialog",j);l.component("ProgressSpinner",ae);l.mount("#vjs_AttendanceReport_Detailed");
