/* empty css              *//* empty css                     *//* empty css                   *//* empty css                 */import{o as a,c as o,am as u,H as b,I as y,g as R,d as e,F as g,f as A,b as p,w as C,t as x,a as c,l as L,J as n,h as v,K as N,P as D,R as T,u as O,x as E,L as B,N as F,S as M,M as V,Q as j}from"./inputnumber.esm-2ef94937.js";import{d as z,c as H}from"./pinia-0d96afee.js";import{u as w,a as P,c as J,b as I}from"./vue-router-42dcdff2.js";import{_ as r}from"./_plugin-vue_export-helper-c27b6911.js";import{a as W}from"./index-362795f3.js";import{a as U,T as q,B as G,S as K,b as Q,s as Y}from"./toastservice.esm-a2aa885f.js";import"./blockui.esm-1772f2aa.js";import{a as X}from"./datatable.esm-9e333783.js";import{D as Z,s as ee}from"./dialogservice.esm-4374de6d.js";import{C as se}from"./confirmationservice.esm-d19112e7.js";import{s as te}from"./progressspinner.esm-311b8ec7.js";import{s as ae}from"./row.esm-6ebc942e.js";import{s as ie}from"./calendar.esm-11c715d3.js";import{s as oe}from"./textarea.esm-e60302eb.js";import{s as le}from"./chips.esm-16e7fe1e.js";import{s as ne}from"./multiselect.esm-c2c2c2c7.js";import{s as re}from"./inputmask.esm-f2a71430.js";import{s as ce}from"./overlaypanel.esm-b1faaa2c.js";import{s as de}from"./tag.esm-6b8c150f.js";const pe={},me={class:"card border-2 border-gray-100"},ve=u('<div class="card-body flex justify-items-start"><div><i class="pi pi-arrow-left py-auto" style="font-size:1rem;"></i></div><div class="flex mx-6"><div class="rounded-full p-2 bg-green-700 text-white font-semibold fs-6">APR</div><p style="font-size:1rem;" class="font-semibold">....</p></div><div><i class="pi pi-arrow-right" style="font-size:1rem;"></i></div></div>',1),ue=[ve];function _e(i,t){return a(),o("div",me,ue)}const be=r(pe,[["render",_e]]),he="/build/assets/calendar-11742259.svg",$=z("payrunMainStore",()=>{const i=b(0),t=b();return{currentActiveScreen:i,leaveSource:t,getLeaveDetails:async()=>{let l="/fetch-leaverequests-based-on-currentrole";await W.get(l).then(m=>{t.value=m.data.data})}}}),fe={class:"w-full card"},ye={class:"card-body"},ge={id:"topBar",class:"flex justify-between"},$e=u('<section class="flex"><strong class="">Run Payroll</strong><div class="mx-4">Finalized</div><div class=""><p class="">last Updated</p></div></section>',1),xe={class:"flex"},we=e("i",{class:"pi pi-chevron-down",style:{"font-size":"1rem"}},null,-1),Pe=[we],Se={id:"Body",class:"my-4"},ke={key:0,class:"grid gap-4 md:grid-cols-2 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-2 lg:grid-cols-2 transition duration-150 ease-in-out",style:{display:"grid"}},Re=e("img",{src:he,alt:"",class:"rounded-full h-8"},null,-1),Ae={class:"fs-6 font-semibold text-center whitespace-nowrap"},Ce=u('<div id="footer" class="text-end float-right"><div class="text-end flex"><button class="btn btn-outline-primary">Preview Run Payroll</button><button class="btn btn-outline-primary mx-4">Review All Employees</button><button class="btn btn-primary">Finalize Payroll</button></div></div>',1),Le={__name:"runPayroll",setup(i){const t=b(!0),d=$();y(()=>{d.getLeaveDetails()});const l=b([{id:1,shorName:"leave",icons:"calendar.svg",name:"Leave, Attendance & Daily Wages"},{shorName:"attendance",icons:"person.svg",name:"New Joinee & Exits"},{shorName:"Salary-Revisions",icons:"breifcase.svg",name:"Bonus, Salary Revisions & Overtime"},{shorName:"Reimbursement",icons:"pi pi-calendar-times",name:"Reimbursement, Adhoc Payment, Deduction"},{shorName:"Salaries-Hold",icons:"pi pi-calendar-times",name:"Salaries on Hold & Arrears"},{shorName:"Override",icons:"pi pi-calendar-times",name:"Override (PT, ESI, TDS, LWF)"}]);return(m,_)=>{const h=R("router-link");return a(),o("div",fe,[e("div",ye,[e("section",ge,[$e,e("section",xe,[e("button",{onClick:_[0]||(_[0]=f=>t.value=!t.value)},Pe)])]),e("div",Se,[t.value?(a(),o("div",ke,[(a(!0),o(g,null,A(l.value,(f,k)=>(a(),p(h,{class:"p-3 my-2 rounded-lg shadow-md dynamic-card-without-border flex transition ease-in-out delay-75 hover:-translate-y-1 hover:scale-110 duration-300",key:k,to:`/payrun/${f.shorName}`},{default:C(()=>[Re,e("p",Ae,x(f.name),1)]),_:2},1032,["to"]))),128))])):c("",!0)]),Ce])])}}},Ne={},De={class:"bg-white rounded-lg"},Te=u('<div class="w-full mx-auto bg-gray-200 p-2 grid grid-cols-3 gap-4 rounded-lg"><div><p class="text-gray-700 font-medium text-sm whitespace-nowrap">Total Employees</p><p class="font-semibold fs-6">74334</p></div><div><p class="text-gray-700 font-medium text-sm whitespace-nowrap">Calendar Days</p><p class="font-semibold fs-6">74334</p></div><div><p class="text-gray-700 font-medium text-sm whitespace-nowrap">Payroll Processed</p><p class="font-semibold fs-6">74334</p></div></div><div class="px-3"><div class="my-2"><div class="grid grid-cols-12"><div class="col-span-6"><p class="text-gray-400 font-semibold text-[12px]">Total Payroll Cost</p><p class="font-semibold text-xs">Jun <span class="font-semibold text-xs text-red-400">^234</span></p></div><div class="col-span-2"> = </div><div class="col-span-4"><p class="font-semibold fs-6 text-right">74334</p></div></div></div></div>',2),Oe=[Te];function Ee(i,t){return a(),o("div",De,Oe)}const Be=r(Ne,[["render",Ee]]),Fe={},Me={class:"card"},Ve=u('<div class="card-body"><div class="flex justify-between"><div><p>Payroll Outcome</p></div><div class="flex justify-end gap-4 text-blue-500 text-sm"><p class="whitespace-nowrap">View Pay Register</p><p class="whitespace-nowrap">Manage PaySlip</p><p>v</p></div></div></div>',1),je=[Ve];function ze(i,t){return a(),o("div",Me,je)}const He=r(Fe,[["render",ze]]),Je={},Ie={class:"card"},We=e("div",{class:"card-body"}," Activity ",-1),Ue=[We];function qe(i,t){return a(),o("div",Ie,Ue)}const Ge=r(Je,[["render",qe]]),Ke=e("div",{class:"investments-wrapper"},[e("div",{class:""},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"divide-x nav nav-pills divide-solid nav-tabs-dashed flex gap-4",id:"pills-tab",role:"tablist"},[e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link active ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Leave",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Rejected")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Attendance",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Pending")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#LOP",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Approved")])])])]),e("div",{class:"tab-content my-3",id:"pills-tabContent"},[e("div",{class:"tab-pane fade active show",id:"Leave",role:"tabpanel","aria-labelledby":"pills-home-tab"}),e("div",{class:"tab-pane fade",id:"Attendance",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"LOP",role:"tabpanel"})])],-1),Qe={__name:"leaveApplied",setup(i){const t=$(),d=(l,m)=>l?l.filter(h=>h.status==m):[];return(l,m)=>(a(),o(g,null,[Ke,L(" "+x(n(t).leaveSource?d(n(t).leaveSource,"Approved"):[]),1)],64))}},Ye={class:"w-full p-1"},Xe=e("div",{class:""},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"divide-x nav nav-pills divide-solid nav-tabs-dashed flex gap-4",id:"pills-tab",role:"tablist"},[e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link active ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Leave",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Leave Applied")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Attendance",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Attendance")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#LOP",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," LOP Summary")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Revoke ",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Revoke LOP ")])])])],-1),Ze=e("p",{class:"py-2 rounded-lg flex w-10/12 justify-start font-semibold fs-6"},"All leave (approved or pending) that falls under this payroll cycle month will be displayed here.",-1),es={class:"tab-content",id:"pills-tabContent"},ss={class:"tab-pane fade active show",id:"Leave",role:"tabpanel","aria-labelledby":"pills-home-tab"},ts=e("div",{class:"tab-pane fade",id:"Attendance",role:"tabpanel"},null,-1),as=e("div",{class:"tab-pane fade",id:"LOP",role:"tabpanel"},null,-1),is=e("div",{class:"tab-pane fade",id:"Revoke",role:"tabpanel"},null,-1),os={__name:"leaveAttendanceDailyWages",setup(i){w();const t=P();return y(()=>{console.log(t.params.module)}),(d,l)=>(a(),o("div",Ye,[Xe,Ze,e("div",es,[e("div",ss,[v(Qe)]),ts,as,is])]))}},ls={},ns={class:"investments-wrapper"},rs=e("div",{class:"mb-2 shadow card left-line p-1"},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"divide-x nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},[e("li",{class:"mx-4 nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link active ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#New",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," 1.New Joinees")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"mx-4 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Exit",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," 2.Employee in Exit Process")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"mx-4 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Settlement",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," 3.Full & Final Settlement")])])])],-1),cs=e("div",{class:"p-2 rounded-lg card my-2"},[e("p",null,"All leave (approved or pending) that falls under this payroll cycle month will be displayed here.")],-1),ds=e("div",{class:"mb-0 card"},[e("div",{class:"card-body"},[e("div",{class:"tab-content",id:"pills-tabContent"},[e("div",{class:"tab-pane fade active show",id:"New",role:"tabpanel","aria-labelledby":"pills-home-tab"}),e("div",{class:"tab-pane fade",id:"Exit",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"Settlement",role:"tabpanel"})])])],-1),ps=[rs,cs,ds];function ms(i,t){return a(),o("div",ns,ps)}const vs=r(ls,[["render",ms]]),us={};function _s(i,t){return null}const bs=r(us,[["render",_s]]),hs={};function fs(i,t){return null}const ys=r(hs,[["render",fs]]),gs={};function $s(i,t){return null}const xs=r(gs,[["render",$s]]),ws={};function Ps(i,t){return null}const Ss=r(ws,[["render",Ps]]);const ks={key:0,class:"w-full"},Rs={class:""},As=e("div",{class:"my-4"},[e("p",{class:"font-sans font-semibold fs-5"},"JUN 2023")],-1),Cs={class:"grid grid-cols-3 gap-4"},Ls={class:"col-span-2 ..."},Ns={class:"..."},Ds={class:"grid grid-cols-3 gap-4 my-3"},Ts={class:"col-span-2 ..."},Os={class:"..."},S={__name:"payRun",setup(i){w();const t=P(),d=$();return y(()=>{d.getLeaveDetails()}),(l,m)=>(a(),o(g,null,[n(t).params.module=="null"?(a(),o("div",ks,[e("div",Rs,[v(be)]),As,e("div",Cs,[e("div",Ls,[v(Le)]),e("div",Ns,[v(Be)])]),e("div",Ds,[e("div",Ts,[v(He)]),e("div",Os,[v(Ge)])])])):c("",!0),n(t).params.module=="leave"?(a(),p(os,{key:1})):c("",!0),n(t).params.module=="attendance"?(a(),p(vs,{key:2})):c("",!0),n(t).params.module=="Salary-Revisions"?(a(),p(bs,{key:3})):c("",!0),n(t).params.module=="Reimbursement"?(a(),p(ys,{key:4})):c("",!0),n(t).params.module=="Salaries-Hold"?(a(),p(xs,{key:5})):c("",!0),n(t).params.module=="Override"?(a(),p(Ss,{key:6})):c("",!0)],64))}},Es=J({history:I("/build/"),routes:[{path:"/payrun/:module",name:"home",component:S}]}),s=N(S),Bs=H();s.use(D,{ripple:!0});s.use(se);s.use(U);s.use(Z);s.use(Bs);s.use(Es);s.directive("tooltip",q);s.directive("badge",G);s.directive("ripple",T);s.directive("styleclass",K);s.directive("focustrap",O);s.component("Button",E);s.component("DataTable",X);s.component("Column",B);s.component("ColumnGroup",ee);s.component("Row",ae);s.component("Toast",Q);s.component("ConfirmDialog",Y);s.component("Dropdown",F);s.component("InputText",M);s.component("Dialog",V);s.component("ProgressSpinner",te);s.component("Calendar",ie);s.component("Textarea",oe);s.component("Chips",le);s.component("MultiSelect",ne);s.component("InputNumber",j);s.component("InputMask",re);s.component("OverlayPanel",ce);s.component("Tag",de);s.mount("#PayRun");