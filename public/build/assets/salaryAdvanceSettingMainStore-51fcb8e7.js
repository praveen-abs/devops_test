import{a as u}from"./index-362795f3.js";import{d as ve}from"./pinia-61b2fb76.js";import{$ as l,a6 as me,a2 as h}from"./toastservice.esm-5497698c.js";const _e=ve("salaryAdvanceSettingMainStore",()=>{const d=l(!1);me("$swal");const _=l(1),I=l(0),T=l(),c=h({department_id:"",designation:"",work_location:"",state:"",client_name:""}),S=l([]),r=h([]),v=l(),m=l(),g=l(),U=l(),O=l(),w=l([]),b=l(1),L=l(1),M=l(""),A=l(),W=l(),z=async()=>{d.value=!0;let t="/getAllDropdownFilter";await u.get(t).then(e=>{T.value=e.data}).finally(()=>{d.value=!1})},G=(t,e)=>{console.log(e),t=="department"?(console.log(e),c.department_id=e,console.log(c)):t=="designation"?(c.designation=e,console.log(c)):t=="state"?(c.state=e,console.log(c)):t=="work_location"?(c.work_location=e,console.log(c)):t=="client_name"?(c.client_name=e,console.log(c)):console.log("nope");let a="/showAssignEmp";u.post(a,c).then(n=>{A.value=n.data,console.log(n.data)})},J=()=>{d.value=!0;let t="/showAssignEmp";u.post(t,c).then(e=>{A.value=e.data,console.log(e.data)}).finally(()=>{d.value=!1})},K=l(),i=h({SA:"",isSalaryAdvanceEnabled:0,eligibleEmployee:"",perOfSalAdvance:"",cusPerOfSalAdvance:"",deductMethod:"",cusDeductMethod:"",approvalflow:r,selectClientID:"",payroll_cycle:""});function C(){i.SA="",i.isSalaryAdvanceEnabled="",i.eligibleEmployee="",i.perOfSalAdvance="",i.cusPerOfSalAdvance="",i.deductMethod="",i.cusDeductMethod="",i.approvalflow="",i.selectClientID="",i.payroll_cycle="",o.approvalflow="",o.selectedOption1="",o.selectedOption2="",o.selectedOption3="",v.value="",m.value="",g.value="",M.value="",B.value="",A.value="",W.value=""}i.eligibleEmployee||console.log("testing simma :",i.eligibleEmployee);const Q=l({}),V=l(),X=()=>{d.value=!0,i.perOfSalAdvance=="custom"?i.perOfSalAdvance=i.cusPerOfSalAdvance:console.log("same of percent"),i.deductMethod=="afterPayroll"?i.deductMethod=i.cusDeductMethod:console.log("same of percent");let t="/saveSalaryAdvanceSetting";I.value=="1"&&console.log("salary Advance Disabled"),console.log("salary Advance Enabled"),i.isSalaryAdvanceEnabled=1,u.post(t,i).then(e=>{U.value=e.data,e.data.data,e.data.status=="success"?Swal.fire({title:e.data.status="success",text:e.data.message,icon:"success"}).then(a=>{C(),_.value=1}):e.data.status=="failure"&&Swal.fire({title:e.data.status="failure",text:e.data.message,icon:"error",showCancelButton:!1}).then(a=>{_.value=1})}).finally(()=>{d.value=!1,r.splice(0,r.length),C()}),console.log(i)},H=t=>{let e=[{heading:"All",Message:"This Setting Name Already Exist For Another Settings in All Please Change The Setting Name",record_id:1},{heading:"Brand Avatar",Message:"This Setting Name Already Exist For Another Settings in Brand Avatar Please Change The Setting Name",record_id:2},{heading:"Avatar Live",Message:"This Setting Name Already Exist For Another Settings in Avatar Live Please Change The Setting Name",record_id:14}],a=[];e.forEach(n=>{let p=`${n.heading} - ${n.Message}`;a.push(p),console.log(p)}),a.forEach(n=>{console.log(n)}),console.log(a),t.status=="success"?Swal.fire({title:"Success",text:a.forEach(n=>n),icon:"success"}).then(n=>{_.value=1,b.value=1,L.value=1}):t.status=="failure"&&Swal.fire({title:t.status="failure",text:a,icon:"error",showCancelButton:!1}).then(n=>{b.value=1,L.value=1,_.value=1})},D=l(1),Y=l(),Z=l(1),o=h({name:"",isInterestFreeLoanIsEnabled:0,selectClientID:"",minEligibile:"",availPerInCtc:"",deductMethod:"",precent_Or_Amt:"",deductMethod:"",max_loan_limit:"",cusDeductMethod:"",maxTenure:"",payroll_cycle:"",approvalflow:r,loan_type:"InterestFreeLoan",selectedOption1:v,selectedOption2:"",selectedOption3:""}),N=l();function R(){o.name="",o.selectClientID="",o.minEligibile="",o.availPerInCtc="",o.deductMethod="",o.precent_Or_Amt="",o.deductMethod="",o.max_loan_limit="",o.cusDeductMethod="",o.maxTenure="",o.payroll_cycle="",o.approvalflow="",o.selectedOption1="",o.selectedOption2="",o.selectedOption3="",v.value="",m.value="",g.value="",M.value=""}const ee=()=>{d.value=!0,o.deductMethod=="emi"?o.deductMethod=o.cusDeductMethod:console.log("same of percent"),D.value=="1"?console.log("disabled"):(console.log(o),o.isInterestFreeLoanIsEnabled=1),o.precent_Or_Amt=="fixed"?o.availPerInCtc="":o.precent_Or_Amt=="percnt"&&(o.max_loan_limit="");let t="/save-int-and-int-free-loan-settings";u.post(t,o).then(e=>{e.data.message.forEach(a=>{let n=`${a.heading} - ${a.Message}`;w.value.push(n)})}).finally(()=>{d.value=!1,O.value=!0,r.splice(0,r.length),R()})};async function te(t){d.value=!0;let e=t;await u.post("/get-clients-for-loan-adv",{status:e}).then(a=>{N.value=a.data,S.value=[],a.data.forEach(n=>{n.status==1&&S.value.push(n.id)})}).finally(()=>{d.value=!1})}async function ae(t){let e=t,a="/change-client-id-sts-for-loan";await u.post(a,{client_status:S.value,loanType:e}).then(n=>{})}const $=l(1),ne=l(1),F=h({tdl:"",deductMethod:"",sumbitWithIn:"",isDeductedInsubsequentpayroll:"",claimBill:"",approvalflow:r}),le=()=>{d.value=!0,$.value=="1"?console.log("disabled"):console.log(F);let t="/saveTravelAdvanceSettings";u.post(t,F).then(e=>{H(e.data)}).finally(()=>{d.value=!1,r.splice(0,r.length)})},x=l(),s=h({name:"",LoanWithInterestFeature:"",selectClientID:"",minEligibile:"",availPerInCtc:"",deductMethod:"",precent_Or_Amt:"",deductMethod:"",max_loan_limit:"",cusDeductMethod:"",maxTenure:"",loan_amt_interest:"",loan_type:"LoanWithInterest",approvalflow:r,selectedOption1:v});function oe(){s.name="",s.selectClientID="",s.minEligibile="",s.availPerInCtc="",s.deductMethod="",s.precent_Or_Amt="",s.deductMethod="",s.max_loan_limit="",s.cusDeductMethod="",s.maxTenure="",s.loan_amt_interest="",s.loan_type="",s.approvalflow="",s.selectedOption1="",v.value="",m.value="",g.value="",M.value=""}const se=()=>{d.value=!0,x.value=="1"?(console.log("disabled"),s.LoanWithInterestFeature=1):console.log(F),s.precent_Or_Amt=="fixed"?s.availPerInCtc="":s.precent_Or_Amt=="percnt"&&(s.max_loan_limit=""),s.deductMethod=="emi"?s.deductMethod=s.cusDeductMethod:console.log("same of percent");let t="/save-int-and-int-free-loan-settings";u.post(t,s).then(e=>{e.data.message.forEach(a=>{let n=`${a.heading} - ${a.Message}`;w.value.push(n)})}).finally(()=>{O.value=!0,d.value=!1,r.splice(0,r.length)})},B=()=>{c.client_name="",c.department_id="",c.designation="",c.state="",c.work_location="";let t="/showAssignEmp";u.post(t,c).then(e=>{A.value=e.data,console.log(e.data)})},ie=(t,e)=>{if(console.log(e),t==1){j.value=1,v.value=e.name;let n="";e.name=="Line Manager"?n={approver:"l1_manager_code",order:t,name:"Line Manager"}:e.name=="HR"?n={approver:"hr_user_id",order:t,name:"HR"}:e.name=="Finance Admin"&&(n={approver:"fa_user_id",order:t,name:"Finance Admin"}),r.push(n)}if(t==2){m.value=e.name;let n="";e.name=="Line Manager"?n={approver:"l1_manager_code",order:t,name:"Line Manager"}:e.name=="HR"?n={approver:"hr_user_id",order:t,name:"HR"}:e.name=="Finance Admin"&&(n={approver:"fa_user_id",order:t,name:"Finance Admin"}),r.push(n)}if(t==3){g.value=e.name;let n="";e.name=="Line Manager"?n={approver:"l1_manager_code",order:t,name:"Line Manager"}:e.name=="HR"?n={approver:"hr_user_id",order:t,name:"HR"}:e.name=="Finance Admin"&&(n={approver:"fa_user_id",order:t,name:"Finance Admin"}),r.push(n)}else console.log("No More Options");if(t==4){console.log(e);var a=E.value.filter(function(y){return y.name==e});console.log(a);let p={name:a[0].name,val:a[0].val};console.log(p),f.value.push(p),v.value="",r.pop()}if(t==5){console.log(e);var a=E.value.filter(function(y){return y.name==e});console.log(a);let p={name:a[0].name,val:a[0].val};console.log(p),f.value.push(p),m.value="",r.pop()}if(t==6){console.log(e);var a=E.value.filter(function(y){return y.name==e});console.log(a);let p={name:a[0].name,val:a[0].val};console.log(p),f.value.push(p),g.value="",r.pop()}var a=f.value.filter(function(n){return n.val!==e.val});f.value=a},E=l([{name:"Line Manager",val:1},{name:"HR",val:2},{name:"Finance Admin",val:3}]),f=l([{name:"Line Manager",val:1},{name:"HR",val:2},{name:"Finance Admin",val:3}]),j=l(0),re=l(0),ce=l(0),de=async t=>{d.value=!0;let e=t;await u.post("/loan-and-salAdv-current-status",{Status:e}).then(a=>{e==="sal_adv"&&(I.value=a.data.status),e==="int_free_loan"&&(D.value=a.data.status),e==="loan_with_int"&&(x.value=a.data.status)}).finally(()=>{d.value=!1})},P=l();async function ue(){await u.get("/settingDetails").then(t=>{P.value=t.data,console.log(P.value)})}const k=l(),q=l();async function pe(t){let e=t;u.post("/interest-and-interestfree-loan-settings-details",{Status:e}).then(a=>{e==="InterestFreeLoan"&&(k.value=a.data.settings),e==="InterestWithLoan"&&(q.value=a.data.settings)})}return{dropdownFilter:T,getDropdownFilterDetails:z,getSelectoption:G,getElibigleEmployees:J,eligbleEmployeeSource:A,resetFilters:B,canShowLoading:d,canShowPopup:O,AssignedClients:w,approvalFormat:r,selectedOption1:v,selectedOption2:m,selectedOption3:g,option:j,option1:re,option2:ce,dropdownlist:E,filteredApprovalFlow:f,toSelectoption:ie,isSalaryAdvanceFeatureEnabled:I,eligibleSalaryAdvanceEmployeeData:K,sa:i,SalaryAdvanceFeatureApprovalFlow:Q,saveSalaryAdvanceFeature:X,create_new_from:_,getCurrentStatus:de,client_name_status:S,sendClient_code:ae,salaryAdvanceHistory:ue,salaryAdvanceSettingsDetails:P,SalaryEmpDetails:W,isInterestFreeLoanFeature:D,ifl:o,saveInterestfreeLoan:ee,deduction_starting_months:Y,getClientsName:te,ClientsName:N,createIflNewFrom:Z,isTravelAdvanceFeatureEnabled:$,eligibleTravelAdvanceEmployeeData:ne,ta:F,saveTravelAdvance:le,isLoanWithInterestFeature:x,lwif:s,saveLoanWithInterest:se,blink_UI:V,swalFunction:H,sal_adv_reset:C,resetIfl:R,RestLwif:oe,getInterestFreeAndInterestWithLoanHistory:pe,interestFreeLoanHistory:k,interestwithLoanHistory:q,EnableAndDisable:M,interstfreeloanPage:b,loanWithInterestPage:L}});export{_e as s};
