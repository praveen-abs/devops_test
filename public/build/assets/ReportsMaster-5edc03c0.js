/* empty css              *//* empty css                     *//* empty css                   *//* empty css                 */import{H as u,g as _,o as a,c as i,d as e,h as m,n as v,w as L,F as $,f as T,b as w,ab as M,aa as b,a as d,l as D,I as S,P as R,R as P,u as V,x as F,J as A,L as U,N as I,K as N,M as O}from"./inputnumber.esm-3276ace1.js";import{d as z,c as j}from"./pinia-69eaa219.js";import{a as H,T as Y,B as G,S as J,b as K,s as W}from"./toastservice.esm-fd7fc957.js";import{s as q}from"./sidebar.esm-91a38ecf.js";import{a as Q}from"./datatable.esm-aaa10fcd.js";import{D as X,s as Z}from"./dialogservice.esm-d79ebc81.js";import{C as ee}from"./confirmationservice.esm-8b92365c.js";import{s as te}from"./progressspinner.esm-3aaf2487.js";import{s as oe}from"./row.esm-6ebc942e.js";import{s as se}from"./calendar.esm-5bf60357.js";import{s as ae}from"./textarea.esm-6856fedb.js";import{s as ie}from"./chips.esm-0f79d3f0.js";import{s as le}from"./multiselect.esm-449ab35c.js";import{s as ne}from"./inputmask.esm-adfad161.js";import{s as re}from"./overlaypanel.esm-7ff80356.js";import{s as pe}from"./tag.esm-290811e4.js";import{s as de}from"./accordion.esm-24de0775.js";import{s as ce}from"./accordiontab.esm-ed4692e6.js";import{s as me}from"./selectbutton.esm-216e8f42.js";import{E,_ as k,a as y,e as ue}from"./employee_master_report-f684b623.js";import{L as ve}from"./LoadingSpinner-89e164da.js";import{a as g}from"./index-362795f3.js";import{_ as C}from"./attendanceBasicReports-12292d45.js";import"./lodash-facb8280.js";import{c as xe,b as be}from"./vue-router-cdf0eac1.js";import"./_plugin-vue_export-helper-c27b6911.js";/* empty css                                                                       */import"./printer-346f1800.js";import"./download-5ba6c221.js";import"./no-data-d6f55554.js";import"./dayjs.min-2f06af28.js";import"./Service-8807663f.js";const _e=z("UseReports_store",()=>{const{downloand:f,legal_entity:o,department:s}=u();function c(){canShowLoading.value=!0,g.get("/filter-client-ids").then(p=>{o.value=p.data,console.log(o.value)}).finally(()=>{canShowLoading.value=!1})}function n(){canShowLoading.value=!0,g.get("/get-department").then(p=>{s.value=p.data}).finally(()=>{canShowLoading.value=!1})}return{legal_entity:o,department:s,fetchFilterClientIds:c,get_All_Department:n}}),fe={class:"bg-white p-2 flex justify-between"},he={class:"flex items-center"},ye=e("p",{class:"relative left-2 font-['poppins']"},"Download",-1),ge=e("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16"},[e("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check"}),e("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"}),e("path",{d:"M8,1 L8,11",class:"svg-out"})],-1),$e=[ge],we={__name:"others_attendance_Reports",setup(f){return _e(),(o,s)=>{const c=_("InputText"),n=_("Column"),p=_("DataTable");return a(),i("div",null,[e("div",fe,[e("div",null,[m(c,{placeholder:"Search",modelValue:o.filters.global.value,"onUpdate:modelValue":s[0]||(s[0]=x=>o.filters.global.value=x),class:"border-color !h-10",style:{height:"3em"}},null,8,["modelValue"])]),e("div",he,[e("button",{class:"bg-[#E6E6E6] p-2 mx-2 rounded-md w-[120px]",onClick:s[1]||(s[1]=x=>(o.UseEmployeeMaster.btn_download=!o.UseEmployeeMaster.btn_download,o.UseEmployeeMaster.downloadEmployeeMaster()))},[ye,e("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:v([o.UseEmployeeMaster.btn_download==!0?o.toggleClass:" "])},$e,2)])])]),e("div",null,[m(p,{value:o.UseEmployeeMaster.employeeMaterReportSource,paginator:"",rows:5,rowsPerPageOptions:[5,10,20,50],paginatorTemplate:"RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink",currentPageReportTemplate:"{first} to {last} of {totalRecords}",responsiveLayout:"scroll"},{default:L(()=>[(a(!0),i($,null,T(o.UseEmployeeMaster.Employee_MaterReportDynamicHeaders,x=>(a(),w(n,{key:x.title,field:x.title,header:x.title,style:{"white-space":"nowrap","text-align":"left"}},null,8,["field","header"]))),128))]),_:1},8,["value"])])])}}};const Ee={class:"px-2"},ke=e("div",{class:"flex justify-between mb-[10px]"},[e("h1",{class:"text-black text-[24px] font-semibold"},"Attendance Reports"),e("div",null,[e("button",{class:"flex items-center text-[#000] !font-semibold !font-['poppins'] px-3 py-2 border-[1px] border-[#DDDDDD] mx-2 rounded-[4px]"},[e("i",{class:"mr-2 pi pi-filter"}),D(" Apply Filter")])])],-1),Ce={style:{position:"relative"}},Be={class:"flex justify-between"},Le={class:"flex mb-3 divide-x max-[1200px]:!w-[50%] nav nav-pills divide-solid nav-tabs-dashed max-[1024px]:w-[100%]",id:"pills-tab",role:"tablist"},Te={class:"nav-item !border-0 text-center font-['poppins'] text-[14px] text-[#001820]",role:"presentation"},Me={key:0,class:"h-1 rounded-l-3xl relative top-[0px] !z-[10]",style:{border:"2.2px solid #F9BE00 !important"}},De={key:1,class:"h-1 border-gray-300 border-3 rounded-l-3xl",style:{border:"2.2px solid #dcdcdc !important"}},Se={class:"nav-item !border-0 flex items-center",role:"presentation"},Re={key:0,class:"w-[100%] h-1 relative top-[0px] !z-[10]",style:{border:"2.2px solid #F9BE00 !important"}},Pe={key:1,class:"h-1 border-gray-300 border-3 rounded-l-3xl",style:{border:"2.2px solid #dcdcdc !important"}},Ve={class:"nav-item !border-0 flex items-center",role:"presentation"},Fe={key:0,class:"w-[100%] h-1 relative top-[0px] !z-[10]",style:{border:"2.2px solid #F9BE00 !important"}},Ae={key:1,class:"h-1 border-gray-300 border-3 rounded-l-3xl",style:{border:"2.2px solid #dcdcdc !important"}},Ue={class:"nav-item !border-0 flex items-center",role:"presentation"},Ie={key:0,class:"w-[100%] h-1 relative top-[0px] !z-[10]",style:{border:"2.2px solid #F9BE00 !important"}},Ne={key:1,class:"h-1 border-gray-300 border-3 rounded-l-3xl",style:{border:"2.2px solid #dcdcdc !important"}},Oe={class:"nav-item !border-0 flex items-center",role:"presentation"},ze={key:0,class:"w-[100%] h-1 relative top-[0px] !z-[10]",style:{border:"2.2px solid #F9BE00 !important"}},je={key:1,class:"h-1 border-gray-300 border-3 rounded-l-3xl",style:{border:"2.2px solid #dcdcdc !important"}},He={class:"flex justify-between max-[1200px]:w-[50%] max-[1200px]:justify-start flex-wrap max-[1024px]:w-[100%]"},Ye={class:"flex items-center"},Ge=e("h1",{class:"text-[12px] text-black mx-1 font-semibold font-['poppins']"},"Period : ",-1),Je={class:"flex items-center"},Ke=e("h1",{class:"text-[12px] text-black mx-2 font-semibold font-['poppins']"},"Department : ",-1),We={class:"flex items-center"},qe=e("h1",{class:"text-[12px] text-black mx-1 font-semibold font-['poppins']"},"Legal Entity : ",-1),Qe={class:"tab-content",id:""},Xe={class:"card-body"},Ze={key:0},et={key:1},tt={key:2},ot={key:3},st={__name:"AttendanceMaster",setup(f){const o=E();M(()=>{o.fetchFilterClientIds(),o.getEmployeeCTC(),o.getALLdepartment(),o.getPeriodMonth(),c.value="",n.value="",p.value=""});const s=u(1),c=u(),n=u(),p=u();return u(),u([{name:"Active",id:1},{name:"Yet To Active",id:0},{name:"Exit",id:-1}]),(x,l)=>{const B=_("Dropdown"),h=_("MultiSelect");return a(),i("div",Ee,[ke,e("div",Ce,[e("div",Be,[e("ul",Le,[e("li",Te,[e("a",{class:v(["px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820] w-[100%]",[s.value===1?"active font-semibold":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:l[0]||(l[0]=r=>s.value=1)}," DETAILED REPORT ",2),s.value===1?(a(),i("div",Me)):(a(),i("div",De))]),e("li",Se,[e("a",{class:v(["px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820] w-[100%]",[s.value===2?"active font-semibold":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:l[1]||(l[1]=r=>s.value=2)}," MUSTER ROLL ",2),s.value===2?(a(),i("div",Re)):(a(),i("div",Pe))]),e("li",Ve,[e("a",{class:v(["px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820] w-[100%]",[s.value===3?"active font-semibold":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:l[2]||(l[2]=r=>s.value=3)}," CONSOLIDATE ",2),s.value===3?(a(),i("div",Fe)):(a(),i("div",Ae))]),e("li",Ue,[e("a",{class:v(["px-4 position-relative border-0 font-['poppins'] text-[14px] text-[#001820] w-[100%]",[s.value===4?"active font-semibold":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:l[3]||(l[3]=r=>s.value=4)}," OVERTIME ",2),s.value===4?(a(),i("div",Ie)):(a(),i("div",Ne))]),e("li",Oe,[e("a",{class:v(["px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820] w-[100%]",[s.value===5?"active font-semibold":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:l[4]||(l[4]=r=>s.value=5)}," OTHERS ",2),s.value===5?(a(),i("div",ze)):(a(),i("div",je))])]),e("ul",He,[e("li",Ye,[Ge,m(B,{optionLabel:"month",optionValue:"date",options:b(o).PeriodMonth,modelValue:p.value,"onUpdate:modelValue":l[5]||(l[5]=r=>p.value=r),onChange:l[6]||(l[6]=r=>b(o).updateEmployee_Basic_CTC(p.value)),placeholder:"Select period",class:"w-[120px] mx-1 !h-10 my-1 !font-semibold !font-['poppins'] !text-[#000] !bg-[#E6E6E6]"},null,8,["options","modelValue"])]),e("li",Je,[Ke,m(h,{modelValue:n.value,"onUpdate:modelValue":l[7]||(l[7]=r=>n.value=r),options:b(o).department,optionLabel:"name",placeholder:"Department",onChange:l[8]||(l[8]=r=>b(o).getEmployeeCTCReports(n.value)),optionValue:"id",maxSelectedLabels:3,class:"min-w-[100px] w-[140px] my-1 !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]"},null,8,["modelValue","options"])]),e("li",We,[qe,m(h,{onChange:l[9]||(l[9]=r=>b(o).sentFilterClientIds(c.value)),modelValue:c.value,"onUpdate:modelValue":l[10]||(l[10]=r=>c.value=r),options:b(o).client_ids,optionLabel:"client_fullname",placeholder:"Legal Entity",optionValue:"id",maxSelectedLabels:3,class:"min-w-[100px] w-[140px] my-1 !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]"},null,8,["modelValue","options"])])])]),e("div",Qe,[e("div",null,[e("div",Xe,[s.value===1?(a(),i("div",Ze,[m(C)])):d("",!0),s.value===2?(a(),i("div",et)):d("",!0),s.value===3?(a(),i("div",tt)):d("",!0),s.value===6?(a(),i("div",ot,[m(we)])):d("",!0)])])])])])}}},at={style:{position:"relative"}},it={class:"mb-3 divide-x nav nav-pills divide-solid nav-tabs-dashed w-[50%]",id:"pills-tab",role:"tablist"},lt={class:"nav-item",role:"presentation"},nt={key:0,class:"h-1 rounded-l-3xl",style:{border:"2px solid #F9BE00 !important"}},rt={key:1,class:"h-1 border-2 border-gray-300 rounded-l-3xl",style:{border:"2px solid #dcdcdc !important"}},pt={class:"border-0 nav-item position-relative",role:"presentation"},dt={key:0,class:"h-1 rounded-r-3xl position-absolute bottom-[1px] w-[100%] left-0",style:{border:"2px solid #F9BE00 !important"}},ct={key:1,class:"h-1 border-2 border-gray-300 rounded-l-3xl"},mt=e("div",{class:"border-gray-300 border-b-[4px] w-100 mt-[-7px]"},null,-1),ut={class:"tab-content",id:""},vt={class:"card-body"},xt={key:0},bt={key:1},_t={key:2},ft={__name:"ReportsMaster",setup(f){const o=u(1),s=E();return(c,n)=>(a(),i($,null,[b(s).canShowLoading?(a(),w(ve,{key:0,class:"absolute z-50 bg-white"})):d("",!0),e("div",null,[e("div",at,[e("ul",it,[e("li",lt,[e("a",{class:v(["px-4 position-relative border-0 font-['poppins'] text-[14px] text-[#001820]",[o.value===1?"active font-semibold border: 2px solid #F9BE00 !important;":"font-medium !text-[#8B8B8B] border: 2px solid #dcdcdc !important;"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[0]||(n[0]=p=>o.value=1)}," EMPLOYEE REPORTS ",2),o.value===1?(a(),i("div",nt)):(a(),i("div",rt))]),d("",!0),d("",!0),e("li",pt,[e("a",{class:v(["text-center px-4 border-0 font-['poppins'] text-[14px] text-[#001820]",[o.value===4?"active font-semibold ":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",onClick:n[3]||(n[3]=p=>o.value=4),role:"tab","aria-controls":"","aria-selected":"true"}," ATTENDANCE ",2),o.value===4?(a(),i("div",dt)):(a(),i("div",ct))]),d("",!0),d("",!0),mt]),e("div",ut,[e("div",null,[e("div",vt,[o.value===1?(a(),i("div",xt,[m(k)])):d("",!0),o.value===4?(a(),i("div",bt,[m(st)])):d("",!0),o.value===3?(a(),i("div",_t)):d("",!0)])])])])])],64))}},ht=xe({history:be("/build/"),routes:[{path:"/testing_pradeesh",name:"home",component:k,children:[{path:"/",name:"user",component:y},{path:"/employee_CTC",name:"user",component:ue}]},{path:"/attenndance",name:"basicReport",component:C},{path:"/employeeMaster",name:"employeeMaster",component:y}]}),t=S(ft),yt=j();t.use(R,{ripple:!0});t.use(ee);t.use(H);t.use(X);t.use(yt);t.use(ht);t.directive("tooltip",Y);t.directive("badge",G);t.directive("ripple",P);t.directive("styleclass",J);t.directive("focustrap",V);t.component("Button",F);t.component("DataTable",Q);t.component("Column",A);t.component("ColumnGroup",Z);t.component("Row",oe);t.component("Toast",K);t.component("ConfirmDialog",W);t.component("Dropdown",U);t.component("InputText",I);t.component("Dialog",N);t.component("ProgressSpinner",te);t.component("Calendar",se);t.component("Textarea",ae);t.component("Chips",ie);t.component("MultiSelect",le);t.component("InputNumber",O);t.component("InputMask",ne);t.component("OverlayPanel",re);t.component("Tag",pe);t.component("Sidebar",q);t.component("Accordion",de);t.component("AccordionTab",ce);t.component("SelectButton",me);t.mount("#ReportsMaster");
