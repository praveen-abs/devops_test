import{a4 as g,S as h,a5 as b,c as y,h as s,e,w as n,F as q,g as p,o as D,af as x,ag as T,a6 as w,E as S,q as F,P,G as E}from"./index-2ae128bc.js";import{s as U,a as V}from"./tabpanel.esm-556cc96c.js";import{a as C}from"./fileupload.esm-83027dd1.js";import{s as M}from"./toast.esm-d6ebe423.js";import{D as A}from"./dialogservice.esm-bc6edf52.js";import{_ as B}from"./_plugin-vue_export-helper-c27b6911.js";const i=l=>(x("data-v-f0b957c1"),l=l(),T(),l),I={class:""},N=i(()=>e("h6",null,"Employee Documents",-1)),$=i(()=>e("span",null,"Personal Documents",-1)),k={style:{display:"flex"}},O=i(()=>e("span",{class:"label",style:{"line-height":"35px"}},[e("strong",null,"Aadhar Card Front")],-1)),j={class:"AadharCardFront",style:{display:"flex",gap:"30px"}},z=i(()=>e("span",null,"Official Documents",-1)),G=i(()=>e("p",null,"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Consectetur, adipisci velit, sed quia non numquam eius modi.",-1)),J={__name:"EmployeeDocumentsManager",setup(l){const m=g(),c=h("");b(()=>{});function d(r){if(c.value=r.target.files[0],console.log(c.value),!c.value)m.add({severity:"warn",summary:"Warn Message",detail:"Required",life:3e3});else{const o=new formData;o.append("file",c.value),w.post("/profile-page/uploadEmployeeDocs",o).then(t=>{console.log(t)}).catch(t=>{console.log(t.toJSON())})}}return(r,o)=>{const t=p("Toast"),_=p("FileUpload"),u=p("TabPanel"),f=p("TabView");return D(),y(q,null,[s(t),e("div",I,[N,s(f,{class:"tabview-custom",ref:"tabview4"},{default:n(()=>[s(u,null,{header:n(()=>[$]),default:n(()=>[e("div",k,[O,e("div",j,[s(_,{class:"testing",name:"PersonalDocument",mode:"advanced",customUpload:!0,onUploader:o[0]||(o[0]=v=>d(v)),accept:"image/*",maxFileSize:1e6})])])]),_:1}),s(u,null,{header:n(()=>[z]),default:n(()=>[G]),_:1})]),_:1},512)])],64)}}},R=B(J,[["__scopeId","data-v-f0b957c1"]]),a=S(R);a.component("TabView",U);a.component("TabPanel",V);a.component("FileUpload",C);a.component("Button",F);a.component("Toast",M);a.use(P,{ripple:!0});a.use(A);a.use(E);a.mount("#vjs_employeeDocsManager");
