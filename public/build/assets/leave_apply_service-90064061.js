import{d as j}from"./pinia-503c53ce.js";import{$ as H,ag as $,a1 as L,G as s}from"./toastservice.esm-ed3188be.js";import{a as g}from"./index-362795f3.js";import{h as r}from"./moment-fbc5633a.js";H("$swal");const Q=j("useLeaveService",()=>{const u=$(),e=L({current_login_user:"",selected_leave:"",full_day_leave_date:"",half_day_leave_date:"",half_day_leave_session:"",radiobtn_full_day:"",radiobtn_half_day:"",radiobtn_custom:"",custom_start_date:"",custom_end_date:"",custom_total_days:"",permission_start_time:"",permission_total_time:"",permission_end_time:"",start_time_for_permisson:"",end_time_for__for_permisson:"",compensatory_leaves:"",compensatory_leaves_dates:"",selected_compensatory_leaves:"",compensatory_start_date:"",compensatory_total_days:"",compensatory_end_date:"",notifyTo:"",leave_reason:"",leave_request_error_messege:""}),S=s(!1),v=s(!0),o=s(!0),_=s(!1),l=s(!1),n=s(!1),d=s(!1),M=s(),b=s();let D=new Date;const w=s(!1),y=s(!1),T=s(!1),C=s(!1);let h=new Date;h.setDate(D.getDate()-1),M.value=[D,h];const R=s(),F=()=>{e.radiobtn_full_day=="full_day"?o.value=!0:o.value=!1,o.value=!0,l.value=!1,n.value=!1,_.value=!1,d.value=!1},P=()=>{e.radiobtn_half_day=="half_day"?_.value=!0:_.value=!1,l.value=!1,n.value=!1,o.value=!1,d.value=!1,_.value=!0},x=()=>{e.radiobtn_custom=="custom"?l.value=!0:l.value=!1,l.value=!0,n.value=!1,_.value=!1,o.value=!1,d.value=!1},E=()=>{l.value==!0&&(e.custom_start_date.length<0||e.custom_start_date=="")&&u.add({severity:"info",summary:"Info Message",detail:"Select Start date",life:3e3}),n.value==!0&&(e.permission_start_time<0||e.permission_start_time=="")&&u.add({severity:"info",summary:"Info Message",detail:"Select Start Time",life:3e3}),new Date().toJSON().slice(0,10);var t=new Date(e.custom_start_date);console.log(e.custom_start_date);var f=new Date(e.custom_end_date);console.log(e.custom_end_date);var c=f.getTime()-t.getTime();console.log("Differenece"+c);var Y=(c/(1e3*60*60*24)).toFixed(0);let i=Y;console.log(i),e.custom_total_days=parseInt(i)+1,console.log(e.custom_total_days);var m=new Date(e.compensatory_start_date);console.log(e.compensatory_start_date);var p=new Date(e.compensatory_end_date);console.log(e.compensatory_end_date);var c=p.getTime()-m.getTime();console.log("Differenece"+c);var Y=(c/(1e3*60*60*24)).toFixed(0);let q=Y;console.log(q),e.compensatory_total_days=parseInt(q)+1,console.log(e.compensatory_total_days)},N=()=>{let t=r(e.full_day_leave_date).format("YYYY-MM-DD"),f=e.permission_start_time.toString();f=t+" "+f.substring(16,24);let i=e.permission_end_time.toString();i=t+" "+i.substring(16,24),console.log();let m=new Date(e.permission_start_time).getTime(),p=new Date(e.permission_end_time).getTime();console.log("start"+m,"end"+p);var c=((p-m)/1e3/60/60).toFixed(0);e.permission_total_time=c,e.start_time_for_permisson=f,e.end_time_for__for_permisson=i,console.log(c)},k=()=>{e.selected_leave.includes("Permission")?(n.value=!0,v.value=!1,_.value=!1,l.value=!1,d.value=!1,o.value=!0):e.selected_leave.includes("Compensatory")?(d.value=!0,n.value=!1,o.value=!1,_.value=!1,l.value=!1,v.value=!1,I(),e.compensatory_leaves_dates=r(e.compensatory_leaves.emp_attendance_date).format("dddd DD-MMM-YYYY"),console.log("kn"+e.compensatory_leaves.emp_attendance_date)):e.selected_leave=="Select"?(d.value=!1,n.value=!1,o.value=!0,_.value=!1,l.value=!1,v.value=!0):(n.value=!1,d.value=!1,v.value=!0,o.value=!0)},A=()=>{g.get("/currentUser").then(t=>{e.current_login_user=t.data,y.value=!1}).catch(t=>{console.log(t)})},O=()=>{g.get("/fetch-leave-policy-details").then(t=>{console.log(t.data),b.value=t.data})},I=()=>{e.current_login_user,g.get("/fetch-employee-unused-compensatory-days").then(t=>{e.compensatory_leaves=t.data}).catch(t=>{console.log(t)})},a=L({leave_type_id:1,leave_Request_date:r().format("YYYY-MM-DD  HH:mm:ss"),leave_type_name:"",leave_session:"",start_date:"",end_date:"",no_of_days:"",hours_diff:"",notify_to:"",leave_reason:"",compensatory_leave_id:[]});return{leaveApplyDailog:S,leave_data:e,invalidDate:h,today:D,invalidDates:M,toast:u,leave_Request_data:a,leave_types:b,data_checking:y,Email_Service:T,Email_Error:C,selected_compensatory_leaves:R,half_day:P,full_day:F,custom_day:x,Permission:k,Submit:()=>{if(a.leave_type_name=e.selected_leave,e.radiobtn_full_day=="full_day")console.log("Full day leave : "+e.full_day_leave_date),a.no_of_days=1,a.start_date=r(e.full_day_leave_date).format("YYYY-MM-DD"),a.end_date=a.start_date,a.leave_session="";else if(e.radiobtn_half_day=="half_day")if(console.log("Applying half-day leave on : "+e.half_day_leave_date),a.no_of_days=.5,console.log("half day leave date"+e.half_day_leave_date),a.start_date=r(e.half_day_leave_date).format("YYYY-MM-DD"),a.end_date=a.start_date,e.half_day_leave_session=="forenoon")a.leave_session="FN";else if(e.half_day_leave_session=="afternoon")a.leave_session="AN";else{u.add({severity:"info",summary:"Select Session",detail:"Select Leave Session",life:3e3});return}else if(e.radiobtn_custom=="custom")a.start_date=r(e.custom_start_date).format("YYYY-MM-DD"),a.end_date=r(e.custom_end_date).format("YYYY-MM-DD"),a.no_of_days=e.custom_total_days,a.leave_session="";else if(e.selected_leave.includes("Compensatory")){a.start_date=r(e.compensatory_start_date).format("YYYY-MM-DD"),a.end_date=r(e.compensatory_end_date).format("YYYY-MM-DD"),a.no_of_days=e.compensatory_total_days;let t=Object.values(e.selected_compensatory_leaves).length;console.log("Selected Compensatory No.of days : "+e.compensatory_total_days),console.log("Selected Compensatory Leaves : "+t);const f=Object.values(e.selected_compensatory_leaves);if(parseInt(e.compensatory_total_days)!=t){u.add({severity:"info",summary:"Error",detail:"Compensatory leaves doesnt match with available leave days",life:3e3});return}else f.map(i=>{let m=i.emp_attendance_id;a.compensatory_leave_id.push(m),console.log(a.compensatory_leave_id)})}else e.selected_leave.includes("Permissions")?(console.log("eeeeeeeeeee           "+e.full_day_leave_date),a.start_date=e.start_time_for_permisson,a.end_date=e.end_time_for__for_permisson,a.hours_diff=e.permission_total_time):u.add({severity:"info",summary:"Info Message",detail:"Select Leave",life:3e3});a.notify_to=e.notifyTo,a.leave_reason=e.leave_reason,w.value=!0,console.log(a),y.value=!0,g.post("/applyLeaveRequest",{leave_request_date:a.leave_Request_date,leave_type_name:a.leave_type_name,leave_session:a.leave_session,start_date:a.start_date,end_date:a.end_date,no_of_days:a.no_of_days,hours_diff:a.hours_diff,compensatory_work_days_ids:a.compensatory_leave_id,notify_to:a.notify_to,leave_reason:a.leave_reason}).then(t=>{y.value=!1,t.data.status=="success"?(S.value=!1,Swal.fire("Success","Leave Applied successfull!","success")):t.data.status=="failure"&&(T.value=!0,e.leave_request_error_messege=t.data.message,C.value=!0),console.log("Email status"+t.data.status)}).catch(t=>{console.log(t)})},ReloadPage:()=>{location.reload()},dayCalculation:E,time_difference:N,get_user:A,get_leave_types:O,get_compensatroy_leaves:I,full_day_format:o,half_day_format:_,custom_format:l,Permission_format:n,compensatory_format:d,TotalNoOfDays:v,RequiredField:w}});export{Q as u};