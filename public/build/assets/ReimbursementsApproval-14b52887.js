import{H as n,ag as Z,I as ee,c as B,h as o,w as s,e as r,k as v,b as te,a as O,af as w,a6 as F,F as oe,X as x,g as u,o as T,t as b,n as le,J as ae,P as se,K as ne,R as ie,u as re,v as de,Q as ce,L as ue,N as pe,A as me,M as ve}from"./toastservice.esm-b0df8430.js";/* empty css                 */import{T as fe,B as ge,S as be,b as _e,a as he}from"./styleclass.esm-c88657ea.js";import"./blockui.esm-7963e732.js";import{D as we}from"./dialogservice.esm-dfc08b41.js";import{u as ye,C as Se}from"./confirmationservice.esm-6f4a46b4.js";import{s as Ce}from"./progressspinner.esm-6cc3039f.js";import{s as xe}from"./row.esm-6ebc942e.js";import{s as Re}from"./columngroup.esm-9dd1458e.js";import{s as ke}from"./calendar.esm-d1eec60d.js";import{h as z}from"./moment-fbc5633a.js";import{s as Ae}from"./checkbox.esm-c0a707f1.js";import{a as I}from"./index-362795f3.js";const De=r("h5",null,"Do you want to approve all?",-1),Te={class:"flex justify-content-between align-items-center"},Pe={class:"flex justify-content-between align-items-center"},Ne=["disabled"],$e=r("i",{class:"fa fa-cog me-2"},null,-1),Ue=["disabled"],Me=r("i",{class:"fas fa-file-download me-2"},null,-1),Ve=r("h5",{style:{"text-align":"center"}},"Please wait...",-1),je=r("h5",{style:{"text-align":"center"}},"Please wait...",-1),Le={class:"confirmation-content"},Ee=r("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Be={key:0},Oe={class:"orders-subtable"},Fe={style:{"white-space":"nowrap"}},Ie={__name:"ReimbursementsApproval",setup(ze){let R=n(),f=n(!1),y=n(!1);const _=n(!1);ye();const Y=Z();n(!0);const P=n([]);n(!1),n(!1);const p=n();n(),n(!0),n({global:{value:null,matchMode:x.CONTAINS},name:{value:null,matchMode:x.STARTS_WITH,matchMode:x.EQUALS,matchMode:x.CONTAINS},status:{value:null,matchMode:x.EQUALS}});const H=n(["Pending","Approved","Rejected"]);let m=null,S=null;const J=n(!0);ee(()=>{R.value=[],g.value=new Date,console.log(g.value)});function N(l,t){f.value=!0,m=t,S=l,console.log("Selected Row Data : "+JSON.stringify(l))}function K(l,t){console.log(p.value),Object.values(p.value).forEach(i=>{console.log(i.employee_name)}),f.value=!0,m=t,S=l,console.log("Selected Row Data : "+JSON.stringify(l))}function $(l){f.value=!1,l&&D()}function D(){m="",S=null}const g=n(),C=n();n(!1);const k=n(!1),U=n(),M=()=>{let l=new Date(g.value),t=l.getFullYear(),h=l.getMonth()+1;console.log(g.value.toString()),console.log(U),_.value=!0,I.post(window.location.origin+"/fetch_all_reimbursements_as_groups",{selected_year:t,selected_month:h,selected_status:C.value}).then(i=>{console.log("data sent"),console.log("data from "+i.employee_name),R.value=i.data,U.value=i.data,_.value=!1}).catch(i=>{console.log(i)})},Q=()=>{let l=new Date(g.value);_.value=!0;let t=l.getFullYear(),h=l.getMonth()+1;J.value=!1;let i="/reports/generate-manager-reimbursements-reports?selected_year="+t+"&selected_month="+h+"&selected_status="+C.value+"&_token={{ csrf_token() }}";window.location=i,setTimeout(V,1e3)},V=()=>{_.value=!1};setTimeout(V,3e3);function W(){$(!1),console.log("Processing Rowdata : "+JSON.stringify(S)),console.log("currentlySelectedStatus : "+m),I.post(window.location.origin+"/reimbursements_bulk_approval",{reimbursement_id:S,status:m=="Approve"?"Approved":m=="Reject"?"Rejected":m,reviewer_comments:""}).then(l=>{console.log(l),M(),Y.add({severity:"success",summary:"",detail:" Successfully Approved !",life:3e3}),D()}).catch(l=>{y.value=!1,D(),console.log(l.toJSON())})}return n(),(l,t)=>{const h=u("Toast"),i=u("Button"),A=u("Dialog"),G=u("Calendar"),X=u("Dropdown"),j=u("ProgressSpinner"),d=u("Column"),q=u("InputText"),L=u("DataTable");return T(),B(oe,null,[o(h),o(A,{visible:k.value,"onUpdate:visible":t[2]||(t[2]=e=>k.value=e),modal:"",header:"Header",style:{width:"25vw"}},{footer:s(()=>[o(i,{label:"No",icon:"pi pi-times",onClick:t[0]||(t[0]=e=>k.value=!1),text:""}),o(i,{label:"Yes",icon:"pi pi-check",onClick:t[1]||(t[1]=e=>k.value=!1),autofocus:""})]),default:s(()=>[De]),_:1},8,["visible"]),r("div",Te,[r("div",Pe,[o(G,{modelValue:g.value,"onUpdate:modelValue":t[3]||(t[3]=e=>g.value=e),view:"month",dateFormat:"mm/yy",class:"",style:{border:"1px solid orange","border-radius":"7px"}},null,8,["modelValue"]),o(X,{modelValue:C.value,"onUpdate:modelValue":t[4]||(t[4]=e=>C.value=e),options:H.value,placeholder:"Status",class:"w-full mx-3 md:w-14rem",style:{border:"1px solid orange","border-radius":"7px"}},null,8,["modelValue","options"]),r("button",{label:"Submit",class:"btn btn-primary z-0",severity:"danger",disabled:!C.value!="",onClick:M},[$e,v(" Generate")],8,Ne)]),!p.value==""?(T(),te(i,{key:0,type:"button",icon:"pi pi-times-circle",severity:"danger",label:"Reject all",style:{height:"2.5em"},onClick:t[5]||(t[5]=e=>K(p.value,"Reject"))})):O("",!0),r("button",{class:"btn btn-primary z-0",disabled:w(R)=="",severity:"success",onClick:Q},[Me,v("Download")],8,Ue)]),r("div",null,[o(A,{header:"Header",visible:_.value,"onUpdate:visible":t[6]||(t[6]=e=>_.value=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[o(j,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[Ve]),_:1},8,["visible"]),o(A,{header:"Header",visible:w(y),"onUpdate:visible":t[7]||(t[7]=e=>F(y)?y.value=e:y=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[o(j,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[je]),_:1},8,["visible"]),o(A,{header:"Confirmation",visible:w(f),"onUpdate:visible":t[10]||(t[10]=e=>F(f)?f.value=e:f=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:s(()=>[o(i,{label:"Yes",icon:"pi pi-check",onClick:t[8]||(t[8]=e=>W()),class:"p-button-text",autofocus:""}),o(i,{label:"No",icon:"pi pi-times",onClick:t[9]||(t[9]=e=>$(!0)),class:"p-button-text"})]),default:s(()=>[r("div",Le,[Ee,r("span",null,"Are you sure you want to "+b(w(m))+"?",1)])]),_:1},8,["visible"]),r("div",null,[o(L,{value:w(R),paginator:!0,rows:10,class:"mt-6",dataKey:"user_id",onRowExpand:l.onRowExpand,onRowCollapse:l.onRowCollapse,expandedRows:P.value,"onUpdate:expandedRows":t[12]||(t[12]=e=>P.value=e),selection:p.value,"onUpdate:selection":t[13]||(t[13]=e=>p.value=e),selectAll:l.selectAll,onSelectAllChange:l.onSelectAllChange,onRowSelect:l.onRowSelect,onRowUnselect:l.onRowUnselect,paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{empty:s(()=>[v(" No Reimbursement data for the selected status filter ")]),loading:s(()=>[v(" Loading customers data. Please wait. ")]),expansion:s(e=>[r("div",Oe,[o(L,{value:e.data.reimbursement_data,responsiveLayout:"scroll",selection:p.value,"onUpdate:selection":t[11]||(t[11]=c=>p.value=c),selectAll:l.selectAll,onSelectAllChange:l.onSelectAllChange},{default:s(()=>[o(d,{field:"",header:"Date",sortable:""},{body:s(c=>[r("p",Fe,b(w(z)(c.data.date).format("DD-MMM-YYYY")),1)]),_:2},1024),o(d,{field:"from",header:"From"}),o(d,{field:"to",header:"To"}),o(d,{field:"user_comments",header:"Comments"}),o(d,{field:"vehicle_type",header:"Mode of transport"}),o(d,{class:"fontSize13px",field:"distance_travelled",header:"Distance Covered"}),o(d,{class:"fontSize13px",field:"total_expenses",header:"Total Expenses"},{body:s(c=>[v(b("₹ "+c.data.total_expenses),1)]),_:2},1024),o(d,{field:"status",header:"Status",sortable:""},{body:s(c=>[r("span",{class:le("order-badge order-"+c.data.status)},b(c.data.status),3)]),_:2},1024)]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:s(()=>[o(d,{expander:!0}),o(d,{selectionMode:"multiple",style:{width:"1rem"},exportable:!1}),o(d,{field:"user_code",header:"Employee Id",sortable:""}),o(d,{field:"name",header:"Employee Name"},{body:s(e=>[v(b(e.data.employee_name),1)]),filter:s(({filterModel:e,filterCallback:c})=>[o(q,{modelValue:e.value,"onUpdate:modelValue":E=>e.value=E,onInput:E=>c(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),o(d,{class:"fontSize13px",field:"total_distance_travelled",header:"Overall Distance Travelled",sortable:!1},{body:s(e=>[v(b(e.data.total_distance_travelled+" KM"),1)]),_:1}),o(d,{class:"fontSize13px",field:"total_expenses",header:"Overall Reimbursements",sortable:!1},{body:s(e=>[v(b("₹ "+e.data.total_expenses),1)]),_:1}),o(d,{field:"",header:"Action",style:{width:"15vw"}},{body:s(e=>[e.data.has_pending_reimbursements=="true"?(T(),B("span",Be,[o(i,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:c=>N(e.data,"Approve"),style:{height:"2.5em"}},null,8,["onClick"]),o(i,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2.5em"},onClick:c=>N(e.data,"Reject")},null,8,["onClick"])])):O("",!0)]),_:1})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"])])])],64)}}},a=ae(Ie);a.use(se,{ripple:!0});a.use(Se);a.use(ne);a.use(we);a.directive("tooltip",fe);a.directive("badge",ge);a.directive("ripple",ie);a.directive("styleclass",be);a.directive("focustrap",re);a.component("Button",de);a.component("DataTable",_e);a.component("Column",he);a.component("ColumnGroup",Re);a.component("Row",xe);a.component("Toast",ce);a.component("ConfirmDialog",ue);a.component("Dropdown",pe);a.component("InputText",me);a.component("Dialog",ve);a.component("ProgressSpinner",Ce);a.component("Calendar",ke);a.component("moment",z);a.component("Checkbox",Ae);a.mount("#vjs_reimbursementsApprovalTable");
