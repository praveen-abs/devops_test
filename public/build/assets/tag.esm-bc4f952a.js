import{o as i,c as o,n as l,a as d,r as c,m as p,d as u,t as g}from"./toastservice.esm-6ab5f57c.js";var m={name:"Tag",props:{value:null,severity:null,rounded:Boolean,icon:String},computed:{containerClass(){return["p-tag p-component",{"p-tag-info":this.severity==="info","p-tag-success":this.severity==="success","p-tag-warning":this.severity==="warning","p-tag-danger":this.severity==="danger","p-tag-rounded":this.rounded}]},iconClass(){return["p-tag-icon",this.icon]}}};const h={class:"p-tag-value"};function y(t,a,s,n,e,r){return i(),o("span",p({class:r.containerClass},t.$attrs),[s.icon?(i(),o("span",{key:0,class:l(r.iconClass)},null,2)):d("",!0),c(t.$slots,"default",{},()=>[u("span",h,g(s.value),1)])],16)}function f(t,a){a===void 0&&(a={});var s=a.insertAt;if(!(!t||typeof document>"u")){var n=document.head||document.getElementsByTagName("head")[0],e=document.createElement("style");e.type="text/css",s==="top"&&n.firstChild?n.insertBefore(e,n.firstChild):n.appendChild(e),e.styleSheet?e.styleSheet.cssText=t:e.appendChild(document.createTextNode(t))}}var v=`
.p-tag {
    display: inline-flex;
    align-items: center;
    justify-content: center;
}
.p-tag-icon,
.p-tag-value,
.p-tag-icon.pi {
    line-height: 1.5;
}
.p-tag.p-tag-rounded {
    border-radius: 10rem;
}
`;f(v);m.render=y;export{m as s};
