/* empty css          *//* empty css                 *//* empty css               */import{a0 as v,ak as W,o as r,c,I as p,b as C,a as u,d as l,h as o,w as _,k as S,l as h,F as D,g,j as x,K as N,P,L as $,u as T,M as L,R as B,S as R,x as F,y as V,N as A,Q as E,_ as U,V as j,W as z,Y as I}from"./toastservice.esm78544.js";import"./blockui.esm78544.js";import{a as K}from"./datatable.esm78544.js";import{C as O}from"./confirmationservice.esm78544.js";import{s as Y}from"./progressspinner.esm78544.js";import{s as Q}from"./calendar.esm78544.js";import{d as q,c as G}from"./pinia78544.js";import{a as b}from"./index78544.js";import{L as H}from"./LoadingSpinner78544.js";/* empty css                                                                   */import"./_plugin-vue_export-helper78544.js";const J=q("ManageWelcomeMailStatusStore",()=>{const m=v(!1),i=v(!1),d=v();async function f(){m.value=!0,await b.get("/getAllEmployees_WelcomeMailStatus_Details").then(a=>{d.value=a.data,console.log("testing",d)}).finally(()=>{m.value=!1})}function n(a){console.log("sendMail_employeePayslip() : Sending mail to user : "+a),m.value=!0,i.value=!1,b.post("/send_WelcomeMailNotification",{user_code:a}).then(s=>{console.log(" Response [send_WelcomeMail] : "+s.data)}).catch(s=>{console.log(s)}).finally(()=>{f(),m.value=!1})}return{array_employees_list:d,loading:m,sendWelcomeMail_Status_diaconfirmation:i,getManageWelcomeMailStatus:f,send_WelcomeMail:n}});const X={class:"w-full p-2"},Z=l("h6",{class:"my-2 text-lg font-semibold"},"Manage WelcomeMail Status",-1),ee={class:"my-4 table-responsive"},te=l("br",null,null,-1),ae={key:0},oe={key:1,class:"text-green-500"},ie={key:0},se={key:1},le={key:0},ne={key:1},re=l("div",{class:"confirmation-content"},[l("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}}),l("span",null,"Are you sure you want to send Welcome Mail?")],-1),ce={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},me={__name:"ManageWelcomeMailStatus",setup(m){const i=J(),d=v();W(()=>{i.getManageWelcomeMailStatus()});function f(n){d.value=n,console.log(n),i.sendWelcomeMail_Status_diaconfirmation=!0}return(n,a)=>{const s=g("Column"),y=g("Button"),w=g("DataTable"),k=g("Dialog"),M=x("tooltip");return r(),c(D,null,[p(i).loading?(r(),C(H,{key:0,class:"absolute z-50 bg-white w-[100%] h-[100%]"})):u("",!0),l("div",X,[Z,l("div",ee,[o(w,{value:p(i).array_employees_list,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:n.filters,"onUpdate:filters":a[0]||(a[0]=t=>n.filters=t),filterDisplay:"menu",loading:n.loading2,globalFilterFields:["name","status"]},{default:_(()=>[o(s,{headerStyle:"width: 3rem"}),o(s,{field:"empcode",header:"Employee code",headerStyle:"width: 3rem"}),o(s,{field:"empname",header:"Employee Name"}),o(s,{field:"personal mail",header:"Personal Mail"}),o(s,{field:"welcome_mail_status",header:"Welcome Mail Status"},{body:_(t=>[l("div",null,[o(y,{onClick:pe=>f(t.data.empcode),label:"Send mail",class:"btn btn-primary"},null,8,["onClick"]),te,t.data.welcome_mail_status==null?(r(),c("h4",ae,"Mail Not Sent")):(r(),c("h4",oe," Sent"))])]),_:1}),o(s,{field:"onboard_docs_approval_mail_status",header:"Onboard Document Approval Mail Status"},{body:_(t=>[t.data.value==null||t.data==0?S((r(),c("h1",ie,[h("Mail Not Sent")])),[[M,"Normally, mail is sent when docs are reviewed"]]):u("",!0),t.data.value==1?(r(),c("h1",se,"Mail Sent")):u("",!0)]),_:1}),o(s,{field:"acc_activation_mail_status",header:"Activation Mail Status"},{body:_(t=>[t.data.value==null||t.data==0?S((r(),c("h1",le,[h("Mail Not Sent")])),[[M,"Normally, mail is sent once onboarding is done"]]):u("",!0),t.data.value==1?(r(),c("h1",ne,"Mail Sent")):u("",!0)]),_:1})]),_:1},8,["value","filters","loading"])]),o(k,{header:"Confirmation",visible:p(i).sendWelcomeMail_Status_diaconfirmation,"onUpdate:visible":a[3]||(a[3]=t=>p(i).sendWelcomeMail_Status_diaconfirmation=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:_(()=>[re,l("div",ce,[o(y,{class:"py-2 mr-3 btn-primary",label:"Yes",icon:"pi pi-check",onClick:a[1]||(a[1]=t=>p(i).send_WelcomeMail(d.value)),autofocus:""}),o(y,{label:"No",icon:"pi pi-times",onClick:a[2]||(a[2]=t=>p(i).sendWelcomeMail_Status_diaconfirmation=!1),class:"py-2 p-button-text",autofocus:""})])]),_:1},8,["visible"])])],64)}}},e=N(me),de=G();e.use(P,{ripple:!0});e.use(O);e.use($);e.use(de);e.directive("tooltip",T);e.directive("badge",L);e.directive("ripple",B);e.directive("styleclass",R);e.directive("focustrap",F);e.component("Button",V);e.component("DataTable",K);e.component("Column",A);e.component("ConfirmDialog",E);e.component("Toast",U);e.component("Dialog",j);e.component("Dropdown",z);e.component("ProgressSpinner",Y);e.component("InputText",I);e.component("Calendar",Q);e.mount("#vjs_ManageWelcomeMailStatus");
