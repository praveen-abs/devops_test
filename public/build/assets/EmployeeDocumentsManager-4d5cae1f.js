import{H as i,I as L,a4 as V,c,e as o,h as u,w as m,a3 as g,b as N,a as h,g as v,o as l,k,t as M,J as U,P as j,K as A,L as O,R as I,u as H,v as K,V as G,M as J,Q,A as W,N as q,S as z}from"./toastservice.esm-1e19bead.js";import{d as X,c as Y}from"./pinia-8c47295b.js";import{T as Z,B as ee,S as te,b as oe,a as se}from"./styleclass.esm-fce48f9f.js";import"./blockui.esm-2f48c23f.js";import{D as ae}from"./dialogservice.esm-341570db.js";import{s as ne}from"./progressbar.esm-68a5f8e2.js";import{s as ie}from"./row.esm-6ebc942e.js";import{s as le}from"./columngroup.esm-9dd1458e.js";import{s as ce}from"./calendar.esm-d56ef9a8.js";import{s as re}from"./textarea.esm-7d78d5bc.js";import{s as de}from"./chips.esm-910adea3.js";import{s as ue}from"./multiselect.esm-43969b6f.js";import{a as x}from"./index-f7a317fc.js";import{S as me}from"./Service-31dfbe14.js";const pe=X("EmployeeDocumentManagerService",()=>{const w=me(),s=i(!1),d=i([]);i();const D=i();return{EmployeeDocs_upload:i({AadharCardFront:null,AadharCardBack:null,PanCardDoc:null,DrivingLicenseDoc:null,EductionDoc:null,VoterIdDoc:null,RelievingLetterDoc:null,PassportDoc:null,save_draft_messege:null}),getEmployeeDetails:w,getEmployeeDoc:d,getEmpdocPhoto:D,fetch_EmployeeDocument:async()=>{let p="";await w.getCurrentUserCode().then(r=>{p=r.data}),s.value=!0,await x.post("/employee-documents-details",{user_code:p}).then(r=>{d.value=r.data.data,console.log("employee document : ",d.value)}).finally(()=>{s.value=!1,console.log("completed")})},loading:s}}),fe={class:"card p-3",style:{"margin-top":"-25px"}},_e=o("h2",{class:"font-semibold text-2xl my-4 mx-3"},"Employee Documents",-1),ge={class:"w-full"},he={key:0},ve=o("p",{class:"text-red-600 font-semibold fs-5"},"Pending",-1),ye=[ve],be={key:1},we=o("p",{class:"text-red-600 font-semibold fs-5"},"Approved",-1),De=[we],Ce={key:2},xe=o("p",{class:"text-red-600 font-semibold fs-5"},"Rejected",-1),ke=[xe],Se={key:3},Ee=o("p",{class:"text-green-600 font-semibold"},"-",-1),Pe=[Ee],$e={key:0},Be={key:0},Te=["onClick"],Fe=o("label",{for:"file",class:"cursor-pointer"},[o("i",{class:"pi pi-upload"}),k(" Upload file")],-1),Re=[Fe],Le={key:1},Ve={key:1},Ne=["onClick"],Me=o("label",{for:"file",class:"cursor-pointer"},[o("i",{class:"pi pi-upload"}),k(" Upload file")],-1),Ue=[Me],je=["disabled"],Ae={class:"w-full h-full d-flex justify-content-center"},Oe=["src"],Ie=o("h5",{style:{"text-align":"center"}},"Please wait...",-1),He={__name:"EmployeeDocumentsManager",setup(w){L(()=>{s.fetch_EmployeeDocument(),console.log(" ",D.value)});const s=pe();V();const d=i(!1),D=i({}),y=i();i();const C=i(),p=i(),r=new FormData,b=i(),$=n=>{d.value=!0,s.loading=!0,x.post("/view-profile-private-file",{user_code:s.getEmployeeDetails.current_user_code,document_name:n.document_name}).then(t=>{y.value=t.data.data,console.log("data sent",y.value)}).finally(()=>{s.loading=!1})},S=n=>{p.value=n},E=n=>{console.log(p),n.target.files&&n.target.files[0]&&(C.value=n.target.files[0],r.append(`${p.value}`,C.value),console.log(r),Object.keys(r)[0])};async function B(){if(b.value=="Failure")Swal.fire({title:b.value="Failure",text:"Please upload all mandatory documents",icon:"error",showCancelButton:!1}).then(n=>{});else{s.loading=!0;let n="/vmt-documents-route/";x.post(n,r).then(t=>{b.value=t.data.status,console.log(b.value),console.log("Photo not send"),t.data.status=="Success"?Swal.fire({title:t.data.status="Success",text:t.data.message,icon:"success",showCancelButton:!1}).then(_=>{window.location.reload()}):t.data.status=="Failure"&&Swal.fire({title:t.data.status="Failure",text:t.data.message,icon:"error",showCancelButton:!1}).then(_=>{window.location.reload()})}).finally(()=>{s.fetch_EmployeeDocument(),s.loading=!1})}}return(n,t)=>{const _=v("Column"),T=v("Button"),F=v("DataTable"),P=v("Dialog"),R=v("ProgressSpinner");return l(),c("div",fe,[_e,o("div",ge,[u(F,{ref:"dt",value:g(s).getEmployeeDoc,dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:m(()=>[u(_,{header:"File Name",field:"document_name",style:{"min-width":"8rem"}},{default:m(()=>[k(M(g(s).getEmployeeDoc.document_name),1)]),_:1}),u(_,{field:"status",header:"status",style:{"min-width":"12rem"}},{body:m(a=>[a.data.status==="Pending"?(l(),c("div",he,ye)):h("",!0),a.data.status==="Approved"?(l(),c("div",be,De)):h("",!0),a.data.status==="Rejected"?(l(),c("div",Ce,ke)):h("",!0),a.data.status===null?(l(),c("div",Se,Pe)):h("",!0)]),_:1}),u(_,{field:"",header:"View ",style:{"min-width":"12rem"}},{body:m(a=>[a.data.doc_id?(l(),c("div",$e,[a.data.status=="Rejected"?(l(),c("div",Be,[o("input",{type:"file",name:"",id:"file",hidden:"",onChange:t[0]||(t[0]=f=>E(f))},null,32),o("button",{class:"btn btn-success",onClick:f=>S(a.data.document_name)},Re,8,Te)])):(l(),c("div",Le,[u(T,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"View",onClick:f=>$(a.data),style:{height:"2em"}},null,8,["onClick"])]))])):(l(),c("div",Ve,[o("input",{type:"file",name:"",id:"file",hidden:"",onChange:t[1]||(t[1]=f=>E(f))},null,32),o("button",{class:"btn btn-success",onClick:f=>S(a.data.document_name)},Ue,8,Ne)]))]),_:1})]),_:1},8,["value"]),o("button",{severity:"warn",type:"submit",data:"row-6",next:"row-6",name:"submit_form",id:"msform",class:"text-center btn btn-orange processOnboardForm float-end text-light mr-5 mt-5",value:"Submit",disabled:n.fileUploadValidation,onClick:B}," Submit ",8,je),g(s).loading==!1?(l(),N(P,{key:0,visible:d.value,"onUpdate:visible":t[2]||(t[2]=a=>d.value=a),modal:"",header:"Documents",style:{width:"40vw"}},{default:m(()=>[o("div",Ae,[o("img",{src:`data:image/png;base64,${y.value}`,class:"",alt:"File not found",style:{"object-fit":"cover","max-width":"400px",", min-height":"350px",height:"300px"}},null,8,Oe)])]),_:1},8,["visible"])):h("",!0),u(P,{header:"Header",visible:g(s).loading,"onUpdate:visible":t[3]||(t[3]=a=>g(s).loading=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:m(()=>[u(R,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:m(()=>[Ie]),_:1},8,["visible"])])])}}},e=U(He),Ke=Y();e.use(j,{ripple:!0});e.use(A);e.use(O);e.use(ae);e.use(Ke);e.directive("tooltip",Z);e.directive("badge",ee);e.directive("ripple",I);e.directive("styleclass",te);e.directive("focustrap",H);e.component("Button",K);e.component("DataTable",oe);e.component("Column",se);e.component("ColumnGroup",le);e.component("Row",ie);e.component("Toast",G);e.component("ConfirmDialog",J);e.component("Dropdown",Q);e.component("InputText",W);e.component("Dialog",q);e.component("ProgressSpinner",z);e.component("Calendar",ce);e.component("Textarea",re);e.component("Chips",de);e.component("MultiSelect",ue);e.component("ProgressBar",ne);e.mount("#EmployeeDocumentManager");
