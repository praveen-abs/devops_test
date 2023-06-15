import{H as f,I as N,o as D,c as x,d as s,h as l,af as v,w as y,a as A,t as U,F as H,g as S,J as z,P as B,K as W,R as j,u as I,v as O,L as J,Q as K,M as G,N as Q,A as q}from"./toastservice.esm-8fb4434b.js";import{T as X,B as Z,S as ee,b as ae,a as te}from"./styleclass.esm-177a019b.js";import"./blockui.esm-28d5b93f.js";import{C as le}from"./confirmationservice.esm-70c98e17.js";import{s as se}from"./progressspinner.esm-ad93ab56.js";import{s as oe}from"./calendar.esm-cb84fdd3.js";import{d as ie,c as ne}from"./pinia-e794dd07.js";import{a as k}from"./index-3716a3fc.js";import"./_commonjsHelpers-042e6b4d.js";const pe=ie("managePayslipStore",()=>{const M=f(),a=f(),C=f(),p=f(!1);async function h(n,r){p.value=!0,M.value="",await k.post("getAllEmployeesPayslipDetails",{month:n,year:r}).then(d=>{M.value=d.data.data}).finally(()=>{p.value=!1})}async function P(n,r,d){p.value=!0,await k.post("/payroll/paycheck/getEmployeePayslipDetailsAsHTML",{user_code:n,month:r,year:d}).then(c=>{C.value=c.data}).finally(()=>{p.value=!1})}async function b(n,r,d){p.value=!0,await k.post("/payroll/paycheck/getEmployeePayslipDetailsAsPDF",{user_code:n,month:r,year:d}).then(c=>{}).finally(()=>{p.value=!1})}async function g(n,r,d){console.log("sendMail_employeePayslip() : Sending mail to user : "+n),p.value=!0,k.post("/payroll/paycheck/sendMail_employeePayslip",{user_code:n,month:r,year:d}).then(c=>{console.log(" Response [sendMail_employeePayslip] : "+c.data.data)}).catch(c=>{console.log(c)}).finally(()=>{p.value=!1})}async function T(n,r,d,c){console.log("updatePayslipReleaseStatus() : Updating releasepayslip status to user : "+n);let u=new Date(a.value);k.post("/payroll/paycheck/updatePayslipReleaseStatus",{user_code:n,month:r,year:d,status:c}).then(_=>{console.log(" Response [updatePayslipReleaseStatus] : "+_.data.data)}).catch(_=>{console.log(_.data.data)}).finally(()=>{h(u.getMonth()+1,u.getFullYear())})}async function F(n,r,d,c){console.log("UpdateWithDrawStatus() : Updating withdraw :",n);let u=new Date(a.value);k.post("/payroll/paycheck/updatePayslipReleaseStatus",{user_code:n,month:r,year:d,status:c}).then(_=>{console.log(" Response [updatePayslipReleaseStatus] : "+_.data.data)}).catch(_=>{console.log(_.data.data)}).finally(()=>{h(u.getMonth()+1,u.getFullYear())})}async function L(n,r,d,c){new Date(a.value),k.post("/payroll/paycheck/getEmployeePayslipDetailsAsPDF",{user_code:n,month:r,year:d,status:c}).then(u=>{console.log(" Response [downloadPayslipReleaseStatus] : "+JSON.stringify(u.data.data)),window.open(`data:application/pdf;base64,${u.data.data}`)}).catch(u=>{console.log(u)})}return{array_employees_list:M,paySlipHTMLView:C,selectedPayRollDate:a,loading:p,getAllEmployeesPayslipDetails:h,getEmployeePayslipDetailsAsHTML:P,sendMail_employeePayslip:g,updatePayslipReleaseStatus:T,downloadPayslip:L,UpdateWithDrawStatus:F,getEmployeePayslipDetailsAsPDF:b}});const re={class:"d-flex justify-content-end"},de=s("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),ce={class:"my-4"},ue={class:"d-flex flex-column"},ye=["onClick"],me=["onClick"],ve={key:2,class:"text-success mt-2"},fe={key:3,class:"text-danger mt-2"},ge={key:0},he=s("h1",null," Payslip sent",-1),_e=[he],we={key:1},Pe=["onClick"],be=s("div",{class:"confirmation-content"},[s("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}}),s("span",null,"Are you sure you want to send Mail ?")],-1),De={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},xe=s("div",{class:"confirmation-content"},[s("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}}),s("span",null,"Are you sure you want to send Mail ?")],-1),ke={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},Ce={class:"confirmation-content"},Re=s("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Se={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},Me={class:"confirmation-content"},$e=s("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Te={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},Fe={class:"card flex justify-content-center inline-flex"},Le=["innerHTML"],Ae=s("h5",{style:{"text-align":"center"}},"Please wait...",-1),Ue={__name:"ManagePayslips",setup(M){const a=pe(),C=f(!1),p=f(!1),h=f(!1),P=f(!1),b=f(!1);f();const g=f();N(()=>{a.selectedPayRollDate=new Date("03/03/2023"),a.getAllEmployeesPayslipDetails(a.selectedPayRollDate.getMonth()+1,a.selectedPayRollDate.getFullYear())});async function T(o){console.log("Showing payslip html for (user_code, month): "+o+" , "+parseInt(a.selectedPayRollDate.getMonth()+1)),await a.getEmployeePayslipDetailsAsHTML(o,a.selectedPayRollDate.getMonth()+1,a.selectedPayRollDate.getFullYear()),C.value=!0}function F(o){g.value=o,p.value=!0}function L(o){g.value=o,h.value=!0}function n(o){g.value=o,P.value=!0}async function r(o){await a.sendMail_employeePayslip(o,a.selectedPayRollDate.getMonth()+1,a.selectedPayRollDate.getFullYear()),p.value=!1}async function d(o){await a.updatePayslipReleaseStatus(o,a.selectedPayRollDate.getMonth()+1,a.selectedPayRollDate.getFullYear(),1),h.value=!1}async function c(o){g.value=o,b.value=!0}async function u(o){await a.UpdateWithDrawStatus(o,a.selectedPayRollDate.getMonth()+1,a.selectedPayRollDate.getFullYear(),0),b.value=!1}async function _(o){await a.downloadPayslip(o,a.selectedPayRollDate.getMonth()+1,a.selectedPayRollDate.getFullYear()),P.value=!1}return(o,t)=>{const E=S("Calendar"),m=S("Button"),w=S("Column"),V=S("DataTable"),R=S("Dialog"),Y=S("ProgressSpinner");return D(),x(H,null,[s("div",re,[de,l(E,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:v(a).selectedPayRollDate,"onUpdate:modelValue":t[0]||(t[0]=e=>v(a).selectedPayRollDate=e),style:{border:"1px solid orange","border-radius":"7px",height:"38px"}},null,8,["modelValue"]),l(m,{class:"h-10 mb-2 btn btn-orange",label:"Generate",onClick:t[1]||(t[1]=e=>v(a).getAllEmployeesPayslipDetails(v(a).selectedPayRollDate.getMonth()+1,v(a).selectedPayRollDate.getFullYear()))})]),s("div",ce,[l(V,{value:v(a).array_employees_list,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:o.filters,"onUpdate:filters":t[2]||(t[2]=e=>o.filters=e),filterDisplay:"menu",loading:o.loading2,globalFilterFields:["name","status"]},{default:y(()=>[l(w,{headerStyle:"width: 3rem"}),l(w,{field:"user_code",header:"Employee Code",headerStyle:"width: 3rem"}),l(w,{field:"name",header:"Employee Name"}),l(w,{field:"email",header:"Personal Mail"}),l(w,{field:"is_payslip_released",header:"Payslip Status"},{body:y(e=>[s("div",ue,[e.data.is_payslip_released==1?(D(),x("button",{key:0,class:"btn z-0",style:{border:"1px solid navy"},onClick:$=>c(e.data.user_code)},"withdraw",8,ye)):(D(),x("button",{key:1,class:"btn-primary rounded z-0",style:{padding:"4px 0 !important","margin-top":"10px"},onClick:$=>L(e.data.user_code)},"Release payslip",8,me)),e.data.is_payslip_released==1?(D(),x("h1",ve," Released ")):A("",!0),e.data.is_payslip_released==0||e.data.is_payslip_released==null?(D(),x("h1",fe," Not Released ")):A("",!0)])]),_:1}),l(w,{field:"is_payslip_mail_sent",header:"Mail Status"},{body:y(e=>[e.data.is_payslip_mail_sent==1?(D(),x("div",ge,_e)):(D(),x("div",we,[s("button",{class:"btn-primary rounded z-0",onClick:$=>F(e.data.user_code)},"Send Payslip",8,Pe)]))]),_:1}),l(w,{header:"Download"},{body:y(e=>[l(m,{class:"btn-primary z-0",style:{},label:"Download",onClick:$=>n(e.data.user_code)},null,8,["onClick"])]),_:1}),l(w,{header:"View Payslip"},{body:y(e=>[l(m,{class:"btn-primary z-0",style:{},label:"View",onClick:$=>T(e.data.user_code)},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters","loading"])]),l(R,{header:"Confirmation",visible:p.value,"onUpdate:visible":t[5]||(t[5]=e=>p.value=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:y(()=>[be,s("div",De,[l(m,{class:"btn-primary mr-3 py-2",label:"Yes",icon:"pi pi-check",onClick:t[3]||(t[3]=e=>r(g.value)),autofocus:""}),l(m,{label:"No",icon:"pi pi-times",onClick:t[4]||(t[4]=e=>p.value=!1),class:"p-button-text py-2",autofocus:""})])]),_:1},8,["visible"]),l(R,{header:"Confirmation",visible:b.value,"onUpdate:visible":t[8]||(t[8]=e=>b.value=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:y(()=>[xe,s("div",ke,[l(m,{class:"btn-primary mr-3 py-2",label:"Yes",icon:"pi pi-check",onClick:t[6]||(t[6]=e=>u(g.value)),autofocus:""}),l(m,{label:"No",icon:"pi pi-times",onClick:t[7]||(t[7]=e=>b.value=!1),class:"p-button-text py-2",autofocus:""})])]),_:1},8,["visible"]),l(R,{header:"Confirmation",visible:h.value,"onUpdate:visible":t[11]||(t[11]=e=>h.value=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:y(()=>[s("div",Ce,[Re,s("span",null,"Are you sure you want to release payslip? "+U(v(a).name),1)]),s("div",Se,[l(m,{class:"btn-primary py-2 mr-3",label:"Yes",icon:"pi pi-check",onClick:t[9]||(t[9]=e=>d(g.value)),autofocus:""}),l(m,{label:"No",icon:"pi pi-times",onClick:t[10]||(t[10]=e=>h.value=!1),class:"p-button-text py-2",autofocus:""})])]),_:1},8,["visible"]),l(R,{header:"Confirmation",visible:P.value,"onUpdate:visible":t[14]||(t[14]=e=>P.value=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:y(()=>[s("div",Me,[$e,s("span",null,"Are you sure you want to download payslip? "+U(v(a).name),1)]),s("div",Te,[l(m,{class:"btn-primary py-2 mr-3",label:"Yes",icon:"pi pi-check",onClick:t[12]||(t[12]=e=>_(g.value)),autofocus:""}),l(m,{label:"No",icon:"pi pi-times",onClick:t[13]||(t[13]=e=>P.value=!1),class:"p-button-text py-2",autofocus:""})])]),_:1},8,["visible"]),s("div",Fe,[l(R,{visible:C.value,"onUpdate:visible":t[15]||(t[15]=e=>C.value=e),modal:"",header:"payslip",style:{width:"50vw"}},{default:y(()=>[s("div",{innerHTML:v(a).paySlipHTMLView},null,8,Le)]),_:1},8,["visible"])]),l(R,{header:"Header",visible:v(a).loading,"onUpdate:visible":t[16]||(t[16]=e=>v(a).loading=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:y(()=>[l(Y,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:y(()=>[Ae]),_:1},8,["visible"])],64)}}},i=z(Ue),Ee=ne();i.use(B,{ripple:!0});i.use(le);i.use(W);i.use(Ee);i.directive("tooltip",X);i.directive("badge",Z);i.directive("ripple",j);i.directive("styleclass",ee);i.directive("focustrap",I);i.component("Button",O);i.component("DataTable",ae);i.component("Column",te);i.component("ConfirmDialog",J);i.component("Toast",K);i.component("Dialog",G);i.component("Dropdown",Q);i.component("ProgressSpinner",se);i.component("InputText",q);i.component("Calendar",oe);i.mount("#vjs_manage_payslips");
