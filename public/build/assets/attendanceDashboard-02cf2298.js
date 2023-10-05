import{_ as H}from"./no-data-d6f55554.js";import{d as Y}from"./dayjs.min-2f06af28.js";import{e as U}from"./exceljs.min-1f699027.js";import{a as X,c as L}from"./index-362795f3.js";import{s as q,r as u,h as o,e as m,f as w,g as e,t as h,j as E,o as B,c as M,k as N,F as P,m as F,H as G,i as j,n as b,_ as K,l as D,p as T,C as J,D as Q}from"./app-8ad6b03e.js";import{L as Z}from"./LoadingSpinner-ed998522.js";/* empty css                                                                       */const R=q("useAttendanceDashboardMainStore",()=>{const x=u(!1);u();const t=u(),g=u(),r=u(!1),c=u(!1),p=u(),i=u([]),l=u(),d=u(),n=u([]),s=u([]),v=u(),a=u([]),f=u(),A=u(),S=u([]),_=u([{label:"Absent",backgroundColor:"#FFB1B8",count:null},{label:"Present",backgroundColor:"#7A5EA2",count:null},{label:"Leave",backgroundColor:"#8D98B5",count:null},{label:"Late coming",backgroundColor:"#D9AA63",count:null},{label:"Early going",backgroundColor:"#6BB7C0",count:null},{label:"Missed out punch",backgroundColor:"#000000",count:null},{label:"Missed in punch",backgroundColor:"#000000",count:null}]);return{canShowLoading:x,attendanceDashboardWorkShiftSource:g,getAttendanceDashboardMainSource:async()=>{x.value=!0;let $="/get-attendance-dashboard";await X.get($).then(y=>{t.value=y.data.attendance_overview,f.value=y.data.total_Employees,console.log(" totalEmployeeInOrganization.value"+f.value),_.value[0].count=parseInt(t.value.absent_count),_.value[1].count=parseInt(t.value.present_count),_.value[2].count=parseInt(t.value.leave_emp_count),_.value[3].count=parseInt(t.value.lg_count),_.value[4].count=parseInt(t.value.eg_count),_.value[5].count=parseInt(t.value.mop_count),_.value[6].count=parseInt(t.value.mip_count),g.value=y.data.work_shift;let V=Object.entries(y.data.upcomings).map(C=>({title:C[0],value:C[1]}));d.value=V;let W=Object.entries(y.data.attendance_overview).map(C=>({title:C[0],value:C[1]}));v.value=W;let z=["absent_count","present_count","leave_emp_count","lg_count","eg_count","mop_count","mip_count"];v.value.forEach(async C=>{a.value.length<7&&z.includes(C.title)&&a.value.push(C.value)}),A.value=y.data.CheckInMode,A.value.forEach(async C=>{S.value.length<3&&S.value.push(C.value)})}).finally(()=>{x.value=!1})},attendanceOverview:t,totalEmployeeInOrganization:f,chartDetails:_,canShowShiftDetails:r,canShowAttendanceOverview:c,selectedAttendanceOverviewReport:p,currentlySelectedShiftDetails:i,currentlySelectedShiftName:l,downloadShiftDetails:n,downloadAttendanceOverviewDetails:s,attendanceDashboardUpcoming:d,overallEmployeeCountForExceptionAnalytics:v,overallEmployeeCountForExceptionAnalyticsForGraph:a,AttendanceAnalytics:A,AttendanceAnalyticsForGraph:S}}),ee={key:0,class:"grid grid-cols-7 gap-4"},te={class:"px-auto flex justify-center"},oe={class:"text-2xl font-semibold text-center"},ne=e("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Present",-1),se={class:"px-auto flex justify-center"},ae={class:"text-2xl font-semibold text-center"},le=e("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Absent",-1),ie={class:"px-auto flex justify-center"},re={class:"text-2xl font-semibold text-center"},ce=e("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Leave",-1),de={class:"px-auto flex justify-center"},ue={class:"text-2xl font-semibold text-center"},pe=e("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Late coming",-1),_e={class:"px-auto flex justify-center"},ve={class:"text-2xl font-semibold text-center"},he=e("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Early going",-1),fe={class:"px-auto flex justify-center"},me={class:"text-2xl font-semibold text-center"},be=e("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Missed in punch",-1),ge={class:"px-auto flex justify-center"},we={class:"text-2xl font-semibold text-center"},xe=e("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Missed out punch",-1),ye={__name:"attendanceCount",setup(x){const t=R();return(g,r)=>o(t).attendanceOverview?(m(),w("div",ee,[e("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:r[0]||(r[0]=c=>(o(t).selectedAttendanceOverviewReport="Present",o(t).canShowAttendanceOverview=!0,o(t).currentlySelectedShiftDetails={...o(t).attendanceOverview.present_emps},o(t).downloadAttendanceOverviewDetails.push({...o(t).attendanceOverview.present_emps})))},[e("div",te,[e("span",oe,h(o(t).attendanceOverview.present_count),1)]),ne]),e("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:r[1]||(r[1]=c=>(o(t).selectedAttendanceOverviewReport="Absent",o(t).canShowAttendanceOverview=!0,o(t).currentlySelectedShiftDetails={...o(t).attendanceOverview.absent_emps},o(t).downloadAttendanceOverviewDetails.push({...o(t).attendanceOverview.absent_emps})))},[e("div",se,[e("span",ae,h(o(t).attendanceOverview.absent_count),1)]),le]),e("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:r[2]||(r[2]=c=>(o(t).selectedAttendanceOverviewReport="Leave",o(t).canShowAttendanceOverview=!0,o(t).currentlySelectedShiftDetails={...o(t).attendanceOverview.leave_emps},o(t).downloadAttendanceOverviewDetails.push({...o(t).attendanceOverview.leave_emps})))},[e("div",ie,[e("span",re,h(o(t).attendanceOverview.leave_emp_count),1)]),ce]),e("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:r[3]||(r[3]=c=>(o(t).selectedAttendanceOverviewReport="Late coming",o(t).canShowAttendanceOverview=!0,o(t).currentlySelectedShiftDetails={...o(t).attendanceOverview.lc_emps},o(t).downloadAttendanceOverviewDetails.push({...o(t).attendanceOverview.lc_emps})))},[e("div",de,[e("span",ue,h(o(t).attendanceOverview.lg_count),1)]),pe]),e("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:r[4]||(r[4]=c=>(o(t).selectedAttendanceOverviewReport="Early going",o(t).canShowAttendanceOverview=!0,o(t).currentlySelectedShiftDetails={...o(t).attendanceOverview.eg_emps},o(t).downloadAttendanceOverviewDetails.push({...o(t).attendanceOverview.eg_emps})))},[e("div",_e,[e("span",ve,h(o(t).attendanceOverview.eg_count),1)]),he]),e("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:r[5]||(r[5]=c=>(o(t).selectedAttendanceOverviewReport="Missed in punch",o(t).canShowAttendanceOverview=!0,o(t).currentlySelectedShiftDetails={...o(t).attendanceOverview.mip_emps},o(t).downloadAttendanceOverviewDetails.push({...o(t).attendanceOverview.mip_emps})))},[e("div",fe,[e("span",me,h(o(t).attendanceOverview.mip_count),1)]),be]),e("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:r[6]||(r[6]=c=>(o(t).selectedAttendanceOverviewReport="Missed out punch",o(t).canShowAttendanceOverview=!0,o(t).currentlySelectedShiftDetails={...o(t).attendanceOverview.mop_emps},o(t).downloadAttendanceOverviewDetails.push({...o(t).attendanceOverview.mop_emps})))},[e("div",ge,[e("span",we,h(o(t).attendanceOverview.mop_count),1)]),xe])])):E("",!0)}},Se={key:0,class:"bg-white rounded-lg p-2 border"},Ae=e("p",{class:"font-semibold text-[14px] text-[#000] font-['Poppins] text-center"},"Attendance Analytics",-1),$e={class:"grid grid-cols-2 gap-4 my-2.5"},Ce={class:"h-full"},ke={class:"flex items-center"},Oe={class:""},De={class:"flex items-center gap-3"},Ee={class:"font-semibold text-lg"},Re={__name:"exceptionAnalytics",setup(x){const t=R();B(async()=>{await t.attendanceOverview,t.overallEmployeeCountForExceptionAnalyticsForGraph,r.value=c(),setTimeout(()=>{console.log(t.overallEmployeeCountForExceptionAnalyticsForGraph),g.value.datasets[0].data=t.overallEmployeeCountForExceptionAnalyticsForGraph},3e3)}),u([]);const g=u({labels:["Absent","Present","Leave","Late coming","Early going","Missed out punch","Missed in punch"],datasets:[{backgroundColor:["#FFB1B8","#7A5EA2","#8D98B5","#D9AA63","#6BB7C0","#000000","#000000"],data:[0,0,0,0,0,0,0]}]}),r=u();u();const c=()=>{const i=getComputedStyle(document.documentElement),l=i.getPropertyValue("--text-color");return i.getPropertyValue("--text-color-secondary"),i.getPropertyValue("--surface-border"),{maintainAspectRatio:!1,aspectRatio:1,plugins:{labels:{usePointStyle:!0},title:{display:!1,text:"Custom Chart Title"},legend:{display:!1,labels:{fontColor:l}}}}},p=(i,l)=>`${(i/l*100).toFixed(0)}`;return(i,l)=>{const d=M("Chart");return o(t).chartDetails?(m(),w("div",Se,[Ae,e("div",$e,[e("div",Ce,[o(t).overallEmployeeCountForExceptionAnalyticsForGraph?(m(),N(d,{key:0,type:"pie",data:g.value,options:r.value,class:"h-full"},null,8,["data","options"])):E("",!0)]),e("div",ke,[e("div",Oe,[e("div",null,[(m(!0),w(P,null,F(o(t).chartDetails,(n,s)=>(m(),w("div",De,[e("div",{style:G({backgroundColor:n.backgroundColor}),class:"rounded-lg h-2 w-2 p-1.5"},null,4),e("div",null,[j(h(n.label)+" - ",1),e("span",Ee,h(p(n.count,o(t).totalEmployeeInOrganization)),1),j("% ")])]))),256))])])])])])):E("",!0)}}};const Le={key:0,class:"bg-white rounded-lg p-2 border"},Me=e("p",{class:"font-semibold text-[14px] text-[#000] font-['Poppins] text-center"},"Check-In & Out Analytics ",-1),je={class:"grid grid-cols-2 gap-4 my-2.5"},Pe={class:"h-full"},Fe={class:"flex items-center"},Be={class:"my-auto"},Ue={class:"flex items-center gap-3"},Te={class:"font-semibold text-lg"},Ie=e("div",null,null,-1),He={__name:"attendanceAnalytics",setup(x){const t=R();B(()=>{r.value=c(),setTimeout(()=>{g.value.datasets[0].data=t.AttendanceAnalyticsForGraph},3e3)});const g=u({labels:["Bio-Metric","Mobile","Web"],datasets:[{data:[0,0,0],backgroundColor:["rgba(122, 94, 162, 1)","rgba(255, 177, 184, 1)","rgba(107, 183, 192, 1)"]}]}),r=u();u(0),u([{label:"Bio-Metric",backgroundColor:"rgba(122, 94, 162, 1)"},{label:"Mobile",backgroundColor:"rgba(255, 177, 184, 1)"},{label:"Web",backgroundColor:"rgba(107, 183, 192, 1)"}]);const c=()=>{const i=getComputedStyle(document.documentElement),l=i.getPropertyValue("--text-color");return i.getPropertyValue("--text-color-secondary"),i.getPropertyValue("--surface-border"),{maintainAspectRatio:!1,aspectRatio:1,plugins:{labels:{usePointStyle:!0},title:{display:!1,text:"Custom Chart Title"},legend:{display:!1,labels:{fontColor:l}}}}},p=(i,l)=>`${(i/l*100).toFixed(0)}`;return(i,l)=>{const d=M("Chart");return o(t).AttendanceAnalytics?(m(),w("div",Le,[Me,e("div",je,[e("div",Pe,[b(d,{type:"doughnut",data:g.value,options:r.value},null,8,["data","options"])]),e("div",Fe,[e("div",Be,[e("div",null,[(m(!0),w(P,null,F(o(t).AttendanceAnalytics,(n,s)=>(m(),w("div",Ue,[e("div",{style:G({backgroundColor:g.value.datasets[0].backgroundColor[s]}),class:"rounded-lg h-2 w-2 p-1.5"},null,4),e("div",null,[j(h(n.title)+" - ",1),e("span",Te,h(p(n.value,o(t).totalEmployeeInOrganization)),1),j("% ")])]))),256))]),Ie])])])])):E("",!0)}}},Ne={class:"p-2 overflow-hidden bg-white rounded-lg border",style:{height:"200px"}},Ge=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Upcomings",-1),Ve={class:"h-full overflow-x-scroll bg-white rounded-lg"},We={class:"px-auto"},ze={class:"p-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"},Ye={class:"flex px-2 justify-between items-center"},Xe={class:"text-[14px] font-semibold"},qe={class:"flex items-center gap-6"},Ke={class:"text-xl font-semibold text-black"},Je=e("span",null,[e("i",{class:"fa fa-chevron-right","aria-hidden":"true"})],-1),Qe={key:1,class:"font-medium text-sm text-center"},Ze={__name:"Upcomings",setup(x){const t=R();return(g,r)=>(m(),w("div",Ne,[Ge,e("div",Ve,[o(t).attendanceDashboardUpcoming?(m(!0),w(P,{key:0},F(o(t).attendanceDashboardUpcoming,c=>(m(),w("div",We,[e("div",ze,[e("div",Ye,[e("div",null,[e("span",Xe,h(c.title),1)]),e("div",qe,[e("span",Ke,h(c.value),1),Je])])])]))),256)):(m(),w("p",Qe,"No data to display"))])]))}},et={key:0,class:"bg-white p-2 rounded-lg border"},tt=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Shift",-1),ot={class:"grid grid-cols-6 gap-2 my-2"},nt=["onClick"],st={class:"w-full bg-gray-200 p-2 rounded-lg"},at={class:"font-semibold text-[12px] text-[#000] font-['Poppins]"},lt={class:"p-2"},it=e("p",{class:"font-semibold text-sm text-[#000] font-['Poppins]"},"Shift Timing",-1),rt={class:"font-medium text-[12px] text-gray-600 font-['Poppins]"},ct={class:"my-3"},dt=e("p",{class:"font-semibold text-sm text-[#000] font-['Poppins]"},"Total Employees",-1),ut={class:"font-medium text-[12px] text-gray-600 font-['Poppins]"},pt={class:"flex justify-between"},_t=e("p",{class:"font-semibold text-sm text-[#000] font-['Poppins]"},"Present",-1),vt={class:"font-medium text-[12px] text-gray-600 font-['Poppins]"},ht={class:"mx-3"},ft=e("p",{class:"font-semibold text-sm text-[#000] font-['Poppins]"},"Absent",-1),mt={class:"font-medium text-[12px] text-gray-600 font-['Poppins]"},bt={__name:"Shifts",setup(x){const t=R();function g(r){const[c,p]=r.split(":").map(Number),i=c>=12?"PM":"AM";return`${c%12===0?12:c%12}:${String(p).padStart(2,"0")} ${i}`}return(r,c)=>o(t).attendanceDashboardWorkShiftSource?(m(),w("div",et,[tt,e("div",ot,[(m(!0),w(P,null,F(o(t).attendanceDashboardWorkShiftSource,(p,i)=>(m(),w("div",{class:"bg-gray-100 w-[180px] h-[200px] rounded-lg cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:l=>(o(t).canShowShiftDetails=!0,o(t).currentlySelectedShiftDetails={...p.work_shift_employee_data},o(t).downloadShiftDetails.push({...p.work_shift_employee_data})),key:i},[e("div",st,[e("span",at,h(p.work_shift_employee_data[0].shift_name),1)]),e("div",lt,[e("div",null,[it,e("p",rt,h(g(p.work_shift_employee_data[0].shift_start_time))+" - "+h(g(p.work_shift_employee_data[0].shift_end_time)),1)]),e("div",ct,[dt,e("p",ut,h(p.work_shift_assigned_employees?p.work_shift_assigned_employees:"-"),1)]),e("div",pt,[e("div",null,[_t,e("p",vt,h(p.present_count?p.present_count:0),1)]),e("div",ht,[ft,e("p",mt,h(p.absent_count?p.absent_count:0),1)])])])],8,nt))),128))])])):E("",!0)}};var I={},gt={get exports(){return I},set exports(x){I=x}};(function(x,t){(function(g,r){r()})(L,function(){function g(n,s){return typeof s>"u"?s={autoBom:!1}:typeof s!="object"&&(console.warn("Deprecated: Expected third argument to be a object"),s={autoBom:!s}),s.autoBom&&/^\s*(?:text\/\S*|application\/xml|\S*\/\S*\+xml)\s*;.*charset\s*=\s*utf-8/i.test(n.type)?new Blob(["\uFEFF",n],{type:n.type}):n}function r(n,s,v){var a=new XMLHttpRequest;a.open("GET",n),a.responseType="blob",a.onload=function(){d(a.response,s,v)},a.onerror=function(){console.error("could not download file")},a.send()}function c(n){var s=new XMLHttpRequest;s.open("HEAD",n,!1);try{s.send()}catch{}return 200<=s.status&&299>=s.status}function p(n){try{n.dispatchEvent(new MouseEvent("click"))}catch{var s=document.createEvent("MouseEvents");s.initMouseEvent("click",!0,!0,window,0,0,0,80,20,!1,!1,!1,!1,0,null),n.dispatchEvent(s)}}var i=typeof window=="object"&&window.window===window?window:typeof self=="object"&&self.self===self?self:typeof L=="object"&&L.global===L?L:void 0,l=i.navigator&&/Macintosh/.test(navigator.userAgent)&&/AppleWebKit/.test(navigator.userAgent)&&!/Safari/.test(navigator.userAgent),d=i.saveAs||(typeof window!="object"||window!==i?function(){}:"download"in HTMLAnchorElement.prototype&&!l?function(n,s,v){var a=i.URL||i.webkitURL,f=document.createElement("a");s=s||n.name||"download",f.download=s,f.rel="noopener",typeof n=="string"?(f.href=n,f.origin===location.origin?p(f):c(f.href)?r(n,s,v):p(f,f.target="_blank")):(f.href=a.createObjectURL(n),setTimeout(function(){a.revokeObjectURL(f.href)},4e4),setTimeout(function(){p(f)},0))}:"msSaveOrOpenBlob"in navigator?function(n,s,v){if(s=s||n.name||"download",typeof n!="string")navigator.msSaveOrOpenBlob(g(n,v),s);else if(c(n))r(n,s,v);else{var a=document.createElement("a");a.href=n,a.target="_blank",setTimeout(function(){p(a)})}}:function(n,s,v,a){if(a=a||open("","_blank"),a&&(a.document.title=a.document.body.innerText="downloading..."),typeof n=="string")return r(n,s,v);var f=n.type==="application/octet-stream",A=/constructor/i.test(i.HTMLElement)||i.safari,S=/CriOS\/[\d]+/.test(navigator.userAgent);if((S||f&&A||l)&&typeof FileReader<"u"){var _=new FileReader;_.onloadend=function(){var y=_.result;y=S?y:y.replace(/^data:[^;]*;/,"data:attachment/file;"),a?a.location.href=y:location=y,a=null},_.readAsDataURL(n)}else{var k=i.URL||i.webkitURL,$=k.createObjectURL(n);a?a.location=$:location.href=$,a=null,setTimeout(function(){k.revokeObjectURL($)},4e4)}});i.saveAs=d.saveAs=d,x.exports=d})})(gt);const O=x=>(J("data-v-7e5758c9"),x=x(),Q(),x),wt={class:"w-full"},xt=O(()=>e("p",{class:"mb-2 text-2xl text-black font-semibold"}," Attendance dashboard ",-1)),yt={class:"bg-white p-2 rounded-lg border flex justify-between"},St={class:"mx-2"},At={class:"font-[14px] font-['Poppins'] text-gray-500"},$t={class:"mb-2 text-sm font-semibold"},Ct=O(()=>e("div",{class:"flex justify-end gap-5 mx-4"},null,-1)),kt={class:"my-3"},Ot={class:"grid grid-cols-3 gap-2"},Dt={class:"my-3"},Et={class:"absolute left-0 mx-4 font-semibold fs-5"},Rt={class:"relative right-0 mx-4 font-semibold fs-5"},Lt=O(()=>e("p",{class:"relative left-2 font-['poppins']"},"Download",-1)),Mt=O(()=>e("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16"},[e("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check"}),e("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"}),e("path",{d:"M8,1 L8,11",class:"svg-out"})],-1)),jt=[Mt],Pt={key:0,class:""},Ft={key:1,class:"flex justify-center"},Bt=O(()=>e("img",{class:"h-[450px]",src:H,alt:"",srcset:""},null,-1)),Ut=[Bt],Tt={class:"absolute left-0 mx-4 font-semibold fs-5"},It={class:"relative right-0 mx-4 font-semibold fs-5"},Ht=O(()=>e("p",{class:"relative left-2 font-['poppins']"},"Download",-1)),Nt=O(()=>e("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16"},[e("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check"}),e("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"}),e("path",{d:"M8,1 L8,11",class:"svg-out"})],-1)),Gt=[Nt],Vt={key:0,class:""},Wt={key:1,class:"flex justify-center"},zt=O(()=>e("img",{class:"h-[450px]",src:H,alt:"",srcset:""},null,-1)),Yt=[zt],Xt={__name:"attendanceDashboard",setup(x){const t=R();B(async()=>{await t.getAttendanceDashboardMainSource()});const g=async()=>{const i=new U.Workbook,l=i.addWorksheet("Sheet1"),d=["user_code","user_code","shift_start_time","shift_end_time","shift_end_time"],n="this report generated by ABShrms payroll software ",s=d;l.addRow(s).eachCell((_,k)=>{_.fill={type:"pattern",pattern:"solid",fgColor:{argb:"252f70"}},_.font={bold:!0,color:{argb:"ffffff"}},l.getColumn(k).width=20}),Object.values(t.currentlySelectedShiftDetails).forEach((_,k)=>{console.log(_);const $=[];s.forEach(y=>{$.push(_[y])}),l.addRow($)}),l.addRow([""]);const a=l.addRow([""]);a.getCell(1).value=n,l.mergeCells(a.number,1,a.number,3),a.getCell(1).alignment={wrapText:!0},a.getCell(1).font={italic:!0};const f=await i.xlsx.writeBuffer(),A=window.URL.createObjectURL(new Blob([f])),S=document.createElement("a");S.href=A,S.download="shift.xlsx",S.click(),window.URL.revokeObjectURL(A)},r=async()=>{const i=new U.Workbook,l=i.addWorksheet("Sheet1"),d=["Employee Code","Employee Name","Department","Process","Location"],n="This report generated by ABShrms payroll software ",s=d;l.addRow(s).eachCell((_,k)=>{_.fill={type:"pattern",pattern:"solid",fgColor:{argb:"252f70"}},_.font={bold:!0,color:{argb:"ffffff"}},l.getColumn(k).width=20}),Object.values(t.downloadAttendanceOverviewDetails[0]).forEach((_,k)=>{console.log(_);const $=[];s.forEach(y=>{$.push(_[y])}),l.addRow($)}),l.addRow([""]);const a=l.addRow([""]);a.getCell(1).value=n,l.mergeCells(a.number,1,a.number,3),a.getCell(1).alignment={wrapText:!0},a.getCell(1).font={italic:!0};const f=await i.xlsx.writeBuffer(),A=window.URL.createObjectURL(new Blob([f])),S=document.createElement("a");S.href=A,S.download=`${t.selectedAttendanceOverviewReport}_${new Date}.xlsx`,S.click(),window.URL.revokeObjectURL(A)},c=u(!1),p=u("downloaded");return(i,l)=>{const d=M("Column"),n=M("DataTable"),s=M("Sidebar");return m(),w(P,null,[o(t).canShowLoading?(m(),N(Z,{key:0,class:"absolute z-50 bg-white"})):E("",!0),e("div",wt,[xt,e("div",yt,[e("div",St,[e("p",At,[j(" Daily Analytics - "),e("span",$t,h(o(Y)(new Date).format("MMMM DD,YYYY")),1)])]),Ct]),e("div",kt,[b(ye)]),e("div",Ot,[e("div",null,[b(Re)]),e("div",null,[b(He)]),e("div",null,[b(Ze)])]),e("div",Dt,[b(bt)])]),b(s,{visible:o(t).canShowShiftDetails,"onUpdate:visible":l[1]||(l[1]=v=>o(t).canShowShiftDetails=v),position:"right",class:"w-full"},{header:D(()=>[e("p",Et,h(o(t).currentlySelectedShiftDetails?o(t).currentlySelectedShiftDetails[0].shift_name:null)+" Reports",1),e("div",Rt,[e("button",{class:"bg-[#E6E6E6] p-2 mx-2 rounded-md w-[120px]",onClick:l[0]||(l[0]=v=>(c.value=!c.value,g()))},[Lt,e("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:T([c.value==!0?p.value:" "])},jt,2)])])]),default:D(()=>[Object.values(o(t).currentlySelectedShiftDetails).length>=1?(m(),w("div",Pt,[b(n,{scrollable:"",scrollHeight:"450px",value:o(t).currentlySelectedShiftDetails?o(t).currentlySelectedShiftDetails:[]},{default:D(()=>[b(d,{field:"user_code",header:"User code"}),b(d,{field:"name",header:"Name"}),b(d,{field:"shift_start_time",header:"Shift start time"}),b(d,{field:"shift_end_time",header:"Shift end time"}),b(d,{field:"grace_time",header:"Grace time"})]),_:1},8,["value"])])):(m(),w("div",Ft,Ut))]),_:1},8,["visible"]),b(s,{visible:o(t).canShowAttendanceOverview,"onUpdate:visible":l[3]||(l[3]=v=>o(t).canShowAttendanceOverview=v),position:"right",class:"w-full"},{header:D(()=>[e("p",Tt,h(o(t).selectedAttendanceOverviewReport)+" Reports",1),e("div",It,[e("button",{class:"bg-[#E6E6E6] p-2 mx-2 rounded-md w-[120px]",onClick:l[2]||(l[2]=v=>(c.value=!c.value,r()))},[Ht,e("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:T([c.value==!0?p.value:" "])},Gt,2)])])]),default:D(()=>[Object.values(o(t).currentlySelectedShiftDetails).length>=1?(m(),w("div",Vt,[b(n,{scrollable:"",scrollHeight:"450px",value:o(t).currentlySelectedShiftDetails?o(t).currentlySelectedShiftDetails:[]},{default:D(()=>[b(d,{field:"Employee Code",header:"Employee Code",style:{"white-space":"nowrap"}}),b(d,{field:"Employee Name",header:"Employee Name",style:{"white-space":"nowrap"}}),b(d,{field:"Department",header:"Department",style:{"white-space":"nowrap"}}),b(d,{field:"Process",header:"Process",style:{"white-space":"nowrap"}}),b(d,{field:"Location",header:"Location",style:{"white-space":"nowrap"}})]),_:1},8,["value"])])):(m(),w("div",Wt,Yt))]),_:1},8,["visible"])],64)}}},oo=K(Xt,[["__scopeId","data-v-7e5758c9"]]);export{oo as default};
