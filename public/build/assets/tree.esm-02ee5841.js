import{c as d,p as m,n as h,o,O as K,D as f,R as S,e as a,j as k,a as p,b as y,d as N,F as g,k as w,t as T,f as b,E as M,g as x,l as v}from"./toastservice.esm-55c6bc57.js";var E={name:"Skeleton",props:{shape:{type:String,default:"rectangle"},size:{type:String,default:null},width:{type:String,default:"100%"},height:{type:String,default:"1rem"},borderRadius:{type:String,default:null},animation:{type:String,default:"wave"}},computed:{containerClass(){return["p-skeleton p-component",{"p-skeleton-circle":this.shape==="circle","p-skeleton-none":this.animation==="none"}]},containerStyle(){return this.size?{width:this.size,height:this.size,borderRadius:this.borderRadius}:{width:this.width,height:this.height,borderRadius:this.borderRadius}}}};function _(e,t,n,i,s,l){return o(),d("div",{style:m(l.containerStyle),class:h(l.containerClass),"aria-hidden":"true"},null,6)}function A(e,t){t===void 0&&(t={});var n=t.insertAt;if(!(!e||typeof document>"u")){var i=document.head||document.getElementsByTagName("head")[0],s=document.createElement("style");s.type="text/css",n==="top"&&i.firstChild?i.insertBefore(s,i.firstChild):i.appendChild(s),s.styleSheet?s.styleSheet.cssText=e:s.appendChild(document.createTextNode(e))}}var I=`
.p-skeleton {
    position: relative;
    overflow: hidden;
}
.p-skeleton::after {
    content: '';
    animation: p-skeleton-animation 1.2s infinite;
    height: 100%;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    transform: translateX(-100%);
    z-index: 1;
}
.p-skeleton.p-skeleton-circle {
    border-radius: 50%;
}
.p-skeleton-none::after {
    animation: none;
}
@keyframes p-skeleton-animation {
from {
        transform: translateX(-100%);
}
to {
        transform: translateX(100%);
}
}
`;A(I);E.render=_;var C={name:"TreeNode",emits:["node-toggle","node-click","checkbox-change"],props:{node:{type:null,default:null},expandedKeys:{type:null,default:null},selectionKeys:{type:null,default:null},selectionMode:{type:String,default:null},templates:{type:null,default:null},level:{type:Number,default:null},index:{type:Number,default:null}},nodeTouched:!1,mounted(){this.$refs.currentNode.closest(".p-treeselect-items-wrapper")&&this.setAllNodesTabIndexes()},methods:{toggle(){this.$emit("node-toggle",this.node)},label(e){return typeof e.label=="function"?e.label():e.label},onChildNodeToggle(e){this.$emit("node-toggle",e)},onClick(e){f.hasClass(e.target,"p-tree-toggler")||f.hasClass(e.target.parentElement,"p-tree-toggler")||(this.isCheckboxSelectionMode()?this.toggleCheckbox():this.$emit("node-click",{originalEvent:e,nodeTouched:this.nodeTouched,node:this.node}),this.nodeTouched=!1)},onChildNodeClick(e){this.$emit("node-click",e)},onTouchEnd(){this.nodeTouched=!0},onKeyDown(e){if(this.isSameNode(e))switch(e.code){case"Tab":this.onTabKey(e);break;case"ArrowDown":this.onArrowDown(e);break;case"ArrowUp":this.onArrowUp(e);break;case"ArrowRight":this.onArrowRight(e);break;case"ArrowLeft":this.onArrowLeft(e);break;case"Enter":case"Space":this.onEnterKey(e);break}},onArrowDown(e){const t=e.target,n=t.children[1];if(n)this.focusRowChange(t,n.children[0]);else if(t.nextElementSibling)this.focusRowChange(t,t.nextElementSibling);else{let i=this.findNextSiblingOfAncestor(t);i&&this.focusRowChange(t,i)}e.preventDefault()},onArrowUp(e){const t=e.target;if(t.previousElementSibling)this.focusRowChange(t,t.previousElementSibling,this.findLastVisibleDescendant(t.previousElementSibling));else{let n=this.getParentNodeElement(t);n&&this.focusRowChange(t,n)}e.preventDefault()},onArrowRight(e){this.leaf||this.expanded||(e.currentTarget.tabIndex=-1,this.$emit("node-toggle",this.node),this.$nextTick(()=>{this.onArrowDown(e)}))},onArrowLeft(e){const t=f.findSingle(e.currentTarget,".p-tree-toggler");if(this.level===0&&!this.expanded)return!1;if(this.expanded&&!this.leaf)return t.click(),!1;const n=this.findBeforeClickableNode(e.currentTarget);n&&this.focusRowChange(e.currentTarget,n)},onEnterKey(e){this.setTabIndexForSelectionMode(e,this.nodeTouched),this.onClick(e),e.preventDefault()},onTabKey(){this.setAllNodesTabIndexes()},setAllNodesTabIndexes(){const e=f.find(this.$refs.currentNode.closest(".p-tree-container"),".p-treenode"),t=[...e].some(n=>n.getAttribute("aria-selected")==="true"||n.getAttribute("aria-checked")==="true");if([...e].forEach(n=>{n.tabIndex=-1}),t){const n=[...e].filter(i=>i.getAttribute("aria-selected")==="true"||i.getAttribute("aria-checked")==="true");n[0].tabIndex=0;return}[...e][0].tabIndex=0},setTabIndexForSelectionMode(e,t){if(this.selectionMode!==null){const n=[...f.find(this.$refs.currentNode.parentElement,".p-treenode")];e.currentTarget.tabIndex=t===!1?-1:0,n.every(i=>i.tabIndex===-1)&&(n[0].tabIndex=0)}},focusRowChange(e,t,n){e.tabIndex="-1",t.tabIndex="0",this.focusNode(n||t)},findBeforeClickableNode(e){const t=e.closest("ul").closest("li");if(t){const n=f.findSingle(t,"button");return n&&n.style.visibility!=="hidden"?t:this.findBeforeClickableNode(e.previousElementSibling)}return null},toggleCheckbox(){let e=this.selectionKeys?{...this.selectionKeys}:{};const t=!this.checked;this.propagateDown(this.node,t,e),this.$emit("checkbox-change",{node:this.node,check:t,selectionKeys:e})},propagateDown(e,t,n){if(t?n[e.key]={checked:!0,partialChecked:!1}:delete n[e.key],e.children&&e.children.length)for(let i of e.children)this.propagateDown(i,t,n)},propagateUp(e){let t=e.check,n={...e.selectionKeys},i=0,s=!1;for(let l of this.node.children)n[l.key]&&n[l.key].checked?i++:n[l.key]&&n[l.key].partialChecked&&(s=!0);t&&i===this.node.children.length?n[this.node.key]={checked:!0,partialChecked:!1}:(t||delete n[this.node.key],s||i>0&&i!==this.node.children.length?n[this.node.key]={checked:!1,partialChecked:!0}:delete n[this.node.key]),this.$emit("checkbox-change",{node:e.node,check:e.check,selectionKeys:n})},onChildCheckboxChange(e){this.$emit("checkbox-change",e)},findNextSiblingOfAncestor(e){let t=this.getParentNodeElement(e);return t?t.nextElementSibling?t.nextElementSibling:this.findNextSiblingOfAncestor(t):null},findLastVisibleDescendant(e){const t=e.children[1];if(t){const n=t.children[t.children.length-1];return this.findLastVisibleDescendant(n)}else return e},getParentNodeElement(e){const t=e.parentElement.parentElement;return f.hasClass(t,"p-treenode")?t:null},focusNode(e){e.focus()},isCheckboxSelectionMode(){return this.selectionMode==="checkbox"},isSameNode(e){return e.currentTarget&&(e.currentTarget.isSameNode(e.target)||e.currentTarget.isSameNode(e.target.closest(".p-treenode")))}},computed:{hasChildren(){return this.node.children&&this.node.children.length>0},expanded(){return this.expandedKeys&&this.expandedKeys[this.node.key]===!0},leaf(){return this.node.leaf===!1?!1:!(this.node.children&&this.node.children.length)},selectable(){return this.node.selectable===!1?!1:this.selectionMode!=null},selected(){return this.selectionMode&&this.selectionKeys?this.selectionKeys[this.node.key]===!0:!1},containerClass(){return["p-treenode",{"p-treenode-leaf":this.leaf}]},contentClass(){return["p-treenode-content",this.node.styleClass,{"p-treenode-selectable":this.selectable,"p-highlight":this.checkboxMode?this.checked:this.selected}]},icon(){return["p-treenode-icon",this.node.icon]},toggleIcon(){return["p-tree-toggler-icon pi pi-fw",this.expanded?this.node.expandedIcon||"pi-chevron-down":this.node.collapsedIcon||"pi-chevron-right"]},checkboxClass(){return["p-checkbox-box",{"p-highlight":this.checked,"p-indeterminate":this.partialChecked}]},checkboxIcon(){return["p-checkbox-icon",{"pi pi-check":this.checked,"pi pi-minus":this.partialChecked}]},checkboxMode(){return this.selectionMode==="checkbox"&&this.node.selectable!==!1},checked(){return this.selectionKeys?this.selectionKeys[this.node.key]&&this.selectionKeys[this.node.key].checked:!1},partialChecked(){return this.selectionKeys?this.selectionKeys[this.node.key]&&this.selectionKeys[this.node.key].partialChecked:!1},ariaChecked(){return this.selectionMode==="single"||this.selectionMode==="multiple"?this.selected:void 0},ariaSelected(){return this.checkboxMode?this.checked:void 0}},directives:{ripple:S}};const D=["aria-label","aria-selected","aria-expanded","aria-setsize","aria-posinset","aria-level","aria-checked","tabindex"],L={key:0,class:"p-checkbox p-component","aria-hidden":"true"},R={class:"p-treenode-label"},B={key:0,class:"p-treenode-children",role:"group"};function V(e,t,n,i,s,l){const c=x("TreeNode",!0),u=v("ripple");return o(),d("li",{ref:"currentNode",class:h(l.containerClass),role:"treeitem","aria-label":l.label(n.node),"aria-selected":l.ariaSelected,"aria-expanded":l.expanded,"aria-setsize":n.node.children?n.node.children.length:0,"aria-posinset":n.index+1,"aria-level":n.level,"aria-checked":l.ariaChecked,tabindex:n.index===0?0:-1,onKeydown:t[3]||(t[3]=(...r)=>l.onKeyDown&&l.onKeyDown(...r))},[a("div",{class:h(l.contentClass),onClick:t[1]||(t[1]=(...r)=>l.onClick&&l.onClick(...r)),onTouchend:t[2]||(t[2]=(...r)=>l.onTouchEnd&&l.onTouchEnd(...r)),style:m(n.node.style)},[k((o(),d("button",{type:"button",class:"p-tree-toggler p-link",onClick:t[0]||(t[0]=(...r)=>l.toggle&&l.toggle(...r)),tabindex:"-1","aria-hidden":"true"},[a("span",{class:h(l.toggleIcon)},null,2)])),[[u]]),l.checkboxMode?(o(),d("div",L,[a("div",{class:h(l.checkboxClass),role:"checkbox"},[a("span",{class:h(l.checkboxIcon)},null,2)],2)])):p("",!0),a("span",{class:h(l.icon)},null,2),a("span",R,[n.templates[n.node.type]||n.templates.default?(o(),y(N(n.templates[n.node.type]||n.templates.default),{key:0,node:n.node},null,8,["node"])):(o(),d(g,{key:1},[w(T(l.label(n.node)),1)],64))])],38),l.hasChildren&&l.expanded?(o(),d("ul",B,[(o(!0),d(g,null,b(n.node.children,r=>(o(),y(c,{key:r.key,node:r,templates:n.templates,level:n.level+1,expandedKeys:n.expandedKeys,onNodeToggle:l.onChildNodeToggle,onNodeClick:l.onChildNodeClick,selectionMode:n.selectionMode,selectionKeys:n.selectionKeys,onCheckboxChange:l.propagateUp},null,8,["node","templates","level","expandedKeys","onNodeToggle","onNodeClick","selectionMode","selectionKeys","onCheckboxChange"]))),128))])):p("",!0)],42,D)}C.render=V;var F={name:"Tree",emits:["node-expand","node-collapse","update:expandedKeys","update:selectionKeys","node-select","node-unselect"],props:{value:{type:null,default:null},expandedKeys:{type:null,default:null},selectionKeys:{type:null,default:null},selectionMode:{type:String,default:null},metaKeySelection:{type:Boolean,default:!0},loading:{type:Boolean,default:!1},loadingIcon:{type:String,default:"pi pi-spinner"},filter:{type:Boolean,default:!1},filterBy:{type:String,default:"label"},filterMode:{type:String,default:"lenient"},filterPlaceholder:{type:String,default:null},filterLocale:{type:String,default:void 0},scrollHeight:{type:String,default:null},level:{type:Number,default:0},"aria-labelledby":{type:String,default:null},"aria-label":{type:String,default:null}},data(){return{d_expandedKeys:this.expandedKeys||{},filterValue:null}},watch:{expandedKeys(e){this.d_expandedKeys=e}},methods:{onNodeToggle(e){const t=e.key;this.d_expandedKeys[t]?(delete this.d_expandedKeys[t],this.$emit("node-collapse",e)):(this.d_expandedKeys[t]=!0,this.$emit("node-expand",e)),this.d_expandedKeys={...this.d_expandedKeys},this.$emit("update:expandedKeys",this.d_expandedKeys)},onNodeClick(e){if(this.selectionMode!=null&&e.node.selectable!==!1){const n=(e.nodeTouched?!1:this.metaKeySelection)?this.handleSelectionWithMetaKey(e):this.handleSelectionWithoutMetaKey(e);this.$emit("update:selectionKeys",n)}},onCheckboxChange(e){this.$emit("update:selectionKeys",e.selectionKeys),e.check?this.$emit("node-select",e.node):this.$emit("node-unselect",e.node)},handleSelectionWithMetaKey(e){const t=e.originalEvent,n=e.node,i=t.metaKey||t.ctrlKey,s=this.isNodeSelected(n);let l;return s&&i?(this.isSingleSelectionMode()?l={}:(l={...this.selectionKeys},delete l[n.key]),this.$emit("node-unselect",n)):(this.isSingleSelectionMode()?l={}:this.isMultipleSelectionMode()&&(l=i?this.selectionKeys?{...this.selectionKeys}:{}:{}),l[n.key]=!0,this.$emit("node-select",n)),l},handleSelectionWithoutMetaKey(e){const t=e.node,n=this.isNodeSelected(t);let i;return this.isSingleSelectionMode()?n?(i={},this.$emit("node-unselect",t)):(i={},i[t.key]=!0,this.$emit("node-select",t)):n?(i={...this.selectionKeys},delete i[t.key],this.$emit("node-unselect",t)):(i=this.selectionKeys?{...this.selectionKeys}:{},i[t.key]=!0,this.$emit("node-select",t)),i},isSingleSelectionMode(){return this.selectionMode==="single"},isMultipleSelectionMode(){return this.selectionMode==="multiple"},isNodeSelected(e){return this.selectionMode&&this.selectionKeys?this.selectionKeys[e.key]===!0:!1},isChecked(e){return this.selectionKeys?this.selectionKeys[e.key]&&this.selectionKeys[e.key].checked:!1},isNodeLeaf(e){return e.leaf===!1?!1:!(e.children&&e.children.length)},onFilterKeydown(e){e.which===13&&e.preventDefault()},findFilteredNodes(e,t){if(e){let n=!1;if(e.children){let i=[...e.children];e.children=[];for(let s of i){let l={...s};this.isFilterMatched(l,t)&&(n=!0,e.children.push(l))}}if(n)return!0}},isFilterMatched(e,{searchFields:t,filterText:n,strict:i}){let s=!1;for(let l of t)String(K.resolveFieldData(e,l)).toLocaleLowerCase(this.filterLocale).indexOf(n)>-1&&(s=!0);return(!s||i&&!this.isNodeLeaf(e))&&(s=this.findFilteredNodes(e,{searchFields:t,filterText:n,strict:i})||s),s}},computed:{containerClass(){return["p-tree p-component",{"p-tree-selectable":this.selectionMode!=null,"p-tree-loading":this.loading,"p-tree-flex-scrollable":this.scrollHeight==="flex"}]},loadingIconClass(){return["p-tree-loading-icon pi-spin",this.loadingIcon]},filteredValue(){let e=[];const t=this.filterBy.split(","),n=this.filterValue.trim().toLocaleLowerCase(this.filterLocale),i=this.filterMode==="strict";for(let s of this.value){let l={...s},c={searchFields:t,filterText:n,strict:i};(i&&(this.findFilteredNodes(l,c)||this.isFilterMatched(l,c))||!i&&(this.isFilterMatched(l,c)||this.findFilteredNodes(l,c)))&&e.push(l)}return e},valueToRender(){return this.filterValue&&this.filterValue.trim().length>0?this.filteredValue:this.value}},components:{TreeNode:C}};const z={key:0,class:"p-tree-loading-overlay p-component-overlay"},P={key:1,class:"p-tree-filter-container"},U=["placeholder"],j=a("span",{class:"p-tree-filter-icon pi pi-search"},null,-1),O=["aria-labelledby","aria-label"];function H(e,t,n,i,s,l){const c=x("TreeNode");return o(),d("div",{class:h(l.containerClass)},[n.loading?(o(),d("div",z,[a("i",{class:h(l.loadingIconClass)},null,2)])):p("",!0),n.filter?(o(),d("div",P,[k(a("input",{"onUpdate:modelValue":t[0]||(t[0]=u=>s.filterValue=u),type:"text",autocomplete:"off",class:"p-tree-filter p-inputtext p-component",placeholder:n.filterPlaceholder,onKeydown:t[1]||(t[1]=(...u)=>l.onFilterKeydown&&l.onFilterKeydown(...u))},null,40,U),[[M,s.filterValue]]),j])):p("",!0),a("div",{class:"p-tree-wrapper",style:m({maxHeight:n.scrollHeight})},[a("ul",{class:"p-tree-container",role:"tree","aria-labelledby":e.ariaLabelledby,"aria-label":e.ariaLabel},[(o(!0),d(g,null,b(l.valueToRender,(u,r)=>(o(),y(c,{key:u.key,node:u,templates:e.$slots,level:n.level+1,index:r,expandedKeys:s.d_expandedKeys,onNodeToggle:l.onNodeToggle,onNodeClick:l.onNodeClick,selectionMode:n.selectionMode,selectionKeys:n.selectionKeys,onCheckboxChange:l.onCheckboxChange},null,8,["node","templates","level","index","expandedKeys","onNodeToggle","onNodeClick","selectionMode","selectionKeys","onCheckboxChange"]))),128))],8,O)],4)],2)}function W(e,t){t===void 0&&(t={});var n=t.insertAt;if(!(!e||typeof document>"u")){var i=document.head||document.getElementsByTagName("head")[0],s=document.createElement("style");s.type="text/css",n==="top"&&i.firstChild?i.insertBefore(s,i.firstChild):i.appendChild(s),s.styleSheet?s.styleSheet.cssText=e:s.appendChild(document.createTextNode(e))}}var X=`
.p-tree-container {
    margin: 0;
    padding: 0;
    list-style-type: none;
    overflow: auto;
}
.p-treenode-children {
    margin: 0;
    padding: 0;
    list-style-type: none;
}
.p-tree-wrapper {
    overflow: auto;
}
.p-treenode-selectable {
    cursor: pointer;
    user-select: none;
}
.p-tree-toggler {
    cursor: pointer;
    user-select: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    position: relative;
    flex-shrink: 0;
}
.p-treenode-leaf > .p-treenode-content .p-tree-toggler {
    visibility: hidden;
}
.p-treenode-content {
    display: flex;
    align-items: center;
}
.p-tree-filter {
    width: 100%;
}
.p-tree-filter-container {
    position: relative;
    display: block;
    width: 100%;
}
.p-tree-filter-icon {
    position: absolute;
    top: 50%;
    margin-top: -0.5rem;
}
.p-tree-loading {
    position: relative;
    min-height: 4rem;
}
.p-tree .p-tree-loading-overlay {
    position: absolute;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
}
.p-tree-flex-scrollable {
    display: flex;
    flex: 1;
    height: 100%;
    flex-direction: column;
}
.p-tree-flex-scrollable .p-tree-wrapper {
    flex: 1;
}
`;W(X);F.render=H;export{E as a,F as s};
