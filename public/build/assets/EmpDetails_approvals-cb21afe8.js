import{C as F,r as c,o as I,c as C,e as g,f as L,h,k as T,j as M,g as n,n as l,l as a,F as Q,i as k,t as v,p as Y,a1 as w}from"./app-97e3c529.js";import{a as R}from"./index-0d903406.js";import{m as H}from"./map-2f27cd09.js";import{S as K}from"./Service-a263ad12.js";import{L as W}from"./LoadingSpinner-34e5ba8a.js";/* empty css                                                                       */const q=F("EmpDetailApprovalsStore",()=>{const y=c(),u=c();async function i(){u.value=!0,await R.get("/fetch-proof-doc").then(f=>{console.log(f.data),y.value=f.data,console.log(y.value)}).finally(()=>{u.value=!1})}return{array_EmpDetails_list:y,canShowLoadingScreen:u,getEmpDetails_list:i}}),G={class:"w-full p-2"},X=n("h1",{class:"font-semibold text-lg mb-2"},"Employee Details ",-1),Z={class:"confirmation-content"},ee={class:"confirmation-content"},te=n("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),oe={class:"flex items-center !justify-center"},le=["src"],ae={class:"pl-2 font-semibold"},ne=["src","alt"],ue={__name:"EmpDetails_approvals",setup(y){const u=K(),i=q(),f=c([]),b=c(),_=c(!1),S=c(!1);let s=null,m=null;const O=c(!1),D=c(!1),x=c();I(async()=>{await i.getEmpDetails_list()}),c({global:{value:null,matchMode:w.CONTAINS},name:{value:null,matchMode:w.STARTS_WITH,matchMode:w.EQUALS,matchMode:w.CONTAINS},status:{value:"Pending",matchMode:w.EQUALS}});const V=o=>{D.value=!0,R.post("view/getEmpProfileProofPrivateDoc",{emp_doc_record_id:o}).then(e=>{console.log(e.data.data),x.value=e.data.data,console.log("data sent",x.value)}).finally(()=>{})};function N(o,e){S.value=!0,s=e,m=o,console.log("Selected Bulk Row Data : "+JSON.stringify(o))}function A(){s="",m=null}function B(o){S.value=!1,o&&A()}function j(o){_.value=!1,o&&A()}const P=(o,e)=>{_.value=!0,s=e,m=o},J=()=>{i.canShowLoadingScreen=!0,j();let o=H(m,"record_id");console.log("Processing Rowdata : "+JSON.stringify(m.documents)),console.log("currentlySelectedStatus : "+s),console.log("Processed doc record ids : "+o),R.post("/approvals/EmployeeProof-bulkdocs-approve-reject",{approver_user_id:u.current_user_id,record_id:o,status:s=="Approve"?"Approved":s=="Reject"?"Rejected":s,reviewer_comments:""}).then(e=>{console.log("testing data",e.data)}).finally(()=>{i.canShowLoadingScreen=!1,i.getEmpDetails_list(),A()})};function z(){i.canShowLoadingScreen=!0,B(),R.post("/approvals/EmployeeProof-docs-approve-reject",{approver_user_id:u.current_user_id,record_id:m.record_id,status:s=="Approve"?"Approved":s=="Reject"?"Rejected":s,reviewer_comments:""}).then(o=>{console.log("testing data",o.data)}).finally(()=>{i.canShowLoadingScreen=!1,A(),i.getEmpDetails_list()})}return(o,e)=>{const d=C("Button"),E=C("Dialog"),r=C("Column"),U=C("DataTable");return g(),L(Q,null,[h(i).canShowLoadingScreen?(g(),T(W,{key:0,class:"absolute z-50 bg-white"})):M("",!0),n("div",G,[X,l(E,{header:"Confirmation",visible:_.value,"onUpdate:visible":e[2]||(e[2]=t=>_.value=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"580px"},modal:!0},{footer:a(()=>[l(d,{label:"Yes",icon:"pi pi-check",onClick:e[0]||(e[0]=t=>J()),class:"p-button-text",autofocus:""}),l(d,{label:"No",icon:"pi pi-times",onClick:e[1]||(e[1]=t=>j(!0)),class:"p-button-text"})]),default:a(()=>[n("div",Z,[k(" Documents Approvals "),n("span",null,"Are you sure you want to "+v(h(s))+" all the documents of this employee?",1)])]),_:1},8,["visible"]),l(E,{header:"Confirmation",visible:S.value,"onUpdate:visible":e[5]||(e[5]=t=>S.value=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:a(()=>[l(d,{label:"Yes",icon:"pi pi-check",onClick:e[3]||(e[3]=t=>z()),class:"p-button-text",autofocus:""}),l(d,{label:"No",icon:"pi pi-times",onClick:e[4]||(e[4]=t=>B(!0)),class:"p-button-text"})]),default:a(()=>[n("div",ee,[te,n("span",null,"Are you sure you want to "+v(h(s))+"?",1)])]),_:1},8,["visible"]),l(U,{value:h(i).array_EmpDetails_list,paginator:!0,rows:10,class:"",dataKey:"user_code",onRowExpand:o.onRowExpand,onRowCollapse:o.onRowCollapse,expandedRows:f.value,"onUpdate:expandedRows":e[7]||(e[7]=t=>f.value=t),selection:b.value,"onUpdate:selection":e[8]||(e[8]=t=>b.value=t),selectAll:o.selectAll,onSelectAllChange:o.onSelectAllChange,onRowSelect:o.onRowSelect,onRowUnselect:o.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{empty:a(()=>[k(" No Employee Details documents for the selected status filter ")]),expansion:a(t=>[n("div",null,[l(U,{value:t.data.documents,responsiveLayout:"scroll",selection:b.value,"onUpdate:selection":e[6]||(e[6]=p=>b.value=p),selectAll:o.selectAll,onSelectAllChange:o.onSelectAllChange},{default:a(()=>[l(r,{field:"doc_name",header:"Document Name"},{default:a(()=>[k(v(t.data.doc_name),1)]),_:2},1024),l(r,{field:"doc_status",header:"Status"}),l(r,{field:"",header:"View"},{body:a(p=>[l(d,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"View",onClick:$=>V(p.data.record_id),style:{height:"2em"}},null,8,["onClick"])]),_:2},1024),l(r,{field:"",header:"Action"},{body:a(p=>[n("span",null,[l(d,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:$=>N(p.data,"Approve"),style:{height:"2.5em"}},null,8,["onClick"]),l(d,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2.5em"},onClick:$=>N(p.data,"Reject")},null,8,["onClick"])])]),_:2},1024)]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:a(()=>[l(r,{expander:!0}),l(r,{selectionMode:"multiple",style:{width:"1rem"},exportable:!1}),l(r,{field:"name",header:"Employee Name"},{body:a(t=>[n("div",oe,[n("div",null,[JSON.parse(t.data.avatar).type=="shortname"?(g(),L("p",{key:0,class:Y(["p-2 font-semibold text-white rounded-full w-[30px] text-[14px]",h(u).getBackgroundColor(t.index)])},v(JSON.parse(t.data.avatar).data),3)):(g(),L("img",{key:1,class:"rounded-circle userActive-status profile-img",style:{height:"30px !important",width:"30px !important"},src:`data:image/png;base64,${JSON.parse(t.data.avatar).data}`,srcset:"",alt:""},null,8,le))]),n("div",null,[n("p",ae,v(t.data.name),1)])])]),_:1}),l(r,{field:"user_code",header:"Employee Id",sortable:""}),l(r,{field:"doc_status",header:"Approval Status",sortable:!1},{body:a(({data:t})=>[k(v(t.doc_status),1)]),_:1}),l(r,{field:"",header:"Action"},{body:a(t=>[n("span",null,[l(d,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve All",onClick:p=>P(t.data.documents,"Approve"),style:{height:"2.5em"}},null,8,["onClick"]),l(d,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject All",style:{"margin-left":"8px",height:"2.5em"},onClick:p=>P(t.data.documents,"Reject")},null,8,["onClick"])])]),_:1})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"]),O.value==!1?(g(),T(E,{key:0,visible:D.value,"onUpdate:visible":e[9]||(e[9]=t=>D.value=t),class:"z-0",modal:"",header:"Documents",style:{width:"40vw"}},{default:a(()=>[n("img",{src:`data:image/png;base64,${x.value}`,alt:o.doc_url,class:"block pb-3 m-auto"},null,8,ne)]),_:1},8,["visible"])):M("",!0)])],64)}}};export{ue as default};
