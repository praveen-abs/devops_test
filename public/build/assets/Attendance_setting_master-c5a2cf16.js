import{B as f,c as a,e as s,n as i,j as c,h as l,a as r,o as n,g as m,G as g,P as x,H as $,R as k,q as C}from"./toastservice.esm-c719b254.js";import{T as y,B as b,S as T,b as h,a as B}from"./styleclass.esm-abc35d43.js";import"./blockui.esm-3f60d243.js";import{C as D,F as S,b as w,s as R,a as V}from"./inputtext.esm-af9c7539.js";import{s as A}from"./confirmdialog.esm-a2dedb11.js";import{D as N}from"./dialogservice.esm-70a0315e.js";import{s as G}from"./toast.esm-d0b492e3.js";import{s as P}from"./progressspinner.esm-bd35d97e.js";import{s as j}from"./row.esm-6ebc942e.js";import{s as E}from"./columngroup.esm-9dd1458e.js";import{_ as F}from"./Att_AssignWorkShifts-29506870.js";import"./index-f7a317fc.js";const H={class:"w-full"},M={class:"w-full tabs"},q=s("div",{class:"md:text-sm",style:{width:"25px"}},"1",-1),z=s("div",null,"2",-1),I=s("div",null,"3",-1),L=s("div",null,"4",-1),W=s("div",null,"5",-1),J={class:"bg-white rounded-md"},K={key:0,class:"tabcontent"},O={key:1,class:"tabcontent"},Q={key:2,class:"tabcontent"},U={key:3,class:"tabcontent"},X={key:4,class:"tabcontent"},Y={__name:"Attendance_setting_Master",setup(Z){const e=f(1);return(tt,o)=>{const d=m("pf_esi"),_=m("salary_components"),v=m("salart_structure"),u=m("finance_setting");return n(),a("div",H,[s("div",M,[s("a",{class:i(["col-lg-2 col-xl-2 col-md-2 d-flex",[e.value===1?"active":""]]),onClick:o[0]||(o[0]=p=>e.value=1)},[q,c("Shift Details")],2),s("a",{class:i(["col-lg-2 col-xl-2 col-md-2 d-flex",[e.value===2?"active":""]]),onClick:o[1]||(o[1]=p=>e.value=2)},[z,c("Shift Time Range")],2),s("a",{class:i(["col-lg-2 col-xl-2 col-md-2 d-flex",[e.value===3?"active":""]]),onClick:o[2]||(o[2]=p=>e.value=3)},[I,c("Break Time Range")],2),s("a",{class:i(["col-lg-2 col-xl-2 col-md-2 d-flex",[e.value===4?"active":""]]),onClick:o[3]||(o[3]=p=>e.value=4)},[L,c("Working Hours")],2),s("a",{class:i(["col-lg-2 col-xl-2 col-md-3 d-flex",[e.value===5?"active":""]]),onClick:o[4]||(o[4]=p=>e.value=5)},[W,c("Late&Early Going ")],2)]),s("div",J,[e.value===1?(n(),a("div",K,[l(F)])):r("",!0),e.value===2?(n(),a("div",O,[l(d)])):r("",!0),e.value===3?(n(),a("div",Q,[l(_)])):r("",!0),e.value===4?(n(),a("div",U,[l(v)])):r("",!0),e.value===5?(n(),a("div",X,[l(u)])):r("",!0)])])}}},t=g(Y);t.use(x,{ripple:!0});t.use(D);t.use($);t.use(N);t.directive("tooltip",y);t.directive("badge",b);t.directive("ripple",k);t.directive("styleclass",T);t.directive("focustrap",S);t.component("Button",C);t.component("DataTable",h);t.component("Column",B);t.component("ColumnGroup",E);t.component("Row",j);t.component("Toast",G);t.component("ConfirmDialog",A);t.component("Dropdown",w);t.component("InputText",R);t.component("Dialog",V);t.component("ProgressSpinner",P);t.mount("#vjs_Attendance_master");
