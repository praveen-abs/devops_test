import{d as o}from"./pinia-0f325ab3.js";import{a as t}from"./index-f7a317fc.js";import{B as r}from"./toastservice.esm-c4f6de4c.js";const S=o("Service",()=>{const a=r(),s=r(),n=r();return t.get("/currentUser").then(e=>{a.value=e.data}),t.get("/currentUserName").then(e=>{n.value=e.data}),t.get("/currentUserCode").then(e=>{s.value=e.data}),{current_user_id:a,current_user_name:n,current_user_code:s,getBankList:()=>t.get("/db/getBankDetails"),getCountryList:()=>t.get("/db/getCountryDetails"),getStateList:()=>t.get("/db/getStatesDetails"),ManagerDetails:()=>t.get("/fetch-managers-name"),getBloodGroups:()=>t.get("/fetch-blood-groups"),DepartmentDetails:()=>t.get("/fetch-departments"),getMaritalStatus:()=>t.get("/fetch-marital-details")}});export{S};