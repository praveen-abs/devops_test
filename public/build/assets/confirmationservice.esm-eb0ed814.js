import{$ as m,ab as r}from"./toastservice.esm-23c43048.js";const e=Symbol();function f(){const o=m(e);if(!o)throw new Error("No PrimeVue Confirmation provided!");return o}var s={install:o=>{const i={require:n=>{r.emit("confirm",n)},close:()=>{r.emit("close")}};o.config.globalProperties.$confirm=i,o.provide(e,i)}};export{s as C,f as u};
