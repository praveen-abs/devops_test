import{q as C,r}from"./app-fb0093c1.js";import{a as t}from"./index-362795f3.js";const D=C("Service",()=>{const n=r(),s=r(),a=r(),o=r(),g=r();t.get("/currentUser").then(e=>{n.value=e.data}),t.get("/currentUserName").then(e=>{a.value=e.data}),t.get("/currentUseris_ssa").then(e=>{g.value=e.data}),t.get("/currentUserCode").then(e=>{s.value=e.data}),t.get("/currentUserRole").then(e=>{o.value=e.data});const c=async()=>await t.get("/currentUserCode"),l=()=>t.get("/db/getBankDetails"),i=()=>t.get("/db/getCountryDetails"),d=()=>t.get("/db/getStatesDetails"),b=()=>t.get("/fetch-managers-name"),m=()=>t.get("/fetch-departments"),p=()=>t.get("/fetch-marital-details"),h=()=>t.get("/fetch-blood-groups"),_=()=>t.get("/get-all-employees");function f(e){return e.charAt(0).toUpperCase()+e.slice(1)}const u=["bg-orange-400","bg-emerald-400","bg-yellow-400","bg-rose-400","bg-cyan-400","bg-amber-400","bg-red-400","bg-blue-400","bg-pink-400","bg-green-400","bg-fuchsia-400"];return{current_user_id:n,current_user_name:a,current_user_code:s,current_user_role:o,current_user_is_ssa:g,getCurrentUserCode:c,getBankList:l,getCountryList:i,getStateList:d,ManagerDetails:b,getBloodGroups:h,DepartmentDetails:m,getMaritalStatus:p,getAllEmployees:_,capitalizeFLetter:f,getBackgroundColor:e=>u[e%u.length]}});export{D as S};