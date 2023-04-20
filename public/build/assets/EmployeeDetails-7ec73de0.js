import{B as g,M as C,V as p,X as j,Y as k,E as Q,c as ee,h as y,e,j as x,w as M,t as u,F as te,g as P,o as oe,l as N,i as A,z as V,a9 as le,aa as se}from"./toastservice.esm-be32db1e.js";import"./moment-fbc5633a.js";import{u as ae}from"./inputtext.esm-e9caa4ce.js";import{a as f}from"./index-f7a317fc.js";import{d as H}from"./pinia-283027a5.js";import{_ as ie}from"./_plugin-vue_export-helper-c27b6911.js";const ne=H("Service",()=>{const o=g(),n=g();return f.get("/currentUser").then(S=>{o.value=S.data}),f.get("/currentUserName").then(S=>{n.value=S.data}),{current_user_id:o,current_user_name:n,getBankList:()=>f.get("/db/getBankDetails"),getCountryList:()=>f.get("/db/getCountryDetails"),getStateList:()=>f.get("/db/getStatesDetails"),ManagerDetails:()=>f.get("/fetch-managers-name"),getBloodGroups:()=>f.get("/fetch-blood-groups"),DepartmentDetails:()=>f.get("/fetch-departments"),getMaritalStatus:()=>f.get("/fetch-marital-details")}}),de=H("employeeService",()=>{const o=g([]),n=g(!0),t=new URLSearchParams(window.location.search);let m="/profile-pages-getEmpDetails";t.has("uid")&&(m=m+"?uid="+t.get("uid"));async function b(){console.log("Getting employee details"),await f.get(m).then(c=>{console.log("fetchEmployeeDetails() : "+c.data),n.value=!1,o.value=c.data}).catch(c=>console.log(c)).finally(()=>console.log("completed"))}return{fetchEmployeeDetails:b,employeeDetails:o,loading_screen:n}});var T;const re=typeof window<"u";re&&((T=window==null?void 0:window.navigator)!=null&&T.userAgent)&&/iP(ad|hone|od)/.test(window.navigator.userAgent);function F(o){return typeof o=="function"?o():p(o)}const ce=/^(\d{4})[-/]?(\d{1,2})?[-/]?(\d{0,2})[Tt\s]*(\d{1,2})?:?(\d{1,2})?:?(\d{1,2})?[.:]?(\d+)?$/,_e=/\[([^\]]+)]|Y{1,4}|M{1,4}|D{1,2}|d{1,4}|H{1,2}|h{1,2}|a{1,2}|A{1,2}|m{1,2}|s{1,2}|Z{1,2}|SSS/g,me=(o,n,t,m)=>{let b=o<12?"AM":"PM";return m&&(b=b.split("").reduce((c,v)=>c+=`${v}.`,"")),t?b.toLowerCase():b},ue=(o,n,t={})=>{var m;const b=o.getFullYear(),c=o.getMonth(),v=o.getDate(),_=o.getHours(),l=o.getMinutes(),S=o.getSeconds(),B=o.getMilliseconds(),G=o.getDay(),w=(m=t.customMeridiem)!=null?m:me,U={YY:()=>String(b).slice(-2),YYYY:()=>b,M:()=>c+1,MM:()=>`${c+1}`.padStart(2,"0"),MMM:()=>o.toLocaleDateString(t.locales,{month:"short"}),MMMM:()=>o.toLocaleDateString(t.locales,{month:"long"}),D:()=>String(v),DD:()=>`${v}`.padStart(2,"0"),H:()=>String(_),HH:()=>`${_}`.padStart(2,"0"),h:()=>`${_%12||12}`.padStart(1,"0"),hh:()=>`${_%12||12}`.padStart(2,"0"),m:()=>String(l),mm:()=>`${l}`.padStart(2,"0"),s:()=>String(S),ss:()=>`${S}`.padStart(2,"0"),SSS:()=>`${B}`.padStart(3,"0"),d:()=>G,dd:()=>o.toLocaleDateString(t.locales,{weekday:"narrow"}),ddd:()=>o.toLocaleDateString(t.locales,{weekday:"short"}),dddd:()=>o.toLocaleDateString(t.locales,{weekday:"long"}),A:()=>w(_,l),AA:()=>w(_,l,!1,!0),a:()=>w(_,l,!0),aa:()=>w(_,l,!0,!0)};return n.replace(_e,(Y,I)=>I||U[Y]())},pe=o=>{if(o===null)return new Date(NaN);if(o===void 0)return new Date;if(o instanceof Date)return new Date(o);if(typeof o=="string"&&!/Z$/i.test(o)){const n=o.match(ce);if(n){const t=n[2]-1||0,m=(n[7]||"0").substring(0,3);return new Date(n[1],t,n[3]||1,n[4]||0,n[5]||0,n[6]||0,m)}}return new Date(o)};function ge(o,n="HH:mm:ss",t={}){return C(()=>ue(pe(F(o)),F(n),t))}const i=o=>(le("data-v-1ea99b6e"),o=o(),se(),o),fe={class:"mb-2 card"},be={class:"card-body"},he={class:""},ye=i(()=>e("i",{class:"ri-pencil-fill"},null,-1)),ve=[ye],De={class:"row"},xe={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Se={class:"mb-3 form-group"},we=i(()=>e("label",{style:{marginLeft:"10px"}},[x("Birth Date"),e("span",{class:"text-danger"},"*")],-1)),Me={class:"cal-icon"},Ae={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Ve={class:"mb-3 form-group"},Ce=i(()=>e("label",null,[x("Gender"),e("span",{class:"text-danger"},"*")],-1)),Ie={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Le={class:"mb-3 form-group"},Pe=i(()=>e("label",{style:{marginLeft:"10px"}},[x("Date Of Joining(DOJ)"),e("span",{class:"text-danger"},"*")],-1)),Be={class:"cal-icon"},Ge={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Ue={class:"mb-3 form-group"},Ye=i(()=>e("label",null,[x("Blood Group"),e("span",{class:"text-danger"},"*")],-1)),Ee={class:"cal-icon"},ke={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Ne={class:"mb-3 form-group",style:{marginLeft:"10px"}},Oe=i(()=>e("label",null,[x("Marital status "),e("span",{class:"text-danger"},"*")],-1)),$e={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},je={class:"mb-3 form-group"},Te=i(()=>e("label",null,"Physically Handicapped",-1)),Fe={class:"text-right col-12"},He={class:"personal-info"},ze={class:"pb-1 border-bottom-liteAsh"},Re=i(()=>e("div",{class:"title"},"Birthday",-1)),Je={class:"text"},qe={class:"pb-1 border-bottom-liteAsh"},Xe=i(()=>e("div",{class:"title"},"Gender ",-1)),We={class:"text"},Ze={class:"pb-1 border-bottom-liteAsh"},Ke=i(()=>e("div",{class:"title"},"Date Of Joining (DOJ)",-1)),Qe={class:"text"},et={class:"pb-1 border-bottom-liteAsh"},tt=i(()=>e("div",{class:"title"},"Marital Status ",-1)),ot={class:"text text-capitalize"},lt={class:"pb-1 border-bottom-liteAsh"},st=i(()=>e("div",{class:"title"}," Blood Group",-1)),at={class:"text"},it={class:"pb-1"},nt=i(()=>e("div",{class:"title"},"Physically Handicapped",-1)),dt={class:"text"},rt={class:"mb-2 card"},ct={class:"card-body"},_t={class:""},mt=i(()=>e("i",{class:"ri-pencil-fill"},null,-1)),ut=[mt],pt={class:"modal-body"},gt={class:"row"},ft={class:"col-md-6"},bt={class:"mb-3 form-group"},ht=i(()=>e("label",null,"Personal Email",-1)),yt={class:"col-md-6"},vt={class:"mb-3 form-group"},Dt=i(()=>e("label",null," Office Email",-1)),xt={class:"col-md-6"},St={class:"mb-3 form-group"},wt=i(()=>e("label",null,"Mobile Number",-1)),Mt={class:"col-md-6"},At={class:"mb-3 form-group"},Vt=i(()=>e("label",null,"Official Mobile Number",-1)),Ct={class:"personal-info"},It={class:"pb-1 border-bottom-liteAsh"},Lt=i(()=>e("div",{class:"title"},"Personal Email",-1)),Pt={class:"text"},Bt={class:"pb-1 border-bottom-liteAsh"},Gt=i(()=>e("div",{class:"title"},"Official Email",-1)),Ut={class:"text"},Yt={class:"pb-1"},Et=i(()=>e("div",{class:"title"},"Mobile Number",-1)),kt={class:"text"},Nt={class:"pb-1"},Ot=i(()=>e("div",{class:"title"},"Official Mobile Number",-1)),$t={class:"text"},jt={class:"mb-2 card"},Tt={class:"card-body"},Ft={class:""},Ht=i(()=>e("i",{class:"ri-pencil-fill"},null,-1)),zt=[Ht],Rt={class:"modal-body"},Jt={class:"col-md-12"},qt={class:"mb-3 form-group"},Xt=i(()=>e("label",null,"Current Address",-1)),Wt={class:"mb-3 form-group"},Zt=i(()=>e("label",null,"Permanent Address ",-1)),Kt={class:"col-12"},Qt={class:"text-right"},eo={class:"row"},to={class:"col-6"},oo={class:"personal-info"},lo={class:"pb-1 border-bottom-liteAsh flex-column"},so=i(()=>e("div",{class:"title"},"Current Address ",-1)),ao={class:"text"},io={class:"col-6"},no={class:"personal-info"},ro={class:"pb-1 border-bottom-liteAsh flex-column"},co=i(()=>e("div",{class:"title"},"Permanent Address ",-1)),_o={class:"text"},mo={__name:"EmployeeDetails",setup(o){const n=ne(),t=de(),m=j(),b=j(),c=g(!1),v=g(!1),_=g(!1),l=k({dob:"",gender:"",doj:"",blood_group_id:"",marital_status_id:"",physically_challenged:""}),S=g([{name:"Male",value:"male"},{name:"Female",value:"female"},{name:"Others",value:"others"}]),B=C(()=>t.employeeDetails.get_employee_details.gender=="male"?"Male":t.employeeDetails.get_employee_details.gender=="female"?"Female":t.employeeDetails.get_employee_details.gender=="others"?"Others":"-"),G=C(()=>{if(t.employeeDetails.get_employee_details.marital_status_id==1)return"Unmarried";if(t.employeeDetails.get_employee_details.marital_status_id==2)return"Married";if(t.employeeDetails.get_employee_details.marital_status_id==3)return"Separated";if(t.employeeDetails.get_employee_details.marital_status_id==4)return"Widowed";if(t.employeeDetails.get_employee_details.marital_status_id==5)return"Divorced"}),w=C(()=>{if(t.employeeDetails.get_employee_details.blood_group_id==1)return"A Positive";if(t.employeeDetails.get_employee_details.blood_group_id==2)return"A Negative";if(t.employeeDetails.get_employee_details.blood_group_id==3)return"B Positive";if(t.employeeDetails.get_employee_details.blood_group_id==4)return"B Negative";if(t.employeeDetails.get_employee_details.blood_group_id==5)return"AB Positive";if(t.employeeDetails.get_employee_details.blood_group_id==6)return"AB Negative";if(t.employeeDetails.get_employee_details.blood_group_id==7)return"O Positive";if(t.employeeDetails.get_employee_details.blood_group_id==8)return"O Negative"}),U=C(()=>{if(t.employeeDetails.get_employee_details.physically_challenged=="no")return"No";if(t.employeeDetails.get_employee_details.physically_challenged=="yes")return"Yes"}),Y=g([{name:"Yes",value:"yes"},{name:"No",value:"no"}]),I=g(),O=g();ae(),Q(()=>{n.getBloodGroups().then(D=>{console.log(D.data),I.value=D.data}),n.getMaritalStatus().then(D=>{console.log(D),O.value=D.data})});function z(){console.log("Opening General Info Dialog"),l.dob=t.employeeDetails.get_employee_details.dob,l.doj=t.employeeDetails.get_employee_details.doj,l.marital_status_id=parseInt(t.employeeDetails.get_employee_details.marital_status_id),l.gender=t.employeeDetails.get_employee_details.gender,l.blood_group_id=parseInt(t.employeeDetails.get_employee_details.blood_group_id),l.physically_challenged=t.employeeDetails.get_employee_details.physically_challenged,c.value=!0}function R(){console.log("Called saveGeneralInformationDetails.... ");let s=`/profile-pages-update-generalinfo/${n.current_user_id}`;f.post(s,{user_code:t.employeeDetails.user_code,dob:l.dob,gender:l.gender,marital_status_id:l.marital_status_id,doj:l.doj,blood_group_id:l.blood_group_id,physically_challenged:l.physically_challenged}).then(r=>{r.data.status=="success"?(window.location.reload(),m.add({severity:"success",summary:"Updated",detail:"General information updated",life:3e3}),t.employeeDetails.get_employee_details.dob=ge(l.dob,"YYYY-MM-DD"),t.employeeDetails.gender=l.gender,t.employeeDetails.marital_status_id=l.marital_status_id,t.employeeDetails.get_employee_details.doj=l.doj,t.employeeDetails.blood_group_id=l.blood_group_id,t.employeeDetails.physically_challenged=l.physically_challenged):r.data.status=="failure"&&(leave_data.leave_request_error_messege=r.data.message)}).catch(r=>{console.log(r)}),c.value=!1,window.location.reload()}const J=g(),d=k({email:"",official_email:"",mobile_number:"",official_mobile_number:""});function q(){console.log("Opening General Info Dialog : "),d.email=t.employeeDetails.email,d.official_email=t.employeeDetails.get_employee_office_details.officical_mail,console.log("Mobile number : "+t.employeeDetails.mobile_number),d.mobile_number=parseInt(t.employeeDetails.get_employee_details.mobile_number),d.official_mobile_number=parseInt(t.employeeDetails.get_employee_office_details.official_mobile),console.log("testing"),v.value=!0}function X(){console.log("testing contact");let s=`/profile-pages-update-contactinfo/${n.current_user_id}`;f.post(s,{user_code:t.employeeDetails.user_code,email:d.email,officical_mail:d.official_email,mobile_number:d.mobile_number,official_mobile_number:d.official_mobile_number}).then(r=>{r.data.status=="success"?(console.log("Updating mobile number : "+d.mobile_number),t.employeeDetails.email=d.email,t.employeeDetails.get_employee_office_details.officical_mail=d.official_email,t.employeeDetails.get_employee_details.mobile_number=d.mobile_number,t.employeeDetails.get_employee_office_details.official_mobile=d.official_mobile_number):r.data.status=="failure"&&(J.leave_request_error_messege=r.data.message)}).catch(r=>{console.log(r)}),v.value=!1,window.location.reload()}const W=g(),h=k({current_address:"",Permanent_Address:""});function Z(){console.log("Opening General Info Dialog"),h.current_address=t.employeeDetails.get_employee_details.current_address_line_1,h.Permanent_Address=t.employeeDetails.get_employee_details.permanent_address_line_1,_.value=!0}const K=()=>{if(h.current_address==" "||h.Permanent_Address==" ")b.add({severity:"warn",summary:"Warn Message",detail:"Message Content",life:3e3}),console.log(Addressinfo);else{let s=`/profile-pages-update-address_info/${n.current_user_id}`;f.post(s,{user_code:t.employeeDetails.user_code,current_address_line_1:h.current_address,permanent_address_line_1:h.Permanent_Address}).then(r=>{data_checking.value=!1,r.data.status=="success"?(t.employeeDetails.current_address_line_1=h.current_address,t.employeeDetails.get_employee_office_details.permanent_address_line_1=h.Permanent_Address):r.data.status=="failure"&&(W.leave_request_error_messege=r.data.message)}).catch(r=>{console.log(r)}),_.value=!1,window.location.reload()}};return(D,s)=>{const r=P("Toast"),$=P("Calendar"),L=P("Dropdown"),E=P("Dialog");return oe(),ee(te,null,[y(r),e("div",fe,[e("div",be,[e("h6",he,[x("General Information "),e("a",{type:"button",class:"edit-icon",onClick:z},ve),y(E,{visible:c.value,"onUpdate:visible":s[7]||(s[7]=a=>c.value=a),modal:"",header:"General Information",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:M(()=>[e("div",null,[e("h5",{style:N({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," General Information",4)])]),default:M(()=>[e("div",De,[e("div",xe,[e("div",Se,[we,e("div",Me,[y($,{showIcon:"",class:"mb-3 form-selects",modelValue:l.dob,"onUpdate:modelValue":s[0]||(s[0]=a=>l.dob=a),placeholder:"DD-MM-YYYY",dateFormat:"dd-mm-yy"},null,8,["modelValue"])])])]),e("div",Ae,[e("div",Ve,[Ce,y(L,{modelValue:l.gender,"onUpdate:modelValue":s[1]||(s[1]=a=>l.gender=a),options:S.value,optionLabel:"name",optionValue:"value",placeholder:"Choose Gender",class:"form-selects"},null,8,["modelValue","options"])])]),e("div",Ie,[e("div",Le,[Pe,e("div",Be,[y($,{showIcon:"",class:"mb-3 form-selects",modelValue:l.doj,"onUpdate:modelValue":s[2]||(s[2]=a=>l.doj=a),placeholder:"DD-MM-YYYY",dateFormat:"dd-mm-yy"},null,8,["modelValue"])])])]),e("div",Ge,[e("div",Ue,[Ye,e("div",Ee,[y(L,{modelValue:l.blood_group_id,"onUpdate:modelValue":s[3]||(s[3]=a=>l.blood_group_id=a),options:I.value,optionLabel:"name",optionValue:"id",placeholder:"Select Bloodgroup",class:"form-selects"},null,8,["modelValue","options"])]),x(" "+u(l.blood_group_id),1)])]),e("div",ke,[e("div",Ne,[Oe,y(L,{modelValue:l.marital_status_id,"onUpdate:modelValue":s[4]||(s[4]=a=>l.marital_status_id=a),options:O.value,optionLabel:"name",optionValue:"id",placeholder:"Select Marital Status",class:"form-selects"},null,8,["modelValue","options"])])]),e("div",$e,[e("div",je,[Te,y(L,{modelValue:l.physically_challenged,"onUpdate:modelValue":s[5]||(s[5]=a=>l.physically_challenged=a),options:Y.value,optionLabel:"name",optionValue:"value",placeholder:"Select",class:"form-selects"},null,8,["modelValue","options"])])])]),e("div",Fe,[e("button",{id:"btn_submit_generalInfo",class:"btn btn-border-orange submit-btn",onClick:s[6]||(s[6]=a=>R())},"Save")])]),_:1},8,["visible"])]),e("div",null,[e("ul",He,[e("li",ze,[Re,e("div",Je,u(p(t).employeeDetails.get_employee_details.dob),1)]),e("li",qe,[Xe,e("div",We,u(p(B)),1)]),e("li",Ze,[Ke,e("div",Qe,u(p(t).employeeDetails.get_employee_details.doj),1)]),e("li",et,[tt,e("div",ot,u(p(G)),1)]),e("li",lt,[st,e("div",at,u(p(w))+" ",1)]),e("li",it,[nt,e("div",dt,u(p(U)),1)])])])])]),e("div",rt,[e("div",ct,[e("h6",_t,[x("Contact Information "),e("span",{class:"personal-edit"},[e("a",{href:"#",class:"edit-icon",onClick:q},ut)]),y(E,{visible:v.value,"onUpdate:visible":s[12]||(s[12]=a=>v.value=a),modal:"",header:"Contact Information",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:M(()=>[e("div",null,[e("h5",{style:N({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Contact Information",4)])]),default:M(()=>[e("div",pt,[e("div",gt,[e("div",ft,[e("div",bt,[ht,A(e("input",{type:"email",name:"present_email",class:"form-control","onUpdate:modelValue":s[8]||(s[8]=a=>d.email=a)},null,512),[[V,d.email]])])]),e("div",yt,[e("div",vt,[Dt,A(e("input",{type:"email",class:"form-control",name:"officical_mail","onUpdate:modelValue":s[9]||(s[9]=a=>d.official_email=a)},null,512),[[V,d.official_email]])])]),e("div",xt,[e("div",St,[wt,A(e("input",{type:"text",size:"20",maxlength:"10",name:"mobile_number",class:"form-control","onUpdate:modelValue":s[10]||(s[10]=a=>d.mobile_number=a)},null,512),[[V,d.mobile_number]])])]),e("div",Mt,[e("div",At,[Vt,A(e("input",{type:"text",size:"20",maxlength:"10",name:"official_mobile_number",class:"form-control","onUpdate:modelValue":s[11]||(s[11]=a=>d.official_mobile_number=a)},null,512),[[V,d.official_mobile_number]])])]),e("div",{class:"col-12"},[e("div",{class:"text-right"},[e("button",{class:"btn btn-border-orange submit-btn",onClick:X},"Save")])])])])]),_:1},8,["visible"])]),e("div",null,[e("ul",Ct,[e("li",It,[Lt,e("div",Pt,u(p(t).employeeDetails.email),1)]),e("li",Bt,[Gt,e("div",Ut,u(p(t).employeeDetails.get_employee_office_details.officical_mail),1)]),e("li",Yt,[Et,e("div",kt,u(p(t).employeeDetails.get_employee_details.mobile_number),1)]),e("li",Nt,[Ot,e("div",$t,u(p(t).employeeDetails.get_employee_office_details.official_mobile),1)])])])])]),e("div",jt,[e("div",Tt,[e("h6",Ft,[x("Address "),e("span",{class:"personal-edit"},[e("a",{href:"#",class:"edit-icon",onClick:Z},zt)]),y(E,{visible:_.value,"onUpdate:visible":s[15]||(s[15]=a=>_.value=a),modal:"",header:"",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:M(()=>[e("div",null,[e("h5",{style:N({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Address Information",4)])]),default:M(()=>[e("div",Rt,[e("div",Jt,[e("div",qt,[Xt,A(e("textarea",{name:"current_address_line_1",id:"current_address_line_1",cols:"30",rows:"3",class:"form-control","onUpdate:modelValue":s[13]||(s[13]=a=>h.current_address=a)},null,512),[[V,h.current_address]])]),e("div",Wt,[Zt,A(e("textarea",{name:"permanent_address_line_1",id:"permanent_address_line_1",cols:"30",rows:"3",class:"form-control","onUpdate:modelValue":s[14]||(s[14]=a=>h.Permanent_Address=a)},null,512),[[V,h.Permanent_Address]])])]),e("div",Kt,[e("div",Qt,[y(r),e("button",{id:"btn_submit_address",class:"btn btn-border-orange submit-btn warn",onClick:K,severity:"warn"},"Save")])])])]),_:1},8,["visible"])]),e("div",null,[e("div",eo,[e("div",to,[e("ul",oo,[e("li",lo,[so,e("div",ao,u(p(t).employeeDetails.get_employee_details.current_address_line_1),1)])])]),e("div",io,[e("ul",no,[e("li",ro,[co,e("div",_o,u(p(t).employeeDetails.get_employee_details.permanent_address_line_1),1)])])])])])])])],64)}}},yo=ie(mo,[["__scopeId","data-v-1ea99b6e"]]);export{yo as E,ne as S,de as p};
