import{A as l,V as s}from"./toastservice.esm-a485217a.js";const c=Symbol();var t=l(),g={install:e=>{const i={open:(r,a)=>{const o={content:r&&s(r),options:a||{},data:a&&a.data,close:n=>{t.emit("close",{instance:o,params:n})}};return t.emit("open",{instance:o}),o}};e.config.unwrapInjectedRef=!0,e.config.globalProperties.$dialog=i,e.provide(c,i)}};export{g as D,t as a};
