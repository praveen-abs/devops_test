import{a as n}from"./index-362795f3.js";import{q as u,r as t,u as d,a as g}from"./app-b9baa456.js";import{S as m}from"./Service-504054d8.js";const P=u("employeeService",()=>{const l=t([]),s=t(!0);d(),g();const r=t(),a=t(),c=t();m();const i=()=>{n.post("/profile-pages/getProfilePicture",{user_code:c.value}).then(o=>{console.log("profile :?",o.data.data),r.value=o.data.data,a.value=o.data.data}).finally(()=>{console.log("profile Pic Fetched",a.value)})};async function p(o){let f="/profile-pages-getEmpDetails";console.log("Getting employee details"),await n.get(`${f}/${o}`).then(e=>{console.log("fetchEmployeeDetails() : "+e.data),s.value=!1,l.value=e.data,console.log("Current User code :"+e.data.user_code)}).catch(e=>console.log(e)).finally(e=>{i(),console.log("completed")})}return{fetchEmployeeDetails:p,employeeDetails:l,loading_screen:s,user_code:c,getProfilePhoto:i,profile:r,profile_img:a}});export{P as p};
