import{H as g,W as H,ab as A,g as P,o,c as r,d as e,F as j,f as B,t as l,aa as s,k as O,al as W,n as $,l as E,h as c,w as S,am as z,b as R,j as J,a as L,T as Y,ac as K,ad as Q}from"./inputnumber.esm-3276ace1.js";import{S as T}from"./Service-8807663f.js";import{u as y}from"./dashboard_service-a8556b49.js";import{a as q}from"./index-362795f3.js";import{d as M}from"./dayjs.min-2f06af28.js";import{u as X}from"./LeaveApply.vue_vue_type_style_index_0_lang-074eef40.js";import{e as Z}from"./exceljs.min-edd65134.js";import{L as ee}from"./LoadingSpinner-89e164da.js";import{_ as te}from"./_plugin-vue_export-helper-c27b6911.js";const se="/build/assets/femaleDashboardImage-7f53f6fa.svg";const oe={class:"!h-[180px] w-[100%] overflow-hidden rounded-xl shadow-lg bg-[#DFE8FF] p-3 grid grid-cols-12 gap-4 justify-between leading-normal"},ae={class:"font-[14px] font-['Poppins'] text-gray-500 flex items-center"},ne={class:"text-gray-900 text-[18px] mb-2 font-['Poppins']"},le={class:"flex gap-4 items-center"},re=e("div",{class:"flex my-1 overflow-visible items-center !z-10"},[e("i",{class:"fa fa-sun-o text-warning my-auto text-[20px]","aria-hidden":"true"}),e("p",{class:"text-[12px] my-auto font-semibold px-2"},"General Shift")],-1),ie={class:"btn-status"},ce={class:"text-[12px] text-[#8B8B8B] font-['Poppins'] flex items-center"},de={key:0,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},_e={key:1,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},pe={key:2,class:"w-[300px] max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},ue={key:3,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},he=e("div",{class:"col-span-5 h-full !z-5"},[e("div",{class:"grid justify-center items-centers my-auto h-full border-[1px]"},[e("img",{src:se,alt:"",srcset:"",class:"w-full h-full"})])],-1),me={class:"bg-white modal-content"},fe={class:"p-1 text-center modal-body"},ge={class:"check-in-animate"},ve={class:"mt-2"},xe={class:"text-gray-900 text-[18px] mb-2 font-['Poppins']"},be=e("span",null,"Welcome",-1),ye={key:0,class:"mb-4 text-muted"},we={key:1,class:"mb-4 text-muted"},$e={class:"gap-2 hstack justify-content-center"},ke={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},Ce={class:"bg-white modal-content"},De={class:"p-1 text-center modal-body"},Se={class:"check-in-animate"},Ee={class:"mt-4"},Me={class:"mb-3"},Fe=e("p",{class:"mb-4 text-muted"},"See you tommorrow",-1),Pe={class:"gap-2 hstack justify-content-center"},je={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},Re={__name:"welcome_card",setup(f){const t=T(),i=y(),a=g();g();const _=g([]),d=g(!1),v=g(!1),n=H({date:new Date,check:"",check_in:"",check_out:"",attendance_mode:"web",work_mode:"",checked:!1}),p=()=>{var x=new Date,u=x.getHours();u<12?a.value="Good Morning":u<18?a.value="Good Afternoon":a.value="Good Evening"},b=()=>{_.value.splice(0,_.value.length),n.check==!0?(n.check_in=new Date().toLocaleTimeString(),n.checked=!0,d.value=!0):(n.check_out=new Date().toLocaleTimeString(),v.value=!0,n.checked=!1),i.updateCheckin_out({checked:n.checked}).then(x=>{m.value=x.data.message}).finally(()=>{w(),F()})},m=g(),w=async()=>{let x="/fetchEmpLastAttendanceStatus";await q.get(x).then(u=>{console.log(u.data),_.value.push(u.data),u.data.checkout_time?n.check=!1:u.data.checkin_time?n.check=!0:n.check=null}).finally(()=>{i.canShowTopbar=!0})};A(()=>{p(),w()});const k=x=>(console.log(x),x=="biometric"?"fas fa-fingerprint fs-12":x=="web"?"fa fa-laptop fs-12":x=="mobile"?"fa fa-mobile-phone fs-12":""),F=()=>{i.check="",i.check_in="",i.check_out="",i.work_mode=""};return(x,u)=>{const C=P("lord-icon"),D=P("Dialog");return o(),r(j,null,[e("div",oe,[(o(!0),r(j,null,B(_.value,h=>(o(),r("div",{class:"col-span-7 mb-8",key:h},[e("p",ae,l(a.value),1),e("div",ne,l(s(t).current_user_name),1),e("div",le,[re,e("div",ie,[O(e("input",{type:"checkbox",name:"checkbox",id:"checkbox",class:"hidden","onUpdate:modelValue":u[0]||(u[0]=N=>n.check=N),onChange:b},null,544),[[W,n.check]]),e("label",{for:"checkbox",class:$(["relative inline-block w-12 h-5 rounded-lg transition duration-300 cursor-pointer",[n.check?" bg-green-100":"bg-red-100"]])},[e("span",{class:$(["absolute inset-0 inline-block w-5 h-5 rounded-full shadow transform transition-transform cursor-pointer",[n.check?"translate-x-6 bg-green-400":"bg-red-400"]])},null,2)],2)])]),e("div",null,[e("p",ce,[E(" Time duration:"),e("span",null,l(h.effective_hours?h.effective_hours:0),1)]),h.checkin_time?(o(),r("p",de,[E(l(`Check-In : ${h.checkin_time} (${s(M)(h.checkin_date).format("MMM D, YYYY")}) `)+" ",1),e("i",{class:$(["mx-2 text-sm font-semibold text-green-800",k(h.attendance_mode_checkin)])},null,2)])):(o(),r("p",_e,l(`Check-In:
                    --:--:--`))),h.checkout_time?(o(),r("p",pe,[E(l(`Check-Out : ${h.checkout_time} (${s(M)(h.checkout_date).format("MMM D, YYYY")}) `)+" ",1),e("i",{class:$(["mx-2 text-sm font-semibold text-green-800",k(h.attendance_mode_checkout)])},null,2)])):(o(),r("p",ue,l(`Check-Out:
                    --:--:--`)))])]))),128)),he]),c(D,{visible:d.value,"onUpdate:visible":u[2]||(u[2]=h=>d.value=h),modal:"",style:{width:"30vw"}},{default:S(()=>[e("div",me,[e("div",fe,[e("div",ge,[c(C,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",class:"gliters",colors:"primary:#1aff1a,secondary:#1aff1a"}),c(C,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#30e849"})]),e("div",ve,[e("div",xe,[be,E(" "+l(s(t).current_user_name),1)]),m.value?(o(),r("p",ye,l(m.value),1)):(o(),r("p",we,"Have a good day !")),e("div",$e,[e("a",ke,[e("button",{onClick:u[1]||(u[1]=h=>d.value=!1),type:"button",class:"btn btn-primary"}," Close ")])])])])])]),_:1},8,["visible"]),c(D,{visible:v.value,"onUpdate:visible":u[4]||(u[4]=h=>v.value=h),modal:"",style:{width:"25vw"}},{default:S(()=>[e("div",Ce,[e("div",De,[e("div",Se,[c(C,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",colors:"primary:#ff3300,secondary:#ff3300",class:"gliters"}),c(C,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#e62e00"})]),e("div",Ee,[e("h4",Me,"Bye "+l(s(t).current_user_name),1),Fe,e("div",Pe,[e("a",je,[e("button",{type:"button",class:"btn btn-primary",onClick:u[3]||(u[3]=h=>v.value=!1)}," Close ")])])])])])]),_:1},8,["visible"])],64)}}},Le={class:"!h-[180px] rounded-[20px] shadow-sm bg-white"},Ae={class:"px-6 py-4"},Ne={class:"font-[14px] font-['Poppins'] text-gray-500"},Te={class:"mb-2 text-xl font-semibold"},Be={class:"grid grid-cols-3 gap-4 mt-4"},Oe={class:"bg-[#F6F6F6] rounded-lg p-3"},Ie={class:"px-auto"},Ye={class:"mb-2 text-3xl font-bold text-center"},qe=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),Ve=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Present",-1),Ue={class:"p-3 bg-gray-100 rounded-lg"},Ge={class:"mb-2 text-3xl font-bold"},He=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),We=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Leave",-1),ze={class:"p-3 bg-gray-100 rounded-lg"},Je={class:"mb-2 text-3xl font-bold"},Ke=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),Qe=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Absent",-1),Xe={__name:"leave_details",setup(f){const t=y();return A(()=>{}),(i,a)=>(o(),r("div",Le,[e("div",Ae,[e("p",Ne,[E(" Current month - "),e("span",Te,l(s(M)(new Date).format("MMMM")),1)]),e("div",Be,[e("div",Oe,[e("div",Ie,[e("span",Ye,l(s(t).attenanceReportPerMonth.present),1),qe]),Ve]),e("div",Ue,[e("span",Ge,l(s(t).attenanceReportPerMonth.not_applied),1),He,We]),e("div",ze,[e("span",Je,l(s(t).attenanceReportPerMonth.absent),1),Ke,Qe])])])]))}};const Ze={class:"bg-white min-h-min rounded-lg overflow-hidden"},et=z('<div class="flex items-center justify-between p-3 mb-3 bg-gray-100 card-title" id=""><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins]">Activity Log</span></div><div class="h-full overflow-x-scroll"><div class="hover:bg-slate-100 divide-y-2 divide-gray-400"><p class="font-medium text-sm text-center">No activity log to display</p></div></div>',2),tt=[et],V={__name:"notification",setup(f){return y(),(t,i)=>(o(),r("div",Ze,tt))}};const st={class:"p-2 overflow-hidden bg-white rounded-lg",style:{height:"200px"}},ot=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Leave Balance",-1),at={class:"h-full overflow-x-scroll bg-white rounded-lg"},nt={class:"px-auto"},lt={class:"flex px-2"},rt={class:""},it={class:"text-3xl font-semibold text-black"},ct=e("span",{class:""},"/",-1),dt={class:""},_t={class:"px-3"},pt={class:"font-semibold text-primary text-[14px] align-bottom py-2"},ut={__name:"leave_balance",setup(f){const t=y();return X(),(i,a)=>(o(),r("div",st,[ot,e("div",at,[e("div",nt,[(o(!0),r(j,null,B(s(t).leaveBalancePerMonthSource,_=>(o(),r("a",{href:"attendance-leave",key:_.leave_type,class:"p-2 block mx-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"},[e("div",lt,[e("div",rt,[e("span",it,l(_.leave_balance),1),ct,e("span",dt,l(_.avalied_leaves),1)]),e("div",_t,[e("p",pt,l(_.leave_type),1)])])]))),128))])])]))}};const ht={class:"bg-[#FFEFE2] rounded-lg overflow-hidden p-3",style:{height:"200px"}},mt=e("div",{class:"flex justify-between"},[e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Calendar"),e("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-[20px] h-[20px] text-gray-900 cursor-pointer"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"})])],-1),ft={class:"py-8"},gt={class:"text-[#d1814c] font-semibold text-[36px] mb-2 font-['Petrona']",style:{}},vt={class:"mb-2 font-semibold text-gray-900 text-[16px]"},xt={__name:"calender",setup(f){return(t,i)=>(o(),r("div",ht,[mt,e("div",ft,[e("p",gt,l(s(M)(new Date).format("D, MMMM YYYY")),1),e("p",vt,l(s(M)(new Date).format("dddd")),1)])]))}};const bt=["src","alt"],yt={__name:"holiday_widget",setup(f){const t=g(),i=g(),a=g(),_=()=>{q.get("/holiday/master-page").then(d=>{console.log(d.data),i.value=d.data;let v=!0;d.data.forEach((n,p)=>{v&&new Date(n.holiday_date)>=new Date&&(t.value=p,v=!1)}),a.value=i.value[0].image})};return A(()=>{_()}),(d,v)=>{const n=P("Galleria");return o(),R(n,{value:i.value,responsiveOptions:d.responsiveOptions,numVisible:5,circular:!0,containerStyle:"",class:"!h-[180px] !rounded-[20px] overflow-hidden",showItemNavigators:!0,showThumbnails:!1},{item:S(p=>[e("img",{src:`data:image/png;base64,${p.item.image}`,class:"mt-3 mb-2 !rounded-[20px] shadow-sm !h-[180px]",style:{width:"100%","margin-bottom":"10px",position:"relative",right:"0",bottom:"10px",display:"block"},alt:p.item.holiday_name},null,8,bt)]),_:1},8,["value","responsiveOptions"])}}};const wt={class:"bg-white rounded-lg p-2"},$t=e("span",{class:"text-primary font-semibold fs-6"},"Events",-1),kt={class:"min-h-min overflow-x-scroll"},Ct={class:"grid grid-cols-4 gap-4"},Dt={class:"font-semibold text-center text-white my-2 text-[12px] font-['Poppins']"},St={class:"absolute top-8 w-full z-10"},Et={class:"grid grid-cols-2 w-11/12 bg-slate-100 mx-auto rounded-lg h-full"},Mt={class:"w-[100%] relative h-[90px]"},Ft={class:"font-semibold text-4xl py-4 text-center align-middle text-white"},Pt=["src"],jt={class:"h-full"},Rt={class:"py-6"},Lt={key:0,class:"font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto"},At={key:1,class:"font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto"},Nt={class:"font-semibold text-sm text-center text-gray-600 my-auto"},Tt={class:"text-xs absolute right-6 fa fa-commenting-o text-right cursor-pointer","data-bs-target":"#wishes_popup","data-bs-toggle":"modal"},Bt=e("div",{class:"flex justify-center my-2"},null,-1),Ot=e("div",{id:"wishes_popup",class:"modal fade",role:"dialog"},[e("div",{class:"modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md"},[e("div",{class:"modal-content"},[e("div",{class:"py-2 border-0 modal-header"},[e("h6",{class:"modal-title"}," Wishes Text"),e("button",{type:"button",class:"bg-transparent border-0 outline-none close h3","data-bs-dismiss":"modal","aria-label":"Close"},[e("span",{"aria-hidden":"true"},"×")])]),e("div",{class:"modal-body"},[e("p",{for:"",class:"text-muted f-14 fw-bold"},"Commants here"),e("textarea",{name:"",id:"",cols:"",placeholder:"Commants here....",rows:"2",class:"resize-none form-control"}),e("div",{class:"text-end"},[e("button",{class:"mt-2 btn btn-border-orange",id:""},[e("i",{class:"fa fa-paper-plane me","aria-hidden":"true"}),E(" Send")])])])])])],-1),U={__name:"events",setup(f){T();const t=y(),i=["bg-emerald-600","bg-yellow-600","bg-rose-600","bg-cyan-600","bg-amber-600","bg-red-600","bg-pink-600","bg-green-600","bg-fuchsia-600"],a=["bg-emerald-200","bg-yellow-200","bg-rose-200","bg-cyan-200","bg-amber-200","bg-red-200","bg-pink-200","bg-green-200","bg-fuchsia-200"],_=n=>i[n%i.length],d=n=>a[n%i.length],v=n=>{if(n=="birthday")return"Happy birthday";if(n=="work_anniversery")return"Work anniversary"};return(n,p)=>{const b=J("tooltip");return o(),r(j,null,[e("div",wt,[$t,e("div",kt,[e("div",Ct,[(o(!0),r(j,null,B(s(t).allEventSource,(m,w)=>(o(),r("div",{class:"relative w-[180px] rounded-lg my-8",key:w},[e("div",{class:$(["h-[80px] rounded-lg",`${_(w)}`])},[e("p",Dt,l(v(m.type)),1)],2),e("div",St,[e("div",Et,[e("div",Mt,[JSON.parse(m.avatar).type=="shortname"?(o(),r("div",{key:0,class:$([d(w),"h-full rounded-lg"])},[e("p",Ft,l(JSON.parse(m.avatar).data),1)],2)):(o(),r("img",{key:1,src:`data:image/png;base64,${JSON.parse(m.avatar).data}`,alt:"",class:"rounded-lg absolute w-[100%] h-[100%] top-0"},null,8,Pt))]),e("div",jt,[e("div",Rt,[m.name.length<=8?(o(),r("p",Lt,l(m.name),1)):O((o(),r("p",At,[E(l(m.name?m.name.substring(0,8)+"..":""),1)])),[[b,m.name]]),e("p",Nt,l(s(M)(m.dob).format("DD"))+"th "+l(s(M)(m.dob).format("MMM")),1),e("p",null,[O(e("i",Tt,null,512),[[b,"wish"]])])])])]),Bt])]))),128))])])]),Ot],64)}}};const It={class:"grid grid-cols-12 gap-4"},Yt={class:"col-span-5 w-[100%] !rounded-[20px] overflow-hidden"},qt={class:"col-span-4 w-[100%] !rounded-[20px]"},Vt={class:"col-span-3 w-[100%] !rounded-[20px]"},Ut={class:"grid grid-cols-12 gap-4 pb-7"},Gt={class:"col-span-8 !rounded-[20px]"},Ht={class:"grid grid-cols-2 gap-4 my-2"},Wt={class:"!rounded-[20px] overflow-hidden"},zt={class:"!rounded-[20px] overflow-hidden"},Jt={class:"grid grid-cols-1"},Kt={class:"col-span-4 my-2"},Qt={__name:"employee_dashboard",setup(f){const t=y();return(i,a)=>(o(),r("div",{class:"h-screen p-3 overflow-auto",onMousemove:a[0]||(a[0]=_=>s(t).canShowConfiguration=!1)},[e("div",It,[e("div",Yt,[c(Re)]),e("div",qt,[c(Xe)]),e("div",Vt,[c(yt)])]),e("div",Ut,[e("div",Gt,[e("div",Ht,[e("div",Wt,[c(ut)]),e("div",zt,[c(xt)])]),e("div",Jt,[e("div",null,[c(U)])])]),e("div",Kt,[c(V)])])],32))}},Xt={key:0,class:"w-full"},Zt={class:"font-[14px] font-['Poppins'] text-gray-500"},es={class:"mb-2 text-xl font-semibold"},ts={class:"grid grid-cols-4 gap-3 my-2"},ss={class:"px-auto flex justify-center"},os={class:"text-3xl font-semibold text-center"},as=e("p",{class:"text-lg font-semibold text-center text-gray-500"},"Total Employees",-1),ns={class:"px-auto flex justify-center"},ls={class:"text-3xl font-semibold text-center"},rs=e("p",{class:"text-lg font-semibold text-center text-gray-500"},"New Employees",-1),is={class:"px-auto flex justify-center"},cs={class:"text-3xl font-semibold text-center"},ds=e("p",{class:"text-lg font-semibold text-center text-gray-500"},"Exit Employees",-1),_s={class:"px-auto flex justify-center"},ps={class:"text-3xl font-semibold text-center"},us=e("p",{class:"text-lg font-semibold text-center text-gray-500"},"Yet to Active Employees ",-1),hs={__name:"org_employee_details",setup(f){const t=y();return(i,a)=>s(t).orgEmployeeDetailCount?(o(),r("div",Xt,[e("p",Zt,[E(" Current month - "),e("span",es,l(s(M)(new Date).format("MMMM")),1)]),e("div",ts,[e("div",{class:"bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer",onClick:a[0]||(a[0]=_=>(s(t).canShowSidebar=!0,s(t).ShowEmployeeStatuswise={...s(t).orgEmployeeDetailCount.total_employees},s(t).reportName=`total_employee_reports_${new Date}`))},[e("div",ss,[e("span",os,l(s(t).orgEmployeeDetailCount.total_employee_count?s(t).orgEmployeeDetailCount.total_employee_count:0),1)]),as]),e("div",{class:"bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer",onClick:a[1]||(a[1]=_=>(s(t).canShowSidebar=!0,s(t).ShowEmployeeStatuswise={...s(t).orgEmployeeDetailCount.new_employees},s(t).reportName=`new_employee_reports_${new Date}`))},[e("div",ns,[e("span",ls,l(s(t).orgEmployeeDetailCount.new_employee_count?s(t).orgEmployeeDetailCount.new_employee_count:0),1)]),rs]),e("div",{class:"bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer",onClick:a[2]||(a[2]=_=>(s(t).canShowSidebar=!0,s(t).ShowEmployeeStatuswise={...s(t).orgEmployeeDetailCount.exit_employees},s(t).reportName=`active_employee_reports_${new Date}`))},[e("div",is,[e("span",cs,l(s(t).orgEmployeeDetailCount.exit_employee_count?s(t).orgEmployeeDetailCount.exit_employee_count:0),1)]),ds]),e("div",{class:"bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer",onClick:a[3]||(a[3]=_=>(s(t).canShowSidebar=!0,s(t).ShowEmployeeStatuswise={...s(t).orgEmployeeDetailCount.yet_to_active_employees},s(t).reportName=`yet_to_active_employee_reports_${new Date}`))},[e("div",_s,[e("span",ps,l(s(t).orgEmployeeDetailCount.yet_to_active_employee_count?s(t).orgEmployeeDetailCount.yet_to_active_employee_count:0),1)]),us])])])):L("",!0)}},ms={class:"p-2 overflow-hidden bg-white rounded-lg",style:{height:"200px"}},fs=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Analytics",-1),gs=e("div",{class:"h-full overflow-x-scroll bg-white rounded-lg"},[e("p",{class:"font-medium text-sm text-center"},"No data to display")],-1),vs=[fs,gs],xs={__name:"Analytics",setup(f){return y(),(t,i)=>(o(),r("div",ms,vs))}},bs={class:"p-2 overflow-hidden bg-white rounded-lg",style:{height:"200px"}},ys=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Pending Requests",-1),ws={class:"h-full overflow-x-scroll bg-white rounded-lg"},$s=["href"],ks={class:"p-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"},Cs={class:"flex px-2 justify-between items-center"},Ds={class:"text-[14px] font-semibold"},Ss={class:"flex items-center gap-6"},Es={class:"text-xl font-semibold text-black"},Ms=e("span",null,[e("i",{class:"fa fa-chevron-right","aria-hidden":"true"})],-1),Fs={__name:"leave_request",setup(f){const t=y(),i=a=>{if(a=="Leave Requests")return"attendance-leave-approvals";if(a=="Document Approvals")return"approvals-documents";if(a=="Attendance Regularization")return"attendance-regularization-approvals"};return(a,_)=>(o(),r("div",bs,[ys,e("div",ws,[s(t).hrPendingRequestCount?(o(!0),r(j,{key:0},B(s(t).hrPendingRequestCount,d=>(o(),r("a",{class:"px-auto",href:i(d.title)},[e("div",ks,[e("div",Cs,[e("div",null,[e("span",Ds,l(d.title),1)]),e("div",Ss,[e("span",Es,l(d.value),1),Ms])])])],8,$s))),256)):L("",!0)])]))}},Ps={__name:"overall_employee",setup(f){const t=y();A(()=>{a.value=_(),setTimeout(()=>{console.log(t.overallEmployeeCountForGraph),i.value.datasets[0].data=t.overallEmployeeCountForGraph},3e3)});const i=g({labels:["Male","Female","Others","App Check-Ins","Active Apps","Inactive Apps"],datasets:[{backgroundColor:["rgba(8, 115, 205, 1)","rgba(205, 159, 71, 1)","rgba(255, 205, 86, 0.2)","rgba(80, 64, 34, 1)","rgba(113, 74, 161, 1)","rgba(181, 86, 151, 1)"],borderWidth:10,borderColor:"white",data:[0,0,0,0,0,0]}]}),a=g();g();const _=()=>{const d=getComputedStyle(document.documentElement),v=d.getPropertyValue("--text-color"),n=d.getPropertyValue("--text-color-secondary");return d.getPropertyValue("--surface-border"),{maintainAspectRatio:!1,aspectRatio:100,plugins:{title:{display:!1,text:"Custom Chart Title"},legend:{display:!1,labels:{fontColor:v}}},scales:{x:{ticks:{autoSkip:!1,maxRotation:0,minRotation:0,textAlign:"center",padding:10,color:n,font:{weight:600}},grid:{display:!1,drawBorder:!1}},y:{display:!1,ticks:{color:n},grid:{color:!1,drawBorder:!1}}}}};return(d,v)=>{const n=P("Chart");return s(t).overallEmployeeCountForGraph?(o(),R(n,{key:0,type:"bar",data:i.value,options:a.value,class:"h-full"},null,8,["data","options"])):L("",!0)}}};const js={class:"h-screen p-3 overflow-auto"},Rs={class:"grid grid-cols-12 gap-4"},Ls={class:"col-span-8"},As={class:"col-span-12 w-[100%] !rounded-[20px] bg-white p-2"},Ns={class:"col-span-12 !rounded-[20px]"},Ts={class:"grid grid-cols-12 gap-4 my-2"},Bs={class:"!rounded-[20px] overflow-hidden col-span-5"},Os={class:"!rounded-[20px] overflow-hidden bg-white col-span-7"},Is={class:"col-span-12"},Ys={class:"col-span-4 w-[100%] !rounded-[20px]"},qs={class:"py-3"},Vs={__name:"hr_dashboard",setup(f){return y(),g(0),(t,i)=>(o(),r("div",js,[e("div",Rs,[e("div",Ls,[e("div",As,[c(hs)]),e("div",Ns,[e("div",Ts,[e("div",Bs,[c(Fs)]),e("div",Os,[c(Ps)])])]),e("div",Is,[c(U)])]),e("div",Ys,[e("div",null,[c(xs)]),e("div",qs,[c(V)])])])]))}};const I=f=>(K("data-v-a47c0539"),f=f(),Q(),f),Us={key:0,class:"col"},Gs=I(()=>e("p",{class:"absolute left-0 mx-4 font-semibold fs-5"}," Reports",-1)),Hs={class:"relative right-0 mx-4 font-semibold fs-5"},Ws=I(()=>e("p",{class:"relative left-2 font-['poppins']"},"Download",-1)),zs=I(()=>e("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16"},[e("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check"}),e("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"}),e("path",{d:"M8,1 L8,11",class:"svg-out"})],-1)),Js=[zs],Ks={key:0,class:"mt-6"},Qs={__name:"dashboard",setup(f){const t=y(),i=g(),a=T();A(async()=>{i.value=!0,await t.getMainDashboardData(),t.getHrDashboardMainSource(),T(),i.value=!1});const _=async()=>{const n=new Z.Workbook,p=n.addWorksheet("Sheet1"),b=["user_code","name","department","process","location"],m="this report generated by ABShrms payroll software ",w=b;p.addRow(w).eachCell((D,h)=>{D.fill={type:"pattern",pattern:"solid",fgColor:{argb:"252f70"}},D.font={bold:!0,color:{argb:"ffffff"}},p.getColumn(h).width=20}),Object.values(t.ShowEmployeeStatuswise).forEach((D,h)=>{console.log(D);const N=[];w.forEach(G=>{N.push(D[G])}),p.addRow(N)}),p.addRow([""]);const F=p.addRow([""]);F.getCell(1).value=m,p.mergeCells(F.number,1,F.number,3),F.getCell(1).alignment={wrapText:!0},F.getCell(1).font={italic:!0};const x=await n.xlsx.writeBuffer(),u=window.URL.createObjectURL(new Blob([x])),C=document.createElement("a");C.href=u,C.download=`${t.reportName}.xlsx`,C.click(),window.URL.revokeObjectURL(u)},d=g(!1),v=g("downloaded");return(n,p)=>{const b=P("Column"),m=P("DataTable"),w=P("Sidebar");return o(),r(j,null,[s(a).current_user_role==1||s(a).current_user_role==2||s(a).current_user_role==3?(o(),r("div",Us,[e("button",{class:$(["font-semibold text-sm p-1.5 rounded-l-lg",[s(t).currentDashboard===0?"bg-green-200 text-black border border-black":"bg-white text-slate-700 border border-black"]]),onClick:p[0]||(p[0]=k=>s(t).currentDashboard=0)},"Self-dashboard",2),e("button",{class:$(["font-semibold text-sm p-1.5 rounded-r-lg",[s(t).currentDashboard===1?"bg-green-200 text-black border border-black":"bg-white text-slate-700 border border-black"]]),onClick:p[1]||(p[1]=k=>s(t).currentDashboard=1)},"Org-dashboard",2)])):L("",!0),s(t).canShowLoading?(o(),R(ee,{key:1})):s(t).currentDashboard==1?(o(),R(Y,{key:2,"enter-active-class":"transition ease-out transform duration-600","enter-class":"translate-y-2 opacity-0","enter-to-class":"translate-y-0 opacity-100","leave-active-class":"transition duration-100 ease-in transform","leave-class":"translate-y-0 opacity-100","leave-to-class":"translate-y-2 opacity-0"},{default:S(()=>[c(Vs)]),_:1})):(o(),R(Y,{key:3,"enter-active-class":"transition ease-out transform duration-600","enter-class":"translate-y-2 opacity-0","enter-to-class":"translate-y-0 opacity-100","leave-active-class":"transition duration-100 ease-in transform","leave-class":"translate-y-0 opacity-100","leave-to-class":"translate-y-2 opacity-0"},{default:S(()=>[c(Qt)]),_:1})),c(w,{visible:s(t).canShowSidebar,"onUpdate:visible":p[3]||(p[3]=k=>s(t).canShowSidebar=k),position:"right",class:"w-full"},{header:S(()=>[Gs,e("div",Hs,[e("button",{class:"bg-[#E6E6E6] p-2 mx-2 rounded-md w-[120px]",onClick:p[2]||(p[2]=k=>(d.value=!d.value,_()))},[Ws,e("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:$([d.value==!0?v.value:" "])},Js,2)])])]),default:S(()=>[s(t).ShowEmployeeStatuswise?(o(),r("div",Ks,[c(m,{value:s(t).ShowEmployeeStatuswise?s(t).ShowEmployeeStatuswise:[]},{default:S(()=>[c(b,{field:"user_code",header:"User code"}),c(b,{field:"name",header:"Name",style:{"text-align":"left !important","white-space":"no !important"}}),c(b,{field:"department_name",header:"Department",style:{"text-align":"left !important","white-space":"no !important"}}),c(b,{field:"process",header:"Process",style:{"text-align":"left !important","white-space":"no !important"}}),c(b,{field:"location",header:"Work location",style:{"text-align":"left !important","white-space":"no !important"}})]),_:1},8,["value"])])):L("",!0)]),_:1},8,["visible"])],64)}}},ro=te(Qs,[["__scopeId","data-v-a47c0539"]]);export{ro as D};