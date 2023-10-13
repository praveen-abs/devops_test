import{_ as o,e as a,f as l,B as _,q as k,r as u,o as f,c as S,g as e,F as y,m as R,k as c,l as A,t as x,j as r,i as L,h as n,u as w,a as $,n as v}from"./app-88f17232.js";import{a as N}from"./index-362795f3.js";const C={},O={class:"card border-2 border-gray-100"},E=_('<div class="card-body flex justify-items-start"><div><i class="pi pi-arrow-left py-auto" style="font-size:1rem;"></i></div><div class="flex mx-6"><div class="rounded-full p-2 bg-green-700 text-white font-semibold fs-6">APR</div><p style="font-size:1rem;" class="font-semibold">....</p></div><div><i class="pi pi-arrow-right" style="font-size:1rem;"></i></div></div>',1),D=[E];function B(t,s){return a(),l("div",O,D)}const F=o(C,[["render",B]]),j="/build/assets/calendar-11742259.svg",g=k("payrunMainStore",()=>{const t=u(0),s=u();return{currentActiveScreen:t,leaveSource:s,getLeaveDetails:async()=>{let i="/fetch-leaverequests-based-on-currentrole";await N.get(i).then(p=>{s.value=p.data.data})}}}),V={class:"w-full card"},z={class:"card-body"},J={id:"topBar",class:"flex justify-between"},M=_('<section class="flex"><strong class="">Run Payroll</strong><div class="mx-4">Finalized</div><div class=""><p class="">last Updated</p></div></section>',1),T={class:"flex"},H=e("i",{class:"pi pi-chevron-down",style:{"font-size":"1rem"}},null,-1),W=[H],q={id:"Body",class:"my-4"},U={key:0,class:"grid gap-4 md:grid-cols-2 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-2 lg:grid-cols-2 transition duration-150 ease-in-out",style:{display:"grid"}},I=e("img",{src:j,alt:"",class:"rounded-full h-8"},null,-1),Y={class:"fs-6 font-semibold text-center whitespace-nowrap"},G=_('<div id="footer" class="text-end float-right"><div class="text-end flex"><button class="btn btn-outline-primary">Preview Run Payroll</button><button class="btn btn-outline-primary mx-4">Review All Employees</button><button class="btn btn-primary">Finalize Payroll</button></div></div>',1),K={__name:"runPayroll",setup(t){const s=u(!0),d=g();f(()=>{d.getLeaveDetails()});const i=u([{id:1,shorName:"leave",icons:"calendar.svg",name:"Leave, Attendance & Daily Wages"},{shorName:"attendance",icons:"person.svg",name:"New Joinee & Exits"},{shorName:"Salary-Revisions",icons:"breifcase.svg",name:"Bonus, Salary Revisions & Overtime"},{shorName:"Reimbursement",icons:"pi pi-calendar-times",name:"Reimbursement, Adhoc Payment, Deduction"},{shorName:"Salaries-Hold",icons:"pi pi-calendar-times",name:"Salaries on Hold & Arrears"},{shorName:"Override",icons:"pi pi-calendar-times",name:"Override (PT, ESI, TDS, LWF)"}]);return(p,m)=>{const b=S("router-link");return a(),l("div",V,[e("div",z,[e("section",J,[M,e("section",T,[e("button",{onClick:m[0]||(m[0]=h=>s.value=!s.value)},W)])]),e("div",q,[s.value?(a(),l("div",U,[(a(!0),l(y,null,R(i.value,(h,P)=>(a(),c(b,{class:"p-3 my-2 rounded-lg shadow-md dynamic-card-without-border flex transition ease-in-out delay-75 hover:-translate-y-1 hover:scale-110 duration-300",key:P,to:`/payrun/${h.shorName}`},{default:A(()=>[I,e("p",Y,x(h.name),1)]),_:2},1032,["to"]))),128))])):r("",!0)]),G])])}}},Q={},X={class:"bg-white rounded-lg"},Z=_('<div class="w-full mx-auto bg-gray-200 p-2 grid grid-cols-3 gap-4 rounded-lg"><div><p class="text-gray-700 font-medium text-sm whitespace-nowrap">Total Employees</p><p class="font-semibold fs-6">74334</p></div><div><p class="text-gray-700 font-medium text-sm whitespace-nowrap">Calendar Days</p><p class="font-semibold fs-6">74334</p></div><div><p class="text-gray-700 font-medium text-sm whitespace-nowrap">Payroll Processed</p><p class="font-semibold fs-6">74334</p></div></div><div class="px-3"><div class="my-2"><div class="grid grid-cols-12"><div class="col-span-6"><p class="text-gray-400 font-semibold text-[12px]">Total Payroll Cost</p><p class="font-semibold text-xs">Jun <span class="font-semibold text-xs text-red-400">^234</span></p></div><div class="col-span-2"> = </div><div class="col-span-4"><p class="font-semibold fs-6 text-right">74334</p></div></div></div></div>',2),ee=[Z];function se(t,s){return a(),l("div",X,ee)}const ae=o(Q,[["render",se]]),te={},le={class:"card"},ie=_('<div class="card-body"><div class="flex justify-between"><div><p>Payroll Outcome</p></div><div class="flex justify-end gap-4 text-blue-500 text-sm"><p class="whitespace-nowrap">View Pay Register</p><p class="whitespace-nowrap">Manage PaySlip</p><p>v</p></div></div></div>',1),ne=[ie];function oe(t,s){return a(),l("div",le,ne)}const re=o(te,[["render",oe]]),de={},ce={class:"card"},pe=e("div",{class:"card-body"}," Activity ",-1),ve=[pe];function _e(t,s){return a(),l("div",ce,ve)}const me=o(de,[["render",_e]]),ue=e("div",{class:"investments-wrapper"},[e("div",{class:""},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"divide-x nav nav-pills divide-solid nav-tabs-dashed flex gap-4",id:"pills-tab",role:"tablist"},[e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link active ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Leave",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Rejected")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Attendance",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Pending")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#LOP",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Approved")])])])]),e("div",{class:"tab-content my-3",id:"pills-tabContent"},[e("div",{class:"tab-pane fade active show",id:"Leave",role:"tabpanel","aria-labelledby":"pills-home-tab"}),e("div",{class:"tab-pane fade",id:"Attendance",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"LOP",role:"tabpanel"})])],-1),be={__name:"leaveApplied",setup(t){const s=g(),d=(i,p)=>i?i.filter(b=>b.status==p):[];return(i,p)=>(a(),l(y,null,[ue,L(" "+x(n(s).leaveSource?d(n(s).leaveSource,"Approved"):[]),1)],64))}},he={class:"w-full p-1"},fe=e("div",{class:""},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"divide-x nav nav-pills divide-solid nav-tabs-dashed flex gap-4",id:"pills-tab",role:"tablist"},[e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link active ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Leave",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Leave Applied")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Attendance",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Attendance")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#LOP",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," LOP Summary")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Revoke ",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Revoke LOP ")])])])],-1),ye=e("p",{class:"py-2 rounded-lg flex w-10/12 justify-start font-semibold fs-6"},"All leave (approved or pending) that falls under this payroll cycle month will be displayed here.",-1),ge={class:"tab-content",id:"pills-tabContent"},xe={class:"tab-pane fade active show",id:"Leave",role:"tabpanel","aria-labelledby":"pills-home-tab"},we=e("div",{class:"tab-pane fade",id:"Attendance",role:"tabpanel"},null,-1),$e=e("div",{class:"tab-pane fade",id:"LOP",role:"tabpanel"},null,-1),Pe=e("div",{class:"tab-pane fade",id:"Revoke",role:"tabpanel"},null,-1),ke={__name:"leaveAttendanceDailyWages",setup(t){w();const s=$();return f(()=>{console.log(s.params.module)}),(d,i)=>(a(),l("div",he,[fe,ye,e("div",ge,[e("div",xe,[v(be)]),we,$e,Pe])]))}},Se={},Re={class:"investments-wrapper"},Ae=e("div",{class:"mb-2 shadow card left-line p-1"},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"divide-x nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},[e("li",{class:"mx-4 nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link active ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#New",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," 1.New Joinees")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"mx-4 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Exit",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," 2.Employee in Exit Process")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"mx-4 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Settlement",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," 3.Full & Final Settlement")])])])],-1),Le=e("div",{class:"p-2 rounded-lg card my-2"},[e("p",null,"All leave (approved or pending) that falls under this payroll cycle month will be displayed here.")],-1),Ne=e("div",{class:"mb-0 card"},[e("div",{class:"card-body"},[e("div",{class:"tab-content",id:"pills-tabContent"},[e("div",{class:"tab-pane fade active show",id:"New",role:"tabpanel","aria-labelledby":"pills-home-tab"}),e("div",{class:"tab-pane fade",id:"Exit",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"Settlement",role:"tabpanel"})])])],-1),Ce=[Ae,Le,Ne];function Oe(t,s){return a(),l("div",Re,Ce)}const Ee=o(Se,[["render",Oe]]),De={};function Be(t,s){return null}const Fe=o(De,[["render",Be]]),je={};function Ve(t,s){return null}const ze=o(je,[["render",Ve]]),Je={};function Me(t,s){return null}const Te=o(Je,[["render",Me]]),He={};function We(t,s){return null}const qe=o(He,[["render",We]]);const Ue={key:0,class:"w-full"},Ie={class:""},Ye=e("div",{class:"my-4"},[e("p",{class:"font-sans font-semibold fs-5"},"JUN 2023")],-1),Ge={class:"grid grid-cols-3 gap-4"},Ke={class:"col-span-2 ..."},Qe={class:"..."},Xe={class:"grid grid-cols-3 gap-4 my-3"},Ze={class:"col-span-2 ..."},es={class:"..."},ts={__name:"payRun",setup(t){w();const s=$(),d=g();return f(()=>{d.getLeaveDetails()}),(i,p)=>(a(),l(y,null,[n(s).params.module=="null"?(a(),l("div",Ue,[e("div",Ie,[v(F)]),Ye,e("div",Ge,[e("div",Ke,[v(K)]),e("div",Qe,[v(ae)])]),e("div",Xe,[e("div",Ze,[v(re)]),e("div",es,[v(me)])])])):r("",!0),n(s).params.module=="leave"?(a(),c(ke,{key:1})):r("",!0),n(s).params.module=="attendance"?(a(),c(Ee,{key:2})):r("",!0),n(s).params.module=="Salary-Revisions"?(a(),c(Fe,{key:3})):r("",!0),n(s).params.module=="Reimbursement"?(a(),c(ze,{key:4})):r("",!0),n(s).params.module=="Salaries-Hold"?(a(),c(Te,{key:5})):r("",!0),n(s).params.module=="Override"?(a(),c(qe,{key:6})):r("",!0)],64))}};export{ts as default};
