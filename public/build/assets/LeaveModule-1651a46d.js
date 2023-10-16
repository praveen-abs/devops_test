import{S as O}from"./Service-da5c2051.js";import{e as c,f as p,g as e,n as l,F as R,m as B,t as r,h as a,r as _,R as w,o as P,c as h,l as d,i as f,p as k,H as N,j as V,k as j}from"./app-fb0093c1.js";import"./moment-fbc5633a.js";import{c as Y}from"./LeaveApply.vue_vue_type_style_index_0_lang-a8b48307.js";import{_ as F}from"./LeaveApply-621bfa33.js";import{d as y}from"./dayjs.min-2f06af28.js";import"./index-362795f3.js";import{L as I}from"./LoadingSpinner-3e4e90d8.js";import"./index.esm-75ae3776.js";/* empty css                                                                       */const H={class:"mb-3 card"},Q={class:"card-body"},q={class:"mb-2 row"},W=e("div",{class:"col-sm-6 col-xl-6 col-md-6 col-lg-6"},[e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Leave balance")],-1),z={class:"col-6 justify-content-end d-flex"},K={class:"grid gap-4 md:grid-cols-4 sm:grid-cols-1 xxl:grid-cols-6 xl:grid-cols-6 lg:grid-cols-5",style:{display:"grid"}},G={class:"my-1 lg:text-[12px] font-semibold text-center md:text-[10px] xl:text-[13px]"},J={class:"my-1 text-xl font-semibold text-center"},X={key:0,class:"text-lg font-semibold"},Z={key:1,class:"text-lg font-semibold"},ee={class:"card"},te={class:"card-body"},ae=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Leave Availed",-1),le={class:"grid gap-4 md:grid-cols-4 sm:grid-cols-1 xxl:grid-cols-6 xl:grid-cols-6 lg:grid-cols-5",style:{display:"grid"}},oe={class:"text-center"},se={class:"my-1 lg:text-[12px] font-semibold text-center md:text-[10px] xl:text-[13px]"},ne={class:"my-1 text-xl font-semibold text-center"},de={key:0,class:"text-lg font-semibold"},ie={key:1,class:"text-lg font-semibold"},re={__name:"EmployeeLeaveBalance",setup(E){const o=Y();return(v,x)=>(c(),p(R,null,[e("div",H,[e("div",Q,[e("div",q,[W,e("div",z,[l(F)])]),e("div",K,[(c(!0),p(R,null,B(a(o).array_employeeLeaveBalance,u=>(c(),p("div",{key:u,class:"p-1 my-2 rounded-lg border bg-gray-100 hover:bg-slate-100 cursor-pointer"},[e("p",G,r(u.leave_type),1),e("p",J,[u.leave_balance==""?(c(),p("span",X,"0")):(c(),p("span",Z,r(u.leave_balance),1))])]))),128))])])]),e("div",ee,[e("div",te,[ae,e("div",le,[(c(!0),p(R,null,B(a(o).array_employeeLeaveBalance,u=>(c(),p("div",{class:"bg-gray-100 border-l-4 border-indigo-300 p-1 rounded-lg border my-2 cursor-pointer hover:bg-slate-100",key:u},[e("div",oe,[e("p",se,r(u.leave_type),1),e("p",ne,[u.availed_leaves==""?(c(),p("span",de,"0")):(c(),p("span",ie,r(u.availed_leaves),1))])])]))),128))])])])],64))}},ce={class:"mt-3 row"},pe={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12"},_e={class:"mb-0 card leave-history"},me={class:"card-body"},ue={class:"flex justify-between"},ve=e("div",null,[e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins] mb-4"}," Leave history ")],-1),he={class:"d-flex justify-content-end mb-2"},ye=e("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),ge={class:"table-responsive"},fe={key:0},xe={key:1},be={key:1},we={class:"flex justify-center"},Le=["onClick"],De={class:"w-full"},$e={class:"w-full"},Se={class:"border w-full rounded-lg"},Ce={class:"p-3 pl-5 d-flex align-items-center border"},ke={class:"rounded-circle shadow-sm d-flex justify-content-center align-items-center bg-yellow-100",style:{width:"80px",height:"80px"}},Re={class:"text-3xl font-semibold"},Ae={class:"ml-5"},Me={class:"text-lg font-semibold"},Te={class:"fs-6 text-neutral-400"},Ve={class:"border w-full d-flex py-4 px-4"},Ye={class:"mx-2 p-1 rounded-lg"},Ee={class:"text-center py-1 px-2 text-light rounded-top fw-bold",style:{"background-color":"navy"}},Pe={class:"text-center py-1 px-2 fs-5 fw-bold"},Ue={class:"text-center py-1 px-2 fs-6 fw-bold"},Be={class:"py-3"},Oe={class:"text-lg font-semibold text-primary-800"},Ne={class:"font-semibold text-xs"},je={class:"border w-full py-4 px-4"},Fe=e("h1",{class:"text-lg font-semibold"},"Notified To:",-1),Ie={class:"card px-3 py-2 d-flex mt-3",style:{"min-width":"250px","max-width":"300px",display:"flex"}},He={class:"d-flex p-2 align-items-center"},Qe={class:"rounded-circle bg-blue-100 d-flex justify-content-center align-items-center",style:{width:"40px",height:"40px"}},qe={class:"flex-column px-3"},We={class:"fs-6 fw-bold"},ze={class:"py-2 text-neutral-400"},Ke={class:"border w-full py-4 px-4"},Ge=e("h1",{class:"text-lg font-semibold"},"Approved by",-1),Je={class:"card px-3 py-2 d-flex mt-3",style:{"min-width":"180px","max-width":"300px",display:"flex"}},Xe={class:"d-flex p-2 align-items-center"},Ze=e("div",{class:"rounded-circle bg-green-400 d-flex justify-content-center align-items-center",style:{width:"40px",height:"40px"}},[e("i",{class:"pi pi-check text-light"})],-1),et={class:"flex-column px-3"},tt={class:"fs-6 fw-bold"},at={class:"py-2 text-neutral-400"},lt={class:"my-4 mx-3"},ot={class:"text-end mx-4 my-4"},st={__name:"EmployeeLeaveDetails",setup(E){const o=Y(),v=_(!0),x=_(),u=_(),b=$=>{x.value.toggle($)},D=_({global:{value:null,matchMode:w.CONTAINS},employee_name:{value:null,matchMode:w.STARTS_WITH,matchMode:w.EQUALS,matchMode:w.CONTAINS},status:{value:null,matchMode:w.EQUALS}}),m=_(["Pending","Approved","Rejected"]);P(async()=>{await o.getEmployeeLeaveHistory(y().month()+1,y().year(),["Approved","Pending","Rejected"]),v.value=!1});function n(){o.canShowLeaveDetails=!1}return($,i)=>{const C=h("Calendar"),L=h("Column"),A=h("OverlayPanel"),M=h("Dropdown"),T=h("DataTable"),t=h("Textarea"),g=h("Dialog");return c(),p(R,null,[l(re),e("div",ce,[e("div",pe,[e("div",_e,[e("div",me,[e("div",ue,[ve,e("div",he,[ye,l(C,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:u.value,"onUpdate:modelValue":i[0]||(i[0]=s=>u.value=s),style:{"border-radius":"7px",height:"30px"},onDateSelect:i[1]||(i[1]=s=>(a(o).getEmployeeLeaveHistory(u.value.getMonth()+1,u.value.getFullYear(),m.value),a(o).canShowLoading=!0))},null,8,["modelValue"])])]),e("div",ge,[l(T,{value:a(o).array_employeeLeaveHistory,paginator:!0,rows:5,dataKey:"id",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:D.value,"onUpdate:filters":i[2]||(i[2]=s=>D.value=s),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:d(()=>[f(" No Employee data..... ")]),default:d(()=>[l(L,{field:"leave_type",header:"Leave Type",style:{"min-width":"14rem"}}),l(L,{field:"start_date",header:"Start Date",style:{"min-width":"8rem"}},{body:d(s=>[f(r(a(y)(s.data.start_date).format("DD-MMM-YYYY")),1)]),_:1}),l(L,{field:"end_date",header:"End Date",dataType:"date",style:{"min-width":"8rem"}},{body:d(s=>[f(r(a(y)(s.data.end_date).format("DD-MMM-YYYY")),1)]),_:1}),l(L,{field:"leave_reason",header:"Leave Reason",style:{"min-width":"12rem"}},{body:d(s=>[s.data.leave_reason&&s.data.leave_reason.length>70?(c(),p("div",fe,[e("p",{onClick:b,class:"font-medium text-orange-400 underline cursor-pointer"}," explore more... "),l(A,{ref_key:"overlayPanel",ref:x,style:{height:"80px"}},{default:d(()=>[f(r(s.data.leave_reason),1)]),_:2},1536)])):(c(),p("div",xe,r(s.data.leave_reason??""),1))]),_:1}),l(L,{field:"reviewer_name",header:"Approver Name"}),l(L,{field:"reviewer_comments",header:"Approver Comments"}),l(L,{field:"status",header:"Status",icon:"pi pi-check"},{body:d(({data:s})=>[e("span",{class:k("customer-badge status-"+s.status)},r(s.status),3)]),filter:d(({filterModel:s,filterCallback:U})=>[l(M,{modelValue:s.value,"onUpdate:modelValue":S=>s.value=S,onChange:S=>U(),options:m.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:d(S=>[S.value?(c(),p("span",{key:0,class:k("customer-badge status-"+S.value)},r(S.value),3)):(c(),p("span",be,r(S.placeholder),1))]),option:d(S=>[e("span",{class:k("customer-badge status-"+S.option)},r(S.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),l(L,{field:"",header:"Action",style:{"min-width":"15rem"}},{body:d(s=>[e("div",we,[e("button",{class:"!text-[white] !bg-black py-2 px-4 rounded-xl",onClick:U=>a(o).getLeaveDetails(s.data),style:{}},"View",8,Le)])]),_:1})]),_:1},8,["value","filters"])])])])])]),l(g,{header:"Header",visible:a(o).canShowLeaveDetails,"onUpdate:visible":i[4]||(i[4]=s=>a(o).canShowLeaveDetails=s),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"50vw",borderTop:"5px solid #002f56"},modal:!0,closable:!0,closeOnEscape:!0},{header:d(()=>[e("div",De,[e("h5",{style:N({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"}),class:"text-xl font-semibold"}," Leave Details Request",4)])]),default:d(()=>[e("div",$e,[e("div",Se,[e("div",Ce,[e("div",ke,[e("h1",Re,r(a(o).setLeaveDetails.user_short_name),1)]),e("div",Ae,[e("h1",Me,r(a(o).setLeaveDetails.name),1),e("div",null,[e("p",Te,"Requested on "+r(a(o).setLeaveDetails.leaverequest_date),1)])])]),e("div",Ve,[e("div",Ye,[e("h1",Ee,r(a(y)(a(o).setLeaveDetails.end_date).format("MMM")),1),e("h1",Pe,r(a(y)(a(o).setLeaveDetails.end_date).format("DD")),1),e("h1",Ue,r(a(y)(a(o).setLeaveDetails.end_date).format("dddd")),1)]),e("div",Be,[e("h1",Oe,[f(r(a(o).setLeaveDetails.total_leave_datetime)+" Day of "+r(a(o).setLeaveDetails.leave_type)+" ",1),e("span",Ne," ("+r(a(o).setLeaveDetails.leave_reason)+") ",1)])])]),e("div",je,[Fe,e("div",Ie,[e("div",He,[e("div",Qe,r(a(o).setLeaveDetails.reviewer_short_name),1),e("div",qe,[e("h1",We,r(a(o).setLeaveDetails.reviewer_name),1),e("h1",ze,r(a(o).setLeaveDetails.reviewer_designation),1)])])])]),e("div",Ke,[Ge,e("div",Je,[e("div",Xe,[Ze,e("div",et,[e("h1",tt,r(a(o).setLeaveDetails.reviewer_name),1),e("h1",at," on "+r(a(y)(a(o).setLeaveDetails.leaverequest_date).format("DD-MMM-YYYY hh: mm:ss A")),1)])])])]),e("div",lt,[l(t,{name:"",id:"",cols:"70",rows:"3",autoResize:"",placeholder:"Add Comment"})])])]),e("div",ot,[a(o).setLeaveDetails.can_withdraw_leave!==null&&a(o).setLeaveDetails.can_withdraw_leave?(c(),p("button",{key:0,class:"btn btn-orange px-5 mx-2",onClick:i[3]||(i[3]=s=>a(o).performLeaveWithdraw(a(o).setLeaveDetails.id))},"Withdraw")):V("",!0),a(o).setLeaveDetails.can_revoke_leave!==null&&a(o).setLeaveDetails.can_revoke_leave?(c(),p("button",{key:1,class:"btn btn-orange px-5 mx-2",onClick:n},"Revoke")):V("",!0),e("button",{class:"btn btn-orange px-5",onClick:n},"Post")])]),_:1},8,["visible"])],64)}}},nt={class:"mb-0 card leave-history"},dt={class:"card-body"},it={class:"my-2 d-flex justify-content-between align-items-center"},rt=e("h6",{class:"h-7 mt-3 text-lg font-semibold text-gray-900"},"Org Leave Balance",-1),ct={class:"d-flex"},pt={class:""},_t=e("label",{for:" ",class:"text-lg font-semibold"},"Start Date",-1),mt={class:""},ut=e("label",{for:" ",class:"text-lg font-semibold mx-2"},"End Date",-1),vt={class:"mt-3 row card"},ht={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12 card-body"},yt={class:"flex justify-between"},gt=e("div",null,[e("h6",{class:"mb-4 text-lg font-semibold text-gray-900"},"Org Leave history")],-1),ft={class:"d-flex justify-content-end"},xt=e("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),bt={class:"table-responsive"},wt={key:0},Lt={key:1},Dt={key:1},$t={__name:"OrgLeaveDetails",setup(E){const o=Y();_(),_(),_(!0);const v=_(),x=_([]),u=_();_();const b=_({employee_name:{value:null,matchMode:w.STARTS_WITH,matchMode:w.EQUALS,matchMode:w.CONTAINS},status:{value:null,matchMode:w.EQUALS}}),D=_(["Pending","Approved","Rejected"]);return P(async()=>{await o.getOrgLeaveBalance(),await o.getAllEmployeesLeaveHistory(y().month()+1,y().year(),["Approved","Pending","Rejected"]),console.log("Org Leave details : "+o.array_orgLeaveHistory)}),(m,n)=>{const $=h("Calendar"),i=h("Column"),C=h("DataTable"),L=h("InputText"),A=h("OverlayPanel"),M=h("Dropdown"),T=h("Button");return c(),p(R,null,[e("div",nt,[e("div",dt,[e("div",it,[rt,e("div",ct,[e("div",pt,[_t,l($,{modelValue:a(o).selectedStartDate,"onUpdate:modelValue":n[0]||(n[0]=t=>a(o).selectedStartDate=t),dateFormat:"dd-mm-yy",class:"pl-3",style:{"border-radius":"7px",height:"30px",width:"100px"},maxDate:new Date},null,8,["modelValue","maxDate"])]),e("div",mt,[ut,l($,{class:"mr-3",modelValue:a(o).selectedEndDate,"onUpdate:modelValue":n[1]||(n[1]=t=>a(o).selectedEndDate=t),dateFormat:"dd-mm-yy",style:{"border-radius":"7px",height:"30px",width:"100px"},maxDate:new Date},null,8,["modelValue","maxDate"])]),e("button",{class:"btn-orange py-1 px-4 rounded",style:{height:"30px"},onClick:n[2]||(n[2]=t=>a(o).getOrgLeaveBalance(a(y)(a(o).selectedStartDate).format("YYYY-MM-DD"),a(y)(a(o).selectedEndDate).format("YYYY-MM-DD")))},"submit")])]),l(C,{value:a(o).array_orgLeaveBalance,paginator:!0,rows:10,class:"",dataKey:"user_code",onRowExpand:m.onRowExpand,onRowCollapse:m.onRowCollapse,expandedRows:x.value,"onUpdate:expandedRows":n[4]||(n[4]=t=>x.value=t),selection:u.value,"onUpdate:selection":n[5]||(n[5]=t=>u.value=t),selectAll:m.selectAll,onSelectAllChange:m.onSelectAllChange,onRowSelect:m.onRowSelect,onRowUnselect:m.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{expansion:d(t=>[e("div",null,[l(C,{value:t.data.leave_balance_details,responsiveLayout:"scroll",selection:u.value,"onUpdate:selection":n[3]||(n[3]=g=>u.value=g),selectAll:m.selectAll,onSelectAllChange:m.onSelectAllChange},{default:d(()=>[l(i,{field:"leave_type",header:"Leave Type"},{default:d(()=>[f(r(t.data.leave_type),1)]),_:2},1024),l(i,{field:"opening_balance",header:"Opening Balance"}),l(i,{field:"availed",header:"availed"}),l(i,{field:"closing_balance",header:"Closing Balance"})]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:d(()=>[l(i,{expander:!0}),l(i,{field:"user_code",header:"Employee Id",sortable:""}),l(i,{field:"name",header:"Employee Name"}),l(i,{field:"location",header:"Location",sortable:!1}),l(i,{field:"department",header:"Department"}),l(i,{field:"total_leave_balance",header:"Total Leave Balance"})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"])])]),e("div",vt,[e("div",ht,[e("div",yt,[gt,e("div",ft,[xt,l($,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:v.value,"onUpdate:modelValue":n[6]||(n[6]=t=>v.value=t),style:{"border-radius":"7px",height:"30px"},onDateSelect:n[7]||(n[7]=t=>a(o).getAllEmployeesLeaveHistory(v.value.getMonth()+1,v.value.getFullYear(),D.value))},null,8,["modelValue"])])]),e("div",bt,[l(C,{value:a(o).array_orgLeaveHistory,responsiveLayout:"scroll",paginator:!0,rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rows:5,filters:b.value,"onUpdate:filters":n[9]||(n[9]=t=>b.value=t),filterDisplay:"menu",globalFilterFields:["name"],style:{"white-space":"nowrap"}},{empty:d(()=>[f(" No Employee data..... ")]),default:d(()=>[l(i,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:d(t=>[f(r(t.data.employee_name),1)]),filter:d(({filterModel:t,filterCallback:g})=>[l(L,{modelValue:t.value,"onUpdate:modelValue":s=>t.value=s,onInput:s=>g(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),l(i,{field:"leave_type",header:"Leave Type"}),l(i,{field:"start_date",header:"Start Date"},{body:d(t=>[f(r(a(y)(t.data.start_date).format("DD-MMM-YYYY")),1)]),_:1}),l(i,{field:"end_date",header:"End Date"},{body:d(t=>[f(r(a(y)(t.data.end_date).format("DD-MMM-YYYY")),1)]),_:1}),l(i,{field:"total_leave_datetime",header:"Total Leave Days"}),l(i,{field:"leave_reason",header:"Leave Reason"},{body:d(t=>[t.data.leave_reason&&t.data.leave_reason.length>70?(c(),p("div",wt,[e("p",{onClick:n[8]||(n[8]=(...g)=>m.toggle&&m.toggle(...g)),class:"font-medium text-orange-400 underline cursor-pointer"}," More... "),l(A,{ref:"overlayPanel",style:{height:"80px"}},{default:d(()=>[f(r(t.data.leave_reason),1)]),_:2},1536)])):(c(),p("div",Lt,r(t.data.leave_reason??""),1))]),_:1}),l(i,{field:"status",header:"Status"},{body:d(({data:t})=>[e("span",{class:k("customer-badge status-"+t.status)},r(t.status),3)]),filter:d(({filterModel:t,filterCallback:g})=>[l(M,{modelValue:t.value,"onUpdate:modelValue":s=>t.value=s,onChange:s=>g(),options:D.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:d(s=>[s.value?(c(),p("span",{key:0,class:k("customer-badge status-"+s.value)},r(s.value),3)):(c(),p("span",Dt,r(s.placeholder),1))]),option:d(s=>[e("span",{class:k("customer-badge status-"+s.option)},r(s.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),l(i,{field:"",header:"Action",style:{"min-width":"15rem"}},{body:d(t=>[l(T,{icon:"",class:"text-[#000] border-[#000] border-[1px] py-2.5",label:"View",onClick:g=>a(o).getLeaveDetails(t.data),style:{height:"2em"}},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters"])])])])],64)}}},St={class:"card"},Ct={class:"card-body"},kt={class:"row"},Rt={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12 d-flex justify-content-between align-items-center"},At=e("h6",{class:"mb-4 text-lg font-semibold text-gray-900"},"Team Leave Balance",-1),Mt={class:"my-2 d-flex justify-content-between align-items-center"},Tt=e("div",null,null,-1),Vt={class:"d-flex"},Yt={class:""},Et=e("label",{for:" ",class:"font-semibold text-lg mx-2"},"Start Date",-1),Pt={class:""},Ut=e("label",{for:" ",class:"font-semibold text-lg mx-2"},"End Date",-1),Bt={class:"mt-3 row"},Ot={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12"},Nt={class:"mb-0 card leave-history"},jt={class:"card-body"},Ft={class:"flex justify-between"},It=e("div",null,[e("h6",{class:"mb-4 text-lg font-semibold text-gray-900"},"Team Leave history")],-1),Ht={class:"d-flex justify-content-end"},Qt=e("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),qt={class:"table-responsive"},Wt={key:0},zt={key:1},Kt={key:1},Gt={__name:"TeamLeaveDetails",setup(E){const o=Y();_(),_(),_(),_(),_(),_(!0),_();const v=_([]),x=_(),u=_(),b=_({employee_name:{value:null,matchMode:w.STARTS_WITH,matchMode:w.EQUALS,matchMode:w.CONTAINS},status:{value:null,matchMode:w.EQUALS}}),D=_(["Pending","Approved","Rejected"]);return P(async()=>{await o.getTermLeaveBalance(),await o.getTeamLeaveHistory(y().month()+1,y().year(),["Approved","Pending","Rejected"])}),(m,n)=>{const $=h("Calendar"),i=h("Column"),C=h("DataTable"),L=h("InputText"),A=h("OverlayPanel"),M=h("Dropdown"),T=h("Button");return c(),p(R,null,[e("div",St,[e("div",Ct,[e("div",kt,[e("div",Rt,[At,e("div",Mt,[Tt,e("div",Vt,[e("div",Yt,[Et,l($,{modelValue:a(o).selectedStartDate,"onUpdate:modelValue":n[0]||(n[0]=t=>a(o).selectedStartDate=t),dateFormat:"dd-mm-yy",class:"p-l3",style:{"border-radius":"7px",height:"30px",width:"100px"},maxDate:new Date},null,8,["modelValue","maxDate"])]),e("div",Pt,[Ut,l($,{class:"mr-3",modelValue:a(o).selectedEndDate,"onUpdate:modelValue":n[1]||(n[1]=t=>a(o).selectedEndDate=t),dateFormat:"dd-mm-yy",style:{"border-radius":"7px",height:"30px",width:"100px"},maxDate:new Date},null,8,["modelValue","maxDate"])]),e("button",{class:"btn-orange py-1 px-4 rounded",onClick:n[2]||(n[2]=t=>(a(o).getTermLeaveBalance(a(y)(a(o).selectedStartDate).format("YYYY-MM-DD"),a(y)(a(o).selectedEndDate).format("YYYY-MM-DD")),a(o).canShowLoading=!0))},"submit")])])]),e("div",null,[l(C,{value:a(o).arrayTermLeaveBalance,paginator:!0,rows:10,class:"",dataKey:"user_code",onRowExpand:m.onRowExpand,onRowCollapse:m.onRowCollapse,expandedRows:v.value,"onUpdate:expandedRows":n[4]||(n[4]=t=>v.value=t),selection:x.value,"onUpdate:selection":n[5]||(n[5]=t=>x.value=t),selectAll:m.selectAll,onSelectAllChange:m.onSelectAllChange,onRowSelect:m.onRowSelect,onRowUnselect:m.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{expansion:d(t=>[e("div",null,[l(C,{value:t.data.leave_balance_details,responsiveLayout:"scroll",selection:x.value,"onUpdate:selection":n[3]||(n[3]=g=>x.value=g),selectAll:m.selectAll,onSelectAllChange:m.onSelectAllChange},{default:d(()=>[l(i,{field:"leave_type",header:"Leave Type"},{default:d(()=>[f(r(t.data.leave_type),1)]),_:2},1024),l(i,{field:"opening_balance",header:"Opening Balance"}),l(i,{field:"availed",header:"availed"}),l(i,{field:"closing_balance",header:"Closing Balance"})]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:d(()=>[l(i,{style:{width:"1rem !important"},expander:!0}),l(i,{field:"user_code",header:"Employee Id",sortable:""}),l(i,{field:"name",header:"Employee Name"}),l(i,{field:"location",header:"Location",sortable:!1}),l(i,{field:"department",header:"Department"}),l(i,{field:"total_leave_balance",header:"Total Leave Balance"})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"])])])])]),e("div",Bt,[e("div",Ot,[e("div",Nt,[e("div",jt,[e("div",Ft,[It,e("div",Ht,[Qt,l($,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:u.value,"onUpdate:modelValue":n[6]||(n[6]=t=>u.value=t),style:{"border-radius":"7px",height:"30px"},onDateSelect:n[7]||(n[7]=t=>(a(o).getTeamLeaveHistory(u.value.getMonth()+1,u.value.getFullYear(),D.value),a(o).canShowLoading=!0))},null,8,["modelValue"])])]),e("div",qt,[l(C,{value:a(o).array_teamLeaveHistory,responsiveLayout:"scroll",paginator:!0,rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rows:5,filters:b.value,"onUpdate:filters":n[9]||(n[9]=t=>b.value=t),filterDisplay:"menu",globalFilterFields:["name"],style:{"white-space":"nowrap"}},{empty:d(()=>[f(" No Employee data..... ")]),default:d(()=>[l(i,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:d(t=>[f(r(t.data.employee_name),1)]),filter:d(({filterModel:t,filterCallback:g})=>[l(L,{modelValue:t.value,"onUpdate:modelValue":s=>t.value=s,onInput:s=>g(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),l(i,{field:"leave_type",header:"Leave Type"}),l(i,{field:"start_date",header:"Start Date"},{body:d(t=>[f(r(a(y)(t.data.start_date).format("DD-MMM-YYYY")),1)]),_:1}),l(i,{field:"end_date",header:"End Date"},{body:d(t=>[f(r(a(y)(t.data.end_date).format("DD-MMM-YYYY")),1)]),_:1}),l(i,{field:"total_leave_datetime",header:"Total Leave Days"}),l(i,{field:"leave_reason",header:"Leave Reason"},{body:d(t=>[t.data.leave_reason&&t.data.leave_reason.length>70?(c(),p("div",Wt,[e("p",{onClick:n[8]||(n[8]=(...g)=>m.toggle&&m.toggle(...g)),class:"font-medium text-orange-400 underline cursor-pointer"}," explore more... "),l(A,{ref:"overlayPanel",style:{height:"80px"}},{default:d(()=>[f(r(t.data.leave_reason),1)]),_:2},1536)])):(c(),p("div",zt,r(t.data.leave_reason??""),1))]),_:1}),l(i,{field:"status",header:"Status"},{body:d(({data:t})=>[e("span",{class:k("customer-badge status-"+t.status)},r(t.status),3)]),filter:d(({filterModel:t,filterCallback:g})=>[l(M,{modelValue:t.value,"onUpdate:modelValue":s=>t.value=s,onChange:s=>g(),options:D.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:d(s=>[s.value?(c(),p("span",{key:0,class:k("customer-badge status-"+s.value)},r(s.value),3)):(c(),p("span",Kt,r(s.placeholder),1))]),option:d(s=>[e("span",{class:k("customer-badge status-"+s.option)},r(s.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),l(i,{field:"",header:"Action",style:{"min-width":"15rem"}},{body:d(t=>[l(T,{icon:"",class:"border-[1px] text-[#000] border-[#000] py-2.5",label:"View",onClick:g=>a(o).getLeaveDetails(t.data),style:{height:"2em"}},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters"])])])])])])],64)}}},Jt={class:"w-full"},Xt={key:0},Zt=e("p",{class:"font-semibold text-2xl text-[#000] font-['Poppins]"},"Leave",-1),ea=e("p",{class:"font-semibold text-sm"},[f("Here you can apply Leave,"),e("a",null,[e("span",{class:"underline cursor-pointer hover:text-indigo-500"}," Company's Leave Policy")]),f(".")],-1),ta=[Zt,ea],aa={key:1,class:"flex justify-between"},la={class:"divide-x py-auto nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},oa=e("li",{class:"nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#leave_balance","aria-selected":"true",role:"tab"}," Leave Balance")],-1),sa=e("a",{class:"pb-2 mx-4 nav-link","data-bs-toggle":"tab",href:"#team_leaveBalance","aria-selected":"false",tabindex:"-1",role:"tab"}," Team Leave Balance",-1),na=[sa],da=e("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#org_leave","aria-selected":"false",tabindex:"-1",role:"tab "}," Org Leave Balance",-1),ia=[da],ra=e("div",{class:"flex items-center"},[e("div",{class:"mr-3"}),e("a",{href:"/attendance-leave-policydocument",id:"",class:"text-[14px] text-blue-500 !underline font-semibold",role:"button","aria-expanded":"false"}," Leave Policy Explanation ")],-1),ca=e("div",null,null,-1),pa={class:"tab-content py-2",id:"pills-tabContent"},_a={class:"tab-pane show fade active",id:"leave_balance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},ma={class:"tab-pane fade show",id:"team_leaveBalance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},ua={class:"tab-pane show",id:"org_leave",role:"tabpanel","aria-labelledby":"pills-profile-tab"},va=e("h6",{class:"mb-4 modal-title fs-21"}," Leave Request",-1),Sa={__name:"LeaveModule",setup(E){const o=Y(),v=O(),x=_(!1);return P(async()=>{await o.getEmployeeLeaveBalance()}),(u,b)=>{const D=h("leaveapply2"),m=h("Dialog");return c(),p(R,null,[a(o).canShowLoading?(c(),j(I,{key:0,class:"absolute z-50 bg-white"})):V("",!0),e("div",Jt,[e("div",null,[a(v).current_user_role==5?(c(),p("div",Xt,ta)):(c(),p("div",aa,[e("ul",la,[oa,a(v).current_user_role==1||a(v).current_user_role==2||a(v).current_user_role==3||a(v).current_user_role==4?(c(),p("li",{key:0,class:"nav-item text-muted",role:"presentation",onClick:b[0]||(b[0]=(...n)=>a(v).clearfunction&&a(v).clearfunction(...n))},na)):V("",!0),a(v).current_user_role==1||a(v).current_user_role==2||a(v).current_user_role==3?(c(),p("li",{key:1,class:"nav-item text-muted",role:"presentation",onClick:b[1]||(b[1]=(...n)=>a(v).clearfunction&&a(v).clearfunction(...n))},ia)):V("",!0)]),ra])),ca]),e("div",pa,[e("div",_a,[l(st)]),e("div",ma,[l(Gt)]),e("div",ua,[l($t)])])]),l(m,{visible:x.value,"onUpdate:visible":b[2]||(b[2]=n=>x.value=n),style:{width:"80vw"},breakpoints:{"960px":"75vw","641px":"100vw"}},{header:d(()=>[va]),default:d(()=>[l(D)]),_:1},8,["visible"])],64)}}};export{Sa as default};