import{d as w}from"./dayjs.min21342.js";import{a as V}from"./index21342.js";import{a0 as g,ak as C,ag as N,o as s,c as a,I as n,b as Y,a as x,d as t,h as m,w as k,l as y,t as l,F as c,f as r,g as M,n as b}from"./toastservice.esm21342.js";import{d as B}from"./pinia21342.js";import{U as F}from"./EmployeeDocumentsManagerService21342.js";/* empty css                                                                   */const I=B("employeePayslipStore",()=>{const A=F(),o=g(),S=g(),P=g(!1),f=new URLSearchParams(window.location.search),h=g(!1);function p(){return f.has("uid")?f.get("uid"):""}async function D(){h.value=!0,V.post("/payroll/paycheck/getEmployeeAllPayslipList",{uid:p()}).then(d=>{o.value=d.data.data}).finally(()=>{h.value=!1})}async function E(d,v){h.value=!0;let T=parseInt(w(v).month())+1,L=w(v).year();await V.post("/empViewPayslipdetails",{uid:p(),user_code:d,month:T,year:L}).then(u=>{S.value=u.data,P.value=!0}).finally(()=>{h.value=!1})}function e(d,v,T,L){const u=d,_=document.createElement("a"),H=`${v}-${T}-${L}.pdf`;_.href=u,_.download=H,_.click()}async function i(d,v){h.value=!0,A.loading=!0,console.log("Downloading payslip PDF.....");let T=parseInt(w(v).month())+1,L=w(v).year();await V.post("/empGeneratePayslipPdfMail",{uid:p(),user_code:d,month:T,year:L,type:"pdf"}).then(u=>{if(console.log(" Response [downloadPayslipReleaseStatus] : "+JSON.stringify(u.data.data)),u.data){let _=u.data.payslip,H=u.data.emp_name,O=u.data.month,R=u.data.year;console.log(_),_&&(_.startsWith("JVB")?(_="data:application/pdf;base64,"+_,e(_,H,O,R)):_.startsWith("data:application/pdf;base64")&&e(_))}else console.log("Response Url Not Found")}).finally(()=>{A.loading=!1,h.value=!1})}return{array_employeePayslips_list:o,paySlipHTMLView:S,canShowPayslipView:P,loading:h,getEmployeeAllPayslipList:D,getEmployeePayslipDetailsAsHTML:E,getEmployeePayslipDetailsAsPDF:i}});const U={class:"w-full"},$=t("h2",{class:"font-semibold text-lg my-2"},"Salary Details",-1),j=["onClick"],G=["onClick"],J={class:"flex justify-center w-[100%] my-3 rounded-lg"},W={class:"w-[95%] h-[90%] shadow-lg p-4"},K={class:"w-[100%] flex justify-between"},q={class:"flex flex-col"},z=t("h1",{class:"text-[25px]"},[y("PAYSLIP "),t("span",{class:"text-gray-500 text-[25px]"},"MAR 2023")],-1),Q=["src"],X={class:"mt-[30px]"},Z=t("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),tt={class:"col-3"},et=t("p",{class:""},"Employee Code",-1),st={class:"text-[#000] text-[12px]"},at={class:"col-3"},ot=t("p",null,"Date Joining",-1),lt={class:"text-[#000]"},nt={class:"col-3"},it=t("p",null,"Department",-1),dt={class:"text-[#000]"},ct={class:"col-3"},rt=t("p",null,"Designation",-1),_t={class:"text-[#000]"},pt={class:"col-3"},ut=t("p",null,"Payment Mode",-1),yt={class:"text-[#000]"},ht={class:"col-3"},xt=t("p",null,"Bank Name",-1),mt={class:"text-[#000]"},bt={class:"col-3"},ft=t("p",null,"Bank Account",-1),vt={class:"text-[#000]"},gt={class:"col-3"},wt=t("p",null,"Bank ISFC",-1),St={class:"text-[#000]"},Tt={class:"col-3"},Lt=t("p",null,"PAN",-1),kt={class:"text-[#000]"},Pt=t("div",{class:"col-3"},[t("p",null,"ESIC"),t("p",{class:"text-[#000]"},"Date Joined")],-1),Mt={class:"col-3"},At=t("p",null,"UAN",-1),Dt={class:"text-[#000]"},Et={class:"col-3"},Ht=t("p",null,"EPF Number",-1),Vt={class:"text-[#000]"},Nt=t("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),Ot={class:""},Rt=t("h1",{class:"font-semibold text-[16px] my-[16px]"},"LEAVE DETAILS",-1),Ct=t("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),Yt={class:"py-2 mx-2 row"},Bt={class:"col-3"},Ft=t("p",null,"Leave Type",-1),It={class:"col-3"},Ut=t("p",null,"Opening Balance",-1),$t={class:"col-3"},jt=t("p",null,"Availed",-1),Gt={class:"col-3"},Jt=t("p",null,"Closing Balance",-1),Wt={class:""},Kt=t("h1",{class:"font-semibold text-[16px] my-[16px]"},"SALARY DETAILS",-1),qt=t("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),zt={class:"col-3"},Qt=t("p",null,"ACTUAL PAYABLE DAYS",-1),Xt={class:"text-[#000]"},Zt={class:"col-3"},te=t("p",null,"TOTAL WORKING DAYS",-1),ee={class:"text-[#000]"},se={class:"col-3"},ae=t("p",null,"LOSS OF PAY DAYS",-1),oe={class:"text-[#000]"},le={class:"col-3"},ne=t("p",null,"ARREAR DAYS PAYABLE",-1),ie={class:"text-[#000]"},de={class:"row mt-2 py-2 border-y-[1px] border-[gray] mx-2"},ce={class:"col-7 border-r-[1.4px] border-[gray]"},re={class:"row"},_e={class:"col-6"},pe=t("h1",{class:"font-semibold"},"Earnings",-1),ue={key:0,class:"text-black font-semibold"},ye={class:"col-2"},he={key:0,class:"font-semibold text-right"},xe={class:"col-2"},me={key:0,class:"font-semibold text-right"},be={class:"col-2"},fe=t("h1",{class:"font-semibold text-right"},"Earned",-1),ve={class:"col"},ge={border:"2",class:"w-[100%]"},we={class:"w-[100%]"},Se=t("h1",{class:"font-semibold"},"CONTRIBUTIONS",-1),Te={key:0,class:"text-black font-semibold text-[14px]"},Le=t("h1",{class:"font-semibold"}," ",-1),ke={class:"w-[100%]"},Pe=t("h1",{class:"font-semibold"},"Tax Duductions",-1),Me={key:0,class:"text-[14px] text-[#000] font-semibold"},Ae=t("h1",{class:"font-semibold"}," ",-1),De={class:"my-2 col-6"},Ee={key:0,class:"text-black font-semibold"},He={class:"my-2 col-6"},Ve={class:"text-[16px] text-[#000]"},Ne=t("div",null,[t("p",{class:"mt-2 font-semibold flex text-[#000]"},[y("*** Note:All "),t("span",{class:"text-[16px] text-[#000]"},"amounts displayed in this payslips are in"),y(" INR")]),t("p",{class:"mt-[50px] font-semibold text-[#000]"},"**This is computer generated statement,does not require signature.")],-1),Oe={class:""},Re={class:"flex items-center float-right"},Ce=t("p",{class:"mx-2"},"Powered by ",-1),Ye=["src"],Ge={__name:"EmployeePayslips",setup(A){const o=I();g(!0),g(),C(async()=>{console.log("EmployeePayslips,vue loaded"),await o.getEmployeeAllPayslipList()});const S=g({PAYROLL_MONTH:{value:null,matchMode:N.STARTS_WITH,matchMode:N.EQUALS,matchMode:N.CONTAINS}});return(P,f)=>{const h=M("LoadingSpinner"),p=M("Column"),D=M("DataTable"),E=M("Sidebar");return s(),a(c,null,[n(o).loading?(s(),Y(h,{key:0,class:"absolute z-50 bg-white"})):x("",!0),t("div",U,[$,m(D,{value:n(o).array_employeePayslips_list,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],sortField:"PAYROLL_MONTH",sortOrder:-1,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:S.value,"onUpdate:filters":f[0]||(f[0]=e=>S.value=e),filterDisplay:"menu",loading:P.loading2,globalFilterFields:["name"]},{default:k(()=>[m(p,{field:"PAYROLL_MONTH",header:"Month",sortable:!0},{body:k(e=>[y(l(n(w)(e.data.PAYROLL_MONTH).format("DD-MMM-YYYY")),1)]),_:1}),m(p,{field:"TOTAL_EARNED_GROSS",header:"Gross Pay"}),m(p,{field:"Reimbursements",header:"Reimbursements"},{body:k(e=>[y(l(0))]),_:1}),m(p,{field:"TOTAL_DEDUCTIONS",header:"Deductions"}),m(p,{field:"NET_TAKE_HOME",header:"Take Home"}),m(p,{header:"Action"},{body:k(e=>[t("button",{class:"bg-black text-white rounded-md p-2 mx-2",onClick:i=>n(o).getEmployeePayslipDetailsAsPDF("",e.data.PAYROLL_MONTH)},"Download",8,j),t("button",{class:"border-[2px] border-[#000] py-2 px-3 rounded-md",onClick:i=>n(o).getEmployeePayslipDetailsAsHTML("",e.data.PAYROLL_MONTH)},"View",8,G)]),_:1})]),_:1},8,["value","filters","loading"])]),m(E,{position:"right",visible:n(o).canShowPayslipView,"onUpdate:visible":f[1]||(f[1]=e=>n(o).canShowPayslipView=e),modal:"",header:"Payslip",style:{width:"58vw"}},{default:k(()=>[t("div",J,[t("div",W,[t("div",K,[t("div",q,[z,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.client_details,e=>(s(),a("h2",{class:"text-[16px] mt-[10px] text-[#000]",key:e},l(e.client_fullname),1))),128)),(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.client_details,e=>(s(),a("p",{class:"w-[300px] mt-[10px]",key:e},l(e.address),1))),128))]),(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.client_details,e=>(s(),a("div",{key:e},[t("img",{src:`${e.client_logo}`,alt:"testing",class:"w-[200px]"},null,8,Q)]))),128))]),t("div",X,[(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.personal_details,e=>(s(),a("h1",{class:"font-semibold text-[16px] my-[16px]",key:e}," Employee Name : "+l(e.name),1))),128)),Z,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.personal_details,e=>(s(),a("div",{class:"mx-2 row border-b-[1px] border-[gray] py-2",key:e},[t("div",tt,[et,t("p",st,l(e.user_code?e.user_code:"-"),1)]),t("div",at,[ot,t("p",lt,l(e.doj?n(w)(e.doj).format("DD-MMM-YYYY"):"-"),1)]),t("div",nt,[it,t("p",dt,l(e.department_name?e.department_name:"-"),1)]),t("div",ct,[rt,t("p",_t,l(e.designation?e.designation:"-"),1)])]))),128)),(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.personal_details,e=>(s(),a("div",{class:"mx-2 row border-b-[1px] border-[gray] py-2",key:e},[t("div",pt,[ut,t("p",yt,l(e.bank_account_number?"Bank":"cheque"),1)]),t("div",ht,[xt,t("p",mt,l(e.bank_name?e.bank_name:"-"),1)]),t("div",bt,[ft,t("p",vt,l(e.bank_account_number?e.bank_account_number:"-"),1)]),t("div",gt,[wt,t("p",St,l(e.bank_ifsc_code?e.bank_ifsc_code:"-"),1)])]))),128)),(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.personal_details,e=>(s(),a("div",{class:"py-2 mx-2 row",key:e},[t("div",Tt,[Lt,t("p",kt,l(e.pan_number?e.pan_number:"-"),1)]),Pt,t("div",Mt,[At,t("p",Dt,l(e.uan_number?e.uan_number:"-"),1)]),t("div",Et,[Ht,t("p",Vt,l(e.epf_number?e.epf_number:"-"),1)])]))),128)),Nt]),t("div",Ot,[Rt,Ct,t("div",Yt,[t("div",Bt,[Ft,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.leave_data,e=>(s(),a("p",{class:"text-[#000]",key:e},l(e.leave_type?e.leave_type:"-"),1))),128))]),t("div",It,[Ut,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.leave_data,e=>(s(),a("p",{class:"text-[#000]",key:e},l(e.opening_balance?e.opening_balance:"-"),1))),128))]),t("div",$t,[jt,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.leave_data,e=>(s(),a("p",{class:"text-[#000]",key:e},l(e.avalied?e.avalied:"-"),1))),128))]),t("div",Gt,[Jt,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.leave_data,e=>(s(),a("p",{class:"text-[#000]",key:e},l(e.closing_balance?e.closing_balance:"-"),1))),128))])])]),t("div",Wt,[Kt,qt,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.salary_details,e=>(s(),a("div",{class:"py-2 mx-2 row",key:e},[t("div",zt,[Qt,t("p",Xt,l(e.month_days?e.month_days:"-"),1)]),t("div",Zt,[te,t("p",ee,l(e.worked_Days?e.worked_Days:"-"),1)]),t("div",se,[ae,t("p",oe,l(e.lop?e.lop:"-"),1)]),t("div",le,[ne,t("p",ie,l(e.arrears_Days?e.arrears_Days:"-"),1)])]))),128))]),t("div",de,[t("div",ce,[t("div",re,[t("div",_e,[pe,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.earnings[0],(e,i,d)=>(s(),a("h1",{class:b(["my-3 flex items-center",[i=="Total Earnings"?"text-black font-semibold":"text-black"]]),key:d},[y(l(i)+" ",1),i=="Total Earnings"?(s(),a("span",ue,"(A)")):x("",!0)],2))),128))]),t("div",ye,[n(o).paySlipHTMLView.data.compensatory_data[0]?(s(),a("h1",he,"Fixed")):x("",!0),(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.compensatory_data[0],(e,i,d)=>(s(),a("h1",{key:d,class:"mt-[12px] text-black text-right"},l(e),1))),128))]),t("div",xe,[n(o).paySlipHTMLView.data.arrears[0]!=""?(s(),a("h1",me,"Arrears")):x("",!0),(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.arrears[0],(e,i,d)=>(s(),a("h1",{key:d,class:"mt-[12px]"},l(e),1))),128))]),t("div",be,[fe,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.earnings[0],(e,i,d)=>(s(),a("h1",{key:d,class:b(["my-3 text-right",[i=="Total Earnings"?"text-black text-[14px] font-semibold":""]])},l(e),3))),128))])])]),t("div",ve,[t("table",ge,[t("tr",we,[t("td",null,[Se,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.contribution[0],(e,i,d)=>(s(),a("p",{class:b(["my-2 text-[#000] flex",[i=="Total Contribution"?"text-[14px] text-[#000] font-semibold":" text-black"]]),key:d},[y(l(i)+" ",1),i=="Total Contribution"?(s(),a("span",Te," (B)")):x("",!0)],2))),128))]),t("td",null,[Le,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.contribution[0],(e,i,d)=>(s(),a("p",{class:b(["my-2 text-[#000] text-right",[i=="Total Contribution"?"text-[13px] text-[#000] font-semibold":" text-black"]]),key:d},l(e),3))),128))])]),t("tr",ke,[t("td",null,[Pe,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.Tax_Deduction[0],(e,i,d)=>(s(),a("p",{class:b(["my-2 text-[#000] flex items-center",[i=="Total Deduction"?"text-[14px] text-[#000] font-semibold":" text-black"]]),key:d},[y(l(i)+" ",1),i=="Total Deduction"?(s(),a("span",Me," (C)")):x("",!0)],2))),128))]),t("td",null,[Ae,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.Tax_Deduction[0],(e,i,d)=>(s(),a("p",{class:b(["my-2 text-[#000] text-right",[i=="Total Deduction"?"text-[14px] text-[#000] font-semibold":" text-black"]]),key:d},l(e),3))),128))])])])])]),(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.over_all[0],(e,i,d)=>(s(),a("div",{class:"my-2 row w-[100%]",key:d},[t("div",De,[t("p",{class:b(["text-[#000]",[i=="Net Salary Payable"||i=="Net Salary in words"?"text-black text-[14px] font-semibold":""]])},[y(l(i)+" ",1),i=="Net Salary Payable"?(s(),a("span",Ee,"(A-B-C)")):x("",!0)],2)]),t("div",He,[t("p",Ve,[i=="Net Salary Payable"?(s(),a("span",{key:0,class:b(["text-[16px] font-semibold text-right",[i=="Net Salary Payable"?"text-black text-[14px] font-semibold":""]]),style:{"font-family":"sans-serif !important"}},"₹ ",2)):x("",!0),y(l(e),1)])])]))),128)),Ne,t("div",Oe,[t("div",Re,[Ce,t("img",{src:`${n(o).paySlipHTMLView.data.date_month.abs_logo}`,alt:"",class:"w-[140px] h-[50px]"},null,8,Ye)])])])])]),_:1},8,["visible"])],64)}}};export{Ge as _};
