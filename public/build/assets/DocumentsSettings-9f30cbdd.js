/* empty css              *//* empty css                     *//* empty css                   */import{H as g,W as v,ab as S,o as y,c as D,d as u,h as o,w as c,aa as r,g as d,I as w,P as C,R as x,u as P,x as V,J as k,K as $,L as T,N as B}from"./inputnumber.esm-3276ace1.js";import{a as L,T as R,B as U,S as F,s as N,b as E}from"./toastservice.esm-fd7fc957.js";import"./blockui.esm-ff9f2709.js";import{a as I}from"./datatable.esm-aaa10fcd.js";import{C as O}from"./confirmationservice.esm-8b92365c.js";import{s as H}from"./progressspinner.esm-3aaf2487.js";import{s as K}from"./calendar.esm-5bf60357.js";import{s as M}from"./checkbox.esm-5e177d6f.js";import{d as W,c as A}from"./pinia-69eaa219.js";import{a as b}from"./index-362795f3.js";import{S as J}from"./Service-0fa21417.js";const j=W("DocumentSettings",()=>{const m=g(),a=g(!1);J();const _=g(),n=v([]);async function l(){a.value=!0,await b.get("/documents/employee_doc_settings").then(s=>{m.value=s.data.data}).finally(()=>{a.value=!1})}async function p(s){console.log("Updating doc status for : "+s.is_onboarding_doc),console.log("Updating doc status for : "+s.is_mandatory)}function f(s){console.log("testing:",s);let h="/documents/update_employee_doc_settings";b.post(h,m.value).then(t=>{console.log(t.data.status),t.data.status=="success"?Swal.fire({title:t.data.status="Success",text:t.data.message,icon:"success",showCancelButton:!1}).then(i=>{}):t.data.status=="failure"&&Swal.fire({title:t.data.status="Failure",text:t.data.message,icon:"error",showCancelButton:!1}).then(i=>{window.location.reload()})}).finally(()=>{n.splice(0,n.length)})}return{array_emp_documents_details:m,loading:a,is_onboarding_doc:_,getEmployeesDocumentsDetails:l,submitDocumentSettings:f,updateDocumentState:p}});const q={class:"card p-3"},z=u("h1",{class:"mt-2 font-semibold text-lg"},"Documents Settings",-1),G={class:"my-3"},Q={class:"mx-5 mt-4"},X=u("h5",{style:{"text-align":"center"}},"Please wait...",-1),Y={__name:"DocumentsSettings",setup(m){const a=j();return g(),S(async()=>{await a.getEmployeesDocumentsDetails()}),(_,n)=>{const l=d("Column"),p=d("Checkbox"),f=d("DataTable"),s=d("ProgressSpinner"),h=d("Dialog");return y(),D("div",q,[z,u("div",G,[o(f,{value:r(a).array_emp_documents_details,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filterDisplay:"menu",loading:_.loading2,globalFilterFields:["name","status"]},{default:c(()=>[o(l,{headerStyle:"width: 3rem"}),o(l,{field:"document_name",header:"Document Name"}),o(l,{field:"is_onboarding_doc",header:"Is Onboarding Document ?"},{body:c(t=>[o(p,{onChange:i=>r(a).updateDocumentState(t.data),modelValue:t.data.is_onboarding_doc,"onUpdate:modelValue":i=>t.data.is_onboarding_doc=i,binary:!0,trueValue:1,falseValue:0},null,8,["onChange","modelValue","onUpdate:modelValue"])]),_:1}),o(l,{field:"is_mandatory",header:"Is Mandatory Document ?"},{body:c(t=>[o(p,{onChange:i=>r(a).updateDocumentState(t.data),modelValue:t.data.is_mandatory,"onUpdate:modelValue":i=>t.data.is_mandatory=i,binary:!0,trueValue:1,falseValue:0},null,8,["onChange","modelValue","onUpdate:modelValue"])]),_:1})]),_:1},8,["value","loading"])]),u("div",Q,[u("button",{class:"btn-orange p-2 rounded float-right",onClick:n[0]||(n[0]=(...t)=>r(a).submitDocumentSettings&&r(a).submitDocumentSettings(...t))},"Submit")]),o(h,{header:"Header",visible:r(a).loading,"onUpdate:visible":n[1]||(n[1]=t=>r(a).loading=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:c(()=>[o(s,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:c(()=>[X]),_:1},8,["visible"])])}}},e=w(Y),Z=A();e.use(C,{ripple:!0});e.use(O);e.use(L);e.use(Z);e.directive("tooltip",R);e.directive("badge",U);e.directive("ripple",x);e.directive("styleclass",F);e.directive("focustrap",P);e.component("Checkbox",M);e.component("Button",V);e.component("DataTable",I);e.component("Column",k);e.component("ConfirmDialog",N);e.component("Toast",E);e.component("Dialog",$);e.component("Dropdown",T);e.component("ProgressSpinner",H);e.component("InputText",B);e.component("Calendar",K);e.mount("#DocumentsSettings");