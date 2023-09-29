/* empty css              *//* empty css                     *//* empty css                   */import{Q as _,ae as A,h as b,o as h,c as y,g as t,w as o,aa as m,X as D,d as e,t as d,l as x,F as N,f as E,b as V,H as B,P as Y,R as j,u as G,x as H,I,K as O,M as q,J}from"./inputnumber.esm-a7c5b1f0.js";import{u as z,a as K,T as Q,B as W,S as X,b as Z,s as ee}from"./toastservice.esm-c9da6ad1.js";import"./blockui.esm-0ae655a3.js";import{a as ae}from"./datatable.esm-eb498605.js";import{D as te,s as se}from"./dialogservice.esm-85bfcd0f.js";import{C as oe}from"./confirmationservice.esm-c87db23e.js";import{s as le}from"./progressspinner.esm-0bd742f8.js";import{s as re}from"./row.esm-6ebc942e.js";import{d as ie,c as ne}from"./pinia-4be28dc8.js";import{d as C}from"./dayjs.min-2f06af28.js";import{a as T}from"./index-362795f3.js";import"./Service-27f748d6.js";const me=ie("pmsFormsMgmtStore",()=>{const w=_([]),l=_(),f=_();async function S(){await T.get("/pms-forms-mgmt/get-all-PMS-form-Authors").then(function(r){w.value=Object.entries(r.data.data)}).catch(function(r){console.log("Error : "+r)}).finally(function(){})}async function p(r){await T.post("/pms-forms-mgmt/getPMSFormUsageDetails",{pms_form_id:r}).then(function(i){l.value=i.data}).catch(i=>{console.log("Error getPMSFormUsageDetails() : "+i),l.value=null}).finally(()=>{})}async function g(r){console.log("Getting PMS form for the form_id : "+r),await T.post("/pms-forms-mgmt/getPMSFormTemplateDetails",{pms_form_id:r}).then(i=>{console.log("getPMSFormTemplateDetails() : "+i.data),f.value=i.data}).catch(i=>{console.log(i),f.value=null}).finally(()=>{})}return{array_pms_forms_authors_list:w,array_pms_forms_usage_details:l,pms_form_template_details:f,getAllPMSFormAuthors:S,getPMSFormUsageDetails:p,getPMSFormTemplateDetails:g}}),de=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),pe={class:"confirmation-content d-flex justify-content-start align-items-center mt-3 ml-3"},ce={class:"confirmation-content d-flex justify-content-center align-items-center mt-3 ml-3"},ue=e("b",null,"Form Name : ",-1),_e={class:"vertical-align-middle ml-2 font-bold line-height-3"},fe={style:{"white-space":"nowrap"}},ge={key:0},ve={key:1},be={__name:"PMSFormsTableView",setup(w){const l=me(),f=_([]),S=z();let p=_(!0),g=_(!1),r=_(!1),i=_();A(async()=>{await l.getAllPMSFormAuthors(),p.value=!1});async function k(c){console.log("Getting PMS Form Usage details for ID : "+c.pms_form_id),await l.getPMSFormUsageDetails(c.pms_form_id),l.array_pms_forms_usage_details!=null&&l.array_pms_forms_usage_details.status=="success"?g.value=!0:S.add({severity:"error",summary:"Error",detail:"Unable to fetch the requested details",life:3e3})}async function R(c){console.log("Getting PMS Form Template details for ID : "+c.pms_form_id),await l.getPMSFormTemplateDetails(c.pms_form_id),l.pms_form_template_details!=null&&l.pms_form_template_details.status=="success"?(i.value=l.pms_form_template_details.data.available_columns_primevue,r.value=!0):S.add({severity:"error",summary:"Error",detail:"Unable to fetch the requested details",life:3e3})}return(c,u)=>{const $=b("Toast"),U=b("ProgressSpinner"),M=b("Dialog"),n=b("Column"),P=b("DataTable"),F=b("Button");return h(),y("div",null,[t($),t(M,{header:"Header",visible:m(p),"onUpdate:visible":u[0]||(u[0]=a=>D(p)?p.value=a:p=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:o(()=>[t(U,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:o(()=>[de]),_:1},8,["visible"]),t(M,{header:"PMS Form Usage details",visible:m(g),"onUpdate:visible":u[1]||(u[1]=a=>D(g)?g.value=a:g=a),breakpoints:{"960px":"75vw","800px":"90vw"},style:{width:"980px"},modal:!0},{footer:o(()=>[]),default:o(()=>[e("div",pe,[t(P,{value:m(l).array_pms_forms_usage_details.data,tableStyle:"min-width: 70rem"},{default:o(()=>[t(n,{header:"Calendar Type/Year",style:{width:"20%"}},{body:o(a=>[e("span",null,[e("b",null,d(a.data.abbrevation)+" : "+d(m(C)(a.data.start_date).format("YYYY"))+" - "+d(m(C)(a.data.end_date).format("YYYY")),1)])]),_:1}),t(n,{field:"assignment_period",header:"Period",style:{width:"5%"}},{body:o(a=>[e("div",null,[e("span",null,[e("b",null,d(a.data.assignment_period.toUpperCase()),1)])])]),_:1}),t(n,{field:"assignee_name",header:"Assignee Name"}),t(n,{field:"reviewer_name",header:"Reviewer Name"}),t(n,{field:"assigner_name",header:"Assigner Name"})]),_:1},8,["value"])])]),_:1},8,["visible"]),t(M,{header:"PMS Form Template details",maximizable:"",modal:"",contentStyle:{height:"600px"},visible:m(r),"onUpdate:visible":u[2]||(u[2]=a=>D(r)?r.value=a:r=a),breakpoints:{"1000px":"25vw","800px":"90vw"},style:{width:"1200px"}},{footer:o(()=>[e("div",null,[t(F,{severity:"success",label:"Download as Excel",class:"btn btn-orange",style:{height:"2em"},raised:""})])]),default:o(()=>[e("div",ce,[t(P,{value:m(l).pms_form_template_details.data,scrollable:"",scrollHeight:"400px",tableStyle:"min-width: 90rem"},{header:o(()=>[e("span",null,[ue,x(" "+d(m(l).pms_form_template_details.data[0].form_name),1)])]),default:o(()=>[(h(!0),y(N,null,E(m(i),a=>(h(),V(n,{key:a.field,field:a.field,style:{width:"25%"},header:a.header},null,8,["field","header"]))),128))]),_:1},8,["value"])])]),_:1},8,["visible"]),e("div",null,[t(P,{value:m(l).array_pms_forms_authors_list,onRowExpand:c.onRowExpand,onRowCollapse:c.onRowCollapse,expandedRows:f.value,"onUpdate:expandedRows":u[3]||(u[3]=a=>f.value=a),paginator:!0,rows:10,paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rowsPerPageOptions:[5,10,25],loading:m(p)},{empty:o(()=>[x(" No PMS forms found.")]),loading:o(()=>[x(" Loading data. Please wait. ")]),groupheader:o(a=>[e("span",_e,d(a.data[0]),1)]),expansion:o(a=>[e("div",null,[t(P,{value:a.data[1],responsiveLayout:"scroll",scrollable:"",scrollHeight:"400px"},{default:o(()=>[t(n,{header:"Form Name",sortable:""},{body:o(v=>[e("p",fe,d(v.data.form_name),1)]),_:2},1024),t(n,{header:"Form Assignment Details",sortable:""},{body:o(v=>[v.data.is_pmsform_used==1?(h(),y("div",ge,[t(F,{label:"View",onClick:L=>k(v.data),class:"btn btn-orange",style:{height:"2em"},raised:""},null,8,["onClick"])])):(h(),y("div",ve,d("Not Assigned")))]),_:2},1024),t(n,{header:"Actions",sortable:""},{body:o(v=>[t(F,{severity:"success",label:"View Form",onClick:L=>R(v.data),class:"btn btn-orange",style:{height:"2em"},raised:""},null,8,["onClick"])]),_:2},1024)]),_:2},1032,["value"])])]),default:o(()=>[t(n,{expander:!0}),t(n,{header:"Author Name"},{body:o(a=>[x(d(a.data[0]),1)]),_:1})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","loading"])])])}}};const he={class:"manage_employee-wrapper"},ye=e("div",{class:"mb-2 card left-line"},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"nav nav-pills nav-tabs-dashed",role:"tablist"},[e("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#org_level","aria-selected":"true",role:"tab"}," Org Level ")]),e("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#team_level","aria-selected":"true",role:"tab"}," Team Level ")]),e("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#employee_level","aria-selected":"true",role:"tab"}," Employee Level ")])])])],-1),we={class:"tab-content",id:"pills-tabContent"},Se={class:"tab-pane show fade active",id:"org_level",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Pe=e("div",{class:"tab-pane fade",id:"team_level",role:"tabpanel","aria-labelledby":"pills-profile-tab"},null,-1),xe=e("div",{class:"tab-pane fade",id:"employee_level",role:"tabpanel","aria-labelledby":"pills-profile-tab"},null,-1),Me={__name:"PMSFormsMgmt_MainView",setup(w){return(l,f)=>(h(),y("div",he,[ye,e("div",we,[e("div",Se,[t(be)]),Pe,xe])]))}},s=B(Me),Fe=ne();s.use(Y,{ripple:!0});s.use(oe);s.use(K);s.use(te);s.use(Fe);s.directive("tooltip",Q);s.directive("badge",W);s.directive("ripple",j);s.directive("styleclass",X);s.directive("focustrap",G);s.component("Button",H);s.component("DataTable",ae);s.component("Column",I);s.component("ColumnGroup",se);s.component("Row",re);s.component("Toast",Z);s.component("ConfirmDialog",ee);s.component("Dropdown",O);s.component("InputText",q);s.component("Dialog",J);s.component("ProgressSpinner",le);s.mount("#VJS_PMSFormsMgmt");
