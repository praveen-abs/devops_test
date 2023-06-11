import{O as d,o as c,c as r,d as u,m as o,n as s,p as h}from"./toastservice.esm-8fb4434b.js";var b={name:"Checkbox",emits:["click","update:modelValue","change","input","focus","blur"],props:{value:null,modelValue:null,binary:Boolean,name:{type:String,default:null},trueValue:{type:null,default:!0},falseValue:{type:null,default:!1},disabled:{type:Boolean,default:!1},readonly:{type:Boolean,default:!1},required:{type:Boolean,default:!1},tabindex:{type:Number,default:null},inputId:{type:String,default:null},inputClass:{type:String,default:null},inputStyle:{type:null,default:null},inputProps:{type:null,default:null},"aria-labelledby":{type:String,default:null},"aria-label":{type:String,default:null}},data(){return{focused:!1}},methods:{onClick(a){if(!this.disabled){let l;this.binary?l=this.checked?this.falseValue:this.trueValue:this.checked?l=this.modelValue.filter(e=>!d.equals(e,this.value)):l=this.modelValue?[...this.modelValue,this.value]:[this.value],this.$emit("click",a),this.$emit("update:modelValue",l),this.$emit("change",a),this.$emit("input",l),this.$refs.input.focus()}},onFocus(a){this.focused=!0,this.$emit("focus",a)},onBlur(a){this.focused=!1,this.$emit("blur",a)}},computed:{checked(){return this.binary?this.modelValue===this.trueValue:d.contains(this.value,this.modelValue)},containerClass(){return["p-checkbox p-component",{"p-checkbox-checked":this.checked,"p-checkbox-disabled":this.disabled,"p-checkbox-focused":this.focused}]}}};const f={class:"p-hidden-accessible"},m=["id","value","name","checked","tabindex","disabled","readonly","required","aria-labelledby","aria-label"];function p(a,l,e,y,n,t){return c(),r("div",{class:s(t.containerClass),onClick:l[2]||(l[2]=i=>t.onClick(i))},[u("div",f,[u("input",o({ref:"input",id:e.inputId,type:"checkbox",value:e.value,name:e.name,checked:t.checked,tabindex:e.tabindex,disabled:e.disabled,readonly:e.readonly,required:e.required,"aria-labelledby":a.ariaLabelledby,"aria-label":a.ariaLabel,onFocus:l[0]||(l[0]=i=>t.onFocus(i)),onBlur:l[1]||(l[1]=i=>t.onBlur(i))},e.inputProps),null,16,m)]),u("div",{ref:"box",class:s(["p-checkbox-box",e.inputClass,{"p-highlight":t.checked,"p-disabled":e.disabled,"p-focus":n.focused}]),style:h(e.inputStyle)},[u("span",{class:s(["p-checkbox-icon",{"pi pi-check":t.checked}])},null,2)],6)],2)}b.render=p;export{b as s};
