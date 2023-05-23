import{H as i,I as $,c as P,e,h as n,w as r,j as b,E as y,t as R,F as N,aq as V,g as d,o as F,k as c,aj as L,ak as I,J as B,P as Y,K as j,L as U,R as A,u as E,v as M,V as O,M as K,Q as q,A as J,N as G,S as H}from"./toastservice.esm-371af8c0.js";/* empty css                 */import{c as Q}from"./pinia-3100160b.js";import{T as z,B as W,S as X,b as Z,a as ee,c as te}from"./styleclass.esm-e298369b.js";import{D as oe}from"./dialogservice.esm-283c5939.js";import{s as ae}from"./row.esm-6ebc942e.js";import{s as ie}from"./columngroup.esm-9dd1458e.js";import"./fileupload.esm-b017cf60.js";import{s as se}from"./calendar.esm-3a97f270.js";import{s as ne}from"./textarea.esm-dff1d4ea.js";import{s as re}from"./chips.esm-d9886340.js";import{i as le}from"./investmentFormulaStore-1a14241a.js";/* empty css                                                                    */import{_ as de}from"./_plugin-vue_export-helper-c27b6911.js";import"./progressbar.esm-1647f92f.js";import"./index-362795f3.js";const s=l=>(L("data-v-ad2499de"),l=l(),I(),l),ce={class:"justify-content-center align-items-center"},pe={class:"mx-2"},me=V('<div class="my-3" data-v-ad2499de><p class="text-2xl text-black" data-v-ad2499de>Tax Deductions FY 2022-2023</p></div><div class="p-2 my-2 text-black border-red-100 rounded-lg bg-red-50" data-v-ad2499de><div style="font-weight:600;" class="px-2 my-2 fs-5 d-flex" data-v-ad2499de>Kindly update your <span class="text-blue-400 fs-5" data-v-ad2499de>PAN to</span> avoid 20$ TDS deduction (if applicable) </div></div><div class="my-4 bg-gray-100 rounded-lg border-1" data-v-ad2499de><p style="font-weight:400;" class="p-3 text-black fs-6" data-v-ad2499de>You have the option of either using a new regime(with no tax deducations), or using the same regime as FY 2019-20.To help you make an informed decision., we are displaying your tax liability in both these regimes,and you can choose the option that you prefer.For us to accurately calculated your tax liabilities , please ensure you full in all the information requested below,irrespective of the regime that you pick</p></div>',3),ue={class:"flex gap-6 my-4"},ge=s(()=>e("div",{class:"w-6"},[e("div",{class:"text-2xl font-semibold"},[c("Your current chosen tax regime is "),e("span",{class:"font-semibold text-blue-500 fs-4"},"Old Tax Regime")]),e("p",{class:"text-gray-600 fs-6 fst-italic"},"The confirmed old tax regime will be used in future payroll calculations "),e("div")],-1)),ve=s(()=>e("span",{class:"text-sm text-green-500"},"Maximum benefit",-1)),fe=s(()=>e("div",{class:"h-full p-3 my-4 bg-blue-50"},[e("p",{class:"text-blue-700 fs-6"}," Choosing old regime will give you an additional benefits of ₹ 41,222.00 as compared to New Regime.Calculations are based on the latest released payroll - Jul 2022 ")],-1)),xe=s(()=>e("h6",{class:"mb-1 text-lg font-semibold modal-title text-primary"},"Confirm Switching Regime",-1)),be=s(()=>e("p",{class:""},[c("Your current switching regime is "),e("span",{class:"text-lg font-semibold text-primary"},"New Tax Regime")],-1)),ye=s(()=>e("p",{class:"my-3 text-justify text-gray-500"}," Are you sure you want to switch your regime? You cannot change your regime selection once you have confirmed your selection. ",-1)),he=s(()=>e("p",{class:"text-justify text-gray-500"}," In case of an incorrect selection, your only option will be to change your selection when you file your tax returns for the current financial year. ",-1)),_e=s(()=>e("div",{class:"mt-5 text-end"},[e("button",{id:"confirm_switchRegime",class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md"},"Confirm")],-1)),we={class:"mt-6 row"},Te={class:"col-4"},ke={__name:"declaration",setup(l){const h=le(),p=i(),m=i(),u=i(),g=i(),_=()=>{g.value=h.taxCalculation(p.value,m.value,u.value),console.log(g.value)};$(()=>{});const w=i([{name:"old",value:"old"},{name:"new",value:"new"}]),T=i([{id:"1",particulars:"Earings",old_regime:"0",new_regime:"0"},{id:"2",particulars:"Exemption",old_regime:"0",new_regime:"0"},{id:"3",particulars:"Standard Deduction",old_regime:"50000",new_regime:"50000"},{id:"4",particulars:"Deduction",old_regime:"0",new_regime:"0"},{id:"5",particulars:"Taxable Income",old_regime:"0",new_regime:"0"},{id:"6",particulars:"Total Tax Liability",old_regime:"0",new_regime:"0"}]),v=i(!1),k=i(!1);return(f,o)=>{const x=d("Column"),D=d("DataTable"),C=d("Dialog"),S=d("Dropdown");return F(),P(N,null,[e("div",ce,[e("div",pe,[me,e("div",ue,[ge,e("div",null,[e("button",{onClick:o[0]||(o[0]=a=>k.value=!0),type:"button",class:"px-2 px-4 btn btn-primary"}," Old Tax Regime"),ve]),e("div",null,[e("button",{onClick:o[1]||(o[1]=a=>v.value=!0),type:"button",class:"p-2 text-orange-400 font-bold hover:text-white border border-orange-400 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-400 rounded-lg text-sm px-5 py-2.5 text-center ml-8 mb-2 dark:border-orange-400 dark:text-orange-400dark:hover:text-white dark:hover:bg-orange-400 dark:focus:ring-orange-400"}," Switch Regime ")])]),fe])]),n(D,{value:T.value,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:f.filters,"onUpdate:filters":o[2]||(o[2]=a=>f.filters=a),filterDisplay:"menu",loading:f.loading2,globalFilterFields:["name","status"]},{empty:r(()=>[c(" No Data Found. ")]),loading:r(()=>[c(" Loading customers data. Please wait. ")]),default:r(()=>[n(x,{field:"particulars",header:"Particulars"}),n(x,{field:"new_regime",header:"New Tax Regime"}),n(x,{field:"old_regime",header:"Old Tax Regime"})]),_:1},8,["value","filters","loading"]),n(C,{visible:v.value,"onUpdate:visible":o[3]||(o[3]=a=>v.value=a),modal:"",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:r(()=>[xe]),default:r(()=>[be,ye,he,_e]),_:1},8,["visible"]),e("div",we,[b(e("input",{type:"number","onUpdate:modelValue":o[4]||(o[4]=a=>p.value=a),name:"",class:"form-control col-2",id:""},null,512),[[y,p.value]]),b(e("input",{type:"number","onUpdate:modelValue":o[5]||(o[5]=a=>u.value=a),name:"",class:"mx-4 form-control col-1",id:""},null,512),[[y,u.value]]),n(S,{editable:"",modelValue:m.value,"onUpdate:modelValue":o[6]||(o[6]=a=>m.value=a),options:w.value,optionLabel:"name",optionValue:"value",class:"mx-4 col-2",placeholder:"Choose Regime"},null,8,["modelValue","options"]),e("div",Te,[e("button",{class:"btn btn-orange",onClick:o[7]||(o[7]=a=>_())},"click")])]),e("h1",null,R(g.value),1)],64)}}},De=de(ke,[["__scopeId","data-v-ad2499de"]]),t=B(De),Ce=Q();t.use(Y,{ripple:!0});t.use(j);t.use(U);t.use(oe);t.use(Ce);t.directive("tooltip",z);t.directive("badge",W);t.directive("ripple",A);t.directive("styleclass",X);t.directive("focustrap",E);t.component("Button",M);t.component("DataTable",Z);t.component("Column",ee);t.component("ColumnGroup",ie);t.component("Row",ae);t.component("Toast",O);t.component("ConfirmDialog",K);t.component("Dropdown",q);t.component("InputText",J);t.component("Dialog",G);t.component("ProgressSpinner",H);t.component("Calendar",se);t.component("Textarea",ne);t.component("Chips",re);t.component("InputNumber",te);t.mount("#declaration");
