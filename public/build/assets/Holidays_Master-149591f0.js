import"./index-362795f3.js";import"./dayjs.min-2f06af28.js";import{u as x,_ as k}from"./Holidays_Lists.vue_vue_type_style_index_0_lang-4313e893.js";import{G as m,I as P,o as _,c as y,H as a,d as e,h as o,w as d,q as T,a as V,F as N,g as n}from"./toastservice.esm-d169f0d1.js";const D={key:0,class:"card"},A={class:"px-3"},S={class:"w-full d-flex justify-between my-4"},B={class:""},R=e("i",{class:"pi pi-plus-circle"},null,-1),$=e("span",{class:"pl-2 fw-bold fs-6"},"Add New Location",-1),U=[R,$],E=e("div",null,[e("h1",{class:"border-l-4 border-orange-400 fs-5 fw-bold pl-3"},"Assign To Location")],-1),M={class:"flex-column my-3 mx-5"},F=e("div",{style:{},class:"w-full border h-48"},null,-1),I={class:"row d-flex align-items-center mt-4"},O=e("div",{class:"col-5"},[e("h1",{class:"text-gray-700 fs-5 font-semibold"},"Location")],-1),j={class:"col"},q={class:"row my-2 mb-4 d-flex align-items-center"},z=e("div",{class:"col-5"},[e("h1",{class:"text-gray-700 fs-5 font-semibold"},"Choose Holidays List")],-1),G={class:"col"},K=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),Z={__name:"Holidays_Master",setup(W){const l=x(),p=m(!1);P(async()=>{await l.getHolidaysMaster()});const c=m();m(),m([{name:"TN_200",code:1},{name:"TN_201",code:2},{name:"TN_202",code:3},{name:"TN_203",code:4},{name:"TN_204",code:5}]);const h=i=>{c.value=i,l.activeHolidaysPage=2,console.log(l.activeHolidaysPage),console.log(c.value),console.log("ViewHolidaysList")},f=i=>{c.value=i,console.log(c.value),console.log("DeleteHolidayList")};return(i,t)=>{const w=n("Calendar"),r=n("Column"),u=n("Button"),v=n("DataTable"),b=n("InputText"),L=n("Dropdown"),g=n("Dialog"),C=n("ProgressSpinner");return _(),y(N,null,[a(l).activeHolidaysPage===2?(_(),y("div",D,[e("div",A,[e("div",S,[o(w,{modelValue:i.date,"onUpdate:modelValue":t[0]||(t[0]=s=>i.date=s)},null,8,["modelValue"]),e("div",B,[e("button",{onClick:t[1]||(t[1]=s=>a(l).activeHolidaysPage=2),class:"btn bg-blue-900 text-light fw-bold"},"View All Hoildays"),e("button",{class:"btn btn-orange ml-3 fw-bold",onClick:t[2]||(t[2]=s=>p.value=!0)},U)])]),o(v,{value:a(l).arrayholidayMaster,ref:"dt",dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:d(()=>[o(r,{field:"Location",header:"Location",style:{"min-width":"12rem"}}),o(r,{header:"Holidays List",field:"Holidays_List",style:{"min-width":"8rem"}}),o(r,{field:"NoOfHolidays",header:"No of Holidays",style:{"min-width":"12rem"}}),o(r,{header:"Employees",field:"Employees",style:{"min-width":"8rem"}}),o(r,{field:"Action",header:"Actions",style:{"min-width":"12rem"}},{body:d(s=>[e("span",null,[o(u,{type:"button",icon:"pi pi-eye",class:"p-button-success Button",label:"View",onClick:H=>h(s.data.Holidays_List),style:{height:"2.5em"}},null,8,["onClick"]),o(u,{type:"button",icon:"pi pi-trash",class:"p-button-danger Button",label:"Delete",style:{"margin-left":"8px",height:"2.5em"},onClick:H=>f(s.data.id,s.data.Holidays_List)},null,8,["onClick"])])]),_:1})]),_:1},8,["value"]),o(g,{visible:p.value,"onUpdate:visible":t[6]||(t[6]=s=>p.value=s),modal:"",header:"Holiday ",style:T([{width:"38vw"},{"border-top":"5px solid #002f56"}]),class:"popup_card"},{header:d(()=>[E]),footer:d(()=>[o(u,{label:"Cancel",class:"border-orange-400 text-orange-500 mr-4 bg-white",onClick:t[5]||(t[5]=s=>i.canshowDialog=!1),text:""}),o(u,{label:"Create",class:"bg-orange-500 border-none",icon:"pi pi-plus-circle",onClick:a(l).SubmitAddNewLocation,autofocus:""},null,8,["onClick"])]),default:d(()=>[e("div",M,[F,e("div",I,[O,e("div",j,[o(b,{type:"text",class:"w-full h-12",modelValue:a(l).AssignToLocation.location,"onUpdate:modelValue":t[3]||(t[3]=s=>a(l).AssignToLocation.location=s)},null,8,["modelValue"])])]),e("div",q,[z,e("div",G,[o(L,{modelValue:a(l).AssignToLocation.ChooseTheHolidays,"onUpdate:modelValue":t[4]||(t[4]=s=>a(l).AssignToLocation.ChooseTheHolidays=s),options:a(l).arrayCreateNewList,optionLabel:"name",placeholder:"",class:"w-full"},null,8,["modelValue","options"])])])])]),_:1},8,["visible"])])])):V("",!0),o(g,{header:"Header",visible:a(l).canShowLoading,"onUpdate:visible":t[7]||(t[7]=s=>a(l).canShowLoading=s),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:d(()=>[o(C,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:d(()=>[K]),_:1},8,["visible"]),e("div",null,[o(k)])],64)}}};export{Z as _};
