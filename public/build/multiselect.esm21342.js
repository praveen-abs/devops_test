import{Z as C,O as r,D as u,i as R,C as B,A as P,U as G,R as N,B as U,s as z,o as d,c,d as a,m as v,n as p,r as f,h as K,w as L,T as _,a as y,t as b,k as D,q,p as V,F as x,f as E,g as T,j,l as I,ah as W}from"./toastservice.esm21342.js";var Z={name:"MultiSelect",emits:["update:modelValue","change","focus","blur","before-show","before-hide","show","hide","filter","selectall-change"],props:{modelValue:null,options:Array,optionLabel:null,optionValue:null,optionDisabled:null,optionGroupLabel:null,optionGroupChildren:null,scrollHeight:{type:String,default:"200px"},placeholder:String,disabled:Boolean,inputId:{type:String,default:null},inputProps:{type:null,default:null},panelClass:{type:String,default:null},panelStyle:{type:null,default:null},panelProps:{type:null,default:null},filterInputProps:{type:null,default:null},closeButtonProps:{type:null,default:null},dataKey:null,filter:Boolean,filterPlaceholder:String,filterLocale:String,filterMatchMode:{type:String,default:"contains"},filterFields:{type:Array,default:null},appendTo:{type:String,default:"body"},display:{type:String,default:"comma"},selectedItemsLabel:{type:String,default:"{0} items selected"},maxSelectedLabels:{type:Number,default:null},selectionLimit:{type:Number,default:null},showToggleAll:{type:Boolean,default:!0},loading:{type:Boolean,default:!1},checkboxIcon:{type:String,default:"pi pi-check"},closeIcon:{type:String,default:"pi pi-times"},dropdownIcon:{type:String,default:"pi pi-chevron-down"},filterIcon:{type:String,default:"pi pi-search"},loadingIcon:{type:String,default:"pi pi-spinner pi-spin"},removeTokenIcon:{type:String,default:"pi pi-times-circle"},selectAll:{type:Boolean,default:null},resetFilterOnHide:{type:Boolean,default:!1},virtualScrollerOptions:{type:Object,default:null},autoOptionFocus:{type:Boolean,default:!0},autoFilterFocus:{type:Boolean,default:!1},filterMessage:{type:String,default:null},selectionMessage:{type:String,default:null},emptySelectionMessage:{type:String,default:null},emptyFilterMessage:{type:String,default:null},emptyMessage:{type:String,default:null},tabindex:{type:Number,default:0},"aria-label":{type:String,default:null},"aria-labelledby":{type:String,default:null}},outsideClickListener:null,scrollHandler:null,resizeListener:null,overlay:null,list:null,virtualScroller:null,startRangeIndex:-1,searchTimeout:null,searchValue:"",selectOnFocus:!1,focusOnHover:!1,data(){return{focused:!1,focusedOptionIndex:-1,headerCheckboxFocused:!1,filterValue:null,overlayVisible:!1}},watch:{options(){this.autoUpdateModel()}},mounted(){this.autoUpdateModel()},beforeUnmount(){this.unbindOutsideClickListener(),this.unbindResizeListener(),this.scrollHandler&&(this.scrollHandler.destroy(),this.scrollHandler=null),this.overlay&&(C.clear(this.overlay),this.overlay=null)},methods:{getOptionIndex(e,t){return this.virtualScrollerDisabled?e:t&&t(e).index},getOptionLabel(e){return this.optionLabel?r.resolveFieldData(e,this.optionLabel):e},getOptionValue(e){return this.optionValue?r.resolveFieldData(e,this.optionValue):e},getOptionRenderKey(e){return this.dataKey?r.resolveFieldData(e,this.dataKey):this.getOptionLabel(e)},isOptionDisabled(e){return this.maxSelectionLimitReached&&!this.isSelected(e)?!0:this.optionDisabled?r.resolveFieldData(e,this.optionDisabled):!1},isOptionGroup(e){return this.optionGroupLabel&&e.optionGroup&&e.group},getOptionGroupLabel(e){return r.resolveFieldData(e,this.optionGroupLabel)},getOptionGroupChildren(e){return r.resolveFieldData(e,this.optionGroupChildren)},getAriaPosInset(e){return(this.optionGroupLabel?e-this.visibleOptions.slice(0,e).filter(t=>this.isOptionGroup(t)).length:e)+1},show(e){this.$emit("before-show"),this.overlayVisible=!0,this.focusedOptionIndex=this.focusedOptionIndex!==-1?this.focusedOptionIndex:this.autoOptionFocus?this.findFirstFocusedOptionIndex():-1,e&&u.focus(this.$refs.focusInput)},hide(e){const t=()=>{this.$emit("before-hide"),this.overlayVisible=!1,this.focusedOptionIndex=-1,this.searchValue="",this.resetFilterOnHide&&(this.filterValue=null),e&&u.focus(this.$refs.focusInput)};setTimeout(()=>{t()},0)},onFocus(e){this.disabled||(this.focused=!0,this.focusedOptionIndex=this.focusedOptionIndex!==-1?this.focusedOptionIndex:this.overlayVisible&&this.autoOptionFocus?this.findFirstFocusedOptionIndex():-1,this.overlayVisible&&this.scrollInView(this.focusedOptionIndex),this.$emit("focus",e))},onBlur(e){this.focused=!1,this.focusedOptionIndex=-1,this.searchValue="",this.$emit("blur",e)},onKeyDown(e){if(this.disabled){e.preventDefault();return}const t=e.metaKey||e.ctrlKey;switch(e.code){case"ArrowDown":this.onArrowDownKey(e);break;case"ArrowUp":this.onArrowUpKey(e);break;case"Home":this.onHomeKey(e);break;case"End":this.onEndKey(e);break;case"PageDown":this.onPageDownKey(e);break;case"PageUp":this.onPageUpKey(e);break;case"Enter":case"Space":this.onEnterKey(e);break;case"Escape":this.onEscapeKey(e);break;case"Tab":this.onTabKey(e);break;case"ShiftLeft":case"ShiftRight":this.onShiftKey(e);break;default:if(e.code==="KeyA"&&t){const i=this.visibleOptions.filter(n=>this.isValidOption(n)).map(n=>this.getOptionValue(n));this.updateModel(e,i),e.preventDefault();break}!t&&r.isPrintableCharacter(e.key)&&(!this.overlayVisible&&this.show(),this.searchOptions(e),e.preventDefault());break}},onContainerClick(e){this.disabled||this.loading||(!this.overlay||!this.overlay.contains(e.target))&&(this.overlayVisible?this.hide(!0):this.show(!0))},onFirstHiddenFocus(e){const t=e.relatedTarget===this.$refs.focusInput?u.getFirstFocusableElement(this.overlay,":not(.p-hidden-focusable)"):this.$refs.focusInput;u.focus(t)},onLastHiddenFocus(e){const t=e.relatedTarget===this.$refs.focusInput?u.getLastFocusableElement(this.overlay,":not(.p-hidden-focusable)"):this.$refs.focusInput;u.focus(t)},onCloseClick(){this.hide(!0)},onHeaderCheckboxFocus(){this.headerCheckboxFocused=!0},onHeaderCheckboxBlur(){this.headerCheckboxFocused=!1},onOptionSelect(e,t,i=-1,n=!1){if(this.disabled||this.isOptionDisabled(t))return;let o=this.isSelected(t),l=null;o?l=this.modelValue.filter(m=>!r.equals(m,this.getOptionValue(t),this.equalityKey)):l=[...this.modelValue||[],this.getOptionValue(t)],this.updateModel(e,l),i!==-1&&(this.focusedOptionIndex=i),n&&u.focus(this.$refs.focusInput)},onOptionMouseMove(e,t){this.focusOnHover&&this.changeFocusedOptionIndex(e,t)},onOptionSelectRange(e,t=-1,i=-1){if(t===-1&&(t=this.findNearestSelectedOptionIndex(i,!0)),i===-1&&(i=this.findNearestSelectedOptionIndex(t)),t!==-1&&i!==-1){const n=Math.min(t,i),o=Math.max(t,i),l=this.visibleOptions.slice(n,o+1).filter(m=>this.isValidOption(m)).map(m=>this.getOptionValue(m));this.updateModel(e,l)}},onFilterChange(e){const t=e.target.value;this.filterValue=t,this.focusedOptionIndex=-1,this.$emit("filter",{originalEvent:e,value:t}),!this.virtualScrollerDisabled&&this.virtualScroller.scrollToIndex(0)},onFilterKeyDown(e){switch(e.code){case"ArrowDown":this.onArrowDownKey(e);break;case"ArrowUp":this.onArrowUpKey(e,!0);break;case"ArrowLeft":case"ArrowRight":this.onArrowLeftKey(e,!0);break;case"Home":this.onHomeKey(e,!0);break;case"End":this.onEndKey(e,!0);break;case"Enter":this.onEnterKey(e);break;case"Escape":this.onEscapeKey(e);break;case"Tab":this.onTabKey(e,!0);break}},onFilterBlur(){this.focusedOptionIndex=-1},onFilterUpdated(){this.overlayVisible&&this.alignOverlay()},onOverlayClick(e){R.emit("overlay-click",{originalEvent:e,target:this.$el})},onOverlayKeyDown(e){switch(e.code){case"Escape":this.onEscapeKey(e);break}},onArrowDownKey(e){const t=this.focusedOptionIndex!==-1?this.findNextOptionIndex(this.focusedOptionIndex):this.findFirstFocusedOptionIndex();e.shiftKey&&this.onOptionSelectRange(e,this.startRangeIndex,t),this.changeFocusedOptionIndex(e,t),!this.overlayVisible&&this.show(),e.preventDefault()},onArrowUpKey(e,t=!1){if(e.altKey&&!t)this.focusedOptionIndex!==-1&&this.onOptionSelect(e,this.visibleOptions[this.focusedOptionIndex]),this.overlayVisible&&this.hide(),e.preventDefault();else{const i=this.focusedOptionIndex!==-1?this.findPrevOptionIndex(this.focusedOptionIndex):this.findLastFocusedOptionIndex();e.shiftKey&&this.onOptionSelectRange(e,i,this.startRangeIndex),this.changeFocusedOptionIndex(e,i),!this.overlayVisible&&this.show(),e.preventDefault()}},onArrowLeftKey(e,t=!1){t&&(this.focusedOptionIndex=-1)},onHomeKey(e,t=!1){const{currentTarget:i}=e;if(t){const n=i.value.length;i.setSelectionRange(0,e.shiftKey?n:0),this.focusedOptionIndex=-1}else{let n=e.metaKey||e.ctrlKey,o=this.findFirstOptionIndex();e.shiftKey&&n&&this.onOptionSelectRange(e,o,this.startRangeIndex),this.changeFocusedOptionIndex(e,o),!this.overlayVisible&&this.show()}e.preventDefault()},onEndKey(e,t=!1){const{currentTarget:i}=e;if(t){const n=i.value.length;i.setSelectionRange(e.shiftKey?0:n,n),this.focusedOptionIndex=-1}else{let n=e.metaKey||e.ctrlKey,o=this.findLastOptionIndex();e.shiftKey&&n&&this.onOptionSelectRange(e,this.startRangeIndex,o),this.changeFocusedOptionIndex(e,o),!this.overlayVisible&&this.show()}e.preventDefault()},onPageUpKey(e){this.scrollInView(0),e.preventDefault()},onPageDownKey(e){this.scrollInView(this.visibleOptions.length-1),e.preventDefault()},onEnterKey(e){this.overlayVisible?this.focusedOptionIndex!==-1&&(e.shiftKey?this.onOptionSelectRange(e,this.focusedOptionIndex):this.onOptionSelect(e,this.visibleOptions[this.focusedOptionIndex])):this.onArrowDownKey(e),e.preventDefault()},onEscapeKey(e){this.overlayVisible&&this.hide(!0),e.preventDefault()},onTabKey(e,t=!1){t||(this.overlayVisible&&this.hasFocusableElements()?(u.focus(e.shiftKey?this.$refs.lastHiddenFocusableElementOnOverlay:this.$refs.firstHiddenFocusableElementOnOverlay),e.preventDefault()):(this.focusedOptionIndex!==-1&&this.onOptionSelect(e,this.visibleOptions[this.focusedOptionIndex]),this.overlayVisible&&this.hide(this.filter)))},onShiftKey(){this.startRangeIndex=this.focusedOptionIndex},onOverlayEnter(e){C.set("overlay",e,this.$primevue.config.zIndex.overlay),this.alignOverlay(),this.scrollInView(),this.autoFilterFocus&&u.focus(this.$refs.filterInput)},onOverlayAfterEnter(){this.bindOutsideClickListener(),this.bindScrollListener(),this.bindResizeListener(),this.$emit("show")},onOverlayLeave(){this.unbindOutsideClickListener(),this.unbindScrollListener(),this.unbindResizeListener(),this.$emit("hide"),this.overlay=null},onOverlayAfterLeave(e){C.clear(e)},alignOverlay(){this.appendTo==="self"?u.relativePosition(this.overlay,this.$el):(this.overlay.style.minWidth=u.getOuterWidth(this.$el)+"px",u.absolutePosition(this.overlay,this.$el))},bindOutsideClickListener(){this.outsideClickListener||(this.outsideClickListener=e=>{this.overlayVisible&&this.isOutsideClicked(e)&&this.hide()},document.addEventListener("click",this.outsideClickListener))},unbindOutsideClickListener(){this.outsideClickListener&&(document.removeEventListener("click",this.outsideClickListener),this.outsideClickListener=null)},bindScrollListener(){this.scrollHandler||(this.scrollHandler=new B(this.$refs.container,()=>{this.overlayVisible&&this.hide()})),this.scrollHandler.bindScrollListener()},unbindScrollListener(){this.scrollHandler&&this.scrollHandler.unbindScrollListener()},bindResizeListener(){this.resizeListener||(this.resizeListener=()=>{this.overlayVisible&&!u.isTouchDevice()&&this.hide()},window.addEventListener("resize",this.resizeListener))},unbindResizeListener(){this.resizeListener&&(window.removeEventListener("resize",this.resizeListener),this.resizeListener=null)},isOutsideClicked(e){return!(this.$el.isSameNode(e.target)||this.$el.contains(e.target)||this.overlay&&this.overlay.contains(e.target))},getLabelByValue(e){const i=(this.optionGroupLabel?this.flatOptions(this.options):this.options||[]).find(n=>!this.isOptionGroup(n)&&r.equals(this.getOptionValue(n),e,this.equalityKey));return i?this.getOptionLabel(i):null},getSelectedItemsLabel(){let e=/{(.*?)}/;return e.test(this.selectedItemsLabel)?this.selectedItemsLabel.replace(this.selectedItemsLabel.match(e)[0],this.modelValue.length+""):this.selectedItemsLabel},onToggleAll(e){if(this.selectAll!==null)this.$emit("selectall-change",{originalEvent:e,checked:!this.allSelected});else{const t=this.allSelected?[]:this.visibleOptions.filter(i=>this.isValidOption(i)).map(i=>this.getOptionValue(i));this.updateModel(e,t)}this.headerCheckboxFocused=!0},removeOption(e,t){let i=this.modelValue.filter(n=>!r.equals(n,t,this.equalityKey));this.updateModel(e,i)},clearFilter(){this.filterValue=null},hasFocusableElements(){return u.getFocusableElements(this.overlay,":not(.p-hidden-focusable)").length>0},isOptionMatched(e){return this.isValidOption(e)&&this.getOptionLabel(e).toLocaleLowerCase(this.filterLocale).startsWith(this.searchValue.toLocaleLowerCase(this.filterLocale))},isValidOption(e){return e&&!(this.isOptionDisabled(e)||this.isOptionGroup(e))},isValidSelectedOption(e){return this.isValidOption(e)&&this.isSelected(e)},isSelected(e){const t=this.getOptionValue(e);return(this.modelValue||[]).some(i=>r.equals(i,t,this.equalityKey))},findFirstOptionIndex(){return this.visibleOptions.findIndex(e=>this.isValidOption(e))},findLastOptionIndex(){return r.findLastIndex(this.visibleOptions,e=>this.isValidOption(e))},findNextOptionIndex(e){const t=e<this.visibleOptions.length-1?this.visibleOptions.slice(e+1).findIndex(i=>this.isValidOption(i)):-1;return t>-1?t+e+1:e},findPrevOptionIndex(e){const t=e>0?r.findLastIndex(this.visibleOptions.slice(0,e),i=>this.isValidOption(i)):-1;return t>-1?t:e},findFirstSelectedOptionIndex(){return this.hasSelectedOption?this.visibleOptions.findIndex(e=>this.isValidSelectedOption(e)):-1},findLastSelectedOptionIndex(){return this.hasSelectedOption?r.findLastIndex(this.visibleOptions,e=>this.isValidSelectedOption(e)):-1},findNextSelectedOptionIndex(e){const t=this.hasSelectedOption&&e<this.visibleOptions.length-1?this.visibleOptions.slice(e+1).findIndex(i=>this.isValidSelectedOption(i)):-1;return t>-1?t+e+1:-1},findPrevSelectedOptionIndex(e){const t=this.hasSelectedOption&&e>0?r.findLastIndex(this.visibleOptions.slice(0,e),i=>this.isValidSelectedOption(i)):-1;return t>-1?t:-1},findNearestSelectedOptionIndex(e,t=!1){let i=-1;return this.hasSelectedOption&&(t?(i=this.findPrevSelectedOptionIndex(e),i=i===-1?this.findNextSelectedOptionIndex(e):i):(i=this.findNextSelectedOptionIndex(e),i=i===-1?this.findPrevSelectedOptionIndex(e):i)),i>-1?i:e},findFirstFocusedOptionIndex(){const e=this.findFirstSelectedOptionIndex();return e<0?this.findFirstOptionIndex():e},findLastFocusedOptionIndex(){const e=this.findLastSelectedOptionIndex();return e<0?this.findLastOptionIndex():e},searchOptions(e){this.searchValue=(this.searchValue||"")+e.key;let t=-1;this.focusedOptionIndex!==-1?(t=this.visibleOptions.slice(this.focusedOptionIndex).findIndex(i=>this.isOptionMatched(i)),t=t===-1?this.visibleOptions.slice(0,this.focusedOptionIndex).findIndex(i=>this.isOptionMatched(i)):t+this.focusedOptionIndex):t=this.visibleOptions.findIndex(i=>this.isOptionMatched(i)),t===-1&&this.focusedOptionIndex===-1&&(t=this.findFirstFocusedOptionIndex()),t!==-1&&this.changeFocusedOptionIndex(e,t),this.searchTimeout&&clearTimeout(this.searchTimeout),this.searchTimeout=setTimeout(()=>{this.searchValue="",this.searchTimeout=null},500)},changeFocusedOptionIndex(e,t){this.focusedOptionIndex!==t&&(this.focusedOptionIndex=t,this.scrollInView())},scrollInView(e=-1){const t=e!==-1?`${this.id}_${e}`:this.focusedOptionId,i=u.findSingle(this.list,`li[id="${t}"]`);i?i.scrollIntoView&&i.scrollIntoView({block:"nearest",inline:"nearest"}):this.virtualScrollerDisabled||this.virtualScroller&&this.virtualScroller.scrollToIndex(e!==-1?e:this.focusedOptionIndex)},autoUpdateModel(){if(this.selectOnFocus&&this.autoOptionFocus&&!this.hasSelectedOption){this.focusedOptionIndex=this.findFirstFocusedOptionIndex();const e=this.getOptionValue(this.visibleOptions[this.focusedOptionIndex]);this.updateModel(null,[e])}},updateModel(e,t){this.$emit("update:modelValue",t),this.$emit("change",{originalEvent:e,value:t})},flatOptions(e){return(e||[]).reduce((t,i,n)=>{t.push({optionGroup:i,group:!0,index:n});const o=this.getOptionGroupChildren(i);return o&&o.forEach(l=>t.push(l)),t},[])},overlayRef(e){this.overlay=e},listRef(e,t){this.list=e,t&&t(e)},virtualScrollerRef(e){this.virtualScroller=e}},computed:{containerClass(){return["p-multiselect p-component p-inputwrapper",{"p-multiselect-chip":this.display==="chip","p-disabled":this.disabled,"p-focus":this.focused,"p-inputwrapper-filled":this.modelValue&&this.modelValue.length,"p-inputwrapper-focus":this.focused||this.overlayVisible,"p-overlay-open":this.overlayVisible}]},labelClass(){return["p-multiselect-label",{"p-placeholder":this.label===this.placeholder,"p-multiselect-label-empty":!this.placeholder&&(!this.modelValue||this.modelValue.length===0)}]},dropdownIconClass(){return["p-multiselect-trigger-icon",this.loading?this.loadingIcon:this.dropdownIcon]},panelStyleClass(){return["p-multiselect-panel p-component",this.panelClass,{"p-input-filled":this.$primevue.config.inputStyle==="filled","p-ripple-disabled":this.$primevue.config.ripple===!1}]},headerCheckboxClass(){return["p-checkbox p-component",{"p-checkbox-checked":this.allSelected,"p-checkbox-focused":this.headerCheckboxFocused}]},visibleOptions(){const e=this.optionGroupLabel?this.flatOptions(this.options):this.options||[];if(this.filterValue){const t=P.filter(e,this.searchFields,this.filterValue,this.filterMatchMode,this.filterLocale);if(this.optionGroupLabel){const i=this.options||[],n=[];return i.forEach(o=>{const l=o.items.filter(m=>t.includes(m));l.length>0&&n.push({...o,items:[...l]})}),this.flatOptions(n)}return t}return e},label(){let e;if(this.modelValue&&this.modelValue.length){if(r.isNotEmpty(this.maxSelectedLabels)&&this.modelValue.length>this.maxSelectedLabels)return this.getSelectedItemsLabel();e="";for(let t=0;t<this.modelValue.length;t++)t!==0&&(e+=", "),e+=this.getLabelByValue(this.modelValue[t])}else e=this.placeholder;return e},chipSelectedItems(){return r.isNotEmpty(this.maxSelectedLabels)&&this.modelValue&&this.modelValue.length>this.maxSelectedLabels?this.modelValue.slice(0,this.maxSelectedLabels):this.modelValue},allSelected(){return this.selectAll!==null?this.selectAll:r.isNotEmpty(this.visibleOptions)&&this.visibleOptions.every(e=>this.isOptionGroup(e)||this.isOptionDisabled(e)||this.isSelected(e))},hasSelectedOption(){return r.isNotEmpty(this.modelValue)},equalityKey(){return this.optionValue?null:this.dataKey},searchFields(){return this.filterFields||[this.optionLabel]},maxSelectionLimitReached(){return this.selectionLimit&&this.modelValue&&this.modelValue.length===this.selectionLimit},filterResultMessageText(){return r.isNotEmpty(this.visibleOptions)?this.filterMessageText.replaceAll("{0}",this.visibleOptions.length):this.emptyFilterMessageText},filterMessageText(){return this.filterMessage||this.$primevue.config.locale.searchMessage||""},emptyFilterMessageText(){return this.emptyFilterMessage||this.$primevue.config.locale.emptySearchMessage||this.$primevue.config.locale.emptyFilterMessage||""},emptyMessageText(){return this.emptyMessage||this.$primevue.config.locale.emptyMessage||""},selectionMessageText(){return this.selectionMessage||this.$primevue.config.locale.selectionMessage||""},emptySelectionMessageText(){return this.emptySelectionMessage||this.$primevue.config.locale.emptySelectionMessage||""},selectedMessageText(){return this.hasSelectedOption?this.selectionMessageText.replaceAll("{0}",this.modelValue.length):this.emptySelectionMessageText},id(){return this.$attrs.id||G()},focusedOptionId(){return this.focusedOptionIndex!==-1?`${this.id}_${this.focusedOptionIndex}`:null},ariaSetSize(){return this.visibleOptions.filter(e=>!this.isOptionGroup(e)).length},toggleAllAriaLabel(){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria[this.allSelected?"selectAll":"unselectAll"]:void 0},closeAriaLabel(){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria.close:void 0},virtualScrollerDisabled(){return!this.virtualScrollerOptions}},directives:{ripple:N},components:{VirtualScroller:U,Portal:z}};const J={class:"p-hidden-accessible"},Q=["id","disabled","placeholder","tabindex","aria-label","aria-labelledby","aria-expanded","aria-controls","aria-activedescendant"],X={class:"p-multiselect-label-container"},Y={class:"p-multiselect-token-label"},$=["onClick"],ee={class:"p-multiselect-trigger"},te={key:0,class:"p-multiselect-header"},ie={class:"p-hidden-accessible"},le=["checked","aria-label"],se={key:1,class:"p-multiselect-filter-container"},ne=["value","placeholder","aria-owns","aria-activedescendant"],oe={key:2,role:"status","aria-live":"polite",class:"p-hidden-accessible"},ae=["aria-label"],re=["id"],de=["id"],ce=["id","aria-label","aria-selected","aria-disabled","aria-setsize","aria-posinset","onClick","onMousemove"],he={class:"p-checkbox p-component"},ue={key:0,class:"p-multiselect-empty-message",role:"option"},pe={key:1,class:"p-multiselect-empty-message",role:"option"},fe={key:1,role:"status","aria-live":"polite",class:"p-hidden-accessible"},ye={role:"status","aria-live":"polite",class:"p-hidden-accessible"};function be(e,t,i,n,o,l){const m=T("VirtualScroller"),A=T("Portal"),M=j("ripple");return d(),c("div",{ref:"container",class:p(l.containerClass),onClick:t[15]||(t[15]=(...s)=>l.onContainerClick&&l.onContainerClick(...s))},[a("div",J,[a("input",v({ref:"focusInput",id:i.inputId,type:"text",readonly:"",disabled:i.disabled,placeholder:i.placeholder,tabindex:i.disabled?-1:i.tabindex,role:"combobox","aria-label":e.ariaLabel,"aria-labelledby":e.ariaLabelledby,"aria-haspopup":"listbox","aria-expanded":o.overlayVisible,"aria-controls":l.id+"_list","aria-activedescendant":o.focused?l.focusedOptionId:void 0,onFocus:t[0]||(t[0]=(...s)=>l.onFocus&&l.onFocus(...s)),onBlur:t[1]||(t[1]=(...s)=>l.onBlur&&l.onBlur(...s)),onKeydown:t[2]||(t[2]=(...s)=>l.onKeyDown&&l.onKeyDown(...s))},i.inputProps),null,16,Q)]),a("div",X,[a("div",{class:p(l.labelClass)},[f(e.$slots,"value",{value:i.modelValue,placeholder:i.placeholder},()=>[i.display==="comma"?(d(),c(x,{key:0},[I(b(l.label||"empty"),1)],64)):i.display==="chip"?(d(),c(x,{key:1},[(d(!0),c(x,null,E(l.chipSelectedItems,s=>(d(),c("div",{key:l.getLabelByValue(s),class:"p-multiselect-token"},[f(e.$slots,"chip",{value:s},()=>[a("span",Y,b(l.getLabelByValue(s)),1)]),i.disabled?y("",!0):(d(),c("span",{key:0,class:p(["p-multiselect-token-icon",i.removeTokenIcon]),onClick:W(F=>l.removeOption(F,s),["stop"])},null,10,$))]))),128)),!i.modelValue||i.modelValue.length===0?(d(),c(x,{key:0},[I(b(i.placeholder||"empty"),1)],64)):y("",!0)],64)):y("",!0)])],2)]),a("div",ee,[f(e.$slots,"indicator",{},()=>[a("span",{class:p(l.dropdownIconClass),"aria-hidden":"true"},null,2)])]),K(A,{appendTo:i.appendTo},{default:L(()=>[K(_,{name:"p-connected-overlay",onEnter:l.onOverlayEnter,onAfterEnter:l.onOverlayAfterEnter,onLeave:l.onOverlayLeave,onAfterLeave:l.onOverlayAfterLeave},{default:L(()=>[o.overlayVisible?(d(),c("div",v({key:0,ref:l.overlayRef,style:i.panelStyle,class:l.panelStyleClass,onClick:t[13]||(t[13]=(...s)=>l.onOverlayClick&&l.onOverlayClick(...s)),onKeydown:t[14]||(t[14]=(...s)=>l.onOverlayKeyDown&&l.onOverlayKeyDown(...s))},i.panelProps),[a("span",{ref:"firstHiddenFocusableElementOnOverlay",role:"presentation","aria-hidden":"true",class:"p-hidden-accessible p-hidden-focusable",tabindex:0,onFocus:t[3]||(t[3]=(...s)=>l.onFirstHiddenFocus&&l.onFirstHiddenFocus(...s))},null,544),f(e.$slots,"header",{value:i.modelValue,options:l.visibleOptions}),i.showToggleAll&&i.selectionLimit==null||i.filter?(d(),c("div",te,[i.showToggleAll&&i.selectionLimit==null?(d(),c("div",{key:0,class:p(l.headerCheckboxClass),onClick:t[6]||(t[6]=(...s)=>l.onToggleAll&&l.onToggleAll(...s))},[a("div",ie,[a("input",{type:"checkbox",readonly:"",checked:l.allSelected,"aria-label":l.toggleAllAriaLabel,onFocus:t[4]||(t[4]=(...s)=>l.onHeaderCheckboxFocus&&l.onHeaderCheckboxFocus(...s)),onBlur:t[5]||(t[5]=(...s)=>l.onHeaderCheckboxBlur&&l.onHeaderCheckboxBlur(...s))},null,40,le)]),a("div",{class:p(["p-checkbox-box",{"p-highlight":l.allSelected,"p-focus":o.headerCheckboxFocused}])},[a("span",{class:p(["p-checkbox-icon",{[i.checkboxIcon]:l.allSelected}])},null,2)],2)],2)):y("",!0),i.filter?(d(),c("div",se,[a("input",v({ref:"filterInput",type:"text",value:o.filterValue,onVnodeUpdated:t[7]||(t[7]=(...s)=>l.onFilterUpdated&&l.onFilterUpdated(...s)),class:"p-multiselect-filter p-inputtext p-component",placeholder:i.filterPlaceholder,role:"searchbox",autocomplete:"off","aria-owns":l.id+"_list","aria-activedescendant":l.focusedOptionId,onKeydown:t[8]||(t[8]=(...s)=>l.onFilterKeyDown&&l.onFilterKeyDown(...s)),onBlur:t[9]||(t[9]=(...s)=>l.onFilterBlur&&l.onFilterBlur(...s)),onInput:t[10]||(t[10]=(...s)=>l.onFilterChange&&l.onFilterChange(...s))},i.filterInputProps),null,16,ne),a("span",{class:p(["p-multiselect-filter-icon",i.filterIcon])},null,2)])):y("",!0),i.filter?(d(),c("span",oe,b(l.filterResultMessageText),1)):y("",!0),D((d(),c("button",v({class:"p-multiselect-close p-link","aria-label":l.closeAriaLabel,onClick:t[11]||(t[11]=(...s)=>l.onCloseClick&&l.onCloseClick(...s)),type:"button"},i.closeButtonProps),[a("span",{class:p(["p-multiselect-close-icon",i.closeIcon])},null,2)],16,ae)),[[M]])])):y("",!0),a("div",{class:"p-multiselect-items-wrapper",style:V({"max-height":l.virtualScrollerDisabled?i.scrollHeight:""})},[K(m,v({ref:l.virtualScrollerRef},i.virtualScrollerOptions,{items:l.visibleOptions,style:{height:i.scrollHeight},tabindex:-1,disabled:l.virtualScrollerDisabled}),q({content:L(({styleClass:s,contentRef:F,items:S,getItemOptions:O,contentStyle:H,itemSize:k})=>[a("ul",{ref:h=>l.listRef(h,F),id:l.id+"_list",class:p(["p-multiselect-items p-component",s]),style:V(H),role:"listbox","aria-multiselectable":"true"},[(d(!0),c(x,null,E(S,(h,g)=>(d(),c(x,{key:l.getOptionRenderKey(h,l.getOptionIndex(g,O))},[l.isOptionGroup(h)?(d(),c("li",{key:0,id:l.id+"_"+l.getOptionIndex(g,O),style:V({height:k?k+"px":void 0}),class:"p-multiselect-item-group",role:"option"},[f(e.$slots,"optiongroup",{option:h.optionGroup,index:l.getOptionIndex(g,O)},()=>[I(b(l.getOptionGroupLabel(h.optionGroup)),1)])],12,de)):D((d(),c("li",{key:1,id:l.id+"_"+l.getOptionIndex(g,O),style:V({height:k?k+"px":void 0}),class:p(["p-multiselect-item",{"p-highlight":l.isSelected(h),"p-focus":o.focusedOptionIndex===l.getOptionIndex(g,O),"p-disabled":l.isOptionDisabled(h)}]),role:"option","aria-label":l.getOptionLabel(h),"aria-selected":l.isSelected(h),"aria-disabled":l.isOptionDisabled(h),"aria-setsize":l.ariaSetSize,"aria-posinset":l.getAriaPosInset(l.getOptionIndex(g,O)),onClick:w=>l.onOptionSelect(w,h,l.getOptionIndex(g,O),!0),onMousemove:w=>l.onOptionMouseMove(w,l.getOptionIndex(g,O))},[a("div",he,[a("div",{class:p(["p-checkbox-box",{"p-highlight":l.isSelected(h)}])},[a("span",{class:p(["p-checkbox-icon",{[i.checkboxIcon]:l.isSelected(h)}])},null,2)],2)]),f(e.$slots,"option",{option:h,index:l.getOptionIndex(g,O)},()=>[a("span",null,b(l.getOptionLabel(h)),1)])],46,ce)),[[M]])],64))),128)),o.filterValue&&(!S||S&&S.length===0)?(d(),c("li",ue,[f(e.$slots,"emptyfilter",{},()=>[I(b(l.emptyFilterMessageText),1)])])):!i.options||i.options&&i.options.length===0?(d(),c("li",pe,[f(e.$slots,"empty",{},()=>[I(b(l.emptyMessageText),1)])])):y("",!0)],14,re)]),_:2},[e.$slots.loader?{name:"loader",fn:L(({options:s})=>[f(e.$slots,"loader",{options:s})]),key:"0"}:void 0]),1040,["items","style","disabled"])],4),f(e.$slots,"footer",{value:i.modelValue,options:l.visibleOptions}),!i.options||i.options&&i.options.length===0?(d(),c("span",fe,b(l.emptyMessageText),1)):y("",!0),a("span",ye,b(l.selectedMessageText),1),a("span",{ref:"lastHiddenFocusableElementOnOverlay",role:"presentation","aria-hidden":"true",class:"p-hidden-accessible p-hidden-focusable",tabindex:0,onFocus:t[12]||(t[12]=(...s)=>l.onLastHiddenFocus&&l.onLastHiddenFocus(...s))},null,544)],16)):y("",!0)]),_:3},8,["onEnter","onAfterEnter","onLeave","onAfterLeave"])]),_:3},8,["appendTo"])],2)}function me(e,t){t===void 0&&(t={});var i=t.insertAt;if(!(!e||typeof document>"u")){var n=document.head||document.getElementsByTagName("head")[0],o=document.createElement("style");o.type="text/css",i==="top"&&n.firstChild?n.insertBefore(o,n.firstChild):n.appendChild(o),o.styleSheet?o.styleSheet.cssText=e:o.appendChild(document.createTextNode(e))}}var Oe=`
.p-multiselect {
    display: inline-flex;
    cursor: pointer;
    position: relative;
    user-select: none;
}
.p-multiselect-trigger {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.p-multiselect-label-container {
    overflow: hidden;
    flex: 1 1 auto;
    cursor: pointer;
}
.p-multiselect-label {
    display: block;
    white-space: nowrap;
    cursor: pointer;
    overflow: hidden;
    text-overflow: ellipsis;
}
.p-multiselect-label-empty {
    overflow: hidden;
    visibility: hidden;
}
.p-multiselect-token {
    cursor: default;
    display: inline-flex;
    align-items: center;
    flex: 0 0 auto;
}
.p-multiselect-token-icon {
    cursor: pointer;
}
.p-multiselect .p-multiselect-panel {
    min-width: 100%;
}
.p-multiselect-panel {
    position: absolute;
    top: 0;
    left: 0;
}
.p-multiselect-items-wrapper {
    overflow: auto;
}
.p-multiselect-items {
    margin: 0;
    padding: 0;
    list-style-type: none;
}
.p-multiselect-item {
    cursor: pointer;
    display: flex;
    align-items: center;
    font-weight: normal;
    white-space: nowrap;
    position: relative;
    overflow: hidden;
}
.p-multiselect-item-group {
    cursor: auto;
}
.p-multiselect-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.p-multiselect-filter-container {
    position: relative;
    flex: 1 1 auto;
}
.p-multiselect-filter-icon {
    position: absolute;
    top: 50%;
    margin-top: -0.5rem;
}
.p-multiselect-filter-container .p-inputtext {
    width: 100%;
}
.p-multiselect-close {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    overflow: hidden;
    position: relative;
    margin-left: auto;
}
.p-fluid .p-multiselect {
    display: flex;
}
`;me(Oe);Z.render=be;export{Z as s};
