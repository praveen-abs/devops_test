import{G as h,ai as i,o as v,c as g,h as t,w as s,d as e,l as d,X as b,g as c,J as y,P as x,K as T,R as w,u as S,v as P,Q as M,L as R,N as V,A as D,M as A}from"./toastservice.esm-fb72c8eb.js";import{T as N,B as C,S as L,b as $,a as k}from"./styleclass.esm-81c07f59.js";import"./blockui.esm-95ca77c8.js";import{D as F}from"./dialogservice.esm-9c16f9d1.js";import{C as I}from"./confirmationservice.esm-6ca52fda.js";import{s as O}from"./progressspinner.esm-3f16429f.js";import{s as j}from"./row.esm-6ebc942e.js";import{s as H}from"./columngroup.esm-9dd1458e.js";import{s as U}from"./calendar.esm-09f1d069.js";import{s as G}from"./multiselect.esm-0d20cbb0.js";import{s as W}from"./accordion.esm-db1d416d.js";import{s as B}from"./accordiontab.esm-a822f384.js";const E=b('<div class="card py-3" style="border-left:5px solid navy;"><div class="d-flex justify-items-start align-content-center pl-3"><button class="mt-1" style="width:15px;"><i class="fas fa-chevron-left fs-4" style="color:#002f56;"></i></button><h1 class="fw-bold fs-4 pl-3">General Shift</h1></div></div>',1),K=e("span",{class:"fs-5 pl-5"},"Summary",-1),q={class:"card p-3"},Q={class:"flex justify-content-start pl-2"},J={class:"p-input-icon-left"},X=e("i",{class:"pi pi-search"},null,-1),Y=e("div",{class:"d-flex justify-content-around mt-5 w-full border-bottom pb-4"},[e("div",{class:"d-flex fw-bold justify-content-center align-items-center"},[e("h1",{class:"fw-bold mr-4"},"Half Day Minimum Working Hours Required"),e("button",{class:"btn bg-slate-300 mx-2 px-2 h-6 d-flex align-items-center"},"4"),e("h1",null,"Hours")]),e("div",{class:"d-flex fw-bold justify-content-center align-items-center"},[e("h1",{class:"fw-bold mr-4"},"Full Day Minimum Working Hours Required"),d(),e("button",{class:"btn bg-slate-300 mx-2 px-2 h-6 d-flex align-items-center"},"4"),e("h1",null,"Hours")])],-1),z=e("div",{class:"row d-flex align-items-center mt-2"},[e("div",{class:"col-2 col-sm"},[e("h1",{class:"fs-5"},"Grace Time")]),e("div",{class:"col-2 d-flex align-items-center"},[e("button",{class:"btn bg-slate-300 mx-2 px-2 h-6 d-flex align-items-center"},"30"),e("p",{class:"bg-gray"},"Minutes")]),e("div",{class:"col-5"},[e("p",{class:"text-danger bg-red-100 p-1 rounded"},"Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum numquam, maiores ")])],-1),Z=e("span",{class:"fs-5 pl-5"},"Employees",-1),ee={class:"card p-3"},te={class:"flex justify-content-start pl-2"},ae={class:"p-input-icon-left"},se=e("i",{class:"pi pi-search"},null,-1),oe=e("span",{class:"fs-5 pl-5"},"WeekOffs",-1),le={class:"card p-3"},ne={class:"flex justify-content-start pl-2"},re={class:"p-input-icon-left"},ie=e("i",{class:"pi pi-search"},null,-1),ce=e("span",{class:"fs-5 pl-5"},"Track Shift Versions",-1),de={class:"card p-3"},pe={class:"flex justify-content-start pl-2"},ue={class:"p-input-icon-left"},me=e("i",{class:"pi pi-search"},null,-1),fe={__name:"GeneralShift",setup(he){const f=h(0),r=h({global:{value:null,matchMode:i.CONTAINS},name:{value:null,matchMode:i.STARTS_WITH},"country.name":{value:null,matchMode:i.STARTS_WITH},representative:{value:null,matchMode:i.IN},status:{value:null,matchMode:i.EQUALS},verified:{value:null,matchMode:i.EQUALS}});return(_e,l)=>{const p=c("InputText"),o=c("Column"),u=c("DataTable"),m=c("AccordionTab"),_=c("Accordion");return v(),g("div",null,[E,t(_,{activeIndex:f.value,"onUpdate:activeIndex":l[4]||(l[4]=n=>f.value=n),class:"mt-4"},{default:s(()=>[t(m,{class:"fs-3"},{header:s(()=>[K]),default:s(()=>[e("div",q,[t(u,{paginator:"",rows:5,rowsPerPageOptions:[5,10,20,50],class:"w-full"},{header:s(()=>[e("div",Q,[e("span",J,[X,t(p,{modelValue:r.value.global.value,"onUpdate:modelValue":l[0]||(l[0]=n=>r.value.global.value=n),placeholder:"Keyword Search"},null,8,["modelValue"])])])]),empty:s(()=>[d(" No Matching Records Found ")]),default:s(()=>[t(o,{field:"name",header:"Timing",sortable:!0}),t(o,{field:"name",header:"Monday",sortable:!0}),t(o,{field:"name",header:"Tuesday",sortable:!0}),t(o,{field:"country.name",header:"Wednesday",sortable:!0}),t(o,{field:"company",header:"Thursday",sortable:!0}),t(o,{field:"representative.name",header:"Friday",sortable:!0}),t(o,{field:"company",header:"Saturday",sortable:!0}),t(o,{field:"company",header:"Sunday",sortable:!0})]),_:1}),Y,z])]),_:1}),t(m,null,{header:s(()=>[Z]),default:s(()=>[e("div",ee,[t(u,{paginator:"",rows:5,rowsPerPageOptions:[5,10,20,50],class:"w-full"},{header:s(()=>[e("div",te,[e("span",ae,[se,t(p,{modelValue:r.value.global.value,"onUpdate:modelValue":l[1]||(l[1]=n=>r.value.global.value=n),placeholder:"Keyword Search"},null,8,["modelValue"])])])]),empty:s(()=>[d(" No Matching Records Found ")]),default:s(()=>[t(o,{field:"name",header:"Employee",sortable:!0}),t(o,{field:"name",header:"Employee Number",sortable:!0}),t(o,{field:"name",header:"Job Title",sortable:!0}),t(o,{field:"country.name",header:"Reporting To",sortable:!0}),t(o,{field:"company",header:"Department",sortable:!0}),t(o,{field:"representative.name",header:"Loaction",sortable:!0})]),_:1})])]),_:1}),t(m,null,{header:s(()=>[oe]),default:s(()=>[e("div",le,[t(u,{paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],sortField:"PAYROLL_MONTH",sortOrder:-1,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",globalFilterFields:["name"],class:"w-full"},{header:s(()=>[e("div",ne,[e("span",re,[ie,t(p,{modelValue:r.value.global.value,"onUpdate:modelValue":l[2]||(l[2]=n=>r.value.global.value=n),placeholder:"Keyword Search"},null,8,["modelValue"])])])]),empty:s(()=>[d(" No Matching Records Found ")]),default:s(()=>[t(o,{field:"name",header:"Week Offs",sortable:!0}),t(o,{field:"name",header:"Day Offs",sortable:!0})]),_:1})])]),_:1}),t(m,null,{header:s(()=>[ce]),default:s(()=>[e("div",de,[t(u,{paginator:"",rows:5,rowsPerPageOptions:[5,10,20,50],class:"w-full"},{header:s(()=>[e("div",pe,[e("span",ue,[me,t(p,{modelValue:r.value.global.value,"onUpdate:modelValue":l[3]||(l[3]=n=>r.value.global.value=n),placeholder:"Keyword Search"},null,8,["modelValue"])])])]),empty:s(()=>[d(" No Matching Records Found ")]),default:s(()=>[t(o,{field:"name",header:"Current Date"}),t(o,{field:"name",header:"Updated Date"}),t(o,{field:"name",header:"Action"})]),_:1})])]),_:1})]),_:1},8,["activeIndex"])])}}},a=y(fe);a.use(x,{ripple:!0});a.use(I);a.use(T);a.use(F);a.directive("tooltip",N);a.directive("badge",C);a.directive("ripple",w);a.directive("styleclass",L);a.directive("focustrap",S);a.component("Button",P);a.component("DataTable",$);a.component("Column",k);a.component("ColumnGroup",H);a.component("Row",j);a.component("Toast",M);a.component("ConfirmDialog",R);a.component("Dropdown",V);a.component("InputText",D);a.component("Dialog",A);a.component("ProgressSpinner",O);a.component("Calendar",U);a.component("MultiSelect",G);a.component("Accordion",W);a.component("AccordionTab",B);a.mount("#General_Shift");
