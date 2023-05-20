import{H as C,ai as te,a4 as ae,I as ne,c as R,h as i,w as u,a3 as P,a9 as I,e as b,_ as V,g as N,o as F,t as M,k as L,n as B,a as re,J as oe,P as se,K as ie,L as le,R as ue,u as de,v as ce,V as me,M as pe,Q as ye,A as fe,N as ve,S as ge}from"./toastservice.esm-1e19bead.js";import{T as he,B as _e,S as De,b as Te,a as we}from"./styleclass.esm-fce48f9f.js";import"./blockui.esm-2f48c23f.js";import{D as Me}from"./dialogservice.esm-341570db.js";import{s as be}from"./row.esm-6ebc942e.js";import{s as Se}from"./columngroup.esm-9dd1458e.js";import{s as Ne}from"./tag.esm-f22ea366.js";import{s as Ce}from"./overlaypanel.esm-f5d57035.js";import{a as J}from"./index-f7a317fc.js";var xe=/d{1,4}|D{3,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|W{1,2}|[LlopSZN]|"[^"]*"|'[^']*'/g,ke=/\b(?:[A-Z]{1,3}[A-Z][TC])(?:[-+]\d{4})?|((?:Australian )?(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time)\b/g,Ae=/[^-+\dA-Z]/g;function j(n,o,r,c){if(arguments.length===1&&typeof n=="string"&&!/\d/.test(n)&&(o=n,n=void 0),n=n||n===0?n:new Date,n instanceof Date||(n=new Date(n)),isNaN(n))throw TypeError("Invalid date");o=String(Y[o]||o||Y.default);var h=o.slice(0,4);(h==="UTC:"||h==="GMT:")&&(o=o.slice(4),r=!0,h==="GMT:"&&(c=!0));var a=function(){return r?"getUTC":"get"},f=function(){return n[a()+"Date"]()},D=function(){return n[a()+"Day"]()},_=function(){return n[a()+"Month"]()},T=function(){return n[a()+"FullYear"]()},m=function(){return n[a()+"Hours"]()},p=function(){return n[a()+"Minutes"]()},x=function(){return n[a()+"Seconds"]()},A=function(){return n[a()+"Milliseconds"]()},w=function(){return r?0:n.getTimezoneOffset()},H=function(){return He(n)},O=function(){return Pe(n)},k={d:function(){return f()},dd:function(){return g(f())},ddd:function(){return y.dayNames[D()]},DDD:function(){return Z({y:T(),m:_(),d:f(),_:a(),dayName:y.dayNames[D()],short:!0})},dddd:function(){return y.dayNames[D()+7]},DDDD:function(){return Z({y:T(),m:_(),d:f(),_:a(),dayName:y.dayNames[D()+7]})},m:function(){return _()+1},mm:function(){return g(_()+1)},mmm:function(){return y.monthNames[_()]},mmmm:function(){return y.monthNames[_()+12]},yy:function(){return String(T()).slice(2)},yyyy:function(){return g(T(),4)},h:function(){return m()%12||12},hh:function(){return g(m()%12||12)},H:function(){return m()},HH:function(){return g(m())},M:function(){return p()},MM:function(){return g(p())},s:function(){return x()},ss:function(){return g(x())},l:function(){return g(A(),3)},L:function(){return g(Math.floor(A()/10))},t:function(){return m()<12?y.timeNames[0]:y.timeNames[1]},tt:function(){return m()<12?y.timeNames[2]:y.timeNames[3]},T:function(){return m()<12?y.timeNames[4]:y.timeNames[5]},TT:function(){return m()<12?y.timeNames[6]:y.timeNames[7]},Z:function(){return c?"GMT":r?"UTC":Le(n)},o:function(){return(w()>0?"-":"+")+g(Math.floor(Math.abs(w())/60)*100+Math.abs(w())%60,4)},p:function(){return(w()>0?"-":"+")+g(Math.floor(Math.abs(w())/60),2)+":"+g(Math.floor(Math.abs(w())%60),2)},S:function(){return["th","st","nd","rd"][f()%10>3?0:(f()%100-f()%10!=10)*f()%10]},W:function(){return H()},WW:function(){return g(H())},N:function(){return O()}};return o.replace(xe,function(e){return e in k?k[e]():e.slice(1,e.length-1)})}var Y={default:"ddd mmm dd yyyy HH:MM:ss",shortDate:"m/d/yy",paddedShortDate:"mm/dd/yyyy",mediumDate:"mmm d, yyyy",longDate:"mmmm d, yyyy",fullDate:"dddd, mmmm d, yyyy",shortTime:"h:MM TT",mediumTime:"h:MM:ss TT",longTime:"h:MM:ss TT Z",isoDate:"yyyy-mm-dd",isoTime:"HH:MM:ss",isoDateTime:"yyyy-mm-dd'T'HH:MM:sso",isoUtcDateTime:"UTC:yyyy-mm-dd'T'HH:MM:ss'Z'",expiresHeaderFormat:"ddd, dd mmm yyyy HH:MM:ss Z"},y={dayNames:["Sun","Mon","Tue","Wed","Thu","Fri","Sat","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],monthNames:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec","January","February","March","April","May","June","July","August","September","October","November","December"],timeNames:["a","p","am","pm","A","P","AM","PM"]},g=function(o){var r=arguments.length>1&&arguments[1]!==void 0?arguments[1]:2;return String(o).padStart(r,"0")},Z=function(o){var r=o.y,c=o.m,h=o.d,a=o._,f=o.dayName,D=o.short,_=D===void 0?!1:D,T=new Date,m=new Date;m.setDate(m[a+"Date"]()-1);var p=new Date;p.setDate(p[a+"Date"]()+1);var x=function(){return T[a+"Date"]()},A=function(){return T[a+"Month"]()},w=function(){return T[a+"FullYear"]()},H=function(){return m[a+"Date"]()},O=function(){return m[a+"Month"]()},k=function(){return m[a+"FullYear"]()},e=function(){return p[a+"Date"]()},E=function(){return p[a+"Month"]()},l=function(){return p[a+"FullYear"]()};return w()===r&&A()===c&&x()===h?_?"Tdy":"Today":k()===r&&O()===c&&H()===h?_?"Ysd":"Yesterday":l()===r&&E()===c&&e()===h?_?"Tmw":"Tomorrow":f},He=function(o){var r=new Date(o.getFullYear(),o.getMonth(),o.getDate());r.setDate(r.getDate()-(r.getDay()+6)%7+3);var c=new Date(r.getFullYear(),0,4);c.setDate(c.getDate()-(c.getDay()+6)%7+3);var h=r.getTimezoneOffset()-c.getTimezoneOffset();r.setHours(r.getHours()-h);var a=(r-c)/(864e5*7);return 1+Math.floor(a)},Pe=function(o){var r=o.getDay();return r===0&&(r=7),r},Le=function(o){return(String(o).match(ke)||[""]).pop().replace(Ae,"").replace(/GMT\+0000/g,"UTC")};const Oe=b("h5",{style:{"text-align":"center"}},"Please wait...",-1),Re=b("h5",{style:{"text-align":"center"}},"Please wait...",-1),Fe={class:"confirmation-content"},We=b("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Ue={class:"confirmation-content"},Ve=b("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),$e={key:0},Ee={key:1},Ie={key:1},ze={key:0},Be={__name:"LeaveApproval",setup(n){let o=C(),r=C(!1),c=C(!1),h=C(),a=C(!1);te(),ae();const f=C({global:{value:null,matchMode:V.CONTAINS},employee_name:{value:null,matchMode:V.STARTS_WITH,matchMode:V.EQUALS,matchMode:V.CONTAINS},status:{value:"Pending",matchMode:V.EQUALS}}),D=C(!0),_=C(["Pending","Approved","Rejected"]),T=C(),m=l=>{T.value.toggle(l)};let p=null,x=null;ne(()=>{A()});function A(){let l=window.location.origin+"/fetch-leaverequests-based-on-currentrole";J.get(l).then(s=>{o.value=s.data.data,D.value=!1})}function w(l){return isNaN(Date.parse(l))?"Invalid date":j(l,"dd-mm-yyyy, h:MM TT")}function H(l,s){c.value=!1,r.value=!0,p=s,x=l,console.log("Selected Row Data : "+JSON.stringify(l))}function O(l){r.value=!1,l&&k()}function k(){p="",x=null}function e(){O(!1),a.value=!0,J.post(window.location.origin+"/attendance-approve-rejectleave",{record_id:x.id,status:p=="Approve"?"Approved":p=="Reject"?"Rejected":p,review_comment:""}).then(l=>{if(console.log(l),k(),a.value=!1,l.data.status=="success")A();else if(l.data.status=="failure"){c.value=!0,h.value=l.data.message;return}}).catch(l=>{a.value=!1,k(),console.log(l.toJSON())})}const E=l=>{switch(l){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};return(l,s)=>{const G=N("Toast"),z=N("ProgressSpinner"),$=N("Dialog"),W=N("Button"),q=N("InputText"),S=N("Column"),Q=N("OverlayPanel"),K=N("Tag"),X=N("Dropdown"),ee=N("DataTable");return F(),R("div",null,[i(G),i($,{header:"Header",visible:D.value,"onUpdate:visible":s[0]||(s[0]=t=>D.value=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:u(()=>[i(z,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:u(()=>[Oe]),_:1},8,["visible"]),i($,{header:"Header",visible:P(a),"onUpdate:visible":s[1]||(s[1]=t=>I(a)?a.value=t:a=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:u(()=>[i(z,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:u(()=>[Re]),_:1},8,["visible"]),i($,{header:"Confirmation",visible:P(r),"onUpdate:visible":s[4]||(s[4]=t=>I(r)?r.value=t:r=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:u(()=>[i(W,{label:"Yes",icon:"pi pi-check",onClick:s[2]||(s[2]=t=>e()),class:"p-button-text",autofocus:""}),i(W,{label:"No",icon:"pi pi-times",onClick:s[3]||(s[3]=t=>O(!0)),class:"p-button-text"})]),default:u(()=>[b("div",Fe,[We,b("span",null,"Are you sure you want to "+M(P(p))+"?",1)])]),_:1},8,["visible"]),i($,{header:"Error",visible:P(c),"onUpdate:visible":s[5]||(s[5]=t=>I(c)?c.value=t:c=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:u(()=>[i(W,{label:"Ok",icon:"pi pi-check",autofocus:""})]),default:u(()=>[b("div",Ue,[Ve,b("span",null,"Error while processing the request : "+M(P(h)),1)])]),_:1},8,["visible"]),b("div",null,[i(ee,{value:P(o),paginator:!0,rows:10,dataKey:"id",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",sortField:"leaverequest_date",sortOrder:-1,filters:f.value,"onUpdate:filters":s[6]||(s[6]=t=>f.value=t),filterDisplay:"menu",loading:l.loading2,globalFilterFields:["name","status"],style:{"white-space":"nowrap"}},{empty:u(()=>[L(" No Employee found ")]),loading:u(()=>[L(" Loading customers data. Please wait. ")]),default:u(()=>[i(S,{class:"font-bold",field:"employee_name",header:"Employee Name",style:{"min-width":"18em"}},{body:u(t=>[L(M(t.data.employee_name),1)]),filter:u(({filterModel:t,filterCallback:U})=>[i(q,{modelValue:t.value,"onUpdate:modelValue":v=>t.value=v,onInput:v=>U(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),i(S,{field:"leaverequest_date",header:"Date",sortable:!0},{body:u(t=>[L(M(P(j)(t.data.leaverequest_date,"dd-mm-yyyy, h:MM TT")),1)]),_:1}),i(S,{field:"leave_type",header:"Leave Type"}),i(S,{field:"start_date",header:"Start Time"},{body:u(t=>[L(M(w(t.data.start_date)),1)]),_:1}),i(S,{field:"end_date",header:"End Time"},{body:u(t=>[L(M(w(t.data.end_date))+" ",1)]),_:1}),i(S,{field:"leave_reason",header:"Leave Reason",style:{"min-width":"25em","white-space":"pre-wrap"}},{body:u(t=>[t.data.leave_reason.length>80?(F(),R("div",$e,[b("p",{onClick:m,class:"font-medium text-orange-400 underline cursor-pointer"},"explore more... "),i(Q,{ref_key:"overlayPanel",ref:T,style:{height:"80px"}},{default:u(()=>[L(M(t.data.leave_reason),1)]),_:2},1536)])):(F(),R("div",Ee,M(t.data.leave_reason),1))]),_:1}),i(S,{field:"reviewer_name",header:"Approver Name"}),i(S,{field:"reviewer_comments",header:"Approver Comments"}),i(S,{field:"status",header:"Status",icon:"pi pi-check"},{body:u(({data:t})=>[i(K,{value:t.status,severity:E(t.status)},null,8,["value","severity"])]),filter:u(({filterModel:t,filterCallback:U})=>[i(X,{modelValue:t.value,"onUpdate:modelValue":v=>t.value=v,onChange:v=>U(),options:_.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:u(v=>[v.value?(F(),R("span",{key:0,class:B("customer-badge status-"+v.value)},M(v.value),3)):(F(),R("span",Ie,M(v.placeholder),1))]),option:u(v=>[b("span",{class:B("customer-badge status-"+v.option)},M(v.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),i(S,{style:{width:"300px"},field:"",header:"Action"},{body:u(t=>[t.data.status=="Pending"?(F(),R("span",ze,[i(W,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:U=>H(t.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),i(W,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2em"},onClick:U=>H(t.data,"Reject")},null,8,["onClick"])])):re("",!0)]),_:1})]),_:1},8,["value","filters","loading"])])])}}},d=oe(Be);d.use(se,{ripple:!0});d.use(ie);d.use(le);d.use(Me);d.directive("tooltip",he);d.directive("badge",_e);d.directive("ripple",ue);d.directive("styleclass",De);d.directive("focustrap",de);d.component("Button",ce);d.component("DataTable",Te);d.component("Column",we);d.component("ColumnGroup",Se);d.component("Row",be);d.component("Toast",me);d.component("ConfirmDialog",pe);d.component("Dropdown",ye);d.component("InputText",fe);d.component("Dialog",ve);d.component("ProgressSpinner",ge);d.component("Tag",Ne);d.component("OverlayPanel",Ce);d.mount("#VJS_LeaveApproval");
