import{g as r,o as c,c as m,d as o,h as e,w as t,j as i,a4 as b,I as u,a2 as n,F as y,J as x,P as w,K as T,R as $,u as D,v as S,Q as N,L as C,N as I,A as P,M as k}from"./toastservice.esm-28d3ae2b.js";/* empty css                 */import{c as A}from"./pinia-e771661c.js";import{T as M,B as F,S as R,b as B,a as E,c as L}from"./styleclass.esm-3c85e840.js";import"./blockui.esm-d26f8782.js";import{D as J}from"./dialogservice.esm-82e9a52f.js";import{C as K}from"./confirmationservice.esm-ac7837bb.js";import{s as V}from"./progressspinner.esm-713a603e.js";import{s as z}from"./row.esm-6ebc942e.js";import{s as G}from"./columngroup.esm-9dd1458e.js";import{s as O}from"./calendar.esm-2f7b0fa0.js";import{s as H}from"./textarea.esm-0c036dec.js";import{s as j}from"./chips.esm-063308bb.js";import{s as Q}from"./multiselect.esm-aa4eed85.js";import{s as U}from"./inputmask.esm-2e2a6c6c.js";import{s as W}from"./overlaypanel.esm-0b2ed655.js";import{s as Y}from"./tag.esm-a3e5dfa8.js";import{d as q}from"./declaration-543d8e27.js";import{_ as X}from"./investments_and_exemption-1d7e342d.js";import{_ as Z}from"./_plugin-vue_export-helper-c27b6911.js";import{i as ee}from"./investmentMainStore-e23a81a1.js";import{S as oe}from"./Service-f4f76ece.js";import"./dayjs.min-e0adaab4.js";import{p as se}from"./ProfilePagesStore-851a9a3a.js";import"./index-3716a3fc.js";import"./_commonjsHelpers-042e6b4d.js";import"./index.esm-276f6f75.js";import"./moment-fbc5633a.js";import"./autoprefixer-50c1d6d7.js";const ae={},te={class:"p-2"},ie=b('<div class="my-3"><p class="font-semibold fs-6">View complete breakup of payments, deductions and declarations. You can analyse how income tax is being calculated and what is the TDS every month.</p></div><div class="card"><div class="grid gap-4 my-1 md:grid-cols-6 xl:grid-cols-6 lg:grid-cols-6 card-body"><div class="p-2 text-left border-l-4 rounded-lg bg-sky-100 border-l-sky-400"><p class="my-2 font-semibold fs-6">Net Taxable Income</p><h6 class="text-lg font-bold">INR 4,82,246 </h6></div><div class="p-2 text-left bg-gray-100 border-l-4 rounded-lg tw-card border-l-gray-400"><p class="my-2 font-semibold fs-6">Gross Income Tax</p><h6 class="text-lg font-bold">INR 0</h6></div><div class="p-2 text-left bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="my-2 font-semibold fs-6">Total Surcharge &amp; Cess</p><h6 class="text-lg font-bold">INR 0</h6></div><div class="p-2 text-left border-l-4 rounded-lg bg-sky-100 border-l-sky-400"><p class="my-2 font-semibold fs-6">Net Income Tax payable</p><h6 class="text-lg font-bold">INR 4,82,246 </h6></div><div class="p-2 text-left bg-gray-100 border-l-4 rounded-lg tw-card border-l-gray-400"><p class="my-2 font-semibold fs-6">Tax Paid Till Now</p><h6 class="text-lg font-bold">INR 0</h6></div><div class="p-2 text-left bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="my-2 font-semibold fs-6">Remaining Tax To Be Paid</p><h6 class="text-lg font-bold">INR 0</h6></div></div></div>',2),le={class:"my-4 card"},re={class:"card-body"},de=o("div",{class:"flex"},[o("p",{class:"font-semibold fs-5"}," A. Gross Earnings from Employment "),o("div",null," Income from Previous Employer ")],-1),ne={class:""},ce={class:"table-responsive"},me=o("div",null,null,-1),pe={class:"my-4 card"},_e={class:"card-body"},fe=o("div",null,[o("p",{class:"font-semibold fs-5"},"B. Taxable Income From All Heads")],-1),ge={class:"my-4 table-responsive"},he={class:"table-responsive"},ve={class:"my-4 card"},be={class:"card-body"},ue=o("div",null,[o("p",{class:"font-semibold fs-5"},"C. Tax Calculations")],-1),ye={class:"my-4 table-responsive"},xe={class:"my-4 card"},we={class:"card-body"},Te=o("div",{class:"flex"},[o("p",{class:"font-semibold fs-5"}," Month- Month Tax Deduction Details "),o("div",null," Income from Previous Employer ")],-1),$e={class:"table-responsive"};function De(p,d){const s=r("Column"),l=r("DataTable");return c(),m("div",te,[ie,o("div",le,[o("div",re,[de,o("div",ne,[o("div",ce,[e(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[e(s,{field:"particulars",header:"Salary Breakup",frozen:"",class:"font-bold"}),e(s,{field:"new_regime",header:"Apr 23"}),e(s,{field:"old_regime",header:"May 23"}),e(s,{field:"old_regime",header:"June 23 "}),e(s,{field:"old_regime",header:"July 23 "}),e(s,{field:"new_regime",header:"Aug 23"}),e(s,{field:"old_regime",header:"Sep 23"}),e(s,{field:"old_regime",header:"Oct 23 "}),e(s,{field:"old_regime",header:"Nov 23 "}),e(s,{field:"old_regime",header:"Dec 23 "}),e(s,{field:"old_regime",header:"Jan 23 "}),e(s,{field:"old_regime",header:"Feb 23 "}),e(s,{field:"old_regime",header:"Mar 23 "})]),_:1})])])])]),me,o("div",pe,[o("div",_e,[fe,o("div",ge,[e(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[e(s,{field:"new_regime",header:"Apr 23"}),e(s,{field:"old_regime",header:"May 23"})]),_:1})]),o("div",he,[e(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[e(s,{field:"particulars",header:"Excemptions",frozen:"",class:"font-bold"}),e(s,{field:"new_regime",header:"Sections"}),e(s,{field:"old_regime",header:"Allowance"}),e(s,{field:"old_regime",header:"Gross Amount"}),e(s,{field:"old_regime",header:"Deductible Amount"}),e(s,{field:"old_regime",header:"Total"})]),_:1})])])]),o("div",ve,[o("div",be,[ue,o("div",ye,[e(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[e(s,{field:"particulars",header:"Tax",frozen:"",class:"font-bold"}),e(s,{field:"new_regime",header:"Income Tax Slab"}),e(s,{field:"old_regime",header:"Tax Amount"})]),_:1})])])]),o("div",xe,[o("div",we,[Te,o("div",null,[o("div",$e,[e(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[e(s,{field:"particulars",header:"Month",frozen:"",class:"font-bold"}),e(s,{field:"new_regime",header:"Apr 23"}),e(s,{field:"old_regime",header:"May 23"}),e(s,{field:"old_regime",header:"June 23 "}),e(s,{field:"old_regime",header:"July 23 "}),e(s,{field:"new_regime",header:"Aug 23"}),e(s,{field:"old_regime",header:"Sep 23"}),e(s,{field:"old_regime",header:"Oct 23 "}),e(s,{field:"old_regime",header:"Nov 23 "}),e(s,{field:"old_regime",header:"Dec 23 "}),e(s,{field:"old_regime",header:"Jan 23 "}),e(s,{field:"old_regime",header:"Feb 23 "}),e(s,{field:"old_regime",header:"Mar 23 "})]),_:1})])])])])])}const Se=Z(ae,[["render",De]]);const Ne={class:"mt-30 investments-wrapper"},Ce=o("div",{class:"mb-2 shadow card left-line"},[o("div",{class:"pt-1 pb-0 card-body"},[o("ul",{class:"divide-x nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},[o("li",{class:"mx-4 nav-item ember-view",role:"presentation"},[o("a",{class:"nav-link active ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#investment_dec",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Declaration")]),o("li",{class:"nav-item ember-view",role:"presentation"},[o("a",{class:"mx-2 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#exemptions",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Investments and Exemptions")])])])],-1),Ie={class:"mb-0 top-line"},Pe={class:"card-body"},ke={class:"tab-content",id:"pills-tabContent"},Ae={class:"tab-pane fade active show",id:"investment_dec",role:"tabpanel","aria-labelledby":"pills-home-tab"},Me={class:"tab-pane fade",id:"exemptions",role:"tabpanel"},Fe={class:"tab-pane fade",id:"investmentComputation",role:"tabpanel"},Re=o("h5",{style:{"text-align":"center"}},"Please wait...",-1),Be={__name:"investment",setup(p){const d=ee();return se(),oe(),u(async()=>{await d.getInvestmentSource()}),(s,l)=>{const _=r("Toast"),f=r("ConfirmDialog"),g=r("ProgressSpinner"),h=r("Dialog");return c(),m(y,null,[e(_),e(f),o("div",Ne,[Ce,o("div",Ie,[o("div",Pe,[o("div",ke,[o("div",Ae,[e(q)]),o("div",Me,[e(X)]),o("div",Fe,[e(Se)])])])])]),e(h,{header:"Header",visible:n(d).canShowLoading,"onUpdate:visible":l[0]||(l[0]=v=>n(d).canShowLoading=v),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:t(()=>[e(g,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:t(()=>[Re]),_:1},8,["visible"])],64)}}},a=x(Be),Ee=A();a.use(w,{ripple:!0});a.use(K);a.use(T);a.use(J);a.use(Ee);a.directive("tooltip",M);a.directive("badge",F);a.directive("ripple",$);a.directive("styleclass",R);a.directive("focustrap",D);a.component("Button",S);a.component("DataTable",B);a.component("Column",E);a.component("ColumnGroup",G);a.component("Row",z);a.component("Toast",N);a.component("ConfirmDialog",C);a.component("Dropdown",I);a.component("InputText",P);a.component("Dialog",k);a.component("ProgressSpinner",V);a.component("Calendar",O);a.component("Textarea",H);a.component("Chips",j);a.component("MultiSelect",Q);a.component("InputNumber",L);a.component("InputMask",U);a.component("OverlayPanel",W);a.component("Tag",Y);a.mount("#Investments");
