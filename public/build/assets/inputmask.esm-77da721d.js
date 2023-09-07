import{D as r,o as n,c as u,n as f}from"./inputnumber.esm-5d69a21b.js";var o={name:"InputMask",emits:["update:modelValue","focus","blur","keydown","complete","keypress","paste"],props:{modelValue:null,slotChar:{type:String,default:"_"},mask:{type:String,default:null},autoClear:{type:Boolean,default:!0},unmask:{type:Boolean,default:!1},readonly:{type:Boolean,default:!1}},mounted(){this.tests=[],this.partialPosition=this.mask.length,this.len=this.mask.length,this.firstNonMaskPos=null,this.defs={9:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"};let e=r.getUserAgent();this.androidChrome=/chrome/i.test(e)&&/android/i.test(e);let s=this.mask.split("");for(let t=0;t<s.length;t++){let i=s[t];i==="?"?(this.len--,this.partialPosition=t):this.defs[i]?(this.tests.push(new RegExp(this.defs[i])),this.firstNonMaskPos===null&&(this.firstNonMaskPos=this.tests.length-1),t<this.partialPosition&&(this.lastRequiredNonMaskPos=this.tests.length-1)):this.tests.push(null)}this.buffer=[];for(let t=0;t<s.length;t++){let i=s[t];i!=="?"&&(this.defs[i]?this.buffer.push(this.getPlaceholder(t)):this.buffer.push(i))}this.defaultBuffer=this.buffer.join(""),this.updateValue(!1)},updated(){this.isValueUpdated()&&this.updateValue()},methods:{onInput(e){this.androidChrome?this.handleAndroidInput(e):this.handleInputChange(e),this.$emit("update:modelValue",e.target.value)},onFocus(e){if(this.readonly)return;this.focus=!0,clearTimeout(this.caretTimeoutId);let s;this.focusText=this.$el.value,s=this.checkVal(),this.caretTimeoutId=setTimeout(()=>{this.$el===document.activeElement&&(this.writeBuffer(),s===this.mask.replace("?","").length?this.caret(0,s):this.caret(s))},10),this.$emit("focus",e)},onBlur(e){if(this.focus=!1,this.checkVal(),this.updateModel(e),this.$el.value!==this.focusText){let s=document.createEvent("HTMLEvents");s.initEvent("change",!0,!1),this.$el.dispatchEvent(s)}this.$emit("blur",e)},onKeyDown(e){if(this.readonly)return;let s=e.which||e.keyCode,t,i,l,h=/iphone/i.test(r.getUserAgent());this.oldVal=this.$el.value,s===8||s===46||h&&s===127?(t=this.caret(),i=t.begin,l=t.end,l-i===0&&(i=s!==46?this.seekPrev(i):l=this.seekNext(i-1),l=s===46?this.seekNext(l):l),this.clearBuffer(i,l),this.shiftL(i,l-1),this.updateModel(e),e.preventDefault()):s===13?(this.$el.blur(),this.updateModel(e)):s===27&&(this.$el.value=this.focusText,this.caret(0,this.checkVal()),this.updateModel(e),e.preventDefault()),this.$emit("keydown",e)},onKeyPress(e){if(!this.readonly){var s=e.which||e.keyCode,t=this.caret(),i,l,h,a;e.ctrlKey||e.altKey||e.metaKey||s<32||(s&&s!==13&&(t.end-t.begin!==0&&(this.clearBuffer(t.begin,t.end),this.shiftL(t.begin,t.end-1)),i=this.seekNext(t.begin-1),i<this.len&&(l=String.fromCharCode(s),this.tests[i].test(l)&&(this.shiftR(i),this.buffer[i]=l,this.writeBuffer(),h=this.seekNext(i),/android/i.test(r.getUserAgent())?setTimeout(()=>{this.caret(h)},0):this.caret(h),t.begin<=this.lastRequiredNonMaskPos&&(a=this.isCompleted()))),e.preventDefault()),this.updateModel(e),a&&this.$emit("complete",e),this.$emit("keypress",e))}},onPaste(e){this.handleInputChange(e),this.$emit("paste",e)},caret(e,s){let t,i,l;if(!(!this.$el.offsetParent||this.$el!==document.activeElement))if(typeof e=="number")i=e,l=typeof s=="number"?s:i,this.$el.setSelectionRange?this.$el.setSelectionRange(i,l):this.$el.createTextRange&&(t=this.$el.createTextRange(),t.collapse(!0),t.moveEnd("character",l),t.moveStart("character",i),t.select());else return this.$el.setSelectionRange?(i=this.$el.selectionStart,l=this.$el.selectionEnd):document.selection&&document.selection.createRange&&(t=document.selection.createRange(),i=0-t.duplicate().moveStart("character",-1e5),l=i+t.text.length),{begin:i,end:l}},isCompleted(){for(let e=this.firstNonMaskPos;e<=this.lastRequiredNonMaskPos;e++)if(this.tests[e]&&this.buffer[e]===this.getPlaceholder(e))return!1;return!0},getPlaceholder(e){return e<this.slotChar.length?this.slotChar.charAt(e):this.slotChar.charAt(0)},seekNext(e){for(;++e<this.len&&!this.tests[e];);return e},seekPrev(e){for(;--e>=0&&!this.tests[e];);return e},shiftL(e,s){let t,i;if(!(e<0)){for(t=e,i=this.seekNext(s);t<this.len;t++)if(this.tests[t]){if(i<this.len&&this.tests[t].test(this.buffer[i]))this.buffer[t]=this.buffer[i],this.buffer[i]=this.getPlaceholder(i);else break;i=this.seekNext(i)}this.writeBuffer(),this.caret(Math.max(this.firstNonMaskPos,e))}},shiftR(e){let s,t,i,l;for(s=e,t=this.getPlaceholder(e);s<this.len;s++)if(this.tests[s])if(i=this.seekNext(s),l=this.buffer[s],this.buffer[s]=t,i<this.len&&this.tests[i].test(l))t=l;else break},handleAndroidInput(e){var s=this.$el.value,t=this.caret();if(this.oldVal&&this.oldVal.length&&this.oldVal.length>s.length){for(this.checkVal(!0);t.begin>0&&!this.tests[t.begin-1];)t.begin--;if(t.begin===0)for(;t.begin<this.firstNonMaskPos&&!this.tests[t.begin];)t.begin++;this.caret(t.begin,t.begin)}else{for(this.checkVal(!0);t.begin<this.len&&!this.tests[t.begin];)t.begin++;this.caret(t.begin,t.begin)}this.isCompleted()&&this.$emit("complete",e)},clearBuffer(e,s){let t;for(t=e;t<s&&t<this.len;t++)this.tests[t]&&(this.buffer[t]=this.getPlaceholder(t))},writeBuffer(){this.$el.value=this.buffer.join("")},checkVal(e){this.isValueChecked=!0;let s=this.$el.value,t=-1,i,l,h;for(i=0,h=0;i<this.len;i++)if(this.tests[i]){for(this.buffer[i]=this.getPlaceholder(i);h++<s.length;)if(l=s.charAt(h-1),this.tests[i].test(l)){this.buffer[i]=l,t=i;break}if(h>s.length){this.clearBuffer(i+1,this.len);break}}else this.buffer[i]===s.charAt(h)&&h++,i<this.partialPosition&&(t=i);return e?this.writeBuffer():t+1<this.partialPosition?this.autoClear||this.buffer.join("")===this.defaultBuffer?(this.$el.value&&(this.$el.value=""),this.clearBuffer(0,this.len)):this.writeBuffer():(this.writeBuffer(),this.$el.value=this.$el.value.substring(0,t+1)),this.partialPosition?i:this.firstNonMaskPos},handleInputChange(e){if(!this.readonly){var s=this.checkVal(!0);this.caret(s),this.updateModel(e),this.isCompleted()&&this.$emit("complete",e)}},getUnmaskedValue(){let e=[];for(let s=0;s<this.buffer.length;s++){let t=this.buffer[s];this.tests[s]&&t!==this.getPlaceholder(s)&&e.push(t)}return e.join("")},updateModel(e){let s=this.unmask?this.getUnmaskedValue():e.target.value;this.$emit("update:modelValue",this.defaultBuffer!==s?s:"")},updateValue(e=!0){this.$el&&(this.modelValue==null?(this.$el.value="",e&&this.$emit("update:modelValue","")):(this.$el.value=this.modelValue,this.checkVal(),setTimeout(()=>{if(this.$el&&(this.writeBuffer(),this.checkVal(),e)){let s=this.unmask?this.getUnmaskedValue():this.$el.value;this.$emit("update:modelValue",this.defaultBuffer!==s?s:"")}},10)),this.focusText=this.$el.value)},isValueUpdated(){return this.unmask?this.modelValue!=this.getUnmaskedValue():this.defaultBuffer!==this.$el.value&&this.$el.value!==this.modelValue}},computed:{filled(){return this.modelValue!=null&&this.modelValue.toString().length>0},inputClass(){return["p-inputmask p-inputtext p-component",{"p-filled":this.filled}]}}};const d=["readonly"];function c(e,s,t,i,l,h){return n(),u("input",{class:f(h.inputClass),readonly:t.readonly,onInput:s[0]||(s[0]=(...a)=>h.onInput&&h.onInput(...a)),onFocus:s[1]||(s[1]=(...a)=>h.onFocus&&h.onFocus(...a)),onBlur:s[2]||(s[2]=(...a)=>h.onBlur&&h.onBlur(...a)),onKeydown:s[3]||(s[3]=(...a)=>h.onKeyDown&&h.onKeyDown(...a)),onKeypress:s[4]||(s[4]=(...a)=>h.onKeyPress&&h.onKeyPress(...a)),onPaste:s[5]||(s[5]=(...a)=>h.onPaste&&h.onPaste(...a))},null,42,d)}o.render=c;export{o as s};
