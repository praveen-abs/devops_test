/* empty css          *//* empty css                 *//* empty css               */import{a0 as p,ak as d,g as n,o as r,b as m,w as _,h as a,c as u,d as t,K as b,P as f,L as h,u as v,M as g,R as C,S as y,x as w,y as $,N as P,_ as k,Q as D,W as T,Y as x,V as L,X as S}from"./toastservice.esm78544.js";import{c as R}from"./pinia78544.js";import"./blockui.esm78544.js";import{a as B}from"./datatable.esm78544.js";import{D as N,s as E}from"./dialogservice.esm78544.js";import{C as M}from"./confirmationservice.esm78544.js";import{s as V}from"./progressspinner.esm78544.js";import{s as I}from"./row.esm78544.js";import{s as O}from"./calendar.esm78544.js";import{s as A}from"./textarea.esm78544.js";import{s as F}from"./chips.esm78544.js";import{s as K}from"./multiselect.esm78544.js";import{s as G}from"./inputmask.esm78544.js";import{a as Q}from"./index78544.js";import{_ as W}from"./client_onboarding78544.js";import"./index.esm78544.js";const X={__name:"client_list",setup(c){const i=p([]);return d(()=>{Q.get("/clients-fetchAll").then(s=>{console.log(s.data),i.value=s.data})}),(s,ae)=>{const o=n("Column"),l=n("DataTable");return r(),m(l,{ref:"dt",value:i.value,dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:_(()=>[a(o,{header:"Client Code",field:"client_code",style:{"min-width":"8rem"}}),a(o,{field:"client_name",header:"Client Name",style:{"min-width":"12rem"}}),a(o,{field:"authorised_person_contact_number",header:"Contact ",style:{"min-width":"12rem"}}),a(o,{field:"authorised_person_contact_email",header:"Email",style:{"min-width":"12rem"}}),a(o,{field:"contract_start_date",header:"Contract End Date",style:{"min-width":"12rem"}}),a(o,{field:"contract_end_date",header:"Contract End Date",style:{"min-width":"12rem"}}),a(o,{field:"subscription_type",header:"Subscription Type'",style:{"min-width":"12rem"}})]),_:1},8,["value"])}}},Y={class:"client-onboard-wrapper"},j=t("div",{class:"mb-2 card left-line"},[t("div",{class:"pt-1 pb-0 card-body"},[t("ul",{class:"nav nav-pills nav-tabs-dashed",id:"pills-tab",role:"tablist"},[t("li",{class:"nav-item me-5",role:"presentation"},[t("a",{class:"nav-link active",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#client-list",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Client List ")]),t("li",{class:"nav-item",role:"presentation"},[t("a",{class:"nav-link",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#client-onboarding",role:"tab","aria-controls":"pills-home","aria-selected":"true"}," Client Onboarding ")])])])],-1),q={class:"tab-content",id:"pills-tabContent"},z={class:"tab-pane fade active show",id:"client-list",role:"tabpanel","aria-labelledby":""},H={class:"card"},J={class:"card-body"},U={class:"table-responsive"},Z={class:"tab-pane fade",id:"client-onboarding",role:"tabpanel","aria-labelledby":""},ee={__name:"client_onboarding_master",setup(c){return(i,s)=>(r(),u("div",Y,[j,t("div",q,[t("div",z,[t("div",H,[t("div",J,[t("div",U,[a(X)])])])]),t("div",Z,[a(W)])])]))}},e=b(ee),te=R();e.use(f,{ripple:!0});e.use(M);e.use(h);e.use(N);e.use(te);e.directive("tooltip",v);e.directive("badge",g);e.directive("ripple",C);e.directive("styleclass",y);e.directive("focustrap",w);e.component("Button",$);e.component("DataTable",B);e.component("Column",P);e.component("ColumnGroup",E);e.component("Row",I);e.component("Toast",k);e.component("ConfirmDialog",D);e.component("Dropdown",T);e.component("InputText",x);e.component("Dialog",L);e.component("ProgressSpinner",V);e.component("Calendar",O);e.component("Textarea",A);e.component("Chips",F);e.component("MultiSelect",K);e.component("InputNumber",S);e.component("InputMask",G);e.mount("#clientOnboarding");
