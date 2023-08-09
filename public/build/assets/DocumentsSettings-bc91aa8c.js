import{Q as g,W as y,af as S,o as b,c as D,d as u,h as o,w as c,ae as r,g as d,G as w,P as C,H as x,R as P,u as V,v as k,I as $,L as T,J as B,K as L,A as R}from"./toastservice.esm-c06f2f8b.js";import{T as U,B as F,S as E,b as I,a as N}from"./styleclass.esm-f13b5ad8.js";import"./blockui.esm-b5c5eeb1.js";import{C as O}from"./confirmationservice.esm-5e8ac686.js";import{s as A}from"./progressspinner.esm-7742d82c.js";import{s as H}from"./calendar.esm-b2adcb28.js";import{s as K}from"./checkbox.esm-486d8fff.js";import{d as M,c as W}from"./pinia-c421e60d.js";import{a as v}from"./index-362795f3.js";import{S as G}from"./Service-e63d88b6.js";const J=M("DocumentSettings",()=>{const m=g(),a=g(!1);G();const _=g(),n=y([]);async function l(){a.value=!0,await v.get("/documents/employee_doc_settings").then(s=>{m.value=s.data.data}).finally(()=>{a.value=!1})}async function p(s){console.log("Updating doc status for : "+s.is_onboarding_doc),console.log("Updating doc status for : "+s.is_mandatory)}function f(s){console.log("testing:",s);let h="/documents/update_employee_doc_settings";v.post(h,m.value).then(t=>{console.log(t.data.status),t.data.status=="success"?Swal.fire({title:t.data.status="Success",text:t.data.message,icon:"success",showCancelButton:!1}).then(i=>{}):t.data.status=="failure"&&Swal.fire({title:t.data.status="Failure",text:t.data.message,icon:"error",showCancelButton:!1}).then(i=>{window.location.reload()})}).finally(()=>{n.splice(0,n.length)})}return{array_emp_documents_details:m,loading:a,is_onboarding_doc:_,getEmployeesDocumentsDetails:l,submitDocumentSettings:f,updateDocumentState:p}});const Q={class:"card p-3",style:{"margin-top":"-35px"}},j=u("h1",{class:"mt-2 fs-4 fw-bold"},"Documents Settings",-1),q={class:"my-5"},z={class:"mx-5 mt-4"},X=u("h5",{style:{"text-align":"center"}},"Please wait...",-1),Y={__name:"DocumentsSettings",setup(m){const a=J();return g(),S(async()=>{await a.getEmployeesDocumentsDetails()}),(_,n)=>{const l=d("Column"),p=d("Checkbox"),f=d("DataTable"),s=d("ProgressSpinner"),h=d("Dialog");return b(),D("div",Q,[j,u("div",q,[o(f,{value:r(a).array_emp_documents_details,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filterDisplay:"menu",loading:_.loading2,globalFilterFields:["name","status"]},{default:c(()=>[o(l,{headerStyle:"width: 3rem"}),o(l,{field:"document_name",header:"Document Name"}),o(l,{field:"is_onboarding_doc",header:"Is Onboarding Document ?"},{body:c(t=>[o(p,{onChange:i=>r(a).updateDocumentState(t.data),modelValue:t.data.is_onboarding_doc,"onUpdate:modelValue":i=>t.data.is_onboarding_doc=i,binary:!0,trueValue:1,falseValue:0},null,8,["onChange","modelValue","onUpdate:modelValue"])]),_:1}),o(l,{field:"is_mandatory",header:"Is Mandatory Document ?"},{body:c(t=>[o(p,{onChange:i=>r(a).updateDocumentState(t.data),modelValue:t.data.is_mandatory,"onUpdate:modelValue":i=>t.data.is_mandatory=i,binary:!0,trueValue:1,falseValue:0},null,8,["onChange","modelValue","onUpdate:modelValue"])]),_:1})]),_:1},8,["value","loading"])]),u("div",z,[u("button",{class:"btn-orange p-2 rounded float-right",onClick:n[0]||(n[0]=(...t)=>r(a).submitDocumentSettings&&r(a).submitDocumentSettings(...t))},"Submit")]),o(h,{header:"Header",visible:r(a).loading,"onUpdate:visible":n[1]||(n[1]=t=>r(a).loading=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:c(()=>[o(s,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:c(()=>[X]),_:1},8,["visible"])])}}},e=w(Y),Z=W();e.use(C,{ripple:!0});e.use(O);e.use(x);e.use(Z);e.directive("tooltip",U);e.directive("badge",F);e.directive("ripple",P);e.directive("styleclass",E);e.directive("focustrap",V);e.component("Checkbox",K);e.component("Button",k);e.component("DataTable",I);e.component("Column",N);e.component("ConfirmDialog",$);e.component("Toast",T);e.component("Dialog",B);e.component("Dropdown",L);e.component("ProgressSpinner",A);e.component("InputText",R);e.component("Calendar",H);e.mount("#DocumentsSettings");
