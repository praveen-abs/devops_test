/* empty css                  *//* empty css              */import{H as s,a3 as x,I as w,o as y,c as R,d as o,h as t,w as c,F as T,g as l,J as $,P as C,K as k,u as P,L as D,R as S,S as A,x as N,y as E,Q as F,M as I,_ as H,N as J,W as M,Y as B,V,X as W}from"./toastservice.esm-08a9bf8e.js";import{d as L,c as Y}from"./pinia-f8c56b28.js";import{D as O,s as U}from"./dialogservice.esm-58a613d7.js";import{C as j}from"./confirmationservice.esm-521051e3.js";import{s as z}from"./progressspinner.esm-fb4992cb.js";import{s as G}from"./row.esm-6ebc942e.js";import"./fileupload.esm-6c6721c7.js";import{s as K}from"./calendar.esm-cbf6a875.js";import{s as Q}from"./textarea.esm-4935ef6f.js";import{s as X}from"./chips.esm-b081241d.js";import{s as q}from"./overlaypanel.esm-f2275ed3.js";import{s as Z}from"./accordion.esm-9510a705.js";import{s as ee}from"./accordiontab.esm-42784cea.js";import{s as oe,a as se,b as te}from"./treetable.esm-edf44d82.js";import{s as ie}from"./multiselect.esm-209f8262.js";import{a as u}from"./index-362795f3.js";import"./progressbar.esm-dba8f112.js";import"./badge.esm-cd665b77.js";const ae=L("RolePermissionServie",()=>{const f=s(),n=s(),a=x({Role_Title:"",Role_description:"",Assign_to:""});return{getAllPermissions:()=>{u.get("/getAllPermissions").then(i=>{n.value=i.data,console.log(allpermission)})},saveCreateNewJobRole:()=>{u.post("").finally(()=>{})},AllPermission:n,CreatingNewJobRole:a,array_RolePermission_data:f}});const le={class:"w-full"},ne=o("div",null,[o("h4",{class:"px-4 text-2xl font-semibold"},"Employee Roles and Permissions")],-1),re={class:"p-4 my-4 card"},ce={class:"card-body"},pe=o("p",{class:"text-lg font-semibold text-gray-700 fs-4"},"Here you can manage the Employees Roles and Permissions",-1),de={class:"flex my-6"},me=o("h6",{class:"modal-title fs-21"}," Creating New Job Role",-1),ue=o("div",{class:"px-4 row"},[o("h3",{class:"text-xl font-semibold col-12"},"Roles Details")],-1),fe={class:"p-4"},_e={class:"row"},ve=o("h5",{class:"text-lg font-semibold col-12"},"Role Title",-1),be={class:"my-3 row"},he=o("h5",{class:"text-lg font-semibold col-12"},"Role Description",-1),ge=o("div",{class:"my-3"},[o("h5",{class:"text-lg font-semibold"},"Assign To")],-1),xe=o("button",{class:"py-2 mx-4 btn btn-orange"},"Create Role",-1),we={__name:"RolesPermission",setup(f){ae(),s([]),s();const n=s(!0);s();const a=s(!1);s(!0),s(!1),s(!1);const r=s();return u.get("/getAllPermissions").then(p=>{r.value=p.data,console.log(r)}),s([{id:1,key:"0",label:"Documents",data:"Documents Folder",icon:"pi pi-fw pi-inbox",children:[{id:2,key:"1",label:"Work",data:"Work Folder",icon:"pi pi-fw pi-cog",children:[{key:"0-0-0",label:"Expenses.doc",icon:"pi pi-fw pi-file",data:"Expenses Document"},{key:"0-0-1",label:"Resume.doc",icon:"pi pi-fw pi-file",data:"Resume Document"}]},{id:3,key:"2",label:"Home",data:"Home Folder",icon:"pi pi-fw pi-home",children:[{key:"0-1-0",label:"Invoices.txt",icon:"pi pi-fw pi-file",data:"Invoices for this month"}]}]},{id:4,key:"4",label:"Events",data:"Events Folder",icon:"pi pi-fw pi-calendar",children:[{id:5,key:"1-0",label:"Meeting",icon:"pi pi-fw pi-calendar-plus",data:"Meeting"},{id:6,key:"1-1",label:"Product Launch",icon:"pi pi-fw pi-calendar-plus",data:"Product Launch"},{id:7,key:"1-2",label:"Report Review",icon:"pi pi-fw pi-calendar-plus",data:"Report Review"}]}]),w(()=>{setTimeout(()=>{n.value=!1},4e3)}),(p,i)=>{const _=l("InputText"),d=l("Column"),v=l("DataTable"),b=l("Textarea"),h=l("Tree"),g=l("Dialog");return y(),R(T,null,[o("div",le,[ne,o("div",re,[o("div",ce,[pe,o("div",de,[t(_,{placeholder:"Search....",class:"w-4 h-10"}),o("button",{class:"h-10 mx-6 btn btn-orange",onClick:i[0]||(i[0]=m=>a.value=!0)},"Create Role")]),o("div",null,[t(v,null,{default:c(()=>[t(d,{field:"product",header:"Role"}),t(d,{field:"lastYearSale",header:"Who Has Access"}),t(d,{field:"thisYearSale",header:"Actions"})]),_:1})])])])]),t(g,{header:"Header",visible:a.value,"onUpdate:visible":i[2]||(i[2]=m=>a.value=m),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"65vw",borderTop:"5px solid #002f56"},modal:!0,closable:!1,closeOnEscape:!1},{header:c(()=>[me]),footer:c(()=>[o("div",null,[o("button",{class:"px-4 py-2 text-lg font-semibold text-gray-900 bg-gray-400 rounded-md",onClick:i[1]||(i[1]=m=>a.value=!1)},"Cancel"),xe])]),default:c(()=>[ue,o("div",fe,[o("div",_e,[ve,t(_,{placeholder:"Role Title",class:"w-8 h-10 col-4"})]),o("div",be,[he,t(b,{placeholder:"Role Description ",autoResize:"",class:"w-8 col-4"})]),ge,t(h,{value:r.value,selectionMode:"checkbox",class:"w-8 font-semibold"},null,8,["value"])])]),_:1},8,["visible"])],64)}}},e=$(we),ye=Y();e.use(C,{ripple:!0});e.use(j);e.use(k);e.use(O);e.use(ye);e.directive("tooltip",P);e.directive("badge",D);e.directive("ripple",S);e.directive("styleclass",A);e.directive("focustrap",N);e.component("Button",E);e.component("DataTable",F);e.component("Column",I);e.component("ColumnGroup",U);e.component("Row",G);e.component("Toast",H);e.component("OverlayPanel",q);e.component("ConfirmDialog",J);e.component("Dropdown",M);e.component("InputText",B);e.component("Dialog",V);e.component("ProgressSpinner",z);e.component("Calendar",K);e.component("Textarea",Q);e.component("Chips",X);e.component("InputNumber",W);e.component("Accordion",Z);e.component("AccordionTab",ee);e.component("Tree",oe);e.component("Skeleton",se);e.component("MultiSelect",ie);e.component("TreeTable",te);e.mount("#VJS_RolesPermissions");
