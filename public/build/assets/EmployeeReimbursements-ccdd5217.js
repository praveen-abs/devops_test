import{X as K,G as b,Y as E,a as x,H as X,b as A,j as n,w as i,T as z,g as l,_ as t,l as d,d as S,F as G,i as y,o as T,e as H,t as _,I as Y,P as q,J as Q,R as W,v as Z}from"./toastservice.esm-00869179.js";import{d as ee,c as oe}from"./pinia-2a477ea6.js";import{T as le,B as te,S as ae,b as ne,a as se,c as ie}from"./styleclass.esm-7a6b1127.js";import{F as re,b as ce,s as me,a as de}from"./inputtext.esm-2f6a5e2d.js";import{s as _e}from"./confirmdialog.esm-f4112131.js";import{D as ue}from"./dialogservice.esm-baf8c35b.js";import{s as pe}from"./toast.esm-a9461f00.js";import{C as ve}from"./confirmationservice.esm-be9d1e76.js";import{s as be}from"./progressspinner.esm-c6e45385.js";import{s as fe}from"./row.esm-6ebc942e.js";import{s as ye}from"./columngroup.esm-9dd1458e.js";import"./fileupload.esm-6916e3b6.js";import{s as ge}from"./calendar.esm-0d078b66.js";import{s as he}from"./textarea.esm-e16f0346.js";import{s as ke}from"./chips.esm-2823a625.js";import{A as Ce}from"./ABS_loading_spinner-bf954dc7.js";import"./_plugin-vue_export-helper-c27b6911.js";const we=ee("employee_reimbursment_service",()=>{const L=K(),o=b([]),k=b(!0),a=b(!1),m=E({type_id:1,claim_type:"",claim_amount:Number,eligible_amount:Number,date_of_dispatch:"",proof_of_delivery:"",reimbursment_remarks:"",employee_reimbursement_attachment:""}),D=()=>{e.value=!1,a.value=!0},g=()=>{k.value=!0,c.value=!1},c=b(!1),C=b(!1),r=E({type_id:1,travelled_date:"",mode_of_transport:"",travel_from:"",travel_to:"",total_distance_travelled:"",Amt_km:"",local_convenyance_total_amount:"",local_conveyance_remarks:""}),V=()=>{e.value=!1,C.value=!0,e.value=!1},R=()=>{a.value=!1,C.value=!1,e.value=!1},P=()=>{k.value=!1,c.value=!0},w=u=>u.toLocaleDateString("es-PE",{day:"2-digit",month:"2-digit",year:"numeric"}),e=b(!1),U=b([{label:"Mobile Bills",value:"Mobile Bills"},{label:"Accommodation",value:"Accommodation"},{label:"Travel Expenses",value:"Travel Expenses"},{label:"Miscellaneous",value:"Miscellaneous"},{label:"Medical Expenses",value:"Medical Expenses"},{label:"Others",value:"Others"}]),M=b([{label:"Public Transport",value:"Public Transport"},{label:"Car",value:"Car"},{label:"Bike",value:"Bike"}]),F=u=>{m.employee_reimbursement_attachment=u.target.files[0],console.log(m.employee_reimbursement_attachment.file)},N=b(),O=b(!0),j=()=>{let u=window.location.origin+"/fetch_all_reimbursements";console.log("AJAX URL : "+u),x.get(u).then(h=>{N.value=h.data,console.log(h.data),O.value=!1})},$=E(m.value),J=u=>{e.value=!0,o.value.push(m),a.value=!1,console.log(m),console.log("post reiburmentt"),console.log(m.employee_reimbursement_attachment);const h=JSON.stringify({reimbursement_data:$});console.log(h),u.preventDefault();let v=globalThis,p=new FormData;p.append("reimbursement_type_id",m.type_id),p.append("file",m.employee_reimbursement_attachment),p.append("claim_type",m.claim_type),p.append("claim_amount",m.claim_amount),p.append("eligible_amount",m.eligible_amount),p.append("remarks",m.reimbursment_remarks),p.append("date_of_dispatch",m.date_of_dispatch),p.append("proof_of_delivery",m.proof_of_delivery);let f=window.location.origin+"/saveReimbursementsData";x.post(f,p).then(B=>{v.success=B.data.success}).catch(B=>{v.output=error,console.log(B)}),L.add({severity:"success",summary:"Saved",detail:"Reimbursement drafted",life:3e3})},I=b([]);return{hideDialog:R,localconvergance_dailog:C,employee_reimbursement:m,employee_local_conveyance:r,onclickOpenLocalConverganceDailog:V,reimbursements_dailog:a,reimbursementsScreen:k,localconverganceScreen:c,fetch_data_from_reimbursment:j,data_reimbursements:N,loading_spinner:O,formatDate:w,amount_calculation:()=>{console.log(r.mode_of_transport),r.mode_of_transport=="Car"?(console.log("Car"),r.local_convenyance_total_amount=r.total_distance_travelled*6,console.log(r.local_convenyance_total_amount)):r.mode_of_transport=="Bike"?(r.local_convenyance_total_amount=r.total_distance_travelled*3.5,console.log("Bike")):r.local_convenyance_total_amount=null},employee_reimbursement_attachment_upload:F,onclickSwitchToReimbursmentTab:g,reimbursement_data:$,post_reimbursment_data:J,reimbursement_datas:o,reimbursment_claim_types:U,onclickOpenReimbursmentDailog:D,post_data_for_local_convergance:u=>{u.preventDefault();let h=globalThis,v=new FormData;v.append("reimbursement_type_id",r.type_id),v.append("date",r.travelled_date),v.append("user_comments",r.local_conveyance_remarks),v.append("from",r.travel_from),v.append("to",r.travel_to),v.append("vehicle_type",r.mode_of_transport),v.append("distance_travelled",r.total_distance_travelled);let p=window.location.origin+"/saveReimbursementsData";console.log("AJAX URL : "+p),x.post(p,v).then(f=>{r.local_convenyance_total_amount=f.data.total_amount,console.log(f),h.success=f.data.success}).catch(f=>{h.output=f,console.log(f)}).finally(f=>{console.log(f)}),C.value=!1,console.log(r.value),I.value.push(r),L.add({severity:"success",summary:"Draft",detail:"Draft Saved",life:3e3})},fetch_data_for_local_convergance:()=>{let u=window.location.origin+"/fetch_all_reimbursements";console.log("AJAX URL : "+u),x.get(u).then(h=>{console.log(h.data),O.value=!1})},onclickSwitchToLocalCoverganceTab:P,data_local_convergance:I,local_Conveyance_Mode_of_transport:M}});const Te={class:"reimbursement-wrapper mt-30"},De={class:"mb-2 card left-line"},Ve={class:"pt-1 pb-1 card-body"},Re={class:"row"},Pe={class:"col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7"},xe={class:"nav nav-pills nav-tabs-dashed",role:"tablist"},Ae={class:"nav-item text-muted",role:"presentation"},Se={class:"nav-item text-muted ms-5",role:"presentation"},Le={class:"col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5 d-flex justify-content-end"},Ue=l("i",{class:"fa fa-plus-circle me-1"},null,-1),Oe=l("i",{class:"fa fa-plus-circle me-1"},null,-1),Be={class:"card"},Ee={class:"card-body"},Ne={class:"tab-content",id:"pills-tabContent"},$e={class:"tab-pane show fade active",id:"reimbursement",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Ie={id:"table"},Me={class:"card"},Fe={class:"field"},je=l("label",{for:"name"},"Claim Type",-1),Je={class:"grid formgrid"},Ke={class:"field col"},Xe=l("label",{for:"Claim Amount"},"Claim Amount",-1),ze={class:"field col"},Ge=l("label",{for:"Eligible Amount"},"Eligible Amount",-1),He={class:"field"},Ye=l("label",{class:"mb-3"},"Remarks",-1),qe={class:"formgrid"},Qe={class:"field"},We=l("label",{class:"mb-3"},"file Upload",-1),Ze={class:"formgrid"},eo=l("label",{id:"file_upload",for:"upload"},"Choose file",-1),oo={class:"tab-pane fade",id:"localConveyance",role:"tabpanel","aria-labelledby":"pills-profile-tab"},lo={class:"card"},to={key:0,class:"text-center"},ao={class:"field"},no=l("label",{for:"name"},"Date",-1),so={class:"field col"},io=l("label",{for:"Claim Amount"},"Mode of transport",-1),ro={class:"grid formgrid"},co={class:"field col"},mo=l("label",{for:"Eligible Amount"},"From",-1),_o={class:"field col"},uo=l("label",{for:"Claim Amount"},"To",-1),po={class:"grid formgrid"},vo={class:"field col"},bo=l("label",{for:"Eligible Amount"},"Total Distance",-1),fo={class:"field col"},yo=l("label",{for:"Eligible Amount"},"Amt/Km",-1),go=["hidden"],ho=l("label",{for:"Eligible Amount"},"Amount",-1),ko={class:"field col"},Co=l("label",{for:"Eligible Amount"},"Remarks",-1),wo={__name:"EmployeeReimbursements",setup(L){const o=we();return X(()=>{o.fetch_data_for_local_convergance()}),(k,a)=>{const m=y("Toast"),D=y("Calendar"),g=y("Button"),c=y("Column"),C=y("DataTable"),r=y("Dropdown"),V=y("InputNumber"),R=y("Textarea"),P=y("Dialog"),w=y("InputText");return T(),A(G,null,[n(m),n(z,{name:"modal"},{default:i(()=>[t(o).loading_spinner?(T(),H(Ce,{key:0})):S("",!0)]),_:1}),l("div",Te,[l("div",De,[l("div",Ve,[l("div",Re,[l("div",Pe,[l("ul",xe,[l("li",Ae,[l("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#reimbursement","aria-selected":"true",role:"tab",onClick:a[0]||(a[0]=(...e)=>t(o).onclickSwitchToReimbursmentTab&&t(o).onclickSwitchToReimbursmentTab(...e))}," Reimbursement ")]),l("li",Se,[l("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#localConveyance","aria-selected":"true",role:"tab",onClick:a[1]||(a[1]=(...e)=>t(o).onclickSwitchToLocalCoverganceTab&&t(o).onclickSwitchToLocalCoverganceTab(...e))}," Local Conveyance ")])])]),l("div",Le,[n(D,{modelValue:k.date,"onUpdate:modelValue":a[2]||(a[2]=e=>k.date=e),view:"month",dateFormat:"mm/yy",class:"mr-4",placeholder:"Select Month"},null,8,["modelValue"]),t(o).reimbursementsScreen?(T(),A("button",{key:0,onClick:a[3]||(a[3]=(...e)=>t(o).onclickOpenReimbursmentDailog&&t(o).onclickOpenReimbursmentDailog(...e)),class:"btn btn-orange"},[Ue,d("Add Claim ")])):S("",!0),t(o).localconverganceScreen?(T(),A("button",{key:1,onClick:a[4]||(a[4]=(...e)=>t(o).onclickOpenLocalConverganceDailog&&t(o).onclickOpenLocalConverganceDailog(...e)),class:"btn btn-orange"},[Oe,d("Add Claim ")])):S("",!0)])])])]),l("div",Be,[l("div",Ee,[l("div",Ne,[l("div",$e,[l("div",Ie,[l("div",null,[l("div",Me,[n(C,{ref:"dt",value:t(o).reimbursement_datas,dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:i(()=>[n(c,{exportable:!1,style:{"min-width":"8rem"}},{body:i(e=>[n(g,{icon:"pi pi-trash",outlined:"",rounded:"",severity:"danger",onClick:U=>k.confirmDeleteProduct(e.data)},null,8,["onClick"])]),_:1}),n(c,{header:"Claim Type",style:{"min-width":"8rem"}},{body:i(e=>[d(_(e.data.claim_type),1)]),_:1}),n(c,{field:"",header:"Claim Amount",style:{"min-width":"12rem"}},{body:i(e=>[d(_("₹"+e.data.claim_amount),1)]),_:1}),n(c,{field:"",header:"Eligible Amount",style:{"min-width":"12rem"}},{body:i(e=>[d(_("₹"+e.data.eligible_amount),1)]),_:1}),n(c,{field:"",header:"Remarks",style:{"min-width":"12rem"}},{body:i(e=>[d(_(e.data.reimbursment_remarks),1)]),_:1}),n(c,{field:"",header:"Status",style:{"min-width":"12rem"}},{body:i(e=>[d(_(e.data.eligible_amount),1)]),_:1}),n(c,{field:"",header:"Date Of Dispatch",style:{"min-width":"12rem"}},{body:i(e=>[d(_("₹"+e.data.eligible_amount),1)]),_:1}),n(c,{field:"",header:"Proof Of Delivery",style:{"min-width":"12rem"}},{body:i(e=>[d(_("₹"+e.data.eligible_amount),1)]),_:1})]),_:1},8,["value"])]),n(P,{visible:t(o).reimbursements_dailog,"onUpdate:visible":a[10]||(a[10]=e=>t(o).reimbursements_dailog=e),style:{width:"450px"},header:"Reimbursement Detials",modal:!0,class:"p-fluid"},{footer:i(()=>[n(g,{label:"Cancel",icon:"pi pi-times",style:{height:"30px",color:"black"},class:"p-button-text",onClick:t(o).hideDialog},null,8,["onClick"]),n(g,{label:"Save",disabled:!(!t(o).employee_reimbursement.claim_type==""&&!t(o).employee_reimbursement.claim_amount==""),icon:"pi pi-check",style:{height:"30px",background:"rgb(255 135 38)",color:"white"},onClick:t(o).post_reimbursment_data},null,8,["disabled","onClick"])]),default:i(()=>[l("div",Fe,[je,n(r,{modelValue:t(o).employee_reimbursement.claim_type,"onUpdate:modelValue":a[5]||(a[5]=e=>t(o).employee_reimbursement.claim_type=e),options:t(o).reimbursment_claim_types,optionLabel:"label",optionValue:"value",placeholder:"Select Claim Type"},null,8,["modelValue","options"])]),l("div",Je,[l("div",Ke,[Xe,n(V,{modelValue:t(o).employee_reimbursement.claim_amount,"onUpdate:modelValue":a[6]||(a[6]=e=>t(o).employee_reimbursement.claim_amount=e),mode:"currency",currency:"INR",locale:"en-IN"},null,8,["modelValue"])]),l("div",ze,[Ge,n(V,{modelValue:t(o).employee_reimbursement.eligible_amount,"onUpdate:modelValue":a[7]||(a[7]=e=>t(o).employee_reimbursement.eligible_amount=e),mode:"currency",currency:"INR",locale:"en-IN",integeronly:""},null,8,["modelValue"])])]),l("div",He,[Ye,l("div",qe,[n(R,{modelValue:t(o).employee_reimbursement.reimbursment_remarks,"onUpdate:modelValue":a[8]||(a[8]=e=>t(o).employee_reimbursement.reimbursment_remarks=e),autoResize:"",rows:"2",cols:"30"},null,8,["modelValue"])])]),l("div",Qe,[We,l("div",Ze,[l("input",{onChange:a[9]||(a[9]=e=>t(o).employee_reimbursement_attachment_upload(e)),ref:"employee_service.employee_reimbursement_attachment",type:"file",id:"upload",hidden:""},null,544),eo])])]),_:1},8,["visible"])])])])]),l("div",oo,[l("div",null,[l("div",lo,[n(C,{ref:"dt",value:t(o).data_local_convergance,dataKey:"id",paginator:!0,rows:8,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{footer:i(()=>[!t(o).data_local_convergance.length==0?(T(),A("div",to,[n(g,{label:"Submit",icon:"pi pi-check",class:"px-6",style:{background:"#003056"}})])):S("",!0)]),default:i(()=>[n(c,{exportable:!1,style:{"min-width":"8rem"}},{body:i(e=>[n(g,{icon:"pi pi-trash",outlined:"",rounded:"",severity:"danger",onClick:U=>k.confirmDeleteProduct(e.data)},null,8,["onClick"])]),_:1}),n(c,{field:"reimbursement_date",header:"Date",style:{"min-width":"12rem"},dataType:"date"},{body:i(e=>[d(_(t(o).formatDate(e.data.travelled_date)),1)]),_:1}),n(c,{header:"Mode Of Transport",style:{"min-width":"12rem"}},{body:i(e=>[d(_(e.data.mode_of_transport),1)]),_:1}),n(c,{field:"travel_from",header:"From ",style:{"min-width":"8rem"}},{body:i(e=>[d(_(e.data.travel_from),1)]),_:1}),n(c,{field:"travel_to",header:"To",style:{"min-width":"8rem"}},{body:i(e=>[d(_(e.data.travel_to),1)]),_:1}),n(c,{field:"total_distance_travelled",header:"Total Distance",style:{"min-width":"12rem"}},{body:i(e=>[d(_(e.data.total_distance_travelled),1)]),_:1}),n(c,{field:"Amt_km",header:"Amt/Km",style:{"min-width":"12rem"}},{body:i(e=>[d(_(e.data.Amt_km),1)]),_:1}),n(c,{field:"local_convenyance_total_amount",header:"Amount",style:{"min-width":"12rem"}},{body:i(e=>[d(_(e.data.local_convenyance_total_amount),1)]),_:1}),n(c,{field:"local_conveyance_remarks",header:"Remarks",style:{"min-width":"12rem"}},{body:i(e=>[d(_(e.data.local_conveyance_remarks),1)]),_:1})]),_:1},8,["value"])]),n(P,{visible:t(o).localconvergance_dailog,"onUpdate:visible":a[19]||(a[19]=e=>t(o).localconvergance_dailog=e),style:{width:"450px"},header:"Local Conveyance",modal:!0,class:"p-fluid"},{footer:i(()=>[n(g,{label:"Cancel",icon:"pi pi-times",style:{height:"30px",color:"black"},class:"p-button-text",onClick:t(o).hideDialog},null,8,["onClick"]),n(g,{label:"Save",icon:"pi pi-check",style:{height:"30px",background:"rgb(255 135 38)",color:"white"},onClick:t(o).post_data_for_local_convergance},null,8,["onClick"])]),default:i(()=>[l("div",ao,[no,n(D,{inputId:"dateformat",modelValue:t(o).employee_local_conveyance.travelled_date,"onUpdate:modelValue":a[11]||(a[11]=e=>t(o).employee_local_conveyance.travelled_date=e),dateFormat:"dd/mm/yy"},null,8,["modelValue"])]),l("div",so,[io,n(r,{modelValue:t(o).employee_local_conveyance.mode_of_transport,"onUpdate:modelValue":a[12]||(a[12]=e=>t(o).employee_local_conveyance.mode_of_transport=e),options:t(o).local_Conveyance_Mode_of_transport,optionLabel:"label",optionValue:"value",placeholder:"Select Mode Of Transport",class:"w-full"},null,8,["modelValue","options"])]),l("div",ro,[l("div",co,[mo,n(w,{modelValue:t(o).employee_local_conveyance.travel_from,"onUpdate:modelValue":a[13]||(a[13]=e=>t(o).employee_local_conveyance.travel_from=e)},null,8,["modelValue"])]),l("div",_o,[uo,n(w,{modelValue:t(o).employee_local_conveyance.travel_to,"onUpdate:modelValue":a[14]||(a[14]=e=>t(o).employee_local_conveyance.travel_to=e)},null,8,["modelValue"])])]),l("div",po,[l("div",vo,[bo,n(w,{modelValue:t(o).employee_local_conveyance.total_distance_travelled,"onUpdate:modelValue":a[15]||(a[15]=e=>t(o).employee_local_conveyance.total_distance_travelled=e),onInput:t(o).amount_calculation},null,8,["modelValue","onInput"])]),l("div",fo,[yo,n(w,{modelValue:t(o).employee_local_conveyance.total_distance_travelled,"onUpdate:modelValue":a[16]||(a[16]=e=>t(o).employee_local_conveyance.total_distance_travelled=e)},null,8,["modelValue"])])]),l("div",{class:"field col",hidden:t(o).employee_local_conveyance.mode_of_transport!="Public Transport"},[ho,n(w,{modelValue:t(o).employee_local_conveyance.local_convenyance_total_amount,"onUpdate:modelValue":a[17]||(a[17]=e=>t(o).employee_local_conveyance.local_convenyance_total_amount=e)},null,8,["modelValue"])],8,go),l("div",ko,[Co,n(R,{modelValue:t(o).employee_local_conveyance.local_conveyance_remarks,"onUpdate:modelValue":a[18]||(a[18]=e=>t(o).employee_local_conveyance.local_conveyance_remarks=e),autoResize:"",rows:"2",cols:"30"},null,8,["modelValue"])])]),_:1},8,["visible"])])])])])])],64)}}},s=Y(wo),To=oe();s.use(q,{ripple:!0});s.use(ve);s.use(Q);s.use(ue);s.use(To);s.directive("tooltip",le);s.directive("badge",te);s.directive("ripple",W);s.directive("styleclass",ae);s.directive("focustrap",re);s.component("Button",Z);s.component("DataTable",ne);s.component("Column",se);s.component("ColumnGroup",ye);s.component("Row",fe);s.component("Toast",pe);s.component("ConfirmDialog",_e);s.component("Dropdown",ce);s.component("InputText",me);s.component("Dialog",de);s.component("ProgressSpinner",be);s.component("Calendar",ge);s.component("Textarea",he);s.component("Chips",ke);s.component("InputNumber",ie);s.mount("#vjs_employee_reimbursement");
