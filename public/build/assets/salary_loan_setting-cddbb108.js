import{B as m,g as y,o as d,c,e,n as u,a as v,h as i,j as g,W as x,G as w,P as V,H as $,R as C,q as k}from"./toastservice.esm-be32db1e.js";/* empty css                 */import{c as D}from"./pinia-283027a5.js";import{T as L,B as z,S,b as T,a as E,c as R}from"./styleclass.esm-ba8fdf63.js";import"./blockui.esm-dd521861.js";import{C as B,F as U,b as A,s as I,a as P}from"./inputtext.esm-e9caa4ce.js";import{s as j}from"./confirmdialog.esm-bc3d19a4.js";import{D as N}from"./dialogservice.esm-7f45f84c.js";import{s as F}from"./toast.esm-798d9fce.js";import{s as q}from"./progressspinner.esm-08c4bf67.js";import{s as O}from"./row.esm-6ebc942e.js";import{s as H}from"./columngroup.esm-9dd1458e.js";import{s as M}from"./calendar.esm-edf22c1b.js";import{s as W}from"./textarea.esm-36055c89.js";import{s as G}from"./chips.esm-727e3d13.js";import{s as K}from"./multiselect.esm-93c336fb.js";import{s as J}from"./selectbutton.esm-38e12d53.js";import{s as Q}from"./radiobutton.esm-8dbb016b.js";import{_ as b}from"./_plugin-vue_export-helper-c27b6911.js";const X={class:"px-5"},Y={class:"row d-flex justify-content-start align-items-center"},Z={class:"d-flex"},ee=e("div",{class:"col-3 fs-3",style:{position:"relative",left:"-8px"}},[e("h1",null,"Salary Advance Feature")],-1),te={class:"col"},se={key:0,class:"mx-6"},oe=e("button",{class:"cancel_btn border-blue-800 text-indigo-700"},"cancel",-1),le=e("button",{class:"cancel_btn",style:{"background-color":"var(--navy)","border-radius":"0 4px 4px 0",color:"var(--white)"}},"Enable",-1),ae=[oe,le],ie={key:0,class:"col"},ne=e("div",null,[e("p",{class:"fs-5"},'Please click the "Enable" button to activate the salary advance feature for use within your organization.')],-1),de=[ne],ce={key:1,class:"row"},re=e("div",{class:"col-10"},[e("p",{class:"fs-5"},'Please click the "Disable" button to deactivate the salary advance feature.'),e("h1",{class:"fs-3 mt-10"},"Eligible Employees"),e("p",{class:"my-2 fs-5"},"Kindly choose the employees who are eligible for the salary advance.")],-1),pe={class:"col-12"},me={class:"card"},ue={class:"card-body",style:{"border-top":"3px solid var(--navy)"}},ve={class:"row"},_e=e("div",{class:"col-10"},[e("h1",{style:{"border-left":"3px solid var(--orange)","padding-left":"15px","font-size":"18px"}},"Employees")],-1),he={class:"col-10"},fe={class:"p-input-icon-left"},ye=e("i",{class:"pi pi-search"},null,-1),be={class:"col-12"},ge={class:"row px-2"},xe={class:"col"},we={class:"col"},Ve={class:"col"},$e={class:"col"},Ce={class:"col"},ke={class:"col"},De={class:"col"},Le=e("div",{class:"row"},[e("div",{class:"col"})],-1),ze={class:"col"},Se=e("h1",{class:"fs-3 my-3"},"Percentage of Salary Advance",-1),Te=e("p",{class:"my-2 fs-5"},"Please select the percentage of the salary advance that employees can avail.",-1),Ee={class:"card border-L rounded-top"},Re={class:"card-body"},Be={class:"row justify-content-start align-items-center"},Ue={class:"col-2"},Ae={class:"flex flex-wrap gap-3"},Ie={class:"flex justify-content-center align-items-center"},Pe=e("label",{for:"ingredient1",class:"ml-2 fs-5"},"100% Of Net salary",-1),je={class:"col-2"},Ne={class:"flex align-items-center"},Fe=e("label",{for:"ingredient2",class:"ml-2 fs-5"},"50% Of Net salary",-1),qe={class:"col-1"},Oe={class:"flex align-items-center"},He=e("label",{for:"ingredient3",class:"ml-2 fs-5"},"Custom",-1),Me={class:"col-3"},We={class:"flex align-items-center"},Ge=e("label",{for:"ingredient4",class:"ml-2 fs-5"},"% Of Net salary",-1),Ke=e("h1",{class:"fs-3 my-3",style:{"margin-top":"30px !important"}},"Deduction Method",-1),Je=e("p",{class:"my-2 fs-5"},"Please choose the method of deduction.",-1),Qe={class:"card border-L"},Xe={class:"card-body"},Ye=e("div",{class:"row"},[e("div",{class:"col-7 d-flex justify-content-start align-items-center"},[e("input",{type:"radio",name:"Dedution_method",checked:""}),e("label",{for:"",class:"mx-3 fs-5",style:{"line-height":"25px"}},"Deduct the amount in the upcoming payroll.")])],-1),Ze={class:"row my-3"},et={class:"col-7 d-flex justify-content-start align-items-center"},tt=e("input",{type:"radio",name:"Dedution_method",checked:""},null,-1),st={for:"",class:"mx-3 fs-5"},ot=e("div",{class:"row"},[e("div",{class:"col"},[e("p",{class:"fs-5"},"(Note: Within the declared period of time, employees can choose the month in which the amount will be deducted.)")])],-1),lt=x('<h1 class="fs-3 my-3" style="margin-top:30px !important;">Approval Setting</h1><p class="my-2 fs-5">Please choose the approval flow for salary advance.</p><div class="card border-L"><div class="card-body"><div class="row"><div class="col-7 d-flex justify-content-start align-items-center"><input type="radio" name="Dedution_method" checked><label for="" class="mx-3 fs-5" style="line-height:25px;">Employee Request <i class="pi pi-arrow-right" style="font-size:1rem;"></i> Line Manager <i class="pi pi-arrow-right" style="font-size:1rem;"></i> HR <i class="pi pi-arrow-right" style="font-size:1rem;"></i> Final Admin </label></div></div><div class="row my-3"><div class="col-7 d-flex justify-content-start align-items-center"><input type="radio" name="Dedution_method" checked><label for="" class="mx-3 fs-5" style="line-height:25px;">Employee Request <i class="pi pi-arrow-right" style="font-size:1rem;"></i> HR <i class="pi pi-arrow-right" style="font-size:1rem;"></i> Final Admin </label></div></div><div class="row my-3"><div class="col-7 d-flex justify-content-start align-items-center"><input type="radio" name="Dedution_method" checked><label for="" class="mx-3 fs-5" style="line-height:25px;">Employee Request <i class="pi pi-arrow-right" style="font-size:1rem;"></i> HR </label></div></div><div class="row my-3"><div class="col-7 d-flex justify-content-start align-items-center"><input type="radio" name="Dedution_method" checked><label for="" class="mx-3 fs-5" style="line-height:25px;">Employee Request <i class="pi pi-arrow-right" style="font-size:1rem;"></i> Final Admin </label></div></div></div></div>',3),at={__name:"salary_advance",setup(_){const a=m();m(["Off","On"]);const r=m(1);m(1);const n=m("");return(o,s)=>{const h=y("InputText"),p=y("Dropdown"),f=y("RadioButton");return d(),c("div",X,[e("div",Y,[e("div",Z,[ee,e("div",te,[e("button",{class:u(["orange_btn",[r.value===2?"bg-white text-black border-1 border-black":"text-white"]]),onClick:s[0]||(s[0]=l=>r.value=1)},"Disabled",2),e("button",{class:u(["Enable_btn",[r.value===2?"bg-green-700 text-white":""]]),onClick:s[1]||(s[1]=l=>r.value=2)},"Enable",2)]),r.value=="2"?(d(),c("div",se,ae)):v("",!0)]),r.value=="1"?(d(),c("div",ie,de)):(d(),c("div",ce,[re,e("div",pe,[e("div",me,[e("div",ue,[e("div",ve,[_e,e("div",he,[e("span",fe,[ye,i(h,{placeholder:"Search",class:"h-15"})])]),e("div",be,[e("div",ge,[e("div",xe,[i(p,{modelValue:o.selectedCity,"onUpdate:modelValue":s[2]||(s[2]=l=>o.selectedCity=l),editable:"",options:o.cities,optionLabel:"name",placeholder:"Department",class:"w-full md: border-color"},null,8,["modelValue","options"])]),e("div",we,[i(p,{modelValue:o.selectedCity,"onUpdate:modelValue":s[3]||(s[3]=l=>o.selectedCity=l),editable:"",options:o.cities,optionLabel:"name",placeholder:"Department",class:"w-full md:"},null,8,["modelValue","options"])]),e("div",Ve,[i(p,{modelValue:o.selectedCity,"onUpdate:modelValue":s[4]||(s[4]=l=>o.selectedCity=l),editable:"",options:o.cities,optionLabel:"name",placeholder:"Designation",class:"w-full md:"},null,8,["modelValue","options"])]),e("div",$e,[i(p,{modelValue:o.selectedCity,"onUpdate:modelValue":s[5]||(s[5]=l=>o.selectedCity=l),editable:"",options:o.cities,optionLabel:"name",placeholder:"Location",class:"w-full md:"},null,8,["modelValue","options"])]),e("div",Ce,[i(p,{modelValue:o.selectedCity,"onUpdate:modelValue":s[6]||(s[6]=l=>o.selectedCity=l),editable:"",options:o.cities,optionLabel:"name",placeholder:"State",class:"w-full md:"},null,8,["modelValue","options"])]),e("div",ke,[i(p,{modelValue:o.selectedCity,"onUpdate:modelValue":s[7]||(s[7]=l=>o.selectedCity=l),editable:"",options:o.cities,optionLabel:"name",placeholder:"Branch",class:"w-full md:"},null,8,["modelValue","options"])]),e("div",De,[i(p,{modelValue:o.selectedCity,"onUpdate:modelValue":s[8]||(s[8]=l=>o.selectedCity=l),editable:"",options:o.cities,optionLabel:"name",placeholder:"Legal Entity",class:"w-full md:"},null,8,["modelValue","options"])])])])]),Le])])]),e("div",ze,[Se,Te,e("div",Ee,[e("div",Re,[e("div",Be,[e("div",Ue,[e("div",Ae,[e("div",Ie,[i(f,{modelValue:n.value,"onUpdate:modelValue":s[9]||(s[9]=l=>n.value=l),inputId:"ingredient1",name:"pizza",value:"Cheese"},null,8,["modelValue"]),Pe])])]),e("div",je,[e("div",Ne,[i(f,{modelValue:n.value,"onUpdate:modelValue":s[10]||(s[10]=l=>n.value=l),inputId:"ingredient2",name:"pizza",value:"Mushroom"},null,8,["modelValue"]),Fe])]),e("div",qe,[e("div",Oe,[i(f,{modelValue:n.value,"onUpdate:modelValue":s[11]||(s[11]=l=>n.value=l),inputId:"ingredient3",name:"pizza",value:"Pepper"},null,8,["modelValue"]),He])]),e("div",Me,[e("div",We,[i(h,{type:"text",modelValue:a.value,"onUpdate:modelValue":s[12]||(s[12]=l=>a.value=l),style:{"max-width":"100px"}},null,8,["modelValue"]),Ge])])])])]),Ke,Je,e("div",Qe,[e("div",Xe,[Ye,e("div",Ze,[e("div",et,[tt,e("label",st,[g("The deduction can be made over a period of "),i(h,{type:"text",class:"mx-3",modelValue:a.value,"onUpdate:modelValue":s[13]||(s[13]=l=>a.value=l),style:{"max-width":"100px"}},null,8,["modelValue"]),g(" months.")])])]),ot])]),lt])]))])])}}},it={};function nt(_,a){return d(),c("div",null,"test")}const dt=b(it,[["render",nt]]),ct={};function rt(_,a){return d(),c("div",null,"test")}const pt=b(ct,[["render",rt]]),mt={};function ut(_,a){return d(),c("div",null,"test")}const vt=b(mt,[["render",ut]]),_t={class:"p-4 pt-1 pb-0 mb-3 mr-8 bg-white rounded-lg tw-card left-line"},ht={class:"divide-x nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},ft={class:"mx-2 nav-item",role:"presentation"},yt={class:"mx-3 nav-item",role:"presentation"},bt={class:"mx-3 nav-item",role:"presentation"},gt={class:"mx-3 nav-item",role:"presentation"},xt={class:"tab-content",id:""},wt={key:0},Vt={key:1},$t={key:2},Ct={key:3},kt={__name:"salary_loan_setting",setup(_){const a=m(1);return(r,n)=>(d(),c("div",null,[e("div",_t,[e("ul",ht,[e("li",ft,[e("a",{class:u(["nav-link",[a.value===1?"active":""]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[0]||(n[0]=o=>a.value=1)}," Salary Advance ",2)]),e("li",yt,[e("a",{class:u(["mx-4 text-center nav-link",[a.value===2?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:n[1]||(n[1]=o=>a.value=2),role:"tab","aria-controls":"","aria-selected":"true"}," Interest Free Loan ",2)]),e("li",bt,[e("a",{class:u(["mx-4 text-center nav-link",[a.value===3?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:n[2]||(n[2]=o=>a.value=3),role:"tab","aria-controls":"","aria-selected":"true"}," Travel Advance ",2)]),e("li",gt,[e("a",{class:u(["mx-4 text-center nav-link",[a.value===4?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:n[3]||(n[3]=o=>a.value=4),role:"tab","aria-controls":"","aria-selected":"true"}," Loan With Interest ",2)])])]),e("div",xt,[a.value===1?(d(),c("div",wt,[i(at)])):v("",!0),a.value===2?(d(),c("div",Vt,[i(pt)])):v("",!0),a.value===3?(d(),c("div",$t,[i(vt)])):v("",!0),a.value===4?(d(),c("div",Ct,[i(dt)])):v("",!0)])]))}},t=w(kt),Dt=D();t.use(V,{ripple:!0});t.use(B);t.use($);t.use(N);t.use(Dt);t.directive("tooltip",L);t.directive("badge",z);t.directive("ripple",C);t.directive("styleclass",S);t.directive("focustrap",U);t.component("Button",k);t.component("RadioButton",Q);t.component("DataTable",T);t.component("Column",E);t.component("ColumnGroup",H);t.component("Row",O);t.component("Toast",F);t.component("ConfirmDialog",j);t.component("Dropdown",A);t.component("InputText",I);t.component("Dialog",P);t.component("ProgressSpinner",q);t.component("Calendar",M);t.component("Textarea",W);t.component("Chips",G);t.component("MultiSelect",K);t.component("InputNumber",R);t.component("SelectButton",J);t.mount("#SalaryAdvanceLoan");
