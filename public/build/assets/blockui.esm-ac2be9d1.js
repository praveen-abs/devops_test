import{D as n,Z as l,b as a,r as d,o as c}from"./toastservice.esm-a0d835cd.js";var r={name:"BlockUI",emits:["block","unblock"],props:{blocked:{type:Boolean,default:!1},fullScreen:{type:Boolean,default:!1},baseZIndex:{type:Number,default:0},autoZIndex:{type:Boolean,default:!0}},mask:null,data(){return{isBlocked:!1}},watch:{blocked(e){e===!0?this.block():this.unblock()}},mounted(){this.blocked&&this.block()},methods:{block(){let e="p-blockui p-component-overlay p-component-overlay-enter";this.fullScreen?(e+=" p-blockui-document",this.mask=document.createElement("div"),this.mask.setAttribute("class",e),document.body.appendChild(this.mask),n.addClass(document.body,"p-overflow-hidden"),document.activeElement.blur()):(this.mask=document.createElement("div"),this.mask.setAttribute("class",e),this.$refs.container.appendChild(this.mask)),this.autoZIndex&&l.set("modal",this.mask,this.baseZIndex+this.$primevue.config.zIndex.modal),this.isBlocked=!0,this.$emit("block")},unblock(){n.addClass(this.mask,"p-component-overlay-leave"),this.mask.addEventListener("animationend",()=>{this.removeMask()})},removeMask(){l.clear(this.mask),this.fullScreen?(document.body.removeChild(this.mask),n.removeClass(document.body,"p-overflow-hidden")):this.$refs.container.removeChild(this.mask),this.isBlocked=!1,this.$emit("unblock")}}};const m=["aria-busy"];function u(e,o,i,s,t,k){return c(),a("div",{ref:"container",class:"p-blockui-container","aria-busy":t.isBlocked},[d(e.$slots,"default")],8,m)}function p(e,o){o===void 0&&(o={});var i=o.insertAt;if(!(!e||typeof document>"u")){var s=document.head||document.getElementsByTagName("head")[0],t=document.createElement("style");t.type="text/css",i==="top"&&s.firstChild?s.insertBefore(t,s.firstChild):s.appendChild(t),t.styleSheet?t.styleSheet.cssText=e:t.appendChild(document.createTextNode(e))}}var h=`
.p-blockui-container {
    position: relative;
}
.p-blockui {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.p-blockui.p-component-overlay {
    position: absolute;
}
.p-blockui-document.p-component-overlay {
    position: fixed;
}
`;p(h);r.render=u;export{r as s};
