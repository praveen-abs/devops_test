import{_ as W}from"./no-data-17442c4e.js";import{d as Q}from"./dayjs.min-2f06af28.js";import{e as G}from"./exceljs.min-edd65134.js";import{a as H,c as P}from"./index-362795f3.js";import{q as Z,r as u,h as o,e as g,f as b,g as e,t as m,j as M,o as I,c as R,k as z,F as U,m as V,H as Y,i as F,n as v,p as B,_ as ee,l as L,C as te,D as oe}from"./app-140571a9.js";import{L as ne}from"./LoadingSpinner-1736c900.js";import"./_commonjs-dynamic-modules-302442b1.js";/* empty css                                                                       */const se="/build/assets/present-img-ae7c8f7a.png",ae="/build/assets/Absent-6ed9e5f4.png",le="/build/assets/Leave-4ca0d5f0.png",re="/build/assets/Early_going-6bfb3337.png",ie="/build/assets/Late_coming-52c4aae0.png",q="/build/assets/MIP_MOP-c9ad109b.png",j=Z("useAttendanceDashboardMainStore",()=>{const w=u(!1);u();const t=u(),f=u(),c=u(!1),h=u(!1),x=u(),d=u([]),p=u(),a=u(),n=u([]),s=u([]),i=u(),l=u([]),r=u(),C=u(),$=u([]),y=u(),_=u([{label:"Absent",backgroundColor:"#FFB1B8",count:null},{label:"Present",backgroundColor:"#7A5EA2",count:null},{label:"Leave",backgroundColor:"#8D98B5",count:null},{label:"Late coming",backgroundColor:"#D9AA63",count:null},{label:"Early going",backgroundColor:"#6BB7C0",count:null},{label:"Missed out punch",backgroundColor:"#000000",count:null},{label:"Missed in punch",backgroundColor:"#000000",count:null}]);function A(){H.get("/fetch-departments").then(E=>{y.value=E.data,console.log(E.data)}).finally(()=>{})}function S(E){H.post("/get-attendance-dashboard",{department_id:E}).then(O=>{}).finally(()=>{})}return{canShowLoading:w,attendanceDashboardWorkShiftSource:f,getAttendanceDashboardMainSource:async()=>{w.value=!0;let E="/get-attendance-dashboard";await H.post(E).then(O=>{t.value=O.data.attendance_overview,r.value=O.data.total_Employees,console.log(" totalEmployeeInOrganization.value"+r.value),_.value[0].count=parseInt(t.value.absent_count),_.value[1].count=parseInt(t.value.present_count),_.value[2].count=parseInt(t.value.leave_emp_count),_.value[3].count=parseInt(t.value.lc_count),_.value[4].count=parseInt(t.value.eg_count),_.value[5].count=parseInt(t.value.mop_count),_.value[6].count=parseInt(t.value.mip_count),f.value=O.data.work_shift;let X=Object.entries(O.data.upcomings).map(D=>({title:D[0],value:D[1]}));a.value=X;let K=Object.entries(O.data.attendance_overview).map(D=>({title:D[0],value:D[1]}));i.value=K;let J=["absent_count","present_count","leave_emp_count","lc_count","eg_count","mop_count","mip_count"];i.value.forEach(async D=>{l.value.length<7&&J.includes(D.title)&&l.value.push(D.value)}),C.value=O.data.CheckInMode,C.value.forEach(async D=>{$.value.length<3&&$.value.push(D.value)})}).finally(()=>{w.value=!1})},attendanceOverview:t,totalEmployeeInOrganization:r,chartDetails:_,canShowShiftDetails:c,canShowAttendanceOverview:h,selectedAttendanceOverviewReport:x,currentlySelectedShiftDetails:d,currentlySelectedShiftName:p,downloadShiftDetails:n,downloadAttendanceOverviewDetails:s,attendanceDashboardUpcoming:a,overallEmployeeCountForExceptionAnalytics:i,overallEmployeeCountForExceptionAnalyticsForGraph:l,AttendanceAnalytics:C,AttendanceAnalyticsForGraph:$,GetDepartment:A,departments:y,send_selectedDepartment:S}}),ce={key:0,class:"grid grid-cols-7 gap-4"},de={class:"px-auto mx-auto flex justify-around items-center w-[86px]"},ue={class:"mr-2 text-3xl font-semibold text-center"},pe=e("img",{class:"right-8 w-[16px] h-[16px]",src:se,alt:""},null,-1),_e=e("p",{class:"text-lg underline text-center text-gray-500 font-[Poppins] font-medium mt-[10px]"},"Present",-1),he={class:"px-auto mx-auto flex justify-around items-center w-[86px]"},ve={class:"text-3xl font-semibold text-center"},me=e("img",{class:"ml-6 w-[20px] h-[20px]",src:ae,alt:""},null,-1),fe=e("p",{class:"text-lg underline text-center text-gray-500 font-[Poppins] font-medium mt-[10px]"},"Absent",-1),ge={class:"px-auto mx-auto flex justify-around items-center w-[86px]"},xe={class:"text-3xl font-semibold text-center"},be=e("img",{src:le,alt:"",class:"ml-6 w-[20px] h-[20px]"},null,-1),we=e("p",{class:"text-lg underline text-center text-gray-500 font-[Poppins] font-medium mt-[10px]"},"Leave",-1),ye={class:"px-auto mx-auto flex justify-around items-center w-[86px]"},Se={class:"text-3xl font-semibold text-center"},$e=e("img",{src:re,class:"ml-6 w-[20px] h-[20px]",alt:""},null,-1),Ae=e("p",{class:"text-lg underline font-semibold text-center text-gray-500 mt-[10px]"},"Late coming",-1),Ce={class:"px-auto mx-auto flex justify-around items-center w-[86px]"},De={class:"text-3xl font-semibold text-center"},ke=e("img",{src:ie,class:"ml-6 w-[20px] h-[20px]",alt:""},null,-1),Oe=e("p",{class:"text-lg underline font-semibold text-center text-gray-500 mt-[10px]"},"Early going",-1),Ee={class:"px-auto mx-auto flex justify-around items-center w-[86px]"},Le={class:"text-3xl font-semibold text-center"},Re=e("img",{src:q,class:"ml-6 w-[20px] h-[20px]",alt:""},null,-1),Me=e("p",{class:"text-lg underline font-semibold text-center text-gray-500 mt-[10px]"},"Missed in punch",-1),je={class:"px-auto mx-auto flex justify-around items-center w-[86px]"},Pe={class:"text-3xl font-semibold text-center"},Be=e("img",{src:q,class:"ml-6 w-[20px] h-[20px]",alt:""},null,-1),Fe=e("p",{class:"text-lg underline font-semibold text-center text-gray-500 mt-[10px]"},"Missed out punch",-1),Ue={__name:"attendanceCount",setup(w){const t=j();return(f,c)=>o(t).attendanceOverview?(g(),b("div",ce,[e("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:c[0]||(c[0]=h=>(o(t).selectedAttendanceOverviewReport="Present",o(t).canShowAttendanceOverview=!0,o(t).currentlySelectedShiftDetails={...o(t).attendanceOverview.present_emps},o(t).downloadAttendanceOverviewDetails.push({...o(t).attendanceOverview.present_emps})))},[e("div",de,[e("span",ue,m(o(t).attendanceOverview.present_count),1),pe]),_e]),e("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:c[1]||(c[1]=h=>(o(t).selectedAttendanceOverviewReport="Absent",o(t).canShowAttendanceOverview=!0,o(t).currentlySelectedShiftDetails={...o(t).attendanceOverview.absent_emps},o(t).downloadAttendanceOverviewDetails.push({...o(t).attendanceOverview.absent_emps})))},[e("div",he,[e("span",ve,m(o(t).attendanceOverview.absent_count),1),me]),fe]),e("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:c[2]||(c[2]=h=>(o(t).selectedAttendanceOverviewReport="Leave",o(t).canShowAttendanceOverview=!0,o(t).currentlySelectedShiftDetails={...o(t).attendanceOverview.leave_emps},o(t).downloadAttendanceOverviewDetails.push({...o(t).attendanceOverview.leave_emps})))},[e("div",ge,[e("span",xe,m(o(t).attendanceOverview.leave_emp_count),1),be]),we]),e("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:c[3]||(c[3]=h=>(o(t).selectedAttendanceOverviewReport="Late coming",o(t).canShowAttendanceOverview=!0,o(t).currentlySelectedShiftDetails={...o(t).attendanceOverview.lc_emps},o(t).downloadAttendanceOverviewDetails.push({...o(t).attendanceOverview.lc_emps})))},[e("div",ye,[e("span",Se,m(o(t).attendanceOverview.lc_count),1),$e]),Ae]),e("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:c[4]||(c[4]=h=>(o(t).selectedAttendanceOverviewReport="Early going",o(t).canShowAttendanceOverview=!0,o(t).currentlySelectedShiftDetails={...o(t).attendanceOverview.eg_emps},o(t).downloadAttendanceOverviewDetails.push({...o(t).attendanceOverview.eg_emps})))},[e("div",Ce,[e("span",De,m(o(t).attendanceOverview.eg_count),1),ke]),Oe]),e("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:c[5]||(c[5]=h=>(o(t).selectedAttendanceOverviewReport="Missed in punch",o(t).canShowAttendanceOverview=!0,o(t).currentlySelectedShiftDetails={...o(t).attendanceOverview.mip_emps},o(t).downloadAttendanceOverviewDetails.push({...o(t).attendanceOverview.mip_emps})))},[e("div",Ee,[e("span",Le,m(o(t).attendanceOverview.mip_count),1),Re]),Me]),e("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:c[6]||(c[6]=h=>(o(t).selectedAttendanceOverviewReport="Missed out punch",o(t).canShowAttendanceOverview=!0,o(t).currentlySelectedShiftDetails={...o(t).attendanceOverview.mop_emps},o(t).downloadAttendanceOverviewDetails.push({...o(t).attendanceOverview.mop_emps})))},[e("div",je,[e("span",Pe,m(o(t).attendanceOverview.mop_count),1),Be]),Fe])])):M("",!0)}},Te={key:0,class:"bg-white rounded-lg p-2 border"},Ie=e("p",{class:"font-semibold text-[14px] text-[#000] font-['Poppins] text-center"},"Attendance Analytics",-1),Ve={class:"grid grid-cols-2 gap-4 my-2.5"},He={class:"h-full"},Ge={class:"flex items-center"},Ne={class:""},We={class:"flex items-center gap-3"},ze={class:"font-semibold text-lg"},Ye={__name:"exceptionAnalytics",setup(w){const t=j();I(()=>{c.value=h(),setTimeout(()=>{console.log(t.overallEmployeeCountForExceptionAnalyticsForGraph),f.value.datasets[0].data=t.overallEmployeeCountForExceptionAnalyticsForGraph},15e3)}),u([]);const f=u({labels:["Absent","Present","Leave","Late coming","Early going","Missed out punch","Missed in punch"],datasets:[{backgroundColor:["#FFB1B8","#7A5EA2","#8D98B5","#D9AA63","#6BB7C0","#000000","#000000"],data:[0,0,0,0,0,0,0]}]}),c=u();u();const h=()=>{const d=getComputedStyle(document.documentElement),p=d.getPropertyValue("--text-color");return d.getPropertyValue("--text-color-secondary"),d.getPropertyValue("--surface-border"),{maintainAspectRatio:!1,aspectRatio:1,plugins:{labels:{usePointStyle:!0},title:{display:!1,text:"Custom Chart Title"},legend:{display:!1,labels:{fontColor:p}}}}},x=(d,p)=>`${(d/p*100).toFixed(0)}`;return(d,p)=>{const a=R("Chart");return o(t).chartDetails?(g(),b("div",Te,[Ie,e("div",Ve,[e("div",He,[o(t).overallEmployeeCountForExceptionAnalyticsForGraph?(g(),z(a,{key:0,type:"pie",data:f.value,options:c.value,class:"h-full"},null,8,["data","options"])):M("",!0)]),e("div",Ge,[e("div",Ne,[e("div",null,[(g(!0),b(U,null,V(o(t).chartDetails,(n,s)=>(g(),b("div",We,[e("div",{style:Y({backgroundColor:n.backgroundColor}),class:"rounded-lg h-2 w-2 p-1.5"},null,4),e("div",null,[F(m(n.label)+" - ",1),e("span",ze,m(x(n.count,o(t).totalEmployeeInOrganization)),1),F("% ")])]))),256))])])])])])):M("",!0)}}};const qe={key:0,class:"bg-white rounded-lg p-2 h-[100%]"},Xe=e("p",{class:"font-semibold text-[14px] text-[#000] font-['Poppins] text-center"},"Check-In & Out Analytics ",-1),Ke={class:"grid grid-cols-2 gap-4 my-2.5"},Je={class:"h-full"},Qe={class:"flex items-center"},Ze={class:"my-auto"},et={class:"flex items-center gap-3"},tt={class:"font-semibold text-lg"},ot=e("div",null,null,-1),nt={__name:"attendanceAnalytics",setup(w){const t=j();I(()=>{c.value=h(),setTimeout(()=>{f.value.datasets[0].data=t.AttendanceAnalyticsForGraph},3e3)});const f=u({labels:["Bio-Metric","Mobile","Web"],datasets:[{data:[0,0,0],backgroundColor:["rgba(122, 94, 162, 1)","rgba(255, 177, 184, 1)","rgba(107, 183, 192, 1)"]}]}),c=u();u(0),u([{label:"Bio-Metric",backgroundColor:"rgba(122, 94, 162, 1)"},{label:"Mobile",backgroundColor:"rgba(255, 177, 184, 1)"},{label:"Web",backgroundColor:"rgba(107, 183, 192, 1)"}]);const h=()=>{const d=getComputedStyle(document.documentElement),p=d.getPropertyValue("--text-color");return d.getPropertyValue("--text-color-secondary"),d.getPropertyValue("--surface-border"),{maintainAspectRatio:!1,aspectRatio:1,plugins:{labels:{usePointStyle:!0},title:{display:!1,text:"Custom Chart Title"},legend:{display:!1,labels:{fontColor:p}}}}},x=(d,p)=>`${(d/p*100).toFixed(0)}`;return(d,p)=>{const a=R("Chart");return o(t).AttendanceAnalytics?(g(),b("div",qe,[Xe,e("div",Ke,[e("div",Je,[v(a,{type:"doughnut",data:f.value,options:c.value},null,8,["data","options"])]),e("div",Qe,[e("div",Ze,[e("div",null,[(g(!0),b(U,null,V(o(t).AttendanceAnalytics,(n,s)=>(g(),b("div",et,[e("div",{style:Y({backgroundColor:f.value.datasets[0].backgroundColor[s]}),class:"rounded-lg h-2 w-2 p-1.5"},null,4),e("div",null,[F(m(n.title)+" - ",1),e("span",tt,m(x(n.value,o(t).totalEmployeeInOrganization)),1),F("% ")])]))),256))]),ot])])])])):M("",!0)}}},st={class:"bg-[#E4ECFF] h-full rounded-lg p-3"},at=e("div",{class:"mx-4 flex items-center justify-between"},[e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Upcomings"),e("i",{class:"pi pi-calendar text-[#000] text-[16px]"})],-1),lt={class:"overflow-x-scroll bg-[#E4ECFF] rounded-lg"},rt={class:"px-auto"},it={class:"p-2 my-2 transition duration-700 ease-in-out bg-white rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"},ct={class:"flex px-2 justify-between items-center"},dt={class:"text-[14px] font-semibold"},ut={class:"flex items-center gap-6"},pt={class:"text-xl font-semibold text-black"},_t=e("span",null,[e("i",{class:"fa fa-chevron-right","aria-hidden":"true"})],-1),ht={key:1,class:"font-medium text-sm text-center"},vt={__name:"Upcomings",setup(w){const t=j();return(f,c)=>(g(),b("div",st,[at,e("div",lt,[o(t).attendanceDashboardUpcoming?(g(!0),b(U,{key:0},V(o(t).attendanceDashboardUpcoming,h=>(g(),b("div",rt,[e("div",it,[e("div",ct,[e("div",null,[e("span",dt,m(h.title),1)]),e("div",ut,[e("span",pt,m(h.value),1),_t])])])]))),256)):(g(),b("p",ht,"No data to display"))])]))}},mt={key:0,class:"bg-white p-2 rounded-[6px] border"},ft=e("span",{class:"font-semibold text-[#000] font-['Poppins] text-[16px]"},"Shift",-1),gt={class:"grid grid-cols-6 gap-2"},xt=["onClick"],bt={class:"p-3"},wt=e("p",{class:"font-semibold text-sm text-[#000] font-['Poppins]"},"Shift Timing",-1),yt={class:"font-medium text-[12px] text-gray-600 font-['Poppins]"},St={class:"my-3"},$t=e("p",{class:"font-semibold text-sm text-[#000] font-['Poppins]"},"Total Employees",-1),At={class:"font-medium text-[12px] text-gray-600 font-['Poppins]"},Ct={class:"flex justify-between"},Dt=e("p",{class:"font-semibold text-sm text-[#000] font-['Poppins]"},"Present",-1),kt={class:"font-medium text-[12px] text-gray-600 font-['Poppins]"},Ot={class:"mx-3"},Et=e("p",{class:"font-semibold text-sm text-[#000] font-['Poppins]"},"Absent",-1),Lt={class:"font-medium text-[12px] text-gray-600 font-['Poppins]"},Rt={__name:"Shifts",setup(w){const t=j();function f(n){const[s,i]=n.split(":").map(Number),l=s>=12?"PM":"AM";return`${s%12===0?12:s%12}:${String(i).padStart(2,"0")} ${l}`}const c=["bg-orange-100","bg-red-100","bg-orange-100","bg-gray-100","bg-emerald-100","bg-orange-100","bg-red-100","bg-orange-100","bg-gray-100","bg-black-100"],h=n=>c[n],x=["bg-orange-50","bg-red-50","bg-orange-50","bg-gray-50","bg-emerald-50","bg-orange-50","bg-red-50","bg-orange-50","bg-gray-50","bg-black-50"],d=n=>x[n],p=["text-[#000]","text-[#000]","text-[#000]","text-[#000]","text-[#000]","text-[#000]"],a=n=>p[n];return(n,s)=>o(t).attendanceDashboardWorkShiftSource?(g(),b("div",mt,[ft,e("div",gt,[(g(!0),b(U,null,V(o(t).attendanceDashboardWorkShiftSource,(i,l)=>(g(),b("div",{class:B([d(l),"h-[200px] mx-[10px] rounded-[6px] cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"]),onClick:r=>(o(t).canShowShiftDetails=!0,o(t).currentlySelectedShiftDetails={...i.work_shift_employee_data},o(t).downloadShiftDetails.push({...i.work_shift_employee_data})),key:l},[e("div",{class:B(["w-full rounded-t-[8px] pl-[12px] py-2",h(l)])},[e("span",{class:B(["font-semibold text-[16px] font-['Poppins]",a(l)])},m(i.work_shift_employee_data[0].shift_name),3)],2),e("div",bt,[e("div",null,[wt,e("p",yt,m(f(i.work_shift_employee_data[0].shift_start_time))+" - "+m(f(i.work_shift_employee_data[0].shift_end_time)),1)]),e("div",St,[$t,e("p",At,m(i.work_shift_assigned_employees?i.work_shift_assigned_employees:"-"),1)]),e("div",Ct,[e("div",null,[Dt,e("p",kt,m(i.present_count?i.present_count:0),1)]),e("div",Ot,[Et,e("p",Lt,m(i.absent_count?i.absent_count:0),1)])])])],10,xt))),128))])])):M("",!0)}};var N={},Mt={get exports(){return N},set exports(w){N=w}};(function(w,t){(function(f,c){c()})(P,function(){function f(n,s){return typeof s>"u"?s={autoBom:!1}:typeof s!="object"&&(console.warn("Deprecated: Expected third argument to be a object"),s={autoBom:!s}),s.autoBom&&/^\s*(?:text\/\S*|application\/xml|\S*\/\S*\+xml)\s*;.*charset\s*=\s*utf-8/i.test(n.type)?new Blob(["\uFEFF",n],{type:n.type}):n}function c(n,s,i){var l=new XMLHttpRequest;l.open("GET",n),l.responseType="blob",l.onload=function(){a(l.response,s,i)},l.onerror=function(){console.error("could not download file")},l.send()}function h(n){var s=new XMLHttpRequest;s.open("HEAD",n,!1);try{s.send()}catch{}return 200<=s.status&&299>=s.status}function x(n){try{n.dispatchEvent(new MouseEvent("click"))}catch{var s=document.createEvent("MouseEvents");s.initMouseEvent("click",!0,!0,window,0,0,0,80,20,!1,!1,!1,!1,0,null),n.dispatchEvent(s)}}var d=typeof window=="object"&&window.window===window?window:typeof self=="object"&&self.self===self?self:typeof P=="object"&&P.global===P?P:void 0,p=d.navigator&&/Macintosh/.test(navigator.userAgent)&&/AppleWebKit/.test(navigator.userAgent)&&!/Safari/.test(navigator.userAgent),a=d.saveAs||(typeof window!="object"||window!==d?function(){}:"download"in HTMLAnchorElement.prototype&&!p?function(n,s,i){var l=d.URL||d.webkitURL,r=document.createElement("a");s=s||n.name||"download",r.download=s,r.rel="noopener",typeof n=="string"?(r.href=n,r.origin===location.origin?x(r):h(r.href)?c(n,s,i):x(r,r.target="_blank")):(r.href=l.createObjectURL(n),setTimeout(function(){l.revokeObjectURL(r.href)},4e4),setTimeout(function(){x(r)},0))}:"msSaveOrOpenBlob"in navigator?function(n,s,i){if(s=s||n.name||"download",typeof n!="string")navigator.msSaveOrOpenBlob(f(n,i),s);else if(h(n))c(n,s,i);else{var l=document.createElement("a");l.href=n,l.target="_blank",setTimeout(function(){x(l)})}}:function(n,s,i,l){if(l=l||open("","_blank"),l&&(l.document.title=l.document.body.innerText="downloading..."),typeof n=="string")return c(n,s,i);var r=n.type==="application/octet-stream",C=/constructor/i.test(d.HTMLElement)||d.safari,$=/CriOS\/[\d]+/.test(navigator.userAgent);if(($||r&&C||p)&&typeof FileReader<"u"){var y=new FileReader;y.onloadend=function(){var S=y.result;S=$?S:S.replace(/^data:[^;]*;/,"data:attachment/file;"),l?l.location.href=S:location=S,l=null},y.readAsDataURL(n)}else{var _=d.URL||d.webkitURL,A=_.createObjectURL(n);l?l.location=A:location.href=A,l=null,setTimeout(function(){_.revokeObjectURL(A)},4e4)}});d.saveAs=a.saveAs=a,w.exports=a})})(Mt);const k=w=>(te("data-v-d4ad86a0"),w=w(),oe(),w),jt={class:"w-full"},Pt=k(()=>e("p",{class:"mb-2 text-2xl font-semibold text-black"}," Attendance Dashboard ",-1)),Bt={class:"flex justify-between items-center p-2 bg-white border rounded-lg"},Ft={class:"mx-2"},Ut={class:"font-[14px] font-['Poppins'] text-gray-500"},Tt={class:"mb-2 text-sm font-semibold"},It={class:"flex items-center justify-end gap-3 mx-4"},Vt=k(()=>e("div",null,[e("i",{class:"pi pi-calendar text-[#000] text-[16px]"})],-1)),Ht={class:"my-3"},Gt={class:"grid grid-cols-3 gap-2"},Nt={class:"my-3"},Wt={class:"absolute left-0 mx-4 font-semibold fs-5"},zt={class:"relative right-0 mx-4 font-semibold fs-5"},Yt=k(()=>e("p",{class:"relative left-2 font-['poppins']"},"Download",-1)),qt=k(()=>e("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16"},[e("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check"}),e("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"}),e("path",{d:"M8,1 L8,11",class:"svg-out"})],-1)),Xt=[qt],Kt={key:0,class:""},Jt={key:1,class:"flex justify-center"},Qt=k(()=>e("img",{class:"h-[450px]",src:W,alt:"",srcset:""},null,-1)),Zt=[Qt],eo={class:"absolute left-0 mx-4 font-semibold fs-5"},to={class:"relative right-0 mx-4 font-semibold fs-5"},oo=k(()=>e("p",{class:"relative left-2 font-['poppins']"},"Download",-1)),no=k(()=>e("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16"},[e("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check"}),e("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"}),e("path",{d:"M8,1 L8,11",class:"svg-out"})],-1)),so=[no],ao={key:0,class:""},lo={key:1,class:"flex justify-center"},ro=k(()=>e("img",{class:"h-[450px]",src:W,alt:"",srcset:""},null,-1)),io=[ro],co={__name:"attendanceDashboard",setup(w){const t=j();I(async()=>{await t.getAttendanceDashboardMainSource(),t.GetDepartment()});const f=u();I(async()=>{await t.getAttendanceDashboardMainSource(),t.GetDepartment()});const c=async()=>{const p=new G.Workbook,a=p.addWorksheet("Sheet1"),n=["user_code","user_code","shift_start_time","shift_end_time","shift_end_time"],s="this report generated by ABShrms payroll software ",i=n;a.addRow(i).eachCell((_,A)=>{_.fill={type:"pattern",pattern:"solid",fgColor:{argb:"252f70"}},_.font={bold:!0,color:{argb:"ffffff"}},a.getColumn(A).width=20}),Object.values(t.currentlySelectedShiftDetails).forEach((_,A)=>{console.log(_);const S=[];i.forEach(T=>{S.push(_[T])}),a.addRow(S)}),a.addRow([""]);const r=a.addRow([""]);r.getCell(1).value=s,a.mergeCells(r.number,1,r.number,3),r.getCell(1).alignment={wrapText:!0},r.getCell(1).font={italic:!0};const C=await p.xlsx.writeBuffer(),$=window.URL.createObjectURL(new Blob([C])),y=document.createElement("a");y.href=$,y.download="shift.xlsx",y.click(),window.URL.revokeObjectURL($)},h=async()=>{const p=new G.Workbook,a=p.addWorksheet("Sheet1"),n=["Employee_Code","Employee_Name","Department","Process","Location"],s="This report generated by ABShrms payroll software ",i=n;a.addRow(i).eachCell((_,A)=>{_.fill={type:"pattern",pattern:"solid",fgColor:{argb:"252f70"}},_.font={bold:!0,color:{argb:"ffffff"}},a.getColumn(A).width=20}),Object.values(t.downloadAttendanceOverviewDetails[0]).forEach((_,A)=>{console.log(_);const S=[];i.forEach(T=>{S.push(_[T])}),a.addRow(S)}),a.addRow([""]);const r=a.addRow([""]);r.getCell(1).value=s,a.mergeCells(r.number,1,r.number,3),r.getCell(1).alignment={wrapText:!0},r.getCell(1).font={italic:!0};const C=await p.xlsx.writeBuffer(),$=window.URL.createObjectURL(new Blob([C])),y=document.createElement("a");y.href=$,y.download=`${t.selectedAttendanceOverviewReport}_${new Date}.xlsx`,y.click(),window.URL.revokeObjectURL($)},x=u(!1),d=u("downloaded");return(p,a)=>{const n=R("Dropdown"),s=R("Column"),i=R("DataTable"),l=R("Sidebar");return g(),b(U,null,[o(t).canShowLoading?(g(),z(ne,{key:0,class:"absolute z-50 bg-white"})):M("",!0),e("div",jt,[Pt,e("div",Bt,[e("div",Ft,[e("p",Ut,[F(" Daily Analytics - "),e("span",Tt,m(o(Q)(new Date).format("MMMM DD,YYYY")),1)])]),e("div",It,[e("div",null,[v(n,{onChange:a[0]||(a[0]=r=>o(t).send_selectedDepartment(f.value)),optionValue:"id",modelValue:f.value,"onUpdate:modelValue":a[1]||(a[1]=r=>f.value=r),optionLabel:"name",options:o(t).departments,placeholder:"Select a Department",class:"w-full md:w-18rem h-[36px]"},null,8,["modelValue","options"])]),e("div",null,[v(n,{optionLabel:"name",placeholder:"Select a Location",class:"w-full md:w-14rem h-[36px]"})]),Vt])]),e("div",Ht,[v(Ue)]),e("div",Gt,[e("div",null,[v(Ye)]),e("div",null,[v(nt)]),e("div",null,[v(vt)])]),e("div",Nt,[v(Rt)])]),v(l,{visible:o(t).canShowShiftDetails,"onUpdate:visible":a[3]||(a[3]=r=>o(t).canShowShiftDetails=r),position:"right",style:{width:"70vw !important"}},{header:L(()=>[e("p",Wt,m(o(t).currentlySelectedShiftDetails?o(t).currentlySelectedShiftDetails[0].shift_name:null)+" Reports",1),e("div",zt,[e("button",{class:"bg-[#E6E6E6] p-2 mx-2 rounded-md w-[120px]",onClick:a[2]||(a[2]=r=>(x.value=!x.value,c()))},[Yt,e("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:B([x.value==!0?d.value:" "])},Xt,2)])])]),default:L(()=>[Object.values(o(t).currentlySelectedShiftDetails).length>=1?(g(),b("div",Kt,[v(i,{scrollable:"",scrollHeight:"450px",value:o(t).currentlySelectedShiftDetails?o(t).currentlySelectedShiftDetails:[]},{default:L(()=>[v(s,{field:"Employee_Code",header:"User code"}),v(s,{field:"Employee_Name",header:"Name"}),v(s,{field:"shift_start_time",header:"Shift start time"}),v(s,{field:"shift_end_time",header:"Shift end time"}),v(s,{field:"grace_time",header:"Grace time"})]),_:1},8,["value"])])):(g(),b("div",Jt,Zt))]),_:1},8,["visible"]),v(l,{visible:o(t).canShowAttendanceOverview,"onUpdate:visible":a[5]||(a[5]=r=>o(t).canShowAttendanceOverview=r),position:"right",style:{width:"70vw !important"}},{header:L(()=>[e("p",eo,m(o(t).selectedAttendanceOverviewReport)+" Reports",1),e("div",to,[e("button",{class:"bg-[#E6E6E6] p-2 mx-2 rounded-md w-[120px]",onClick:a[4]||(a[4]=r=>(x.value=!x.value,h()))},[oo,e("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:B([x.value==!0?d.value:" "])},so,2)])])]),default:L(()=>[Object.values(o(t).currentlySelectedShiftDetails).length>=1?(g(),b("div",ao,[v(i,{scrollable:"",scrollHeight:"500px",value:o(t).currentlySelectedShiftDetails?o(t).currentlySelectedShiftDetails:[]},{default:L(()=>[v(s,{field:"Employee_Code",header:"Employee_Code",style:{"white-space":"nowrap"}}),v(s,{field:"Employee_Name",header:"Employee_Name",style:{"white-space":"nowrap"}}),v(s,{field:"Department",header:"Department",style:{"white-space":"nowrap"}}),v(s,{field:"Process",header:"Process",style:{"white-space":"nowrap"}}),v(s,{field:"Location",header:"Location",style:{"white-space":"nowrap"}})]),_:1},8,["value"])])):(g(),b("div",lo,io))]),_:1},8,["visible"])],64)}}},xo=ee(co,[["__scopeId","data-v-d4ad86a0"]]);export{xo as default};