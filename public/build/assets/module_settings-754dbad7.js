import{_ as M}from"./AssignEmployee-5729c149.js";import{q as A,r as n,o as P,c as h,e as c,f as v,n as f,l as r,h as d,g as t,j as $,F as w,m as D,k as j,t as E,p as y}from"./app-88f17232.js";import{a as _}from"./index-362795f3.js";const B=A("useModuleSettingsStore",()=>{const k=n(),o=n(!1),i=n(),p=n(),b=n(),a=n(!1);async function u(){a.value=!0,await _.get("/getClient_AllModuleDetails").then(e=>{console.log(e.data),i.value=e.data.data,console.log("mobile settings",i.value)}).finally(()=>{a.value=!1})}const g=async()=>{await _.get("session-sessionselectedclient").then(e=>{console.log(e.data),b.value=e.data,e.data.id&&(p.value=e.data)})},m=()=>{_.get("/getClient_AllModulePermissionDetails").then(e=>{console.log(e.data)})};return{currentlySelectedModule:k,employeeAssignDialog:o,arrayModuleSettingsDetails:i,getSessionClient:g,saveEnableDisableSetting:async(e,s)=>{let S={module_id:e.module_id?e.module_id:e.module_id?"":e.value.module_id,module_status:s,sub_module_id:e.sub_module_id||e.module_id?"":e.value.sub_module_id,sub_module_status:e.sub_module_status||e.module_id?"":e.value.sub_module_status};a.value=!0,await _.post("/update_AllClientModuleStatus",S).then(x=>{console.log("Status received : "+x.data.status),x.data.status=="success"&&(e.status=s)}).finally(()=>{a.value=!1,u(),m()})},canshowloading:a,client_details:p,updateEmployeesPermissionStatus:()=>{_.post("/updateEmployeesPermissionStatus",{app_sub_modules_link_id,selected_employees_user_code}).then(()=>{}).finally(()=>{})},getModuleSettings:u,getClient_AllModulePermissionDetails:m}});const N=t("h5",{style:{"text-align":"center"}},"Please wait...",-1),T={class:"w-full"},V=t("h1",{class:"text-[18px] text-[#000] my-2"},"Module Settings",-1),F={class:"grid items-center w-full grid-cols-2"},O={class:"my-auto"},q={class:"text-[#000] text-[14px] my-auto"},z={class:"mx-auto"},H=["onClick"],L=["onClick"],U={class:"my-auto"},W={class:"text-[#000] text-[14px]"},G={class:"mx-auto"},I=["onClick"],J=["onClick"],X={__name:"module_settings",setup(k){const o=B();P(async()=>{await o.getSessionClient(),await o.getModuleSettings()});const i=b=>Object.entries(b).map(u=>({title:u[0],value:u[1]}));n(1);const p=n();return n(!1),(b,a)=>{const u=h("ProgressSpinner"),g=h("Dialog"),m=h("AccordionTab"),C=h("Accordion");return c(),v(w,null,[f(g,{header:"Header",visible:d(o).canshowloading,"onUpdate:visible":a[0]||(a[0]=l=>d(o).canshowloading=l),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:r(()=>[f(u,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:r(()=>[N]),_:1},8,["visible"]),t("div",T,[V,$("",!0)]),f(C,null,{default:r(()=>[(c(!0),v(w,null,D(d(o).arrayModuleSettingsDetails,(l,e)=>(c(),j(m,{key:e},{header:r(()=>[t("div",F,[t("div",O,[t("h1",q,E(l.module_name),1)]),t("div",null,[t("div",z,[t("button",{class:y(["text-[12px] w-[100px] rounded-l-[8px] h-[26px]",[l.module_status==1?" bg-[#000] text-white  ":" bg-white !text-[#000] border-[2px] border-black"]]),onClick:s=>(d(o).saveEnableDisableSetting(l,1),l.module_status=1)},"Enable",10,H),t("button",{class:y(["text-[12px] w-[100px] rounded-r-[8px] h-[26px]",[l.module_status==0?"bg-[#000] text-white ":"bg-white text-black border-[2px] border-black"]]),onClick:s=>(d(o).saveEnableDisableSetting(l,0),l.module_status=0)},"Disable",10,L)])])])]),default:r(()=>[(c(!0),v(w,null,D(i(l.sub_module_details),(s,S)=>(c(),v("div",{class:"grid grid-cols-2 p-2 rounded-lg border my-2.5 h-[44px]",key:S},[t("div",U,[t("h1",W,E(s?s.value.sub_module_name:""),1)]),t("div",G,[t("button",{class:y(["text-[12px] w-[100px] rounded-l-[8px] h-[26px]",[s.value.sub_module_status==1?" bg-[#000] text-white  ":" bg-white !text-[#000] border-[2px] border-black"]]),onClick:x=>(d(o).saveEnableDisableSetting(s,1),s.value.sub_module_status=1)},"Enable",10,I),t("button",{class:y(["text-[12px] w-[100px] rounded-r-[8px] h-[26px]",[s.value.sub_module_status==0?"bg-[#000] text-white ":"bg-white text-black border-[2px] border-black"]]),onClick:x=>(d(o).saveEnableDisableSetting(s,0),s.value.sub_module_status=0)},"Disable",10,J)])]))),128))]),_:2},1024))),128))]),_:1}),f(M,{type:p.value},null,8,["type"])],64)}}};export{X as default};
