import{G as m,a1 as E,H as C,af as z,g as c,o as y,c as w,a2 as s,d as e,l as $,h as o,w as b,k as A,E as M,n as I,t as L,a as k,F as V,a4 as D,I as H,P as K,J as G,R as J,u as Q,v as X,N as Z,K as ee,M as te,A as se,L as oe}from"./toastservice.esm-ed3188be.js";/* empty css                 */import{d as ae,c as le}from"./pinia-503c53ce.js";import{T as ne,B as re,S as ie,b as de,a as ce,c as me}from"./styleclass.esm-6ed4e4b9.js";import"./blockui.esm-244d5d2b.js";import{D as pe}from"./dialogservice.esm-dbd866ef.js";import{C as ue}from"./confirmationservice.esm-890ba1ea.js";import{s as be}from"./progressspinner.esm-db4b8f96.js";import{s as ge}from"./row.esm-6ebc942e.js";import{s as _e}from"./columngroup.esm-9dd1458e.js";import{s as ve}from"./calendar.esm-21345d6f.js";import{s as he}from"./textarea.esm-a3e09931.js";import{s as fe}from"./chips.esm-03c88f3f.js";import{s as xe}from"./multiselect.esm-8318a143.js";import{s as ye}from"./selectbutton.esm-dd7eccf1.js";import{s as we}from"./radiobutton.esm-25bca68c.js";import{s as $e}from"./checkbox.esm-a78a69e9.js";import{c as O,r as B,u as Re}from"./index.esm-a59c3c7b.js";import{a as S}from"./index-362795f3.js";import"./lodash-629bded8.js";import{d as Te}from"./dayjs.min-2f06af28.js";const Pe="/build/assets/svg_oops-9e2a5417.svg",q=ae("useEmpSalaryAdvanceStore",()=>{const _=m(!1),t=m(!1),R=m(),p=E({ymi:"",ra:"",mxe:"",repdate:"",reason:"",isEligibleEmp:""}),d=()=>{_.value=!0,S.get("/showEmployeeview").then(f=>{R.value=f.data,p.ymi=f.data.your_monthly_income,p.mxe=f.data.max_eligible_amount,p.repdate=f.data.Repayment_date,p.isEligibleEmp=f.data.eligible}).finally(()=>{_.value=!1})},a=()=>{t.value=!1,_.value=!0,S.post("/EmpSaveSalaryAmt",p).finally(()=>{_.value=!1})},l=m(!1),T=m(),v=E({minEligibile:"",availPerInCtc:"",deductMethod:"",cusDeductMethod:"",maxTenure:"",Ra:"",M_EMI:"",Term:"",EMI_Start_Month:"",Total_Months:"",Reason:""}),u=()=>{console.log("fetching SA"),S.get("http://localhost:3000/Interst_free_loan").then(f=>{T.value=f.data,console.log(f.data)}).finally(()=>{_.value=!1})},h=()=>{console.log("Saving SA"),S.post("http://localhost:3000/Interst_free_loan",v).finally(()=>{_.value=!1,u()}),l.value=!1},g=m(1),x=m(!1),P=m(),r=E({tdl:"",deductMethod:"",sumbitWithIn:"",isDeductedInsubsequentpayroll:"",ra:"",reason:""}),n=()=>{console.log("fetching SA"),S.get("http://localhost:3000/TravelAdvance").then(f=>{P.value=f.data,console.log(f.data)}).finally(()=>{_.value=!1})},Y=()=>{_.value=!0,S.post("http://localhost:3000/TravelAdvance",r).finally(()=>{_.value=!1,n()}),x.value=!1},N=m(!0),j=m(1),U=m(),F=E({minEligibile:"",availPerInCtc:"",deductMethod:"",cusDeductMethod:"",maxTenure:"",ra:"",Term:"",Interest_rate:"2.5%",month_EMI:"0",EMI_Start_Month:"",EMI_END_Month:"",Total_Month:"",Reason:""}),W=()=>{console.log(F),S.get("http://localhost:3000/InterestWithLoan").then(f=>{U.value=f.data,console.log(f.data)}).finally(()=>{_.value=!1})};return{canShowLoading:_,dailogSalaryAdvance:t,salaryAdvanceEmployeeData:R,sa:p,fetchSalaryAdvance:d,saveSalaryAdvance:a,dialog_NewInterestFreeLoanRequest:l,isInterestFreeLoaneature:T,ifl:v,saveInterestfreeLoan:h,fetchInterestfreeLoan:u,isTravelAdvanceFeatureEnabled:g,eligibleTravelAdvanceEmployeeData:P,ta:r,dialog_TravelAdvance:x,saveTravelAdvance:Y,fetchTraveladvance:n,isLoanWithInterestFeature:j,lwif:F,dialogInterestwithLoan:N,saveinterestWithLoan:()=>{S.post(" http://localhost:3000/InterestWithLoan",F).finally(()=>{_.value=!1,W()}),N.value=!1},InterestWithLoanData:U,fetchInterstWithLoan:W}});const Se={key:0,class:"mr-4 card"},Ie={class:"px-5 row d-flex justify-content-start align-items-center card-body"},Le={class:"flex justify-between gap-6 my-2"},ke=e("div",{class:"w-8 fs-4"},[e("p",{class:"text-xl font-medium"},[$("The company allows employees to request a salary advance of up to "),e("strong",{class:"text-lg"}," 100%"),$(" of their monthly salary.")])],-1),Ae={class:"float-right"},Me=e("button",{class:"btn btn-border-orange"},"View Report",-1),Ee=e("i",{class:"mx-2 fa fa-plus","aria-hidden":"true"},null,-1),Ce=D('<div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div>',1),Ve={class:"table-responsive"},De={key:1,class:"mr-4 card pb-10"},qe=e("img",{src:Pe,alt:"",srcset:"",class:"w-5 p-6 m-auto"},null,-1),Fe=e("p",{class:"my-2 font-semibold fs-3 text-center"},"You are not eligible to apply salary advance",-1),Ne=[qe,Fe],Ue=e("h1",{class:"mx-3 fs-4 text-xxl",style:{"border-left":"3px solid var(--orange)","padding-left":"10px"}},"New Salary Advance Request",-1),We={class:"flex pb-2 bg-gray-100 rounded-lg gap-7"},Oe={class:"w-5 p-4"},Be=e("span",{class:"font-semibold"},"Your Monthly Income",-1),Ye={class:"w-5 p-4 mx-4"},je=e("span",{class:"font-semibold"},"Required Amount",-1),ze={key:0,class:"font-semibold text-red-400 fs-6"},He={class:"text-sm font-semibold text-gray-500"},Ke={class:"gap-6 p-4 my-6 bg-gray-100 rounded-lg"},Ge=e("span",{class:"font-semibold"},"Repayment",-1),Je={class:"my-2 text-gray-600 fs-5 text-md"},Qe={class:"text-black fs-5"},Xe={class:"gap-6 p-4 my-6 bg-gray-100 rounded-lg"},Ze=e("span",{class:"font-semibold"},"Reason",-1),et={key:0,class:"font-semibold text-red-400 fs-6"},tt=e("button",{class:"btn btn-border-orange"},"Cancel",-1),st=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),ot={__name:"salary_advance",setup(_){const t=q();C(()=>{t.fetchSalaryAdvance()});const R=v=>!(v>t.sa.mxe),p=z(()=>({ra:{required:O.withMessage("Required amount is required",B),eligibleRequiredAmount:O.withMessage("Must be lesser than max eligible amount",R)},reason:{required:B}})),d=Re(p,t.sa),a=()=>{d.value.$validate(),d.value.$error?console.log("Form failed validation"):(console.log("Form successfully submitted."),t.saveSalaryAdvance(),d.value.$reset())},l=m("center"),T=v=>{l.value=v,t.dailogSalaryAdvance=!0};return(v,u)=>{const h=c("Column"),g=c("DataTable"),x=c("Textarea"),P=c("Dialog"),r=c("ProgressSpinner");return y(),w(V,null,[s(t).sa.isEligibleEmp==0?(y(),w("div",Se,[e("div",Ie,[e("div",Le,[ke,e("div",Ae,[Me,e("button",{onClick:u[0]||(u[0]=n=>T("top")),class:"mx-4 btn btn-orange"},[Ee,$("New Request")])])]),Ce,e("div",Ve,[o(g,{ref:"dt",dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:b(()=>[o(h,{header:"Request ID",field:"section",style:{"min-width":"8rem"}}),o(h,{field:"particular",header:"Advance Amount",style:{"min-width":"12rem"}}),o(h,{field:"ref",header:"Paid On ",style:{"min-width":"12rem"}}),o(h,{field:"max_limit",header:"Expected Return",style:{"min-width":"12rem"}}),o(h,{field:"Status",header:"Status",style:{"min-width":"12rem"}})]),_:1},512)])])])):(y(),w("div",De,Ne)),o(P,{visible:s(t).dailogSalaryAdvance,"onUpdate:visible":u[4]||(u[4]=n=>s(t).dailogSalaryAdvance=n),modal:"",position:l.value,style:{width:"50vw",borderTop:"5px solid #002f56",height:"100vh"}},{header:b(()=>[Ue]),default:b(()=>[e("div",We,[e("div",Oe,[Be,A(e("input",{id:"rentFrom_month","onUpdate:modelValue":u[1]||(u[1]=n=>s(t).sa.ymi=n),readonly:"",class:"my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-300"},null,512),[[M,s(t).sa.ymi]])]),e("div",Ye,[je,A(e("input",{id:"rentFrom_month","onUpdate:modelValue":u[2]||(u[2]=n=>s(t).sa.ra=n),class:I(["my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",[s(d).ra.$error?"border border-red-500":""]])},null,2),[[M,s(t).sa.ra]]),s(d).ra.$error?(y(),w("span",ze,L(s(d).ra.$errors[0].$message),1)):k("",!0),e("p",He,"Max Eligible Amount : "+L(s(t).sa.mxe),1)])]),e("div",Ke,[Ge,e("p",Je,[$("The advance amount will be deducted from the next month's salary "),e("strong",Qe,L(s(Te)(s(t).sa.repdate).format("DD-MM-YYYY")),1)])]),e("div",Xe,[Ze,o(x,{class:I(["my-3 capitalize form-control textbox",[s(d).reason.$error?"p-invalid":""]]),autoResize:"",type:"text",rows:"3",modelValue:s(t).sa.reason,"onUpdate:modelValue":u[3]||(u[3]=n=>s(t).sa.reason=n)},null,8,["modelValue","class"]),s(d).reason.$error?(y(),w("span",et,L(s(d).reason.$errors[0].$message),1)):k("",!0)]),e("div",{class:"float-right"},[tt,e("button",{class:"mx-4 btn btn-orange",onClick:a},"Submit")])]),_:1},8,["visible","position"]),o(P,{header:"Header",visible:s(t).canShowLoading,"onUpdate:visible":u[5]||(u[5]=n=>s(t).canShowLoading=n),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:b(()=>[o(r,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:b(()=>[st]),_:1},8,["visible"])],64)}}};const at={class:"mr-4 card"},lt={class:"px-5 row d-flex justify-content-start align-items-center card-body"},nt={class:"flex justify-between gap-6 my-2"},rt=e("div",{class:"fs-4"},[e("p",{class:"text-xl font-medium"},[$("You are eligible for the Loan with Interest as per the "),e("span",{class:"text-lg text-primary text-decoration-underline"}," Company's Loan Policy ")])],-1),it={class:"float-right"},dt=e("button",{class:"btn btn-border-orange"},"View Report",-1),ct=e("i",{class:"mx-2 fa fa-plus","aria-hidden":"true"},null,-1),mt=D('<div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div>',1),pt={class:"table-responsive"},ut=e("div",null,[e("h1",{style:{"border-left":"3px solid var( --orange)","padding-left":"10px"},class:"fs-4"},"New interest With Loan Request")],-1),bt={class:"row p-2"},gt={class:"col-7"},_t={class:"card border-0"},vt={class:"card-body bg-gray-100"},ht={class:"row"},ft={class:"col-6",style:{"margin-right":"30px"}},xt=e("h1",{class:"fs-5 my-2"},"Required Amount",-1),yt=e("p",{class:"fs-6 my-2",style:{color:"var(--clr-gray)"}},"Max Eligible Amount : 20,000",-1),wt={class:"col mx-2"},$t=e("h1",{class:"fs-5 my-2"},"Term",-1),Rt=e("label",{for:"",class:"fs-5 ml-2",style:{color:"var(--navy)"}},"Years",-1),Tt=e("div",{class:"row"},[e("div",{class:"col-12 pr-5"},[e("button",{class:"bg-danger text-light pt-2 pl-4 pr-4 pb-2 float-right rounded"},"Calculate EMI")])],-1),Pt={class:"col"},St={class:"row"},It={class:"col-12 pl-8 pr-8"},Lt={class:"div p-4 allcenter rounded",style:{background:"#CEE3F4"}},kt=e("h1",{class:"fw-bolder mt-2"},"Interest Rate",-1),At={class:"col pl-8 pr-8"},Mt={class:"div allcenter p-4 rounded",style:{background:"#FDCFCF"}},Et={class:"div d-flex justify-content-center align-items-center"},Ct=e("h1",{class:"fw-bolder fs-4"},"₹ ",-1),Vt=e("h1",{class:"fw-bolder mt-2"},"Month EMI",-1),Dt={class:"card bg-gray-100 bottom-0 my-4",style:{border:"none"}},qt={class:"card-body mx-4"},Ft={class:"row"},Nt=e("h1",{class:"fs-4 my-2"},"EMI Dedution",-1),Ut=e("h1",{class:"fs-5 text-gray-600 mb-3"},"The EMI Dedution Will begin from the Upcoming Payroll",-1),Wt={class:"col-4"},Ot=e("h1",{class:"fs-5 my-2 ml-2"},"EMI Start Month",-1),Bt={class:"col-4 mx-2"},Yt=e("h1",{class:"fs-5 my-2 ml-2"},"EMI End Month",-1),jt={class:"col-3"},zt=e("h1",{class:"fs-5 my-2 ml-2"},"Total Months",-1),Ht={class:"p-4 my-6 bg-gray-100 rounded-lg gap-6"},Kt=e("span",{class:"font-semibold"},"Reason",-1),Gt={class:"float-right"},Jt=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),Qt={__name:"loan_with_interest",setup(_){const t=q();C(()=>{t.fetchInterstWithLoan()}),m(),m(["Off","On"]);const R=m("center"),p=d=>{R.value=d,t.dialogInterestwithLoan=!0};return(d,a)=>{const l=c("Column"),T=c("DataTable"),v=c("InputText"),u=c("Dropdown"),h=c("Calendar"),g=c("Textarea"),x=c("Dialog"),P=c("ProgressSpinner");return y(),w(V,null,[e("div",at,[e("div",lt,[e("div",nt,[rt,e("div",it,[dt,e("button",{class:"mx-4 btn btn-orange",onClick:a[0]||(a[0]=r=>p("top"))},[ct,$(" New Request ")])])]),mt,e("div",pt,[o(T,{ref:"dt",dataKey:"id",paginator:!0,rows:10,value:d.sample,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:b(()=>[$(L(s(t).salaryAdvanceEmployeeData)+" ",1),o(l,{header:"Request ID",field:"section",style:{"min-width":"8rem"}}),o(l,{field:"particular",header:"Advance Amount",style:{"min-width":"12rem"}}),o(l,{field:"ref",header:"Paid On ",style:{"min-width":"12rem"}}),o(l,{field:"max_limit",header:"Expected Return",style:{"min-width":"12rem"}}),o(l,{field:"Status",header:"Status",style:{"min-width":"12rem"}})]),_:1},8,["value"])])])]),o(x,{visible:s(t).dialogInterestwithLoan,"onUpdate:visible":a[11]||(a[11]=r=>s(t).dialogInterestwithLoan=r),modal:"",header:"Header",style:{width:"60vw"}},{header:b(()=>[ut]),default:b(()=>[e("div",bt,[e("div",gt,[e("div",_t,[e("div",vt,[e("div",ht,[e("div",ft,[xt,o(v,{type:"text",modelValue:s(t).lwif.ra,"onUpdate:modelValue":a[1]||(a[1]=r=>s(t).lwif.ra=r),placeholder:"₹ Enter The Required Amount"},null,8,["modelValue"]),yt]),e("div",wt,[$t,o(u,{modelValue:s(t).lwif.Term,"onUpdate:modelValue":a[2]||(a[2]=r=>s(t).lwif.Term=r),options:d.cities,optionLabel:"name",placeholder:"1.5",class:"w-full md:w-10rem"},null,8,["modelValue","options"]),Rt])]),Tt])])]),e("div",Pt,[e("div",St,[e("div",It,[e("div",Lt,[A(e("input",{class:"fw-bolder fs-4 clr",style:{width:"45px",background:"#CEE3F4"},"onUpdate:modelValue":a[3]||(a[3]=r=>s(t).lwif.Interest_rate=r)},null,512),[[M,s(t).lwif.Interest_rate]]),kt])]),e("div",At,[e("div",Mt,[e("div",Et,[Ct,A(e("input",{class:"fw-bolder fs-4 clr pl-2",style:{width:"45px",background:"#FDCFCF"},"onUpdate:modelValue":a[4]||(a[4]=r=>s(t).lwif.month_EMI=r)},null,512),[[M,s(t).lwif.month_EMI]])]),Vt])])])])]),e("div",Dt,[e("div",qt,[e("div",Ft,[Nt,Ut,e("div",Wt,[Ot,o(h,{modelValue:s(t).lwif.EMI_Start_Month,"onUpdate:modelValue":a[5]||(a[5]=r=>s(t).lwif.EMI_Start_Month=r),showIcon:""},null,8,["modelValue"])]),e("div",Bt,[Yt,o(h,{modelValue:s(t).lwif.EMI_END_Month,"onUpdate:modelValue":a[6]||(a[6]=r=>s(t).lwif.EMI_END_Month=r),showIcon:""},null,8,["modelValue"])]),e("div",jt,[zt,o(v,{type:"text",modelValue:s(t).lwif.Total_Month,"onUpdate:modelValue":a[7]||(a[7]=r=>s(t).lwif.Total_Month=r),style:{width:"150px !important"}},null,8,["modelValue"])])])])]),e("div",Ht,[Kt,o(g,{modelValue:s(t).lwif.Reason,"onUpdate:modelValue":a[8]||(a[8]=r=>s(t).lwif.Reason=r),class:"my-3 capitalize form-control textbox",autoResize:"",type:"text",rows:"3"},null,8,["modelValue"])]),e("div",Gt,[e("button",{class:"btn btn-border-dark border-dark px-5",onClick:a[9]||(a[9]=r=>s(t).dialogInterestwithLoan=!1)},"Cancel"),e("button",{class:"mx-4 btn btn-orange px-5",onClick:a[10]||(a[10]=(...r)=>s(t).saveinterestWithLoan&&s(t).saveinterestWithLoan(...r))},"Submit")])]),_:1},8,["visible"]),o(x,{header:"Header",visible:s(t).canShowLoading,"onUpdate:visible":a[12]||(a[12]=r=>s(t).canShowLoading=r),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:b(()=>[o(P,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:b(()=>[Jt]),_:1},8,["visible"])],64)}}};const Xt={class:"mr-4 card"},Zt={class:"px-5 row d-flex justify-content-start align-items-center card-body"},es={class:"flex justify-between gap-6 my-2"},ts=e("div",{class:"fs-4"},[e("p",{class:"text-xl font-medium"},[$("You are eligible for the Interest Free Loan as per the "),e("span",{class:"text-lg text-primary text-decoration-underline"}," Company's Loan Policy")])],-1),ss={class:"float-right"},os=e("button",{class:"btn btn-border-orange"},"View Report",-1),as=e("i",{class:"mx-2 fa fa-plus","aria-hidden":"true"},null,-1),ls=e("div",null,[e("h1",{style:{"border-left":"3px solid var( --orange)","padding-left":"5px"},class:"fs-4"},"New Interest Free Loan Request")],-1),ns={class:"card bg-gray-100 bottom-0 mb-10",style:{border:"none"}},rs={class:"card-body"},is={class:"row mx-2"},ds={class:"col mx-2"},cs=e("h1",{class:"fs-5 my-2"},"Required Amount",-1),ms=e("p",{class:"fs-6 my-2",style:{color:"var(--clr-gray)"}},"Max Eligible Amount : 20,000",-1),ps={class:"col mx-2"},us=e("h1",{class:"fs-5 my-2"},"Monthly EMI",-1),bs={class:"col mx-2"},gs=e("h1",{class:"fs-5 my-2"},"Term",-1),_s=e("label",{for:"",class:"fs-5 ml-2",style:{color:"var(--navy)"}},"Years",-1),vs={class:"card bg-gray-100 bottom-0 my-4",style:{border:"none"}},hs={class:"card-body mx-4"},fs={class:"row"},xs=e("h1",{class:"fs-4 my-2"},"EMI Dedution",-1),ys=e("h1",{class:"fs-5 text-gray-600 mb-3"},"The EMI Dedution Will begin from the Upcoming Payroll",-1),ws={class:"col-4"},$s=e("h1",{class:"fs-5 my-2 ml-2"},"EMI Start Month",-1),Rs={class:"col-4 mx-2"},Ts=e("h1",{class:"fs-5 my-2 ml-2"},"EMI Start Month",-1),Ps={class:"col-3"},Ss=e("h1",{class:"fs-5 my-2 ml-2"},"Total Months",-1),Is={class:"p-4 my-6 bg-gray-100 rounded-lg gap-6"},Ls=e("span",{class:"font-semibold"},"Reason",-1),ks={class:"float-right"},As=D('<div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div>',1),Ms={class:"table-responsive"},Es=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),Cs={__name:"interest_free_loan",setup(_){const t=q();C(()=>{t.fetchInterestfreeLoan()});const R=m("center"),p=a=>{R.value=a,t.dialog_NewInterestFreeLoanRequest=!0};m(),m();const d=m([{name:"1.5",code:"NY"},{name:"2",code:"RM"},{name:"2.5",code:"LDN"},{name:"3",code:"IST"},{name:"3.5",code:"PRS"}]);return m(),(a,l)=>{const T=c("InputText"),v=c("Dropdown"),u=c("Calendar"),h=c("Textarea"),g=c("Dialog"),x=c("Column"),P=c("DataTable"),r=c("ProgressSpinner");return y(),w(V,null,[e("div",Xt,[e("div",Zt,[e("div",es,[ts,e("div",ss,[os,e("button",{class:"mx-4 btn btn-orange",onClick:l[0]||(l[0]=n=>p("top"))},[as,$(" New Request ")]),o(g,{visible:s(t).dialog_NewInterestFreeLoanRequest,"onUpdate:visible":l[10]||(l[10]=n=>s(t).dialog_NewInterestFreeLoanRequest=n),header:"Header",style:{width:"58vw"},modal:"",position:R.value},{header:b(()=>[ls]),footer:b(()=>[e("div",ks,[e("button",{class:"btn btn-border-orange",onClick:l[8]||(l[8]=n=>a.dialog_NewInterestFreeLoanRequest=!1)},"Cancel"),e("button",{class:"mx-4 btn btn-orange",onClick:l[9]||(l[9]=(...n)=>s(t).saveInterestfreeLoan&&s(t).saveInterestfreeLoan(...n))},"Submit")])]),default:b(()=>[e("div",ns,[e("div",rs,[e("div",is,[e("div",ds,[cs,o(T,{type:"text",modelValue:s(t).ifl.Ra,"onUpdate:modelValue":l[1]||(l[1]=n=>s(t).ifl.Ra=n),placeholder:"₹ Enter The Required Amount"},null,8,["modelValue"]),ms]),e("div",ps,[us,o(T,{type:"text",modelValue:s(t).ifl.M_EMI,"onUpdate:modelValue":l[2]||(l[2]=n=>s(t).ifl.M_EMI=n),placeholder:"₹ "},null,8,["modelValue"])]),e("div",bs,[gs,o(v,{modelValue:s(t).ifl.Term,"onUpdate:modelValue":l[3]||(l[3]=n=>s(t).ifl.Term=n),options:d.value,optionLabel:"name",placeholder:"1.5",class:"w-full md:w-10rem"},null,8,["modelValue","options"]),_s])])])]),e("div",vs,[e("div",hs,[e("div",fs,[xs,ys,e("div",ws,[$s,o(u,{modelValue:s(t).ifl.EMI_Start_Month,"onUpdate:modelValue":l[4]||(l[4]=n=>s(t).ifl.EMI_Start_Month=n),showIcon:""},null,8,["modelValue"])]),e("div",Rs,[Ts,o(u,{modelValue:a.data,"onUpdate:modelValue":l[5]||(l[5]=n=>a.data=n),showIcon:""},null,8,["modelValue"])]),e("div",Ps,[Ss,o(T,{type:"text",modelValue:s(t).ifl.Total_Months,"onUpdate:modelValue":l[6]||(l[6]=n=>s(t).ifl.Total_Months=n),style:{width:"150px !important"}},null,8,["modelValue"])])])])]),e("div",Is,[Ls,o(h,{class:"my-3 capitalize form-control textbox",autoResize:"",type:"text",rows:"3",modelValue:s(t).ifl.Reason,"onUpdate:modelValue":l[7]||(l[7]=n=>s(t).ifl.Reason=n)},null,8,["modelValue"])])]),_:1},8,["visible","position"])])]),As,e("div",Ms,[$(L(s(t).isInterestFreeLoaneature)+" ",1),o(P,{ref:"dt",dataKey:"id",paginator:!0,rows:10,value:a.sample,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:b(()=>[o(x,{header:"Request ID",field:"section",style:{"min-width":"8rem"}}),o(x,{field:"particular",header:"Advance Amount",style:{"min-width":"12rem"}}),o(x,{field:"ref",header:"Paid On ",style:{"min-width":"12rem"}}),o(x,{field:"max_limit",header:"Expected Return",style:{"min-width":"12rem"}}),o(x,{field:"Status",header:"Status",style:{"min-width":"12rem"}})]),_:1},8,["value"])])])]),o(g,{header:"Header",visible:s(t).canShowLoading,"onUpdate:visible":l[11]||(l[11]=n=>s(t).canShowLoading=n),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:b(()=>[o(r,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:b(()=>[Es]),_:1},8,["visible"])],64)}}};const Vs={class:"mr-4 card"},Ds={class:"px-5 row d-flex justify-content-start align-items-center card-body"},qs={class:"flex justify-between gap-6 my-2"},Fs=e("div",{class:"fs-4"},[e("p",{class:"text-xl font-medium"},[$("You are eligible for Travel Advance as per the "),e("span",{class:"text-lg text-primary text-decoration-underline"},"Company's Loan Policy")])],-1),Ns={class:"float-right"},Us=e("button",{class:"btn btn-border-orange"},"View Report",-1),Ws=e("i",{class:"mx-2 fa fa-plus","aria-hidden":"true"},null,-1),Os=D('<div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div>',1),Bs={class:"table-responsive"},Ys=e("div",null,[e("h1",{style:{"border-left":"3px solid var( --orange)","padding-left":"10px"},class:"fs-4"},"New Travel Advance Request")],-1),js={class:"flex pb-2 bg-gray-100 rounded-lg gap-7"},zs={class:"w-5 p-4 mx-4"},Hs=e("span",{class:"font-semibold"},"Required Amount",-1),Ks=e("p",{class:"text-sm font-semibold text-gray-500"},"Max Eligible Amount : 20,000",-1),Gs=e("div",{class:"p-4 my-6 bg-gray-100 rounded-lg gap-6"},[e("span",{class:"font-semibold"},"Repayment"),e("p",{class:"my-2 fs-5 text-gray-600 text-md"},[$("The deadline to submit the bills is on salary "),e("strong",{class:"fs-5 text-black"},"12/07/2023")])],-1),Js={class:"p-4 my-6 bg-gray-100 rounded-lg gap-6"},Qs=e("span",{class:"font-semibold"},"Reason",-1),Xs={class:"float-right"},Zs=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),eo={__name:"travel_advance",setup(_){const t=q();C(()=>{t.fetchTraveladvance()}),m(),m(["Off","On"]);const R=m("center"),p=d=>{R.value=d,t.dialog_TravelAdvance=!0};return(d,a)=>{const l=c("Column"),T=c("DataTable"),v=c("Textarea"),u=c("Dialog"),h=c("ProgressSpinner");return y(),w(V,null,[e("div",Vs,[e("div",Ds,[e("div",qs,[Fs,e("div",Ns,[Us,e("button",{class:"mx-4 btn btn-orange",onClick:a[0]||(a[0]=g=>p("top"))},[Ws,$("New Request")])])]),Os,e("div",Bs,[o(T,{ref:"dt",dataKey:"id",paginator:!0,rows:10,value:d.sample,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:b(()=>[o(l,{header:"Request ID",field:"section",style:{"min-width":"8rem"}}),o(l,{field:"particular",header:"Advance Amount",style:{"min-width":"12rem"}}),o(l,{field:"ref",header:"Paid On ",style:{"min-width":"12rem"}}),o(l,{field:"max_limit",header:"Expected Return",style:{"min-width":"12rem"}}),o(l,{field:"Status",header:"Status",style:{"min-width":"12rem"}})]),_:1},8,["value"])])])]),o(u,{visible:s(t).dialog_TravelAdvance,"onUpdate:visible":a[5]||(a[5]=g=>s(t).dialog_TravelAdvance=g),modal:"",style:{width:"50vw"}},{header:b(()=>[Ys]),default:b(()=>[e("div",js,[e("div",zs,[Hs,A(e("input",{id:"rentFrom_month","onUpdate:modelValue":a[1]||(a[1]=g=>s(t).ta.ra=g),class:"my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"},null,512),[[M,s(t).ta.ra]]),Ks])]),Gs,e("div",Js,[Qs,o(v,{modelValue:s(t).ta.reason,"onUpdate:modelValue":a[2]||(a[2]=g=>s(t).ta.reason=g),class:"my-3 capitalize form-control textbox",autoResize:"",type:"text",rows:"3"},null,8,["modelValue"])]),e("div",Xs,[e("button",{class:"btn btn-border-orange",onClick:a[3]||(a[3]=g=>s(t).dialog_TravelAdvance=!1)},"Cancel"),e("button",{class:"mx-4 btn btn-orange",onClick:a[4]||(a[4]=(...g)=>s(t).saveTravelAdvance&&s(t).saveTravelAdvance(...g))},"Submit")])]),_:1},8,["visible"]),o(u,{header:"Header",visible:s(t).canShowLoading,"onUpdate:visible":a[6]||(a[6]=g=>s(t).canShowLoading=g),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:b(()=>[o(h,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:b(()=>[Zs]),_:1},8,["visible"])],64)}}},to={class:"p-4 pt-1 pb-0 mb-3 bg-white rounded-lg tw-card left-line"},so={class:"divide-x nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},oo={class:"mx-2 nav-item",role:"presentation"},ao={class:"mx-3 nav-item",role:"presentation"},lo={class:"mx-3 nav-item",role:"presentation"},no={class:"mx-3 nav-item",role:"presentation"},ro={class:"tab-content",id:""},io={key:0},co={key:1},mo={key:2},po={key:3},uo={__name:"employee_salary_loan",setup(_){const t=m(1);return(R,p)=>(y(),w("div",null,[e("div",to,[e("ul",so,[e("li",oo,[e("a",{class:I(["nav-link",[t.value===1?"active":""]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:p[0]||(p[0]=d=>t.value=1)}," Salary Advance ",2)]),e("li",ao,[e("a",{class:I(["mx-4 text-center nav-link",[t.value===2?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:p[1]||(p[1]=d=>t.value=2),role:"tab","aria-controls":"","aria-selected":"true"}," Interest Free Loan ",2)]),e("li",lo,[e("a",{class:I(["mx-4 text-center nav-link",[t.value===3?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:p[2]||(p[2]=d=>t.value=3),role:"tab","aria-controls":"","aria-selected":"true"}," Travel Advance ",2)]),e("li",no,[e("a",{class:I(["mx-4 text-center nav-link",[t.value===4?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:p[3]||(p[3]=d=>t.value=4),role:"tab","aria-controls":"","aria-selected":"true"}," Loan With Interest ",2)])])]),e("div",ro,[t.value===1?(y(),w("div",io,[o(ot)])):k("",!0),t.value===2?(y(),w("div",co,[o(Cs)])):k("",!0),t.value===3?(y(),w("div",mo,[o(eo)])):k("",!0),t.value===4?(y(),w("div",po,[o(Qt)])):k("",!0)])]))}},i=H(uo),bo=le();i.use(K,{ripple:!0});i.use(ue);i.use(G);i.use(pe);i.use(bo);i.directive("tooltip",ne);i.directive("badge",re);i.directive("ripple",J);i.directive("styleclass",ie);i.directive("focustrap",Q);i.component("Button",X);i.component("RadioButton",we);i.component("DataTable",de);i.component("Column",ce);i.component("ColumnGroup",_e);i.component("Row",ge);i.component("Toast",Z);i.component("ConfirmDialog",ee);i.component("Dropdown",te);i.component("InputText",se);i.component("Dialog",oe);i.component("ProgressSpinner",be);i.component("Calendar",ve);i.component("Textarea",he);i.component("Chips",fe);i.component("MultiSelect",xe);i.component("InputNumber",me);i.component("SelectButton",ye);i.component("Checkbox",$e);i.mount("#EmpSalaryAdvanceLoan");
