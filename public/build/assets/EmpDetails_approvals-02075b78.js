import{p as I,r as c,o as z,b as _,d as x,e as Q,g as S,j as T,i as $,f as i,m as o,k as a,F as J,h as A,t as C,Q as f}from"./app-0f1d8729.js";import{a as k}from"./index-362795f3.js";import{m as Y}from"./map-c58f9075.js";import{S as H}from"./Service-8c132ee2.js";import{L as K}from"./LoadingSpinner-7a51f44f.js";/* empty css                                                                       */const W=I("EmpDetailApprovalsStore",()=>{const g=c(),u=c();async function s(){u.value=!0,await k.get("/fetch-proof-doc").then(v=>{console.log(v.data),g.value=v.data,console.log(g.value)}).finally(()=>{u.value=!1})}return{array_EmpDetails_list:g,canShowLoadingScreen:u,getEmpDetails_list:s}}),q={class:"w-full p-2"},G=i("h1",{class:"font-semibold text-lg mb-2"},"Employee Details ",-1),X={class:"confirmation-content"},Z={class:"confirmation-content"},ee=i("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),te=["src","alt"],re={__name:"EmpDetails_approvals",setup(g){const u=H(),s=W(),v=c([]),h=c(),w=c(!1),b=c(!1);let n=null,m=null;const M=c(!1),R=c(!1),D=c();z(async()=>{await s.getEmpDetails_list()}),c({global:{value:null,matchMode:f.CONTAINS},name:{value:null,matchMode:f.STARTS_WITH,matchMode:f.EQUALS,matchMode:f.CONTAINS},status:{value:"Pending",matchMode:f.EQUALS}});const V=t=>{R.value=!0,k.post("view/getEmpProfileProofPrivateDoc",{emp_doc_record_id:t}).then(e=>{console.log(e.data.data),D.value=e.data.data,console.log("data sent",D.value)}).finally(()=>{})};function L(t,e){b.value=!0,n=e,m=t,console.log("Selected Bulk Row Data : "+JSON.stringify(t))}function y(){n="",m=null}function P(t){b.value=!1,t&&y()}function N(t){w.value=!1,t&&y()}const B=(t,e)=>{w.value=!0,n=e,m=t},O=()=>{s.canShowLoadingScreen=!0,N();let t=Y(m,"record_id");console.log("Processing Rowdata : "+JSON.stringify(m.documents)),console.log("currentlySelectedStatus : "+n),console.log("Processed doc record ids : "+t),k.post("/approvals/EmployeeProof-bulkdocs-approve-reject",{approver_user_id:u.current_user_id,record_id:t,status:n=="Approve"?"Approved":n=="Reject"?"Rejected":n,reviewer_comments:""}).then(e=>{console.log("testing data",e.data)}).finally(()=>{s.canShowLoadingScreen=!1,s.getEmpDetails_list(),y()})};function F(){s.canShowLoadingScreen=!0,P(),k.post("/approvals/EmployeeProof-docs-approve-reject",{approver_user_id:u.current_user_id,record_id:m.record_id,status:n=="Approve"?"Approved":n=="Reject"?"Rejected":n,reviewer_comments:""}).then(t=>{console.log("testing data",t.data)}).finally(()=>{s.canShowLoadingScreen=!1,y(),s.getEmpDetails_list()})}return(t,e)=>{const d=_("Button"),E=_("Dialog"),r=_("Column"),j=_("DataTable");return x(),Q(J,null,[S(s).canShowLoadingScreen?(x(),T(K,{key:0,class:"absolute z-50 bg-white"})):$("",!0),i("div",q,[G,o(E,{header:"Confirmation",visible:w.value,"onUpdate:visible":e[2]||(e[2]=l=>w.value=l),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"580px"},modal:!0},{footer:a(()=>[o(d,{label:"Yes",icon:"pi pi-check",onClick:e[0]||(e[0]=l=>O()),class:"p-button-text",autofocus:""}),o(d,{label:"No",icon:"pi pi-times",onClick:e[1]||(e[1]=l=>N(!0)),class:"p-button-text"})]),default:a(()=>[i("div",X,[A(" Documents Approvals "),i("span",null,"Are you sure you want to "+C(S(n))+" all the documents of this employee?",1)])]),_:1},8,["visible"]),o(E,{header:"Confirmation",visible:b.value,"onUpdate:visible":e[5]||(e[5]=l=>b.value=l),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:a(()=>[o(d,{label:"Yes",icon:"pi pi-check",onClick:e[3]||(e[3]=l=>F()),class:"p-button-text",autofocus:""}),o(d,{label:"No",icon:"pi pi-times",onClick:e[4]||(e[4]=l=>P(!0)),class:"p-button-text"})]),default:a(()=>[i("div",Z,[ee,i("span",null,"Are you sure you want to "+C(S(n))+"?",1)])]),_:1},8,["visible"]),o(j,{value:S(s).array_EmpDetails_list,paginator:!0,rows:10,class:"",dataKey:"user_code",onRowExpand:t.onRowExpand,onRowCollapse:t.onRowCollapse,expandedRows:v.value,"onUpdate:expandedRows":e[7]||(e[7]=l=>v.value=l),selection:h.value,"onUpdate:selection":e[8]||(e[8]=l=>h.value=l),selectAll:t.selectAll,onSelectAllChange:t.onSelectAllChange,onRowSelect:t.onRowSelect,onRowUnselect:t.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{empty:a(()=>[A(" No Employee Details documents for the selected status filter ")]),expansion:a(l=>[i("div",null,[o(j,{value:l.data.documents,responsiveLayout:"scroll",selection:h.value,"onUpdate:selection":e[6]||(e[6]=p=>h.value=p),selectAll:t.selectAll,onSelectAllChange:t.onSelectAllChange},{default:a(()=>[o(r,{field:"doc_name",header:"Document Name"},{default:a(()=>[A(C(l.data.doc_name),1)]),_:2},1024),o(r,{field:"doc_status",header:"Status"}),o(r,{field:"",header:"View"},{body:a(p=>[o(d,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"View",onClick:U=>V(p.data.record_id),style:{height:"2em"}},null,8,["onClick"])]),_:2},1024),o(r,{field:"",header:"Action"},{body:a(p=>[i("span",null,[o(d,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:U=>L(p.data,"Approve"),style:{height:"2.5em"}},null,8,["onClick"]),o(d,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2.5em"},onClick:U=>L(p.data,"Reject")},null,8,["onClick"])])]),_:2},1024)]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:a(()=>[o(r,{expander:!0}),o(r,{selectionMode:"multiple",style:{width:"1rem"},exportable:!1}),o(r,{field:"user_code",header:"Employee Id",sortable:""}),o(r,{field:"name",header:"Employee Name"}),o(r,{field:"doc_status",header:"Approval Status",sortable:!1},{body:a(({data:l})=>[A(C(l.doc_status),1)]),_:1}),o(r,{field:"",header:"Action"},{body:a(l=>[i("span",null,[o(d,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve All",onClick:p=>B(l.data.documents,"Approve"),style:{height:"2.5em"}},null,8,["onClick"]),o(d,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject All",style:{"margin-left":"8px",height:"2.5em"},onClick:p=>B(l.data.documents,"Reject")},null,8,["onClick"])])]),_:1})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"]),M.value==!1?(x(),T(E,{key:0,visible:R.value,"onUpdate:visible":e[9]||(e[9]=l=>R.value=l),class:"z-0",modal:"",header:"Documents",style:{width:"40vw"}},{default:a(()=>[i("img",{src:`data:image/png;base64,${D.value}`,alt:t.doc_url,class:"block pb-3 m-auto"},null,8,te)]),_:1},8,["visible"])):$("",!0)])],64)}}};export{re as default};
