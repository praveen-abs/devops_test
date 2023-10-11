import{Q as g,W as G,ab as L,g as k,o as n,c as r,d as e,F as j,f as Y,t as i,aa as s,k as B,al as W,n as S,l as E,h as l,w as $,am as z,j as J,a as R,b as N,T as I,ac as Q,ad as K}from"./inputnumber.esm-e362c3ab.js";import{S as T}from"./Service-4ef425c0.js";import{u as C}from"./dashboard_service-218ad8e7.js";import{a as O}from"./index-362795f3.js";import{d as D}from"./dayjs.min-2f06af28.js";import{u as X}from"./LeaveApply.vue_vue_type_style_index_0_lang-aa7a596f.js";import{e as Z}from"./exceljs.min-edd65134.js";import{L as ee}from"./LoadingSpinner-235e9bb4.js";import{_ as te}from"./_plugin-vue_export-helper-c27b6911.js";const se="/build/assets/femaleDashboardImage-7f53f6fa.svg";const oe={class:"!h-[180px] w-[100%] overflow-hidden rounded-xl shadow-lg bg-[#DFE8FF] p-3 grid grid-cols-12 gap-4 justify-between leading-normal"},ae={class:"font-[14px] font-['Poppins'] text-gray-500 flex items-center"},ne={class:"text-gray-900 text-[18px] mb-2 font-['Poppins']"},le={class:"flex gap-4 items-center"},ie=e("div",{class:"flex my-1 overflow-visible items-center !z-10"},[e("i",{class:"fa fa-sun-o text-warning my-auto text-[20px]","aria-hidden":"true"}),e("p",{class:"text-[12px] my-auto font-semibold px-2"},"General Shift")],-1),re={class:"btn-status"},ce={class:"text-[12px] text-[#8B8B8B] font-['Poppins'] flex items-center"},de={key:0,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},_e={key:1,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},pe={key:2,class:"w-[300px] max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},ue={key:3,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},he=e("div",{class:"col-span-5 h-full !z-5"},[e("div",{class:"grid justify-center items-centers my-auto h-full border-[1px]"},[e("img",{src:se,alt:"",srcset:"",class:"w-full h-full"})])],-1),me={class:"bg-white modal-content"},fe={class:"p-1 text-center modal-body"},ve={class:"check-in-animate"},ge={class:"mt-2"},be={class:"text-gray-900 text-[18px] mb-2 font-['Poppins']"},xe=e("span",null,"Welcome",-1),ye={key:0,class:"mb-4 text-muted"},we={key:1,class:"mb-4 text-muted"},$e={class:"gap-2 hstack justify-content-center"},ke={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},Ce={class:"bg-white modal-content"},De={class:"p-1 text-center modal-body"},Se={class:"check-in-animate"},Ee={class:"mt-4"},Me={class:"mb-3"},Fe=e("p",{class:"mb-4 text-muted"},"See you tommorrow",-1),Pe={class:"gap-2 hstack justify-content-center"},je={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},Re={__name:"welcome_card",setup(b){const t=T(),c=C(),o=g();g();const d=g([]),_=g(!1),p=g(!1),a=G({date:new Date,check:"",check_in:"",check_out:"",attendance_mode:"web",work_mode:"",checked:!1}),u=()=>{var w=new Date,m=w.getHours();m<12?o.value="Good Morning":m<18?o.value="Good Afternoon":o.value="Good Evening"},v=()=>{d.value.splice(0,d.value.length),a.check==!0?(a.check_in=new Date().toLocaleTimeString(),a.checked=!0,_.value=!0):(a.check_out=new Date().toLocaleTimeString(),p.value=!0,a.checked=!1),c.updateCheckin_out({checked:a.checked}).then(w=>{h.value=w.data.message}).finally(()=>{y(),M()})},h=g(),y=async()=>{let w="/fetchEmpLastAttendanceStatus";await O.get(w).then(m=>{console.log(m.data),d.value.push(m.data),m.data.checkout_time?a.check=!1:m.data.checkin_time?a.check=!0:a.check=null}).finally(()=>{c.canShowTopbar=!0})};L(()=>{u(),y()});const x=w=>(console.log(w),w=="biometric"?"fas fa-fingerprint fs-12":w=="web"?"fa fa-laptop fs-12":w=="mobile"?"fa fa-mobile-phone fs-12":""),M=()=>{c.check="",c.check_in="",c.check_out="",c.work_mode=""};return(w,m)=>{const F=k("lord-icon"),P=k("Dialog");return n(),r(j,null,[e("div",oe,[(n(!0),r(j,null,Y(d.value,f=>(n(),r("div",{class:"col-span-7 mb-8",key:f},[e("p",ae,i(o.value),1),e("div",ne,i(s(t).current_user_name),1),e("div",le,[ie,e("div",re,[B(e("input",{type:"checkbox",name:"checkbox",id:"checkbox",class:"hidden","onUpdate:modelValue":m[0]||(m[0]=A=>a.check=A),onChange:v},null,544),[[W,a.check]]),e("label",{for:"checkbox",class:S(["relative inline-block w-12 h-5 rounded-lg transition duration-300 cursor-pointer",[a.check?" bg-green-100":"bg-red-100"]])},[e("span",{class:S(["absolute inset-0 inline-block w-5 h-5 rounded-full shadow transform transition-transform cursor-pointer",[a.check?"translate-x-6 bg-green-400":"bg-red-400"]])},null,2)],2)])]),e("div",null,[e("p",ce,[E(" Time duration:"),e("span",null,i(f.effective_hours?f.effective_hours:0),1)]),f.checkin_time?(n(),r("p",de,[E(i(`Check-In : ${f.checkin_time} (${s(D)(f.checkin_date).format("MMM D, YYYY")}) `)+" ",1),e("i",{class:S(["mx-2 text-sm font-semibold text-green-800",x(f.attendance_mode_checkin)])},null,2)])):(n(),r("p",_e,i(`Check-In:
                    --:--:--`))),f.checkout_time?(n(),r("p",pe,[E(i(`Check-Out : ${f.checkout_time} (${s(D)(f.checkout_date).format("MMM D, YYYY")}) `)+" ",1),e("i",{class:S(["mx-2 text-sm font-semibold text-green-800",x(f.attendance_mode_checkout)])},null,2)])):(n(),r("p",ue,i(`Check-Out:
                    --:--:--`)))])]))),128)),he]),l(P,{visible:_.value,"onUpdate:visible":m[2]||(m[2]=f=>_.value=f),modal:"",style:{width:"30vw"}},{default:$(()=>[e("div",me,[e("div",fe,[e("div",ve,[l(F,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",class:"gliters",colors:"primary:#1aff1a,secondary:#1aff1a"}),l(F,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#30e849"})]),e("div",ge,[e("div",be,[xe,E(" "+i(s(t).current_user_name),1)]),h.value?(n(),r("p",ye,i(h.value),1)):(n(),r("p",we,"Have a good day !")),e("div",$e,[e("a",ke,[e("button",{onClick:m[1]||(m[1]=f=>_.value=!1),type:"button",class:"btn btn-primary"}," Close ")])])])])])]),_:1},8,["visible"]),l(P,{visible:p.value,"onUpdate:visible":m[4]||(m[4]=f=>p.value=f),modal:"",style:{width:"25vw"}},{default:$(()=>[e("div",Ce,[e("div",De,[e("div",Se,[l(F,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",colors:"primary:#ff3300,secondary:#ff3300",class:"gliters"}),l(F,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#e62e00"})]),e("div",Ee,[e("h4",Me,"Bye "+i(s(t).current_user_name),1),Fe,e("div",Pe,[e("a",je,[e("button",{type:"button",class:"btn btn-primary",onClick:m[3]||(m[3]=f=>p.value=!1)}," Close ")])])])])])]),_:1},8,["visible"])],64)}}},Le={class:"!h-[180px] rounded-[20px] shadow-sm bg-white"},Ae={class:"px-6 py-4"},Ne={class:"font-[14px] font-['Poppins'] text-gray-500"},Te={class:"mb-2 text-xl font-semibold"},Ye={class:"grid grid-cols-3 gap-4 mt-4"},Be={class:"bg-[#F6F6F6] rounded-lg p-3"},Oe={class:"px-auto"},Ve={class:"mb-2 text-3xl font-bold text-center"},Ie=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),Ue=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Present",-1),qe={class:"p-3 bg-gray-100 rounded-lg"},He={class:"mb-2 text-3xl font-bold"},Ge=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),We=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Leave",-1),ze={class:"p-3 bg-gray-100 rounded-lg"},Je={class:"mb-2 text-3xl font-bold"},Qe=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),Ke=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Absent",-1),Xe={__name:"leave_details",setup(b){const t=C();return L(()=>{}),(c,o)=>(n(),r("div",Le,[e("div",Ae,[e("p",Ne,[E(" Current month - "),e("span",Te,i(s(D)(new Date).format("MMMM")),1)]),e("div",Ye,[e("div",Be,[e("div",Oe,[e("span",Ve,i(s(t).attenanceReportPerMonth.present),1),Ie]),Ue]),e("div",qe,[e("span",He,i(s(t).attenanceReportPerMonth.not_applied),1),Ge,We]),e("div",ze,[e("span",Je,i(s(t).attenanceReportPerMonth.absent),1),Qe,Ke])])])]))}};const Ze={class:"bg-white min-h-min rounded-lg overflow-hidden"},et=z('<div class="flex items-center justify-between p-3 mb-3 bg-gray-100 card-title" id=""><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins]">Activity Log</span></div><div class="h-full overflow-x-scroll"><div class="hover:bg-slate-100 divide-y-2 divide-gray-400"><p class="font-medium text-sm text-center">No activity log to display</p></div></div>',2),tt=[et],U={__name:"notification",setup(b){return C(),(t,c)=>(n(),r("div",Ze,tt))}};const st={class:"p-2 overflow-hidden bg-white rounded-lg",style:{height:"200px"}},ot=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Leave Balance",-1),at={class:"h-full overflow-x-scroll bg-white rounded-lg"},nt={class:"px-auto"},lt={class:"flex px-2"},it={class:""},rt={class:"text-3xl font-semibold text-black"},ct=e("span",{class:""},"/",-1),dt={class:""},_t={class:"px-3"},pt={class:"font-semibold text-primary text-[14px] align-bottom py-2"},ut={__name:"leave_balance",setup(b){const t=C();return X(),(c,o)=>(n(),r("div",st,[ot,e("div",at,[e("div",nt,[(n(!0),r(j,null,Y(s(t).leaveBalancePerMonthSource,d=>(n(),r("a",{href:"attendance-leave",key:d.leave_type,class:"p-2 block mx-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"},[e("div",lt,[e("div",it,[e("span",rt,i(d.leave_balance),1),ct,e("span",dt,i(d.availed_leaves),1)]),e("div",_t,[e("p",pt,i(d.leave_type),1)])])]))),128))])])]))}};const ht={class:"bg-[#FFEFE2] rounded-lg overflow-hidden p-3",style:{height:"200px"}},mt={class:"flex justify-between"},ft=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Calendar",-1),vt=e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"},null,-1),gt=[vt],bt={class:"flex justify-center items-center w-[100%]"},xt=e("i",{class:"pi pi-times"},null,-1),yt=[xt],wt={class:"py-8"},$t={class:"text-[#d1814c] font-semibold text-[36px] mb-2 font-['Petrona']",style:{}},kt={class:"mb-2 font-semibold text-gray-900 text-[16px]"},Ct={__name:"calender",setup(b){const t=g(!1);return(c,o)=>{const d=k("Calendar"),_=k("Dialog");return n(),r("div",ht,[e("div",mt,[ft,(n(),r("svg",{xmlns:"http://www.w3.org/2000/svg",onClick:o[0]||(o[0]=p=>t.value=!0),fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-[20px] h-[20px] text-gray-900 cursor-pointer"},gt))]),l(_,{visible:t.value,"onUpdate:visible":o[3]||(o[3]=p=>t.value=p),modal:"",header:"Calendar",style:{width:"30vw"}},{default:$(()=>[e("div",bt,[l(d,{modelValue:c.date,"onUpdate:modelValue":o[1]||(o[1]=p=>c.date=p),inline:""},null,8,["modelValue"])]),e("button",{onClick:o[2]||(o[2]=p=>t.value=!1),class:"absolute top-4 right-4"},yt)]),_:1},8,["visible"]),e("div",wt,[e("p",$t,i(s(D)(new Date).format("D, MMMM YYYY")),1),e("p",kt,i(s(D)(new Date).format("dddd")),1)])])}}};const Dt=["src","alt"],St={__name:"holiday_widget",setup(b){const t=g(),c=g(),o=g(),d=g(!1),_=()=>{O.get("/holiday/master-page").then(p=>{console.log(p.data),c.value=p.data;let a=!0;p.data.forEach((u,v)=>{a&&new Date(u.holiday_date)>=new Date&&(t.value=v,a=!1)}),o.value=c.value[0].image})};return L(()=>{_()}),(p,a)=>{const u=k("Galleria"),v=k("Column"),h=k("DataTable"),y=k("Sidebar");return n(),r(j,null,[l(u,{value:c.value,responsiveOptions:p.responsiveOptions,numVisible:5,circular:!0,containerStyle:"",class:"!h-[180px] !rounded-[20px] overflow-hidden",showItemNavigators:!0,showThumbnails:!1},{item:$(x=>[e("img",{src:`data:image/png;base64,${x.item.image}`,class:"mt-3 mb-2 !rounded-[20px] shadow-sm !h-[180px]",style:{width:"100%","margin-bottom":"10px",position:"relative",right:"0",bottom:"10px",display:"block"},alt:x.item.holiday_name},null,8,Dt),e("button",{class:"text-[#fff] absolute right-4 top-2 px-3 text-['poppins'] rounded-lg p-1 bg-[#00000067]",onClick:a[0]||(a[0]=M=>d.value=!0)},"View List")]),_:1},8,["value","responsiveOptions"]),l(y,{visible:d.value,"onUpdate:visible":a[1]||(a[1]=x=>d.value=x),position:"right"},{default:$(()=>[l(h,{value:c.value,tableStyle:"min-width: 50rem"},{default:$(()=>[l(v,{field:"holiday_name",header:"Holiday Name"}),l(v,{field:"holiday_date",header:"Holiday Date"},{body:$(x=>[E(i(s(D)(x.data.holiday_date).format("DD-MMM-YYYY"))+" "+i(s(D)(x.data.holiday_date).format("ddd"))+" ",1)]),_:1}),l(v,{field:"holiday_description",header:"Holiday Description "})]),_:1},8,["value"])]),_:1},8,["visible"])],64)}}};const Et={class:"bg-white rounded-lg p-2"},Mt=e("span",{class:"text-primary font-semibold fs-6"},"Events",-1),Ft={class:"min-h-min overflow-x-scroll h-[200px]"},Pt={class:"grid grid-cols-4 gap-4"},jt={class:"font-semibold text-center text-white my-2 text-[12px] font-['Poppins']"},Rt={class:"absolute top-8 w-full z-10"},Lt={class:"grid grid-cols-2 w-11/12 bg-slate-100 mx-auto rounded-lg h-full"},At={class:"w-[100%] relative h-[90px]"},Nt={class:"font-semibold text-4xl py-4 text-center align-middle text-white"},Tt=["src"],Yt={class:"h-full"},Bt={class:"py-6"},Ot={key:0,class:"font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto"},Vt={key:1,class:"font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto"},It={class:"font-semibold text-sm text-center text-gray-600 my-auto"},Ut={class:"text-xs absolute right-6 fa fa-commenting-o text-right cursor-pointer","data-bs-target":"#wishes_popup","data-bs-toggle":"modal"},qt=e("div",{class:"flex justify-center my-2"},null,-1),Ht=e("div",{id:"wishes_popup",class:"modal fade",role:"dialog"},[e("div",{class:"modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md"},[e("div",{class:"modal-content"},[e("div",{class:"py-2 border-0 modal-header"},[e("h6",{class:"modal-title"}," Wishes Text"),e("button",{type:"button",class:"bg-transparent border-0 outline-none close h3","data-bs-dismiss":"modal","aria-label":"Close"},[e("span",{"aria-hidden":"true"},"×")])]),e("div",{class:"modal-body"},[e("p",{for:"",class:"text-muted f-14 fw-bold"},"Commants here"),e("textarea",{name:"",id:"",cols:"",placeholder:"Commants here....",rows:"2",class:"resize-none form-control"}),e("div",{class:"text-end"},[e("button",{class:"mt-2 btn btn-border-orange",id:""},[e("i",{class:"fa fa-paper-plane me","aria-hidden":"true"}),E(" Send")])])])])])],-1),q={__name:"events",setup(b){T();const t=C(),c=["bg-emerald-600","bg-yellow-600","bg-rose-600","bg-cyan-600","bg-amber-600","bg-red-600","bg-pink-600","bg-green-600","bg-fuchsia-600"],o=["bg-emerald-200","bg-yellow-200","bg-rose-200","bg-cyan-200","bg-amber-200","bg-red-200","bg-pink-200","bg-green-200","bg-fuchsia-200"],d=a=>c[a%c.length],_=a=>o[a%c.length],p=a=>{if(a=="birthday")return"Happy birthday";if(a=="work_anniversery")return"Work anniversary"};return(a,u)=>{const v=J("tooltip");return n(),r(j,null,[e("div",Et,[Mt,e("div",Ft,[e("div",Pt,[(n(!0),r(j,null,Y(s(t).allEventSource,(h,y)=>(n(),r("div",{class:"relative w-[180px] rounded-lg my-2",key:y},[e("div",{class:S(["h-[80px] rounded-lg",`${d(y)}`])},[e("p",jt,i(p(h.type)),1)],2),e("div",Rt,[e("div",Lt,[e("div",At,[JSON.parse(h.avatar).type=="shortname"?(n(),r("div",{key:0,class:S([_(y),"h-full rounded-lg"])},[e("p",Nt,i(JSON.parse(h.avatar).data),1)],2)):(n(),r("img",{key:1,src:`data:image/png;base64,${JSON.parse(h.avatar).data}`,alt:"",class:"rounded-lg absolute w-[100%] h-[100%] top-0"},null,8,Tt))]),e("div",Yt,[e("div",Bt,[h.name.length<=8?(n(),r("p",Ot,i(h.name),1)):B((n(),r("p",Vt,[E(i(h.name?h.name.substring(0,8)+"..":""),1)])),[[v,h.name]]),e("p",It,i(s(D)(h.dob).format("DD"))+"th "+i(s(D)(h.dob).format("MMM")),1),e("p",null,[B(e("i",Ut,null,512),[[v,"wish"]])])])])]),qt])]))),128))])])]),Ht],64)}}};const Gt={class:"grid grid-cols-12 gap-4"},Wt={class:"col-span-5 w-[100%] !rounded-[20px] overflow-hidden"},zt={class:"col-span-4 w-[100%] !rounded-[20px]"},Jt={class:"col-span-3 w-[100%] !rounded-[20px]"},Qt={class:"grid grid-cols-12 gap-4 pb-7"},Kt={class:"col-span-8 !rounded-[20px]"},Xt={class:"grid grid-cols-2 gap-4 my-2"},Zt={class:"!rounded-[20px] overflow-hidden"},es={class:"!rounded-[20px] overflow-hidden"},ts={class:"grid grid-cols-1"},ss={class:"col-span-4 my-2"},os={__name:"employee_dashboard",setup(b){const t=C();return(c,o)=>(n(),r("div",{class:"h-screen p-3 overflow-auto",onMousemove:o[0]||(o[0]=d=>s(t).canShowConfiguration=!1)},[e("div",Gt,[e("div",Wt,[l(Re)]),e("div",zt,[l(Xe)]),e("div",Jt,[l(St)])]),e("div",Qt,[e("div",Kt,[e("div",Xt,[e("div",Zt,[l(ut)]),e("div",es,[l(Ct)])]),e("div",ts,[e("div",null,[l(q)])])]),e("div",ss,[l(U)])])],32))}},as={key:0,class:"w-full"},ns={class:"font-[14px] font-['Poppins'] text-gray-500"},ls={class:"mb-2 text-xl font-semibold"},is={class:"grid grid-cols-4 gap-3 my-2"},rs={class:"px-auto flex justify-center"},cs={class:"text-3xl font-semibold text-center"},ds=e("p",{class:"text-lg font-semibold text-center text-gray-500"},"Total Employees",-1),_s={class:"px-auto flex justify-center"},ps={class:"text-3xl font-semibold text-center"},us=e("p",{class:"text-lg font-semibold text-center text-gray-500"},"New Employees",-1),hs={class:"px-auto flex justify-center"},ms={class:"text-3xl font-semibold text-center"},fs=e("p",{class:"text-lg font-semibold text-center text-gray-500"},"Exit Employees",-1),vs={class:"px-auto flex justify-center"},gs={class:"text-3xl font-semibold text-center"},bs=e("p",{class:"text-lg font-semibold text-center text-gray-500"},"Yet to Active Employees ",-1),xs={__name:"org_employee_details",setup(b){const t=C();return(c,o)=>s(t).orgEmployeeDetailCount?(n(),r("div",as,[e("p",ns,[E(" Current month - "),e("span",ls,i(s(D)(new Date).format("MMMM")),1)]),e("div",is,[e("div",{class:"bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer",onClick:o[0]||(o[0]=d=>(s(t).canShowSidebar=!0,s(t).ShowEmployeeStatuswise={...s(t).orgEmployeeDetailCount.total_employees},s(t).reportName=`total_employee_reports_${new Date}`))},[e("div",rs,[e("span",cs,i(s(t).orgEmployeeDetailCount.total_employee_count?s(t).orgEmployeeDetailCount.total_employee_count:0),1)]),ds]),e("div",{class:"bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer",onClick:o[1]||(o[1]=d=>(s(t).canShowSidebar=!0,s(t).ShowEmployeeStatuswise={...s(t).orgEmployeeDetailCount.new_employees},s(t).reportName=`new_employee_reports_${new Date}`))},[e("div",_s,[e("span",ps,i(s(t).orgEmployeeDetailCount.new_employee_count?s(t).orgEmployeeDetailCount.new_employee_count:0),1)]),us]),e("div",{class:"bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer",onClick:o[2]||(o[2]=d=>(s(t).canShowSidebar=!0,s(t).ShowEmployeeStatuswise={...s(t).orgEmployeeDetailCount.exit_employees},s(t).reportName=`active_employee_reports_${new Date}`))},[e("div",hs,[e("span",ms,i(s(t).orgEmployeeDetailCount.exit_employee_count?s(t).orgEmployeeDetailCount.exit_employee_count:0),1)]),fs]),e("div",{class:"bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer",onClick:o[3]||(o[3]=d=>(s(t).canShowSidebar=!0,s(t).ShowEmployeeStatuswise={...s(t).orgEmployeeDetailCount.yet_to_active_employees},s(t).reportName=`yet_to_active_employee_reports_${new Date}`))},[e("div",vs,[e("span",gs,i(s(t).orgEmployeeDetailCount.yet_to_active_employee_count?s(t).orgEmployeeDetailCount.yet_to_active_employee_count:0),1)]),bs])])])):R("",!0)}},ys={class:"p-2 overflow-hidden bg-white rounded-lg",style:{height:"200px"}},ws=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Analytics",-1),$s=e("div",{class:"h-full overflow-x-scroll bg-white rounded-lg"},[e("p",{class:"font-medium text-sm text-center"},"No data to display")],-1),ks=[ws,$s],Cs={__name:"Analytics",setup(b){return C(),(t,c)=>(n(),r("div",ys,ks))}},Ds={class:"p-2 overflow-hidden bg-white rounded-lg",style:{height:"200px"}},Ss=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Pending Requests",-1),Es={class:"h-full overflow-x-scroll bg-white rounded-lg"},Ms=["href"],Fs={class:"p-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"},Ps={class:"flex px-2 justify-between items-center"},js={class:"text-[14px] font-semibold"},Rs={class:"flex items-center gap-6"},Ls={class:"text-xl font-semibold text-black"},As=e("span",null,[e("i",{class:"fa fa-chevron-right","aria-hidden":"true"})],-1),Ns={__name:"leave_request",setup(b){const t=C(),c=o=>{if(o=="Leave Requests")return"attendance-leave-approvals";if(o=="Document Approvals")return"approvals-documents";if(o=="Attendance Regularization")return"attendance-regularization-approvals"};return(o,d)=>(n(),r("div",Ds,[Ss,e("div",Es,[s(t).hrPendingRequestCount?(n(!0),r(j,{key:0},Y(s(t).hrPendingRequestCount,_=>(n(),r("a",{class:"px-auto",href:c(_.title)},[e("div",Fs,[e("div",Ps,[e("div",null,[e("span",js,i(_.title),1)]),e("div",Rs,[e("span",Ls,i(_.value),1),As])])])],8,Ms))),256)):R("",!0)])]))}},Ts={__name:"overall_employee",setup(b){const t=C();L(()=>{o.value=d(),setTimeout(()=>{console.log(t.overallEmployeeCountForGraph),c.value.datasets[0].data=t.overallEmployeeCountForGraph},3e3)});const c=g({labels:["Male","Female","Others","App Check-Ins","Active Apps","Inactive Apps"],datasets:[{backgroundColor:["rgba(8, 115, 205, 1)","rgba(205, 159, 71, 1)","rgba(255, 205, 86, 0.2)","rgba(80, 64, 34, 1)","rgba(113, 74, 161, 1)","rgba(181, 86, 151, 1)"],borderWidth:10,borderColor:"white",data:[0,0,0,0,0,0]}]}),o=g();g();const d=()=>{const _=getComputedStyle(document.documentElement),p=_.getPropertyValue("--text-color"),a=_.getPropertyValue("--text-color-secondary");return _.getPropertyValue("--surface-border"),{maintainAspectRatio:!1,aspectRatio:100,plugins:{title:{display:!1,text:"Custom Chart Title"},legend:{display:!1,labels:{fontColor:p}}},scales:{x:{ticks:{autoSkip:!1,maxRotation:0,minRotation:0,textAlign:"center",padding:10,color:a,font:{weight:600}},grid:{display:!1,drawBorder:!1}},y:{display:!1,ticks:{color:a},grid:{color:!1,drawBorder:!1}}}}};return(_,p)=>{const a=k("Chart");return s(t).overallEmployeeCountForGraph?(n(),N(a,{key:0,type:"bar",data:c.value,options:o.value,class:"h-full"},null,8,["data","options"])):R("",!0)}}};const Ys={class:"h-screen p-3 overflow-auto"},Bs={class:"grid grid-cols-12 gap-4"},Os={class:"col-span-8"},Vs={class:"col-span-12 w-[100%] !rounded-[20px] bg-white p-2"},Is={class:"col-span-12 !rounded-[20px]"},Us={class:"grid grid-cols-12 gap-4 my-2"},qs={class:"!rounded-[20px] overflow-hidden col-span-5"},Hs={class:"!rounded-[20px] overflow-hidden bg-white col-span-7"},Gs={class:"col-span-12"},Ws={class:"col-span-4 w-[100%] !rounded-[20px]"},zs={class:"py-3"},Js={__name:"hr_dashboard",setup(b){return C(),g(0),(t,c)=>(n(),r("div",Ys,[e("div",Bs,[e("div",Os,[e("div",Vs,[l(xs)]),e("div",Is,[e("div",Us,[e("div",qs,[l(Ns)]),e("div",Hs,[l(Ts)])])]),e("div",Gs,[l(q)])]),e("div",Ws,[e("div",null,[l(Cs)]),e("div",zs,[l(U)])])])]))}};const V=b=>(Q("data-v-ebaec8e7"),b=b(),K(),b),Qs={key:0,class:"col"},Ks=V(()=>e("p",{class:"absolute left-0 mx-4 font-semibold fs-5"}," Reports",-1)),Xs={class:"relative right-0 mx-4 font-semibold fs-5"},Zs=V(()=>e("p",{class:"relative left-2 font-['poppins']"},"Download",-1)),eo=V(()=>e("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16"},[e("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check"}),e("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"}),e("path",{d:"M8,1 L8,11",class:"svg-out"})],-1)),to=[eo],so={key:0,class:"mt-6"},oo={__name:"dashboard",setup(b){const t=C(),c=g(),o=T();L(async()=>{await O.get("/clear_cache").then(a=>{console.log(a.data)}),c.value=!0,await t.getMainDashboardData(),t.getHrDashboardMainSource(),T(),c.value=!1});const d=async()=>{const a=new Z.Workbook,u=a.addWorksheet("Sheet1"),v=["user_code","name","department","process","location"],h="this report generated by ABShrms payroll software ",y=v;u.addRow(y).eachCell((P,f)=>{P.fill={type:"pattern",pattern:"solid",fgColor:{argb:"252f70"}},P.font={bold:!0,color:{argb:"ffffff"}},u.getColumn(f).width=20}),Object.values(t.ShowEmployeeStatuswise).forEach((P,f)=>{console.log(P);const A=[];y.forEach(H=>{A.push(P[H])}),u.addRow(A)}),u.addRow([""]);const M=u.addRow([""]);M.getCell(1).value=h,u.mergeCells(M.number,1,M.number,3),M.getCell(1).alignment={wrapText:!0},M.getCell(1).font={italic:!0};const w=await a.xlsx.writeBuffer(),m=window.URL.createObjectURL(new Blob([w])),F=document.createElement("a");F.href=m,F.download=`${t.reportName}.xlsx`,F.click(),window.URL.revokeObjectURL(m)},_=g(!1),p=g("downloaded");return(a,u)=>{const v=k("Column"),h=k("DataTable"),y=k("Sidebar");return n(),r(j,null,[s(o).current_user_role==1||s(o).current_user_role==2||s(o).current_user_role==3?(n(),r("div",Qs,[e("button",{class:S(["font-semibold text-sm p-1.5 rounded-l-lg",[s(t).currentDashboard===0?"bg-green-200 text-black border border-black":"bg-white text-slate-700 border border-black"]]),onClick:u[0]||(u[0]=x=>s(t).currentDashboard=0)},"Self-dashboard",2),e("button",{class:S(["font-semibold text-sm p-1.5 rounded-r-lg",[s(t).currentDashboard===1?"bg-green-200 text-black border border-black":"bg-white text-slate-700 border border-black"]]),onClick:u[1]||(u[1]=x=>s(t).currentDashboard=1)},"Org-dashboard",2)])):R("",!0),s(t).canShowLoading?(n(),N(ee,{key:1})):s(t).currentDashboard==1?(n(),N(I,{key:2,"enter-active-class":"transition ease-out transform duration-600","enter-class":"translate-y-2 opacity-0","enter-to-class":"translate-y-0 opacity-100","leave-active-class":"transition duration-100 ease-in transform","leave-class":"translate-y-0 opacity-100","leave-to-class":"translate-y-2 opacity-0"},{default:$(()=>[l(Js)]),_:1})):(n(),N(I,{key:3,"enter-active-class":"transition ease-out transform duration-600","enter-class":"translate-y-2 opacity-0","enter-to-class":"translate-y-0 opacity-100","leave-active-class":"transition duration-100 ease-in transform","leave-class":"translate-y-0 opacity-100","leave-to-class":"translate-y-2 opacity-0"},{default:$(()=>[l(os)]),_:1})),l(y,{visible:s(t).canShowSidebar,"onUpdate:visible":u[3]||(u[3]=x=>s(t).canShowSidebar=x),position:"right",class:"w-full"},{header:$(()=>[Ks,e("div",Xs,[e("button",{class:"bg-[#E6E6E6] p-2 mx-2 rounded-md w-[120px]",onClick:u[2]||(u[2]=x=>(_.value=!_.value,d()))},[Zs,e("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:S([_.value==!0?p.value:" "])},to,2)])])]),default:$(()=>[s(t).ShowEmployeeStatuswise?(n(),r("div",so,[l(h,{value:s(t).ShowEmployeeStatuswise?s(t).ShowEmployeeStatuswise:[]},{default:$(()=>[l(v,{field:"user_code",header:"User code"}),l(v,{field:"name",header:"Name",style:{"text-align":"left !important","white-space":"no !important"}}),l(v,{field:"department_name",header:"Department",style:{"text-align":"left !important","white-space":"no !important"}}),l(v,{field:"process",header:"Process",style:{"text-align":"left !important","white-space":"no !important"}}),l(v,{field:"location",header:"Work location",style:{"text-align":"left !important","white-space":"no !important"}})]),_:1},8,["value"])])):R("",!0)]),_:1},8,["visible"])],64)}}},ho=te(oo,[["__scopeId","data-v-ebaec8e7"]]);export{ho as D};
