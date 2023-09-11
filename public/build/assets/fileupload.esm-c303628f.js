import{R as E,o,b as c,w as L,k as F,v as _,d as r,n as h,r as y,c as d,m as N,a as p,T as V,j as U,D as C,x as M,f as w,F as S,p as k,y as I,t as m,g,h as x,l as D}from"./inputnumber.esm-5d69a21b.js";import{s as P}from"./progressbar.esm-48fccd8a.js";import{s as R}from"./badge.esm-39fab85a.js";var z={name:"Message",emits:["close"],props:{severity:{type:String,default:"info"},closable:{type:Boolean,default:!0},sticky:{type:Boolean,default:!0},life:{type:Number,default:3e3},icon:{type:String,default:null},closeIcon:{type:String,default:"pi pi-times"},closeButtonProps:{type:null,default:null}},timeout:null,data(){return{visible:!0}},mounted(){this.sticky||this.x()},methods:{close(e){this.visible=!1,this.$emit("close",e)},x(){setTimeout(()=>{this.visible=!1},this.life)}},computed:{containerClass(){return"p-message p-component p-message-"+this.severity},iconClass(){return["p-message-icon pi",this.icon?this.icon:{"pi-info-circle":this.severity==="info","pi-check":this.severity==="success","pi-exclamation-triangle":this.severity==="warn","pi-times-circle":this.severity==="error"}]},closeAriaLabel(){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria.close:void 0}},directives:{ripple:E}};const W={class:"p-message-wrapper"},A={class:"p-message-text"},j=["aria-label"];function O(e,l,i,n,a,t){const f=U("ripple");return o(),c(V,{name:"p-message",appear:""},{default:L(()=>[F(r("div",{class:h(t.containerClass),role:"alert","aria-live":"assertive","aria-atomic":"true"},[r("div",W,[r("span",{class:h(t.iconClass)},null,2),r("div",A,[y(e.$slots,"default")]),i.closable?F((o(),d("button",N({key:0,class:"p-message-close p-link","aria-label":t.closeAriaLabel,type:"button",onClick:l[0]||(l[0]=v=>t.close(v))},i.closeButtonProps),[r("i",{class:h(["p-message-close-icon",i.closeIcon])},null,2)],16,j)),[[f]]):p("",!0)])],2),[[_,a.visible]])]),_:3})}function K(e,l){l===void 0&&(l={});var i=l.insertAt;if(!(!e||typeof document>"u")){var n=document.head||document.getElementsByTagName("head")[0],a=document.createElement("style");a.type="text/css",i==="top"&&n.firstChild?n.insertBefore(a,n.firstChild):n.appendChild(a),a.styleSheet?a.styleSheet.cssText=e:a.appendChild(document.createTextNode(e))}}var G=`
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
`;K(G);z.render=O;var T={emits:["remove"],props:{files:{type:Array,default:()=>[]},badgeSeverity:{type:String,default:"warning"},badgeValue:{type:String,default:null},previewWidth:{type:Number,default:50}},methods:{formatSize(e){if(e===0)return"0 B";let l=1e3,i=3,n=["B","KB","MB","GB","TB","PB","EB","ZB","YB"],a=Math.floor(Math.log(e)/Math.log(l));return parseFloat((e/Math.pow(l,a)).toFixed(i))+" "+n[a]}},components:{FileUploadButton:M,FileUploadBadge:R}};const H=["alt","src","width"],Y={class:"p-fileupload-file-details"},Z={class:"p-fileupload-file-name"},q={class:"p-fileupload-file-size"},X={class:"p-fileupload-file-actions"};function J(e,l,i,n,a,t){const f=g("FileUploadBadge"),v=g("FileUploadButton");return o(!0),d(S,null,w(i.files,(u,b)=>(o(),d("div",{key:u.name+u.type+u.size,class:"p-fileupload-file"},[r("img",{role:"presentation",class:"p-fileupload-file-thumbnail",alt:u.name,src:u.objectURL,width:i.previewWidth},null,8,H),r("div",Y,[r("div",Z,m(u.name),1),r("span",q,m(t.formatSize(u.size)),1),x(f,{value:i.badgeValue,class:"p-fileupload-file-badge",severity:i.badgeSeverity},null,8,["value","severity"])]),r("div",X,[x(v,{icon:"pi pi-times",onClick:B=>e.$emit("remove",b),class:"p-fileupload-file-remove p-button-text p-button-danger p-button-rounded"},null,8,["onClick"])])]))),128)}T.render=J;var Q={name:"FileUpload",emits:["select","uploader","before-upload","progress","upload","error","before-send","clear","remove","remove-uploaded-file"],props:{name:{type:String,default:null},url:{type:String,default:null},mode:{type:String,default:"advanced"},multiple:{type:Boolean,default:!1},accept:{type:String,default:null},disabled:{type:Boolean,default:!1},auto:{type:Boolean,default:!1},maxFileSize:{type:Number,default:null},invalidFileSizeMessage:{type:String,default:"{0}: Invalid file size, file size should be smaller than {1}."},invalidFileTypeMessage:{type:String,default:"{0}: Invalid file type, allowed file types: {1}."},fileLimit:{type:Number,default:null},invalidFileLimitMessage:{type:String,default:"Maximum number of files exceeded, limit is {0} at most."},withCredentials:{type:Boolean,default:!1},previewWidth:{type:Number,default:50},chooseLabel:{type:String,default:null},uploadLabel:{type:String,default:null},cancelLabel:{type:String,default:null},customUpload:{type:Boolean,default:!1},showUploadButton:{type:Boolean,default:!0},showCancelButton:{type:Boolean,default:!0},chooseIcon:{type:String,default:"pi pi-plus"},uploadIcon:{type:String,default:"pi pi-upload"},cancelIcon:{type:String,default:"pi pi-times"},style:null,class:null},duplicateIEEvent:!1,data(){return{uploadedFileCount:0,files:[],messages:[],focused:!1,progress:null,uploadedFiles:[]}},methods:{onFileSelect(e){if(e.type!=="drop"&&this.isIE11()&&this.duplicateIEEvent){this.duplicateIEEvent=!1;return}this.messages=[],this.files=this.files||[];let l=e.dataTransfer?e.dataTransfer.files:e.target.files;for(let i of l)this.isFileSelected(i)||this.validate(i)&&(this.isImage(i)&&(i.objectURL=window.URL.createObjectURL(i)),this.files.push(i));this.$emit("select",{originalEvent:e,files:this.files}),this.fileLimit&&this.checkFileLimit(),this.auto&&this.hasFiles&&!this.isFileLimitExceeded()&&this.upload(),e.type!=="drop"&&this.isIE11()?this.clearIEInput():this.clearInputElement()},choose(){this.$refs.fileInput.click()},upload(){if(this.customUpload)this.fileLimit&&(this.uploadedFileCount+=this.files.length),this.$emit("uploader",{files:this.files}),this.clear();else{let e=new XMLHttpRequest,l=new FormData;this.$emit("before-upload",{xhr:e,formData:l});for(let i of this.files)l.append(this.name,i,i.name);e.upload.addEventListener("progress",i=>{i.lengthComputable&&(this.progress=Math.round(i.loaded*100/i.total)),this.$emit("progress",{originalEvent:i,progress:this.progress})}),e.onreadystatechange=()=>{e.readyState===4&&(this.progress=0,e.status>=200&&e.status<300?(this.fileLimit&&(this.uploadedFileCount+=this.files.length),this.$emit("upload",{xhr:e,files:this.files})):this.$emit("error",{xhr:e,files:this.files}),this.uploadedFiles.push(...this.files),this.clear())},e.open("POST",this.url,!0),this.$emit("before-send",{xhr:e,formData:l}),e.withCredentials=this.withCredentials,e.send(l)}},clear(){this.files=[],this.messages=null,this.$emit("clear"),this.isAdvanced&&this.clearInputElement()},onFocus(){this.focused=!0},onBlur(){this.focused=!1},isFileSelected(e){if(this.files&&this.files.length){for(let l of this.files)if(l.name+l.type+l.size===e.name+e.type+e.size)return!0}return!1},isIE11(){return!!window.MSInputMethodContext&&!!document.documentMode},validate(e){return this.accept&&!this.isFileTypeValid(e)?(this.messages.push(this.invalidFileTypeMessage.replace("{0}",e.name).replace("{1}",this.accept)),!1):this.maxFileSize&&e.size>this.maxFileSize?(this.messages.push(this.invalidFileSizeMessage.replace("{0}",e.name).replace("{1}",this.formatSize(this.maxFileSize))),!1):!0},isFileTypeValid(e){let l=this.accept.split(",").map(i=>i.trim());for(let i of l)if(this.isWildcard(i)?this.getTypeClass(e.type)===this.getTypeClass(i):e.type==i||this.getFileExtension(e).toLowerCase()===i.toLowerCase())return!0;return!1},getTypeClass(e){return e.substring(0,e.indexOf("/"))},isWildcard(e){return e.indexOf("*")!==-1},getFileExtension(e){return"."+e.name.split(".").pop()},isImage(e){return/^image\//.test(e.type)},onDragEnter(e){this.disabled||(e.stopPropagation(),e.preventDefault())},onDragOver(e){this.disabled||(C.addClass(this.$refs.content,"p-fileupload-highlight"),e.stopPropagation(),e.preventDefault())},onDragLeave(){this.disabled||C.removeClass(this.$refs.content,"p-fileupload-highlight")},onDrop(e){if(!this.disabled){C.removeClass(this.$refs.content,"p-fileupload-highlight"),e.stopPropagation(),e.preventDefault();const l=e.dataTransfer?e.dataTransfer.files:e.target.files;(this.multiple||l&&l.length===1)&&this.onFileSelect(e)}},onBasicUploaderClick(){this.hasFiles?this.upload():this.$refs.fileInput.click()},remove(e){this.clearInputElement();let l=this.files.splice(e,1)[0];this.files=[...this.files],this.$emit("remove",{file:l,files:this.files})},removeUploadedFile(e){let l=this.uploadedFiles.splice(e,1)[0];this.uploadedFiles=[...this.uploadedFiles],this.$emit("remove-uploaded-file",{file:l,files:this.uploadedFiles})},clearInputElement(){this.$refs.fileInput.value=""},clearIEInput(){this.$refs.fileInput&&(this.duplicateIEEvent=!0,this.$refs.fileInput.value="")},formatSize(e){if(e===0)return"0 B";let l=1e3,i=3,n=["B","KB","MB","GB","TB","PB","EB","ZB","YB"],a=Math.floor(Math.log(e)/Math.log(l));return parseFloat((e/Math.pow(l,a)).toFixed(i))+" "+n[a]},isFileLimitExceeded(){return this.fileLimit&&this.fileLimit<=this.files.length+this.uploadedFileCount&&this.focused&&(this.focused=!1),this.fileLimit&&this.fileLimit<this.files.length+this.uploadedFileCount},checkFileLimit(){this.isFileLimitExceeded()&&this.messages.push(this.invalidFileLimitMessage.replace("{0}",this.fileLimit.toString()))},onMessageClose(){this.messages=null}},computed:{isAdvanced(){return this.mode==="advanced"},isBasic(){return this.mode==="basic"},advancedChooseButtonClass(){return["p-button p-component p-fileupload-choose",this.class,{"p-disabled":this.disabled,"p-focus":this.focused}]},basicChooseButtonClass(){return["p-button p-component p-fileupload-choose",this.class,{"p-fileupload-choose-selected":this.hasFiles,"p-disabled":this.disabled,"p-focus":this.focused}]},advancedChooseIconClass(){return["p-button-icon p-button-icon-left pi-fw",this.chooseIcon]},basicChooseButtonIconClass(){return["p-button-icon p-button-icon-left",!this.hasFiles||this.auto?this.uploadIcon:this.chooseIcon]},basicChooseButtonLabel(){return this.auto?this.chooseButtonLabel:this.hasFiles?this.files.map(e=>e.name).join(", "):this.chooseButtonLabel},hasFiles(){return this.files&&this.files.length>0},hasUploadedFiles(){return this.uploadedFiles&&this.uploadedFiles.length>0},chooseDisabled(){return this.disabled||this.fileLimit&&this.fileLimit<=this.files.length+this.uploadedFileCount},uploadDisabled(){return this.disabled||!this.hasFiles||this.fileLimit&&this.fileLimit<this.files.length},cancelDisabled(){return this.disabled||!this.hasFiles},chooseButtonLabel(){return this.chooseLabel||this.$primevue.config.locale.choose},uploadButtonLabel(){return this.uploadLabel||this.$primevue.config.locale.upload},cancelButtonLabel(){return this.cancelLabel||this.$primevue.config.locale.cancel},completedLabel(){return this.$primevue.config.locale.completed},pendingLabel(){return this.$primevue.config.locale.pending}},components:{FileUploadButton:M,FileUploadProgressBar:P,FileUploadMessage:z,FileContent:T},directives:{ripple:E}};const $={key:0,class:"p-fileupload p-fileupload-advanced p-component"},ee=["multiple","accept","disabled"],le={class:"p-fileupload-buttonbar"},te={class:"p-button-label"},ie={key:0,class:"p-fileupload-empty"},se={key:1,class:"p-fileupload p-fileupload-basic p-component"},ae={class:"p-button-label"},ne=["accept","disabled","multiple"];function oe(e,l,i,n,a,t){const f=g("FileUploadButton"),v=g("FileUploadProgressBar"),u=g("FileUploadMessage"),b=g("FileContent"),B=U("ripple");return t.isAdvanced?(o(),d("div",$,[r("input",{ref:"fileInput",type:"file",onChange:l[0]||(l[0]=(...s)=>t.onFileSelect&&t.onFileSelect(...s)),multiple:i.multiple,accept:i.accept,disabled:t.chooseDisabled},null,40,ee),r("div",le,[y(e.$slots,"header",{files:a.files,uploadedFiles:a.uploadedFiles,chooseCallback:t.choose,uploadCallback:t.upload,clearCallback:t.clear},()=>[F((o(),d("span",{class:h(t.advancedChooseButtonClass),style:k(i.style),onClick:l[1]||(l[1]=(...s)=>t.choose&&t.choose(...s)),onKeydown:l[2]||(l[2]=I((...s)=>t.choose&&t.choose(...s),["enter"])),onFocus:l[3]||(l[3]=(...s)=>t.onFocus&&t.onFocus(...s)),onBlur:l[4]||(l[4]=(...s)=>t.onBlur&&t.onBlur(...s)),tabindex:"0"},[r("span",{class:h(t.advancedChooseIconClass)},null,2),r("span",te,m(t.chooseButtonLabel),1)],38)),[[B]]),i.showUploadButton?(o(),c(f,{key:0,label:t.uploadButtonLabel,icon:i.uploadIcon,onClick:t.upload,disabled:t.uploadDisabled},null,8,["label","icon","onClick","disabled"])):p("",!0),i.showCancelButton?(o(),c(f,{key:1,label:t.cancelButtonLabel,icon:i.cancelIcon,onClick:t.clear,disabled:t.cancelDisabled},null,8,["label","icon","onClick","disabled"])):p("",!0)])]),r("div",{ref:"content",class:"p-fileupload-content",onDragenter:l[5]||(l[5]=(...s)=>t.onDragEnter&&t.onDragEnter(...s)),onDragover:l[6]||(l[6]=(...s)=>t.onDragOver&&t.onDragOver(...s)),onDragleave:l[7]||(l[7]=(...s)=>t.onDragLeave&&t.onDragLeave(...s)),onDrop:l[8]||(l[8]=(...s)=>t.onDrop&&t.onDrop(...s))},[y(e.$slots,"content",{files:a.files,uploadedFiles:a.uploadedFiles,removeUploadedFileCallback:t.removeUploadedFile,removeFileCallback:t.remove,progress:a.progress,messages:a.messages},()=>[t.hasFiles?(o(),c(v,{key:0,value:a.progress,showValue:!1},null,8,["value"])):p("",!0),(o(!0),d(S,null,w(a.messages,s=>(o(),c(u,{key:s,severity:"error",onClose:t.onMessageClose},{default:L(()=>[D(m(s),1)]),_:2},1032,["onClose"]))),128)),t.hasFiles?(o(),c(b,{key:1,files:a.files,onRemove:t.remove,badgeValue:t.pendingLabel,previewWidth:i.previewWidth},null,8,["files","onRemove","badgeValue","previewWidth"])):p("",!0),x(b,{files:a.uploadedFiles,onRemove:t.removeUploadedFile,badgeValue:t.completedLabel,badgeSeverity:"success",previewWidth:i.previewWidth},null,8,["files","onRemove","badgeValue","previewWidth"])]),e.$slots.empty&&!t.hasFiles&&!t.hasUploadedFiles?(o(),d("div",ie,[y(e.$slots,"empty")])):p("",!0)],544)])):t.isBasic?(o(),d("div",se,[(o(!0),d(S,null,w(a.messages,s=>(o(),c(u,{key:s,severity:"error",onClose:t.onMessageClose},{default:L(()=>[D(m(s),1)]),_:2},1032,["onClose"]))),128)),F((o(),d("span",{class:h(t.basicChooseButtonClass),style:k(i.style),onMouseup:l[12]||(l[12]=(...s)=>t.onBasicUploaderClick&&t.onBasicUploaderClick(...s)),onKeydown:l[13]||(l[13]=I((...s)=>t.choose&&t.choose(...s),["enter"])),onFocus:l[14]||(l[14]=(...s)=>t.onFocus&&t.onFocus(...s)),onBlur:l[15]||(l[15]=(...s)=>t.onBlur&&t.onBlur(...s)),tabindex:"0"},[r("span",{class:h(t.basicChooseButtonIconClass)},null,2),r("span",ae,m(t.basicChooseButtonLabel),1),t.hasFiles?p("",!0):(o(),d("input",{key:0,ref:"fileInput",type:"file",accept:i.accept,disabled:i.disabled,multiple:i.multiple,onChange:l[9]||(l[9]=(...s)=>t.onFileSelect&&t.onFileSelect(...s)),onFocus:l[10]||(l[10]=(...s)=>t.onFocus&&t.onFocus(...s)),onBlur:l[11]||(l[11]=(...s)=>t.onBlur&&t.onBlur(...s))},null,40,ne))],38)),[[B]])])):p("",!0)}function re(e,l){l===void 0&&(l={});var i=l.insertAt;if(!(!e||typeof document>"u")){var n=document.head||document.getElementsByTagName("head")[0],a=document.createElement("style");a.type="text/css",i==="top"&&n.firstChild?n.insertBefore(a,n.firstChild):n.appendChild(a),a.styleSheet?a.styleSheet.cssText=e:a.appendChild(document.createTextNode(e))}}var de=`
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
`;re(de);Q.render=oe;export{z as a,Q as s};
