/* empty css              *//* empty css                     *//* empty css                   */import{a0 as g,a3 as y,ak as S,o as D,c as b,d as u,h as o,w as c,I as r,g as d,K as w,P as C,L as x,u as P,M as V,R as k,S as $,x as T,y as L,N as B,Q as R,_ as U,V as F,W as N,Y as E}from"./toastservice.esm-484a3f44.js";import"./blockui.esm-a8e59b90.js";import{a as I}from"./datatable.esm-70b25cd4.js";import{C as M}from"./confirmationservice.esm-c218b510.js";import{s as O}from"./progressspinner.esm-b12f0644.js";import{s as K}from"./calendar.esm-17a99f33.js";import{s as W}from"./checkbox.esm-9d272dae.js";import{d as A,c as H}from"./pinia-ef13c18a.js";import{a as v}from"./index-362795f3.js";import{S as Q}from"./Service-0a78a223.js";const Y=A("DocumentSettings",()=>{const m=g(),a=g(!1);Q();const _=g(),s=y([]);async function l(){a.value=!0,await v.get("/documents/employee_doc_settings").then(n=>{m.value=n.data.data}).finally(()=>{a.value=!1})}async function p(n){console.log("Updating doc status for : "+n.is_onboarding_doc),console.log("Updating doc status for : "+n.is_mandatory)}function f(n){console.log("testing:",n);let h="/documents/update_employee_doc_settings";v.post(h,m.value).then(t=>{console.log(t.data.status),t.data.status=="success"?Swal.fire({title:t.data.status="Success",text:t.data.message,icon:"success",showCancelButton:!1}).then(i=>{}):t.data.status=="failure"&&Swal.fire({title:t.data.status="Failure",text:t.data.message,icon:"error",showCancelButton:!1}).then(i=>{window.location.reload()})}).finally(()=>{s.splice(0,s.length)})}return{array_emp_documents_details:m,loading:a,is_onboarding_doc:_,getEmployeesDocumentsDetails:l,submitDocumentSettings:f,updateDocumentState:p}});const j={class:"card p-3"},q=u("h1",{class:"mt-2 font-semibold text-lg"},"Documents Settings",-1),z={class:"my-3"},G={class:"mx-5 mt-4"},J=u("h5",{style:{"text-align":"center"}},"Please wait...",-1),X={__name:"DocumentsSettings",setup(m){const a=Y();return g(),S(async()=>{await a.getEmployeesDocumentsDetails()}),(_,s)=>{const l=d("Column"),p=d("Checkbox"),f=d("DataTable"),n=d("ProgressSpinner"),h=d("Dialog");return D(),b("div",j,[q,u("div",z,[o(f,{value:r(a).array_emp_documents_details,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filterDisplay:"menu",loading:_.loading2,globalFilterFields:["name","status"]},{default:c(()=>[o(l,{headerStyle:"width: 3rem"}),o(l,{field:"document_name",header:"Document Name"}),o(l,{field:"is_onboarding_doc",header:"Is Onboarding Document ?"},{body:c(t=>[o(p,{onChange:i=>r(a).updateDocumentState(t.data),modelValue:t.data.is_onboarding_doc,"onUpdate:modelValue":i=>t.data.is_onboarding_doc=i,binary:!0,trueValue:1,falseValue:0},null,8,["onChange","modelValue","onUpdate:modelValue"])]),_:1}),o(l,{field:"is_mandatory",header:"Is Mandatory Document ?"},{body:c(t=>[o(p,{onChange:i=>r(a).updateDocumentState(t.data),modelValue:t.data.is_mandatory,"onUpdate:modelValue":i=>t.data.is_mandatory=i,binary:!0,trueValue:1,falseValue:0},null,8,["onChange","modelValue","onUpdate:modelValue"])]),_:1})]),_:1},8,["value","loading"])]),u("div",G,[u("button",{class:"btn-orange p-2 rounded float-right",onClick:s[0]||(s[0]=(...t)=>r(a).submitDocumentSettings&&r(a).submitDocumentSettings(...t))},"Submit")]),o(h,{header:"Header",visible:r(a).loading,"onUpdate:visible":s[1]||(s[1]=t=>r(a).loading=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:c(()=>[o(n,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:c(()=>[J]),_:1},8,["visible"])])}}},e=w(X),Z=H();e.use(C,{ripple:!0});e.use(M);e.use(x);e.use(Z);e.directive("tooltip",P);e.directive("badge",V);e.directive("ripple",k);e.directive("styleclass",$);e.directive("focustrap",T);e.component("Checkbox",W);e.component("Button",L);e.component("DataTable",I);e.component("Column",B);e.component("ConfirmDialog",R);e.component("Toast",U);e.component("Dialog",F);e.component("Dropdown",N);e.component("ProgressSpinner",O);e.component("InputText",E);e.component("Calendar",K);e.mount("#DocumentsSettings");
