import{a as j}from"./index-362795f3.js";import{r as a,I as G,y as q,o as X,c as u,e as D,f as z,n as t,l as s,k as Z,j as I,g as n,i as c,h as _,L as B,F as ee,t as p,p as te,R as y}from"./app-f3675218.js";import{h as le}from"./moment-fbc5633a.js";import{L as oe}from"./LoadingSpinner-19bba392.js";/* empty css                                                                       */const ae=n("h5",null,"Do you want to approve all?",-1),se={class:"w-full"},ne=n("h6",{class:"font-semibold text-lg"},"Reimbursement Approvals",-1),ie={class:"flex justify-end"},re={class:"grid grid-cols-4 w-1/2 gap-2"},de=["disabled"],ue=n("i",{class:"fa fa-cog me-2"},null,-1),ce=["disabled"],pe=n("i",{class:"fas fa-file-download me-2"},null,-1),me={key:0},ve={class:"orders-subtable"},fe={style:{"white-space":"nowrap"}},_e=n("h5",{style:{"text-align":"center"}},"Please wait...",-1),ge={class:"confirmation-content"},he=n("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Re={__name:"ReimbursementsApproval",setup(be){let x=a(),f=a(!1),g=a(!1);const h=a(!1);G();const F=q();a(!0);const T=a([]);a(!1),a(!1);const S=a();a(),a(!0),a({global:{value:null,matchMode:y.CONTAINS},name:{value:null,matchMode:y.STARTS_WITH,matchMode:y.EQUALS,matchMode:y.CONTAINS},status:{value:null,matchMode:y.EQUALS}});const O=a(["Pending","Approved","Rejected"]);let m=null,C=null;const Y=a(!0);X(()=>{x.value=[],v.value=new Date,console.log(v.value)});function L(o,l){f.value=!0,m=l,C=o,console.log("Selected Row Data : "+JSON.stringify(o))}function M(o){f.value=!1,o&&k()}function k(){m="",C=null}const v=a(),b=a();a(!1);const R=a(!1),N=a(),U=()=>{let o=new Date(v.value),l=o.getFullYear(),w=o.getMonth()+1;console.log(v.value.toString()),console.log(N),h.value=!0,j.post(window.location.origin+"/fetch_all_reimbursements_as_groups",{selected_year:l,selected_month:w,selected_status:b.value,selected_reimbursement_type:""}).then(r=>{console.log("data sent"),console.log("data from "+r.employee_name),x.value=r.data,N.value=r.data,h.value=!1}).catch(r=>{console.log(r)})},$=()=>{let o=new Date(v.value);h.value=!0;let l=o.getFullYear(),w=o.getMonth()+1;Y.value=!1;let r="/reports/generate-manager-reimbursements-reports?selected_year="+l+"&selected_month="+w+"&selected_status="+b.value+"&_token={{ csrf_token() }}";window.location=r,setTimeout(V,1e3)},V=()=>{h.value=!1};setTimeout(V,3e3);function H(){M(!1),console.log("Processing Rowdata : "+JSON.stringify(C)),console.log("currentlySelectedStatus : "+m),j.post(window.location.origin+"/reimbursements_bulk_approval",{reimbursement_id:C,status:m=="Approve"?"Approved":m=="Reject"?"Rejected":m,reviewer_comments:""}).then(o=>{console.log(o),U(),F.add({severity:"success",summary:"",detail:" Successfully Approved !",life:3e3}),k()}).catch(o=>{g.value=!1,k(),console.log(o.toJSON())})}return a(),(o,l)=>{const w=u("Toast"),r=u("Button"),A=u("Dialog"),J=u("Calendar"),K=u("Dropdown"),i=u("Column"),Q=u("InputText"),P=u("DataTable"),W=u("ProgressSpinner");return D(),z(ee,null,[t(w),t(A,{visible:R.value,"onUpdate:visible":l[2]||(l[2]=e=>R.value=e),modal:"",header:"Header",style:{width:"25vw"}},{footer:s(()=>[t(r,{label:"No",icon:"pi pi-times",onClick:l[0]||(l[0]=e=>R.value=!1),text:""}),t(r,{label:"Yes",icon:"pi pi-check",onClick:l[1]||(l[1]=e=>R.value=!1),autofocus:""})]),default:s(()=>[ae]),_:1},8,["visible"]),h.value?(D(),Z(oe,{key:0,class:"absolute z-50 bg-white"})):I("",!0),n("div",se,[ne,n("div",ie,[n("div",re,[t(J,{modelValue:v.value,"onUpdate:modelValue":l[3]||(l[3]=e=>v.value=e),view:"month",dateFormat:"mm/yy",class:"",style:{"border-radius":"7px",height:"30px"}},null,8,["modelValue"]),t(K,{modelValue:b.value,"onUpdate:modelValue":l[4]||(l[4]=e=>b.value=e),options:O.value,placeholder:"Status",class:"w-full",style:{"border-radius":"7px",height:"30px"}},null,8,["modelValue","options"]),n("button",{label:"Submit",class:"btn btn-primary z-0 whitespace-nowrap",severity:"danger",style:{height:"30px"},disabled:!b.value!="",onClick:U},[ue,c(" Generate")],8,de),n("button",{class:"btn btn-primary whitespace-nowrap mx-3 z-0",disabled:_(x)=="",severity:"success",onClick:$,style:{height:"30px"}},[pe,c("Download")],8,ce)])]),n("div",null,[n("div",null,[t(P,{value:_(x),paginator:!0,rows:10,class:"mt-6",dataKey:"user_id",onRowExpand:o.onRowExpand,onRowCollapse:o.onRowCollapse,expandedRows:T.value,"onUpdate:expandedRows":l[6]||(l[6]=e=>T.value=e),selection:S.value,"onUpdate:selection":l[7]||(l[7]=e=>S.value=e),selectAll:o.selectAll,onSelectAllChange:o.onSelectAllChange,onRowSelect:o.onRowSelect,onRowUnselect:o.onRowUnselect,paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}"},{empty:s(()=>[c(" No Reimbursement data for the selected status filter ")]),loading:s(()=>[c(" Loading customers data. Please wait. ")]),expansion:s(e=>[n("div",ve,[t(P,{value:e.data.reimbursement_data,responsiveLayout:"scroll",selection:S.value,"onUpdate:selection":l[5]||(l[5]=d=>S.value=d),selectAll:o.selectAll,onSelectAllChange:o.onSelectAllChange},{default:s(()=>[t(i,{field:"",header:"Date",sortable:""},{body:s(d=>[n("p",fe,p(_(le)(d.data.date).format("DD-MMM-YYYY")),1)]),_:2},1024),t(i,{field:"reimbursement_type",header:"Reimbursement Type"}),t(i,{field:"from",header:"From"}),t(i,{field:"to",header:"To"}),t(i,{field:"user_comments",header:"Comments"}),t(i,{field:"vehicle_type",header:"Mode of transport"}),t(i,{class:"fontSize13px",field:"distance_travelled",header:"Distance Covered"},{body:s(d=>[c(p(d.data.distance_travelled+" KM(s)"),1)]),_:2},1024),t(i,{class:"fontSize13px",field:"total_expenses",header:"Total Expenses"},{body:s(d=>[c(p("₹ "+d.data.total_expenses),1)]),_:2},1024),t(i,{field:"status",header:"Status",sortable:""},{body:s(d=>[n("span",{class:te("order-badge order-"+d.data.status)},p(d.data.status),3)]),_:2},1024)]),_:2},1032,["value","selection","selectAll","onSelectAllChange"])])]),default:s(()=>[t(i,{expander:!0}),t(i,{selectionMode:"multiple",style:{width:"1rem"},exportable:!1}),t(i,{field:"user_code",header:"Employee Id",sortable:""}),t(i,{field:"name",header:"Employee Name"},{body:s(e=>[c(p(e.data.employee_name),1)]),filter:s(({filterModel:e,filterCallback:d})=>[t(Q,{modelValue:e.value,"onUpdate:modelValue":E=>e.value=E,onInput:E=>d(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),t(i,{class:"fontSize13px",field:"total_distance_travelled",header:"Overall Distance Travelled",sortable:!1},{body:s(e=>[c(p(e.data.total_distance_travelled+" KM(s)"),1)]),_:1}),t(i,{class:"fontSize13px",field:"total_expenses",header:"Overall Reimbursements",sortable:!1},{body:s(e=>[c(p("₹ "+e.data.total_expenses),1)]),_:1}),t(i,{field:"",header:"Action",style:{width:"15vw"}},{body:s(e=>[e.data.has_pending_reimbursements=="true"?(D(),z("span",me,[t(r,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:d=>L(e.data,"Approve"),style:{height:"2.5em"}},null,8,["onClick"]),t(r,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2.5em"},onClick:d=>L(e.data,"Reject")},null,8,["onClick"])])):I("",!0)]),_:1})]),_:1},8,["value","onRowExpand","onRowCollapse","expandedRows","selection","selectAll","onSelectAllChange","onRowSelect","onRowUnselect"])])])]),t(A,{header:"Header",visible:_(g),"onUpdate:visible":l[8]||(l[8]=e=>B(g)?g.value=e:g=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:s(()=>[t(W,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:s(()=>[_e]),_:1},8,["visible"]),t(A,{header:"Confirmation",visible:_(f),"onUpdate:visible":l[11]||(l[11]=e=>B(f)?f.value=e:f=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:s(()=>[t(r,{label:"Yes",icon:"pi pi-check",onClick:l[9]||(l[9]=e=>H()),class:"p-button-text",autofocus:""}),t(r,{label:"No",icon:"pi pi-times",onClick:l[10]||(l[10]=e=>M(!0)),class:"p-button-text"})]),default:s(()=>[n("div",ge,[he,n("span",null,"Are you sure you want to "+p(_(m))+"?",1)])]),_:1},8,["visible"])],64)}}};export{Re as default};
