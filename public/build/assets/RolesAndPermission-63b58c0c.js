import{G as c,g as h,H as g,o as f,c as _,d as e,h as s,a as C,I as U,w as m,t as y,l as A,F as D,f as V,J as L,P as E,K as B,R as I,u as j,v as F,Q as G,L as M,N as H,A as K,M as O}from"./toastservice.esm-d169f0d1.js";import{d as z,c as J}from"./pinia-78eb213f.js";import{T as Q,B as Y,S as q,b as W,a as X,c as Z}from"./styleclass.esm-78acb082.js";import{D as ee}from"./dialogservice.esm-56bfc94d.js";import{C as oe}from"./confirmationservice.esm-51fd20d7.js";import{s as se}from"./progressspinner.esm-0cc3ceca.js";import{s as te}from"./row.esm-6ebc942e.js";import{s as le}from"./columngroup.esm-9dd1458e.js";import"./fileupload.esm-167b644b.js";import{s as ne}from"./calendar.esm-1656704f.js";import{s as ae}from"./textarea.esm-e833e63d.js";import{s as ie}from"./chips.esm-cf7b710d.js";import{s as re}from"./overlaypanel.esm-6099ab1d.js";import{s as ce}from"./accordion.esm-4e7d53c9.js";import{s as de}from"./accordiontab.esm-d8a1e04a.js";import{s as pe,a as me,b as ue}from"./treetable.esm-6cc39be4.js";import{s as ve}from"./multiselect.esm-d290f708.js";import{a as $}from"./index-362795f3.js";import"./progressbar.esm-223020b2.js";import"./badge.esm-87028eb6.js";const x=z("UseRolePermissionStore",()=>{const R=c(1),a=c();c();const i=c();async function d(){await $.get("http://localhost:3000/useRolesAndPermission").then(u=>{i.value=u.data})}async function p(){$.get("/getRoleDetails").then(u=>{a.value=u.data,console.log(a.value)})}async function r(u,w){console.log(u,w);let l="/removeRoleToUsers";await $.post(l,{roles_name:u,user_id:w}).then(t=>{})}return{rolesPermission:R,arrayRoleDetails:a,AdminPrivilege:i,getRoleDetails:p,removeRoleDetails:r,getAdminRolesDetails:d}}),fe={key:0,class:"mt-30"},_e=e("div",null,null,-1),he=e("h1",{class:"fs-3 fw-semibold mb-2"},"Create New Role",-1),ge=e("p",{class:"fs-6 fw-semibold mb-2"},"Here you can Create role and set permission to them.",-1),we={class:"card shadow-sm"},be={class:"row my-3 px-2"},Re={class:"col-12"},ye={class:"row"},$e=e("div",{class:"col-3"},[e("label",{for:"",class:"mx-4 fw-semibold"},"Name of the Role")],-1),Ce={class:"col-9"},Pe={class:"col-12"},Se={class:"row"},Ae=e("div",{class:"col-3"},[e("label",{for:"",class:"mx-4 fw-semibold"},"Description of the Role")],-1),De={class:"col-9"},xe={class:"col-12"},ke={class:"row"},Ne=e("div",{class:"col-3"},[e("label",{for:"",class:"mx-4 fw-semibold"},"Category Name")],-1),Te={class:"col-9"},Ue={__name:"CreateNewRole",setup(R){const a=x();return(i,d)=>{const p=h("InputText");return g(a).rolesPermission==2?(f(),_("div",fe,[_e,he,ge,e("div",we,[e("div",be,[e("div",Re,[e("div",ye,[$e,e("div",Ce,[s(p,{type:"text",class:"h-10 w-6",modelValue:i.value,"onUpdate:modelValue":d[0]||(d[0]=r=>i.value=r),placeholder:"Enter Name of the Role"},null,8,["modelValue"])])])]),e("div",Pe,[e("div",Se,[Ae,e("div",De,[s(p,{type:"text",class:"h-10 w-6",modelValue:i.value,"onUpdate:modelValue":d[1]||(d[1]=r=>i.value=r),placeholder:"Give Description of the Role"},null,8,["modelValue"])])])]),e("div",xe,[e("div",ke,[Ne,e("div",Te,[s(p,{type:"text",class:"h-10 w-6",modelValue:i.value,"onUpdate:modelValue":d[2]||(d[2]=r=>i.value=r),placeholder:"Enter Name of the Sub Category"},null,8,["modelValue"])])])])])])])):C("",!0)}}};const Ve={key:0},Le={class:"w-full mt-30"},Ee=e("div",{class:""},[e("h1",{class:"fs-2 fw-semibold my-3"},"User Roles"),e("p",{class:"mb-3 fs-5"},"New roles can be Created and privileges for all these roles can be managed from this section")],-1),Be={class:"card bg-blue-200 h-20 border-none p-4"},Ie={class:"d-flex justify-content-between align-items-center"},je=e("div",{class:"w-80"},[e("h1",{class:"fs-4 text-blue-900 fw-semibold"},"Created")],-1),Fe={class:""},Ge=e("i",{class:"pi pi-plus fw-semibold"},null,-1),Me=e("span",{class:"fw-semibold"}," New Category",-1),He=[Ge,Me],Ke={class:"confirmation-content"},Oe=e("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),ze={class:"card shadow-md mt-4"},Je=e("button",{class:"text-blue-800"},[e("i",{class:"pi pi-pencil"})],-1),Qe=["onClick"],Ye=e("i",{class:"pi pi-trash"},null,-1),qe=[Ye],We={key:1},Xe={__name:"RolesAndPermission",setup(R){c(1);const a=x();c(!1),c();const i=c(),d=c([]);c([]);const p=c(),r=c(!1);U(()=>{a.getRoleDetails(),a.getAdminRolesDetails()});function u(l){r.value=!0,i.value=l,console.log(i.value)}function w(){r.value=!1}return(l,t)=>{const P=h("Button"),k=h("Dialog"),v=h("Column"),S=h("DataTable");return f(),_(D,null,[g(a).rolesPermission==1?(f(),_("div",Ve,[e("div",Le,[Ee,e("div",Be,[e("div",Ie,[je,e("div",Fe,[e("button",{class:"bg-white text-blue-900 px-3 py-2 rounded shadow-md fw-semibold",onClick:t[0]||(t[0]=n=>g(a).rolesPermission=2)},He)])])]),s(k,{header:"Confirmation",visible:r.value,"onUpdate:visible":t[3]||(t[3]=n=>r.value=n),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:m(()=>[s(P,{label:"Yes",icon:"pi pi-check",onClick:t[1]||(t[1]=n=>l.empDetailsDocumentApproveReject()),class:"p-button-text",autofocus:""}),s(P,{label:"No",icon:"pi pi-times",onClick:t[2]||(t[2]=n=>w(!0)),class:"p-button-text"})]),default:m(()=>[e("div",Ke,[Oe,e("span",null,"Are you sure you want to "+y(l.currentlySelectedStatus)+"?",1)])]),_:1},8,["visible"]),e("div",ze,[s(S,{value:g(a).AdminPrivilege,paginator:!0,rows:10,class:"",dataKey:"roles_id",onRowExpand:l.onRowExpand,onRowCollapse:l.onRowCollapse,expandedRows:d.value,"onUpdate:expandedRows":t[5]||(t[5]=n=>d.value=n),selection:p.value,"onUpdate:selection":t[6]||(t[6]=n=>p.value=n),selectAll:l.selectAll,onSelectAllChange:l.onSelectAllChange,onRowSelect:l.onRowSelect,onRowUnselect:l.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{empty:m(()=>[A(" No Employee Details documents for the selected status filter ")]),expansion:m(n=>[e("div",null,[s(S,{value:n.data.accordian,responsiveLayout:"scroll",selection:p.value,"onUpdate:selection":t[4]||(t[4]=b=>p.value=b),selectAll:l.selectAll,onSelectAllChange:l.onSelectAllChange},{default:m(()=>[s(v,{field:"Sub_Category_Name",header:"Sub_Category_Name",style:{width:"10rem"}},{default:m(()=>[A(y(n.data.user_code),1)]),_:2},1024),s(v,{header:"Privilege Name"},{body:m(({data:b})=>[(f(!0),_(D,null,V(b.Privilege,(N,T)=>(f(),_("div",{key:T,class:"border-black p-2 d-flex justify-content-start"},y(N.Privilege_name),1))),128))]),_:1})]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:m(()=>[s(v,{expander:!0}),s(v,{field:"role",header:"Roles",sortable:""}),s(v,{field:"assigned_privileged",header:"Assigned Privileges",sortable:!1}),s(v,{field:"assigned_emp",header:"Assigned Employees",sortable:!1}),s(v,{field:"",header:"Action"},{body:m(n=>[Je,e("button",{class:"text-blue-800 mx-4",onClick:b=>u(n.data)},qe,8,Qe)]),_:1})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"])])])])):C("",!0),g(a).rolesPermission==2?(f(),_("div",We,[s(Ue)])):C("",!0)],64)}}},o=L(Xe),Ze=J();o.use(E,{ripple:!0});o.use(oe);o.use(B);o.use(ee);o.use(Ze);o.directive("tooltip",Q);o.directive("badge",Y);o.directive("ripple",I);o.directive("styleclass",q);o.directive("focustrap",j);o.component("Button",F);o.component("DataTable",W);o.component("Column",X);o.component("ColumnGroup",le);o.component("Row",te);o.component("Toast",G);o.component("OverlayPanel",re);o.component("ConfirmDialog",M);o.component("Dropdown",H);o.component("InputText",K);o.component("Dialog",O);o.component("ProgressSpinner",se);o.component("Calendar",ne);o.component("Textarea",ae);o.component("Chips",ie);o.component("InputNumber",Z);o.component("Accordion",ce);o.component("AccordionTab",de);o.component("Tree",pe);o.component("Skeleton",me);o.component("MultiSelect",ve);o.component("TreeTable",ue);o.mount("#SuperAdminRolesPermission");
