/* empty css              *//* empty css                     *//* empty css                   */import{a2 as R,I as r,ak as x,o as u,c as v,h as i,w as _,d as e,F as f,f as D,g as d,b as C,K as Y,P as k,L as A,u as L,M as T,R as $,S as B,x as V,y as I,N,_ as E,Q as F,W as U,Y as W,V as j}from"./toastservice.esm-3d6796bd.js";import"./blockui.esm-fba20899.js";import{a as M}from"./datatable.esm-30f5a7e6.js";import{D as O,s as G}from"./dialogservice.esm-0be88020.js";import{C as H}from"./confirmationservice.esm-5ceb5613.js";import{s as K}from"./progressspinner.esm-2bee3521.js";import{s as Q}from"./row.esm-6ebc942e.js";import{s as q}from"./calendar.esm-88321a96.js";import{_ as z,a as J}from"./download-1db19555.js";import{a as h}from"./index-362795f3.js";const X=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),Z=e("div",null,[e("p",{class:"font-semibold text-lg"},"Attendance Absent Reports")],-1),ee={class:"bg-white p-2 my-2 rounded-lg grid grid-cols-12"},te={class:"grid grid-cols-12 gap-6 col-span-6"},ae={class:"col-span-4"},oe=e("p",null,"Start date",-1),se={class:"col-span-4"},ne=e("p",null,"End date",-1),re=e("button",null,[e("img",{src:J,alt:"",srcset:"",class:"w-9 h-9 p-2 bg-gray-50 rounded-lg"})],-1),le={class:"my-4"},ie=e("div",{class:"mb-0"},[e("div",{class:"card-body"},[e("div",{class:"tab-content",id:"pills-tabContent"},[e("div",{class:"tab-pane fade active show",id:"investment_dec",role:"tabpanel","aria-labelledby":"pills-home-tab"}),e("div",{class:"tab-pane fade",id:"exemptions",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"investmentComputation",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"other_income",role:"tabpanel","aria-labelledby":"pills-home-tab"}),e("div",{class:"tab-pane fade",id:"other_exemptions",role:"tabpanel","aria-labelledby":"pills-home-tab"})])])],-1),de={__name:"attendanceAbsentReports",setup(ce){const o=R({start_date:"",end_date:""});r([{product:"Bamboo Watch",lastYearSale:51,thisYearSale:40,lastYearProfit:54406,thisYearProfit:43342},{product:"Black Watch",lastYearSale:83,thisYearSale:9,lastYearProfit:423132,thisYearProfit:312122},{product:"Blue Band",lastYearSale:38,thisYearSale:5,lastYearProfit:12321,thisYearProfit:8500},{product:"Blue T-Shirt",lastYearSale:49,thisYearSale:22,lastYearProfit:745232,thisYearProfit:65323}]),r(),r([{name:"New York",code:"NY"},{name:"Rome",code:"RM"},{name:"London",code:"LDN"},{name:"Istanbul",code:"IST"},{name:"Paris",code:"PRS"}]),r([{name:"Absent reports",code:"1"},{name:"Detailed Report",code:"2"}]);const p=r([]),b=r([]),l=r(!1),w=()=>{let c="/fetch-absent-report-data";l.value=!0,h.post(c,{start_date:o.start_date,end_date:o.end_date}).then(a=>{console.log(a.data.rows),b.value=a.data.rows,a.data.headers.forEach(n=>{let m={title:n};p.value.push(m),console.log(n)}),console.log(p.value)}).finally(()=>{l.value=!1})},y=()=>{let c="/report/download-absent-report";l.value=!0,h.post(c,{start_date:o.start_date,end_date:o.end_date},{responseType:"blob"}).then(a=>{console.log(a.data);var n=document.createElement("a");n.href=window.URL.createObjectURL(a.data),n.download=`Attendance Absent Report_${new Date(o.start_date).getDate()}_${new Date(o.end_date).getDate()}.xlsx`,n.click()}).finally(()=>{l.value=!1})};return x(()=>{}),(c,a)=>{const n=d("ProgressSpinner"),m=d("Dialog"),g=d("Calendar"),P=d("Column"),S=d("DataTable");return u(),v(f,null,[i(m,{header:"Header",visible:l.value,"onUpdate:visible":a[0]||(a[0]=s=>l.value=s),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:_(()=>[i(n,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:_(()=>[X]),_:1},8,["visible"]),Z,e("div",ee,[e("div",te,[e("div",ae,[oe,i(g,{inputId:"icon",dateFormat:"dd-mm-yy",showIcon:!0,class:"h-10",modelValue:o.start_date,"onUpdate:modelValue":a[1]||(a[1]=s=>o.start_date=s)},null,8,["modelValue"])]),e("div",se,[ne,i(g,{inputId:"icon",dateFormat:"dd-mm-yy",showIcon:!0,class:"h-10",modelValue:o.end_date,"onUpdate:modelValue":a[2]||(a[2]=s=>o.end_date=s)},null,8,["modelValue"])]),e("div",{class:"d-flex justify-content-center align-items-end col-span-4"},[e("button",{onClick:w,class:"btn btn-orange"},"Generate")])]),e("div",{class:"col-span-6 flex justify-end gap-4"},[re,e("button",null,[e("img",{src:z,alt:"",srcset:"",onClick:y,class:"w-9 h-9 p-2 bg-gray-50 rounded-lg"})])])]),e("div",le,[i(S,{value:b.value,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:_(()=>[(u(!0),v(f,null,D(p.value,s=>(u(),C(P,{key:s.title,field:s.title,header:s.title,style:{"white-space":"nowrap","text-align":"left"}},null,8,["field","header"]))),128))]),_:1},8,["value"])]),ie],64)}}},t=Y(de);t.use(k,{ripple:!0});t.use(H);t.use(A);t.use(O);t.directive("tooltip",L);t.directive("badge",T);t.directive("ripple",$);t.directive("styleclass",B);t.directive("focustrap",V);t.component("Button",I);t.component("DataTable",M);t.component("Column",N);t.component("ColumnGroup",G);t.component("Row",Q);t.component("Toast",E);t.component("ConfirmDialog",F);t.component("Dropdown",U);t.component("InputText",W);t.component("Dialog",j);t.component("ProgressSpinner",K);t.component("Calendar",q);t.mount("#AttendanceAbsentReports");
