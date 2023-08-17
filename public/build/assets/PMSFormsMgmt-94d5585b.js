/* empty css              *//* empty css                     */import{I as u,ah as N,ak as A,g as b,o as h,c as y,h as t,w as o,aj as m,a3 as D,d as e,t as d,l as x,F as E,f as V,b as Y,K as B,P as j,L as G,u as I,M as O,R as H,S as q,x as W,y as z,N as J,_ as K,Q,W as X,Y as Z,V as ee}from"./toastservice.esm-3d6796bd.js";import"./blockui.esm-fba20899.js";import{a as ae}from"./datatable.esm-30f5a7e6.js";import{D as te,s as se}from"./dialogservice.esm-0be88020.js";import{C as oe}from"./confirmationservice.esm-5ceb5613.js";import{s as le}from"./progressspinner.esm-2bee3521.js";import{s as re}from"./row.esm-6ebc942e.js";import{d as ie,c as ne}from"./pinia-5332ebd8.js";import{d as k}from"./dayjs.min-2f06af28.js";import{a as T}from"./index-362795f3.js";import"./Service-bda4280b.js";const me=ie("pmsFormsMgmtStore",()=>{const w=u([]),l=u(),f=u();async function S(){await T.get("/pms-forms-mgmt/get-all-PMS-form-Authors").then(function(r){w.value=Object.entries(r.data.data)}).catch(function(r){console.log("Error : "+r)}).finally(function(){})}async function p(r){await T.post("/pms-forms-mgmt/getPMSFormUsageDetails",{pms_form_id:r}).then(function(i){l.value=i.data}).catch(i=>{console.log("Error getPMSFormUsageDetails() : "+i),l.value=null}).finally(()=>{})}async function g(r){console.log("Getting PMS form for the form_id : "+r),await T.post("/pms-forms-mgmt/getPMSFormTemplateDetails",{pms_form_id:r}).then(i=>{console.log("getPMSFormTemplateDetails() : "+i.data),f.value=i.data}).catch(i=>{console.log(i),f.value=null}).finally(()=>{})}return{array_pms_forms_authors_list:w,array_pms_forms_usage_details:l,pms_form_template_details:f,getAllPMSFormAuthors:S,getPMSFormUsageDetails:p,getPMSFormTemplateDetails:g}}),de=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),pe={class:"confirmation-content d-flex justify-content-start align-items-center mt-3 ml-3"},ce={class:"confirmation-content d-flex justify-content-center align-items-center mt-3 ml-3"},_e=e("b",null,"Form Name : ",-1),ue={class:"vertical-align-middle ml-2 font-bold line-height-3"},fe={style:{"white-space":"nowrap"}},ge={key:0},ve={key:1},be={__name:"PMSFormsTableView",setup(w){const l=me(),f=u([]),S=N();let p=u(!0),g=u(!1),r=u(!1),i=u();A(async()=>{await l.getAllPMSFormAuthors(),p.value=!1});async function C(c){console.log("Getting PMS Form Usage details for ID : "+c.pms_form_id),await l.getPMSFormUsageDetails(c.pms_form_id),l.array_pms_forms_usage_details!=null&&l.array_pms_forms_usage_details.status=="success"?g.value=!0:S.add({severity:"error",summary:"Error",detail:"Unable to fetch the requested details",life:3e3})}async function R(c){console.log("Getting PMS Form Template details for ID : "+c.pms_form_id),await l.getPMSFormTemplateDetails(c.pms_form_id),l.pms_form_template_details!=null&&l.pms_form_template_details.status=="success"?(i.value=l.pms_form_template_details.data.available_columns_primevue,r.value=!0):S.add({severity:"error",summary:"Error",detail:"Unable to fetch the requested details",life:3e3})}return(c,_)=>{const $=b("Toast"),L=b("ProgressSpinner"),M=b("Dialog"),n=b("Column"),P=b("DataTable"),F=b("Button");return h(),y("div",null,[t($),t(M,{header:"Header",visible:m(p),"onUpdate:visible":_[0]||(_[0]=a=>D(p)?p.value=a:p=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:o(()=>[t(L,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:o(()=>[de]),_:1},8,["visible"]),t(M,{header:"PMS Form Usage details",visible:m(g),"onUpdate:visible":_[1]||(_[1]=a=>D(g)?g.value=a:g=a),breakpoints:{"960px":"75vw","800px":"90vw"},style:{width:"980px"},modal:!0},{footer:o(()=>[]),default:o(()=>[e("div",pe,[t(P,{value:m(l).array_pms_forms_usage_details.data,tableStyle:"min-width: 70rem"},{default:o(()=>[t(n,{header:"Calendar Type/Year",style:{width:"20%"}},{body:o(a=>[e("span",null,[e("b",null,d(a.data.abbrevation)+" : "+d(m(k)(a.data.start_date).format("YYYY"))+" - "+d(m(k)(a.data.end_date).format("YYYY")),1)])]),_:1}),t(n,{field:"assignment_period",header:"Period",style:{width:"5%"}},{body:o(a=>[e("div",null,[e("span",null,[e("b",null,d(a.data.assignment_period.toUpperCase()),1)])])]),_:1}),t(n,{field:"assignee_name",header:"Assignee Name"}),t(n,{field:"reviewer_name",header:"Reviewer Name"}),t(n,{field:"assigner_name",header:"Assigner Name"})]),_:1},8,["value"])])]),_:1},8,["visible"]),t(M,{header:"PMS Form Template details",maximizable:"",modal:"",contentStyle:{height:"600px"},visible:m(r),"onUpdate:visible":_[2]||(_[2]=a=>D(r)?r.value=a:r=a),breakpoints:{"1000px":"25vw","800px":"90vw"},style:{width:"1200px"}},{footer:o(()=>[e("div",null,[t(F,{severity:"success",label:"Download as Excel",class:"btn btn-orange",style:{height:"2em"},raised:""})])]),default:o(()=>[e("div",ce,[t(P,{value:m(l).pms_form_template_details.data,scrollable:"",scrollHeight:"400px",tableStyle:"min-width: 90rem"},{header:o(()=>[e("span",null,[_e,x(" "+d(m(l).pms_form_template_details.data[0].form_name),1)])]),default:o(()=>[(h(!0),y(E,null,V(m(i),a=>(h(),Y(n,{key:a.field,field:a.field,style:{width:"25%"},header:a.header},null,8,["field","header"]))),128))]),_:1},8,["value"])])]),_:1},8,["visible"]),e("div",null,[t(P,{value:m(l).array_pms_forms_authors_list,onRowExpand:c.onRowExpand,onRowCollapse:c.onRowCollapse,expandedRows:f.value,"onUpdate:expandedRows":_[3]||(_[3]=a=>f.value=a),paginator:!0,rows:10,paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rowsPerPageOptions:[5,10,25],loading:m(p)},{empty:o(()=>[x(" No PMS forms found.")]),loading:o(()=>[x(" Loading data. Please wait. ")]),groupheader:o(a=>[e("span",ue,d(a.data[0]),1)]),expansion:o(a=>[e("div",null,[t(P,{value:a.data[1],responsiveLayout:"scroll",scrollable:"",scrollHeight:"400px"},{default:o(()=>[t(n,{header:"Form Name",sortable:""},{body:o(v=>[e("p",fe,d(v.data.form_name),1)]),_:2},1024),t(n,{header:"Form Assignment Details",sortable:""},{body:o(v=>[v.data.is_pmsform_used==1?(h(),y("div",ge,[t(F,{label:"View",onClick:U=>C(v.data),class:"btn btn-orange",style:{height:"2em"},raised:""},null,8,["onClick"])])):(h(),y("div",ve,d("Not Assigned")))]),_:2},1024),t(n,{header:"Actions",sortable:""},{body:o(v=>[t(F,{severity:"success",label:"View Form",onClick:U=>R(v.data),class:"btn btn-orange",style:{height:"2em"},raised:""},null,8,["onClick"])]),_:2},1024)]),_:2},1032,["value"])])]),default:o(()=>[t(n,{expander:!0}),t(n,{header:"Author Name"},{body:o(a=>[x(d(a.data[0]),1)]),_:1})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","loading"])])])}}};const he={class:"manage_employee-wrapper"},ye=e("div",{class:"mb-2 card left-line"},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"nav nav-pills nav-tabs-dashed",role:"tablist"},[e("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#org_level","aria-selected":"true",role:"tab"}," Org Level ")]),e("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#team_level","aria-selected":"true",role:"tab"}," Team Level ")]),e("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#employee_level","aria-selected":"true",role:"tab"}," Employee Level ")])])])],-1),we={class:"tab-content",id:"pills-tabContent"},Se={class:"tab-pane show fade active",id:"org_level",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Pe=e("div",{class:"tab-pane fade",id:"team_level",role:"tabpanel","aria-labelledby":"pills-profile-tab"},null,-1),xe=e("div",{class:"tab-pane fade",id:"employee_level",role:"tabpanel","aria-labelledby":"pills-profile-tab"},null,-1),Me={__name:"PMSFormsMgmt_MainView",setup(w){return(l,f)=>(h(),y("div",he,[ye,e("div",we,[e("div",Se,[t(be)]),Pe,xe])]))}},s=B(Me),Fe=ne();s.use(j,{ripple:!0});s.use(oe);s.use(G);s.use(te);s.use(Fe);s.directive("tooltip",I);s.directive("badge",O);s.directive("ripple",H);s.directive("styleclass",q);s.directive("focustrap",W);s.component("Button",z);s.component("DataTable",ae);s.component("Column",J);s.component("ColumnGroup",se);s.component("Row",re);s.component("Toast",K);s.component("ConfirmDialog",Q);s.component("Dropdown",X);s.component("InputText",Z);s.component("Dialog",ee);s.component("ProgressSpinner",le);s.mount("#VJS_PMSFormsMgmt");
