import{G as v,a1 as H,H as O,X as C,g as c,o as w,c as A,d as e,h as t,w as n,l as P,t as T,a as k,a2 as q,k as K,E as Q,F as z,a4 as F,n as N,I as Y,P as G,J,R as X,u as Z,v as ee,N as te,K as oe,M as se,A as ae,L as le}from"./toastservice.esm-ed3188be.js";/* empty css                 */import{d as ne,c as re}from"./pinia-503c53ce.js";import{T as de,B as ie,S as ce,b as me,a as pe,c as ue}from"./styleclass.esm-6ed4e4b9.js";import"./blockui.esm-244d5d2b.js";import{D as ve}from"./dialogservice.esm-dbd866ef.js";import{C as be}from"./confirmationservice.esm-890ba1ea.js";import{s as he}from"./progressspinner.esm-db4b8f96.js";import{s as ge}from"./row.esm-6ebc942e.js";import{s as fe}from"./columngroup.esm-9dd1458e.js";import{s as _e}from"./calendar.esm-21345d6f.js";import{s as ye}from"./textarea.esm-a3e09931.js";import{s as xe}from"./chips.esm-03c88f3f.js";import{s as we}from"./multiselect.esm-8318a143.js";import{s as Ae}from"./selectbutton.esm-dd7eccf1.js";import{s as Re}from"./radiobutton.esm-25bca68c.js";import{s as Se}from"./checkbox.esm-a78a69e9.js";import{a as j}from"./index-362795f3.js";import"./dayjs.min-2f06af28.js";import{_ as $e}from"./_plugin-vue_export-helper-c27b6911.js";const W=ne("SalaryAdvanceApprovals",()=>{const L=v(),s=v(),m=v(!1),r=v();async function b(){m.value=!0,await j.get("http://localhost:3000/salary_advance").then(g=>{L.value=g.data}).finally(()=>{m.value=!1})}async function p(g,S){m.value=!0,s.value=g;let R=S;await j.post("http://localhost:3000/submitApproveAndReject",{record_id:R,status:s=="Approve"?"Approved":s=="Reject"?"Rejected":s,reviewer_comments:""}).then(()=>{}).finally(()=>{m.value=!1})}async function _(g,S,R){s.value=S,m.value=!0;let I=g;await j.post("http://localhost:3000/submitApproveAndReject",{record_id:I,status:s=="Approve"?"Approved":s=="Reject"?"Rejected":s,reviewer_comments:""}).then(()=>{}).finally(()=>{m.value=!1})}const h=v();async function y(){m.value=!0,h.value="",await j.get("http://localhost:3000/InterestFreeloan").then(g=>{h.value=g.data}).finally(()=>{m.value=!1})}async function u(g,S,R){s.value=S,m.value=!0,console.log(R);let I=g;await j.post("http://localhost:3000/submitApproveAndReject",{record_id:I,status:s=="Approve"?"Approved":s=="Reject"?"Rejected":s,reviewer_comments:""}).then(()=>{}).finally(()=>{m.value=!1})}async function $(g,S){m.value=!0,s.value=g;let R=S;await j.post("http://localhost:3000/submitApproveAndReject",{record_id:R,status:s=="Approve"?"Approved":s=="Reject"?"Rejected":s,reviewer_comments:""}).then(()=>{}).finally(()=>{m.value=!1})}return{arraySalaryAdvance:L,currentlySelectedStatus:s,Request_comments:r,canShowLoadingScreen:m,getEmpDetails:b,SAbulkApproveAndReject:p,SAapproveAndReject:_,arrayIFL_List:h,getInterestFreeLoanDetails:y,IFLapproveAndReject:u,IFLbulkApproveAndReject:$}}),Ce={class:"mr-4 card"},ke={class:"px-5 row d-flex justify-content-start align-items-center card-body"},Pe=e("div",{class:"w-8 fs-4"},[e("p",{class:"text-xl font-medium"},[P("The company allows employees to request a salary advance of up to "),e("strong",{class:"text-lg"}," 100%"),P(" of their monthly salary.")])],-1),Te=e("button",{class:"btn btn-border-orange"},"View Report",-1),Le=F('<div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div><div class="table-responsive"></div>',2),Ie={key:0,class:"text-orange-500"},De={key:1,class:"text-green-500"},Ee={key:2,class:"text-red-500"},Me=e("div",{class:"confirmation-content"},[e("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}})],-1),je=e("h1",{class:"mx-3 fs-4 text-xxl",style:{"border-left":"3px solid var(--orange)","padding-left":"10px"}},"New Salary Advance Request",-1),qe={class:"flex pb-2 bg-gray-100 rounded-lg gap-7"},Ue={class:"w-4 p-4 mx-4"},Ve=e("span",{class:"font-semibold"},"Required Amount",-1),Ne=e("p",{class:"text-sm font-semibold text-gray-500"},"Max Eligible Amount : 20,000",-1),Fe=e("div",{class:"w-5 p-4 mx-4"},[e("span",{class:"font-semibold"},"Required Amount"),e("div",{class:"w-full"},[e("p",{class:"my-2 text-gray-600 fs-5 text-md text-clip"},[P("The advance amount will be deducted from the next month's salary "),e("strong",{class:"text-black fs-5"},"(ie, March 31, 2023)")])])],-1),Be=e("div",{class:"gap-6 p-4 my-6 bg-gray-100 rounded-lg"},[e("span",{class:"font-semibold"},"Reason"),e("div",{class:"border w-full h-28 rounded bg-slate-50 p-2"},"Lorem ipsum dolor sit.")],-1),Oe={class:"gap-6 p-4 my-6 bg-gray-100 rounded-lg"},ze=e("span",{class:"font-semibold"},"your Comments",-1),We={class:"float-right"},He=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),Ke={__name:"salary_advance",setup(L){const s=W(),m=v([]),r=v(),b=v(),p=v(),_=v(!1),h=v(!1),y=v(),u=H({required_Amount:""});O(()=>{s.getEmpDetails()}),v({global:{value:null,matchMode:C.CONTAINS},name:{value:null,matchMode:C.STARTS_WITH,matchMode:C.EQUALS,matchMode:C.CONTAINS},status:{value:"Pending",matchMode:C.EQUALS}});function $(l,o){console.log(l),_.value=!0,b.value=o,p.value=l,u.required_Amount=l.Advance_Amount,console.log(u.required_Amount)}async function g(l){_.value=!1,console.log(p.value,l),await s.SAapproveAndReject(p.value,l,y.value),b.value=l}function S(){h.value=!0}function R(){h.value=!1}async function I(l){R(),b.value=l,await s.SAbulkApproveAndReject(b.value,s.arraySalaryAdvance)}return(l,o)=>{const f=c("Column"),D=c("Button"),E=c("DataTable"),M=c("Dialog"),V=c("Textarea"),x=c("ProgressSpinner");return w(),A(z,null,[e("div",Ce,[e("div",ke,[e("div",{class:"flex justify-between gap-6 my-2"},[Pe,e("div",{class:"float-right"},[Te,e("button",{onClick:S,class:"mx-4 btn btn-orange"}," Approval All")])]),Le,t(E,{value:q(s).arraySalaryAdvance,paginator:!0,rows:10,class:"",dataKey:"id",onRowExpand:l.onRowExpand,onRowCollapse:l.onRowCollapse,expandedRows:m.value,"onUpdate:expandedRows":o[1]||(o[1]=d=>m.value=d),selection:r.value,"onUpdate:selection":o[2]||(o[2]=d=>r.value=d),selectAll:l.selectAll,onSelectAllChange:l.onSelectAllChange,onRowSelect:l.onRowSelect,onRowUnselect:l.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{expansion:n(d=>[e("div",null,[t(E,{value:d.data.emp_details,responsiveLayout:"scroll",selection:r.value,"onUpdate:selection":o[0]||(o[0]=U=>r.value=U),selectAll:l.selectAll,onSelectAllChange:l.onSelectAllChange},{default:n(()=>[t(f,{field:"request_Id",header:"request ID"},{default:n(()=>[P(T(d.data.doc_name),1)]),_:2},1024),t(f,{field:"Advance_Amount",header:"Advance Amount"}),t(f,{field:"paid_on",header:"Paid On"}),t(f,{field:"",header:"Expected Return"}),t(f,{field:"",header:"Action"},{body:n(U=>[e("div",null,[t(D,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"view",onClick:a=>$(U.data),style:{height:"2.5em"}},null,8,["onClick"])])]),_:2},1024)]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:n(()=>[t(f,{expander:!0}),t(f,{selectionMode:"multiple",style:{width:"1rem"},exportable:!1}),t(f,{field:"request_Id",header:"Request ID",sortable:""}),t(f,{field:"Emp_Id",header:"Employee ID"}),t(f,{field:"Employee_Name",header:"Employee Name",sortable:!1}),t(f,{field:"Advance_Amount",header:"Advance Amount"}),t(f,{field:"Date",header:"Date"}),t(f,{field:"Status",header:"Status"},{body:n(d=>[d.data.Status=="Pending"?(w(),A("h6",Ie,T(d.data.Status),1)):k("",!0),d.data.Status=="Approved"?(w(),A("h6",De,T(d.data.Status),1)):k("",!0),d.data.Status=="Rejected"?(w(),A("h6",Ee,T(d.data.Status),1)):k("",!0)]),_:1})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"])])]),t(M,{header:"Confirmation",visible:h.value,"onUpdate:visible":o[5]||(o[5]=d=>h.value=d),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"400px"},modal:!0},{footer:n(()=>[t(D,{label:"Yes",icon:"pi pi-check",onClick:o[3]||(o[3]=d=>I("Approve")),class:"p-button-text",autofocus:""}),t(D,{label:"No",icon:"pi pi-times",onClick:o[4]||(o[4]=d=>R(!0)),class:"p-button-text"})]),default:n(()=>[Me]),_:1},8,["visible"]),t(M,{modal:"",visible:_.value,"onUpdate:visible":o[10]||(o[10]=d=>_.value=d),style:{width:"50vw",borderTop:"5px solid #002f56",height:"100vh"}},{header:n(()=>[je]),default:n(()=>[e("div",qe,[e("div",Ue,[Ve,P(" "+T(p.value.Advance_Amount)+" ",1),K(e("input",{id:"rentFrom_month",class:"my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5","onUpdate:modelValue":o[6]||(o[6]=d=>u.required_Amount=d)},null,512),[[Q,u.required_Amount]]),Ne]),Fe]),Be,e("div",Oe,[ze,t(V,{class:"my-3 capitalize form-control textbox",modelValue:y.value,"onUpdate:modelValue":o[7]||(o[7]=d=>y.value=d),autoResize:"",type:"text",rows:"3",style:{border:"none","outline-":"none"}},null,8,["modelValue"])]),e("div",We,[e("button",{class:"btn bg-red-500 text-white px-5",onClick:o[8]||(o[8]=d=>g("Reject"))},"Reject"),e("button",{class:"mx-4 btn bg-green-500 text-white px-5",onClick:o[9]||(o[9]=d=>g("Approve"))},"Approve")])]),_:1},8,["visible"]),t(M,{header:"Header",visible:q(s).canShowLoadingScreen,"onUpdate:visible":o[11]||(o[11]=d=>q(s).canShowLoadingScreen=d),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:n(()=>[t(x,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:n(()=>[He]),_:1},8,["visible"])],64)}}},Qe={class:"mr-4 card"},Ye={class:"px-5 row d-flex justify-content-start align-items-center card-body"},Ge={class:"flex justify-between gap-6 my-2"},Je=e("div",{class:"fs-4"},[e("p",{class:"text-xl font-medium text-justify"},[P("Five Team members are eligible for the Interest Free Loan as per the "),e("span",{class:"text-lg text-primary text-decoration-underline"}," Company's Loan Policy")])],-1),Xe={class:"float-right"},Ze=e("button",{class:"btn btn-border-orange"},"View Report",-1),et=e("div",{class:"confirmation-content"},[e("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}})],-1),tt=e("div",null,[e("h1",{style:{"border-left":"3px solid var( --orange)","padding-left":"5px"},class:"fs-4"},"New Interest Free Loan Request")],-1),ot={class:"card bg-gray-100 bottom-0 mb-10",style:{border:"none"}},st={class:"card-body"},at={class:"row mx-2"},lt={class:"col mx-2"},nt=e("h1",{class:"fs-5 my-2"},"Required Amount",-1),rt=e("p",{class:"fs-6 my-2",style:{color:"var(--clr-gray)"}},"Max Eligible Amount : 20,000 ",-1),dt={class:"col mx-2"},it=e("h1",{class:"fs-5 my-2"},"Monthly EMI",-1),ct={class:"col mx-2"},mt=e("h1",{class:"fs-5 my-2"},"Term",-1),pt=e("label",{for:"",class:"fs-5 ml-2",style:{color:"var(--navy)"}},"Years",-1),ut={class:"card bg-gray-100 bottom-0 my-4",style:{border:"none"}},vt={class:"card-body mx-4"},bt={class:"row"},ht=e("h1",{class:"fs-4 my-2"},"EMI Dedution",-1),gt=e("h1",{class:"fs-5 text-gray-600 mb-3"},"The EMI Dedution Will begin from the Upcoming Payroll",-1),ft={class:"col-4"},_t=e("h1",{class:"fs-5 my-2 ml-2"},"EMI Start Month",-1),yt={class:"col-4 mx-2"},xt=e("h1",{class:"fs-5 my-2 ml-2"},"EMI End Month",-1),wt={class:"col-3"},At=e("h1",{class:"fs-5 my-2 ml-2"},"Total Months",-1),Rt={class:"p-4 my-6 bg-gray-100 rounded-lg gap-6"},St=e("span",{class:"font-semibold"},"Reason",-1),$t={class:"gap-6 p-4 my-6 bg-gray-100 rounded-lg"},Ct=e("span",{class:"font-semibold"},"your Comments",-1),kt={class:"float-right"},Pt=F('<div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div>',1),Tt={class:"table-responsive"},Lt={key:0,class:"text-orange-500"},It={key:1,class:"text-green-500"},Dt={key:2,class:"text-red-500"},Et=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),Mt={__name:"interest_free_loan",setup(L){const s=W();O(async()=>{await s.getInterestFreeLoanDetails()});const m=v([]),r=v(),b=v(),p=v(!1),_=v(),h=v(),y=v(!1),u=v();function $(l,o){console.log(l),p.value=!0,h.value=o,_.value=l,u.value=l}function g(){y.value=!1,p.value=!1}v({global:{value:null,matchMode:C.CONTAINS},name:{value:null,matchMode:C.STARTS_WITH,matchMode:C.EQUALS,matchMode:C.CONTAINS},status:{value:"Pending",matchMode:C.EQUALS}});function S(){y.value=!0}async function R(l){g(),console.log(_.value,l),await s.IFLapproveAndReject(_.value,l,b.value),h.value=l}async function I(l){h.value=l,await s.IFLbulkApproveAndReject(h.value,s.arrayIFL_List)}return(l,o)=>{const f=c("Button"),D=c("Dialog"),E=c("InputText"),M=c("Calendar"),V=c("Textarea"),x=c("Column"),d=c("DataTable"),U=c("ProgressSpinner");return w(),A("div",null,[e("div",Qe,[e("div",Ye,[e("div",Ge,[Je,e("div",Xe,[Ze,e("button",{class:"mx-2 btn btn-orange",onClick:S}," Approval All "),t(D,{header:"Confirmation",visible:y.value,"onUpdate:visible":o[2]||(o[2]=a=>y.value=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"400px"},modal:!0},{footer:n(()=>[t(f,{label:"Yes",icon:"pi pi-check",onClick:o[0]||(o[0]=a=>I("Approve")),class:"p-button-text",autofocus:""}),t(f,{label:"No",icon:"pi pi-times",onClick:o[1]||(o[1]=a=>g(!0)),class:"p-button-text"})]),default:n(()=>[et]),_:1},8,["visible"]),t(D,{visible:p.value,"onUpdate:visible":o[13]||(o[13]=a=>p.value=a),header:"Header",style:{width:"58vw"},modal:"",position:l.position},{header:n(()=>[tt]),footer:n(()=>[e("div",kt,[e("button",{class:"btn bg-red-500 text-white px-5",onClick:o[11]||(o[11]=a=>R("Reject"))},"Reject"),e("button",{class:"mx-4 btn bg-green-500 text-white px-5",onClick:o[12]||(o[12]=a=>R("Approve"))},"Approve")])]),default:n(()=>[e("div",ot,[e("div",st,[e("div",at,[e("div",lt,[nt,t(E,{type:"text",modelValue:u.value.Advance_Amount,"onUpdate:modelValue":o[3]||(o[3]=a=>u.value.Advance_Amount=a),placeholder:"₹ Enter The Required Amount"},null,8,["modelValue"]),rt]),e("div",dt,[it,t(E,{type:"text",modelValue:u.value.Monthly_EMI,"onUpdate:modelValue":o[4]||(o[4]=a=>u.value.Monthly_EMI=a),placeholder:"₹ "},null,8,["modelValue"])]),e("div",ct,[mt,t(E,{class:"w-full md:w-10rem",type:"text",modelValue:u.value.Term_year,"onUpdate:modelValue":o[5]||(o[5]=a=>u.value.Term_year=a),placeholder:"₹ "},null,8,["modelValue"]),pt])])])]),e("div",ut,[e("div",vt,[e("div",bt,[ht,gt,e("div",ft,[_t,t(M,{showIcon:"",modelValue:u.value.EMI_start_month,"onUpdate:modelValue":o[6]||(o[6]=a=>u.value.EMI_start_month=a),dateFormat:"dd/mm/yy"},null,8,["modelValue"])]),e("div",yt,[xt,t(M,{showIcon:"",modelValue:u.value.EMI_End_month,"onUpdate:modelValue":o[7]||(o[7]=a=>u.value.EMI_End_month=a),dateFormat:"dd/mm/yy"},null,8,["modelValue"])]),e("div",wt,[At,t(E,{type:"text",modelValue:u.value.Total_Months,"onUpdate:modelValue":o[8]||(o[8]=a=>u.value.Total_Months=a),style:{width:"150px !important"}},null,8,["modelValue"])])])])]),e("div",Rt,[St,t(V,{modelValue:u.value.reviewer_comments,"onUpdate:modelValue":o[9]||(o[9]=a=>u.value.reviewer_comments=a),class:"my-3 capitalize form-control textbox",autoResize:"",type:"text",rows:"3"},null,8,["modelValue"])]),e("div",$t,[Ct,t(V,{class:"my-3 capitalize form-control textbox",modelValue:b.value,"onUpdate:modelValue":o[10]||(o[10]=a=>b.value=a),autoResize:"",type:"text",rows:"3",style:{border:"none","outline-":"none"}},null,8,["modelValue"])])]),_:1},8,["visible","position"])])]),Pt,e("div",Tt,[t(d,{value:q(s).arrayIFL_List,paginator:!0,rows:10,class:"",dataKey:"id",onRowExpand:l.onRowExpand,onRowCollapse:l.onRowCollapse,expandedRows:m.value,"onUpdate:expandedRows":o[15]||(o[15]=a=>m.value=a),selection:r.value,"onUpdate:selection":o[16]||(o[16]=a=>r.value=a),selectAll:l.selectAll,onSelectAllChange:l.onSelectAllChange,onRowSelect:l.onRowSelect,onRowUnselect:l.onRowUnselect,rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{expansion:n(a=>[e("div",null,[t(d,{value:a.data.emp_details,responsiveLayout:"scroll",selection:r.value,"onUpdate:selection":o[14]||(o[14]=B=>r.value=B),selectAll:l.selectAll,onSelectAllChange:l.onSelectAllChange},{default:n(()=>[t(x,{field:"request_Id",header:"request ID"},{default:n(()=>[P(T(a.data.doc_name),1)]),_:2},1024),t(x,{field:"Advance_Amount",header:"Advance Amount"}),t(x,{field:"paid_on",header:"Paid On"}),t(x,{field:"",header:"Expected Return"}),t(x,{field:"",header:"Action"},{body:n(B=>[e("div",null,[t(f,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"view",onClick:ts=>$(B.data),style:{height:"2.5em"}},null,8,["onClick"])])]),_:2},1024)]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:n(()=>[t(x,{expander:!0}),t(x,{selectionMode:"multiple",style:{width:"1rem"},exportable:!1}),t(x,{field:"request_Id",header:"Request ID",sortable:""}),t(x,{field:"Emp_Id",header:"Employee ID"}),t(x,{field:"Employee_Name",header:"Employee Name",sortable:!1}),t(x,{field:"Advance_Amount",header:"Advance Amount"}),t(x,{field:"Date",header:"Date"}),t(x,{field:"Status",header:"Status"},{body:n(a=>[a.data.Status=="Pending"?(w(),A("h6",Lt,T(a.data.Status),1)):k("",!0),a.data.Status=="Approved"?(w(),A("h6",It,T(a.data.Status),1)):k("",!0),a.data.Status=="Rejected"?(w(),A("h6",Dt,T(a.data.Status),1)):k("",!0)]),_:1})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"])])])]),t(D,{header:"Header",visible:q(s).canShowLoadingScreen,"onUpdate:visible":o[17]||(o[17]=a=>q(s).canShowLoadingScreen=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:n(()=>[t(U,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:n(()=>[Et]),_:1},8,["visible"])])}}},jt={class:"mr-4 card"},qt={class:"px-5 row d-flex justify-content-start align-items-center card-body"},Ut={class:"flex justify-between gap-6 my-2"},Vt=e("div",{class:"fs-4"},[e("p",{class:"text-xl font-medium"},[P("Four Team Members are eligible for Travel Advance as per the "),e("span",{class:"text-lg text-primary text-decoration-underline"},"Company's Loan Policy")])],-1),Nt={class:"float-right"},Ft=e("button",{class:"btn btn-border-orange"},"View Report",-1),Bt=F('<div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div><h1 class="text-blue-700 mb-2 fs-5 fw-semibold">Pending Approval</h1>',2),Ot={class:"table-responsive mb-5"},zt=e("h1",{class:"text-blue-700 mb-2 fs-5 fw-semibold mt-1"},"Bills Submitted",-1),Wt={class:"table-responsive mt-2"},Ht=e("div",null,[e("h1",{style:{"border-left":"3px solid var( --orange)","padding-left":"10px"},class:"fs-4"},"New Travel Advance Request")],-1),Kt=e("div",{class:"flex pb-2 bg-gray-100 rounded-lg gap-7"},[e("div",{class:"w-5 p-4 mx-4"},[e("span",{class:"font-semibold"},"Required Amount"),e("input",{id:"rentFrom_month",class:"my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"}),e("p",{class:"text-sm font-semibold text-gray-500"},"Max Eligible Amount : 20,000")])],-1),Qt=e("div",{class:"p-4 my-6 bg-gray-100 rounded-lg gap-6"},[e("span",{class:"font-semibold"},"Repayment"),e("p",{class:"my-2 fs-5 text-gray-600 text-md"},[P("The deadline to submit the bills is on salary "),e("strong",{class:"fs-5 text-black"},"12/07/2023")])],-1),Yt={class:"p-4 my-6 bg-gray-100 rounded-lg gap-6"},Gt=e("span",{class:"font-semibold"},"Reason",-1),Jt=e("div",{class:"float-right"},[e("button",{class:"btn btn-border-orange"},"Cancel"),e("button",{class:"mx-4 btn btn-orange"},"Submit")],-1),Xt=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),Zt={__name:"travel_advance",setup(L){O(()=>{}),v(),v(["Off","On"]);const s=v("center"),m=r=>{s.value=r,useEmpStore.dialog_TravelAdvance=!0};return(r,b)=>{const p=c("Column"),_=c("DataTable"),h=c("Textarea"),y=c("Dialog"),u=c("ProgressSpinner");return w(),A(z,null,[e("div",jt,[e("div",qt,[e("div",Ut,[Vt,e("div",Nt,[Ft,e("button",{class:"mx-4 btn btn-orange",onClick:b[0]||(b[0]=$=>m("top"))}," Approval All ")])]),Bt,e("div",Ot,[t(_,{ref:"dt",dataKey:"id",paginator:!0,rows:10,value:r.sample,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:n(()=>[t(p,{header:"Request ID",field:"section",style:{"min-width":"8rem"}}),t(p,{field:"particular",header:"Employee ID",style:{"min-width":"12rem"}}),t(p,{field:"ref",header:"Employee Name",style:{"min-width":"12rem"}}),t(p,{field:"max_limit",header:"Advance Amount",style:{"min-width":"12rem"}}),t(p,{field:"Status",header:"Bill Sub Deadline",style:{"min-width":"12rem"}}),t(p,{field:"Status",header:"Status",style:{"min-width":"12rem"}})]),_:1},8,["value"])]),zt,e("div",Wt,[t(_,{ref:"dt",dataKey:"id",paginator:!0,rows:10,value:r.sample,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:n(()=>[t(p,{header:"Request ID",field:"section",style:{"min-width":"8rem"}}),t(p,{field:"particular",header:"Employee ID",style:{"min-width":"12rem"}}),t(p,{field:"ref",header:"Employee Name",style:{"min-width":"12rem"}}),t(p,{field:"max_limit",header:"Advance Amount",style:{"min-width":"12rem"}}),t(p,{field:"Status",header:"Bill Sub Deadline",style:{"min-width":"12rem"}}),t(p,{field:"Status",header:"Status",style:{"min-width":"12rem"}})]),_:1},8,["value"])])])]),t(y,{visible:r.dialog_TravelAdvance,"onUpdate:visible":b[1]||(b[1]=$=>r.dialog_TravelAdvance=$),modal:"",style:{width:"50vw"}},{header:n(()=>[Ht]),default:n(()=>[Kt,Qt,e("div",Yt,[Gt,t(h,{class:"my-3 capitalize form-control textbox",autoResize:"",type:"text",rows:"3"})]),Jt]),_:1},8,["visible"]),t(y,{header:"Header",visible:r.canShowLoading,"onUpdate:visible":b[2]||(b[2]=$=>r.canShowLoading=$),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:n(()=>[t(u,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:n(()=>[Xt]),_:1},8,["visible"])],64)}}},eo={},to={class:"mr-4 card"},oo={class:"px-5 row d-flex justify-content-start align-items-center card-body"},so={class:"flex justify-between gap-6 my-2"},ao=e("div",{class:"fs-4"},[e("p",{class:"text-xl font-medium"},[P("Five Team Members are eligible for the Loan with Interest as per the "),e("span",{class:"text-lg text-primary text-decoration-underline"}," Company's Loan Policy")])],-1),lo={class:"float-right"},no=e("button",{class:"btn btn-border-orange"},"View Report",-1),ro=e("button",{class:"mx-4 btn btn-orange"}," Approval All ",-1),io=e("div",null,[e("h1",{style:{"border-left":"3px solid var( --orange)","padding-left":"5px"},class:"fs-4"},"New Interest Free Loan Request")],-1),co={class:"card bg-gray-100 bottom-0 mb-10",style:{border:"none"}},mo={class:"card-body"},po={class:"row mx-2"},uo={class:"col mx-2"},vo=e("h1",{class:"fs-5 my-2"},"Required Amount",-1),bo=e("p",{class:"fs-6 my-2",style:{color:"var(--clr-gray)"}},"Max Eligible Amount : 20,000",-1),ho={class:"col mx-2"},go=e("h1",{class:"fs-5 my-2"},"Monthly EMI",-1),fo={class:"col mx-2"},_o=e("h1",{class:"fs-5 my-2"},"Term",-1),yo=e("label",{for:"",class:"fs-5 ml-2",style:{color:"var(--navy)"}},"Years",-1),xo={class:"card bg-gray-100 bottom-0 my-4",style:{border:"none"}},wo={class:"card-body mx-4"},Ao={class:"row"},Ro=e("h1",{class:"fs-4 my-2"},"EMI Dedution",-1),So=e("h1",{class:"fs-5 text-gray-600 mb-3"},"The EMI Dedution Will begin from the Upcoming Payroll",-1),$o={class:"col-4"},Co=e("h1",{class:"fs-5 my-2 ml-2"},"EMI Start Month",-1),ko={class:"col-4 mx-2"},Po=e("h1",{class:"fs-5 my-2 ml-2"},"EMI Start Month",-1),To={class:"col-3"},Lo=e("h1",{class:"fs-5 my-2 ml-2"},"Total Months",-1),Io={class:"p-4 my-6 bg-gray-100 rounded-lg gap-6"},Do=e("span",{class:"font-semibold"},"Reason",-1),Eo=e("div",{class:"float-right"},[e("button",{class:"btn btn-border-orange"},"Cancel"),e("button",{class:"mx-4 btn btn-orange"},"Submit")],-1),Mo=F('<div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div>',1),jo={class:"table-responsive"},qo=e("h5",{style:{"text-align":"center"}},"Please wait...",-1);function Uo(L,s){const m=c("InputText"),r=c("Dropdown"),b=c("Calendar"),p=c("Textarea"),_=c("Dialog"),h=c("Column"),y=c("DataTable"),u=c("ProgressSpinner");return w(),A("div",null,[e("div",to,[e("div",oo,[e("div",so,[ao,e("div",lo,[no,ro,t(_,{header:"Header",style:{width:"58vw"},modal:""},{header:n(()=>[io]),footer:n(()=>[Eo]),default:n(()=>[e("div",co,[e("div",mo,[e("div",po,[e("div",uo,[vo,t(m,{type:"text",placeholder:"₹ Enter The Required Amount"}),bo]),e("div",ho,[go,t(m,{type:"text",placeholder:"₹ "})]),e("div",fo,[_o,t(r,{optionLabel:"name",placeholder:"1.5",class:"w-full md:w-10rem"}),yo])])])]),e("div",xo,[e("div",wo,[e("div",Ao,[Ro,So,e("div",$o,[Co,t(b,{showIcon:""})]),e("div",ko,[Po,t(b,{showIcon:""})]),e("div",To,[Lo,t(m,{type:"text",style:{width:"150px !important"}})])])])]),e("div",Io,[Do,t(p,{class:"my-3 capitalize form-control textbox",autoResize:"",type:"text",rows:"3"})])]),_:1})])]),Mo,e("div",jo,[t(y,{ref:"dt",dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:n(()=>[t(h,{header:"Request ID",field:"section",style:{"min-width":"8rem"}}),t(h,{field:"particular",header:"Employee ID",style:{"min-width":"12rem"}}),t(h,{field:"",header:"Employee Name",style:{"min-width":"12rem"}}),t(h,{field:"max_limit",header:"Advance Amount",style:{"min-width":"12rem"}}),t(h,{field:"max_limit",header:"Date",style:{"min-width":"12rem"}}),t(h,{field:"Status",header:"Status",style:{"min-width":"12rem"}})]),_:1},512)])])]),t(_,{header:"Header",breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:n(()=>[t(u,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:n(()=>[qo]),_:1})])}const Vo=$e(eo,[["render",Uo]]),No={class:"mt-30"},Fo=e("h1",{class:"fs-5 fw-semibold mb-3"},"Salary Advance & Loan - Team Management",-1),Bo={class:"p-4 pt-1 pb-0 mb-3 bg-white rounded-lg tw-card left-line"},Oo={class:"divide-x nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},zo={class:"mx-2 nav-item",role:"presentation"},Wo={class:"mx-3 nav-item",role:"presentation"},Ho={class:"mx-3 nav-item",role:"presentation"},Ko={class:"mx-3 nav-item",role:"presentation"},Qo={class:"tab-content",id:""},Yo={key:0},Go={key:1},Jo={key:2},Xo={key:3},Zo={__name:"approvals_salary_advance",setup(L){const s=v(1);return(m,r)=>(w(),A("div",No,[Fo,e("div",Bo,[e("ul",Oo,[e("li",zo,[e("a",{class:N(["nav-link",[s.value===1?"active":""]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:r[0]||(r[0]=b=>s.value=1)}," Salary Advance ",2)]),e("li",Wo,[e("a",{class:N(["mx-4 text-center nav-link",[s.value===2?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:r[1]||(r[1]=b=>s.value=2),role:"tab","aria-controls":"","aria-selected":"true"}," Interest Free Loan ",2)]),e("li",Ho,[e("a",{class:N(["mx-4 text-center nav-link",[s.value===3?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:r[2]||(r[2]=b=>s.value=3),role:"tab","aria-controls":"","aria-selected":"true"}," Travel Advance ",2)]),e("li",Ko,[e("a",{class:N(["mx-4 text-center nav-link",[s.value===4?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:r[3]||(r[3]=b=>s.value=4),role:"tab","aria-controls":"","aria-selected":"true"}," Loan With Interest ",2)])])]),e("div",Qo,[s.value===1?(w(),A("div",Yo,[t(Ke)])):k("",!0),s.value===2?(w(),A("div",Go,[t(Mt)])):k("",!0),s.value===3?(w(),A("div",Jo,[t(Zt)])):k("",!0),s.value===4?(w(),A("div",Xo,[t(Vo)])):k("",!0)])]))}},i=Y(Zo),es=re();i.use(G,{ripple:!0});i.use(be);i.use(J);i.use(ve);i.use(es);i.directive("tooltip",de);i.directive("badge",ie);i.directive("ripple",X);i.directive("styleclass",ce);i.directive("focustrap",Z);i.component("Button",ee);i.component("RadioButton",Re);i.component("DataTable",me);i.component("Column",pe);i.component("ColumnGroup",fe);i.component("Row",ge);i.component("Toast",te);i.component("ConfirmDialog",oe);i.component("Dropdown",se);i.component("InputText",ae);i.component("Dialog",le);i.component("ProgressSpinner",he);i.component("Calendar",_e);i.component("Textarea",ye);i.component("Chips",xe);i.component("MultiSelect",we);i.component("InputNumber",ue);i.component("SelectButton",Ae);i.component("Checkbox",Se);i.mount("#approvals_salary_advance");