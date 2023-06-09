import{g as r,o as c,c as m,e as o,h as e,w as t,k as i,a3 as b,I as u,af as n,F as y,J as x,P as w,K as T,R as $,u as D,v as S,Q as C,L as I,N,A as P,M as k}from"./toastservice.esm-b0df8430.js";/* empty css                 */import{c as A}from"./pinia-38500c14.js";import{T as M,B as F,S as R,b as B,a as E,c as L}from"./styleclass.esm-c88657ea.js";import"./blockui.esm-7963e732.js";import{D as J}from"./dialogservice.esm-dfc08b41.js";import{C as K}from"./confirmationservice.esm-6f4a46b4.js";import{s as V}from"./progressspinner.esm-6cc3039f.js";import{s as z}from"./row.esm-6ebc942e.js";import{s as G}from"./columngroup.esm-9dd1458e.js";import{s as O}from"./calendar.esm-d1eec60d.js";import{s as H}from"./textarea.esm-c4771c89.js";import{s as Q}from"./chips.esm-3770db52.js";import{s as U}from"./multiselect.esm-0d4aad3e.js";import{s as W}from"./inputmask.esm-6289a2a4.js";import{s as Y}from"./overlaypanel.esm-f60ec200.js";import{s as j}from"./tag.esm-2cc9a548.js";import{d as q}from"./declaration-53dadb55.js";import{_ as X}from"./investments_and_exemption-004bc577.js";import{_ as Z}from"./_plugin-vue_export-helper-c27b6911.js";import{i as ee}from"./investmentMainStore-e467278a.js";import{S as oe}from"./Service-b9c8a7ec.js";import"./dayjs.min-2f06af28.js";import{p as ae}from"./ProfilePagesStore-885f1b63.js";import"./index-362795f3.js";import"./index.esm-e6a09ee3.js";import"./moment-fbc5633a.js";const se={},te={class:"p-2"},ie=b('<div class="my-3"><p class="font-semibold fs-6">View complete breakup of payments, deductions and declarations. You can analyse how income tax is being calculated and what is the TDS every month.</p></div><div class="card"><div class="grid gap-4 my-1 md:grid-cols-6 xl:grid-cols-6 lg:grid-cols-6 card-body"><div class="p-2 text-left border-l-4 rounded-lg bg-sky-100 border-l-sky-400"><p class="my-2 font-semibold fs-6">Net Taxable Income</p><h6 class="text-lg font-bold">INR 4,82,246 </h6></div><div class="p-2 text-left bg-gray-100 border-l-4 rounded-lg tw-card border-l-gray-400"><p class="my-2 font-semibold fs-6">Gross Income Tax</p><h6 class="text-lg font-bold">INR 0</h6></div><div class="p-2 text-left bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="my-2 font-semibold fs-6">Total Surcharge &amp; Cess</p><h6 class="text-lg font-bold">INR 0</h6></div><div class="p-2 text-left border-l-4 rounded-lg bg-sky-100 border-l-sky-400"><p class="my-2 font-semibold fs-6">Net Income Tax payable</p><h6 class="text-lg font-bold">INR 4,82,246 </h6></div><div class="p-2 text-left bg-gray-100 border-l-4 rounded-lg tw-card border-l-gray-400"><p class="my-2 font-semibold fs-6">Tax Paid Till Now</p><h6 class="text-lg font-bold">INR 0</h6></div><div class="p-2 text-left bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="my-2 font-semibold fs-6">Remaining Tax To Be Paid</p><h6 class="text-lg font-bold">INR 0</h6></div></div></div>',2),le={class:"my-4 card"},re={class:"card-body"},de=o("div",{class:"flex"},[o("p",{class:"font-semibold fs-5"}," A. Gross Earnings from Employment "),o("div",null," Income from Previous Employer ")],-1),ne={class:""},ce={class:"table-responsive"},me=o("div",null,null,-1),pe={class:"my-4 card"},fe={class:"card-body"},_e=o("div",null,[o("p",{class:"font-semibold fs-5"},"B. Taxable Income From All Heads")],-1),ge={class:"my-4 table-responsive"},he={class:"table-responsive"},ve={class:"my-4 card"},be={class:"card-body"},ue=o("div",null,[o("p",{class:"font-semibold fs-5"},"C. Tax Calculations")],-1),ye={class:"my-4 table-responsive"},xe={class:"my-4 card"},we={class:"card-body"},Te=o("div",{class:"flex"},[o("p",{class:"font-semibold fs-5"}," Month- Month Tax Deduction Details "),o("div",null," Income from Previous Employer ")],-1),$e={class:"table-responsive"};function De(p,d){const a=r("Column"),l=r("DataTable");return c(),m("div",te,[ie,o("div",le,[o("div",re,[de,o("div",ne,[o("div",ce,[e(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[e(a,{field:"particulars",header:"Salary Breakup",frozen:"",class:"font-bold"}),e(a,{field:"new_regime",header:"Apr 23"}),e(a,{field:"old_regime",header:"May 23"}),e(a,{field:"old_regime",header:"June 23 "}),e(a,{field:"old_regime",header:"July 23 "}),e(a,{field:"new_regime",header:"Aug 23"}),e(a,{field:"old_regime",header:"Sep 23"}),e(a,{field:"old_regime",header:"Oct 23 "}),e(a,{field:"old_regime",header:"Nov 23 "}),e(a,{field:"old_regime",header:"Dec 23 "}),e(a,{field:"old_regime",header:"Jan 23 "}),e(a,{field:"old_regime",header:"Feb 23 "}),e(a,{field:"old_regime",header:"Mar 23 "})]),_:1})])])])]),me,o("div",pe,[o("div",fe,[_e,o("div",ge,[e(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[e(a,{field:"new_regime",header:"Apr 23"}),e(a,{field:"old_regime",header:"May 23"})]),_:1})]),o("div",he,[e(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[e(a,{field:"particulars",header:"Excemptions",frozen:"",class:"font-bold"}),e(a,{field:"new_regime",header:"Sections"}),e(a,{field:"old_regime",header:"Allowance"}),e(a,{field:"old_regime",header:"Gross Amount"}),e(a,{field:"old_regime",header:"Deductible Amount"}),e(a,{field:"old_regime",header:"Total"})]),_:1})])])]),o("div",ve,[o("div",be,[ue,o("div",ye,[e(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[e(a,{field:"particulars",header:"Tax",frozen:"",class:"font-bold"}),e(a,{field:"new_regime",header:"Income Tax Slab"}),e(a,{field:"old_regime",header:"Tax Amount"})]),_:1})])])]),o("div",xe,[o("div",we,[Te,o("div",null,[o("div",$e,[e(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[e(a,{field:"particulars",header:"Month",frozen:"",class:"font-bold"}),e(a,{field:"new_regime",header:"Apr 23"}),e(a,{field:"old_regime",header:"May 23"}),e(a,{field:"old_regime",header:"June 23 "}),e(a,{field:"old_regime",header:"July 23 "}),e(a,{field:"new_regime",header:"Aug 23"}),e(a,{field:"old_regime",header:"Sep 23"}),e(a,{field:"old_regime",header:"Oct 23 "}),e(a,{field:"old_regime",header:"Nov 23 "}),e(a,{field:"old_regime",header:"Dec 23 "}),e(a,{field:"old_regime",header:"Jan 23 "}),e(a,{field:"old_regime",header:"Feb 23 "}),e(a,{field:"old_regime",header:"Mar 23 "})]),_:1})])])])])])}const Se=Z(se,[["render",De]]);const Ce={class:"mt-30 investments-wrapper"},Ie=o("div",{class:"mb-2 shadow card left-line"},[o("div",{class:"pt-1 pb-0 card-body"},[o("ul",{class:"divide-x nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},[o("li",{class:"mx-4 nav-item ember-view",role:"presentation"},[o("a",{class:"nav-link active ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#investment_dec",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Declaration")]),o("li",{class:"nav-item ember-view",role:"presentation"},[o("a",{class:"mx-2 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#exemptions",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Investments and Exemptions")]),o("li",{class:"nav-item ember-view",role:"presentation"},[o("a",{class:"mx-2 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#investmentComputation",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Income Tax Computations")])])])],-1),Ne={class:"mb-0 top-line"},Pe={class:"card-body"},ke={class:"tab-content",id:"pills-tabContent"},Ae={class:"tab-pane fade active show",id:"investment_dec",role:"tabpanel","aria-labelledby":"pills-home-tab"},Me={class:"tab-pane fade",id:"exemptions",role:"tabpanel"},Fe={class:"tab-pane fade",id:"investmentComputation",role:"tabpanel"},Re=o("h5",{style:{"text-align":"center"}},"Please wait...",-1),Be={__name:"investment",setup(p){const d=ee();return ae(),oe(),u(async()=>{await d.getInvestmentSource()}),(a,l)=>{const f=r("Toast"),_=r("ConfirmDialog"),g=r("ProgressSpinner"),h=r("Dialog");return c(),m(y,null,[e(f),e(_),o("div",Ce,[Ie,o("div",Ne,[o("div",Pe,[o("div",ke,[o("div",Ae,[e(q)]),o("div",Me,[e(X)]),o("div",Fe,[e(Se)])])])])]),e(h,{header:"Header",visible:n(d).canShowLoading,"onUpdate:visible":l[0]||(l[0]=v=>n(d).canShowLoading=v),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:t(()=>[e(g,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:t(()=>[Re]),_:1},8,["visible"])],64)}}},s=x(Be),Ee=A();s.use(w,{ripple:!0});s.use(K);s.use(T);s.use(J);s.use(Ee);s.directive("tooltip",M);s.directive("badge",F);s.directive("ripple",$);s.directive("styleclass",R);s.directive("focustrap",D);s.component("Button",S);s.component("DataTable",B);s.component("Column",E);s.component("ColumnGroup",G);s.component("Row",z);s.component("Toast",C);s.component("ConfirmDialog",I);s.component("Dropdown",N);s.component("InputText",P);s.component("Dialog",k);s.component("ProgressSpinner",V);s.component("Calendar",O);s.component("Textarea",H);s.component("Chips",Q);s.component("MultiSelect",U);s.component("InputNumber",L);s.component("InputMask",W);s.component("OverlayPanel",Y);s.component("Tag",j);s.mount("#Investments");
