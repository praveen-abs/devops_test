import{X as x,G as h,Y as D,H as w,a as f,b as P,g as e,l as n,j as i,w as m,i as u,o as T,q as $,k as d,B as c,I as C,R,v as N,P as k,J as F}from"./toastservice.esm-00869179.js";import{T as L,B,S as V,b as S,a as I,c as U}from"./styleclass.esm-7a6b1127.js";import{F as M,b as q,s as G,a as j}from"./inputtext.esm-2f6a5e2d.js";import{s as z}from"./confirmdialog.esm-f4112131.js";import{s as A}from"./toast.esm-a9461f00.js";import{s as E}from"./progressspinner.esm-c6e45385.js";import{s as H}from"./row.esm-6ebc942e.js";import{s as J}from"./columngroup.esm-9dd1458e.js";import"./fileupload.esm-6916e3b6.js";import{s as K}from"./calendar.esm-0d078b66.js";import{s as O}from"./textarea.esm-e16f0346.js";import{s as X}from"./chips.esm-2823a625.js";import{D as Y}from"./dialogservice.esm-baf8c35b.js";const Q={class:"card mb-2"},W={class:"card-body"},Z={class:""},ee=e("i",{class:"ri-pencil-fill"},null,-1),te=[ee],oe={class:"space-between"},ae={class:"input_text flex-col"},se=e("span",null,[n("Name "),e("span",{class:"text-danger"},"*")],-1),ie={class:"input_text flex-col"},ne=e("span",null,[n("Relationship"),e("span",{class:"text-danger"},"*")],-1),le={class:"space-between M-T"},re={class:"input_text flex-col"},pe=e("span",null,[n("Date of birth "),e("span",{class:"text-danger"},"*")],-1),me={class:"input_text flex-col"},de=e("span",null,[n("phone"),e("span",{class:"text-danger"},"*")],-1),ce={class:"table-responsive"},ue={__name:"FamilyDetails",setup(_e){x();const _=h(""),l=h(!1),a=D({name:"",relationship:"",dob:"",ph_no:""}),v=()=>{if(a.name==""&&a.dob==""&&a.relationship==""&&a.ph_no==" "&&a.ph_no.length>=10)alert("Fill data");else{let r="http://localhost:3000/posts";l.value=!1,console.log(a),f.post(r,a).then(o=>{console.log("sent sucessfully")}).catch(o=>{console.log(o)}).finally(()=>{console.log("completed")})}};w(()=>{b()});const b=()=>{let r="http://localhost:3000/posts";f.get(r).then(o=>{console.log(o.data),_.value=o.data})};return(r,o)=>{const g=u("Dialog"),p=u("Column"),y=u("DataTable");return T(),P("div",Q,[e("div",W,[e("h6",Z,[n("Family Information "),e("button",{type:"button",class:"btn_txt edit-icon","data-bs-toggle":"modal","data-bs-target":"#exampleModal",onClick:o[0]||(o[0]=s=>l.value=!0)},te),i(g,{visible:l.value,"onUpdate:visible":o[5]||(o[5]=s=>l.value=s),modal:"",style:{width:"40vw",color:"red"},id:""},{header:m(()=>[e("div",null,[e("h5",{style:$({color:"var(--color-blue)",borderLeft:"3px solid var(--light-orange-color",paddingLeft:"6px"})}," Family Information",4)])]),footer:m(()=>[e("div",null,[e("button",{type:"button",class:"submit_btn",id:"submit_button_family_details",onClick:v},"submit")])]),default:m(()=>[e("div",oe,[e("div",ae,[se,d(e("input",{type:"text",name:"familyDetails_Name[]","pattern-data":"name",id:"familyDetails_Name",required:"","onUpdate:modelValue":o[1]||(o[1]=s=>a.name=s)},null,512),[[c,a.name]])]),e("div",ie,[ne,d(e("input",{type:"text",name:"familyDetails_Relationship[]","onUpdate:modelValue":o[2]||(o[2]=s=>a.relationship=s),id:"familyDetails_Relationship","pattern-data":"alpha",required:""},null,512),[[c,a.relationship]])])]),e("div",le,[e("div",re,[pe,d(e("input",{type:"date",id:"datemin",name:"familyDetails_dob[]",min:"2000-01-02","onUpdate:modelValue":o[3]||(o[3]=s=>a.dob=s)},null,512),[[c,a.dob]])]),e("div",me,[de,d(e("input",{type:"number",minlength:"10",maxlength:"10",pattern:"[1-9]{1}[0-9]{9}",id:"familyDetails_phoneNumber",name:"familyDetails_phoneNumber[]","onUpdate:modelValue":o[4]||(o[4]=s=>a.ph_no=s)},null,512),[[c,a.ph_no]])])])]),_:1},8,["visible"])]),e("div",ce,[i(y,{ref:"dt",value:_.value,dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:m(()=>[i(p,{header:"Name",field:"name",style:{"min-width":"8rem"}}),i(p,{field:"relationship",header:"Relationship",style:{"min-width":"12rem"}}),i(p,{field:"dob",header:"Date of Birth ",style:{"min-width":"12rem"}}),i(p,{field:"ph_no",header:"Phone",style:{"min-width":"12rem"}})]),_:1},8,["value"])])])])}}},t=C(ue);t.directive("tooltip",L);t.directive("badge",B);t.directive("ripple",R);t.directive("styleclass",V);t.directive("focustrap",M);t.component("Button",N);t.component("DataTable",S);t.component("Column",I);t.component("ColumnGroup",J);t.component("Row",H);t.component("Toast",A);t.component("ConfirmDialog",z);t.component("Dropdown",q);t.component("InputText",G);t.component("Dialog",j);t.component("ProgressSpinner",E);t.component("Calendar",K);t.component("Textarea",O);t.component("Chips",X);t.component("InputNumber",U);t.use(k,{ripple:!0});t.use(Y);t.use(F);t.mount("#familyinformation");
