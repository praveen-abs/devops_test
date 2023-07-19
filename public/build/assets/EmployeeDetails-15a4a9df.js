import{af as P,a2 as _,G as y,ag as H,a1 as G,H as ae,o as x,c as w,h as u,w as D,d as e,l as M,q as B,t as f,k as S,E as C,a3 as ie,F as de,g as Y,am as ne,an as re}from"./toastservice.esm-089fd174.js";import{d as N}from"./dayjs.min-2f06af28.js";import"./moment-fbc5633a.js";import{u as _e}from"./confirmationservice.esm-66a41967.js";import{a as O}from"./index-362795f3.js";import{S as ce}from"./Service-c3c14bcb.js";import{p as me}from"./ProfilePagesStore-3bce2b50.js";import{_ as pe}from"./_plugin-vue_export-helper-c27b6911.js";var T;const ue=typeof window<"u";ue&&((T=window==null?void 0:window.navigator)!=null&&T.userAgent)&&/iP(ad|hone|od)/.test(window.navigator.userAgent);function F(o){return typeof o=="function"?o():_(o)}const fe=/^(\d{4})[-/]?(\d{1,2})?[-/]?(\d{0,2})[Tt\s]*(\d{1,2})?:?(\d{1,2})?:?(\d{1,2})?[.:]?(\d+)?$/,ge=/\[([^\]]+)]|Y{1,4}|M{1,4}|D{1,2}|d{1,4}|H{1,2}|h{1,2}|a{1,2}|A{1,2}|m{1,2}|s{1,2}|Z{1,2}|SSS/g,be=(o,r,l,m)=>{let g=o<12?"AM":"PM";return m&&(g=g.split("").reduce((A,h)=>A+=`${h}.`,"")),l?g.toLowerCase():g},ye=(o,r,l={})=>{var m;const g=o.getFullYear(),A=o.getMonth(),h=o.getDate(),p=o.getHours(),b=o.getMinutes(),t=o.getSeconds(),E=o.getMilliseconds(),L=o.getDay(),d=(m=l.customMeridiem)!=null?m:be,U={YY:()=>String(g).slice(-2),YYYY:()=>g,M:()=>A+1,MM:()=>`${A+1}`.padStart(2,"0"),MMM:()=>o.toLocaleDateString(l.locales,{month:"short"}),MMMM:()=>o.toLocaleDateString(l.locales,{month:"long"}),D:()=>String(h),DD:()=>`${h}`.padStart(2,"0"),H:()=>String(p),HH:()=>`${p}`.padStart(2,"0"),h:()=>`${p%12||12}`.padStart(1,"0"),hh:()=>`${p%12||12}`.padStart(2,"0"),m:()=>String(b),mm:()=>`${b}`.padStart(2,"0"),s:()=>String(t),ss:()=>`${t}`.padStart(2,"0"),SSS:()=>`${E}`.padStart(3,"0"),d:()=>L,dd:()=>o.toLocaleDateString(l.locales,{weekday:"narrow"}),ddd:()=>o.toLocaleDateString(l.locales,{weekday:"short"}),dddd:()=>o.toLocaleDateString(l.locales,{weekday:"long"}),A:()=>d(p,b),AA:()=>d(p,b,!1,!0),a:()=>d(p,b,!0),aa:()=>d(p,b,!0,!0)};return r.replace(ge,(c,V)=>V||U[c]())},he=o=>{if(o===null)return new Date(NaN);if(o===void 0)return new Date;if(o instanceof Date)return new Date(o);if(typeof o=="string"&&!/Z$/i.test(o)){const r=o.match(fe);if(r){const l=r[2]-1||0,m=(r[7]||"0").substring(0,3);return new Date(r[1],l,r[3]||1,r[4]||0,r[5]||0,r[6]||0,m)}}return new Date(o)};function ve(o,r="HH:mm:ss",l={}){return P(()=>ye(he(F(o)),F(r),l))}const i=o=>(ne("data-v-07dab1dd"),o=o(),re(),o),De=i(()=>e("h5",{style:{"text-align":"center"}},"Please wait...",-1)),xe={class:"mb-2 card"},we={class:"card-body"},Se={class:"fw-bold mb-3 fs-15"},Me=i(()=>e("i",{class:"ri-pencil-fill"},null,-1)),Ae=[Me],Ve={class:"row"},Ce={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Ye={class:"mb-3 form-group"},Pe=i(()=>e("label",{style:{marginLeft:"10px"}},[M("Birth Date"),e("span",{class:"text-danger"},"*")],-1)),ke={class:"cal-icon"},Ie={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Ee={class:"mb-1 form-group"},Le=i(()=>e("label",null,[M("Gender"),e("span",{class:"text-danger"},"*")],-1)),Ue={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Ge={class:"mb-1 form-group"},Be=i(()=>e("label",{style:{marginLeft:"10px",marginRight:"10px"}},[M("Marital status "),e("span",{class:"text-danger"},"*")],-1)),Ne={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Oe={class:"mb-2 form-group"},$e=i(()=>e("label",null,[M("Blood Group"),e("span",{class:"text-danger"},"*")],-1)),je={class:"cal-icon"},He={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Te={class:"form-group w-full",style:{marginLeft:"10px"}},Fe=i(()=>e("label",{class:"my-1"},"Physically Handicapped",-1)),Re=i(()=>e("div",{class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},[e("div",{class:"mb-3 form-group"})],-1)),ze={class:"text-right col-12"},qe={class:"personal-info"},Je={class:"pb-1 border-bottom-liteAsh"},We=i(()=>e("div",{class:"title"},"Birthday",-1)),Xe={class:"text"},Ze={class:"pb-1 border-bottom-liteAsh"},Ke=i(()=>e("div",{class:"title"},"Gender ",-1)),Qe={class:"text"},el={class:"pb-1 border-bottom-liteAsh"},ll=i(()=>e("div",{class:"title"},"Date Of Joining (DOJ)",-1)),sl={class:"text"},ol={class:"pb-1 border-bottom-liteAsh"},tl=i(()=>e("div",{class:"title"},"Marital Status ",-1)),al={class:"text text-capitalize"},il={class:"pb-1 border-bottom-liteAsh"},dl=i(()=>e("div",{class:"title"}," Blood Group",-1)),nl={class:"text"},rl={class:"pb-1"},_l=i(()=>e("div",{class:"title"},"Physically Handicapped",-1)),cl={class:"text"},ml={class:"mb-2 card"},pl={class:"card-body"},ul={class:"mb-3 fw-bold fs-15"},fl=i(()=>e("i",{class:"ri-pencil-fill"},null,-1)),gl=[fl],bl={class:"modal-body"},yl={class:"row"},hl={class:"col-md-6"},vl={class:"mb-3 form-group"},Dl=i(()=>e("label",null,"Personal Email",-1)),xl={class:"col-md-6"},wl={class:"mb-3 form-group"},Sl=i(()=>e("label",null," Office Email",-1)),Ml={class:"col-md-6"},Al={class:"mb-3 form-group"},Vl=i(()=>e("label",null,"Mobile Number",-1)),Cl={class:"col-md-6"},Yl={class:"mb-3 form-group"},Pl=i(()=>e("label",null,"Official Mobile Number",-1)),kl={class:"personal-info"},Il={class:"pb-1 border-bottom-liteAsh"},El=i(()=>e("div",{class:"title"},"Personal Email",-1)),Ll={class:"text"},Ul={class:"pb-1 border-bottom-liteAsh"},Gl=i(()=>e("div",{class:"title"},"Official Email",-1)),Bl={class:"text"},Nl={class:"pb-1"},Ol=i(()=>e("div",{class:"title"},"Mobile Number",-1)),$l={class:"text"},jl={class:"pb-1"},Hl=i(()=>e("div",{class:"title"},"Official Mobile Number",-1)),Tl={key:0,class:"text"},Fl={key:1,class:"text"},Rl={class:"mb-2 card"},zl={class:"card-body"},ql={class:"ml-2 fw-bold fs-15"},Jl=i(()=>e("i",{class:"ri-pencil-fill"},null,-1)),Wl=[Jl],Xl={class:"modal-body"},Zl={class:"col-md-12"},Kl={class:"mb-3 form-group"},Ql=i(()=>e("label",null,"Current Address",-1)),es={class:"mb-3 form-group"},ls=i(()=>e("label",null,"Permanent Address ",-1)),ss={class:"col-12"},os={class:"d-flex justify-content-between align-items-center"},ts={class:"d-flex justify-content-center align-items-center"},as=i(()=>e("h1",{class:"mx-2"},"Copy current address to the permanent address",-1)),is={class:""},ds={class:"row"},ns={class:"col-6"},rs={class:"personal-info"},_s={class:"pb-1 border-bottom-liteAsh flex-column"},cs=i(()=>e("div",{class:"title"},"Current Address ",-1)),ms={key:0,class:"text"},ps={key:1},us={class:"col-6"},fs={class:"personal-info"},gs={class:"pb-1 border-bottom-liteAsh flex-column"},bs=i(()=>e("div",{class:"title"},"Permanent Address ",-1)),ys={key:0,class:"text d-flex justify-items-center"},hs={key:1,class:"text"},vs={__name:"EmployeeDetails",setup(o){const r=ce(),l=me(),m=y(!1),g=H(),A=H(),h=y(!1),p=y(!1),b=y(!1),t=G({dob:"",gender:"",doj:"",blood_group_id:"",marital_status_id:"",physically_challenged:""}),E=y([{name:"Male",value:"male"},{name:"Female",value:"female"},{name:"Others",value:"others"}]),L=y(),d=G({email:"",official_email:"",mobile_number:"",official_mobile_number:""}),U=y(),c=G({current_address:"",Permanent_Address:""}),V=y(!1);function R(){V.value==1?c.Permanent_Address=c.current_address:V.value=!1}const z=P(()=>l.employeeDetails.get_employee_details.gender=="male"?"Male":l.employeeDetails.get_employee_details.gender=="female"?"Female":l.employeeDetails.get_employee_details.gender=="others"?"Others":"-"),q=P(()=>l.employeeDetails.get_employee_details.marital_status),J=P(()=>{if(l.employeeDetails.get_employee_details.blood_group_id==1)return"A Positive";if(l.employeeDetails.get_employee_details.blood_group_id==2)return"A Negative";if(l.employeeDetails.get_employee_details.blood_group_id==3)return"B Positive";if(l.employeeDetails.get_employee_details.blood_group_id==4)return"B Negative";if(l.employeeDetails.get_employee_details.blood_group_id==5)return"AB Positive";if(l.employeeDetails.get_employee_details.blood_group_id==6)return"AB Negative";if(l.employeeDetails.get_employee_details.blood_group_id==7)return"O Positive";if(l.employeeDetails.get_employee_details.blood_group_id==8)return"O Negative"}),W=P(()=>{if(l.employeeDetails.get_employee_details.physically_challenged=="no")return"No";if(l.employeeDetails.get_employee_details.physically_challenged=="yes")return"Yes"}),X=y([{name:"Yes",value:"yes"},{name:"No",value:"no"}]),$=y(),j=y();_e(),ae(()=>{l.fetchEmployeeDetails(),r.getBloodGroups().then(v=>{console.log(v.data),$.value=v.data}),r.getMaritalStatus().then(v=>{console.log(v),j.value=v.data})});function Z(){console.log("Opening General Info Dialog"),t.dob=l.employeeDetails.get_employee_details.dob,t.doj=l.employeeDetails.get_employee_details.doj,t.marital_status_id=parseInt(l.employeeDetails.get_employee_details.marital_status_id),t.gender=l.employeeDetails.get_employee_details.gender,t.blood_group_id=parseInt(l.employeeDetails.get_employee_details.blood_group_id),t.physically_challenged=l.employeeDetails.get_employee_details.physically_challenged,h.value=!0}function K(){console.log(t.dob),m.value=!0;let s=`/profile-pages-update-generalinfo/${r.current_user_id}`;O.post(s,{user_code:l.employeeDetails.user_code,dob:N(t.dob).format("YYYY-MM-DD"),gender:t.gender,marital_status_id:t.marital_status_id,doj:t.doj,blood_group_id:t.blood_group_id,physically_challenged:t.physically_challenged}).then(n=>{n.data.status=="success"?(l.employeeDetails.get_employee_details.dob=ve(t.dob,"YYYY-MM-DD"),l.employeeDetails.gender=t.gender,l.employeeDetails.marital_status_id=t.marital_status_id,l.employeeDetails.get_employee_details.doj=t.doj,l.employeeDetails.blood_group_id=t.blood_group_id,l.employeeDetails.physically_challenged=t.physically_challenged):n.data.status=="failure"&&(leave_data.leave_request_error_messege=n.data.message)}).catch(n=>{console.log(n)}).finally(()=>{l.fetchEmployeeDetails(),m.value=!1,g.add({severity:"success",summary:"Updated",detail:"General information updated",life:3e3})}),h.value=!1}function Q(){console.log("Opening General Info Dialog : "),d.email=l.employeeDetails.email,d.official_email=l.employeeDetails.get_employee_office_details.officical_mail,d.mobile_number=parseInt(l.employeeDetails.get_employee_details.mobile_number),l.employeeDetails.get_employee_office_details.official_mobile?d.official_mobile_number=parseInt(l.employeeDetails.get_employee_office_details.official_mobile):d.official_mobile_number=0,console.log("testing"),p.value=!0}function ee(){let s=`/profile-pages-update-contactinfo/${r.current_user_id}`;m.value=!0,O.post(s,{user_code:l.employeeDetails.user_code,email:d.email,officical_mail:d.official_email,mobile_number:d.mobile_number,official_mobile_number:parseInt(d.official_mobile_number)}).then(n=>{n.data.status=="success"?(g.add({severity:"success",summary:"Updated",detail:"Contact information updated",life:3e3}),l.employeeDetails.email=d.email,l.employeeDetails.get_employee_office_details.officical_mail=d.official_email,l.employeeDetails.get_employee_details.mobile_number=d.mobile_number,l.employeeDetails.get_employee_office_details.official_mobile=d.official_mobile_number):n.data.status=="failure"&&(L.leave_request_error_messege=n.data.message)}).catch(n=>{console.log(n)}).finally(()=>{l.fetchEmployeeDetails(),m.value=!1}),p.value=!1}function le(){console.log("Opening General Info Dialog"),c.current_address=l.employeeDetails.get_employee_details.current_address_line_1,c.Permanent_Address=l.employeeDetails.get_employee_details.permanent_address_line_1,b.value=!0}const se=()=>{if(m.value=!0,c.current_address==" "||c.Permanent_Address==" ")A.add({severity:"warn",summary:"Warn Message",detail:"Message Content",life:3e3});else{let s=`/profile-pages-update-address_info/${r.current_user_id}`;O.post(s,{user_code:l.employeeDetails.user_code,current_address_line_1:c.current_address,permanent_address_line_1:c.Permanent_Address}).then(n=>{data_checking.value=!1,n.data.status=="success"?(g.add({severity:"success",summary:"Updated",detail:"Address information updated",life:3e3}),l.employeeDetails.current_address_line_1=c.current_address,l.employeeDetails.get_employee_office_details.permanent_address_line_1=c.Permanent_Address):n.data.status=="failure"&&(U.leave_request_error_messege=n.data.message)}).catch(n=>{console.log(n)}).finally(()=>{l.fetchEmployeeDetails(),m.value=!1}),b.value=!1}};return(v,s)=>{const n=Y("Toast"),oe=Y("ProgressSpinner"),k=Y("Dialog"),te=Y("Calendar"),I=Y("Dropdown");return x(),w(de,null,[u(n),u(k,{header:"Header",visible:m.value,"onUpdate:visible":s[0]||(s[0]=a=>m.value=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:D(()=>[u(oe,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:D(()=>[De]),_:1},8,["visible"]),e("div",xe,[e("div",we,[e("h6",Se,[M("General Information "),e("a",{type:"button",class:"edit-icon",onClick:Z},Ae),u(k,{visible:h.value,"onUpdate:visible":s[7]||(s[7]=a=>h.value=a),modal:"",header:"General Information",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:D(()=>[e("div",null,[e("h5",{style:B({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," General Information",4)])]),default:D(()=>[e("div",Ve,[e("div",Ce,[e("div",Ye,[Pe,e("div",ke,[u(te,{class:"mb-3 form-selects",modelValue:t.dob,"onUpdate:modelValue":s[1]||(s[1]=a=>t.dob=a),placeholder:"DD-MM-YYYY",dateFormat:"dd-mm-yy"},null,8,["modelValue"])])])]),e("div",Ie,[e("div",Ee,[Le,u(I,{modelValue:t.gender,"onUpdate:modelValue":s[2]||(s[2]=a=>t.gender=a),options:E.value,optionLabel:"name",optionValue:"value",placeholder:"Choose Gender",class:"form-selects"},null,8,["modelValue","options"])])]),e("div",Ue,[e("div",Ge,[Be,u(I,{modelValue:t.marital_status_id,"onUpdate:modelValue":s[3]||(s[3]=a=>t.marital_status_id=a),options:j.value,optionLabel:"name",optionValue:"id",placeholder:"Select Marital Status",class:"form-selects",style:{marginLeft:"10px",marginRight:"10px"}},null,8,["modelValue","options"])])]),e("div",Ne,[e("div",Oe,[$e,e("div",je,[u(I,{modelValue:t.blood_group_id,"onUpdate:modelValue":s[4]||(s[4]=a=>t.blood_group_id=a),options:$.value,optionLabel:"name",optionValue:"id",placeholder:"Select Bloodgroup",class:"form-selects"},null,8,["modelValue","options"])])])]),e("div",He,[e("div",Te,[Fe,u(I,{modelValue:t.physically_challenged,"onUpdate:modelValue":s[5]||(s[5]=a=>t.physically_challenged=a),options:X.value,optionLabel:"name",optionValue:"value",placeholder:"Select",class:"form-selects"},null,8,["modelValue","options"])])]),Re]),e("div",ze,[e("button",{id:"btn_submit_generalInfo",class:"btn btn-border-orange submit-btn",onClick:s[6]||(s[6]=a=>K())},"Save")])]),_:1},8,["visible"])]),e("div",null,[e("ul",qe,[e("li",Je,[We,e("div",Xe,f(_(N)(_(l).employeeDetails.get_employee_details.dob).format("DD-MMM-YYYY")),1)]),e("li",Ze,[Ke,e("div",Qe,f(_(z)),1)]),e("li",el,[ll,e("div",sl,f(_(N)(_(l).employeeDetails.get_employee_details.doj).format("DD-MMM-YYYY")),1)]),e("li",ol,[tl,e("div",al,f(_(q)),1)]),e("li",il,[dl,e("div",nl,f(_(J)),1)]),e("li",rl,[_l,e("div",cl,f(_(W)),1)])])])])]),e("div",ml,[e("div",pl,[e("h6",ul,[M("Contact Information "),e("span",{class:"personal-edit"},[e("a",{href:"#",class:"edit-icon",onClick:Q},gl)]),u(k,{visible:p.value,"onUpdate:visible":s[12]||(s[12]=a=>p.value=a),modal:"",header:"Contact Information",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:D(()=>[e("div",null,[e("h5",{style:B({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Contact Information",4)])]),default:D(()=>[e("div",bl,[e("div",yl,[e("div",hl,[e("div",vl,[Dl,S(e("input",{type:"email",name:"present_email",class:"form-control","onUpdate:modelValue":s[8]||(s[8]=a=>d.email=a)},null,512),[[C,d.email]])])]),e("div",xl,[e("div",wl,[Sl,S(e("input",{type:"email",class:"form-control",name:"officical_mail","onUpdate:modelValue":s[9]||(s[9]=a=>d.official_email=a)},null,512),[[C,d.official_email]])])]),e("div",Ml,[e("div",Al,[Vl,S(e("input",{type:"text",size:"20",maxlength:"10",name:"mobile_number",class:"form-control","onUpdate:modelValue":s[10]||(s[10]=a=>d.mobile_number=a)},null,512),[[C,d.mobile_number]])])]),e("div",Cl,[e("div",Yl,[Pl,S(e("input",{type:"text",size:"20",maxlength:"10",name:"official_mobile_number",class:"form-control","onUpdate:modelValue":s[11]||(s[11]=a=>d.official_mobile_number=a)},null,512),[[C,d.official_mobile_number,void 0,{number:!0}]])])]),e("div",{class:"col-12"},[e("div",{class:"text-right"},[e("button",{class:"btn btn-border-orange submit-btn",onClick:ee},"Save")])])])])]),_:1},8,["visible"])]),e("div",null,[e("ul",kl,[e("li",Il,[El,e("div",Ll,f(_(l).employeeDetails.email),1)]),e("li",Ul,[Gl,e("div",Bl,f(_(l).employeeDetails.get_employee_office_details.officical_mail),1)]),e("li",Nl,[Ol,e("div",$l,f(_(l).employeeDetails.get_employee_details.mobile_number),1)]),e("li",jl,[Hl,_(l).employeeDetails.get_employee_office_details.official_mobile?(x(),w("div",Fl,f(_(l).employeeDetails.get_employee_office_details.official_mobile),1)):(x(),w("div",Tl," - "))])])])])]),e("div",Rl,[e("div",zl,[e("h6",ql,[M("Address "),e("span",{class:"personal-edit"},[e("a",{href:"#",class:"edit-icon",onClick:le},Wl)]),u(k,{visible:b.value,"onUpdate:visible":s[16]||(s[16]=a=>b.value=a),modal:"",header:"",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:D(()=>[e("div",null,[e("h5",{style:B({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Address Information",4)])]),default:D(()=>[e("div",Xl,[e("div",Zl,[e("div",Kl,[Ql,S(e("textarea",{name:"current_address_line_1",id:"current_address_line_1",cols:"30",rows:"3",class:"form-control","onUpdate:modelValue":s[13]||(s[13]=a=>c.current_address=a)},null,512),[[C,c.current_address]])]),e("div",es,[ls,S(e("textarea",{name:"permanent_address_line_1",id:"permanent_address_line_1",cols:"30",rows:"3",class:"form-control","onUpdate:modelValue":s[14]||(s[14]=a=>c.Permanent_Address=a)},null,512),[[C,c.Permanent_Address]])])]),e("div",ss,[e("div",os,[e("div",ts,[S(e("input",{type:"checkbox",class:"border rounded-md","onUpdate:modelValue":s[15]||(s[15]=a=>V.value=a),style:{width:"20px",height:"20px"},onChange:R,value:1},null,544),[[ie,V.value]]),as]),e("div",is,[u(n),e("button",{id:"btn_submit_address",class:"btn btn-border-orange submit-btn warn",onClick:se,severity:"warn"},"Save")])])])])]),_:1},8,["visible"])]),e("div",null,[e("div",ds,[e("div",ns,[e("ul",rs,[e("li",_s,[cs,_(l).employeeDetails.get_employee_details.current_address_line_1=="none"?(x(),w("div",ms," - ")):(x(),w("div",ps,f(_(l).employeeDetails.get_employee_details.current_address_line_1),1))])])]),e("div",us,[e("ul",fs,[e("li",gs,[bs,_(l).employeeDetails.get_employee_details.permanent_address_line_1=="none"?(x(),w("div",ys," - ")):(x(),w("div",hs,f(_(l).employeeDetails.get_employee_details.permanent_address_line_1),1))])])])])])])])],64)}}},Ys=pe(vs,[["__scopeId","data-v-07dab1dd"]]);export{Ys as E,ve as u};