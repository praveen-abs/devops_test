/* empty css                  *//* empty css              */import{o as a,c as i,aq as p,$ as u,g as S,d as e,F as h,f as k,b as c,w as R,t as v,a as l,I as A,aj as r,h as d,J as N,P as C,K as D,u as E,L,R as O,S as F,x as T,y as B,M,Y as V,N as z,V as H,X as I,Q as J,W}from"./toastservice.esm-1e4d76cb.js";/* empty css                 */import{d as j,c as Y}from"./pinia-1a7bd30b.js";import{u as y,a as g,c as U,b as q}from"./vue-router-644516c1.js";import{_ as n}from"./_plugin-vue_export-helper-c27b6911.js";import"./blockui.esm-bdb9f2eb.js";import{a as G}from"./datatable.esm-9c853c0e.js";import{D as K,s as Q}from"./dialogservice.esm-26300ede.js";import{C as X}from"./confirmationservice.esm-1279fa60.js";import{s as Z}from"./progressspinner.esm-ef10595a.js";import{s as ee}from"./row.esm-6ebc942e.js";import{s as se}from"./calendar.esm-6d8a31db.js";import{s as te}from"./textarea.esm-eee751d2.js";import{s as ae}from"./chips.esm-720db77e.js";import{s as oe}from"./multiselect.esm-dfed7e35.js";import{s as ie}from"./inputmask.esm-facdd3b2.js";import{s as ne}from"./overlaypanel.esm-f164505a.js";import{s as le}from"./tag.esm-bb5426dd.js";const re={},ce={class:"card border-2 border-gray-100"},de=p('<div class="card-body flex justify-items-start"><div><i class="pi pi-arrow-left py-auto" style="font-size:1rem;"></i></div><div class="flex mx-6"><div class="rounded-full p-2 bg-green-700 text-white font-semibold fs-6">APR</div><p style="font-size:1rem;" class="font-semibold">....</p></div><div><i class="pi pi-arrow-right" style="font-size:1rem;"></i></div></div>',1),pe=[de];function me(o,t){return a(),i("div",ce,pe)}const _e=n(re,[["render",me]]),ue="/build/assets/calendar-11742259.svg",$=j("payrunMainStore",()=>({currentActiveScreen:u(0)})),ve={class:"w-full card"},be={class:"card-body"},fe={id:"topBar",class:"flex justify-between"},he=p('<section class="flex"><strong class="">Run Payroll</strong><div class="mx-4">Finalized</div><div class=""><p class=""> last Updated</p></div></section>',1),ye={class:"flex"},ge=e("div",null,".",-1),$e=e("i",{class:"pi pi-chevron-down",style:{"font-size":"1rem"}},null,-1),xe=[$e],we={id:"Body",class:"my-4"},Pe={key:0,class:"grid gap-4 md:grid-cols-2 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-2 lg:grid-cols-2",style:{display:"grid"}},Se=e("img",{src:ue,alt:"",class:"rounded-full h-8"},null,-1),ke={class:"fs-6 font-semibold text-center"},Re=p('<div id="footer" class="text-end float-right"><div class="text-end flex"><button class="btn btn-outline-primary">Preview Run Payroll</button><button class="btn btn-outline-primary mx-4">Review All Employees</button><button class="btn btn-primary">Finalize Payroll</button></div></div>',1),Ae={__name:"runPayroll",setup(o){const t=u(!0);$();const m=u([{id:1,shorName:"leave",icons:"calendar.svg",name:"Leave, Attendance & Daily Wages"},{shorName:"attendance",icons:"person.svg",name:"New Joinee & Exits"},{shorName:"Salary-Revisions",icons:"breifcase.svg",name:"Bonus, Salary Revisions & Overtime"},{shorName:"Reimbursement",icons:"pi pi-calendar-times",name:"Reimbursement, Adhoc Payment, Deduction"},{shorName:"Salaries-Hold",icons:"pi pi-calendar-times",name:"Salaries on Hold & Arrears"},{shorName:"Override",icons:"pi pi-calendar-times",name:"Override (PT, ESI, TDS, LWF)"}]);return(b,f)=>{const w=S("router-link");return a(),i("div",ve,[e("div",be,[e("section",fe,[he,e("section",ye,[ge,e("button",{onClick:f[0]||(f[0]=_=>t.value=!t.value)},xe)])]),e("div",we,[t.value?(a(),i("div",Pe,[(a(!0),i(h,null,k(m.value,(_,P)=>(a(),c(w,{class:"p-3 my-2 rounded-lg shadow-md dynamic-card-without-border flex hover:bg-slate-100",key:P,to:`/payrun/${_.shorName}`},{default:R(()=>[Se,e("p",ke,v(_.name),1)]),_:2},1032,["to"]))),128))])):l("",!0)]),Re])])}}},Ne={},Ce={class:"card"},De=e("div",{class:"card-body"}," Calculated Payroll Data ",-1),Ee=[De];function Le(o,t){return a(),i("div",Ce,Ee)}const Oe=n(Ne,[["render",Le]]),Fe={},Te={class:"card"},Be=e("div",{class:"card-body"},[e("div",{class:"flex"},[e("div",null,[e("p",null,"Payroll Outcome")]),e("div",{class:"flex"},[e("p",null,"View Pay Register"),e("p",null,"Manage PaySlip")])])],-1),Me=[Be];function Ve(o,t){return a(),i("div",Te,Me)}const ze=n(Fe,[["render",Ve]]),He={},Ie={class:"card"},Je=e("div",{class:"card-body"}," Activity ",-1),We=[Je];function je(o,t){return a(),i("div",Ie,We)}const Ye=n(He,[["render",je]]),Ue={class:"investments-wrapper"},qe=e("div",{class:"mb-2 shadow card left-line p-1"},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"divide-x nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},[e("li",{class:"mx-4 nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link active ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Leave",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," 1.Leave Applied")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"mx-4 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Attendance",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," 2.Attendance")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"mx-4 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#LOP",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," 3.LOP Summary")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"mx-4 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Revoke ",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," 4.Revoke LOP ")])])])],-1),Ge=e("div",{class:"p-2 rounded-lg card my-2"},[e("p",{class:"p-2 bg-orange-100 my-3 rounded-lg font-semibold fs-6"},"All leave (approved or pending) that falls under this payroll cycle month will be displayed here.")],-1),Ke=e("div",{class:"mb-0 card"},[e("div",{class:"card-body"},[e("div",{class:"tab-content",id:"pills-tabContent"},[e("div",{class:"tab-pane fade active show",id:"Leave",role:"tabpanel","aria-labelledby":"pills-home-tab"}),e("div",{class:"tab-pane fade",id:"Attendance",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"LOP",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"Revoke",role:"tabpanel"})])])],-1),Qe=[qe,Ge,Ke],Xe={__name:"leaveAttendanceDailyWages",setup(o){y();const t=g();return A(()=>{console.log(t.params.module)}),(m,b)=>(a(),i("div",Ue,Qe))}},Ze={},es={class:"investments-wrapper"},ss=e("div",{class:"mb-2 shadow card left-line p-1"},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"divide-x nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},[e("li",{class:"mx-4 nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link active ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#New",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," 1.New Joinees")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"mx-4 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Exit",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," 2.Employee in Exit Process")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"mx-4 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#Settlement",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," 3.Full & Final Settlement")])])])],-1),ts=e("div",{class:"p-2 rounded-lg card my-2"},[e("p",null,"All leave (approved or pending) that falls under this payroll cycle month will be displayed here.")],-1),as=e("div",{class:"mb-0 card"},[e("div",{class:"card-body"},[e("div",{class:"tab-content",id:"pills-tabContent"},[e("div",{class:"tab-pane fade active show",id:"New",role:"tabpanel","aria-labelledby":"pills-home-tab"}),e("div",{class:"tab-pane fade",id:"Exit",role:"tabpanel"}),e("div",{class:"tab-pane fade",id:"Settlement",role:"tabpanel"})])])],-1),os=[ss,ts,as];function is(o,t){return a(),i("div",es,os)}const ns=n(Ze,[["render",is]]),ls={};function rs(o,t){return null}const cs=n(ls,[["render",rs]]),ds={};function ps(o,t){return null}const ms=n(ds,[["render",ps]]),_s={};function us(o,t){return null}const vs=n(_s,[["render",us]]),bs={};function fs(o,t){return null}const hs=n(bs,[["render",fs]]),ys={},gs={class:"w-full p-3"},$s={class:"flex my-1"},xs={class:"font-bold fs-4"},ws=e("i",{class:"pi pi-times"},null,-1),Ps=e("p",{class:"font-semibold fs-6"}," Payment batches ",-1),Ss=p('<div class="card my-2"><div class="card-body"><div class="flex"><p class="font-semibold fs-5">Default batch for bank transfer</p><button class="btn btn-primary w-2">mark as paid</button><button class="mx-6">...</button></div><p class="text-gray-700 font-medium fs-6">Default batch for salary</p><div class="my-4"><p class="font-semibold fs-5 text-gray-700"> Employees </p><p class="my-3 font-bold fs-5">189</p></div></div></div><div><div></div><div></div></div>',2);function ks(o,t){return a(),i("div",gs,[e("div",null,[e("div",$s,[e("p",xs,"Employee Payables -"+v(new Date().toLocaleString("default",{month:"long"}))+" "+v(new Date().getFullYear()),1),ws]),Ps]),Ss])}const Rs=n(ys,[["render",ks]]);const As={key:0,class:"w-full"},Ns={class:""},Cs=e("div",{class:"my-4"},[e("p",{class:"font-sans font-semibold fs-5"},"JUN 2023")],-1),Ds={class:"grid grid-cols-3 gap-4"},Es={class:"col-span-2 ..."},Ls={class:"..."},Os={class:"grid grid-cols-3 gap-4 my-3"},Fs={class:"col-span-2 ..."},Ts={class:"..."},x={__name:"payRun",setup(o){y();const t=g();return $(),(m,b)=>(a(),i(h,null,[r(t).params.module?(a(),i("div",As,[e("div",Ns,[d(_e)]),Cs,e("div",Ds,[e("div",Es,[d(Ae)]),e("div",Ls,[d(Oe)])]),e("div",Os,[e("div",Fs,[d(ze)]),e("div",Ts,[d(Ye)])])])):l("",!0),r(t).params.module=="leave"?(a(),c(Xe,{key:1})):l("",!0),r(t).params.module=="attendance"?(a(),c(ns,{key:2})):l("",!0),r(t).params.module=="Salary-Revisions"?(a(),c(cs,{key:3})):l("",!0),r(t).params.module=="Reimbursement"?(a(),c(ms,{key:4})):l("",!0),r(t).params.module=="Salaries-Hold"?(a(),c(vs,{key:5})):l("",!0),r(t).params.module=="Override"?(a(),c(hs,{key:6})):l("",!0),d(Rs)],64))}},Bs=U({history:q("/build/"),routes:[{path:"/payrun/:module",name:"home",component:x}]}),s=N(x),Ms=Y();s.use(C,{ripple:!0});s.use(X);s.use(D);s.use(K);s.use(Ms);s.use(Bs);s.directive("tooltip",E);s.directive("badge",L);s.directive("ripple",O);s.directive("styleclass",F);s.directive("focustrap",T);s.component("Button",B);s.component("DataTable",G);s.component("Column",M);s.component("ColumnGroup",Q);s.component("Row",ee);s.component("Toast",V);s.component("ConfirmDialog",z);s.component("Dropdown",H);s.component("InputText",I);s.component("Dialog",J);s.component("ProgressSpinner",Z);s.component("Calendar",se);s.component("Textarea",te);s.component("Chips",ae);s.component("MultiSelect",oe);s.component("InputNumber",W);s.component("InputMask",ie);s.component("OverlayPanel",ne);s.component("Tag",le);s.mount("#PayRun");