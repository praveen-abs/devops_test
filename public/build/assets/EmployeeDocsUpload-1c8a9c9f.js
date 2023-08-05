import{a3 as T,G as N,H as r,L as M,o as s,c as l,d as t,a as c,h as d,w as g,l as p,t as U,F as q,g as u,M as O,P as G,N as H,R as K,u as Q,v as W,W as J,Q as X,V as Y,A as Z,S as ee}from"./toastservice.esm-1920ab0b.js";import{c as oe}from"./pinia-35a9adb7.js";import{T as te,B as ae,S as ie,b as ne,a as se}from"./styleclass.esm-aa52e7ff.js";import"./blockui.esm-a7ca5bf6.js";import{D as le}from"./dialogservice.esm-bf0f2c65.js";import{C as re}from"./confirmationservice.esm-6034bcb5.js";import{s as ce}from"./progressspinner.esm-19057818.js";import{s as de}from"./progressbar.esm-3f2f4562.js";import{s as pe}from"./row.esm-6ebc942e.js";import{s as fe}from"./columngroup.esm-9dd1458e.js";import{s as me}from"./calendar.esm-b727393e.js";import{s as ge}from"./textarea.esm-36afa04a.js";import{s as ue}from"./chips.esm-b77c4124.js";import{s as _e}from"./multiselect.esm-30e0e3ae.js";import{a as v}from"./index-362795f3.js";const De=t("h2",null,"Upload Documents",-1),he=t("br",null,null,-1),ve={class:"p-2 shadow card profile-box card-top-border"},Ce={class:"card-body justify-content-center align-items-center"},be=t("div",{class:"header-card-text"},[t("h6",{class:"mb-0"},"Personal Documents")],-1),Pe={class:"mb-2 form-card"},ye={class:"mt-1 row"},ke={class:"mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"},Ee=t("label",{for:"",class:"float-label"},[p("Aadhar Card Front"),t("span",{class:"text-danger"},"*")],-1),xe={key:1,class:"p-error"},Le={class:"mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6",id:"aadhar_card_backend_content"},Ae=t("label",{for:"",class:"float-label"},[p(" Aadhar Card Back"),t("span",{class:"text-danger"},"*")],-1),we={key:1,class:"p-error"},Be={class:"mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"},Ie=t("label",{for:"",class:"float-label"},[p(" Pan Card"),t("span",{class:"text-danger"},"*")],-1),je={key:1,class:"p-error"},Fe={class:"mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"},Re=t("label",{for:"",class:"float-label"}," Passport",-1),Se={class:"mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"},Ve=t("label",{for:"",class:"float-label"},"Voter ID",-1),$e={class:"mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"},ze=t("label",{for:"",class:"float-label"}," Driving License",-1),Te={class:"col-md-6 col-sm-6 col-xs-12 col-lg-6"},Ne=t("label",{for:"",class:"float-label"},[p("Educations Certificate"),t("span",{class:"text-danger"},"*")],-1),Me={key:2,class:"p-error"},Ue={class:"col-md-6 col-sm-6 col-xs-12 col-lg-6"},qe=t("label",{for:"",class:"float-label"}," Relieving Letter",-1),Oe={class:"row"},Ge=t("template",null,[t("div",{class:"card flex justify-content-center"})],-1),He={class:"text-right col-12"},Ke=["disabled"],Qe={key:0},We=t("p",{class:"text-green-600 font-semibold"},"Completed",-1),Je=[We],Xe={key:1},Ye=t("p",{class:"text-red-600 font-semibold fs-5"},"Pending",-1),Ze=[Ye],eo={key:0},oo={key:1},to=t("input",{type:"file",name:"",id:"file",hidden:""},null,-1),ao=["onClick"],io=t("label",{for:"file"},[t("i",{class:"pi pi-upload"}),p(" Upload file")],-1),no=[io],so={__name:"EmployeeDocsUpload",setup(ro){T("$swal"),N();const f=r([]),E=()=>{v.post("/employee-documents-details",{user_code:"PSC0057"}).then(o=>{f.value=o.data.data,console.log("employee document : ",f.value)}).finally(o=>{console.log("completed")})};M(()=>{E()});const e=r({AadharCardFront:null,AadharCardBack:null,PanCardDoc:null,DrivingLicenseDoc:null,EductionDoc:null,VoterIdDoc:null,RelievingLetterDoc:null,PassportDoc:null,save_draft_messege:null}),C=r(!1),b=r(!1),P=r(!1),_=r(!1),x=()=>{let o=new FormData;e.AadharCardFront!=null&&o.append("Aadhar_Card_Front",e.AadharCardFront),e.AadharCardBack!=null&&o.append("Aadhar_Card_Back",e.AadharCardBack),e.PanCardDoc!=null&&o.append("Pan_Card",e.PanCardDoc),e.PassportDoc!=null&&o.append("Passport",e.PassportDoc),e.VoterIdDoc!=null&&o.append("Voter_ID",e.VoterIdDoc),e.DrivingLicenseDoc!=null&&o.append("Driving_License",e.DrivingLicenseDoc),e.EductionDoc!=null&&o.append("Education_Certificate",e.EductionDoc),e.RelievingLetterDoc!=null&&o.append("Relieving_Letter",e.RelievingLetterDoc),console.log(o),v.post("/vmt-documents-route/",o).then(a=>{console.log("response"+a.data),console.log(Object(a.data)),a.data.status=="Success"?Swal.fire({title:a.data.status="Success",text:a.data.message,icon:"success",showCancelButton:!1}).then(D=>{window.location.reload()}):a.data.status=="Failure"&&Swal.fire({title:a.data.status="Failure",text:a.data.message,icon:"error",showCancelButton:!1}).then(D=>{})}).finally(()=>{console.log("completed")}).catch(function(a){console.log(a)})},L=o=>{o.target.files&&o.target.files[0]&&(e.AadharCardFront=o.target.files[0],e.AadharCardFront.fileSize=Math.round(e.AadharCardFront.size/1024/1024*100)/100,e.AadharCardFront.fileExtention=e.AadharCardFront.name.split(".").pop(),e.AadharCardFront.fileName=e.AadharCardFront.name.split(".").shift(),e.AadharCardFront.isImage=["jpg","jpeg","png","gif"].includes(e.AadharCardFront.fileExtention),console.log(e.AadharCardFront))},A=o=>{o.target.files&&o.target.files[0]&&(e.AadharCardBack=o.target.files[0],e.AadharCardBack.fileSize=Math.round(e.AadharCardBack.size/1024/1024*100)/100,e.AadharCardBack.fileExtention=e.AadharCardBack.name.split(".").pop(),e.AadharCardBack.fileName=e.AadharCardBack.name.split(".").shift(),e.AadharCardBack.isImage=["jpg","jpeg","png","gif"].includes(e.AadharCardBack.fileExtention),console.log(e.AadharCardBack))},w=o=>{o.target.files&&o.target.files[0]&&(e.PanCardDoc=o.target.files[0],e.PanCardDoc.fileSize=Math.round(e.PanCardDoc.size/1024/1024*100)/100,e.PanCardDoc.fileExtention=e.PanCardDoc.name.split(".").pop(),e.PanCardDoc.fileName=e.PanCardDoc.name.split(".").shift(),e.PanCardDoc.isImage=["jpg","jpeg","png","gif"].includes(e.PanCardDoc.fileExtention),console.log(e.PanCardDoc))},B=o=>{o.target.files&&o.target.files[0]&&(e.PassportDoc=o.target.files[0],e.PassportDoc.fileSize=Math.round(e.PassportDoc.size/1024/1024*100)/100,e.PassportDoc.fileExtention=e.PassportDoc.name.split(".").pop(),e.PassportDoc.fileName=e.PassportDoc.name.split(".").shift(),e.PassportDoc.isImage=["jpg","jpeg","png","gif"].includes(e.PassportDoc.fileExtention),console.log(e.PassportDoc))},I=o=>{o.target.files&&o.target.files[0]&&(e.DrivingLicenseDoc=o.target.files[0],e.DrivingLicenseDoc.fileSize=Math.round(e.DrivingLicenseDoc.size/1024/1024*100)/100,e.DrivingLicenseDoc.fileExtention=e.DrivingLicenseDoc.name.split(".").pop(),e.DrivingLicenseDoc.fileName=e.DrivingLicenseDoc.name.split(".").shift(),e.DrivingLicenseDoc.isImage=["jpg","jpeg","png","gif"].includes(e.DrivingLicenseDoc.fileExtention),console.log(e.DrivingLicenseDoc))},j=o=>{o.target.files&&o.target.files[0]&&(e.VoterIdDoc=o.target.files[0],e.VoterIdDoc.fileSize=Math.round(e.VoterIdDoc.size/1024/1024*100)/100,e.VoterIdDoc.fileExtention=e.VoterIdDoc.name.split(".").pop(),e.VoterIdDoc.fileName=e.VoterIdDoc.name.split(".").shift(),e.VoterIdDoc.isImage=["jpg","jpeg","png","gif"].includes(e.VoterIdDoc.fileExtention),console.log(e.VoterIdDoc))},y=o=>{o.target.files&&o.target.files[0]&&(e.EductionDoc=o.target.files[0],e.EductionDoc.fileSize=Math.round(e.EductionDoc.size/1024/1024*100)/100,e.EductionDoc.fileExtention=e.EductionDoc.name.split(".").pop(),e.EductionDoc.fileName=e.EductionDoc.name.split(".").shift(),e.EductionDoc.isImage=["jpg","jpeg","png","gif"].includes(e.EductionDoc.fileExtention),console.log(e.EductionDoc))},F=o=>{o.target.files&&o.target.files[0]&&(e.RelievingLetterDoc=o.target.files[0],e.RelievingLetterDoc.fileSize=Math.round(e.RelievingLetterDoc.size/1024/1024*100)/100,e.RelievingLetterDoc.fileExtention=e.RelievingLetterDoc.name.split(".").pop(),e.RelievingLetterDoc.fileName=e.RelievingLetterDoc.name.split(".").shift(),e.RelievingLetterDoc.isImage=["jpg","jpeg","png","gif"].includes(e.RelievingLetterDoc.fileExtention))},m=r({}),R=r(!1),k=r(),S=o=>{m.value={...o},console.log(m.value),console.log(m.value.doc_url),R.value=!0,loading.value=!0,v.post("/view-profile-private-file",{user_code:_instance_profilePagesStore.employeeDetails.user_code,document_name:m.value.document_name}).then(a=>{console.log(a.data.data),k.value=a.data.data,console.log("data sent",k.value)}).finally(()=>{loading.value=!1})};return(o,a)=>{const D=u("Toast"),h=u("Column"),V=u("Button"),$=u("DataTable");return s(),l(q,null,[De,he,t("div",ve,[t("div",Ce,[be,t("div",Pe,[t("div",ye,[t("div",ke,[Ee,C.value?c("",!0):(s(),l("input",{key:0,type:"file",accept:"image/png, image/gif, image/jpeg",ref:"AadharCardFront",class:"onboard-form form-control file",onChange:a[0]||(a[0]=n=>L(n))},null,544)),C.value?(s(),l("span",xe,"Aadhar Card Front is required")):c("",!0)]),t("div",Le,[Ae,b.value?c("",!0):(s(),l("input",{key:0,type:"file",accept:"image/png, image/gif, image/jpeg",ref:"AadharCardBack",onChange:a[1]||(a[1]=n=>A(n)),class:"onboard-form form-control file"},null,544)),b.value?(s(),l("span",we,"Aadhar Card Back is Required")):c("",!0)]),t("div",Be,[Ie,P.value?c("",!0):(s(),l("input",{key:0,type:"file",accept:"image/png, image/gif, image/jpeg",placeholder:"Pan Card",name:"pan_card_file",id:"pan_card_file",ref:"PanCardDoc",onChange:a[2]||(a[2]=n=>w(n)),class:"onboard-form form-control file"},null,544)),P.value?(s(),l("span",je,"Pan Card is Required")):c("",!0)]),t("div",Fe,[Re,t("input",{type:"file",accept:"image/png, image/gif, image/jpeg",ref:"PassportDoc",placeholder:"Passport",name:"passport_file",id:"passport_file",onChange:a[3]||(a[3]=n=>B(n)),class:"onboard-form form-control file"},null,544)]),t("div",Se,[Ve,t("input",{type:"file",accept:"image/png, image/gif, image/jpeg",ref:"VoterIdDoc",placeholder:"Voters ID",name:"voters_id_file",id:"voters_id_file",onChange:a[4]||(a[4]=n=>j(n)),class:"onboard-form form-control file"},null,544)]),t("div",$e,[ze,t("input",{type:"file",accept:"image/png, image/gif, image/jpeg",placeholder:"Driving License",name:"dl_file",id:"dl_file",onChange:a[5]||(a[5]=n=>I(n)),ref:"DrivingLicenseDoc",class:"onboard-form form-control file"},null,544)]),t("div",Te,[Ne,_.value?(s(),l("input",{key:0,type:"file",accept:"image/png, image/gif, image/jpeg",placeholder:"Educations Certificate",name:"education_certificate_file",onChange:a[6]||(a[6]=n=>y(n)),id:"education_certificate_file",ref:"EductionDoc",class:"onboard-form form-control file is-invalid"},null,544)):c("",!0),_.value?c("",!0):(s(),l("input",{key:1,type:"file",accept:"image/png, image/gif, image/jpeg",placeholder:"Educations Certificate",name:"education_certificate_file",onChange:a[7]||(a[7]=n=>y(n)),id:"education_certificate_file",ref:"EductionDoc",class:"onboard-form form-control file"},null,544)),_.value?(s(),l("span",Me,"Eduction Certifacte is Required")):c("",!0)]),t("div",Ue,[qe,t("input",{type:"file",accept:"image/png, image/gif, image/jpeg",placeholder:"Relieving Letter",name:"reliving_letter_file",id:"reliving_letter_file",onChange:a[8]||(a[8]=n=>F(n)),ref:"RelievingLetterDoc",class:"onboard-form form-control file"},null,544)])])]),t("div",Oe,[Ge,t("div",He,[d(D),t("button",{severity:"warn",type:"submit",data:"row-6",next:"row-6",placeholder:"",name:"submit_form",id:"msform",class:"text-center btn btn-orange processOnboardForm warn",value:"Submit",disabled:o.fileUploadValidation,onClick:x}," Submit ",8,Ke)])])])]),t("div",null,[t("div",null,[d($,{ref:"dt",value:f.value,dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:g(()=>[d(h,{header:"File Name",field:"document_name",style:{"min-width":"8rem"}},{default:g(()=>[p(U(f.value.document_name),1)]),_:1}),d(h,{field:"status",header:"status",style:{"min-width":"12rem"}},{body:g(n=>[n.data.doc_id?(s(),l("div",Qe,Je)):(s(),l("div",Xe,Ze))]),_:1}),d(h,{field:"",header:"View ",style:{"min-width":"12rem"}},{body:g(n=>[n.data.doc_id?(s(),l("div",eo,[d(V,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"View",onClick:z=>S(n.data),style:{height:"2em"}},null,8,["onClick"])])):(s(),l("div",oo,[to,t("button",{class:"btn btn-success",onClick:z=>o.UploadDocument(n.data)},no,8,ao)]))]),_:1})]),_:1},8,["value"])])])],64)}}},i=O(so),lo=oe();i.use(G,{ripple:!0});i.use(re);i.use(H);i.use(le);i.use(lo);i.directive("tooltip",te);i.directive("badge",ae);i.directive("ripple",K);i.directive("styleclass",ie);i.directive("focustrap",Q);i.component("Button",W);i.component("DataTable",ne);i.component("Column",se);i.component("ColumnGroup",fe);i.component("Row",pe);i.component("Toast",J);i.component("ConfirmDialog",X);i.component("Dropdown",Y);i.component("InputText",Z);i.component("Dialog",ee);i.component("ProgressSpinner",ce);i.component("Calendar",me);i.component("Textarea",ge);i.component("Chips",ue);i.component("MultiSelect",_e);i.component("ProgressBar",de);i.mount("#EmployeeDocsUpload");
