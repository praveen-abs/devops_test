import{C as he,r as d,a3 as pe,q as j,o as z,D as G,c as _,e as b,f,h as o,g as e,i as L,t as $,n as a,l as x,w as W,v as N,p as E,j as M,F as B,x as K,k as be}from"./app-d5d63d00.js";import{_ as ge}from"./svg_oops-db663e6e.js";import{c as U,r as q,u as J}from"./index-cb1270b4.js";import{a as S}from"./index-0d903406.js";import"./lodash-af7ea1af.js";import{d as O}from"./dayjs.min-25482546.js";import{L as ve}from"./LoadingSpinner-b2b6596b.js";/* empty css                                                                       */const Y=he("useEmpSalaryAdvanceStore",()=>{const g=d(!1);pe("$swal");const t=d(!1),h=d(),F=d(),c=d(),u=d([]),p=j({ymi:"",ra:"",mxe:"",repdate:"",reason:"",isEligibleEmp:"",storeRepDate:""}),P=d();async function r(){let l="/getEmpsaladvDetails";await S.get(l).then(T=>{P.value=T.data,console.log(P.value)}).finally(()=>{})}const v=()=>{g.value=!0,S.get("/showEmployeeview").then(l=>{h.value=l.data,p.ymi=l.data.your_monthly_income,p.mxe=Math.round(l.data.max_eligible_amount),p.storeRepDate=l.data.Repayment_date,p.isEligibleEmp=l.data.eligible,F.value=l.data.percent_salary_amt}).finally(()=>{console.log("testings rounded off",p.mxe),g.value=!1})},m=()=>{t.value=!1,g.value=!0,S.post("/EmpSaveSalaryAmt",p).then(l=>{s(l.data),se()}).finally(()=>{g.value=!1})};function s(l){let T=l;T.status=="success"?Swal.fire({title:T.status="success",text:T.message,icon:"success"}).then(C=>{r()}):T.status=="failure"&&Swal.fire({title:T.status="failure",text:T.message,icon:"error",showCancelButton:!1}).then(C=>{})}const y=d(!1),R=d(),D=d([]),i=j({minEligibile:"",availPerInCtc:"",deductMethod:"",cusDeductMethod:"",maxTenure:"",required_amount:"",M_EMI:"",Term:"",EMI_Start_Month:"",EMI_End_Month:"",Total_Months:"",Reason:"",max_tenure_months:"",details:"",loan_type:"InterestFreeLoan",loan_setting_id:""});function V(){S.post("/show-eligible-interest-free-loan-details",{loan_type:"InterestFreeLoan"}).then(l=>{console.log(l),i.details=l.data,i.loan_setting_id=l.data.loan_setting_id,i.minEligibile=l.data.max_loan_amount,D.value=l.data.max_tenure_months})}const k=()=>{g.value=!0,console.log("fetching SA"),S.post("/employee-loan-history",{loan_type:"InterestFreeLoan"}).then(l=>{R.value=l.data,console.log(l.data)}).finally(()=>{g.value=!1})},I=()=>{g.value=!0,console.log("Saving SA"),S.post("/apply-loan",i).then(l=>{s(l.data)}).finally(()=>{g.value=!1,k()}),y.value=!1},w=d(1),n=d(!1),Q=d(),X=j({tdl:"",deductMethod:"",sumbitWithIn:"",isDeductedInsubsequentpayroll:"",ra:"",reason:""}),Z=()=>{console.log("fetching SA"),S.get("http://localhost:3000/TravelAdvance").then(l=>{Q.value=l.data,console.log(l.data)}).finally(()=>{g.value=!1})},re=()=>{g.value=!0,S.post("http://localhost:3000/TravelAdvance",X).finally(()=>{g.value=!1,Z()}),n.value=!1},ee=d(!1),de=d(1),te=d(),A=j({minEligibile:"",availPerInCtc:"",deductMethod:"",cusDeductMethod:"",maxTenure:"",required_amount:"",Term:"",Interest_rate:"",M_EMI:"0",EMI_Start_Month:"",EMI_End_Month:"",Total_Month:"",Reason:"",total_amount:"0",max_tenure_months:"",details:"",loan_type:"InterestWithLoan",loan_settings_id:""}),ie=()=>{S.post("/show-eligible-interest-free-loan-details",{loan_type:"InterestWithLoan"}).then(l=>{A.details=l.data,A.Interest_rate=l.data.loan_amt_interest,A.minEligibile=l.data.max_loan_amount,A.loan_settings_id=l.data.loan_settings_id,A.max_tenure_months=l.data.max_tenure_months})},oe=()=>{console.log(A),g.value=!0,S.post("/employee-loan-history",{loan_type:"InterestWithLoan"}).then(l=>{te.value=l.data,console.log(l.data)}).finally(()=>{g.value=!1})},ce=()=>{g.value=!0,S.post("/apply-loan",A).then(l=>{s(l.data)}).finally(()=>{g.value=!1,oe()}),ee.value=!1},ue=(l,T,C)=>{const ae=l*T/100;console.log(ae);let H=l+ae;console.log(H);let ne=H/C;console.log(ne);let le={monthlyDue:ne.toFixed(0),totalDue:H};A.M_EMI=le.monthlyDue,A.total_amount=le.totalDue};function se(){p.ra="",p.repdate="",p.reason=""}async function me(l){let T=l;await S.post("is-eligible-for-loan-and-advance",{eligible:T}).then(C=>{c.value=C.data,console.log(c.value)})}async function _e(l){let T=l;await S.post("/employee-dashboard-loan-and-advance",{loan_type:T}).then(C=>{u.value=C.data.data})}return{canShowLoading:g,dailogSalaryAdvance:t,percent_salary_amt:F,salaryAdvanceEmployeeData:h,sa:p,fetchSalaryAdvance:v,saveSalaryAdvance:m,arraySalaryDetails:P,getSalaryDetails:r,SAreset:se,dialog_NewInterestFreeLoanRequest:y,isInterestFreeLoanFeature:R,interestFreeLoan:i,max_tenure_month:D,saveInterestfreeLoan:I,fetchInterestfreeLoan:k,getinterestfreeloan:V,isTravelAdvanceFeatureEnabled:w,eligibleTravelAdvanceEmployeeData:Q,ta:X,dialog_TravelAdvance:n,saveTravelAdvance:re,fetchTraveladvance:Z,isLoanWithInterestFeature:de,InterestWithLoan:A,dialogInterestwithLoan:ee,saveInterestWithLoan:ce,InterestWithLoanData:te,fetchInterstWithLoan:oe,calculateLoanDetails:ue,getLoanDetails:ie,getEligible_loan_and_advance:me,eligibleEmployees:c,getEmployeeTotalvalue:_e,loanDashboard:u}});const fe={key:0,class:"mr-4 card"},ye={class:"px-5 row d-flex justify-content-start align-items-center card-body"},xe={class:"flex justify-between gap-6 my-2"},we={class:"fs-4"},$e={class:"text-xl font-medium"},Ie={class:"text-lg"},Le={class:"float-right"},Me=e("button",{class:"btn btn-border-orange"},"View Report",-1),Te=e("i",{class:"mx-2 fa fa-plus","aria-hidden":"true"},null,-1),Ee=K('<div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div>',1),Re={class:"table-responsive"},De={key:1,class:"pb-10 mr-4 card"},Se=e("img",{src:ge,alt:"",srcset:"",class:"w-5 p-6 m-auto"},null,-1),Fe=e("p",{class:"my-2 font-semibold text-center fs-3"},"You are not eligible to apply salary advance",-1),Pe=[Se,Fe],ke=e("h1",{class:"mx-3 fs-4 text-xxl",style:{"border-left":"3px solid var(--orange)","padding-left":"10px"}},"New Salary Advance Request",-1),Ae={class:"flex gap-3 pb-2 bg-gray-100 rounded-lg shadow-md"},qe={class:"w-5 p-4"},Ve=e("span",{class:"font-semibold"},"Your Monthly Income",-1),Ce={class:"w-5 p-4 mx-4"},We=e("span",{class:"font-semibold"},"Required Amount",-1),Ne={key:0,class:"font-semibold text-red-400 fs-6"},Ue={class:"text-sm font-semibold text-gray-500"},Ye={class:"gap-6 p-4 my-3 bg-gray-100 rounded-lg shadow-md"},je=e("span",{class:"font-semibold"},"Repayment",-1),Oe={class:"my-2 text-gray-600 fs-5 text-md"},ze={class:"gap-6 p-4 my-3 bg-gray-100 rounded-lg shadow-md"},Be=e("span",{class:"font-semibold"},"Reason",-1),Ke={key:0,class:"font-semibold text-red-400 fs-6"},He=e("button",{class:"btn btn-border-orange"},"Cancel",-1),Ge={__name:"salary_advance",setup(g){const t=Y();z(()=>{t.fetchSalaryAdvance(),t.getSalaryDetails()});const h=r=>!(r>t.sa.mxe),F=G(()=>({ra:{required:U.withMessage("Required amount is required",q),eligibleRequiredAmount:U.withMessage("Must be lesser than max eligible amount",h)},reason:{required:q}})),c=J(F,t.sa),u=()=>{c.value.$validate(),c.value.$error?console.log("Form failed validation"):(console.log("Form successfully submitted."),t.saveSalaryAdvance(),c.value.$reset())},p=d("center"),P=r=>{p.value=r,t.dailogSalaryAdvance=!0};return(r,v)=>{const m=_("Column"),s=_("DataTable"),y=_("Dropdown"),R=_("Textarea"),D=_("Dialog");return b(),f(B,null,[o(t).sa.isEligibleEmp==1?(b(),f("div",fe,[e("div",ye,[e("div",xe,[e("div",we,[e("p",$e,[L("The company allows employees to request a salary advance of up to "),e("strong",Ie,$(o(t).percent_salary_amt)+"%",1),L(" of their monthly salary.")])]),e("div",Le,[Me,e("button",{onClick:v[0]||(v[0]=i=>P("top")),class:"mx-4 btn btn-orange"},[Te,L("New Request")])])]),Ee,e("div",Re,[a(s,{value:o(t).arraySalaryDetails,ref:"dt",dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:x(()=>[a(m,{header:"Request ID",field:"request_id",style:{"min-width":"8rem"}}),a(m,{field:"borrowed_amount",header:"Advance Amount",style:{"min-width":"12rem"}}),a(m,{field:"",header:"Paid On ",style:{"min-width":"12rem"}}),a(m,{field:"dedction_date",header:"Expected Return",style:{"min-width":"12rem"}}),a(m,{field:"sal_adv_status",header:"Status",style:{"min-width":"12rem"}},{default:x(()=>[L($(r.slotProps.data.sal_adv_status),1)]),_:1})]),_:1},8,["value"])])])])):(b(),f("div",De,Pe)),a(D,{visible:o(t).dailogSalaryAdvance,"onUpdate:visible":v[5]||(v[5]=i=>o(t).dailogSalaryAdvance=i),modal:"",position:p.value,style:{width:"50vw",borderTop:"5px solid #002f56",height:"100vh"}},{header:x(()=>[ke]),default:x(()=>[e("div",Ae,[e("div",qe,[Ve,W(e("input",{id:"rentFrom_month","onUpdate:modelValue":v[1]||(v[1]=i=>o(t).sa.ymi=i),readonly:"",class:"my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-300"},null,512),[[N,o(t).sa.ymi]])]),e("div",Ce,[We,W(e("input",{id:"rentFrom_month","onUpdate:modelValue":v[2]||(v[2]=i=>o(t).sa.ra=i),class:E(["my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",[o(c).ra.$error?"border border-red-500":""]])},null,2),[[N,o(t).sa.ra]]),o(c).ra.$error?(b(),f("span",Ne,$(o(c).ra.$errors[0].$message),1)):M("",!0),e("p",Ue,"Max Eligible Amount : "+$(o(t).sa.mxe),1)])]),e("div",Ye,[je,e("p",Oe,[L("The advance amount will be deducted from the next month's salary "),a(y,{modelValue:o(t).sa.repdate,"onUpdate:modelValue":v[3]||(v[3]=i=>o(t).sa.repdate=i),options:o(t).sa.storeRepDate,optionLabel:"date",optionValue:"date",placeholder:"Select a Date",class:"w-full md:w-14rem"},null,8,["modelValue","options"])])]),e("div",ze,[Be,a(R,{class:E(["my-3 capitalize form-control textbox",[o(c).reason.$error?"p-invalid":""]]),autoResize:"",type:"text",rows:"3",modelValue:o(t).sa.reason,"onUpdate:modelValue":v[4]||(v[4]=i=>o(t).sa.reason=i)},null,8,["modelValue","class"]),o(c).reason.$error?(b(),f("span",Ke,$(o(c).reason.$errors[0].$message),1)):M("",!0)]),e("div",{class:"float-right"},[He,e("button",{class:"mx-4 btn btn-orange",onClick:u},"Submit")])]),_:1},8,["visible","position"])],64)}}};const Je={class:"mr-4 card"},Qe={class:"px-5 row d-flex justify-content-start align-items-center card-body"},Xe={class:"flex justify-between gap-6 my-2"},Ze=e("div",{class:"fs-4"},[e("p",{class:"text-xl font-medium"},[L("You are eligible for the Loan with Interest as per the "),e("span",{class:"text-lg text-primary text-decoration-underline"}," Company's Loan Policy ")])],-1),et={class:"float-right"},tt=e("button",{class:"btn btn-border-orange"},"View Report",-1),ot=e("i",{class:"mx-2 fa fa-plus","aria-hidden":"true"},null,-1),st=K('<div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div>',1),at={class:"table-responsive"},nt=e("div",null,[e("h1",{style:{"border-left":"3px solid var( --orange)","padding-left":"10px"},class:"fs-4"},"New interest With Loan Request")],-1),lt={class:"row p-2"},rt={class:"col-7"},dt={class:"card border-0"},it={class:"card-body bg-gray-100"},ct={class:"row"},ut={class:"col-6",style:{"margin-right":"30px"}},mt=e("h1",{class:"fs-5 my-2"},"Required Amount",-1),_t=e("br",null,null,-1),ht={key:0,class:"font-semibold text-red-400 fs-6"},pt={class:"fs-6 my-2",style:{color:"var(--clr-gray)"}},bt={class:"col mx-2"},gt=e("h1",{class:"fs-5 my-2"},"Term",-1),vt=e("label",{for:"",class:"fs-5 ml-1",style:{color:"var(--navy)"}},"Month",-1),ft=e("br",null,null,-1),yt={key:0,class:"font-semibold text-red-400 fs-6"},xt={class:"row"},wt={class:"col-12 pr-5"},$t={class:"col"},It={class:"row"},Lt={class:"col-12 pl-8 pr-8"},Mt={class:"div p-2 d-flex justify-items-center align-items-center flex-column rounded bg-blue-100 shadow-md"},Tt=e("h1",{class:"fw-semibold mt-1 fs-5"},"Interest Rate",-1),Et={class:"col pl-8 pr-8"},Rt={class:"div allcenter p-2 rounded shadow-md",style:{background:"#FDCFCF"}},Dt={class:"div d-flex justify-content-center align-items-center"},St=e("h1",{class:"fw-bolder fs-4"},"₹ ",-1),Ft=e("h1",{class:"fw-semibold mt-2 fs-5"},"Monthly payment",-1),Pt={class:"col pl-8 pr-8"},kt={class:"div allcenter p-2 rounded bg-green-100 shadow-md"},At={class:"div d-flex justify-content-center align-items-center"},qt=e("h1",{class:"fw-bolder fs-4"},"₹ ",-1),Vt=e("h1",{class:"fw-semibold mt-2 fs-5"},"Total loan amount",-1),Ct={class:"card bg-gray-100 bottom-0 my-4",style:{border:"none"}},Wt={class:"card-body mx-4"},Nt={class:"row"},Ut=e("h1",{class:"fs-4 my-2"},"EMI Dedution",-1),Yt=e("h1",{class:"fs-5 text-gray-600 mb-3"},"The EMI Dedution Will begin from the Upcoming Payroll",-1),jt={class:"col-4"},Ot=e("h1",{class:"fs-5 my-2 ml-2"},"EMI Start Month",-1),zt=e("br",null,null,-1),Bt={key:0,class:"font-semibold text-red-400 fs-6"},Kt={class:"col-4 mx-2"},Ht=e("h1",{class:"fs-5 my-2 ml-2"},"EMI End Month",-1),Gt={class:"col-3"},Jt=e("h1",{class:"fs-5 my-2 ml-2"},"Total Months",-1),Qt={class:"p-4 my-6 bg-gray-100 rounded-lg gap-6"},Xt=e("span",{class:"font-semibold"},"Reason",-1),Zt=e("br",null,null,-1),eo={key:0,class:"font-semibold text-red-400 fs-6"},to={class:"float-right"},oo={__name:"loan_with_interest",setup(g){const t=Y();d([]),z(()=>{t.fetchInterstWithLoan(),t.getLoanDetails()}),d(),d(["Off","On"]);const h=d("center"),F=m=>{h.value=m,t.dialogInterestwithLoan=!0};function c(){console.log(t.InterestWithLoan.Term),t.InterestWithLoan.Total_Month=t.InterestWithLoan.Term}function u(){function m(R,D){var i=O(R).format("MM/DD/YYYY").split("/"),V=parseInt(i[0])-1,k=parseInt(i[1]),I=parseInt(i[2]);console.log("testing dateparts",i);var w=new Date(I,V,k);w.setMonth(w.getMonth()+D);var n=w.getFullYear()+"-"+w.getMonth()+"-"+w.getDate();return n}m();var s=t.InterestWithLoan.EMI_Start_Month;console.log(s);var y=m(s,t.InterestWithLoan.Term);console.log(y),console.log(t.interestFreeLoan.Term),t.InterestWithLoan.EMI_End_Month=O(y).format("YYYY-MM-DD")}const p=m=>!(m>t.InterestWithLoan.minEligibile),P=G(()=>({required_amount:{required:U.withMessage("Required amount is required",q),eligibleRequiredAmount:U.withMessage("Must be lesser than max eligible amount",p)},Term:{required:q},EMI_Start_Month:{required:q},Reason:{required:q}})),r=J(P,t.InterestWithLoan),v=()=>{r.value.$validate(),r.value.$error?console.log("Form failed validation"):(console.log("Form successfully submitted."),t.saveInterestWithLoan(),r.value.$reset())};return(m,s)=>{const y=_("Column"),R=_("DataTable"),D=_("InputNumber"),i=_("Dropdown"),V=_("Calendar"),k=_("InputText"),I=_("Textarea"),w=_("Dialog");return b(),f(B,null,[e("div",Je,[e("div",Qe,[e("div",Xe,[Ze,e("div",et,[tt,e("button",{class:"mx-4 btn btn-orange",onClick:s[0]||(s[0]=n=>F("top"))},[ot,L(" New Request ")])])]),st,e("div",at,[a(R,{value:o(t).InterestWithLoanData,ref:"dt",dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:x(()=>[a(y,{header:"Request ID",field:"request_id",style:{"min-width":"8rem"}}),a(y,{header:"Loan Amount",field:"borrowed_amount",style:{"min-width":"8rem"}}),a(y,{field:"emi_per_month",header:"Monthly EMI",style:{"min-width":"12rem"}}),a(y,{field:"tenure_months",header:"Tenure",style:{"min-width":"12rem"}}),a(y,{field:"deduction_starting_month",header:"EMI Start Date",style:{"min-width":"12rem"}}),a(y,{field:"deduction_ending_month",header:"EMI End Date",style:{"min-width":"12rem"}}),a(y,{field:"loan_status",header:"Status",style:{"min-width":"12rem"}},{default:x(()=>[L($(m.slotProps.data.loan_status),1)]),_:1})]),_:1},8,["value"])])])]),a(w,{visible:o(t).dialogInterestwithLoan,"onUpdate:visible":s[12]||(s[12]=n=>o(t).dialogInterestwithLoan=n),modal:"",header:"Header",style:{width:"60vw"}},{header:x(()=>[nt]),default:x(()=>[e("div",lt,[e("div",rt,[e("div",dt,[e("div",it,[e("div",ct,[e("div",ut,[mt,a(D,{modelValue:o(t).InterestWithLoan.required_amount,"onUpdate:modelValue":s[1]||(s[1]=n=>o(t).InterestWithLoan.required_amount=n),placeholder:"₹ Enter The Required Amount",inputId:"withoutgrouping",useGrouping:!1,class:E([o(r).required_amount.$error?" border-2 outline-none border-red-500 rounded-lg":""])},null,8,["modelValue","class"]),_t,o(r).required_amount.$error?(b(),f("span",ht,$(o(r).required_amount.$errors[0].$message),1)):M("",!0),e("p",pt,"Max Eligible Amount : "+$(o(t).InterestWithLoan.minEligibile),1)]),e("div",bt,[gt,a(i,{modelValue:o(t).InterestWithLoan.Term,"onUpdate:modelValue":s[2]||(s[2]=n=>o(t).InterestWithLoan.Term=n),options:o(t).InterestWithLoan.max_tenure_months,onChange:c,optionLabel:"month",optionValue:"month",placeholder:"select month",class:E(["w-full md:w-10rem",[o(r).Term.$error?" border-2 outline-none border-red-500 rounded-lg":""]])},null,8,["modelValue","options","class"]),vt,ft,o(r).Term.$error?(b(),f("span",yt,$(o(r).Term.$errors[0].$message),1)):M("",!0)])]),e("div",xt,[e("div",wt,[e("button",{onClick:s[3]||(s[3]=n=>o(t).calculateLoanDetails(o(t).InterestWithLoan.required_amount,o(t).InterestWithLoan.Interest_rate,o(t).InterestWithLoan.Term)),class:"bg-danger text-light pt-2 pl-4 pr-4 pb-2 float-right rounded hover:bg-red-500 shadow-md"},"Calculate EMI")])])])])]),e("div",$t,[e("div",It,[e("div",Lt,[e("div",Mt,[W(e("input",{class:"fw-bolder fs-4 text-blue-900 p-2 ml-2 d-flex justify-items-center text-center bg-blue-100",placeholder:"%",style:{width:"100px"},"onUpdate:modelValue":s[4]||(s[4]=n=>o(t).InterestWithLoan.Interest_rate=n),disabled:"",prefix:"%"},null,512),[[N,o(t).InterestWithLoan.Interest_rate]]),Tt])]),e("div",Et,[e("div",Rt,[e("div",Dt,[St,W(e("input",{class:"fw-bolder fs-4 pl-2 text-center",style:{width:"100px",background:"#FDCFCF"},"onUpdate:modelValue":s[5]||(s[5]=n=>o(t).InterestWithLoan.M_EMI=n),disabled:""},null,512),[[N,o(t).InterestWithLoan.M_EMI]])]),Ft])]),e("div",Pt,[e("div",kt,[e("div",At,[qt,W(e("input",{"onUpdate:modelValue":s[6]||(s[6]=n=>o(t).InterestWithLoan.total_amount=n),class:"fw-bolder fs-4 pl-2 bg-green-100 text-center",style:{width:"100px"},disabled:""},null,512),[[N,o(t).InterestWithLoan.total_amount]])]),Vt])])])])]),e("div",Ct,[e("div",Wt,[e("div",Nt,[Ut,Yt,e("div",jt,[Ot,a(i,{onChange:u,modelValue:o(t).InterestWithLoan.EMI_Start_Month,"onUpdate:modelValue":s[7]||(s[7]=n=>o(t).InterestWithLoan.EMI_Start_Month=n),options:o(t).InterestWithLoan.details.deduction_starting_month,optionLabel:"date",placeholder:"select date",class:E(["w-full md:w-10rem",[o(r).EMI_Start_Month.$error?" border-2 outline-none border-red-500 rounded-lg":""]]),optionValue:"date"},null,8,["modelValue","options","class"]),zt,o(r).EMI_Start_Month.$error?(b(),f("span",Bt,$(o(r).EMI_Start_Month.$errors[0].$message),1)):M("",!0)]),e("div",Kt,[Ht,a(V,{modelValue:o(t).InterestWithLoan.EMI_End_Month,"onUpdate:modelValue":s[8]||(s[8]=n=>o(t).InterestWithLoan.EMI_End_Month=n),showIcon:""},null,8,["modelValue"])]),e("div",Gt,[Jt,a(k,{type:"text",modelValue:o(t).InterestWithLoan.Total_Month,"onUpdate:modelValue":s[9]||(s[9]=n=>o(t).InterestWithLoan.Total_Month=n),style:{width:"150px !important"}},null,8,["modelValue"])])])])]),e("div",Qt,[Xt,a(I,{modelValue:o(t).InterestWithLoan.Reason,"onUpdate:modelValue":s[10]||(s[10]=n=>o(t).InterestWithLoan.Reason=n),class:E(["my-3 capitalize form-control textbox",[o(r).Reason.$error?" border-2 outline-none border-red-500 rounded-lg":""]]),autoResize:"",type:"text",rows:"3"},null,8,["modelValue","class"]),Zt,o(r).Reason.$error?(b(),f("span",eo,$(o(r).Reason.$errors[0].$message),1)):M("",!0)]),e("div",to,[e("button",{class:"btn btn-border-dark border-dark px-5",onClick:s[11]||(s[11]=n=>o(t).dialogInterestwithLoan=!1)},"Cancel"),e("button",{class:"mx-4 btn btn-orange px-5",onClick:v},"Submit")])]),_:1},8,["visible"])],64)}}};const so={class:"mr-4 card"},ao={class:"px-5 row d-flex justify-content-start align-items-center card-body"},no={class:"flex justify-between gap-6 my-2"},lo=e("div",{class:"fs-4"},[e("p",{class:"text-xl font-medium"},[L("You are eligible for the Interest Free Loan as per the "),e("span",{class:"text-lg text-primary text-decoration-underline"}," Company's Loan Policy")])],-1),ro={class:"float-right"},io=e("button",{class:"btn btn-border-orange"},"View Report",-1),co=e("i",{class:"mx-2 fa fa-plus","aria-hidden":"true"},null,-1),uo=e("div",null,[e("h1",{style:{"border-left":"3px solid var( --orange)","padding-left":"5px"},class:"fs-4"},"New Interest Free Loan Request")],-1),mo={class:"card bg-gray-100 bottom-0 mb-10",style:{border:"none"}},_o={class:"card-body"},ho={class:"row mx-2"},po={class:"col mx-2"},bo=e("h1",{class:"fs-5 my-2"},"Required Amount",-1),go=e("br",null,null,-1),vo={key:0,class:"font-semibold text-red-400 fs-6"},fo={class:"fs-6 my-2",style:{color:"var(--clr-gray)"}},yo={class:"fw-semibold"},xo={class:"col mx-2"},wo=e("h1",{class:"fs-5 my-2"},"Monthly EMI",-1),$o={class:"col mx-2"},Io=e("h1",{class:"fs-5 my-2"},"Term",-1),Lo=e("label",{for:"",class:"fs-5 ml-2"},"Month",-1),Mo=e("br",null,null,-1),To={key:0,class:"font-semibold text-red-400 fs-6"},Eo={class:"card bg-gray-100 bottom-0 my-4",style:{border:"none"}},Ro={class:"card-body mx-4"},Do={class:"row"},So=e("h1",{class:"fs-4 my-2"},"EMI Dedution",-1),Fo=e("h1",{class:"fs-5 text-gray-600 mb-3"},"The EMI Dedution Will begin from the Upcoming Payroll",-1),Po={class:"col-4"},ko=e("h1",{class:"fs-5 my-2 ml-2"},"EMI Start Month",-1),Ao=e("br",null,null,-1),qo={key:0,class:"font-semibold text-red-400 fs-6"},Vo={class:"col-4 mx-2"},Co=e("h1",{class:"fs-5 my-2 ml-2"},"EMI End Month",-1),Wo={class:"col-3"},No=e("h1",{class:"fs-5 my-2 ml-2"},"Total Months",-1),Uo={class:"p-4 my-6 bg-gray-100 rounded-lg gap-6"},Yo=e("span",{class:"font-semibold"},"Reason",-1),jo=e("br",null,null,-1),Oo={key:0,class:"font-semibold text-red-400 fs-6"},zo={class:"float-right"},Bo=K('<div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div>',1),Ko={class:"table-responsive"},Ho={__name:"interest_free_loan",setup(g){const t=Y();z(()=>{t.fetchInterestfreeLoan(),t.getinterestfreeloan()}),d(),d();const h=d("center"),F=m=>{h.value=m,t.dialog_NewInterestFreeLoanRequest=!0};function c(){if(t.interestFreeLoan.M_EMI=Math.round(t.interestFreeLoan.required_amount/t.interestFreeLoan.Term),t.interestFreeLoan.Total_Months=t.interestFreeLoan.Term,t.interestFreeLoan.EMI_Start_Month)return u()}function u(){function m(R,D){var i=O(R).format("MM/DD/YYYY").split("/"),V=parseInt(i[0])-1,k=parseInt(i[1]),I=parseInt(i[2]);console.log(i);var w=new Date(I,V,k);w.setMonth(w.getMonth()+D);var n=w.getFullYear()+"-"+w.getMonth()+"-"+w.getDate();return n}m(),console.log(t.interestFreeLoan.EMI_Start_Month);var s=t.interestFreeLoan.EMI_Start_Month,y=m(s,t.interestFreeLoan.Term);console.log(y),console.log(t.interestFreeLoan.Term),t.interestFreeLoan.EMI_End_Month=O(y).format("YYYY-MM-DD")}d(),t.interestFreeLoan.Term&&console.log("testing ::",t.interestFreeLoan.Term),d(),d([{name:1,val:2},{name:"2",code:"RM"},{name:"2.5",code:"LDN"},{name:"3",code:"IST"},{name:"3.5",code:"PRS"}]),d();const p=m=>!(m>t.interestFreeLoan.minEligibile),P=G(()=>({required_amount:{required:U.withMessage("Required amount is required",q),eligibleRequiredAmount:U.withMessage("Must be lesser than max eligible amount",p)},Term:{required:q},EMI_Start_Month:{required:q},Reason:{required:q}})),r=J(P,t.interestFreeLoan),v=()=>{r.value.$validate(),r.value.$error?console.log("Form failed validation"):(console.log("Form successfully submitted."),t.saveInterestfreeLoan(),t.fetchInterestfreeLoan(),r.value.$reset())};return(m,s)=>{const y=_("InputNumber"),R=_("InputText"),D=_("Dropdown"),i=_("Calendar"),V=_("Textarea"),k=_("Dialog"),I=_("Column"),w=_("DataTable");return b(),f("div",so,[e("div",ao,[e("div",no,[lo,e("div",ro,[io,e("button",{class:"mx-4 btn btn-orange",onClick:s[0]||(s[0]=n=>F("top"))},[co,L(" New Request ")]),a(k,{visible:o(t).dialog_NewInterestFreeLoanRequest,"onUpdate:visible":s[9]||(s[9]=n=>o(t).dialog_NewInterestFreeLoanRequest=n),header:"Header",style:{width:"58vw"},modal:"",position:h.value},{header:x(()=>[uo]),footer:x(()=>[e("div",zo,[e("button",{class:"btn btn-border-orange",onClick:s[8]||(s[8]=n=>o(t).dialog_NewInterestFreeLoanRequest=!1)},"Cancel"),e("button",{class:"mx-4 btn btn-orange",onClick:v},"Submit")])]),default:x(()=>[e("div",mo,[e("div",_o,[e("div",ho,[e("div",po,[bo,a(y,{modelValue:o(t).interestFreeLoan.required_amount,"onUpdate:modelValue":s[1]||(s[1]=n=>o(t).interestFreeLoan.required_amount=n),modelModifiers:{number:!0},placeholder:"₹ Enter The Required Amount",inputId:"withoutgrouping",useGrouping:!1,class:E([o(r).required_amount.$error?" border-2 outline-none border-red-500 rounded-lg":""])},null,8,["modelValue","class"]),go,o(r).required_amount.$error?(b(),f("span",vo,$(o(r).required_amount.$errors[0].$message),1)):M("",!0),e("p",fo,[L("Max Eligible Amount : "),e("span",yo,$(o(t).interestFreeLoan.minEligibile),1)])]),e("div",xo,[wo,a(R,{type:"text",readonly:"",modelValue:o(t).interestFreeLoan.M_EMI,"onUpdate:modelValue":s[2]||(s[2]=n=>o(t).interestFreeLoan.M_EMI=n),placeholder:"₹ "},null,8,["modelValue"])]),e("div",$o,[Io,a(D,{modelValue:o(t).interestFreeLoan.Term,"onUpdate:modelValue":s[3]||(s[3]=n=>o(t).interestFreeLoan.Term=n),onChange:c,options:o(t).max_tenure_month,class:E(["w-full md:w-10rem",[o(r).Term.$error?" border-2 outline-none border-red-500 rounded-lg":""]]),optionValue:"month",optionLabel:"month",placeholder:"Select Month"},null,8,["modelValue","options","class"]),Lo,Mo,o(r).Term.$error?(b(),f("span",To,$(o(r).Term.$errors[0].$message),1)):M("",!0)])])])]),e("div",Eo,[e("div",Ro,[e("div",Do,[So,Fo,e("div",Po,[ko,a(D,{modelValue:o(t).interestFreeLoan.EMI_Start_Month,"onUpdate:modelValue":s[4]||(s[4]=n=>o(t).interestFreeLoan.EMI_Start_Month=n),onChange:u,options:o(t).interestFreeLoan.details.deduction_starting_month,optionLabel:"date",optionValue:"date",placeholder:"Select Month",class:E([o(r).EMI_Start_Month.$error?" border-2 outline-none border-red-500 rounded-lg":""])},null,8,["modelValue","options","class"]),Ao,o(r).EMI_Start_Month.$error?(b(),f("span",qo,$(o(r).EMI_Start_Month.$errors[0].$message),1)):M("",!0)]),e("div",Vo,[Co,a(i,{modelValue:o(t).interestFreeLoan.EMI_End_Month,"onUpdate:modelValue":s[5]||(s[5]=n=>o(t).interestFreeLoan.EMI_End_Month=n),readonly:"",style:{width:"150px !important"}},null,8,["modelValue"])]),e("div",Wo,[No,a(R,{type:"text",readonly:"",modelValue:o(t).interestFreeLoan.Total_Months,"onUpdate:modelValue":s[6]||(s[6]=n=>o(t).interestFreeLoan.Total_Months=n),style:{width:"150px !important"}},null,8,["modelValue"])])])])]),e("div",Uo,[Yo,a(V,{class:E(["my-3 capitalize form-control textbox",[o(r).Reason.$error?" border-2 outline-none border-red-500 rounded-lg":""]]),autoResize:"",type:"text",rows:"3",modelValue:o(t).interestFreeLoan.Reason,"onUpdate:modelValue":s[7]||(s[7]=n=>o(t).interestFreeLoan.Reason=n)},null,8,["modelValue","class"]),jo,o(r).Reason.$error?(b(),f("span",Oo,$(o(r).Reason.$errors[0].$message),1)):M("",!0)])]),_:1},8,["visible","position"])])]),Bo,e("div",Ko,[a(w,{ref:"dt",dataKey:"id",paginator:!0,rows:10,value:o(t).isInterestFreeLoanFeature,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:x(()=>[a(I,{header:"Request ID",field:"request_id",style:{"min-width":"8rem"}}),a(I,{field:"borrowed_amount",header:"Loan Amount",style:{"min-width":"12rem"}}),a(I,{field:"emi_per_month",header:"Monthly EMI",style:{"min-width":"12rem"}}),a(I,{field:"tenure_months",header:"Tenure",style:{"min-width":"12rem"}}),a(I,{field:"deduction_starting_month",header:"EMI Start Date",style:{"min-width":"12rem"}}),a(I,{field:"deduction_ending_month",header:"EMI End Date",style:{"min-width":"12rem"}}),a(I,{field:"loan_status",header:"Status",style:{"min-width":"12rem"}},{default:x(()=>[L($(m.slotProps.data.loan_status),1)]),_:1})]),_:1},8,["value"])])])])}}};const Go={class:"mr-4 card"},Jo={class:"px-5 row d-flex justify-content-start align-items-center card-body"},Qo={class:"flex justify-between gap-6 my-2"},Xo=e("div",{class:"fs-4"},[e("p",{class:"text-xl font-medium"},[L("You are eligible for Travel Advance as per the "),e("span",{class:"text-lg text-primary text-decoration-underline"},"Company's Loan Policy")])],-1),Zo={class:"float-right"},es=e("button",{class:"btn btn-border-orange"},"View Report",-1),ts=e("i",{class:"mx-2 fa fa-plus","aria-hidden":"true"},null,-1),os=K('<div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div>',1),ss={class:"table-responsive"},as=e("div",null,[e("h1",{style:{"border-left":"3px solid var( --orange)","padding-left":"10px"},class:"fs-4"},"New Travel Advance Request")],-1),ns={class:"flex pb-2 bg-gray-100 rounded-lg gap-7"},ls={class:"w-5 p-4 mx-4"},rs=e("span",{class:"font-semibold"},"Required Amount",-1),ds=e("p",{class:"text-sm font-semibold text-gray-500"},"Max Eligible Amount : 20,000",-1),is=e("div",{class:"p-4 my-6 bg-gray-100 rounded-lg gap-6"},[e("span",{class:"font-semibold"},"Repayment"),e("p",{class:"my-2 fs-5 text-gray-600 text-md"},[L("The deadline to submit the bills is on salary "),e("strong",{class:"fs-5 text-black"},"12/07/2023")])],-1),cs={class:"p-4 my-6 bg-gray-100 rounded-lg gap-6"},us=e("span",{class:"font-semibold"},"Reason",-1),ms={class:"float-right"},_s=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),hs={__name:"travel_advance",setup(g){const t=Y();z(()=>{t.fetchTraveladvance()}),d(),d(["Off","On"]);const h=d("center"),F=c=>{h.value=c,t.dialog_TravelAdvance=!0};return(c,u)=>{const p=_("Column"),P=_("DataTable"),r=_("Textarea"),v=_("Dialog"),m=_("ProgressSpinner");return b(),f(B,null,[e("div",Go,[e("div",Jo,[e("div",Qo,[Xo,e("div",Zo,[es,e("button",{class:"mx-4 btn btn-orange",onClick:u[0]||(u[0]=s=>F("top"))},[ts,L("New Request")])])]),os,e("div",ss,[a(P,{ref:"dt",dataKey:"id",paginator:!0,rows:10,value:c.sample,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:x(()=>[a(p,{header:"Request ID",field:"section",style:{"min-width":"8rem"}}),a(p,{field:"particular",header:"Advance Amount",style:{"min-width":"12rem"}}),a(p,{field:"ref",header:"Paid On ",style:{"min-width":"12rem"}}),a(p,{field:"max_limit",header:"Expected Return",style:{"min-width":"12rem"}}),a(p,{field:"Status",header:"Status",style:{"min-width":"12rem"}})]),_:1},8,["value"])])])]),a(v,{visible:o(t).dialog_TravelAdvance,"onUpdate:visible":u[5]||(u[5]=s=>o(t).dialog_TravelAdvance=s),modal:"",style:{width:"50vw"}},{header:x(()=>[as]),default:x(()=>[e("div",ns,[e("div",ls,[rs,W(e("input",{id:"rentFrom_month","onUpdate:modelValue":u[1]||(u[1]=s=>o(t).ta.ra=s),class:"my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"},null,512),[[N,o(t).ta.ra]]),ds])]),is,e("div",cs,[us,a(r,{modelValue:o(t).ta.reason,"onUpdate:modelValue":u[2]||(u[2]=s=>o(t).ta.reason=s),class:"my-3 capitalize form-control textbox",autoResize:"",type:"text",rows:"3"},null,8,["modelValue"])]),e("div",ms,[e("button",{class:"btn btn-border-orange",onClick:u[3]||(u[3]=s=>o(t).dialog_TravelAdvance=!1)},"Cancel"),e("button",{class:"mx-4 btn btn-orange",onClick:u[4]||(u[4]=(...s)=>o(t).saveTravelAdvance&&o(t).saveTravelAdvance(...s))},"Submit")])]),_:1},8,["visible"]),a(v,{header:"Header",visible:o(t).canShowLoading,"onUpdate:visible":u[6]||(u[6]=s=>o(t).canShowLoading=s),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:x(()=>[a(m,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:x(()=>[_s]),_:1},8,["visible"])],64)}}},ps={class:"p-4 pt-1 pb-0 mb-3 bg-white rounded-lg tw-card left-line"},bs={class:"divide-x nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},gs={class:"mx-2 nav-item",role:"presentation"},vs={class:"mx-3 nav-item",role:"presentation"},fs={class:"mx-3 nav-item",role:"presentation"},ys={class:"mx-3 nav-item",role:"presentation"},xs={class:"tab-content",id:""},ws={key:0},$s={key:1},Is={key:2},Ls={key:3},ks={__name:"employee_salary_loan",setup(g){const t=Y(),h=d(1);return(F,c)=>(b(),f(B,null,[o(t).canShowLoading?(b(),be(ve,{key:0,class:"absolute z-50 bg-white w-[100%] h-[100%]"})):M("",!0),e("div",null,[e("div",ps,[e("ul",bs,[e("li",gs,[e("a",{class:E(["nav-link",[h.value===1?"active":""]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:c[0]||(c[0]=u=>h.value=1)}," Salary Advance ",2)]),e("li",vs,[e("a",{class:E(["mx-4 text-center nav-link",[h.value===2?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:c[1]||(c[1]=u=>h.value=2),role:"tab","aria-controls":"","aria-selected":"true"}," Interest Free Loan ",2)]),e("li",fs,[e("a",{class:E(["mx-4 text-center nav-link",[h.value===3?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:c[2]||(c[2]=u=>h.value=3),role:"tab","aria-controls":"","aria-selected":"true"}," Travel Advance ",2)]),e("li",ys,[e("a",{class:E(["mx-4 text-center nav-link",[h.value===4?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:c[3]||(c[3]=u=>h.value=4),role:"tab","aria-controls":"","aria-selected":"true"}," Loan With Interest ",2)])])]),e("div",xs,[h.value===1?(b(),f("div",ws,[a(Ge)])):M("",!0),h.value===2?(b(),f("div",$s,[a(Ho)])):M("",!0),h.value===3?(b(),f("div",Is,[a(hs)])):M("",!0),h.value===4?(b(),f("div",Ls,[a(oo)])):M("",!0)])])],64))}};export{ks as default};
