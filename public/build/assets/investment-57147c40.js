import{g as r,o as c,c as m,e as o,h as e,w as t,k as i,a3 as b,I as u,ag as n,F as y,J as x,P as w,K as T,L as $,R as S,u as D,v as C,S as I,M as N,Q as P,A as k,N as A}from"./toastservice.esm-11027b59.js";/* empty css                 */import{c as M}from"./pinia-e6f84f32.js";import{T as F,B as R,S as B,b as E,a as L,c as J}from"./styleclass.esm-1e136147.js";import"./blockui.esm-6c99e7f1.js";import{D as K}from"./dialogservice.esm-7c585a4a.js";import{s as V}from"./progressspinner.esm-778e5342.js";import{s as z}from"./row.esm-6ebc942e.js";import{s as G}from"./columngroup.esm-9dd1458e.js";import{s as O}from"./calendar.esm-9d39d621.js";import{s as H}from"./textarea.esm-8229edd7.js";import{s as Q}from"./chips.esm-d6fb6707.js";import{s as U}from"./multiselect.esm-82a03c6f.js";import{s as W}from"./inputmask.esm-612fd04a.js";import{s as Y}from"./overlaypanel.esm-23eb529e.js";import{s as j}from"./tag.esm-fd29f5a7.js";import{d as q}from"./declaration-1bf260e7.js";import{i as X,_ as Z}from"./investments_and_exemption-437792e0.js";import{_ as ee}from"./_plugin-vue_export-helper-c27b6911.js";import{S as oe}from"./Service-04178871.js";import"./dayjs.min-2f06af28.js";import{p as ae}from"./ProfilePagesStore-c0a9df0f.js";import"./index-362795f3.js";import"./investmentFormulaStore-fcadbcf6.js";import"./index.esm-76deb84a.js";import"./moment-fbc5633a.js";const se={},te={class:"p-2"},ie=b('<div class="my-3"><p class="font-semibold fs-6">View complete breakup of payments, deductions and declarations. You can analyse how income tax is being calculated and what is the TDS every month.</p></div><div class="card"><div class="grid gap-4 my-1 md:grid-cols-6 xl:grid-cols-6 lg:grid-cols-6 card-body"><div class="p-2 text-left border-l-4 rounded-lg bg-sky-100 border-l-sky-400"><p class="my-2 font-semibold fs-6">Net Taxable Income</p><h6 class="text-lg font-bold">INR 4,82,246 </h6></div><div class="p-2 text-left bg-gray-100 border-l-4 rounded-lg tw-card border-l-gray-400"><p class="my-2 font-semibold fs-6">Gross Income Tax</p><h6 class="text-lg font-bold">INR 0</h6></div><div class="p-2 text-left bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="my-2 font-semibold fs-6">Total Surcharge &amp; Cess</p><h6 class="text-lg font-bold">INR 0</h6></div><div class="p-2 text-left border-l-4 rounded-lg bg-sky-100 border-l-sky-400"><p class="my-2 font-semibold fs-6">Net Income Tax payable</p><h6 class="text-lg font-bold">INR 4,82,246 </h6></div><div class="p-2 text-left bg-gray-100 border-l-4 rounded-lg tw-card border-l-gray-400"><p class="my-2 font-semibold fs-6">Tax Paid Till Now</p><h6 class="text-lg font-bold">INR 0</h6></div><div class="p-2 text-left bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="my-2 font-semibold fs-6">Remaining Tax To Be Paid</p><h6 class="text-lg font-bold">INR 0</h6></div></div></div>',2),le={class:"my-4 card"},re={class:"card-body"},de=o("div",{class:"flex"},[o("p",{class:"font-semibold fs-5"}," A. Gross Earnings from Employment "),o("div",null," Income from Previous Employer ")],-1),ne={class:""},ce={class:"table-responsive"},me=o("div",null,null,-1),pe={class:"my-4 card"},_e={class:"card-body"},fe=o("div",null,[o("p",{class:"font-semibold fs-5"},"B. Taxable Income From All Heads")],-1),ge={class:"my-4 table-responsive"},he={class:"table-responsive"},ve={class:"my-4 card"},be={class:"card-body"},ue=o("div",null,[o("p",{class:"font-semibold fs-5"},"C. Tax Calculations")],-1),ye={class:"my-4 table-responsive"},xe={class:"my-4 card"},we={class:"card-body"},Te=o("div",{class:"flex"},[o("p",{class:"font-semibold fs-5"}," Month- Month Tax Deduction Details "),o("div",null," Income from Previous Employer ")],-1),$e={class:"table-responsive"};function Se(p,d){const a=r("Column"),l=r("DataTable");return c(),m("div",te,[ie,o("div",le,[o("div",re,[de,o("div",ne,[o("div",ce,[e(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[e(a,{field:"particulars",header:"Salary Breakup",frozen:"",class:"font-bold"}),e(a,{field:"new_regime",header:"Apr 23"}),e(a,{field:"old_regime",header:"May 23"}),e(a,{field:"old_regime",header:"June 23 "}),e(a,{field:"old_regime",header:"July 23 "}),e(a,{field:"new_regime",header:"Aug 23"}),e(a,{field:"old_regime",header:"Sep 23"}),e(a,{field:"old_regime",header:"Oct 23 "}),e(a,{field:"old_regime",header:"Nov 23 "}),e(a,{field:"old_regime",header:"Dec 23 "}),e(a,{field:"old_regime",header:"Jan 23 "}),e(a,{field:"old_regime",header:"Feb 23 "}),e(a,{field:"old_regime",header:"Mar 23 "})]),_:1})])])])]),me,o("div",pe,[o("div",_e,[fe,o("div",ge,[e(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[e(a,{field:"new_regime",header:"Apr 23"}),e(a,{field:"old_regime",header:"May 23"})]),_:1})]),o("div",he,[e(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[e(a,{field:"particulars",header:"Excemptions",frozen:"",class:"font-bold"}),e(a,{field:"new_regime",header:"Sections"}),e(a,{field:"old_regime",header:"Allowance"}),e(a,{field:"old_regime",header:"Gross Amount"}),e(a,{field:"old_regime",header:"Deductible Amount"}),e(a,{field:"old_regime",header:"Total"})]),_:1})])])]),o("div",ve,[o("div",be,[ue,o("div",ye,[e(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[e(a,{field:"particulars",header:"Tax",frozen:"",class:"font-bold"}),e(a,{field:"new_regime",header:"Income Tax Slab"}),e(a,{field:"old_regime",header:"Tax Amount"})]),_:1})])])]),o("div",xe,[o("div",we,[Te,o("div",null,[o("div",$e,[e(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[e(a,{field:"particulars",header:"Month",frozen:"",class:"font-bold"}),e(a,{field:"new_regime",header:"Apr 23"}),e(a,{field:"old_regime",header:"May 23"}),e(a,{field:"old_regime",header:"June 23 "}),e(a,{field:"old_regime",header:"July 23 "}),e(a,{field:"new_regime",header:"Aug 23"}),e(a,{field:"old_regime",header:"Sep 23"}),e(a,{field:"old_regime",header:"Oct 23 "}),e(a,{field:"old_regime",header:"Nov 23 "}),e(a,{field:"old_regime",header:"Dec 23 "}),e(a,{field:"old_regime",header:"Jan 23 "}),e(a,{field:"old_regime",header:"Feb 23 "}),e(a,{field:"old_regime",header:"Mar 23 "})]),_:1})])])])])])}const De=ee(se,[["render",Se]]);const Ce={class:"mt-30 investments-wrapper"},Ie=o("div",{class:"mb-2 shadow card left-line"},[o("div",{class:"pt-1 pb-0 card-body"},[o("ul",{class:"divide-x nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},[o("li",{class:"mx-4 nav-item ember-view",role:"presentation"},[o("a",{class:"nav-link active ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#investment_dec",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Declaration")]),o("li",{class:"nav-item ember-view",role:"presentation"},[o("a",{class:"mx-2 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#exemptions",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Investments and Exemptions")]),o("li",{class:"nav-item ember-view",role:"presentation"},[o("a",{class:"mx-2 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#investmentComputation",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Income Tax Computations")])])])],-1),Ne={class:"mb-0 top-line"},Pe={class:"card-body"},ke={class:"tab-content",id:"pills-tabContent"},Ae={class:"tab-pane fade active show",id:"investment_dec",role:"tabpanel","aria-labelledby":"pills-home-tab"},Me={class:"tab-pane fade",id:"exemptions",role:"tabpanel"},Fe={class:"tab-pane fade",id:"investmentComputation",role:"tabpanel"},Re=o("h5",{style:{"text-align":"center"}},"Please wait...",-1),Be={__name:"investment",setup(p){const d=X();return ae(),oe(),u(async()=>{await d.getInvestmentSource()}),(a,l)=>{const _=r("Toast"),f=r("ConfirmDialog"),g=r("ProgressSpinner"),h=r("Dialog");return c(),m(y,null,[e(_),e(f),o("div",Ce,[Ie,o("div",Ne,[o("div",Pe,[o("div",ke,[o("div",Ae,[e(q)]),o("div",Me,[e(Z)]),o("div",Fe,[e(De)])])])])]),e(h,{header:"Header",visible:n(d).canShowLoading,"onUpdate:visible":l[0]||(l[0]=v=>n(d).canShowLoading=v),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:t(()=>[e(g,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:t(()=>[Re]),_:1},8,["visible"])],64)}}},s=x(Be),Ee=M();s.use(w,{ripple:!0});s.use(T);s.use($);s.use(K);s.use(Ee);s.directive("tooltip",F);s.directive("badge",R);s.directive("ripple",S);s.directive("styleclass",B);s.directive("focustrap",D);s.component("Button",C);s.component("DataTable",E);s.component("Column",L);s.component("ColumnGroup",G);s.component("Row",z);s.component("Toast",I);s.component("ConfirmDialog",N);s.component("Dropdown",P);s.component("InputText",k);s.component("Dialog",A);s.component("ProgressSpinner",V);s.component("Calendar",O);s.component("Textarea",H);s.component("Chips",Q);s.component("MultiSelect",U);s.component("InputNumber",J);s.component("InputMask",W);s.component("OverlayPanel",Y);s.component("Tag",j);s.mount("#Investments");
