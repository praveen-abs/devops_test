import{a0 as m,ac as r}from"./toastservice.esm-daaadd68.js";const e=Symbol();function c(){const o=m(e);if(!o)throw new Error("No PrimeVue Confirmation provided!");return o}var f={install:o=>{const i={require:n=>{r.emit("confirm",n)},close:()=>{r.emit("close")}};o.config.globalProperties.$confirm=i,o.provide(e,i)}};export{f as C,c as u};
