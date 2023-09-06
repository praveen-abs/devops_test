import{u as Me,a as Ie,c as Ze,b as Ke}from"./vue-router81077.js";import{Q as i,a9 as Pe,g as S,j as We,o as a,c as u,d as r,l as C,t as m,aa as o,h as k,w as T,F as X,f as Oe,b as h,n as f,k as L,a as B,ab as Xe,T as Ae,ac as Ye,ad as el}from"./inputnumber.esm81077.js";import{a as we}from"./index81077.js";import{d as ll}from"./pinia81077.js";import{u as sl}from"./toastservice.esm81077.js";import{S as tl}from"./Service81077.js";import{r as ol,u as W}from"./xlsx81077.js";import{u as be}from"./NormalOnboardingMainStore81077.js";import"./dayjs.min81077.js";import{_ as nl}from"./_plugin-vue_export-helper81077.js";const Be=ll("useOnboardingMainStore",()=>{tl(),be();const A=Me(),l=i(!1),V=sl(),E=i(),U=i(),w=i(),$=i([]),d=i([]),F=i(!1),v=i(!1),b=i(),g=i(),M=e=>{w.value=e.target.files[0]},y=e=>{if(b.value=e,console.log(e),w.value){l.value=!0;var n=w.value;if(!n)return;setTimeout(()=>{e=="quick"?(g.value="quick",A.push({path:"/import/quickOnboarding"})):e=="bulk"?(g.value="bulk",A.push({path:"/import/bulkOnboarding"})):g.value="",l.value=!1},500);var p=new FileReader;p.onload=function(P){const qe=p.result;var J=ol(qe,{type:"binary",cellDates:!0,dateNF:"dd-mm-yyyy"}),Te=J.Sheets[J.SheetNames[0]];let de=[];const Z={},me=W.decode_range(Te["!ref"]);let O;const Je=me.s.r;for(O=me.s.c;O<=me.e.c;++O){const D=Te[W.encode_cell({c:O,r:Je})];let Q="UNKNOWN "+O;D&&D.t&&(Q=W.format_cell(D)),Z[O]=Q;let pe={title:Z[O],value:Z[O]};Z[O].includes("UNKNOWN")||de.push(pe)}U.value=de,console.log(de);const R=J.SheetNames.reduce((D,Q)=>{const pe=J.Sheets[Q];return D[Q]=W.sheet_to_json(pe,{raw:!1,dateNF:"dd-mm-yyyy"}),D},{}),K=Object.keys(R)[0];R[K]?E.value=R[K]:E.value=[],E.value&&fe(E.value),$.value.push(E.value);for(let D=0;D<R[K].length;D++)console.log("jsonData['Sheet1'].length :",R[K].length),Se(E.value[D])},p.readAsArrayBuffer(n)}else V.add({severity:"error",summary:"file missing!",detail:"selected",life:2e3})},I=e=>{let n="";g.value=="quick"?n="/onboarding/storeQuickOnboardEmployees":g.value=="bulk"&&(n="/onboarding/storeBulkOnboardEmployees"),d.value==0?(l.value=!0,we.post(n,e).then(p=>{l.value=!1,p.data.status=="failure"?V.add({severity:"error",summary:"failure",detail:`${p.data.message}`,life:3e3}):p.data.status=="success"&&(p.data.data.forEach(P=>{V.add({severity:"success",summary:`${P.Employee_Name}`,detail:`${P.message}`,life:3e3})}),setTimeout(()=>{window.location.replace(window.location.origin+"/manageEmployees")},4e3))}).finally(()=>{})):V.add({severity:"error",summary:"Failure!",detail:"Clear error fields",life:3e3})};function x(e){return e.filter((n,p)=>e.indexOf(n)!==p)}let N=i([]),_=i([]),s=i([]),t=i([]),c=i([]),Y=i([]);const fe=e=>{e.forEach(n=>{N.value.push(n["Employee Code"]),_.value.push(n.Email),s.value.push(n["Mobile Number"]),t.value.push(n["Pan No"]),c.value.push(n.Aadhar),Y.value.push(n["Account No"])})},Ue=(e,n)=>!!x(e).includes(n),ge=i(),G=i(),ee=i(),le=i(),se=i(),H=i(),te=i(),ye=i(),he=i(),ve=i(),_e=i(),oe=i(),j=i(),ne=i([]),Le=()=>{we.get("/onboarding/getEmployeeMandatoryDetails").then(e=>{Object.values(e.data).forEach(n=>{ge.value=n.client_code,G.value=n.user_code,le.value=n.mobile_number,ee.value=n.email,se.value=n.pan_number,H.value=n.aadhar_number,te.value=n.bankaccount_number,ye.value=n.bank_name,he.value=n.department_name,ve.value=n.official_mail,_e.value=n.employees_blood_group,oe.value=n.employees_marital_status,j.value=n.client_details,j.value&&j.value.forEach(p=>{ne.value.push(p.client_fullname)})})})},$e=e=>!/^[ A-Za-z_ ]+$/.test(e),Fe=e=>!(/^[A-Za-z0-9]+$/.test(e)&&!G.value.includes(e));function Re(e,n){const p=n.split(/(?=\d)/);return!!Object.values(e).includes(p[0])}const ae=e=>e?!G.value.includes(e):!0,Qe=e=>!/^[0-9]+$/.test(e),re=e=>e?!(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(e.trim())&&!ee.value.includes(e.trim())):!1,ie=e=>{const n=ke(e);return e?!(/^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/.test(n)&&!H.value.includes(n)):!1};function ke(e){const n=String(e),p=[];for(let P=0;P<n.length;P+=4)p.push(n.substr(P,4));return p.join(" ")}const ze=e=>!!H.value.includes(e),Ee=e=>{let n="";return e&&(n=e.toUpperCase()),e?!(/^([a-zA-Z]){3}([Pp]){1}([a-zA-Z]){1}([0-9]){4}([a-zA-Z]){1}?$/.test(n.trim())&&se.value.includes(n.trim())):!0},xe=e=>e?!!te.value.includes(e.trim()):!1,Ve=e=>{let n="";return e&&(n=e.toUpperCase()),e?!/^[A-Za-z]{4}0[A-Za-z0-9]{6}$/.test(n.trim()):!1},q=e=>e?!/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}$/.test(e):!0,ue=e=>e?!(/^[0-9]{10,10}$/.test(e.trim())&&!le.value.includes(e.trim())):!1,ce=(e,n)=>n?!e.includes(n):!1,Ge=e=>{let n=String.fromCharCode(e.keyCode);if(/^[0-9]+$/.test(n))return!0;e.preventDefault()},He=e=>{let n=String.fromCharCode(e.keyCode);if(/^[A-Za-z_ ]+$/.test(n))return!0;e.preventDefault()},Ne=e=>{let n=String.fromCharCode(e.keyCode);if(/^[A-Za-z0-9]+$/.test(n))return!0;e.preventDefault()},Ce=e=>{if(e){let n="";e&&e.toUpperCase();let p=n.trim();return!!ye.value.includes(p)}else return!0},De=e=>e?!!he.value.includes(e):!0,je=e=>!!ve.value.includes(e),Se=e=>{console.log(b.value);let n=[];return b.value=="quick"?(x(N.value).includes(e["Employee Code"])||!ae(e["Employee Code"])||x(_.value).includes(e.Email)||re(e.Email)||q(e.DOJ)||x(s.value).includes(e["Mobile Number"])||ue(e["Mobile Number"]))&&d.value.push("invalid"):b.value=="bulk"?x(N.value).includes(e["Employee Code"])||!ae(e["Employee Code"])||ce(ne.value,e["Legal Entity"])||x(_.value).includes(e.Email)||re(e.Email)||q(e.DOJ)||q(e.DOB)||x(t.value).includes(e["Pan No"])||!Ee(e["Pan No"])?d.value.push("invalid"):x(c.value).includes(e.Aadhar)||ie(e.Aadhar)?(console.log(ie(e.Aadhar)),d.value.push("invalid")):x(s.value).includes(e["Mobile Number"])||ue(e["Mobile Number"])||Ce(e["Bank Name"])||ce(oe.value,e["Marital Status"])||Ve(e["Bank ifsc"])||x(Y.value).includes(e["Account No"])||xe(e["Account No"])?d.value.push("invalid"):De(e.Department)||d.value.push("invalid"):console.log("No more error record found!"),n};return{getCurrentlyImportedTableDuplicateEntries:fe,currentlyImportedTableEmployeeCodeValues:N,findCurrentTableDups:Ue,uploadOnboardingFile:I,type:g,currentlyImportedTableAadharValues:c,currentlyImportedTablePanValues:t,currentlyImportedTableAccNoValues:Y,currentlyImportedTableEmailValues:_,currentlyImportedTableMobileNumberValues:s,getExistingOnboardingDocuments:Le,existingUserCode:G,existingEmails:ee,existingMobileNumbers:le,existingAadharCards:H,existingPanCards:se,existingBankAccountNumbers:te,initialUpdate:F,isValueUpdated:v,existingMartialStatus:oe,existingBloodgroups:_e,existingClientCode:ge,existingLegalEntity:ne,legalEntityDropdown:j,isLetter:$e,isEmail:re,isNumber:Qe,isEnterLetter:He,isEnterSpecialChars:Ne,isEnterSpecialChars:Ne,isValidAadhar:ie,isValidBankAccountNo:xe,isValidBankIfsc:Ve,isSpecialChars:Fe,isValidDate:q,isValidMobileNumber:ue,isValidPancard:Ee,isEnteredNos:Ge,totalRecordsCount:$,errorRecordsCount:d,selectedFile:w,isUserExists:ae,isBankExists:Ce,isDepartmentExists:De,isOfficialMailExists:je,isAadharExists:ze,isExistsOrNot:ce,isClientCodeExists:Re,splitNumberWithSpaces:ke,convertExcelIntoArray:y,EmployeeQuickOnboardingDynamicHeader:U,EmployeeQuickOnboardingSource:E,getValidationMessages:Se,getExcelForUpload:M,canShowloading:l}}),al={class:"grid w-10/12 grid-cols-3 mx-auto my-2 place-content-center"},rl={class:"p-2 mx-6 font-semibold text-black bg-white rounded-lg fs-6"},il={class:"font-bold"},ul={class:"p-2 mx-6 font-semibold text-black bg-green-100 rounded-lg fs-6"},cl={class:"font-bold"},dl={class:"p-2 mx-6 font-semibold text-black bg-red-100 rounded-lg fs-6"},ml={class:"font-bold"},pl={class:"py-5"},bl=r("p",{class:"font-semibold fs-6"},"Sample format:",-1),fl={class:"table-responsive"},gl={class:"table-responsive"},yl=r("p",{class:"font-semibold fs-6"},"Original data:",-1),hl={class:"font-semibold fs-6"},vl={key:0,class:"mx-2 cursor-pointer fa fa-exclamation-circle text-warning","aria-hidden":"true"},_l={class:"font-semibold fs-6"},kl={key:0,class:"mx-2 cursor-pointer fa fa-exclamation-circle text-warning","aria-hidden":"true"},El={key:0,class:"cursor-pointer fa fa-exclamation-circle text-warning","aria-hidden":"true"},xl={class:"px-2 font-semibold fs-6 py-auto"},Vl={key:0,class:"cursor-pointer fa fa-exclamation-circle text-warning","aria-hidden":"true"},Nl={key:0,class:"cursor-pointer fa fa-exclamation-circle text-warning","aria-hidden":"true"},Cl={key:0,class:"cursor-pointer fa fa-exclamation-circle text-warning","aria-hidden":"true"},Dl={key:9,class:"font-semibold fs-6"},Sl={key:10,class:"font-semibold fs-6"},Tl={key:11,class:"font-semibold fs-6"},Ol={key:19,class:"font-semibold fs-6"},Al={__name:"ImportQuickOnboarding",setup(A){Me(),Ie();const l=Be(),V=be(),E=v=>!!["Basic","HRA","Statutory Bonus","Child Education Allowance","Food Coupon","LTA"].includes(v);Pe(()=>{l.isValueUpdated&&(l.currentlyImportedTableEmployeeCodeValues.splice(0,l.currentlyImportedTableEmployeeCodeValues.length),l.currentlyImportedTableAadharValues.splice(0,l.currentlyImportedTableAadharValues.length),l.currentlyImportedTableAccNoValues.splice(0,l.currentlyImportedTableAccNoValues.length),l.currentlyImportedTablePanValues.splice(0,l.currentlyImportedTablePanValues.length),l.currentlyImportedTableEmailValues.splice(0,l.currentlyImportedTableEmailValues.length),l.currentlyImportedTableMobileNumberValues.splice(0,l.currentlyImportedTableMobileNumberValues.length),setTimeout(()=>{l.getCurrentlyImportedTableDuplicateEntries(l.EmployeeQuickOnboardingSource)},100))});const U=i(!0),w=v=>{l.initialUpdate=!0,setTimeout(()=>{U.value=!1,console.log("functionkilled")},30),l.errorRecordsCount.splice(0,l.errorRecordsCount.length);let{data:b,newValue:g,field:M}=v;g?l.isValueUpdated=!0:isValueUpdated=!1,g.trim().length>0?b[M]=g:v.preventDefault();for(let y=0;y<l.EmployeeQuickOnboardingSource.length;y++)l.getValidationMessages(l.EmployeeQuickOnboardingSource[y])},$=i([{"Employee Code":"ABS01","Employee Name":"Vishu","Date Of Birth (dd-mm-yyyy)":"23-09-2001","Date of Joined (dd-mm-yyyy)":"23-09-2023","Mobile Number":"9898989898","Aadhaar Number":"2222 3333 4444","Personal Email":"abs@gmail.com","Pan Number":"AJUPA0900H",Gender:"Male","Marital Status":"Married","Reporting Manager":"Pradessh",Designation:"Developer",Department:"IT",Location:"Chennai","Father Name":"Simma","Physically Handicapped":"No"}]),d=[{title:"Employee Code"},{title:"Employee Name"},{title:"Date Of Birth (dd-mm-yyyy)"},{title:"Date of Joined (dd-mm-yyyy)"},{title:"Mobile Number"},{title:"Aadhaar Number"},{title:"Personal Email"},{title:"Pan Number"},{title:"Gender"},{title:"Marital Status"},{title:"Reporting Manager"},{title:"Designation"},{title:"Department"},{title:"Location"},{title:"Father Name"},{title:"Physically Handicapped"}],F=i([{name:"Male",value:"Male"},{name:"Female",value:"Female"},{name:"Others",value:"Others"}]);return(v,b)=>{const g=S("Column"),M=S("DataTable"),y=S("InputText"),I=S("Dropdown"),x=S("InputMask"),N=We("tooltip");return a(),u(X,null,[r("div",al,[r("div",rl,[C("Total Records : "),r("span",il,m(o(l).totalRecordsCount.length?o(l).totalRecordsCount[0].length:0),1)]),r("div",ul,[C("Processed Records : "),r("span",cl,m(o(l).totalRecordsCount.length?o(l).totalRecordsCount[0].length-o(l).errorRecordsCount.length:0),1)]),r("div",dl,[C("Error Records : "),r("span",ml,m(o(l).errorRecordsCount.length),1)])]),r("div",pl,[bl,r("div",fl,[k(M,{class:"my-4",value:$.value,tableStyle:"min-width: 50rem",responsiveLayout:"scroll"},{default:T(()=>[(a(),u(X,null,Oe(d,_=>k(g,{key:_.title,field:_.title,style:{"min-width":"12rem"},header:_.title},null,8,["field","header"])),64))]),_:1},8,["value"])])]),r("div",gl,[yl,o(l).EmployeeQuickOnboardingSource?(a(),h(M,{key:0,class:"py-4",value:o(l).EmployeeQuickOnboardingSource,tableStyle:"min-width: 50rem",responsiveLayout:"scroll",editMode:"cell",onCellEditComplete:w,stateStorage:"session",stateKey:"dt-state-demo-session",rows:o(l).EmployeeQuickOnboardingSource.length},{footer:T(()=>[r("button",{class:"flex justify-center mx-auto btn btn-orange",onClick:b[2]||(b[2]=_=>o(l).uploadOnboardingFile(o(l).EmployeeQuickOnboardingSource))},"Upload")]),default:T(()=>[(a(!0),u(X,null,Oe(o(l).EmployeeQuickOnboardingDynamicHeader,_=>(a(),h(g,{key:_.title,field:_.title,style:{"min-width":"12rem"},header:_.title},{body:T(({data:s,field:t})=>[t.includes("Employee Code")?(a(),u("div",{key:0,class:f([o(l).findCurrentTableDups(o(l).currentlyImportedTableEmployeeCodeValues,s["Employee Code"])||!o(l).isUserExists(s["Employee Code"])?"bg-red-100 p-2 rounded-lg":""])},[r("p",hl,[o(l).isUserExists(s["Employee Code"])?B("",!0):L((a(),u("i",vl,null,512)),[[N,"User code is already exists",void 0,{right:!0}]]),C(" "+m(s["Employee Code"]?s["Employee Code"]:"-"),1)])],2)):t.includes("Legal Entity")?(a(),u("div",{key:1,class:f([o(l).isExistsOrNot(o(l).existingLegalEntity,s["Legal Entity"])?"bg-red-100 p-2 rounded-lg":""])},[r("p",_l,m(s["Legal Entity"]?s["Legal Entity"]:"-"),1)],2)):t.includes("Aadhar")?(a(),u("p",{key:2,class:f([[o(l).findCurrentTableDups(o(l).currentlyImportedTableAadharValues,s.Aadhar)||o(l).isValidAadhar(s.Aadhar)?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},[o(l).isAadharExists(s.Aadhar)?L((a(),u("i",kl,null,512)),[[N,"Aadhar number is already exists",void 0,{right:!0}]]):B("",!0),C(" "+m(o(l).splitNumberWithSpaces(s.Aadhar)),1)],2)):t.includes("Employee Name")?(a(),u("p",{key:3,class:f([[o(l).isLetter(s["Employee Name"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},m(s["Employee Name"]?s["Employee Name"]:"-"),3)):t.includes("Email")?(a(),u("p",{key:4,class:f([[o(l).findCurrentTableDups(o(l).currentlyImportedTableEmailValues,s.Email)||o(l).isEmail(s.Email)?"bg-red-100 p-2 rounded-lg":""],"flex items-center font-semibold fs-6"])},[o(l).existingEmails.includes(s.Email)?L((a(),u("i",El,null,512)),[[N,"Email is already exists",void 0,{right:!0}]]):B("",!0),r("span",xl,m(s.Email?s.Email:"-"),1)],2)):t.includes("Mobile Number")?(a(),u("p",{key:5,class:f([[o(l).findCurrentTableDups(o(l).currentlyImportedTableMobileNumberValues,s[t])||o(l).existingMobileNumbers.includes(s[t])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},[o(l).existingMobileNumbers.includes(s[t])?L((a(),u("i",Vl,null,512)),[[N,"Mobile number is already exists",void 0,{right:!0}]]):B("",!0),C(" "+m(s["Mobile Number"]?s["Mobile Number"]:"-"),1)],2)):t.includes("Account No")?(a(),u("p",{key:6,class:f([[o(l).findCurrentTableDups(o(l).currentlyImportedTableAccNoValues,s["Account No"])||o(l).isValidBankAccountNo(s["Account No"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},[o(l).existingMobileNumbers.includes(s[t])?L((a(),u("i",Nl,null,512)),[[N,"Account number is already exists",void 0,{right:!0}]]):B("",!0),C(" "+m(s["Account No"]?s["Account No"]:"-"),1)],2)):t.includes("Bank Name")?(a(),u("p",{key:7,class:f([[o(l).isBankExists(s["Bank Name"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},m(s["Bank Name"]?s["Bank Name"]:"-"),3)):t.includes("Pan No")?(a(),u("p",{key:8,class:f([[o(l).findCurrentTableDups(o(l).currentlyImportedTablePanValues,s["Pan No"])||!o(l).isValidPancard(s["Pan No"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},[o(l).isValidPancard(s["Pan No"])?B("",!0):L((a(),u("i",Cl,null,512)),[[N,"Pan number is already exists",void 0,{right:!0}]]),C(" "+m(s["Pan No"]?s["Pan No"].toUpperCase():"-"),1)],2)):t.includes("Father DOB")?(a(),u("p",Dl,m(s[t]?s[t]:"-"),1)):t.includes("Mother DOB")?(a(),u("p",Sl,m(s[t]?s[t]:"-"),1)):t.includes("Spouse DOB")?(a(),u("p",Tl,m(s[t]?s[t]:"-"),1)):t.includes("DOB")?(a(),u("p",{key:12,class:f([[o(l).isValidDate(s.DOB)?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},m(s.DOB?s[t]:"-"),3)):t.includes("DOJ")?(a(),u("p",{key:13,class:f([[o(l).isValidDate(s.DOJ)?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},m(s.DOJ?s[t]:"-"),3)):t.includes("Bank ifsc")?(a(),u("p",{key:14,class:f([[o(l).isValidBankIfsc(s["Bank ifsc"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},m(s["Bank ifsc"]?s["Bank ifsc"].toUpperCase():"-"),3)):t.includes("Official Mail")?(a(),u("p",{key:15,class:f([[o(l).isOfficialMailExists(s["Official Mail"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},m(s["Official Mail"]?s["Official Mail"]:"-"),3)):t.includes("Marital Status")?(a(),u("p",{key:16,class:f([[o(l).isExistsOrNot(o(l).existingMartialStatus,s["Marital Status"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},m(s["Marital Status"]?s["Marital Status"]:"-"),3)):t.includes("Blood Group")?(a(),u("p",{key:17,class:f([[o(l).isExistsOrNot(o(l).existingBloodgroups,s["Blood Group"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},m(s["Blood Group"]?s["Blood Group"]:"-"),3)):t.includes("Department")?(a(),u("p",{key:18,class:f([[o(l).isDepartmentExists(s.Department)?"":"bg-red-100 p-2 rounded-lg"],"font-semibold fs-6"])},m(s.Department?s.Department:"-"),3)):(a(),u("p",Ol,m(s[t]?s[t]:"-"),1))]),editor:T(({data:s,field:t})=>[t=="Aadhar"?(a(),h(y,{key:0,modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c,minLength:"12",maxLength:"12",onKeypress:b[0]||(b[0]=c=>o(l).isEnteredNos(c))},null,8,["modelValue","onUpdate:modelValue"])):t=="Gender"?(a(),h(I,{key:1,modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c,options:F.value,optionLabel:"name",optionValue:"name",placeholder:"Select Gender",class:"w-full"},null,8,["modelValue","onUpdate:modelValue","options"])):t=="Pan No"?(a(),h(x,{key:2,id:"serial",mask:"aaaPa9999a",modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c,class:"uppercase"},null,8,["modelValue","onUpdate:modelValue"])):t=="Email"?(a(),h(y,{key:3,modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c},null,8,["modelValue","onUpdate:modelValue"])):t=="Mobile Number"?(a(),h(y,{key:4,modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c,minLength:"10",maxLength:"10",onKeypress:b[1]||(b[1]=c=>o(l).isEnteredNos(c))},null,8,["modelValue","onUpdate:modelValue"])):t=="Legal Entity"?(a(),h(I,{key:5,modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c,options:o(l).legalEntityDropdown,optionLabel:"client_fullname",optionValue:"client_fullname",placeholder:"Select Legal Entity"},null,8,["modelValue","onUpdate:modelValue","options"])):t=="Bank Name"?(a(),h(I,{key:6,modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c,options:o(V).bankList,optionLabel:"bank_name",optionValue:"bank_name",placeholder:"Select Bank Name"},null,8,["modelValue","onUpdate:modelValue","options"])):t=="Marital Status"?(a(),h(I,{key:7,modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c,options:o(V).maritalDetails,optionLabel:"name",optionValue:"name",placeholder:"Select Martial Status"},null,8,["modelValue","onUpdate:modelValue","options"])):t=="Blood Group"?(a(),h(I,{key:8,modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c,options:o(V).bloodGroups,optionLabel:"name",optionValue:"name",placeholder:"Select Bloodgroup",class:"p-error"},null,8,["modelValue","onUpdate:modelValue","options"])):t=="Department"?(a(),h(I,{key:9,modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c,options:o(V).departmentDetails,optionLabel:"name",optionValue:"name",placeholder:"Select Department",class:"p-error"},null,8,["modelValue","onUpdate:modelValue","options"])):(a(),h(y,{key:10,modelValue:s[t],"onUpdate:modelValue":c=>s[t]=c,readonly:E(t)},null,8,["modelValue","onUpdate:modelValue","readonly"]))]),_:2},1032,["field","header"]))),128))]),_:1},8,["value","rows"])):B("",!0)])],64)}}};const z=A=>(Ye("data-v-81fa2dac"),A=A(),el(),A),wl={class:"h-screen w-full"},Ml={class:"grid grid-cols-12"},Il={class:"px-2 col-span-5"},Pl=z(()=>r("p",{class:"font-bold text-2xl"},"Employee Quick Onboarding",-1)),Bl=z(()=>r("ul",{class:"list-disc p-2 my-3"},[r("li",{class:"font-semibold fs-6"},[C("Download the "),r("a",{href:"/assets//ABSQuickOnboarding.xlsx",class:"font-semibold text-blue-300 cursor-pointer fs-6"},"Sample")]),r("li",{class:"font-semibold fs-6"},"Fill the information in excel template")],-1)),Ul={class:"grid grid-cols-12 divide-x-2 divide-gray-600 border-gray-500 rounded-lg border p-2 mr-3"},Ll=z(()=>r("i",{class:"pi pi-folder px-2",style:{"font-size":"1rem"}},null,-1)),$l={class:"col-span-9 px-4"},Fl=z(()=>r("div",{class:"col-span-7"},[r("div",{class:"col-form-label"},[r("div",{class:"py-2 font-semibold bg-red-100 rounded-lg f-12 alert-warning fs-6"},[r("i",{class:"mx-2 fa fa-warning text-danger"}),C(" Read these instructions before uploading the file. ")]),r("div",null,[r("ul",{class:"m-4 font-semibold list-disc",style:{}},[r("li",{class:"font-semibold fs-6"}," The fields Employee Number, Employee Name, Email, Date of Joining, and Location must be filled in before adding workers."),r("li",{class:"font-semibold fs-6"}," When adding an employee, you must enter your mobile phone number."),r("li",{class:"font-semibold fs-6"}," To receive all messages, including those about timesheet reminders, leave requests, and attendance requests, your email address must be current. "),r("li",{class:"font-semibold fs-6"}," Each employee's email is different. Therefore, an employee cannot be added to two organisations using the same email."),r("li",{class:"font-semibold fs-6"}," Designation is required because, in cases when two or more workers share the same Name, it will aid in locating them in People Picker search results. ")])])])],-1)),Rl={key:1,class:""},Ql=z(()=>r("h5",{style:{"text-align":"center"}},"Please wait...",-1)),zl={__name:"QuickOnboarding",setup(A){const l=Be(),V=be(),E=i(null),U=()=>{E.value.click()};Xe(()=>{l.getExistingOnboardingDocuments(),V.getBasicDeps()}),Pe(()=>{l.initialUpdate&&(l.currentlyImportedTableEmployeeCodeValues.splice(0,l.currentlyImportedTableEmployeeCodeValues.length),l.currentlyImportedTableAadharValues.splice(0,l.currentlyImportedTableAadharValues.length),l.currentlyImportedTableMobileNumberValues.splice(0,l.currentlyImportedTableMobileNumberValues.length),l.currentlyImportedTableAccNoValues.splice(0,l.currentlyImportedTableAccNoValues.length),l.currentlyImportedTablePanValues.splice(0,l.currentlyImportedTablePanValues.length),l.currentlyImportedTableEmailValues.splice(0,l.currentlyImportedTableEmailValues.length))});const w=Ie();return($,d)=>{const F=S("Toast"),v=S("Column"),b=S("DataTable"),g=S("ProgressSpinner"),M=S("Dialog");return a(),u(X,null,[k(F),o(w).params.module==null?(a(),h(Ae,{key:0,name:"fade"},{default:T(()=>[r("div",wl,[r("div",Ml,[r("div",Il,[Pl,Bl,r("div",Ul,[r("div",{onClick:U,class:"col-span-3 font-semibold fs-6 cursor-pointer w-full",for:"file"},[Ll,C("Browse ")]),r("span",$l,m(o(l).selectedFile?o(l).selectedFile.name:""),1)]),r("input",{ref_key:"fileInput",ref:E,type:"file",name:"",id:"file",hidden:"",onChange:d[0]||(d[0]=y=>o(l).getExcelForUpload(y)),accept:".xls, .xlsx"},null,544),r("button",{class:"float-right mx-5 mt-4 btn btn-orange",onClick:d[1]||(d[1]=y=>o(l).convertExcelIntoArray("quick"))},"Upload")]),Fl]),k(b,{ref:"dt",dataKey:"id",paginator:!0,class:"mt-3",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:T(()=>[k(v,{field:"Employee",header:"Employee's"}),k(v,{field:"Employee code",header:"Month"}),k(v,{field:"Employee code",header:"Date Time"}),k(v,{field:"Employee code",header:"Total Employees Onboarded"}),k(v,{field:"Employee code",header:"Action"})]),_:1},512)])]),_:1})):(a(),u("div",Rl,[k(Al)])),k(Ae,{name:"fade",mode:"out-in"},{default:T(()=>[k(M,{header:"Header",visible:o(l).canShowloading,"onUpdate:visible":d[2]||(d[2]=y=>o(l).canShowloading=y),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:T(()=>[k(g,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:T(()=>[Ql]),_:1},8,["visible"])]),_:1})],64)}}},Gl=nl(zl,[["__scopeId","data-v-81fa2dac"]]);const ls=Ze({history:Ke("/build/"),routes:[{path:"/import/:module",name:"QuickOnboarding",component:Gl}]});export{Gl as Q,Al as _,ls as r,Be as u};
