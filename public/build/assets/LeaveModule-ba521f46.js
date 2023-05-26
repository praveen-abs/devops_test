import{H as d,o as c,c as _,e,h as a,F as V,f as U,t as s,ag as i,Y as L,I as Y,g as v,w as o,k as g,n as A,p as H,b as F,a as j,J as Q,P as q,K as W,L as z,R as G,u as K,v as J,S as X,M as Z,Q as ee,A as te,N as ae}from"./toastservice.esm-11027b59.js";import{d as oe,c as se}from"./pinia-e6f84f32.js";import{T as le,B as ne,S as ie,b as de,a as re}from"./styleclass.esm-1e136147.js";import"./blockui.esm-6c99e7f1.js";import{D as ce}from"./dialogservice.esm-7c585a4a.js";import{s as me}from"./progressspinner.esm-778e5342.js";import{s as pe}from"./row.esm-6ebc942e.js";import{s as ue}from"./columngroup.esm-9dd1458e.js";import{s as _e}from"./calendar.esm-9d39d621.js";import{s as ve}from"./checkbox.esm-edb4c7a8.js";import{s as he}from"./chips.esm-d6fb6707.js";import{s as ye}from"./multiselect.esm-82a03c6f.js";import{s as ge}from"./textarea.esm-8229edd7.js";import{s as fe}from"./overlaypanel.esm-23eb529e.js";import{h as O}from"./moment-fbc5633a.js";import{a as B}from"./index-362795f3.js";import{d as k}from"./dayjs.min-2f06af28.js";import{S as be}from"./Service-14aa6e72.js";import{_ as xe}from"./LeaveApply-3c6b7e8f.js";/* empty css                                                            */import"./index.esm-ef4577c0.js";import"./leave_apply_service-49f5f1da.js";const N=oe("useLeaveModuleStore",()=>{be();const R=d(!1),n=d(),C=d(),D=d(),p=d(),$=d(),x=d(),T=d(!1),y=d({}),S=f=>{T.value=!0,console.log(f),y.value={...f},y.emp_name=f.name};async function h(){R.value=!0;let f="/get-employee-leave-balance";await B.get(f).then(t=>{console.log(t.data),n.value=t.data,C.value=t.data["Avalied Leaves"]}).finally(()=>{R.value=!1})}async function b(f,t,u){let l=0;await B.get(window.location.origin+"/currentUserCode ").then(r=>{l=r.data}),await B.post("/attendance/getEmployeeLeaveDetails",{user_code:l,filter_month:f,filter_year:t,filter_leave_status:u}).then(r=>{D.value=r.data.data,console.log("getEmployeeLeaveHistory() : "+r.data)})}async function M(f,t,u){let l=0;await B.get(window.location.origin+"/currentUserCode ").then(r=>{l=r.data}),B.post("/attendance/getTeamEmployeesLeaveDetails",{manager_code:l,filter_month:f,filter_year:t,filter_leave_status:u}).then(r=>{p.value=r.data.data,console.log("getTeamLeaveHistory() : "+r.data)})}async function w(f,t,u){B.post("/attendance/getAllEmployeesLeaveDetails",{filter_month:f,filter_year:t,filter_leave_status:u}).then(l=>{$.value=l.data,console.log("getOrgLeaveHistory() : "+l.data)})}async function E(f){B.post("/attendance/getLeaveInformation",{record_id:f}).then(t=>{x.value=t.data.data,console.log("getLeaveInformation() : "+t.data)})}return{canShowLoading:R,canShowLeaveDetails:T,setLeaveDetails:y,getLeaveDetails:S,array_employeeLeaveHistory:D,array_teamLeaveHistory:p,array_orgLeaveHistory:$,array_employeeLeaveBalance:n,array_employeeAvailedLeaveBalance:C,getEmployeeLeaveHistory:b,getTeamLeaveHistory:M,getAllEmployeesLeaveDetails:w,getLeaveInformation:E,getEmployeeLeaveBalance:h}}),we={class:"mb-3 tw-card"},Le={class:"mb-2 row"},De=e("div",{class:"col-sm-6 col-xl-6 col-md-6 col-lg-6"},[e("h6",{class:"text-lg font-semibold text-gray-900 modal-title"},"Leave Balance")],-1),$e={class:"col-6 justify-content-end d-flex"},Se={class:"grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4",style:{display:"grid"}},ke={class:"text-lg font-semibold text-center"},Ce={class:"my-3 text-xl font-bold text-center"},Te={key:0},Pe={key:1},Me={class:"tw-card"},Ve=e("h6",{class:"mb-4 text-lg font-semibold text-gray-900 modal-title"},"Leave Availed",-1),Ae={class:"grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4",style:{display:"grid"}},Re={class:"text-center"},Ee={class:"mb-2 text-base font-semibold"},Be={class:"mb-0 text-base font-semibold"},Ue={__name:"EmployeeLeaveBalance",setup(R){const n=N();return(C,D)=>(c(),_(V,null,[e("div",we,[e("div",Le,[De,e("div",$e,[a(xe)])]),e("div",Se,[(c(!0),_(V,null,U(i(n).array_employeeLeaveBalance,p=>(c(),_("div",{key:p,class:"p-1 my-4 rounded-lg shadow-md tw-card dynamic-card hover:bg-slate-100"},[e("p",ke,s(p.leave_type),1),e("p",Ce,[p.leave_balance==""?(c(),_("span",Te,"0")):(c(),_("span",Pe,s(p.leave_balance),1))])]))),128))])]),e("div",Me,[Ve,e("div",Ae,[(c(!0),_(V,null,U(i(n).array_employeeLeaveBalance,p=>(c(),_("div",{class:"bg-indigo-100 border-l-4 border-indigo-300 tw-card",key:p},[e("div",Re,[e("p",Ee,s(p.leave_type),1),e("h6",Be,s(p.avalied_leaves),1)])]))),128))])])],64))}},Ye={class:"mt-3 row"},Ne={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12"},Ie={class:"mb-0 card leave-history"},Oe={class:"card-body"},Fe=e("h6",{class:"mb-4 text-lg font-semibold text-gray-900 modal-title"}," Leave history ",-1),He={class:"d-flex justify-content-end mb-2"},je=e("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),Qe={class:"table-responsive"},qe={key:0},We={key:1},ze={key:1},Ge={class:"w-full"},Ke={class:"w-full"},Je={class:"border w-full mt-5"},Xe={class:"p-3 pl-5 d-flex align-items-center border"},Ze={class:"rounded-circle shadow-sm d-flex justify-content-center align-items-center bg-yellow-100",style:{width:"80px",height:"80px"}},et={class:"fs-5 fw-bold"},tt={class:"ml-5"},at={class:"fs-5 fw-bold mb-2"},ot={class:"fs-6 text-neutral-400"},st={class:"border w-full d-flex py-4 px-4"},lt={class:"mx-2 p-1 rounded-lg"},nt={class:"text-center py-1 px-2 text-light rounded-top fw-bold",style:{"background-color":"navy"}},it={class:"text-center py-1 px-2 fs-5 fw-bold"},dt={class:"text-center py-1 px-2 fs-6 fw-bold"},rt={class:"py-3"},ct={class:"fs- font-semibold text-primary-800"},mt={class:"font-semibold fs-6"},pt={class:"border w-full py-4 px-4"},ut=e("h1",{class:"fs-5 fw-bold"},"Notified To:",-1),_t={class:"card px-3 py-2 d-flex mt-3",style:{"min-width":"250px","max-width":"300px",display:"flex"}},vt={class:"d-flex p-2 align-items-center"},ht={class:"rounded-circle bg-blue-100 d-flex justify-content-center align-items-center",style:{width:"40px",height:"40px"}},yt={class:"flex-column px-3"},gt={class:"fs-6 fw-bold"},ft={class:"py-2 text-neutral-400"},bt={class:"border w-full py-4 px-4"},xt=e("h1",{class:"fs-5 fw-bold"},"Approved by",-1),wt={class:"card px-3 py-2 d-flex mt-3",style:{"min-width":"180px","max-width":"300px",display:"flex"}},Lt={class:"d-flex p-2 align-items-center"},Dt=e("div",{class:"rounded-circle bg-green-400 d-flex justify-content-center align-items-center",style:{width:"40px",height:"40px"}},[e("i",{class:"pi pi-check text-light"})],-1),$t={class:"flex-column px-3"},St={class:"fs-6 fw-bold"},kt={class:"py-2 text-neutral-400"},Ct={class:"my-4 mx-3"},Tt={__name:"EmployeeLeaveDetails",setup(R){const n=N(),C=d(!0),D=d(),p=d(),$=S=>{D.value.toggle(S)},x=d({global:{value:null,matchMode:L.CONTAINS},employee_name:{value:null,matchMode:L.STARTS_WITH,matchMode:L.EQUALS,matchMode:L.CONTAINS},status:{value:null,matchMode:L.EQUALS}}),T=d(["Pending","Approved","Rejected"]);Y(async()=>{console.log(p.v),await n.getEmployeeLeaveHistory(k().month()+1,k().year(),["Approved","Pending","Rejected"]),C.value=!1});function y(){n.canShowLeaveDetails=!1}return(S,h)=>{const b=v("Calendar"),M=v("Button"),w=v("Column"),E=v("OverlayPanel"),f=v("Dropdown"),t=v("DataTable"),u=v("Textarea"),l=v("Dialog");return c(),_(V,null,[a(Ue),e("div",Ye,[e("div",Ne,[e("div",Ie,[e("div",Oe,[Fe,e("div",He,[je,a(b,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:p.value,"onUpdate:modelValue":h[0]||(h[0]=r=>p.value=r),style:{border:"1px solid orange","border-radius":"7px",height:"38px"}},null,8,["modelValue"]),a(M,{class:"h-10 mb-2 btn btn-orange",label:"Submit",onClick:h[1]||(h[1]=r=>i(n).getEmployeeLeaveHistory(p.value.getMonth()+1,p.value.getFullYear(),T.value))})]),e("div",Qe,[a(t,{value:i(n).array_employeeLeaveHistory,loading:C.value,paginator:!0,rows:5,dataKey:"id",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:x.value,"onUpdate:filters":h[2]||(h[2]=r=>x.value=r),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:o(()=>[g(" No Employee data..... ")]),loading:o(()=>[g(" Loading customers data. Please wait. ")]),default:o(()=>[a(w,{field:"leave_type",header:"Leave Type",style:{"min-width":"8rem"}}),a(w,{field:"start_date",header:"Start Date",style:{"min-width":"8rem"}},{body:o(r=>[g(s(i(k)(r.data.start_date).format("DD-MMM-YYYY")),1)]),_:1}),a(w,{field:"end_date",header:"End Date",dataType:"date",style:{"min-width":"8rem"}},{body:o(r=>[g(s(i(k)(r.data.end_date).format("DD-MMM-YYYY")),1)]),_:1}),a(w,{field:"leave_reason",header:"Leave Reason",style:{"min-width":"12rem"}},{body:o(r=>[r.data.leave_reason&&r.data.leave_reason.length>70?(c(),_("div",qe,[e("p",{onClick:$,class:"font-medium text-orange-400 underline cursor-pointer"}," explore more... "),a(E,{ref_key:"overlayPanel",ref:D,style:{height:"80px"}},{default:o(()=>[g(s(r.data.leave_reason),1)]),_:2},1536)])):(c(),_("div",We,s(r.data.leave_reason??""),1))]),_:1}),a(w,{field:"reviewer_name",header:"Approver Name"}),a(w,{field:"reviewer_comments",header:"Approver Comments"}),a(w,{field:"status",header:"Status",icon:"pi pi-check"},{body:o(({data:r})=>[e("span",{class:A("customer-badge status-"+r.status)},s(r.status),3)]),filter:o(({filterModel:r,filterCallback:I})=>[a(f,{modelValue:r.value,"onUpdate:modelValue":P=>r.value=P,onChange:P=>I(),options:T.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:o(P=>[P.value?(c(),_("span",{key:0,class:A("customer-badge status-"+P.value)},s(P.value),3)):(c(),_("span",ze,s(P.placeholder),1))]),option:o(P=>[e("span",{class:A("customer-badge status-"+P.option)},s(P.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),a(w,{field:"",header:"Action",style:{"min-width":"15rem"}},{body:o(r=>[a(M,{type:"button",icon:"pi pi-check-circle",class:"text-white Button py-2.5",label:"View",onClick:I=>i(n).getLeaveDetails(r.data),style:{height:"2em"}},null,8,["onClick"])]),_:1})]),_:1},8,["value","loading","filters"])])])])])]),a(l,{header:"Header",visible:i(n).canShowLeaveDetails,"onUpdate:visible":h[3]||(h[3]=r=>i(n).canShowLeaveDetails=r),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"50vw",borderTop:"5px solid #002f56"},modal:!0,closable:!0,closeOnEscape:!0},{header:o(()=>[e("div",Ge,[e("h5",{style:H({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"}),class:"fs-5 fw-bold"}," Leave Details Request",4)])]),default:o(()=>[e("div",Ke,[e("div",Je,[e("div",Xe,[e("div",Ze,[e("h1",et,s(i(n).setLeaveDetails.user_short_name),1)]),e("div",tt,[e("h1",at,s(i(n).setLeaveDetails.name),1),e("div",null,[e("p",ot,"Requested on "+s(i(n).setLeaveDetails.leaverequest_date),1)])])]),e("div",st,[e("div",lt,[e("h1",nt,s(i(k)(i(n).setLeaveDetails.end_date).format("MMM")),1),e("h1",it,s(i(k)(i(n).setLeaveDetails.end_date).format("DD")),1),e("h1",dt,s(i(k)(i(n).setLeaveDetails.end_date).format("dddd")),1)]),e("div",rt,[e("h1",ct,[g(s(i(n).setLeaveDetails.total_leave_datetime)+" Day of "+s(i(n).setLeaveDetails.leave_type)+" ",1),e("span",mt,"("+s(i(n).setLeaveDetails.leave_reason)+")",1)])])]),e("div",pt,[ut,e("div",_t,[e("div",vt,[e("div",ht,s(i(n).setLeaveDetails.reviewer_short_name),1),e("div",yt,[e("h1",gt,s(i(n).setLeaveDetails.reviewer_name),1),e("h1",ft,s(i(n).setLeaveDetails.reviewer_designation),1)])])])]),e("div",bt,[xt,e("div",wt,[e("div",Lt,[Dt,e("div",$t,[e("h1",St,s(i(n).setLeaveDetails.reviewer_name),1),e("h1",kt," on "+s(i(k)(i(n).setLeaveDetails.leaverequest_date).format("DD-MMM-YYYY hh:mm:ss A")),1)])])])]),e("div",Ct,[a(u,{name:"",id:"",cols:"90",rows:"5",autoResize:"",placeholder:"Add Comment"})])])]),e("div",{class:"text-end mx-4 my-4"},[e("button",{class:"btn btn-orange px-5",onClick:y},"Post")])]),_:1},8,["visible"])],64)}}},Pt={class:"mt-3 row"},Mt={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12"},Vt={class:"mb-0 card leave-history"},At={class:"card-body"},Rt=e("h6",{class:"mb-4 text-lg font-semibold text-gray-900 modal-title"},"Org Leave Balance",-1),Et={class:"mt-3 row"},Bt={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12"},Ut={class:"mb-0 card leave-history"},Yt={class:"card-body"},Nt=e("h6",{class:"mb-4 text-lg font-semibold text-gray-900 modal-title"},"Org Leave history",-1),It=e("div",null,null,-1),Ot={key:0},Ft={key:1},Ht={key:1},jt={key:0},Qt={__name:"OrgLeaveDetails",setup(R){d();const n=d(),C=d(),D=d();d(),d(),d(!0);const p=d(),$=y=>{p.value.toggle(y)},x=d({global:{value:null,matchMode:L.CONTAINS},employee_name:{value:null,matchMode:L.STARTS_WITH,matchMode:L.EQUALS,matchMode:L.CONTAINS},status:{value:null,matchMode:L.EQUALS}}),T=d(["Pending","Approved","Rejected"]);return Y(()=>{}),(y,S)=>{const h=v("InputText"),b=v("Column"),M=v("DataTable"),w=v("OverlayPanel"),E=v("Dropdown"),f=v("Button");return c(),_(V,null,[e("div",Pt,[e("div",Mt,[e("div",Vt,[e("div",At,[Rt,e("div",null,[a(M,{value:C.value,rows:5,rowsPerPageOptions:[5,10,25],paginator:!0,responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",filters:x.value,"onUpdate:filters":S[0]||(S[0]=t=>x.value=t),filterDisplay:"menu",globalFilterFields:["name","status"]},{default:o(()=>[a(b,{field:"employee_name",header:"Employee Name",style:{"min-width":"15rem"}},{body:o(t=>[g(s(t.data.employee_name),1)]),filter:o(({filterModel:t,filterCallback:u})=>[a(h,{modelValue:t.value,"onUpdate:modelValue":l=>t.value=l,onInput:l=>u(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),(c(!0),_(V,null,U(n.value,t=>(c(),F(b,{key:t.id,header:t,field:"array_leave_details"},{body:o(({data:u})=>[g(s(u.array_leave_details[t]),1)]),_:2},1032,["header"]))),128))]),_:1},8,["value","filters"])])])])])]),e("div",Et,[e("div",Bt,[e("div",Ut,[e("div",Yt,[Nt,e("div",null,[a(M,{value:D.value,paginator:!0,rows:5,dataKey:"id",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:x.value,"onUpdate:filters":S[1]||(S[1]=t=>x.value=t),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:o(()=>[g(" No Employee data..... ")]),loading:o(()=>[g(" Loading customers data. Please wait. ")]),default:o(()=>[a(b,{field:"employee_name",header:"Employee Name"},{body:o(t=>[It,g(" "+s(t.data.employee_name),1)]),filter:o(({filterModel:t,filterCallback:u})=>[a(h,{modelValue:t.value,"onUpdate:modelValue":l=>t.value=l,onInput:l=>u(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),a(b,{field:"leave_type",header:"Leave Type",style:{"min-width":"8rem"}}),a(b,{field:"start_date",header:"Start Date"},{body:o(t=>[g(s(i(O)(t.data.start_date).format("DD-MM-YYYY")),1)]),_:1}),a(b,{field:"end_date",header:"End Date",dataType:"date"},{body:o(t=>[g(s(i(O)(t.data.end_date).format("DD-MM-YYYY")),1)]),_:1}),a(b,{field:"leave_reason",header:"Leave Reason",style:{"min-width":"12rem"}},{body:o(t=>[t.data.leave_reason&&t.data.leave_reason.length>70?(c(),_("div",Ot,[e("p",{onClick:$,class:"font-medium text-orange-400 underline cursor-pointer"}," explore more... "),a(w,{ref_key:"overlayPanel",ref:p,style:{height:"80px"}},{default:o(()=>[g(s(t.data.leave_reason),1)]),_:2},1536)])):(c(),_("div",Ft,s(t.data.leave_reason??""),1))]),_:1}),a(b,{field:"reviewer_name",header:"Approver Name"}),a(b,{field:"reviewer_comments",header:"Approver Comments"}),a(b,{field:"status",header:"Status",icon:"pi pi-check"},{body:o(({data:t})=>[e("span",{class:A("customer-badge status-"+t.status)},s(t.status),3)]),filter:o(({filterModel:t,filterCallback:u})=>[a(E,{modelValue:t.value,"onUpdate:modelValue":l=>t.value=l,onClick:l=>u(),options:T.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:o(l=>[l.value?(c(),_("span",{key:0,class:A("customer-badge status-"+l.value)},s(l.value),3)):(c(),_("span",Ht,s(l.placeholder),1))]),option:o(l=>[e("span",{class:A("customer-badge status-"+l.option)},s(l.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onClick","options"])]),_:1}),a(b,{field:"",header:"Action",style:{"min-width":"15rem"}},{body:o(t=>[t.data.status=="Pending"?(c(),_("span",jt,[a(f,{type:"button",icon:"pi pi-check-circle",class:"p-button-success text-white Button py-2.5",label:"Approve",onClick:u=>y.showConfirmDialog(t.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),a(f,{type:"button",icon:"pi pi-times-circle",class:"text-white p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2em"},onClick:u=>y.showConfirmDialog(t.data,"Reject")},null,8,["onClick"])])):j("",!0)]),_:1})]),_:1},8,["value","filters"])])])])])])],64)}}},qt={class:"card top-line"},Wt={class:"card-body"},zt={class:"row"},Gt=e("div",{class:"col-sm-12 col-xl-12 col-md-12 col-lg-12"},[e("h6",{class:"mb-4 text-lg font-semibold text-gray-900 modal-title"},"Team Leave Balance")],-1),Kt={class:"mt-3 row"},Jt={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12"},Xt={class:"mb-0 card leave-history"},Zt={class:"card-body"},ea=e("h6",{class:"mb-4 text-lg font-semibold text-gray-900 modal-title"},"Team Leave history",-1),ta={class:"table-responsive"},aa={class:"d-flex justify-content-end"},oa=e("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),sa=e("div",{id:"team_leaveHistory",class:"custom_gridJs"},null,-1),la={key:0},na={key:1},ia={key:1},da={__name:"TeamLeaveDetails",setup(R){const n=N();d();const C=d(),D=d();d(),d(),d(!0),d();const p=d(),$=d({employee_name:{value:null,matchMode:L.STARTS_WITH,matchMode:L.EQUALS,matchMode:L.CONTAINS},status:{value:null,matchMode:L.EQUALS}}),x=d(["Pending","Approved","Rejected"]);return Y(async()=>{await n.getTeamLeaveHistory(k().month()+1,k().year(),["Approved","Pending","Rejected"])}),(T,y)=>{const S=v("InputText"),h=v("Column"),b=v("DataTable"),M=v("Calendar"),w=v("Button"),E=v("OverlayPanel"),f=v("Dropdown");return c(),_(V,null,[e("div",qt,[e("div",Wt,[e("div",zt,[Gt,e("div",null,[a(b,{value:D.value,responsiveLayout:"scroll",paginator:!0,rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rows:5,filters:$.value,"onUpdate:filters":y[0]||(y[0]=t=>$.value=t),filterDisplay:"menu",globalFilterFields:["name"],style:{"white-space":"nowrap"}},{default:o(()=>[a(h,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:o(t=>[g(s(t.data.employee_name),1)]),filter:o(({filterModel:t,filterCallback:u})=>[a(S,{modelValue:t.value,"onUpdate:modelValue":l=>t.value=l,onInput:l=>u(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),(c(!0),_(V,null,U(C.value,t=>(c(),F(h,{header:t,key:t.id,field:"array_leave_details"},{body:o(({data:u})=>[g(s(u.array_leave_details[t]),1)]),_:2},1032,["header"]))),128))]),_:1},8,["value","filters"])])])])]),e("div",Kt,[e("div",Jt,[e("div",Xt,[e("div",Zt,[ea,e("div",ta,[e("div",aa,[oa,a(M,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:p.value,"onUpdate:modelValue":y[1]||(y[1]=t=>p.value=t),style:{border:"1px solid orange","border-radius":"7px",height:"38px"}},null,8,["modelValue"]),a(w,{class:"h-10 mb-2 btn btn-orange",label:"Submit",onClick:y[2]||(y[2]=t=>i(n).getTeamLeaveHistory(p.value.getMonth()+1,p.value.getFullYear(),x.value))})]),sa,a(b,{value:i(n).array_teamLeaveHistory,responsiveLayout:"scroll",paginator:!0,rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rows:5,filters:$.value,"onUpdate:filters":y[4]||(y[4]=t=>$.value=t),filterDisplay:"menu",globalFilterFields:["name"],style:{"white-space":"nowrap"}},{empty:o(()=>[g(" No Employee data..... ")]),default:o(()=>[a(h,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:o(t=>[g(s(t.data.employee_name),1)]),filter:o(({filterModel:t,filterCallback:u})=>[a(S,{modelValue:t.value,"onUpdate:modelValue":l=>t.value=l,onInput:l=>u(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),a(h,{field:"leave_type",header:"Leave Type"}),a(h,{field:"start_date",header:"Start Date"},{body:o(t=>[g(s(i(k)(t.data.start_date).format("DD-MMM-YYYY")),1)]),_:1}),a(h,{field:"end_date",header:"End Date"},{body:o(t=>[g(s(i(k)(t.data.end_date).format("DD-MMM-YYYY")),1)]),_:1}),a(h,{field:"leave_reason",header:"Leave Reason"},{body:o(t=>[t.data.leave_reason&&t.data.leave_reason.length>70?(c(),_("div",la,[e("p",{onClick:y[3]||(y[3]=(...u)=>T.toggle&&T.toggle(...u)),class:"font-medium text-orange-400 underline cursor-pointer"}," explore more... "),a(E,{ref:"overlayPanel",style:{height:"80px"}},{default:o(()=>[g(s(t.data.leave_reason),1)]),_:2},1536)])):(c(),_("div",na,s(t.data.leave_reason??""),1))]),_:1}),a(h,{field:"status",header:"Status"},{body:o(({data:t})=>[e("span",{class:A("customer-badge status-"+t.status)},s(t.status),3)]),filter:o(({filterModel:t,filterCallback:u})=>[a(f,{modelValue:t.value,"onUpdate:modelValue":l=>t.value=l,onChange:l=>u(),options:x.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:o(l=>[l.value?(c(),_("span",{key:0,class:A("customer-badge status-"+l.value)},s(l.value),3)):(c(),_("span",ia,s(l.placeholder),1))]),option:o(l=>[e("span",{class:A("customer-badge status-"+l.option)},s(l.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1})]),_:1},8,["value","filters"])])])])])])],64)}}};const ra={class:"Leave_dashboard mt-30"},ca=e("div",{class:"pt-1 pb-0 mb-3 tw-card left-line"},[e("div",{class:"flex justify-between"},[e("ul",{class:"nav nav-pills nav-tabs-dashed",role:"tablist"},[e("li",{class:"nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#leave_balance","aria-selected":"true",role:"tab"}," Leave Balance")]),e("li",{class:"nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 mx-4 nav-link","data-bs-toggle":"tab",href:"#team_leaveBalance","aria-selected":"false",tabindex:"-1",role:"tab"}," Team Leave Balance")]),e("li",{class:"nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#org_leave","aria-selected":"false",tabindex:"-1",role:"tab"}," Org Leave Balance")])]),e("div",{class:"flex items-center"},[e("div",{class:"mr-3"},[e("div",{class:"input-group me-2"},[e("label",{class:"input-group-text",for:"inputGroupSelect01"},[e("i",{class:"fa fa-calendar text-primary","aria-hidden":"true"})]),e("select",{class:"form-select btn-line-primary",id:"inputGroupSelect01"})])]),e("div",{class:""},[e("a",{href:"/attendance-leave-policydocument",id:"",class:"btn btn-orange",role:"button","aria-expanded":"false"}," Leave Policy Explanation ")])])])],-1),ma={class:"tab-content",id:"pills-tabContent"},pa={class:"tab-pane show fade active",id:"leave_balance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},ua={class:"tab-pane fade show",id:"team_leaveBalance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},_a={class:"tab-pane show",id:"org_leave",role:"tabpanel","aria-labelledby":"pills-profile-tab"},va=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),ha={__name:"LeaveModule",setup(R){const n=N();return Y(()=>{n.getEmployeeLeaveBalance()}),(C,D)=>{const p=v("ProgressSpinner"),$=v("Dialog");return c(),_(V,null,[e("div",ra,[ca,e("div",ma,[e("div",pa,[a(Tt)]),e("div",ua,[a(da)]),e("div",_a,[a(Qt)])])]),a($,{header:"Header",visible:i(n).canShowLoading,"onUpdate:visible":D[0]||(D[0]=x=>i(n).canShowLoading=x),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:o(()=>[a(p,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:o(()=>[va]),_:1},8,["visible"])],64)}}},m=Q(ha),ya=se();m.use(q,{ripple:!0});m.use(W);m.use(z);m.use(ce);m.use(ya);m.directive("tooltip",le);m.directive("badge",ne);m.directive("ripple",G);m.directive("styleclass",ie);m.directive("focustrap",K);m.component("Button",J);m.component("DataTable",de);m.component("Column",re);m.component("ColumnGroup",ue);m.component("Row",pe);m.component("Toast",X);m.component("ConfirmDialog",Z);m.component("Dropdown",ee);m.component("InputText",te);m.component("Dialog",ae);m.component("ProgressSpinner",me);m.component("Calendar",_e);m.component("Checkbox",ve);m.component("Chips",he);m.component("MultiSelect",ye);m.component("Textarea",ge);m.component("OverlayPanel",fe);m.mount("#LeaveModule");
