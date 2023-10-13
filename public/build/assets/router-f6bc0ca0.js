import{u as Le,a as Fe,c as el,b as ll}from"./vue-router-7a52ee16.js";import{Q as i,a9 as $e,g as T,j as sl,o as a,c as u,d as r,l as D,t as m,aa as n,h as x,w as A,F as X,f as Pe,b as y,n as b,k as L,a as B,ab as tl,T as Be,ac as ol,ad as nl}from"./inputnumber.esm-e362c3ab.js";import{a as Ue}from"./index-362795f3.js";import{d as al}from"./pinia-641035e3.js";import{u as rl}from"./toastservice.esm-8d63d505.js";import{S as il}from"./Service-4ef425c0.js";import{r as ul,u as W}from"./xlsx-4ad528ac.js";import{u as be}from"./NormalOnboardingMainStore-0e5ad875.js";import"./dayjs.min-2f06af28.js";import{_ as cl}from"./_plugin-vue_export-helper-c27b6911.js";const Re=al("useOnboardingMainStore",()=>{il(),be();const w=Le(),l=i(!1),h=rl(),V=i(),U=i(),F=i(),I=i(),C=i([]),p=i([]),v=i(!1),_=i(!1),k=i(),N=i(),g=e=>{I.value=e.target.files[0]},M=e=>{if(k.value=e,console.log(e),I.value){var o=I.value;if(!o)return;var d=new FileReader;d.onload=function(P){const Xe=d.result;var Z=ul(Xe,{type:"binary",cellDates:!0,dateNF:"dd-mm-yyyy"}),Me=Z.Sheets[Z.SheetNames[0]];let $=[],Ie=[];const R={},pe=W.decode_range(Me["!ref"]);let S;const Ye=pe.s.r;for(S=pe.s.c;S<=pe.e.c;++S){const O=Me[W.encode_cell({c:S,r:Ye})];let H="UNKNOWN "+S;O&&O.t&&(H=W.format_cell(O)),R[S]=H,$.push(R[S]);let fe={title:R[S],value:R[S]};R[S].includes("UNKNOWN")||Ie.push(fe)}U.value=Ie,F.value=$,console.log($),l.value=!0,setTimeout(()=>{e=="quick"?we($,Ee.value)?(N.value="quick",w.push({path:"/import/quickOnboarding"}),l.value=!1):(l.value=!1,h.add({severity:"error",summary:"Fields are not matched",detail:"fill",life:2e3})):e=="bulk"&&(N.value="bulk",we($,xe.value)?(w.push({path:"/import/bulkOnboarding"}),l.value=!1):(l.value=!1,h.add({severity:"error",summary:"Fields are not matched",detail:"fill",life:2e3})))},1e3);const Q=Z.SheetNames.reduce((O,H)=>{const fe=Z.Sheets[H];return O[H]=W.sheet_to_json(fe,{raw:!1,dateNF:"dd-mm-yyyy"}),O},{}),K=Object.keys(Q)[0];Q[K]?V.value=Q[K]:V.value=[],V.value&&ge(V.value),C.value.push(V.value);for(let O=0;O<Q[K].length;O++)console.log("jsonData['Sheet1'].length :",Q[K].length),Ae(V.value[O])},d.readAsArrayBuffer(o)}else h.add({severity:"error",summary:"file missing!",detail:"selected",life:2e3})},Y=e=>{let o="";N.value=="quick"?o="/onboarding/storeQuickOnboardEmployees":N.value=="bulk"&&(o="/onboarding/storeBulkOnboardEmployees"),p.value==0?(l.value=!0,Ue.post(o,e).then(d=>{l.value=!1,d.data.status=="failure"?h.add({severity:"error",summary:"failure",detail:`${d.data.message}`,life:3e3}):d.data.status=="success"&&(d.data.data.forEach(P=>{h.add({severity:"success",summary:`${P.Employee_Name}`,detail:`${P.message}`,life:3e3})}),setTimeout(()=>{window.location.replace(window.location.origin+"/manageEmployees")},4e3))}).finally(()=>{})):h.add({severity:"error",summary:"Failure!",detail:"Clear error fields",life:3e3})};function f(e){return e.filter((o,d)=>e.indexOf(o)!==d)}let E=i([]),s=i([]),t=i([]),c=i([]),ee=i([]),le=i([]);const ge=e=>{e.forEach(o=>{E.value.push(o["Employee Code"]),s.value.push(o.Email),t.value.push(o["Mobile Number"]),c.value.push(o["Pan No"]),ee.value.push(o.Aadhar),le.value.push(o["Account No"])})},Qe=(e,o)=>!!f(e).includes(o),ye=i(),z=i(),se=i(),te=i(),oe=i(),G=i(),ne=i(),he=i(),ve=i(),_e=i(),ke=i(),ae=i(),j=i(),re=i([]),Ee=i(),xe=i(),He=()=>{Ue.get("/onboarding/getEmployeeMandatoryDetails").then(e=>{Object.values(e.data).forEach(o=>{ye.value=o.client_code,z.value=o.user_code,te.value=o.mobile_number,se.value=o.email,oe.value=o.pan_number,G.value=o.aadhar_number,ne.value=o.bankaccount_number,he.value=o.bank_name,ve.value=o.department_name,_e.value=o.official_mail,ke.value=o.employees_blood_group,ae.value=o.employees_marital_status,j.value=o.client_details,j.value&&j.value.forEach(d=>{re.value.push(d.client_fullname)}),Ee.value=o.quick_onboard_column_data,xe.value=o.bulk_onboard_column_data})})},qe=e=>!/^[ A-Za-z_ ]+$/.test(e),ze=e=>!(/^[A-Za-z0-9]+$/.test(e)&&!z.value.includes(e));function Ge(e,o){const d=o.split(/(?=\d)/);return!!Object.values(e).includes(d[0])}const ie=e=>e?!z.value.includes(e):!0,je=e=>!/^[0-9]+$/.test(e),ue=e=>e?!(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(e.trim())&&!se.value.includes(e.trim())):!1,ce=e=>{const o=Ve(e);return e?!(/^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/.test(o)&&!G.value.includes(o)):!1};function Ve(e){const o=String(e),d=[];for(let P=0;P<o.length;P+=4)d.push(o.substr(P,4));return d.join(" ")}const Je=e=>!!G.value.includes(e),Ne=e=>{let o="";return e&&(o=e.toUpperCase()),e?!(/^([a-zA-Z]){3}([Pp]){1}([a-zA-Z]){1}([0-9]){4}([a-zA-Z]){1}?$/.test(o.trim())&&oe.value.includes(o.trim())):!0},Ce=e=>e?!!ne.value.includes(e.trim()):!1,De=e=>{let o="";return e&&(o=e.toUpperCase()),e?!/^[A-Za-z]{4}0[A-Za-z0-9]{6}$/.test(o.trim()):!1},J=e=>e?!/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}$/.test(e):!0,de=e=>e?!(/^[0-9]{10,10}$/.test(e.trim())&&!te.value.includes(e.trim())):!1,me=(e,o)=>o?!e.includes(o):!1,Ze=e=>{let o=String.fromCharCode(e.keyCode);if(/^[0-9]+$/.test(o))return!0;e.preventDefault()},Ke=e=>{let o=String.fromCharCode(e.keyCode);if(/^[A-Za-z_ ]+$/.test(o))return!0;e.preventDefault()},Se=e=>{let o=String.fromCharCode(e.keyCode);if(/^[A-Za-z0-9]+$/.test(o))return!0;e.preventDefault()},Oe=e=>{if(e){let o="";e&&e.toUpperCase();let d=o.trim();return!!he.value.includes(d)}else return!0},Te=e=>e?!!ve.value.includes(e):!0,We=e=>!!_e.value.includes(e),Ae=e=>{console.log(k.value);let o=[];return k.value=="quick"?(f(E.value).includes(e["Employee Code"])||!ie(e["Employee Code"])||f(s.value).includes(e.Email)||ue(e.Email)||J(e.DOJ)||f(t.value).includes(e["Mobile Number"])||de(e["Mobile Number"]))&&p.value.push("invalid"):k.value=="bulk"?f(E.value).includes(e["Employee Code"])||!ie(e["Employee Code"])||me(re.value,e["Legal Entity"])||f(s.value).includes(e.Email)||ue(e.Email)||J(e.DOJ)||J(e.DOB)||f(c.value).includes(e["Pan No"])||!Ne(e["Pan No"])?p.value.push("invalid"):f(ee.value).includes(e.Aadhar)||ce(e.Aadhar)?(console.log(ce(e.Aadhar)),p.value.push("invalid")):f(t.value).includes(e["Mobile Number"])||de(e["Mobile Number"])||Oe(e["Bank Name"])||me(ae.value,e["Marital Status"])||De(e["Bank ifsc"])||f(le.value).includes(e["Account No"])||Ce(e["Account No"])?p.value.push("invalid"):Te(e.Department)||p.value.push("invalid"):console.log("No more error record found!"),o};function we(e,o){if(console.log(e,o),e.length!==o.length)return console.log("length is not equal"),!1;for(let d=0;d<e.length;d++)if(e[d]!==o[d])return console.log("not matched"),!1;return!0}return{getCurrentlyImportedTableDuplicateEntries:ge,currentlyImportedTableEmployeeCodeValues:E,findCurrentTableDups:Qe,uploadOnboardingFile:Y,type:N,currentlyImportedTableAadharValues:ee,currentlyImportedTablePanValues:c,currentlyImportedTableAccNoValues:le,currentlyImportedTableEmailValues:s,currentlyImportedTableMobileNumberValues:t,getExistingOnboardingDocuments:He,existingUserCode:z,existingEmails:se,existingMobileNumbers:te,existingAadharCards:G,existingPanCards:oe,existingBankAccountNumbers:ne,initialUpdate:v,isValueUpdated:_,existingMartialStatus:ae,existingBloodgroups:ke,existingClientCode:ye,existingLegalEntity:re,legalEntityDropdown:j,isLetter:qe,isEmail:ue,isNumber:je,isEnterLetter:Ke,isEnterSpecialChars:Se,isEnterSpecialChars:Se,isValidAadhar:ce,isValidBankAccountNo:Ce,isValidBankIfsc:De,isSpecialChars:ze,isValidDate:J,isValidMobileNumber:de,isValidPancard:Ne,isEnteredNos:Ze,totalRecordsCount:C,errorRecordsCount:p,selectedFile:I,isUserExists:ie,isBankExists:Oe,isDepartmentExists:Te,isOfficialMailExists:We,isAadharExists:Je,isExistsOrNot:me,isClientCodeExists:Ge,splitNumberWithSpaces:Ve,convertExcelIntoArray:M,EmployeeQuickOnboardingDynamicHeader:U,EmployeeQuickOnboardingSource:V,getValidationMessages:Ae,getExcelForUpload:g,canShowloading:l}}),dl={class:"grid w-10/12 grid-cols-3 mx-auto my-2 place-content-center"},ml={class:"p-2 mx-6 font-semibold text-black bg-white rounded-lg fs-6"},pl={class:"font-bold"},fl={class:"p-2 mx-6 font-semibold text-black bg-green-100 rounded-lg fs-6"},bl={class:"font-bold"},gl={class:"p-2 mx-6 font-semibold text-black bg-red-100 rounded-lg fs-6"},yl={class:"font-bold"},hl={class:"py-5"},vl=r("p",{class:"font-semibold fs-6"},"Sample format:",-1),_l={class:"table-responsive"},kl={class:"table-responsive"},El=r("p",{class:"font-semibold fs-6"},"Original data:",-1),xl={class:"font-semibold fs-6"},Vl={key:0,class:"mx-2 cursor-pointer fa fa-exclamation-circle text-warning","aria-hidden":"true"},Nl={class:"font-semibold fs-6"},Cl={key:0,class:"mx-2 cursor-pointer fa fa-exclamation-circle text-warning","aria-hidden":"true"},Dl={key:0,class:"cursor-pointer fa fa-exclamation-circle text-warning","aria-hidden":"true"},Sl={class:"px-2 font-semibold fs-6 py-auto"},Ol={key:0,class:"cursor-pointer fa fa-exclamation-circle text-warning","aria-hidden":"true"},Tl={key:0,class:"cursor-pointer fa fa-exclamation-circle text-warning","aria-hidden":"true"},Al={key:0,class:"cursor-pointer fa fa-exclamation-circle text-warning","aria-hidden":"true"},wl={key:9,class:"font-semibold fs-6"},Ml={key:10,class:"font-semibold fs-6"},Il={key:11,class:"font-semibold fs-6"},Pl={key:19,class:"font-semibold fs-6"},Bl={__name:"ImportQuickOnboarding",setup(w){Le(),Fe();const l=Re(),h=be(),V=v=>!!["Basic","HRA","Statutory Bonus","Child Education Allowance","Food Coupon","LTA"].includes(v);$e(()=>{l.isValueUpdated&&(l.currentlyImportedTableEmployeeCodeValues.splice(0,l.currentlyImportedTableEmployeeCodeValues.length),l.currentlyImportedTableAadharValues.splice(0,l.currentlyImportedTableAadharValues.length),l.currentlyImportedTableAccNoValues.splice(0,l.currentlyImportedTableAccNoValues.length),l.currentlyImportedTablePanValues.splice(0,l.currentlyImportedTablePanValues.length),l.currentlyImportedTableEmailValues.splice(0,l.currentlyImportedTableEmailValues.length),l.currentlyImportedTableMobileNumberValues.splice(0,l.currentlyImportedTableMobileNumberValues.length),setTimeout(()=>{l.getCurrentlyImportedTableDuplicateEntries(l.EmployeeQuickOnboardingSource)},100))});const U=i(!0),F=v=>{l.initialUpdate=!0,setTimeout(()=>{U.value=!1,console.log("functionkilled")},30),l.errorRecordsCount.splice(0,l.errorRecordsCount.length);let{data:_,newValue:k,field:N}=v;k?l.isValueUpdated=!0:isValueUpdated=!1,k.trim().length>0?_[N]=k:v.preventDefault();for(let g=0;g<l.EmployeeQuickOnboardingSource.length;g++)l.getValidationMessages(l.EmployeeQuickOnboardingSource[g])},I=i([{"Employee Code":"ABS01","Employee Name":"Vishu","Date Of Birth (dd-mm-yyyy)":"23-09-2001","Date of Joined (dd-mm-yyyy)":"23-09-2023","Mobile Number":"9898989898","Aadhaar Number":"2222 3333 4444","Personal Email":"abs@gmail.com","Pan Number":"AJUPA0900H",Gender:"Male","Marital Status":"Married","Reporting Manager":"Pradessh",Designation:"Developer",Department:"IT",Location:"Chennai","Father Name":"Simma","Physically Handicapped":"No"}]),C=[{title:"Employee Code"},{title:"Employee Name"},{title:"Date Of Birth (dd-mm-yyyy)"},{title:"Date of Joined (dd-mm-yyyy)"},{title:"Mobile Number"},{title:"Aadhaar Number"},{title:"Personal Email"},{title:"Pan Number"},{title:"Gender"},{title:"Marital Status"},{title:"Reporting Manager"},{title:"Designation"},{title:"Department"},{title:"Location"},{title:"Father Name"},{title:"Physically Handicapped"}],p=i([{name:"Male",value:"Male"},{name:"Female",value:"Female"},{name:"Others",value:"Others"}]);return(v,_)=>{const k=T("Column"),N=T("DataTable"),g=T("InputText"),M=T("Dropdown"),Y=T("InputMask"),f=sl("tooltip");return a(),u(X,null,[r("div",dl,[r("div",ml,[D("Total Records : "),r("span",pl,m(n(l).totalRecordsCount.length?n(l).totalRecordsCount[0].length:0),1)]),r("div",fl,[D("Processed Records : "),r("span",bl,m(n(l).totalRecordsCount.length?n(l).totalRecordsCount[0].length-n(l).errorRecordsCount.length:0),1)]),r("div",gl,[D("Error Records : "),r("span",yl,m(n(l).errorRecordsCount.length),1)])]),r("div",hl,[vl,r("div",_l,[x(N,{class:"my-4",value:I.value,tableStyle:"min-width: 50rem",responsiveLayout:"scroll"},{default:A(()=>[(a(),u(X,null,Pe(C,E=>x(k,{key:E.title,field:E.title,style:{"min-width":"12rem"},header:E.title},null,8,["field","header"])),64))]),_:1},8,["value"])])]),r("div",kl,[El,n(l).EmployeeQuickOnboardingSource?(a(),y(N,{key:0,class:"py-4",value:n(l).EmployeeQuickOnboardingSource,tableStyle:"min-width: 50rem",responsiveLayout:"scroll",editMode:"cell",onCellEditComplete:F,stateStorage:"session",stateKey:"dt-state-demo-session",rows:n(l).EmployeeQuickOnboardingSource.length},{footer:A(()=>[r("button",{class:"flex justify-center mx-auto btn btn-orange",onClick:_[2]||(_[2]=E=>n(l).uploadOnboardingFile(n(l).EmployeeQuickOnboardingSource))},"Upload")]),default:A(()=>[(a(!0),u(X,null,Pe(n(l).EmployeeQuickOnboardingDynamicHeader,E=>(a(),y(k,{key:E.title,field:E.title,style:{"min-width":"12rem"},header:E.title},{body:A(({data:s,field:t})=>[t.includes("Employee Code")?(a(),u("div",{key:0,class:b([n(l).findCurrentTableDups(n(l).currentlyImportedTableEmployeeCodeValues,s["Employee Code"])||!n(l).isUserExists(s["Employee Code"])?"bg-red-100 p-2 rounded-lg":""])},[r("p",xl,[n(l).isUserExists(s["Employee Code"])?B("",!0):L((a(),u("i",Vl,null,512)),[[f,"User code is already exists",void 0,{right:!0}]]),D(" "+m(s["Employee Code"]?s["Employee Code"]:"-"),1)])],2)):t.includes("Legal Entity")?(a(),u("div",{key:1,class:b([n(l).isExistsOrNot(n(l).existingLegalEntity,s["Legal Entity"])?"bg-red-100 p-2 rounded-lg":""])},[r("p",Nl,m(s["Legal Entity"]?s["Legal Entity"]:"-"),1)],2)):t.includes("Aadhar")?(a(),u("p",{key:2,class:b([[n(l).findCurrentTableDups(n(l).currentlyImportedTableAadharValues,s.Aadhar)||n(l).isValidAadhar(s.Aadhar)?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},[n(l).isAadharExists(s.Aadhar)?L((a(),u("i",Cl,null,512)),[[f,"Aadhar number is already exists",void 0,{right:!0}]]):B("",!0),D(" "+m(n(l).splitNumberWithSpaces(s.Aadhar)),1)],2)):t.includes("Employee Name")?(a(),u("p",{key:3,class:b([[n(l).isLetter(s["Employee Name"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},m(s["Employee Name"]?s["Employee Name"]:"-"),3)):t.includes("Email")?(a(),u("p",{key:4,class:b([[n(l).findCurrentTableDups(n(l).currentlyImportedTableEmailValues,s.Email)||n(l).isEmail(s.Email)?"bg-red-100 p-2 rounded-lg":""],"flex items-center font-semibold fs-6"])},[n(l).existingEmails.includes(s.Email)?L((a(),u("i",Dl,null,512)),[[f,"Email is already exists",void 0,{right:!0}]]):B("",!0),r("span",Sl,m(s.Email?s.Email:"-"),1)],2)):t.includes("Mobile Number")?(a(),u("p",{key:5,class:b([[n(l).findCurrentTableDups(n(l).currentlyImportedTableMobileNumberValues,s[t])||n(l).existingMobileNumbers.includes(s[t])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},[n(l).existingMobileNumbers.includes(s[t])?L((a(),u("i",Ol,null,512)),[[f,"Mobile number is already exists",void 0,{right:!0}]]):B("",!0),D(" "+m(s["Mobile Number"]?s["Mobile Number"]:"-"),1)],2)):t.includes("Account No")?(a(),u("p",{key:6,class:b([[n(l).findCurrentTableDups(n(l).currentlyImportedTableAccNoValues,s["Account No"])||n(l).isValidBankAccountNo(s["Account No"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},[n(l).existingMobileNumbers.includes(s[t])?L((a(),u("i",Tl,null,512)),[[f,"Account number is already exists",void 0,{right:!0}]]):B("",!0),D(" "+m(s["Account No"]?s["Account No"]:"-"),1)],2)):t.includes("Bank Name")?(a(),u("p",{key:7,class:b([[n(l).isBankExists(s["Bank Name"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},m(s["Bank Name"]?s["Bank Name"]:"-"),3)):t.includes("Pan No")?(a(),u("p",{key:8,class:b([[n(l).findCurrentTableDups(n(l).currentlyImportedTablePanValues,s["Pan No"])||!n(l).isValidPancard(s["Pan No"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},[n(l).isValidPancard(s["Pan No"])?B("",!0):L((a(),u("i",Al,null,512)),[[f,"Pan number is already exists",void 0,{right:!0}]]),D(" "+m(s["Pan No"]?s["Pan No"].toUpperCase():"-"),1)],2)):t.includes("Father DOB")?(a(),u("p",wl,m(s[t]?s[t]:"-"),1)):t.includes("Mother DOB")?(a(),u("p",Ml,m(s[t]?s[t]:"-"),1)):t.includes("Spouse DOB")?(a(),u("p",Il,m(s[t]?s[t]:"-"),1)):t.includes("DOB")?(a(),u("p",{key:12,class:b([[n(l).isValidDate(s.DOB)?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},m(s.DOB?s[t]:"-"),3)):t.includes("DOJ")?(a(),u("p",{key:13,class:b([[n(l).isValidDate(s.DOJ)?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},m(s.DOJ?s[t]:"-"),3)):t.includes("Bank ifsc")?(a(),u("p",{key:14,class:b([[n(l).isValidBankIfsc(s["Bank ifsc"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},m(s["Bank ifsc"]?s["Bank ifsc"].toUpperCase():"-"),3)):t.includes("Official Mail")?(a(),u("p",{key:15,class:b([[n(l).isOfficialMailExists(s["Official Mail"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},m(s["Official Mail"]?s["Official Mail"]:"-"),3)):t.includes("Marital Status")?(a(),u("p",{key:16,class:b([[n(l).isExistsOrNot(n(l).existingMartialStatus,s["Marital Status"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},m(s["Marital Status"]?s["Marital Status"]:"-"),3)):t.includes("Blood Group")?(a(),u("p",{key:17,class:b([[n(l).isExistsOrNot(n(l).existingBloodgroups,s["Blood Group"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},m(s["Blood Group"]?s["Blood Group"]:"-"),3)):t.includes("Department")?(a(),u("p",{key:18,class:b([[n(l).isDepartmentExists(s.Department)?"":"bg-red-100 p-2 rounded-lg"],"font-semibold fs-6"])},m(s.Department?s.Department:"-"),3)):(a(),u("p",Pl,m(s[t]?s[t]:"-"),1))]),editor:A(({data:s,field:t})=>[t=="Aadhar"?(a(),y(g,{key:0,modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c,minLength:"12",maxLength:"12",onKeypress:_[0]||(_[0]=c=>n(l).isEnteredNos(c))},null,8,["modelValue","onUpdate:modelValue"])):t=="Gender"?(a(),y(M,{key:1,modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c,options:p.value,optionLabel:"name",optionValue:"name",placeholder:"Select Gender",class:"w-full"},null,8,["modelValue","onUpdate:modelValue","options"])):t=="Pan No"?(a(),y(Y,{key:2,id:"serial",mask:"aaaPa9999a",modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c,class:"uppercase"},null,8,["modelValue","onUpdate:modelValue"])):t=="Email"?(a(),y(g,{key:3,modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c},null,8,["modelValue","onUpdate:modelValue"])):t=="Mobile Number"?(a(),y(g,{key:4,modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c,minLength:"10",maxLength:"10",onKeypress:_[1]||(_[1]=c=>n(l).isEnteredNos(c))},null,8,["modelValue","onUpdate:modelValue"])):t=="Legal Entity"?(a(),y(M,{key:5,modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c,options:n(l).legalEntityDropdown,optionLabel:"client_fullname",optionValue:"client_fullname",placeholder:"Select Legal Entity"},null,8,["modelValue","onUpdate:modelValue","options"])):t=="Bank Name"?(a(),y(M,{key:6,modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c,options:n(h).bankList,optionLabel:"bank_name",optionValue:"bank_name",placeholder:"Select Bank Name"},null,8,["modelValue","onUpdate:modelValue","options"])):t=="Marital Status"?(a(),y(M,{key:7,modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c,options:n(h).maritalDetails,optionLabel:"name",optionValue:"name",placeholder:"Select Martial Status"},null,8,["modelValue","onUpdate:modelValue","options"])):t=="Blood Group"?(a(),y(M,{key:8,modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c,options:n(h).bloodGroups,optionLabel:"name",optionValue:"name",placeholder:"Select Bloodgroup",class:"p-error"},null,8,["modelValue","onUpdate:modelValue","options"])):t=="Department"?(a(),y(M,{key:9,modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c,options:n(h).departmentDetails,optionLabel:"name",optionValue:"name",placeholder:"Select Department",class:"p-error"},null,8,["modelValue","onUpdate:modelValue","options"])):(a(),y(g,{key:10,modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c,readonly:V(t)},null,8,["modelValue","onUpdate:modelValue","readonly"]))]),_:2},1032,["field","header"]))),128))]),_:1},8,["value","rows"])):B("",!0)])],64)}}};const q=w=>(ol("data-v-81fa2dac"),w=w(),nl(),w),Ul={class:"h-screen w-full"},Ll={class:"grid grid-cols-12"},Fl={class:"px-2 col-span-5"},$l=q(()=>r("p",{class:"font-bold text-2xl"},"Employee Quick Onboarding",-1)),Rl=q(()=>r("ul",{class:"list-disc p-2 my-3"},[r("li",{class:"font-semibold fs-6"},[D("Download the "),r("a",{href:"/assets//ABSQuickOnboarding.xlsx",class:"font-semibold text-blue-300 cursor-pointer fs-6"},"Sample")]),r("li",{class:"font-semibold fs-6"},"Fill the information in excel template")],-1)),Ql={class:"grid grid-cols-12 divide-x-2 divide-gray-600 border-gray-500 rounded-lg border p-2 mr-3"},Hl=q(()=>r("i",{class:"pi pi-folder px-2",style:{"font-size":"1rem"}},null,-1)),ql={class:"col-span-9 px-4"},zl=q(()=>r("div",{class:"col-span-7"},[r("div",{class:"col-form-label"},[r("div",{class:"py-2 font-semibold bg-red-100 rounded-lg f-12 alert-warning fs-6"},[r("i",{class:"mx-2 fa fa-warning text-danger"}),D(" Read these instructions before uploading the file. ")]),r("div",null,[r("ul",{class:"m-4 font-semibold list-disc",style:{}},[r("li",{class:"font-semibold fs-6"}," The fields Employee Number, Employee Name, Email, Date of Joining, and Location must be filled in before adding workers."),r("li",{class:"font-semibold fs-6"}," When adding an employee, you must enter your mobile phone number."),r("li",{class:"font-semibold fs-6"}," To receive all messages, including those about timesheet reminders, leave requests, and attendance requests, your email address must be current. "),r("li",{class:"font-semibold fs-6"}," Each employee's email is different. Therefore, an employee cannot be added to two organisations using the same email."),r("li",{class:"font-semibold fs-6"}," Designation is required because, in cases when two or more workers share the same Name, it will aid in locating them in People Picker search results. ")])])])],-1)),Gl={key:1,class:""},jl=q(()=>r("h5",{style:{"text-align":"center"}},"Please wait...",-1)),Jl={__name:"QuickOnboarding",setup(w){const l=Re(),h=be(),V=i(null),U=()=>{V.value.click()};tl(()=>{l.getExistingOnboardingDocuments(),h.getBasicDeps()}),$e(()=>{l.initialUpdate&&(l.currentlyImportedTableEmployeeCodeValues.splice(0,l.currentlyImportedTableEmployeeCodeValues.length),l.currentlyImportedTableAadharValues.splice(0,l.currentlyImportedTableAadharValues.length),l.currentlyImportedTableMobileNumberValues.splice(0,l.currentlyImportedTableMobileNumberValues.length),l.currentlyImportedTableAccNoValues.splice(0,l.currentlyImportedTableAccNoValues.length),l.currentlyImportedTablePanValues.splice(0,l.currentlyImportedTablePanValues.length),l.currentlyImportedTableEmailValues.splice(0,l.currentlyImportedTableEmailValues.length))});const F=Fe();return(I,C)=>{const p=T("Toast"),v=T("Column"),_=T("DataTable"),k=T("ProgressSpinner"),N=T("Dialog");return a(),u(X,null,[x(p),n(F).params.module==null?(a(),y(Be,{key:0,name:"fade"},{default:A(()=>[r("div",Ul,[r("div",Ll,[r("div",Fl,[$l,Rl,r("div",Ql,[r("div",{onClick:U,class:"col-span-3 font-semibold fs-6 cursor-pointer w-full",for:"file"},[Hl,D("Browse ")]),r("span",ql,m(n(l).selectedFile?n(l).selectedFile.name:""),1)]),r("input",{ref_key:"fileInput",ref:V,type:"file",name:"",id:"file",hidden:"",onChange:C[0]||(C[0]=g=>n(l).getExcelForUpload(g)),accept:".xls, .xlsx"},null,544),r("button",{class:"float-right mx-5 mt-4 btn btn-orange",onClick:C[1]||(C[1]=g=>n(l).convertExcelIntoArray("quick"))},"Upload")]),zl]),x(_,{ref:"dt",dataKey:"id",paginator:!0,class:"mt-3",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:A(()=>[x(v,{field:"Employee",header:"Employee's"}),x(v,{field:"Employee code",header:"Month"}),x(v,{field:"Employee code",header:"Date Time"}),x(v,{field:"Employee code",header:"Total Employees Onboarded"}),x(v,{field:"Employee code",header:"Action"})]),_:1},512)])]),_:1})):(a(),u("div",Gl,[x(Bl)])),x(Be,{name:"fade",mode:"out-in"},{default:A(()=>[x(N,{header:"Header",visible:n(l).canShowloading,"onUpdate:visible":C[2]||(C[2]=g=>n(l).canShowloading=g),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:A(()=>[x(k,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:A(()=>[jl]),_:1},8,["visible"])]),_:1})],64)}}},Zl=cl(Jl,[["__scopeId","data-v-81fa2dac"]]);const as=el({history:ll(),routes:[{path:"/import/:module",name:"QuickOnboarding",component:Zl}]});export{Zl as Q,Bl as _,as as r,Re as u};
