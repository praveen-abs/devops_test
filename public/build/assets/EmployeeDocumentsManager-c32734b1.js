/* empty css              *//* empty css                     *//* empty css                   */import{ab as U,Q as c,W as V,o as i,c as l,d as o,h as r,w as d,l as D,t as k,aa as _,a as m,b as L,g,H as M,P as j,R as O,u as A,x as H,I,K,M as W,J as G}from"./inputnumber.esm-e362c3ab.js";import{c as J}from"./pinia-641035e3.js";import{u as Q,a as q,T as z,B as X,S as Y,b as Z,s as ee}from"./toastservice.esm-8d63d505.js";import"./blockui.esm-da95937b.js";import{a as te}from"./datatable.esm-5f85e77a.js";import{D as oe,s as se}from"./dialogservice.esm-acafdb8a.js";import{C as ae}from"./confirmationservice.esm-62abe3ae.js";import{s as ne}from"./progressspinner.esm-dd1a9f95.js";import{s as ie}from"./progressbar.esm-681333bb.js";import{s as le}from"./overlaypanel.esm-e07df2f8.js";import{s as ce}from"./row.esm-6ebc942e.js";import{s as re}from"./calendar.esm-871de032.js";import{s as de}from"./textarea.esm-36dc9b1f.js";import{s as me}from"./chips.esm-94e18b40.js";import{s as ue}from"./multiselect.esm-774f4ea4.js";import{s as pe}from"./checkbox.esm-71be7f27.js";import{a as P}from"./index-362795f3.js";import{U as fe}from"./EmployeeDocumentsManagerService-bcb31e26.js";import"./Service-4ef425c0.js";import"./ProfilePagesStore-775c8cd8.js";const _e={class:"card p-3"},ge=o("h2",{class:"font-semibold text-2xl my-4 mx-3"},"Employee Documents",-1),ve={class:"w-full"},he={key:0},ye=o("p",{class:"text-red-600 font-semibold fs-5"},"Pending",-1),be=[ye],we={key:1},xe=o("p",{class:"text-red-600 font-semibold fs-5"},"Approved",-1),ke=[xe],De={key:2},Ce=o("p",{class:"text-red-600 font-semibold fs-5"},"Rejected",-1),$e=[Ce],Se={key:3},Pe=o("p",{class:"text-green-600 font-semibold"},"-",-1),Be=[Pe],Te={key:0},Ee={key:0},Fe=["onClick"],Re=o("label",{for:"file",class:"cursor-pointer"},[o("i",{class:"pi pi-upload"}),D(" Upload file")],-1),Ne=[Re],Ue={key:0,class:""},Ve={key:1},Le={key:1},Me=["onClick"],je=o("label",{for:"file",class:"cursor-pointer"},[o("i",{class:"pi pi-upload"}),D(" Upload file")],-1),Oe=[je],Ae={key:0,class:""},He=["disabled"],Ie={class:"w-full h-full d-flex justify-content-center"},Ke=["src"],We=o("h5",{style:{"text-align":"center"}},"Please wait...",-1),Ge={__name:"EmployeeDocumentsManager",setup(Qe){U(()=>{a.fetch_EmployeeDocument(),console.log(" ",B.value)});const a=fe();Q();const w=c(!1),B=c({}),x=c();c();const v=c(),h=V({name:""}),u=c(),y=new FormData,b=c(),T=n=>{w.value=!0,a.loading=!0,P.post("/view-profile-private-file",{user_code:a.getEmployeeDetails.current_user_code,document_name:n.document_name}).then(t=>{x.value=t.data.data,console.log("data sent",x.value)}).finally(()=>{a.loading=!1})},C=n=>{u.value=n},$=n=>{if(console.log(u),n.target.files&&n.target.files[0]){v.value=n.target.files[0],y.append(`${u.value}`,v.value),h.name=v.value,console.log(y),h.name=v.value,console.log("testing name",u.value);let t=Object.keys(y)[0];console.log("testing",t),console.log()}};async function E(){if(b.value=="Failure")Swal.fire({title:b.value="Failure",text:"Please upload all mandatory documents",icon:"error",showCancelButton:!1}).then(n=>{});else{a.loading=!0;let n="/vmt-documents-route/";P.post(n,y).then(t=>{b.value=t.data.status,console.log(b.value),console.log("Photo not send"),t.data.status=="Success"?Swal.fire({title:t.data.status="Success",text:t.data.message,icon:"success",showCancelButton:!1}).then(f=>{window.location.reload()}):t.data.status=="Failure"&&Swal.fire({title:t.data.status="Failure",text:t.data.message,icon:"error",showCancelButton:!1}).then(f=>{window.location.reload()})}).finally(()=>{a.fetch_EmployeeDocument(),a.loading=!1})}}return(n,t)=>{const f=g("Column"),F=g("Button"),R=g("DataTable"),S=g("Dialog"),N=g("ProgressSpinner");return i(),l("div",_e,[ge,o("div",ve,[r(R,{ref:"dt",value:_(a).getEmployeeDoc,dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:d(()=>[r(f,{header:"File Name",field:"document_name",style:{"min-width":"8rem"}},{default:d(()=>[D(k(_(a).getEmployeeDoc.document_name),1)]),_:1}),r(f,{field:"status",header:"status",style:{"min-width":"12rem"}},{body:d(s=>[s.data.status==="Pending"?(i(),l("div",he,be)):m("",!0),s.data.status==="Approved"?(i(),l("div",we,ke)):m("",!0),s.data.status==="Rejected"?(i(),l("div",De,$e)):m("",!0),s.data.status===null?(i(),l("div",Se,Be)):m("",!0)]),_:1}),r(f,{field:"",header:"View ",style:{"min-width":"12rem"}},{body:d(s=>[s.data.doc_id?(i(),l("div",Te,[s.data.status=="Rejected"?(i(),l("div",Ee,[o("input",{type:"file",name:"",id:"file",hidden:"",onChange:t[0]||(t[0]=p=>$(p))},null,32),o("button",{class:"btn btn-success",onClick:p=>C(s.data.document_name)},Ne,8,Fe),s.data.document_name==u.value?(i(),l("p",Ue,k(h.name.name),1)):m("",!0)])):(i(),l("div",Ve,[r(F,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"View",onClick:p=>T(s.data),style:{height:"2em"}},null,8,["onClick"])]))])):(i(),l("div",Le,[o("input",{type:"file",name:"",id:"file",hidden:"",onChange:t[1]||(t[1]=p=>$(p))},null,32),o("button",{class:"btn btn-success",onClick:p=>C(s.data.document_name)},Oe,8,Me),s.data.document_name==u.value?(i(),l("p",Ae,k(h.name.name),1)):m("",!0)]))]),_:1})]),_:1},8,["value"]),o("button",{severity:"warn",type:"submit",data:"row-6",next:"row-6",name:"submit_form",id:"msform",class:"text-center btn btn-orange processOnboardForm float-end text-light mr-5 mt-5",value:"Submit",disabled:n.fileUploadValidation,onClick:E}," Submit ",8,He),_(a).loading==!1?(i(),L(S,{key:0,visible:w.value,"onUpdate:visible":t[2]||(t[2]=s=>w.value=s),modal:"",header:"Documents",style:{width:"40vw"}},{default:d(()=>[o("div",Ie,[o("img",{src:`data:image/png;base64,${x.value}`,class:"",alt:"File not found",style:{"object-fit":"cover","max-width":"400px",", min-height":"350px",height:"300px"}},null,8,Ke)])]),_:1},8,["visible"])):m("",!0),r(S,{header:"Header",visible:_(a).loading,"onUpdate:visible":t[3]||(t[3]=s=>_(a).loading=s),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:d(()=>[r(N,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:d(()=>[We]),_:1},8,["visible"])])])}}},e=M(Ge),Je=J();e.use(j,{ripple:!0});e.use(ae);e.use(q);e.use(oe);e.use(Je);e.directive("tooltip",z);e.directive("badge",X);e.directive("ripple",O);e.directive("styleclass",Y);e.directive("focustrap",A);e.component("Button",H);e.component("DataTable",te);e.component("Column",I);e.component("ColumnGroup",se);e.component("Row",ce);e.component("Toast",Z);e.component("ConfirmDialog",ee);e.component("Dropdown",K);e.component("InputText",W);e.component("Dialog",G);e.component("ProgressSpinner",ne);e.component("Calendar",re);e.component("Textarea",de);e.component("Chips",me);e.component("MultiSelect",ue);e.component("ProgressBar",ie);e.component("Checkbox",pe);e.component("OverlayPanel",le);e.mount("#EmployeeDocumentManager");