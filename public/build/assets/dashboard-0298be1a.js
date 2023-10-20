import{r as m,z as q,o as L,c as $,e as n,f as r,g as e,F as E,m as O,t as d,h as s,w as H,A as G,p as j,i as S,n as l,l as w,B as z,d as W,_ as J,j as M,C as K,D as Q,k as B,E as X,G as Z}from"./app-140571a9.js";import{S as Y}from"./Service-30ee0026.js";import{u as C}from"./hr_dashboard.vue_vue_type_style_index_0_lang-781b2771.js";import{a as T}from"./index-362795f3.js";import{d as k}from"./dayjs.min-2f06af28.js";import{u as ee}from"./LeaveApply.vue_vue_type_style_index_0_lang-4b06d8fa.js";import"./exceljs.min-edd65134.js";import{L as te}from"./LoadingSpinner-1736c900.js";import{_ as se}from"./no-data-17442c4e.js";import{p as oe}from"./ProfilePagesStore-a8b701bc.js";import"./autoprefixer-cf16e9d7.js";import"./moment-fbc5633a.js";import"./_commonjs-dynamic-modules-302442b1.js";/* empty css                                                                       */const ae="/build/assets/Page-is-under-construction-9e66b52e.svg",ne="/build/assets/femaleDashboardImage-7f53f6fa.svg",le={class:"!h-[180px] w-[100%] overflow-hidden rounded-xl shadow-lg bg-[#DFE8FF] p-3 grid grid-cols-12 gap-4 justify-between leading-normal"},ie={class:"font-[14px] font-['Poppins'] text-gray-500 flex items-center"},re={class:"text-gray-900 text-[18px] mb-2 font-['Poppins']"},de={class:"flex gap-4 items-center"},ce=e("div",{class:"flex my-1 overflow-visible items-center !z-10"},[e("i",{class:"fa fa-sun-o text-warning my-auto text-[20px]","aria-hidden":"true"}),e("p",{class:"text-[12px] my-auto font-semibold px-2"},"General Shift")],-1),pe={class:"btn-status"},_e={class:"text-[12px] text-[#8B8B8B] font-['Poppins'] flex items-center"},ue={key:0,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},he={key:1,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},me={key:2,class:"w-[300px] max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},fe={key:3,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},ge=e("div",{class:"col-span-5 h-full !z-5"},[e("div",{class:"grid justify-center items-centers my-auto h-full border-[1px]"},[e("img",{src:ne,alt:"",srcset:"",class:"w-full h-full"})])],-1),ve={class:"bg-white modal-content"},be={class:"p-1 text-center modal-body"},xe={class:"check-in-animate"},ye={class:"mt-2"},we={class:"text-gray-900 text-[18px] mb-2 font-['Poppins']"},$e=e("span",null,"Welcome",-1),ke={key:0,class:"mb-4 text-muted"},Ce={key:1,class:"mb-4 text-muted"},De={class:"gap-2 hstack justify-content-center"},Se={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},Ee={class:"bg-white modal-content"},Me={class:"p-1 text-center modal-body"},Pe={class:"check-in-animate"},Fe={class:"mt-4"},je={class:"mb-3"},Re=e("p",{class:"mb-4 text-muted"},"See you tommorrow",-1),Ae={class:"gap-2 hstack justify-content-center"},Le={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},Ne={__name:"welcome_card",setup(g){const t=Y(),c=C(),i=m();m();const _=m([]),p=m(!1),a=m(!1),o=q({date:new Date,check:"",check_in:"",check_out:"",attendance_mode:"web",work_mode:"",checked:!1}),D=()=>{var v=new Date,h=v.getHours();h<12?i.value="Good Morning":h<18?i.value="Good Afternoon":i.value="Good Evening"},f=()=>{_.value.splice(0,_.value.length),o.check==!0?(o.check_in=new Date().toLocaleTimeString(),o.checked=!0,p.value=!0):(o.check_out=new Date().toLocaleTimeString(),a.value=!0,o.checked=!1),c.updateCheckin_out({checked:o.checked}).then(v=>{y.value=v.data.message}).finally(()=>{x(),A()})},u=m(!0),y=m(),x=async()=>{let v="/fetchEmpLastAttendanceStatus";await T.get(v).then(h=>{console.log(h.data),_.value.push(h.data),h.data.checkout_time?o.check=!1:h.data.checkin_time?o.check=!0:o.check=null}).finally(()=>{c.canShowTopbar=!0})};L(async()=>{D(),u&&await x().finally(()=>{u.value=!1})});const R=v=>(console.log(v),v=="biometric"?"fas fa-fingerprint fs-12":v=="web"?"fa fa-laptop fs-12":v=="mobile"?"fa fa-mobile-phone fs-12":""),A=()=>{c.check="",c.check_in="",c.check_out="",c.work_mode=""};return(v,h)=>{const F=$("lord-icon"),N=$("Dialog");return n(),r(E,null,[e("div",le,[(n(!0),r(E,null,O(_.value,b=>(n(),r("div",{class:"col-span-7 mb-8",key:b},[e("p",ie,d(i.value),1),e("div",re,d(s(t).current_user_name),1),e("div",de,[ce,e("div",pe,[H(e("input",{type:"checkbox",name:"checkbox",id:"checkbox",class:"hidden","onUpdate:modelValue":h[0]||(h[0]=I=>o.check=I),onChange:f},null,544),[[G,o.check]]),e("label",{for:"checkbox",class:j(["relative inline-block w-12 h-5 rounded-lg transition duration-300 cursor-pointer",[o.check?" bg-green-100":"bg-red-100"]])},[e("span",{class:j(["absolute inset-0 inline-block w-5 h-5 rounded-full shadow transform transition-transform cursor-pointer",[o.check?"translate-x-6 bg-green-400":"bg-red-400"]])},null,2)],2)])]),e("div",null,[e("p",_e,[S(" Time duration:"),e("span",null,d(b.effective_hours?b.effective_hours:0),1)]),b.checkin_time?(n(),r("p",ue,[S(d(`Check-In : ${b.checkin_time} (${s(k)(b.checkin_date).format("MMM D, YYYY")}) `)+" ",1),e("i",{class:j(["mx-2 text-sm font-semibold text-green-800",R(b.attendance_mode_checkin)])},null,2)])):(n(),r("p",he,d(`Check-In:
                    Missed In Punch`))),b.checkout_time?(n(),r("p",me,[S(d(`Check-Out : ${b.checkout_time} (${s(k)(b.checkout_date).format("MMM D, YYYY")}) `)+" ",1),e("i",{class:j(["mx-2 text-sm font-semibold text-green-800",R(b.attendance_mode_checkout)])},null,2)])):(n(),r("p",fe,d(`Check-Out:
                    Yet to Checkout`)))])]))),128)),ge]),l(N,{visible:p.value,"onUpdate:visible":h[2]||(h[2]=b=>p.value=b),modal:"",style:{width:"30vw"}},{default:w(()=>[e("div",ve,[e("div",be,[e("div",xe,[l(F,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",class:"gliters",colors:"primary:#1aff1a,secondary:#1aff1a"}),l(F,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#30e849"})]),e("div",ye,[e("div",we,[$e,S(" "+d(s(t).current_user_name),1)]),y.value?(n(),r("p",ke,d(y.value),1)):(n(),r("p",Ce,"Have a good day !")),e("div",De,[e("a",Se,[e("button",{onClick:h[1]||(h[1]=b=>p.value=!1),type:"button",class:"btn btn-primary"}," Close ")])])])])])]),_:1},8,["visible"]),l(N,{visible:a.value,"onUpdate:visible":h[4]||(h[4]=b=>a.value=b),modal:"",style:{width:"25vw"}},{default:w(()=>[e("div",Ee,[e("div",Me,[e("div",Pe,[l(F,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",colors:"primary:#ff3300,secondary:#ff3300",class:"gliters"}),l(F,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#e62e00"})]),e("div",Fe,[e("h4",je,"Bye "+d(s(t).current_user_name),1),Re,e("div",Ae,[e("a",Le,[e("button",{type:"button",class:"btn btn-primary",onClick:h[3]||(h[3]=b=>a.value=!1)}," Close ")])])])])])]),_:1},8,["visible"])],64)}}},Ye={class:"!h-[180px] rounded-[20px] shadow-sm bg-white"},Oe={class:"px-6 py-4"},He={class:"font-[14px] font-['Poppins'] text-gray-500"},Te={class:"mb-2 text-xl font-semibold"},Be={class:"grid grid-cols-3 gap-4 mt-4"},Ue={class:"bg-[#F6F6F6] rounded-lg p-3"},Ve={class:"px-auto"},Ie={class:"mb-2 text-3xl font-bold text-center"},qe=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),Ge=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Present",-1),ze={class:"p-3 bg-gray-100 rounded-lg"},We={class:"mb-2 text-3xl font-bold"},Je=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),Ke=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Leave",-1),Qe={class:"p-3 bg-gray-100 rounded-lg"},Xe={class:"mb-2 text-3xl font-bold"},Ze=e("span",{class:"px-1 text-base font-semibold text-gray-700"},"days",-1),et=e("p",{class:"py-2 text-lg font-semibold text-center text-gray-500"},"Absent",-1),tt={__name:"leave_details",setup(g){const t=C();return L(()=>{}),(c,i)=>(n(),r("div",Ye,[e("div",Oe,[e("p",He,[S(" Current month - "),e("span",Te,d(s(k)(new Date).format("MMMM")),1)]),e("div",Be,[e("div",Ue,[e("div",Ve,[e("span",Ie,d(s(t).attenanceReportPerMonth.present),1),qe]),Ge]),e("div",ze,[e("span",We,d(s(t).attenanceReportPerMonth.not_applied),1),Je,Ke]),e("div",Qe,[e("span",Xe,d(s(t).attenanceReportPerMonth.absent),1),Ze,et])])])]))}},st={class:"bg-white min-h-min rounded-lg overflow-hidden h-[100%]"},ot=z('<div class="flex items-center justify-between p-3 mb-3 bg-gray-100 card-title" id=""><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins]">Activity Log</span></div><div class="h-full overflow-x-scroll"><div class="divide-y-2 divide-gray-400 hover:bg-slate-100"><p class="text-sm font-medium text-center">No activity log to display</p></div></div>',2),at=[ot],U={__name:"notification",setup(g){return C(),(t,c)=>(n(),r("div",st,at))}},nt={class:"p-2 overflow-hidden bg-white rounded-lg",style:{height:"200px"}},lt=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Leave Balance",-1),it={class:"h-full overflow-x-scroll bg-white rounded-lg"},rt={class:"px-auto"},dt={class:"flex px-2"},ct={class:""},pt={class:"text-3xl font-semibold text-black"},_t=e("span",{class:""},"/",-1),ut={class:""},ht={class:"px-3"},mt={class:"font-semibold text-primary text-[14px] align-bottom py-2"},ft={__name:"leave_balance",setup(g){const t=C();return ee(),(c,i)=>(n(),r("div",nt,[lt,e("div",it,[e("div",rt,[(n(!0),r(E,null,O(s(t).leaveBalancePerMonthSource,_=>(n(),r("a",{href:"attendance-leave",key:_.leave_type,class:"p-2 block mx-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"},[e("div",dt,[e("div",ct,[e("span",pt,d(_.leave_balance),1),_t,e("span",ut,d(_.availed_leaves),1)]),e("div",ht,[e("p",mt,d(_.leave_type),1)])])]))),128))])])]))}},gt={class:"bg-[#FFEFE2] rounded-lg overflow-hidden p-3",style:{height:"200px"}},vt={class:"flex justify-between"},bt=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Calendar",-1),xt=e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"},null,-1),yt=[xt],wt={class:"flex justify-center items-center w-[100%]"},$t=e("i",{class:"pi pi-times"},null,-1),kt=[$t],Ct={class:"py-8"},Dt={class:"text-[#d1814c] font-semibold text-[36px] mb-2 font-['Petrona']",style:{}},St={class:"mb-2 font-semibold text-gray-900 text-[16px]"},Et={__name:"calender",setup(g){const t=m(!1);return(c,i)=>{const _=$("Calendar"),p=$("Dialog");return n(),r("div",gt,[e("div",vt,[bt,(n(),r("svg",{xmlns:"http://www.w3.org/2000/svg",onClick:i[0]||(i[0]=a=>t.value=!0),fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-[20px] h-[20px] text-gray-900 cursor-pointer"},yt))]),l(p,{visible:t.value,"onUpdate:visible":i[3]||(i[3]=a=>t.value=a),modal:"",header:"Calendar",style:{width:"30vw"}},{default:w(()=>[e("div",wt,[l(_,{modelValue:c.date,"onUpdate:modelValue":i[1]||(i[1]=a=>c.date=a),inline:""},null,8,["modelValue"])]),e("button",{onClick:i[2]||(i[2]=a=>t.value=!1),class:"absolute top-4 right-4"},kt)]),_:1},8,["visible"]),e("div",Ct,[e("p",Dt,d(s(k)(new Date).format("D, MMMM YYYY")),1),e("p",St,d(s(k)(new Date).format("dddd")),1)])])}}},Mt=["src","alt"],Pt=e("p",{class:"absolute top-[0px] text-[#fff] left-[0px] px-4 py-3 font-semibold fs-5 bg-[#001820] w-[100%]"}," Holiday list",-1),Ft={class:"p-2"},jt=e("h1",{class:"font-[600] my-3 text-[rgb(0,0,0)]"},"Upcoming Holidays",-1),Rt=e("h1",{class:"text-[#000] font-[600] my-3"},"Past Holidays",-1),At=e("div",{class:"mt-10 flex justify-center p-2 rounded-md bg-[#FFE2E2]"},[e("p",null,"This holiday schedule is derived from your company's official holiday notification. For additional information, please get in touch with your HR department.")],-1),Lt={class:"flex justify-center mt-10"},Nt={__name:"holiday_widget",setup(g){const t=m(),c=m(),i=m(),_=m(!1),p=()=>{T.get("/holiday/master-page").then(a=>{c.value=a.data;let o=!0;a.data.forEach((D,f)=>{o&&new Date(D.holiday_date)>=new Date&&(t.value=f,o=!1)}),i.value=c.value[0].image})};return L(()=>{p()}),(a,o)=>{const D=$("Galleria"),f=$("Column"),u=$("DataTable"),y=$("Sidebar");return n(),r(E,null,[l(D,{value:c.value,responsiveOptions:a.responsiveOptions,numVisible:5,circular:!0,containerStyle:"",class:"!h-[180px] !rounded-[20px] overflow-hidden",showItemNavigators:!0,showThumbnails:!1},{item:w(x=>[e("img",{src:`data:image/png;base64,${x.item.image}`,class:"mt-3 mb-2 !rounded-[20px] shadow-sm !h-[180px]",style:{width:"100%","margin-bottom":"10px",position:"relative",right:"0",bottom:"10px",display:"block"},alt:x.item.holiday_name},null,8,Mt),e("button",{class:"text-[#fff] absolute right-4 top-2 px-3 text-['poppins'] rounded-lg p-1 bg-[#00000067]",onClick:o[0]||(o[0]=R=>_.value=!0)},"View List")]),_:1},8,["value","responsiveOptions"]),l(y,{visible:_.value,"onUpdate:visible":o[2]||(o[2]=x=>_.value=x),position:"right",style:{width:"40vw !important"}},{header:w(()=>[Pt]),default:w(()=>[e("div",Ft,[jt,l(u,{value:c.value,class:"mb-12",paginator:"",rows:5,rowsPerPageOptions:[5,10,20,50]},{default:w(()=>[l(f,{field:"holiday_name",header:"Holiday Name"}),l(f,{field:"holiday_date",header:"Holiday Date"},{body:w(x=>[S(d(s(k)(x.data.holiday_date).format("DD-MMM-YYYY"))+" "+d(s(k)(x.data.holiday_date).format("ddd"))+" ",1)]),_:1}),l(f,{field:"holiday_description",header:"Holiday Description "})]),_:1},8,["value"]),Rt,l(u,{value:c.value,class:"",paginator:"",rows:5,rowsPerPageOptions:[5,10,20,50]},{default:w(()=>[l(f,{field:"holiday_name",header:"Holiday Name"}),l(f,{field:"holiday_date",header:"Holiday Date"},{body:w(x=>[S(d(s(k)(x.data.holiday_date).format("DD-MMM-YYYY"))+" "+d(s(k)(x.data.holiday_date).format("ddd"))+" ",1)]),_:1}),l(f,{field:"holiday_description",header:"Holiday Description "})]),_:1},8,["value"]),At]),e("div",Lt,[e("button",{class:"p-2 px-4 rounded-md border-[1.5px] border-[#000]",onClick:o[1]||(o[1]=x=>_.value=!1)},"Close")])]),_:1},8,["visible"])],64)}}},Yt={class:"bg-white rounded-lg p-2"},Ot=e("span",{class:"text-primary font-semibold fs-6"},"Events",-1),Ht={class:"min-h-min overflow-x-scroll h-[200px]"},Tt={class:"grid grid-cols-4 gap-4"},Bt={class:"font-semibold text-center text-white my-2 text-[12px] font-['Poppins']"},Ut={class:"absolute top-8 w-full z-10"},Vt={class:"grid grid-cols-2 w-11/12 bg-slate-100 mx-auto rounded-lg h-full"},It={class:"w-[100%] relative h-[90px]"},qt={class:"font-semibold text-4xl py-4 text-center align-middle text-white"},Gt=["src"],zt={class:"h-full"},Wt={class:"py-6"},Jt={key:0,class:"font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto"},Kt={key:1,class:"font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto"},Qt={class:"font-semibold text-sm text-center text-gray-600 my-auto"},Xt={class:"text-xs absolute right-6 fa fa-commenting-o text-right cursor-pointer","data-bs-target":"#wishes_popup","data-bs-toggle":"modal"},Zt=e("div",{class:"flex justify-center my-2"},null,-1),es=e("div",{id:"wishes_popup",class:"modal fade",role:"dialog"},[e("div",{class:"modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md"},[e("div",{class:"modal-content"},[e("div",{class:"py-2 border-0 modal-header"},[e("h6",{class:"modal-title"}," Wishes Text"),e("button",{type:"button",class:"bg-transparent border-0 outline-none close h3","data-bs-dismiss":"modal","aria-label":"Close"},[e("span",{"aria-hidden":"true"},"×")])]),e("div",{class:"modal-body"},[e("p",{for:"",class:"text-muted f-14 fw-bold"},"Commants here"),e("textarea",{name:"",id:"",cols:"",placeholder:"Commants here....",rows:"2",class:"resize-none form-control"}),e("div",{class:"text-end"},[e("button",{class:"mt-2 btn btn-border-orange",id:""},[e("i",{class:"fa fa-paper-plane me","aria-hidden":"true"}),S(" Send")])])])])])],-1),V={__name:"events",setup(g){Y();const t=C(),c=["bg-emerald-600","bg-yellow-600","bg-rose-600","bg-cyan-600","bg-amber-600","bg-red-600","bg-pink-600","bg-green-600","bg-fuchsia-600"],i=["bg-emerald-200","bg-yellow-200","bg-rose-200","bg-cyan-200","bg-amber-200","bg-red-200","bg-pink-200","bg-green-200","bg-fuchsia-200"],_=o=>c[o%c.length],p=o=>i[o%c.length],a=o=>{if(o=="birthday")return"Happy birthday";if(o=="work_anniversery")return"Work anniversary"};return(o,D)=>{const f=W("tooltip");return n(),r(E,null,[e("div",Yt,[Ot,e("div",Ht,[e("div",Tt,[(n(!0),r(E,null,O(s(t).allEventSource,(u,y)=>(n(),r("div",{class:"relative w-[180px] rounded-lg my-2",key:y},[e("div",{class:j(["h-[80px] rounded-lg",`${_(y)}`])},[e("p",Bt,d(a(u.type)),1)],2),e("div",Ut,[e("div",Vt,[e("div",It,[JSON.parse(u.avatar).type=="shortname"?(n(),r("div",{key:0,class:j([p(y),"h-full rounded-lg"])},[e("p",qt,d(JSON.parse(u.avatar).data),1)],2)):(n(),r("img",{key:1,src:`data:image/png;base64,${JSON.parse(u.avatar).data}`,alt:"",class:"rounded-lg absolute w-[100%] h-[100%] top-0"},null,8,Gt))]),e("div",zt,[e("div",Wt,[u.name.length<=8?(n(),r("p",Jt,d(u.name),1)):H((n(),r("p",Kt,[S(d(u.name?u.name.substring(0,8)+"..":""),1)])),[[f,u.name]]),e("p",Qt,d(s(k)(u.dob).format("DD"))+"th "+d(s(k)(u.dob).format("MMM")),1),e("p",null,[H(e("i",Xt,null,512),[[f,"wish"]])])])])]),Zt])]))),128))])])]),es],64)}}},ts={class:"grid grid-cols-12 gap-4"},ss={class:"col-span-5 w-[100%] !rounded-[20px] overflow-hidden"},os={class:"col-span-4 w-[100%] !rounded-[20px]"},as={class:"col-span-3 w-[100%] !rounded-[20px]"},ns={class:"grid grid-cols-12 gap-4 pb-7"},ls={class:"col-span-8 !rounded-[20px]"},is={class:"grid grid-cols-2 gap-4 my-2"},rs={class:"!rounded-[20px] overflow-hidden"},ds={class:"!rounded-[20px] overflow-hidden"},cs={class:"grid grid-cols-1"},ps={class:"col-span-4 my-2"},_s={__name:"employee_dashboard",setup(g){const t=C();return(c,i)=>(n(),r("div",{class:"h-screen p-3 overflow-auto",onMousemove:i[0]||(i[0]=_=>s(t).canShowConfiguration=!1)},[e("div",ts,[e("div",ss,[l(Ne)]),e("div",os,[l(tt)]),e("div",as,[l(Nt)])]),e("div",ns,[e("div",ls,[e("div",is,[e("div",rs,[l(ft)]),e("div",ds,[l(Et)])]),e("div",cs,[e("div",null,[l(V)])])]),e("div",ps,[l(U)])])],32))}},P=g=>(K("data-v-ffb46dfa"),g=g(),Q(),g),us={key:0,class:"w-full"},hs={class:"font-[14px] font-['Poppins'] text-gray-500"},ms={class:"mb-2 text-xl font-semibold"},fs={class:"grid grid-cols-4 gap-3 my-2"},gs={class:"flex justify-center px-auto"},vs={class:"text-3xl font-semibold text-center"},bs=P(()=>e("p",{class:"text-lg font-semibold text-center text-gray-500"},"Active Employees",-1)),xs={class:"flex justify-center px-auto"},ys={class:"text-3xl font-semibold text-center"},ws=P(()=>e("p",{class:"text-lg font-semibold text-center text-gray-500"},"New Employees",-1)),$s={class:"flex justify-center px-auto"},ks={class:"text-3xl font-semibold text-center"},Cs=P(()=>e("p",{class:"text-lg font-semibold text-center text-gray-500"},"Exit Employees",-1)),Ds={class:"flex justify-center px-auto"},Ss={class:"text-3xl font-semibold text-center"},Es=P(()=>e("p",{class:"text-lg font-semibold text-center text-gray-500"},"Yet to Active Employees ",-1)),Ms=P(()=>e("p",{class:"absolute left-0 mx-4 font-semibold fs-5"}," Reports",-1)),Ps={class:"relative right-0 mx-4 font-semibold fs-5"},Fs=P(()=>e("p",{class:"relative left-2 font-['poppins']"},"Download",-1)),js=P(()=>e("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16"},[e("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check"}),e("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"}),e("path",{d:"M8,1 L8,11",class:"svg-out"})],-1)),Rs=[js],As={key:0,class:""},Ls={key:1,class:"flex justify-center"},Ns=P(()=>e("img",{class:"h-[450px]",src:se,alt:"",srcset:""},null,-1)),Ys=[Ns],Os={__name:"org_employee_details",setup(g){const t=C(),c=async()=>{const p=new ExcelJS.Workbook,a=p.addWorksheet("Sheet1"),o=["Employee Code","Employee Name","Department","Process","Location"],D="This report generated by ABShrms payroll software ",f=o;a.addRow(f).eachCell((v,h)=>{v.fill={type:"pattern",pattern:"solid",fgColor:{argb:"252f70"}},v.font={bold:!0,color:{argb:"ffffff"}},a.getColumn(h).width=20}),Object.values(t.ShowEmployeeStatuswise).forEach((v,h)=>{console.log(v);const F=[];f.forEach(N=>{F.push(v[N])}),a.addRow(F)}),a.addRow([""]);const y=a.addRow([""]);y.getCell(1).value=D,a.mergeCells(y.number,1,y.number,3),y.getCell(1).alignment={wrapText:!0},y.getCell(1).font={italic:!0};const x=await p.xlsx.writeBuffer(),R=window.URL.createObjectURL(new Blob([x])),A=document.createElement("a");A.href=R,A.download=`${t.reportName}.xlsx`,A.click(),window.URL.revokeObjectURL(R)},i=m(!1),_=m("downloaded");return(p,a)=>{const o=$("Column"),D=$("DataTable"),f=$("Sidebar");return n(),r(E,null,[s(t).orgEmployeeDetailCount?(n(),r("div",us,[e("p",hs,[S(" Current month - "),e("span",ms,d(s(k)(new Date).format("MMMM")),1)]),e("div",fs,[e("div",{class:"bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer",onClick:a[0]||(a[0]=u=>(s(t).canShowSidebar=!0,s(t).ShowEmployeeStatuswise={...s(t).orgEmployeeDetailCount.total_employees},s(t).reportName=`total_employee_reports_${new Date}`))},[e("div",gs,[e("span",vs,d(s(t).orgEmployeeDetailCount.total_employee_count?s(t).orgEmployeeDetailCount.total_employee_count:0),1)]),bs]),e("div",{class:"bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer",onClick:a[1]||(a[1]=u=>(s(t).canShowSidebar=!0,s(t).ShowEmployeeStatuswise={...s(t).orgEmployeeDetailCount.new_employees},s(t).reportName=`new_employee_reports_${new Date}`))},[e("div",xs,[e("span",ys,d(s(t).orgEmployeeDetailCount.new_employee_count?s(t).orgEmployeeDetailCount.new_employee_count:0),1)]),ws]),e("div",{class:"bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer",onClick:a[2]||(a[2]=u=>(s(t).canShowSidebar=!0,s(t).ShowEmployeeStatuswise={...s(t).orgEmployeeDetailCount.exit_employees},s(t).reportName=`active_employee_reports_${new Date}`))},[e("div",$s,[e("span",ks,d(s(t).orgEmployeeDetailCount.exit_employee_count?s(t).orgEmployeeDetailCount.exit_employee_count:0),1)]),Cs]),e("div",{class:"bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer",onClick:a[3]||(a[3]=u=>(s(t).canShowSidebar=!0,s(t).ShowEmployeeStatuswise={...s(t).orgEmployeeDetailCount.yet_to_active_employees},s(t).reportName=`yet_to_active_employee_reports_${new Date}`))},[e("div",Ds,[e("span",Ss,d(s(t).orgEmployeeDetailCount.yet_to_active_employee_count?s(t).orgEmployeeDetailCount.yet_to_active_employee_count:0),1)]),Es])])])):M("",!0),l(f,{visible:s(t).canShowSidebar,"onUpdate:visible":a[5]||(a[5]=u=>s(t).canShowSidebar=u),position:"right",style:{width:"70vw !important"}},{header:w(()=>[Ms,e("div",Ps,[e("button",{class:"bg-[#E6E6E6] p-2 mx-2 rounded-md w-[120px]",onClick:a[4]||(a[4]=u=>(i.value=!i.value,c()))},[Fs,e("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:j([i.value==!0?_.value:" "])},Rs,2)])])]),default:w(()=>[Object.values(s(t).ShowEmployeeStatuswise).length>=1?(n(),r("div",As,[l(D,{scrollable:"",scrollHeight:"h-[500px]",value:s(t).ShowEmployeeStatuswise?s(t).ShowEmployeeStatuswise:[]},{default:w(()=>[l(o,{field:"Employee_Code",header:"Employee Code"}),l(o,{field:"Employee_Name",header:"Employee Name",style:{"text-align":"left !important","white-space":"no !important"}}),l(o,{field:"Department",header:"Department",style:{"text-align":"left !important","white-space":"no !important"}}),l(o,{field:"Process",header:"Process",style:{"text-align":"left !important","white-space":"no !important"}}),l(o,{field:"Location",header:"Work location",style:{"text-align":"left !important","white-space":"no !important"}})]),_:1},8,["value"])])):(n(),r("div",Ls,Ys))]),_:1},8,["visible"])],64)}}},Hs=J(Os,[["__scopeId","data-v-ffb46dfa"]]),Ts={class:"p-2 overflow-hidden bg-white rounded-lg",style:{height:"200px"}},Bs=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Analytics",-1),Us=e("div",{class:"h-full overflow-x-scroll bg-white rounded-lg"},[e("p",{class:"font-medium text-sm text-center"},"No data to display")],-1),Vs=[Bs,Us],Is={__name:"Analytics",setup(g){return C(),(t,c)=>(n(),r("div",Ts,Vs))}},qs={class:"p-2 overflow-hidden bg-white rounded-lg",style:{height:"200px"}},Gs=e("span",{class:"font-semibold text-[14px] text-[#000] font-['Poppins]"},"Pending Requests",-1),zs={class:"h-full overflow-x-scroll bg-white rounded-lg"},Ws=["href"],Js={class:"p-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"},Ks={class:"flex px-2 justify-between items-center"},Qs={class:"text-[14px] font-semibold"},Xs={class:"flex items-center gap-6"},Zs={class:"text-xl font-semibold text-black"},eo=e("span",null,[e("i",{class:"fa fa-chevron-right","aria-hidden":"true"})],-1),to={__name:"leave_request",setup(g){const t=C(),c=i=>{if(i=="Leave Requests")return"Approvals/leave";if(i=="Document Approvals")return"Approvals/Onboarding-documents";if(i=="Attendance Regularization")return"Approvals/Attendance-regularization"};return(i,_)=>(n(),r("div",qs,[Gs,e("div",zs,[s(t).hrPendingRequestCount?(n(!0),r(E,{key:0},O(s(t).hrPendingRequestCount,p=>(n(),r("a",{class:"px-auto",href:c(p.title)},[e("div",Js,[e("div",Ks,[e("div",null,[e("span",Qs,d(p.title),1)]),e("div",Xs,[e("span",Zs,d(p.value),1),eo])])])],8,Ws))),256)):M("",!0)])]))}},so={__name:"overall_employee",setup(g){const t=C();L(async()=>{i.value=_(),setTimeout(()=>{console.log(t.overallEmployeeCountForGraph),c.value.datasets[0].data=t.overallEmployeeCountForGraph},8e3)});const c=m({labels:["Male","Female","Others","App Check-Ins","Active Apps","Inactive Apps"],datasets:[{backgroundColor:["rgba(8, 115, 205, 1)","rgba(205, 159, 71, 1)","rgba(255, 205, 86, 0.2)","rgba(80, 64, 34, 1)","rgba(113, 74, 161, 1)","rgba(181, 86, 151, 1)"],borderWidth:10,borderColor:"white",data:[0,0,0,0,0,0]}]}),i=m();m();const _=()=>{const p=getComputedStyle(document.documentElement),a=p.getPropertyValue("--text-color"),o=p.getPropertyValue("--text-color-secondary");return p.getPropertyValue("--surface-border"),{maintainAspectRatio:!1,aspectRatio:100,plugins:{title:{display:!1,text:"Custom Chart Title"},legend:{display:!1,labels:{fontColor:a}}},scales:{x:{ticks:{autoSkip:!1,maxRotation:0,minRotation:0,textAlign:"center",padding:10,color:o,font:{weight:600}},grid:{display:!1,drawBorder:!1}},y:{display:!1,ticks:{color:o},grid:{color:!1,drawBorder:!1}}}}};return(p,a)=>{const o=$("Chart");return s(t).overallEmployeeCountForGraph?(n(),B(o,{key:0,type:"bar",data:c.value,options:i.value,class:"h-full"},null,8,["data","options"])):M("",!0)}}},oo={class:"h-[100%] p-2 overflow-auto"},ao={class:"grid grid-cols-12 gap-4"},no={class:"col-span-8"},lo={class:"col-span-12 w-[100%] !rounded-[20px] bg-white p-2"},io={class:"col-span-12 !rounded-[20px]"},ro={class:"grid grid-cols-12 gap-4 my-2"},co={class:"!rounded-[20px] overflow-hidden col-span-5"},po={class:"!rounded-[20px] overflow-hidden bg-white col-span-7"},_o={class:"col-span-12"},uo={class:"col-span-4 w-[100%] !rounded-[20px]"},ho={class:"py-3 h-[65%]"},mo={__name:"hr_dashboard",setup(g){return C(),m(0),(t,c)=>(n(),r("div",oo,[e("div",ao,[e("div",no,[e("div",lo,[l(Hs)]),e("div",io,[e("div",ro,[e("div",co,[l(to)]),e("div",po,[l(so)])])]),e("div",_o,[l(V)])]),e("div",uo,[e("div",null,[l(Is)]),e("div",ho,[l(U)])])])]))}},fo={key:1,class:""},go={class:"pt-1 pb-0"},vo={class:"nav nav-pills nav-tabs-dashed",id:"pills-tab",role:"tablist"},bo=e("li",{class:"nav-item",role:"presentation"},[e("a",{class:"nav-link active",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#employee_details",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Self-Dashboard")],-1),xo={key:0,class:"mx-4 nav-item",role:"presentation"},yo=e("a",{class:"nav-link",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#family_det",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," ORG-Dashboard",-1),wo=[yo],$o={key:1,class:"nav-item",role:"presentation"},ko=e("a",{class:"nav-link",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#experience_det",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Announcement",-1),Co=[ko],Do={key:2,class:"tab-content",id:"pills-tabContent"},So={class:"tab-pane fade active show",id:"employee_details",role:"tabpanel","aria-labelledby":""},Eo={class:"tab-pane fade",id:"family_det",role:"tabpanel","aria-labelledby":""},Mo=e("div",{class:"tab-pane fade",id:"experience_det",role:"tabpanel","aria-labelledby":""},[e("div",{class:"flex justify-center"},[e("img",{class:"h-[430px] mx-auto",src:ae,alt:"",srcset:""})]),e("p",{class:"font-semibold text-lg text-center"},"Page is Under construction")],-1),Io={__name:"dashboard",setup(g){const t=C(),c=m(),i=Y();oe();const _=X(t.allEventSource,(p,a)=>{p!==null&&handleData(p)});return L(async()=>{t.isDashboardDataReceived&&t.isHrDashboardDataReceived&&(c.value=!0,await t.getMainDashboardData(),await t.getHrDashboardMainSource(),Y(),c.value=!1,T.get("/clear_cache").then(p=>{console.log(p.data)}))}),Z(()=>{_()}),(p,a)=>(n(),r(E,null,[s(t).canShowLoading?(n(),B(te,{key:0})):M("",!0),s(t).canShowLoading?M("",!0):(n(),r("div",fo,[e("div",go,[e("ul",vo,[bo,s(i).current_user_role==1||s(i).current_user_role==2||s(i).current_user_role==3?(n(),r("li",xo,wo)):M("",!0),s(i).current_user_role==1?(n(),r("li",$o,Co)):M("",!0)])])])),s(t).canShowLoading?M("",!0):(n(),r("div",Do,[e("div",So,[e("div",null,[l(_s)])]),e("div",Eo,[l(mo)]),Mo]))],64))}};export{Io as default};
