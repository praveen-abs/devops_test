/* empty css                  *//* empty css              */import{G as p,S as d,g as n,o as r,b as m,w as _,h as a,c as u,d as t,H as b,P as f,I as h,R as v,u as g,v as C,M as y,J as w,L as $,A as P,K as T}from"./toastservice.esm-6ab5f57c.js";import{c as D}from"./pinia-85c4361b.js";import{T as k,B as S,S as L,b as x,a as R,c as B}from"./styleclass.esm-9e259b99.js";import"./blockui.esm-da4dd4e3.js";import{D as N}from"./dialogservice.esm-052c1ef4.js";import{C as E}from"./confirmationservice.esm-91ab80c8.js";import{s as I}from"./progressspinner.esm-34a6e341.js";import{s as M}from"./row.esm-6ebc942e.js";import{s as A}from"./columngroup.esm-9dd1458e.js";import{s as O}from"./calendar.esm-2f67a089.js";import{s as V}from"./textarea.esm-77fe0c5f.js";import{s as F}from"./chips.esm-45ea52c9.js";import{s as G}from"./multiselect.esm-38d3f14b.js";import{s as K}from"./inputmask.esm-2b394a42.js";import{a as H}from"./index-0d903406.js";import{_ as J}from"./client_onboarding-6018d787.js";import"./index.esm-dcf66766.js";const j={__name:"client_list",setup(c){const i=p([]);return d(()=>{H.get("/clients-fetchAll").then(s=>{console.log(s.data),i.value=s.data})}),(s,ae)=>{const o=n("Column"),l=n("DataTable");return r(),m(l,{ref:"dt",value:i.value,dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:_(()=>[a(o,{header:"Client Code",field:"client_code",style:{"min-width":"8rem"}}),a(o,{field:"client_name",header:"Client Name",style:{"min-width":"12rem"}}),a(o,{field:"authorised_person_contact_number",header:"Contact ",style:{"min-width":"12rem"}}),a(o,{field:"authorised_person_contact_email",header:"Email",style:{"min-width":"12rem"}}),a(o,{field:"contract_start_date",header:"Contract End Date",style:{"min-width":"12rem"}}),a(o,{field:"contract_end_date",header:"Contract End Date",style:{"min-width":"12rem"}}),a(o,{field:"subscription_type",header:"Subscription Type'",style:{"min-width":"12rem"}})]),_:1},8,["value"])}}},q={class:"client-onboard-wrapper mt-30"},z=t("div",{class:"mb-2 card left-line"},[t("div",{class:"pt-1 pb-0 card-body"},[t("ul",{class:"nav nav-pills nav-tabs-dashed",id:"pills-tab",role:"tablist"},[t("li",{class:"nav-item me-5",role:"presentation"},[t("a",{class:"nav-link active",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#client-list",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Client List ")]),t("li",{class:"nav-item",role:"presentation"},[t("a",{class:"nav-link",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#client-onboarding",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Client Onboarding ")])])])],-1),Q={class:"tab-content",id:"pills-tabContent"},U={class:"tab-pane fade active show",id:"client-list",role:"tabpanel","aria-labelledby":""},W={class:"card"},X={class:"card-body"},Y={class:"table-responsive"},Z={class:"tab-pane fade",id:"client-onboarding",role:"tabpanel","aria-labelledby":""},ee={__name:"client_onboarding_master",setup(c){return(i,s)=>(r(),u("div",q,[z,t("div",Q,[t("div",U,[t("div",W,[t("div",X,[t("div",Y,[a(j)])])])]),t("div",Z,[a(J)])])]))}},e=b(ee),te=D();e.use(f,{ripple:!0});e.use(E);e.use(h);e.use(N);e.use(te);e.directive("tooltip",k);e.directive("badge",S);e.directive("ripple",v);e.directive("styleclass",L);e.directive("focustrap",g);e.component("Button",C);e.component("DataTable",x);e.component("Column",R);e.component("ColumnGroup",A);e.component("Row",M);e.component("Toast",y);e.component("ConfirmDialog",w);e.component("Dropdown",$);e.component("InputText",P);e.component("Dialog",T);e.component("ProgressSpinner",I);e.component("Calendar",O);e.component("Textarea",V);e.component("Chips",F);e.component("MultiSelect",G);e.component("InputNumber",B);e.component("InputMask",K);e.mount("#clientOnboarding");
