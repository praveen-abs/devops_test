/* empty css              *//* empty css                     *//* empty css                   *//* empty css                 */import{a0 as m,ak as h,g as n,o as r,c as p,d as e,h as s,w as t,l as i,F as g,f as T,b as u,t as v,J as $,I as C,a as D,K as N,P as S,L as I,u as k,M as P,R as M,S as A,x as F,y as L,N as R,_ as B,Q as E,W as V,Y as K,V as z,X as G}from"./toastservice.esm-484a3f44.js";import{c as J}from"./pinia-ef13c18a.js";import"./blockui.esm-a8e59b90.js";import{a as O}from"./datatable.esm-70b25cd4.js";import{D as Y,s as H}from"./dialogservice.esm-548272f5.js";import{C as Q}from"./confirmationservice.esm-c218b510.js";import{s as W}from"./progressspinner.esm-b12f0644.js";import{s as X}from"./row.esm-6ebc942e.js";import{s as j}from"./calendar.esm-17a99f33.js";import{s as q}from"./textarea.esm-26210577.js";import{s as U}from"./chips.esm-c70e00fc.js";import{s as Z}from"./multiselect.esm-2b7afd9a.js";import{s as ee}from"./inputmask.esm-ab9115ac.js";import{s as se}from"./overlaypanel.esm-09bbb169.js";import{s as ae}from"./tag.esm-18fe182e.js";import{d as oe}from"./declaration-692dc551.js";import{_ as te}from"./investments_and_exemption-8f4d250a.js";import"./index-362795f3.js";import{L as ie}from"./LoadingSpinner-e46f55f6.js";import{i as le}from"./investmentMainStore-46b1bd8e.js";import{S as re}from"./Service-0a78a223.js";import"./dayjs.min-2f06af28.js";import{p as de}from"./ProfilePagesStore-103fb1c8.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./index.esm-9643e1c6.js";import"./moment-fbc5633a.js";/* empty css                                                                       */import"./autoprefixer-6d6f7a0f.js";const ne={class:"p-2"},ce=$('<div class="my-3"><p class="font-semibold fs-6">View complete breakup of payments, deductions and declarations. You can analyse how income tax is being calculated and what is the TDS every month.</p></div><div class="card"><div class="grid gap-4 my-1 md:grid-cols-6 xl:grid-cols-6 lg:grid-cols-6 card-body"><div class="p-2 text-left border-l-4 rounded-lg bg-sky-100 border-l-sky-400"><p class="my-2 font-semibold fs-6">Net Taxable Income</p><h6 class="text-lg font-bold">INR 4,82,246 </h6></div><div class="p-2 text-left bg-gray-100 border-l-4 rounded-lg tw-card border-l-gray-400"><p class="my-2 font-semibold fs-6">Gross Income Tax</p><h6 class="text-lg font-bold">INR 0</h6></div><div class="p-2 text-left bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="my-2 font-semibold fs-6">Total Surcharge &amp; Cess</p><h6 class="text-lg font-bold">INR 0</h6></div><div class="p-2 text-left border-l-4 rounded-lg bg-sky-100 border-l-sky-400"><p class="my-2 font-semibold fs-6">Net Income Tax payable</p><h6 class="text-lg font-bold">INR 4,82,246 </h6></div><div class="p-2 text-left bg-gray-100 border-l-4 rounded-lg tw-card border-l-gray-400"><p class="my-2 font-semibold fs-6">Tax Paid Till Now</p><h6 class="text-lg font-bold">INR 0</h6></div><div class="p-2 text-left bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="my-2 font-semibold fs-6">Remaining Tax To Be Paid</p><h6 class="text-lg font-bold">INR 0</h6></div></div></div>',2),me={class:"my-4 card"},pe={class:"card-body"},_e=e("div",{class:"flex"},[e("p",{class:"font-semibold fs-5"}," A. Gross Earnings from Employment "),e("div",null," Income from Previous Employer ")],-1),fe={class:""},be={class:"table-responsive"},ve=e("div",null,null,-1),he={class:"my-4 card"},ge={class:"card-body"},ue=e("div",null,[e("p",{class:"font-semibold fs-5"},"B. Taxable Income From All Heads")],-1),ye={class:"my-4 table-responsive"},xe={class:"table-responsive"},we={class:"my-4 card"},Te={class:"card-body"},$e=e("div",null,[e("p",{class:"font-semibold fs-5"},"C. Tax Calculations")],-1),Ce={class:"my-4 table-responsive"},De={class:"my-4 card"},Ne={class:"card-body"},Se=e("div",{class:"flex"},[e("p",{class:"font-semibold fs-5"}," Month- Month Tax Deduction Details "),e("div",null," Income from Previous Employer ")],-1),Ie={class:"table-responsive"},ke={__name:"incomeTaxComputation",setup(y){m([]);const d=m([]),_=m();return h(()=>{}),(x,f)=>{const o=n("Column"),l=n("DataTable");return r(),p("div",ne,[ce,e("div",me,[e("div",pe,[_e,e("div",fe,[e("div",be,[s(l,{rows:1,dataKey:"id",scrollable:"",value:_.value},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[(r(!0),p(g,null,T(d.value,c=>(r(),u(o,{key:c.headers,field:c.headers,header:c.headers},{body:t(({data:w,field:b})=>[i(v(b)+" "+v(w[b]),1)]),_:2},1032,["field","header"]))),128))]),_:1},8,["value"])])])])]),ve,e("div",he,[e("div",ge,[ue,e("div",ye,[s(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[s(o,{field:"new_regime",header:"Apr 23"}),s(o,{field:"old_regime",header:"May 23"})]),_:1})]),e("div",xe,[s(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[s(o,{field:"particulars",header:"Excemptions",frozen:"",class:"font-bold"}),s(o,{field:"new_regime",header:"Sections"}),s(o,{field:"old_regime",header:"Allowance"}),s(o,{field:"old_regime",header:"Gross Amount"}),s(o,{field:"old_regime",header:"Deductible Amount"}),s(o,{field:"old_regime",header:"Total"})]),_:1})])])]),e("div",we,[e("div",Te,[$e,e("div",Ce,[s(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[s(o,{field:"particulars",header:"Tax",frozen:"",class:"font-bold"}),s(o,{field:"new_regime",header:"Income Tax Slab"}),s(o,{field:"old_regime",header:"Tax Amount"})]),_:1})])])]),e("div",De,[e("div",Ne,[Se,e("div",null,[e("div",Ie,[s(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[s(o,{field:"particulars",header:"Month",frozen:"",class:"font-bold"}),s(o,{field:"new_regime",header:"Apr 23"}),s(o,{field:"old_regime",header:"May 23"}),s(o,{field:"old_regime",header:"June 23 "}),s(o,{field:"old_regime",header:"July 23 "}),s(o,{field:"new_regime",header:"Aug 23"}),s(o,{field:"old_regime",header:"Sep 23"}),s(o,{field:"old_regime",header:"Oct 23 "}),s(o,{field:"old_regime",header:"Nov 23 "}),s(o,{field:"old_regime",header:"Dec 23 "}),s(o,{field:"old_regime",header:"Jan 23 "}),s(o,{field:"old_regime",header:"Feb 23 "}),s(o,{field:"old_regime",header:"Mar 23 "})]),_:1})])])])])])}}};const Pe={class:""},Me=e("div",{class:"mb-2 shadow card left-line"},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"divide-x nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},[e("li",{class:"mx-4 nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link active ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#investment_dec",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Declaration")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"mx-2 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#exemptions",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Investments and Exemptions")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"mx-2 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#investmentComputation",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Income Tax Computations")])])])],-1),Ae={class:"mb-0 top-line"},Fe={class:"card-body"},Le={class:"tab-content",id:"pills-tabContent"},Re={class:"tab-pane fade active show",id:"investment_dec",role:"tabpanel","aria-labelledby":"pills-home-tab"},Be={class:"tab-pane fade",id:"exemptions",role:"tabpanel"},Ee={class:"tab-pane fade",id:"investmentComputation",role:"tabpanel"},Ve={__name:"investment",setup(y){const d=le();return de(),re(),h(async()=>{await d.getInvestmentSource()}),(_,x)=>{const f=n("Toast"),o=n("ConfirmDialog");return r(),p(g,null,[C(d).canShowLoading?(r(),u(ie,{key:0,class:"absolute z-50 bg-white"})):D("",!0),s(f),s(o),e("div",Pe,[Me,e("div",Ae,[e("div",Fe,[e("div",Le,[e("div",Re,[s(oe)]),e("div",Be,[s(te)]),e("div",Ee,[s(ke)])])])])])],64)}}},a=N(Ve),Ke=J();a.use(S,{ripple:!0});a.use(Q);a.use(I);a.use(Y);a.use(Ke);a.directive("tooltip",k);a.directive("badge",P);a.directive("ripple",M);a.directive("styleclass",A);a.directive("focustrap",F);a.component("Button",L);a.component("DataTable",O);a.component("Column",R);a.component("ColumnGroup",H);a.component("Row",X);a.component("Toast",B);a.component("ConfirmDialog",E);a.component("Dropdown",V);a.component("InputText",K);a.component("Dialog",z);a.component("ProgressSpinner",W);a.component("Calendar",j);a.component("Textarea",q);a.component("Chips",U);a.component("MultiSelect",Z);a.component("InputNumber",G);a.component("InputMask",ee);a.component("OverlayPanel",se);a.component("Tag",ae);a.mount("#Investments");
