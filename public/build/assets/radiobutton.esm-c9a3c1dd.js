import{O as n,o,c,d as u,m as r,n as d}from"./inputnumber.esm-e362c3ab.js";var b={name:"RadioButton",emits:["click","update:modelValue","change","focus","blur"],props:{value:null,modelValue:null,name:{type:String,default:null},disabled:{type:Boolean,default:!1},inputId:{type:String,default:null},inputClass:{type:String,default:null},inputStyle:{type:null,default:null},inputProps:{type:null,default:null},"aria-labelledby":{type:String,default:null},"aria-label":{type:String,default:null}},data(){return{focused:!1}},methods:{onClick(e){this.disabled||(this.$emit("click",e),this.$emit("update:modelValue",this.value),this.$refs.input.focus(),this.checked||this.$emit("change",e))},onFocus(e){this.focused=!0,this.$emit("focus",e)},onBlur(e){this.focused=!1,this.$emit("blur",e)}},computed:{checked(){return this.modelValue!=null&&n.equals(this.modelValue,this.value)},containerClass(){return["p-radiobutton p-component",{"p-radiobutton-checked":this.checked,"p-radiobutton-disabled":this.disabled,"p-radiobutton-focused":this.focused}]}}};const h={class:"p-hidden-accessible"},f=["id","name","checked","disabled","value","aria-labelledby","aria-label"],m=u("div",{class:"p-radiobutton-icon"},null,-1),p=[m];function y(e,t,l,k,s,a){return o(),c("div",{class:d(a.containerClass),onClick:t[2]||(t[2]=i=>a.onClick(i))},[u("div",h,[u("input",r({ref:"input",id:l.inputId,type:"radio",class:l.inputClass,style:l.inputStyle,name:l.name,checked:a.checked,disabled:l.disabled,value:l.value,"aria-labelledby":e.ariaLabelledby,"aria-label":e.ariaLabel,onFocus:t[0]||(t[0]=(...i)=>a.onFocus&&a.onFocus(...i)),onBlur:t[1]||(t[1]=(...i)=>a.onBlur&&a.onBlur(...i))},l.inputProps),null,16,f)]),u("div",{ref:"box",class:d(["p-radiobutton-box",{"p-highlight":a.checked,"p-disabled":l.disabled,"p-focus":s.focused}])},p,2)],2)}b.render=y;export{b as s};
