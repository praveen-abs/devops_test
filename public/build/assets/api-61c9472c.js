import{a as n}from"./index-362795f3.js";import{r as t,o as s}from"./app-e27ee384.js";const f={__name:"api",setup(c){const r=t([]),o=t(!0),e=async()=>{try{const a=await n.get("http://115.240.254.90:81/iclock/Main.aspx");r.value=a.data}catch(a){console.error("Error fetching data:",a)}finally{o.value=!1}};return s(()=>{e()}),(a,i)=>null}};export{f as default};
