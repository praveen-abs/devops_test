import{Z as d,D as a,C as S,i as x,U as L,Y as C,s as T,o as u,c as p,h,m as y,n as c,a as m,d as r,t as g,w as v,T as I,r as f,g as b,p as V}from"./toastservice.esm-92ad56cd.js";var P={name:"Password",emits:["update:modelValue","change","focus","blur","invalid"],props:{modelValue:String,promptLabel:{type:String,default:null},mediumRegex:{type:String,default:"^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})"},strongRegex:{type:String,default:"^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})"},weakLabel:{type:String,default:null},mediumLabel:{type:String,default:null},strongLabel:{type:String,default:null},feedback:{type:Boolean,default:!0},appendTo:{type:String,default:"body"},toggleMask:{type:Boolean,default:!1},hideIcon:{type:String,default:"pi pi-eye-slash"},showIcon:{type:String,default:"pi pi-eye"},disabled:{type:Boolean,default:!1},placeholder:{type:String,default:null},required:{type:Boolean,default:!1},inputId:{type:String,default:null},inputClass:{type:String,default:null},inputStyle:{type:null,default:null},inputProps:{type:null,default:null},panelId:{type:String,default:null},panelClass:{type:String,default:null},panelStyle:{type:null,default:null},panelProps:{type:null,default:null},"aria-labelledby":{type:String,default:null},"aria-label":{type:String,default:null}},data(){return{overlayVisible:!1,meter:null,infoText:null,focused:!1,unmasked:!1}},mediumCheckRegExp:null,strongCheckRegExp:null,resizeListener:null,scrollHandler:null,overlay:null,mounted(){this.infoText=this.promptText,this.mediumCheckRegExp=new RegExp(this.mediumRegex),this.strongCheckRegExp=new RegExp(this.strongRegex)},beforeUnmount(){this.unbindResizeListener(),this.scrollHandler&&(this.scrollHandler.destroy(),this.scrollHandler=null),this.overlay&&(d.clear(this.overlay),this.overlay=null)},methods:{onOverlayEnter(e){d.set("overlay",e,this.$primevue.config.zIndex.overlay),this.alignOverlay(),this.bindScrollListener(),this.bindResizeListener()},onOverlayLeave(){this.unbindScrollListener(),this.unbindResizeListener(),this.overlay=null},onOverlayAfterLeave(e){d.clear(e)},alignOverlay(){this.appendTo==="self"?a.relativePosition(this.overlay,this.$refs.input.$el):(this.overlay.style.minWidth=a.getOuterWidth(this.$refs.input.$el)+"px",a.absolutePosition(this.overlay,this.$refs.input.$el))},testStrength(e){let l=0;return this.strongCheckRegExp.test(e)?l=3:this.mediumCheckRegExp.test(e)?l=2:e.length&&(l=1),l},onInput(e){this.$emit("update:modelValue",e.target.value)},onFocus(e){this.focused=!0,this.feedback&&(this.setPasswordMeter(this.modelValue),this.overlayVisible=!0),this.$emit("focus",e)},onBlur(e){this.focused=!1,this.feedback&&(this.overlayVisible=!1),this.$emit("blur",e)},onKeyUp(e){if(this.feedback){const l=e.target.value,{meter:t,label:n}=this.checkPasswordStrength(l);if(this.meter=t,this.infoText=n,e.code==="Escape"){this.overlayVisible&&(this.overlayVisible=!1);return}this.overlayVisible||(this.overlayVisible=!0)}},setPasswordMeter(){if(!this.modelValue)return;const{meter:e,label:l}=this.checkPasswordStrength(this.modelValue);this.meter=e,this.infoText=l,this.overlayVisible||(this.overlayVisible=!0)},checkPasswordStrength(e){let l=null,t=null;switch(this.testStrength(e)){case 1:l=this.weakText,t={strength:"weak",width:"33.33%"};break;case 2:l=this.mediumText,t={strength:"medium",width:"66.66%"};break;case 3:l=this.strongText,t={strength:"strong",width:"100%"};break;default:l=this.promptText,t=null;break}return{label:l,meter:t}},onInvalid(e){this.$emit("invalid",e)},bindScrollListener(){this.scrollHandler||(this.scrollHandler=new S(this.$refs.input.$el,()=>{this.overlayVisible&&(this.overlayVisible=!1)})),this.scrollHandler.bindScrollListener()},unbindScrollListener(){this.scrollHandler&&this.scrollHandler.unbindScrollListener()},bindResizeListener(){this.resizeListener||(this.resizeListener=()=>{this.overlayVisible&&!a.isTouchDevice()&&(this.overlayVisible=!1)},window.addEventListener("resize",this.resizeListener))},unbindResizeListener(){this.resizeListener&&(window.removeEventListener("resize",this.resizeListener),this.resizeListener=null)},overlayRef(e){this.overlay=e},onMaskToggle(){this.unmasked=!this.unmasked},onOverlayClick(e){x.emit("overlay-click",{originalEvent:e,target:this.$el})}},computed:{containerClass(){return["p-password p-component p-inputwrapper",{"p-inputwrapper-filled":this.filled,"p-inputwrapper-focus":this.focused,"p-input-icon-right":this.toggleMask}]},inputFieldClass(){return["p-password-input",this.inputClass,{"p-disabled":this.disabled}]},panelStyleClass(){return["p-password-panel p-component",this.panelClass,{"p-input-filled":this.$primevue.config.inputStyle==="filled","p-ripple-disabled":this.$primevue.config.ripple===!1}]},toggleIconClass(){return this.unmasked?this.hideIcon:this.showIcon},strengthClass(){return`p-password-strength ${this.meter?this.meter.strength:""}`},inputType(){return this.unmasked?"text":"password"},filled(){return this.modelValue!=null&&this.modelValue.toString().length>0},weakText(){return this.weakLabel||this.$primevue.config.locale.weak},mediumText(){return this.mediumLabel||this.$primevue.config.locale.medium},strongText(){return this.strongLabel||this.$primevue.config.locale.strong},promptText(){return this.promptLabel||this.$primevue.config.locale.passwordPrompt},panelUniqueId(){return L()+"_panel"}},components:{PInputText:C,Portal:T}};const z={class:"p-hidden-accessible","aria-live":"polite"},E=["id"],R={class:"p-password-meter"},B={class:"p-password-info"};function O(e,l,t,n,s,i){const w=b("PInputText"),k=b("Portal");return u(),p("div",{class:c(i.containerClass)},[h(w,y({ref:"input",id:t.inputId,type:i.inputType,class:i.inputFieldClass,style:t.inputStyle,value:t.modelValue,"aria-labelledby":e.ariaLabelledby,"aria-label":e.ariaLabel,"aria-controls":t.panelProps&&t.panelProps.id||t.panelId||i.panelUniqueId,"aria-expanded":s.overlayVisible,"aria-haspopup":!0,placeholder:t.placeholder,required:t.required,onInput:i.onInput,onFocus:i.onFocus,onBlur:i.onBlur,onKeyup:i.onKeyUp,onInvalid:i.onInvalid},t.inputProps),null,16,["id","type","class","style","value","aria-labelledby","aria-label","aria-controls","aria-expanded","placeholder","required","onInput","onFocus","onBlur","onKeyup","onInvalid"]),t.toggleMask?(u(),p("i",{key:0,class:c(i.toggleIconClass),onClick:l[0]||(l[0]=(...o)=>i.onMaskToggle&&i.onMaskToggle(...o))},null,2)):m("",!0),r("span",z,g(s.infoText),1),h(k,{appendTo:t.appendTo},{default:v(()=>[h(I,{name:"p-connected-overlay",onEnter:i.onOverlayEnter,onLeave:i.onOverlayLeave,onAfterLeave:i.onOverlayAfterLeave},{default:v(()=>[s.overlayVisible?(u(),p("div",y({key:0,ref:i.overlayRef,id:t.panelId||i.panelUniqueId,class:i.panelStyleClass,style:t.panelStyle,onClick:l[1]||(l[1]=(...o)=>i.onOverlayClick&&i.onOverlayClick(...o))},t.panelProps),[f(e.$slots,"header"),f(e.$slots,"content",{},()=>[r("div",R,[r("div",{class:c(i.strengthClass),style:V({width:s.meter?s.meter.width:""})},null,6)]),r("div",B,g(s.infoText),1)]),f(e.$slots,"footer")],16,E)):m("",!0)]),_:3},8,["onEnter","onLeave","onAfterLeave"])]),_:3},8,["appendTo"])],2)}function H(e,l){l===void 0&&(l={});var t=l.insertAt;if(!(!e||typeof document>"u")){var n=document.head||document.getElementsByTagName("head")[0],s=document.createElement("style");s.type="text/css",t==="top"&&n.firstChild?n.insertBefore(s,n.firstChild):n.appendChild(s),s.styleSheet?s.styleSheet.cssText=e:s.appendChild(document.createTextNode(e))}}var A=`
.p-password {
    position: relative;
    display: inline-flex;
}
.p-password-panel {
    position: absolute;
    top: 0;
    left: 0;
}
.p-password .p-password-panel {
    min-width: 100%;
}
.p-password-meter {
    height: 10px;
}
.p-password-strength {
    height: 100%;
    width: 0;
    transition: width 1s ease-in-out;
}
.p-fluid .p-password {
    display: flex;
}
.p-password-input::-ms-reveal,
.p-password-input::-ms-clear {
    display: none;
}
`;H(A);P.render=O;export{P as s};
