import{d as o}from"./pinia-7d464185.js";import{a as t}from"./index-f7a317fc.js";import{H as r}from"./toastservice.esm-55c6bc57.js";const h=o("Service",()=>{const a=r(),s=r(),n=r();return t.get("/currentUser").then(e=>{a.value=e.data}),t.get("/currentUserName").then(e=>{n.value=e.data}),t.get("/currentUserCode").then(e=>{s.value=e.data}),{current_user_id:a,current_user_name:n,current_user_code:s,getCurrentUserCode:async()=>await t.get("/currentUserCode"),getBankList:()=>t.get("/db/getBankDetails"),getCountryList:()=>t.get("/db/getCountryDetails"),getStateList:()=>t.get("/db/getStatesDetails"),ManagerDetails:()=>t.get("/fetch-managers-name"),getBloodGroups:()=>t.get("/fetch-blood-groups"),DepartmentDetails:()=>t.get("/fetch-departments"),getMaritalStatus:()=>t.get("/fetch-marital-details"),getAllEmployees:()=>t.get("/get-all-employees")}});export{h as S};