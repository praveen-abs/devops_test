/* empty css              *//* empty css                     *//* empty css                   *//* empty css                 */import{H as m,W as j,a7 as z,g as k,o as i,c as r,d as t,aa as e,l as G,n as h,h as $,a as E,w as W,F as Y,f as J,b as K,ac as q,ad as Q,ab as X,I as Z,P as ee,R as te,u as oe,x as ae,J as se,L as ne,N as le,K as ie,M as re}from"./inputnumber.esm-3276ace1.js";import{d as de,c as pe}from"./pinia-69eaa219.js";import{a as ce,T as me,B as ue,S as fe,b as ve,s as be}from"./toastservice.esm-fd7fc957.js";import{s as xe}from"./sidebar.esm-91a38ecf.js";import{a as _e}from"./datatable.esm-aaa10fcd.js";import{D as he,s as ge}from"./dialogservice.esm-d79ebc81.js";import{C as ye}from"./confirmationservice.esm-8b92365c.js";import{s as we}from"./progressspinner.esm-3aaf2487.js";import{s as Ee}from"./row.esm-6ebc942e.js";import{s as $e}from"./calendar.esm-5bf60357.js";import{s as Be}from"./textarea.esm-6856fedb.js";import{s as Ce}from"./chips.esm-0f79d3f0.js";import{s as De}from"./multiselect.esm-449ab35c.js";import{s as ke}from"./inputmask.esm-adfad161.js";import{s as Te}from"./overlaypanel.esm-7ff80356.js";import{s as Re}from"./tag.esm-290811e4.js";import{s as Le}from"./accordion.esm-24de0775.js";import{s as Se}from"./accordiontab.esm-ed4692e6.js";import{s as Ae}from"./selectbutton.esm-216e8f42.js";import{E as L,_ as A,a as S,e as Me}from"./employee_master_report-d55d0fcf.js";/* empty css                                                                       */import{a as D}from"./index-362795f3.js";import"./lodash-facb8280.js";import{_ as Pe}from"./_plugin-vue_export-helper-c27b6911.js";import{c as Ve,b as Fe}from"./vue-router-cdf0eac1.js";import{_ as Ie}from"./attendanceBasicReports-508a6a9b.js";import"./LoadingSpinner-04b36c70.js";import"./printer-346f1800.js";import"./download-5ba6c221.js";import"./no-data-d6f55554.js";import"./dayjs.min-2f06af28.js";import"./Service-8807663f.js";const Ne=de("UseReports_store",()=>{const d=L(),s=m(),o=m(),B=m(),y=m(),x=m(),n=m(),f=m(),b=m(!1),T=m(1),R=m(),_=j({date:"",department_id:"",client_id:"",active_status:""}),l=m([]),C=m([]);function M(){b.value=!0,D.get("/clients-fetchAll").then(c=>{s.value=c.data,console.log("legal_entity ::",s.value)}).finally(()=>{b.value=!1})}function P(){b.value=!0,D.get("/get-department").then(c=>{o.value=c.data}).finally(()=>{b.value=!1})}function V(){b.value=!0,D.post("/get-filter-months-for-reports").then(c=>{B.value=c.data}).finally(()=>{b.value=!1})}function F(c,p,u){console.log(c,p,u),console.log(_);let v;u==2?v="/fetch-attendance-data":u==4?v="/fetch-overtime-report-data":u==5&&(f.value?f.value==1?v="/fetch-LC-report-data":f.value==2?v="/fetch-EG-report-data":f.value==3?v="/fetch-absent-report-data":f.value==4&&(v="/fetch-half-day-report"):(Swal.fire({title:"error",text:"selected report type",icon:"error",showCancelButton:!1}),d.period_Date=null,d.Department=null,d.legal_Entity=null)),c=="department"?_.department_id=p:c=="Category"?(_.active_status=p,console.log(_)):c=="date"?_.date=p:c=="legal_entity"&&(_.client_id=p),v&&(d.canShowLoading=!0,D.post(v,_).then(w=>{l.value=w.data.rows,w.data.headers.forEach(U=>{let H={title:U};C.value.push(H),w.data.rows.length===0&&Swal.fire({title:w.data.status="failure",text:"No employees found in this category",icon:"error",showCancelButton:!1}).then(Wt=>{})})}).finally(()=>{d.canShowLoading=!1,d.selectedfilters.active_status="",d.selectedfilters.date="",d.selectedfilters.department_id="",d.selectedfilters.legal_entity="",d.legal_Entity="",d.Department="",d.period_Date="",d.select_Category=""}))}const I=c=>{d.canShowLoading=!0;let p,u;c==1?(p="/reports/generate-detailed-attendance-report",u="Attendance Detailed Report"):c==2?(p="/reports/generate-basic-attendance",u="Attendance Basic Report"):c==4?(p="/report/download-over-time-report",u="Attendance Overtime Report"):c==5&&(f.value==1?(p="/report/download-late-coming-report",u="Attendance Late-coming Report"):f.value==2?(p="/report/download-early-going-report",u="Attendance Early-coming Report"):f.value==3?(p="/report/download-absent-report",u="Attendance Absent Report"):f.value==4&&(p="/report/download-half-day-report",u="Attendance Half-day Report")),p&&D.post(p,_,{responseType:"blob"}).then(v=>{console.log(v.data);var w=document.createElement("a");w.href=window.URL.createObjectURL(v.data),w.download=`${u}.xlsx`,w.click()}).finally(()=>{d.canShowLoading=!1})},N=async()=>{let c="/fetch-attendance-data";b.value=!0,await D.post(c).then(p=>{console.log(p.data.rows),l.value=p.data.rows,p.data.headers.forEach(u=>{let v={title:u};C.value.push(v),console.log(u)}),console.log(C.value)}).finally(()=>{b.value=!1})};function O(){l.value.splice(0,l.value.length),C.value.splice(0,C.value.length),f.value=null}return{canShowLoading:b,Legal_Entity:y,Department:x,PeriodMonth:n,btn_download:R,getPeriodMonth:B,getDepartment:o,get_Legal_Entity:s,activetab:T,fetchFilterClientId:M,get_All_Department:P,fetchPeriodMonth:V,getSelectoption:F,AttendanceReportSource:l,AttendanceReportDynamicHeaders:C,getEmployeeAttendanceReports:N,attendance_Type:f,downloadAttendanceReports:I,clearDataTable:O}});const g=d=>(q("data-v-3b0be311"),d=d(),Q(),d),Oe={class:"px-2"},Ue={class:"flex justify-between mb-[10px]"},He=g(()=>t("h1",{class:"text-black text-[24px] font-semibold"},"Attendance Reports",-1)),je=g(()=>t("i",{class:"mr-2 pi pi-times"},null,-1)),ze={style:{position:"relative"}},Ge={class:"flex justify-between"},We={class:"flex mb-3 divide-x max-[1200px]:!w-[50%] nav nav-pills divide-solid nav-tabs-dashed max-[1024px]:w-[100%]",id:"pills-tab",role:"tablist"},Ye={class:"nav-item !border-0 text-center font-['poppins'] text-[14px] text-[#001820]",role:"presentation"},Je={key:0,class:"h-1 rounded-l-3xl relative top-[0px] !z-[10]",style:{border:"2.2px solid #F9BE00 !important"}},Ke={key:1,class:"h-1 border-gray-300 border-3 rounded-l-3xl",style:{border:"2.2px solid #dcdcdc !important"}},qe={class:"nav-item !border-0 flex items-center",role:"presentation"},Qe={key:0,class:"w-[100%] h-1 relative top-[0px] !z-[10]",style:{border:"2.2px solid #F9BE00 !important"}},Xe={key:1,class:"h-1 border-gray-300 border-3 rounded-l-3xl",style:{border:"2.2px solid #dcdcdc !important"}},Ze={class:"nav-item !border-0 flex items-center",role:"presentation"},et={key:0,class:"w-[100%] h-1 relative top-[0px] !z-[10]",style:{border:"2.2px solid #F9BE00 !important"}},tt={key:1,class:"h-1 border-gray-300 border-3 rounded-l-3xl",style:{border:"2.2px solid #dcdcdc !important"}},ot={class:"nav-item !border-0 flex items-center",role:"presentation"},at={key:0,class:"w-[100%] h-1 relative top-[0px] !z-[10]",style:{border:"2.2px solid #F9BE00 !important"}},st={key:1,class:"h-1 border-gray-300 border-3 rounded-l-3xl",style:{border:"2.2px solid #dcdcdc !important"}},nt={class:"nav-item !border-0 flex items-center",role:"presentation"},lt={key:0,class:"w-[100%] h-1 relative top-[0px] !z-[10]",style:{border:"2.2px solid #F9BE00 !important"}},it={key:1,class:"h-1 border-gray-300 border-3 rounded-l-3xl",style:{border:"2.2px solid #dcdcdc !important"}},rt={class:"flex justify-between max-[1200px]:w-[50%] max-[1200px]:justify-start flex-wrap max-[1024px]:w-[100%]"},dt={class:"flex items-center"},pt=g(()=>t("h1",{class:"text-[12px] text-black mx-1 font-semibold font-['poppins']"},"Period : ",-1)),ct={class:"flex items-center"},mt=g(()=>t("h1",{class:"text-[12px] text-black mx-2 font-semibold font-['poppins']"},"Department : ",-1)),ut={class:"flex items-center"},ft=g(()=>t("h1",{class:"text-[12px] text-black mx-1 font-semibold font-['poppins']"},"Legal Entity : ",-1)),vt={class:"tab-content",id:""},bt={class:"card-body"},xt={class:"bg-white p-2 flex justify-between items-center"},_t={class:"flex !items-center"},ht={key:0,class:"flex items-center ml-2 pt-2"},gt=g(()=>t("h1",{class:"text-[12px] text-black mx-1 font-semibold font-['poppins']"},"Period : ",-1)),yt={class:"flex items-center"},wt=g(()=>t("p",{class:"relative left-2 font-['poppins']"},"Download",-1)),Et=g(()=>t("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check"},null,-1)),$t=g(()=>t("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"},null,-1)),Bt=g(()=>t("path",{d:"M8,1 L8,11",class:"svg-out"},null,-1)),Ct=[Et,$t,Bt],Dt={__name:"AttendanceMaster",setup(d){const s=L(),o=Ne(),B=m({global:{value:null,matchMode:z.CONTAINS}});m(),m([{name:"Active",id:1},{name:"Yet To Active",id:0},{name:"Exit",id:-1}]);const y=m([{type:"Late Coming",id:1},{type:"Early Going",id:2},{type:"Absent",id:3},{type:"Half-Day Absent",id:4}]);return(x,n)=>{const f=k("Dropdown"),b=k("MultiSelect"),T=k("InputText"),R=k("Column"),_=k("DataTable");return i(),r("div",Oe,[t("div",Ue,[He,t("div",null,[t("button",{onClick:n[0]||(n[0]=l=>(e(s).clearfilterBtn(x.activetab),e(o).clearDataTable())),class:"flex items-center text-[#000] !font-semibold !font-['poppins'] text-[12px] px-3 py-2 border-[1px] bg-[#F9BE00] mx-2 rounded-[4px]"},[je,G(" Clear Filter")])])]),t("div",ze,[t("div",Ge,[t("ul",We,[t("li",Ye,[t("a",{class:h(["px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820] w-[100%]",[e(o).activetab===1?"active font-semibold":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[1]||(n[1]=l=>(e(o).activetab=1,e(s).clearfilterBtn(x.activetab),e(o).clearDataTable()))}," DETAILED REPORT ",2),e(o).activetab===1?(i(),r("div",Je)):(i(),r("div",Ke))]),t("li",qe,[t("a",{class:h(["px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820] w-[100%]",[e(o).activetab===2?"active font-semibold":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[2]||(n[2]=l=>(e(o).activetab=2,e(s).clearfilterBtn(x.activetab),e(o).clearDataTable()))}," MUSTER ROLL ",2),e(o).activetab===2?(i(),r("div",Qe)):(i(),r("div",Xe))]),t("li",Ze,[t("a",{class:h(["px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820] w-[100%]",[e(o).activetab===3?"active font-semibold":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[3]||(n[3]=l=>(e(o).activetab=3,e(s).clearfilterBtn(x.activetab),e(o).clearDataTable()))}," CONSOLIDATE ",2),e(o).activetab===3?(i(),r("div",et)):(i(),r("div",tt))]),t("li",ot,[t("a",{class:h(["px-4 position-relative border-0 font-['poppins'] text-[14px] text-[#001820] w-[100%]",[e(o).activetab===4?"active font-semibold":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[4]||(n[4]=l=>(e(o).activetab=4,e(s).clearfilterBtn(x.activetab),e(o).clearDataTable()))}," OVERTIME ",2),e(o).activetab===4?(i(),r("div",at)):(i(),r("div",st))]),t("li",nt,[t("a",{class:h(["px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820] w-[100%]",[e(o).activetab===5?"active font-semibold":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[5]||(n[5]=l=>(e(o).activetab=5,e(s).clearfilterBtn(x.activetab),e(o).clearDataTable()))}," OTHERS ",2),e(o).activetab===5?(i(),r("div",lt)):(i(),r("div",it))])]),t("ul",rt,[t("li",dt,[pt,$(f,{optionLabel:"month",optionValue:"date",options:e(s).PeriodMonth,modelValue:e(s).period_Date,"onUpdate:modelValue":n[6]||(n[6]=l=>e(s).period_Date=l),onChange:n[7]||(n[7]=l=>e(o).getSelectoption("date",e(s).period_Date,e(o).activetab)),placeholder:"Select period",class:"w-[120px] mx-1 !h-10 my-1 !font-semibold !font-['poppins'] !text-[#000] !bg-[#E6E6E6]"},null,8,["options","modelValue"])]),t("li",ct,[mt,$(b,{modelValue:e(s).Department,"onUpdate:modelValue":n[8]||(n[8]=l=>e(s).Department=l),options:e(s).department,optionLabel:"name",placeholder:"Department",onChange:n[9]||(n[9]=l=>e(o).getSelectoption("department",e(s).Department,e(o).activetab)),optionValue:"id",maxSelectedLabels:3,class:"min-w-[100px] w-[140px] my-1 !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]"},null,8,["modelValue","options"])]),t("li",ut,[ft,$(b,{onChange:n[10]||(n[10]=l=>e(o).getSelectoption("legal_entity",e(s).legal_Entity,e(o).activetab)),modelValue:e(s).legal_Entity,"onUpdate:modelValue":n[11]||(n[11]=l=>e(s).legal_Entity=l),options:e(s).client_ids,optionLabel:"client_fullname",placeholder:"Legal Entity",optionValue:"id",maxSelectedLabels:3,class:"min-w-[100px] w-[140px] my-1 !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]"},null,8,["modelValue","options"])])])]),t("div",vt,[t("div",bt,[t("div",null,[t("div",xt,[t("div",_t,[t("div",null,[$(T,{placeholder:"Search",modelValue:B.value.global.value,"onUpdate:modelValue":n[12]||(n[12]=l=>B.value.global.value=l),class:"border-color !h-10 my-1"},null,8,["modelValue"])]),e(o).activetab==5?(i(),r("div",ht,[gt,$(f,{optionLabel:"type",optionValue:"id",options:y.value,modelValue:e(o).attendance_Type,"onUpdate:modelValue":n[13]||(n[13]=l=>e(o).attendance_Type=l),placeholder:"Select Type",class:"w-[120px] text-[10px] mx-1 !h-10 my-1 !font-semibold !font-['poppins'] !text-[#000] !bg-[#E6E6E6]"},null,8,["options","modelValue"])])):E("",!0)]),t("div",yt,[t("button",{class:h(["p-2 mx-2 rounded-md w-[120px]",[!e(o).AttendanceReportDynamicHeaders.length==0?"bg-[#000] text-white":" !text-[#000] !bg-[#E6E6E6] "]]),onClick:n[14]||(n[14]=l=>(e(o).btn_download=!e(o).btn_download,e(o).downloadAttendanceReports(e(o).activetab)))},[wt,t("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:h([e(o).btn_download==!0?x.toggleClass:" "])},[(i(),r("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16",class:h([!e(o).AttendanceReportDynamicHeaders.length==0?"!stroke-[#ffff] ":"!stroke-[#000]"])},Ct,2))],2)],2)])]),t("div",null,[$(_,{value:e(o).AttendanceReportSource,paginator:"",rows:5,rowsPerPageOptions:[5,10,20,50],paginatorTemplate:"RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink",currentPageReportTemplate:"{first} to {last} of {totalRecords}",responsiveLayout:"scroll"},{default:W(()=>[(i(!0),r(Y,null,J(e(o).AttendanceReportDynamicHeaders,l=>(i(),K(R,{key:l.title,field:l.title,header:l.title,style:{"white-space":"nowrap","text-align":"left"}},null,8,["field","header"]))),128))]),_:1},8,["value"])])])])])])])}}},kt=Pe(Dt,[["__scopeId","data-v-3b0be311"]]),Tt={style:{position:"relative"}},Rt={class:"mb-3 divide-x nav nav-pills divide-solid nav-tabs-dashed w-[50%]",id:"pills-tab",role:"tablist"},Lt={class:"nav-item",role:"presentation"},St={key:0,class:"h-1 rounded-l-3xl",style:{border:"2px solid #F9BE00 !important"}},At={key:1,class:"h-1 border-2 border-gray-300 rounded-l-3xl",style:{border:"2px solid #dcdcdc !important"}},Mt={class:"border-0 nav-item position-relative",role:"presentation"},Pt={key:0,class:"h-1 rounded-r-3xl position-absolute bottom-[1px] w-[100%] left-0",style:{border:"2px solid #F9BE00 !important"}},Vt={key:1,class:"h-1 border-2 border-gray-300 rounded-l-3xl"},Ft=t("div",{class:"border-gray-300 border-b-[4px] w-100 mt-[-7px]"},null,-1),It={class:"tab-content",id:""},Nt={class:"card-body"},Ot={key:0},Ut={key:1},Ht={key:2},jt={__name:"ReportsMaster",setup(d){const s=m(1),o=L();return X(()=>{o.fetchFilterClientIds(),o.getALLdepartment(),o.getPeriodMonth()}),(B,y)=>(i(),r("div",null,[t("div",Tt,[t("ul",Rt,[t("li",Lt,[t("a",{class:h(["px-4 position-relative border-0 font-['poppins'] text-[14px] text-[#001820]",[s.value===1?"active font-semibold border: 2px solid #F9BE00 !important;":"font-medium !text-[#8B8B8B] border: 2px solid #dcdcdc !important;"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:y[0]||(y[0]=x=>(s.value=1,e(o).clearfilterBtn(s.value)))}," EMPLOYEE REPORTS ",2),s.value===1?(i(),r("div",St)):(i(),r("div",At))]),E("",!0),E("",!0),t("li",Mt,[t("a",{class:h(["text-center px-4 border-0 font-['poppins'] text-[14px] text-[#001820]",[s.value===4?"active font-semibold ":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",onClick:y[3]||(y[3]=x=>(s.value=4,e(o).clearfilterBtn(s.value))),role:"tab","aria-controls":"","aria-selected":"true"}," ATTENDANCE ",2),s.value===4?(i(),r("div",Pt)):(i(),r("div",Vt))]),E("",!0),E("",!0),Ft]),t("div",It,[t("div",null,[t("div",Nt,[s.value===1?(i(),r("div",Ot,[$(A)])):E("",!0),s.value===4?(i(),r("div",Ut,[$(kt)])):E("",!0),s.value===3?(i(),r("div",Ht)):E("",!0)])])])])]))}},zt=Ve({history:Fe("/build/"),routes:[{path:"/testing_pradeesh",name:"home",component:A,children:[{path:"/",name:"user",component:S},{path:"/employee_CTC",name:"user",component:Me}]},{path:"/attenndance",name:"basicReport",component:Ie},{path:"/employeeMaster",name:"employeeMaster",component:S}]}),a=Z(jt),Gt=pe();a.use(ee,{ripple:!0});a.use(ye);a.use(ce);a.use(he);a.use(Gt);a.use(zt);a.directive("tooltip",me);a.directive("badge",ue);a.directive("ripple",te);a.directive("styleclass",fe);a.directive("focustrap",oe);a.component("Button",ae);a.component("DataTable",_e);a.component("Column",se);a.component("ColumnGroup",ge);a.component("Row",Ee);a.component("Toast",ve);a.component("ConfirmDialog",be);a.component("Dropdown",ne);a.component("InputText",le);a.component("Dialog",ie);a.component("ProgressSpinner",we);a.component("Calendar",$e);a.component("Textarea",Be);a.component("Chips",Ce);a.component("MultiSelect",De);a.component("InputNumber",re);a.component("InputMask",ke);a.component("OverlayPanel",Te);a.component("Tag",Re);a.component("Sidebar",xe);a.component("Accordion",Le);a.component("AccordionTab",Se);a.component("SelectButton",Ae);a.mount("#ReportsMaster");