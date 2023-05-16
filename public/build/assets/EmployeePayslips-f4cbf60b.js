import{d as y}from"./dayjs.min-ed58423a.js";import{a as f}from"./index-f7a317fc.js";import{d as T}from"./pinia-7d464185.js";import{H as h,I as v,c as E,e as L,h as a,w as r,a1 as i,F as A,g as d,o as b,k as w,t as D}from"./toastservice.esm-55c6bc57.js";const M=T("employeePayslipStore",()=>{const u=h(),t=h(),n=h(!1),s=new URLSearchParams(window.location.search);function o(){return s.has("uid")?s.get("uid"):""}async function c(){f.post("/payroll/paycheck/getEmployeeAllPayslipList",{uid:o()}).then(l=>{u.value=l.data.data})}async function P(l,e){let p=parseInt(y(e).month())+1,g=y(e).year();await f.post("/payroll/paycheck/getEmployeePayslipDetailsAsHTML",{uid:o(),user_code:l,month:p,year:g}).then(m=>{t.value=m.data,n.value=!0})}async function _(l,e){console.log("Downloading payslip PDF.....");let p=parseInt(y(e).month())+1,g=y(e).year();await f.post("/payroll/paycheck/getEmployeePayslipDetailsAsPDF",{uid:o(),user_code:l,month:p,year:g}).then(m=>{console.log(" Response [downloadPayslipReleaseStatus] : "+JSON.stringify(m.data.data)),saveAs(`data:application/pdf;base64,${m.data.data}`,"payslip.pdf")})}return{array_employeePayslips_list:u,paySlipHTMLView:t,canShowPayslipView:n,getEmployeeAllPayslipList:c,getEmployeePayslipDetailsAsHTML:P,getEmployeePayslipDetailsAsPDF:_}});const R={class:"my-4"},S={class:"card flex justify-content-center inline-flex"},k=["innerHTML"],F={__name:"EmployeePayslips",setup(u){const t=M();return v(async()=>{console.log("EmployeePayslips,vue loaded"),await t.getEmployeeAllPayslipList()}),(n,s)=>{const o=d("Column"),c=d("Button"),P=d("column"),_=d("DataTable"),l=d("Dialog");return b(),E(A,null,[L("div",R,[a(_,{value:i(t).array_employeePayslips_list,paginator:!0,rows:10,dataKey:"id",paginatorTemplate:"FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",rowsPerPageOptions:[5,10,25],currentPageReportTemplate:"Showing {first} to {last} of {totalRecords} Records",responsiveLayout:"scroll",filters:n.filters,"onUpdate:filters":s[0]||(s[0]=e=>n.filters=e),filterDisplay:"menu",loading:n.loading2,globalFilterFields:["name","status"]},{default:r(()=>[a(o,{field:"PAYROLL_MONTH",header:"Month"},{body:r(e=>[w(D(i(y)(e.data.PAYROLL_MONTH).format("DD-MMM-YYYY")),1)]),_:1}),a(o,{field:"TOTAL_EARNED_GROSS",header:"Gross Pay"}),a(o,{field:"Reimbursements",header:"Reimbursements"},{body:r(e=>[w(D(0))]),_:1}),a(o,{field:"TOTAL_DEDUCTIONS",header:"Deductions"}),a(o,{field:"NET_TAKE_HOME",header:"Take Home"}),a(o,{header:"Action"},{body:r(e=>[a(c,{class:"btn-primary",label:"View ",onClick:p=>i(t).getEmployeePayslipDetailsAsHTML("",e.data.PAYROLL_MONTH)},null,8,["onClick"])]),_:1}),a(P,{header:"Download"},{body:r(e=>[a(c,{class:"btn-primary",label:"Download ",onClick:p=>i(t).getEmployeePayslipDetailsAsPDF("",e.data.PAYROLL_MONTH)},null,8,["onClick"])]),_:1})]),_:1},8,["value","filters","loading"])]),L("div",S,[a(l,{visible:i(t).canShowPayslipView,"onUpdate:visible":s[1]||(s[1]=e=>i(t).canShowPayslipView=e),modal:"",header:"Payslip",style:{width:"50vw"}},{default:r(()=>[L("div",{innerHTML:i(t).paySlipHTMLView},null,8,k)]),_:1},8,["visible"])])],64)}}};export{F as _};
