/* empty css              *//* empty css                     *//* empty css                   */import{W as S,Q as l,ab as R,o as u,c as g,h as i,w as _,d as e,F as v,f as x,g as d,b as C,H as Y,P as k,R as T,u as L,x as $,I as A,K as B,M as V,J as H}from"./inputnumber.esm-5d69a21b.js";import{a as I,T as E,B as F,S as N,b as U,s as W}from"./toastservice.esm-9d3b5dc9.js";import"./blockui.esm-3d95c539.js";import{a as j}from"./datatable.esm-7205543b.js";import{D as M,s as O}from"./dialogservice.esm-ea919e3d.js";import{C as G}from"./confirmationservice.esm-9a37c562.js";import{s as J}from"./progressspinner.esm-7d63b3de.js";import{s as K}from"./row.esm-6ebc942e.js";import{s as Q}from"./calendar.esm-0c5ba9cf.js";import{_ as q}from"./printer-346f1800.js";import{_ as z}from"./download-5ba6c221.js";import{a as h}from"./index-362795f3.js";const X=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),Z=e("div",null,[e("p",{class:"font-semibold text-lg"},"Attendance Half Day Absent Reports")],-1),ee={class:"bg-white p-2 my-2 rounded-lg grid grid-cols-12"},te={class:"grid grid-cols-12 gap-6 col-span-6"},ae={class:"col-span-4"},oe=e("p",null,"Start date",-1),se={class:"col-span-4"},ne=e("p",null,"End date",-1),le=e("button",null,[e("img",{src:q,alt:"",srcset:"",class:"w-9 h-9 p-2 bg-gray-50 rounded-lg"})],-1),re={class:"my-4"},ie=e("div",{class:"mb-0"},[e("div",{class:"card-body"},[e("div",{class:"tab-content",id:"pills-tabContent"},[e("div",{class:"tab-pane fade active show",id:"investment_dec",role:"tabpanel","aria-labelledby":"pills-home-tab"}),e("div",{class:"tab-pane fade",id:"exemptions",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"investmentComputation",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"other_income",role:"tabpanel","aria-labelledby":"pills-home-tab"}),e("div",{class:"tab-pane fade",id:"other_exemptions",role:"tabpanel","aria-labelledby":"pills-home-tab"})])])],-1),de={__name:"HalfDayAbsentReport",setup(ce){const o=S({start_date:"",end_date:""});l([{product:"Bamboo Watch",lastYearSale:51,thisYearSale:40,lastYearProfit:54406,thisYearProfit:43342},{product:"Black Watch",lastYearSale:83,thisYearSale:9,lastYearProfit:423132,thisYearProfit:312122},{product:"Blue Band",lastYearSale:38,thisYearSale:5,lastYearProfit:12321,thisYearProfit:8500},{product:"Blue T-Shirt",lastYearSale:49,thisYearSale:22,lastYearProfit:745232,thisYearProfit:65323}]),l(),l([{name:"New York",code:"NY"},{name:"Rome",code:"RM"},{name:"London",code:"LDN"},{name:"Istanbul",code:"IST"},{name:"Paris",code:"PRS"}]),l([{name:"Absent reports",code:"1"},{name:"Detailed Report",code:"2"}]);const p=l([]),f=l([]),r=l(!1),y=()=>{let c="/fetch-half-day-data";r.value=!0,h.post(c,{start_date:o.start_date,end_date:o.end_date}).then(a=>{console.log(a.data.rows),f.value=a.data.rows,a.data.headers.forEach(n=>{let m={title:n};p.value.push(m),console.log(n)}),console.log(p.value)}).finally(()=>{r.value=!1})},w=()=>{let c="/report/download-half-day-report";r.value=!0,h.post(c,{start_date:o.start_date,end_date:o.end_date},{responseType:"blob"}).then(a=>{console.log(a.data);var n=document.createElement("a");n.href=window.URL.createObjectURL(a.data),n.download=`Attendance Half Day Absent Report_${new Date(o.start_date).getDate()}_${new Date(o.end_date).getDate()}.xlsx`,n.click()}).finally(()=>{r.value=!1})};return R(()=>{}),(c,a)=>{const n=d("ProgressSpinner"),m=d("Dialog"),b=d("Calendar"),P=d("Column"),D=d("DataTable");return u(),g(v,null,[i(m,{header:"Header",visible:r.value,"onUpdate:visible":a[0]||(a[0]=s=>r.value=s),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:_(()=>[i(n,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:_(()=>[X]),_:1},8,["visible"]),Z,e("div",ee,[e("div",te,[e("div",ae,[oe,i(b,{inputId:"icon",dateFormat:"dd-mm-yy",showIcon:!0,class:"h-10",modelValue:o.start_date,"onUpdate:modelValue":a[1]||(a[1]=s=>o.start_date=s)},null,8,["modelValue"])]),e("div",se,[ne,i(b,{inputId:"icon",dateFormat:"dd-mm-yy",showIcon:!0,class:"h-10",modelValue:o.end_date,"onUpdate:modelValue":a[2]||(a[2]=s=>o.end_date=s)},null,8,["modelValue"])]),e("div",{class:"d-flex justify-content-center align-items-end col-span-4"},[e("button",{onClick:y,class:"btn btn-orange"},"Generate")])]),e("div",{class:"col-span-6 flex justify-end gap-4"},[le,e("button",null,[e("img",{src:z,alt:"",srcset:"",onClick:w,class:"w-9 h-9 p-2 bg-gray-50 rounded-lg"})])])]),e("div",re,[i(D,{value:f.value,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:_(()=>[(u(!0),g(v,null,x(p.value,s=>(u(),C(P,{key:s.title,field:s.title,header:s.title,style:{"white-space":"nowrap","text-align":"left"}},null,8,["field","header"]))),128))]),_:1},8,["value"])]),ie],64)}}},t=Y(de);t.use(k,{ripple:!0});t.use(G);t.use(I);t.use(M);t.directive("tooltip",E);t.directive("badge",F);t.directive("ripple",T);t.directive("styleclass",N);t.directive("focustrap",L);t.component("Button",$);t.component("DataTable",j);t.component("Column",A);t.component("ColumnGroup",O);t.component("Row",K);t.component("Toast",U);t.component("ConfirmDialog",W);t.component("Dropdown",B);t.component("InputText",V);t.component("Dialog",H);t.component("ProgressSpinner",J);t.component("Calendar",Q);t.mount("#HalfDayReport");
