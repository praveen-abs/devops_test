import{a as r}from"./index-362795f3.js";import{d as le}from"./pinia-503c53ce.js";import{G as l,$ as oe,a1 as m}from"./toastservice.esm-ed3188be.js";const ce=le("salaryAdvanceSettingMainStore",()=>{const o=l(!1);oe("$swal");const M=l(1),F=l(0),b=l(),i=m({department_id:"",designation:"",work_location:"",state:"",client_name:""}),h=l([]),s=m([]),g=l(),E=l(),w=l(),W=l(),O=l(),I=l([]),_=l(),H=async()=>{o.value=!0;let a="/getAllDropdownFilter";await r.get(a).then(e=>{b.value=e.data}).finally(()=>{o.value=!1})},R=(a,e)=>{console.log(e),a=="department"?(console.log(e),i.department_id=e,console.log(i)):a=="designation"?(i.designation=e,console.log(i)):a=="state"?(i.state=e,console.log(i)):a=="work_location"?(i.work_location=e,console.log(i)):a=="client_name"?(i.client_name=e,console.log(i)):console.log("nope");let t="/showAssignEmp";r.post(t,i).then(n=>{_.value=n.data,console.log(n.data)})},$=()=>{o.value=!0;let a="/showAssignEmp";r.post(a,i).then(e=>{_.value=e.data,console.log(e.data)}).finally(()=>{o.value=!1})},B=l(),u=m({SA:"",isSalaryAdvanceEnabled:0,eligibleEmployee:"",perOfSalAdvance:"",cusPerOfSalAdvance:"",deductMethod:"",cusDeductMethod:"",approvalflow:s,selectClientID:"",payroll_cycle:""});function L(){salaryStore.sa.perOfSalAdvance="",salaryStore.sa.SA="",salaryStore.sa.cusPerOfSalAdvance="",salaryStore.sa.deductMethod="",salaryStore.sa.cusDeductMethod="",salaryStore.sa.approvalflow="",salaryStore.sa.selectClientID="",salaryStore.sa=""}const j=l({}),k=l(),q=()=>{o.value=!0,u.perOfSalAdvance=="custom"?u.perOfSalAdvance=u.cusPerOfSalAdvance:console.log("same of percent"),u.deductMethod=="afterPayroll"?u.deductMethod=u.cusDeductMethod:console.log("same of percent");let a="/saveSalaryAdvanceSetting";F.value=="1"&&console.log("salary Advance Disabled"),console.log("salary Advance Enabled"),u.isSalaryAdvanceEnabled=1,r.post(a,u).then(e=>{W.value=e.data,e.data.data,e.data.status=="success"?Swal.fire({title:e.data.status="success",text:e.data.message,icon:"success"}).then(t=>{L(),M=1}):e.data.status=="failure"&&Swal.fire({title:e.data.status="failure",text:e.data.message,icon:"error",showCancelButton:!1}).then(t=>{M.value=1})}).finally(()=>{o.value=!1,s.splice(0,s.length)}),console.log(u)},D=a=>{let e=[{heading:"All",Message:"This Setting Name Already Exist For Another Settings in All Please Change The Setting Name",record_id:1},{heading:"Brand Avatar",Message:"This Setting Name Already Exist For Another Settings in Brand Avatar Please Change The Setting Name",record_id:2},{heading:"Avatar Live",Message:"This Setting Name Already Exist For Another Settings in Avatar Live Please Change The Setting Name",record_id:14}],t=[];e.forEach(n=>{let d=`${n.heading} - ${n.Message}`;t.push(d),console.log(d)}),t.forEach(n=>{console.log(n)}),console.log(t),a.status=="success"?Swal.fire({title:"Success",text:t.forEach(n=>n),icon:"success"}).then(n=>{}):a.status=="failure"&&Swal.fire({title:a.status="failure",text:t,icon:"error",showCancelButton:!1}).then(n=>{})},x=l(1),G=l(),U=l(1),c=m({name:"",isInterestFreeLoanIsEnabled:0,selectClientID:"",minEligibile:"",availPerInCtc:"",deductMethod:"",precent_Or_Amt:"",deductMethod:"",max_loan_limit:"",cusDeductMethod:"",maxTenure:"",approvalflow:s,loan_type:"InterestFreeLoan",selectedOption1:g,selectedOption2:"",selectedOption3:""}),T=l(),z=()=>{o.value=!0,c.deductMethod=="emi"?c.deductMethod=c.cusDeductMethod:console.log("same of percent"),x.value=="1"?console.log("disabled"):(console.log(c),c.isInterestFreeLoanIsEnabled=1),c.precent_Or_Amt=="fixed"?c.availPerInCtc="":c.precent_Or_Amt=="percnt"&&(c.max_loan_limit="");let a="/save-int-and-int-free-loan-settings";r.post(a,c).then(e=>{e.data.message.forEach(t=>{let n=`${t.heading} - ${t.Message}`;I.value.push(n)})}).finally(()=>{o.value=!1,O.value=!0,s.splice(0,s.length)})};async function J(a){o.value=!0;let e=a;await r.post("/get-clients-for-loan-adv",{status:e}).then(t=>{T.value=t.data,h.value=[],t.data.forEach(n=>{n.status==1&&h.value.push(n.id)})}).finally(()=>{o.value=!1})}async function K(a){let e=a,t="/change-client-id-sts-for-loan";await r.post(t,{client_status:h.value,loanType:e}).then(n=>{})}const P=l(1),Q=l(1),A=m({tdl:"",deductMethod:"",sumbitWithIn:"",isDeductedInsubsequentpayroll:"",claimBill:"",approvalflow:s}),V=()=>{o.value=!0,P.value=="1"?console.log("disabled"):console.log(A);let a="/saveTravelAdvanceSettings";r.post(a,A).then(e=>{D(e.data)}).finally(()=>{o.value=!1,s.splice(0,s.length)})},S=l(),p=m({name:"",LoanWithInterestFeature:"",selectClientID:"",minEligibile:"",availPerInCtc:"",deductMethod:"",precent_Or_Amt:"",deductMethod:"",max_loan_limit:"",cusDeductMethod:"",maxTenure:"",loan_amt_interest:"",loan_type:"LoanWithInterest",approvalflow:s,selectedOption1:g}),X=()=>{o.value=!0,S.value=="1"?(console.log("disabled"),p.LoanWithInterestFeature=1):console.log(A),p.precent_Or_Amt=="fixed"?p.availPerInCtc="":p.precent_Or_Amt=="percnt"&&(p.max_loan_limit=""),p.deductMethod=="emi"?p.deductMethod=p.cusDeductMethod:console.log("same of percent");let a="/save-int-and-int-free-loan-settings";r.post(a,p).then(e=>{e.data.message.forEach(t=>{let n=`${t.heading} - ${t.Message}`;I.value.push(n)})}).finally(()=>{O.value=!0,o.value=!1,s.splice(0,s.length)})},Y=()=>{i.client_name="",i.department_id="",i.designation="",i.state="",i.work_location="";let a="/showAssignEmp";r.post(a,i).then(e=>{_.value=e.data,console.log(e.data)})},Z=(a,e)=>{if(console.log(e),a==1){N.value=1,g.value=e.name;let n="";e.name=="Line Manager"?n={approver:"l1_manager_code",order:a,name:"Line Manager"}:e.name=="HR"?n={approver:"hr_user_id",order:a,name:"HR"}:e.name=="Finance Admin"&&(n={approver:"fa_user_id",order:a,name:"Finance Admin"}),s.push(n)}if(a==2){E.value=e.name;let n="";e.name=="Line Manager"?n={approver:"l1_manager_code",order:a,name:"Line Manager"}:e.name=="HR"?n={approver:"hr_user_id",order:a,name:"HR"}:e.name=="Finance Admin"&&(n={approver:"fa_user_id",order:a,name:"Finance Admin"}),s.push(n)}if(a==3){w.value=e.name;let n="";e.name=="Line Manager"?n={approver:"l1_manager_code",order:a,name:"Line Manager"}:e.name=="HR"?n={approver:"hr_user_id",order:a,name:"HR"}:e.name=="Finance Admin"&&(n={approver:"fa_user_id",order:a,name:"Finance Admin"}),s.push(n)}else console.log("No More Options");if(a==4){console.log(e);var t=y.value.filter(function(f){return f.name==e});console.log(t);let d={name:t[0].name,val:t[0].val};console.log(d),v.value.push(d),g.value="",s.pop()}if(a==5){console.log(e);var t=y.value.filter(function(f){return f.name==e});console.log(t);let d={name:t[0].name,val:t[0].val};console.log(d),v.value.push(d),E.value="",s.pop()}if(a==6){console.log(e);var t=y.value.filter(function(f){return f.name==e});console.log(t);let d={name:t[0].name,val:t[0].val};console.log(d),v.value.push(d),w.value="",s.pop()}var t=v.value.filter(function(n){return n.val!==e.val});v.value=t},y=l([{name:"Line Manager",val:1},{name:"HR",val:2},{name:"Finance Admin",val:3}]),v=l([{name:"Line Manager",val:1},{name:"HR",val:2},{name:"Finance Admin",val:3}]),N=l(0),ee=l(0),ae=l(0),te=async a=>{o.value=!0;let e=a;await r.post("/loan-and-salAdv-current-status",{Status:e}).then(t=>{e==="sal_adv"?(F.value=t.data.status,o.value=!1):(e==="int_free_loan"||e==="loan_with_int")&&(S.value=t.data.status,o.value=!1)}).finally(()=>{o.value=!1})},C=l();async function ne(){await r.get("/settingDetails").then(a=>{C.value=a.data,console.log(C.value)})}return{dropdownFilter:b,getDropdownFilterDetails:H,getSelectoption:R,getElibigleEmployees:$,eligbleEmployeeSource:_,resetFilters:Y,canShowLoading:o,canShowPopup:O,AssignedClients:I,approvalFormat:s,selectedOption1:g,selectedOption2:E,selectedOption3:w,option:N,option1:ee,option2:ae,dropdownlist:y,filteredApprovalFlow:v,toSelectoption:Z,isSalaryAdvanceFeatureEnabled:F,eligibleSalaryAdvanceEmployeeData:B,sa:u,SalaryAdvanceFeatureApprovalFlow:j,saveSalaryAdvanceFeature:q,create_new_from:M,getCurrentStatus:te,client_name_status:h,sendClient_code:K,salaryAdvanceHistory:ne,salaryAdvanceSettingsDetails:C,isInterestFreeLoaneature:x,ifl:c,saveInterestfreeLoan:z,deduction_starting_months:G,getClientsName:J,ClientsName:T,createIflNewFrom:U,isTravelAdvanceFeatureEnabled:P,eligibleTravelAdvanceEmployeeData:Q,ta:A,saveTravelAdvance:V,isLoanWithInterestFeature:S,lwif:p,saveLoanWithInterest:X,blink_UI:k,swalFunction:D,reset:L}});export{ce as s};