import{ae as C,af as c,H as h,ag as j,a1 as k,I as le,o as se,c as te,h as u,w as D,d as e,j as x,p as B,t as f,l as M,E as A,F as oe,g as V,ai as ae,aj as ie}from"./toastservice.esm-8fb4434b.js";import{d as H}from"./dayjs.min-e0adaab4.js";import"./moment-fbc5633a.js";import{u as de}from"./confirmationservice.esm-70c98e17.js";import{a as N}from"./index-3716a3fc.js";import{S as ne}from"./Service-ba15f3bf.js";import{p as re}from"./ProfilePagesStore-fcc947da.js";import{_ as _e}from"./_plugin-vue_export-helper-c27b6911.js";var T;const ce=typeof window<"u";ce&&((T=window==null?void 0:window.navigator)!=null&&T.userAgent)&&/iP(ad|hone|od)/.test(window.navigator.userAgent);function F(t){return typeof t=="function"?t():c(t)}const me=/^(\d{4})[-/]?(\d{1,2})?[-/]?(\d{0,2})[Tt\s]*(\d{1,2})?:?(\d{1,2})?:?(\d{1,2})?[.:]?(\d+)?$/,pe=/\[([^\]]+)]|Y{1,4}|M{1,4}|D{1,2}|d{1,4}|H{1,2}|h{1,2}|a{1,2}|A{1,2}|m{1,2}|s{1,2}|Z{1,2}|SSS/g,ue=(t,r,l,_)=>{let g=t<12?"AM":"PM";return _&&(g=g.split("").reduce((w,y)=>w+=`${y}.`,"")),l?g.toLowerCase():g},fe=(t,r,l={})=>{var _;const g=t.getFullYear(),w=t.getMonth(),y=t.getDate(),m=t.getHours(),b=t.getMinutes(),o=t.getSeconds(),I=t.getMilliseconds(),E=t.getDay(),S=(_=l.customMeridiem)!=null?_:ue,L={YY:()=>String(g).slice(-2),YYYY:()=>g,M:()=>w+1,MM:()=>`${w+1}`.padStart(2,"0"),MMM:()=>t.toLocaleDateString(l.locales,{month:"short"}),MMMM:()=>t.toLocaleDateString(l.locales,{month:"long"}),D:()=>String(y),DD:()=>`${y}`.padStart(2,"0"),H:()=>String(m),HH:()=>`${m}`.padStart(2,"0"),h:()=>`${m%12||12}`.padStart(1,"0"),hh:()=>`${m%12||12}`.padStart(2,"0"),m:()=>String(b),mm:()=>`${b}`.padStart(2,"0"),s:()=>String(o),ss:()=>`${o}`.padStart(2,"0"),SSS:()=>`${I}`.padStart(3,"0"),d:()=>E,dd:()=>t.toLocaleDateString(l.locales,{weekday:"narrow"}),ddd:()=>t.toLocaleDateString(l.locales,{weekday:"short"}),dddd:()=>t.toLocaleDateString(l.locales,{weekday:"long"}),A:()=>S(m,b),AA:()=>S(m,b,!1,!0),a:()=>S(m,b,!0),aa:()=>S(m,b,!0,!0)};return r.replace(pe,(U,G)=>G||L[U]())},ge=t=>{if(t===null)return new Date(NaN);if(t===void 0)return new Date;if(t instanceof Date)return new Date(t);if(typeof t=="string"&&!/Z$/i.test(t)){const r=t.match(me);if(r){const l=r[2]-1||0,_=(r[7]||"0").substring(0,3);return new Date(r[1],l,r[3]||1,r[4]||0,r[5]||0,r[6]||0,_)}}return new Date(t)};function be(t,r="HH:mm:ss",l={}){return C(()=>fe(ge(F(t)),F(r),l))}const i=t=>(ae("data-v-debfc942"),t=t(),ie(),t),he=i(()=>e("h5",{style:{"text-align":"center"}},"Please wait...",-1)),ye={class:"mb-2 card"},ve={class:"card-body"},De={class:"fw-bold mb-3 fs-15"},xe=i(()=>e("i",{class:"ri-pencil-fill"},null,-1)),we=[xe],Se={class:"row"},Me={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Ae={class:"mb-3 form-group"},Ve=i(()=>e("label",{style:{marginLeft:"10px"}},[x("Birth Date"),e("span",{class:"text-danger"},"*")],-1)),Ce={class:"cal-icon"},Pe={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Ye={class:"mb-1 form-group"},Ie=i(()=>e("label",null,[x("Gender"),e("span",{class:"text-danger"},"*")],-1)),Ee={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Le={class:"mb-1 form-group"},Ue=i(()=>e("label",{style:{marginLeft:"10px",marginRight:"10px"}},[x("Marital status "),e("span",{class:"text-danger"},"*")],-1)),Ge={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},ke={class:"mb-2 form-group"},Be=i(()=>e("label",null,[x("Blood Group"),e("span",{class:"text-danger"},"*")],-1)),Ne={class:"cal-icon"},Oe={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},$e={class:"form-group w-full",style:{marginLeft:"10px"}},je=i(()=>e("label",{class:"my-1"},"Physically Handicapped",-1)),He=i(()=>e("div",{class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},[e("div",{class:"mb-3 form-group"})],-1)),Te={class:"text-right col-12"},Fe={class:"personal-info"},Re={class:"pb-1 border-bottom-liteAsh"},ze=i(()=>e("div",{class:"title"},"Birthday",-1)),qe={class:"text"},We={class:"pb-1 border-bottom-liteAsh"},Je=i(()=>e("div",{class:"title"},"Gender ",-1)),Xe={class:"text"},Ze={class:"pb-1 border-bottom-liteAsh"},Ke=i(()=>e("div",{class:"title"},"Date Of Joining (DOJ)",-1)),Qe={class:"text"},el={class:"pb-1 border-bottom-liteAsh"},ll=i(()=>e("div",{class:"title"},"Marital Status ",-1)),sl={class:"text text-capitalize"},tl={class:"pb-1 border-bottom-liteAsh"},ol=i(()=>e("div",{class:"title"}," Blood Group",-1)),al={class:"text"},il={class:"pb-1"},dl=i(()=>e("div",{class:"title"},"Physically Handicapped",-1)),nl={class:"text"},rl={class:"mb-2 card"},_l={class:"card-body"},cl={class:"mb-3 fw-bold fs-15"},ml=i(()=>e("i",{class:"ri-pencil-fill"},null,-1)),pl=[ml],ul={class:"modal-body"},fl={class:"row"},gl={class:"col-md-6"},bl={class:"mb-3 form-group"},hl=i(()=>e("label",null,"Personal Email",-1)),yl={class:"col-md-6"},vl={class:"mb-3 form-group"},Dl=i(()=>e("label",null," Office Email",-1)),xl={class:"col-md-6"},wl={class:"mb-3 form-group"},Sl=i(()=>e("label",null,"Mobile Number",-1)),Ml={class:"col-md-6"},Al={class:"mb-3 form-group"},Vl=i(()=>e("label",null,"Official Mobile Number",-1)),Cl={class:"personal-info"},Pl={class:"pb-1 border-bottom-liteAsh"},Yl=i(()=>e("div",{class:"title"},"Personal Email",-1)),Il={class:"text"},El={class:"pb-1 border-bottom-liteAsh"},Ll=i(()=>e("div",{class:"title"},"Official Email",-1)),Ul={class:"text"},Gl={class:"pb-1"},kl=i(()=>e("div",{class:"title"},"Mobile Number",-1)),Bl={class:"text"},Nl={class:"pb-1"},Ol=i(()=>e("div",{class:"title"},"Official Mobile Number",-1)),$l={class:"text"},jl={class:"mb-2 card"},Hl={class:"card-body"},Tl={class:"ml-2 fw-bold fs-15"},Fl=i(()=>e("i",{class:"ri-pencil-fill"},null,-1)),Rl=[Fl],zl={class:"modal-body"},ql={class:"col-md-12"},Wl={class:"mb-3 form-group"},Jl=i(()=>e("label",null,"Current Address",-1)),Xl={class:"mb-3 form-group"},Zl=i(()=>e("label",null,"Permanent Address ",-1)),Kl={class:"col-12"},Ql={class:"text-right"},es={class:"row"},ls={class:"col-6"},ss={class:"personal-info"},ts={class:"pb-1 border-bottom-liteAsh flex-column"},os=i(()=>e("div",{class:"title"},"Current Address ",-1)),as={class:"text"},is={class:"col-6"},ds={class:"personal-info"},ns={class:"pb-1 border-bottom-liteAsh flex-column"},rs=i(()=>e("div",{class:"title"},"Permanent Address ",-1)),_s={class:"text"},cs={__name:"EmployeeDetails",setup(t){const r=ne(),l=re(),_=h(!1),g=j(),w=j(),y=h(!1),m=h(!1),b=h(!1),o=k({dob:"",gender:"",doj:"",blood_group_id:"",marital_status_id:"",physically_challenged:""}),I=h([{name:"Male",value:"male"},{name:"Female",value:"female"},{name:"Others",value:"others"}]),E=C(()=>l.employeeDetails.get_employee_details.gender=="male"?"Male":l.employeeDetails.get_employee_details.gender=="female"?"Female":l.employeeDetails.get_employee_details.gender=="others"?"Others":"-"),S=C(()=>{if(l.employeeDetails.get_employee_details.marital_status_id==1)return"Unmarried";if(l.employeeDetails.get_employee_details.marital_status_id==2)return"Married";if(l.employeeDetails.get_employee_details.marital_status_id==3)return"Separated";if(l.employeeDetails.get_employee_details.marital_status_id==4)return"Widowed";if(l.employeeDetails.get_employee_details.marital_status_id==5)return"Divorced"}),L=C(()=>{if(l.employeeDetails.get_employee_details.blood_group_id==1)return"A Positive";if(l.employeeDetails.get_employee_details.blood_group_id==2)return"A Negative";if(l.employeeDetails.get_employee_details.blood_group_id==3)return"B Positive";if(l.employeeDetails.get_employee_details.blood_group_id==4)return"B Negative";if(l.employeeDetails.get_employee_details.blood_group_id==5)return"AB Positive";if(l.employeeDetails.get_employee_details.blood_group_id==6)return"AB Negative";if(l.employeeDetails.get_employee_details.blood_group_id==7)return"O Positive";if(l.employeeDetails.get_employee_details.blood_group_id==8)return"O Negative"}),U=C(()=>{if(l.employeeDetails.get_employee_details.physically_challenged=="no")return"No";if(l.employeeDetails.get_employee_details.physically_challenged=="yes")return"Yes"}),G=h([{name:"Yes",value:"yes"},{name:"No",value:"no"}]),O=h(),$=h();de(),le(()=>{l.fetchEmployeeDetails(),r.getBloodGroups().then(v=>{console.log(v.data),O.value=v.data}),r.getMaritalStatus().then(v=>{console.log(v),$.value=v.data})});function R(){console.log("Opening General Info Dialog"),o.dob=l.employeeDetails.get_employee_details.dob,o.doj=l.employeeDetails.get_employee_details.doj,o.marital_status_id=parseInt(l.employeeDetails.get_employee_details.marital_status_id),o.gender=l.employeeDetails.get_employee_details.gender,o.blood_group_id=parseInt(l.employeeDetails.get_employee_details.blood_group_id),o.physically_challenged=l.employeeDetails.get_employee_details.physically_challenged,y.value=!0}function z(){console.log(o.dob),_.value=!0;let s=`/profile-pages-update-generalinfo/${r.current_user_id}`;N.post(s,{user_code:l.employeeDetails.user_code,dob:o.dob,gender:o.gender,marital_status_id:o.marital_status_id,doj:o.doj,blood_group_id:o.blood_group_id,physically_challenged:o.physically_challenged}).then(n=>{n.data.status=="success"?(l.employeeDetails.get_employee_details.dob=be(o.dob,"YYYY-MM-DD"),l.employeeDetails.gender=o.gender,l.employeeDetails.marital_status_id=o.marital_status_id,l.employeeDetails.get_employee_details.doj=o.doj,l.employeeDetails.blood_group_id=o.blood_group_id,l.employeeDetails.physically_challenged=o.physically_challenged):n.data.status=="failure"&&(leave_data.leave_request_error_messege=n.data.message)}).catch(n=>{console.log(n)}).finally(()=>{l.fetchEmployeeDetails(),_.value=!1,g.add({severity:"success",summary:"Updated",detail:"General information updated",life:3e3})}),y.value=!1}const q=h(),d=k({email:"",official_email:"",mobile_number:"",official_mobile_number:""});function W(){console.log("Opening General Info Dialog : "),d.email=l.employeeDetails.email,d.official_email=l.employeeDetails.get_employee_office_details.officical_mail,d.mobile_number=parseInt(l.employeeDetails.get_employee_details.mobile_number),d.official_mobile_number=parseInt(l.employeeDetails.get_employee_office_details.official_mobile),console.log("testing"),m.value=!0}function J(){let s=`/profile-pages-update-contactinfo/${r.current_user_id}`;_.value=!0,N.post(s,{user_code:l.employeeDetails.user_code,email:d.email,officical_mail:d.official_email,mobile_number:d.mobile_number,official_mobile_number:d.official_mobile_number}).then(n=>{n.data.status=="success"?(g.add({severity:"success",summary:"Updated",detail:"Contact information updated",life:3e3}),l.employeeDetails.email=d.email,l.employeeDetails.get_employee_office_details.officical_mail=d.official_email,l.employeeDetails.get_employee_details.mobile_number=d.mobile_number,l.employeeDetails.get_employee_office_details.official_mobile=d.official_mobile_number):n.data.status=="failure"&&(q.leave_request_error_messege=n.data.message)}).catch(n=>{console.log(n)}).finally(()=>{l.fetchEmployeeDetails(),_.value=!1}),m.value=!1}const X=h(),p=k({current_address:"",Permanent_Address:""});function Z(){console.log("Opening General Info Dialog"),p.current_address=l.employeeDetails.get_employee_details.current_address_line_1,p.Permanent_Address=l.employeeDetails.get_employee_details.permanent_address_line_1,b.value=!0}const K=()=>{if(_.value=!0,p.current_address==" "||p.Permanent_Address==" ")w.add({severity:"warn",summary:"Warn Message",detail:"Message Content",life:3e3});else{let s=`/profile-pages-update-address_info/${r.current_user_id}`;N.post(s,{user_code:l.employeeDetails.user_code,current_address_line_1:p.current_address,permanent_address_line_1:p.Permanent_Address}).then(n=>{data_checking.value=!1,n.data.status=="success"?(g.add({severity:"success",summary:"Updated",detail:"Address information updated",life:3e3}),l.employeeDetails.current_address_line_1=p.current_address,l.employeeDetails.get_employee_office_details.permanent_address_line_1=p.Permanent_Address):n.data.status=="failure"&&(X.leave_request_error_messege=n.data.message)}).catch(n=>{console.log(n)}).finally(()=>{l.fetchEmployeeDetails(),_.value=!1}),b.value=!1}};return(v,s)=>{const n=V("Toast"),Q=V("ProgressSpinner"),P=V("Dialog"),ee=V("Calendar"),Y=V("Dropdown");return se(),te(oe,null,[u(n),u(P,{header:"Header",visible:_.value,"onUpdate:visible":s[0]||(s[0]=a=>_.value=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:D(()=>[u(Q,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:D(()=>[he]),_:1},8,["visible"]),e("div",ye,[e("div",ve,[e("h6",De,[x("General Information "),e("a",{type:"button",class:"edit-icon",onClick:R},we),u(P,{visible:y.value,"onUpdate:visible":s[7]||(s[7]=a=>y.value=a),modal:"",header:"General Information",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:D(()=>[e("div",null,[e("h5",{style:B({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," General Information",4)])]),default:D(()=>[e("div",Se,[e("div",Me,[e("div",Ae,[Ve,e("div",Ce,[u(ee,{class:"mb-3 form-selects",modelValue:o.dob,"onUpdate:modelValue":s[1]||(s[1]=a=>o.dob=a),placeholder:"DD-MM-YYYY",dateFormat:"dd-mm-yy"},null,8,["modelValue"])])])]),e("div",Pe,[e("div",Ye,[Ie,u(Y,{modelValue:o.gender,"onUpdate:modelValue":s[2]||(s[2]=a=>o.gender=a),options:I.value,optionLabel:"name",optionValue:"value",placeholder:"Choose Gender",class:"form-selects"},null,8,["modelValue","options"])])]),e("div",Ee,[e("div",Le,[Ue,u(Y,{modelValue:o.marital_status_id,"onUpdate:modelValue":s[3]||(s[3]=a=>o.marital_status_id=a),options:$.value,optionLabel:"name",optionValue:"id",placeholder:"Select Marital Status",class:"form-selects",style:{marginLeft:"10px",marginRight:"10px"}},null,8,["modelValue","options"])])]),e("div",Ge,[e("div",ke,[Be,e("div",Ne,[u(Y,{modelValue:o.blood_group_id,"onUpdate:modelValue":s[4]||(s[4]=a=>o.blood_group_id=a),options:O.value,optionLabel:"name",optionValue:"id",placeholder:"Select Bloodgroup",class:"form-selects"},null,8,["modelValue","options"])])])]),e("div",Oe,[e("div",$e,[je,u(Y,{modelValue:o.physically_challenged,"onUpdate:modelValue":s[5]||(s[5]=a=>o.physically_challenged=a),options:G.value,optionLabel:"name",optionValue:"value",placeholder:"Select",class:"form-selects"},null,8,["modelValue","options"])])]),He]),e("div",Te,[e("button",{id:"btn_submit_generalInfo",class:"btn btn-border-orange submit-btn",onClick:s[6]||(s[6]=a=>z())},"Save")])]),_:1},8,["visible"])]),e("div",null,[e("ul",Fe,[e("li",Re,[ze,e("div",qe,f(c(H)(c(l).employeeDetails.get_employee_details.dob).format("DD-MMM-YYYY")),1)]),e("li",We,[Je,e("div",Xe,f(c(E)),1)]),e("li",Ze,[Ke,e("div",Qe,f(c(H)(c(l).employeeDetails.get_employee_details.doj).format("DD-MMM-YYYY")),1)]),e("li",el,[ll,e("div",sl,f(c(S)),1)]),e("li",tl,[ol,e("div",al,f(c(L))+" ",1)]),e("li",il,[dl,e("div",nl,f(c(U)),1)])])])])]),e("div",rl,[e("div",_l,[e("h6",cl,[x("Contact Information "),e("span",{class:"personal-edit"},[e("a",{href:"#",class:"edit-icon",onClick:W},pl)]),u(P,{visible:m.value,"onUpdate:visible":s[12]||(s[12]=a=>m.value=a),modal:"",header:"Contact Information",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:D(()=>[e("div",null,[e("h5",{style:B({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Contact Information",4)])]),default:D(()=>[e("div",ul,[e("div",fl,[e("div",gl,[e("div",bl,[hl,M(e("input",{type:"email",name:"present_email",class:"form-control","onUpdate:modelValue":s[8]||(s[8]=a=>d.email=a)},null,512),[[A,d.email]])])]),e("div",yl,[e("div",vl,[Dl,M(e("input",{type:"email",class:"form-control",name:"officical_mail","onUpdate:modelValue":s[9]||(s[9]=a=>d.official_email=a)},null,512),[[A,d.official_email]])])]),e("div",xl,[e("div",wl,[Sl,M(e("input",{type:"text",size:"20",maxlength:"10",name:"mobile_number",class:"form-control","onUpdate:modelValue":s[10]||(s[10]=a=>d.mobile_number=a)},null,512),[[A,d.mobile_number]])])]),e("div",Ml,[e("div",Al,[Vl,M(e("input",{type:"text",size:"20",maxlength:"10",name:"official_mobile_number",class:"form-control","onUpdate:modelValue":s[11]||(s[11]=a=>d.official_mobile_number=a)},null,512),[[A,d.official_mobile_number]])])]),e("div",{class:"col-12"},[e("div",{class:"text-right"},[e("button",{class:"btn btn-border-orange submit-btn",onClick:J},"Save")])])])])]),_:1},8,["visible"])]),e("div",null,[e("ul",Cl,[e("li",Pl,[Yl,e("div",Il,f(c(l).employeeDetails.email),1)]),e("li",El,[Ll,e("div",Ul,f(c(l).employeeDetails.get_employee_office_details.officical_mail),1)]),e("li",Gl,[kl,e("div",Bl,f(c(l).employeeDetails.get_employee_details.mobile_number),1)]),e("li",Nl,[Ol,e("div",$l,f(c(l).employeeDetails.get_employee_office_details.official_mobile),1)])])])])]),e("div",jl,[e("div",Hl,[e("h6",Tl,[x("Address "),e("span",{class:"personal-edit"},[e("a",{href:"#",class:"edit-icon",onClick:Z},Rl)]),u(P,{visible:b.value,"onUpdate:visible":s[15]||(s[15]=a=>b.value=a),modal:"",header:"",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:D(()=>[e("div",null,[e("h5",{style:B({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Address Information",4)])]),default:D(()=>[e("div",zl,[e("div",ql,[e("div",Wl,[Jl,M(e("textarea",{name:"current_address_line_1",id:"current_address_line_1",cols:"30",rows:"3",class:"form-control","onUpdate:modelValue":s[13]||(s[13]=a=>p.current_address=a)},null,512),[[A,p.current_address]])]),e("div",Xl,[Zl,M(e("textarea",{name:"permanent_address_line_1",id:"permanent_address_line_1",cols:"30",rows:"3",class:"form-control","onUpdate:modelValue":s[14]||(s[14]=a=>p.Permanent_Address=a)},null,512),[[A,p.Permanent_Address]])])]),e("div",Kl,[e("div",Ql,[u(n),e("button",{id:"btn_submit_address",class:"btn btn-border-orange submit-btn warn",onClick:K,severity:"warn"},"Save")])])])]),_:1},8,["visible"])]),e("div",null,[e("div",es,[e("div",ls,[e("ul",ss,[e("li",ts,[os,e("div",as,f(c(l).employeeDetails.get_employee_details.current_address_line_1),1)])])]),e("div",is,[e("ul",ds,[e("li",ns,[rs,e("div",_s,f(c(l).employeeDetails.get_employee_details.permanent_address_line_1),1)])])])])])])])],64)}}},vs=_e(cs,[["__scopeId","data-v-debfc942"]]);export{vs as E};
