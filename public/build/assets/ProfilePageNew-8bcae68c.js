import{X as V,G as w,Y as L,H as N,i as r,o as y,b as x,g as e,l as u,j as s,w as m,q as S,k as P,B as k,t as h,_ as g,F,h as I,$ as E,a as B,d as U,I as j,P as q,J as O,R as Y,v as G}from"./toastservice.esm-d8c7f832.js";import{c as H}from"./pinia-e68d137f.js";import{T as J,B as K,S as W,b as z,a as X,c as Q}from"./styleclass.esm-ce31656f.js";import"./blockui.esm-c15664db.js";import{C as Z,F as ee,b as te,s as se,a as oe}from"./inputtext.esm-97727bd3.js";import{s as ae}from"./confirmdialog.esm-39c841fe.js";import{D as le}from"./dialogservice.esm-ce2382ba.js";import{s as ie}from"./toast.esm-627f4a3f.js";import{s as ne}from"./progressspinner.esm-280f5158.js";import{s as de}from"./row.esm-6ebc942e.js";import{s as ce}from"./columngroup.esm-9dd1458e.js";import{s as re}from"./calendar.esm-eb688744.js";import{s as pe}from"./textarea.esm-ebf82cbb.js";import{s as _e}from"./chips.esm-433b3e1c.js";import{s as me}from"./multiselect.esm-18cb73b4.js";import{S as A,p as M,E as ue}from"./EmployeeDetails-a573aaa4.js";import"./moment-fbc5633a.js";import"./_plugin-vue_export-helper-c27b6911.js";const be={class:"mb-2 card"},he={class:"card-body"},ve={class:""},fe={class:"space-between"},ge={class:"flex-col input_text"},ye=e("span",null,[u("Name "),e("span",{class:"text-danger"},"*")],-1),xe={class:"flex-col input_text"},$e=e("span",null,[u("Relationship"),e("span",{class:"text-danger"},"*")],-1),we={class:"space-between M-T"},De={class:"flex-col input_text"},Pe=e("span",null,[u("Date of birth "),e("span",{class:"text-danger"},"*")],-1),ke={class:"flex-col input_text"},Ce=e("span",null,[u("phone"),e("span",{class:"text-danger"},"*")],-1),Se={class:"table-responsive"},Te={__name:"FamilyDetails",setup(T){A();const f=M();V(),w("");const d=w(!1),n=L({name:"",relationship:"",dob:"",ph_no:""}),l=()=>{},$=p=>{f.employeeDetails.get_emergency_contacts_details={...p},console.log(p),n.name=p.name,n.relationship=p.relationship,n.name=p.name,n.name=p.name,d.value=!0};return N(()=>{}),(p,t)=>{const c=r("Toast"),C=r("Dialog"),v=r("Column"),a=r("Button"),D=r("DataTable");return y(),x("div",be,[e("div",he,[e("h6",ve,[u("Family Information "),s(C,{visible:d.value,"onUpdate:visible":t[4]||(t[4]=b=>d.value=b),modal:"",style:{width:"50vw",borderTop:"5px solid #002f56"},id:""},{header:m(()=>[e("div",null,[e("h5",{style:S({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Family Information",4)])]),footer:m(()=>[s(c),e("div",null,[e("button",{type:"button",class:"submit_btn warning success",id:"submit_button_family_details",onClick:l},"submit")])]),default:m(()=>[e("div",fe,[e("div",ge,[ye,P(e("input",{type:"text",name:"familyDetails_Name[]","pattern-data":"name",id:"familyDetails_Name",required:"","onUpdate:modelValue":t[0]||(t[0]=b=>n.name=b)},null,512),[[k,n.name]])]),e("div",xe,[$e,P(e("input",{type:"text",name:"familyDetails_Relationship[]","onUpdate:modelValue":t[1]||(t[1]=b=>n.relationship=b),id:"familyDetails_Relationship","pattern-data":"alpha",required:""},null,512),[[k,n.relationship]])])]),e("div",we,[e("div",De,[Pe,P(e("input",{type:"date",id:"datemin",name:"familyDetails_dob[]",min:"2000-01-02","onUpdate:modelValue":t[2]||(t[2]=b=>n.dob=b)},null,512),[[k,n.dob]])]),e("div",ke,[Ce,P(e("input",{type:"number",minlength:"10",maxlength:"10",pattern:"[1-9]{1}[0-9]{9}",id:"familyDetails_phoneNumber",name:"familyDetails_phoneNumber[]","onUpdate:modelValue":t[3]||(t[3]=b=>n.ph_no=b)},null,512),[[k,n.ph_no]])])])]),_:1},8,["visible"])]),u(" "+h(g(f).employeeDetails.get_emergency_contacts_details)+" ",1),e("div",Se,[s(D,{ref:"dt",dataKey:"id",paginator:!0,rows:10,value:g(f).employeeDetails.get_emergency_contacts_details,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:m(()=>[s(v,{header:"Name",field:"name",style:{"min-width":"8rem"}}),s(v,{field:"relationship",header:"Relationship",style:{"min-width":"12rem"}}),s(v,{field:"dob",header:"Date of Birth ",style:{"min-width":"12rem"}}),s(v,{field:"phone_number_1",header:"Phone",style:{"min-width":"12rem"}}),s(v,{exportable:!1,header:"Action",style:{"min-width":"8rem"}},{body:m(b=>[s(a,{icon:"pi pi-pencil",outlined:"",rounded:"",class:"mr-2",onClick:_=>$(b.data)},null,8,["onClick"]),s(a,{icon:"pi pi-trash",outlined:"",rounded:"",severity:"danger",onClick:_=>p.confirmDeleteProduct(b.data)},null,8,["onClick"])]),_:1})]),_:1},8,["value"])])])])}}};const Le=e("div",{class:"mb-2 card left-line"},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"nav nav-pills nav-tabs-dashed",id:"pills-tab",role:"tablist"},[e("li",{class:"nav-item",role:"presentation"},[e("a",{class:"nav-link active",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#finance_summary",role:"tab","aria-controls":"pills-home","aria-selected":"true"},"Summary ")]),e("li",{class:"mx-4 nav-item",role:"presentation"},[e("a",{class:"nav-link",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#finance_pay",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Paycheck ")])])])],-1),Ne={class:"tab-content",id:"pills-tabContent"},Ve={class:"tab-pane fade active show",id:"finance_summary",role:"tabpanel","aria-labelledby":""},Fe=e("div",{class:"mb-2 card"},[e("div",{class:"card-body"},[e("form",{action:"",method:"POST",enctype:"multipart/form-data"},[e("div",{class:"d-flex justify-content-between align-items-center"},[e("h6",{class:""}," Payroll Summary ")]),e("ul",{class:"personal-info"},[e("li",{class:"pb-1 border-bottom-liteAsh"},[e("div",{class:"title"},"Last Processed"),e("div",{class:"text"}," - ")]),e("li",{class:"pb-1 border-bottom-liteAsh"},[e("div",{class:"title"},"Total Working Days"),e("div",{class:"text"}," - ")]),e("li",{class:"pb-1"},[e("div",{class:"title"},"Loss Of Pay(LOP)"),e("div",{class:"text"}," - ")])])])])],-1),Ae={class:"mb-2 card"},Re={class:"card-body"},Ie={class:""},Ee={class:"personal-edit"},Be=e("i",{class:"ri-pencil-fill"},null,-1),Ue=[Be],Me={class:"modal-body"},je={class:"row"},qe={class:"col-md-6"},Oe={class:"mb-3 form-group"},Ye=e("label",null,"Bank Name",-1),Ge={class:"col-md-6"},He={class:"mb-3 form-group"},Je=e("label",null,"Bank Account No",-1),Ke=e("div",{class:"cal-icon"},null,-1),We={class:"col-md-6"},ze={class:"mb-3 form-group"},Xe=e("label",null,"IFSC Code",-1),Qe={class:"col-md-6"},Ze={class:"mb-3 form-group"},et=e("label",null,"PAN No",-1),tt={class:"col-12"},st={class:"text-right"},ot={class:"personal-info"},at=e("div",{class:"title"},"Bank Name",-1),lt={class:"text"},it=e("div",{class:"title"},"Bank Account No.",-1),nt={class:"text"},dt=e("div",{class:"title"},"IFSC Code",-1),ct={class:"text"},rt=e("div",{class:"title"},"PAN No",-1),pt={class:"text"},_t={class:"mb-2 card"},mt={class:"card-body"},ut={class:""},bt={class:"personal-edit"},ht=e("i",{class:"ri-pencil-fill"},null,-1),vt=[ht],ft={class:"modal-body"},gt={class:"row"},yt={class:"col-md-6"},xt={class:"floating"},$t=e("label",{for:"",class:"float-label"},[u("PF Applicable"),e("span",{class:"text-danger"},"*")],-1),wt=e("option",{value:"",hidden:"",selected:"",disabled:""},"PF Applicable",-1),Dt=e("option",{value:"yes"},"Yes",-1),Pt=e("option",{value:"no"},"No",-1),kt=[wt,Dt,Pt],Ct={class:"col-md-6"},St={class:"mb-3 form-group"},Tt=e("label",null,"EPF Number",-1),Lt={class:"col-md-6"},Nt={class:"mb-3 form-group"},Vt=e("label",null,"UAN Number",-1),Ft={class:"col-md-6"},At={class:"mb-3 form-group"},Rt=e("label",{class:"float-label"},[u("ESIC Applicable"),e("span",{class:"text-danger"},"*")],-1),It=e("option",{value:"",hidden:"",selected:"",disabled:""},"ESIC Applicable",-1),Et=e("option",{value:"yes"}," Yes ",-1),Bt=e("option",{value:"no"}," No ",-1),Ut=[It,Et,Bt],Mt={class:"col-md-6"},jt={class:"floating"},qt=e("label",{for:"",class:"float-label"},"ESIC Number",-1),Ot=e("span",{class:"error",id:"error_esic_number"},null,-1),Yt=e("div",{class:"title"},"PF Applicable",-1),Gt={class:"text"},Ht=e("div",{class:"title"},"EPF Number",-1),Jt={class:"text"},Kt=e("div",{class:"title"},"UAN Number",-1),Wt={class:"text"},zt=e("div",{class:"title"},"ESIC Applicable",-1),Xt={class:"text"},Qt=e("div",{class:"title"},"ESIC Number",-1),Zt={class:"text"},es=e("div",{class:"tab-pane fade",id:"finance_pay",role:"tabpanel","aria-labelledby":""},[e("div",{class:"mb-2 card"},[e("div",{class:"card-body"},[e("ul",{class:"mb-4 nav nav-pills nav-tabs-dashed",id:"pills-tab",role:"tablist"},[e("li",{class:"nav-item",role:"presentation"},[e("a",{class:"nav-link active",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#pay_slips",role:"tab","aria-controls":"","aria-selected":"true"}," Pay Slips ")])]),e("div",{class:"tab-content",id:"pills-tabContent"},[e("div",{class:"tab-pane fade active show",id:"pay_slips",role:"tabpanel","aria-labelledby":""},[e("div",{id:"",class:"ember-view"},[e("div",{class:"table-responsive"},[e("table",{class:"table table-hover"},[e("thead",{class:"fw-bold text-muted h5"},[e("tr",null,[e("th",{width:""},"Month"),e("th",{width:""},"Gross Pay"),e("th",{width:""},"Reimbursements"),e("th",{width:""},"Deductions"),e("th",{"data-url":"{{ route('vmt_employee_payslip_pdf') }}",style:{cursor:"pointer"},class:"ember-view paySlipPDF text-info"}," Download PDF ")])])])])])])])])])],-1),ts={__name:"FinanceDetails",setup(T){const f=A();N(()=>{f.getBankList().then(v=>{p.value=v.data})});const d=w(!1),n=w(!1),l=w(),$=w(),p=w(),t=L({bank_name:"",bank_ac_no:"",ifsc_code:"",pan_no:""}),c=L({pf_applicable:"",epf_no:"",uan_no:"",esic_applicable:"",esic_no:""}),C=()=>{let v=" http://localhost:3000/FinanceDetails";n.value=!1,console.log(c),B.post(v,c).then(a=>{console.log("sent sucessfully")}).catch(a=>{console.log(a)}).finally(()=>{console.log("completed")})};return(v,a)=>{const D=r("Dropdown"),b=r("InputNumber"),_=r("InputText"),R=r("Dialog");return y(),x("div",null,[Le,e("div",Ne,[e("div",Ve,[Fe,e("div",Ae,[e("div",Re,[e("h6",Ie,[u("Bank Information "),e("span",Ee,[e("a",{href:"#",class:"edit-icon",onClick:a[0]||(a[0]=o=>d.value=!0)},Ue)])]),s(R,{visible:d.value,"onUpdate:visible":a[6]||(a[6]=o=>d.value=o),modal:"",header:"Header",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:m(()=>[e("div",null,[e("h5",{style:S({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Bank Information",4)])]),default:m(()=>[e("div",null,[e("div",Me,[e("div",je,[e("div",qe,[e("div",Oe,[Ye,s(D,{editable:"",options:p.value,optionLabel:"bank_name",placeholder:"Select Bank Name",class:"w-full form-controls",modelValue:t.bank_name,"onUpdate:modelValue":a[1]||(a[1]=o=>t.bank_name=o)},null,8,["options","modelValue"])])]),e("div",Ge,[e("div",He,[Je,Ke,s(b,{class:"form-controls onboard-form",inputId:"integeronly",name:"account_no",min:0,max:100,modelValue:t.bank_ac_no,"onUpdate:modelValue":a[2]||(a[2]=o=>t.bank_ac_no=o)},null,8,["modelValue"])])]),e("div",We,[e("div",ze,[Xe,s(_,{type:"text",name:"bank_ifsc_",class:"form-controls",modelValue:t.ifsc_code,"onUpdate:modelValue":a[3]||(a[3]=o=>t.ifsc_code=o)},null,8,["modelValue"])])]),e("div",Qe,[e("div",Ze,[et,s(_,{type:"text",name:"pan_nos",class:"form-controls",modelValue:t.pan_no,"onUpdate:modelValue":a[4]||(a[4]=o=>t.pan_no=o)},null,8,["modelValue"])])])]),e("div",tt,[e("div",st,[e("button",{id:"btn_submit_bank_info",class:"btn btn-orange submit-btn",onClick:a[5]||(a[5]=(...o)=>v.saveBankDetails&&v.saveBankDetails(...o))},"Submit")])])])])]),_:1},8,["visible"]),(y(!0),x(F,null,I(l.value,o=>(y(),x("div",{key:o.id},[e("ul",ot,[e("li",null,[at,e("div",lt,h(o.bank_name),1)]),e("li",null,[it,e("div",nt,h(o.bank_ac_no),1)]),e("li",null,[dt,e("div",ct,h(o.ifsc_code),1)]),e("li",null,[rt,e("div",pt,h(o.pan_no),1)])])]))),128))])]),e("div",_t,[e("div",mt,[e("h6",ut,[u("Statutory Information "),e("span",bt,[e("a",{href:"#",class:"edit-icon","data-bs-target":"#statutory_info",onClick:a[7]||(a[7]=o=>n.value=!0)},vt)])]),s(R,{visible:n.value,"onUpdate:visible":a[13]||(a[13]=o=>n.value=o),modal:"",header:"Statutory Details",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:m(()=>[e("div",null,[e("h5",{style:S({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Statutory information",4)])]),default:m(()=>[e("div",ft,[e("div",gt,[e("div",yt,[e("div",xt,[$t,P(e("select",{placeholder:"PF Applicable",name:"pf_applicable",id:"pf_applicable",class:"onboard-form form-control textbox select2_form_without_search",required:"","onUpdate:modelValue":a[8]||(a[8]=o=>c.pf_applicable=o)},kt,512),[[E,c.pf_applicable]])])]),e("div",Ct,[e("div",St,[Tt,P(e("input",{type:"text",placeholder:"EPF Number",name:"epf_number",id:"epf_number",class:"onboard-form form-control","onUpdate:modelValue":a[9]||(a[9]=o=>c.epf_no=o)},null,512),[[k,c.epf_no]])])]),e("div",Lt,[e("div",Nt,[Vt,P(e("input",{name:"uan_number",id:"uan_number",minlength:"12",maxlength:"12",class:"form-control onboard-form",type:"text","pattern-data":"ifsc",required:"","onUpdate:modelValue":a[10]||(a[10]=o=>c.uan_no=o)},null,512),[[k,c.uan_no]])])]),e("div",Ft,[e("div",At,[Rt,P(e("select",{placeholder:"ESIC Applicable",name:"esic_applicable",id:"esic_applicable",class:"onboard-form form-control textbox select2_form_without_search",required:"","onUpdate:modelValue":a[11]||(a[11]=o=>c.esic_applicable=o)},Ut,512),[[E,c.esic_applicable]])])]),e("div",Mt,[e("div",jt,[qt,P(e("input",{type:"text",placeholder:"ESIC Number",name:"esic_number",id:"esic_number",minlength:"10",maxlength:"10",class:"onboard-form form-control textbox","onUpdate:modelValue":a[12]||(a[12]=o=>c.esic_no=o)},null,512),[[k,c.esic_no]]),Ot])])]),e("div",{class:"col-12"},[e("div",{class:"text-right"},[e("button",{id:"btn_submit_statutory_info",class:"btn btn-border-orange submit-btn",onClick:C},"Save")])])])]),_:1},8,["visible"]),(y(!0),x(F,null,I($.value,o=>(y(),x("ul",{class:"personal-info",key:o.id},[e("li",null,[Yt,e("div",Gt,h(o.pf_applicable),1)]),e("li",null,[Ht,e("div",Jt,h(o.epf_no),1)]),e("li",null,[Kt,e("div",Wt,h(o.uan_no),1)]),e("li",null,[zt,e("div",Xt,h(o.esic_applicable),1)]),e("li",null,[Qt,e("div",Zt,h(o.esic_no),1)])]))),128))])])]),es])])}}};const ss={class:"card mb-2"},os={class:"card-body"},as={class:""},ls=e("i",{class:"ri-pencil-fill"},null,-1),is=[ls],ns={style:{"box-shadow":"0 1px 2px rgba(56, 65, 74, 0.15)",padding:"1rem"}},ds={class:"space-between"},cs={class:"input_text flex-col"},rs=e("span",null,[u("Company Name "),e("span",{class:"text-danger"},"*")],-1),ps={class:"input_text flex-col"},_s=e("span",null,[u(" Location"),e("span",{class:"text-danger"},"*")],-1),ms={class:"space-between M-T"},us={class:"input_text flex-col"},bs=e("span",null,[u("Job Position "),e("span",{class:"text-danger"},"*")],-1),hs={class:"input_text flex-col",style:{"margin-right":"7px"}},vs=e("span",{style:{paddingLeft:"6px"}},[u("Period From"),e("span",{class:"text-danger"},"*")],-1),fs={class:"space-between M-T"},gs={class:"input_text flex-col",style:{marginLeft:"-6px"}},ys=e("span",{style:{paddingLeft:"6px"}},[u("Period To "),e("span",{class:"text-danger"},"*")],-1),xs={class:"table-responsive"},$s={__name:"ExperienceDetails",setup(T){const f=V();V();const d=w(""),n=w(!1),l=L({company_name:"",location:"",job_position:"",period_from:"",period_to:""}),$=()=>{if(console.log(l),l.company_name==" "||l.job_position===""||l.location===""||l.period_from===" "||l.period_to===" ")f.add({severity:"warn",summary:"Warn Message",detail:"Message Content",life:3e3});else{let p="http://localhost:3000/Experience";f.add({severity:"success",summary:"Success Message",detail:"Message Content",life:3e3}),n.value=!1,B.post(p,l).then(t=>{console.log("sent sucessfully"),console.log(t.status),t.status==201&&f.add({severity:"success",summary:"Success Message",detail:"Message Content",life:3e3})}).catch(t=>{console.log(t)}).finally(()=>{console.log("completed")})}};return N(()=>{}),(p,t)=>{const c=r("InputText"),C=r("Calendar"),v=r("Toast"),a=r("Dialog"),D=r("Column"),b=r("DataTable");return y(),x("div",null,[e("div",ss,[e("div",os,[e("h6",as,[u("Experience Information "),e("button",{type:"button",class:"btn_txt edit-icon","data-bs-toggle":"modal","data-bs-target":"#exampleModal",onClick:t[0]||(t[0]=_=>n.value=!0)},is),s(a,{visible:n.value,"onUpdate:visible":t[6]||(t[6]=_=>n.value=_),modal:"",style:{width:"50vw",borderTop:"5px solid #002f56"},id:""},{header:m(()=>[e("div",null,[e("h5",{style:S({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Experience Information",4)])]),footer:m(()=>[e("div",null,[s(v),e("button",{type:"button",class:"submit_btn success warning",severity:"success",id:"",onClick:$},"submit")])]),default:m(()=>[e("div",ns,[e("div",ds,[e("div",cs,[rs,s(c,{type:"text",modelValue:l.company_name,"onUpdate:modelValue":t[1]||(t[1]=_=>l.company_name=_),name:"ExperienceDetails_company_name[]",required:""},null,8,["modelValue"])]),e("div",ps,[_s,s(c,{type:"text",modelValue:l.location,"onUpdate:modelValue":t[2]||(t[2]=_=>l.location=_),name:"experienceDet_location[]",required:""},null,8,["modelValue"])])]),e("div",ms,[e("div",us,[bs,s(c,{type:"text",modelValue:l.job_position,"onUpdate:modelValue":t[3]||(t[3]=_=>l.job_position=_),name:"experienceDet_job_position[]",required:""},null,8,["modelValue"])]),e("div",hs,[vs,s(C,{showIcon:"",modelValue:l.period_from,"onUpdate:modelValue":t[4]||(t[4]=_=>l.period_from=_),style:S({height:" 2.3rem",width:"100%",marginRight:"20px"}),name:"experienceDet_period_from[]"},null,8,["modelValue","style"])])]),e("div",fs,[e("div",gs,[ys,s(C,{showIcon:"",modelValue:l.period_to,"onUpdate:modelValue":t[5]||(t[5]=_=>l.period_to=_),class:"",style:S({height:" 2.3rem",width:"100%",borderRadius:"2px"}),name:"experienceDet_period_to[]"},null,8,["modelValue","style"])])])])]),_:1},8,["visible"])]),e("div",xs,[s(b,{ref:"dt",value:d.value,dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:m(()=>[s(D,{header:"Company Name",field:"company_name",style:{"min-width":"8rem"}}),s(D,{field:"location",header:"Loaction",style:{"min-width":"12rem"}}),s(D,{field:"job_position",header:"Job Position ",style:{"min-width":"12rem"}}),s(D,{field:"period_from",header:"Period from",style:{"min-width":"12rem"}}),s(D,{field:"period_to",header:"Period To",style:{"min-width":"12rem"}})]),_:1},8,["value"])])])])])}}},ws={class:"table-responsive"},Ds={key:0},Ps={__name:"documents",setup(T){const f=w();return(d,n)=>{const l=r("Column"),$=r("Button"),p=r("DataTable");return y(),x("div",ws,[s(p,{ref:"dt",value:f.value,dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:m(()=>[s(l,{header:"File Name",field:"name",style:{"min-width":"8rem"}}),s(l,{field:"Status",header:"Status",style:{"min-width":"12rem"}}),s(l,{field:"dob",header:"Reason ",style:{"min-width":"12rem"}}),s(l,{style:{width:"300px"},field:"",header:"Action"},{body:m(t=>[t.data.status=="Pending"?(y(),x("span",Ds,[s($,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approval",onClick:c=>d.showConfirmDialog(t.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),s($,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Rejected",style:{"margin-left":"8px",height:"2em"},onClick:c=>d.showConfirmDialog(t.data,"Reject")},null,8,["onClick"])])):U("",!0)]),_:1})]),_:1},8,["value"])])}}},ks=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),Cs={class:"profile_page-wrapper mt-30 container-fluid"},Ss={class:"row"},Ts={class:"col-3 col-sm-12 col-md-3 col-lg-3 col-xxl-3 col-xl-3"},Ls={class:"mb-0 card top-line"},Ns={class:"card-body"},Vs={class:"row"},Fs=e("div",{class:"col-12 text-end"},[e("button",{class:"p-0 m-0 bg-transparent border-0 outline-none btn","data-bs-target":"#show_idCard","data-bs-toggle":"modal"},[e("i",{class:"fa fa-id-card text-success","aria-hidden":"true"})])],-1),As={class:"text-center col-12"},Rs=e("div",{class:"mx-auto rounded-circle img-xl userActive-status profile-img",style:{border:"6px solid #c2c2c2c2"}},[e("a",{class:"edit-icon","data-bs-toggle":"modal","data-bs-target":"#edit_profileImg",id:""},[e("i",{class:"fa fa-camera"})])],-1),Is={class:"mt-4"},Es={class:"progress-wrapper border-bottom-liteAsh"},Bs={class:"mb-1 text-center"},Us={class:"text-center"},Ms=e("div",{class:"mb-1 d-flex justify-content-between"},[e("span",{class:"text-muted f-12"},"Profile Completeness"),e("span",{class:"text-muted text-end f-12 fw-bold",id:"prograssBar_percentage"})],-1),js=e("div",{class:"mb-2 progress progress-bar-content"},[e("div",{class:"progress-bar",role:"progressbar",id:"profile_progressBar","aria-valuenow":"{{ $profileCompletenessValue }}","aria-valuemin":"0","aria-valuemax":"100"})],-1),qs=e("p",{class:"mb-2 text-muted f-10 text-start fw-bold"},"Your profile is completed",-1),Os={class:"mb-4 text-center profile-mid-right-content"},Ys=e("div",{class:"py-2 border-bottom-liteAsh"},[e("p",{class:"text-muted f-12 fw-bold"},"Employee Status"),e("p",{class:"text-primary f-15 fw-bold"})],-1),Gs={class:"py-2 border-bottom-liteAsh"},Hs=e("p",{class:"text-muted f-12 fw-bold"},"Employee Code",-1),Js={class:"text-primary f-15 fw-bold"},Ks={class:"py-2 border-bottom-liteAsh"},Ws=e("p",{class:"text-muted f-12 fw-bold"},"Designation",-1),zs={class:"text-primary f-15 fw-bold"},Xs={class:"py-2 border-bottom-liteAsh"},Qs=e("p",{class:"text-muted f-12 fw-bold"},"Location",-1),Zs={class:"text-primary f-15 fw-bold"},eo={class:"py-2 border-bottom-liteAsh"},to=e("p",{class:"text-muted f-12 fw-bold"},"Department",-1),so={class:"text-primary f-15 fw-bold"},oo={class:"py-2 border-bottom-liteAsh"},ao=e("p",{class:"text-muted f-12 fw-bold"},"Reporting To",-1),lo={class:"text-primary f-15 fw-bold"},io=e("div",{class:"text-center profile-bottom-right-content"},[e("button",{class:"btn btn-danger"},[e("i",{class:"fa fa-sign-out me-1"}),u(" Action ")])],-1),no={class:"col-9 col-sm-9 col-md-9 col-lg-9 col-xxl-9 col-xl-9"},co=e("div",{class:"mb-2 card top-line"},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"nav nav-pills nav-tabs-dashed",id:"pills-tab",role:"tablist"},[e("li",{class:"nav-item",role:"presentation"},[e("a",{class:"nav-link active",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#employee_details",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Employee Details")]),e("li",{class:"mx-4 nav-item",role:"presentation"},[e("a",{class:"nav-link",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#family_det",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Family")]),e("li",{class:"nav-item",role:"presentation"},[e("a",{class:"nav-link",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#experience_det",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Experience")]),e("li",{class:"mx-4 nav-item",role:"presentation"},[e("a",{class:"nav-link",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#finance_det",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Finance")]),e("li",{class:"nav-item",role:"presentation"},[e("a",{class:"nav-link",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#document_det",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Document")])])])],-1),ro={class:"tab-content",id:"pills-tabContent"},po={class:"tab-pane fade active show",id:"employee_details",role:"tabpanel","aria-labelledby":""},_o={key:0},mo={class:"tab-pane fade",id:"family_det",role:"tabpanel","aria-labelledby":""},uo={class:"tab-pane fade",id:"experience_det",role:"tabpanel","aria-labelledby":""},bo={class:"tab-pane fade",id:"finance_det",role:"tabpanel","aria-labelledby":""},ho={class:"tab-pane fade",id:"document_det",role:"tabpanel","aria-labelledby":""},vo={__name:"profilePageNew",setup(T){const f=A();let d=M();return N(async()=>{console.log("Loading screen start : "+d.loading_screen),d.fetchEmployeeDetails().then(function(n){console.log("Loading screen end : "+d.loading_screen),console.log("Req done")})}),(n,l)=>{const $=r("Toast"),p=r("ProgressSpinner"),t=r("Dialog");return y(),x(F,null,[s($),s(t,{header:"Header",visible:g(d).loading_screen,"onUpdate:visible":l[0]||(l[0]=c=>g(d).loading_screen=c),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:m(()=>[s(p,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:m(()=>[ks]),_:1},8,["visible"]),e("div",Cs,[e("div",Ss,[e("div",Ts,[e("div",Ls,[e("div",Ns,[e("div",Vs,[Fs,e("div",As,[Rs,e("div",Is,[e("div",Es,[e("div",Bs,[e("h6",Us,h(g(f).current_user_name),1)]),Ms,js,qs]),e("div",Os,[Ys,e("div",Gs,[Hs,e("p",Js,h(g(d).employeeDetails.user_code),1)]),e("div",Ks,[Ws,e("p",zs,h(g(d).employeeDetails.designation),1)]),e("div",Xs,[Qs,e("p",Zs,h(g(d).employeeDetails.work_location),1)]),e("div",eo,[to,e("p",so,h(g(d).employeeDetails.department),1)]),e("div",oo,[ao,e("p",lo,h(g(d).employeeDetails.l1_manager_name),1)])]),io])])])])])]),e("div",no,[co,e("div",ro,[e("div",po,[g(d).loading_screen?U("",!0):(y(),x("div",_o,[s(ue)]))]),e("div",mo,[s(Te)]),e("div",uo,[s($s)]),e("div",bo,[s(ts)]),e("div",ho,[s(Ps)])])])])])],64)}}},i=j(vo),fo=H();i.use(q,{ripple:!0});i.use(Z);i.use(O);i.use(le);i.use(fo);i.directive("tooltip",J);i.directive("badge",K);i.directive("ripple",Y);i.directive("styleclass",W);i.directive("focustrap",ee);i.component("Button",G);i.component("DataTable",z);i.component("Column",X);i.component("ColumnGroup",ce);i.component("Row",de);i.component("Toast",ie);i.component("ConfirmDialog",ae);i.component("Dropdown",te);i.component("InputText",se);i.component("Dialog",oe);i.component("ProgressSpinner",ne);i.component("Calendar",re);i.component("Textarea",pe);i.component("Chips",_e);i.component("MultiSelect",me);i.component("InputNumber",Q);i.mount("#profilePage");
