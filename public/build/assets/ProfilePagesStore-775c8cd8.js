import{a as d}from"./index-362795f3.js";import{d as g}from"./pinia-641035e3.js";import{S as m}from"./Service-4ef425c0.js";import{Q as o}from"./inputnumber.esm-e362c3ab.js";const y=g("employeeService",()=>{const s=o([]),c=o(!0),r=o(),l=o(),a=o(),u=m(),i=new URLSearchParams(window.location.search);let t="/profile-pages-getEmpDetails";i.has("uid")&&(t=t+"?uid="+i.get("uid")),console.log("id"+t);let p=new URL(document.location).searchParams.get("uid");const n=()=>{d.post("/profile-pages/getProfilePicture",{user_code:a.value}).then(e=>{console.log("profile :?",e.data.data),r.value=e.data.data,l.value=e.data.data}).finally(()=>{console.log("profile Pic Fetched",l.value)})};async function f(){console.log("Getting employee details"),await d.get(t).then(e=>{console.log("fetchEmployeeDetails() : "+e.data),c.value=!1,s.value=e.data,console.log("Current User code :"+e.data.user_code),p?a.value=e.data.user_code:(console.log("user not code"),a.value=u.current_user_code)}).catch(e=>console.log(e)).finally(e=>{n(),console.log("completed")})}return{fetchEmployeeDetails:f,employeeDetails:s,loading_screen:c,user_code:a,getProfilePhoto:n,profile:r,profile_img:l}});export{y as p};
