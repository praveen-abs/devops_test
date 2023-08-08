import{o,c as a,at as A,H as u,a3 as V,I as k,g as L,d as e,F as b,f as j,t as i,aj as _,k as E,au as F,h as d,w as $,l as I,j as G,T as N,b as B}from"./toastservice.esm-08a9bf8e.js";import{S as q}from"./Service-6922984d.js";import{u as g}from"./dashboard_service-82896132.js";import{a as H}from"./index-362795f3.js";import{d as M}from"./dayjs.min-2f06af28.js";import{u as Y}from"./leave_apply_service-bfabe98f.js";/* empty css                                                   */import{_ as R}from"./_plugin-vue_export-helper-c27b6911.js";const U={},z={class:"loading-spinner-container"},W=A('<div class="loading-spinner-loader" data-v-69e4a53d><div class="loader--dot" data-v-69e4a53d></div><div class="loader--dot" data-v-69e4a53d></div><div class="loader--dot" data-v-69e4a53d></div><div class="loader--dot" data-v-69e4a53d></div><div class="loader--dot" data-v-69e4a53d></div><div class="loader--dot" data-v-69e4a53d></div><div class="loader--text" data-v-69e4a53d></div></div>',1),J=[W];function K(v,t){return o(),a("div",z,J)}const O=R(U,[["render",K],["__scopeId","data-v-69e4a53d"]]),Q="/build/assets/femaleDashboardImage-7f53f6fa.svg";const X={class:"rounded overflow-hidden shadow-lg bg-white p-3 grid grid-cols-12 gap-4 justify-between leading-normal h-full"},Z={class:"mb-8 col-span-7"},ee={class:"font-medium fs-6 text-gray-500 flex items-center"},te={class:"text-gray-900 font-bold text-2xl mb-2"},se={class:"flex my-2"},oe=e("i",{class:"fa fa-sun-o text-warning my-auto","aria-hidden":"true"},null,-1),ae=e("p",{class:"fs-6 my-auto px-2"},"General Shift",-1),ne={class:"switch-checkbox f-12 text-muted"},ce=e("span",{class:"slider-checkbox check-inw round"},[e("span",{class:"slider-checkbox-text"})],-1),le=e("div",null,[e("p",{class:"text-sm text-gray-600 flex items-center"},[I(" Time duration:"),e("span",null,"09:30")])],-1),ie=e("div",{class:"col-span-5 h-full"},[e("div",{class:"grid justify-center items-centers my-auto h-full"},[e("img",{src:Q,alt:"",srcset:"",class:"w-full h-full"})])],-1),de={class:"modal-content bg-white"},re={class:"p-1 text-center modal-body"},_e={class:"check-in-animate"},ue={class:"mt-2"},he={class:"mb-2"},ve={key:0,class:"mb-4 text-muted"},pe={key:1,class:"mb-4 text-muted"},me={class:"gap-2 hstack justify-content-center"},fe={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},ge={class:"modal-content bg-white"},ye={class:"p-1 text-center modal-body"},xe={class:"check-in-animate"},be={class:"mt-4"},we={class:"mb-3"},$e=e("p",{class:"mb-4 text-muted"},"See you tommorrow",-1),ke={class:"gap-2 hstack justify-content-center"},je={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},De={__name:"welcome_card",setup(v){const t=q(),s=g(),c=u();u();const r=u([]),p=u(!1),h=u(!1),l=V({date:new Date,check:"",check_in:"",check_out:"",attendance_mode:"web",work_mode:"",checked:!1}),y=()=>{var m=new Date,n=m.getHours();n<12?c.value="Good Morning":n<18?c.value="Good Afternoon":c.value="Good Evening"},D=()=>{r.value.splice(0,r.value.length),l.check==!0?(l.check_in=new Date().toLocaleTimeString(),l.checked=!0,p.value=!0):(l.check_out=new Date().toLocaleTimeString(),h.value=!0,l.checked=!1),s.updateCheckin_out({checked:l.checked}).then(m=>{x.value=m.data.message}).finally(()=>{S(),T()})},x=u(),S=async()=>{let m="/fetchEmpLastAttendanceStatus";await H.get(m).then(n=>{console.log(n.data),r.value.push(n.data),n.data.checkout_time?l.check=!1:n.data.checkin_time?l.check=!0:l.check=null})};k(()=>{y(),S()});const T=()=>{s.check="",s.check_in="",s.check_out="",s.work_mode=""};return(m,n)=>{const w=L("lord-icon"),C=L("Dialog");return o(),a(b,null,[e("div",X,[(o(!0),a(b,null,j(r.value,f=>(o(),a("div",Z,[e("p",ee,i(c.value),1),e("div",te,i(_(t).current_user_name),1),e("div",se,[oe,ae,e("label",ne,[E(e("input",{type:"checkbox",id:"checkin_function",class:"f-13 text-muted","onUpdate:modelValue":n[0]||(n[0]=P=>l.check=P),onChange:D},null,544),[[F,l.check]]),ce])]),le]))),256)),ie]),d(C,{visible:p.value,"onUpdate:visible":n[2]||(n[2]=f=>p.value=f),modal:"",style:{width:"25vw"}},{default:$(()=>[e("div",de,[e("div",re,[e("div",_e,[d(w,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",class:"gliters",colors:"primary:#1aff1a,secondary:#1aff1a"}),d(w,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#30e849"})]),e("div",ue,[e("h4",he,"Welcome "+i(_(t).current_user_name),1),x.value?(o(),a("p",ve,i(x.value),1)):(o(),a("p",pe,"Have a good day !")),e("div",me,[e("a",fe,[e("button",{onClick:n[1]||(n[1]=f=>p.value=!1),type:"button",class:"btn btn-primary"}," Close ")])])])])])]),_:1},8,["visible"]),d(C,{visible:h.value,"onUpdate:visible":n[4]||(n[4]=f=>h.value=f),modal:"",style:{width:"25vw"}},{default:$(()=>[e("div",ge,[e("div",ye,[e("div",xe,[d(w,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",colors:"primary:#ff3300,secondary:#ff3300",class:"gliters"}),d(w,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#e62e00"})]),e("div",be,[e("h4",we,"Bye "+i(_(t).current_user_name),1),$e,e("div",ke,[e("a",je,[e("button",{type:"button",class:"btn btn-primary",onClick:n[3]||(n[3]=f=>h.value=!1)}," Close ")])])])])])]),_:1},8,["visible"])],64)}}},Me={class:"rounded overflow-hidden shadow-lg bg-white h-full"},Se={class:"px-6 py-4"},Ce={class:"font-medium fs-6 text-gray-500"},Le={class:"font-semibold text-xl mb-2"},Be={class:"grid grid-cols-3 gap-4 mt-4"},Ae={class:"bg-gray-100 rounded-lg p-3"},Ee={class:"px-auto"},Ie={class:"font-bold text-3xl mb-2 text-center"},Ne=e("span",{class:"text-gray-700 text-base px-1"},"days",-1),qe=e("p",{class:"font-semibold text-lg text-gray-500 py-2 text-center"},"Present",-1),He={class:"bg-gray-100 rounded-lg p-3"},Te={class:"font-bold text-3xl mb-2"},Pe=e("span",{class:"text-gray-700 text-base px-1"},"days",-1),Ve=e("p",{class:"font-semibold text-lg text-gray-500 py-2 text-center"},"Leave",-1),Fe={class:"bg-gray-100 rounded-lg p-3"},Ge={class:"font-bold text-3xl mb-2"},Ye=e("span",{class:"text-gray-700 text-base px-1"},"days",-1),Re=e("p",{class:"font-semibold text-lg text-gray-500 py-2 text-center"},"Absent",-1),Ue={__name:"leave_details",setup(v){const t=g();return k(()=>{}),(s,c)=>(o(),a("div",Me,[e("div",Se,[e("p",Ce,[I(" current month - "),e("span",Le,i(_(M)(new Date).format("MMMM")),1)]),e("div",Be,[e("div",Ae,[e("div",Ee,[e("span",Ie,i(_(t).attenanceReportPerMonth.present),1),Ne]),qe]),e("div",He,[e("span",Te,i(_(t).attenanceReportPerMonth.not_applied),1),Pe,Ve]),e("div",Fe,[e("span",Ge,i(_(t).attenanceReportPerMonth.absent),1),Ye,Re])])])]))}},ze={class:"bg-white h-[700px] rounded-lg overflow-hidden p-2"},We={class:"mb-3 card-title flex items-center justify-between",id:""},Je=e("span",{class:"text-primary font-semibold fs-6"},"Notifications",-1),Ke={class:"pi pi-bell p-overlay-badge px-4",style:{"font-size":"1rem"}},Oe={class:"overflow-x-scroll h-full"},Qe={class:"p-2"},Xe={class:"notify-content text-black"},Ze={class:"mb-1 orange-median items-center flex justify-between"},et={class:"orange-median font-semibold text-sm"},tt={class:"notify-message"},st={class:"text-xs text-gray-600 font-medium"},ot={__name:"notification",setup(v){const t=g(),s=c=>c.length;return(c,r)=>{const p=G("badge");return o(),a("div",ze,[e("div",We,[Je,E(e("i",Ke,null,512),[[p,s(_(t).allNotificationSource)]])]),e("div",Oe,[(o(!0),a(b,null,j(_(t).allNotificationSource,h=>(o(),a("div",{class:"p-1 my-1 rounded-lg shadow-md hover:bg-slate-100",key:h.id},[e("div",Qe,[e("a",Xe,[e("p",Ze,[e("span",et,i(h.notification_title),1)]),e("div",tt,[e("p",st,i(h.notification_body),1)])])])]))),128))])])}}};const at={class:"bg-white rounded-lg overflow-hidden p-2",style:{height:"200px"}},nt=e("span",{class:"text-primary font-semibold fs-6"},"Leave Balance",-1),ct={class:"bg-white rounded-lg overflow-x-scroll h-full"},lt={class:"px-auto"},it={class:"flex px-2"},dt={class:""},rt={class:""},_t={class:"text-3xl font-semibold text-black"},ut=e("span",{class:""},"/",-1),ht={class:""},vt={class:"px-3"},pt={class:"font-semibold text-primary text-[14px] align-bottom"},mt={__name:"leave_balance",setup(v){const t=g();return Y(),(s,c)=>(o(),a("div",at,[nt,e("div",ct,[e("div",lt,[(o(!0),a(b,null,j(_(t).leaveBalancePerMonthSource,r=>(o(),a("div",{key:r.leave_type,class:"bg-gray-200 my-2 p-2 mx-2 rounded-lg"},[e("div",it,[e("div",dt,[e("div",rt,[e("span",_t,i(r.leave_balance),1),ut,e("span",ht,i(r.avalied_leaves),1)])]),e("div",vt,[e("p",pt,i(r.leave_type),1)])])]))),128))])])]))}};const ft={class:"bg-[#FFEFE2] rounded-lg overflow-hidden p-3",style:{height:"200px"}},gt=e("div",{class:"flex justify-between"},[e("span",{class:"text-primary font-semibold fs-6"},"Calendar"),e("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-6 h-6 text-gray-900 cursor-pointer"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"})])],-1),yt={class:"py-8"},xt={class:"text-[#d1814c] font-semibold text-[30px] mb-2",style:{"font-family":"'Libre Baskerville', serif"}},bt={class:"text-gray-900 font-semibold text-md mb-2"},wt={__name:"calender",setup(v){return(t,s)=>(o(),a("div",ft,[gt,e("div",yt,[e("p",xt,i(_(M)(new Date).format("MMMM D, YYYY")),1),e("p",bt,i(_(M)(new Date).format("dddd")),1)])]))}};const $t={class:"image-slider relative h-full w-full"},kt=["src"],jt=e("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-6 h-6"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5"})],-1),Dt=[jt],Mt=e("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-6 h-6"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5"})],-1),St=[Mt],Ct={__name:"holiday_widget",setup(v){const t=u(),s=u(),c=u(),r=()=>{H.get("/holiday/master-page").then(l=>{console.log(l.data),s.value=l.data;let y=!0;l.data.forEach((D,x)=>{y&&new Date(D.holiday_date)>=new Date&&(t.value=x,y=!1)}),c.value=s.value[t.value].image})};function p(){t.value=(t.value+1)%s.value.length,c.value=s.value[t.value].image}function h(){t.value=(t.value-1+s.value.length)%s.value.length,c.value=s.value[t.value].image}return k(()=>{r()}),(l,y)=>(o(),a("div",$t,[d(N,{name:"fade",mode:"out-in"},{default:$(()=>[(o(),a("img",{src:`data:image/jpeg;base64,${c.value}`,key:c.value,alt:"Holiday Image",class:"h-full w-full rounded-lg"},null,8,kt))]),_:1}),e("div",{class:"controls absolute top-16 w-full px-3"},[e("div",{class:"flex justify-between"},[e("button",{class:"sliderButton",onClick:h},Dt),e("button",{class:"sliderButton",onClick:p},St)])])]))}},Lt="/build/assets/sampleAvatar-daff5f9d.jpg";const Bt={class:"bg-white rounded-lg p-2 mb-16"},At=e("span",{class:"text-primary font-semibold fs-6"},"Events",-1),Et={class:"h-[500px] overflow-x-scroll"},It={class:"grid grid-cols-4 gap-4"},Nt={class:"relative w-[180px] rounded-lg my-8"},qt=A('<div class="bg-green-800 h-[100px] rounded-lg"><p class="semibold text-xl text-center text-white my-2">Happy Birthday</p></div><div class="absolute top-10 w-full z-10"><div class="grid grid-cols-2 w-11/12 bg-slate-100 mx-auto rounded-lg"><div class=""><img src="'+Lt+'" alt=""></div><div class="h-full"><div class="py-10"><p class="font-semibold text-lg text-center text-black my-auto">Narasimma</p><p class="font-medium text-md text-center text-black my-auto">Developer</p></div></div></div><div class="flex justify-center my-2"></div></div>',2),Ht=[qt],Tt={__name:"events",setup(v){return g(),u("h-10"),(t,s)=>(o(),a("div",Bt,[At,e("div",Et,[e("div",It,[(o(),a(b,null,j(9,c=>e("div",Nt,Ht)),64))])])]))}};const Pt={class:"p-3 overflow-auto h-screen"},Vt={class:"grid grid-cols-12 gap-4"},Ft={class:"col-span-4"},Gt={class:"col-span-4"},Yt={class:"bg-white rounded-lg col-span-4"},Rt={class:"grid grid-cols-12 gap-4 pb-7"},Ut={class:"col-span-8"},zt={class:"grid grid-cols-2 gap-4 my-2"},Wt={class:"grid grid-cols-1"},Jt={class:"col-span-4 my-2"},Kt={__name:"employee_dashboard",setup(v){return(t,s)=>(o(),a("div",Pt,[e("div",Vt,[e("div",Ft,[d(De)]),e("div",Gt,[d(Ue)]),e("div",Yt,[d(Ct)])]),e("div",Rt,[e("div",Ut,[e("div",zt,[e("div",null,[d(mt)]),e("div",null,[d(wt)])]),e("div",Wt,[e("div",null,[d(Tt)])])]),e("div",Jt,[d(ot)])])]))}},as={__name:"dashboard",setup(v){const t=g(),s=u();return k(async()=>{s.value=!0,await t.getMainDashboardData(),q(),s.value=!1}),(c,r)=>_(t).canShowLoading?(o(),B(O,{key:0})):(o(),B(N,{key:1,"enter-active-class":"transition ease-out duration-600 transform","enter-class":"opacity-0 translate-y-2","enter-to-class":"opacity-100 translate-y-0","leave-active-class":"transition ease-in duration-100 transform","leave-class":"opacity-100 translate-y-0","leave-to-class":"opacity-0 translate-y-2"},{default:$(()=>[d(Kt)]),_:1}))}};export{as as _};
