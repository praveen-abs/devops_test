import{u as v,_ as y}from"./AssignEmployee-8b4f9dbd.js";import{o as w,r as i,c as p,e as n,f as a,n as l,l as _,h as o,g as e,F as u,m as f,t as x,p as g,j as S}from"./app-b9baa456.js";import"./index-362795f3.js";const k=e("h5",{style:{"text-align":"center"}},"Please wait...",-1),C={class:"w-full"},D=e("h1",{class:"text-[18px] text-[#000] my-2"},"Mobile App Settings",-1),M={class:""},E={class:"my-auto"},P={class:"text-[#000] text-[14px]"},$={class:"mx-auto"},A=["onClick"],B=["onClick"],N={class:"my-auto"},V={key:0,class:"flex float-right cursor-pointer w-[170px] items-center"},F=e("i",{class:"pi pi-users"},null,-1),j={class:"text-[#000] mx-2"},z=["onClick"],W={__name:"MobileSettings",setup(H){const s=v();w(async()=>{await s.getSessionClient(),await s.getMobileSettings()}),i(1);const r=i();return i(!1),(L,c)=>{const h=p("ProgressSpinner"),b=p("Dialog");return n(),a(u,null,[l(b,{header:"Header",visible:o(s).canshowloading,"onUpdate:visible":c[0]||(c[0]=t=>o(s).canshowloading=t),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:_(()=>[l(h,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:_(()=>[k]),_:1},8,["visible"]),e("div",C,[D,e("div",M,[(n(!0),a(u,null,f(o(s).arrayMobileSetDetails,(t,m)=>(n(),a("div",{class:"grid grid-cols-3 p-2 rounded-lg border my-2.5 h-[44px]",key:m},[e("div",E,[e("h1",P,x(t.sub_module_name),1)]),e("div",$,[e("button",{class:g(["text-[12px] w-[100px] rounded-l-[8px] h-[26px]",[t.status==1?" bg-[#000] text-white  ":" bg-white !text-[#000] border-[2px] border-black"]]),onClick:d=>o(s).saveEnableDisableSetting(t,1)},"Enable",10,A),e("button",{class:g(["text-[12px] w-[100px] rounded-r-[8px] h-[26px]",[t.status==0?"bg-[#000] text-white ":"bg-white text-black border-[2px] border-black"]]),onClick:d=>o(s).saveEnableDisableSetting(t,0)},"Disable",10,B)]),e("div",N,[t.status===1?(n(),a("div",V,[F,e("span",j,x(t.employee_count),1),e("span",{class:"underline",onClick:d=>(r.value=t.id,o(s).employeeAssignDialog=!0)},"Assign Employee",8,z)])):S("",!0)])]))),128))])]),l(y,{type:r.value},null,8,["type"])],64)}}};export{W as default};
