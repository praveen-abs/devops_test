import{d as v}from"./pinia-61b2fb76.js";import{a}from"./index-362795f3.js";import{S as _}from"./Service-1f419817.js";import"./autoprefixer-6d6f7a0f.js";import{$ as e}from"./toastservice.esm-5497698c.js";const k=v("mainDashboardStore",()=>{const l=_(),u=e(!1),h=e(!1),d=e(!1),f=e(!1),g=e(!1),o=e(),r=e([]),c=e([]),s=e([]),i=e(!0);async function m(n,S){await a.get("/getAllNewDashboardDetails").then(t=>{o.value=t.data.all_events.birthday,r.value=t.data.all_notification.array_notifications,c.value=t.data.leave_balance_per_month,s.value=t.data.attenance_report_permonth}).finally(()=>{i.value=!1})}async function p(n,S){await a.get("/getAttendanceStatus",{user_code:"PLIPL068",date:"2023-06-26"}).then(t=>{console.log("getAttendanceStatus() : "+t.data)}).finally(()=>{})}return{service:l,canShowLoading:i,canShowClients:h,canShowConfiguration:f,canShowCurrentEmployee:g,canShowOrganization:d,canShowTopbar:u,getCurrentlyLoginUser:()=>a.get("/currentUserName"),getAttendanceStatus:p,getMainDashboardData:m,updateCheckin_out:n=>a.post("/performAttendanceCheckIn",n),fetch_leave_history:()=>a.get("http://localhost:8000/fetch-leaverequests/employee/Approved,Rejected,Pending,Revoked,Withdrawn%20"),allEventSource:o,leaveBalancePerMonthSource:c,allNotificationSource:r,attenanceReportPerMonth:s}});export{k as u};
