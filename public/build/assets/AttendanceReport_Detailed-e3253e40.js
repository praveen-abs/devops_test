/* empty css              */import{$ as v,af as g,I as x,o as I,c as $,h as o,w as t,d as r,l as n,t as d,g as p,J as k,P as R,K as U,u as N,L as A,R as M,S as E,x as Y,y as F,M as O,Y as B,N as H,V as j,X as J,Q as K}from"./toastservice.esm-1e4d76cb.js";import"./blockui.esm-bdb9f2eb.js";import{a as Q}from"./datatable.esm-9c853c0e.js";import{D as W,s as X}from"./dialogservice.esm-26300ede.js";import{C as z}from"./confirmationservice.esm-1279fa60.js";import{s as G}from"./progressspinner.esm-ef10595a.js";import{s as q}from"./row.esm-6ebc942e.js";import{s as Z}from"./calendar.esm-6d8a31db.js";import{a as C}from"./index-362795f3.js";import{h as V}from"./moment-fbc5633a.js";const ee=r("h5",{style:{"text-align":"center"}},"Please wait...",-1),ae={class:"grid grid-cols-4 gap-6 p-2"},oe=r("p",null,"Start date",-1),te=r("p",null,"End date",-1),le={class:"d-flex justify-content-center align-items-end"},ne=r("div",null,null,-1),se=r("div",null,null,-1),de={__name:"AttendanceReport_Detailed",setup(re){const f=v(!1),h=v(),y=v(),w=v({global:{value:null,matchMode:g.CONTAINS},employee_name:{value:null,matchMode:g.STARTS_WITH,matchMode:g.EQUALS,matchMode:g.CONTAINS}}),D=v();x(()=>{let m=window.location.origin+"/fetch-regularization-approvals";console.log("AJAX URL : "+m),C.get(m).then(l=>{console.log("Axios : "+l.data),D.value=l.data})});function T(m,l){f.value=!0,C.post(window.location.origin+"/reports/generate-detailed-attendance-report",{start_date:V(m).format("YYYY-MM-DD"),end_date:V(l).format("YYYY-MM-DD")},{responseType:"blob"}).then(u=>{console.log(u.data);var c=document.createElement("a");c.href=window.URL.createObjectURL(u.data),c.download=" Basic Report.xlsx",c.click()}).catch(u=>{console.log(u.toJSON())}).finally(()=>{f.value=!1})}return(m,l)=>{const u=p("Toast"),c=p("ProgressSpinner"),L=p("Dialog"),S=p("Calendar"),b=p("InputText"),s=p("Column"),P=p("DataTable");return I(),$("div",null,[o(u),o(L,{header:"Header",visible:f.value,"onUpdate:visible":l[0]||(l[0]=e=>f.value=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:t(()=>[o(c,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:t(()=>[ee]),_:1},8,["visible"]),r("div",null,[r("div",ae,[r("div",null,[oe,o(S,{inputId:"icon",dateFormat:"dd-mm-yy",showIcon:!0,class:"h-10",modelValue:h.value,"onUpdate:modelValue":l[1]||(l[1]=e=>h.value=e)},null,8,["modelValue"])]),r("div",null,[te,o(S,{inputId:"icon",dateFormat:"dd-mm-yy",showIcon:!0,class:"h-10",modelValue:y.value,"onUpdate:modelValue":l[2]||(l[2]=e=>y.value=e)},null,8,["modelValue"])]),r("div",le,[r("button",{class:"btn btn-primary py-auto",onClick:l[3]||(l[3]=e=>T(h.value,y.value))},"generate")]),ne,se]),o(P,{value:D.value,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:w.value,"onUpdate:filters":l[4]||(l[4]=e=>w.value=e),filterDisplay:"menu",loading:m.loading2,globalFilterFields:["name","status"]},{empty:t(()=>[n(" No Employee found ")]),loading:t(()=>[n(" Loading customers data. Please wait. ")]),default:t(()=>[o(s,{field:"employee_name",header:"Employee Name"},{body:t(e=>[n(d(e.data.employee_name),1)]),filter:t(({filterModel:e,filterCallback:_})=>[o(b,{modelValue:e.value,"onUpdate:modelValue":i=>e.value=i,onInput:i=>_(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),o(s,{field:"department",header:"Designation"},{body:t(e=>[n(d(e.data.designation),1)]),filter:t(({filterModel:e,filterCallback:_})=>[o(b,{modelValue:e.value,"onUpdate:modelValue":i=>e.value=i,onInput:i=>_(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),o(s,{field:"department",header:"Department"},{body:t(e=>[n(d(e.data.department),1)]),filter:t(({filterModel:e,filterCallback:_})=>[o(b,{modelValue:e.value,"onUpdate:modelValue":i=>e.value=i,onInput:i=>_(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),o(s,{field:"employee_name",header:"PD"},{body:t(e=>[n(d(e.data.pd),1)]),_:1}),o(s,{field:"employee_name",header:"HD"},{body:t(e=>[n(d(e.data.pd),1)]),_:1}),o(s,{field:"employee_name",header:"HO"},{body:t(e=>[n(d(e.data.pd),1)]),_:1}),o(s,{field:"employee_name",header:"OD"},{body:t(e=>[n(d(e.data.pd),1)]),_:1}),o(s,{field:"employee_name",header:"SL/CL"},{body:t(e=>[n(d(e.data.pd),1)]),_:1}),o(s,{field:"employee_name",header:"EL"},{body:t(e=>[n(d(e.data.pd),1)]),_:1}),o(s,{field:"employee_name",header:"SL"},{body:t(e=>[n(d(e.data.pd),1)]),_:1}),o(s,{field:"employee_name",header:"CL"},{body:t(e=>[n(d(e.data.pd),1)]),_:1}),o(s,{field:"employee_name",header:"ML"},{body:t(e=>[n(d(e.data.pd),1)]),_:1})]),_:1},8,["value","filters","loading"])])])}}},a=k(de);a.use(R,{ripple:!0});a.use(z);a.use(U);a.use(W);a.directive("tooltip",N);a.directive("badge",A);a.directive("ripple",M);a.directive("styleclass",E);a.directive("focustrap",Y);a.component("Button",F);a.component("DataTable",Q);a.component("Column",O);a.component("ColumnGroup",X);a.component("Row",q);a.component("Toast",B);a.component("ConfirmDialog",H);a.component("Dropdown",j);a.component("InputText",J);a.component("Dialog",K);a.component("ProgressSpinner",G);a.component("Calendar",Z);a.mount("#vjs_AttendanceReport_Detailed");
