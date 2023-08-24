/* empty css              */import{Q as R,G as r,S as D,o as u,c as g,h as i,w as _,d as e,F as f,f as x,g as d,b as C,H as Y,P as k,I as A,R as L,u as T,v as $,M as B,J as V,L as I,A as E,K as F}from"./toastservice.esm-6ab5f57c.js";import{T as N,B as U,S as j,b as G,a as H}from"./styleclass.esm-9e259b99.js";import"./blockui.esm-da4dd4e3.js";import{D as M}from"./dialogservice.esm-052c1ef4.js";import{C as O}from"./confirmationservice.esm-91ab80c8.js";import{s as W}from"./progressspinner.esm-34a6e341.js";import{s as J}from"./row.esm-6ebc942e.js";import{s as K}from"./columngroup.esm-9dd1458e.js";import{s as Q}from"./calendar.esm-2f67a089.js";import{_ as q,a as z}from"./download-f86381bc.js";import{a as h}from"./index-0d903406.js";const X=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),Z=e("div",null,[e("p",{class:"font-semibold text-lg"},"Attendance Absent Reports")],-1),ee={class:"bg-white p-2 my-2 rounded-lg grid grid-cols-12"},te={class:"grid grid-cols-12 gap-6 col-span-6"},ae={class:"col-span-4"},oe=e("p",null,"Start date",-1),se={class:"col-span-4"},ne=e("p",null,"End date",-1),re=e("button",null,[e("img",{src:z,alt:"",srcset:"",class:"w-9 h-9 p-2 bg-gray-50 rounded-lg"})],-1),le={class:"my-4"},ie=e("div",{class:"mb-0"},[e("div",{class:"card-body"},[e("div",{class:"tab-content",id:"pills-tabContent"},[e("div",{class:"tab-pane fade active show",id:"investment_dec",role:"tabpanel","aria-labelledby":"pills-home-tab"}),e("div",{class:"tab-pane fade",id:"exemptions",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"investmentComputation",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"other_income",role:"tabpanel","aria-labelledby":"pills-home-tab"}),e("div",{class:"tab-pane fade",id:"other_exemptions",role:"tabpanel","aria-labelledby":"pills-home-tab"})])])],-1),de={__name:"attendanceAbsentReports",setup(ce){const o=R({start_date:"",end_date:""});r([{product:"Bamboo Watch",lastYearSale:51,thisYearSale:40,lastYearProfit:54406,thisYearProfit:43342},{product:"Black Watch",lastYearSale:83,thisYearSale:9,lastYearProfit:423132,thisYearProfit:312122},{product:"Blue Band",lastYearSale:38,thisYearSale:5,lastYearProfit:12321,thisYearProfit:8500},{product:"Blue T-Shirt",lastYearSale:49,thisYearSale:22,lastYearProfit:745232,thisYearProfit:65323}]),r(),r([{name:"New York",code:"NY"},{name:"Rome",code:"RM"},{name:"London",code:"LDN"},{name:"Istanbul",code:"IST"},{name:"Paris",code:"PRS"}]),r([{name:"Absent reports",code:"1"},{name:"Detailed Report",code:"2"}]);const p=r([]),b=r([]),l=r(!1),w=()=>{let c="/fetch-absent-report-data";l.value=!0,h.post(c,{start_date:o.start_date,end_date:o.end_date}).then(a=>{console.log(a.data.rows),b.value=a.data.rows,a.data.headers.forEach(n=>{let m={title:n};p.value.push(m),console.log(n)}),console.log(p.value)}).finally(()=>{l.value=!1})},y=()=>{let c="/report/download-absent-report";l.value=!0,h.post(c,{start_date:o.start_date,end_date:o.end_date},{responseType:"blob"}).then(a=>{console.log(a.data);var n=document.createElement("a");n.href=window.URL.createObjectURL(a.data),n.download=`Attendance Absent Report_${new Date(o.start_date).getDate()}_${new Date(o.end_date).getDate()}.xlsx`,n.click()}).finally(()=>{l.value=!1})};return D(()=>{}),(c,a)=>{const n=d("ProgressSpinner"),m=d("Dialog"),v=d("Calendar"),P=d("Column"),S=d("DataTable");return u(),g(f,null,[i(m,{header:"Header",visible:l.value,"onUpdate:visible":a[0]||(a[0]=s=>l.value=s),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:_(()=>[i(n,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:_(()=>[X]),_:1},8,["visible"]),Z,e("div",ee,[e("div",te,[e("div",ae,[oe,i(v,{inputId:"icon",dateFormat:"dd-mm-yy",showIcon:!0,class:"h-10",modelValue:o.start_date,"onUpdate:modelValue":a[1]||(a[1]=s=>o.start_date=s)},null,8,["modelValue"])]),e("div",se,[ne,i(v,{inputId:"icon",dateFormat:"dd-mm-yy",showIcon:!0,class:"h-10",modelValue:o.end_date,"onUpdate:modelValue":a[2]||(a[2]=s=>o.end_date=s)},null,8,["modelValue"])]),e("div",{class:"d-flex justify-content-center align-items-end col-span-4"},[e("button",{onClick:w,class:"btn btn-orange"},"Generate")])]),e("div",{class:"col-span-6 flex justify-end gap-4"},[re,e("button",null,[e("img",{src:q,alt:"",srcset:"",onClick:y,class:"w-9 h-9 p-2 bg-gray-50 rounded-lg"})])])]),e("div",le,[i(S,{value:b.value,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:_(()=>[(u(!0),g(f,null,x(p.value,s=>(u(),C(P,{key:s.title,field:s.title,header:s.title,style:{"white-space":"nowrap","text-align":"left"}},null,8,["field","header"]))),128))]),_:1},8,["value"])]),ie],64)}}},t=Y(de);t.use(k,{ripple:!0});t.use(O);t.use(A);t.use(M);t.directive("tooltip",N);t.directive("badge",U);t.directive("ripple",L);t.directive("styleclass",j);t.directive("focustrap",T);t.component("Button",$);t.component("DataTable",G);t.component("Column",H);t.component("ColumnGroup",K);t.component("Row",J);t.component("Toast",B);t.component("ConfirmDialog",V);t.component("Dropdown",I);t.component("InputText",E);t.component("Dialog",F);t.component("ProgressSpinner",W);t.component("Calendar",Q);t.mount("#AttendanceAbsentReports");