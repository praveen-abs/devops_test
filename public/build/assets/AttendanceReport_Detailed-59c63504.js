/* empty css                  *//* empty css              */import{H as v,av as g,I as P,o as I,c as R,h as o,w as t,d as r,l as n,t as d,g as p,J as $,P as k,K as U,u as N,L as A,R as M,S as E,x as Y,y as F,Q as O,M as B,_ as H,N as j,W as J,Y as W,V as K}from"./toastservice.esm-08a9bf8e.js";import"./blockui.esm-3250f310.js";import{D as Q,s as z}from"./dialogservice.esm-58a613d7.js";import{C as G}from"./confirmationservice.esm-521051e3.js";import{s as X}from"./progressspinner.esm-fb4992cb.js";import{s as q}from"./row.esm-6ebc942e.js";import{s as Z}from"./calendar.esm-cbf6a875.js";import{a as C}from"./index-362795f3.js";import{h as V}from"./moment-fbc5633a.js";const ee=r("h5",{style:{"text-align":"center"}},"Please wait...",-1),ae={class:"grid grid-cols-4 gap-6 p-2"},oe=r("p",null,"Start date",-1),te=r("p",null,"End date",-1),le={class:"d-flex justify-content-center align-items-end"},ne=r("div",null,null,-1),se=r("div",null,null,-1),de={__name:"AttendanceReport_Detailed",setup(re){const f=v(!1),h=v(),y=v(),w=v({global:{value:null,matchMode:g.CONTAINS},employee_name:{value:null,matchMode:g.STARTS_WITH,matchMode:g.EQUALS,matchMode:g.CONTAINS}}),D=v();P(()=>{let m=window.location.origin+"/fetch-regularization-approvals";console.log("AJAX URL : "+m),C.get(m).then(l=>{console.log("Axios : "+l.data),D.value=l.data})});function T(m,l){f.value=!0,C.post(window.location.origin+"/reports/generate-detailed-attendance-report",{start_date:V(m).format("YYYY-MM-DD"),end_date:V(l).format("YYYY-MM-DD")},{responseType:"blob"}).then(u=>{console.log(u.data);var c=document.createElement("a");c.href=window.URL.createObjectURL(u.data),c.download=" Basic Report.xlsx",c.click()}).catch(u=>{console.log(u.toJSON())}).finally(()=>{f.value=!1})}return(m,l)=>{const u=p("Toast"),c=p("ProgressSpinner"),L=p("Dialog"),S=p("Calendar"),b=p("InputText"),s=p("Column"),x=p("DataTable");return I(),R("div",null,[o(u),o(L,{header:"Header",visible:f.value,"onUpdate:visible":l[0]||(l[0]=e=>f.value=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:t(()=>[o(c,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:t(()=>[ee]),_:1},8,["visible"]),r("div",null,[r("div",ae,[r("div",null,[oe,o(S,{inputId:"icon",dateFormat:"dd-mm-yy",showIcon:!0,class:"h-10",modelValue:h.value,"onUpdate:modelValue":l[1]||(l[1]=e=>h.value=e)},null,8,["modelValue"])]),r("div",null,[te,o(S,{inputId:"icon",dateFormat:"dd-mm-yy",showIcon:!0,class:"h-10",modelValue:y.value,"onUpdate:modelValue":l[2]||(l[2]=e=>y.value=e)},null,8,["modelValue"])]),r("div",le,[r("button",{class:"btn btn-primary py-auto",onClick:l[3]||(l[3]=e=>T(h.value,y.value))},"generate")]),ne,se]),o(x,{value:D.value,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:w.value,"onUpdate:filters":l[4]||(l[4]=e=>w.value=e),filterDisplay:"menu",loading:m.loading2,globalFilterFields:["name","status"]},{empty:t(()=>[n(" No Employee found ")]),loading:t(()=>[n(" Loading customers data. Please wait. ")]),default:t(()=>[o(s,{field:"employee_name",header:"Employee Name"},{body:t(e=>[n(d(e.data.employee_name),1)]),filter:t(({filterModel:e,filterCallback:_})=>[o(b,{modelValue:e.value,"onUpdate:modelValue":i=>e.value=i,onInput:i=>_(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),o(s,{field:"department",header:"Designation"},{body:t(e=>[n(d(e.data.designation),1)]),filter:t(({filterModel:e,filterCallback:_})=>[o(b,{modelValue:e.value,"onUpdate:modelValue":i=>e.value=i,onInput:i=>_(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),o(s,{field:"department",header:"Department"},{body:t(e=>[n(d(e.data.department),1)]),filter:t(({filterModel:e,filterCallback:_})=>[o(b,{modelValue:e.value,"onUpdate:modelValue":i=>e.value=i,onInput:i=>_(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),o(s,{field:"employee_name",header:"PD"},{body:t(e=>[n(d(e.data.pd),1)]),_:1}),o(s,{field:"employee_name",header:"HD"},{body:t(e=>[n(d(e.data.pd),1)]),_:1}),o(s,{field:"employee_name",header:"HO"},{body:t(e=>[n(d(e.data.pd),1)]),_:1}),o(s,{field:"employee_name",header:"OD"},{body:t(e=>[n(d(e.data.pd),1)]),_:1}),o(s,{field:"employee_name",header:"SL/CL"},{body:t(e=>[n(d(e.data.pd),1)]),_:1}),o(s,{field:"employee_name",header:"EL"},{body:t(e=>[n(d(e.data.pd),1)]),_:1}),o(s,{field:"employee_name",header:"SL"},{body:t(e=>[n(d(e.data.pd),1)]),_:1}),o(s,{field:"employee_name",header:"CL"},{body:t(e=>[n(d(e.data.pd),1)]),_:1}),o(s,{field:"employee_name",header:"ML"},{body:t(e=>[n(d(e.data.pd),1)]),_:1})]),_:1},8,["value","filters","loading"])])])}}},a=$(de);a.use(k,{ripple:!0});a.use(G);a.use(U);a.use(Q);a.directive("tooltip",N);a.directive("badge",A);a.directive("ripple",M);a.directive("styleclass",E);a.directive("focustrap",Y);a.component("Button",F);a.component("DataTable",O);a.component("Column",B);a.component("ColumnGroup",z);a.component("Row",q);a.component("Toast",H);a.component("ConfirmDialog",j);a.component("Dropdown",J);a.component("InputText",W);a.component("Dialog",K);a.component("ProgressSpinner",X);a.component("Calendar",Z);a.mount("#vjs_AttendanceReport_Detailed");