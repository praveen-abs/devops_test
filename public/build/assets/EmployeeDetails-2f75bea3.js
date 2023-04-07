import{G as i,a as n,K as E,L as U,H as q,b as z,g as e,l as v,j as d,w as y,t as r,N as c,F,i as x,o as H,q as B,k as D,B as V,a6 as Y,a7 as K}from"./toastservice.esm-755d2ad6.js";import"./moment-fbc5633a.js";import{u as R}from"./inputtext.esm-2a9cd591.js";import{d as j}from"./pinia-97ae7d59.js";import{_ as W}from"./_plugin-vue_export-helper-c27b6911.js";const Q=j("Service",()=>{const _=i(),m=i();return n.get("/currentUser").then(g=>{_.value=g.data,console.log("service class"+g.data)}),n.get("/currentUserName").then(g=>{m.value=g.data,console.log("service class"+g.data)}),{current_user_id:_,current_user_name:m,getBankList:()=>n.get("/db/getBankDetails"),getCountryList:()=>n.get("/db/getCountryDetails"),getStateList:()=>n.get("/db/getStatesDetails"),ManagerDetails:()=>n.get("/fetch-managers-name"),getBloodGroups:()=>n.get("/fetch-blood-groups"),DepartmentDetails:()=>n.get("/fetch-departments"),getMaritalStatus:()=>n.get("/fetch-marital-details")}}),X=j("employeeService",()=>{const _=i([]),m=i(!0);n.get("http://localhost:8000/api/profile-pages-getEmpDetails?user_id=174").then(h=>{console.log(h.data),_.value=h.data.data[0],m.value=!1}).catch(h=>console.log(h)).finally(()=>console.log("completed"));async function a(h){return await n.post("/api/profile-pages-getEmpDetails",{encr_uid:h})}return{employeeDetails:_,fetchCurrentEmployee:a,loading:m}});const t=_=>(Y("data-v-ddb63b85"),_=_(),K(),_),Z={class:"mb-2 card"},ee={class:"card-body"},se={class:""},oe=t(()=>e("i",{class:"ri-pencil-fill"},null,-1)),te=[oe],le={class:"row"},ae={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},ie={class:"mb-3 form-group"},ne=t(()=>e("label",{style:{marginLeft:"10px"}},[v("Birth Date"),e("span",{class:"text-danger"},"*")],-1)),de={class:"cal-icon"},re={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},ce={class:"mb-3 form-group"},_e=t(()=>e("label",null,[v("Gender"),e("span",{class:"text-danger"},"*")],-1)),me={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},ue={class:"mb-3 form-group"},pe=t(()=>e("label",{style:{marginLeft:"10px"}},[v("Date Of Joining(DOJ)"),e("span",{class:"text-danger"},"*")],-1)),he={class:"cal-icon"},be={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},ve={class:"mb-3 form-group"},ge=t(()=>e("label",null,[v("Blood Group"),e("span",{class:"text-danger"},"*")],-1)),fe={class:"cal-icon"},ye={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},xe={class:"mb-3 form-group",style:{marginLeft:"10px"}},De=t(()=>e("label",null,[v("Marital status "),e("span",{class:"text-danger"},"*")],-1)),Ve={class:"col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6"},Ce={class:"mb-3 form-group"},Ae=t(()=>e("label",null,"Physically Handicapped",-1)),Se={class:"text-right col-12"},we={class:"personal-info"},Le={class:"pb-1 border-bottom-liteAsh"},Ie=t(()=>e("div",{class:"title"},"Birthday",-1)),Ue={class:"text"},Be={class:"pb-1 border-bottom-liteAsh"},Me=t(()=>e("div",{class:"title"},"Gender ",-1)),Ge={class:"text"},ke={class:"pb-1 border-bottom-liteAsh"},Ee=t(()=>e("div",{class:"title"},"Date Of Joining (DOJ)",-1)),je={class:"text"},Pe={class:"pb-1 border-bottom-liteAsh"},Ne=t(()=>e("div",{class:"title"},"Marital Status ",-1)),Te={class:"text text-capitalize"},Oe={class:"pb-1 border-bottom-liteAsh"},$e=t(()=>e("div",{class:"title"}," Blood Group",-1)),Je={class:"text"},qe={class:"pb-1"},ze=t(()=>e("div",{class:"title"},"Physically Handicapped",-1)),Fe={class:"text"},He={class:"mb-2 card"},Ye={class:"card-body"},Ke={class:""},Re={class:"personal-edit"},We=t(()=>e("i",{class:"ri-pencil-fill"},null,-1)),Qe=[We],Xe={class:"modal-body"},Ze={class:"row"},es={class:"col-md-6"},ss={class:"mb-3 form-group"},os=t(()=>e("label",null,"Personal Email",-1)),ts={class:"col-md-6"},ls={class:"mb-3 form-group"},as=t(()=>e("label",null," Office Email",-1)),is={class:"col-md-6"},ns={class:"mb-3 form-group"},ds=t(()=>e("label",null,"Mobile Number",-1)),rs={class:"col-12"},cs={class:"text-right"},_s={class:"personal-info"},ms={class:"pb-1 border-bottom-liteAsh"},us=t(()=>e("div",{class:"title"},"Personal Email",-1)),ps={class:"text"},hs={class:"pb-1 border-bottom-liteAsh"},bs=t(()=>e("div",{class:"title"},"Office Email",-1)),vs={class:"text"},gs={class:"pb-1"},fs=t(()=>e("div",{class:"title"},"Mobile Number",-1)),ys={class:"text"},xs={class:"mb-2 card"},Ds={class:"card-body"},Vs={class:""},Cs={class:"personal-edit"},As=t(()=>e("i",{class:"ri-pencil-fill"},null,-1)),Ss=[As],ws={class:"modal-body"},Ls={class:"col-md-12"},Is={class:"mb-3 form-group"},Us=t(()=>e("label",null,"Current Address",-1)),Bs={class:"mb-3 form-group"},Ms=t(()=>e("label",null,"Permanent Address ",-1)),Gs={class:"col-12"},ks={class:"text-right"},Es={class:"row"},js={class:"col-6"},Ps={class:"personal-info"},Ns={class:"pb-1 border-bottom-liteAsh flex-column"},Ts=t(()=>e("div",{class:"title"},"Current Address ",-1)),Os={class:"text"},$s={class:"col-6"},Js={class:"personal-info"},qs={class:"pb-1 border-bottom-liteAsh flex-column"},zs=t(()=>e("div",{class:"title"},"permanent Address ",-1)),Fs={class:"text"},Hs={__name:"EmployeeDetails",setup(_){const m=Q(),a=X(),h=E(),L=E(),C=i(!1),A=i(!1),S=i(!1);i();const l=U({birth_date:"",gender:"",date_of_joining:"",blood_group_id:"",marital_status_id:"",phy_handicapped:""}),g=i([{name:"Male",value:"male"},{name:"Female",value:"female"},{name:"Others",value:"others"}]),P=i([{name:"Yes",value:"yes"},{name:"No",value:"no"}]),M=i(),G=i(),N=R();function T(){console.log("Called saveGeneralInformationDetails.... ");let s=`/profile-pages-update-generalinfo/${m.current_user_id}`;n.post(s,{user_id:l.user_id,dob:l.birth_date,gender:l.gender,marital_status_id:l.marital_status_id,doj:l.date_of_joining,blood_group_id:l.blood_group_id,physically_challenged:l.phy_handicapped}).then(b=>{data_checking.value=!1,b.data.status=="success"||b.data.status=="failure"&&(leave_data.leave_request_error_messege=b.data.message)}).catch(b=>{console.log(b)})}const O=()=>{console.log(m.current_user_id),console.log(l),N.require({message:"Are you sure you want to proceed?",header:"Confirmation",icon:"pi pi-exclamation-triangle",accept:()=>{T()},reject:()=>{h.add({severity:"error",summary:"Rejected",detail:"You have rejected",life:3e3})}})};q(()=>{m.getBloodGroups().then(p=>{console.log(p),M.value=p.data}),m.getMaritalStatus().then(p=>{console.log(p),G.value=p.data})}),i();const f=U({personal_email:"",office_email:"",mobile_number:""});i();const u=U({current_address:"",Permanent_Address:""}),$=()=>{if(console.log("calling saveinfoDetails"),u.current_address==" "||u.Permanent_Address==" ")L.add({severity:"warn",summary:"Warn Message",detail:"Message Content",life:3e3}),console.log(u);else{let p="http://localhost:3000/Address_details";console.log("hello"),n.post(p,{user_id:u.user_id,current_address_line_1:u.current_address,permanent_address_line_1:u.Permanent_Address}).then(s=>{s.data.status=="success"?console.log("hi"):s.data.status=="failure"&&console.log(s.data.message)}).catch(s=>{console.log(s)})}};return(p,s)=>{const b=x("Calendar"),w=x("Dropdown"),k=x("Toast"),J=x("ConfirmDialog"),I=x("Dialog");return H(),z(F,null,[e("div",Z,[e("div",ee,[e("h6",se,[v("General Information "),e("a",{type:"button",class:"edit-icon",onClick:s[0]||(s[0]=o=>C.value=!0)},te),d(I,{visible:C.value,"onUpdate:visible":s[8]||(s[8]=o=>C.value=o),modal:"",header:"General Information",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:y(()=>[e("div",null,[e("h5",{style:B({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," General Information",4)])]),default:y(()=>[e("div",le,[e("div",ae,[e("div",ie,[ne,e("div",de,[d(b,{showIcon:"",class:"mb-3 form-selects",modelValue:l.birth_date,"onUpdate:modelValue":s[1]||(s[1]=o=>l.birth_date=o),placeholder:"9999-12-31"},null,8,["modelValue"])])])]),e("div",re,[e("div",ce,[_e,d(w,{modelValue:l.gender,"onUpdate:modelValue":s[2]||(s[2]=o=>l.gender=o),options:g.value,optionLabel:"name",placeholder:"Choose Gender",class:"form-selects"},null,8,["modelValue","options"])])]),e("div",me,[e("div",ue,[pe,e("div",he,[d(b,{showIcon:"",class:"mb-3 form-selects",modelValue:l.date_of_joining,"onUpdate:modelValue":s[3]||(s[3]=o=>l.date_of_joining=o),placeholder:"9999-12-31"},null,8,["modelValue"])])])]),e("div",be,[e("div",ve,[ge,e("div",fe,[d(w,{modelValue:l.blood_group_id,"onUpdate:modelValue":s[4]||(s[4]=o=>l.blood_group_id=o),options:M.value,optionLabel:"name",placeholder:"Select Bloodgroup",class:"form-selects"},null,8,["modelValue","options"])])])]),e("div",ye,[e("div",xe,[De,d(w,{modelValue:l.marital_status_id,"onUpdate:modelValue":s[5]||(s[5]=o=>l.marital_status_id=o),options:G.value,optionLabel:"name",placeholder:"Select Marital Status",class:"form-selects"},null,8,["modelValue","options"])])]),e("div",Ve,[e("div",Ce,[Ae,d(w,{modelValue:l.phy_handicapped,"onUpdate:modelValue":s[6]||(s[6]=o=>l.phy_handicapped=o),options:P.value,optionLabel:"name",placeholder:"Select",class:"form-selects"},null,8,["modelValue","options"])])])]),e("div",Se,[d(k),d(J),e("button",{id:"btn_submit_generalInfo",class:"btn btn-border-orange submit-btn",onClick:s[7]||(s[7]=o=>O())},"Save")])]),_:1},8,["visible"])]),e("div",null,[e("ul",we,[e("li",Le,[Ie,e("div",Ue,r(c(a).employeeDetails.dob),1)]),e("li",Be,[Me,e("div",Ge,r(c(a).employeeDetails.gender),1)]),e("li",ke,[Ee,e("div",je,r(c(a).employeeDetails.doj),1)]),e("li",Pe,[Ne,e("div",Te,r(c(a).employeeDetails.marital_status),1)]),e("li",Oe,[$e,e("div",Je,r(c(a).employeeDetails.blood_group_id),1)]),e("li",qe,[ze,e("div",Fe,r(c(a).employeeDetails.physically_challenged),1)])])])])]),e("div",He,[e("div",Ye,[e("h6",Ke,[v("Contact Information "),e("span",Re,[e("a",{href:"#",class:"edit-icon","data-bs-target":"#personal_info_modal",onClick:s[9]||(s[9]=o=>A.value=!0)},Qe)]),d(I,{visible:A.value,"onUpdate:visible":s[14]||(s[14]=o=>A.value=o),modal:"",header:"Contact Information",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:y(()=>[e("div",null,[e("h5",{style:B({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Contact Information",4)])]),default:y(()=>[e("div",Xe,[e("div",Ze,[e("div",es,[e("div",ss,[os,D(e("input",{type:"email",name:"present_email",class:"form-control","onUpdate:modelValue":s[10]||(s[10]=o=>f.personal_email=o)},null,512),[[V,f.personal_email]])])]),e("div",ts,[e("div",ls,[as,D(e("input",{type:"email",class:"form-control",name:"officical_mail","onUpdate:modelValue":s[11]||(s[11]=o=>f.office_email=o)},null,512),[[V,f.office_email]])])]),e("div",is,[e("div",ns,[ds,D(e("input",{type:"text",size:"20",maxlength:"10",name:"mobile_number",class:"form-control","onUpdate:modelValue":s[12]||(s[12]=o=>f.mobile_number=o)},null,512),[[V,f.mobile_number]])])]),e("div",rs,[e("div",cs,[e("button",{id:"btn_submit_contact_info",class:"btn btn-border-orange submit-btn",onClick:s[13]||(s[13]=o=>p.savecontactInfoDetails())},"Save")])])])])]),_:1},8,["visible"])]),e("ul",_s,[e("li",ms,[us,e("div",ps,r(c(a).employeeDetails.email),1)]),e("li",hs,[bs,e("div",vs,r(c(a).employeeDetails.officical_mail),1)]),e("li",gs,[fs,e("div",ys,r(c(a).employeeDetails.official_mobile),1)])])])]),e("div",xs,[e("div",Ds,[e("h6",Vs,[v("Address "),e("span",Cs,[e("a",{href:"#",class:"edit-icon","data-bs-target":"#edit_addressInfo",onClick:s[15]||(s[15]=o=>S.value=!0)},Ss)]),d(I,{visible:S.value,"onUpdate:visible":s[18]||(s[18]=o=>S.value=o),modal:"",header:"",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:y(()=>[e("div",null,[e("h5",{style:B({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Address Information",4)])]),default:y(()=>[e("div",ws,[e("div",Ls,[e("div",Is,[Us,D(e("textarea",{name:"current_address_line_1",id:"current_address_line_1",cols:"30",rows:"3",class:"form-control","onUpdate:modelValue":s[16]||(s[16]=o=>u.current_address=o)},null,512),[[V,u.current_address]])]),e("div",Bs,[Ms,D(e("textarea",{name:"permanent_address_line_1",id:"permanent_address_line_1",cols:"30",rows:"3",class:"form-control","onUpdate:modelValue":s[17]||(s[17]=o=>u.Permanent_Address=o)},null,512),[[V,u.Permanent_Address]])])]),e("div",Gs,[e("div",ks,[d(k),e("button",{id:"btn_submit_address",class:"btn btn-border-orange submit-btn warn",onClick:$,severity:"warn"},"Save")])])])]),_:1},8,["visible"])]),e("div",Es,[e("div",js,[e("ul",Ps,[e("li",Ns,[Ts,e("div",Os,r(c(a).employeeDetails.current_address_line_1),1)])])]),e("div",$s,[e("ul",Js,[e("li",qs,[zs,e("div",Fs,r(c(a).employeeDetails.permanent_address_line_1),1)])])])])])])],64)}}},Xs=W(Hs,[["__scopeId","data-v-ddb63b85"]]);export{Xs as E,Q as S,X as e};
