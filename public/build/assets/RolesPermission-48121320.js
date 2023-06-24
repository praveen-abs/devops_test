import{G as t,a1 as y,H as w,o as R,c as T,d as o,h as s,w as n,F as $,g as r,I as k,P as C,J as P,R as D,u as S,v as A,N,K as E,M as F,A as I,L as B}from"./toastservice.esm-037e4fc0.js";import{d as H,c as J}from"./pinia-ebcadf7f.js";import{T as M,B as V,S as z,b as L,a as W,c as G}from"./styleclass.esm-7100130c.js";import{D as O}from"./dialogservice.esm-8790d538.js";import{C as U}from"./confirmationservice.esm-23320926.js";import{s as Y}from"./progressspinner.esm-c757b227.js";import{s as j}from"./row.esm-6ebc942e.js";import{s as K}from"./columngroup.esm-9dd1458e.js";import"./fileupload.esm-7fda2532.js";import{s as q}from"./calendar.esm-89e9a2d9.js";import{s as Q}from"./textarea.esm-8d199d04.js";import{s as X}from"./chips.esm-eaa25b3f.js";import{s as Z}from"./overlaypanel.esm-8dbc8d7e.js";import{s as ee}from"./accordion.esm-89b30687.js";import{s as oe}from"./accordiontab.esm-4640eace.js";import{s as se,a as te,b as ie}from"./treetable.esm-8086b8ed.js";import{s as ae}from"./multiselect.esm-02197fcd.js";import{a as u}from"./index-3716a3fc.js";import"./progressbar.esm-6042247e.js";import"./badge.esm-9fb261d8.js";import"./_commonjsHelpers-042e6b4d.js";const le=H("RolePermissionServie",()=>{const f=t(),c=t(),i=y({Role_Title:"",Role_description:"",Assign_to:""});return{getAllPermissions:()=>{u.get("/getAllPermissions").then(p=>{c.value=p.data,console.log(allpermission)})},saveCreateNewJobRole:()=>{u.post("").finally(()=>{})},AllPermission:c,CreatingNewJobRole:i,array_RolePermission_data:f}});const ne={class:"w-full"},re=o("div",null,[o("h4",{class:"px-4 text-2xl font-semibold"},"Employee Roles and Permissions")],-1),ce={class:"p-4 my-4 card"},pe={class:"card-body"},de=o("p",{class:"text-lg font-semibold text-gray-700 fs-4"},"Here you can manage the Employees Roles and Permissions",-1),me={class:"flex my-6"},ue=o("h6",{class:"modal-title fs-21"}," Creating New Job Role",-1),fe=o("div",{class:"px-4 row"},[o("h3",{class:"text-xl font-semibold col-12"},"Roles Details")],-1),_e={class:"p-4"},ve={class:"row"},he=o("h5",{class:"text-lg font-semibold col-12"},"Role Title",-1),be={class:"my-3 row"},ge=o("h5",{class:"text-lg font-semibold col-12"},"Role Description",-1),xe=o("div",{class:"my-3"},[o("h5",{class:"text-lg font-semibold"},"Assign To")],-1),ye=o("input",{type:"checkbox"},null,-1),we=o("button",{class:"py-2 mx-4 btn btn-orange"},"Create Role",-1),Re={__name:"RolesPermission",setup(f){le();const c=t(!0);t();const i=t(!1);t(!0),t(!1),t(!1);const d=t();u.get("/getAllPermissions").then(p=>{d.value=p.data,console.log(d)});const _=t([{id:1,key:"0",label:"Documents",data:"Documents Folder",icon:"pi pi-fw pi-inbox",children:[{id:2,key:"1",label:"Work",data:"Work Folder",icon:"pi pi-fw pi-cog",children:[{key:"0-0-0",label:"Expenses.doc",icon:"pi pi-fw pi-file",data:"Expenses Document"},{key:"0-0-1",label:"Resume.doc",icon:"pi pi-fw pi-file",data:"Resume Document"}]},{id:3,key:"2",label:"Home",data:"Home Folder",icon:"pi pi-fw pi-home",children:[{key:"0-1-0",label:"Invoices.txt",icon:"pi pi-fw pi-file",data:"Invoices for this month"}]}]},{id:4,key:"4",label:"Events",data:"Events Folder",icon:"pi pi-fw pi-calendar",children:[{id:5,key:"1-0",label:"Meeting",icon:"pi pi-fw pi-calendar-plus",data:"Meeting"},{id:6,key:"1-1",label:"Product Launch",icon:"pi pi-fw pi-calendar-plus",data:"Product Launch"},{id:7,key:"1-2",label:"Report Review",icon:"pi pi-fw pi-calendar-plus",data:"Report Review"}]}]);return w(()=>{setTimeout(()=>{c.value=!1},4e3)}),(p,a)=>{const v=r("InputText"),l=r("Column"),h=r("DataTable"),b=r("Textarea"),g=r("TreeTable"),x=r("Dialog");return R(),T($,null,[o("div",ne,[re,o("div",ce,[o("div",pe,[de,o("div",me,[s(v,{placeholder:"Search....",class:"w-4 h-10"}),o("button",{class:"h-10 mx-6 btn btn-orange",onClick:a[0]||(a[0]=m=>i.value=!0)},"Create Role")]),o("div",null,[s(h,null,{default:n(()=>[s(l,{field:"product",header:"Role"}),s(l,{field:"lastYearSale",header:"Who Has Access"}),s(l,{field:"thisYearSale",header:"Actions"})]),_:1})])])])]),s(x,{header:"Header",visible:i.value,"onUpdate:visible":a[2]||(a[2]=m=>i.value=m),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"65vw",borderTop:"5px solid #002f56"},modal:!0,closable:!1,closeOnEscape:!1},{header:n(()=>[ue]),footer:n(()=>[o("div",null,[o("button",{class:"px-4 py-2 text-lg font-semibold text-gray-900 bg-gray-400 rounded-md",onClick:a[1]||(a[1]=m=>i.value=!1)},"Cancel"),we])]),default:n(()=>[fe,o("div",_e,[o("div",ve,[he,s(v,{placeholder:"Role Title",class:"w-8 h-10 col-4"})]),o("div",be,[ge,s(b,{placeholder:"Role Description ",autoResize:"",class:"w-8 col-4"})]),xe,s(g,{value:_.value,key:"id"},{default:n(()=>[s(l,{field:"name",header:"Name",expander:""},{default:n(()=>[ye]),_:1}),s(l,{field:"size",header:"Size"}),s(l,{field:"type",header:"Type"})]),_:1},8,["value"])])]),_:1},8,["visible"])],64)}}},e=k(Re),Te=J();e.use(C,{ripple:!0});e.use(U);e.use(P);e.use(O);e.use(Te);e.directive("tooltip",M);e.directive("badge",V);e.directive("ripple",D);e.directive("styleclass",z);e.directive("focustrap",S);e.component("Button",A);e.component("DataTable",L);e.component("Column",W);e.component("ColumnGroup",K);e.component("Row",j);e.component("Toast",N);e.component("OverlayPanel",Z);e.component("ConfirmDialog",E);e.component("Dropdown",F);e.component("InputText",I);e.component("Dialog",B);e.component("ProgressSpinner",Y);e.component("Calendar",q);e.component("Textarea",Q);e.component("Chips",X);e.component("InputNumber",G);e.component("Accordion",ee);e.component("AccordionTab",oe);e.component("Tree",se);e.component("Skeleton",te);e.component("MultiSelect",ae);e.component("TreeTable",ie);e.mount("#VJS_RolesPermissions");
