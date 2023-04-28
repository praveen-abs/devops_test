import{B as x,E as y,g as u,o as c,c as p,h as i,w as v,j as C,t as P,F as f,V as S,e as o,i as s,z as n,Y as b,af as h,G as w,P as B,H as N,R as V,q as T}from"./toastservice.esm-c719b254.js";import{c as D}from"./pinia-6d155cf1.js";import{T as A,B as q,S as R,b as $,a as U,c as E}from"./styleclass.esm-abc35d43.js";import"./blockui.esm-3f60d243.js";import{C as k,F as L,b as z,s as F,a as M}from"./inputtext.esm-af9c7539.js";import{s as I}from"./confirmdialog.esm-a2dedb11.js";import{D as O}from"./dialogservice.esm-70a0315e.js";import{s as G}from"./toast.esm-d0b492e3.js";import{s as j}from"./progressspinner.esm-bd35d97e.js";import{s as Q}from"./row.esm-6ebc942e.js";import{s as W}from"./columngroup.esm-9dd1458e.js";import{s as H}from"./calendar.esm-33ace8dc.js";import{s as K}from"./textarea.esm-fce136d8.js";import{s as Y}from"./chips.esm-095b14c5.js";import{s as J}from"./multiselect.esm-a7c442bb.js";import{a as g}from"./index-f7a317fc.js";const X={__name:"client_list",setup(_){const e=x([]);return y(()=>{g.get("/vmt-clients-fetchall").then(d=>{console.log(d.data),e.value=d.data})}),(d,m)=>{const r=u("Column"),t=u("DataTable");return c(),p(f,null,[i(t,{ref:"dt",value:e.value,dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:v(()=>[i(r,{header:"Client Code",field:"client_code",style:{"min-width":"8rem"}}),i(r,{field:"client_name",header:"Client Name",style:{"min-width":"12rem"}}),i(r,{field:"authorised_person_contact_number",header:"Contact ",style:{"min-width":"12rem"}}),i(r,{field:"authorised_person_contact_email",header:"Email",style:{"min-width":"12rem"}}),i(r,{field:"contract_start_date",header:"Contract End Date",style:{"min-width":"12rem"}}),i(r,{field:"contract_end_date",header:"Contract End Date",style:{"min-width":"12rem"}}),i(r,{field:"subscription_type",header:"Subscription Type'",style:{"min-width":"12rem"}})]),_:1},8,["value"]),C(" "+P(e.value),1)],64)}}},Z={class:"my-4 shadow card profile-box card-top-border"},oo={class:"mb-2 card-body justify-content-center align-items-center"},eo={class:"p-2 my-4 form-card"},to={class:"mt-1 row"},lo={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},ao={class:"floating"},so=o("label",{for:"",class:"float-label"},"Client Code",-1),no={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},ro={class:"floating"},io=o("label",{for:"",class:"float-label"},"Legal Name of the Company",-1),co={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},po={class:"floating"},_o=o("label",{for:"",class:"float-label"},"Contract Start Date",-1),mo={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},uo={class:"floating"},bo=o("label",{for:"",class:"float-label"},"Contract End Date",-1),fo={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},ho={class:"floating"},go=o("label",{for:"",class:"float-label"},"Company Identification Number",-1),xo=o("label",{class:"error cin_no_label",for:"cin_no",style:{display:"none"}},null,-1),yo={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},vo={class:"floating"},Co=o("label",{for:"",class:"float-label"},"Company TAN",-1),Po=o("label",{class:"error com_tan_label",for:"com_tan",style:{display:"none"}},null,-1),So={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},wo={class:"floating"},Bo=o("label",{for:"",class:"float-label"},"Company PAN",-1),No=o("label",{class:"error com_pan_label",for:"com_pan",style:{display:"none"}},null,-1),Vo=o("span",{id:"pan_err",style:{display:"none",color:"darkred"},class:"text-danger"}," Please Enter Valid Pan Number",-1),To={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Do={class:"floating"},Ao=o("label",{for:"",class:"float-label"},"GST No",-1),qo=o("label",{class:"error gst_no_label",for:"gst_no",style:{display:"none"}},null,-1),Ro={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},$o={class:"floating"},Uo=o("label",{for:"",class:"float-label"},"EPF Registration Number",-1),Eo=o("label",{class:"error epf_label",for:"epf",style:{display:"none"}},null,-1),ko={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Lo={class:"floating"},zo=o("label",{for:"",class:"float-label"},"ESIC Registration Number",-1),Fo=o("label",{class:"error esic_label",for:"esic",style:{display:"none"}},null,-1),Mo={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Io={class:"floating"},Oo=o("label",{for:"",class:"float-label"},"Professional Tax Registration Number",-1),Go=o("label",{class:"error professional_tax_label",for:"professional_tax",style:{display:"none"}},null,-1),jo={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Qo={class:"floating"},Wo=o("label",{for:"",class:"float-label"},"LWF Registration Number",-1),Ho=o("label",{class:"error lwf_label",for:"lwf",style:{display:"none"}},null,-1),Ko={class:"shadow card profile-box card-top-border"},Yo={class:"card-body justify-content-center align-items-center"},Jo={class:"p-2 mb-2 form-card"},Xo=o("div",{class:"text-primary header-card-text"},[o("h6",null,"Authorized Details")],-1),Zo={class:"mt-1 row"},oe={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},ee={class:"floating"},te=o("label",{for:"",class:"float-label"},"Authorized Person Name",-1),le=o("label",{class:"error auth_person_name_label",for:"auth_person_name",style:{display:"none"}},null,-1),ae={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},se={class:"floating"},ne=o("label",{for:"",class:"float-label"},"Authorized Person Designation",-1),re=o("label",{class:"error auth_person_desig_label",for:"auth_person_desig",style:{display:"none"}},null,-1),ie={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},de={class:"floating"},ce=o("label",{for:"",class:"float-label"},"Authorized Person Contact Number",-1),pe={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},_e={class:"floating"},me=o("label",{for:"",class:"float-label"},"Authorized Person Contact Email",-1),ue={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},be={class:"floating"},fe=o("label",{for:"",class:"float-label"},"Billing Address",-1),he={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},ge={class:"floating"},xe=o("label",{for:"",class:"float-label"},"Shipping Address",-1),ye={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},ve={class:"floating"},Ce=o("label",{for:"",class:"float-label"},"Select Product",-1),Pe=h('<option value="" class="text-muted" hidden selected disabled> Select Product</option><option value="Recruitment">Recruitment</option><option value="Payroll">Payroll</option><option value="Statutory Complainces">Statutory Complainces</option><option value="Staffing">Staffing</option><option value="PMS">PMS</option><option value="Accounting">Accounting</option><option value="ROC Complainces">ROC Complainces</option><option value="Trade Mark">Trade Mark</option><option value="Patent Right">Patent Right</option>',10),Se=[Pe],we={class:"mb-2 col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 dashBoard"},Be={class:"floating"},Ne=o("label",{for:"",class:"float-label"},"Subscription Type",-1),Ve=h('<option value="" disabled selected hidden>Select Subscription Type </option><option value="Monthly">Monthly</option><option value="Quarterly">Quarterly</option><option value="BiAnnually">BiAnnually</option><option value="Annually">Annually</option>',5),Te=[Ve],De={class:"mb-2 col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 dashBoard"},Ae=o("label",{for:"",class:"float-label"},"Document ",-1),qe={__name:"client_onboarding",setup(_){const e=S({client_code:"",client_name:"",contract_start_date:"",contract_end_date:"",cin_number:"",company_tan:"",company_pan:"",gst_no:"",epf_reg_number:"",esic_reg_number:"",prof_tax_reg_number:"",lwf_reg_number:"",authorised_person_name:"",authorised_person_designation:"",authorised_person_contact_number:"",authorised_person_contact_mail:"",billing_address:"",shipping_address:"",subscription_type:"",doc_uploads:""}),d=()=>{const r={headers:{"content-type":"multipart/form-data"}};let t=new FormData;t.append("client_name",e.client_name),t.append("client_code",e.client_code),t.append("contract_start_date",e.contract_start_date),t.append("contract_end_date",e.contract_end_date),t.append("cin_number",e.cin_number),t.append("company_tan",e.company_tan),t.append("company_pan",e.company_pan),t.append("gst_no",e.gst_no),t.append("epf_reg_number",e.epf_reg_number),t.append("esic_reg_number",e.esic_reg_number),t.append("prof_tax_reg_number",e.prof_tax_reg_number),t.append("lwf_reg_number",e.lwf_reg_number),t.append("authorised_person_name",e.authorised_person_name),t.append("authorised_person_designation",e.authorised_person_designation),t.append("authorised_person_contact_number",e.authorised_person_contact_number),t.append("billing_address",e.billing_address),t.append("shipping_address",e.shipping_address),t.append("doc_uploads",e.doc_uploads),t.append("subscription_type",e.subscription_type),console.log(t),g.post("vmt_clientOnboarding",t,r).then(l=>{console.log("onboarding successfully")}).catch(l=>console.log(l)).finally(()=>{console.log("axios completed")})},m=r=>{r.target.files&&r.target.files[0]&&(e.doc_uploads=r.target.files[0],console.log(e.doc_uploads))};return(r,t)=>(c(),p(f,null,[o("div",Z,[o("div",oo,[o("div",eo,[o("div",to,[o("div",lo,[o("div",ao,[so,s(o("input",{type:"text",placeholder:"Client Code",name:"client_code",class:"onboard-form form-control textbox",required:"","onUpdate:modelValue":t[0]||(t[0]=l=>e.client_code=l)},null,512),[[n,e.client_code]])])]),o("div",no,[o("div",ro,[io,s(o("input",{type:"text",placeholder:"Legal Name of the Company",name:"client_name",id:"client_name",class:"onboard-form form-control textbox","onUpdate:modelValue":t[1]||(t[1]=l=>e.client_name=l),required:""},null,512),[[n,e.client_name]])])]),o("div",co,[o("div",po,[_o,s(o("input",{type:"text",max:"9999-12-31",placeholder:"Contract Start Date",name:"csd",class:"onboard-form form-control textbox",onfocus:"(this.type='date')",required:"","onUpdate:modelValue":t[2]||(t[2]=l=>e.contract_start_date=l)},null,512),[[n,e.contract_start_date]])])]),o("div",mo,[o("div",uo,[bo,s(o("input",{type:"text",max:"9999-12-31",placeholder:"Contract End Date",name:"ced",class:"onboard-form form-control textbox",onfocus:"(this.type='date')",required:"","onUpdate:modelValue":t[3]||(t[3]=l=>e.contract_end_date=l)},null,512),[[n,e.contract_end_date]])])]),o("div",fo,[o("div",ho,[go,s(o("input",{type:"text",placeholder:"Company Identification Number",name:"cin_no",class:"onboard-form form-control textbox",pattern:"alp-num",required:"","onUpdate:modelValue":t[4]||(t[4]=l=>e.cin_number=l)},null,512),[[n,e.cin_number]]),xo])]),o("div",yo,[o("div",vo,[Co,s(o("input",{type:"text",placeholder:"Company TAN",name:"com_tan",class:"onboard-form form-control textbox",pattern:"alp-num","onUpdate:modelValue":t[5]||(t[5]=l=>e.company_tan=l),required:""},null,512),[[n,e.company_tan]]),Po])]),o("div",So,[o("div",wo,[Bo,s(o("input",{type:"text",placeholder:"Company PAN",name:"com_pan",id:"com_pan",class:"onboard-form form-control textbox",pattern:"alp-num",required:"","onUpdate:modelValue":t[6]||(t[6]=l=>e.company_pan=l)},null,512),[[n,e.company_pan]]),No,Vo])]),o("div",To,[o("div",Do,[Ao,s(o("input",{type:"text",placeholder:"GST No",name:"gst_no",class:"onboard-form form-control textbox",pattern:"gst",required:"","onUpdate:modelValue":t[7]||(t[7]=l=>e.gst_no=l)},null,512),[[n,e.gst_no]]),qo])]),o("div",Ro,[o("div",$o,[Uo,s(o("input",{type:"text",placeholder:"EPF Registration Number",name:"epf",class:"onboard-form form-control textbox",pattern:"alp-num","onUpdate:modelValue":t[8]||(t[8]=l=>e.epf_reg_number=l),required:""},null,512),[[n,e.epf_reg_number]]),Eo])]),o("div",ko,[o("div",Lo,[zo,s(o("input",{type:"text",placeholder:"ESIC Registration Number",name:"esic",class:"onboard-form form-control textbox",pattern:"alp-num",required:"","onUpdate:modelValue":t[9]||(t[9]=l=>e.esic_reg_number=l)},null,512),[[n,e.esic_reg_number]]),Fo])]),o("div",Mo,[o("div",Io,[Oo,s(o("input",{type:"text",placeholder:"Professional Tax Registration Number",name:"professional_tax",class:"onboard-form form-control textbox",pattern:"alp-num",required:"","onUpdate:modelValue":t[10]||(t[10]=l=>e.prof_tax_reg_number=l)},null,512),[[n,e.prof_tax_reg_number]]),Go])]),o("div",jo,[o("div",Qo,[Wo,s(o("input",{type:"text",placeholder:"LWF Registration Number",name:"lwf","onUpdate:modelValue":t[11]||(t[11]=l=>e.lwf_reg_number=l),class:"onboard-form form-control textbox",pattern:"alp-num",required:""},null,512),[[n,e.lwf_reg_number]]),Ho])])])])])]),o("div",Ko,[o("div",Yo,[o("div",Jo,[Xo,o("div",Zo,[o("div",oe,[o("div",ee,[te,s(o("input",{type:"text",placeholder:"Authorized Person Name",name:"auth_person_name",class:"onboard-form form-control textbox",pattern:"alpha",required:"","onUpdate:modelValue":t[12]||(t[12]=l=>e.authorised_person_name=l)},null,512),[[n,e.authorised_person_name]]),le])]),o("div",ae,[o("div",se,[ne,s(o("input",{type:"text",placeholder:"Authorized Person Designation",name:"auth_person_desig",class:"onboard-form form-control textbox",pattern:"alpha",required:"","onUpdate:modelValue":t[13]||(t[13]=l=>e.authorised_person_designation=l)},null,512),[[n,e.authorised_person_designation]]),re])]),o("div",ie,[o("div",de,[ce,s(o("input",{type:"number",minlength:"10",maxlength:"10",placeholder:"Authorized Person Contact Number",name:"auth_person_contact",class:"onboard-form form-control textbox",required:"","onUpdate:modelValue":t[14]||(t[14]=l=>e.authorised_person_contact_number=l)},null,512),[[n,e.authorised_person_contact_number]])])]),o("div",pe,[o("div",_e,[me,s(o("input",{type:"email",placeholder:"Authorized Person Contact Email",name:"auth_person_email",class:"onboard-form form-control textbox",required:"","onUpdate:modelValue":t[15]||(t[15]=l=>e.authorised_person_contact_email=l)},null,512),[[n,e.authorised_person_contact_email]])])]),o("div",ue,[o("div",be,[fe,s(o("input",{type:"text",placeholder:"Billing Address",name:"billing_add",class:"onboard-form form-control textbox",required:"","onUpdate:modelValue":t[16]||(t[16]=l=>e.billing_address=l)},null,512),[[n,e.billing_address]])])]),o("div",he,[o("div",ge,[xe,s(o("input",{type:"text",placeholder:"Shipping Address",name:"shipping_add",class:"onboard-form form-control textbox",required:"","onUpdate:modelValue":t[17]||(t[17]=l=>e.shipping_address=l)},null,512),[[n,e.shipping_address]])])]),o("div",ye,[o("div",ve,[Ce,s(o("select",{placeholder:"Product",name:"product",id:"product",class:"form-select onboard-form form-control",required:"","onUpdate:modelValue":t[18]||(t[18]=l=>e.product=l)},Se,512),[[b,e.product]])])]),o("div",we,[o("div",Be,[Ne,s(o("select",{placeholder:"Subscription Type",name:"subscription_type",id:"subscription_type","onUpdate:modelValue":t[19]||(t[19]=l=>e.subscription_type=l),class:"form-select form-control","aria-label":"",required:""},Te,512),[[b,e.subscription_type]])])]),o("div",De,[Ae,o("input",{onChange:t[20]||(t[20]=l=>m(l)),type:"file",placeholder:"Documents Upload",class:"onboard-form form-control textbox",required:"",accept:".doc,.docx,.pdf,image/*"},null,32)]),o("div",{class:"text-right col-12"},[o("button",{type:"button",onClick:d,class:"text-center btn btn-orange",value:"Submit"},"Submit")])])])])])],64))}},Re={class:"client-onboard-wrapper mt-30"},$e=o("div",{class:"mb-2 card left-line"},[o("div",{class:"pt-1 pb-0 card-body"},[o("ul",{class:"nav nav-pills nav-tabs-dashed",id:"pills-tab",role:"tablist"},[o("li",{class:"nav-item me-5",role:"presentation"},[o("a",{class:"nav-link active",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#client-list",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Client List ")]),o("li",{class:"nav-item",role:"presentation"},[o("a",{class:"nav-link",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#client-onboarding",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Client Onboarding ")])])])],-1),Ue={class:"tab-content",id:"pills-tabContent"},Ee={class:"tab-pane fade active show",id:"client-list",role:"tabpanel","aria-labelledby":""},ke={class:"tab-pane fade",id:"client-onboarding",role:"tabpanel","aria-labelledby":""},Le={__name:"client_onboarding_master",setup(_){return(e,d)=>(c(),p("div",Re,[$e,o("div",Ue,[o("div",Ee,[i(X)]),o("div",ke,[i(qe)])])]))}},a=w(Le),ze=D();a.use(B,{ripple:!0});a.use(k);a.use(N);a.use(O);a.use(ze);a.directive("tooltip",A);a.directive("badge",q);a.directive("ripple",V);a.directive("styleclass",R);a.directive("focustrap",L);a.component("Button",T);a.component("DataTable",$);a.component("Column",U);a.component("ColumnGroup",W);a.component("Row",Q);a.component("Toast",G);a.component("ConfirmDialog",I);a.component("Dropdown",z);a.component("InputText",F);a.component("Dialog",M);a.component("ProgressSpinner",j);a.component("Calendar",H);a.component("Textarea",K);a.component("Chips",Y);a.component("MultiSelect",J);a.component("InputNumber",E);a.mount("#clientOnboarding");
