import{d as C}from"./pinia-1a7bd30b.js";import{a as t}from"./index-362795f3.js";import{$ as r}from"./toastservice.esm-1e4d76cb.js";const D=C("Service",()=>{const n=r(),o=r(),s=r(),a=r();t.get("/currentUser").then(e=>{n.value=e.data}),t.get("/currentUserName").then(e=>{s.value=e.data}),t.get("/currentUserCode").then(e=>{o.value=e.data}),t.get("/currentUserRole").then(e=>{a.value=e.data});const c=async()=>await t.get("/currentUserCode"),u=()=>t.get("/db/getBankDetails"),l=()=>t.get("/db/getCountryDetails"),i=()=>t.get("/db/getStatesDetails"),d=()=>t.get("/fetch-managers-name"),b=()=>t.get("/fetch-departments"),m=()=>t.get("/fetch-marital-details"),p=()=>t.get("/fetch-blood-groups"),f=()=>t.get("/get-all-employees");function h(e){return e.charAt(0).toUpperCase()+e.slice(1)}const g=["bg-orange-400","bg-emerald-400","bg-yellow-400","bg-rose-400","bg-cyan-400","bg-amber-400","bg-red-400","bg-blue-400","bg-pink-400","bg-green-400","bg-fuchsia-400"];return{current_user_id:n,current_user_name:s,current_user_code:o,current_user_role:a,getCurrentUserCode:c,getBankList:u,getCountryList:l,getStateList:i,ManagerDetails:d,getBloodGroups:p,DepartmentDetails:b,getMaritalStatus:m,getAllEmployees:f,capitalizeFLetter:h,getBackgroundColor:e=>(console.log(e),g[e%g.length])}});export{D as S};
