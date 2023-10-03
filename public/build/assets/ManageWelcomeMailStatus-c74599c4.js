import{p as k,r as g,o as W,b as f,c as x,d as s,e as r,g as m,j as C,i as u,f as i,m as t,k as _,F as N,w as h,h as M}from"./app-1d702269.js";import{a as S}from"./index-362795f3.js";import{L as D}from"./LoadingSpinner-4e2a0991.js";/* empty css                                                                       */const L=k("ManageWelcomeMailStatusStore",()=>{const d=g(!1),o=g(!1),c=g();async function p(){d.value=!0,await S.get("/getAllEmployees_WelcomeMailStatus_Details").then(a=>{c.value=a.data,console.log("testing",c)}).finally(()=>{d.value=!1})}function n(a){console.log("sendMail_employeePayslip() : Sending mail to user : "+a),d.value=!0,o.value=!1,S.post("/send_WelcomeMailNotification",{user_code:a}).then(l=>{console.log(" Response [send_WelcomeMail] : "+l.data)}).catch(l=>{console.log(l)}).finally(()=>{p(),d.value=!1})}return{array_employees_list:c,loading:d,sendWelcomeMail_Status_diaconfirmation:o,getManageWelcomeMailStatus:p,send_WelcomeMail:n}});const P={class:"w-full p-2"},B=i("h6",{class:"my-2 text-lg font-semibold"},"Manage WelcomeMail Status",-1),R={class:"my-4 table-responsive"},F=i("br",null,null,-1),T={key:0},A={key:1,class:"text-green-500"},E={key:0},V={key:1},U={key:0},$={key:1},z=i("div",{class:"confirmation-content"},[i("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}}),i("span",null,"Are you sure you want to send Welcome Mail?")],-1),O={class:"d-flex mt-11",style:{position:"relative",right:"-180px",width:"140px"}},H={__name:"ManageWelcomeMailStatus",setup(d){const o=L(),c=g();W(()=>{o.getManageWelcomeMailStatus()});function p(n){c.value=n,console.log(n),o.sendWelcomeMail_Status_diaconfirmation=!0}return(n,a)=>{const l=f("Column"),v=f("Button"),b=f("DataTable"),w=f("Dialog"),y=x("tooltip");return s(),r(N,null,[m(o).loading?(s(),C(D,{key:0,class:"absolute z-50 bg-white w-[100%] h-[100%]"})):u("",!0),i("div",P,[B,i("div",R,[t(b,{value:m(o).array_employees_list,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:n.filters,"onUpdate:filters":a[0]||(a[0]=e=>n.filters=e),filterDisplay:"menu",loading:n.loading2,globalFilterFields:["name","status"]},{default:_(()=>[t(l,{headerStyle:"width: 3rem"}),t(l,{field:"empcode",header:"Employee code",headerStyle:"width: 3rem"}),t(l,{field:"empname",header:"Employee Name"}),t(l,{field:"personal mail",header:"Personal Mail"}),t(l,{field:"welcome_mail_status",header:"Welcome Mail Status"},{body:_(e=>[i("div",null,[t(v,{onClick:j=>p(e.data.empcode),label:"Send mail",class:"btn btn-primary"},null,8,["onClick"]),F,e.data.welcome_mail_status==null?(s(),r("h4",T,"Mail Not Sent")):(s(),r("h4",A," Sent"))])]),_:1}),t(l,{field:"onboard_docs_approval_mail_status",header:"Onboard Document Approval Mail Status"},{body:_(e=>[e.data.value==null||e.data==0?h((s(),r("h1",E,[M("Mail Not Sent")])),[[y,"Normally, mail is sent when docs are reviewed"]]):u("",!0),e.data.value==1?(s(),r("h1",V,"Mail Sent")):u("",!0)]),_:1}),t(l,{field:"acc_activation_mail_status",header:"Activation Mail Status"},{body:_(e=>[e.data.value==null||e.data==0?h((s(),r("h1",U,[M("Mail Not Sent")])),[[y,"Normally, mail is sent once onboarding is done"]]):u("",!0),e.data.value==1?(s(),r("h1",$,"Mail Sent")):u("",!0)]),_:1})]),_:1},8,["value","filters","loading"])]),t(w,{header:"Confirmation",visible:m(o).sendWelcomeMail_Status_diaconfirmation,"onUpdate:visible":a[3]||(a[3]=e=>m(o).sendWelcomeMail_Status_diaconfirmation=e),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{default:_(()=>[z,i("div",O,[t(v,{class:"py-2 mr-3 btn-primary",label:"Yes",icon:"pi pi-check",onClick:a[1]||(a[1]=e=>m(o).send_WelcomeMail(c.value)),autofocus:""}),t(v,{label:"No",icon:"pi pi-times",onClick:a[2]||(a[2]=e=>m(o).sendWelcomeMail_Status_diaconfirmation=!1),class:"py-2 p-button-text",autofocus:""})])]),_:1},8,["visible"])])],64)}}};export{H as default};
