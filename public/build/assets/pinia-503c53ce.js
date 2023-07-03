import{a5 as H,G as B,a0 as k,a6 as X,a1 as Y,a7 as L,a8 as D,a9 as Z,$,aa as A,ab as T,ac as tt,ad as et,ae as st,af as nt}from"./toastservice.esm-ed3188be.js";var ct=!1;/*!
  * pinia v2.0.35
  * (c) 2023 Eduardo San Martin Morote
  * @license MIT
  */let J;const R=t=>J=t,N=Symbol();function C(t){return t&&typeof t=="object"&&Object.prototype.toString.call(t)==="[object Object]"&&typeof t.toJSON!="function"}var I;(function(t){t.direct="direct",t.patchObject="patch object",t.patchFunction="patch function"})(I||(I={}));function it(){const t=H(!0),c=t.run(()=>B({}));let s=[],e=[];const r=k({install(u){R(r),r._a=u,u.provide(N,r),u.config.globalProperties.$pinia=r,e.forEach(f=>s.push(f)),e=[]},use(u){return!this._a&&!ct?e.push(u):s.push(u),this},_p:s,_a:null,_e:t,_s:new Map,state:c});return r}const W=()=>{};function V(t,c,s,e=W){t.push(c);const r=()=>{const u=t.indexOf(c);u>-1&&(t.splice(u,1),e())};return!s&&A()&&T(r),r}function j(t,...c){t.slice().forEach(s=>{s(...c)})}function x(t,c){t instanceof Map&&c instanceof Map&&c.forEach((s,e)=>t.set(e,s)),t instanceof Set&&c instanceof Set&&c.forEach(t.add,t);for(const s in c){if(!c.hasOwnProperty(s))continue;const e=c[s],r=t[s];C(r)&&C(e)&&t.hasOwnProperty(s)&&!L(e)&&!D(e)?t[s]=x(r,e):t[s]=e}return t}const ot=Symbol();function rt(t){return!C(t)||!t.hasOwnProperty(ot)}const{assign:v}=Object;function ut(t){return!!(L(t)&&t.effect)}function at(t,c,s,e){const{state:r,actions:u,getters:f}=c,a=s.state.value[t];let P;function b(){a||(s.state.value[t]=r?r():{});const y=st(s.state.value[t]);return v(y,u,Object.keys(f||{}).reduce((d,m)=>(d[m]=k(nt(()=>{R(s);const _=s._s.get(t);return f[m].call(_,_)})),d),{}))}return P=q(t,b,c,s,e,!0),P}function q(t,c,s={},e,r,u){let f;const a=v({actions:{}},s),P={deep:!0};let b,y,d=k([]),m=k([]),_;const p=e.state.value[t];!u&&!p&&(e.state.value[t]={}),B({});let O;function F(o){let n;b=y=!1,typeof o=="function"?(o(e.state.value[t]),n={type:I.patchFunction,storeId:t,events:_}):(x(e.state.value[t],o),n={type:I.patchObject,payload:o,storeId:t,events:_});const h=O=Symbol();tt().then(()=>{O===h&&(b=!0)}),y=!0,j(d,n,e.state.value[t])}const z=u?function(){const{state:n}=s,h=n?n():{};this.$patch(S=>{v(S,h)})}:W;function G(){f.stop(),d=[],m=[],e._s.delete(t)}function K(o,n){return function(){R(e);const h=Array.from(arguments),S=[],w=[];function Q(i){S.push(i)}function U(i){w.push(i)}j(m,{args:h,name:o,store:l,after:Q,onError:U});let E;try{E=n.apply(this&&this.$id===t?this:l,h)}catch(i){throw j(w,i),i}return E instanceof Promise?E.then(i=>(j(S,i),i)).catch(i=>(j(w,i),Promise.reject(i))):(j(S,E),E)}}const M={_p:e,$id:t,$onAction:V.bind(null,m),$patch:F,$reset:z,$subscribe(o,n={}){const h=V(d,o,n.detached,()=>S()),S=f.run(()=>X(()=>e.state.value[t],w=>{(n.flush==="sync"?y:b)&&o({storeId:t,type:I.direct,events:_},w)},v({},P,n)));return h},$dispose:G},l=Y(M);e._s.set(t,l);const g=e._e.run(()=>(f=H(),f.run(()=>c())));for(const o in g){const n=g[o];if(L(n)&&!ut(n)||D(n))u||(p&&rt(n)&&(L(n)?n.value=p[o]:x(n,p[o])),e.state.value[t][o]=n);else if(typeof n=="function"){const h=K(o,n);g[o]=h,a.actions[o]=n}}return v(l,g),v(Z(l),g),Object.defineProperty(l,"$state",{get:()=>e.state.value[t],set:o=>{F(n=>{v(n,o)})}}),e._p.forEach(o=>{v(l,f.run(()=>o({store:l,app:e._a,pinia:e,options:a})))}),p&&u&&s.hydrate&&s.hydrate(l.$state,p),b=!0,y=!0,l}function lt(t,c,s){let e,r;const u=typeof c=="function";typeof t=="string"?(e=t,r=u?s:c):(r=t,e=t.id);function f(a,P){const b=et();return a=a||b&&$(N,null),a&&R(a),a=J,a._s.has(e)||(u?q(e,c,r,a):at(e,r,a)),a._s.get(e)}return f.$id=e,f}export{it as c,lt as d};
