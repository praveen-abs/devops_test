import{p as ne,u as re,r,x as ce,b as E,d as i,e as p,f as l,g as d,m as N,k as w,F as j,l as ie,j as de,t as S,n as O,h as ue,A as pe,_ as me,a as _e,i as fe,T as ye,D as ve,E as ge}from"./app-0f1d8729.js";import{a as be}from"./index-362795f3.js";import{r as he,u as F}from"./xlsx-4ad528ac.js";import"./dayjs.min-2f06af28.js";import{S as Q}from"./Service-8c132ee2.js";const X=ne("useImportSalaryAdvance",()=>{re();const y=r(!1),n=ce(),m=r(),T=r(),b=r(),u=r([]),_=r([]);r(!1),r(!1);const v=r(),L=r(),h=e=>{b.value=e.target.files[0]},o=(e,t)=>{if(e){var a=e.target.files[0];if(!a)return;var x=new FileReader;x.onload=function(C){const A=x.result;var D=he(A,{type:"binary",cellDates:!0,dateNF:"dd-mm-yyyy"}),J=D.Sheets[D.SheetNames[0]];let M=[];const V={},P=F.decode_range(J["!ref"]);let g;const le=P.s.r;for(g=P.s.c;g<=P.e.c;++g){const f=J[F.encode_cell({c:g,r:le})];let k="UNKNOWN "+g;f&&f.t&&(k=F.format_cell(f)),V[g]=k;let U={title:V[g],value:V[g]};V[g].includes("UNKNOWN")||M.push(U)}T.value=M,console.log(M);const I=D.SheetNames.reduce((f,k)=>{const U=D.Sheets[k];return f[k]=F.sheet_to_json(U,{raw:!1,dateNF:"dd-mm-yyyy"}),f},{}),R=Object.keys(I)[0];I[R]?m.value=I[R]:m.value=[],m.value&&Y(m.value),u.value.push(m.value);for(let f=0;f<I[R].length;f++)console.log("jsonData['Sheet1'].length :",I[R].length),G(m.value[f])},x.readAsArrayBuffer(a)}else n.add({severity:"error",summary:"file missing!",detail:"selected",life:2e3})},s=e=>{let t="/imporExistingSalaryAdvanceData";_.value==0?(y.value=!0,be.post(t,e).then(a=>{y.value=!1,a.data.status=="failure"?n.add({severity:"error",summary:"failure",detail:`${a.data.message}`,life:3e3}):a.data.status=="success"&&(a.data.data.forEach(x=>{n.add({severity:"success",summary:`${x.Employee_Name}`,detail:`${x.message}`,life:3e3})}),setTimeout(()=>{window.location.replace(window.location.origin+"/manageEmployees")},4e3))}).finally(()=>{})):n.add({severity:"error",summary:"Failure!",detail:"Clear error fields",life:3e3})};function $(e){return e.filter((t,a)=>e.indexOf(t)!==a)}let B=r([]),H=r([]),K=r([]),W=r([]),z=r([]),q=r([]);const Y=e=>{e.forEach(t=>{B.value.push(t["Employee Code"]),H.value.push(t.Email),K.value.push(t["Mobile Number"]),W.value.push(t["Pan No"]),z.value.push(t.Aadhar),q.value.push(t["Account No"])})},Z=(e,t)=>!!$(e).includes(t),ee=(e,t)=>(console.log(t),!!e.includes(t)),se=e=>c(e)<=0,oe=r([{id:"1",name:"Salary advance"},{id:"2",name:"Interest free loan"},{id:"3",name:"Travel advance"},{id:"4",name:"Interest with loan"}]),te=(e,t,a)=>{if(console.log({balance:e,loanAmt:t,Repayment:a}),console.log(`loanAmount${c(t)}`),console.log(`repaymentAmount${c(a)}`),e){let A;var C=/\d/.test(a);return C?(A=c(t)-c(a),c(e)!=A):(A=c(t),console.log("======Balance====="+A),c(e)!=A)}console.log(c(e)==balance)},ae=(e,t,a)=>{if(console.log({emi:e,balance:t,tenure:a}),e){let C=c(t)/c(a);return console.log("Actual emi:"+c(e)),console.log("subbed emi:"+C),c(e)!=C}},c=e=>{if(e){console.log(e.split(".")[0]);var t=e.split(".")[0],a=t.match(/\d/g);if(a)return a=a.join(""),console.log(`convertRupeeIntoNumber${a}`),parseInt(a)}},G=e=>(console.log(v.value),[]);return{getCurrentlyImportedTableDuplicateEntries:Y,currentlyImportedTableEmployeeCodeValues:B,findCurrentTableDups:Z,uploadOnboardingFile:s,type:L,currentlyImportedTableAadharValues:z,currentlyImportedTablePanValues:W,currentlyImportedTableAccNoValues:q,currentlyImportedTableEmailValues:H,currentlyImportedTableMobileNumberValues:K,loanAmount:se,loanTypes:oe,findBalanceAmount:te,findEmiCalculation:ae,isExistsOrNot:ee,convertExcelIntoArray:o,EmployeeSalaryAdvanceDynamicHeader:T,EmployeeSalaryAdvanceSource:m,getValidationMessages:G,getExcelForUpload:h,canShowloading:y}}),xe={class:"grid w-10/12 grid-cols-3 mx-auto my-2 place-content-center"},Se={class:"flex"},Ee=l("label",{class:"p-2 font-semibold border-gray-500 rounded-lg cursor-pointer border-1 fs-6",for:"file"},[l("i",{class:"px-2 pi pi-folder",style:{"font-size":"1rem"}}),ue("Browse")],-1),Te=pe('<div class="p-2 mx-6 font-semibold text-black bg-white rounded-lg fs-6">Total Records : <span class="font-bold"> 2324 </span></div><div class="p-2 mx-6 font-semibold text-black bg-green-100 rounded-lg fs-6">Processed Records : <span class="font-bold"> 2342 </span></div><div class="p-2 mx-6 font-semibold text-black bg-red-100 rounded-lg fs-6">Error Records : <span class="font-bold"> 12313 </span></div>',3),Ae=l("div",{class:"py-5"},[l("p",{class:"font-semibold fs-6"},"Sample format:"),l("div",{class:"table-responsive"})],-1),Ne={class:"table-responsive"},we=l("p",{class:"font-semibold fs-6"},"Original data:",-1),Ce={key:0},Ie={class:"font-semibold fs-6"},ke={key:1},De={class:"font-semibold fs-6"},Ve={class:"font-semibold fs-6"},Re={key:3},Oe={class:"font-semibold fs-6"},Fe={class:"font-semibold fs-6"},Le={class:"font-semibold fs-6"},$e={class:"font-semibold fs-6"},Me={key:7,class:"font-semibold fs-6"},Pe={__name:"import_salary_advance",setup(y){Q();const n=X(),m=b=>{let{data:u,newValue:_,field:v}=b;switch(v){case"quantity":case"price":isPositiveInteger(_)?u[v]=_:b.preventDefault();break;default:_.trim().length>0?u[v]=_:b.preventDefault();break}},T=["SALARY ADVANCE","INTEREST FREE LOAN","TRAVEL ADVANCE","INTEREST wITH LOAN"];return(b,u)=>{const _=E("InputText"),v=E("Column"),L=E("DataTable");return i(),p(j,null,[l("div",xe,[l("div",Se,[Ee,l("input",{type:"file",name:"",id:"file",hidden:"",onChange:u[0]||(u[0]=h=>d(n).convertExcelIntoArray(h)),accept:".xls, .xlsx"},null,32)]),Te]),Ae,l("div",Ne,[we,N(L,{class:"py-4",value:d(n).EmployeeSalaryAdvanceSource,tableStyle:" min-width: 50rem",responsiveLayout:"scroll",stateStorage:"session",stateKey:"dt-state-demo-session",editMode:"cell",onCellEditComplete:m,rows:d(n).EmployeeSalaryAdvanceSource},{footer:w(()=>[l("button",{class:"flex justify-center mx-auto btn btn-orange",onClick:u[1]||(u[1]=h=>d(n).uploadOnboardingFile(d(n).EmployeeSalaryAdvanceSource))},"Upload")]),default:w(()=>[(i(!0),p(j,null,ie(d(n).EmployeeSalaryAdvanceDynamicHeader,h=>(i(),de(v,{key:h.title,field:h.title,style:{"min-width":"12rem"},header:h.title},{body:w(({data:o,field:s})=>[s.includes("Employee Code")?(i(),p("div",Ce,[l("p",Ie,S(o[s]?o[s]:"-"),1)])):s.includes("Legal Entity")?(i(),p("div",ke,[l("p",De,S(o[s]?o[s]:"-"),1)])):s.includes("Loan Type")?(i(),p("div",{key:2,class:O([d(n).isExistsOrNot(T,o[s].toUpperCase())?"bg-red-100 p-2 rounded-lg":""])},[l("p",Ve,S(o[s]?o[s]:"-"),1)],2)):s.includes("Category")?(i(),p("div",Re,[l("p",Oe,S(o[s]?o[s]:"-"),1)])):s.includes("Loan Amount")?(i(),p("div",{key:4,class:O([d(n).loanAmount(o[s])?"bg-red-100 p-2 rounded-lg":""])},[l("p",Fe,S(o[s]?o[s]:"-"),1)],2)):s.includes("Balance")?(i(),p("div",{key:5,class:O([d(n).findBalanceAmount(o[s],o["Loan Amount"],o["Repayment Made"])?"bg-red-100 p-2 rounded-lg":""])},[l("p",Le,S(o[s]?o[s]:"-"),1)],2)):s.includes("EMI")?(i(),p("div",{key:6,class:O([d(n).findEmiCalculation(o[s],o.Balance,o.Tenure)?"bg-red-100 p-2 rounded-lg":""])},[l("p",$e,S(o[s]?o[s]:"-"),1)],2)):(i(),p("p",Me,S(o[s]?o[s]:"-"),1))]),editor:w(({data:o,field:s})=>[N(_,{modelValue:o[s],"onUpdate:modelValue":$=>o[s]=$},null,8,["modelValue","onUpdate:modelValue"])]),_:2},1032,["field","header"]))),128))]),_:1},8,["value","rows"])])],64)}}};const Ue=y=>(ve("data-v-c0ec8e53"),y=y(),ge(),y),je=Ue(()=>l("h5",{style:{"text-align":"center"}},"Please wait...",-1)),Be={__name:"salary_advance_excel_import",setup(y){const n=X();return Q(),r(null),_e(),(m,T)=>{const b=E("Toast");E("Column"),E("DataTable");const u=E("ProgressSpinner"),_=E("Dialog");return i(),p(j,null,[N(b),fe("",!0),N(ye,{name:"fade",mode:"out-in"},{default:w(()=>[N(_,{header:"Header",visible:d(n).canShowloading,"onUpdate:visible":T[2]||(T[2]=v=>d(n).canShowloading=v),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:w(()=>[N(u,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:w(()=>[je]),_:1},8,["visible"])]),_:1}),N(Pe)],64)}}},Ye=me(Be,[["__scopeId","data-v-c0ec8e53"]]);export{Ye as default};
