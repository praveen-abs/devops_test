import{o as V,c as L,e,t as C,V as f,j as p,W as j,B as D,X as B,E as M,g,h as i,w as _,l as N,i as P,z as T,M as Y,Y as G,a as q,F as O,G as H,P as J,H as K,R as W,q as z}from"./toastservice.esm-5c81c910.js";import{c as X}from"./pinia-cfd84f6e.js";import{T as Q,B as Z,S as ee,b as te,a as oe,c as se}from"./styleclass.esm-53d2a361.js";import"./blockui.esm-1fe6d364.js";import{C as ae,F as le,b as ie,s as ne,a as de}from"./inputtext.esm-41ef66e5.js";import{s as re}from"./confirmdialog.esm-9fa1521f.js";import{D as ce}from"./dialogservice.esm-3f54e695.js";import{s as _e}from"./toast.esm-8df40d88.js";import{s as pe}from"./progressspinner.esm-eb943c57.js";import{s as me}from"./row.esm-6ebc942e.js";import{s as ue}from"./columngroup.esm-9dd1458e.js";import{s as be}from"./calendar.esm-c1c28011.js";import{s as fe}from"./textarea.esm-e56a6fe5.js";import{s as ve}from"./chips.esm-fce78d71.js";import{s as he}from"./multiselect.esm-837b1f2f.js";import{S as I,p as R,E as ye}from"./EmployeeDetails-1f11c758.js";import{a as S}from"./index-f7a317fc.js";import"./moment-fbc5633a.js";import"./_plugin-vue_export-helper-c27b6911.js";const ge={class:"mb-0 card top-line"},xe={class:"card-body"},De={class:"row"},$e=e("div",{class:"col-12 text-end"},[e("button",{class:"p-0 m-0 bg-transparent border-0 outline-none btn","data-bs-target":"#show_idCard","data-bs-toggle":"modal"},[e("i",{class:"fa fa-id-card text-success","aria-hidden":"true"})])],-1),we={class:"text-center col-12"},ke=e("div",{class:"mx-auto rounded-circle img-xl userActive-status profile-img",style:{border:"6px solid #c2c2c2c2"}},[e("a",{class:"edit-icon","data-bs-toggle":"modal","data-bs-target":"#edit_profileImg",id:""},[e("i",{class:"fa fa-camera"})])],-1),Pe={class:"mt-4"},Ce={class:"progress-wrapper border-bottom-liteAsh"},Ve={class:"mb-1 text-center"},Le={class:"text-center"},Te=e("div",{class:"mx-auto mb-1 d-flex justify-content-between"},[e("span",{class:"text-muted f-12"},"Profile Completeness"),e("span",{class:"text-muted text-end f-12 fw-bold",id:"prograssBar_percentage"})],-1),Ne=e("div",{class:"mb-2 progress progress-bar-content"},[e("div",{class:"progress-bar",role:"progressbar",id:"profile_progressBar","aria-valuenow":"{{ 100 }}","aria-valuemin":"0","aria-valuemax":"100"})],-1),Se={class:"mb-4 text-center profile-mid-right-content"},Ee={class:"py-2 border-bottom-liteAsh"},Ue=e("p",{class:"text-muted f-12 fw-bold"},"Employee Status",-1),Fe={key:0,class:"f-15 fw-bold"},Ie={key:1,class:"text-danger f-15 fw-bold"},Re={class:"py-2 border-bottom-liteAsh"},Ae=e("p",{class:"text-muted f-12 fw-bold"},"Employee Code",-1),Be={class:"f-15 fw-bold"},qe={class:"py-2 border-bottom-liteAsh"},Me=e("p",{class:"text-muted f-12 fw-bold"},"Designation",-1),je={class:"f-15 fw-bold"},Ye={class:"py-2 border-bottom-liteAsh"},Ge=e("p",{class:"text-muted f-12 fw-bold"},"Location",-1),Oe={class:"f-15 fw-bold"},He={class:"py-2 border-bottom-liteAsh"},Je=e("p",{class:"text-muted f-12 fw-bold"},"Department",-1),Ke={class:"f-15 fw-bold"},We={class:"py-2 border-bottom-liteAsh"},ze=e("p",{class:"text-muted f-12 fw-bold"},"Reporting To",-1),Xe={class:"f-15 fw-bold"},Qe=e("div",{class:"text-center profile-bottom-right-content"},[e("button",{class:"btn btn-danger"},[e("i",{class:"fa fa-sign-out me-1"}),p(" Action ")])],-1),Ze={__name:"EmployeeCard",setup(A){I();let a=R();return(n,v)=>(V(),L("div",ge,[e("div",xe,[e("div",De,[$e,e("div",we,[ke,e("div",Pe,[e("div",Ce,[e("div",Ve,[e("h6",Le,C(f(a).employeeDetails.name),1)]),Te,Ne]),e("div",Se,[e("div",Ee,[Ue,f(a).employeeDetails.active==1?(V(),L("p",Fe," Active ")):(V(),L("p",Ie," Not Active "))]),e("div",Re,[Ae,e("p",Be,C(f(a).employeeDetails.user_code),1)]),e("div",qe,[Me,e("p",je,C(f(a).employeeDetails.get_employee_office_details.designation),1)]),e("div",Ye,[Ge,e("p",Oe,C(f(a).employeeDetails.get_employee_office_details.work_location),1)]),e("div",He,[Je,e("p",Ke,C(f(a).employeeDetails.get_employee_office_details.department_id),1)]),e("div",We,[ze,e("p",Xe,C(f(a).employeeDetails.get_employee_office_details.l1_manager_name)+" - "+C(f(a).employeeDetails.get_employee_office_details.l1_manager_code),1)])]),Qe])])])])]))}};const et={class:"mb-2 card"},tt={class:"card-body"},ot={class:""},st={class:"space-between"},at={class:"flex-col input_text"},lt=e("span",null,[p("Name "),e("span",{class:"text-danger"},"*")],-1),it={class:"flex-col input_text"},nt=e("span",null,[p("Relationship"),e("span",{class:"text-danger"},"*")],-1),dt={class:"space-between M-T"},rt={class:"flex-col input_text"},ct=e("span",null,[p("Date of birth "),e("span",{class:"text-danger"},"*")],-1),_t={class:"flex-col input_text"},pt=e("span",null,[p("phone"),e("span",{class:"text-danger"},"*")],-1),mt={class:"table-responsive my-6"},ut=["onClick"],bt=["onClick"],ft={class:"space-between"},vt={class:"flex-col input_text"},ht=e("span",null,[p("Name "),e("span",{class:"text-danger"},"*")],-1),yt={class:"flex-col input_text"},gt=e("span",null,[p("Relationship"),e("span",{class:"text-danger"},"*")],-1),xt={class:"space-between M-T"},Dt={class:"flex-col input_text"},$t=e("span",null,[p("Date of birth "),e("span",{class:"text-danger"},"*")],-1),wt={class:"flex-col input_text"},kt=e("span",null,[p("phone"),e("span",{class:"text-danger"},"*")],-1),Pt={__name:"FamilyDetails",setup(A){const a=I(),n=R(),v=j();D("");const h=D(!1),x=D(!1),l=B({name:"",relationship:"",dob:"",phone_number:""}),o=B({name:"",relationship:"",dob:"",phone_number:""}),k=D(),U=()=>{n.loading_screen=!0;let s=`/add-family-info/${a.current_user_id}`;S.post(s,{user_code:n.employeeDetails.user_code,name:l.name,relationship:l.relationship,dob:l.dob,phone_number:l.phone_number}).then(d=>{d.data.status=="success"?(v.add({severity:"success",summary:"Updated",detail:"Family information updated",life:3e3}),n.employeeDetails.get_family_details.dob=useDateFormat(l.dob,"YYYY-MM-DD"),n.employeeDetails.get_family_details.name=l.gender,n.employeeDetails.get_family_details.relationship=l.relationship,n.employeeDetails.get_family_details.phone_number=l.phone_number):d.data.status=="failure"&&(leave_data.leave_request_error_messege=d.data.message)}).catch(d=>{console.log(d)}).finally(()=>{n.fetchEmployeeDetails(),n.loading_screen=!1}),h.value=!1},u=t=>{x.value=!0,k.value=t.id,o.name=t.name,o.relationship=t.relationship,o.dob=t.dob,o.phone_number=t.phone_number},F=t=>{k.value=t.id;let d=` /delete-family-info/${a.current_user_id}`;S.post(d,{current_table_id:k.value}).then(y=>{y.data.status=="success"?(window.location.reload(),v.add({severity:"success",summary:"Deleted",detail:"General information updated",life:3e3}),n.employeeDetails.get_family_details.dob=useDateFormat(l.dob,"YYYY-MM-DD"),n.employeeDetails.get_family_details.name=l.gender,n.employeeDetails.get_family_details.relationship=l.relationship,n.employeeDetails.get_family_details.phone_number=l.phone_number):y.data.status=="failure"&&(leave_data.leave_request_error_messege=y.data.message)}).catch(y=>{console.log(y)})},b=t=>{let d=`/update-family-info/${a.current_user_id}`;S.post(d,{user_code:n.employeeDetails.user_code,current_table_id:k.value,name:o.name,relationship:o.relationship,dob:o.dob,phone_number:o.phone_number}).then(y=>{y.data.status=="success"?(window.location.reload(),v.add({severity:"success",summary:"Updated",detail:"General information updated",life:3e3}),n.employeeDetails.get_family_details.dob=useDateFormat(o.dob,"YYYY-MM-DD"),n.employeeDetails.get_family_details.name=o.gender,n.employeeDetails.get_family_details.relationship=l.relationship,n.employeeDetails.get_family_details.phone_number=o.phone_number):y.data.status=="failure"&&(leave_data.leave_request_error_messege=y.data.message)}).catch(y=>{console.log(y)}),x.value=!1};return M(()=>{}),(t,s)=>{const d=g("Toast"),y=g("Dialog"),r=g("Column"),E=g("DataTable");return V(),L("div",et,[e("div",tt,[e("h6",ot,[p("Family Information "),e("button",{type:"button",class:"float-right btn btn-orange",style:{"margin-left":"79%"},onClick:s[0]||(s[0]=$=>h.value=!0)}," Add New "),i(y,{visible:h.value,"onUpdate:visible":s[5]||(s[5]=$=>h.value=$),modal:"",style:{width:"50vw",borderTop:"5px solid #002f56"},id:""},{header:_(()=>[e("div",null,[e("h5",{style:N({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Family Information",4)])]),footer:_(()=>[i(d),e("div",null,[e("button",{type:"button",class:"submit_btn warning success",id:"submit_button_family_details",onClick:U},"submit")])]),default:_(()=>[e("div",st,[e("div",at,[lt,P(e("input",{type:"text",name:"familyDetails_Name[]","pattern-data":"name",id:"familyDetails_Name",required:"","onUpdate:modelValue":s[1]||(s[1]=$=>l.name=$)},null,512),[[T,l.name]])]),e("div",it,[nt,P(e("input",{type:"text",name:"familyDetails_Relationship[]","onUpdate:modelValue":s[2]||(s[2]=$=>l.relationship=$),id:"familyDetails_Relationship","pattern-data":"alpha",required:""},null,512),[[T,l.relationship]])])]),e("div",dt,[e("div",rt,[ct,P(e("input",{type:"date",id:"datemin",name:"familyDetails_dob[]",min:"2000-01-02","onUpdate:modelValue":s[3]||(s[3]=$=>l.dob=$)},null,512),[[T,l.dob]])]),e("div",_t,[pt,P(e("input",{type:"number",minlength:"10",maxlength:"10",pattern:"[1-9]{1}[0-9]{9}",id:"familyDetails_phoneNumber",name:"familyDetails_phoneNumber[]","onUpdate:modelValue":s[4]||(s[4]=$=>l.phone_number=$)},null,512),[[T,l.phone_number]])])])]),_:1},8,["visible"])]),e("div",mt,[i(E,{ref:"dt",dataKey:"id",paginator:!0,rows:10,value:f(n).employeeDetails.get_family_details,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:_(()=>[i(r,{header:"Name",field:"name",style:{"min-width":"8rem"}}),i(r,{field:"relationship",header:"Relationship",style:{"min-width":"12rem"}}),i(r,{field:"dob",header:"Date of Birth ",style:{"min-width":"12rem"}}),i(r,{field:"phone_number",header:"Phone",style:{"min-width":"12rem"}}),i(r,{exportable:!1,header:"Action",style:{"min-width":"8rem"}},{body:_($=>[e("button",{class:"btn btn-success mr-3",onClick:c=>u($.data)},"Edit",8,ut),e("button",{class:"btn btn-danger",onClick:c=>F($.data)},"Delete",8,bt),e("template",null,[i(y,{visible:x.value,"onUpdate:visible":s[10]||(s[10]=c=>x.value=c),modal:"",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:_(()=>[e("div",null,[e("h5",{style:N({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Family Information",4)])]),footer:_(()=>[i(d),e("div",null,[e("button",{type:"button",class:"submit_btn warning success",id:"submit_button_family_details",onClick:b},"submit")])]),default:_(()=>[e("div",ft,[e("div",vt,[ht,P(e("input",{type:"text",name:"familyDetails_Name[]","pattern-data":"name","onUpdate:modelValue":s[6]||(s[6]=c=>o.name=c),required:""},null,512),[[T,o.name]])]),e("div",yt,[gt,P(e("input",{type:"text",name:"familyDetails_Relationship[]","pattern-data":"alpha","onUpdate:modelValue":s[7]||(s[7]=c=>o.relationship=c),required:""},null,512),[[T,o.relationship]])])]),e("div",xt,[e("div",Dt,[$t,P(e("input",{type:"date",id:"datemin",name:"familyDetails_dob[]",min:"2000-01-02","onUpdate:modelValue":s[8]||(s[8]=c=>o.dob=c)},null,512),[[T,o.dob]])]),e("div",wt,[kt,P(e("input",{type:"number",minlength:"10",maxlength:"10",pattern:"[1-9]{1}[0-9]{9}",id:"familyDetails_phoneNumber",name:"familyDetails_phoneNumber[]","onUpdate:modelValue":s[9]||(s[9]=c=>o.phone_number=c)},null,512),[[T,o.phone_number]])])])]),_:1},8,["visible"])])]),_:1})]),_:1},8,["value"])])])])}}};const Ct=e("div",{class:"mb-2 card left-line"},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"nav nav-pills nav-tabs-dashed",id:"pills-tab",role:"tablist"},[e("li",{class:"nav-item",role:"presentation"},[e("a",{class:"nav-link active",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#finance_summary",role:"tab","aria-controls":"pills-home","aria-selected":"true"},"Summary ")]),e("li",{class:"mx-4 nav-item",role:"presentation"},[e("a",{class:"nav-link",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#finance_pay",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Paycheck ")])])])],-1),Vt={class:"tab-content",id:"pills-tabContent"},Lt={class:"tab-pane fade active show",id:"finance_summary",role:"tabpanel","aria-labelledby":""},Tt=e("div",{class:"mb-2 card"},[e("div",{class:"card-body"},[e("form",{action:"",method:"POST",enctype:"multipart/form-data"},[e("div",{class:"d-flex justify-content-between align-items-center"},[e("h6",{class:""}," Payroll Summary ")]),e("ul",{class:"personal-info"},[e("li",{class:"pb-1 border-bottom-liteAsh"},[e("div",{class:"title"},"Last Processed"),e("div",{class:"text"}," - ")]),e("li",{class:"pb-1 border-bottom-liteAsh"},[e("div",{class:"title"},"Total Working Days"),e("div",{class:"text"}," - ")]),e("li",{class:"pb-1"},[e("div",{class:"title"},"Loss Of Pay(LOP)"),e("div",{class:"text"}," - ")])])])])],-1),Nt={class:"mb-2 card"},St={class:"card-body"},Et=e("i",{class:"ri-pencil-fill"},null,-1),Ut=[Et],Ft={class:"modal-body"},It={class:"row"},Rt={class:"col-md-6"},At={class:"mb-3 form-group"},Bt=e("label",null,"Bank Name",-1),qt={class:"col-md-6"},Mt={class:"mb-3 form-group"},jt=e("label",null,"Bank Account No",-1),Yt=e("div",{class:"cal-icon"},null,-1),Gt={class:"col-md-6"},Ot={class:"mb-3 form-group"},Ht=e("label",null,"IFSC Code",-1),Jt={class:"col-md-6"},Kt={class:"mb-3 form-group"},Wt=e("label",null,"PAN No",-1),zt={class:"personal-info"},Xt=e("div",{class:"title"},"Bank Name",-1),Qt={class:"text"},Zt=e("div",{class:"title"},"Bank Account No.",-1),eo={class:"text"},to=e("div",{class:"title"},"IFSC Code",-1),oo={class:"text"},so=e("div",{class:"title"},"PAN No",-1),ao={class:"text"},lo={class:"mb-2 card"},io={class:"card-body"},no={class:""},ro={class:"personal-edit"},co=e("i",{class:"ri-pencil-fill"},null,-1),_o=[co],po={class:"modal-body"},mo={class:"row"},uo={class:"col-md-6"},bo={class:"floating"},fo=e("label",{for:"",class:"float-label"},[p("PF Applicable"),e("span",{class:"text-danger"},"*")],-1),vo=e("option",{value:"",hidden:"",selected:"",disabled:""},"PF Applicable",-1),ho=e("option",{value:"yes"},"Yes",-1),yo=e("option",{value:"no"},"No",-1),go=[vo,ho,yo],xo={class:"col-md-6"},Do={class:"mb-3 form-group"},$o=e("label",null,"EPF Number",-1),wo={class:"col-md-6"},ko={class:"mb-3 form-group"},Po=e("label",null,"UAN Number",-1),Co={class:"col-md-6"},Vo={class:"mb-3 form-group"},Lo=e("label",{class:"float-label"},[p("ESIC Applicable"),e("span",{class:"text-danger"},"*")],-1),To=e("option",{value:"",hidden:"",selected:"",disabled:""},"ESIC Applicable",-1),No=e("option",{value:"yes"}," Yes ",-1),So=e("option",{value:"no"}," No ",-1),Eo=[To,No,So],Uo={class:"col-md-6"},Fo={class:"floating"},Io=e("label",{for:"",class:"float-label"},"ESIC Number",-1),Ro=e("span",{class:"error",id:"error_esic_number"},null,-1),Ao=e("div",{class:"tab-pane fade",id:"finance_pay",role:"tabpanel","aria-labelledby":""},[e("div",{class:"mb-2 card"},[e("div",{class:"card-body"},[e("ul",{class:"mb-4 nav nav-pills nav-tabs-dashed",id:"pills-tab",role:"tablist"},[e("li",{class:"nav-item",role:"presentation"},[e("a",{class:"nav-link active",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#pay_slips",role:"tab","aria-controls":"","aria-selected":"true"}," Pay Slips ")])]),e("div",{class:"tab-content",id:"pills-tabContent"},[e("div",{class:"tab-pane fade active show",id:"pay_slips",role:"tabpanel","aria-labelledby":""},[e("div",{id:"",class:"ember-view"},[e("div",{class:"table-responsive"},[e("table",{class:"table table-hover"},[e("thead",{class:"fw-bold text-muted h5"},[e("tr",null,[e("th",{width:""},"Month"),e("th",{width:""},"Gross Pay"),e("th",{width:""},"Reimbursements"),e("th",{width:""},"Deductions"),e("th",{"data-url":"{{ route('vmt_employee_payslip_pdf') }}",style:{cursor:"pointer"},class:"ember-view paySlipPDF text-info"}," Download PDF ")])])])])])])])])])],-1),Bo={__name:"FinanceDetails",setup(A){const a=R(),n=I();M(()=>{n.getBankList().then(b=>{x.value=b.data})});const v=D(!1),h=D(!1);D(),D();const x=D(),l=B({bank_id:"",bank_ac_no:"",ifsc_code:"",pan_no:""});Y(()=>{if(a.employeeDetails.get_statutory_details[0].esic_applicable=="no")return"No";if(a.employeeDetails.get_statutory_details[0].esic_applicable=="yes")return"Yes"}),Y(()=>{if(a.employeeDetails.get_statutory_details[0].pf_applicable=="no")return"No";if(a.employeeDetails.get_statutory_details[0].pf_applicable=="yes")return"Yes"});const o=()=>{let t=`/update-bank-info/${n.current_user_id}`;S.post(t,{user_code:a.employeeDetails.user_code,bank_id:l.bank_id.id,account_no:l.bank_ac_no,bank_ifsc:l.ifsc_code,pan_no:l.pan_no}).then(s=>{s.data.status=="success"?(toast.add({severity:"success",summary:"Updated",detail:"Bank information updated",life:3e3}),a.employeeDetails.get_employee_details.bank_id=l.bank_id,a.employeeDetails.get_employee_details.account_no=l.bank_ac_no,a.employeeDetails.get_employee_details.bank_ifsc=l.ifsc_code,a.employeeDetails.get_employee_details.pan_no=l.pan_no):s.data.status=="failure"&&(leave_data.leave_request_error_messege=s.data.message)}).catch(s=>{console.log(s)}),v.value=!1};function k(){console.log("Opening General Info Dialog"),l.bank_id=a.employeeDetails.get_employee_details.bank_id,l.bank_ac_no=a.employeeDetails.get_employee_details.bank_account_number,l.ifsc_code=a.employeeDetails.get_employee_details.bank_ifsc_code,l.pan_no=a.employeeDetails.get_employee_details.pan_number,v.value=!0}function U(){console.log("Opening General Info Dialog"),u.pf_applicable=a.employeeDetails.get_statutory_details[0].pf_applicable,u.epf_no=a.employeeDetails.get_statutory_details[0].epf_number,u.uan_no=a.employeeDetails.get_statutory_details[0].uan_number,u.esic_applicable=a.employeeDetails.get_statutory_details[0].pf_applicable,u.esic_no=a.employeeDetails.get_statutory_details[0].esic_number,h.value=!0}const u=B({pf_applicable:"",epf_no:"",uan_no:"",esic_applicable:"",esic_no:""}),F=()=>{let t=`/update-statutory-info/${n.current_user_id}`;S.post(t,{user_code:a.employeeDetails.user_code,pf_applicable:u.pf_applicable,epf_number:u.epf_no,uan_number:u.uan_no,esic_applicable:u.esic_applicable,esic_number:u.esic_no}).then(s=>{s.data.status=="success"?toast.add({severity:"success",summary:"Updated",detail:"General information updated",life:3e3}):s.data.status=="failure"&&(leave_data.leave_request_error_messege=s.data.message)}).catch(s=>{console.log(s)}),h.value=!1};return(b,t)=>{const s=g("Dropdown"),d=g("InputText"),y=g("Dialog");return V(),L("div",null,[Ct,e("div",Vt,[e("div",Lt,[Tt,e("div",Nt,[e("div",St,[e("h6",{class:""},[p("Bank Information "),e("span",{class:"personal-edit"},[e("a",{href:"#",class:"edit-icon",onClick:k},Ut)])]),i(y,{visible:v.value,"onUpdate:visible":t[4]||(t[4]=r=>v.value=r),modal:"",header:"Header",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:_(()=>[e("div",null,[e("h5",{style:N({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Bank Information",4)])]),default:_(()=>[e("div",null,[e("div",Ft,[e("div",It,[e("div",Rt,[e("div",At,[Bt,i(s,{editable:"",options:x.value,optionLabel:"bank_name",placeholder:"Select Bank Name",class:"w-full form-controls",modelValue:l.bank_id,"onUpdate:modelValue":t[0]||(t[0]=r=>l.bank_id=r)},null,8,["options","modelValue"])])]),e("div",qt,[e("div",Mt,[jt,Yt,i(d,{class:"form-controls onboard-form",inputId:"integeronly",name:"account_no",min:0,max:100,type:"number",modelValue:l.bank_ac_no,"onUpdate:modelValue":t[1]||(t[1]=r=>l.bank_ac_no=r)},null,8,["modelValue"])])]),e("div",Gt,[e("div",Ot,[Ht,i(d,{type:"text",name:"bank_ifsc_",class:"form-controls",modelValue:l.ifsc_code,"onUpdate:modelValue":t[2]||(t[2]=r=>l.ifsc_code=r)},null,8,["modelValue"])])]),e("div",Jt,[e("div",Kt,[Wt,i(d,{type:"text",name:"pan_nos",class:"form-controls",modelValue:l.pan_no,"onUpdate:modelValue":t[3]||(t[3]=r=>l.pan_no=r)},null,8,["modelValue"])])])]),e("div",{class:"col-12"},[e("div",{class:"text-right"},[e("button",{id:"btn_submit_bank_info",class:"btn btn-orange submit-btn",onClick:o},"Submit")])])])])]),_:1},8,["visible"]),e("div",null,[e("ul",zt,[e("li",null,[Xt,e("div",Qt,C(f(a).employeeDetails.get_employee_details.bank_id),1)]),e("li",null,[Zt,e("div",eo,C(f(a).employeeDetails.get_employee_details.bank_account_number),1)]),e("li",null,[to,e("div",oo,C(f(a).employeeDetails.get_employee_details.bank_ifsc_code),1)]),e("li",null,[so,e("div",ao,C(f(a).employeeDetails.get_employee_details.pan_number),1)])])])])]),e("div",lo,[e("div",io,[e("h6",no,[p("Statutory Information "),e("span",ro,[e("a",{href:"#",class:"edit-icon",onClick:t[5]||(t[5]=r=>U())},_o)])]),i(y,{visible:h.value,"onUpdate:visible":t[11]||(t[11]=r=>h.value=r),modal:"",header:"Statutory Details",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:_(()=>[e("div",null,[e("h5",{style:N({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Statutory information",4)])]),default:_(()=>[e("div",po,[e("div",mo,[e("div",uo,[e("div",bo,[fo,P(e("select",{placeholder:"PF Applicable",name:"pf_applicable",id:"pf_applicable",class:"onboard-form form-control textbox select2_form_without_search","onUpdate:modelValue":t[6]||(t[6]=r=>u.pf_applicable=r)},go,512),[[G,u.pf_applicable]])])]),e("div",xo,[e("div",Do,[$o,P(e("input",{type:"text",placeholder:"EPF Number",name:"epf_number",id:"epf_number",class:"onboard-form form-control","onUpdate:modelValue":t[7]||(t[7]=r=>u.epf_no=r)},null,512),[[T,u.epf_no]])])]),e("div",wo,[e("div",ko,[Po,P(e("input",{name:"uan_number",id:"uan_number",minlength:"12",maxlength:"12",class:"form-control onboard-form",type:"text","pattern-data":"ifsc",required:"","onUpdate:modelValue":t[8]||(t[8]=r=>u.uan_no=r)},null,512),[[T,u.uan_no]])])]),e("div",Co,[e("div",Vo,[Lo,P(e("select",{placeholder:"ESIC Applicable",name:"esic_applicable",id:"esic_applicable",class:"onboard-form form-control textbox select2_form_without_search",required:"","onUpdate:modelValue":t[9]||(t[9]=r=>u.esic_applicable=r)},Eo,512),[[G,u.esic_applicable]])])]),e("div",Uo,[e("div",Fo,[Io,P(e("input",{type:"text",placeholder:"ESIC Number",name:"esic_number",id:"esic_number",minlength:"10",maxlength:"10",class:"onboard-form form-control textbox","onUpdate:modelValue":t[10]||(t[10]=r=>u.esic_no=r)},null,512),[[T,u.esic_no]]),Ro])])]),e("div",{class:"col-12"},[e("div",{class:"text-right"},[e("button",{id:"btn_submit_statutory_info",class:"btn btn-border-orange submit-btn",onClick:F},"Save")])])])]),_:1},8,["visible"])])])]),Ao])])}}};const qo={class:"mb-2 card"},Mo={class:"card-body"},jo={class:""},Yo={style:{"box-shadow":"0 1px 2px rgba(56, 65, 74, 0.15)",padding:"1rem"}},Go={class:"space-between"},Oo={class:"flex-col input_text"},Ho=e("span",null,[p("Company Name "),e("span",{class:"text-danger"},"*")],-1),Jo={class:"flex-col input_text"},Ko=e("span",null,[p(" Location"),e("span",{class:"text-danger"},"*")],-1),Wo={class:"space-between M-T"},zo={class:"flex-col input_text"},Xo=e("span",null,[p("Job Position "),e("span",{class:"text-danger"},"*")],-1),Qo={class:"flex-col input_text",style:{"margin-right":"7px"}},Zo=e("span",{style:{paddingLeft:"6px"}},[p("Period From"),e("span",{class:"text-danger"},"*")],-1),es={class:"space-between M-T"},ts={class:"flex-col input_text",style:{marginLeft:"-6px"}},os=e("span",{style:{paddingLeft:"6px"}},[p("Period To "),e("span",{class:"text-danger"},"*")],-1),ss={class:"table-responsive my-6"},as=["onClick"],ls=["onClick"],is={style:{"box-shadow":"0 1px 2px rgba(56, 65, 74, 0.15)",padding:"1rem"}},ns={class:"space-between"},ds={class:"flex-col input_text"},rs=e("span",null,[p("Company Name "),e("span",{class:"text-danger"},"*")],-1),cs={class:"flex-col input_text"},_s=e("span",null,[p(" Location"),e("span",{class:"text-danger"},"*")],-1),ps={class:"space-between M-T"},ms={class:"flex-col input_text"},us=e("span",null,[p("Job Position "),e("span",{class:"text-danger"},"*")],-1),bs={class:"flex-col input_text",style:{"margin-right":"7px"}},fs=e("span",{style:{paddingLeft:"6px"}},[p("Period From"),e("span",{class:"text-danger"},"*")],-1),vs={class:"space-between M-T"},hs={class:"flex-col input_text",style:{marginLeft:"-6px"}},ys=e("span",{style:{paddingLeft:"6px"}},[p("Period To "),e("span",{class:"text-danger"},"*")],-1),gs={__name:"ExperienceDetails",setup(A){const a=I(),n=R(),v=j();j(),D("");const h=D(!1),x=D(!1),l=D(),o=B({company_name:"",location:"",job_position:"",period_from:"",period_to:""}),k=()=>{console.log(o),n.loading_screen=!0;let t=`/add-experience-info/${a.current_user_id}`;S.post(t,{user_code:n.employeeDetails.user_code,company_name:o.company_name,experience_location:o.location,job_position:o.job_position,period_from:o.period_from,period_to:o.period_to}).then(s=>{s.data.status=="success"?v.add({severity:"success",summary:"Updated",detail:"Experiance information updated",life:3e3}):s.data.status=="failure"&&(leave_data.leave_request_error_messege=s.data.message)}).catch(s=>{console.log(s)}).finally(()=>{n.fetchEmployeeDetails(),n.loading_screen=!1}),h.value=!1};M(()=>{});const U=b=>{x.value=!0,l.value=b.id,console.log(l.value),o.company_name=b.company_name,o.location=b.location,o.job_position=b.job_position,o.period_from=b.period_from,o.period_to=b.period_to},u=b=>{x.value=!1;let s=`/update-experience-info/${a.current_user_id}`;S.post(s,{user_code:n.employeeDetails.user_code,exp_current_table_id:l.value,company_name:o.company_name,experience_location:o.location,job_position:o.job_position,period_from:o.period_from,period_to:o.period_to}).then(d=>{d.data.status=="success"?(window.location.reload(),v.add({severity:"success",summary:"Updated",detail:"General information updated",life:3e3})):d.data.status=="failure"&&(leave_data.leave_request_error_messege=d.data.message)}).catch(d=>{console.log(d)})},F=b=>{l.value=b.id;let s=`/delete-experience-info/${a.current_user_id}`;S.post(s,{exp_current_table_id:l.value}).then(d=>{d.data.status=="success"?(window.location.reload(),v.add({severity:"success",summary:"Deleted",detail:"General information updated",life:3e3})):d.data.status=="failure"&&(leave_data.leave_request_error_messege=d.data.message)}).catch(d=>{console.log(d)})};return(b,t)=>{const s=g("InputText"),d=g("Calendar"),y=g("Toast"),r=g("Dialog"),E=g("Column"),$=g("DataTable");return V(),L("div",null,[e("div",qo,[e("div",Mo,[e("h6",jo,[p("Experience Information "),e("button",{type:"button",class:"float-right btn btn-orange",style:{"margin-left":"76%"},onClick:t[0]||(t[0]=c=>h.value=!0)}," Add New "),i(r,{visible:h.value,"onUpdate:visible":t[6]||(t[6]=c=>h.value=c),modal:"",style:{width:"50vw",borderTop:"5px solid #002f56"},id:""},{header:_(()=>[e("div",null,[e("h5",{style:N({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Experience Information",4)])]),footer:_(()=>[e("div",null,[i(y),e("button",{type:"button",class:"submit_btn success warning",severity:"success",id:"",onClick:k},"submit")])]),default:_(()=>[e("div",Yo,[e("div",Go,[e("div",Oo,[Ho,i(s,{type:"text",modelValue:o.company_name,"onUpdate:modelValue":t[1]||(t[1]=c=>o.company_name=c),name:"ExperienceDetails_company_name[]",required:""},null,8,["modelValue"])]),e("div",Jo,[Ko,i(s,{type:"text",modelValue:o.location,"onUpdate:modelValue":t[2]||(t[2]=c=>o.location=c),name:"experienceDet_location[]",required:""},null,8,["modelValue"])])]),e("div",Wo,[e("div",zo,[Xo,i(s,{type:"text",modelValue:o.job_position,"onUpdate:modelValue":t[3]||(t[3]=c=>o.job_position=c),name:"experienceDet_job_position[]",required:""},null,8,["modelValue"])]),e("div",Qo,[Zo,i(d,{showIcon:"",modelValue:o.period_from,"onUpdate:modelValue":t[4]||(t[4]=c=>o.period_from=c),style:N({height:" 2.3rem",width:"100%",marginRight:"20px"}),name:"experienceDet_period_from[]"},null,8,["modelValue","style"])])]),e("div",es,[e("div",ts,[os,i(d,{showIcon:"",modelValue:o.period_to,"onUpdate:modelValue":t[5]||(t[5]=c=>o.period_to=c),class:"",style:N({height:" 2.3rem",width:"100%",borderRadius:"2px"}),name:"experienceDet_period_to[]"},null,8,["modelValue","style"])])])])]),_:1},8,["visible"])]),e("div",ss,[i($,{ref:"dt",value:f(n).employeeDetails.get_experience_details,dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:_(()=>[i(E,{header:"Company Name",field:"company_name",style:{"min-width":"12rem"}}),i(E,{field:"location",header:"Location",style:{"min-width":"8rem"}}),i(E,{field:"job_position",header:"Job Position ",style:{"min-width":"10rem"}}),i(E,{field:"period_from",header:"Period from",style:{"min-width":"6rem"}}),i(E,{field:"period_to",header:"Period To",style:{"min-width":"6rem"}}),i(E,{exportable:!1,header:"Action",style:{"min-width":"12rem"}},{body:_(c=>[e("button",{class:"btn btn-success mr-3",onClick:w=>U(c.data)},"Edit",8,as),e("button",{class:"btn btn-danger",onClick:w=>F(c.data)},"Delete",8,ls),e("template",null,[i(r,{visible:x.value,"onUpdate:visible":t[13]||(t[13]=w=>x.value=w),modal:"",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:_(()=>[e("div",null,[e("h5",{style:N({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Experience Information",4)])]),footer:_(()=>[e("div",null,[i(y),e("button",{type:"button",class:"submit_btn success warning",severity:"success",id:"",onClick:t[12]||(t[12]=w=>u())},"submit")])]),default:_(()=>[e("div",is,[e("div",ns,[e("div",ds,[rs,i(s,{type:"text",modelValue:o.company_name,"onUpdate:modelValue":t[7]||(t[7]=w=>o.company_name=w),name:"ExperienceDetails_company_name[]",required:""},null,8,["modelValue"])]),e("div",cs,[_s,i(s,{type:"text",modelValue:o.location,"onUpdate:modelValue":t[8]||(t[8]=w=>o.location=w),name:"experienceDet_location[]",required:""},null,8,["modelValue"])])]),e("div",ps,[e("div",ms,[us,i(s,{type:"text",modelValue:o.job_position,"onUpdate:modelValue":t[9]||(t[9]=w=>o.job_position=w),name:"experienceDet_job_position[]",required:""},null,8,["modelValue"])]),e("div",bs,[fs,i(d,{showIcon:"",modelValue:o.period_from,"onUpdate:modelValue":t[10]||(t[10]=w=>o.period_from=w),style:N({height:" 2.3rem",width:"100%",marginRight:"20px"}),name:"experienceDet_period_from[]"},null,8,["modelValue","style"])])]),e("div",vs,[e("div",hs,[ys,i(d,{showIcon:"",modelValue:o.period_to,"onUpdate:modelValue":t[11]||(t[11]=w=>o.period_to=w),class:"",style:N({height:" 2.3rem",width:"100%",borderRadius:"2px"}),name:"experienceDet_period_to[]"},null,8,["modelValue","style"])])])])]),_:1},8,["visible"])])]),_:1})]),_:1},8,["value"])])])])])}}},xs={class:"table-responsive"},Ds=["src"],$s={__name:"documents",setup(A){const a=R();I();const n=D({}),v=D(!1),h=D(),x=l=>{n.value={...l},console.log(n.value),console.log(n.value.doc_url),v.value=!0,S.post("/view-profile-private-file",{user_code:a.employeeDetails.user_code,document_name:n.value.document_name}).then(o=>{console.log(o.data.data),h.value=o.data.data,console.log("data sent",h.value)})};return(l,o)=>{const k=g("Column"),U=g("Button"),u=g("DataTable"),F=g("Dialog");return V(),L("div",xs,[i(u,{ref:"dt",dataKey:"id",paginator:!0,rows:10,value:f(a).employeeDetails.employee_documents,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:_(()=>[i(k,{header:"File Name",field:"document_name",style:{"min-width":"8rem"}},{default:_(()=>[p(C(f(a).employeeDetails.employee_documents.document_name),1)]),_:1}),i(k,{field:"doc_url",header:"Status",style:{"min-width":"12rem"}},{default:_(()=>[p(C(f(a).employeeDetails.employee_documents.doc_url),1)]),_:1}),i(k,{field:"doc_url",header:"Reason ",style:{"min-width":"12rem"}}),i(k,{field:"",header:"View ",style:{"min-width":"12rem"}},{body:_(b=>[i(U,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"view",onClick:t=>x(b.data),style:{height:"2em"}},null,8,["onClick"])]),_:1})]),_:1},8,["value"]),i(F,{visible:v.value,"onUpdate:visible":o[0]||(o[0]=b=>v.value=b),modal:"",header:"Documents",style:{width:"40vw"}},{default:_(()=>[n.value.doc_url?(V(),L("img",{key:0,src:`data:image/png;base64,${h.value}`},null,8,Ds)):q("",!0)]),_:1},8,["visible"])])}}},ws=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),ks={class:"profile_page-wrapper mt-30 container-fluid"},Ps={class:"row"},Cs={key:0,class:"col-3 col-sm-12 col-md-3 col-lg-3 col-xxl-3 col-xl-3"},Vs={class:"col-9 col-sm-9 col-md-9 col-lg-9 col-xxl-9 col-xl-9"},Ls=e("div",{class:"mb-2 card top-line"},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"nav nav-pills nav-tabs-dashed",id:"pills-tab",role:"tablist"},[e("li",{class:"nav-item",role:"presentation"},[e("a",{class:"nav-link active",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#employee_details",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Employee Details")]),e("li",{class:"mx-4 nav-item",role:"presentation"},[e("a",{class:"nav-link",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#family_det",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Family")]),e("li",{class:"nav-item",role:"presentation"},[e("a",{class:"nav-link",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#experience_det",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Experience")]),e("li",{class:"mx-4 nav-item",role:"presentation"},[e("a",{class:"nav-link",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#finance_det",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Finance")]),e("li",{class:"nav-item",role:"presentation"},[e("a",{class:"nav-link",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#document_det",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Document")])])])],-1),Ts={class:"tab-content",id:"pills-tabContent"},Ns={class:"tab-pane fade active show",id:"employee_details",role:"tabpanel","aria-labelledby":""},Ss={key:0},Es={class:"tab-pane fade",id:"family_det",role:"tabpanel","aria-labelledby":""},Us={class:"tab-pane fade",id:"experience_det",role:"tabpanel","aria-labelledby":""},Fs={class:"tab-pane fade",id:"finance_det",role:"tabpanel","aria-labelledby":""},Is={key:0},Rs={class:"tab-pane fade",id:"document_det",role:"tabpanel","aria-labelledby":""},As={__name:"profilePageNew",setup(A){I();let a=R();return M(async()=>{console.log("Loading screen start : "+a.loading_screen),a.fetchEmployeeDetails().then(function(n){console.log("Loading screen end : "+a.loading_screen),console.log("Req done")})}),(n,v)=>{const h=g("Toast"),x=g("ProgressSpinner"),l=g("Dialog");return V(),L(O,null,[i(h),i(l,{header:"Header",visible:f(a).loading_screen,"onUpdate:visible":v[0]||(v[0]=o=>f(a).loading_screen=o),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:_(()=>[i(x,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:_(()=>[ws]),_:1},8,["visible"]),e("div",ks,[e("div",Ps,[f(a).loading_screen?q("",!0):(V(),L("div",Cs,[i(Ze)])),e("div",Vs,[Ls,e("div",Ts,[e("div",Ns,[f(a).loading_screen?q("",!0):(V(),L("div",Ss,[i(ye)]))]),e("div",Es,[i(Pt)]),e("div",Us,[i(gs)]),e("div",Fs,[f(a).loading_screen?q("",!0):(V(),L("div",Is,[i(Bo)]))]),e("div",Rs,[i($s)])])])])])],64)}}},m=H(As),Bs=X();m.use(J,{ripple:!0});m.use(ae);m.use(K);m.use(ce);m.use(Bs);m.directive("tooltip",Q);m.directive("badge",Z);m.directive("ripple",W);m.directive("styleclass",ee);m.directive("focustrap",le);m.component("Button",z);m.component("DataTable",te);m.component("Column",oe);m.component("ColumnGroup",ue);m.component("Row",me);m.component("Toast",_e);m.component("ConfirmDialog",re);m.component("Dropdown",ie);m.component("InputText",ne);m.component("Dialog",de);m.component("ProgressSpinner",pe);m.component("Calendar",be);m.component("Textarea",fe);m.component("Chips",ve);m.component("MultiSelect",he);m.component("InputNumber",se);m.mount("#profilePage");
