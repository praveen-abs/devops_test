/* empty css              *//* empty css                   *//* empty css                 */import{Q as c,g as E,o as p,c as m,d as r,aa as d,h as N,w as A,F as j,f as ce,b as ie,t as T,n as O,l as pe,am as de,a as ue,T as me,ac as fe,ad as _e,H as ye,P as ve,R as ge,u as be,x as he,I as Se,K as xe,M as Te,J as Ee,L as Ce}from"./inputnumber.esm-e362c3ab.js";import{d as we,c as Ne}from"./pinia-641035e3.js";import{u as Ae,a as X,T as Ie,B as $e,S as De,b as ke,s as Re}from"./toastservice.esm-8d63d505.js";import"./blockui.esm-da95937b.js";import{a as Ve}from"./datatable.esm-5f85e77a.js";import{D as Oe,s as Be}from"./dialogservice.esm-acafdb8a.js";import{C as Fe}from"./confirmationservice.esm-62abe3ae.js";import{s as Pe}from"./progressspinner.esm-dd1a9f95.js";import{s as Le}from"./row.esm-6ebc942e.js";import{s as Me}from"./calendar.esm-871de032.js";import{s as Ue}from"./textarea.esm-36dc9b1f.js";import{s as je}from"./chips.esm-94e18b40.js";import{s as He}from"./multiselect.esm-774f4ea4.js";import{s as Ke}from"./selectbutton.esm-5571bcb8.js";import{s as ze}from"./radiobutton.esm-c9a3c1dd.js";import{s as We}from"./checkbox.esm-71be7f27.js";import{s as qe}from"./organizationchart.esm-a73c3d43.js";import{u as Ge,a as Je}from"./vue-router-7a52ee16.js";import{a as Qe}from"./index-362795f3.js";import{r as Ye,u as B}from"./xlsx-4ad528ac.js";import"./dayjs.min-2f06af28.js";import{S as Z}from"./Service-4ef425c0.js";import{_ as Xe}from"./_plugin-vue_export-helper-c27b6911.js";const ee=we("useImportSalaryAdvance",()=>{Ge();const v=c(!1),l=Ae(),f=c(),C=c(),h=c(),u=c([]),_=c([]);c(!1),c(!1);const g=c(),F=c(),S=e=>{h.value=e.target.files[0]},t=(e,a)=>{if(e){var n=e.target.files[0];if(!n)return;var x=new FileReader;x.onload=function(I){const w=x.result;var k=Ye(w,{type:"binary",cellDates:!0,dateNF:"dd-mm-yyyy"}),Y=k.Sheets[k.SheetNames[0]];let L=[];const R={},M=B.decode_range(Y["!ref"]);let b;const le=M.s.r;for(b=M.s.c;b<=M.e.c;++b){const y=Y[B.encode_cell({c:b,r:le})];let D="UNKNOWN "+b;y&&y.t&&(D=B.format_cell(y)),R[b]=D;let U={title:R[b],value:R[b]};R[b].includes("UNKNOWN")||L.push(U)}C.value=L,console.log(L);const $=k.SheetNames.reduce((y,D)=>{const U=k.Sheets[D];return y[D]=B.sheet_to_json(U,{raw:!1,dateNF:"dd-mm-yyyy"}),y},{}),V=Object.keys($)[0];$[V]?f.value=$[V]:f.value=[],f.value&&J(f.value),u.value.push(f.value);for(let y=0;y<$[V].length;y++)console.log("jsonData['Sheet1'].length :",$[V].length),Q(f.value[y])},x.readAsArrayBuffer(n)}else l.add({severity:"error",summary:"file missing!",detail:"selected",life:2e3})},o=e=>{let a="/imporExistingSalaryAdvanceData";_.value==0?(v.value=!0,Qe.post(a,e).then(n=>{v.value=!1,n.data.status=="failure"?l.add({severity:"error",summary:"failure",detail:`${n.data.message}`,life:3e3}):n.data.status=="success"&&(n.data.data.forEach(x=>{l.add({severity:"success",summary:`${x.Employee_Name}`,detail:`${x.message}`,life:3e3})}),setTimeout(()=>{window.location.replace(window.location.origin+"/manageEmployees")},4e3))}).finally(()=>{})):l.add({severity:"error",summary:"Failure!",detail:"Clear error fields",life:3e3})};function P(e){return e.filter((a,n)=>e.indexOf(a)!==n)}let H=c([]),K=c([]),z=c([]),W=c([]),q=c([]),G=c([]);const J=e=>{e.forEach(a=>{H.value.push(a["Employee Code"]),K.value.push(a.Email),z.value.push(a["Mobile Number"]),W.value.push(a["Pan No"]),q.value.push(a.Aadhar),G.value.push(a["Account No"])})},oe=(e,a)=>!!P(e).includes(a),se=(e,a)=>(console.log(a),!!e.includes(a)),te=e=>i(e)<=0,ae=c([{id:"1",name:"Salary advance"},{id:"2",name:"Interest free loan"},{id:"3",name:"Travel advance"},{id:"4",name:"Interest with loan"}]),ne=(e,a,n)=>{if(console.log({balance:e,loanAmt:a,Repayment:n}),console.log(`loanAmount${i(a)}`),console.log(`repaymentAmount${i(n)}`),e){let w;var I=/\d/.test(n);return I?(w=i(a)-i(n),i(e)!=w):(w=i(a),console.log("======Balance====="+w),i(e)!=w)}console.log(i(e)==balance)},re=(e,a,n)=>{if(console.log({emi:e,balance:a,tenure:n}),e){let I=i(a)/i(n);return console.log("Actual emi:"+i(e)),console.log("subbed emi:"+I),i(e)!=I}},i=e=>{if(e){console.log(e.split(".")[0]);var a=e.split(".")[0],n=a.match(/\d/g);if(n)return n=n.join(""),console.log(`convertRupeeIntoNumber${n}`),parseInt(n)}},Q=e=>(console.log(g.value),[]);return{getCurrentlyImportedTableDuplicateEntries:J,currentlyImportedTableEmployeeCodeValues:H,findCurrentTableDups:oe,uploadOnboardingFile:o,type:F,currentlyImportedTableAadharValues:q,currentlyImportedTablePanValues:W,currentlyImportedTableAccNoValues:G,currentlyImportedTableEmailValues:K,currentlyImportedTableMobileNumberValues:z,loanAmount:te,loanTypes:ae,findBalanceAmount:ne,findEmiCalculation:re,isExistsOrNot:se,convertExcelIntoArray:t,EmployeeSalaryAdvanceDynamicHeader:C,EmployeeSalaryAdvanceSource:f,getValidationMessages:Q,getExcelForUpload:S,canShowloading:v}}),Ze={class:"grid w-10/12 grid-cols-3 mx-auto my-2 place-content-center"},eo={class:"flex"},oo=r("label",{class:"p-2 font-semibold border-gray-500 rounded-lg cursor-pointer border-1 fs-6",for:"file"},[r("i",{class:"px-2 pi pi-folder",style:{"font-size":"1rem"}}),pe("Browse")],-1),so=de('<div class="p-2 mx-6 font-semibold text-black bg-white rounded-lg fs-6">Total Records : <span class="font-bold"> 2324 </span></div><div class="p-2 mx-6 font-semibold text-black bg-green-100 rounded-lg fs-6">Processed Records : <span class="font-bold"> 2342 </span></div><div class="p-2 mx-6 font-semibold text-black bg-red-100 rounded-lg fs-6">Error Records : <span class="font-bold"> 12313 </span></div>',3),to=r("div",{class:"py-5"},[r("p",{class:"font-semibold fs-6"},"Sample format:"),r("div",{class:"table-responsive"})],-1),ao={class:"table-responsive"},no=r("p",{class:"font-semibold fs-6"},"Original data:",-1),ro={key:0},lo={class:"font-semibold fs-6"},co={key:1},io={class:"font-semibold fs-6"},po={class:"font-semibold fs-6"},uo={key:3},mo={class:"font-semibold fs-6"},fo={class:"font-semibold fs-6"},_o={class:"font-semibold fs-6"},yo={class:"font-semibold fs-6"},vo={key:7,class:"font-semibold fs-6"},go={__name:"import_salary_advance",setup(v){Z();const l=ee(),f=h=>{let{data:u,newValue:_,field:g}=h;switch(g){case"quantity":case"price":isPositiveInteger(_)?u[g]=_:h.preventDefault();break;default:_.trim().length>0?u[g]=_:h.preventDefault();break}},C=["SALARY ADVANCE","INTEREST FREE LOAN","TRAVEL ADVANCE","INTEREST wITH LOAN"];return(h,u)=>{const _=E("InputText"),g=E("Column"),F=E("DataTable");return p(),m(j,null,[r("div",Ze,[r("div",eo,[oo,r("input",{type:"file",name:"",id:"file",hidden:"",onChange:u[0]||(u[0]=S=>d(l).convertExcelIntoArray(S)),accept:".xls, .xlsx"},null,32)]),so]),to,r("div",ao,[no,N(F,{class:"py-4",value:d(l).EmployeeSalaryAdvanceSource,tableStyle:" min-width: 50rem",responsiveLayout:"scroll",stateStorage:"session",stateKey:"dt-state-demo-session",editMode:"cell",onCellEditComplete:f,rows:d(l).EmployeeSalaryAdvanceSource},{footer:A(()=>[r("button",{class:"flex justify-center mx-auto btn btn-orange",onClick:u[1]||(u[1]=S=>d(l).uploadOnboardingFile(d(l).EmployeeSalaryAdvanceSource))},"Upload")]),default:A(()=>[(p(!0),m(j,null,ce(d(l).EmployeeSalaryAdvanceDynamicHeader,S=>(p(),ie(g,{key:S.title,field:S.title,style:{"min-width":"12rem"},header:S.title},{body:A(({data:t,field:o})=>[o.includes("Employee Code")?(p(),m("div",ro,[r("p",lo,T(t[o]?t[o]:"-"),1)])):o.includes("Legal Entity")?(p(),m("div",co,[r("p",io,T(t[o]?t[o]:"-"),1)])):o.includes("Loan Type")?(p(),m("div",{key:2,class:O([d(l).isExistsOrNot(C,t[o].toUpperCase())?"bg-red-100 p-2 rounded-lg":""])},[r("p",po,T(t[o]?t[o]:"-"),1)],2)):o.includes("Category")?(p(),m("div",uo,[r("p",mo,T(t[o]?t[o]:"-"),1)])):o.includes("Loan Amount")?(p(),m("div",{key:4,class:O([d(l).loanAmount(t[o])?"bg-red-100 p-2 rounded-lg":""])},[r("p",fo,T(t[o]?t[o]:"-"),1)],2)):o.includes("Balance")?(p(),m("div",{key:5,class:O([d(l).findBalanceAmount(t[o],t["Loan Amount"],t["Repayment Made"])?"bg-red-100 p-2 rounded-lg":""])},[r("p",_o,T(t[o]?t[o]:"-"),1)],2)):o.includes("EMI")?(p(),m("div",{key:6,class:O([d(l).findEmiCalculation(t[o],t.Balance,t.Tenure)?"bg-red-100 p-2 rounded-lg":""])},[r("p",yo,T(t[o]?t[o]:"-"),1)],2)):(p(),m("p",vo,T(t[o]?t[o]:"-"),1))]),editor:A(({data:t,field:o})=>[N(_,{modelValue:t[o],"onUpdate:modelValue":P=>t[o]=P},null,8,["modelValue","onUpdate:modelValue"])]),_:2},1032,["field","header"]))),128))]),_:1},8,["value","rows"])])],64)}}};const bo=v=>(fe("data-v-c0ec8e53"),v=v(),_e(),v),ho=bo(()=>r("h5",{style:{"text-align":"center"}},"Please wait...",-1)),So={__name:"salary_advance_excel_import",setup(v){const l=ee();return Z(),c(null),Je(),(f,C)=>{const h=E("Toast");E("Column"),E("DataTable");const u=E("ProgressSpinner"),_=E("Dialog");return p(),m(j,null,[N(h),ue("",!0),N(me,{name:"fade",mode:"out-in"},{default:A(()=>[N(_,{header:"Header",visible:d(l).canShowloading,"onUpdate:visible":C[2]||(C[2]=g=>d(l).canShowloading=g),breakpoints:{"960px":"75vw","640px":"90vw"},style:{width:"25vw"},modal:!0,closable:!1,closeOnEscape:!1},{header:A(()=>[N(u,{style:{width:"50px",height:"50px"},strokeWidth:"8",fill:"var(--surface-ground)",animationDuration:"2s","aria-label":"Custom ProgressSpinner"})]),footer:A(()=>[ho]),_:1},8,["visible"])]),_:1}),N(go)],64)}}},xo=Xe(So,[["__scopeId","data-v-c0ec8e53"]]),s=ye(xo),To=Ne();s.use(ve,{ripple:!0});s.use(Fe);s.use(X);s.use(Oe);s.use(X);s.use(To);s.directive("tooltip",Ie);s.directive("badge",$e);s.directive("ripple",ge);s.directive("styleclass",De);s.directive("focustrap",be);s.component("Button",he);s.component("RadioButton",ze);s.component("DataTable",Ve);s.component("Column",Se);s.component("ColumnGroup",Be);s.component("Row",Le);s.component("Toast",ke);s.component("ConfirmDialog",Re);s.component("Dropdown",xe);s.component("InputText",Te);s.component("Dialog",Ee);s.component("ProgressSpinner",Pe);s.component("Calendar",Me);s.component("Textarea",Ue);s.component("Chips",je);s.component("MultiSelect",He);s.component("InputNumber",Ce);s.component("SelectButton",Ke);s.component("Checkbox",We);s.component("OrganizationChart",qe);s.mount("#salary_advance_excel_import");
