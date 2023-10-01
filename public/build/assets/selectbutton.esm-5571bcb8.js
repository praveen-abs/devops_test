import{D as h,O as r,R as f,o as c,c as b,F as g,f as m,n as p,j as y,k as x,r as D,d as V,t as O}from"./inputnumber.esm-e362c3ab.js";var K={name:"SelectButton",emits:["update:modelValue","focus","blur","change"],props:{modelValue:null,options:Array,optionLabel:null,optionValue:null,optionDisabled:null,multiple:Boolean,unselectable:{type:Boolean,default:!0},disabled:Boolean,dataKey:null,"aria-labelledby":{type:String,default:null}},data(){return{focusedIndex:0}},mounted(){this.defaultTabIndexes()},methods:{defaultTabIndexes(){let e=h.find(this.$refs.container,".p-button"),l=h.findSingle(this.$refs.container,".p-highlight");for(let t=0;t<e.length;t++)(h.hasClass(e[t],"p-highlight")&&r.equals(e[t],l)||l===null&&t==0)&&(this.focusedIndex=t)},getOptionLabel(e){return this.optionLabel?r.resolveFieldData(e,this.optionLabel):e},getOptionValue(e){return this.optionValue?r.resolveFieldData(e,this.optionValue):e},getOptionRenderKey(e){return this.dataKey?r.resolveFieldData(e,this.dataKey):this.getOptionLabel(e)},isOptionDisabled(e){return this.optionDisabled?r.resolveFieldData(e,this.optionDisabled):!1},onOptionSelect(e,l,t){if(this.disabled||this.isOptionDisabled(l))return;let a=this.isSelected(l);if(a&&!this.unselectable)return;let s=this.getOptionValue(l),i;this.multiple?a?i=this.modelValue.filter(u=>!r.equals(u,s,this.equalityKey)):i=this.modelValue?[...this.modelValue,s]:[s]:i=a?null:s,this.focusedIndex=t,this.$emit("update:modelValue",i),this.$emit("change",{event:e,value:i})},isSelected(e){let l=!1,t=this.getOptionValue(e);if(this.multiple){if(this.modelValue){for(let a of this.modelValue)if(r.equals(a,t,this.equalityKey)){l=!0;break}}}else l=r.equals(this.modelValue,t,this.equalityKey);return l},onKeydown(e,l,t){switch(e.code){case"Space":{this.onOptionSelect(e,l,t),e.preventDefault();break}case"ArrowDown":case"ArrowRight":{this.changeTabIndexes(e,"next"),e.preventDefault();break}case"ArrowUp":case"ArrowLeft":{this.changeTabIndexes(e,"prev"),e.preventDefault();break}}},changeTabIndexes(e,l){let t,a;for(let s=0;s<=this.$refs.container.children.length-1;s++)this.$refs.container.children[s].getAttribute("tabindex")==="0"&&(t={elem:this.$refs.container.children[s],index:s});l==="prev"?t.index===0?a=this.$refs.container.children.length-1:a=t.index-1:t.index===this.$refs.container.children.length-1?a=0:a=t.index+1,this.focusedIndex=a,this.$refs.container.children[a].focus()},onFocus(e){this.$emit("focus",e)},onBlur(e,l){e.target&&e.relatedTarget&&e.target.parentElement!==e.relatedTarget.parentElement&&this.defaultTabIndexes(),this.$emit("blur",e,l)},getButtonClass(e){return["p-button p-component",{"p-highlight":this.isSelected(e),"p-disabled":this.isOptionDisabled(e)}]}},computed:{containerClass(){return["p-selectbutton p-buttonset p-component",{"p-disabled":this.disabled}]},equalityKey(){return this.optionValue?null:this.dataKey}},directives:{ripple:f}};const k=["aria-labelledby"],B=["tabindex","aria-label","role","aria-checked","aria-disabled","onClick","onKeydown","onBlur"],S={class:"p-button-label"};function w(e,l,t,a,s,i){const u=y("ripple");return c(),b("div",{ref:"container",class:p(i.containerClass),role:"group","aria-labelledby":e.ariaLabelledby},[(c(!0),b(g,null,m(t.options,(n,o)=>x((c(),b("div",{key:i.getOptionRenderKey(n),tabindex:o===s.focusedIndex?"0":"-1","aria-label":i.getOptionLabel(n),role:t.multiple?"checkbox":"radio","aria-checked":i.isSelected(n),"aria-disabled":t.optionDisabled,class:p(i.getButtonClass(n,o)),onClick:d=>i.onOptionSelect(d,n,o),onKeydown:d=>i.onKeydown(d,n,o),onFocus:l[0]||(l[0]=d=>i.onFocus(d)),onBlur:d=>i.onBlur(d,n)},[D(e.$slots,"option",{option:n,index:o},()=>[V("span",S,O(i.getOptionLabel(n)),1)])],42,B)),[[u]])),128))],10,k)}K.render=w;export{K as s};
