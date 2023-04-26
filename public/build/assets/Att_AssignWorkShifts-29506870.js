import{a as P}from"./index-f7a317fc.js";import{B as p,X as W,E as O,c as H,h as l,w as a,W as S,a0 as y,e as i,j as u,K as o,g as c,o as B,t as w}from"./toastservice.esm-c719b254.js";import{u as Q}from"./inputtext.esm-af9c7539.js";const F={class:"w-full"},$=i("h5",{style:{"text-align":"center"}},"Please wait...",-1),J=i("h5",{style:{"text-align":"center"}},"Please wait...",-1),j=i("div",{class:"confirmation-content"},[i("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}}),i("span",null,"Proceed to save the shift details?")],-1),K={class:"py-4"},X=i("span",{class:"text-lg font-semibold"},"Shift Name",-1),z=i("span",null,"Shift Start Time",-1),G=i("span",null,"Shift End Time",-1),Y=i("br",null,null,-1),le={__name:"Att_AssignWorkShifts",setup(q){let C=p(),h=p(!1),m=p(!1),v=p(),g=p();Q(),W();const A=p({global:{value:null,matchMode:o.CONTAINS},emp_code:{value:null,matchMode:o.STARTS_WITH,matchMode:o.EQUALS,matchMode:o.CONTAINS},employee_name:{value:null,matchMode:o.STARTS_WITH,matchMode:o.EQUALS,matchMode:o.CONTAINS},designation:{value:null,matchMode:o.STARTS_WITH,matchMode:o.EQUALS,matchMode:o.CONTAINS},department_name:{value:null,matchMode:o.STARTS_WITH,matchMode:o.EQUALS,matchMode:o.CONTAINS},location:{value:null,matchMode:o.STARTS_WITH,matchMode:o.EQUALS,matchMode:o.CONTAINS}}),T=p(!0);let I=null;O(()=>{U()});function U(){let n=window.location.origin+"/attendance_settings/fetch-emp-details";console.log("AJAX URL : "+n),P.get(n).then(t=>{console.log("Axios : "+t.data),C.value=t.data,T.value=!1})}function D(){h.value=!0}function k(n){h.value=!1,n&&V()}function V(){I=null}function E(){const n=[];return _.flatMap(v.value,function(t){n.push(t.user_id)}),n}function M(){k(!1),m.value=!0,console.log("Processing Rowdata : "+JSON.stringify(I));let n=E();P.post(window.location.origin+"/attendance_settings/save-shiftdetails",{selectedEmployees:n,workshift_name:g.value}).then(t=>{console.log(t),U(),m.value=!1,V()}).catch(t=>{m.value=!1,V(),console.log(t.toJSON())})}return(n,t)=>{const L=c("Toast"),N=c("ProgressSpinner"),b=c("Dialog"),x=c("Button"),r=c("InputText"),f=c("Column"),R=c("DataTable");return B(),H("div",F,[l(L),l(b,{header:"Header",visible:T.value,"onUpdate:visible":t[0]||(t[0]=e=>T.value=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:a(()=>[l(N,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:a(()=>[$]),_:1},8,["visible"]),l(b,{header:"Header",visible:S(m),"onUpdate:visible":t[1]||(t[1]=e=>y(m)?m.value=e:m=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:a(()=>[l(N,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:a(()=>[J]),_:1},8,["visible"]),l(b,{header:"Confirmation",visible:S(h),"onUpdate:visible":t[4]||(t[4]=e=>y(h)?h.value=e:h=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:a(()=>[l(x,{label:"Yes",icon:"pi pi-check",onClick:t[2]||(t[2]=e=>M()),class:"p-button-text",autofocus:""}),l(x,{label:"No",icon:"pi pi-times",onClick:t[3]||(t[3]=e=>k(!0)),class:"p-button-text"})]),default:a(()=>[j]),_:1},8,["visible"]),i("div",K,[X,i("span",null,[l(r,{type:"text",modelValue:S(g),"onUpdate:modelValue":t[5]||(t[5]=e=>y(g)?g.value=e:g=e)},null,8,["modelValue"])]),u("     "),z,i("span",null,[l(r,{type:"text",modelValue:n.txt_shift_start_time,"onUpdate:modelValue":t[6]||(t[6]=e=>n.txt_shift_start_time=e)},null,8,["modelValue"])]),u("     "),G,i("span",null,[l(r,{type:"text",modelValue:n.txt_shift_end_time,"onUpdate:modelValue":t[7]||(t[7]=e=>n.txt_shift_end_time=e)},null,8,["modelValue"])]),Y]),i("div",null,[l(R,{value:S(C),selection:S(v),"onUpdate:selection":t[8]||(t[8]=e=>y(v)?v.value=e:v=e),paginator:!0,rows:10,dataKey:"emp_code",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:A.value,"onUpdate:filters":t[9]||(t[9]=e=>A.value=e),filterDisplay:"menu",loading:n.loading2,globalFilterFields:["name","status"]},{empty:a(()=>[u(" No Employee found ")]),loading:a(()=>[u(" Loading employee data. Please wait. ")]),default:a(()=>[l(f,{selectionMode:"multiple",headerStyle:"width: 1em"}),l(f,{headerStyle:"width: 20em",field:"emp_code",header:"Employee ID"},{body:a(e=>[u(w(e.data.emp_code),1)]),filter:a(({filterModel:e,filterCallback:d})=>[l(r,{modelValue:e.value,"onUpdate:modelValue":s=>e.value=s,onInput:s=>d(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),l(f,{headerStyle:"width: 20em",field:"employee_name",header:"Employee Name"},{body:a(e=>[u(w(e.data.employee_name),1)]),filter:a(({filterModel:e,filterCallback:d})=>[l(r,{modelValue:e.value,"onUpdate:modelValue":s=>e.value=s,onInput:s=>d(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),l(f,{headerStyle:"width: 20em",field:"designation",header:"Designation"},{body:a(e=>[u(w(e.data.designation),1)]),filter:a(({filterModel:e,filterCallback:d})=>[l(r,{modelValue:e.value,"onUpdate:modelValue":s=>e.value=s,onInput:s=>d(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),l(f,{headerStyle:"width: 20em",field:"department_name",header:"Department"},{body:a(e=>[u(w(e.data.department_name),1)]),filter:a(({filterModel:e,filterCallback:d})=>[l(r,{modelValue:e.value,"onUpdate:modelValue":s=>e.value=s,onInput:s=>d(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),l(f,{headerStyle:"width: 5em",field:"work_location",header:"Location"},{body:a(e=>[u(w(e.data.work_location),1)]),filter:a(({filterModel:e,filterCallback:d})=>[l(r,{modelValue:e.value,"onUpdate:modelValue":s=>e.value=s,onInput:s=>d(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1})]),_:1},8,["value","selection","filters","loading"]),l(x,{label:"Assign",onClick:t[10]||(t[10]=e=>D())})])])}}};export{le as _};
