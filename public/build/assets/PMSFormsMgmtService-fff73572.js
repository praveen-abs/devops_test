import{d as u}from"./pinia-0f325ab3.js";import{a as r}from"./index-f7a317fc.js";import{S as i}from"./Service-72c2c125.js";import{B as l}from"./toastservice.esm-c4f6de4c.js";const S=u("pmsFormsDownloadStore",()=>{const o=l(!1),s=i(),t=l(),n=l([]),a=l();async function m(){o.value=!0,await s.getAllEmployees().then(e=>{t.value=e.data,console.log("testing data:",e.data)}).then(()=>{o.value=!1})}async function c(){o.value=!0,r.post("http://127.0.0.1:8000/getAssignedPMSFormTemplates",{user_code:a.value.user_code}).then(e=>{console.log(e.data.data),n.value=e.data.data,o.value=!1}),console.log(a.value.user_code),console.log(`${a.value.user_code} - ${a.value.name}`)}return{allEmployees:t,getAllEmployeesList:m,service:s,array_pms_forms_list:n,selectedEmployee:a,downloadForm:async e=>{console.log(e),r.post("/get-employee-PMS-form-template-excel",{form_id:e}).then(d=>{console.log(d)}).finally(()=>{console.log("form id sent")})},viewEmployeePmsForm:c,loading:o}});export{S as u};