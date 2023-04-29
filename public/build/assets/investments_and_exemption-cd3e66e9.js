import{_ as A}from"./_plugin-vue_export-helper-c27b6911.js";import{o as i,c,ab as w,B as g,E as $,g as k,e,j as p,W as s,h as u,w as b,i as f,z as h,F as N,n as v,a as y}from"./toastservice.esm-c4f6de4c.js";import"./index-f7a317fc.js";import{d as C}from"./pinia-0f325ab3.js";const T={},L={class:"mb-3 tw-card"},S=w('<div class="flex items-center justify-between mb-3"><h6 class="text-lg font-semibold">Tax Saving Investment </h6><select name="" id="" class="w-1/6 border-orange form-select disabled_focus"><option value="" selected hidden disabled>Apr 2022 - Mar 2023 </option></select></div><div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4 lg:grid-cols-4"><div class="p-2 text-center border-l-4 rounded-lg tw-card bg-orange-50 border-l-orange-400"><p class="mb-2 text-ash-medium f-13">Maximum Limit</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center border-l-4 rounded-lg tw-card bg-indigo-50 border-l-indigo-400"><p class="mb-2 text-ash-medium f-13"> Declared Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center border-l-4 rounded-lg tw-card bg-green-50 border-l-green-400"><p class="mb-2 text-ash-medium f-13">Status</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center border-l-4 rounded-lg tw-card bg-violet-50 border-l-violet-400"><p class="mb-2 text-ash-medium f-13">Late Date For Submission</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div>',2),P=[S];function q(x,t){return i(),c("div",L,P)}const M=A(T,[["render",q]]),_=C("investmentMainStore",()=>({investment_exemption_steps:g(1)})),V=e("div",{class:"mb-4 tw-card bg-gray-50"},[e("strong",null,"table")],-1),R={class:"tw-card bg-gray-50"},D={class:"flex justify-between mb-3"},I=e("span",{class:"text-lg font-semibold text-indigo-950"},"Rental Property",-1),E=e("i",{class:"fa fa-plus-circle me-2","aria-hidden":"true"},null,-1),O=e("div",{class:"mb-3 col-sm-12 col-md-12 col-xl-12 col-xxl-12 col-lg-12"},[e("div",{class:"mb-3 table-responsive"})],-1),U={class:"my-3 text-end"},F=e("button",{class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4"},"Save",-1),B=e("span",{class:"text-lg font-semibold modal-title text-indigo-950"},"Add New Rental",-1),H={class:"grid mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2"},z={class:""},K=e("label",{for:"rentFrom_month",class:"block mb-2 font-medium text-gray-900"},"From Month",-1),j={class:""},G=e("label",{for:"toFrom_month",class:"block mb-2 font-medium text-gray-900"},"To Month",-1),Z={class:""},Q=e("label",{for:"metro_city",class:"block mb-2 font-medium text-gray-900"},"City",-1),W={id:"metro_city",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"},X=e("option",{selected:"",disabled:"",hiddedn:""},"Choose Metro",-1),Y=e("option",null,"Chennai",-1),J=e("option",null,"Mumbai",-1),ee=e("option",null,"Kolkatta",-1),te=e("option",null,"Other Non Metro",-1),oe={class:""},re=e("label",{for:"rendPaid_inp",class:"block mb-2 font-medium text-gray-900"},"Total Rent Paid",-1),se={class:"grid mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2"},le={class:""},ne=e("label",{for:"lender_name",class:"block mb-2 font-medium text-gray-900"},[p("Landlord Name "),e("span",{class:"text-red-600"},"*")],-1),de={class:""},ae=e("label",{for:"lender_name",class:"block mb-2 font-medium text-gray-900"},[p("Landlord PAN "),e("span",{class:"text-red-600"},"*")],-1),ie={class:"grid mb-6 md:grid-cols-1 2xl:grid-cols-1 sm:grid-cols-1 xl:grid-cols-1 lg:grid-cols-1"},ce=e("label",{for:"lender_name",class:"block mb-2 font-medium text-gray-900"}," Address ",-1),ue=e("div",{class:"text-end"},[e("button",{class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md"},"Save")],-1),be={__name:"hra",setup(x){const t=_();$(()=>{console.log(t.investment_exemption_steps)});const a=g(!1);g({from_Month:"",To_Month:"",City:"",Total_Rent_Paid:"",Landlord_Name:"",Landlord_PAN:"",Address:""});const l=()=>{console.log(Add_New_Rental)};return(r,o)=>{const d=k("Dialog");return i(),c(N,null,[V,e("div",R,[e("div",D,[I,p(),e("button",{class:"btn btn-border-orange",onClick:o[0]||(o[0]=n=>a.value=!0)},[E,p(" Add Rented")])]),O]),e("div",U,[F,e("button",{onClick:o[1]||(o[1]=n=>s(t).investment_exemption_steps++),class:"px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md"},"Next")]),u(d,{visible:a.value,"onUpdate:visible":o[9]||(o[9]=n=>a.value=n),modal:"",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:b(()=>[B]),default:b(()=>[e("div",H,[e("div",z,[K,f(e("input",{type:"date",id:"rentFrom_month",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5","onUpdate:modelValue":o[2]||(o[2]=n=>r.Dialog_Add_New_Rental.from_Month=n),required:""},null,512),[[h,r.Dialog_Add_New_Rental.from_Month]])]),e("div",j,[G,f(e("input",{type:"date",id:`toFrom_month
                                                        `,class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5","onUpdate:modelValue":o[3]||(o[3]=n=>r.Dialog_Add_New_Rental.To_Month=n),required:""},null,512),[[h,r.Dialog_Add_New_Rental.To_Month]])]),e("div",Z,[Q,e("select",W,[X,Y,J,e("option",{onClick:o[4]||(o[4]=n=>l())},"Hyderabad"),ee,te])]),e("div",oe,[re,f(e("input",{type:"text",id:"rendPaid_inp",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5","onUpdate:modelValue":o[5]||(o[5]=n=>r.Dialog_Add_New_Rental.Total_Rent_Paid=n),required:""},null,512),[[h,r.Dialog_Add_New_Rental.Total_Rent_Paid]])])]),e("div",se,[e("div",le,[ne,f(e("input",{type:"text",id:"lender_name",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5","onUpdate:modelValue":o[6]||(o[6]=n=>r.Dialog_Add_New_Rental.Landlord_Name=n),required:""},null,512),[[h,r.Dialog_Add_New_Rental.Landlord_Name]])]),e("div",de,[ae,f(e("input",{type:"text",id:"lender_name",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5","onUpdate:modelValue":o[7]||(o[7]=n=>r.Dialog_Add_New_Rental.Landlord_PAN=n),required:""},null,512),[[h,r.Dialog_Add_New_Rental.Landlord_PAN]])])]),e("div",ie,[ce,f(e("textarea",{name:"",id:"",rows:"3",class:"bg-gray-50 resize-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5","onUpdate:modelValue":o[8]||(o[8]=n=>r.Dialog_Add_New_Rental.Address=n),required:""},null,512),[[h,r.Dialog_Add_New_Rental.Address]])]),ue]),_:1},8,["visible"])],64)}}},me=e("div",{class:"table-responsive"},[e("strong",null,"table")],-1),ge={class:"my-3 text-end"},pe=e("button",{class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4"},"Save",-1),xe={__name:"section_80cc_80ccc",setup(x){const t=_();return(a,l)=>(i(),c("div",null,[me,e("div",ge,[pe,e("button",{class:"px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4",onClick:l[0]||(l[0]=r=>s(t).investment_exemption_steps--)},"Previous"),e("button",{class:"px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md",onClick:l[1]||(l[1]=r=>s(t).investment_exemption_steps++)},"Next")])]))}},_e=w('<div class="table-responsive"></div><div class="my-3 text-end"><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Save</button><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4">Previous</button><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md">Next</button></div>',2),ve=e("h6",{class:"mb-1 modal-title text-primary"},[p("80EE"),e("span",{class:"ml-3 text-xs font-semibold text-gray-400"},"(The maximum deduction of Rs 50,000 can be claimed under this section)")],-1),ye=e("div",{class:"grid mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3"},[e("div",{class:""},[e("label",{for:"sanction_date",class:"block mb-2 font-medium text-gray-900"},"Loan Sanction Date"),e("input",{type:"date",id:"sanction_date",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"lender_type",class:"block mb-2 font-medium text-gray-900"},"Lender Type"),e("select",{id:"lender_type",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"},[e("option",{selected:""},"Choose Type"),e("option",null,"Others"),e("option",null,"Financial Institution")])]),e("div",{class:""},[e("label",{for:"property_value",class:"block mb-2 font-medium text-gray-900"},"Property Value"),e("input",{type:"text",id:"property_value",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"loan_amount",class:"block mb-2 font-medium text-gray-900"},"Loan Amount"),e("input",{type:"text",id:"loan_amount",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:outline-none focus:ring outline-1 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"declaration_amount",class:"block mb-2 font-medium text-gray-900"},"Interest Amount Paid"),e("input",{type:"text",id:"declaration_amount",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})])],-1),fe=e("div",{class:"text-end"},[e("button",{class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md"},"Save")],-1),he=e("h6",{class:"mb-1 modal-title text-primary"},[p("80EEA "),e("span",{class:"ml-3 text-xs font-semibold text-gray-400"},"(The maximum deduction available under this section is Rs. 1.5 Lakhs)")],-1),ke=e("div",{class:"grid mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3"},[e("div",{class:""},[e("label",{for:"sanction_date",class:"block mb-2 font-medium text-gray-900"},"Loan Sanction Date"),e("input",{type:"date",id:"sanction_date",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"lender_type",class:"block mb-2 font-medium text-gray-900"},"Lender Type"),e("select",{id:"lender_type",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"},[e("option",{selected:""},"Choose Type"),e("option",null,"Others"),e("option",null,"Financial Institution")])]),e("div",{class:""},[e("label",{for:"property_value",class:"block mb-2 font-medium text-gray-900"},"Property Value"),e("input",{type:"text",id:"property_value",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"loan_amount",class:"block mb-2 font-medium text-gray-900"},"Loan Amount"),e("input",{type:"text",id:"loan_amount",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:outline-none focus:ring outline-1 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"declaration_amount",class:"block mb-2 font-medium text-gray-900"},"Interest Amount Paid"),e("input",{type:"text",id:"declaration_amount",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})])],-1),we=e("div",{class:"text-end"},[e("button",{class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md"},"Save")],-1),$e=e("h6",{class:"mb-1 modal-title text-primary"},[p(" 80EEB"),e("span",{class:"ml-3 text-xs font-semibold text-gray-400"},"(The maximum deduction available under this section is Rs. 1.5 Lakhs for electric vehicle purchase)")],-1),Ne=e("div",{class:"grid mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2"},[e("div",{class:""},[e("label",{for:"sanction_date",class:"block mb-2 font-medium text-gray-900"},"Loan Sanction Date"),e("input",{type:"date",id:"sanction_date",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"vechicle_brand",class:"block mb-2 font-medium text-gray-900"},"Vechicle Brand"),e("select",{id:"vechicle_brand",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"},[e("option",{selected:"",hidden:"",disabled:""},"Choose Vechicle"),e("option",{value:""},"TATA"),e("option",{value:""},"Hyundai"),e("option",{value:""},"Mahindra"),e("option",{value:""},"Kia"),e("option",{value:""},"MG")])]),e("div",{class:""},[e("label",{for:"vechicle_model",class:"block mb-2 font-medium text-gray-900"},"Vechicle Model "),e("select",{id:"vechicle_model",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"},[e("option",{selected:"",hidden:""},"Choose Model"),e("option",{value:""},"Tata Tiago"),e("option",{value:""},"Tata Tigor"),e("option",{value:""},"Tata Nexon"),e("option",{value:""},"Tata AVINYA"),e("option",{value:""},"Tata Punch"),e("option",{value:""},"Tata CURVV SUV Coupe"),e("option",{value:""},"Mahindra eVerito"),e("option",{value:""},"Mahindra e2oPlus"),e("option",{value:""},"Mahindra eSupro"),e("option",{value:""},"Mahindra Treo"),e("option",{value:""},"Mahindra Treo Zor"),e("option",{value:""},"Mahindra eAlfa Mini"),e("option",{value:""},"Hyundai Kona Electric"),e("option",{value:""},"Hyundai IONIQ 5"),e("option",{value:""},"Mahindra XUV400 EV"),e("option",{value:""},"Mahindra E Verito"),e("option",{value:""},"Kia EV6"),e("option",{value:""},"MG ZS EV")])]),e("div",{class:""},[e("label",{for:"declaration_amount",class:"block mb-2 font-medium text-gray-900"},"Interest Amount Paid"),e("input",{type:"text",id:"declaration_amount",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})])],-1),Ae=e("div",{class:"text-end"},[e("button",{class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md"},"Save")],-1),Ce={__name:"other_exemption",setup(x){_();const t=g(!1),a=g(!1),l=g(!1);return(r,o)=>{const d=k("Dialog");return i(),c("div",null,[_e,e("button",{onClick:o[0]||(o[0]=n=>t.value=!0),class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4"},"Add 80EE"),e("button",{onClick:o[1]||(o[1]=n=>a.value=!0),class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4"},"Add 80EEA"),e("button",{onClick:o[2]||(o[2]=n=>l.value=!0),class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4"},"Add 80EEB"),u(d,{visible:t.value,"onUpdate:visible":o[3]||(o[3]=n=>t.value=n),modal:"",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:b(()=>[ve]),default:b(()=>[ye,fe]),_:1},8,["visible"]),u(d,{visible:a.value,"onUpdate:visible":o[4]||(o[4]=n=>a.value=n),modal:"",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:b(()=>[he]),default:b(()=>[ke,we]),_:1},8,["visible"]),u(d,{visible:l.value,"onUpdate:visible":o[5]||(o[5]=n=>l.value=n),modal:"",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:b(()=>[$e]),default:b(()=>[Ne,Ae]),_:1},8,["visible"])])}}},Te=e("ul",{class:"mb-3 divide-x nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},[e("li",{class:"nav-item",role:"presentation"},[e("a",{class:"mx-4 nav-link active",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#self_occupied_property",role:"tab","aria-controls":"","aria-selected":"true"}," Self Occupied Property ")]),e("li",{class:"nav-item",role:"presentation"},[e("a",{class:"mx-4 nav-link",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#letOut_property",role:"tab","aria-controls":"","aria-selected":"true"}," Let Out Property ")]),e("li",{class:"nav-item",role:"presentation"},[e("a",{class:"mx-4 nav-link",id:"","data-bs-toggle":"pill",href:"","data-bs-target":"#deemed_property",role:"tab","aria-controls":"","aria-selected":"true"}," Deemed Let Out Property ")])],-1),Le=e("div",{class:"tab-content",id:""},[e("div",{class:"tab-pane fade active show",id:"self_occupied_property",role:"tabpanel","aria-labelledby":""}),e("div",{class:"tab-pane fade",id:"letOut_property",role:"tabpanel","aria-labelledby":""}),e("div",{class:"tab-pane fade",id:"deemed_property",role:"tabpanel","aria-labelledby":""})],-1),Se={class:"my-3 text-end"},Pe=e("button",{class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md"},"Save",-1),qe=e("h6",{class:"mb-1 modal-title text-primary"},"Self Occupied Property",-1),Me=e("div",{class:"grid mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2"},[e("div",{class:""},[e("label",{for:"lender_name",class:"block mb-2 font-medium text-gray-900"},"Lender Name"),e("input",{type:"text",id:"lender_name",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"lender_name",class:"block mb-2 font-medium text-gray-900"},"Lender PAN"),e("input",{type:"text",id:"lender_name",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"lender_type",class:"block mb-2 font-medium text-gray-900"},"Lender Type"),e("select",{id:"lender_type",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"},[e("option",{selected:""},"Choose Type"),e("option",null,"Others"),e("option",null,"Financial Institution")])]),e("div",{class:""},[e("label",{for:"lender_name",class:"block mb-2 font-medium text-gray-900"},"Loss From Housing Property"),e("input",{type:"text",id:"lender_name",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})])],-1),Ve=e("div",{class:"grid mb-6 gap-y-4 gap-x-6 md:grid-cols-1 2xl:grid-cols-1 sm:grid-cols-1 xl:grid-cols-1 lg:grid-cols-1"},[e("div",{class:""},[e("label",{for:"lender_name",class:"block mb-2 font-medium text-gray-900"}," Address"),e("textarea",{name:"",id:"",rows:"3",class:"bg-gray-50 resize-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})])],-1),Re=e("div",{class:"text-end"},[e("button",{class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md"},"Save")],-1),De=e("h6",{class:"mb-1 modal-title text-primary"},"Let Out Property",-1),Ie=e("div",{class:"grid mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3"},[e("div",{class:""},[e("label",{for:"lender_name",class:"block mb-2 font-medium text-gray-900"},"Lender Name"),e("input",{type:"text",id:"lender_name",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"lender_pan",class:"block mb-2 font-medium text-gray-900"},"Lender PAN"),e("input",{type:"text",id:"lender_pan",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"lender_type",class:"block mb-2 font-medium text-gray-900"},"Lender Type"),e("select",{id:"lender_type",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"},[e("option",{selected:""},"Choose Type"),e("option",null,"Others"),e("option",null,"Financial Institution")])]),e("div",{class:""},[e("label",{for:"rend_received",class:"block mb-2 font-medium text-gray-900"},"Rent Received"),e("input",{type:"text",id:"rend_received",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"municipal_tax",class:"block mb-2 font-medium text-gray-900"},"Municipal Tax"),e("input",{type:"text",id:"municipal_tax",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"maintenance",class:"block mb-2 font-medium text-gray-900"},"Maintenance"),e("input",{type:"text",id:"maintenance",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"Net_Value",class:"block mb-2 font-medium text-gray-900"},"Net Value"),e("input",{type:"text",id:"Net_Value",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:outline-none focus:ring outline-1 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"Interest",class:"block mb-2 font-medium text-gray-900"},"Interest"),e("input",{type:"text",id:"Interest",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"Income/Loss",class:"block mb-2 font-medium text-gray-900"},"Income/Loss"),e("input",{type:"text",id:"Income/Loss",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})])],-1),Ee=e("div",{class:"text-end"},[e("button",{class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md"},"Save")],-1),Oe=e("h6",{class:"mb-1 modal-title text-primary"},"Deemed Let Out Property",-1),Ue=e("div",{class:"grid mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3"},[e("div",{class:""},[e("label",{for:"lender_name",class:"block mb-2 font-medium text-gray-900"},"Lender Name"),e("input",{type:"text",id:"lender_name",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"lender_pan",class:"block mb-2 font-medium text-gray-900"},"Lender PAN"),e("input",{type:"text",id:"lender_pan",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"lender_type",class:"block mb-2 font-medium text-gray-900"},"Lender Type"),e("select",{id:"lender_type",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"},[e("option",{selected:""},"Choose Type"),e("option",null,"Others"),e("option",null,"Financial Institution")])]),e("div",{class:""},[e("label",{for:"rend_received",class:"block mb-2 font-medium text-gray-900"},"Rent Received"),e("input",{type:"text",id:"rend_received",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"municipal_tax",class:"block mb-2 font-medium text-gray-900"},"Municipal Tax"),e("input",{type:"text",id:"municipal_tax",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"maintenance",class:"block mb-2 font-medium text-gray-900"},"Maintenance"),e("input",{type:"text",id:"maintenance",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"Net_Value",class:"block mb-2 font-medium text-gray-900"},"Net Value"),e("input",{type:"text",id:"Net_Value",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:outline-none focus:ring outline-1 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"Interest",class:"block mb-2 font-medium text-gray-900"},"Interest"),e("input",{type:"text",id:"Interest",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})]),e("div",{class:""},[e("label",{for:"Income/Loss",class:"block mb-2 font-medium text-gray-900"},"Income/Loss"),e("input",{type:"text",id:"Income/Loss",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",required:""})])],-1),Fe=e("div",{class:"text-end"},[e("button",{class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md"},"Save")],-1),Be={__name:"house_property",setup(x){const t=_(),a=g(!1),l=g(!1),r=g(!1);return(o,d)=>{const n=k("Dialog");return i(),c(N,null,[Te,Le,e("button",{onClick:d[0]||(d[0]=m=>a.value=!0),class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4"},"Add Self Occupied Property"),e("button",{onClick:d[1]||(d[1]=m=>l.value=!0),class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4"},"Add Let Out Property"),e("button",{onClick:d[2]||(d[2]=m=>r.value=!0),class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4"},"Add Deemed Let Out Property"),e("div",Se,[Pe,e("button",{class:"px-4 py-2 mx-4 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md",onClick:d[3]||(d[3]=m=>s(t).investment_exemption_steps--)},"Previous"),e("button",{class:"px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md",onClick:d[4]||(d[4]=m=>s(t).investment_exemption_steps++)},"Next")]),u(n,{visible:a.value,"onUpdate:visible":d[5]||(d[5]=m=>a.value=m),modal:"",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:b(()=>[qe]),default:b(()=>[Me,Ve,Re]),_:1},8,["visible"]),u(n,{visible:l.value,"onUpdate:visible":d[6]||(d[6]=m=>l.value=m),modal:"",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:b(()=>[De]),default:b(()=>[Ie,Ee]),_:1},8,["visible"]),u(n,{visible:r.value,"onUpdate:visible":d[7]||(d[7]=m=>r.value=m),modal:"",style:{width:"50vw",borderTop:"5px solid #002f56"}},{header:b(()=>[Oe]),default:b(()=>[Ue,Fe]),_:1},8,["visible"])],64)}}},He={class:"my-3 text-end"},ze=e("button",{class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md"},"Save",-1),Ke={__name:"reimbursement",setup(x){const t=_();return(a,l)=>(i(),c("div",null,[p(" table "),e("div",He,[ze,e("button",{class:"px-4 py-2 mx-4 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md",onClick:l[0]||(l[0]=r=>s(t).investment_exemption_steps--)},"Previous"),e("button",{class:"px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md",onClick:l[1]||(l[1]=r=>s(t).investment_exemption_steps++)},"Next")])]))}},je={class:"my-3 text-end"},Ge=e("button",{class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md"},"Save",-1),Ze={__name:"previous_employer_income",setup(x){const t=_();return(a,l)=>(i(),c("div",null,[p(" table "),e("div",je,[Ge,e("button",{class:"px-4 py-2 mx-4 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md",onClick:l[0]||(l[0]=r=>s(t).investment_exemption_steps--)},"Previous"),e("button",{class:"px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md",onClick:l[1]||(l[1]=r=>s(t).investment_exemption_steps++)},"Next")])]))}},Qe={class:"my-3 text-end"},We=e("button",{class:"px-4 py-2 text-center text-white bg-orange-700 rounded-md"},"Save",-1),Xe={__name:"other_source_of_income",setup(x){const t=_();return(a,l)=>(i(),c("div",null,[p(" table "),e("div",Qe,[We,e("button",{class:"px-4 py-2 mx-4 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md",onClick:l[0]||(l[0]=r=>s(t).investment_exemption_steps--)},"Previous"),e("button",{class:"px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md",onClick:l[1]||(l[1]=r=>s(t).investment_exemption_steps++)},"Next")])]))}},Ye={class:"p-2 pb-0 mb-3 bg-white rounded-lg shadow tw-card left-line",style:{"background-color":"white"}},Je={class:"bg-white divide-x py-auto nav nav-pills divide-solid nav-tabs-dashed",id:"pills-tab",role:"tablist"},et={class:"nav-item",role:"presentation"},tt={class:"mx-3 nav-item",role:"presentation"},ot={class:"nav-item",role:"presentation"},rt={class:"mx-3 nav-item",role:"presentation"},st={class:"nav-item",role:"presentation"},lt={class:"mx-3 nav-item",role:"presentation"},nt={class:"nav-item",role:"presentation"},dt={class:"tab-content",id:""},at={key:0},it={key:1},ct={key:2},ut={key:3},bt={key:4},mt={key:5},gt={key:6},yt={__name:"investments_and_exemption",setup(x){const t=_(),a=g(t.investment_exemption_steps);return $(()=>{console.log(a.value)}),(l,r)=>(i(),c("div",null,[u(M),e("div",Ye,[e("ul",Je,[e("li",et,[e("a",{class:v(["mx-4 nav-link",[s(t).investment_exemption_steps===1?"active":""]]),id:"","data-bs-toggle":"pill",href:"",role:"tab","aria-controls":"","aria-selected":"true",onClick:r[0]||(r[0]=o=>s(t).investment_exemption_steps=1)}," HRA ",2)]),e("li",tt,[e("a",{class:v(["mx-4 nav-link",[s(t).investment_exemption_steps===2?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:r[1]||(r[1]=o=>s(t).investment_exemption_steps=2),role:"tab","aria-controls":"","aria-selected":"true"}," Section 80C & 80CCC ",2)]),e("li",ot,[e("a",{class:v(["mx-4 nav-link mx-xl-3",[s(t).investment_exemption_steps===3?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:r[2]||(r[2]=o=>s(t).investment_exemption_steps=3),role:"tab","aria-controls":"","aria-selected":"true"}," Other Exemptions ",2)]),e("li",rt,[e("a",{class:v(["mx-4 nav-link",[s(t).investment_exemption_steps===4?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:r[3]||(r[3]=o=>s(t).investment_exemption_steps=4),role:"tab","aria-controls":"","aria-selected":"true"}," House Property ",2)]),e("li",st,[e("a",{class:v(["mx-4 nav-link mx-xl-3",[s(t).investment_exemption_steps===5?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:r[4]||(r[4]=o=>s(t).investment_exemption_steps=5),role:"tab","aria-controls":"","aria-selected":"true"}," Reimbursement ",2)]),e("li",lt,[e("a",{class:v(["mx-4 nav-link",[s(t).investment_exemption_steps===6?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:r[5]||(r[5]=o=>s(t).investment_exemption_steps=6),role:"tab","aria-controls":"","aria-selected":"true"}," Previous Employer Income ",2)]),e("li",nt,[e("a",{class:v(["mx-4 nav-link mx-xl-3",[s(t).investment_exemption_steps===7?"active":""]]),id:"","data-bs-toggle":"pill",href:"",onClick:r[6]||(r[6]=o=>s(t).investment_exemption_steps=7),role:"tab","aria-controls":"","aria-selected":"true"}," Other Source Of Income ",2)])])]),e("div",dt,[s(t).investment_exemption_steps===1?(i(),c("div",at,[u(be)])):y("",!0),s(t).investment_exemption_steps===2?(i(),c("div",it,[u(xe)])):y("",!0),s(t).investment_exemption_steps===3?(i(),c("div",ct,[u(Ce)])):y("",!0),s(t).investment_exemption_steps===4?(i(),c("div",ut,[u(Be)])):y("",!0),s(t).investment_exemption_steps===5?(i(),c("div",bt,[u(Ke)])):y("",!0),s(t).investment_exemption_steps===6?(i(),c("div",mt,[u(Ze)])):y("",!0),s(t).investment_exemption_steps===7?(i(),c("div",gt,[u(Xe)])):y("",!0)])]))}};export{yt as _};
