import{H as f,I as O,o as C,c as F,d as s,h as o,w as c,af as u,g as m,J as P,P as $,K as k,R as x,u as S,v as T,Q as B,L as R,N as E,A as L,M as N}from"./toastservice.esm-8fb4434b.js";import{d as M,c as A}from"./pinia-e794dd07.js";import{T as U,B as I,S as V,b as G,a as H}from"./styleclass.esm-177a019b.js";import"./blockui.esm-28d5b93f.js";import{D as K}from"./dialogservice.esm-5a1ef638.js";import{C as q}from"./confirmationservice.esm-70c98e17.js";import{s as z}from"./progressspinner.esm-ad93ab56.js";import{s as J}from"./progressbar.esm-95bde75d.js";import{s as Q}from"./row.esm-6ebc942e.js";import{s as W}from"./columngroup.esm-9dd1458e.js";import{s as Y}from"./calendar.esm-cb84fdd3.js";import{s as j}from"./textarea.esm-993ab114.js";import{s as X}from"./chips.esm-0e9e267f.js";import{s as Z}from"./multiselect.esm-045e00e5.js";import{a as _}from"./index-3716a3fc.js";import"./_commonjsHelpers-042e6b4d.js";const ee=M("OnboardingFromService",()=>{const b=f([]),t=f(!1);async function r(){console.log("Getting Onboarding from details"),t.value=!0,await _.get("http://localhost:3000/OnboardingFormDetails").then(l=>{b.value=l.data}).finally(()=>{t.value=!1})}async function p(){console.log("testing EditOnboarding form details "),window.location.href="http://localhost:3000/OnboardingFormDetails"}async function v(l){console.log("Delete Onboarding Form Details",l),await _.post("http://localhost:3000/DeleteOnboardingFormDetails",{selected_Id:l}).then(i=>{console.log(i.data)}).finally(()=>{})}return{array_OnboardingFromDetails:b,loading:t,getOnboardingFormDetails:r,EditOnboardingFormDetails:p,DeleteOnboardingFormDetails:v}}),oe={class:"mt-30"},te=s("h1",{class:"fs-4 fw-bold mb-4"}," Onboarding Form management",-1),ae={class:"card"},ne=s("div",{class:"confirmation-content text-center"},[s("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}}),s("span",null,"Are you sure you want to delete Onboarding from details ?")],-1),ie={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},se=s("h5",{style:{"text-align":"center"}},"Please wait...",-1),re={__name:"OnboardingFormMgmt",setup(b){const t=ee();O(()=>{t.getOnboardingFormDetails()});const r=f(!1),p=f();function v(i){p.value=i,console.log(" selected_id : ",p.value),r.value=!0}async function l(i){await t.DeleteOnboardingFormDetails(i)}return(i,a)=>{const d=m("Column"),g=m("Button"),h=m("DataTable"),D=m("Dialog"),y=m("ProgressSpinner");return C(),F("div",oe,[te,s("div",ae,[o(h,{value:u(t).array_OnboardingFromDetails,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:i.filters,"onUpdate:filters":a[0]||(a[0]=n=>i.filters=n),filterDisplay:"menu",loading:i.loading2,globalFilterFields:["name","status"]},{default:c(()=>[o(d,{field:"emp_code",header:"Employee Code"}),o(d,{field:"emp_name",header:"Employee Name"}),o(d,{field:"onboarding_status",header:"Onboarding Status"}),o(d,{field:"action",header:"Action"},{body:c(n=>[o(g,{class:"btn-primary mr-2 p-2",icon:"pi  pi-pencil",style:{},label:"Edit",onClick:w=>u(t).EditOnboardingFormDetails(n.data.id)},null,8,["onClick"]),o(g,{class:"btn-orange p-2",icon:"pi pi-delete-left",label:"Delete",onClick:w=>v(n.data.id)},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters","loading"])]),o(D,{header:"Confirmation",visible:r.value,"onUpdate:visible":a[3]||(a[3]=n=>r.value=n),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:c(()=>[ne,s("div",ie,[o(g,{class:"btn-primary mr-3 py-2",label:"Yes",icon:"pi pi-check",onClick:a[1]||(a[1]=n=>l(p.value)),autofocus:""}),o(g,{label:"No",icon:"pi pi-times",onClick:a[2]||(a[2]=n=>r.value=!1),class:"p-button-text py-2",autofocus:""})])]),_:1},8,["visible"]),o(D,{header:"Header",visible:u(t).loading,"onUpdate:visible":a[4]||(a[4]=n=>u(t).loading=n),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:c(()=>[o(y,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:c(()=>[se]),_:1},8,["visible"])])}}},e=P(re),le=A();e.use($,{ripple:!0});e.use(q);e.use(k);e.use(K);e.use(le);e.directive("tooltip",U);e.directive("badge",I);e.directive("ripple",x);e.directive("styleclass",V);e.directive("focustrap",S);e.component("Button",T);e.component("DataTable",G);e.component("Column",H);e.component("ColumnGroup",W);e.component("Row",Q);e.component("Toast",B);e.component("ConfirmDialog",R);e.component("Dropdown",E);e.component("InputText",L);e.component("Dialog",N);e.component("ProgressSpinner",z);e.component("Calendar",Y);e.component("Textarea",j);e.component("Chips",X);e.component("MultiSelect",Z);e.component("ProgressBar",J);e.mount("#OnboardingFromMgmt");