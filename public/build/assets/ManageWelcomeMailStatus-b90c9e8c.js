/* empty css                  *//* empty css              */import{$ as v,aj as k,o as l,c as r,h as o,w as d,d as m,k as S,l as h,a as f,ai as p,F as C,g,j as D,H as x,P as N,I as P,u as $,J as T,R as L,S as R,x as B,y as F,M as A,K as V,L as E,X as j,N as U,Q as I,W as K}from"./toastservice.esm-5497698c.js";import"./blockui.esm-221ce14c.js";import{C as O}from"./confirmationservice.esm-712df8af.js";import{s as z}from"./progressspinner.esm-b55e6b3f.js";import{s as H}from"./calendar.esm-ae4d5a30.js";import{d as J,c as Q}from"./pinia-61b2fb76.js";import{a as b}from"./index-362795f3.js";const X=J("ManageWelcomeMailStatusStore",()=>{const u=v(!1),s=v(!1),c=v();async function _(){await b.get("/getAllEmployees_WelcomeMailStatus_Details").then(t=>{c.value=t.data,console.log("testing",c)}).finally(()=>{})}function n(t){console.log("sendMail_employeePayslip() : Sending mail to user : "+t),u.value=!0,s.value=!1,b.post("/send_WelcomeMailNotification",{user_code:t}).then(i=>{console.log(" Response [send_WelcomeMail] : "+i.data)}).catch(i=>{console.log(i)}).finally(()=>{_(),u.value=!1})}return{array_employees_list:c,loading:u,sendWelcomeMail_Status_diaconfirmation:s,getManageWelcomeMailStatus:_,send_WelcomeMail:n}});const Y=m("br",null,null,-1),q={key:0},G={key:1,class:"text-green-500"},Z={key:0},ee={key:1},ae={key:0},te={key:1},oe=m("div",{class:"confirmation-content"},[m("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}}),m("span",null,"Are you sure you want to send Welcome Mail?")],-1),ie={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},se={__name:"ManageWelcomeMailStatus",setup(u){const s=X(),c=v();k(()=>{s.getManageWelcomeMailStatus()});function _(n){c.value=n,console.log(n),s.sendWelcomeMail_Status_diaconfirmation=!0}return(n,t)=>{const i=g("Column"),y=g("Button"),w=g("DataTable"),W=g("Dialog"),M=D("tooltip");return l(),r(C,null,[o(w,{value:p(s).array_employees_list,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:n.filters,"onUpdate:filters":t[0]||(t[0]=a=>n.filters=a),filterDisplay:"menu",loading:n.loading2,globalFilterFields:["name","status"]},{default:d(()=>[o(i,{headerStyle:"width: 3rem"}),o(i,{field:"empcode",header:"Employee code",headerStyle:"width: 3rem"}),o(i,{field:"empname",header:"Employee Name"}),o(i,{field:"personal mail",header:"Personal Mail"}),o(i,{field:"welcome_mail_status",header:"Welcome Mail Status"},{body:d(a=>[m("div",null,[o(y,{onClick:le=>_(a.data.empcode),label:"Send mail",class:"btn btn-primary"},null,8,["onClick"]),Y,a.data.welcome_mail_status==null?(l(),r("h4",q,"Mail Not Sent")):(l(),r("h4",G," Sent"))])]),_:1}),o(i,{field:"onboard_docs_approval_mail_status",header:"Onboard Document Approval Mail Status"},{body:d(a=>[a.data.value==null||a.data==0?S((l(),r("h1",Z,[h("Mail Not Sent")])),[[M,"Normally, mail is sent when docs are reviewed"]]):f("",!0),a.data.value==1?(l(),r("h1",ee,"Mail Sent")):f("",!0)]),_:1}),o(i,{field:"acc_activation_mail_status",header:"Activation Mail Status"},{body:d(a=>[a.data.value==null||a.data==0?S((l(),r("h1",ae,[h("Mail Not Sent")])),[[M,"Normally, mail is sent once onboarding is done"]]):f("",!0),a.data.value==1?(l(),r("h1",te,"Mail Sent")):f("",!0)]),_:1})]),_:1},8,["value","filters","loading"]),o(W,{header:"Confirmation",visible:p(s).sendWelcomeMail_Status_diaconfirmation,"onUpdate:visible":t[3]||(t[3]=a=>p(s).sendWelcomeMail_Status_diaconfirmation=a),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:d(()=>[oe,m("div",ie,[o(y,{class:"btn-primary py-2 mr-3",label:"Yes",icon:"pi pi-check",onClick:t[1]||(t[1]=a=>p(s).send_WelcomeMail(c.value)),autofocus:""}),o(y,{label:"No",icon:"pi pi-times",onClick:t[2]||(t[2]=a=>p(s).sendWelcomeMail_Status_diaconfirmation=!1),class:"p-button-text py-2",autofocus:""})])]),_:1},8,["visible"])],64)}}},e=x(se),ne=Q();e.use(N,{ripple:!0});e.use(O);e.use(P);e.use(ne);e.directive("tooltip",$);e.directive("badge",T);e.directive("ripple",L);e.directive("styleclass",R);e.directive("focustrap",B);e.component("Button",F);e.component("DataTable",A);e.component("Column",V);e.component("ConfirmDialog",E);e.component("Toast",j);e.component("Dialog",U);e.component("Dropdown",I);e.component("ProgressSpinner",z);e.component("InputText",K);e.component("Calendar",H);e.mount("#vjs_ManageWelcomeMailStatus");
