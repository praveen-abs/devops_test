import{d as J}from"./dayjs.min-2f06af28.js";import{q as K,r as b,o as G,c as R,e as a,f as l,h as n,k as Q,j as A,g as e,n as c,l as k,F as u,t as o,i as z,m as _,p as U}from"./app-e362a0cc.js";import{a as T}from"./index-362795f3.js";import{L as X}from"./LoadingSpinner-9ad5eb93.js";/* empty css                                                                       */const Z=K("managePayslipStore",()=>{const E=b(),s=b(),D=b(),m=b(!1);async function P(y,v){m.value=!0,E.value="",await T.post("/payroll/paycheck/getAllEmployeesPayslipDetails",{month:y,year:v,type:"pdf"}).then(f=>{E.value=f.data.data}).finally(()=>{m.value=!1})}async function M(y,v,f){m.value=!0;let g="/viewPayslipdetails";await T.post(g,{user_code:y,month:v,year:f,type:"pdf"}).then(h=>{D.value=h.data}).finally(()=>{m.value=!1})}async function N(y,v,f){m.value=!0,await T.post("/payroll/paycheck/getEmployeePayslipDetailsAsPDF",{user_code:y,month:v,year:f}).then(g=>{}).finally(()=>{m.value=!1})}async function V(y,v,f){console.log("sendMail_employeePayslip() : Sending mail to user : "+y),m.value=!0,T.post("/generatePayslip",{user_code:y,month:v,year:f,type:"mail"}).then(g=>{console.log(" Response [sendMail_employeePayslip] : "+g.data)}).catch(g=>{console.log(g)}).finally(()=>{m.value=!1})}async function w(y,v,f,g){console.log("updatePayslipReleaseStatus() : Updating releasepayslip status to user : "+y);let h=new Date(s.value);T.post("/payroll/paycheck/updatePayslipReleaseStatus",{user_code:y,month:v,year:f,status:g}).then(p=>{console.log(" Response [updatePayslipReleaseStatus] : "+p.data.data)}).catch(p=>{console.log(p.data.data)}).finally(()=>{P(h.getMonth()+1,h.getFullYear())})}async function Y(y,v,f,g){console.log("UpdateWithDrawStatus() : Updating withdraw :",y);let h=new Date(s.value);T.post("/payroll/paycheck/updatePayslipReleaseStatus",{user_code:y,month:v,year:f,status:g}).then(p=>{console.log(" Response [updatePayslipReleaseStatus] : "+p.data.data)}).catch(p=>{console.log(p.data.data)}).finally(()=>{P(h.getMonth()+1,h.getFullYear())})}function C(y,v,f,g){const h=y,p=document.createElement("a"),H=`${v}-${f}-${g}.pdf`;p.href=h,p.download=H,p.click()}async function B(y,v,f,g){console.log("Downloading payslip PDF....."),m.value=!0,await T.post("/generatePayslip",{user_code:y,month:v,year:f,type:"pdf"}).then(h=>{if(console.log(" Response [downloadPayslipReleaseStatus] : "+JSON.stringify(h.data.data)),h.data){let p=h.data.data.payslip,H=h.data.data.emp_name,O=h.data.data.month,F=h.data.data.year;console.log(p),p&&(p.startsWith("JVB")?(p="data:application/pdf;base64,"+p,C(p,H,O,F)):p.startsWith("data:application/pdf;base64")&&C(p))}else console.log("Response Url Not Found")}).finally(()=>{m.value=!1})}return{array_employees_list:E,paySlipHTMLView:D,selectedPayRollDate:s,loading:m,getAllEmployeesPayslipDetails:P,getEmployeePayslipDetailsAsHTML:M,sendMail_employeePayslip:V,updatePayslipReleaseStatus:w,downloadPayslip:B,UpdateWithDrawStatus:Y,getEmployeePayslipDetailsAsPDF:N}});const ee={class:"flex justify-between"},te=e("div",null,[e("h6",{class:"mb-2 text-lg font-semibold"},"Manage Employee Payslips")],-1),se={class:"d-flex justify-content-end"},ae=e("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),le={class:"my-4"},oe={class:"d-flex flex-column"},ne=["onClick"],ie=["onClick"],de={key:2,class:"mt-2 text-success"},ce={key:3,class:"mt-2 text-danger"},pe={key:0},re=e("h1",null," Payslip sent",-1),ue=[re],_e={key:1},ye=["onClick"],he=["onClick"],me={class:"p-0 m-0 d-flex flex-column"},ve=["onClick"],fe=["onClick"],xe=e("div",{class:"confirmation-content"},[e("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}}),e("span",null,"Are you sure you want to send Mail ?")],-1),ge={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},be=e("div",{class:"confirmation-content"},[e("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}}),e("span",null,"Are you sure you want to send Mail ?")],-1),we={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},ke={class:"confirmation-content"},Pe=e("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),De={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},Se={class:"confirmation-content"},Me=e("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Le={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},Re=e("i",{class:"pi pi-download"},null,-1),Te=[Re],Ce={class:"flex justify-center w-[100%] my-3 rounded-lg"},Ae={class:"w-[95%] h-[90%] shadow-lg p-4"},Ve={class:"w-[100%] flex justify-between"},He={class:"flex flex-col"},Ee={class:"text-[25px]"},Ne={class:"text-gray-500 text-[25px]"},Ye=["src"],Fe={class:"mt-[30px]"},$e=e("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),Ue={class:"col-3"},Be=e("p",{class:""},"Employee Code",-1),Oe={class:"text-[#000] text-[12px]"},ze={class:"col-3"},Ie=e("p",null,"Date Joining",-1),je={class:"text-[#000]"},We={class:"col-3"},qe=e("p",null,"Department",-1),Je={class:"text-[#000]"},Ke={class:"col-3"},Ge=e("p",null,"Designation",-1),Qe={class:"text-[#000]"},Xe={class:"col-3"},Ze=e("p",null,"Payment Mode",-1),et={class:"text-[#000]"},tt={class:"col-3"},st=e("p",null,"Bank Name",-1),at={class:"text-[#000]"},lt={class:"col-3"},ot=e("p",null,"Bank Account",-1),nt={class:"text-[#000]"},it={class:"col-3"},dt=e("p",null,"Bank ISFC",-1),ct={class:"text-[#000]"},pt={class:"col-3"},rt=e("p",null,"PAN",-1),ut={class:"text-[#000]"},_t=e("div",{class:"col-3"},[e("p",null,"ESIC"),e("p",{class:"text-[#000]"},o("-"))],-1),yt={class:"col-3"},ht=e("p",null,"UAN",-1),mt={class:"text-[#000]"},vt={class:"col-3"},ft=e("p",null,"EPF Number",-1),xt={class:"text-[#000]"},gt=e("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),bt={class:""},wt=e("h1",{class:"font-semibold text-[16px] my-[16px]"},"LEAVE DETAILS",-1),kt=e("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),Pt={class:"py-2 mx-2 row"},Dt={class:"col-3"},St=e("p",null,"Leave Type",-1),Mt={class:"col-3"},Lt=e("p",null,"Opening Balance",-1),Rt={class:"col-3"},Tt=e("p",null,"Availed",-1),Ct={class:"col-3"},At=e("p",null,"Closing Balance",-1),Vt={class:""},Ht=e("h1",{class:"font-semibold text-[16px] my-[16px]"},"SALARY DETAILS",-1),Et=e("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),Nt={class:"col-3"},Yt=e("p",null,"ACTUAL PAYABLE DAYS",-1),Ft={class:"text-[#000]"},$t={class:"col-3"},Ut=e("p",null,"TOTAL WORKING DAYS",-1),Bt={class:"text-[#000]"},Ot={class:"col-3"},zt=e("p",null,"LOSS OF PAY DAYS",-1),It={class:"text-[#000]"},jt={class:"col-3"},Wt=e("p",null,"ARREAR DAYS PAYABLE",-1),qt={class:"text-[#000]"},Jt={class:"row mt-2 py-2 border-y-[1px] border-[gray] mx-2"},Kt={class:"col-7 border-r-[1.4px] border-[gray]"},Gt={class:"w-[100%]"},Qt={class:"w-[100%]"},Xt=e("h1",{class:"font-semibold"},"Earnings",-1),Zt={class:"flex flex-col items-start pt-[2px]"},es=e("h1",{class:"font-semibold"},"Fixed",-1),ts={key:0,class:"flex flex-col items-start pt-[2px]"},ss=e("h1",{class:"font-semibold"},"Arrears",-1),as={key:1},ls=e("h1",{class:"font-semibold"},"Earned",-1),os={class:"col"},ns={border:"2",class:"w-[100%]"},is={class:"w-[100%]"},ds=e("h1",{class:"font-semibold"},"CONTRIBUTIONS",-1),cs=e("h1",{class:"font-semibold"}," ",-1),ps={class:"w-[100%]"},rs=e("h1",{class:"font-semibold"},"Tax Deduction",-1),us=e("h1",{class:"font-semibold"}," ",-1),_s={class:"my-2 col-5"},ys={class:""},hs={class:"my-2 col-7"},ms={class:"text-[16px]"},vs={key:0,class:"text-[16px]",style:{"font-family":"sans-serif !important"}},fs=e("div",null,[e("p",{class:"mt-2"},"*** Note:All amounts displayed in this payslips are in INR"),e("p",{class:"mt-[50px]"},"**This is computer generated statement,does not require signature.")],-1),xs={class:""},gs={class:"flex items-center float-right"},bs=e("p",{class:"mx-2"},"Powered by ",-1),ws=["src"],Ls={__name:"ManagePayslips",setup(E){const s=Z();b(!1);const D=b(!1),m=b(!1),P=b(!1),M=b(!1);b();const N=b(),V=r=>{N.value.toggle(r)},w=b(),Y=b(),C=b(!1);b(),G(()=>{s.selectedPayRollDate=new Date,s.selectedPayRollDate=new Date,s.getAllEmployeesPayslipDetails(s.selectedPayRollDate.getMonth()+1,s.selectedPayRollDate.getFullYear())});async function B(r){console.log("Showing payslip html for (user_code, month): "+r+" , "+parseInt(s.selectedPayRollDate.getMonth()+1)),await s.getEmployeePayslipDetailsAsHTML(w.value,s.selectedPayRollDate.getMonth()+1,s.selectedPayRollDate.getFullYear()),C.value=!0,V()}function y(r){w.value=r,D.value=!0}function v(r){w.value=r,m.value=!0}function f(r){console.log("selected_user_code",r),w.value=r}function g(){P.value=!0}async function h(r){await s.sendMail_employeePayslip(r,s.selectedPayRollDate.getMonth()+1,s.selectedPayRollDate.getFullYear()),D.value=!1}async function p(r){await s.updatePayslipReleaseStatus(r,s.selectedPayRollDate.getMonth()+1,s.selectedPayRollDate.getFullYear(),1),m.value=!1}async function H(r){w.value=r,M.value=!0}async function O(r){await s.UpdateWithDrawStatus(r,s.selectedPayRollDate.getMonth()+1,s.selectedPayRollDate.getFullYear(),0),M.value=!1}async function F(){P.value=!1,await s.downloadPayslip(w.value,s.selectedPayRollDate.getMonth()+1,s.selectedPayRollDate.getFullYear()),V()}return(r,i)=>{const I=R("Calendar"),L=R("Column"),j=R("OverlayPanel"),W=R("DataTable"),S=R("Button"),$=R("Dialog"),q=R("Sidebar");return a(),l(u,null,[n(s).loading?(a(),Q(X,{key:0,class:"absolute z-50 bg-white"})):A("",!0),e("div",ee,[te,e("div",se,[ae,c(I,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:n(s).selectedPayRollDate,"onUpdate:modelValue":i[0]||(i[0]=t=>n(s).selectedPayRollDate=t),style:{"border-radius":"7px",height:"38px"},onDateSelect:i[1]||(i[1]=t=>n(s).getAllEmployeesPayslipDetails(n(s).selectedPayRollDate.getMonth()+1,n(s).selectedPayRollDate.getFullYear()))},null,8,["modelValue"])])]),e("div",le,[c(W,{value:n(s).array_employees_list,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:r.filters,"onUpdate:filters":i[2]||(i[2]=t=>r.filters=t),filterDisplay:"menu",loading:r.loading2,globalFilterFields:["name","status"]},{default:k(()=>[c(L,{headerStyle:"width: 3rem"}),c(L,{field:"user_code",header:"Employee Code",headerStyle:"width: 3rem"}),c(L,{field:"name",header:"Employee Name"}),c(L,{field:"email",header:"Personal Mail"}),c(L,{field:"is_payslip_released",header:"Payslip Status"},{body:k(t=>[e("div",oe,[t.data.is_payslip_released==1?(a(),l("button",{key:0,class:"btn z-0 border-[1px solid ] border-black",onClick:d=>H(t.data.user_code)},"withdraw",8,ne)):(a(),l("button",{key:1,class:"bg-[#000] text-[white] rounded z-0",style:{padding:"4px 0 !important","margin-top":"10px"},onClick:d=>v(t.data.user_code)},"Release payslip",8,ie)),t.data.is_payslip_released==1?(a(),l("h1",de," Released ")):A("",!0),t.data.is_payslip_released==0||t.data.is_payslip_released==null?(a(),l("h1",ce," Not Released ")):A("",!0)])]),_:1}),c(L,{field:"is_payslip_mail_sent",header:"Mail Status"},{body:k(t=>[t.data.is_payslip_mail_sent==1?(a(),l("div",pe,ue)):(a(),l("div",_e,[e("button",{class:"bg-[#f9be00] text-white rounded p-2 z-0",onClick:d=>y(t.data.user_code)},"Send Payslip",8,ye)]))]),_:1}),c(L,{header:"Action"},{body:k(t=>[e("button",{class:"",type:"button",onClick:V},[e("i",{class:"pi pi-ellipsis-v",onClick:d=>f(t.data.user_code)},null,8,he)]),c(j,{ref_key:"op",ref:N,style:{width:"160px","margin-top":"12px !important","margin-right":"20px !important"},class:"p-0 m-0 !z-0"},{default:k(()=>[e("div",me,[e("button",{class:"p-2 text-black fw-semibold hover:bg-gray-200 border-bottom-1",onClick:d=>g(t.data.user_code)},"Download",8,ve),e("button",{class:"p-2 text-black fw-semibold hover:bg-gray-200",onClick:d=>B(t.data.user_code)},"View",8,fe)])]),_:2},1536)]),_:1})]),_:1},8,["value","filters","loading"])]),c($,{header:"Confirmation",visible:D.value,"onUpdate:visible":i[5]||(i[5]=t=>D.value=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:k(()=>[xe,e("div",ge,[c(S,{class:"py-2 mr-3 btn-primary",label:"Yes",icon:"pi pi-check",onClick:i[3]||(i[3]=t=>h(w.value)),autofocus:""}),c(S,{label:"No",icon:"pi pi-times",onClick:i[4]||(i[4]=t=>D.value=!1),class:"py-2 p-button-text",autofocus:""})])]),_:1},8,["visible"]),c($,{header:"Confirmation",visible:M.value,"onUpdate:visible":i[8]||(i[8]=t=>M.value=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:k(()=>[be,e("div",we,[c(S,{class:"py-2 mr-3 btn-primary",label:"Yes",icon:"pi pi-check",onClick:i[6]||(i[6]=t=>O(w.value)),autofocus:""}),c(S,{label:"No",icon:"pi pi-times",onClick:i[7]||(i[7]=t=>M.value=!1),class:"py-2 p-button-text",autofocus:""})])]),_:1},8,["visible"]),c($,{header:"Confirmation",visible:m.value,"onUpdate:visible":i[11]||(i[11]=t=>m.value=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:k(()=>[e("div",ke,[Pe,e("span",null,"Are you sure you want to release payslip? "+o(n(s).name),1)]),e("div",De,[c(S,{class:"py-2 mr-3 btn-primary",label:"Yes",icon:"pi pi-check",onClick:i[9]||(i[9]=t=>p(w.value)),autofocus:""}),c(S,{label:"No",icon:"pi pi-times",onClick:i[10]||(i[10]=t=>m.value=!1),class:"py-2 p-button-text",autofocus:""})])]),_:1},8,["visible"]),c($,{header:"Confirmation",visible:P.value,"onUpdate:visible":i[14]||(i[14]=t=>P.value=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:k(()=>[e("div",Se,[Me,e("span",null,"Are you sure you want to download payslip? "+o(n(s).name),1)]),e("div",Le,[c(S,{class:"py-2 mr-3 btn-primary",label:"Yes",icon:"pi pi-check",onClick:i[12]||(i[12]=t=>F(w.value,Y.value)),autofocus:""}),c(S,{label:"No",icon:"pi pi-times",onClick:i[13]||(i[13]=t=>P.value=!1),class:"py-2 p-button-text",autofocus:""})])]),_:1},8,["visible"]),c(q,{position:"right",visible:C.value,"onUpdate:visible":i[16]||(i[16]=t=>C.value=t),modal:"",header:"Payslip",style:{width:"58vw"}},{default:k(()=>[e("button",{class:"flex items-center p-2 absolute top-5 border-[1px] mx-2 text-[#000] rounded-md h-[33px]",onClick:i[15]||(i[15]=t=>F(w.value,Y.value))},Te),e("div",Ce,[e("div",Ae,[e("div",Ve,[e("div",He,[e("h1",Ee,[z("PAYSLIP "),e("span",Ne,o(n(s).paySlipHTMLView.data.date_month.Month),1)]),(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.client_details,t=>(a(),l("h2",{class:"text-[16px] mt-[10px] text-[#000]",key:t},o(t.client_fullname),1))),128)),(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.client_details,t=>(a(),l("p",{class:"w-[300px] mt-[10px]",key:t},o(t.address),1))),128))]),(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.client_details,t=>(a(),l("div",{key:t},[e("img",{src:`${t.client_logo}`,alt:"testing",class:"w-[200px]"},null,8,Ye)]))),128))]),e("div",Fe,[(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.personal_details,t=>(a(),l("h1",{class:"font-semibold text-[16px] my-[16px]",key:t}," Employee Name : "+o(t.name),1))),128)),$e,(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.personal_details,t=>(a(),l("div",{class:"mx-2 row border-b-[1px] border-[gray] py-2",key:t},[e("div",Ue,[Be,e("p",Oe,o(t.user_code?t.user_code:"-"),1)]),e("div",ze,[Ie,e("p",je,o(t.doj?n(J)(t.doj).format("DD-MMM-YYYY"):"-"),1)]),e("div",We,[qe,e("p",Je,o(t.department_name?t.department_name:"-"),1)]),e("div",Ke,[Ge,e("p",Qe,o(t.designation?t.designation:"-"),1)])]))),128)),(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.personal_details,t=>(a(),l("div",{class:"mx-2 row border-b-[1px] border-[gray] py-2",key:t},[e("div",Xe,[Ze,e("p",et,o(t.bank_account_number?"Bank":"cheque"),1)]),e("div",tt,[st,e("p",at,o(t.bank_name?t.bank_name:"-"),1)]),e("div",lt,[ot,e("p",nt,o(t.bank_account_number?t.bank_account_number:"-"),1)]),e("div",it,[dt,e("p",ct,o(t.bank_ifsc_code?t.bank_ifsc_code:"-"),1)])]))),128)),(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.personal_details,t=>(a(),l("div",{class:"py-2 mx-2 row",key:t},[e("div",pt,[rt,e("p",ut,o(t.pan_number?t.pan_number:"-"),1)]),_t,e("div",yt,[ht,e("p",mt,o(t.uan_number?t.uan_number:"-"),1)]),e("div",vt,[ft,e("p",xt,o(t.epf_number?t.epf_number:"-"),1)])]))),128)),gt]),e("div",bt,[wt,kt,e("div",Pt,[e("div",Dt,[St,(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.leave_data,t=>(a(),l("p",{class:"text-[#000]",key:t},o(t.leave_type?t.leave_type:"-"),1))),128))]),e("div",Mt,[Lt,(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.leave_data,t=>(a(),l("p",{class:"text-[#000]",key:t},o(t.opening_balance?t.opening_balance:"-"),1))),128))]),e("div",Rt,[Tt,(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.leave_data,t=>(a(),l("p",{class:"text-[#000]",key:t},o(t.availed?t.availed:"-"),1))),128))]),e("div",Ct,[At,(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.leave_data,t=>(a(),l("p",{class:"text-[#000]",key:t},o(t.closing_balance?t.closing_balance:"-"),1))),128))])])]),e("div",Vt,[Ht,Et,(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.salary_details,t=>(a(),l("div",{class:"py-2 mx-2 row",key:t},[e("div",Nt,[Yt,e("p",Ft,o(t.month_days?t.month_days:"-"),1)]),e("div",$t,[Ut,e("p",Bt,o(t.worked_Days?t.worked_Days:"-"),1)]),e("div",Ot,[zt,e("p",It,o(t.lop?t.lop:"-"),1)]),e("div",jt,[Wt,e("p",qt,o(t.arrears_Days?t.arrears_Days:"-"),1)])]))),128))]),e("div",Jt,[e("div",Kt,[e("table",Gt,[e("tr",Qt,[e("td",null,[Xt,(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.earnings[0],(t,d,x)=>(a(),l("h1",{class:U(["my-3",[d=="Total Earnings"?"text-black text-[16px]":"text-black"]]),key:x},o(d),3))),128))]),e("td",Zt,[es,(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.compensatory_data[0],(t,d,x)=>(a(),l("h1",{key:x,class:"mt-[12px] text-black"},o(t),1))),128))]),n(s).paySlipHTMLView.data.arrears[0]!=""?(a(),l("td",ts,[ss,(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.arrears[0],(t,d,x)=>(a(),l("h1",{key:x,class:"mt-[12px]"},o(t),1))),128))])):A("",!0),n(s).paySlipHTMLView.data.earnings[0]?(a(),l("td",as,[ls,(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.earnings[0],(t,d,x)=>(a(),l("h1",{key:x,class:U(["my-3",[d=="Total Earnings"?"text-black text-[16px]":""]])},o(t),3))),128))])):A("",!0)])])]),e("div",os,[e("table",ns,[e("tr",is,[e("td",null,[ds,(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.contribution[0],(t,d,x)=>(a(),l("p",{class:"my-2 text-[#000]",key:x},o(d),1))),128))]),e("td",null,[cs,(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.contribution[0],(t,d,x)=>(a(),l("p",{class:"my-2 text-[#000]",key:x},o(t),1))),128))])]),e("tr",ps,[e("td",null,[rs,(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.Tax_Deduction[0],(t,d,x)=>(a(),l("p",{class:U(["my-2 text-[#000]",[d=="Total Deduction"?"text-[18px] ":" text-black"]]),key:x},o(d),3))),128))]),e("td",null,[us,(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.Tax_Deduction[0],(t,d,x)=>(a(),l("p",{class:U(["my-2 text-[#000]",[d=="Total Deduction"?"text-[18px] ":" text-black"]]),key:x},o(t),3))),128))])])])])]),(a(!0),l(u,null,_(n(s).paySlipHTMLView.data.over_all[0],(t,d,x)=>(a(),l("div",{class:"my-2 row w-[100%]",key:x},[e("div",_s,[e("p",ys,o(d),1)]),e("div",hs,[e("p",ms,[d=="Net Salary Payable"?(a(),l("span",vs,"₹ ")):A("",!0),z(" "+o(t),1)])])]))),128)),fs,e("div",xs,[e("div",gs,[bs,e("img",{src:`${n(s).paySlipHTMLView.data.date_month.abs_logo}`,alt:"",class:"w-[140px] h-[50px]"},null,8,ws)])])])])]),_:1},8,["visible"])],64)}}};export{Ls as default};
