import{C as i}from"./toastservice.esm-c9da6ad1.js";import{$ as m}from"./inputnumber.esm-a7c5b1f0.js";const e=Symbol();function s(){const o=m(e);if(!o)throw new Error("No PrimeVue Confirmation provided!");return o}var c={install:o=>{const r={require:n=>{i.emit("confirm",n)},close:()=>{i.emit("close")}};o.config.globalProperties.$confirm=r,o.provide(e,r)}};export{c as C,s as u};
