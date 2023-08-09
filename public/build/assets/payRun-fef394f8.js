import{o as a,c as i,aq as p,Q as u,g as S,d as e,F as h,f as k,b as c,w as R,t as v,a as l,af as A,ae as r,h as d,G as C,P as D,H as N,R as E,u as L,v as O,L as T,I as B,K as F,A as M,J as V}from"./toastservice.esm-c06f2f8b.js";/* empty css                 */import{d as z,c as H}from"./pinia-c421e60d.js";import{u as y,a as g,c as I,b as J}from"./vue-router-64c1da5d.js";import{_ as n}from"./_plugin-vue_export-helper-c27b6911.js";import{T as W,B as j,S as G,b as U,a as Y,c as q}from"./styleclass.esm-f13b5ad8.js";import"./blockui.esm-b5c5eeb1.js";import{D as K}from"./dialogservice.esm-66159036.js";import{C as Q}from"./confirmationservice.esm-5e8ac686.js";import{s as X}from"./progressspinner.esm-7742d82c.js";import{s as Z}from"./row.esm-6ebc942e.js";import{s as ee}from"./columngroup.esm-9dd1458e.js";import{s as se}from"./calendar.esm-b2adcb28.js";import{s as te}from"./textarea.esm-0239076c.js";import{s as ae}from"./chips.esm-15cd260c.js";import{s as oe}from"./multiselect.esm-bf807607.js";import{s as ie}from"./inputmask.esm-5cdab85d.js";import{s as ne}from"./overlaypanel.esm-97295f76.js";import{s as le}from"./tag.esm-b5d266a8.js";const re={},ce={class:"card border-2 border-gray-100"},de=p('<div class="card-body flex justify-items-start"><div><i class="pi pi-arrow-left py-auto" style="font-size:1rem;"></i></div><div class="flex mx-6"><div class="rounded-full p-2 bg-green-700 text-white font-semibold fs-6">APR</div><p style="font-size:1rem;" class="font-semibold">....</p></div><div><i class="pi pi-arrow-right" style="font-size:1rem;"></i></div></div>',1),pe=[de];function me(o,t){return a(),i("div",ce,pe)}const _e=n(re,[["render",me]]),ue="/build/assets/calendar-11742259.svg",$=z("payrunMainStore",()=>({currentActiveScreen:u(0)})),ve={class:"w-full card"},be={class:"card-body"},fe={id:"topBar",class:"flex justify-between"},he=p('<section class="flex"><strong class="">Run Payroll</strong><div class="mx-4">Finalized</div><div class=""><p class=""> last Updated</p></div></section>',1),ye={class:"flex"},ge=e("div",null,".",-1),$e=e("i",{class:"pi pi-chevron-down",style:{"font-size":"1rem"}},null,-1),xe=[$e],we={id:"Body",class:"my-4"},Pe={key:0,class:"grid gap-4 md:grid-cols-2 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-2 lg:grid-cols-2",style:{display:"grid"}},Se=e("img",{src:ue,alt:"",class:"rounded-full h-8"},null,-1),ke={class:"fs-6 font-semibold text-center"},Re=p('<div id="footer" class="text-end float-right"><div class="text-end flex"><button class="btn btn-outline-primary">Preview Run Payroll</button><button class="btn btn-outline-primary mx-4">Review All Employees</button><button class="btn btn-primary">Finalize Payroll</button></div></div>',1),Ae={__name:"runPayroll",setup(o){const t=u(!0);$();const m=u([{id:1,shorName:"leave",icons:"calendar.svg",name:"Leave, Attendance & Daily Wages"},{shorName:"attendance",icons:"person.svg",name:"New Joinee & Exits"},{shorName:"Salary-Revisions",icons:"breifcase.svg",name:"Bonus, Salary Revisions & Overtime"},{shorName:"Reimbursement",icons:"pi pi-calendar-times",name:"Reimbursement, Adhoc Payment, Deduction"},{shorName:"Salaries-Hold",icons:"pi pi-calendar-times",name:"Salaries on Hold & Arrears"},{shorName:"Override",icons:"pi pi-calendar-times",name:"Override (PT, ESI, TDS, LWF)"}]);return(b,f)=>{const w=S("router-link");return a(),i("div",ve,[e("div",be,[e("section",fe,[he,e("section",ye,[ge,e("button",{onClick:f[0]||(f[0]=_=>t.value=!t.value)},xe)])]),e("div",we,[t.value?(a(),i("div",Pe,[(a(!0),i(h,null,k(m.value,(_,P)=>(a(),c(w,{class:"p-3 my-2 rounded-lg shadow-md dynamic-card-without-border flex hover:bg-slate-100",key:P,to:`/payrun/${_.shorName}`},{default:R(()=>[Se,e("p",ke,v(_.name),1)]),_:2},1032,["to"]))),128))])):l("",!0)]),Re])])}}},Ce={},De={class:"card"},Ne=e("div",{class:"card-body"}," Calculated Payroll Data ",-1),Ee=[Ne];function Le(o,t){return a(),i("div",De,Ee)}const Oe=n(Ce,[["render",Le]]),Te={},Be={class:"card"},Fe=e("div",{class:"card-body"},[e("div",{class:"flex"},[e("div",null,[e("p",null,"Payroll Outcome")]),e("div",{class:"flex"},[e("p",null,"View Pay Register"),e("p",null,"Manage PaySlip")])])],-1),Me=[Fe];function Ve(o,t){return a(),i("div",Be,Me)}const ze=n(Te,[["render",Ve]]),He={},Ie={class:"card"},Je=e("div",{class:"card-body"}," Activity ",-1),We=[Je];function je(o,t){return a(),i("div",Ie,We)}const Ge=n(He,[["render",je]]),Ue={class:"investments-wrapper"},Ye=e("div",{class:"mb-2 shadow card left-line p-1"},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"divide-x nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},[e("li",{class:"mx-4 nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link active ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Leave",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," 1.Leave Applied")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"mx-4 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Attendance",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," 2.Attendance")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"mx-4 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#LOP",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," 3.LOP Summary")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"mx-4 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Revoke ",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," 4.Revoke LOP ")])])])],-1),qe=e("div",{class:"p-2 rounded-lg card my-2"},[e("p",{class:"p-2 bg-orange-100 my-3 rounded-lg font-semibold fs-6"},"All leave (approved or pending) that falls under this payroll cycle month will be displayed here.")],-1),Ke=e("div",{class:"mb-0 card"},[e("div",{class:"card-body"},[e("div",{class:"tab-content",id:"pills-tabContent"},[e("div",{class:"tab-pane fade active show",id:"Leave",role:"tabpanel","aria-labelledby":"pills-home-tab"}),e("div",{class:"tab-pane fade",id:"Attendance",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"LOP",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"Revoke",role:"tabpanel"})])])],-1),Qe=[Ye,qe,Ke],Xe={__name:"leaveAttendanceDailyWages",setup(o){y();const t=g();return A(()=>{console.log(t.params.module)}),(m,b)=>(a(),i("div",Ue,Qe))}},Ze={},es={class:"investments-wrapper"},ss=e("div",{class:"mb-2 shadow card left-line p-1"},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"divide-x nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},[e("li",{class:"mx-4 nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link active ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#New",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," 1.New Joinees")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"mx-4 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Exit",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," 2.Employee in Exit Process")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"mx-4 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Settlement",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," 3.Full & Final Settlement")])])])],-1),ts=e("div",{class:"p-2 rounded-lg card my-2"},[e("p",null,"All leave (approved or pending) that falls under this payroll cycle month will be displayed here.")],-1),as=e("div",{class:"mb-0 card"},[e("div",{class:"card-body"},[e("div",{class:"tab-content",id:"pills-tabContent"},[e("div",{class:"tab-pane fade active show",id:"New",role:"tabpanel","aria-labelledby":"pills-home-tab"}),e("div",{class:"tab-pane fade",id:"Exit",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"Settlement",role:"tabpanel"})])])],-1),os=[ss,ts,as];function is(o,t){return a(),i("div",es,os)}const ns=n(Ze,[["render",is]]),ls={};function rs(o,t){return null}const cs=n(ls,[["render",rs]]),ds={};function ps(o,t){return null}const ms=n(ds,[["render",ps]]),_s={};function us(o,t){return null}const vs=n(_s,[["render",us]]),bs={};function fs(o,t){return null}const hs=n(bs,[["render",fs]]),ys={},gs={class:"w-full p-3"},$s={class:"flex my-1"},xs={class:"font-bold fs-4"},ws=e("i",{class:"pi pi-times"},null,-1),Ps=e("p",{class:"font-semibold fs-6"}," Payment batches ",-1),Ss=p('<div class="card my-2"><div class="card-body"><div class="flex"><p class="font-semibold fs-5">Default batch for bank transfer</p><button class="btn btn-primary w-2">mark as paid</button><button class="mx-6">...</button></div><p class="text-gray-700 font-medium fs-6">Default batch for salary</p><div class="my-4"><p class="font-semibold fs-5 text-gray-700"> Employees </p><p class="my-3 font-bold fs-5">189</p></div></div></div><div><div></div><div></div></div>',2);function ks(o,t){return a(),i("div",gs,[e("div",null,[e("div",$s,[e("p",xs,"Employee Payables -"+v(new Date().toLocaleString("default",{month:"long"}))+" "+v(new Date().getFullYear()),1),ws]),Ps]),Ss])}const Rs=n(ys,[["render",ks]]);const As={key:0,class:"w-full"},Cs={class:""},Ds=e("div",{class:"my-4"},[e("p",{class:"font-sans font-semibold fs-5"},"JUN 2023")],-1),Ns={class:"grid grid-cols-3 gap-4"},Es={class:"col-span-2 ..."},Ls={class:"..."},Os={class:"grid grid-cols-3 gap-4 my-3"},Ts={class:"col-span-2 ..."},Bs={class:"..."},x={__name:"payRun",setup(o){y();const t=g();return $(),(m,b)=>(a(),i(h,null,[r(t).params.module?(a(),i("div",As,[e("div",Cs,[d(_e)]),Ds,e("div",Ns,[e("div",Es,[d(Ae)]),e("div",Ls,[d(Oe)])]),e("div",Os,[e("div",Ts,[d(ze)]),e("div",Bs,[d(Ge)])])])):l("",!0),r(t).params.module=="leave"?(a(),c(Xe,{key:1})):l("",!0),r(t).params.module=="attendance"?(a(),c(ns,{key:2})):l("",!0),r(t).params.module=="Salary-Revisions"?(a(),c(cs,{key:3})):l("",!0),r(t).params.module=="Reimbursement"?(a(),c(ms,{key:4})):l("",!0),r(t).params.module=="Salaries-Hold"?(a(),c(vs,{key:5})):l("",!0),r(t).params.module=="Override"?(a(),c(hs,{key:6})):l("",!0),d(Rs)],64))}},Fs=I({history:J("/build/"),routes:[{path:"/payrun/:module",name:"home",component:x}]}),s=C(x),Ms=H();s.use(D,{ripple:!0});s.use(Q);s.use(N);s.use(K);s.use(Ms);s.use(Fs);s.directive("tooltip",W);s.directive("badge",j);s.directive("ripple",E);s.directive("styleclass",G);s.directive("focustrap",L);s.component("Button",O);s.component("DataTable",U);s.component("Column",Y);s.component("ColumnGroup",ee);s.component("Row",Z);s.component("Toast",T);s.component("ConfirmDialog",B);s.component("Dropdown",F);s.component("InputText",M);s.component("Dialog",V);s.component("ProgressSpinner",X);s.component("Calendar",se);s.component("Textarea",te);s.component("Chips",ae);s.component("MultiSelect",oe);s.component("InputNumber",q);s.component("InputMask",ie);s.component("OverlayPanel",ne);s.component("Tag",le);s.mount("#PayRun");
