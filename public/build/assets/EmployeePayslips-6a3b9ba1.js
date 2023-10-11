import{d as k}from"./dayjs.min-2f06af28.js";import{a as H}from"./index-362795f3.js";import{q as O,r as _,u as U,a as j,o as $,R,c as V,e as s,f as a,h as n,k as C,j as v,g as e,n as T,l as A,i as x,t as l,F as c,m as d,p as w}from"./app-e362a0cc.js";import{S as Y}from"./Service-c1d85a6b.js";import{p as G}from"./ProfilePagesStore-8351d7f9.js";/* empty css                                                                       */const W=O("EmployeeDocumentManagerService",()=>{const L=Y(),o=_(!1),b=_([]);_();const P=_(),y=G();return{EmployeeDocs_upload:_({AadharCardFront:null,AadharCardBack:null,PanCardDoc:null,DrivingLicenseDoc:null,EductionDoc:null,VoterIdDoc:null,RelievingLetterDoc:null,PassportDoc:null,save_draft_messege:null}),getEmployeeDetails:L,getEmployeeDoc:b,getEmpdocPhoto:P,fetch_EmployeeDocument:async()=>{let p=y.employeeDetails.user_code;await L.getCurrentUserCode().then(f=>{p=f.data}),o.value=!0,await H.post("/employee-documents-details",{user_code:p}).then(f=>{b.value=f.data.data,console.log("employee document : ",b.value)}).finally(()=>{o.value=!1,console.log("completed")})},loading:o}}),q=O("employeePayslipStore",()=>{const L=W(),o=_(),b=_(),P=_("");U();const y=j(),E=Y(),h=_(!1);new URLSearchParams(window.location.search);const p=_(!1);function f(){return y.params.user_code?y.params.user_code:E.current_user_code}async function t(){p.value=!0,H.post("/payroll/paycheck/getEmployeeAllPayslipList",{user_code:f()}).then(S=>{o.value=S.data.data}).finally(()=>{p.value=!1})}async function i(S,g){p.value=!0,P.value=g;let D=parseInt(k(g).month())+1,M=k(g).year();await H.post("/empViewPayslipdetails",{uid:f(),user_code:S,month:D,year:M}).then(m=>{b.value=m.data,h.value=!0}).finally(()=>{p.value=!1})}function r(S,g,D,M){const m=S,u=document.createElement("a"),N=`${g}-${D}-${M}.pdf`;u.href=m,u.download=N,u.click()}async function B(S,g){p.value=!0,L.loading=!0,console.log("Downloading payslip PDF.....");let D=parseInt(k(g).month())+1,M=k(g).year();await H.post("/empGeneratePayslipPdfMail",{uid:f(),user_code:S,month:D,year:M,type:"pdf"}).then(m=>{if(console.log(" Response [downloadPayslipReleaseStatus] : "+JSON.stringify(m.data.data.payslip)),m.data){let u=m.data.data.payslip,N=m.data.data.emp_name,F=m.data.data.month,I=m.data.data.year;console.log(u),u&&(u.startsWith("JVB")?(u="data:application/pdf;base64,"+u,r(u,N,F,I)):u.startsWith("data:application/pdf;base64")&&r(u))}else console.log("Response Url Not Found")}).finally(()=>{L.loading=!1,p.value=!1})}return{Payroll_month:P,array_employeePayslips_list:o,paySlipHTMLView:b,canShowPayslipView:h,loading:p,getEmployeeAllPayslipList:t,getEmployeePayslipDetailsAsHTML:i,getEmployeePayslipDetailsAsPDF:B}});const J={class:"w-full"},K=e("h2",{class:"my-2 text-lg font-semibold"},"Salary Details",-1),z=["onClick"],Q=e("i",{class:"pi pi-download"},null,-1),X=[Q],Z={class:"flex justify-center w-[100%] my-3 rounded-lg"},ee={class:"w-[95%] h-[90%] shadow-lg p-4"},te={class:"w-[100%] flex justify-between"},se={class:"flex flex-col"},ae={class:"text-[25px] flex items-center"},oe={class:"text-gray-500 text-[25px]"},le=["src"],ne={class:"mt-[30px]"},ie=e("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),ce={class:"col-3"},de=e("p",{class:""},"Employee Code",-1),re={class:"text-[#000] text-[12px]"},_e={class:"col-3"},pe=e("p",null,"Date Joining",-1),ue={class:"text-[#000]"},ye={class:"col-3"},he=e("p",null,"Department",-1),me={class:"text-[#000]"},xe={class:"col-3"},be=e("p",null,"Designation",-1),fe={class:"text-[#000]"},ve={class:"col-3"},ge=e("p",null,"Payment Mode",-1),we={class:"text-[#000]"},Se={class:"col-3"},Te=e("p",null,"Bank Name",-1),Le={class:"text-[#000]"},Pe={class:"col-3"},ke=e("p",null,"Bank Account",-1),De={class:"text-[#000]"},Me={class:"col-3"},Ae=e("p",null,"Bank ISFC",-1),Ee={class:"text-[#000]"},Ve={class:"col-3"},He=e("p",null,"PAN",-1),Ne={class:"text-[#000]"},Re=e("div",{class:"col-3"},[e("p",null,"ESIC"),e("p",{class:"text-[#000]"},l("-"))],-1),Ce={class:"col-3"},Oe=e("p",null,"UAN",-1),Ye={class:"text-[#000]"},Be={class:"col-3"},Fe=e("p",null,"EPF Number",-1),Ie={class:"text-[#000]"},Ue=e("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),je={class:""},$e=e("h1",{class:"font-semibold text-[16px] my-[16px]"},"LEAVE DETAILS",-1),Ge=e("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),We={class:"py-2 mx-2 row"},qe={class:"col-3"},Je=e("p",null,"Leave Type",-1),Ke={class:"col-3"},ze=e("p",null,"Opening Balance",-1),Qe={class:"col-3"},Xe=e("p",null,"Availed",-1),Ze={class:"col-3"},et=e("p",null,"Closing Balance",-1),tt={class:""},st=e("h1",{class:"font-semibold text-[16px] my-[16px]"},"SALARY DETAILS",-1),at=e("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),ot={class:"col-3"},lt=e("p",null,"ACTUAL PAYABLE DAYS",-1),nt={class:"text-[#000]"},it={class:"col-3"},ct=e("p",null,"TOTAL WORKING DAYS",-1),dt={class:"text-[#000]"},rt={class:"col-3"},_t=e("p",null,"LOSS OF PAY DAYS",-1),pt={class:"text-[#000]"},ut={class:"col-3"},yt=e("p",null,"ARREAR DAYS PAYABLE",-1),ht={class:"text-[#000]"},mt={class:"row mt-2 py-2 border-y-[1px] border-[gray] mx-2"},xt={class:"col-7 border-r-[1.4px] border-[gray]"},bt={class:"row"},ft={class:"col-6"},vt=e("h1",{class:"font-semibold"},"Earnings",-1),gt={key:0,class:"font-semibold text-black"},wt={class:"col-2"},St={key:0,class:"font-semibold text-right"},Tt={class:"col-2"},Lt={key:0,class:"font-semibold text-right"},Pt={class:"col-2"},kt=e("h1",{class:"font-semibold text-right"},"Earned",-1),Dt={class:"col"},Mt={border:"2",class:"w-[100%]"},At={class:"w-[100%]"},Et=e("h1",{class:"font-semibold"},"CONTRIBUTIONS",-1),Vt={key:0,class:"text-black font-semibold text-[14px]"},Ht=e("h1",{class:"font-semibold"}," ",-1),Nt={class:"w-[100%]"},Rt=e("h1",{class:"font-semibold"},"Tax Deduction",-1),Ct={key:0,class:"text-[14px] text-[#000] font-semibold"},Ot=e("h1",{class:"font-semibold"}," ",-1),Yt={class:"my-2 col-6"},Bt={key:0,class:"font-semibold text-black"},Ft={class:"my-2 col-6"},It={class:"text-[16px] text-[#000]"},Ut=e("div",null,[e("p",{class:"mt-2 font-semibold flex text-[#000]"},[x("*** Note:All "),e("span",{class:"text-[16px] text-[#000]"},"amounts displayed in this payslips are in"),x(" INR")]),e("p",{class:"mt-[50px] font-semibold text-[#000]"},"**This is computer generated statement,does not require signature.")],-1),jt={class:""},$t={class:"flex items-center float-right"},Gt=e("p",{class:"mx-2"},"Powered by ",-1),Wt=["src"],Zt={__name:"EmployeePayslips",setup(L){const o=q();_(!0),_(),$(()=>{console.log("EmployeePayslips,vue loaded"),o.getEmployeeAllPayslipList()});const b=_({PAYROLL_MONTH:{value:null,matchMode:R.STARTS_WITH,matchMode:R.EQUALS,matchMode:R.CONTAINS}});return(P,y)=>{const E=V("LoadingSpinner"),h=V("Column"),p=V("DataTable"),f=V("Sidebar");return s(),a(c,null,[n(o).loading?(s(),C(E,{key:0,class:"absolute z-50 bg-white"})):v("",!0),e("div",J,[K,T(p,{value:n(o).array_employeePayslips_list,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],sortField:"PAYROLL_MONTH",sortOrder:-1,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:b.value,"onUpdate:filters":y[0]||(y[0]=t=>b.value=t),filterDisplay:"menu",loading:P.loading2,globalFilterFields:["name"]},{default:A(()=>[T(h,{field:"PAYROLL_MONTH",header:"Month",sortable:!0},{body:A(t=>[x(l(n(k)(t.data.PAYROLL_MONTH).format("DD-MMM-YYYY")),1)]),_:1}),T(h,{field:"TOTAL_EARNED_GROSS",header:"Gross Pay"}),T(h,{field:"Reimbursements",header:"Reimbursements"},{body:A(t=>[x(l(0))]),_:1}),T(h,{field:"TOTAL_DEDUCTIONS",header:"Deductions"}),T(h,{field:"NET_TAKE_HOME",header:"Take Home"}),T(h,{header:"Action"},{body:A(t=>[e("button",{class:"border-[2px] border-[#000] py-2 px-3 rounded-md",onClick:i=>n(o).getEmployeePayslipDetailsAsHTML("",t.data.PAYROLL_MONTH)},"View",8,z)]),_:1})]),_:1},8,["value","filters","loading"])]),n(o).canShowPayslipView?(s(),C(f,{key:1,position:"right",visible:n(o).canShowPayslipView,"onUpdate:visible":y[2]||(y[2]=t=>n(o).canShowPayslipView=t),modal:"",header:"Payslip",style:{width:"70vw"}},{default:A(()=>[e("button",{class:"flex items-center p-2 absolute top-5 border-[1px] mx-2 text-[#000] rounded-md h-[33px]",onClick:y[1]||(y[1]=t=>n(o).getEmployeePayslipDetailsAsPDF("",n(o).Payroll_month))},X),e("div",Z,[e("div",ee,[e("div",te,[e("div",se,[e("h1",ae,[x("PAYSLIP "),e("span",oe,l(n(o).paySlipHTMLView.data.date_month.Month)+" "+l(n(o).paySlipHTMLView.data.date_month.Year),1)]),(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.client_details,t=>(s(),a("h2",{class:"text-[16px] mt-[10px] text-[#000] font-semibold",key:t},l(t.client_fullname),1))),128)),(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.client_details,t=>(s(),a("p",{class:"w-[300px] mt-[10px]",key:t},l(t.address),1))),128))]),(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.client_details,t=>(s(),a("div",{key:t},[e("img",{src:`${t.client_logo}`,alt:"testing",class:"w-[200px]"},null,8,le)]))),128))]),e("div",ne,[(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.personal_details,t=>(s(),a("h1",{class:"font-semibold text-[16px] my-[16px]",key:t}," Employee Name : "+l(t.name),1))),128)),ie,(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.personal_details,t=>(s(),a("div",{class:"mx-2 row border-b-[1px] border-[gray] py-2",key:t},[e("div",ce,[de,e("p",re,l(t.user_code?t.user_code:"-"),1)]),e("div",_e,[pe,e("p",ue,l(t.doj?n(k)(t.doj).format("DD-MMM-YYYY"):"-"),1)]),e("div",ye,[he,e("p",me,l(t.department_name?t.department_name:"-"),1)]),e("div",xe,[be,e("p",fe,l(t.designation?t.designation:"-"),1)])]))),128)),(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.personal_details,t=>(s(),a("div",{class:"mx-2 row border-b-[1px] border-[gray] py-2",key:t},[e("div",ve,[ge,e("p",we,l(t.bank_account_number?"Bank":"cheque"),1)]),e("div",Se,[Te,e("p",Le,l(t.bank_name?t.bank_name:"-"),1)]),e("div",Pe,[ke,e("p",De,l(t.bank_account_number?t.bank_account_number:"-"),1)]),e("div",Me,[Ae,e("p",Ee,l(t.bank_ifsc_code?t.bank_ifsc_code:"-"),1)])]))),128)),(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.personal_details,t=>(s(),a("div",{class:"py-2 mx-2 row",key:t},[e("div",Ve,[He,e("p",Ne,l(t.pan_number?t.pan_number:"-"),1)]),Re,e("div",Ce,[Oe,e("p",Ye,l(t.uan_number?t.uan_number:"-"),1)]),e("div",Be,[Fe,e("p",Ie,l(t.epf_number?t.epf_number:"-"),1)])]))),128)),Ue]),e("div",je,[$e,Ge,e("div",We,[e("div",qe,[Je,(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.leave_data,t=>(s(),a("p",{class:"text-[#000]",key:t},l(t.leave_type?t.leave_type:"-"),1))),128))]),e("div",Ke,[ze,(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.leave_data,t=>(s(),a("p",{class:"text-[#000]",key:t},l(t.opening_balance?t.opening_balance:"-"),1))),128))]),e("div",Qe,[Xe,(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.leave_data,t=>(s(),a("p",{class:"text-[#000]",key:t},l(t.availed?t.availed:"-"),1))),128))]),e("div",Ze,[et,(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.leave_data,t=>(s(),a("p",{class:"text-[#000]",key:t},l(t.closing_balance?t.closing_balance:"-"),1))),128))])])]),e("div",tt,[st,at,(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.salary_details,t=>(s(),a("div",{class:"py-2 mx-2 row",key:t},[e("div",ot,[lt,e("p",nt,l(t.month_days?t.month_days:"-"),1)]),e("div",it,[ct,e("p",dt,l(t.worked_Days?t.worked_Days:"-"),1)]),e("div",rt,[_t,e("p",pt,l(t.lop?t.lop:"-"),1)]),e("div",ut,[yt,e("p",ht,l(t.arrears_Days?t.arrears_Days:"-"),1)])]))),128))]),e("div",mt,[e("div",xt,[e("div",bt,[e("div",ft,[vt,(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.earnings[0],(t,i,r)=>(s(),a("h1",{class:w(["flex items-center my-3",[i=="Total Earnings"?"text-black font-semibold":"text-black"]]),key:r},[x(l(i)+" ",1),i=="Total Earnings"?(s(),a("span",gt,"(A)")):v("",!0)],2))),128))]),e("div",wt,[n(o).paySlipHTMLView.data.compensatory_data[0]?(s(),a("h1",St,"Fixed")):v("",!0),(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.compensatory_data[0],(t,i,r)=>(s(),a("h1",{key:r,class:"mt-[12px] text-black text-right"},l(t),1))),128))]),e("div",Tt,[n(o).paySlipHTMLView.data.arrears[0]!=""?(s(),a("h1",Lt,"Arrears")):v("",!0),(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.arrears[0],(t,i,r)=>(s(),a("h1",{key:r,class:"mt-[12px]"},l(t),1))),128))]),e("div",Pt,[kt,(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.earnings[0],(t,i,r)=>(s(),a("h1",{key:r,class:w(["my-3 text-right",[i=="Total Earnings"?"text-black text-[14px] font-semibold":""]])},l(t),3))),128))])])]),e("div",Dt,[e("table",Mt,[e("tr",At,[e("td",null,[Et,(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.contribution[0],(t,i,r)=>(s(),a("p",{class:w(["my-2 text-[#000] flex",[i=="Total Contribution"?"text-[14px] text-[#000] font-semibold":" text-black"]]),key:r},[x(l(i)+" ",1),i=="Total Contribution"?(s(),a("span",Vt," (B)")):v("",!0)],2))),128))]),e("td",null,[Ht,(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.contribution[0],(t,i,r)=>(s(),a("p",{class:w(["my-2 text-[#000] text-right",[i=="Total Contribution"?"text-[13px] text-[#000] font-semibold":" text-black"]]),key:r},l(t),3))),128))])]),e("tr",Nt,[e("td",null,[Rt,(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.Tax_Deduction[0],(t,i,r)=>(s(),a("p",{class:w(["my-2 text-[#000] flex items-center",[i=="Total Deduction"?"text-[14px] text-[#000] font-semibold":" text-black"]]),key:r},[x(l(i)+" ",1),i=="Total Deduction"?(s(),a("span",Ct," (C)")):v("",!0)],2))),128))]),e("td",null,[Ot,(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.Tax_Deduction[0],(t,i,r)=>(s(),a("p",{class:w(["my-2 text-[#000] text-right",[i=="Total Deduction"?"text-[14px] text-[#000] font-semibold":" text-black"]]),key:r},l(t),3))),128))])])])])]),(s(!0),a(c,null,d(n(o).paySlipHTMLView.data.over_all[0],(t,i,r)=>(s(),a("div",{class:"my-2 row w-[100%]",key:r},[e("div",Yt,[e("p",{class:w(["text-[#000]",[i=="Net Salary Payable"||i=="Net Salary in words"?"text-black text-[14px] font-semibold":""]])},[x(l(i)+" ",1),i=="Net Salary Payable"?(s(),a("span",Bt,"(A-B-C)")):v("",!0)],2)]),e("div",Ft,[e("p",It,[i=="Net Salary Payable"?(s(),a("span",{key:0,class:w(["text-[16px] font-semibold text-right",[i=="Net Salary Payable"?"text-black text-[14px] font-semibold":""]]),style:{"font-family":"sans-serif !important"}},"₹ ",2)):v("",!0),x(l(t),1)])])]))),128)),Ut,e("div",jt,[e("div",$t,[Gt,e("img",{src:`${n(o).paySlipHTMLView.data.date_month.abs_logo}`,alt:"",class:"w-[140px] h-[50px]"},null,8,Wt)])])])])]),_:1},8,["visible"])):v("",!0)],64)}}};export{W as U,Zt as _};
