import{N as H,Q as N,S as k,V as U,W as Z,X as L,Y as W,_ as $,$ as G,a0 as A,a1 as T,a2 as tt,a3 as et,a4 as st,a5 as nt}from"./inputnumber.esm-e362c3ab.js";var ct=!1;/*!
  * pinia v2.0.35
  * (c) 2023 Eduardo San Martin Morote
  * @license MIT
  */let B;const R=t=>B=t,D=Symbol();function C(t){return t&&typeof t=="object"&&Object.prototype.toString.call(t)==="[object Object]"&&typeof t.toJSON!="function"}var I;(function(t){t.direct="direct",t.patchObject="patch object",t.patchFunction="patch function"})(I||(I={}));function it(){const t=H(!0),c=t.run(()=>N({}));let s=[],e=[];const r=k({install(u){R(r),r._a=u,u.provide(D,r),u.config.globalProperties.$pinia=r,e.forEach(f=>s.push(f)),e=[]},use(u){return!this._a&&!ct?e.push(u):s.push(u),this},_p:s,_a:null,_e:t,_s:new Map,state:c});return r}const J=()=>{};function F(t,c,s,e=J){t.push(c);const r=()=>{const u=t.indexOf(c);u>-1&&(t.splice(u,1),e())};return!s&&A()&&T(r),r}function j(t,...c){t.slice().forEach(s=>{s(...c)})}function x(t,c){t instanceof Map&&c instanceof Map&&c.forEach((s,e)=>t.set(e,s)),t instanceof Set&&c instanceof Set&&c.forEach(t.add,t);for(const s in c){if(!c.hasOwnProperty(s))continue;const e=c[s],r=t[s];C(r)&&C(e)&&t.hasOwnProperty(s)&&!L(e)&&!W(e)?t[s]=x(r,e):t[s]=e}return t}const ot=Symbol();function rt(t){return!C(t)||!t.hasOwnProperty(ot)}const{assign:v}=Object;function ut(t){return!!(L(t)&&t.effect)}function at(t,c,s,e){const{state:r,actions:u,getters:f}=c,a=s.state.value[t];let P;function b(){a||(s.state.value[t]=r?r():{});const y=st(s.state.value[t]);return v(y,u,Object.keys(f||{}).reduce((d,m)=>(d[m]=k(nt(()=>{R(s);const _=s._s.get(t);return f[m].call(_,_)})),d),{}))}return P=Q(t,b,c,s,e,!0),P}function Q(t,c,s={},e,r,u){let f;const a=v({actions:{}},s),P={deep:!0};let b,y,d=k([]),m=k([]),_;const p=e.state.value[t];!u&&!p&&(e.state.value[t]={}),N({});let O;function V(o){let n;b=y=!1,typeof o=="function"?(o(e.state.value[t]),n={type:I.patchFunction,storeId:t,events:_}):(x(e.state.value[t],o),n={type:I.patchObject,payload:o,storeId:t,events:_});const h=O=Symbol();tt().then(()=>{O===h&&(b=!0)}),y=!0,j(d,n,e.state.value[t])}const X=u?function(){const{state:n}=s,h=n?n():{};this.$patch(S=>{v(S,h)})}:J;function Y(){f.stop(),d=[],m=[],e._s.delete(t)}function q(o,n){return function(){R(e);const h=Array.from(arguments),S=[],w=[];function K(i){S.push(i)}function M(i){w.push(i)}j(m,{args:h,name:o,store:l,after:K,onError:M});let E;try{E=n.apply(this&&this.$id===t?this:l,h)}catch(i){throw j(w,i),i}return E instanceof Promise?E.then(i=>(j(S,i),i)).catch(i=>(j(w,i),Promise.reject(i))):(j(S,E),E)}}const z={_p:e,$id:t,$onAction:F.bind(null,m),$patch:V,$reset:X,$subscribe(o,n={}){const h=F(d,o,n.detached,()=>S()),S=f.run(()=>U(()=>e.state.value[t],w=>{(n.flush==="sync"?y:b)&&o({storeId:t,type:I.direct,events:_},w)},v({},P,n)));return h},$dispose:Y},l=Z(z);e._s.set(t,l);const g=e._e.run(()=>(f=H(),f.run(()=>c())));for(const o in g){const n=g[o];if(L(n)&&!ut(n)||W(n))u||(p&&rt(n)&&(L(n)?n.value=p[o]:x(n,p[o])),e.state.value[t][o]=n);else if(typeof n=="function"){const h=q(o,n);g[o]=h,a.actions[o]=n}}return v(l,g),v($(l),g),Object.defineProperty(l,"$state",{get:()=>e.state.value[t],set:o=>{V(n=>{v(n,o)})}}),e._p.forEach(o=>{v(l,f.run(()=>o({store:l,app:e._a,pinia:e,options:a})))}),p&&u&&s.hydrate&&s.hydrate(l.$state,p),b=!0,y=!0,l}function lt(t,c,s){let e,r;const u=typeof c=="function";typeof t=="string"?(e=t,r=u?s:c):(r=t,e=t.id);function f(a,P){const b=et();return a=a||b&&G(D,null),a&&R(a),a=B,a._s.has(e)||(u?Q(e,c,r,a):at(e,r,a)),a._s.get(e)}return f.$id=e,f}export{it as c,lt as d};