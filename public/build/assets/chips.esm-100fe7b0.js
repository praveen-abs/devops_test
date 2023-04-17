import{U as c,b as d,g as u,F as f,h as m,m as y,n as r,o as p,r as g,t as x}from"./toastservice.esm-6fba28a8.js";var b={name:"Chips",emits:["update:modelValue","add","remove","focus","blur"],props:{modelValue:{type:Array,default:null},max:{type:Number,default:null},separator:{type:[String,Object],default:null},addOnBlur:{type:Boolean,default:null},allowDuplicate:{type:Boolean,default:!0},placeholder:{type:String,default:null},disabled:{type:Boolean,default:!1},inputId:{type:String,default:null},inputClass:{type:[String,Object],default:null},inputStyle:{type:Object,default:null},inputProps:{type:null,default:null},removeTokenIcon:{type:String,default:"pi pi-times-circle"},"aria-labelledby":{type:String,default:null},"aria-label":{type:String,default:null}},data(){return{id:c(),inputValue:null,focused:!1,focusedIndex:null}},methods:{onWrapperClick(){this.$refs.input.focus()},onInput(e){this.inputValue=e.target.value,this.focusedIndex=null},onFocus(e){this.focused=!0,this.focusedIndex=null,this.$emit("focus",e)},onBlur(e){this.focused=!1,this.focusedIndex=null,this.addOnBlur&&this.addItem(e,e.target.value,!1),this.$emit("blur",e)},onKeyDown(e){const t=e.target.value;switch(e.code){case"Backspace":t.length===0&&this.modelValue&&this.modelValue.length>0&&(this.focusedIndex!==null?this.removeItem(e,this.focusedIndex):this.removeItem(e,this.modelValue.length-1));break;case"Enter":t&&t.trim().length&&!this.maxedOut&&this.addItem(e,t,!0);break;case"ArrowLeft":t.length===0&&this.modelValue&&this.modelValue.length>0&&this.$refs.container.focus();break;case"ArrowRight":e.stopPropagation();break;default:this.separator&&(this.separator===e.key||e.key.match(this.separator))&&this.addItem(e,t,!0);break}},onPaste(e){if(this.separator){let t=(e.clipboardData||window.clipboardData).getData("Text");if(t){let n=this.modelValue||[],s=t.split(this.separator);s=s.filter(a=>this.allowDuplicate||n.indexOf(a)===-1),n=[...n,...s],this.updateModel(e,n,!0)}}},onContainerFocus(){this.focused=!0},onContainerBlur(){this.focusedIndex=-1,this.focused=!1},onContainerKeyDown(e){switch(e.code){case"ArrowLeft":this.onArrowLeftKeyOn(e);break;case"ArrowRight":this.onArrowRightKeyOn(e);break;case"Backspace":this.onBackspaceKeyOn(e);break}},onArrowLeftKeyOn(){this.inputValue.length===0&&this.modelValue&&this.modelValue.length>0&&(this.focusedIndex=this.focusedIndex===null?this.modelValue.length-1:this.focusedIndex-1,this.focusedIndex<0&&(this.focusedIndex=0))},onArrowRightKeyOn(){this.inputValue.length===0&&this.modelValue&&this.modelValue.length>0&&(this.focusedIndex===this.modelValue.length-1?(this.focusedIndex=null,this.$refs.input.focus()):this.focusedIndex++)},onBackspaceKeyOn(e){this.focusedIndex!==null&&this.removeItem(e,this.focusedIndex)},updateModel(e,t,n){this.$emit("update:modelValue",t),this.$emit("add",{originalEvent:e,value:t}),this.$refs.input.value="",this.inputValue="",setTimeout(()=>{this.maxedOut&&(this.focused=!1)},0),n&&e.preventDefault()},addItem(e,t,n){if(t&&t.trim().length){let s=this.modelValue?[...this.modelValue]:[];(this.allowDuplicate||s.indexOf(t)===-1)&&(s.push(t),this.updateModel(e,s,n))}},removeItem(e,t){if(this.disabled)return;let n=[...this.modelValue];const s=n.splice(t,1);this.focusedIndex=null,this.$refs.input.focus(),this.$emit("update:modelValue",n),this.$emit("remove",{originalEvent:e,value:s})}},computed:{maxedOut(){return this.max&&this.modelValue&&this.max===this.modelValue.length},containerClass(){return["p-chips p-component p-inputwrapper",{"p-disabled":this.disabled,"p-focus":this.focused,"p-inputwrapper-filled":this.modelValue&&this.modelValue.length||this.inputValue&&this.inputValue.length,"p-inputwrapper-focus":this.focused}]},focusedOptionId(){return this.focusedIndex!==null?`${this.id}_chips_item_${this.focusedIndex}`:null}}};const I=["aria-labelledby","aria-label","aria-activedescendant"],V=["id","aria-label","aria-setsize","aria-posinset"],k={class:"p-chips-token-label"},w=["onClick"],C={class:"p-chips-input-token",role:"option"},B=["id","disabled","placeholder"];function O(e,t,n,s,a,i){return p(),d("div",{class:r(i.containerClass)},[u("ul",{ref:"container",class:"p-inputtext p-chips-multiple-container",tabindex:"-1",role:"listbox","aria-orientation":"horizontal","aria-labelledby":e.ariaLabelledby,"aria-label":e.ariaLabel,"aria-activedescendant":a.focused?i.focusedOptionId:void 0,onClick:t[5]||(t[5]=l=>i.onWrapperClick()),onFocus:t[6]||(t[6]=(...l)=>i.onContainerFocus&&i.onContainerFocus(...l)),onBlur:t[7]||(t[7]=(...l)=>i.onContainerBlur&&i.onContainerBlur(...l)),onKeydown:t[8]||(t[8]=(...l)=>i.onContainerKeyDown&&i.onContainerKeyDown(...l))},[(p(!0),d(f,null,m(n.modelValue,(l,o)=>(p(),d("li",{key:`${o}_${l}`,id:a.id+"_chips_item_"+o,role:"option",class:r(["p-chips-token",{"p-focus":a.focusedIndex===o}]),"aria-label":l,"aria-selected":!0,"aria-setsize":n.modelValue.length,"aria-posinset":o+1},[g(e.$slots,"chip",{value:l},()=>[u("span",k,x(l),1)]),u("span",{class:r(["p-chips-token-icon",n.removeTokenIcon]),onClick:h=>i.removeItem(h,o),"aria-hidden":"true"},null,10,w)],10,V))),128)),u("li",C,[u("input",y({ref:"input",id:n.inputId,type:"text",class:n.inputClass,style:n.inputStyle,disabled:n.disabled||i.maxedOut,placeholder:n.placeholder,onFocus:t[0]||(t[0]=l=>i.onFocus(l)),onBlur:t[1]||(t[1]=l=>i.onBlur(l)),onInput:t[2]||(t[2]=(...l)=>i.onInput&&i.onInput(...l)),onKeydown:t[3]||(t[3]=l=>i.onKeyDown(l)),onPaste:t[4]||(t[4]=l=>i.onPaste(l))},n.inputProps),null,16,B)])],40,I)],2)}function v(e,t){t===void 0&&(t={});var n=t.insertAt;if(!(!e||typeof document>"u")){var s=document.head||document.getElementsByTagName("head")[0],a=document.createElement("style");a.type="text/css",n==="top"&&s.firstChild?s.insertBefore(a,s.firstChild):s.appendChild(a),a.styleSheet?a.styleSheet.cssText=e:a.appendChild(document.createTextNode(e))}}var D=`
.p-chips {
    display: inline-flex;
}
.p-chips-multiple-container {
    margin: 0;
    padding: 0;
    list-style-type: none;
    cursor: text;
    overflow: hidden;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
}
.p-chips-token {
    cursor: default;
    display: inline-flex;
    align-items: center;
    flex: 0 0 auto;
}
.p-chips-input-token {
    flex: 1 1 auto;
    display: inline-flex;
}
.p-chips-token-icon {
    cursor: pointer;
}
.p-chips-input-token input {
    border: 0 none;
    outline: 0 none;
    background-color: transparent;
    margin: 0;
    padding: 0;
    box-shadow: none;
    border-radius: 0;
    width: 100%;
}
.p-fluid .p-chips {
    display: flex;
}
`;v(D);b.render=O;export{b as s};
