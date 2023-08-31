import{a0 as m,a3 as I,ak as M,g as C,o,c as l,d as e,F as S,f as E,t,I as d,k as G,au as V,n as k,l as g,h as r,w as $,b as j,T as O}from"./toastservice.esm-484a3f44.js";import{S as L}from"./Service-0a78a223.js";import{u as b}from"./dashboard_service-e2b95048.js";import{a as A}from"./index-362795f3.js";import{d as y}from"./dayjs.min-2f06af28.js";import{_ as H,a as N}from"./events-a99ca022.js";import{u as z}from"./LeaveApply.vue_vue_type_style_index_0_lang-d1601a2b.js";import{L as R}from"./LoadingSpinner-e46f55f6.js";const U="/build/assets/femaleDashboardImage-7f53f6fa.svg";const W={class:"!h-[180px] w-[100%] overflow-hidden rounded-xl shadow-lg bg-[#DFE8FF] p-3 grid grid-cols-12 gap-4 justify-between leading-normal"},J={class:"font-[14px] font-['Poppins'] text-gray-500 flex items-center"},K={class:"text-gray-900 text-[18px] mb-2 font-['Poppins']"},Q={class:"flex gap-4 items-center"},X=e("div",{class:"flex my-1 overflow-visible items-center !z-10"},[e("i",{class:"fa fa-sun-o text-warning my-auto text-[20px]","aria-hidden":"true"}),e("p",{class:"text-[12px] my-auto font-semibold px-2"},"General Shift")],-1),Z={class:"btn-status"},ee={class:"text-[12px] text-[#8B8B8B] font-['Poppins'] flex items-center"},te={key:0,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},se={key:1,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},oe={key:2,class:"w-[300px] max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},ae={key:3,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},ne=e("div",{class:"col-span-5 h-full !z-5"},[e("div",{class:"grid justify-center items-centers my-auto h-full border-[1px]"},[e("img",{src:U,alt:"",srcset:"",class:"w-full h-full"})])],-1),ce={class:"bg-white modal-content"},ie={class:"p-1 text-center modal-body"},le={class:"check-in-animate"},re={class:"mt-2"},de={class:"text-gray-900 text-[18px] mb-2 font-['Poppins']"},_e=e("span",null,"Welcome",-1),pe={key:0,class:"mb-4 text-muted"},he={key:1,class:"mb-4 text-muted"},ue={class:"gap-2 hstack justify-content-center"},me={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},fe={class:"bg-white modal-content"},xe={class:"p-1 text-center modal-body"},ve={class:"check-in-animate"},ge={class:"mt-4"},ye={class:"mb-3"},be=e("p",{class:"mb-4 text-muted"},"See you tommorrow",-1),we={class:"gap-2 hstack justify-content-center"},ke={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},$e={__name:"welcome_card",setup(x){const a=L(),n=b(),p=m();m();const _=m([]),u=m(!1),f=m(!1),c=I({date:new Date,check:"",check_in:"",check_out:"",attendance_mode:"web",work_mode:"",checked:!1}),v=()=>{var h=new Date,s=h.getHours();s<12?p.value="Good Morning":s<18?p.value="Good Afternoon":p.value="Good Evening"},T=()=>{_.value.splice(0,_.value.length),c.check==!0?(c.check_in=new Date().toLocaleTimeString(),c.checked=!0,u.value=!0):(c.check_out=new Date().toLocaleTimeString(),f.value=!0,c.checked=!1),n.updateCheckin_out({checked:c.checked}).then(h=>{D.value=h.data.message}).finally(()=>{P(),q()})},D=m(),P=async()=>{let h="/fetchEmpLastAttendanceStatus";await A.get(h).then(s=>{console.log(s.data),_.value.push(s.data),s.data.checkout_time?c.check=!1:s.data.checkin_time?c.check=!0:c.check=null}).finally(()=>{n.canShowTopbar=!0})};M(()=>{v(),P()});const F=h=>(console.log(h),h=="biometric"?"fas fa-fingerprint fs-12":h=="web"?"fa fa-laptop fs-12":h=="mobile"?"fa fa-mobile-phone fs-12":""),q=()=>{n.check="",n.check_in="",n.check_out="",n.work_mode=""};return(h,s)=>{const w=C("lord-icon"),Y=C("Dialog");return o(),l(S,null,[e("div",W,[(o(!0),l(S,null,E(_.value,i=>(o(),l("div",{class:"col-span-7 mb-8",key:i},[e("p",J,t(p.value),1),e("div",K,t(d(a).current_user_name),1),e("div",Q,[X,e("div",Z,[G(e("input",{type:"checkbox",name:"checkbox",id:"checkbox",class:"hidden","onUpdate:modelValue":s[0]||(s[0]=B=>c.check=B),onChange:T},null,544),[[V,c.check]]),e("label",{for:"checkbox",class:k(["relative inline-block w-12 h-5 rounded-lg transition duration-300 cursor-pointer",[c.check?" bg-green-100":"bg-red-100"]])},[e("span",{class:k(["absolute inset-0 inline-block w-5 h-5 rounded-full shadow transform transition-transform cursor-pointer",[c.check?"translate-x-6 bg-green-400":"bg-red-400"]])},null,2)],2)])]),e("div",null,[e("p",ee,[g(" Time duration:"),e("span",null,t(i.effective_hours?i.effective_hours:0),1)]),i.checkin_time?(o(),l("p",te,[g(t(`Check-In : ${i.checkin_time} (${d(y)(i.checkin_date).format("MMM D, YYYY")}) `)+" ",1),e("i",{class:k(["mx-2 text-sm font-semibold text-green-800",F(i.attendance_mode_checkin)])},null,2)])):(o(),l("p",se,t(`Check-In:
                    --:--:--`))),i.checkout_time?(o(),l("p",oe,[g(t(`Check-Out : ${i.checkout_time} (${d(y)(i.checkout_date).format("MMM D, YYYY")}) `)+" ",1),e("i",{class:k(["mx-2 text-sm font-semibold text-green-800",F(i.attendance_mode_checkout)])},null,2)])):(o(),l("p",ae,t(`Check-Out:
                    --:--:--`)))])]))),128)),ne]),r(Y,{visible:u.value,"onUpdate:visible":s[2]||(s[2]=i=>u.value=i),modal:"",style:{width:"30vw"}},{default:$(()=>[e("div",ce,[e("div",ie,[e("div",le,[r(w,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",class:"gliters",colors:"primary:#1aff1a,secondary:#1aff1a"}),r(w,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#30e849"})]),e("div",re,[e("div",de,[_e,g(" "+t(d(a).current_user_name),1)]),D.value?(o(),l("p",pe,t(D.value),1)):(o(),l("p",he,"Have a good day !")),e("div",ue,[e("a",me,[e("button",{onClick:s[1]||(s[1]=i=>u.value=!1),type:"button",class:"btn btn-primary"}," Close ")])])])])])]),_:1},8,["visible"]),r(Y,{visible:f.value,"onUpdate:visible":s[4]||(s[4]=i=>f.value=i),modal:"",style:{width:"25vw"}},{default:$(()=>[e("div",fe,[e("div",xe,[e("div",ve,[r(w,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",colors:"primary:#ff3300,secondary:#ff3300",class:"gliters"}),r(w,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#e62e00"})]),e("div",ge,[e("h4",ye,"Bye "+t(d(a).current_user_name),1),be,e("div",we,[e("a",ke,[e("button",{type:"button",class:"btn btn-primary",onClick:s[3]||(s[3]=i=>f.value=!1)}," Close ")])])])])])]),_:1},8,["visible"])],64)}}},Me={class:"!h-[180px] rounded-[20px] shadow-sm bg-white"},De={class:"px-6 py-4"},Ce={class:"font-[14px] font-['Poppins'] text-gray-500"},Se={class:"mb-2 text-xl font-semibold"},je={class:"grid grid-cols-3 gap-4 mt-4"},Pe={class:"bg-[#F6F6F6] rounded-lg p-3"},Fe={class:"px-auto"},Ye={class:"mb-2 text-3xl font-bold text-center"},Ee=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),Le=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Present",-1),Ae={class:"p-3 bg-gray-100 rounded-lg"},Te={class:"mb-2 text-3xl font-bold"},qe=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),Be=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Leave",-1),Ie={class:"p-3 bg-gray-100 rounded-lg"},Ge={class:"mb-2 text-3xl font-bold"},Ve=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),Oe=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Absent",-1),He={__name:"leave_details",setup(x){const a=b();return M(()=>{}),(n,p)=>(o(),l("div",Me,[e("div",De,[e("p",Ce,[g(" Current month - "),e("span",Se,t(d(y)(new Date).format("MMMM")),1)]),e("div",je,[e("div",Pe,[e("div",Fe,[e("span",Ye,t(d(a).attenanceReportPerMonth.present),1),Ee]),Le]),e("div",Ae,[e("span",Te,t(d(a).attenanceReportPerMonth.not_applied),1),qe,Be]),e("div",Ie,[e("span",Ge,t(d(a).attenanceReportPerMonth.absent),1),Ve,Oe])])])]))}};const Ne={class:"p-2 overflow-hidden bg-white rounded-lg",style:{height:"200px"}},ze=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Leave Balance",-1),Re={class:"h-full overflow-x-scroll bg-white rounded-lg"},Ue={class:"px-auto"},We={class:"flex px-2"},Je={class:""},Ke={class:"text-3xl font-semibold text-black"},Qe=e("span",{class:""},"/",-1),Xe={class:""},Ze={class:"px-3"},et={class:"font-semibold text-primary text-[14px] align-bottom py-2"},tt={__name:"leave_balance",setup(x){const a=b();return z(),(n,p)=>(o(),l("div",Ne,[ze,e("div",Re,[e("div",Ue,[(o(!0),l(S,null,E(d(a).leaveBalancePerMonthSource,_=>(o(),l("div",{key:_.leave_type,class:"p-2 mx-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"},[e("div",We,[e("div",Je,[e("span",Ke,t(_.leave_balance),1),Qe,e("span",Xe,t(_.avalied_leaves),1)]),e("div",Ze,[e("p",et,t(_.leave_type),1)])])]))),128))])])]))}};const st={class:"bg-[#FFEFE2] rounded-lg overflow-hidden p-3",style:{height:"200px"}},ot=e("div",{class:"flex justify-between"},[e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Calendar"),e("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-[20px] h-[20px] text-gray-900 cursor-pointer"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"})])],-1),at={class:"py-8"},nt={class:"text-[#d1814c] font-semibold text-[44px] mb-2 font-['Petrona']",style:{}},ct={class:"mb-2 font-semibold text-gray-900 text-[20px]"},it={__name:"calender",setup(x){return(a,n)=>(o(),l("div",st,[ot,e("div",at,[e("p",nt,t(d(y)(new Date).format("D, MMMM YYYY")),1),e("p",ct,t(d(y)(new Date).format("dddd")),1)])]))}};const lt=["src","alt"],rt={__name:"holiday_widget",setup(x){const a=m(),n=m(),p=m(),_=()=>{A.get("/holiday/master-page").then(u=>{console.log(u.data),n.value=u.data;let f=!0;u.data.forEach((c,v)=>{f&&new Date(c.holiday_date)>=new Date&&(a.value=v,f=!1)}),p.value=n.value[0].image})};return M(()=>{_()}),(u,f)=>{const c=C("Galleria");return o(),j(c,{value:n.value,responsiveOptions:u.responsiveOptions,numVisible:5,circular:!0,containerStyle:"",class:"!h-[180px] !rounded-[20px] overflow-hidden",showItemNavigators:!0,showThumbnails:!1},{item:$(v=>[e("img",{src:`data:image/png;base64,${v.item.image}`,class:"mt-3 mb-2 !rounded-[20px] shadow-sm !h-[180px]",style:{width:"100%","margin-bottom":"10px",position:"relative",right:"0",bottom:"10px",display:"block"},alt:v.item.holiday_name},null,8,lt)]),_:1},8,["value","responsiveOptions"])}}};const dt={class:"grid grid-cols-12 gap-4"},_t={class:"col-span-5 w-[100%] !rounded-[20px] overflow-hidden"},pt={class:"col-span-4 w-[100%] !rounded-[20px]"},ht={class:"col-span-3 w-[100%] !rounded-[20px]"},ut={class:"grid grid-cols-12 gap-4 pb-7"},mt={class:"col-span-8 !rounded-[20px]"},ft={class:"grid grid-cols-2 gap-4 my-2"},xt={class:"!rounded-[20px] overflow-hidden"},vt={class:"!rounded-[20px] overflow-hidden"},gt={class:"grid grid-cols-1"},yt={class:"col-span-4 my-2"},bt={__name:"employee_dashboard",setup(x){const a=b();return(n,p)=>(o(),l("div",{class:"h-screen p-3 overflow-auto",onMousemove:p[0]||(p[0]=_=>d(a).canShowConfiguration=!1)},[e("div",dt,[e("div",_t,[r($e)]),e("div",pt,[r(He)]),e("div",ht,[r(rt)])]),e("div",ut,[e("div",mt,[e("div",ft,[e("div",xt,[r(tt)]),e("div",vt,[r(it)])]),e("div",gt,[e("div",null,[r(H)])])]),e("div",yt,[r(N)])])],32))}},Pt={__name:"dashboard",setup(x){const a=b(),n=m();return M(async()=>{n.value=!0,await a.getMainDashboardData(),L(),n.value=!1}),(p,_)=>d(a).canShowLoading?(o(),j(R,{key:0})):(o(),j(O,{key:1,"enter-active-class":"transition ease-out transform duration-600","enter-class":"translate-y-2 opacity-0","enter-to-class":"translate-y-0 opacity-100","leave-active-class":"transition duration-100 ease-in transform","leave-class":"translate-y-0 opacity-100","leave-to-class":"translate-y-2 opacity-0"},{default:$(()=>[r(bt)]),_:1}))}};export{Pt as _};
