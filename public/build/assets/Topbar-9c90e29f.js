import{Q as d,ab as I,o as a,c as r,aa as o,d as e,t as c,k as h,l as v,a as m,b as U,w as _,F as b,f as $,T as w,B as Y,h as x,g as K,j as Q,n as X}from"./inputnumber.esm-5d69a21b.js";import{a as f}from"./index-362795f3.js";import{u as G}from"./dashboard_service-f7b82aab.js";import{S as H}from"./Service-7a074f26.js";const J="/build/assets/setting-7207a137.svg",D="/build/assets/notification-429a4257.svg",W="/build/assets/exit-9e7ca153.svg";const Z={class:"grid items-center justify-between grid-cols-12"},ee={class:"relative border-1 border-x-gray-300 py-2 mx-2 px-2 col-span-4"},te={class:"text-black rounded focus:outline-none"},oe=e("p",{class:"text-md text-gray-600 text-left"},"Your organization",-1),ne={key:0,class:"flex justify-between items-center gap-2 py-0.5"},se=["src"],ae={key:0,class:"absolute z-20 w-11/12 bg-white rounded shadow-lg top-5 left-2 mt-14"},re={class:"transition transform cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"},ie=["onClick"],le={class:"cursor-pointer flex mx-2 align-center justify-between rounded-lg p-0.5"},ce={class:"mx-2 p-1 flex items-center justify-between rounded border gap-4",style:{height:"30px",width:"30px"}},ue=["src"],de={key:0,class:"text-sm whitespace-nowrap font-semibold px-2"},me={key:1,class:"text-sm whitespace-nowrap font-semibold px-2"},ge={key:0},fe=e("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-6 h-6 font-semibold text-green-600"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"})],-1),he=[fe],_e={class:"relative col-span-4"},ve={key:0,class:"absolute top-0 left-0 z-40 w-3/4 px-3 py-4 mt-16 overflow-x-scroll bg-white rounded shadow-lg"},pe=["onClick"],ye={class:"flex"},be={class:"text-sm font-bold text-gray-900"},we={class:"float-right text-xs font-bold text-gray-600"},xe={class:"text-xs text-gray-600"},ke={class:"flex justify-end col-span-4"},Ce=e("img",{src:J,alt:"",class:"w-6 h-6"},null,-1),Se=[Ce],Le=e("a",{href:"config-master",class:"block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"}," Master config",-1),$e=e("a",{href:"clientOnboarding",class:"block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"}," Client onboarding",-1),Me=e("a",{href:"document_preview",class:"block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"}," Document template",-1),Ne=e("a",{href:"documents_settings",class:"block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"}," Document settings",-1),je=e("a",{href:"attendance-leavesettings",class:"block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"}," Leave setting",-1),ze=e("a",{href:"attendance_settings",class:"block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"}," Attendance setting",-1),Ae=e("a",{href:"investment_settings",class:"block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"}," Investment setting",-1),Te=e("a",{href:"showMobileSettingsPage",class:"p-2 block text-black rounded-lg cursor-pointer w-full hover:bg-gray-100 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"}," Mobile setting",-1),Be=e("a",{href:"showSAsettingsView",class:"block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"}," Loan and salary advance setting ",-1),De=[Le,$e,Me,Ne,je,ze,Ae,Te,Be],Ve=e("img",{src:D,alt:"",class:"w-6 h-6"},null,-1),Ee=[Ve],Pe={class:"p-2 transition duration-700 ease-in-out transform bg-gray-100 rounded-full hover:bg-gray-200 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"},Re=e("img",{src:W,alt:"",class:"w-6 h-6"},null,-1),Fe=[Re],Oe={class:"flex px-3 py-2 text-white transition duration-700 ease-in-out transform focus:outline-none hover:bg-gray-200 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"},qe={class:"rounded-lg bg-blue-50 text-black font-semibold p-1.5 text-sm"},Ie={key:0,class:"px-2 mx-2 my-auto text-sm font-semibold text-black whitespace-nowrap"},Ue={key:1,class:"font-semibold text-[12px] mx-2 whitespace-nowrap font-['Poppins'] text-center text-black my-auto"},Ye={key:0,class:"absolute top-0 right-0 z-30 w-48 bg-white rounded shadow-lg mt-14"},Ke=e("a",{class:"block w-full p-2 transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none",href:"pages-profile-new "},"View profile",-1),Qe=e("p",{class:"absolute left-0 mx-4 font-semibold fs-5"},[e("img",{src:D,alt:"",class:"w-6 h-6 animate-pulse"}),v(" Notification ")],-1),Xe={class:"flex justify-between"},Ge={class:"font-semibold orange-median fs-6"},He=["onClick"],Je=e("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-4 h-4"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M6 18L18 6M6 6l12 12"})],-1),We=[Je],Ze={class:"text-sm"},et={key:1,class:"w-full p-2 px-2 my-2 rounded-lg bg-red-50"},tt=e("p",null,"No notifications to display",-1),ot=[tt],nt={key:1,class:"relative z-50","aria-labelledby":"modal-title",role:"dialog","aria-modal":"true"},st=e("div",{class:"fixed inset-0 transition-opacity bg-gray-900 bg-opacity-75"},null,-1),at={class:"fixed inset-0 z-10 overflow-y-auto"},rt={class:"flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0"},it={class:"absolute z-50 p-8 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg shadow-2xl top-1/2 left-1/2"},lt=e("h2",{class:"text-lg font-bold"},"Are you sure you want to do that?",-1),ct=e("p",{class:"mt-2 text-sm text-gray-500"}," Do you really wish to log out? Any unsaved modifications will not be retained. ",-1),ut={class:"flex justify-center gap-2 mt-4"},vt={__name:"Topbar",setup(dt){const i=G(),l=H(),k=d(!1),p=d(""),C=d(),M=d(),N=d(!1),S=d(!1);d([{id:1,label:"Attendance",to:"attendance-timesheet"}]);const u=d(),V=()=>{f.get("/clients-fetchAll").then(s=>{M.value=s.data}).finally(()=>{})},j=()=>{f.get("session-sessionselectedclient").then(s=>{console.log(s.data),u.value=s.data})},E=s=>{i.canShowLoading=!0;let n="/session-update-globalClient";console.log({client_id:s}),f.post(n,{client_id:s}).finally(()=>{j(),z()}).finally(()=>{i.canShowLoading=!1})};function P(s,n){return n.filter(g=>g.emp_name.toLowerCase().includes(s.toLowerCase())||g.emp_code.toLowerCase().includes(s.toLowerCase()))}d();const z=()=>{f.get("/vmt-activeemployees-fetchall").then(s=>{C.value=s.data})},y=d(),A=()=>{f.get("/getNotifications").then(s=>{y.value=s.data.data})},R=s=>{f.post("/readNotification",{record_id:s}).finally(()=>{A()})};I(()=>{z(),V(),j(),setTimeout(()=>{N.value=!0},2e3),A()});async function F(){try{const s=document.head.querySelector('meta[name="csrf-token"]').content;await f.post("/logout",null,{headers:{"X-CSRF-TOKEN":s}}).finally(()=>{window.location.reload()})}catch(s){console.error("Logout error:",s)}}async function O(s){console.log(s),window.location.href="/pages-profile-new?uid="+s}const T=["bg-orange-50","bg-emerald-50","bg-yellow-50","bg-rose-50","bg-cyan-50","bg-amber-50","bg-red-50","bg-blue-50","bg-pink-50","bg-green-50","bg-fuchsia-50"],q=s=>(console.log(s),T[s%T.length]);return(s,n)=>{const B=K("Sidebar"),g=Q("tooltip");return a(),r(b,null,[N.value?(a(),r("div",{key:0,class:"bg-white h-[60px]",onMouseleave:n[11]||(n[11]=t=>(o(i).canShowConfiguration=!1,o(i).canShowClients=!1))},[e("div",Z,[e("div",ee,[e("button",te,[oe,u.value?(a(),r("div",ne,[e("img",{src:u.value.client_logo,alt:"",class:"h-6 w-12"},null,8,se),u.value.client_fullname.length<=13?(a(),r("p",{key:0,class:"text-sm whitespace-nowrap font-semibold px-2",onClick:n[0]||(n[0]=t=>o(i).canShowClients=!o(i).canShowClients)},c(u.value.client_fullname),1)):h((a(),r("p",{key:1,class:"font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto",onClick:n[1]||(n[1]=t=>o(i).canShowClients=!o(i).canShowClients)},[v(c(u.value.client_fullname?u.value.client_fullname.substring(0,13)+"..":""),1)])),[[g,u.value.client_fullname]])])):m("",!0)]),o(l).current_user_role==1||o(l).current_user_role==2||o(l).current_user_role==3||o(l).current_user_role==4?(a(),U(w,{key:0,"enter-active-class":"transition duration-200 ease-out transform","enter-class":"opacity-0 translate-y-2","enter-to-class":"opacity-100 translate-y-0","leave-active-class":"transition ease-in duration-100 transform","leave-class":"opacity-100 translate-y-0","leave-to-class":"opacity-0 translate-y-2",onMouseleave:n[2]||(n[2]=t=>o(i).canShowClients=!1)},{default:_(()=>[o(i).canShowClients?(a(),r("div",ae,[(a(!0),r(b,null,$(M.value,t=>(a(),r("div",re,[e("div",{class:"flex items-center justify-between p-2 hover:bg-gray-200",onClick:L=>(E(t.id),o(i).canShowClients=!1)},[e("div",le,[e("div",ce,[e("img",{src:t.client_logo,alt:"",class:"mh-100 mw-100"},null,8,ue),t.client_fullname.length<=40?(a(),r("p",de,c(t.client_fullname)+" "+c(t.abs_client_code),1)):h((a(),r("p",me,[v(c(t.client_fullname?t.client_fullname.substring(0,40)+"..":""),1)])),[[g,t.client_fullname]])])]),u.value&&u.value.id==t.id?(a(),r("div",ge,he)):m("",!0)],8,ie)]))),256))])):m("",!0)]),_:1})):m("",!0)]),e("div",_e,[h(e("input",{type:"text",name:"",id:"",class:"border p-1.5 bg-gray-100 border-gray-300 rounded-lg w-full","onUpdate:modelValue":n[3]||(n[3]=t=>p.value=t),placeholder:"Search...."},null,512),[[Y,p.value]]),x(w,{"enter-active-class":"transition duration-200 ease-out transform","enter-class":"translate-y-2 opacity-0","enter-to-class":"translate-y-0 opacity-100","leave-active-class":"transition duration-100 ease-in transform","leave-class":"translate-y-0 opacity-100","leave-to-class":"translate-y-2 opacity-0"},{default:_(()=>[p.value?(a(),r("div",ve,[(a(!0),r(b,null,$(P(p.value,C.value?C.value:[]),t=>(a(),r("div",{class:"w-full p-2 transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none",onClick:L=>O(t.enc_user_id)},[e("div",ye,[e("p",be,[v(c(t.emp_name)+" ",1),e("span",we,c(t.emp_code),1)])]),e("div",null,[e("p",xe,c(t.emp_designation),1)])],8,pe))),256))])):m("",!0)]),_:1})]),e("div",ke,[o(l).current_user_role==2||o(l).current_user_role==4?h((a(),r("button",{key:0,class:"p-2 mx-2 transition duration-700 ease-in-out transform bg-gray-100 rounded-full hover:bg-gray-200 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none",onClick:n[4]||(n[4]=t=>o(i).canShowConfiguration=!o(i).canShowConfiguration)},Se)),[[g,"Settings"]]):m("",!0),x(w,{"enter-active-class":"transition ease-out duration-200 transform","enter-class":"opacity-0 translate-y-2","enter-to-class":"opacity-100 translate-y-0","leave-active-class":"transition ease-in duration-100 transform","leave-class":"opacity-100 translate-y-0","leave-to-class":"opacity-0 translate-y-2",onMouseleave:n[7]||(n[7]=t=>o(i).canShowConfiguration=!1)},{default:_(()=>[o(i).canShowConfiguration?(a(),r("div",{key:0,onClick:n[5]||(n[5]=t=>o(i).canShowConfiguration=!o(i).canShowConfiguration),class:"absolute top-0 z-40 p-2 mt-16 bg-white rounded shadow-lg right-40 w-60",onMouseleave:n[6]||(n[6]=t=>o(i).canShowConfiguration=!1)},De,32)):m("",!0)]),_:1}),h((a(),r("button",{class:"p-2 mx-2 transition duration-700 ease-in-out transform bg-gray-100 rounded-full animate-pulse hover:bg-gray-200 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none",onClick:n[8]||(n[8]=t=>k.value=!0)},Ee)),[[g,"Notification"]]),h((a(),r("button",Pe,Fe)),[[g,"Exit"]]),e("div",{class:"relative mx-3",onClick:n[10]||(n[10]=t=>o(i).canShowCurrentEmployee=!o(i).canShowCurrentEmployee)},[e("button",Oe,[e("p",qe,c(o(l).current_user_name?o(l).current_user_name.substring(0,2):""),1),o(l).current_user_name&&o(l).current_user_name.length<=10?(a(),r("p",Ie,c(o(l).current_user_name?o(l).current_user_name:""),1)):(a(),r("p",Ue,c(o(l).current_user_name?o(l).current_user_name.substring(0,10)+"..":""),1))]),x(w,{"enter-active-class":"transition duration-200 ease-out transform","enter-class":"translate-y-2 opacity-0","enter-to-class":"translate-y-0 opacity-100","leave-active-class":"transition duration-100 ease-in transform","leave-class":"translate-y-0 opacity-100","leave-to-class":"translate-y-2 opacity-0"},{default:_(()=>[o(i).canShowCurrentEmployee?(a(),r("div",Ye,[Ke,e("a",{onClick:n[9]||(n[9]=t=>S.value=!0),class:"block w-full p-2 transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"},"Log out")])):m("",!0)]),_:1})])])])],32)):m("",!0),x(B,{visible:k.value,"onUpdate:visible":n[12]||(n[12]=t=>k.value=t),position:"right",class:"w-full"},{header:_(()=>[Qe]),default:_(()=>[y.value&&y.value.length>0?(a(!0),r(b,{key:0},$(y.value,(t,L)=>(a(),r("div",{class:X(["w-full p-2 px-2 my-2 rounded-lg",`${q(L)}`])},[e("div",Xe,[e("div",null,[e("p",Ge,c(t.notification_title),1)]),e("div",null,[e("button",{onClick:mt=>R(t.id)},We,8,He)])]),e("p",Ze,c(t.notification_body),1)],2))),256)):(a(),r("div",et,ot))]),_:1},8,["visible"]),S.value?(a(),r("div",nt,[st,e("div",at,[e("div",rt,[v("ba "),e("div",it,[lt,ct,e("div",ut,[e("button",{onClick:F,type:"button",class:"px-4 py-2 text-sm font-medium text-green-600 rounded bg-green-50"}," Yes, I'm sure "),e("button",{onClick:n[13]||(n[13]=t=>S.value=!1),type:"button",class:"px-4 py-2 text-sm font-medium text-gray-600 rounded bg-gray-50"}," No, go back ")])])])])])):m("",!0)],64)}}};export{vt as _};
