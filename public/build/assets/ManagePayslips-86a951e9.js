/* empty css              *//* empty css                     *//* empty css                   */import{Q as w,ab as q,o as a,c as l,aa as n,b as G,a as $,d as e,h as p,w as P,t as o,F as u,f as y,l as z,g as C,n as F,H as Q,P as X,R as Z,u as ee,x as te,I as se,J as ae,K as le,M as oe}from"./inputnumber.esm-5d69a21b.js";import{a as ne,T as ie,B as de,S as ce,s as pe,b as re}from"./toastservice.esm-9d3b5dc9.js";import"./blockui.esm-3d95c539.js";import{a as ue}from"./datatable.esm-7205543b.js";import{C as _e}from"./confirmationservice.esm-9a37c562.js";import{s as ye}from"./progressspinner.esm-7d63b3de.js";import{s as me}from"./calendar.esm-0c5ba9cf.js";import{s as he}from"./sidebar.esm-5c7699a8.js";import{s as ve}from"./overlaypanel.esm-bba371af.js";import{d as fe,c as xe}from"./pinia-c08c4665.js";import{a as L}from"./index-362795f3.js";import"./dayjs.min-2f06af28.js";import{L as ge}from"./LoadingSpinner-264a0661.js";/* empty css                                                                       */import"./_plugin-vue_export-helper-c27b6911.js";const be=fe("managePayslipStore",()=>{const E=w(),s=w(),S=w(),v=w(!1);async function D(m,f){v.value=!0,E.value="",await L.post("payroll/getAllEmployeesPayslipDetails",{month:m,year:f,type:"pdf"}).then(x=>{E.value=x.data.data}).finally(()=>{v.value=!1})}async function T(m,f,x){v.value=!0;let b="/viewPayslipdetails";await L.post(b,{user_code:m,month:f,year:x,type:"pdf"}).then(h=>{S.value=h.data}).finally(()=>{v.value=!1})}async function N(m,f,x){v.value=!0,await L.post("/payroll/paycheck/getEmployeePayslipDetailsAsPDF",{user_code:m,month:f,year:x}).then(b=>{}).finally(()=>{v.value=!1})}async function A(m,f,x){console.log("sendMail_employeePayslip() : Sending mail to user : "+m),v.value=!0,L.post("/generatePayslip",{user_code:m,month:f,year:x,type:"mail"}).then(b=>{console.log(" Response [sendMail_employeePayslip] : "+b.data)}).catch(b=>{console.log(b)}).finally(()=>{v.value=!1})}async function k(m,f,x,b){console.log("updatePayslipReleaseStatus() : Updating releasepayslip status to user : "+m);let h=new Date(s.value);L.post("/payroll/paycheck/updatePayslipReleaseStatus",{user_code:m,month:f,year:x,status:b}).then(r=>{console.log(" Response [updatePayslipReleaseStatus] : "+r.data.data)}).catch(r=>{console.log(r.data.data)}).finally(()=>{D(h.getMonth()+1,h.getFullYear())})}async function B(m,f,x,b){console.log("UpdateWithDrawStatus() : Updating withdraw :",m);let h=new Date(s.value);L.post("/payroll/paycheck/updatePayslipReleaseStatus",{user_code:m,month:f,year:x,status:b}).then(r=>{console.log(" Response [updatePayslipReleaseStatus] : "+r.data.data)}).catch(r=>{console.log(r.data.data)}).finally(()=>{D(h.getMonth()+1,h.getFullYear())})}function V(m,f,x,b){const h=m,r=document.createElement("a"),H=`${f}-${x}-${b}.pdf`;r.href=h,r.download=H,r.click()}async function U(m,f,x,b){console.log("Downloading payslip PDF....."),v.value=!0,await L.post("/generatePayslip",{user_code:m,month:f,year:x,type:"pdf"}).then(h=>{if(console.log(" Response [downloadPayslipReleaseStatus] : "+JSON.stringify(h.data.data)),h.data){let r=h.data.payslip,H=h.data.emp_name,O=h.data.month,I=h.data.year;console.log(r),r&&(r.startsWith("JVB")?(r="data:application/pdf;base64,"+r,V(r,H,O,I)):r.startsWith("data:application/pdf;base64")&&V(r))}else console.log("Response Url Not Found")}).finally(()=>{v.value=!1})}return{array_employees_list:E,paySlipHTMLView:S,selectedPayRollDate:s,loading:v,getAllEmployeesPayslipDetails:D,getEmployeePayslipDetailsAsHTML:T,sendMail_employeePayslip:A,updatePayslipReleaseStatus:k,downloadPayslip:U,UpdateWithDrawStatus:B,getEmployeePayslipDetailsAsPDF:N}});const we={class:"flex justify-between"},ke=e("div",null,[e("h6",{class:"mb-2 font-semibold text-lg"},"Manage Employee Payslips")],-1),Pe={class:"d-flex justify-content-end"},De=e("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),Se={class:"my-4"},Me={class:"d-flex flex-column"},Te=["onClick"],Re=["onClick"],Ce={key:2,class:"text-success mt-2"},Le={key:3,class:"text-danger mt-2"},Ae={key:0},Ve=e("h1",null," Payslip sent",-1),$e=[Ve],He={key:1},Ee=["onClick"],Ne=["onClick"],Ye={class:"d-flex flex-column p-0 m-0"},Fe=["onClick"],Be=["onClick"],Ue=e("div",{class:"confirmation-content"},[e("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}}),e("span",null,"Are you sure you want to send Mail ?")],-1),Oe={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},Ie=e("div",{class:"confirmation-content"},[e("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}}),e("span",null,"Are you sure you want to send Mail ?")],-1),ze={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},je={class:"confirmation-content"},We=e("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Je={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},Ke={class:"confirmation-content"},qe=e("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Ge={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},Qe={class:"flex justify-center w-[100%] my-3 rounded-lg"},Xe={class:"w-[95%] h-[90%] shadow-lg p-4"},Ze={class:"w-[100%] flex justify-between"},et={class:"flex flex-col"},tt=e("h1",{class:"text-[25px]"},[z("PAYSLIP "),e("span",{class:"text-gray-500 text-[25px]"},"MAR 2023")],-1),st=["src"],at={class:"mt-[30px]"},lt=e("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),ot={class:"col-3"},nt=e("p",{class:""},"Employee Code",-1),it={class:"text-[#000] text-[12px]"},dt={class:"col-3"},ct=e("p",null,"Date Joining",-1),pt={class:"text-[#000]"},rt={class:"col-3"},ut=e("p",null,"Department",-1),_t={class:"text-[#000]"},yt={class:"col-3"},mt=e("p",null,"Designation",-1),ht={class:"text-[#000]"},vt={class:"col-3"},ft=e("p",null,"Payment Mode",-1),xt={class:"text-[#000]"},gt={class:"col-3"},bt=e("p",null,"Bank Name",-1),wt={class:"text-[#000]"},kt={class:"col-3"},Pt=e("p",null,"Bank Account",-1),Dt={class:"text-[#000]"},St={class:"col-3"},Mt=e("p",null,"Bank ISFC",-1),Tt={class:"text-[#000]"},Rt={class:"col-3"},Ct=e("p",null,"PAN",-1),Lt={class:"text-[#000]"},At=e("div",{class:"col-3"},[e("p",null,"ESIC"),e("p",{class:"text-[#000]"},"Date Joined")],-1),Vt={class:"col-3"},$t=e("p",null,"UAN",-1),Ht={class:"text-[#000]"},Et={class:"col-3"},Nt=e("p",null,"EPF Number",-1),Yt={class:"text-[#000]"},Ft=e("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),Bt={class:""},Ut=e("h1",{class:"font-semibold text-[16px] my-[16px]"},"LEAVE DETAILS",-1),Ot=e("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),It={class:"py-2 mx-2 row"},zt={class:"col-3"},jt=e("p",null,"Leave Type",-1),Wt={class:"col-3"},Jt=e("p",null,"Opening Balance",-1),Kt={class:"col-3"},qt=e("p",null,"Availed",-1),Gt={class:"col-3"},Qt=e("p",null,"Closing Balance",-1),Xt={class:""},Zt=e("h1",{class:"font-semibold text-[16px] my-[16px]"},"SALARY DETAILS",-1),es=e("div",{class:"border-[1.5px] border-[#000] my-[12px]"},null,-1),ts={class:"col-3"},ss=e("p",null,"ACTUAL PAYABLE DAYS",-1),as={class:"text-[#000]"},ls={class:"col-3"},os=e("p",null,"TOTAL WORKING DAYS",-1),ns={class:"text-[#000]"},is={class:"col-3"},ds=e("p",null,"LOSS OF PAY DAYS",-1),cs={class:"text-[#000]"},ps={class:"col-3"},rs=e("p",null,"ARREAR DAYS PAYABLE",-1),us={class:"text-[#000]"},_s={class:"row mt-2 py-2 border-y-[1px] border-[gray] mx-2"},ys={class:"col-7 border-r-[1.4px] border-[gray]"},ms={class:"w-[100%]"},hs={class:"w-[100%]"},vs=e("h1",{class:"font-semibold"},"Earnings",-1),fs={class:"flex flex-col items-start pt-[2px]"},xs=e("h1",{class:"font-semibold"},"Fixed",-1),gs={key:0,class:"flex flex-col items-start pt-[2px]"},bs=e("h1",{class:"font-semibold"},"Arrears",-1),ws={key:1},ks=e("h1",{class:"font-semibold"},"Earned",-1),Ps={class:"col"},Ds={border:"2",class:"w-[100%]"},Ss={class:"w-[100%]"},Ms=e("h1",{class:"font-semibold"},"CONTRIBUTIONS",-1),Ts=e("h1",{class:"font-semibold"}," ",-1),Rs={class:"w-[100%]"},Cs=e("h1",{class:"font-semibold"},"Tax Duductions",-1),Ls=e("h1",{class:"font-semibold"}," ",-1),As={class:"my-2 col-5"},Vs={class:""},$s={class:"my-2 col-7"},Hs={class:"text-[16px]"},Es={key:0,class:"text-[16px]",style:{"font-family":"sans-serif !important"}},Ns=e("div",null,[e("p",{class:"mt-2"},"*** Note:All amounts displayed in this payslips are in INR"),e("p",{class:"mt-[50px]"},"**This is computer generated statement,does not require signature.")],-1),Ys={class:""},Fs={class:"flex items-center float-right"},Bs=e("p",{class:"mx-2"},"Powered by ",-1),Us=["src"],Os={__name:"ManagePayslips",setup(E){const s=be();w(!1);const S=w(!1),v=w(!1),D=w(!1),T=w(!1);w();const N=w(),A=d=>{N.value.toggle(d)},k=w(),B=w(),V=w(!1);w(),q(()=>{s.selectedPayRollDate=new Date,s.selectedPayRollDate=new Date,s.getAllEmployeesPayslipDetails(s.selectedPayRollDate.getMonth()+1,s.selectedPayRollDate.getFullYear())});async function U(d){console.log("Showing payslip html for (user_code, month): "+d+" , "+parseInt(s.selectedPayRollDate.getMonth()+1)),await s.getEmployeePayslipDetailsAsHTML(d,s.selectedPayRollDate.getMonth()+1,s.selectedPayRollDate.getFullYear()),V.value=!0,A()}function m(d){k.value=d,S.value=!0}function f(d){k.value=d,v.value=!0,A()}function x(d){console.log("selected_user_code",d),k.value=d}function b(d){D.value=!0}async function h(d){await s.sendMail_employeePayslip(d,s.selectedPayRollDate.getMonth()+1,s.selectedPayRollDate.getFullYear()),S.value=!1}async function r(d){await s.updatePayslipReleaseStatus(d,s.selectedPayRollDate.getMonth()+1,s.selectedPayRollDate.getFullYear(),1),v.value=!1}async function H(d){k.value=d,T.value=!0}async function O(d){await s.UpdateWithDrawStatus(d,s.selectedPayRollDate.getMonth()+1,s.selectedPayRollDate.getFullYear(),0),T.value=!1}async function I(d){D.value=!1,await s.downloadPayslip(d,s.selectedPayRollDate.getMonth()+1,s.selectedPayRollDate.getFullYear()),A()}return(d,i)=>{const j=C("Calendar"),R=C("Column"),W=C("OverlayPanel"),J=C("DataTable"),M=C("Button"),Y=C("Dialog"),K=C("Sidebar");return a(),l(u,null,[n(s).loading?(a(),G(ge,{key:0,class:"absolute z-50 bg-white"})):$("",!0),e("div",we,[ke,e("div",Pe,[De,p(j,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:n(s).selectedPayRollDate,"onUpdate:modelValue":i[0]||(i[0]=t=>n(s).selectedPayRollDate=t),style:{"border-radius":"7px",height:"38px"},onDateSelect:i[1]||(i[1]=t=>n(s).getAllEmployeesPayslipDetails(n(s).selectedPayRollDate.getMonth()+1,n(s).selectedPayRollDate.getFullYear()))},null,8,["modelValue"])])]),e("div",Se,[p(J,{value:n(s).array_employees_list,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:d.filters,"onUpdate:filters":i[2]||(i[2]=t=>d.filters=t),filterDisplay:"menu",loading:d.loading2,globalFilterFields:["name","status"]},{default:P(()=>[p(R,{headerStyle:"width: 3rem"}),p(R,{field:"user_code",header:"Employee Code",headerStyle:"width: 3rem"}),p(R,{field:"name",header:"Employee Name"}),p(R,{field:"email",header:"Personal Mail"}),p(R,{field:"is_payslip_released",header:"Payslip Status"},{body:P(t=>[e("div",Me,[t.data.is_payslip_released==1?(a(),l("button",{key:0,class:"btn z-0 border-[1px solid ] border-black",onClick:c=>H(t.data.user_code)},"withdraw",8,Te)):(a(),l("button",{key:1,class:"bg-[#000] text-[white] rounded z-0",style:{padding:"4px 0 !important","margin-top":"10px"},onClick:c=>f(t.data.user_code)},"Release payslip",8,Re)),t.data.is_payslip_released==1?(a(),l("h1",Ce," Released ")):$("",!0),t.data.is_payslip_released==0||t.data.is_payslip_released==null?(a(),l("h1",Le," Not Released ")):$("",!0)])]),_:1}),p(R,{field:"is_payslip_mail_sent",header:"Mail Status"},{body:P(t=>[t.data.is_payslip_mail_sent==1?(a(),l("div",Ae,$e)):(a(),l("div",He,[e("button",{class:"bg-[#f9be00] text-white rounded p-2 z-0",onClick:c=>m(t.data.user_code)},"Send Payslip",8,Ee)]))]),_:1}),p(R,{header:"Action"},{body:P(t=>[e("button",{class:"",type:"button",onClick:A},[e("i",{class:"pi pi-ellipsis-v",onClick:c=>x(t.data.user_code)},null,8,Ne)]),p(W,{ref_key:"op",ref:N,style:{width:"160px","margin-top":"12px !important","margin-right":"20px !important"},class:"p-0 m-0 !z-0"},{default:P(()=>[e("div",Ye,[e("button",{class:"fw-semibold text-black hover:bg-gray-200 border-bottom-1 p-2",onClick:c=>b(t.data.user_code)},"Download",8,Fe),e("button",{class:"fw-semibold text-black hover:bg-gray-200 p-2",onClick:c=>U(t.data.user_code)},"View",8,Be)])]),_:2},1536)]),_:1})]),_:1},8,["value","filters","loading"])]),p(Y,{header:"Confirmation",visible:S.value,"onUpdate:visible":i[5]||(i[5]=t=>S.value=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:P(()=>[Ue,e("div",Oe,[p(M,{class:"btn-primary mr-3 py-2",label:"Yes",icon:"pi pi-check",onClick:i[3]||(i[3]=t=>h(k.value)),autofocus:""}),p(M,{label:"No",icon:"pi pi-times",onClick:i[4]||(i[4]=t=>S.value=!1),class:"p-button-text py-2",autofocus:""})])]),_:1},8,["visible"]),p(Y,{header:"Confirmation",visible:T.value,"onUpdate:visible":i[8]||(i[8]=t=>T.value=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:P(()=>[Ie,e("div",ze,[p(M,{class:"btn-primary mr-3 py-2",label:"Yes",icon:"pi pi-check",onClick:i[6]||(i[6]=t=>O(k.value)),autofocus:""}),p(M,{label:"No",icon:"pi pi-times",onClick:i[7]||(i[7]=t=>T.value=!1),class:"p-button-text py-2",autofocus:""})])]),_:1},8,["visible"]),p(Y,{header:"Confirmation",visible:v.value,"onUpdate:visible":i[11]||(i[11]=t=>v.value=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:P(()=>[e("div",je,[We,e("span",null,"Are you sure you want to release payslip? "+o(n(s).name),1)]),e("div",Je,[p(M,{class:"btn-primary py-2 mr-3",label:"Yes",icon:"pi pi-check",onClick:i[9]||(i[9]=t=>r(k.value)),autofocus:""}),p(M,{label:"No",icon:"pi pi-times",onClick:i[10]||(i[10]=t=>v.value=!1),class:"p-button-text py-2",autofocus:""})])]),_:1},8,["visible"]),p(Y,{header:"Confirmation",visible:D.value,"onUpdate:visible":i[14]||(i[14]=t=>D.value=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:P(()=>[e("div",Ke,[qe,e("span",null,"Are you sure you want to download payslip? "+o(n(s).name),1)]),e("div",Ge,[p(M,{class:"py-2 mr-3 btn-primary",label:"Yes",icon:"pi pi-check",onClick:i[12]||(i[12]=t=>I(k.value,B.value)),autofocus:""}),p(M,{label:"No",icon:"pi pi-times",onClick:i[13]||(i[13]=t=>D.value=!1),class:"p-button-text py-2",autofocus:""})])]),_:1},8,["visible"]),p(K,{position:"right",visible:V.value,"onUpdate:visible":i[15]||(i[15]=t=>V.value=t),modal:"",header:"Payslip",style:{width:"58vw"}},{default:P(()=>[e("div",Qe,[e("div",Xe,[e("div",Ze,[e("div",et,[tt,(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.client_details,t=>(a(),l("h2",{class:"text-[16px] mt-[10px] text-[#000]",key:t},o(t.client_fullname),1))),128)),(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.client_details,t=>(a(),l("p",{class:"w-[300px] mt-[10px]",key:t},o(t.address),1))),128))]),(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.client_details,t=>(a(),l("div",{key:t},[e("img",{src:`${t.client_logo}`,alt:"testing",class:"w-[200px]"},null,8,st)]))),128))]),e("div",at,[(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.personal_details,t=>(a(),l("h1",{class:"font-semibold text-[16px] my-[16px]",key:t}," Employee Name : "+o(t.name),1))),128)),lt,(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.personal_details,t=>(a(),l("div",{class:"mx-2 row border-b-[1px] border-[gray] py-2",key:t},[e("div",ot,[nt,e("p",it,o(t.user_code?t.user_code:"-"),1)]),e("div",dt,[ct,e("p",pt,o(t.doj?d.dayjs(t.doj).format("DD-MMM-YYYY"):"-"),1)]),e("div",rt,[ut,e("p",_t,o(t.department_name?t.department_name:"-"),1)]),e("div",yt,[mt,e("p",ht,o(t.designation?t.designation:"-"),1)])]))),128)),(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.personal_details,t=>(a(),l("div",{class:"mx-2 row border-b-[1px] border-[gray] py-2",key:t},[e("div",vt,[ft,e("p",xt,o(t.bank_account_number?"Bank":"cheque"),1)]),e("div",gt,[bt,e("p",wt,o(t.bank_name?t.bank_name:"-"),1)]),e("div",kt,[Pt,e("p",Dt,o(t.bank_account_number?t.bank_account_number:"-"),1)]),e("div",St,[Mt,e("p",Tt,o(t.bank_ifsc_code?t.bank_ifsc_code:"-"),1)])]))),128)),(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.personal_details,t=>(a(),l("div",{class:"py-2 mx-2 row",key:t},[e("div",Rt,[Ct,e("p",Lt,o(t.pan_number?t.pan_number:"-"),1)]),At,e("div",Vt,[$t,e("p",Ht,o(t.uan_number?t.uan_number:"-"),1)]),e("div",Et,[Nt,e("p",Yt,o(t.epf_number?t.epf_number:"-"),1)])]))),128)),Ft]),e("div",Bt,[Ut,Ot,e("div",It,[e("div",zt,[jt,(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.leave_data,t=>(a(),l("p",{class:"text-[#000]",key:t},o(t.leave_type?t.leave_type:"-"),1))),128))]),e("div",Wt,[Jt,(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.leave_data,t=>(a(),l("p",{class:"text-[#000]",key:t},o(t.opening_balance?t.opening_balance:"-"),1))),128))]),e("div",Kt,[qt,(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.leave_data,t=>(a(),l("p",{class:"text-[#000]",key:t},o(t.avalied?t.avalied:"-"),1))),128))]),e("div",Gt,[Qt,(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.leave_data,t=>(a(),l("p",{class:"text-[#000]",key:t},o(t.closing_balance?t.closing_balance:"-"),1))),128))])])]),e("div",Xt,[Zt,es,(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.salary_details,t=>(a(),l("div",{class:"py-2 mx-2 row",key:t},[e("div",ts,[ss,e("p",as,o(t.month_days?t.month_days:"-"),1)]),e("div",ls,[os,e("p",ns,o(t.worked_Days?t.worked_Days:"-"),1)]),e("div",is,[ds,e("p",cs,o(t.lop?t.lop:"-"),1)]),e("div",ps,[rs,e("p",us,o(t.arrears_Days?t.arrears_Days:"-"),1)])]))),128))]),e("div",_s,[e("div",ys,[e("table",ms,[e("tr",hs,[e("td",null,[vs,(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.earnings[0],(t,c,g)=>(a(),l("h1",{class:F(["my-3",[c=="Total Earnings"?"text-black text-[16px]":"text-black"]]),key:g},o(c),3))),128))]),e("td",fs,[xs,(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.compensatory_data[0],(t,c,g)=>(a(),l("h1",{key:g,class:"mt-[12px] text-black"},o(t),1))),128))]),n(s).paySlipHTMLView.data.arrears[0]!=""?(a(),l("td",gs,[bs,(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.arrears[0],(t,c,g)=>(a(),l("h1",{key:g,class:"mt-[12px]"},o(t),1))),128))])):$("",!0),n(s).paySlipHTMLView.data.earnings[0]?(a(),l("td",ws,[ks,(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.earnings[0],(t,c,g)=>(a(),l("h1",{key:g,class:F(["my-3",[c=="Total Earnings"?"text-black text-[16px]":""]])},o(t),3))),128))])):$("",!0)])])]),e("div",Ps,[e("table",Ds,[e("tr",Ss,[e("td",null,[Ms,(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.contribution[0],(t,c,g)=>(a(),l("p",{class:"my-2 text-[#000]",key:g},o(c),1))),128))]),e("td",null,[Ts,(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.contribution[0],(t,c,g)=>(a(),l("p",{class:"my-2 text-[#000]",key:g},o(t),1))),128))])]),e("tr",Rs,[e("td",null,[Cs,(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.Tax_Deduction[0],(t,c,g)=>(a(),l("p",{class:F(["my-2 text-[#000]",[c=="Total Deduction"?"text-[18px] ":" text-black"]]),key:g},o(c),3))),128))]),e("td",null,[Ls,(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.Tax_Deduction[0],(t,c,g)=>(a(),l("p",{class:F(["my-2 text-[#000]",[c=="Total Deduction"?"text-[18px] ":" text-black"]]),key:g},o(t),3))),128))])])])])]),(a(!0),l(u,null,y(n(s).paySlipHTMLView.data.over_all[0],(t,c,g)=>(a(),l("div",{class:"my-2 row w-[100%]",key:g},[e("div",As,[e("p",Vs,o(c),1)]),e("div",$s,[e("p",Hs,[c=="Net Salary Payable"?(a(),l("span",Es,"₹ ")):$("",!0),z(" "+o(t),1)])])]))),128)),Ns,e("div",Ys,[e("div",Fs,[Bs,e("img",{src:`${n(s).paySlipHTMLView.data.date_month.abs_logo}`,alt:"",class:"w-[140px] h-[50px]"},null,8,Us)])])])])]),_:1},8,["visible"])],64)}}},_=Q(Os),Is=xe();_.use(X,{ripple:!0});_.use(_e);_.use(ne);_.use(Is);_.directive("tooltip",ie);_.directive("badge",de);_.directive("ripple",Z);_.directive("styleclass",ce);_.directive("focustrap",ee);_.component("Button",te);_.component("DataTable",ue);_.component("Column",se);_.component("ConfirmDialog",pe);_.component("Toast",re);_.component("Dialog",ae);_.component("Dropdown",le);_.component("ProgressSpinner",ye);_.component("InputText",oe);_.component("Sidebar",he);_.component("Calendar",me);_.component("OverlayPanel",ve);_.mount("#vjs_manage_payslips");
