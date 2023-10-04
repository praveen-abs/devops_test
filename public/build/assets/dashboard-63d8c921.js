import{r as m,z as q,o as A,c as w,e as n,f as i,g as e,F as E,m as T,t as d,h as s,w as Y,A as G,p as F,i as S,n as r,l as k,B as z,d as W,_ as J,j as M,C as K,D as Q,k as V,E as X,G as Z}from"./app-b9baa456.js";import{S as O}from"./Service-504054d8.js";import{u as $}from"./hr_dashboard.vue_vue_type_style_index_0_lang-4de99ed4.js";import{a as B}from"./index-362795f3.js";import{d as D}from"./dayjs.min-2f06af28.js";import{u as ee}from"./LeaveApply.vue_vue_type_style_index_0_lang-054d4c4b.js";import"./exceljs.min-1f699027.js";import{L as te}from"./LoadingSpinner-1abd2939.js";import{_ as se}from"./no-data-17442c4e.js";import"./autoprefixer-cf16e9d7.js";import"./moment-fbc5633a.js";/* empty css                                                                       */const oe="/build/assets/Page-is-under-construction-9e66b52e.svg",ae="/build/assets/femaleDashboardImage-7f53f6fa.svg",ne={class:"!h-[180px] w-[100%] overflow-hidden rounded-xl shadow-lg bg-[#DFE8FF] p-3 grid grid-cols-12 gap-4 justify-between leading-normal"},le={class:"font-[14px] font-['Poppins'] text-gray-500 flex items-center"},ie={class:"text-gray-900 text-[18px] mb-2 font-['Poppins']"},re={class:"flex gap-4 items-center"},ce=e("div",{class:"flex my-1 overflow-visible items-center !z-10"},[e("i",{class:"fa fa-sun-o text-warning my-auto text-[20px]","aria-hidden":"true"}),e("p",{class:"text-[12px] my-auto font-semibold px-2"},"General Shift")],-1),de={class:"btn-status"},pe={class:"text-[12px] text-[#8B8B8B] font-['Poppins'] flex items-center"},_e={key:0,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},ue={key:1,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},he={key:2,class:"w-[300px] max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},me={key:3,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},fe=e("div",{class:"col-span-5 h-full !z-5"},[e("div",{class:"grid justify-center items-centers my-auto h-full border-[1px]"},[e("img",{src:ae,alt:"",srcset:"",class:"w-full h-full"})])],-1),ge={class:"bg-white modal-content"},ve={class:"p-1 text-center modal-body"},be={class:"check-in-animate"},xe={class:"mt-2"},ye={class:"text-gray-900 text-[18px] mb-2 font-['Poppins']"},we=e("span",null,"Welcome",-1),$e={key:0,class:"mb-4 text-muted"},ke={key:1,class:"mb-4 text-muted"},Ce={class:"gap-2 hstack justify-content-center"},De={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},Se={class:"bg-white modal-content"},Ee={class:"p-1 text-center modal-body"},Me={class:"check-in-animate"},Pe={class:"mt-4"},je={class:"mb-3"},Fe=e("p",{class:"mb-4 text-muted"},"See you tommorrow",-1),Re={class:"gap-2 hstack justify-content-center"},Le={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},Ae={__name:"welcome_card",setup(f){const t=O(),c=$(),l=m();m();const _=m([]),p=m(!1),o=m(!1),a=q({date:new Date,check:"",check_in:"",check_out:"",attendance_mode:"web",work_mode:"",checked:!1}),C=()=>{var g=new Date,h=g.getHours();h<12?l.value="Good Morning":h<18?l.value="Good Afternoon":l.value="Good Evening"},b=()=>{_.value.splice(0,_.value.length),a.check==!0?(a.check_in=new Date().toLocaleTimeString(),a.checked=!0,p.value=!0):(a.check_out=new Date().toLocaleTimeString(),o.value=!0,a.checked=!1),c.updateCheckin_out({checked:a.checked}).then(g=>{x.value=g.data.message}).finally(()=>{y(),L()})},u=m(!0),x=m(),y=async()=>{let g="/fetchEmpLastAttendanceStatus";await B.get(g).then(h=>{console.log(h.data),_.value.push(h.data),h.data.checkout_time?a.check=!1:h.data.checkin_time?a.check=!0:a.check=null}).finally(()=>{c.canShowTopbar=!0})};A(async()=>{C(),u&&await y().finally(()=>{u.value=!1})});const R=g=>(console.log(g),g=="biometric"?"fas fa-fingerprint fs-12":g=="web"?"fa fa-laptop fs-12":g=="mobile"?"fa fa-mobile-phone fs-12":""),L=()=>{c.check="",c.check_in="",c.check_out="",c.work_mode=""};return(g,h)=>{const j=w("lord-icon"),N=w("Dialog");return n(),i(E,null,[e("div",ne,[(n(!0),i(E,null,T(_.value,v=>(n(),i("div",{class:"col-span-7 mb-8",key:v},[e("p",le,d(l.value),1),e("div",ie,d(s(t).current_user_name),1),e("div",re,[ce,e("div",de,[Y(e("input",{type:"checkbox",name:"checkbox",id:"checkbox",class:"hidden","onUpdate:modelValue":h[0]||(h[0]=I=>a.check=I),onChange:b},null,544),[[G,a.check]]),e("label",{for:"checkbox",class:F(["relative inline-block w-12 h-5 rounded-lg transition duration-300 cursor-pointer",[a.check?" bg-green-100":"bg-red-100"]])},[e("span",{class:F(["absolute inset-0 inline-block w-5 h-5 rounded-full shadow transform transition-transform cursor-pointer",[a.check?"translate-x-6 bg-green-400":"bg-red-400"]])},null,2)],2)])]),e("div",null,[e("p",pe,[S(" Time duration:"),e("span",null,d(v.effective_hours?v.effective_hours:0),1)]),v.checkin_time?(n(),i("p",_e,[S(d(`Check-In : ${v.checkin_time} (${s(D)(v.checkin_date).format("MMM D, YYYY")}) `)+" ",1),e("i",{class:F(["mx-2 text-sm font-semibold text-green-800",R(v.attendance_mode_checkin)])},null,2)])):(n(),i("p",ue,d(`Check-In:
                    --:--:--`))),v.checkout_time?(n(),i("p",he,[S(d(`Check-Out : ${v.checkout_time} (${s(D)(v.checkout_date).format("MMM D, YYYY")}) `)+" ",1),e("i",{class:F(["mx-2 text-sm font-semibold text-green-800",R(v.attendance_mode_checkout)])},null,2)])):(n(),i("p",me,d(`Check-Out:
                    --:--:--`)))])]))),128)),fe]),r(N,{visible:p.value,"onUpdate:visible":h[2]||(h[2]=v=>p.value=v),modal:"",style:{width:"30vw"}},{default:k(()=>[e("div",ge,[e("div",ve,[e("div",be,[r(j,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",class:"gliters",colors:"primary:#1aff1a,secondary:#1aff1a"}),r(j,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#30e849"})]),e("div",xe,[e("div",ye,[we,S(" "+d(s(t).current_user_name),1)]),x.value?(n(),i("p",$e,d(x.value),1)):(n(),i("p",ke,"Have a good day !")),e("div",Ce,[e("a",De,[e("button",{onClick:h[1]||(h[1]=v=>p.value=!1),type:"button",class:"btn btn-primary"}," Close ")])])])])])]),_:1},8,["visible"]),r(N,{visible:o.value,"onUpdate:visible":h[4]||(h[4]=v=>o.value=v),modal:"",style:{width:"25vw"}},{default:k(()=>[e("div",Se,[e("div",Ee,[e("div",Me,[r(j,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",colors:"primary:#ff3300,secondary:#ff3300",class:"gliters"}),r(j,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#e62e00"})]),e("div",Pe,[e("h4",je,"Bye "+d(s(t).current_user_name),1),Fe,e("div",Re,[e("a",Le,[e("button",{type:"button",class:"btn btn-primary",onClick:h[3]||(h[3]=v=>o.value=!1)}," Close ")])])])])])]),_:1},8,["visible"])],64)}}},Ne={class:"!h-[180px] rounded-[20px] shadow-sm bg-white"},Oe={class:"px-6 py-4"},Te={class:"font-[14px] font-['Poppins'] text-gray-500"},Ye={class:"mb-2 text-xl font-semibold"},Be={class:"grid grid-cols-3 gap-4 mt-4"},Ve={class:"bg-[#F6F6F6] rounded-lg p-3"},Ue={class:"px-auto"},He={class:"mb-2 text-3xl font-bold text-center"},Ie=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),qe=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Present",-1),Ge={class:"p-3 bg-gray-100 rounded-lg"},ze={class:"mb-2 text-3xl font-bold"},We=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),Je=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Leave",-1),Ke={class:"p-3 bg-gray-100 rounded-lg"},Qe={class:"mb-2 text-3xl font-bold"},Xe=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),Ze=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Absent",-1),et={__name:"leave_details",setup(f){const t=$();return A(()=>{}),(c,l)=>(n(),i("div",Ne,[e("div",Oe,[e("p",Te,[S(" Current month - "),e("span",Ye,d(s(D)(new Date).format("MMMM")),1)]),e("div",Be,[e("div",Ve,[e("div",Ue,[e("span",He,d(s(t).attenanceReportPerMonth.present),1),Ie]),qe]),e("div",Ge,[e("span",ze,d(s(t).attenanceReportPerMonth.not_applied),1),We,Je]),e("div",Ke,[e("span",Qe,d(s(t).attenanceReportPerMonth.absent),1),Xe,Ze])])])]))}},tt={class:"bg-white min-h-min rounded-lg overflow-hidden"},st=z('<div class="flex items-center justify-between p-3 mb-3 bg-gray-100 card-title" id=""><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins]">Activity Log</span></div><div class="h-full overflow-x-scroll"><div class="hover:bg-slate-100 divide-y-2 divide-gray-400"><p class="font-medium text-sm text-center">No activity log to display</p></div></div>',2),ot=[st],U={__name:"notification",setup(f){return $(),(t,c)=>(n(),i("div",tt,ot))}},at={class:"p-2 overflow-hidden bg-white rounded-lg",style:{height:"200px"}},nt=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Leave Balance",-1),lt={class:"h-full overflow-x-scroll bg-white rounded-lg"},it={class:"px-auto"},rt={class:"flex px-2"},ct={class:""},dt={class:"text-3xl font-semibold text-black"},pt=e("span",{class:""},"/",-1),_t={class:""},ut={class:"px-3"},ht={class:"font-semibold text-primary text-[14px] align-bottom py-2"},mt={__name:"leave_balance",setup(f){const t=$();return ee(),(c,l)=>(n(),i("div",at,[nt,e("div",lt,[e("div",it,[(n(!0),i(E,null,T(s(t).leaveBalancePerMonthSource,_=>(n(),i("a",{href:"attendance-leave",key:_.leave_type,class:"p-2 block mx-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"},[e("div",rt,[e("div",ct,[e("span",dt,d(_.leave_balance),1),pt,e("span",_t,d(_.availed_leaves),1)]),e("div",ut,[e("p",ht,d(_.leave_type),1)])])]))),128))])])]))}},ft={class:"bg-[#FFEFE2] rounded-lg overflow-hidden p-3",style:{height:"200px"}},gt={class:"flex justify-between"},vt=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Calendar",-1),bt=e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"},null,-1),xt=[bt],yt={class:"flex justify-center items-center w-[100%]"},wt=e("i",{class:"pi pi-times"},null,-1),$t=[wt],kt={class:"py-8"},Ct={class:"text-[#d1814c] font-semibold text-[36px] mb-2 font-['Petrona']",style:{}},Dt={class:"mb-2 font-semibold text-gray-900 text-[16px]"},St={__name:"calender",setup(f){const t=m(!1);return(c,l)=>{const _=w("Calendar"),p=w("Dialog");return n(),i("div",ft,[e("div",gt,[vt,(n(),i("svg",{xmlns:"http://www.w3.org/2000/svg",onClick:l[0]||(l[0]=o=>t.value=!0),fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-[20px] h-[20px] text-gray-900 cursor-pointer"},xt))]),r(p,{visible:t.value,"onUpdate:visible":l[3]||(l[3]=o=>t.value=o),modal:"",header:"Calendar",style:{width:"30vw"}},{default:k(()=>[e("div",yt,[r(_,{modelValue:c.date,"onUpdate:modelValue":l[1]||(l[1]=o=>c.date=o),inline:""},null,8,["modelValue"])]),e("button",{onClick:l[2]||(l[2]=o=>t.value=!1),class:"absolute top-4 right-4"},$t)]),_:1},8,["visible"]),e("div",kt,[e("p",Ct,d(s(D)(new Date).format("D, MMMM YYYY")),1),e("p",Dt,d(s(D)(new Date).format("dddd")),1)])])}}},Et=["src","alt"],Mt=e("p",{class:"absolute left-0 mx-4 font-semibold fs-5"}," Holiday list",-1),Pt={class:"p-2"},jt={__name:"holiday_widget",setup(f){const t=m(),c=m(),l=m(),_=m(!1),p=()=>{B.get("/holiday/master-page").then(o=>{console.log(o.data),c.value=o.data;let a=!0;o.data.forEach((C,b)=>{a&&new Date(C.holiday_date)>=new Date&&(t.value=b,a=!1)}),l.value=c.value[0].image})};return A(()=>{p()}),(o,a)=>{const C=w("Galleria"),b=w("Column"),u=w("DataTable"),x=w("Sidebar");return n(),i(E,null,[r(C,{value:c.value,responsiveOptions:o.responsiveOptions,numVisible:5,circular:!0,containerStyle:"",class:"!h-[180px] !rounded-[20px] overflow-hidden",showItemNavigators:!0,showThumbnails:!1},{item:k(y=>[e("img",{src:`data:image/png;base64,${y.item.image}`,class:"mt-3 mb-2 !rounded-[20px] shadow-sm !h-[180px]",style:{width:"100%","margin-bottom":"10px",position:"relative",right:"0",bottom:"10px",display:"block"},alt:y.item.holiday_name},null,8,Et),e("button",{class:"text-[#fff] absolute right-4 top-2 px-3 text-['poppins'] rounded-lg p-1 bg-[#00000067]",onClick:a[0]||(a[0]=R=>_.value=!0)},"View List")]),_:1},8,["value","responsiveOptions"]),r(x,{visible:_.value,"onUpdate:visible":a[1]||(a[1]=y=>_.value=y),position:"right"},{header:k(()=>[Mt]),default:k(()=>[e("div",Pt,[r(u,{value:c.value},{default:k(()=>[r(b,{field:"holiday_name",header:"Holiday Name"}),r(b,{field:"holiday_date",header:"Holiday Date"},{body:k(y=>[S(d(s(D)(y.data.holiday_date).format("DD-MMM-YYYY"))+" "+d(s(D)(y.data.holiday_date).format("ddd"))+" ",1)]),_:1}),r(b,{field:"holiday_description",header:"Holiday Description "})]),_:1},8,["value"])])]),_:1},8,["visible"])],64)}}},Ft={class:"bg-white rounded-lg p-2"},Rt=e("span",{class:"text-primary font-semibold fs-6"},"Events",-1),Lt={class:"min-h-min overflow-x-scroll h-[200px]"},At={class:"grid grid-cols-4 gap-4"},Nt={class:"font-semibold text-center text-white my-2 text-[12px] font-['Poppins']"},Ot={class:"absolute top-8 w-full z-10"},Tt={class:"grid grid-cols-2 w-11/12 bg-slate-100 mx-auto rounded-lg h-full"},Yt={class:"w-[100%] relative h-[90px]"},Bt={class:"font-semibold text-4xl py-4 text-center align-middle text-white"},Vt=["src"],Ut={class:"h-full"},Ht={class:"py-6"},It={key:0,class:"font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto"},qt={key:1,class:"font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto"},Gt={class:"font-semibold text-sm text-center text-gray-600 my-auto"},zt={class:"text-xs absolute right-6 fa fa-commenting-o text-right cursor-pointer","data-bs-target":"#wishes_popup","data-bs-toggle":"modal"},Wt=e("div",{class:"flex justify-center my-2"},null,-1),Jt=e("div",{id:"wishes_popup",class:"modal fade",role:"dialog"},[e("div",{class:"modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md"},[e("div",{class:"modal-content"},[e("div",{class:"py-2 border-0 modal-header"},[e("h6",{class:"modal-title"}," Wishes Text"),e("button",{type:"button",class:"bg-transparent border-0 outline-none close h3","data-bs-dismiss":"modal","aria-label":"Close"},[e("span",{"aria-hidden":"true"},"×")])]),e("div",{class:"modal-body"},[e("p",{for:"",class:"text-muted f-14 fw-bold"},"Commants here"),e("textarea",{name:"",id:"",cols:"",placeholder:"Commants here....",rows:"2",class:"resize-none form-control"}),e("div",{class:"text-end"},[e("button",{class:"mt-2 btn btn-border-orange",id:""},[e("i",{class:"fa fa-paper-plane me","aria-hidden":"true"}),S(" Send")])])])])])],-1),H={__name:"events",setup(f){O();const t=$(),c=["bg-emerald-600","bg-yellow-600","bg-rose-600","bg-cyan-600","bg-amber-600","bg-red-600","bg-pink-600","bg-green-600","bg-fuchsia-600"],l=["bg-emerald-200","bg-yellow-200","bg-rose-200","bg-cyan-200","bg-amber-200","bg-red-200","bg-pink-200","bg-green-200","bg-fuchsia-200"],_=a=>c[a%c.length],p=a=>l[a%c.length],o=a=>{if(a=="birthday")return"Happy birthday";if(a=="work_anniversery")return"Work anniversary"};return(a,C)=>{const b=W("tooltip");return n(),i(E,null,[e("div",Ft,[Rt,e("div",Lt,[e("div",At,[(n(!0),i(E,null,T(s(t).allEventSource,(u,x)=>(n(),i("div",{class:"relative w-[180px] rounded-lg my-2",key:x},[e("div",{class:F(["h-[80px] rounded-lg",`${_(x)}`])},[e("p",Nt,d(o(u.type)),1)],2),e("div",Ot,[e("div",Tt,[e("div",Yt,[JSON.parse(u.avatar).type=="shortname"?(n(),i("div",{key:0,class:F([p(x),"h-full rounded-lg"])},[e("p",Bt,d(JSON.parse(u.avatar).data),1)],2)):(n(),i("img",{key:1,src:`data:image/png;base64,${JSON.parse(u.avatar).data}`,alt:"",class:"rounded-lg absolute w-[100%] h-[100%] top-0"},null,8,Vt))]),e("div",Ut,[e("div",Ht,[u.name.length<=8?(n(),i("p",It,d(u.name),1)):Y((n(),i("p",qt,[S(d(u.name?u.name.substring(0,8)+"..":""),1)])),[[b,u.name]]),e("p",Gt,d(s(D)(u.dob).format("DD"))+"th "+d(s(D)(u.dob).format("MMM")),1),e("p",null,[Y(e("i",zt,null,512),[[b,"wish"]])])])])]),Wt])]))),128))])])]),Jt],64)}}},Kt={class:"grid grid-cols-12 gap-4"},Qt={class:"col-span-5 w-[100%] !rounded-[20px] overflow-hidden"},Xt={class:"col-span-4 w-[100%] !rounded-[20px]"},Zt={class:"col-span-3 w-[100%] !rounded-[20px]"},es={class:"grid grid-cols-12 gap-4 pb-7"},ts={class:"col-span-8 !rounded-[20px]"},ss={class:"grid grid-cols-2 gap-4 my-2"},os={class:"!rounded-[20px] overflow-hidden"},as={class:"!rounded-[20px] overflow-hidden"},ns={class:"grid grid-cols-1"},ls={class:"col-span-4 my-2"},is={__name:"employee_dashboard",setup(f){const t=$();return(c,l)=>(n(),i("div",{class:"h-screen p-3 overflow-auto",onMousemove:l[0]||(l[0]=_=>s(t).canShowConfiguration=!1)},[e("div",Kt,[e("div",Qt,[r(Ae)]),e("div",Xt,[r(et)]),e("div",Zt,[r(jt)])]),e("div",es,[e("div",ts,[e("div",ss,[e("div",os,[r(mt)]),e("div",as,[r(St)])]),e("div",ns,[e("div",null,[r(H)])])]),e("div",ls,[r(U)])])],32))}},P=f=>(K("data-v-170a39b5"),f=f(),Q(),f),rs={key:0,class:"w-full"},cs={class:"font-[14px] font-['Poppins'] text-gray-500"},ds={class:"mb-2 text-xl font-semibold"},ps={class:"grid grid-cols-4 gap-3 my-2"},_s={class:"px-auto flex justify-center"},us={class:"text-3xl font-semibold text-center"},hs=P(()=>e("p",{class:"text-lg font-semibold text-center text-gray-500"},"Active Employees",-1)),ms={class:"px-auto flex justify-center"},fs={class:"text-3xl font-semibold text-center"},gs=P(()=>e("p",{class:"text-lg font-semibold text-center text-gray-500"},"New Employees",-1)),vs={class:"px-auto flex justify-center"},bs={class:"text-3xl font-semibold text-center"},xs=P(()=>e("p",{class:"text-lg font-semibold text-center text-gray-500"},"Exit Employees",-1)),ys={class:"px-auto flex justify-center"},ws={class:"text-3xl font-semibold text-center"},$s=P(()=>e("p",{class:"text-lg font-semibold text-center text-gray-500"},"Yet to Active Employees ",-1)),ks=P(()=>e("p",{class:"absolute left-0 mx-4 font-semibold fs-5"}," Reports",-1)),Cs={class:"relative right-0 mx-4 font-semibold fs-5"},Ds=P(()=>e("p",{class:"relative left-2 font-['poppins']"},"Download",-1)),Ss=P(()=>e("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16"},[e("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check"}),e("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"}),e("path",{d:"M8,1 L8,11",class:"svg-out"})],-1)),Es=[Ss],Ms={key:0,class:""},Ps={key:1,class:"flex justify-center"},js=P(()=>e("img",{class:"h-[450px]",src:se,alt:"",srcset:""},null,-1)),Fs=[js],Rs={__name:"org_employee_details",setup(f){const t=$(),c=async()=>{const p=new ExcelJS.Workbook,o=p.addWorksheet("Sheet1"),a=["Employee Code","Employee Name","Department","Process","Location"],C="This report generated by ABShrms payroll software ",b=a;o.addRow(b).eachCell((g,h)=>{g.fill={type:"pattern",pattern:"solid",fgColor:{argb:"252f70"}},g.font={bold:!0,color:{argb:"ffffff"}},o.getColumn(h).width=20}),Object.values(t.ShowEmployeeStatuswise).forEach((g,h)=>{console.log(g);const j=[];b.forEach(N=>{j.push(g[N])}),o.addRow(j)}),o.addRow([""]);const x=o.addRow([""]);x.getCell(1).value=C,o.mergeCells(x.number,1,x.number,3),x.getCell(1).alignment={wrapText:!0},x.getCell(1).font={italic:!0};const y=await p.xlsx.writeBuffer(),R=window.URL.createObjectURL(new Blob([y])),L=document.createElement("a");L.href=R,L.download=`${t.reportName}.xlsx`,L.click(),window.URL.revokeObjectURL(R)},l=m(!1),_=m("downloaded");return(p,o)=>{const a=w("Column"),C=w("DataTable"),b=w("Sidebar");return n(),i(E,null,[s(t).orgEmployeeDetailCount?(n(),i("div",rs,[e("p",cs,[S(" Current month - "),e("span",ds,d(s(D)(new Date).format("MMMM")),1)]),e("div",ps,[e("div",{class:"bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer",onClick:o[0]||(o[0]=u=>(s(t).canShowSidebar=!0,s(t).ShowEmployeeStatuswise={...s(t).orgEmployeeDetailCount.total_employees},s(t).reportName=`total_employee_reports_${new Date}`))},[e("div",_s,[e("span",us,d(s(t).orgEmployeeDetailCount.total_employee_count?s(t).orgEmployeeDetailCount.total_employee_count:0),1)]),hs]),e("div",{class:"bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer",onClick:o[1]||(o[1]=u=>(s(t).canShowSidebar=!0,s(t).ShowEmployeeStatuswise={...s(t).orgEmployeeDetailCount.new_employees},s(t).reportName=`new_employee_reports_${new Date}`))},[e("div",ms,[e("span",fs,d(s(t).orgEmployeeDetailCount.new_employee_count?s(t).orgEmployeeDetailCount.new_employee_count:0),1)]),gs]),e("div",{class:"bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer",onClick:o[2]||(o[2]=u=>(s(t).canShowSidebar=!0,s(t).ShowEmployeeStatuswise={...s(t).orgEmployeeDetailCount.exit_employees},s(t).reportName=`active_employee_reports_${new Date}`))},[e("div",vs,[e("span",bs,d(s(t).orgEmployeeDetailCount.exit_employee_count?s(t).orgEmployeeDetailCount.exit_employee_count:0),1)]),xs]),e("div",{class:"bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer",onClick:o[3]||(o[3]=u=>(s(t).canShowSidebar=!0,s(t).ShowEmployeeStatuswise={...s(t).orgEmployeeDetailCount.yet_to_active_employees},s(t).reportName=`yet_to_active_employee_reports_${new Date}`))},[e("div",ys,[e("span",ws,d(s(t).orgEmployeeDetailCount.yet_to_active_employee_count?s(t).orgEmployeeDetailCount.yet_to_active_employee_count:0),1)]),$s])])])):M("",!0),r(b,{visible:s(t).canShowSidebar,"onUpdate:visible":o[5]||(o[5]=u=>s(t).canShowSidebar=u),position:"right",class:"w-full"},{header:k(()=>[ks,e("div",Cs,[e("button",{class:"bg-[#E6E6E6] p-2 mx-2 rounded-md w-[120px]",onClick:o[4]||(o[4]=u=>(l.value=!l.value,c()))},[Ds,e("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:F([l.value==!0?_.value:" "])},Es,2)])])]),default:k(()=>[Object.values(s(t).ShowEmployeeStatuswise).length>=1?(n(),i("div",Ms,[r(C,{scrollable:"",scrollHeight:"450px",value:s(t).ShowEmployeeStatuswise?s(t).ShowEmployeeStatuswise:[]},{default:k(()=>[r(a,{field:"Employee Code",header:"Employee Code"}),r(a,{field:"Employee Name",header:"Employee Name",style:{"text-align":"left !important","white-space":"no !important"}}),r(a,{field:"Department",header:"Department",style:{"text-align":"left !important","white-space":"no !important"}}),r(a,{field:"Process",header:"Process",style:{"text-align":"left !important","white-space":"no !important"}}),r(a,{field:"Location",header:"Work location",style:{"text-align":"left !important","white-space":"no !important"}})]),_:1},8,["value"])])):(n(),i("div",Ps,Fs))]),_:1},8,["visible"])],64)}}},Ls=J(Rs,[["__scopeId","data-v-170a39b5"]]),As={class:"p-2 overflow-hidden bg-white rounded-lg",style:{height:"200px"}},Ns=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Analytics",-1),Os=e("div",{class:"h-full overflow-x-scroll bg-white rounded-lg"},[e("p",{class:"font-medium text-sm text-center"},"No data to display")],-1),Ts=[Ns,Os],Ys={__name:"Analytics",setup(f){return $(),(t,c)=>(n(),i("div",As,Ts))}},Bs={class:"p-2 overflow-hidden bg-white rounded-lg",style:{height:"200px"}},Vs=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Pending Requests",-1),Us={class:"h-full overflow-x-scroll bg-white rounded-lg"},Hs=["href"],Is={class:"p-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"},qs={class:"flex px-2 justify-between items-center"},Gs={class:"text-[14px] font-semibold"},zs={class:"flex items-center gap-6"},Ws={class:"text-xl font-semibold text-black"},Js=e("span",null,[e("i",{class:"fa fa-chevron-right","aria-hidden":"true"})],-1),Ks={__name:"leave_request",setup(f){const t=$(),c=l=>{if(l=="Leave Requests")return"attendance-leave-approvals";if(l=="Document Approvals")return"approvals-documents";if(l=="Attendance Regularization")return"attendance-regularization-approvals"};return(l,_)=>(n(),i("div",Bs,[Vs,e("div",Us,[s(t).hrPendingRequestCount?(n(!0),i(E,{key:0},T(s(t).hrPendingRequestCount,p=>(n(),i("a",{class:"px-auto",href:c(p.title)},[e("div",Is,[e("div",qs,[e("div",null,[e("span",Gs,d(p.title),1)]),e("div",zs,[e("span",Ws,d(p.value),1),Js])])])],8,Hs))),256)):M("",!0)])]))}},Qs={__name:"overall_employee",setup(f){const t=$();A(async()=>{l.value=_(),setTimeout(()=>{console.log(t.overallEmployeeCountForGraph),c.value.datasets[0].data=t.overallEmployeeCountForGraph},8e3)});const c=m({labels:["Male","Female","Others","App Check-Ins","Active Apps","Inactive Apps"],datasets:[{backgroundColor:["rgba(8, 115, 205, 1)","rgba(205, 159, 71, 1)","rgba(255, 205, 86, 0.2)","rgba(80, 64, 34, 1)","rgba(113, 74, 161, 1)","rgba(181, 86, 151, 1)"],borderWidth:10,borderColor:"white",data:[0,0,0,0,0,0]}]}),l=m();m();const _=()=>{const p=getComputedStyle(document.documentElement),o=p.getPropertyValue("--text-color"),a=p.getPropertyValue("--text-color-secondary");return p.getPropertyValue("--surface-border"),{maintainAspectRatio:!1,aspectRatio:100,plugins:{title:{display:!1,text:"Custom Chart Title"},legend:{display:!1,labels:{fontColor:o}}},scales:{x:{ticks:{autoSkip:!1,maxRotation:0,minRotation:0,textAlign:"center",padding:10,color:a,font:{weight:600}},grid:{display:!1,drawBorder:!1}},y:{display:!1,ticks:{color:a},grid:{color:!1,drawBorder:!1}}}}};return(p,o)=>{const a=w("Chart");return s(t).overallEmployeeCountForGraph?(n(),V(a,{key:0,type:"bar",data:c.value,options:l.value,class:"h-full"},null,8,["data","options"])):M("",!0)}}},Xs={class:"h-screen p-3 overflow-auto"},Zs={class:"grid grid-cols-12 gap-4"},eo={class:"col-span-8"},to={class:"col-span-12 w-[100%] !rounded-[20px] bg-white p-2"},so={class:"col-span-12 !rounded-[20px]"},oo={class:"grid grid-cols-12 gap-4 my-2"},ao={class:"!rounded-[20px] overflow-hidden col-span-5"},no={class:"!rounded-[20px] overflow-hidden bg-white col-span-7"},lo={class:"col-span-12"},io={class:"col-span-4 w-[100%] !rounded-[20px]"},ro={class:"py-3"},co={__name:"hr_dashboard",setup(f){return $(),m(0),(t,c)=>(n(),i("div",Xs,[e("div",Zs,[e("div",eo,[e("div",to,[r(Ls)]),e("div",so,[e("div",oo,[e("div",ao,[r(Ks)]),e("div",no,[r(Qs)])])]),e("div",lo,[r(H)])]),e("div",io,[e("div",null,[r(Ys)]),e("div",ro,[r(U)])])])]))}},po={key:1,class:""},_o={class:"pt-1 pb-0"},uo={class:"nav nav-pills nav-tabs-dashed",id:"pills-tab",role:"tablist"},ho=e("li",{class:"nav-item",role:"presentation"},[e("a",{class:"nav-link active",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#employee_details",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Self-dashboard")],-1),mo={key:0,class:"mx-4 nav-item",role:"presentation"},fo=e("a",{class:"nav-link",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#family_det",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Org-dashboard",-1),go=[fo],vo={key:1,class:"nav-item",role:"presentation"},bo=e("a",{class:"nav-link",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#experience_det",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Announcement",-1),xo=[bo],yo={key:2,class:"tab-content",id:"pills-tabContent"},wo={class:"tab-pane fade active show",id:"employee_details",role:"tabpanel","aria-labelledby":""},$o={class:"tab-pane fade",id:"family_det",role:"tabpanel","aria-labelledby":""},ko=e("div",{class:"tab-pane fade",id:"experience_det",role:"tabpanel","aria-labelledby":""},[e("div",{class:"flex justify-center"},[e("img",{class:"h-[430px] mx-auto",src:oe,alt:"",srcset:""})]),e("p",{class:"font-semibold text-lg text-center"},"Page is Under construction")],-1),Oo={__name:"dashboard",setup(f){const t=$(),c=m(),l=O(),_=X(t.allEventSource,(p,o)=>{p!==null&&handleData(p)});return A(async()=>{t.isDashboardDataReceived&&t.isHrDashboardDataReceived&&(c.value=!0,await t.getMainDashboardData(),await t.getHrDashboardMainSource(),O(),c.value=!1,B.get("/clear_cache").then(p=>{console.log(p.data)}))}),Z(()=>{_()}),(p,o)=>(n(),i(E,null,[s(t).canShowLoading?(n(),V(te,{key:0})):M("",!0),s(t).canShowLoading?M("",!0):(n(),i("div",po,[e("div",_o,[e("ul",uo,[ho,s(l).current_user_role==1||s(l).current_user_role==2||s(l).current_user_role==3?(n(),i("li",mo,go)):M("",!0),s(l).current_user_role==1?(n(),i("li",vo,xo)):M("",!0)])])])),s(t).canShowLoading?M("",!0):(n(),i("div",yo,[e("div",wo,[e("div",null,[r(is)])]),e("div",$o,[r(co)]),ko]))],64))}};export{Oo as default};
