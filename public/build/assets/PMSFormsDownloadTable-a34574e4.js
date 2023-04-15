import{G as x,H as B,a as L,b as u,j as l,w as s,g as t,l as m,k as y,F as C,h as S,M as _,i as p,o as c,t as r,n as k,d as I,a0 as D,I as E,P as O,J as Q,R as j,v as q}from"./toastservice.esm-a0d835cd.js";import{T as J,B as Y,S as z,b as H,a as G}from"./styleclass.esm-56c135f8.js";import"./blockui.esm-ac2be9d1.js";import{C as W,F as K,b as X,s as Z,a as ee}from"./inputtext.esm-3991e13f.js";import{s as oe}from"./confirmdialog.esm-a4bb0d89.js";import{D as ae}from"./dialogservice.esm-a7589f2a.js";import{s as te}from"./toast.esm-1e9f1872.js";import{s as ne}from"./progressspinner.esm-8999dfce.js";import{s as le}from"./row.esm-6ebc942e.js";import{s as se}from"./columngroup.esm-9dd1458e.js";const ie=t("h5",{style:{"text-align":"center"}},"Please wait...",-1),re={class:"confirmation-content"},pe=t("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),ue=["value"],ce=["value"],de=["value"],me={key:1},ve={key:0},ge={__name:"PMSFormsDownloadTable",setup(fe){const v={name:"Choose",value:""},V=[{name:"Choose",value:""},{name:"Financial Year",value:"financial_year"},{name:"Calendar Year",value:"calendar_year"}],T={name:"Choose",value:""},$=[{name:"Choose",value:""},{name:"April - 2021 to March - 2022",value:"April - 2021 to March - 2022"},{name:"April - 2022 to March - 2023",value:"April - 2022 to March - 2023"}],U=[{name:"Choose",value:""},{name:"Q1",value:"q1"},{name:"Q2",value:"q2"},{name:"Q3",value:"q3"},{name:"Q4",value:"q4"}],P=x({global:{value:null,matchMode:_.CONTAINS},employee_name:{value:null,matchMode:_.STARTS_WITH,matchMode:_.EQUALS,matchMode:_.CONTAINS}}),A=x();B(()=>{let n=window.location.origin+"/fetch-regularization-approvals";console.log("AJAX URL : "+n),L.get(n).then(o=>{console.log("Axios : "+o.data),A.value=o.data})});function M(n){console.log("Processing Rowdata : "+JSON.stringify(n)),L.get(window.location.origin+"/report-download-pmsforms",{pms_form_id:n}).then(o=>{let w=new Blob([o.data],{type:"data:application/vnd.ms-excel"}),b=window.URL.createObjectURL(w);var d=document.createElement("a");d.href=b,d.download="pdf_name.xlsx",d.click(),console.log(o)}).catch(o=>{console.log(o.toJSON())})}return(n,o)=>{const w=p("Toast"),b=p("ProgressSpinner"),d=p("Dialog"),g=p("Button"),N=p("InputText"),f=p("Column"),R=p("Dropdown"),F=p("DataTable");return c(),u("div",null,[l(w),l(d,{header:"Header",visible:n.canShowLoadingScreen,"onUpdate:visible":o[0]||(o[0]=e=>n.canShowLoadingScreen=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[l(b,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[ie]),_:1},8,["visible"]),l(d,{header:"Confirmation",visible:n.canShowConfirmation,"onUpdate:visible":o[3]||(o[3]=e=>n.canShowConfirmation=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:s(()=>[l(g,{label:"Yes",icon:"pi pi-check",onClick:o[1]||(o[1]=e=>n.processApproveReject()),class:"p-button-text",autofocus:""}),l(g,{label:"No",icon:"pi pi-times",onClick:o[2]||(o[2]=e=>n.hideConfirmDialog(!0)),class:"p-button-text"})]),default:s(()=>[t("div",re,[pe,t("span",null,"Are you sure you want to "+r(n.currentlySelectedStatus)+"?",1)])]),_:1},8,["visible"]),t("div",null,[t("div",null,[m("Calander Type : "),y(t("select",{"onUpdate:modelValue":o[4]||(o[4]=e=>v.value=e)},[(c(),u(C,null,S(V,e=>t("option",{value:e.value},r(e.name),9,ue)),64))],512),[[D,v.value]])]),t("div",null,[m("Year : "),y(t("select",{"onUpdate:modelValue":o[5]||(o[5]=e=>T.value=e)},[(c(),u(C,null,S($,e=>t("option",{value:e.value},r(e.name),9,ce)),64))],512),[[D,T.value]])]),t("div",null,[m("Assignment Period : "),y(t("select",{"onUpdate:modelValue":o[6]||(o[6]=e=>v.value=e)},[(c(),u(C,null,S(U,e=>t("option",{value:e.value},r(e.name),9,de)),64))],512),[[D,v.value]])]),t("div",null,[l(g,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Download Excel",onClick:o[7]||(o[7]=e=>M(1)),style:{height:"2em"}})]),l(F,{value:A.value,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:P.value,"onUpdate:filters":o[8]||(o[8]=e=>P.value=e),filterDisplay:"menu",loading:n.loading2,globalFilterFields:["name","status"]},{empty:s(()=>[m(" No Employee found ")]),loading:s(()=>[m(" Loading customers data. Please wait. ")]),default:s(()=>[l(f,{field:"employee_name",header:"Employee Name"},{body:s(e=>[m(r(e.data.employee_name),1)]),filter:s(({filterModel:e,filterCallback:h})=>[l(N,{modelValue:e.value,"onUpdate:modelValue":i=>e.value=i,onInput:i=>h(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),l(f,{field:"assignment_period",header:"Date",sortable:!0}),l(f,{field:"status",header:"Status",icon:"pi pi-check"},{body:s(({data:e})=>[t("span",{class:k("customer-badge status-"+e.status)},r(e.status),3)]),filter:s(({filterModel:e,filterCallback:h})=>[l(R,{modelValue:e.value,"onUpdate:modelValue":i=>e.value=i,onChange:i=>h(),options:n.statuses,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:s(i=>[i.value?(c(),u("span",{key:0,class:k("customer-badge status-"+i.value)},r(i.value),3)):(c(),u("span",me,r(i.placeholder),1))]),option:s(i=>[t("span",{class:k("customer-badge status-"+i.option)},r(i.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),l(f,{style:{width:"300px"},field:"",header:"Action"},{body:s(e=>[e.data.status=="Pending"?(c(),u("span",ve,[l(g,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approval",onClick:h=>n.showConfirmDialog(e.data,"Approve"),style:{height:"2em"}},null,8,["onClick"])])):I("",!0)]),_:1})]),_:1},8,["value","filters","loading"])])])}}},a=E(ge);a.use(O,{ripple:!0});a.use(W);a.use(Q);a.use(ae);a.directive("tooltip",J);a.directive("badge",Y);a.directive("ripple",j);a.directive("styleclass",z);a.directive("focustrap",K);a.component("Button",q);a.component("DataTable",H);a.component("Column",G);a.component("ColumnGroup",se);a.component("Row",le);a.component("Toast",te);a.component("ConfirmDialog",oe);a.component("Dropdown",X);a.component("InputText",Z);a.component("Dialog",ee);a.component("ProgressSpinner",ne);a.mount("#vjs_PMSFormsDownloadTable");
