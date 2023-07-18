import{G as k,ag as oe,a1 as se,H as ie,o as A,c as P,h as s,w as i,a2 as L,a7 as z,d as v,t as _,b as le,a as I,l as F,n as Y,X as E,g as b,I as ue,P as de,J as me,R as ce,u as pe,v as ye,N as fe,K as ve,M as ge,A as _e,L as he}from"./toastservice.esm-089fd174.js";import{T as we,B as De,S as Te,b as be,a as Me}from"./styleclass.esm-c4aad718.js";import"./blockui.esm-fe051704.js";import{D as Se}from"./dialogservice.esm-5a9d18a9.js";import{u as Ne,C as xe}from"./confirmationservice.esm-66a41967.js";import{s as Ce}from"./progressspinner.esm-76560800.js";import{s as ke}from"./row.esm-6ebc942e.js";import{s as Ae}from"./columngroup.esm-9dd1458e.js";import{s as He}from"./tag.esm-677dc4f9.js";import{s as Pe}from"./overlaypanel.esm-0df4bc6f.js";import{a as Z}from"./index-362795f3.js";var Le=/d{1,4}|D{3,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|W{1,2}|[LlopSZN]|"[^"]*"|'[^']*'/g,Oe=/\b(?:[A-Z]{1,3}[A-Z][TC])(?:[-+]\d{4})?|((?:Australian )?(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time)\b/g,Re=/[^-+\dA-Z]/g;function G(n,o,r,m){if(arguments.length===1&&typeof n=="string"&&!/\d/.test(n)&&(o=n,n=void 0),n=n||n===0?n:new Date,n instanceof Date||(n=new Date(n)),isNaN(n))throw TypeError("Invalid date");o=String(q[o]||o||q.default);var w=o.slice(0,4);(w==="UTC:"||w==="GMT:")&&(o=o.slice(4),r=!0,w==="GMT:"&&(m=!0));var a=function(){return r?"getUTC":"get"},p=function(){return n[a()+"Date"]()},M=function(){return n[a()+"Day"]()},y=function(){return n[a()+"Month"]()},S=function(){return n[a()+"FullYear"]()},c=function(){return n[a()+"Hours"]()},N=function(){return n[a()+"Minutes"]()},D=function(){return n[a()+"Seconds"]()},H=function(){return n[a()+"Milliseconds"]()},T=function(){return r?0:n.getTimezoneOffset()},O=function(){return Fe(n)},U=function(){return Ue(n)},R={d:function(){return p()},dd:function(){return h(p())},ddd:function(){return f.dayNames[M()]},DDD:function(){return K({y:S(),m:y(),d:p(),_:a(),dayName:f.dayNames[M()],short:!0})},dddd:function(){return f.dayNames[M()+7]},DDDD:function(){return K({y:S(),m:y(),d:p(),_:a(),dayName:f.dayNames[M()+7]})},m:function(){return y()+1},mm:function(){return h(y()+1)},mmm:function(){return f.monthNames[y()]},mmmm:function(){return f.monthNames[y()+12]},yy:function(){return String(S()).slice(2)},yyyy:function(){return h(S(),4)},h:function(){return c()%12||12},hh:function(){return h(c()%12||12)},H:function(){return c()},HH:function(){return h(c())},M:function(){return N()},MM:function(){return h(N())},s:function(){return D()},ss:function(){return h(D())},l:function(){return h(H(),3)},L:function(){return h(Math.floor(H()/10))},t:function(){return c()<12?f.timeNames[0]:f.timeNames[1]},tt:function(){return c()<12?f.timeNames[2]:f.timeNames[3]},T:function(){return c()<12?f.timeNames[4]:f.timeNames[5]},TT:function(){return c()<12?f.timeNames[6]:f.timeNames[7]},Z:function(){return m?"GMT":r?"UTC":Ve(n)},o:function(){return(T()>0?"-":"+")+h(Math.floor(Math.abs(T())/60)*100+Math.abs(T())%60,4)},p:function(){return(T()>0?"-":"+")+h(Math.floor(Math.abs(T())/60),2)+":"+h(Math.floor(Math.abs(T())%60),2)},S:function(){return["th","st","nd","rd"][p()%10>3?0:(p()%100-p()%10!=10)*p()%10]},W:function(){return O()},WW:function(){return h(O())},N:function(){return U()}};return o.replace(Le,function(e){return e in R?R[e]():e.slice(1,e.length-1)})}var q={default:"ddd mmm dd yyyy HH:MM:ss",shortDate:"m/d/yy",paddedShortDate:"mm/dd/yyyy",mediumDate:"mmm d, yyyy",longDate:"mmmm d, yyyy",fullDate:"dddd, mmmm d, yyyy",shortTime:"h:MM TT",mediumTime:"h:MM:ss TT",longTime:"h:MM:ss TT Z",isoDate:"yyyy-mm-dd",isoTime:"HH:MM:ss",isoDateTime:"yyyy-mm-dd'T'HH:MM:sso",isoUtcDateTime:"UTC:yyyy-mm-dd'T'HH:MM:ss'Z'",expiresHeaderFormat:"ddd, dd mmm yyyy HH:MM:ss Z"},f={dayNames:["Sun","Mon","Tue","Wed","Thu","Fri","Sat","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],monthNames:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec","January","February","March","April","May","June","July","August","September","October","November","December"],timeNames:["a","p","am","pm","A","P","AM","PM"]},h=function(o){var r=arguments.length>1&&arguments[1]!==void 0?arguments[1]:2;return String(o).padStart(r,"0")},K=function(o){var r=o.y,m=o.m,w=o.d,a=o._,p=o.dayName,M=o.short,y=M===void 0?!1:M,S=new Date,c=new Date;c.setDate(c[a+"Date"]()-1);var N=new Date;N.setDate(N[a+"Date"]()+1);var D=function(){return S[a+"Date"]()},H=function(){return S[a+"Month"]()},T=function(){return S[a+"FullYear"]()},O=function(){return c[a+"Date"]()},U=function(){return c[a+"Month"]()},R=function(){return c[a+"FullYear"]()},e=function(){return N[a+"Date"]()},V=function(){return N[a+"Month"]()},j=function(){return N[a+"FullYear"]()};return T()===r&&H()===m&&D()===w?y?"Tdy":"Today":R()===r&&U()===m&&O()===w?y?"Ysd":"Yesterday":j()===r&&V()===m&&e()===w?y?"Tmw":"Tomorrow":p},Fe=function(o){var r=new Date(o.getFullYear(),o.getMonth(),o.getDate());r.setDate(r.getDate()-(r.getDay()+6)%7+3);var m=new Date(r.getFullYear(),0,4);m.setDate(m.getDate()-(m.getDay()+6)%7+3);var w=r.getTimezoneOffset()-m.getTimezoneOffset();r.setHours(r.getHours()-w);var a=(r-m)/(864e5*7);return 1+Math.floor(a)},Ue=function(o){var r=o.getDay();return r===0&&(r=7),r},Ve=function(o){return(String(o).match(Oe)||[""]).pop().replace(Re,"").replace(/GMT\+0000/g,"UTC")};const We=v("h5",{style:{"text-align":"center"}},"Please wait...",-1),$e=v("h5",{style:{"text-align":"center"}},"Please wait...",-1),Ee={class:"confirmation-content d-flex justify-content-start align-items-center mt-3 ml-3"},Je=v("i",{class:"mr-3 pi pi-exclamation-triangle text-red-600",style:{"font-size":"2rem"}},null,-1),je={class:"w-full d-flex justify-content-start align-items-center mt-4 pl-3",style:{"margin-bottom":"-12px"}},ze={class:"confirmation-content"},Be=v("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Ie={class:"flex"},Ye={key:0,if:"",class:"p-2 text-semibold rounded-full bg-blue-900 w-3 text-white"},Ze=["src"],Ge={key:0},qe={key:1},Ke={key:1},Qe={key:0},Xe={__name:"LeaveApproval",setup(n){let o=k(),r=k(!1),m=k(!1),w=k(),a=k(!1);Ne(),oe();const p=k(),M=k({global:{value:null,matchMode:E.CONTAINS},employee_name:{value:null,matchMode:E.STARTS_WITH,matchMode:E.EQUALS,matchMode:E.CONTAINS},status:{value:"Pending",matchMode:E.EQUALS}}),y=k(!0),S=k(["Pending","Approved","Rejected"]),c=k(),N=u=>{c.value.toggle(u)};let D=null,H=null;const T=se({review_comment:""});ie(()=>{O()});function O(){let u=window.location.origin+"/fetch-leaverequests-based-on-currentrole";Z.get(u).then(d=>{o.value=d.data.data,y.value=!1})}function U(u){return isNaN(Date.parse(u))?"Invalid date":G(u,"dd-mm-yyyy, h:MM TT")}function R(u,d){m.value=!1,r.value=!0,D=d,H=u,console.log("Selected Row Data : "+JSON.stringify(u))}function e(u){r.value=!1,u&&V()}function V(){D="",H=null}function j(){console.log(T.review_comment),e(!1),a.value=!0,Z.post(window.location.origin+"/attendance-approve-rejectleave",{record_id:H.id,status:D=="Approve"?"Approved":D=="Reject"?"Rejected":D,review_comment:T.review_comment}).then(u=>{if(console.log(u),V(),a.value=!1,u.data.status=="success")O();else if(u.data.status=="failure"){m.value=!0,w.value=u.data.message;return}}).catch(u=>{a.value=!1,V(),console.log(u.toJSON())})}const x=u=>{switch(u){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};return(u,d)=>{const Q=b("Toast"),B=b("ProgressSpinner"),J=b("Dialog"),X=b("Textarea"),W=b("Button"),ee=b("InputText"),C=b("Column"),te=b("OverlayPanel"),ae=b("Tag"),ne=b("Dropdown"),re=b("DataTable");return A(),P("div",null,[s(Q),s(J,{header:"Header",visible:y.value,"onUpdate:visible":d[0]||(d[0]=t=>y.value=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:i(()=>[s(B,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:i(()=>[We]),_:1},8,["visible"]),s(J,{header:"Header",visible:L(a),"onUpdate:visible":d[1]||(d[1]=t=>z(a)?a.value=t:a=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:i(()=>[s(B,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:i(()=>[$e]),_:1},8,["visible"]),s(J,{header:"Confirmation",visible:L(r),"onUpdate:visible":d[5]||(d[5]=t=>z(r)?r.value=t:r=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"450px"},modal:!0},{footer:i(()=>[s(W,{label:"Yes",icon:"pi pi-check",onClick:d[3]||(d[3]=t=>j()),class:"p-button-text",autofocus:""}),s(W,{label:"No",icon:"pi pi-times",onClick:d[4]||(d[4]=t=>e(!0)),class:"p-button-text"})]),default:i(()=>[v("div",Ee,[Je,v("span",null,"Are you sure you want to "+_(L(D))+"?",1)]),v("div",je,[L(D)=="Reject"?(A(),le(X,{key:0,name:"",id:"",modelValue:p.value,"onUpdate:modelValue":d[2]||(d[2]=t=>p.value=t),class:"border p-2 rounded",cols:"45",rows:"4",autoResize:"",placeholder:"Add Comment"},null,8,["modelValue"])):I("",!0),F(" "+_(p.value),1)])]),_:1},8,["visible"]),s(J,{header:"Error",visible:L(m),"onUpdate:visible":d[6]||(d[6]=t=>z(m)?m.value=t:m=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:i(()=>[s(W,{label:"Ok",icon:"pi pi-check",autofocus:""})]),default:i(()=>[v("div",ze,[Be,v("span",null,"Error while processing the request : "+_(L(w)),1)])]),_:1},8,["visible"]),v("div",null,[s(re,{value:L(o),paginator:!0,rows:10,dataKey:"id",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",sortField:"leaverequest_date",sortOrder:-1,filters:M.value,"onUpdate:filters":d[7]||(d[7]=t=>M.value=t),filterDisplay:"menu",loading:u.loading2,globalFilterFields:["name","status"],style:{"white-space":"nowrap"}},{empty:i(()=>[F(" No Employee found ")]),loading:i(()=>[F(" Loading customers data. Please wait. ")]),default:i(()=>[s(C,{class:"font-bold",field:"employee_name",header:"Employee Name",style:{"min-width":"18em"}},{body:i(t=>[v("div",Ie,[JSON.parse(t.data.employee_avatar).type=="shortname"?(A(),P("p",Ye,_(JSON.parse(t.data.employee_avatar).data),1)):(A(),P("img",{key:1,class:"rounded-circle img-md w-3 userActive-status profile-img",src:`data:image/png;base64,${JSON.parse(t.data.employee_avatar).data}`,srcset:"",alt:""},null,8,Ze)),v("p",null,_(t.data.employee_name),1)])]),filter:i(({filterModel:t,filterCallback:$})=>[s(ee,{modelValue:t.value,"onUpdate:modelValue":g=>t.value=g,onInput:g=>$(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),s(C,{field:"leaverequest_date",header:"Date",sortable:!0},{body:i(t=>[F(_(L(G)(t.data.leaverequest_date,"dd-mm-yyyy, h:MM TT")),1)]),_:1}),s(C,{field:"leave_type",header:"Leave Type"}),s(C,{field:"start_date",header:"Start Time"},{body:i(t=>[F(_(U(t.data.start_date)),1)]),_:1}),s(C,{field:"end_date",header:"End Time"},{body:i(t=>[F(_(U(t.data.end_date))+" ",1)]),_:1}),s(C,{field:"leave_reason",header:"Leave Reason",style:{"min-width":"25em","white-space":"pre-wrap"}},{body:i(t=>[t.data.leave_reason.length>80?(A(),P("div",Ge,[v("p",{onClick:N,class:"font-medium text-orange-400 underline cursor-pointer"},"explore more... "),s(te,{ref_key:"overlayPanel",ref:c,style:{height:"80px"}},{default:i(()=>[F(_(t.data.leave_reason),1)]),_:2},1536)])):(A(),P("div",qe,_(t.data.leave_reason),1))]),_:1}),s(C,{field:"reviewer_name",header:"Approver Name"}),s(C,{field:"reviewer_comments",header:"Approver Comments"}),s(C,{field:"status",header:"Status",icon:"pi pi-check"},{body:i(({data:t})=>[s(ae,{value:t.status,severity:x(t.status)},null,8,["value","severity"])]),filter:i(({filterModel:t,filterCallback:$})=>[s(ne,{modelValue:t.value,"onUpdate:modelValue":g=>t.value=g,onChange:g=>$(),options:S.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:i(g=>[g.value?(A(),P("span",{key:0,class:Y("customer-badge status-"+g.value)},_(g.value),3)):(A(),P("span",Ke,_(g.placeholder),1))]),option:i(g=>[v("span",{class:Y("customer-badge status-"+g.option)},_(g.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),s(C,{style:{width:"300px"},field:"",header:"Action"},{body:i(t=>[t.data.status=="Pending"?(A(),P("span",Qe,[s(W,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:$=>R(t.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),s(W,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2em"},onClick:$=>R(t.data,"Reject")},null,8,["onClick"])])):I("",!0)]),_:1})]),_:1},8,["value","filters","loading"])])])}}},l=ue(Xe);l.use(de,{ripple:!0});l.use(xe);l.use(me);l.use(Se);l.directive("tooltip",we);l.directive("badge",De);l.directive("ripple",ce);l.directive("styleclass",Te);l.directive("focustrap",pe);l.component("Button",ye);l.component("DataTable",be);l.component("Column",Me);l.component("ColumnGroup",Ae);l.component("Row",ke);l.component("Toast",fe);l.component("ConfirmDialog",ve);l.component("Dropdown",ge);l.component("InputText",_e);l.component("Dialog",he);l.component("ProgressSpinner",Ce);l.component("Tag",He);l.component("OverlayPanel",Pe);l.mount("#VJS_LeaveApproval");
