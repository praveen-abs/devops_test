/* empty css              *//* empty css                     *//* empty css                   */import{Q as r,a7 as h,ab as Q,o as E,c as G,h as l,aa as d,b as H,a as K,d as n,w as a,t as S,X as P,l as _,F as W,g as w,H as X,P as q,R as Z,u as ee,x as oe,I as te,K as le,M as se,J as ae}from"./inputnumber.esm-5d69a21b.js";import{u as ne,a as ie,T as re,B as ce,S as pe,b as ue,s as de}from"./toastservice.esm-9d3b5dc9.js";import"./blockui.esm-3d95c539.js";import{a as me}from"./datatable.esm-7205543b.js";import{D as ve,s as fe}from"./dialogservice.esm-ea919e3d.js";import{C as ge}from"./confirmationservice.esm-9a37c562.js";import{s as be}from"./progressspinner.esm-7d63b3de.js";import{s as we}from"./row.esm-6ebc942e.js";import{s as ye}from"./calendar.esm-0c5ba9cf.js";import{h as he}from"./moment-fbc5633a.js";import{s as Se}from"./checkbox.esm-8e251a83.js";import{s as Ce}from"./tag.esm-bb188f5e.js";import{a as R}from"./index-362795f3.js";import{d as ke}from"./dayjs.min-2f06af28.js";import{m as _e}from"./map-a1368670.js";import{L as Re}from"./LoadingSpinner-264a0661.js";import"./_baseToString-68774409.js";/* empty css                                                                       */import"./_plugin-vue_export-helper-c27b6911.js";const Ae={class:"w-full"},De=n("div",{class:"flex justify-between my-2"},[n("h6",{class:"mb-3 text-lg font-semibold"},"Documents Approvals")],-1),xe={class:"confirmation-content"},Te=n("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),$e={class:"confirmation-content"},Pe=n("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Ne={class:"confirmation-content"},Be=n("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),je={class:"orders-subtable"},Le=["src","alt"],Me=["src","alt"],Ue={__name:"review_document",setup(Oe){const A=r(!1);let D=r(),f=r(!1),g=r(!1),C=r(!1),m=r(!1);const J=ne(),N=r([]),k=r(),x=r(),V=o=>{A.value=!0,R.post("/view-profile-private-file",{emp_doc_record_id:o}).then(e=>{console.log(e.data.data),x.value=e.data.data,console.log("data sent",x.value)})};r({global:{value:null,matchMode:h.CONTAINS},name:{value:null,matchMode:h.STARTS_WITH,matchMode:h.EQUALS,matchMode:h.CONTAINS},status:{value:"Pending",matchMode:h.EQUALS}}),r(["Pending","Approved","Rejected"]);let i=null,v=null;Q(()=>{D.value=[],T()});function T(){m.value=!0,R.get("/fetch-onboarded-doc").then(o=>{D.value=o.data}).finally(()=>{m.value=!1})}function B(o,e){f.value=!0,i=e,v=o,console.log("Selected Row Data : "+JSON.stringify(o))}function j(o,e){g.value=!0,i=e,v=o,console.log("Selected Bulk Row Data : "+JSON.stringify(o))}function L(o){f.value=!1,o&&b()}function $(o){g.value=!1,o&&b()}function b(){i="",v=null}r();function Y(){L(!1),m.value=!0,console.log("Processing Rowdata : "+JSON.stringify(v)),console.log("currentlySelectedStatus : "+i),R.post("/approvals/onboarding-docs-approve-reject",{record_id:v.record_id,status:i=="Approve"?"Approved":i=="Reject"?"Rejected":i,reviewer_comments:""}).then(o=>{console.log(o.data),T(),J.add({severity:"success",summary:"Status",detail:"Processed Successfully !",life:3e3}),b()}).catch(o=>{m.value=!1,b(),console.log(o.toJSON())})}function M(){$(!1),m.value=!0,console.log("Processing Rowdata : "+JSON.stringify(v.documents)),console.log("currentlySelectedStatus : "+i);let o=_e(v.documents,"record_id");console.log("Processed doc record ids : "+o),R.post("/approvals/onboarding-bulkdocs-approve-reject",{record_ids:o,status:i=="Approve"?"Approved":i=="Reject"?"Rejected":i,reviewer_comments:""}).then(e=>{console.log(e.data),T(),m.value=!1,b()}).catch(e=>{m.value=!1,b(),console.log(e.toJSON())})}const z=o=>{switch(o){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};return(o,e)=>{const I=w("Toast"),c=w("Button"),y=w("Dialog"),p=w("Column"),F=w("Tag"),U=w("DataTable");return E(),G(W,null,[l(I),d(m)?(E(),H(Re,{key:0,class:"absolute z-50 bg-white"})):K("",!0),n("div",Ae,[De,n("div",null,[l(y,{header:"Confirmation",visible:d(f),"onUpdate:visible":e[2]||(e[2]=t=>P(f)?f.value=t:f=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:a(()=>[l(c,{label:"Yes",icon:"pi pi-check",onClick:e[0]||(e[0]=t=>Y()),class:"p-button-text",autofocus:""}),l(c,{label:"No",icon:"pi pi-times",onClick:e[1]||(e[1]=t=>L(!0)),class:"p-button-text"})]),default:a(()=>[n("div",xe,[Te,n("span",null,"Are you sure you want to "+S(d(i))+"?",1)])]),_:1},8,["visible"]),l(y,{header:"Confirmation",visible:d(g),"onUpdate:visible":e[5]||(e[5]=t=>P(g)?g.value=t:g=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"580px"},modal:!0},{footer:a(()=>[l(c,{label:"Yes",icon:"pi pi-check",onClick:e[3]||(e[3]=t=>M()),class:"p-button-text",autofocus:""}),l(c,{label:"No",icon:"pi pi-times",onClick:e[4]||(e[4]=t=>$(!0)),class:"p-button-text"})]),default:a(()=>[n("div",$e,[Pe,n("span",null,"Are you sure you want to "+S(d(i))+" all the documents of this employee?",1)])]),_:1},8,["visible"]),l(y,{header:"Confirmation",visible:d(C),"onUpdate:visible":e[8]||(e[8]=t=>P(C)?C.value=t:C=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"580px"},modal:!0},{footer:a(()=>[l(c,{label:"Yes",icon:"pi pi-check",onClick:e[6]||(e[6]=t=>M()),class:"p-button-text",autofocus:""}),l(c,{label:"No",icon:"pi pi-times",onClick:e[7]||(e[7]=t=>$(!0)),class:"p-button-text"})]),default:a(()=>[n("div",Ne,[Be,n("span",null,"Are you sure you want to "+S(d(i))+" all the documents of selected employees?",1)])]),_:1},8,["visible"]),n("div",null,[l(U,{value:d(D),paginator:!0,rows:10,class:"",dataKey:"user_code",onRowExpand:o.onRowExpand,onRowCollapse:o.onRowCollapse,expandedRows:N.value,"onUpdate:expandedRows":e[10]||(e[10]=t=>N.value=t),selection:k.value,"onUpdate:selection":e[11]||(e[11]=t=>k.value=t),selectAll:o.selectAll,onSelectAllChange:o.onSelectAllChange,onRowSelect:o.onRowSelect,onRowUnselect:o.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{empty:a(()=>[_(" No Onboarding documents for the selected status filter ")]),loading:a(()=>[_(" Loading employees data. Please wait. ")]),expansion:a(t=>[n("div",je,[l(U,{value:t.data.documents,responsiveLayout:"scroll",selection:k.value,"onUpdate:selection":e[9]||(e[9]=u=>k.value=u),selectAll:o.selectAll,onSelectAllChange:o.onSelectAllChange},{default:a(()=>[l(p,{field:"doc_name",header:"Document Name"}),l(p,{field:"doc_status",header:"Status"},{body:a(({data:u})=>[l(F,{value:u.doc_status,severity:z(u.doc_status)},null,8,["value","severity"])]),_:1}),l(p,{field:"",header:"View"},{body:a(u=>[l(c,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"View",onClick:O=>V(u.data.record_id),style:{height:"2em"}},null,8,["onClick"])]),_:2},1024),l(p,{field:"",header:"Action"},{body:a(u=>[n("span",null,[l(c,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:O=>B(u.data,"Approve"),style:{height:"2.5em"}},null,8,["onClick"]),l(c,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2.5em"},onClick:O=>B(u.data,"Reject")},null,8,["onClick"])])]),_:2},1024)]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:a(()=>[l(p,{expander:!0}),l(p,{selectionMode:"multiple",style:{width:"1rem"},exportable:!1}),l(p,{field:"user_code",header:"Employee Id",sortable:""}),l(p,{field:"name",header:"Employee Name"}),l(p,{class:"fontSize13px",field:"doj",header:"Date Of Joining"},{body:a(t=>[_(S(d(ke)(t.data.doj).format("DD-MMM-YYYY")),1)]),_:1}),l(p,{class:"fontSize13px",field:"doc_status",header:"Approval Status",sortable:!1},{body:a(({data:t})=>[_(S(t.doc_status),1)]),_:1}),l(p,{field:"",header:"Action"},{body:a(t=>[n("span",null,[l(c,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve All",onClick:u=>j(t.data,"Approve"),style:{height:"2.5em"}},null,8,["onClick"]),l(c,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject All",style:{"margin-left":"8px",height:"2.5em"},onClick:u=>j(t.data,"Reject")},null,8,["onClick"])])]),_:1})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"])]),l(y,{visible:A.value,"onUpdate:visible":e[12]||(e[12]=t=>A.value=t),modal:"",header:"Documents",style:{width:"40vw"}},{default:a(()=>[n("img",{src:`data:image/png;base64,${x.value}`,alt:o.doc_url,class:"block pb-3 m-auto"},null,8,Le)]),_:1},8,["visible"]),l(y,{visible:o.visible,"onUpdate:visible":e[13]||(e[13]=t=>o.visible=t),modal:"",header:"Documents",style:{width:"40vw"}},{default:a(()=>[n("img",{src:`http://127.0.0.1:8000/${o.doc_url}`,alt:o.doc_url,class:"block pb-3 m-auto"},null,8,Me)]),_:1},8,["visible"])])])],64)}}},s=X(Ue);s.use(q,{ripple:!0});s.use(ge);s.use(ie);s.use(ve);s.directive("tooltip",re);s.directive("badge",ce);s.directive("ripple",Z);s.directive("styleclass",pe);s.directive("focustrap",ee);s.component("Button",oe);s.component("DataTable",me);s.component("Column",te);s.component("ColumnGroup",fe);s.component("Row",we);s.component("Toast",ue);s.component("ConfirmDialog",de);s.component("Dropdown",le);s.component("InputText",se);s.component("Dialog",ae);s.component("ProgressSpinner",be);s.component("Calendar",ye);s.component("moment",he);s.component("Checkbox",Se);s.component("Tag",Ce);s.mount("#ReviewDocuments");
