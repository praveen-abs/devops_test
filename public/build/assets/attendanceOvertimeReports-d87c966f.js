/* empty css              *//* empty css                     *//* empty css                   *//* empty css                 */import{Y as R,H as r,I as x,o as m,c as g,h as i,w as u,d as e,F as b,f as D,g as d,b as C,K as Y,P as k,R as L,u as T,x as $,L as B,N as O,S as A,M as V}from"./inputnumber.esm-2ef94937.js";import{a as I,T as N,B as F,S as E,b as U,s as j}from"./toastservice.esm-a2aa885f.js";import"./blockui.esm-1772f2aa.js";import{a as H}from"./datatable.esm-9e333783.js";import{D as M,s as W}from"./dialogservice.esm-4374de6d.js";import{C as G}from"./confirmationservice.esm-d19112e7.js";import{s as K}from"./progressspinner.esm-311b8ec7.js";import{s as q}from"./row.esm-6ebc942e.js";import{s as z}from"./calendar.esm-11c715d3.js";import{_ as J}from"./printer-e0530634.js";import{_ as Q}from"./download-5ba6c221.js";import{a as h}from"./index-362795f3.js";const X=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),Z=e("div",null,[e("p",{class:"font-semibold text-lg"},"Attendance Overtime Reports")],-1),ee={class:"bg-white p-2 my-2 rounded-lg grid grid-cols-12"},te={class:"grid grid-cols-12 gap-6 col-span-6"},ae={class:"col-span-4"},oe=e("p",null,"Start date",-1),se={class:"col-span-4"},ne=e("p",null,"End date",-1),re=e("button",null,[e("img",{src:J,alt:"",srcset:"",class:"w-9 h-9 p-2 bg-gray-50 rounded-lg"})],-1),le={class:"my-4"},ie=e("div",{class:"mb-0"},[e("div",{class:"card-body"},[e("div",{class:"tab-content",id:"pills-tabContent"},[e("div",{class:"tab-pane fade active show",id:"investment_dec",role:"tabpanel","aria-labelledby":"pills-home-tab"}),e("div",{class:"tab-pane fade",id:"exemptions",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"investmentComputation",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"other_income",role:"tabpanel","aria-labelledby":"pills-home-tab"}),e("div",{class:"tab-pane fade",id:"other_exemptions",role:"tabpanel","aria-labelledby":"pills-home-tab"})])])],-1),de={__name:"attendanceOvertimeReports",setup(ce){const o=R({start_date:"",end_date:""});r([{product:"Bamboo Watch",lastYearSale:51,thisYearSale:40,lastYearProfit:54406,thisYearProfit:43342},{product:"Black Watch",lastYearSale:83,thisYearSale:9,lastYearProfit:423132,thisYearProfit:312122},{product:"Blue Band",lastYearSale:38,thisYearSale:5,lastYearProfit:12321,thisYearProfit:8500},{product:"Blue T-Shirt",lastYearSale:49,thisYearSale:22,lastYearProfit:745232,thisYearProfit:65323}]),r(),r([{name:"New York",code:"NY"},{name:"Rome",code:"RM"},{name:"London",code:"LDN"},{name:"Istanbul",code:"IST"},{name:"Paris",code:"PRS"}]),r([{name:"Absent reports",code:"1"},{name:"Detailed Report",code:"2"}]);const _=r([]),v=r([]),l=r(!1),w=()=>{let c="/report/download-over-time-report";l.value=!0,h.post(c,{start_date:o.start_date,end_date:o.end_date},{responseType:"blob"}).then(a=>{console.log(a.data);var n=document.createElement("a");n.href=window.URL.createObjectURL(a.data),n.download=`Attendance Overtime Report_${new Date(o.start_date).getDate()}_${new Date(o.end_date).getDate()}.xlsx`,n.click()}).finally(()=>{l.value=!1})},P=()=>{let c="/fetch-overtime-report-data";l.value=!0,h.post(c,{start_date:o.start_date,end_date:o.end_date}).then(a=>{console.log(a.data.rows),v.value=a.data.rows,a.data.headers.forEach(n=>{let p={title:n};_.value.push(p)})}).finally(()=>{l.value=!1})};return x(()=>{}),(c,a)=>{const n=d("ProgressSpinner"),p=d("Dialog"),f=d("Calendar"),y=d("Column"),S=d("DataTable");return m(),g(b,null,[i(p,{header:"Header",visible:l.value,"onUpdate:visible":a[0]||(a[0]=s=>l.value=s),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:u(()=>[i(n,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:u(()=>[X]),_:1},8,["visible"]),Z,e("div",ee,[e("div",te,[e("div",ae,[oe,i(f,{inputId:"icon",dateFormat:"dd-mm-yy",showIcon:!0,class:"h-10",modelValue:o.start_date,"onUpdate:modelValue":a[1]||(a[1]=s=>o.start_date=s)},null,8,["modelValue"])]),e("div",se,[ne,i(f,{inputId:"icon",dateFormat:"dd-mm-yy",showIcon:!0,class:"h-10",modelValue:o.end_date,"onUpdate:modelValue":a[2]||(a[2]=s=>o.end_date=s)},null,8,["modelValue"])]),e("div",{class:"d-flex justify-content-center align-items-end col-span-4"},[e("button",{onClick:P,class:"btn btn-orange"},"Generate")])]),e("div",{class:"col-span-6 flex justify-end gap-4"},[re,e("button",null,[e("img",{src:Q,alt:"",srcset:"",onClick:w,class:"w-9 h-9 p-2 bg-gray-50 rounded-lg"})])])]),e("div",le,[i(S,{value:v.value,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:u(()=>[(m(!0),g(b,null,D(_.value,s=>(m(),C(y,{key:s.title,field:s.title,header:s.title,style:{"white-space":"nowrap","text-align":"left"}},null,8,["field","header"]))),128))]),_:1},8,["value"])]),ie],64)}}},t=Y(de);t.use(k,{ripple:!0});t.use(G);t.use(I);t.use(M);t.directive("tooltip",N);t.directive("badge",F);t.directive("ripple",L);t.directive("styleclass",E);t.directive("focustrap",T);t.component("Button",$);t.component("DataTable",H);t.component("Column",B);t.component("ColumnGroup",W);t.component("Row",q);t.component("Toast",U);t.component("ConfirmDialog",j);t.component("Dropdown",O);t.component("InputText",A);t.component("Dialog",V);t.component("ProgressSpinner",K);t.component("Calendar",z);t.mount("#AttendanceOvertimeReports");
