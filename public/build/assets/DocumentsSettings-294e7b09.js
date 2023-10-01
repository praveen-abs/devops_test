import{a as h}from"./index-362795f3.js";import{p as y,r as g,y as b,o as S,b as d,d as D,e as v,f as u,m as a,k as r,g as l}from"./app-0f1d8729.js";import{S as w}from"./Service-8c132ee2.js";const x=y("DocumentSettings",()=>{const c=g(),t=g(!1);w();const _=g(),n=b([]);async function i(){t.value=!0,await h.get("/documents/employee_doc_settings").then(o=>{c.value=o.data.data}).finally(()=>{t.value=!1})}async function m(o){console.log("Updating doc status for : "+o.is_onboarding_doc),console.log("Updating doc status for : "+o.is_mandatory)}function p(o){console.log("testing:",o);let f="/documents/update_employee_doc_settings";h.post(f,c.value).then(e=>{console.log(e.data.status),e.data.status=="success"?Swal.fire({title:e.data.status="Success",text:e.data.message,icon:"success",showCancelButton:!1}).then(s=>{}):e.data.status=="failure"&&Swal.fire({title:e.data.status="Failure",text:e.data.message,icon:"error",showCancelButton:!1}).then(s=>{window.location.reload()})}).finally(()=>{n.splice(0,n.length)})}return{array_emp_documents_details:c,loading:t,is_onboarding_doc:_,getEmployeesDocumentsDetails:i,submitDocumentSettings:p,updateDocumentState:m}});const C={class:"card p-3"},V=u("h1",{class:"mt-2 font-semibold text-lg"},"Documents Settings",-1),k={class:"my-3"},P={class:"mx-5 mt-4"},L=u("h5",{style:{"text-align":"center"}},"Please wait...",-1),E={__name:"DocumentsSettings",setup(c){const t=x();return g(),S(async()=>{await t.getEmployeesDocumentsDetails()}),(_,n)=>{const i=d("Column"),m=d("Checkbox"),p=d("DataTable"),o=d("ProgressSpinner"),f=d("Dialog");return D(),v("div",C,[V,u("div",k,[a(p,{value:l(t).array_emp_documents_details,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filterDisplay:"menu",loading:_.loading2,globalFilterFields:["name","status"]},{default:r(()=>[a(i,{headerStyle:"width: 3rem"}),a(i,{field:"document_name",header:"Document Name"}),a(i,{field:"is_onboarding_doc",header:"Is Onboarding Document ?"},{body:r(e=>[a(m,{onChange:s=>l(t).updateDocumentState(e.data),modelValue:e.data.is_onboarding_doc,"onUpdate:modelValue":s=>e.data.is_onboarding_doc=s,binary:!0,trueValue:1,falseValue:0},null,8,["onChange","modelValue","onUpdate:modelValue"])]),_:1}),a(i,{field:"is_mandatory",header:"Is Mandatory Document ?"},{body:r(e=>[a(m,{onChange:s=>l(t).updateDocumentState(e.data),modelValue:e.data.is_mandatory,"onUpdate:modelValue":s=>e.data.is_mandatory=s,binary:!0,trueValue:1,falseValue:0},null,8,["onChange","modelValue","onUpdate:modelValue"])]),_:1})]),_:1},8,["value","loading"])]),u("div",P,[u("button",{class:"btn-orange p-2 rounded float-right",onClick:n[0]||(n[0]=(...e)=>l(t).submitDocumentSettings&&l(t).submitDocumentSettings(...e))},"Submit")]),a(f,{header:"Header",visible:l(t).loading,"onUpdate:visible":n[1]||(n[1]=e=>l(t).loading=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:r(()=>[a(o,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:r(()=>[L]),_:1},8,["visible"])])}}};export{E as default};
