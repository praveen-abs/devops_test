/* empty css              *//* empty css                     *//* empty css                   */import{ab as U,Q as c,W as V,o as i,c as l,d as o,h as r,w as d,l as D,t as k,aa as f,a as m,b as L,g,H as M,P as j,R as O,u as A,x as H,I,K,M as W,J as G}from"./inputnumber.esm-5d69a21b.js";import{c as J}from"./pinia-c08c4665.js";import{u as Q,a as q,T as z,B as X,S as Y,b as Z,s as ee}from"./toastservice.esm-9d3b5dc9.js";import"./blockui.esm-3d95c539.js";import{a as te}from"./datatable.esm-7205543b.js";import{D as oe,s as se}from"./dialogservice.esm-ea919e3d.js";import{C as ae}from"./confirmationservice.esm-9a37c562.js";import{s as ne}from"./progressspinner.esm-7d63b3de.js";import{s as ie}from"./progressbar.esm-48fccd8a.js";import{s as le}from"./row.esm-6ebc942e.js";import{s as ce}from"./calendar.esm-0c5ba9cf.js";import{s as re}from"./textarea.esm-e5a5a0a6.js";import{s as de}from"./chips.esm-7b2af6dc.js";import{s as me}from"./multiselect.esm-951f3d22.js";import{s as ue}from"./checkbox.esm-8e251a83.js";import{a as P}from"./index-362795f3.js";import{U as pe}from"./EmployeeDocumentsManagerService-4781294d.js";import"./Service-7a074f26.js";import"./ProfilePagesStore-1a7b7a12.js";const _e={class:"card p-3"},fe=o("h2",{class:"font-semibold text-2xl my-4 mx-3"},"Employee Documents",-1),ge={class:"w-full"},ve={key:0},he=o("p",{class:"text-red-600 font-semibold fs-5"},"Pending",-1),be=[he],ye={key:1},we=o("p",{class:"text-red-600 font-semibold fs-5"},"Approved",-1),xe=[we],ke={key:2},De=o("p",{class:"text-red-600 font-semibold fs-5"},"Rejected",-1),Ce=[De],Se={key:3},$e=o("p",{class:"text-green-600 font-semibold"},"-",-1),Pe=[$e],Be={key:0},Te={key:0},Ee=["onClick"],Fe=o("label",{for:"file",class:"cursor-pointer"},[o("i",{class:"pi pi-upload"}),D(" Upload file")],-1),Re=[Fe],Ne={key:0,class:""},Ue={key:1},Ve={key:1},Le=["onClick"],Me=o("label",{for:"file",class:"cursor-pointer"},[o("i",{class:"pi pi-upload"}),D(" Upload file")],-1),je=[Me],Oe={key:0,class:""},Ae=["disabled"],He={class:"w-full h-full d-flex justify-content-center"},Ie=["src"],Ke=o("h5",{style:{"text-align":"center"}},"Please wait...",-1),We={__name:"EmployeeDocumentsManager",setup(Je){U(()=>{a.fetch_EmployeeDocument(),console.log(" ",B.value)});const a=pe();Q();const w=c(!1),B=c({}),x=c();c();const v=c(),h=V({name:""}),u=c(),b=new FormData,y=c(),T=n=>{w.value=!0,a.loading=!0,P.post("/view-profile-private-file",{user_code:a.getEmployeeDetails.current_user_code,document_name:n.document_name}).then(t=>{x.value=t.data.data,console.log("data sent",x.value)}).finally(()=>{a.loading=!1})},C=n=>{u.value=n},S=n=>{if(console.log(u),n.target.files&&n.target.files[0]){v.value=n.target.files[0],b.append(`${u.value}`,v.value),h.name=v.value,console.log(b),h.name=v.value,console.log("testing name",u.value);let t=Object.keys(b)[0];console.log("testing",t),console.log()}};async function E(){if(y.value=="Failure")Swal.fire({title:y.value="Failure",text:"Please upload all mandatory documents",icon:"error",showCancelButton:!1}).then(n=>{});else{a.loading=!0;let n="/vmt-documents-route/";P.post(n,b).then(t=>{y.value=t.data.status,console.log(y.value),console.log("Photo not send"),t.data.status=="Success"?Swal.fire({title:t.data.status="Success",text:t.data.message,icon:"success",showCancelButton:!1}).then(_=>{window.location.reload()}):t.data.status=="Failure"&&Swal.fire({title:t.data.status="Failure",text:t.data.message,icon:"error",showCancelButton:!1}).then(_=>{window.location.reload()})}).finally(()=>{a.fetch_EmployeeDocument(),a.loading=!1})}}return(n,t)=>{const _=g("Column"),F=g("Button"),R=g("DataTable"),$=g("Dialog"),N=g("ProgressSpinner");return i(),l("div",_e,[fe,o("div",ge,[r(R,{ref:"dt",value:f(a).getEmployeeDoc,dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:d(()=>[r(_,{header:"File Name",field:"document_name",style:{"min-width":"8rem"}},{default:d(()=>[D(k(f(a).getEmployeeDoc.document_name),1)]),_:1}),r(_,{field:"status",header:"status",style:{"min-width":"12rem"}},{body:d(s=>[s.data.status==="Pending"?(i(),l("div",ve,be)):m("",!0),s.data.status==="Approved"?(i(),l("div",ye,xe)):m("",!0),s.data.status==="Rejected"?(i(),l("div",ke,Ce)):m("",!0),s.data.status===null?(i(),l("div",Se,Pe)):m("",!0)]),_:1}),r(_,{field:"",header:"View ",style:{"min-width":"12rem"}},{body:d(s=>[s.data.doc_id?(i(),l("div",Be,[s.data.status=="Rejected"?(i(),l("div",Te,[o("input",{type:"file",name:"",id:"file",hidden:"",onChange:t[0]||(t[0]=p=>S(p))},null,32),o("button",{class:"btn btn-success",onClick:p=>C(s.data.document_name)},Re,8,Ee),s.data.document_name==u.value?(i(),l("p",Ne,k(h.name.name),1)):m("",!0)])):(i(),l("div",Ue,[r(F,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"View",onClick:p=>T(s.data),style:{height:"2em"}},null,8,["onClick"])]))])):(i(),l("div",Ve,[o("input",{type:"file",name:"",id:"file",hidden:"",onChange:t[1]||(t[1]=p=>S(p))},null,32),o("button",{class:"btn btn-success",onClick:p=>C(s.data.document_name)},je,8,Le),s.data.document_name==u.value?(i(),l("p",Oe,k(h.name.name),1)):m("",!0)]))]),_:1})]),_:1},8,["value"]),o("button",{severity:"warn",type:"submit",data:"row-6",next:"row-6",name:"submit_form",id:"msform",class:"text-center btn btn-orange processOnboardForm float-end text-light mr-5 mt-5",value:"Submit",disabled:n.fileUploadValidation,onClick:E}," Submit ",8,Ae),f(a).loading==!1?(i(),L($,{key:0,visible:w.value,"onUpdate:visible":t[2]||(t[2]=s=>w.value=s),modal:"",header:"Documents",style:{width:"40vw"}},{default:d(()=>[o("div",He,[o("img",{src:`data:image/png;base64,${x.value}`,class:"",alt:"File not found",style:{"object-fit":"cover","max-width":"400px",", min-height":"350px",height:"300px"}},null,8,Ie)])]),_:1},8,["visible"])):m("",!0),r($,{header:"Header",visible:f(a).loading,"onUpdate:visible":t[3]||(t[3]=s=>f(a).loading=s),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:d(()=>[r(N,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:d(()=>[Ke]),_:1},8,["visible"])])])}}},e=M(We),Ge=J();e.use(j,{ripple:!0});e.use(ae);e.use(q);e.use(oe);e.use(Ge);e.directive("tooltip",z);e.directive("badge",X);e.directive("ripple",O);e.directive("styleclass",Y);e.directive("focustrap",A);e.component("Button",H);e.component("DataTable",te);e.component("Column",I);e.component("ColumnGroup",se);e.component("Row",le);e.component("Toast",Z);e.component("ConfirmDialog",ee);e.component("Dropdown",K);e.component("InputText",W);e.component("Dialog",G);e.component("ProgressSpinner",ne);e.component("Calendar",ce);e.component("Textarea",re);e.component("Chips",de);e.component("MultiSelect",me);e.component("ProgressBar",ie);e.component("Checkbox",ue);e.mount("#EmployeeDocumentManager");
