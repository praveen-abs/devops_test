/* empty css              *//* empty css                     *//* empty css                   */import{Q as x,a7 as j,W as re,ab as se,o as k,c as R,aa as H,b as I,a as z,d as p,h as s,w as u,t as v,l as V,X as Y,n as B,F as ie,g as A,H as le,P as ue,R as ce,u as de,x as me,I as pe,K as ye,M as fe,J as ve}from"./inputnumber.esm-e362c3ab.js";import{u as ge,a as _e,T as he,B as Te,S as De,b as we,s as Me}from"./toastservice.esm-8d63d505.js";import"./blockui.esm-da95937b.js";import{a as be}from"./datatable.esm-5f85e77a.js";import{D as Se,s as Ne}from"./dialogservice.esm-acafdb8a.js";import{u as Ce,C as xe}from"./confirmationservice.esm-62abe3ae.js";import{s as ke}from"./progressspinner.esm-dd1a9f95.js";import{s as Ae}from"./row.esm-6ebc942e.js";import{s as He}from"./tag.esm-97cd34b7.js";import{s as Le}from"./overlaypanel.esm-e07df2f8.js";import{a as Z}from"./index-362795f3.js";import{S as Re}from"./Service-2af407d6.js";import{L as Fe}from"./LoadingSpinner-235e9bb4.js";import"./pinia-641035e3.js";/* empty css                                                                       */import"./_plugin-vue_export-helper-c27b6911.js";var Oe=/d{1,4}|D{3,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|W{1,2}|[LlopSZN]|"[^"]*"|'[^']*'/g,Ve=/\b(?:[A-Z]{1,3}[A-Z][TC])(?:[-+]\d{4})?|((?:Australian )?(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time)\b/g,$e=/[^-+\dA-Z]/g;function G(a,n,r,c){if(arguments.length===1&&typeof a=="string"&&!/\d/.test(a)&&(n=a,a=void 0),a=a||a===0?a:new Date,a instanceof Date||(a=new Date(a)),isNaN(a))throw TypeError("Invalid date");n=String(q[n]||n||q.default);var y=n.slice(0,4);(y==="UTC:"||y==="GMT:")&&(n=n.slice(4),r=!0,y==="GMT:"&&(c=!0));var o=function(){return r?"getUTC":"get"},d=function(){return a[o()+"Date"]()},w=function(){return a[o()+"Day"]()},_=function(){return a[o()+"Month"]()},b=function(){return a[o()+"FullYear"]()},m=function(){return a[o()+"Hours"]()},S=function(){return a[o()+"Minutes"]()},D=function(){return a[o()+"Seconds"]()},L=function(){return a[o()+"Milliseconds"]()},M=function(){return r?0:a.getTimezoneOffset()},F=function(){return Pe(a)},$=function(){return We(a)},O={d:function(){return d()},dd:function(){return T(d())},ddd:function(){return g.dayNames[w()]},DDD:function(){return Q({y:b(),m:_(),d:d(),_:o(),dayName:g.dayNames[w()],short:!0})},dddd:function(){return g.dayNames[w()+7]},DDDD:function(){return Q({y:b(),m:_(),d:d(),_:o(),dayName:g.dayNames[w()+7]})},m:function(){return _()+1},mm:function(){return T(_()+1)},mmm:function(){return g.monthNames[_()]},mmmm:function(){return g.monthNames[_()+12]},yy:function(){return String(b()).slice(2)},yyyy:function(){return T(b(),4)},h:function(){return m()%12||12},hh:function(){return T(m()%12||12)},H:function(){return m()},HH:function(){return T(m())},M:function(){return S()},MM:function(){return T(S())},s:function(){return D()},ss:function(){return T(D())},l:function(){return T(L(),3)},L:function(){return T(Math.floor(L()/10))},t:function(){return m()<12?g.timeNames[0]:g.timeNames[1]},tt:function(){return m()<12?g.timeNames[2]:g.timeNames[3]},T:function(){return m()<12?g.timeNames[4]:g.timeNames[5]},TT:function(){return m()<12?g.timeNames[6]:g.timeNames[7]},Z:function(){return c?"GMT":r?"UTC":Ue(a)},o:function(){return(M()>0?"-":"+")+T(Math.floor(Math.abs(M())/60)*100+Math.abs(M())%60,4)},p:function(){return(M()>0?"-":"+")+T(Math.floor(Math.abs(M())/60),2)+":"+T(Math.floor(Math.abs(M())%60),2)},S:function(){return["th","st","nd","rd"][d()%10>3?0:(d()%100-d()%10!=10)*d()%10]},W:function(){return F()},WW:function(){return T(F())},N:function(){return $()}};return n.replace(Oe,function(e){return e in O?O[e]():e.slice(1,e.length-1)})}var q={default:"ddd mmm dd yyyy HH:MM:ss",shortDate:"m/d/yy",paddedShortDate:"mm/dd/yyyy",mediumDate:"mmm d, yyyy",longDate:"mmmm d, yyyy",fullDate:"dddd, mmmm d, yyyy",shortTime:"h:MM TT",mediumTime:"h:MM:ss TT",longTime:"h:MM:ss TT Z",isoDate:"yyyy-mm-dd",isoTime:"HH:MM:ss",isoDateTime:"yyyy-mm-dd'T'HH:MM:sso",isoUtcDateTime:"UTC:yyyy-mm-dd'T'HH:MM:ss'Z'",expiresHeaderFormat:"ddd, dd mmm yyyy HH:MM:ss Z"},g={dayNames:["Sun","Mon","Tue","Wed","Thu","Fri","Sat","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],monthNames:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec","January","February","March","April","May","June","July","August","September","October","November","December"],timeNames:["a","p","am","pm","A","P","AM","PM"]},T=function(n){var r=arguments.length>1&&arguments[1]!==void 0?arguments[1]:2;return String(n).padStart(r,"0")},Q=function(n){var r=n.y,c=n.m,y=n.d,o=n._,d=n.dayName,w=n.short,_=w===void 0?!1:w,b=new Date,m=new Date;m.setDate(m[o+"Date"]()-1);var S=new Date;S.setDate(S[o+"Date"]()+1);var D=function(){return b[o+"Date"]()},L=function(){return b[o+"Month"]()},M=function(){return b[o+"FullYear"]()},F=function(){return m[o+"Date"]()},$=function(){return m[o+"Month"]()},O=function(){return m[o+"FullYear"]()},e=function(){return S[o+"Date"]()},P=function(){return S[o+"Month"]()},J=function(){return S[o+"FullYear"]()};return M()===r&&L()===c&&D()===y?_?"Tdy":"Today":O()===r&&$()===c&&F()===y?_?"Ysd":"Yesterday":J()===r&&P()===c&&e()===y?_?"Tmw":"Tomorrow":d},Pe=function(n){var r=new Date(n.getFullYear(),n.getMonth(),n.getDate());r.setDate(r.getDate()-(r.getDay()+6)%7+3);var c=new Date(r.getFullYear(),0,4);c.setDate(c.getDate()-(c.getDay()+6)%7+3);var y=r.getTimezoneOffset()-c.getTimezoneOffset();r.setHours(r.getHours()-y);var o=(r-c)/(864e5*7);return 1+Math.floor(o)},We=function(n){var r=n.getDay();return r===0&&(r=7),r},Ue=function(n){return(String(n).match(Ve)||[""]).pop().replace($e,"").replace(/GMT\+0000/g,"UTC")};const je={class:"w-full p-2 bg-white rounded-lg"},Je=p("div",{class:"col-sm-12 col-xxl-6 col-md-6 col-xl-6 col-lg-6"},[p("h6",{class:"my-2 text-lg font-semibold"},"Leave Approvals")],-1),ze={class:"mt-3 ml-3 confirmation-content d-flex justify-content-start align-items-center"},Be=p("i",{class:"mr-3 text-red-600 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Ee={class:"w-full pl-3 mt-4 d-flex justify-content-start align-items-center",style:{"margin-bottom":"-12px"}},Ie={class:"confirmation-content"},Ye=p("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Ze={class:"mt-3"},Ge={class:"flex items-center justify-center"},qe=["src"],Qe={class:"pl-2 font-semibold text-left fs-6"},Ke=p("div",null,null,-1),Xe={key:0},et={key:1},tt={key:1},at={key:0},nt={__name:"LeaveApproval",setup(a){const n=Re();let r=x(),c=x(!1),y=x(!1),o=x(),d=x(!1);Ce(),ge();const w=x(),_=x({global:{value:null,matchMode:j.CONTAINS},employee_name:{value:null,matchMode:j.STARTS_WITH,matchMode:j.EQUALS,matchMode:j.CONTAINS},status:{value:"Pending",matchMode:j.EQUALS}});x(!1);const b=x(["Pending","Approved","Rejected"]),m=x(),S=l=>{m.value.toggle(l)};let D=null,L=null;const M=re({review_comment:""});se(()=>{F()});function F(){d.value=!0;let l=window.location.origin+"/fetch-leaverequests-based-on-currentrole";Z.get(l).then(f=>{r.value=f.data.data}).finally(()=>{d.value=!1})}function $(l){return isNaN(Date.parse(l))?"Invalid date":G(l,"dd-mm-yyyy, h:MM TT")}function O(l,f){y.value=!1,c.value=!0,D=f,L=l,console.log("Selected Row Data : "+JSON.stringify(l))}function e(l){c.value=!1,l&&P()}function P(){D="",L=null}function J(){console.log(M.review_comment),e(!1),d.value=!0,Z.post(window.location.origin+"/attendance-approve-rejectleave",{record_id:L.id,status:D=="Approve"?"Approved":D=="Reject"?"Rejected":D,review_comment:M.review_comment}).then(l=>{if(console.log(l),P(),l.data.status=="success")F();else if(l.data.status=="failure"){y.value=!0,o.value=l.data.message;return}}).catch(l=>{d.value=!1,P(),console.log(l.toJSON())}).finally(()=>{d.value=!1})}const N=l=>{switch(l){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};return(l,f)=>{const K=A("Toast"),X=A("Textarea"),W=A("Button"),E=A("Dialog"),ee=A("InputText"),C=A("Column"),te=A("OverlayPanel"),ae=A("Tag"),ne=A("Dropdown"),oe=A("DataTable");return k(),R(ie,null,[H(d)?(k(),I(Fe,{key:0,class:"absolute z-50 bg-white"})):z("",!0),p("div",je,[Je,s(K),s(E,{header:"Confirmation",visible:H(c),"onUpdate:visible":f[3]||(f[3]=t=>Y(c)?c.value=t:c=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"450px"},modal:!0},{footer:u(()=>[s(W,{label:"Yes",icon:"pi pi-check",onClick:f[1]||(f[1]=t=>J()),class:"p-button-text",autofocus:""}),s(W,{label:"No",icon:"pi pi-times",onClick:f[2]||(f[2]=t=>e(!0)),class:"p-button-text"})]),default:u(()=>[p("div",ze,[Be,p("span",null,"Are you sure you want to "+v(H(D))+"?",1)]),p("div",Ee,[H(D)=="Reject"?(k(),I(X,{key:0,name:"",id:"",modelValue:w.value,"onUpdate:modelValue":f[0]||(f[0]=t=>w.value=t),class:"p-2 border rounded",cols:"45",rows:"4",autoResize:"",placeholder:"Add Comment"},null,8,["modelValue"])):z("",!0),V(" "+v(w.value),1)])]),_:1},8,["visible"]),s(E,{header:"Error",visible:H(y),"onUpdate:visible":f[4]||(f[4]=t=>Y(y)?y.value=t:y=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:u(()=>[s(W,{label:"Ok",icon:"pi pi-check",autofocus:""})]),default:u(()=>[p("div",Ie,[Ye,p("span",null,"Error while processing the request : "+v(H(o)),1)])]),_:1},8,["visible"]),p("div",Ze,[s(oe,{value:H(r),paginator:!0,rows:10,dataKey:"id",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",sortField:"leaverequest_date",sortOrder:-1,filters:_.value,"onUpdate:filters":f[5]||(f[5]=t=>_.value=t),filterDisplay:"menu",globalFilterFields:["name","status"],style:{"white-space":"nowrap"}},{empty:u(()=>[V(" No Employee found ")]),loading:u(()=>[V(" Loading customers data. Please wait. ")]),default:u(()=>[s(C,{class:"font-bold",field:"employee_name",header:"Employee Name",style:{"min-width":"18em"}},{body:u(t=>[p("div",Ge,[JSON.parse(t.data.employee_avatar).type=="shortname"?(k(),R("p",{key:0,class:B(["p-2 font-semibold text-white rounded-full w-11 fs-6",H(n).getBackgroundColor(t.index)])},v(JSON.parse(t.data.employee_avatar).data),3)):(k(),R("img",{key:1,class:"w-10 rounded-circle img-md userActive-status profile-img",style:{height:"30px !important"},src:`data:image/png;base64,${JSON.parse(t.data.employee_avatar).data}`,srcset:"",alt:""},null,8,qe)),p("p",Qe,v(t.data.employee_name),1)])]),filter:u(({filterModel:t,filterCallback:U})=>[s(ee,{modelValue:t.value,"onUpdate:modelValue":h=>t.value=h,onInput:h=>U(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),s(C,{field:"leaverequest_date",header:"Date",sortable:!0},{body:u(t=>[V(v(H(G)(t.data.leaverequest_date,"dd-mm-yyyy, h:MM TT")),1)]),_:1}),s(C,{field:"leave_type",header:"Leave Type"},{body:u(t=>[p("h1",null,v(t.data.leave_type),1),Ke]),_:1}),s(C,{field:"start_date",header:"Start Time"},{body:u(t=>[V(v($(t.data.start_date)),1)]),_:1}),s(C,{field:"end_date",header:"End Time"},{body:u(t=>[V(v($(t.data.end_date))+" ",1)]),_:1}),s(C,{field:"leave_reason",header:"Leave Reason",style:{"min-width":"25em","white-space":"pre-wrap"}},{body:u(t=>[t.data.leave_reason.length>80?(k(),R("div",Xe,[p("p",{onClick:S,class:"font-medium text-orange-400 underline cursor-pointer"},"explore more... "),s(te,{ref_key:"overlayPanel",ref:m,style:{height:"80px"}},{default:u(()=>[V(v(t.data.leave_reason),1)]),_:2},1536)])):(k(),R("div",et,v(t.data.leave_reason),1))]),_:1}),s(C,{field:"reviewer_name",header:"Approver Name"}),s(C,{field:"reviewer_comments",header:"Approver Comments"}),s(C,{field:"status",header:"Status",icon:"pi pi-check"},{body:u(({data:t})=>[s(ae,{value:t.status,severity:N(t.status)},null,8,["value","severity"])]),filter:u(({filterModel:t,filterCallback:U})=>[s(ne,{modelValue:t.value,"onUpdate:modelValue":h=>t.value=h,onChange:h=>U(),options:b.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:u(h=>[h.value?(k(),R("span",{key:0,class:B("customer-badge status-"+h.value)},v(h.value),3)):(k(),R("span",tt,v(h.placeholder),1))]),option:u(h=>[p("span",{class:B("customer-badge status-"+h.option)},v(h.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),s(C,{style:{width:"300px"},field:"",header:"Action"},{body:u(t=>[t.data.status=="Pending"?(k(),R("span",at,[s(W,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:U=>O(t.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),s(W,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2em"},onClick:U=>O(t.data,"Reject")},null,8,["onClick"])])):z("",!0)]),_:1})]),_:1},8,["value","filters"])])])],64)}}},i=le(nt);i.use(ue,{ripple:!0});i.use(xe);i.use(_e);i.use(Se);i.directive("tooltip",he);i.directive("badge",Te);i.directive("ripple",ce);i.directive("styleclass",De);i.directive("focustrap",de);i.component("Button",me);i.component("DataTable",be);i.component("Column",pe);i.component("ColumnGroup",Ne);i.component("Row",Ae);i.component("Toast",we);i.component("ConfirmDialog",Me);i.component("Dropdown",ye);i.component("InputText",fe);i.component("Dialog",ve);i.component("ProgressSpinner",ke);i.component("Tag",He);i.component("OverlayPanel",Le);i.mount("#VJS_LeaveApproval");
