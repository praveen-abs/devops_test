import{G as u,a1 as E,H as j,g as $,o as i,c as d,d as s,t as n,a2 as v,k as R,a3 as N,h as o,w as D,F as f,j as U,f as C,b as V,a4 as S,l as B,I as G,P as H,J as O,R as z,u as I,v as W,N as F,K,M as J,A as Q,L as X}from"./toastservice.esm-ed3188be.js";import{d as Y,c as Z}from"./pinia-503c53ce.js";import"./blockui.esm-244d5d2b.js";import{T as ss,B as A,S as es,b as ts,a as as}from"./styleclass.esm-6ed4e4b9.js";import{D as os}from"./dialogservice.esm-dbd866ef.js";import{C as cs}from"./confirmationservice.esm-890ba1ea.js";import{s as is}from"./progressspinner.esm-db4b8f96.js";import{s as ls}from"./row.esm-6ebc942e.js";import{s as ns}from"./columngroup.esm-9dd1458e.js";import{s as ds}from"./calendar.esm-21345d6f.js";import{s as rs}from"./textarea.esm-a3e09931.js";import{s as ms}from"./chips.esm-03c88f3f.js";import{s as _s}from"./multiselect.esm-8318a143.js";import{s as ps}from"./badge.esm-b35e9c25.js";import{s as vs,a as us}from"./galleria.esm-e7929bdc.js";import{S as q}from"./Service-4fe2d4a2.js";import{a as w}from"./index-362795f3.js";import"./autoprefixer-6d6f7a0f.js";import{u as hs}from"./leave_apply_service-f016828c.js";import{_ as fs}from"./LeaveApply-5a473383.js";import{_ as g}from"./_plugin-vue_export-helper-c27b6911.js";import{d as T}from"./dayjs.min-2f06af28.js";import"./moment-fbc5633a.js";/* empty css                                                            */import"./index.esm-a59c3c7b.js";const bs="/build/assets/girl_walk-33da2160.jpg",k=Y("mainDashboardStore",()=>{const r=q(),e=u(),a=u([]),m=u([]),c=u([]);async function _(y,p){await w.get("/getAllNewDashboardDetails").then(h=>{e.value=h.data.all_events.birthday,a.value=h.data.all_notification.array_notifications,m.value=h.data.leave_balance_per_month,c.value=h.data.attenance_report_permonth}).finally(()=>{})}async function l(y,p){await w.get("/getAttendanceStatus",{user_code:"PLIPL068",date:"2023-06-26"}).then(h=>{console.log("getAttendanceStatus() : "+h.data)}).finally(()=>{})}return{service:r,getCurrentlyLoginUser:()=>w.get("/currentUserName"),getAttendanceStatus:l,getMainDashboardData:_,updateCheckin_out:y=>w.post("/performAttendanceCheckIn",y),fetch_leave_history:()=>w.get("http://localhost:8000/fetch-leaverequests/employee/Approved,Rejected,Pending,Revoked,Withdrawn%20"),allEventSource:e,leaveBalancePerMonthSource:m,allNotificationSource:a,attenanceReportPerMonth:c}});const xs={class:"border-0 card w-100 box-shadow-md"},gs={class:"card-body"},ys={class:"row"},ws={class:"col-8 col-sm-8 col-md-8 col-xl-8 col-lg-8 col-xxl-8"},$s={class:"fw-bold f-18 text-blue-900",id:"greeting_text"},ks={class:"my-1 fw-bold fs-6 text-orange"},Ds={class:"my-2.5 flex"},Ss=s("i",{class:"fa fa-sun-o text-warning my-auto","aria-hidden":"true"},null,-1),js=s("p",{class:"mx-2 fs-6 my-auto"},"General Shift",-1),Cs={class:"switch-checkbox f-12 text-muted"},qs=s("span",{class:"slider-checkbox check-in round"},[s("span",{class:"slider-checkbox-text"})],-1),Ls=s("p",{class:"f-12 text-muted",id:"time_duration"}," Check-in time: "+n("--:--:--")+"   Mode : "+n("--"),-1),Ms=s("p",{class:"f-12 text-muted",id:"time_duration"}," Check-out time: "+n("--:--:--")+"   Mode : "+n("--"),-1),Ps=s("div",{class:"col-4 col-sm-4 col-md-4 col-xl-4 col-lg-4 col-xxl-4"},[s("img",{src:bs,class:"",alt:"girl-walk",style:{height:"140px",width:"140px"}})],-1),Ts={class:"modal-content"},Rs={class:"p-1 text-center modal-body"},As={class:"check-in-animate"},Es={class:"mt-2"},Ns={class:"mb-2"},Us=s("p",{class:"mb-4 text-muted"},"Have a good day !",-1),Vs={class:"gap-2 hstack justify-content-center"},Bs={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},Gs={class:"modal-content"},Hs={class:"p-1 text-center modal-body"},Os={class:"check-in-animate"},zs={class:"mt-4"},Is={class:"mb-3"},Ws=s("p",{class:"mb-4 text-muted"},"See you tommorrow",-1),Fs={class:"gap-2 hstack justify-content-center"},Ks={href:"javascript:void(0);",class:"btn btn-link link-success fw-medium","data-bs-dismiss":"modal"},Js={__name:"welcome_card",setup(r){const e=q(),a=k(),m=u();u();const c=u(!1),_=u(!1),l=E({date:new Date,check:"",check_in:"",check_out:"",attendance_mode:"web",work_mode:"",checked:!1}),b=()=>{var y=new Date,p=y.getHours();p<12?m.value="Good Morning":p<18?m.value="Good Afternoon":m.value="Good Evening"},L=()=>{l.check==!0?(l.check_in=new Date().toLocaleTimeString(),l.checked=!0,c.value=!0):(l.check_out=new Date().toLocaleTimeString(),_.value=!0,l.checked=!1),a.updateCheckin_out({checked:l.checked}).finally(()=>{M()})};j(async()=>{b()});const M=()=>{a.check="",a.check_in="",a.check_out="",a.work_mode=""};return(y,p)=>{const h=$("lord-icon"),P=$("Dialog");return i(),d(f,null,[s("div",xs,[s("div",gs,[s("div",ys,[s("div",ws,[s("p",$s,n(m.value),1),s("p",ks,n(v(e).current_user_name),1),s("div",Ds,[Ss,js,s("label",Cs,[R(s("input",{type:"checkbox",id:"checkin_function",class:"f-13 text-muted","onUpdate:modelValue":p[0]||(p[0]=x=>l.check=x),onChange:L},null,544),[[N,l.check]]),qs])]),Ls,Ms]),Ps])])]),o(P,{visible:c.value,"onUpdate:visible":p[2]||(p[2]=x=>c.value=x),modal:"",style:{width:"25vw"}},{default:D(()=>[s("div",Ts,[s("div",Rs,[s("div",As,[o(h,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",class:"gliters",colors:"primary:#1aff1a,secondary:#1aff1a"}),o(h,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#30e849"})]),s("div",Es,[s("h4",Ns,"Welcome "+n(v(e).current_user_name),1),Us,s("div",Vs,[s("a",Bs,[s("button",{onClick:p[1]||(p[1]=x=>c.value=!1),type:"button",class:"btn btn-primary"}," Close ")])])])])])]),_:1},8,["visible"]),o(P,{visible:_.value,"onUpdate:visible":p[4]||(p[4]=x=>_.value=x),modal:"",style:{width:"25vw"}},{default:D(()=>[s("div",Gs,[s("div",Hs,[s("div",Os,[o(h,{src:"https://cdn.lordicon.com/dcfqtwxe.json",trigger:"loop",delay:"2000",colors:"primary:#ff3300,secondary:#ff3300",class:"gliters"}),o(h,{src:"https://cdn.lordicon.com/twopqjaj.json",trigger:"loop",delay:"2000",class:"entry-man",colors:"primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#e62e00"})]),s("div",zs,[s("h4",Is,"Bye "+n(v(e).current_user_name),1),Ws,s("div",Fs,[s("a",Ks,[s("button",{type:"button",class:"btn btn-primary",onClick:p[3]||(p[3]=x=>_.value=!1)}," Close ")])])])])])]),_:1},8,["visible"])],64)}}},Qs="/build/assets/present-c8aebe5a.svg",Xs="/build/assets/leave-41c847d5.svg",Ys="/build/assets/absent-04767fa8.svg",Zs={class:"border-0 attendance-wrapper card w-100 box-shadow-md",style:{height:"180px"}},se={class:"card-body"},ee=s("div",{class:"mb-2 d-flex justify-content-between align-items-center"},[s("span",{class:"text-primary font-semibold fs-6"},"Current Month"),s("a",{role:"button"},[s("span",{class:"text-primary fs-11"},"View All")])],-1),te={class:"row"},ae={class:"col-sm-12 col-md-4 col-xl-4 col-lg-4 col-xxl-4"},oe={class:"border-0 card box-shadow-sm bg-green-lighten"},ce={class:"py-2 mx-auto text-center card-body"},ie=s("img",{src:Qs,alt:"",class:"h-5"},null,-1),le={class:"d-flex"},ne={class:"h1"},de=s("span",{class:"mt-4 fs-12 ms-1"},"days",-1),re=s("p",{class:"text-primary"},"Present",-1),me={class:"col-sm-12 col-md-4 col-xl-4 col-lg-4 col-xxl-4"},_e={class:"border-0 card box-shadow-sm bg-pink-lighten"},pe={class:"py-2 mx-auto text-center card-body"},ve=s("img",{src:Xs,alt:"leave-icon",class:"h-5"},null,-1),ue={class:"d-flex"},he={class:"h1"},fe=s("span",{class:"mt-4 fs-12 ms-1"},"days",-1),be=s("p",{class:"text-primary"},"Leave",-1),xe={class:"col-sm-12 col-md-4 col-xl-4 col-lg-4 col-xxl-4"},ge={class:"border-0 card box-shadow-sm bg-sky-lighten"},ye={class:"py-2 mx-auto text-center card-body"},we=s("img",{src:Ys,alt:"absent-icon",class:"h-5"},null,-1),$e={class:"d-flex"},ke={class:"h1"},De=s("span",{class:"mt-4 fs-12 ms-1"},"days",-1),Se=s("p",{class:"text-primary"},"Absent",-1),je={__name:"leave_details",setup(r){const e=k();return j(()=>{}),(a,m)=>(i(),d("div",Zs,[s("div",se,[ee,s("div",te,[s("div",ae,[s("div",oe,[s("div",ce,[ie,s("div",le,[s("span",ne,n(v(e).attenanceReportPerMonth.present),1),de]),re])])]),s("div",me,[s("div",_e,[s("div",pe,[ve,s("div",ue,[s("span",he,n(v(e).attenanceReportPerMonth.not_applied),1),fe]),be])])]),s("div",xe,[s("div",ge,[s("div",ye,[we,s("div",$e,[s("span",ke,n(v(e).attenanceReportPerMonth.absent),1),De]),Se])])])])])]))}},Ce={class:"border-0 notification-wrapper card w-100 box-shadow-md h-100 overflow-x-hidden overflow-y-auto"},qe={class:"card-body"},Le={class:"mb-3 card-title d-flex align-items-center justify-content-between f-18 text-primary",id:""},Me=s("span",{class:"text-primary font-semibold fs-6"},"Notifications",-1),Pe={class:"pi pi-bell p-overlay-badge",style:{"font-size":"1.5rem"}},Te={class:"contents"},Re={class:"p-2 card-body"},Ae={class:"notify-content"},Ee={class:"mb-1 orange-median align-items-center d-flex justify-content-between"},Ne={class:"orange-median font-semibold text-lg"},Ue={class:"fs-11"},Ve={class:"notify-message"},Be={class:"fs-10"},Ge={__name:"notification",setup(r){const e=k(),a=m=>m.length;return(m,c)=>{const _=U("badge");return i(),d("div",Ce,[s("div",qe,[s("div",Le,[Me,R(s("i",Pe,null,512),[[_,a(v(e).allNotificationSource)]])]),s("div",Te,[(i(!0),d(f,null,C(v(e).allNotificationSource,l=>(i(),d("div",{class:"p-1 my-4 rounded-lg shadow-md tw-card dynamic-card hover:bg-slate-100",key:l.id},[s("div",Re,[s("div",Ae,[s("p",Ee,[s("span",Ne,n(l.notification_title),1),s("span",Ue,n(l.redirect_to_module),1)]),s("div",Ve,[s("p",Be,n(l.notification_body),1)])])])]))),128))])])])}}},He={style:{display:"none"}},Oe={class:"border-0 leave-balance-wrapper card w-100 box-shadow-md h-100 overflow-x-hidden overflow-y-auto h-2"},ze={class:"card-body"},Ie=s("div",{class:"mb-3 card-title d-flex align-items-center justify-content-between f-18 text-primary",id:""},[s("span",{class:"text-primary font-semibold fs-6"},"Leave Balance")],-1),We={class:"contents"},Fe={class:"p-0 card-body"},Ke={class:"d-flex leave-balance-content"},Je={class:"col-sm-3 col-md-3 col-xl-3 col-lg-3 col-xxl-3 leave-balance-container"},Qe={class:"m-auto leave-balance-available"},Xe={class:""},Ye=s("span",{class:""},"/",-1),Ze={class:""},st={class:"col-sm-9 col-md-9 col-xl-9 col-lg-9 d-flex col-xxl-9 leave-balance-type"},et={class:"font-semibold text-lg text-primary"},tt={__name:"leave_balance",setup(r){const e=k(),a=hs();return(m,c)=>(i(),d(f,null,[s("div",He,[o(fs)]),s("div",Oe,[s("div",ze,[Ie,s("div",We,[(i(!0),d(f,null,C(v(e).leaveBalancePerMonthSource,_=>(i(),d("div",{class:"card leave-balance-card",key:_.leave_type,onClick:c[0]||(c[0]=l=>v(a).leaveApplyDailog=!0)},[s("div",Fe,[s("div",Ke,[s("div",Je,[s("div",Qe,[s("span",Xe,n(_.leave_balance),1),Ye,s("span",Ze,n(_.avalied_leaves),1)])]),s("div",st,[s("p",et,n(_.leave_type),1)])])])]))),128))])])])],64))}};const at={},ot={class:"border-0 card w-100 box-shadow-md"};function ct(r,e){const a=$("Calendar");return i(),d("div",ot,[o(a,{inline:!0,showWeek:!0})])}const it=g(at,[["render",ct]]);const lt=["src","alt"],nt={__name:"holiday_widget",setup(r){const e=u(),a=u([{breakpoint:"1199px",numVisible:3,numScroll:3},{breakpoint:"991px",numVisible:2,numScroll:2},{breakpoint:"767px",numVisible:1,numScroll:1}]),m=async()=>{await w.get("/holiday/master-page").then(c=>{e.value=c.data})};return j(()=>{m()}),(c,_)=>{const l=$("Galleria");return i(),V(l,{value:e.value,responsiveOptions:a.value,numVisible:5,circular:!0,containerStyle:"max-width: 500px",style:{height:"100px"},showItemNavigators:!0,showThumbnails:!1},{item:D(b=>[s("img",{src:`data:image/png;base64,${b.item.image}`,class:"mt-3 rounded shadow-sm",style:{width:"450px",height:"175px","margin-bottom":"10px",position:"relative",bottom:"10px",display:"block"},alt:b.item.holiday_name},null,8,lt)]),_:1},8,["value","responsiveOptions"])}}},dt={class:"row",style:{height:"190px"}},rt={class:"col-sm-12 col-md-6 col-xl-4 col-lg-4 col-xxl-4"},mt={class:"col-sm-12 col-md-6 col-xl-4 col-lg-4 d-flex col-xxl-4"},_t={class:"col-sm-12 col-md-6 col-xl-4 col-lg-4 d-flex col-xxl-4"},pt={class:"row"},vt={class:"col-sm-6 col-md-6 col-xl-4 col-lg-4 col-xxl-4",style:{height:"350px"}},ut={class:"col-sm-12 col-md-6 col-xl-4 col-lg-4 col-xxl-4",style:{height:"350px"}},ht={class:"h-3 col-sm-12 col-md-6 col-xl-4 col-lg-4 d-flex col-xxl-4",style:{height:"350px"}},ft={__name:"employee_dashboard",setup(r){return(e,a)=>(i(),d(f,null,[s("div",dt,[s("div",rt,[o(Js)]),s("div",mt,[o(je)]),s("div",_t,[o(nt)])]),s("div",pt,[s("div",vt,[o(Ge)]),s("div",ut,[o(tt)]),s("div",ht,[o(it)])])],64))}},bt={},xt=S('<div class="col-sm-6 col-md-6 col-xl-3 col-lg-3 col-xxl-3"><div class="card"><div class="px-1 card-body d-flex align-items-center"><div class="me-2"><div class="icons bg-blue-lighten"><i class="fas fa-users blue-darken"></i></div></div><div class=""><p class="mb-1 text-center fs-13 text-muted">Total Employees</p><p class="text-center text-primary fs-17">100</p></div></div></div></div><div class="col-sm-6 col-md-6 col-xl-3 col-lg-3 col-xxl-3"><div class="card"><div class="px-1 card-body d-flex align-items-center"><div class="me-2"><div class="icons bg-green-lighten"><i class="fas fa-user-plus green-median"></i></div></div><div class=""><p class="mb-1 text-center fs-13 text-muted">New Employees</p><p class="text-center text-primary fs-17">100</p></div></div></div></div><div class="col-sm-6 col-md-6 col-xl-3 col-lg-3 col-xxl-3"><div class="card"><div class="px-1 card-body d-flex align-items-center"><div class="me-2"><div class="icons bg-pink-lighten"><i class="fas fa-user-check pink-median"></i></div></div><div class=""><p class="mb-1 text-center fs-13 text-muted">Employees Present</p><p class="text-center text-primary fs-17">100</p></div></div></div></div><div class="col-sm-6 col-md-6 col-xl-3 col-lg-3 col-xxl-3"><div class="card"><div class="px-1 card-body d-flex align-items-center"><div class="me-2"><div class="icons bg-sky-lighten"><i class="fas fa-user-minus sky-median"></i></div></div><div class=""><p class="mb-1 text-center fs-13 text-muted">Employees On Leave</p><p class="text-center text-primary fs-17">100</p></div></div></div></div>',4);function gt(r,e){return xt}const yt=g(bt,[["render",gt]]),wt={},$t={class:"col-sm-12 col-md-12 col-xl-5 col-lg-5 col-xxl-5"},kt=S('<div class="border-0 task-wrapper card w-100 box-shadow-md"><div class="card-body"><div class="mb-3 card-title d-flex align-items-center justify-content-between f-18 text-primary" id=""><span>Task</span></div><div class="contents contents-h-445"><div class="card task-card border-left-orange bg-orange-lighten"><div class="p-2 card-body"><div class="notify-content"><div class="mb-1 orange-median d-flex align-items-center justify-content-between"><span class="">Interview Scheduled</span><span class="fs-11">1:00 PM - 2:00 PM</span></div><div class="notify-message"><p class="fs-10"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, alias. </p></div></div></div></div><div class="card task-card border-left-skyBlue bg-sky-lighten"><div class="p-2 card-body"><div class="notify-content"><p class="mb-1 sky-median align-items-center d-flex justify-content-between"><span class="">Meeting</span><span class="fs-11">1:00 PM - 2:00 PM</span></p><div class="notify-message"><p class="fs-10"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, alias. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, alias. </p></div></div></div></div><div class="card task-card border-left-green bg-green-lighten"><div class="p-2 card-body"><div class="notify-content"><p class="mb-1 green-median d-flex justify-content-between"><span class="">Leave</span><span class="fs-11">Request Approved</span></p><div class="notify-message"><p class="fs-10"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, alias. </p></div></div></div></div><div class="card task-card border-left-blue"><div class="p-2 card-body"><div class="notify-content"><p class="mb-1 blue-median d-flex justify-content-between"><span class="">Leave</span><span class="fs-11">Request Approved</span></p><div class="notify-message"><p class="fs-10"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, alias. </p></div></div></div></div></div></div></div>',1),Dt=[kt];function St(r,e){return i(),d("div",$t,Dt)}const jt=g(wt,[["render",St]]),Ct={},qt={class:"col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12"},Lt=S('<div class="card"><div class="card-body"><div class="card-title d-flex align-items-center justify-content-between f-18 text-primary" id=""><span>Employee Status</span></div><div class="employee-status-content"><canvas id="employeeStatus" style="width:100%;height:260px;"></canvas></div></div></div>',1),Mt=[Lt];function Pt(r,e){return i(),d("div",qt,Mt)}const Tt=g(Ct,[["render",Pt]]),Rt={},At={class:"card"},Et=s("div",{class:"card-body"},[s("div",{class:"card-title d-flex align-items-center justify-content-between",id:""},[s("span",{class:"text-primary"},"Leave Request")]),s("ul",{class:"leave-request-wrapper"},[s("li",{class:"leave-request-content"},[s("div",{class:"d-flex align-items-center justify-content-between"},[s("div",{class:"d-flex align-items-center"},[s("div",{class:"user-img"},[s("div",{class:"icons bg-blue-lighten"},[s("i",{class:"fas fa-users blue-darken"})])]),s("div",{class:"mx-2 leave-request-user"},[s("p",{class:"f-14 text-primary"},"Anto"),s("p",{class:"fs-10"},"Technical Lead")])]),s("div",{class:"mx-3 leave-request-date"},[s("p",{class:"px-3 rounded-pill"},"2 days Casual Leave"),s("p",{class:"text-center fs-10 text-muted"},"13 jan - 16 jan")]),s("a",{role:"button",class:"btn border-primary leave-request-view"},"View")])]),s("li",{class:"leave-request-content"},[s("div",{class:"d-flex align-items-center justify-content-between"},[s("div",{class:"d-flex align-items-center"},[s("div",{class:"user-img"},[s("div",{class:"icons bg-blue-lighten"},[s("i",{class:"fas fa-users blue-darken"})])]),s("div",{class:"mx-2 leave-request-user"},[s("p",{class:"f-14 text-primary"},"Karthikeyan"),s("p",{class:"fs-10"},"Technical Lead")])]),s("div",{class:"mx-3 leave-request-date"},[s("p",{class:"px-3 rounded-pill"},"2 days Casual Leave"),s("p",{class:"text-center fs-10 text-muted"},"13 jan - 16 jan")]),s("a",{role:"button",class:"btn border-primary leave-request-view"},"View")])])])],-1),Nt=[Et];function Ut(r,e){return i(),d("div",At,Nt)}const Vt=g(Rt,[["render",Ut]]),Bt={},Gt={class:"card-body"},Ht=S('<div class="mb-3 card-title d-flex align-items-center justify-content-between f-18 text-primary" id=""><span>Request</span></div><div class="contents"><div class="mb-0 mb-3 border-0 card bg-orange-lighten box-shadow-sm"><div class="p-2 card-body"><div class="request-content d-flex align-items-center justify-content-between"><p class="fs-12 text-muted">Document Update</p><div class="d-flex align-items-center"><span class="me-1">20</span><i class="fa fa-arrow-up arrow-cross-down"></i></div></div></div></div><div class="mb-0 mb-3 border-0 card bg-sky-lighten box-shadow-sm"><div class="p-2 card-body"><div class="request-content d-flex align-items-center justify-content-between"><p class="fs-12 text-muted">Document Update</p><div class="d-flex align-items-center"><span class="me-1">20</span><i class="fa fa-arrow-up arrow-cross-down"></i></div></div></div></div><div class="mb-0 mb-3 border-0 card bg-yellow-lighten box-shadow-sm"><div class="p-2 card-body"><div class="request-content d-flex align-items-center justify-content-between"><p class="fs-12 text-muted">Document Update</p><div class="d-flex align-items-center"><span class="me-1">20</span><i class="fa fa-arrow-up arrow-cross-down"></i></div></div></div></div><div class="mb-0 mb-3 border-0 card bg-blue-lighten box-shadow-sm"><div class="p-2 card-body"><div class="request-content d-flex align-items-center justify-content-between"><p class="fs-12 text-muted">Reimbursement</p><div class="d-flex align-items-center"><span class="me-1">5</span><i class="fa fa-arrow-up arrow-cross-down"></i></div></div></div></div><div class="mb-0 mb-3 border-0 card bg-orange-lighten box-shadow-sm"><div class="p-2 card-body"><div class="request-content d-flex align-items-center justify-content-between"><p class="fs-12 text-muted">Leave Request</p><div class="d-flex align-items-center"><span class="me-1">10</span><i class="fa fa-arrow-up arrow-cross-down"></i></div></div></div></div></div>',2),Ot=[Ht];function zt(r,e){return i(),d("div",Gt,Ot)}const It=g(Bt,[["render",zt]]),Wt={},Ft={class:"card-body"},Kt=S('<div class="mb-3 card-title d-flex align-items-center justify-content-between f-18 text-primary" id=""><span>Employee</span></div><div class="contents list-style-none employee-contents"><div class="mb-0 mb-3 border card box-shadow-sm"><div class="p-2 card-body"><div class="employee-content d-flex align-items-center justify-content-between"><div class=""><p class="fs-13 text-dark">Design Team</p><p class="fs-10 text-muted">Total Members:10</p></div><div class="zee-cards-wrapper"><ul class="zee-cards"><li><div class="user-img"><div class="icons img-xs bg-blue-lighten"><i class="fas fa-users blue-darken"></i></div></div></li><li><div class="user-img"><div class="icons img-xs bg-green-lighten"><i class="fas fa-users blue-darken"></i></div></div></li><li><div class="user-img"><div class="icons img-xs bg-pink-lighten"><i class="fas fa-users blue-darken"></i></div></div></li><li><div class="user-img"><div class="icons img-xs bg-blue-lighten"><i class="fas fa-users blue-darken"></i></div></div></li><li><div class="user-img"><div class="icons img-xs bg-green-lighten"><i class="fas fa-users blue-darken"></i></div></div></li></ul></div></div></div></div></div>',2),Jt=[Kt];function Qt(r,e){return i(),d("div",Ft,Jt)}const Xt=g(Wt,[["render",Qt]]),Yt={class:"row"},Zt={class:"col-sm-12 col-md-6 col-xl-9 col-lg-9 col-xxl-9"},sa={class:"row"},ea={class:"row"},ta={class:"col-sm-12 col-md-12 col-xl-7 col-lg-7 col-xxl-7"},aa={class:"row"},oa={class:"col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12"},ca={class:"col-sm-12 col-md-6 col-xl-3 col-lg-3 col-xxl-3"},ia={class:"mb-3 border-0 request-wrapper card w-100 box-shadow-md"},la={class:"mb-3 border-0 employee-wrapper card w-100 box-shadow-md"},na={__name:"hr_dashboard",setup(r){return(e,a)=>(i(),d("div",Yt,[s("div",Zt,[s("div",sa,[o(yt)]),s("div",ea,[o(jt),s("div",ta,[s("div",aa,[o(Tt),s("div",oa,[o(Vt)])])])])]),s("div",ca,[s("div",ia,[o(It)]),s("div",la,[o(Xt)])])]))}},da={class:"my-3 event-wrapper"},ra={class:"mb-0 overflow-x-hidden overflow-y-auto border-0 card"},ma={class:"card-body"},_a=s("div",{class:"mb-3 f-18 text-primary",id:""},[s("span",{class:"text-primary font-semibold fs-5"},"Events")],-1),pa={class:"grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4",style:{display:"grid"}},va={class:"card-body flex"},ua={class:"text-left",style:{width:"170px"}},ha={class:"text-muted fw-bold f-15",style:{width:"210px"}},fa={class:"f-14 fw-bold text-orange program-day mt-2"},ba=s("div",null,[s("i",{style:{"font-size":"23px",transform:"rotate(45deg)",position:"absolute",opacity:"0.4",right:"4px",top:"3px"},class:"fa text-orange fa-birthday-cake"}),s("i",{style:{"font-size":"20px",position:"absolute",top:"20px",right:"4px"},class:"f-15 fa fa-commenting-o text-right my-5 cursor-pointer","data-bs-target":"#wishes_popup","data-bs-toggle":"modal"})],-1),xa=s("div",{id:"wishes_popup",class:"modal fade",role:"dialog"},[s("div",{class:"modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md"},[s("div",{class:"modal-content"},[s("div",{class:"py-2 border-0 modal-header"},[s("h6",{class:"modal-title"}," Wishes Text"),s("button",{type:"button",class:"bg-transparent border-0 outline-none close h3","data-bs-dismiss":"modal","aria-label":"Close"},[s("span",{"aria-hidden":"true"},"×")])]),s("div",{class:"modal-body"},[s("textarea",{name:"",id:"",cols:"",placeholder:"Commants here....",rows:"2",class:"resize-none form-control"}),s("div",{class:"text-end"},[s("button",{class:"mt-2 btn btn-border-orange",id:""},[s("i",{class:"fa fa-paper-plane me","aria-hidden":"true"}),B(" Send")])])])])])],-1),ga={__name:"events",setup(r){const e=k();return u("h-10"),(a,m)=>(i(),d(f,null,[s("div",da,[s("div",ra,[s("div",ma,[_a,s("div",pa,[(i(!0),d(f,null,C(v(e).allEventSource,c=>(i(),d("div",{class:"mb-3 card left-line",key:c},[s("div",va,[s("div",null,[s("div",ua,[s("p",ha,n(c.name),1),s("p",fa,n(v(T)(c.dob).format("DD"))+"th "+n(v(T)(c.dob).format("MMM")),1)])]),ba])]))),128))])])])]),xa],64))}},ya=s("h5",{style:{"text-align":"center"}},"Please wait...",-1),wa={class:"dashboard-wrapper mt-30"},$a=s("div",{class:"mb-2 card left-line"},[s("div",{class:"pt-1 pb-0 card-body"},[s("ul",{class:"nav nav-pills nav-tabs-dashed",role:"tablist"},[s("li",{class:"nav-item text-muted me-5",role:"presentation"},[s("a",{class:"pb-2 nav-link active","data-bs-toggle":"tab",href:"#dashboard","aria-selected":"true",role:"tab"}," Dashboard ")]),s("li",{class:"nav-item text-muted",role:"presentation"},[s("a",{class:"pb-2 nav-link","data-bs-toggle":"tab",href:"#hrDashboard","aria-selected":"true",role:"tab"}," HR Dashboard ")])])])],-1),ka={class:"tab-content",id:"pills-tabContent"},Da={class:"tab-pane show fade active",id:"dashboard",role:"tabpanel","aria-labelledby":"pills-profile-tab"},Sa={class:"tab-pane show fade",id:"hrDashboard",role:"tabpanel","aria-labelledby":"pills-profile-tab"},ja={class:"row"},Ca={class:"col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12"},qa={class:"row"},La={class:"col-sm-12 col-md-12 col-lg-12 col-xl-12 ipad-query"},Ma={__name:"dashboard",setup(r){const e=k(),a=u();return j(async()=>{a.value=!0,await e.getMainDashboardData(),q(),a.value=!1}),(m,c)=>{const _=$("ProgressSpinner"),l=$("Dialog");return i(),d(f,null,[o(l,{header:"Header",visible:a.value,"onUpdate:visible":c[0]||(c[0]=b=>a.value=b),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:D(()=>[o(_,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:D(()=>[ya]),_:1},8,["visible"]),s("div",wa,[$a,s("div",ka,[s("div",Da,[o(ft)]),s("div",Sa,[o(na)]),s("div",ja,[s("div",Ca,[s("div",qa,[s("div",La,[o(ga)])])])])])])],64)}}},t=G(Ma),Pa=Z();t.use(H,{ripple:!0});t.use(cs);t.use(O);t.use(os);t.use(Pa);t.directive("tooltip",ss);t.directive("badge",A);t.directive("ripple",z);t.directive("styleclass",es);t.directive("focustrap",I);t.directive("badge",A);t.component("Button",W);t.component("DataTable",ts);t.component("Column",as);t.component("ColumnGroup",ns);t.component("Row",ls);t.component("Toast",F);t.component("ConfirmDialog",K);t.component("Dropdown",J);t.component("InputText",Q);t.component("Dialog",X);t.component("ProgressSpinner",is);t.component("Calendar",ds);t.component("Textarea",rs);t.component("Chips",ms);t.component("Badge",ps);t.component("MultiSelect",_s);t.component("Carousel",vs);t.component("Galleria",us);t.mount("#Dashboard");