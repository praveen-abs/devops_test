/* empty css              *//* empty css                     *//* empty css                   *//* empty css                 */import{H as r,a9 as p,Y as R,o as _,c as f,h as i,w as v,d as e,F as h,f as S,g as d,b as T,K as k,P as L,R as $,u as A,x as M,L as V,N as Y,S as I,M as N}from"./inputnumber.esm-2ef94937.js";import{a as B,T as E,B as F,S as U,b as j,s as O}from"./toastservice.esm-a2aa885f.js";import"./blockui.esm-1772f2aa.js";import{a as H}from"./datatable.esm-9e333783.js";import{D as G,s as W}from"./dialogservice.esm-4374de6d.js";import{C as K}from"./confirmationservice.esm-d19112e7.js";import{s as Q}from"./progressspinner.esm-311b8ec7.js";import{s as q}from"./row.esm-6ebc942e.js";import{s as z}from"./calendar.esm-11c715d3.js";import{_ as J}from"./printer-e0530634.js";import{_ as X}from"./download-5ba6c221.js";import{a as w}from"./index-362795f3.js";import"./moment-fbc5633a.js";import{d as y}from"./dayjs.min-2f06af28.js";const Z=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),ee=e("div",null,[e("p",{class:"font-semibold text-lg"},"Attendance Detail Reports")],-1),te={class:"bg-white p-2 my-2 rounded-lg grid grid-cols-12"},ae={class:"grid grid-cols-12 gap-6 col-span-6"},oe={class:"col-span-4"},se=e("p",null,"Start date",-1),ne={class:"col-span-4"},le=e("p",null,"End date",-1),re=e("button",null,[e("img",{src:J,alt:"",srcset:"",class:"w-9 h-9 p-2 bg-gray-50 rounded-lg"})],-1),ie={class:"my-4"},de=e("div",{class:"mb-0"},[e("div",{class:"card-body"},[e("div",{class:"tab-content",id:"pills-tabContent"},[e("div",{class:"tab-pane fade active show",id:"investment_dec",role:"tabpanel","aria-labelledby":"pills-home-tab"}),e("div",{class:"tab-pane fade",id:"exemptions",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"investmentComputation",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"other_income",role:"tabpanel","aria-labelledby":"pills-home-tab"}),e("div",{class:"tab-pane fade",id:"other_exemptions",role:"tabpanel","aria-labelledby":"pills-home-tab"})])])],-1),ce={__name:"AttendanceReport_Detailed",setup(pe){const l=r(!1);r(),r(),r({global:{value:null,matchMode:p.CONTAINS},employee_name:{value:null,matchMode:p.STARTS_WITH,matchMode:p.EQUALS,matchMode:p.CONTAINS}});const o=R({start_date:"",end_date:""}),m=r([]),g=r([]),D=async()=>{let c="/fetch-attendance-data";l.value=!0,await w.post(c,{start_date:o.start_date,end_date:o.end_date}).then(a=>{console.log(a.data.rows),g.value=a.data.rows,a.data.headers.forEach(n=>{let u={title:n};m.value.push(u),console.log(n)}),console.log(m.value)}).finally(()=>{l.value=!1})},C=()=>{let c="/reports/generate-detailed-attendance-report";l.value=!0,w.post(c,{start_date:o.start_date,end_date:o.end_date},{responseType:"blob"}).then(a=>{console.log(a.data);var n=document.createElement("a");n.href=window.URL.createObjectURL(a.data),n.download=`Attendance Detailed Report_${y(o.start_date).format("DD-MM-YYYY")}_${y(o.end_date).format("DD-MM-YYYY")}.xlsx`,n.click()}).finally(()=>{l.value=!1})};return(c,a)=>{const n=d("ProgressSpinner"),u=d("Dialog"),b=d("Calendar"),x=d("Column"),P=d("DataTable");return _(),f(h,null,[i(u,{header:"Header",visible:l.value,"onUpdate:visible":a[0]||(a[0]=s=>l.value=s),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:v(()=>[i(n,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:v(()=>[Z]),_:1},8,["visible"]),ee,e("div",te,[e("div",ae,[e("div",oe,[se,i(b,{inputId:"icon",dateFormat:"dd-mm-yy",showIcon:!0,class:"h-10",modelValue:o.start_date,"onUpdate:modelValue":a[1]||(a[1]=s=>o.start_date=s)},null,8,["modelValue"])]),e("div",ne,[le,i(b,{inputId:"icon",dateFormat:"dd-mm-yy",showIcon:!0,class:"h-10",modelValue:o.end_date,"onUpdate:modelValue":a[2]||(a[2]=s=>o.end_date=s)},null,8,["modelValue"])]),e("div",{class:"d-flex justify-content-center align-items-end col-span-4"},[e("button",{onClick:D,class:"btn btn-orange"},"Generate")])]),e("div",{class:"col-span-6 flex justify-end gap-4"},[re,e("button",null,[e("img",{src:X,alt:"",srcset:"",onClick:C,class:"w-9 h-9 p-2 bg-gray-50 rounded-lg"})])])]),e("div",ie,[i(P,{value:g.value,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:v(()=>[(_(!0),f(h,null,S(m.value,s=>(_(),T(x,{key:s.title,field:s.title,header:s.title,style:{"white-space":"nowrap","text-align":"left"}},null,8,["field","header"]))),128))]),_:1},8,["value"])]),de],64)}}},t=k(ce);t.use(L,{ripple:!0});t.use(K);t.use(B);t.use(G);t.directive("tooltip",E);t.directive("badge",F);t.directive("ripple",$);t.directive("styleclass",U);t.directive("focustrap",A);t.component("Button",M);t.component("DataTable",H);t.component("Column",V);t.component("ColumnGroup",W);t.component("Row",q);t.component("Toast",j);t.component("ConfirmDialog",O);t.component("Dropdown",Y);t.component("InputText",I);t.component("Dialog",N);t.component("ProgressSpinner",Q);t.component("Calendar",z);t.mount("#vjs_AttendanceReport_Detailed");
