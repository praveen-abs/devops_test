/* empty css                  *//* empty css              *//* empty css                     */import{I as d,ak as R,aj as h,o as y,c as C,d as o,l as w,h as t,w as i,t as p,a as A,g,K as D,P as S,L as $,u as P,M as x,R as k,S as T,x as N,y as U,N as E,_ as L,Q as B,W as V,Y as j,V as M,X as I}from"./toastservice.esm-3d6796bd.js";import{d as F,c as K}from"./pinia-5332ebd8.js";import{a as O}from"./datatable.esm-30f5a7e6.js";import{D as Y,s as z}from"./dialogservice.esm-0be88020.js";import{C as G}from"./confirmationservice.esm-5ceb5613.js";import{s as Q}from"./progressspinner.esm-2bee3521.js";import{s as W}from"./row.esm-6ebc942e.js";import"./fileupload.esm-79e769cd.js";import{s as X}from"./calendar.esm-88321a96.js";import{s as q}from"./textarea.esm-bd97b02a.js";import{s as H}from"./chips.esm-267914ec.js";import{s as J}from"./overlaypanel.esm-cb79f945.js";import{s as Z}from"./accordion.esm-d79f2e99.js";import{s as ee}from"./accordiontab.esm-20aac59d.js";import{s as oe,a as se,b as te}from"./treetable.esm-fc410688.js";import{s as ne}from"./multiselect.esm-74672710.js";import{a as ae}from"./index-362795f3.js";import"./progressbar.esm-3538c743.js";import"./badge.esm-6a889498.js";const ie=F("AdminRolePermission",()=>{const m=d(),r=d(1);async function u(){ae.get("/getRoleDetails").then(c=>{m.value=c.data,console.log(m.value)})}return{arrayRoleDetails:m,rolesPermission:r,getRoleDetails:u}}),le={key:0},re={class:"w-full mt-30"},ce=o("div",{class:""},[o("h1",{class:"fs-2 fw-semibold my-3"},"User Roles"),o("p",{class:"fw-semibold mb-3"},"User Roles can be assigned to the employees from here. New roles can be created and privileges for all these roles can be managed from this section.")],-1),pe={class:"card bg-blue-200 h-20 border-none p-4"},de={class:"d-flex justify-content-between align-items-center"},me=o("h1",{class:"fw-semibold"},"Assigned",-1),ue={class:"d-flex justify-content-between align-items-center"},fe=o("div",{class:"w-80"},[o("input",{type:"text",name:"",id:"",placeholder:"search",class:"rounded h-10 w-80 pl-2 shadow-md"})],-1),ge=o("i",{class:"pi pi-plus"},null,-1),he={class:"confirmation-content"},ve=o("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),be={class:"card shadow-md mt-4"},we={class:"text-blue-800"},_e={class:"text-gray-600"},Re={class:"text-blue-800"},ye={class:"text-blue-800"},Ce=["onClick"],Ae={class:""},De=["onClick"],Se={__name:"AdminRolesPermission",setup(m){const r=ie();d();const u=d([]);d([]);const c=d();return R(()=>{r.getRoleDetails()}),(n,a)=>{const v=g("Button"),_=g("Dialog"),l=g("Column"),b=g("DataTable");return h(r).rolesPermission==1?(y(),C("div",le,[o("div",re,[ce,o("div",pe,[o("div",de,[me,o("div",ue,[fe,o("button",{class:"bg-white text-blue-800 px-3 py-2 rounded shadow-md mx-2",onClick:a[0]||(a[0]=s=>h(r).rolesPermission=2)},[ge,w(" Assign New Role ")])])])]),t(_,{header:"Confirmation",visible:n.canShowConfirmationDialog,"onUpdate:visible":a[3]||(a[3]=s=>n.canShowConfirmationDialog=s),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:i(()=>[t(v,{label:"Yes",icon:"pi pi-check",onClick:a[1]||(a[1]=s=>n.empDetailsDocumentApproveReject()),class:"p-button-text",autofocus:""}),t(v,{label:"No",icon:"pi pi-times",onClick:a[2]||(a[2]=s=>n.hideConfirmDialog(!0)),class:"p-button-text"})]),default:i(()=>[o("div",he,[ve,o("span",null,"Are you sure you want to "+p(n.currentlySelectedStatus)+"?",1)])]),_:1},8,["visible"]),o("div",be,[t(b,{value:h(r).arrayRoleDetails,paginator:!0,rows:10,class:"",dataKey:"roles_id",onRowExpand:n.onRowExpand,onRowCollapse:n.onRowCollapse,expandedRows:u.value,"onUpdate:expandedRows":a[5]||(a[5]=s=>u.value=s),selection:c.value,"onUpdate:selection":a[6]||(a[6]=s=>c.value=s),selectAll:n.selectAll,onSelectAllChange:n.onSelectAllChange,onRowSelect:n.onRowSelect,onRowUnselect:n.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{empty:i(()=>[w(" No Employee Details documents for the selected status filter ")]),expansion:i(s=>[o("div",null,[t(b,{value:s.data.accordian,responsiveLayout:"scroll",selection:c.value,"onUpdate:selection":a[4]||(a[4]=f=>c.value=f),selectAll:n.selectAll,onSelectAllChange:n.onSelectAllChange},{default:i(()=>[t(l,{selectionMode:"multiple",style:{width:"1rem"},exportable:!1}),t(l,{field:"user_code",header:"Employee ID"},{default:i(()=>[o("h1",Ae,p(s.data.user_code),1)]),_:2},1024),t(l,{field:"name",header:"Employee Name"}),t(l,{field:"department_name",header:"Department"}),t(l,{field:"",header:"Action"},{body:i(f=>[o("button",{class:"shadow-sm px-3 py-2 rounded text-white bg-blue-700",onClick:Pe=>n.canShowConfirmation(f.data)},"Remove",8,De)]),_:2},1024)]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:i(()=>[t(l,{expander:!0}),t(l,{field:"name",header:"Roles",sortable:""},{body:i(s=>[o("h1",we,p(s.data.name),1)]),_:1}),t(l,{field:"description",header:"Role Description"},{body:i(s=>[o("h1",_e,p(s.data.description),1)]),_:1}),t(l,{field:"assigned_privileged",header:"Assigned Privileges",sortable:!1},{body:i(s=>[o("h1",Re,p(s.data.assigned_privileged),1)]),_:1}),t(l,{field:"assigned_emp",header:"Assigned Employees",sortable:!1},{body:i(s=>[o("h1",ye,p(s.data.assigned_emp),1)]),_:1}),t(l,{field:"",header:"Action"},{body:i(s=>[o("button",{class:"text-blue-600 fw-semibold hover:underline",onClick:f=>n.removeUserRole(s.data)},"Manage Users",8,Ce)]),_:1})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"])])])])):A("",!0)}}},e=D(Se),$e=K();e.use(S,{ripple:!0});e.use(G);e.use($);e.use(Y);e.use($e);e.directive("tooltip",P);e.directive("badge",x);e.directive("ripple",k);e.directive("styleclass",T);e.directive("focustrap",N);e.component("Button",U);e.component("DataTable",O);e.component("Column",E);e.component("ColumnGroup",z);e.component("Row",W);e.component("Toast",L);e.component("OverlayPanel",J);e.component("ConfirmDialog",B);e.component("Dropdown",V);e.component("InputText",j);e.component("Dialog",M);e.component("ProgressSpinner",Q);e.component("Calendar",X);e.component("Textarea",q);e.component("Chips",H);e.component("InputNumber",I);e.component("Accordion",Z);e.component("AccordionTab",ee);e.component("Tree",oe);e.component("Skeleton",se);e.component("MultiSelect",ne);e.component("TreeTable",te);e.mount("#AdminRolesPermission");
