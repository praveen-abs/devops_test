/* empty css              *//* empty css                     *//* empty css                   */import{$ as r,o as v,c as h,d as e,h as a,F as j,f as q,t as i,I as o,ao as T,a0 as I,g as y,w as n,l as D,n as P,p as K,b as W,a as Q,K as G,P as J,L as X,u as Z,M as ee,R as te,S as ae,x as oe,y as le,N as se,_ as ne,Q as de,W as ie,Y as re,V as ce}from"./toastservice.esm-92ad56cd.js";import{d as me,c as pe}from"./pinia-3d3134b2.js";import"./blockui.esm-0f3b7911.js";import{a as ue}from"./datatable.esm-74e111f4.js";import{D as ve,s as _e}from"./dialogservice.esm-9beb1b3a.js";import{C as he}from"./confirmationservice.esm-ec960ba4.js";import{s as ye}from"./progressspinner.esm-2194ecb8.js";import{s as ge}from"./row.esm-6ebc942e.js";import{s as fe}from"./calendar.esm-739bee14.js";import{s as be}from"./checkbox.esm-7babf10e.js";import{s as xe}from"./chips.esm-2894be51.js";import{s as we}from"./multiselect.esm-d9a3d0f4.js";import{s as Le}from"./textarea.esm-cf592be0.js";import{s as De}from"./overlaypanel.esm-d22030a9.js";import{s as $e}from"./sidebar.esm-93b1b50d.js";import{S as z}from"./Service-47f95fc8.js";import"./moment-fbc5633a.js";import{a as B}from"./index-0d903406.js";import{d as f}from"./dayjs.min-a301eb4b.js";import{_ as Se}from"./LeaveApply-b9dd522d.js";import"./LeaveApply.vue_vue_type_style_index_0_lang-81d027af.js";import{L as Ce}from"./LoadingSpinner-3a32dcb3.js";import"./index.esm-c4abd3d3.js";/* empty css                                                                       */import"./_plugin-vue_export-helper-c27b6911.js";const F=me("useLeaveModuleStore",()=>{z();const S=r(!0),l=r(),x=r(),w=r(),u=r(),C=r(),R=r(),p=r(),d=r(),A=r(),s=r(),M=r(),$=r(!1),E=r({}),O=b=>{$.value=!0,console.log(b),E.value={...b},E.emp_name=b.name};async function N(){S.value=!0;let b="/get-employee-leave-balance";await B.get(b).then(L=>{console.log(L.data),l.value=L.data,x.value=L.data["Avalied Leaves"]}).finally(()=>{S.value=!1})}async function t(b,L,V){let U=0;await B.get(window.location.origin+"/currentUserCode ").then(Y=>{U=Y.data}),await B.post("/attendance/getEmployeeLeaveDetails",{user_code:U,filter_month:b,filter_year:L,filter_leave_status:V}).then(Y=>{w.value=Y.data.data,console.log("getEmployeeLeaveHistory() : "+Y.data)}).finally(()=>{S.value=!1})}async function g(b,L,V){let U=0;await B.get(window.location.origin+"/currentUserCode ").then(Y=>{U=Y.data}),B.post("/attendance/getTeamEmployeesLeaveDetails",{manager_code:U,filter_month:b,filter_year:L,filter_leave_status:V}).then(Y=>{u.value=Y.data.data,console.log("getTeamLeaveHistory() : "+Y.data)}).finally(()=>{S.value=!1})}async function c(b,L,V){B.post("/attendance/getAllEmployeesLeaveDetails",{filter_month:b,filter_year:L,filter_leave_status:V}).then(U=>{C.value=U.data.data,console.log("getOrgLeaveHistory() : "+U.data.data)}).finally(()=>{S.value=!1})}async function _(b){B.post("/attendance/getLeaveInformation",{record_id:b}).then(L=>{M.value=L.data.data,console.log("getLeaveInformation() : "+L.data)}).finally(()=>{S.value=!1})}async function H(b,L){await B.post("/fetch-org-leaves-balance",{start_date:b,end_date:L}).then(V=>{R.value=V.data}).finally(()=>{S.value=!1})}async function k(b,L){console.log(b,L),B.post("/fetch-team-leave-balance",{start_date:b,end_date:L}).then(V=>{s.value=V.data}).finally(()=>{S.value=!1})}return{canShowLoading:S,canShowLeaveDetails:$,setLeaveDetails:E,getLeaveDetails:O,array_employeeLeaveHistory:w,array_teamLeaveHistory:u,array_orgLeaveHistory:C,array_employeeLeaveBalance:l,array_employeeAvailedLeaveBalance:x,array_orgLeaveBalance:R,selectedStartDate:p,selectedEndDate:d,canshowloadingsrceen:A,arrayTermLeaveBalance:s,getEmployeeLeaveHistory:t,getTeamLeaveHistory:g,getAllEmployeesLeaveHistory:c,getLeaveInformation:_,getEmployeeLeaveBalance:N,getOrgLeaveBalance:H,getTermLeaveBalance:k}}),Re={class:"mb-3 card"},Te={class:"card-body"},Ae={class:"mb-2 row"},ke=e("div",{class:"col-sm-6 col-xl-6 col-md-6 col-lg-6"},[e("h6",{class:"text-lg font-semibold text-gray-900 modal-title"},"Leave Balance")],-1),Me={class:"col-6 justify-content-end d-flex"},Ee={class:"grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4",style:{display:"grid"}},Ve={class:"text-lg font-semibold text-center"},Ye={class:"my-3 text-xl font-bold text-center"},Be={key:0},Pe={key:1},Ue={class:"card"},Oe={class:"card-body"},Ne=e("h6",{class:"mb-4 text-lg font-semibold text-gray-900 modal-title"},"Leave Availed",-1),je={class:"grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4",style:{display:"grid"}},Fe={class:"text-center"},He={class:"mb-2 text-base font-semibold"},Ie={class:"mb-0 text-base font-semibold"},Qe={__name:"EmployeeLeaveBalance",setup(S){const l=F();return(x,w)=>(v(),h(j,null,[e("div",Re,[e("div",Te,[e("div",Ae,[ke,e("div",Me,[a(Se)])]),e("div",Ee,[(v(!0),h(j,null,q(o(l).array_employeeLeaveBalance,u=>(v(),h("div",{key:u,class:"p-1 my-4 rounded-lg shadow-md tw-card dynamic-card hover:bg-slate-100"},[e("p",Ve,i(u.leave_type),1),e("p",Ye,[u.leave_balance==""?(v(),h("span",Be,"0")):(v(),h("span",Pe,i(u.leave_balance),1))])]))),128))])])]),e("div",Ue,[e("div",Oe,[Ne,e("div",je,[(v(!0),h(j,null,q(o(l).array_employeeLeaveBalance,u=>(v(),h("div",{class:"bg-indigo-100 border-l-4 border-indigo-300 p-3 rounded-lg tw-card dynamic-card",key:u},[e("div",Fe,[e("p",He,i(u.leave_type),1),e("h6",Ie,i(u.avalied_leaves),1)])]))),128))])])])],64))}},qe={class:"mt-3 row"},ze={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12"},Ke={class:"mb-0 card leave-history"},We={class:"card-body"},Ge={class:"flex justify-between"},Je=e("div",null,[e("h6",{class:"mb-4 text-lg font-semibold text-gray-900 modal-title"}," Leave history ")],-1),Xe={class:"d-flex justify-content-end mb-2"},Ze=e("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),et={class:"table-responsive"},tt={key:0},at={key:1},ot={key:1},lt={class:"flex justify-center"},st={class:"w-full"},nt={class:"w-full"},dt={class:"border w-full rounded-lg"},it={class:"p-3 pl-5 d-flex align-items-center border"},rt={class:"rounded-circle shadow-sm d-flex justify-content-center align-items-center bg-yellow-100",style:{width:"80px",height:"80px"}},ct={class:"text-3xl font-semibold"},mt={class:"ml-5"},pt={class:"text-lg font-semibold"},ut={class:"fs-6 text-neutral-400"},vt={class:"border w-full d-flex py-4 px-4"},_t={class:"mx-2 p-1 rounded-lg"},ht={class:"text-center py-1 px-2 text-light rounded-top fw-bold",style:{"background-color":"navy"}},yt={class:"text-center py-1 px-2 fs-5 fw-bold"},gt={class:"text-center py-1 px-2 fs-6 fw-bold"},ft={class:"py-3"},bt={class:"text-lg font-semibold text-primary-800"},xt={class:"font-semibold text-xs"},wt={class:"border w-full py-4 px-4"},Lt=e("h1",{class:"text-lg font-semibold"},"Notified To:",-1),Dt={class:"card px-3 py-2 d-flex mt-3",style:{"min-width":"250px","max-width":"300px",display:"flex"}},$t={class:"d-flex p-2 align-items-center"},St={class:"rounded-circle bg-blue-100 d-flex justify-content-center align-items-center",style:{width:"40px",height:"40px"}},Ct={class:"flex-column px-3"},Rt={class:"fs-6 fw-bold"},Tt={class:"py-2 text-neutral-400"},At={class:"border w-full py-4 px-4"},kt=e("h1",{class:"text-lg font-semibold"},"Approved by",-1),Mt={class:"card px-3 py-2 d-flex mt-3",style:{"min-width":"180px","max-width":"300px",display:"flex"}},Et={class:"d-flex p-2 align-items-center"},Vt=e("div",{class:"rounded-circle bg-green-400 d-flex justify-content-center align-items-center",style:{width:"40px",height:"40px"}},[e("i",{class:"pi pi-check text-light"})],-1),Yt={class:"flex-column px-3"},Bt={class:"fs-6 fw-bold"},Pt={class:"py-2 text-neutral-400"},Ut={class:"my-4 mx-3"},Ot={__name:"EmployeeLeaveDetails",setup(S){const l=F(),x=r(!0),w=r(),u=r(),C=A=>{w.value.toggle(A)},R=r({global:{value:null,matchMode:T.CONTAINS},employee_name:{value:null,matchMode:T.STARTS_WITH,matchMode:T.EQUALS,matchMode:T.CONTAINS},status:{value:null,matchMode:T.EQUALS}}),p=r(["Pending","Approved","Rejected"]);I(async()=>{await l.getEmployeeLeaveHistory(f().month()+1,f().year(),["Approved","Pending","Rejected"]),x.value=!1});function d(){l.canShowLeaveDetails=!1}return(A,s)=>{const M=y("Calendar"),$=y("Column"),E=y("OverlayPanel"),O=y("Dropdown"),N=y("Button"),t=y("DataTable"),g=y("Textarea"),c=y("Dialog");return v(),h(j,null,[a(Qe),e("div",qe,[e("div",ze,[e("div",Ke,[e("div",We,[e("div",Ge,[Je,e("div",Xe,[Ze,a(M,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:u.value,"onUpdate:modelValue":s[0]||(s[0]=_=>u.value=_),style:{"border-radius":"7px",height:"30px"},onDateSelect:s[1]||(s[1]=_=>(o(l).getEmployeeLeaveHistory(u.value.getMonth()+1,u.value.getFullYear(),p.value),o(l).canShowLoading=!0))},null,8,["modelValue"])])]),e("div",et,[a(t,{value:o(l).array_employeeLeaveHistory,paginator:!0,rows:5,dataKey:"id",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:R.value,"onUpdate:filters":s[2]||(s[2]=_=>R.value=_),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:n(()=>[D(" No Employee data..... ")]),default:n(()=>[a($,{field:"leave_type",header:"Leave Type",style:{"min-width":"14rem"}}),a($,{field:"start_date",header:"Start Date",style:{"min-width":"8rem"}},{body:n(_=>[D(i(o(f)(_.data.start_date).format("DD-MMM-YYYY")),1)]),_:1}),a($,{field:"end_date",header:"End Date",dataType:"date",style:{"min-width":"8rem"}},{body:n(_=>[D(i(o(f)(_.data.end_date).format("DD-MMM-YYYY")),1)]),_:1}),a($,{field:"leave_reason",header:"Leave Reason",style:{"min-width":"12rem"}},{body:n(_=>[_.data.leave_reason&&_.data.leave_reason.length>70?(v(),h("div",tt,[e("p",{onClick:C,class:"font-medium text-orange-400 underline cursor-pointer"}," explore more... "),a(E,{ref_key:"overlayPanel",ref:w,style:{height:"80px"}},{default:n(()=>[D(i(_.data.leave_reason),1)]),_:2},1536)])):(v(),h("div",at,i(_.data.leave_reason??""),1))]),_:1}),a($,{field:"reviewer_name",header:"Approver Name"}),a($,{field:"reviewer_comments",header:"Approver Comments"}),a($,{field:"status",header:"Status",icon:"pi pi-check"},{body:n(({data:_})=>[e("span",{class:P("customer-badge status-"+_.status)},i(_.status),3)]),filter:n(({filterModel:_,filterCallback:H})=>[a(O,{modelValue:_.value,"onUpdate:modelValue":k=>_.value=k,onChange:k=>H(),options:p.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:n(k=>[k.value?(v(),h("span",{key:0,class:P("customer-badge status-"+k.value)},i(k.value),3)):(v(),h("span",ot,i(k.placeholder),1))]),option:n(k=>[e("span",{class:P("customer-badge status-"+k.option)},i(k.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),a($,{field:"",header:"Action",style:{"min-width":"15rem"}},{body:n(_=>[e("div",lt,[a(N,{type:"button",icon:"",class:"text-white Button py-2.5 mx-auto",label:"View",onClick:H=>o(l).getLeaveDetails(_.data),style:{height:"2em"}},null,8,["onClick"])])]),_:1})]),_:1},8,["value","filters"])])])])])]),a(c,{header:"Header",visible:o(l).canShowLeaveDetails,"onUpdate:visible":s[3]||(s[3]=_=>o(l).canShowLeaveDetails=_),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"50vw",borderTop:"5px solid #002f56"},modal:!0,closable:!0,closeOnEscape:!0},{header:n(()=>[e("div",st,[e("h5",{style:K({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"}),class:"text-xl font-semibold"}," Leave Details Request",4)])]),default:n(()=>[e("div",nt,[e("div",dt,[e("div",it,[e("div",rt,[e("h1",ct,i(o(l).setLeaveDetails.user_short_name),1)]),e("div",mt,[e("h1",pt,i(o(l).setLeaveDetails.name),1),e("div",null,[e("p",ut,"Requested on "+i(o(l).setLeaveDetails.leaverequest_date),1)])])]),e("div",vt,[e("div",_t,[e("h1",ht,i(o(f)(o(l).setLeaveDetails.end_date).format("MMM")),1),e("h1",yt,i(o(f)(o(l).setLeaveDetails.end_date).format("DD")),1),e("h1",gt,i(o(f)(o(l).setLeaveDetails.end_date).format("dddd")),1)]),e("div",ft,[e("h1",bt,[D(i(o(l).setLeaveDetails.total_leave_datetime)+" Day of "+i(o(l).setLeaveDetails.leave_type)+" ",1),e("span",xt," ("+i(o(l).setLeaveDetails.leave_reason)+") ",1)])])]),e("div",wt,[Lt,e("div",Dt,[e("div",$t,[e("div",St,i(o(l).setLeaveDetails.reviewer_short_name),1),e("div",Ct,[e("h1",Rt,i(o(l).setLeaveDetails.reviewer_name),1),e("h1",Tt,i(o(l).setLeaveDetails.reviewer_designation),1)])])])]),e("div",At,[kt,e("div",Mt,[e("div",Et,[Vt,e("div",Yt,[e("h1",Bt,i(o(l).setLeaveDetails.reviewer_name),1),e("h1",Pt," on "+i(o(f)(o(l).setLeaveDetails.leaverequest_date).format("DD-MMM-YYYY hh: mm:ss A")),1)])])])]),e("div",Ut,[a(g,{name:"",id:"",cols:"70",rows:"3",autoResize:"",placeholder:"Add Comment"})])])]),e("div",{class:"text-end mx-4 my-4"},[e("button",{class:"btn btn-orange px-5",onClick:d},"Post")])]),_:1},8,["visible"])],64)}}},Nt={class:"card top-line"},jt={class:"card-body"},Ft={class:"row"},Ht={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12 d-flex justify-content-between align-content-center"},It=e("h6",{class:"h-7 mt-3 text-lg font-semibold text-gray-900 modal-title"},"Org Leave Balance",-1),Qt={class:"my-2 d-flex justify-content-between align-items-center"},qt=e("div",null,null,-1),zt={class:"d-flex"},Kt={class:""},Wt=e("label",{for:" ",class:"text-lg font-semibold"},"Start Date",-1),Gt={class:""},Jt=e("label",{for:" ",class:"text-lg font-semibold mx-2"},"End Date",-1),Xt={class:"mt-3 row"},Zt={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12"},ea={class:"mb-0 card leave-history"},ta={class:"card-body"},aa={class:"flex justify-between"},oa=e("div",null,[e("h6",{class:"mb-4 text-lg font-semibold text-gray-900 modal-title"},"Org Leave history")],-1),la={class:"d-flex justify-content-end"},sa=e("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),na={class:"table-responsive"},da={key:0},ia={key:1},ra={key:1},ca={__name:"OrgLeaveDetails",setup(S){const l=F();r(),r(),r(!0);const x=r(),w=r([]),u=r();r();const C=r({employee_name:{value:null,matchMode:T.STARTS_WITH,matchMode:T.EQUALS,matchMode:T.CONTAINS},status:{value:null,matchMode:T.EQUALS}}),R=r(["Pending","Approved","Rejected"]);return I(async()=>{await l.getOrgLeaveBalance(),await l.getAllEmployeesLeaveHistory(f().month()+1,f().year(),["Approved","Pending","Rejected"]),console.log("Org Leave details : "+l.array_orgLeaveHistory)}),(p,d)=>{const A=y("Calendar"),s=y("Column"),M=y("DataTable"),$=y("InputText"),E=y("OverlayPanel"),O=y("Dropdown"),N=y("Button");return v(),h(j,null,[e("div",Nt,[e("div",jt,[e("div",Ft,[e("div",Ht,[It,e("div",Qt,[qt,e("div",zt,[e("div",Kt,[Wt,a(A,{modelValue:o(l).selectedStartDate,"onUpdate:modelValue":d[0]||(d[0]=t=>o(l).selectedStartDate=t),dateFormat:"dd-mm-yy",class:"pl-3",style:{"border-radius":"7px",height:"30px",width:"100px"},maxDate:new Date},null,8,["modelValue","maxDate"])]),e("div",Gt,[Jt,a(A,{class:"mr-3",modelValue:o(l).selectedEndDate,"onUpdate:modelValue":d[1]||(d[1]=t=>o(l).selectedEndDate=t),dateFormat:"dd-mm-yy",style:{"border-radius":"7px",height:"30px",width:"100px"},maxDate:new Date},null,8,["modelValue","maxDate"])]),e("button",{class:"btn-orange py-1 px-4 rounded",style:{height:"30px"},onClick:d[2]||(d[2]=t=>o(l).getOrgLeaveBalance(o(f)(o(l).selectedStartDate).format("YYYY-MM-DD"),o(f)(o(l).selectedEndDate).format("YYYY-MM-DD")))},"submit")])])]),e("div",null,[a(M,{value:o(l).array_orgLeaveBalance,paginator:!0,rows:10,class:"",dataKey:"user_code",onRowExpand:p.onRowExpand,onRowCollapse:p.onRowCollapse,expandedRows:w.value,"onUpdate:expandedRows":d[4]||(d[4]=t=>w.value=t),selection:u.value,"onUpdate:selection":d[5]||(d[5]=t=>u.value=t),selectAll:p.selectAll,onSelectAllChange:p.onSelectAllChange,onRowSelect:p.onRowSelect,onRowUnselect:p.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{expansion:n(t=>[e("div",null,[a(M,{value:t.data.leave_balance_details,responsiveLayout:"scroll",selection:u.value,"onUpdate:selection":d[3]||(d[3]=g=>u.value=g),selectAll:p.selectAll,onSelectAllChange:p.onSelectAllChange},{default:n(()=>[a(s,{field:"leave_type",header:"Leave Type"},{default:n(()=>[D(i(t.data.leave_type),1)]),_:2},1024),a(s,{field:"opening_balance",header:"Opening Balance"}),a(s,{field:"avalied",header:"Avalied"}),a(s,{field:"closing_balance",header:"Closing Balance"})]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:n(()=>[a(s,{expander:!0}),a(s,{field:"user_code",header:"Employee Id",sortable:""}),a(s,{field:"name",header:"Employee Name"}),a(s,{field:"location",header:"Location",sortable:!1}),a(s,{field:"department",header:"Department"}),a(s,{field:"total_leave_balance",header:"Total Leave Balance"})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"])])])])]),e("div",Xt,[e("div",Zt,[e("div",ea,[e("div",ta,[e("div",aa,[oa,e("div",la,[sa,a(A,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:x.value,"onUpdate:modelValue":d[6]||(d[6]=t=>x.value=t),style:{"border-radius":"7px",height:"30px"},onDateSelect:d[7]||(d[7]=t=>o(l).getAllEmployeesLeaveHistory(x.value.getMonth()+1,x.value.getFullYear(),R.value))},null,8,["modelValue"])])]),e("div",na,[a(M,{value:o(l).array_orgLeaveHistory,responsiveLayout:"scroll",paginator:!0,rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rows:5,filters:C.value,"onUpdate:filters":d[9]||(d[9]=t=>C.value=t),filterDisplay:"menu",globalFilterFields:["name"],style:{"white-space":"nowrap"}},{empty:n(()=>[D(" No Employee data..... ")]),default:n(()=>[a(s,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:n(t=>[D(i(t.data.employee_name),1)]),filter:n(({filterModel:t,filterCallback:g})=>[a($,{modelValue:t.value,"onUpdate:modelValue":c=>t.value=c,onInput:c=>g(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),a(s,{field:"leave_type",header:"Leave Type"}),a(s,{field:"start_date",header:"Start Date"},{body:n(t=>[D(i(o(f)(t.data.start_date).format("DD-MMM-YYYY")),1)]),_:1}),a(s,{field:"end_date",header:"End Date"},{body:n(t=>[D(i(o(f)(t.data.end_date).format("DD-MMM-YYYY")),1)]),_:1}),a(s,{field:"total_leave_datetime",header:"Total Leave Days"}),a(s,{field:"leave_reason",header:"Leave Reason"},{body:n(t=>[t.data.leave_reason&&t.data.leave_reason.length>70?(v(),h("div",da,[e("p",{onClick:d[8]||(d[8]=(...g)=>p.toggle&&p.toggle(...g)),class:"font-medium text-orange-400 underline cursor-pointer"}," More... "),a(E,{ref:"overlayPanel",style:{height:"80px"}},{default:n(()=>[D(i(t.data.leave_reason),1)]),_:2},1536)])):(v(),h("div",ia,i(t.data.leave_reason??""),1))]),_:1}),a(s,{field:"status",header:"Status"},{body:n(({data:t})=>[e("span",{class:P("customer-badge status-"+t.status)},i(t.status),3)]),filter:n(({filterModel:t,filterCallback:g})=>[a(O,{modelValue:t.value,"onUpdate:modelValue":c=>t.value=c,onChange:c=>g(),options:R.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:n(c=>[c.value?(v(),h("span",{key:0,class:P("customer-badge status-"+c.value)},i(c.value),3)):(v(),h("span",ra,i(c.placeholder),1))]),option:n(c=>[e("span",{class:P("customer-badge status-"+c.option)},i(c.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),a(s,{field:"",header:"Action",style:{"min-width":"15rem"}},{body:n(t=>[a(N,{type:"button",icon:"",class:"text-white Button py-2.5",label:"View",onClick:g=>o(l).getLeaveDetails(t.data),style:{height:"2em"}},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters"])])])])])])],64)}}},ma={class:"card top-line"},pa={class:"card-body"},ua={class:"row"},va={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12 d-flex justify-content-between align-items-center"},_a=e("h6",{class:"mb-4 text-lg font-semibold text-gray-900 modal-title"},"Team Leave Balance",-1),ha={class:"my-2 d-flex justify-content-between align-items-center"},ya=e("div",null,null,-1),ga={class:"d-flex"},fa={class:""},ba=e("label",{for:" ",class:"font-semibold text-lg mx-2"},"Start Date",-1),xa={class:""},wa=e("label",{for:" ",class:"font-semibold text-lg mx-2"},"End Date",-1),La={class:"mt-3 row"},Da={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12"},$a={class:"mb-0 card leave-history"},Sa={class:"card-body"},Ca={class:"flex justify-between"},Ra=e("div",null,[e("h6",{class:"mb-4 text-lg font-semibold text-gray-900 modal-title"},"Team Leave history")],-1),Ta={class:"d-flex justify-content-end"},Aa=e("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),ka={class:"table-responsive"},Ma={key:0},Ea={key:1},Va={key:1},Ya={__name:"TeamLeaveDetails",setup(S){const l=F();r(),r(),r(),r(),r(),r(!0),r();const x=r([]),w=r(),u=r(),C=r({employee_name:{value:null,matchMode:T.STARTS_WITH,matchMode:T.EQUALS,matchMode:T.CONTAINS},status:{value:null,matchMode:T.EQUALS}}),R=r(["Pending","Approved","Rejected"]);return I(async()=>{await l.getTermLeaveBalance(),await l.getTeamLeaveHistory(f().month()+1,f().year(),["Approved","Pending","Rejected"])}),(p,d)=>{const A=y("Calendar"),s=y("Column"),M=y("DataTable"),$=y("InputText"),E=y("OverlayPanel"),O=y("Dropdown"),N=y("Button");return v(),h(j,null,[e("div",ma,[e("div",pa,[e("div",ua,[e("div",va,[_a,e("div",ha,[ya,e("div",ga,[e("div",fa,[ba,a(A,{modelValue:o(l).selectedStartDate,"onUpdate:modelValue":d[0]||(d[0]=t=>o(l).selectedStartDate=t),dateFormat:"dd-mm-yy",class:"p-l3",style:{"border-radius":"7px",height:"30px",width:"100px"},maxDate:new Date},null,8,["modelValue","maxDate"])]),e("div",xa,[wa,a(A,{class:"mr-3",modelValue:o(l).selectedEndDate,"onUpdate:modelValue":d[1]||(d[1]=t=>o(l).selectedEndDate=t),dateFormat:"dd-mm-yy",style:{"border-radius":"7px",height:"30px",width:"100px"},maxDate:new Date},null,8,["modelValue","maxDate"])]),e("button",{class:"btn-orange py-1 px-4 rounded",onClick:d[2]||(d[2]=t=>(o(l).getTermLeaveBalance(o(f)(o(l).selectedStartDate).format("YYYY-MM-DD"),o(f)(o(l).selectedEndDate).format("YYYY-MM-DD")),o(l).canShowLoading=!0))},"submit")])])]),e("div",null,[a(M,{value:o(l).arrayTermLeaveBalance,paginator:!0,rows:10,class:"",dataKey:"user_code",onRowExpand:p.onRowExpand,onRowCollapse:p.onRowCollapse,expandedRows:x.value,"onUpdate:expandedRows":d[4]||(d[4]=t=>x.value=t),selection:w.value,"onUpdate:selection":d[5]||(d[5]=t=>w.value=t),selectAll:p.selectAll,onSelectAllChange:p.onSelectAllChange,onRowSelect:p.onRowSelect,onRowUnselect:p.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{expansion:n(t=>[e("div",null,[a(M,{value:t.data.leave_balance_details,responsiveLayout:"scroll",selection:w.value,"onUpdate:selection":d[3]||(d[3]=g=>w.value=g),selectAll:p.selectAll,onSelectAllChange:p.onSelectAllChange},{default:n(()=>[a(s,{field:"leave_type",header:"Leave Type"},{default:n(()=>[D(i(t.data.leave_type),1)]),_:2},1024),a(s,{field:"opening_balance",header:"Opening Balance"}),a(s,{field:"avalied",header:"Avalied"}),a(s,{field:"closing_balance",header:"Closing Balance"})]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:n(()=>[a(s,{style:{width:"1rem !important"},expander:!0}),a(s,{field:"user_code",header:"Employee Id",sortable:""}),a(s,{field:"name",header:"Employee Name"}),a(s,{field:"location",header:"Location",sortable:!1}),a(s,{field:"department",header:"Department"}),a(s,{field:"total_leave_balance",header:"Total Leave Balance"})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"])])])])]),e("div",La,[e("div",Da,[e("div",$a,[e("div",Sa,[e("div",Ca,[Ra,e("div",Ta,[Aa,a(A,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:u.value,"onUpdate:modelValue":d[6]||(d[6]=t=>u.value=t),style:{"border-radius":"7px",height:"30px"},onDateSelect:d[7]||(d[7]=t=>(o(l).getTeamLeaveHistory(u.value.getMonth()+1,u.value.getFullYear(),R.value),o(l).canShowLoading=!0))},null,8,["modelValue"])])]),e("div",ka,[a(M,{value:o(l).array_teamLeaveHistory,responsiveLayout:"scroll",paginator:!0,rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rows:5,filters:C.value,"onUpdate:filters":d[9]||(d[9]=t=>C.value=t),filterDisplay:"menu",globalFilterFields:["name"],style:{"white-space":"nowrap"}},{empty:n(()=>[D(" No Employee data..... ")]),default:n(()=>[a(s,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:n(t=>[D(i(t.data.employee_name),1)]),filter:n(({filterModel:t,filterCallback:g})=>[a($,{modelValue:t.value,"onUpdate:modelValue":c=>t.value=c,onInput:c=>g(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),a(s,{field:"leave_type",header:"Leave Type"}),a(s,{field:"start_date",header:"Start Date"},{body:n(t=>[D(i(o(f)(t.data.start_date).format("DD-MMM-YYYY")),1)]),_:1}),a(s,{field:"end_date",header:"End Date"},{body:n(t=>[D(i(o(f)(t.data.end_date).format("DD-MMM-YYYY")),1)]),_:1}),a(s,{field:"total_leave_datetime",header:"Total Leave Days"}),a(s,{field:"leave_reason",header:"Leave Reason"},{body:n(t=>[t.data.leave_reason&&t.data.leave_reason.length>70?(v(),h("div",Ma,[e("p",{onClick:d[8]||(d[8]=(...g)=>p.toggle&&p.toggle(...g)),class:"font-medium text-orange-400 underline cursor-pointer"}," explore more... "),a(E,{ref:"overlayPanel",style:{height:"80px"}},{default:n(()=>[D(i(t.data.leave_reason),1)]),_:2},1536)])):(v(),h("div",Ea,i(t.data.leave_reason??""),1))]),_:1}),a(s,{field:"status",header:"Status"},{body:n(({data:t})=>[e("span",{class:P("customer-badge status-"+t.status)},i(t.status),3)]),filter:n(({filterModel:t,filterCallback:g})=>[a(O,{modelValue:t.value,"onUpdate:modelValue":c=>t.value=c,onChange:c=>g(),options:R.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:n(c=>[c.value?(v(),h("span",{key:0,class:P("customer-badge status-"+c.value)},i(c.value),3)):(v(),h("span",Va,i(c.placeholder),1))]),option:n(c=>[e("span",{class:P("customer-badge status-"+c.option)},i(c.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),a(s,{field:"",header:"Action",style:{"min-width":"15rem"}},{body:n(t=>[a(N,{type:"button",icon:"",class:"text-white Button py-2.5",label:"View",onClick:g=>o(l).getLeaveDetails(t.data),style:{height:"2em"}},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters"])])])])])])],64)}}},Ba={class:"w-full"},Pa={class:"p-2 bg-white rounded-lg shadow tw-card left-line",style:{"background-color":"white"}},Ua={class:"flex justify-between"},Oa={class:"bg-white divide-x py-auto nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},Na=e("li",{class:"nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#leave_balance","aria-selected":"true",role:"tab"}," Leave Balance")],-1),ja={key:0,class:"nav-item text-muted",role:"presentation"},Fa=e("a",{class:"pb-2 mx-4 nav-link","data-bs-toggle":"tab",href:"#team_leaveBalance","aria-selected":"false",tabindex:"-1",role:"tab"}," Team Leave Balance",-1),Ha=[Fa],Ia={key:1,class:"nav-item text-muted",role:"presentation"},Qa=e("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#org_leave","aria-selected":"false",tabindex:"-1",role:"tab"}," Org Leave Balance",-1),qa=[Qa],za=e("div",{class:"flex items-center"},[e("div",{class:"mr-3"}),e("a",{href:"/attendance-leave-policydocument",id:"",class:"text-md font-medium border-1 border-orange-400 rounded-lg text-center bg-orange-400 text-white my-auto p-1.5 dark:text-white",role:"button","aria-expanded":"false"}," Leave Policy Explanation ")],-1),Ka={class:"tab-content py-2",id:"pills-tabContent"},Wa={class:"tab-pane show fade active",id:"leave_balance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Ga={class:"tab-pane fade show",id:"team_leaveBalance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Ja={class:"tab-pane show",id:"org_leave",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Xa=e("h6",{class:"mb-4 modal-title fs-21"}," Leave Request",-1),Za={__name:"LeaveModule",setup(S){const l=F(),x=z(),w=r(!1);return I(()=>{l.getEmployeeLeaveBalance()}),(u,C)=>{const R=y("leaveapply2"),p=y("Dialog");return v(),h(j,null,[o(l).canShowLoading?(v(),W(Ce,{key:0,class:"absolute z-50 bg-white"})):Q("",!0),e("div",Ba,[e("div",Pa,[e("div",Ua,[e("ul",Oa,[Na,o(x).current_user_role==2||o(x).current_user_role==4?(v(),h("li",ja,Ha)):Q("",!0),o(x).current_user_role==2?(v(),h("li",Ia,qa)):Q("",!0)]),za])]),e("div",Ka,[e("div",Wa,[a(Ot)]),e("div",Ga,[a(Ya)]),e("div",Ja,[a(ca)])])]),a(p,{visible:w.value,"onUpdate:visible":C[0]||(C[0]=d=>w.value=d),style:{width:"80vw"},breakpoints:{"960px":"75vw","641px":"100vw"}},{header:n(()=>[Xa]),default:n(()=>[a(R)]),_:1},8,["visible"])],64)}}},m=G(Za),eo=pe();m.use(J,{ripple:!0});m.use(he);m.use(X);m.use(ve);m.use(eo);m.directive("tooltip",Z);m.directive("badge",ee);m.directive("ripple",te);m.directive("styleclass",ae);m.directive("focustrap",oe);m.component("Button",le);m.component("DataTable",ue);m.component("Column",se);m.component("ColumnGroup",_e);m.component("Row",ge);m.component("Toast",ne);m.component("ConfirmDialog",de);m.component("Dropdown",ie);m.component("InputText",re);m.component("Dialog",ce);m.component("ProgressSpinner",ye);m.component("Calendar",fe);m.component("Checkbox",be);m.component("Chips",xe);m.component("MultiSelect",we);m.component("Textarea",Le);m.component("OverlayPanel",De);m.component("Sidebar",$e);m.mount("#LeaveModule");
