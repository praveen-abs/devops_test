import{a as k}from"./index-362795f3.js";import{r as i,y as I,o as Q,c as b,e as $,f as G,n as l,h as u,k as H,j as K,g as n,l as s,L as j,F as W,t as y,i as C,R as h}from"./app-140571a9.js";import{d as q}from"./dayjs.min-2f06af28.js";import{m as X}from"./map-c58f9075.js";import{L as Z}from"./LoadingSpinner-1736c900.js";/* empty css                                                                       */const ee={class:"w-full"},te=n("div",{class:"flex justify-between my-2"},[n("h6",{class:"mb-3 text-lg font-semibold"},"Documents Approvals")],-1),oe={class:"confirmation-content"},le=n("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),se={class:"confirmation-content"},ne=n("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),ae={class:"confirmation-content"},ie=n("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),ce={class:"orders-subtable"},re=["src","alt"],de=["src","alt"],we={__name:"review_document",setup(ue){const A=i(!1);let R=i(),v=i(!1),f=i(!1),S=i(!1),p=i(!1);const E=I(),P=i([]),_=i(),x=i(),J=t=>{A.value=!0,k.post("/view-profile-private-file",{emp_doc_record_id:t}).then(e=>{console.log(e.data.data),x.value=e.data.data,console.log("data sent",x.value)})};i({global:{value:null,matchMode:h.CONTAINS},name:{value:null,matchMode:h.STARTS_WITH,matchMode:h.EQUALS,matchMode:h.CONTAINS},status:{value:"Pending",matchMode:h.EQUALS}}),i(["Pending","Approved","Rejected"]);let a=null,m=null;Q(()=>{R.value=[],D()});function D(){p.value=!0,k.get("/fetch-onboarded-doc").then(t=>{R.value=t.data}).finally(()=>{p.value=!1})}function B(t,e){v.value=!0,a=e,m=t,console.log("Selected Row Data : "+JSON.stringify(t))}function L(t,e){f.value=!0,a=e,m=t,console.log("Selected Bulk Row Data : "+JSON.stringify(t))}function T(t){v.value=!1,t&&g()}function N(t){f.value=!1,t&&g()}function g(){a="",m=null}i();function V(){T(!1),p.value=!0,console.log("Processing Rowdata : "+JSON.stringify(m)),console.log("currentlySelectedStatus : "+a),k.post("/approvals/onboarding-docs-approve-reject",{record_id:m.record_id,status:a=="Approve"?"Approved":a=="Reject"?"Rejected":a,reviewer_comments:""}).then(t=>{console.log(t.data),D(),E.add({severity:"success",summary:"Status",detail:"Processed Successfully !",life:3e3}),g()}).catch(t=>{p.value=!1,g(),console.log(t.toJSON())})}function U(){N(!1),p.value=!0,console.log("Processing Rowdata : "+JSON.stringify(m.documents)),console.log("currentlySelectedStatus : "+a);let t=X(m.documents,"record_id");console.log("Processed doc record ids : "+t),k.post("/approvals/onboarding-bulkdocs-approve-reject",{record_ids:t,status:a=="Approve"?"Approved":a=="Reject"?"Rejected":a,reviewer_comments:""}).then(e=>{console.log(e.data),D(),p.value=!1,g()}).catch(e=>{p.value=!1,g(),console.log(e.toJSON())})}const Y=t=>{switch(t){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};return(t,e)=>{const z=b("Toast"),c=b("Button"),w=b("Dialog"),r=b("Column"),F=b("Tag"),M=b("DataTable");return $(),G(W,null,[l(z),u(p)?($(),H(Z,{key:0,class:"absolute z-50 bg-white"})):K("",!0),n("div",ee,[te,n("div",null,[l(w,{header:"Confirmation",visible:u(v),"onUpdate:visible":e[2]||(e[2]=o=>j(v)?v.value=o:v=o),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:s(()=>[l(c,{label:"Yes",icon:"pi pi-check",onClick:e[0]||(e[0]=o=>V()),class:"p-button-text",autofocus:""}),l(c,{label:"No",icon:"pi pi-times",onClick:e[1]||(e[1]=o=>T(!0)),class:"p-button-text"})]),default:s(()=>[n("div",oe,[le,n("span",null,"Are you sure you want to "+y(u(a))+"?",1)])]),_:1},8,["visible"]),l(w,{header:"Confirmation",visible:u(f),"onUpdate:visible":e[5]||(e[5]=o=>j(f)?f.value=o:f=o),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"580px"},modal:!0},{footer:s(()=>[l(c,{label:"Yes",icon:"pi pi-check",onClick:e[3]||(e[3]=o=>U()),class:"p-button-text",autofocus:""}),l(c,{label:"No",icon:"pi pi-times",onClick:e[4]||(e[4]=o=>N(!0)),class:"p-button-text"})]),default:s(()=>[n("div",se,[ne,n("span",null,"Are you sure you want to "+y(u(a))+" all the documents of this employee?",1)])]),_:1},8,["visible"]),l(w,{header:"Confirmation",visible:u(S),"onUpdate:visible":e[8]||(e[8]=o=>j(S)?S.value=o:S=o),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"580px"},modal:!0},{footer:s(()=>[l(c,{label:"Yes",icon:"pi pi-check",onClick:e[6]||(e[6]=o=>U()),class:"p-button-text",autofocus:""}),l(c,{label:"No",icon:"pi pi-times",onClick:e[7]||(e[7]=o=>N(!0)),class:"p-button-text"})]),default:s(()=>[n("div",ae,[ie,n("span",null,"Are you sure you want to "+y(u(a))+" all the documents of selected employees?",1)])]),_:1},8,["visible"]),n("div",null,[l(M,{value:u(R),paginator:!0,rows:10,class:"",dataKey:"user_code",onRowExpand:t.onRowExpand,onRowCollapse:t.onRowCollapse,expandedRows:P.value,"onUpdate:expandedRows":e[10]||(e[10]=o=>P.value=o),selection:_.value,"onUpdate:selection":e[11]||(e[11]=o=>_.value=o),selectAll:t.selectAll,onSelectAllChange:t.onSelectAllChange,onRowSelect:t.onRowSelect,onRowUnselect:t.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{empty:s(()=>[C(" No Onboarding documents for the selected status filter ")]),loading:s(()=>[C(" Loading employees data. Please wait. ")]),expansion:s(o=>[n("div",ce,[l(M,{value:o.data.documents,responsiveLayout:"scroll",selection:_.value,"onUpdate:selection":e[9]||(e[9]=d=>_.value=d),selectAll:t.selectAll,onSelectAllChange:t.onSelectAllChange},{default:s(()=>[l(r,{field:"doc_name",header:"Document Name"}),l(r,{field:"doc_status",header:"Status"},{body:s(({data:d})=>[l(F,{value:d.doc_status,severity:Y(d.doc_status)},null,8,["value","severity"])]),_:1}),l(r,{field:"",header:"View"},{body:s(d=>[l(c,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"View",onClick:O=>J(d.data.record_id),style:{height:"2em"}},null,8,["onClick"])]),_:2},1024),l(r,{field:"",header:"Action"},{body:s(d=>[n("span",null,[l(c,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:O=>B(d.data,"Approve"),style:{height:"2.5em"}},null,8,["onClick"]),l(c,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2.5em"},onClick:O=>B(d.data,"Reject")},null,8,["onClick"])])]),_:2},1024)]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:s(()=>[l(r,{expander:!0}),l(r,{selectionMode:"multiple",style:{width:"1rem"},exportable:!1}),l(r,{field:"user_code",header:"Employee Id",sortable:""}),l(r,{field:"name",header:"Employee Name"}),l(r,{class:"fontSize13px",field:"doj",header:"Date Of Joining"},{body:s(o=>[C(y(u(q)(o.data.doj).format("DD-MMM-YYYY")),1)]),_:1}),l(r,{class:"fontSize13px",field:"doc_status",header:"Approval Status",sortable:!1},{body:s(({data:o})=>[C(y(o.doc_status),1)]),_:1}),l(r,{field:"",header:"Action"},{body:s(o=>[n("span",null,[l(c,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve All",onClick:d=>L(o.data,"Approve"),style:{height:"2.5em"}},null,8,["onClick"]),l(c,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject All",style:{"margin-left":"8px",height:"2.5em"},onClick:d=>L(o.data,"Reject")},null,8,["onClick"])])]),_:1})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"])]),l(w,{visible:A.value,"onUpdate:visible":e[12]||(e[12]=o=>A.value=o),modal:"",header:"Documents",style:{width:"40vw"}},{default:s(()=>[n("img",{src:`data:image/png;base64,${x.value}`,alt:t.doc_url,class:"block pb-3 m-auto"},null,8,re)]),_:1},8,["visible"]),l(w,{visible:t.visible,"onUpdate:visible":e[13]||(e[13]=o=>t.visible=o),modal:"",header:"Documents",style:{width:"40vw"}},{default:s(()=>[n("img",{src:`http://127.0.0.1:8000/${t.doc_url}`,alt:t.doc_url,class:"block pb-3 m-auto"},null,8,de)]),_:1},8,["visible"])])])],64)}}};export{we as default};
