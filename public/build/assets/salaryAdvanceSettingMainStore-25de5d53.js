import{a as p}from"./index-362795f3.js";import{d as z}from"./pinia-00b0a64a.js";import{G as a,Y as m}from"./toastservice.esm-df672d85.js";const U=z("salaryAdvanceSettingMainStore",()=>{const i=a(!1),F=a(1),O=a(),l=m({department_id:"",designation:"",work_location:"",state:"",client_name:""}),n=m([]),g=a(),M=a(),y=a(),_=a(),D=async()=>{let e="/getAllDropdownFilter";await p.get(e).then(t=>{O.value=t.data}).finally(()=>{})},C=(e,t)=>{console.log(t),e=="department"?(console.log(t),l.department_id=t,console.log(l)):e=="designation"?(l.designation=t,console.log(l)):e=="state"?(l.state=t,console.log(l)):e=="work_location"?(l.work_location=t,console.log(l)):e=="client_name"?(l.client_name=t,console.log(l)):console.log("nope");let s="/showAssignEmp";p.post(s,l).then(o=>{_.value=o.data,console.log(o.data)})},w=()=>{i.value=!0;let e="/showAssignEmp";p.post(e,l).then(t=>{_.value=t.data,console.log(t.data)}).finally(()=>{i.value=!1})},x=a(),c=m({isSalaryAdvanceEnabled:0,eligibleEmployee:"",perOfSalAdvance:"",cusPerOfSalAdvance:"",deductMethod:"",cusDeductMethod:"",approvalflow:n}),W=a({}),P=()=>{i.value=!0,c.perOfSalAdvance=="custom"?c.perOfSalAdvance=c.cusPerOfSalAdvance:console.log("same of percent"),c.deductMethod=="afterPayroll"?c.deductMethod=c.cusDeductMethod:console.log("same of percent");let e="/saveSalaryAdvanceSetting";F.value=="1"&&console.log("salary Advance Disabled"),console.log("salary Advance Enabled"),c.isSalaryAdvanceEnabled=1,p.post(e,c).finally(()=>{i.value=!1,n.splice(0,n.length)}),console.log(c)},S=a(1),T=a(),r=m({isInterestFreeLoanIsEnabled:0,selectClientID:"",minEligibile:"",availPerInCtc:"",deductMethod:"",precent_Or_Amt:"",deductMethod:"",max_loan_limit:"",cusDeductMethod:"",maxTenure:"",approvalflow:n,loan_type:"InterestFreeLoan",selectedOption1:g,selectedOption2:"",selectedOption3:""}),b=a(),H=()=>{i.value=!0,r.deductMethod=="emi"?r.deductMethod=r.cusDeductMethod:console.log("same of percent"),S.value=="1"?console.log("disabled"):(console.log(r),r.isInterestFreeLoanIsEnabled=1),r.precent_Or_Amt=="fixed"?r.availPerInCtc="":r.precent_Or_Amt=="percnt"&&(r.max_loan_limit="");let e="/save-int-and-int-free-loan-settings";p.post(e,r).finally(()=>{i.value=!1,n.splice(0,n.length)})};async function R(){await p.get("/get-clients-for-loan-adv").then(e=>{b.value=e.data})}const I=a(1),N=a(1),h=m({tdl:"",deductMethod:"",sumbitWithIn:"",isDeductedInsubsequentpayroll:"",claimBill:"",approvalflow:n}),q=()=>{i.value=!0,I.value=="1"?console.log("disabled"):console.log(h);let e="/saveTravelAdvanceSettings";p.post(e,h).finally(()=>{i.value=!1,n.splice(0,n.length)})},E=a(1),d=m({LoanWithInterestFeature:"",selectClientID:"",minEligibile:"",availPerInCtc:"",deductMethod:"",precent_Or_Amt:"",deductMethod:"",max_loan_limit:"",cusDeductMethod:"",maxTenure:"",loan_amt_interest:"",loan_type:"LoanWithInterest",approvalflow:n,selectedOption1:g}),B=()=>{i.value=!0,E.value=="1"?(console.log("disabled"),d.LoanWithInterestFeature=1):console.log(h),d.precent_Or_Amt=="fixed"?d.availPerInCtc="":d.precent_Or_Amt=="percnt"&&(d.max_loan_limit=""),d.deductMethod=="emi"?d.deductMethod=d.cusDeductMethod:console.log("same of percent");let e="/save-int-and-int-free-loan-settings";p.post(e,d).finally(()=>{i.value=!1,n.splice(0,n.length)})},G=()=>{l.client_name="",l.department_id="",l.designation="",l.state="",l.work_location="";let e="/showAssignEmp";p.post(e,l).then(t=>{_.value=t.data,console.log(t.data)})},Y=(e,t)=>{if(console.log(t),e==1){L.value=1,g.value=t.name;let o=a();t.name=="Line Manager"?o.value={approver:"l1_manager_code",order:e}:t.name=="HR"?o.value={approver:"hr_user_id",order:e}:t.name=="Finance Admin"&&(o.value={approver:"fa_user_id",order:e}),n.push(o)}if(e==2){M.value=t.name;let o=a();t.name=="Line Manager"?o.value={approver:"l1_manager_code",order:e}:t.name=="HR"?o.value={approver:"hr_user_id",order:e}:t.name=="Finance Admin"&&(o.value={approver:"fa_user_id",order:e}),n.push(o)}if(e==3){y.value=t.name;let o=a();t.name=="Line Manager"?o.value={approver:"l1_manager_code",order:e}:t.name=="HR"?o.value={approver:"hr_user_id",order:e}:t.name=="Finance Admin"&&(o.value={approver:"fa_user_id",order:e}),n.push(o)}else console.log("No More Options");if(e==4){console.log(t);var s=A.value.filter(function(f){return f.name==t});console.log(s);let u={name:s[0].name,val:s[0].val};console.log(u),v.value.push(u),g.value="",n.pop()}if(e==5){console.log(t);var s=A.value.filter(function(f){return f.name==t});console.log(s);let u={name:s[0].name,val:s[0].val};console.log(u),v.value.push(u),M.value="",n.pop()}if(e==6){console.log(t);var s=A.value.filter(function(f){return f.name==t});console.log(s);let u={name:s[0].name,val:s[0].val};console.log(u),v.value.push(u),y.value="",n.pop()}var s=v.value.filter(function(o){return o.val!==t.val});v.value=s},A=a([{name:"Line Manager",val:1},{name:"HR",val:2},{name:"Finance Admin",val:3}]),v=a([{name:"Line Manager",val:1},{name:"HR",val:2},{name:"Finance Admin",val:3}]),L=a(0),j=a(0),k=a(0);return{dropdownFilter:O,getDropdownFilterDetails:D,getSelectoption:C,getElibigleEmployees:w,eligbleEmployeeSource:_,resetFilters:G,canShowLoading:i,approvalFormat:n,selectedOption1:g,selectedOption2:M,selectedOption3:y,option:L,option1:j,option2:k,dropdownlist:A,filteredApprovalFlow:v,toSelectoption:Y,isSalaryAdvanceFeatureEnabled:F,eligibleSalaryAdvanceEmployeeData:x,sa:c,SalaryAdvanceFeatureApprovalFlow:W,saveSalaryAdvanceFeature:P,isInterestFreeLoaneature:S,ifl:r,saveInterestfreeLoan:H,deduction_starting_months:T,getClientsName:R,ClientsName:b,isTravelAdvanceFeatureEnabled:I,eligibleTravelAdvanceEmployeeData:N,ta:h,saveTravelAdvance:q,isLoanWithInterestFeature:E,lwif:d,saveLoanWithInterest:B}});export{U as s};
