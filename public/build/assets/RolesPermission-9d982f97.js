import{H as a,I as _,o as g,c as h,d as o,h as t,w as r,j as w,t as k,F as R,g as i,J as A,P as x,K as D,R as P,u as T,v as $,Q as C,L as S,N as M,A as E,M as I}from"./toastservice.esm-28d3ae2b.js";import{c as N}from"./pinia-e771661c.js";import{T as B,B as H,S as U,b as j,a as F,c as V}from"./styleclass.esm-3c85e840.js";import{D as O}from"./dialogservice.esm-82e9a52f.js";import{C as G}from"./confirmationservice.esm-ac7837bb.js";import{s as K}from"./progressspinner.esm-713a603e.js";import{s as L}from"./row.esm-6ebc942e.js";import{s as W}from"./columngroup.esm-9dd1458e.js";import"./fileupload.esm-587c315d.js";import{s as J}from"./calendar.esm-2f7b0fa0.js";import{s as q}from"./textarea.esm-0c036dec.js";import{s as Y}from"./chips.esm-063308bb.js";import{s as z}from"./overlaypanel.esm-0b2ed655.js";import{s as Q}from"./accordion.esm-eed21359.js";import{s as X}from"./accordiontab.esm-b66dc843.js";import{s as Z,a as ee}from"./tree.esm-d00804b8.js";import"./progressbar.esm-6bf0778a.js";import"./badge.esm-b869d7fe.js";const oe={class:"w-full"},te=o("div",null,[o("h4",{class:"px-4 text-2xl font-semibold"},"Employee Roles and Permissions")],-1),se={class:"p-4 my-4 card"},ae={class:"card-body"},ie=o("p",{class:"text-lg font-semibold text-gray-700 fs-4"},"Here you can manage the Employees Roles and Permissions",-1),le={class:"flex my-6"},ne=o("h6",{class:"modal-title fs-21"}," Creating New Job Role",-1),re=o("div",{class:"px-4 row"},[o("h3",{class:"text-xl font-semibold col-12"},"Roles Details")],-1),ce={class:"p-4"},pe={class:"row"},de=o("h5",{class:"text-lg font-semibold col-12"},"Role Title",-1),me={class:"my-3 row"},ue=o("h5",{class:"text-lg font-semibold col-12"},"Role Description",-1),fe=o("div",{class:"my-3"},[o("h5",{class:"text-lg font-semibold"},"Assign To")],-1),ve=o("button",{class:"py-2 mx-4 btn btn-orange"},"Create Role",-1),be={__name:"RolesPermission",setup(_e){const m=a(!0),c=a(),n=a(!1);a(!0),a(!1),a(!1);const u=a([{key:"0",label:"Assets Privileges ",data:"Assets Privileges ",children:[{key:"Apply for attendance adjustment / regularisation on behalf of employees",label:"Apply for attendance adjustment / regularisation on behalf of employees",data:"Apply for attendance adjustment / regularisation on behalf of employees"},{key:"0-1",label:"Approve/Reject 'Work from Home (WFH) / On Duty (OD)' requests",data:"Approve/Reject 'Work from Home (WFH) / On Duty (OD)' requests"},{key:"0-2",label:"Edit Individual Asset Information",data:"Edit Individual Asset Information"},{key:"0-3",label:"Bulk import assets & assignment",data:"Bulk import assets & assignment"},{key:"0-4",label:"Assign Asset to an Employee",data:"Assign Asset to an Employee"},{key:"0-5",label:"Update Asset Availability",data:"Update Asset Availability"},{key:"0-6",label:"Recover Asset & Update Condition",data:"Recover Asset & Update Condition"},{key:"0-7",label:"View Reports",data:"View Reports"},{key:"0-8",label:"Download Reports",data:"Download Reports"},{key:"0-9",label:"Manage Asset DefinitionsGlobal",data:"Manage Asset DefinitionsGlobal"},{key:"0-10",label:"Delete Asset",data:"Delete Asset"}]},{key:"1",label:"Attendance Privileges",data:"Attendance Privileges",icon:"pi pi-fw pi-calendar",children:[{key:"1-0",label:"Meeting",icon:"pi pi-fw pi-calendar-plus",data:"Meeting"},{key:"1-1",label:"Product Launch",icon:"pi pi-fw pi-calendar-plus",data:"Product Launch"},{key:"1-2",label:"Report Review",icon:"pi pi-fw pi-calendar-plus",data:"Report Review"}]},{key:"2",label:"Employee Document Privileges",data:"Employee Document Privileges",icon:"pi pi-fw pi-star-fill",children:[{key:"2-0",icon:"pi pi-fw pi-star-fill",label:"Al Pacino",data:"Pacino Movies",children:[{key:"2-0-0",label:"Scarface",icon:"pi pi-fw pi-video",data:"Scarface Movie"},{key:"2-0-1",label:"Serpico",icon:"pi pi-fw pi-video",data:"Serpico Movie"}]},{key:"2-1",label:"Robert De Niro",icon:"pi pi-fw pi-star-fill",data:"De Niro Movies",children:[{key:"2-1-0",label:"Goodfellas",icon:"pi pi-fw pi-video",data:"Goodfellas Movie"},{key:"2-1-1",label:"Untouchables",icon:"pi pi-fw pi-video",data:"Untouchables Movie"}]}]},{key:"3",label:"Employee Finance Privileges",data:"Employee Finance Privileges",children:[{key:"1-0",label:"Meeting",icon:"pi pi-fw pi-calendar-plus",data:"Meeting"},{key:"1-1",label:"Product Launch",icon:"pi pi-fw pi-calendar-plus",data:"Product Launch"},{key:"1-2",label:"Report Review",icon:"pi pi-fw pi-calendar-plus",data:"Report Review"}]}]);return _(()=>{setTimeout(()=>{m.value=!1},4e3)}),(ge,s)=>{const d=i("InputText"),p=i("Column"),f=i("DataTable"),v=i("Textarea"),b=i("Tree"),y=i("Dialog");return g(),h(R,null,[o("div",oe,[te,o("div",se,[o("div",ae,[ie,o("div",le,[t(d,{placeholder:"Search....",class:"w-4 h-10"}),o("button",{class:"h-10 mx-6 btn btn-orange",onClick:s[0]||(s[0]=l=>n.value=!0)},"Create Role")]),o("div",null,[t(f,null,{default:r(()=>[t(p,{field:"product",header:"Role"}),t(p,{field:"lastYearSale",header:"Who Has Access"}),t(p,{field:"thisYearSale",header:"Actions"})]),_:1})])])])]),t(y,{header:"Header",visible:n.value,"onUpdate:visible":s[3]||(s[3]=l=>n.value=l),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"65vw",borderTop:"5px solid #002f56"},modal:!0,closable:!1,closeOnEscape:!1},{header:r(()=>[ne]),footer:r(()=>[o("div",null,[o("button",{class:"px-4 py-2 text-lg font-semibold text-gray-900 bg-gray-400 rounded-md",onClick:s[2]||(s[2]=l=>n.value=!1)},"Cancel"),ve])]),default:r(()=>[re,o("div",ce,[o("div",pe,[de,t(d,{placeholder:"Role Title",class:"w-8 h-10 col-4"})]),o("div",me,[ue,t(v,{placeholder:"Role Description ",autoResize:"",class:"w-8 col-4"})]),fe,t(b,{selectionKeys:c.value,"onUpdate:selectionKeys":s[1]||(s[1]=l=>c.value=l),value:u.value,selectionMode:"checkbox",class:"w-8 font-semibold"},null,8,["selectionKeys","value"])])]),_:1},8,["visible"]),w(" "+k(c.value),1)],64)}}},e=A(be),ye=N();e.use(x,{ripple:!0});e.use(G);e.use(D);e.use(O);e.use(ye);e.directive("tooltip",B);e.directive("badge",H);e.directive("ripple",P);e.directive("styleclass",U);e.directive("focustrap",T);e.component("Button",$);e.component("DataTable",j);e.component("Column",F);e.component("ColumnGroup",W);e.component("Row",L);e.component("Toast",C);e.component("OverlayPanel",z);e.component("ConfirmDialog",S);e.component("Dropdown",M);e.component("InputText",E);e.component("Dialog",I);e.component("ProgressSpinner",K);e.component("Calendar",J);e.component("Textarea",q);e.component("Chips",Y);e.component("InputNumber",V);e.component("Accordion",Q);e.component("AccordionTab",X);e.component("Tree",Z);e.component("Skeleton",ee);e.mount("#VJS_RolesPermissions");