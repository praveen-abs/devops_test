import{$ as m,_ as r}from"./toastservice.esm-b0df8430.js";const e=Symbol();function f(){const o=m(e);if(!o)throw new Error("No PrimeVue Confirmation provided!");return o}var s={install:o=>{const i={require:n=>{r.emit("confirm",n)},close:()=>{r.emit("close")}};o.config.globalProperties.$confirm=i,o.provide(e,i)}};export{s as C,f as u};
