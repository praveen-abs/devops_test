import{S as W}from"./Service-504054d8.js";import{q as z,r as c,e as u,f as v,g as e,n as a,F as O,m as I,t as r,h as l,R as k,o as F,c as p,l as d,i as b,p as Y,H as K,j as H,k as G}from"./app-b9baa456.js";import"./moment-fbc5633a.js";import{a as T}from"./index-362795f3.js";import{d as f}from"./dayjs.min-2f06af28.js";import{_ as J}from"./LeaveApply-9dddc8e3.js";import"./LeaveApply.vue_vue_type_style_index_0_lang-054d4c4b.js";import{L as X}from"./LoadingSpinner-1abd2939.js";import"./index.esm-bb9d444b.js";/* empty css                                                                       */const N=z("useLeaveModuleStore",()=>{W();const L=c(!0),o=c(),h=c(),w=c(),_=c(),$=c(),S=c(),m=c(),i=c(),C=c(),n=c(),A=c(),D=c(!1),M=c({}),U=g=>{D.value=!0,console.log(g),M.value={...g},M.emp_name=g.name};async function B(){L.value=!0;let g="/get-employee-leave-balance";await T.get(g).then(x=>{console.log(x.data),o.value=x.data,h.value=x.data["Avalied Leaves"]}).finally(()=>{L.value=!1})}async function t(g){await T.post("/leave/withdrawLeave",{leave_id:g}).then(x=>{console.log("performLeaveWithdraw() : "+x.data)}).finally(()=>{L.value=!1})}async function y(g,x,E){let P=0;await T.get(window.location.origin+"/currentUserCode ").then(V=>{P=V.data}),await T.post("/attendance/getEmployeeLeaveDetails",{user_code:P,filter_month:g,filter_year:x,filter_leave_status:E}).then(V=>{w.value=V.data.data,console.log("getEmployeeLeaveHistory() : "+V.data)}).finally(()=>{L.value=!1})}async function s(g,x,E){let P=0;await T.get(window.location.origin+"/currentUserCode ").then(V=>{P=V.data}),T.post("/attendance/getTeamEmployeesLeaveDetails",{manager_code:P,filter_month:g,filter_year:x,filter_leave_status:E}).then(V=>{_.value=V.data.data,console.log("getTeamLeaveHistory() : "+V.data)}).finally(()=>{L.value=!1})}async function j(g,x,E){T.post("/attendance/getAllEmployeesLeaveDetails",{filter_month:g,filter_year:x,filter_leave_status:E}).then(P=>{$.value=P.data.data,console.log("getOrgLeaveHistory() : "+P.data.data)}).finally(()=>{L.value=!1})}async function R(g){T.post("/attendance/getLeaveInformation",{record_id:g}).then(x=>{A.value=x.data.data,console.log("getLeaveInformation() : "+x.data)}).finally(()=>{L.value=!1})}async function q(g,x){await T.post("/fetch-org-leaves-balance",{start_date:g,end_date:x}).then(E=>{S.value=E.data}).finally(()=>{L.value=!1})}async function Q(g,x){console.log(g,x),T.post("/fetch-team-leave-balance",{start_date:g,end_date:x}).then(E=>{n.value=E.data}).finally(()=>{L.value=!1})}return{canShowLoading:L,canShowLeaveDetails:D,setLeaveDetails:M,getLeaveDetails:U,array_employeeLeaveHistory:w,array_teamLeaveHistory:_,array_orgLeaveHistory:$,array_employeeLeaveBalance:o,array_employeeAvailedLeaveBalance:h,array_orgLeaveBalance:S,selectedStartDate:m,selectedEndDate:i,canshowloadingsrceen:C,arrayTermLeaveBalance:n,performLeaveWithdraw:t,getEmployeeLeaveHistory:y,getTeamLeaveHistory:s,getAllEmployeesLeaveHistory:j,getLeaveInformation:R,getEmployeeLeaveBalance:B,getOrgLeaveBalance:q,getTermLeaveBalance:Q}}),Z={class:"mb-3 card"},ee={class:"card-body"},te={class:"mb-2 row"},ae=e("div",{class:"col-sm-6 col-xl-6 col-md-6 col-lg-6"},[e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Leave balance")],-1),le={class:"col-6 justify-content-end d-flex"},oe={class:"grid gap-4 md:grid-cols-4 sm:grid-cols-1 xxl:grid-cols-6 xl:grid-cols-6 lg:grid-cols-5",style:{display:"grid"}},se={class:"my-1 lg:text-[12px] font-semibold text-center md:text-[10px] xl:text-[13px]"},ne={class:"my-1 text-xl font-semibold text-center"},de={key:0,class:"text-lg font-semibold"},ie={key:1,class:"text-lg font-semibold"},re={class:"card"},ce={class:"card-body"},ue=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Leave Availed",-1),ve={class:"grid gap-4 md:grid-cols-4 sm:grid-cols-1 xxl:grid-cols-6 xl:grid-cols-6 lg:grid-cols-5",style:{display:"grid"}},_e={class:"text-center"},me={class:"my-1 lg:text-[12px] font-semibold text-center md:text-[10px] xl:text-[13px]"},pe={class:"my-1 text-xl font-semibold text-center"},he={key:0,class:"text-lg font-semibold"},ye={key:1,class:"text-lg font-semibold"},ge={__name:"EmployeeLeaveBalance",setup(L){const o=N();return(h,w)=>(u(),v(O,null,[e("div",Z,[e("div",ee,[e("div",te,[ae,e("div",le,[a(J)])]),e("div",oe,[(u(!0),v(O,null,I(l(o).array_employeeLeaveBalance,_=>(u(),v("div",{key:_,class:"p-1 my-2 rounded-lg border bg-gray-100 hover:bg-slate-100 cursor-pointer"},[e("p",se,r(_.leave_type),1),e("p",ne,[_.leave_balance==""?(u(),v("span",de,"0")):(u(),v("span",ie,r(_.leave_balance),1))])]))),128))])])]),e("div",re,[e("div",ce,[ue,e("div",ve,[(u(!0),v(O,null,I(l(o).array_employeeLeaveBalance,_=>(u(),v("div",{class:"bg-gray-100 border-l-4 border-indigo-300 p-1 rounded-lg border my-2 cursor-pointer hover:bg-slate-100",key:_},[e("div",_e,[e("p",me,r(_.leave_type),1),e("p",pe,[_.availed_leaves==""?(u(),v("span",he,"0")):(u(),v("span",ye,r(_.availed_leaves),1))])])]))),128))])])])],64))}},fe={class:"mt-3 row"},xe={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12"},be={class:"mb-0 card leave-history"},we={class:"card-body"},Le={class:"flex justify-between"},De=e("div",null,[e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins] mb-4"}," Leave history ")],-1),$e={class:"d-flex justify-content-end mb-2"},Se=e("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),ke={class:"table-responsive"},Ce={key:0},Re={key:1},Ae={key:1},Te={class:"flex justify-center"},Me=["onClick"],Ee={class:"w-full"},Ve={class:"w-full"},Ye={class:"border w-full rounded-lg"},Pe={class:"p-3 pl-5 d-flex align-items-center border"},Ue={class:"rounded-circle shadow-sm d-flex justify-content-center align-items-center bg-yellow-100",style:{width:"80px",height:"80px"}},Be={class:"text-3xl font-semibold"},Oe={class:"ml-5"},He={class:"text-lg font-semibold"},Ne={class:"fs-6 text-neutral-400"},je={class:"border w-full d-flex py-4 px-4"},Fe={class:"mx-2 p-1 rounded-lg"},Ie={class:"text-center py-1 px-2 text-light rounded-top fw-bold",style:{"background-color":"navy"}},We={class:"text-center py-1 px-2 fs-5 fw-bold"},qe={class:"text-center py-1 px-2 fs-6 fw-bold"},Qe={class:"py-3"},ze={class:"text-lg font-semibold text-primary-800"},Ke={class:"font-semibold text-xs"},Ge={class:"border w-full py-4 px-4"},Je=e("h1",{class:"text-lg font-semibold"},"Notified To:",-1),Xe={class:"card px-3 py-2 d-flex mt-3",style:{"min-width":"250px","max-width":"300px",display:"flex"}},Ze={class:"d-flex p-2 align-items-center"},et={class:"rounded-circle bg-blue-100 d-flex justify-content-center align-items-center",style:{width:"40px",height:"40px"}},tt={class:"flex-column px-3"},at={class:"fs-6 fw-bold"},lt={class:"py-2 text-neutral-400"},ot={class:"border w-full py-4 px-4"},st=e("h1",{class:"text-lg font-semibold"},"Approved by",-1),nt={class:"card px-3 py-2 d-flex mt-3",style:{"min-width":"180px","max-width":"300px",display:"flex"}},dt={class:"d-flex p-2 align-items-center"},it=e("div",{class:"rounded-circle bg-green-400 d-flex justify-content-center align-items-center",style:{width:"40px",height:"40px"}},[e("i",{class:"pi pi-check text-light"})],-1),rt={class:"flex-column px-3"},ct={class:"fs-6 fw-bold"},ut={class:"py-2 text-neutral-400"},vt={class:"my-4 mx-3"},_t={class:"text-end mx-4 my-4"},mt={__name:"EmployeeLeaveDetails",setup(L){const o=N(),h=c(!0),w=c(),_=c(),$=C=>{w.value.toggle(C)},S=c({global:{value:null,matchMode:k.CONTAINS},employee_name:{value:null,matchMode:k.STARTS_WITH,matchMode:k.EQUALS,matchMode:k.CONTAINS},status:{value:null,matchMode:k.EQUALS}}),m=c(["Pending","Approved","Rejected"]);F(async()=>{await o.getEmployeeLeaveHistory(f().month()+1,f().year(),["Approved","Pending","Rejected"]),h.value=!1});function i(){o.canShowLeaveDetails=!1}return(C,n)=>{const A=p("Calendar"),D=p("Column"),M=p("OverlayPanel"),U=p("Dropdown"),B=p("DataTable"),t=p("Textarea"),y=p("Dialog");return u(),v(O,null,[a(ge),e("div",fe,[e("div",xe,[e("div",be,[e("div",we,[e("div",Le,[De,e("div",$e,[Se,a(A,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:_.value,"onUpdate:modelValue":n[0]||(n[0]=s=>_.value=s),style:{"border-radius":"7px",height:"30px"},onDateSelect:n[1]||(n[1]=s=>(l(o).getEmployeeLeaveHistory(_.value.getMonth()+1,_.value.getFullYear(),m.value),l(o).canShowLoading=!0))},null,8,["modelValue"])])]),e("div",ke,[a(B,{value:l(o).array_employeeLeaveHistory,paginator:!0,rows:5,dataKey:"id",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:S.value,"onUpdate:filters":n[2]||(n[2]=s=>S.value=s),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:d(()=>[b(" No Employee data..... ")]),default:d(()=>[a(D,{field:"leave_type",header:"Leave Type",style:{"min-width":"14rem"}}),a(D,{field:"start_date",header:"Start Date",style:{"min-width":"8rem"}},{body:d(s=>[b(r(l(f)(s.data.start_date).format("DD-MMM-YYYY")),1)]),_:1}),a(D,{field:"end_date",header:"End Date",dataType:"date",style:{"min-width":"8rem"}},{body:d(s=>[b(r(l(f)(s.data.end_date).format("DD-MMM-YYYY")),1)]),_:1}),a(D,{field:"leave_reason",header:"Leave Reason",style:{"min-width":"12rem"}},{body:d(s=>[s.data.leave_reason&&s.data.leave_reason.length>70?(u(),v("div",Ce,[e("p",{onClick:$,class:"font-medium text-orange-400 underline cursor-pointer"}," explore more... "),a(M,{ref_key:"overlayPanel",ref:w,style:{height:"80px"}},{default:d(()=>[b(r(s.data.leave_reason),1)]),_:2},1536)])):(u(),v("div",Re,r(s.data.leave_reason??""),1))]),_:1}),a(D,{field:"reviewer_name",header:"Approver Name"}),a(D,{field:"reviewer_comments",header:"Approver Comments"}),a(D,{field:"status",header:"Status",icon:"pi pi-check"},{body:d(({data:s})=>[e("span",{class:Y("customer-badge status-"+s.status)},r(s.status),3)]),filter:d(({filterModel:s,filterCallback:j})=>[a(U,{modelValue:s.value,"onUpdate:modelValue":R=>s.value=R,onChange:R=>j(),options:m.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:d(R=>[R.value?(u(),v("span",{key:0,class:Y("customer-badge status-"+R.value)},r(R.value),3)):(u(),v("span",Ae,r(R.placeholder),1))]),option:d(R=>[e("span",{class:Y("customer-badge status-"+R.option)},r(R.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),a(D,{field:"",header:"Action",style:{"min-width":"15rem"}},{body:d(s=>[e("div",Te,[e("button",{class:"!text-[#000] !bg-black p-2 rounded-xl",onClick:j=>l(o).getLeaveDetails(s.data),style:{}},"View",8,Me)])]),_:1})]),_:1},8,["value","filters"])])])])])]),a(y,{header:"Header",visible:l(o).canShowLeaveDetails,"onUpdate:visible":n[4]||(n[4]=s=>l(o).canShowLeaveDetails=s),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"50vw",borderTop:"5px solid #002f56"},modal:!0,closable:!0,closeOnEscape:!0},{header:d(()=>[e("div",Ee,[e("h5",{style:K({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"}),class:"text-xl font-semibold"}," Leave Details Request",4)])]),default:d(()=>[e("div",Ve,[e("div",Ye,[e("div",Pe,[e("div",Ue,[e("h1",Be,r(l(o).setLeaveDetails.user_short_name),1)]),e("div",Oe,[e("h1",He,r(l(o).setLeaveDetails.name),1),e("div",null,[e("p",Ne,"Requested on "+r(l(o).setLeaveDetails.leaverequest_date),1)])])]),e("div",je,[e("div",Fe,[e("h1",Ie,r(l(f)(l(o).setLeaveDetails.end_date).format("MMM")),1),e("h1",We,r(l(f)(l(o).setLeaveDetails.end_date).format("DD")),1),e("h1",qe,r(l(f)(l(o).setLeaveDetails.end_date).format("dddd")),1)]),e("div",Qe,[e("h1",ze,[b(r(l(o).setLeaveDetails.total_leave_datetime)+" Day of "+r(l(o).setLeaveDetails.leave_type)+" ",1),e("span",Ke," ("+r(l(o).setLeaveDetails.leave_reason)+") ",1)])])]),e("div",Ge,[Je,e("div",Xe,[e("div",Ze,[e("div",et,r(l(o).setLeaveDetails.reviewer_short_name),1),e("div",tt,[e("h1",at,r(l(o).setLeaveDetails.reviewer_name),1),e("h1",lt,r(l(o).setLeaveDetails.reviewer_designation),1)])])])]),e("div",ot,[st,e("div",nt,[e("div",dt,[it,e("div",rt,[e("h1",ct,r(l(o).setLeaveDetails.reviewer_name),1),e("h1",ut," on "+r(l(f)(l(o).setLeaveDetails.leaverequest_date).format("DD-MMM-YYYY hh: mm:ss A")),1)])])])]),e("div",vt,[a(t,{name:"",id:"",cols:"70",rows:"3",autoResize:"",placeholder:"Add Comment"})])])]),e("div",_t,[l(o).setLeaveDetails.can_withdraw_leave!==null&&l(o).setLeaveDetails.can_withdraw_leave?(u(),v("button",{key:0,class:"btn btn-orange px-5 mx-2",onClick:n[3]||(n[3]=s=>l(o).performLeaveWithdraw(l(o).setLeaveDetails.id))},"Withdraw")):H("",!0),l(o).setLeaveDetails.can_revoke_leave!==null&&l(o).setLeaveDetails.can_revoke_leave?(u(),v("button",{key:1,class:"btn btn-orange px-5 mx-2",onClick:i},"Revoke")):H("",!0),e("button",{class:"btn btn-orange px-5",onClick:i},"Post")])]),_:1},8,["visible"])],64)}}},pt={class:"mb-0 card leave-history"},ht={class:"card-body"},yt={class:"my-2 d-flex justify-content-between align-items-center"},gt=e("h6",{class:"h-7 mt-3 text-lg font-semibold text-gray-900"},"Org Leave Balance",-1),ft={class:"d-flex"},xt={class:""},bt=e("label",{for:" ",class:"text-lg font-semibold"},"Start Date",-1),wt={class:""},Lt=e("label",{for:" ",class:"text-lg font-semibold mx-2"},"End Date",-1),Dt={class:"mt-3 row card"},$t={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12 card-body"},St={class:"flex justify-between"},kt=e("div",null,[e("h6",{class:"mb-4 text-lg font-semibold text-gray-900"},"Org Leave history")],-1),Ct={class:"d-flex justify-content-end"},Rt=e("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),At={class:"table-responsive"},Tt={key:0},Mt={key:1},Et={key:1},Vt={__name:"OrgLeaveDetails",setup(L){const o=N();c(),c(),c(!0);const h=c(),w=c([]),_=c();c();const $=c({employee_name:{value:null,matchMode:k.STARTS_WITH,matchMode:k.EQUALS,matchMode:k.CONTAINS},status:{value:null,matchMode:k.EQUALS}}),S=c(["Pending","Approved","Rejected"]);return F(async()=>{await o.getOrgLeaveBalance(),await o.getAllEmployeesLeaveHistory(f().month()+1,f().year(),["Approved","Pending","Rejected"]),console.log("Org Leave details : "+o.array_orgLeaveHistory)}),(m,i)=>{const C=p("Calendar"),n=p("Column"),A=p("DataTable"),D=p("InputText"),M=p("OverlayPanel"),U=p("Dropdown"),B=p("Button");return u(),v(O,null,[e("div",pt,[e("div",ht,[e("div",yt,[gt,e("div",ft,[e("div",xt,[bt,a(C,{modelValue:l(o).selectedStartDate,"onUpdate:modelValue":i[0]||(i[0]=t=>l(o).selectedStartDate=t),dateFormat:"dd-mm-yy",class:"pl-3",style:{"border-radius":"7px",height:"30px",width:"100px"},maxDate:new Date},null,8,["modelValue","maxDate"])]),e("div",wt,[Lt,a(C,{class:"mr-3",modelValue:l(o).selectedEndDate,"onUpdate:modelValue":i[1]||(i[1]=t=>l(o).selectedEndDate=t),dateFormat:"dd-mm-yy",style:{"border-radius":"7px",height:"30px",width:"100px"},maxDate:new Date},null,8,["modelValue","maxDate"])]),e("button",{class:"btn-orange py-1 px-4 rounded",style:{height:"30px"},onClick:i[2]||(i[2]=t=>l(o).getOrgLeaveBalance(l(f)(l(o).selectedStartDate).format("YYYY-MM-DD"),l(f)(l(o).selectedEndDate).format("YYYY-MM-DD")))},"submit")])]),a(A,{value:l(o).array_orgLeaveBalance,paginator:!0,rows:10,class:"",dataKey:"user_code",onRowExpand:m.onRowExpand,onRowCollapse:m.onRowCollapse,expandedRows:w.value,"onUpdate:expandedRows":i[4]||(i[4]=t=>w.value=t),selection:_.value,"onUpdate:selection":i[5]||(i[5]=t=>_.value=t),selectAll:m.selectAll,onSelectAllChange:m.onSelectAllChange,onRowSelect:m.onRowSelect,onRowUnselect:m.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{expansion:d(t=>[e("div",null,[a(A,{value:t.data.leave_balance_details,responsiveLayout:"scroll",selection:_.value,"onUpdate:selection":i[3]||(i[3]=y=>_.value=y),selectAll:m.selectAll,onSelectAllChange:m.onSelectAllChange},{default:d(()=>[a(n,{field:"leave_type",header:"Leave Type"},{default:d(()=>[b(r(t.data.leave_type),1)]),_:2},1024),a(n,{field:"opening_balance",header:"Opening Balance"}),a(n,{field:"availed",header:"availed"}),a(n,{field:"closing_balance",header:"Closing Balance"})]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:d(()=>[a(n,{expander:!0}),a(n,{field:"user_code",header:"Employee Id",sortable:""}),a(n,{field:"name",header:"Employee Name"}),a(n,{field:"location",header:"Location",sortable:!1}),a(n,{field:"department",header:"Department"}),a(n,{field:"total_leave_balance",header:"Total Leave Balance"})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"])])]),e("div",Dt,[e("div",$t,[e("div",St,[kt,e("div",Ct,[Rt,a(C,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:h.value,"onUpdate:modelValue":i[6]||(i[6]=t=>h.value=t),style:{"border-radius":"7px",height:"30px"},onDateSelect:i[7]||(i[7]=t=>l(o).getAllEmployeesLeaveHistory(h.value.getMonth()+1,h.value.getFullYear(),S.value))},null,8,["modelValue"])])]),e("div",At,[a(A,{value:l(o).array_orgLeaveHistory,responsiveLayout:"scroll",paginator:!0,rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rows:5,filters:$.value,"onUpdate:filters":i[9]||(i[9]=t=>$.value=t),filterDisplay:"menu",globalFilterFields:["name"],style:{"white-space":"nowrap"}},{empty:d(()=>[b(" No Employee data..... ")]),default:d(()=>[a(n,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:d(t=>[b(r(t.data.employee_name),1)]),filter:d(({filterModel:t,filterCallback:y})=>[a(D,{modelValue:t.value,"onUpdate:modelValue":s=>t.value=s,onInput:s=>y(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),a(n,{field:"leave_type",header:"Leave Type"}),a(n,{field:"start_date",header:"Start Date"},{body:d(t=>[b(r(l(f)(t.data.start_date).format("DD-MMM-YYYY")),1)]),_:1}),a(n,{field:"end_date",header:"End Date"},{body:d(t=>[b(r(l(f)(t.data.end_date).format("DD-MMM-YYYY")),1)]),_:1}),a(n,{field:"total_leave_datetime",header:"Total Leave Days"}),a(n,{field:"leave_reason",header:"Leave Reason"},{body:d(t=>[t.data.leave_reason&&t.data.leave_reason.length>70?(u(),v("div",Tt,[e("p",{onClick:i[8]||(i[8]=(...y)=>m.toggle&&m.toggle(...y)),class:"font-medium text-orange-400 underline cursor-pointer"}," More... "),a(M,{ref:"overlayPanel",style:{height:"80px"}},{default:d(()=>[b(r(t.data.leave_reason),1)]),_:2},1536)])):(u(),v("div",Mt,r(t.data.leave_reason??""),1))]),_:1}),a(n,{field:"status",header:"Status"},{body:d(({data:t})=>[e("span",{class:Y("customer-badge status-"+t.status)},r(t.status),3)]),filter:d(({filterModel:t,filterCallback:y})=>[a(U,{modelValue:t.value,"onUpdate:modelValue":s=>t.value=s,onChange:s=>y(),options:S.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:d(s=>[s.value?(u(),v("span",{key:0,class:Y("customer-badge status-"+s.value)},r(s.value),3)):(u(),v("span",Et,r(s.placeholder),1))]),option:d(s=>[e("span",{class:Y("customer-badge status-"+s.option)},r(s.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),a(n,{field:"",header:"Action",style:{"min-width":"15rem"}},{body:d(t=>[a(B,{type:"button",icon:"",class:"text-white Button py-2.5",label:"View",onClick:y=>l(o).getLeaveDetails(t.data),style:{height:"2em"}},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters"])])])])],64)}}},Yt={class:"card"},Pt={class:"card-body"},Ut={class:"row"},Bt={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12 d-flex justify-content-between align-items-center"},Ot=e("h6",{class:"mb-4 text-lg font-semibold text-gray-900"},"Team Leave Balance",-1),Ht={class:"my-2 d-flex justify-content-between align-items-center"},Nt=e("div",null,null,-1),jt={class:"d-flex"},Ft={class:""},It=e("label",{for:" ",class:"font-semibold text-lg mx-2"},"Start Date",-1),Wt={class:""},qt=e("label",{for:" ",class:"font-semibold text-lg mx-2"},"End Date",-1),Qt={class:"mt-3 row"},zt={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12"},Kt={class:"mb-0 card leave-history"},Gt={class:"card-body"},Jt={class:"flex justify-between"},Xt=e("div",null,[e("h6",{class:"mb-4 text-lg font-semibold text-gray-900"},"Team Leave history")],-1),Zt={class:"d-flex justify-content-end"},ea=e("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),ta={class:"table-responsive"},aa={key:0},la={key:1},oa={key:1},sa={__name:"TeamLeaveDetails",setup(L){const o=N();c(),c(),c(),c(),c(),c(!0),c();const h=c([]),w=c(),_=c(),$=c({employee_name:{value:null,matchMode:k.STARTS_WITH,matchMode:k.EQUALS,matchMode:k.CONTAINS},status:{value:null,matchMode:k.EQUALS}}),S=c(["Pending","Approved","Rejected"]);return F(async()=>{await o.getTermLeaveBalance(),await o.getTeamLeaveHistory(f().month()+1,f().year(),["Approved","Pending","Rejected"])}),(m,i)=>{const C=p("Calendar"),n=p("Column"),A=p("DataTable"),D=p("InputText"),M=p("OverlayPanel"),U=p("Dropdown"),B=p("Button");return u(),v(O,null,[e("div",Yt,[e("div",Pt,[e("div",Ut,[e("div",Bt,[Ot,e("div",Ht,[Nt,e("div",jt,[e("div",Ft,[It,a(C,{modelValue:l(o).selectedStartDate,"onUpdate:modelValue":i[0]||(i[0]=t=>l(o).selectedStartDate=t),dateFormat:"dd-mm-yy",class:"p-l3",style:{"border-radius":"7px",height:"30px",width:"100px"},maxDate:new Date},null,8,["modelValue","maxDate"])]),e("div",Wt,[qt,a(C,{class:"mr-3",modelValue:l(o).selectedEndDate,"onUpdate:modelValue":i[1]||(i[1]=t=>l(o).selectedEndDate=t),dateFormat:"dd-mm-yy",style:{"border-radius":"7px",height:"30px",width:"100px"},maxDate:new Date},null,8,["modelValue","maxDate"])]),e("button",{class:"btn-orange py-1 px-4 rounded",onClick:i[2]||(i[2]=t=>(l(o).getTermLeaveBalance(l(f)(l(o).selectedStartDate).format("YYYY-MM-DD"),l(f)(l(o).selectedEndDate).format("YYYY-MM-DD")),l(o).canShowLoading=!0))},"submit")])])]),e("div",null,[a(A,{value:l(o).arrayTermLeaveBalance,paginator:!0,rows:10,class:"",dataKey:"user_code",onRowExpand:m.onRowExpand,onRowCollapse:m.onRowCollapse,expandedRows:h.value,"onUpdate:expandedRows":i[4]||(i[4]=t=>h.value=t),selection:w.value,"onUpdate:selection":i[5]||(i[5]=t=>w.value=t),selectAll:m.selectAll,onSelectAllChange:m.onSelectAllChange,onRowSelect:m.onRowSelect,onRowUnselect:m.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{expansion:d(t=>[e("div",null,[a(A,{value:t.data.leave_balance_details,responsiveLayout:"scroll",selection:w.value,"onUpdate:selection":i[3]||(i[3]=y=>w.value=y),selectAll:m.selectAll,onSelectAllChange:m.onSelectAllChange},{default:d(()=>[a(n,{field:"leave_type",header:"Leave Type"},{default:d(()=>[b(r(t.data.leave_type),1)]),_:2},1024),a(n,{field:"opening_balance",header:"Opening Balance"}),a(n,{field:"availed",header:"availed"}),a(n,{field:"closing_balance",header:"Closing Balance"})]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:d(()=>[a(n,{style:{width:"1rem !important"},expander:!0}),a(n,{field:"user_code",header:"Employee Id",sortable:""}),a(n,{field:"name",header:"Employee Name"}),a(n,{field:"location",header:"Location",sortable:!1}),a(n,{field:"department",header:"Department"}),a(n,{field:"total_leave_balance",header:"Total Leave Balance"})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"])])])])]),e("div",Qt,[e("div",zt,[e("div",Kt,[e("div",Gt,[e("div",Jt,[Xt,e("div",Zt,[ea,a(C,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:_.value,"onUpdate:modelValue":i[6]||(i[6]=t=>_.value=t),style:{"border-radius":"7px",height:"30px"},onDateSelect:i[7]||(i[7]=t=>(l(o).getTeamLeaveHistory(_.value.getMonth()+1,_.value.getFullYear(),S.value),l(o).canShowLoading=!0))},null,8,["modelValue"])])]),e("div",ta,[a(A,{value:l(o).array_teamLeaveHistory,responsiveLayout:"scroll",paginator:!0,rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rows:5,filters:$.value,"onUpdate:filters":i[9]||(i[9]=t=>$.value=t),filterDisplay:"menu",globalFilterFields:["name"],style:{"white-space":"nowrap"}},{empty:d(()=>[b(" No Employee data..... ")]),default:d(()=>[a(n,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:d(t=>[b(r(t.data.employee_name),1)]),filter:d(({filterModel:t,filterCallback:y})=>[a(D,{modelValue:t.value,"onUpdate:modelValue":s=>t.value=s,onInput:s=>y(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),a(n,{field:"leave_type",header:"Leave Type"}),a(n,{field:"start_date",header:"Start Date"},{body:d(t=>[b(r(l(f)(t.data.start_date).format("DD-MMM-YYYY")),1)]),_:1}),a(n,{field:"end_date",header:"End Date"},{body:d(t=>[b(r(l(f)(t.data.end_date).format("DD-MMM-YYYY")),1)]),_:1}),a(n,{field:"total_leave_datetime",header:"Total Leave Days"}),a(n,{field:"leave_reason",header:"Leave Reason"},{body:d(t=>[t.data.leave_reason&&t.data.leave_reason.length>70?(u(),v("div",aa,[e("p",{onClick:i[8]||(i[8]=(...y)=>m.toggle&&m.toggle(...y)),class:"font-medium text-orange-400 underline cursor-pointer"}," explore more... "),a(M,{ref:"overlayPanel",style:{height:"80px"}},{default:d(()=>[b(r(t.data.leave_reason),1)]),_:2},1536)])):(u(),v("div",la,r(t.data.leave_reason??""),1))]),_:1}),a(n,{field:"status",header:"Status"},{body:d(({data:t})=>[e("span",{class:Y("customer-badge status-"+t.status)},r(t.status),3)]),filter:d(({filterModel:t,filterCallback:y})=>[a(U,{modelValue:t.value,"onUpdate:modelValue":s=>t.value=s,onChange:s=>y(),options:S.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:d(s=>[s.value?(u(),v("span",{key:0,class:Y("customer-badge status-"+s.value)},r(s.value),3)):(u(),v("span",oa,r(s.placeholder),1))]),option:d(s=>[e("span",{class:Y("customer-badge status-"+s.option)},r(s.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),a(n,{field:"",header:"Action",style:{"min-width":"15rem"}},{body:d(t=>[a(B,{type:"button",icon:"",class:"text-white Button py-2.5",label:"View",onClick:y=>l(o).getLeaveDetails(t.data),style:{height:"2em"}},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters"])])])])])])],64)}}},na={class:"w-full"},da={key:0},ia=e("p",{class:"font-semibold text-2xl text-[#000] font-['Poppins]"},"Leave",-1),ra=e("p",{class:"font-semibold text-sm"},[b("Here you can apply Leave,"),e("a",null,[e("span",{class:"underline cursor-pointer hover:text-indigo-500"}," Company's Leave Policy")]),b(".")],-1),ca=[ia,ra],ua={key:1,class:"flex justify-between"},va={class:"divide-x py-auto nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},_a=e("li",{class:"nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#leave_balance","aria-selected":"true",role:"tab"}," Leave Balance")],-1),ma={key:0,class:"nav-item text-muted",role:"presentation"},pa=e("a",{class:"pb-2 mx-4 nav-link","data-bs-toggle":"tab",href:"#team_leaveBalance","aria-selected":"false",tabindex:"-1",role:"tab"}," Team Leave Balance",-1),ha=[pa],ya={key:1,class:"nav-item text-muted",role:"presentation"},ga=e("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#org_leave","aria-selected":"false",tabindex:"-1",role:"tab"}," Org Leave Balance",-1),fa=[ga],xa=e("div",{class:"flex items-center"},[e("div",{class:"mr-3"}),e("a",{href:"/attendance-leave-policydocument",id:"",class:"text-md font-medium border-1 border-black rounded-lg text-center bg-black text-white my-auto p-1.5 dark:text-white",role:"button","aria-expanded":"false"}," Leave Policy Explanation ")],-1),ba=e("div",null,null,-1),wa={class:"tab-content py-2",id:"pills-tabContent"},La={class:"tab-pane show fade active",id:"leave_balance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Da={class:"tab-pane fade show",id:"team_leaveBalance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},$a={class:"tab-pane show",id:"org_leave",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Sa=e("h6",{class:"mb-4 modal-title fs-21"}," Leave Request",-1),Ua={__name:"LeaveModule",setup(L){const o=N(),h=W(),w=c(!1);return F(async()=>{await o.getEmployeeLeaveBalance()}),(_,$)=>{const S=p("leaveapply2"),m=p("Dialog");return u(),v(O,null,[l(o).canShowLoading?(u(),G(X,{key:0,class:"absolute z-50 bg-white"})):H("",!0),e("div",na,[e("div",null,[l(h).current_user_role==5?(u(),v("div",da,ca)):(u(),v("div",ua,[e("ul",va,[_a,l(h).current_user_role==1||l(h).current_user_role==2||l(h).current_user_role==3||l(h).current_user_role==4?(u(),v("li",ma,ha)):H("",!0),l(h).current_user_role==1||l(h).current_user_role==2||l(h).current_user_role==3?(u(),v("li",ya,fa)):H("",!0)]),xa])),ba]),e("div",wa,[e("div",La,[a(mt)]),e("div",Da,[a(sa)]),e("div",$a,[a(Vt)])])]),a(m,{visible:w.value,"onUpdate:visible":$[0]||($[0]=i=>w.value=i),style:{width:"80vw"},breakpoints:{"960px":"75vw","641px":"100vw"}},{header:d(()=>[Sa]),default:d(()=>[a(S)]),_:1},8,["visible"])],64)}}};export{Ua as default};
