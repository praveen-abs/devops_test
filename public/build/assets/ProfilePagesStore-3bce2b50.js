<<<<<<<< HEAD:public/build/assets/ProfilePagesStore-aa430bd5.js
import{a as n}from"./index-362795f3.js";import{d as f}from"./pinia-481183e8.js";import{S as m}from"./Service-fc776dae.js";import{H as t}from"./toastservice.esm-daaadd68.js";const y=f("employeeService",()=>{const l=t([]),s=t(!0),r=t(),o=t(),d=m(),c=new URLSearchParams(window.location.search);let a="/profile-pages-getEmpDetails";c.has("uid")&&(a=a+"?uid="+c.get("uid")),console.log("id"+a);let u=new URL(document.location).searchParams.get("uid");const i=()=>{n.post("/profile-pages/getProfilePicture",{user_code:o.value}).then(e=>{console.log("profile :?",e.data.data),r.value=e.data.data}).finally(()=>{console.log("profile Pic Fetched")})};async function p(){console.log("Getting employee details"),await n.get(a).then(e=>{console.log("fetchEmployeeDetails() : "+e.data),s.value=!1,l.value=e.data,u?o.value=e.data.user_code:(console.log("user not code"),o.value=d.current_user_code)}).catch(e=>console.log(e)).finally(e=>{i(),console.log("completed")})}return{fetchEmployeeDetails:p,employeeDetails:l,loading_screen:s,user_code:o,getProfilePhoto:i,profile:r}});export{y as p};
========
import{a as n}from"./index-362795f3.js";import{d as f}from"./pinia-33c7e0da.js";import{S as m}from"./Service-c3c14bcb.js";import{G as t}from"./toastservice.esm-089fd174.js";const y=f("employeeService",()=>{const l=t([]),s=t(!0),r=t(),o=t(),d=m(),c=new URLSearchParams(window.location.search);let a="/profile-pages-getEmpDetails";c.has("uid")&&(a=a+"?uid="+c.get("uid")),console.log("id"+a);let u=new URL(document.location).searchParams.get("uid");const i=()=>{n.post("/profile-pages/getProfilePicture",{user_code:o.value}).then(e=>{console.log("profile :?",e.data.data),r.value=e.data.data}).finally(()=>{console.log("profile Pic Fetched")})};async function p(){console.log("Getting employee details"),await n.get(a).then(e=>{console.log("fetchEmployeeDetails() : "+e.data),s.value=!1,l.value=e.data,u?o.value=e.data.user_code:(console.log("user not code"),o.value=d.current_user_code)}).catch(e=>console.log(e)).finally(e=>{i(),console.log("completed")})}return{fetchEmployeeDetails:p,employeeDetails:l,loading_screen:s,user_code:o,getProfilePhoto:i,profile:r}});export{y as p};
>>>>>>>> cc8dc325978f6f49883d2679bc6e4079e3e92cc4:public/build/assets/ProfilePagesStore-3bce2b50.js
