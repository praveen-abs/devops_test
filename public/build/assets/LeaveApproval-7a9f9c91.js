import{a as B}from"./index-362795f3.js";import{r as x,I as re,y as oe,z as se,o as le,c as C,e as k,f as L,h as A,k as Y,j as E,g as m,n as s,l as i,L as Z,F as ie,t as p,i as R,p as J,R as z}from"./app-e362a0cc.js";import{S as ue}from"./Service-c1d85a6b.js";import{L as de}from"./LoadingSpinner-9ad5eb93.js";/* empty css                                                                       */var ce=/d{1,4}|D{3,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|W{1,2}|[LlopSZN]|"[^"]*"|'[^']*'/g,me=/\b(?:[A-Z]{1,3}[A-Z][TC])(?:[-+]\d{4})?|((?:Australian )?(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time)\b/g,ye=/[^-+\dA-Z]/g;function $(a,n,o,u){if(arguments.length===1&&typeof a=="string"&&!/\d/.test(a)&&(n=a,a=void 0),a=a||a===0?a:new Date,a instanceof Date||(a=new Date(a)),isNaN(a))throw TypeError("Invalid date");n=String(q[n]||n||q.default);var y=n.slice(0,4);(y==="UTC:"||y==="GMT:")&&(n=n.slice(4),o=!0,y==="GMT:"&&(u=!0));var r=function(){return o?"getUTC":"get"},d=function(){return a[r()+"Date"]()},T=function(){return a[r()+"Day"]()},_=function(){return a[r()+"Month"]()},M=function(){return a[r()+"FullYear"]()},c=function(){return a[r()+"Hours"]()},b=function(){return a[r()+"Minutes"]()},D=function(){return a[r()+"Seconds"]()},H=function(){return a[r()+"Milliseconds"]()},w=function(){return o?0:a.getTimezoneOffset()},F=function(){return fe(a)},U=function(){return pe(a)},O={d:function(){return d()},dd:function(){return h(d())},ddd:function(){return v.dayNames[T()]},DDD:function(){return G({y:M(),m:_(),d:d(),_:r(),dayName:v.dayNames[T()],short:!0})},dddd:function(){return v.dayNames[T()+7]},DDDD:function(){return G({y:M(),m:_(),d:d(),_:r(),dayName:v.dayNames[T()+7]})},m:function(){return _()+1},mm:function(){return h(_()+1)},mmm:function(){return v.monthNames[_()]},mmmm:function(){return v.monthNames[_()+12]},yy:function(){return String(M()).slice(2)},yyyy:function(){return h(M(),4)},h:function(){return c()%12||12},hh:function(){return h(c()%12||12)},H:function(){return c()},HH:function(){return h(c())},M:function(){return b()},MM:function(){return h(b())},s:function(){return D()},ss:function(){return h(D())},l:function(){return h(H(),3)},L:function(){return h(Math.floor(H()/10))},t:function(){return c()<12?v.timeNames[0]:v.timeNames[1]},tt:function(){return c()<12?v.timeNames[2]:v.timeNames[3]},T:function(){return c()<12?v.timeNames[4]:v.timeNames[5]},TT:function(){return c()<12?v.timeNames[6]:v.timeNames[7]},Z:function(){return u?"GMT":o?"UTC":ve(a)},o:function(){return(w()>0?"-":"+")+h(Math.floor(Math.abs(w())/60)*100+Math.abs(w())%60,4)},p:function(){return(w()>0?"-":"+")+h(Math.floor(Math.abs(w())/60),2)+":"+h(Math.floor(Math.abs(w())%60),2)},S:function(){return["th","st","nd","rd"][d()%10>3?0:(d()%100-d()%10!=10)*d()%10]},W:function(){return F()},WW:function(){return h(F())},N:function(){return U()}};return n.replace(ce,function(e){return e in O?O[e]():e.slice(1,e.length-1)})}var q={default:"ddd mmm dd yyyy HH:MM:ss",shortDate:"m/d/yy",paddedShortDate:"mm/dd/yyyy",mediumDate:"mmm d, yyyy",longDate:"mmmm d, yyyy",fullDate:"dddd, mmmm d, yyyy",shortTime:"h:MM TT",mediumTime:"h:MM:ss TT",longTime:"h:MM:ss TT Z",isoDate:"yyyy-mm-dd",isoTime:"HH:MM:ss",isoDateTime:"yyyy-mm-dd'T'HH:MM:sso",isoUtcDateTime:"UTC:yyyy-mm-dd'T'HH:MM:ss'Z'",expiresHeaderFormat:"ddd, dd mmm yyyy HH:MM:ss Z"},v={dayNames:["Sun","Mon","Tue","Wed","Thu","Fri","Sat","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],monthNames:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec","January","February","March","April","May","June","July","August","September","October","November","December"],timeNames:["a","p","am","pm","A","P","AM","PM"]},h=function(n){var o=arguments.length>1&&arguments[1]!==void 0?arguments[1]:2;return String(n).padStart(o,"0")},G=function(n){var o=n.y,u=n.m,y=n.d,r=n._,d=n.dayName,T=n.short,_=T===void 0?!1:T,M=new Date,c=new Date;c.setDate(c[r+"Date"]()-1);var b=new Date;b.setDate(b[r+"Date"]()+1);var D=function(){return M[r+"Date"]()},H=function(){return M[r+"Month"]()},w=function(){return M[r+"FullYear"]()},F=function(){return c[r+"Date"]()},U=function(){return c[r+"Month"]()},O=function(){return c[r+"FullYear"]()},e=function(){return b[r+"Date"]()},V=function(){return b[r+"Month"]()},P=function(){return b[r+"FullYear"]()};return w()===o&&H()===u&&D()===y?_?"Tdy":"Today":O()===o&&U()===u&&F()===y?_?"Ysd":"Yesterday":P()===o&&V()===u&&e()===y?_?"Tmw":"Tomorrow":d},fe=function(n){var o=new Date(n.getFullYear(),n.getMonth(),n.getDate());o.setDate(o.getDate()-(o.getDay()+6)%7+3);var u=new Date(o.getFullYear(),0,4);u.setDate(u.getDate()-(u.getDay()+6)%7+3);var y=o.getTimezoneOffset()-u.getTimezoneOffset();o.setHours(o.getHours()-y);var r=(o-u)/(864e5*7);return 1+Math.floor(r)},pe=function(n){var o=n.getDay();return o===0&&(o=7),o},ve=function(n){return(String(n).match(me)||[""]).pop().replace(ye,"").replace(/GMT\+0000/g,"UTC")};const _e={class:"w-full p-2 bg-white rounded-lg"},ge=m("div",{class:"col-sm-12 col-xxl-6 col-md-6 col-xl-6 col-lg-6"},[m("h6",{class:"my-2 text-lg font-semibold"},"Leave Approvals")],-1),he={class:"mt-3 ml-3 confirmation-content d-flex justify-content-start align-items-center"},De=m("i",{class:"mr-3 text-red-600 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),Te={class:"w-full pl-3 mt-4 d-flex justify-content-start align-items-center",style:{"margin-bottom":"-12px"}},we={class:"confirmation-content"},Me=m("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}},null,-1),be={class:"mt-3"},Ne={class:"flex items-center justify-center"},Se=["src"],xe={class:"pl-2 font-semibold text-left fs-6"},Ce=m("div",null,null,-1),ke={key:0},Ae={key:1},He={key:1},Le={key:0},We={__name:"LeaveApproval",setup(a){const n=ue();let o=x(),u=x(!1),y=x(!1),r=x(),d=x(!1);re(),oe();const T=x(),_=x({global:{value:null,matchMode:z.CONTAINS},employee_name:{value:null,matchMode:z.STARTS_WITH,matchMode:z.EQUALS,matchMode:z.CONTAINS},status:{value:"Pending",matchMode:z.EQUALS}});x(!1);const M=x(["Pending","Approved","Rejected"]),c=x(),b=l=>{c.value.toggle(l)};let D=null,H=null;const w=se({review_comment:""});le(()=>{F()});function F(){d.value=!0;let l=window.location.origin+"/fetch-leaverequests-based-on-currentrole";B.get(l).then(f=>{o.value=f.data.data}).finally(()=>{d.value=!1})}function U(l){return isNaN(Date.parse(l))?"Invalid date":$(l,"dd-mm-yyyy, h:MM TT")}function O(l,f){y.value=!1,u.value=!0,D=f,H=l,console.log("Selected Row Data : "+JSON.stringify(l))}function e(l){u.value=!1,l&&V()}function V(){D="",H=null}function P(){console.log(w.review_comment),e(!1),d.value=!0,B.post(window.location.origin+"/attendance-approve-rejectleave",{record_id:H.id,status:D=="Approve"?"Approved":D=="Reject"?"Rejected":D,review_comment:w.review_comment}).then(l=>{if(console.log(l),V(),l.data.status=="success")F();else if(l.data.status=="failure"){y.value=!0,r.value=l.data.message;return}}).catch(l=>{d.value=!1,V(),console.log(l.toJSON())}).finally(()=>{d.value=!1})}const N=l=>{switch(l){case"Rejected":return"danger";case"Approved":return"success";case"Pending":return"warning"}};return(l,f)=>{const Q=C("Toast"),K=C("Textarea"),W=C("Button"),I=C("Dialog"),X=C("InputText"),S=C("Column"),ee=C("OverlayPanel"),te=C("Tag"),ae=C("Dropdown"),ne=C("DataTable");return k(),L(ie,null,[A(d)?(k(),Y(de,{key:0,class:"absolute z-50 bg-white"})):E("",!0),m("div",_e,[ge,s(Q),s(I,{header:"Confirmation",visible:A(u),"onUpdate:visible":f[3]||(f[3]=t=>Z(u)?u.value=t:u=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"450px"},modal:!0},{footer:i(()=>[s(W,{label:"Yes",icon:"pi pi-check",onClick:f[1]||(f[1]=t=>P()),class:"p-button-text",autofocus:""}),s(W,{label:"No",icon:"pi pi-times",onClick:f[2]||(f[2]=t=>e(!0)),class:"p-button-text"})]),default:i(()=>[m("div",he,[De,m("span",null,"Are you sure you want to "+p(A(D))+"?",1)]),m("div",Te,[A(D)=="Reject"?(k(),Y(K,{key:0,name:"",id:"",modelValue:T.value,"onUpdate:modelValue":f[0]||(f[0]=t=>T.value=t),class:"p-2 border rounded",cols:"45",rows:"4",autoResize:"",placeholder:"Add Comment"},null,8,["modelValue"])):E("",!0),R(" "+p(T.value),1)])]),_:1},8,["visible"]),s(I,{header:"Error",visible:A(y),"onUpdate:visible":f[4]||(f[4]=t=>Z(y)?y.value=t:y=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:i(()=>[s(W,{label:"Ok",icon:"pi pi-check",autofocus:""})]),default:i(()=>[m("div",we,[Me,m("span",null,"Error while processing the request : "+p(A(r)),1)])]),_:1},8,["visible"]),m("div",be,[s(ne,{value:A(o),paginator:!0,rows:10,dataKey:"id",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",responsiveLayout:"scroll",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",sortField:"leaverequest_date",sortOrder:-1,filters:_.value,"onUpdate:filters":f[5]||(f[5]=t=>_.value=t),filterDisplay:"menu",globalFilterFields:["name","status"],style:{"white-space":"nowrap"}},{empty:i(()=>[R(" No Employee found ")]),loading:i(()=>[R(" Loading customers data. Please wait. ")]),default:i(()=>[s(S,{class:"font-bold",field:"employee_name",header:"Employee Name",style:{"min-width":"18em"}},{body:i(t=>[m("div",Ne,[JSON.parse(t.data.employee_avatar).type=="shortname"?(k(),L("p",{key:0,class:J(["p-2 font-semibold text-white rounded-full w-11 fs-6",A(n).getBackgroundColor(t.index)])},p(JSON.parse(t.data.employee_avatar).data),3)):(k(),L("img",{key:1,class:"w-10 rounded-circle img-md userActive-status profile-img",style:{height:"30px !important"},src:`data:image/png;base64,${JSON.parse(t.data.employee_avatar).data}`,srcset:"",alt:""},null,8,Se)),m("p",xe,p(t.data.employee_name),1)])]),filter:i(({filterModel:t,filterCallback:j})=>[s(X,{modelValue:t.value,"onUpdate:modelValue":g=>t.value=g,onInput:g=>j(),placeholder:"Search",class:"p-column-filter",showClear:!0},null,8,["modelValue","onUpdate:modelValue","onInput"])]),_:1}),s(S,{field:"leaverequest_date",header:"Date",sortable:!0},{body:i(t=>[R(p(A($)(t.data.leaverequest_date,"dd-mm-yyyy, h:MM TT")),1)]),_:1}),s(S,{field:"leave_type",header:"Leave Type"},{body:i(t=>[m("h1",null,p(t.data.leave_type),1),Ce]),_:1}),s(S,{field:"start_date",header:"Start Time"},{body:i(t=>[R(p(U(t.data.start_date)),1)]),_:1}),s(S,{field:"end_date",header:"End Time"},{body:i(t=>[R(p(U(t.data.end_date))+" ",1)]),_:1}),s(S,{field:"leave_reason",header:"Leave Reason",style:{"min-width":"25em","white-space":"pre-wrap"}},{body:i(t=>[t.data.leave_reason.length>80?(k(),L("div",ke,[m("p",{onClick:b,class:"font-medium text-orange-400 underline cursor-pointer"},"explore more... "),s(ee,{ref_key:"overlayPanel",ref:c,style:{height:"80px"}},{default:i(()=>[R(p(t.data.leave_reason),1)]),_:2},1536)])):(k(),L("div",Ae,p(t.data.leave_reason),1))]),_:1}),s(S,{field:"reviewer_name",header:"Approver Name"}),s(S,{field:"reviewer_comments",header:"Approver Comments"}),s(S,{field:"status",header:"Status",icon:"pi pi-check"},{body:i(({data:t})=>[s(te,{value:t.status,severity:N(t.status)},null,8,["value","severity"])]),filter:i(({filterModel:t,filterCallback:j})=>[s(ae,{modelValue:t.value,"onUpdate:modelValue":g=>t.value=g,onChange:g=>j(),options:M.value,placeholder:"Select",class:"p-column-filter",showClear:!0},{value:i(g=>[g.value?(k(),L("span",{key:0,class:J("customer-badge status-"+g.value)},p(g.value),3)):(k(),L("span",He,p(g.placeholder),1))]),option:i(g=>[m("span",{class:J("customer-badge status-"+g.option)},p(g.option),3)]),_:2},1032,["modelValue","onUpdate:modelValue","onChange","options"])]),_:1}),s(S,{style:{width:"300px"},field:"",header:"Action"},{body:i(t=>[t.data.status=="Pending"?(k(),L("span",Le,[s(W,{type:"button",icon:"pi pi-check-circle",class:"p-button-success Button",label:"Approve",onClick:j=>O(t.data,"Approve"),style:{height:"2em"}},null,8,["onClick"]),s(W,{type:"button",icon:"pi pi-times-circle",class:"p-button-danger Button",label:"Reject",style:{"margin-left":"8px",height:"2em"},onClick:j=>O(t.data,"Reject")},null,8,["onClick"])])):E("",!0)]),_:1})]),_:1},8,["value","filters"])])])],64)}}};export{We as default};
