import{S as W}from"./Service-27f748d6.js";import{Q as r,o as c,c as m,d as e,g as a,F as H,f as Q,t as i,aa as l,a7 as k,ae as I,h,w as n,l as w,n as B,p as z,a as N,b as K}from"./inputnumber.esm-a7c5b1f0.js";import"./moment-fbc5633a.js";import{d as G}from"./pinia-4be28dc8.js";import{a as M}from"./index-362795f3.js";import{d as x}from"./dayjs.min-2f06af28.js";import{_ as J}from"./LeaveApply-f15bd940.js";import"./LeaveApply.vue_vue_type_style_index_0_lang-9d0c03c3.js";import{L as X}from"./LoadingSpinner-bbcf6d6b.js";import"./index.esm-ddbf59fa.js";import"./toastservice.esm-c9da6ad1.js";/* empty css                                                                       */import"./_plugin-vue_export-helper-c27b6911.js";const j=G("useLeaveModuleStore",()=>{W();const D=r(!0),o=r(),y=r(),L=r(),v=r(),S=r(),C=r(),_=r(),d=r(),R=r(),s=r(),T=r(),$=r(!1),E=r({}),U=f=>{$.value=!0,console.log(f),E.value={...f},E.emp_name=f.name};async function O(){D.value=!0;let f="/get-employee-leave-balance";await M.get(f).then(b=>{console.log(b.data),o.value=b.data,y.value=b.data["Avalied Leaves"]}).finally(()=>{D.value=!1})}async function t(f){await M.post("/leave/withdrawLeave",{leave_id:f}).then(b=>{console.log("performLeaveWithdraw() : "+b.data)}).finally(()=>{D.value=!1})}async function g(f,b,V){let P=0;await M.get(window.location.origin+"/currentUserCode ").then(Y=>{P=Y.data}),await M.post("/attendance/getEmployeeLeaveDetails",{user_code:P,filter_month:f,filter_year:b,filter_leave_status:V}).then(Y=>{L.value=Y.data.data,console.log("getEmployeeLeaveHistory() : "+Y.data)}).finally(()=>{D.value=!1})}async function u(f,b,V){let P=0;await M.get(window.location.origin+"/currentUserCode ").then(Y=>{P=Y.data}),M.post("/attendance/getTeamEmployeesLeaveDetails",{manager_code:P,filter_month:f,filter_year:b,filter_leave_status:V}).then(Y=>{v.value=Y.data.data,console.log("getTeamLeaveHistory() : "+Y.data)}).finally(()=>{D.value=!1})}async function p(f,b,V){M.post("/attendance/getAllEmployeesLeaveDetails",{filter_month:f,filter_year:b,filter_leave_status:V}).then(P=>{S.value=P.data.data,console.log("getOrgLeaveHistory() : "+P.data.data)}).finally(()=>{D.value=!1})}async function F(f){M.post("/attendance/getLeaveInformation",{record_id:f}).then(b=>{T.value=b.data.data,console.log("getLeaveInformation() : "+b.data)}).finally(()=>{D.value=!1})}async function A(f,b){await M.post("/fetch-org-leaves-balance",{start_date:f,end_date:b}).then(V=>{C.value=V.data}).finally(()=>{D.value=!1})}async function q(f,b){console.log(f,b),M.post("/fetch-team-leave-balance",{start_date:f,end_date:b}).then(V=>{s.value=V.data}).finally(()=>{D.value=!1})}return{canShowLoading:D,canShowLeaveDetails:$,setLeaveDetails:E,getLeaveDetails:U,array_employeeLeaveHistory:L,array_teamLeaveHistory:v,array_orgLeaveHistory:S,array_employeeLeaveBalance:o,array_employeeAvailedLeaveBalance:y,array_orgLeaveBalance:C,selectedStartDate:_,selectedEndDate:d,canshowloadingsrceen:R,arrayTermLeaveBalance:s,performLeaveWithdraw:t,getEmployeeLeaveHistory:g,getTeamLeaveHistory:u,getAllEmployeesLeaveHistory:p,getLeaveInformation:F,getEmployeeLeaveBalance:O,getOrgLeaveBalance:A,getTermLeaveBalance:q}}),Z={class:"mb-3 card"},ee={class:"card-body"},te={class:"mb-2 row"},ae=e("div",{class:"col-sm-6 col-xl-6 col-md-6 col-lg-6"},[e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Leave balance")],-1),le={class:"col-6 justify-content-end d-flex"},oe={class:"grid gap-4 md:grid-cols-4 sm:grid-cols-1 xxl:grid-cols-6 xl:grid-cols-6 lg:grid-cols-5",style:{display:"grid"}},se={class:"my-1 lg:text-[12px] font-semibold text-center md:text-[10px] xl:text-[13px]"},ne={class:"my-1 text-xl font-semibold text-center"},de={key:0,class:"text-lg font-semibold"},ie={key:1,class:"text-lg font-semibold"},re={class:"card"},ce={class:"card-body"},ue=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Leave Availed",-1),me={class:"grid gap-4 md:grid-cols-4 sm:grid-cols-1 xxl:grid-cols-6 xl:grid-cols-6 lg:grid-cols-5",style:{display:"grid"}},ve={class:"text-center"},_e={class:"my-1 lg:text-[12px] font-semibold text-center md:text-[10px] xl:text-[13px]"},pe={class:"my-1 text-xl font-semibold text-center"},he={key:0,class:"text-lg font-semibold"},ye={key:1,class:"text-lg font-semibold"},ge={__name:"EmployeeLeaveBalance",setup(D){const o=j();return(y,L)=>(c(),m(H,null,[e("div",Z,[e("div",ee,[e("div",te,[ae,e("div",le,[a(J)])]),e("div",oe,[(c(!0),m(H,null,Q(l(o).array_employeeLeaveBalance,v=>(c(),m("div",{key:v,class:"p-1 my-2 rounded-lg border bg-gray-100 hover:bg-slate-100 cursor-pointer"},[e("p",se,i(v.leave_type),1),e("p",ne,[v.leave_balance==""?(c(),m("span",de,"0")):(c(),m("span",ie,i(v.leave_balance),1))])]))),128))])])]),e("div",re,[e("div",ce,[ue,e("div",me,[(c(!0),m(H,null,Q(l(o).array_employeeLeaveBalance,v=>(c(),m("div",{class:"bg-gray-100 border-l-4 border-indigo-300 p-1 rounded-lg border my-2 cursor-pointer hover:bg-slate-100",key:v},[e("div",ve,[e("p",_e,i(v.leave_type),1),e("p",pe,[v.availed_leaves==""?(c(),m("span",he,"0")):(c(),m("span",ye,i(v.availed_leaves),1))])])]))),128))])])])],64))}},fe={class:"mt-3 row"},xe={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12"},be={class:"mb-0 card leave-history"},we={class:"card-body"},Le={class:"flex justify-between"},De=e("div",null,[e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins] mb-4"}," Leave history ")],-1),$e={class:"d-flex justify-content-end mb-2"},Se=e("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),Ce={class:"table-responsive"},ke={key:0},Re={key:1},Ae={key:1},Te={class:"flex justify-center"},Me={class:"w-full"},Ee={class:"w-full"},Ve={class:"border w-full rounded-lg"},Ye={class:"p-3 pl-5 d-flex align-items-center border"},Be={class:"rounded-circle shadow-sm d-flex justify-content-center align-items-center bg-yellow-100",style:{width:"80px",height:"80px"}},Pe={class:"text-3xl font-semibold"},Ue={class:"ml-5"},Oe={class:"text-lg font-semibold"},He={class:"fs-6 text-neutral-400"},Ne={class:"border w-full d-flex py-4 px-4"},je={class:"mx-2 p-1 rounded-lg"},Fe={class:"text-center py-1 px-2 text-light rounded-top fw-bold",style:{"background-color":"navy"}},Ie={class:"text-center py-1 px-2 fs-5 fw-bold"},Qe={class:"text-center py-1 px-2 fs-6 fw-bold"},We={class:"py-3"},qe={class:"text-lg font-semibold text-primary-800"},ze={class:"font-semibold text-xs"},Ke={class:"border w-full py-4 px-4"},Ge=e("h1",{class:"text-lg font-semibold"},"Notified To:",-1),Je={class:"card px-3 py-2 d-flex mt-3",style:{"min-width":"250px","max-width":"300px",display:"flex"}},Xe={class:"d-flex p-2 align-items-center"},Ze={class:"rounded-circle bg-blue-100 d-flex justify-content-center align-items-center",style:{width:"40px",height:"40px"}},et={class:"flex-column px-3"},tt={class:"fs-6 fw-bold"},at={class:"py-2 text-neutral-400"},lt={class:"border w-full py-4 px-4"},ot=e("h1",{class:"text-lg font-semibold"},"Approved by",-1),st={class:"card px-3 py-2 d-flex mt-3",style:{"min-width":"180px","max-width":"300px",display:"flex"}},nt={class:"d-flex p-2 align-items-center"},dt=e("div",{class:"rounded-circle bg-green-400 d-flex justify-content-center align-items-center",style:{width:"40px",height:"40px"}},[e("i",{class:"pi pi-check text-light"})],-1),it={class:"flex-column px-3"},rt={class:"fs-6 fw-bold"},ct={class:"py-2 text-neutral-400"},ut={class:"my-4 mx-3"},mt={class:"text-end mx-4 my-4"},vt={__name:"EmployeeLeaveDetails",setup(D){const o=j(),y=r(!0),L=r(),v=r(),S=R=>{L.value.toggle(R)},C=r({global:{value:null,matchMode:k.CONTAINS},employee_name:{value:null,matchMode:k.STARTS_WITH,matchMode:k.EQUALS,matchMode:k.CONTAINS},status:{value:null,matchMode:k.EQUALS}}),_=r(["Pending","Approved","Rejected"]);I(async()=>{await o.getEmployeeLeaveHistory(x().month()+1,x().year(),["Approved","Pending","Rejected"]),y.value=!1});function d(){o.canShowLeaveDetails=!1}return(R,s)=>{const T=h("Calendar"),$=h("Column"),E=h("OverlayPanel"),U=h("Dropdown"),O=h("Button"),t=h("DataTable"),g=h("Textarea"),u=h("Dialog");return c(),m(H,null,[a(ge),e("div",fe,[e("div",xe,[e("div",be,[e("div",we,[e("div",Le,[De,e("div",$e,[Se,a(T,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:v.value,"onUpdate:modelValue":s[0]||(s[0]=p=>v.value=p),style:{"border-radius":"7px",height:"30px"},onDateSelect:s[1]||(s[1]=p=>(l(o).getEmployeeLeaveHistory(v.value.getMonth()+1,v.value.getFullYear(),_.value),l(o).canShowLoading=!0))},null,8,["modelValue"])])]),e("div",Ce,[a(t,{value:l(o).array_employeeLeaveHistory,paginator:!0,rows:5,dataKey:"id",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:C.value,"onUpdate:filters":s[2]||(s[2]=p=>C.value=p),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:n(()=>[w(" No Employee data..... ")]),default:n(()=>[a($,{field:"leave_type",header:"Leave Type",style:{"min-width":"14rem"}}),a($,{field:"start_date",header:"Start Date",style:{"min-width":"8rem"}},{body:n(p=>[w(i(l(x)(p.data.start_date).format("DD-MMM-YYYY")),1)]),_:1}),a($,{field:"end_date",header:"End Date",dataType:"date",style:{"min-width":"8rem"}},{body:n(p=>[w(i(l(x)(p.data.end_date).format("DD-MMM-YYYY")),1)]),_:1}),a($,{field:"leave_reason",header:"Leave Reason",style:{"min-width":"12rem"}},{body:n(p=>[p.data.leave_reason&&p.data.leave_reason.length>70?(c(),m("div",ke,[e("p",{onClick:S,class:"font-medium text-orange-400 underline cursor-pointer"}," explore more... "),a(E,{ref_key:"overlayPanel",ref:L,style:{height:"80px"}},{default:n(()=>[w(i(p.data.leave_reason),1)]),_:2},1536)])):(c(),m("div",Re,i(p.data.leave_reason??""),1))]),_:1}),a($,{field:"reviewer_name",header:"Approver Name"}),a($,{field:"reviewer_comments",header:"Approver Comments"}),a($,{field:"status",header:"Status",icon:"pi pi-check"},{body:n(({data:p})=>[e("span",{class:B("customer-badge status-"+p.status)},i(p.status),3)]),filter:n(({filterModel:p,filterCallback:F})=>[a(U,{modelValue:p.value,"onUpdate:modelValue":A=>p.value=A,onChange:A=>F(),options:_.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:n(A=>[A.value?(c(),m("span",{key:0,class:B("customer-badge status-"+A.value)},i(A.value),3)):(c(),m("span",Ae,i(A.placeholder),1))]),option:n(A=>[e("span",{class:B("customer-badge status-"+A.option)},i(A.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),a($,{field:"",header:"Action",style:{"min-width":"15rem"}},{body:n(p=>[e("div",Te,[a(O,{type:"button",icon:"",class:"text-white bg-black Button py-2.5 mx-auto",label:"View",onClick:F=>l(o).getLeaveDetails(p.data),style:{height:"2em"}},null,8,["onClick"])])]),_:1})]),_:1},8,["value","filters"])])])])])]),a(u,{header:"Header",visible:l(o).canShowLeaveDetails,"onUpdate:visible":s[4]||(s[4]=p=>l(o).canShowLeaveDetails=p),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"50vw",borderTop:"5px solid #002f56"},modal:!0,closable:!0,closeOnEscape:!0},{header:n(()=>[e("div",Me,[e("h5",{style:z({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"}),class:"text-xl font-semibold"}," Leave Details Request",4)])]),default:n(()=>[e("div",Ee,[e("div",Ve,[e("div",Ye,[e("div",Be,[e("h1",Pe,i(l(o).setLeaveDetails.user_short_name),1)]),e("div",Ue,[e("h1",Oe,i(l(o).setLeaveDetails.name),1),e("div",null,[e("p",He,"Requested on "+i(l(o).setLeaveDetails.leaverequest_date),1)])])]),e("div",Ne,[e("div",je,[e("h1",Fe,i(l(x)(l(o).setLeaveDetails.end_date).format("MMM")),1),e("h1",Ie,i(l(x)(l(o).setLeaveDetails.end_date).format("DD")),1),e("h1",Qe,i(l(x)(l(o).setLeaveDetails.end_date).format("dddd")),1)]),e("div",We,[e("h1",qe,[w(i(l(o).setLeaveDetails.total_leave_datetime)+" Day of "+i(l(o).setLeaveDetails.leave_type)+" ",1),e("span",ze," ("+i(l(o).setLeaveDetails.leave_reason)+") ",1)])])]),e("div",Ke,[Ge,e("div",Je,[e("div",Xe,[e("div",Ze,i(l(o).setLeaveDetails.reviewer_short_name),1),e("div",et,[e("h1",tt,i(l(o).setLeaveDetails.reviewer_name),1),e("h1",at,i(l(o).setLeaveDetails.reviewer_designation),1)])])])]),e("div",lt,[ot,e("div",st,[e("div",nt,[dt,e("div",it,[e("h1",rt,i(l(o).setLeaveDetails.reviewer_name),1),e("h1",ct," on "+i(l(x)(l(o).setLeaveDetails.leaverequest_date).format("DD-MMM-YYYY hh: mm:ss A")),1)])])])]),e("div",ut,[a(g,{name:"",id:"",cols:"70",rows:"3",autoResize:"",placeholder:"Add Comment"})])])]),e("div",mt,[l(o).setLeaveDetails.can_withdraw_leave!==null&&l(o).setLeaveDetails.can_withdraw_leave?(c(),m("button",{key:0,class:"btn btn-orange px-5 mx-2",onClick:s[3]||(s[3]=p=>l(o).performLeaveWithdraw(l(o).setLeaveDetails.id))},"Withdraw")):N("",!0),l(o).setLeaveDetails.can_revoke_leave!==null&&l(o).setLeaveDetails.can_revoke_leave?(c(),m("button",{key:1,class:"btn btn-orange px-5 mx-2",onClick:d},"Revoke")):N("",!0),e("button",{class:"btn btn-orange px-5",onClick:d},"Post")])]),_:1},8,["visible"])],64)}}},_t={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12 d-flex justify-content-between align-content-center"},pt=e("h6",{class:"h-7 mt-3 text-lg font-semibold text-gray-900 modal-title"},"Org Leave Balance",-1),ht={class:"my-2 d-flex justify-content-between align-items-center"},yt=e("div",null,null,-1),gt={class:"d-flex"},ft={class:""},xt=e("label",{for:" ",class:"text-lg font-semibold"},"Start Date",-1),bt={class:""},wt=e("label",{for:" ",class:"text-lg font-semibold mx-2"},"End Date",-1),Lt={class:"mt-3 row"},Dt={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12"},$t={class:"flex justify-between"},St=e("div",null,[e("h6",{class:"mb-4 text-lg font-semibold text-gray-900 modal-title"},"Org Leave history")],-1),Ct={class:"d-flex justify-content-end"},kt=e("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),Rt={class:"table-responsive"},At={key:0},Tt={key:1},Mt={key:1},Et={__name:"OrgLeaveDetails",setup(D){const o=j();r(),r(),r(!0);const y=r(),L=r([]),v=r();r();const S=r({employee_name:{value:null,matchMode:k.STARTS_WITH,matchMode:k.EQUALS,matchMode:k.CONTAINS},status:{value:null,matchMode:k.EQUALS}}),C=r(["Pending","Approved","Rejected"]);return I(async()=>{await o.getOrgLeaveBalance(),await o.getAllEmployeesLeaveHistory(x().month()+1,x().year(),["Approved","Pending","Rejected"]),console.log("Org Leave details : "+o.array_orgLeaveHistory)}),(_,d)=>{const R=h("Calendar"),s=h("Column"),T=h("DataTable"),$=h("InputText"),E=h("OverlayPanel"),U=h("Dropdown"),O=h("Button");return c(),m(H,null,[e("div",_t,[pt,e("div",ht,[yt,e("div",gt,[e("div",ft,[xt,a(R,{modelValue:l(o).selectedStartDate,"onUpdate:modelValue":d[0]||(d[0]=t=>l(o).selectedStartDate=t),dateFormat:"dd-mm-yy",class:"pl-3",style:{"border-radius":"7px",height:"30px",width:"100px"},maxDate:new Date},null,8,["modelValue","maxDate"])]),e("div",bt,[wt,a(R,{class:"mr-3",modelValue:l(o).selectedEndDate,"onUpdate:modelValue":d[1]||(d[1]=t=>l(o).selectedEndDate=t),dateFormat:"dd-mm-yy",style:{"border-radius":"7px",height:"30px",width:"100px"},maxDate:new Date},null,8,["modelValue","maxDate"])]),e("button",{class:"btn-orange py-1 px-4 rounded",style:{height:"30px"},onClick:d[2]||(d[2]=t=>l(o).getOrgLeaveBalance(l(x)(l(o).selectedStartDate).format("YYYY-MM-DD"),l(x)(l(o).selectedEndDate).format("YYYY-MM-DD")))},"submit")])])]),a(T,{value:l(o).array_orgLeaveBalance,paginator:!0,rows:10,class:"",dataKey:"user_code",onRowExpand:_.onRowExpand,onRowCollapse:_.onRowCollapse,expandedRows:L.value,"onUpdate:expandedRows":d[4]||(d[4]=t=>L.value=t),selection:v.value,"onUpdate:selection":d[5]||(d[5]=t=>v.value=t),selectAll:_.selectAll,onSelectAllChange:_.onSelectAllChange,onRowSelect:_.onRowSelect,onRowUnselect:_.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{expansion:n(t=>[e("div",null,[a(T,{value:t.data.leave_balance_details,responsiveLayout:"scroll",selection:v.value,"onUpdate:selection":d[3]||(d[3]=g=>v.value=g),selectAll:_.selectAll,onSelectAllChange:_.onSelectAllChange},{default:n(()=>[a(s,{field:"leave_type",header:"Leave Type"},{default:n(()=>[w(i(t.data.leave_type),1)]),_:2},1024),a(s,{field:"opening_balance",header:"Opening Balance"}),a(s,{field:"availed",header:"availed"}),a(s,{field:"closing_balance",header:"Closing Balance"})]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:n(()=>[a(s,{expander:!0}),a(s,{field:"user_code",header:"Employee Id",sortable:""}),a(s,{field:"name",header:"Employee Name"}),a(s,{field:"location",header:"Location",sortable:!1}),a(s,{field:"department",header:"Department"}),a(s,{field:"total_leave_balance",header:"Total Leave Balance"})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"]),e("div",Lt,[e("div",Dt,[e("div",$t,[St,e("div",Ct,[kt,a(R,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:y.value,"onUpdate:modelValue":d[6]||(d[6]=t=>y.value=t),style:{"border-radius":"7px",height:"30px"},onDateSelect:d[7]||(d[7]=t=>l(o).getAllEmployeesLeaveHistory(y.value.getMonth()+1,y.value.getFullYear(),C.value))},null,8,["modelValue"])])]),e("div",Rt,[a(T,{value:l(o).array_orgLeaveHistory,responsiveLayout:"scroll",paginator:!0,rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rows:5,filters:S.value,"onUpdate:filters":d[9]||(d[9]=t=>S.value=t),filterDisplay:"menu",globalFilterFields:["name"],style:{"white-space":"nowrap"}},{empty:n(()=>[w(" No Employee data..... ")]),default:n(()=>[a(s,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:n(t=>[w(i(t.data.employee_name),1)]),filter:n(({filterModel:t,filterCallback:g})=>[a($,{modelValue:t.value,"onUpdate:modelValue":u=>t.value=u,onInput:u=>g(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),a(s,{field:"leave_type",header:"Leave Type"}),a(s,{field:"start_date",header:"Start Date"},{body:n(t=>[w(i(l(x)(t.data.start_date).format("DD-MMM-YYYY")),1)]),_:1}),a(s,{field:"end_date",header:"End Date"},{body:n(t=>[w(i(l(x)(t.data.end_date).format("DD-MMM-YYYY")),1)]),_:1}),a(s,{field:"total_leave_datetime",header:"Total Leave Days"}),a(s,{field:"leave_reason",header:"Leave Reason"},{body:n(t=>[t.data.leave_reason&&t.data.leave_reason.length>70?(c(),m("div",At,[e("p",{onClick:d[8]||(d[8]=(...g)=>_.toggle&&_.toggle(...g)),class:"font-medium text-orange-400 underline cursor-pointer"}," More... "),a(E,{ref:"overlayPanel",style:{height:"80px"}},{default:n(()=>[w(i(t.data.leave_reason),1)]),_:2},1536)])):(c(),m("div",Tt,i(t.data.leave_reason??""),1))]),_:1}),a(s,{field:"status",header:"Status"},{body:n(({data:t})=>[e("span",{class:B("customer-badge status-"+t.status)},i(t.status),3)]),filter:n(({filterModel:t,filterCallback:g})=>[a(U,{modelValue:t.value,"onUpdate:modelValue":u=>t.value=u,onChange:u=>g(),options:C.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:n(u=>[u.value?(c(),m("span",{key:0,class:B("customer-badge status-"+u.value)},i(u.value),3)):(c(),m("span",Mt,i(u.placeholder),1))]),option:n(u=>[e("span",{class:B("customer-badge status-"+u.option)},i(u.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),a(s,{field:"",header:"Action",style:{"min-width":"15rem"}},{body:n(t=>[a(O,{type:"button",icon:"",class:"text-white Button py-2.5",label:"View",onClick:g=>l(o).getLeaveDetails(t.data),style:{height:"2em"}},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters"])])])])],64)}}},Vt={class:"card top-line"},Yt={class:"card-body"},Bt={class:"row"},Pt={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12 d-flex justify-content-between align-items-center"},Ut=e("h6",{class:"mb-4 text-lg font-semibold text-gray-900 modal-title"},"Team Leave Balance",-1),Ot={class:"my-2 d-flex justify-content-between align-items-center"},Ht=e("div",null,null,-1),Nt={class:"d-flex"},jt={class:""},Ft=e("label",{for:" ",class:"font-semibold text-lg mx-2"},"Start Date",-1),It={class:""},Qt=e("label",{for:" ",class:"font-semibold text-lg mx-2"},"End Date",-1),Wt={class:"mt-3 row"},qt={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12"},zt={class:"mb-0 card leave-history"},Kt={class:"card-body"},Gt={class:"flex justify-between"},Jt=e("div",null,[e("h6",{class:"mb-4 text-lg font-semibold text-gray-900 modal-title"},"Team Leave history")],-1),Xt={class:"d-flex justify-content-end"},Zt=e("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),ea={class:"table-responsive"},ta={key:0},aa={key:1},la={key:1},oa={__name:"TeamLeaveDetails",setup(D){const o=j();r(),r(),r(),r(),r(),r(!0),r();const y=r([]),L=r(),v=r(),S=r({employee_name:{value:null,matchMode:k.STARTS_WITH,matchMode:k.EQUALS,matchMode:k.CONTAINS},status:{value:null,matchMode:k.EQUALS}}),C=r(["Pending","Approved","Rejected"]);return I(async()=>{await o.getTermLeaveBalance(),await o.getTeamLeaveHistory(x().month()+1,x().year(),["Approved","Pending","Rejected"])}),(_,d)=>{const R=h("Calendar"),s=h("Column"),T=h("DataTable"),$=h("InputText"),E=h("OverlayPanel"),U=h("Dropdown"),O=h("Button");return c(),m(H,null,[e("div",Vt,[e("div",Yt,[e("div",Bt,[e("div",Pt,[Ut,e("div",Ot,[Ht,e("div",Nt,[e("div",jt,[Ft,a(R,{modelValue:l(o).selectedStartDate,"onUpdate:modelValue":d[0]||(d[0]=t=>l(o).selectedStartDate=t),dateFormat:"dd-mm-yy",class:"p-l3",style:{"border-radius":"7px",height:"30px",width:"100px"},maxDate:new Date},null,8,["modelValue","maxDate"])]),e("div",It,[Qt,a(R,{class:"mr-3",modelValue:l(o).selectedEndDate,"onUpdate:modelValue":d[1]||(d[1]=t=>l(o).selectedEndDate=t),dateFormat:"dd-mm-yy",style:{"border-radius":"7px",height:"30px",width:"100px"},maxDate:new Date},null,8,["modelValue","maxDate"])]),e("button",{class:"btn-orange py-1 px-4 rounded",onClick:d[2]||(d[2]=t=>(l(o).getTermLeaveBalance(l(x)(l(o).selectedStartDate).format("YYYY-MM-DD"),l(x)(l(o).selectedEndDate).format("YYYY-MM-DD")),l(o).canShowLoading=!0))},"submit")])])]),e("div",null,[a(T,{value:l(o).arrayTermLeaveBalance,paginator:!0,rows:10,class:"",dataKey:"user_code",onRowExpand:_.onRowExpand,onRowCollapse:_.onRowCollapse,expandedRows:y.value,"onUpdate:expandedRows":d[4]||(d[4]=t=>y.value=t),selection:L.value,"onUpdate:selection":d[5]||(d[5]=t=>L.value=t),selectAll:_.selectAll,onSelectAllChange:_.onSelectAllChange,onRowSelect:_.onRowSelect,onRowUnselect:_.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{expansion:n(t=>[e("div",null,[a(T,{value:t.data.leave_balance_details,responsiveLayout:"scroll",selection:L.value,"onUpdate:selection":d[3]||(d[3]=g=>L.value=g),selectAll:_.selectAll,onSelectAllChange:_.onSelectAllChange},{default:n(()=>[a(s,{field:"leave_type",header:"Leave Type"},{default:n(()=>[w(i(t.data.leave_type),1)]),_:2},1024),a(s,{field:"opening_balance",header:"Opening Balance"}),a(s,{field:"availed",header:"availed"}),a(s,{field:"closing_balance",header:"Closing Balance"})]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:n(()=>[a(s,{style:{width:"1rem !important"},expander:!0}),a(s,{field:"user_code",header:"Employee Id",sortable:""}),a(s,{field:"name",header:"Employee Name"}),a(s,{field:"location",header:"Location",sortable:!1}),a(s,{field:"department",header:"Department"}),a(s,{field:"total_leave_balance",header:"Total Leave Balance"})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"])])])])]),e("div",Wt,[e("div",qt,[e("div",zt,[e("div",Kt,[e("div",Gt,[Jt,e("div",Xt,[Zt,a(R,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:v.value,"onUpdate:modelValue":d[6]||(d[6]=t=>v.value=t),style:{"border-radius":"7px",height:"30px"},onDateSelect:d[7]||(d[7]=t=>(l(o).getTeamLeaveHistory(v.value.getMonth()+1,v.value.getFullYear(),C.value),l(o).canShowLoading=!0))},null,8,["modelValue"])])]),e("div",ea,[a(T,{value:l(o).array_teamLeaveHistory,responsiveLayout:"scroll",paginator:!0,rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rows:5,filters:S.value,"onUpdate:filters":d[9]||(d[9]=t=>S.value=t),filterDisplay:"menu",globalFilterFields:["name"],style:{"white-space":"nowrap"}},{empty:n(()=>[w(" No Employee data..... ")]),default:n(()=>[a(s,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:n(t=>[w(i(t.data.employee_name),1)]),filter:n(({filterModel:t,filterCallback:g})=>[a($,{modelValue:t.value,"onUpdate:modelValue":u=>t.value=u,onInput:u=>g(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),a(s,{field:"leave_type",header:"Leave Type"}),a(s,{field:"start_date",header:"Start Date"},{body:n(t=>[w(i(l(x)(t.data.start_date).format("DD-MMM-YYYY")),1)]),_:1}),a(s,{field:"end_date",header:"End Date"},{body:n(t=>[w(i(l(x)(t.data.end_date).format("DD-MMM-YYYY")),1)]),_:1}),a(s,{field:"total_leave_datetime",header:"Total Leave Days"}),a(s,{field:"leave_reason",header:"Leave Reason"},{body:n(t=>[t.data.leave_reason&&t.data.leave_reason.length>70?(c(),m("div",ta,[e("p",{onClick:d[8]||(d[8]=(...g)=>_.toggle&&_.toggle(...g)),class:"font-medium text-orange-400 underline cursor-pointer"}," explore more... "),a(E,{ref:"overlayPanel",style:{height:"80px"}},{default:n(()=>[w(i(t.data.leave_reason),1)]),_:2},1536)])):(c(),m("div",aa,i(t.data.leave_reason??""),1))]),_:1}),a(s,{field:"status",header:"Status"},{body:n(({data:t})=>[e("span",{class:B("customer-badge status-"+t.status)},i(t.status),3)]),filter:n(({filterModel:t,filterCallback:g})=>[a(U,{modelValue:t.value,"onUpdate:modelValue":u=>t.value=u,onChange:u=>g(),options:C.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:n(u=>[u.value?(c(),m("span",{key:0,class:B("customer-badge status-"+u.value)},i(u.value),3)):(c(),m("span",la,i(u.placeholder),1))]),option:n(u=>[e("span",{class:B("customer-badge status-"+u.option)},i(u.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),a(s,{field:"",header:"Action",style:{"min-width":"15rem"}},{body:n(t=>[a(O,{type:"button",icon:"",class:"text-white Button py-2.5",label:"View",onClick:g=>l(o).getLeaveDetails(t.data),style:{height:"2em"}},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters"])])])])])])],64)}}},sa={class:"w-full"},na={key:0},da=e("p",{class:"font-semibold text-2xl text-[#000] font-['Poppins]"},"Leave",-1),ia=e("p",{class:"font-semibold text-sm"},[w("Here you can apply Leave,"),e("a",null,[e("span",{class:"underline cursor-pointer hover:text-indigo-500"}," Company's Leave Policy")]),w(".")],-1),ra=[da,ia],ca={key:1,class:"flex justify-between"},ua={class:"divide-x py-auto nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},ma=e("li",{class:"nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#leave_balance","aria-selected":"true",role:"tab"}," Leave Balance")],-1),va={key:0,class:"nav-item text-muted",role:"presentation"},_a=e("a",{class:"pb-2 mx-4 nav-link","data-bs-toggle":"tab",href:"#team_leaveBalance","aria-selected":"false",tabindex:"-1",role:"tab"}," Team Leave Balance",-1),pa=[_a],ha={key:1,class:"nav-item text-muted",role:"presentation"},ya=e("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#org_leave","aria-selected":"false",tabindex:"-1",role:"tab"}," Org Leave Balance",-1),ga=[ya],fa=e("div",{class:"flex items-center"},[e("div",{class:"mr-3"}),e("a",{href:"/attendance-leave-policydocument",id:"",class:"text-md font-medium border-1 border-black rounded-lg text-center bg-black text-white my-auto p-1.5 dark:text-white",role:"button","aria-expanded":"false"}," Leave Policy Explanation ")],-1),xa=e("div",null,null,-1),ba={class:"tab-content py-2",id:"pills-tabContent"},wa={class:"tab-pane show fade active",id:"leave_balance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},La={class:"tab-pane fade show",id:"team_leaveBalance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Da={class:"tab-pane show",id:"org_leave",role:"tabpanel","aria-labelledby":"pills-profile-tab"},$a=e("h6",{class:"mb-4 modal-title fs-21"}," Leave Request",-1),Oa={__name:"LeaveModule",setup(D){const o=j(),y=W(),L=r(!1);return I(async()=>{await o.getEmployeeLeaveBalance()}),(v,S)=>{const C=h("leaveapply2"),_=h("Dialog");return c(),m(H,null,[l(o).canShowLoading?(c(),K(X,{key:0,class:"absolute z-50 bg-white"})):N("",!0),e("div",sa,[e("div",null,[l(y).current_user_role==5?(c(),m("div",na,ra)):(c(),m("div",ca,[e("ul",ua,[ma,l(y).current_user_role==1||l(y).current_user_role==2||l(y).current_user_role==3||l(y).current_user_role==4?(c(),m("li",va,pa)):N("",!0),l(y).current_user_role==1||l(y).current_user_role==2||l(y).current_user_role==3?(c(),m("li",ha,ga)):N("",!0)]),fa])),xa]),e("div",ba,[e("div",wa,[a(vt)]),e("div",La,[a(oa)]),e("div",Da,[a(Et)])])]),a(_,{visible:L.value,"onUpdate:visible":S[0]||(S[0]=d=>L.value=d),style:{width:"80vw"},breakpoints:{"960px":"75vw","641px":"100vw"}},{header:n(()=>[$a]),default:n(()=>[a(C)]),_:1},8,["visible"])],64)}}};export{Oa as default};
