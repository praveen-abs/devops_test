/* empty css          *//* empty css                 *//* empty css               */import{a0 as n,ag as E,a3 as I,ak as P,aj as B,g as w,o as D,b as H,w as S,d as e,k as W,E as j,h as m,n as A,I as g,p as O,c as $,F as V,f as z,t as L,a as K,K as q,P as Q,L as Y,u as G,M as J,R as X,S as Z,x as ee,y as te,N as se,Q as oe,_ as ae,V as le,W as ne,Y as ie}from"./toastservice.esm90739.js";import"./blockui.esm90739.js";import{a as de}from"./datatable.esm90739.js";import{C as re}from"./confirmationservice.esm90739.js";import{s as ce}from"./progressspinner.esm90739.js";import{s as pe}from"./calendar.esm90739.js";import{s as ue}from"./checkbox.esm90739.js";import{d as ge,c as me}from"./pinia90739.js";import{a as f}from"./index90739.js";import"./Service90739.js";const F=ge("MobileSettingsStore",()=>{const y=n(!1),o=n(),p=n(),_=n(),d=n(!1);async function v(){d.value=!0,await f.post("/fetchMobileModuleData",{client_id:p.value.id}).then(i=>{console.log(i.data),o.value=i.data.data,console.log("mobile settings",o.value)}).finally(()=>{d.value=!1})}return{employeeAssignDialog:y,arrayMobileSetDetails:o,getSessionClient:async()=>{await f.get("session-sessionselectedclient").then(i=>{console.log(i.data),_.value=i.data,i.data.id&&(p.value=i.data)})},saveEnableDisableSetting:async(i,u)=>{d.value=!0,await f.post("/saveAppConfigStatus",{module_id:i.id,status:u}).then(C=>{console.log("Status received : "+C.data.status),C.data.status=="success"&&(i.status=u)}).finally(()=>{d.value=!1})},canshowloading:d,client_details:p,SaveEmployeeAppConfigStatus:()=>{f.post("/SaveEmployeeAppConfigStatus",{app_sub_modules_link_id,selected_employees_user_code}).then(()=>{}).finally(()=>{})},getMobileSettings:v}});const _e=e("div",{class:"w-full p-2"},[e("div",{class:"flex justify-between"},[e("div",null,[e("p",{class:"text-lg font-semibold"},"Employee Assign")]),e("div")])],-1),ve={class:"flex w-[100%]"},be={class:""},xe={class:"grid grid-cols-12 gap-2 mt-3"},fe={class:"flex items-center col-span-4"},ye={class:"flex items-center col-span-5"},he=e("p",null,"Legal entity",-1),we={class:"flex items-center col-span-3"},Se=e("p",null,"Department",-1),Ce={class:"my-3 table-responsive"},De={class:"mx-auto"},ke=["onClick"],$e=["onClick"],Ae={class:"flex justify-center w-1/2 p-2 mx-auto"},Ee={__name:"AssignEmployee",props:{type:{type:Number,required:!0}},setup(y){const o=F(),p=n({global:{value:null,matchMode:E.CONTAINS},name:{value:null,matchMode:E.STARTS_WITH},department_name:{value:null,matchMode:E.STARTS_WITH}});n(!1);const _=n([]),d=n(),v=n(),h=n(),l=n();n(),n(1);const k=async()=>{await f.get("/getAllDropdownFilterSetting").then(c=>{d.value=c.data})},i=(c,t,b)=>{console.log(c,t),console.log("sub_module_id",b);let r=b;f.post("/getEmployeesFilterData",{department_id:t,client_name:c,sub_module_id:r}).then(x=>{console.log(x.data),l.value=x.data,console.log("testing   res.data.client_id",x.data.client_id)}).finally(()=>{console.log("selectedUserId",u)})},u=I([]);function C(c,t,b,r){console.log("isEnabled:"+t,c)}function M(){l.value.forEach(c=>u.push(c.user_code))}const N=(c,t)=>{c.forEach(r=>{if(r.status==1){let x={id:r.id,isEnabled:r.status,client_id:o.client_details.id};u.push(x)}else console.log(console.log(r.id,"else ::"))}),o.canshowloading=!0,f.post("/SaveEmployeeAppConfigStatus",{client_id:o.client_details.id,app_sub_modules_link_id:t,selected_employees_user_code:u}).then(r=>{}).finally(()=>{u.splice(0,u.length),l.value&&l.value.splice(0,l.value.length),o.employeeAssignDialog=!1,o.getMobileSettings(),o.canshowloading=!1})};function T(){u.values=[],l.value=[],v.value="",h.value="",o.employeeAssignDialog=!1}return P(()=>{k()}),B(()=>{_.value=null}),(c,t)=>{const b=w("Dropdown"),r=w("Column"),x=w("DataTable"),R=w("Dialog");return D(),H(R,{visible:g(o).employeeAssignDialog,"onUpdate:visible":t[10]||(t[10]=s=>g(o).employeeAssignDialog=s),modal:"",header:"Holiday ",style:O([{width:"70vw"},{"border-top":"5px solid #002f56"}]),breakpoints:{"960px":"75vw","640px":"90vw"},class:"popup_card","aria-controls":g(o).employeeAssignDialog?"":null,"aria-expanded":g(o).employeeAssignDialog?!0:T()},{header:S(()=>[_e]),default:S(()=>[e("div",ve,[e("div",be,[e("button",{class:"text-[12px] w-[100px] rounded-l-[8px] h-[26px] bg-[rgba(0,0,0,0.95)] hover:bg-[#000] text-[#fff]",onClick:t[0]||(t[0]=s=>M(_.value))},"Enable All"),e("button",{class:"text-[12px] w-[100px] rounded-r-[8px] h-[26px] border-[2px] border-[#000] text-[#000]",onClick:t[1]||(t[1]=s=>M(_.value.values=""))},"Disable All")])]),e("div",xe,[e("div",fe,[W(e("input",{type:"text","onUpdate:modelValue":t[2]||(t[2]=s=>p.value.global.value=s),placeholder:"Search employee..",class:"border rounded-lg bg-gray-100 p-1.5 w-11/12"},null,512),[[j,p.value.global.value]])]),e("div",ye,[he,m(b,{modelValue:v.value,"onUpdate:modelValue":t[3]||(t[3]=s=>v.value=s),class:"w-full min-[280px]:",placeholder:"Legal entity",onChange:t[4]||(t[4]=s=>i(s.value,"",y.type)),options:d.value?d.value.legalEntity:[],optionLabel:"client_name",optionValue:"id"},null,8,["modelValue","options"])]),e("div",we,[Se,m(b,{modelValue:h.value,"onUpdate:modelValue":t[5]||(t[5]=s=>h.value=s),class:"w-full",placeholder:"Department",onChange:t[6]||(t[6]=s=>i("",s.value,y.type)),options:d.value?d.value.department:[],optionLabel:"name",optionValue:"id"},null,8,["modelValue","options"])])]),e("div",Ce,[m(x,{selection:_.value,"onUpdate:selection":t[7]||(t[7]=s=>_.value=s),value:l.value,ref:"dt",dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],filters:p.value,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",globalFilterFields:["name","department_name"],responsiveLayout:"scroll"},{default:S(()=>[m(r,{field:"name",filterField:"name",header:"Name",style:{"min-width":"12rem"}}),m(r,{header:"Department",filterField:"department_name",field:"department_name",style:{"min-width":"8rem"}}),m(r,{field:"status",header:"Action",style:{"min-width":"12rem"}},{body:S(s=>[e("div",De,[e("button",{class:A(["text-[12px] w-[100px] rounded-l-[8px] h-[26px]",[s.data.status==1?" bg-[#000] text-white  ":" bg-white !text-[#000] border-[2px] border-black"]]),onClick:U=>C(s.data.id,1,s.data.status=1,s.data.client_id)},"Enable",10,ke),e("button",{class:A(["text-[12px] w-[100px] rounded-r-[8px] h-[26px]",[s.data.status==0?"bg-[#000] text-white ":"bg-white text-black border-[2px] border-black"]]),onClick:U=>C(s.data.id,0,s.data.status=0,s.data.client_id)},"Disable",10,$e)])]),_:1})]),_:1},8,["selection","value","filters"]),e("div",Ae,[e("button",{onClick:t[8]||(t[8]=s=>T()),class:"mx-2 p-2 bg-black !text-[#fff] border-[2px] border-black rounded-lg"},"Cancel"),e("button",{class:"mx-2 bg-white !text-[#000] border-[2px] p-2 border-black rounded-lg",onClick:t[9]||(t[9]=s=>N(l.value,y.type))},"Confirm")])])]),_:1},8,["visible","aria-controls","aria-expanded"])}}};const Me=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),Te={class:"w-full"},Ve=e("h1",{class:"text-[18px] text-[#000] my-2"},"Mobile App Settings",-1),Le={class:""},Pe={class:"my-auto"},Fe={class:"text-[#000] text-[14px]"},Ne={class:"mx-auto"},Re=["onClick"],Ue=["onClick"],Ie={class:"my-auto"},Be={key:0,class:"flex float-right cursor-pointer w-[170px] items-center"},He=e("i",{class:"pi pi-users"},null,-1),We={class:"text-[#000] mx-2"},je=["onClick"],Oe={__name:"MobileSettings",setup(y){const o=F();P(async()=>{await o.getSessionClient(),await o.getMobileSettings()}),n(1);const p=n();return n(!1),(_,d)=>{const v=w("ProgressSpinner"),h=w("Dialog");return D(),$(V,null,[m(h,{header:"Header",visible:g(o).canshowloading,"onUpdate:visible":d[0]||(d[0]=l=>g(o).canshowloading=l),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:S(()=>[m(v,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:S(()=>[Me]),_:1},8,["visible"]),e("div",Te,[Ve,e("div",Le,[(D(!0),$(V,null,z(g(o).arrayMobileSetDetails,(l,k)=>(D(),$("div",{class:"grid grid-cols-3 p-2 rounded-lg border my-2.5 h-[44px]",key:k},[e("div",Pe,[e("h1",Fe,L(l.sub_module_name),1)]),e("div",Ne,[e("button",{class:A(["text-[12px] w-[100px] rounded-l-[8px] h-[26px]",[l.status==1?" bg-[#000] text-white  ":" bg-white !text-[#000] border-[2px] border-black"]]),onClick:i=>g(o).saveEnableDisableSetting(l,1)},"Enable",10,Re),e("button",{class:A(["text-[12px] w-[100px] rounded-r-[8px] h-[26px]",[l.status==0?"bg-[#000] text-white ":"bg-white text-black border-[2px] border-black"]]),onClick:i=>g(o).saveEnableDisableSetting(l,0)},"Disable",10,Ue)]),e("div",Ie,[l.status===1?(D(),$("div",Be,[He,e("span",We,L(l.employee_count),1),e("span",{class:"underline",onClick:i=>(p.value=l.id,g(o).employeeAssignDialog=!0)},"Assign Employee",8,je)])):K("",!0)])]))),128))])]),m(Ee,{type:p.value},null,8,["type"])],64)}}},a=q(Oe),ze=me();a.use(Q,{ripple:!0});a.use(re);a.use(Y);a.use(ze);a.directive("tooltip",G);a.directive("badge",J);a.directive("ripple",X);a.directive("styleclass",Z);a.directive("focustrap",ee);a.component("Checkbox",ue);a.component("Button",te);a.component("DataTable",de);a.component("Column",se);a.component("ConfirmDialog",oe);a.component("Toast",ae);a.component("Dialog",le);a.component("Dropdown",ne);a.component("ProgressSpinner",ce);a.component("InputText",ie);a.component("Calendar",pe);a.mount("#MobileSettings");
