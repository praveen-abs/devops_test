import{G as u,ag as A,H as N,g as b,o as h,c as y,h as t,w as o,a2 as m,a7 as D,d as e,t as d,l as x,F as E,f as V,b as B,I as Y,P as G,J as j,R as H,u as I,v as O,N as q,K as J,M as z,A as K,L as W}from"./toastservice.esm-089fd174.js";import{T as Q,B as X,S as Z,b as ee,a as ae}from"./styleclass.esm-c4aad718.js";import"./blockui.esm-fe051704.js";import{D as te}from"./dialogservice.esm-5a9d18a9.js";import{C as se}from"./confirmationservice.esm-66a41967.js";import{s as oe}from"./progressspinner.esm-76560800.js";import{s as le}from"./row.esm-6ebc942e.js";import{s as ie}from"./columngroup.esm-9dd1458e.js";import{d as re,c as ne}from"./pinia-33c7e0da.js";import{d as C}from"./dayjs.min-2f06af28.js";import{a as T}from"./index-362795f3.js";import"./Service-c3c14bcb.js";const me=re("pmsFormsMgmtStore",()=>{const w=u([]),l=u(),g=u();async function S(){await T.get("/pms-forms-mgmt/get-all-PMS-form-Authors").then(function(i){w.value=Object.entries(i.data.data)}).catch(function(i){console.log("Error : "+i)}).finally(function(){})}async function p(i){await T.post("/pms-forms-mgmt/getPMSFormUsageDetails",{pms_form_id:i}).then(function(r){l.value=r.data}).catch(r=>{console.log("Error getPMSFormUsageDetails() : "+r),l.value=null}).finally(()=>{})}async function f(i){console.log("Getting PMS form for the form_id : "+i),await T.post("/pms-forms-mgmt/getPMSFormTemplateDetails",{pms_form_id:i}).then(r=>{console.log("getPMSFormTemplateDetails() : "+r.data),g.value=r.data}).catch(r=>{console.log(r),g.value=null}).finally(()=>{})}return{array_pms_forms_authors_list:w,array_pms_forms_usage_details:l,pms_form_template_details:g,getAllPMSFormAuthors:S,getPMSFormUsageDetails:p,getPMSFormTemplateDetails:f}});const de=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),pe={class:"confirmation-content d-flex justify-content-start align-items-center mt-3 ml-3"},ce={class:"confirmation-content d-flex justify-content-center align-items-center mt-3 ml-3"},_e=e("b",null,"Form Name : ",-1),ue={class:"vertical-align-middle ml-2 font-bold line-height-3"},ge={style:{"white-space":"nowrap"}},fe={key:0},ve={key:1},be={__name:"PMSFormsTableView",setup(w){const l=me(),g=u([]),S=A();let p=u(!0),f=u(!1),i=u(!1),r=u();N(async()=>{await l.getAllPMSFormAuthors(),p.value=!1});async function k(c){console.log("Getting PMS Form Usage details for ID : "+c.pms_form_id),await l.getPMSFormUsageDetails(c.pms_form_id),l.array_pms_forms_usage_details!=null&&l.array_pms_forms_usage_details.status=="success"?f.value=!0:S.add({severity:"error",summary:"Error",detail:"Unable to fetch the requested details",life:3e3})}async function R(c){console.log("Getting PMS Form Template details for ID : "+c.pms_form_id),await l.getPMSFormTemplateDetails(c.pms_form_id),l.pms_form_template_details!=null&&l.pms_form_template_details.status=="success"?(r.value=l.pms_form_template_details.data.available_columns_primevue,i.value=!0):S.add({severity:"error",summary:"Error",detail:"Unable to fetch the requested details",life:3e3})}return(c,_)=>{const $=b("Toast"),L=b("ProgressSpinner"),M=b("Dialog"),n=b("Column"),P=b("DataTable"),F=b("Button");return h(),y("div",null,[t($),t(M,{header:"Header",visible:m(p),"onUpdate:visible":_[0]||(_[0]=a=>D(p)?p.value=a:p=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:o(()=>[t(L,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:o(()=>[de]),_:1},8,["visible"]),t(M,{header:"PMS Form Usage details",visible:m(f),"onUpdate:visible":_[1]||(_[1]=a=>D(f)?f.value=a:f=a),breakpoints:{"960px":"75vw","800px":"90vw"},style:{width:"980px"},modal:!0},{footer:o(()=>[]),default:o(()=>[e("div",pe,[t(P,{value:m(l).array_pms_forms_usage_details.data,tableStyle:"min-width: 70rem"},{default:o(()=>[t(n,{header:"Calendar Type/Year",style:{width:"20%"}},{body:o(a=>[e("span",null,[e("b",null,d(a.data.abbrevation)+" : "+d(m(C)(a.data.start_date).format("YYYY"))+" - "+d(m(C)(a.data.end_date).format("YYYY")),1)])]),_:1}),t(n,{field:"assignment_period",header:"Period",style:{width:"5%"}},{body:o(a=>[e("div",null,[e("span",null,[e("b",null,d(a.data.assignment_period.toUpperCase()),1)])])]),_:1}),t(n,{field:"assignee_name",header:"Assignee Name"}),t(n,{field:"reviewer_name",header:"Reviewer Name"}),t(n,{field:"assigner_name",header:"Assigner Name"})]),_:1},8,["value"])])]),_:1},8,["visible"]),t(M,{header:"PMS Form Template details",maximizable:"",modal:"",contentStyle:{height:"600px"},visible:m(i),"onUpdate:visible":_[2]||(_[2]=a=>D(i)?i.value=a:i=a),breakpoints:{"1000px":"25vw","800px":"90vw"},style:{width:"1200px"}},{footer:o(()=>[e("div",null,[t(F,{severity:"success",label:"Download as Excel",class:"btn btn-orange",style:{height:"2em"},raised:""})])]),default:o(()=>[e("div",ce,[t(P,{value:m(l).pms_form_template_details.data,scrollable:"",scrollHeight:"400px",tableStyle:"min-width: 90rem"},{header:o(()=>[e("span",null,[_e,x(" "+d(m(l).pms_form_template_details.data[0].form_name),1)])]),default:o(()=>[(h(!0),y(E,null,V(m(r),a=>(h(),B(n,{key:a.field,field:a.field,style:{width:"25%"},header:a.header},null,8,["field","header"]))),128))]),_:1},8,["value"])])]),_:1},8,["visible"]),e("div",null,[t(P,{value:m(l).array_pms_forms_authors_list,onRowExpand:c.onRowExpand,onRowCollapse:c.onRowCollapse,expandedRows:g.value,"onUpdate:expandedRows":_[3]||(_[3]=a=>g.value=a),paginator:!0,rows:10,paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rowsPerPageOptions:[5,10,25],loading:m(p)},{empty:o(()=>[x(" No PMS forms found.")]),loading:o(()=>[x(" Loading data. Please wait. ")]),groupheader:o(a=>[e("span",ue,d(a.data[0]),1)]),expansion:o(a=>[e("div",null,[t(P,{value:a.data[1],responsiveLayout:"scroll",scrollable:"",scrollHeight:"400px"},{default:o(()=>[t(n,{header:"Form Name",sortable:""},{body:o(v=>[e("p",ge,d(v.data.form_name),1)]),_:2},1024),t(n,{header:"Form Assignment Details",sortable:""},{body:o(v=>[v.data.is_pmsform_used==1?(h(),y("div",fe,[t(F,{label:"View",onClick:U=>k(v.data),class:"btn btn-orange",style:{height:"2em"},raised:""},null,8,["onClick"])])):(h(),y("div",ve,d("Not Assigned")))]),_:2},1024),t(n,{header:"Actions",sortable:""},{body:o(v=>[t(F,{severity:"success",label:"View Form",onClick:U=>R(v.data),class:"btn btn-orange",style:{height:"2em"},raised:""},null,8,["onClick"])]),_:2},1024)]),_:2},1032,["value"])])]),default:o(()=>[t(n,{expander:!0}),t(n,{header:"Author Name"},{body:o(a=>[x(d(a.data[0]),1)]),_:1})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","loading"])])])}}};const he={class:"manage_employee-wrapper mt-30"},ye=e("div",{class:"mb-2 card left-line"},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"nav nav-pills nav-tabs-dashed",role:"tablist"},[e("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#org_level","aria-selected":"true",role:"tab"}," Org Level ")]),e("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#team_level","aria-selected":"true",role:"tab"}," Team Level ")]),e("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#employee_level","aria-selected":"true",role:"tab"}," Employee Level ")])])])],-1),we={class:"card"},Se={class:"card-body"},Pe={class:"tab-content",id:"pills-tabContent"},xe={class:"tab-pane show fade active",id:"org_level",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Me=e("div",{class:"tab-pane fade",id:"team_level",role:"tabpanel","aria-labelledby":"pills-profile-tab"},null,-1),Fe=e("div",{class:"tab-pane fade",id:"employee_level",role:"tabpanel","aria-labelledby":"pills-profile-tab"},null,-1),De={__name:"PMSFormsMgmt_MainView",setup(w){return(l,g)=>(h(),y("div",he,[ye,e("div",we,[e("div",Se,[e("div",Pe,[e("div",xe,[t(be)]),Me,Fe])])])]))}},s=Y(De),Te=ne();s.use(G,{ripple:!0});s.use(se);s.use(j);s.use(te);s.use(Te);s.directive("tooltip",Q);s.directive("badge",X);s.directive("ripple",H);s.directive("styleclass",Z);s.directive("focustrap",I);s.component("Button",O);s.component("DataTable",ee);s.component("Column",ae);s.component("ColumnGroup",ie);s.component("Row",le);s.component("Toast",q);s.component("ConfirmDialog",J);s.component("Dropdown",z);s.component("InputText",K);s.component("Dialog",W);s.component("ProgressSpinner",oe);s.mount("#VJS_PMSFormsMgmt");
