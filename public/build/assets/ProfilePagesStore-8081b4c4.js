<<<<<<<< HEAD:public/build/assets/ProfilePagesStore-8081b4c4.js
import{a as n}from"./index-362795f3.js";import{d as f}from"./pinia-3f44ac08.js";import{S as g}from"./Service-ff2a1406.js";import{I as t}from"./toastservice.esm-918560db.js";const _=f("employeeService",()=>{const l=t([]),s=t(!0),r=t(),o=t(),d=g(),c=new URLSearchParams(window.location.search);let a="/profile-pages-getEmpDetails";c.has("uid")&&(a=a+"?uid="+c.get("uid")),console.log("id"+a);let u=new URL(document.location).searchParams.get("uid");const i=()=>{n.post("/profile-pages/getProfilePicture",{user_code:o.value}).then(e=>{console.log("profile :?",e.data.data),r.value=e.data.data}).finally(()=>{console.log("profile Pic Fetched")})};async function p(){console.log("Getting employee details"),await n.get(a).then(e=>{console.log("fetchEmployeeDetails() : "+e.data),s.value=!1,l.value=e.data,console.log("Current User code :"+e.data.user_code),u?o.value=e.data.user_code:(console.log("user not code"),o.value=d.current_user_code)}).catch(e=>console.log(e)).finally(e=>{i(),console.log("completed")})}return{fetchEmployeeDetails:p,employeeDetails:l,loading_screen:s,user_code:o,getProfilePhoto:i,profile:r}});export{_ as p};
========
import{a as n}from"./index-362795f3.js";import{d as f}from"./pinia-32a239a1.js";import{S as g}from"./Service-c7776333.js";import{G as t}from"./toastservice.esm-23c43048.js";const _=f("employeeService",()=>{const l=t([]),s=t(!0),r=t(),o=t(),d=g(),c=new URLSearchParams(window.location.search);let a="/profile-pages-getEmpDetails";c.has("uid")&&(a=a+"?uid="+c.get("uid")),console.log("id"+a);let u=new URL(document.location).searchParams.get("uid");const i=()=>{n.post("/profile-pages/getProfilePicture",{user_code:o.value}).then(e=>{console.log("profile :?",e.data.data),r.value=e.data.data}).finally(()=>{console.log("profile Pic Fetched")})};async function p(){console.log("Getting employee details"),await n.get(a).then(e=>{console.log("fetchEmployeeDetails() : "+e.data),s.value=!1,l.value=e.data,console.log("Current User code :"+e.data.user_code),u?o.value=e.data.user_code:(console.log("user not code"),o.value=d.current_user_code)}).catch(e=>console.log(e)).finally(e=>{i(),console.log("completed")})}return{fetchEmployeeDetails:p,employeeDetails:l,loading_screen:s,user_code:o,getProfilePhoto:i,profile:r}});export{_ as p};
>>>>>>>> abf3a183463ed9a7806f9d013535f6f8c6772e1a:public/build/assets/ProfilePagesStore-5291cf2c.js
