/* empty css              *//* empty css                     *//* empty css                   *//* empty css                 */import{H as f,aa as i,o as b,c as g,d as t,t as h,a as O,ab as B,g as E,h as x,n as R,F as U,f as F,am as I,b as H,l as W,w as P,ac as G,ad as Y,I as z,P as K,J as X,K as q}from"./inputnumber.esm-3276ace1.js";import{d as J,c as Q}from"./pinia-69eaa219.js";import{s as Z}from"./sidebar.esm-91a38ecf.js";import{s as tt}from"./chart.esm-2b32d5bc.js";import{a as et}from"./datatable.esm-aaa10fcd.js";import{D as ot,s as st}from"./dialogservice.esm-d79ebc81.js";import{s as nt}from"./row.esm-6ebc942e.js";import{d as at}from"./dayjs.min-2f06af28.js";import{e as it}from"./exceljs.min-edd65134.js";import{a as ct,c as C}from"./index-362795f3.js";import{_ as N}from"./_plugin-vue_export-helper-c27b6911.js";import{L as rt}from"./LoadingSpinner-89e164da.js";import"./_commonjs-dynamic-modules-302442b1.js";/* empty css                                                                       */const M=J("useAttendanceDashboardMainStore",()=>{const l=f(!1);f();const n=f(),u=f(),r=f(!1),p=f([]),c=f(),o=f(),d=f([]);return{canShowLoading:l,attendanceDashboardWorkShiftSource:u,getAttendanceDashboardMainSource:()=>{l.value=!0;let e="/get-attendance-dashboard";ct.get(e).then(s=>{n.value=s.data.attendance_overview,u.value=s.data.work_shift;let m=Object.entries(s.data.upcomings).map(a=>({title:a[0],value:a[1]}));o.value=m}).finally(()=>{l.value=!1})},attendanceOverview:n,canShowShiftDetails:r,currentlySelectedShiftDetails:p,currentlySelectedShiftName:c,downloadShiftDetails:d,attendanceDashboardUpcoming:o}}),dt={key:0,class:"grid grid-cols-7 gap-4"},lt={class:"bg-white rounded-lg p-2 border"},pt={class:"px-auto flex justify-center"},_t={class:"text-2xl font-semibold text-center"},ut=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Present",-1),ht={class:"bg-white rounded-lg p-2 border"},ft={class:"px-auto flex justify-center"},mt={class:"text-2xl font-semibold text-center"},xt=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Absent",-1),vt={class:"bg-white rounded-lg p-2 border"},bt={class:"px-auto flex justify-center"},gt={class:"text-2xl font-semibold text-center"},wt=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Leave",-1),yt={class:"bg-white rounded-lg p-2 border"},St={class:"px-auto flex justify-center"},$t={class:"text-2xl font-semibold text-center"},Dt=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Late coming",-1),kt={class:"bg-white rounded-lg p-2 border"},Ct={class:"px-auto flex justify-center"},At={class:"text-2xl font-semibold text-center"},Et=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Early going",-1),Mt={class:"bg-white rounded-lg p-2 border"},jt={class:"px-auto flex justify-center"},Lt={class:"text-2xl font-semibold text-center"},Pt=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Missed in punch",-1),Rt={class:"bg-white rounded-lg p-2 border"},Ot={class:"px-auto flex justify-center"},Ut={class:"text-2xl font-semibold text-center"},Tt=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Missed out punch",-1),Bt={__name:"attendanceCount",setup(l){const n=M();return(u,r)=>i(n).attendanceOverview?(b(),g("div",dt,[t("div",lt,[t("div",pt,[t("span",_t,h(i(n).attendanceOverview.present_count),1)]),ut]),t("div",ht,[t("div",ft,[t("span",mt,h(i(n).attendanceOverview.absent_count),1)]),xt]),t("div",vt,[t("div",bt,[t("span",gt,h(i(n).attendanceOverview.leave_emp_count),1)]),wt]),t("div",yt,[t("div",St,[t("span",$t,h(i(n).attendanceOverview.lg_count),1)]),Dt]),t("div",kt,[t("div",Ct,[t("span",At,h(i(n).attendanceOverview.eg_count),1)]),Et]),t("div",Mt,[t("div",jt,[t("span",Lt,h(i(n).attendanceOverview.mip_count),1)]),Pt]),t("div",Rt,[t("div",Ot,[t("span",Ut,h(i(n).attendanceOverview.mop_count),1)]),Tt])])):O("",!0)}},Ft={},Nt={class:"p-2 overflow-hidden bg-white rounded-lg border",style:{height:"200px"}},Vt=t("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Exception Analytics",-1),It=t("div",{class:"h-full overflow-x-scroll bg-white rounded-lg"},[t("p",{class:"font-medium text-sm text-center"},"No data to display")],-1),Ht=[Vt,It];function Wt(l,n){return b(),g("div",Nt,Ht)}const Gt=N(Ft,[["render",Wt]]);const Yt={class:"bg-white rounded-lg p-2 border"},zt=t("p",{class:"font-semibold text-[14px] text-[#000] font-['Poppins] text-center"},"Attendance Analytics",-1),Kt={class:"grid grid-cols-2 gap-4 my-2.5"},Xt={class:"h-full"},qt={class:"flex items-center"},Jt={class:"my-auto"},Qt=t("div",null,null,-1),Zt={__name:"attendanceAnalytics",setup(l){B(()=>{n.value=p(),u.value=c()});const n=f(),u=f(),r=f(0),p=()=>{const o=getComputedStyle(document.body);return{labels:["Bio-Metric","Mobile","Web"],datasets:[{data:[1,1,1],backgroundColor:["rgba(122, 94, 162, 1)","rgba(255, 177, 184, 1)","rgba(107, 183, 192, 1)"],hoverBackgroundColor:[o.getPropertyValue("--blue-400"),o.getPropertyValue("--yellow-400"),o.getPropertyValue("--green-400")]}]}},c=()=>{const o=getComputedStyle(document.documentElement),d=o.getPropertyValue("--text-color");return o.getPropertyValue("--text-color-secondary"),o.getPropertyValue("--surface-border"),{maintainAspectRatio:!1,aspectRatio:1,plugins:{labels:{usePointStyle:!0},title:{display:!1,text:"Custom Chart Title"},legend:{display:!1,labels:{fontColor:d}}}}};return(o,d)=>{const v=E("Chart");return b(),g("div",Yt,[zt,t("div",Kt,[t("div",Xt,[x(v,{type:"pie",data:n.value,options:u.value},null,8,["data","options"])]),t("div",qt,[t("div",Jt,[t("div",null,[t("button",{class:R(["orange_btn font-semibold text-sm",[r.value===1?"bg-white text-slate-600 border border-black":"text-slate-600"]]),onClick:d[0]||(d[0]=e=>r.value=0)},"Check In ",2),t("button",{class:R(["Enable_btn font-semibold text-sm",[r.value===1?"bg-[#d4d4d4] text-slate-600":"text-slate-600"]]),onClick:d[1]||(d[1]=e=>r.value=1)},"Check Out ",2)]),Qt])])])])}}},te={class:"p-2 overflow-hidden bg-white rounded-lg border",style:{height:"200px"}},ee=t("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Upcomings",-1),oe={class:"h-full overflow-x-scroll bg-white rounded-lg"},se={class:"px-auto"},ne={class:"p-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"},ae={class:"flex px-2 justify-between items-center"},ie={class:"text-[14px] font-semibold"},ce={class:"flex items-center gap-6"},re={class:"text-xl font-semibold text-black"},de=t("span",null,[t("i",{class:"fa fa-chevron-right","aria-hidden":"true"})],-1),le={key:1,class:"font-medium text-sm text-center"},pe={__name:"Upcomings",setup(l){const n=M();return(u,r)=>(b(),g("div",te,[ee,t("div",oe,[i(n).attendanceDashboardUpcoming?(b(!0),g(U,{key:0},F(i(n).attendanceDashboardUpcoming,p=>(b(),g("div",se,[t("div",ne,[t("div",ae,[t("div",null,[t("span",ie,h(p.title),1)]),t("div",ce,[t("span",re,h(p.value),1),de])])])]))),256)):(b(),g("p",le,"No data to display"))])]))}},_e={key:0,class:"bg-white p-2 rounded-lg border"},ue=t("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Shift",-1),he={class:"grid grid-cols-6 gap-2 my-2"},fe=["onClick"],me={class:"w-full bg-gray-200 p-2 rounded-lg"},xe={class:"font-semibold text-[12px] text-[#000] font-['Poppins]"},ve={class:"p-2"},be=t("p",{class:"font-semibold text-sm text-[#000] font-['Poppins]"},"Shift Timing",-1),ge={class:"font-medium text-[12px] text-gray-600 font-['Poppins]"},we={class:"my-3"},ye=t("p",{class:"font-semibold text-sm text-[#000] font-['Poppins]"},"Total Employees",-1),Se={class:"font-medium text-[12px] text-gray-600 font-['Poppins]"},$e=I('<div class="flex justify-between"><div><p class="font-semibold text-sm text-[#000] font-[&#39;Poppins]">Present</p><p class="font-medium text-[12px] text-gray-600 font-[&#39;Poppins]">-</p></div><div class="mx-3"><p class="font-semibold text-sm text-[#000] font-[&#39;Poppins]">Absent</p><p class="font-medium text-[12px] text-gray-600 font-[&#39;Poppins]">-</p></div></div>',1),De={__name:"Shifts",setup(l){const n=M();function u(r){const[p,c]=r.split(":").map(Number),o=p>=12?"PM":"AM";return`${p%12===0?12:p%12}:${String(c).padStart(2,"0")} ${o}`}return(r,p)=>i(n).attendanceDashboardWorkShiftSource?(b(),g("div",_e,[ue,t("div",he,[(b(!0),g(U,null,F(i(n).attendanceDashboardWorkShiftSource,(c,o)=>(b(),g("div",{class:"bg-gray-100 w-[180px] h-[200px] rounded-lg cursor-pointer",onClick:d=>(i(n).canShowShiftDetails=!0,i(n).currentlySelectedShiftDetails={...c.work_shift_employee_data},i(n).downloadShiftDetails.push({...c.work_shift_employee_data})),key:o},[t("div",me,[t("span",xe,h(c.work_shift_employee_data[0].shift_name),1)]),t("div",ve,[t("div",null,[be,t("p",ge,h(u(c.work_shift_employee_data[0].shift_start_time))+" - "+h(u(c.work_shift_employee_data[0].shift_end_time)),1)]),t("div",we,[ye,t("p",Se,h(c.work_shift_assigned_employees?c.work_shift_assigned_employees:"-"),1)]),$e])],8,fe))),128))])])):O("",!0)}};var T={},ke={get exports(){return T},set exports(l){T=l}};(function(l,n){(function(u,r){r()})(C,function(){function u(e,s){return typeof s>"u"?s={autoBom:!1}:typeof s!="object"&&(console.warn("Deprecated: Expected third argument to be a object"),s={autoBom:!s}),s.autoBom&&/^\s*(?:text\/\S*|application\/xml|\S*\/\S*\+xml)\s*;.*charset\s*=\s*utf-8/i.test(e.type)?new Blob(["\uFEFF",e],{type:e.type}):e}function r(e,s,m){var a=new XMLHttpRequest;a.open("GET",e),a.responseType="blob",a.onload=function(){v(a.response,s,m)},a.onerror=function(){console.error("could not download file")},a.send()}function p(e){var s=new XMLHttpRequest;s.open("HEAD",e,!1);try{s.send()}catch{}return 200<=s.status&&299>=s.status}function c(e){try{e.dispatchEvent(new MouseEvent("click"))}catch{var s=document.createEvent("MouseEvents");s.initMouseEvent("click",!0,!0,window,0,0,0,80,20,!1,!1,!1,!1,0,null),e.dispatchEvent(s)}}var o=typeof window=="object"&&window.window===window?window:typeof self=="object"&&self.self===self?self:typeof C=="object"&&C.global===C?C:void 0,d=o.navigator&&/Macintosh/.test(navigator.userAgent)&&/AppleWebKit/.test(navigator.userAgent)&&!/Safari/.test(navigator.userAgent),v=o.saveAs||(typeof window!="object"||window!==o?function(){}:"download"in HTMLAnchorElement.prototype&&!d?function(e,s,m){var a=o.URL||o.webkitURL,_=document.createElement("a");s=s||e.name||"download",_.download=s,_.rel="noopener",typeof e=="string"?(_.href=e,_.origin===location.origin?c(_):p(_.href)?r(e,s,m):c(_,_.target="_blank")):(_.href=a.createObjectURL(e),setTimeout(function(){a.revokeObjectURL(_.href)},4e4),setTimeout(function(){c(_)},0))}:"msSaveOrOpenBlob"in navigator?function(e,s,m){if(s=s||e.name||"download",typeof e!="string")navigator.msSaveOrOpenBlob(u(e,m),s);else if(p(e))r(e,s,m);else{var a=document.createElement("a");a.href=e,a.target="_blank",setTimeout(function(){c(a)})}}:function(e,s,m,a){if(a=a||open("","_blank"),a&&(a.document.title=a.document.body.innerText="downloading..."),typeof e=="string")return r(e,s,m);var _=e.type==="application/octet-stream",k=/constructor/i.test(o.HTMLElement)||o.safari,y=/CriOS\/[\d]+/.test(navigator.userAgent);if((y||_&&k||d)&&typeof FileReader<"u"){var S=new FileReader;S.onloadend=function(){var D=S.result;D=y?D:D.replace(/^data:[^;]*;/,"data:attachment/file;"),a?a.location.href=D:location=D,a=null},S.readAsDataURL(e)}else{var $=o.URL||o.webkitURL,A=$.createObjectURL(e);a?a.location=A:location.href=A,a=null,setTimeout(function(){$.revokeObjectURL(A)},4e4)}});o.saveAs=v.saveAs=v,l.exports=v})})(ke);const j=l=>(G("data-v-257ae547"),l=l(),Y(),l),Ce={class:"w-full"},Ae=j(()=>t("p",{class:"mb-2 text-2xl text-black font-semibold"}," Attendance dashboard ",-1)),Ee={class:"bg-white p-2 rounded-lg border flex justify-between"},Me={class:"mx-2"},je={class:"font-[14px] font-['Poppins'] text-gray-500"},Le={class:"mb-2 text-sm font-semibold"},Pe=j(()=>t("div",{class:"flex justify-end gap-5 mx-4"},null,-1)),Re={class:"my-3"},Oe={class:"grid grid-cols-3 gap-6"},Ue={class:"my-3"},Te={class:"absolute left-0 mx-4 font-semibold fs-5"},Be={class:"relative right-0 mx-4 font-semibold fs-5"},Fe=j(()=>t("p",{class:"relative left-2 font-['poppins']"},"Download",-1)),Ne=j(()=>t("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16"},[t("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check"}),t("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"}),t("path",{d:"M8,1 L8,11",class:"svg-out"})],-1)),Ve=[Ne],Ie={class:"mt-6"},He={__name:"attendanceDashboard",setup(l){const n=M();B(()=>{n.getAttendanceDashboardMainSource()});const u=async()=>{const c=new it.Workbook,o=c.addWorksheet("Sheet1"),d=["user_code","user_code","shift_start_time","shift_end_time","shift_end_time"],v="this report generated by ABShrms payroll software ",e=d;o.addRow(e).eachCell((y,S)=>{y.fill={type:"pattern",pattern:"solid",fgColor:{argb:"252f70"}},y.font={bold:!0,color:{argb:"ffffff"}},o.getColumn(S).width=20}),Object.values(n.currentlySelectedShiftDetails).forEach((y,S)=>{console.log(y);const $=[];e.forEach(L=>{$.push(y[L])}),o.addRow($);const V={fill:{type:"pattern",pattern:"solid",fgColor:(S+2)%2===1?{argb:"cad1fa"}:{argb:"cad1fa"}}};o.addRow($).eachCell(L=>{L.style=V})}),[["","",""],["","",""],[v,"",""]].forEach(y=>{o.addRow(y)});const a=await c.xlsx.writeBuffer(),_=window.URL.createObjectURL(new Blob([a])),k=document.createElement("a");k.href=_,k.download="shift.xlsx",k.click(),window.URL.revokeObjectURL(_)},r=f(!1),p=f("downloaded");return(c,o)=>{const d=E("Column"),v=E("DataTable"),e=E("Sidebar");return b(),g(U,null,[i(n).canShowLoading?(b(),H(rt,{key:0,class:"absolute z-50 bg-white"})):O("",!0),t("div",Ce,[Ae,t("div",Ee,[t("div",Me,[t("p",je,[W(" Daily Analytics - "),t("span",Le,h(i(at)(new Date).format("MMMM DD,YYYY")),1)])]),Pe]),t("div",Re,[x(Bt)]),t("div",Oe,[t("div",null,[x(Gt)]),t("div",null,[x(Zt)]),t("div",null,[x(pe)])]),t("div",Ue,[x(De)])]),x(e,{visible:i(n).canShowShiftDetails,"onUpdate:visible":o[1]||(o[1]=s=>i(n).canShowShiftDetails=s),position:"right",class:"w-full"},{header:P(()=>[t("p",Te,h(i(n).currentlySelectedShiftDetails?i(n).currentlySelectedShiftDetails[0].shift_name:null)+" Reports",1),t("div",Be,[t("button",{class:"bg-[#E6E6E6] p-2 mx-2 rounded-md w-[120px]",onClick:o[0]||(o[0]=s=>(r.value=!r.value,u()))},[Fe,t("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:R([r.value==!0?p.value:" "])},Ve,2)])])]),default:P(()=>[t("div",Ie,[x(v,{value:i(n).currentlySelectedShiftDetails?i(n).currentlySelectedShiftDetails:[]},{default:P(()=>[x(d,{field:"user_code",header:"User code"}),x(d,{field:"name",header:"Name"}),x(d,{field:"shift_start_time",header:"Shift start time"}),x(d,{field:"shift_end_time",header:"Shift end time"}),x(d,{field:"grace_time",header:"Grace time"})]),_:1},8,["value"])])]),_:1},8,["visible"])],64)}}},We=N(He,[["__scopeId","data-v-257ae547"]]),w=z(We),Ge=Q();w.use(K,{ripple:!0});w.use(ot);w.use(Ge);w.component("Sidebar",Z);w.component("DataTable",et);w.component("Column",X);w.component("ColumnGroup",st);w.component("Row",nt);w.component("Chart",tt);w.component("Dialog",q);w.mount("#AttendanceDashboard");