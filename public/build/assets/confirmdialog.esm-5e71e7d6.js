import{v as d,e as f,w as u,i as m,o as n,j as h,n as a,b as p,d as g,g as C,t as v,F as j,f as k}from"./toastservice.esm-755d2ad6.js";import{d as s,a as L}from"./inputtext.esm-2a9cd591.js";var B={name:"ConfirmDialog",props:{group:String,breakpoints:{type:Object,default:null},draggable:{type:Boolean,default:!0}},confirmListener:null,closeListener:null,data(){return{visible:!1,confirmation:null}},mounted(){this.confirmListener=i=>{i&&i.group===this.group&&(this.confirmation=i,this.confirmation.onShow&&this.confirmation.onShow(),this.visible=!0)},this.closeListener=()=>{this.visible=!1,this.confirmation=null},s.on("confirm",this.confirmListener),s.on("close",this.closeListener)},beforeUnmount(){s.off("confirm",this.confirmListener),s.off("close",this.closeListener)},methods:{accept(){this.confirmation.accept&&this.confirmation.accept(),this.visible=!1},reject(){this.confirmation.reject&&this.confirmation.reject(),this.visible=!1},onHide(){this.confirmation.onHide&&this.confirmation.onHide(),this.visible=!1}},computed:{header(){return this.confirmation?this.confirmation.header:null},message(){return this.confirmation?this.confirmation.message:null},blockScroll(){return this.confirmation?this.confirmation.blockScroll:!0},position(){return this.confirmation?this.confirmation.position:null},iconClass(){return["p-confirm-dialog-icon",this.confirmation?this.confirmation.icon:null]},acceptLabel(){return this.confirmation?this.confirmation.acceptLabel||this.$primevue.config.locale.accept:null},rejectLabel(){return this.confirmation?this.confirmation.rejectLabel||this.$primevue.config.locale.reject:null},acceptIcon(){return this.confirmation?this.confirmation.acceptIcon:null},rejectIcon(){return this.confirmation?this.confirmation.rejectIcon:null},acceptClass(){return["p-confirm-dialog-accept",this.confirmation?this.confirmation.acceptClass:null]},rejectClass(){return["p-confirm-dialog-reject",this.confirmation?this.confirmation.rejectClass||"p-button-text":null]},autoFocusAccept(){return this.confirmation.defaultFocus===void 0||this.confirmation.defaultFocus==="accept"},autoFocusReject(){return this.confirmation.defaultFocus==="reject"},closeOnEscape(){return this.confirmation?this.confirmation.closeOnEscape:!0}},components:{CDialog:L,CDButton:d}};const D={class:"p-confirm-dialog-message"};function F(i,t,r,S,o,e){const l=m("CDButton"),b=m("CDialog");return n(),f(b,{visible:o.visible,"onUpdate:visible":[t[2]||(t[2]=c=>o.visible=c),e.onHide],role:"alertdialog",class:"p-confirm-dialog",modal:!0,header:e.header,blockScroll:e.blockScroll,position:e.position,breakpoints:r.breakpoints,closeOnEscape:e.closeOnEscape,draggable:r.draggable},{footer:u(()=>[h(l,{label:e.rejectLabel,icon:e.rejectIcon,class:a(e.rejectClass),onClick:t[0]||(t[0]=c=>e.reject()),autofocus:e.autoFocusReject},null,8,["label","icon","class","autofocus"]),h(l,{label:e.acceptLabel,icon:e.acceptIcon,class:a(e.acceptClass),onClick:t[1]||(t[1]=c=>e.accept()),autofocus:e.autoFocusAccept},null,8,["label","icon","class","autofocus"])]),default:u(()=>[i.$slots.message?(n(),f(k(i.$slots.message),{key:1,message:o.confirmation},null,8,["message"])):(n(),p(j,{key:0},[o.confirmation.icon?(n(),p("i",{key:0,class:a(e.iconClass)},null,2)):g("",!0),C("span",D,v(e.message),1)],64))]),_:1},8,["visible","header","blockScroll","position","breakpoints","closeOnEscape","draggable","onUpdate:visible"])}B.render=F;export{B as s};