/* empty css              *//* empty css                     *//* empty css                   *//* empty css                 */import{V as m,ac as n,o as x,c as v,d as t,t as l,a as L,ad as B,g as A,h as f,n as I,F as T,f as W,am as K,b as Q,l as X,w as N,J as Z,P as q,K as tt,L as et}from"./inputnumber.esm-73df9aee.js";import{d as st,c as ot}from"./pinia-86197d42.js";import{s as nt}from"./sidebar.esm-2066f522.js";import{s as at}from"./chart.esm-15e0ee3c.js";import{a as it}from"./datatable.esm-0b74867b.js";import{D as rt,s as ct}from"./dialogservice.esm-52bcb6fc.js";import{s as dt}from"./row.esm-6ebc942e.js";import{d as lt}from"./dayjs.min-2f06af28.js";import{a as _t,c as pt}from"./index-362795f3.js";import{_ as ut}from"./_plugin-vue_export-helper-c27b6911.js";import{L as ft}from"./LoadingSpinner-badf5592.js";/* empty css                                                                       */const M=st("useAttendanceDashboardMainStore",()=>{const _=m(!1);m();const e=m(),o=m(),c=m(!1),a=m([]),i=m(),r=m(),p=m([]);return{canShowLoading:_,attendanceDashboardWorkShiftSource:o,getAttendanceDashboardMainSource:()=>{_.value=!0;let S="/get-attendance-dashboard";_t.get(S).then($=>{e.value=$.data.attendance_overview,o.value=$.data.work_shift;let O=Object.entries($.data.upcomings).map(D=>({title:D[0],value:D[1]}));r.value=O}).finally(()=>{_.value=!1})},attendanceOverview:e,canShowShiftDetails:c,currentlySelectedShiftDetails:a,currentlySelectedShiftName:i,downloadShiftDetails:p,attendanceDashboardUpcoming:r}}),ht={key:0,class:"grid grid-cols-7 gap-4"},mt={class:"bg-white rounded-lg p-2 border"},xt={class:"px-auto flex justify-center"},vt={class:"text-2xl font-semibold text-center"},gt=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Present",-1),bt={class:"bg-white rounded-lg p-2 border"},yt={class:"px-auto flex justify-center"},St={class:"text-2xl font-semibold text-center"},wt=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Absent",-1),$t={class:"bg-white rounded-lg p-2 border"},Dt={class:"px-auto flex justify-center"},kt={class:"text-2xl font-semibold text-center"},Ct=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Leave",-1),Pt={class:"bg-white rounded-lg p-2 border"},At={class:"px-auto flex justify-center"},Mt={class:"text-2xl font-semibold text-center"},Ot=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Late coming",-1),Et={class:"bg-white rounded-lg p-2 border"},jt={class:"px-auto flex justify-center"},Nt={class:"text-2xl font-semibold text-center"},Lt=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Early going",-1),Tt={class:"bg-white rounded-lg p-2 border"},Rt={class:"px-auto flex justify-center"},Ut={class:"text-2xl font-semibold text-center"},Ft=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Missed in punch",-1),It={class:"bg-white rounded-lg p-2 border"},Vt={class:"px-auto flex justify-center"},Bt={class:"text-2xl font-semibold text-center"},Wt=t("p",{class:"text-sm underline font-semibold text-center text-gray-500"},"Missed out punch",-1),Gt={__name:"attendanceCount",setup(_){const e=M();return(o,c)=>n(e).attendanceOverview?(x(),v("div",ht,[t("div",mt,[t("div",xt,[t("span",vt,l(n(e).attendanceOverview.present_count),1)]),gt]),t("div",bt,[t("div",yt,[t("span",St,l(n(e).attendanceOverview.absent_count),1)]),wt]),t("div",$t,[t("div",Dt,[t("span",kt,l(n(e).attendanceOverview.leave_emp_count),1)]),Ct]),t("div",Pt,[t("div",At,[t("span",Mt,l(n(e).attendanceOverview.lg_count),1)]),Ot]),t("div",Et,[t("div",jt,[t("span",Nt,l(n(e).attendanceOverview.eg_count),1)]),Lt]),t("div",Tt,[t("div",Rt,[t("span",Ut,l(n(e).attendanceOverview.mip_count),1)]),Ft]),t("div",It,[t("div",Vt,[t("span",Bt,l(n(e).attendanceOverview.mop_count),1)]),Wt])])):L("",!0)}},Yt={},zt={class:"p-2 overflow-hidden bg-white rounded-lg border",style:{height:"200px"}},Ht=t("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Exception Analytics",-1),Jt=t("div",{class:"h-full overflow-x-scroll bg-white rounded-lg"},[t("p",{class:"font-medium text-sm text-center"},"No data to display")],-1),Kt=[Ht,Jt];function Qt(_,e){return x(),v("div",zt,Kt)}const Xt=ut(Yt,[["render",Qt]]);const Zt={class:"bg-white rounded-lg p-2 border"},qt=t("p",{class:"font-semibold text-[14px] text-[#000] font-['Poppins] text-center"},"Attendance Analytics",-1),te={class:"grid grid-cols-2 gap-4 my-2.5"},ee={class:"h-full"},se={class:"flex items-center"},oe={class:"my-auto"},ne=t("div",null,null,-1),ae={__name:"attendanceAnalytics",setup(_){B(()=>{e.value=a(),o.value=i()});const e=m(),o=m(),c=m(0),a=()=>{const r=getComputedStyle(document.body);return{labels:["Bio-Metric","Mobile","Web"],datasets:[{data:[1,1,1],backgroundColor:["rgba(122, 94, 162, 1)","rgba(255, 177, 184, 1)","rgba(107, 183, 192, 1)"],hoverBackgroundColor:[r.getPropertyValue("--blue-400"),r.getPropertyValue("--yellow-400"),r.getPropertyValue("--green-400")]}]}},i=()=>{const r=getComputedStyle(document.documentElement),p=r.getPropertyValue("--text-color");return r.getPropertyValue("--text-color-secondary"),r.getPropertyValue("--surface-border"),{maintainAspectRatio:!1,aspectRatio:1,plugins:{labels:{usePointStyle:!0},title:{display:!1,text:"Custom Chart Title"},legend:{display:!1,labels:{fontColor:p}}}}};return(r,p)=>{const w=A("Chart");return x(),v("div",Zt,[qt,t("div",te,[t("div",ee,[f(w,{type:"pie",data:e.value,options:o.value},null,8,["data","options"])]),t("div",se,[t("div",oe,[t("div",null,[t("button",{class:I(["orange_btn font-semibold text-sm",[c.value===1?"bg-white text-slate-600 border border-black":"text-slate-600"]]),onClick:p[0]||(p[0]=S=>c.value=0)},"Check In ",2),t("button",{class:I(["Enable_btn font-semibold text-sm",[c.value===1?"bg-[#d4d4d4] text-slate-600":"text-slate-600"]]),onClick:p[1]||(p[1]=S=>c.value=1)},"Check Out ",2)]),ne])])])])}}},ie={class:"p-2 overflow-hidden bg-white rounded-lg border",style:{height:"200px"}},re=t("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Upcomings",-1),ce={class:"h-full overflow-x-scroll bg-white rounded-lg"},de={class:"px-auto"},le={class:"p-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"},_e={class:"flex px-2 justify-between items-center"},pe={class:"text-[14px] font-semibold"},ue={class:"flex items-center gap-6"},fe={class:"text-xl font-semibold text-black"},he=t("span",null,[t("i",{class:"fa fa-chevron-right","aria-hidden":"true"})],-1),me={key:1,class:"font-medium text-sm text-center"},xe={__name:"Upcomings",setup(_){const e=M();return(o,c)=>(x(),v("div",ie,[re,t("div",ce,[n(e).attendanceDashboardUpcoming?(x(!0),v(T,{key:0},W(n(e).attendanceDashboardUpcoming,a=>(x(),v("div",de,[t("div",le,[t("div",_e,[t("div",null,[t("span",pe,l(a.title),1)]),t("div",ue,[t("span",fe,l(a.value),1),he])])])]))),256)):(x(),v("p",me,"No data to display"))])]))}},ve={key:0,class:"bg-white p-2 rounded-lg border"},ge=t("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Shift",-1),be={class:"grid grid-cols-6 gap-2 my-2"},ye=["onClick"],Se={class:"w-full bg-gray-200 p-2 rounded-lg"},we={class:"font-semibold text-[12px] text-[#000] font-['Poppins]"},$e={class:"p-2"},De=t("p",{class:"font-semibold text-sm text-[#000] font-['Poppins]"},"Shift Timing",-1),ke={class:"font-medium text-[12px] text-gray-600 font-['Poppins]"},Ce={class:"my-3"},Pe=t("p",{class:"font-semibold text-sm text-[#000] font-['Poppins]"},"Total Employees",-1),Ae={class:"font-medium text-[12px] text-gray-600 font-['Poppins]"},Me=K('<div class="flex justify-between"><div><p class="font-semibold text-sm text-[#000] font-[&#39;Poppins]">Present</p><p class="font-medium text-[12px] text-gray-600 font-[&#39;Poppins]">-</p></div><div class="mx-3"><p class="font-semibold text-sm text-[#000] font-[&#39;Poppins]">Absent</p><p class="font-medium text-[12px] text-gray-600 font-[&#39;Poppins]">-</p></div></div>',1),Oe={__name:"Shifts",setup(_){const e=M();function o(c){const[a,i]=c.split(":").map(Number),r=a>=12?"PM":"AM";return`${a%12===0?12:a%12}:${String(i).padStart(2,"0")} ${r}`}return(c,a)=>n(e).attendanceDashboardWorkShiftSource?(x(),v("div",ve,[ge,t("div",be,[(x(!0),v(T,null,W(n(e).attendanceDashboardWorkShiftSource,(i,r)=>(x(),v("div",{class:"bg-gray-100 w-[180px] h-[200px] rounded-lg cursor-pointer",onClick:p=>(n(e).canShowShiftDetails=!0,n(e).currentlySelectedShiftDetails={...i.work_shift_employee_data},n(e).downloadShiftDetails.push({...i.work_shift_employee_data})),key:r},[t("div",Se,[t("span",we,l(i.work_shift_employee_data[0].shift_name),1)]),t("div",$e,[t("div",null,[De,t("p",ke,l(o(i.work_shift_employee_data[0].shift_start_time))+" - "+l(o(i.work_shift_employee_data[0].shift_end_time)),1)]),t("div",Ce,[Pe,t("p",Ae,l(i.work_shift_assigned_employees?i.work_shift_assigned_employees:"-"),1)]),Me])],8,ye))),128))])])):L("",!0)}};var V={},Ee={get exports(){return V},set exports(_){V=_}};(function(_){/*! @source http://purl.eligrey.com/github/FileSaver.js/blob/master/FileSaver.js */var e=e||function(o){if(!(typeof o>"u"||typeof navigator<"u"&&/MSIE [1-9]\./.test(navigator.userAgent))){var c=o.document,a=function(){return o.URL||o.webkitURL||o},i=c.createElementNS("http://www.w3.org/1999/xhtml","a"),r="download"in i,p=function(s){var d=new MouseEvent("click");s.dispatchEvent(d)},w=/constructor/i.test(o.HTMLElement)||o.safari,S=/CriOS\/[\d]+/.test(navigator.userAgent),$=function(s){(o.setImmediate||o.setTimeout)(function(){throw s},0)},O="application/octet-stream",D=1e3*40,R=function(s){var d=function(){typeof s=="string"?a().revokeObjectURL(s):s.remove()};setTimeout(d,D)},G=function(s,d,y){d=[].concat(d);for(var u=d.length;u--;){var k=s["on"+d[u]];if(typeof k=="function")try{k.call(s,y||s)}catch(C){$(C)}}},U=function(s){return/^\s*(?:text\/\S*|application\/xml|\S*\/\S*\+xml)\s*;.*charset\s*=\s*utf-8/i.test(s.type)?new Blob([String.fromCharCode(65279),s],{type:s.type}):s},F=function(s,d,y){y||(s=U(s));var u=this,k=s.type,C=k===O,b,E=function(){G(u,"writestart progress write writeend".split(" "))},z=function(){if((S||C&&w)&&o.FileReader){var P=new FileReader;P.onloadend=function(){var j=S?P.result:P.result.replace(/^data:[^;]*;/,"data:attachment/file;"),J=o.open(j,"_blank");J||(o.location.href=j),j=void 0,u.readyState=u.DONE,E()},P.readAsDataURL(s),u.readyState=u.INIT;return}if(b||(b=a().createObjectURL(s)),C)o.location.href=b;else{var H=o.open(b,"_blank");H||(o.location.href=b)}u.readyState=u.DONE,E(),R(b)};if(u.readyState=u.INIT,r){b=a().createObjectURL(s),setTimeout(function(){i.href=b,i.download=d,p(i),E(),R(b),u.readyState=u.DONE});return}z()},h=F.prototype,Y=function(s,d,y){return new F(s,d||s.name||"download",y)};return typeof navigator<"u"&&navigator.msSaveOrOpenBlob?function(s,d,y){return d=d||s.name||"download",y||(s=U(s)),navigator.msSaveOrOpenBlob(s,d)}:(h.abort=function(){},h.readyState=h.INIT=0,h.WRITING=1,h.DONE=2,h.error=h.onwritestart=h.onprogress=h.onwrite=h.onabort=h.onerror=h.onwriteend=null,Y)}}(typeof self<"u"&&self||typeof window<"u"&&window||pt.content);_.exports&&(_.exports.saveAs=e)})(Ee);const je={class:"w-full"},Ne=t("p",{class:"mb-2 text-2xl text-black font-semibold"}," Attendance dashboard ",-1),Le={class:"bg-white p-2 rounded-lg border flex justify-between"},Te={class:"mx-2"},Re={class:"font-[14px] font-['Poppins'] text-gray-500"},Ue={class:"mb-2 text-sm font-semibold"},Fe=t("div",{class:"flex justify-end gap-5 mx-4"},null,-1),Ie={class:"my-3"},Ve={class:"grid grid-cols-3 gap-6"},Be={class:"my-3"},We={class:"absolute left-0 mx-4 font-semibold fs-5"},Ge={class:"mt-6"},Ye={__name:"attendanceDashboard",setup(_){const e=M();return B(()=>{e.getAttendanceDashboardMainSource()}),(o,c)=>{const a=A("Column"),i=A("DataTable"),r=A("Sidebar");return x(),v(T,null,[n(e).canShowLoading?(x(),Q(ft,{key:0,class:"absolute z-50 bg-white"})):L("",!0),t("div",je,[Ne,t("div",Le,[t("div",Te,[t("p",Re,[X(" Daily Analytics - "),t("span",Ue,l(n(lt)(new Date).format("MMMM DD,YYYY")),1)])]),Fe]),t("div",Ie,[f(Gt)]),t("div",Ve,[t("div",null,[f(Xt)]),t("div",null,[f(ae)]),t("div",null,[f(xe)])]),t("div",Be,[f(Oe)])]),f(r,{visible:n(e).canShowShiftDetails,"onUpdate:visible":c[0]||(c[0]=p=>n(e).canShowShiftDetails=p),position:"right",class:"w-full"},{header:N(()=>[t("p",We,l(n(e).currentlySelectedShiftDetails?n(e).currentlySelectedShiftDetails[0].shift_name:null)+" Reports",1)]),default:N(()=>[t("div",Ge,[f(i,{value:n(e).currentlySelectedShiftDetails?n(e).currentlySelectedShiftDetails:[]},{default:N(()=>[f(a,{field:"user_code",header:"User code"}),f(a,{field:"name",header:"Name"}),f(a,{field:"shift_start_time",header:"Shift start time"}),f(a,{field:"shift_end_time",header:"Shift end time"}),f(a,{field:"grace_time",header:"Grace time"})]),_:1},8,["value"])])]),_:1},8,["visible"])],64)}}},g=Z(Ye),ze=ot();g.use(q,{ripple:!0});g.use(rt);g.use(ze);g.component("Sidebar",nt);g.component("DataTable",it);g.component("Column",tt);g.component("ColumnGroup",ct);g.component("Row",dt);g.component("Chart",at);g.component("Dialog",et);g.mount("#AttendanceDashboard");
