import{d as H}from"./pinia-641035e3.js";import{u as $}from"./toastservice.esm-8d63d505.js";import{a as g}from"./index-362795f3.js";import{h as _}from"./moment-fbc5633a.js";import{S as B}from"./Service-2af407d6.js";import{$ as J,W as I,Q as s}from"./inputnumber.esm-e362c3ab.js";J("$swal");const Z=H("useLeaveService",()=>{const u=$(),q=B(),e=I({current_login_user:"",selected_leave:"",full_day_leave_date:"",half_day_leave_date:"",half_day_leave_session:"",radiobtn_full_day:"",radiobtn_half_day:"",radiobtn_custom:"",custom_start_date:"",custom_end_date:"",custom_total_days:"",permission_date:"",permission_start_time:"",permission_total_time:"",permission_end_time:"",compensatory_leaves:"",compensatory_leaves_dates:"",selected_compensatory_leaves:"",compensatory_start_date:"",compensatory_total_days:"",compensatory_end_date:"",notifyTo:"",leave_reason:"",leave_request_error_message:""}),S=s(!1),v=s(!0),o=s(!0),n=s(!1),l=s(!1),r=s(!1),d=s(!1),M=s(),b=s();let D=new Date;const w=s(!1),y=s(!1),x=s(!1),F=s(!1);let Y=new Date;Y.setDate(D.getDate()-1),M.value=[D,Y];const L=s(),R=()=>{e.radiobtn_full_day=="full_day"?o.value=!0:o.value=!1,o.value=!0,l.value=!1,r.value=!1,n.value=!1,d.value=!1},E=()=>{e.radiobtn_half_day=="half_day"?n.value=!0:n.value=!1,n.value=!0,l.value=!1,r.value=!1,o.value=!1,d.value=!1},P=()=>{e.radiobtn_custom=="custom"?l.value=!0:l.value=!1,l.value=!0,r.value=!1,n.value=!1,o.value=!1,d.value=!1},A=()=>{l.value==!0&&(e.custom_start_date.length<0||e.custom_start_date=="")&&u.add({severity:"info",summary:"Info Message",detail:"Select Start date",life:3e3}),r.value==!0&&(e.permission_start_time<0||e.permission_start_time=="")&&u.add({severity:"info",summary:"Info Message",detail:"Select Start Time",life:3e3}),new Date().toJSON().slice(0,10);var t=new Date(e.custom_start_date);console.log(e.custom_start_date);var f=new Date(e.custom_end_date);console.log(e.custom_end_date);var i=f.getTime()-t.getTime();console.log("Differenece"+i);var h=(i/(1e3*60*60*24)).toFixed(0);let c=h;console.log(c),e.custom_total_days=parseInt(c)+1,console.log(e.custom_total_days);var m=new Date(e.compensatory_start_date);console.log(e.compensatory_start_date);var p=new Date(e.compensatory_end_date);console.log(e.compensatory_end_date);var i=p.getTime()-m.getTime();console.log("Differenece"+i);var h=(i/(1e3*60*60*24)).toFixed(0);let C=h;console.log(C),e.compensatory_total_days=parseInt(C)+1,console.log(e.compensatory_total_days)},N=()=>{let t=_(e.full_day_leave_date).format("YYYY-MM-DD"),f=e.permission_start_time.toString();f=t+" "+f.substring(16,24);let c=e.permission_end_time.toString();c=t+" "+c.substring(16,24),console.log();let m=new Date(e.permission_start_time).getTime(),p=new Date(e.permission_end_time).getTime();console.log("start"+m,"end"+p);var i=((p-m)/1e3/60/60).toFixed(0);e.permission_total_time=i,console.log(i)},k=()=>{e.selected_leave.includes("Permission")?(r.value=!0,v.value=!1,n.value=!1,l.value=!1,d.value=!1,o.value=!1):e.selected_leave.includes("Compensatory")?(d.value=!0,r.value=!1,o.value=!1,n.value=!1,l.value=!1,v.value=!1,T(),e.compensatory_leaves_dates=_(e.compensatory_leaves.emp_attendance_date).format("dddd DD-MMM-YYYY"),console.log("kn"+e.compensatory_leaves.emp_attendance_date)):e.selected_leave=="Select"?(d.value=!1,r.value=!1,o.value=!0,n.value=!1,l.value=!1,v.value=!0):(r.value=!1,d.value=!1,v.value=!0,o.value=!0)},O=()=>{g.get("/currentUser").then(t=>{e.current_login_user=t.data,y.value=!1}).catch(t=>{console.log(t)})},j=()=>{g.get("/fetch-leave-policy-details").then(t=>{console.log(t.data),b.value=t.data})},T=()=>{e.current_login_user,g.get("/fetch-employee-unused-compensatory-days").then(t=>{e.compensatory_leaves=t.data}).catch(t=>{console.log(t)})},a=I({leave_type_id:1,leave_Request_date:_().format("YYYY-MM-DD  HH:mm:ss"),leave_type_name:"",leave_session:"",start_date:"",end_date:"",no_of_days:"",hours_diff:"",notify_to:"",leave_reason:"",compensatory_leave_id:[],user_type:"Employee"});return{leaveApplyDailog:S,leave_data:e,invalidDate:Y,today:D,invalidDates:M,toast:u,leave_Request_data:a,leave_types:b,data_checking:y,Email_Service:x,Email_Error:F,selected_compensatory_leaves:L,half_day:E,full_day:R,custom_day:P,Permission:k,Submit:async()=>{if(a.leave_type_name=e.selected_leave,e.radiobtn_full_day=="full_day")console.log("Full day leave : "+e.full_day_leave_date),a.no_of_days=1,a.start_date=_(e.full_day_leave_date).format("YYYY-MM-DD"),a.end_date=a.start_date,a.leave_session="";else if(e.radiobtn_half_day=="half_day")if(console.log("Applying half-day leave on : "+e.half_day_leave_date),a.no_of_days=.5,console.log("half day leave date"+e.half_day_leave_date),a.start_date=_(e.half_day_leave_date).format("YYYY-MM-DD"),a.end_date=a.start_date,e.half_day_leave_session=="forenoon")a.leave_session="FN";else if(e.half_day_leave_session=="afternoon")a.leave_session="AN";else{u.add({severity:"info",summary:"Select Session",detail:"Select Leave Session",life:3e3});return}else if(e.radiobtn_custom=="custom")a.start_date=_(e.custom_start_date).format("YYYY-MM-DD"),a.end_date=_(e.custom_end_date).format("YYYY-MM-DD"),a.no_of_days=e.custom_total_days,a.leave_session="";else if(e.selected_leave.includes("Compensatory")){a.start_date=_(e.compensatory_start_date).format("YYYY-MM-DD"),a.end_date=_(e.compensatory_end_date).format("YYYY-MM-DD"),a.no_of_days=e.compensatory_total_days;let t=Object.values(e.selected_compensatory_leaves).length;console.log("Selected Compensatory No.of days : "+e.compensatory_total_days),console.log("Selected Compensatory Leaves : "+t);const f=Object.values(e.selected_compensatory_leaves);if(parseInt(e.compensatory_total_days)!=t){u.add({severity:"info",summary:"Error",detail:"Compensatory leaves doesnt match with available leave days",life:3e3});return}else f.map(c=>{let m=c.emp_attendance_id;a.compensatory_leave_id.push(m),console.log(a.compensatory_leave_id)})}else e.selected_leave.includes("Permission")?(a.start_date=_(e.permission_date).format("YYYY-MM-DD"),a.end_date=a.start_date,a.hours_diff=e.permission_total_time):u.add({severity:"info",summary:"Info Message",detail:"Select Leave",life:3e3});a.notify_to=e.notifyTo,a.leave_reason=e.leave_reason,w.value=!0,console.log(a),y.value=!0,g.post("/applyLeaveRequest",{user_code:q.current_user_code,leave_request_date:a.leave_Request_date,leave_type_name:a.leave_type_name,leave_session:a.leave_session,start_date:a.start_date,end_date:a.end_date,no_of_days:a.no_of_days,hours_diff:a.hours_diff,compensatory_work_days_ids:a.compensatory_leave_id,notify_to:a.notify_to,leave_reason:a.leave_reason,user_type:a.user_type}).then(t=>{y.value=!1,console.log(t.data.messege),t.data.status=="success"&&Swal.fire("Success",t.data.message,"success"),t.data.status=="failure"&&Swal.fire("Failure",t.data.message,"error"),console.log("Email status"+t.data.status)}).catch(t=>{console.log(t)}).finally(()=>{S.value=!1})},ReloadPage:()=>{location.reload()},dayCalculation:A,time_difference:N,get_user:O,get_leave_types:j,get_compensatroy_leaves:T,full_day_format:o,half_day_format:n,custom_format:l,Permission_format:r,compensatory_format:d,TotalNoOfDays:v,RequiredField:w}});export{Z as u};
