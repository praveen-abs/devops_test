/* empty css              *//* empty css                     */import{I as c,ah as Q,af as y,ak as W,o as G,c as H,h as l,d as a,w as n,aj as m,a3 as k,t as S,l as R,F as K,g as f,K as q,P as X,L as Z,u as ee,M as oe,R as te,S as le,x as se,y as ne,N as ae,_ as ie,Q as re,W as ce,Y as pe,V as de}from"./toastservice.esm-3d6796bd.js";import"./blockui.esm-fba20899.js";import{a as ue}from"./datatable.esm-30f5a7e6.js";import{D as me,s as ve}from"./dialogservice.esm-0be88020.js";import{C as fe}from"./confirmationservice.esm-5ceb5613.js";import{s as ge}from"./progressspinner.esm-2bee3521.js";import{s as be}from"./row.esm-6ebc942e.js";import{s as we}from"./calendar.esm-88321a96.js";import{h as he}from"./moment-fbc5633a.js";import{s as ye}from"./checkbox.esm-e4714654.js";import{s as Se}from"./tag.esm-bbf86d31.js";import{a as A}from"./index-362795f3.js";import{d as Ce}from"./dayjs.min-2f06af28.js";import{m as _e}from"./map-a1368670.js";import"./_baseToString-68774409.js";const ke=a("div",{class:"flex justify-between my-2"},[a("h6",{class:"mb-3 text-lg font-semibold"},"Documents Approvals")],-1),Re=a("h5",{style:{"text-align":"center"}},"Please wait...",-1),Ae={class:"confirmation-content"},xe=a("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),De={class:"confirmation-content"},Pe=a("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Te={class:"confirmation-content"},$e=a("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Ne={class:"orders-subtable"},je=["src","alt"],Be=["src","alt"],Ue={__name:"review_document",setup(Le){const x=c(!1);let D=c(),g=c(!1),b=c(!1),C=c(!1),r=c(!1);const E=Q(),N=c([]),_=c(),P=c(),V=o=>{x.value=!0,A.post("/view-profile-private-file",{emp_doc_record_id:o}).then(e=>{console.log(e.data.data),P.value=e.data.data,console.log("data sent",P.value)})};c({global:{value:null,matchMode:y.CONTAINS},name:{value:null,matchMode:y.STARTS_WITH,matchMode:y.EQUALS,matchMode:y.CONTAINS},status:{value:"Pending",matchMode:y.EQUALS}}),c(["Pending","Approved","Rejected"]);let i=null,v=null;W(()=>{D.value=[],T()});function T(){r=!0,A.get("/fetch-onboarded-doc").then(o=>{D.value=o.data,r=!1,console.log(o.data)})}function j(o,e){g.value=!0,i=e,v=o,console.log("Selected Row Data : "+JSON.stringify(o))}function B(o,e){b.value=!0,i=e,v=o,console.log("Selected Bulk Row Data : "+JSON.stringify(o))}function U(o){g.value=!1,o&&w()}function $(o){b.value=!1,o&&w()}function w(){i="",v=null}c();function Y(){U(!1),r=!0,console.log("Processing Rowdata : "+JSON.stringify(v)),console.log("currentlySelectedStatus : "+i),A.post("/approvals/onboarding-docs-approve-reject",{record_id:v.record_id,status:i=="Approve"?"Approved":i=="Reject"?"Rejected":i,reviewer_comments:""}).then(o=>{console.log(o.data),T(),r=!1,E.add({severity:"success",summary:"Status",detail:"Processed Successfully !",life:3e3}),w()}).catch(o=>{r=!1,w(),console.log(o.toJSON())})}function L(){$(!1),r=!0,console.log("Processing Rowdata : "+JSON.stringify(v.documents)),console.log("currentlySelectedStatus : "+i);let o=_e(v.documents,"record_id");console.log("Processed doc record ids : "+o),A.post("/approvals/onboarding-bulkdocs-approve-reject",{record_ids:o,status:i=="Approve"?"Approved":i=="Reject"?"Rejected":i,reviewer_comments:""}).then(e=>{console.log(e.data),T(),r=!1,w()}).catch(e=>{r=!1,w(),console.log(e.toJSON())})}const J=o=>{switch(o){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};return(o,e)=>{const I=f("Toast"),z=f("ProgressSpinner"),h=f("Dialog"),p=f("Button"),d=f("Column"),F=f("Tag"),M=f("DataTable");return G(),H(K,null,[l(I),ke,a("div",null,[l(h,{header:"Header",visible:m(r),"onUpdate:visible":e[0]||(e[0]=t=>k(r)?r.value=t:r=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:n(()=>[l(z,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:n(()=>[Re]),_:1},8,["visible"]),l(h,{header:"Confirmation",visible:m(g),"onUpdate:visible":e[3]||(e[3]=t=>k(g)?g.value=t:g=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:n(()=>[l(p,{label:"Yes",icon:"pi pi-check",onClick:e[1]||(e[1]=t=>Y()),class:"p-button-text",autofocus:""}),l(p,{label:"No",icon:"pi pi-times",onClick:e[2]||(e[2]=t=>U(!0)),class:"p-button-text"})]),default:n(()=>[a("div",Ae,[xe,a("span",null,"Are you sure you want to "+S(m(i))+"?",1)])]),_:1},8,["visible"]),l(h,{header:"Confirmation",visible:m(b),"onUpdate:visible":e[6]||(e[6]=t=>k(b)?b.value=t:b=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"580px"},modal:!0},{footer:n(()=>[l(p,{label:"Yes",icon:"pi pi-check",onClick:e[4]||(e[4]=t=>L()),class:"p-button-text",autofocus:""}),l(p,{label:"No",icon:"pi pi-times",onClick:e[5]||(e[5]=t=>$(!0)),class:"p-button-text"})]),default:n(()=>[a("div",De,[Pe,a("span",null,"Are you sure you want to "+S(m(i))+" all the documents of this employee?",1)])]),_:1},8,["visible"]),l(h,{header:"Confirmation",visible:m(C),"onUpdate:visible":e[9]||(e[9]=t=>k(C)?C.value=t:C=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"580px"},modal:!0},{footer:n(()=>[l(p,{label:"Yes",icon:"pi pi-check",onClick:e[7]||(e[7]=t=>L()),class:"p-button-text",autofocus:""}),l(p,{label:"No",icon:"pi pi-times",onClick:e[8]||(e[8]=t=>$(!0)),class:"p-button-text"})]),default:n(()=>[a("div",Te,[$e,a("span",null,"Are you sure you want to "+S(m(i))+" all the documents of selected employees?",1)])]),_:1},8,["visible"]),a("div",null,[l(M,{value:m(D),paginator:!0,rows:10,class:"",dataKey:"user_code",onRowExpand:o.onRowExpand,onRowCollapse:o.onRowCollapse,expandedRows:N.value,"onUpdate:expandedRows":e[11]||(e[11]=t=>N.value=t),selection:_.value,"onUpdate:selection":e[12]||(e[12]=t=>_.value=t),selectAll:o.selectAll,onSelectAllChange:o.onSelectAllChange,onRowSelect:o.onRowSelect,onRowUnselect:o.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{empty:n(()=>[R(" No Onboarding documents for the selected status filter ")]),loading:n(()=>[R(" Loading employees data. Please wait. ")]),expansion:n(t=>[a("div",Ne,[l(M,{value:t.data.documents,responsiveLayout:"scroll",selection:_.value,"onUpdate:selection":e[10]||(e[10]=u=>_.value=u),selectAll:o.selectAll,onSelectAllChange:o.onSelectAllChange},{default:n(()=>[l(d,{field:"doc_name",header:"Document Name"}),l(d,{field:"doc_status",header:"Status"},{body:n(({data:u})=>[l(F,{value:u.doc_status,severity:J(u.doc_status)},null,8,["value","severity"])]),_:1}),l(d,{field:"",header:"View"},{body:n(u=>[l(p,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"View",onClick:O=>V(u.data.record_id),style:{height:"2em"}},null,8,["onClick"])]),_:2},1024),l(d,{field:"",header:"Action"},{body:n(u=>[a("span",null,[l(p,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:O=>j(u.data,"Approve"),style:{height:"2.5em"}},null,8,["onClick"]),l(p,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2.5em"},onClick:O=>j(u.data,"Reject")},null,8,["onClick"])])]),_:2},1024)]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:n(()=>[l(d,{expander:!0}),l(d,{selectionMode:"multiple",style:{width:"1rem"},exportable:!1}),l(d,{field:"user_code",header:"Employee Id",sortable:""}),l(d,{field:"name",header:"Employee Name"}),l(d,{class:"fontSize13px",field:"doj",header:"Date Of Joining"},{body:n(t=>[R(S(m(Ce)(t.data.doj).format("DD-MMM-YYYY")),1)]),_:1}),l(d,{class:"fontSize13px",field:"doc_status",header:"Approval Status",sortable:!1},{body:n(({data:t})=>[R(S(t.doc_status),1)]),_:1}),l(d,{field:"",header:"Action"},{body:n(t=>[a("span",null,[l(p,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve All",onClick:u=>B(t.data,"Approve"),style:{height:"2.5em"}},null,8,["onClick"]),l(p,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject All",style:{"margin-left":"8px",height:"2.5em"},onClick:u=>B(t.data,"Reject")},null,8,["onClick"])])]),_:1})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"]),l(h,{visible:x.value,"onUpdate:visible":e[13]||(e[13]=t=>x.value=t),modal:"",header:"Documents",style:{width:"40vw"}},{default:n(()=>[a("img",{src:`data:image/png;base64,${P.value}`,alt:o.doc_url,class:"block pb-3 m-auto"},null,8,je)]),_:1},8,["visible"]),l(h,{visible:o.visible,"onUpdate:visible":e[14]||(e[14]=t=>o.visible=t),modal:"",header:"Documents",style:{width:"40vw"}},{default:n(()=>[a("img",{src:`http://127.0.0.1:8000/${o.doc_url}`,alt:o.doc_url,class:"block pb-3 m-auto"},null,8,Be)]),_:1},8,["visible"])])])],64)}}},s=q(Ue);s.use(X,{ripple:!0});s.use(fe);s.use(Z);s.use(me);s.directive("tooltip",ee);s.directive("badge",oe);s.directive("ripple",te);s.directive("styleclass",le);s.directive("focustrap",se);s.component("Button",ne);s.component("DataTable",ue);s.component("Column",ae);s.component("ColumnGroup",ve);s.component("Row",be);s.component("Toast",ie);s.component("ConfirmDialog",re);s.component("Dropdown",ce);s.component("InputText",pe);s.component("Dialog",de);s.component("ProgressSpinner",ge);s.component("Calendar",we);s.component("moment",he);s.component("Checkbox",ye);s.component("Tag",Se);s.mount("#ReviewDocuments");
