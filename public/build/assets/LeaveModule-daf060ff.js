import{G as c,o as h,c as g,d as e,h as t,F,f as Q,t as i,a2 as a,X as R,H as j,g as _,w as s,l as w,n as B,q as G,a as q,I as K,P as z,J,R as X,u as Z,v as ee,N as te,K as ae,M as oe,A as le,L as se}from"./toastservice.esm-ed3188be.js";import{d as ne,c as de}from"./pinia-503c53ce.js";import{T as ie,B as re,S as ce,b as me,a as pe}from"./styleclass.esm-6ed4e4b9.js";import"./blockui.esm-244d5d2b.js";import{D as ue}from"./dialogservice.esm-dbd866ef.js";import{C as ve}from"./confirmationservice.esm-890ba1ea.js";import{s as _e}from"./progressspinner.esm-db4b8f96.js";import{s as he}from"./row.esm-6ebc942e.js";import{s as ge}from"./columngroup.esm-9dd1458e.js";import{s as ye}from"./calendar.esm-21345d6f.js";import{s as fe}from"./checkbox.esm-a78a69e9.js";import{s as be}from"./chips.esm-03c88f3f.js";import{s as xe}from"./multiselect.esm-8318a143.js";import{s as we}from"./textarea.esm-a3e09931.js";import{s as Le}from"./overlaypanel.esm-592c37b4.js";import{S as W}from"./Service-4fe2d4a2.js";import"./moment-fbc5633a.js";import{a as Y}from"./index-362795f3.js";import{d as y}from"./dayjs.min-2f06af28.js";import{_ as De}from"./LeaveApply-5990fea2.js";/* empty css                                                            */import"./index.esm-a59c3c7b.js";import"./leave_apply_service-8c8165b9.js";const I=ne("useLeaveModuleStore",()=>{W();const U=c(!1),o=c(),f=c(),S=c(),p=c(),A=c(),T=c(),u=c(),d=c(),D=c(),n=c(),M=c(),E=c(!1),$=c({}),O=x=>{E.value=!0,console.log(x),$.value={...x},$.emp_name=x.name};async function N(){U.value=!0;let x="/get-employee-leave-balance";await Y.get(x).then(L=>{console.log(L.data),o.value=L.data,f.value=L.data["Avalied Leaves"]}).finally(()=>{U.value=!1})}async function r(x,L,P){let H=0;await Y.get(window.location.origin+"/currentUserCode ").then(V=>{H=V.data}),await Y.post("/attendance/getEmployeeLeaveDetails",{user_code:H,filter_month:x,filter_year:L,filter_leave_status:P}).then(V=>{S.value=V.data.data,console.log("getEmployeeLeaveHistory() : "+V.data)})}async function C(x,L,P){let H=0;await Y.get(window.location.origin+"/currentUserCode ").then(V=>{H=V.data}),Y.post("/attendance/getTeamEmployeesLeaveDetails",{manager_code:H,filter_month:x,filter_year:L,filter_leave_status:P}).then(V=>{p.value=V.data.data,console.log("getTeamLeaveHistory() : "+V.data)})}async function l(x,L,P){Y.post("/attendance/getAllEmployeesLeaveDetails",{filter_month:x,filter_year:L,filter_leave_status:P}).then(H=>{A.value=H.data.data,console.log("getOrgLeaveHistory() : "+H.data.data)})}async function m(x){Y.post("/attendance/getLeaveInformation",{record_id:x}).then(L=>{M.value=L.data.data,console.log("getLeaveInformation() : "+L.data)})}async function b(x,L){D.value=!0,await Y.post("/fetch-org-leaves-balance",{start_date:x,end_date:L}).then(P=>{T.value=P.data}).finally(()=>{D.value=!1})}async function k(x,L){D.value=!0,console.log(x,L),Y.post("/fetch-team-leave-balance",{start_date:x,end_date:L}).then(P=>{n.value=P.data}).finally(()=>{D.value=!1})}return{canShowLoading:U,canShowLeaveDetails:E,setLeaveDetails:$,getLeaveDetails:O,array_employeeLeaveHistory:S,array_teamLeaveHistory:p,array_orgLeaveHistory:A,array_employeeLeaveBalance:o,array_employeeAvailedLeaveBalance:f,array_orgLeaveBalance:T,selectedStartDate:u,selectedEndDate:d,canshowloadingsrceen:D,arrayTermLeaveBalance:n,getEmployeeLeaveHistory:r,getTeamLeaveHistory:C,getAllEmployeesLeaveHistory:l,getLeaveInformation:m,getEmployeeLeaveBalance:N,getOrgLeaveBalance:b,getTermLeaveBalance:k}}),$e={class:"mb-3 tw-card"},Se={class:"mb-2 row"},Ce=e("div",{class:"col-sm-6 col-xl-6 col-md-6 col-lg-6"},[e("h6",{class:"text-lg font-semibold text-gray-900 modal-title"},"Leave Balance")],-1),Te={class:"col-6 justify-content-end d-flex"},Re={class:"grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4",style:{display:"grid"}},Ae={class:"text-lg font-semibold text-center"},ke={class:"my-3 text-xl font-bold text-center"},Me={key:0},Ee={key:1},Pe={class:"tw-card"},Ve=e("h6",{class:"mb-4 text-lg font-semibold text-gray-900 modal-title"},"Leave Availed",-1),Ye={class:"grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4",style:{display:"grid"}},Be={class:"text-center"},Ue={class:"mb-2 text-base font-semibold"},Oe={class:"mb-0 text-base font-semibold"},He={__name:"EmployeeLeaveBalance",setup(U){const o=I();return(f,S)=>(h(),g(F,null,[e("div",$e,[e("div",Se,[Ce,e("div",Te,[t(De)])]),e("div",Re,[(h(!0),g(F,null,Q(a(o).array_employeeLeaveBalance,p=>(h(),g("div",{key:p,class:"p-1 my-4 rounded-lg shadow-md tw-card dynamic-card hover:bg-slate-100"},[e("p",Ae,i(p.leave_type),1),e("p",ke,[p.leave_balance==""?(h(),g("span",Me,"0")):(h(),g("span",Ee,i(p.leave_balance),1))])]))),128))])]),e("div",Pe,[Ve,e("div",Ye,[(h(!0),g(F,null,Q(a(o).array_employeeLeaveBalance,p=>(h(),g("div",{class:"bg-indigo-100 border-l-4 border-indigo-300 tw-card",key:p},[e("div",Be,[e("p",Ue,i(p.leave_type),1),e("h6",Oe,i(p.avalied_leaves),1)])]))),128))])])],64))}},Ne={class:"mt-3 row"},Fe={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12"},Ie={class:"mb-0 card leave-history"},je={class:"card-body"},Qe=e("h6",{class:"mb-4 text-lg font-semibold text-gray-900 modal-title"}," Leave history ",-1),qe={class:"d-flex justify-content-end mb-2"},We=e("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),Ge={class:"table-responsive"},Ke={key:0},ze={key:1},Je={key:1},Xe={class:"w-full"},Ze={class:"w-full"},et={class:"border w-full mt-5"},tt={class:"p-3 pl-5 d-flex align-items-center border"},at={class:"rounded-circle shadow-sm d-flex justify-content-center align-items-center bg-yellow-100",style:{width:"80px",height:"80px"}},ot={class:"fs-5 fw-bold"},lt={class:"ml-5"},st={class:"fs-5 fw-bold mb-2"},nt={class:"fs-6 text-neutral-400"},dt={class:"border w-full d-flex py-4 px-4"},it={class:"mx-2 p-1 rounded-lg"},rt={class:"text-center py-1 px-2 text-light rounded-top fw-bold",style:{"background-color":"navy"}},ct={class:"text-center py-1 px-2 fs-5 fw-bold"},mt={class:"text-center py-1 px-2 fs-6 fw-bold"},pt={class:"py-3"},ut={class:"fs- font-semibold text-primary-800"},vt={class:"font-semibold fs-6"},_t={class:"border w-full py-4 px-4"},ht=e("h1",{class:"fs-5 fw-bold"},"Notified To:",-1),gt={class:"card px-3 py-2 d-flex mt-3",style:{"min-width":"250px","max-width":"300px",display:"flex"}},yt={class:"d-flex p-2 align-items-center"},ft={class:"rounded-circle bg-blue-100 d-flex justify-content-center align-items-center",style:{width:"40px",height:"40px"}},bt={class:"flex-column px-3"},xt={class:"fs-6 fw-bold"},wt={class:"py-2 text-neutral-400"},Lt={class:"border w-full py-4 px-4"},Dt=e("h1",{class:"fs-5 fw-bold"},"Approved by",-1),$t={class:"card px-3 py-2 d-flex mt-3",style:{"min-width":"180px","max-width":"300px",display:"flex"}},St={class:"d-flex p-2 align-items-center"},Ct=e("div",{class:"rounded-circle bg-green-400 d-flex justify-content-center align-items-center",style:{width:"40px",height:"40px"}},[e("i",{class:"pi pi-check text-light"})],-1),Tt={class:"flex-column px-3"},Rt={class:"fs-6 fw-bold"},At={class:"py-2 text-neutral-400"},kt={class:"my-4 mx-3"},Mt={__name:"EmployeeLeaveDetails",setup(U){const o=I(),f=c(!0),S=c(),p=c(),A=D=>{S.value.toggle(D)},T=c({global:{value:null,matchMode:R.CONTAINS},employee_name:{value:null,matchMode:R.STARTS_WITH,matchMode:R.EQUALS,matchMode:R.CONTAINS},status:{value:null,matchMode:R.EQUALS}}),u=c(["Pending","Approved","Rejected"]);j(async()=>{console.log(p.v),await o.getEmployeeLeaveHistory(y().month()+1,y().year(),["Approved","Pending","Rejected"]),f.value=!1});function d(){o.canShowLeaveDetails=!1}return(D,n)=>{const M=_("Calendar"),E=_("Button"),$=_("Column"),O=_("OverlayPanel"),N=_("Dropdown"),r=_("DataTable"),C=_("Textarea"),l=_("Dialog");return h(),g(F,null,[t(He),e("div",Ne,[e("div",Fe,[e("div",Ie,[e("div",je,[Qe,e("div",qe,[We,t(M,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:p.value,"onUpdate:modelValue":n[0]||(n[0]=m=>p.value=m),style:{border:"1px solid orange","border-radius":"7px",height:"38px"}},null,8,["modelValue"]),t(E,{class:"h-10 mb-2 btn btn-orange",label:"Submit",onClick:n[1]||(n[1]=m=>a(o).getEmployeeLeaveHistory(p.value.getMonth()+1,p.value.getFullYear(),u.value))})]),e("div",Ge,[t(r,{value:a(o).array_employeeLeaveHistory,loading:f.value,paginator:!0,rows:5,dataKey:"id",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:T.value,"onUpdate:filters":n[2]||(n[2]=m=>T.value=m),filterDisplay:"menu",globalFilterFields:["name","status"]},{empty:s(()=>[w(" No Employee data..... ")]),loading:s(()=>[w(" Loading customers data. Please wait. ")]),default:s(()=>[t($,{field:"leave_type",header:"Leave Type",style:{"min-width":"8rem"}}),t($,{field:"start_date",header:"Start Date",style:{"min-width":"8rem"}},{body:s(m=>[w(i(a(y)(m.data.start_date).format("DD-MMM-YYYY")),1)]),_:1}),t($,{field:"end_date",header:"End Date",dataType:"date",style:{"min-width":"8rem"}},{body:s(m=>[w(i(a(y)(m.data.end_date).format("DD-MMM-YYYY")),1)]),_:1}),t($,{field:"leave_reason",header:"Leave Reason",style:{"min-width":"12rem"}},{body:s(m=>[m.data.leave_reason&&m.data.leave_reason.length>70?(h(),g("div",Ke,[e("p",{onClick:A,class:"font-medium text-orange-400 underline cursor-pointer"}," explore more... "),t(O,{ref_key:"overlayPanel",ref:S,style:{height:"80px"}},{default:s(()=>[w(i(m.data.leave_reason),1)]),_:2},1536)])):(h(),g("div",ze,i(m.data.leave_reason??""),1))]),_:1}),t($,{field:"reviewer_name",header:"Approver Name"}),t($,{field:"reviewer_comments",header:"Approver Comments"}),t($,{field:"status",header:"Status",icon:"pi pi-check"},{body:s(({data:m})=>[e("span",{class:B("customer-badge status-"+m.status)},i(m.status),3)]),filter:s(({filterModel:m,filterCallback:b})=>[t(N,{modelValue:m.value,"onUpdate:modelValue":k=>m.value=k,onChange:k=>b(),options:u.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:s(k=>[k.value?(h(),g("span",{key:0,class:B("customer-badge status-"+k.value)},i(k.value),3)):(h(),g("span",Je,i(k.placeholder),1))]),option:s(k=>[e("span",{class:B("customer-badge status-"+k.option)},i(k.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t($,{field:"",header:"Action",style:{"min-width":"15rem"}},{body:s(m=>[t(E,{type:"button",icon:"",class:"text-white Button py-2.5",label:"View",onClick:b=>a(o).getLeaveDetails(m.data),style:{height:"2em"}},null,8,["onClick"])]),_:1})]),_:1},8,["value","loading","filters"])])])])])]),t(l,{header:"Header",visible:a(o).canShowLeaveDetails,"onUpdate:visible":n[3]||(n[3]=m=>a(o).canShowLeaveDetails=m),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"50vw",borderTop:"5px solid #002f56"},modal:!0,closable:!0,closeOnEscape:!0},{header:s(()=>[e("div",Xe,[e("h5",{style:G({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"}),class:"fs-5 fw-bold"}," Leave Details Request",4)])]),default:s(()=>[e("div",Ze,[e("div",et,[e("div",tt,[e("div",at,[e("h1",ot,i(a(o).setLeaveDetails.user_short_name),1)]),e("div",lt,[e("h1",st,i(a(o).setLeaveDetails.name),1),e("div",null,[e("p",nt,"Requested on "+i(a(o).setLeaveDetails.leaverequest_date),1)])])]),e("div",dt,[e("div",it,[e("h1",rt,i(a(y)(a(o).setLeaveDetails.end_date).format("MMM")),1),e("h1",ct,i(a(y)(a(o).setLeaveDetails.end_date).format("DD")),1),e("h1",mt,i(a(y)(a(o).setLeaveDetails.end_date).format("dddd")),1)]),e("div",pt,[e("h1",ut,[w(i(a(o).setLeaveDetails.total_leave_datetime)+" Day of "+i(a(o).setLeaveDetails.leave_type)+" ",1),e("span",vt,"("+i(a(o).setLeaveDetails.leave_reason)+")",1)])])]),e("div",_t,[ht,e("div",gt,[e("div",yt,[e("div",ft,i(a(o).setLeaveDetails.reviewer_short_name),1),e("div",bt,[e("h1",xt,i(a(o).setLeaveDetails.reviewer_name),1),e("h1",wt,i(a(o).setLeaveDetails.reviewer_designation),1)])])])]),e("div",Lt,[Dt,e("div",$t,[e("div",St,[Ct,e("div",Tt,[e("h1",Rt,i(a(o).setLeaveDetails.reviewer_name),1),e("h1",At," on "+i(a(y)(a(o).setLeaveDetails.leaverequest_date).format("DD-MMM-YYYY hh:mm:ss A")),1)])])])]),e("div",kt,[t(C,{name:"",id:"",cols:"90",rows:"5",autoResize:"",placeholder:"Add Comment"})])])]),e("div",{class:"text-end mx-4 my-4"},[e("button",{class:"btn btn-orange px-5",onClick:d},"Post")])]),_:1},8,["visible"])],64)}}},Et={class:"card top-line"},Pt={class:"card-body"},Vt={class:"row"},Yt={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12 d-flex justify-content-between align-content-center"},Bt=e("h6",{class:"h-7 mt-3 text-lg font-semibold text-gray-900 modal-title"},"Org Leave Balance",-1),Ut={class:"my-2 d-flex justify-content-between align-items-center"},Ot=e("div",null,null,-1),Ht={class:"d-flex"},Nt={class:""},Ft=e("label",{for:" ",class:"text-blue-900 mx-2"},"Start Date",-1),It={class:""},jt=e("label",{for:" ",class:"text-blue-900 mx-2"},"End Date",-1),Qt=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),qt={class:"mt-3 row"},Wt={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12"},Gt={class:"mb-0 card leave-history"},Kt={class:"card-body"},zt=e("h6",{class:"mb-4 text-lg font-semibold text-gray-900 modal-title"},"Org Leave history",-1),Jt={class:"table-responsive"},Xt={class:"d-flex justify-content-end"},Zt=e("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),ea={key:0},ta={key:1},aa={key:1},oa={__name:"OrgLeaveDetails",setup(U){const o=I();c(),c(),c(!0);const f=c(),S=c([]),p=c();c();const A=c({employee_name:{value:null,matchMode:R.STARTS_WITH,matchMode:R.EQUALS,matchMode:R.CONTAINS},status:{value:null,matchMode:R.EQUALS}}),T=c(["Pending","Approved","Rejected"]);return j(async()=>{await o.getOrgLeaveBalance(),await o.getAllEmployeesLeaveHistory(y().month()+1,y().year(),["Approved","Pending","Rejected"]),console.log("Org Leave details : "+o.array_orgLeaveHistory)}),(u,d)=>{const D=_("Calendar"),n=_("Column"),M=_("DataTable"),E=_("ProgressSpinner"),$=_("Dialog"),O=_("Button"),N=_("InputText"),r=_("OverlayPanel"),C=_("Dropdown");return h(),g(F,null,[e("div",Et,[e("div",Pt,[e("div",Vt,[e("div",Yt,[Bt,e("div",Ut,[Ot,e("div",Ht,[e("div",Nt,[Ft,t(D,{modelValue:a(o).selectedStartDate,"onUpdate:modelValue":d[0]||(d[0]=l=>a(o).selectedStartDate=l),dateFormat:"dd-mm-yy",class:"p-l3",style:{border:"1px solid orange","border-radius":"7px",height:"38px",width:"100px"},maxDate:new Date},null,8,["modelValue","maxDate"])]),e("div",It,[jt,t(D,{class:"mr-3",modelValue:a(o).selectedEndDate,"onUpdate:modelValue":d[1]||(d[1]=l=>a(o).selectedEndDate=l),dateFormat:"dd-mm-yy",style:{border:"1px solid orange","border-radius":"7px",height:"38px",width:"100px"},maxDate:new Date},null,8,["modelValue","maxDate"])]),e("button",{class:"btn-orange py-1 px-4 rounded",onClick:d[2]||(d[2]=l=>a(o).getOrgLeaveBalance(a(y)(a(o).selectedStartDate).format("YYYY-MM-DD"),a(y)(a(o).selectedEndDate).format("YYYY-MM-DD")))},"submit")])])]),e("div",null,[t(M,{value:a(o).array_orgLeaveBalance,paginator:!0,rows:10,class:"",dataKey:"user_code",onRowExpand:u.onRowExpand,onRowCollapse:u.onRowCollapse,expandedRows:S.value,"onUpdate:expandedRows":d[4]||(d[4]=l=>S.value=l),selection:p.value,"onUpdate:selection":d[5]||(d[5]=l=>p.value=l),selectAll:u.selectAll,onSelectAllChange:u.onSelectAllChange,onRowSelect:u.onRowSelect,onRowUnselect:u.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{expansion:s(l=>[e("div",null,[t(M,{value:l.data.leave_balance_details,responsiveLayout:"scroll",selection:p.value,"onUpdate:selection":d[3]||(d[3]=m=>p.value=m),selectAll:u.selectAll,onSelectAllChange:u.onSelectAllChange},{default:s(()=>[t(n,{field:"leave_type",header:"Leave Type"},{default:s(()=>[w(i(l.data.leave_type),1)]),_:2},1024),t(n,{field:"opening_balance",header:"Opening Balance"}),t(n,{field:"avalied",header:"Avalied"}),t(n,{field:"closing_balance",header:"Closing Balance"})]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:s(()=>[t(n,{expander:!0}),t(n,{field:"user_code",header:"Employee Id",sortable:""}),t(n,{field:"name",header:"Employee Name"}),t(n,{field:"location",header:"Location",sortable:!1}),t(n,{field:"department",header:"Department"}),t(n,{field:"total_leave_balance",header:"Total Leave Balance"})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"])])])])]),t($,{header:"Header",visible:a(o).canshowloadingsrceen,"onUpdate:visible":d[6]||(d[6]=l=>a(o).canshowloadingsrceen=l),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[t(E,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[Qt]),_:1},8,["visible"]),e("div",qt,[e("div",Wt,[e("div",Gt,[e("div",Kt,[zt,e("div",Jt,[e("div",Xt,[Zt,t(D,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:f.value,"onUpdate:modelValue":d[7]||(d[7]=l=>f.value=l),style:{border:"1px solid orange","border-radius":"7px",height:"38px"}},null,8,["modelValue"]),t(O,{class:"h-10 mb-2 btn btn-orange",label:"Submit",onClick:d[8]||(d[8]=l=>a(o).getAllEmployeesLeaveHistory(f.value.getMonth()+1,f.value.getFullYear(),T.value))})]),t(M,{value:a(o).array_orgLeaveHistory,responsiveLayout:"scroll",paginator:!0,rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rows:5,filters:A.value,"onUpdate:filters":d[10]||(d[10]=l=>A.value=l),filterDisplay:"menu",globalFilterFields:["name"],style:{"white-space":"nowrap"}},{empty:s(()=>[w(" No Employee data..... ")]),default:s(()=>[t(n,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:s(l=>[w(i(l.data.employee_name),1)]),filter:s(({filterModel:l,filterCallback:m})=>[t(N,{modelValue:l.value,"onUpdate:modelValue":b=>l.value=b,onInput:b=>m(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(n,{field:"leave_type",header:"Leave Type"}),t(n,{field:"start_date",header:"Start Date"},{body:s(l=>[w(i(a(y)(l.data.start_date).format("DD-MMM-YYYY")),1)]),_:1}),t(n,{field:"end_date",header:"End Date"},{body:s(l=>[w(i(a(y)(l.data.end_date).format("DD-MMM-YYYY")),1)]),_:1}),t(n,{field:"total_leave_datetime",header:"Total Leave Days"}),t(n,{field:"leave_reason",header:"Leave Reason"},{body:s(l=>[l.data.leave_reason&&l.data.leave_reason.length>70?(h(),g("div",ea,[e("p",{onClick:d[9]||(d[9]=(...m)=>u.toggle&&u.toggle(...m)),class:"font-medium text-orange-400 underline cursor-pointer"}," More... "),t(r,{ref:"overlayPanel",style:{height:"80px"}},{default:s(()=>[w(i(l.data.leave_reason),1)]),_:2},1536)])):(h(),g("div",ta,i(l.data.leave_reason??""),1))]),_:1}),t(n,{field:"status",header:"Status"},{body:s(({data:l})=>[e("span",{class:B("customer-badge status-"+l.status)},i(l.status),3)]),filter:s(({filterModel:l,filterCallback:m})=>[t(C,{modelValue:l.value,"onUpdate:modelValue":b=>l.value=b,onChange:b=>m(),options:T.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:s(b=>[b.value?(h(),g("span",{key:0,class:B("customer-badge status-"+b.value)},i(b.value),3)):(h(),g("span",aa,i(b.placeholder),1))]),option:s(b=>[e("span",{class:B("customer-badge status-"+b.option)},i(b.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(n,{field:"",header:"Action",style:{"min-width":"15rem"}},{body:s(l=>[t(O,{type:"button",icon:"",class:"text-white Button py-2.5",label:"View",onClick:m=>a(o).getLeaveDetails(l.data),style:{height:"2em"}},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters"])])])])])])],64)}}},la={class:"card top-line"},sa={class:"card-body"},na={class:"row"},da={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12 d-flex justify-content-between align-items-center"},ia=e("h6",{class:"mb-4 text-lg font-semibold text-gray-900 modal-title"},"Team Leave Balance",-1),ra={class:"my-2 d-flex justify-content-between align-items-center"},ca=e("div",null,null,-1),ma={class:"d-flex"},pa={class:""},ua=e("label",{for:" ",class:"text-blue-900 mx-2"},"Start Date",-1),va={class:""},_a=e("label",{for:" ",class:"text-blue-900 mx-2"},"End Date",-1),ha={class:"mt-3 row"},ga={class:"col-sm-12 col-xl-12 col-md-12 col-lg-12"},ya={class:"mb-0 card leave-history"},fa={class:"card-body"},ba=e("h6",{class:"mb-4 text-lg font-semibold text-gray-900 modal-title"},"Team Leave history",-1),xa={class:"table-responsive"},wa={class:"d-flex justify-content-end"},La=e("label",{for:"",class:"my-2 text-lg font-semibold"},"Select Month",-1),Da=e("div",{id:"team_leaveHistory",class:"custom_gridJs"},null,-1),$a={key:0},Sa={key:1},Ca={key:1},Ta={__name:"TeamLeaveDetails",setup(U){const o=I();c(),c(),c(),c(),c(),c(!0),c();const f=c([]),S=c(),p=c(),A=c({employee_name:{value:null,matchMode:R.STARTS_WITH,matchMode:R.EQUALS,matchMode:R.CONTAINS},status:{value:null,matchMode:R.EQUALS}}),T=c(["Pending","Approved","Rejected"]);return j(async()=>{await o.getTermLeaveBalance(),await o.getTeamLeaveHistory(y().month()+1,y().year(),["Approved","Pending","Rejected"])}),(u,d)=>{const D=_("Calendar"),n=_("Column"),M=_("DataTable"),E=_("Button"),$=_("InputText"),O=_("OverlayPanel"),N=_("Dropdown");return h(),g(F,null,[e("div",la,[e("div",sa,[e("div",na,[e("div",da,[ia,e("div",ra,[ca,e("div",ma,[e("div",pa,[ua,t(D,{modelValue:a(o).selectedStartDate,"onUpdate:modelValue":d[0]||(d[0]=r=>a(o).selectedStartDate=r),dateFormat:"dd-mm-yy",class:"p-l3",style:{border:"1px solid orange","border-radius":"7px",height:"38px",width:"100px"},maxDate:new Date},null,8,["modelValue","maxDate"])]),e("div",va,[_a,t(D,{class:"mr-3",modelValue:a(o).selectedEndDate,"onUpdate:modelValue":d[1]||(d[1]=r=>a(o).selectedEndDate=r),dateFormat:"dd-mm-yy",style:{border:"1px solid orange","border-radius":"7px",height:"38px",width:"100px"},maxDate:new Date},null,8,["modelValue","maxDate"])]),e("button",{class:"btn-orange py-1 px-4 rounded",onClick:d[2]||(d[2]=r=>a(o).getTermLeaveBalance(a(y)(a(o).selectedStartDate).format("YYYY-MM-DD"),a(y)(a(o).selectedEndDate).format("YYYY-MM-DD")))},"submit")])])]),e("div",null,[t(M,{value:a(o).arrayTermLeaveBalance,paginator:!0,rows:10,class:"",dataKey:"user_code",onRowExpand:u.onRowExpand,onRowCollapse:u.onRowCollapse,expandedRows:f.value,"onUpdate:expandedRows":d[4]||(d[4]=r=>f.value=r),selection:S.value,"onUpdate:selection":d[5]||(d[5]=r=>S.value=r),selectAll:u.selectAll,onSelectAllChange:u.onSelectAllChange,onRowSelect:u.onRowSelect,onRowUnselect:u.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{expansion:s(r=>[e("div",null,[t(M,{value:r.data.leave_balance_details,responsiveLayout:"scroll",selection:S.value,"onUpdate:selection":d[3]||(d[3]=C=>S.value=C),selectAll:u.selectAll,onSelectAllChange:u.onSelectAllChange},{default:s(()=>[t(n,{field:"leave_type",header:"Leave Type"},{default:s(()=>[w(i(r.data.leave_type),1)]),_:2},1024),t(n,{field:"opening_balance",header:"Opening Balance"}),t(n,{field:"avalied",header:"Avalied"}),t(n,{field:"closing_balance",header:"Closing Balance"})]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:s(()=>[t(n,{expander:!0}),t(n,{field:"user_code",header:"Employee Id",sortable:""}),t(n,{field:"name",header:"Employee Name"}),t(n,{field:"location",header:"Location",sortable:!1}),t(n,{field:"department",header:"Department"}),t(n,{field:"total_leave_balance",header:"Total Leave Balance"})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"])])])])]),e("div",ha,[e("div",ga,[e("div",ya,[e("div",fa,[ba,e("div",xa,[e("div",wa,[La,t(D,{view:"month",dateFormat:"mm/yy",class:"mx-4",modelValue:p.value,"onUpdate:modelValue":d[6]||(d[6]=r=>p.value=r),style:{border:"1px solid orange","border-radius":"7px",height:"38px"}},null,8,["modelValue"]),t(E,{class:"h-10 mb-2 btn btn-orange",label:"Submit",onClick:d[7]||(d[7]=r=>a(o).getTeamLeaveHistory(p.value.getMonth()+1,p.value.getFullYear(),T.value))})]),Da,t(M,{value:a(o).array_teamLeaveHistory,responsiveLayout:"scroll",paginator:!0,rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",rows:5,filters:A.value,"onUpdate:filters":d[9]||(d[9]=r=>A.value=r),filterDisplay:"menu",globalFilterFields:["name"],style:{"white-space":"nowrap"}},{empty:s(()=>[w(" No Employee data..... ")]),default:s(()=>[t(n,{class:"font-bold",field:"employee_name",header:"Employee Name"},{body:s(r=>[w(i(r.data.employee_name),1)]),filter:s(({filterModel:r,filterCallback:C})=>[t($,{modelValue:r.value,"onUpdate:modelValue":l=>r.value=l,onInput:l=>C(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(n,{field:"leave_type",header:"Leave Type"}),t(n,{field:"start_date",header:"Start Date"},{body:s(r=>[w(i(a(y)(r.data.start_date).format("DD-MMM-YYYY")),1)]),_:1}),t(n,{field:"end_date",header:"End Date"},{body:s(r=>[w(i(a(y)(r.data.end_date).format("DD-MMM-YYYY")),1)]),_:1}),t(n,{field:"total_leave_datetime",header:"Total Leave Days"}),t(n,{field:"leave_reason",header:"Leave Reason"},{body:s(r=>[r.data.leave_reason&&r.data.leave_reason.length>70?(h(),g("div",$a,[e("p",{onClick:d[8]||(d[8]=(...C)=>u.toggle&&u.toggle(...C)),class:"font-medium text-orange-400 underline cursor-pointer"}," explore more... "),t(O,{ref:"overlayPanel",style:{height:"80px"}},{default:s(()=>[w(i(r.data.leave_reason),1)]),_:2},1536)])):(h(),g("div",Sa,i(r.data.leave_reason??""),1))]),_:1}),t(n,{field:"status",header:"Status"},{body:s(({data:r})=>[e("span",{class:B("customer-badge status-"+r.status)},i(r.status),3)]),filter:s(({filterModel:r,filterCallback:C})=>[t(N,{modelValue:r.value,"onUpdate:modelValue":l=>r.value=l,onChange:l=>C(),options:T.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:s(l=>[l.value?(h(),g("span",{key:0,class:B("customer-badge status-"+l.value)},i(l.value),3)):(h(),g("span",Ca,i(l.placeholder),1))]),option:s(l=>[e("span",{class:B("customer-badge status-"+l.option)},i(l.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),t(n,{field:"",header:"Action",style:{"min-width":"15rem"}},{body:s(r=>[t(E,{type:"button",icon:"",class:"text-white Button py-2.5",label:"View",onClick:C=>a(o).getLeaveDetails(r.data),style:{height:"2em"}},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters"])])])])])])],64)}}};const Ra={class:"Leave_dashboard mt-30"},Aa={class:"pt-1 pb-0 mb-3 tw-card left-line"},ka={class:"flex justify-between"},Ma={class:"nav nav-pills nav-tabs-dashed",role:"tablist"},Ea=e("li",{class:"nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#leave_balance","aria-selected":"true",role:"tab"}," Leave Balance")],-1),Pa={key:0,class:"nav-item text-muted",role:"presentation"},Va=e("a",{class:"pb-2 mx-4 nav-link","data-bs-toggle":"tab",href:"#team_leaveBalance","aria-selected":"false",tabindex:"-1",role:"tab"}," Team Leave Balance",-1),Ya=[Va],Ba={key:1,class:"nav-item text-muted",role:"presentation"},Ua=e("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#org_leave","aria-selected":"false",tabindex:"-1",role:"tab"}," Org Leave Balance",-1),Oa=[Ua],Ha=e("div",{class:"flex items-center"},[e("div",{class:"mr-3"},[e("div",{class:"input-group me-2"},[e("label",{class:"input-group-text",for:"inputGroupSelect01"},[e("i",{class:"fa fa-calendar text-primary","aria-hidden":"true"})]),e("select",{class:"form-select btn-line-primary",id:"inputGroupSelect01"})])]),e("div",{class:""},[e("a",{href:"/attendance-leave-policydocument",id:"",class:"btn btn-orange",role:"button","aria-expanded":"false"}," Leave Policy Explanation ")])],-1),Na={class:"tab-content",id:"pills-tabContent"},Fa={class:"tab-pane show fade active",id:"leave_balance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Ia={class:"tab-pane fade show",id:"team_leaveBalance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},ja={class:"tab-pane show",id:"org_leave",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Qa=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),qa={__name:"LeaveModule",setup(U){const o=I(),f=W();return j(()=>{o.getEmployeeLeaveBalance()}),(S,p)=>{const A=_("ProgressSpinner"),T=_("Dialog");return h(),g(F,null,[e("div",Ra,[e("div",Aa,[e("div",ka,[e("ul",Ma,[Ea,a(f).current_user_role==2||a(f).current_user_role==4?(h(),g("li",Pa,Ya)):q("",!0),a(f).current_user_role==2?(h(),g("li",Ba,Oa)):q("",!0)]),Ha])]),e("div",Na,[e("div",Fa,[t(Mt)]),e("div",Ia,[t(Ta)]),e("div",ja,[t(oa)])])]),t(T,{header:"Header",visible:a(o).canShowLoading,"onUpdate:visible":p[0]||(p[0]=u=>a(o).canShowLoading=u),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[t(A,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[Qa]),_:1},8,["visible"])],64)}}},v=K(qa),Wa=de();v.use(z,{ripple:!0});v.use(ve);v.use(J);v.use(ue);v.use(Wa);v.directive("tooltip",ie);v.directive("badge",re);v.directive("ripple",X);v.directive("styleclass",ce);v.directive("focustrap",Z);v.component("Button",ee);v.component("DataTable",me);v.component("Column",pe);v.component("ColumnGroup",ge);v.component("Row",he);v.component("Toast",te);v.component("ConfirmDialog",ae);v.component("Dropdown",oe);v.component("InputText",le);v.component("Dialog",se);v.component("ProgressSpinner",_e);v.component("Calendar",ye);v.component("Checkbox",fe);v.component("Chips",be);v.component("MultiSelect",xe);v.component("Textarea",we);v.component("OverlayPanel",Le);v.mount("#LeaveModule");
