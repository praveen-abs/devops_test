import{B as u,X as j,K as c,E as K,g as y,o as $,c as S,h as t,w as n,W as V,a0 as P,e,j as d,t as v,a8 as J,a9 as q,i as F,aa as W,a as N,n as M,G as te,P as oe,H as le,R as se,q as ae}from"./toastservice.esm-c4f6de4c.js";import{c as ne}from"./pinia-0f325ab3.js";import{T as ie,B as de,S as re,b as me,a as pe}from"./styleclass.esm-ea560a03.js";import"./blockui.esm-85692cd0.js";import{u as X,C as ce,F as ue,b as _e,s as fe,a as he}from"./inputtext.esm-5faf66bf.js";import{s as ge}from"./confirmdialog.esm-51539a4d.js";import{D as ve}from"./dialogservice.esm-b46cc252.js";import{s as ye}from"./toast.esm-8d255b70.js";import{s as be}from"./progressspinner.esm-455f2fd3.js";import{s as xe}from"./row.esm-6ebc942e.js";import{s as we}from"./columngroup.esm-9dd1458e.js";import{s as $e}from"./calendar.esm-7c3ebc21.js";import{s as Se}from"./checkbox.esm-0c0ced98.js";import{a as G}from"./index-f7a317fc.js";import{_ as z}from"./_plugin-vue_export-helper-c27b6911.js";import{_ as Te}from"./Holidays_Lists-e5bd0ba9.js";import"./moment-fbc5633a.js";const A=w=>(J("data-v-e50d50c8"),w=w(),q(),w),ke={class:"w-full"},Ve=A(()=>e("h5",{style:{"text-align":"center"}},"Please wait...",-1)),Pe=A(()=>e("h5",{style:{"text-align":"center"}},"Please wait...",-1)),Le=A(()=>e("div",{class:"confirmation-content"},[e("i",{class:"mr-3 pi pi-exclamation-triangle",style:{"font-size":"2rem"}}),e("span",null,"Proceed to save the shift details?")],-1)),Ae={class:"flex px-4 pt-6 gap-9"},De=A(()=>e("span",{class:"text-lg font-semibold"},"Shift Name",-1)),Ce={class:"mx-2"},Ne=A(()=>e("span",{class:"text-lg font-semibold"},"Shift Code",-1)),Ue={class:"mx-2"},Re={class:"flex my-2"},Ee=A(()=>e("p",{class:"text-lg font-semibold"},"Is Default",-1)),Ie=A(()=>e("div",{class:"flex mx-4 my-6"},[e("span",{class:"text-lg font-semibold"},"Assign To"),e("span",{class:"p-2 mx-4 my-auto mb-5 rounded-lg bg-red-50 fotn-bold"},[e("strong",{class:"text-orange-300"},"Note:"),d(" Particular employees cannot be assigned to more than one shift unless he or she is assigned to a flexible shift.")])],-1)),Me={class:"flex justify-between mx-4"},Oe={class:"mx-4"},Fe=A(()=>e("div",{class:"my-3 text-end"},[e("button",{class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4"},"Save"),e("button",{class:"px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md"},"Next")],-1)),We={__name:"Att_AssignWorkShifts",setup(w){let l=u(),a=u(!1),o=u(!1),s=u(),h=u();X(),j();const p=u(),g=u([{name:"New York",code:"NY"},{name:"Rome",code:"RM"},{name:"London",code:"LDN"},{name:"Istanbul",code:"IST"},{name:"Paris",code:"PRS"}]),U=u({global:{value:null,matchMode:c.CONTAINS},emp_code:{value:null,matchMode:c.STARTS_WITH,matchMode:c.EQUALS,matchMode:c.CONTAINS},employee_name:{value:null,matchMode:c.STARTS_WITH,matchMode:c.EQUALS,matchMode:c.CONTAINS},designation:{value:null,matchMode:c.STARTS_WITH,matchMode:c.EQUALS,matchMode:c.CONTAINS},department_name:{value:null,matchMode:c.STARTS_WITH,matchMode:c.EQUALS,matchMode:c.CONTAINS},location:{value:null,matchMode:c.STARTS_WITH,matchMode:c.EQUALS,matchMode:c.CONTAINS}}),b=u(!0);let L=null;K(()=>{f()});function f(){let k=window.location.origin+"/attendance_settings/fetch-emp-details";console.log("AJAX URL : "+k),G.get(k).then(m=>{console.log("Axios : "+m.data),l.value=m.data,b.value=!1})}function E(k){a.value=!1,k&&T()}function T(){L=null}function O(){const k=[];return _.flatMap(s.value,function(m){k.push(m.user_id)}),k}function D(){E(!1),o.value=!0,console.log("Processing Rowdata : "+JSON.stringify(L));let k=O();G.post(window.location.origin+"/attendance_settings/save-shiftdetails",{selectedEmployees:k,workshift_name:h.value}).then(m=>{console.log(m),f(),o.value=!1,T()}).catch(m=>{o.value=!1,T(),console.log(m.toJSON())})}return(k,m)=>{const i=y("Toast"),Q=y("ProgressSpinner"),H=y("Dialog"),Y=y("Button"),B=y("InputText"),Z=y("Checkbox"),I=y("Dropdown"),C=y("Column"),ee=y("DataTable");return $(),S("div",ke,[t(i),t(H,{header:"Header",visible:b.value,"onUpdate:visible":m[0]||(m[0]=r=>b.value=r),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:n(()=>[t(Q,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:n(()=>[Ve]),_:1},8,["visible"]),t(H,{header:"Header",visible:V(o),"onUpdate:visible":m[1]||(m[1]=r=>P(o)?o.value=r:o=r),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:n(()=>[t(Q,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:n(()=>[Pe]),_:1},8,["visible"]),t(H,{header:"Confirmation",visible:V(a),"onUpdate:visible":m[4]||(m[4]=r=>P(a)?a.value=r:a=r),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"350px"},modal:!0},{footer:n(()=>[t(Y,{label:"Yes",icon:"pi pi-check",onClick:m[2]||(m[2]=r=>D()),class:"p-button-text",autofocus:""}),t(Y,{label:"No",icon:"pi pi-times",onClick:m[3]||(m[3]=r=>E(!0)),class:"p-button-text"})]),default:n(()=>[Le]),_:1},8,["visible"]),e("div",Ae,[e("div",null,[De,e("span",Ce,[t(B,{type:"text",modelValue:V(h),"onUpdate:modelValue":m[5]||(m[5]=r=>P(h)?h.value=r:h=r),placeholder:"Enter the shift name"},null,8,["modelValue"])])]),e("div",null,[Ne,e("span",Ue,[t(B,{type:"text",modelValue:k.txt_shift_start_time,"onUpdate:modelValue":m[6]||(m[6]=r=>k.txt_shift_start_time=r),placeholder:"Enter the shift code"},null,8,["modelValue"])])]),e("div",Re,[Ee,t(Z,{class:"mx-3",binary:!0})])]),Ie,e("div",Me,[t(I,{modelValue:p.value,"onUpdate:modelValue":m[7]||(m[7]=r=>p.value=r),options:g.value,optionLabel:"name",placeholder:"Select a Department",class:"w-full md:w-14rem"},null,8,["modelValue","options"]),t(I,{modelValue:p.value,"onUpdate:modelValue":m[8]||(m[8]=r=>p.value=r),options:g.value,optionLabel:"name",placeholder:"Select a Designation",class:"w-full md:w-14rem"},null,8,["modelValue","options"]),t(I,{modelValue:p.value,"onUpdate:modelValue":m[9]||(m[9]=r=>p.value=r),options:g.value,optionLabel:"name",placeholder:"Select a Location",class:"w-full md:w-14rem"},null,8,["modelValue","options"]),t(I,{modelValue:p.value,"onUpdate:modelValue":m[10]||(m[10]=r=>p.value=r),options:g.value,optionLabel:"name",placeholder:"Select a State",class:"w-full md:w-14rem"},null,8,["modelValue","options"]),t(I,{modelValue:p.value,"onUpdate:modelValue":m[11]||(m[11]=r=>p.value=r),options:g.value,optionLabel:"name",placeholder:"Select a Legal Entity",class:"w-full md:w-14rem"},null,8,["modelValue","options"])]),e("div",Oe,[t(B,{type:"text",modelValue:V(h),"onUpdate:modelValue":m[12]||(m[12]=r=>P(h)?h.value=r:h=r),placeholder:"Search...",class:"my-4"},null,8,["modelValue"]),t(ee,{value:V(l),selection:V(s),"onUpdate:selection":m[13]||(m[13]=r=>P(s)?s.value=r:s=r),paginator:!0,rows:2,dataKey:"emp_code",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:U.value,"onUpdate:filters":m[14]||(m[14]=r=>U.value=r),filterDisplay:"menu",loading:k.loading2,globalFilterFields:["name","status"]},{empty:n(()=>[d(" No Employee found ")]),loading:n(()=>[d(" Loading employee data. Please wait. ")]),default:n(()=>[t(C,{selectionMode:"multiple"}),t(C,{field:"emp_code",header:"Employee ID",style:{"min-width":"2rem"}},{body:n(r=>[d(v(r.data.emp_code),1)]),_:1}),t(C,{field:"employee_name",header:"Employee Name",style:{"min-width":"8rem"}},{body:n(r=>[d(v(r.data.employee_name),1)]),_:1}),t(C,{field:"designation",header:"Designation",style:{"min-width":"10rem"}},{body:n(r=>[d(v(r.data.designation),1)]),_:1}),t(C,{style:{"min-width":"10rem"},field:"department_name",header:"Department"},{body:n(r=>[d(v(r.data.department_name),1)]),_:1}),t(C,{style:{"min-width":"10rem"},field:"work_location",header:"Location"},{body:n(r=>[d(v(r.data.work_location),1)]),_:1}),t(C,{style:{"min-width":"10rem"},field:"work_location",header:"State"},{body:n(r=>[d(v(r.data.work_location),1)]),_:1})]),_:1},8,["value","selection","filters","loading"])]),Fe])}}},He=z(We,[["__scopeId","data-v-e50d50c8"]]),Be={class:"w-full p-4 mx-5"},Ge={class:"flex gap-4 pt-4"},Qe=e("div",null,[e("input",{style:{height:"23px",width:"23px"},class:"mt-1 form-check-input",type:"radio",name:"leave"})],-1),Ye=e("div",null,[e("p",{class:"font-semibold py-auto"},"Apply Flexible Gross Hours")],-1),je={class:"flex"},Ke=e("p",{class:"mx-4 text-lg font-semibold text-gray-600 py-auto"},"Min",-1),Je={class:"p-3 my-5 rounded-lg bg-blue-50"},qe=e("div",{class:"flex gap-4 col-12"},[e("input",{style:{height:"20px",width:"20px"},class:"form-check-input",type:"radio",name:"leave"}),e("p",{class:"font-semibold"},"Apply Standard General Shift Timing")],-1),Xe={class:"flex mx-6 my-4 row"},ze={class:"flex gap-4 col-6"},Ze=e("div",null,[e("p",{class:"text-lg font-semibold py-auto"},"Shift Start Time")],-1),et={class:"flex gap-4 col-6"},tt=e("div",null,[e("p",{class:"text-lg font-semibold py-auto"},"Shift End Time")],-1),ot={class:"flex mx-6 my-4 row"},lt={class:"flex gap-1 col-6"},st=e("div",{class:""},[e("p",{class:"text-lg font-semibold py-auto"},"Week Off")],-1),at={class:"ml-7 col-9"},nt={class:"flex gap-1 col-6"},it=e("div",null,[e("p",{class:"text-lg font-semibold py-auto"},"Grace Time")],-1),dt={class:"ml-6 col-9"},rt=e("div",{class:"flex gap-4 p-2"},[e("input",{type:"checkbox",name:"",id:""}),e("p",{class:"text-lg font-semibold py-auto"},"Apply To All Days Except Week Off")],-1),mt=e("div",{class:"my-3 text-end"},[e("button",{class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4"},"Save"),e("button",{class:"px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4"},"Previous"),e("button",{class:"px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md"},"Next")],-1),pt={__name:"ShiftTimeRange",setup(w){return u("center"),u(!1),(l,a)=>{const o=y("InputText");return $(),S("div",Be,[e("div",Ge,[Qe,Ye,e("div",je,[t(o,{type:"text",modelValue:l.txt_shift_start_time,"onUpdate:modelValue":a[0]||(a[0]=s=>l.txt_shift_start_time=s),class:"w-8 h-10"},null,8,["modelValue"]),Ke])]),e("div",Je,[qe,e("div",Xe,[e("div",ze,[Ze,e("div",null,[t(o,{type:"text",modelValue:l.txt_shift_start_time,"onUpdate:modelValue":a[1]||(a[1]=s=>l.txt_shift_start_time=s),class:"h-10"},null,8,["modelValue"])])]),e("div",et,[tt,e("div",null,[t(o,{type:"text",modelValue:l.txt_shift_start_time,"onUpdate:modelValue":a[2]||(a[2]=s=>l.txt_shift_start_time=s),class:"h-10"},null,8,["modelValue"])])])]),e("div",ot,[e("div",lt,[st,e("div",at,[t(o,{type:"text",modelValue:l.txt_shift_start_time,"onUpdate:modelValue":a[3]||(a[3]=s=>l.txt_shift_start_time=s),class:"h-10"},null,8,["modelValue"])])]),e("div",nt,[it,e("div",dt,[t(o,{type:"text",modelValue:l.txt_shift_start_time,"onUpdate:modelValue":a[4]||(a[4]=s=>l.txt_shift_start_time=s),class:"h-10"},null,8,["modelValue"])])])]),rt]),mt])}}},ct={class:"w-full p-6 mx-5"},ut={class:"flex gap-4 pt-4"},_t=e("div",null,[e("input",{style:{height:"23px",width:"23px"},class:"mt-1 form-check-input",type:"radio",name:"leave"})],-1),ft=e("div",null,[e("p",{class:"font-semibold py-auto"},"Apply Flexible Gross Break")],-1),ht={class:"flex"},gt=e("p",{class:"mx-4 text-lg font-semibold text-gray-600 py-auto"},"Min",-1),vt={class:"p-4 my-5 rounded-lg bg-blue-50"},yt=e("div",{class:"flex gap-4 col-12"},[e("input",{style:{height:"20px",width:"20px"},class:"form-check-input",type:"radio",name:"leave"}),e("p",{class:"font-semibold"},"Split The Break Down")],-1),bt={class:"flex mx-6 my-4 row"},xt={class:"flex gap-4 col-4"},wt=e("div",null,[e("p",{class:"my-auto text-lg font-semibold py-auto"},"Moring")],-1),$t={class:"flex gap-3"},St=e("p",{class:"text-lg font-semibold text-gray-600 py-auto"},"Mins",-1),Tt={class:"flex gap-4 col-4"},kt=e("div",null,[e("p",{class:"my-auto text-lg font-semibold py-auto"},"Lunch")],-1),Vt={class:"flex gap-3"},Pt=e("p",{class:"text-lg font-semibold text-gray-600 py-auto"},"Mins",-1),Lt={class:"flex gap-4 col-4"},At=e("div",null,[e("p",{class:"my-auto text-lg font-semibold py-auto"},"Evening")],-1),Dt={class:"flex gap-3"},Ct=e("p",{class:"text-lg font-semibold text-gray-600 py-auto"},"Mins",-1),Nt=e("div",{class:"flex gap-4 p-4"},[e("input",{type:"checkbox",name:"",id:""}),e("p",{class:"text-lg font-semibold py-auto"},"Apply To All Days Except Week Off")],-1),Ut=e("div",{class:"my-3 text-end"},[e("button",{class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4"},"Save"),e("button",{class:"px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4"},"Previous"),e("button",{class:"px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md"},"Next")],-1),Rt={__name:"BreakTimeRange",setup(w){return u("center"),u(!1),(l,a)=>{const o=y("InputText");return $(),S("div",ct,[e("div",ut,[_t,ft,e("div",ht,[t(o,{type:"text",modelValue:l.txt_shift_start_time,"onUpdate:modelValue":a[0]||(a[0]=s=>l.txt_shift_start_time=s),class:"w-8 h-10"},null,8,["modelValue"]),gt])]),e("div",vt,[yt,e("div",bt,[e("div",xt,[wt,e("div",$t,[t(o,{type:"text",modelValue:l.txt_shift_start_time,"onUpdate:modelValue":a[1]||(a[1]=s=>l.txt_shift_start_time=s),class:"w-8 h-10"},null,8,["modelValue"]),St])]),e("div",Tt,[kt,e("div",Vt,[t(o,{type:"text",modelValue:l.txt_shift_start_time,"onUpdate:modelValue":a[2]||(a[2]=s=>l.txt_shift_start_time=s),class:"w-8 h-10"},null,8,["modelValue"]),Pt])]),e("div",Lt,[At,e("div",Dt,[t(o,{type:"text",modelValue:l.txt_shift_start_time,"onUpdate:modelValue":a[3]||(a[3]=s=>l.txt_shift_start_time=s),class:"w-8 h-10"},null,8,["modelValue"]),Ct])])]),Nt]),Ut])}}},Et={class:"w-full p-6 my-4 shadow-sm rounded-xl bg-blue-50"},It={class:"flex gap-4 pt-1 row"},Mt=e("div",{class:"col-4"},[e("p",{class:"font-semibold py-auto"},"Half Day Minimum Working Hours Required")],-1),Ot={class:"flex gap-4 col-4"},Ft=e("p",{class:"mt-1 text-lg font-semibold text-gray-600 py-auto"},"Hrs",-1),Wt={class:"flex gap-4 pt-4 row"},Ht=e("div",{class:"col-4"},[e("p",{class:"font-semibold py-auto"},"Full Day Minimum Working Hours Required")],-1),Bt={class:"flex gap-4 col-4"},Gt=e("p",{class:"mt-1 text-lg font-semibold text-gray-600 py-auto"},"Hrs",-1),Qt=e("div",{class:"my-3 text-end"},[e("button",{class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4"},"Save"),e("button",{class:"px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4"},"Previous"),e("button",{class:"px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md"},"Next")],-1),Yt={__name:"WorkingHours",setup(w){return u("center"),u(!1),(l,a)=>{const o=y("InputText");return $(),S("div",Et,[e("div",It,[Mt,e("div",Ot,[t(o,{class:"w-8 h-11",type:"text",modelValue:l.txt_shift_start_time,"onUpdate:modelValue":a[0]||(a[0]=s=>l.txt_shift_start_time=s)},null,8,["modelValue"]),Ft])]),e("div",Wt,[Ht,e("div",Bt,[t(o,{class:"w-8 h-11",type:"text",modelValue:l.txt_shift_start_time,"onUpdate:modelValue":a[1]||(a[1]=s=>l.txt_shift_start_time=s)},null,8,["modelValue"]),Gt])]),Qt])}}},jt={class:"w-full p-6 my-4 shadow-sm rounded-xl bg-blue-50"},Kt={class:"flex gap-4 pt-1 row"},Jt=e("div",{class:"col-5"},[e("p",{class:"font-semibold py-auto"},"Does Your company have a late coming LOP Policy")],-1),qt={class:"flex gap-4 col-1"},Xt={class:"mt-1"},zt=e("div",null,[e("p",{class:"font-semibold"},"Yes")],-1),Zt={class:"flex gap-4 col-1"},eo={class:"mt-1"},to=e("div",null,[e("p",{class:"font-semibold"},"No")],-1),oo={key:0,class:"row"},lo={class:"flex col-5"},so=e("div",null,[e("p",{class:"my-2.5 text-lg font-semibold"},"The number of late comings allowed in month")],-1),ao={class:"col-2"},no=e("div",null,[e("p",{class:"my-2.5 text-lg font-semibold text-gray-600 mx-4"},"Times")],-1),io={class:"flex bg-orange-100 rounded-lg col-5"},ro=e("div",{class:""},[e("p",{class:"my-2.5 text-gray-700 text-lg font-semibold"},"Once Exceed The Late LOP Limit ")],-1),mo={class:"col-2"},po=e("div",{class:""},[e("p",{class:"my-2.5 text-lg font-semibold text-gray-600 mx-4"},"Days LOP Apply")],-1),co={class:"flex gap-4 pt-4 row"},uo=e("div",{class:"col-5"},[e("p",{class:"font-semibold py-auto"},"Does Your company have a early going LOP Policy")],-1),_o={class:"flex gap-4 col-1"},fo={class:"mt-1"},ho=e("div",null,[e("p",{class:"font-semibold"},"Yes")],-1),go={class:"flex gap-4 col-1"},vo={class:"mt-1"},yo=e("div",null,[e("p",{class:"font-semibold"},"No")],-1),bo={key:0,class:"my-4 row"},xo={class:"flex col-5"},wo=e("div",null,[e("p",{class:"my-2.5 text-lg font-semibold"},"The number of late comings allowed in month")],-1),$o={class:"col-2"},So=e("div",null,[e("p",{class:"my-2.5 text-lg font-semibold text-gray-600 mx-4"},"Times")],-1),To={class:"flex bg-orange-100 rounded-lg col-6"},ko=e("div",{class:""},[e("p",{class:"my-2.5 text-gray-700 text-lg font-semibold"},"Once Exceed The Early Going LOP Limit ")],-1),Vo={class:"col-2"},Po=e("div",{class:""},[e("p",{class:"my-2.5 text-lg font-semibold text-gray-600 mx-4"},"Days LOP Apply")],-1),Lo=e("div",{class:"my-3 text-end"},[e("button",{class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4"},"Save"),e("button",{class:"px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4"},"Previous"),e("button",{class:"px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md"},"Next")],-1),Ao={__name:"LateEarlyGoing",setup(w){u("center"),u(!1);const l=u(),a=u();return(o,s)=>{const h=y("InputText");return $(),S("div",jt,[e("div",Kt,[Jt,e("div",qt,[e("div",Xt,[F(e("input",{style:{height:"18px",width:"18px"},class:"form-check-input",type:"radio",name:"leave",value:"1","onUpdate:modelValue":s[0]||(s[0]=p=>l.value=p)},null,512),[[W,l.value]])]),zt]),e("div",Zt,[e("div",eo,[F(e("input",{style:{height:"18px",width:"18px"},class:"form-check-input",type:"radio",name:"leave",value:"0","onUpdate:modelValue":s[1]||(s[1]=p=>l.value=p)},null,512),[[W,l.value]])]),to]),l.value=="1"?($(),S("div",oo,[e("div",lo,[so,e("div",ao,[t(h,{type:"text",modelValue:o.txt_shift_name,"onUpdate:modelValue":s[2]||(s[2]=p=>o.txt_shift_name=p),placeholder:"Enter ",class:"w-full h-10 mx-2"},null,8,["modelValue"])]),no]),e("div",io,[ro,e("div",mo,[t(h,{type:"text",modelValue:o.txt_shift_name,"onUpdate:modelValue":s[3]||(s[3]=p=>o.txt_shift_name=p),placeholder:"Enter ",class:"w-full h-10 mx-2"},null,8,["modelValue"])]),po])])):N("",!0)]),e("div",co,[uo,e("div",_o,[e("div",fo,[F(e("input",{style:{height:"18px",width:"18px"},class:"form-check-input",type:"radio",name:"leave",value:"1","onUpdate:modelValue":s[4]||(s[4]=p=>a.value=p)},null,512),[[W,a.value]])]),ho]),e("div",go,[e("div",vo,[F(e("input",{style:{height:"18px",width:"18px"},class:"form-check-input",type:"radio",name:"leave",value:"0","onUpdate:modelValue":s[5]||(s[5]=p=>a.value=p)},null,512),[[W,a.value]])]),yo])]),a.value=="1"?($(),S("div",bo,[e("div",xo,[wo,e("div",$o,[t(h,{type:"text",modelValue:o.txt_shift_name,"onUpdate:modelValue":s[6]||(s[6]=p=>o.txt_shift_name=p),placeholder:"Enter ",class:"w-full h-10 mx-2"},null,8,["modelValue"])]),So]),e("div",To,[ko,e("div",Vo,[t(h,{type:"text",modelValue:o.txt_shift_name,"onUpdate:modelValue":s[7]||(s[7]=p=>o.txt_shift_name=p),placeholder:"Enter ",class:"w-full h-10 mx-2"},null,8,["modelValue"])]),Po])])):N("",!0),Lo])}}};const Do={class:"w-full pr-2"},Co={class:"w-full tabs row"},No=e("div",{class:"md:text-sm",style:{width:"25px"}},"1",-1),Uo=e("div",null,"2",-1),Ro=e("div",null,"3",-1),Eo=e("div",null,"4",-1),Io=e("div",null,"5",-1),Mo={class:"bg-white rounded-md"},Oo={key:0,class:"tabcontent"},Fo={key:1,class:"tabcontent"},Wo={key:2,class:"tabcontent"},Ho={key:3,class:"tabcontent"},Bo={key:4,class:"tabcontent"},Go={__name:"AddShift",setup(w){const l=u(1);return(a,o)=>($(),S("div",Do,[e("div",Co,[e("a",{class:M(["flex px-6 col-lg-2 col-xl-2 col-md-2",[l.value===1?"active":""]]),onClick:o[0]||(o[0]=s=>l.value=1)},[No,d("Shift Details")],2),e("a",{class:M(["flex px-6 col-lg-2 col-xl-2 col-md-2",[l.value===2?"active":""]]),onClick:o[1]||(o[1]=s=>l.value=2)},[Uo,d("Shift Time Range")],2),e("a",{class:M(["flex px-6 col-lg-2 col-xl-2 col-md-2",[l.value===3?"active":""]]),onClick:o[2]||(o[2]=s=>l.value=3)},[Ro,d("Break Time Range")],2),e("a",{class:M(["flex px-6 col-lg-2 col-xl-2 col-md-2",[l.value===4?"active":""]]),onClick:o[3]||(o[3]=s=>l.value=4)},[Eo,d("Working Hours")],2),e("a",{class:M(["flex px-6 col-lg-2 col-xl-2 col-md-2",[l.value===5?"active":""]]),onClick:o[4]||(o[4]=s=>l.value=5)},[Io,d("Late&Early Going ")],2)]),e("div",Mo,[l.value===1?($(),S("div",Oo,[t(He)])):N("",!0),l.value===2?($(),S("div",Fo,[t(pt)])):N("",!0),l.value===3?($(),S("div",Wo,[t(Rt)])):N("",!0),l.value===4?($(),S("div",Ho,[t(Yt)])):N("",!0),l.value===5?($(),S("div",Bo,[t(Ao)])):N("",!0)])]))}};const Qo={class:"w-full"},Yo={class:"flex justify-between"},jo=e("div",null,null,-1),Ko={class:""},Jo=e("i",{class:"fa fa-plus-circle me-2"},null,-1),qo=e("h6",{class:"modal-title fs-21"}," Add Shift",-1),Xo={__name:"ManageShift",setup(w){const l=u(!1);return(a,o)=>{const s=y("Column"),h=y("DataTable"),p=y("Dialog");return $(),S("div",Qo,[e("div",Yo,[jo,e("div",Ko,[e("button",{class:"mx-4 my-4 btn btn-orange",onClick:o[0]||(o[0]=g=>l.value=!0)},[Jo,d("Add Shift ")])])]),e("div",null,[t(h,{value:a.att_emp_details,selection:a.selectedEmployees,"onUpdate:selection":o[1]||(o[1]=g=>a.selectedEmployees=g),paginator:!0,rows:5,dataKey:"emp_code",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:a.filters,"onUpdate:filters":o[2]||(o[2]=g=>a.filters=g),filterDisplay:"menu",loading:a.loading2,globalFilterFields:["name","status"]},{empty:n(()=>[d(" No Employee found ")]),loading:n(()=>[d(" Loading employee data. Please wait. ")]),default:n(()=>[t(s,{field:"emp_code",header:"Shift Name",style:{"min-width":"2rem"}},{body:n(g=>[d(v(g.data.emp_code),1)]),_:1}),t(s,{field:"employee_name",header:"Shift Code",style:{"min-width":"8rem"}},{body:n(g=>[d(v(g.data.employee_name),1)]),_:1}),t(s,{field:"designation",header:"Is Default",style:{"min-width":"10rem"}},{body:n(g=>[d(v(g.data.designation),1)]),_:1}),t(s,{style:{"min-width":"10rem"},field:"Assigned To",header:"Assigned To"},{body:n(g=>[d(v(g.data.department_name),1)]),_:1}),t(s,{style:{"min-width":"10rem"},field:"work_location",header:"Actions"},{body:n(g=>[d(v(g.data.work_location),1)]),_:1})]),_:1},8,["value","selection","filters","loading"]),t(p,{visible:l.value,"onUpdate:visible":o[3]||(o[3]=g=>l.value=g),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"100vw",borderTop:"5px solid #002f56"},modal:!0,closable:!0,closeOnEscape:!1},{header:n(()=>[qo]),default:n(()=>[t(Go)]),_:1},8,["visible"])])])}}};const zo={class:"w-full"},Zo={class:"flex justify-between"},el=e("div",null,null,-1),tl=e("i",{class:"fa fa-plus-circle me-2"},null,-1),ol=e("h6",{class:"modal-title fs-21"}," Add Rotational Shift",-1),ll={class:"my-3 row"},sl=e("div",{class:"col-5"},[e("p",{class:"text-lg font-semibold"},"Name")],-1),al={class:"col-4"},nl={class:"my-3 row"},il=e("div",{class:"col-5"},[e("p",{class:"text-lg font-semibold"},"Choose the rotation option")],-1),dl={class:"col-4"},rl=e("div",{class:"my-3 row"},[e("div",{class:"col-5"},[e("p",{class:"text-lg font-semibold"},"Select the shifts to be rotated"),e("div",{class:"flex mt-2"},[e("input",{type:"checkbox",name:"",id:""}),e("p",{class:"mx-2 my-2 text-lg font-semibold"}," General Shift")]),e("div",{class:"flex my-1"},[e("input",{type:"checkbox",name:"",id:""}),e("p",{class:"mx-2 my-2 text-lg font-semibold"}," Night Shift")]),e("div",{class:"flex"},[e("input",{type:"checkbox",name:"",id:""}),e("p",{class:"mx-2 my-2 text-lg font-semibold"}," Other Shift")])])],-1),ml=e("button",{class:"btn btn-border-primary"},"Close",-1),pl=e("button",{class:"btn btn-orange"},"Save",-1),cl={__name:"RotationalShift",setup(w){let l=u(!1);return(a,o)=>{const s=y("Column"),h=y("DataTable"),p=y("InputText"),g=y("Dropdown"),U=y("Dialog");return $(),S("div",zo,[e("div",Zo,[el,e("div",null,[e("button",{class:"float-right mx-4 my-3 cursor-pointer btn btn-orange",onClick:o[0]||(o[0]=b=>P(l)?l.value=!0:l=!0)},[tl,d("Add Shift ")])])]),e("div",null,[t(h,{value:a.att_emp_details,selection:a.selectedEmployees,"onUpdate:selection":o[1]||(o[1]=b=>a.selectedEmployees=b),paginator:!0,rows:5,dataKey:"emp_code",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:a.filters,"onUpdate:filters":o[2]||(o[2]=b=>a.filters=b),filterDisplay:"menu",loading:a.loading2,globalFilterFields:["name","status"]},{empty:n(()=>[d(" No Employee found ")]),loading:n(()=>[d(" Loading employee data. Please wait. ")]),default:n(()=>[t(s,{field:"emp_code",header:"Shift Name",style:{"min-width":"2rem"}},{body:n(b=>[d(v(b.data.emp_code),1)]),_:1}),t(s,{field:"employee_name",header:"Shift Code",style:{"min-width":"8rem"}},{body:n(b=>[d(v(b.data.employee_name),1)]),_:1}),t(s,{field:"designation",header:"Is Default",style:{"min-width":"10rem"}},{body:n(b=>[d(v(b.data.designation),1)]),_:1}),t(s,{style:{"min-width":"10rem"},field:"Assigned To",header:"Assigned To"},{body:n(b=>[d(v(b.data.department_name),1)]),_:1}),t(s,{style:{"min-width":"10rem"},field:"work_location",header:"Actions"},{body:n(b=>[d(v(b.data.work_location),1)]),_:1})]),_:1},8,["value","selection","filters","loading"]),t(U,{visible:V(l),"onUpdate:visible":o[4]||(o[4]=b=>P(l)?l.value=b:l=b),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"50vw",borderTop:"5px solid #002f56"},modal:!0,closable:!0,closeOnEscape:!1},{header:n(()=>[ol]),footer:n(()=>[ml,pl]),default:n(()=>[e("div",ll,[sl,e("div",al,[t(p,{type:"text",modelValue:a.txt_shift_name,"onUpdate:modelValue":o[3]||(o[3]=b=>a.txt_shift_name=b),placeholder:"Enter the shift name",class:"w-full"},null,8,["modelValue"])])]),e("div",nl,[il,e("div",dl,[t(g,{editable:"",optionLabel:"name",optionValue:"name",placeholder:"Choose Rotational Shift ",class:"w-full p-error"})])]),rl]),_:1},8,["visible"])])])}}};const R=w=>(J("data-v-81559de7"),w=w(),q(),w),ul={class:"w-full pr-8"},_l={class:"flex row"},fl={class:"p-2 mx-4 my-4 rounded-lg bg-red-50 col-8"},hl=R(()=>e("span",{class:"mx-2 text-lg font-semibold text-gray-600"},"Below assigned employees are able to work any shift that the company offers.",-1)),gl={class:"col-3"},vl=R(()=>e("i",{class:"fa fa-plus-circle me-2"},null,-1)),yl={class:"flex"},bl=R(()=>e("h6",{class:"mx-2 my-2 modal-title fs-21"}," Assigned To",-1)),xl={class:"p-2.5 mx-2 rounded-lg bg-red-50"},wl=R(()=>e("span",{class:"text-lg font-semibold text-gray-600"},"Flexible Shift employees are able to work any shift that the company offers.",-1)),$l={class:"flex justify-between mx-4"},Sl={class:"mx-4"},Tl=R(()=>e("button",{class:"btn btn-border-primary"},"Close",-1)),kl=R(()=>e("button",{class:"btn btn-orange"},"Save",-1)),Vl={__name:"FlexibleShift",setup(w){let l=u();u(!1);let a=u(!1),o=u(),s=u();X(),j();const h=u(),p=u([{name:"New York",code:"NY"},{name:"Rome",code:"RM"},{name:"London",code:"LDN"},{name:"Istanbul",code:"IST"},{name:"Paris",code:"PRS"}]),g=u({global:{value:null,matchMode:c.CONTAINS},emp_code:{value:null,matchMode:c.STARTS_WITH,matchMode:c.EQUALS,matchMode:c.CONTAINS},employee_name:{value:null,matchMode:c.STARTS_WITH,matchMode:c.EQUALS,matchMode:c.CONTAINS},designation:{value:null,matchMode:c.STARTS_WITH,matchMode:c.EQUALS,matchMode:c.CONTAINS},department_name:{value:null,matchMode:c.STARTS_WITH,matchMode:c.EQUALS,matchMode:c.CONTAINS},location:{value:null,matchMode:c.STARTS_WITH,matchMode:c.EQUALS,matchMode:c.CONTAINS}}),U=u(!0);K(()=>{b()});function b(){let L=window.location.origin+"/attendance_settings/fetch-emp-details";console.log("AJAX URL : "+L),G.get(L).then(f=>{console.log("Axios : "+f.data),l.value=f.data,U.value=!1})}return(L,f)=>{const E=y("Strong"),T=y("Column"),O=y("DataTable"),D=y("Dropdown"),k=y("InputText"),m=y("Dialog");return $(),S("div",ul,[e("div",_l,[e("div",fl,[e("p",null,[t(E,{class:"text-lg font-semibold text-orange-400"},{default:n(()=>[d("Note:")]),_:1}),hl])]),e("div",gl,[e("button",{class:"float-right mx-4 my-4 cursor-pointer btn btn-orange",onClick:f[0]||(f[0]=i=>P(a)?a.value=!0:a=!0)},[vl,d("Add Shift ")])])]),e("div",null,[t(O,{value:V(l),selection:V(o),"onUpdate:selection":f[1]||(f[1]=i=>P(o)?o.value=i:o=i),paginator:!0,rows:5,dataKey:"emp_code",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:g.value,"onUpdate:filters":f[2]||(f[2]=i=>g.value=i),filterDisplay:"menu",loading:L.loading2,globalFilterFields:["name","status"]},{empty:n(()=>[d(" No Employee found ")]),loading:n(()=>[d(" Loading employee data. Please wait. ")]),default:n(()=>[t(T,{field:"emp_code",header:"Shift Name",style:{"min-width":"2rem"}},{body:n(i=>[d(v(i.data.emp_code),1)]),_:1}),t(T,{field:"employee_name",header:"Shift Code",style:{"min-width":"8rem"}},{body:n(i=>[d(v(i.data.employee_name),1)]),_:1}),t(T,{field:"designation",header:"Is Default",style:{"min-width":"10rem"}},{body:n(i=>[d(v(i.data.designation),1)]),_:1}),t(T,{style:{"min-width":"10rem"},field:"Assigned To",header:"Assigned To"},{body:n(i=>[d(v(i.data.department_name),1)]),_:1}),t(T,{style:{"min-width":"10rem"},field:"work_location",header:"Actions"},{body:n(i=>[d(v(i.data.work_location),1)]),_:1})]),_:1},8,["value","selection","filters","loading"])]),t(m,{visible:V(a),"onUpdate:visible":f[11]||(f[11]=i=>P(a)?a.value=i:a=i),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"100vw",borderTop:"5px solid #002f56"},modal:!0,closable:!0,closeOnEscape:!1},{header:n(()=>[e("div",yl,[bl,e("div",xl,[e("p",null,[t(E,{class:"text-lg"},{default:n(()=>[d("Note:")]),_:1}),wl])])])]),footer:n(()=>[Tl,kl]),default:n(()=>[e("div",$l,[t(D,{modelValue:h.value,"onUpdate:modelValue":f[3]||(f[3]=i=>h.value=i),options:p.value,optionLabel:"name",placeholder:"Select a Department",class:"w-full md:w-14rem"},null,8,["modelValue","options"]),t(D,{modelValue:h.value,"onUpdate:modelValue":f[4]||(f[4]=i=>h.value=i),options:p.value,optionLabel:"name",placeholder:"Select a Designation",class:"w-full md:w-14rem"},null,8,["modelValue","options"]),t(D,{modelValue:h.value,"onUpdate:modelValue":f[5]||(f[5]=i=>h.value=i),options:p.value,optionLabel:"name",placeholder:"Select a Location",class:"w-full md:w-14rem"},null,8,["modelValue","options"]),t(D,{modelValue:h.value,"onUpdate:modelValue":f[6]||(f[6]=i=>h.value=i),options:p.value,optionLabel:"name",placeholder:"Select a State",class:"w-full md:w-14rem"},null,8,["modelValue","options"]),t(D,{modelValue:h.value,"onUpdate:modelValue":f[7]||(f[7]=i=>h.value=i),options:p.value,optionLabel:"name",placeholder:"Select a Legal Entity",class:"w-full md:w-14rem"},null,8,["modelValue","options"])]),e("div",Sl,[t(k,{type:"text",modelValue:V(s),"onUpdate:modelValue":f[8]||(f[8]=i=>P(s)?s.value=i:s=i),placeholder:"Search...",class:"my-4"},null,8,["modelValue"]),t(O,{value:V(l),selection:V(o),"onUpdate:selection":f[9]||(f[9]=i=>P(o)?o.value=i:o=i),paginator:!0,rows:2,dataKey:"emp_code",rowsPerPageOptions:[5,10,25],paginatorTemplate:"CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",currentPageReportTemplate:"Showing {first} to {last} of {totalRecords}",filters:g.value,"onUpdate:filters":f[10]||(f[10]=i=>g.value=i),filterDisplay:"menu",loading:L.loading2,globalFilterFields:["name","status"]},{empty:n(()=>[d(" No Employee found ")]),loading:n(()=>[d(" Loading employee data. Please wait. ")]),default:n(()=>[t(T,{selectionMode:"multiple"}),t(T,{field:"emp_code",header:"Employee ID",style:{"min-width":"2rem"}},{body:n(i=>[d(v(i.data.emp_code),1)]),_:1}),t(T,{field:"employee_name",header:"Employee Name",style:{"min-width":"8rem"}},{body:n(i=>[d(v(i.data.employee_name),1)]),_:1}),t(T,{field:"designation",header:"Designation",style:{"min-width":"10rem"}},{body:n(i=>[d(v(i.data.designation),1)]),_:1}),t(T,{style:{"min-width":"10rem"},field:"department_name",header:"Department"},{body:n(i=>[d(v(i.data.department_name),1)]),_:1}),t(T,{style:{"min-width":"10rem"},field:"work_location",header:"Location"},{body:n(i=>[d(v(i.data.work_location),1)]),_:1}),t(T,{style:{"min-width":"10rem"},field:"work_location",header:"State"},{body:n(i=>[d(v(i.data.work_location),1)]),_:1})]),_:1},8,["value","selection","filters","loading"])])]),_:1},8,["visible"])])}}},Pl=z(Vl,[["__scopeId","data-v-81559de7"]]),Ll={class:"mb-1"},Al=e("div",{class:"mb-2 shadow card left-line"},[e("div",{class:"pt-1 pb-0 card-body"},[e("ul",{class:"divide-x nav nav-pills divide-solid nav-tabs-dashed",role:"tablist"},[e("li",{class:"nav-item text-muted",role:"presentation"},[e("button",{class:"pb-2 nav-link active",id:"pills-offer-pending-tab","data-bs-toggle":"pill","data-bs-target":"#pills-offer-pending",type:"button",role:"tab","aria-controls":"pills-home","aria-selected":"true"},"Manage Shifts")]),e("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[e("button",{class:"pb-2 nav-link",id:"pills-offer-completed-tab","data-bs-toggle":"pill","data-bs-target":"#pills-offer-completed",type:"button",role:"tab","aria-controls":"pills-profile","aria-selected":"false"},"Flexible Shifts")]),e("li",{class:"nav-item text-muted",role:"presentation"},[e("button",{class:"pb-2 nav-link",id:"pills-offer-resent-tab","data-bs-toggle":"pill","data-bs-target":"#pills-offer-resent",type:"button",role:"tab","aria-controls":"pills-contact","aria-selected":"false"},"Rotational Shifts")]),e("li",{class:"mx-4 nav-item text-muted",role:"presentation"},[e("button",{class:"pb-2 nav-link",id:"pills-offer-resen-tab","data-bs-toggle":"pill","data-bs-target":"#pills-offer-resen",type:"button",role:"tab","aria-controls":"pills-contact","aria-selected":"false"},"Holidays")])])])],-1),Dl={class:"tab-content",id:"pills-tabContent"},Cl={class:"tab-pane fade show active",id:"pills-offer-pending",role:"tabpanel","aria-labelledby":"pills-offer-pending-tab"},Nl={class:"card-body"},Ul={class:"offer-pending-content"},Rl={class:"tab-pane fade active",id:"pills-offer-completed",role:"tabpanel","aria-labelledby":"pills-offer-completed-tab"},El={class:"card-body"},Il={class:"my-4 offer-pending-content"},Ml={class:"tab-pane fade",id:"pills-offer-resent",role:"tabpanel","aria-labelledby":"pills-offer-resent-tab"},Ol={class:"card-body"},Fl={class:"offer-pending-content"},Wl={class:"tab-pane fade",id:"pills-offer-resen",role:"tabpanel","aria-labelledby":"pills-offer-resen-tab"},Hl={class:"card-body"},Bl={class:"offer-pending-content"},Gl={__name:"Attendance_setting_Master",setup(w){return(l,a)=>($(),S("div",Ll,[Al,e("div",Dl,[e("div",Cl,[e("div",Nl,[e("div",Ul,[t(Xo)])])]),e("div",Rl,[e("div",El,[e("div",Il,[t(Pl)])])]),e("div",Ml,[e("div",Ol,[e("div",Fl,[t(cl)])])]),e("div",Wl,[e("div",Hl,[e("div",Bl,[t(Te)])])])])]))}},x=te(Gl),Ql=ne();x.use(oe,{ripple:!0});x.use(ce);x.use(le);x.use(ve);x.use(Ql);x.directive("tooltip",ie);x.directive("badge",de);x.directive("ripple",se);x.directive("styleclass",re);x.directive("focustrap",ue);x.component("Button",ae);x.component("DataTable",me);x.component("Column",pe);x.component("ColumnGroup",we);x.component("Row",xe);x.component("Toast",ye);x.component("ConfirmDialog",ge);x.component("Dropdown",_e);x.component("InputText",fe);x.component("Dialog",he);x.component("ProgressSpinner",be);x.component("Calendar",$e);x.component("Checkbox",Se);x.mount("#vjs_Attendance_master");
