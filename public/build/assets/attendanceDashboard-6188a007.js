import{d as D}from"./dayjs.min-2f06af28.js";import{a as k}from"./index-362795f3.js";import{d as P}from"./pinia-c08c4665.js";import{Q as p,aa as s,o as u,c as h,d as t,t as l,a as x,ab as y,g as m,h as c,n as g,F as w,f as C,ai as M,b as A,l as O,w as v}from"./inputnumber.esm-5d69a21b.js";import{_ as $}from"./_plugin-vue_export-helper-c27b6911.js";import{L as j}from"./LoadingSpinner-264a0661.js";const f=P("useAttendanceDashboardMainStore",()=>{const _=p(!1);p();const e=p(),r=p(),a=p(!1),n=p([]);return{canShowLoading:_,attendanceDashboardWorkShiftSource:r,getAttendanceDashboardMainSource:()=>{_.value=!0;let o="/get-attendance-dashboard";k.get(o).then(d=>{e.value=d.data.attendance_overview,r.value=d.data.work_shift}).finally(()=>{_.value=!1})},attendanceOverview:e,canShowShiftDetails:a,currentlySelectedShiftDetails:n}}),V={key:0,class:"grid grid-cols-7 gap-4"},N={class:"bg-white rounded-lg p-2 border"},E={class:"px-auto flex justify-center"},L={class:"text-2xl font-semibold text-center"},T=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Present",-1),B={class:"bg-white rounded-lg p-2 border"},U={class:"px-auto flex justify-center"},W={class:"text-2xl font-semibold text-center"},Y=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Absent",-1),I={class:"bg-white rounded-lg p-2 border"},z={class:"px-auto flex justify-center"},F={class:"text-2xl font-semibold text-center"},R=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Leave",-1),G={class:"bg-white rounded-lg p-2 border"},Q={class:"px-auto flex justify-center"},q={class:"text-2xl font-semibold text-center"},H=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Late coming",-1),J={class:"bg-white rounded-lg p-2 border"},K={class:"px-auto flex justify-center"},X={class:"text-2xl font-semibold text-center"},Z=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Early going",-1),tt={class:"bg-white rounded-lg p-2 border"},et={class:"px-auto flex justify-center"},st={class:"text-2xl font-semibold text-center"},ot=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Missed in punch",-1),nt={class:"bg-white rounded-lg p-2 border"},at={class:"px-auto flex justify-center"},it={class:"text-2xl font-semibold text-center"},dt=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Missed out punch",-1),ct={__name:"attendanceCount",setup(_){const e=f();return(r,a)=>s(e).attendanceOverview?(u(),h("div",V,[t("div",N,[t("div",E,[t("span",L,l(s(e).attendanceOverview.present_count),1)]),T]),t("div",B,[t("div",U,[t("span",W,l(s(e).attendanceOverview.absent_count),1)]),Y]),t("div",I,[t("div",z,[t("span",F,l(s(e).attendanceOverview.leave_emp_count),1)]),R]),t("div",G,[t("div",Q,[t("span",q,l(s(e).attendanceOverview.lg_count),1)]),H]),t("div",J,[t("div",K,[t("span",X,l(s(e).attendanceOverview.eg_count),1)]),Z]),t("div",tt,[t("div",et,[t("span",st,l(s(e).attendanceOverview.mip_count),1)]),ot]),t("div",nt,[t("div",at,[t("span",it,l(s(e).attendanceOverview.mop_count),1)]),dt])])):x("",!0)}},lt={},rt={class:"p-2 overflow-hidden bg-white rounded-lg border",style:{height:"200px"}},_t=t("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Exception Analytics",-1),pt=t("div",{class:"h-full overflow-x-scroll bg-white rounded-lg"},[t("p",{class:"font-medium text-sm text-center"},"No data to display")],-1),ut=[_t,pt];function ht(_,e){return u(),h("div",rt,ut)}const mt=$(lt,[["render",ht]]);const xt={class:"bg-white rounded-lg p-2 border"},ft=t("p",{class:"font-semibold text-[14px] text-[#000] font-['Poppins] text-center"},"Attendance Analytics",-1),bt={class:"grid grid-cols-2 gap-4 my-2.5"},gt={class:"h-full"},vt={class:"flex items-center"},yt={class:"my-auto"},wt=t("div",null,null,-1),$t={__name:"attendanceAnalytics",setup(_){y(()=>{e.value=n(),r.value=i()});const e=p(),r=p(),a=p(0),n=()=>{const o=getComputedStyle(document.body);return{labels:["Bio-Metric","Mobile","Web"],datasets:[{data:[1,1,1],backgroundColor:["rgba(122, 94, 162, 1)","rgba(255, 177, 184, 1)","rgba(107, 183, 192, 1)"],hoverBackgroundColor:[o.getPropertyValue("--blue-400"),o.getPropertyValue("--yellow-400"),o.getPropertyValue("--green-400")]}]}},i=()=>{const o=getComputedStyle(document.documentElement),d=o.getPropertyValue("--text-color");return o.getPropertyValue("--text-color-secondary"),o.getPropertyValue("--surface-border"),{maintainAspectRatio:!1,aspectRatio:1,plugins:{labels:{usePointStyle:!0},title:{display:!1,text:"Custom Chart Title"},legend:{display:!1,labels:{fontColor:d}}}}};return(o,d)=>{const b=m("Chart");return u(),h("div",xt,[ft,t("div",bt,[t("div",gt,[c(b,{type:"pie",data:e.value,options:r.value},null,8,["data","options"])]),t("div",vt,[t("div",yt,[t("div",null,[t("button",{class:g(["orange_btn font-semibold text-sm",[a.value===1?"bg-white text-slate-600 border border-black":"text-slate-600"]]),onClick:d[0]||(d[0]=S=>a.value=0)},"Check In ",2),t("button",{class:g(["Enable_btn font-semibold text-sm",[a.value===1?"bg-[#d4d4d4] text-slate-600":"text-slate-600"]]),onClick:d[1]||(d[1]=S=>a.value=1)},"Check Out ",2)]),wt])])])])}}},St={},Dt={class:"p-2 overflow-hidden bg-white rounded-lg border",style:{height:"200px"}},kt=t("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Upcomings",-1),Pt=t("div",{class:"h-full overflow-x-scroll bg-white rounded-lg"},[t("p",{class:"font-medium text-sm text-center"},"No data to display")],-1),Ct=[kt,Pt];function Mt(_,e){return u(),h("div",Dt,Ct)}const At=$(St,[["render",Mt]]),Ot={key:0,class:"bg-white p-2 rounded-lg border"},jt=t("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Shift",-1),Vt={class:"grid grid-cols-6 gap-2 my-2"},Nt=["onClick"],Et={class:"w-full bg-gray-200 p-2 rounded-lg"},Lt={class:"font-semibold text-[12px] text-[#000] font-['Poppins]"},Tt={class:"p-2"},Bt=t("p",{class:"font-semibold text-sm text-[#000] font-['Poppins]"},"Shift Timing",-1),Ut={class:"font-medium text-[12px] text-gray-600 font-['Poppins]"},Wt={class:"my-3"},Yt=t("p",{class:"font-semibold text-sm text-[#000] font-['Poppins]"},"Total Employees",-1),It={class:"font-medium text-[12px] text-gray-600 font-['Poppins]"},zt=M('<div class="flex justify-between"><div><p class="font-semibold text-sm text-[#000] font-[&#39;Poppins]">Present</p><p class="font-medium text-[12px] text-gray-600 font-[&#39;Poppins]">-</p></div><div class="mx-3"><p class="font-semibold text-sm text-[#000] font-[&#39;Poppins]">Absent</p><p class="font-medium text-[12px] text-gray-600 font-[&#39;Poppins]">-</p></div></div>',1),Ft={__name:"Shifts",setup(_){const e=f();function r(a){const[n,i]=a.split(":").map(Number),o=n>=12?"PM":"AM";return`${n%12===0?12:n%12}:${String(i).padStart(2,"0")} ${o}`}return(a,n)=>s(e).attendanceDashboardWorkShiftSource?(u(),h("div",Ot,[jt,t("div",Vt,[(u(!0),h(w,null,C(s(e).attendanceDashboardWorkShiftSource,(i,o)=>(u(),h("div",{class:"bg-gray-100 w-[180px] h-[200px] rounded-lg cursor-pointer",onClick:d=>(s(e).canShowShiftDetails=!0,s(e).currentlySelectedShiftDetails={...i.work_shift_employee_data}),key:o},[t("div",Et,[t("span",Lt,l(i.work_shift_employee_data[0].shift_name),1)]),t("div",Tt,[t("div",null,[Bt,t("p",Ut,l(r(i.work_shift_employee_data[0].shift_start_time))+" - "+l(r(i.work_shift_employee_data[0].shift_end_time)),1)]),t("div",Wt,[Yt,t("p",It,l(i.work_shift_assigned_employees?i.work_shift_assigned_employees:"-"),1)]),zt])],8,Nt))),128))])])):x("",!0)}},Rt={class:"w-full"},Gt=t("p",{class:"mb-2 text-2xl text-black font-semibold"}," Attendance dashboard ",-1),Qt={class:"bg-white p-2 rounded-lg border flex justify-between"},qt={class:"mx-2"},Ht={class:"font-[14px] font-['Poppins'] text-gray-500"},Jt={class:"mb-2 text-sm font-semibold"},Kt=t("div",{class:"flex justify-end gap-5 mx-4"},null,-1),Xt={class:"my-3"},Zt={class:"grid grid-cols-3 gap-6"},te={class:"my-3"},de={__name:"attendanceDashboard",setup(_){const e=f();return y(()=>{e.getAttendanceDashboardMainSource()}),(r,a)=>{const n=m("Column"),i=m("DataTable"),o=m("Dialog");return u(),h(w,null,[s(e).canShowLoading?(u(),A(j,{key:0,class:"absolute z-50 bg-white"})):x("",!0),t("div",Rt,[Gt,t("div",Qt,[t("div",qt,[t("p",Ht,[O(" Daily Analytics - "),t("span",Jt,l(s(D)(new Date).format("MMMM DD,YYYY")),1)])]),Kt]),t("div",Xt,[c(ct)]),t("div",Zt,[t("div",null,[c(mt)]),t("div",null,[c($t)]),t("div",null,[c(At)])]),t("div",te,[c(Ft)])]),c(o,{header:"Shift Details",visible:s(e).canShowShiftDetails,"onUpdate:visible":a[0]||(a[0]=d=>s(e).canShowShiftDetails=d),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"50vw"},modal:!0,closable:!0,closeOnEscape:!0},{default:v(()=>[c(i,{value:s(e).currentlySelectedShiftDetails},{default:v(()=>[c(n,{field:"user_code",header:"User code"}),c(n,{field:"name",header:"Name"}),c(n,{field:"shift_start_time",header:"Shift start time"}),c(n,{field:"shift_end_time",header:"Shift end time"}),c(n,{field:"grace_time",header:"Grace time"})]),_:1},8,["value"])]),_:1},8,["visible"])],64)}}};export{de as _};