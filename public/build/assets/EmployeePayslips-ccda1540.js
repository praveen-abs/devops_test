import{d as c}from"./dayjs.min-ed58423a.js";import{a as L}from"./index-f7a317fc.js";import{H as P,I as M,c as v,e as h,h as a,w as r,a3 as i,F as A,_ as w,g as y,o as E,k as T,t as D}from"./toastservice.esm-1e19bead.js";import{d as O}from"./pinia-8c47295b.js";const S=O("employeePayslipStore",()=>{const g=P(),t=P(),p=P(!1),m=new URLSearchParams(window.location.search);function o(){return m.has("uid")?m.get("uid"):""}async function l(){L.post("/payroll/paycheck/getEmployeeAllPayslipList",{uid:o()}).then(s=>{g.value=s.data.data})}async function u(s,n){let e=parseInt(c(n).month())+1,d=c(n).year();await L.post("/payroll/paycheck/getEmployeePayslipDetailsAsHTML",{uid:o(),user_code:s,month:e,year:d}).then(_=>{t.value=_.data,p.value=!0})}async function f(s,n){console.log("Downloading payslip PDF.....");let e=parseInt(c(n).month())+1,d=c(n).year();await L.post("/payroll/paycheck/getEmployeePayslipDetailsAsPDF",{uid:o(),user_code:s,month:e,year:d}).then(_=>{console.log(" Response [downloadPayslipReleaseStatus] : "+JSON.stringify(_.data.data)),window.open(`data:application/pdf;base64,${_.data.data}`)})}return{array_employeePayslips_list:g,paySlipHTMLView:t,canShowPayslipView:p,getEmployeeAllPayslipList:l,getEmployeePayslipDetailsAsHTML:u,getEmployeePayslipDetailsAsPDF:f}});const R={class:"my-4"},b={class:"card flex justify-content-center inline-flex"},H=["innerHTML"],Y={__name:"EmployeePayslips",setup(g){const t=S();M(async()=>{console.log("EmployeePayslips,vue loaded"),await t.getEmployeeAllPayslipList()});const p=P({PAYROLL_MONTH:{value:null,matchMode:w.STARTS_WITH,matchMode:w.EQUALS,matchMode:w.CONTAINS}});return(m,o)=>{const l=y("Column"),u=y("Button"),f=y("column"),s=y("DataTable"),n=y("Dialog");return E(),v(A,null,[h("div",R,[a(s,{value:i(t).array_employeePayslips_list,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],sortField:"PAYROLL_MONTH",sortOrder:-1,currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:p.value,"onUpdate:filters":o[0]||(o[0]=e=>p.value=e),filterDisplay:"menu",loading:m.loading2,globalFilterFields:["name"]},{default:r(()=>[a(l,{field:"PAYROLL_MONTH",header:"Month",sortable:!0},{body:r(e=>[T(D(i(c)(e.data.PAYROLL_MONTH).format("DD-MMM-YYYY")),1)]),_:1}),a(l,{field:"TOTAL_EARNED_GROSS",header:"Gross Pay"}),a(l,{field:"Reimbursements",header:"Reimbursements"},{body:r(e=>[T(D(0))]),_:1}),a(l,{field:"TOTAL_DEDUCTIONS",header:"Deductions"}),a(l,{field:"NET_TAKE_HOME",header:"Take Home"}),a(l,{header:"Action"},{body:r(e=>[a(u,{class:"btn-primary",label:"View ",onClick:d=>i(t).getEmployeePayslipDetailsAsHTML("",e.data.PAYROLL_MONTH)},null,8,["onClick"])]),_:1}),a(f,{header:"Download"},{body:r(e=>[a(u,{class:"btn-primary",label:"Download ",onClick:d=>i(t).getEmployeePayslipDetailsAsPDF("",e.data.PAYROLL_MONTH)},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters","loading"])]),h("div",b,[a(n,{visible:i(t).canShowPayslipView,"onUpdate:visible":o[1]||(o[1]=e=>i(t).canShowPayslipView=e),modal:"",header:"Payslip",style:{width:"58vw"}},{default:r(()=>[h("div",{innerHTML:i(t).paySlipHTMLView},null,8,H)]),_:1},8,["visible"])])],64)}}};export{Y as _};
