import{a as x}from"./index-362795f3.js";import{H as r,W as ie,ab as B,c as f,d as o,h as b,aa as t,a as T,n as k,b as R,w as O,a7 as j,g as S,o as v,F as z,f as W,ac as Y,ad as q,p as H,l as re}from"./inputnumber.esm-3276ace1.js";import"./lodash-facb8280.js";import{d as pe}from"./pinia-69eaa219.js";import{_ as G}from"./_plugin-vue_export-helper-c27b6911.js";import{L as A}from"./LoadingSpinner-04b36c70.js";const V=pe("EmployeeMasterStore",()=>{const g=r(),e=r(),i=r(),h=r(),D=r(),l=r(),w=r(!1),_=r(),p=r(!1),d=r([]),c=r([]),I=r(),N=r(""),F=r(1),m=r(!1),s=ie({date:"",department_id:"",legal_entity:"",active_status:"",type:""}),C=r([]),E=r([]),U=()=>{let a="/fetch-employee-ctc-report";m.value=!0,x.post(a,{type:""}).then(n=>{console.log(n.data.rows,"get value "),d.value=n.data.rows,console.log(d.value," testings data"),n.data.headers.forEach(u=>{let L={title:u};c.value.push(L),console.log(u)}),console.log(c.value)}).finally(()=>{m.value=!1})};function K(){m.value=!0,x.get("/filter-client-ids").then(a=>{D.value=a.data,console.log(" testing client id",D.value)}).finally(()=>{m.value=!1})}function Q(){m.value=!0,x.get("/get-department").then(a=>{I.value=a.data}).finally(()=>{m.value=!1})}function X(){m.value=!0,x.post("/get-filter-months-for-reports").then(a=>{N.value=a.data}).finally(()=>{m.value=!1})}function Z(){d.value.splice(0),c.value.splice(0),p.value==!0?(console.log(p),p.value=!1,_.value="",console.log(_.value)):p.value==!1&&(p.value=!0,_.value="detailed",console.log(_.value)),s.type=_.value,x.post("/fetch-employee-ctc-report",s).then(a=>{console.log(a.data.rows,"get value "),d.value=a.data.rows,console.log(d.value," testings data"),a.data.headers.forEach(n=>{let u={title:n};c.value.push(u),console.log(n)}),console.log(c.value)})}const ee=()=>{let a="/generate-employee-ctc-report";m.value=!0,x.post(a,s,{responseType:"blob"}).then(n=>{console.log(n.data);var u=document.createElement("a");u.href=window.URL.createObjectURL(n.data),u.download="Employee CTC Report_.xlsx",u.click()}).finally(()=>{w.value=!1,m.value=!1})};function te(a){F.value=a,a===2?x.post("/fetch-employee-ctc-report",s).then(n=>{console.log(n.data.rows,"get value "),d.value=n.data.rows,console.log(d.value," testings data"),n.data.headers.forEach(u=>{let L={title:u};c.value.push(L),console.log(u)}),console.log(c.value),n.data.rows.length===0&&Swal.fire({title:n.data.status="failure",text:"No employees found in this category",icon:"error",showCancelButton:!1}).then(u=>{})}):(s.active_status="",s.date="",s.department_id="",s.legal_entity="",g.value="",e.value="",i.value="",h.value="",U())}function oe(a,n,u){if(console.log(a,n,u),E.value.splice(0,E.value.length),C.value.splice(0,C.value.length),d.value.splice(0,d.value.length),c.value.splice(0,c.value.length),m.value=!0,a=="department"?s.department_id=n:a=="Category"?(s.active_status=n,console.log(s)):a=="date"?s.date=n:a=="legal_entity"&&(s.legal_entity=n),u==1){let L="/fetch-master-employee-report";x.post(L,s).then(y=>{console.log(y.data.rows,"get value "),C.value=y.data.rows,console.log(C.value," testings data"),y.data.headers.forEach(M=>{let P={title:M};E.value.push(P),console.log(M)}),console.log(E.value),y.data.headers.length===0&&Swal.fire({title:y.data.status="failure",text:"No employees found in this category",icon:"error",showCancelButton:!1}).then(M=>{})}).finally(()=>{m.value=!1})}else{let L="/fetch-employee-ctc-report";m.value=!0,x.post(L,s).then(y=>{console.log(y.data.rows,"get value "),d.value=y.data.rows,console.log(d.value," testings data"),y.data.headers.forEach(M=>{let P={title:M};c.value.push(P),console.log(M)}),console.log(c.value),y.data.rows.length===0&&Swal.fire({title:y.data.status="failure",text:"No employees found in this category",icon:"error",showCancelButton:!1}).then(M=>{})}).finally(()=>{m.value=!1})}}function le(){let a="/fetch-master-employee-report";m.value=!0,x.post(a,{type:""}).then(n=>{console.log(n.data.rows,"get value "),C.value=n.data.rows,console.log(C.value," testings data"),n.data.headers.forEach(u=>{let L={title:u};E.value.push(L),console.log(u)}),console.log(E.value)}).finally(()=>{m.value=!1})}function ae(){let a="/generate-master-employee-report-data";m.value=!0,x.post(a,s,{responseType:"blob"}).then(n=>{console.log(n.data);var u=document.createElement("a");u.href=window.URL.createObjectURL(n.data),u.download="Employee Master Report_.xlsx",u.click()}).finally(()=>{w.value=!1,m.value=!1})}function se(a){console.log("testing data :",a),a===2?(d.value.splice(0,d.value.length),c.value.splice(0,c.value.length),s.active_status="",s.date="",s.department_id="",s.legal_entity="",g.value="",e.value="",i.value="",h.value=""):(C.value.splice(0,C.value.length),E.value.splice(0,E.value.length),s.active_status="",s.date="",s.department_id="",s.legal_entity="",g.value="",e.value="",i.value="",h.value="")}function ne(a){console.log(a?"1":"2",a)}return{show:p,client_ids:D,employeeCTCReportSource:d,Employee_CTCReportDynamicHeaders:c,personalDetail:_,selectCategory:l,department:I,PeriodMonth:N,fetchFilterClientIds:K,getEmployeeCTC:U,personalDetails:Z,getALLdepartment:Q,getPeriodMonth:X,updateEmployeeApplyFilter:te,downloadEmployeeCTC:ee,btn_download:w,canShowLoading:m,filterbtn:F,legal_Entity:g,Department:e,period_Date:i,select_Category:h,getemployeeMater:le,employeeMaterReportSource:C,Employee_MaterReportDynamicHeaders:E,downloadEmployeeMaster:ae,getSelectoption:oe,clearfilterBtn:se,testings:ne,selectedfilters:s,resetChars:()=>{s.active_status="",s.date="",s.department_id="",s.legal_entity="",g.value="",e.value="",i.value="",h.value=""}}});const $=g=>(Y("data-v-aebc4b52"),g=g(),q(),g),de={class:"flex justify-between p-2 bg-white"},ce={class:""},ue={class:"flex items-center"},me=$(()=>o("h1",{class:"text-[12px] text-black font-semibold font-['poppins']"},"Personal Details -",-1)),ve={key:0,class:"pi pi-eye"},ge={key:1,class:"pi pi-eye-slash"},_e=$(()=>o("p",{class:"relative left-2 font-['poppins']"},"Download",-1)),fe=$(()=>o("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check"},null,-1)),he=$(()=>o("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"},null,-1)),ye=$(()=>o("path",{d:"M8,1 L8,11",class:"svg-out"},null,-1)),xe=[fe,he,ye],be={class:""},we={__name:"employee_CTC",setup(g){const e=V();B(()=>{}),r([]);const i=r({global:{value:null,matchMode:j.CONTAINS}}),h=r("downloaded");return(D,l)=>{const w=S("InputText"),_=S("loadingSpinner"),p=S("Column"),d=S("DataTable");return v(),f("div",null,[o("div",de,[o("div",ce,[b(w,{placeholder:"Search",modelValue:i.value.global.value,"onUpdate:modelValue":l[0]||(l[0]=c=>i.value.global.value=c),class:"border-color !h-10 my-2"},null,8,["modelValue"])]),o("div",ue,[me,o("button",{class:"bg-[#E6E6E6] px-3 p-2 rounded-md mx-2",onClick:l[1]||(l[1]=c=>t(e).personalDetails())},[t(e).show&&t(e).personalDetail=="detailed"?(v(),f("i",ve)):t(e).show?T("",!0):(v(),f("i",ge))]),o("button",{class:k(["p-2 mx-2 rounded-md w-[120px]",[!t(e).employeeCTCReportSource.length==0?"bg-[#000] text-white":" !text-[#000] !bg-[#E6E6E6] "]]),onClick:l[2]||(l[2]=c=>(t(e).btn_download=!t(e).btn_download,t(e).downloadEmployeeCTC()))},[_e,o("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:k([t(e).btn_download==!0?h.value:" "])},[(v(),f("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16",class:k([!t(e).employeeCTCReportSource.length==0?"!stroke-[#ffff] ":"!stroke-[#000]"])},xe,2))],2)],2)])]),o("div",be,[t(e).canShowLoading?(v(),R(_,{key:0,class:"absolute z-50 bg-white"})):T("",!0),b(d,{value:t(e).employeeCTCReportSource,filters:i.value,paginator:"",rows:5,rowsPerPageOptions:[5,10,20,50],scrollable:"",scrollHeight:"240px",paginatorTemplate:"RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink",currentPageReportTemplate:"{first} to {last} of {totalRecords}",responsiveLayout:"scroll"},{default:O(()=>[(v(!0),f(z,null,W(t(e).Employee_CTCReportDynamicHeaders,c=>(v(),R(p,{key:c.title,field:c.title,header:c.title,style:{"white-space":"nowrap","text-align":"left",width:"15rem !important"}},null,8,["field","header"]))),128))]),_:1},8,["value","filters"])])])}}},Ce=G(we,[["__scopeId","data-v-aebc4b52"]]);const J=g=>(Y("data-v-c69cd521"),g=g(),q(),g),Ee={class:"flex justify-between bg-white py-1"},Le={class:"flex items-center"},Se=J(()=>o("p",{class:"relative left-2 font-['poppins']"},"Download",-1)),ke=J(()=>o("polyline",{points:"4.5 8.5 8 11 11.5 8.5",class:"svg-out"},null,-1)),Me={class:""},Te={__name:"Employee_Master",setup(g){r(1);const e=V();B(()=>{});const i=r({global:{value:null,matchMode:j.CONTAINS}}),h=r("downloaded");return(D,l)=>{const w=S("InputText"),_=S("Column"),p=S("DataTable");return v(),f("div",null,[o("div",null,[o("div",Ee,[o("div",null,[b(w,{placeholder:"Search",modelValue:i.value.global.value,"onUpdate:modelValue":l[0]||(l[0]=d=>i.value.global.value=d),class:"border-color !h-10 my-2",style:{height:"3em"}},null,8,["modelValue"])]),o("div",Le,[o("button",{class:k(["p-2 mx-2 rounded-md w-[120px]",[!t(e).employeeMaterReportSource.length==0?"bg-[#000] text-white":" !text-[#000] !bg-[#E6E6E6] "]]),onClick:l[1]||(l[1]=d=>(t(e).btn_download=!t(e).btn_download,t(e).downloadEmployeeMaster()))},[Se,o("div",{id:"btn-download",style:{position:"absolute",right:"0"},class:k([t(e).btn_download==!0?h.value:""])},[(v(),f("svg",{width:"22px",height:"16px",viewBox:"0 0 22 16",class:k([!t(e).employeeMaterReportSource.length==0?"!stroke-[#ffff] ":"!stroke-[#000]"])},[o("path",{d:"M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15",id:"check",style:H([!t(e).employeeMaterReportSource.length===0?"stroke=blue":"!bg-[#E6E6E6] !text-[#000] "])},null,4),ke,o("path",{d:"M8,1 L8,11",class:"svg-out",stroke:"",style:H([t(e).employeeMaterReportSource.length===0?"red":"fill: red"])},null,4)],2))],2)],2)])]),o("div",Me,[b(p,{value:t(e).employeeMaterReportSource,paginator:"",rows:5,rowsPerPageOptions:[5,10,20,50],responsiveLayout:"scroll",scrollable:"",scrollHeight:"240px",paginatorTemplate:"RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink",currentPageReportTemplate:"{first} to {last} of {totalRecords}"},{default:O(()=>[(v(!0),f(z,null,W(t(e).Employee_MaterReportDynamicHeaders,d=>(v(),R(_,{class:"",key:d.title,field:d.title,header:d.title,style:{"white-space":"nowrap","text-align":"left",width:"15rem !important","marign-right":"1rem !important"}},null,8,["field","header"]))),128))]),_:1},8,["value"])])])])}}},De=G(Te,[["__scopeId","data-v-c69cd521"]]);const Re={class:"px-2"},$e={class:"flex justify-between mb-[10px]"},Pe=o("h1",{class:"text-black text-[24px] font-semibold"},"Employee Master Report",-1),Be=o("i",{class:"mr-2 pi pi-times"},null,-1),Ve={style:{position:"relative"}},Ie={class:"grid grid-cols-12 w-[100%]"},Ne={class:"grid items-center grid-cols-2 col-span-3 whitespace-nowrap",id:"pills-tab",role:"tablist"},Fe={class:"nav-item text-center font-['poppins'] text-[14px] text-[#001820]",role:"presentation"},Ue={class:"flex items-center nav-item",role:"presentation"},He={class:"grid grid-cols-4 col-span-9 gap-4"},Ae={class:"flex items-center"},Oe=o("h1",{class:"text-[12px] text-black px-2 font-semibold font-['poppins'] whitespace-nowrap"},"Period : ",-1),je={class:"flex items-center"},ze=o("h1",{class:"text-[12px] text-black px-2 font-semibold font-['poppins'] whitespace-nowrap"}," Department : ",-1),We={class:"flex items-center"},Ye=o("h1",{class:"text-[12px] text-black px-2 font-semibold font-['poppins'] whitespace-nowrap"},"Legal Entity : ",-1),qe={class:"flex items-center my-1"},Ge=o("h1",{class:"text-[12px] text-black px-2 font-semibold font-['poppins'] whitespace-nowrap"},"Status : ",-1),Je={class:"tab-content",id:""},Ke={class:"card-body"},Qe={key:0},Xe={key:1},Ze={key:2},it={__name:"employee_master_report",setup(g){const e=V();B(()=>{}),r("border-[1px] border-[#F9BE00]"),r("border-[1px] border-[#DCDCDC]");const i=r(1),h=r([{name:"Active",id:1},{name:"Yet To Active",id:0},{name:"Exit",id:-1}]);return(D,l)=>{const w=S("Dropdown"),_=S("MultiSelect");return v(),f("div",Re,[o("div",$e,[Pe,o("div",null,[o("button",{onClick:l[0]||(l[0]=p=>t(e).clearfilterBtn(i.value)),class:"flex items-center text-[#000] !font-semibold !font-['poppins'] text-[12px] px-3 py-2 border-[1px] bg-[#F9BE00] mx-2 rounded-[4px]"},[Be,re(" Clear Filter")])])]),o("div",Ve,[o("div",Ie,[o("ul",Ne,[o("li",Fe,[o("a",{class:k(["p-2 position-relative font-['poppins'] text-[14px] text-[#001820] w-[100%]",[i.value===1?" rounded-l-[2px] font-semibold !border-b-[2px] !border-[#F9BE00]":"font-medium !text-[#8B8B8B] "]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:l[1]||(l[1]=p=>(i.value=1,t(e).clearfilterBtn(i.value)))}," Employee Master ",2)]),o("li",Ue,[o("a",{class:k(["p-2 position-relative font-['poppins'] text-[14px] text-[#001820] w-[100%]",[i.value===2?"rounded-r-[2px] font-semibold !border-b-[2px] !border-[#F9BE00]":"font-medium !text-[#8B8B8B]"]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:l[2]||(l[2]=p=>(i.value=2,t(e).clearfilterBtn(i.value)))}," Employee CTC ",2)])]),o("ul",He,[o("li",Ae,[Oe,b(w,{optionLabel:"month",optionValue:"date",options:t(e).PeriodMonth,modelValue:t(e).period_Date,"onUpdate:modelValue":l[3]||(l[3]=p=>t(e).period_Date=p),onChange:l[4]||(l[4]=p=>t(e).getSelectoption("date",t(e).period_Date,i.value)),placeholder:"Select period",class:"w-[150px] mx-2 !h-10 !font-semibold !font-['poppins'] !text-[#000] !bg-[#E6E6E6]"},null,8,["options","modelValue"])]),o("li",je,[ze,b(_,{modelValue:t(e).Department,"onUpdate:modelValue":l[5]||(l[5]=p=>t(e).Department=p),options:t(e).department,optionLabel:"name",placeholder:"Department",onChange:l[6]||(l[6]=p=>t(e).getSelectoption("department",t(e).Department,i.value)),optionValue:"id",maxSelectedLabels:3,class:"min-w-[100px] w-[150px] !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]"},null,8,["modelValue","options"])]),o("li",We,[Ye,b(_,{onChange:l[7]||(l[7]=p=>t(e).getSelectoption("legal_entity",t(e).legal_Entity,i.value)),modelValue:t(e).legal_Entity,"onUpdate:modelValue":l[8]||(l[8]=p=>t(e).legal_Entity=p),options:t(e).client_ids,optionLabel:"client_fullname",placeholder:"Legal Entity",optionValue:"id",maxSelectedLabels:3,class:"min-w-[100px] w-[150px] !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]"},null,8,["modelValue","options"])]),o("li",qe,[Ge,b(_,{onChange:l[9]||(l[9]=p=>t(e).getSelectoption("Category",t(e).select_Category,i.value)),modelValue:t(e).select_Category,"onUpdate:modelValue":l[10]||(l[10]=p=>t(e).select_Category=p),optionValue:"id",options:h.value,optionLabel:"name",placeholder:"Select Category",maxSelectedLabels:3,class:"min-w-[100px] w-[150px] !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6] mx-2"},null,8,["modelValue","options"])])])]),o("div",Je,[o("div",null,[o("div",Ke,[i.value===1?(v(),f("div",Qe,[t(e).canShowLoading?(v(),R(A,{key:0,class:"absolute z-50 bg-white"})):T("",!0),b(De)])):T("",!0),i.value===2?(v(),f("div",Xe,[t(e).canShowLoading?(v(),R(A,{key:0,class:"absolute z-50 bg-white"})):T("",!0),b(Ce)])):T("",!0),i.value===3?(v(),f("div",Ze)):T("",!0)])])])])])}}};export{V as E,it as _,De as a,Ce as e};
