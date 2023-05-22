import{c as s,p as d,r as p,a as l,n as m,o,k as u,t as g,e as c}from"./toastservice.esm-371af8c0.js";var b={name:"ProgressBar",props:{value:{type:Number,default:null},mode:{type:String,default:"determinate"},showValue:{type:Boolean,default:!0}},computed:{containerClass(){return["p-progressbar p-component",{"p-progressbar-determinate":this.determinate,"p-progressbar-indeterminate":this.indeterminate}]},progressStyle(){return{width:this.value+"%",display:"flex"}},indeterminate(){return this.mode==="indeterminate"},determinate(){return this.mode==="determinate"}}};const h=["aria-valuenow"],f={key:0,class:"p-progressbar-label"},v={key:1,class:"p-progressbar-indeterminate-container"},y=c("div",{class:"p-progressbar-value p-progressbar-value-animate"},null,-1),k=[y];function w(r,a,n,t,e,i){return o(),s("div",{role:"progressbar",class:m(i.containerClass),"aria-valuemin":"0","aria-valuenow":n.value,"aria-valuemax":"100"},[i.determinate?(o(),s("div",{key:0,class:"p-progressbar-value p-progressbar-value-animate",style:d(i.progressStyle)},[n.value!=null&&n.value!==0&&n.showValue?(o(),s("div",f,[p(r.$slots,"default",{},()=>[u(g(n.value+"%"),1)])])):l("",!0)],4)):l("",!0),i.indeterminate?(o(),s("div",v,k)):l("",!0)],10,h)}function _(r,a){a===void 0&&(a={});var n=a.insertAt;if(!(!r||typeof document>"u")){var t=document.head||document.getElementsByTagName("head")[0],e=document.createElement("style");e.type="text/css",n==="top"&&t.firstChild?t.insertBefore(e,t.firstChild):t.appendChild(e),e.styleSheet?e.styleSheet.cssText=r:e.appendChild(document.createTextNode(r))}}var x=`
.p-progressbar {
    position: relative;
    overflow: hidden;
}
.p-progressbar-determinate .p-progressbar-value {
    height: 100%;
    width: 0%;
    position: absolute;
    display: none;
    border: 0 none;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.p-progressbar-determinate .p-progressbar-label {
    display: inline-flex;
}
.p-progressbar-determinate .p-progressbar-value-animate {
    transition: width 1s ease-in-out;
}
.p-progressbar-indeterminate .p-progressbar-value::before {
    content: '';
    position: absolute;
    background-color: inherit;
    top: 0;
    left: 0;
    bottom: 0;
    will-change: left, right;
    -webkit-animation: p-progressbar-indeterminate-anim 2.1s cubic-bezier(0.65, 0.815, 0.735, 0.395) infinite;
    animation: p-progressbar-indeterminate-anim 2.1s cubic-bezier(0.65, 0.815, 0.735, 0.395) infinite;
}
.p-progressbar-indeterminate .p-progressbar-value::after {
    content: '';
    position: absolute;
    background-color: inherit;
    top: 0;
    left: 0;
    bottom: 0;
    will-change: left, right;
    -webkit-animation: p-progressbar-indeterminate-anim-short 2.1s cubic-bezier(0.165, 0.84, 0.44, 1) infinite;
    animation: p-progressbar-indeterminate-anim-short 2.1s cubic-bezier(0.165, 0.84, 0.44, 1) infinite;
    -webkit-animation-delay: 1.15s;
    animation-delay: 1.15s;
}
@-webkit-keyframes p-progressbar-indeterminate-anim {
0% {
        left: -35%;
        right: 100%;
}
60% {
        left: 100%;
        right: -90%;
}
100% {
        left: 100%;
        right: -90%;
}
}
@keyframes p-progressbar-indeterminate-anim {
0% {
        left: -35%;
        right: 100%;
}
60% {
        left: 100%;
        right: -90%;
}
100% {
        left: 100%;
        right: -90%;
}
}
@-webkit-keyframes p-progressbar-indeterminate-anim-short {
0% {
        left: -200%;
        right: 100%;
}
60% {
        left: 107%;
        right: -8%;
}
100% {
        left: 107%;
        right: -8%;
}
}
@keyframes p-progressbar-indeterminate-anim-short {
0% {
        left: -200%;
        right: 100%;
}
60% {
        left: 107%;
        right: -8%;
}
100% {
        left: 107%;
        right: -8%;
}
}
`;_(x);b.render=w;export{b as s};
