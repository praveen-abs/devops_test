import{A as c,ac as l}from"./toastservice.esm-b26453f6.js";const s=Symbol();var t=c(),g={install:e=>{const i={open:(r,a)=>{const o={content:r&&l(r),options:a||{},data:a&&a.data,close:n=>{t.emit("close",{instance:o,params:n})}};return t.emit("open",{instance:o}),o}};e.config.unwrapInjectedRef=!0,e.config.globalProperties.$dialog=i,e.provide(s,i)}};export{g as D,t as a};
