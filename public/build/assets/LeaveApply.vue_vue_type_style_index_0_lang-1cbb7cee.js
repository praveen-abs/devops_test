import{q as K,r as t,s as ee,x as te,y as ce,z as ae}from"./app-0d86d2e8.js";import{a as m}from"./index-362795f3.js";import{h as I}from"./moment-fbc5633a.js";import{S as Q}from"./Service-3f402bb5.js";import"./dayjs.min-2f06af28.js";const ue=K("calendar",()=>{const s=le();Q();const i=t(new Date().getFullYear()),o=t(new Date().getMonth()),Y=t(new Date().getDate()),e=ee(()=>i.value),A=ee(()=>o.value),h=ee(()=>Y.value);function r(c){i.value=i.value+c}function y(c){i.value=i.value-c}function g(c){if(s.canShowLoading=!0,o.value==11){r(1),o.value=0;return}o.value=o.value+c,console.log(s.isTeamOrg),s.getSelectedEmployeeTeamDetails(s.currentlySelectedTeamMemberUserId),s.getSelectedEmployeeOrgDetails(s.currentlySelectedOrgMemberUserId),s.getSelectedEmployeeAttendance()}function p(c){if(s.canShowLoading=!0,o.value==0){y(1),o.value=11;return}o.value=o.value-c,s.getSelectedEmployeeTeamDetails(s.currentlySelectedTeamMemberUserId),s.getSelectedEmployeeOrgDetails(s.currentlySelectedOrgMemberUserId),s.getSelectedEmployeeAttendance()}function S(c){o.value=c}function b(c){i.value=c}function M(){i.value=new Date().getFullYear(),o.value=new Date().getMonth(),Y.value=new Date().getDate()}return{year:i,month:o,day:Y,getYear:e,getMonth:A,getDay:h,incrementYear:r,incrementMonth:g,decrementMonth:p,setMonth:S,setYear:b,resetDate:M}});te("$swal");const le=K("Timesheet",()=>{const s=ue(),i=Q(),o=t(!0),Y=t(!1),e=t("single"),A=t("Classic"),h=t(),r=t(1),y=t({}),g=t({}),p=t({}),S=t({}),b=t(),M=t(),c=t({}),j=t({}),C=t(!1),H=t(!1),P=t(!1),F=t(!1),$=t(!1),N=t(!1),B=t(),G=t(0),d=t(),v=t(),D=t(),E=t(),w=async(a,n,u)=>{o.value=!0;let L="/fetch-attendance-user-timesheet";try{return await m.post(L,{month:n+1,year:u,user_code:a}).then(x=>(console.log(" getEmployeeAttendance() : "+Object.values(x.data)),x.data))}catch(x){return console.error("Error [ getEmployeeAttendance() ]:",x),null}},O=async()=>{try{return o.value=!0,await w(i.current_user_code,s.getMonth,s.getYear).then(a=>{if(console.log("getSelectedEmployeeAttendance() : "+a),a)console.log("Selected employee attendance : "+a.data),B.value=Object.values(a.data),G.value=Object.values(a.data).length;else return null})}catch(a){console.error("Error [ getSelectedEmployeeAttendance() ]:",a)}finally{o.value=!1}},l=(a,n)=>{e.value=n,o.value=!0,d.value=a,w(a,s.getMonth,s.getYear).then(u=>{v.value=Object.values(u.data)}).catch(u=>{console.log("Error[ getSelectedEmployeeTeamDetails)() ]",u)}).finally(()=>{o.value=!1})},X=async(a,n,u)=>{e.value=n,console.log("==========="+u),h.value=u,console.log("employee list select function  ::",h.value),o.value=!0,D.value=a,await w(a,s.getMonth,s.getYear).then(L=>{console.log(" getSelectedEmployeeOrgDetails() : "+Object.values(L.data)),E.value=Object.values(L.data)}).finally(()=>{o.value=!1})},Z=async a=>m.post("/fetch-team-members",{user_code:a}),J=async()=>m.get("/fetch-org-members"),f=a=>a=="biometric"?"fas fa-fingerprint fs-12":a=="web"?"fa fa-laptop fs-12":a=="mobile"?"fa fa-mobile-phone fs-12":"",_=(a,n)=>{let u=h.value;if(console.log("00000000000000000".currentlySelectedUser),r.value==2||r.value==3){if(i.current_user_role===2){let L={admin_user_code:i.current_user_code,user_code:u,regularization_type:n,attendance_date:a.date,user_time:a.checkin_time,regularize_time:n=="LC"||n=="MIP"?z(b.value):n=="EG"||n=="MOP"?z(M.value):"",reason:a.reason,custom_reason:a.custom_reason?a.custom_reason:""};return b.value=null,M.value=null,L}}else{let L={user_code:i.current_user_code,regularization_type:n,attendance_date:a.date,user_time:n=="EG"?a.checkout_time:a.checkin_time,regularize_time:n=="LC"||n=="MIP"?z(b.value):n=="EG"||n=="MOP"?z(M.value):"",reason:a.reason,custom_reason:a.custom_reason?a.custom_reason:""};return b.value=null,M.value=null,L}},k=a=>{P.value=!0,p.value={...a}},q=()=>{o.value=!0;let a;r.value==2||r.value==3?i.current_user_role==2&&(a="/checkAttendanceEmployeeAdminStatus"):a="/attendance-req-regularization",m.post(a,_(p.value,"LC")).then(n=>{O();let u=n.data.message;console.log(u),n.data.status=="success"?Swal.fire("Good job!","Attendance Regularized Successful","success"):Swal.fire("Fill!",`${u}`,"error")}).finally(()=>{o.value=!1})},U=a=>{F.value=!0,S.value={...a}},T=()=>{let a;r.value==2||r.value==3?i.current_user_role==2&&(a="/checkAttendanceEmployeeAdminStatus"):a="/attendance-req-regularization",o.value=!0,m.post(a,_(S.value,"EG")).then(n=>{O();let u=n.data.message;console.log(u),n.data.status=="success"?Swal.fire("Success!","Attendance Regularized Successful","success"):Swal.fire("Error",`${u}`,"error")}).finally(()=>{o.value=!1})},R=a=>{H.value=!0,g.value={...a}},V=()=>{o.value=!0;let a;r.value==2||r.value==3?i.current_user_role==2&&(a="/checkAttendanceEmployeeAdminStatus"):a="/attendance-req-regularization",m.post(a,_(g.value,"MIP")).then(n=>{O();let u=n.data.message;console.log(u),n.data.status=="success"?Swal.fire("Good job!","Attendance Regularized Successful","success"):Swal.fire("Fill!",`${u}`,"error")}).finally(()=>{o.value=!1})},se=a=>{C.value=!0,y.value={...a}},oe=()=>{let a;r.value==2||r.value==3?i.current_user_role==2&&(a="/checkAttendanceEmployeeAdminStatus"):a="/attendance-req-regularization",o.value=!0,m.post(a,_(y.value,"MOP")).then(n=>{O();let u=n.data.message;console.log(u),n.data.status=="success"?Swal.fire("Good job!","Attendance Regularized Successful","success"):Swal.fire("Fill!",`${u}`,"error")}).finally(()=>{o.value=!1})},ne=()=>{o.value=!0;let a=h.value;console.log("currentlySelectedUser :: ",a);let n;r.value==2||r.value==3?i.current_user_role==2&&(n="/checkAbsentEmployeeAdminStatus"):n="/attendance-req-absent-regularization",r.value==2||r.value==3?h&&i.current_user_role==2&&m.post(n,{admin_user_code:i.current_user_code,user_code:a,attendance_date:c.value.date,regularization_type:"Absent Regularization",checkin_time:z(c.value.start_time),checkout_time:z(c.value.end_time),reason:c.value.reason,custom_reason:c.value.custom_reason?c.value.custom_reason:""}).then(u=>{O();let L=u.data.message;u.data.status=="success"?Swal.fire("Good job!","Attendance Regularized Successful","success"):Swal.fire("Fill!",`${L}`,"error")}).finally(()=>{o.value=!1}):m.post(n,{user_code:i.current_user_code,attendance_date:c.value.date,regularization_type:"Absent Regularization",checkin_time:z(c.value.start_time),checkout_time:z(c.value.end_time),reason:c.value.reason,custom_reason:c.value.custom_reason?c.value.custom_reason:""}).then(u=>{O();let L=u.data.message;u.data.status=="success"?Swal.fire("Good job!","Attendance Regularized Successful","success"):Swal.fire("Fill!",`${L}`,"error")}).finally(()=>{o.value=!1})},re=a=>{$.value=!0,j.value=a},z=a=>{if(a){const[n,u]=a.split(" "),[L,x]=n.split(":");let W=parseInt(L);return u==="PM"&&W!==12?W+=12:u==="AM"&&W===12&&(W=0),`${W.toString().padStart(2,"0")}:${x}:00`}};return{getEmployeeAttendance:w,currentEmployeeAttendance:B,currentEmployeeAttendanceLength:G,getSelectedEmployeeOrgDetails:X,getTeamList:Z,getOrgList:J,getSelectedEmployeeTeamDetails:l,getSelectedEmployeeAttendance:O,CurrentlySelectedUser:h,classicTimesheetSidebar:N,currentlySelectedTeamMemberUserId:d,currentlySelectedTeamMemberAttendance:v,currentlySelectedOrgMemberUserId:D,currentlySelectedOrgMemberAttendance:E,currentlySelectedTimesheet:r,canShowLoading:o,isManager:Y,isTeamOrg:e,findAttendanceMode:f,AttendanceLateOrMipRegularization:b,AttendanceEarylOrMopRegularization:M,onClickShowLcRegularization:k,applyMopRegularization:oe,mopDetails:y,dialog_Mop:C,onClickShowEgRegularization:U,applyMipRegularization:V,mipDetails:g,dialog_Mip:H,onClickShowMipRegularization:R,applyLcRegularization:q,lcDetails:p,dialog_Lc:P,onClickShowMopRegularization:se,applyEgRegularization:T,egDetails:S,dialog_Eg:F,dialog_Selfie:$,onClickSViewSelfie:re,selfieDetails:j,switchTimesheet:A,absentRegularizationDetails:c,applyAbsentRegularization:ne}}),_e=K("useLeaveModuleStore",()=>{Q();const s=t(!0),i=t(),o=t(),Y=t(),e=t(),A=t(),h=t(),r=t(),y=t(),g=t(),p=t(),S=t(),b=t(!1),M=t({}),c=d=>{b.value=!0,console.log(d),M.value={...d},M.emp_name=d.name};async function j(){s.value=!0;let d="/get-employee-leave-balance";await m.get(d).then(v=>{console.log(v.data),i.value=v.data,o.value=v.data["Avalied Leaves"]}).finally(()=>{s.value=!1})}async function C(d){await m.post("/leave/withdrawLeave",{leave_id:d}).then(v=>{console.log("performLeaveWithdraw() : "+v.data)}).finally(()=>{s.value=!1})}async function H(d,v,D){let E=0;await m.get(window.location.origin+"/currentUserCode ").then(w=>{E=w.data}),await m.post("/attendance/getEmployeeLeaveDetails",{user_code:E,filter_month:d,filter_year:v,filter_leave_status:D}).then(w=>{Y.value=w.data.data,console.log("getEmployeeLeaveHistory() : "+w.data)}).finally(()=>{s.value=!1})}async function P(d,v,D){let E=0;await m.get(window.location.origin+"/currentUserCode ").then(w=>{E=w.data}),m.post("/attendance/getTeamEmployeesLeaveDetails",{manager_code:E,filter_month:d,filter_year:v,filter_leave_status:D}).then(w=>{e.value=w.data.data,console.log("getTeamLeaveHistory() : "+w.data)}).finally(()=>{s.value=!1})}async function F(d,v,D){m.post("/attendance/getAllEmployeesLeaveDetails",{filter_month:d,filter_year:v,filter_leave_status:D}).then(E=>{A.value=E.data.data,console.log("getOrgLeaveHistory() : "+E.data.data)}).finally(()=>{s.value=!1})}async function $(d){m.post("/attendance/getLeaveInformation",{record_id:d}).then(v=>{S.value=v.data.data,console.log("getLeaveInformation() : "+v.data)}).finally(()=>{s.value=!1})}async function N(d,v){await m.post("/fetch-org-leaves-balance",{start_date:d,end_date:v}).then(D=>{h.value=D.data}).finally(()=>{s.value=!1,r.value="",y.value=""})}async function B(d,v){console.log(d,v),m.post("/fetch-team-leave-balance",{start_date:d,end_date:v}).then(D=>{p.value=D.data}).finally(()=>{r.value="",y.value="",s.value=!1})}function G(){r.value="",y.value="",console.log(" this variable is cleared ::",y.value,r.value)}return{canShowLoading:s,canShowLeaveDetails:b,setLeaveDetails:M,getLeaveDetails:c,array_employeeLeaveHistory:Y,array_teamLeaveHistory:e,array_orgLeaveHistory:A,array_employeeLeaveBalance:i,array_employeeAvailedLeaveBalance:o,array_orgLeaveBalance:h,selectedStartDate:r,selectedEndDate:y,canshowloadingsrceen:g,arrayTermLeaveBalance:p,performLeaveWithdraw:C,getEmployeeLeaveHistory:H,getTeamLeaveHistory:P,getAllEmployeesLeaveHistory:F,getLeaveInformation:$,getEmployeeLeaveBalance:j,getOrgLeaveBalance:N,getTermLeaveBalance:B,clearfunction:G}});te("$swal");const ge=K("useLeaveService",()=>{const s=ce(),i=Q(),o=_e(),Y=le(),e=ae({current_login_user:"",selected_leave:"",full_day_leave_date:"",half_day_leave_date:"",half_day_leave_session:"",radiobtn_full_day:"",radiobtn_half_day:"",radiobtn_custom:"",custom_start_date:"",custom_end_date:"",custom_total_days:"",permission_date:"",permission_start_time:"",permission_total_time:"",permission_end_time:"",compensatory_leaves:"",compensatory_leaves_dates:"",selected_compensatory_leaves:"",compensatory_start_date:"",compensatory_total_days:"",compensatory_end_date:"",notifyTo:"",leave_reason:"",leave_request_error_message:""}),A=t(!1),h=t(!0),r=t(!0),y=t(!1),g=t(!1),p=t(!1),S=t(!1),b=t(),M=t();let c=new Date;const j=t(!1),C=t(!1),H=t(!1),P=t(!1);let F=new Date;F.setDate(c.getDate()-1),b.value=[c,F];const $=t(),N=()=>{e.radiobtn_full_day=="full_day"?r.value=!0:r.value=!1,r.value=!0,g.value=!1,p.value=!1,y.value=!1,S.value=!1},B=()=>{e.radiobtn_half_day=="half_day"?y.value=!0:y.value=!1,y.value=!0,g.value=!1,p.value=!1,r.value=!1,S.value=!1},G=()=>{e.radiobtn_custom=="custom"?g.value=!0:g.value=!1,g.value=!0,p.value=!1,y.value=!1,r.value=!1,S.value=!1},d=()=>{g.value==!0&&(e.custom_start_date.length<0||e.custom_start_date=="")&&s.add({severity:"info",summary:"Info Message",detail:"Select Start date",life:3e3}),p.value==!0&&(e.permission_start_time<0||e.permission_start_time=="")&&s.add({severity:"info",summary:"Info Message",detail:"Select Start Time",life:3e3}),new Date().toJSON().slice(0,10);var f=new Date(e.custom_start_date);console.log(e.custom_start_date);var _=new Date(e.custom_end_date);console.log(e.custom_end_date);var T=_.getTime()-f.getTime();console.log("Differenece"+T);var R=(T/(1e3*60*60*24)).toFixed(0);let k=R;console.log(k),e.custom_total_days=parseInt(k)+1,console.log(e.custom_total_days);var q=new Date(e.compensatory_start_date);console.log(e.compensatory_start_date);var U=new Date(e.compensatory_end_date);console.log(e.compensatory_end_date);var T=U.getTime()-q.getTime();console.log("Differenece"+T);var R=(T/(1e3*60*60*24)).toFixed(0);let V=R;console.log(V),e.compensatory_total_days=parseInt(V)+1,console.log(e.compensatory_total_days)},v=()=>{let f=I(e.full_day_leave_date).format("YYYY-MM-DD"),_=e.permission_start_time.toString();_=f+" "+_.substring(16,24);let k=e.permission_end_time.toString();k=f+" "+k.substring(16,24),console.log();let q=new Date(e.permission_start_time).getTime(),U=new Date(e.permission_end_time).getTime();console.log("start"+q,"end"+U);var T=((U-q)/1e3/60/60).toFixed(0);e.permission_total_time=T,console.log(T)},D=()=>{e.selected_leave.includes("Permission")?(p.value=!0,h.value=!1,y.value=!1,g.value=!1,S.value=!1,r.value=!1):e.selected_leave.includes("Compensatory")?(S.value=!0,p.value=!1,r.value=!1,y.value=!1,g.value=!1,h.value=!1,O(),e.compensatory_leaves_dates=I(e.compensatory_leaves.emp_attendance_date).format("dddd DD-MMM-YYYY"),console.log("kn"+e.compensatory_leaves.emp_attendance_date)):e.selected_leave=="Select"?(S.value=!1,p.value=!1,r.value=!0,y.value=!1,g.value=!1,h.value=!0):(p.value=!1,S.value=!1,h.value=!0,r.value=!0)},E=()=>{m.get("/currentUser").then(f=>{e.current_login_user=f.data,C.value=!1}).catch(f=>{console.log(f)})},w=()=>{m.get("/fetch-leave-policy-details").then(f=>{console.log(f.data),M.value=f.data})},O=()=>{e.current_login_user,m.get("/fetch-employee-unused-compensatory-days").then(f=>{e.compensatory_leaves=f.data}).catch(f=>{console.log(f)})},l=ae({leave_type_id:1,leave_Request_date:I().format("YYYY-MM-DD  HH:mm:ss"),leave_type_name:"",leave_session:"",start_date:"",end_date:"",no_of_days:"",hours_diff:"",notify_to:"",leave_reason:"",compensatory_leave_id:[],user_type:"Employee"}),X=()=>{location.reload()},Z=async()=>{if(l.leave_type_name=e.selected_leave,e.radiobtn_full_day=="full_day")console.log("Full day leave : "+e.full_day_leave_date),l.no_of_days=1,l.start_date=I(e.full_day_leave_date).format("YYYY-MM-DD"),l.end_date=l.start_date,l.leave_session="";else if(e.radiobtn_half_day=="half_day")if(console.log("Applying half-day leave on : "+e.half_day_leave_date),l.no_of_days=.5,console.log("half day leave date"+e.half_day_leave_date),l.start_date=I(e.half_day_leave_date).format("YYYY-MM-DD"),l.end_date=l.start_date,e.half_day_leave_session=="forenoon")l.leave_session="FN";else if(e.half_day_leave_session=="afternoon")l.leave_session="AN";else{s.add({severity:"info",summary:"Select Session",detail:"Select Leave Session",life:3e3});return}else if(e.radiobtn_custom=="custom")l.start_date=I(e.custom_start_date).format("YYYY-MM-DD"),l.end_date=I(e.custom_end_date).format("YYYY-MM-DD"),l.no_of_days=e.custom_total_days,l.leave_session="";else if(e.selected_leave.includes("Compensatory")){l.start_date=I(e.compensatory_start_date).format("YYYY-MM-DD"),l.end_date=I(e.compensatory_end_date).format("YYYY-MM-DD"),l.no_of_days=e.compensatory_total_days;let _=Object.values(e.selected_compensatory_leaves).length;console.log("Selected Compensatory No.of days : "+e.compensatory_total_days),console.log("Selected Compensatory Leaves : "+_);const k=Object.values(e.selected_compensatory_leaves);if(parseInt(e.compensatory_total_days)!=_){s.add({severity:"info",summary:"Error",detail:"Compensatory leaves doesnt match with available leave days",life:3e3});return}else k.map(q=>{let U=q.emp_attendance_id;l.compensatory_leave_id.push(U),console.log(l.compensatory_leave_id)})}else e.selected_leave.includes("Permission")?(l.start_date=I(e.permission_date).format("YYYY-MM-DD"),l.end_date=l.start_date,l.hours_diff=e.permission_total_time):s.add({severity:"info",summary:"Info Message",detail:"Select Leave",life:3e3});l.notify_to=e.notifyTo,l.leave_reason=e.leave_reason,j.value=!0,console.log(l),C.value=!0;let f;i.current_user_role==2&&Y.CurrentlySelectedUser?(console.log(Y.CurrentlySelectedUser),f="applyLeaveRequest_AdminRole",m.post(f,{admin_user_code:i.current_user_code,user_code:Y.CurrentlySelectedUser,leave_request_date:l.leave_Request_date,leave_type_name:l.leave_type_name,leave_session:l.leave_session,start_date:l.start_date,end_date:l.end_date,no_of_days:l.no_of_days,hours_diff:l.hours_diff,compensatory_work_days_ids:l.compensatory_leave_id,notify_to:l.notify_to,leave_reason:l.leave_reason,user_type:l.user_type}).then(_=>{C.value=!1,console.log(_.data.messege),_.data.status=="success"&&Swal.fire("Success",_.data.message,"success"),_.data.status=="failure"&&Swal.fire("Failure",_.data.message,"error"),console.log("Email status"+_.data.status)}).catch(_=>{console.log(_)}).finally(()=>{J(),A.value=!1})):(f="/applyLeaveRequest",m.post(f,{user_code:i.current_user_code,leave_request_date:l.leave_Request_date,leave_type_name:l.leave_type_name,leave_session:l.leave_session,start_date:l.start_date,end_date:l.end_date,no_of_days:l.no_of_days,hours_diff:l.hours_diff,compensatory_work_days_ids:l.compensatory_leave_id,notify_to:l.notify_to,leave_reason:l.leave_reason,user_type:l.user_type}).then(_=>{C.value=!1,console.log(_.data.messege),_.data.status=="success"&&Swal.fire("Success",_.data.message,"success"),_.data.status=="failure"&&Swal.fire("Failure",_.data.message,"error"),console.log("Email status"+_.data.status)}).catch(_=>{console.log(_)}).finally(()=>{o.getTermLeaveBalance(),o.getEmployeeLeaveHistory(),J(),A.value=!1}))},J=()=>{e.current_login_user=null,e.selected_leave=null,e.full_day_leave_date=null,e.half_day_leave_date=null,e.half_day_leave_session=null,e.radiobtn_full_day=null,e.radiobtn_half_day=null,e.radiobtn_custom=null,e.custom_start_date=null,e.custom_end_date=null,e.custom_total_days=null,e.permission_date=null,e.permission_start_time=null,e.permission_total_time=null,e.permission_end_time=null,e.compensatory_leaves=null,e.compensatory_leaves_dates=null,e.selected_compensatory_leaves=null,e.compensatory_start_date=null,e.compensatory_total_days=null,e.compensatory_end_date=null,e.notifyTo=null,e.leave_reason=null,e.leave_request_error_message=null};return{leaveApplyDailog:A,leave_data:e,invalidDate:F,today:c,invalidDates:b,toast:s,leave_Request_data:l,leave_types:M,data_checking:C,Email_Service:H,Email_Error:P,selected_compensatory_leaves:$,half_day:B,full_day:N,custom_day:G,Permission:D,Submit:Z,ReloadPage:X,dayCalculation:d,time_difference:v,get_user:E,get_leave_types:w,get_compensatroy_leaves:O,full_day_format:r,half_day_format:y,custom_format:g,Permission_format:p,compensatory_format:S,TotalNoOfDays:h,RequiredField:j}});export{ue as a,le as b,_e as c,ge as u};
