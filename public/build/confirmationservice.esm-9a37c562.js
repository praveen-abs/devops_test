import{C as i}from"./toastservice.esm-9d3b5dc9.js";import{$ as m}from"./inputnumber.esm-5d69a21b.js";const e=Symbol();function s(){const o=m(e);if(!o)throw new Error("No PrimeVue Confirmation provided!");return o}var c={install:o=>{const r={require:n=>{i.emit("confirm",n)},close:()=>{i.emit("close")}};o.config.globalProperties.$confirm=r,o.provide(e,r)}};export{c as C,s as u};