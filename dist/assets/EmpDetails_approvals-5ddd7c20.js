<<<<<<<< HEAD:dist/assets/EmpDetails_approvals-5f782019.js
/* empty css              *//* empty css                     *//* empty css                   */import{a0 as p,ak as z,ag as g,o as $,c as Q,I as _,b as U,a as M,d as r,h as a,w as n,l as C,t as A,F as Y,g as k,K as J,P as K,L as W,u as G,M as H,R as q,S as X,x as Z,y as ee,N as oe,_ as te,Q as ae,W as le,Y as ne,V as se}from"./toastservice.esm-484a3f44.js";import{d as ie,c as re}from"./pinia-ef13c18a.js";import"./blockui.esm-a8e59b90.js";import{a as ce}from"./datatable.esm-70b25cd4.js";import{D as pe,s as ue}from"./dialogservice.esm-548272f5.js";import{C as de}from"./confirmationservice.esm-c218b510.js";import{s as me}from"./progressspinner.esm-b12f0644.js";import{s as ve}from"./row.esm-6ebc942e.js";import{s as fe}from"./calendar.esm-17a99f33.js";import{h as ge}from"./moment-fbc5633a.js";import{s as be}from"./checkbox.esm-9d272dae.js";import{s as he}from"./tag.esm-18fe182e.js";import{a as D}from"./index-362795f3.js";import{m as we}from"./map-a1368670.js";import{S as Se}from"./Service-0a78a223.js";import{L as ye}from"./LoadingSpinner-e46f55f6.js";import"./_baseToString-68774409.js";/* empty css                                                                       */import"./_plugin-vue_export-helper-c27b6911.js";const _e=ie("EmpDetailApprovalsStore",()=>{const b=p(),m=p();async function i(){m.value=!0,await D.get("/fetch-proof-doc").then(f=>{console.log(f.data),b.value=f.data,console.log(b.value)}).finally(()=>{m.value=!1})}return{array_EmpDetails_list:b,canShowLoadingScreen:m,getEmpDetails_list:i}}),Ce={class:"w-full p-2"},Ae=r("h1",{class:"font-semibold text-lg mb-2"},"Employee Details ",-1),ke={class:"confirmation-content"},De={class:"confirmation-content"},Re=r("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Ee=["src","alt"],xe={__name:"EmpDetails_approvals",setup(b){const m=Se(),i=_e(),f=p([]),h=p(),w=p(!1),S=p(!1);let s=null,v=null;const V=p(!1),R=p(!1),E=p();z(async()=>{await i.getEmpDetails_list()}),p({global:{value:null,matchMode:g.CONTAINS},name:{value:null,matchMode:g.STARTS_WITH,matchMode:g.EQUALS,matchMode:g.CONTAINS},status:{value:"Pending",matchMode:g.EQUALS}});const I=t=>{R.value=!0,D.post("view/getEmpProfileProofPrivateDoc",{emp_doc_record_id:t}).then(e=>{console.log(e.data.data),E.value=e.data.data,console.log("data sent",E.value)}).finally(()=>{})};function P(t,e){S.value=!0,s=e,v=t,console.log("Selected Bulk Row Data : "+JSON.stringify(t))}function y(){s="",v=null}function L(t){S.value=!1,t&&y()}function B(t){w.value=!1,t&&y()}const N=(t,e)=>{w.value=!0,s=e,v=t},F=()=>{i.canShowLoadingScreen=!0,B();let t=we(v,"record_id");console.log("Processing Rowdata : "+JSON.stringify(v.documents)),console.log("currentlySelectedStatus : "+s),console.log("Processed doc record ids : "+t),D.post("/approvals/EmployeeProof-bulkdocs-approve-reject",{approver_user_id:m.current_user_id,record_id:t,status:s=="Approve"?"Approved":s=="Reject"?"Rejected":s,reviewer_comments:""}).then(e=>{console.log("testing data",e.data)}).finally(()=>{i.canShowLoadingScreen=!1,i.getEmpDetails_list(),y()})};function O(){i.canShowLoadingScreen=!0,L(),D.post("/approvals/EmployeeProof-docs-approve-reject",{approver_user_id:m.current_user_id,record_id:v.record_id,status:s=="Approve"?"Approved":s=="Reject"?"Rejected":s,reviewer_comments:""}).then(t=>{console.log("testing data",t.data)}).finally(()=>{i.canShowLoadingScreen=!1,y(),i.getEmpDetails_list()})}return(t,e)=>{const u=k("Button"),x=k("Dialog"),c=k("Column"),T=k("DataTable");return $(),Q(Y,null,[_(i).canShowLoadingScreen?($(),U(ye,{key:0,class:"absolute z-50 bg-white"})):M("",!0),r("div",Ce,[Ae,a(x,{header:"Confirmation",visible:w.value,"onUpdate:visible":e[2]||(e[2]=l=>w.value=l),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"580px"},modal:!0},{footer:n(()=>[a(u,{label:"Yes",icon:"pi pi-check",onClick:e[0]||(e[0]=l=>F()),class:"p-button-text",autofocus:""}),a(u,{label:"No",icon:"pi pi-times",onClick:e[1]||(e[1]=l=>B(!0)),class:"p-button-text"})]),default:n(()=>[r("div",ke,[C(" Documents Approvals "),r("span",null,"Are you sure you want to "+A(_(s))+" all the documents of this employee?",1)])]),_:1},8,["visible"]),a(x,{header:"Confirmation",visible:S.value,"onUpdate:visible":e[5]||(e[5]=l=>S.value=l),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:n(()=>[a(u,{label:"Yes",icon:"pi pi-check",onClick:e[3]||(e[3]=l=>O()),class:"p-button-text",autofocus:""}),a(u,{label:"No",icon:"pi pi-times",onClick:e[4]||(e[4]=l=>L(!0)),class:"p-button-text"})]),default:n(()=>[r("div",De,[Re,r("span",null,"Are you sure you want to "+A(_(s))+"?",1)])]),_:1},8,["visible"]),a(T,{value:_(i).array_EmpDetails_list,paginator:!0,rows:10,class:"",dataKey:"user_code",onRowExpand:t.onRowExpand,onRowCollapse:t.onRowCollapse,expandedRows:f.value,"onUpdate:expandedRows":e[7]||(e[7]=l=>f.value=l),selection:h.value,"onUpdate:selection":e[8]||(e[8]=l=>h.value=l),selectAll:t.selectAll,onSelectAllChange:t.onSelectAllChange,onRowSelect:t.onRowSelect,onRowUnselect:t.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{empty:n(()=>[C(" No Employee Details documents for the selected status filter ")]),expansion:n(l=>[r("div",null,[a(T,{value:l.data.documents,responsiveLayout:"scroll",selection:h.value,"onUpdate:selection":e[6]||(e[6]=d=>h.value=d),selectAll:t.selectAll,onSelectAllChange:t.onSelectAllChange},{default:n(()=>[a(c,{field:"doc_name",header:"Document Name"},{default:n(()=>[C(A(l.data.doc_name),1)]),_:2},1024),a(c,{field:"doc_status",header:"Status"}),a(c,{field:"",header:"View"},{body:n(d=>[a(u,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"View",onClick:j=>I(d.data.record_id),style:{height:"2em"}},null,8,["onClick"])]),_:2},1024),a(c,{field:"",header:"Action"},{body:n(d=>[r("span",null,[a(u,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:j=>P(d.data,"Approve"),style:{height:"2.5em"}},null,8,["onClick"]),a(u,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2.5em"},onClick:j=>P(d.data,"Reject")},null,8,["onClick"])])]),_:2},1024)]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:n(()=>[a(c,{expander:!0}),a(c,{selectionMode:"multiple",style:{width:"1rem"},exportable:!1}),a(c,{field:"user_code",header:"Employee Id",sortable:""}),a(c,{field:"name",header:"Employee Name"}),a(c,{field:"doc_status",header:"Approval Status",sortable:!1},{body:n(({data:l})=>[C(A(l.doc_status),1)]),_:1}),a(c,{field:"",header:"Action"},{body:n(l=>[r("span",null,[a(u,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve All",onClick:d=>N(l.data.documents,"Approve"),style:{height:"2.5em"}},null,8,["onClick"]),a(u,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject All",style:{"margin-left":"8px",height:"2.5em"},onClick:d=>N(l.data.documents,"Reject")},null,8,["onClick"])])]),_:1})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"]),V.value==!1?($(),U(x,{key:0,visible:R.value,"onUpdate:visible":e[9]||(e[9]=l=>R.value=l),class:"z-0",modal:"",header:"Documents",style:{width:"40vw"}},{default:n(()=>[r("img",{src:`data:image/png;base64,${E.value}`,alt:t.doc_url,class:"block pb-3 m-auto"},null,8,Ee)]),_:1},8,["visible"])):M("",!0)])],64)}}},o=J(xe),$e=re();o.use(K,{ripple:!0});o.use(de);o.use(W);o.use(pe);o.use($e);o.directive("tooltip",G);o.directive("badge",H);o.directive("ripple",q);o.directive("styleclass",X);o.directive("focustrap",Z);o.component("Button",ee);o.component("DataTable",ce);o.component("Column",oe);o.component("ColumnGroup",ue);o.component("Row",ve);o.component("Toast",te);o.component("ConfirmDialog",ae);o.component("Dropdown",le);o.component("InputText",ne);o.component("Dialog",se);o.component("ProgressSpinner",me);o.component("Calendar",fe);o.component("moment",ge);o.component("Checkbox",be);o.component("Tag",he);o.mount("#EmpDetails_approvals");
========
/* empty css              *//* empty css                     *//* empty css                   */import{I as p,aj as z,ae as g,o as $,c as J,ai as _,b as U,a as M,d as r,h as a,w as n,l as C,t as A,F as Q,g as D,J as Y,P as K,K as G,u as H,L as W,R as X,S as q,x as Z,y as ee,M as oe,Y as te,N as ae,V as le,X as ne,Q as se}from"./toastservice.esm-918560db.js";import{d as ie,c as re}from"./pinia-3f44ac08.js";import"./blockui.esm-af7169c2.js";import{a as ce}from"./datatable.esm-b98720f6.js";import{D as pe,s as ue}from"./dialogservice.esm-5dbb3ad8.js";import{C as de}from"./confirmationservice.esm-87248870.js";import{s as me}from"./progressspinner.esm-aabe5d1a.js";import{s as ve}from"./row.esm-6ebc942e.js";import{s as fe}from"./calendar.esm-b58ab31f.js";import{h as ge}from"./moment-fbc5633a.js";import{s as be}from"./checkbox.esm-6e395b34.js";import{s as he}from"./tag.esm-77212dd0.js";import{a as k}from"./index-362795f3.js";import{m as we}from"./map-a1368670.js";import{S as Se}from"./Service-ff2a1406.js";import{L as ye}from"./LoadingSpinner-b9c763e9.js";import"./_baseToString-68774409.js";/* empty css                                                                       */import"./_plugin-vue_export-helper-c27b6911.js";const _e=ie("EmpDetailApprovalsStore",()=>{const b=p(),m=p();async function i(){m.value=!0,await k.get("/fetch-proof-doc").then(f=>{console.log(f.data),b.value=f.data,console.log(b.value)}).finally(()=>{m.value=!1})}return{array_EmpDetails_list:b,canShowLoadingScreen:m,getEmpDetails_list:i}}),Ce={class:"w-full p-2"},Ae=r("h1",{class:"font-semibold text-lg mb-2"},"Employee Details ",-1),De={class:"confirmation-content"},ke={class:"confirmation-content"},Re=r("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Ee=["src","alt"],xe={__name:"EmpDetails_approvals",setup(b){const m=Se(),i=_e(),f=p([]),h=p(),w=p(!1),S=p(!1);let s=null,v=null;const V=p(!1),R=p(!1),E=p();z(async()=>{await i.getEmpDetails_list()}),p({global:{value:null,matchMode:g.CONTAINS},name:{value:null,matchMode:g.STARTS_WITH,matchMode:g.EQUALS,matchMode:g.CONTAINS},status:{value:"Pending",matchMode:g.EQUALS}});const I=t=>{R.value=!0,k.post("view/getEmpProfileProofPrivateDoc",{emp_doc_record_id:t}).then(e=>{console.log(e.data.data),E.value=e.data.data,console.log("data sent",E.value)}).finally(()=>{})};function P(t,e){S.value=!0,s=e,v=t,console.log("Selected Bulk Row Data : "+JSON.stringify(t))}function y(){s="",v=null}function L(t){S.value=!1,t&&y()}function B(t){w.value=!1,t&&y()}const N=(t,e)=>{w.value=!0,s=e,v=t},F=()=>{i.canShowLoadingScreen=!0,B();let t=we(v,"record_id");console.log("Processing Rowdata : "+JSON.stringify(v.documents)),console.log("currentlySelectedStatus : "+s),console.log("Processed doc record ids : "+t),k.post("/approvals/EmployeeProof-bulkdocs-approve-reject",{approver_user_id:m.current_user_id,record_id:t,status:s=="Approve"?"Approved":s=="Reject"?"Rejected":s,reviewer_comments:""}).then(e=>{console.log("testing data",e.data)}).finally(()=>{i.canShowLoadingScreen=!1,i.getEmpDetails_list(),y()})};function O(){i.canShowLoadingScreen=!0,L(),k.post("/approvals/EmployeeProof-docs-approve-reject",{approver_user_id:m.current_user_id,record_id:v.record_id,status:s=="Approve"?"Approved":s=="Reject"?"Rejected":s,reviewer_comments:""}).then(t=>{console.log("testing data",t.data)}).finally(()=>{i.canShowLoadingScreen=!1,y(),i.getEmpDetails_list()})}return(t,e)=>{const u=D("Button"),x=D("Dialog"),c=D("Column"),T=D("DataTable");return $(),J(Q,null,[_(i).canShowLoadingScreen?($(),U(ye,{key:0,class:"absolute z-50 bg-white"})):M("",!0),r("div",Ce,[Ae,a(x,{header:"Confirmation",visible:w.value,"onUpdate:visible":e[2]||(e[2]=l=>w.value=l),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"580px"},modal:!0},{footer:n(()=>[a(u,{label:"Yes",icon:"pi pi-check",onClick:e[0]||(e[0]=l=>F()),class:"p-button-text",autofocus:""}),a(u,{label:"No",icon:"pi pi-times",onClick:e[1]||(e[1]=l=>B(!0)),class:"p-button-text"})]),default:n(()=>[r("div",De,[C(" Documents Approvals "),r("span",null,"Are you sure you want to "+A(_(s))+" all the documents of this employee?",1)])]),_:1},8,["visible"]),a(x,{header:"Confirmation",visible:S.value,"onUpdate:visible":e[5]||(e[5]=l=>S.value=l),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:n(()=>[a(u,{label:"Yes",icon:"pi pi-check",onClick:e[3]||(e[3]=l=>O()),class:"p-button-text",autofocus:""}),a(u,{label:"No",icon:"pi pi-times",onClick:e[4]||(e[4]=l=>L(!0)),class:"p-button-text"})]),default:n(()=>[r("div",ke,[Re,r("span",null,"Are you sure you want to "+A(_(s))+"?",1)])]),_:1},8,["visible"]),a(T,{value:_(i).array_EmpDetails_list,paginator:!0,rows:10,class:"",dataKey:"user_code",onRowExpand:t.onRowExpand,onRowCollapse:t.onRowCollapse,expandedRows:f.value,"onUpdate:expandedRows":e[7]||(e[7]=l=>f.value=l),selection:h.value,"onUpdate:selection":e[8]||(e[8]=l=>h.value=l),selectAll:t.selectAll,onSelectAllChange:t.onSelectAllChange,onRowSelect:t.onRowSelect,onRowUnselect:t.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{empty:n(()=>[C(" No Employee Details documents for the selected status filter ")]),expansion:n(l=>[r("div",null,[a(T,{value:l.data.documents,responsiveLayout:"scroll",selection:h.value,"onUpdate:selection":e[6]||(e[6]=d=>h.value=d),selectAll:t.selectAll,onSelectAllChange:t.onSelectAllChange},{default:n(()=>[a(c,{field:"doc_name",header:"Document Name"},{default:n(()=>[C(A(l.data.doc_name),1)]),_:2},1024),a(c,{field:"doc_status",header:"Status"}),a(c,{field:"",header:"View"},{body:n(d=>[a(u,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"View",onClick:j=>I(d.data.record_id),style:{height:"2em"}},null,8,["onClick"])]),_:2},1024),a(c,{field:"",header:"Action"},{body:n(d=>[r("span",null,[a(u,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:j=>P(d.data,"Approve"),style:{height:"2.5em"}},null,8,["onClick"]),a(u,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2.5em"},onClick:j=>P(d.data,"Reject")},null,8,["onClick"])])]),_:2},1024)]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:n(()=>[a(c,{expander:!0}),a(c,{selectionMode:"multiple",style:{width:"1rem"},exportable:!1}),a(c,{field:"user_code",header:"Employee Id",sortable:""}),a(c,{field:"name",header:"Employee Name"}),a(c,{field:"doc_status",header:"Approval Status",sortable:!1},{body:n(({data:l})=>[C(A(l.doc_status),1)]),_:1}),a(c,{field:"",header:"Action"},{body:n(l=>[r("span",null,[a(u,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve All",onClick:d=>N(l.data.documents,"Approve"),style:{height:"2.5em"}},null,8,["onClick"]),a(u,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject All",style:{"margin-left":"8px",height:"2.5em"},onClick:d=>N(l.data.documents,"Reject")},null,8,["onClick"])])]),_:1})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"]),V.value==!1?($(),U(x,{key:0,visible:R.value,"onUpdate:visible":e[9]||(e[9]=l=>R.value=l),class:"z-0",modal:"",header:"Documents",style:{width:"40vw"}},{default:n(()=>[r("img",{src:`data:image/png;base64,${E.value}`,alt:t.doc_url,class:"block pb-3 m-auto"},null,8,Ee)]),_:1},8,["visible"])):M("",!0)])],64)}}},o=Y(xe),$e=re();o.use(K,{ripple:!0});o.use(de);o.use(G);o.use(pe);o.use($e);o.directive("tooltip",H);o.directive("badge",W);o.directive("ripple",X);o.directive("styleclass",q);o.directive("focustrap",Z);o.component("Button",ee);o.component("DataTable",ce);o.component("Column",oe);o.component("ColumnGroup",ue);o.component("Row",ve);o.component("Toast",te);o.component("ConfirmDialog",ae);o.component("Dropdown",le);o.component("InputText",ne);o.component("Dialog",se);o.component("ProgressSpinner",me);o.component("Calendar",fe);o.component("moment",ge);o.component("Checkbox",be);o.component("Tag",he);o.mount("#EmpDetails_approvals");
>>>>>>>> 237d19c5ffee36de41bab4c7a2021b17a0b77bc6:dist/assets/EmpDetails_approvals-5ddd7c20.js
