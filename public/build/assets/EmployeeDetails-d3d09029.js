import{af as Y,a2 as _,G as h,ag as F,a1 as k,H as se,o as B,c as N,h as u,w as D,d as e,j as x,q as O,t as f,l as M,E as A,F as te,g as V,an as ae,ao as ie}from"./toastservice.esm-037e4fc0.js";import{d as $}from"./dayjs.min-e0adaab4.js";import"./moment-fbc5633a.js";import{u as ne}from"./confirmationservice.esm-23320926.js";import{a as H}from"./index-3716a3fc.js";import{S as de}from"./Service-2950c61a.js";import{p as re}from"./ProfilePagesStore-d225242b.js";import{_ as _e}from"./_plugin-vue_export-helper-c27b6911.js";var R;const ce=typeof window<"u";ce&&((R=window==null?void 0:window.navigator)!=null&&R.userAgent)&&/iP(ad|hone|od)/.test(window.navigator.userAgent);function z(s){return typeof s=="function"?s():_(s)}const me=/^(\d{4})[-/]?(\d{1,2})?[-/]?(\d{0,2})[Tt\s]*(\d{1,2})?:?(\d{1,2})?:?(\d{1,2})?[.:]?(\d+)?$/,pe=/\[([^\]]+)]|Y{1,4}|M{1,4}|D{1,2}|d{1,4}|H{1,2}|h{1,2}|a{1,2}|A{1,2}|m{1,2}|s{1,2}|Z{1,2}|SSS/g,ue=(s,r,l,c)=>{let g=s<12?"AM":"PM";return c&&(g=g.split("").reduce((w,y)=>w+=`${y}.`,"")),l?g.toLowerCase():g},fe=(s,r,l={})=>{var c;const g=s.getFullYear(),w=s.getMonth(),y=s.getDate(),m=s.getHours(),b=s.getMinutes(),t=s.getSeconds(),I=s.getMilliseconds(),E=s.getDay(),S=(c=l.customMeridiem)!=null?c:ue,L={YY:()=>String(g).slice(-2),YYYY:()=>g,M:()=>w+1,MM:()=>`${w+1}`.padStart(2,"0"),MMM:()=>s.toLocaleDateString(l.locales,{month:"short"}),MMMM:()=>s.toLocaleDateString(l.locales,{month:"long"}),D:()=>String(y),DD:()=>`${y}`.padStart(2,"0"),H:()=>String(m),HH:()=>`${m}`.padStart(2,"0"),h:()=>`${m%12||12}`.padStart(1,"0"),hh:()=>`${m%12||12}`.padStart(2,"0"),m:()=>String(b),mm:()=>`${b}`.padStart(2,"0"),s:()=>String(t),ss:()=>`${t}`.padStart(2,"0"),SSS:()=>`${I}`.padStart(3,"0"),d:()=>E,dd:()=>s.toLocaleDateString(l.locales,{weekday:"narrow"}),ddd:()=>s.toLocaleDateString(l.locales,{weekday:"short"}),dddd:()=>s.toLocaleDateString(l.locales,{weekday:"long"}),A:()=>S(m,b),AA:()=>S(m,b,!1,!0),a:()=>S(m,b,!0),aa:()=>S(m,b,!0,!0)};return r.replace(pe,(G,U)=>U||L[G]())},ge=s=>{if(s===null)return new Date(NaN);if(s===void 0)return new Date;if(s instanceof Date)return new Date(s);if(typeof s=="string"&&!/Z$/i.test(s)){const r=s.match(me);if(r){const l=r[2]-1||0,c=(r[7]||"0").substring(0,3);return new Date(r[1],l,r[3]||1,r[4]||0,r[5]||0,r[6]||0,c)}}return new Date(s)};function be(s,r="HH:mm:ss",l={}){return Y(()=>fe(ge(z(s)),z(r),l))}const i=s=>(ae("data-v-e43d3258"),s=s(),ie(),s),he=i(()=>e("h5",{style:{"text-align":"center"}},"Please wait...",-1)),ye={class:"mb-2 card"},ve={class:"card-body"},De={class:"fw-bold mb-3 fs-15"},xe=i(()=>e("i",{class:"ri-pencil-fill"},null,-1)),we=[xe],Se={class:"row"},Me={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Ae={class:"mb-3 form-group"},Ve=i(()=>e("label",{style:{marginLeft:"10px"}},[x("Birth Date"),e("span",{class:"text-danger"},"*")],-1)),Ye={class:"cal-icon"},Ce={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Pe={class:"mb-1 form-group"},Ie=i(()=>e("label",null,[x("Gender"),e("span",{class:"text-danger"},"*")],-1)),Ee={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Le={class:"mb-1 form-group"},Ge=i(()=>e("label",{style:{marginLeft:"10px",marginRight:"10px"}},[x("Marital status "),e("span",{class:"text-danger"},"*")],-1)),Ue={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},ke={class:"mb-2 form-group"},Be=i(()=>e("label",null,[x("Blood Group"),e("span",{class:"text-danger"},"*")],-1)),Ne={class:"cal-icon"},Oe={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},$e={class:"form-group w-full",style:{marginLeft:"10px"}},He=i(()=>e("label",{class:"my-1"},"Physically Handicapped",-1)),je=i(()=>e("div",{class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},[e("div",{class:"mb-3 form-group"})],-1)),Te={class:"text-right col-12"},Fe={class:"personal-info"},Re={class:"pb-1 border-bottom-liteAsh"},ze=i(()=>e("div",{class:"title"},"Birthday",-1)),qe={class:"text"},Je={class:"pb-1 border-bottom-liteAsh"},We=i(()=>e("div",{class:"title"},"Gender ",-1)),Xe={class:"text"},Ze={class:"pb-1 border-bottom-liteAsh"},Ke=i(()=>e("div",{class:"title"},"Date Of Joining (DOJ)",-1)),Qe={class:"text"},el={class:"pb-1 border-bottom-liteAsh"},ll=i(()=>e("div",{class:"title"},"Marital Status ",-1)),ol={class:"text text-capitalize"},sl={class:"pb-1 border-bottom-liteAsh"},tl=i(()=>e("div",{class:"title"}," Blood Group",-1)),al={class:"text"},il={class:"pb-1"},nl=i(()=>e("div",{class:"title"},"Physically Handicapped",-1)),dl={class:"text"},rl={class:"mb-2 card"},_l={class:"card-body"},cl={class:"mb-3 fw-bold fs-15"},ml=i(()=>e("i",{class:"ri-pencil-fill"},null,-1)),pl=[ml],ul={class:"modal-body"},fl={class:"row"},gl={class:"col-md-6"},bl={class:"mb-3 form-group"},hl=i(()=>e("label",null,"Personal Email",-1)),yl={class:"col-md-6"},vl={class:"mb-3 form-group"},Dl=i(()=>e("label",null," Office Email",-1)),xl={class:"col-md-6"},wl={class:"mb-3 form-group"},Sl=i(()=>e("label",null,"Mobile Number",-1)),Ml={class:"col-md-6"},Al={class:"mb-3 form-group"},Vl=i(()=>e("label",null,"Official Mobile Number",-1)),Yl={class:"personal-info"},Cl={class:"pb-1 border-bottom-liteAsh"},Pl=i(()=>e("div",{class:"title"},"Personal Email",-1)),Il={class:"text"},El={class:"pb-1 border-bottom-liteAsh"},Ll=i(()=>e("div",{class:"title"},"Official Email",-1)),Gl={class:"text"},Ul={class:"pb-1"},kl=i(()=>e("div",{class:"title"},"Mobile Number",-1)),Bl={class:"text"},Nl={class:"pb-1"},Ol=i(()=>e("div",{class:"title"},"Official Mobile Number",-1)),$l={key:0,class:"text"},Hl={key:1,class:"text"},jl={class:"mb-2 card"},Tl={class:"card-body"},Fl={class:"ml-2 fw-bold fs-15"},Rl=i(()=>e("i",{class:"ri-pencil-fill"},null,-1)),zl=[Rl],ql={class:"modal-body"},Jl={class:"col-md-12"},Wl={class:"mb-3 form-group"},Xl=i(()=>e("label",null,"Current Address",-1)),Zl={class:"mb-3 form-group"},Kl=i(()=>e("label",null,"Permanent Address ",-1)),Ql={class:"col-12"},eo={class:"text-right"},lo={class:"row"},oo={class:"col-6"},so={class:"personal-info"},to={class:"pb-1 border-bottom-liteAsh flex-column"},ao=i(()=>e("div",{class:"title"},"Current Address ",-1)),io={class:"text"},no={class:"col-6"},ro={class:"personal-info"},_o={class:"pb-1 border-bottom-liteAsh flex-column"},co=i(()=>e("div",{class:"title"},"Permanent Address ",-1)),mo={class:"text"},po={__name:"EmployeeDetails",setup(s){const r=de(),l=re(),c=h(!1),g=F(),w=F(),y=h(!1),m=h(!1),b=h(!1),t=k({dob:"",gender:"",doj:"",blood_group_id:"",marital_status_id:"",physically_challenged:""}),I=h([{name:"Male",value:"male"},{name:"Female",value:"female"},{name:"Others",value:"others"}]),E=Y(()=>l.employeeDetails.get_employee_details.gender=="male"?"Male":l.employeeDetails.get_employee_details.gender=="female"?"Female":l.employeeDetails.get_employee_details.gender=="others"?"Others":"-"),S=Y(()=>l.employeeDetails.get_employee_details.marital_status),L=Y(()=>{if(l.employeeDetails.get_employee_details.blood_group_id==1)return"A Positive";if(l.employeeDetails.get_employee_details.blood_group_id==2)return"A Negative";if(l.employeeDetails.get_employee_details.blood_group_id==3)return"B Positive";if(l.employeeDetails.get_employee_details.blood_group_id==4)return"B Negative";if(l.employeeDetails.get_employee_details.blood_group_id==5)return"AB Positive";if(l.employeeDetails.get_employee_details.blood_group_id==6)return"AB Negative";if(l.employeeDetails.get_employee_details.blood_group_id==7)return"O Positive";if(l.employeeDetails.get_employee_details.blood_group_id==8)return"O Negative"}),G=Y(()=>{if(l.employeeDetails.get_employee_details.physically_challenged=="no")return"No";if(l.employeeDetails.get_employee_details.physically_challenged=="yes")return"Yes"}),U=h([{name:"Yes",value:"yes"},{name:"No",value:"no"}]),j=h(),T=h();ne(),se(()=>{l.fetchEmployeeDetails(),r.getBloodGroups().then(v=>{console.log(v.data),j.value=v.data}),r.getMaritalStatus().then(v=>{console.log(v),T.value=v.data})});function q(){console.log("Opening General Info Dialog"),t.dob=l.employeeDetails.get_employee_details.dob,t.doj=l.employeeDetails.get_employee_details.doj,t.marital_status_id=parseInt(l.employeeDetails.get_employee_details.marital_status_id),t.gender=l.employeeDetails.get_employee_details.gender,t.blood_group_id=parseInt(l.employeeDetails.get_employee_details.blood_group_id),t.physically_challenged=l.employeeDetails.get_employee_details.physically_challenged,y.value=!0}function J(){console.log(t.dob),c.value=!0;let o=`/profile-pages-update-generalinfo/${r.current_user_id}`;H.post(o,{user_code:l.employeeDetails.user_code,dob:$(t.dob).format("YYYY-MM-DD"),gender:t.gender,marital_status_id:t.marital_status_id,doj:t.doj,blood_group_id:t.blood_group_id,physically_challenged:t.physically_challenged}).then(d=>{d.data.status=="success"?(l.employeeDetails.get_employee_details.dob=be(t.dob,"YYYY-MM-DD"),l.employeeDetails.gender=t.gender,l.employeeDetails.marital_status_id=t.marital_status_id,l.employeeDetails.get_employee_details.doj=t.doj,l.employeeDetails.blood_group_id=t.blood_group_id,l.employeeDetails.physically_challenged=t.physically_challenged):d.data.status=="failure"&&(leave_data.leave_request_error_messege=d.data.message)}).catch(d=>{console.log(d)}).finally(()=>{l.fetchEmployeeDetails(),c.value=!1,g.add({severity:"success",summary:"Updated",detail:"General information updated",life:3e3})}),y.value=!1}const W=h(),n=k({email:"",official_email:"",mobile_number:"",official_mobile_number:""});function X(){console.log("Opening General Info Dialog : "),n.email=l.employeeDetails.email,n.official_email=l.employeeDetails.get_employee_office_details.officical_mail,n.mobile_number=parseInt(l.employeeDetails.get_employee_details.mobile_number),l.employeeDetails.get_employee_office_details.official_mobile?n.official_mobile_number=parseInt(l.employeeDetails.get_employee_office_details.official_mobile):n.official_mobile_number=0,console.log("testing"),m.value=!0}function Z(){let o=`/profile-pages-update-contactinfo/${r.current_user_id}`;c.value=!0,H.post(o,{user_code:l.employeeDetails.user_code,email:n.email,officical_mail:n.official_email,mobile_number:n.mobile_number,official_mobile_number:parseInt(n.official_mobile_number)}).then(d=>{d.data.status=="success"?(g.add({severity:"success",summary:"Updated",detail:"Contact information updated",life:3e3}),l.employeeDetails.email=n.email,l.employeeDetails.get_employee_office_details.officical_mail=n.official_email,l.employeeDetails.get_employee_details.mobile_number=n.mobile_number,l.employeeDetails.get_employee_office_details.official_mobile=n.official_mobile_number):d.data.status=="failure"&&(W.leave_request_error_messege=d.data.message)}).catch(d=>{console.log(d)}).finally(()=>{l.fetchEmployeeDetails(),c.value=!1}),m.value=!1}const K=h(),p=k({current_address:"",Permanent_Address:""});function Q(){console.log("Opening General Info Dialog"),p.current_address=l.employeeDetails.get_employee_details.current_address_line_1,p.Permanent_Address=l.employeeDetails.get_employee_details.permanent_address_line_1,b.value=!0}const ee=()=>{if(c.value=!0,p.current_address==" "||p.Permanent_Address==" ")w.add({severity:"warn",summary:"Warn Message",detail:"Message Content",life:3e3});else{let o=`/profile-pages-update-address_info/${r.current_user_id}`;H.post(o,{user_code:l.employeeDetails.user_code,current_address_line_1:p.current_address,permanent_address_line_1:p.Permanent_Address}).then(d=>{data_checking.value=!1,d.data.status=="success"?(g.add({severity:"success",summary:"Updated",detail:"Address information updated",life:3e3}),l.employeeDetails.current_address_line_1=p.current_address,l.employeeDetails.get_employee_office_details.permanent_address_line_1=p.Permanent_Address):d.data.status=="failure"&&(K.leave_request_error_messege=d.data.message)}).catch(d=>{console.log(d)}).finally(()=>{l.fetchEmployeeDetails(),c.value=!1}),b.value=!1}};return(v,o)=>{const d=V("Toast"),le=V("ProgressSpinner"),C=V("Dialog"),oe=V("Calendar"),P=V("Dropdown");return B(),N(te,null,[u(d),u(C,{header:"Header",visible:c.value,"onUpdate:visible":o[0]||(o[0]=a=>c.value=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:D(()=>[u(le,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:D(()=>[he]),_:1},8,["visible"]),e("div",ye,[e("div",ve,[e("h6",De,[x("General Information "),e("a",{type:"button",class:"edit-icon",onClick:q},we),u(C,{visible:y.value,"onUpdate:visible":o[7]||(o[7]=a=>y.value=a),modal:"",header:"General Information",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:D(()=>[e("div",null,[e("h5",{style:O({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," General Information",4)])]),default:D(()=>[e("div",Se,[e("div",Me,[e("div",Ae,[Ve,e("div",Ye,[u(oe,{class:"mb-3 form-selects",modelValue:t.dob,"onUpdate:modelValue":o[1]||(o[1]=a=>t.dob=a),placeholder:"DD-MM-YYYY",dateFormat:"dd-mm-yy"},null,8,["modelValue"])])])]),e("div",Ce,[e("div",Pe,[Ie,u(P,{modelValue:t.gender,"onUpdate:modelValue":o[2]||(o[2]=a=>t.gender=a),options:I.value,optionLabel:"name",optionValue:"value",placeholder:"Choose Gender",class:"form-selects"},null,8,["modelValue","options"])])]),e("div",Ee,[e("div",Le,[Ge,u(P,{modelValue:t.marital_status_id,"onUpdate:modelValue":o[3]||(o[3]=a=>t.marital_status_id=a),options:T.value,optionLabel:"name",optionValue:"id",placeholder:"Select Marital Status",class:"form-selects",style:{marginLeft:"10px",marginRight:"10px"}},null,8,["modelValue","options"])])]),e("div",Ue,[e("div",ke,[Be,e("div",Ne,[u(P,{modelValue:t.blood_group_id,"onUpdate:modelValue":o[4]||(o[4]=a=>t.blood_group_id=a),options:j.value,optionLabel:"name",optionValue:"id",placeholder:"Select Bloodgroup",class:"form-selects"},null,8,["modelValue","options"])])])]),e("div",Oe,[e("div",$e,[He,u(P,{modelValue:t.physically_challenged,"onUpdate:modelValue":o[5]||(o[5]=a=>t.physically_challenged=a),options:U.value,optionLabel:"name",optionValue:"value",placeholder:"Select",class:"form-selects"},null,8,["modelValue","options"])])]),je]),e("div",Te,[e("button",{id:"btn_submit_generalInfo",class:"btn btn-border-orange submit-btn",onClick:o[6]||(o[6]=a=>J())},"Save")])]),_:1},8,["visible"])]),e("div",null,[e("ul",Fe,[e("li",Re,[ze,e("div",qe,f(_($)(_(l).employeeDetails.get_employee_details.dob).format("DD-MMM-YYYY")),1)]),e("li",Je,[We,e("div",Xe,f(_(E)),1)]),e("li",Ze,[Ke,e("div",Qe,f(_($)(_(l).employeeDetails.get_employee_details.doj).format("DD-MMM-YYYY")),1)]),e("li",el,[ll,e("div",ol,f(_(S)),1)]),e("li",sl,[tl,e("div",al,f(_(L))+" ",1)]),e("li",il,[nl,e("div",dl,f(_(G)),1)])])])])]),e("div",rl,[e("div",_l,[e("h6",cl,[x("Contact Information "),e("span",{class:"personal-edit"},[e("a",{href:"#",class:"edit-icon",onClick:X},pl)]),u(C,{visible:m.value,"onUpdate:visible":o[12]||(o[12]=a=>m.value=a),modal:"",header:"Contact Information",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:D(()=>[e("div",null,[e("h5",{style:O({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Contact Information",4)])]),default:D(()=>[e("div",ul,[e("div",fl,[e("div",gl,[e("div",bl,[hl,M(e("input",{type:"email",name:"present_email",class:"form-control","onUpdate:modelValue":o[8]||(o[8]=a=>n.email=a)},null,512),[[A,n.email]])])]),e("div",yl,[e("div",vl,[Dl,M(e("input",{type:"email",class:"form-control",name:"officical_mail","onUpdate:modelValue":o[9]||(o[9]=a=>n.official_email=a)},null,512),[[A,n.official_email]])])]),e("div",xl,[e("div",wl,[Sl,M(e("input",{type:"text",size:"20",maxlength:"10",name:"mobile_number",class:"form-control","onUpdate:modelValue":o[10]||(o[10]=a=>n.mobile_number=a)},null,512),[[A,n.mobile_number]])])]),e("div",Ml,[e("div",Al,[Vl,M(e("input",{type:"text",size:"20",maxlength:"10",name:"official_mobile_number",class:"form-control","onUpdate:modelValue":o[11]||(o[11]=a=>n.official_mobile_number=a)},null,512),[[A,n.official_mobile_number]])])]),e("div",{class:"col-12"},[e("div",{class:"text-right"},[e("button",{class:"btn btn-border-orange submit-btn",onClick:Z},"Save")])])])])]),_:1},8,["visible"])]),e("div",null,[e("ul",Yl,[e("li",Cl,[Pl,e("div",Il,f(_(l).employeeDetails.email),1)]),e("li",El,[Ll,e("div",Gl,f(_(l).employeeDetails.get_employee_office_details.officical_mail),1)]),e("li",Ul,[kl,e("div",Bl,f(_(l).employeeDetails.get_employee_details.mobile_number),1)]),e("li",Nl,[Ol,_(l).employeeDetails.get_employee_office_details.official_mobile?(B(),N("div",Hl,f(_(l).employeeDetails.get_employee_office_details.official_mobile),1)):(B(),N("div",$l," - "))])])])])]),e("div",jl,[e("div",Tl,[e("h6",Fl,[x("Address "),e("span",{class:"personal-edit"},[e("a",{href:"#",class:"edit-icon",onClick:Q},zl)]),u(C,{visible:b.value,"onUpdate:visible":o[15]||(o[15]=a=>b.value=a),modal:"",header:"",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:D(()=>[e("div",null,[e("h5",{style:O({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Address Information",4)])]),default:D(()=>[e("div",ql,[e("div",Jl,[e("div",Wl,[Xl,M(e("textarea",{name:"current_address_line_1",id:"current_address_line_1",cols:"30",rows:"3",class:"form-control","onUpdate:modelValue":o[13]||(o[13]=a=>p.current_address=a)},null,512),[[A,p.current_address]])]),e("div",Zl,[Kl,M(e("textarea",{name:"permanent_address_line_1",id:"permanent_address_line_1",cols:"30",rows:"3",class:"form-control","onUpdate:modelValue":o[14]||(o[14]=a=>p.Permanent_Address=a)},null,512),[[A,p.Permanent_Address]])])]),e("div",Ql,[e("div",eo,[u(d),e("button",{id:"btn_submit_address",class:"btn btn-border-orange submit-btn warn",onClick:ee,severity:"warn"},"Save")])])])]),_:1},8,["visible"])]),e("div",null,[e("div",lo,[e("div",oo,[e("ul",so,[e("li",to,[ao,e("div",io,f(_(l).employeeDetails.get_employee_details.current_address_line_1),1)])])]),e("div",no,[e("ul",ro,[e("li",_o,[co,e("div",mo,f(_(l).employeeDetails.get_employee_details.permanent_address_line_1),1)])])])])])])])],64)}}},xo=_e(po,[["__scopeId","data-v-e43d3258"]]);export{xo as E,be as u};