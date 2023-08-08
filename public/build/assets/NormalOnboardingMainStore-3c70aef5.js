import{d as fe}from"./pinia-f8c56b28.js";import{S as ge}from"./Service-6922984d.js";import{r as n,c as l,e as R,u as he}from"./index.esm-9c39efa1.js";import{a as M}from"./index-362795f3.js";import{a7 as be,H as o,ah as ye,a3 as A,ad as we}from"./toastservice.esm-08a9bf8e.js";const Ye=fe("useNormalOnboardingMainStore",()=>{const _=ge();be("$swal");const m=o(!1),i=ye(),e=A({can_onboard_employee:1,emp_client_code:"",employee_code:"",doj:"",aadhar_number:"",passport_number:"",bank_id:"",bank_name:"",employee_name:"",gender:"",pan_number:"",passport_date:"",AccountNumber:"",dob:"",mobile_number:"",dl_no:"",blood_group_name:"",blood_group_id:"",bank_ifsc:"",marital_status:"",marital_status_id:"",email:"",nationality:"",physically_challenged:"",first_letter_emp_name:"",second_letter_emp_name:"",current_address_line_1:"",current_address_line_2:"",current_country:"",current_state:"",current_country_id:"",current_state_id:"",current_city:"",current_pincode:"",permanent_address_line_1:"",permanent_address_line_2:"",permanent_country:"",permanent_state:"",permanent_country_id:"",permanent_state_id:"",permanent_city:"",permanent_pincode:"",department:"",department_id:"",process:"",designation:"",cost_center:"",probation_period:"",work_location:"",l1_manager_code:"",l1_manager_code_id:"",holiday_location:"",officical_mail:"",official_mobile:"",emp_notice:"",confirmation_period:"",father_name:"",dob_father:"",father_gender:"Male",father_age:"",mother_name:"",dob_mother:"",mother_gender:"Female",mother_age:"",spouse_name:"",wedding_date:"",spouse_gender:"",dob_spouse:"",no_of_children:"",basic:"",hra:"",statutory_bonus:"",child_education_allowance:"",food_coupon:"",lta:"",other_allowance:"",special_allowance:"",graduity:"",cic:"",insurance:"",epf_employee:"",epf_employer_contribution:"",esic_employee:"",esic_employer_contribution:"",professional_tax:"",labour_welfare_fund:"",net_income:"0",total_ctc:0,AadharCardFront:"",AadharCardBack:"",PanCardDoc:"",DrivingLicenseDoc:"",EductionDoc:"",VoterIdDoc:"",RelievingLetterDoc:"",PassportDoc:"",save_draft_messege:""}),k=o(!1),f=o(!1),g=o(!1),h=o(),b=o(!1),Y=o(),y=o(!1),C=o(!1),F=o(!1),I=o(!1),q=o(!1),E=o(!1),O=(a,t)=>{let r=a.target.files[0];console.log(r),r&&(r.type=="image/jpeg"||r.type=="image/png"||r.type=="application/pdf"?t=="AadharFront"?e.AadharCardFront=a.target.files[0]:t=="AadharBack"?e.AadharCardBack=a.target.files[0]:t=="Pancard"?e.PanCardDoc=a.target.files[0]:t=="DrivingLicense"?e.DrivingLicenseDoc=a.target.files[0]:t=="Passport"?e.PassportDoc=a.target.files[0]:t=="VoterId"?e.VoterIdDoc=a.target.files[0]:t=="EducationCertificate"?e.EductionDoc=a.target.files[0]:t=="RelievingLetter"?e.RelievingLetterDoc=a.target.files[0]:console.log("No more files"):i.add({severity:"error",summary:"Error",detail:"Upload Valid File format",life:3e3}))},N=o(),x=o(),S=o(),T=o(),L=o(),P=o(),V=o(),G=()=>{e.aadhar_number=o("3977 8798 6564"),e.pan_number=o("BGAJP6646F"),e.blood_group_name=o("B Positive"),e.dob=o("23-07-2000"),e.dl_no=o("HR-0619850034761"),e.passport_number=o("A2096457"),e.passport_date=o("23-5-2030"),e.bank_name=o("ANDHRA BANK"),e.physically_challenged=o("No"),e.AccountNumber=o("35216644292"),e.bank_ifsc=o("SBIN0121325"),e.nationality=o("Indian"),e.gender=o("Male"),e.marital_status=o("Married"),e.mobile_number=o("8248023344"),e.current_address_line_1=o("45/21 2nd Avenue,chennai"),e.current_address_line_2=o("45/21 2nd Avenue,chennai"),e.current_country=o("India"),e.current_state=o("Tamil Nadu"),e.current_city=o("chennai"),e.current_pincode=o("600023"),e.permanent_address_line_1=o("45/21 2nd Avenue,chennai"),e.permanent_address_line_2=o("45/21 2nd Avenue,chennai"),e.permanent_country=o("India"),e.permanent_city=o("chennai"),e.permanent_state=o("Tamil Nadu"),e.permanent_pincode=o("600003"),e.department=o("IT"),e.process=o("Iti"),e.cost_center=o("Chennai"),e.holiday_location=o("Tamilnadu"),e.work_location=o("chennai"),e.officical_mail=o("voidmax@gmail.com"),e.official_mobile=o("4646454547"),e.father_name=o("David"),e.father_age=o("45"),e.dob_father=o("23-09-1968"),e.mother_name=o("Licas"),e.dob_mother=o("23-8-1970"),e.mother_gender=o("Female"),e.mother_age=o("35"),e.spouse_gender=o("female"),e.dob_spouse=o("12-8-1995"),e.spouse_name=o("priyanka")},Q=()=>{D.value=!1,b.value=!0;let a=parseInt(e.basic)+parseInt(e.hra)+parseInt(e.special_allowance);e.gross=Math.floor(a);let t=e.gross-e.epf_employee-e.esic_employee;e.net_income=t;let r=parseInt(e.gross)+parseInt(e.epf_employer_contribution)+parseInt(e.esic_employer_contribution)+parseInt(e.insurance)+parseInt(e.graduity);e.total_ctc=r};function Z(a,t){return a.setFullYear(a.getFullYear()+t),a}function H(a,t){return a.setFullYear(a.getFullYear()-t),a}const J=a=>Z(a,18),K=a=>H(a,10),c=a=>a?a.type=="image/jpeg"||a.type=="image/png"||a.type=="application/pdf":!0,w=a=>(console.log(e.marital_status),e.marital_status!=2),B=we(()=>({employee_code:{},employee_name:{required:n},gender:{},passport_number:{},passport_date:{},blood_group_name:{},physically_challenged:{},gender:{},dl_no:{},nationality:{},doj:{required:n},aadhar_number:{required:l.withMessage("Aadhar number is required",n),validateAadhar:l.withMessage("Invalid aadhar number",a=>/^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/.test(a))},bank_name:{required:n},gender:{required:n},pan_number:{required:l.withMessage("Pan number is required",n),ValidatePan:l.withMessage("Invalid Pan number ",a=>/^([a-zA-Z]){3}([Pp]){1}([a-zA-Z]){1}([0-9]){4}([a-zA-Z]){1}?$/.test(a))},AccountNumber:{required:n,ValidateAccountNo(a){return/^[0-9]{9,18}$/.test(a)}},dob:{required:n},mobile_number:{required:n,maxLength:10},bank_ifsc:{required:l.withMessage("Ifsc code is required",n),ValidateIfscNo:l.withMessage("Invalid Ifsc code",a=>/^[A-Za-z]{4}0[A-Za-z0-9]{6}$/.test(a))},marital_status:{required:n},email:{required:n,email:R},nationality:{required:n},physically_challenged:{},current_address_line_1:{required:n},current_address_line_2:{required:n},current_country:{required:n},current_state:{required:n},current_city:{required:n},current_pincode:{required:n,maxLength:6},permanent_address_line_1:{required:n},permanent_address_line_2:{required:n},permanent_country:{required:n},permanent_state:{required:n},permanent_city:{required:n},permanent_pincode:{required:n,maxLength:6},process:{},designation:{required:n},department:{},cost_center:{},probation_period:{},holiday_location:{},officical_mail:{email:l.withMessage("Enter valid email",R)},official_mobile:{},probation_period:{},emp_notice:{},work_location:{required:n},l1_manager_code:{required:n},confirmation_period:{required:n},father_name:{required:n},dob_father:{required:n},mother_name:{required:n},dob_mother:{required:n},spouse_name:{isMarried:l.withMessage("Spouse name is required",w)},spouse_gender:{isMarried:l.withMessage("Spouse gender is required",w)},dob_spouse:{isMarried:l.withMessage("Spouse dob is required",w)},cic:{},AadharCardFront:{required:l.withMessage("Aadhar front is required",n),validateFile:l.withMessage("Upload Valid format",c)},AadharCardBack:{required:l.withMessage("Aadhar back is required",n),validateFile:l.withMessage("Upload Valid format",c)},PanCardDoc:{required:l.withMessage("Pancard is required",n),validateFile:l.withMessage("Upload Valid format",c)},DrivingLicenseDoc:{validateFile:l.withMessage("Upload Valid format",c)},EductionDoc:{required:l.withMessage("Education document is required",n),validateFile:l.withMessage("Upload Valid format",c)},VoterIdDoc:{validateFile:l.withMessage("Upload Valid format",c)},RelievingLetterDoc:{validateFile:l.withMessage("Upload Valid format",c)},PassportDoc:{validateFile:l.withMessage("Upload Valid format",c)}})),u=he(B,e),U=()=>{let a=new FormData;a.append("can_onboard_employee",e.can_onboard_employee),a.append("emp_client_code",e.emp_client_code),a.append("employee_code",`${e.emp_client_code}${e.employee_code}`),a.append("doj",e.doj?moment(e.doj).format("YYYY-MM-DD"):e.doj),a.append("aadhar_number",e.aadhar_number),a.append("passport_number",e.passport_number),a.append("bank_id",e.bank_name),a.append("employee_name",e.employee_name),a.append(" gender",e.gender),a.append("pan_number",e.pan_number),a.append("passport_date",e.passport_date),a.append("AccountNumber",e.AccountNumber),a.append("dob",e.dob?moment(e.dob).format("YYYY-MM-DD"):e.dob),a.append("mobile_number",e.mobile_number),a.append("dl_no",e.dl_no),a.append("blood_group_name",e.blood_group_name),a.append("bank_ifsc",e.bank_ifsc),a.append("marital_status",e.marital_status),a.append("email",e.email),a.append("nationality",e.nationality),a.append("physically_challenged",e.physically_challenged),a.append("current_address_line_1",e.current_address_line_1),a.append("current_address_line_2",e.current_address_line_2),a.append("current_country",e.current_country),a.append("current_state",e.current_state),a.append("current_city",e.current_city),a.append("current_pincode",e.current_pincode),a.append(" permanent_address_line_1",e.permanent_address_line_1),a.append("permanent_address_line_2",e.permanent_address_line_2),a.append("permanent_country",e.permanent_country),a.append("permanent_state",e.permanent_state),a.append("permanent_city",e.permanent_city),a.append("permanent_pincode",e.permanent_pincode),a.append("department",e.department),a.append("process",e.process),a.append("designation",e.designation),a.append("cost_center",e.cost_center),a.append("probation_period",e.probation_period),a.append("work_location",e.work_location),a.append("l1_manager_code_id",e.l1_manager_code.user_code),a.append("holiday_location",e.holiday_location),a.append("officical_mail",e.officical_mail),a.append("official_mobile",e.official_mobile),a.append("emp_notice",e.emp_notice),a.append("confirmation_period",e.confirmation_period?moment(e.confirmation_period).format("YYYY-MM-DD"):e.confirmation_period),a.append("father_name",e.father_name),e.dob_father==""?a.append("dob_father",e.dob_father):a.append("dob_father",moment(e.dob_father).format("YYYY-MM-DD")),a.append("father_gender",e.father_gender),a.append("father_age",e.father_age),a.append("mother_name",e.mother_name),e.dob_mother==""?a.append("dob_mother",e.dob_mother):a.append("dob_mother",moment(e.dob_mother).format("YYYY-MM-DD")),a.append("mother_gender",e.mother_gender),a.append("mother_age",e.mother_age),a.append("spouse_name",e.spouse_name),e.wedding_date==""?a.append("wedding_date",e.wedding_date):a.append("wedding_date",moment(e.wedding_date).format("YYYY-MM-DD")),a.append("spouse_gender",e.spouse_gender),e.dob_spouse==""?a.append("dob_spouse",e.dob_spouse):a.append("dob_spouse",moment(e.dob_spouse).format("YYYY-MM-DD")),a.append("no_of_children",e.no_of_children),a.append("basic",e.basic),a.append("hra",e.hra),a.append("statutory_bonus",e.statutory_bonus),a.append("child_education_allowance",e.child_education_allowance),a.append("food_coupon",e.food_coupon),a.append("lta",e.lta),a.append("special_allowance",e.special_allowance),a.append("other_allowance",e.other_allowance),a.append("gross",e.gross),a.append("epf_employer_contribution",e.epf_employer_contribution),a.append("graduity",e.graduity),a.append("insurance",e.insurance),a.append("cic",e.total_ctc),a.append("epf_employee",e.epf_employee),a.append("esic_employee",e.esic_employee),a.append("esic_employer_contribution",e.esic_employer_contribution),a.append("professional_tax",e.professional_tax),a.append("labour_welfare_fund",e.labour_welfare_fund),a.append("net_income",e.net_income),a.append("Aadharfront",e.AadharCardFront),a.append("AadharBack",e.AadharCardBack),a.append("panDoc",e.PanCardDoc),a.append("eductionDoc",e.EductionDoc),a.append("releivingDoc",e.RelievingLetterDoc),a.append("voterId",e.VoterIdDoc),a.append("passport",e.PassportDoc),a.append("dlDoc",e.DrivingLicenseDoc),console.log(a),m.value=!0,M.post("/vmt-employee-onboard",a).then(t=>{t.data.status=="success"?Swal.fire({title:t.data.status="success",text:t.data.message,icon:"success",showCancelButton:!1}).then(r=>{h.value=="quick"&&t.data.can_redirect=="1"&&window.location.reload()}):Swal.fire("Failure",`${t.data.message}`,"error"),e.save_draft_messege=t.data}).catch(function(t){console.log(t)}).finally(()=>{m.value=!1})},W=a=>{console.log(a),e.can_onboard_employee=a,u.value.$validate(),!C.value&&!F.value?!I.value&&!q.value&&(a==0?e.employee_code&&e.employee_name&&e.mobile_number&&e.email?(U(),u.value.$reset()):y.value=!0:a==1&&(u.value.$error?(console.log("Form failed validation"),i.add({severity:"error",summary:"Invalid",detail:"fill mandatory fields",life:3e3})):(console.log("Form successfully submitted."),U(),u.value.$reset()))):console.log("invalid")},X=()=>{let a=new URL(document.location).searchParams.get("uid");a?M.post("/fetch-quickonboarded-emp-details",{encr_uid:a}).then(t=>{j(t.data)}):(console.log("UID not found in req params"),M.get("/get-client-code").then(t=>{console.log(t.data),Y.value=t.data,e.emp_client_code=t.data}))},j=a=>{console.log("populate data"),console.log("populateQuickOnboardData : "+JSON.stringify(a)),h.value=a.onboard_type,a.onboard_type=="quick"||a.onboard_type=="bulk"?(console.log(a.onboard_type+"Onboarding"),b.value=!0,D.value=!1,s.is_emp_code_quick=!0,s.is_doj_quick=!0,s.is_emp_name_quick=!0,s.is_mob_quick=!0,s.is_email_quick=!0,s.statutory=!0,s.child=!0,s.fdc=!0,s.lta=!0,s.other=!0,s.mobile=!0,s.designation=!0,s.isDisableClientCode=!1):console.log("normal onboarding"),console.log(a.onboard_type),e.employee_code=o(a.user_code),e.employee_name=o(a.name),e.dob=o(a.dob),e.marital_status=o(a.marital_status_id),e.gender=o(a.gender),e.aadhar_number=o(a.aadhar_number),e.pan_number=o(a.pan_number),e.dl_no=o(a.dl_no),e.nationality=o(a.nationality),e.blood_group_name=o(a.blood_group_name),e.email=o(a.email),e.doj=o(a.doj),e.mobile_number=o(a.mobile_number),e.designation=o(a.designation),e.l1_manager_code=o(a.l1_manager_code),e.basic=o(a.basic),e.hra=o(a.hra),e.statutory_bonus=o(a.Statutory_bonus),e.child_education_allowance=o(a.child_education_allowance),e.food_coupon=o(a.food_coupon),e.lta=o(a.lta),e.special_allowance=o(a.special_allowance),e.other_allowance=o(a.other_allowance),e.epf_employer_contribution=o(a.epf_employer_contribution),e.esic_employer_contribution=o(a.esic_employer_contribution),e.insurance=o(a.insurance),e.graduity=o(a.graduity),e.epf_employee=o(a.epf_employee),e.esic_employee=o(a.esic_employee),e.professional_tax=o(a.professional_tax),e.labour_welfare_fund=o(a.labour_welfare_fund),e.cic=o(a.cic)},ee=()=>{_.getBankList().then(a=>N.value=a.data),_.getCountryList().then(a=>x.value=a.data),_.getStateList().then(a=>T.value=a.data),_.ManagerDetails().then(a=>L.value=a.data),_.DepartmentDetails().then(a=>S.value=a.data),_.getMaritalStatus().then(a=>{P.value=a.data}),_.getBloodGroups().then(a=>V.value=a.data)},ae=a=>{console.log(a),(a=="Male"||a=="Male")&&(console.log("0"+e.gender),e.spouse_gender="Female",console.log(e.spouse_gender),s.spouse=!0),(a=="Female"||a=="female")&&(e.spouse_gender="Male",console.log("1"+e.gender),console.log(e.spouse_gender),s.spouse=!0),(a=="Others"||a=="others")&&(s.spouse=!1)},oe=()=>{if(console.log("Father's Age"+e.dob_father),console.log("Mother's Age"+e.dob_mother),e.dob_father){var a=new Date(e.dob_father);console.log(" birthDate"+a);var t=Date.now()-a.getTime(),r=new Date(t),p=Math.abs(r.getUTCFullYear()-1970);e.father_age=p}if(e.dob_mother){var a=new Date(e.dob_mother);console.log(" birthDate"+a);var t=Date.now()-a.getTime(),r=new Date(t),p=Math.abs(r.getUTCFullYear()-1970);e.mother_age=p}if(e.dob){var a=new Date(e.dob);console.log(" birthDate"+a);var t=Date.now()-a.getTime(),r=new Date(t),p=Math.abs(r.getUTCFullYear()-1970);console.log("calculated Age"+p),p<18&&(console.log("not less than 18"),e.dob="")}},te=()=>{e.marital_status==2||e.marital_status==2?f.value=!0:f.value=!1},ne=()=>{e.nationality=="Other Nationality"?g.value=!0:g.value=!1},re=()=>{k.value==!1?(e.permanent_address_line_1=e.current_address_line_1,e.permanent_address_line_2=e.current_address_line_2,e.permanent_country=e.current_country,e.permanent_state=e.current_state,e.permanent_city=e.current_city,e.permanent_pincode=e.current_pincode):k.value==!0&&(e.permanent_address_line_1="",e.permanent_address_line_2="",e.permanent_country="",e.permanent_city="",e.permanent_state="",e.permanent_pincode="")};A({});const v=o(),d=()=>{let a=e.cic*50/100;console.log("Basic :"+Math.floor(a)),e.basic=Math.floor(a);let t=e.basic*50/100;e.hra=Math.floor(t),e.special_allowance=e.basic-e.hra,console.log(e.special_allowance),v.value=a+t+e.special_allowance,console.log("Actual gross"+v.value);let r=a+t+e.special_allowance;e.gross=Math.floor(r),console.log("Gross",Math.floor(r)),me(),setTimeout(()=>{z()},1e3),setTimeout(()=>{$()},1e3)},$=()=>{e.net_income=e.gross-e.epf_employee-e.esic_employee},z=()=>{e.total_ctc=e.gross+e.epf_employer_contribution+e.esic_employer_contribution+e.insurance+e.graduity,console.log("ctc"+e.total_ctc)},le=()=>{let a=e.statutory_bonus,t=e.special_allowance;console.log(a,t),console.log(t-a),setTimeout(()=>{e.special_allowance=t-a,e.special_allowance<0&&(i.add({severity:"error",summary:" Special Allowance",detail:"Not less than zero",life:3e3}),d(),e.statutory_bonus="",e.child_education_allowance="",e.food_coupon="",e.lta="",e.other_allowance="")},1e3)},se=()=>{let a=e.statutory_bonus+e.child_education_allowance+e.food_coupon+e.other_allowance,t=e.special_allowance;console.log(a,t),console.log(t-a),setTimeout(()=>{e.special_allowance=t-a,e.special_allowance<0&&(i.add({severity:"error",summary:" Special Allowance",detail:"Not less than zero",life:3e3}),d(),e.statutory_bonus="",e.child_education_allowance="",e.food_coupon="",e.lta="",e.other_allowance="")},3e3)},ie=()=>{let a=e.child_education_allowance,t=e.special_allowance;console.log(a,t),setTimeout(()=>{e.special_allowance=t-a,e.special_allowance<0&&(i.add({severity:"error",summary:" Special Allowance",detail:"Not less than zero",life:3e3}),d(),e.statutory_bonus="",e.child_education_allowance="",e.food_coupon="",e.lta="",e.other_allowance="")},1100)},ce=()=>{let a=e.food_coupon,t=e.special_allowance;console.log(a,t),setTimeout(()=>{e.special_allowance=t-a,e.special_allowance<0&&(i.add({severity:"error",summary:" Special Allowance",detail:"Not less than zero",life:3e3}),d(),e.statutory_bonus="",e.child_education_allowance="",e.food_coupon="",e.lta="",e.other_allowance="")},1150)},_e=()=>{let a=e.lta,t=e.special_allowance;console.log(a,t),setTimeout(()=>{e.special_allowance=t-a,e.special_allowance<0&&(i.add({severity:"error",summary:" Special Allowance",detail:"Not less than zero",life:2e3}),d(),e.statutory_bonus="",e.child_education_allowance="",e.food_coupon="",e.lta="",e.other_allowance="")},1200)},de=()=>{let a=e.other_allowance,t=e.special_allowance;console.log(a,t),setTimeout(()=>{e.special_allowance=t-a,e.special_allowance<0&&(i.add({severity:"error",summary:" Special Allowance",detail:"Not less than zero",life:3e3}),d(),e.statutory_bonus="",e.child_education_allowance="",e.food_coupon="",e.lta="",e.other_allowance="")},1250)},pe=()=>{let a=e.total_ctc;console.log("total"+a);let t=parseInt(a)+parseInt(e.insurance);console.log("sum "+t),setTimeout(()=>{e.total_ctc=t},1e3)},ue=()=>{let a=e.total_ctc;console.log("total"+a);let t=parseInt(e.total_ctc)+parseInt(e.graduity);console.log(t),console.log(e.total_ctc),setTimeout(()=>{e.total_ctc=t},2e3)},me=()=>{let a=e.gross-e.hra,t=v.value;if(console.log("EpfCalculation:"+a),a<15e3)e.epf_employer_contribution=Math.floor(a*12/100),e.epf_employee=Math.floor(a*12/100);else if(a>15e3){let r=1800;e.epf_employee=r,e.epf_employer_contribution=r}if(t<=21e3)e.esic_employer_contribution=Math.floor(e.gross*3.25/100),e.esic_employee=Math.floor(e.gross*.75/100);else if(t>21e3){console.log(t);let r=0;e.esic_employee=r,e.esic_employer_contribution=r}},s=A({is_emp_code_quick:!1,is_emp_name_quick:!1,is_doj_quick:!1,is_mob_quick:!1,is_email_quick:!1,statutory:!1,child:!1,fdc:!1,lta:!1,other:!1,l1_code:!1,designation:!1,mobile:!1,spouse:!1,isDisableClientCode:!0}),D=o(!0);return{canShowLoading:m,employee_onboarding:e,getBasicDeps:ee,clientCode:Y,bankList:N,country:x,state:T,departmentDetails:S,Managerdetails:L,maritalDetails:P,bloodGroups:V,checkIsQuickOrNormal:h,family_details_disable:b,isSpouseDisable:f,spouseDisable:te,ForCopyAdrress:re,spouseGenderCheck:ae,fnCalculateAge:oe,isNationalityVisible:g,NationalityCheck:ne,RequiredDocument:y,user_code_exists:C,is_ac_no_exists:q,is_mobile_no_exists:I,personal_mail_exists:F,pan_card_exists:E,isQuickOrBulkOnboarding:X,populateQuickOnboardData:j,compensatory_calculation:d,net_calculation:$,gross_calculation:z,statutory_bonus:le,special_allowance_cal:se,child_allowance:ie,food_coupon:ce,lta:_e,other_allowance:de,insurance:pe,graduity:ue,compensatoryCalWhileQuick:Q,Sampledata:G,rules:B,submitForm:W,getPersonalDocuments:O,readonly:s,afterYears:J,beforeYears:K,compen_disable:D}});export{Ye as u};
