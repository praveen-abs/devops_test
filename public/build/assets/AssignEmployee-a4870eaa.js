import{C as T,r as n,q as M,o as F,b as U,c as h,e as N,k as R,l as w,g as l,w as $,v as I,n as b,p as V,h as S,E as B,a1 as k}from"./app-97f47cb8.js";import{a as g}from"./index-0d903406.js";const H=T("MobileSettingsStore",()=>{const m=n(!1),a=n(),v=n(),f=n(),u=n(!1);async function _(){u.value=!0,await g.post("/getClient_MobileModulePermissionDetails",{client_id:v.value.id}).then(d=>{console.log(d.data),a.value=d.data.data,console.log("mobile settings",a.value)}).finally(()=>{u.value=!1})}return{employeeAssignDialog:m,arrayMobileSetDetails:a,getSessionClient:async()=>{await g.get(`${window.location.origin}/session-sessionselectedclient`).then(d=>{console.log(d.data),f.value=d.data,d.data.id&&(v.value=d.data)})},saveEnableDisableSetting:async(d,s)=>{u.value=!0,await g.post("/updateClientModuleStatus",{module_id:d.id,status:s}).then(y=>{console.log("Status received : "+y.data.status),y.data.status=="success"&&(d.status=s)}).finally(()=>{u.value=!1})},canshowloading:u,client_details:v,updateEmployeesPermissionStatus:()=>{g.post("/updateEmployeesPermissionStatus",{app_sub_modules_link_id,selected_employees_user_code}).then(()=>{}).finally(()=>{})},getMobileSettings:_}});const j=l("div",{class:"w-full p-2"},[l("div",{class:"flex justify-between"},[l("div",null,[l("p",{class:"text-lg font-semibold"},"Employee Assign")]),l("div")])],-1),q={class:"flex w-[100%]"},z={class:""},O={class:"grid grid-cols-12 gap-2 mt-3"},W={class:"flex items-center col-span-4"},K={class:"flex items-center col-span-5"},G=l("p",null,"Legal entity",-1),J={class:"flex items-center col-span-3"},Q=l("p",null,"Department",-1),X={class:"my-3 table-responsive"},Y={class:"mx-auto"},Z=["onClick"],ee=["onClick"],te={class:"flex justify-center w-1/2 p-2 mx-auto"},se={__name:"AssignEmployee",props:{type:{type:Number,required:!0}},setup(m){const a=H(),v=n({global:{value:null,matchMode:k.CONTAINS},name:{value:null,matchMode:k.STARTS_WITH},department_name:{value:null,matchMode:k.STARTS_WITH}});n(!1);const f=n([]),u=n(),_=n(),x=n(),i=n();n(),n(1);const C=async()=>{await g.get("/getAllDropdownFilterSetting").then(r=>{u.value=r.data})},d=(r,e,c)=>{console.log(r,e),console.log("sub_module_id",c);let o=c;g.post("/getEmployeesFilterData",{department_id:e,client_name:r,sub_module_id:o}).then(p=>{console.log(p.data),i.value=p.data,console.log("testing   res.data.client_id",p.data.client_id)}).finally(()=>{console.log("selectedUserId",s)})},s=M([]);function y(r,e,c,o){console.log("isEnabled:"+e,r)}M([]);function E(r,e,c){c==1&&r.forEach(p=>{if(p.status==0){let D={id:p.id,isEnabled:1,client_id:a.client_details.id};s.push(D)}}),c==2&&s.splice(0,s.length),a.canshowloading=!0,g.post("/updateEmployeesPermissionStatus",{client_id:a.client_details.id,app_sub_modules_link_id:e,selected_employees_user_code:s}).then(o=>{}).finally(()=>{s.splice(0,s.length),i.value&&i.value.splice(0,i.value.length),a.employeeAssignDialog=!1,a.getMobileSettings(),a.canshowloading=!1})}const L=(r,e)=>{console.log("Dropdown legal Entity : "+_.value),r.forEach(o=>{if(o.status==1){let p={id:o.id,isEnabled:o.status,client_id:_.value};s.push(p)}else console.log(console.log(o.id,"else ::"))}),a.canshowloading=!0,g.post("/updateEmployeesPermissionStatus",{client_id:a.client_details.id,app_sub_modules_link_id:e,selected_employees_user_code:s}).then(o=>{}).finally(()=>{s.splice(0,s.length),i.value&&i.value.splice(0,i.value.length),a.employeeAssignDialog=!1,a.getMobileSettings(),a.canshowloading=!1})};function A(){s.values=[],i.value=[],_.value="",x.value="",a.employeeAssignDialog=!1}return F(()=>{C()}),U(()=>{f.value=null}),(r,e)=>{const c=h("Dropdown"),o=h("Column"),p=h("DataTable"),D=h("Dialog");return N(),R(D,{visible:S(a).employeeAssignDialog,"onUpdate:visible":e[10]||(e[10]=t=>S(a).employeeAssignDialog=t),modal:"",header:"Holiday ",style:B([{width:"70vw"},{"border-top":"5px solid #002f56"}]),breakpoints:{"960px":"75vw","640px":"90vw"},class:"popup_card","aria-controls":S(a).employeeAssignDialog?"":null,"aria-expanded":S(a).employeeAssignDialog?!0:A()},{header:w(()=>[j]),default:w(()=>[l("div",q,[l("div",z,[l("button",{class:"text-[12px] w-[100px] rounded-l-[8px] h-[26px] bg-[rgba(0,0,0,0.95)] hover:bg-[#000] text-[#fff]",onClick:e[0]||(e[0]=t=>E(i.value,m.type,1))},"Enable All"),l("button",{class:"text-[12px] w-[100px] rounded-r-[8px] h-[26px] border-[2px] border-[#000] text-[#000]",onClick:e[1]||(e[1]=t=>E(i.value,m.type,2))},"Disable All")])]),l("div",O,[l("div",W,[$(l("input",{type:"text","onUpdate:modelValue":e[2]||(e[2]=t=>v.value.global.value=t),placeholder:"Search employee..",class:"border rounded-lg bg-gray-100 p-1.5 w-11/12"},null,512),[[I,v.value.global.value]])]),l("div",K,[G,b(c,{modelValue:_.value,"onUpdate:modelValue":e[3]||(e[3]=t=>_.value=t),class:"w-full min-[280px]:",placeholder:"Legal entity",onChange:e[4]||(e[4]=t=>d(t.value,"",m.type)),options:u.value?u.value.legalEntity:[],optionLabel:"client_name",optionValue:"id"},null,8,["modelValue","options"])]),l("div",J,[Q,b(c,{modelValue:x.value,"onUpdate:modelValue":e[5]||(e[5]=t=>x.value=t),class:"w-full",placeholder:"Department",onChange:e[6]||(e[6]=t=>d("",t.value,m.type)),options:u.value?u.value.department:[],optionLabel:"name",optionValue:"id"},null,8,["modelValue","options"])])]),l("div",X,[b(p,{selection:f.value,"onUpdate:selection":e[7]||(e[7]=t=>f.value=t),value:i.value,ref:"dt",dataKey:"id",paginator:!0,rows:10,paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],filters:v.value,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",globalFilterFields:["name","department_name"],responsiveLayout:"scroll"},{default:w(()=>[b(o,{field:"name",filterField:"name",header:"Name",style:{"min-width":"12rem"}}),b(o,{header:"Department",filterField:"department_name",field:"department_name",style:{"min-width":"8rem"}}),b(o,{field:"status",header:"Action",style:{"min-width":"12rem"}},{body:w(t=>[l("div",Y,[l("button",{class:V(["text-[12px] w-[100px] rounded-l-[8px] h-[26px]",[t.data.status==1?" bg-[#000] text-white  ":" bg-white !text-[#000] border-[2px] border-black"]]),onClick:P=>y(t.data.id,1,t.data.status=1,t.data.client_id)},"Enable",10,Z),l("button",{class:V(["text-[12px] w-[100px] rounded-r-[8px] h-[26px]",[t.data.status==0?"bg-[#000] text-white ":"bg-white text-black border-[2px] border-black"]]),onClick:P=>y(t.data.id,0,t.data.status=0,t.data.client_id)},"Disable",10,ee)])]),_:1})]),_:1},8,["selection","value","filters"]),l("div",te,[l("button",{onClick:e[8]||(e[8]=t=>A()),class:"mx-2 p-2 bg-black !text-[#fff] border-[2px] border-black rounded-lg"},"Cancel"),l("button",{class:"mx-2 bg-white !text-[#000] border-[2px] p-2 border-black rounded-lg",onClick:e[9]||(e[9]=t=>L(i.value,m.type))},"Confirm")])])]),_:1},8,["visible","aria-controls","aria-expanded"])}}};export{se as _,H as u};
