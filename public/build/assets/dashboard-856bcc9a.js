import{I as x,a2 as I,ak as j,g as P,o as t,c as a,d as e,F as M,f as L,t as o,aj as d,k as E,J as O,n as $,l as b,h,w as S,au as V,b as F,j as G,T as z}from"./toastservice.esm-bb367a00.js";import{S as Y}from"./Service-46bedac1.js";import{u as w}from"./dashboard_service-bfa40380.js";import{a as B}from"./index-362795f3.js";import{d as y}from"./dayjs.min-2f06af28.js";import{u as H}from"./leave_apply_service-daddfee5.js";/* empty css                                                   */import{L as J}from"./LoadingSpinner-5f35547c.js";const R="/build/assets/femaleDashboardImage-7f53f6fa.svg";const U={class:"!h-[180px] w-[100%] overflow-hidden rounded-xl shadow-lg bg-[#DFE8FF] p-3 grid grid-cols-12 gap-4 justify-between leading-normal"},W={class:"font-[14px] font-['Poppins'] text-gray-500 flex items-center"},K={class:"text-gray-900 text-[18px] mb-2 font-['Poppins']"},Q={class:"flex gap-4 items-center"},X=e("div",{class:"flex my-1 overflow-visible items-center !z-10"},[e("i",{class:"fa fa-sun-o text-warning my-auto text-[20px]","aria-hidden":"true"}),e("p",{class:"text-[12px] my-auto font-semibold px-2"},"General Shift")],-1),Z={class:"btn-status"},ee={class:"text-[12px] text-[#8B8B8B] font-['Poppins'] flex items-center"},te={key:0,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},se={key:1,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},oe={key:2,class:"w-[300px] max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},ae={key:3,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},ne=e("div",{class:"col-span-5 h-full !z-5"},[e("div",{class:"grid justify-center items-centers my-auto h-full border-[1px]"},[e("img",{src:R,alt:"",srcset:"",class:"w-full h-full"})])],-1),ce={class:"bg-white modal-content"},le={class:"p-1 text-center modal-body"},ie={class:"check-in-animate"},de={class:"mt-2"},re={class:"text-gray-900 text-[18px] mb-2 font-['Poppins']"},_e=e("span",null,"Welcome",-1),pe={key:0,class:"mb-4 text-muted"},he={key:1,class:"mb-4 text-muted"},ue={class:"gap-2 hstack justify-content-center"},me={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},fe={class:"bg-white modal-content"},xe={class:"p-1 text-center modal-body"},ge={class:"check-in-animate"},ve={class:"mt-4"},be={class:"mb-3"},ye=e("p",{class:"mb-4 text-muted"},"See you tommorrow",-1),we={class:"gap-2 hstack justify-content-center"},ke={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},$e={__name:"welcome_card",setup(g){const c=Y(),n=w(),p=x();x();const r=x([]),u=x(!1),f=x(!1),s=I({date:new Date,check:"",check_in:"",check_out:"",attendance_mode:"web",work_mode:"",checked:!1}),v=()=>{var m=new Date,l=m.getHours();l<12?p.value="Good Morning":l<18?p.value="Good Afternoon":p.value="Good Evening"},D=()=>{r.value.splice(0,r.value.length),s.check==!0?(s.check_in=new Date().toLocaleTimeString(),s.checked=!0,u.value=!0):(s.check_out=new Date().toLocaleTimeString(),f.value=!0,s.checked=!1),n.updateCheckin_out({checked:s.checked}).then(m=>{_.value=m.data.message}).finally(()=>{k(),N()})},_=x(),k=async()=>{let m="/fetchEmpLastAttendanceStatus";await B.get(m).then(l=>{console.log(l.data),r.value.push(l.data),l.data.checkout_time?s.check=!1:l.data.checkin_time?s.check=!0:s.check=null}).finally(()=>{n.canShowTopbar=!0})};j(()=>{v(),k()});const A=m=>(console.log(m),m=="biometric"?"fas fa-fingerprint fs-12":m=="web"?"fa fa-laptop fs-12":m=="mobile"?"fa fa-mobile-phone fs-12":""),N=()=>{n.check="",n.check_in="",n.check_out="",n.work_mode=""};return(m,l)=>{const C=P("lord-icon"),T=P("Dialog");return t(),a(M,null,[e("div",U,[(t(!0),a(M,null,L(r.value,i=>(t(),a("div",{class:"col-span-7 mb-8",key:i},[e("p",W,o(p.value),1),e("div",K,o(d(c).current_user_name),1),e("div",Q,[X,e("div",Z,[E(e("input",{type:"checkbox",name:"checkbox",id:"checkbox",class:"hidden","onUpdate:modelValue":l[0]||(l[0]=q=>s.check=q),onChange:D},null,544),[[O,s.check]]),e("label",{for:"checkbox",class:$(["relative inline-block w-12 h-5 rounded-lg transition duration-300 cursor-pointer",[s.check?" bg-green-100":"bg-red-100"]])},[e("span",{class:$(["absolute inset-0 inline-block w-5 h-5 rounded-full shadow transform transition-transform cursor-pointer",[s.check?"translate-x-6 bg-green-400":"bg-red-400"]])},null,2)],2)])]),e("div",null,[e("p",ee,[b(" Time duration:"),e("span",null,o(i.effective_hours?i.effective_hours:0),1)]),i.checkin_time?(t(),a("p",te,[b(o(`Check-In : ${i.checkin_time} (${d(y)(i.checkin_date).format("MMM D, YYYY")}) `)+" ",1),e("i",{class:$(["mx-2 text-sm font-semibold text-green-800",A(i.attendance_mode_checkin)])},null,2)])):(t(),a("p",se,o(`Check-In:
                    --:--:--`))),i.checkout_time?(t(),a("p",oe,[b(o(`Check-Out : ${i.checkout_time} (${d(y)(i.checkout_date).format("MMM D, YYYY")}) `)+" ",1),e("i",{class:$(["mx-2 text-sm font-semibold text-green-800",A(i.attendance_mode_checkout)])},null,2)])):(t(),a("p",ae,o(`Check-Out:
                    --:--:--`)))])]))),128)),ne]),h(T,{visible:u.value,"onUpdate:visible":l[2]||(l[2]=i=>u.value=i),modal:"",style:{width:"30vw"}},{default:S(()=>[e("div",ce,[e("div",le,[e("div",ie,[h(C,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",class:"gliters",colors:"primary:#1aff1a,secondary:#1aff1a"}),h(C,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#30e849"})]),e("div",de,[e("div",re,[_e,b(" "+o(d(c).current_user_name),1)]),_.value?(t(),a("p",pe,o(_.value),1)):(t(),a("p",he,"Have a good day !")),e("div",ue,[e("a",me,[e("button",{onClick:l[1]||(l[1]=i=>u.value=!1),type:"button",class:"btn btn-primary"}," Close ")])])])])])]),_:1},8,["visible"]),h(T,{visible:f.value,"onUpdate:visible":l[4]||(l[4]=i=>f.value=i),modal:"",style:{width:"25vw"}},{default:S(()=>[e("div",fe,[e("div",xe,[e("div",ge,[h(C,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",colors:"primary:#ff3300,secondary:#ff3300",class:"gliters"}),h(C,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#e62e00"})]),e("div",ve,[e("h4",be,"Bye "+o(d(c).current_user_name),1),ye,e("div",we,[e("a",ke,[e("button",{type:"button",class:"btn btn-primary",onClick:l[3]||(l[3]=i=>f.value=!1)}," Close ")])])])])])]),_:1},8,["visible"])],64)}}},Me={class:"!h-[180px] rounded-[20px] shadow-sm bg-white"},De={class:"px-6 py-4"},Ce={class:"font-[14px] font-['Poppins'] text-gray-500"},Se={class:"mb-2 text-xl font-semibold"},je={class:"grid grid-cols-3 gap-4 mt-4"},Pe={class:"bg-[#F6F6F6] rounded-lg p-3"},Ee={class:"px-auto"},Fe={class:"mb-2 text-3xl font-bold text-center"},Le=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),Ye=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Present",-1),Ae={class:"p-3 bg-gray-100 rounded-lg"},Te={class:"mb-2 text-3xl font-bold"},Be=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),Ne=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Leave",-1),qe={class:"p-3 bg-gray-100 rounded-lg"},Ie={class:"mb-2 text-3xl font-bold"},Oe=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),Ve=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Absent",-1),Ge={__name:"leave_details",setup(g){const c=w();return j(()=>{}),(n,p)=>(t(),a("div",Me,[e("div",De,[e("p",Ce,[b(" Current month - "),e("span",Se,o(d(y)(new Date).format("MMMM")),1)]),e("div",je,[e("div",Pe,[e("div",Ee,[e("span",Fe,o(d(c).attenanceReportPerMonth.present),1),Le]),Ye]),e("div",Ae,[e("span",Te,o(d(c).attenanceReportPerMonth.not_applied),1),Be,Ne]),e("div",qe,[e("span",Ie,o(d(c).attenanceReportPerMonth.absent),1),Oe,Ve])])])]))}};const ze={class:"bg-white h-[700px] rounded-lg overflow-hidden"},He=V('<div class="flex items-center justify-between p-3 mb-3 bg-gray-100 card-title" id=""><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins]">Activity Log</span></div><div class="h-full overflow-x-scroll"><div class="hover:bg-slate-100 divide-y-2 divide-gray-400"><p class="font-medium text-sm text-center">No activity log to display</p></div></div>',2),Je=[He],Re={__name:"notification",setup(g){return w(),(c,n)=>(t(),a("div",ze,Je))}};const Ue={class:"p-2 overflow-hidden bg-white rounded-lg",style:{height:"200px"}},We=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Leave Balance",-1),Ke={class:"h-full overflow-x-scroll bg-white rounded-lg"},Qe={class:"px-auto"},Xe={class:"flex px-2"},Ze={class:""},et={class:"text-3xl font-semibold text-black"},tt=e("span",{class:""},"/",-1),st={class:""},ot={class:"px-3"},at={class:"font-semibold text-primary text-[14px] align-bottom py-2"},nt={__name:"leave_balance",setup(g){const c=w();return H(),(n,p)=>(t(),a("div",Ue,[We,e("div",Ke,[e("div",Qe,[(t(!0),a(M,null,L(d(c).leaveBalancePerMonthSource,r=>(t(),a("div",{key:r.leave_type,class:"p-2 mx-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"},[e("div",Xe,[e("div",Ze,[e("span",et,o(r.leave_balance),1),tt,e("span",st,o(r.avalied_leaves),1)]),e("div",ot,[e("p",at,o(r.leave_type),1)])])]))),128))])])]))}};const ct={class:"bg-[#FFEFE2] rounded-lg overflow-hidden p-3",style:{height:"200px"}},lt=e("div",{class:"flex justify-between"},[e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Calendar"),e("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-[20px] h-[20px] text-gray-900 cursor-pointer"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"})])],-1),it={class:"py-8"},dt={class:"text-[#d1814c] font-semibold text-[44px] mb-2 font-['Petrona']",style:{}},rt={class:"mb-2 font-semibold text-gray-900 text-[20px]"},_t={__name:"calender",setup(g){return(c,n)=>(t(),a("div",ct,[lt,e("div",it,[e("p",dt,o(d(y)(new Date).format("D, MMMM YYYY")),1),e("p",rt,o(d(y)(new Date).format("dddd")),1)])]))}};const pt=["src","alt"],ht={__name:"holiday_widget",setup(g){const c=x(),n=x(),p=x(),r=()=>{B.get("/holiday/master-page").then(u=>{console.log(u.data),n.value=u.data;let f=!0;u.data.forEach((s,v)=>{f&&new Date(s.holiday_date)>=new Date&&(c.value=v,f=!1)}),p.value=n.value[0].image})};return j(()=>{r()}),(u,f)=>{const s=P("Galleria");return t(),F(s,{value:n.value,responsiveOptions:u.responsiveOptions,numVisible:5,circular:!0,containerStyle:"",class:"!h-[180px] !rounded-[20px] overflow-hidden",showItemNavigators:!0,showThumbnails:!1},{item:S(v=>[e("img",{src:`data:image/png;base64,${v.item.image}`,class:"mt-3 mb-2 !rounded-[20px] shadow-sm !h-[180px]",style:{width:"100%","margin-bottom":"10px",position:"relative",right:"0",bottom:"10px",display:"block"},alt:v.item.holiday_name},null,8,pt)]),_:1},8,["value","responsiveOptions"])}}};const ut={class:"bg-white rounded-lg p-2 mb-16"},mt=e("span",{class:"text-primary font-semibold fs-6"},"Events",-1),ft={class:"h-[500px] overflow-x-scroll"},xt={class:"grid grid-cols-4 gap-4"},gt={class:"font-semibold text-center text-white my-2 text-[12px] font-['Poppins']"},vt={class:"absolute top-8 w-full z-10"},bt={class:"grid grid-cols-2 w-11/12 bg-slate-100 mx-auto rounded-lg h-full"},yt={class:""},wt={class:"font-semibold text-4xl py-4 text-center align-middle text-white"},kt=["src"],$t={class:"h-full"},Mt={class:"py-6"},Dt={key:0,class:"font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto"},Ct={key:1,class:"font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto"},St={class:"font-semibold text-sm text-center text-gray-600 my-auto"},jt={class:"text-xs absolute right-6 fa fa-commenting-o text-right cursor-pointer","data-bs-target":"#wishes_popup","data-bs-toggle":"modal"},Pt=e("div",{class:"flex justify-center my-2"},null,-1),Et=e("div",{id:"wishes_popup",class:"modal fade",role:"dialog"},[e("div",{class:"modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md"},[e("div",{class:"modal-content"},[e("div",{class:"py-2 border-0 modal-header"},[e("h6",{class:"modal-title"}," Wishes Text"),e("button",{type:"button",class:"bg-transparent border-0 outline-none close h3","data-bs-dismiss":"modal","aria-label":"Close"},[e("span",{"aria-hidden":"true"},"×")])]),e("div",{class:"modal-body"},[e("p",{for:"",class:"text-muted f-14 fw-bold"},"Commants here"),e("textarea",{name:"",id:"",cols:"",placeholder:"Commants here....",rows:"2",class:"resize-none form-control"}),e("div",{class:"text-end"},[e("button",{class:"mt-2 btn btn-border-orange",id:""},[e("i",{class:"fa fa-paper-plane me","aria-hidden":"true"}),b(" Send")])])])])])],-1),Ft={__name:"events",setup(g){Y();const c=w(),n=["bg-emerald-600","bg-yellow-600","bg-rose-600","bg-cyan-600","bg-amber-600","bg-red-600","bg-pink-600","bg-green-600","bg-fuchsia-600"],p=["bg-emerald-200","bg-yellow-200","bg-rose-200","bg-cyan-200","bg-amber-200","bg-red-200","bg-pink-200","bg-green-200","bg-fuchsia-200"],r=s=>n[s%n.length],u=s=>p[s%n.length],f=s=>{if(s=="birthday")return"Happy birthday";if(s=="work_anniversery")return"Work anniversary"};return(s,v)=>{const D=G("tooltip");return t(),a(M,null,[e("div",ut,[mt,e("div",ft,[e("div",xt,[(t(!0),a(M,null,L(d(c).allEventSource,(_,k)=>(t(),a("div",{class:"relative w-[180px] rounded-lg my-8",key:k},[e("div",{class:$(["h-[80px] rounded-lg",`${r(k)}`])},[e("p",gt,o(f(_.type)),1)],2),e("div",vt,[e("div",bt,[e("div",yt,[JSON.parse(_.avatar).type=="shortname"?(t(),a("div",{key:0,class:$([u(k),"h-full rounded-lg"])},[e("p",wt,o(JSON.parse(_.avatar).data),1)],2)):(t(),a("img",{key:1,src:`data:image/png;base64,${JSON.parse(_.avatar).data}`,alt:"",class:"rounded-lg h-full"},null,8,kt))]),e("div",$t,[e("div",Mt,[_.name.length<=8?(t(),a("p",Dt,o(_.name),1)):E((t(),a("p",Ct,[b(o(_.name?_.name.substring(0,8)+"..":""),1)])),[[D,_.name]]),e("p",St,o(d(y)(_.dob).format("DD"))+"th "+o(d(y)(_.dob).format("MMM")),1),e("p",null,[E(e("i",jt,null,512),[[D,"wish"]])])])])]),Pt])]))),128))])])]),Et],64)}}};const Lt={class:"grid grid-cols-12 gap-4"},Yt={class:"col-span-5 w-[100%] !rounded-[20px] overflow-hidden"},At={class:"col-span-4 w-[100%] !rounded-[20px]"},Tt={class:"col-span-3 w-[100%] !rounded-[20px]"},Bt={class:"grid grid-cols-12 gap-4 pb-7"},Nt={class:"col-span-8 !rounded-[20px]"},qt={class:"grid grid-cols-2 gap-4 my-2"},It={class:"!rounded-[20px] overflow-hidden"},Ot={class:"!rounded-[20px] overflow-hidden"},Vt={class:"grid grid-cols-1"},Gt={class:"col-span-4 my-2"},zt={__name:"employee_dashboard",setup(g){const c=w();return(n,p)=>(t(),a("div",{class:"h-screen p-3 overflow-auto",onMousemove:p[0]||(p[0]=r=>d(c).canShowConfiguration=!1)},[e("div",Lt,[e("div",Yt,[h($e)]),e("div",At,[h(Ge)]),e("div",Tt,[h(ht)])]),e("div",Bt,[e("div",Nt,[e("div",qt,[e("div",It,[h(nt)]),e("div",Ot,[h(_t)])]),e("div",Vt,[e("div",null,[h(Ft)])])]),e("div",Gt,[h(Re)])])],32))}},Zt={__name:"dashboard",setup(g){const c=w(),n=x();return j(async()=>{n.value=!0,await c.getMainDashboardData(),Y(),n.value=!1}),(p,r)=>d(c).canShowLoading?(t(),F(J,{key:0})):(t(),F(z,{key:1,"enter-active-class":"transition ease-out transform duration-600","enter-class":"translate-y-2 opacity-0","enter-to-class":"translate-y-0 opacity-100","leave-active-class":"transition duration-100 ease-in transform","leave-class":"translate-y-0 opacity-100","leave-to-class":"translate-y-2 opacity-0"},{default:S(()=>[h(zt)]),_:1}))}};export{Zt as _};
