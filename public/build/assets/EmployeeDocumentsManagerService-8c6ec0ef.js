import{a as s}from"./index-362795f3.js";import{d as m}from"./pinia-4be28dc8.js";import{S as u}from"./Service-27f748d6.js";import{p as d}from"./ProfilePagesStore-fdbd5911.js";import{Q as e}from"./inputnumber.esm-a7c5b1f0.js";const E=m("EmployeeDocumentManagerService",()=>{const a=u(),o=e(!1),t=e([]);e();const r=e(),c=d();return{EmployeeDocs_upload:e({AadharCardFront:null,AadharCardBack:null,PanCardDoc:null,DrivingLicenseDoc:null,EductionDoc:null,VoterIdDoc:null,RelievingLetterDoc:null,PassportDoc:null,save_draft_messege:null}),getEmployeeDetails:a,getEmployeeDoc:t,getEmpdocPhoto:r,fetch_EmployeeDocument:async()=>{let n=c.employeeDetails.user_code;await a.getCurrentUserCode().then(l=>{n=l.data}),o.value=!0,await s.post("/employee-documents-details",{user_code:n}).then(l=>{t.value=l.data.data,console.log("employee document : ",t.value)}).finally(()=>{o.value=!1,console.log("completed")})},loading:o}});export{E as U};
