/* empty css              */import{I as _,g as r,o as c,c as f,d as e,h as s,w as t,l as i,F as y,f as w,b as T,t as g,J as $,ak as D,aj as u,K as S,P as C,L as I,u as N,M as P,R as k,S as M,x as A,y as F,N as R,_ as E,Q as L,W as B,Y as V,V as K,X as G}from"./toastservice.esm-3d6796bd.js";/* empty css                 */import{c as J}from"./pinia-5332ebd8.js";import"./blockui.esm-fba20899.js";import{a as z}from"./datatable.esm-30f5a7e6.js";import{D as O,s as H}from"./dialogservice.esm-0be88020.js";import{C as W}from"./confirmationservice.esm-5ceb5613.js";import{s as Y}from"./progressspinner.esm-2bee3521.js";import{s as j}from"./row.esm-6ebc942e.js";import{s as Q}from"./calendar.esm-88321a96.js";import{s as U}from"./textarea.esm-bd97b02a.js";import{s as X}from"./chips.esm-267914ec.js";import{s as q}from"./multiselect.esm-74672710.js";import{s as Z}from"./inputmask.esm-0365dec7.js";import{s as ee}from"./overlaypanel.esm-cb79f945.js";import{s as se}from"./tag.esm-bbf86d31.js";import{d as oe}from"./declaration-e4dd62fc.js";import{_ as ae}from"./investments_and_exemption-33f60cd3.js";import"./index-362795f3.js";import{i as te}from"./investmentMainStore-b8427d5f.js";import{S as ie}from"./Service-bda4280b.js";import"./dayjs.min-2f06af28.js";import{p as le}from"./ProfilePagesStore-5c40d2a6.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./index.esm-a629d5bb.js";import"./moment-fbc5633a.js";import"./autoprefixer-6d6f7a0f.js";const re={class:"p-2"},de=$('<div class="my-3"><p class="font-semibold fs-6">View complete breakup of payments, deductions and declarations. You can analyse how income tax is being calculated and what is the TDS every month.</p></div><div class="card"><div class="grid gap-4 my-1 md:grid-cols-6 xl:grid-cols-6 lg:grid-cols-6 card-body"><div class="p-2 text-left border-l-4 rounded-lg bg-sky-100 border-l-sky-400"><p class="my-2 font-semibold fs-6">Net Taxable Income</p><h6 class="text-lg font-bold">INR 4,82,246 </h6></div><div class="p-2 text-left bg-gray-100 border-l-4 rounded-lg tw-card border-l-gray-400"><p class="my-2 font-semibold fs-6">Gross Income Tax</p><h6 class="text-lg font-bold">INR 0</h6></div><div class="p-2 text-left bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="my-2 font-semibold fs-6">Total Surcharge &amp; Cess</p><h6 class="text-lg font-bold">INR 0</h6></div><div class="p-2 text-left border-l-4 rounded-lg bg-sky-100 border-l-sky-400"><p class="my-2 font-semibold fs-6">Net Income Tax payable</p><h6 class="text-lg font-bold">INR 4,82,246 </h6></div><div class="p-2 text-left bg-gray-100 border-l-4 rounded-lg tw-card border-l-gray-400"><p class="my-2 font-semibold fs-6">Tax Paid Till Now</p><h6 class="text-lg font-bold">INR 0</h6></div><div class="p-2 text-left bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="my-2 font-semibold fs-6">Remaining Tax To Be Paid</p><h6 class="text-lg font-bold">INR 0</h6></div></div></div>',2),ne={class:"my-4 card"},ce={class:"card-body"},me=e("div",{class:"flex"},[e("p",{class:"font-semibold fs-5"}," A. Gross Earnings from Employment "),e("div",null," Income from Previous Employer ")],-1),pe={class:""},_e={class:"table-responsive"},fe=e("div",null,null,-1),ve={class:"my-4 card"},be={class:"card-body"},he=e("div",null,[e("p",{class:"font-semibold fs-5"},"B. Taxable Income From All Heads")],-1),ge={class:"my-4 table-responsive"},ue={class:"table-responsive"},ye={class:"my-4 card"},xe={class:"card-body"},we=e("div",null,[e("p",{class:"font-semibold fs-5"},"C. Tax Calculations")],-1),Te={class:"my-4 table-responsive"},$e={class:"my-4 card"},De={class:"card-body"},Se=e("div",{class:"flex"},[e("p",{class:"font-semibold fs-5"}," Month- Month Tax Deduction Details "),e("div",null," Income from Previous Employer ")],-1),Ce={class:"table-responsive"},Ie={__name:"incomeTaxComputation",setup(x){_([]);const d=_([]),v=_();return(m,b)=>{const a=r("Column"),l=r("DataTable");return c(),f("div",re,[de,e("div",ne,[e("div",ce,[me,e("div",pe,[e("div",_e,[s(l,{rows:1,dataKey:"id",scrollable:"",value:v.value},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[(c(!0),f(y,null,w(d.value,n=>(c(),T(a,{key:n.headers,field:n.headers,header:n.headers},{body:t(({data:p,field:h})=>[i(g(h)+" "+g(p[h]),1)]),_:2},1032,["field","header"]))),128))]),_:1},8,["value"])])])])]),fe,e("div",ve,[e("div",be,[he,e("div",ge,[s(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[s(a,{field:"new_regime",header:"Apr 23"}),s(a,{field:"old_regime",header:"May 23"})]),_:1})]),e("div",ue,[s(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[s(a,{field:"particulars",header:"Excemptions",frozen:"",class:"font-bold"}),s(a,{field:"new_regime",header:"Sections"}),s(a,{field:"old_regime",header:"Allowance"}),s(a,{field:"old_regime",header:"Gross Amount"}),s(a,{field:"old_regime",header:"Deductible Amount"}),s(a,{field:"old_regime",header:"Total"})]),_:1})])])]),e("div",ye,[e("div",xe,[we,e("div",Te,[s(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[s(a,{field:"particulars",header:"Tax",frozen:"",class:"font-bold"}),s(a,{field:"new_regime",header:"Income Tax Slab"}),s(a,{field:"old_regime",header:"Tax Amount"})]),_:1})])])]),e("div",$e,[e("div",De,[Se,e("div",null,[e("div",Ce,[s(l,{rows:1,dataKey:"id",scrollable:""},{empty:t(()=>[i(" No Data Found. ")]),loading:t(()=>[i(" Loading customers data. Please wait. ")]),default:t(()=>[s(a,{field:"particulars",header:"Month",frozen:"",class:"font-bold"}),s(a,{field:"new_regime",header:"Apr 23"}),s(a,{field:"old_regime",header:"May 23"}),s(a,{field:"old_regime",header:"June 23 "}),s(a,{field:"old_regime",header:"July 23 "}),s(a,{field:"new_regime",header:"Aug 23"}),s(a,{field:"old_regime",header:"Sep 23"}),s(a,{field:"old_regime",header:"Oct 23 "}),s(a,{field:"old_regime",header:"Nov 23 "}),s(a,{field:"old_regime",header:"Dec 23 "}),s(a,{field:"old_regime",header:"Jan 23 "}),s(a,{field:"old_regime",header:"Feb 23 "}),s(a,{field:"old_regime",header:"Mar 23 "})]),_:1})])])])])])}}};const Ne={class:""},Pe=e("div",{class:"mb-2 shadow card left-line"},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"divide-x nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},[e("li",{class:"mx-4 nav-item ember-view",role:"presentation"},[e("a",{class:"nav-link active ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#investment_dec",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Declaration")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"mx-2 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#exemptions",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Investments and Exemptions")]),e("li",{class:"nav-item ember-view",role:"presentation"},[e("a",{class:"mx-2 nav-link ember-view",id:"pills-home-tab","data-bs-toggle":"pill",href:"","data-bs-target":"#investmentComputation",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Income Tax Computations")])])])],-1),ke={class:"mb-0 top-line"},Me={class:"card-body"},Ae={class:"tab-content",id:"pills-tabContent"},Fe={class:"tab-pane fade active show",id:"investment_dec",role:"tabpanel","aria-labelledby":"pills-home-tab"},Re={class:"tab-pane fade",id:"exemptions",role:"tabpanel"},Ee={class:"tab-pane fade",id:"investmentComputation",role:"tabpanel"},Le=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),Be={__name:"investment",setup(x){const d=te();return le(),ie(),D(async()=>{await d.getInvestmentSource()}),(v,m)=>{const b=r("Toast"),a=r("ConfirmDialog"),l=r("ProgressSpinner"),n=r("Dialog");return c(),f(y,null,[s(b),s(a),e("div",Ne,[Pe,e("div",ke,[e("div",Me,[e("div",Ae,[e("div",Fe,[s(oe)]),e("div",Re,[s(ae)]),e("div",Ee,[s(Ie)])])])])]),s(n,{header:"Header",visible:u(d).canShowLoading,"onUpdate:visible":m[0]||(m[0]=p=>u(d).canShowLoading=p),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:t(()=>[s(l,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:t(()=>[Le]),_:1},8,["visible"])],64)}}},o=S(Be),Ve=J();o.use(C,{ripple:!0});o.use(W);o.use(I);o.use(O);o.use(Ve);o.directive("tooltip",N);o.directive("badge",P);o.directive("ripple",k);o.directive("styleclass",M);o.directive("focustrap",A);o.component("Button",F);o.component("DataTable",z);o.component("Column",R);o.component("ColumnGroup",H);o.component("Row",j);o.component("Toast",E);o.component("ConfirmDialog",L);o.component("Dropdown",B);o.component("InputText",V);o.component("Dialog",K);o.component("ProgressSpinner",Y);o.component("Calendar",Q);o.component("Textarea",U);o.component("Chips",X);o.component("MultiSelect",q);o.component("InputNumber",G);o.component("InputMask",Z);o.component("OverlayPanel",ee);o.component("Tag",se);o.mount("#Investments");
