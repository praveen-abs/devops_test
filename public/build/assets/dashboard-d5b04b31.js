import{I as x,a2 as I,ak as P,g as j,o as t,c as a,d as e,F as $,f as L,t as s,aj as d,k as E,au as O,l as b,n as C,h,w as S,J as V,b as F,j as z,T as G}from"./toastservice.esm-3d6796bd.js";import{S as Y}from"./Service-bda4280b.js";import{u as w}from"./dashboard_service-3cbb3975.js";import{a as B}from"./index-362795f3.js";import{d as y}from"./dayjs.min-2f06af28.js";import{u as H}from"./leave_apply_service-e1e671e7.js";/* empty css                                                   */import{L as J}from"./LoadingSpinner-60045579.js";const R="/build/assets/femaleDashboardImage-7f53f6fa.svg";const U={class:"!h-[180px] w-[100%] overflow-hidden rounded-xl shadow-lg bg-[#DFE8FF] p-3 grid grid-cols-12 gap-4 justify-between leading-normal"},W={class:"font-[14px] font-['Poppins'] text-gray-500 flex items-center"},K={class:"text-gray-900 text-[18px] mb-2 font-['Poppins']"},Q=e("div",{class:"flex my-1 overflow-visible items-center !z-10"},[e("i",{class:"fa fa-sun-o text-warning my-auto text-[20px]","aria-hidden":"true"}),e("p",{class:"text-[12px] my-auto font-semibold px-2"},"General Shift")],-1),X={class:"switch-checkbox relative left-[150px] bottom-8 !w-[98px] font-semibold z-10 font-['Poppins']"},Z=e("span",{class:"flex items-center slider-checkbox check-inw round"},[e("span",{class:"slider-checkbox-text !text-[8px] font-semibold"})],-1),ee={class:"text-[12px] mt-[-20px] text-[#8B8B8B] font-['Poppins'] flex items-center"},te={key:0,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},se={key:1,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},oe={key:2,class:"w-[300px] max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},ae={key:3,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},ne=e("div",{class:"col-span-5 h-full !z-5"},[e("div",{class:"grid justify-center items-centers my-auto h-full border-[1px]"},[e("img",{src:R,alt:"",srcset:"",class:"w-full h-full"})])],-1),ce={class:"bg-white modal-content"},le={class:"p-1 text-center modal-body"},ie={class:"check-in-animate"},de={class:"mt-2"},re={class:"text-gray-900 text-[18px] mb-2 font-['Poppins']"},_e=e("span",null,"Welcome",-1),pe={key:0,class:"mb-4 text-muted"},he={key:1,class:"mb-4 text-muted"},ue={class:"gap-2 hstack justify-content-center"},me={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},fe={class:"bg-white modal-content"},xe={class:"p-1 text-center modal-body"},ve={class:"check-in-animate"},ge={class:"mt-4"},be={class:"mb-3"},ye=e("p",{class:"mb-4 text-muted"},"See you tommorrow",-1),we={class:"gap-2 hstack justify-content-center"},ke={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},$e={__name:"welcome_card",setup(v){const c=Y(),n=w(),p=x();x();const r=x([]),u=x(!1),f=x(!1),o=I({date:new Date,check:"",check_in:"",check_out:"",attendance_mode:"web",work_mode:"",checked:!1}),g=()=>{var m=new Date,l=m.getHours();l<12?p.value="Good Morning":l<18?p.value="Good Afternoon":p.value="Good Evening"},M=()=>{r.value.splice(0,r.value.length),o.check==!0?(o.check_in=new Date().toLocaleTimeString(),o.checked=!0,u.value=!0):(o.check_out=new Date().toLocaleTimeString(),f.value=!0,o.checked=!1),n.updateCheckin_out({checked:o.checked}).then(m=>{_.value=m.data.message}).finally(()=>{k(),N()})},_=x(),k=async()=>{let m="/fetchEmpLastAttendanceStatus";await B.get(m).then(l=>{console.log(l.data),r.value.push(l.data),l.data.checkout_time?o.check=!1:l.data.checkin_time?o.check=!0:o.check=null}).finally(()=>{n.canShowTopbar=!0})};P(()=>{g(),k()});const A=m=>(console.log(m),m=="biometric"?"fas fa-fingerprint fs-12":m=="web"?"fa fa-laptop fs-12":m=="mobile"?"fa fa-mobile-phone fs-12":""),N=()=>{n.check="",n.check_in="",n.check_out="",n.work_mode=""};return(m,l)=>{const D=j("lord-icon"),T=j("Dialog");return t(),a($,null,[e("div",U,[(t(!0),a($,null,L(r.value,i=>(t(),a("div",{class:"col-span-7 mb-8",key:i},[e("p",W,s(p.value),1),e("div",K,s(d(c).current_user_name),1),Q,e("label",X,[E(e("input",{type:"checkbox",id:"checkin_function",class:"text-[6px] font-semibold","onUpdate:modelValue":l[0]||(l[0]=q=>o.check=q),onChange:M},null,544),[[O,o.check]]),Z]),e("div",null,[e("p",ee,[b(" Time duration:"),e("span",null,s(i.effective_hours?i.effective_hours:0),1)]),i.checkin_time?(t(),a("p",te,[b(s(`Check-In : ${i.checkin_time} (${d(y)(i.checkin_date).format("MMM D, YYYY")}) `)+" ",1),e("i",{class:C(["mx-2 text-sm font-semibold text-green-800",A(i.attendance_mode_checkin)])},null,2)])):(t(),a("p",se,s("Check-In: --:--:--"))),i.checkout_time?(t(),a("p",oe,[b(s(`Check-Out : ${i.checkout_time} (${d(y)(i.checkout_date).format("MMM D, YYYY")}) `)+" ",1),e("i",{class:C(["mx-2 text-sm font-semibold text-green-800",A(i.attendance_mode_checkout)])},null,2)])):(t(),a("p",ae,s("Check-Out: --:--:--")))])]))),128)),ne]),h(T,{visible:u.value,"onUpdate:visible":l[2]||(l[2]=i=>u.value=i),modal:"",style:{width:"30vw"}},{default:S(()=>[e("div",ce,[e("div",le,[e("div",ie,[h(D,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",class:"gliters",colors:"primary:#1aff1a,secondary:#1aff1a"}),h(D,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#30e849"})]),e("div",de,[e("div",re,[_e,b(" "+s(d(c).current_user_name),1)]),_.value?(t(),a("p",pe,s(_.value),1)):(t(),a("p",he,"Have a good day !")),e("div",ue,[e("a",me,[e("button",{onClick:l[1]||(l[1]=i=>u.value=!1),type:"button",class:"btn btn-primary"}," Close ")])])])])])]),_:1},8,["visible"]),h(T,{visible:f.value,"onUpdate:visible":l[4]||(l[4]=i=>f.value=i),modal:"",style:{width:"25vw"}},{default:S(()=>[e("div",fe,[e("div",xe,[e("div",ve,[h(D,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",colors:"primary:#ff3300,secondary:#ff3300",class:"gliters"}),h(D,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#e62e00"})]),e("div",ge,[e("h4",be,"Bye "+s(d(c).current_user_name),1),ye,e("div",we,[e("a",ke,[e("button",{type:"button",class:"btn btn-primary",onClick:l[3]||(l[3]=i=>f.value=!1)}," Close ")])])])])])]),_:1},8,["visible"])],64)}}},Me={class:"!h-[180px] rounded-[20px] shadow-sm bg-white"},De={class:"px-6 py-4"},Ce={class:"font-[14px] font-['Poppins'] text-gray-500"},Se={class:"mb-2 text-xl font-semibold"},Pe={class:"grid grid-cols-3 gap-4 mt-4"},je={class:"bg-[#F6F6F6] rounded-lg p-3"},Ee={class:"px-auto"},Fe={class:"mb-2 text-3xl font-bold text-center"},Le=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),Ye=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Present",-1),Ae={class:"p-3 bg-gray-100 rounded-lg"},Te={class:"mb-2 text-3xl font-bold"},Be=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),Ne=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Leave",-1),qe={class:"p-3 bg-gray-100 rounded-lg"},Ie={class:"mb-2 text-3xl font-bold"},Oe=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),Ve=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Absent",-1),ze={__name:"leave_details",setup(v){const c=w();return P(()=>{}),(n,p)=>(t(),a("div",Me,[e("div",De,[e("p",Ce,[b(" Current month - "),e("span",Se,s(d(y)(new Date).format("MMMM")),1)]),e("div",Pe,[e("div",je,[e("div",Ee,[e("span",Fe,s(d(c).attenanceReportPerMonth.present),1),Le]),Ye]),e("div",Ae,[e("span",Te,s(d(c).attenanceReportPerMonth.not_applied),1),Be,Ne]),e("div",qe,[e("span",Ie,s(d(c).attenanceReportPerMonth.absent),1),Oe,Ve])])])]))}};const Ge={class:"bg-white h-[700px] rounded-lg overflow-hidden"},He=V('<div class="flex items-center justify-between p-3 mb-3 bg-gray-100 card-title" id=""><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins]">Activity Log</span></div><div class="h-full overflow-x-scroll"><div class="hover:bg-slate-100 divide-y-2 divide-gray-400"><p class="font-medium text-sm text-center">No activity log to display</p></div></div>',2),Je=[He],Re={__name:"notification",setup(v){return w(),(c,n)=>(t(),a("div",Ge,Je))}};const Ue={class:"p-2 overflow-hidden bg-white rounded-lg",style:{height:"200px"}},We=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Leave Balance",-1),Ke={class:"h-full overflow-x-scroll bg-white rounded-lg"},Qe={class:"px-auto"},Xe={class:"flex px-2"},Ze={class:""},et={class:"text-3xl font-semibold text-black"},tt=e("span",{class:""},"/",-1),st={class:""},ot={class:"px-3"},at={class:"font-semibold text-primary text-[14px] align-bottom py-2"},nt={__name:"leave_balance",setup(v){const c=w();return H(),(n,p)=>(t(),a("div",Ue,[We,e("div",Ke,[e("div",Qe,[(t(!0),a($,null,L(d(c).leaveBalancePerMonthSource,r=>(t(),a("div",{key:r.leave_type,class:"p-2 mx-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"},[e("div",Xe,[e("div",Ze,[e("span",et,s(r.leave_balance),1),tt,e("span",st,s(r.avalied_leaves),1)]),e("div",ot,[e("p",at,s(r.leave_type),1)])])]))),128))])])]))}};const ct={class:"bg-[#FFEFE2] rounded-lg overflow-hidden p-3",style:{height:"200px"}},lt=e("div",{class:"flex justify-between"},[e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Calendar"),e("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-[20px] h-[20px] text-gray-900 cursor-pointer"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"})])],-1),it={class:"py-8"},dt={class:"text-[#d1814c] font-semibold text-[44px] mb-2 font-['Petrona']",style:{}},rt={class:"mb-2 font-semibold text-gray-900 text-[20px]"},_t={__name:"calender",setup(v){return(c,n)=>(t(),a("div",ct,[lt,e("div",it,[e("p",dt,s(d(y)(new Date).format("D, MMMM YYYY")),1),e("p",rt,s(d(y)(new Date).format("dddd")),1)])]))}};const pt=["src","alt"],ht={__name:"holiday_widget",setup(v){const c=x(),n=x(),p=x(),r=()=>{B.get("/holiday/master-page").then(u=>{console.log(u.data),n.value=u.data;let f=!0;u.data.forEach((o,g)=>{f&&new Date(o.holiday_date)>=new Date&&(c.value=g,f=!1)}),p.value=n.value[0].image})};return P(()=>{r()}),(u,f)=>{const o=j("Galleria");return t(),F(o,{value:n.value,responsiveOptions:u.responsiveOptions,numVisible:5,circular:!0,containerStyle:"",class:"!h-[180px] !rounded-[20px] overflow-hidden",showItemNavigators:!0,showThumbnails:!1},{item:S(g=>[e("img",{src:`data:image/png;base64,${g.item.image}`,class:"mt-3 mb-2 !rounded-[20px] shadow-sm !h-[180px]",style:{width:"100%","margin-bottom":"10px",position:"relative",right:"0",bottom:"10px",display:"block"},alt:g.item.holiday_name},null,8,pt)]),_:1},8,["value","responsiveOptions"])}}};const ut={class:"bg-white rounded-lg p-2 mb-16"},mt=e("span",{class:"text-primary font-semibold fs-6"},"Events",-1),ft={class:"h-[500px] overflow-x-scroll"},xt={class:"grid grid-cols-4 gap-4"},vt={class:"font-semibold text-center text-white my-2 text-[12px] font-['Poppins']"},gt={class:"absolute top-8 w-full z-10"},bt={class:"grid grid-cols-2 w-11/12 bg-slate-100 mx-auto rounded-lg h-full"},yt={class:""},wt={class:"font-semibold text-4xl py-4 text-center align-middle text-white"},kt=["src"],$t={class:"h-full"},Mt={class:"py-6"},Dt={key:0,class:"font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto"},Ct={key:1,class:"font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto"},St={class:"font-semibold text-sm text-center text-gray-600 my-auto"},Pt={class:"text-xs absolute right-6 fa fa-commenting-o text-right cursor-pointer","data-bs-target":"#wishes_popup","data-bs-toggle":"modal"},jt=e("div",{class:"flex justify-center my-2"},null,-1),Et=e("div",{id:"wishes_popup",class:"modal fade",role:"dialog"},[e("div",{class:"modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md"},[e("div",{class:"modal-content"},[e("div",{class:"py-2 border-0 modal-header"},[e("h6",{class:"modal-title"}," Wishes Text"),e("button",{type:"button",class:"bg-transparent border-0 outline-none close h3","data-bs-dismiss":"modal","aria-label":"Close"},[e("span",{"aria-hidden":"true"},"×")])]),e("div",{class:"modal-body"},[e("p",{for:"",class:"text-muted f-14 fw-bold"},"Commants here"),e("textarea",{name:"",id:"",cols:"",placeholder:"Commants here....",rows:"2",class:"resize-none form-control"}),e("div",{class:"text-end"},[e("button",{class:"mt-2 btn btn-border-orange",id:""},[e("i",{class:"fa fa-paper-plane me","aria-hidden":"true"}),b(" Send")])])])])])],-1),Ft={__name:"events",setup(v){Y();const c=w(),n=["bg-emerald-600","bg-yellow-600","bg-rose-600","bg-cyan-600","bg-amber-600","bg-red-600","bg-pink-600","bg-green-600","bg-fuchsia-600"],p=["bg-emerald-200","bg-yellow-200","bg-rose-200","bg-cyan-200","bg-amber-200","bg-red-200","bg-pink-200","bg-green-200","bg-fuchsia-200"],r=o=>n[o%n.length],u=o=>p[o%n.length],f=o=>{if(o=="birthday")return"Happy birthday";if(o=="work_anniversery")return"Work anniversary"};return(o,g)=>{const M=z("tooltip");return t(),a($,null,[e("div",ut,[mt,e("div",ft,[e("div",xt,[(t(!0),a($,null,L(d(c).allEventSource,(_,k)=>(t(),a("div",{class:"relative w-[180px] rounded-lg my-8",key:k},[e("div",{class:C(["h-[80px] rounded-lg",`${r(k)}`])},[e("p",vt,s(f(_.type)),1)],2),e("div",gt,[e("div",bt,[e("div",yt,[JSON.parse(_.avatar).type=="shortname"?(t(),a("div",{key:0,class:C([u(k),"h-full rounded-lg"])},[e("p",wt,s(JSON.parse(_.avatar).data),1)],2)):(t(),a("img",{key:1,src:`data:image/png;base64,${JSON.parse(_.avatar).data}`,alt:"",class:"rounded-lg h-full"},null,8,kt))]),e("div",$t,[e("div",Mt,[_.name.length<=8?(t(),a("p",Dt,s(_.name),1)):E((t(),a("p",Ct,[b(s(_.name?_.name.substring(0,8)+"..":""),1)])),[[M,_.name]]),e("p",St,s(d(y)(_.dob).format("DD"))+"th "+s(d(y)(_.dob).format("MMM")),1),e("p",null,[E(e("i",Pt,null,512),[[M,"wish"]])])])])]),jt])]))),128))])])]),Et],64)}}};const Lt={class:"grid grid-cols-12 gap-4"},Yt={class:"col-span-5 w-[100%] !rounded-[20px] overflow-hidden"},At={class:"col-span-4 w-[100%] !rounded-[20px]"},Tt={class:"col-span-3 w-[100%] !rounded-[20px]"},Bt={class:"grid grid-cols-12 gap-4 pb-7"},Nt={class:"col-span-8 !rounded-[20px]"},qt={class:"grid grid-cols-2 gap-4 my-2"},It={class:"!rounded-[20px] overflow-hidden"},Ot={class:"!rounded-[20px] overflow-hidden"},Vt={class:"grid grid-cols-1"},zt={class:"col-span-4 my-2"},Gt={__name:"employee_dashboard",setup(v){const c=w();return(n,p)=>(t(),a("div",{class:"h-screen p-3 overflow-auto",onMousemove:p[0]||(p[0]=r=>d(c).canShowConfiguration=!1)},[e("div",Lt,[e("div",Yt,[h($e)]),e("div",At,[h(ze)]),e("div",Tt,[h(ht)])]),e("div",Bt,[e("div",Nt,[e("div",qt,[e("div",It,[h(nt)]),e("div",Ot,[h(_t)])]),e("div",Vt,[e("div",null,[h(Ft)])])]),e("div",zt,[h(Re)])])],32))}},Zt={__name:"dashboard",setup(v){const c=w(),n=x();return P(async()=>{n.value=!0,await c.getMainDashboardData(),Y(),n.value=!1}),(p,r)=>d(c).canShowLoading?(t(),F(J,{key:0})):(t(),F(G,{key:1,"enter-active-class":"transition ease-out transform duration-600","enter-class":"translate-y-2 opacity-0","enter-to-class":"translate-y-0 opacity-100","leave-active-class":"transition duration-100 ease-in transform","leave-class":"translate-y-0 opacity-100","leave-to-class":"translate-y-2 opacity-0"},{default:S(()=>[h(Gt)]),_:1}))}};export{Zt as _};
