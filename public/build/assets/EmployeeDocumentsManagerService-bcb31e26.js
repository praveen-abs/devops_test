import{a as s}from"./index-362795f3.js";import{d as m}from"./pinia-641035e3.js";import{S as u}from"./Service-4ef425c0.js";import{p as d}from"./ProfilePagesStore-775c8cd8.js";import{Q as e}from"./inputnumber.esm-e362c3ab.js";const E=m("EmployeeDocumentManagerService",()=>{const a=u(),o=e(!1),t=e([]);e();const r=e(),c=d();return{EmployeeDocs_upload:e({AadharCardFront:null,AadharCardBack:null,PanCardDoc:null,DrivingLicenseDoc:null,EductionDoc:null,VoterIdDoc:null,RelievingLetterDoc:null,PassportDoc:null,save_draft_messege:null}),getEmployeeDetails:a,getEmployeeDoc:t,getEmpdocPhoto:r,fetch_EmployeeDocument:async()=>{let n=c.employeeDetails.user_code;await a.getCurrentUserCode().then(l=>{n=l.data}),o.value=!0,await s.post("/employee-documents-details",{user_code:n}).then(l=>{t.value=l.data.data,console.log("employee document : ",t.value)}).finally(()=>{o.value=!1,console.log("completed")})},loading:o}});export{E as U};