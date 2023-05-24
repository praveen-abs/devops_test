import{d as H}from"./pinia-3100160b.js";import{a4 as j,a2 as I,H as s}from"./toastservice.esm-371af8c0.js";import{a as y}from"./index-362795f3.js";import{h as d}from"./moment-fbc5633a.js";const K=H("useLeaveService",()=>{const i=j(),e=I({current_login_user:"",selected_leave:"",full_day_leave_date:"",half_day_leave_date:"",half_day_leave_session:"",radiobtn_full_day:"",radiobtn_half_day:"",radiobtn_custom:"",custom_start_date:"",custom_end_date:"",custom_total_days:"",permission_start_time:"",permission_total_time:"",permission_end_time:"",compensatory_leaves:"",compensatory_leaves_dates:"",selected_compensatory_leaves:"",compensatory_start_date:"",compensatory_total_days:"",compensatory_end_date:"",notifyTo:"",leave_reason:"",leave_request_error_messege:""}),f=s(!0),l=s(!0),_=s(!1),o=s(!1),n=s(!1),r=s(!1),Y=s(),M=s();let p=new Date;const S=s(!1),v=s(!1),b=s(!1),T=s(!1);let g=new Date;g.setDate(p.getDate()-1),Y.value=[p,g];const q=s(),R=()=>{e.radiobtn_full_day=="full_day"?l.value=!0:l.value=!1,l.value=!0,o.value=!1,n.value=!1,_.value=!1,r.value=!1},F=()=>{e.radiobtn_half_day=="half_day"?_.value=!0:_.value=!1,o.value=!1,n.value=!1,l.value=!1,r.value=!1,_.value=!0},L=()=>{e.radiobtn_custom=="custom"?o.value=!0:o.value=!1,o.value=!0,n.value=!1,_.value=!1,l.value=!1,r.value=!1},x=()=>{o.value==!0&&(e.custom_start_date.length<0||e.custom_start_date=="")&&i.add({severity:"info",summary:"Info Message",detail:"Select Start date",life:3e3}),n.value==!0&&(e.permission_start_time<0||e.permission_start_time=="")&&i.add({severity:"info",summary:"Info Message",detail:"Select Start Time",life:3e3}),new Date().toJSON().slice(0,10);var t=new Date(e.custom_start_date);console.log(e.custom_start_date);var u=new Date(e.custom_end_date);console.log(e.custom_end_date);var m=u.getTime()-t.getTime();console.log("Differenece"+m);var h=(m/(1e3*60*60*24)).toFixed(0);let c=h;console.log(c),e.custom_total_days=parseInt(c)+1,console.log(e.custom_total_days);var D=new Date(e.compensatory_start_date);console.log(e.compensatory_start_date);var O=new Date(e.compensatory_end_date);console.log(e.compensatory_end_date);var m=O.getTime()-D.getTime();console.log("Differenece"+m);var h=(m/(1e3*60*60*24)).toFixed(0);let C=h;console.log(C),e.compensatory_total_days=parseInt(C)+1,console.log(e.compensatory_total_days)},E=()=>{console.log(e.permission_start_time),console.log(e.permission_end_time);let t=new Date(e.permission_start_time).getTime(),u=new Date(e.permission_end_time).getTime();console.log("start"+t,"end"+u);var c=((u-t)/1e3/60/60).toFixed(0);e.permission_total_time=c,console.log(c)},N=()=>{e.selected_leave.includes("Permission")?(n.value=!0,f.value=!1,_.value=!1,o.value=!1,r.value=!1):e.selected_leave.includes("Compensatory")?(r.value=!0,n.value=!1,l.value=!1,_.value=!1,o.value=!1,f.value=!1,w(),e.compensatory_leaves_dates=d(e.compensatory_leaves.emp_attendance_date).format("dddd DD-MMM-YYYY"),console.log("kn"+e.compensatory_leaves.emp_attendance_date)):e.selected_leave=="Select"?(r.value=!1,n.value=!1,l.value=!0,_.value=!1,o.value=!1,f.value=!0):(n.value=!1,r.value=!1,f.value=!0,l.value=!0)},P=()=>{y.get("/currentUser").then(t=>{e.current_login_user=t.data,v.value=!1}).catch(t=>{console.log(t)})},k=()=>{y.get("/fetch-leave-policy-details").then(t=>{console.log(t.data),M.value=t.data})},w=()=>{e.current_login_user,y.get("/fetch-employee-unused-compensatory-days").then(t=>{e.compensatory_leaves=t.data}).catch(t=>{console.log(t)})},a=I({leave_type_id:1,leave_Request_date:d().format("YYYY-MM-DD  HH:mm:ss"),leave_type_name:"",leave_session:"",start_date:"",end_date:"",no_of_days:"",hours_diff:"",notify_to:"",leave_reason:"",compensatory_leave_id:[]});return{leave_data:e,invalidDate:g,today:p,invalidDates:Y,toast:i,leave_Request_data:a,leave_types:M,data_checking:v,Email_Service:b,Email_Error:T,selected_compensatory_leaves:q,half_day:F,full_day:R,custom_day:L,Permission:N,Submit:()=>{if(a.leave_type_name=e.selected_leave,e.radiobtn_full_day=="full_day")console.log("Full day leave : "+e.full_day_leave_date),a.no_of_days=1,a.start_date=d(e.full_day_leave_date).format("YYYY-MM-DD"),a.end_date=a.start_date,a.leave_session="";else if(e.radiobtn_half_day=="half_day")if(console.log("Applying half-day leave on : "+e.half_day_leave_date),a.no_of_days=.5,console.log("half day leave date"+e.half_day_leave_date),a.start_date=d(e.half_day_leave_date).format("YYYY-MM-DD"),a.end_date=a.start_date,e.half_day_leave_session=="forenoon")a.leave_session="FN";else if(e.half_day_leave_session=="afternoon")a.leave_session="AN";else{i.add({severity:"info",summary:"Select Session",detail:"Select Leave Session",life:3e3});return}else if(e.radiobtn_custom=="custom")a.start_date=d(e.custom_start_date).format("YYYY-MM-DD"),a.end_date=d(e.custom_end_date).format("YYYY-MM-DD"),a.no_of_days=e.custom_total_days,a.leave_session="";else if(e.selected_leave.includes("Compensatory")){a.start_date=d(e.compensatory_start_date).format("YYYY-MM-DD"),a.end_date=d(e.compensatory_end_date).format("YYYY-MM-DD"),a.no_of_days=e.compensatory_total_days;let t=Object.values(e.selected_compensatory_leaves).length;console.log("Selected Compensatory No.of days : "+e.compensatory_total_days),console.log("Selected Compensatory Leaves : "+t);const u=Object.values(e.selected_compensatory_leaves);if(parseInt(e.compensatory_total_days)!=t){i.add({severity:"info",summary:"Error",detail:"Compensatory leaves doesnt match with available leave days",life:3e3});return}else u.map(c=>{let D=c.emp_attendance_id;a.compensatory_leave_id.push(D),console.log(a.compensatory_leave_id)})}else i.add({severity:"info",summary:"Info Message",detail:"Select Leave",life:3e3});a.notify_to=e.notifyTo,a.leave_reason=e.leave_reason,S.value=!0,console.log(a),v.value=!0,y.post("/applyLeaveRequest",{leave_request_date:a.leave_Request_date,leave_type_name:a.leave_type_name,leave_session:a.leave_session,start_date:a.start_date,end_date:a.end_date,no_of_days:a.no_of_days,hours_diff:a.hours_diff,compensatory_work_days_ids:a.compensatory_leave_id,notify_to:a.notify_to,leave_reason:a.leave_reason}).then(t=>{v.value=!1,t.data.status=="success"?b.value=!0:t.data.status=="failure"&&(e.leave_request_error_messege=t.data.message,T.value=!0),console.log("Email status"+t.data.status)}).catch(t=>{console.log(t)})},ReloadPage:()=>{location.reload()},dayCalculation:x,time_difference:E,get_user:P,get_leave_types:k,get_compensatroy_leaves:w,full_day_format:l,half_day_format:_,custom_format:o,Permission_format:n,compensatory_format:r,TotalNoOfDays:f,RequiredField:S}});export{K as u};
