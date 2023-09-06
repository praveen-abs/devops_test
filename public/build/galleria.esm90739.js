import{D as c,U as A,R as C,o,c as d,r as S,a as h,d as m,n as f,k as g,m as b,p as B,F as I,f as y,j as x,Z as k,s as D,x as $,b as v,e as w,h as T,w as V,T as F,g as _}from"./toastservice.esm90739.js";var E={name:"Carousel",emits:["update:page"],props:{value:null,page:{type:Number,default:0},numVisible:{type:Number,default:1},numScroll:{type:Number,default:1},responsiveOptions:Array,orientation:{type:String,default:"horizontal"},verticalViewPortHeight:{type:String,default:"300px"},contentClass:String,containerClass:String,indicatorsContentClass:String,circular:{type:Boolean,default:!1},autoplayInterval:{type:Number,default:0},showNavigators:{type:Boolean,default:!0},showIndicators:{type:Boolean,default:!0},prevButtonProps:{type:null,default:null},nextButtonProps:{type:null,default:null}},isRemainingItemsAdded:!1,data(){return{remainingItems:0,d_numVisible:this.numVisible,d_numScroll:this.numScroll,d_oldNumScroll:0,d_oldNumVisible:0,d_oldValue:null,d_page:this.page,totalShiftedItems:this.page*this.numScroll*-1,allowAutoplay:!!this.autoplayInterval,d_circular:this.circular||this.allowAutoplay,swipeThreshold:20}},watch:{page(e){this.d_page=e},circular(e){this.d_circular=e},numVisible(e,t){this.d_numVisible=e,this.d_oldNumVisible=t},numScroll(e,t){this.d_oldNumScroll=t,this.d_numScroll=e},value(e){this.d_oldValue=e}},mounted(){let e=!1;if(this.$el.setAttribute(this.attributeSelector,""),this.createStyle(),this.calculatePosition(),this.responsiveOptions&&this.bindDocumentListeners(),this.isCircular()){let t=this.totalShiftedItems;this.d_page===0?t=-1*this.d_numVisible:t===0&&(t=-1*this.value.length,this.remainingItems>0&&(this.isRemainingItemsAdded=!0)),t!==this.totalShiftedItems&&(this.totalShiftedItems=t,e=!0)}!e&&this.isAutoplay()&&this.startAutoplay()},updated(){const e=this.isCircular();let t=!1,i=this.totalShiftedItems;if(this.autoplayInterval&&this.stopAutoplay(),this.d_oldNumScroll!==this.d_numScroll||this.d_oldNumVisible!==this.d_numVisible||this.d_oldValue.length!==this.value.length){this.remainingItems=(this.value.length-this.d_numVisible)%this.d_numScroll;let s=this.d_page;this.totalIndicators!==0&&s>=this.totalIndicators&&(s=this.totalIndicators-1,this.$emit("update:page",s),this.d_page=s,t=!0),i=s*this.d_numScroll*-1,e&&(i-=this.d_numVisible),s===this.totalIndicators-1&&this.remainingItems>0?(i+=-1*this.remainingItems+this.d_numScroll,this.isRemainingItemsAdded=!0):this.isRemainingItemsAdded=!1,i!==this.totalShiftedItems&&(this.totalShiftedItems=i,t=!0),this.d_oldNumScroll=this.d_numScroll,this.d_oldNumVisible=this.d_numVisible,this.d_oldValue=this.value,this.$refs.itemsContainer.style.transform=this.isVertical()?`translate3d(0, ${i*(100/this.d_numVisible)}%, 0)`:`translate3d(${i*(100/this.d_numVisible)}%, 0, 0)`}e&&(this.d_page===0?i=-1*this.d_numVisible:i===0&&(i=-1*this.value.length,this.remainingItems>0&&(this.isRemainingItemsAdded=!0)),i!==this.totalShiftedItems&&(this.totalShiftedItems=i,t=!0)),!t&&this.isAutoplay()&&this.startAutoplay()},beforeUnmount(){this.responsiveOptions&&this.unbindDocumentListeners(),this.autoplayInterval&&this.stopAutoplay()},methods:{step(e,t){let i=this.totalShiftedItems;const s=this.isCircular();if(t!=null)i=this.d_numScroll*t*-1,s&&(i-=this.d_numVisible),this.isRemainingItemsAdded=!1;else{i+=this.d_numScroll*e,this.isRemainingItemsAdded&&(i+=this.remainingItems-this.d_numScroll*e,this.isRemainingItemsAdded=!1);let n=s?i+this.d_numVisible:i;t=Math.abs(Math.floor(n/this.d_numScroll))}s&&this.d_page===this.totalIndicators-1&&e===-1?(i=-1*(this.value.length+this.d_numVisible),t=0):s&&this.d_page===0&&e===1?(i=0,t=this.totalIndicators-1):t===this.totalIndicators-1&&this.remainingItems>0&&(i+=this.remainingItems*-1-this.d_numScroll*e,this.isRemainingItemsAdded=!0),this.$refs.itemsContainer&&(c.removeClass(this.$refs.itemsContainer,"p-items-hidden"),this.$refs.itemsContainer.style.transform=this.isVertical()?`translate3d(0, ${i*(100/this.d_numVisible)}%, 0)`:`translate3d(${i*(100/this.d_numVisible)}%, 0, 0)`,this.$refs.itemsContainer.style.transition="transform 500ms ease 0s"),this.totalShiftedItems=i,this.$emit("update:page",t),this.d_page=t},calculatePosition(){if(this.$refs.itemsContainer&&this.responsiveOptions){let e=window.innerWidth,t={numVisible:this.numVisible,numScroll:this.numScroll};for(let i=0;i<this.responsiveOptions.length;i++){let s=this.responsiveOptions[i];parseInt(s.breakpoint,10)>=e&&(t=s)}if(this.d_numScroll!==t.numScroll){let i=this.d_page;i=parseInt(i*this.d_numScroll/t.numScroll),this.totalShiftedItems=t.numScroll*i*-1,this.isCircular()&&(this.totalShiftedItems-=t.numVisible),this.d_numScroll=t.numScroll,this.$emit("update:page",i),this.d_page=i}this.d_numVisible!==t.numVisible&&(this.d_numVisible=t.numVisible)}},navBackward(e,t){(this.d_circular||this.d_page!==0)&&this.step(1,t),this.allowAutoplay=!1,e.cancelable&&e.preventDefault()},navForward(e,t){(this.d_circular||this.d_page<this.totalIndicators-1)&&this.step(-1,t),this.allowAutoplay=!1,e.cancelable&&e.preventDefault()},onIndicatorClick(e,t){let i=this.d_page;t>i?this.navForward(e,t):t<i&&this.navBackward(e,t)},onTransitionEnd(){this.$refs.itemsContainer&&(c.addClass(this.$refs.itemsContainer,"p-items-hidden"),this.$refs.itemsContainer.style.transition="",(this.d_page===0||this.d_page===this.totalIndicators-1)&&this.isCircular()&&(this.$refs.itemsContainer.style.transform=this.isVertical()?`translate3d(0, ${this.totalShiftedItems*(100/this.d_numVisible)}%, 0)`:`translate3d(${this.totalShiftedItems*(100/this.d_numVisible)}%, 0, 0)`))},onTouchStart(e){let t=e.changedTouches[0];this.startPos={x:t.pageX,y:t.pageY}},onTouchMove(e){e.cancelable&&e.preventDefault()},onTouchEnd(e){let t=e.changedTouches[0];this.isVertical()?this.changePageOnTouch(e,t.pageY-this.startPos.y):this.changePageOnTouch(e,t.pageX-this.startPos.x)},changePageOnTouch(e,t){Math.abs(t)>this.swipeThreshold&&(t<0?this.navForward(e):this.navBackward(e))},onIndicatorKeydown(e){switch(e.code){case"ArrowRight":this.onRightKey();break;case"ArrowLeft":this.onLeftKey();break;case"Home":this.onHomeKey(),e.preventDefault();break;case"End":this.onEndKey(),e.preventDefault();break;case"ArrowUp":case"ArrowDown":e.preventDefault();break;case"Tab":this.onTabKey();break}},onRightKey(){const e=[...c.find(this.$refs.indicatorContent,".p-carousel-indicator")],t=this.findFocusedIndicatorIndex();this.changedFocusedIndicator(t,t+1===e.length?e.length-1:t+1)},onLeftKey(){const e=this.findFocusedIndicatorIndex();this.changedFocusedIndicator(e,e-1<=0?0:e-1)},onHomeKey(){const e=this.findFocusedIndicatorIndex();this.changedFocusedIndicator(e,0)},onEndKey(){const e=[...c.find(this.$refs.indicatorContent,".p-carousel-indicator")],t=this.findFocusedIndicatorIndex();this.changedFocusedIndicator(t,e.length-1)},onTabKey(){const e=[...c.find(this.$refs.indicatorContent,".p-carousel-indicator")],t=e.findIndex(n=>c.hasClass(n,"p-highlight")),i=c.findSingle(this.$refs.indicatorContent,'.p-carousel-indicator > button[tabindex="0"]'),s=e.findIndex(n=>n===i.parentElement);e[s].children[0].tabIndex="-1",e[t].children[0].tabIndex="0"},findFocusedIndicatorIndex(){const e=[...c.find(this.$refs.indicatorContent,".p-carousel-indicator")],t=c.findSingle(this.$refs.indicatorContent,'.p-carousel-indicator > button[tabindex="0"]');return e.findIndex(i=>i===t.parentElement)},changedFocusedIndicator(e,t){const i=[...c.find(this.$refs.indicatorContent,".p-carousel-indicator")];i[e].children[0].tabIndex="-1",i[t].children[0].tabIndex="0",i[t].children[0].focus()},bindDocumentListeners(){this.documentResizeListener||(this.documentResizeListener=e=>{this.calculatePosition(e)},window.addEventListener("resize",this.documentResizeListener))},unbindDocumentListeners(){this.documentResizeListener&&(window.removeEventListener("resize",this.documentResizeListener),this.documentResizeListener=null)},startAutoplay(){this.interval=setInterval(()=>{this.d_page===this.totalIndicators-1?this.step(-1,0):this.step(-1,this.d_page+1)},this.autoplayInterval)},stopAutoplay(){this.interval&&clearInterval(this.interval)},createStyle(){this.carouselStyle||(this.carouselStyle=document.createElement("style"),this.carouselStyle.type="text/css",document.body.appendChild(this.carouselStyle));let e=`
                .p-carousel[${this.attributeSelector}] .p-carousel-item {
                    flex: 1 0 ${100/this.d_numVisible}%
                }
            `;if(this.responsiveOptions){let t=[...this.responsiveOptions];t.sort((i,s)=>{const n=i.breakpoint,a=s.breakpoint;let u=null;return n==null&&a!=null?u=-1:n!=null&&a==null?u=1:n==null&&a==null?u=0:typeof n=="string"&&typeof a=="string"?u=n.localeCompare(a,void 0,{numeric:!0}):u=n<a?-1:n>a?1:0,-1*u});for(let i=0;i<t.length;i++){let s=t[i];e+=`
                        @media screen and (max-width: ${s.breakpoint}) {
                            .p-carousel[${this.attributeSelector}] .p-carousel-item {
                                flex: 1 0 ${100/s.numVisible}%
                            }
                        }
                    `}}this.carouselStyle.innerHTML=e},isVertical(){return this.orientation==="vertical"},isCircular(){return this.value&&this.d_circular&&this.value.length>=this.d_numVisible},isAutoplay(){return this.autoplayInterval&&this.allowAutoplay},firstIndex(){return this.isCircular()?-1*(this.totalShiftedItems+this.d_numVisible):this.totalShiftedItems*-1},lastIndex(){return this.firstIndex()+this.d_numVisible-1},ariaSlideNumber(e){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria.slideNumber.replace(/{slideNumber}/g,e):void 0},ariaPageLabel(e){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria.pageLabel.replace(/{page}/g,e):void 0}},computed:{totalIndicators(){return this.value?Math.max(Math.ceil((this.value.length-this.d_numVisible)/this.d_numScroll)+1,0):0},backwardIsDisabled(){return this.value&&(!this.circular||this.value.length<this.d_numVisible)&&this.d_page===0},forwardIsDisabled(){return this.value&&(!this.circular||this.value.length<this.d_numVisible)&&(this.d_page===this.totalIndicators-1||this.totalIndicators===0)},containerClasses(){return["p-carousel-container",this.containerClass]},contentClasses(){return["p-carousel-content ",this.contentClass]},indicatorsContentClasses(){return["p-carousel-indicators p-reset",this.indicatorsContentClass]},ariaSlideLabel(){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria.slide:void 0},ariaPrevButtonLabel(){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria.prevPageLabel:void 0},ariaNextButtonLabel(){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria.nextPageLabel:void 0},attributeSelector(){return A()}},directives:{ripple:C}};const O={key:0,class:"p-carousel-header"},R=["aria-live"],K=["disabled","aria-label"],H=["aria-hidden","aria-label","aria-roledescription"],M=["disabled","aria-label"],z=["tabindex","aria-label","aria-current","onClick"],j={key:1,class:"p-carousel-footer"};function U(e,t,i,s,n,a){const u=x("ripple");return o(),d("div",{class:f(["p-carousel p-component",{"p-carousel-vertical":a.isVertical(),"p-carousel-horizontal":!a.isVertical()}]),role:"region"},[e.$slots.header?(o(),d("div",O,[S(e.$slots,"header")])):h("",!0),m("div",{class:f(a.contentClasses)},[m("div",{class:f(a.containerClasses),"aria-live":n.allowAutoplay?"polite":"off"},[i.showNavigators?g((o(),d("button",b({key:0,type:"button",class:["p-carousel-prev p-link",{"p-disabled":a.backwardIsDisabled}],disabled:a.backwardIsDisabled,"aria-label":a.ariaPrevButtonLabel,onClick:t[0]||(t[0]=(...r)=>a.navBackward&&a.navBackward(...r))},i.prevButtonProps),[m("span",{class:f(["p-carousel-prev-icon pi",{"pi-chevron-left":!a.isVertical(),"pi-chevron-up":a.isVertical()}])},null,2)],16,K)),[[u]]):h("",!0),m("div",{class:"p-carousel-items-content",style:B([{height:a.isVertical()?i.verticalViewPortHeight:"auto"}]),onTouchend:t[2]||(t[2]=(...r)=>a.onTouchEnd&&a.onTouchEnd(...r)),onTouchstart:t[3]||(t[3]=(...r)=>a.onTouchStart&&a.onTouchStart(...r)),onTouchmove:t[4]||(t[4]=(...r)=>a.onTouchMove&&a.onTouchMove(...r))},[m("div",{ref:"itemsContainer",class:"p-carousel-items-container",onTransitionend:t[1]||(t[1]=(...r)=>a.onTransitionEnd&&a.onTransitionEnd(...r))},[a.isCircular()?(o(!0),d(I,{key:0},y(i.value.slice(-1*n.d_numVisible),(r,l)=>(o(),d("div",{key:l+"_scloned",class:f(["p-carousel-item p-carousel-item-cloned",{"p-carousel-item-active":n.totalShiftedItems*-1===i.value.length+n.d_numVisible,"p-carousel-item-start":l===0,"p-carousel-item-end":i.value.slice(-1*n.d_numVisible).length-1===l}])},[S(e.$slots,"item",{data:r,index:l})],2))),128)):h("",!0),(o(!0),d(I,null,y(i.value,(r,l)=>(o(),d("div",{key:l,class:f(["p-carousel-item",{"p-carousel-item-active":a.firstIndex()<=l&&a.lastIndex()>=l,"p-carousel-item-start":a.firstIndex()===l,"p-carousel-item-end":a.lastIndex()===l}]),role:"group","aria-hidden":a.firstIndex()>l||a.lastIndex()<l?!0:void 0,"aria-label":a.ariaSlideNumber(l),"aria-roledescription":a.ariaSlideLabel},[S(e.$slots,"item",{data:r,index:l})],10,H))),128)),a.isCircular()?(o(!0),d(I,{key:1},y(i.value.slice(0,n.d_numVisible),(r,l)=>(o(),d("div",{key:l+"_fcloned",class:f(["p-carousel-item p-carousel-item-cloned",{"p-carousel-item-active":n.totalShiftedItems===0,"p-carousel-item-start":l===0,"p-carousel-item-end":i.value.slice(0,n.d_numVisible).length-1===l}])},[S(e.$slots,"item",{data:r,index:l})],2))),128)):h("",!0)],544)],36),i.showNavigators?g((o(),d("button",b({key:1,type:"button",class:["p-carousel-next p-link",{"p-disabled":a.forwardIsDisabled}],disabled:a.forwardIsDisabled,"aria-label":a.ariaNextButtonLabel,onClick:t[5]||(t[5]=(...r)=>a.navForward&&a.navForward(...r))},i.nextButtonProps),[m("span",{class:f(["p-carousel-prev-icon pi",{"pi-chevron-right":!a.isVertical(),"pi-chevron-down":a.isVertical()}])},null,2)],16,M)),[[u]]):h("",!0)],10,R),a.totalIndicators>=0&&i.showIndicators?(o(),d("ul",{key:0,ref:"indicatorContent",class:f(a.indicatorsContentClasses),onKeydown:t[6]||(t[6]=(...r)=>a.onIndicatorKeydown&&a.onIndicatorKeydown(...r))},[(o(!0),d(I,null,y(a.totalIndicators,(r,l)=>(o(),d("li",{key:"p-carousel-indicator-"+l.toString(),class:f(["p-carousel-indicator",{"p-highlight":n.d_page===l}])},[m("button",{class:"p-link",type:"button",tabindex:n.d_page===l?"0":"-1","aria-label":a.ariaPageLabel(l+1),"aria-current":n.d_page===l?"page":void 0,onClick:p=>a.onIndicatorClick(p,l)},null,8,z)],2))),128))],34)):h("",!0)],2),e.$slots.footer?(o(),d("div",j,[S(e.$slots,"footer")])):h("",!0)],2)}function G(e,t){t===void 0&&(t={});var i=t.insertAt;if(!(!e||typeof document>"u")){var s=document.head||document.getElementsByTagName("head")[0],n=document.createElement("style");n.type="text/css",i==="top"&&s.firstChild?s.insertBefore(n,s.firstChild):s.appendChild(n),n.styleSheet?n.styleSheet.cssText=e:n.appendChild(document.createTextNode(e))}}var W=`
.p-carousel {
    display: flex;
    flex-direction: column;
}
.p-carousel-content {
    display: flex;
    flex-direction: column;
    overflow: auto;
}
.p-carousel-prev,
.p-carousel-next {
    align-self: center;
    flex-grow: 0;
    flex-shrink: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    position: relative;
}
.p-carousel-container {
    display: flex;
    flex-direction: row;
}
.p-carousel-items-content {
    overflow: hidden;
    width: 100%;
}
.p-carousel-items-container {
    display: flex;
    flex-direction: row;
}
.p-carousel-indicators {
    display: flex;
    flex-direction: row;
    justify-content: center;
    flex-wrap: wrap;
}
.p-carousel-indicator > button {
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Vertical */
.p-carousel-vertical .p-carousel-container {
    flex-direction: column;
}
.p-carousel-vertical .p-carousel-items-container {
    flex-direction: column;
    height: 100%;
}

/* Keyboard Support */
.p-items-hidden .p-carousel-item {
    visibility: hidden;
}
.p-items-hidden .p-carousel-item.p-carousel-item-active {
    visibility: visible;
}
`;G(W);E.render=U;var P={name:"GalleriaItem",emits:["start-slideshow","stop-slideshow","update:activeIndex"],props:{circular:{type:Boolean,default:!1},activeIndex:{type:Number,default:0},value:{type:Array,default:null},showItemNavigators:{type:Boolean,default:!0},showIndicators:{type:Boolean,default:!0},slideShowActive:{type:Boolean,default:!0},changeItemOnIndicatorHover:{type:Boolean,default:!0},autoPlay:{type:Boolean,default:!1},templates:{type:null,default:null},id:{type:String,default:null}},mounted(){this.autoPlay&&this.$emit("start-slideshow")},methods:{next(){let e=this.activeIndex+1,t=this.circular&&this.value.length-1===this.activeIndex?0:e;this.$emit("update:activeIndex",t)},prev(){let e=this.activeIndex!==0?this.activeIndex-1:0,t=this.circular&&this.activeIndex===0?this.value.length-1:e;this.$emit("update:activeIndex",t)},stopSlideShow(){this.slideShowActive&&this.stopSlideShow&&this.$emit("stop-slideshow")},navBackward(e){this.stopSlideShow(),this.prev(),e&&e.cancelable&&e.preventDefault()},navForward(e){this.stopSlideShow(),this.next(),e&&e.cancelable&&e.preventDefault()},onIndicatorClick(e){this.stopSlideShow(),this.$emit("update:activeIndex",e)},onIndicatorMouseEnter(e){this.changeItemOnIndicatorHover&&(this.stopSlideShow(),this.$emit("update:activeIndex",e))},onIndicatorKeyDown(e,t){switch(e.code){case"Enter":case"Space":this.stopSlideShow(),this.$emit("update:activeIndex",t),e.preventDefault();break;case"ArrowDown":case"ArrowUp":e.preventDefault();break}},isIndicatorItemActive(e){return this.activeIndex===e},isNavBackwardDisabled(){return!this.circular&&this.activeIndex===0},isNavForwardDisabled(){return!this.circular&&this.activeIndex===this.value.length-1},ariaSlideNumber(e){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria.slideNumber.replace(/{slideNumber}/g,e):void 0},ariaPageLabel(e){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria.pageLabel.replace(/{page}/g,e):void 0}},computed:{activeItem(){return this.value[this.activeIndex]},navBackwardClass(){return["p-galleria-item-prev p-galleria-item-nav p-link",{"p-disabled":this.isNavBackwardDisabled()}]},navForwardClass(){return["p-galleria-item-next p-galleria-item-nav p-link",{"p-disabled":this.isNavForwardDisabled()}]},ariaSlideLabel(){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria.slide:void 0}},directives:{ripple:C}};const X={class:"p-galleria-item-wrapper"},Y={class:"p-galleria-item-container"},Z=["disabled"],q=m("span",{class:"p-galleria-item-prev-icon pi pi-chevron-left"},null,-1),J=[q],Q=["id","aria-label","aria-roledescription"],ee=["disabled"],te=m("span",{class:"p-galleria-item-next-icon pi pi-chevron-right"},null,-1),ie=[te],ae={key:2,class:"p-galleria-caption"},ne={key:0,class:"p-galleria-indicators p-reset"},se=["aria-label","aria-selected","aria-controls","onClick","onMouseenter","onKeydown"],le={key:0,type:"button",tabindex:"-1",class:"p-link"};function re(e,t,i,s,n,a){const u=x("ripple");return o(),d("div",X,[m("div",Y,[i.showItemNavigators?g((o(),d("button",{key:0,type:"button",class:f(a.navBackwardClass),onClick:t[0]||(t[0]=r=>a.navBackward(r)),disabled:a.isNavBackwardDisabled()},J,10,Z)),[[u]]):h("",!0),m("div",{id:i.id+"_item_"+i.activeIndex,class:"p-galleria-item",role:"group","aria-label":a.ariaSlideNumber(i.activeIndex+1),"aria-roledescription":a.ariaSlideLabel},[i.templates.item?(o(),v(w(i.templates.item),{key:0,item:a.activeItem},null,8,["item"])):h("",!0)],8,Q),i.showItemNavigators?g((o(),d("button",{key:1,type:"button",class:f(a.navForwardClass),onClick:t[1]||(t[1]=r=>a.navForward(r)),disabled:a.isNavForwardDisabled()},ie,10,ee)),[[u]]):h("",!0),i.templates.caption?(o(),d("div",ae,[i.templates.caption?(o(),v(w(i.templates.caption),{key:0,item:a.activeItem},null,8,["item"])):h("",!0)])):h("",!0)]),i.showIndicators?(o(),d("ul",ne,[(o(!0),d(I,null,y(i.value,(r,l)=>(o(),d("li",{key:`p-galleria-indicator-${l}`,class:f(["p-galleria-indicator",{"p-highlight":a.isIndicatorItemActive(l)}]),tabindex:"0","aria-label":a.ariaPageLabel(l+1),"aria-selected":i.activeIndex===l,"aria-controls":i.id+"_item_"+l,onClick:p=>a.onIndicatorClick(l),onMouseenter:p=>a.onIndicatorMouseEnter(l),onKeydown:p=>a.onIndicatorKeyDown(p,l)},[i.templates.indicator?h("",!0):(o(),d("button",le)),i.templates.indicator?(o(),v(w(i.templates.indicator),{key:1,index:l},null,8,["index"])):h("",!0)],42,se))),128))])):h("",!0)])}P.render=re;var N={name:"GalleriaThumbnails",emits:["stop-slideshow","update:activeIndex"],props:{containerId:{type:String,default:null},value:{type:Array,default:null},numVisible:{type:Number,default:3},activeIndex:{type:Number,default:0},isVertical:{type:Boolean,default:!1},slideShowActive:{type:Boolean,default:!1},circular:{type:Boolean,default:!1},responsiveOptions:{type:Array,default:null},contentHeight:{type:String,default:"300px"},showThumbnailNavigators:{type:Boolean,default:!0},templates:{type:null,default:null},prevButtonProps:{type:null,default:null},nextButtonProps:{type:null,default:null}},startPos:null,thumbnailsStyle:null,sortedResponsiveOptions:null,data(){return{d_numVisible:this.numVisible,d_oldNumVisible:this.numVisible,d_activeIndex:this.activeIndex,d_oldActiveItemIndex:this.activeIndex,totalShiftedItems:0,page:0}},watch:{numVisible(e,t){this.d_numVisible=e,this.d_oldNumVisible=t},activeIndex(e,t){this.d_activeIndex=e,this.d_oldActiveItemIndex=t}},mounted(){this.createStyle(),this.calculatePosition(),this.responsiveOptions&&this.bindDocumentListeners()},updated(){let e=this.totalShiftedItems;(this.d_oldNumVisible!==this.d_numVisible||this.d_oldActiveItemIndex!==this.d_activeIndex)&&(this.d_activeIndex<=this.getMedianItemIndex()?e=0:this.value.length-this.d_numVisible+this.getMedianItemIndex()<this.d_activeIndex?e=this.d_numVisible-this.value.length:this.value.length-this.d_numVisible<this.d_activeIndex&&this.d_numVisible%2===0?e=this.d_activeIndex*-1+this.getMedianItemIndex()+1:e=this.d_activeIndex*-1+this.getMedianItemIndex(),e!==this.totalShiftedItems&&(this.totalShiftedItems=e),this.$refs.itemsContainer.style.transform=this.isVertical?`translate3d(0, ${e*(100/this.d_numVisible)}%, 0)`:`translate3d(${e*(100/this.d_numVisible)}%, 0, 0)`,this.d_oldActiveItemIndex!==this.d_activeIndex&&(c.removeClass(this.$refs.itemsContainer,"p-items-hidden"),this.$refs.itemsContainer.style.transition="transform 500ms ease 0s"),this.d_oldActiveItemIndex=this.d_activeIndex,this.d_oldNumVisible=this.d_numVisible)},beforeUnmount(){this.responsiveOptions&&this.unbindDocumentListeners(),this.thumbnailsStyle&&this.thumbnailsStyle.parentNode.removeChild(this.thumbnailsStyle)},methods:{step(e){let t=this.totalShiftedItems+e;e<0&&-1*t+this.d_numVisible>this.value.length-1?t=this.d_numVisible-this.value.length:e>0&&t>0&&(t=0),this.circular&&(e<0&&this.value.length-1===this.d_activeIndex?t=0:e>0&&this.d_activeIndex===0&&(t=this.d_numVisible-this.value.length)),this.$refs.itemsContainer&&(c.removeClass(this.$refs.itemsContainer,"p-items-hidden"),this.$refs.itemsContainer.style.transform=this.isVertical?`translate3d(0, ${t*(100/this.d_numVisible)}%, 0)`:`translate3d(${t*(100/this.d_numVisible)}%, 0, 0)`,this.$refs.itemsContainer.style.transition="transform 500ms ease 0s"),this.totalShiftedItems=t},stopSlideShow(){this.slideShowActive&&this.stopSlideShow&&this.$emit("stop-slideshow")},getMedianItemIndex(){let e=Math.floor(this.d_numVisible/2);return this.d_numVisible%2?e:e-1},navBackward(e){this.stopSlideShow();let t=this.d_activeIndex!==0?this.d_activeIndex-1:0,i=t+this.totalShiftedItems;this.d_numVisible-i-1>this.getMedianItemIndex()&&(-1*this.totalShiftedItems!==0||this.circular)&&this.step(1);let s=this.circular&&this.d_activeIndex===0?this.value.length-1:t;this.$emit("update:activeIndex",s),e.cancelable&&e.preventDefault()},navForward(e){this.stopSlideShow();let t=this.d_activeIndex===this.value.length-1?this.value.length-1:this.d_activeIndex+1;t+this.totalShiftedItems>this.getMedianItemIndex()&&(-1*this.totalShiftedItems<this.getTotalPageNumber()-1||this.circular)&&this.step(-1);let i=this.circular&&this.value.length-1===this.d_activeIndex?0:t;this.$emit("update:activeIndex",i),e.cancelable&&e.preventDefault()},onItemClick(e){this.stopSlideShow();let t=e;if(t!==this.d_activeIndex){const i=t+this.totalShiftedItems;let s=0;t<this.d_activeIndex?(s=this.d_numVisible-i-1-this.getMedianItemIndex(),s>0&&-1*this.totalShiftedItems!==0&&this.step(s)):(s=this.getMedianItemIndex()-i,s<0&&-1*this.totalShiftedItems<this.getTotalPageNumber()-1&&this.step(s)),this.$emit("update:activeIndex",t)}},onThumbnailKeydown(e,t){switch((e.code==="Enter"||e.code==="Space")&&(this.onItemClick(t),e.preventDefault()),e.code){case"ArrowRight":this.onRightKey();break;case"ArrowLeft":this.onLeftKey();break;case"Home":this.onHomeKey(),e.preventDefault();break;case"End":this.onEndKey(),e.preventDefault();break;case"ArrowUp":case"ArrowDown":e.preventDefault();break;case"Tab":this.onTabKey();break}},onRightKey(){const e=c.find(this.$refs.itemsContainer,".p-galleria-thumbnail-item"),t=this.findFocusedIndicatorIndex();this.changedFocusedIndicator(t,t+1===e.length?e.length-1:t+1)},onLeftKey(){const e=this.findFocusedIndicatorIndex();this.changedFocusedIndicator(e,e-1<=0?0:e-1)},onHomeKey(){const e=this.findFocusedIndicatorIndex();this.changedFocusedIndicator(e,0)},onEndKey(){const e=c.find(this.$refs.itemsContainer,".p-galleria-thumbnail-item"),t=this.findFocusedIndicatorIndex();this.changedFocusedIndicator(t,e.length-1)},onTabKey(){const e=[...c.find(this.$refs.itemsContainer,".p-galleria-thumbnail-item")],t=e.findIndex(n=>c.hasClass(n,"p-galleria-thumbnail-item-current")),i=c.findSingle(this.$refs.itemsContainer,'.p-galleria-thumbnail-item > [tabindex="0"'),s=e.findIndex(n=>n===i.parentElement);e[s].children[0].tabIndex="-1",e[t].children[0].tabIndex="0"},findFocusedIndicatorIndex(){const e=[...c.find(this.$refs.itemsContainer,".p-galleria-thumbnail-item")],t=c.findSingle(this.$refs.itemsContainer,'.p-galleria-thumbnail-item > [tabindex="0"]');return e.findIndex(i=>i===t.parentElement)},changedFocusedIndicator(e,t){const i=c.find(this.$refs.itemsContainer,".p-galleria-thumbnail-item");i[e].children[0].tabIndex="-1",i[t].children[0].tabIndex="0",i[t].children[0].focus()},onTransitionEnd(){this.$refs.itemsContainer&&(c.addClass(this.$refs.itemsContainer,"p-items-hidden"),this.$refs.itemsContainer.style.transition="")},onTouchStart(e){let t=e.changedTouches[0];this.startPos={x:t.pageX,y:t.pageY}},onTouchMove(e){e.cancelable&&e.preventDefault()},onTouchEnd(e){let t=e.changedTouches[0];this.isVertical?this.changePageOnTouch(e,t.pageY-this.startPos.y):this.changePageOnTouch(e,t.pageX-this.startPos.x)},changePageOnTouch(e,t){t<0?this.navForward(e):this.navBackward(e)},getTotalPageNumber(){return this.value.length>this.d_numVisible?this.value.length-this.d_numVisible+1:0},createStyle(){this.thumbnailsStyle||(this.thumbnailsStyle=document.createElement("style"),this.thumbnailsStyle.type="text/css",document.body.appendChild(this.thumbnailsStyle));let e=`
                #${this.containerId} .p-galleria-thumbnail-item {
                    flex: 1 0 ${100/this.d_numVisible}%
                }
            `;if(this.responsiveOptions){this.sortedResponsiveOptions=[...this.responsiveOptions],this.sortedResponsiveOptions.sort((t,i)=>{const s=t.breakpoint,n=i.breakpoint;let a=null;return s==null&&n!=null?a=-1:s!=null&&n==null?a=1:s==null&&n==null?a=0:typeof s=="string"&&typeof n=="string"?a=s.localeCompare(n,void 0,{numeric:!0}):a=s<n?-1:s>n?1:0,-1*a});for(let t=0;t<this.sortedResponsiveOptions.length;t++){let i=this.sortedResponsiveOptions[t];e+=`
                        @media screen and (max-width: ${i.breakpoint}) {
                            #${this.containerId} .p-galleria-thumbnail-item {
                                flex: 1 0 ${100/i.numVisible}%
                            }
                        }
                    `}}this.thumbnailsStyle.innerHTML=e},calculatePosition(){if(this.$refs.itemsContainer&&this.sortedResponsiveOptions){let e=window.innerWidth,t={numVisible:this.numVisible};for(let i=0;i<this.sortedResponsiveOptions.length;i++){let s=this.sortedResponsiveOptions[i];parseInt(s.breakpoint,10)>=e&&(t=s)}this.d_numVisible!==t.numVisible&&(this.d_numVisible=t.numVisible)}},bindDocumentListeners(){this.documentResizeListener||(this.documentResizeListener=()=>{this.calculatePosition()},window.addEventListener("resize",this.documentResizeListener))},unbindDocumentListeners(){this.documentResizeListener&&(window.removeEventListener("resize",this.documentResizeListener),this.documentResizeListener=null)},isNavBackwardDisabled(){return!this.circular&&this.d_activeIndex===0||this.value.length<=this.d_numVisible},isNavForwardDisabled(){return!this.circular&&this.d_activeIndex===this.value.length-1||this.value.length<=this.d_numVisible},firstItemAciveIndex(){return this.totalShiftedItems*-1},lastItemActiveIndex(){return this.firstItemAciveIndex()+this.d_numVisible-1},isItemActive(e){return this.firstItemAciveIndex()<=e&&this.lastItemActiveIndex()>=e},ariaPageLabel(e){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria.pageLabel.replace(/{page}/g,e):void 0}},computed:{navBackwardClass(){return["p-galleria-thumbnail-prev p-link",{"p-disabled":this.isNavBackwardDisabled()}]},navForwardClass(){return["p-galleria-thumbnail-next p-link",{"p-disabled":this.isNavForwardDisabled()}]},navBackwardIconClass(){return["p-galleria-thumbnail-prev-icon pi",{"pi-chevron-left":!this.isVertical,"pi-chevron-up":this.isVertical}]},navForwardIconClass(){return["p-galleria-thumbnail-next-icon pi",{"pi-chevron-right":!this.isVertical,"pi-chevron-down":this.isVertical}]},ariaPrevButtonLabel(){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria.prevPageLabel:void 0},ariaNextButtonLabel(){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria.nextPageLabel:void 0}},directives:{ripple:C}};const oe={class:"p-galleria-thumbnail-wrapper"},de={class:"p-galleria-thumbnail-container"},ce=["disabled","aria-label"],he=["aria-selected","aria-controls","onKeydown"],ue=["tabindex","aria-label","aria-current","onClick"],me=["disabled","aria-label"];function pe(e,t,i,s,n,a){const u=x("ripple");return o(),d("div",oe,[m("div",de,[i.showThumbnailNavigators?g((o(),d("button",b({key:0,class:a.navBackwardClass,disabled:a.isNavBackwardDisabled(),type:"button","aria-label":a.ariaPrevButtonLabel,onClick:t[0]||(t[0]=r=>a.navBackward(r))},i.prevButtonProps),[m("span",{class:f(a.navBackwardIconClass)},null,2)],16,ce)),[[u]]):h("",!0),m("div",{class:"p-galleria-thumbnail-items-container",style:B({height:i.isVertical?i.contentHeight:""})},[m("div",{ref:"itemsContainer",class:"p-galleria-thumbnail-items",role:"tablist",onTransitionend:t[1]||(t[1]=(...r)=>a.onTransitionEnd&&a.onTransitionEnd(...r)),onTouchstart:t[2]||(t[2]=r=>a.onTouchStart(r)),onTouchmove:t[3]||(t[3]=r=>a.onTouchMove(r)),onTouchend:t[4]||(t[4]=r=>a.onTouchEnd(r))},[(o(!0),d(I,null,y(i.value,(r,l)=>(o(),d("div",{key:`p-galleria-thumbnail-item-${l}`,class:f(["p-galleria-thumbnail-item",{"p-galleria-thumbnail-item-current":i.activeIndex===l,"p-galleria-thumbnail-item-active":a.isItemActive(l),"p-galleria-thumbnail-item-start":a.firstItemAciveIndex()===l,"p-galleria-thumbnail-item-end":a.lastItemActiveIndex()===l}]),role:"tab","aria-selected":i.activeIndex===l,"aria-controls":i.containerId+"_item_"+l,onKeydown:p=>a.onThumbnailKeydown(p,l)},[m("div",{class:"p-galleria-thumbnail-item-content",tabindex:i.activeIndex===l?"0":"-1","aria-label":a.ariaPageLabel(l+1),"aria-current":i.activeIndex===l?"page":void 0,onClick:p=>a.onItemClick(l)},[i.templates.thumbnail?(o(),v(w(i.templates.thumbnail),{key:0,item:r},null,8,["item"])):h("",!0)],8,ue)],42,he))),128))],544)],4),i.showThumbnailNavigators?g((o(),d("button",b({key:1,class:a.navForwardClass,disabled:a.isNavForwardDisabled(),type:"button","aria-label":a.ariaNextButtonLabel,onClick:t[5]||(t[5]=r=>a.navForward(r))},i.nextButtonProps),[m("span",{class:f(a.navForwardIconClass)},null,2)],16,me)),[[u]]):h("",!0)])])}N.render=pe;var L={name:"GalleriaContent",inheritAttrs:!1,interval:null,emits:["activeitem-change","mask-hide"],data(){return{id:this.$attrs.id||A(),activeIndex:this.$attrs.activeIndex,numVisible:this.$attrs.numVisible,slideShowActive:!1}},watch:{"$attrs.value":function(e){e&&e.length<this.numVisible&&(this.numVisible=e.length)},"$attrs.activeIndex":function(e){this.activeIndex=e},"$attrs.numVisible":function(e){this.numVisible=e}},updated(){this.$emit("activeitem-change",this.activeIndex)},beforeUnmount(){this.slideShowActive&&this.stopSlideShow()},methods:{isAutoPlayActive(){return this.slideShowActive},startSlideShow(){this.interval=setInterval(()=>{let e=this.$attrs.circular&&this.$attrs.value.length-1===this.activeIndex?0:this.activeIndex+1;this.activeIndex=e},this.$attrs.transitionInterval),this.slideShowActive=!0},stopSlideShow(){this.interval&&clearInterval(this.interval),this.slideShowActive=!1},getPositionClass(e,t){const s=["top","left","bottom","right"].find(n=>n===t);return s?`${e}-${s}`:""},isVertical(){return this.$attrs.thumbnailsPosition==="left"||this.$attrs.thumbnailsPosition==="right"}},computed:{galleriaClass(){const e=this.$attrs.showThumbnails&&this.getPositionClass("p-galleria-thumbnails",this.$attrs.thumbnailsPosition),t=this.$attrs.showIndicators&&this.getPositionClass("p-galleria-indicators",this.$attrs.indicatorsPosition);return["p-galleria p-component",{"p-galleria-fullscreen":this.$attrs.fullScreen,"p-galleria-indicator-onitem":this.$attrs.showIndicatorsOnItem,"p-galleria-item-nav-onhover":this.$attrs.showItemNavigatorsOnHover&&!this.$attrs.fullScreen},e,t,this.$attrs.containerClass]},closeAriaLabel(){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria.close:void 0}},components:{GalleriaItem:P,GalleriaThumbnails:N},directives:{ripple:C}};const fe=["id"],ve=["aria-label"],ge=m("span",{class:"p-galleria-close-icon pi pi-times"},null,-1),be=[ge],Ie={key:1,class:"p-galleria-header"},ye=["aria-live"],we={key:2,class:"p-galleria-footer"};function Se(e,t,i,s,n,a){const u=_("GalleriaItem"),r=_("GalleriaThumbnails"),l=x("ripple");return e.$attrs.value&&e.$attrs.value.length>0?(o(),d("div",b({key:0,id:n.id,class:a.galleriaClass,style:e.$attrs.containerStyle},e.$attrs.containerProps),[e.$attrs.fullScreen?g((o(),d("button",{key:0,autofocus:"",type:"button",class:"p-galleria-close p-link","aria-label":a.closeAriaLabel,onClick:t[0]||(t[0]=p=>e.$emit("mask-hide"))},be,8,ve)),[[l]]):h("",!0),e.$attrs.templates&&e.$attrs.templates.header?(o(),d("div",Ie,[(o(),v(w(e.$attrs.templates.header)))])):h("",!0),m("div",{class:"p-galleria-content","aria-live":e.$attrs.autoPlay?"polite":"off"},[T(u,{id:n.id,activeIndex:n.activeIndex,"onUpdate:activeIndex":t[1]||(t[1]=p=>n.activeIndex=p),slideShowActive:n.slideShowActive,"onUpdate:slideShowActive":t[2]||(t[2]=p=>n.slideShowActive=p),value:e.$attrs.value,circular:e.$attrs.circular,templates:e.$attrs.templates,showIndicators:e.$attrs.showIndicators,changeItemOnIndicatorHover:e.$attrs.changeItemOnIndicatorHover,showItemNavigators:e.$attrs.showItemNavigators,autoPlay:e.$attrs.autoPlay,onStartSlideshow:a.startSlideShow,onStopSlideshow:a.stopSlideShow},null,8,["id","activeIndex","slideShowActive","value","circular","templates","showIndicators","changeItemOnIndicatorHover","showItemNavigators","autoPlay","onStartSlideshow","onStopSlideshow"]),e.$attrs.showThumbnails?(o(),v(r,{key:0,activeIndex:n.activeIndex,"onUpdate:activeIndex":t[3]||(t[3]=p=>n.activeIndex=p),slideShowActive:n.slideShowActive,"onUpdate:slideShowActive":t[4]||(t[4]=p=>n.slideShowActive=p),containerId:n.id,value:e.$attrs.value,templates:e.$attrs.templates,numVisible:n.numVisible,responsiveOptions:e.$attrs.responsiveOptions,circular:e.$attrs.circular,isVertical:a.isVertical(),contentHeight:e.$attrs.verticalThumbnailViewPortHeight,showThumbnailNavigators:e.$attrs.showThumbnailNavigators,prevButtonProps:e.$attrs.prevButtonProps,nextButtonProps:e.$attrs.nextButtonProps,onStopSlideshow:a.stopSlideShow},null,8,["activeIndex","slideShowActive","containerId","value","templates","numVisible","responsiveOptions","circular","isVertical","contentHeight","showThumbnailNavigators","prevButtonProps","nextButtonProps","onStopSlideshow"])):h("",!0)],8,ye),e.$attrs.templates&&e.$attrs.templates.footer?(o(),d("div",we,[(o(),v(w(e.$attrs.templates.footer)))])):h("",!0)],16,fe)):h("",!0)}L.render=Se;var xe={name:"Galleria",inheritAttrs:!1,emits:["update:activeIndex","update:visible"],props:{id:{type:String,default:null},value:{type:Array,default:null},activeIndex:{type:Number,default:0},fullScreen:{type:Boolean,default:!1},visible:{type:Boolean,default:!1},numVisible:{type:Number,default:3},responsiveOptions:{type:Array,default:null},showItemNavigators:{type:Boolean,default:!1},showThumbnailNavigators:{type:Boolean,default:!0},showItemNavigatorsOnHover:{type:Boolean,default:!1},changeItemOnIndicatorHover:{type:Boolean,default:!1},circular:{type:Boolean,default:!1},autoPlay:{type:Boolean,default:!1},transitionInterval:{type:Number,default:4e3},showThumbnails:{type:Boolean,default:!0},thumbnailsPosition:{type:String,default:"bottom"},verticalThumbnailViewPortHeight:{type:String,default:"300px"},showIndicators:{type:Boolean,default:!1},showIndicatorsOnItem:{type:Boolean,default:!1},indicatorsPosition:{type:String,default:"bottom"},baseZIndex:{type:Number,default:0},maskClass:{type:String,default:null},containerStyle:{type:null,default:null},containerClass:{type:null,default:null},containerProps:{type:null,default:null},prevButtonProps:{type:null,default:null},nextButtonProps:{type:null,default:null}},container:null,mask:null,data(){return{containerVisible:this.visible}},updated(){this.fullScreen&&this.visible&&(this.containerVisible=this.visible)},beforeUnmount(){this.fullScreen&&c.removeClass(document.body,"p-overflow-hidden"),this.mask=null,this.container&&(k.clear(this.container),this.container=null)},methods:{onBeforeEnter(e){k.set("modal",e,this.baseZIndex||this.$primevue.config.zIndex.modal)},onEnter(e){this.mask.style.zIndex=String(parseInt(e.style.zIndex,10)-1),c.addClass(document.body,"p-overflow-hidden"),this.focus()},onBeforeLeave(){c.addClass(this.mask,"p-component-overlay-leave")},onAfterLeave(e){k.clear(e),this.containerVisible=!1,c.removeClass(document.body,"p-overflow-hidden")},onActiveItemChange(e){this.activeIndex!==e&&this.$emit("update:activeIndex",e)},maskHide(){this.$emit("update:visible",!1)},containerRef(e){this.container=e},maskRef(e){this.mask=e},focus(){let e=this.container.$el.querySelector("[autofocus]");e&&e.focus()}},computed:{maskContentClass(){return["p-galleria-mask p-component-overlay p-component-overlay-enter",this.maskClass,{"p-input-filled":this.$primevue.config.inputStyle==="filled","p-ripple-disabled":this.$primevue.config.ripple===!1}]}},components:{GalleriaContent:L,Portal:D},directives:{focustrap:$}};const _e=["role","aria-modal"];function Ce(e,t,i,s,n,a){const u=_("GalleriaContent"),r=_("Portal"),l=x("focustrap");return i.fullScreen?(o(),v(r,{key:0},{default:V(()=>[n.containerVisible?(o(),d("div",{key:0,ref:a.maskRef,class:f(a.maskContentClass),role:i.fullScreen?"dialog":"region","aria-modal":i.fullScreen?"true":void 0},[T(F,{name:"p-galleria",onBeforeEnter:a.onBeforeEnter,onEnter:a.onEnter,onBeforeLeave:a.onBeforeLeave,onAfterLeave:a.onAfterLeave,appear:""},{default:V(()=>[i.visible?g((o(),v(u,b({key:0,ref:a.containerRef},e.$props,{onMaskHide:a.maskHide,templates:e.$slots,onActiveitemChange:a.onActiveItemChange}),null,16,["onMaskHide","templates","onActiveitemChange"])),[[l]]):h("",!0)]),_:1},8,["onBeforeEnter","onEnter","onBeforeLeave","onAfterLeave"])],10,_e)):h("",!0)]),_:1})):(o(),v(u,b({key:1},e.$props,{templates:e.$slots,onActiveitemChange:a.onActiveItemChange}),null,16,["templates","onActiveitemChange"]))}function ke(e,t){t===void 0&&(t={});var i=t.insertAt;if(!(!e||typeof document>"u")){var s=document.head||document.getElementsByTagName("head")[0],n=document.createElement("style");n.type="text/css",i==="top"&&s.firstChild?s.insertBefore(n,s.firstChild):s.appendChild(n),n.styleSheet?n.styleSheet.cssText=e:n.appendChild(document.createTextNode(e))}}var Ve=`
.p-galleria-content {
    display: flex;
    flex-direction: column;
}
.p-galleria-item-wrapper {
    display: flex;
    flex-direction: column;
    position: relative;
}
.p-galleria-item-container {
    position: relative;
    display: flex;
    height: 100%;
}
.p-galleria-item-nav {
    position: absolute;
    top: 50%;
    margin-top: -0.5rem;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}
.p-galleria-item-prev {
    left: 0;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}
.p-galleria-item-next {
    right: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.p-galleria-item {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
}
.p-galleria-item-nav-onhover .p-galleria-item-nav {
    pointer-events: none;
    opacity: 0;
    transition: opacity 0.2s ease-in-out;
}
.p-galleria-item-nav-onhover .p-galleria-item-wrapper:hover .p-galleria-item-nav {
    pointer-events: all;
    opacity: 1;
}
.p-galleria-item-nav-onhover .p-galleria-item-wrapper:hover .p-galleria-item-nav.p-disabled {
    pointer-events: none;
}
.p-galleria-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
}

/* Thumbnails */
.p-galleria-thumbnail-wrapper {
    display: flex;
    flex-direction: column;
    overflow: auto;
    flex-shrink: 0;
}
.p-galleria-thumbnail-prev,
.p-galleria-thumbnail-next {
    align-self: center;
    flex: 0 0 auto;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    position: relative;
}
.p-galleria-thumbnail-prev span,
.p-galleria-thumbnail-next span {
    display: flex;
    justify-content: center;
    align-items: center;
}
.p-galleria-thumbnail-container {
    display: flex;
    flex-direction: row;
}
.p-galleria-thumbnail-items-container {
    overflow: hidden;
    width: 100%;
}
.p-galleria-thumbnail-items {
    display: flex;
}
.p-galleria-thumbnail-item {
    overflow: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    opacity: 0.5;
}
.p-galleria-thumbnail-item:hover {
    opacity: 1;
    transition: opacity 0.3s;
}
.p-galleria-thumbnail-item-current {
    opacity: 1;
}

/* Positions */
/* Thumbnails */
.p-galleria-thumbnails-left .p-galleria-content,
.p-galleria-thumbnails-right .p-galleria-content {
    flex-direction: row;
}
.p-galleria-thumbnails-left .p-galleria-item-wrapper,
.p-galleria-thumbnails-right .p-galleria-item-wrapper {
    flex-direction: row;
}
.p-galleria-thumbnails-left .p-galleria-item-wrapper,
.p-galleria-thumbnails-top .p-galleria-item-wrapper {
    order: 2;
}
.p-galleria-thumbnails-left .p-galleria-thumbnail-wrapper,
.p-galleria-thumbnails-top .p-galleria-thumbnail-wrapper {
    order: 1;
}
.p-galleria-thumbnails-left .p-galleria-thumbnail-container,
.p-galleria-thumbnails-right .p-galleria-thumbnail-container {
    flex-direction: column;
    flex-grow: 1;
}
.p-galleria-thumbnails-left .p-galleria-thumbnail-items,
.p-galleria-thumbnails-right .p-galleria-thumbnail-items {
    flex-direction: column;
    height: 100%;
}

/* Indicators */
.p-galleria-indicators {
    display: flex;
    align-items: center;
    justify-content: center;
}
.p-galleria-indicator > button {
    display: inline-flex;
    align-items: center;
}
.p-galleria-indicators-left .p-galleria-item-wrapper,
.p-galleria-indicators-right .p-galleria-item-wrapper {
    flex-direction: row;
    align-items: center;
}
.p-galleria-indicators-left .p-galleria-item-container,
.p-galleria-indicators-top .p-galleria-item-container {
    order: 2;
}
.p-galleria-indicators-left .p-galleria-indicators,
.p-galleria-indicators-top .p-galleria-indicators {
    order: 1;
}
.p-galleria-indicators-left .p-galleria-indicators,
.p-galleria-indicators-right .p-galleria-indicators {
    flex-direction: column;
}
.p-galleria-indicator-onitem .p-galleria-indicators {
    position: absolute;
    display: flex;
}
.p-galleria-indicator-onitem.p-galleria-indicators-top .p-galleria-indicators {
    top: 0;
    left: 0;
    width: 100%;
    align-items: flex-start;
}
.p-galleria-indicator-onitem.p-galleria-indicators-right .p-galleria-indicators {
    right: 0;
    top: 0;
    height: 100%;
    align-items: flex-end;
}
.p-galleria-indicator-onitem.p-galleria-indicators-bottom .p-galleria-indicators {
    bottom: 0;
    left: 0;
    width: 100%;
    align-items: flex-end;
}
.p-galleria-indicator-onitem.p-galleria-indicators-left .p-galleria-indicators {
    left: 0;
    top: 0;
    height: 100%;
    align-items: flex-start;
}

/* FullScreen */
.p-galleria-mask {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.p-galleria-close {
    position: absolute;
    top: 0;
    right: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}
.p-galleria-mask .p-galleria-item-nav {
    position: fixed;
    top: 50%;
    margin-top: -0.5rem;
}

/* Animation */
.p-galleria-enter-active {
    transition: all 150ms cubic-bezier(0, 0, 0.2, 1);
}
.p-galleria-leave-active {
    transition: all 150ms cubic-bezier(0.4, 0, 0.2, 1);
}
.p-galleria-enter-from,
.p-galleria-leave-to {
    opacity: 0;
    transform: scale(0.7);
}
.p-galleria-enter-active .p-galleria-item-nav {
    opacity: 0;
}

/* Keyboard Support */
.p-items-hidden .p-galleria-thumbnail-item {
    visibility: hidden;
}
.p-items-hidden .p-galleria-thumbnail-item.p-galleria-thumbnail-item-active {
    visibility: visible;
}
`;ke(Ve);xe.render=Ce;export{xe as a,E as s};
