import{Y as d,M as w,v as L,b as h,w as g,g as v,o as i,h as b,n as l,c,a as x,e as r,t as C,F as I,d as k,_ as p,Z as y,O as T,U as _,s as B,R as A,j as D,m as S,f as P,y as R,l as F}from"./toastservice.esm-55c6bc57.js";var O={name:"ConfirmDialog",props:{group:String,breakpoints:{type:Object,default:null}},confirmListener:null,closeListener:null,data(){return{visible:!1,confirmation:null}},mounted(){this.confirmListener=e=>{e&&e.group===this.group&&(this.confirmation=e,this.confirmation.onShow&&this.confirmation.onShow(),this.visible=!0)},this.closeListener=()=>{this.visible=!1,this.confirmation=null},d.on("confirm",this.confirmListener),d.on("close",this.closeListener)},beforeUnmount(){d.off("confirm",this.confirmListener),d.off("close",this.closeListener)},methods:{accept(){this.confirmation.accept&&this.confirmation.accept(),this.visible=!1},reject(){this.confirmation.reject&&this.confirmation.reject(),this.visible=!1},onHide(){this.confirmation.onHide&&this.confirmation.onHide(),this.visible=!1}},computed:{header(){return this.confirmation?this.confirmation.header:null},message(){return this.confirmation?this.confirmation.message:null},blockScroll(){return this.confirmation?this.confirmation.blockScroll:!0},position(){return this.confirmation?this.confirmation.position:null},iconClass(){return["p-confirm-dialog-icon",this.confirmation?this.confirmation.icon:null]},acceptLabel(){return this.confirmation?this.confirmation.acceptLabel||this.$primevue.config.locale.accept:null},rejectLabel(){return this.confirmation?this.confirmation.rejectLabel||this.$primevue.config.locale.reject:null},acceptIcon(){return this.confirmation?this.confirmation.acceptIcon:null},rejectIcon(){return this.confirmation?this.confirmation.rejectIcon:null},acceptClass(){return["p-confirm-dialog-accept",this.confirmation?this.confirmation.acceptClass:null]},rejectClass(){return["p-confirm-dialog-reject",this.confirmation?this.confirmation.rejectClass||"p-button-text":null]},autoFocusAccept(){return this.confirmation.defaultFocus===void 0||this.confirmation.defaultFocus==="accept"},autoFocusReject(){return this.confirmation.defaultFocus==="reject"},closeOnEscape(){return this.confirmation?this.confirmation.closeOnEscape:!0}},components:{CDialog:w,CDButton:L}};const U={class:"p-confirm-dialog-message"};function Z(e,n,t,a,o,s){const m=v("CDButton"),f=v("CDialog");return i(),h(f,{visible:o.visible,"onUpdate:visible":[n[2]||(n[2]=u=>o.visible=u),s.onHide],role:"alertdialog",class:"p-confirm-dialog",modal:!0,header:s.header,blockScroll:s.blockScroll,position:s.position,breakpoints:t.breakpoints,closeOnEscape:s.closeOnEscape},{footer:g(()=>[b(m,{label:s.rejectLabel,icon:s.rejectIcon,class:l(s.rejectClass),onClick:n[0]||(n[0]=u=>s.reject()),autofocus:s.autoFocusReject},null,8,["label","icon","class","autofocus"]),b(m,{label:s.acceptLabel,icon:s.acceptIcon,class:l(s.acceptClass),onClick:n[1]||(n[1]=u=>s.accept()),autofocus:s.autoFocusAccept},null,8,["label","icon","class","autofocus"])]),default:g(()=>[e.$slots.message?(i(),h(k(e.$slots.message),{key:1,message:o.confirmation},null,8,["message"])):(i(),c(I,{key:0},[o.confirmation.icon?(i(),c("i",{key:0,class:l(s.iconClass)},null,2)):x("",!0),r("span",U,C(s.message),1)],64))]),_:1},8,["visible","header","blockScroll","position","breakpoints","closeOnEscape","onUpdate:visible"])}O.render=Z;var E={name:"ToastMessage",emits:["close"],props:{message:{type:null,default:null},template:{type:null,default:null},closeIcon:{type:String,default:null},infoIcon:{type:String,default:null},warnIcon:{type:String,default:null},errorIcon:{type:String,default:null},successIcon:{type:String,default:null},closeButtonProps:{type:null,default:null}},closeTimeout:null,mounted(){this.message.life&&(this.closeTimeout=setTimeout(()=>{this.close()},this.message.life))},beforeUnmount(){this.clearCloseTimeout()},methods:{close(){this.$emit("close",this.message)},onCloseClick(){this.clearCloseTimeout(),this.close()},clearCloseTimeout(){this.closeTimeout&&(clearTimeout(this.closeTimeout),this.closeTimeout=null)}},computed:{containerClass(){return["p-toast-message",this.message.styleClass,{"p-toast-message-info":this.message.severity==="info","p-toast-message-warn":this.message.severity==="warn","p-toast-message-error":this.message.severity==="error","p-toast-message-success":this.message.severity==="success"}]},iconClass(){return["p-toast-message-icon",{[this.infoIcon]:this.message.severity==="info",[this.warnIcon]:this.message.severity==="warn",[this.errorIcon]:this.message.severity==="error",[this.successIcon]:this.message.severity==="success"}]},closeAriaLabel(){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria.close:void 0}},directives:{ripple:A}};const G={class:"p-toast-message-text"},M={class:"p-toast-summary"},H={class:"p-toast-detail"},N={key:2},z=["aria-label"];function Y(e,n,t,a,o,s){const m=F("ripple");return i(),c("div",{class:l(s.containerClass),role:"alert","aria-live":"assertive","aria-atomic":"true"},[r("div",{class:l(["p-toast-message-content",t.message.contentStyleClass])},[t.template?(i(),h(k(t.template),{key:1,message:t.message},null,8,["message"])):(i(),c(I,{key:0},[r("span",{class:l(s.iconClass)},null,2),r("div",G,[r("span",M,C(t.message.summary),1),r("div",H,C(t.message.detail),1)])],64)),t.message.closable!==!1?(i(),c("div",N,[D((i(),c("button",S({class:"p-toast-icon-close p-link",type:"button","aria-label":s.closeAriaLabel,onClick:n[0]||(n[0]=(...f)=>s.onCloseClick&&s.onCloseClick(...f)),autofocus:""},t.closeButtonProps),[r("span",{class:l(["p-toast-icon-close-icon",t.closeIcon])},null,2)],16,z)),[[m]])])):x("",!0)],2)],2)}E.render=Y;var V=0,X={name:"Toast",inheritAttrs:!1,props:{group:{type:String,default:null},position:{type:String,default:"top-right"},autoZIndex:{type:Boolean,default:!0},baseZIndex:{type:Number,default:0},breakpoints:{type:Object,default:null},closeIcon:{type:String,default:"pi pi-times"},infoIcon:{type:String,default:"pi pi-info-circle"},warnIcon:{type:String,default:"pi pi-exclamation-triangle"},errorIcon:{type:String,default:"pi pi-times"},successIcon:{type:String,default:"pi pi-check"},closeButtonProps:{type:null,default:null}},data(){return{messages:[]}},styleElement:null,mounted(){p.on("add",this.onAdd),p.on("remove-group",this.onRemoveGroup),p.on("remove-all-groups",this.onRemoveAllGroups),this.breakpoints&&this.createStyle()},beforeUnmount(){this.destroyStyle(),this.$refs.container&&this.autoZIndex&&y.clear(this.$refs.container),p.off("add",this.onAdd),p.off("remove-group",this.onRemoveGroup),p.off("remove-all-groups",this.onRemoveAllGroups)},methods:{add(e){e.id==null&&(e.id=V++),this.messages=[...this.messages,e]},remove(e){let n=-1;for(let t=0;t<this.messages.length;t++)if(this.messages[t]===e){n=t;break}this.messages.splice(n,1)},onAdd(e){this.group==e.group&&this.add(e)},onRemoveGroup(e){this.group===e&&(this.messages=[])},onRemoveAllGroups(){this.messages=[]},onEnter(){this.$refs.container.setAttribute(this.attributeSelector,""),this.autoZIndex&&y.set("modal",this.$refs.container,this.baseZIndex||this.$primevue.config.zIndex.modal)},onLeave(){this.$refs.container&&this.autoZIndex&&T.isEmpty(this.messages)&&setTimeout(()=>{y.clear(this.$refs.container)},200)},createStyle(){if(!this.styleElement){this.styleElement=document.createElement("style"),this.styleElement.type="text/css",document.head.appendChild(this.styleElement);let e="";for(let n in this.breakpoints){let t="";for(let a in this.breakpoints[n])t+=a+":"+this.breakpoints[n][a]+"!important;";e+=`
                        @media screen and (max-width: ${n}) {
                            .p-toast[${this.attributeSelector}] {
                                ${t}
                            }
                        }
                    `}this.styleElement.innerHTML=e}},destroyStyle(){this.styleElement&&(document.head.removeChild(this.styleElement),this.styleElement=null)}},computed:{containerClass(){return["p-toast p-component p-toast-"+this.position,{"p-input-filled":this.$primevue.config.inputStyle==="filled","p-ripple-disabled":this.$primevue.config.ripple===!1}]},attributeSelector(){return _()}},components:{ToastMessage:E,Portal:B}};function q(e,n,t,a,o,s){const m=v("ToastMessage"),f=v("Portal");return i(),h(f,null,{default:g(()=>[r("div",S({ref:"container",class:s.containerClass},e.$attrs),[b(R,{name:"p-toast-message",tag:"div",onEnter:s.onEnter,onLeave:s.onLeave},{default:g(()=>[(i(!0),c(I,null,P(o.messages,u=>(i(),h(m,{key:u.id,message:u,template:e.$slots.message,closeIcon:t.closeIcon,infoIcon:t.infoIcon,warnIcon:t.warnIcon,errorIcon:t.errorIcon,successIcon:t.successIcon,closeButtonProps:t.closeButtonProps,onClose:n[0]||(n[0]=j=>s.remove(j))},null,8,["message","template","closeIcon","infoIcon","warnIcon","errorIcon","successIcon","closeButtonProps"]))),128))]),_:1},8,["onEnter","onLeave"])],16)]),_:1})}function J(e,n){n===void 0&&(n={});var t=n.insertAt;if(!(!e||typeof document>"u")){var a=document.head||document.getElementsByTagName("head")[0],o=document.createElement("style");o.type="text/css",t==="top"&&a.firstChild?a.insertBefore(o,a.firstChild):a.appendChild(o),o.styleSheet?o.styleSheet.cssText=e:o.appendChild(document.createTextNode(e))}}var K=`
.p-toast {
    position: fixed;
    width: 25rem;
}
.p-toast-message-content {
    display: flex;
    align-items: flex-start;
}
.p-toast-message-text {
    flex: 1 1 auto;
}
.p-toast-top-right {
    top: 20px;
    right: 20px;
}
.p-toast-top-left {
    top: 20px;
    left: 20px;
}
.p-toast-bottom-left {
    bottom: 20px;
    left: 20px;
}
.p-toast-bottom-right {
    bottom: 20px;
    right: 20px;
}
.p-toast-top-center {
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
}
.p-toast-bottom-center {
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
}
.p-toast-center {
    left: 50%;
    top: 50%;
    min-width: 20vw;
    transform: translate(-50%, -50%);
}
.p-toast-icon-close {
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    position: relative;
}
.p-toast-icon-close.p-link {
    cursor: pointer;
}

/* Animations */
.p-toast-message-enter-from {
    opacity: 0;
    -webkit-transform: translateY(50%);
    -ms-transform: translateY(50%);
    transform: translateY(50%);
}
.p-toast-message-leave-from {
    max-height: 1000px;
}
.p-toast .p-toast-message.p-toast-message-leave-to {
    max-height: 0;
    opacity: 0;
    margin-bottom: 0;
    overflow: hidden;
}
.p-toast-message-enter-active {
    -webkit-transition: transform 0.3s, opacity 0.3s;
    transition: transform 0.3s, opacity 0.3s;
}
.p-toast-message-leave-active {
    -webkit-transition: max-height 0.45s cubic-bezier(0, 1, 0, 1), opacity 0.3s, margin-bottom 0.3s;
    transition: max-height 0.45s cubic-bezier(0, 1, 0, 1), opacity 0.3s, margin-bottom 0.3s;
}
`;J(K);X.render=q;export{X as a,O as s};
