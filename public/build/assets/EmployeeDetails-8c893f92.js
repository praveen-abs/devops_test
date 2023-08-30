import{a5 as k,ae as c,G as h,ac as T,W as G,af as ie,o as x,c as w,h as p,w as D,d as e,l as M,q as B,t as f,k as C,E as I,ap as de,F as ne,g as V,ag as re,ah as ce}from"./toastservice.esm-23c43048.js";import{d as N}from"./dayjs.min-2f06af28.js";import"./moment-fbc5633a.js";import{u as _e}from"./confirmationservice.esm-eb0ed814.js";import{a as O}from"./index-362795f3.js";import{S as me}from"./Service-c7776333.js";import{p as pe}from"./ProfilePagesStore-5291cf2c.js";import{_ as ue}from"./_plugin-vue_export-helper-c27b6911.js";var F;const fe=typeof window<"u";fe&&((F=window==null?void 0:window.navigator)!=null&&F.userAgent)&&/iP(ad|hone|od)/.test(window.navigator.userAgent);function R(o){return typeof o=="function"?o():c(o)}const ge=/^(\d{4})[-/]?(\d{1,2})?[-/]?(\d{0,2})[Tt\s]*(\d{1,2})?:?(\d{1,2})?:?(\d{1,2})?[.:]?(\d+)?$/,be=/\[([^\]]+)]|Y{1,4}|M{1,4}|D{1,2}|d{1,4}|H{1,2}|h{1,2}|a{1,2}|A{1,2}|m{1,2}|s{1,2}|Z{1,2}|SSS/g,he=(o,r,l,m)=>{let g=o<12?"AM":"PM";return m&&(g=g.split("").reduce((S,y)=>S+=`${y}.`,"")),l?g.toLowerCase():g},ye=(o,r,l={})=>{var m;const g=o.getFullYear(),S=o.getMonth(),y=o.getDate(),u=o.getHours(),b=o.getMinutes(),t=o.getSeconds(),E=o.getMilliseconds(),L=o.getDay(),d=(m=l.customMeridiem)!=null?m:he,U={YY:()=>String(g).slice(-2),YYYY:()=>g,M:()=>S+1,MM:()=>`${S+1}`.padStart(2,"0"),MMM:()=>o.toLocaleDateString(l.locales,{month:"short"}),MMMM:()=>o.toLocaleDateString(l.locales,{month:"long"}),D:()=>String(y),DD:()=>`${y}`.padStart(2,"0"),H:()=>String(u),HH:()=>`${u}`.padStart(2,"0"),h:()=>`${u%12||12}`.padStart(1,"0"),hh:()=>`${u%12||12}`.padStart(2,"0"),m:()=>String(b),mm:()=>`${b}`.padStart(2,"0"),s:()=>String(t),ss:()=>`${t}`.padStart(2,"0"),SSS:()=>`${E}`.padStart(3,"0"),d:()=>L,dd:()=>o.toLocaleDateString(l.locales,{weekday:"narrow"}),ddd:()=>o.toLocaleDateString(l.locales,{weekday:"short"}),dddd:()=>o.toLocaleDateString(l.locales,{weekday:"long"}),A:()=>d(u,b),AA:()=>d(u,b,!1,!0),a:()=>d(u,b,!0),aa:()=>d(u,b,!0,!0)};return r.replace(be,(_,A)=>A||U[_]())},ve=o=>{if(o===null)return new Date(NaN);if(o===void 0)return new Date;if(o instanceof Date)return new Date(o);if(typeof o=="string"&&!/Z$/i.test(o)){const r=o.match(ge);if(r){const l=r[2]-1||0,m=(r[7]||"0").substring(0,3);return new Date(r[1],l,r[3]||1,r[4]||0,r[5]||0,r[6]||0,m)}}return new Date(o)};function De(o,r="HH:mm:ss",l={}){return k(()=>ye(ve(R(o)),R(r),l))}const i=o=>(re("data-v-4f1b3639"),o=o(),ce(),o),xe=i(()=>e("h5",{style:{"text-align":"center"}},"Please wait...",-1)),we={class:"mb-2 card"},Me={class:"card-body"},Se={class:"fw-bold mb-3 fs-15"},Ae=i(()=>e("i",{class:"ri-pencil-fill"},null,-1)),Ve=[Ae],Ce={class:"row"},ke={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Ye={class:"mb-3 form-group"},Pe=i(()=>e("label",{style:{marginLeft:"10px"}},[M("Birth Date"),e("span",{class:"text-danger"},"*")],-1)),Ie={class:"cal-icon"},Ee={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Le={class:"mb-1 form-group"},Ue=i(()=>e("label",null,[M("Gender"),e("span",{class:"text-danger"},"*")],-1)),Ge={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Be={class:"mb-1 form-group"},Ne=i(()=>e("label",{style:{marginLeft:"10px",marginRight:"10px"}},[M("Marital status "),e("span",{class:"text-danger"},"*")],-1)),Oe={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},$e={class:"mb-2 form-group"},je=i(()=>e("label",null,[M("Blood Group"),e("span",{class:"text-danger"},"*")],-1)),He={class:"cal-icon"},Te={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Fe={class:"form-group w-full",style:{marginLeft:"10px"}},Re=i(()=>e("label",{class:"my-1"},"Physically Handicapped",-1)),qe=i(()=>e("div",{class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},[e("div",{class:"mb-3 form-group"})],-1)),ze={class:"text-right col-12"},We={class:"personal-info"},Je={class:"pb-1 border-bottom-liteAsh"},Xe=i(()=>e("div",{class:"title"},"Birthday",-1)),Ze={class:"text"},Ke={class:"pb-1 border-bottom-liteAsh"},Qe=i(()=>e("div",{class:"title"},"Gender ",-1)),el={class:"text"},ll={class:"pb-1 border-bottom-liteAsh"},sl=i(()=>e("div",{class:"title"},"Date Of Joining (DOJ)",-1)),ol={class:"text"},tl={class:"pb-1 border-bottom-liteAsh"},al=i(()=>e("div",{class:"title"},"Marital Status ",-1)),il={class:"text text-capitalize"},dl={class:"pb-1 border-bottom-liteAsh"},nl=i(()=>e("div",{class:"title"}," Blood Group",-1)),rl={class:"text"},cl={class:"pb-1"},_l=i(()=>e("div",{class:"title"},"Physically Handicapped",-1)),ml={class:"text"},pl={class:"mb-2 card"},ul={class:"card-body"},fl={class:"mb-3 fw-bold fs-15"},gl=i(()=>e("i",{class:"ri-pencil-fill"},null,-1)),bl=[gl],hl={class:"modal-body"},yl={class:"row"},vl={class:"col-md-6"},Dl={class:"mb-3 form-group"},xl=i(()=>e("label",null,"Personal Email",-1)),wl={class:"col-md-6"},Ml={class:"mb-3 form-group"},Sl=i(()=>e("label",null," Office Email",-1)),Al={class:"col-md-6"},Vl={class:"mb-3 form-group"},Cl=i(()=>e("label",null,"Mobile Number",-1)),kl={class:"col-md-6"},Yl={class:"mb-3 form-group"},Pl=i(()=>e("label",null,"Official Mobile Number",-1)),Il={class:"personal-info"},El={class:"pb-1 border-bottom-liteAsh"},Ll=i(()=>e("div",{class:"title"},"Personal Email",-1)),Ul={class:"text"},Gl={class:"pb-1 border-bottom-liteAsh"},Bl=i(()=>e("div",{class:"title"},"Official Email",-1)),Nl={class:"text"},Ol={class:"pb-1"},$l=i(()=>e("div",{class:"title"},"Mobile Number",-1)),jl={class:"text"},Hl={class:"pb-1"},Tl=i(()=>e("div",{class:"title"},"Official Mobile Number",-1)),Fl={key:0,class:"text"},Rl={key:1,class:"text"},ql={class:"mb-2 card"},zl={class:"card-body"},Wl={class:"ml-2 fw-bold fs-15"},Jl=i(()=>e("i",{class:"ri-pencil-fill"},null,-1)),Xl=[Jl],Zl={class:"modal-body"},Kl={class:"col-md-12"},Ql={class:"mb-3 form-group"},es=i(()=>e("label",null,"Current Address",-1)),ls={class:"mb-3 form-group"},ss=i(()=>e("label",null,"Permanent Address ",-1)),os={class:"col-12"},ts={class:"d-flex justify-content-between align-items-center"},as={class:"d-flex justify-content-center align-items-center"},is=i(()=>e("h1",{class:"mx-2"},"Copy current address to the permanent address",-1)),ds={class:""},ns={class:"row"},rs={class:"col-6"},cs={class:"personal-info"},_s={class:"pb-1 border-bottom-liteAsh flex-column"},ms=i(()=>e("div",{class:"title"},"Current Address ",-1)),ps={key:0,class:"text"},us={key:1},fs={class:"col-6"},gs={class:"personal-info"},bs={class:"pb-1 border-bottom-liteAsh flex-column"},hs=i(()=>e("div",{class:"title"},"Permanent Address ",-1)),ys={key:0,class:"text d-flex justify-items-center w-100"},vs={key:1,class:"text d-flex justify-items-center w-100"},Ds={__name:"EmployeeDetails",setup(o){const r=me(),l=pe(),m=h(!1),g=T(),S=T(),y=h(!1),u=h(!1),b=h(!1),t=G({dob:"",gender:"",doj:"",blood_group_id:"",marital_status_id:"",physically_challenged:""}),E=h([{name:"Male",value:"male"},{name:"Female",value:"female"},{name:"Others",value:"others"}]),L=h(),d=G({email:"",official_email:"",mobile_number:"",official_mobile_number:""}),U=h(),_=G({current_address:"",Permanent_Address:""}),A=h(!1);function q(){A.value==1?_.Permanent_Address=_.current_address:A.value=!1}const z=k(()=>l.employeeDetails.get_employee_details.gender=="male"?"Male":l.employeeDetails.get_employee_details.gender=="female"?"Female":l.employeeDetails.get_employee_details.gender=="others"?"Others":"-"),W=k(()=>l.employeeDetails.get_employee_details.marital_status),J=k(()=>{if(l.employeeDetails.get_employee_details.blood_group_id==1)return"A Positive";if(l.employeeDetails.get_employee_details.blood_group_id==2)return"A Negative";if(l.employeeDetails.get_employee_details.blood_group_id==3)return"B Positive";if(l.employeeDetails.get_employee_details.blood_group_id==4)return"B Negative";if(l.employeeDetails.get_employee_details.blood_group_id==5)return"AB Positive";if(l.employeeDetails.get_employee_details.blood_group_id==6)return"AB Negative";if(l.employeeDetails.get_employee_details.blood_group_id==7)return"O Positive";if(l.employeeDetails.get_employee_details.blood_group_id==8)return"O Negative"}),X=k(()=>{if(l.employeeDetails.get_employee_details.physically_challenged=="no")return"No";if(l.employeeDetails.get_employee_details.physically_challenged=="yes")return"Yes"}),Z=h([{name:"Yes",value:"yes"},{name:"No",value:"no"}]),$=h(),j=h();_e(),ie(()=>{l.fetchEmployeeDetails(),r.getBloodGroups().then(v=>{console.log(v.data),$.value=v.data}),r.getMaritalStatus().then(v=>{console.log(v),j.value=v.data})});function K(){console.log("Opening General Info Dialog"),t.dob=l.employeeDetails.get_employee_details.dob,t.doj=l.employeeDetails.get_employee_details.doj,t.marital_status_id=parseInt(l.employeeDetails.get_employee_details.marital_status_id),t.gender=l.employeeDetails.get_employee_details.gender,t.blood_group_id=parseInt(l.employeeDetails.get_employee_details.blood_group_id),t.physically_challenged=l.employeeDetails.get_employee_details.physically_challenged,y.value=!0}function Q(){console.log(t.dob),m.value=!0;let s=`/profile-pages-update-generalinfo/${r.current_user_id}`;O.post(s,{user_code:l.employeeDetails.user_code,dob:N(t.dob).format("YYYY-MM-DD"),gender:t.gender,marital_status_id:t.marital_status_id,doj:t.doj,blood_group_id:t.blood_group_id,physically_challenged:t.physically_challenged}).then(n=>{n.data.status=="success"?(l.employeeDetails.get_employee_details.dob=De(t.dob,"YYYY-MM-DD"),l.employeeDetails.gender=t.gender,l.employeeDetails.marital_status_id=t.marital_status_id,l.employeeDetails.get_employee_details.doj=t.doj,l.employeeDetails.blood_group_id=t.blood_group_id,l.employeeDetails.physically_challenged=t.physically_challenged):n.data.status=="failure"&&(leave_data.leave_request_error_messege=n.data.message)}).catch(n=>{console.log(n)}).finally(()=>{l.fetchEmployeeDetails(),m.value=!1,g.add({severity:"success",summary:"Updated",detail:"General information updated",life:3e3})}),y.value=!1}function ee(){console.log("Opening General Info Dialog : "),d.email=l.employeeDetails.email,d.official_email=l.employeeDetails.get_employee_office_details.officical_mail,d.mobile_number=parseInt(l.employeeDetails.get_employee_details.mobile_number),l.employeeDetails.get_employee_office_details.official_mobile?d.official_mobile_number=parseInt(l.employeeDetails.get_employee_office_details.official_mobile):d.official_mobile_number=0,console.log("testing"),u.value=!0}function le(){let s=`/profile-pages-update-contactinfo/${r.current_user_id}`;m.value=!0,O.post(s,{user_code:l.employeeDetails.user_code,email:d.email,officical_mail:d.official_email,mobile_number:d.mobile_number,official_mobile_number:parseInt(d.official_mobile_number)}).then(n=>{n.data.status=="success"?(g.add({severity:"success",summary:"Updated",detail:"Contact information updated",life:3e3}),l.employeeDetails.email=d.email,l.employeeDetails.get_employee_office_details.officical_mail=d.official_email,l.employeeDetails.get_employee_details.mobile_number=d.mobile_number,l.employeeDetails.get_employee_office_details.official_mobile=d.official_mobile_number):n.data.status=="failure"&&(L.leave_request_error_messege=n.data.message)}).catch(n=>{console.log(n)}).finally(()=>{l.fetchEmployeeDetails(),m.value=!1}),u.value=!1}function se(){console.log("Opening General Info Dialog"),_.current_address=l.employeeDetails.get_employee_details.current_address_line_1,_.Permanent_Address=l.employeeDetails.get_employee_details.permanent_address_line_1,b.value=!0}const oe=()=>{if(m.value=!0,_.current_address==" "||_.Permanent_Address==" ")S.add({severity:"warn",summary:"Warn Message",detail:"Message Content",life:3e3});else{let s=`/profile-pages-update-address_info/${r.current_user_id}`;O.post(s,{user_code:l.employeeDetails.user_code,current_address_line_1:_.current_address,permanent_address_line_1:_.Permanent_Address}).then(n=>{data_checking.value=!1,n.data.status=="success"?(g.add({severity:"success",summary:"Updated",detail:"Address information updated",life:3e3}),l.employeeDetails.current_address_line_1=_.current_address,l.employeeDetails.get_employee_office_details.permanent_address_line_1=_.Permanent_Address):n.data.status=="failure"&&(U.leave_request_error_messege=n.data.message)}).catch(n=>{console.log(n)}).finally(()=>{l.fetchEmployeeDetails(),m.value=!1}),b.value=!1}};return(v,s)=>{const n=V("Toast"),te=V("ProgressSpinner"),Y=V("Dialog"),ae=V("Calendar"),P=V("Dropdown"),H=V("InputMask");return x(),w(ne,null,[p(n),p(Y,{header:"Header",visible:m.value,"onUpdate:visible":s[0]||(s[0]=a=>m.value=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:D(()=>[p(te,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:D(()=>[xe]),_:1},8,["visible"]),e("div",we,[e("div",Me,[e("h6",Se,[M("General Information "),e("a",{type:"button",class:"edit-icon",onClick:K},Ve),p(Y,{visible:y.value,"onUpdate:visible":s[7]||(s[7]=a=>y.value=a),modal:"",header:"General Information",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:D(()=>[e("div",null,[e("h5",{style:B({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," General Information",4)])]),default:D(()=>[e("div",Ce,[e("div",ke,[e("div",Ye,[Pe,e("div",Ie,[p(ae,{class:"mb-3 form-selects",modelValue:t.dob,"onUpdate:modelValue":s[1]||(s[1]=a=>t.dob=a),placeholder:"DD-MM-YYYY",dateFormat:"dd-mm-yy"},null,8,["modelValue"])])])]),e("div",Ee,[e("div",Le,[Ue,p(P,{modelValue:t.gender,"onUpdate:modelValue":s[2]||(s[2]=a=>t.gender=a),options:E.value,optionLabel:"name",optionValue:"value",placeholder:"Choose Gender",class:"form-selects"},null,8,["modelValue","options"])])]),e("div",Ge,[e("div",Be,[Ne,p(P,{modelValue:t.marital_status_id,"onUpdate:modelValue":s[3]||(s[3]=a=>t.marital_status_id=a),options:j.value,optionLabel:"name",optionValue:"id",placeholder:"Select Marital Status",class:"form-selects",style:{marginLeft:"10px",marginRight:"10px"}},null,8,["modelValue","options"])])]),e("div",Oe,[e("div",$e,[je,e("div",He,[p(P,{modelValue:t.blood_group_id,"onUpdate:modelValue":s[4]||(s[4]=a=>t.blood_group_id=a),options:$.value,optionLabel:"name",optionValue:"id",placeholder:"Select Bloodgroup",class:"form-selects"},null,8,["modelValue","options"])])])]),e("div",Te,[e("div",Fe,[Re,p(P,{modelValue:t.physically_challenged,"onUpdate:modelValue":s[5]||(s[5]=a=>t.physically_challenged=a),options:Z.value,optionLabel:"name",optionValue:"value",placeholder:"Select",class:"form-selects"},null,8,["modelValue","options"])])]),qe]),e("div",ze,[e("button",{id:"btn_submit_generalInfo",class:"btn btn-border-orange submit-btn",onClick:s[6]||(s[6]=a=>Q())},"Save")])]),_:1},8,["visible"])]),e("div",null,[e("ul",We,[e("li",Je,[Xe,e("div",Ze,f(c(N)(c(l).employeeDetails.get_employee_details.dob).format("DD-MMM-YYYY")),1)]),e("li",Ke,[Qe,e("div",el,f(c(z)),1)]),e("li",ll,[sl,e("div",ol,f(c(N)(c(l).employeeDetails.get_employee_details.doj).format("DD-MMM-YYYY")),1)]),e("li",tl,[al,e("div",il,f(c(W)),1)]),e("li",dl,[nl,e("div",rl,f(c(J)),1)]),e("li",cl,[_l,e("div",ml,f(c(X)),1)])])])])]),e("div",pl,[e("div",ul,[e("h6",fl,[M("Contact Information "),e("span",{class:"personal-edit"},[e("a",{href:"#",class:"edit-icon",onClick:ee},bl)]),p(Y,{visible:u.value,"onUpdate:visible":s[12]||(s[12]=a=>u.value=a),modal:"",header:"Contact Information",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:D(()=>[e("div",null,[e("h5",{style:B({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Contact Information",4)])]),default:D(()=>[e("div",hl,[e("div",yl,[e("div",vl,[e("div",Dl,[xl,C(e("input",{type:"email",name:"present_email",class:"form-control","onUpdate:modelValue":s[8]||(s[8]=a=>d.email=a)},null,512),[[I,d.email]])])]),e("div",wl,[e("div",Ml,[Sl,C(e("input",{type:"email",class:"form-control",name:"officical_mail","onUpdate:modelValue":s[9]||(s[9]=a=>d.official_email=a)},null,512),[[I,d.official_email]])])]),e("div",Al,[e("div",Vl,[Cl,p(H,{id:"basic",class:"form-control h-10",modelValue:d.mobile_number,"onUpdate:modelValue":s[10]||(s[10]=a=>d.mobile_number=a),mask:"9999999999",placeholder:"999999999"},null,8,["modelValue"])])]),e("div",kl,[e("div",Yl,[Pl,p(H,{id:"basic",class:"form-control h-10",modelValue:d.official_mobile_number,"onUpdate:modelValue":s[11]||(s[11]=a=>d.official_mobile_number=a),mask:"9999999999",placeholder:"999999999"},null,8,["modelValue"])])]),e("div",{class:"col-12"},[e("div",{class:"text-right"},[e("button",{class:"btn btn-border-orange submit-btn",onClick:le},"Save")])])])])]),_:1},8,["visible"])]),e("div",null,[e("ul",Il,[e("li",El,[Ll,e("div",Ul,f(c(l).employeeDetails.email),1)]),e("li",Gl,[Bl,e("div",Nl,f(c(l).employeeDetails.get_employee_office_details.officical_mail),1)]),e("li",Ol,[$l,e("div",jl,f(c(l).employeeDetails.get_employee_details.mobile_number),1)]),e("li",Hl,[Tl,c(l).employeeDetails.get_employee_office_details.official_mobile?(x(),w("div",Rl,f(c(l).employeeDetails.get_employee_office_details.official_mobile),1)):(x(),w("div",Fl," - "))])])])])]),e("div",ql,[e("div",zl,[e("h6",Wl,[M("Address "),e("span",{class:"personal-edit"},[e("a",{href:"#",class:"edit-icon",onClick:se},Xl)]),p(Y,{visible:b.value,"onUpdate:visible":s[16]||(s[16]=a=>b.value=a),modal:"",header:"",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:D(()=>[e("div",null,[e("h5",{style:B({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Address Information",4)])]),default:D(()=>[e("div",Zl,[e("div",Kl,[e("div",Ql,[es,C(e("textarea",{name:"current_address_line_1",id:"current_address_line_1",cols:"30",rows:"3",class:"form-control","onUpdate:modelValue":s[13]||(s[13]=a=>_.current_address=a)},null,512),[[I,_.current_address]])]),e("div",ls,[ss,C(e("textarea",{name:"permanent_address_line_1",id:"permanent_address_line_1",cols:"30",rows:"3",class:"form-control","onUpdate:modelValue":s[14]||(s[14]=a=>_.Permanent_Address=a)},null,512),[[I,_.Permanent_Address]])])]),e("div",os,[e("div",ts,[e("div",as,[C(e("input",{type:"checkbox",class:"border rounded-md","onUpdate:modelValue":s[15]||(s[15]=a=>A.value=a),style:{width:"20px",height:"20px"},onChange:q,value:1},null,544),[[de,A.value]]),is]),e("div",ds,[p(n),e("button",{id:"btn_submit_address",class:"btn btn-border-orange submit-btn warn",onClick:oe,severity:"warn"},"Save")])])])])]),_:1},8,["visible"])]),e("div",null,[e("div",ns,[e("div",rs,[e("ul",cs,[e("li",_s,[ms,c(l).employeeDetails.get_employee_details.current_address_line_1=="none"?(x(),w("div",ps," - ")):(x(),w("div",us,f(c(l).employeeDetails.get_employee_details.current_address_line_1),1))])])]),e("div",fs,[e("ul",gs,[e("li",bs,[hs,c(l).employeeDetails.get_employee_details.permanent_address_line_1=="none"?(x(),w("div",ys," - ")):(x(),w("div",vs,f(c(l).employeeDetails.get_employee_details.permanent_address_line_1),1))])])])])])])])],64)}}},Ys=ue(Ds,[["__scopeId","data-v-4f1b3639"]]);export{Ys as E,De as u};
