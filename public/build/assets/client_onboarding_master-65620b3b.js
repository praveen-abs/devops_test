/* empty css              *//* empty css                     *//* empty css                   */import{Q as p,ab as d,g as n,o as r,b as m,w as _,h as a,c as u,d as t,H as b,P as f,R as h,u as v,x as g,I as C,K as y,M as w,J as $,L as P}from"./inputnumber.esm-e362c3ab.js";import{c as T}from"./pinia-641035e3.js";import{a as D,T as k,B as x,S as L,b as S,s as R}from"./toastservice.esm-8d63d505.js";import"./blockui.esm-da95937b.js";import{a as B}from"./datatable.esm-5f85e77a.js";import{D as N,s as E}from"./dialogservice.esm-acafdb8a.js";import{C as I}from"./confirmationservice.esm-62abe3ae.js";import{s as M}from"./progressspinner.esm-dd1a9f95.js";import{s as O}from"./row.esm-6ebc942e.js";import{s as V}from"./calendar.esm-871de032.js";import{s as A}from"./textarea.esm-36dc9b1f.js";import{s as F}from"./chips.esm-94e18b40.js";import{s as K}from"./multiselect.esm-774f4ea4.js";import{s as G}from"./inputmask.esm-1fbc333c.js";import{a as H}from"./index-362795f3.js";import{_ as J}from"./client_onboarding-e16fb72f.js";import"./index.esm-016f75ea.js";const Q={__name:"client_list",setup(c){const i=p([]);return d(()=>{H.get("/clients-fetchAll").then(s=>{console.log(s.data),i.value=s.data})}),(s,ae)=>{const o=n("Column"),l=n("DataTable");return r(),m(l,{ref:"dt",value:i.value,dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:_(()=>[a(o,{header:"Client Code",field:"client_code",style:{"min-width":"8rem"}}),a(o,{field:"client_name",header:"Client Name",style:{"min-width":"12rem"}}),a(o,{field:"authorised_person_contact_number",header:"Contact ",style:{"min-width":"12rem"}}),a(o,{field:"authorised_person_contact_email",header:"Email",style:{"min-width":"12rem"}}),a(o,{field:"contract_start_date",header:"Contract End Date",style:{"min-width":"12rem"}}),a(o,{field:"contract_end_date",header:"Contract End Date",style:{"min-width":"12rem"}}),a(o,{field:"subscription_type",header:"Subscription Type'",style:{"min-width":"12rem"}})]),_:1},8,["value"])}}},j={class:"client-onboard-wrapper"},q=t("div",{class:"mb-2 card left-line"},[t("div",{class:"pt-1 pb-0 card-body"},[t("ul",{class:"nav nav-pills nav-tabs-dashed",id:"pills-tab",role:"tablist"},[t("li",{class:"nav-item me-5",role:"presentation"},[t("a",{class:"nav-link active",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#client-list",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Client List ")]),t("li",{class:"nav-item",role:"presentation"},[t("a",{class:"nav-link",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#client-onboarding",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Client Onboarding ")])])])],-1),z={class:"tab-content",id:"pills-tabContent"},U={class:"tab-pane fade active show",id:"client-list",role:"tabpanel","aria-labelledby":""},W={class:"card"},X={class:"card-body"},Y={class:"table-responsive"},Z={class:"tab-pane fade",id:"client-onboarding",role:"tabpanel","aria-labelledby":""},ee={__name:"client_onboarding_master",setup(c){return(i,s)=>(r(),u("div",j,[q,t("div",z,[t("div",U,[t("div",W,[t("div",X,[t("div",Y,[a(Q)])])])]),t("div",Z,[a(J)])])]))}},e=b(ee),te=T();e.use(f,{ripple:!0});e.use(I);e.use(D);e.use(N);e.use(te);e.directive("tooltip",k);e.directive("badge",x);e.directive("ripple",h);e.directive("styleclass",L);e.directive("focustrap",v);e.component("Button",g);e.component("DataTable",B);e.component("Column",C);e.component("ColumnGroup",E);e.component("Row",O);e.component("Toast",S);e.component("ConfirmDialog",R);e.component("Dropdown",y);e.component("InputText",w);e.component("Dialog",$);e.component("ProgressSpinner",M);e.component("Calendar",V);e.component("Textarea",A);e.component("Chips",F);e.component("MultiSelect",K);e.component("InputNumber",P);e.component("InputMask",G);e.mount("#clientOnboarding");
