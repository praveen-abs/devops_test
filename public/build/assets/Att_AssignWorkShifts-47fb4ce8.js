import{V as c,Q as W,X as O,W as P,c as B,h as o,w as l,Y as w,a2 as T,e as r,j as u,L as n,g as f,o as H,t as y,E as F,P as Q,G as J,R as G,q as j}from"./index-39918fa6.js";import{u as X,C as Y,T as q,B as z,S as K,F as Z,d as ee,c as te,f as oe,b as ae,e as le}from"./styleclass.esm-f772d017.js";import"./blockui.esm-a7a43aa2.js";import{s as ne}from"./confirmdialog.esm-9db873da.js";import{D as se}from"./dialogservice.esm-20532b1b.js";import{s as ie}from"./toast.esm-daf18d83.js";import{s as re}from"./progressspinner.esm-2f2847cf.js";import{s as de}from"./row.esm-6ebc942e.js";import{s as ue}from"./columngroup.esm-9dd1458e.js";const pe=r("h5",{style:{"text-align":"center"}},"Please wait...",-1),me=r("h5",{style:{"text-align":"center"}},"Please wait...",-1),ce=r("div",{class:"confirmation-content"},[r("i",{class:"pi pi-exclamation-triangle mr-3",style:{"font-size":"2rem"}}),r("span",null,"Proceed to save the shift details?")],-1),fe=r("span",null,"Shift Name",-1),he=r("span",null,"Shift Start Time",-1),ve=r("span",null,"Shift End Time",-1),_e=r("br",null,null,-1),ge={__name:"Att_AssignWorkShifts",setup(Se){let A=c(),h=c(!1),m=c(!1),g=c(),S=c();X(),W();const I=c({global:{value:null,matchMode:n.CONTAINS},emp_code:{value:null,matchMode:n.STARTS_WITH,matchMode:n.EQUALS,matchMode:n.CONTAINS},employee_name:{value:null,matchMode:n.STARTS_WITH,matchMode:n.EQUALS,matchMode:n.CONTAINS},designation:{value:null,matchMode:n.STARTS_WITH,matchMode:n.EQUALS,matchMode:n.CONTAINS},department_name:{value:null,matchMode:n.STARTS_WITH,matchMode:n.EQUALS,matchMode:n.CONTAINS},location:{value:null,matchMode:n.STARTS_WITH,matchMode:n.EQUALS,matchMode:n.CONTAINS}}),V=c(!0);let D=null;O(()=>{U()});function U(){let s=window.location.origin+"/attendance_settings/fetch-emp-details";console.log("AJAX URL : "+s),P.get(s).then(t=>{console.log("Axios : "+t.data),A.value=t.data,V.value=!1})}function E(){h.value=!0}function k(s){h.value=!1,s&&b()}function b(){D=null}function L(){const s=[];return _.flatMap(g.value,function(t){s.push(t.user_id)}),s}function M(){k(!1),m.value=!0,console.log("Processing Rowdata : "+JSON.stringify(D));let s=L();P.post(window.location.origin+"/attendance_settings/save-shiftdetails",{selectedEmployees:s,workshift_name:S.value}).then(t=>{console.log(t),U(),m.value=!1,b()}).catch(t=>{m.value=!1,b(),console.log(t.toJSON())})}return(s,t)=>{const R=f("Toast"),N=f("ProgressSpinner"),C=f("Dialog"),x=f("Button"),p=f("InputText"),v=f("Column"),$=f("DataTable");return H(),B("div",null,[o(R),o(C,{header:"Header",visible:V.value,"onUpdate:visible":t[0]||(t[0]=e=>V.value=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:l(()=>[o(N,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:l(()=>[pe]),_:1},8,["visible"]),o(C,{header:"Header",visible:w(m),"onUpdate:visible":t[1]||(t[1]=e=>T(m)?m.value=e:m=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:l(()=>[o(N,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:l(()=>[me]),_:1},8,["visible"]),o(C,{header:"Confirmation",visible:w(h),"onUpdate:visible":t[4]||(t[4]=e=>T(h)?h.value=e:h=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:l(()=>[o(x,{label:"Yes",icon:"pi pi-check",onClick:t[2]||(t[2]=e=>M()),class:"p-button-text",autofocus:""}),o(x,{label:"No",icon:"pi pi-times",onClick:t[3]||(t[3]=e=>k(!0)),class:"p-button-text"})]),default:l(()=>[ce]),_:1},8,["visible"]),r("div",null,[fe,r("span",null,[o(p,{type:"text",modelValue:w(S),"onUpdate:modelValue":t[5]||(t[5]=e=>T(S)?S.value=e:S=e)},null,8,["modelValue"])]),u("     "),he,r("span",null,[o(p,{type:"text",modelValue:s.txt_shift_start_time,"onUpdate:modelValue":t[6]||(t[6]=e=>s.txt_shift_start_time=e)},null,8,["modelValue"])]),u("     "),ve,r("span",null,[o(p,{type:"text",modelValue:s.txt_shift_end_time,"onUpdate:modelValue":t[7]||(t[7]=e=>s.txt_shift_end_time=e)},null,8,["modelValue"])]),_e]),r("div",null,[o($,{value:w(A),selection:w(g),"onUpdate:selection":t[8]||(t[8]=e=>T(g)?g.value=e:g=e),paginator:!0,rows:10,dataKey:"emp_code",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:I.value,"onUpdate:filters":t[9]||(t[9]=e=>I.value=e),filterDisplay:"menu",loading:s.loading2,globalFilterFields:["name","status"]},{empty:l(()=>[u(" No Employee found ")]),loading:l(()=>[u(" Loading employee data. Please wait. ")]),default:l(()=>[o(v,{selectionMode:"multiple",headerStyle:"width: 1em"}),o(v,{headerStyle:"width: 20em",field:"emp_code",header:"Employee ID"},{body:l(e=>[u(y(e.data.emp_code),1)]),filter:l(({filterModel:e,filterCallback:d})=>[o(p,{modelValue:e.value,"onUpdate:modelValue":i=>e.value=i,onInput:i=>d(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),o(v,{headerStyle:"width: 20em",field:"employee_name",header:"Employee Name"},{body:l(e=>[u(y(e.data.employee_name),1)]),filter:l(({filterModel:e,filterCallback:d})=>[o(p,{modelValue:e.value,"onUpdate:modelValue":i=>e.value=i,onInput:i=>d(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),o(v,{headerStyle:"width: 20em",field:"designation",header:"Designation"},{body:l(e=>[u(y(e.data.designation),1)]),filter:l(({filterModel:e,filterCallback:d})=>[o(p,{modelValue:e.value,"onUpdate:modelValue":i=>e.value=i,onInput:i=>d(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),o(v,{headerStyle:"width: 20em",field:"department_name",header:"Department"},{body:l(e=>[u(y(e.data.department_name),1)]),filter:l(({filterModel:e,filterCallback:d})=>[o(p,{modelValue:e.value,"onUpdate:modelValue":i=>e.value=i,onInput:i=>d(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),o(v,{headerStyle:"width: 5em",field:"work_location",header:"Location"},{body:l(e=>[u(y(e.data.work_location),1)]),filter:l(({filterModel:e,filterCallback:d})=>[o(p,{modelValue:e.value,"onUpdate:modelValue":i=>e.value=i,onInput:i=>d(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1})]),_:1},8,["value","selection","filters","loading"]),o(x,{label:"Assign",onClick:t[10]||(t[10]=e=>E())})])])}}},a=F(ge);a.use(Q,{ripple:!0});a.use(Y);a.use(J);a.use(se);a.directive("tooltip",q);a.directive("badge",z);a.directive("ripple",G);a.directive("styleclass",K);a.directive("focustrap",Z);a.component("Button",j);a.component("DataTable",ee);a.component("Column",te);a.component("ColumnGroup",ue);a.component("Row",de);a.component("Toast",ie);a.component("ConfirmDialog",ne);a.component("Dropdown",oe);a.component("InputText",ae);a.component("Dialog",le);a.component("ProgressSpinner",re);a.mount("#VJS_AttSettings_AssignWorkShifts");
