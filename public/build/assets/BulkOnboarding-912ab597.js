/* empty css              *//* empty css                     *//* empty css                   *//* empty css                 */import{I as x,aj as w,ah as k,o as p,c as u,h as t,ai as a,b as P,w as i,d as e,l as d,t as E,T as f,F as D,g as l,J as I,P as S,K as C,u as V,L as N,R as $,S as B,x as O,y as R,M as F,Y as L,N as A,V as M,X as U,Q as q,W}from"./toastservice.esm-918560db.js";import{c as J}from"./pinia-3f44ac08.js";import{a as K}from"./datatable.esm-b98720f6.js";import{D as j,s as z}from"./dialogservice.esm-5dbb3ad8.js";import{C as G}from"./confirmationservice.esm-87248870.js";import{s as H}from"./progressspinner.esm-aabe5d1a.js";import{s as Q}from"./row.esm-6ebc942e.js";import{s as X}from"./textarea.esm-c5c6ba2f.js";import{s as Y}from"./inputmask.esm-73e17188.js";import{u as Z,_ as ee,r as oe}from"./router-63d14bb4.js";import{a as se}from"./vue-router-441d5b01.js";import{u as te}from"./NormalOnboardingMainStore-957c1437.js";import"./index-362795f3.js";import"./Service-ff2a1406.js";import"./dayjs.min-2f06af28.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./index.esm-98aa4722.js";const ae={key:0,class:""},re={class:"h-screen w-full"},ne={class:"grid grid-cols-12"},ie={class:"col-span-5 px-2"},le=e("p",{class:"font-bold text-2xl"},"Employee Bulk Onboarding",-1),ce=e("ul",{class:"list-disc p-2 my-3"},[e("li",{class:"font-semibold fs-6"},[d("Download the "),e("a",{href:"/assets/ABSBulkOnboarding.xls",class:"font-semibold text-blue-300 cursor-pointer fs-6"},"Sample")]),e("li",{class:"font-semibold fs-6"},"Fill the information in excel template")],-1),pe={class:"grid grid-cols-12 divide-x-2 divide-gray-600 border-gray-500 rounded-lg border p-2 mr-3"},de=e("i",{class:"pi pi-folder px-2",style:{"font-size":"1rem"}},null,-1),me={class:"col-span-9 px-4"},ue=e("div",{class:"col-span-7"},[e("div",{class:"col-form-label"},[e("div",{class:"py-2 font-semibold bg-red-100 rounded-lg f-12 alert-warning fs-6"},[e("i",{class:"mx-2 fa fa-warning text-danger"}),d(" Read these instructions before uploading the file. ")]),e("div",null,[e("ul",{class:"m-4 font-semibold list-disc",style:{}},[e("li",{class:"font-semibold fs-6"}," The fields Employee Number, Employee Name, Email, Date of Joining, and Location must be filled in before adding workers."),e("li",{class:"font-semibold fs-6"}," When adding an employee, you must enter your mobile phone number."),e("li",{class:"font-semibold fs-6"}," To receive all messages, including those about timesheet reminders, leave requests, and attendance requests, your email address must be current. "),e("li",{class:"font-semibold fs-6"}," Each employee's email is different. Therefore, an employee cannot be added to two organisations using the same email."),e("li",{class:"font-semibold fs-6"}," Designation is required because, in cases when two or more workers share the same Name, it will aid in locating them in People Picker search results. ")])])])],-1),fe=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),ge={__name:"BulkOnboarding",setup(he){const s=Z(),g=te(),m=x(null),b=()=>{m.value.click()};w(()=>{s.getExistingOnboardingDocuments(),g.getBasicDeps()}),k(()=>{s.initialUpdate&&(s.currentlyImportedTableEmployeeCodeValues.splice(0,s.currentlyImportedTableEmployeeCodeValues.length),s.currentlyImportedTableAadharValues.splice(0,s.currentlyImportedTableAadharValues.length),s.currentlyImportedTableMobileNumberValues.splice(0,s.currentlyImportedTableMobileNumberValues.length),s.currentlyImportedTableAccNoValues.splice(0,s.currentlyImportedTableAccNoValues.length),s.currentlyImportedTablePanValues.splice(0,s.currentlyImportedTablePanValues.length),s.currentlyImportedTableEmailValues.splice(0,s.currentlyImportedTableEmailValues.length))});const h=se();return(ye,r)=>{const y=l("Toast"),n=l("Column"),_=l("DataTable"),v=l("ProgressSpinner"),T=l("Dialog");return p(),u(D,null,[t(y),a(h).params.module=="bulkOnboarding"?(p(),u("div",ae,[t(ee)])):(p(),P(f,{key:1,name:"fade"},{default:i(()=>[e("div",re,[e("div",ne,[e("div",ie,[le,ce,e("div",pe,[e("div",{onClick:b,class:"col-span-3 font-semibold fs-6 cursor-pointer w-full",for:"file"},[de,d("Browse ")]),e("span",me,E(a(s).selectedFile?a(s).selectedFile.name:""),1)]),e("input",{ref_key:"fileInput",ref:m,type:"file",name:"",id:"file",hidden:"",onChange:r[0]||(r[0]=c=>a(s).getExcelForUpload(c)),accept:".xls, .xlsx"},null,544),e("button",{class:"float-right mx-5 mt-6 btn btn-orange",onClick:r[1]||(r[1]=c=>a(s).convertExcelIntoArray("bulk"))},"Upload")]),ue]),t(_,{ref:"dt",dataKey:"id",paginator:!0,class:"mt-3",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:i(()=>[t(n,{field:"Employee",header:"Employee's"}),t(n,{field:"Employee code",header:"Month"}),t(n,{field:"Employee code",header:"Date Time"}),t(n,{field:"Employee code",header:"Total Employees Onboarded"}),t(n,{field:"Employee code",header:"Action"})]),_:1},512)])]),_:1})),t(f,{name:"fade"},{default:i(()=>[t(T,{header:"Header",visible:a(s).canShowloading,"onUpdate:visible":r[2]||(r[2]=c=>a(s).canShowloading=c),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:i(()=>[t(v,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:i(()=>[fe]),_:1},8,["visible"])]),_:1})],64)}}},o=I(ge),be=J();o.use(S,{ripple:!0});o.use(G);o.use(C);o.use(j);o.use(be);o.use(oe);o.directive("tooltip",V);o.directive("badge",N);o.directive("ripple",$);o.directive("styleclass",B);o.directive("focustrap",O);o.component("Button",R);o.component("DataTable",K);o.component("Column",F);o.component("ColumnGroup",z);o.component("Row",Q);o.component("Toast",L);o.component("ConfirmDialog",A);o.component("Dropdown",M);o.component("InputText",U);o.component("Dialog",q);o.component("ProgressSpinner",H);o.component("Textarea",X);o.component("InputNumber",W);o.component("InputMask",Y);o.mount("#BulkOnboarding");
