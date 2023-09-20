/* empty css              *//* empty css                     *//* empty css                   *//* empty css                 */import{H as r,a7 as p,W as R,o as _,c as f,h as i,w as v,d as e,F as h,f as S,g as d,b as T,I as k,P as L,R as $,u as A,x as M,J as I,L as V,N,K as Y}from"./inputnumber.esm-3276ace1.js";import{a as B,T as E,B as F,S as U,b as j,s as O}from"./toastservice.esm-fd7fc957.js";import"./blockui.esm-ff9f2709.js";import{a as H}from"./datatable.esm-aaa10fcd.js";import{D as W,s as G}from"./dialogservice.esm-d79ebc81.js";import{C as J}from"./confirmationservice.esm-8b92365c.js";import{s as K}from"./progressspinner.esm-3aaf2487.js";import{s as Q}from"./row.esm-6ebc942e.js";import{s as q}from"./calendar.esm-5bf60357.js";import{_ as z}from"./printer-e0530634.js";import{_ as X}from"./download-5ba6c221.js";import{a as w}from"./index-362795f3.js";import"./moment-fbc5633a.js";import{d as y}from"./dayjs.min-2f06af28.js";const Z=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),ee=e("div",null,[e("p",{class:"font-semibold text-lg"},"Attendance Detail Reports")],-1),te={class:"bg-white p-2 my-2 rounded-lg grid grid-cols-12"},ae={class:"grid grid-cols-12 gap-6 col-span-6"},oe={class:"col-span-4"},se=e("p",null,"Start date",-1),ne={class:"col-span-4"},le=e("p",null,"End date",-1),re=e("button",null,[e("img",{src:z,alt:"",srcset:"",class:"w-9 h-9 p-2 bg-gray-50 rounded-lg"})],-1),ie={class:"my-4"},de=e("div",{class:"mb-0"},[e("div",{class:"card-body"},[e("div",{class:"tab-content",id:"pills-tabContent"},[e("div",{class:"tab-pane fade active show",id:"investment_dec",role:"tabpanel","aria-labelledby":"pills-home-tab"}),e("div",{class:"tab-pane fade",id:"exemptions",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"investmentComputation",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"other_income",role:"tabpanel","aria-labelledby":"pills-home-tab"}),e("div",{class:"tab-pane fade",id:"other_exemptions",role:"tabpanel","aria-labelledby":"pills-home-tab"})])])],-1),ce={__name:"AttendanceReport_Detailed",setup(pe){const l=r(!1);r(),r(),r({global:{value:null,matchMode:p.CONTAINS},employee_name:{value:null,matchMode:p.STARTS_WITH,matchMode:p.EQUALS,matchMode:p.CONTAINS}});const o=R({start_date:"",end_date:""}),m=r([]),g=r([]),D=async()=>{let c="/fetch-attendance-data";l.value=!0,await w.post(c,{start_date:o.start_date,end_date:o.end_date}).then(a=>{console.log(a.data.rows),g.value=a.data.rows,a.data.headers.forEach(n=>{let u={title:n};m.value.push(u),console.log(n)}),console.log(m.value)}).finally(()=>{l.value=!1})},C=()=>{let c="/reports/generate-detailed-attendance-report";l.value=!0,w.post(c,{start_date:o.start_date,end_date:o.end_date},{responseType:"blob"}).then(a=>{console.log(a.data);var n=document.createElement("a");n.href=window.URL.createObjectURL(a.data),n.download=`Attendance Detailed Report_${y(o.start_date).format("DD-MM-YYYY")}_${y(o.end_date).format("DD-MM-YYYY")}.xlsx`,n.click()}).finally(()=>{l.value=!1})};return(c,a)=>{const n=d("ProgressSpinner"),u=d("Dialog"),b=d("Calendar"),x=d("Column"),P=d("DataTable");return _(),f(h,null,[i(u,{header:"Header",visible:l.value,"onUpdate:visible":a[0]||(a[0]=s=>l.value=s),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:v(()=>[i(n,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:v(()=>[Z]),_:1},8,["visible"]),ee,e("div",te,[e("div",ae,[e("div",oe,[se,i(b,{inputId:"icon",dateFormat:"dd-mm-yy",showIcon:!0,class:"h-10",modelValue:o.start_date,"onUpdate:modelValue":a[1]||(a[1]=s=>o.start_date=s)},null,8,["modelValue"])]),e("div",ne,[le,i(b,{inputId:"icon",dateFormat:"dd-mm-yy",showIcon:!0,class:"h-10",modelValue:o.end_date,"onUpdate:modelValue":a[2]||(a[2]=s=>o.end_date=s)},null,8,["modelValue"])]),e("div",{class:"d-flex justify-content-center align-items-end col-span-4"},[e("button",{onClick:D,class:"btn btn-orange"},"Generate")])]),e("div",{class:"col-span-6 flex justify-end gap-4"},[re,e("button",null,[e("img",{src:X,alt:"",srcset:"",onClick:C,class:"w-9 h-9 p-2 bg-gray-50 rounded-lg"})])])]),e("div",ie,[i(P,{value:g.value,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:v(()=>[(_(!0),f(h,null,S(m.value,s=>(_(),T(x,{key:s.title,field:s.title,header:s.title,style:{"white-space":"nowrap","text-align":"left"}},null,8,["field","header"]))),128))]),_:1},8,["value"])]),de],64)}}},t=k(ce);t.use(L,{ripple:!0});t.use(J);t.use(B);t.use(W);t.directive("tooltip",E);t.directive("badge",F);t.directive("ripple",$);t.directive("styleclass",U);t.directive("focustrap",A);t.component("Button",M);t.component("DataTable",H);t.component("Column",I);t.component("ColumnGroup",G);t.component("Row",Q);t.component("Toast",j);t.component("ConfirmDialog",O);t.component("Dropdown",V);t.component("InputText",N);t.component("Dialog",Y);t.component("ProgressSpinner",K);t.component("Calendar",q);t.mount("#vjs_AttendanceReport_Detailed");
