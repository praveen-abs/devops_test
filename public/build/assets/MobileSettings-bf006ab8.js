/* empty css              *//* empty css                     *//* empty css                   */import{H as n,a7 as M,W as V,ab as N,a9 as I,g as w,o as k,b as H,w as S,d as e,k as W,B as O,h as b,n as E,aa as _,p as j,c as $,F as L,f as z,t as F,a as K,I as q,P as J,R as G,u as Q,x as X,J as Y,K as Z,L as ee,N as te}from"./inputnumber.esm-3276ace1.js";import{a as se,T as le,B as oe,S as ae,s as ne,b as ie}from"./toastservice.esm-fd7fc957.js";import"./blockui.esm-ff9f2709.js";import{a as de}from"./datatable.esm-aaa10fcd.js";import{C as re}from"./confirmationservice.esm-8b92365c.js";import{s as ce}from"./progressspinner.esm-3aaf2487.js";import{s as pe}from"./calendar.esm-5bf60357.js";import{s as ue}from"./checkbox.esm-5e177d6f.js";import{d as me,c as ge}from"./pinia-69eaa219.js";import{a as f}from"./index-362795f3.js";import"./Service-0fa21417.js";const R=me("MobileSettingsStore",()=>{const x=n(!1),s=n(),u=n(),y=n(),r=n(!1);async function v(){r.value=!0,await f.post("/getClient_MobileModulePermissionDetails",{client_id:u.value.id}).then(i=>{console.log(i.data),s.value=i.data.data,console.log("mobile settings",s.value)}).finally(()=>{r.value=!1})}return{employeeAssignDialog:x,arrayMobileSetDetails:s,getSessionClient:async()=>{await f.get("session-sessionselectedclient").then(i=>{console.log(i.data),y.value=i.data,i.data.id&&(u.value=i.data)})},saveEnableDisableSetting:async(i,d)=>{r.value=!0,await f.post("/updateClientModuleStatus",{module_id:i.id,status:d}).then(D=>{console.log("Status received : "+D.data.status),D.data.status=="success"&&(i.status=d)}).finally(()=>{r.value=!1})},canshowloading:r,client_details:u,updateEmployeesPermissionStatus:()=>{f.post("/updateEmployeesPermissionStatus",{app_sub_modules_link_id,selected_employees_user_code}).then(()=>{}).finally(()=>{})},getMobileSettings:v}});const _e=e("div",{class:"w-full p-2"},[e("div",{class:"flex justify-between"},[e("div",null,[e("p",{class:"text-lg font-semibold"},"Employee Assign")]),e("div")])],-1),ve={class:"flex w-[100%]"},be={class:""},xe={class:"grid grid-cols-12 gap-2 mt-3"},fe={class:"flex items-center col-span-4"},ye={class:"flex items-center col-span-5"},he=e("p",null,"Legal entity",-1),we={class:"flex items-center col-span-3"},Se=e("p",null,"Department",-1),De={class:"my-3 table-responsive"},ke={class:"mx-auto"},Ce=["onClick"],$e=["onClick"],Ee={class:"flex justify-center w-1/2 p-2 mx-auto"},Ae={__name:"AssignEmployee",props:{type:{type:Number,required:!0}},setup(x){const s=R(),u=n({global:{value:null,matchMode:M.CONTAINS},name:{value:null,matchMode:M.STARTS_WITH},department_name:{value:null,matchMode:M.STARTS_WITH}});n(!1);const y=n([]),r=n(),v=n(),h=n(),o=n();n(),n(1);const C=async()=>{await f.get("/getAllDropdownFilterSetting").then(p=>{r.value=p.data})},i=(p,t,m)=>{console.log(p,t),console.log("sub_module_id",m);let c=m;f.post("/getEmployeesFilterData",{department_id:t,client_name:p,sub_module_id:c}).then(g=>{console.log(g.data),o.value=g.data,console.log("testing   res.data.client_id",g.data.client_id)}).finally(()=>{console.log("selectedUserId",d)})},d=V([]);function D(p,t,m,c){console.log("isEnabled:"+t,p)}V([]);function P(p,t,m){m==1&&p.forEach(g=>{if(g.status==0){let A={id:g.id,isEnabled:1,client_id:s.client_details.id};d.push(A)}}),m==2&&d.splice(0,d.length),s.canshowloading=!0,f.post("/updateEmployeesPermissionStatus",{client_id:s.client_details.id,app_sub_modules_link_id:t,selected_employees_user_code:d}).then(c=>{}).finally(()=>{d.splice(0,d.length),o.value&&o.value.splice(0,o.value.length),s.employeeAssignDialog=!1,s.getMobileSettings(),s.canshowloading=!1})}const U=(p,t)=>{console.log("Dropdown legal Entity : "+v.value),p.forEach(c=>{if(c.status==1){let g={id:c.id,isEnabled:c.status,client_id:v.value};d.push(g)}else console.log(console.log(c.id,"else ::"))}),s.canshowloading=!0,f.post("/updateEmployeesPermissionStatus",{client_id:s.client_details.id,app_sub_modules_link_id:t,selected_employees_user_code:d}).then(c=>{}).finally(()=>{d.splice(0,d.length),o.value&&o.value.splice(0,o.value.length),s.employeeAssignDialog=!1,s.getMobileSettings(),s.canshowloading=!1})};function T(){d.values=[],o.value=[],v.value="",h.value="",s.employeeAssignDialog=!1}return N(()=>{C()}),I(()=>{y.value=null}),(p,t)=>{const m=w("Dropdown"),c=w("Column"),g=w("DataTable"),A=w("Dialog");return k(),H(A,{visible:_(s).employeeAssignDialog,"onUpdate:visible":t[10]||(t[10]=l=>_(s).employeeAssignDialog=l),modal:"",header:"Holiday ",style:j([{width:"70vw"},{"border-top":"5px solid #002f56"}]),breakpoints:{"960px":"75vw","640px":"90vw"},class:"popup_card","aria-controls":_(s).employeeAssignDialog?"":null,"aria-expanded":_(s).employeeAssignDialog?!0:T()},{header:S(()=>[_e]),default:S(()=>[e("div",ve,[e("div",be,[e("button",{class:"text-[12px] w-[100px] rounded-l-[8px] h-[26px] bg-[rgba(0,0,0,0.95)] hover:bg-[#000] text-[#fff]",onClick:t[0]||(t[0]=l=>P(o.value,x.type,1))},"Enable All"),e("button",{class:"text-[12px] w-[100px] rounded-r-[8px] h-[26px] border-[2px] border-[#000] text-[#000]",onClick:t[1]||(t[1]=l=>P(o.value,x.type,2))},"Disable All")])]),e("div",xe,[e("div",fe,[W(e("input",{type:"text","onUpdate:modelValue":t[2]||(t[2]=l=>u.value.global.value=l),placeholder:"Search employee..",class:"border rounded-lg bg-gray-100 p-1.5 w-11/12"},null,512),[[O,u.value.global.value]])]),e("div",ye,[he,b(m,{modelValue:v.value,"onUpdate:modelValue":t[3]||(t[3]=l=>v.value=l),class:"w-full min-[280px]:",placeholder:"Legal entity",onChange:t[4]||(t[4]=l=>i(l.value,"",x.type)),options:r.value?r.value.legalEntity:[],optionLabel:"client_name",optionValue:"id"},null,8,["modelValue","options"])]),e("div",we,[Se,b(m,{modelValue:h.value,"onUpdate:modelValue":t[5]||(t[5]=l=>h.value=l),class:"w-full",placeholder:"Department",onChange:t[6]||(t[6]=l=>i("",l.value,x.type)),options:r.value?r.value.department:[],optionLabel:"name",optionValue:"id"},null,8,["modelValue","options"])])]),e("div",De,[b(g,{selection:y.value,"onUpdate:selection":t[7]||(t[7]=l=>y.value=l),value:o.value,ref:"dt",dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],filters:u.value,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",globalFilterFields:["name","department_name"],responsiveLayout:"scroll"},{default:S(()=>[b(c,{field:"name",filterField:"name",header:"Name",style:{"min-width":"12rem"}}),b(c,{header:"Department",filterField:"department_name",field:"department_name",style:{"min-width":"8rem"}}),b(c,{field:"status",header:"Action",style:{"min-width":"12rem"}},{body:S(l=>[e("div",ke,[e("button",{class:E(["text-[12px] w-[100px] rounded-l-[8px] h-[26px]",[l.data.status==1?" bg-[#000] text-white  ":" bg-white !text-[#000] border-[2px] border-black"]]),onClick:B=>D(l.data.id,1,l.data.status=1,l.data.client_id)},"Enable",10,Ce),e("button",{class:E(["text-[12px] w-[100px] rounded-r-[8px] h-[26px]",[l.data.status==0?"bg-[#000] text-white ":"bg-white text-black border-[2px] border-black"]]),onClick:B=>D(l.data.id,0,l.data.status=0,l.data.client_id)},"Disable",10,$e)])]),_:1})]),_:1},8,["selection","value","filters"]),e("div",Ee,[e("button",{onClick:t[8]||(t[8]=l=>T()),class:"mx-2 p-2 bg-black !text-[#fff] border-[2px] border-black rounded-lg"},"Cancel"),e("button",{class:"mx-2 bg-white !text-[#000] border-[2px] p-2 border-black rounded-lg",onClick:t[9]||(t[9]=l=>U(o.value,x.type))},"Confirm")])])]),_:1},8,["visible","aria-controls","aria-expanded"])}}};const Me=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),Pe={class:"w-full"},Te=e("h1",{class:"text-[18px] text-[#000] my-2"},"Mobile App Settings",-1),Ve={class:""},Le={class:"my-auto"},Fe={class:"text-[#000] text-[14px]"},Ne={class:"mx-auto"},Re=["onClick"],Ue=["onClick"],Be={class:"my-auto"},Ie={key:0,class:"flex float-right cursor-pointer w-[170px] items-center"},He=e("i",{class:"pi pi-users"},null,-1),We={class:"text-[#000] mx-2"},Oe=["onClick"],je={__name:"MobileSettings",setup(x){const s=R();N(async()=>{await s.getSessionClient(),await s.getMobileSettings()}),n(1);const u=n();return n(!1),(y,r)=>{const v=w("ProgressSpinner"),h=w("Dialog");return k(),$(L,null,[b(h,{header:"Header",visible:_(s).canshowloading,"onUpdate:visible":r[0]||(r[0]=o=>_(s).canshowloading=o),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:S(()=>[b(v,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:S(()=>[Me]),_:1},8,["visible"]),e("div",Pe,[Te,e("div",Ve,[(k(!0),$(L,null,z(_(s).arrayMobileSetDetails,(o,C)=>(k(),$("div",{class:"grid grid-cols-3 p-2 rounded-lg border my-2.5 h-[44px]",key:C},[e("div",Le,[e("h1",Fe,F(o.sub_module_name),1)]),e("div",Ne,[e("button",{class:E(["text-[12px] w-[100px] rounded-l-[8px] h-[26px]",[o.status==1?" bg-[#000] text-white  ":" bg-white !text-[#000] border-[2px] border-black"]]),onClick:i=>_(s).saveEnableDisableSetting(o,1)},"Enable",10,Re),e("button",{class:E(["text-[12px] w-[100px] rounded-r-[8px] h-[26px]",[o.status==0?"bg-[#000] text-white ":"bg-white text-black border-[2px] border-black"]]),onClick:i=>_(s).saveEnableDisableSetting(o,0)},"Disable",10,Ue)]),e("div",Be,[o.status===1?(k(),$("div",Ie,[He,e("span",We,F(o.employee_count),1),e("span",{class:"underline",onClick:i=>(u.value=o.id,_(s).employeeAssignDialog=!0)},"Assign Employee",8,Oe)])):K("",!0)])]))),128))])]),b(Ae,{type:u.value},null,8,["type"])],64)}}},a=q(je),ze=ge();a.use(J,{ripple:!0});a.use(re);a.use(se);a.use(ze);a.directive("tooltip",le);a.directive("badge",oe);a.directive("ripple",G);a.directive("styleclass",ae);a.directive("focustrap",Q);a.component("Checkbox",ue);a.component("Button",X);a.component("DataTable",de);a.component("Column",Y);a.component("ConfirmDialog",ne);a.component("Toast",ie);a.component("Dialog",Z);a.component("Dropdown",ee);a.component("ProgressSpinner",ce);a.component("InputText",te);a.component("Calendar",pe);a.mount("#MobileSettings");
