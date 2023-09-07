import{a as C}from"./index-362795f3.js";import{d as V}from"./dayjs.min-2f06af28.js";import{i as $,a as G}from"./investmentMainStore-fb348cc0.js";import{_ as K}from"./_plugin-vue_export-helper-c27b6911.js";import{Q as u,ab as z,o as d,c,d as e,l as i,t,k as O,aa as n,a as b,h as m,w as o,F as k,f as U,g as F,j as W,b as X,ac as H,ad as Q}from"./inputnumber.esm-5d69a21b.js";const a=w=>(H("data-v-e275cd27"),w=w(),Q(),w),q={class:"p-1"},J={class:"flex w-[100%]"},Z={class:"row w-[100%] items-center"},ee={class:"col-8 flex items-center justify-start"},te={class:"font-semibold text-black text-2xl items-center flex"},oe=a(()=>e("span",{class:"text-[red] font-['Poppins']"},"! Kindly update your PAN to avoid 20$ TDS deduction (if applicable)",-1)),ae=a(()=>e("div",{style:{"col-4 font-weight":"600"},class:"px-1 my-2 fs- flex text-lg col"},[e("p",{class:"underline text-blue-400 text-right font-['Poppins']"},"Income Tax Computations")],-1)),se={class:"justify-content-center align-items-center"},ne={class:"mx-2"},le={class:"my-4 rounded-lg"},ie={class:"card-body"},de={class:"text-[14px] font-semibold text-gray-500 font-['Poppins']",style:{"line-height":"20px"}},ce={class:"flex justify-between gap-6 my-4"},re={class:""},ue={class:"font-semibold text-[16px] font-['Poppins']"},me={class:"text-blue-500 underline cursor-pointer text-[16px] font-[600]",style:{"font-family":"Verdana, Geneva, Tahoma, sans-serif"}},_e={key:0},fe={key:0,class:"text-sm text-green-600"},he={key:1},pe={key:0,class:"text-sm text-green-600"},xe=a(()=>e("p",{class:"text-gray-600 font-['Poppins'] mt-[2px]"},"The confirmed old tax regime will be used in future payroll calculations ",-1)),ge=a(()=>e("div",null,null,-1)),ye=a(()=>e("div",null,null,-1)),ve={class:"text-end"},be=["disabled"],we={key:0,class:"flex items-center my-[8px] bg-[white] border-[1px] rounded-md border-gray-300 p-2 w-[80%]"},De=a(()=>e("i",{class:"mx-2 my-1 font-bold text-[red] pi pi-info-circle",style:{"font-size":"1.5rem"}},null,-1)),Te=a(()=>e("p",{class:"ml-2 text-[13px] text-[red] font-['Poppins']"}," Not considered for exemption if opted for New tax regime (Section 115BAC). You can declare your investment amount till last day of every month. ",-1)),Se=[De,Te],Ce={key:1,class:"flex h-full py-2 my-4 bg-orange-100 border-l-4 rounded-lg border-l-orange-400"},Fe=a(()=>e("i",{class:"mx-2 my-1 font-bold text-orange-500 pi pi-info-circle",style:{"font-size":"1.5rem"}},null,-1)),Ne={class:"ml-2 font-semibold text-black fs-5"},Ye=a(()=>e("p",{style:{"font-weight":"501"}}," Particulars ",-1)),ke={key:0,style:{"font-weight":"501"}},Pe={key:1,style:{"font-weight":"501"}},Re=a(()=>e("p",{style:{"font-weight":"501"}}," Old Tax Regime ",-1)),Me={style:{"font-weight":"501"}},Ie=a(()=>e("p",{style:{"font-weight":"501"}}," New Tax Regime ",-1)),Le={style:{"font-weight":"501"}},Ae={class:"my-3"},je=a(()=>e("p",{class:"text-2xl font-semibold"},"Declaration",-1)),Be={class:"mx-2"},Ee={class:"font-semibold f-13"},Ve=a(()=>e("li",{class:"my-2 text-lg font-semibold"}," '$' - Not considered for exemption if opted for New tax regime (Section 115BAC). ",-1)),$e={class:"my-2 text-lg font-semibold"},Ge={class:"my-2 text-lg font-semibold"},Ke={class:"my-2 card"},ze={class:"card-body"},Oe=a(()=>e("div",null,[e("p",{class:"font-semibold fs-4"},"My Declaration"),e("p",{class:"my-2 font-semibold fs-6"}," Below are the declarations done by you under various sections.")],-1)),Ue={class:"my-2 table-responsive"},We=a(()=>e("p",{style:{"font-weight":"501"}}," Amount Declared ",-1)),Xe=a(()=>e("p",{style:{"font-weight":"501"}}," Proof Submitted ",-1)),He=a(()=>e("p",{style:{"font-weight":"501"}}," Amount Rejected ",-1)),Qe=a(()=>e("p",{style:{"font-weight":"501"}}," Amount Accepted ",-1)),qe={class:"my-6"},Je=a(()=>e("div",null,[e("p",{class:"my-2 font-semibold font-['Poppins']"},"Month- Month Tax Deduction Details"),e("p",{class:"my-2 font-semibold text-[13px] font-['Poppins'] text-gray-400"},"Below deductions are based on your declared amount. Tax amount may change based on the amount approved.")],-1)),Ze={class:"grid gap-4 md:grid-cols-3 xl:grid-cols-3 lg:grid-cols-3 card-body"},et={class:"flex rounded-lg bg-[#F6F6F6] border-[#DDDDD] items-center py-[12px]"},tt=a(()=>e("p",{class:"text-ash-medium font-['Poppins'] text-[14px] text-center text-[#000]"},"Tax Paid Till Now",-1)),ot={class:"font-['Poppins'] text-center font-[600] text-[16px]"},at={class:"flex rounded-lg bg-[#F6F6F6] border-[#DDDDD] items-center py-[12px]"},st=a(()=>e("p",{class:"text-ash-medium font-['Poppins'] text-[14px] text-center text-[#000]"},"Total Tax Payable",-1)),nt={class:"font-['Poppins'] text-[16px] text-center font-[600]"},lt={class:"flex rounded-lg bg-[#F6F6F6] border-[#DDDDD] items-center py-[12px]"},it=a(()=>e("p",{class:"text-ash-medium font-['Poppins'] text-[14px] text-center text-[#000]"},"Remaining Tax Amount",-1)),dt={class:"font-['Poppins'] text-[16px] text-center font-[600]"},ct={class:"table-responsive"},rt=a(()=>e("p",{class:"font-semibold fs-6"}," Monthly Tax ",-1)),ut={class:"font-semibold fs-6"},mt=a(()=>e("div",{class:"flex my-3"},[e("p",{class:"font-semibold fs-6"},[e("strong",{class:"text-red-600"},"*"),i(" Projected Income Tax does not include any revisions, bonuses or other additional projected payments other than salary. ")])],-1)),_t=a(()=>e("h6",{class:"mb-1 text-lg font-semibold modal-title text-primary"},"Confirm Switching Regime",-1)),ft={class:""},ht={key:0,class:"text-lg font-semibold text-primary"},pt={key:0,class:"text-sm text-green-600"},xt={key:1,class:"text-lg font-semibold text-primary"},gt={key:0,class:"text-sm text-green-600"},yt={key:2,class:"text-lg font-semibold text-primary"},vt={key:0,class:"text-sm text-green-600"},bt=a(()=>e("p",{class:"my-3 text-justify text-gray-700"}," Are you sure you want to switch your regime? You cannot change your regime selection once you have confirmed your selection. ",-1)),wt=a(()=>e("p",{class:"text-justify text-gray-700"}," In case of an incorrect selection, your only option will be to change your selection when you file your tax returns for the current financial year. ",-1)),Dt={__name:"declaration",setup(w){u();const N=u(),x=u();z(()=>{r.canShowLoading=!0,r.fetchInvestmentSummary(),r.fetchTaxableIncomeInfo(),console.log(new Date().getFullYear()-1),C.get("/investments/monthTaxDashboard").then(l=>{Y.value.push(l.data.date),x.value=l.data.taxcalculation;let y=Object.entries(l.data.date).map(_=>({title:_[0]}));N.value=y})});const r=$(),p=G(),P=u(),f=u(),R=u(),Y=u([]);u();const g=u(),h=u();u();const v=u(),M=u(!1);u([{name:"old",value:"old"},{name:"new",value:"new"}]);const D=u(!1),I=()=>{D.value=!1,r.canShowLoading=!0;let l="";g.value=="old"?l="new":l="old",C.post("/investments/saveRegime",{regime:l}).finally(()=>{r.canShowLoading=!1,L(),M.value=!0})},T=l=>{switch(l){case"old":return"OLD TAX REGIME";case"new":return"NEW TAX REGIME";default:return"NEW TAX REGIME"}},L=async()=>{await C.get("/investments/TaxDeclaration").then(l=>{P.value=l.data,l.data[7].regime=="old"?f.value=l.data[6].old_regime:f.value=l.data[6].new_regime,R.value=l.data[7].old_regime,h.value=l.data[7].age,g.value=l.data[7].regime,v.value=l.data[7].last_updated}).finally(()=>{r.canShowLoading=!1,r.disableRegime(v.value)})};return(l,y)=>{const _=F("Column"),S=F("DataTable"),A=F("Dialog"),j=W("tooltip");return d(),c(k,null,[e("div",q,[e("div",J,[e("div",Z,[e("div",ee,[e("p",te,[i("Tax Deductions FY "+t(new Date().getFullYear())+"-"+t(new Date().getFullYear()+1),1),oe])]),ae])]),e("div",se,[e("div",ne,[e("div",le,[e("div",ie,[e("p",de," Not considered for exemption if opted for New tax regime (Section 115BAC). You can declare your investment amount till last day of every month until the cutoff date of "+t(new Date().toLocaleString("default",{month:"long"}))+" 27, "+t(new Date().getFullYear())+". Last date for submitting your investment proofs is "+t(new Date().toLocaleString("default",{month:"long"}))+" 27, "+t(new Date().getFullYear())+". '$' - Not considered for exemption if opted for New tax regime (Section 115BAC). You can declare your investment amount till last day of every month until the cutoff date of "+t(new Date().toLocaleString("default",{month:"long"}))+" 27, "+t(new Date().getFullYear())+".Last date for submitting your investment proofs is "+t(new Date().toLocaleString("default",{month:"long"}))+" 27, "+t(new Date().getFullYear())+". ",1)])]),e("div",ce,[e("div",re,[e("div",ue,[i("Your current chosen tax regime is "),O((d(),c("strong",me,[i(t(T(g.value)),1)])),[[j,`Last Updated Date  ${n(V)(v.value).format("dddd, MMMM D, YYYY h:mm A")}`,void 0,{bottom:!0}]]),g.value=="old"?(d(),c("span",_e,[n(p).taxCalculation(f.value,"old",h.value)<n(p).taxCalculation(f.value,"new",h.value)?(d(),c("span",fe,"Maximum benefit")):b("",!0)])):(d(),c("span",he,[n(p).taxCalculation(f.value,"new",h.value)<n(p).taxCalculation(f.value,"old",h.value)?(d(),c("span",pe,"Maximum benefit")):b("",!0)]))]),xe,ge]),ye,e("div",ve,[e("button",{class:"px-4 text-[14px] p-2 text-[#fff] rounded-md bg-[#000] font-['Poppins']",onClick:y[0]||(y[0]=s=>D.value=!0),disabled:!n(r).disableRegime(v.value)},"Switch Regime",8,be)])]),n(r).disableRegime(v.value)?(d(),c("div",we,Se)):(d(),c("div",Ce,[Fe,e("p",Ne," The tax regime cannot be changed until the financial year "+t(new Date().getFullYear())+" - "+t(new Date().getFullYear()+1)+" ends. (April "+t(new Date().getFullYear())+" -March "+t(new Date().getFullYear()+1)+" ) ",1)]))])]),m(S,{value:n(r).tax_deduction,dataKey:"id"},{empty:o(()=>[i(" No Data Found. ")]),loading:o(()=>[i(" Loading customers data. Please wait. ")]),default:o(()=>[m(_,{header:"#"},{body:o(s=>[i(t(s.data.sno)+". ",1)]),_:1}),m(_,{field:"section",header:"",style:{width:"30rem","text-align":"left !important"}},{header:o(()=>[Ye]),body:o(s=>[s.data.section=="Total Taxable Income"?(d(),c("p",ke,t(s.data.section),1)):(d(),c("p",Pe,t(s.data.section),1))]),_:1}),m(_,{field:"old_regime",header:"",style:{"text-align":"right !important"}},{header:o(()=>[Re]),body:o(s=>[e("p",Me,t(n(r).formatCurrency(s.data.old_regime)),1)]),_:1}),m(_,{field:"new_regime",header:"",style:{"text-align":"right !important"}},{header:o(()=>[Ie]),body:o(s=>[e("p",Le,t(n(r).formatCurrency(s.data.new_regime)),1)]),_:1})]),_:1},8,["value"]),e("div",Ae,[e("div",null,[je,e("div",Be,[e("ul",Ee,[Ve,e("li",$e," You can declare your investment amount till last day of every month until the cutoff date of "+t(new Date().toLocaleString("default",{month:"long"}))+" 27, "+t(new Date().getFullYear())+". ",1),e("li",Ge," Last date for submitting your investment proofs is "+t(new Date().toLocaleString("default",{month:"long"}))+" 27, "+t(new Date().getFullYear())+". ",1)])])])]),e("div",Ke,[e("div",ze,[Oe,e("div",Ue,[m(S,{rows:7,dataKey:"id",value:n(r).investmentSummarySource},{empty:o(()=>[i(" No Data Found. ")]),loading:o(()=>[i(" Loading customers data. Please wait. ")]),default:o(()=>[m(_,{field:"particulars",header:"S.No"},{body:o(s=>[i(t(s.index+1),1)]),_:1}),m(_,{field:"section_name",header:"Declaration",style:{width:"16rem","text-align":"left !important"}}),m(_,{field:"dec_amount",style:{width:"18rem","text-align":"right !important"}},{header:o(()=>[We]),body:o(s=>[i(t(n(r).formatCurrency(s.data.dec_amount)),1)]),_:1}),m(_,{field:"proof_submitted",style:{width:"16rem","text-align":"right !important"}},{header:o(()=>[Xe]),_:1}),m(_,{field:"amount_rejected",style:{width:"16rem","text-align":"right !important"}},{header:o(()=>[He]),body:o(s=>[i(t(n(r).formatCurrency(s.data.amount_rejected)),1)]),_:1}),m(_,{field:"amount_accepted",style:{width:"16rem","text-align":"right !important"}},{header:o(()=>[Qe]),body:o(s=>[i(t(n(r).formatCurrency(s.data.amount_accepted)),1)]),_:1})]),_:1},8,["value"])]),e("div",qe,[Je,e("div",null,[e("div",Ze,[e("div",et,[tt,e("p",ot,"INR "+t(x.value?x.value["Tax Paid Till Now"]:0),1)]),e("div",at,[st,e("p",nt,"INR "+t(x.value?x.value["Total Tax Payable"]:0),1)]),e("div",lt,[it,e("p",dt,"INR "+t(x.value?x.value["Remaining Tax Amount"]:0),1)])])]),e("div",ct,[m(S,{paginator:!0,rows:1,dataKey:"id",scrollable:"",value:Y.value},{empty:o(()=>[i(" No Data Found. ")]),loading:o(()=>[i(" Loading customers data. Please wait. ")]),default:o(()=>[m(_,{field:"particulars",header:"Month",frozen:"",class:"font-bold"},{body:o(()=>[rt]),_:1}),(d(!0),c(k,null,U(N.value,s=>(d(),X(_,{key:s,header:s.title,field:s.title,class:"font-semibold"},{body:o(({data:B,field:E})=>[e("p",ut,t(B[E]),1)]),_:2},1032,["header","field"]))),128))]),_:1},8,["value"])]),mt])])])]),m(A,{visible:D.value,"onUpdate:visible":y[1]||(y[1]=s=>D.value=s),modal:"",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:o(()=>[_t]),default:o(()=>[e("p",ft,[i("Your current switching regime is "),g.value=="new"?(d(),c("strong",ht,[i(t(T("old"))+" ",1),n(p).taxCalculation(f.value,"old",h.value)<n(p).taxCalculation(f.value,"new",h.value)?(d(),c("span",pt,"Maximum benefit")):b("",!0)])):g.value=="old"?(d(),c("strong",xt,[i(t(T("new"))+" ",1),n(p).taxCalculation(f.value,"new",h.value)<n(p).taxCalculation(f.value,"old",h.value)?(d(),c("span",gt,"Maximum benefit")):b("",!0)])):(d(),c("strong",yt,[i(t(T("old"))+" ",1),n(p).taxCalculation(f.value,"old",h.value)<n(p).taxCalculation(f.value,"new",h.value)?(d(),c("span",vt,"Maximum benefit")):b("",!0)]))]),bt,wt,e("div",{class:"mt-5 text-end"},[e("button",{id:"confirm_switchRegime",class:"px-4 py-2 text-lg text-center text-white bg-black rounded-md",onClick:I},"Confirm")])]),_:1},8,["visible"])],64)}}},Yt=K(Dt,[["__scopeId","data-v-e275cd27"]]);export{Yt as d};
