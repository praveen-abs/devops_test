import{r as x,o as k,b as T,a as w,c as n,e as d,f as p,n as s,h as l,k as E,l as i,T as u,F as P,g as e,i as c,t as I}from"./app-052ddeba.js";import{u as V,_ as D}from"./ImportQuickOnboarding-928aa158.js";import{u as N}from"./NormalOnboardingMainStore-fbecff49.js";import"./index-362795f3.js";import"./Service-d72aa37a.js";import"./xlsx-4ad528ac.js";import"./dayjs.min-2f06af28.js";import"./index.esm-76e75368.js";const S={key:0,class:""},O={class:"h-screen w-full"},B={class:"grid grid-cols-12"},C={class:"col-span-5 px-2"},F=e("p",{class:"font-bold text-2xl"},"Employee Bulk Onboarding",-1),L=e("ul",{class:"list-disc p-2 my-3"},[e("li",{class:"font-semibold fs-6"},[c("Download the "),e("a",{href:"/assets/ABSBulkOnboarding.xls",class:"font-semibold text-blue-300 cursor-pointer fs-6"},"Sample")]),e("li",{class:"font-semibold fs-6"},"Fill the information in excel template")],-1),A={class:"grid grid-cols-12 divide-x-2 divide-gray-600 border-gray-500 rounded-lg border p-2 mr-3"},R=e("i",{class:"pi pi-folder px-2",style:{"font-size":"1rem"}},null,-1),M={class:"col-span-9 px-4"},U=e("div",{class:"col-span-7"},[e("div",{class:"col-form-label"},[e("div",{class:"py-2 font-semibold bg-red-100 rounded-lg f-12 alert-warning fs-6"},[e("i",{class:"mx-2 fa fa-warning text-danger"}),c(" Read these instructions before uploading the file. ")]),e("div",null,[e("ul",{class:"m-4 font-semibold list-disc",style:{}},[e("li",{class:"font-semibold fs-6"}," The fields Employee Number, Employee Name, Email, Date of Joining, and Location must be filled in before adding workers."),e("li",{class:"font-semibold fs-6"}," When adding an employee, you must enter your mobile phone number."),e("li",{class:"font-semibold fs-6"}," To receive all messages, including those about timesheet reminders, leave requests, and attendance requests, your email address must be current. "),e("li",{class:"font-semibold fs-6"}," Each employee's email is different. Therefore, an employee cannot be added to two organisations using the same email."),e("li",{class:"font-semibold fs-6"}," Designation is required because, in cases when two or more workers share the same Name, it will aid in locating them in People Picker search results. ")])])])],-1),q=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),Y={__name:"BulkOnboarding",setup(W){const o=V(),f=N(),m=x(null),g=()=>{m.value.click()};k(()=>{o.getExistingOnboardingDocuments(),f.getBasicDeps()}),T(()=>{o.initialUpdate&&(o.currentlyImportedTableEmployeeCodeValues.splice(0,o.currentlyImportedTableEmployeeCodeValues.length),o.currentlyImportedTableAadharValues.splice(0,o.currentlyImportedTableAadharValues.length),o.currentlyImportedTableMobileNumberValues.splice(0,o.currentlyImportedTableMobileNumberValues.length),o.currentlyImportedTableAccNoValues.splice(0,o.currentlyImportedTableAccNoValues.length),o.currentlyImportedTablePanValues.splice(0,o.currentlyImportedTablePanValues.length),o.currentlyImportedTableEmailValues.splice(0,o.currentlyImportedTableEmailValues.length))});const b=w();return($,t)=>{const h=n("Toast"),a=n("Column"),y=n("DataTable"),_=n("ProgressSpinner"),v=n("Dialog");return d(),p(P,null,[s(h),l(b).params.module=="bulkOnboarding"?(d(),p("div",S,[s(D)])):(d(),E(u,{key:1,name:"fade"},{default:i(()=>[e("div",O,[e("div",B,[e("div",C,[F,L,e("div",A,[e("div",{onClick:g,class:"col-span-3 font-semibold fs-6 cursor-pointer w-full",for:"file"},[R,c("Browse ")]),e("span",M,I(l(o).selectedFile?l(o).selectedFile.name:""),1)]),e("input",{ref_key:"fileInput",ref:m,type:"file",name:"",id:"file",hidden:"",onChange:t[0]||(t[0]=r=>l(o).getExcelForUpload(r)),accept:".xls, .xlsx"},null,544),e("button",{class:"float-right mx-5 mt-6 btn btn-orange",onClick:t[1]||(t[1]=r=>l(o).convertExcelIntoArray("bulk"))},"Upload")]),U]),s(y,{ref:"dt",dataKey:"id",paginator:!0,class:"mt-3",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:i(()=>[s(a,{field:"Employee",header:"Employee's"}),s(a,{field:"Employee code",header:"Month"}),s(a,{field:"Employee code",header:"Date Time"}),s(a,{field:"Employee code",header:"Total Employees Onboarded"}),s(a,{field:"Employee code",header:"Action"})]),_:1},512)])]),_:1})),s(u,{name:"fade"},{default:i(()=>[s(v,{header:"Header",visible:l(o).canShowloading,"onUpdate:visible":t[2]||(t[2]=r=>l(o).canShowloading=r),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:i(()=>[s(_,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:i(()=>[q]),_:1},8,["visible"])]),_:1})],64)}}};export{Y as default};
