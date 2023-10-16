import{a as Be}from"./index-362795f3.js";import{q as Je,u as Ie,r as a,y as Ke,a as We,b as Xe,c as P,d as Ye,e as r,f as u,g as f,i as D,t as d,h as n,n as Te,l as L,F as me,m as Ue,k as g,p as b,w as B,j as A}from"./app-fb0093c1.js";import{S as el}from"./Service-da5c2051.js";import{r as ll,u as q}from"./xlsx-4ad528ac.js";import{u as we}from"./NormalOnboardingMainStore-29cf9494.js";import"./dayjs.min-2f06af28.js";const sl=Je("useOnboardingMainStore",()=>{el(),we();const Z=Ie(),s=a(!1),h=Ke(),x=a(),F=a(),J=a(),M=a(),R=a([]),m=a([]),S=a(!1),v=a(!1),k=a(),E=a(),_=e=>{M.value=e.target.files[0]},C=e=>{if(k.value=e,console.log(e),M.value){var o=M.value;if(!o)return;var c=new FileReader;c.onload=function(O){const qe=c.result;var z=ll(qe,{type:"binary",cellDates:!0,dateNF:"dd-mm-yyyy"}),Ae=z.Sheets[z.SheetNames[0]];let T=[],Me=[];const U={},ce=q.decode_range(Ae["!ref"]);let V;const Ze=ce.s.r;for(V=ce.s.c;V<=ce.e.c;++V){const N=Ae[q.encode_cell({c:V,r:Ze})];let w="UNKNOWN "+V;N&&N.t&&(w=q.format_cell(N)),U[V]=w,T.push(U[V]);let de={title:U[V],value:U[V]};U[V].includes("UNKNOWN")||Me.push(de)}F.value=Me,J.value=T,console.log(T),s.value=!0,setTimeout(()=>{e=="quick"?Oe(T,ve.value)?(E.value="quick",Z.push({path:"/import/quickOnboarding"}),s.value=!1):(s.value=!1,h.add({severity:"error",summary:"Fields are not matched",detail:"fill",life:2e3})):e=="bulk"&&(E.value="bulk",Oe(T,ke.value)?(Z.push({path:"/import/bulkOnboarding"}),s.value=!1):(s.value=!1,h.add({severity:"error",summary:"Fields are not matched",detail:"fill",life:2e3})))},1e3);const I=z.SheetNames.reduce((N,w)=>{const de=z.Sheets[w];return N[w]=q.sheet_to_json(de,{raw:!1,dateNF:"dd-mm-yyyy"}),N},{}),j=Object.keys(I)[0];I[j]?x.value=I[j]:x.value=[],x.value&&pe(x.value),R.value.push(x.value);for(let N=0;N<I[j].length;N++)console.log("jsonData['Sheet1'].length :",I[j].length),Se(x.value[N])},c.readAsArrayBuffer(o)}else h.add({severity:"error",summary:"file missing!",detail:"selected",life:2e3})},K=e=>{let o="";E.value=="quick"?o="/onboarding/storeQuickOnboardEmployees":E.value=="bulk"&&(o="/onboarding/storeBulkOnboardEmployees"),m.value==0?(s.value=!0,Be.post(o,e).then(c=>{s.value=!1,c.data.status=="failure"?h.add({severity:"error",summary:"failure",detail:`${c.data.message}`,life:3e3}):c.data.status=="success"&&(c.data.data.forEach(O=>{h.add({severity:"success",summary:`${O.Employee_Name}`,detail:`${O.message}`,life:3e3})}),setTimeout(()=>{window.location.replace(window.location.origin+"/manageEmployees")},4e3))}).finally(()=>{})):h.add({severity:"error",summary:"Failure!",detail:"Clear error fields",life:3e3})};function p(e){return e.filter((o,c)=>e.indexOf(o)!==c)}let y=a([]),l=a([]),t=a([]),i=a([]),W=a([]),X=a([]);const pe=e=>{e.forEach(o=>{y.value.push(o["Employee Code"]),l.value.push(o.Email),t.value.push(o["Mobile Number"]),i.value.push(o["Pan No"]),W.value.push(o.Aadhar),X.value.push(o["Account No"])})},Pe=(e,o)=>!!p(e).includes(o),be=a(),$=a(),Y=a(),ee=a(),le=a(),H=a(),se=a(),fe=a(),ye=a(),ge=a(),he=a(),te=a(),Q=a(),oe=a([]),ve=a(),ke=a(),Le=()=>{Be.get("/onboarding/getEmployeeMandatoryDetails").then(e=>{Object.values(e.data).forEach(o=>{be.value=o.client_code,$.value=o.user_code,ee.value=o.mobile_number,Y.value=o.email,le.value=o.pan_number,H.value=o.aadhar_number,se.value=o.bankaccount_number,fe.value=o.bank_name,ye.value=o.department_name,ge.value=o.official_mail,he.value=o.employees_blood_group,te.value=o.employees_marital_status,Q.value=o.client_details,Q.value&&Q.value.forEach(c=>{oe.value.push(c.client_fullname)}),ve.value=o.quick_onboard_column_data,ke.value=o.bulk_onboard_column_data})})},Fe=e=>!/^[ A-Za-z_ ]+$/.test(e),Re=e=>!(/^[A-Za-z0-9]+$/.test(e)&&!$.value.includes(e));function $e(e,o){const c=o.split(/(?=\d)/);return!!Object.values(e).includes(c[0])}const ne=e=>e?!$.value.includes(e):!0,He=e=>!/^[0-9]+$/.test(e),re=e=>e?!(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(e.trim())&&!Y.value.includes(e.trim())):!1,ae=e=>{const o=Ee(e);return e?!(/^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/.test(o)&&!H.value.includes(o)):!1};function Ee(e){const o=String(e),c=[];for(let O=0;O<o.length;O+=4)c.push(o.substr(O,4));return c.join(" ")}const Qe=e=>!!H.value.includes(e),_e=e=>{let o="";return e&&(o=e.toUpperCase()),e?!(/^([a-zA-Z]){3}([Pp]){1}([a-zA-Z]){1}([0-9]){4}([a-zA-Z]){1}?$/.test(o.trim())&&le.value.includes(o.trim())):!0},Ve=e=>e?!!se.value.includes(e.trim()):!1,Ne=e=>{let o="";return e&&(o=e.toUpperCase()),e?!/^[A-Za-z]{4}0[A-Za-z0-9]{6}$/.test(o.trim()):!1},G=e=>e?!/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}$/.test(e):!0,ie=e=>e?!(/^[0-9]{10,10}$/.test(e.trim())&&!ee.value.includes(e.trim())):!1,ue=(e,o)=>o?!e.includes(o):!1,Ge=e=>{let o=String.fromCharCode(e.keyCode);if(/^[0-9]+$/.test(o))return!0;e.preventDefault()},ze=e=>{let o=String.fromCharCode(e.keyCode);if(/^[A-Za-z_ ]+$/.test(o))return!0;e.preventDefault()},xe=e=>{let o=String.fromCharCode(e.keyCode);if(/^[A-Za-z0-9]+$/.test(o))return!0;e.preventDefault()},Ce=e=>{if(e){let o="";e&&e.toUpperCase();let c=o.trim();return!!fe.value.includes(c)}else return!0},De=e=>e?!!ye.value.includes(e):!0,je=e=>!!ge.value.includes(e),Se=e=>{console.log(k.value);let o=[];return k.value=="quick"?(p(y.value).includes(e["Employee Code"])||!ne(e["Employee Code"])||p(l.value).includes(e.Email)||re(e.Email)||G(e.DOJ)||p(t.value).includes(e["Mobile Number"])||ie(e["Mobile Number"]))&&m.value.push("invalid"):k.value=="bulk"?p(y.value).includes(e["Employee Code"])||!ne(e["Employee Code"])||ue(oe.value,e["Legal Entity"])||p(l.value).includes(e.Email)||re(e.Email)||G(e.DOJ)||G(e.DOB)||p(i.value).includes(e["Pan No"])||!_e(e["Pan No"])?m.value.push("invalid"):p(W.value).includes(e.Aadhar)||ae(e.Aadhar)?(console.log(ae(e.Aadhar)),m.value.push("invalid")):p(t.value).includes(e["Mobile Number"])||ie(e["Mobile Number"])||Ce(e["Bank Name"])||ue(te.value,e["Marital Status"])||Ne(e["Bank ifsc"])||p(X.value).includes(e["Account No"])||Ve(e["Account No"])?m.value.push("invalid"):De(e.Department)||m.value.push("invalid"):console.log("No more error record found!"),o};function Oe(e,o){if(console.log(e,o),e.length!==o.length)return console.log("length is not equal"),!1;for(let c=0;c<e.length;c++)if(e[c]!==o[c])return console.log("not matched"),!1;return!0}return{getCurrentlyImportedTableDuplicateEntries:pe,currentlyImportedTableEmployeeCodeValues:y,findCurrentTableDups:Pe,uploadOnboardingFile:K,type:E,currentlyImportedTableAadharValues:W,currentlyImportedTablePanValues:i,currentlyImportedTableAccNoValues:X,currentlyImportedTableEmailValues:l,currentlyImportedTableMobileNumberValues:t,getExistingOnboardingDocuments:Le,existingUserCode:$,existingEmails:Y,existingMobileNumbers:ee,existingAadharCards:H,existingPanCards:le,existingBankAccountNumbers:se,initialUpdate:S,isValueUpdated:v,existingMartialStatus:te,existingBloodgroups:he,existingClientCode:be,existingLegalEntity:oe,legalEntityDropdown:Q,isLetter:Fe,isEmail:re,isNumber:He,isEnterLetter:ze,isEnterSpecialChars:xe,isEnterSpecialChars:xe,isValidAadhar:ae,isValidBankAccountNo:Ve,isValidBankIfsc:Ne,isSpecialChars:Re,isValidDate:G,isValidMobileNumber:ie,isValidPancard:_e,isEnteredNos:Ge,totalRecordsCount:R,errorRecordsCount:m,selectedFile:M,isUserExists:ne,isBankExists:Ce,isDepartmentExists:De,isOfficialMailExists:je,isAadharExists:Qe,isExistsOrNot:ue,isClientCodeExists:$e,splitNumberWithSpaces:Ee,convertExcelIntoArray:C,EmployeeQuickOnboardingDynamicHeader:F,EmployeeQuickOnboardingSource:x,getValidationMessages:Se,getExcelForUpload:_,canShowloading:s}}),tl={class:"grid w-10/12 grid-cols-3 mx-auto my-2 place-content-center"},ol={class:"p-2 mx-6 font-semibold text-black bg-white rounded-lg fs-6"},nl={class:"font-bold"},rl={class:"p-2 mx-6 font-semibold text-black bg-green-100 rounded-lg fs-6"},al={class:"font-bold"},il={class:"p-2 mx-6 font-semibold text-black bg-red-100 rounded-lg fs-6"},ul={class:"font-bold"},cl={class:"py-5"},dl=f("p",{class:"font-semibold fs-6"},"Sample format:",-1),ml={class:"table-responsive"},pl={class:"table-responsive"},bl=f("p",{class:"font-semibold fs-6"},"Original data:",-1),fl={class:"font-semibold fs-6"},yl={key:0,class:"mx-2 cursor-pointer fa fa-exclamation-circle text-warning","aria-hidden":"true"},gl={class:"font-semibold fs-6"},hl={key:0,class:"mx-2 cursor-pointer fa fa-exclamation-circle text-warning","aria-hidden":"true"},vl={key:0,class:"cursor-pointer fa fa-exclamation-circle text-warning","aria-hidden":"true"},kl={class:"px-2 font-semibold fs-6 py-auto"},El={key:0,class:"cursor-pointer fa fa-exclamation-circle text-warning","aria-hidden":"true"},_l={key:0,class:"cursor-pointer fa fa-exclamation-circle text-warning","aria-hidden":"true"},Vl={key:0,class:"cursor-pointer fa fa-exclamation-circle text-warning","aria-hidden":"true"},Nl={key:9,class:"font-semibold fs-6"},xl={key:10,class:"font-semibold fs-6"},Cl={key:11,class:"font-semibold fs-6"},Dl={key:19,class:"font-semibold fs-6"},Ul={__name:"ImportQuickOnboarding",setup(Z){Ie(),We();const s=sl(),h=we(),x=S=>!!["Basic","HRA","Statutory Bonus","Child Education Allowance","Food Coupon","LTA"].includes(S);Xe(()=>{s.isValueUpdated&&(s.currentlyImportedTableEmployeeCodeValues.splice(0,s.currentlyImportedTableEmployeeCodeValues.length),s.currentlyImportedTableAadharValues.splice(0,s.currentlyImportedTableAadharValues.length),s.currentlyImportedTableAccNoValues.splice(0,s.currentlyImportedTableAccNoValues.length),s.currentlyImportedTablePanValues.splice(0,s.currentlyImportedTablePanValues.length),s.currentlyImportedTableEmailValues.splice(0,s.currentlyImportedTableEmailValues.length),s.currentlyImportedTableMobileNumberValues.splice(0,s.currentlyImportedTableMobileNumberValues.length),setTimeout(()=>{s.getCurrentlyImportedTableDuplicateEntries(s.EmployeeQuickOnboardingSource)},100))});const F=a(!0),J=S=>{s.initialUpdate=!0,setTimeout(()=>{F.value=!1,console.log("functionkilled")},30),s.errorRecordsCount.splice(0,s.errorRecordsCount.length);let{data:v,newValue:k,field:E}=S;k?s.isValueUpdated=!0:isValueUpdated=!1,k.trim().length>0?v[E]=k:S.preventDefault();for(let _=0;_<s.EmployeeQuickOnboardingSource.length;_++)s.getValidationMessages(s.EmployeeQuickOnboardingSource[_])},M=a([{"Employee Code":"ABS01","Employee Name":"Vishu","Date Of Birth (dd-mm-yyyy)":"23-09-2001","Date of Joined (dd-mm-yyyy)":"23-09-2023","Mobile Number":"9898989898","Aadhaar Number":"2222 3333 4444","Personal Email":"abs@gmail.com","Pan Number":"AJUPA0900H",Gender:"Male","Marital Status":"Married","Reporting Manager":"Pradessh",Designation:"Developer",Department:"IT",Location:"Chennai","Father Name":"Simma","Physically Handicapped":"No"}]),R=[{title:"Employee Code"},{title:"Employee Name"},{title:"Date Of Birth (dd-mm-yyyy)"},{title:"Date of Joined (dd-mm-yyyy)"},{title:"Mobile Number"},{title:"Aadhaar Number"},{title:"Personal Email"},{title:"Pan Number"},{title:"Gender"},{title:"Marital Status"},{title:"Reporting Manager"},{title:"Designation"},{title:"Department"},{title:"Location"},{title:"Father Name"},{title:"Physically Handicapped"}],m=a([{name:"Male",value:"Male"},{name:"Female",value:"Female"},{name:"Others",value:"Others"}]);return(S,v)=>{const k=P("Column"),E=P("DataTable"),_=P("InputText"),C=P("Dropdown"),K=P("InputMask"),p=Ye("tooltip");return r(),u(me,null,[f("div",tl,[f("div",ol,[D("Total Records : "),f("span",nl,d(n(s).totalRecordsCount.length?n(s).totalRecordsCount[0].length:0),1)]),f("div",rl,[D("Processed Records : "),f("span",al,d(n(s).totalRecordsCount.length?n(s).totalRecordsCount[0].length-n(s).errorRecordsCount.length:0),1)]),f("div",il,[D("Error Records : "),f("span",ul,d(n(s).errorRecordsCount.length),1)])]),f("div",cl,[dl,f("div",ml,[Te(E,{class:"my-4",value:M.value,tableStyle:"min-width: 50rem",responsiveLayout:"scroll"},{default:L(()=>[(r(),u(me,null,Ue(R,y=>Te(k,{key:y.title,field:y.title,style:{"min-width":"12rem"},header:y.title},null,8,["field","header"])),64))]),_:1},8,["value"])])]),f("div",pl,[bl,n(s).EmployeeQuickOnboardingSource?(r(),g(E,{key:0,class:"py-4",value:n(s).EmployeeQuickOnboardingSource,tableStyle:"min-width: 50rem",responsiveLayout:"scroll",editMode:"cell",onCellEditComplete:J,stateStorage:"session",stateKey:"dt-state-demo-session",rows:n(s).EmployeeQuickOnboardingSource.length},{footer:L(()=>[f("button",{class:"flex justify-center mx-auto btn btn-orange",onClick:v[2]||(v[2]=y=>n(s).uploadOnboardingFile(n(s).EmployeeQuickOnboardingSource))},"Upload")]),default:L(()=>[(r(!0),u(me,null,Ue(n(s).EmployeeQuickOnboardingDynamicHeader,y=>(r(),g(k,{key:y.title,field:y.title,style:{"min-width":"12rem"},header:y.title},{body:L(({data:l,field:t})=>[t.includes("Employee Code")?(r(),u("div",{key:0,class:b([n(s).findCurrentTableDups(n(s).currentlyImportedTableEmployeeCodeValues,l["Employee Code"])||!n(s).isUserExists(l["Employee Code"])?"bg-red-100 p-2 rounded-lg":""])},[f("p",fl,[n(s).isUserExists(l["Employee Code"])?A("",!0):B((r(),u("i",yl,null,512)),[[p,"User code is already exists",void 0,{right:!0}]]),D(" "+d(l["Employee Code"]?l["Employee Code"]:"-"),1)])],2)):t.includes("Legal Entity")?(r(),u("div",{key:1,class:b([n(s).isExistsOrNot(n(s).existingLegalEntity,l["Legal Entity"])?"bg-red-100 p-2 rounded-lg":""])},[f("p",gl,d(l["Legal Entity"]?l["Legal Entity"]:"-"),1)],2)):t.includes("Aadhar")?(r(),u("p",{key:2,class:b([[n(s).findCurrentTableDups(n(s).currentlyImportedTableAadharValues,l.Aadhar)||n(s).isValidAadhar(l.Aadhar)?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},[n(s).isAadharExists(l.Aadhar)?B((r(),u("i",hl,null,512)),[[p,"Aadhar number is already exists",void 0,{right:!0}]]):A("",!0),D(" "+d(n(s).splitNumberWithSpaces(l.Aadhar)),1)],2)):t.includes("Employee Name")?(r(),u("p",{key:3,class:b([[n(s).isLetter(l["Employee Name"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},d(l["Employee Name"]?l["Employee Name"]:"-"),3)):t.includes("Email")?(r(),u("p",{key:4,class:b([[n(s).findCurrentTableDups(n(s).currentlyImportedTableEmailValues,l.Email)||n(s).isEmail(l.Email)?"bg-red-100 p-2 rounded-lg":""],"flex items-center font-semibold fs-6"])},[n(s).existingEmails.includes(l.Email)?B((r(),u("i",vl,null,512)),[[p,"Email is already exists",void 0,{right:!0}]]):A("",!0),f("span",kl,d(l.Email?l.Email:"-"),1)],2)):t.includes("Mobile Number")?(r(),u("p",{key:5,class:b([[n(s).findCurrentTableDups(n(s).currentlyImportedTableMobileNumberValues,l[t])||n(s).existingMobileNumbers.includes(l[t])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},[n(s).existingMobileNumbers.includes(l[t])?B((r(),u("i",El,null,512)),[[p,"Mobile number is already exists",void 0,{right:!0}]]):A("",!0),D(" "+d(l["Mobile Number"]?l["Mobile Number"]:"-"),1)],2)):t.includes("Account No")?(r(),u("p",{key:6,class:b([[n(s).findCurrentTableDups(n(s).currentlyImportedTableAccNoValues,l["Account No"])||n(s).isValidBankAccountNo(l["Account No"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},[n(s).existingMobileNumbers.includes(l[t])?B((r(),u("i",_l,null,512)),[[p,"Account number is already exists",void 0,{right:!0}]]):A("",!0),D(" "+d(l["Account No"]?l["Account No"]:"-"),1)],2)):t.includes("Bank Name")?(r(),u("p",{key:7,class:b([[n(s).isBankExists(l["Bank Name"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},d(l["Bank Name"]?l["Bank Name"]:"-"),3)):t.includes("Pan No")?(r(),u("p",{key:8,class:b([[n(s).findCurrentTableDups(n(s).currentlyImportedTablePanValues,l["Pan No"])||!n(s).isValidPancard(l["Pan No"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},[n(s).isValidPancard(l["Pan No"])?A("",!0):B((r(),u("i",Vl,null,512)),[[p,"Pan number is already exists",void 0,{right:!0}]]),D(" "+d(l["Pan No"]?l["Pan No"].toUpperCase():"-"),1)],2)):t.includes("Father DOB")?(r(),u("p",Nl,d(l[t]?l[t]:"-"),1)):t.includes("Mother DOB")?(r(),u("p",xl,d(l[t]?l[t]:"-"),1)):t.includes("Spouse DOB")?(r(),u("p",Cl,d(l[t]?l[t]:"-"),1)):t.includes("DOB")?(r(),u("p",{key:12,class:b([[n(s).isValidDate(l.DOB)?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},d(l.DOB?l[t]:"-"),3)):t.includes("DOJ")?(r(),u("p",{key:13,class:b([[n(s).isValidDate(l.DOJ)?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},d(l.DOJ?l[t]:"-"),3)):t.includes("Bank ifsc")?(r(),u("p",{key:14,class:b([[n(s).isValidBankIfsc(l["Bank ifsc"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},d(l["Bank ifsc"]?l["Bank ifsc"].toUpperCase():"-"),3)):t.includes("Official Mail")?(r(),u("p",{key:15,class:b([[n(s).isOfficialMailExists(l["Official Mail"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},d(l["Official Mail"]?l["Official Mail"]:"-"),3)):t.includes("Marital Status")?(r(),u("p",{key:16,class:b([[n(s).isExistsOrNot(n(s).existingMartialStatus,l["Marital Status"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},d(l["Marital Status"]?l["Marital Status"]:"-"),3)):t.includes("Blood Group")?(r(),u("p",{key:17,class:b([[n(s).isExistsOrNot(n(s).existingBloodgroups,l["Blood Group"])?"bg-red-100 p-2 rounded-lg":""],"font-semibold fs-6"])},d(l["Blood Group"]?l["Blood Group"]:"-"),3)):t.includes("Department")?(r(),u("p",{key:18,class:b([[n(s).isDepartmentExists(l.Department)?"":"bg-red-100 p-2 rounded-lg"],"font-semibold fs-6"])},d(l.Department?l.Department:"-"),3)):(r(),u("p",Dl,d(l[t]?l[t]:"-"),1))]),editor:L(({data:l,field:t})=>[t=="Aadhar"?(r(),g(_,{key:0,modelValue:l[t],"onUpdate:modelValue":i=>l[t]=i,minLength:"12",maxLength:"12",onKeypress:v[0]||(v[0]=i=>n(s).isEnteredNos(i))},null,8,["modelValue","onUpdate:modelValue"])):t=="Gender"?(r(),g(C,{key:1,modelValue:l[t],"onUpdate:modelValue":i=>l[t]=i,options:m.value,optionLabel:"name",optionValue:"name",placeholder:"Select Gender",class:"w-full"},null,8,["modelValue","onUpdate:modelValue","options"])):t=="Pan No"?(r(),g(K,{key:2,id:"serial",mask:"aaaPa9999a",modelValue:l[t],"onUpdate:modelValue":i=>l[t]=i,class:"uppercase"},null,8,["modelValue","onUpdate:modelValue"])):t=="Email"?(r(),g(_,{key:3,modelValue:l[t],"onUpdate:modelValue":i=>l[t]=i},null,8,["modelValue","onUpdate:modelValue"])):t=="Mobile Number"?(r(),g(_,{key:4,modelValue:l[t],"onUpdate:modelValue":i=>l[t]=i,minLength:"10",maxLength:"10",onKeypress:v[1]||(v[1]=i=>n(s).isEnteredNos(i))},null,8,["modelValue","onUpdate:modelValue"])):t=="Legal Entity"?(r(),g(C,{key:5,modelValue:l[t],"onUpdate:modelValue":i=>l[t]=i,options:n(s).legalEntityDropdown,optionLabel:"client_fullname",optionValue:"client_fullname",placeholder:"Select Legal Entity"},null,8,["modelValue","onUpdate:modelValue","options"])):t=="Bank Name"?(r(),g(C,{key:6,modelValue:l[t],"onUpdate:modelValue":i=>l[t]=i,options:n(h).bankList,optionLabel:"bank_name",optionValue:"bank_name",placeholder:"Select Bank Name"},null,8,["modelValue","onUpdate:modelValue","options"])):t=="Marital Status"?(r(),g(C,{key:7,modelValue:l[t],"onUpdate:modelValue":i=>l[t]=i,options:n(h).maritalDetails,optionLabel:"name",optionValue:"name",placeholder:"Select Martial Status"},null,8,["modelValue","onUpdate:modelValue","options"])):t=="Blood Group"?(r(),g(C,{key:8,modelValue:l[t],"onUpdate:modelValue":i=>l[t]=i,options:n(h).bloodGroups,optionLabel:"name",optionValue:"name",placeholder:"Select Bloodgroup",class:"p-error"},null,8,["modelValue","onUpdate:modelValue","options"])):t=="Department"?(r(),g(C,{key:9,modelValue:l[t],"onUpdate:modelValue":i=>l[t]=i,options:n(h).departmentDetails,optionLabel:"name",optionValue:"name",placeholder:"Select Department",class:"p-error"},null,8,["modelValue","onUpdate:modelValue","options"])):(r(),g(_,{key:10,modelValue:l[t],"onUpdate:modelValue":i=>l[t]=i,readonly:x(t)},null,8,["modelValue","onUpdate:modelValue","readonly"]))]),_:2},1032,["field","header"]))),128))]),_:1},8,["value","rows"])):A("",!0)])],64)}}};export{Ul as _,sl as u};