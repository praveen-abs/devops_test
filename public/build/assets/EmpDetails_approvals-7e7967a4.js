/* empty css              */import{$ as p,I as F,af as g,o as j,c as J,h as a,w as n,aj as h,d as r,l as D,t as k,b as Q,a as Y,g as w,J as z,P as H,K,u as W,L as G,R as X,S as q,x as Z,y as ee,M as oe,Y as te,N as ae,V as le,X as ne,Q as se}from"./toastservice.esm-134e08fe.js";import{d as ie,c as re}from"./pinia-c1aabf4a.js";import"./blockui.esm-295a960b.js";import{a as ce}from"./datatable.esm-fbdcd6d6.js";import{D as pe,s as de}from"./dialogservice.esm-2c10dc9f.js";import{C as ue}from"./confirmationservice.esm-bbe3e128.js";import{s as me}from"./progressspinner.esm-bde8140b.js";import{s as ve}from"./row.esm-6ebc942e.js";import{s as fe}from"./calendar.esm-f9446500.js";import{h as ge}from"./moment-fbc5633a.js";import{s as he}from"./checkbox.esm-29351c04.js";import{s as we}from"./tag.esm-b89aee65.js";import{a as R}from"./index-362795f3.js";import{m as be}from"./map-a1368670.js";import{S as Se}from"./Service-c397fabe.js";import"./_baseToString-68774409.js";const ye=ie("EmpDetailApprovalsStore",()=>{const b=p(),m=p();async function s(){m.value=!0,await R.get("/fetch-proof-doc").then(f=>{console.log(f.data),b.value=f.data,console.log(b.value)}).finally(()=>{m.value=!1})}return{array_EmpDetails_list:b,canShowLoadingScreen:m,getEmpDetails_list:s}}),_e=r("h1",{class:"fw-semibold fs-4 mb-5"},"Employee Details ",-1),Ce=r("h5",{style:{"text-align":"center"}},"Please wait...",-1),Ae={class:"confirmation-content"},De={class:"confirmation-content"},ke=r("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Re=["src","alt"],xe={__name:"EmpDetails_approvals",setup(b){const m=Se(),s=ye(),f=p([]),S=p(),y=p(!1),_=p(!1);let i=null,v=null;const U=p(!1),x=p(!1),E=p();F(async()=>{await s.getEmpDetails_list()}),p({global:{value:null,matchMode:g.CONTAINS},name:{value:null,matchMode:g.STARTS_WITH,matchMode:g.EQUALS,matchMode:g.CONTAINS},status:{value:"Pending",matchMode:g.EQUALS}});const M=t=>{x.value=!0,R.post("view/getEmpProfileProofPrivateDoc",{emp_doc_record_id:t}).then(e=>{console.log(e.data.data),E.value=e.data.data,console.log("data sent",E.value)}).finally(()=>{})};function P(t,e){_.value=!0,i=e,v=t,console.log("Selected Bulk Row Data : "+JSON.stringify(t))}function C(){i="",v=null}function $(t){_.value=!1,t&&C()}function L(t){y.value=!1,t&&C()}const B=(t,e)=>{y.value=!0,i=e,v=t},V=()=>{s.canShowLoadingScreen=!0,L();let t=be(v,"record_id");console.log("Processing Rowdata : "+JSON.stringify(v.documents)),console.log("currentlySelectedStatus : "+i),console.log("Processed doc record ids : "+t),R.post("/approvals/EmployeeProof-bulkdocs-approve-reject",{approver_user_id:m.current_user_id,record_id:t,status:i=="Approve"?"Approved":i=="Reject"?"Rejected":i,reviewer_comments:""}).then(e=>{console.log("testing data",e.data)}).finally(()=>{s.canShowLoadingScreen=!1,s.getEmpDetails_list(),C()})};function I(){s.canShowLoadingScreen=!0,$(),R.post("/approvals/EmployeeProof-docs-approve-reject",{approver_user_id:m.current_user_id,record_id:v.record_id,status:i=="Approve"?"Approved":i=="Reject"?"Rejected":i,reviewer_comments:""}).then(t=>{console.log("testing data",t.data)}).finally(()=>{s.canShowLoadingScreen=!1,C(),s.getEmpDetails_list()})}return(t,e)=>{const O=w("ProgressSpinner"),A=w("Dialog"),d=w("Button"),c=w("Column"),N=w("DataTable");return j(),J("div",null,[_e,a(A,{header:"Header",visible:h(s).canShowLoadingScreen,"onUpdate:visible":e[0]||(e[0]=l=>h(s).canShowLoadingScreen=l),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:n(()=>[a(O,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:n(()=>[Ce]),_:1},8,["visible"]),a(A,{header:"Confirmation",visible:y.value,"onUpdate:visible":e[3]||(e[3]=l=>y.value=l),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"580px"},modal:!0},{footer:n(()=>[a(d,{label:"Yes",icon:"pi pi-check",onClick:e[1]||(e[1]=l=>V()),class:"p-button-text",autofocus:""}),a(d,{label:"No",icon:"pi pi-times",onClick:e[2]||(e[2]=l=>L(!0)),class:"p-button-text"})]),default:n(()=>[r("div",Ae,[D(" Documents Approvals "),r("span",null,"Are you sure you want to "+k(h(i))+" all the documents of this employee?",1)])]),_:1},8,["visible"]),a(A,{header:"Confirmation",visible:_.value,"onUpdate:visible":e[6]||(e[6]=l=>_.value=l),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:n(()=>[a(d,{label:"Yes",icon:"pi pi-check",onClick:e[4]||(e[4]=l=>I()),class:"p-button-text",autofocus:""}),a(d,{label:"No",icon:"pi pi-times",onClick:e[5]||(e[5]=l=>$(!0)),class:"p-button-text"})]),default:n(()=>[r("div",De,[ke,r("span",null,"Are you sure you want to "+k(h(i))+"?",1)])]),_:1},8,["visible"]),a(N,{value:h(s).array_EmpDetails_list,paginator:!0,rows:10,class:"",dataKey:"user_code",onRowExpand:t.onRowExpand,onRowCollapse:t.onRowCollapse,expandedRows:f.value,"onUpdate:expandedRows":e[8]||(e[8]=l=>f.value=l),selection:S.value,"onUpdate:selection":e[9]||(e[9]=l=>S.value=l),selectAll:t.selectAll,onSelectAllChange:t.onSelectAllChange,onRowSelect:t.onRowSelect,onRowUnselect:t.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{empty:n(()=>[D(" No Employee Details documents for the selected status filter ")]),expansion:n(l=>[r("div",null,[a(N,{value:l.data.documents,responsiveLayout:"scroll",selection:S.value,"onUpdate:selection":e[7]||(e[7]=u=>S.value=u),selectAll:t.selectAll,onSelectAllChange:t.onSelectAllChange},{default:n(()=>[a(c,{field:"doc_name",header:"Document Name"},{default:n(()=>[D(k(l.data.doc_name),1)]),_:2},1024),a(c,{field:"doc_status",header:"Status"}),a(c,{field:"",header:"View"},{body:n(u=>[a(d,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"View",onClick:T=>M(u.data.record_id),style:{height:"2em"}},null,8,["onClick"])]),_:2},1024),a(c,{field:"",header:"Action"},{body:n(u=>[r("span",null,[a(d,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:T=>P(u.data,"Approve"),style:{height:"2.5em"}},null,8,["onClick"]),a(d,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2.5em"},onClick:T=>P(u.data,"Reject")},null,8,["onClick"])])]),_:2},1024)]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:n(()=>[a(c,{expander:!0}),a(c,{selectionMode:"multiple",style:{width:"1rem"},exportable:!1}),a(c,{field:"user_code",header:"Employee Id",sortable:""}),a(c,{field:"name",header:"Employee Name"}),a(c,{field:"doc_status",header:"Approval Status",sortable:!1},{body:n(({data:l})=>[D(k(l.doc_status),1)]),_:1}),a(c,{field:"",header:"Action"},{body:n(l=>[r("span",null,[a(d,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve All",onClick:u=>B(l.data.documents,"Approve"),style:{height:"2.5em"}},null,8,["onClick"]),a(d,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject All",style:{"margin-left":"8px",height:"2.5em"},onClick:u=>B(l.data.documents,"Reject")},null,8,["onClick"])])]),_:1})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"]),U.value==!1?(j(),Q(A,{key:0,visible:x.value,"onUpdate:visible":e[10]||(e[10]=l=>x.value=l),class:"z-0",modal:"",header:"Documents",style:{width:"40vw"}},{default:n(()=>[r("img",{src:`data:image/png;base64,${E.value}`,alt:t.doc_url,class:"block pb-3 m-auto"},null,8,Re)]),_:1},8,["visible"])):Y("",!0)])}}},o=z(xe),Ee=re();o.use(H,{ripple:!0});o.use(ue);o.use(K);o.use(pe);o.use(Ee);o.directive("tooltip",W);o.directive("badge",G);o.directive("ripple",X);o.directive("styleclass",q);o.directive("focustrap",Z);o.component("Button",ee);o.component("DataTable",ce);o.component("Column",oe);o.component("ColumnGroup",de);o.component("Row",ve);o.component("Toast",te);o.component("ConfirmDialog",ae);o.component("Dropdown",le);o.component("InputText",ne);o.component("Dialog",se);o.component("ProgressSpinner",me);o.component("Calendar",fe);o.component("moment",ge);o.component("Checkbox",he);o.component("Tag",we);o.mount("#EmpDetails_approvals");
