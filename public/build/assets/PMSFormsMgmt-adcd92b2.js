/* empty css              *//* empty css                     *//* empty css                   */import{I as _,ag as N,aj as A,g as b,o as h,c as y,h as t,w as o,ai as m,a2 as D,d as e,t as d,l as x,F as E,f as V,b as Y,J as B,P as j,K as G,u as I,L as O,R as H,S as q,x as J,y as z,M as K,Y as Q,N as W,V as X,X as Z,Q as ee}from"./toastservice.esm-918560db.js";import"./blockui.esm-af7169c2.js";import{a as ae}from"./datatable.esm-b98720f6.js";import{D as te,s as se}from"./dialogservice.esm-5dbb3ad8.js";import{C as oe}from"./confirmationservice.esm-87248870.js";import{s as le}from"./progressspinner.esm-aabe5d1a.js";import{s as ie}from"./row.esm-6ebc942e.js";import{d as re,c as ne}from"./pinia-3f44ac08.js";import{d as C}from"./dayjs.min-2f06af28.js";import{a as T}from"./index-362795f3.js";import"./Service-ff2a1406.js";const me=re("pmsFormsMgmtStore",()=>{const w=_([]),l=_(),g=_();async function S(){await T.get("/pms-forms-mgmt/get-all-PMS-form-Authors").then(function(i){w.value=Object.entries(i.data.data)}).catch(function(i){console.log("Error : "+i)}).finally(function(){})}async function p(i){await T.post("/pms-forms-mgmt/getPMSFormUsageDetails",{pms_form_id:i}).then(function(r){l.value=r.data}).catch(r=>{console.log("Error getPMSFormUsageDetails() : "+r),l.value=null}).finally(()=>{})}async function f(i){console.log("Getting PMS form for the form_id : "+i),await T.post("/pms-forms-mgmt/getPMSFormTemplateDetails",{pms_form_id:i}).then(r=>{console.log("getPMSFormTemplateDetails() : "+r.data),g.value=r.data}).catch(r=>{console.log(r),g.value=null}).finally(()=>{})}return{array_pms_forms_authors_list:w,array_pms_forms_usage_details:l,pms_form_template_details:g,getAllPMSFormAuthors:S,getPMSFormUsageDetails:p,getPMSFormTemplateDetails:f}}),de=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),pe={class:"confirmation-content d-flex justify-content-start align-items-center mt-3 ml-3"},ce={class:"confirmation-content d-flex justify-content-center align-items-center mt-3 ml-3"},ue=e("b",null,"Form Name : ",-1),_e={class:"vertical-align-middle ml-2 font-bold line-height-3"},ge={style:{"white-space":"nowrap"}},fe={key:0},ve={key:1},be={__name:"PMSFormsTableView",setup(w){const l=me(),g=_([]),S=N();let p=_(!0),f=_(!1),i=_(!1),r=_();A(async()=>{await l.getAllPMSFormAuthors(),p.value=!1});async function k(c){console.log("Getting PMS Form Usage details for ID : "+c.pms_form_id),await l.getPMSFormUsageDetails(c.pms_form_id),l.array_pms_forms_usage_details!=null&&l.array_pms_forms_usage_details.status=="success"?f.value=!0:S.add({severity:"error",summary:"Error",detail:"Unable to fetch the requested details",life:3e3})}async function R(c){console.log("Getting PMS Form Template details for ID : "+c.pms_form_id),await l.getPMSFormTemplateDetails(c.pms_form_id),l.pms_form_template_details!=null&&l.pms_form_template_details.status=="success"?(r.value=l.pms_form_template_details.data.available_columns_primevue,i.value=!0):S.add({severity:"error",summary:"Error",detail:"Unable to fetch the requested details",life:3e3})}return(c,u)=>{const $=b("Toast"),L=b("ProgressSpinner"),M=b("Dialog"),n=b("Column"),P=b("DataTable"),F=b("Button");return h(),y("div",null,[t($),t(M,{header:"Header",visible:m(p),"onUpdate:visible":u[0]||(u[0]=a=>D(p)?p.value=a:p=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:o(()=>[t(L,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:o(()=>[de]),_:1},8,["visible"]),t(M,{header:"PMS Form Usage details",visible:m(f),"onUpdate:visible":u[1]||(u[1]=a=>D(f)?f.value=a:f=a),breakpoints:{"960px":"75vw","800px":"90vw"},style:{width:"980px"},modal:!0},{footer:o(()=>[]),default:o(()=>[e("div",pe,[t(P,{value:m(l).array_pms_forms_usage_details.data,tableStyle:"min-width: 70rem"},{default:o(()=>[t(n,{header:"Calendar Type/Year",style:{width:"20%"}},{body:o(a=>[e("span",null,[e("b",null,d(a.data.abbrevation)+" : "+d(m(C)(a.data.start_date).format("YYYY"))+" - "+d(m(C)(a.data.end_date).format("YYYY")),1)])]),_:1}),t(n,{field:"assignment_period",header:"Period",style:{width:"5%"}},{body:o(a=>[e("div",null,[e("span",null,[e("b",null,d(a.data.assignment_period.toUpperCase()),1)])])]),_:1}),t(n,{field:"assignee_name",header:"Assignee Name"}),t(n,{field:"reviewer_name",header:"Reviewer Name"}),t(n,{field:"assigner_name",header:"Assigner Name"})]),_:1},8,["value"])])]),_:1},8,["visible"]),t(M,{header:"PMS Form Template details",maximizable:"",modal:"",contentStyle:{height:"600px"},visible:m(i),"onUpdate:visible":u[2]||(u[2]=a=>D(i)?i.value=a:i=a),breakpoints:{"1000px":"25vw","800px":"90vw"},style:{width:"1200px"}},{footer:o(()=>[e("div",null,[t(F,{severity:"success",label:"Download as Excel",class:"btn btn-orange",style:{height:"2em"},raised:""})])]),default:o(()=>[e("div",ce,[t(P,{value:m(l).pms_form_template_details.data,scrollable:"",scrollHeight:"400px",tableStyle:"min-width: 90rem"},{header:o(()=>[e("span",null,[ue,x(" "+d(m(l).pms_form_template_details.data[0].form_name),1)])]),default:o(()=>[(h(!0),y(E,null,V(m(r),a=>(h(),Y(n,{key:a.field,field:a.field,style:{width:"25%"},header:a.header},null,8,["field","header"]))),128))]),_:1},8,["value"])])]),_:1},8,["visible"]),e("div",null,[t(P,{value:m(l).array_pms_forms_authors_list,onRowExpand:c.onRowExpand,onRowCollapse:c.onRowCollapse,expandedRows:g.value,"onUpdate:expandedRows":u[3]||(u[3]=a=>g.value=a),paginator:!0,rows:10,paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rowsPerPageOptions:[5,10,25],loading:m(p)},{empty:o(()=>[x(" No PMS forms found.")]),loading:o(()=>[x(" Loading data. Please wait. ")]),groupheader:o(a=>[e("span",_e,d(a.data[0]),1)]),expansion:o(a=>[e("div",null,[t(P,{value:a.data[1],responsiveLayout:"scroll",scrollable:"",scrollHeight:"400px"},{default:o(()=>[t(n,{header:"Form Name",sortable:""},{body:o(v=>[e("p",ge,d(v.data.form_name),1)]),_:2},1024),t(n,{header:"Form Assignment Details",sortable:""},{body:o(v=>[v.data.is_pmsform_used==1?(h(),y("div",fe,[t(F,{label:"View",onClick:U=>k(v.data),class:"btn btn-orange",style:{height:"2em"},raised:""},null,8,["onClick"])])):(h(),y("div",ve,d("Not Assigned")))]),_:2},1024),t(n,{header:"Actions",sortable:""},{body:o(v=>[t(F,{severity:"success",label:"View Form",onClick:U=>R(v.data),class:"btn btn-orange",style:{height:"2em"},raised:""},null,8,["onClick"])]),_:2},1024)]),_:2},1032,["value"])])]),default:o(()=>[t(n,{expander:!0}),t(n,{header:"Author Name"},{body:o(a=>[x(d(a.data[0]),1)]),_:1})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","loading"])])])}}};const he={class:"manage_employee-wrapper"},ye=e("div",{class:"mb-2 card left-line"},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"nav nav-pills nav-tabs-dashed",role:"tablist"},[e("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#org_level","aria-selected":"true",role:"tab"}," Org Level ")]),e("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#team_level","aria-selected":"true",role:"tab"}," Team Level ")]),e("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#employee_level","aria-selected":"true",role:"tab"}," Employee Level ")])])])],-1),we={class:"tab-content",id:"pills-tabContent"},Se={class:"tab-pane show fade active",id:"org_level",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Pe=e("div",{class:"tab-pane fade",id:"team_level",role:"tabpanel","aria-labelledby":"pills-profile-tab"},null,-1),xe=e("div",{class:"tab-pane fade",id:"employee_level",role:"tabpanel","aria-labelledby":"pills-profile-tab"},null,-1),Me={__name:"PMSFormsMgmt_MainView",setup(w){return(l,g)=>(h(),y("div",he,[ye,e("div",we,[e("div",Se,[t(be)]),Pe,xe])]))}},s=B(Me),Fe=ne();s.use(j,{ripple:!0});s.use(oe);s.use(G);s.use(te);s.use(Fe);s.directive("tooltip",I);s.directive("badge",O);s.directive("ripple",H);s.directive("styleclass",q);s.directive("focustrap",J);s.component("Button",z);s.component("DataTable",ae);s.component("Column",K);s.component("ColumnGroup",se);s.component("Row",ie);s.component("Toast",Q);s.component("ConfirmDialog",W);s.component("Dropdown",X);s.component("InputText",Z);s.component("Dialog",ee);s.component("ProgressSpinner",le);s.mount("#VJS_PMSFormsMgmt");
