import{q as ne,u as re,r as l,y as ce,c as N,e as i,f as u,g as n,h as m,n as F,l as R,F as U,m as ie,k as ue,t as g,p as w,i as de,B as pe,_ as me,a as _e,j as ye}from"./app-f3675218.js";import{a as fe}from"./index-362795f3.js";import{r as ve,u as D}from"./xlsx-4ad528ac.js";import"./dayjs.min-2f06af28.js";import{S as Q}from"./Service-0459e282.js";const X=ne("useImportSalaryAdvance",()=>{re();const L=l(!1),r=ce(),d=l(),x=l(),S=l(),_=l([]),f=l([]);l(!1),l(!1);const h=l(),O=l(),v=e=>{S.value=e.target.files[0]},o=(e,t)=>{if(e){var a=e.target.files[0];if(!a)return;var b=new FileReader;b.onload=function(T){const E=b.result;var I=ve(E,{type:"binary",cellDates:!0,dateNF:"dd-mm-yyyy"}),J=I.Sheets[I.SheetNames[0]];let M=[];const k={},$=D.decode_range(J["!ref"]);let y;const le=$.s.r;for(y=$.s.c;y<=$.e.c;++y){const p=J[D.encode_cell({c:y,r:le})];let C="UNKNOWN "+y;p&&p.t&&(C=D.format_cell(p)),k[y]=C;let j={title:k[y],value:k[y]};k[y].includes("UNKNOWN")||M.push(j)}x.value=M,console.log(M);const A=I.SheetNames.reduce((p,C)=>{const j=I.Sheets[C];return p[C]=D.sheet_to_json(j,{raw:!1,dateNF:"dd-mm-yyyy"}),p},{}),V=Object.keys(A)[0];A[V]?d.value=A[V]:d.value=[],d.value&&Y(d.value),_.value.push(d.value);for(let p=0;p<A[V].length;p++)console.log("jsonData['Sheet1'].length :",A[V].length),G(d.value[p])},b.readAsArrayBuffer(a)}else r.add({severity:"error",summary:"file missing!",detail:"selected",life:2e3})},s=e=>{let t="/updateEmployeeLeaveBalanceData";f.value==0?fe.post(t,e).then(a=>{a.data.status=="failure"?r.add({severity:"error",summary:"failure",detail:`${a.data.message}`,life:3e3}):a.data.status=="success"&&a.data.data.forEach(b=>{r.add({severity:"success",summary:`${b.Employee_Name}`,detail:`${b.message}`,life:3e3})})}).finally(()=>{}):r.add({severity:"error",summary:"Failure!",detail:"Clear error fields",life:3e3})};function B(e){return e.filter((t,a)=>e.indexOf(t)!==a)}let H=l([]),K=l([]),P=l([]),q=l([]),z=l([]),W=l([]);const Y=e=>{e.forEach(t=>{H.value.push(t["Employee Code"]),K.value.push(t.Email),P.value.push(t["Mobile Number"]),q.value.push(t["Pan No"]),z.value.push(t.Aadhar),W.value.push(t["Account No"])})},Z=(e,t)=>!!B(e).includes(t),ee=(e,t)=>(console.log(t),!!e.includes(t)),se=e=>c(e)<=0,oe=l([{id:"1",name:"Salary advance"},{id:"2",name:"Interest free loan"},{id:"3",name:"Travel advance"},{id:"4",name:"Interest with loan"}]),te=(e,t,a)=>{if(console.log({balance:e,loanAmt:t,Repayment:a}),console.log(`loanAmount${c(t)}`),console.log(`repaymentAmount${c(a)}`),e){let E;var T=/\d/.test(a);return T?(E=c(t)-c(a),c(e)!=E):(E=c(t),console.log("======Balance====="+E),c(e)!=E)}console.log(c(e)==balance)},ae=(e,t,a)=>{if(console.log({emi:e,balance:t,tenure:a}),e){let T=c(t)/c(a);return console.log("Actual emi:"+c(e)),console.log("subbed emi:"+T),c(e)!=T}},c=e=>{if(e){console.log(e.split(".")[0]);var t=e.split(".")[0],a=t.match(/\d/g);if(a)return a=a.join(""),console.log(`convertRupeeIntoNumber${a}`),parseInt(a)}},G=e=>(console.log(h.value),[]);return{getCurrentlyImportedTableDuplicateEntries:Y,currentlyImportedTableEmployeeCodeValues:H,findCurrentTableDups:Z,uploadOnboardingFile:s,type:O,currentlyImportedTableAadharValues:z,currentlyImportedTablePanValues:q,currentlyImportedTableAccNoValues:W,currentlyImportedTableEmailValues:K,currentlyImportedTableMobileNumberValues:P,loanAmount:se,loanTypes:oe,findBalanceAmount:te,findEmiCalculation:ae,isExistsOrNot:ee,convertExcelIntoArray:o,EmployeeSalaryAdvanceDynamicHeader:x,EmployeeSalaryAdvanceSource:d,getValidationMessages:G,getExcelForUpload:v,canShowloading:L}}),be={class:"grid w-10/12 grid-cols-3 mx-auto my-2 place-content-center"},ge={class:"flex"},he=n("label",{class:"p-2 font-semibold border-gray-500 rounded-lg cursor-pointer border-1 fs-6",for:"file"},[n("i",{class:"px-2 pi pi-folder",style:{"font-size":"1rem"}}),de("Browse")],-1),Ee=pe('<div class="p-2 mx-6 font-semibold text-black bg-white rounded-lg fs-6">Total Records : <span class="font-bold"> 2324 </span></div><div class="p-2 mx-6 font-semibold text-black bg-green-100 rounded-lg fs-6">Processed Records : <span class="font-bold"> 2342 </span></div><div class="p-2 mx-6 font-semibold text-black bg-red-100 rounded-lg fs-6">Error Records : <span class="font-bold"> 12313 </span></div>',3),xe=n("div",{class:"py-5"},[n("p",{class:"font-semibold fs-6"},"Sample format:"),n("div",{class:"table-responsive"})],-1),Se={class:"table-responsive"},Ne=n("p",{class:"font-semibold fs-6"},"Original data:",-1),Te={key:0},Ae={class:"font-semibold fs-6"},Ce={key:1},Ie={class:"font-semibold fs-6"},ke={class:"font-semibold fs-6"},Ve={key:3},Re={class:"font-semibold fs-6"},De={class:"font-semibold fs-6"},Fe={class:"font-semibold fs-6"},Le={class:"font-semibold fs-6"},Oe={key:7,class:"font-semibold fs-6"},Be={__name:"import_salary_advance",setup(L){Q();const r=X(),d=S=>{let{data:_,newValue:f,field:h}=S;switch(h){case"quantity":case"price":isPositiveInteger(f)?_[h]=f:S.preventDefault();break;default:f.trim().length>0?_[h]=f:S.preventDefault();break}},x=["SALARY ADVANCE","INTEREST FREE LOAN","TRAVEL ADVANCE","INTEREST wITH LOAN"];return(S,_)=>{const f=N("InputText"),h=N("Column"),O=N("DataTable");return i(),u(U,null,[n("div",be,[n("div",ge,[he,n("input",{type:"file",name:"",id:"file",hidden:"",onChange:_[0]||(_[0]=v=>m(r).convertExcelIntoArray(v)),accept:".xls, .xlsx"},null,32)]),Ee]),xe,n("div",Se,[Ne,F(O,{class:"py-4",value:m(r).EmployeeSalaryAdvanceSource,tableStyle:" min-width: 50rem",responsiveLayout:"scroll",stateStorage:"session",stateKey:"dt-state-demo-session",editMode:"cell",onCellEditComplete:d,rows:m(r).EmployeeSalaryAdvanceSource},{footer:R(()=>[n("button",{class:"flex justify-center mx-auto btn btn-orange",onClick:_[1]||(_[1]=v=>m(r).uploadOnboardingFile(m(r).EmployeeSalaryAdvanceSource))},"Upload")]),default:R(()=>[(i(!0),u(U,null,ie(m(r).EmployeeSalaryAdvanceDynamicHeader,v=>(i(),ue(h,{key:v.title,field:v.title,style:{"min-width":"12rem"},header:v.title},{body:R(({data:o,field:s})=>[s.includes("Employee Code")?(i(),u("div",Te,[n("p",Ae,g(o[s]?o[s]:"-"),1)])):s.includes("Legal Entity")?(i(),u("div",Ce,[n("p",Ie,g(o[s]?o[s]:"-"),1)])):s.includes("Loan Type")?(i(),u("div",{key:2,class:w([m(r).isExistsOrNot(x,o[s].toUpperCase())?"bg-red-100 p-2 rounded-lg":""])},[n("p",ke,g(o[s]?o[s]:"-"),1)],2)):s.includes("Category")?(i(),u("div",Ve,[n("p",Re,g(o[s]?o[s]:"-"),1)])):s.includes("Loan Amount")?(i(),u("div",{key:4,class:w([m(r).loanAmount(o[s])?"bg-red-100 p-2 rounded-lg":""])},[n("p",De,g(o[s]?o[s]:"-"),1)],2)):s.includes("Balance")?(i(),u("div",{key:5,class:w([m(r).findBalanceAmount(o[s],o["Loan Amount"],o["Repayment Made"])?"bg-red-100 p-2 rounded-lg":""])},[n("p",Fe,g(o[s]?o[s]:"-"),1)],2)):s.includes("EMI")?(i(),u("div",{key:6,class:w([m(r).findEmiCalculation(o[s],o.Balance,o.Tenure)?"bg-red-100 p-2 rounded-lg":""])},[n("p",Le,g(o[s]?o[s]:"-"),1)],2)):(i(),u("p",Oe,g(o[s]?o[s]:"-"),1))]),editor:R(({data:o,field:s})=>[F(f,{modelValue:o[s],"onUpdate:modelValue":B=>o[s]=B},null,8,["modelValue","onUpdate:modelValue"])]),_:2},1032,["field","header"]))),128))]),_:1},8,["value","rows"])])],64)}}};const Me={__name:"salary_advance_excel_import",setup(L){return we,X(),Q(),l(null),_e(),(r,d)=>{const x=N("Toast");return N("Column"),N("DataTable"),i(),u(U,null,[F(x),ye("",!0),F(Be)],64)}}},Pe=me(Me,[["__scopeId","data-v-5a3198a5"]]);export{Pe as default};
