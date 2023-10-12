import{d as V}from"./pinia-641035e3.js";import{u as ce}from"./toastservice.esm-8d63d505.js";import{a as p}from"./index-362795f3.js";import{h as b}from"./moment-fbc5633a.js";import{S as W}from"./Service-4ef425c0.js";import{Q as s,a5 as Q,$ as ee,W as Z}from"./inputnumber.esm-e362c3ab.js";const ue=V("calendar",()=>{const u=ae();W();const i=s(new Date().getFullYear()),l=s(new Date().getMonth()),e=s(new Date().getDate()),w=Q(()=>i.value),Y=Q(()=>l.value),m=Q(()=>e.value);function r(c){i.value=i.value+c}function f(c){i.value=i.value-c}function v(c){if(u.canShowLoading=!0,l.value==11){r(1),l.value=0;return}l.value=l.value+c,console.log(u.isTeamOrg),u.getSelectedEmployeeTeamDetails(u.currentlySelectedTeamMemberUserId),u.getSelectedEmployeeOrgDetails(u.currentlySelectedOrgMemberUserId),u.getSelectedEmployeeAttendance()}function y(c){if(u.canShowLoading=!0,l.value==0){f(1),l.value=11;return}l.value=l.value-c,u.getSelectedEmployeeTeamDetails(u.currentlySelectedTeamMemberUserId),u.getSelectedEmployeeOrgDetails(u.currentlySelectedOrgMemberUserId),u.getSelectedEmployeeAttendance()}function A(c){l.value=c}function M(c){i.value=c}function h(){i.value=new Date().getFullYear(),l.value=new Date().getMonth(),e.value=new Date().getDate()}return{year:i,month:l,day:e,getYear:w,getMonth:Y,getDay:m,incrementYear:r,incrementMonth:v,decrementMonth:y,setMonth:A,setYear:M,resetDate:h}});ee("$swal");const ae=V("Timesheet",()=>{const u=ue(),i=W(),l=s(!0),e=s(!1),w=s("single"),Y=s("Classic"),m=s(),r=s(1),f=s({}),v=s({}),y=s({}),A=s({}),M=s(),h=s(),c=s({}),O=s({}),q=s(!1),j=s(!1),L=s(!1),U=s(!1),P=s(!1),J=s(!1),$=s(),G=s(0),x=s(),R=s(),N=s(),H=s(),k=async(a,o,n)=>{l.value=!0;let g="/fetch-attendance-user-timesheet";try{return await p.post(g,{month:o+1,year:n,user_code:a}).then(F=>(console.log(" getEmployeeAttendance() : "+Object.values(F.data)),F.data))}catch(F){return console.error("Error [ getEmployeeAttendance() ]:",F),null}},t=async()=>{try{return l.value=!0,await k(i.current_user_code,u.getMonth,u.getYear).then(a=>{if(console.log("getSelectedEmployeeAttendance() : "+a),a)console.log("Selected employee attendance : "+a.data),$.value=Object.values(a.data),G.value=Object.values(a.data).length;else return null})}catch(a){console.error("Error [ getSelectedEmployeeAttendance() ]:",a)}finally{l.value=!1}},K=(a,o)=>{w.value=o,l.value=!0,x.value=a,k(a,u.getMonth,u.getYear).then(n=>{R.value=Object.values(n.data)}).catch(n=>{console.log("Error[ getSelectedEmployeeTeamDetails)() ]",n)}).finally(()=>{l.value=!1})},X=async(a,o,n)=>{w.value=o,console.log("==========="+n),m.value=n,console.log("employee list select function  ::",m.value),l.value=!0,N.value=a,await k(a,u.getMonth,u.getYear).then(g=>{console.log(" getSelectedEmployeeOrgDetails() : "+Object.values(g.data)),H.value=Object.values(g.data)}).finally(()=>{l.value=!1})},d=async a=>p.post("/fetch-team-members",{user_code:a}),_=async()=>p.get("/fetch-org-members"),E=a=>a=="biometric"?"fas fa-fingerprint fs-12":a=="web"?"fa fa-laptop fs-12":a=="mobile"?"fa fa-mobile-phone fs-12":"",S=(a,o)=>{let n=m.value;if(console.log("00000000000000000".currentlySelectedUser),r.value==2||r.value==3){if(i.current_user_role===2){let g={admin_user_code:i.current_user_code,user_code:n,regularization_type:o,attendance_date:a.date,user_time:a.checkin_time,regularize_time:o=="LC"||o=="MIP"?T(M.value):o=="EG"||o=="MOP"?T(h.value):"",reason:a.reason,custom_reason:a.custom_reason?a.custom_reason:""};return M.value=null,h.value=null,g}}else{let g={user_code:i.current_user_code,regularization_type:o,attendance_date:a.date,user_time:a.checkin_time,regularize_time:o=="LC"||o=="MIP"?T(M.value):o=="EG"||o=="MOP"?T(h.value):"",reason:a.reason,custom_reason:a.custom_reason?a.custom_reason:""};return M.value=null,h.value=null,g}},C=a=>{L.value=!0,y.value={...a}},D=()=>{l.value=!0;let a;r.value==2||r.value==3?i.current_user_role==2&&(a="/checkAttendanceEmployeeAdminStatus"):a="/attendance-req-regularization",p.post(a,S(y.value,"LC")).then(o=>{t();let n=o.data.message;console.log(n),o.data.status=="success"?Swal.fire("Good job!","Attendance Regularized Successful","success"):Swal.fire("Fill!",`${n}`,"error")}).finally(()=>{l.value=!1})},I=a=>{U.value=!0,A.value={...a}},B=()=>{let a;r.value==2||r.value==3?i.current_user_role==2&&(a="/checkAttendanceEmployeeAdminStatus"):a="/attendance-req-regularization",l.value=!0,p.post(a,S(A.value,"EG")).then(o=>{t();let n=o.data.message;console.log(n),o.data.status=="success"?Swal.fire("Success!","Attendance Regularized Successful","success"):Swal.fire("Error",`${n}`,"error")}).finally(()=>{l.value=!1})},te=a=>{j.value=!0,v.value={...a}},se=()=>{l.value=!0;let a;r.value==2||r.value==3?i.current_user_role==2&&(a="/checkAttendanceEmployeeAdminStatus"):a="/attendance-req-regularization",p.post(a,S(v.value,"MIP")).then(o=>{t();let n=o.data.message;console.log(n),o.data.status=="success"?Swal.fire("Good job!","Attendance Regularized Successful","success"):Swal.fire("Fill!",`${n}`,"error")}).finally(()=>{l.value=!1})},le=a=>{q.value=!0,f.value={...a}},oe=()=>{let a;r.value==2||r.value==3?i.current_user_role==2&&(a="/checkAttendanceEmployeeAdminStatus"):a="/attendance-req-regularization",l.value=!0,p.post(a,S(f.value,"MOP")).then(o=>{t();let n=o.data.message;console.log(n),o.data.status=="success"?Swal.fire("Good job!","Attendance Regularized Successful","success"):Swal.fire("Fill!",`${n}`,"error")}).finally(()=>{l.value=!1})},ne=()=>{l.value=!0;let a=m.value;console.log("currentlySelectedUser :: ",a);let o;r.value==2||r.value==3?i.current_user_role==2&&(o="/checkAbsentEmployeeAdminStatus"):o="/attendance-req-absent-regularization",r.value==2||r.value==3?m&&i.current_user_role==2&&p.post(o,{admin_user_code:i.current_user_code,user_code:a,attendance_date:c.value.date,regularization_type:"Absent Regularization",checkin_time:T(c.value.start_time),checkout_time:T(c.value.end_time),reason:c.value.reason,custom_reason:c.value.custom_reason?c.value.custom_reason:""}).then(n=>{t();let g=n.data.message;n.data.status=="success"?Swal.fire("Good job!","Attendance Regularized Successful","success"):Swal.fire("Fill!",`${g}`,"error")}).finally(()=>{l.value=!1}):p.post(o,{user_code:i.current_user_code,attendance_date:c.value.date,regularization_type:"Absent Regularization",checkin_time:T(c.value.start_time),checkout_time:T(c.value.end_time),reason:c.value.reason,custom_reason:c.value.custom_reason?c.value.custom_reason:""}).then(n=>{t();let g=n.data.message;n.data.status=="success"?Swal.fire("Good job!","Attendance Regularized Successful","success"):Swal.fire("Fill!",`${g}`,"error")}).finally(()=>{l.value=!1})},re=a=>{P.value=!0,O.value=a},T=a=>{if(a){const[o,n]=a.split(" "),[g,F]=o.split(":");let z=parseInt(g);return n==="PM"&&z!==12?z+=12:n==="AM"&&z===12&&(z=0),`${z.toString().padStart(2,"0")}:${F}:00`}};return{getEmployeeAttendance:k,currentEmployeeAttendance:$,currentEmployeeAttendanceLength:G,getSelectedEmployeeOrgDetails:X,getTeamList:d,getOrgList:_,getSelectedEmployeeTeamDetails:K,getSelectedEmployeeAttendance:t,CurrentlySelectedUser:m,classicTimesheetSidebar:J,currentlySelectedTeamMemberUserId:x,currentlySelectedTeamMemberAttendance:R,currentlySelectedOrgMemberUserId:N,currentlySelectedOrgMemberAttendance:H,currentlySelectedTimesheet:r,canShowLoading:l,isManager:e,isTeamOrg:w,findAttendanceMode:E,AttendanceLateOrMipRegularization:M,AttendanceEarylOrMopRegularization:h,onClickShowLcRegularization:C,applyMopRegularization:oe,mopDetails:f,dialog_Mop:q,onClickShowEgRegularization:I,applyMipRegularization:se,mipDetails:v,dialog_Mip:j,onClickShowMipRegularization:te,applyLcRegularization:D,lcDetails:y,dialog_Lc:L,onClickShowMopRegularization:le,applyEgRegularization:B,egDetails:A,dialog_Eg:U,dialog_Selfie:P,onClickSViewSelfie:re,selfieDetails:O,switchTimesheet:Y,absentRegularizationDetails:c,applyAbsentRegularization:ne}});ee("$swal");const ge=V("useLeaveService",()=>{const u=ce(),i=W(),l=ae(),e=Z({current_login_user:"",selected_leave:"",full_day_leave_date:"",half_day_leave_date:"",half_day_leave_session:"",radiobtn_full_day:"",radiobtn_half_day:"",radiobtn_custom:"",custom_start_date:"",custom_end_date:"",custom_total_days:"",permission_date:"",permission_start_time:"",permission_total_time:"",permission_end_time:"",compensatory_leaves:"",compensatory_leaves_dates:"",selected_compensatory_leaves:"",compensatory_start_date:"",compensatory_total_days:"",compensatory_end_date:"",notifyTo:"",leave_reason:"",leave_request_error_message:""}),w=s(!1),Y=s(!0),m=s(!0),r=s(!1),f=s(!1),v=s(!1),y=s(!1),A=s(),M=s();let h=new Date;const c=s(!1),O=s(!1),q=s(!1),j=s(!1);let L=new Date;L.setDate(h.getDate()-1),A.value=[h,L];const U=s(),P=()=>{e.radiobtn_full_day=="full_day"?m.value=!0:m.value=!1,m.value=!0,f.value=!1,v.value=!1,r.value=!1,y.value=!1},J=()=>{e.radiobtn_half_day=="half_day"?r.value=!0:r.value=!1,r.value=!0,f.value=!1,v.value=!1,m.value=!1,y.value=!1},$=()=>{e.radiobtn_custom=="custom"?f.value=!0:f.value=!1,f.value=!0,v.value=!1,r.value=!1,m.value=!1,y.value=!1},G=()=>{f.value==!0&&(e.custom_start_date.length<0||e.custom_start_date=="")&&u.add({severity:"info",summary:"Info Message",detail:"Select Start date",life:3e3}),v.value==!0&&(e.permission_start_time<0||e.permission_start_time=="")&&u.add({severity:"info",summary:"Info Message",detail:"Select Start Time",life:3e3}),new Date().toJSON().slice(0,10);var d=new Date(e.custom_start_date);console.log(e.custom_start_date);var _=new Date(e.custom_end_date);console.log(e.custom_end_date);var D=_.getTime()-d.getTime();console.log("Differenece"+D);var I=(D/(1e3*60*60*24)).toFixed(0);let E=I;console.log(E),e.custom_total_days=parseInt(E)+1,console.log(e.custom_total_days);var S=new Date(e.compensatory_start_date);console.log(e.compensatory_start_date);var C=new Date(e.compensatory_end_date);console.log(e.compensatory_end_date);var D=C.getTime()-S.getTime();console.log("Differenece"+D);var I=(D/(1e3*60*60*24)).toFixed(0);let B=I;console.log(B),e.compensatory_total_days=parseInt(B)+1,console.log(e.compensatory_total_days)},x=()=>{let d=b(e.full_day_leave_date).format("YYYY-MM-DD"),_=e.permission_start_time.toString();_=d+" "+_.substring(16,24);let E=e.permission_end_time.toString();E=d+" "+E.substring(16,24),console.log();let S=new Date(e.permission_start_time).getTime(),C=new Date(e.permission_end_time).getTime();console.log("start"+S,"end"+C);var D=((C-S)/1e3/60/60).toFixed(0);e.permission_total_time=D,console.log(D)},R=()=>{e.selected_leave.includes("Permission")?(v.value=!0,Y.value=!1,r.value=!1,f.value=!1,y.value=!1,m.value=!1):e.selected_leave.includes("Compensatory")?(y.value=!0,v.value=!1,m.value=!1,r.value=!1,f.value=!1,Y.value=!1,k(),e.compensatory_leaves_dates=b(e.compensatory_leaves.emp_attendance_date).format("dddd DD-MMM-YYYY"),console.log("kn"+e.compensatory_leaves.emp_attendance_date)):e.selected_leave=="Select"?(y.value=!1,v.value=!1,m.value=!0,r.value=!1,f.value=!1,Y.value=!0):(v.value=!1,y.value=!1,Y.value=!0,m.value=!0)},N=()=>{p.get("/currentUser").then(d=>{e.current_login_user=d.data,O.value=!1}).catch(d=>{console.log(d)})},H=()=>{p.get("/fetch-leave-policy-details").then(d=>{console.log(d.data),M.value=d.data})},k=()=>{e.current_login_user,p.get("/fetch-employee-unused-compensatory-days").then(d=>{e.compensatory_leaves=d.data}).catch(d=>{console.log(d)})},t=Z({leave_type_id:1,leave_Request_date:b().format("YYYY-MM-DD  HH:mm:ss"),leave_type_name:"",leave_session:"",start_date:"",end_date:"",no_of_days:"",hours_diff:"",notify_to:"",leave_reason:"",compensatory_leave_id:[],user_type:"Employee"});return{leaveApplyDailog:w,leave_data:e,invalidDate:L,today:h,invalidDates:A,toast:u,leave_Request_data:t,leave_types:M,data_checking:O,Email_Service:q,Email_Error:j,selected_compensatory_leaves:U,half_day:J,full_day:P,custom_day:$,Permission:R,Submit:async()=>{if(t.leave_type_name=e.selected_leave,e.radiobtn_full_day=="full_day")console.log("Full day leave : "+e.full_day_leave_date),t.no_of_days=1,t.start_date=b(e.full_day_leave_date).format("YYYY-MM-DD"),t.end_date=t.start_date,t.leave_session="";else if(e.radiobtn_half_day=="half_day")if(console.log("Applying half-day leave on : "+e.half_day_leave_date),t.no_of_days=.5,console.log("half day leave date"+e.half_day_leave_date),t.start_date=b(e.half_day_leave_date).format("YYYY-MM-DD"),t.end_date=t.start_date,e.half_day_leave_session=="forenoon")t.leave_session="FN";else if(e.half_day_leave_session=="afternoon")t.leave_session="AN";else{u.add({severity:"info",summary:"Select Session",detail:"Select Leave Session",life:3e3});return}else if(e.radiobtn_custom=="custom")t.start_date=b(e.custom_start_date).format("YYYY-MM-DD"),t.end_date=b(e.custom_end_date).format("YYYY-MM-DD"),t.no_of_days=e.custom_total_days,t.leave_session="";else if(e.selected_leave.includes("Compensatory")){t.start_date=b(e.compensatory_start_date).format("YYYY-MM-DD"),t.end_date=b(e.compensatory_end_date).format("YYYY-MM-DD"),t.no_of_days=e.compensatory_total_days;let _=Object.values(e.selected_compensatory_leaves).length;console.log("Selected Compensatory No.of days : "+e.compensatory_total_days),console.log("Selected Compensatory Leaves : "+_);const E=Object.values(e.selected_compensatory_leaves);if(parseInt(e.compensatory_total_days)!=_){u.add({severity:"info",summary:"Error",detail:"Compensatory leaves doesnt match with available leave days",life:3e3});return}else E.map(S=>{let C=S.emp_attendance_id;t.compensatory_leave_id.push(C),console.log(t.compensatory_leave_id)})}else e.selected_leave.includes("Permission")?(t.start_date=b(e.permission_date).format("YYYY-MM-DD"),t.end_date=t.start_date,t.hours_diff=e.permission_total_time):u.add({severity:"info",summary:"Info Message",detail:"Select Leave",life:3e3});t.notify_to=e.notifyTo,t.leave_reason=e.leave_reason,c.value=!0,console.log(t),O.value=!0;let d;i.current_user_role==2&&l.CurrentlySelectedUser?(console.log(l.CurrentlySelectedUser),d="applyLeaveRequest_AdminRole",p.post(d,{admin_user_code:i.current_user_code,user_code:l.CurrentlySelectedUser,leave_request_date:t.leave_Request_date,leave_type_name:t.leave_type_name,leave_session:t.leave_session,start_date:t.start_date,end_date:t.end_date,no_of_days:t.no_of_days,hours_diff:t.hours_diff,compensatory_work_days_ids:t.compensatory_leave_id,notify_to:t.notify_to,leave_reason:t.leave_reason,user_type:t.user_type}).then(_=>{O.value=!1,console.log(_.data.messege),_.data.status=="success"&&Swal.fire("Success",_.data.message,"success"),_.data.status=="failure"&&Swal.fire("Failure",_.data.message,"error"),console.log("Email status"+_.data.status)}).catch(_=>{console.log(_)}).finally(()=>{w.value=!1})):(d="/applyLeaveRequest",p.post(d,{user_code:i.current_user_code,leave_request_date:t.leave_Request_date,leave_type_name:t.leave_type_name,leave_session:t.leave_session,start_date:t.start_date,end_date:t.end_date,no_of_days:t.no_of_days,hours_diff:t.hours_diff,compensatory_work_days_ids:t.compensatory_leave_id,notify_to:t.notify_to,leave_reason:t.leave_reason,user_type:t.user_type}).then(_=>{O.value=!1,console.log(_.data.messege),_.data.status=="success"&&Swal.fire("Success",_.data.message,"success"),_.data.status=="failure"&&Swal.fire("Failure",_.data.message,"error"),console.log("Email status"+_.data.status)}).catch(_=>{console.log(_)}).finally(()=>{w.value=!1}))},ReloadPage:()=>{location.reload()},dayCalculation:G,time_difference:x,get_user:N,get_leave_types:H,get_compensatroy_leaves:k,full_day_format:m,half_day_format:r,custom_format:f,Permission_format:v,compensatory_format:y,TotalNoOfDays:Y,RequiredField:c}});export{ue as a,ae as b,ge as u};
