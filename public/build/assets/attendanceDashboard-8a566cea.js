import{d as k}from"./dayjs.min-2f06af28.js";import{a as P}from"./index-362795f3.js";import{d as C}from"./pinia-c08c4665.js";import{Q as _,aa as d,o as p,c as h,d as t,t as u,a as f,ai as y,ab as w,g as x,h as i,n as g,F as $,f as M,b as A,l as j,w as v}from"./inputnumber.esm-5d69a21b.js";import{_ as S}from"./_plugin-vue_export-helper-c27b6911.js";import{L as V}from"./LoadingSpinner-264a0661.js";const m=C("useAttendanceDashboardMainStore",()=>{const r=_(!1);_();const e=_(),c=_(),n=_(!1),o=_([]);return{canShowLoading:r,attendanceDashboardWorkShiftSource:c,getAttendanceDashboardMainSource:()=>{r.value=!0;let s="/get-attendance-dashboard";P.get(s).then(a=>{e.value=a.data.attendance_overview,c.value=a.data.work_shift}).finally(()=>{r.value=!1})},attendanceOverview:e,canShowShiftDetails:n,currentlySelectedShiftDetails:o}}),N={key:0,class:"grid grid-cols-7 gap-4"},O={class:"bg-white rounded-lg p-2 border"},E={class:"px-auto flex justify-center"},L={class:"text-2xl font-semibold text-center"},T=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Present",-1),B={class:"bg-white rounded-lg p-2 border"},U={class:"px-auto flex justify-center"},W={class:"text-2xl font-semibold text-center"},Y=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Absent",-1),I={class:"bg-white rounded-lg p-2 border"},z={class:"px-auto flex justify-center"},F={class:"text-2xl font-semibold text-center"},R=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Leave",-1),G=y('<div class="bg-white rounded-lg p-2 border"><div class="px-auto flex justify-center"><span class="text-2xl font-semibold text-center"> 0 </span></div><p class="text-sm underline font-semibold text-center text-gray-500">Late coming</p></div><div class="bg-white rounded-lg p-2 border"><div class="px-auto flex justify-center"><span class="text-2xl font-semibold text-center"> 0 </span></div><p class="text-sm underline font-semibold text-center text-gray-500">Early going</p></div><div class="bg-white rounded-lg p-2 border"><div class="px-auto flex justify-center"><span class="text-2xl font-semibold text-center"> 0 </span></div><p class="text-sm underline font-semibold text-center text-gray-500">Missed in punch</p></div><div class="bg-white rounded-lg p-2 border"><div class="px-auto flex justify-center"><span class="text-2xl font-semibold text-center"> 0 </span></div><p class="text-sm underline font-semibold text-center text-gray-500">Missed out punch</p></div>',4),Q={__name:"attendanceCount",setup(r){const e=m();return(c,n)=>d(e).attendanceOverview?(p(),h("div",N,[t("div",O,[t("div",E,[t("span",L,u(d(e).attendanceOverview.present_count),1)]),T]),t("div",B,[t("div",U,[t("span",W,u(d(e).attendanceOverview.absent_count),1)]),Y]),t("div",I,[t("div",z,[t("span",F,u(d(e).attendanceOverview.leave_emp_count),1)]),R]),G])):f("",!0)}},q={},H={class:"p-2 overflow-hidden bg-white rounded-lg border",style:{height:"200px"}},J=t("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Exception Analytics",-1),K=t("div",{class:"h-full overflow-x-scroll bg-white rounded-lg"},[t("p",{class:"font-medium text-sm text-center"},"No data to display")],-1),X=[J,K];function Z(r,e){return p(),h("div",H,X)}const tt=S(q,[["render",Z]]);const et={class:"bg-white rounded-lg p-2 border"},st=t("p",{class:"font-semibold text-[14px] text-[#000] font-['Poppins] text-center"},"Attendance Analytics",-1),ot={class:"grid grid-cols-2 gap-4 my-2.5"},nt={class:"h-full"},at={class:"flex items-center"},it={class:"my-auto"},dt=t("div",null,null,-1),lt={__name:"attendanceAnalytics",setup(r){w(()=>{e.value=o(),c.value=l()});const e=_(),c=_(),n=_(0),o=()=>{const s=getComputedStyle(document.body);return{labels:["Bio-Metric","Mobile","Web"],datasets:[{data:[540,325,702],backgroundColor:["rgba(122, 94, 162, 1)","rgba(255, 177, 184, 1)","rgba(107, 183, 192, 1)"],hoverBackgroundColor:[s.getPropertyValue("--blue-400"),s.getPropertyValue("--yellow-400"),s.getPropertyValue("--green-400")]}]}},l=()=>{const s=getComputedStyle(document.documentElement),a=s.getPropertyValue("--text-color");return s.getPropertyValue("--text-color-secondary"),s.getPropertyValue("--surface-border"),{maintainAspectRatio:!1,aspectRatio:1,plugins:{labels:{usePointStyle:!0},title:{display:!1,text:"Custom Chart Title"},legend:{display:!1,labels:{fontColor:a}}}}};return(s,a)=>{const b=x("Chart");return p(),h("div",et,[st,t("div",ot,[t("div",nt,[i(b,{type:"pie",data:e.value,options:c.value},null,8,["data","options"])]),t("div",at,[t("div",it,[t("div",null,[t("button",{class:g(["orange_btn font-semibold text-sm",[n.value===1?"bg-white text-slate-600 border border-black":"text-slate-600"]]),onClick:a[0]||(a[0]=D=>n.value=0)},"Check In ",2),t("button",{class:g(["Enable_btn font-semibold text-sm",[n.value===1?"bg-[#d4d4d4] text-slate-600":"text-slate-600"]]),onClick:a[1]||(a[1]=D=>n.value=1)},"Check Out ",2)]),dt])])])])}}},ct={},rt={class:"p-2 overflow-hidden bg-white rounded-lg border",style:{height:"200px"}},_t=t("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Upcomings",-1),pt=t("div",{class:"h-full overflow-x-scroll bg-white rounded-lg"},[t("p",{class:"font-medium text-sm text-center"},"No data to display")],-1),ut=[_t,pt];function ht(r,e){return p(),h("div",rt,ut)}const xt=S(ct,[["render",ht]]),ft={key:0,class:"bg-white p-2 rounded-lg border"},mt=t("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Shift",-1),bt={class:"grid grid-cols-6 gap-2 my-2"},gt=["onClick"],vt={class:"w-full bg-gray-200 p-2 rounded-lg"},yt={class:"font-semibold text-[12px] text-[#000] font-['Poppins]"},wt={class:"p-2"},$t=t("p",{class:"font-semibold text-sm text-[#000] font-['Poppins]"},"Shift Timing",-1),St={class:"font-medium text-[12px] text-gray-600 font-['Poppins]"},Dt={class:"my-3"},kt=t("p",{class:"font-semibold text-sm text-[#000] font-['Poppins]"},"Total Employees",-1),Pt={class:"font-medium text-[12px] text-gray-600 font-['Poppins]"},Ct=y('<div class="flex justify-between"><div><p class="font-semibold text-sm text-[#000] font-[&#39;Poppins]">Present</p><p class="font-medium text-[12px] text-gray-600 font-[&#39;Poppins]">-</p></div><div class="mx-3"><p class="font-semibold text-sm text-[#000] font-[&#39;Poppins]">Absent</p><p class="font-medium text-[12px] text-gray-600 font-[&#39;Poppins]">-</p></div></div>',1),Mt={__name:"Shifts",setup(r){const e=m();function c(n){const[o,l]=n.split(":").map(Number),s=o>=12?"PM":"AM";return`${o%12===0?12:o%12}:${String(l).padStart(2,"0")} ${s}`}return(n,o)=>d(e).attendanceDashboardWorkShiftSource?(p(),h("div",ft,[mt,t("div",bt,[(p(!0),h($,null,M(d(e).attendanceDashboardWorkShiftSource,(l,s)=>(p(),h("div",{class:"bg-gray-100 w-[180px] h-[200px] rounded-lg cursor-pointer",onClick:a=>(d(e).canShowShiftDetails=!0,d(e).currentlySelectedShiftDetails={...l.work_shift_employee_data}),key:s},[t("div",vt,[t("span",yt,u(l.work_shift_employee_data[0].shift_name),1)]),t("div",wt,[t("div",null,[$t,t("p",St,u(c(l.work_shift_employee_data[0].shift_start_time))+" - "+u(c(l.work_shift_employee_data[0].shift_end_time)),1)]),t("div",Dt,[kt,t("p",Pt,u(l.work_shift_assigned_employees),1)]),Ct])],8,gt))),128))])])):f("",!0)}},At={class:"w-full"},jt=t("p",{class:"mb-2 text-2xl text-black font-semibold"}," Attendance dashboard ",-1),Vt={class:"bg-white p-2 rounded-lg border flex justify-between"},Nt={class:"mx-2"},Ot={class:"font-[14px] font-['Poppins'] text-gray-500"},Et={class:"mb-2 text-sm font-semibold"},Lt=t("div",{class:"flex justify-end gap-5 mx-4"},null,-1),Tt={class:"my-3"},Bt={class:"grid grid-cols-3 gap-6"},Ut={class:"my-3"},Gt={__name:"attendanceDashboard",setup(r){const e=m();return w(()=>{e.getAttendanceDashboardMainSource()}),(c,n)=>{const o=x("Column"),l=x("DataTable"),s=x("Dialog");return p(),h($,null,[d(e).canShowLoading?(p(),A(V,{key:0,class:"absolute z-50 bg-white"})):f("",!0),t("div",At,[jt,t("div",Vt,[t("div",Nt,[t("p",Ot,[j(" Daily Analytics - "),t("span",Et,u(d(k)(new Date).format("MMMM DD,YYYY")),1)])]),Lt]),t("div",Tt,[i(Q)]),t("div",Bt,[t("div",null,[i(tt)]),t("div",null,[i(lt)]),t("div",null,[i(xt)])]),t("div",Ut,[i(Mt)])]),i(s,{header:"Shift Details",visible:d(e).canShowShiftDetails,"onUpdate:visible":n[0]||(n[0]=a=>d(e).canShowShiftDetails=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"50vw"},modal:!0,closable:!0,closeOnEscape:!0},{default:v(()=>[i(l,{value:d(e).currentlySelectedShiftDetails},{default:v(()=>[i(o,{field:"user_code",header:"User code"}),i(o,{field:"name",header:"Name"}),i(o,{field:"shift_start_time",header:"Shift start time"}),i(o,{field:"shift_end_time",header:"Shift end time"}),i(o,{field:"grace_time",header:"Grace time"})]),_:1},8,["value"])]),_:1},8,["visible"])],64)}}};export{Gt as _};
