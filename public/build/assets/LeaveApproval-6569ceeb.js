import{B as k,X as Y,E as Z,c as W,h as i,w as c,V as A,a1 as j,e as N,K as F,g as S,o as U,t as M,j as L,n as $,a as G,G as q,P as K,H as Q,R as X,q as ee}from"./toastservice.esm-be32db1e.js";import{T as te,B as ne,S as ae,b as oe,a as re}from"./styleclass.esm-ba8fdf63.js";import"./blockui.esm-dd521861.js";import{u as ie,C as se,F as le,b as ue,s as de,a as me}from"./inputtext.esm-e9caa4ce.js";import{s as ce}from"./confirmdialog.esm-bc3d19a4.js";import{D as pe}from"./dialogservice.esm-7f45f84c.js";import{s as ye}from"./toast.esm-798d9fce.js";import{s as fe}from"./progressspinner.esm-08c4bf67.js";import{s as ve}from"./row.esm-6ebc942e.js";import{s as ge}from"./columngroup.esm-9dd1458e.js";import{a as B}from"./index-f7a317fc.js";var he=/d{1,4}|D{3,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|W{1,2}|[LlopSZN]|"[^"]*"|'[^']*'/g,_e=/\b(?:[A-Z]{1,3}[A-Z][TC])(?:[-+]\d{4})?|((?:Australian )?(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time)\b/g,De=/[^-+\dA-Z]/g;function O(n,o,a,d){if(arguments.length===1&&typeof n=="string"&&!/\d/.test(n)&&(o=n,n=void 0),n=n||n===0?n:new Date,n instanceof Date||(n=new Date(n)),isNaN(n))throw TypeError("Invalid date");o=String(E[o]||o||E.default);var _=o.slice(0,4);(_==="UTC:"||_==="GMT:")&&(o=o.slice(4),a=!0,_==="GMT:"&&(d=!0));var r=function(){return a?"getUTC":"get"},D=function(){return n[r()+"Date"]()},f=function(){return n[r()+"Day"]()},y=function(){return n[r()+"Month"]()},T=function(){return n[r()+"FullYear"]()},p=function(){return n[r()+"Hours"]()},w=function(){return n[r()+"Minutes"]()},b=function(){return n[r()+"Seconds"]()},x=function(){return n[r()+"Milliseconds"]()},s=function(){return a?0:n.getTimezoneOffset()},l=function(){return Te(n)},P=function(){return we(n)},C={d:function(){return D()},dd:function(){return h(D())},ddd:function(){return v.dayNames[f()]},DDD:function(){return J({y:T(),m:y(),d:D(),_:r(),dayName:v.dayNames[f()],short:!0})},dddd:function(){return v.dayNames[f()+7]},DDDD:function(){return J({y:T(),m:y(),d:D(),_:r(),dayName:v.dayNames[f()+7]})},m:function(){return y()+1},mm:function(){return h(y()+1)},mmm:function(){return v.monthNames[y()]},mmmm:function(){return v.monthNames[y()+12]},yy:function(){return String(T()).slice(2)},yyyy:function(){return h(T(),4)},h:function(){return p()%12||12},hh:function(){return h(p()%12||12)},H:function(){return p()},HH:function(){return h(p())},M:function(){return w()},MM:function(){return h(w())},s:function(){return b()},ss:function(){return h(b())},l:function(){return h(x(),3)},L:function(){return h(Math.floor(x()/10))},t:function(){return p()<12?v.timeNames[0]:v.timeNames[1]},tt:function(){return p()<12?v.timeNames[2]:v.timeNames[3]},T:function(){return p()<12?v.timeNames[4]:v.timeNames[5]},TT:function(){return p()<12?v.timeNames[6]:v.timeNames[7]},Z:function(){return d?"GMT":a?"UTC":Me(n)},o:function(){return(s()>0?"-":"+")+h(Math.floor(Math.abs(s())/60)*100+Math.abs(s())%60,4)},p:function(){return(s()>0?"-":"+")+h(Math.floor(Math.abs(s())/60),2)+":"+h(Math.floor(Math.abs(s())%60),2)},S:function(){return["th","st","nd","rd"][D()%10>3?0:(D()%100-D()%10!=10)*D()%10]},W:function(){return l()},WW:function(){return h(l())},N:function(){return P()}};return o.replace(he,function(e){return e in C?C[e]():e.slice(1,e.length-1)})}var E={default:"ddd mmm dd yyyy HH:MM:ss",shortDate:"m/d/yy",paddedShortDate:"mm/dd/yyyy",mediumDate:"mmm d, yyyy",longDate:"mmmm d, yyyy",fullDate:"dddd, mmmm d, yyyy",shortTime:"h:MM TT",mediumTime:"h:MM:ss TT",longTime:"h:MM:ss TT Z",isoDate:"yyyy-mm-dd",isoTime:"HH:MM:ss",isoDateTime:"yyyy-mm-dd'T'HH:MM:sso",isoUtcDateTime:"UTC:yyyy-mm-dd'T'HH:MM:ss'Z'",expiresHeaderFormat:"ddd, dd mmm yyyy HH:MM:ss Z"},v={dayNames:["Sun","Mon","Tue","Wed","Thu","Fri","Sat","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],monthNames:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec","January","February","March","April","May","June","July","August","September","October","November","December"],timeNames:["a","p","am","pm","A","P","AM","PM"]},h=function(o){var a=arguments.length>1&&arguments[1]!==void 0?arguments[1]:2;return String(o).padStart(a,"0")},J=function(o){var a=o.y,d=o.m,_=o.d,r=o._,D=o.dayName,f=o.short,y=f===void 0?!1:f,T=new Date,p=new Date;p.setDate(p[r+"Date"]()-1);var w=new Date;w.setDate(w[r+"Date"]()+1);var b=function(){return T[r+"Date"]()},x=function(){return T[r+"Month"]()},s=function(){return T[r+"FullYear"]()},l=function(){return p[r+"Date"]()},P=function(){return p[r+"Month"]()},C=function(){return p[r+"FullYear"]()},e=function(){return w[r+"Date"]()},H=function(){return w[r+"Month"]()},V=function(){return w[r+"FullYear"]()};return s()===a&&x()===d&&b()===_?y?"Tdy":"Today":C()===a&&P()===d&&l()===_?y?"Ysd":"Yesterday":V()===a&&H()===d&&e()===_?y?"Tmw":"Tomorrow":D},Te=function(o){var a=new Date(o.getFullYear(),o.getMonth(),o.getDate());a.setDate(a.getDate()-(a.getDay()+6)%7+3);var d=new Date(a.getFullYear(),0,4);d.setDate(d.getDate()-(d.getDay()+6)%7+3);var _=a.getTimezoneOffset()-d.getTimezoneOffset();a.setHours(a.getHours()-_);var r=(a-d)/(864e5*7);return 1+Math.floor(r)},we=function(o){var a=o.getDay();return a===0&&(a=7),a},Me=function(o){return(String(o).match(_e)||[""]).pop().replace(De,"").replace(/GMT\+0000/g,"UTC")};const be=N("h5",{style:{"text-align":"center"}},"Please wait...",-1),Se=N("h5",{style:{"text-align":"center"}},"Please wait...",-1),Ne={class:"confirmation-content"},Ce=N("i",{class:"pi pi-exclamation-triangle mr-3",style:{"font-size":"2rem"}},null,-1),Ae={key:1},xe={key:0},He={__name:"LeaveApproval",setup(n){let o=k(),a=k(!1),d=k(!1);ie(),Y();const _=k({global:{value:null,matchMode:F.CONTAINS},employee_name:{value:null,matchMode:F.STARTS_WITH,matchMode:F.EQUALS,matchMode:F.CONTAINS},status:{value:null,matchMode:F.EQUALS}}),r=k(!0),D=k(["Pending","Approved","Rejected"]);let f=null,y=null;Z(()=>{T()});function T(){let s=window.location.origin+"/fetch-leaverequests/org/Approved,Rejected,Pending";console.log("AJAX URL : "+s),B.get(s).then(l=>{console.log("Axios : "+l.data),o.value=l.data,r.value=!1})}function p(s,l){a.value=!0,f=l,y=s,console.log("Selected Row Data : "+JSON.stringify(s))}function w(s){a.value=!1,s&&b()}function b(){f="",y=null}function x(){w(!1),d.value=!0,console.log("Processing Rowdata : "+JSON.stringify(y)),B.post(window.location.origin+"/attendance-approve-rejectleave",{leave_id:y.id,status:f=="Approve"?"Approved":f=="Reject"?"Rejected":f,leave_rejection_text:""}).then(s=>{console.log(s),T(),d.value=!1,b()}).catch(s=>{d.value=!1,b(),console.log(s.toJSON())})}return(s,l)=>{const P=S("Toast"),C=S("ProgressSpinner"),e=S("Dialog"),H=S("Button"),V=S("InputText"),m=S("Column"),z=S("Dropdown"),I=S("DataTable");return U(),W("div",null,[i(P),i(e,{header:"Header",visible:r.value,"onUpdate:visible":l[0]||(l[0]=t=>r.value=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:c(()=>[i(C,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:c(()=>[be]),_:1},8,["visible"]),i(e,{header:"Header",visible:A(d),"onUpdate:visible":l[1]||(l[1]=t=>j(d)?d.value=t:d=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:c(()=>[i(C,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:c(()=>[Se]),_:1},8,["visible"]),i(e,{header:"Confirmation",visible:A(a),"onUpdate:visible":l[4]||(l[4]=t=>j(a)?a.value=t:a=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:c(()=>[i(H,{label:"Yes",icon:"pi pi-check",onClick:l[2]||(l[2]=t=>x()),class:"p-button-text",autofocus:""}),i(H,{label:"No",icon:"pi pi-times",onClick:l[3]||(l[3]=t=>w(!0)),class:"p-button-text"})]),default:c(()=>[N("div",Ne,[Ce,N("span",null,"Are you sure you want to "+M(A(f))+"?",1)])]),_:1},8,["visible"]),N("div",null,[i(I,{value:A(o),paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:_.value,"onUpdate:filters":l[5]||(l[5]=t=>_.value=t),filterDisplay:"menu",loading:s.loading2,globalFilterFields:["name","status"],style:{"white-space":"nowrap"}},{empty:c(()=>[L(" No Employee found ")]),loading:c(()=>[L(" Loading customers data. Please wait. ")]),default:c(()=>[i(m,{field:"employee_name",header:"Employee Name",style:{"min-width":"18em"}},{body:c(t=>[L(M(t.data.employee_name),1)]),filter:c(({filterModel:t,filterCallback:R})=>[i(V,{modelValue:t.value,"onUpdate:modelValue":g=>t.value=g,onInput:g=>R(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),i(m,{field:"leaverequest_date",header:"Date",sortable:!0},{body:c(t=>[L(M(A(O)(t.data.leaverequest_date,"dd-mm-yyyy, h:MM TT")),1)]),_:1}),i(m,{field:"leave_type",header:"Leave Type"}),i(m,{field:"start_date",header:"Start Time"},{body:c(t=>[L(M(A(O)(t.data.start_date,"dd-mm-yyyy, h:MM TT")),1)]),_:1}),i(m,{field:"end_date",header:"End Time"},{body:c(t=>[L(M(A(O)(t.data.end_date,"dd-mm-yyyy, h:MM TT")),1)]),_:1}),i(m,{field:"leave_reason",header:"Leave Reason",style:{"min-width":"25em","white-space":"pre-wrap"}}),i(m,{field:"reviewer_name",header:"Approver Name"}),i(m,{field:"reviewer_comments",header:"Approver Comments"}),i(m,{field:"status",header:"Status",icon:"pi pi-check"},{body:c(({data:t})=>[N("span",{class:$("customer-badge status-"+t.status)},M(t.status),3)]),filter:c(({filterModel:t,filterCallback:R})=>[i(z,{modelValue:t.value,"onUpdate:modelValue":g=>t.value=g,onChange:g=>R(),options:D.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:c(g=>[g.value?(U(),W("span",{key:0,class:$("customer-badge status-"+g.value)},M(g.value),3)):(U(),W("span",Ae,M(g.placeholder),1))]),option:c(g=>[N("span",{class:$("customer-badge status-"+g.option)},M(g.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),i(m,{style:{width:"300px"},field:"",header:"Action"},{body:c(t=>[t.data.status=="Pending"?(U(),W("span",xe,[i(H,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:R=>p(t.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),i(H,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2em"},onClick:R=>p(t.data,"Reject")},null,8,["onClick"])])):G("",!0)]),_:1})]),_:1},8,["value","filters","loading"])])])}}},u=q(He);u.use(K,{ripple:!0});u.use(se);u.use(Q);u.use(pe);u.directive("tooltip",te);u.directive("badge",ne);u.directive("ripple",X);u.directive("styleclass",ae);u.directive("focustrap",le);u.component("Button",ee);u.component("DataTable",oe);u.component("Column",re);u.component("ColumnGroup",ge);u.component("Row",ve);u.component("Toast",ye);u.component("ConfirmDialog",ce);u.component("Dropdown",ue);u.component("InputText",de);u.component("Dialog",me);u.component("ProgressSpinner",fe);u.mount("#VJS_LeaveApproval");