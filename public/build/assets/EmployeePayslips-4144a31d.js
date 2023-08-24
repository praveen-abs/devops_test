import{d as u}from"./dayjs.min-a301eb4b.js";import{a as T}from"./index-0d903406.js";import{G as g,S as O,ai as D,o as b,c as R,d as M,h as t,w as d,l as S,t as v,V as r,F as N,g as m}from"./toastservice.esm-6ab5f57c.js";import{d as k}from"./pinia-85c4361b.js";import{U as H}from"./EmployeeDocumentsManagerService-37796e2e.js";const F=k("employeePayslipStore",()=>{const h=H(),o=g(),p=g(),_=g(!1),i=new URLSearchParams(window.location.search);function l(){return i.has("uid")?i.get("uid"):""}async function P(){T.post("/payroll/paycheck/getEmployeeAllPayslipList",{uid:l()}).then(e=>{o.value=e.data.data})}async function L(e,s){let c=parseInt(u(s).month())+1,y=u(s).year();await T.post("/payroll/paycheck/getEmployeePayslipDetailsAsHTML",{uid:l(),user_code:e,month:c,year:y}).then(a=>{p.value=a.data,_.value=!0})}function f(e,s,c){const y=e,a=document.createElement("a"),n=`${s}-${c}.pdf`;a.href=y,a.download=n,a.click()}async function w(e,s){h.loading=!0,console.log("Downloading payslip PDF.....");let c=parseInt(u(s).month())+1,y=u(s).year();await T.post("/payroll/paycheck/getEmployeePayslipDetailsAsPDF",{uid:l(),user_code:e,month:c,year:y}).then(a=>{if(console.log(" Response [downloadPayslipReleaseStatus] : "+JSON.stringify(a.data.data)),a.data.data){let n=a.data.data,A=a.data.emp_name,E=a.data.emp_month;n.startsWith("JVB")?(n="data:application/pdf;base64,"+n,f(n,A,E)):n.startsWith("data:application/pdf;base64")&&f(n)}else console.log("Response Url Not Found")}).finally(()=>{h.loading=!1})}return{array_employeePayslips_list:o,paySlipHTMLView:p,canShowPayslipView:_,getEmployeeAllPayslipList:P,getEmployeePayslipDetailsAsHTML:L,getEmployeePayslipDetailsAsPDF:w}});const C={class:"my-4"},V={class:"card flex justify-content-center inline-flex"},U=["innerHTML"],j={__name:"EmployeePayslips",setup(h){const o=F();O(async()=>{console.log("EmployeePayslips,vue loaded"),await o.getEmployeeAllPayslipList()});const p=g({PAYROLL_MONTH:{value:null,matchMode:D.STARTS_WITH,matchMode:D.EQUALS,matchMode:D.CONTAINS}});return(_,i)=>{const l=m("Column"),P=m("Button"),L=m("column"),f=m("DataTable"),w=m("Dialog");return b(),R(N,null,[M("div",C,[t(f,{value:r(o).array_employeePayslips_list,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],sortField:"PAYROLL_MONTH",sortOrder:-1,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:p.value,"onUpdate:filters":i[0]||(i[0]=e=>p.value=e),filterDisplay:"menu",loading:_.loading2,globalFilterFields:["name"]},{default:d(()=>[t(l,{field:"PAYROLL_MONTH",header:"Month",sortable:!0},{body:d(e=>[S(v(r(u)(e.data.PAYROLL_MONTH).format("DD-MMM-YYYY")),1)]),_:1}),t(l,{field:"TOTAL_EARNED_GROSS",header:"Gross Pay"}),t(l,{field:"Reimbursements",header:"Reimbursements"},{body:d(e=>[S(v(0))]),_:1}),t(l,{field:"TOTAL_DEDUCTIONS",header:"Deductions"}),t(l,{field:"NET_TAKE_HOME",header:"Take Home"}),t(l,{header:"Action"},{body:d(e=>[t(P,{class:"btn-primary z-0",label:"View ",onClick:s=>r(o).getEmployeePayslipDetailsAsHTML("",e.data.PAYROLL_MONTH)},null,8,["onClick"])]),_:1}),t(L,{header:"Download"},{body:d(e=>[t(P,{class:"btn-primary z-0",label:"Download ",onClick:s=>r(o).getEmployeePayslipDetailsAsPDF("",e.data.PAYROLL_MONTH)},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters","loading"])]),M("div",V,[t(w,{visible:r(o).canShowPayslipView,"onUpdate:visible":i[1]||(i[1]=e=>r(o).canShowPayslipView=e),modal:"",header:"Payslip",style:{width:"58vw"}},{default:d(()=>[M("div",{innerHTML:r(o).paySlipHTMLView},null,8,U)]),_:1},8,["visible"])])],64)}}};export{j as _};