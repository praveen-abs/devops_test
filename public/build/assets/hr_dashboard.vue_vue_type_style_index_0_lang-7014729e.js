import{s as k,r as e}from"./app-8ad6b03e.js";import{a as o}from"./index-362795f3.js";import{S as q}from"./Service-64a588f9.js";import"./autoprefixer-6d6f7a0f.js";const B=k("mainDashboardStore",()=>{const y=q(),g=e(!1),f=e(!1),m=e(!1),S=e(!1),b=e(!1),w=e(!1),D=e({}),x=e(),C=e(!1),E=e(0),_=e(),M=e([]),c=e([]),u=e([]),s=e(!0),i=e(!0),d=e(!0);async function P(t,r){s.value=!0,await o.get("/getAllNewDashboardDetails").then(n=>{_.value=n.data.all_events,c.value=n.data.leave_balance_per_month,u.value=n.data.attenance_report_permonth}).finally(()=>{s.value=!1,i.value=!1})}async function R(t,r){await o.get("/getAttendanceStatus",{user_code:"PLIPL068",date:"2023-06-26"}).then(n=>{}).finally(()=>{})}const A=()=>o.get("/currentUserName"),j=t=>o.post("/performAttendanceCheckIn",t),L=()=>o.get("http://localhost:8000/fetch-leaverequests/employee/Approved,Rejected,Pending,Revoked,Withdrawn%20"),N=e(),v=e(),h=e(),l=e(),p=e([]);return{service:y,canShowLoading:s,open:g,isDashboardDataReceived:i,isHrDashboardDataReceived:d,canShowClients:m,canShowConfiguration:b,canShowCurrentEmployee:w,canShowOrganization:S,canShowTopbar:f,getCurrentlyLoginUser:A,getAttendanceStatus:R,getMainDashboardData:P,updateCheckin_out:j,fetch_leave_history:L,allEventSource:_,leaveBalancePerMonthSource:c,allNotificationSource:M,attenanceReportPerMonth:u,currentDashboard:E,getHrDashboardMainSource:async()=>{s.value=!0,await o.get("/get-employees_count-detail").then(t=>{v.value=t.data.employee_details_count;let r=Object.entries(t.data.pending_request_count).map(a=>({title:a[0],value:a[1]}));h.value=r;let n=Object.entries(t.data.graph_chart_count).map(a=>({title:a[0],value:a[1]}));l.value=n,l.value.forEach(a=>{p.value.push(a.value)})}).finally(()=>{s.value=!1,d.value=!1})},hrDashboardSource:N,orgEmployeeDetailCount:v,hrPendingRequestCount:h,overallEmployeeCount:l,overallEmployeeCountForGraph:p,ShowEmployeeStatuswise:D,canShowSidebar:C,reportName:x}});export{B as u};
