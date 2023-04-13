import{O as E,b as d,r as b,n as c,o as r,l as F,t as h,R as z,e as f,w as S,T as P,k as C,z as A,g as o,m as j,d as u,p as U,q as k,D as w,v as _,h as x,F as L,x as D,j as I,i as g}from"./toastservice.esm-6fba28a8.js";var M={name:"Badge",props:{value:{type:[String,Number],default:null},severity:{type:String,default:null},size:{type:String,default:null}},computed:{containerClass(){return this.$slots.default?"p-overlay-badge":this.badgeClass},badgeClass(){return["p-badge p-component",{"p-badge-no-gutter":E.isNotEmpty(this.value)&&String(this.value).length===1,"p-badge-dot":E.isEmpty(this.value)&&!this.$slots.default,"p-badge-lg":this.size==="large","p-badge-xl":this.size==="xlarge","p-badge-info":this.severity==="info","p-badge-success":this.severity==="success","p-badge-warning":this.severity==="warning","p-badge-danger":this.severity==="danger"}]}}};function R(e,i,s,n,l,t){return r(),d("span",{class:c(t.badgeClass)},[b(e.$slots,"default",{},()=>[F(h(s.value),1)])],2)}M.render=R;var T={name:"Message",emits:["close"],props:{severity:{type:String,default:"info"},closable:{type:Boolean,default:!0},sticky:{type:Boolean,default:!0},life:{type:Number,default:3e3},icon:{type:String,default:null},closeIcon:{type:String,default:"pi pi-times"},closeButtonProps:{type:null,default:null}},timeout:null,data(){return{visible:!0}},mounted(){this.sticky||this.x()},methods:{close(e){this.visible=!1,this.$emit("close",e)},x(){setTimeout(()=>{this.visible=!1},this.life)}},computed:{containerClass(){return"p-message p-component p-message-"+this.severity},iconClass(){return["p-message-icon pi",this.icon?this.icon:{"pi-info-circle":this.severity==="info","pi-check":this.severity==="success","pi-exclamation-triangle":this.severity==="warn","pi-times-circle":this.severity==="error"}]},closeAriaLabel(){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria.close:void 0}},directives:{ripple:z}};const W={class:"p-message-wrapper"},O={class:"p-message-text"},K=["aria-label"];function q(e,i,s,n,l,t){const m=U("ripple");return r(),f(P,{name:"p-message",appear:""},{default:S(()=>[C(o("div",{class:c(t.containerClass),role:"alert","aria-live":"assertive","aria-atomic":"true"},[o("div",W,[o("span",{class:c(t.iconClass)},null,2),o("div",O,[b(e.$slots,"default")]),s.closable?C((r(),d("button",j({key:0,class:"p-message-close p-link","aria-label":t.closeAriaLabel,type:"button",onClick:i[0]||(i[0]=v=>t.close(v))},s.closeButtonProps),[o("i",{class:c(["p-message-close-icon",s.closeIcon])},null,2)],16,K)),[[m]]):u("",!0)])],2),[[A,l.visible]])]),_:3})}function G(e,i){i===void 0&&(i={});var s=i.insertAt;if(!(!e||typeof document>"u")){var n=document.head||document.getElementsByTagName("head")[0],l=document.createElement("style");l.type="text/css",s==="top"&&n.firstChild?n.insertBefore(l,n.firstChild):n.appendChild(l),l.styleSheet?l.styleSheet.cssText=e:l.appendChild(document.createTextNode(e))}}var H=`
.p-message-wrapper {
    display: flex;
    align-items: center;
}
.p-message-close {
    display: flex;
    align-items: center;
    justify-content: center;
}
.p-message-close.p-link {
    margin-left: auto;
    overflow: hidden;
    position: relative;
}
.p-message-enter-from {
    opacity: 0;
}
.p-message-enter-active {
    transition: opacity 0.3s;
}
.p-message.p-message-leave-from {
    max-height: 1000px;
}
.p-message.p-message-leave-to {
    max-height: 0;
    opacity: 0;
    margin: 0 !important;
}
.p-message-leave-active {
    overflow: hidden;
    transition: max-height 0.3s cubic-bezier(0, 1, 0, 1), opacity 0.3s, margin 0.15s;
}
.p-message-leave-active .p-message-close {
    display: none;
}
`;G(H);T.render=q;var N={name:"ProgressBar",props:{value:{type:Number,default:null},mode:{type:String,default:"determinate"},showValue:{type:Boolean,default:!0}},computed:{containerClass(){return["p-progressbar p-component",{"p-progressbar-determinate":this.determinate,"p-progressbar-indeterminate":this.indeterminate}]},progressStyle(){return{width:this.value+"%",display:"flex"}},indeterminate(){return this.mode==="indeterminate"},determinate(){return this.mode==="determinate"}}};const Y=["aria-valuenow"],Z={key:0,class:"p-progressbar-label"},X={key:1,class:"p-progressbar-indeterminate-container"},J=o("div",{class:"p-progressbar-value p-progressbar-value-animate"},null,-1),Q=[J];function $(e,i,s,n,l,t){return r(),d("div",{role:"progressbar",class:c(t.containerClass),"aria-valuemin":"0","aria-valuenow":s.value,"aria-valuemax":"100"},[t.determinate?(r(),d("div",{key:0,class:"p-progressbar-value p-progressbar-value-animate",style:k(t.progressStyle)},[s.value!=null&&s.value!==0&&s.showValue?(r(),d("div",Z,[b(e.$slots,"default",{},()=>[F(h(s.value+"%"),1)])])):u("",!0)],4)):u("",!0),t.indeterminate?(r(),d("div",X,Q)):u("",!0)],10,Y)}function ee(e,i){i===void 0&&(i={});var s=i.insertAt;if(!(!e||typeof document>"u")){var n=document.head||document.getElementsByTagName("head")[0],l=document.createElement("style");l.type="text/css",s==="top"&&n.firstChild?n.insertBefore(l,n.firstChild):n.appendChild(l),l.styleSheet?l.styleSheet.cssText=e:l.appendChild(document.createTextNode(e))}}var te=`
.p-progressbar {
    position: relative;
    overflow: hidden;
}
.p-progressbar-determinate .p-progressbar-value {
    height: 100%;
    width: 0%;
    position: absolute;
    display: none;
    border: 0 none;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.p-progressbar-determinate .p-progressbar-label {
    display: inline-flex;
}
.p-progressbar-determinate .p-progressbar-value-animate {
    transition: width 1s ease-in-out;
}
.p-progressbar-indeterminate .p-progressbar-value::before {
    content: '';
    position: absolute;
    background-color: inherit;
    top: 0;
    left: 0;
    bottom: 0;
    will-change: left, right;
    -webkit-animation: p-progressbar-indeterminate-anim 2.1s cubic-bezier(0.65, 0.815, 0.735, 0.395) infinite;
    animation: p-progressbar-indeterminate-anim 2.1s cubic-bezier(0.65, 0.815, 0.735, 0.395) infinite;
}
.p-progressbar-indeterminate .p-progressbar-value::after {
    content: '';
    position: absolute;
    background-color: inherit;
    top: 0;
    left: 0;
    bottom: 0;
    will-change: left, right;
    -webkit-animation: p-progressbar-indeterminate-anim-short 2.1s cubic-bezier(0.165, 0.84, 0.44, 1) infinite;
    animation: p-progressbar-indeterminate-anim-short 2.1s cubic-bezier(0.165, 0.84, 0.44, 1) infinite;
    -webkit-animation-delay: 1.15s;
    animation-delay: 1.15s;
}
@-webkit-keyframes p-progressbar-indeterminate-anim {
0% {
        left: -35%;
        right: 100%;
}
60% {
        left: 100%;
        right: -90%;
}
100% {
        left: 100%;
        right: -90%;
}
}
@keyframes p-progressbar-indeterminate-anim {
0% {
        left: -35%;
        right: 100%;
}
60% {
        left: 100%;
        right: -90%;
}
100% {
        left: 100%;
        right: -90%;
}
}
@-webkit-keyframes p-progressbar-indeterminate-anim-short {
0% {
        left: -200%;
        right: 100%;
}
60% {
        left: 107%;
        right: -8%;
}
100% {
        left: 107%;
        right: -8%;
}
}
@keyframes p-progressbar-indeterminate-anim-short {
0% {
        left: -200%;
        right: 100%;
}
60% {
        left: 107%;
        right: -8%;
}
100% {
        left: 107%;
        right: -8%;
}
}
`;ee(te);N.render=$;var V={emits:["remove"],props:{files:{type:Array,default:()=>[]},badgeSeverity:{type:String,default:"warning"},badgeValue:{type:String,default:null},previewWidth:{type:Number,default:50}},methods:{formatSize(e){if(e===0)return"0 B";let i=1e3,s=3,n=["B","KB","MB","GB","TB","PB","EB","ZB","YB"],l=Math.floor(Math.log(e)/Math.log(i));return parseFloat((e/Math.pow(i,l)).toFixed(s))+" "+n[l]}},components:{FileUploadButton:_,FileUploadBadge:M}};const ie=["alt","src","width"],se={class:"p-fileupload-file-details"},le={class:"p-fileupload-file-name"},ae={class:"p-fileupload-file-size"},ne={class:"p-fileupload-file-actions"};function re(e,i,s,n,l,t){const m=g("FileUploadBadge"),v=g("FileUploadButton");return r(!0),d(L,null,x(s.files,(p,y)=>(r(),d("div",{key:p.name+p.type+p.size,class:"p-fileupload-file"},[o("img",{role:"presentation",class:"p-fileupload-file-thumbnail",alt:p.name,src:p.objectURL,width:s.previewWidth},null,8,ie),o("div",se,[o("div",le,h(p.name),1),o("span",ae,h(t.formatSize(p.size)),1),I(m,{value:s.badgeValue,class:"p-fileupload-file-badge",severity:s.badgeSeverity},null,8,["value","severity"])]),o("div",ne,[I(v,{icon:"pi pi-times",onClick:B=>e.$emit("remove",y),class:"p-fileupload-file-remove p-button-text p-button-danger p-button-rounded"},null,8,["onClick"])])]))),128)}V.render=re;var oe={name:"FileUpload",emits:["select","uploader","before-upload","progress","upload","error","before-send","clear","remove","remove-uploaded-file"],props:{name:{type:String,default:null},url:{type:String,default:null},mode:{type:String,default:"advanced"},multiple:{type:Boolean,default:!1},accept:{type:String,default:null},disabled:{type:Boolean,default:!1},auto:{type:Boolean,default:!1},maxFileSize:{type:Number,default:null},invalidFileSizeMessage:{type:String,default:"{0}: Invalid file size, file size should be smaller than {1}."},invalidFileTypeMessage:{type:String,default:"{0}: Invalid file type, allowed file types: {1}."},fileLimit:{type:Number,default:null},invalidFileLimitMessage:{type:String,default:"Maximum number of files exceeded, limit is {0} at most."},withCredentials:{type:Boolean,default:!1},previewWidth:{type:Number,default:50},chooseLabel:{type:String,default:null},uploadLabel:{type:String,default:null},cancelLabel:{type:String,default:null},customUpload:{type:Boolean,default:!1},showUploadButton:{type:Boolean,default:!0},showCancelButton:{type:Boolean,default:!0},chooseIcon:{type:String,default:"pi pi-plus"},uploadIcon:{type:String,default:"pi pi-upload"},cancelIcon:{type:String,default:"pi pi-times"},style:null,class:null},duplicateIEEvent:!1,data(){return{uploadedFileCount:0,files:[],messages:[],focused:!1,progress:null,uploadedFiles:[]}},methods:{onFileSelect(e){if(e.type!=="drop"&&this.isIE11()&&this.duplicateIEEvent){this.duplicateIEEvent=!1;return}this.messages=[],this.files=this.files||[];let i=e.dataTransfer?e.dataTransfer.files:e.target.files;for(let s of i)this.isFileSelected(s)||this.validate(s)&&(this.isImage(s)&&(s.objectURL=window.URL.createObjectURL(s)),this.files.push(s));this.$emit("select",{originalEvent:e,files:this.files}),this.fileLimit&&this.checkFileLimit(),this.auto&&this.hasFiles&&!this.isFileLimitExceeded()&&this.upload(),e.type!=="drop"&&this.isIE11()?this.clearIEInput():this.clearInputElement()},choose(){this.$refs.fileInput.click()},upload(){if(this.customUpload)this.fileLimit&&(this.uploadedFileCount+=this.files.length),this.$emit("uploader",{files:this.files}),this.clear();else{let e=new XMLHttpRequest,i=new FormData;this.$emit("before-upload",{xhr:e,formData:i});for(let s of this.files)i.append(this.name,s,s.name);e.upload.addEventListener("progress",s=>{s.lengthComputable&&(this.progress=Math.round(s.loaded*100/s.total)),this.$emit("progress",{originalEvent:s,progress:this.progress})}),e.onreadystatechange=()=>{e.readyState===4&&(this.progress=0,e.status>=200&&e.status<300?(this.fileLimit&&(this.uploadedFileCount+=this.files.length),this.$emit("upload",{xhr:e,files:this.files})):this.$emit("error",{xhr:e,files:this.files}),this.uploadedFiles.push(...this.files),this.clear())},e.open("POST",this.url,!0),this.$emit("before-send",{xhr:e,formData:i}),e.withCredentials=this.withCredentials,e.send(i)}},clear(){this.files=[],this.messages=null,this.$emit("clear"),this.isAdvanced&&this.clearInputElement()},onFocus(){this.focused=!0},onBlur(){this.focused=!1},isFileSelected(e){if(this.files&&this.files.length){for(let i of this.files)if(i.name+i.type+i.size===e.name+e.type+e.size)return!0}return!1},isIE11(){return!!window.MSInputMethodContext&&!!document.documentMode},validate(e){return this.accept&&!this.isFileTypeValid(e)?(this.messages.push(this.invalidFileTypeMessage.replace("{0}",e.name).replace("{1}",this.accept)),!1):this.maxFileSize&&e.size>this.maxFileSize?(this.messages.push(this.invalidFileSizeMessage.replace("{0}",e.name).replace("{1}",this.formatSize(this.maxFileSize))),!1):!0},isFileTypeValid(e){let i=this.accept.split(",").map(s=>s.trim());for(let s of i)if(this.isWildcard(s)?this.getTypeClass(e.type)===this.getTypeClass(s):e.type==s||this.getFileExtension(e).toLowerCase()===s.toLowerCase())return!0;return!1},getTypeClass(e){return e.substring(0,e.indexOf("/"))},isWildcard(e){return e.indexOf("*")!==-1},getFileExtension(e){return"."+e.name.split(".").pop()},isImage(e){return/^image\//.test(e.type)},onDragEnter(e){this.disabled||(e.stopPropagation(),e.preventDefault())},onDragOver(e){this.disabled||(w.addClass(this.$refs.content,"p-fileupload-highlight"),e.stopPropagation(),e.preventDefault())},onDragLeave(){this.disabled||w.removeClass(this.$refs.content,"p-fileupload-highlight")},onDrop(e){if(!this.disabled){w.removeClass(this.$refs.content,"p-fileupload-highlight"),e.stopPropagation(),e.preventDefault();const i=e.dataTransfer?e.dataTransfer.files:e.target.files;(this.multiple||i&&i.length===1)&&this.onFileSelect(e)}},onBasicUploaderClick(){this.hasFiles?this.upload():this.$refs.fileInput.click()},remove(e){this.clearInputElement();let i=this.files.splice(e,1)[0];this.files=[...this.files],this.$emit("remove",{file:i,files:this.files})},removeUploadedFile(e){let i=this.uploadedFiles.splice(e,1)[0];this.uploadedFiles=[...this.uploadedFiles],this.$emit("remove-uploaded-file",{file:i,files:this.uploadedFiles})},clearInputElement(){this.$refs.fileInput.value=""},clearIEInput(){this.$refs.fileInput&&(this.duplicateIEEvent=!0,this.$refs.fileInput.value="")},formatSize(e){if(e===0)return"0 B";let i=1e3,s=3,n=["B","KB","MB","GB","TB","PB","EB","ZB","YB"],l=Math.floor(Math.log(e)/Math.log(i));return parseFloat((e/Math.pow(i,l)).toFixed(s))+" "+n[l]},isFileLimitExceeded(){return this.fileLimit&&this.fileLimit<=this.files.length+this.uploadedFileCount&&this.focused&&(this.focused=!1),this.fileLimit&&this.fileLimit<this.files.length+this.uploadedFileCount},checkFileLimit(){this.isFileLimitExceeded()&&this.messages.push(this.invalidFileLimitMessage.replace("{0}",this.fileLimit.toString()))},onMessageClose(){this.messages=null}},computed:{isAdvanced(){return this.mode==="advanced"},isBasic(){return this.mode==="basic"},advancedChooseButtonClass(){return["p-button p-component p-fileupload-choose",this.class,{"p-disabled":this.disabled,"p-focus":this.focused}]},basicChooseButtonClass(){return["p-button p-component p-fileupload-choose",this.class,{"p-fileupload-choose-selected":this.hasFiles,"p-disabled":this.disabled,"p-focus":this.focused}]},advancedChooseIconClass(){return["p-button-icon p-button-icon-left pi-fw",this.chooseIcon]},basicChooseButtonIconClass(){return["p-button-icon p-button-icon-left",!this.hasFiles||this.auto?this.uploadIcon:this.chooseIcon]},basicChooseButtonLabel(){return this.auto?this.chooseButtonLabel:this.hasFiles?this.files.map(e=>e.name).join(", "):this.chooseButtonLabel},hasFiles(){return this.files&&this.files.length>0},hasUploadedFiles(){return this.uploadedFiles&&this.uploadedFiles.length>0},chooseDisabled(){return this.disabled||this.fileLimit&&this.fileLimit<=this.files.length+this.uploadedFileCount},uploadDisabled(){return this.disabled||!this.hasFiles||this.fileLimit&&this.fileLimit<this.files.length},cancelDisabled(){return this.disabled||!this.hasFiles},chooseButtonLabel(){return this.chooseLabel||this.$primevue.config.locale.choose},uploadButtonLabel(){return this.uploadLabel||this.$primevue.config.locale.upload},cancelButtonLabel(){return this.cancelLabel||this.$primevue.config.locale.cancel},completedLabel(){return this.$primevue.config.locale.completed},pendingLabel(){return this.$primevue.config.locale.pending}},components:{FileUploadButton:_,FileUploadProgressBar:N,FileUploadMessage:T,FileContent:V},directives:{ripple:z}};const de={key:0,class:"p-fileupload p-fileupload-advanced p-component"},ue=["multiple","accept","disabled"],pe={class:"p-fileupload-buttonbar"},ce={class:"p-button-label"},he={key:0,class:"p-fileupload-empty"},fe={key:1,class:"p-fileupload p-fileupload-basic p-component"},me={class:"p-button-label"},ge=["accept","disabled","multiple"];function be(e,i,s,n,l,t){const m=g("FileUploadButton"),v=g("FileUploadProgressBar"),p=g("FileUploadMessage"),y=g("FileContent"),B=U("ripple");return t.isAdvanced?(r(),d("div",de,[o("input",{ref:"fileInput",type:"file",onChange:i[0]||(i[0]=(...a)=>t.onFileSelect&&t.onFileSelect(...a)),multiple:s.multiple,accept:s.accept,disabled:t.chooseDisabled},null,40,ue),o("div",pe,[b(e.$slots,"header",{files:l.files,uploadedFiles:l.uploadedFiles,chooseCallback:t.choose,uploadCallback:t.upload,clearCallback:t.clear},()=>[C((r(),d("span",{class:c(t.advancedChooseButtonClass),style:k(s.style),onClick:i[1]||(i[1]=(...a)=>t.choose&&t.choose(...a)),onKeydown:i[2]||(i[2]=D((...a)=>t.choose&&t.choose(...a),["enter"])),onFocus:i[3]||(i[3]=(...a)=>t.onFocus&&t.onFocus(...a)),onBlur:i[4]||(i[4]=(...a)=>t.onBlur&&t.onBlur(...a)),tabindex:"0"},[o("span",{class:c(t.advancedChooseIconClass)},null,2),o("span",ce,h(t.chooseButtonLabel),1)],38)),[[B]]),s.showUploadButton?(r(),f(m,{key:0,label:t.uploadButtonLabel,icon:s.uploadIcon,onClick:t.upload,disabled:t.uploadDisabled},null,8,["label","icon","onClick","disabled"])):u("",!0),s.showCancelButton?(r(),f(m,{key:1,label:t.cancelButtonLabel,icon:s.cancelIcon,onClick:t.clear,disabled:t.cancelDisabled},null,8,["label","icon","onClick","disabled"])):u("",!0)])]),o("div",{ref:"content",class:"p-fileupload-content",onDragenter:i[5]||(i[5]=(...a)=>t.onDragEnter&&t.onDragEnter(...a)),onDragover:i[6]||(i[6]=(...a)=>t.onDragOver&&t.onDragOver(...a)),onDragleave:i[7]||(i[7]=(...a)=>t.onDragLeave&&t.onDragLeave(...a)),onDrop:i[8]||(i[8]=(...a)=>t.onDrop&&t.onDrop(...a))},[b(e.$slots,"content",{files:l.files,uploadedFiles:l.uploadedFiles,removeUploadedFileCallback:t.removeUploadedFile,removeFileCallback:t.remove,progress:l.progress,messages:l.messages},()=>[t.hasFiles?(r(),f(v,{key:0,value:l.progress,showValue:!1},null,8,["value"])):u("",!0),(r(!0),d(L,null,x(l.messages,a=>(r(),f(p,{key:a,severity:"error",onClose:t.onMessageClose},{default:S(()=>[F(h(a),1)]),_:2},1032,["onClose"]))),128)),t.hasFiles?(r(),f(y,{key:1,files:l.files,onRemove:t.remove,badgeValue:t.pendingLabel,previewWidth:s.previewWidth},null,8,["files","onRemove","badgeValue","previewWidth"])):u("",!0),I(y,{files:l.uploadedFiles,onRemove:t.removeUploadedFile,badgeValue:t.completedLabel,badgeSeverity:"success",previewWidth:s.previewWidth},null,8,["files","onRemove","badgeValue","previewWidth"])]),e.$slots.empty&&!t.hasFiles&&!t.hasUploadedFiles?(r(),d("div",he,[b(e.$slots,"empty")])):u("",!0)],544)])):t.isBasic?(r(),d("div",fe,[(r(!0),d(L,null,x(l.messages,a=>(r(),f(p,{key:a,severity:"error",onClose:t.onMessageClose},{default:S(()=>[F(h(a),1)]),_:2},1032,["onClose"]))),128)),C((r(),d("span",{class:c(t.basicChooseButtonClass),style:k(s.style),onMouseup:i[12]||(i[12]=(...a)=>t.onBasicUploaderClick&&t.onBasicUploaderClick(...a)),onKeydown:i[13]||(i[13]=D((...a)=>t.choose&&t.choose(...a),["enter"])),onFocus:i[14]||(i[14]=(...a)=>t.onFocus&&t.onFocus(...a)),onBlur:i[15]||(i[15]=(...a)=>t.onBlur&&t.onBlur(...a)),tabindex:"0"},[o("span",{class:c(t.basicChooseButtonIconClass)},null,2),o("span",me,h(t.basicChooseButtonLabel),1),t.hasFiles?u("",!0):(r(),d("input",{key:0,ref:"fileInput",type:"file",accept:s.accept,disabled:s.disabled,multiple:s.multiple,onChange:i[9]||(i[9]=(...a)=>t.onFileSelect&&t.onFileSelect(...a)),onFocus:i[10]||(i[10]=(...a)=>t.onFocus&&t.onFocus(...a)),onBlur:i[11]||(i[11]=(...a)=>t.onBlur&&t.onBlur(...a))},null,40,ge))],38)),[[B]])])):u("",!0)}function ve(e,i){i===void 0&&(i={});var s=i.insertAt;if(!(!e||typeof document>"u")){var n=document.head||document.getElementsByTagName("head")[0],l=document.createElement("style");l.type="text/css",s==="top"&&n.firstChild?n.insertBefore(l,n.firstChild):n.appendChild(l),l.styleSheet?l.styleSheet.cssText=e:l.appendChild(document.createTextNode(e))}}var ye=`
.p-fileupload-content {
    position: relative;
}
.p-fileupload-content .p-progressbar {
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
}
.p-button.p-fileupload-choose {
    position: relative;
    overflow: hidden;
}
.p-fileupload-buttonbar {
    display: flex;
    flex-wrap: wrap;
}
.p-fileupload > input[type='file'],
.p-fileupload-basic input[type='file'] {
    display: none;
}
.p-fluid .p-fileupload .p-button {
    width: auto;
}
.p-fileupload-file {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}
.p-fileupload-file-thumbnail {
    flex-shrink: 0;
}
.p-fileupload-file-actions {
    margin-left: auto;
}
`;ve(ye);oe.render=be;export{oe as a,T as b,N as c,M as s};
