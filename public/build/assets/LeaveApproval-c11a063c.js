/* empty css              */import{$ as k,ag as se,av as j,a2 as ie,aj as le,o as A,c as H,h as o,w as i,ai as L,a3 as z,d as f,t as w,b as ue,a as B,l as R,n as I,g as N,H as de,P as ce,I as me,u as pe,J as ye,R as fe,S as ve,x as ge,y as he,M as _e,K as we,X as De,L as Te,Q as be,W as Me,N as Se}from"./toastservice.esm-5497698c.js";import"./blockui.esm-221ce14c.js";import{D as Ne,s as xe}from"./dialogservice.esm-ab849a93.js";import{u as Ce,C as ke}from"./confirmationservice.esm-712df8af.js";import{s as Ae}from"./progressspinner.esm-b55e6b3f.js";import{s as He}from"./row.esm-6ebc942e.js";import{s as Le}from"./tag.esm-27e929eb.js";import{s as Pe}from"./overlaypanel.esm-04999088.js";import{a as Z}from"./index-362795f3.js";import{S as Oe}from"./Service-1f419817.js";import"./pinia-61b2fb76.js";var Re=/d{1,4}|D{3,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|W{1,2}|[LlopSZN]|"[^"]*"|'[^']*'/g,We=/\b(?:[A-Z]{1,3}[A-Z][TC])(?:[-+]\d{4})?|((?:Australian )?(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time)\b/g,Fe=/[^-+\dA-Z]/g;function G(a,n,s,c){if(arguments.length===1&&typeof a=="string"&&!/\d/.test(a)&&(n=a,a=void 0),a=a||a===0?a:new Date,a instanceof Date||(a=new Date(a)),isNaN(a))throw TypeError("Invalid date");n=String(q[n]||n||q.default);var p=n.slice(0,4);(p==="UTC:"||p==="GMT:")&&(n=n.slice(4),s=!0,p==="GMT:"&&(c=!0));var r=function(){return s?"getUTC":"get"},m=function(){return a[r()+"Date"]()},M=function(){return a[r()+"Day"]()},g=function(){return a[r()+"Month"]()},h=function(){return a[r()+"FullYear"]()},y=function(){return a[r()+"Hours"]()},S=function(){return a[r()+"Minutes"]()},W=function(){return a[r()+"Seconds"]()},T=function(){return a[r()+"Milliseconds"]()},b=function(){return s?0:a.getTimezoneOffset()},P=function(){return Ue(a)},F=function(){return Ve(a)},O={d:function(){return m()},dd:function(){return D(m())},ddd:function(){return v.dayNames[M()]},DDD:function(){return Q({y:h(),m:g(),d:m(),_:r(),dayName:v.dayNames[M()],short:!0})},dddd:function(){return v.dayNames[M()+7]},DDDD:function(){return Q({y:h(),m:g(),d:m(),_:r(),dayName:v.dayNames[M()+7]})},m:function(){return g()+1},mm:function(){return D(g()+1)},mmm:function(){return v.monthNames[g()]},mmmm:function(){return v.monthNames[g()+12]},yy:function(){return String(h()).slice(2)},yyyy:function(){return D(h(),4)},h:function(){return y()%12||12},hh:function(){return D(y()%12||12)},H:function(){return y()},HH:function(){return D(y())},M:function(){return S()},MM:function(){return D(S())},s:function(){return W()},ss:function(){return D(W())},l:function(){return D(T(),3)},L:function(){return D(Math.floor(T()/10))},t:function(){return y()<12?v.timeNames[0]:v.timeNames[1]},tt:function(){return y()<12?v.timeNames[2]:v.timeNames[3]},T:function(){return y()<12?v.timeNames[4]:v.timeNames[5]},TT:function(){return y()<12?v.timeNames[6]:v.timeNames[7]},Z:function(){return c?"GMT":s?"UTC":$e(a)},o:function(){return(b()>0?"-":"+")+D(Math.floor(Math.abs(b())/60)*100+Math.abs(b())%60,4)},p:function(){return(b()>0?"-":"+")+D(Math.floor(Math.abs(b())/60),2)+":"+D(Math.floor(Math.abs(b())%60),2)},S:function(){return["th","st","nd","rd"][m()%10>3?0:(m()%100-m()%10!=10)*m()%10]},W:function(){return P()},WW:function(){return D(P())},N:function(){return F()}};return n.replace(Re,function(e){return e in O?O[e]():e.slice(1,e.length-1)})}var q={default:"ddd mmm dd yyyy HH:MM:ss",shortDate:"m/d/yy",paddedShortDate:"mm/dd/yyyy",mediumDate:"mmm d, yyyy",longDate:"mmmm d, yyyy",fullDate:"dddd, mmmm d, yyyy",shortTime:"h:MM TT",mediumTime:"h:MM:ss TT",longTime:"h:MM:ss TT Z",isoDate:"yyyy-mm-dd",isoTime:"HH:MM:ss",isoDateTime:"yyyy-mm-dd'T'HH:MM:sso",isoUtcDateTime:"UTC:yyyy-mm-dd'T'HH:MM:ss'Z'",expiresHeaderFormat:"ddd, dd mmm yyyy HH:MM:ss Z"},v={dayNames:["Sun","Mon","Tue","Wed","Thu","Fri","Sat","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],monthNames:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec","January","February","March","April","May","June","July","August","September","October","November","December"],timeNames:["a","p","am","pm","A","P","AM","PM"]},D=function(n){var s=arguments.length>1&&arguments[1]!==void 0?arguments[1]:2;return String(n).padStart(s,"0")},Q=function(n){var s=n.y,c=n.m,p=n.d,r=n._,m=n.dayName,M=n.short,g=M===void 0?!1:M,h=new Date,y=new Date;y.setDate(y[r+"Date"]()-1);var S=new Date;S.setDate(S[r+"Date"]()+1);var W=function(){return h[r+"Date"]()},T=function(){return h[r+"Month"]()},b=function(){return h[r+"FullYear"]()},P=function(){return y[r+"Date"]()},F=function(){return y[r+"Month"]()},O=function(){return y[r+"FullYear"]()},e=function(){return S[r+"Date"]()},E=function(){return S[r+"Month"]()},U=function(){return S[r+"FullYear"]()};return b()===s&&T()===c&&W()===p?g?"Tdy":"Today":O()===s&&F()===c&&P()===p?g?"Ysd":"Yesterday":U()===s&&E()===c&&e()===p?g?"Tmw":"Tomorrow":m},Ue=function(n){var s=new Date(n.getFullYear(),n.getMonth(),n.getDate());s.setDate(s.getDate()-(s.getDay()+6)%7+3);var c=new Date(s.getFullYear(),0,4);c.setDate(c.getDate()-(c.getDay()+6)%7+3);var p=s.getTimezoneOffset()-c.getTimezoneOffset();s.setHours(s.getHours()-p);var r=(s-c)/(864e5*7);return 1+Math.floor(r)},Ve=function(n){var s=n.getDay();return s===0&&(s=7),s},$e=function(n){return(String(n).match(We)||[""]).pop().replace(Fe,"").replace(/GMT\+0000/g,"UTC")};const je=f("h5",{style:{"text-align":"center"}},"Please wait...",-1),Ee=f("h5",{style:{"text-align":"center"}},"Please wait...",-1),Je={class:"confirmation-content d-flex justify-content-start align-items-center mt-3 ml-3"},ze=f("i",{class:"mr-3 pi pi-exclamation-triangle text-red-600",style:{"font-size":"2rem"}},null,-1),Be={class:"w-full d-flex justify-content-start align-items-center mt-4 pl-3",style:{"margin-bottom":"-12px"}},Ie={class:"confirmation-content"},Ye=f("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Ze={class:"flex justify-center items-center"},Ge=["src"],qe={class:"text-left pl-2 font-semibold fs-6"},Qe={key:0},Ke=f("div",null,null,-1),Xe={key:0},et={key:1},tt={key:1},at={key:0},nt={__name:"LeaveApproval",setup(a){const n=Oe();let s=k(),c=k(!1),p=k(!1),r=k(),m=k(!1);Ce(),se();const M=k(),g=k({global:{value:null,matchMode:j.CONTAINS},employee_name:{value:null,matchMode:j.STARTS_WITH,matchMode:j.EQUALS,matchMode:j.CONTAINS},status:{value:"Pending",matchMode:j.EQUALS}}),h=k(!1),y=k(["Pending","Approved","Rejected"]),S=k(),W=u=>{S.value.toggle(u)};let T=null,b=null;const P=ie({review_comment:""});le(()=>{F()});function F(){h.value=!0;let u=window.location.origin+"/fetch-leaverequests-based-on-currentrole";Z.get(u).then(d=>{s.value=d.data.data}).finally(()=>{h.value=!1})}function O(u){return isNaN(Date.parse(u))?"Invalid date":G(u,"dd-mm-yyyy, h:MM TT")}function e(u,d){p.value=!1,c.value=!0,T=d,b=u,console.log("Selected Row Data : "+JSON.stringify(u))}function E(u){c.value=!1,u&&U()}function U(){T="",b=null}function x(){console.log(P.review_comment),E(!1),m.value=!0,Z.post(window.location.origin+"/attendance-approve-rejectleave",{record_id:b.id,status:T=="Approve"?"Approved":T=="Reject"?"Rejected":T,review_comment:P.review_comment}).then(u=>{if(console.log(u),U(),u.data.status=="success")F();else if(u.data.status=="failure"){p.value=!0,r.value=u.data.message;return}}).catch(u=>{m.value=!1,U(),console.log(u.toJSON())}).finally(()=>{m.value=!1})}const K=u=>{switch(u){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};return(u,d)=>{const X=N("Toast"),Y=N("ProgressSpinner"),J=N("Dialog"),ee=N("Textarea"),V=N("Button"),te=N("InputText"),C=N("Column"),ae=N("OverlayPanel"),ne=N("Tag"),re=N("Dropdown"),oe=N("DataTable");return A(),H("div",null,[o(X),o(J,{header:"Header",visible:h.value,"onUpdate:visible":d[0]||(d[0]=t=>h.value=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:i(()=>[o(Y,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:i(()=>[je]),_:1},8,["visible"]),o(J,{header:"Header",visible:L(m),"onUpdate:visible":d[1]||(d[1]=t=>z(m)?m.value=t:m=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:i(()=>[o(Y,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:i(()=>[Ee]),_:1},8,["visible"]),o(J,{header:"Confirmation",visible:L(c),"onUpdate:visible":d[5]||(d[5]=t=>z(c)?c.value=t:c=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"450px"},modal:!0},{footer:i(()=>[o(V,{label:"Yes",icon:"pi pi-check",onClick:d[3]||(d[3]=t=>x()),class:"p-button-text",autofocus:""}),o(V,{label:"No",icon:"pi pi-times",onClick:d[4]||(d[4]=t=>E(!0)),class:"p-button-text"})]),default:i(()=>[f("div",Je,[ze,f("span",null,"Are you sure you want to "+w(L(T))+"?",1)]),f("div",Be,[L(T)=="Reject"?(A(),ue(ee,{key:0,name:"",id:"",modelValue:M.value,"onUpdate:modelValue":d[2]||(d[2]=t=>M.value=t),class:"border p-2 rounded",cols:"45",rows:"4",autoResize:"",placeholder:"Add Comment"},null,8,["modelValue"])):B("",!0),R(" "+w(M.value),1)])]),_:1},8,["visible"]),o(J,{header:"Error",visible:L(p),"onUpdate:visible":d[6]||(d[6]=t=>z(p)?p.value=t:p=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:i(()=>[o(V,{label:"Ok",icon:"pi pi-check",autofocus:""})]),default:i(()=>[f("div",Ie,[Ye,f("span",null,"Error while processing the request : "+w(L(r)),1)])]),_:1},8,["visible"]),f("div",null,[o(oe,{value:L(s),paginator:!0,rows:10,dataKey:"id",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",sortField:"leaverequest_date",sortOrder:-1,filters:g.value,"onUpdate:filters":d[7]||(d[7]=t=>g.value=t),filterDisplay:"menu",globalFilterFields:["name","status"],style:{"white-space":"nowrap"}},{empty:i(()=>[R(" No Employee found ")]),loading:i(()=>[R(" Loading customers data. Please wait. ")]),default:i(()=>[o(C,{class:"font-bold",field:"employee_name",header:"Employee Name",style:{"min-width":"18em"}},{body:i(t=>[f("div",Ze,[JSON.parse(t.data.employee_avatar).type=="shortname"?(A(),H("p",{key:0,class:I(["p-2 w-11 fs-6 font-semibold rounded-full text-white",L(n).getBackgroundColor(t.index)])},w(JSON.parse(t.data.employee_avatar).data),3)):(A(),H("img",{key:1,class:"rounded-circle img-md w-10 userActive-status profile-img",style:{height:"30px !important"},src:`data:image/png;base64,${JSON.parse(t.data.employee_avatar).data}`,srcset:"",alt:""},null,8,Ge)),f("p",qe,w(t.data.employee_name),1)])]),filter:i(({filterModel:t,filterCallback:$})=>[o(te,{modelValue:t.value,"onUpdate:modelValue":_=>t.value=_,onInput:_=>$(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),o(C,{field:"leaverequest_date",header:"Date",sortable:!0},{body:i(t=>[R(w(L(G)(t.data.leaverequest_date,"dd-mm-yyyy, h:MM TT")),1)]),_:1}),o(C,{field:"leave_type",header:"Leave Type"},{body:i(t=>[t.data.leave_type=="Casual/Sick Leave"?(A(),H("h1",Qe," SL/CL ")):B("",!0),Ke]),_:1}),o(C,{field:"start_date",header:"Start Time"},{body:i(t=>[R(w(O(t.data.start_date)),1)]),_:1}),o(C,{field:"end_date",header:"End Time"},{body:i(t=>[R(w(O(t.data.end_date))+" ",1)]),_:1}),o(C,{field:"leave_reason",header:"Leave Reason",style:{"min-width":"25em","white-space":"pre-wrap"}},{body:i(t=>[t.data.leave_reason.length>80?(A(),H("div",Xe,[f("p",{onClick:W,class:"font-medium text-orange-400 underline cursor-pointer"},"explore more... "),o(ae,{ref_key:"overlayPanel",ref:S,style:{height:"80px"}},{default:i(()=>[R(w(t.data.leave_reason),1)]),_:2},1536)])):(A(),H("div",et,w(t.data.leave_reason),1))]),_:1}),o(C,{field:"reviewer_name",header:"Approver Name"}),o(C,{field:"reviewer_comments",header:"Approver Comments"}),o(C,{field:"status",header:"Status",icon:"pi pi-check"},{body:i(({data:t})=>[o(ne,{value:t.status,severity:K(t.status)},null,8,["value","severity"])]),filter:i(({filterModel:t,filterCallback:$})=>[o(re,{modelValue:t.value,"onUpdate:modelValue":_=>t.value=_,onChange:_=>$(),options:y.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:i(_=>[_.value?(A(),H("span",{key:0,class:I("customer-badge status-"+_.value)},w(_.value),3)):(A(),H("span",tt,w(_.placeholder),1))]),option:i(_=>[f("span",{class:I("customer-badge status-"+_.option)},w(_.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),o(C,{style:{width:"300px"},field:"",header:"Action"},{body:i(t=>[t.data.status=="Pending"?(A(),H("span",at,[o(V,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:$=>e(t.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),o(V,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2em"},onClick:$=>e(t.data,"Reject")},null,8,["onClick"])])):B("",!0)]),_:1})]),_:1},8,["value","filters"])])])}}},l=de(nt);l.use(ce,{ripple:!0});l.use(ke);l.use(me);l.use(Ne);l.directive("tooltip",pe);l.directive("badge",ye);l.directive("ripple",fe);l.directive("styleclass",ve);l.directive("focustrap",ge);l.component("Button",he);l.component("DataTable",_e);l.component("Column",we);l.component("ColumnGroup",xe);l.component("Row",He);l.component("Toast",De);l.component("ConfirmDialog",Te);l.component("Dropdown",be);l.component("InputText",Me);l.component("Dialog",Se);l.component("ProgressSpinner",Ae);l.component("Tag",Le);l.component("OverlayPanel",Pe);l.mount("#VJS_LeaveApproval");
