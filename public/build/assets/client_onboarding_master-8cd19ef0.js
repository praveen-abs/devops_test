/* empty css              */import{$ as p,I as d,g as n,o as r,b as m,w as _,h as a,c as u,d as t,J as b,P as f,K as h,u as v,L as g,R as C,S as y,x as $,y as w,M as P,Y as D,N as T,V as k,X as x,Q as L,W as S}from"./toastservice.esm-1e4d76cb.js";import{c as R}from"./pinia-1a7bd30b.js";import"./blockui.esm-bdb9f2eb.js";import{a as B}from"./datatable.esm-9c853c0e.js";import{D as N,s as E}from"./dialogservice.esm-26300ede.js";import{C as I}from"./confirmationservice.esm-1279fa60.js";import{s as M}from"./progressspinner.esm-ef10595a.js";import{s as V}from"./row.esm-6ebc942e.js";import{s as O}from"./calendar.esm-6d8a31db.js";import{s as A}from"./textarea.esm-eee751d2.js";import{s as F}from"./chips.esm-720db77e.js";import{s as K}from"./multiselect.esm-dfed7e35.js";import{s as G}from"./inputmask.esm-facdd3b2.js";import{a as J}from"./index-362795f3.js";import{_ as Q}from"./client_onboarding-959548a4.js";import"./index.esm-748e4f80.js";const W={__name:"client_list",setup(c){const i=p([]);return d(()=>{J.get("/clients-fetchAll").then(s=>{console.log(s.data),i.value=s.data})}),(s,ae)=>{const o=n("Column"),l=n("DataTable");return r(),m(l,{ref:"dt",value:i.value,dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:_(()=>[a(o,{header:"Client Code",field:"client_code",style:{"min-width":"8rem"}}),a(o,{field:"client_name",header:"Client Name",style:{"min-width":"12rem"}}),a(o,{field:"authorised_person_contact_number",header:"Contact ",style:{"min-width":"12rem"}}),a(o,{field:"authorised_person_contact_email",header:"Email",style:{"min-width":"12rem"}}),a(o,{field:"contract_start_date",header:"Contract End Date",style:{"min-width":"12rem"}}),a(o,{field:"contract_end_date",header:"Contract End Date",style:{"min-width":"12rem"}}),a(o,{field:"subscription_type",header:"Subscription Type'",style:{"min-width":"12rem"}})]),_:1},8,["value"])}}},X={class:"client-onboard-wrapper"},Y=t("div",{class:"mb-2 card left-line"},[t("div",{class:"pt-1 pb-0 card-body"},[t("ul",{class:"nav nav-pills nav-tabs-dashed",id:"pills-tab",role:"tablist"},[t("li",{class:"nav-item me-5",role:"presentation"},[t("a",{class:"nav-link active",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#client-list",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Client List ")]),t("li",{class:"nav-item",role:"presentation"},[t("a",{class:"nav-link",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#client-onboarding",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Client Onboarding ")])])])],-1),j={class:"tab-content",id:"pills-tabContent"},q={class:"tab-pane fade active show",id:"client-list",role:"tabpanel","aria-labelledby":""},z={class:"card"},H={class:"card-body"},U={class:"table-responsive"},Z={class:"tab-pane fade",id:"client-onboarding",role:"tabpanel","aria-labelledby":""},ee={__name:"client_onboarding_master",setup(c){return(i,s)=>(r(),u("div",X,[Y,t("div",j,[t("div",q,[t("div",z,[t("div",H,[t("div",U,[a(W)])])])]),t("div",Z,[a(Q)])])]))}},e=b(ee),te=R();e.use(f,{ripple:!0});e.use(I);e.use(h);e.use(N);e.use(te);e.directive("tooltip",v);e.directive("badge",g);e.directive("ripple",C);e.directive("styleclass",y);e.directive("focustrap",$);e.component("Button",w);e.component("DataTable",B);e.component("Column",P);e.component("ColumnGroup",E);e.component("Row",V);e.component("Toast",D);e.component("ConfirmDialog",T);e.component("Dropdown",k);e.component("InputText",x);e.component("Dialog",L);e.component("ProgressSpinner",M);e.component("Calendar",O);e.component("Textarea",A);e.component("Chips",F);e.component("MultiSelect",K);e.component("InputNumber",S);e.component("InputMask",G);e.mount("#clientOnboarding");