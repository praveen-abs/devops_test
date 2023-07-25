import{G as k,a9 as re,ac as E,Y as se,I as ie,o as A,c as H,h as s,w as i,H as P,_ as z,d as p,t as _,b as le,a as B,l as F,n as Y,g as b,J as ue,P as de,K as ce,R as me,u as pe,v as ye,Q as fe,L as ve,N as ge,A as _e,M as he}from"./toastservice.esm-3137c6bd.js";import{T as we,B as De,S as Te,b as be,a as Me}from"./styleclass.esm-144d12d2.js";import"./blockui.esm-1641b8a1.js";import{D as Se}from"./dialogservice.esm-0610cc71.js";import{u as Ne,C as xe}from"./confirmationservice.esm-ec2f14f9.js";import{s as Ce}from"./progressspinner.esm-0e6c68e2.js";import{s as ke}from"./row.esm-6ebc942e.js";import{s as Ae}from"./columngroup.esm-9dd1458e.js";import{s as He}from"./tag.esm-bd0b2c04.js";import{s as Le}from"./overlaypanel.esm-6f143730.js";import{a as Z}from"./index-362795f3.js";var Pe=/d{1,4}|D{3,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|W{1,2}|[LlopSZN]|"[^"]*"|'[^']*'/g,Oe=/\b(?:[A-Z]{1,3}[A-Z][TC])(?:[-+]\d{4})?|((?:Australian )?(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time)\b/g,Re=/[^-+\dA-Z]/g;function G(n,r,o,c){if(arguments.length===1&&typeof n=="string"&&!/\d/.test(n)&&(r=n,n=void 0),n=n||n===0?n:new Date,n instanceof Date||(n=new Date(n)),isNaN(n))throw TypeError("Invalid date");r=String(q[r]||r||q.default);var w=r.slice(0,4);(w==="UTC:"||w==="GMT:")&&(r=r.slice(4),o=!0,w==="GMT:"&&(c=!0));var a=function(){return o?"getUTC":"get"},y=function(){return n[a()+"Date"]()},M=function(){return n[a()+"Day"]()},f=function(){return n[a()+"Month"]()},S=function(){return n[a()+"FullYear"]()},m=function(){return n[a()+"Hours"]()},N=function(){return n[a()+"Minutes"]()},D=function(){return n[a()+"Seconds"]()},L=function(){return n[a()+"Milliseconds"]()},T=function(){return o?0:n.getTimezoneOffset()},O=function(){return Fe(n)},U=function(){return Ue(n)},R={d:function(){return y()},dd:function(){return h(y())},ddd:function(){return v.dayNames[M()]},DDD:function(){return Q({y:S(),m:f(),d:y(),_:a(),dayName:v.dayNames[M()],short:!0})},dddd:function(){return v.dayNames[M()+7]},DDDD:function(){return Q({y:S(),m:f(),d:y(),_:a(),dayName:v.dayNames[M()+7]})},m:function(){return f()+1},mm:function(){return h(f()+1)},mmm:function(){return v.monthNames[f()]},mmmm:function(){return v.monthNames[f()+12]},yy:function(){return String(S()).slice(2)},yyyy:function(){return h(S(),4)},h:function(){return m()%12||12},hh:function(){return h(m()%12||12)},H:function(){return m()},HH:function(){return h(m())},M:function(){return N()},MM:function(){return h(N())},s:function(){return D()},ss:function(){return h(D())},l:function(){return h(L(),3)},L:function(){return h(Math.floor(L()/10))},t:function(){return m()<12?v.timeNames[0]:v.timeNames[1]},tt:function(){return m()<12?v.timeNames[2]:v.timeNames[3]},T:function(){return m()<12?v.timeNames[4]:v.timeNames[5]},TT:function(){return m()<12?v.timeNames[6]:v.timeNames[7]},Z:function(){return c?"GMT":o?"UTC":Ve(n)},o:function(){return(T()>0?"-":"+")+h(Math.floor(Math.abs(T())/60)*100+Math.abs(T())%60,4)},p:function(){return(T()>0?"-":"+")+h(Math.floor(Math.abs(T())/60),2)+":"+h(Math.floor(Math.abs(T())%60),2)},S:function(){return["th","st","nd","rd"][y()%10>3?0:(y()%100-y()%10!=10)*y()%10]},W:function(){return O()},WW:function(){return h(O())},N:function(){return U()}};return r.replace(Pe,function(e){return e in R?R[e]():e.slice(1,e.length-1)})}var q={default:"ddd mmm dd yyyy HH:MM:ss",shortDate:"m/d/yy",paddedShortDate:"mm/dd/yyyy",mediumDate:"mmm d, yyyy",longDate:"mmmm d, yyyy",fullDate:"dddd, mmmm d, yyyy",shortTime:"h:MM TT",mediumTime:"h:MM:ss TT",longTime:"h:MM:ss TT Z",isoDate:"yyyy-mm-dd",isoTime:"HH:MM:ss",isoDateTime:"yyyy-mm-dd'T'HH:MM:sso",isoUtcDateTime:"UTC:yyyy-mm-dd'T'HH:MM:ss'Z'",expiresHeaderFormat:"ddd, dd mmm yyyy HH:MM:ss Z"},v={dayNames:["Sun","Mon","Tue","Wed","Thu","Fri","Sat","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],monthNames:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec","January","February","March","April","May","June","July","August","September","October","November","December"],timeNames:["a","p","am","pm","A","P","AM","PM"]},h=function(r){var o=arguments.length>1&&arguments[1]!==void 0?arguments[1]:2;return String(r).padStart(o,"0")},Q=function(r){var o=r.y,c=r.m,w=r.d,a=r._,y=r.dayName,M=r.short,f=M===void 0?!1:M,S=new Date,m=new Date;m.setDate(m[a+"Date"]()-1);var N=new Date;N.setDate(N[a+"Date"]()+1);var D=function(){return S[a+"Date"]()},L=function(){return S[a+"Month"]()},T=function(){return S[a+"FullYear"]()},O=function(){return m[a+"Date"]()},U=function(){return m[a+"Month"]()},R=function(){return m[a+"FullYear"]()},e=function(){return N[a+"Date"]()},V=function(){return N[a+"Month"]()},J=function(){return N[a+"FullYear"]()};return T()===o&&L()===c&&D()===w?f?"Tdy":"Today":R()===o&&U()===c&&O()===w?f?"Ysd":"Yesterday":J()===o&&V()===c&&e()===w?f?"Tmw":"Tomorrow":y},Fe=function(r){var o=new Date(r.getFullYear(),r.getMonth(),r.getDate());o.setDate(o.getDate()-(o.getDay()+6)%7+3);var c=new Date(o.getFullYear(),0,4);c.setDate(c.getDate()-(c.getDay()+6)%7+3);var w=o.getTimezoneOffset()-c.getTimezoneOffset();o.setHours(o.getHours()-w);var a=(o-c)/(864e5*7);return 1+Math.floor(a)},Ue=function(r){var o=r.getDay();return o===0&&(o=7),o},Ve=function(r){return(String(r).match(Oe)||[""]).pop().replace(Re,"").replace(/GMT\+0000/g,"UTC")};const We=p("h5",{style:{"text-align":"center"}},"Please wait...",-1),$e=p("h5",{style:{"text-align":"center"}},"Please wait...",-1),Ee={class:"confirmation-content d-flex justify-content-start align-items-center mt-3 ml-3"},je=p("i",{class:"mr-3 pi pi-exclamation-triangle text-red-600",style:{"font-size":"2rem"}},null,-1),Je={class:"w-full d-flex justify-content-start align-items-center mt-4 pl-3",style:{"margin-bottom":"-12px"}},ze={class:"confirmation-content"},Be=p("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Ie={class:"flex justify-content-center align-items-center"},Ye={key:0,if:"",class:"p-2 w-2 h-18 text-semibold rounded-full bg-blue-900 text-white"},Ze=["src"],Ge={class:"text-left pl-2"},qe={key:0},Qe=p("div",null,null,-1),Ke={key:0},Xe={key:1},et={key:1},tt={key:0},at={__name:"LeaveApproval",setup(n){let r=k(),o=k(!1),c=k(!1),w=k(),a=k(!1);Ne(),re();const y=k(),M=k({global:{value:null,matchMode:E.CONTAINS},employee_name:{value:null,matchMode:E.STARTS_WITH,matchMode:E.EQUALS,matchMode:E.CONTAINS},status:{value:"Pending",matchMode:E.EQUALS}}),f=k(!0),S=k(["Pending","Approved","Rejected"]),m=k(),N=u=>{m.value.toggle(u)};let D=null,L=null;const T=se({review_comment:""});ie(()=>{O()});function O(){let u=window.location.origin+"/fetch-leaverequests-based-on-currentrole";Z.get(u).then(d=>{r.value=d.data.data,f.value=!1})}function U(u){return isNaN(Date.parse(u))?"Invalid date":G(u,"dd-mm-yyyy, h:MM TT")}function R(u,d){c.value=!1,o.value=!0,D=d,L=u,console.log("Selected Row Data : "+JSON.stringify(u))}function e(u){o.value=!1,u&&V()}function V(){D="",L=null}function J(){console.log(T.review_comment),e(!1),a.value=!0,Z.post(window.location.origin+"/attendance-approve-rejectleave",{record_id:L.id,status:D=="Approve"?"Approved":D=="Reject"?"Rejected":D,review_comment:T.review_comment}).then(u=>{if(console.log(u),V(),a.value=!1,u.data.status=="success")O();else if(u.data.status=="failure"){c.value=!0,w.value=u.data.message;return}}).catch(u=>{a.value=!1,V(),console.log(u.toJSON())})}const x=u=>{switch(u){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};return(u,d)=>{const K=b("Toast"),I=b("ProgressSpinner"),j=b("Dialog"),X=b("Textarea"),W=b("Button"),ee=b("InputText"),C=b("Column"),te=b("OverlayPanel"),ae=b("Tag"),ne=b("Dropdown"),oe=b("DataTable");return A(),H("div",null,[s(K),s(j,{header:"Header",visible:f.value,"onUpdate:visible":d[0]||(d[0]=t=>f.value=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:i(()=>[s(I,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:i(()=>[We]),_:1},8,["visible"]),s(j,{header:"Header",visible:P(a),"onUpdate:visible":d[1]||(d[1]=t=>z(a)?a.value=t:a=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:i(()=>[s(I,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:i(()=>[$e]),_:1},8,["visible"]),s(j,{header:"Confirmation",visible:P(o),"onUpdate:visible":d[5]||(d[5]=t=>z(o)?o.value=t:o=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"450px"},modal:!0},{footer:i(()=>[s(W,{label:"Yes",icon:"pi pi-check",onClick:d[3]||(d[3]=t=>J()),class:"p-button-text",autofocus:""}),s(W,{label:"No",icon:"pi pi-times",onClick:d[4]||(d[4]=t=>e(!0)),class:"p-button-text"})]),default:i(()=>[p("div",Ee,[je,p("span",null,"Are you sure you want to "+_(P(D))+"?",1)]),p("div",Je,[P(D)=="Reject"?(A(),le(X,{key:0,name:"",id:"",modelValue:y.value,"onUpdate:modelValue":d[2]||(d[2]=t=>y.value=t),class:"border p-2 rounded",cols:"45",rows:"4",autoResize:"",placeholder:"Add Comment"},null,8,["modelValue"])):B("",!0),F(" "+_(y.value),1)])]),_:1},8,["visible"]),s(j,{header:"Error",visible:P(c),"onUpdate:visible":d[6]||(d[6]=t=>z(c)?c.value=t:c=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:i(()=>[s(W,{label:"Ok",icon:"pi pi-check",autofocus:""})]),default:i(()=>[p("div",ze,[Be,p("span",null,"Error while processing the request : "+_(P(w)),1)])]),_:1},8,["visible"]),p("div",null,[s(oe,{value:P(r),paginator:!0,rows:10,dataKey:"id",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",sortField:"leaverequest_date",sortOrder:-1,filters:M.value,"onUpdate:filters":d[7]||(d[7]=t=>M.value=t),filterDisplay:"menu",loading:u.loading2,globalFilterFields:["name","status"],style:{"white-space":"nowrap"}},{empty:i(()=>[F(" No Employee found ")]),loading:i(()=>[F(" Loading customers data. Please wait. ")]),default:i(()=>[s(C,{class:"font-bold",field:"employee_name",header:"Employee Name",style:{"min-width":"18em"}},{body:i(t=>[p("div",Ie,[JSON.parse(t.data.employee_avatar).type=="shortname"?(A(),H("p",Ye,_(JSON.parse(t.data.employee_avatar).data),1)):(A(),H("img",{key:1,class:"rounded-circle img-md w-2 userActive-status profile-img",style:{height:"30px !important"},src:`data:image/png;base64,${JSON.parse(t.data.employee_avatar).data}`,srcset:"",alt:""},null,8,Ze)),p("p",Ge,_(t.data.employee_name),1)])]),filter:i(({filterModel:t,filterCallback:$})=>[s(ee,{modelValue:t.value,"onUpdate:modelValue":g=>t.value=g,onInput:g=>$(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),s(C,{field:"leaverequest_date",header:"Date",sortable:!0},{body:i(t=>[F(_(P(G)(t.data.leaverequest_date,"dd-mm-yyyy, h:MM TT")),1)]),_:1}),s(C,{field:"leave_type",header:"Leave Type"},{body:i(t=>[t.data.leave_type=="Casual/Sick Leave"?(A(),H("h1",qe," SL/CL ")):B("",!0),Qe]),_:1}),s(C,{field:"start_date",header:"Start Time"},{body:i(t=>[F(_(U(t.data.start_date)),1)]),_:1}),s(C,{field:"end_date",header:"End Time"},{body:i(t=>[F(_(U(t.data.end_date))+" ",1)]),_:1}),s(C,{field:"leave_reason",header:"Leave Reason",style:{"min-width":"25em","white-space":"pre-wrap"}},{body:i(t=>[t.data.leave_reason.length>80?(A(),H("div",Ke,[p("p",{onClick:N,class:"font-medium text-orange-400 underline cursor-pointer"},"explore more... "),s(te,{ref_key:"overlayPanel",ref:m,style:{height:"80px"}},{default:i(()=>[F(_(t.data.leave_reason),1)]),_:2},1536)])):(A(),H("div",Xe,_(t.data.leave_reason),1))]),_:1}),s(C,{field:"reviewer_name",header:"Approver Name"}),s(C,{field:"reviewer_comments",header:"Approver Comments"}),s(C,{field:"status",header:"Status",icon:"pi pi-check"},{body:i(({data:t})=>[s(ae,{value:t.status,severity:x(t.status)},null,8,["value","severity"])]),filter:i(({filterModel:t,filterCallback:$})=>[s(ne,{modelValue:t.value,"onUpdate:modelValue":g=>t.value=g,onChange:g=>$(),options:S.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:i(g=>[g.value?(A(),H("span",{key:0,class:Y("customer-badge status-"+g.value)},_(g.value),3)):(A(),H("span",et,_(g.placeholder),1))]),option:i(g=>[p("span",{class:Y("customer-badge status-"+g.option)},_(g.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),s(C,{style:{width:"300px"},field:"",header:"Action"},{body:i(t=>[t.data.status=="Pending"?(A(),H("span",tt,[s(W,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:$=>R(t.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),s(W,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2em"},onClick:$=>R(t.data,"Reject")},null,8,["onClick"])])):B("",!0)]),_:1})]),_:1},8,["value","filters","loading"])])])}}},l=ue(at);l.use(de,{ripple:!0});l.use(xe);l.use(ce);l.use(Se);l.directive("tooltip",we);l.directive("badge",De);l.directive("ripple",me);l.directive("styleclass",Te);l.directive("focustrap",pe);l.component("Button",ye);l.component("DataTable",be);l.component("Column",Me);l.component("ColumnGroup",Ae);l.component("Row",ke);l.component("Toast",fe);l.component("ConfirmDialog",ve);l.component("Dropdown",ge);l.component("InputText",_e);l.component("Dialog",he);l.component("ProgressSpinner",Ce);l.component("Tag",He);l.component("OverlayPanel",Le);l.mount("#VJS_LeaveApproval");
