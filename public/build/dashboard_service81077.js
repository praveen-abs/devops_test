import{d as j}from"./pinia81077.js";import{a as n}from"./index81077.js";import{S as q}from"./Service81077.js";import"./autoprefixer81077.js";import{Q as e}from"./inputnumber.esm81077.js";const H=j("mainDashboardStore",()=>{const g=q(),v=e(!1),f=e(!1),m=e(!1),S=e(!1),_=e(!1),y=e(!1),b=e(0),s=e(),D=e([]),u=e([]),i=e([]),r=e(!0);async function w(t,l){r.value=!0,await n.get("/getAllNewDashboardDetails").then(a=>{s.value=a.data.all_events,u.value=a.data.leave_balance_per_month,i.value=a.data.attenance_report_permonth}).finally(()=>{r.value=!1})}async function C(t,l){await n.get("/getAttendanceStatus",{user_code:"PLIPL068",date:"2023-06-26"}).then(a=>{console.log("getAttendanceStatus() : "+a.data)}).finally(()=>{})}const A=()=>n.get("/currentUserName"),E=t=>n.post("/performAttendanceCheckIn",t),M=()=>n.get("http://localhost:8000/fetch-leaverequests/employee/Approved,Rejected,Pending,Revoked,Withdrawn%20"),P=e(),d=e(),h=e(),c=e(),p=e([]);return{service:g,canShowLoading:r,open:v,canShowClients:m,canShowConfiguration:_,canShowCurrentEmployee:y,canShowOrganization:S,canShowTopbar:f,getCurrentlyLoginUser:A,getAttendanceStatus:C,getMainDashboardData:w,updateCheckin_out:E,fetch_leave_history:M,allEventSource:s,leaveBalancePerMonthSource:u,allNotificationSource:D,attenanceReportPerMonth:i,currentDashboard:b,getHrDashboardMainSource:()=>{r.value=!0,n.get("/get-employees_count-detail").then(t=>{console.log(t.data.pending_request_count),d.value=t.data.employee_details_count;let l=Object.entries(t.data.pending_request_count).map(o=>({title:o[0],value:o[1]}));h.value=l;let a=Object.entries(t.data.graph_chart_count).map(o=>({title:o[0],value:o[1]}));c.value=a,c.value.forEach(o=>{p.value.push(o.value)})}).finally(()=>{r.value=!1})},hrDashboardSource:P,orgEmployeeDetailCount:d,hrPendingRequestCount:h,overallEmployeeCount:c,overallEmployeeCountForGraph:p}});export{H as u};
