import{d as _}from"./pinia-3f44ac08.js";import{a}from"./index-362795f3.js";import{S as y}from"./Service-ff2a1406.js";import"./autoprefixer-6d6f7a0f.js";import{I as e}from"./toastservice.esm-918560db.js";const M=_("mainDashboardStore",()=>{const l=y(),i=e(!1),u=e(!1),h=e(!1),d=e(!1),f=e(!1),p=e(!1),o=e(),g=e([]),r=e([]),c=e([]),s=e(!0);async function m(n,v){await a.get("/getAllNewDashboardDetails").then(t=>{o.value=t.data.all_events,r.value=t.data.leave_balance_per_month,c.value=t.data.attenance_report_permonth}).finally(()=>{s.value=!1})}async function S(n,v){await a.get("/getAttendanceStatus",{user_code:"PLIPL068",date:"2023-06-26"}).then(t=>{console.log("getAttendanceStatus() : "+t.data)}).finally(()=>{})}return{service:l,canShowLoading:s,open:i,canShowClients:h,canShowConfiguration:f,canShowCurrentEmployee:p,canShowOrganization:d,canShowTopbar:u,getCurrentlyLoginUser:()=>a.get("/currentUserName"),getAttendanceStatus:S,getMainDashboardData:m,updateCheckin_out:n=>a.post("/performAttendanceCheckIn",n),fetch_leave_history:()=>a.get("http://localhost:8000/fetch-leaverequests/employee/Approved,Rejected,Pending,Revoked,Withdrawn%20"),allEventSource:o,leaveBalancePerMonthSource:r,allNotificationSource:g,attenanceReportPerMonth:c}});export{M as u};
