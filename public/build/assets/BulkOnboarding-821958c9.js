/* empty css              *//* empty css                     */import{ai as U,I as S,g as h,j as Q,o as t,c as a,d as n,l as y,t as c,aj as s,h as p,w as f,F as w,f as O,b as m,n as u,k as T,a as x,ak as H,T as A,K as J,P as K,L as W,u as j,M as q,R as z,S as X,x as Y,y as Z,N as ee,_ as oe,Q as le,W as se,Y as te,V as ne,X as ae}from"./toastservice.esm-3d6796bd.js";/* empty css                 */import{c as re}from"./pinia-5332ebd8.js";import{a as ie}from"./datatable.esm-30f5a7e6.js";import{D as ce,s as ue}from"./dialogservice.esm-0be88020.js";import{C as de}from"./confirmationservice.esm-5ceb5613.js";import{s as me}from"./progressspinner.esm-2bee3521.js";import{s as pe}from"./row.esm-6ebc942e.js";import{s as be}from"./textarea.esm-bd97b02a.js";import{s as ge}from"./inputmask.esm-0365dec7.js";import"./index-362795f3.js";import{u as ye,a as $}from"./vue-router-214c8417.js";import{u as L,r as he}from"./router-40e79afc.js";import{u as R}from"./NormalOnboardingMainStore-0ce2a4c4.js";import"./Service-bda4280b.js";import"./dayjs.min-2f06af28.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./index.esm-a629d5bb.js";const fe={class:"grid grid-cols-3 w-10/12 place-content-center mx-auto my-2"},_e={class:"bg-white text-black p-2 font-semibold fs-6 mx-6 rounded-lg"},ke={class:"font-bold"},Ve={class:"bg-green-100 text-black p-2 font-semibold fs-6 mx-6 rounded-lg"},xe={class:"font-bold"},Ee={class:"bg-red-100 text-black p-2 font-semibold fs-6 mx-6 rounded-lg"},ve={class:"font-bold"},Ne={class:"py-5"},Te=n("p",{class:"font-semibold fs-6"},"Sample format:",-1),De={class:"table-responsive"},Ce={class:"table-responsive"},Se=n("p",{class:"font-semibold fs-6"},"Original data:",-1),we={class:"font-semibold fs-6"},Pe={key:0,class:"fa fa-exclamation-circle text-warning mx-2 cursor-pointer","aria-hidden":"true"},Ie={key:0,class:"fa fa-exclamation-circle text-warning mx-2 cursor-pointer","aria-hidden":"true"},Me={key:0,class:"fa fa-exclamation-circle text-warning cursor-pointer","aria-hidden":"true"},Be={class:"font-semibold fs-6 px-2 py-auto"},Oe={key:0,class:"fa fa-exclamation-circle text-warning cursor-pointer","aria-hidden":"true"},Ae={key:0,class:"fa fa-exclamation-circle text-warning cursor-pointer","aria-hidden":"true"},Ue={key:0,class:"fa fa-exclamation-circle text-warning cursor-pointer","aria-hidden":"true"},$e={key:8,class:"font-semibold fs-6"},Le={key:9,class:"font-semibold fs-6"},Re={key:10,class:"font-semibold fs-6"},Fe={key:18,class:"font-semibold fs-6"},Ge={__name:"ImportQuickOnboarding",setup(F){ye(),$();const e=L(),E=R(),C=b=>!!["Basic","HRA","Statutory Bonus","Child Education Allowance","Food Coupon","LTA"].includes(b);U(()=>{e.isValueUpdated&&(e.currentlyImportedTableEmployeeCodeValues.splice(0,e.currentlyImportedTableEmployeeCodeValues.length),e.currentlyImportedTableAadharValues.splice(0,e.currentlyImportedTableAadharValues.length),e.currentlyImportedTableAccNoValues.splice(0,e.currentlyImportedTableAccNoValues.length),e.currentlyImportedTablePanValues.splice(0,e.currentlyImportedTablePanValues.length),e.currentlyImportedTableEmailValues.splice(0,e.currentlyImportedTableEmailValues.length),e.currentlyImportedTableMobileNumberValues.splice(0,e.currentlyImportedTableMobileNumberValues.length),setTimeout(()=>{e.getCurrentlyImportedTableDuplicateEntries(e.EmployeeQuickOnboardingSource)},100))});const P=S(!0),I=b=>{e.initialUpdate=!0,setTimeout(()=>{P.value=!1,console.log("functionkilled")},30),e.errorRecordsCount.splice(0,e.errorRecordsCount.length);let{data:g,newValue:k,field:v}=b;k?e.isValueUpdated=!0:isValueUpdated=!1,k.trim().length>0?g[v]=k:b.preventDefault();for(let d=0;d<e.EmployeeQuickOnboardingSource.length;d++)e.getValidationMessages(e.EmployeeQuickOnboardingSource[d])},B=S([{"Employee Code":"ABS01","Employee Name":"Vishu","Date Of Birth (dd-mm-yyyy)":"23-09-2001","Date of Joined (dd-mm-yyyy)":"23-09-2023","Mobile Number":"9898989898","Aadhaar Number":"2222 3333 4444","Personal Email":"abs@gmail.com","Pan Number":"AJUPA0900H",Gender:"Male","Marital Status":"Married","Reporting Manager":"Pradessh",Designation:"Developer",Department:"IT",Location:"Chennai","Father Name":"Simma","Physically Handicapped":"No"}]),_=[{title:"Employee Code"},{title:"Employee Name"},{title:"Date Of Birth (dd-mm-yyyy)"},{title:"Date of Joined (dd-mm-yyyy)"},{title:"Mobile Number"},{title:"Aadhaar Number"},{title:"Personal Email"},{title:"Pan Number"},{title:"Gender"},{title:"Marital Status"},{title:"Reporting Manager"},{title:"Designation"},{title:"Department"},{title:"Location"},{title:"Father Name"},{title:"Physically Handicapped"}],M=S([{name:"Male",value:"Male"},{name:"Female",value:"Female"},{name:"Others",value:"Others"}]);return(b,g)=>{const k=h("Column"),v=h("DataTable"),d=h("InputText"),D=h("Dropdown"),G=h("InputMask"),N=Q("tooltip");return t(),a(w,null,[n("div",fe,[n("div",_e,[y("Total Records : "),n("span",ke,c(s(e).totalRecordsCount.length?s(e).totalRecordsCount[0].length:0),1)]),n("div",Ve,[y("Processed Records : "),n("span",xe,c(s(e).totalRecordsCount.length?s(e).totalRecordsCount[0].length-s(e).errorRecordsCount.length:0),1)]),n("div",Ee,[y("Error Records : "),n("span",ve,c(s(e).errorRecordsCount.length),1)])]),n("div",Ne,[Te,n("div",De,[p(v,{class:"my-4",value:B.value,tableStyle:"min-width: 50rem",responsiveLayout:"scroll"},{default:f(()=>[(t(),a(w,null,O(_,V=>p(k,{key:V.title,field:V.title,style:{"min-width":"12rem"},header:V.title},null,8,["field","header"])),64))]),_:1},8,["value"])])]),n("div",Ce,[Se,s(e).EmployeeQuickOnboardingSource?(t(),m(v,{key:0,class:"py-4",value:s(e).EmployeeQuickOnboardingSource,tableStyle:"min-width: 50rem",responsiveLayout:"scroll",editMode:"cell",onCellEditComplete:I,stateStorage:"session",stateKey:"dt-state-demo-session",rows:s(e).EmployeeQuickOnboardingSource.length},{footer:f(()=>[n("button",{class:"btn btn-orange mx-auto flex justify-center",onClick:g[2]||(g[2]=V=>s(e).uploadOnboardingFile(s(e).EmployeeQuickOnboardingSource))},"Upload")]),default:f(()=>[(t(!0),a(w,null,O(s(e).EmployeeQuickOnboardingDynamicHeader,V=>(t(),m(k,{key:V.title,field:V.title,style:{"min-width":"12rem"},header:V.title},{body:f(({data:o,field:l})=>[l.includes("Employee Code")?(t(),a("div",{key:0,class:u([s(e).findCurrentTableDups(s(e).currentlyImportedTableEmployeeCodeValues,o["Employee Code"])||!s(e).isUserExists(o["Employee Code"])?"bg-red-100 p-2 rounded-lg":""])},[n("p",we,[s(e).isUserExists(o["Employee Code"])?x("",!0):T((t(),a("i",Pe,null,512)),[[N,"User code is already exists",void 0,{right:!0}]]),y(" "+c(o["Employee Code"]?o["Employee Code"]:"-"),1)])],2)):l.includes("Aadhar")?(t(),a("p",{key:1,class:u([[s(e).findCurrentTableDups(s(e).currentlyImportedTableAadharValues,o.Aadhar)||s(e).isValidAadhar(o.Aadhar)?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},[s(e).isAadharExists(o.Aadhar)?T((t(),a("i",Ie,null,512)),[[N,"Aadhar number is already exists",void 0,{right:!0}]]):x("",!0),y(" "+c(s(e).splitNumberWithSpaces(o.Aadhar)),1)],2)):l.includes("Employee Name")?(t(),a("p",{key:2,class:u([[s(e).isLetter(o["Employee Name"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},c(o["Employee Name"]?o["Employee Name"]:"-"),3)):l.includes("Email")?(t(),a("p",{key:3,class:u([[s(e).findCurrentTableDups(s(e).currentlyImportedTableEmailValues,o.Email)||s(e).isEmail(o.Email)?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6 flex items-center"])},[s(e).existingEmails.includes(o.Email)?T((t(),a("i",Me,null,512)),[[N,"Email is already exists",void 0,{right:!0}]]):x("",!0),n("p",Be,c(o.Email?o.Email:"-"),1)],2)):l.includes("Mobile Number")?(t(),a("p",{key:4,class:u([[s(e).findCurrentTableDups(s(e).currentlyImportedTableMobileNumberValues,o[l])||s(e).existingMobileNumbers.includes(o[l])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},[s(e).existingMobileNumbers.includes(o[l])?T((t(),a("i",Oe,null,512)),[[N,"Mobile number is already exists",void 0,{right:!0}]]):x("",!0),y(" "+c(o["Mobile Number"]?o["Mobile Number"]:"-"),1)],2)):l.includes("Account No")?(t(),a("p",{key:5,class:u([[s(e).findCurrentTableDups(s(e).currentlyImportedTableAccNoValues,o["Account No"])||s(e).isValidBankAccountNo(o["Account No"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},[s(e).existingMobileNumbers.includes(o[l])?T((t(),a("i",Ae,null,512)),[[N,"Account number is already exists",void 0,{right:!0}]]):x("",!0),y(" "+c(o["Account No"]?o["Account No"]:"-"),1)],2)):l.includes("Bank Name")?(t(),a("p",{key:6,class:u([[s(e).isBankExists(o["Bank Name"])?"":"bg-red-100 p-2 rounded-lg"],"font-semibold fs-6"])},c(o["Bank Name"]?o["Bank Name"]:"-"),3)):l.includes("Pan No")?(t(),a("p",{key:7,class:u([[s(e).findCurrentTableDups(s(e).currentlyImportedTablePanValues,o["Pan No"])||!s(e).isValidPancard(o["Pan No"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},[s(e).isValidPancard(o["Pan No"])?x("",!0):T((t(),a("i",Ue,null,512)),[[N,"Pan number is already exists",void 0,{right:!0}]]),y(" "+c(o["Pan No"]?o["Pan No"].toUpperCase():"-"),1)],2)):l.includes("Father DOB")?(t(),a("p",$e,c(o[l]?o[l]:"-"),1)):l.includes("Mother DOB")?(t(),a("p",Le,c(o[l]?o[l]:"-"),1)):l.includes("Spouse DOB")?(t(),a("p",Re,c(o[l]?o[l]:"-"),1)):l.includes("DOB")?(t(),a("p",{key:11,class:u([[s(e).isValidDate(o.DOB)?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},c(o.DOB?o[l]:"-"),3)):l.includes("DOJ")?(t(),a("p",{key:12,class:u([[s(e).isValidDate(o.DOJ)?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},c(o.DOJ?o[l]:"-"),3)):l.includes("Bank ifsc")?(t(),a("p",{key:13,class:u([[s(e).isValidBankIfsc(o["Bank ifsc"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},c(o["Bank ifsc"]?o["Bank ifsc"].toUpperCase():"-"),3)):l.includes("Official Mail")?(t(),a("p",{key:14,class:u([[s(e).isOfficialMailExists(o["Official Mail"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},c(o["Official Mail"]?o["Official Mail"]:"-"),3)):l.includes("Marital Status")?(t(),a("p",{key:15,class:u([[s(e).isExistsOrNot(s(e).existingMartialStatus,o["Marital Status"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},c(o["Marital Status"]?o["Marital Status"]:"-"),3)):l.includes("Blood Group")?(t(),a("p",{key:16,class:u([[s(e).isExistsOrNot(s(e).existingBloodgroups,o["Blood Group"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},c(o["Blood Group"]?o["Blood Group"]:"-"),3)):l.includes("Department")?(t(),a("p",{key:17,class:u([[s(e).isDepartmentExists(o.Department)?"":"bg-red-100 p-2 rounded-lg"],"font-semibold fs-6"])},c(o.Department?o.Department:"-"),3)):(t(),a("p",Fe,c(o[l]?o[l]:"-"),1))]),editor:f(({data:o,field:l})=>[l=="Aadhar"?(t(),m(d,{key:0,modelValue:o[l],"onUpdate:modelValue":i=>o[l]=i,minLength:"12",maxLength:"12",onKeypress:g[0]||(g[0]=i=>s(e).isEnteredNos(i))},null,8,["modelValue","onUpdate:modelValue"])):l=="Gender"?(t(),m(D,{key:1,modelValue:o[l],"onUpdate:modelValue":i=>o[l]=i,options:M.value,optionLabel:"name",optionValue:"name",placeholder:"Select Gender",class:"w-full"},null,8,["modelValue","onUpdate:modelValue","options"])):l=="Pan No"?(t(),m(G,{key:2,id:"serial",mask:"aaaPa9999a",modelValue:o[l],"onUpdate:modelValue":i=>o[l]=i,class:"uppercase"},null,8,["modelValue","onUpdate:modelValue"])):l=="Email"?(t(),m(d,{key:3,modelValue:o[l],"onUpdate:modelValue":i=>o[l]=i},null,8,["modelValue","onUpdate:modelValue"])):l=="Mobile Number"?(t(),m(d,{key:4,modelValue:o[l],"onUpdate:modelValue":i=>o[l]=i,minLength:"10",maxLength:"10",onKeypress:g[1]||(g[1]=i=>s(e).isEnteredNos(i))},null,8,["modelValue","onUpdate:modelValue"])):l=="Bank Name"?(t(),m(D,{key:5,modelValue:o[l],"onUpdate:modelValue":i=>o[l]=i,options:s(E).bankList,optionLabel:"bank_name",optionValue:"bank_name",placeholder:"Select Bank Name"},null,8,["modelValue","onUpdate:modelValue","options"])):l=="Marital Status"?(t(),m(D,{key:6,modelValue:o[l],"onUpdate:modelValue":i=>o[l]=i,options:s(E).maritalDetails,optionLabel:"name",optionValue:"name",placeholder:"Select Martial Status"},null,8,["modelValue","onUpdate:modelValue","options"])):l=="Blood Group"?(t(),m(D,{key:7,modelValue:o[l],"onUpdate:modelValue":i=>o[l]=i,options:s(E).bloodGroups,optionLabel:"name",optionValue:"name",placeholder:"Select Bloodgroup",class:"p-error"},null,8,["modelValue","onUpdate:modelValue","options"])):l=="Department"?(t(),m(D,{key:8,modelValue:o[l],"onUpdate:modelValue":i=>o[l]=i,options:s(E).departmentDetails,optionLabel:"name",optionValue:"name",placeholder:"Select Department",class:"p-error"},null,8,["modelValue","onUpdate:modelValue","options"])):(t(),m(d,{key:9,modelValue:o[l],"onUpdate:modelValue":i=>o[l]=i,readonly:C(l)},null,8,["modelValue","onUpdate:modelValue","readonly"]))]),_:2},1032,["field","header"]))),128))]),_:1},8,["value","rows"])):x("",!0)])],64)}}},Qe={key:0,class:""},He={class:"h-screen w-full"},Je={class:"grid grid-cols-12"},Ke={class:"col-span-5 px-2"},We=n("p",{class:"font-bold text-2xl"},"Employee Bulk Onboarding",-1),je=n("ul",{class:"list-disc p-2 my-3"},[n("li",{class:"font-semibold fs-6"},[y("Download the "),n("a",{href:"/assets/ABSBulkOnboarding.xls",class:"text-blue-300 font-semibold fs-6 cursor-pointer"},"Sample")]),n("li",{class:"font-semibold fs-6"},"Fill the information in excel template")],-1),qe={class:"grid grid-cols-12 divide-x-2 divide-gray-600 border-gray-500 rounded-lg border p-2 mr-3"},ze=n("i",{class:"pi pi-folder px-2",style:{"font-size":"1rem"}},null,-1),Xe={class:"col-span-9 px-4"},Ye=n("div",{class:"col-span-7"},[n("div",{class:"col-form-label"},[n("div",{class:"py-2 bg-red-100 rounded-lg f-12 alert-warning font-semibold fs-6"},[n("i",{class:"fa fa-warning text-danger mx-2"}),y(" Read these instructions before uploading the file. ")]),n("div",null,[n("ul",{class:"list-disc font-semibold m-4",style:{}},[n("li",{class:"font-semibold fs-6"}," The fields Employee Number, Employee Name, Email, Date of Joining, and Location must be filled in before adding workers."),n("li",{class:"font-semibold fs-6"}," When adding an employee, you must enter your mobile phone number."),n("li",{class:"font-semibold fs-6"}," To receive all messages, including those about timesheet reminders, leave requests, and attendance requests, your email address must be current. "),n("li",{class:"font-semibold fs-6"}," Each employee's email is different. Therefore, an employee cannot be added to two organisations using the same email."),n("li",{class:"font-semibold fs-6"}," Designation is required because, in cases when two or more workers share the same Name, it will aid in locating them in People Picker search results. ")])])])],-1),Ze=n("h5",{style:{"text-align":"center"}},"Please wait...",-1),eo={__name:"BulkOnboarding",setup(F){const e=L(),E=R(),C=S(null),P=()=>{C.value.click()};H(()=>{e.getExistingOnboardingDocuments(),E.getBasicDeps()}),U(()=>{e.initialUpdate&&(e.currentlyImportedTableEmployeeCodeValues.splice(0,e.currentlyImportedTableEmployeeCodeValues.length),e.currentlyImportedTableAadharValues.splice(0,e.currentlyImportedTableAadharValues.length),e.currentlyImportedTableMobileNumberValues.splice(0,e.currentlyImportedTableMobileNumberValues.length),e.currentlyImportedTableAccNoValues.splice(0,e.currentlyImportedTableAccNoValues.length),e.currentlyImportedTablePanValues.splice(0,e.currentlyImportedTablePanValues.length),e.currentlyImportedTableEmailValues.splice(0,e.currentlyImportedTableEmailValues.length))});const I=$();return(B,_)=>{const M=h("Toast"),b=h("Column"),g=h("DataTable"),k=h("ProgressSpinner"),v=h("Dialog");return t(),a(w,null,[p(M),s(I).params.module=="bulkOnboarding"?(t(),a("div",Qe,[p(Ge)])):(t(),m(A,{key:1,name:"fade"},{default:f(()=>[n("div",He,[n("div",Je,[n("div",Ke,[We,je,n("div",qe,[n("div",{onClick:P,class:"col-span-3 font-semibold fs-6 cursor-pointer w-full",for:"file"},[ze,y("Browse ")]),n("span",Xe,c(s(e).selectedFile?s(e).selectedFile.name:""),1)]),n("input",{ref_key:"fileInput",ref:C,type:"file",name:"",id:"file",hidden:"",onChange:_[0]||(_[0]=d=>s(e).getExcelForUpload(d)),accept:".xls, .xlsx"},null,544),n("button",{class:"btn btn-orange mt-6 float-right mx-5",onClick:_[1]||(_[1]=d=>s(e).convertExcelIntoArray("bulk"))},"Upload")]),Ye]),p(g,{ref:"dt",dataKey:"id",paginator:!0,class:"mt-3",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:f(()=>[p(b,{field:"Employee",header:"Employee's"}),p(b,{field:"Employee code",header:"Month"}),p(b,{field:"Employee code",header:"Date Time"}),p(b,{field:"Employee code",header:"Total Employees Onboarded"}),p(b,{field:"Employee code",header:"Action"})]),_:1},512)])]),_:1})),p(A,{name:"fade"},{default:f(()=>[p(v,{header:"Header",visible:s(e).canShowloading,"onUpdate:visible":_[2]||(_[2]=d=>s(e).canShowloading=d),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:f(()=>[p(k,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:f(()=>[Ze]),_:1},8,["visible"])]),_:1})],64)}}},r=J(eo),oo=re();r.use(K,{ripple:!0});r.use(de);r.use(W);r.use(ce);r.use(oo);r.use(he);r.directive("tooltip",j);r.directive("badge",q);r.directive("ripple",z);r.directive("styleclass",X);r.directive("focustrap",Y);r.component("Button",Z);r.component("DataTable",ie);r.component("Column",ee);r.component("ColumnGroup",ue);r.component("Row",pe);r.component("Toast",oe);r.component("ConfirmDialog",le);r.component("Dropdown",se);r.component("InputText",te);r.component("Dialog",ne);r.component("ProgressSpinner",me);r.component("Textarea",be);r.component("InputNumber",ae);r.component("InputMask",ge);r.mount("#BulkOnboarding");
