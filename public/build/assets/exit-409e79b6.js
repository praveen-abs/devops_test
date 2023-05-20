import{a2 as A,H as m,I as E,c as b,e,h as o,w as r,al as S,k as i,g as c,o as g,j as v,E as h,n as $,a as L,J as N,P as B,K as I,L as O,R as M,u as U,v as W,V as j,M as F,Q as H,A as K,N as z,S as J}from"./toastservice.esm-1e19bead.js";/* empty css                 */import{c as Y}from"./pinia-8c47295b.js";import{T as G,B as Q,S as q,b as X,a as Z,c as ee}from"./styleclass.esm-fce48f9f.js";import"./blockui.esm-2f48c23f.js";import{D as te}from"./dialogservice.esm-341570db.js";import{s as le}from"./row.esm-6ebc942e.js";import{s as se}from"./columngroup.esm-9dd1458e.js";import{s as ae}from"./calendar.esm-d56ef9a8.js";import{s as oe}from"./textarea.esm-7d78d5bc.js";import{s as ne}from"./chips.esm-910adea3.js";import{s as ie}from"./multiselect.esm-43969b6f.js";import{s as de}from"./overlaypanel.esm-f5d57035.js";import{s as re}from"./tag.esm-f22ea366.js";import{a as k}from"./index-362795f3.js";const ce="/build/assets/no-data-64d4a326.svg";const me={class:"exit-wrapper mt-30"},pe={class:"mb-2 card left-line"},ue={class:"pt-1 pb-0 card-body"},be={class:"row"},ge=e("div",{class:"col-9"},[e("ul",{class:"nav nav-pills nav-tabs-dashed",role:"tablist"},[e("li",{class:"nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#personal-resignation","aria-selected":"true",role:"tab"}," Personal ")]),e("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#team-resignation","aria-selected":"true",role:"tab"}," Team ")]),e("li",{class:"nav-item text-muted",role:"presentation"},[e("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#org-resignation","aria-selected":"true",role:"tab"}," Org ")])])],-1),ve={class:"col-3 text-end"},he=S('<div class="mb-2 card"><div class="py-1 card-body"><div class="row"><div class="col-6 d-flex align-items-center"><h6 class="font-semifold">Resignation</h6></div><div class="col-6 text-end"></div></div></div></div>',1),fe={class:"mb-0 card"},_e={class:"card-body"},xe={class:"tab-content",id:"pills-tabContent"},ye={class:"tab-pane fade active show",id:"personal-resignation",role:"tabpanel","aria-labelledby":"pills-home-tab"},we={key:0,class:"no-data-img",id:"noData",style:{}},De=e("div",{class:"mx-auto text-center col-4"},[e("img",{src:ce,class:"h-100 w-100",alt:"no-data"})],-1),ke=[De],Re={key:1,class:"table-responsive"},Ce={class:"resignation-content",id:"resignation_form"},Pe={class:"",id:"resignationForm"},Te={class:"row"},Ve={class:"col-sm-12 col-lg-6 col-xxl-6 col-xl-6 col-md-6"},Ae={class:"mb-3"},Ee=e("label",{for:"",class:""},"Date Of Resignation Initiated",-1),Se={class:"col-sm-12 col-lg-6 col-xxl-6 col-xl-6 col-md-6"},$e={class:"mb-3"},Le=e("label",{for:"",class:""},"Resignation Type",-1),Ne={class:"col-sm-12 col-lg-6 col-xxl-6 col-xl-6 col-md-6"},Be={class:"mb-3"},Ie=e("label",{for:"",class:""},"Notice Period Date",-1),Oe={class:"col-sm-12 col-lg-6 col-xxl-6 col-xl-6 col-md-6"},Me={class:"mb-3"},Ue={class:"d-flex justify-content-between"},We=e("div",{class:""},[e("label",{for:"",class:"me-2"},"Expected Last working Date"),e("button",{class:"px-0 bg-transparent border-0 outline-none fa fa-info-circle btn","data-bs-toggle":"tooltip","data-bs-placement":"top",title:"Edit Your Expected Last working Date"})],-1),je=["readonly"],Fe={class:"col-sm-12 col-lg-6 col-xxl-6 col-xl-6 col-md-6"},He={class:"mb-3"},Ke=e("label",{for:"",class:""},"Payroll End Date",-1),ze={key:0,class:"col-sm-12 col-lg-6 col-xxl-6 col-xl-6 col-md-6"},Je={class:"mb-3",id:"reason_dialogueBox"},Ye=e("label",{for:"",class:""},"Reason For Change In Last Working Date",-1),Ge=e("button",{type:"button",class:"btn btn-primary"},"Submit",-1),Qe=e("p",{class:"font-bold text-gray-600"},"Please fill the reason for Resignation Withdrawal and click Submit to proceed further ",-1),qe=e("button",{type:"submit",class:"btn btn-primary"},"Submit",-1),Xe=e("div",{class:"tab-pane fade",id:"team-resignation",role:"tabpanel","aria-labelledby":"pills-home-tab"},[e("div",{class:"resignation-table"},[e("div",{class:"row"},[e("div",{class:"mb-2 col-12"},[e("h6",{class:"mb-2"},"Pending Task"),e("table",{class:"table"},[e("thead",null,[e("tr",null,[e("th",null,"Employee Name"),e("th",null,"Employee Code"),e("th",null,"Details"),e("th",null,"Status"),e("th",null,"Replace"),e("th",null,"Action")])]),e("tbody",null,[e("tr",null,[e("td",null,"Praveen"),e("td",null,"Abs1008"),e("td",null,[e("a",{role:"button",class:"cursor-pointer dropdown-item text-info","data-bs-toggle":"modal","data-bs-target":"#resignationDetailsView"},[e("i",{class:"fa fa-eye me-1","aria-hidden":"true"}),i(" View")])]),e("td",null,[e("span",{class:"badge rounded-pill bg-warning"},"Pending")]),e("td",null,[e("button",{class:"btn btn-orange me-2","data-bs-toggle":"modal","data-bs-target":"#switch_task"},"Change")]),e("td",null,[e("button",{class:"btn btn-secondary-red me-2"},"Reject"),e("button",{class:"btn btn-success"},"Approve")]),e("td",null,[e("div",{class:"dropdown custom-dropDown dropdown-action"},[e("button",{class:"bg-transparent border-0 outline-none btn dropdown-toggle",type:"button",id:"dropdownMenuButton","data-bs-toggle":"dropdown","aria-haspopup":"true","aria-expanded":"false"},[e("i",{class:"fa fa-ellipsis-v","aria-hidden":"true"})]),e("div",{class:"dropdown-menu","aria-labelledby":"dropdownMenuButton",style:{}},[e("a",{class:"dropdown-item",href:"#"},[e("i",{class:"fa fa-eye text-info me-2","aria-hidden":"true"}),i(" View")]),e("a",{class:"dropdown-item",href:"#"},[e("i",{class:"fa fa-trash text-danger me-2","aria-hidden":"true"}),i(" Delete Resignation")])])])])])])])]),e("div",{class:"col-12"},[e("h6",{class:"mb-2"},"Completed Task"),e("table",{class:"table"},[e("thead",null,[e("tr",null,[e("th",null,"Employee Name"),e("th",null,"Employee Code"),e("th",null,"Details"),e("th",null,"Status"),e("th",null,"Action")])]),e("tbody",null,[e("tr",null,[e("td",null,"Praveen"),e("td",null,"Abs1008"),e("td",null,[e("a",{role:"button",class:"cursor-pointer dropdown-item text-info","data-bs-toggle":"modal","data-bs-target":"#resignationDetailsView"},[e("i",{class:"fa fa-eye me-1","aria-hidden":"true"}),i(" View")])]),e("td",null,[e("span",{class:"badge rounded-pill bg-success"},"Approved")]),e("td",null,[e("button",{class:"btn btn-secondary-red me-2"},"Reject"),e("button",{class:"btn btn-success"},"Approve")])]),e("tr",null,[e("td",null,"Praveen"),e("td",null,"Abs1008"),e("td",null,[e("a",{role:"button",class:"cursor-pointer dropdown-item text-info","data-bs-toggle":"modal","data-bs-target":"#resignationDetailsView"},[e("i",{class:"fa fa-eye me-1","aria-hidden":"true"}),i(" View")])]),e("td",null,[e("span",{class:"badge rounded-pill bg-danger"},"Rejected")]),e("td",null,[e("button",{class:"btn btn-orange me-2","data-bs-toggle":"modal","data-bs-target":"#switch_task"},"Change")]),e("td",null,[e("button",{class:"btn btn-secondary-red me-2"},"Reject"),e("button",{class:"btn btn-success"},"Approve")])])])])])])])],-1),Ze=e("div",{class:"tab-pane fade",id:"org-resignation",role:"tabpanel","aria-labelledby":"pills-home-tab"},[e("div",{class:"resignation-table"},[e("div",{class:"row"},[e("div",{class:"mb-2 col-12"},[e("h6",{class:"mb-2"},"Pending Task"),e("table",{class:"table"},[e("thead",null,[e("tr",null,[e("th",null,"Employee Name"),e("th",null,"Employee Code"),e("th",null,"Designation"),e("th",null,"Details"),e("th",null,"Status"),e("th",null,"Reporting To")])]),e("tbody",null,[e("tr",null,[e("td",null,"Praveen"),e("td",null,"Abs1008"),e("td",null,"Lead "),e("td",null,[e("a",{role:"button",class:"cursor-pointer dropdown-item text-info","data-bs-toggle":"modal","data-bs-target":"#resignationDetailsView"},[e("i",{class:"fa fa-eye me-1","aria-hidden":"true"}),i(" View")])]),e("td",null,[e("span",{class:"badge rounded-pill bg-warning"},"Pending")]),e("td",null,"Karthi")])])])]),e("div",{class:"mb-2 col-12"},[e("h6",{class:"mb-2"},"Completed Task"),e("table",{class:"table"},[e("thead",null,[e("tr",null,[e("th",null,"Employee Name"),e("th",null,"Employee Code"),e("th",null,"Designation"),e("th",null,"Details"),e("th",null,"Status"),e("th",null,"Reporting To")])]),e("tbody",null,[e("tr",null,[e("td",null,"Praveen"),e("td",null,"Abs1008"),e("td",null,"Lead "),e("td",null,[e("a",{role:"button",class:"cursor-pointer dropdown-item text-info","data-bs-toggle":"modal","data-bs-target":"#resignationDetailsView"},[e("i",{class:"fa fa-eye me-1","aria-hidden":"true"}),i(" View")])]),e("td",null,[e("span",{class:"badge rounded-pill bg-warning"},"Pending")]),e("td",null,"Karthi")])])])])])])],-1),et=e("div",{id:"switch_task",class:"modal custom-modal fade",role:"dialog"},[e("div",{class:"modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md",role:"document"},[e("div",{class:"modal-content"},[e("div",{class:"py-2 border-0 modal-header new-role-header d-flex align-items-center"},[e("h6",{class:"modal-title"}," Switch Task Here"),e("button",{type:"button",class:"bg-transparent border-0 outline-none close h3","data-bs-dismiss":"modal","aria-label":"Close"},[e("span",{"aria-hidden":"true"},"×")])]),e("div",{class:"modal-body"},[e("div",{class:"row"},[e("div",{class:"col-sm-12 col-lg-12 col-xxl-12 col-xl-12 col-md-12"},[e("div",{class:"mb-3"},[e("label",{for:"",class:""},"Choose The Department Here"),e("select",{name:"",id:"",class:"form-select form-control"},[e("option",{value:""},"IT")])])]),e("div",{class:"col-sm-12 col-lg-12 col-xxl-12 col-xl-12 col-md-12"},[e("div",{class:"mb-3"},[e("label",{for:"",class:""},"Ask Task To"),e("select",{name:"",id:"",class:"form-select form-control"},[e("option",{value:""},"IT")])])]),e("div",{class:"col-sm-12 col-lg-12 col-xxl-12 col-xl-12 col-md-12 text-end"},[e("button",{class:"btn btn-orange me-2","data-bs-toggle":"modal","data-bs-target":"#switch_task"},"Confirm")])])])])])],-1),tt=e("div",{id:"resignationDetailsView",class:"modal custom-modal fade",role:"dialog"},[e("div",{class:"modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md",role:"document"},[e("div",{class:"modal-content"},[e("div",{class:"py-2 border-0 modal-header new-role-header d-flex align-items-center"},[e("h6",{class:"modal-title"}," Employee Information"),e("button",{type:"button",class:"bg-transparent border-0 outline-none close h3","data-bs-dismiss":"modal","aria-label":"Close"},[e("span",{"aria-hidden":"true"},"×")])]),e("div",{class:"modal-body"},[e("div",{class:"row"},[e("div",{class:"col-sm-12 col-lg-12 col-xxl-12 col-xl-12 col-md-12"},[e("ul",{class:"personal-info"},[e("li",{class:"pb-1 border-bottom-liteAsh"},[e("div",{class:"title"},"Name"),e("div",{class:"text"}," - ")]),e("li",{class:"pb-1 border-bottom-liteAsh"},[e("div",{class:"title"},"Employee Code"),e("div",{class:"text"}," - ")]),e("li",{class:"pb-1 border-bottom-liteAsh"},[e("div",{class:"title"},"Employee Email Id"),e("div",{class:"text"}," - ")]),e("li",{class:"pb-1 border-bottom-liteAsh"},[e("div",{class:"title"},"Date Of Joining(DOJ)"),e("div",{class:"text"}," - ")]),e("li",{class:"pb-1 border-bottom-liteAsh"},[e("div",{class:"title"},"Designation"),e("div",{class:"text"}," - ")]),e("li",{class:"pb-1 border-bottom-liteAsh"},[e("div",{class:"title"},"Reporting Manager"),e("div",{class:"text"}," - ")]),e("li",{class:"pb-1 border-bottom-liteAsh"},[e("div",{class:"title"},"Notice Period"),e("div",{class:"text"}," - ")]),e("li",{class:"pb-1 border-bottom-liteAsh"},[e("div",{class:"title"},"Date Of Designation"),e("div",{class:"text"}," - ")]),e("li",{class:"pb-1 border-bottom-liteAsh"},[e("div",{class:"title"},"Last Working Date(Exp)"),e("div",{class:"text"}," - ")]),e("li",{class:"pb-1 border-bottom-liteAsh"},[e("div",{class:"title"},"Reason For Resignation"),e("div",{class:"text"}," - ")])])]),e("div",{class:"col-sm-12 col-lg-12 col-xxl-12 col-xl-12 col-md-12 text-end"},[e("button",{class:"btn btn-orange","data-bs-dismiss":"modal"},"Close")])])])])])],-1),lt={__name:"exit",setup(at){const a=A({dori:"",resignation:"",npd:"",elwd:"",ped:"",exlRes:"",wr:"",status:"pending"}),f=m(),x=()=>{k.get("http://localhost:3000/exit").then(n=>{console.log(n.data),f.value=n.data})},y=()=>{console.log(a),k.post("http://localhost:3000/exit",a).then(n=>{console.log(n.data)}).finally(()=>{x()}),p.value=!1};E(()=>{x()});const R=m([{name:"Better Prospect",code:"Better Prospect"},{name:"Marriage & Relocating",code:"Marriage & Relocating"},{name:"Illness",code:"Illness"},{name:"Difficult Work Environment",code:"Difficult Work Environment"},{name:"Career Prospect",code:"Career Prospec"},{name:"Others",code:"Others"}]),p=m(!1),_=m(!1),u=m(!1),C=n=>{switch(console.log(n.status),n.status){case"Approved":return"success";case"pending":return"warning";case"Rejected":return"danger";default:return null}};return(n,l)=>{const d=c("Column"),P=c("Tag"),T=c("DataTable"),V=c("Dropdown"),w=c("Textarea"),D=c("Dialog");return g(),b("div",me,[e("div",pe,[e("div",ue,[e("div",be,[ge,e("div",ve,[e("button",{class:"btn btn-primary",id:"apply_resignation",onClick:l[0]||(l[0]=s=>p.value=!0)},"Apply Resignation")])])])]),he,e("div",fe,[e("div",_e,[e("div",xe,[e("div",ye,[f.value?(g(),b("div",Re,[o(T,{ref:"dt",dataKey:"id",paginator:!0,rows:10,value:f.value,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:r(()=>[o(d,{header:"Date Of Resignation Initiated",field:"dori",style:{"min-width":"8rem"}}),o(d,{field:"resignation",header:"Resignation Type",style:{"min-width":"12rem"}}),o(d,{field:"npd",header:"Notice Period Date ",style:{"min-width":"12rem"}}),o(d,{field:"elwd",header:"Expected Last working Date",style:{"min-width":"12rem"}}),o(d,{field:"",header:"Withdraw ",style:{"min-width":"12rem"}},{body:r(()=>[e("div",{onClick:l[1]||(l[1]=s=>_.value=!0),class:"btn btn-border-orange"}," Withdraw ")]),_:1}),o(d,{header:"Status",style:{"min-width":"12rem"}},{body:r(s=>[o(P,{value:s.data.status,style:{"font-weight":"600"},severity:C(s.data)},null,8,["value","severity"])]),_:1})]),_:1},8,["value"])])):(g(),b("div",we,ke))]),o(D,{visible:p.value,"onUpdate:visible":l[9]||(l[9]=s=>p.value=s),modal:"",header:"Resignation",style:{width:"50vw",borderTop:"5px solid #002f56"}},{default:r(()=>[e("div",Ce,[e("form",Pe,[e("div",Te,[e("div",Ve,[e("div",Ae,[Ee,v(e("input",{type:"text",class:"form-control",id:"","aria-describedby":"","onUpdate:modelValue":l[2]||(l[2]=s=>a.dori=s)},null,512),[[h,a.dori]])])]),e("div",Se,[e("div",$e,[Le,o(V,{style:{height:"2.9em"},class:"w-full text-sm text-gray-900 border rounded-lg",options:R.value,optionLabel:"name",modelValue:a.resignation,"onUpdate:modelValue":l[3]||(l[3]=s=>a.resignation=s),optionValue:"code",placeholder:"Select a Property"},null,8,["options","modelValue"])])]),e("div",Ne,[e("div",Be,[Ie,v(e("input",{type:"Date",class:"form-control",id:"","aria-describedby":"","onUpdate:modelValue":l[4]||(l[4]=s=>a.npd=s)},null,512),[[h,a.npd]])])]),e("div",Oe,[e("div",Me,[e("div",Ue,[We,e("button",{onClick:l[5]||(l[5]=s=>u.value=!0),type:"button",class:"bg-transparent border-0 outline-none btn fa text-info fa-pencil",id:"expectedDate_reasonButton"})]),v(e("input",{type:"Date",class:$([[u.value?"":"bg-gray-300"],"form-control"]),id:"expected_lastDate","onUpdate:modelValue":l[6]||(l[6]=s=>a.elwd=s),"aria-describedby":"",readonly:!u.value},null,10,je),[[h,a.elwd]])])]),e("div",Fe,[e("div",He,[Ke,v(e("input",{type:"Date",class:"form-control",id:"","onUpdate:modelValue":l[7]||(l[7]=s=>a.ped=s)},null,512),[[h,a.ped]])])]),u.value?(g(),b("div",ze,[e("div",Je,[Ye,o(w,{modelValue:a.wr,"onUpdate:modelValue":l[8]||(l[8]=s=>a.wr=s),name:"",id:"",class:"my-3",cols:"30",rows:"3",autoResize:"",placeholder:"Add Your Reason Here...."},null,8,["modelValue"])])])):L("",!0)]),e("div",{class:"col-sm-12 col-lg-12 col-xxl-12 col-xl-12 col-md-12 text-end"},[e("button",{type:"button",class:"btn btn-border-orange me-2",onClick:y},"Save"),Ge])])])]),_:1},8,["visible"]),o(D,{visible:_.value,"onUpdate:visible":l[11]||(l[11]=s=>_.value=s),modal:"",header:"Withdraw",style:{width:"40vw",borderTop:"5px solid #002f56"}},{footer:r(()=>[e("div",{class:"col-sm-12 col-lg-12 col-xxl-12 col-xl-12 col-md-12 text-end"},[e("button",{type:"button",class:"btn btn-border-orange me-2",onClick:y},"Save"),qe])]),default:r(()=>[Qe,o(w,{modelValue:a.wr,"onUpdate:modelValue":l[10]||(l[10]=s=>a.wr=s),name:"",id:"",class:"my-3",cols:"30",rows:"3",autoResize:"",placeholder:"Add Your Reason Here...."},null,8,["modelValue"])]),_:1},8,["visible"]),Xe,Ze])])]),et,tt])}}},t=N(lt),st=Y();t.use(B,{ripple:!0});t.use(I);t.use(O);t.use(te);t.use(st);t.directive("tooltip",G);t.directive("badge",Q);t.directive("ripple",M);t.directive("styleclass",q);t.directive("focustrap",U);t.component("Button",W);t.component("DataTable",X);t.component("Column",Z);t.component("ColumnGroup",se);t.component("Row",le);t.component("Toast",j);t.component("ConfirmDialog",F);t.component("Dropdown",H);t.component("InputText",K);t.component("Dialog",z);t.component("ProgressSpinner",J);t.component("Calendar",ae);t.component("Textarea",oe);t.component("Chips",ne);t.component("MultiSelect",ie);t.component("InputNumber",ee);t.component("OverlayPanel",de);t.component("Tag",re);t.mount("#Exit");
