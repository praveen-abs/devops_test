import{G as d,Y,I as j,a7 as oe,g as c,o as p,c as _,H as o,d as e,l as L,h as s,w as y,a as $,k as q,E as W,n as C,t as T,F as N,an as B,f as te,J as ie,P as de,K as ce,R as me,u as ue,v as pe,Q as _e,L as he,N as be,A as ge,M as ve}from"./toastservice.esm-3137c6bd.js";/* empty css                 */import{d as fe,c as ye}from"./pinia-13c2ded6.js";import{T as xe,B as we,S as $e,b as Le,a as Ie,c as Me}from"./styleclass.esm-144d12d2.js";import"./blockui.esm-1641b8a1.js";import{D as Te}from"./dialogservice.esm-0610cc71.js";import{C as Se}from"./confirmationservice.esm-ec2f14f9.js";import{s as Re}from"./progressspinner.esm-0e6c68e2.js";import{s as Ee}from"./row.esm-6ebc942e.js";import{s as De}from"./columngroup.esm-9dd1458e.js";import{s as Pe}from"./calendar.esm-e5b274ce.js";import{s as ke}from"./textarea.esm-e2131ccf.js";import{s as Fe}from"./chips.esm-608d07fe.js";import{s as Ae}from"./multiselect.esm-e797da8f.js";import{s as Ce}from"./selectbutton.esm-3edaba02.js";import{s as Ve}from"./radiobutton.esm-9db022a9.js";import{s as qe}from"./checkbox.esm-bf3d28c0.js";import{_ as We}from"./svg_oops-514378f6.js";import{c as O,r as V,u as se}from"./index.esm-6984cb81.js";import{a as D}from"./index-362795f3.js";import"./lodash-facb8280.js";import{d as G}from"./dayjs.min-2f06af28.js";const z=fe("useEmpSalaryAdvanceStore",()=>{const w=d(!1),t=d(!1),I=d(),f=Y({ymi:"",ra:"",mxe:"",repdate:"",reason:"",isEligibleEmp:""}),h=d();async function m(){let r="/getEmpsaladvDetails";await D.get(r).then(H=>{h.value=H.data,console.log(h.value)}).finally(()=>{})}const l=()=>{w.value=!0,D.get("/showEmployeeview").then(r=>{I.value=r.data,f.ymi=r.data.your_monthly_income,f.mxe=r.data.max_eligible_amount,f.repdate=r.data.Repayment_date,f.isEligibleEmp=r.data.eligible}).finally(()=>{w.value=!1})},M=()=>{t.value=!1,w.value=!0,D.post("/EmpSaveSalaryAmt",f).finally(()=>{w.value=!1})},u=d(!1),g=d(),x=d(),a=Y({minEligibile:"",availPerInCtc:"",deductMethod:"",cusDeductMethod:"",maxTenure:"",required_amount:"",M_EMI:"",Term:"",EMI_Start_Month:"",EMI_End_Month:"",Total_Months:"",Reason:"",max_tenure_months:"",details:"",loan_type:"InterestFreeLoan",loan_setting_id:""});function k(){D.post("/show-eligible-interest-free-loan-details",{loan_type:"InterestFreeLoan"}).then(r=>{console.log(r),a.max_tenure_months=r.data.max_tenure_months,console.log(a.max_tenure_months),a.details=r.data,a.loan_setting_id=r.data.loan_setting_id,a.minEligibile=r.data.max_loan_amount,console.log(r.data.max_tenure_months.month)})}const F=()=>{console.log("fetching SA"),D.post("/employee-loan-history",{loan_type:"InterestFreeLoan"}).then(r=>{g.value=r.data,console.log(r.data)}).finally(()=>{w.value=!1})},S=()=>{w.value=!0,console.log("Saving SA"),D.post("/apply-loan",a).finally(()=>{w.value=!1}),u.value=!1},R=d(1),n=d(!1),v=d(),E=Y({tdl:"",deductMethod:"",sumbitWithIn:"",isDeductedInsubsequentpayroll:"",ra:"",reason:""}),A=()=>{console.log("fetching SA"),D.get("http://localhost:3000/TravelAdvance").then(r=>{v.value=r.data,console.log(r.data)}).finally(()=>{w.value=!1})},U=()=>{w.value=!0,D.post("http://localhost:3000/TravelAdvance",E).finally(()=>{w.value=!1,A()}),n.value=!1},b=d(!0),ae=d(1),J=d(),P=Y({minEligibile:"",availPerInCtc:"",deductMethod:"",cusDeductMethod:"",maxTenure:"",required_amount:"",Term:"",Interest_rate:"",month_EMI:"0",EMI_Start_Month:"",EMI_END_Month:"",Total_Month:"",Reason:"",total_amount:5,max_tenure_months:"",details:""}),ne=r=>D.post("/show-eligible-interest-free-loan-details",{loan_type:r}),Q=()=>{console.log(P),D.post("/employee-loan-history",{}).then(r=>{J.value=r.data,console.log(r.data)}).finally(()=>{w.value=!1})};function le(){D.get("http://localhost:3000/interestWithloanDetails",{}).then(r=>{console.log(r.data),P.details=r.data,P.max_tenure_months=r.data.Months,P.minEligibile=r.data.minEligibile,P.Interest_rate=r.data.Interest_rate,console.log(P.details),console.log(P.max_tenure_months)})}return{canShowLoading:w,dailogSalaryAdvance:t,salaryAdvanceEmployeeData:I,sa:f,fetchSalaryAdvance:l,saveSalaryAdvance:M,arraySalaryDetails:h,getSalaryDetails:m,dialog_NewInterestFreeLoanRequest:u,isInterestFreeLoanFeature:g,interestFreeLoan:a,max_tenure_month:x,saveInterestfreeLoan:S,fetchInterestfreeLoan:F,getinterestfreeloan:k,isTravelAdvanceFeatureEnabled:R,eligibleTravelAdvanceEmployeeData:v,ta:E,dialog_TravelAdvance:n,saveTravelAdvance:U,fetchTraveladvance:A,isLoanWithInterestFeature:ae,InterestWithLoan:P,dialogInterestwithLoan:b,saveinterestWithLoan:()=>{D.post("/InterestWithLoan",P).finally(()=>{w.value=!1,Q()}),b.value=!1},InterestWithLoanData:J,fetchInterstWithLoan:Q,getinterestwithloan:le,calculateLoanDetails:(r,H,re)=>{const X=r*H/100;console.log(X);let K=r+X;console.log(K);let Z=K/re;console.log(Z);let ee={monthlyDue:Z.toFixed(0),totalDue:K};P.month_EMI=ee.monthlyDue,P.total_amount=ee.totalDue},getLoanDetails:ne}});const Ne={key:0,class:"mr-4 card"},Ue={class:"px-5 row d-flex justify-content-start align-items-center card-body"},Ye={class:"flex justify-between gap-6 my-2"},Oe=e("div",{class:"w-8 fs-4"},[e("p",{class:"text-xl font-medium"},[L("The company allows employees to request a salary advance of up to "),e("strong",{class:"text-lg"}," 100%"),L(" of their monthly salary.")])],-1),je={class:"float-right"},Be=e("button",{class:"btn btn-border-orange"},"View Report",-1),ze=e("i",{class:"mx-2 fa fa-plus","aria-hidden":"true"},null,-1),He=B('<div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div>',1),Ke={class:"table-responsive"},Ge={key:0,class:"text-orange-500"},Je={key:1,class:"text-green-500"},Qe={key:2,class:"text-red-500"},Xe={key:1,class:"mr-4 card pb-10"},Ze=e("img",{src:We,alt:"",srcset:"",class:"w-5 p-6 m-auto"},null,-1),et=e("p",{class:"my-2 font-semibold fs-3 text-center"},"You are not eligible to apply salary advance",-1),tt=[Ze,et],ot=e("h1",{class:"mx-3 fs-4 text-xxl",style:{"border-left":"3px solid var(--orange)","padding-left":"10px"}},"New Salary Advance Request",-1),st={class:"flex pb-2 bg-gray-100 rounded-lg gap-7"},at={class:"w-5 p-4"},nt=e("span",{class:"font-semibold"},"Your Monthly Income",-1),lt={class:"w-5 p-4 mx-4"},rt=e("span",{class:"font-semibold"},"Required Amount",-1),it={key:0,class:"font-semibold text-red-400 fs-6"},dt={class:"text-sm font-semibold text-gray-500"},ct={class:"gap-6 p-4 my-6 bg-gray-100 rounded-lg"},mt=e("span",{class:"font-semibold"},"Repayment",-1),ut={class:"my-2 text-gray-600 fs-5 text-md"},pt={class:"text-black fs-5"},_t={class:"gap-6 p-4 my-6 bg-gray-100 rounded-lg"},ht=e("span",{class:"font-semibold"},"Reason",-1),bt={key:0,class:"font-semibold text-red-400 fs-6"},gt=e("button",{class:"btn btn-border-orange"},"Cancel",-1),vt=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),ft={__name:"salary_advance",setup(w){const t=z();j(()=>{t.fetchSalaryAdvance(),t.getSalaryDetails()});const I=u=>!(u>t.sa.mxe),f=oe(()=>({ra:{required:O.withMessage("Required amount is required",V),eligibleRequiredAmount:O.withMessage("Must be lesser than max eligible amount",I)},reason:{required:V}})),h=se(f,t.sa),m=()=>{h.value.$validate(),h.value.$error?console.log("Form failed validation"):(console.log("Form successfully submitted."),t.saveSalaryAdvance(),h.value.$reset())},l=d("center"),M=u=>{l.value=u,t.dailogSalaryAdvance=!0};return(u,g)=>{const x=c("Column"),a=c("DataTable"),k=c("Dropdown"),F=c("Textarea"),S=c("Dialog"),R=c("ProgressSpinner");return p(),_(N,null,[o(t).sa.isEligibleEmp==0?(p(),_("div",Ne,[e("div",Ue,[e("div",Ye,[Oe,e("div",je,[Be,e("button",{onClick:g[0]||(g[0]=n=>M("top")),class:"mx-4 btn btn-orange"},[ze,L("New Request")])])]),He,e("div",Ke,[s(a,{value:o(t).arraySalaryDetails,ref:"dt",dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:y(()=>[s(x,{header:"Request ID",field:"request_id",style:{"min-width":"8rem"}}),s(x,{field:"borrowed_amount",header:"Advance Amount",style:{"min-width":"12rem"}}),s(x,{field:"requested_date",header:"Paid On ",style:{"min-width":"12rem"}}),s(x,{field:"dedction_date",header:"Expected Return",style:{"min-width":"12rem"}}),s(x,{field:"status",header:"Status",style:{"min-width":"12rem"}},{body:y(n=>[n.data.status==0?(p(),_("h6",Ge," Pending ")):$("",!0),n.data.status==1?(p(),_("h6",Je," Approved ")):$("",!0),n.data.status==2?(p(),_("h6",Qe," Rejected ")):$("",!0)]),_:1})]),_:1},8,["value"])])])])):(p(),_("div",Xe,tt)),s(S,{visible:o(t).dailogSalaryAdvance,"onUpdate:visible":g[5]||(g[5]=n=>o(t).dailogSalaryAdvance=n),modal:"",position:l.value,style:{width:"50vw",borderTop:"5px solid #002f56",height:"100vh"}},{header:y(()=>[ot]),default:y(()=>[e("div",st,[e("div",at,[nt,q(e("input",{id:"rentFrom_month","onUpdate:modelValue":g[1]||(g[1]=n=>o(t).sa.ymi=n),readonly:"",class:"my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-300"},null,512),[[W,o(t).sa.ymi]])]),e("div",lt,[rt,q(e("input",{id:"rentFrom_month","onUpdate:modelValue":g[2]||(g[2]=n=>o(t).sa.ra=n),class:C(["my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",[o(h).ra.$error?"border border-red-500":""]])},null,2),[[W,o(t).sa.ra]]),o(h).ra.$error?(p(),_("span",it,T(o(h).ra.$errors[0].$message),1)):$("",!0),e("p",dt,"Max Eligible Amount : "+T(o(t).sa.mxe),1)])]),e("div",ct,[mt,e("p",ut,[L("The advance amount will be deducted from the next month's salary "),e("strong",pt,T(o(G)(o(t).sa.repdate).format("DD-MM-YYYY")),1),s(k,{modelValue:o(t).sa.repdate,"onUpdate:modelValue":g[3]||(g[3]=n=>o(t).sa.repdate=n),options:o(t).sa.repdate,optionLabel:"date",optionValue:"date",placeholder:"Select a City",class:"w-full md:w-14rem"},null,8,["modelValue","options"])])]),e("div",_t,[ht,s(F,{class:C(["my-3 capitalize form-control textbox",[o(h).reason.$error?"p-invalid":""]]),autoResize:"",type:"text",rows:"3",modelValue:o(t).sa.reason,"onUpdate:modelValue":g[4]||(g[4]=n=>o(t).sa.reason=n)},null,8,["modelValue","class"]),o(h).reason.$error?(p(),_("span",bt,T(o(h).reason.$errors[0].$message),1)):$("",!0)]),e("div",{class:"float-right"},[gt,e("button",{class:"mx-4 btn btn-orange",onClick:m},"Submit")])]),_:1},8,["visible","position"]),s(S,{header:"Header",visible:o(t).canShowLoading,"onUpdate:visible":g[6]||(g[6]=n=>o(t).canShowLoading=n),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:y(()=>[s(R,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:y(()=>[vt]),_:1},8,["visible"])],64)}}};const yt={class:"mr-4 card"},xt={class:"px-5 row d-flex justify-content-start align-items-center card-body"},wt={class:"flex justify-between gap-6 my-2"},$t=e("div",{class:"fs-4"},[e("p",{class:"text-xl font-medium"},[L("You are eligible for the Loan with Interest as per the "),e("span",{class:"text-lg text-primary text-decoration-underline"}," Company's Loan Policy ")])],-1),Lt={class:"float-right"},It=e("button",{class:"btn btn-border-orange"},"View Report",-1),Mt=e("i",{class:"mx-2 fa fa-plus","aria-hidden":"true"},null,-1),Tt=B('<div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div>',1),St={class:"table-responsive"},Rt=e("div",null,[e("h1",{style:{"border-left":"3px solid var( --orange)","padding-left":"10px"},class:"fs-4"},"New interest With Loan Request")],-1),Et={class:"col-7"},Dt={class:"card border-0"},Pt={class:"card-body bg-gray-100"},kt={class:"row"},Ft={class:"col-6",style:{"margin-right":"30px"}},At=e("h1",{class:"fs-5 my-2"},"Required Amount",-1),Ct={class:"fs-6 my-2",style:{color:"var(--clr-gray)"}},Vt={class:"col mx-2"},qt=e("h1",{class:"fs-5 my-2"},"Term",-1),Wt=e("label",{for:"",class:"fs-5 ml-2",style:{color:"var(--navy)"}},"Years",-1),Nt={class:"row"},Ut={class:"col-12 pr-5"},Yt=["onClick"],Ot={class:"col"},jt={class:"row"},Bt={class:"col-12 pl-8 pr-8"},zt={class:"div p-2 d-flex justify-items-center align-items-center flex-column rounded bg-blue-100 shadow-md"},Ht=["onUpdate:modelValue"],Kt=e("h1",{class:"fw-semibold mt-1 fs-5"},"Interest Rate",-1),Gt={class:"col pl-8 pr-8"},Jt={class:"div allcenter p-2 rounded shadow-md",style:{background:"#FDCFCF"}},Qt={class:"div d-flex justify-content-center align-items-center"},Xt=e("h1",{class:"fw-bolder fs-4"},"₹ ",-1),Zt=e("h1",{class:"fw-semibold mt-2 fs-5"},"Monthly payment",-1),eo={class:"col pl-8 pr-8"},to={class:"div allcenter p-2 rounded bg-green-100 shadow-md"},oo={class:"div d-flex justify-content-center align-items-center"},so=e("h1",{class:"fw-bolder fs-4"},"₹ ",-1),ao=e("h1",{class:"fw-semibold mt-2 fs-5"},"Total loan amount",-1),no={class:"card-body mx-4"},lo={class:"row"},ro=e("h1",{class:"fs-4 my-2"},"EMI Dedution",-1),io=e("h1",{class:"fs-5 text-gray-600 mb-3"},"The EMI Dedution Will begin from the Upcoming Payroll",-1),co={class:"col-4"},mo=e("h1",{class:"fs-5 my-2 ml-2"},"EMI Start Month",-1),uo={class:"col-4 mx-2"},po=e("h1",{class:"fs-5 my-2 ml-2"},"EMI End Month",-1),_o={class:"col-3"},ho=e("h1",{class:"fs-5 my-2 ml-2"},"Total Months",-1),bo={class:"p-4 my-6 bg-gray-100 rounded-lg gap-6"},go=e("span",{class:"font-semibold"},"Reason",-1),vo={class:"float-right"},fo=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),yo={__name:"loan_with_interest",setup(w){const t=z(),I=d([]);j(()=>{t.getLoanDetails("InterestWithLoan").then(m=>{I.value.push(m.data)})}),d(),d(["Off","On"]);const f=d("center"),h=m=>{f.value=m,t.dialogInterestwithLoan=!0};return(m,l)=>{const M=c("Column"),u=c("DataTable"),g=c("InputNumber"),x=c("Dropdown"),a=c("Calendar"),k=c("InputText"),F=c("Textarea"),S=c("Dialog"),R=c("ProgressSpinner");return p(),_(N,null,[e("div",yt,[e("div",xt,[e("div",wt,[$t,e("div",Lt,[It,e("button",{class:"mx-4 btn btn-orange",onClick:l[0]||(l[0]=n=>h("top"))},[Mt,L(" New Request ")])])]),Tt,e("div",St,[s(u,{ref:"dt",dataKey:"id",paginator:!0,rows:10,value:m.sample,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:y(()=>[L(T(o(t).salaryAdvanceEmployeeData)+" ",1),s(M,{header:"Request ID",field:"section",style:{"min-width":"8rem"}}),s(M,{field:"particular",header:"Advance Amount",style:{"min-width":"12rem"}}),s(M,{field:"ref",header:"Paid On ",style:{"min-width":"12rem"}}),s(M,{field:"max_limit",header:"Expected Return",style:{"min-width":"12rem"}}),s(M,{field:"Status",header:"Status",style:{"min-width":"12rem"}})]),_:1},8,["value"])])])]),s(S,{visible:o(t).dialogInterestwithLoan,"onUpdate:visible":l[11]||(l[11]=n=>o(t).dialogInterestwithLoan=n),modal:"",header:"Header",style:{width:"60vw"}},{header:y(()=>[Rt]),default:y(()=>[(p(!0),_(N,null,te(I.value,n=>(p(),_("div",{class:"row p-2",key:n},[e("div",Et,[e("div",Dt,[e("div",Pt,[e("div",kt,[e("div",Ft,[At,s(g,{modelValue:o(t).InterestWithLoan.required_amount,"onUpdate:modelValue":l[1]||(l[1]=v=>o(t).InterestWithLoan.required_amount=v),placeholder:"₹ Enter The Required Amount",inputId:"withoutgrouping",useGrouping:!1},null,8,["modelValue"]),e("p",Ct,"Max Eligible Amount : "+T(n.max_loan_amount),1)]),e("div",Vt,[qt,s(x,{modelValue:o(t).InterestWithLoan.Term,"onUpdate:modelValue":l[2]||(l[2]=v=>o(t).InterestWithLoan.Term=v),options:n.max_tenure_months,optionLabel:"month",optionValue:"month",placeholder:"select month",class:"w-full md:w-10rem"},null,8,["modelValue","options"]),Wt])]),e("div",Nt,[e("div",Ut,[e("button",{onClick:v=>o(t).calculateLoanDetails(o(t).InterestWithLoan.required_amount,n.loan_amt_interest,o(t).InterestWithLoan.Term),class:"bg-danger text-light pt-2 pl-4 pr-4 pb-2 float-right rounded hover:bg-red-500 shadow-md"},"Calculate EMI",8,Yt)])])])])]),e("div",Ot,[e("div",jt,[e("div",Bt,[e("div",zt,[q(e("input",{class:"fw-bolder fs-4 text-blue-900 p-2 ml-2 d-flex justify-items-center text-center bg-blue-100",placeholder:"%",style:{width:"100px"},disabled:"","onUpdate:modelValue":v=>n.loan_amt_interest=v},null,8,Ht),[[W,n.loan_amt_interest]]),Kt])]),e("div",Gt,[e("div",Jt,[e("div",Qt,[Xt,q(e("input",{class:"fw-bolder fs-4 pl-2",style:{width:"100px",background:"#FDCFCF"},disabled:"","onUpdate:modelValue":l[3]||(l[3]=v=>o(t).InterestWithLoan.month_EMI=v)},null,512),[[W,o(t).InterestWithLoan.month_EMI]])]),Zt])]),e("div",eo,[e("div",to,[e("div",oo,[so,q(e("input",{class:"fw-bolder fs-4 pl-2 bg-green-100",style:{width:"100px"},disabled:"","onUpdate:modelValue":l[4]||(l[4]=v=>o(t).InterestWithLoan.total_amount=v)},null,512),[[W,o(t).InterestWithLoan.total_amount]])]),ao])])])])]))),128)),(p(!0),_(N,null,te(I.value,n=>(p(),_("div",{class:"card bg-gray-100 bottom-0 my-4",style:{border:"none"},key:n},[e("div",no,[e("div",lo,[ro,io,e("div",co,[mo,s(x,{modelValue:o(t).InterestWithLoan.EMI_Start_Month,"onUpdate:modelValue":l[5]||(l[5]=v=>o(t).InterestWithLoan.EMI_Start_Month=v),options:n.deduction_starting_month,optionLabel:"date",placeholder:"select date",class:"w-full md:w-10rem"},null,8,["modelValue","options"])]),e("div",uo,[po,s(a,{modelValue:o(t).InterestWithLoan.EMI_END_Month,"onUpdate:modelValue":l[6]||(l[6]=v=>o(t).InterestWithLoan.EMI_END_Month=v),showIcon:""},null,8,["modelValue"])]),e("div",_o,[ho,s(k,{type:"text",modelValue:o(t).InterestWithLoan.Total_Month,"onUpdate:modelValue":l[7]||(l[7]=v=>o(t).InterestWithLoan.Total_Month=v),style:{width:"150px !important"}},null,8,["modelValue"])])])])]))),128)),e("div",bo,[go,s(F,{modelValue:o(t).InterestWithLoan.Reason,"onUpdate:modelValue":l[8]||(l[8]=n=>o(t).InterestWithLoan.Reason=n),class:"my-3 capitalize form-control textbox",autoResize:"",type:"text",rows:"3"},null,8,["modelValue"])]),e("div",vo,[e("button",{class:"btn btn-border-dark border-dark px-5",onClick:l[9]||(l[9]=n=>o(t).dialogInterestwithLoan=!1)},"Cancel"),e("button",{class:"mx-4 btn btn-orange px-5",onClick:l[10]||(l[10]=(...n)=>o(t).saveinterestWithLoan&&o(t).saveinterestWithLoan(...n))},"Submit")])]),_:1},8,["visible"]),s(S,{header:"Header",visible:o(t).canShowLoading,"onUpdate:visible":l[12]||(l[12]=n=>o(t).canShowLoading=n),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:y(()=>[s(R,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:y(()=>[fo]),_:1},8,["visible"])],64)}}};const xo={class:"mr-4 card"},wo={class:"px-5 row d-flex justify-content-start align-items-center card-body"},$o={class:"flex justify-between gap-6 my-2"},Lo=e("div",{class:"fs-4"},[e("p",{class:"text-xl font-medium"},[L("You are eligible for the Interest Free Loan as per the "),e("span",{class:"text-lg text-primary text-decoration-underline"}," Company's Loan Policy")])],-1),Io={class:"float-right"},Mo=e("button",{class:"btn btn-border-orange"},"View Report",-1),To=e("i",{class:"mx-2 fa fa-plus","aria-hidden":"true"},null,-1),So=e("div",null,[e("h1",{style:{"border-left":"3px solid var( --orange)","padding-left":"5px"},class:"fs-4"},"New Interest Free Loan Request")],-1),Ro={class:"card bg-gray-100 bottom-0 mb-10",style:{border:"none"}},Eo={class:"card-body"},Do={class:"row mx-2"},Po={class:"col mx-2"},ko=e("h1",{class:"fs-5 my-2"},"Required Amount",-1),Fo=e("br",null,null,-1),Ao={key:0,class:"font-semibold text-red-400 fs-6"},Co={class:"fs-6 my-2",style:{color:"var(--clr-gray)"}},Vo={class:"fw-semibold"},qo={class:"col mx-2"},Wo=e("h1",{class:"fs-5 my-2"},"Monthly EMI",-1),No={class:"col mx-2"},Uo=e("h1",{class:"fs-5 my-2"},"Term",-1),Yo=e("label",{for:"",class:"fs-5 ml-2"},"Month",-1),Oo=e("br",null,null,-1),jo={key:0,class:"font-semibold text-red-400 fs-6"},Bo={class:"card bg-gray-100 bottom-0 my-4",style:{border:"none"}},zo={class:"card-body mx-4"},Ho={class:"row"},Ko=e("h1",{class:"fs-4 my-2"},"EMI Dedution",-1),Go=e("h1",{class:"fs-5 text-gray-600 mb-3"},"The EMI Dedution Will begin from the Upcoming Payroll",-1),Jo={class:"col-4"},Qo=e("h1",{class:"fs-5 my-2 ml-2"},"EMI Start Month",-1),Xo=e("br",null,null,-1),Zo={key:0,class:"font-semibold text-red-400 fs-6"},es={class:"col-4 mx-2"},ts=e("h1",{class:"fs-5 my-2 ml-2"},"EMI End Month",-1),os={class:"col-3"},ss=e("h1",{class:"fs-5 my-2 ml-2"},"Total Months",-1),as={class:"p-4 my-6 bg-gray-100 rounded-lg gap-6"},ns=e("span",{class:"font-semibold"},"Reason",-1),ls=e("br",null,null,-1),rs={key:0,class:"font-semibold text-red-400 fs-6"},is={class:"float-right"},ds=B('<div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div>',1),cs={class:"table-responsive"},ms={key:0,class:"text-orange-500"},us={key:1,class:"text-green-500"},ps=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),_s={__name:"interest_free_loan",setup(w){const t=z();j(()=>{t.fetchInterestfreeLoan(),t.getinterestfreeloan()}),d(),d();const I=d("center"),f=x=>{I.value=x,t.dialog_NewInterestFreeLoanRequest=!0};function h(){if(t.interestFreeLoan.M_EMI=t.interestFreeLoan.required_amount/t.interestFreeLoan.Term,t.interestFreeLoan.Total_Months=t.interestFreeLoan.Term,t.interestFreeLoan.EMI_Start_Month)return m()}function m(){function x(F,S){var R=G(F).format("MM/DD/YYYY").split("/"),n=parseInt(R[0])-1,v=parseInt(R[1]),E=parseInt(R[2]);console.log(R);var A=new Date(E,n,v);A.setMonth(A.getMonth()+S);var U=A.getFullYear()+"-"+A.getMonth()+"-"+A.getDate();return U}x(),console.log(t.interestFreeLoan.EMI_Start_Month);var a=t.interestFreeLoan.EMI_Start_Month,k=x(a,t.interestFreeLoan.Term);console.log(k),console.log(t.interestFreeLoan.Term),t.interestFreeLoan.EMI_End_Month=G(k).format("YYYY-MM-DD")}d(),t.interestFreeLoan.Term&&console.log("testing ::",t.interestFreeLoan.Term),d(),d([{name:1,val:2},{name:"2",code:"RM"},{name:"2.5",code:"LDN"},{name:"3",code:"IST"},{name:"3.5",code:"PRS"}]),d();const l=x=>!(x>t.interestFreeLoan.minEligibile),M=oe(()=>({required_amount:{required:O.withMessage("Required amount is required",V),eligibleRequiredAmount:O.withMessage("Must be lesser than max eligible amount",l)},Term:{required:V},EMI_Start_Month:{required:V},Reason:{required:V}})),u=se(M,t.interestFreeLoan),g=()=>{u.value.$validate(),u.value.$error?console.log("Form failed validation"):(console.log("Form successfully submitted."),t.saveInterestfreeLoan(),u.value.$reset())};return(x,a)=>{const k=c("InputNumber"),F=c("InputText"),S=c("Dropdown"),R=c("Calendar"),n=c("Textarea"),v=c("Dialog"),E=c("Column"),A=c("DataTable"),U=c("ProgressSpinner");return p(),_(N,null,[e("div",xo,[e("div",wo,[e("div",$o,[Lo,e("div",Io,[Mo,e("button",{class:"mx-4 btn btn-orange",onClick:a[0]||(a[0]=b=>f("top"))},[To,L(" New Request ")]),s(v,{visible:o(t).dialog_NewInterestFreeLoanRequest,"onUpdate:visible":a[9]||(a[9]=b=>o(t).dialog_NewInterestFreeLoanRequest=b),header:"Header",style:{width:"58vw"},modal:"",position:I.value},{header:y(()=>[So]),footer:y(()=>[e("div",is,[e("button",{class:"btn btn-border-orange",onClick:a[8]||(a[8]=b=>o(t).dialog_NewInterestFreeLoanRequest=!1)},"Cancel"),e("button",{class:"mx-4 btn btn-orange",onClick:g},"Submit")])]),default:y(()=>[e("div",Ro,[e("div",Eo,[e("div",Do,[e("div",Po,[ko,s(k,{modelValue:o(t).interestFreeLoan.required_amount,"onUpdate:modelValue":a[1]||(a[1]=b=>o(t).interestFreeLoan.required_amount=b),modelModifiers:{number:!0},placeholder:"₹ Enter The Required Amount",inputId:"withoutgrouping",useGrouping:!1,class:C([o(u).required_amount.$error?" border-2 outline-none border-red-500 rounded-lg":""])},null,8,["modelValue","class"]),Fo,o(u).required_amount.$error?(p(),_("span",Ao,T(o(u).required_amount.$errors[0].$message),1)):$("",!0),e("p",Co,[L("Max Eligible Amount : "),e("span",Vo,T(o(t).interestFreeLoan.minEligibile),1)])]),e("div",qo,[Wo,s(F,{type:"text",readonly:"",modelValue:o(t).interestFreeLoan.M_EMI,"onUpdate:modelValue":a[2]||(a[2]=b=>o(t).interestFreeLoan.M_EMI=b),placeholder:"₹ "},null,8,["modelValue"])]),e("div",No,[Uo,L(" "+T(o(t).interestFreeLoan.max_tenure_months.month)+" ",1),s(S,{modelValue:o(t).interestFreeLoan.Term,"onUpdate:modelValue":a[3]||(a[3]=b=>o(t).interestFreeLoan.Term=b),onChange:h,options:o(t).interestFreeLoan.max_tenure_months,class:C(["w-full md:w-10rem",[o(u).Term.$error?" border-2 outline-none border-red-500 rounded-lg":""]]),optionValue:"month",optionLabel:"month",placeholder:"Select Month"},null,8,["modelValue","options","class"]),Yo,Oo,o(u).Term.$error?(p(),_("span",jo,T(o(u).Term.$errors[0].$message),1)):$("",!0)])])])]),e("div",Bo,[e("div",zo,[e("div",Ho,[Ko,Go,e("div",Jo,[Qo,s(S,{modelValue:o(t).interestFreeLoan.EMI_Start_Month,"onUpdate:modelValue":a[4]||(a[4]=b=>o(t).interestFreeLoan.EMI_Start_Month=b),onChange:m,options:o(t).interestFreeLoan.details.deduction_starting_month,optionLabel:"date",optionValue:"date",placeholder:"Select Month",class:C([o(u).EMI_Start_Month.$error?" border-2 outline-none border-red-500 rounded-lg":""])},null,8,["modelValue","options","class"]),Xo,o(u).EMI_Start_Month.$error?(p(),_("span",Zo,T(o(u).EMI_Start_Month.$errors[0].$message),1)):$("",!0)]),e("div",es,[ts,s(R,{modelValue:o(t).interestFreeLoan.EMI_End_Month,"onUpdate:modelValue":a[5]||(a[5]=b=>o(t).interestFreeLoan.EMI_End_Month=b),readonly:"",style:{width:"150px !important"}},null,8,["modelValue"])]),e("div",os,[ss,s(F,{type:"text",readonly:"",modelValue:o(t).interestFreeLoan.Total_Months,"onUpdate:modelValue":a[6]||(a[6]=b=>o(t).interestFreeLoan.Total_Months=b),style:{width:"150px !important"}},null,8,["modelValue"])])])])]),e("div",as,[ns,s(n,{class:C(["my-3 capitalize form-control textbox",[o(u).Reason.$error?" border-2 outline-none border-red-500 rounded-lg":""]]),autoResize:"",type:"text",rows:"3",modelValue:o(t).interestFreeLoan.Reason,"onUpdate:modelValue":a[7]||(a[7]=b=>o(t).interestFreeLoan.Reason=b)},null,8,["modelValue","class"]),ls,o(u).Reason.$error?(p(),_("span",rs,T(o(u).Reason.$errors[0].$message),1)):$("",!0)])]),_:1},8,["visible","position"])])]),ds,e("div",cs,[L(T(o(t).isInterestFreeLoanFeature)+" ",1),s(A,{ref:"dt",dataKey:"id",paginator:!0,rows:10,value:o(t).isInterestFreeLoanFeature,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:y(()=>[s(E,{header:"Request ID",field:"request_id",style:{"min-width":"8rem"}}),s(E,{field:"borrowed_amount",header:"Loan Amount",style:{"min-width":"12rem"}}),s(E,{field:"emi_per_month",header:"Monthly EMI",style:{"min-width":"12rem"}}),s(E,{field:"tenure_months",header:"Tenure",style:{"min-width":"12rem"}}),s(E,{field:"deduction_starting_month",header:"EMI Start Date",style:{"min-width":"12rem"}}),s(E,{field:"deduction_ending_month",header:"EMI End Date",style:{"min-width":"12rem"}}),s(E,{field:"loan_crd_sts",header:"Status",style:{"min-width":"12rem"}},{body:y(b=>[b.data.loan_crd_sts==0?(p(),_("h6",ms," Pending ")):$("",!0),b.data.loan_crd_sts==1?(p(),_("h6",us," Approved ")):$("",!0)]),_:1})]),_:1},8,["value"])])])]),s(v,{header:"Header",visible:o(t).canShowLoading,"onUpdate:visible":a[10]||(a[10]=b=>o(t).canShowLoading=b),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:y(()=>[s(U,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:y(()=>[ps]),_:1},8,["visible"])],64)}}};const hs={class:"mr-4 card"},bs={class:"px-5 row d-flex justify-content-start align-items-center card-body"},gs={class:"flex justify-between gap-6 my-2"},vs=e("div",{class:"fs-4"},[e("p",{class:"text-xl font-medium"},[L("You are eligible for Travel Advance as per the "),e("span",{class:"text-lg text-primary text-decoration-underline"},"Company's Loan Policy")])],-1),fs={class:"float-right"},ys=e("button",{class:"btn btn-border-orange"},"View Report",-1),xs=e("i",{class:"mx-2 fa fa-plus","aria-hidden":"true"},null,-1),ws=B('<div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div>',1),$s={class:"table-responsive"},Ls=e("div",null,[e("h1",{style:{"border-left":"3px solid var( --orange)","padding-left":"10px"},class:"fs-4"},"New Travel Advance Request")],-1),Is={class:"flex pb-2 bg-gray-100 rounded-lg gap-7"},Ms={class:"w-5 p-4 mx-4"},Ts=e("span",{class:"font-semibold"},"Required Amount",-1),Ss=e("p",{class:"text-sm font-semibold text-gray-500"},"Max Eligible Amount : 20,000",-1),Rs=e("div",{class:"p-4 my-6 bg-gray-100 rounded-lg gap-6"},[e("span",{class:"font-semibold"},"Repayment"),e("p",{class:"my-2 fs-5 text-gray-600 text-md"},[L("The deadline to submit the bills is on salary "),e("strong",{class:"fs-5 text-black"},"12/07/2023")])],-1),Es={class:"p-4 my-6 bg-gray-100 rounded-lg gap-6"},Ds=e("span",{class:"font-semibold"},"Reason",-1),Ps={class:"float-right"},ks=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),Fs={__name:"travel_advance",setup(w){const t=z();j(()=>{t.fetchTraveladvance()}),d(),d(["Off","On"]);const I=d("center"),f=h=>{I.value=h,t.dialog_TravelAdvance=!0};return(h,m)=>{const l=c("Column"),M=c("DataTable"),u=c("Textarea"),g=c("Dialog"),x=c("ProgressSpinner");return p(),_(N,null,[e("div",hs,[e("div",bs,[e("div",gs,[vs,e("div",fs,[ys,e("button",{class:"mx-4 btn btn-orange",onClick:m[0]||(m[0]=a=>f("top"))},[xs,L("New Request")])])]),ws,e("div",$s,[s(M,{ref:"dt",dataKey:"id",paginator:!0,rows:10,value:h.sample,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:y(()=>[s(l,{header:"Request ID",field:"section",style:{"min-width":"8rem"}}),s(l,{field:"particular",header:"Advance Amount",style:{"min-width":"12rem"}}),s(l,{field:"ref",header:"Paid On ",style:{"min-width":"12rem"}}),s(l,{field:"max_limit",header:"Expected Return",style:{"min-width":"12rem"}}),s(l,{field:"Status",header:"Status",style:{"min-width":"12rem"}})]),_:1},8,["value"])])])]),s(g,{visible:o(t).dialog_TravelAdvance,"onUpdate:visible":m[5]||(m[5]=a=>o(t).dialog_TravelAdvance=a),modal:"",style:{width:"50vw"}},{header:y(()=>[Ls]),default:y(()=>[e("div",Is,[e("div",Ms,[Ts,q(e("input",{id:"rentFrom_month","onUpdate:modelValue":m[1]||(m[1]=a=>o(t).ta.ra=a),class:"my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"},null,512),[[W,o(t).ta.ra]]),Ss])]),Rs,e("div",Es,[Ds,s(u,{modelValue:o(t).ta.reason,"onUpdate:modelValue":m[2]||(m[2]=a=>o(t).ta.reason=a),class:"my-3 capitalize form-control textbox",autoResize:"",type:"text",rows:"3"},null,8,["modelValue"])]),e("div",Ps,[e("button",{class:"btn btn-border-orange",onClick:m[3]||(m[3]=a=>o(t).dialog_TravelAdvance=!1)},"Cancel"),e("button",{class:"mx-4 btn btn-orange",onClick:m[4]||(m[4]=(...a)=>o(t).saveTravelAdvance&&o(t).saveTravelAdvance(...a))},"Submit")])]),_:1},8,["visible"]),s(g,{header:"Header",visible:o(t).canShowLoading,"onUpdate:visible":m[6]||(m[6]=a=>o(t).canShowLoading=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:y(()=>[s(x,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:y(()=>[ks]),_:1},8,["visible"])],64)}}},As={class:"p-4 pt-1 pb-0 mb-3 bg-white rounded-lg tw-card left-line"},Cs={class:"divide-x nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},Vs={class:"mx-2 nav-item",role:"presentation"},qs={class:"mx-3 nav-item",role:"presentation"},Ws={class:"mx-3 nav-item",role:"presentation"},Ns={class:"mx-3 nav-item",role:"presentation"},Us={class:"tab-content",id:""},Ys={key:0},Os={key:1},js={key:2},Bs={key:3},zs={__name:"employee_salary_loan",setup(w){const t=d(1);return(I,f)=>(p(),_("div",null,[e("div",As,[e("ul",Cs,[e("li",Vs,[e("a",{class:C(["nav-link",[t.value===1?"active":""]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:f[0]||(f[0]=h=>t.value=1)}," Salary Advance ",2)]),e("li",qs,[e("a",{class:C(["mx-4 text-center nav-link",[t.value===2?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:f[1]||(f[1]=h=>t.value=2),role:"tab","aria-controls":"","aria-selected":"true"}," Interest Free Loan ",2)]),e("li",Ws,[e("a",{class:C(["mx-4 text-center nav-link",[t.value===3?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:f[2]||(f[2]=h=>t.value=3),role:"tab","aria-controls":"","aria-selected":"true"}," Travel Advance ",2)]),e("li",Ns,[e("a",{class:C(["mx-4 text-center nav-link",[t.value===4?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:f[3]||(f[3]=h=>t.value=4),role:"tab","aria-controls":"","aria-selected":"true"}," Loan With Interest ",2)])])]),e("div",Us,[t.value===1?(p(),_("div",Ys,[s(ft)])):$("",!0),t.value===2?(p(),_("div",Os,[s(_s)])):$("",!0),t.value===3?(p(),_("div",js,[s(Fs)])):$("",!0),t.value===4?(p(),_("div",Bs,[s(yo)])):$("",!0)])]))}},i=ie(zs),Hs=ye();i.use(de,{ripple:!0});i.use(Se);i.use(ce);i.use(Te);i.use(Hs);i.directive("tooltip",xe);i.directive("badge",we);i.directive("ripple",me);i.directive("styleclass",$e);i.directive("focustrap",ue);i.component("Button",pe);i.component("RadioButton",Ve);i.component("DataTable",Le);i.component("Column",Ie);i.component("ColumnGroup",De);i.component("Row",Ee);i.component("Toast",_e);i.component("ConfirmDialog",he);i.component("Dropdown",be);i.component("InputText",ge);i.component("Dialog",ve);i.component("ProgressSpinner",Re);i.component("Calendar",Pe);i.component("Textarea",ke);i.component("Chips",Fe);i.component("MultiSelect",Ae);i.component("InputNumber",Me);i.component("SelectButton",Ce);i.component("Checkbox",qe);i.mount("#EmpSalaryAdvanceLoan");
