import{_ as w,r as T,o as E,b as I,a as P,c as n,e as p,f,n as s,h as a,k as S,l as i,T as g,F as V,g as e,i as m,t as D,y as N,z as O}from"./app-97e3c529.js";import{u as C,_ as F}from"./ImportQuickOnboarding-12d1107d.js";import{u as L}from"./NormalOnboardingMainStore-15f8c7b1.js";import"./index-0d903406.js";import"./Service-a263ad12.js";import"./xlsx-04f2268f.js";import"./dayjs.min-25482546.js";import"./index-505ca909.js";const r=d=>(N("data-v-81fa2dac"),d=d(),O(),d),A={class:"h-screen w-full"},B={class:"grid grid-cols-12"},R={class:"px-2 col-span-5"},M=r(()=>e("p",{class:"font-bold text-2xl"},"Employee Quick Onboarding",-1)),Q=r(()=>e("ul",{class:"list-disc p-2 my-3"},[e("li",{class:"font-semibold fs-6"},[m("Download the "),e("a",{href:"/assets//ABSQuickOnboarding.xlsx",class:"font-semibold text-blue-300 cursor-pointer fs-6"},"Sample")]),e("li",{class:"font-semibold fs-6"},"Fill the information in excel template")],-1)),U={class:"grid grid-cols-12 divide-x-2 divide-gray-600 border-gray-500 rounded-lg border p-2 mr-3"},q=r(()=>e("i",{class:"pi pi-folder px-2",style:{"font-size":"1rem"}},null,-1)),z={class:"col-span-9 px-4"},W=r(()=>e("div",{class:"col-span-7"},[e("div",{class:"col-form-label"},[e("div",{class:"py-2 font-semibold bg-red-100 rounded-lg f-12 alert-warning fs-6"},[e("i",{class:"mx-2 fa fa-warning text-danger"}),m(" Read these instructions before uploading the file. ")]),e("div",null,[e("ul",{class:"m-4 font-semibold list-disc",style:{}},[e("li",{class:"font-semibold fs-6"}," The fields Employee Number, Employee Name, Email, Date of Joining, and Location must be filled in before adding workers."),e("li",{class:"font-semibold fs-6"}," When adding an employee, you must enter your mobile phone number."),e("li",{class:"font-semibold fs-6"}," To receive all messages, including those about timesheet reminders, leave requests, and attendance requests, your email address must be current. "),e("li",{class:"font-semibold fs-6"}," Each employee's email is different. Therefore, an employee cannot be added to two organisations using the same email."),e("li",{class:"font-semibold fs-6"}," Designation is required because, in cases when two or more workers share the same Name, it will aid in locating them in People Picker search results. ")])])])],-1)),$={key:1,class:""},H=r(()=>e("h5",{style:{"text-align":"center"}},"Please wait...",-1)),J={__name:"QuickOnboarding",setup(d){const o=C(),b=L(),u=T(null),_=()=>{u.value.click()};E(()=>{o.getExistingOnboardingDocuments(),b.getBasicDeps()}),I(()=>{o.initialUpdate&&(o.currentlyImportedTableEmployeeCodeValues.splice(0,o.currentlyImportedTableEmployeeCodeValues.length),o.currentlyImportedTableAadharValues.splice(0,o.currentlyImportedTableAadharValues.length),o.currentlyImportedTableMobileNumberValues.splice(0,o.currentlyImportedTableMobileNumberValues.length),o.currentlyImportedTableAccNoValues.splice(0,o.currentlyImportedTableAccNoValues.length),o.currentlyImportedTablePanValues.splice(0,o.currentlyImportedTablePanValues.length),o.currentlyImportedTableEmailValues.splice(0,o.currentlyImportedTableEmailValues.length))});const h=P();return(K,t)=>{const y=n("Toast"),l=n("Column"),v=n("DataTable"),x=n("ProgressSpinner"),k=n("Dialog");return p(),f(V,null,[s(y),a(h).params.module==null?(p(),S(g,{key:0,name:"fade"},{default:i(()=>[e("div",A,[e("div",B,[e("div",R,[M,Q,e("div",U,[e("div",{onClick:_,class:"col-span-3 font-semibold fs-6 cursor-pointer w-full",for:"file"},[q,m("Browse ")]),e("span",z,D(a(o).selectedFile?a(o).selectedFile.name:""),1)]),e("input",{ref_key:"fileInput",ref:u,type:"file",name:"",id:"file",hidden:"",onChange:t[0]||(t[0]=c=>a(o).getExcelForUpload(c)),accept:".xls, .xlsx"},null,544),e("button",{class:"float-right mx-5 mt-4 btn btn-orange",onClick:t[1]||(t[1]=c=>a(o).convertExcelIntoArray("quick"))},"Upload")]),W]),s(v,{ref:"dt",dataKey:"id",paginator:!0,class:"mt-3",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:i(()=>[s(l,{field:"Employee",header:"Employee's"}),s(l,{field:"Employee code",header:"Month"}),s(l,{field:"Employee code",header:"Date Time"}),s(l,{field:"Employee code",header:"Total Employees Onboarded"}),s(l,{field:"Employee code",header:"Action"})]),_:1},512)])]),_:1})):(p(),f("div",$,[s(F)])),s(g,{name:"fade",mode:"out-in"},{default:i(()=>[s(k,{header:"Header",visible:a(o).canShowloading,"onUpdate:visible":t[2]||(t[2]=c=>a(o).canShowloading=c),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:i(()=>[s(x,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:i(()=>[H]),_:1},8,["visible"])]),_:1})],64)}}},ae=w(J,[["__scopeId","data-v-81fa2dac"]]);export{ae as default};
