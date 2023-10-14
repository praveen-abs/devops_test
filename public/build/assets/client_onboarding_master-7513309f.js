import{a as P}from"./index-362795f3.js";import{r as k,o as T,c as y,e as r,k as F,l as $,n as b,x as L,z as E,s as z,f as n,g as e,w as p,v as m,p as d,h as l,t as i,j as c,a8 as w,F as M,B as q}from"./app-052ddeba.js";import{r as _,u as I}from"./index.esm-76e75368.js";const O={__name:"client_list",setup(C){const h=k([]);return T(()=>{P.get("/clients-fetchAll").then(o=>{console.log(o.data),h.value=o.data})}),(o,x)=>{const g=y("Column"),s=y("DataTable");return r(),F(s,{ref:"dt",value:h.value,dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:$(()=>[b(g,{header:"Client Code",field:"client_code",style:{"min-width":"8rem"}}),b(g,{field:"client_name",header:"Client Name",style:{"min-width":"12rem"}}),b(g,{field:"authorised_person_contact_number",header:"Contact ",style:{"min-width":"12rem"}}),b(g,{field:"authorised_person_contact_email",header:"Email",style:{"min-width":"12rem"}}),b(g,{field:"contract_start_date",header:"Contract End Date",style:{"min-width":"12rem"}}),b(g,{field:"contract_end_date",header:"Contract End Date",style:{"min-width":"12rem"}}),b(g,{field:"subscription_type",header:"Subscription Type'",style:{"min-width":"12rem"}})]),_:1},8,["value"])}}};const j={class:"my-4 shadow card profile-box card-top-border"},K={class:"mb-2 card-body justify-content-center align-items-center"},W={class:"p-2 my-4 form-card"},G={class:"mt-1 row"},Q={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},H={class:"floating"},Z=e("label",{for:"",class:"float-label"},"Client Code",-1),J={key:0,class:"font-semibold text-red-400 fs-6"},X={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Y={class:"floating"},ee=e("label",{for:"",class:"float-label"},"Legal Name of the Company",-1),oe={key:0,class:"font-semibold text-red-400 fs-6"},te={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},se={class:"floating"},le=e("label",{for:"",class:"float-label"},"Contract Start Date",-1),ae={key:0,class:"font-semibold text-red-400 fs-6"},re={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},ne={class:"floating"},de=e("label",{for:"",class:"float-label"},"Contract End Date",-1),ie={key:0,class:"font-semibold text-red-400 fs-6"},ce={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},_e={class:"floating"},pe=e("label",{for:"",class:"float-label"},"Company Identification Number",-1),me={key:0,class:"font-semibold text-red-400 fs-6"},ue=e("label",{class:"error cin_no_label",for:"cin_no",style:{display:"none"}},null,-1),be={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},fe={class:"floating"},ge=e("label",{for:"",class:"float-label"},"Company TAN",-1),he={key:0,class:"font-semibold text-red-400 fs-6"},ye=e("label",{class:"error com_tan_label",for:"com_tan",style:{display:"none"}},null,-1),xe={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},ve={class:"floating"},$e=e("label",{for:"",class:"float-label"},"Company PAN",-1),Ce={key:0,class:"font-semibold text-red-400 fs-6"},Ve=e("label",{class:"error com_pan_label",for:"com_pan",style:{display:"none"}},null,-1),we=e("span",{id:"pan_err",style:{display:"none",color:"darkred"},class:"text-danger"}," Please Enter Valid Pan Number",-1),Pe={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},ke={class:"floating"},qe=e("label",{for:"",class:"float-label"},"GST No",-1),Se={key:0,class:"font-semibold text-red-400 fs-6"},Ne=e("label",{class:"error gst_no_label",for:"gst_no",style:{display:"none"}},null,-1),Be={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Ae={class:"floating"},De=e("label",{for:"",class:"float-label"},"EPF Registration Number",-1),Re={key:0,class:"font-semibold text-red-400 fs-6"},Ue=e("label",{class:"error epf_label",for:"epf",style:{display:"none"}},null,-1),Te={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Fe={class:"floating"},Le=e("label",{for:"",class:"float-label"},"ESIC Registration Number",-1),Ee={key:0,class:"font-semibold text-red-400 fs-6"},ze=e("label",{class:"error esic_label",for:"esic",style:{display:"none"}},null,-1),Me={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Ie={class:"floating"},Oe=e("label",{for:"",class:"float-label"},"Professional Tax Registration Number",-1),je={key:0,class:"font-semibold text-red-400 fs-6"},Ke=e("label",{class:"error professional_tax_label",for:"professional_tax",style:{display:"none"}},null,-1),We={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Ge={class:"floating"},Qe=e("label",{for:"",class:"float-label"},"LWF Registration Number",-1),He={key:0,class:"font-semibold text-red-400 fs-6"},Ze=e("label",{class:"error lwf_label",for:"lwf",style:{display:"none"}},null,-1),Je={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Xe={class:"floating"},Ye=e("label",{for:"",class:"float-label"},"ABS Client Code",-1),eo={key:0,class:"font-semibold text-red-400 fs-6"},oo=e("label",{class:"error lwf_label",for:"lwf",style:{display:"none"}},null,-1),to={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},so={class:"floating"},lo=e("label",{for:"",class:"float-label"},"Client Full Name",-1),ao={key:0,class:"font-semibold text-red-400 fs-6"},ro=e("label",{class:"error lwf_label",for:"lwf",style:{display:"none"}},null,-1),no={class:"mb-2 col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 dashBoard"},io=e("label",{for:"",class:"float-label"},"Client Logo ",-1),co={class:"mb-3"},_o={key:0,class:"font-semibold text-red-400 fs-6"},po={class:"shadow card profile-box card-top-border"},mo={class:"card-body justify-content-center align-items-center"},uo={class:"p-2 mb-2 form-card"},bo=e("div",{class:"text-primary header-card-text"},[e("h6",null,"Authorized Details")],-1),fo={class:"mt-1 row"},go={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},ho={class:"floating"},yo=e("label",{for:"",class:"float-label"},"Authorized Person Name",-1),xo={key:0,class:"font-semibold text-red-400 fs-6"},vo=e("label",{class:"error auth_person_name_label",for:"auth_person_name",style:{display:"none"}},null,-1),$o={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Co={class:"floating"},Vo=e("label",{for:"",class:"float-label"},"Authorized Person Designation",-1),wo={key:0,class:"font-semibold text-red-400 fs-6"},Po=e("label",{class:"error auth_person_desig_label",for:"auth_person_desig",style:{display:"none"}},null,-1),ko={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},qo={class:"floating"},So=e("label",{for:"",class:"float-label"},"Authorized Person Contact Number",-1),No={key:0,class:"font-semibold text-red-400 fs-6"},Bo={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Ao={class:"floating"},Do=e("label",{for:"",class:"float-label"},"Authorized Person Contact Email",-1),Ro={key:0,class:"font-semibold text-red-400 fs-6"},Uo={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},To={class:"floating"},Fo=e("label",{for:"",class:"float-label"},"Billing Address",-1),Lo={key:0,class:"font-semibold text-red-400 fs-6"},Eo={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},zo={class:"floating"},Mo=e("label",{for:"",class:"float-label"},"Shipping Address",-1),Io={key:0,class:"font-semibold text-red-400 fs-6"},Oo={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},jo={class:"floating"},Ko=e("label",{for:"",class:"float-label"},"Select Product",-1),Wo=q('<option value="" class="text-muted" hidden selected disabled> Select Product</option><option value="Recruitment">Recruitment</option><option value="Payroll">Payroll</option><option value="Statutory Complainces">Statutory Complainces</option><option value="Staffing">Staffing</option><option value="PMS">PMS</option><option value="Accounting">Accounting</option><option value="ROC Complainces">ROC Complainces</option><option value="Trade Mark">Trade Mark</option><option value="Patent Right">Patent Right</option>',10),Go=[Wo],Qo={key:0,class:"font-semibold text-red-400 fs-6"},Ho={class:"mb-2 col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 dashBoard"},Zo={class:"floating"},Jo=e("label",{for:"",class:"float-label"},"Subscription Type",-1),Xo=q('<option value="" disabled selected hidden>Select Subscription Type </option><option value="Monthly">Monthly</option><option value="Quarterly">Quarterly</option><option value="BiAnnually">BiAnnually</option><option value="Annually">Annually</option>',5),Yo=[Xo],et={key:0,class:"font-semibold text-red-400 fs-6"},ot={class:"mb-2 col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 dashBoard"},tt=e("label",{for:"",class:"float-label"},"Document ",-1),st={class:"mb-3"},lt={key:0,class:"font-semibold text-red-400 fs-6"},at=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),rt={__name:"client_onboarding",setup(C){L("$swal");const h=k(!1),o=E({client_code:"",client_name:"",contract_start_date:"",contract_end_date:"",cin_number:"",company_tan:"",company_pan:"",product:"",gst_no:"",epf_reg_number:"",esic_reg_number:"",prof_tax_reg_number:"",lwf_reg_number:"",abs_client_code:"",client_full_name:"",client_logo:"",authorised_person_name:"",authorised_person_designation:"",authorised_person_contact_number:"",authorised_person_contact_mail:"",billing_address:"",shipping_address:"",subscription_type:"",doc_uploads:""}),x=()=>{o.client_code="",o.client_name="",o.contract_start_date="",o.contract_end_date="",o.cin_number="",o.company_tan="",o.company_pan="",o.product="",o.gst_no="",o.epf_reg_number="",o.esic_reg_number="",o.prof_tax_reg_number="",o.lwf_reg_number="",o.abs_client_code="",o.client_full_name="",o.client_logo="",o.authorised_person_name="",o.authorised_person_designation="",o.authorised_person_contact_number="",o.authorised_person_contact_mail="",o.billing_address="",o.shipping_address="",o.subscription_type="",o.doc_uploads=""},g=z(()=>({client_code:{required:_},client_name:{required:_},contract_start_date:{required:_},contract_end_date:{required:_},cin_number:{required:_},company_tan:{required:_},company_pan:{required:_},gst_no:{required:_},epf_reg_number:{required:_},esic_reg_number:{required:_},prof_tax_reg_number:{required:_},lwf_reg_number:{required:_},abs_client_code:{required:_},client_full_name:{required:_},client_logo:{required:_},authorised_person_name:{required:_},authorised_person_designation:{required:_},authorised_person_contact_number:{required:_},authorised_person_contact_mail:{required:_},billing_address:{required:_},shipping_address:{required:_},subscription_type:{required:_},doc_uploads:{required:_},product:{required:_}})),s=I(g,o),S=()=>{console.log(s.value),s.value.$validate(),s.value.$error?console.log("Form failed validation"):(console.log("Form successfully submitted."),N(),s.value.$reset())},N=()=>{h.value=!0;const u={headers:{"content-type":"multipart/form-data"}};let t=new FormData;t.append("client_name",o.client_name),t.append("client_code",o.client_code),t.append("contract_start_date",o.contract_start_date),t.append("contract_end_date",o.contract_end_date),t.append("cin_number",o.cin_number),t.append("company_tan",o.company_tan),t.append("company_pan",o.company_pan),t.append("gst_no",o.gst_no),t.append("epf_reg_number",o.epf_reg_number),t.append("esic_reg_number",o.esic_reg_number),t.append("prof_tax_reg_number",o.prof_tax_reg_number),t.append("lwf_reg_number",o.lwf_reg_number),t.append("abs_client_code",o.abs_client_code),t.append("client_full_name",o.client_full_name),t.append("client_logo",o.client_logo),t.append("authorised_person_name",o.authorised_person_name),t.append("authorised_person_designation",o.authorised_person_designation),t.append("authorised_person_contact_number",o.authorised_person_contact_number),t.append("authorised_person_contact_email",o.authorised_person_contact_mail),t.append("billing_address",o.billing_address),t.append("shipping_address",o.shipping_address),t.append("doc_uploads",o.doc_uploads),t.append("subscription_type",o.subscription_type),console.log(t),P.post("vmt_clientOnboarding",t,u).then(f=>{console.log("onboarding successfully"),f.data.status=="success"?Swal.fire({title:f.data.status="success",text:f.data.message,icon:"success"}).then(v=>{x()}):Swal.fire({title:f.data.status="failure",text:f.data.message,icon:"error",showCancelButton:!1}).then(v=>{x()})}).catch(f=>console.log(f)).finally(()=>{h.value=!1})},B=u=>{u.target.files&&u.target.files[0]&&(o.doc_uploads=u.target.files[0],console.log(o.doc_uploads))},A=u=>{u.target.files&&u.target.files[0]&&(o.client_logo=u.target.files[0],console.log(o.client_logo))},D=u=>{let t=String.fromCharCode(u.keyCode);if(/^[ABS{3}_CL{2} 0-9]+$/.test(t))return!0;u.preventDefault()},V=u=>{let t=String.fromCharCode(u.keyCode);if(/^[A-Za-z_ ]+$/.test(t))return!0;u.preventDefault()};return(u,t)=>{const f=y("Calendar"),v=y("InputMask"),R=y("ProgressSpinner"),U=y("Dialog");return r(),n(M,null,[e("div",j,[e("div",K,[e("div",W,[e("div",G,[e("div",Q,[e("div",H,[Z,p(e("input",{type:"text",placeholder:"Client Code",name:"client_code",class:d(["onboard-form form-control textbox",[l(s).client_code.$error?"border border-red-500":""]]),required:"","onUpdate:modelValue":t[0]||(t[0]=a=>o.client_code=a)},null,2),[[m,o.client_code]]),l(s).client_code.$error?(r(),n("span",J,i(l(s).client_code.required.$message.replace("Value","Client Code")),1)):c("",!0)])]),e("div",X,[e("div",Y,[ee,p(e("input",{type:"text",placeholder:"Legal Name of the Company",name:"client_name",id:"client_name",class:d(["onboard-form form-control textbox",[l(s).client_name.$error?"border border-red-500":""]]),"onUpdate:modelValue":t[1]||(t[1]=a=>o.client_name=a),required:""},null,2),[[m,o.client_name]]),l(s).client_name.$error?(r(),n("span",oe,i(l(s).client_name.required.$message.replace("Value","Legal Name of the Company")),1)):c("",!0)])]),e("div",te,[e("div",se,[le,b(f,{showIcon:"",required:"",class:d(["h-10 w-[250px] relative right-2",[l(s).contract_start_date.$error?"border border-red-500":""]]),modelValue:o.contract_start_date,"onUpdate:modelValue":t[2]||(t[2]=a=>o.contract_start_date=a)},null,8,["modelValue","class"]),l(s).contract_start_date.$error?(r(),n("span",ae,i(l(s).contract_start_date.required.$message.replace("Value","Contract Start Date")),1)):c("",!0)])]),e("div",re,[e("div",ne,[de,b(f,{showIcon:"",required:"",class:d(["h-10 w-[250px] relative right-2",[l(s).contract_end_date.$error?"border border-red-500":""]]),modelValue:o.contract_end_date,"onUpdate:modelValue":t[3]||(t[3]=a=>o.contract_end_date=a)},null,8,["modelValue","class"]),l(s).contract_end_date.$error?(r(),n("span",ie,i(l(s).contract_end_date.required.$message.replace("Value","Contract End Date")),1)):c("",!0)])]),e("div",ce,[e("div",_e,[pe,p(e("input",{type:"text",placeholder:"Company Identification Number",name:"cin_no",class:d(["onboard-form form-control textbox",[l(s).cin_number.$error?"border border-red-500":""]]),pattern:"alp-num",required:"","onUpdate:modelValue":t[4]||(t[4]=a=>o.cin_number=a)},null,2),[[m,o.cin_number]]),l(s).cin_number.$error?(r(),n("span",me,i(l(s).cin_number.required.$message.replace("Value","Company Identification Number")),1)):c("",!0),ue])]),e("div",be,[e("div",fe,[ge,p(e("input",{type:"text",placeholder:"Company TAN",name:"com_tan",class:d(["onboard-form form-control textbox",[l(s).company_tan.$error?"border border-red-500":""]]),pattern:"alp-num","onUpdate:modelValue":t[5]||(t[5]=a=>o.company_tan=a),required:""},null,2),[[m,o.company_tan]]),l(s).company_tan.$error?(r(),n("span",he,i(l(s).company_tan.required.$message.replace("Value","Company TAN")),1)):c("",!0),ye])]),e("div",xe,[e("div",ve,[$e,p(e("input",{type:"text",placeholder:"Company PAN",name:"com_pan",id:"com_pan",class:d(["onboard-form form-control textbox",[l(s).company_pan.$error?"border border-red-500":""]]),pattern:"alp-num",required:"","onUpdate:modelValue":t[6]||(t[6]=a=>o.company_pan=a)},null,2),[[m,o.company_pan]]),l(s).company_pan.$error?(r(),n("span",Ce,i(l(s).company_pan.required.$message.replace("Value","Company PAN")),1)):c("",!0),Ve,we])]),e("div",Pe,[e("div",ke,[qe,p(e("input",{type:"text",placeholder:"GST No",name:"gst_no",class:d(["onboard-form form-control textbox",[l(s).gst_no.$error?"border border-red-500":""]]),pattern:"gst",required:"","onUpdate:modelValue":t[7]||(t[7]=a=>o.gst_no=a)},null,2),[[m,o.gst_no]]),l(s).gst_no.$error?(r(),n("span",Se,i(l(s).gst_no.required.$message.replace("Value","GST No")),1)):c("",!0),Ne])]),e("div",Be,[e("div",Ae,[De,p(e("input",{type:"text",placeholder:"EPF Registration Number",name:"epf",class:d(["onboard-form form-control textbox",[l(s).epf_reg_number.$error?"border border-red-500":""]]),pattern:"alp-num","onUpdate:modelValue":t[8]||(t[8]=a=>o.epf_reg_number=a),required:""},null,2),[[m,o.epf_reg_number]]),l(s).epf_reg_number.$error?(r(),n("span",Re,i(l(s).epf_reg_number.required.$message.replace("Value","EPF Registration Number")),1)):c("",!0),Ue])]),e("div",Te,[e("div",Fe,[Le,p(e("input",{type:"text",placeholder:"ESIC Registration Number",name:"esic",class:d(["onboard-form form-control textbox",[l(s).esic_reg_number.$error?"border border-red-500":""]]),pattern:"alp-num",required:"","onUpdate:modelValue":t[9]||(t[9]=a=>o.esic_reg_number=a)},null,2),[[m,o.esic_reg_number]]),l(s).esic_reg_number.$error?(r(),n("span",Ee,i(l(s).esic_reg_number.required.$message.replace("Value","ESIC Registration Number")),1)):c("",!0),ze])]),e("div",Me,[e("div",Ie,[Oe,p(e("input",{type:"text",placeholder:"Professional Tax Registration Number",name:"professional_tax",class:d(["onboard-form form-control textbox",[l(s).prof_tax_reg_number.$error?"border border-red-500":""]]),pattern:"alp-num",required:"","onUpdate:modelValue":t[10]||(t[10]=a=>o.prof_tax_reg_number=a)},null,2),[[m,o.prof_tax_reg_number]]),l(s).prof_tax_reg_number.$error?(r(),n("span",je,i(l(s).prof_tax_reg_number.required.$message.replace("Value","Professional Tax Registration Number")),1)):c("",!0),Ke])]),e("div",We,[e("div",Ge,[Qe,p(e("input",{type:"text",placeholder:"LWF Registration Number",name:"lwf","onUpdate:modelValue":t[11]||(t[11]=a=>o.lwf_reg_number=a),class:d(["onboard-form form-control textbox",[l(s).lwf_reg_number.$error?"border border-red-500":""]]),pattern:"alp-num",required:""},null,2),[[m,o.lwf_reg_number]]),l(s).lwf_reg_number.$error?(r(),n("span",He,i(l(s).lwf_reg_number.required.$message.replace("Value","LWF Registration Number")),1)):c("",!0),Ze])]),e("div",Je,[e("div",Xe,[Ye,p(e("input",{type:"text",placeholder:"ABS Client Code",name:"lwf",onKeypress:t[12]||(t[12]=a=>D(a)),"onUpdate:modelValue":t[13]||(t[13]=a=>o.abs_client_code=a),class:d(["onboard-form form-control textbox",[l(s).abs_client_code.$error?"border border-red-500":""]]),pattern:"alp-num",required:""},null,34),[[m,o.abs_client_code]]),l(s).abs_client_code.$error?(r(),n("span",eo,i(l(s).abs_client_code.required.$message.replace("Value","ABS Client Code")),1)):c("",!0),oo])]),e("div",to,[e("div",so,[lo,p(e("input",{type:"text",placeholder:"Client Full Name",name:"lwf","onUpdate:modelValue":t[14]||(t[14]=a=>o.client_full_name=a),class:d(["onboard-form form-control textbox",[l(s).client_full_name.$error?"border border-red-500":""]]),pattern:"alp-num",required:""},null,2),[[m,o.client_full_name]]),l(s).client_full_name.$error?(r(),n("span",ao,i(l(s).client_full_name.required.$message.replace("Value","Client Full Name")),1)):c("",!0),ro])]),e("div",no,[io,e("div",co,[e("input",{class:d(["form-control",[l(s).client_logo.$error?"border border-red-500":""]]),onChange:t[15]||(t[15]=a=>A(a)),type:"file",id:"formFile",accept:".doc,.docx,.pdf,image/*"},null,34),l(s).client_logo.$error?(r(),n("span",_o,i(l(s).client_logo.required.$message.replace("Value","Document")),1)):c("",!0)])])])])])]),e("div",po,[e("div",mo,[e("div",uo,[bo,e("div",fo,[e("div",go,[e("div",ho,[yo,p(e("input",{type:"text",placeholder:"Authorized Person Name",onKeypress:t[16]||(t[16]=a=>V(a)),name:"auth_person_name",class:d(["onboard-form form-control textbox",[l(s).authorised_person_name.$error?"border border-red-500":""]]),pattern:"alpha",required:"","onUpdate:modelValue":t[17]||(t[17]=a=>o.authorised_person_name=a)},null,34),[[m,o.authorised_person_name]]),l(s).authorised_person_name.$error?(r(),n("span",xo,i(l(s).authorised_person_name.required.$message.replace("Value","Authorized Person Name")),1)):c("",!0),vo])]),e("div",$o,[e("div",Co,[Vo,p(e("input",{type:"text",onKeypress:t[18]||(t[18]=a=>V(a)),placeholder:"Authorized Person Designation",name:"auth_person_desig",class:d(["onboard-form form-control",[l(s).authorised_person_designation.$error?"border border-red-500":""]]),pattern:"alpha",required:"","onUpdate:modelValue":t[19]||(t[19]=a=>o.authorised_person_designation=a)},null,34),[[m,o.authorised_person_designation]]),l(s).authorised_person_designation.$error?(r(),n("span",wo,i(l(s).authorised_person_designation.required.$message.replace("Value","Authorized Person Designation")),1)):c("",!0),Po])]),e("div",ko,[e("div",qo,[So,b(v,{class:d(["h-10",[l(s).authorised_person_contact_number.$error?"border border-red-500":""]]),id:"basic",mask:"9999999999",placeholder:"999999999",modelValue:o.authorised_person_contact_number,"onUpdate:modelValue":t[20]||(t[20]=a=>o.authorised_person_contact_number=a)},null,8,["modelValue","class"]),l(s).authorised_person_contact_number.$error?(r(),n("span",No,i(l(s).authorised_person_contact_number.required.$message.replace("Value","Authorized Person Contact Number")),1)):c("",!0)])]),e("div",Bo,[e("div",Ao,[Do,p(e("input",{type:"email",placeholder:"Authorized Person Contact Email",name:"auth_person_email",class:d(["onboard-form form-control textbox",[l(s).authorised_person_contact_mail.$error?"border border-red-500":""]]),required:"","onUpdate:modelValue":t[21]||(t[21]=a=>o.authorised_person_contact_mail=a)},null,2),[[m,o.authorised_person_contact_mail]]),l(s).authorised_person_contact_mail.$error?(r(),n("span",Ro,i(l(s).authorised_person_contact_mail.required.$message.replace("Value","Authorized Person Contact Email")),1)):c("",!0)])]),e("div",Uo,[e("div",To,[Fo,p(e("input",{type:"text",placeholder:"Billing Address",name:"billing_add",class:d(["onboard-form form-control textbox",[l(s).billing_address.$error?"border border-red-500":""]]),required:"","onUpdate:modelValue":t[22]||(t[22]=a=>o.billing_address=a)},null,2),[[m,o.billing_address]]),l(s).billing_address.$error?(r(),n("span",Lo,i(l(s).billing_address.required.$message.replace("Value","Billing Address")),1)):c("",!0)])]),e("div",Eo,[e("div",zo,[Mo,p(e("input",{type:"text",placeholder:"Shipping Address",name:"shipping_add",class:d(["onboard-form form-control textbox",[l(s).shipping_address.$error?"border border-red-500":""]]),required:"","onUpdate:modelValue":t[23]||(t[23]=a=>o.shipping_address=a)},null,2),[[m,o.shipping_address]]),l(s).shipping_address.$error?(r(),n("span",Io,i(l(s).shipping_address.required.$message.replace("Value","Shipping Address")),1)):c("",!0)])]),e("div",Oo,[e("div",jo,[Ko,p(e("select",{placeholder:"Product",name:"product",id:"product",class:d(["form-select onboard-form form-control",[l(s).product.$error?"border border-red-500":""]]),required:"","onUpdate:modelValue":t[24]||(t[24]=a=>o.product=a)},Go,2),[[w,o.product]]),l(s).product.$error?(r(),n("span",Qo,i(l(s).product.required.$message.replace("Value","Select Product")),1)):c("",!0)])]),e("div",Ho,[e("div",Zo,[Jo,p(e("select",{placeholder:"Subscription Type",name:"subscription_type",id:"subscription_type","onUpdate:modelValue":t[25]||(t[25]=a=>o.subscription_type=a),class:d(["form-select form-control",[l(s).subscription_type.$error?"border border-red-500":""]]),"aria-label":"",required:""},Yo,2),[[w,o.subscription_type]]),l(s).subscription_type.$error?(r(),n("span",et,i(l(s).subscription_type.required.$message.replace("Value","Subscription Type")),1)):c("",!0)])]),e("div",ot,[tt,e("div",st,[e("input",{class:d(["form-control",[l(s).doc_uploads.$error?"border border-red-500":""]]),onChange:t[26]||(t[26]=a=>B(a)),type:"file",id:"formFile",accept:".doc,.docx,.pdf,image/*"},null,34),l(s).doc_uploads.$error?(r(),n("span",lt,i(l(s).doc_uploads.required.$message.replace("Value","Document")),1)):c("",!0)])]),e("div",{class:"text-right col-12"},[e("button",{type:"button",onClick:S,class:"text-center btn btn-orange",value:"Submit"},"Submit")])])])])]),b(U,{header:"Header",visible:h.value,"onUpdate:visible":t[27]||(t[27]=a=>h.value=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:$(()=>[b(R,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:$(()=>[at]),_:1},8,["visible"])],64)}}},nt={class:"client-onboard-wrapper"},dt=e("div",{class:"mb-2 card left-line"},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"nav nav-pills nav-tabs-dashed",id:"pills-tab",role:"tablist"},[e("li",{class:"nav-item me-5",role:"presentation"},[e("a",{class:"nav-link active",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#client-list",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Client List ")]),e("li",{class:"nav-item",role:"presentation"},[e("a",{class:"nav-link",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#client-onboarding",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Client Onboarding ")])])])],-1),it={class:"tab-content",id:"pills-tabContent"},ct={class:"tab-pane fade active show",id:"client-list",role:"tabpanel","aria-labelledby":""},_t={class:"card"},pt={class:"card-body"},mt={class:"table-responsive"},ut={class:"tab-pane fade",id:"client-onboarding",role:"tabpanel","aria-labelledby":""},ht={__name:"client_onboarding_master",setup(C){return(h,o)=>(r(),n("div",nt,[dt,e("div",it,[e("div",ct,[e("div",_t,[e("div",pt,[e("div",mt,[b(O)])])])]),e("div",ut,[b(rt)])])]))}};export{ht as default};
