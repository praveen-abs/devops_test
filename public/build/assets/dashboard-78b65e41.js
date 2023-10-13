import{r as m,z as q,o as A,c as w,e as n,f as i,g as e,F as E,m as T,t as d,h as s,w as Y,A as G,p as F,i as S,n as r,l as k,B as z,d as W,_ as J,j as M,C as K,D as Q,k as V,E as X,G as Z}from"./app-0d86d2e8.js";import{S as O}from"./Service-3f402bb5.js";import{u as $}from"./hr_dashboard.vue_vue_type_style_index_0_lang-8254ca47.js";import{a as B}from"./index-362795f3.js";import{d as D}from"./dayjs.min-2f06af28.js";import{u as ee}from"./LeaveApply.vue_vue_type_style_index_0_lang-1cbb7cee.js";import"./exceljs.min-edd65134.js";import{L as te}from"./LoadingSpinner-a2199fe4.js";import{_ as se}from"./no-data-d6f55554.js";import{p as oe}from"./ProfilePagesStore-1402078a.js";import"./autoprefixer-a7eb6252.js";import"./moment-fbc5633a.js";import"./_commonjs-dynamic-modules-302442b1.js";/* empty css                                                                       */const ae="/build/assets/Page-is-under-construction-9e66b52e.svg",ne="/build/assets/femaleDashboardImage-7f53f6fa.svg",le={class:"!h-[180px] w-[100%] overflow-hidden rounded-xl shadow-lg bg-[#DFE8FF] p-3 grid grid-cols-12 gap-4 justify-between leading-normal"},ie={class:"font-[14px] font-['Poppins'] text-gray-500 flex items-center"},re={class:"text-gray-900 text-[18px] mb-2 font-['Poppins']"},ce={class:"flex gap-4 items-center"},de=e("div",{class:"flex my-1 overflow-visible items-center !z-10"},[e("i",{class:"fa fa-sun-o text-warning my-auto text-[20px]","aria-hidden":"true"}),e("p",{class:"text-[12px] my-auto font-semibold px-2"},"General Shift")],-1),pe={class:"btn-status"},_e={class:"text-[12px] text-[#8B8B8B] font-['Poppins'] flex items-center"},ue={key:0,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},he={key:1,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},me={key:2,class:"w-[300px] max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},fe={key:3,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},ve=e("div",{class:"col-span-5 h-full !z-5"},[e("div",{class:"grid justify-center items-centers my-auto h-full border-[1px]"},[e("img",{src:ne,alt:"",srcset:"",class:"w-full h-full"})])],-1),ge={class:"bg-white modal-content"},be={class:"p-1 text-center modal-body"},xe={class:"check-in-animate"},ye={class:"mt-2"},we={class:"text-gray-900 text-[18px] mb-2 font-['Poppins']"},$e=e("span",null,"Welcome",-1),ke={key:0,class:"mb-4 text-muted"},Ce={key:1,class:"mb-4 text-muted"},De={class:"gap-2 hstack justify-content-center"},Se={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},Ee={class:"bg-white modal-content"},Me={class:"p-1 text-center modal-body"},Pe={class:"check-in-animate"},je={class:"mt-4"},Fe={class:"mb-3"},Re=e("p",{class:"mb-4 text-muted"},"See you tommorrow",-1),Le={class:"gap-2 hstack justify-content-center"},Ae={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},Ne={__name:"welcome_card",setup(f){const t=O(),c=$(),l=m();m();const _=m([]),p=m(!1),o=m(!1),a=q({date:new Date,check:"",check_in:"",check_out:"",attendance_mode:"web",work_mode:"",checked:!1}),C=()=>{var v=new Date,h=v.getHours();h<12?l.value="Good Morning":h<18?l.value="Good Afternoon":l.value="Good Evening"},b=()=>{_.value.splice(0,_.value.length),a.check==!0?(a.check_in=new Date().toLocaleTimeString(),a.checked=!0,p.value=!0):(a.check_out=new Date().toLocaleTimeString(),o.value=!0,a.checked=!1),c.updateCheckin_out({checked:a.checked}).then(v=>{x.value=v.data.message}).finally(()=>{y(),L()})},u=m(!0),x=m(),y=async()=>{let v="/fetchEmpLastAttendanceStatus";await B.get(v).then(h=>{console.log(h.data),_.value.push(h.data),h.data.checkout_time?a.check=!1:h.data.checkin_time?a.check=!0:a.check=null}).finally(()=>{c.canShowTopbar=!0})};A(async()=>{C(),u&&await y().finally(()=>{u.value=!1})});const R=v=>(console.log(v),v=="biometric"?"fas fa-fingerprint fs-12":v=="web"?"fa fa-laptop fs-12":v=="mobile"?"fa fa-mobile-phone fs-12":""),L=()=>{c.check="",c.check_in="",c.check_out="",c.work_mode=""};return(v,h)=>{const j=w("lord-icon"),N=w("Dialog");return n(),i(E,null,[e("div",le,[(n(!0),i(E,null,T(_.value,g=>(n(),i("div",{class:"col-span-7 mb-8",key:g},[e("p",ie,d(l.value),1),e("div",re,d(s(t).current_user_name),1),e("div",ce,[de,e("div",pe,[Y(e("input",{type:"checkbox",name:"checkbox",id:"checkbox",class:"hidden","onUpdate:modelValue":h[0]||(h[0]=I=>a.check=I),onChange:b},null,544),[[G,a.check]]),e("label",{for:"checkbox",class:F(["relative inline-block w-12 h-5 rounded-lg transition duration-300 cursor-pointer",[a.check?" bg-green-100":"bg-red-100"]])},[e("span",{class:F(["absolute inset-0 inline-block w-5 h-5 rounded-full shadow transform transition-transform cursor-pointer",[a.check?"translate-x-6 bg-green-400":"bg-red-400"]])},null,2)],2)])]),e("div",null,[e("p",_e,[S(" Time duration:"),e("span",null,d(g.effective_hours?g.effective_hours:0),1)]),g.checkin_time?(n(),i("p",ue,[S(d(`Check-In : ${g.checkin_time} (${s(D)(g.checkin_date).format("MMM D, YYYY")}) `)+" ",1),e("i",{class:F(["mx-2 text-sm font-semibold text-green-800",R(g.attendance_mode_checkin)])},null,2)])):(n(),i("p",he,d(`Check-In:
                    --:--:--`))),g.checkout_time?(n(),i("p",me,[S(d(`Check-Out : ${g.checkout_time} (${s(D)(g.checkout_date).format("MMM D, YYYY")}) `)+" ",1),e("i",{class:F(["mx-2 text-sm font-semibold text-green-800",R(g.attendance_mode_checkout)])},null,2)])):(n(),i("p",fe,d(`Check-Out:
                    --:--:--`)))])]))),128)),ve]),r(N,{visible:p.value,"onUpdate:visible":h[2]||(h[2]=g=>p.value=g),modal:"",style:{width:"30vw"}},{default:k(()=>[e("div",ge,[e("div",be,[e("div",xe,[r(j,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",class:"gliters",colors:"primary:#1aff1a,secondary:#1aff1a"}),r(j,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#30e849"})]),e("div",ye,[e("div",we,[$e,S(" "+d(s(t).current_user_name),1)]),x.value?(n(),i("p",ke,d(x.value),1)):(n(),i("p",Ce,"Have a good day !")),e("div",De,[e("a",Se,[e("button",{onClick:h[1]||(h[1]=g=>p.value=!1),type:"button",class:"btn btn-primary"}," Close ")])])])])])]),_:1},8,["visible"]),r(N,{visible:o.value,"onUpdate:visible":h[4]||(h[4]=g=>o.value=g),modal:"",style:{width:"25vw"}},{default:k(()=>[e("div",Ee,[e("div",Me,[e("div",Pe,[r(j,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",colors:"primary:#ff3300,secondary:#ff3300",class:"gliters"}),r(j,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#e62e00"})]),e("div",je,[e("h4",Fe,"Bye "+d(s(t).current_user_name),1),Re,e("div",Le,[e("a",Ae,[e("button",{type:"button",class:"btn btn-primary",onClick:h[3]||(h[3]=g=>o.value=!1)}," Close ")])])])])])]),_:1},8,["visible"])],64)}}},Oe={class:"!h-[180px] rounded-[20px] shadow-sm bg-white"},Te={class:"px-6 py-4"},Ye={class:"font-[14px] font-['Poppins'] text-gray-500"},Be={class:"mb-2 text-xl font-semibold"},Ve={class:"grid grid-cols-3 gap-4 mt-4"},Ue={class:"bg-[#F6F6F6] rounded-lg p-3"},He={class:"px-auto"},Ie={class:"mb-2 text-3xl font-bold text-center"},qe=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),Ge=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Present",-1),ze={class:"p-3 bg-gray-100 rounded-lg"},We={class:"mb-2 text-3xl font-bold"},Je=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),Ke=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Leave",-1),Qe={class:"p-3 bg-gray-100 rounded-lg"},Xe={class:"mb-2 text-3xl font-bold"},Ze=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),et=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Absent",-1),tt={__name:"leave_details",setup(f){const t=$();return A(()=>{}),(c,l)=>(n(),i("div",Oe,[e("div",Te,[e("p",Ye,[S(" Current month - "),e("span",Be,d(s(D)(new Date).format("MMMM")),1)]),e("div",Ve,[e("div",Ue,[e("div",He,[e("span",Ie,d(s(t).attenanceReportPerMonth.present),1),qe]),Ge]),e("div",ze,[e("span",We,d(s(t).attenanceReportPerMonth.not_applied),1),Je,Ke]),e("div",Qe,[e("span",Xe,d(s(t).attenanceReportPerMonth.absent),1),Ze,et])])])]))}},st={class:"bg-white min-h-min rounded-lg overflow-hidden h-[100%]"},ot=z('<div class="flex items-center justify-between p-3 mb-3 bg-gray-100 card-title" id=""><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins]">Activity Log</span></div><div class="h-full overflow-x-scroll"><div class="divide-y-2 divide-gray-400 hover:bg-slate-100"><p class="text-sm font-medium text-center">No activity log to display</p></div></div>',2),at=[ot],U={__name:"notification",setup(f){return $(),(t,c)=>(n(),i("div",st,at))}},nt={class:"p-2 overflow-hidden bg-white rounded-lg",style:{height:"200px"}},lt=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Leave Balance",-1),it={class:"h-full overflow-x-scroll bg-white rounded-lg"},rt={class:"px-auto"},ct={class:"flex px-2"},dt={class:""},pt={class:"text-3xl font-semibold text-black"},_t=e("span",{class:""},"/",-1),ut={class:""},ht={class:"px-3"},mt={class:"font-semibold text-primary text-[14px] align-bottom py-2"},ft={__name:"leave_balance",setup(f){const t=$();return ee(),(c,l)=>(n(),i("div",nt,[lt,e("div",it,[e("div",rt,[(n(!0),i(E,null,T(s(t).leaveBalancePerMonthSource,_=>(n(),i("a",{href:"attendance-leave",key:_.leave_type,class:"p-2 block mx-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"},[e("div",ct,[e("div",dt,[e("span",pt,d(_.leave_balance),1),_t,e("span",ut,d(_.availed_leaves),1)]),e("div",ht,[e("p",mt,d(_.leave_type),1)])])]))),128))])])]))}},vt={class:"bg-[#FFEFE2] rounded-lg overflow-hidden p-3",style:{height:"200px"}},gt={class:"flex justify-between"},bt=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Calendar",-1),xt=e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"},null,-1),yt=[xt],wt={class:"flex justify-center items-center w-[100%]"},$t=e("i",{class:"pi pi-times"},null,-1),kt=[$t],Ct={class:"py-8"},Dt={class:"text-[#d1814c] font-semibold text-[36px] mb-2 font-['Petrona']",style:{}},St={class:"mb-2 font-semibold text-gray-900 text-[16px]"},Et={__name:"calender",setup(f){const t=m(!1);return(c,l)=>{const _=w("Calendar"),p=w("Dialog");return n(),i("div",vt,[e("div",gt,[bt,(n(),i("svg",{xmlns:"http://www.w3.org/2000/svg",onClick:l[0]||(l[0]=o=>t.value=!0),fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-[20px] h-[20px] text-gray-900 cursor-pointer"},yt))]),r(p,{visible:t.value,"onUpdate:visible":l[3]||(l[3]=o=>t.value=o),modal:"",header:"Calendar",style:{width:"30vw"}},{default:k(()=>[e("div",wt,[r(_,{modelValue:c.date,"onUpdate:modelValue":l[1]||(l[1]=o=>c.date=o),inline:""},null,8,["modelValue"])]),e("button",{onClick:l[2]||(l[2]=o=>t.value=!1),class:"absolute top-4 right-4"},kt)]),_:1},8,["visible"]),e("div",Ct,[e("p",Dt,d(s(D)(new Date).format("D, MMMM YYYY")),1),e("p",St,d(s(D)(new Date).format("dddd")),1)])])}}},Mt=["src","alt"],Pt=e("p",{class:"absolute left-0 mx-4 font-semibold fs-5"}," Holiday list",-1),jt={class:"p-2"},Ft={__name:"holiday_widget",setup(f){const t=m(),c=m(),l=m(),_=m(!1),p=()=>{B.get("/holiday/master-page").then(o=>{c.value=o.data;let a=!0;o.data.forEach((C,b)=>{a&&new Date(C.holiday_date)>=new Date&&(t.value=b,a=!1)}),l.value=c.value[0].image})};return A(()=>{p()}),(o,a)=>{const C=w("Galleria"),b=w("Column"),u=w("DataTable"),x=w("Sidebar");return n(),i(E,null,[r(C,{value:c.value,responsiveOptions:o.responsiveOptions,numVisible:5,circular:!0,containerStyle:"",class:"!h-[180px] !rounded-[20px] overflow-hidden",showItemNavigators:!0,showThumbnails:!1},{item:k(y=>[e("img",{src:`data:image/png;base64,${y.item.image}`,class:"mt-3 mb-2 !rounded-[20px] shadow-sm !h-[180px]",style:{width:"100%","margin-bottom":"10px",position:"relative",right:"0",bottom:"10px",display:"block"},alt:y.item.holiday_name},null,8,Mt),e("button",{class:"text-[#fff] absolute right-4 top-2 px-3 text-['poppins'] rounded-lg p-1 bg-[#00000067]",onClick:a[0]||(a[0]=R=>_.value=!0)},"View List")]),_:1},8,["value","responsiveOptions"]),r(x,{visible:_.value,"onUpdate:visible":a[1]||(a[1]=y=>_.value=y),position:"right",style:{width:"40vw !important"}},{header:k(()=>[Pt]),default:k(()=>[e("div",jt,[r(u,{value:c.value},{default:k(()=>[r(b,{field:"holiday_name",header:"Holiday Name"}),r(b,{field:"holiday_date",header:"Holiday Date"},{body:k(y=>[S(d(s(D)(y.data.holiday_date).format("DD-MMM-YYYY"))+" "+d(s(D)(y.data.holiday_date).format("ddd"))+" ",1)]),_:1}),r(b,{field:"holiday_description",header:"Holiday Description "})]),_:1},8,["value"])])]),_:1},8,["visible"])],64)}}},Rt={class:"bg-white rounded-lg p-2"},Lt=e("span",{class:"text-primary font-semibold fs-6"},"Events",-1),At={class:"min-h-min overflow-x-scroll h-[200px]"},Nt={class:"grid grid-cols-4 gap-4"},Ot={class:"font-semibold text-center text-white my-2 text-[12px] font-['Poppins']"},Tt={class:"absolute top-8 w-full z-10"},Yt={class:"grid grid-cols-2 w-11/12 bg-slate-100 mx-auto rounded-lg h-full"},Bt={class:"w-[100%] relative h-[90px]"},Vt={class:"font-semibold text-4xl py-4 text-center align-middle text-white"},Ut=["src"],Ht={class:"h-full"},It={class:"py-6"},qt={key:0,class:"font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto"},Gt={key:1,class:"font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto"},zt={class:"font-semibold text-sm text-center text-gray-600 my-auto"},Wt={class:"text-xs absolute right-6 fa fa-commenting-o text-right cursor-pointer","data-bs-target":"#wishes_popup","data-bs-toggle":"modal"},Jt=e("div",{class:"flex justify-center my-2"},null,-1),Kt=e("div",{id:"wishes_popup",class:"modal fade",role:"dialog"},[e("div",{class:"modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md"},[e("div",{class:"modal-content"},[e("div",{class:"py-2 border-0 modal-header"},[e("h6",{class:"modal-title"}," Wishes Text"),e("button",{type:"button",class:"bg-transparent border-0 outline-none close h3","data-bs-dismiss":"modal","aria-label":"Close"},[e("span",{"aria-hidden":"true"},"×")])]),e("div",{class:"modal-body"},[e("p",{for:"",class:"text-muted f-14 fw-bold"},"Commants here"),e("textarea",{name:"",id:"",cols:"",placeholder:"Commants here....",rows:"2",class:"resize-none form-control"}),e("div",{class:"text-end"},[e("button",{class:"mt-2 btn btn-border-orange",id:""},[e("i",{class:"fa fa-paper-plane me","aria-hidden":"true"}),S(" Send")])])])])])],-1),H={__name:"events",setup(f){O();const t=$(),c=["bg-emerald-600","bg-yellow-600","bg-rose-600","bg-cyan-600","bg-amber-600","bg-red-600","bg-pink-600","bg-green-600","bg-fuchsia-600"],l=["bg-emerald-200","bg-yellow-200","bg-rose-200","bg-cyan-200","bg-amber-200","bg-red-200","bg-pink-200","bg-green-200","bg-fuchsia-200"],_=a=>c[a%c.length],p=a=>l[a%c.length],o=a=>{if(a=="birthday")return"Happy birthday";if(a=="work_anniversery")return"Work anniversary"};return(a,C)=>{const b=W("tooltip");return n(),i(E,null,[e("div",Rt,[Lt,e("div",At,[e("div",Nt,[(n(!0),i(E,null,T(s(t).allEventSource,(u,x)=>(n(),i("div",{class:"relative w-[180px] rounded-lg my-2",key:x},[e("div",{class:F(["h-[80px] rounded-lg",`${_(x)}`])},[e("p",Ot,d(o(u.type)),1)],2),e("div",Tt,[e("div",Yt,[e("div",Bt,[JSON.parse(u.avatar).type=="shortname"?(n(),i("div",{key:0,class:F([p(x),"h-full rounded-lg"])},[e("p",Vt,d(JSON.parse(u.avatar).data),1)],2)):(n(),i("img",{key:1,src:`data:image/png;base64,${JSON.parse(u.avatar).data}`,alt:"",class:"rounded-lg absolute w-[100%] h-[100%] top-0"},null,8,Ut))]),e("div",Ht,[e("div",It,[u.name.length<=8?(n(),i("p",qt,d(u.name),1)):Y((n(),i("p",Gt,[S(d(u.name?u.name.substring(0,8)+"..":""),1)])),[[b,u.name]]),e("p",zt,d(s(D)(u.dob).format("DD"))+"th "+d(s(D)(u.dob).format("MMM")),1),e("p",null,[Y(e("i",Wt,null,512),[[b,"wish"]])])])])]),Jt])]))),128))])])]),Kt],64)}}},Qt={class:"grid grid-cols-12 gap-4"},Xt={class:"col-span-5 w-[100%] !rounded-[20px] overflow-hidden"},Zt={class:"col-span-4 w-[100%] !rounded-[20px]"},es={class:"col-span-3 w-[100%] !rounded-[20px]"},ts={class:"grid grid-cols-12 gap-4 pb-7"},ss={class:"col-span-8 !rounded-[20px]"},os={class:"grid grid-cols-2 gap-4 my-2"},as={class:"!rounded-[20px] overflow-hidden"},ns={class:"!rounded-[20px] overflow-hidden"},ls={class:"grid grid-cols-1"},is={class:"col-span-4 my-2"},rs={__name:"employee_dashboard",setup(f){const t=$();return(c,l)=>(n(),i("div",{class:"h-screen p-3 overflow-auto",onMousemove:l[0]||(l[0]=_=>s(t).canShowConfiguration=!1)},[e("div",Qt,[e("div",Xt,[r(Ne)]),e("div",Zt,[r(tt)]),e("div",es,[r(Ft)])]),e("div",ts,[e("div",ss,[e("div",os,[e("div",as,[r(ft)]),e("div",ns,[r(Et)])]),e("div",ls,[e("div",null,[r(H)])])]),e("div",is,[r(U)])])],32))}},P=f=>(K("data-v-ffb46dfa"),f=f(),Q(),f),cs={key:0,class:"w-full"},ds={class:"font-[14px] font-['Poppins'] text-gray-500"},ps={class:"mb-2 text-xl font-semibold"},_s={class:"grid grid-cols-4 gap-3 my-2"},us={class:"flex justify-center px-auto"},hs={class:"text-3xl font-semibold text-center"},ms=P(()=>e("p",{class:"text-lg font-semibold text-center text-gray-500"},"Active Employees",-1)),fs={class:"flex justify-center px-auto"},vs={class:"text-3xl font-semibold text-center"},gs=P(()=>e("p",{class:"text-lg font-semibold text-center text-gray-500"},"New Employees",-1)),bs={class:"flex justify-center px-auto"},xs={class:"text-3xl font-semibold text-center"},ys=P(()=>e("p",{class:"text-lg font-semibold text-center text-gray-500"},"Exit Employees",-1)),ws={class:"flex justify-center px-auto"},$s={class:"text-3xl font-semibold text-center"},ks=P(()=>e("p",{class:"text-lg font-semibold text-center text-gray-500"},"Yet to Active Employees ",-1)),Cs=P(()=>e("p",{class:"absolute left-0 mx-4 font-semibold fs-5"}," Reports",-1)),Ds={class:"relative right-0 mx-4 font-semibold fs-5"},Ss=P(()=>e("p",{class:"relative left-2 font-['poppins']"},"Download",-1)),Es=P(()=>e("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16"},[e("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check"}),e("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"}),e("path",{d:"M8,1 L8,11",class:"svg-out"})],-1)),Ms=[Es],Ps={key:0,class:""},js={key:1,class:"flex justify-center"},Fs=P(()=>e("img",{class:"h-[450px]",src:se,alt:"",srcset:""},null,-1)),Rs=[Fs],Ls={__name:"org_employee_details",setup(f){const t=$(),c=async()=>{const p=new ExcelJS.Workbook,o=p.addWorksheet("Sheet1"),a=["Employee Code","Employee Name","Department","Process","Location"],C="This report generated by ABShrms payroll software ",b=a;o.addRow(b).eachCell((v,h)=>{v.fill={type:"pattern",pattern:"solid",fgColor:{argb:"252f70"}},v.font={bold:!0,color:{argb:"ffffff"}},o.getColumn(h).width=20}),Object.values(t.ShowEmployeeStatuswise).forEach((v,h)=>{console.log(v);const j=[];b.forEach(N=>{j.push(v[N])}),o.addRow(j)}),o.addRow([""]);const x=o.addRow([""]);x.getCell(1).value=C,o.mergeCells(x.number,1,x.number,3),x.getCell(1).alignment={wrapText:!0},x.getCell(1).font={italic:!0};const y=await p.xlsx.writeBuffer(),R=window.URL.createObjectURL(new Blob([y])),L=document.createElement("a");L.href=R,L.download=`${t.reportName}.xlsx`,L.click(),window.URL.revokeObjectURL(R)},l=m(!1),_=m("downloaded");return(p,o)=>{const a=w("Column"),C=w("DataTable"),b=w("Sidebar");return n(),i(E,null,[s(t).orgEmployeeDetailCount?(n(),i("div",cs,[e("p",ds,[S(" Current month - "),e("span",ps,d(s(D)(new Date).format("MMMM")),1)]),e("div",_s,[e("div",{class:"bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer",onClick:o[0]||(o[0]=u=>(s(t).canShowSidebar=!0,s(t).ShowEmployeeStatuswise={...s(t).orgEmployeeDetailCount.total_employees},s(t).reportName=`total_employee_reports_${new Date}`))},[e("div",us,[e("span",hs,d(s(t).orgEmployeeDetailCount.total_employee_count?s(t).orgEmployeeDetailCount.total_employee_count:0),1)]),ms]),e("div",{class:"bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer",onClick:o[1]||(o[1]=u=>(s(t).canShowSidebar=!0,s(t).ShowEmployeeStatuswise={...s(t).orgEmployeeDetailCount.new_employees},s(t).reportName=`new_employee_reports_${new Date}`))},[e("div",fs,[e("span",vs,d(s(t).orgEmployeeDetailCount.new_employee_count?s(t).orgEmployeeDetailCount.new_employee_count:0),1)]),gs]),e("div",{class:"bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer",onClick:o[2]||(o[2]=u=>(s(t).canShowSidebar=!0,s(t).ShowEmployeeStatuswise={...s(t).orgEmployeeDetailCount.exit_employees},s(t).reportName=`active_employee_reports_${new Date}`))},[e("div",bs,[e("span",xs,d(s(t).orgEmployeeDetailCount.exit_employee_count?s(t).orgEmployeeDetailCount.exit_employee_count:0),1)]),ys]),e("div",{class:"bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer",onClick:o[3]||(o[3]=u=>(s(t).canShowSidebar=!0,s(t).ShowEmployeeStatuswise={...s(t).orgEmployeeDetailCount.yet_to_active_employees},s(t).reportName=`yet_to_active_employee_reports_${new Date}`))},[e("div",ws,[e("span",$s,d(s(t).orgEmployeeDetailCount.yet_to_active_employee_count?s(t).orgEmployeeDetailCount.yet_to_active_employee_count:0),1)]),ks])])])):M("",!0),r(b,{visible:s(t).canShowSidebar,"onUpdate:visible":o[5]||(o[5]=u=>s(t).canShowSidebar=u),position:"right",style:{width:"70vw !important"}},{header:k(()=>[Cs,e("div",Ds,[e("button",{class:"bg-[#E6E6E6] p-2 mx-2 rounded-md w-[120px]",onClick:o[4]||(o[4]=u=>(l.value=!l.value,c()))},[Ss,e("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:F([l.value==!0?_.value:" "])},Ms,2)])])]),default:k(()=>[Object.values(s(t).ShowEmployeeStatuswise).length>=1?(n(),i("div",Ps,[r(C,{scrollable:"",scrollHeight:"h-[500px]",value:s(t).ShowEmployeeStatuswise?s(t).ShowEmployeeStatuswise:[]},{default:k(()=>[r(a,{field:"Employee_Code",header:"Employee Code"}),r(a,{field:"Employee_Name",header:"Employee Name",style:{"text-align":"left !important","white-space":"no !important"}}),r(a,{field:"Department",header:"Department",style:{"text-align":"left !important","white-space":"no !important"}}),r(a,{field:"Process",header:"Process",style:{"text-align":"left !important","white-space":"no !important"}}),r(a,{field:"Location",header:"Work location",style:{"text-align":"left !important","white-space":"no !important"}})]),_:1},8,["value"])])):(n(),i("div",js,Rs))]),_:1},8,["visible"])],64)}}},As=J(Ls,[["__scopeId","data-v-ffb46dfa"]]),Ns={class:"p-2 overflow-hidden bg-white rounded-lg",style:{height:"200px"}},Os=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Analytics",-1),Ts=e("div",{class:"h-full overflow-x-scroll bg-white rounded-lg"},[e("p",{class:"font-medium text-sm text-center"},"No data to display")],-1),Ys=[Os,Ts],Bs={__name:"Analytics",setup(f){return $(),(t,c)=>(n(),i("div",Ns,Ys))}},Vs={class:"p-2 overflow-hidden bg-white rounded-lg",style:{height:"200px"}},Us=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Pending Requests",-1),Hs={class:"h-full overflow-x-scroll bg-white rounded-lg"},Is=["href"],qs={class:"p-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"},Gs={class:"flex px-2 justify-between items-center"},zs={class:"text-[14px] font-semibold"},Ws={class:"flex items-center gap-6"},Js={class:"text-xl font-semibold text-black"},Ks=e("span",null,[e("i",{class:"fa fa-chevron-right","aria-hidden":"true"})],-1),Qs={__name:"leave_request",setup(f){const t=$(),c=l=>{if(l=="Leave Requests")return"attendance-leave-approvals";if(l=="Document Approvals")return"approvals-documents";if(l=="Attendance Regularization")return"attendance-regularization-approvals"};return(l,_)=>(n(),i("div",Vs,[Us,e("div",Hs,[s(t).hrPendingRequestCount?(n(!0),i(E,{key:0},T(s(t).hrPendingRequestCount,p=>(n(),i("a",{class:"px-auto",href:c(p.title)},[e("div",qs,[e("div",Gs,[e("div",null,[e("span",zs,d(p.title),1)]),e("div",Ws,[e("span",Js,d(p.value),1),Ks])])])],8,Is))),256)):M("",!0)])]))}},Xs={__name:"overall_employee",setup(f){const t=$();A(async()=>{l.value=_(),setTimeout(()=>{console.log(t.overallEmployeeCountForGraph),c.value.datasets[0].data=t.overallEmployeeCountForGraph},8e3)});const c=m({labels:["Male","Female","Others","App Check-Ins","Active Apps","Inactive Apps"],datasets:[{backgroundColor:["rgba(8, 115, 205, 1)","rgba(205, 159, 71, 1)","rgba(255, 205, 86, 0.2)","rgba(80, 64, 34, 1)","rgba(113, 74, 161, 1)","rgba(181, 86, 151, 1)"],borderWidth:10,borderColor:"white",data:[0,0,0,0,0,0]}]}),l=m();m();const _=()=>{const p=getComputedStyle(document.documentElement),o=p.getPropertyValue("--text-color"),a=p.getPropertyValue("--text-color-secondary");return p.getPropertyValue("--surface-border"),{maintainAspectRatio:!1,aspectRatio:100,plugins:{title:{display:!1,text:"Custom Chart Title"},legend:{display:!1,labels:{fontColor:o}}},scales:{x:{ticks:{autoSkip:!1,maxRotation:0,minRotation:0,textAlign:"center",padding:10,color:a,font:{weight:600}},grid:{display:!1,drawBorder:!1}},y:{display:!1,ticks:{color:a},grid:{color:!1,drawBorder:!1}}}}};return(p,o)=>{const a=w("Chart");return s(t).overallEmployeeCountForGraph?(n(),V(a,{key:0,type:"bar",data:c.value,options:l.value,class:"h-full"},null,8,["data","options"])):M("",!0)}}},Zs={class:"h-[100%] p-2 overflow-auto"},eo={class:"grid grid-cols-12 gap-4"},to={class:"col-span-8"},so={class:"col-span-12 w-[100%] !rounded-[20px] bg-white p-2"},oo={class:"col-span-12 !rounded-[20px]"},ao={class:"grid grid-cols-12 gap-4 my-2"},no={class:"!rounded-[20px] overflow-hidden col-span-5"},lo={class:"!rounded-[20px] overflow-hidden bg-white col-span-7"},io={class:"col-span-12"},ro={class:"col-span-4 w-[100%] !rounded-[20px]"},co={class:"py-3 h-[65%]"},po={__name:"hr_dashboard",setup(f){return $(),m(0),(t,c)=>(n(),i("div",Zs,[e("div",eo,[e("div",to,[e("div",so,[r(As)]),e("div",oo,[e("div",ao,[e("div",no,[r(Qs)]),e("div",lo,[r(Xs)])])]),e("div",io,[r(H)])]),e("div",ro,[e("div",null,[r(Bs)]),e("div",co,[r(U)])])])]))}},_o={key:1,class:""},uo={class:"pt-1 pb-0"},ho={class:"nav nav-pills nav-tabs-dashed",id:"pills-tab",role:"tablist"},mo=e("li",{class:"nav-item",role:"presentation"},[e("a",{class:"nav-link active",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#employee_details",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Self-Dashboard")],-1),fo={key:0,class:"mx-4 nav-item",role:"presentation"},vo=e("a",{class:"nav-link",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#family_det",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," ORG-Dashboard",-1),go=[vo],bo={key:1,class:"nav-item",role:"presentation"},xo=e("a",{class:"nav-link",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#experience_det",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Announcement",-1),yo=[xo],wo={key:2,class:"tab-content",id:"pills-tabContent"},$o={class:"tab-pane fade active show",id:"employee_details",role:"tabpanel","aria-labelledby":""},ko={class:"tab-pane fade",id:"family_det",role:"tabpanel","aria-labelledby":""},Co=e("div",{class:"tab-pane fade",id:"experience_det",role:"tabpanel","aria-labelledby":""},[e("div",{class:"flex justify-center"},[e("img",{class:"h-[430px] mx-auto",src:ae,alt:"",srcset:""})]),e("p",{class:"font-semibold text-lg text-center"},"Page is Under construction")],-1),Bo={__name:"dashboard",setup(f){const t=$(),c=m(),l=O();oe();const _=X(t.allEventSource,(p,o)=>{p!==null&&handleData(p)});return A(async()=>{t.isDashboardDataReceived&&t.isHrDashboardDataReceived&&(c.value=!0,await t.getMainDashboardData(),await t.getHrDashboardMainSource(),O(),c.value=!1,B.get("/clear_cache").then(p=>{console.log(p.data)}))}),Z(()=>{_()}),(p,o)=>(n(),i(E,null,[s(t).canShowLoading?(n(),V(te,{key:0})):M("",!0),s(t).canShowLoading?M("",!0):(n(),i("div",_o,[e("div",uo,[e("ul",ho,[mo,s(l).current_user_role==1||s(l).current_user_role==2||s(l).current_user_role==3?(n(),i("li",fo,go)):M("",!0),s(l).current_user_role==1?(n(),i("li",bo,yo)):M("",!0)])])])),s(t).canShowLoading?M("",!0):(n(),i("div",wo,[e("div",$o,[e("div",null,[r(rs)])]),e("div",ko,[r(po)]),Co]))],64))}};export{Bo as default};
