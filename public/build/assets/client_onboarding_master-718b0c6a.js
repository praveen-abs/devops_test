/* empty css              *//* empty css                     *//* empty css                   */import{I as p,aj as d,g as n,o as r,b as m,w as _,h as a,c as u,d as t,J as b,P as f,K as h,u as v,L as g,R as C,S as y,x as w,y as $,M as P,Y as D,N as T,V as k,X as x,Q as L,W as S}from"./toastservice.esm-918560db.js";import{c as R}from"./pinia-3f44ac08.js";import"./blockui.esm-af7169c2.js";import{a as B}from"./datatable.esm-b98720f6.js";import{D as N,s as E}from"./dialogservice.esm-5dbb3ad8.js";import{C as I}from"./confirmationservice.esm-87248870.js";import{s as M}from"./progressspinner.esm-aabe5d1a.js";import{s as V}from"./row.esm-6ebc942e.js";import{s as O}from"./calendar.esm-b58ab31f.js";import{s as A}from"./textarea.esm-c5c6ba2f.js";import{s as F}from"./chips.esm-4c50bd29.js";import{s as K}from"./multiselect.esm-2ac860b7.js";import{s as j}from"./inputmask.esm-73e17188.js";import{a as G}from"./index-362795f3.js";import{_ as J}from"./client_onboarding-61600f8e.js";import"./index.esm-98aa4722.js";const Q={__name:"client_list",setup(c){const i=p([]);return d(()=>{G.get("/clients-fetchAll").then(s=>{console.log(s.data),i.value=s.data})}),(s,ae)=>{const o=n("Column"),l=n("DataTable");return r(),m(l,{ref:"dt",value:i.value,dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:_(()=>[a(o,{header:"Client Code",field:"client_code",style:{"min-width":"8rem"}}),a(o,{field:"client_name",header:"Client Name",style:{"min-width":"12rem"}}),a(o,{field:"authorised_person_contact_number",header:"Contact ",style:{"min-width":"12rem"}}),a(o,{field:"authorised_person_contact_email",header:"Email",style:{"min-width":"12rem"}}),a(o,{field:"contract_start_date",header:"Contract End Date",style:{"min-width":"12rem"}}),a(o,{field:"contract_end_date",header:"Contract End Date",style:{"min-width":"12rem"}}),a(o,{field:"subscription_type",header:"Subscription Type'",style:{"min-width":"12rem"}})]),_:1},8,["value"])}}},W={class:"client-onboard-wrapper"},X=t("div",{class:"mb-2 card left-line"},[t("div",{class:"pt-1 pb-0 card-body"},[t("ul",{class:"nav nav-pills nav-tabs-dashed",id:"pills-tab",role:"tablist"},[t("li",{class:"nav-item me-5",role:"presentation"},[t("a",{class:"nav-link active",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#client-list",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Client List ")]),t("li",{class:"nav-item",role:"presentation"},[t("a",{class:"nav-link",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#client-onboarding",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Client Onboarding ")])])])],-1),Y={class:"tab-content",id:"pills-tabContent"},q={class:"tab-pane fade active show",id:"client-list",role:"tabpanel","aria-labelledby":""},z={class:"card"},H={class:"card-body"},U={class:"table-responsive"},Z={class:"tab-pane fade",id:"client-onboarding",role:"tabpanel","aria-labelledby":""},ee={__name:"client_onboarding_master",setup(c){return(i,s)=>(r(),u("div",W,[X,t("div",Y,[t("div",q,[t("div",z,[t("div",H,[t("div",U,[a(Q)])])])]),t("div",Z,[a(J)])])]))}},e=b(ee),te=R();e.use(f,{ripple:!0});e.use(I);e.use(h);e.use(N);e.use(te);e.directive("tooltip",v);e.directive("badge",g);e.directive("ripple",C);e.directive("styleclass",y);e.directive("focustrap",w);e.component("Button",$);e.component("DataTable",B);e.component("Column",P);e.component("ColumnGroup",E);e.component("Row",V);e.component("Toast",D);e.component("ConfirmDialog",T);e.component("Dropdown",k);e.component("InputText",x);e.component("Dialog",L);e.component("ProgressSpinner",M);e.component("Calendar",O);e.component("Textarea",A);e.component("Chips",F);e.component("MultiSelect",K);e.component("InputNumber",S);e.component("InputMask",j);e.mount("#clientOnboarding");
