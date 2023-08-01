import{Z as l,D as p,u as C,R as w,s as x,o,b as L,w as h,d,h as B,k as f,c,r as m,a as b,n as u,m as S,T as E,g as A,j as v}from"./toastservice.esm-fb72c8eb.js";var I={name:"Sidebar",emits:["update:visible","show","hide"],props:{visible:{type:Boolean,default:!1},position:{type:String,default:"left"},baseZIndex:{type:Number,default:0},autoZIndex:{type:Boolean,default:!0},dismissable:{type:Boolean,default:!0},showCloseIcon:{type:Boolean,default:!0},closeIcon:{type:String,default:"pi pi-times"},modal:{type:Boolean,default:!0},blockScroll:{type:Boolean,default:!0}},container:null,content:null,headerContainer:null,closeButton:null,outsideClickListener:null,data(){return{maskVisible:!1}},watch:{visible(e){this.maskVisible=e||this.maskVisible}},beforeUnmount(){this.container&&this.autoZIndex&&l.clear(this.container),this.unbindOutsideClickListener(),this.container=null},methods:{hide(){this.$emit("update:visible",!1),this.unbindOutsideClickListener(),this.blockScroll&&p.removeClass(document.body,"p-overflow-hidden")},onEnter(){this.$emit("show"),this.autoZIndex&&l.set("modal",this.$refs.mask,this.baseZIndex||this.$primevue.config.zIndex.modal),this.maskVisible=!0,this.focus()},onLeave(){p.addClass(this.$refs.mask,"p-component-overlay-leave"),this.$emit("hide"),this.unbindOutsideClickListener()},onAfterLeave(){this.autoZIndex&&l.clear(this.mask),this.maskVisible=!1},onAfterEnter(){this.bindOutsideClickListener(),this.blockScroll&&p.addClass(document.body,"p-overflow-hidden")},focus(){const e=n=>n.querySelector("[autofocus]");let t=this.$slots.default&&e(this.content);t||(t=this.$slots.header&&e(this.headerContainer),t||(t=e(this.container))),t&&t.focus()},onKeydown(e){e.code==="Escape"&&this.hide()},onMaskClick(e){this.dismissable&&this.modal&&this.$refs.mask===e.target&&this.hide()},containerRef(e){this.container=e},contentRef(e){this.content=e},headerContainerRef(e){this.headerContainer=e},closeButtonRef(e){this.closeButton=e},getPositionClass(){const t=["left","right","top","bottom"].find(n=>n===this.position);return t?`p-sidebar-${t}`:""},bindOutsideClickListener(){this.outsideClickListener||(this.outsideClickListener=e=>{!this.modal&&this.isOutsideClicked(e)&&this.dismissable&&this.hide()},document.addEventListener("click",this.outsideClickListener))},unbindOutsideClickListener(){this.outsideClickListener&&(document.removeEventListener("click",this.outsideClickListener),this.outsideClickListener=null)},isOutsideClicked(e){return this.container&&!this.container.contains(e.target)}},computed:{containerClass(){return["p-sidebar p-component",{"p-input-filled":this.$primevue.config.inputStyle==="filled","p-ripple-disabled":this.$primevue.config.ripple===!1,"p-sidebar-full":this.fullScreen}]},fullScreen(){return this.position==="full"},closeAriaLabel(){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria.close:void 0},maskClasses(){return["p-sidebar-mask",this.getPositionClass(),{"p-component-overlay p-component-overlay-enter":this.modal,"p-sidebar-mask-scrollblocker":this.blockScroll,"p-sidebar-visible":this.maskVisible,"p-sidebar-full":this.fullScreen}]}},directives:{focustrap:C,ripple:w},components:{Portal:x}};const R=["aria-modal"],O={key:0,class:"p-sidebar-header-content"},V=["aria-label"];function Z(e,t,n,r,s,i){const k=A("Portal"),g=v("ripple"),y=v("focustrap");return o(),L(k,null,{default:h(()=>[d("div",{ref:"mask",style:{},class:u(i.maskClasses),onMousedown:t[2]||(t[2]=(...a)=>i.onMaskClick&&i.onMaskClick(...a))},[B(E,{name:"p-sidebar",onAfterEnter:i.onAfterEnter,onEnter:i.onEnter,onLeave:i.onLeave,onAfterLeave:i.onAfterLeave,appear:""},{default:h(()=>[n.visible?f((o(),c("div",S({key:0,ref:i.containerRef,class:i.containerClass,role:"complementary","aria-modal":n.modal,onKeydown:t[1]||(t[1]=(...a)=>i.onKeydown&&i.onKeydown(...a))},e.$attrs),[d("div",{ref:i.headerContainerRef,class:"p-sidebar-header"},[e.$slots.header?(o(),c("div",O,[m(e.$slots,"header")])):b("",!0),n.showCloseIcon?f((o(),c("button",{key:1,ref:i.closeButtonRef,autofocus:"",type:"button",class:"p-sidebar-close p-sidebar-icon p-link","aria-label":i.closeAriaLabel,onClick:t[0]||(t[0]=(...a)=>i.hide&&i.hide(...a))},[d("span",{class:u(["p-sidebar-close-icon",n.closeIcon])},null,2)],8,V)),[[g]]):b("",!0)],512),d("div",{ref:i.contentRef,class:"p-sidebar-content"},[m(e.$slots,"default")],512)],16,R)),[[y]]):b("",!0)]),_:3},8,["onAfterEnter","onEnter","onLeave","onAfterLeave"])],34)]),_:3})}function j(e,t){t===void 0&&(t={});var n=t.insertAt;if(!(!e||typeof document>"u")){var r=document.head||document.getElementsByTagName("head")[0],s=document.createElement("style");s.type="text/css",n==="top"&&r.firstChild?r.insertBefore(s,r.firstChild):r.appendChild(s),s.styleSheet?s.styleSheet.cssText=e:s.appendChild(document.createTextNode(e))}}var P=`
.p-sidebar-mask {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: none;
    justify-content: center;
    align-items: center;
    pointer-events: none;
    background-color: transparent;
    transition-property: background-color;
}
.p-sidebar-visible {
    display: flex;
}
.p-sidebar-mask.p-component-overlay {
    pointer-events: auto;
}
.p-sidebar {
    display: flex;
    flex-direction: column;
    pointer-events: auto;
    transform: translate3d(0px, 0px, 0px);
    position: relative;
    transition: transform 0.3s;
}
.p-sidebar-content {
    overflow-y: auto;
    flex-grow: 1;
}
.p-sidebar-header {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    flex-shrink: 0;
}
.p-sidebar-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    position: relative;
}
.p-sidebar-full .p-sidebar {
    transition: none;
    transform: none;
    width: 100vw !important;
    height: 100vh !important;
    max-height: 100%;
    top: 0px !important;
    left: 0px !important;
}

/* Animation */
/* Center */
.p-sidebar-left .p-sidebar-enter-from,
.p-sidebar-left .p-sidebar-leave-to {
    transform: translateX(-100%);
}
.p-sidebar-right .p-sidebar-enter-from,
.p-sidebar-right .p-sidebar-leave-to {
    transform: translateX(100%);
}
.p-sidebar-top .p-sidebar-enter-from,
.p-sidebar-top .p-sidebar-leave-to {
    transform: translateY(-100%);
}
.p-sidebar-bottom .p-sidebar-enter-from,
.p-sidebar-bottom .p-sidebar-leave-to {
    transform: translateY(100%);
}
.p-sidebar-full .p-sidebar-enter-from,
.p-sidebar-full .p-sidebar-leave-to {
    opacity: 0;
}
.p-sidebar-full .p-sidebar-enter-active,
.p-sidebar-full .p-sidebar-leave-active {
    transition: opacity 400ms cubic-bezier(0.25, 0.8, 0.25, 1);
}

/* Position */
.p-sidebar-left {
    justify-content: flex-start;
}
.p-sidebar-right {
    justify-content: flex-end;
}
.p-sidebar-top {
    align-items: flex-start;
}
.p-sidebar-bottom {
    align-items: flex-end;
}

/* Size */
.p-sidebar-left .p-sidebar {
    width: 20rem;
    height: 100%;
}
.p-sidebar-right .p-sidebar {
    width: 20rem;
    height: 100%;
}
.p-sidebar-top .p-sidebar {
    height: 10rem;
    width: 100%;
}
.p-sidebar-bottom .p-sidebar {
    height: 10rem;
    width: 100%;
}
.p-sidebar-left .p-sidebar-sm,
.p-sidebar-right .p-sidebar-sm {
    width: 20rem;
}
.p-sidebar-left .p-sidebar-md,
.p-sidebar-right .p-sidebar-md {
    width: 40rem;
}
.p-sidebar-left .p-sidebar-lg,
.p-sidebar-right .p-sidebar-lg {
    width: 60rem;
}
.p-sidebar-top .p-sidebar-sm,
.p-sidebar-bottom .p-sidebar-sm {
    height: 10rem;
}
.p-sidebar-top .p-sidebar-md,
.p-sidebar-bottom .p-sidebar-md {
    height: 20rem;
}
.p-sidebar-top .p-sidebar-lg,
.p-sidebar-bottom .p-sidebar-lg {
    height: 30rem;
}
.p-sidebar-left .p-sidebar-view,
.p-sidebar-right .p-sidebar-view,
.p-sidebar-top .p-sidebar-view,
.p-sidebar-bottom .p-sidebar-view {
    width: 100%;
    height: 100%;
}
.p-sidebar-left .p-sidebar-content,
.p-sidebar-right .p-sidebar-content,
.p-sidebar-top .p-sidebar-content,
.p-sidebar-bottom .p-sidebar-content {
    width: 100%;
    height: 100%;
}
@media screen and (max-width: 64em) {
.p-sidebar-left .p-sidebar-lg,
    .p-sidebar-left .p-sidebar-md,
    .p-sidebar-right .p-sidebar-lg,
    .p-sidebar-right .p-sidebar-md {
        width: 20rem;
}
}
`;j(P);I.render=Z;export{I as s};
