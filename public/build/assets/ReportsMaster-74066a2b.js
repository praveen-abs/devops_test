/* empty css              *//* empty css                     *//* empty css                   *//* empty css                 */import{Q as m,W as K,a7 as Q,g as R,o as u,c as x,d as o,aa as e,l as q,n as g,h,b as V,a as y,w as X,F as Z,f as ee,ac as te,ad as oe,ab as ae,H as ne,P as le,R as se,u as re,x as ie,I as de,K as pe,M as ce,J as me,L as fe}from"./inputnumber.esm-e362c3ab.js";import{d as ue,c as be}from"./pinia-641035e3.js";import{a as ve,T as xe,B as _e,S as ge,b as he,s as ye}from"./toastservice.esm-8d63d505.js";import{s as we}from"./sidebar.esm-24c26f31.js";import{a as Ee}from"./datatable.esm-5f85e77a.js";import{D as De,s as Se}from"./dialogservice.esm-acafdb8a.js";import{C as $e}from"./confirmationservice.esm-62abe3ae.js";import{s as Ce}from"./progressspinner.esm-dd1a9f95.js";import{s as Be}from"./row.esm-6ebc942e.js";import{s as Le}from"./calendar.esm-871de032.js";import{s as Re}from"./textarea.esm-36dc9b1f.js";import{s as Te}from"./chips.esm-94e18b40.js";import{s as Ae}from"./multiselect.esm-774f4ea4.js";import{s as Me}from"./inputmask.esm-1fbc333c.js";import{s as ke}from"./overlaypanel.esm-e07df2f8.js";import{s as Pe}from"./tag.esm-97cd34b7.js";import{s as Ve,a as Fe}from"./accordiontab.esm-fd1c50c0.js";import{s as Ie}from"./selectbutton.esm-5571bcb8.js";import{E as P,_ as N,a as F,e as Ne}from"./employee_master_report-78a42098.js";/* empty css                                                                       */import{a as S}from"./index-362795f3.js";import"./lodash-facb8280.js";import{d as I}from"./dayjs.min-2f06af28.js";import{L as Oe}from"./LoadingSpinner-235e9bb4.js";import{_ as Ue}from"./_plugin-vue_export-helper-c27b6911.js";import{c as He,b as Ye}from"./vue-router-7a52ee16.js";import{_ as je}from"./attendanceBasicReports-e2c1ba8e.js";import"./printer-e0530634.js";import"./download-5ba6c221.js";import"./no-data-d6f55554.js";import"./Service-2af407d6.js";const Ge=ue("UseReports_store",()=>{const r=P(),l=m(),t=m(),$=m(),E=m(),_=m(),n=m(),C=m(),B=m(),f=m(),v=m(!1),T=m(1),A=m(),a=K({date:"",department_id:"",client_id:"",active_status:"",start_date:"",end_date:""}),L=m([]),D=m([]);function O(){v.value=!0,S.get("/clients-fetchAll").then(d=>{l.value=d.data,console.log("legal_entity ::",l.value)}).finally(()=>{v.value=!1})}function U(){v.value=!0,S.get("/get-department").then(d=>{t.value=d.data}).finally(()=>{v.value=!1})}function H(){v.value=!0,S.post("/get-filter-months-for-reports").then(d=>{$.value=d.data}).finally(()=>{v.value=!1})}function Y(d,i,p){console.log(d,i,p),console.log(a);let c;p==2?c="/fetch-attendance-data":p==4?c="/fetch-overtime-report-data":p==5&&(f.value?f.value==1?c="/fetch-LC-report-data":f.value==2?c="/fetch-EG-report-data":f.value==3?c="/fetch-absent-report-data":f.value==4&&(c="/fetch-half-day-report"):(Swal.fire({title:"error",text:"selected report type",icon:"error",showCancelButton:!1}),r.period_Date=null,r.Department=null,r.legal_Entity=null)),d=="department"?a.department_id=i:d=="Category"?(a.active_status=i,console.log(a)):d=="date"?a.date=i:d=="legal_entity"&&(a.client_id=i),c&&(r.canShowLoading=!0,S.post(c,a).then(b=>{L.value=b.data.rows,b.data.headers.forEach(M=>{let k={title:M};D.value.push(k),b.data.rows.length===0&&Swal.fire({title:b.data.status="failure",text:"No employees found in this category",icon:"error",showCancelButton:!1}).then(J=>{})})}).finally(()=>{r.canShowLoading=!1,r.selectedfilters.active_status="",r.selectedfilters.date="",r.selectedfilters.department_id="",r.selectedfilters.legal_entity="",r.legal_Entity="",r.Department="",r.period_Date="",r.select_Category=""}))}function j(d,i,p){let c;p==2?c="/fetch-attendance-data":p==4?c="/fetch-overtime-report-data":p==5&&(f.value?f.value==1?c="/fetch-LC-report-data":f.value==2?c="/fetch-EG-report-data":f.value==3?c="/fetch-absent-report-data":f.value==4&&(c="/fetch-half-day-report"):(Swal.fire({title:"error",text:"selected report type",icon:"error",showCancelButton:!1}),r.period_Date=null,r.Department=null,r.legal_Entity=null)),d=="start_date"?(a.start_date=i,console.log(a)):d=="end_date"&&(a.end_date=i,console.log(a)),p!==1&&a.start_date&&a.end_date?(console.log("success"),r.canShowLoading=!0,S.post(c,a).then(b=>{L.value=b.data.rows,b.data.headers.forEach(M=>{let k={title:M};D.value.push(k),b.data.rows.length===0&&Swal.fire({title:b.data.status="failure",text:"No employees found in this category",icon:"error",showCancelButton:!1}).then(J=>{})})}).finally(()=>{r.canShowLoading=!1})):console.log("testing start date and end date ::",a)}const G=d=>{r.canShowLoading=!0;let i,p;d==1?(i="/reports/generate-detailed-attendance-report",p="Attendance Detailed Report"):d==2?(i="/reports/generate-basic-attendance",p="Attendance Basic Report"):d==4?(i="/report/download-over-time-report",p="Attendance Overtime Report"):d==5&&(f.value==1?(i="/report/download-late-coming-report",p="Attendance Late-coming Report"):f.value==2?(i="/report/download-early-going-report",p="Attendance Early-coming Report"):f.value==3?(i="/report/download-absent-report",p="Attendance Absent Report"):f.value==4&&(i="/report/download-half-day-report",p="Attendance Half-day Report")),i&&S.post(i,a,{responseType:"blob"}).then(c=>{console.log(c.data);var b=document.createElement("a");b.href=window.URL.createObjectURL(c.data),b.download=`${p}.xlsx`,b.click()}).finally(()=>{r.canShowLoading=!1,r.selectedfilters.active_status="",r.selectedfilters.date="",r.selectedfilters.department_id="",r.selectedfilters.legal_entity="",r.legal_Entity="",r.Department="",r.period_Date="",r.select_Category="",C.value="",B.value="",a.end_date="",a.start_date=""})},z=async()=>{let d="/fetch-attendance-data";v.value=!0,await S.post(d).then(i=>{console.log(i.data.rows),L.value=i.data.rows,i.data.headers.forEach(p=>{let c={title:p};D.value.push(c),console.log(p)}),console.log(D.value)}).finally(()=>{v.value=!1})};function W(){L.value.splice(0,L.value.length),D.value.splice(0,D.value.length),f.value=null,C.value="",B.value="",a.end_date="",a.start_date=""}return{canShowLoading:v,Legal_Entity:E,Department:_,PeriodMonth:n,Start_Date:C,End_Date:B,btn_download:A,getPeriodMonth:$,getDepartment:t,get_Legal_Entity:l,activetab:T,fetchFilterClientId:O,get_All_Department:U,fetchPeriodMonth:H,getSelectoption:Y,AttendanceReportSource:L,AttendanceReportDynamicHeaders:D,getEmployeeAttendanceReports:z,attendance_Type:f,downloadAttendanceReports:G,clearDataTable:W,select_StartAndEnd_Date:j}});const w=r=>(te("data-v-25cdef88"),r=r(),oe(),r),ze={class:"px-2"},We={class:"flex justify-between mb-[10px]"},Je=w(()=>o("h1",{class:"text-black text-[24px] font-semibold"},"Attendance Reports",-1)),Ke=w(()=>o("i",{class:"mr-2 pi pi-times"},null,-1)),Qe={style:{position:"relative"}},qe={class:"flex justify-between"},Xe={class:"flex mb-3 divide-x max-[1300px]:!w-[40%] max-[1400px]:![50%] nav nav-pills divide-solid nav-tabs-dashed max-[1024px]:w-[100%]",id:"pills-tab",role:"tablist"},Ze={class:"nav-item !border-0 text-center font-['poppins'] text-[14px] text-[#001820]",role:"presentation"},et={class:"nav-item !border-0 flex items-center",role:"presentation"},tt={class:"nav-item !border-0 flex items-center",role:"presentation"},ot={class:"nav-item !border-0 flex items-center",role:"presentation"},at={class:"nav-item !border-0 flex items-center",role:"presentation"},nt={class:"flex justify-between max-[1300px]:w-[60%] max-[1400px]:![50%] max-[1200px]:justify-start flex-wrap max-[1024px]:w-[100%]"},lt={class:"flex items-center"},st=w(()=>o("h1",{class:"text-[12px] text-black mx-1 font-semibold font-['poppins']"},"Period : ",-1)),rt={class:"flex items-center"},it=w(()=>o("h1",{class:"text-[12px] text-black mx-2 font-semibold font-['poppins']"},"Department : ",-1)),dt={class:"flex items-center"},pt=w(()=>o("h1",{class:"text-[12px] text-black mx-1 font-semibold font-['poppins']"},"Legal Entity : ",-1)),ct={class:"tab-content",id:""},mt={class:"card-body"},ft={class:"flex items-center justify-between p-2 bg-white"},ut={class:"flex !items-center"},bt={key:0,class:"flex items-center pt-2 ml-2"},vt=w(()=>o("h1",{class:"text-[12px] text-black mx-1 font-semibold font-['poppins']"},"Period : ",-1)),xt={class:"flex items-center"},_t=w(()=>o("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check"},null,-1)),gt=w(()=>o("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"},null,-1)),ht=w(()=>o("path",{d:"M8,1 L8,11",class:"svg-out"},null,-1)),yt=[_t,gt,ht],wt={__name:"AttendanceMaster",setup(r){const l=P(),t=Ge(),$=m({global:{value:null,matchMode:Q.CONTAINS}});m(),m(),m(),m([{name:"Active",id:1},{name:"Yet To Active",id:0},{name:"Exit",id:-1}]);const E=m([{type:"Late Coming",id:1},{type:"Early Going",id:2},{type:"Absent",id:3},{type:"Half-Day Absent",id:4}]);return(_,n)=>{const C=R("Dropdown"),B=R("MultiSelect"),f=R("InputText"),v=R("Calendar"),T=R("Column"),A=R("DataTable");return u(),x("div",ze,[o("div",We,[Je,o("div",null,[o("button",{onClick:n[0]||(n[0]=a=>(e(l).clearfilterBtn(_.activetab),e(t).clearDataTable())),class:"flex items-center text-[#000] !font-semibold !font-['poppins'] text-[12px] px-3 py-2 border-[1px] bg-[#F9BE00] mx-2 rounded-[4px]"},[Ke,q(" Clear Filter")])])]),o("div",Qe,[o("div",qe,[o("ul",Xe,[o("li",Ze,[o("a",{class:g(["px-2 position-relative font-['poppins'] text-[14px] text-[#001820] w-[100%]",[e(t).activetab===1?"active font-semibold !border-b-[2.2px]  !border-[#F9BE00]":"font-medium !text-[#8B8B8B] border-b-[2.2px] border-[#dcdcdc] "]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[1]||(n[1]=a=>(e(t).activetab=1,e(l).clearfilterBtn(_.activetab),e(t).clearDataTable()))}," DETAILED REPORT ",2)]),o("li",et,[o("a",{class:g(["px-2 position-relative font-['poppins'] text-[14px] text-[#001820] w-[100%]",[e(t).activetab===2?"active font-semibold !border-b-[2.2px]  !border-[#F9BE00]":"font-medium !text-[#8B8B8B] border-b-[2.2px] border-[#dcdcdc] "]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[2]||(n[2]=a=>(e(t).activetab=2,e(l).clearfilterBtn(_.activetab),e(t).clearDataTable()))}," MUSTER ROLL ",2)]),o("li",tt,[o("a",{class:g(["px-2 position-relative font-['poppins'] text-[14px] text-[#001820] w-[100%]",[e(t).activetab===3?"active font-semibold !border-b-[2.2px]  !border-[#F9BE00]":"font-medium !text-[#8B8B8B] border-b-[2.2px] border-[#dcdcdc] "]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[3]||(n[3]=a=>(e(t).activetab=3,e(l).clearfilterBtn(_.activetab),e(t).clearDataTable()))}," CONSOLIDATE ",2)]),o("li",ot,[o("a",{class:g(["px-4 position-relative font-['poppins'] text-[14px] text-[#001820] w-[100%]",[e(t).activetab===4?"active font-semibold !border-b-[2.2px]  !border-[#F9BE00]":"font-medium !text-[#8B8B8B] border-b-[2.2px] border-[#dcdcdc] "]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[4]||(n[4]=a=>(e(t).activetab=4,e(l).clearfilterBtn(_.activetab),e(t).clearDataTable()))}," OVERTIME ",2)]),o("li",at,[o("a",{class:g(["px-2 position-relative font-['poppins'] text-[14px] text-[#001820] w-[100%]",[e(t).activetab===5?"active font-semibold !border-b-[2.2px]  !border-[#F9BE00]":"font-medium !text-[#8B8B8B] border-b-[2.2px] border-[#dcdcdc] "]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[5]||(n[5]=a=>(e(t).activetab=5,e(l).clearfilterBtn(_.activetab),e(t).clearDataTable()))}," OTHERS ",2)])]),o("ul",nt,[o("li",lt,[st,h(C,{optionLabel:"month",optionValue:"date",options:e(l).PeriodMonth,modelValue:e(l).period_Date,"onUpdate:modelValue":n[6]||(n[6]=a=>e(l).period_Date=a),onChange:n[7]||(n[7]=a=>e(t).getSelectoption("date",e(l).period_Date,e(t).activetab)),placeholder:"Select period",class:"w-[120px] mx-1 !h-10 my-1 !font-semibold !font-['poppins'] !text-[#000] !bg-[#E6E6E6]"},null,8,["options","modelValue"])]),o("li",rt,[it,h(B,{modelValue:e(l).Department,"onUpdate:modelValue":n[8]||(n[8]=a=>e(l).Department=a),options:e(l).department,optionLabel:"name",placeholder:"Department",onChange:n[9]||(n[9]=a=>e(t).getSelectoption("department",e(l).Department,e(t).activetab)),optionValue:"id",maxSelectedLabels:3,class:"min-w-[100px] w-[140px] my-1 !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]"},null,8,["modelValue","options"])]),o("li",dt,[pt,h(B,{onChange:n[10]||(n[10]=a=>e(t).getSelectoption("legal_entity",e(l).legal_Entity,e(t).activetab)),modelValue:e(l).legal_Entity,"onUpdate:modelValue":n[11]||(n[11]=a=>e(l).legal_Entity=a),options:e(l).client_ids,optionLabel:"client_fullname",placeholder:"Legal Entity",optionValue:"id",maxSelectedLabels:3,class:"min-w-[100px] w-[140px] my-1 !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]"},null,8,["modelValue","options"])])])]),o("div",ct,[o("div",mt,[e(l).canShowLoading?(u(),V(Oe,{key:0,class:"absolute z-50 bg-white"})):y("",!0),o("div",null,[o("div",ft,[o("div",ut,[o("div",null,[h(f,{placeholder:"Search",modelValue:$.value.global.value,"onUpdate:modelValue":n[12]||(n[12]=a=>$.value.global.value=a),class:"border-color !h-10 my-1"},null,8,["modelValue"])]),e(t).activetab==5?(u(),x("div",bt,[vt,h(C,{optionLabel:"type",optionValue:"id",options:E.value,modelValue:e(t).attendance_Type,"onUpdate:modelValue":n[13]||(n[13]=a=>e(t).attendance_Type=a),placeholder:"Select Type",class:"w-[120px] text-[10px] mx-1 !h-10 my-1 !font-semibold !font-['poppins'] !text-[#000] !bg-[#E6E6E6]"},null,8,["options","modelValue"])])):y("",!0),o("div",null,[h(v,{modelValue:e(t).Start_Date,"onUpdate:modelValue":n[14]||(n[14]=a=>e(t).Start_Date=a),onDateSelect:n[15]||(n[15]=a=>e(t).select_StartAndEnd_Date("start_date",e(I)(e(t).Start_Date).format("YYYY-MM-DD"),e(t).activetab)),dateFormat:"dd-mm-yy",class:"w-[150px] h-10 mx-2",placeholder:"Start-date "},null,8,["modelValue"]),h(v,{modelValue:e(t).End_Date,"onUpdate:modelValue":n[16]||(n[16]=a=>e(t).End_Date=a),dateFormat:"dd-mm-yy",onDateSelect:n[17]||(n[17]=a=>e(t).select_StartAndEnd_Date("end_date",e(I)(e(t).End_Date).format("YYYY-MM-DD"),e(t).activetab)),class:"w-[150px] h-10",placeholder:"End-date "},null,8,["modelValue"])])]),o("div",xt,[o("button",{class:g(["p-2 mx-2 rounded-md w-[120px]",[!e(t).AttendanceReportDynamicHeaders.length==0?"bg-[#000] text-white":" !text-[#000] !bg-[#E6E6E6] "]]),onClick:n[18]||(n[18]=a=>(e(t).btn_download=!e(t).btn_download,e(t).downloadAttendanceReports(e(t).activetab)))},[o("p",{class:g(["relative left-2 font-['poppins']",[!e(t).AttendanceReportDynamicHeaders.length==0?"bg-[#000] !text-[#ffff]":"!text-[#000] !bg-[#E6E6E6]"]])},"Download",2),o("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:g([e(t).btn_download==!0?_.toggleClass:" "])},[(u(),x("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16",class:g([!e(t).AttendanceReportDynamicHeaders.length==0?"!stroke-[#ffff] ":"!stroke-[#000]"])},yt,2))],2)],2)])]),o("div",null,[h(A,{value:e(t).AttendanceReportSource,paginator:"",rows:5,rowsPerPageOptions:[5,10,20,50],responsiveLayout:"scroll",scrollable:"",scrollHeight:"240px",paginatorTemplate:"RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink",currentPageReportTemplate:"{first} to {last} of {totalRecords}"},{default:X(()=>[(u(!0),x(Z,null,ee(e(t).AttendanceReportDynamicHeaders,a=>(u(),V(T,{key:a.title,field:a.title,header:a.title,style:{"white-space":"nowrap","text-align":"left",width:"15rem !important","marign-right":"1rem !important"}},null,8,["field","header"]))),128))]),_:1},8,["value"])])])])])])])}}},Et=Ue(wt,[["__scopeId","data-v-25cdef88"]]),Dt={style:{position:"relative"}},St={class:"mb-3 divide-x nav nav-pills divide-solid nav-tabs-dashed w-[50%]",id:"pills-tab",role:"tablist"},$t={class:"nav-item",role:"presentation"},Ct={key:0,class:"h-1 rounded-l-3xl",style:{border:"2px solid #F9BE00 !important"}},Bt={key:1,class:"h-1 border-2 border-gray-300 rounded-l-3xl",style:{border:"2px solid #dcdcdc !important"}},Lt={class:"border-0 nav-item position-relative",role:"presentation"},Rt={key:0,class:"h-1 rounded-r-3xl position-absolute bottom-[1px] w-[100%] left-0",style:{border:"2px solid #F9BE00 !important"}},Tt={key:1,class:"h-1 border-2 border-gray-300 rounded-l-3xl"},At=o("div",{class:"border-gray-300 border-b-[4px] w-100 mt-[-7px]"},null,-1),Mt={class:"tab-content",id:""},kt={class:"card-body"},Pt={key:0},Vt={key:1},Ft={key:2},It={__name:"ReportsMaster",setup(r){const l=m(1),t=P();return ae(()=>{t.fetchFilterClientIds(),t.getALLdepartment(),t.getPeriodMonth()}),($,E)=>(u(),x("div",null,[o("div",Dt,[o("ul",St,[o("li",$t,[o("a",{class:g(["px-4 position-relative border-0 font-['poppins'] text-[14px] text-[#001820]",[l.value===1?"active font-semibold border: 2px solid #F9BE00 !important;":"font-medium !text-[#8B8B8B] border: 2px solid #dcdcdc !important;"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:E[0]||(E[0]=_=>(l.value=1,e(t).clearfilterBtn(l.value)))}," EMPLOYEE REPORTS ",2),l.value===1?(u(),x("div",Ct)):(u(),x("div",Bt))]),y("",!0),y("",!0),o("li",Lt,[o("a",{class:g(["text-center px-4 border-0 font-['poppins'] text-[14px] text-[#001820]",[l.value===4?"active font-semibold ":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",onClick:E[3]||(E[3]=_=>(l.value=4,e(t).clearfilterBtn(l.value))),role:"tab","aria-controls":"","aria-selected":"true"}," ATTENDANCE ",2),l.value===4?(u(),x("div",Rt)):(u(),x("div",Tt))]),y("",!0),y("",!0),At]),o("div",Mt,[o("div",null,[o("div",kt,[l.value===1?(u(),x("div",Pt,[h(N)])):y("",!0),l.value===4?(u(),x("div",Vt,[h(Et)])):y("",!0),l.value===3?(u(),x("div",Ft)):y("",!0)])])])])]))}},Nt=He({history:Ye(),routes:[{path:"/testing_pradeesh",name:"home",component:N,children:[{path:"/",name:"user",component:F},{path:"/employee_CTC",name:"user",component:Ne}]},{path:"/attenndance",name:"basicReport",component:je},{path:"/employeeMaster",name:"employeeMaster",component:F}]}),s=ne(It),Ot=be();s.use(le,{ripple:!0});s.use($e);s.use(ve);s.use(De);s.use(Ot);s.use(Nt);s.directive("tooltip",xe);s.directive("badge",_e);s.directive("ripple",se);s.directive("styleclass",ge);s.directive("focustrap",re);s.component("Button",ie);s.component("DataTable",Ee);s.component("Column",de);s.component("ColumnGroup",Se);s.component("Row",Be);s.component("Toast",he);s.component("ConfirmDialog",ye);s.component("Dropdown",pe);s.component("InputText",ce);s.component("Dialog",me);s.component("ProgressSpinner",Ce);s.component("Calendar",Le);s.component("Textarea",Re);s.component("Chips",Te);s.component("MultiSelect",Ae);s.component("InputNumber",fe);s.component("InputMask",Me);s.component("OverlayPanel",ke);s.component("Tag",Pe);s.component("Sidebar",we);s.component("Accordion",Ve);s.component("AccordionTab",Fe);s.component("SelectButton",Ie);s.mount("#ReportsMaster");
