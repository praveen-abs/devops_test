import{D as m,c as d,e as o,n as r,b as k,d as N,a as h,l as p,F as u,f,h as C,o as a,g as K}from"./toastservice.esm-2710e797.js";var b={name:"OrganizationChartNode",emits:["node-click","node-toggle"],props:{node:{type:null,default:null},templates:{type:null,default:null},collapsible:{type:Boolean,default:!1},collapsedKeys:{type:null,default:null},selectionKeys:{type:null,default:null},selectionMode:{type:String,default:null}},methods:{onNodeClick(t){m.hasClass(t.target,"p-node-toggler")||m.hasClass(t.target,"p-node-toggler-icon")||this.selectionMode&&this.$emit("node-click",this.node)},onChildNodeClick(t){this.$emit("node-click",t)},toggleNode(){this.$emit("node-toggle",this.node)},onChildNodeToggle(t){this.$emit("node-toggle",t)},onKeydown(t){(t.code==="Enter"||t.code==="Space")&&(this.toggleNode(),t.preventDefault())}},computed:{nodeContentClass(){return["p-organizationchart-node-content",this.node.styleClass,{"p-organizationchart-selectable-node":this.selectable,"p-highlight":this.selected}]},leaf(){return this.node.leaf===!1?!1:!(this.node.children&&this.node.children.length)},colspan(){return this.node.children&&this.node.children.length?this.node.children.length*2:null},childStyle(){return{visibility:!this.leaf&&this.expanded?"inherit":"hidden"}},expanded(){return this.collapsedKeys[this.node.key]===void 0},selectable(){return this.selectionMode&&this.node.selectable!==!1},selected(){return this.selectable&&this.selectionKeys&&this.selectionKeys[this.node.key]===!0},toggleable(){return this.collapsible&&this.node.collapsible!==!1&&!this.leaf}}};const z={class:"p-organizationchart-table"},_={key:0},v=["colspan"],x=["colspan"],M=o("div",{class:"p-organizationchart-line-down"},null,-1),w=[M],T=["colspan"],S=o("div",{class:"p-organizationchart-line-down"},null,-1),B=[S];function O(t,l,e,c,i,n){const g=K("OrganizationChartNode",!0);return a(),d("table",z,[o("tbody",null,[e.node?(a(),d("tr",_,[o("td",{colspan:n.colspan},[o("div",{class:r(n.nodeContentClass),onClick:l[2]||(l[2]=(...s)=>n.onNodeClick&&n.onNodeClick(...s))},[(a(),k(N(e.templates[e.node.type]||e.templates.default),{node:e.node},null,8,["node"])),n.toggleable?(a(),d("a",{key:0,tabindex:"0",class:"p-node-toggler",onClick:l[0]||(l[0]=(...s)=>n.toggleNode&&n.toggleNode(...s)),onKeydown:l[1]||(l[1]=(...s)=>n.onKeydown&&n.onKeydown(...s))},[o("i",{class:r(["p-node-toggler-icon pi",{"pi-chevron-down":n.expanded,"pi-chevron-up":!n.expanded}])},null,2)],32)):h("",!0)],2)],8,v)])):h("",!0),o("tr",{style:p(n.childStyle),class:"p-organizationchart-lines"},[o("td",{colspan:n.colspan},w,8,x)],4),o("tr",{style:p(n.childStyle),class:"p-organizationchart-lines"},[e.node.children&&e.node.children.length===1?(a(),d("td",{key:0,colspan:n.colspan},B,8,T)):h("",!0),e.node.children&&e.node.children.length>1?(a(!0),d(u,{key:1},f(e.node.children,(s,y)=>(a(),d(u,{key:s.key},[o("td",{class:r(["p-organizationchart-line-left",{"p-organizationchart-line-top":y!==0}])}," ",2),o("td",{class:r(["p-organizationchart-line-right",{"p-organizationchart-line-top":y!==e.node.children.length-1}])}," ",2)],64))),128)):h("",!0)],4),o("tr",{style:p(n.childStyle),class:"p-organizationchart-nodes"},[(a(!0),d(u,null,f(e.node.children,s=>(a(),d("td",{key:s.key,colspan:"2"},[C(g,{node:s,templates:e.templates,collapsedKeys:e.collapsedKeys,onNodeToggle:n.onChildNodeToggle,collapsible:e.collapsible,selectionMode:e.selectionMode,selectionKeys:e.selectionKeys,onNodeClick:n.onChildNodeClick},null,8,["node","templates","collapsedKeys","onNodeToggle","collapsible","selectionMode","selectionKeys","onNodeClick"])]))),128))],4)])])}b.render=O;var D={name:"OrganizationChart",emits:["node-unselect","node-select","update:selectionKeys","node-expand","node-collapse","update:collapsedKeys"],props:{value:{type:null,default:null},selectionKeys:{type:null,default:null},selectionMode:{type:String,default:null},collapsible:{type:Boolean,default:!1},collapsedKeys:{type:null,default:null}},data(){return{d_collapsedKeys:this.collapsedKeys||{}}},watch:{collapsedKeys(t){this.d_collapsedKeys=t}},methods:{onNodeClick(t){const l=t.key;if(this.selectionMode){let e=this.selectionKeys?{...this.selectionKeys}:{};e[l]?(delete e[l],this.$emit("node-unselect",t)):(this.selectionMode==="single"&&(e={}),e[l]=!0,this.$emit("node-select",t)),this.$emit("update:selectionKeys",e)}},onNodeToggle(t){const l=t.key;this.d_collapsedKeys[l]?(delete this.d_collapsedKeys[l],this.$emit("node-expand",t)):(this.d_collapsedKeys[l]=!0,this.$emit("node-collapse",t)),this.d_collapsedKeys={...this.d_collapsedKeys},this.$emit("update:collapsedKeys",this.d_collapsedKeys)}},components:{OrganizationChartNode:b}};const E={class:"p-organizationchart p-component"};function V(t,l,e,c,i,n){const g=K("OrganizationChartNode");return a(),d("div",E,[C(g,{node:e.value,templates:t.$slots,onNodeToggle:n.onNodeToggle,collapsedKeys:i.d_collapsedKeys,collapsible:e.collapsible,onNodeClick:n.onNodeClick,selectionMode:e.selectionMode,selectionKeys:e.selectionKeys},null,8,["node","templates","onNodeToggle","collapsedKeys","collapsible","onNodeClick","selectionMode","selectionKeys"])])}function A(t,l){l===void 0&&(l={});var e=l.insertAt;if(!(!t||typeof document>"u")){var c=document.head||document.getElementsByTagName("head")[0],i=document.createElement("style");i.type="text/css",e==="top"&&c.firstChild?c.insertBefore(i,c.firstChild):c.appendChild(i),i.styleSheet?i.styleSheet.cssText=t:i.appendChild(document.createTextNode(t))}}var F=`
.p-organizationchart-table {
    border-spacing: 0;
    border-collapse: separate;
    margin: 0 auto;
}
.p-organizationchart-table > tbody > tr > td {
    text-align: center;
    vertical-align: top;
    padding: 0 0.75rem;
}
.p-organizationchart-node-content {
    display: inline-block;
    position: relative;
}
.p-organizationchart-node-content .p-node-toggler {
    position: absolute;
    bottom: -0.75rem;
    margin-left: -0.75rem;
    z-index: 2;
    left: 50%;
    user-select: none;
    cursor: pointer;
    width: 1.5rem;
    height: 1.5rem;
    text-decoration: none;
}
.p-organizationchart-node-content .p-node-toggler .p-node-toggler-icon {
    position: relative;
    top: 0.25rem;
}
.p-organizationchart-line-down {
    margin: 0 auto;
    height: 20px;
    width: 1px;
}
.p-organizationchart-line-right {
    border-radius: 0px;
}
.p-organizationchart-line-left {
    border-radius: 0;
}
.p-organizationchart-selectable-node {
    cursor: pointer;
}
`;A(F);D.render=V;export{D as s};
