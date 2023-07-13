import{G as S,H as A,g as y,o as l,b as B,w as v,h as b,$ as D,a1 as T,af as R,c as i,d as e,k as m,E as u,n as d,a2 as r,t as c,a as _,am as P,F as U,a4 as V,I as E,P as L,J as F,R as z,u as M,v as I,N as O,K as G,M as W,A as j,L as H}from"./toastservice.esm-ed3188be.js";import{c as K}from"./pinia-503c53ce.js";import{T as Q,B as J,S as X,b as Y,a as Z,c as ee}from"./styleclass.esm-6ed4e4b9.js";import"./blockui.esm-244d5d2b.js";import{D as oe}from"./dialogservice.esm-dbd866ef.js";import{C as te}from"./confirmationservice.esm-890ba1ea.js";import{s as se}from"./progressspinner.esm-db4b8f96.js";import{s as re}from"./row.esm-6ebc942e.js";import{s as ae}from"./columngroup.esm-9dd1458e.js";import{s as ne}from"./calendar.esm-21345d6f.js";import{s as le}from"./textarea.esm-a3e09931.js";import{s as ie}from"./chips.esm-03c88f3f.js";import{s as de}from"./multiselect.esm-8318a143.js";import{a as w}from"./index-362795f3.js";import{r as p,u as ce}from"./index.esm-a59c3c7b.js";const _e={__name:"client_list",setup($){const f=S([]);return A(()=>{w.get("/clients-fetchAll").then(t=>{console.log(t.data),f.value=t.data})}),(t,C)=>{const o=y("Column"),x=y("DataTable");return l(),B(x,{ref:"dt",value:f.value,dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:v(()=>[b(o,{header:"Client Code",field:"client_code",style:{"min-width":"8rem"}}),b(o,{field:"client_name",header:"Client Name",style:{"min-width":"12rem"}}),b(o,{field:"authorised_person_contact_number",header:"Contact ",style:{"min-width":"12rem"}}),b(o,{field:"authorised_person_contact_email",header:"Email",style:{"min-width":"12rem"}}),b(o,{field:"contract_start_date",header:"Contract End Date",style:{"min-width":"12rem"}}),b(o,{field:"contract_end_date",header:"Contract End Date",style:{"min-width":"12rem"}}),b(o,{field:"subscription_type",header:"Subscription Type'",style:{"min-width":"12rem"}})]),_:1},8,["value"])}}},pe={class:"my-4 shadow card profile-box card-top-border"},me={class:"mb-2 card-body justify-content-center align-items-center"},ue={class:"p-2 my-4 form-card"},be={class:"mt-1 row"},fe={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},he={class:"floating"},ge=e("label",{for:"",class:"float-label"},"Client Code",-1),ye={key:0,class:"font-semibold text-red-400 fs-6"},xe={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},ve={class:"floating"},$e=e("label",{for:"",class:"float-label"},"Legal Name of the Company",-1),Ce={key:0,class:"font-semibold text-red-400 fs-6"},Pe={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Se={class:"floating"},Ve=e("label",{for:"",class:"float-label"},"Contract Start Date",-1),we={key:0,class:"font-semibold text-red-400 fs-6"},qe={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Ne={class:"floating"},ke=e("label",{for:"",class:"float-label"},"Contract End Date",-1),Ae={key:0,class:"font-semibold text-red-400 fs-6"},Be={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},De={class:"floating"},Te=e("label",{for:"",class:"float-label"},"Company Identification Number",-1),Re={key:0,class:"font-semibold text-red-400 fs-6"},Ue=e("label",{class:"error cin_no_label",for:"cin_no",style:{display:"none"}},null,-1),Ee={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Le={class:"floating"},Fe=e("label",{for:"",class:"float-label"},"Company TAN",-1),ze={key:0,class:"font-semibold text-red-400 fs-6"},Me=e("label",{class:"error com_tan_label",for:"com_tan",style:{display:"none"}},null,-1),Ie={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Oe={class:"floating"},Ge=e("label",{for:"",class:"float-label"},"Company PAN",-1),We={key:0,class:"font-semibold text-red-400 fs-6"},je=e("label",{class:"error com_pan_label",for:"com_pan",style:{display:"none"}},null,-1),He=e("span",{id:"pan_err",style:{display:"none",color:"darkred"},class:"text-danger"}," Please Enter Valid Pan Number",-1),Ke={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Qe={class:"floating"},Je=e("label",{for:"",class:"float-label"},"GST No",-1),Xe={key:0,class:"font-semibold text-red-400 fs-6"},Ye=e("label",{class:"error gst_no_label",for:"gst_no",style:{display:"none"}},null,-1),Ze={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},eo={class:"floating"},oo=e("label",{for:"",class:"float-label"},"EPF Registration Number",-1),to={key:0,class:"font-semibold text-red-400 fs-6"},so=e("label",{class:"error epf_label",for:"epf",style:{display:"none"}},null,-1),ro={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},ao={class:"floating"},no=e("label",{for:"",class:"float-label"},"ESIC Registration Number",-1),lo={key:0,class:"font-semibold text-red-400 fs-6"},io=e("label",{class:"error esic_label",for:"esic",style:{display:"none"}},null,-1),co={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},_o={class:"floating"},po=e("label",{for:"",class:"float-label"},"Professional Tax Registration Number",-1),mo={key:0,class:"font-semibold text-red-400 fs-6"},uo=e("label",{class:"error professional_tax_label",for:"professional_tax",style:{display:"none"}},null,-1),bo={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},fo={class:"floating"},ho=e("label",{for:"",class:"float-label"},"LWF Registration Number",-1),go={key:0,class:"font-semibold text-red-400 fs-6"},yo=e("label",{class:"error lwf_label",for:"lwf",style:{display:"none"}},null,-1),xo={class:"shadow card profile-box card-top-border"},vo={class:"card-body justify-content-center align-items-center"},$o={class:"p-2 mb-2 form-card"},Co=e("div",{class:"text-primary header-card-text"},[e("h6",null,"Authorized Details")],-1),Po={class:"mt-1 row"},So={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Vo={class:"floating"},wo=e("label",{for:"",class:"float-label"},"Authorized Person Name",-1),qo={key:0,class:"font-semibold text-red-400 fs-6"},No=e("label",{class:"error auth_person_name_label",for:"auth_person_name",style:{display:"none"}},null,-1),ko={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Ao={class:"floating"},Bo=e("label",{for:"",class:"float-label"},"Authorized Person Designation",-1),Do={key:0,class:"font-semibold text-red-400 fs-6"},To=e("label",{class:"error auth_person_desig_label",for:"auth_person_desig",style:{display:"none"}},null,-1),Ro={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Uo={class:"floating"},Eo=e("label",{for:"",class:"float-label"},"Authorized Person Contact Number",-1),Lo={key:0,class:"font-semibold text-red-400 fs-6"},Fo={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},zo={class:"floating"},Mo=e("label",{for:"",class:"float-label"},"Authorized Person Contact Email",-1),Io={key:0,class:"font-semibold text-red-400 fs-6"},Oo={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Go={class:"floating"},Wo=e("label",{for:"",class:"float-label"},"Billing Address",-1),jo={key:0,class:"font-semibold text-red-400 fs-6"},Ho={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Ko={class:"floating"},Qo=e("label",{for:"",class:"float-label"},"Shipping Address",-1),Jo={key:0,class:"font-semibold text-red-400 fs-6"},Xo={class:"mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"},Yo={class:"floating"},Zo=e("label",{for:"",class:"float-label"},"Select Product",-1),et=V('<option value="" class="text-muted" hidden selected disabled> Select Product</option><option value="Recruitment">Recruitment</option><option value="Payroll">Payroll</option><option value="Statutory Complainces">Statutory Complainces</option><option value="Staffing">Staffing</option><option value="PMS">PMS</option><option value="Accounting">Accounting</option><option value="ROC Complainces">ROC Complainces</option><option value="Trade Mark">Trade Mark</option><option value="Patent Right">Patent Right</option>',10),ot=[et],tt={key:0,class:"font-semibold text-red-400 fs-6"},st={class:"mb-2 col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 dashBoard"},rt={class:"floating"},at=e("label",{for:"",class:"float-label"},"Subscription Type",-1),nt=V('<option value="" disabled selected hidden>Select Subscription Type </option><option value="Monthly">Monthly</option><option value="Quarterly">Quarterly</option><option value="BiAnnually">BiAnnually</option><option value="Annually">Annually</option>',5),lt=[nt],it={key:0,class:"font-semibold text-red-400 fs-6"},dt={class:"mb-2 col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 dashBoard"},ct=e("label",{for:"",class:"float-label"},"Document ",-1),_t={class:"mb-3"},pt={key:0,class:"font-semibold text-red-400 fs-6"},mt=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),ut={__name:"client_onboarding",setup($){D("$swal");const f=S(!1),t=T({client_code:"",client_name:"",contract_start_date:"",contract_end_date:"",cin_number:"",company_tan:"",company_pan:"",product:"",gst_no:"",epf_reg_number:"",esic_reg_number:"",prof_tax_reg_number:"",lwf_reg_number:"",authorised_person_name:"",authorised_person_designation:"",authorised_person_contact_number:"",authorised_person_contact_mail:"",billing_address:"",shipping_address:"",subscription_type:"",doc_uploads:""}),C=R(()=>({client_code:{required:p},client_name:{required:p},contract_start_date:{required:p},contract_end_date:{required:p},cin_number:{required:p},company_tan:{required:p},company_pan:{required:p},gst_no:{required:p},epf_reg_number:{required:p},esic_reg_number:{required:p},prof_tax_reg_number:{required:p},lwf_reg_number:{required:p},authorised_person_name:{required:p},authorised_person_designation:{required:p},authorised_person_contact_number:{required:p},authorised_person_contact_mail:{required:p},billing_address:{required:p},shipping_address:{required:p},subscription_type:{required:p},doc_uploads:{required:p},product:{required:p}})),o=ce(C,t),x=()=>{console.log(o.value),o.value.$validate(),o.value.$error?console.log("Form failed validation"):(console.log("Form successfully submitted."),q(),o.value.$reset())},q=()=>{f.value=!0;const h={headers:{"content-type":"multipart/form-data"}};let s=new FormData;s.append("client_name",t.client_name),s.append("client_code",t.client_code),s.append("contract_start_date",t.contract_start_date),s.append("contract_end_date",t.contract_end_date),s.append("cin_number",t.cin_number),s.append("company_tan",t.company_tan),s.append("company_pan",t.company_pan),s.append("gst_no",t.gst_no),s.append("epf_reg_number",t.epf_reg_number),s.append("esic_reg_number",t.esic_reg_number),s.append("prof_tax_reg_number",t.prof_tax_reg_number),s.append("lwf_reg_number",t.lwf_reg_number),s.append("authorised_person_name",t.authorised_person_name),s.append("authorised_person_designation",t.authorised_person_designation),s.append("authorised_person_contact_number",t.authorised_person_contact_number),s.append("authorised_person_contact_email",t.authorised_person_contact_mail),s.append("billing_address",t.billing_address),s.append("shipping_address",t.shipping_address),s.append("doc_uploads",t.doc_uploads),s.append("subscription_type",t.subscription_type),console.log(s),w.post("vmt_clientOnboarding",s,h).then(g=>{console.log("onboarding successfully"),g.data=="Saved"?Swal.fire("Success!","Client onboard successfully!","success"):Swal.fire("Error!","!","error")}).catch(g=>console.log(g)).finally(()=>{f.value=!1})},N=h=>{h.target.files&&h.target.files[0]&&(t.doc_uploads=h.target.files[0],console.log(t.doc_uploads))};return(h,s)=>{const g=y("ProgressSpinner"),k=y("Dialog");return l(),i(U,null,[e("div",pe,[e("div",me,[e("div",ue,[e("div",be,[e("div",fe,[e("div",he,[ge,m(e("input",{type:"text",placeholder:"Client Code",name:"client_code",class:d(["onboard-form form-control textbox",[r(o).client_code.$error?"border border-red-500":""]]),required:"","onUpdate:modelValue":s[0]||(s[0]=a=>t.client_code=a)},null,2),[[u,t.client_code]]),r(o).client_code.$error?(l(),i("span",ye,c(r(o).client_code.required.$message.replace("Value","Client Code")),1)):_("",!0)])]),e("div",xe,[e("div",ve,[$e,m(e("input",{type:"text",placeholder:"Legal Name of the Company",name:"client_name",id:"client_name",class:d(["onboard-form form-control textbox",[r(o).client_name.$error?"border border-red-500":""]]),"onUpdate:modelValue":s[1]||(s[1]=a=>t.client_name=a),required:""},null,2),[[u,t.client_name]]),r(o).client_name.$error?(l(),i("span",Ce,c(r(o).client_name.required.$message.replace("Value","Legal Name of the Company")),1)):_("",!0)])]),e("div",Pe,[e("div",Se,[Ve,m(e("input",{type:"text",max:"9999-12-31",placeholder:"Contract Start Date",name:"csd",class:d(["onboard-form form-control textbox",[r(o).contract_start_date.$error?"border border-red-500":""]]),onfocus:"(this.type='date')",required:"","onUpdate:modelValue":s[2]||(s[2]=a=>t.contract_start_date=a)},null,2),[[u,t.contract_start_date]]),r(o).contract_start_date.$error?(l(),i("span",we,c(r(o).contract_start_date.required.$message.replace("Value","Contract Start Date")),1)):_("",!0)])]),e("div",qe,[e("div",Ne,[ke,m(e("input",{type:"text",max:"9999-12-31",placeholder:"Contract End Date",name:"ced",class:d(["onboard-form form-control textbox",[r(o).contract_end_date.$error?"border border-red-500":""]]),onfocus:"(this.type='date')",required:"","onUpdate:modelValue":s[3]||(s[3]=a=>t.contract_end_date=a)},null,2),[[u,t.contract_end_date]]),r(o).contract_end_date.$error?(l(),i("span",Ae,c(r(o).contract_end_date.required.$message.replace("Value","Contract End Date")),1)):_("",!0)])]),e("div",Be,[e("div",De,[Te,m(e("input",{type:"text",placeholder:"Company Identification Number",name:"cin_no",class:d(["onboard-form form-control textbox",[r(o).cin_number.$error?"border border-red-500":""]]),pattern:"alp-num",required:"","onUpdate:modelValue":s[4]||(s[4]=a=>t.cin_number=a)},null,2),[[u,t.cin_number]]),r(o).cin_number.$error?(l(),i("span",Re,c(r(o).cin_number.required.$message.replace("Value","Company Identification Number")),1)):_("",!0),Ue])]),e("div",Ee,[e("div",Le,[Fe,m(e("input",{type:"text",placeholder:"Company TAN",name:"com_tan",class:d(["onboard-form form-control textbox",[r(o).company_tan.$error?"border border-red-500":""]]),pattern:"alp-num","onUpdate:modelValue":s[5]||(s[5]=a=>t.company_tan=a),required:""},null,2),[[u,t.company_tan]]),r(o).company_tan.$error?(l(),i("span",ze,c(r(o).company_tan.required.$message.replace("Value","Company TAN")),1)):_("",!0),Me])]),e("div",Ie,[e("div",Oe,[Ge,m(e("input",{type:"text",placeholder:"Company PAN",name:"com_pan",id:"com_pan",class:d(["onboard-form form-control textbox",[r(o).company_pan.$error?"border border-red-500":""]]),pattern:"alp-num",required:"","onUpdate:modelValue":s[6]||(s[6]=a=>t.company_pan=a)},null,2),[[u,t.company_pan]]),r(o).company_pan.$error?(l(),i("span",We,c(r(o).company_pan.required.$message.replace("Value","Company PAN")),1)):_("",!0),je,He])]),e("div",Ke,[e("div",Qe,[Je,m(e("input",{type:"text",placeholder:"GST No",name:"gst_no",class:d(["onboard-form form-control textbox",[r(o).gst_no.$error?"border border-red-500":""]]),pattern:"gst",required:"","onUpdate:modelValue":s[7]||(s[7]=a=>t.gst_no=a)},null,2),[[u,t.gst_no]]),r(o).gst_no.$error?(l(),i("span",Xe,c(r(o).gst_no.required.$message.replace("Value","GST No")),1)):_("",!0),Ye])]),e("div",Ze,[e("div",eo,[oo,m(e("input",{type:"text",placeholder:"EPF Registration Number",name:"epf",class:d(["onboard-form form-control textbox",[r(o).epf_reg_number.$error?"border border-red-500":""]]),pattern:"alp-num","onUpdate:modelValue":s[8]||(s[8]=a=>t.epf_reg_number=a),required:""},null,2),[[u,t.epf_reg_number]]),r(o).epf_reg_number.$error?(l(),i("span",to,c(r(o).epf_reg_number.required.$message.replace("Value","EPF Registration Number")),1)):_("",!0),so])]),e("div",ro,[e("div",ao,[no,m(e("input",{type:"text",placeholder:"ESIC Registration Number",name:"esic",class:d(["onboard-form form-control textbox",[r(o).esic_reg_number.$error?"border border-red-500":""]]),pattern:"alp-num",required:"","onUpdate:modelValue":s[9]||(s[9]=a=>t.esic_reg_number=a)},null,2),[[u,t.esic_reg_number]]),r(o).esic_reg_number.$error?(l(),i("span",lo,c(r(o).esic_reg_number.required.$message.replace("Value","ESIC Registration Number")),1)):_("",!0),io])]),e("div",co,[e("div",_o,[po,m(e("input",{type:"text",placeholder:"Professional Tax Registration Number",name:"professional_tax",class:d(["onboard-form form-control textbox",[r(o).prof_tax_reg_number.$error?"border border-red-500":""]]),pattern:"alp-num",required:"","onUpdate:modelValue":s[10]||(s[10]=a=>t.prof_tax_reg_number=a)},null,2),[[u,t.prof_tax_reg_number]]),r(o).prof_tax_reg_number.$error?(l(),i("span",mo,c(r(o).prof_tax_reg_number.required.$message.replace("Value","Professional Tax Registration Number")),1)):_("",!0),uo])]),e("div",bo,[e("div",fo,[ho,m(e("input",{type:"text",placeholder:"LWF Registration Number",name:"lwf","onUpdate:modelValue":s[11]||(s[11]=a=>t.lwf_reg_number=a),class:d(["onboard-form form-control textbox",[r(o).lwf_reg_number.$error?"border border-red-500":""]]),pattern:"alp-num",required:""},null,2),[[u,t.lwf_reg_number]]),r(o).lwf_reg_number.$error?(l(),i("span",go,c(r(o).lwf_reg_number.required.$message.replace("Value","LWF Registration Number")),1)):_("",!0),yo])])])])])]),e("div",xo,[e("div",vo,[e("div",$o,[Co,e("div",Po,[e("div",So,[e("div",Vo,[wo,m(e("input",{type:"text",placeholder:"Authorized Person Name",name:"auth_person_name",class:d(["onboard-form form-control textbox",[r(o).authorised_person_name.$error?"border border-red-500":""]]),pattern:"alpha",required:"","onUpdate:modelValue":s[12]||(s[12]=a=>t.authorised_person_name=a)},null,2),[[u,t.authorised_person_name]]),r(o).authorised_person_name.$error?(l(),i("span",qo,c(r(o).authorised_person_name.required.$message.replace("Value","Authorized Person Name")),1)):_("",!0),No])]),e("div",ko,[e("div",Ao,[Bo,m(e("input",{type:"text",placeholder:"Authorized Person Designation",name:"auth_person_desig",class:d(["onboard-form form-control",[r(o).authorised_person_designation.$error?"border border-red-500":""]]),pattern:"alpha",required:"","onUpdate:modelValue":s[13]||(s[13]=a=>t.authorised_person_designation=a)},null,2),[[u,t.authorised_person_designation]]),r(o).authorised_person_designation.$error?(l(),i("span",Do,c(r(o).authorised_person_designation.required.$message.replace("Value","Authorized Person Designation")),1)):_("",!0),To])]),e("div",Ro,[e("div",Uo,[Eo,m(e("input",{type:"number",minlength:"10",maxlength:"10",placeholder:"Authorized Person Contact Number",name:"auth_person_contact",class:d(["onboard-form form-control textbox",[r(o).authorised_person_contact_number.$error?"border border-red-500":""]]),required:"","onUpdate:modelValue":s[14]||(s[14]=a=>t.authorised_person_contact_number=a)},null,2),[[u,t.authorised_person_contact_number]]),r(o).authorised_person_contact_number.$error?(l(),i("span",Lo,c(r(o).authorised_person_contact_number.required.$message.replace("Value","Authorized Person Contact Number")),1)):_("",!0)])]),e("div",Fo,[e("div",zo,[Mo,m(e("input",{type:"email",placeholder:"Authorized Person Contact Email",name:"auth_person_email",class:d(["onboard-form form-control textbox",[r(o).authorised_person_contact_mail.$error?"border border-red-500":""]]),required:"","onUpdate:modelValue":s[15]||(s[15]=a=>t.authorised_person_contact_mail=a)},null,2),[[u,t.authorised_person_contact_mail]]),r(o).authorised_person_contact_mail.$error?(l(),i("span",Io,c(r(o).authorised_person_contact_mail.required.$message.replace("Value","Authorized Person Contact Email")),1)):_("",!0)])]),e("div",Oo,[e("div",Go,[Wo,m(e("input",{type:"text",placeholder:"Billing Address",name:"billing_add",class:d(["onboard-form form-control textbox",[r(o).billing_address.$error?"border border-red-500":""]]),required:"","onUpdate:modelValue":s[16]||(s[16]=a=>t.billing_address=a)},null,2),[[u,t.billing_address]]),r(o).billing_address.$error?(l(),i("span",jo,c(r(o).billing_address.required.$message.replace("Value","Billing Address")),1)):_("",!0)])]),e("div",Ho,[e("div",Ko,[Qo,m(e("input",{type:"text",placeholder:"Shipping Address",name:"shipping_add",class:d(["onboard-form form-control textbox",[r(o).shipping_address.$error?"border border-red-500":""]]),required:"","onUpdate:modelValue":s[17]||(s[17]=a=>t.shipping_address=a)},null,2),[[u,t.shipping_address]]),r(o).shipping_address.$error?(l(),i("span",Jo,c(r(o).shipping_address.required.$message.replace("Value","Shipping Address")),1)):_("",!0)])]),e("div",Xo,[e("div",Yo,[Zo,m(e("select",{placeholder:"Product",name:"product",id:"product",class:d(["form-select onboard-form form-control",[r(o).product.$error?"border border-red-500":""]]),required:"","onUpdate:modelValue":s[18]||(s[18]=a=>t.product=a)},ot,2),[[P,t.product]]),r(o).product.$error?(l(),i("span",tt,c(r(o).product.required.$message.replace("Value","Select Product")),1)):_("",!0)])]),e("div",st,[e("div",rt,[at,m(e("select",{placeholder:"Subscription Type",name:"subscription_type",id:"subscription_type","onUpdate:modelValue":s[19]||(s[19]=a=>t.subscription_type=a),class:d(["form-select form-control",[r(o).subscription_type.$error?"border border-red-500":""]]),"aria-label":"",required:""},lt,2),[[P,t.subscription_type]]),r(o).subscription_type.$error?(l(),i("span",it,c(r(o).subscription_type.required.$message.replace("Value","Subscription Type")),1)):_("",!0)])]),e("div",dt,[ct,e("div",_t,[e("input",{class:d(["form-control",[r(o).doc_uploads.$error?"border border-red-500":""]]),onChange:s[20]||(s[20]=a=>N(a)),type:"file",id:"formFile",accept:".doc,.docx,.pdf,image/*"},null,34),r(o).doc_uploads.$error?(l(),i("span",pt,c(r(o).doc_uploads.required.$message.replace("Value","Document")),1)):_("",!0)])]),e("div",{class:"text-right col-12"},[e("button",{type:"button",onClick:x,class:"text-center btn btn-orange",value:"Submit"},"Submit")])])])])]),b(k,{header:"Header",visible:f.value,"onUpdate:visible":s[21]||(s[21]=a=>f.value=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:v(()=>[b(g,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:v(()=>[mt]),_:1},8,["visible"])],64)}}},bt={class:"client-onboard-wrapper mt-30"},ft=e("div",{class:"mb-2 card left-line"},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"nav nav-pills nav-tabs-dashed",id:"pills-tab",role:"tablist"},[e("li",{class:"nav-item me-5",role:"presentation"},[e("a",{class:"nav-link active",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#client-list",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Client List ")]),e("li",{class:"nav-item",role:"presentation"},[e("a",{class:"nav-link",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#client-onboarding",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Client Onboarding ")])])])],-1),ht={class:"tab-content",id:"pills-tabContent"},gt={class:"tab-pane fade active show",id:"client-list",role:"tabpanel","aria-labelledby":""},yt={class:"card"},xt={class:"card-body"},vt={class:"table-responsive"},$t={class:"tab-pane fade",id:"client-onboarding",role:"tabpanel","aria-labelledby":""},Ct={__name:"client_onboarding_master",setup($){return(f,t)=>(l(),i("div",bt,[ft,e("div",ht,[e("div",gt,[e("div",yt,[e("div",xt,[e("div",vt,[b(_e)])])])]),e("div",$t,[b(ut)])])]))}},n=E(Ct),Pt=K();n.use(L,{ripple:!0});n.use(te);n.use(F);n.use(oe);n.use(Pt);n.directive("tooltip",Q);n.directive("badge",J);n.directive("ripple",z);n.directive("styleclass",X);n.directive("focustrap",M);n.component("Button",I);n.component("DataTable",Y);n.component("Column",Z);n.component("ColumnGroup",ae);n.component("Row",re);n.component("Toast",O);n.component("ConfirmDialog",G);n.component("Dropdown",W);n.component("InputText",j);n.component("Dialog",H);n.component("ProgressSpinner",se);n.component("Calendar",ne);n.component("Textarea",le);n.component("Chips",ie);n.component("MultiSelect",de);n.component("InputNumber",ee);n.mount("#clientOnboarding");