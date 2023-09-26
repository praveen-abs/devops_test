import{d as w}from"./dayjs.min-2f06af28.js";import{a as E}from"./index-362795f3.js";import{H as g,I as Y,a9 as N,o as s,c as a,J as n,b as O,a as x,d as t,h as v,w as k,l as y,t as l,F as c,f as r,g as M,n as m}from"./inputnumber.esm-2ef94937.js";import{d as B}from"./pinia-0d96afee.js";import{U as F}from"./EmployeeDocumentsManagerService-826d57d3.js";/* empty css                                                                       */const I=B("employeePayslipStore",()=>{const A=F(),o=g(),S=g(),P=g(!1),b=new URLSearchParams(window.location.search),h=g(!1);function p(){return b.has("uid")?b.get("uid"):""}async function D(){h.value=!0,E.post("/payroll/paycheck/getEmployeeAllPayslipList",{uid:p()}).then(d=>{o.value=d.data.data}).finally(()=>{h.value=!1})}async function H(d,f){h.value=!0;let T=parseInt(w(f).month())+1,L=w(f).year();await E.post("/empViewPayslipdetails",{uid:p(),user_code:d,month:T,year:L}).then(u=>{S.value=u.data,P.value=!0}).finally(()=>{h.value=!1})}function e(d,f,T,L){const u=d,_=document.createElement("a"),V=`${f}-${T}-${L}.pdf`;_.href=u,_.download=V,_.click()}async function i(d,f){h.value=!0,A.loading=!0,console.log("Downloading payslip PDF.....");let T=parseInt(w(f).month())+1,L=w(f).year();await E.post("/empGeneratePayslipPdfMail",{uid:p(),user_code:d,month:T,year:L,type:"pdf"}).then(u=>{if(console.log(" Response [downloadPayslipReleaseStatus] : "+JSON.stringify(u.data.data.payslip)),u.data){let _=u.data.data.payslip,V=u.data.data.emp_name,R=u.data.data.month,C=u.data.data.year;console.log(_),_&&(_.startsWith("JVB")?(_="data:application/pdf;base64,"+_,e(_,V,R,C)):_.startsWith("data:application/pdf;base64")&&e(_))}else console.log("Response Url Not Found")}).finally(()=>{A.loading=!1,h.value=!1})}return{array_employeePayslips_list:o,paySlipHTMLView:S,canShowPayslipView:P,loading:h,getEmployeeAllPayslipList:D,getEmployeePayslipDetailsAsHTML:H,getEmployeePayslipDetailsAsPDF:i}});const U={class:"w-full"},$=t("h2",{class:"font-semibold text-lg my-2"},"Salary Details",-1),j=["onClick"],J=["onClick"],G={class:"flex justify-center w-[100%] my-3 rounded-lg"},W={class:"w-[95%] h-[90%] shadow-lg p-4"},K={class:"w-[100%] flex justify-between"},q={class:"flex flex-col"},z={class:"text-[25px] flex items-center"},Q={class:"text-gray-500 text-[25px]"},X=["src"],Z={class:"mt-[30px]"},tt=t("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),et={class:"col-3"},st=t("p",{class:""},"Employee Code",-1),at={class:"text-[#000] text-[12px]"},ot={class:"col-3"},lt=t("p",null,"Date Joining",-1),nt={class:"text-[#000]"},it={class:"col-3"},dt=t("p",null,"Department",-1),ct={class:"text-[#000]"},rt={class:"col-3"},_t=t("p",null,"Designation",-1),pt={class:"text-[#000]"},ut={class:"col-3"},yt=t("p",null,"Payment Mode",-1),ht={class:"text-[#000]"},xt={class:"col-3"},mt=t("p",null,"Bank Name",-1),bt={class:"text-[#000]"},ft={class:"col-3"},vt=t("p",null,"Bank Account",-1),gt={class:"text-[#000]"},wt={class:"col-3"},St=t("p",null,"Bank ISFC",-1),Tt={class:"text-[#000]"},Lt={class:"col-3"},kt=t("p",null,"PAN",-1),Pt={class:"text-[#000]"},Mt=t("div",{class:"col-3"},[t("p",null,"ESIC"),t("p",{class:"text-[#000]"},"Date Joined")],-1),At={class:"col-3"},Dt=t("p",null,"UAN",-1),Ht={class:"text-[#000]"},Vt={class:"col-3"},Et=t("p",null,"EPF Number",-1),Nt={class:"text-[#000]"},Ot=t("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),Rt={class:""},Ct=t("h1",{class:"font-semibold text-[16px] my-[16px]"},"LEAVE DETAILS",-1),Yt=t("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),Bt={class:"py-2 mx-2 row"},Ft={class:"col-3"},It=t("p",null,"Leave Type",-1),Ut={class:"col-3"},$t=t("p",null,"Opening Balance",-1),jt={class:"col-3"},Jt=t("p",null,"Availed",-1),Gt={class:"col-3"},Wt=t("p",null,"Closing Balance",-1),Kt={class:""},qt=t("h1",{class:"font-semibold text-[16px] my-[16px]"},"SALARY DETAILS",-1),zt=t("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),Qt={class:"col-3"},Xt=t("p",null,"ACTUAL PAYABLE DAYS",-1),Zt={class:"text-[#000]"},te={class:"col-3"},ee=t("p",null,"TOTAL WORKING DAYS",-1),se={class:"text-[#000]"},ae={class:"col-3"},oe=t("p",null,"LOSS OF PAY DAYS",-1),le={class:"text-[#000]"},ne={class:"col-3"},ie=t("p",null,"ARREAR DAYS PAYABLE",-1),de={class:"text-[#000]"},ce={class:"row mt-2 py-2 border-y-[1px] border-[gray] mx-2"},re={class:"col-7 border-r-[1.4px] border-[gray]"},_e={class:"row"},pe={class:"col-6"},ue=t("h1",{class:"font-semibold"},"Earnings",-1),ye={key:0,class:"text-black font-semibold"},he={class:"col-2"},xe={key:0,class:"font-semibold text-right"},me={class:"col-2"},be={key:0,class:"font-semibold text-right"},fe={class:"col-2"},ve=t("h1",{class:"font-semibold text-right"},"Earned",-1),ge={class:"col"},we={border:"2",class:"w-[100%]"},Se={class:"w-[100%]"},Te=t("h1",{class:"font-semibold"},"CONTRIBUTIONS",-1),Le={key:0,class:"text-black font-semibold text-[14px]"},ke=t("h1",{class:"font-semibold"}," ",-1),Pe={class:"w-[100%]"},Me=t("h1",{class:"font-semibold"},"Tax Duductions",-1),Ae={key:0,class:"text-[14px] text-[#000] font-semibold"},De=t("h1",{class:"font-semibold"}," ",-1),He={class:"my-2 col-6"},Ve={key:0,class:"text-black font-semibold"},Ee={class:"my-2 col-6"},Ne={class:"text-[16px] text-[#000]"},Oe=t("div",null,[t("p",{class:"mt-2 font-semibold flex text-[#000]"},[y("*** Note:All "),t("span",{class:"text-[16px] text-[#000]"},"amounts displayed in this payslips are in"),y(" INR")]),t("p",{class:"mt-[50px] font-semibold text-[#000]"},"**This is computer generated statement,does not require signature.")],-1),Re={class:""},Ce={class:"flex items-center float-right"},Ye=t("p",{class:"mx-2"},"Powered by ",-1),Be=["src"],Ge={__name:"EmployeePayslips",setup(A){const o=I();g(!0),g(),Y(()=>{console.log("EmployeePayslips,vue loaded"),o.getEmployeeAllPayslipList()});const S=g({PAYROLL_MONTH:{value:null,matchMode:N.STARTS_WITH,matchMode:N.EQUALS,matchMode:N.CONTAINS}});return(P,b)=>{const h=M("LoadingSpinner"),p=M("Column"),D=M("DataTable"),H=M("Sidebar");return s(),a(c,null,[n(o).loading?(s(),O(h,{key:0,class:"absolute z-50 bg-white"})):x("",!0),t("div",U,[$,v(D,{value:n(o).array_employeePayslips_list,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],sortField:"PAYROLL_MONTH",sortOrder:-1,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:S.value,"onUpdate:filters":b[0]||(b[0]=e=>S.value=e),filterDisplay:"menu",loading:P.loading2,globalFilterFields:["name"]},{default:k(()=>[v(p,{field:"PAYROLL_MONTH",header:"Month",sortable:!0},{body:k(e=>[y(l(n(w)(e.data.PAYROLL_MONTH).format("DD-MMM-YYYY")),1)]),_:1}),v(p,{field:"TOTAL_EARNED_GROSS",header:"Gross Pay"}),v(p,{field:"Reimbursements",header:"Reimbursements"},{body:k(e=>[y(l(0))]),_:1}),v(p,{field:"TOTAL_DEDUCTIONS",header:"Deductions"}),v(p,{field:"NET_TAKE_HOME",header:"Take Home"}),v(p,{header:"Action"},{body:k(e=>[t("button",{class:"bg-black text-white rounded-md p-2 mx-2",onClick:i=>n(o).getEmployeePayslipDetailsAsPDF("",e.data.PAYROLL_MONTH)},"Download",8,j),t("button",{class:"border-[2px] border-[#000] py-2 px-3 rounded-md",onClick:i=>n(o).getEmployeePayslipDetailsAsHTML("",e.data.PAYROLL_MONTH)},"View",8,J)]),_:1})]),_:1},8,["value","filters","loading"])]),n(o).canShowPayslipView?(s(),O(H,{key:1,position:"right",visible:n(o).canShowPayslipView,"onUpdate:visible":b[1]||(b[1]=e=>n(o).canShowPayslipView=e),modal:"",header:"Payslip",style:{width:"58vw"}},{default:k(()=>[t("div",G,[t("div",W,[t("div",K,[t("div",q,[t("h1",z,[y("PAYSLIP "),t("span",Q,l(n(o).paySlipHTMLView.data.date_month.Month)+" "+l(n(o).paySlipHTMLView.data.date_month.Year),1)]),(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.client_details,e=>(s(),a("h2",{class:"text-[16px] mt-[10px] text-[#000] font-semibold",key:e},l(e.client_fullname),1))),128)),(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.client_details,e=>(s(),a("p",{class:"w-[300px] mt-[10px]",key:e},l(e.address),1))),128))]),(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.client_details,e=>(s(),a("div",{key:e},[t("img",{src:`${e.client_logo}`,alt:"testing",class:"w-[200px]"},null,8,X)]))),128))]),t("div",Z,[(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.personal_details,e=>(s(),a("h1",{class:"font-semibold text-[16px] my-[16px]",key:e}," Employee Name : "+l(e.name),1))),128)),tt,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.personal_details,e=>(s(),a("div",{class:"mx-2 row border-b-[1px] border-[gray] py-2",key:e},[t("div",et,[st,t("p",at,l(e.user_code?e.user_code:"-"),1)]),t("div",ot,[lt,t("p",nt,l(e.doj?n(w)(e.doj).format("DD-MMM-YYYY"):"-"),1)]),t("div",it,[dt,t("p",ct,l(e.department_name?e.department_name:"-"),1)]),t("div",rt,[_t,t("p",pt,l(e.designation?e.designation:"-"),1)])]))),128)),(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.personal_details,e=>(s(),a("div",{class:"mx-2 row border-b-[1px] border-[gray] py-2",key:e},[t("div",ut,[yt,t("p",ht,l(e.bank_account_number?"Bank":"cheque"),1)]),t("div",xt,[mt,t("p",bt,l(e.bank_name?e.bank_name:"-"),1)]),t("div",ft,[vt,t("p",gt,l(e.bank_account_number?e.bank_account_number:"-"),1)]),t("div",wt,[St,t("p",Tt,l(e.bank_ifsc_code?e.bank_ifsc_code:"-"),1)])]))),128)),(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.personal_details,e=>(s(),a("div",{class:"py-2 mx-2 row",key:e},[t("div",Lt,[kt,t("p",Pt,l(e.pan_number?e.pan_number:"-"),1)]),Mt,t("div",At,[Dt,t("p",Ht,l(e.uan_number?e.uan_number:"-"),1)]),t("div",Vt,[Et,t("p",Nt,l(e.epf_number?e.epf_number:"-"),1)])]))),128)),Ot]),t("div",Rt,[Ct,Yt,t("div",Bt,[t("div",Ft,[It,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.leave_data,e=>(s(),a("p",{class:"text-[#000]",key:e},l(e.leave_type?e.leave_type:"-"),1))),128))]),t("div",Ut,[$t,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.leave_data,e=>(s(),a("p",{class:"text-[#000]",key:e},l(e.opening_balance?e.opening_balance:"-"),1))),128))]),t("div",jt,[Jt,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.leave_data,e=>(s(),a("p",{class:"text-[#000]",key:e},l(e.availed?e.availed:"-"),1))),128))]),t("div",Gt,[Wt,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.leave_data,e=>(s(),a("p",{class:"text-[#000]",key:e},l(e.closing_balance?e.closing_balance:"-"),1))),128))])])]),t("div",Kt,[qt,zt,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.salary_details,e=>(s(),a("div",{class:"py-2 mx-2 row",key:e},[t("div",Qt,[Xt,t("p",Zt,l(e.month_days?e.month_days:"-"),1)]),t("div",te,[ee,t("p",se,l(e.worked_Days?e.worked_Days:"-"),1)]),t("div",ae,[oe,t("p",le,l(e.lop?e.lop:"-"),1)]),t("div",ne,[ie,t("p",de,l(e.arrears_Days?e.arrears_Days:"-"),1)])]))),128))]),t("div",ce,[t("div",re,[t("div",_e,[t("div",pe,[ue,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.earnings[0],(e,i,d)=>(s(),a("h1",{class:m(["my-3 flex items-center",[i=="Total Earnings"?"text-black font-semibold":"text-black"]]),key:d},[y(l(i)+" ",1),i=="Total Earnings"?(s(),a("span",ye,"(A)")):x("",!0)],2))),128))]),t("div",he,[n(o).paySlipHTMLView.data.compensatory_data[0]?(s(),a("h1",xe,"Fixed")):x("",!0),(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.compensatory_data[0],(e,i,d)=>(s(),a("h1",{key:d,class:"mt-[12px] text-black text-right"},l(e),1))),128))]),t("div",me,[n(o).paySlipHTMLView.data.arrears[0]!=""?(s(),a("h1",be,"Arrears")):x("",!0),(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.arrears[0],(e,i,d)=>(s(),a("h1",{key:d,class:"mt-[12px]"},l(e),1))),128))]),t("div",fe,[ve,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.earnings[0],(e,i,d)=>(s(),a("h1",{key:d,class:m(["my-3 text-right",[i=="Total Earnings"?"text-black text-[14px] font-semibold":""]])},l(e),3))),128))])])]),t("div",ge,[t("table",we,[t("tr",Se,[t("td",null,[Te,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.contribution[0],(e,i,d)=>(s(),a("p",{class:m(["my-2 text-[#000] flex",[i=="Total Contribution"?"text-[14px] text-[#000] font-semibold":" text-black"]]),key:d},[y(l(i)+" ",1),i=="Total Contribution"?(s(),a("span",Le," (B)")):x("",!0)],2))),128))]),t("td",null,[ke,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.contribution[0],(e,i,d)=>(s(),a("p",{class:m(["my-2 text-[#000] text-right",[i=="Total Contribution"?"text-[13px] text-[#000] font-semibold":" text-black"]]),key:d},l(e),3))),128))])]),t("tr",Pe,[t("td",null,[Me,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.Tax_Deduction[0],(e,i,d)=>(s(),a("p",{class:m(["my-2 text-[#000] flex items-center",[i=="Total Deduction"?"text-[14px] text-[#000] font-semibold":" text-black"]]),key:d},[y(l(i)+" ",1),i=="Total Deduction"?(s(),a("span",Ae," (C)")):x("",!0)],2))),128))]),t("td",null,[De,(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.Tax_Deduction[0],(e,i,d)=>(s(),a("p",{class:m(["my-2 text-[#000] text-right",[i=="Total Deduction"?"text-[14px] text-[#000] font-semibold":" text-black"]]),key:d},l(e),3))),128))])])])])]),(s(!0),a(c,null,r(n(o).paySlipHTMLView.data.over_all[0],(e,i,d)=>(s(),a("div",{class:"my-2 row w-[100%]",key:d},[t("div",He,[t("p",{class:m(["text-[#000]",[i=="Net Salary Payable"||i=="Net Salary in words"?"text-black text-[14px] font-semibold":""]])},[y(l(i)+" ",1),i=="Net Salary Payable"?(s(),a("span",Ve,"(A-B-C)")):x("",!0)],2)]),t("div",Ee,[t("p",Ne,[i=="Net Salary Payable"?(s(),a("span",{key:0,class:m(["text-[16px] font-semibold text-right",[i=="Net Salary Payable"?"text-black text-[14px] font-semibold":""]]),style:{"font-family":"sans-serif !important"}},"₹ ",2)):x("",!0),y(l(e),1)])])]))),128)),Oe,t("div",Re,[t("div",Ce,[Ye,t("img",{src:`${n(o).paySlipHTMLView.data.date_month.abs_logo}`,alt:"",class:"w-[140px] h-[50px]"},null,8,Be)])])])])]),_:1},8,["visible"])):x("",!0)],64)}}};export{Ge as _};