/* empty css              *//* empty css                     *//* empty css                   */import{a0 as s,a3 as y,ak as R,o as w,c as T,d as o,h as t,w as c,F as $,g as n,K as k,P as C,L as P,u as D,M as S,R as A,S as N,x as E,y as F,N as I,_ as M,Q as B,W as H,Y as J,V,X as W}from"./toastservice.esm-484a3f44.js";import{d as L,c as Y}from"./pinia-ef13c18a.js";import{a as j}from"./datatable.esm-70b25cd4.js";import{D as O,s as U}from"./dialogservice.esm-548272f5.js";import{C as z}from"./confirmationservice.esm-c218b510.js";import{s as G}from"./progressspinner.esm-b12f0644.js";import{s as K}from"./row.esm-6ebc942e.js";import"./fileupload.esm-6d165301.js";import{s as Q}from"./calendar.esm-17a99f33.js";import{s as X}from"./textarea.esm-26210577.js";import{s as q}from"./chips.esm-c70e00fc.js";import{s as Z}from"./overlaypanel.esm-09bbb169.js";import{s as ee}from"./accordion.esm-f4ecde83.js";import{s as oe}from"./accordiontab.esm-e3b40a0c.js";import{s as se,a as te,b as ie}from"./treetable.esm-6b0a7ab8.js";import{s as ae}from"./multiselect.esm-2b7afd9a.js";import{a as u}from"./index-362795f3.js";import"./progressbar.esm-6f8fc010.js";import"./badge.esm-49b4e1a7.js";const ne=L("RolePermissionServie",()=>{const f=s(),l=s(),i=y({Role_Title:"",Role_description:"",Assign_to:""});return{getAllPermissions:()=>{u.get("/getAllPermissions").then(r=>{l.value=r.data,console.log(allpermission)})},saveCreateNewJobRole:()=>{u.post("").finally(()=>{})},AllPermission:l,CreatingNewJobRole:i,array_RolePermission_data:f}});const le={class:"w-full p-3"},re=o("div",null,[o("h4",{class:"fs-4 text-xl font-semibold"},"Employee Roles and Permissions")],-1),ce={class:"bg-white rounded-lg p-3 border my-3"},pe=o("p",{class:"text-lg font-semibold text-gray-700"},"Here you can manage the Employees Roles and Permissions",-1),de={class:"flex justify-between my-6"},me=o("p",{class:"font-semibold text-lg"}," Creating New Job Role",-1),ue={class:"p-4"},fe={class:"grid grid-cols-12"},_e=o("h5",{class:"text-lg font-semibold col-span-2"},"Role Title",-1),ve={class:"my-3 grid grid-cols-12"},be=o("h5",{class:"text-lg font-semibold col-span-2"},"Role Description",-1),ge={class:"my-3 grid grid-cols-12"},he=o("h5",{class:"text-lg font-semibold col-span-2"},"Assign To",-1),xe=o("button",{class:"py-2 mx-4 btn btn-orange"},"Create Role",-1),ye={__name:"RolesPermission",setup(f){ne(),s([]),s();const l=s(!0);s();const i=s(!1);s(!0),s(!1),s(!1);const p=s();u.get("/getAllPermissions").then(r=>{p.value=r.data,console.log(p)});const _=s([{id:1,key:"0",label:"",data:"Documents Folder",icon:"pi pi-fw pi-inbox",children:[{id:2,key:"1",label:"Work",data:"Work Folder",icon:"pi pi-fw pi-cog",children:[{key:"0-0-0",label:"Expenses.doc",icon:"pi pi-fw pi-file",data:"Expenses Document"},{key:"0-0-1",label:"Resume.doc",icon:"pi pi-fw pi-file",data:"Resume Document"}]},{id:3,key:"2",label:"Home",data:"Home Folder",icon:"pi pi-fw pi-home",children:[{key:"0-1-0",label:"Invoices.txt",icon:"pi pi-fw pi-file",data:"Invoices for this month"}]}]},{id:4,key:"4",label:"Events",data:"Events Folder",icon:"pi pi-fw pi-calendar",children:[{id:5,key:"1-0",label:"Meeting",icon:"pi pi-fw pi-calendar-plus",data:"Meeting"},{id:6,key:"1-1",label:"Product Launch",icon:"pi pi-fw pi-calendar-plus",data:"Product Launch"},{id:7,key:"1-2",label:"Report Review",icon:"pi pi-fw pi-calendar-plus",data:"Report Review"}]}]);return R(()=>{setTimeout(()=>{l.value=!1},4e3)}),(r,a)=>{const v=n("InputText"),d=n("Column"),b=n("DataTable"),g=n("Textarea"),h=n("Tree"),x=n("Dialog");return w(),T($,null,[o("div",le,[re,o("div",ce,[pe,o("div",de,[t(v,{placeholder:"Search....",class:"h-10"}),o("button",{class:"h-10 mx-6 btn btn-orange",onClick:a[0]||(a[0]=m=>i.value=!0)},"Create Role")]),o("div",null,[t(b,null,{default:c(()=>[t(d,{field:"product",header:"Role"}),t(d,{field:"lastYearSale",header:"Who Has Access"}),t(d,{field:"thisYearSale",header:"Actions"})]),_:1})])])]),t(x,{header:"Header",visible:i.value,"onUpdate:visible":a[2]||(a[2]=m=>i.value=m),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"65vw",borderTop:"5px solid #002f56"},modal:!0,closable:!1,closeOnEscape:!1},{header:c(()=>[me]),footer:c(()=>[o("div",null,[o("button",{class:"px-4 py-2 text-lg font-semibold text-gray-900 bg-gray-400 rounded-md",onClick:a[1]||(a[1]=m=>i.value=!1)},"Cancel"),xe])]),default:c(()=>[o("div",ue,[o("div",fe,[_e,t(v,{placeholder:"Role Title",class:"h-10 col-span-6"})]),o("div",ve,[be,t(g,{placeholder:"Role Description ",autoResize:"",class:"col-span-6"})]),o("div",ge,[he,t(h,{value:_.value,selectionMode:"checkbox",class:"font-semibold col-span-6"},null,8,["value"])])])]),_:1},8,["visible"])],64)}}},e=k(ye),Re=Y();e.use(C,{ripple:!0});e.use(z);e.use(P);e.use(O);e.use(Re);e.directive("tooltip",D);e.directive("badge",S);e.directive("ripple",A);e.directive("styleclass",N);e.directive("focustrap",E);e.component("Button",F);e.component("DataTable",j);e.component("Column",I);e.component("ColumnGroup",U);e.component("Row",K);e.component("Toast",M);e.component("OverlayPanel",Z);e.component("ConfirmDialog",B);e.component("Dropdown",H);e.component("InputText",J);e.component("Dialog",V);e.component("ProgressSpinner",G);e.component("Calendar",Q);e.component("Textarea",X);e.component("Chips",q);e.component("InputNumber",W);e.component("Accordion",ee);e.component("AccordionTab",oe);e.component("Tree",se);e.component("Skeleton",te);e.component("MultiSelect",ae);e.component("TreeTable",ie);e.mount("#VJS_RolesPermissions");
