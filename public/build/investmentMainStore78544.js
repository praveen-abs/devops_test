import{a as y}from"./index78544.js";import{d as fe}from"./pinia78544.js";import{a0 as l,ai as et,a3 as b}from"./toastservice.esm78544.js";import{u as tt}from"./confirmationservice.esm78544.js";import{S as lt}from"./Service78544.js";import{a as nt}from"./autoprefixer78544.js";import{d as N}from"./dayjs.min78544.js";const at=fe("investmentFormulaStore",()=>{const M=l(),_=(t,r,x)=>{if(console.log("total income :"+t),console.log("employee age:"+x),r=="old"){if(x<60)if(t<=25e4){console.log("taxable income is zero");let n=0;return console.log("taxable_amount :"+Math.floor(n)),n}else if(t>25e4&&t<=5e5){let s=(t-25e4)*5/100;console.log("Tax On Income"+s);let i=Math.round(s+12500),d=i*4/100;return console.log("child Eduction :"+d),console.log("taxable_amount :"+i+d),i+d}else if(t>5e5&&t<=1e6){let s=(t-5e5)*20/100;console.log("Tax On Income"+s);let i=Math.round(s+12500),d=s*4/100;return console.log("child Eduction :"+d),console.log("taxable_amount :"+Math.round(i+d)),i+d}else if(t>1e6){let n="",s=0,d=(t-1e6)*30/100;console.log("---------------------------------------------"),console.log("Tax On Income"+d);let g=Math.round(d+112500);if(n=f(t),n){s=(d+n)*4/100,console.log("child Eduction :"+Math.round(s)),console.log("surchage"+Math.round(n));let S=parseInt(g)+parseInt(n)+parseInt(s);return console.log("taxable_amount :"+Math.round(S)),Math.round(S)}else{s=g*4/100,console.log("child Eduction :"+Math.round(s));let S=g+s;return Math.round(S)}}else return console.log("Salary Is Less Than 250000"),t;else if(x>=60&&x<=80)if(t>3e5&&t<=5e5){let s=(t-3e5)*5/100;console.log("Tax On Income"+s);let i=s*4/100;console.log("child Eduction :"+i);let d=Math.round(s+i);return console.log("taxable_amount :"+d),d}else if(t>5e5&&t<1e6){let s=(t-5e5)*20/100;console.log("Tax On Income"+s);let i=s*4/100;console.log("child Eduction :"+i);let d=Math.round(s+1e4+i);return console.log("taxable_amount :"+d),d}else if(t>1e6){console.log("working");let s=(t-1e6)*30/100;console.log("Tax On Income"+s);let i=Math.floor(s+11e4),d=f(t),g=(s+d)*4/100;console.log("child Eduction :"+g);let S=i+d+g;return console.log("taxable_amount :"+S),S}else return console.log("Salary Is Less Than 300000"),t;else if(x>80)if(t>5e5&&t<=1e6){let s=(t-5e5)*20/100;console.log("taxable_amount :"+Math.round(s))}else if(t>1e6){let s=(t-1e6)*30/100;console.log("Tax On Income"+s);let i=Math.floor(s+112500),d=f(t),g=(s+d)*4/100;console.log("child Eduction :"+g);let S=i+d+g;return console.log("taxable_amount :"+S),S}else return console.log("Salary Is Less Than 500000"),t}else if(r=="new")if(t>3e5&&t<=6e5){let n=t*5/100;return console.log("taxable_amount :"+Math.floor(n)),console.log("new regime total income greater than 300001"),Math.floor(n)}else if(t>6e5&&t<=9e5){let n=t*10/100;return console.log("taxable_amount :"+Math.floor(15e3+n)),console.log("new regime total income greater than 600001"),M.value=Math.floor(n),Math.floor(15e3+n)}else if(t>9e5&&t<=12e5){let n=t*15/100;return console.log("taxable_amount :"+Math.floor(45e3+n)),console.log("new regime total income greater than 900001 "),Math.floor(45e3+n)}else if(t>12e5&&t<15e5){let n=t*20/100;return console.log("taxable_amount :"+Math.floor(9e4+n)),console.log("new regime total income greater than 1200001"),M.value=Math.floor(n),Math.floor(9e4+n)}else if(t>15e5){let n=t*30/100,s=Math.floor(n+15e4),i=f(t),d=(s+i)*4/100,g=s+i+d;return console.log("taxable_amount :"+g),g}else{let n=0;return console.log("less than 300000 "),n}else console.log("No More Regime")},K=t=>{const r=t*4/100;return console.log("Child Education:"+r),r},f=t=>{if(t>=5e6&&t<1e7){let r=t*10/100;return console.log("Subcharge:"+r),r}else if(t>=1e7&&t<2e7){let r=t*15/100;return console.log("Subcharge:"+r),r}else if(t>=2e7&&t<5e7){let r=t*25/100;return console.log("Subcharge:"+r),r}else if(t>5e7){let r=t*37/100;return console.log("Subcharge:"+r),r}else console.log("Total Income is Less than 5000000")};return{taxCalculation:_,maintenance_cal:(t,r,x)=>(r-x)*30/100,net_value_cal:(t,r,x)=>t-r-x,income_loss_cal:(t,r)=>r-t,tax_amt:M,subChargeCalculation:f,calChildEducation:K}}),ct=fe("investmentMainStore",()=>{const M=at(),_=lt(),K=l(),f=et(),z=l(!1),H=tt(),Q=l(1),t=l(!1),r=b({max_limit:0,declared_amt:0,status:"Not Submited",Date_of_submission:""}),x=l(),n=b([]),s=l(),i=l(),d=l(),g=l(),S=l(),X=l(),Z=l(),w=l(),R=l(),ee=l(),te=l(),le=l(),Y=b([]),C=b([]),D=b([]),J=l(!1),ne=l(),ae=l(!0),oe=l(),se=l(),ue=l(),re=l(),j=async()=>{let e="/investments/investments-form-details-template";t.value=!0,await y.post(e,{form_name:"investment 1"}).then(u=>{x.value=u.data.data.form_details,S.value=u.data.data.form_details.HRA,X.value=u.data.data.form_details["Section 80C & 80CC "],Z.value=u.data.data.form_details["Other Excemptions "],R.value=u.data.data.form_details["House Properties "],ee.value=u.data.data.form_details["Reimbersument "],te.value=u.data.data.form_details["Other Source Of  Income"],le.value=u.data.data.form_details["Previous Employer Income"];let E=u.data.data.is_submitted==0;ae.value=E,se.value=u.data.data.emp_epf,ue.value=u.data.data.emp_vpf,re.value=u.data.data.emp_vpf,console.log(E),ne.value=u.data.data.doj,console.log("employee DOJ"+u.data.data.doj),u.data.data.form_details["House Properties "].forEach(I=>{Y.push(I.fs_id)}),u.data.data.form_details.HRA.forEach(I=>{D.push(I.fs_id),console.log(D[0])});let T=u.data.data.form_details["Other Excemptions "].filter(function(I){return I.section=="80EE"}),we=u.data.data.form_details["Other Excemptions "].filter(function(I){return I.section=="80EEA"}),Re=u.data.data.form_details["Other Excemptions "].filter(function(I){return I.section=="80EEB"});C.push(T[0].fs_id),C.push(we[0].fs_id),C.push(Re[0].fs_id)}).catch(u=>console.log(u)).finally(()=>{t.value=!1,O(),P(),L(),setTimeout(()=>{Y.splice(0,Y.length)},1e3),setTimeout(()=>{C.splice(0,C.length)},1e3)})},he=e=>{console.log(e),i.value=1;var u={fs_id:e.fs_id,declaration_amount:e.dec_amt,select_option:e.select_option};e.dec_amt?n.push(u):console.log("Declaration Amount Null");var E=new FormData;for(var T in u)E.append(T,u[T]);console.log(E),e.dec_amt>e.max_amount?f.add({severity:"error",summary:"Waring",detail:"Declaration amount is greater than Maximum Limit",life:3e3}):console.log("working")},ye=()=>{console.log(n),t.value=!0,console.log("code:"+_.current_user_code),console.log("Form Id:"+i.value);let e="/investments/saveEmpdetails";y.post(e,{user_code:_.current_user_code,form_id:i.value,is_submitted:0,formDataSource:n}).finally(()=>{t.value=!1,f.add({severity:"success",summary:"Saved",detail:"Data Saved Successfull",life:3e3}),j(),n.splice(0,n.length),r.status="Drafed",A(),_e()})},ge=()=>{let e="/investments/saveEmpdetails";y.post(e,{user_code:_.current_user_code,is_submitted:1}).then(u=>{console.log(u.data)}).finally(()=>{z.value=!0,setTimeout(()=>{window.location.reload()},2e3)})},Ee=e=>{let u=new Intl.NumberFormat("en-US",{style:"currency",currency:"INR"}).format(e);return`${u.charAt(0)} ${u.substring(1,u.length)}`},de=l(),be=l(),m=b({id:"",user_code:"",fs_id:"",from_month:"",to_month:"",city:"",total_rent_paid:"",landlord_name:"",landlord_PAN:"",address:""}),V=l(!1),xe=l(!1),L=async()=>{console.log(Object.values(D[0])),await y.post("/investments/fetchEmpRentalDetails",{user_code:_.current_user_code,fs_id:D[0]}).then(e=>{e.data&&(de.value=Object.values(e.data.rent_details)),oe.value=e.data.dec_amt[0].sumofRentPaid,Object.values(e.data).length==0?J.value=!1:J.value=!0}).catch(e=>console.log(e)).finally(()=>{t.value=!1})},Se=e=>{console.log(e),V.value=!0,m.id=e.id,m.from_month=N(e.json_popups_value.from_month).format("DD-MM-YYYY"),m.to_month=N(e.json_popups_value.to_month).format("DD-MM-YYYY"),m.address=e.json_popups_value.address,m.city=e.json_popups_value.city,m.landlord_PAN=e.json_popups_value.landlord_PAN,m.landlord_name=e.json_popups_value.landlord_name,m.total_rent_paid=e.json_popups_value.total_rent_paid},je=l(!1),Me=()=>{m.user_code=_.current_user_code,m.fs_id=D[0],t.value=!0,V.value=!1,y.post("/investments/saveSectionPopups",m).then(e=>{f.add({severity:"success",summary:"Drafted",detail:"New Rental Added",life:3e3})}).catch(e=>console.log(e)).finally(()=>{t.value=!1,L(),j(),r.status="Drafed",A()})},Pe=e=>{H.require({message:"Do you want to delete this record?",header:"Delete Confirmation",icon:"pi pi-info-circle",acceptClass:"p-button-danger",accept:()=>{t.value=!0,y.post("/investments/deleteHousePropertyDetails",{current_table_id:e.id}).finally(()=>{t.value=!1,f.add({severity:"error",summary:"Deleted",detail:"House Rented Allowance Deleted",life:3e3}),L(),j()})},reject:()=>{}})};l(),b({EPF:"",VPF:"",PPF:"",LIP:"",SD_RCD:"",MD:"",NSC:"",ULIP:"",YTSFDR:"",DAP:"",SAP:"",SSY:"",STBIBNAR:"",SPF:""});const Oe=b({loan_sanction_date:"",lender_type:"",property_value:"",loan_amount:"",interest_amount_paid:"",vechicle_brand:"",vechicle_model:"",interest_amount_paid:""}),c=b({id:"",user_code:"",fs_id:"",loan_sanction_date:"",lender_type:"",property_value:"",loan_amount:"",interest_amount_paid:"",section:"80EE"}),p=b({id:"",user_code:"",fs_id:"",loan_sanction_date:"",lender_type:"",property_value:"",loan_amount:"",interest_amount_paid:"",section:"80EEA"}),v=b({id:"",user_code:"",fs_id:"",loan_sanction_date:"",lender_type:"",property_value:"",loan_amount:"",interest_amount_paid:"",vechicle_brand:"",vechicle_model:"",interest_amount_paid:"",section:"80EEB"}),F=l(!1),B=l(!1),$=l(!1),Ie=e=>{c.id=e.id,F.value=!0,c.user_code=_.current_user_code,c.fs_id=e.fs_id,P()},Ae=e=>{p.id=e.id,B.value=!0,p.user_code=_.current_user_code,p.fs_id=e.fs_id,P()},Ce=e=>{v.id=e.id,$.value=!0,v.user_code=_.current_user_code,v.fs_id=e.fs_id,P()},Te=l(),Ye=l(),De=l(),P=()=>{y.post("/investments/fetchOtherExemption",{user_code:_.current_user_code,otherExe:C}).then(e=>{w.value=Object.values(e.data)})},Ne=e=>{console.log(e),e.json_popups_value.section=="80EE"?(F.value=!0,c.fs_id=e.json_popups_value.fs_id,c.user_code=_.current_user_code,c.loan_sanction_date=N(e.json_popups_value.loan_sanction_date).format("YYYY-MM-DD"),c.lender_type=e.json_popups_value.lender_type,c.loan_amount=e.json_popups_value.loan_amount,c.property_value=e.json_popups_value.property_value,c.interest_amount_paid=e.json_popups_value.interest_amount_paid):e.json_popups_value.section=="80EEA"?(B.value=!0,p.fs_id=e.json_popups_value.fs_id,p.user_code=_.current_user_code,p.loan_sanction_date=N(e.json_popups_value.loan_sanction_date).format("YYYY-MM-DD"),p.lender_type=e.json_popups_value.lender_type,p.loan_amount=e.json_popups_value.loan_amount,p.property_value=e.json_popups_value.property_value,p.interest_amount_paid=e.json_popups_value.interest_amount_paid):e.json_popups_value.section=="80EEB"?(v.fs_id=e.json_popups_value.fs_id,v.user_code=_.current_user_code,$.value=!0,v.loan_sanction_date=N(e.json_popups_value.loan_sanction_date).format("YYYY-MM-DD"),v.vechicle_brand=e.json_popups_value.vechicle_brand,v.vechicle_model=e.json_popups_value.vechicle_model,v.interest_amount_paid=e.json_popups_value.interest_amount_paid):console.log("completed")},He=e=>{H.require({message:"Do you want to delete this record?",header:"Delete Confirmation",icon:"pi pi-info-circle",acceptClass:"p-button-danger",accept:()=>{t.value=!0,y.post("/investments/deleteHousePropertyDetails",{current_table_id:e.id}).finally(()=>{t.value=!1,f.add({severity:"error",summary:"Deleted",detail:`${e.json_popups_value.section} is Deleted`,life:3e3}),P(),j()})},reject:()=>{}})},Le=()=>{F.value=!1,t.value=!0,console.log(nt.data),y.post("/investments/saveSection80",c).then(e=>{f.add({severity:"success",summary:"Drafted",detail:"80EE Added",life:3e3})}).catch(e=>console.log(e)).finally(()=>{t.value=!1,j(),A(),P()})},Fe=()=>{B.value=!1,t.value=!0,y.post("/investments/saveSection80",p).then(e=>{t.value=!1,f.add({severity:"success",summary:"Drafted",detail:"80EEA Added",life:3e3})}).catch(e=>console.log(e)).finally(()=>{t.value=!1,j(),A(),P()})},Be=()=>{$.value=!1,t.value=!0,y.post("/investments/saveSection80",v).then(e=>{f.add({severity:"success",summary:"Drafted",detail:"80EEB Added",life:3e3})}).catch(e=>console.log(e)).finally(()=>{t.value=!1,j(),A(),P()})},ie=l(),U=l(!1),k=l(!1),q=l(!1),h=b({id:"",user_code:"",fs_id:"",lender_name:"",lender_pan:"",lender_type:"",income_loss:"",address:"",property_type:"Self Occupied Property"}),a=b({id:"",user_code:"",fs_id:"",lender_name:"",lender_pan:"",lender_type:"",loss_from_housing_property:"",address:"",rent_received:"",municipal_tax:"",maintenance:"",net_value:"",interest:"",income_loss:"",property_type:"Let Out Property"}),o=b({id:"",user_code:"",fs_id:"",lender_name:"",lender_pan:"",lender_type:"",loss_from_housing_property:"",address:"",rent_received:"",municipal_tax:"",maintenance:"",net_value:"",interest:"",income_loss:"",property_type:"Deemed Let Out Property"}),$e=()=>{const e=M.maintenance_cal(a.lender_type,a.rent_received,a.municipal_tax),u=M.maintenance_cal(o.lender_type,o.rent_received,o.municipal_tax);a.maintenance=e,o.maintenance=u;const E=M.net_value_cal(a.rent_received,a.municipal_tax,a.maintenance);a.net_value=E;const T=M.net_value_cal(o.rent_received,o.municipal_tax,o.maintenance);o.net_value=T,a.income_loss=M.income_loss_cal(a.interest,a.net_value),o.income_loss=M.income_loss_cal(o.interest,o.net_value)},O=()=>{y.post("/investments/fetchHousePropertyDetails",{user_code:_.current_user_code,hop:Y}).then(e=>{ie.value=Object.values(e.data)})},Ue=e=>{U.value=!0,console.log(e),h.user_code=_.current_user_code,h.fs_id=e.fs_id,O()},ke=e=>{k.value=!0,a.user_code=_.current_user_code,a.fs_id=e.fs_id,O()},qe=e=>{q.value=!0,o.user_code=_.current_user_code,o.fs_id=e.fs_id,O()},Ke=e=>{e.json_popups_value.property_type=="Self Occupied Property"?(h.user_code=_.current_user_code,h.fs_id=e.fs_id,h.id=e.id,U.value=!0,h.lender_name=e.json_popups_value.lender_name,h.lender_pan=e.json_popups_value.lender_pan,h.lender_type=e.json_popups_value.lender_type,h.loss_from_housing_property=e.json_popups_value.loss_from_housing_property,h.property_type=e.json_popups_value.property_type,h.address=e.json_popups_value.address):e.json_popups_value.property_type=="Let Out Property"?(k.value=!0,a.user_code=_.current_user_code,a.id=e.id,a.fs_id=e.fs_id,a.lender_name=e.json_popups_value.lender_name,a.lender_pan=e.json_popups_value.lender_pan,a.lender_type=e.json_popups_value.lender_type,a.rent_received=e.json_popups_value.rent_received,a.municipal_tax=e.json_popups_value.municipal_tax,a.maintenance=e.json_popups_value.maintenance,a.net_value=e.json_popups_value.net_value,a.interest=e.json_popups_value.interest,a.income_loss=e.json_popups_value.income_loss):e.json_popups_value.property_type=="Deemed Let Out Property"?(q.value=!0,o.user_code=_.current_user_code,o.fs_id=e.fs_id,o.id=e.id,o.lender_name=e.json_popups_value.lender_name,o.lender_pan=e.json_popups_value.lender_pan,o.lender_type=e.json_popups_value.lender_type,o.rent_received=e.json_popups_value.rent_received,o.municipal_tax=e.json_popups_value.municipal_tax,o.maintenance=e.json_popups_value.maintenance,o.net_value=e.json_popups_value.net_value,o.interest=e.json_popups_value.interest,o.income_loss=e.json_popups_value.income_loss):console.log("No more Property Type")},ze=e=>{H.require({message:"Do you want to delete this record?",header:"Delete Confirmation",icon:"pi pi-info-circle",acceptClass:"p-button-danger",accept:()=>{t.value=!0,y.post("/investments/deleteHousePropertyDetails",{current_table_id:e.id}).finally(()=>{t.value=!1,f.add({severity:"error",summary:"Deleted",detail:`${e.json_popups_value.property_type} is Deleted`,life:3e3}),O(),j()})},reject:()=>{console.log("House property Delete Action Rejected")}})},Je=()=>{t.value=!0,U.value=!1,y.post("/investments/saveSectionPopups",h).then(e=>{}).finally(()=>{O(),j(),t.value=!1,f.add({severity:"success",summary:"Saved",detail:`new ${h.property_type} is Drafted `,life:3e3}),A()})},Ve=()=>{t.value=!0,k.value=!1,y.post("/investments/saveSectionPopups",a).then(e=>{}).finally(()=>{O(),j(),t.value=!1,f.add({severity:"success",summary:"Saved",detail:`new ${a.property_type} is Drafted `,life:3e3}),A()})},We=()=>{t.value=!0,q.value=!1,y.post("/investments/saveSectionPopups",o).then(e=>{}).finally(()=>{O(),j(),t.value=!1,f.add({severity:"success",summary:"Saved",detail:`new ${o.property_type} is Drafted `,life:3e3}),A()})},_e=()=>{y.get("/investments/investment-summary").then(e=>{s.value=e.data}).finally(()=>{t.value=!1;var e=0,u=0;s.value.forEach(E=>{e+=E.dec_amount,u+=E.amount_rejected}),console.log("declaration amount :"+e),r.declared_amt=e,r.max_limit=parseInt(u)+parseInt(e)})},Ge=l([{id:1,name:"Chennai",value:"Chennai"},{id:2,name:"Mumbai",value:"Mumbai"},{id:3,name:"Hyderabad",value:"Hyderabad"},{id:4,name:"Kolkatta",value:"Kolkatta"},{id:5,name:"Other Non Metro",value:"Other Non Metro"}]),Qe=l([{name:"Financial Institution",code:"Financial Institution"},{name:"Others",code:"Others"}]),A=()=>{m.from_month=null,m.to_month=null,m.total_rent_paid=null,m.address=null,m.city=null,m.landlord_name=null,m.landlord_PAN=null,c.loan_sanction_date=null,c.lender_type=null,c.property_value=null,c.loan_amount=null,c.interest_amount_paid=null,c.vechicle_brand=null,c.vechicle_model=null,c.interest_amount_paid=null,p.loan_sanction_date=null,p.lender_type=null,p.property_value=null,p.loan_amount=null,p.interest_amount_paid=null,p.vechicle_brand=null,p.vechicle_model=null,p.interest_amount_paid=null,v.loan_sanction_date=null,v.lender_type=null,v.property_value=null,v.loan_amount=null,v.interest_amount_paid=null,v.vechicle_brand=null,v.vechicle_model=null,v.interest_amount_paid=null,h.lender_name=null,h.lender_pan=null,h.lender_type=null,h.address=null,a.lender_name=null,a.lender_pan=null,a.lender_type=null,a.loss_from_housing_property=null,a.address=null,a.rent_received=null,a.municipal_tax=null,a.maintenance=null,a.net_value=null,a.interest=null,a.income_loss=null,o.lender_name=null,o.lender_pan=null,o.lender_type=null,o.loss_from_housing_property=null,o.address=null,o.rent_received=null,o.municipal_tax=null,o.maintenance=null,o.net_value=null,o.interest=null,o.income_loss=null},ce=l(),W=l(),Xe=l(),pe=l(),me=l(),G=l(),Ze=async()=>{await y.get("/investments/TaxDeclaration").then(e=>{ce.value=e.data,e.data[7].regime=="old"?W.value=e.data[6].old_regime:W.value=e.data[6].new_regime,Xe.value=e.data[7].old_regime,me.value=e.data[7].age,pe.value=e.data[7].regime,G.value=e.data[7].last_updated}).finally(()=>{t.value=!1,ve(G.value)})},ve=e=>{let u=new Date,E="";return e?E=new Date(e):E=new Date,E>=u};return{fetchotherExe:P,Dec80EE:Te,Dec80EEA:Ye,Dec80EEB:De,investment_exemption_steps:Q,currentUSerCode:K,canShowLoading:t,getInvestmentSource:j,saveFormData:ye,getFormId:i,formatCurrency:Ee,editingRowSource:d,updatedRowSource:g,canShowSubmissionStatus:z,submitFormData:ge,investmentMainSource:x,formDataSource:n,hraSource:S,section80ccSource:X,otherExemptionSource:Z,housePropertySource:R,reimbursmentSource:ee,previousEmployeerIncomeSource:le,otherIncomeSource:te,isSubmitted:ae,epfPayrollDeduction:se,vpfPayrollDeduction:ue,reimbursemntMaxLimit:re,taxSavingInvestments:r,fetchInvestmentSummary:_e,investmentSummarySource:s,hra_data:de,disableSaveHra:je,hra:m,current_data:be,dailogAddNewRental:V,dailogEditNewRental:xe,editHraNewRental:Se,fetchHraNewRental:L,saveHraNewRental:Me,deleteRentalDetails:Pe,AddHraButtonDisabled:J,getDeclarationAmount:he,otherExe:C,other_Exe:Oe,dailog_80EE:F,dailog_80EEA:B,dailog_80EEB:$,other_exe_80EE:c,other_exe_80EEA:p,other_exe_80EEB:v,save80EE:Le,save80EEA:Fe,save80EEB:Be,get80EESlotData:Ie,get80EEASlotData:Ae,get80EEBSlotData:Ce,otherExeSectionData:w,editOtherExe:Ne,deleteOtherExeDetails:He,house_props_data:ie,dailog_SelfOccupiedProperty:U,dailog_DeemedLetOutProperty:q,dailog_LetOutProperty:k,income_loss_calculation:$e,fetchPropertyType:O,saveSelfOccupiedProperty:Je,saveLetOutProperty:Ve,saveDeemedLetOutProperty:We,hop:Y,lop:a,sop:h,dlop:o,getDlopSlotData:qe,getLopSlotData:ke,getSopSlotData:Ue,editHouseProps:Ke,deleteHouseProps:ze,metrocitiesOption:Ge,lenderTypeOption:Qe,employeDoj:ne,sumOfTotalRentPaid:oe,fetchTaxableIncomeInfo:Ze,tax_deduction:ce,total_gross:W,regime:pe,age:me,lastUpdated:G,disableRegime:ve}});export{at as a,ct as i};