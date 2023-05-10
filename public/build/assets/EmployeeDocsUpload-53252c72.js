import{N as S,X as $,B as c,c as s,e as t,a as r,h as d,w as h,F as z,j as g,g as m,o as l,G as T,P as N,H as M,R as U,q}from"./toastservice.esm-2710e797.js";import{c as O}from"./pinia-249763b3.js";import{T as G,B as H,S as K,b as X,a as J}from"./styleclass.esm-74f5155b.js";import"./blockui.esm-3338af13.js";import{C as Q,F as W,b as Y,s as Z,a as ee}from"./inputtext.esm-4f855040.js";import{s as oe}from"./confirmdialog.esm-758a9a8f.js";import{D as te}from"./dialogservice.esm-5827f3a2.js";import{s as ae}from"./toast.esm-4005e5d5.js";import{s as ie}from"./progressspinner.esm-cda45397.js";import{s as ne}from"./progressbar.esm-16beba44.js";import{s as se}from"./row.esm-6ebc942e.js";import{s as le}from"./columngroup.esm-9dd1458e.js";import{s as re}from"./calendar.esm-7f2e263f.js";import{s as ce}from"./textarea.esm-9322bb60.js";import{s as de}from"./chips.esm-84b28267.js";import{s as pe}from"./multiselect.esm-09947cfd.js";import{a as L}from"./index-f7a317fc.js";const fe=t("h2",null,"Upload Documents",-1),me=t("br",null,null,-1),ge={class:"p-2 shadow card profile-box card-top-border"},ue={class:"card-body justify-content-center align-items-center"},De=t("div",{class:"header-card-text"},[t("h6",{class:"mb-0"},"Personal Documents")],-1),he={class:"mb-2 form-card"},_e={class:"mt-1 row"},ve={class:"mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"},Ce=t("label",{for:"",class:"float-label"},[g("Aadhar Card Front"),t("span",{class:"text-danger"},"*")],-1),be={key:1,class:"p-error"},Pe={class:"mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6",id:"aadhar_card_backend_content"},ye=t("label",{for:"",class:"float-label"},[g(" Aadhar Card Back"),t("span",{class:"text-danger"},"*")],-1),Ee={key:1,class:"p-error"},Le={class:"mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"},xe=t("label",{for:"",class:"float-label"},[g(" Pan Card"),t("span",{class:"text-danger"},"*")],-1),ke={key:1,class:"p-error"},Ae={class:"mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"},we=t("label",{for:"",class:"float-label"}," Passport",-1),Be={class:"mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"},Ie=t("label",{for:"",class:"float-label"},"Voter ID",-1),je={class:"mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"},Fe=t("label",{for:"",class:"float-label"}," Driving License",-1),Re={class:"col-md-6 col-sm-6 col-xs-12 col-lg-6"},Ve=t("label",{for:"",class:"float-label"},[g("Educations Certificate"),t("span",{class:"text-danger"},"*")],-1),Se={key:2,class:"p-error"},$e={class:"col-md-6 col-sm-6 col-xs-12 col-lg-6"},ze=t("label",{for:"",class:"float-label"}," Relieving Letter",-1),Te={class:"row"},Ne=t("template",null,[t("div",{class:"card flex justify-content-center"})],-1),Me={class:"text-right col-12"},Ue=["disabled"],qe={__name:"EmployeeDocsUpload",setup(Ge){S("$swal"),$();const e=c({AadharCardFront:null,AadharCardBack:null,PanCardDoc:null,DrivingLicenseDoc:null,EductionDoc:null,VoterIdDoc:null,RelievingLetterDoc:null,PassportDoc:null,save_draft_messege:null}),_=c(!1),v=c(!1),C=c(!1),u=c(!1),x=()=>{let o=new FormData;e.AadharCardFront!=null&&o.append("Aadhar_Card_Front",e.AadharCardFront),e.AadharCardBack!=null&&o.append("Aadhar_Card_Back",e.AadharCardBack),e.PanCardDoc!=null&&o.append("Pan_Card",e.PanCardDoc),e.PassportDoc!=null&&o.append("Passport",e.PassportDoc),e.VoterIdDoc!=null&&o.append("Voter_ID",e.VoterIdDoc),e.DrivingLicenseDoc!=null&&o.append("Driving_License",e.DrivingLicenseDoc),e.EductionDoc!=null&&o.append("Education_Certificate",e.EductionDoc),e.RelievingLetterDoc!=null&&o.append("Relieving_Letter",e.RelievingLetterDoc),console.log(o),L.post("/vmt-documents-route/",o).then(a=>{console.log("response"+a.data),console.log(Object(a.data)),a.data.status=="Success"?Swal.fire({title:a.data.status="Success",text:a.data.message,icon:"success",showCancelButton:!1}).then(D=>{window.location.reload()}):a.data.status=="Failure"&&Swal.fire({title:a.data.status="Failure",text:a.data.message,icon:"error",showCancelButton:!1}).then(D=>{})}).finally(()=>{console.log("completed")}).catch(function(a){console.log(a)})},k=o=>{o.target.files&&o.target.files[0]&&(e.AadharCardFront=o.target.files[0],e.AadharCardFront.fileSize=Math.round(e.AadharCardFront.size/1024/1024*100)/100,e.AadharCardFront.fileExtention=e.AadharCardFront.name.split(".").pop(),e.AadharCardFront.fileName=e.AadharCardFront.name.split(".").shift(),e.AadharCardFront.isImage=["jpg","jpeg","png","gif"].includes(e.AadharCardFront.fileExtention),console.log(e.AadharCardFront))},A=o=>{o.target.files&&o.target.files[0]&&(e.AadharCardBack=o.target.files[0],e.AadharCardBack.fileSize=Math.round(e.AadharCardBack.size/1024/1024*100)/100,e.AadharCardBack.fileExtention=e.AadharCardBack.name.split(".").pop(),e.AadharCardBack.fileName=e.AadharCardBack.name.split(".").shift(),e.AadharCardBack.isImage=["jpg","jpeg","png","gif"].includes(e.AadharCardBack.fileExtention),console.log(e.AadharCardBack))},w=o=>{o.target.files&&o.target.files[0]&&(e.PanCardDoc=o.target.files[0],e.PanCardDoc.fileSize=Math.round(e.PanCardDoc.size/1024/1024*100)/100,e.PanCardDoc.fileExtention=e.PanCardDoc.name.split(".").pop(),e.PanCardDoc.fileName=e.PanCardDoc.name.split(".").shift(),e.PanCardDoc.isImage=["jpg","jpeg","png","gif"].includes(e.PanCardDoc.fileExtention),console.log(e.PanCardDoc))},B=o=>{o.target.files&&o.target.files[0]&&(e.PassportDoc=o.target.files[0],e.PassportDoc.fileSize=Math.round(e.PassportDoc.size/1024/1024*100)/100,e.PassportDoc.fileExtention=e.PassportDoc.name.split(".").pop(),e.PassportDoc.fileName=e.PassportDoc.name.split(".").shift(),e.PassportDoc.isImage=["jpg","jpeg","png","gif"].includes(e.PassportDoc.fileExtention),console.log(e.PassportDoc))},I=o=>{o.target.files&&o.target.files[0]&&(e.DrivingLicenseDoc=o.target.files[0],e.DrivingLicenseDoc.fileSize=Math.round(e.DrivingLicenseDoc.size/1024/1024*100)/100,e.DrivingLicenseDoc.fileExtention=e.DrivingLicenseDoc.name.split(".").pop(),e.DrivingLicenseDoc.fileName=e.DrivingLicenseDoc.name.split(".").shift(),e.DrivingLicenseDoc.isImage=["jpg","jpeg","png","gif"].includes(e.DrivingLicenseDoc.fileExtention),console.log(e.DrivingLicenseDoc))},j=o=>{o.target.files&&o.target.files[0]&&(e.VoterIdDoc=o.target.files[0],e.VoterIdDoc.fileSize=Math.round(e.VoterIdDoc.size/1024/1024*100)/100,e.VoterIdDoc.fileExtention=e.VoterIdDoc.name.split(".").pop(),e.VoterIdDoc.fileName=e.VoterIdDoc.name.split(".").shift(),e.VoterIdDoc.isImage=["jpg","jpeg","png","gif"].includes(e.VoterIdDoc.fileExtention),console.log(e.VoterIdDoc))},b=o=>{o.target.files&&o.target.files[0]&&(e.EductionDoc=o.target.files[0],e.EductionDoc.fileSize=Math.round(e.EductionDoc.size/1024/1024*100)/100,e.EductionDoc.fileExtention=e.EductionDoc.name.split(".").pop(),e.EductionDoc.fileName=e.EductionDoc.name.split(".").shift(),e.EductionDoc.isImage=["jpg","jpeg","png","gif"].includes(e.EductionDoc.fileExtention),console.log(e.EductionDoc))},F=o=>{o.target.files&&o.target.files[0]&&(e.RelievingLetterDoc=o.target.files[0],e.RelievingLetterDoc.fileSize=Math.round(e.RelievingLetterDoc.size/1024/1024*100)/100,e.RelievingLetterDoc.fileExtention=e.RelievingLetterDoc.name.split(".").pop(),e.RelievingLetterDoc.fileName=e.RelievingLetterDoc.name.split(".").shift(),e.RelievingLetterDoc.isImage=["jpg","jpeg","png","gif"].includes(e.RelievingLetterDoc.fileExtention))},p=c({}),R=c(!1),P=c(),y=o=>{p.value={...o},console.log(p.value),console.log(p.value.doc_url),R.value=!0,loading.value=!0,L.post("/view-profile-private-file",{user_code:_instance_profilePagesStore.employeeDetails.user_code,document_name:p.value.document_name}).then(a=>{console.log(a.data.data),P.value=a.data.data,console.log("data sent",P.value)}).finally(()=>{loading.value=!1})};return(o,a)=>{const D=m("Toast"),f=m("Column"),E=m("Button"),V=m("DataTable");return l(),s(z,null,[fe,me,t("div",ge,[t("div",ue,[De,t("div",he,[t("div",_e,[t("div",ve,[Ce,_.value?r("",!0):(l(),s("input",{key:0,type:"file",accept:"image/png, image/gif, image/jpeg",ref:"AadharCardFront",class:"onboard-form form-control file",onChange:a[0]||(a[0]=n=>k(n))},null,544)),_.value?(l(),s("span",be,"Aadhar Card Front is required")):r("",!0)]),t("div",Pe,[ye,v.value?r("",!0):(l(),s("input",{key:0,type:"file",accept:"image/png, image/gif, image/jpeg",ref:"AadharCardBack",onChange:a[1]||(a[1]=n=>A(n)),class:"onboard-form form-control file"},null,544)),v.value?(l(),s("span",Ee,"Aadhar Card Back is Required")):r("",!0)]),t("div",Le,[xe,C.value?r("",!0):(l(),s("input",{key:0,type:"file",accept:"image/png, image/gif, image/jpeg",placeholder:"Pan Card",name:"pan_card_file",id:"pan_card_file",ref:"PanCardDoc",onChange:a[2]||(a[2]=n=>w(n)),class:"onboard-form form-control file"},null,544)),C.value?(l(),s("span",ke,"Pan Card is Required")):r("",!0)]),t("div",Ae,[we,t("input",{type:"file",accept:"image/png, image/gif, image/jpeg",ref:"PassportDoc",placeholder:"Passport",name:"passport_file",id:"passport_file",onChange:a[3]||(a[3]=n=>B(n)),class:"onboard-form form-control file"},null,544)]),t("div",Be,[Ie,t("input",{type:"file",accept:"image/png, image/gif, image/jpeg",ref:"VoterIdDoc",placeholder:"Voters ID",name:"voters_id_file",id:"voters_id_file",onChange:a[4]||(a[4]=n=>j(n)),class:"onboard-form form-control file"},null,544)]),t("div",je,[Fe,t("input",{type:"file",accept:"image/png, image/gif, image/jpeg",placeholder:"Driving License",name:"dl_file",id:"dl_file",onChange:a[5]||(a[5]=n=>I(n)),ref:"DrivingLicenseDoc",class:"onboard-form form-control file"},null,544)]),t("div",Re,[Ve,u.value?(l(),s("input",{key:0,type:"file",accept:"image/png, image/gif, image/jpeg",placeholder:"Educations Certificate",name:"education_certificate_file",onChange:a[6]||(a[6]=n=>b(n)),id:"education_certificate_file",ref:"EductionDoc",class:"onboard-form form-control file is-invalid"},null,544)):r("",!0),u.value?r("",!0):(l(),s("input",{key:1,type:"file",accept:"image/png, image/gif, image/jpeg",placeholder:"Educations Certificate",name:"education_certificate_file",onChange:a[7]||(a[7]=n=>b(n)),id:"education_certificate_file",ref:"EductionDoc",class:"onboard-form form-control file"},null,544)),u.value?(l(),s("span",Se,"Eduction Certifacte is Required")):r("",!0)]),t("div",$e,[ze,t("input",{type:"file",accept:"image/png, image/gif, image/jpeg",placeholder:"Relieving Letter",name:"reliving_letter_file",id:"reliving_letter_file",onChange:a[8]||(a[8]=n=>F(n)),ref:"RelievingLetterDoc",class:"onboard-form form-control file"},null,544)])])]),t("div",Te,[Ne,t("div",Me,[d(D),t("button",{severity:"warn",type:"submit",data:"row-6",next:"row-6",placeholder:"",name:"submit_form",id:"msform",class:"text-center btn btn-orange processOnboardForm warn",value:"Submit",disabled:o.fileUploadValidation,onClick:x}," Submit ",8,Ue)])])])]),t("div",null,[t("div",null,[d(V,{ref:"dt",dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:h(()=>[d(f,{header:"File Name",field:"document_name",style:{"min-width":"8rem"}}),d(f,{field:"status",header:"Status",style:{"min-width":"12rem"}}),d(f,{field:"UploadDoc",header:"Upload Documents",style:{"min-width":"12rem"}},{default:h(()=>[d(E,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"Download",onClick:a[9]||(a[9]=n=>y(o.slotProps.data)),style:{height:"2em"}})]),_:1}),d(f,{field:"",header:"View ",style:{"min-width":"12rem"}},{body:h(n=>[d(E,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"View",onClick:He=>y(n.data),style:{height:"2em"}},null,8,["onClick"])]),_:1})]),_:1},512)])])],64)}}},i=T(qe),Oe=O();i.use(N,{ripple:!0});i.use(Q);i.use(M);i.use(te);i.use(Oe);i.directive("tooltip",G);i.directive("badge",H);i.directive("ripple",U);i.directive("styleclass",K);i.directive("focustrap",W);i.component("Button",q);i.component("DataTable",X);i.component("Column",J);i.component("ColumnGroup",le);i.component("Row",se);i.component("Toast",ae);i.component("ConfirmDialog",oe);i.component("Dropdown",Y);i.component("InputText",Z);i.component("Dialog",ee);i.component("ProgressSpinner",ie);i.component("Calendar",re);i.component("Textarea",ce);i.component("Chips",de);i.component("MultiSelect",pe);i.component("ProgressBar",ne);i.mount("#EmployeeDocsUpload");
