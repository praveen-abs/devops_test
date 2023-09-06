import{a as c}from"./index21342.js";import"./dayjs.min21342.js";import{d as j}from"./pinia21342.js";import{ai as O,a0 as d,a3 as g,ak as E,o as z,c as K,d as a,h as r,I as n,w as h,p as W,g as y}from"./toastservice.esm21342.js";import"./moment21342.js";const q=j("useHolidayStore",()=>{O();const f=d(!1),t=d(!1),m=d(),o=d(),w=d(),p=d(1),v=d(),L=d(!1),b=d(!1),H=d(),l=g({FestivalTitle:"",Description:"",date:"",Holiday_Photo:""}),C=g({List_Name:"",ChooseTheHolidays:""}),i=g({location:"",ChooseTheHolidays:""}),D=g([]),u=d(),N=g([]);let x=new FormData;const P=d(),S=e=>{e.target.files&&e.target.files[0]&&(l.Holiday_Photo=e.target.files[0],P.value=window.URL.createObjectURL(e.target.files[0]),console.log(l.Holiday_Photo),x.append("file",l.Holiday_Photo),console.log(x))},_=async()=>{f.value=!0,await c.get("/holiday/master-page").then(e=>{console.log(e.data),m.value=e.data}).finally(()=>{f.value=!1})},T=()=>{t.value=!1;let e="holiday/create_holiday",s=new FormData;s.append("holiday_name",l.FestivalTitle),s.append("holiday_description",l.Description),s.append("holiday_date",l.date),s.append("holiday_image",l.Holiday_Photo),c.post(e,s).then(()=>{}).finally(()=>{_()})},k=async()=>{await c.get("http://localhost:3000/HolidayMaster").then(e=>{console.log(e.data),o.value=e.data})},V=async()=>{await c.get("/holidays/add_holidayslist").then(e=>{v.value=e.data})},F=async()=>{await c.get("/holidays/show_holidaysListDetails").then(e=>{console.log(e.data),w.value=e.data})},R=()=>{for(var e in u.value){let s={id:u.value[e].id,holiday:u.value[e].holiday_name};N.push(s)}console.log(N),c.post("holiday/create_holidaylist",{name:C.List_Name,holiday_list_id:N}).then(s=>{s.data}).finally(()=>{_(),L.value=!1})},U=()=>{c.post("holiday/create_holidaylocation",{name:i.location,vmt_holidays_list_id:i.ChooseTheHolidays.id}).finally(()=>{})},M=()=>{console.log(u.value)};async function A(e){let s={id:e.id,image_url:e.holiday_name};console.log(s.id);let $="holidays/delete_holiday";c.post($,s).then(()=>{}).finally(()=>{_()})}function B(e){b.value=!0,console.log(e),H.value=e.id,l.FestivalTitle=e.holiday_name,l.Description=e.holiday_description,l.date=e.holiday_date,l.Holiday_Photo=e.image}function I(){let e="holidays/update_holiday",s=new FormData;s.append("id",H.value),s.append("holiday_name",l.FestivalTitle),s.append("holiday_description",l.Description),s.append("holiday_date",l.date),s.append("holiday_image",l.Holiday_Photo),c.post(e,s).then(()=>{}).finally(()=>{_()})}return{holidayData:m,activeHolidaysPage:p,CreateNewList:C,AssignToLocation:i,arrayholidayMaster:o,canShowLoading:f,addNewHoliday:l,chooseHolidaylist:D,arrayCreateNewList:w,arrayHolidaysList:v,CreateNewListDialog:L,DialogAddNewHoliday:t,getHolidays:_,SubmitCreateNewList:R,SubmitAddNewLocation:U,getHolidaysMaster:k,getHolidaylist:V,getHolidayName:M,ChooseTheHolidays:u,FestivalPhoto:S,sumbitAddNewHoliday:T,avatar:P,getCreateNewList:F,editHolidaylist:B,editHoliday:b,sumbiteditHoliday:I,RemoveHolidayList:A}}),G={class:"card px-3"},J={class:"w-full d-flex justify-between my-4"},Q={class:""},X=a("i",{class:"pi pi-plus-circle"},null,-1),Y=a("span",{class:"pl-2 font-semibold text-white fs-6"},"Create New List",-1),Z=[X,Y],ee={class:"card"},oe=a("div",null,[a("h1",{class:"border-l-4 border-orange-400 fs-5 fw-bold pl-3"},"Create New List")],-1),te={class:"flex-column my-3 mx-5"},ae={class:"row d-flex align-items-center"},le=a("div",{class:"col"},[a("h1",{class:"text-gray-700 fs-4 font-semibold"},"Holiday List")],-1),se={class:"col"},ie={class:"row my-2 mb-4 d-flex align-items-center"},ne=a("div",{class:"col"},[a("h1",{class:"text-gray-700 fs-4 font-semibold"},"Choose The Holidays")],-1),de={class:"col"},re=a("h5",{style:{"text-align":"center"}},"Please wait...",-1),ue={__name:"CreateNewHolidaysList",setup(f){const t=q();return E(async()=>{await t.getCreateNewList(),await t.getHolidaylist()}),(m,o)=>{const w=y("Calendar"),p=y("Column"),v=y("DataTable"),L=y("InputText"),b=y("MultiSelect"),H=y("Button"),l=y("Dialog"),C=y("ProgressSpinner");return z(),K("div",G,[a("div",J,[r(w,{modelValue:m.date,"onUpdate:modelValue":o[0]||(o[0]=i=>m.date=i)},null,8,["modelValue"]),a("div",Q,[a("button",{onClick:o[1]||(o[1]=i=>n(t).activeHolidaysPage=1),class:"btn font-semibold border-orange-400 text-orange-500 mr-4 bg-transparent px-5"},"Cancel"),a("button",{class:"btn btn-orange ml-3 font-semibold",onClick:o[2]||(o[2]=i=>n(t).CreateNewListDialog=!0)},Z)])]),a("div",ee,[r(v,{value:n(t).arrayCreateNewList,ref:"dt",dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll"},{default:h(()=>[r(p,{header:"Holiday List",field:"name",style:{"min-width":"8rem"}}),r(p,{field:"no_of_holidays",header:"No of Holidays",style:{"min-width":"12rem"}}),r(p,{field:"location",header:"Location",style:{"min-width":"12rem"}}),r(p,{field:"json_popups_value.to_month",header:"Actions",style:{"min-width":"12rem"}})]),_:1},8,["value"]),r(l,{visible:n(t).CreateNewListDialog,"onUpdate:visible":o[7]||(o[7]=i=>n(t).CreateNewListDialog=i),modal:"",header:"Holiday ",style:W([{width:"38vw"},{"border-top":"5px solid #002f56"}]),class:"popup_card"},{header:h(()=>[oe]),footer:h(()=>[a("button",{class:"btn border-orange-400 text-orange-500 fw-semibold py-2 px-5",style:{padding:"9px 20px !important"},onClick:o[6]||(o[6]=i=>n(t).CreateNewListDialog=!1)}," Close"),r(H,{label:"Create",class:"bg-orange-500 border-none",icon:"pi pi-plus-circle",onClick:n(t).SubmitCreateNewList,autofocus:""},null,8,["onClick"])]),default:h(()=>[a("div",te,[a("div",ae,[le,a("div",se,[r(L,{type:"text",class:"w-full h-12",modelValue:n(t).CreateNewList.List_Name,"onUpdate:modelValue":o[3]||(o[3]=i=>n(t).CreateNewList.List_Name=i)},null,8,["modelValue"])])]),a("div",ie,[ne,a("div",de,[r(b,{modelValue:n(t).ChooseTheHolidays,"onUpdate:modelValue":o[4]||(o[4]=i=>n(t).ChooseTheHolidays=i),options:n(t).arrayHolidaysList,optionLabel:"holiday_name",placeholder:"Select Cities",maxSelectedLabels:3,class:"w-full h-12",style:{width:"245px !important"},onChange:o[5]||(o[5]=i=>n(t).getHolidayName())},null,8,["modelValue","options"])])])])]),_:1},8,["visible"]),r(l,{header:"Header",visible:n(t).canShowLoading,"onUpdate:visible":o[8]||(o[8]=i=>n(t).canShowLoading=i),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:h(()=>[r(C,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:h(()=>[re]),_:1},8,["visible"])])])}}};export{ue as _,q as u};
