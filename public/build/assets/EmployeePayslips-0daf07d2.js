import{d as w}from"./dayjs.min-2f06af28.js";import{a as N}from"./index-362795f3.js";import{Q as f,ab as B,a7 as O,o as s,c as a,aa as n,b as R,a as x,d as t,h as g,w as k,l as y,t as l,F as d,f as c,g as D,n as b}from"./inputnumber.esm-e362c3ab.js";import{d as F}from"./pinia-641035e3.js";import{U as I}from"./EmployeeDocumentsManagerService-bcb31e26.js";/* empty css                                                                       */const U=F("employeePayslipStore",()=>{const V=I(),o=f(),S=f(),M=f(""),h=f(!1),A=new URLSearchParams(window.location.search),_=f(!1);function T(){return A.has("uid")?A.get("uid"):""}async function E(){_.value=!0,N.post("/payroll/paycheck/getEmployeeAllPayslipList",{uid:T()}).then(v=>{o.value=v.data.data}).finally(()=>{_.value=!1})}async function e(v,m){_.value=!0,M.value=m;let L=parseInt(w(m).month())+1,P=w(m).year();await N.post("/empViewPayslipdetails",{uid:T(),user_code:v,month:L,year:P}).then(u=>{S.value=u.data,h.value=!0}).finally(()=>{_.value=!1})}function i(v,m,L,P){const u=v,p=document.createElement("a"),H=`${m}-${L}-${P}.pdf`;p.href=u,p.download=H,p.click()}async function r(v,m){_.value=!0,V.loading=!0,console.log("Downloading payslip PDF.....");let L=parseInt(w(m).month())+1,P=w(m).year();await N.post("/empGeneratePayslipPdfMail",{uid:T(),user_code:v,month:L,year:P,type:"pdf"}).then(u=>{if(console.log(" Response [downloadPayslipReleaseStatus] : "+JSON.stringify(u.data.data.payslip)),u.data){let p=u.data.data.payslip,H=u.data.data.emp_name,C=u.data.data.month,Y=u.data.data.year;console.log(p),p&&(p.startsWith("JVB")?(p="data:application/pdf;base64,"+p,i(p,H,C,Y)):p.startsWith("data:application/pdf;base64")&&i(p))}else console.log("Response Url Not Found")}).finally(()=>{V.loading=!1,_.value=!1})}return{Payroll_month:M,array_employeePayslips_list:o,paySlipHTMLView:S,canShowPayslipView:h,loading:_,getEmployeeAllPayslipList:E,getEmployeePayslipDetailsAsHTML:e,getEmployeePayslipDetailsAsPDF:r}});const $={class:"w-full"},j=t("h2",{class:"my-2 text-lg font-semibold"},"Salary Details",-1),G=["onClick"],W=t("i",{class:"pi pi-download"},null,-1),J=[W],K={class:"flex justify-center w-[100%] my-3 rounded-lg"},q={class:"w-[95%] h-[90%] shadow-lg p-4"},z={class:"w-[100%] flex justify-between"},Q={class:"flex flex-col"},X={class:"text-[25px] flex items-center"},Z={class:"text-gray-500 text-[25px]"},tt=["src"],et={class:"mt-[30px]"},st=t("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),at={class:"col-3"},ot=t("p",{class:""},"Employee Code",-1),lt={class:"text-[#000] text-[12px]"},nt={class:"col-3"},it=t("p",null,"Date Joining",-1),dt={class:"text-[#000]"},ct={class:"col-3"},rt=t("p",null,"Department",-1),_t={class:"text-[#000]"},pt={class:"col-3"},ut=t("p",null,"Designation",-1),yt={class:"text-[#000]"},ht={class:"col-3"},xt=t("p",null,"Payment Mode",-1),mt={class:"text-[#000]"},bt={class:"col-3"},ft=t("p",null,"Bank Name",-1),vt={class:"text-[#000]"},gt={class:"col-3"},wt=t("p",null,"Bank Account",-1),St={class:"text-[#000]"},Tt={class:"col-3"},Lt=t("p",null,"Bank ISFC",-1),Pt={class:"text-[#000]"},kt={class:"col-3"},Mt=t("p",null,"PAN",-1),At={class:"text-[#000]"},Dt=t("div",{class:"col-3"},[t("p",null,"ESIC"),t("p",{class:"text-[#000]"},l("-"))],-1),Vt={class:"col-3"},Et=t("p",null,"UAN",-1),Ht={class:"text-[#000]"},Nt={class:"col-3"},Ot=t("p",null,"EPF Number",-1),Rt={class:"text-[#000]"},Ct=t("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),Yt={class:""},Bt=t("h1",{class:"font-semibold text-[16px] my-[16px]"},"LEAVE DETAILS",-1),Ft=t("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),It={class:"py-2 mx-2 row"},Ut={class:"col-3"},$t=t("p",null,"Leave Type",-1),jt={class:"col-3"},Gt=t("p",null,"Opening Balance",-1),Wt={class:"col-3"},Jt=t("p",null,"Availed",-1),Kt={class:"col-3"},qt=t("p",null,"Closing Balance",-1),zt={class:""},Qt=t("h1",{class:"font-semibold text-[16px] my-[16px]"},"SALARY DETAILS",-1),Xt=t("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),Zt={class:"col-3"},te=t("p",null,"ACTUAL PAYABLE DAYS",-1),ee={class:"text-[#000]"},se={class:"col-3"},ae=t("p",null,"TOTAL WORKING DAYS",-1),oe={class:"text-[#000]"},le={class:"col-3"},ne=t("p",null,"LOSS OF PAY DAYS",-1),ie={class:"text-[#000]"},de={class:"col-3"},ce=t("p",null,"ARREAR DAYS PAYABLE",-1),re={class:"text-[#000]"},_e={class:"row mt-2 py-2 border-y-[1px] border-[gray] mx-2"},pe={class:"col-7 border-r-[1.4px] border-[gray]"},ue={class:"row"},ye={class:"col-6"},he=t("h1",{class:"font-semibold"},"Earnings",-1),xe={key:0,class:"font-semibold text-black"},me={class:"col-2"},be={key:0,class:"font-semibold text-right"},fe={class:"col-2"},ve={key:0,class:"font-semibold text-right"},ge={class:"col-2"},we=t("h1",{class:"font-semibold text-right"},"Earned",-1),Se={class:"col"},Te={border:"2",class:"w-[100%]"},Le={class:"w-[100%]"},Pe=t("h1",{class:"font-semibold"},"CONTRIBUTIONS",-1),ke={key:0,class:"text-black font-semibold text-[14px]"},Me=t("h1",{class:"font-semibold"}," ",-1),Ae={class:"w-[100%]"},De=t("h1",{class:"font-semibold"},"Tax Deduction",-1),Ve={key:0,class:"text-[14px] text-[#000] font-semibold"},Ee=t("h1",{class:"font-semibold"}," ",-1),He={class:"my-2 col-6"},Ne={key:0,class:"font-semibold text-black"},Oe={class:"my-2 col-6"},Re={class:"text-[16px] text-[#000]"},Ce=t("div",null,[t("p",{class:"mt-2 font-semibold flex text-[#000]"},[y("*** Note:All "),t("span",{class:"text-[16px] text-[#000]"},"amounts displayed in this payslips are in"),y(" INR")]),t("p",{class:"mt-[50px] font-semibold text-[#000]"},"**This is computer generated statement,does not require signature.")],-1),Ye={class:""},Be={class:"flex items-center float-right"},Fe=t("p",{class:"mx-2"},"Powered by ",-1),Ie=["src"],Ke={__name:"EmployeePayslips",setup(V){const o=U();f(!0),f(),B(()=>{console.log("EmployeePayslips,vue loaded"),o.getEmployeeAllPayslipList()});const S=f({PAYROLL_MONTH:{value:null,matchMode:O.STARTS_WITH,matchMode:O.EQUALS,matchMode:O.CONTAINS}});return(M,h)=>{const A=D("LoadingSpinner"),_=D("Column"),T=D("DataTable"),E=D("Sidebar");return s(),a(d,null,[n(o).loading?(s(),R(A,{key:0,class:"absolute z-50 bg-white"})):x("",!0),t("div",$,[j,g(T,{value:n(o).array_employeePayslips_list,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],sortField:"PAYROLL_MONTH",sortOrder:-1,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:S.value,"onUpdate:filters":h[0]||(h[0]=e=>S.value=e),filterDisplay:"menu",loading:M.loading2,globalFilterFields:["name"]},{default:k(()=>[g(_,{field:"PAYROLL_MONTH",header:"Month",sortable:!0},{body:k(e=>[y(l(n(w)(e.data.PAYROLL_MONTH).format("DD-MMM-YYYY")),1)]),_:1}),g(_,{field:"TOTAL_EARNED_GROSS",header:"Gross Pay"}),g(_,{field:"Reimbursements",header:"Reimbursements"},{body:k(e=>[y(l(0))]),_:1}),g(_,{field:"TOTAL_DEDUCTIONS",header:"Deductions"}),g(_,{field:"NET_TAKE_HOME",header:"Take Home"}),g(_,{header:"Action"},{body:k(e=>[t("button",{class:"border-[2px] border-[#000] py-2 px-3 rounded-md",onClick:i=>n(o).getEmployeePayslipDetailsAsHTML("",e.data.PAYROLL_MONTH)},"View",8,G)]),_:1})]),_:1},8,["value","filters","loading"])]),n(o).canShowPayslipView?(s(),R(E,{key:1,position:"right",visible:n(o).canShowPayslipView,"onUpdate:visible":h[2]||(h[2]=e=>n(o).canShowPayslipView=e),modal:"",header:"Payslip",style:{width:"70vw"}},{default:k(()=>[t("button",{class:"flex items-center p-2 absolute top-5 border-[1px] mx-2 text-[#000] rounded-md h-[33px]",onClick:h[1]||(h[1]=e=>n(o).getEmployeePayslipDetailsAsPDF("",n(o).Payroll_month))},J),t("div",K,[t("div",q,[t("div",z,[t("div",Q,[t("h1",X,[y("PAYSLIP "),t("span",Z,l(n(o).paySlipHTMLView.data.date_month.Month)+" "+l(n(o).paySlipHTMLView.data.date_month.Year),1)]),(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.client_details,e=>(s(),a("h2",{class:"text-[16px] mt-[10px] text-[#000] font-semibold",key:e},l(e.client_fullname),1))),128)),(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.client_details,e=>(s(),a("p",{class:"w-[300px] mt-[10px]",key:e},l(e.address),1))),128))]),(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.client_details,e=>(s(),a("div",{key:e},[t("img",{src:`${e.client_logo}`,alt:"testing",class:"w-[200px]"},null,8,tt)]))),128))]),t("div",et,[(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.personal_details,e=>(s(),a("h1",{class:"font-semibold text-[16px] my-[16px]",key:e}," Employee Name : "+l(e.name),1))),128)),st,(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.personal_details,e=>(s(),a("div",{class:"mx-2 row border-b-[1px] border-[gray] py-2",key:e},[t("div",at,[ot,t("p",lt,l(e.user_code?e.user_code:"-"),1)]),t("div",nt,[it,t("p",dt,l(e.doj?n(w)(e.doj).format("DD-MMM-YYYY"):"-"),1)]),t("div",ct,[rt,t("p",_t,l(e.department_name?e.department_name:"-"),1)]),t("div",pt,[ut,t("p",yt,l(e.designation?e.designation:"-"),1)])]))),128)),(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.personal_details,e=>(s(),a("div",{class:"mx-2 row border-b-[1px] border-[gray] py-2",key:e},[t("div",ht,[xt,t("p",mt,l(e.bank_account_number?"Bank":"cheque"),1)]),t("div",bt,[ft,t("p",vt,l(e.bank_name?e.bank_name:"-"),1)]),t("div",gt,[wt,t("p",St,l(e.bank_account_number?e.bank_account_number:"-"),1)]),t("div",Tt,[Lt,t("p",Pt,l(e.bank_ifsc_code?e.bank_ifsc_code:"-"),1)])]))),128)),(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.personal_details,e=>(s(),a("div",{class:"py-2 mx-2 row",key:e},[t("div",kt,[Mt,t("p",At,l(e.pan_number?e.pan_number:"-"),1)]),Dt,t("div",Vt,[Et,t("p",Ht,l(e.uan_number?e.uan_number:"-"),1)]),t("div",Nt,[Ot,t("p",Rt,l(e.epf_number?e.epf_number:"-"),1)])]))),128)),Ct]),t("div",Yt,[Bt,Ft,t("div",It,[t("div",Ut,[$t,(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.leave_data,e=>(s(),a("p",{class:"text-[#000]",key:e},l(e.leave_type?e.leave_type:"-"),1))),128))]),t("div",jt,[Gt,(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.leave_data,e=>(s(),a("p",{class:"text-[#000]",key:e},l(e.opening_balance?e.opening_balance:"-"),1))),128))]),t("div",Wt,[Jt,(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.leave_data,e=>(s(),a("p",{class:"text-[#000]",key:e},l(e.availed?e.availed:"-"),1))),128))]),t("div",Kt,[qt,(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.leave_data,e=>(s(),a("p",{class:"text-[#000]",key:e},l(e.closing_balance?e.closing_balance:"-"),1))),128))])])]),t("div",zt,[Qt,Xt,(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.salary_details,e=>(s(),a("div",{class:"py-2 mx-2 row",key:e},[t("div",Zt,[te,t("p",ee,l(e.month_days?e.month_days:"-"),1)]),t("div",se,[ae,t("p",oe,l(e.worked_Days?e.worked_Days:"-"),1)]),t("div",le,[ne,t("p",ie,l(e.lop?e.lop:"-"),1)]),t("div",de,[ce,t("p",re,l(e.arrears_Days?e.arrears_Days:"-"),1)])]))),128))]),t("div",_e,[t("div",pe,[t("div",ue,[t("div",ye,[he,(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.earnings[0],(e,i,r)=>(s(),a("h1",{class:b(["flex items-center my-3",[i=="Total Earnings"?"text-black font-semibold":"text-black"]]),key:r},[y(l(i)+" ",1),i=="Total Earnings"?(s(),a("span",xe,"(A)")):x("",!0)],2))),128))]),t("div",me,[n(o).paySlipHTMLView.data.compensatory_data[0]?(s(),a("h1",be,"Fixed")):x("",!0),(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.compensatory_data[0],(e,i,r)=>(s(),a("h1",{key:r,class:"mt-[12px] text-black text-right"},l(e),1))),128))]),t("div",fe,[n(o).paySlipHTMLView.data.arrears[0]!=""?(s(),a("h1",ve,"Arrears")):x("",!0),(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.arrears[0],(e,i,r)=>(s(),a("h1",{key:r,class:"mt-[12px]"},l(e),1))),128))]),t("div",ge,[we,(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.earnings[0],(e,i,r)=>(s(),a("h1",{key:r,class:b(["my-3 text-right",[i=="Total Earnings"?"text-black text-[14px] font-semibold":""]])},l(e),3))),128))])])]),t("div",Se,[t("table",Te,[t("tr",Le,[t("td",null,[Pe,(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.contribution[0],(e,i,r)=>(s(),a("p",{class:b(["my-2 text-[#000] flex",[i=="Total Contribution"?"text-[14px] text-[#000] font-semibold":" text-black"]]),key:r},[y(l(i)+" ",1),i=="Total Contribution"?(s(),a("span",ke," (B)")):x("",!0)],2))),128))]),t("td",null,[Me,(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.contribution[0],(e,i,r)=>(s(),a("p",{class:b(["my-2 text-[#000] text-right",[i=="Total Contribution"?"text-[13px] text-[#000] font-semibold":" text-black"]]),key:r},l(e),3))),128))])]),t("tr",Ae,[t("td",null,[De,(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.Tax_Deduction[0],(e,i,r)=>(s(),a("p",{class:b(["my-2 text-[#000] flex items-center",[i=="Total Deduction"?"text-[14px] text-[#000] font-semibold":" text-black"]]),key:r},[y(l(i)+" ",1),i=="Total Deduction"?(s(),a("span",Ve," (C)")):x("",!0)],2))),128))]),t("td",null,[Ee,(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.Tax_Deduction[0],(e,i,r)=>(s(),a("p",{class:b(["my-2 text-[#000] text-right",[i=="Total Deduction"?"text-[14px] text-[#000] font-semibold":" text-black"]]),key:r},l(e),3))),128))])])])])]),(s(!0),a(d,null,c(n(o).paySlipHTMLView.data.over_all[0],(e,i,r)=>(s(),a("div",{class:"my-2 row w-[100%]",key:r},[t("div",He,[t("p",{class:b(["text-[#000]",[i=="Net Salary Payable"||i=="Net Salary in words"?"text-black text-[14px] font-semibold":""]])},[y(l(i)+" ",1),i=="Net Salary Payable"?(s(),a("span",Ne,"(A-B-C)")):x("",!0)],2)]),t("div",Oe,[t("p",Re,[i=="Net Salary Payable"?(s(),a("span",{key:0,class:b(["text-[16px] font-semibold text-right",[i=="Net Salary Payable"?"text-black text-[14px] font-semibold":""]]),style:{"font-family":"sans-serif !important"}},"₹ ",2)):x("",!0),y(l(e),1)])])]))),128)),Ce,t("div",Ye,[t("div",Be,[Fe,t("img",{src:`${n(o).paySlipHTMLView.data.date_month.abs_logo}`,alt:"",class:"w-[140px] h-[50px]"},null,8,Ie)])])])])]),_:1},8,["visible"])):x("",!0)],64)}}};export{Ke as _};