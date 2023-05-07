import{B as y,E as T,c as x,e as i,h as a,W as P,w as g,F as D,g as f,o as k,G as L,P as $,H as V,R as F,q as H}from"./toastservice.esm-c4f6de4c.js";import{T as E,B as R,S as A,b as B,a as N}from"./styleclass.esm-ea560a03.js";import"./blockui.esm-85692cd0.js";import{C as U,F as Y,a as j,b as G,s as I}from"./inputtext.esm-5faf66bf.js";import{s as q}from"./confirmdialog.esm-51539a4d.js";import{s as z}from"./toast.esm-8d255b70.js";import{s as K}from"./progressspinner.esm-455f2fd3.js";import{s as O}from"./calendar.esm-7c3ebc21.js";import{d as W,c as J}from"./pinia-0f325ab3.js";import{a as w}from"./index-f7a317fc.js";const Q=W("managePayslipStore",()=>{const _=y(),r=y();async function v(n,d){_.value="",await w.post("getAllEmployeesPayslipDetails",{month:n,year:d}).then(m=>{_.value=m.data.data})}async function c(n,d,m){await w.post("/payroll/paycheck/getEmployeePayslipDetailsAsHTML",{user_code:n,month:d,year:m}).then(u=>{r.value=u.data})}async function s(n,d,m){console.log("sendMail_employeePayslip() : Sending mail to user : "+n),w.post("/payroll/paycheck/sendMail_employeePayslip",{user_code:n,month:d,year:m}).then(u=>{console.log(" Response [sendMail_employeePayslip] : "+u.data.data)}).catch(u=>{console.log(u)})}return{array_employees_list:_,paySlipHTMLView:r,getAllEmployeesPayslipDetails:v,getEmployeePayslipDetailsAsHTML:c,sendMail_employeePayslip:s}});const X={class:"d-flex justify-content-end"},Z=i("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),ee={class:"my-4"},ae=["onClick"],te=i("div",{class:"confirmation-content"},[i("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}}),i("span",null,"Are you sure you want to send Mail ?")],-1),oe={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},se={class:"card flex justify-content-center inline-flex"},le=["innerHTML"],ie={__name:"ManagePayslips",setup(_){const r=Q(),v=y(!1),c=y(!1),s=y(),n=y();T(async()=>{});async function d(l){console.log("Showing payslip html for (user_code, month): "+l+" , "+parseInt(s.value.getMonth()+1)),await r.getEmployeePayslipDetailsAsHTML(l,s.value.getMonth()+1,s.value.getFullYear()),v.value=!0}function m(l){n.value=l,c.value=!0}async function u(l){await r.sendMail_employeePayslip(l,s.value.getMonth()+1,s.value.getFullYear()),c.value=!1}return(l,t)=>{const M=f("Calendar"),h=f("Button"),p=f("Column"),C=f("DataTable"),b=f("Dialog");return k(),x(D,null,[i("div",X,[Z,a(M,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:s.value,"onUpdate:modelValue":t[0]||(t[0]=o=>s.value=o),style:{border:"1px solid orange","border-radius":"7px",height:"38px"}},null,8,["modelValue"]),a(h,{class:"mb-2 h-10 btn btn-orange",label:"Generate",onClick:t[1]||(t[1]=o=>P(r).getAllEmployeesPayslipDetails(s.value.getMonth()+1,s.value.getFullYear()))})]),i("div",ee,[a(C,{value:P(r).array_employees_list,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:l.filters,"onUpdate:filters":t[2]||(t[2]=o=>l.filters=o),filterDisplay:"menu",loading:l.loading2,globalFilterFields:["name","status"]},{default:g(()=>[a(p,{headerStyle:"width: 3rem"}),a(p,{field:"user_code",header:"Employee Code",headerStyle:"width: 3rem"}),a(p,{field:"name",header:"Employee Name"}),a(p,{field:"email",header:"Personal Mail"}),a(p,{field:"is_released",header:"Released Payslip?"}),a(p,{field:"is_",header:"Payslip mail sent?"}),a(p,{header:"View Payslip"},{body:g(o=>[a(h,{class:"btn-primary",label:"View",onClick:S=>d(o.data.user_code)},null,8,["onClick"])]),_:1}),a(p,{header:"Action"},{body:g(o=>[i("button",{class:"btn-success rounded",onClick:S=>m(o.data.user_code)},"Send Mail",8,ae)]),_:1})]),_:1},8,["value","filters","loading"])]),a(b,{header:"Confirmation",visible:c.value,"onUpdate:visible":t[5]||(t[5]=o=>c.value=o),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:g(()=>[te,i("div",oe,[a(h,{class:"btn-success mr-3",label:"Yes",icon:"pi pi-check",onClick:t[3]||(t[3]=o=>u(n.value)),autofocus:""}),a(h,{label:"No",icon:"pi pi-times",onClick:t[4]||(t[4]=o=>c.value=!1),class:"p-button-text",autofocus:""})])]),_:1},8,["visible"]),i("div",se,[a(b,{visible:v.value,"onUpdate:visible":t[6]||(t[6]=o=>v.value=o),modal:"",header:"Header",style:{width:"50vw"}},{default:g(()=>[i("div",{innerHTML:P(r).paySlipHTMLView},null,8,le)]),_:1},8,["visible"])])],64)}}},e=L(ie),ne=J();e.use($,{ripple:!0});e.use(U);e.use(V);e.use(ne);e.directive("tooltip",E);e.directive("badge",R);e.directive("ripple",F);e.directive("styleclass",A);e.directive("focustrap",Y);e.component("Button",H);e.component("DataTable",B);e.component("Column",N);e.component("ConfirmDialog",q);e.component("Toast",z);e.component("Dialog",j);e.component("Dropdown",G);e.component("ProgressSpinner",K);e.component("InputText",I);e.component("Calendar",O);e.mount("#vjs_manage_payslips");
