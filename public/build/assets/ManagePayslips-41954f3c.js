/* empty css                  *//* empty css              */import{$ as v,aj as Y,o as b,c as D,d as o,h as s,ai as f,w as y,a as N,t as A,F as H,g as C,H as z,P as W,I as B,u as j,J as I,R as O,S as J,x as K,y as G,M as Q,K as X,L as q,X as Z,N as ee,Q as ae,W as te}from"./toastservice.esm-5497698c.js";import"./blockui.esm-221ce14c.js";import{C as le}from"./confirmationservice.esm-712df8af.js";import{s as se}from"./progressspinner.esm-b55e6b3f.js";import{s as oe}from"./calendar.esm-ae4d5a30.js";import{d as ie,c as ne}from"./pinia-61b2fb76.js";import{a as x}from"./index-362795f3.js";const pe=ie("managePayslipStore",()=>{const S=v(),t=v(),k=v(),c=v(!1);async function h(i,r){c.value=!0,S.value="",await x.post("/generatePayslip",{month:i,year:r,type:"pdf"}).then(d=>{S.value=d.data.data}).finally(()=>{c.value=!1})}async function w(i,r,d){c.value=!0,await x.post("/payroll/paycheck/getEmployeePayslipDetailsAsHTML",{user_code:i,month:r,year:d}).then(u=>{k.value=u.data}).finally(()=>{c.value=!1})}async function P(i,r,d){c.value=!0,await x.post("/payroll/paycheck/getEmployeePayslipDetailsAsPDF",{user_code:i,month:r,year:d}).then(u=>{}).finally(()=>{c.value=!1})}async function g(i,r,d){console.log("sendMail_employeePayslip() : Sending mail to user : "+i),c.value=!0,x.post("/payroll/paycheck/sendMail_employeePayslip",{user_code:i,month:r,year:d}).then(u=>{console.log(" Response [sendMail_employeePayslip] : "+u.data.data)}).catch(u=>{console.log(u)}).finally(()=>{c.value=!1})}async function F(i,r,d,u){console.log("updatePayslipReleaseStatus() : Updating releasepayslip status to user : "+i);let p=new Date(t.value);x.post("/payroll/paycheck/updatePayslipReleaseStatus",{user_code:i,month:r,year:d,status:u}).then(e=>{console.log(" Response [updatePayslipReleaseStatus] : "+e.data.data)}).catch(e=>{console.log(e.data.data)}).finally(()=>{h(p.getMonth()+1,p.getFullYear())})}async function L(i,r,d,u){console.log("UpdateWithDrawStatus() : Updating withdraw :",i);let p=new Date(t.value);x.post("/payroll/paycheck/updatePayslipReleaseStatus",{user_code:i,month:r,year:d,status:u}).then(e=>{console.log(" Response [updatePayslipReleaseStatus] : "+e.data.data)}).catch(e=>{console.log(e.data.data)}).finally(()=>{h(p.getMonth()+1,p.getFullYear())})}function M(i,r,d){const u=i,p=document.createElement("a"),e=`${r}-${d}.pdf`;p.href=u,p.download=e,p.click()}async function T(i,r,d,u){console.log("Downloading payslip PDF....."),parseInt(dayjs(payroll_month).month())+1,dayjs(payroll_month).year(),await x.post("/payroll/paycheck/getEmployeePayslipDetailsAsPDF",{uid:getURLParams_UID(),user_code:i,month:formattedMonth,year:formattedYear}).then(p=>{if(console.log(" Response [downloadPayslipReleaseStatus] : "+JSON.stringify(p.data.data)),p.data.data){let e=p.data.data,l=p.data.emp_name,U=p.data.emp_month;e.startsWith("JVB")?(e="data:application/pdf;base64,"+e,M(e,l,U)):e.startsWith("data:application/pdf;base64")&&M(e)}else console.log("Response Url Not Found")})}return{array_employees_list:S,paySlipHTMLView:k,selectedPayRollDate:t,loading:c,getAllEmployeesPayslipDetails:h,getEmployeePayslipDetailsAsHTML:w,sendMail_employeePayslip:g,updatePayslipReleaseStatus:F,downloadPayslip:T,UpdateWithDrawStatus:L,getEmployeePayslipDetailsAsPDF:P}});const re={class:"d-flex justify-content-end"},de=o("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),ce={class:"my-4"},ue={class:"d-flex flex-column"},ye=["onClick"],me=["onClick"],fe={key:2,class:"text-success mt-2"},ve={key:3,class:"text-danger mt-2"},ge={key:0},he=o("h1",null," Payslip sent",-1),_e=[he],we={key:1},Pe=["onClick"],be=o("div",{class:"confirmation-content"},[o("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}}),o("span",null,"Are you sure you want to send Mail ?")],-1),De={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},xe=o("div",{class:"confirmation-content"},[o("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}}),o("span",null,"Are you sure you want to send Mail ?")],-1),ke={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},Re={class:"confirmation-content"},Ce=o("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Se={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},Me={class:"confirmation-content"},$e=o("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Fe={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},Le={class:"flex inline-flex card justify-content-center"},Te=["innerHTML"],Ue=o("h5",{style:{"text-align":"center"}},"Please wait...",-1),Ne={__name:"ManagePayslips",setup(S){const t=pe(),k=v(!1),c=v(!1),h=v(!1),w=v(!1),P=v(!1);v();const g=v();Y(()=>{t.selectedPayRollDate=new Date("03/03/2023"),t.selectedPayRollDate=new Date("03/03/2023"),t.getAllEmployeesPayslipDetails(t.selectedPayRollDate.getMonth()+1,t.selectedPayRollDate.getFullYear())});async function F(e){console.log("Showing payslip html for (user_code, month): "+e+" , "+parseInt(t.selectedPayRollDate.getMonth()+1)),await t.getEmployeePayslipDetailsAsHTML(e,t.selectedPayRollDate.getMonth()+1,t.selectedPayRollDate.getFullYear()),k.value=!0}function L(e){g.value=e,c.value=!0}function M(e){g.value=e,h.value=!0}function T(e){g.value=e,w.value=!0}async function i(e){await t.sendMail_employeePayslip(e,t.selectedPayRollDate.getMonth()+1,t.selectedPayRollDate.getFullYear()),c.value=!1}async function r(e){await t.updatePayslipReleaseStatus(e,t.selectedPayRollDate.getMonth()+1,t.selectedPayRollDate.getFullYear(),1),h.value=!1}async function d(e){g.value=e,P.value=!0}async function u(e){await t.UpdateWithDrawStatus(e,t.selectedPayRollDate.getMonth()+1,t.selectedPayRollDate.getFullYear(),0),P.value=!1}async function p(e){await t.downloadPayslip(e,t.selectedPayRollDate.getMonth()+1,t.selectedPayRollDate.getFullYear()),w.value=!1}return(e,l)=>{const U=C("Calendar"),m=C("Button"),_=C("Column"),E=C("DataTable"),R=C("Dialog"),V=C("ProgressSpinner");return b(),D(H,null,[o("div",re,[de,s(U,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:f(t).selectedPayRollDate,"onUpdate:modelValue":l[0]||(l[0]=a=>f(t).selectedPayRollDate=a),style:{border:"1px solid orange","border-radius":"7px",height:"38px"}},null,8,["modelValue"]),s(m,{class:"h-10 mb-2 btn btn-orange",label:"Generate",onClick:l[1]||(l[1]=a=>f(t).getAllEmployeesPayslipDetails(f(t).selectedPayRollDate.getMonth()+1,f(t).selectedPayRollDate.getFullYear()))})]),o("div",ce,[s(E,{value:f(t).array_employees_list,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:e.filters,"onUpdate:filters":l[2]||(l[2]=a=>e.filters=a),filterDisplay:"menu",loading:e.loading2,globalFilterFields:["name","status"]},{default:y(()=>[s(_,{headerStyle:"width: 3rem"}),s(_,{field:"user_code",header:"Employee Code",headerStyle:"width: 3rem"}),s(_,{field:"name",header:"Employee Name"}),s(_,{field:"email",header:"Personal Mail"}),s(_,{field:"is_payslip_released",header:"Payslip Status"},{body:y(a=>[o("div",ue,[a.data.is_payslip_released==1?(b(),D("button",{key:0,class:"btn z-0",style:{border:"1px solid navy"},onClick:$=>d(a.data.user_code)},"withdraw",8,ye)):(b(),D("button",{key:1,class:"btn-primary rounded z-0",style:{padding:"4px 0 !important","margin-top":"10px"},onClick:$=>M(a.data.user_code)},"Release payslip",8,me)),a.data.is_payslip_released==1?(b(),D("h1",fe," Released ")):N("",!0),a.data.is_payslip_released==0||a.data.is_payslip_released==null?(b(),D("h1",ve," Not Released ")):N("",!0)])]),_:1}),s(_,{field:"is_payslip_mail_sent",header:"Mail Status"},{body:y(a=>[a.data.is_payslip_mail_sent==1?(b(),D("div",ge,_e)):(b(),D("div",we,[o("button",{class:"btn-primary rounded z-0",onClick:$=>L(a.data.user_code)},"Send Payslip",8,Pe)]))]),_:1}),s(_,{header:"Download"},{body:y(a=>[s(m,{class:"btn-primary z-0",style:{},label:"Download",onClick:$=>T(a.data.user_code)},null,8,["onClick"])]),_:1}),s(_,{header:"View Payslip"},{body:y(a=>[s(m,{class:"btn-primary z-0",style:{},label:"View",onClick:$=>F(a.data.user_code)},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters","loading"])]),s(R,{header:"Confirmation",visible:c.value,"onUpdate:visible":l[5]||(l[5]=a=>c.value=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:y(()=>[be,o("div",De,[s(m,{class:"btn-primary mr-3 py-2",label:"Yes",icon:"pi pi-check",onClick:l[3]||(l[3]=a=>i(g.value)),autofocus:""}),s(m,{label:"No",icon:"pi pi-times",onClick:l[4]||(l[4]=a=>c.value=!1),class:"p-button-text py-2",autofocus:""})])]),_:1},8,["visible"]),s(R,{header:"Confirmation",visible:P.value,"onUpdate:visible":l[8]||(l[8]=a=>P.value=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:y(()=>[xe,o("div",ke,[s(m,{class:"btn-primary mr-3 py-2",label:"Yes",icon:"pi pi-check",onClick:l[6]||(l[6]=a=>u(g.value)),autofocus:""}),s(m,{label:"No",icon:"pi pi-times",onClick:l[7]||(l[7]=a=>P.value=!1),class:"p-button-text py-2",autofocus:""})])]),_:1},8,["visible"]),s(R,{header:"Confirmation",visible:h.value,"onUpdate:visible":l[11]||(l[11]=a=>h.value=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:y(()=>[o("div",Re,[Ce,o("span",null,"Are you sure you want to release payslip? "+A(f(t).name),1)]),o("div",Se,[s(m,{class:"btn-primary py-2 mr-3",label:"Yes",icon:"pi pi-check",onClick:l[9]||(l[9]=a=>r(g.value)),autofocus:""}),s(m,{label:"No",icon:"pi pi-times",onClick:l[10]||(l[10]=a=>h.value=!1),class:"p-button-text py-2",autofocus:""})])]),_:1},8,["visible"]),s(R,{header:"Confirmation",visible:w.value,"onUpdate:visible":l[14]||(l[14]=a=>w.value=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:y(()=>[o("div",Me,[$e,o("span",null,"Are you sure you want to download payslip? "+A(f(t).name),1)]),o("div",Fe,[s(m,{class:"py-2 mr-3 btn-primary",label:"Yes",icon:"pi pi-check",onClick:l[12]||(l[12]=a=>p(g.value,e.selectedUsername)),autofocus:""}),s(m,{label:"No",icon:"pi pi-times",onClick:l[13]||(l[13]=a=>w.value=!1),class:"p-button-text py-2",autofocus:""})])]),_:1},8,["visible"]),o("div",Le,[s(R,{visible:k.value,"onUpdate:visible":l[15]||(l[15]=a=>k.value=a),modal:"",header:"Payslip",style:{width:"50vw"}},{default:y(()=>[o("div",{innerHTML:f(t).paySlipHTMLView},null,8,Te)]),_:1},8,["visible"])]),s(R,{header:"Header",visible:f(t).loading,"onUpdate:visible":l[16]||(l[16]=a=>f(t).loading=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:y(()=>[s(V,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:y(()=>[Ue]),_:1},8,["visible"])],64)}}},n=z(Ne),Ae=ne();n.use(W,{ripple:!0});n.use(le);n.use(B);n.use(Ae);n.directive("tooltip",j);n.directive("badge",I);n.directive("ripple",O);n.directive("styleclass",J);n.directive("focustrap",K);n.component("Button",G);n.component("DataTable",Q);n.component("Column",X);n.component("ConfirmDialog",q);n.component("Toast",Z);n.component("Dialog",ee);n.component("Dropdown",ae);n.component("ProgressSpinner",se);n.component("InputText",te);n.component("Calendar",oe);n.mount("#vjs_manage_payslips");
