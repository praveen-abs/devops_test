/* empty css          *//* empty css                 *//* empty css               *//* empty css             */import{a0 as x,ak as w,aj as k,o as p,c as u,h as t,I as a,b as P,w as l,d as e,l as d,t as E,T as f,F as D,g as i,K as I,P as S,L as C,u as V,M as N,R as $,S as B,x as O,y as R,N as F,_ as L,Q as A,W as M,Y as U,V as q,X as W}from"./toastservice.esm78544.js";import{c as K}from"./pinia78544.js";import{a as j}from"./datatable.esm78544.js";import{D as z,s as G}from"./dialogservice.esm78544.js";import{C as H}from"./confirmationservice.esm78544.js";import{s as J}from"./progressspinner.esm78544.js";import{s as Q}from"./row.esm78544.js";import{s as X}from"./textarea.esm78544.js";import{s as Y}from"./inputmask.esm78544.js";import{u as Z,_ as ee,r as oe}from"./router78544.js";import{a as se}from"./vue-router78544.js";import{u as te}from"./NormalOnboardingMainStore78544.js";import"./index78544.js";import"./Service78544.js";import"./dayjs.min78544.js";import"./_plugin-vue_export-helper78544.js";import"./index.esm78544.js";const ae={key:0,class:""},re={class:"h-screen w-full"},ne={class:"grid grid-cols-12"},le={class:"col-span-5 px-2"},ie=e("p",{class:"font-bold text-2xl"},"Employee Bulk Onboarding",-1),ce=e("ul",{class:"list-disc p-2 my-3"},[e("li",{class:"font-semibold fs-6"},[d("Download the "),e("a",{href:"/assets/ABSBulkOnboarding.xls",class:"font-semibold text-blue-300 cursor-pointer fs-6"},"Sample")]),e("li",{class:"font-semibold fs-6"},"Fill the information in excel template")],-1),pe={class:"grid grid-cols-12 divide-x-2 divide-gray-600 border-gray-500 rounded-lg border p-2 mr-3"},de=e("i",{class:"pi pi-folder px-2",style:{"font-size":"1rem"}},null,-1),me={class:"col-span-9 px-4"},ue=e("div",{class:"col-span-7"},[e("div",{class:"col-form-label"},[e("div",{class:"py-2 font-semibold bg-red-100 rounded-lg f-12 alert-warning fs-6"},[e("i",{class:"mx-2 fa fa-warning text-danger"}),d(" Read these instructions before uploading the file. ")]),e("div",null,[e("ul",{class:"m-4 font-semibold list-disc",style:{}},[e("li",{class:"font-semibold fs-6"}," The fields Employee Number, Employee Name, Email, Date of Joining, and Location must be filled in before adding workers."),e("li",{class:"font-semibold fs-6"}," When adding an employee, you must enter your mobile phone number."),e("li",{class:"font-semibold fs-6"}," To receive all messages, including those about timesheet reminders, leave requests, and attendance requests, your email address must be current. "),e("li",{class:"font-semibold fs-6"}," Each employee's email is different. Therefore, an employee cannot be added to two organisations using the same email."),e("li",{class:"font-semibold fs-6"}," Designation is required because, in cases when two or more workers share the same Name, it will aid in locating them in People Picker search results. ")])])])],-1),fe=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),ge={__name:"BulkOnboarding",setup(he){const s=Z(),g=te(),m=x(null),b=()=>{m.value.click()};w(()=>{s.getExistingOnboardingDocuments(),g.getBasicDeps()}),k(()=>{s.initialUpdate&&(s.currentlyImportedTableEmployeeCodeValues.splice(0,s.currentlyImportedTableEmployeeCodeValues.length),s.currentlyImportedTableAadharValues.splice(0,s.currentlyImportedTableAadharValues.length),s.currentlyImportedTableMobileNumberValues.splice(0,s.currentlyImportedTableMobileNumberValues.length),s.currentlyImportedTableAccNoValues.splice(0,s.currentlyImportedTableAccNoValues.length),s.currentlyImportedTablePanValues.splice(0,s.currentlyImportedTablePanValues.length),s.currentlyImportedTableEmailValues.splice(0,s.currentlyImportedTableEmailValues.length))});const h=se();return(ye,r)=>{const y=i("Toast"),n=i("Column"),_=i("DataTable"),v=i("ProgressSpinner"),T=i("Dialog");return p(),u(D,null,[t(y),a(h).params.module=="bulkOnboarding"?(p(),u("div",ae,[t(ee)])):(p(),P(f,{key:1,name:"fade"},{default:l(()=>[e("div",re,[e("div",ne,[e("div",le,[ie,ce,e("div",pe,[e("div",{onClick:b,class:"col-span-3 font-semibold fs-6 cursor-pointer w-full",for:"file"},[de,d("Browse ")]),e("span",me,E(a(s).selectedFile?a(s).selectedFile.name:""),1)]),e("input",{ref_key:"fileInput",ref:m,type:"file",name:"",id:"file",hidden:"",onChange:r[0]||(r[0]=c=>a(s).getExcelForUpload(c)),accept:".xls, .xlsx"},null,544),e("button",{class:"float-right mx-5 mt-6 btn btn-orange",onClick:r[1]||(r[1]=c=>a(s).convertExcelIntoArray("bulk"))},"Upload")]),ue]),t(_,{ref:"dt",dataKey:"id",paginator:!0,class:"mt-3",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:l(()=>[t(n,{field:"Employee",header:"Employee's"}),t(n,{field:"Employee code",header:"Month"}),t(n,{field:"Employee code",header:"Date Time"}),t(n,{field:"Employee code",header:"Total Employees Onboarded"}),t(n,{field:"Employee code",header:"Action"})]),_:1},512)])]),_:1})),t(f,{name:"fade"},{default:l(()=>[t(T,{header:"Header",visible:a(s).canShowloading,"onUpdate:visible":r[2]||(r[2]=c=>a(s).canShowloading=c),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:l(()=>[t(v,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:l(()=>[fe]),_:1},8,["visible"])]),_:1})],64)}}},o=I(ge),be=K();o.use(S,{ripple:!0});o.use(H);o.use(C);o.use(z);o.use(be);o.use(oe);o.directive("tooltip",V);o.directive("badge",N);o.directive("ripple",$);o.directive("styleclass",B);o.directive("focustrap",O);o.component("Button",R);o.component("DataTable",j);o.component("Column",F);o.component("ColumnGroup",G);o.component("Row",Q);o.component("Toast",L);o.component("ConfirmDialog",A);o.component("Dropdown",M);o.component("InputText",U);o.component("Dialog",q);o.component("ProgressSpinner",J);o.component("Textarea",X);o.component("InputNumber",W);o.component("InputMask",Y);o.mount("#BulkOnboarding");
