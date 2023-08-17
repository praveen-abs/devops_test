import{I as x,a2 as O,ak as S,g as P,o as t,c as o,d as e,F as k,f as j,t as s,aj as d,k as E,au as I,l as b,n as M,h,w as C,b as L,j as z,T as G}from"./toastservice.esm-3d6796bd.js";import{S as Y}from"./Service-bda4280b.js";import{u as y}from"./dashboard_service-3cbb3975.js";import{a as B}from"./index-362795f3.js";import{d as v}from"./dayjs.min-2f06af28.js";import{u as V}from"./leave_apply_service-e1e671e7.js";/* empty css                                                   */import{L as H}from"./LoadingSpinner-e8e4c1ec.js";const J="/build/assets/femaleDashboardImage-7f53f6fa.svg";const R={class:"h-[180px] overflow-hidden rounded shadow-lg bg-[#DFE8FF] p-3 grid grid-cols-12 gap-4 justify-between leading-normal"},U={class:"mb-8 col-span-7"},W={class:"font-[14px] font-['Poppins'] text-gray-500 flex items-center"},K={class:"text-gray-900 text-[18px] mb-2 font-['Poppins']"},Q=e("div",{class:"flex my-1 overflow-visible items-center !z-10"},[e("i",{class:"fa fa-sun-o text-warning my-auto text-[20px]","aria-hidden":"true"}),e("p",{class:"text-[12px] my-auto font-semibold px-2"},"General Shift")],-1),X={class:"switch-checkbox relative left-[150px] bottom-8 !w-[98px] font-semibold z-10 font-['Poppins']"},Z=e("span",{class:"slider-checkbox check-inw round flex items-center"},[e("span",{class:"slider-checkbox-text !text-[8px] font-semibold"})],-1),ee=e("p",{class:"text-[12px] mt-[-20px] text-[#8B8B8B] font-['Poppins'] flex items-center"},[b(" Time duration:"),e("span",null,"09:30")],-1),te={key:0,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},se={key:1,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},oe={key:2,class:"w-[300px] max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},ae={key:3,class:"w-[300px] my-2 max-[1300px]:text-[9px] font-['Poppins'] text-[12px]"},ne=e("div",{class:"col-span-5 h-full !z-5"},[e("div",{class:"grid justify-center items-centers my-auto h-full border-[1px]"},[e("img",{src:J,alt:"",srcset:"",class:"w-full h-full"})])],-1),le={class:"modal-content bg-white"},ce={class:"p-1 text-center modal-body"},ie={class:"check-in-animate"},de={class:"mt-2"},re={class:"text-gray-900 text-[18px] mb-2 font-['Poppins']"},_e=e("span",null,"Welcome",-1),pe={key:0,class:"mb-4 text-muted"},he={key:1,class:"mb-4 text-muted"},me={class:"gap-2 hstack justify-content-center"},ue={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},fe={class:"modal-content bg-white"},xe={class:"p-1 text-center modal-body"},ge={class:"check-in-animate"},be={class:"mt-4"},ve={class:"mb-3"},ye=e("p",{class:"mb-4 text-muted"},"See you tommorrow",-1),we={class:"gap-2 hstack justify-content-center"},ke={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},$e={__name:"welcome_card",setup(g){const l=Y(),c=y(),r=x();x();const n=x([]),u=x(!1),f=x(!1),a=O({date:new Date,check:"",check_in:"",check_out:"",attendance_mode:"web",work_mode:"",checked:!1}),F=()=>{var m=new Date,i=m.getHours();i<12?r.value="Good Morning":i<18?r.value="Good Afternoon":r.value="Good Evening"},$=()=>{n.value.splice(0,n.value.length),a.check==!0?(a.check_in=new Date().toLocaleTimeString(),a.checked=!0,u.value=!0):(a.check_out=new Date().toLocaleTimeString(),f.value=!0,a.checked=!1),c.updateCheckin_out({checked:a.checked}).then(m=>{_.value=m.data.message}).finally(()=>{w(),N()})},_=x(),w=async()=>{let m="/fetchEmpLastAttendanceStatus";await B.get(m).then(i=>{console.log(i.data),n.value.push(i.data),i.data.checkout_time?a.check=!1:i.data.checkin_time?a.check=!0:a.check=null}).finally(()=>{c.canShowTopbar=!0})};S(()=>{F(),w()});const T=m=>(console.log(m),m=="biometric"?"fas fa-fingerprint fs-12":m=="web"?"fa fa-laptop fs-12":m=="mobile"?"fa fa-mobile-phone fs-12":""),N=()=>{c.check="",c.check_in="",c.check_out="",c.work_mode=""};return(m,i)=>{const D=P("lord-icon"),A=P("Dialog");return t(),o(k,null,[e("div",R,[(t(!0),o(k,null,j(n.value,p=>(t(),o("div",U,[e("p",W,s(r.value),1),e("div",K,s(d(l).current_user_name),1),Q,e("label",X,[E(e("input",{type:"checkbox",id:"checkin_function",class:"text-[6px] font-semibold","onUpdate:modelValue":i[0]||(i[0]=q=>a.check=q),onChange:$},null,544),[[I,a.check]]),Z]),e("div",null,[ee,p.checkin_time?(t(),o("p",te,[b(s(`Check-In : ${p.checkin_time} (${d(v)(p.checkin_date).format("MMM D, YYYY")}) `)+" ",1),e("i",{class:M(["text-green-800 font-semibold text-sm mx-2",T(p.attendance_mode_checkin)])},null,2)])):(t(),o("p",se,s("Check-In: --:--:--"))),p.checkout_time?(t(),o("p",oe,[b(s(`Check-Out : ${p.checkout_time} (${d(v)(p.checkout_date).format("MMM D, YYYY")}) `)+" ",1),e("i",{class:M(["text-green-800 font-semibold text-sm mx-2",T(p.attendance_mode_checkout)])},null,2)])):(t(),o("p",ae,s("Check-Out: --:--:--")))])]))),256)),ne]),h(A,{visible:u.value,"onUpdate:visible":i[2]||(i[2]=p=>u.value=p),modal:"",style:{width:"30vw"}},{default:C(()=>[e("div",le,[e("div",ce,[e("div",ie,[h(D,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",class:"gliters",colors:"primary:#1aff1a,secondary:#1aff1a"}),h(D,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#30e849"})]),e("div",de,[e("div",re,[_e,b(" "+s(d(l).current_user_name),1)]),_.value?(t(),o("p",pe,s(_.value),1)):(t(),o("p",he,"Have a good day !")),e("div",me,[e("a",ue,[e("button",{onClick:i[1]||(i[1]=p=>u.value=!1),type:"button",class:"btn btn-primary"}," Close ")])])])])])]),_:1},8,["visible"]),h(A,{visible:f.value,"onUpdate:visible":i[4]||(i[4]=p=>f.value=p),modal:"",style:{width:"25vw"}},{default:C(()=>[e("div",fe,[e("div",xe,[e("div",ge,[h(D,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",colors:"primary:#ff3300,secondary:#ff3300",class:"gliters"}),h(D,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#e62e00"})]),e("div",be,[e("h4",ve,"Bye "+s(d(l).current_user_name),1),ye,e("div",we,[e("a",ke,[e("button",{type:"button",class:"btn btn-primary",onClick:i[3]||(i[3]=p=>f.value=!1)}," Close ")])])])])])]),_:1},8,["visible"])],64)}}},De={class:"h-[180px] rounded overflow-hidden shadow-lg bg-white"},Me={class:"px-6 py-4"},Ce={class:"font-[14px] font-['Poppins'] text-gray-500"},Se={class:"font-semibold text-xl mb-2"},je={class:"grid grid-cols-3 gap-4 mt-4"},Pe={class:"bg-[#F6F6F6] rounded-lg p-3"},Ee={class:"px-auto"},Le={class:"font-bold text-3xl mb-2 text-center"},Ye=e("span",{class:"text-gray-700 text-base font-semibold px-1"},"days",-1),Fe=e("p",{class:"font-semibold text-lg text-gray-500 py-2 text-center"},"Present",-1),Te={class:"bg-gray-100 rounded-lg p-3"},Ae={class:"font-bold text-3xl mb-2"},Be=e("span",{class:"text-gray-700 text-base font-semibold px-1"},"days",-1),Ne=e("p",{class:"font-semibold text-lg text-gray-500 py-2 text-center"},"Leave",-1),qe={class:"bg-gray-100 rounded-lg p-3"},Oe={class:"font-bold text-3xl mb-2"},Ie=e("span",{class:"text-gray-700 text-base font-semibold px-1"},"days",-1),ze=e("p",{class:"font-semibold text-lg text-gray-500 py-2 text-center"},"Absent",-1),Ge={__name:"leave_details",setup(g){const l=y();return S(()=>{}),(c,r)=>(t(),o("div",De,[e("div",Me,[e("p",Ce,[b(" Current month - "),e("span",Se,s(d(v)(new Date).format("MMMM")),1)]),e("div",je,[e("div",Pe,[e("div",Ee,[e("span",Le,s(d(l).attenanceReportPerMonth.present),1),Ye]),Fe]),e("div",Te,[e("span",Ae,s(d(l).attenanceReportPerMonth.not_applied),1),Be,Ne]),e("div",qe,[e("span",Oe,s(d(l).attenanceReportPerMonth.absent),1),Ie,ze])])])]))}},Ve={class:"bg-white h-[700px] rounded-lg overflow-hidden"},He=e("div",{class:"mb-3 p-3 card-title flex items-center justify-between bg-gray-100",id:""},[e("span",{class:"text-primary font-semibold fs-6"},"Notifications")],-1),Je={class:"overflow-x-scroll h-full"},Re={class:"p-2"},Ue={class:"notify-content text-black"},We={class:"mb-1 orange-median items-center flex justify-between"},Ke={class:"orange-median font-semibold text-sm"},Qe={class:"notify-message"},Xe={class:"text-xs text-gray-600 font-medium"},Ze={__name:"notification",setup(g){const l=y();return(c,r)=>(t(),o("div",Ve,[He,e("div",Je,[(t(!0),o(k,null,j(d(l).allNotificationSource,n=>(t(),o("div",{class:"p-1 my-1 rounded-lg shadow-md hover:bg-slate-100",key:n.id},[e("div",Re,[e("a",Ue,[e("p",We,[e("span",Ke,s(n.notification_title),1)]),e("div",Qe,[e("p",Xe,s(n.notification_body),1)])])])]))),128))])]))}};const et={class:"bg-white rounded-lg overflow-hidden p-2",style:{height:"200px"}},tt=e("span",{class:"text-primary font-semibold fs-6"},"Leave Balance",-1),st={class:"bg-white rounded-lg overflow-x-scroll h-full"},ot={class:"px-auto"},at={class:"flex px-2"},nt={class:""},lt={class:"text-3xl font-semibold text-black"},ct=e("span",{class:""},"/",-1),it={class:""},dt={class:"px-3"},rt={class:"font-semibold text-primary text-[14px] align-bottom py-2"},_t={__name:"leave_balance",setup(g){const l=y();return V(),(c,r)=>(t(),o("div",et,[tt,e("div",st,[e("div",ot,[(t(!0),o(k,null,j(d(l).leaveBalancePerMonthSource,n=>(t(),o("div",{key:n.leave_type,class:"bg-gray-200 my-2 p-2 mx-2 rounded-lg cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"},[e("div",at,[e("div",nt,[e("span",lt,s(n.leave_balance),1),ct,e("span",it,s(n.avalied_leaves),1)]),e("div",dt,[e("p",rt,s(n.leave_type),1)])])]))),128))])])]))}};const pt={class:"bg-[#FFEFE2] rounded-lg overflow-hidden p-3",style:{height:"200px"}},ht=e("div",{class:"flex justify-between"},[e("span",{class:"text-primary font-semibold fs-6"},"Calendar"),e("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-6 h-6 text-gray-900 cursor-pointer"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"})])],-1),mt={class:"py-8"},ut={class:"text-[#d1814c] font-semibold text-[30px] mb-2",style:{"font-family":"'Libre Baskerville', serif"}},ft={class:"text-gray-900 font-semibold text-md mb-2"},xt={__name:"calender",setup(g){return(l,c)=>(t(),o("div",pt,[ht,e("div",mt,[e("p",ut,s(d(v)(new Date).format("MMMM D, YYYY")),1),e("p",ft,s(d(v)(new Date).format("dddd")),1)])]))}};const gt=["src","alt"],bt={__name:"holiday_widget",setup(g){const l=x(),c=x();x();const r=()=>{B.get("/holiday/master-page").then(n=>{console.log(n.data),c.value=n.data;let u=!0;n.data.forEach((f,a)=>{u&&new Date(f.holiday_date)>=new Date&&(l.value=a,u=!1)})})};return S(()=>{r()}),(n,u)=>{const f=P("Galleria");return t(),L(f,{value:c.value,responsiveOptions:n.responsiveOptions,class:"h-[170px]",numVisible:5,circular:!0,containerStyle:"max-width: 400px",showItemNavigators:!0,showThumbnails:!1},{item:C(a=>[e("img",{src:`data:image/png;base64,${a.item.image}`,class:"mt-3 mb-2 rounded shadow-sm",style:{width:"450px",height:"180px","margin-bottom":"10px",position:"relative",bottom:"10px",display:"block"},alt:a.item.holiday_name},null,8,gt)]),_:1},8,["value","responsiveOptions"])}}};const vt={class:"bg-white rounded-lg p-2 mb-16"},yt=e("span",{class:"text-primary font-semibold fs-6"},"Events",-1),wt={class:"h-[500px] overflow-x-scroll"},kt={class:"grid grid-cols-4 gap-4"},$t={class:"font-semibold text-center text-white my-2 text-[12px] font-['Poppins']"},Dt={class:"absolute top-8 w-full z-10"},Mt={class:"grid grid-cols-2 w-11/12 bg-slate-100 mx-auto rounded-lg h-full"},Ct={class:""},St={class:"font-semibold text-4xl py-4 text-center align-middle text-white"},jt=["src"],Pt={class:"h-full"},Et={class:"py-6"},Lt={key:0,class:"font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto"},Yt={key:1,class:"font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto"},Ft={class:"font-semibold text-sm text-center text-gray-600 my-auto"},Tt={class:"text-xs absolute right-6 fa fa-commenting-o text-right cursor-pointer","data-bs-target":"#wishes_popup","data-bs-toggle":"modal"},At=e("div",{class:"flex justify-center my-2"},null,-1),Bt=e("div",{id:"wishes_popup",class:"modal fade",role:"dialog"},[e("div",{class:"modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md"},[e("div",{class:"modal-content"},[e("div",{class:"py-2 border-0 modal-header"},[e("h6",{class:"modal-title"}," Wishes Text"),e("button",{type:"button",class:"bg-transparent border-0 outline-none close h3","data-bs-dismiss":"modal","aria-label":"Close"},[e("span",{"aria-hidden":"true"},"×")])]),e("div",{class:"modal-body"},[e("p",{for:"",class:"text-muted f-14 fw-bold"},"Commants here"),e("textarea",{name:"",id:"",cols:"",placeholder:"Commants here....",rows:"2",class:"resize-none form-control"}),e("div",{class:"text-end"},[e("button",{class:"mt-2 btn btn-border-orange",id:""},[e("i",{class:"fa fa-paper-plane me","aria-hidden":"true"}),b(" Send")])])])])])],-1),Nt={__name:"events",setup(g){Y();const l=y(),c=["bg-emerald-600","bg-yellow-600","bg-rose-600","bg-cyan-600","bg-amber-600","bg-red-600","bg-blue-600","bg-pink-600","bg-green-600","bg-fuchsia-600"],r=["bg-emerald-200","bg-yellow-200","bg-rose-200","bg-cyan-200","bg-amber-200","bg-red-200","bg-blue-200","bg-pink-200","bg-green-200","bg-fuchsia-200"],n=a=>c[a%c.length],u=a=>r[a%c.length],f=a=>{if(a=="birthday")return"Happy birthday";if(a=="work_anniversery")return"Work anniversary"};return(a,F)=>{const $=z("tooltip");return t(),o(k,null,[e("div",vt,[yt,e("div",wt,[e("div",kt,[(t(!0),o(k,null,j(d(l).allEventSource,(_,w)=>(t(),o("div",{class:"relative w-[180px] rounded-lg my-8",key:w},[e("div",{class:M(["h-[80px] rounded-lg",`${n(w)}`])},[e("p",$t,s(f(_.type)),1)],2),e("div",Dt,[e("div",Mt,[e("div",Ct,[JSON.parse(_.avatar).type=="shortname"?(t(),o("div",{key:0,class:M([u(w),"h-full rounded-lg"])},[e("p",St,s(JSON.parse(_.avatar).data),1)],2)):(t(),o("img",{key:1,src:`data:image/png;base64,${JSON.parse(_.avatar).data}`,alt:"",class:"rounded-lg h-full"},null,8,jt))]),e("div",Pt,[e("div",Et,[_.name.length<=8?(t(),o("p",Lt,s(_.name),1)):E((t(),o("p",Yt,[b(s(_.name?_.name.substring(0,8)+"..":""),1)])),[[$,_.name]]),e("p",Ft,s(d(v)(_.dob).format("DD"))+"th "+s(d(v)(_.dob).format("MMM")),1),e("p",null,[E(e("i",Tt,null,512),[[$,"wish"]])])])])]),At])]))),128))])])]),Bt],64)}}};const qt={class:"grid grid-cols-12 gap-4"},Ot={class:"col-span-5"},It={class:"col-span-4"},zt={class:"bg-white rounded-lg col-span-3"},Gt={class:"grid grid-cols-12 gap-4 pb-7"},Vt={class:"col-span-8"},Ht={class:"grid grid-cols-2 gap-4 my-2"},Jt={class:"grid grid-cols-1"},Rt={class:"col-span-4 my-2"},Ut={__name:"employee_dashboard",setup(g){const l=y();return(c,r)=>(t(),o("div",{class:"p-3 overflow-auto h-screen",onMousemove:r[0]||(r[0]=n=>d(l).canShowConfiguration=!1)},[e("div",qt,[e("div",Ot,[h($e)]),e("div",It,[h(Ge)]),e("div",zt,[h(bt)])]),e("div",Gt,[e("div",Vt,[e("div",Ht,[e("div",null,[h(_t)]),e("div",null,[h(xt)])]),e("div",Jt,[e("div",null,[h(Nt)])])]),e("div",Rt,[h(Ze)])])],32))}},os={__name:"dashboard",setup(g){const l=y(),c=x();return S(async()=>{c.value=!0,await l.getMainDashboardData(),Y(),c.value=!1}),(r,n)=>d(l).canShowLoading?(t(),L(H,{key:0})):(t(),L(G,{key:1,"enter-active-class":"transition ease-out duration-600 transform","enter-class":"opacity-0 translate-y-2","enter-to-class":"opacity-100 translate-y-0","leave-active-class":"transition ease-in duration-100 transform","leave-class":"opacity-100 translate-y-0","leave-to-class":"opacity-0 translate-y-2"},{default:C(()=>[h(Ut)]),_:1}))}};export{os as _};
