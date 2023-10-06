import{a as $}from"./index-362795f3.js";import{s as re,r as i,A as de,_ as ee,o as j,R as te,c as L,e as m,f as h,g as t,n as w,h as e,j as R,p as E,k as F,l as N,F as oe,m as le,C as ae,D as ne,H as se,i as O}from"./app-e27ee384.js";import"./lodash-facb8280.js";import{L as Z}from"./LoadingSpinner-9bb4493a.js";/* empty css                                                                       */import{d as ie}from"./dayjs.min-2f06af28.js";const U=re("EmployeeMasterStore",()=>{const d=i(),o=i(),l=i(),D=i(),y=i(),s=i(),n=i(!1),C=i(),u=i(!1),b=i([]),r=i([]),k=i(),A=i(""),I=i(1),a=i(!1),f=de({date:"",department_id:"",legal_entity:"",active_status:"",type:""}),S=i([]),B=i([]),Y=()=>{let c="/fetch-employee-ctc-report";a.value=!0,$.post(c,{type:""}).then(g=>{console.log(g.data.rows,"get value "),b.value=g.data.rows,console.log(b.value," testings data"),g.data.headers.forEach(v=>{let T={title:v};r.value.push(T),console.log(v)}),console.log(r.value)}).finally(()=>{a.value=!1})};function z(){a.value=!0,$.get("/filter-client-ids").then(c=>{y.value=c.data,console.log(" testing client id",y.value)}).finally(()=>{a.value=!1})}function G(){a.value=!0,$.get("/get-department").then(c=>{k.value=c.data}).finally(()=>{a.value=!1})}function q(){a.value=!0,$.post("/get-filter-months-for-reports").then(c=>{A.value=c.data}).finally(()=>{a.value=!1})}function J(){b.value.splice(0),r.value.splice(0),u.value==!0?(console.log(u),u.value=!1,C.value="",console.log(C.value)):u.value==!1&&(u.value=!0,C.value="detailed",console.log(C.value)),f.type=C.value,$.post("/fetch-employee-ctc-report",f).then(c=>{console.log(c.data.rows,"get value "),b.value=c.data.rows,console.log(b.value," testings data"),c.data.headers.forEach(g=>{let v={title:g};r.value.push(v),console.log(g)}),console.log(r.value)})}const K=()=>{let c="/generate-employee-ctc-report";a.value=!0,$.post(c,f,{responseType:"blob"}).then(g=>{console.log(g.data);var v=document.createElement("a");v.href=window.URL.createObjectURL(g.data),v.download="Employee CTC Report_.xlsx",v.click()}).finally(()=>{n.value=!1,a.value=!1})};function Q(c){if(console.log("active_status: ",c),B.value.splice(0,B.value.length),S.value.splice(0,S.value.length),b.value.splice(0,b.value.length),r.value.splice(0,r.value.length),c==1){a.value=!0;let g="/fetch-master-employee-report";$.post(g,f).then(v=>{console.log(v.data.rows,"get value "),S.value=v.data.rows,console.log(S.value," testings data"),v.data.headers.forEach(T=>{let X={title:T};B.value.push(X),console.log(T)}),console.log(B.value),v.data.headers.length===0&&Swal.fire({title:v.data.status="failure",text:"No employees found in this category",icon:"error",showCancelButton:!1}).then(T=>{})}).finally(()=>{a.value=!1})}else if(c==2){let g="/fetch-employee-ctc-report";a.value=!0,$.post(g,f).then(v=>{console.log(v.data.rows,"get value "),b.value=v.data.rows,console.log(b.value," testings data"),v.data.headers.forEach(T=>{let X={title:T};r.value.push(X),console.log(T)}),console.log(r.value),v.data.rows.length===0&&Swal.fire({title:v.data.status="failure",text:"No employees found in this category",icon:"error",showCancelButton:!1}).then(T=>{})}).finally(()=>{a.value=!1})}}function W(c,g,v){console.log(c,g,v),c=="department"?f.department_id=g:c=="Category"?(f.active_status=g,console.log(f)):c=="date"?f.date=g:c=="legal_entity"&&(f.legal_entity=g)}function _(){let c="/fetch-master-employee-report";a.value=!0,$.post(c,{type:""}).then(g=>{console.log(g.data.rows,"get value "),S.value=g.data.rows,console.log(S.value," testings data"),g.data.headers.forEach(v=>{let T={title:v};B.value.push(T),console.log(v)}),console.log(B.value)}).finally(()=>{a.value=!1})}function p(){let c="/generate-master-employee-report-data";a.value=!0,$.post(c,f,{responseType:"blob"}).then(g=>{console.log(g.data);var v=document.createElement("a");v.href=window.URL.createObjectURL(g.data),v.download="Employee Master Report_.xlsx",v.click()}).finally(()=>{n.value=!1,a.value=!1})}function x(c){console.log("testing data :",c),c===2?(b.value.splice(0,b.value.length),r.value.splice(0,r.value.length),f.active_status="",f.date="",f.department_id="",f.legal_entity="",d.value="",o.value="",l.value="",D.value=""):(S.value.splice(0,S.value.length),B.value.splice(0,B.value.length),f.active_status="",f.date="",f.department_id="",f.legal_entity="",d.value="",o.value="",l.value="",D.value="")}function P(c){console.log(c?"1":"2",c)}function V(c){c===4?A.value.push({date:"custom_date",month:"Custom Date"}):A.value.pop()}return{show:u,client_ids:y,employeeCTCReportSource:b,Employee_CTCReportDynamicHeaders:r,personalDetail:C,selectCategory:s,department:k,PeriodMonth:A,fetchFilterClientIds:z,getEmployeeCTC:Y,personalDetails:J,getALLdepartment:G,getPeriodMonth:q,updateEmployeeApplyFilter:Q,downloadEmployeeCTC:K,btn_download:n,canShowLoading:a,filterbtn:I,legal_Entity:d,Department:o,period_Date:l,select_Category:D,getemployeeMater:_,employeeMaterReportSource:S,Employee_MaterReportDynamicHeaders:B,downloadEmployeeMaster:p,getSelectoption:W,clearfilterBtn:x,testings:P,selectedfilters:f,resetChars:()=>{f.active_status="",f.date="",f.department_id="",f.legal_entity="",d.value="",o.value="",l.value="",D.value=""},filterCustomDate:V}});const H=d=>(ae("data-v-8e29533c"),d=d(),ne(),d),ce={class:"flex justify-between p-2 bg-white"},ue={class:""},me={class:"flex items-center"},fe=H(()=>t("h1",{class:"text-[12px] text-black font-semibold font-['poppins']"},"Personal Details -",-1)),ve={key:0,class:"pi pi-eye"},_e={key:1,class:"pi pi-eye-slash"},xe=H(()=>t("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check"},null,-1)),be=H(()=>t("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"},null,-1)),ge=H(()=>t("path",{d:"M8,1 L8,11",class:"svg-out"},null,-1)),he=[xe,be,ge],ye={class:""},we={__name:"employee_CTC",setup(d){const o=U();j(()=>{}),i([]);const l=i({global:{value:null,matchMode:te.CONTAINS}}),D=i("downloaded");return(y,s)=>{const n=L("InputText"),C=L("loadingSpinner"),u=L("Column"),b=L("DataTable");return m(),h("div",null,[t("div",ce,[t("div",ue,[w(n,{placeholder:"Search",modelValue:l.value.global.value,"onUpdate:modelValue":s[0]||(s[0]=r=>l.value.global.value=r),class:"border-color !h-10 my-2"},null,8,["modelValue"])]),t("div",me,[fe,t("button",{class:"bg-[#E6E6E6] px-3 p-2 rounded-md mx-2",onClick:s[1]||(s[1]=r=>e(o).personalDetails())},[e(o).show&&e(o).personalDetail=="detailed"?(m(),h("i",ve)):e(o).show?R("",!0):(m(),h("i",_e))]),t("button",{class:E(["p-2 mx-2 rounded-md w-[120px]",[!e(o).employeeCTCReportSource.length==0?"bg-[#000] text-white":" !text-[#000] !bg-[#E6E6E6] "]]),onClick:s[2]||(s[2]=r=>(e(o).btn_download=!e(o).btn_download,e(o).downloadEmployeeCTC()))},[t("p",{class:E(["relative left-2 font-['poppins']",[!e(o).employeeCTCReportSource.length==0?"bg-[#000] !text-[#ffff]":"!text-[#000] !bg-[#E6E6E6]"]])},"Download",2),t("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:E([e(o).btn_download==!0?D.value:" "])},[(m(),h("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16",class:E([!e(o).employeeCTCReportSource.length==0?"!stroke-[#ffff] ":"!stroke-[#000]"])},he,2))],2)],2)])]),t("div",ye,[e(o).canShowLoading?(m(),F(C,{key:0,class:"absolute z-50 bg-white"})):R("",!0),w(b,{value:e(o).employeeCTCReportSource,filters:l.value,paginator:"",rows:5,rowsPerPageOptions:[5,10,20,50],scrollable:"",scrollHeight:"240px",paginatorTemplate:"RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink",currentPageReportTemplate:"{first} to {last} of {totalRecords}",responsiveLayout:"scroll"},{default:N(()=>[(m(!0),h(oe,null,le(e(o).Employee_CTCReportDynamicHeaders,r=>(m(),F(u,{key:r.title,field:r.title,header:r.title,style:{"white-space":"nowrap","text-align":"left",width:"15rem !important"}},null,8,["field","header"]))),128))]),_:1},8,["value","filters"])])])}}},Ee=ee(we,[["__scopeId","data-v-8e29533c"]]);const Ce=d=>(ae("data-v-d0145d58"),d=d(),ne(),d),De={class:"flex justify-between bg-white py-1"},Se={class:"flex items-center"},$e=Ce(()=>t("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"},null,-1)),Le={class:""},Re={__name:"Employee_Master",setup(d){i(1);const o=U();j(()=>{});const l=i({global:{value:null,matchMode:te.CONTAINS}}),D=i("downloaded");return(y,s)=>{const n=L("InputText"),C=L("Column"),u=L("DataTable");return m(),h("div",null,[t("div",null,[t("div",De,[t("div",null,[w(n,{placeholder:"Search",modelValue:l.value.global.value,"onUpdate:modelValue":s[0]||(s[0]=b=>l.value.global.value=b),class:"border-color !h-10 my-2",style:{height:"3em"}},null,8,["modelValue"])]),t("div",Se,[t("button",{class:E(["p-2 mx-2 rounded-md w-[120px]",[!e(o).employeeMaterReportSource.length==0?"bg-[#000] !text-[#ffff]":"!text-[#000] !bg-[#E6E6E6]"]]),onClick:s[1]||(s[1]=b=>(e(o).btn_download=!e(o).btn_download,e(o).downloadEmployeeMaster()))},[t("p",{class:E(["relative left-2 font-['poppins']",[!e(o).employeeMaterReportSource.length==0?"bg-[#000] !text-[#ffff]":"!text-[#000] !bg-[#E6E6E6]"]])},"Download",2),t("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:E([e(o).btn_download==!0?D.value:""])},[(m(),h("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16",class:E([!e(o).employeeMaterReportSource.length==0?"!stroke-[#ffff] ":"!stroke-[#000]"])},[t("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check",style:se([!e(o).employeeMaterReportSource.length===0?"stroke=blue":"!bg-[#E6E6E6] !text-[#000] "])},null,4),$e,t("path",{d:"M8,1 L8,11",class:"svg-out",stroke:"",style:se([e(o).employeeMaterReportSource.length===0?"red":"fill: red"])},null,4)],2))],2)],2)])]),t("div",Le,[w(u,{value:e(o).employeeMaterReportSource,paginator:"",rows:5,rowsPerPageOptions:[5,10,20,50],responsiveLayout:"scroll",scrollable:"",scrollHeight:"240px",paginatorTemplate:"RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink",currentPageReportTemplate:"{first} to {last} of {totalRecords}"},{default:N(()=>[(m(!0),h(oe,null,le(e(o).Employee_MaterReportDynamicHeaders,b=>(m(),F(C,{class:"",key:b.title,field:b.title,header:b.title,style:{"text-align":"left",width:"15rem !important","marign-right":"1rem !important"},resizableColumns:"",columnResizeMode:"fit"},null,8,["field","header"]))),128))]),_:1},8,["value"])])])])}}},ke=ee(Re,[["__scopeId","data-v-d0145d58"]]);const Be={class:"px-2"},Te={class:"flex justify-between mb-[10px]"},Me=t("h1",{class:"text-black text-[24px] font-semibold"},"Employee Master Report",-1),Ae={class:"flex item-center"},Pe=t("i",{class:"mr-2 pi pi-times"},null,-1),Ve=t("i",{class:"mr-2 pi pi-filter"},null,-1),Fe={style:{position:"relative"}},Ue={class:"flex justify-between"},Ie={class:"flex mb-3 h-[3rem] !border-[0px] divide-x !w-[280px] nav nav-pills divide-solid nav-tabs-dashed max-[1024px]:w-[100%]",id:"pills-tab",role:"tablist"},Ne={class:"flex items-center nav-item !border-[0px]",role:"presentation"},Oe={class:"flex items-center nav-item !border-[0px]",role:"presentation"},je={class:"flex justify-between max-[1200px]:w-[60%] max-[1200px]:justify-start flex-wrap max-[1024px]:w-[100%]"},He={class:"flex items-center"},Ye=t("h1",{class:"text-[12px] text-black px-1 font-semibold font-['poppins'] whitespace-nowrap"},"Period : ",-1),ze={class:"flex items-center"},Ge=t("h1",{class:"text-[12px] text-black px-1 font-semibold font-['poppins'] whitespace-nowrap"}," Department : ",-1),qe={class:"flex items-center"},Je=t("h1",{class:"text-[12px] text-black px-1 font-semibold font-['poppins'] whitespace-nowrap"},"Legal Entity : ",-1),Ke={class:"flex items-center my-1"},Qe=t("h1",{class:"text-[12px] text-black px-1 font-semibold font-['poppins'] whitespace-nowrap"},"Status : ",-1),We={class:"tab-content",id:""},Xe={class:"card-body"},Ze={key:0},et={key:1},tt={key:2},ot={__name:"employee_master_report",setup(d){const o=U();j(()=>{}),i("border-[1px] border-[#F9BE00]"),i("border-[1px] border-[#DCDCDC]");const l=i(1),D=i([{name:"Active",id:1},{name:"Yet To Active",id:0},{name:"Exit",id:-1}]);return(y,s)=>{const n=L("Dropdown"),C=L("MultiSelect");return m(),h("div",Be,[t("div",Te,[Me,t("div",Ae,[t("button",{onClick:s[0]||(s[0]=u=>e(o).clearfilterBtn(l.value)),class:"my-2 flex items-center text-[#000] !font-semibold !font-['poppins'] text-[12px] px-3 py-2 border-[1px] bg-[#F9BE00] mx-2 rounded-[4px]"},[Pe,O(" Clear Filter")]),t("button",{onClick:s[1]||(s[1]=u=>e(o).updateEmployeeApplyFilter(l.value)),class:"my-2 flex items-center text-[#000] !font-semibold !font-['poppins'] text-[12px] px-3 py-2 border-[1px] !bg-[#E6E6E6] mx-2 rounded-[4px]"},[Ve,O(" Run")])])]),t("div",Fe,[t("div",Ue,[t("ul",Ie,[t("li",Ne,[t("a",{class:E(["p-2 position-relative font-['poppins'] !border-r-[0px] text-[14px] text-[#001820] w-[100%] !m-[0px]",[l.value===1?"active font-semibold !border-b-[2.2px]  !border-[#F9BE00]":"font-medium !text-[#8B8B8B] border-b-[2.2px] border-[#dcdcdc] "]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:s[2]||(s[2]=u=>(l.value=1,e(o).clearfilterBtn(l.value)))}," Employee Master ",2)]),t("li",Oe,[t("a",{class:E(["p-2 position-relative font-['poppins'] text-[14px] text-[#001820] w-[100%]",[l.value===2?"active font-semibold !border-b-[2.2px]  !border-[#F9BE00]":"font-medium !text-[#8B8B8B] border-b-[2.2px] border-[#dcdcdc] "]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:s[3]||(s[3]=u=>(l.value=2,e(o).clearfilterBtn(l.value)))}," Employee CTC ",2)])]),t("ul",je,[t("li",He,[Ye,w(n,{optionLabel:"month",optionValue:"date",options:e(o).PeriodMonth,modelValue:e(o).period_Date,"onUpdate:modelValue":s[4]||(s[4]=u=>e(o).period_Date=u),onChange:s[5]||(s[5]=u=>e(o).getSelectoption("date",e(o).period_Date,l.value)),placeholder:"   -- Select --",class:"w-[150px] mx-1 !h-10 !font-semibold !font-['poppins'] !text-[#000] !bg-[#E6E6E6]"},null,8,["options","modelValue"])]),t("li",ze,[Ge,w(C,{modelValue:e(o).Department,"onUpdate:modelValue":s[6]||(s[6]=u=>e(o).Department=u),options:e(o).department,optionLabel:"name",placeholder:" -- Select --",onChange:s[7]||(s[7]=u=>e(o).getSelectoption("department",e(o).Department,l.value)),optionValue:"id",maxSelectedLabels:3,class:"min-w-[100px] w-[150px] !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]"},null,8,["modelValue","options"])]),t("li",qe,[Je,w(C,{onChange:s[8]||(s[8]=u=>e(o).getSelectoption("legal_entity",e(o).legal_Entity,l.value)),modelValue:e(o).legal_Entity,"onUpdate:modelValue":s[9]||(s[9]=u=>e(o).legal_Entity=u),options:e(o).client_ids,optionLabel:"client_fullname",placeholder:" -- Select --",optionValue:"id",maxSelectedLabels:3,class:"min-w-[100px] w-[150px] !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]"},null,8,["modelValue","options"])]),t("li",Ke,[Qe,w(C,{onChange:s[10]||(s[10]=u=>e(o).getSelectoption("Category",e(o).select_Category,l.value)),modelValue:e(o).select_Category,"onUpdate:modelValue":s[11]||(s[11]=u=>e(o).select_Category=u),optionValue:"id",options:D.value,optionLabel:"name",placeholder:"-- Select --",maxSelectedLabels:3,class:"min-w-[100px] w-[150px] !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6] mx-2"},null,8,["modelValue","options"])])])]),t("div",We,[t("div",null,[t("div",Xe,[l.value===1?(m(),h("div",Ze,[e(o).canShowLoading?(m(),F(Z,{key:0,class:"absolute z-50 bg-white"})):R("",!0),w(ke)])):R("",!0),l.value===2?(m(),h("div",et,[e(o).canShowLoading?(m(),F(Z,{key:0,class:"absolute z-50 bg-white"})):R("",!0),w(Ee)])):R("",!0),l.value===3?(m(),h("div",tt)):R("",!0)])])])])])}}},lt=re("UseReports_store",()=>{const d=U(),o=i(),l=i(),D=i(),y=i(!1),s=i(),n=i(),C=i(),u=i(),b=i(),r=i(),k=i(!1),A=i(1),I=i(),a=de({date:"",department_id:"",client_id:"",active_status:"",start_date:"",end_date:""}),f=i([]),S=i([]);function B(){k.value=!0,$.get("/clients-fetchAll").then(_=>{o.value=_.data,console.log("legal_entity ::",o.value)}).finally(()=>{k.value=!1})}function Y(){k.value=!0,$.get("/get-department").then(_=>{l.value=_.data}).finally(()=>{k.value=!1})}function z(){k.value=!0,$.post("/get-filter-months-for-reports").then(_=>{D.value=_.data}).finally(()=>{k.value=!1})}function G(_,p,x){console.log(_,p,x),console.log(a),console.log(p),x==1||x==2||x==4?p==="custom_date"&&(y.value=!0):x==5&&(r.value?r.value==1||r.value==2||r.value==3?p==="custom_date"&&(y.value=!0):r.value==4&&p==="custom_date"&&(y.value=!0):(Swal.fire({title:"error",text:"selected report type",icon:"error",showCancelButton:!1}),d.period_Date=null,d.Department=null,d.legal_Entity=null)),_=="department"?a.department_id=p:_=="Category"?(a.active_status=p,console.log(a)):_=="date"?a.date=p:_=="legal_entity"&&(a.client_id=p)}function q(_){let p;console.log(_,"url "),_==2?p="/fetch-attendance-data":_==4?p="/fetch-overtime-report-data":_==5&&(r.value?r.value==1?p="/fetch-LC-report-data":r.value==2?p="/fetch-EG-report-data":r.value==3?p="/fetch-absent-report-data":r.value==4&&(p="/fetch-half-day-report"):(Swal.fire({title:"error",text:"selected report type",icon:"error",showCancelButton:!1}),d.period_Date=null,d.Department=null,d.legal_Entity=null)),p&&(d.canShowLoading=!0,$.post(p,a).then(x=>{f.value=x.data.rows,x.data.headers.forEach(P=>{let V={title:P};S.value.push(V),x.data.rows.length===0&&Swal.fire({title:x.data.status="failure",text:"No employees found in this category",icon:"error",showCancelButton:!1}).then(pe=>{})})}).finally(()=>{d.canShowLoading=!1}))}function J(_,p,x){x==2||x==4||x==5&&(r.value?r.value==1||r.value==2||r.value==3||r.value==4:(Swal.fire({title:"error",text:"selected report type",icon:"error",showCancelButton:!1}),d.period_Date=null,d.Department=null,d.legal_Entity=null)),_=="start_date"?(a.start_date=p,console.log(a)):_=="end_date"&&(a.end_date=p,console.log(a)),a.start_date&&a.end_date&&(y.value=!1)}const K=_=>{d.canShowLoading=!0;let p,x;_==1?(p="/reports/generate-detailed-attendance-report",x="Attendance Detailed Report"):_==2?(p="/reports/generate-basic-attendance",x="Attendance Basic Report"):_==4?(p="/report/download-over-time-report",x="Attendance Overtime Report"):_==5&&(r.value==1?(p="/report/download-late-coming-report",x="Attendance Late-coming Report"):r.value==2?(p="/report/download-early-going-report",x="Attendance Early going Report"):r.value==3?(p="/report/download-absent-report",x="Attendance Absent Report"):r.value==4&&(p="/report/download-half-day-report",x="Attendance Half-day Report")),p&&$.post(p,a,{responseType:"blob"}).then(P=>{console.log(P.data);var V=document.createElement("a");V.href=window.URL.createObjectURL(P.data),V.download=`${x}.xlsx`,V.click()}).finally(()=>{d.canShowLoading=!1,d.selectedfilters.active_status="",d.selectedfilters.date="",d.selectedfilters.department_id="",d.selectedfilters.legal_entity="",d.legal_Entity="",d.Department="",d.period_Date="",d.select_Category="",u.value="",b.value="",a.end_date="",a.start_date=""})},Q=async()=>{let _="/fetch-attendance-data";k.value=!0,await $.post(_).then(p=>{console.log(p.data.rows),f.value=p.data.rows,p.data.headers.forEach(x=>{let P={title:x};S.value.push(P),console.log(x)}),console.log(S.value)}).finally(()=>{k.value=!1})};function W(){f.value.splice(0,f.value.length),S.value.splice(0,S.value.length),r.value=null,u.value="",b.value="",a.end_date="",a.start_date=""}return{canShowLoading:k,Legal_Entity:s,Department:n,PeriodMonth:C,Start_Date:u,End_Date:b,btn_download:I,getPeriodMonth:D,getDepartment:l,get_Legal_Entity:o,activetab:A,fetchFilterClientId:B,get_All_Department:Y,fetchPeriodMonth:z,getSelectoption:G,AttendanceReportSource:f,AttendanceReportDynamicHeaders:S,getEmployeeAttendanceReports:Q,attendance_Type:r,downloadAttendanceReports:K,clearDataTable:W,select_StartAndEnd_Date:J,updateAttendanceReports:q,dialog_customDate:y}});const M=d=>(ae("data-v-dcfab619"),d=d(),ne(),d),at={class:"px-2"},nt={class:"flex justify-between mb-[10px]"},st=M(()=>t("h1",{class:"text-black text-[24px] font-semibold"},"Attendance Reports",-1)),it={class:"flex items-center"},rt=M(()=>t("i",{class:"mr-2 pi pi-times"},null,-1)),dt=M(()=>t("i",{class:"mr-2 pi pi-filter"},null,-1)),pt={style:{position:"relative"}},ct={class:"flex justify-between"},ut={class:"flex mb-3 divide-x max-[1300px]:!w-[40%] max-[1400px]:![50%] nav nav-pills divide-solid nav-tabs-dashed max-[1024px]:w-[100%]",id:"pills-tab",role:"tablist"},mt={class:"nav-item !border-0 text-center font-['poppins'] text-[14px] text-[#001820]",role:"presentation"},ft={class:"nav-item !border-0 flex items-center",role:"presentation"},vt={class:"nav-item !border-0 flex items-center",role:"presentation"},_t={class:"nav-item !border-0 flex items-center",role:"presentation"},xt={class:"nav-item !border-0 flex items-center",role:"presentation"},bt={class:"flex justify-between max-[1300px]:w-[60%] max-[1400px]:![50%] max-[1200px]:justify-start flex-wrap max-[1024px]:w-[100%]"},gt={class:"flex items-center"},ht=M(()=>t("h1",{class:"text-[12px] text-black mx-1 font-semibold font-['poppins']"},"Period : ",-1)),yt={class:"flex items-center"},wt=M(()=>t("h1",{class:"text-[12px] text-black mx-2 font-semibold font-['poppins']"},"Department : ",-1)),Et={class:"flex items-center"},Ct=M(()=>t("h1",{class:"text-[12px] text-black mx-1 font-semibold font-['poppins']"},"Legal Entity : ",-1)),Dt={class:"tab-content",id:""},St={class:"card-body"},$t={class:"flex items-center justify-between p-2 bg-white"},Lt={class:"flex !items-center"},Rt={key:0,class:"flex items-center pt-2 ml-2"},kt=M(()=>t("h1",{class:"text-[12px] text-black mx-1 font-semibold font-['poppins']"},"Category : ",-1)),Bt={class:"flex items-center"},Tt=M(()=>t("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check"},null,-1)),Mt=M(()=>t("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"},null,-1)),At=M(()=>t("path",{d:"M8,1 L8,11",class:"svg-out"},null,-1)),Pt=[Tt,Mt,At],Vt={class:"flex items-center"},Ft={__name:"AttendanceMaster",setup(d){const o=U(),l=lt(),D=i({global:{value:null,matchMode:te.CONTAINS}});i(),i(),i(),i([{name:"Active",id:1},{name:"Yet To Active",id:0},{name:"Exit",id:-1}]);const y=i([{type:"Late Coming",id:1},{type:"Early Going",id:2},{type:"Absent",id:3},{type:"Half-Day Absent",id:4}]);return(s,n)=>{const C=L("Dropdown"),u=L("MultiSelect"),b=L("InputText"),r=L("Column"),k=L("DataTable"),A=L("Calendar"),I=L("Dialog");return m(),h("div",at,[t("div",nt,[st,t("div",it,[t("button",{onClick:n[0]||(n[0]=a=>(e(o).clearfilterBtn(e(l).activetab),e(l).clearDataTable())),class:"flex items-center text-[#000] !font-semibold !font-['poppins'] text-[12px] px-3 py-2 border-[1px] bg-[#F9BE00] mx-2 rounded-[4px]"},[rt,O(" Clear Filter")]),t("button",{onClick:n[1]||(n[1]=a=>e(l).updateAttendanceReports(e(l).activetab)),class:"my-2 flex items-center text-[#000] !font-semibold !font-['poppins'] text-[12px] px-3 py-2 border-[1px] !bg-[#E6E6E6] mx-2 rounded-[4px]"},[dt,O(" Run")])])]),t("div",pt,[t("div",ct,[t("ul",ut,[t("li",mt,[t("a",{class:E(["px-2 position-relative font-['poppins'] text-[14px] text-[#001820] w-[100%]",[e(l).activetab===1?"active font-semibold !border-b-[2.2px]  !border-[#F9BE00]":"font-medium !text-[#8B8B8B] border-b-[2.2px] border-[#dcdcdc] "]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[2]||(n[2]=a=>(e(l).activetab=1,e(o).clearfilterBtn(s.activetab),e(l).clearDataTable()))}," DETAILED REPORT ",2)]),t("li",ft,[t("a",{class:E(["px-2 position-relative font-['poppins'] text-[14px] text-[#001820] w-[100%]",[e(l).activetab===2?"active font-semibold !border-b-[2.2px]  !border-[#F9BE00]":"font-medium !text-[#8B8B8B] border-b-[2.2px] border-[#dcdcdc] "]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[3]||(n[3]=a=>(e(l).activetab=2,e(o).clearfilterBtn(s.activetab),e(l).clearDataTable()))}," MUSTER ROLL ",2)]),t("li",vt,[t("a",{class:E(["px-2 position-relative font-['poppins'] text-[14px] text-[#001820] w-[100%]",[e(l).activetab===3?"active font-semibold !border-b-[2.2px]  !border-[#F9BE00]":"font-medium !text-[#8B8B8B] border-b-[2.2px] border-[#dcdcdc] "]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[4]||(n[4]=a=>(e(l).activetab=3,e(o).clearfilterBtn(s.activetab),e(l).clearDataTable()))}," CONSOLIDATE ",2)]),t("li",_t,[t("a",{class:E(["px-4 position-relative font-['poppins'] text-[14px] text-[#001820] w-[100%]",[e(l).activetab===4?"active font-semibold !border-b-[2.2px]  !border-[#F9BE00]":"font-medium !text-[#8B8B8B] border-b-[2.2px] border-[#dcdcdc] "]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[5]||(n[5]=a=>(e(l).activetab=4,e(o).clearfilterBtn(s.activetab),e(l).clearDataTable()))}," OVERTIME ",2)]),t("li",xt,[t("a",{class:E(["px-2 position-relative font-['poppins'] text-[14px] text-[#001820] w-[100%]",[e(l).activetab===5?"active font-semibold !border-b-[2.2px]  !border-[#F9BE00]":"font-medium !text-[#8B8B8B] border-b-[2.2px] border-[#dcdcdc] "]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:n[6]||(n[6]=a=>(e(l).activetab=5,e(o).clearfilterBtn(s.activetab),e(l).clearDataTable()))}," OTHERS ",2)])]),t("ul",bt,[t("li",gt,[ht,w(C,{optionLabel:"month",optionValue:"date",options:e(o).PeriodMonth,modelValue:e(o).period_Date,"onUpdate:modelValue":n[7]||(n[7]=a=>e(o).period_Date=a),onChange:n[8]||(n[8]=a=>e(l).getSelectoption("date",e(o).period_Date,e(l).activetab)),placeholder:"-- Select --",class:"w-[120px] mx-1 !h-10 my-1 !font-semibold !font-['poppins'] !text-[#000] !bg-[#E6E6E6]"},null,8,["options","modelValue"])]),t("li",yt,[wt,w(u,{modelValue:e(o).Department,"onUpdate:modelValue":n[9]||(n[9]=a=>e(o).Department=a),options:e(o).department,optionLabel:"name",placeholder:"-- Select --",onChange:n[10]||(n[10]=a=>e(l).getSelectoption("department",e(o).Department,e(l).activetab)),optionValue:"id",maxSelectedLabels:3,class:"min-w-[100px] w-[140px] my-1 !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]"},null,8,["modelValue","options"])]),t("li",Et,[Ct,w(u,{onChange:n[11]||(n[11]=a=>e(l).getSelectoption("legal_entity",e(o).legal_Entity,e(l).activetab)),modelValue:e(o).legal_Entity,"onUpdate:modelValue":n[12]||(n[12]=a=>e(o).legal_Entity=a),options:e(o).client_ids,optionLabel:"client_fullname",placeholder:"-- Select --",optionValue:"id",maxSelectedLabels:3,class:"min-w-[100px] w-[140px] my-1 !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]"},null,8,["modelValue","options"])])])]),t("div",Dt,[t("div",St,[e(o).canShowLoading?(m(),F(Z,{key:0,class:"absolute z-50 bg-white"})):R("",!0),t("div",null,[t("div",$t,[t("div",Lt,[t("div",null,[w(b,{placeholder:"Search",modelValue:D.value.global.value,"onUpdate:modelValue":n[13]||(n[13]=a=>D.value.global.value=a),class:"border-color !h-10 my-1"},null,8,["modelValue"])]),e(l).activetab==5?(m(),h("div",Rt,[kt,w(C,{optionLabel:"type",optionValue:"id",options:y.value,modelValue:e(l).attendance_Type,"onUpdate:modelValue":n[14]||(n[14]=a=>e(l).attendance_Type=a),placeholder:"Select Type",class:"w-[120px] text-[10px] mx-1 !h-10 my-1 !font-semibold !font-['poppins'] !text-[#000] !bg-[#E6E6E6]"},null,8,["options","modelValue"])])):R("",!0)]),t("div",Bt,[t("button",{class:E(["p-2 mx-2 rounded-md w-[120px]",[!e(l).AttendanceReportDynamicHeaders.length==0?"bg-[#000] text-white":" !text-[#000] !bg-[#E6E6E6] "]]),onClick:n[15]||(n[15]=a=>(e(l).btn_download=!e(l).btn_download,e(l).downloadAttendanceReports(e(l).activetab)))},[t("p",{class:E(["relative left-2 font-['poppins']",[!e(l).AttendanceReportDynamicHeaders.length==0?"bg-[#000] !text-[#ffff]":"!text-[#000] !bg-[#E6E6E6]"]])},"Download",2),t("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:E([e(l).btn_download==!0?s.toggleClass:" "])},[(m(),h("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16",class:E([!e(l).AttendanceReportDynamicHeaders.length==0?"!stroke-[#ffff] ":"!stroke-[#000]"])},Pt,2))],2)],2)])]),t("div",null,[w(k,{value:e(l).AttendanceReportSource,paginator:"",rows:5,rowsPerPageOptions:[5,10,20,50],responsiveLayout:"scroll",scrollable:"",scrollHeight:"240px",paginatorTemplate:"RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink",currentPageReportTemplate:"{first} to {last} of {totalRecords}"},{default:N(()=>[(m(!0),h(oe,null,le(e(l).AttendanceReportDynamicHeaders,a=>(m(),F(r,{key:a.title,field:a.title,header:a.title,style:{"white-space":"nowrap","text-align":"left",width:"15rem !important","marign-right":"1rem !important"}},null,8,["field","header"]))),128))]),_:1},8,["value"]),w(I,{visible:e(l).dialog_customDate,"onUpdate:visible":n[20]||(n[20]=a=>e(l).dialog_customDate=a),modal:"",header:"Custom Date",style:{width:"30vw"}},{default:N(()=>[t("div",null,[t("div",Vt,[w(A,{modelValue:e(l).Start_Date,"onUpdate:modelValue":n[16]||(n[16]=a=>e(l).Start_Date=a),onDateSelect:n[17]||(n[17]=a=>e(l).select_StartAndEnd_Date("start_date",e(ie)(e(l).Start_Date).format("YYYY-MM-DD"),e(l).activetab)),dateFormat:"dd-mm-yy",class:"w-[150px] h-10 mx-2",placeholder:"Start-date "},null,8,["modelValue"]),w(A,{modelValue:e(l).End_Date,"onUpdate:modelValue":n[18]||(n[18]=a=>e(l).End_Date=a),dateFormat:"dd-mm-yy",onDateSelect:n[19]||(n[19]=a=>e(l).select_StartAndEnd_Date("end_date",e(ie)(e(l).End_Date).format("YYYY-MM-DD"),e(l).activetab)),class:"w-[150px] h-10",placeholder:"End-date "},null,8,["modelValue"])])])]),_:1},8,["visible"])])])])])])])}}},Ut=ee(Ft,[["__scopeId","data-v-dcfab619"]]),It={style:{position:"relative"}},Nt={class:"mb-3 divide-x nav nav-pills divide-solid nav-tabs-dashed w-[50%]",id:"pills-tab",role:"tablist"},Ot={class:"nav-item",role:"presentation"},jt={key:0,class:"h-1 rounded-l-3xl",style:{border:"2px solid #F9BE00 !important"}},Ht={key:1,class:"h-1 border-2 border-gray-300 rounded-l-3xl",style:{border:"2px solid #dcdcdc !important"}},Yt={class:"border-0 nav-item position-relative",role:"presentation"},zt={key:0,class:"h-1 rounded-r-3xl position-absolute bottom-[1px] w-[100%] left-0",style:{border:"2px solid #F9BE00 !important"}},Gt={key:1,class:"h-1 border-2 border-gray-300 rounded-l-3xl"},qt=t("div",{class:"border-gray-300 border-b-[4px] w-100 mt-[-7px]"},null,-1),Jt={class:"tab-content",id:""},Kt={class:"card-body"},Qt={key:0},Wt={key:1},Xt={key:2},no={__name:"ReportsMaster",setup(d){const o=i(1),l=U();return j(()=>{l.fetchFilterClientIds(),l.getALLdepartment(),l.getPeriodMonth()}),(D,y)=>(m(),h("div",null,[t("div",It,[t("ul",Nt,[t("li",Ot,[t("a",{class:E(["px-4 position-relative border-0 font-['poppins'] text-[14px] text-[#001820]",[o.value===1?"active font-semibold border: 2px solid #F9BE00 !important;":"font-medium !text-[#8B8B8B] border: 2px solid #dcdcdc !important;"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:y[0]||(y[0]=s=>(o.value=1,e(l).clearfilterBtn(o.value),e(l).filterCustomDate(o.value)))}," EMPLOYEE REPORTS ",2),o.value===1?(m(),h("div",jt)):(m(),h("div",Ht))]),R("",!0),R("",!0),t("li",Yt,[t("a",{class:E(["text-center px-4 border-0 font-['poppins'] text-[14px] text-[#001820]",[o.value===4?"active font-semibold ":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",onClick:y[3]||(y[3]=s=>(o.value=4,e(l).clearfilterBtn(o.value),e(l).filterCustomDate(o.value))),role:"tab","aria-controls":"","aria-selected":"true"}," ATTENDANCE ",2),o.value===4?(m(),h("div",zt)):(m(),h("div",Gt))]),R("",!0),R("",!0),qt]),t("div",Jt,[t("div",null,[t("div",Kt,[o.value===1?(m(),h("div",Qt,[w(ot)])):R("",!0),o.value===4?(m(),h("div",Wt,[w(Ut)])):R("",!0),o.value===3?(m(),h("div",Xt)):R("",!0)])])])])]))}};export{no as default};
