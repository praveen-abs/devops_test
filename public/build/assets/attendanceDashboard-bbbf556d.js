import{_ as V}from"./no-data-17442c4e.js";import{d as G}from"./dayjs.min-2f06af28.js";import{e as I}from"./exceljs.min-1f699027.js";import{a as z,c as E}from"./index-362795f3.js";import{p as Y,r as u,g as o,d as h,e as b,f as t,t as m,i as L,o as U,b as R,j as N,F as M,l as B,G as H,h as F,m as f,n as P,A as X,_ as q,k as O,D as K,E as J}from"./app-1d702269.js";import{L as Q}from"./LoadingSpinner-4e2a0991.js";/* empty css                                                                       */const j=Y("useAttendanceDashboardMainStore",()=>{const w=u(!1);u();const e=u(),g=u(),r=u(!1),d=u(!1),p=u(),c=u([]),a=u(),i=u(),n=u([]),s=u([]),v=u(),l=u([]),_=u(),y=u([{label:"Absent",backgroundColor:"#FFB1B8",count:null},{label:"Present",backgroundColor:"#7A5EA2",count:null},{label:"Leave",backgroundColor:"#8D98B5",count:null},{label:"Late coming",backgroundColor:"#D9AA63",count:null},{label:"Early going",backgroundColor:"#6BB7C0",count:null},{label:"Missed out punch",backgroundColor:"#000000",count:null},{label:"Missed in punch",backgroundColor:"#000000",count:null}]);return{canShowLoading:w,attendanceDashboardWorkShiftSource:g,getAttendanceDashboardMainSource:async()=>{w.value=!0;let x="/get-attendance-dashboard";await z.get(x).then(S=>{e.value=S.data.attendance_overview,_.value=parseInt(e.value.present_count)+parseInt(e.value.absent_count)+parseInt(e.value.leave_emp_count),console.log(" totalEmployeeInOrganization.value"+_.value),y.value[0].count=parseInt(e.value.absent_count),y.value[1].count=parseInt(e.value.present_count),y.value[2].count=parseInt(e.value.leave_emp_count),y.value[3].count=parseInt(e.value.lg_count),y.value[4].count=parseInt(e.value.eg_count),y.value[5].count=parseInt(e.value.mop_count),y.value[6].count=parseInt(e.value.mip_count),g.value=S.data.work_shift;let k=Object.entries(S.data.upcomings).map(D=>({title:D[0],value:D[1]}));i.value=k;let $=Object.entries(S.data.attendance_overview).map(D=>({title:D[0],value:D[1]}));v.value=$;let W=["absent_count","present_count","leave_emp_count","lg_count","eg_count","mop_count","mip_count"];v.value.forEach(D=>{l.value.length<7&&W.includes(D.title)&&(console.log(D.title),l.value.push(D.value))})}).finally(()=>{w.value=!1})},attendanceOverview:e,totalEmployeeInOrganization:_,chartDetails:y,canShowShiftDetails:r,canShowAttendanceOverview:d,selectedAttendanceOverviewReport:p,currentlySelectedShiftDetails:c,currentlySelectedShiftName:a,downloadShiftDetails:n,downloadAttendanceOverviewDetails:s,attendanceDashboardUpcoming:i,overallEmployeeCountForExceptionAnalytics:v,overallEmployeeCountForExceptionAnalyticsForGraph:l}}),Z={key:0,class:"grid grid-cols-7 gap-4"},ee={class:"px-auto flex justify-center"},te={class:"text-2xl font-semibold text-center"},oe=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Present",-1),ne={class:"px-auto flex justify-center"},se={class:"text-2xl font-semibold text-center"},ae=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Absent",-1),le={class:"px-auto flex justify-center"},re={class:"text-2xl font-semibold text-center"},ie=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Leave",-1),ce={class:"px-auto flex justify-center"},de={class:"text-2xl font-semibold text-center"},ue=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Late coming",-1),pe={class:"px-auto flex justify-center"},ve={class:"text-2xl font-semibold text-center"},_e=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Early going",-1),he={class:"px-auto flex justify-center"},fe={class:"text-2xl font-semibold text-center"},me=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Missed in punch",-1),be={class:"px-auto flex justify-center"},ge={class:"text-2xl font-semibold text-center"},we=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Missed out punch",-1),xe={__name:"attendanceCount",setup(w){const e=j();return(g,r)=>o(e).attendanceOverview?(h(),b("div",Z,[t("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:r[0]||(r[0]=d=>(o(e).selectedAttendanceOverviewReport="Present",o(e).canShowAttendanceOverview=!0,o(e).currentlySelectedShiftDetails={...o(e).attendanceOverview.present_emps},o(e).downloadAttendanceOverviewDetails.push({...o(e).attendanceOverview.present_emps})))},[t("div",ee,[t("span",te,m(o(e).attendanceOverview.present_count),1)]),oe]),t("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:r[1]||(r[1]=d=>(o(e).selectedAttendanceOverviewReport="Absent",o(e).canShowAttendanceOverview=!0,o(e).currentlySelectedShiftDetails={...o(e).attendanceOverview.absent_emps},o(e).downloadAttendanceOverviewDetails.push({...o(e).attendanceOverview.absent_emps})))},[t("div",ne,[t("span",se,m(o(e).attendanceOverview.absent_count),1)]),ae]),t("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:r[2]||(r[2]=d=>(o(e).selectedAttendanceOverviewReport="Leave",o(e).canShowAttendanceOverview=!0,o(e).currentlySelectedShiftDetails={...o(e).attendanceOverview.leave_emps},o(e).downloadAttendanceOverviewDetails.push({...o(e).attendanceOverview.leave_emps})))},[t("div",le,[t("span",re,m(o(e).attendanceOverview.leave_emp_count),1)]),ie]),t("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:r[3]||(r[3]=d=>(o(e).selectedAttendanceOverviewReport="Late coming",o(e).canShowAttendanceOverview=!0,o(e).currentlySelectedShiftDetails={...o(e).attendanceOverview.lc_emps},o(e).downloadAttendanceOverviewDetails.push({...o(e).attendanceOverview.lc_emps})))},[t("div",ce,[t("span",de,m(o(e).attendanceOverview.lg_count),1)]),ue]),t("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:r[4]||(r[4]=d=>(o(e).selectedAttendanceOverviewReport="Early going",o(e).canShowAttendanceOverview=!0,o(e).currentlySelectedShiftDetails={...o(e).attendanceOverview.eg_emps},o(e).downloadAttendanceOverviewDetails.push({...o(e).attendanceOverview.eg_emps})))},[t("div",pe,[t("span",ve,m(o(e).attendanceOverview.eg_count),1)]),_e]),t("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:r[5]||(r[5]=d=>(o(e).selectedAttendanceOverviewReport="Missed in punch",o(e).canShowAttendanceOverview=!0,o(e).currentlySelectedShiftDetails={...o(e).attendanceOverview.mip_emps},o(e).downloadAttendanceOverviewDetails.push({...o(e).attendanceOverview.mip_emps})))},[t("div",he,[t("span",fe,m(o(e).attendanceOverview.mip_count),1)]),me]),t("div",{class:"bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:r[6]||(r[6]=d=>(o(e).selectedAttendanceOverviewReport="Missed out punch",o(e).canShowAttendanceOverview=!0,o(e).currentlySelectedShiftDetails={...o(e).attendanceOverview.mop_emps},o(e).downloadAttendanceOverviewDetails.push({...o(e).attendanceOverview.mop_emps})))},[t("div",be,[t("span",ge,m(o(e).attendanceOverview.mop_count),1)]),we])])):L("",!0)}},ye={key:0,class:"bg-white rounded-lg p-2 border"},Se=t("p",{class:"font-semibold text-[14px] text-[#000] font-['Poppins] text-center"},"Attendance Analytics",-1),Ce={class:"grid grid-cols-2 gap-4 my-2.5"},ke={class:"h-full"},$e={class:"flex items-center"},De={class:""},Ae={class:"flex items-center gap-3"},Oe={class:"font-semibold text-lg"},Ee={__name:"exceptionAnalytics",setup(w){const e=j();U(()=>{r.value=d(),setTimeout(()=>{console.log(e.overallEmployeeCountForExceptionAnalyticsForGraph),g.value.datasets[0].data=e.overallEmployeeCountForExceptionAnalyticsForGraph},8e3)}),u([]);const g=u({labels:["Absent","Present","Leave","Late coming","Early going","Missed out punch","Missed in punch"],datasets:[{backgroundColor:["#FFB1B8","#7A5EA2","#8D98B5","#D9AA63","#6BB7C0","#000000","#000000"],data:[0,0,0,0,0,0,0]}]}),r=u();u();const d=()=>{const c=getComputedStyle(document.documentElement),a=c.getPropertyValue("--text-color");return c.getPropertyValue("--text-color-secondary"),c.getPropertyValue("--surface-border"),{maintainAspectRatio:!1,aspectRatio:1,plugins:{labels:{usePointStyle:!0},title:{display:!1,text:"Custom Chart Title"},legend:{display:!1,labels:{fontColor:a}}}}},p=(c,a)=>`${(c/a*100).toFixed(0)}`;return(c,a)=>{const i=R("Chart");return o(e).chartDetails?(h(),b("div",ye,[Se,t("div",Ce,[t("div",ke,[o(e).overallEmployeeCountForExceptionAnalyticsForGraph?(h(),N(i,{key:0,type:"pie",data:g.value,options:r.value,class:"h-full"},null,8,["data","options"])):L("",!0)]),t("div",$e,[t("div",De,[t("div",null,[(h(!0),b(M,null,B(o(e).chartDetails,(n,s)=>(h(),b("div",Ae,[t("div",{style:H({backgroundColor:n.backgroundColor}),class:"rounded-lg h-2 w-2 p-1.5"},null,4),t("div",null,[F(m(n.label)+" - ",1),t("span",Oe,m(p(n.count,o(e).totalEmployeeInOrganization)),1),F("% ")])]))),256))])])])])])):L("",!0)}}};const Re={class:"bg-white rounded-lg p-2 border"},Le=t("p",{class:"font-semibold text-[14px] text-[#000] font-['Poppins] text-center"},"Check-In & Out Analytics ",-1),Me={class:"grid grid-cols-2 gap-4 my-2.5"},je={class:"h-full"},Pe={class:"flex items-center"},Be={class:"my-auto"},Fe={class:"mb-3"},Ue={class:"flex items-center gap-3"},Ie=t("div",null,null,-1),Te={__name:"attendanceAnalytics",setup(w){U(()=>{e.value=p(),g.value=c()});const e=u(),g=u(),r=u(0),d=u([{label:"Bio-Metric",backgroundColor:"rgba(122, 94, 162, 1)"},{label:"Mobile",backgroundColor:"rgba(255, 177, 184, 1)"},{label:"Web",backgroundColor:"rgba(107, 183, 192, 1)"}]),p=()=>{const a=getComputedStyle(document.body);return{labels:["Bio-Metric","Mobile","Web"],datasets:[{data:[1,1,1],backgroundColor:["rgba(122, 94, 162, 1)","rgba(255, 177, 184, 1)","rgba(107, 183, 192, 1)"],hoverBackgroundColor:[a.getPropertyValue("--blue-400"),a.getPropertyValue("--yellow-400"),a.getPropertyValue("--green-400")]}]}},c=()=>{const a=getComputedStyle(document.documentElement),i=a.getPropertyValue("--text-color");return a.getPropertyValue("--text-color-secondary"),a.getPropertyValue("--surface-border"),{maintainAspectRatio:!1,aspectRatio:1,plugins:{labels:{usePointStyle:!0},title:{display:!1,text:"Custom Chart Title"},legend:{display:!1,labels:{fontColor:i}}}}};return(a,i)=>{const n=R("Chart");return h(),b("div",Re,[Le,t("div",Me,[t("div",je,[f(n,{type:"doughnut",data:e.value,options:g.value},null,8,["data","options"])]),t("div",Pe,[t("div",Be,[t("div",Fe,[t("button",{class:P(["active_btn font-semibold text-sm",[r.value===1?"bg-white text-slate-600 border border-black":"text-slate-600"]]),onClick:i[0]||(i[0]=s=>r.value=0)},"Check In ",2),t("button",{class:P(["disable_btn font-semibold text-sm",[r.value===1?"bg-[#d4d4d4] text-slate-600":"text-slate-600"]]),onClick:i[1]||(i[1]=s=>r.value=1)},"Check Out ",2)]),(h(!0),b(M,null,B(d.value,(s,v)=>(h(),b("div",Ue,[t("div",{style:H({backgroundColor:s.backgroundColor}),class:"rounded-lg h-2 w-2 p-1.5"},null,4),t("div",null,m(s.label),1)]))),256)),Ie])])])])}}},Ve={class:"p-2 overflow-hidden bg-white rounded-lg border",style:{height:"200px"}},Ne=t("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Upcomings",-1),He={class:"h-full overflow-x-scroll bg-white rounded-lg"},We={class:"px-auto"},Ge={class:"p-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"},ze={class:"flex px-2 justify-between items-center"},Ye={class:"text-[14px] font-semibold"},Xe={class:"flex items-center gap-6"},qe={class:"text-xl font-semibold text-black"},Ke=t("span",null,[t("i",{class:"fa fa-chevron-right","aria-hidden":"true"})],-1),Je={key:1,class:"font-medium text-sm text-center"},Qe={__name:"Upcomings",setup(w){const e=j();return(g,r)=>(h(),b("div",Ve,[Ne,t("div",He,[o(e).attendanceDashboardUpcoming?(h(!0),b(M,{key:0},B(o(e).attendanceDashboardUpcoming,d=>(h(),b("div",We,[t("div",Ge,[t("div",ze,[t("div",null,[t("span",Ye,m(d.title),1)]),t("div",Xe,[t("span",qe,m(d.value),1),Ke])])])]))),256)):(h(),b("p",Je,"No data to display"))])]))}},Ze={key:0,class:"bg-white p-2 rounded-lg border"},et=t("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Shift",-1),tt={class:"grid grid-cols-6 gap-2 my-2"},ot=["onClick"],nt={class:"w-full bg-gray-200 p-2 rounded-lg"},st={class:"font-semibold text-[12px] text-[#000] font-['Poppins]"},at={class:"p-2"},lt=t("p",{class:"font-semibold text-sm text-[#000] font-['Poppins]"},"Shift Timing",-1),rt={class:"font-medium text-[12px] text-gray-600 font-['Poppins]"},it={class:"my-3"},ct=t("p",{class:"font-semibold text-sm text-[#000] font-['Poppins]"},"Total Employees",-1),dt={class:"font-medium text-[12px] text-gray-600 font-['Poppins]"},ut=X('<div class="flex justify-between"><div><p class="font-semibold text-sm text-[#000] font-[&#39;Poppins]">Present</p><p class="font-medium text-[12px] text-gray-600 font-[&#39;Poppins]">-</p></div><div class="mx-3"><p class="font-semibold text-sm text-[#000] font-[&#39;Poppins]">Absent</p><p class="font-medium text-[12px] text-gray-600 font-[&#39;Poppins]">-</p></div></div>',1),pt={__name:"Shifts",setup(w){const e=j();function g(r){const[d,p]=r.split(":").map(Number),c=d>=12?"PM":"AM";return`${d%12===0?12:d%12}:${String(p).padStart(2,"0")} ${c}`}return(r,d)=>o(e).attendanceDashboardWorkShiftSource?(h(),b("div",Ze,[et,t("div",tt,[(h(!0),b(M,null,B(o(e).attendanceDashboardWorkShiftSource,(p,c)=>(h(),b("div",{class:"bg-gray-100 w-[180px] h-[200px] rounded-lg cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100",onClick:a=>(o(e).canShowShiftDetails=!0,o(e).currentlySelectedShiftDetails={...p.work_shift_employee_data},o(e).downloadShiftDetails.push({...p.work_shift_employee_data})),key:c},[t("div",nt,[t("span",st,m(p.work_shift_employee_data[0].shift_name),1)]),t("div",at,[t("div",null,[lt,t("p",rt,m(g(p.work_shift_employee_data[0].shift_start_time))+" - "+m(g(p.work_shift_employee_data[0].shift_end_time)),1)]),t("div",it,[ct,t("p",dt,m(p.work_shift_assigned_employees?p.work_shift_assigned_employees:"-"),1)]),ut])],8,ot))),128))])])):L("",!0)}};var T={},vt={get exports(){return T},set exports(w){T=w}};(function(w,e){(function(g,r){r()})(E,function(){function g(n,s){return typeof s>"u"?s={autoBom:!1}:typeof s!="object"&&(console.warn("Deprecated: Expected third argument to be a object"),s={autoBom:!s}),s.autoBom&&/^\s*(?:text\/\S*|application\/xml|\S*\/\S*\+xml)\s*;.*charset\s*=\s*utf-8/i.test(n.type)?new Blob(["\uFEFF",n],{type:n.type}):n}function r(n,s,v){var l=new XMLHttpRequest;l.open("GET",n),l.responseType="blob",l.onload=function(){i(l.response,s,v)},l.onerror=function(){console.error("could not download file")},l.send()}function d(n){var s=new XMLHttpRequest;s.open("HEAD",n,!1);try{s.send()}catch{}return 200<=s.status&&299>=s.status}function p(n){try{n.dispatchEvent(new MouseEvent("click"))}catch{var s=document.createEvent("MouseEvents");s.initMouseEvent("click",!0,!0,window,0,0,0,80,20,!1,!1,!1,!1,0,null),n.dispatchEvent(s)}}var c=typeof window=="object"&&window.window===window?window:typeof self=="object"&&self.self===self?self:typeof E=="object"&&E.global===E?E:void 0,a=c.navigator&&/Macintosh/.test(navigator.userAgent)&&/AppleWebKit/.test(navigator.userAgent)&&!/Safari/.test(navigator.userAgent),i=c.saveAs||(typeof window!="object"||window!==c?function(){}:"download"in HTMLAnchorElement.prototype&&!a?function(n,s,v){var l=c.URL||c.webkitURL,_=document.createElement("a");s=s||n.name||"download",_.download=s,_.rel="noopener",typeof n=="string"?(_.href=n,_.origin===location.origin?p(_):d(_.href)?r(n,s,v):p(_,_.target="_blank")):(_.href=l.createObjectURL(n),setTimeout(function(){l.revokeObjectURL(_.href)},4e4),setTimeout(function(){p(_)},0))}:"msSaveOrOpenBlob"in navigator?function(n,s,v){if(s=s||n.name||"download",typeof n!="string")navigator.msSaveOrOpenBlob(g(n,v),s);else if(d(n))r(n,s,v);else{var l=document.createElement("a");l.href=n,l.target="_blank",setTimeout(function(){p(l)})}}:function(n,s,v,l){if(l=l||open("","_blank"),l&&(l.document.title=l.document.body.innerText="downloading..."),typeof n=="string")return r(n,s,v);var _=n.type==="application/octet-stream",y=/constructor/i.test(c.HTMLElement)||c.safari,C=/CriOS\/[\d]+/.test(navigator.userAgent);if((C||_&&y||a)&&typeof FileReader<"u"){var x=new FileReader;x.onloadend=function(){var $=x.result;$=C?$:$.replace(/^data:[^;]*;/,"data:attachment/file;"),l?l.location.href=$:location=$,l=null},x.readAsDataURL(n)}else{var S=c.URL||c.webkitURL,k=S.createObjectURL(n);l?l.location=k:location.href=k,l=null,setTimeout(function(){S.revokeObjectURL(k)},4e4)}});c.saveAs=i.saveAs=i,w.exports=i})})(vt);const A=w=>(K("data-v-a1940530"),w=w(),J(),w),_t={class:"w-full"},ht=A(()=>t("p",{class:"mb-2 text-2xl text-black font-semibold"}," Attendance dashboard ",-1)),ft={class:"bg-white p-2 rounded-lg border flex justify-between"},mt={class:"mx-2"},bt={class:"font-[14px] font-['Poppins'] text-gray-500"},gt={class:"mb-2 text-sm font-semibold"},wt=A(()=>t("div",{class:"flex justify-end gap-5 mx-4"},null,-1)),xt={class:"my-3"},yt={class:"grid grid-cols-3 gap-2"},St={class:"my-3"},Ct={class:"absolute left-0 mx-4 font-semibold fs-5"},kt={class:"relative right-0 mx-4 font-semibold fs-5"},$t=A(()=>t("p",{class:"relative left-2 font-['poppins']"},"Download",-1)),Dt=A(()=>t("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16"},[t("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check"}),t("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"}),t("path",{d:"M8,1 L8,11",class:"svg-out"})],-1)),At=[Dt],Ot={key:0,class:""},Et={key:1,class:"flex justify-center"},Rt=A(()=>t("img",{class:"h-[450px]",src:V,alt:"",srcset:""},null,-1)),Lt=[Rt],Mt={class:"absolute left-0 mx-4 font-semibold fs-5"},jt={class:"relative right-0 mx-4 font-semibold fs-5"},Pt=A(()=>t("p",{class:"relative left-2 font-['poppins']"},"Download",-1)),Bt=A(()=>t("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16"},[t("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check"}),t("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"}),t("path",{d:"M8,1 L8,11",class:"svg-out"})],-1)),Ft=[Bt],Ut={key:0,class:""},It={key:1,class:"flex justify-center"},Tt=A(()=>t("img",{class:"h-[450px]",src:V,alt:"",srcset:""},null,-1)),Vt=[Tt],Nt={__name:"attendanceDashboard",setup(w){const e=j();U(async()=>{await e.getAttendanceDashboardMainSource()});const g=async()=>{const c=new I.Workbook,a=c.addWorksheet("Sheet1"),i=["user_code","user_code","shift_start_time","shift_end_time","shift_end_time"],n="this report generated by ABShrms payroll software ",s=i;a.addRow(s).eachCell((x,S)=>{x.fill={type:"pattern",pattern:"solid",fgColor:{argb:"252f70"}},x.font={bold:!0,color:{argb:"ffffff"}},a.getColumn(S).width=20}),Object.values(e.currentlySelectedShiftDetails).forEach((x,S)=>{console.log(x);const k=[];s.forEach($=>{k.push(x[$])}),a.addRow(k)}),a.addRow([""]);const l=a.addRow([""]);l.getCell(1).value=n,a.mergeCells(l.number,1,l.number,3),l.getCell(1).alignment={wrapText:!0},l.getCell(1).font={italic:!0};const _=await c.xlsx.writeBuffer(),y=window.URL.createObjectURL(new Blob([_])),C=document.createElement("a");C.href=y,C.download="shift.xlsx",C.click(),window.URL.revokeObjectURL(y)},r=async()=>{const c=new I.Workbook,a=c.addWorksheet("Sheet1"),i=["Employee Code","Employee Name","Department","Process","Location"],n="This report generated by ABShrms payroll software ",s=i;a.addRow(s).eachCell((x,S)=>{x.fill={type:"pattern",pattern:"solid",fgColor:{argb:"252f70"}},x.font={bold:!0,color:{argb:"ffffff"}},a.getColumn(S).width=20}),Object.values(e.downloadAttendanceOverviewDetails[0]).forEach((x,S)=>{console.log(x);const k=[];s.forEach($=>{k.push(x[$])}),a.addRow(k)}),a.addRow([""]);const l=a.addRow([""]);l.getCell(1).value=n,a.mergeCells(l.number,1,l.number,3),l.getCell(1).alignment={wrapText:!0},l.getCell(1).font={italic:!0};const _=await c.xlsx.writeBuffer(),y=window.URL.createObjectURL(new Blob([_])),C=document.createElement("a");C.href=y,C.download=`${e.selectedAttendanceOverviewReport}_${new Date}.xlsx`,C.click(),window.URL.revokeObjectURL(y)},d=u(!1),p=u("downloaded");return(c,a)=>{const i=R("Column"),n=R("DataTable"),s=R("Sidebar");return h(),b(M,null,[o(e).canShowLoading?(h(),N(Q,{key:0,class:"absolute z-50 bg-white"})):L("",!0),t("div",_t,[ht,t("div",ft,[t("div",mt,[t("p",bt,[F(" Daily Analytics - "),t("span",gt,m(o(G)(new Date).format("MMMM DD,YYYY")),1)])]),wt]),t("div",xt,[f(xe)]),t("div",yt,[t("div",null,[f(Ee)]),t("div",null,[f(Te)]),t("div",null,[f(Qe)])]),t("div",St,[f(pt)])]),f(s,{visible:o(e).canShowShiftDetails,"onUpdate:visible":a[1]||(a[1]=v=>o(e).canShowShiftDetails=v),position:"right",class:"w-full"},{header:O(()=>[t("p",Ct,m(o(e).currentlySelectedShiftDetails?o(e).currentlySelectedShiftDetails[0].shift_name:null)+" Reports",1),t("div",kt,[t("button",{class:"bg-[#E6E6E6] p-2 mx-2 rounded-md w-[120px]",onClick:a[0]||(a[0]=v=>(d.value=!d.value,g()))},[$t,t("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:P([d.value==!0?p.value:" "])},At,2)])])]),default:O(()=>[Object.values(o(e).currentlySelectedShiftDetails).length>=1?(h(),b("div",Ot,[f(n,{scrollable:"",scrollHeight:"450px",value:o(e).currentlySelectedShiftDetails?o(e).currentlySelectedShiftDetails:[]},{default:O(()=>[f(i,{field:"user_code",header:"User code"}),f(i,{field:"name",header:"Name"}),f(i,{field:"shift_start_time",header:"Shift start time"}),f(i,{field:"shift_end_time",header:"Shift end time"}),f(i,{field:"grace_time",header:"Grace time"})]),_:1},8,["value"])])):(h(),b("div",Et,Lt))]),_:1},8,["visible"]),f(s,{visible:o(e).canShowAttendanceOverview,"onUpdate:visible":a[3]||(a[3]=v=>o(e).canShowAttendanceOverview=v),position:"right",class:"w-full"},{header:O(()=>[t("p",Mt,m(o(e).selectedAttendanceOverviewReport)+" Reports",1),t("div",jt,[t("button",{class:"bg-[#E6E6E6] p-2 mx-2 rounded-md w-[120px]",onClick:a[2]||(a[2]=v=>(d.value=!d.value,r()))},[Pt,t("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:P([d.value==!0?p.value:" "])},Ft,2)])])]),default:O(()=>[Object.values(o(e).currentlySelectedShiftDetails).length>=1?(h(),b("div",Ut,[f(n,{scrollable:"",scrollHeight:"450px",value:o(e).currentlySelectedShiftDetails?o(e).currentlySelectedShiftDetails:[]},{default:O(()=>[f(i,{field:"Employee Code",header:"Employee Code",style:{"white-space":"nowrap"}}),f(i,{field:"Employee Name",header:"Employee Name",style:{"white-space":"nowrap"}}),f(i,{field:"Department",header:"Department",style:{"white-space":"nowrap"}}),f(i,{field:"Process",header:"Process",style:{"white-space":"nowrap"}}),f(i,{field:"Location",header:"Location",style:{"white-space":"nowrap"}})]),_:1},8,["value"])])):(h(),b("div",It,Vt))]),_:1},8,["visible"])],64)}}},Kt=q(Nt,[["__scopeId","data-v-a1940530"]]);export{Kt as default};
