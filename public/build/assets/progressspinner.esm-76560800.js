<<<<<<<< HEAD:public/build/assets/progressspinner.esm-428ecd71.js
import{o as s,c as o,q as l,d as p}from"./toastservice.esm-daaadd68.js";var d={name:"ProgressSpinner",props:{strokeWidth:{type:String,default:"2"},fill:{type:String,default:"none"},animationDuration:{type:String,default:"2s"}},computed:{svgStyle(){return{"animation-duration":this.animationDuration}}}};const c={class:"p-progress-spinner",role:"progressbar"},g=["fill","stroke-width"];function h(n,i,r,t,e,a){return s(),o("div",c,[(s(),o("svg",{class:"p-progress-spinner-svg",viewBox:"25 25 50 50",style:l(a.svgStyle)},[p("circle",{class:"p-progress-spinner-circle",cx:"50",cy:"50",r:"20",fill:r.fill,"stroke-width":r.strokeWidth,strokeMiterlimit:"10"},null,8,g)],4))])}function u(n,i){i===void 0&&(i={});var r=i.insertAt;if(!(!n||typeof document>"u")){var t=document.head||document.getElementsByTagName("head")[0],e=document.createElement("style");e.type="text/css",r==="top"&&t.firstChild?t.insertBefore(e,t.firstChild):t.appendChild(e),e.styleSheet?e.styleSheet.cssText=n:e.appendChild(document.createTextNode(n))}}var m=`
========
import{o as s,c as o,q as l,d as p}from"./toastservice.esm-089fd174.js";var d={name:"ProgressSpinner",props:{strokeWidth:{type:String,default:"2"},fill:{type:String,default:"none"},animationDuration:{type:String,default:"2s"}},computed:{svgStyle(){return{"animation-duration":this.animationDuration}}}};const c={class:"p-progress-spinner",role:"progressbar"},g=["fill","stroke-width"];function h(n,i,r,t,e,a){return s(),o("div",c,[(s(),o("svg",{class:"p-progress-spinner-svg",viewBox:"25 25 50 50",style:l(a.svgStyle)},[p("circle",{class:"p-progress-spinner-circle",cx:"50",cy:"50",r:"20",fill:r.fill,"stroke-width":r.strokeWidth,strokeMiterlimit:"10"},null,8,g)],4))])}function u(n,i){i===void 0&&(i={});var r=i.insertAt;if(!(!n||typeof document>"u")){var t=document.head||document.getElementsByTagName("head")[0],e=document.createElement("style");e.type="text/css",r==="top"&&t.firstChild?t.insertBefore(e,t.firstChild):t.appendChild(e),e.styleSheet?e.styleSheet.cssText=n:e.appendChild(document.createTextNode(n))}}var m=`
>>>>>>>> cc8dc325978f6f49883d2679bc6e4079e3e92cc4:public/build/assets/progressspinner.esm-76560800.js
.p-progress-spinner {
    position: relative;
    margin: 0 auto;
    width: 100px;
    height: 100px;
    display: inline-block;
}
.p-progress-spinner::before {
    content: '';
    display: block;
    padding-top: 100%;
}
.p-progress-spinner-svg {
    height: 100%;
    transform-origin: center center;
    width: 100%;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
}
`;u(m);d.render=h;export{d as s};