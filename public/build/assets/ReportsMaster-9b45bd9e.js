/* empty css              *//* empty css                     *//* empty css                   *//* empty css                 */import{H as m,W as G,a7 as W,g as L,o as i,c as d,d as t,n as w,aa as e,h as E,a as h,w as Y,F as A,f as J,b as M,ac as K,ad as q,l as Q,ab as X,I as Z,P as ee,R as te,u as oe,x as ae,J as se,L as ne,N as le,K as ie,M as re}from"./inputnumber.esm-3276ace1.js";import{d as de,c as pe}from"./pinia-69eaa219.js";import{a as ce,T as me,B as ue,S as fe,b as ve,s as be}from"./toastservice.esm-fd7fc957.js";import{s as xe}from"./sidebar.esm-91a38ecf.js";import{a as _e}from"./datatable.esm-aaa10fcd.js";import{D as he,s as ge}from"./dialogservice.esm-d79ebc81.js";import{C as ye}from"./confirmationservice.esm-8b92365c.js";import{s as we}from"./progressspinner.esm-3aaf2487.js";import{s as Ee}from"./row.esm-6ebc942e.js";import{s as $e}from"./calendar.esm-5bf60357.js";import{s as Be}from"./textarea.esm-6856fedb.js";import{s as De}from"./chips.esm-0f79d3f0.js";import{s as Ce}from"./multiselect.esm-449ab35c.js";import{s as Le}from"./inputmask.esm-adfad161.js";import{s as Te}from"./overlaypanel.esm-7ff80356.js";import{s as ke}from"./tag.esm-290811e4.js";import{s as Se}from"./accordion.esm-24de0775.js";import{s as Re}from"./accordiontab.esm-ed4692e6.js";import{s as Ae}from"./selectbutton.esm-216e8f42.js";import{E as S,_ as P,a as R,e as Me}from"./employee_master_report-4191c5b7.js";import{L as Pe}from"./LoadingSpinner-04b36c70.js";import{a as C}from"./index-362795f3.js";import"./lodash-facb8280.js";import{_ as Ve}from"./_plugin-vue_export-helper-c27b6911.js";import{c as Fe,b as Ie}from"./vue-router-cdf0eac1.js";import{_ as Ne}from"./attendanceBasicReports-508a6a9b.js";/* empty css                                                                       */import"./printer-e0530634.js";import"./download-5ba6c221.js";import"./no-data-d6f55554.js";import"./dayjs.min-2f06af28.js";import"./Service-8807663f.js";const Oe=de("UseReports_store",()=>{const r=S(),s=m(),o=m(),B=m(),g=m(),x=m(),n=m(),f=m(),b=m(!1),T=m(1),k=m(),_=G({date:"",department_id:"",client_id:"",active_status:""}),l=m([]),D=m([]);function V(){b.value=!0,C.get("/clients-fetchAll").then(c=>{s.value=c.data,console.log("legal_entity ::",s.value)}).finally(()=>{b.value=!1})}function F(){b.value=!0,C.get("/get-department").then(c=>{o.value=c.data}).finally(()=>{b.value=!1})}function I(){b.value=!0,C.post("/get-filter-months-for-reports").then(c=>{B.value=c.data}).finally(()=>{b.value=!1})}function N(c,p,u){console.log(c,p,u),console.log(_);let v;u==2?v="/fetch-attendance-data":u==4?v="/fetch-overtime-report-data":u==5&&(f.value?f.value==1?v="/fetch-LC-report-data":f.value==2?v="/fetch-EG-report-data":f.value==3?v="/fetch-absent-report-data":f.value==4&&(v="/fetch-half-day-report"):(Swal.fire({title:"error",text:"selected report type",icon:"error",showCancelButton:!1}),r.period_Date=null,r.Department=null,r.legal_Entity=null)),c=="department"?_.department_id=p:c=="Category"?(_.active_status=p,console.log(_)):c=="date"?_.date=p:c=="legal_entity"&&(_.client_id=p),v&&(r.canShowLoading=!0,C.post(v,_).then(y=>{l.value=y.data.rows,y.data.headers.forEach(z=>{let H={title:z};D.value.push(H),y.data.rows.length===0&&Swal.fire({title:y.data.status="failure",text:"No employees found in this category",icon:"error",showCancelButton:!1}).then(zt=>{})})}).finally(()=>{r.canShowLoading=!1,r.selectedfilters.active_status="",r.selectedfilters.date="",r.selectedfilters.department_id="",r.selectedfilters.legal_entity="",r.legal_Entity="",r.Department="",r.period_Date="",r.select_Category=""}))}const O=c=>{r.canShowLoading=!0;let p,u;c==1?(p="/reports/generate-detailed-attendance-report",u="Attendance Detailed Report"):c==2?(p="/reports/generate-basic-attendance",u="Attendance Basic Report"):c==4?(p="/report/download-over-time-report",u="Attendance Overtime Report"):c==5&&(f.value==1?(p="/report/download-late-coming-report",u="Attendance Late-coming Report"):f.value==2?(p="/report/download-early-going-report",u="Attendance Early-coming Report"):f.value==3?(p="/report/download-absent-report",u="Attendance Absent Report"):f.value==4&&(p="/report/download-half-day-report",u="Attendance Half-day Report")),p&&C.post(p,_,{responseType:"blob"}).then(v=>{console.log(v.data);var y=document.createElement("a");y.href=window.URL.createObjectURL(v.data),y.download=`${u}.xlsx`,y.click()}).finally(()=>{r.canShowLoading=!1})},U=async()=>{let c="/fetch-attendance-data";b.value=!0,await C.post(c).then(p=>{console.log(p.data.rows),l.value=p.data.rows,p.data.headers.forEach(u=>{let v={title:u};D.value.push(v),console.log(u)}),console.log(D.value)}).finally(()=>{b.value=!1})};function j(){l.value.splice(0,l.value.length),D.value.splice(0,D.value.length),f.value=null}return{canShowLoading:b,Legal_Entity:g,Department:x,PeriodMonth:n,btn_download:k,getPeriodMonth:B,getDepartment:o,get_Legal_Entity:s,activetab:T,fetchFilterClientId:V,get_All_Department:F,fetchPeriodMonth:I,getSelectoption:N,AttendanceReportSource:l,AttendanceReportDynamicHeaders:D,getEmployeeAttendanceReports:U,attendance_Type:f,downloadAttendanceReports:O,clearDataTable:j}});const $=r=>(K("data-v-889c7681"),r=r(),q(),r),Ue={class:"px-2"},je=$(()=>t("div",{class:"flex justify-between mb-[10px]"},[t("h1",{class:"text-black text-[24px] font-semibold"},"Attendance Reports"),t("div",null,[t("button",{class:"flex items-center text-[#000] !font-semibold !font-['poppins'] px-3 py-2 border-[1px] border-[#DDDDDD] mx-2 rounded-[4px]"},[t("i",{class:"mr-2 pi pi-filter"}),Q(" Apply Filter")])])],-1)),ze={style:{position:"relative"}},He={class:"flex justify-between"},Ge={class:"flex mb-3 divide-x max-[1200px]:!w-[50%] nav nav-pills divide-solid nav-tabs-dashed max-[1024px]:w-[100%]",id:"pills-tab",role:"tablist"},We={class:"nav-item !border-0 text-center font-['poppins'] text-[14px] text-[#001820]",role:"presentation"},Ye={key:0,class:"h-1 rounded-l-3xl relative top-[0px] !z-[10]",style:{border:"2.2px solid #F9BE00 !important"}},Je={key:1,class:"h-1 border-gray-300 border-3 rounded-l-3xl",style:{border:"2.2px solid #dcdcdc !important"}},Ke={class:"nav-item !border-0 flex items-center",role:"presentation"},qe={key:0,class:"w-[100%] h-1 relative top-[0px] !z-[10]",style:{border:"2.2px solid #F9BE00 !important"}},Qe={key:1,class:"h-1 border-gray-300 border-3 rounded-l-3xl",style:{border:"2.2px solid #dcdcdc !important"}},Xe={class:"nav-item !border-0 flex items-center",role:"presentation"},Ze={key:0,class:"w-[100%] h-1 relative top-[0px] !z-[10]",style:{border:"2.2px solid #F9BE00 !important"}},et={key:1,class:"h-1 border-gray-300 border-3 rounded-l-3xl",style:{border:"2.2px solid #dcdcdc !important"}},tt={class:"nav-item !border-0 flex items-center",role:"presentation"},ot={key:0,class:"w-[100%] h-1 relative top-[0px] !z-[10]",style:{border:"2.2px solid #F9BE00 !important"}},at={key:1,class:"h-1 border-gray-300 border-3 rounded-l-3xl",style:{border:"2.2px solid #dcdcdc !important"}},st={class:"nav-item !border-0 flex items-center",role:"presentation"},nt={key:0,class:"w-[100%] h-1 relative top-[0px] !z-[10]",style:{border:"2.2px solid #F9BE00 !important"}},lt={key:1,class:"h-1 border-gray-300 border-3 rounded-l-3xl",style:{border:"2.2px solid #dcdcdc !important"}},it={class:"flex justify-between max-[1200px]:w-[50%] max-[1200px]:justify-start flex-wrap max-[1024px]:w-[100%]"},rt={class:"flex items-center"},dt=$(()=>t("h1",{class:"text-[12px] text-black mx-1 font-semibold font-['poppins']"},"Period : ",-1)),pt={class:"flex items-center"},ct=$(()=>t("h1",{class:"text-[12px] text-black mx-2 font-semibold font-['poppins']"},"Department : ",-1)),mt={class:"flex items-center"},ut=$(()=>t("h1",{class:"text-[12px] text-black mx-1 font-semibold font-['poppins']"},"Legal Entity : ",-1)),ft={class:"tab-content",id:""},vt={class:"card-body"},bt={class:"bg-white p-2 flex justify-between items-center"},xt={class:"flex !items-center"},_t={key:0,class:"flex items-center ml-2 pt-2"},ht=$(()=>t("h1",{class:"text-[12px] text-black mx-1 font-semibold font-['poppins']"},"Period : ",-1)),gt={class:"flex items-center"},yt=$(()=>t("p",{class:"relative left-2 font-['poppins']"},"Download",-1)),wt=$(()=>t("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16"},[t("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check"}),t("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"}),t("path",{d:"M8,1 L8,11",class:"svg-out"})],-1)),Et=[wt],$t={__name:"AttendanceMaster",setup(r){const s=S(),o=Oe(),B=m({global:{value:null,matchMode:W.CONTAINS}});m(),m([{name:"Active",id:1},{name:"Yet To Active",id:0},{name:"Exit",id:-1}]);const g=m([{type:"Late Coming",id:1},{type:"Early Going",id:2},{type:"Absent",id:3},{type:"Half-Day Absent",id:4}]);return(x,n)=>{const f=L("Dropdown"),b=L("MultiSelect"),T=L("InputText"),k=L("Column"),_=L("DataTable");return i(),d("div",Ue,[je,t("div",ze,[t("div",He,[t("ul",Ge,[t("li",We,[t("a",{class:w(["px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820] w-[100%]",[e(o).activetab===1?"active font-semibold":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[0]||(n[0]=l=>(e(o).activetab=1,e(s).clearfilterBtn(x.activetab),e(o).clearDataTable()))}," DETAILED REPORT ",2),e(o).activetab===1?(i(),d("div",Ye)):(i(),d("div",Je))]),t("li",Ke,[t("a",{class:w(["px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820] w-[100%]",[e(o).activetab===2?"active font-semibold":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[1]||(n[1]=l=>(e(o).activetab=2,e(s).clearfilterBtn(x.activetab),e(o).clearDataTable()))}," MUSTER ROLL ",2),e(o).activetab===2?(i(),d("div",qe)):(i(),d("div",Qe))]),t("li",Xe,[t("a",{class:w(["px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820] w-[100%]",[e(o).activetab===3?"active font-semibold":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[2]||(n[2]=l=>(e(o).activetab=3,e(s).clearfilterBtn(x.activetab),e(o).clearDataTable()))}," CONSOLIDATE ",2),e(o).activetab===3?(i(),d("div",Ze)):(i(),d("div",et))]),t("li",tt,[t("a",{class:w(["px-4 position-relative border-0 font-['poppins'] text-[14px] text-[#001820] w-[100%]",[e(o).activetab===4?"active font-semibold":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[3]||(n[3]=l=>(e(o).activetab=4,e(s).clearfilterBtn(x.activetab),e(o).clearDataTable()))}," OVERTIME ",2),e(o).activetab===4?(i(),d("div",ot)):(i(),d("div",at))]),t("li",st,[t("a",{class:w(["px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820] w-[100%]",[e(o).activetab===5?"active font-semibold":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[4]||(n[4]=l=>(e(o).activetab=5,e(s).clearfilterBtn(x.activetab),e(o).clearDataTable()))}," OTHERS ",2),e(o).activetab===5?(i(),d("div",nt)):(i(),d("div",lt))])]),t("ul",it,[t("li",rt,[dt,E(f,{optionLabel:"month",optionValue:"date",options:e(s).PeriodMonth,modelValue:e(s).period_Date,"onUpdate:modelValue":n[5]||(n[5]=l=>e(s).period_Date=l),onChange:n[6]||(n[6]=l=>e(o).getSelectoption("date",e(s).period_Date,e(o).activetab)),placeholder:"Select period",class:"w-[120px] mx-1 !h-10 my-1 !font-semibold !font-['poppins'] !text-[#000] !bg-[#E6E6E6]"},null,8,["options","modelValue"])]),t("li",pt,[ct,E(b,{modelValue:e(s).Department,"onUpdate:modelValue":n[7]||(n[7]=l=>e(s).Department=l),options:e(s).department,optionLabel:"name",placeholder:"Department",onChange:n[8]||(n[8]=l=>e(o).getSelectoption("department",e(s).Department,e(o).activetab)),optionValue:"id",maxSelectedLabels:3,class:"min-w-[100px] w-[140px] my-1 !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]"},null,8,["modelValue","options"])]),t("li",mt,[ut,E(b,{onChange:n[9]||(n[9]=l=>e(o).getSelectoption("legal_entity",e(s).legal_Entity,e(o).activetab)),modelValue:e(s).legal_Entity,"onUpdate:modelValue":n[10]||(n[10]=l=>e(s).legal_Entity=l),options:e(s).client_ids,optionLabel:"client_fullname",placeholder:"Legal Entity",optionValue:"id",maxSelectedLabels:3,class:"min-w-[100px] w-[140px] my-1 !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]"},null,8,["modelValue","options"])])])]),t("div",ft,[t("div",vt,[t("div",null,[t("div",bt,[t("div",xt,[t("div",null,[E(T,{placeholder:"Search",modelValue:B.value.global.value,"onUpdate:modelValue":n[11]||(n[11]=l=>B.value.global.value=l),class:"border-color !h-10 my-1"},null,8,["modelValue"])]),e(o).activetab==5?(i(),d("div",_t,[ht,E(f,{optionLabel:"type",optionValue:"id",options:g.value,modelValue:e(o).attendance_Type,"onUpdate:modelValue":n[12]||(n[12]=l=>e(o).attendance_Type=l),placeholder:"Select Type",class:"w-[120px] text-[10px] mx-1 !h-10 my-1 !font-semibold !font-['poppins'] !text-[#000] !bg-[#E6E6E6]"},null,8,["options","modelValue"])])):h("",!0)]),t("div",gt,[t("button",{class:"bg-[#E6E6E6] p-2 mx-2 rounded-md w-[120px]",onClick:n[13]||(n[13]=l=>(e(o).btn_download=!e(o).btn_download,e(o).downloadAttendanceReports(e(o).activetab)))},[yt,t("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:w([e(o).btn_download==!0?x.toggleClass:" "])},Et,2)])])]),t("div",null,[E(_,{value:e(o).AttendanceReportSource,paginator:"",rows:5,rowsPerPageOptions:[5,10,20,50],paginatorTemplate:"RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink",currentPageReportTemplate:"{first} to {last} of {totalRecords}",responsiveLayout:"scroll"},{default:Y(()=>[(i(!0),d(A,null,J(e(o).AttendanceReportDynamicHeaders,l=>(i(),M(k,{key:l.title,field:l.title,header:l.title,style:{"white-space":"nowrap","text-align":"left"}},null,8,["field","header"]))),128))]),_:1},8,["value"])])])])])])])}}},Bt=Ve($t,[["__scopeId","data-v-889c7681"]]),Dt={style:{position:"relative"}},Ct={class:"mb-3 divide-x nav nav-pills divide-solid nav-tabs-dashed w-[50%]",id:"pills-tab",role:"tablist"},Lt={class:"nav-item",role:"presentation"},Tt={key:0,class:"h-1 rounded-l-3xl",style:{border:"2px solid #F9BE00 !important"}},kt={key:1,class:"h-1 border-2 border-gray-300 rounded-l-3xl",style:{border:"2px solid #dcdcdc !important"}},St={class:"border-0 nav-item position-relative",role:"presentation"},Rt={key:0,class:"h-1 rounded-r-3xl position-absolute bottom-[1px] w-[100%] left-0",style:{border:"2px solid #F9BE00 !important"}},At={key:1,class:"h-1 border-2 border-gray-300 rounded-l-3xl"},Mt=t("div",{class:"border-gray-300 border-b-[4px] w-100 mt-[-7px]"},null,-1),Pt={class:"tab-content",id:""},Vt={class:"card-body"},Ft={key:0},It={key:1},Nt={key:2},Ot={__name:"ReportsMaster",setup(r){const s=m(1),o=S();return X(()=>{o.fetchFilterClientIds(),o.getALLdepartment(),o.getPeriodMonth()}),(B,g)=>(i(),d(A,null,[e(o).canShowLoading?(i(),M(Pe,{key:0,class:"absolute z-50 bg-white"})):h("",!0),t("div",null,[t("div",Dt,[t("ul",Ct,[t("li",Lt,[t("a",{class:w(["px-4 position-relative border-0 font-['poppins'] text-[14px] text-[#001820]",[s.value===1?"active font-semibold border: 2px solid #F9BE00 !important;":"font-medium !text-[#8B8B8B] border: 2px solid #dcdcdc !important;"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:g[0]||(g[0]=x=>(s.value=1,e(o).clearfilterBtn(s.value)))}," EMPLOYEE REPORTS ",2),s.value===1?(i(),d("div",Tt)):(i(),d("div",kt))]),h("",!0),h("",!0),t("li",St,[t("a",{class:w(["text-center px-4 border-0 font-['poppins'] text-[14px] text-[#001820]",[s.value===4?"active font-semibold ":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",onClick:g[3]||(g[3]=x=>(s.value=4,e(o).clearfilterBtn(s.value))),role:"tab","aria-controls":"","aria-selected":"true"}," ATTENDANCE ",2),s.value===4?(i(),d("div",Rt)):(i(),d("div",At))]),h("",!0),h("",!0),Mt]),t("div",Pt,[t("div",null,[t("div",Vt,[s.value===1?(i(),d("div",Ft,[E(P)])):h("",!0),s.value===4?(i(),d("div",It,[E(Bt)])):h("",!0),s.value===3?(i(),d("div",Nt)):h("",!0)])])])])])],64))}},Ut=Fe({history:Ie("/build/"),routes:[{path:"/testing_pradeesh",name:"home",component:P,children:[{path:"/",name:"user",component:R},{path:"/employee_CTC",name:"user",component:Me}]},{path:"/attenndance",name:"basicReport",component:Ne},{path:"/employeeMaster",name:"employeeMaster",component:R}]}),a=Z(Ot),jt=pe();a.use(ee,{ripple:!0});a.use(ye);a.use(ce);a.use(he);a.use(jt);a.use(Ut);a.directive("tooltip",me);a.directive("badge",ue);a.directive("ripple",te);a.directive("styleclass",fe);a.directive("focustrap",oe);a.component("Button",ae);a.component("DataTable",_e);a.component("Column",se);a.component("ColumnGroup",ge);a.component("Row",Ee);a.component("Toast",ve);a.component("ConfirmDialog",be);a.component("Dropdown",ne);a.component("InputText",le);a.component("Dialog",ie);a.component("ProgressSpinner",we);a.component("Calendar",$e);a.component("Textarea",Be);a.component("Chips",De);a.component("MultiSelect",Ce);a.component("InputNumber",re);a.component("InputMask",Le);a.component("OverlayPanel",Te);a.component("Tag",ke);a.component("Sidebar",xe);a.component("Accordion",Se);a.component("AccordionTab",Re);a.component("SelectButton",Ae);a.mount("#ReportsMaster");
