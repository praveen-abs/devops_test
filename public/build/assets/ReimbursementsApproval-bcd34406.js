/* empty css              */import{$ as n,ah as Z,af as x,I as ee,o as T,c as B,h as o,w as s,d as r,l as u,b as te,a as O,aj as w,a3 as F,t as f,n as oe,F as ae,g as p,J as le,P as se,K as ne,u as ie,L as re,R as de,S as ce,x as ue,y as pe,M as me,Y as ve,N as fe,V as be,X as ge,Q as _e}from"./toastservice.esm-134e08fe.js";/* empty css                 */import"./blockui.esm-295a960b.js";import{a as he}from"./datatable.esm-fbdcd6d6.js";import{D as we,s as ye}from"./dialogservice.esm-2c10dc9f.js";import{u as Se,C as Ce}from"./confirmationservice.esm-bbe3e128.js";import{s as xe}from"./progressspinner.esm-bde8140b.js";import{s as Re}from"./row.esm-6ebc942e.js";import{s as ke}from"./calendar.esm-f9446500.js";import{h as Y}from"./moment-fbc5633a.js";import{s as Ae}from"./checkbox.esm-29351c04.js";import{a as I}from"./index-362795f3.js";const De=r("h5",null,"Do you want to approve all?",-1),Te={class:"flex justify-content-between align-items-center"},Pe={class:"flex justify-content-between align-items-center"},$e=["disabled"],Ne=r("i",{class:"fa fa-cog me-2"},null,-1),Me=["disabled"],Ue=r("i",{class:"fas fa-file-download me-2"},null,-1),Ve=r("h5",{style:{"text-align":"center"}},"Please wait...",-1),je=r("h5",{style:{"text-align":"center"}},"Please wait...",-1),Le={class:"confirmation-content"},Ee=r("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Be={key:0},Oe={class:"orders-subtable"},Fe={style:{"white-space":"nowrap"}},Ie={__name:"ReimbursementsApproval",setup(Ye){let R=n(),b=n(!1),y=n(!1);const _=n(!1);Se();const z=Z();n(!0);const P=n([]);n(!1),n(!1);const m=n();n(),n(!0),n({global:{value:null,matchMode:x.CONTAINS},name:{value:null,matchMode:x.STARTS_WITH,matchMode:x.EQUALS,matchMode:x.CONTAINS},status:{value:null,matchMode:x.EQUALS}});const J=n(["Pending","Approved","Rejected"]);let v=null,S=null;const H=n(!0);ee(()=>{R.value=[],g.value=new Date,console.log(g.value)});function $(a,t){b.value=!0,v=t,S=a,console.log("Selected Row Data : "+JSON.stringify(a))}function K(a,t){console.log(m.value),Object.values(m.value).forEach(i=>{console.log(i.employee_name)}),b.value=!0,v=t,S=a,console.log("Selected Row Data : "+JSON.stringify(a))}function N(a){b.value=!1,a&&D()}function D(){v="",S=null}const g=n(),C=n();n(!1);const k=n(!1),M=n(),U=()=>{let a=new Date(g.value),t=a.getFullYear(),h=a.getMonth()+1;console.log(g.value.toString()),console.log(M),_.value=!0,I.post(window.location.origin+"/fetch_all_reimbursements_as_groups",{selected_year:t,selected_month:h,selected_status:C.value,selected_reimbursement_type:""}).then(i=>{console.log("data sent"),console.log("data from "+i.employee_name),R.value=i.data,M.value=i.data,_.value=!1}).catch(i=>{console.log(i)})},Q=()=>{let a=new Date(g.value);_.value=!0;let t=a.getFullYear(),h=a.getMonth()+1;H.value=!1;let i="/reports/generate-manager-reimbursements-reports?selected_year="+t+"&selected_month="+h+"&selected_status="+C.value+"&_token={{ csrf_token() }}";window.location=i,setTimeout(V,1e3)},V=()=>{_.value=!1};setTimeout(V,3e3);function W(){N(!1),console.log("Processing Rowdata : "+JSON.stringify(S)),console.log("currentlySelectedStatus : "+v),I.post(window.location.origin+"/reimbursements_bulk_approval",{reimbursement_id:S,status:v=="Approve"?"Approved":v=="Reject"?"Rejected":v,reviewer_comments:""}).then(a=>{console.log(a),U(),z.add({severity:"success",summary:"",detail:" Successfully Approved !",life:3e3}),D()}).catch(a=>{y.value=!1,D(),console.log(a.toJSON())})}return n(),(a,t)=>{const h=p("Toast"),i=p("Button"),A=p("Dialog"),G=p("Calendar"),X=p("Dropdown"),j=p("ProgressSpinner"),d=p("Column"),q=p("InputText"),L=p("DataTable");return T(),B(ae,null,[o(h),o(A,{visible:k.value,"onUpdate:visible":t[2]||(t[2]=e=>k.value=e),modal:"",header:"Header",style:{width:"25vw"}},{footer:s(()=>[o(i,{label:"No",icon:"pi pi-times",onClick:t[0]||(t[0]=e=>k.value=!1),text:""}),o(i,{label:"Yes",icon:"pi pi-check",onClick:t[1]||(t[1]=e=>k.value=!1),autofocus:""})]),default:s(()=>[De]),_:1},8,["visible"]),r("div",Te,[r("div",Pe,[o(G,{modelValue:g.value,"onUpdate:modelValue":t[3]||(t[3]=e=>g.value=e),view:"month",dateFormat:"mm/yy",class:"",style:{border:"1px solid orange","border-radius":"7px"}},null,8,["modelValue"]),o(X,{modelValue:C.value,"onUpdate:modelValue":t[4]||(t[4]=e=>C.value=e),options:J.value,placeholder:"Status",class:"w-full mx-3 md:w-14rem",style:{border:"1px solid orange","border-radius":"7px"}},null,8,["modelValue","options"]),r("button",{label:"Submit",class:"btn btn-primary z-0",severity:"danger",disabled:!C.value!="",onClick:U},[Ne,u(" Generate")],8,$e)]),!m.value==""?(T(),te(i,{key:0,type:"button",icon:"pi pi-times-circle",severity:"danger",label:"Reject all",style:{height:"2.5em"},onClick:t[5]||(t[5]=e=>K(m.value,"Reject"))})):O("",!0),r("button",{class:"btn btn-primary z-0",disabled:w(R)=="",severity:"success",onClick:Q},[Ue,u("Download")],8,Me)]),r("div",null,[o(A,{header:"Header",visible:_.value,"onUpdate:visible":t[6]||(t[6]=e=>_.value=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[o(j,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[Ve]),_:1},8,["visible"]),o(A,{header:"Header",visible:w(y),"onUpdate:visible":t[7]||(t[7]=e=>F(y)?y.value=e:y=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[o(j,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[je]),_:1},8,["visible"]),o(A,{header:"Confirmation",visible:w(b),"onUpdate:visible":t[10]||(t[10]=e=>F(b)?b.value=e:b=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:s(()=>[o(i,{label:"Yes",icon:"pi pi-check",onClick:t[8]||(t[8]=e=>W()),class:"p-button-text",autofocus:""}),o(i,{label:"No",icon:"pi pi-times",onClick:t[9]||(t[9]=e=>N(!0)),class:"p-button-text"})]),default:s(()=>[r("div",Le,[Ee,r("span",null,"Are you sure you want to "+f(w(v))+"?",1)])]),_:1},8,["visible"]),r("div",null,[o(L,{value:w(R),paginator:!0,rows:10,class:"mt-6",dataKey:"user_id",onRowExpand:a.onRowExpand,onRowCollapse:a.onRowCollapse,expandedRows:P.value,"onUpdate:expandedRows":t[12]||(t[12]=e=>P.value=e),selection:m.value,"onUpdate:selection":t[13]||(t[13]=e=>m.value=e),selectAll:a.selectAll,onSelectAllChange:a.onSelectAllChange,onRowSelect:a.onRowSelect,onRowUnselect:a.onRowUnselect,paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{empty:s(()=>[u(" No Reimbursement data for the selected status filter ")]),loading:s(()=>[u(" Loading customers data. Please wait. ")]),expansion:s(e=>[r("div",Oe,[o(L,{value:e.data.reimbursement_data,responsiveLayout:"scroll",selection:m.value,"onUpdate:selection":t[11]||(t[11]=c=>m.value=c),selectAll:a.selectAll,onSelectAllChange:a.onSelectAllChange},{default:s(()=>[o(d,{field:"",header:"Date",sortable:""},{body:s(c=>[r("p",Fe,f(w(Y)(c.data.date).format("DD-MMM-YYYY")),1)]),_:2},1024),o(d,{field:"reimbursement_type",header:"Reimbursement Type"}),o(d,{field:"from",header:"From"}),o(d,{field:"to",header:"To"}),o(d,{field:"user_comments",header:"Comments"}),o(d,{field:"vehicle_type",header:"Mode of transport"}),o(d,{class:"fontSize13px",field:"distance_travelled",header:"Distance Covered"},{body:s(c=>[u(f(c.data.distance_travelled+" KM(s)"),1)]),_:2},1024),o(d,{class:"fontSize13px",field:"total_expenses",header:"Total Expenses"},{body:s(c=>[u(f("₹ "+c.data.total_expenses),1)]),_:2},1024),o(d,{field:"status",header:"Status",sortable:""},{body:s(c=>[r("span",{class:oe("order-badge order-"+c.data.status)},f(c.data.status),3)]),_:2},1024)]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:s(()=>[o(d,{expander:!0}),o(d,{selectionMode:"multiple",style:{width:"1rem"},exportable:!1}),o(d,{field:"user_code",header:"Employee Id",sortable:""}),o(d,{field:"name",header:"Employee Name"},{body:s(e=>[u(f(e.data.employee_name),1)]),filter:s(({filterModel:e,filterCallback:c})=>[o(q,{modelValue:e.value,"onUpdate:modelValue":E=>e.value=E,onInput:E=>c(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),o(d,{class:"fontSize13px",field:"total_distance_travelled",header:"Overall Distance Travelled",sortable:!1},{body:s(e=>[u(f(e.data.total_distance_travelled+" KM(s)"),1)]),_:1}),o(d,{class:"fontSize13px",field:"total_expenses",header:"Overall Reimbursements",sortable:!1},{body:s(e=>[u(f("₹ "+e.data.total_expenses),1)]),_:1}),o(d,{field:"",header:"Action",style:{width:"15vw"}},{body:s(e=>[e.data.has_pending_reimbursements=="true"?(T(),B("span",Be,[o(i,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:c=>$(e.data,"Approve"),style:{height:"2.5em"}},null,8,["onClick"]),o(i,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2.5em"},onClick:c=>$(e.data,"Reject")},null,8,["onClick"])])):O("",!0)]),_:1})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"])])])],64)}}},l=le(Ie);l.use(se,{ripple:!0});l.use(Ce);l.use(ne);l.use(we);l.directive("tooltip",ie);l.directive("badge",re);l.directive("ripple",de);l.directive("styleclass",ce);l.directive("focustrap",ue);l.component("Button",pe);l.component("DataTable",he);l.component("Column",me);l.component("ColumnGroup",ye);l.component("Row",Re);l.component("Toast",ve);l.component("ConfirmDialog",fe);l.component("Dropdown",be);l.component("InputText",ge);l.component("Dialog",_e);l.component("ProgressSpinner",xe);l.component("Calendar",ke);l.component("moment",Y);l.component("Checkbox",Ae);l.mount("#vjs_reimbursementsApprovalTable");
