/* empty css              */import{I as R,ah as N,$ as r,o as i,c as l,d as o,h as c,w as d,l as w,t as V,aj as u,a as f,b as L,g as _,J as U,P as j,K as M,u as O,L as A,R as I,S as K,x as G,y as H,M as J,Y as Q,N as W,V as X,X as Y,Q as q}from"./toastservice.esm-1e4d76cb.js";import{c as z}from"./pinia-1a7bd30b.js";import"./blockui.esm-bdb9f2eb.js";import{a as Z}from"./datatable.esm-9c853c0e.js";import{D as ee,s as te}from"./dialogservice.esm-26300ede.js";import{C as oe}from"./confirmationservice.esm-1279fa60.js";import{s as se}from"./progressspinner.esm-ef10595a.js";import{s as ae}from"./progressbar.esm-ba3b170f.js";import{s as ne}from"./row.esm-6ebc942e.js";import{s as ie}from"./calendar.esm-6d8a31db.js";import{s as le}from"./textarea.esm-eee751d2.js";import{s as re}from"./chips.esm-720db77e.js";import{s as ce}from"./multiselect.esm-dfed7e35.js";import{s as de}from"./checkbox.esm-14c7fcc5.js";import{a as $}from"./index-362795f3.js";import{U as me}from"./EmployeeDocumentsManagerService-645fbc8a.js";import"./Service-9dfdef64.js";import"./ProfilePagesStore-19ba4542.js";const pe={class:"card p-3",style:{"margin-top":"-25px"}},ue=o("h2",{class:"font-semibold text-2xl my-4 mx-3"},"Employee Documents",-1),fe={class:"w-full"},_e={key:0},he=o("p",{class:"text-red-600 font-semibold fs-5"},"Pending",-1),ge=[he],ve={key:1},ye=o("p",{class:"text-red-600 font-semibold fs-5"},"Approved",-1),be=[ye],we={key:2},xe=o("p",{class:"text-red-600 font-semibold fs-5"},"Rejected",-1),De=[xe],ke={key:3},Ce=o("p",{class:"text-green-600 font-semibold"},"-",-1),$e=[Ce],Se={key:0},Pe={key:0},Be=["onClick"],Ee=o("label",{for:"file",class:"cursor-pointer"},[o("i",{class:"pi pi-upload"}),w(" Upload file")],-1),Te=[Ee],Fe={key:1},Re={key:1},Ne=["onClick"],Ve=o("label",{for:"file",class:"cursor-pointer"},[o("i",{class:"pi pi-upload"}),w(" Upload file")],-1),Le=[Ve],Ue=["disabled"],je={class:"w-full h-full d-flex justify-content-center"},Me=["src"],Oe=o("h5",{style:{"text-align":"center"}},"Please wait...",-1),Ae={__name:"EmployeeDocumentsManager",setup(Ke){R(()=>{a.fetch_EmployeeDocument(),console.log(" ",S.value)});const a=me();N();const v=r(!1),S=r({}),y=r();r();const x=r(),b=r(),h=new FormData,g=r(),P=n=>{v.value=!0,a.loading=!0,$.post("/view-profile-private-file",{user_code:a.getEmployeeDetails.current_user_code,document_name:n.document_name}).then(t=>{y.value=t.data.data,console.log("data sent",y.value)}).finally(()=>{a.loading=!1})},D=n=>{b.value=n},k=n=>{console.log(b),n.target.files&&n.target.files[0]&&(x.value=n.target.files[0],h.append(`${b.value}`,x.value),console.log(h),Object.keys(h)[0])};async function B(){if(g.value=="Failure")Swal.fire({title:g.value="Failure",text:"Please upload all mandatory documents",icon:"error",showCancelButton:!1}).then(n=>{});else{a.loading=!0;let n="/vmt-documents-route/";$.post(n,h).then(t=>{g.value=t.data.status,console.log(g.value),console.log("Photo not send"),t.data.status=="Success"?Swal.fire({title:t.data.status="Success",text:t.data.message,icon:"success",showCancelButton:!1}).then(p=>{window.location.reload()}):t.data.status=="Failure"&&Swal.fire({title:t.data.status="Failure",text:t.data.message,icon:"error",showCancelButton:!1}).then(p=>{window.location.reload()})}).finally(()=>{a.fetch_EmployeeDocument(),a.loading=!1})}}return(n,t)=>{const p=_("Column"),E=_("Button"),T=_("DataTable"),C=_("Dialog"),F=_("ProgressSpinner");return i(),l("div",pe,[ue,o("div",fe,[c(T,{ref:"dt",value:u(a).getEmployeeDoc,dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:d(()=>[c(p,{header:"File Name",field:"document_name",style:{"min-width":"8rem"}},{default:d(()=>[w(V(u(a).getEmployeeDoc.document_name),1)]),_:1}),c(p,{field:"status",header:"status",style:{"min-width":"12rem"}},{body:d(s=>[s.data.status==="Pending"?(i(),l("div",_e,ge)):f("",!0),s.data.status==="Approved"?(i(),l("div",ve,be)):f("",!0),s.data.status==="Rejected"?(i(),l("div",we,De)):f("",!0),s.data.status===null?(i(),l("div",ke,$e)):f("",!0)]),_:1}),c(p,{field:"",header:"View ",style:{"min-width":"12rem"}},{body:d(s=>[s.data.doc_id?(i(),l("div",Se,[s.data.status=="Rejected"?(i(),l("div",Pe,[o("input",{type:"file",name:"",id:"file",hidden:"",onChange:t[0]||(t[0]=m=>k(m))},null,32),o("button",{class:"btn btn-success",onClick:m=>D(s.data.document_name)},Te,8,Be)])):(i(),l("div",Fe,[c(E,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"View",onClick:m=>P(s.data),style:{height:"2em"}},null,8,["onClick"])]))])):(i(),l("div",Re,[o("input",{type:"file",name:"",id:"file",hidden:"",onChange:t[1]||(t[1]=m=>k(m))},null,32),o("button",{class:"btn btn-success",onClick:m=>D(s.data.document_name)},Le,8,Ne)]))]),_:1})]),_:1},8,["value"]),o("button",{severity:"warn",type:"submit",data:"row-6",next:"row-6",name:"submit_form",id:"msform",class:"text-center btn btn-orange processOnboardForm float-end text-light mr-5 mt-5",value:"Submit",disabled:n.fileUploadValidation,onClick:B}," Submit ",8,Ue),u(a).loading==!1?(i(),L(C,{key:0,visible:v.value,"onUpdate:visible":t[2]||(t[2]=s=>v.value=s),modal:"",header:"Documents",style:{width:"40vw"}},{default:d(()=>[o("div",je,[o("img",{src:`data:image/png;base64,${y.value}`,class:"",alt:"File not found",style:{"object-fit":"cover","max-width":"400px",", min-height":"350px",height:"300px"}},null,8,Me)])]),_:1},8,["visible"])):f("",!0),c(C,{header:"Header",visible:u(a).loading,"onUpdate:visible":t[3]||(t[3]=s=>u(a).loading=s),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:d(()=>[c(F,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:d(()=>[Oe]),_:1},8,["visible"])])])}}},e=U(Ae),Ie=z();e.use(j,{ripple:!0});e.use(oe);e.use(M);e.use(ee);e.use(Ie);e.directive("tooltip",O);e.directive("badge",A);e.directive("ripple",I);e.directive("styleclass",K);e.directive("focustrap",G);e.component("Button",H);e.component("DataTable",Z);e.component("Column",J);e.component("ColumnGroup",te);e.component("Row",ne);e.component("Toast",Q);e.component("ConfirmDialog",W);e.component("Dropdown",X);e.component("InputText",Y);e.component("Dialog",q);e.component("ProgressSpinner",se);e.component("Calendar",ie);e.component("Textarea",le);e.component("Chips",re);e.component("MultiSelect",ce);e.component("ProgressBar",ae);e.component("Checkbox",de);e.mount("#EmployeeDocumentManager");