import{X as ee,Y as O,G as _,a as F,H as ae,b as f,j as c,w as g,T as te,_ as t,F as B,i as D,o as u,e as A,d as b,g as e,t as R,k as T,$ as oe,h as le,ad as M,l as x,I as se,P as de,J as ne,R as ie,v as ce}from"./toastservice.esm-ff79619d.js";import{d as _e,c as re}from"./pinia-e39f389a.js";import{T as me,B as ue,S as ve,b as pe,a as fe}from"./styleclass.esm-acd49ef4.js";import"./blockui.esm-1dabbb5a.js";import{C as ye,F as be,b as he,s as ge,a as xe}from"./inputtext.esm-bd794c3c.js";import{s as De}from"./confirmdialog.esm-d1afd8ff.js";import{D as we}from"./dialogservice.esm-dfc0f2ec.js";import{s as ke}from"./toast.esm-63c774c5.js";import{s as Ve}from"./progressspinner.esm-f85480e1.js";import{s as Se}from"./row.esm-6ebc942e.js";import{s as Ce}from"./columngroup.esm-9dd1458e.js";import{s as Te}from"./calendar.esm-574ff4c9.js";import{s as Ye}from"./textarea.esm-882368eb.js";import{s as Ie}from"./chips.esm-604844fa.js";import{s as Me}from"./multiselect.esm-9c541246.js";import{A as Ue}from"./ABS_loading_spinner-3361e64b.js";import{h as w}from"./moment-fbc5633a.js";import"./_plugin-vue_export-helper-c27b6911.js";const Fe=_e("Service",()=>{const k=ee(),s=O({current_login_user:"",selected_leave:"",full_day_leave_date:"",half_day_leave_date:"",half_day_leave_session:"",radiobtn_full_day:"",radiobtn_half_day:"",radiobtn_custom:"",custom_start_date:"",custom_end_date:"",custom_total_days:"",permission_start_time:"",permission_total_time:"",permission_end_time:"",compensatory_leaves:"",compensatory_leaves_dates:"",selected_compensatory_leaves:"",compensatory_start_date:"",compensatory_total_days:"",compensatory_end_date:"",notifyTo:"",leave_reason:"",leave_request_error_messege:""}),a=_(!0),h=_(!0),o=_(!1),v=_(!1),r=_(!1),m=_(!1),p=_(),S=_();let Y=new Date;const U=_(!1),C=_(!1),l=_(!1),q=_(!1);let E=new Date;E.setDate(Y.getDate()-1),p.value=[Y,E];const j=_(),H=()=>{s.radiobtn_full_day=="full_day"?h.value=!0:h.value=!1,h.value=!0,v.value=!1,r.value=!1,o.value=!1,m.value=!1},z=()=>{s.radiobtn_half_day=="half_day"?o.value=!0:o.value=!1,v.value=!1,r.value=!1,h.value=!1,m.value=!1,o.value=!0},W=()=>{s.radiobtn_custom=="custom"?v.value=!0:v.value=!1,v.value=!0,r.value=!1,o.value=!1,h.value=!1,m.value=!1},G=()=>{v.value==!0&&(s.custom_start_date.length<0||s.custom_start_date=="")&&k.add({severity:"info",summary:"Info Message",detail:"Select Start date",life:3e3}),r.value==!0&&(s.permission_start_time<0||s.permission_start_time=="")&&k.add({severity:"info",summary:"Info Message",detail:"Select Start Time",life:3e3}),new Date().toJSON().slice(0,10);var i=new Date(s.custom_start_date);console.log(s.custom_start_date);var y=new Date(s.custom_end_date);console.log(s.custom_end_date);var I=y.getTime()-i.getTime();console.log("Differenece"+I);var L=(I/(1e3*60*60*24)).toFixed(0);let V=L;console.log(V),s.custom_total_days=parseInt(V)+1,console.log(s.custom_total_days);var $=new Date(s.compensatory_start_date);console.log(s.compensatory_start_date);var Z=new Date(s.compensatory_end_date);console.log(s.compensatory_end_date);var I=Z.getTime()-$.getTime();console.log("Differenece"+I);var L=(I/(1e3*60*60*24)).toFixed(0);let N=L;console.log(N),s.compensatory_total_days=parseInt(N)+1,console.log(s.compensatory_total_days)},J=()=>{console.log(s.permission_start_time),console.log(s.permission_end_time);let i=new Date(s.permission_start_time).getTime(),y=new Date(s.permission_end_time).getTime();console.log("start"+i,"end"+y);var V=((y-i)/1e3/60/60).toFixed(0);s.permission_total_time=V,console.log(V)},K=()=>{s.selected_leave.includes("Permission")?(r.value=!0,a.value=!1,o.value=!1,v.value=!1,m.value=!1):s.selected_leave.includes("Compensatory")?(m.value=!0,r.value=!1,h.value=!1,o.value=!1,v.value=!1,a.value=!1,P(),s.compensatory_leaves_dates=w(s.compensatory_leaves.emp_attendance_date).format("dddd DD-MMM-YYYY"),console.log("kn"+s.compensatory_leaves.emp_attendance_date)):s.selected_leave=="Select"?(m.value=!1,r.value=!1,h.value=!0,o.value=!1,v.value=!1,a.value=!0):(r.value=!1,m.value=!1,a.value=!0)},X=()=>{F.get("/currentUser").then(i=>{s.current_login_user=i.data,C.value=!1}).catch(i=>{console.log(i)})},Q=()=>{F.get("/fetch-leave-policy-details").then(i=>{console.log(i.data),S.value=i.data})},P=()=>{let i=s.current_login_user;F.get(`/fetch-employee-unused-compensatory-days/${i}`).then(y=>{s.compensatory_leaves=y.data}).catch(y=>{console.log(y)})},d=O({leave_type_id:1,leave_Request_date:w().format("YYYY-MM-DD  HH:mm:ss"),leave_type_name:"",leave_session:"",start_date:"",end_date:"",no_of_days:"",hours_diff:"",notify_to:"",leave_reason:"",compensatory_leave_id:[]});return{leave_data:s,invalidDate:E,today:Y,invalidDates:p,toast:k,leave_Request_data:d,leave_types:S,data_checking:C,Email_Service:l,Email_Error:q,selected_compensatory_leaves:j,half_day:z,full_day:H,custom_day:W,Permission:K,Submit:()=>{if(d.leave_type_name=s.selected_leave,s.radiobtn_full_day=="full_day")console.log("Full day leave : "+s.full_day_leave_date),d.no_of_days=1,d.start_date=w(s.full_day_leave_date).format("YYYY-MM-DD"),d.end_date=d.start_date,d.leave_session="";else if(s.radiobtn_half_day=="half_day")if(console.log("Applying half-day leave on : "+s.half_day_leave_date),d.no_of_days=.5,console.log("half day leave date"+s.half_day_leave_date),d.start_date=w(s.half_day_leave_date).format("YYYY-MM-DD"),d.end_date=d.start_date,s.half_day_leave_session=="forenoon")d.leave_session="FN";else if(s.half_day_leave_session=="afternoon")d.leave_session="AN";else{k.add({severity:"info",summary:"Select Session",detail:"Select Leave Session",life:3e3});return}else if(s.radiobtn_custom=="custom")d.start_date=w(s.custom_start_date).format("YYYY-MM-DD"),d.end_date=w(s.custom_end_date).format("YYYY-MM-DD"),d.no_of_days=s.custom_total_days,d.leave_session="";else if(s.selected_leave.includes("Compensatory")){d.start_date=w(s.compensatory_start_date).format("YYYY-MM-DD"),d.end_date=w(s.compensatory_end_date).format("YYYY-MM-DD"),d.no_of_days=s.compensatory_total_days;let i=Object.values(s.selected_compensatory_leaves).length;console.log("Selected Compensatory No.of days : "+s.compensatory_total_days),console.log("Selected Compensatory Leaves : "+i);const y=Object.values(s.selected_compensatory_leaves);if(parseInt(s.compensatory_total_days)!=i){k.add({severity:"info",summary:"Error",detail:"Compensatory leaves doesnt match with available leave days",life:3e3});return}else y.map(V=>{let $=V.emp_attendance_id;d.compensatory_leave_id.push($),console.log(d.compensatory_leave_id)})}else k.add({severity:"info",summary:"Info Message",detail:"Select Leave",life:3e3});d.notify_to=s.notifyTo,d.leave_reason=s.leave_reason,U.value=!0,console.log(d),C.value=!0,F.post("/applyLeaveRequest",{leave_request_date:d.leave_Request_date,leave_type_name:d.leave_type_name,leave_session:d.leave_session,start_date:d.start_date,end_date:d.end_date,no_of_days:d.no_of_days,hours_diff:d.hours_diff,compensatory_work_days_ids:d.compensatory_leave_id,notify_to:d.notify_to,leave_reason:d.leave_reason}).then(i=>{C.value=!1,i.data.status=="success"?l.value=!0:i.data.status=="failure"&&(s.leave_request_error_messege=i.data.message,q.value=!0),console.log("Email status"+i.data.status)}).catch(i=>{console.log(i)})},ReloadPage:()=>{location.reload()},dayCalculation:G,time_difference:J,get_user:X,get_leave_types:Q,get_compensatroy_leaves:P,full_day_format:h,half_day_format:o,custom_format:v,Permission_format:r,compensatory_format:m,TotalNoOfDays:a,RequiredField:U}});const Re=e("h5",{class:"m-auto"},"Leave applied Successfully",-1),Ee={class:"text-center"},$e={class:"m-auto"},Le={class:"text-center"},qe=e("h6",{class:"modal-title mb-4 fs-21"}," Leave Request",-1),Pe={class:"row"},Ne={class:"col-md-6 col-sm-12"},Oe={class:"row mb-3"},Be=e("div",{class:"col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0 mb-3"},[e("label",{for:""},[x("Choose Leave Type "),e("span",{class:"text-danger"},"*")])],-1),Ae={class:"col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0 mb-3"},je={class:"form-group"},He=e("option",{selected:""},"Select Leave Type",-1),ze={key:0,class:"row mb-3"},We=e("div",{class:"col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0 mb-3"},[e("label",{for:""},[x("No of Days"),e("span",{class:"text-danger"},"*")])],-1),Ge={class:"col-md-12 col-sm-12 col-lg-8 col-xl-7 col-xxl-6 mb-md-0 mb-3"},Je={class:"form-check form-check-inline"},Ke=e("label",{class:"form-check-label leave_type ms-2",for:"full_day"},"Full Day",-1),Xe={class:"form-check form-check-inline"},Qe=e("label",{class:"form-check-label leave_type ms-2",for:"half_day"},"Half Day",-1),Ze={class:"form-check form-check-inline"},ea=e("label",{class:"form-check-label leave_type ms-2",for:"custom"},"Custom",-1),aa={key:1,class:"row mb-3"},ta=e("div",{class:"col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0 mb-3"},[e("label",{for:""},[x("Date"),e("span",{class:"text-danger"},"*")])],-1),oa={class:"col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0 mb-3"},la={key:2,class:"row mb-3"},sa=e("div",{class:"col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0 mb-3"},[e("label",{for:""},[x("Date"),e("span",{class:"text-danger"},"*")])],-1),da={class:"col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0 mb-3"},na={key:3,class:"row mb-3"},ia=e("div",{class:"col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0 mb-3"},[e("div",{class:"form-group"},[e("label",{for:""},[x("Session"),e("span",{class:"text-danger"},"*")])])],-1),ca={class:"col-md-12 col-sm-12 col-lg-8 col-xl-7 col-xxl-7 mb-md-0 mb-3 ms-6"},_a={class:"form-group"},ra={class:"form-check form-check-inline"},ma=e("label",{class:"form-check-label leave_type ms-3",for:"forenoon"},"Forenoon",-1),ua={class:"form-check form-check-inline"},va=e("label",{class:"form-check-label leave_type ms-3",for:"afternoon"},"Afternoon",-1),pa={key:4,class:"row mb-3"},fa={class:"col-md-1 col-sm-1 col-lg-3 col-xl-4 col-xxl-3 mb-md-0 mb-3"},ya={class:"form-group"},ba={class:"floating"},ha=e("label",{for:"",class:"float-label"},"Start Date",-1),ga=e("br",null,null,-1),xa={class:"col-md-1 col-sm-1 col-lg-6 col-xl-4 col-xxl-5 mb-md-0 mb-3"},Da={class:"form-group"},wa={class:"floating",style:{"text-align":"center"}},ka=e("label",{for:"",class:"float-label"},"Total Days",-1),Va={class:"col-md-1 col-sm-1 col-lg-3 col-xl-4 col-xxl-3 mb-md-0 mb-3"},Sa={class:"form-group"},Ca={class:"floating"},Ta=e("label",{for:"",class:"float-label"},"End Day",-1),Ya=e("br",null,null,-1),Ia={key:5,class:"row mb-2"},Ma={class:"col-md-4 mb-md-0 mb-3"},Ua={class:"form-group"},Fa={class:"floating"},Ra=e("label",{for:"",class:"float-label"},"Start time",-1),Ea={class:"p-input-icon-right"},$a=e("i",{class:"pi pi-clock"},null,-1),La={class:"col-md-3 mb-md-0 mb-3 ms-5"},qa={class:"form-group"},Pa={class:"floating"},Na=e("label",{for:"",class:"float-label"},"Total Hour",-1),Oa={class:"col-md-4 mb-md-0 mb-3"},Ba={class:"form-group"},Aa={class:"floating"},ja=e("label",{for:"",class:"float-label"},"End time",-1),Ha={class:"p-input-icon-right"},za=e("i",{class:"pi pi-clock"},null,-1),Wa={key:6,class:"row mb-2"},Ga=e("div",{class:"col-md-12 col-sm-12 col-lg-5 col-xl-5 col-xxl-5 mb-md-0 mb-3"},[e("label",{for:""},[x("Worked Date "),e("span",{class:"text-danger"},"*")])],-1),Ja={class:"col-md-12 col-sm-12 col-lg-6 col-xl-6 col-xxl-6 mb-md-0 mb-3"},Ka={class:"py-2 px-3"},Xa=e("p",{class:"opacity-50 fs-10"},"(note:Worked dates will get expired after 60 days)",-1),Qa={class:"col-md-4 col-sm-12 col-lg-4 col-xl-4 col-xxl-3 mb-md-0 mb-3"},Za=e("div",{class:"col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12"},[e("label",{for:"",class:"float-label"},"Start Date")],-1),et={class:"col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12"},at={class:"col-md-1 col-sm-1 col-lg-6 col-xl-4 col-xxl-5 mb-md-0 mb-3"},tt={class:"form-group"},ot={class:"floating",style:{"text-align":"center"}},lt=e("label",{for:"",class:"float-label"},"Total Days",-1),st={class:"col-md-4 col-sm-12 col-lg-4 col-xl-4 col-xxl-3 mb-3"},dt=e("div",{class:"col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12"},[e("label",{for:"",class:"float-label"},"End Day")],-1),nt={class:"col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12"},it={class:"row mb-3"},ct=e("div",{class:"col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0 mb-3"},[e("div",{class:"form-group"},[e("label",{for:""},[x("Notify to "),e("span",{class:"text-danger"},"*")])])],-1),_t={class:"col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0 mb-3"},rt={class:"form-group"},mt={class:"row mb-3"},ut=e("div",{class:"col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0 mb-3"},[e("div",{class:"form-group"},[e("label",{for:""},[x("Reason "),e("span",{class:"text-danger"},"*")])])],-1),vt={class:"col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0 mb-3"},pt={class:"form-group"},ft={class:"col-md-6 col-lg-5 col-sm-12"},yt={class:"col-lg-12 col-md-12"},bt={class:"text-center mt-6"},ht=["disabled"],gt={key:0},xt={__name:"LeaveApply",setup(k){const s=_(!1);_();const a=Fe();return ae(()=>{a.get_user(),a.get_leave_types(),a.leave_data.custom_start_date=new Date,a.leave_data.permission_start_time=new Date}),(h,o)=>{const v=D("Toast"),r=D("Button"),m=D("Dialog"),p=D("Calendar"),S=D("InputText"),Y=D("MultiSelect"),U=D("Chips"),C=D("Textarea");return u(),f(B,null,[c(v),c(r,{label:"Apply Leave",class:"bg-orange-500 border-none h-3rem",onClick:o[0]||(o[0]=l=>s.value=!0)}),c(te,{name:"modal"},{default:g(()=>[t(a).data_checking?(u(),A(Ue,{key:0})):b("",!0)]),_:1}),c(m,{header:"Header",visible:t(a).Email_Service,"onUpdate:visible":o[1]||(o[1]=l=>t(a).Email_Service=l),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:g(()=>[Re]),footer:g(()=>[e("div",Ee,[c(r,{label:"OK",style:{"justify-content":"center"},severity:"help",onClick:t(a).ReloadPage,raised:"",class:"justify-content-center"},null,8,["onClick"])])]),_:1},8,["visible"]),c(m,{header:"Header",visible:t(a).Email_Error,"onUpdate:visible":o[3]||(o[3]=l=>t(a).Email_Error=l),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:g(()=>[e("h5",$e,R(t(a).leave_data.leave_request_error_messege),1)]),footer:g(()=>[e("div",Le,[c(r,{label:"OK",style:{"justify-content":"center"},severity:"help",onClick:o[2]||(o[2]=l=>t(a).Email_Error=!1),raised:"",class:"justify-content-center"})])]),_:1},8,["visible"]),c(m,{visible:s.value,"onUpdate:visible":o[31]||(o[31]=l=>s.value=l),style:{width:"80vw"},breakpoints:{"960px":"75vw","641px":"100vw"}},{header:g(()=>[qe]),default:g(()=>[e("div",Pe,[e("div",Ne,[e("div",Oe,[Be,e("div",Ae,[e("div",je,[T(e("select",{style:{height:"38px","font-weight":"500"},name:"",id:"leave_type_id","aria-label":"Default select example",class:"form-select outline-none","onUpdate:modelValue":o[4]||(o[4]=l=>t(a).leave_data.selected_leave=l),onChange:o[5]||(o[5]=(...l)=>t(a).Permission&&t(a).Permission(...l))},[He,(u(!0),f(B,null,le(t(a).leave_types,l=>(u(),f("option",{key:l.id},R(l.leave_type),1))),128))],544),[[oe,t(a).leave_data.selected_leave]])])])]),t(a).TotalNoOfDays?(u(),f("div",ze,[We,e("div",Ge,[e("div",Je,[T(e("input",{style:{height:"20px",width:"20px"},class:"form-check-input",type:"radio",name:"leave",id:"full_day",value:"full_day","onUpdate:modelValue":o[6]||(o[6]=l=>t(a).leave_data.radiobtn_full_day=l),onClick:o[7]||(o[7]=(...l)=>t(a).full_day&&t(a).full_day(...l))},null,512),[[M,t(a).leave_data.radiobtn_full_day]]),Ke]),e("div",Xe,[T(e("input",{style:{height:"20px",width:"20px"},class:"form-check-input",type:"radio",name:"leave",id:"half_day",value:"half_day","onUpdate:modelValue":o[8]||(o[8]=l=>t(a).leave_data.radiobtn_half_day=l),onClick:o[9]||(o[9]=(...l)=>t(a).half_day&&t(a).half_day(...l))},null,512),[[M,t(a).leave_data.radiobtn_half_day]]),Qe]),e("div",Ze,[T(e("input",{style:{height:"20px",width:"20px"},class:"form-check-input",type:"radio",name:"leave",id:"custom",value:"custom","onUpdate:modelValue":o[10]||(o[10]=l=>t(a).leave_data.radiobtn_custom=l),onClick:o[11]||(o[11]=(...l)=>t(a).custom_day&&t(a).custom_day(...l))},null,512),[[M,t(a).leave_data.radiobtn_custom]]),ea])])])):b("",!0),t(a).full_day_format?(u(),f("div",aa,[ta,e("div",oa,[c(p,{inputId:"icon",modelValue:t(a).leave_data.full_day_leave_date,"onUpdate:modelValue":o[12]||(o[12]=l=>t(a).leave_data.full_day_leave_date=l),dateFormat:"dd-mm-yy",showIcon:!0,style:{width:"350px"},minDate:new Date},null,8,["modelValue","minDate"])])])):b("",!0),t(a).half_day_format?(u(),f("div",la,[sa,e("div",da,[c(p,{inputId:"icon",modelValue:t(a).leave_data.half_day_leave_date,"onUpdate:modelValue":o[13]||(o[13]=l=>t(a).leave_data.half_day_leave_date=l),dateFormat:"dd-mm-yy",showIcon:!0,style:{width:"350px"},minDate:new Date},null,8,["modelValue","minDate"])])])):b("",!0),t(a).half_day_format?(u(),f("div",na,[ia,e("div",ca,[e("div",_a,[e("div",ra,[T(e("input",{style:{height:"20px",width:"20px"},class:"form-check-input",type:"radio",name:"session",id:"forenoon",value:"forenoon","onUpdate:modelValue":o[14]||(o[14]=l=>t(a).leave_data.half_day_leave_session=l)},null,512),[[M,t(a).leave_data.half_day_leave_session]]),ma]),e("div",ua,[T(e("input",{style:{height:"20px",width:"20px"},class:"form-check-input",type:"radio",name:"session",id:"afternoon",value:"afternoon","onUpdate:modelValue":o[15]||(o[15]=l=>t(a).leave_data.half_day_leave_session=l)},null,512),[[M,t(a).leave_data.half_day_leave_session]]),va])])])])):b("",!0),t(a).custom_format?(u(),f("div",pa,[e("div",fa,[e("div",ya,[e("div",ba,[ha,ga,c(p,{inputId:"icon",dateFormat:"dd-mm-yy",showIcon:!0,modelValue:t(a).leave_data.custom_start_date,"onUpdate:modelValue":o[16]||(o[16]=l=>t(a).leave_data.custom_start_date=l),minDate:new Date,manualInput:!0},null,8,["modelValue","minDate"])])])]),e("div",xa,[e("div",Da,[e("div",wa,[ka,c(S,{style:{width:"60px","text-align":"center",margin:"auto"},class:"form-onboard-form form-control textbox capitalize",type:"text",modelValue:t(a).leave_data.custom_total_days,"onUpdate:modelValue":o[17]||(o[17]=l=>t(a).leave_data.custom_total_days=l),readonly:""},null,8,["modelValue"])])])]),e("div",Va,[e("div",Sa,[e("div",Ca,[Ta,Ya,c(p,{inputId:"icon",onDateSelect:t(a).dayCalculation,dateFormat:"dd-mm-yy",showIcon:!0,modelValue:t(a).leave_data.custom_end_date,"onUpdate:modelValue":o[18]||(o[18]=l=>t(a).leave_data.custom_end_date=l),minDate:new Date},null,8,["onDateSelect","modelValue","minDate"])])])])])):b("",!0),t(a).Permission_format?(u(),f("div",Ia,[e("div",Ma,[e("div",Ua,[e("div",Fa,[Ra,e("span",Ea,[c(p,{inputId:"time12",modelValue:t(a).leave_data.permission_start_time,"onUpdate:modelValue":o[19]||(o[19]=l=>t(a).leave_data.permission_start_time=l),timeOnly:!0,hourFormat:"12",icon:"your-icon"},null,8,["modelValue"]),$a])])])]),e("div",La,[e("div",qa,[e("div",Pa,[Na,c(S,{class:"form-onboard-form form-control textbox capitalize",type:"text",style:{width:"67px","text-align":"center"},modelValue:t(a).leave_data.permission_total_time,"onUpdate:modelValue":o[20]||(o[20]=l=>t(a).leave_data.permission_total_time=l),readonly:""},null,8,["modelValue"])])])]),e("div",Oa,[e("div",Ba,[e("div",Aa,[ja,e("span",Ha,[c(p,{inputId:"time12",modelValue:t(a).leave_data.permission_end_time,"onUpdate:modelValue":o[21]||(o[21]=l=>t(a).leave_data.permission_end_time=l),timeOnly:!0,hourFormat:"12",icon:"your-icon",onDateSelect:t(a).time_difference},null,8,["modelValue","onDateSelect"]),za])])])])])):b("",!0),t(a).compensatory_format?(u(),f("div",Wa,[Ga,e("div",Ja,[c(Y,{modelValue:t(a).leave_data.selected_compensatory_leaves,"onUpdate:modelValue":o[22]||(o[22]=l=>t(a).leave_data.selected_compensatory_leaves=l),options:t(a).leave_data.compensatory_leaves,optionLabel:"emp_attendance_date",placeholder:"Select worked Date",display:"chip",class:"w-full md:w-full",maxSelectedLabels:5},{footer:g(()=>[e("div",Ka,[e("b",null,R(t(a).leave_data.selected_compensatory_leaves?t(a).leave_data.selected_compensatory_leaves.length:0),1),x(" Date"+R((t(a).leave_data.selected_compensatory_leaves?t(a).leave_data.selected_compensatory_leaves.length:0)>1?"s":"")+" selected. ",1)])]),_:1},8,["modelValue","options"]),Xa]),e("div",Qa,[Za,e("div",et,[c(p,{inputId:"icon",dateFormat:"dd-mm-yy",showIcon:!0,modelValue:t(a).leave_data.compensatory_start_date,"onUpdate:modelValue":o[23]||(o[23]=l=>t(a).leave_data.compensatory_start_date=l),minDate:new Date},null,8,["modelValue","minDate"])])]),e("div",at,[e("div",tt,[e("div",ot,[lt,c(S,{style:{width:"60px","text-align":"center",margin:"auto"},class:"form-onboard-form form-control textbox capitalize",type:"text",modelValue:t(a).leave_data.compensatory_total_days,"onUpdate:modelValue":o[24]||(o[24]=l=>t(a).leave_data.compensatory_total_days=l),readonly:""},null,8,["modelValue"])])])]),e("div",st,[dt,e("div",nt,[c(p,{onDateSelect:t(a).dayCalculation,inputId:"icon",dateFormat:"dd-mm-yy",showIcon:!0,modelValue:t(a).leave_data.compensatory_end_date,"onUpdate:modelValue":o[25]||(o[25]=l=>t(a).leave_data.compensatory_end_date=l),minDate:new Date},null,8,["onDateSelect","modelValue","minDate"])])])])):b("",!0),e("div",it,[ct,e("div",_t,[e("div",rt,[c(U,{class:"lg:w-1em",modelValue:t(a).leave_data.notifyTo,"onUpdate:modelValue":o[26]||(o[26]=l=>t(a).leave_data.notifyTo=l),separator:","},null,8,["modelValue"])])])]),e("div",mt,[ut,e("div",vt,[e("div",pt,[c(C,{autoResize:!0,rows:"3",cols:"90",placeholder:"Enter the Reason",modelValue:t(a).leave_data.leave_reason,"onUpdate:modelValue":o[27]||(o[27]=l=>t(a).leave_data.leave_reason=l),class:"form-control"},null,8,["modelValue"])])])])]),e("div",ft,[e("div",yt,[c(p,{inline:!0,showWeek:!0,style:{"min-width":"100%"}})]),e("div",bt,[e("button",{type:"button",class:"btn btn-border-primary",onClick:o[28]||(o[28]=l=>s.value=!1)},"Cancel"),e("button",{type:"button",id:"btn_request_leave",class:"btn btn-primary ms-4",disabled:!(t(a).leave_data.selected_leave.length>0&&t(a).leave_data.leave_reason),onClick:o[29]||(o[29]=(...l)=>t(a).Submit&&t(a).Submit(...l))}," Request Leave",8,ht)])])]),t(a).leave_data.leave_reason==""?(u(),A(m,{key:0,style:{width:"450px"},header:"Required",modal:!0,visible:t(a).RequiredField,"onUpdate:visible":o[30]||(o[30]=l=>t(a).RequiredField=l)},{default:g(()=>[t(a).leave_data.leave_reason==""?(u(),f("li",gt,"Leave Reason")):b("",!0)]),_:1},8,["visible"])):b("",!0)]),_:1},8,["visible"])],64)}}},n=se(xt),Dt=re();n.use(de,{ripple:!0});n.use(ye);n.use(ne);n.use(we);n.use(Dt);n.directive("tooltip",me);n.directive("badge",ue);n.directive("ripple",ie);n.directive("styleclass",ve);n.directive("focustrap",be);n.component("Button",ce);n.component("DataTable",pe);n.component("Column",fe);n.component("ColumnGroup",Ce);n.component("Row",Se);n.component("Toast",ke);n.component("ConfirmDialog",De);n.component("Dropdown",he);n.component("InputText",ge);n.component("Dialog",xe);n.component("ProgressSpinner",Ve);n.component("Calendar",Te);n.component("Textarea",Ye);n.component("Chips",Ie);n.component("MultiSelect",Me);n.mount("#vjs_leaveapply");
