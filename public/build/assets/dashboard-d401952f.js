import{o as s,c as a,d as e,F as b,f as M,t as c,aj as d,$ as h,a2 as T,I as D,g as B,k as Y,aq as H,h as _,w as k,l as j,T as E,j as z,n as N,b as L}from"./toastservice.esm-134e08fe.js";import{S as F}from"./Service-c397fabe.js";import{u as g}from"./dashboard_service-bd11cfa6.js";import{a as I}from"./index-362795f3.js";import{d as x}from"./dayjs.min-2f06af28.js";import{u as V}from"./leave_apply_service-b9602f65.js";/* empty css                                                   */import{L as G}from"./LoadingSpinner-512c2b6c.js";const R={class:"bg-white h-[700px] rounded-lg overflow-hidden p-2"},U=e("div",{class:"mb-3 card-title flex items-center justify-between",id:""},[e("span",{class:"text-primary font-semibold fs-6"},"Notifications")],-1),O={class:"overflow-x-scroll h-full"},W={class:"p-2"},J={class:"notify-content text-black"},K={class:"mb-1 orange-median items-center flex justify-between"},Q={class:"orange-median font-semibold text-sm"},X={class:"notify-message"},Z={class:"text-xs text-gray-600 font-medium"},ee={__name:"notification",setup(u){const t=g();return(o,r)=>(s(),a("div",R,[U,e("div",O,[(s(!0),a(b,null,M(d(t).allNotificationSource,l=>(s(),a("div",{class:"p-1 my-1 rounded-lg shadow-md hover:bg-slate-100",key:l.id},[e("div",W,[e("a",J,[e("p",K,[e("span",Q,c(l.notification_title),1)]),e("div",X,[e("p",Z,c(l.notification_body),1)])])])]))),128))])]))}},te="/build/assets/femaleDashboardImage-7f53f6fa.svg";const se={class:"h-[180px] overflow-hidden rounded shadow-lg bg-[#DFE8FF] p-3 grid grid-cols-12 gap-4 justify-between leading-normal"},oe={class:"mb-8 col-span-7"},ae={class:"font-[14px] font-['Poppins'] text-gray-500 flex items-center"},ne={class:"text-gray-900 text-[18px] mb-2 font-['Poppins']"},ce=e("div",{class:"flex my-1 overflow-visible items-center !z-10"},[e("i",{class:"fa fa-sun-o text-warning my-auto text-[20px]","aria-hidden":"true"}),e("p",{class:"text-[12px] my-auto font-semibold px-2"},"General Shift")],-1),le={class:"switch-checkbox relative left-[150px] bottom-8 !w-[98px] font-semibold z-10 font-['Poppins']"},ie=e("span",{class:"slider-checkbox check-inw round flex items-center"},[e("span",{class:"slider-checkbox-text !text-[8px] font-semibold"})],-1),de=e("p",{class:"text-[12px] mt-[-20px] text-[#8B8B8B] font-['Poppins'] flex items-center"},[j(" Time duration:"),e("span",null,"09:30")],-1),re={key:0,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},_e={key:1,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},pe={key:2,class:"w-[300px] max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},he={key:3,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},ue=e("div",{class:"col-span-5 h-full !z-5"},[e("div",{class:"grid justify-center items-centers my-auto h-full border-[1px]"},[e("img",{src:te,alt:"",srcset:"",class:"w-full h-full"})])],-1),me={class:"modal-content bg-white"},fe={class:"p-1 text-center modal-body"},ve={class:"check-in-animate"},xe={class:"mt-2"},ge={class:"text-gray-900 text-[18px] mb-2 font-['Poppins']"},ye=e("span",null,"Welcome",-1),be={key:0,class:"mb-4 text-muted"},we={key:1,class:"mb-4 text-muted"},$e={class:"gap-2 hstack justify-content-center"},ke={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},Me={class:"modal-content bg-white"},De={class:"p-1 text-center modal-body"},je={class:"check-in-animate"},Ce={class:"mt-4"},Pe={class:"mb-3"},Se=e("p",{class:"mb-4 text-muted"},"See you tommorrow",-1),Be={class:"gap-2 hstack justify-content-center"},Le={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},Ye={__name:"welcome_card",setup(u){const t=F(),o=g(),r=h();h();const l=h([]),v=h(!1),m=h(!1),n=T({date:new Date,check:"",check_in:"",check_out:"",attendance_mode:"web",work_mode:"",checked:!1}),f=()=>{var y=new Date,i=y.getHours();i<12?r.value="Good Morning":i<18?r.value="Good Afternoon":r.value="Good Evening"},C=()=>{l.value.splice(0,l.value.length),n.check==!0?(n.check_in=new Date().toLocaleTimeString(),n.checked=!0,v.value=!0):(n.check_out=new Date().toLocaleTimeString(),m.value=!0,n.checked=!1),o.updateCheckin_out({checked:n.checked}).then(y=>{w.value=y.data.message}).finally(()=>{P(),q()})},w=h(),P=async()=>{let y="/fetchEmpLastAttendanceStatus";await I.get(y).then(i=>{console.log(i.data),l.value.push(i.data),i.data.checkout_time?n.check=!1:i.data.checkin_time?n.check=!0:n.check=null}).finally(()=>{o.canShowTopbar=!0})};D(()=>{f(),P()});const q=()=>{o.check="",o.check_in="",o.check_out="",o.work_mode=""};return(y,i)=>{const $=B("lord-icon"),S=B("Dialog");return s(),a(b,null,[e("div",se,[(s(!0),a(b,null,M(l.value,p=>(s(),a("div",oe,[e("p",ae,c(r.value),1),e("div",ne,c(d(t).current_user_name),1),ce,e("label",le,[Y(e("input",{type:"checkbox",id:"checkin_function",class:"text-[6px] font-semibold","onUpdate:modelValue":i[0]||(i[0]=A=>n.check=A),onChange:C},null,544),[[H,n.check]]),ie]),e("div",null,[de,p.checkin_time?(s(),a("p",re,c(`Check-In : ${p.checkin_time} (${d(x)(p.checkin_date).format("MMM D, YYYY")}) `),1)):(s(),a("p",_e,c("Check-In: --:--:--"))),p.checkout_time?(s(),a("p",pe,c(`Check-Out : ${p.checkout_time} (${d(x)(p.checkout_date).format("MMM D, YYYY")}) `),1)):(s(),a("p",he,c("Check-Out: --:--:--")))])]))),256)),ue]),_(S,{visible:v.value,"onUpdate:visible":i[2]||(i[2]=p=>v.value=p),modal:"",style:{width:"30vw"}},{default:k(()=>[e("div",me,[e("div",fe,[e("div",ve,[_($,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",class:"gliters",colors:"primary:#1aff1a,secondary:#1aff1a"}),_($,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#30e849"})]),e("div",xe,[e("div",ge,[ye,j(" "+c(d(t).current_user_name),1)]),w.value?(s(),a("p",be,c(w.value),1)):(s(),a("p",we,"Have a good day !")),e("div",$e,[e("a",ke,[e("button",{onClick:i[1]||(i[1]=p=>v.value=!1),type:"button",class:"btn btn-primary"}," Close ")])])])])])]),_:1},8,["visible"]),_(S,{visible:m.value,"onUpdate:visible":i[4]||(i[4]=p=>m.value=p),modal:"",style:{width:"25vw"}},{default:k(()=>[e("div",Me,[e("div",De,[e("div",je,[_($,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",colors:"primary:#ff3300,secondary:#ff3300",class:"gliters"}),_($,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#e62e00"})]),e("div",Ce,[e("h4",Pe,"Bye "+c(d(t).current_user_name),1),Se,e("div",Be,[e("a",Le,[e("button",{type:"button",class:"btn btn-primary",onClick:i[3]||(i[3]=p=>m.value=!1)}," Close ")])])])])])]),_:1},8,["visible"])],64)}}},Ee={class:"h-[180px] rounded overflow-hidden shadow-lg bg-white"},Fe={class:"px-6 py-4"},Ie={class:"font-[14px] font-['Poppins'] text-gray-500"},qe={class:"font-semibold text-xl mb-2"},Ae={class:"grid grid-cols-3 gap-4 mt-4"},Te={class:"bg-[#F6F6F6] rounded-lg p-3"},He={class:"px-auto"},ze={class:"font-bold text-3xl mb-2 text-center"},Ne=e("span",{class:"text-gray-700 text-base font-semibold px-1"},"days",-1),Ve=e("p",{class:"font-semibold text-lg text-gray-500 py-2 text-center"},"Present",-1),Ge={class:"bg-gray-100 rounded-lg p-3"},Re={class:"font-bold text-3xl mb-2"},Ue=e("span",{class:"text-gray-700 text-base font-semibold px-1"},"days",-1),Oe=e("p",{class:"font-semibold text-lg text-gray-500 py-2 text-center"},"Leave",-1),We={class:"bg-gray-100 rounded-lg p-3"},Je={class:"font-bold text-3xl mb-2"},Ke=e("span",{class:"text-gray-700 text-base font-semibold px-1"},"days",-1),Qe=e("p",{class:"font-semibold text-lg text-gray-500 py-2 text-center"},"Absent",-1),Xe={__name:"leave_details",setup(u){const t=g();return D(()=>{}),(o,r)=>(s(),a("div",Ee,[e("div",Fe,[e("p",Ie,[j(" Current month - "),e("span",qe,c(d(x)(new Date).format("MMMM")),1)]),e("div",Ae,[e("div",Te,[e("div",He,[e("span",ze,c(d(t).attenanceReportPerMonth.present),1),Ne]),Ve]),e("div",Ge,[e("span",Re,c(d(t).attenanceReportPerMonth.not_applied),1),Ue,Oe]),e("div",We,[e("span",Je,c(d(t).attenanceReportPerMonth.absent),1),Ke,Qe])])])]))}};const Ze={class:"bg-white rounded-lg overflow-hidden p-2",style:{height:"200px"}},et=e("span",{class:"text-primary font-semibold fs-6"},"Leave Balance",-1),tt={class:"bg-white rounded-lg overflow-x-scroll h-full"},st={class:"px-auto"},ot={class:"flex px-2"},at={class:""},nt={class:""},ct={class:"text-3xl font-semibold text-black"},lt=e("span",{class:""},"/",-1),it={class:""},dt={class:"px-3"},rt={class:"font-semibold text-primary text-[14px] align-bottom py-2"},_t={__name:"leave_balance",setup(u){const t=g();return V(),(o,r)=>(s(),a("div",Ze,[et,e("div",tt,[e("div",st,[(s(!0),a(b,null,M(d(t).leaveBalancePerMonthSource,l=>(s(),a("div",{key:l.leave_type,class:"bg-gray-200 my-2 p-2 mx-2 rounded-lg"},[e("div",ot,[e("div",at,[e("div",nt,[e("span",ct,c(l.leave_balance),1),lt,e("span",it,c(l.avalied_leaves),1)])]),e("div",dt,[e("p",rt,c(l.leave_type),1)])])]))),128))])])]))}};const pt={class:"bg-[#FFEFE2] rounded-lg overflow-hidden p-3",style:{height:"200px"}},ht=e("div",{class:"flex justify-between"},[e("span",{class:"text-primary font-semibold fs-6"},"Calendar"),e("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-6 h-6 text-gray-900 cursor-pointer"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"})])],-1),ut={class:"py-8"},mt={class:"text-[#d1814c] font-semibold text-[30px] mb-2",style:{"font-family":"'Libre Baskerville', serif"}},ft={class:"text-gray-900 font-semibold text-md mb-2"},vt={__name:"calender",setup(u){return(t,o)=>(s(),a("div",pt,[ht,e("div",ut,[e("p",mt,c(d(x)(new Date).format("MMMM D, YYYY")),1),e("p",ft,c(d(x)(new Date).format("dddd")),1)])]))}};const xt={class:"image-slider relative h-[180px] w-full"},gt=["src"],yt=e("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-6 h-6"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5"})],-1),bt=[yt],wt=e("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-6 h-6"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5"})],-1),$t=[wt],kt={__name:"holiday_widget",setup(u){const t=h(),o=h(),r=h(),l=()=>{I.get("/holiday/master-page").then(n=>{console.log(n.data),o.value=n.data;let f=!0;n.data.forEach((C,w)=>{f&&new Date(C.holiday_date)>=new Date&&(t.value=w,f=!1)}),r.value=o.value[t.value].image})};function v(){t.value=(t.value+1)%o.value.length,r.value=o.value[t.value].image}function m(){t.value=(t.value-1+o.value.length)%o.value.length,r.value=o.value[t.value].image}return D(()=>{l()}),(n,f)=>(s(),a("div",xt,[_(E,{name:"fade",mode:"out-in"},{default:k(()=>[(s(),a("img",{src:`data:image/jpeg;base64,${r.value}`,key:r.value,alt:"Holiday Image",class:"h-full w-full rounded-lg"},null,8,gt))]),_:1}),e("div",{class:"controls absolute top-16 w-full px-3"},[e("div",{class:"flex justify-between"},[e("button",{class:"sliderButton",onClick:m},bt),e("button",{class:"sliderButton",onClick:v},$t)])])]))}},Mt="/build/assets/sampleAvatar-daff5f9d.jpg",Dt={class:"bg-white rounded-lg p-2 mb-16"},jt=e("span",{class:"text-primary font-semibold fs-6"},"Events",-1),Ct={class:"h-[500px] overflow-x-scroll"},Pt={class:"grid grid-cols-4 gap-4"},St=e("p",{class:"font-semibold text-center text-white my-2 text-[12px] font-['Poppins']"},"Happy Birthday ",-1),Bt=[St],Lt={class:"absolute top-8 w-full z-10"},Yt={class:"grid grid-cols-2 w-11/12 bg-slate-100 mx-auto rounded-lg h-full"},Et=e("div",{class:""},[e("img",{src:Mt,alt:"",class:"rounded-lg"})],-1),Ft={class:"h-full"},It={class:"py-6"},qt={key:0,class:"font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto"},At={key:1,class:"font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto"},Tt={class:"font-semibold text-sm text-center text-gray-600 my-auto"},Ht=e("div",{class:"flex justify-center my-2"},null,-1),zt=e("div",{class:"bg-p"},null,-1),Nt={__name:"events",setup(u){const t=g(),o=["bg-emerald-600","bg-yellow-600","bg-rose-600","bg-cyan-600","bg-amber-600","bg-red-600","bg-blue-600","bg-pink-600","bg-green-600","bg-fuchsia-600"],r=l=>(console.log(l),o[l%o.length]);return(l,v)=>{const m=z("tooltip");return s(),a(b,null,[e("div",Dt,[jt,e("div",Ct,[e("div",Pt,[(s(!0),a(b,null,M(d(t).allEventSource,(n,f)=>(s(),a("div",{class:"relative w-[180px] rounded-lg my-8",key:f},[e("div",{class:N(["h-[80px] rounded-lg",`${r(f)}`])},Bt,2),e("div",Lt,[e("div",Yt,[Et,e("div",Ft,[e("div",It,[n.name.length<=8?(s(),a("p",qt,c(n.name),1)):Y((s(),a("p",At,[j(c(n.name?n.name.substring(0,8)+"..":""),1)])),[[m,n.name]]),e("p",Tt,c(d(x)(n.dob).format("DD"))+"th "+c(d(x)(n.dob).format("MMM")),1)])])]),Ht])]))),128))])])]),zt],64)}}};const Vt={class:"p-3 overflow-auto h-screen"},Gt={class:"grid grid-cols-12 gap-4"},Rt={class:"col-span-5"},Ut={class:"col-span-4"},Ot={class:"bg-white rounded-lg col-span-3"},Wt={class:"grid grid-cols-12 gap-4 pb-7"},Jt={class:"col-span-8"},Kt={class:"grid grid-cols-2 gap-4 my-2"},Qt={class:"grid grid-cols-1"},Xt={class:"col-span-4 my-2"},Zt={__name:"employee_dashboard",setup(u){return g(),(t,o)=>(s(),a("div",Vt,[e("div",Gt,[e("div",Rt,[_(Ye)]),e("div",Ut,[_(Xe)]),e("div",Ot,[_(kt)])]),e("div",Wt,[e("div",Jt,[e("div",Kt,[e("div",null,[_(_t)]),e("div",null,[_(vt)])]),e("div",Qt,[e("div",null,[_(Nt)])])]),e("div",Xt,[_(ee)])])]))}},is={__name:"dashboard",setup(u){const t=g(),o=h();return D(async()=>{o.value=!0,await t.getMainDashboardData(),F(),o.value=!1}),(r,l)=>d(t).canShowLoading?(s(),L(G,{key:0})):(s(),L(E,{key:1,"enter-active-class":"transition ease-out duration-600 transform","enter-class":"opacity-0 translate-y-2","enter-to-class":"opacity-100 translate-y-0","leave-active-class":"transition ease-in duration-100 transform","leave-class":"opacity-100 translate-y-0","leave-to-class":"opacity-0 translate-y-2"},{default:k(()=>[_(Zt)]),_:1}))}};export{is as _};
