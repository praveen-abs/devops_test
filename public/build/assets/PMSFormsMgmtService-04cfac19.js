import{d as i}from"./pinia-1cb26f5c.js";import{a as f}from"./index-362795f3.js";import{S as d}from"./Service-bf010958.js";import{H as s}from"./toastservice.esm-a7a48f69.js";const S=i("pmsFormsDownloadStore",()=>{const e=s(!1),t=d(),l=s(),n=s([]),a=s();async function r(){e.value=!0,await t.getAllEmployees().then(o=>{l.value=o.data,console.log("testing data:",o.data)}).then(()=>{e.value=!1})}async function m(){console.log("Getting PMS form for the user : "+a.value.user_code),e.value=!0}return{allEmployees:l,getAllEmployeesList:r,service:t,array_pms_forms_list:n,selectedEmployee:a,downloadForm:async o=>{console.log(o),f.post("/get-employee-PMS-form-template-excel",{form_id:o}).then(c=>{console.log(c)}).finally(()=>{console.log("form id sent")})},viewEmployeePmsForm:m,loading:e}});export{S as u};