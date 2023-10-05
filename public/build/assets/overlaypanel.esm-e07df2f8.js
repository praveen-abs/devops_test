import{Z as d,i as o,D as r,C as L,U as k,u as g,R as w,s as E,o as c,b as T,w as p,h as x,k as h,c as f,d as y,r as O,a as u,m as S,T as z,g as A,j as v}from"./inputnumber.esm-e362c3ab.js";var B={name:"OverlayPanel",inheritAttrs:!1,emits:["show","hide"],props:{dismissable:{type:Boolean,default:!0},showCloseIcon:{type:Boolean,default:!1},appendTo:{type:String,default:"body"},baseZIndex:{type:Number,default:0},autoZIndex:{type:Boolean,default:!0},breakpoints:{type:Object,default:null}},data(){return{visible:!1}},watch:{dismissable:{immediate:!0,handler(e){e?this.bindOutsideClickListener():this.unbindOutsideClickListener()}}},selfClick:!1,target:null,eventTarget:null,outsideClickListener:null,scrollHandler:null,resizeListener:null,container:null,styleElement:null,overlayEventListener:null,beforeUnmount(){this.dismissable&&this.unbindOutsideClickListener(),this.scrollHandler&&(this.scrollHandler.destroy(),this.scrollHandler=null),this.destroyStyle(),this.unbindResizeListener(),this.target=null,this.container&&this.autoZIndex&&d.clear(this.container),this.overlayEventListener&&(o.off("overlay-click",this.overlayEventListener),this.overlayEventListener=null),this.container=null},mounted(){this.breakpoints&&this.createStyle()},methods:{toggle(e,t){this.visible?this.hide():this.show(e,t)},show(e,t){this.visible=!0,this.eventTarget=e.currentTarget,this.target=t||e.currentTarget},hide(){this.visible=!1,r.focus(this.target)},onContentClick(){this.selfClick=!0},onEnter(e){this.container.setAttribute(this.attributeSelector,""),this.alignOverlay(),this.dismissable&&this.bindOutsideClickListener(),this.bindScrollListener(),this.bindResizeListener(),this.autoZIndex&&d.set("overlay",e,this.baseZIndex+this.$primevue.config.zIndex.overlay),this.overlayEventListener=t=>{this.container.contains(t.target)&&(this.selfClick=!0)},this.focus(),o.on("overlay-click",this.overlayEventListener),this.$emit("show")},onLeave(){this.unbindOutsideClickListener(),this.unbindScrollListener(),this.unbindResizeListener(),o.off("overlay-click",this.overlayEventListener),this.overlayEventListener=null,this.$emit("hide")},onAfterLeave(e){this.autoZIndex&&d.clear(e)},alignOverlay(){r.absolutePosition(this.container,this.target);const e=r.getOffset(this.container),t=r.getOffset(this.target);let l=0;e.left<t.left&&(l=t.left-e.left),this.container.style.setProperty("--overlayArrowLeft",`${l}px`),e.top<t.top&&r.addClass(this.container,"p-overlaypanel-flipped")},onContentKeydown(e){e.code==="Escape"&&this.hide()},onButtonKeydown(e){switch(e.code){case"ArrowDown":case"ArrowUp":case"ArrowLeft":case"ArrowRight":e.preventDefault()}},focus(){let e=this.container.querySelector("[autofocus]");e&&e.focus()},bindOutsideClickListener(){!this.outsideClickListener&&r.isClient()&&(this.outsideClickListener=e=>{this.visible&&!this.selfClick&&!this.isTargetClicked(e)&&(this.visible=!1),this.selfClick=!1},document.addEventListener("click",this.outsideClickListener))},unbindOutsideClickListener(){this.outsideClickListener&&(document.removeEventListener("click",this.outsideClickListener),this.outsideClickListener=null,this.selfClick=!1)},bindScrollListener(){this.scrollHandler||(this.scrollHandler=new L(this.target,()=>{this.visible&&(this.visible=!1)})),this.scrollHandler.bindScrollListener()},unbindScrollListener(){this.scrollHandler&&this.scrollHandler.unbindScrollListener()},bindResizeListener(){this.resizeListener||(this.resizeListener=()=>{this.visible&&!r.isTouchDevice()&&(this.visible=!1)},window.addEventListener("resize",this.resizeListener))},unbindResizeListener(){this.resizeListener&&(window.removeEventListener("resize",this.resizeListener),this.resizeListener=null)},isTargetClicked(e){return this.eventTarget&&(this.eventTarget===e.target||this.eventTarget.contains(e.target))},containerRef(e){this.container=e},createStyle(){if(!this.styleElement){this.styleElement=document.createElement("style"),this.styleElement.type="text/css",document.head.appendChild(this.styleElement);let e="";for(let t in this.breakpoints)e+=`
                        @media screen and (max-width: ${t}) {
                            .p-overlaypanel[${this.attributeSelector}] {
                                width: ${this.breakpoints[t]} !important;
                            }
                        }
                    `;this.styleElement.innerHTML=e}},destroyStyle(){this.styleElement&&(document.head.removeChild(this.styleElement),this.styleElement=null)},onOverlayClick(e){o.emit("overlay-click",{originalEvent:e,target:this.target})}},computed:{containerClass(){return["p-overlaypanel p-component",{"p-input-filled":this.$primevue.config.inputStyle==="filled","p-ripple-disabled":this.$primevue.config.ripple===!1}]},attributeSelector(){return k()},closeAriaLabel(){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria.close:void 0}},directives:{focustrap:g,ripple:w},components:{Portal:E}};const H=["aria-modal"],I=["aria-label"],R=y("span",{class:"p-overlaypanel-close-icon pi pi-times"},null,-1),K=[R];function Z(e,t,l,a,s,i){const m=A("Portal"),b=v("ripple"),C=v("focustrap");return c(),T(m,{appendTo:l.appendTo},{default:p(()=>[x(z,{name:"p-overlaypanel",onEnter:i.onEnter,onLeave:i.onLeave,onAfterLeave:i.onAfterLeave},{default:p(()=>[s.visible?h((c(),f("div",S({key:0,ref:i.containerRef,role:"dialog",class:i.containerClass,"aria-modal":s.visible,onClick:t[5]||(t[5]=(...n)=>i.onOverlayClick&&i.onOverlayClick(...n))},e.$attrs),[y("div",{class:"p-overlaypanel-content",onClick:t[0]||(t[0]=(...n)=>i.onContentClick&&i.onContentClick(...n)),onMousedown:t[1]||(t[1]=(...n)=>i.onContentClick&&i.onContentClick(...n)),onKeydown:t[2]||(t[2]=(...n)=>i.onContentKeydown&&i.onContentKeydown(...n))},[O(e.$slots,"default")],32),l.showCloseIcon?h((c(),f("button",{key:0,class:"p-overlaypanel-close p-link","aria-label":i.closeAriaLabel,type:"button",autofocus:"",onClick:t[3]||(t[3]=(...n)=>i.hide&&i.hide(...n)),onKeydown:t[4]||(t[4]=(...n)=>i.onButtonKeydown&&i.onButtonKeydown(...n))},K,40,I)),[[b]]):u("",!0)],16,H)),[[C]]):u("",!0)]),_:3},8,["onEnter","onLeave","onAfterLeave"])]),_:3},8,["appendTo"])}function D(e,t){t===void 0&&(t={});var l=t.insertAt;if(!(!e||typeof document>"u")){var a=document.head||document.getElementsByTagName("head")[0],s=document.createElement("style");s.type="text/css",l==="top"&&a.firstChild?a.insertBefore(s,a.firstChild):a.appendChild(s),s.styleSheet?s.styleSheet.cssText=e:s.appendChild(document.createTextNode(e))}}var P=`
.p-overlaypanel {
    position: absolute;
    margin-top: 10px;
    top: 0;
    left: 0;
}
.p-overlaypanel-flipped {
    margin-top: 0;
    margin-bottom: 10px;
}
.p-overlaypanel-close {
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    position: relative;
}

/* Animation */
.p-overlaypanel-enter-from {
    opacity: 0;
    transform: scaleY(0.8);
}
.p-overlaypanel-leave-to {
    opacity: 0;
}
.p-overlaypanel-enter-active {
    transition: transform 0.12s cubic-bezier(0, 0, 0.2, 1), opacity 0.12s cubic-bezier(0, 0, 0.2, 1);
}
.p-overlaypanel-leave-active {
    transition: opacity 0.1s linear;
}
.p-overlaypanel:after,
.p-overlaypanel:before {
    bottom: 100%;
    left: calc(var(--overlayArrowLeft, 0) + 1.25rem);
    content: ' ';
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
}
.p-overlaypanel:after {
    border-width: 8px;
    margin-left: -8px;
}
.p-overlaypanel:before {
    border-width: 10px;
    margin-left: -10px;
}
.p-overlaypanel-flipped:after,
.p-overlaypanel-flipped:before {
    bottom: auto;
    top: 100%;
}
.p-overlaypanel.p-overlaypanel-flipped:after {
    border-bottom-color: transparent;
}
.p-overlaypanel.p-overlaypanel-flipped:before {
    border-bottom-color: transparent;
}
`;D(P);B.render=Z;export{B as s};
