import{q as be,x as ye,r as t,y as we,z as f,s as ve}from"./app-b9baa456.js";import{S as De}from"./Service-504054d8.js";import{r as n,c as i,e as G,u as Me}from"./index.esm-bb9d444b.js";import{a as g}from"./index-362795f3.js";const qe=be("useNormalOnboardingMainStore",()=>{const _=De();ye("$swal");const h=t(!1),c=we(),e=f({can_onboard_employee:1,emp_client_code:"",employee_code:"",doj:"",aadhar_number:"",passport_number:"",bank_id:"",bank_name:"",employee_name:"",gender:"",pan_number:"",passport_date:"",AccountNumber:"",dob:"",mobile_number:"",dl_no:"",blood_group_name:"",blood_group_id:"",bank_ifsc:"",marital_status:"",marital_status_id:"",email:"",nationality:"",physically_challenged:"",first_letter_emp_name:"",second_letter_emp_name:"",current_address_line_1:"",current_address_line_2:"",current_country:"",current_state:"",current_country_id:"",current_state_id:"",current_city:"",current_pincode:"",permanent_address_line_1:"",permanent_address_line_2:"",permanent_country:"",permanent_state:"",permanent_country_id:"",permanent_state_id:"",permanent_city:"",permanent_pincode:"",department:"",department_id:"",process:"",designation:"",cost_center:"",probation_period:"",work_location:"",l1_manager_code:"",l1_manager_code_id:"",holiday_location:"",officical_mail:"",official_mobile:"",emp_notice:"",confirmation_period:"",father_name:"",dob_father:"",father_gender:"Male",father_age:"",mother_name:"",dob_mother:"",mother_gender:"Female",mother_age:"",spouse_name:"",wedding_date:"",spouse_gender:"",dob_spouse:"",no_of_children:"",basic:"",hra:"",statutory_bonus:"",child_education_allowance:"",food_coupon:"",lta:"",other_allowance:"",special_allowance:"",graduity:"",cic:"",insurance:"",epf_employee:"",epf_employer_contribution:"",esic_employee:"",esic_employer_contribution:"",professional_tax:"",labour_welfare_fund:"",net_income:"0",total_ctc:0,AadharCardFront:"",AadharCardBack:"",PanCardDoc:"",DrivingLicenseDoc:"",EductionDoc:"",VoterIdDoc:"",RelievingLetterDoc:"",PassportDoc:"",save_draft_messege:""}),C=t(!1),b=t(!1),y=t(!1),w=t(),v=t(!1),q=t(),D=t(!1),F=t(!1),Y=t(!1),L=t(!1),N=t(!1),Q=t(!1),M=t(),r=f({AadharFrontIsMandatory:!0,AadharBackIsMandatory:!0,panCardIsMandatory:!0,educationCertificateIsMandatory:!0,passport:!0,DrivingLicense:!0,voterId:!0,RelievingLetter:!0}),Z=(a,o)=>{let s=a.target.files[0];console.log(s),s&&(s.type=="image/jpeg"||s.type=="image/png"||s.type=="application/pdf"?o=="AadharFront"?e.AadharCardFront=a.target.files[0]:o=="AadharBack"?e.AadharCardBack=a.target.files[0]:o=="Pancard"?e.PanCardDoc=a.target.files[0]:o=="DrivingLicense"?e.DrivingLicenseDoc=a.target.files[0]:o=="Passport"?e.PassportDoc=a.target.files[0]:o=="VoterId"?e.VoterIdDoc=a.target.files[0]:o=="EducationCertificate"?e.EductionDoc=a.target.files[0]:o=="RelievingLetter"?e.RelievingLetterDoc=a.target.files[0]:console.log("No more files"):c.add({severity:"error",summary:"Error",detail:"Upload Valid File format",life:3e3}))},x=t(),B=t(),P=t(),S=t(),T=t(),V=t(),R=t(),H=()=>{e.aadhar_number=t("3977 8798 6564"),e.pan_number=t("BGAJP6646F"),e.blood_group_name=t("B Positive"),e.dob=t("23-07-2000"),e.dl_no=t("HR-0619850034761"),e.passport_number=t("A2096457"),e.passport_date=t("23-5-2030"),e.bank_name=t("ANDHRA BANK"),e.physically_challenged=t("No"),e.AccountNumber=t("35216644292"),e.bank_ifsc=t("SBIN0121325"),e.nationality=t("Indian"),e.gender=t("Male"),e.marital_status=t("Married"),e.mobile_number=t("8248023344"),e.current_address_line_1=t("45/21 2nd Avenue,chennai"),e.current_address_line_2=t("45/21 2nd Avenue,chennai"),e.current_country=t("India"),e.current_state=t("Tamil Nadu"),e.current_city=t("chennai"),e.current_pincode=t("600023"),e.permanent_address_line_1=t("45/21 2nd Avenue,chennai"),e.permanent_address_line_2=t("45/21 2nd Avenue,chennai"),e.permanent_country=t("India"),e.permanent_city=t("chennai"),e.permanent_state=t("Tamil Nadu"),e.permanent_pincode=t("600003"),e.department=t("IT"),e.process=t("Iti"),e.cost_center=t("Chennai"),e.holiday_location=t("Tamilnadu"),e.work_location=t("chennai"),e.officical_mail=t("voidmax@gmail.com"),e.official_mobile=t("4646454547"),e.father_name=t("David"),e.father_age=t("45"),e.dob_father=t("23-09-1968"),e.mother_name=t("Licas"),e.dob_mother=t("23-8-1970"),e.mother_gender=t("Female"),e.mother_age=t("35"),e.spouse_gender=t("female"),e.dob_spouse=t("12-8-1995"),e.spouse_name=t("priyanka")},J=()=>{k.value=!1,v.value=!0;let a=parseInt(e.basic)+parseInt(e.hra)+parseInt(e.special_allowance);e.gross=Math.floor(a);let o=e.gross-e.epf_employee-e.esic_employee;e.net_income=o;let s=parseInt(e.gross)+parseInt(e.epf_employer_contribution)+parseInt(e.esic_employer_contribution)+parseInt(e.insurance)+parseInt(e.graduity);e.total_ctc=s};function K(a,o){return a.setFullYear(a.getFullYear()+o),a}function U(a,o){return a.setFullYear(a.getFullYear()-o),a}const W=a=>K(a,18),X=a=>U(a,10),ee=a=>U(a,18),d=a=>a?a.type=="image/jpeg"||a.type=="image/png"||a.type=="application/pdf":!0,A=a=>(console.log("employee_onboarding.spouse_name",e.spouse_name),e.marital_status==2?!!a:!0),j=ve(()=>({employee_code:{},employee_name:{required:n},gender:{},passport_number:{},passport_date:{},blood_group_name:{},physically_challenged:{},gender:{},dl_no:{},nationality:{},doj:{required:n},aadhar_number:{required:i.withMessage("Aadhar number is required",n),validateAadhar:i.withMessage("Invalid aadhar number",a=>/^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/.test(a))},bank_name:{required:n},gender:{required:n},pan_number:{required:i.withMessage("Pan number is required",n),ValidatePan:i.withMessage("Invalid Pan number ",a=>/^([a-zA-Z]){3}([Pp]){1}([a-zA-Z]){1}([0-9]){4}([a-zA-Z]){1}?$/.test(a))},AccountNumber:{required:n,ValidateAccountNo(a){return/^[0-9]{9,18}$/.test(a)}},dob:{required:n},mobile_number:{required:n,maxLength:10},bank_ifsc:{required:i.withMessage("Ifsc code is required",n),ValidateIfscNo:i.withMessage("Invalid Ifsc code",a=>/^[A-Za-z]{4}0[A-Za-z0-9]{6}$/.test(a))},marital_status:{required:n},email:{required:n,email:G},nationality:{required:n},physically_challenged:{},current_address_line_1:{required:n},current_address_line_2:{required:n},current_country:{required:n},current_state:{required:n},current_city:{required:n},current_pincode:{required:n,maxLength:6},permanent_address_line_1:{required:n},permanent_address_line_2:{required:n},permanent_country:{required:n},permanent_state:{required:n},permanent_city:{required:n},permanent_pincode:{required:n,maxLength:6},process:{},designation:{required:n},department:{},cost_center:{},probation_period:{},holiday_location:{},officical_mail:{email:i.withMessage("Enter valid email",G)},official_mobile:{},probation_period:{},emp_notice:{},work_location:{required:n},l1_manager_code:{required:n},confirmation_period:{required:n},father_name:{required:n},dob_father:{required:n},mother_name:{required:n},dob_mother:{required:n},spouse_name:{isMarried:i.withMessage("Spouse name is required",A)},spouse_gender:{isMarried:i.withMessage("Spouse gender is required",A)},dob_spouse:{isMarried:i.withMessage("Spouse dob is required",A)},cic:{},AadharCardFront:{required:i.withMessage("Aadhar front is required",a=>r.AadharFrontIsMandatory?!0:a?!r.AadharFrontIsMandatory:r.AadharFrontIsMandatory),validateFile:i.withMessage("Upload Valid format",d)},AadharCardBack:{required:i.withMessage("Aadhar back is required",a=>r.AadharBackIsMandatory?!0:a?!r.AadharBackIsMandatory:r.AadharBackIsMandatory),validateFile:i.withMessage("Upload Valid format",d)},PanCardDoc:{required:i.withMessage("Pan Card is required",a=>r.panCardIsMandatory?!0:a?!r.panCardIsMandatory:r.panCardIsMandatory),validateFile:i.withMessage("Upload Valid format",d)},DrivingLicenseDoc:{required:i.withMessage("Driving License is required",a=>r.DrivingLicense?!0:a?!r.DrivingLicense:r.DrivingLicense),validateFile:i.withMessage("Upload Valid format",d)},EductionDoc:{required:i.withMessage("Education Certificate is required",a=>r.educationCertificateIsMandatory?!0:a?!r.educationCertificateIsMandatory:r.educationCertificateIsMandatory),validateFile:i.withMessage("Upload Valid format",d)},VoterIdDoc:{required:i.withMessage("Voter Id is required",a=>r.voterId?!0:a?!r.voterId:r.voterId),validateFile:i.withMessage("Upload Valid format",d)},RelievingLetterDoc:{required:i.withMessage("Relieving Letter is required",a=>r.RelievingLetter?!0:a?!r.RelievingLetter:r.RelievingLetter),validateFile:i.withMessage("Upload Valid format",d)},PassportDoc:{required:i.withMessage("passport is required",a=>r.passport?!0:a?!r.passport:r.passport),validateFile:i.withMessage("Upload Valid format",d)}})),m=Me(j,e),$=a=>{console.log(a);let o=new FormData;o.append("can_onboard_employee",e.can_onboard_employee),o.append("emp_client_code",e.emp_client_code),o.append("employee_code",`${e.emp_client_code}${e.employee_code}`),o.append("doj",e.doj?moment(e.doj).format("YYYY-MM-DD"):e.doj),o.append("aadhar_number",e.aadhar_number),o.append("passport_number",e.passport_number),o.append("bank_id",e.bank_name),o.append("employee_name",e.employee_name),o.append(" gender",e.gender),o.append("pan_number",e.pan_number),o.append("passport_date",e.passport_date),o.append("AccountNumber",e.AccountNumber),o.append("dob",e.dob?moment(e.dob).format("YYYY-MM-DD"):e.dob),o.append("mobile_number",e.mobile_number),o.append("dl_no",e.dl_no),o.append("blood_group_name",e.blood_group_name),o.append("bank_ifsc",e.bank_ifsc),o.append("marital_status",e.marital_status),o.append("email",e.email),o.append("nationality",e.nationality),o.append("physically_challenged",e.physically_challenged),o.append("current_address_line_1",e.current_address_line_1),o.append("current_address_line_2",e.current_address_line_2),o.append("current_country",e.current_country),o.append("current_state",e.current_state),o.append("current_city",e.current_city),o.append("current_pincode",e.current_pincode),o.append(" permanent_address_line_1",e.permanent_address_line_1),o.append("permanent_address_line_2",e.permanent_address_line_2),o.append("permanent_country",e.permanent_country),o.append("permanent_state",e.permanent_state),o.append("permanent_city",e.permanent_city),o.append("permanent_pincode",e.permanent_pincode),o.append("department",e.department),o.append("process",e.process),o.append("designation",e.designation),o.append("cost_center",e.cost_center),o.append("probation_period",e.probation_period),o.append("work_location",e.work_location),o.append("l1_manager_code_id",e.l1_manager_code.user_code),o.append("holiday_location",e.holiday_location),o.append("officical_mail",e.officical_mail),o.append("official_mobile",e.official_mobile),o.append("emp_notice",e.emp_notice),o.append("confirmation_period",e.confirmation_period?moment(e.confirmation_period).format("YYYY-MM-DD"):e.confirmation_period),o.append("father_name",e.father_name),e.dob_father==""?o.append("dob_father",e.dob_father):o.append("dob_father",moment(e.dob_father).format("YYYY-MM-DD")),o.append("father_gender",e.father_gender),o.append("father_age",e.father_age),o.append("mother_name",e.mother_name),e.dob_mother==""?o.append("dob_mother",e.dob_mother):o.append("dob_mother",moment(e.dob_mother).format("YYYY-MM-DD")),o.append("mother_gender",e.mother_gender),o.append("mother_age",e.mother_age),o.append("spouse_name",e.spouse_name),e.wedding_date==""?o.append("wedding_date",e.wedding_date):o.append("wedding_date",moment(e.wedding_date).format("YYYY-MM-DD")),o.append("spouse_gender",e.spouse_gender),e.dob_spouse==""?o.append("dob_spouse",e.dob_spouse):o.append("dob_spouse",moment(e.dob_spouse).format("YYYY-MM-DD")),o.append("no_of_children",e.no_of_children),o.append("basic",e.basic),o.append("hra",e.hra),o.append("statutory_bonus",e.statutory_bonus),o.append("child_education_allowance",e.child_education_allowance),o.append("food_coupon",e.food_coupon),o.append("lta",e.lta),o.append("special_allowance",e.special_allowance),o.append("other_allowance",e.other_allowance),o.append("gross",e.gross),o.append("epf_employer_contribution",e.epf_employer_contribution),o.append("graduity",e.graduity),o.append("insurance",e.insurance),o.append("cic",e.total_ctc),o.append("epf_employee",e.epf_employee),o.append("esic_employee",e.esic_employee),o.append("esic_employer_contribution",e.esic_employer_contribution),o.append("professional_tax",e.professional_tax),o.append("labour_welfare_fund",e.labour_welfare_fund),o.append("net_income",e.net_income),o.append("Aadharfront",e.AadharCardFront),o.append("AadharBack",e.AadharCardBack),o.append("panDoc",e.PanCardDoc),o.append("eductionDoc",e.EductionDoc),o.append("releivingDoc",e.RelievingLetterDoc),o.append("voterId",e.VoterIdDoc),o.append("passport",e.PassportDoc),o.append("dlDoc",e.DrivingLicenseDoc),console.log(o),h.value=!0,g.post("/vmt-employee-onboard",o).then(s=>{s.data.status=="success"?(a==1&&setTimeout(()=>{window.location.reload()},1e3),Swal.fire({title:s.data.status="success",text:s.data.message,icon:"success",showCancelButton:!1}).then(u=>{w.value=="quick"&&s.data.can_redirect=="1"&&window.location.reload()})):Swal.fire("Failure",`${s.data.message}`,"error"),e.save_draft_messege=s.data}).catch(function(s){console.log(s)}).finally(()=>{h.value=!1})},ae=a=>{e.can_onboard_employee=a,m.value.$validate(),!F.value&&!Y.value?!L.value&&!N.value&&(a==0?e.employee_code&&e.employee_name&&e.mobile_number&&e.email?($(a),m.value.$reset()):D.value=!0:a==1&&(m.value.$error?(console.log("Form failed validation"),c.add({severity:"error",summary:"Invalid",detail:"fill mandatory fields",life:3e3})):(console.log("Form successfully submitted."),$(a),m.value.$reset()))):console.log("invalid")},oe=()=>{let a=new URL(document.location).searchParams.get("uid");a?g.post("/fetch-quickonboarded-emp-details",{encr_uid:a}).then(o=>{z(o.data)}):(console.log("UID not found in req params"),g.get("/get-client-code").then(o=>{console.log(o.data),q.value=o.data,e.emp_client_code=o.data}))},z=a=>{console.log("populate data"),console.log("populateQuickOnboardData : "+JSON.stringify(a)),w.value=a.onboard_type,a.onboard_type=="quick"||a.onboard_type=="bulk"?(console.log(a.onboard_type+"Onboarding"),v.value=!0,k.value=!1,l.is_emp_code_quick=!0,l.is_doj_quick=!0,l.is_emp_name_quick=!0,l.is_mob_quick=!0,l.is_email_quick=!0,l.statutory=!0,l.child=!0,l.fdc=!0,l.lta=!0,l.other=!0,l.mobile=!0,l.designation=!0,l.isDisableClientCode=!1):console.log("normal onboarding"),console.log(a.onboard_type),e.employee_code=t(a.user_code),e.employee_name=t(a.name),e.dob=t(a.dob),e.marital_status=t(a.marital_status_id),e.gender=t(a.gender),e.aadhar_number=t(a.aadhar_number),e.pan_number=t(a.pan_number),e.dl_no=t(a.dl_no),e.nationality=t(a.nationality),e.blood_group_name=t(a.blood_group_name),e.email=t(a.email),e.doj=t(a.doj),e.mobile_number=t(a.mobile_number),e.designation=t(a.designation),e.l1_manager_code=t(a.l1_manager_code),e.basic=t(a.basic),e.hra=t(a.hra),e.statutory_bonus=t(a.Statutory_bonus),e.child_education_allowance=t(a.child_education_allowance),e.food_coupon=t(a.food_coupon),e.lta=t(a.lta),e.special_allowance=t(a.special_allowance),e.other_allowance=t(a.other_allowance),e.epf_employer_contribution=t(a.epf_employer_contribution),e.esic_employer_contribution=t(a.esic_employer_contribution),e.insurance=t(a.insurance),e.graduity=t(a.graduity),e.epf_employee=t(a.epf_employee),e.esic_employee=t(a.esic_employee),e.professional_tax=t(a.professional_tax),e.labour_welfare_fund=t(a.labour_welfare_fund),e.cic=t(a.cic)},te=()=>{_.getBankList().then(a=>x.value=a.data),_.getCountryList().then(a=>B.value=a.data),_.getStateList().then(a=>S.value=a.data),_.ManagerDetails().then(a=>T.value=a.data),_.DepartmentDetails().then(a=>P.value=a.data),_.getMaritalStatus().then(a=>{V.value=a.data}),_.getBloodGroups().then(a=>R.value=a.data),g.get("/getMandatoryDocumentDetails").then(a=>{M.value=a.data,console.log(a.data)}).finally(()=>{M.value&&(console.log("working"),M.value.forEach(a=>{a.document_name=="Aadhar Card Front"&&a.is_mandatory==1&&(console.log("Aadhar Card Front in man"),r.AadharFrontIsMandatory=!1),a.document_name=="Aadhar Card Back"&&a.is_mandatory==1&&(console.log("Aadhar Card Back in man"),r.AadharBackIsMandatory=!1),a.document_name=="Pan Card"&&a.is_mandatory==1&&(console.log("Pan in man"),r.panCardIsMandatory=!1),a.document_name=="Education Certificate"&&a.is_mandatory==1&&(console.log("Education in man"),r.educationCertificateIsMandatory=!1),a.document_name=="Passport"&&a.is_mandatory==1&&(console.log("Passport in man"),r.passport=!1),a.document_name=="Voter ID"&&a.is_mandatory==1&&(r.voterId=!1),a.document_name=="Driving License"&&a.is_mandatory==1&&(r.DrivingLicense=!1),a.document_name=="Relieving Letter"&&a.is_mandatory==1&&(r.RelievingLetter=!1)}))})},ne=a=>{console.log(a),(a=="Male"||a=="Male")&&(console.log("0"+e.gender),e.spouse_gender="Female",console.log(e.spouse_gender),l.spouse=!0),(a=="Female"||a=="female")&&(e.spouse_gender="Male",console.log("1"+e.gender),console.log(e.spouse_gender),l.spouse=!0),(a=="Others"||a=="others")&&(l.spouse=!1)},re=()=>{if(console.log("Father's Age"+e.dob_father),console.log("Mother's Age"+e.dob_mother),e.dob_father){var a=new Date(e.dob_father);console.log(" birthDate"+a);var o=Date.now()-a.getTime(),s=new Date(o),u=Math.abs(s.getUTCFullYear()-1970);e.father_age=u}if(e.dob_mother){var a=new Date(e.dob_mother);console.log(" birthDate"+a);var o=Date.now()-a.getTime(),s=new Date(o),u=Math.abs(s.getUTCFullYear()-1970);e.mother_age=u}if(e.dob){var a=new Date(e.dob);console.log(" birthDate"+a);var o=Date.now()-a.getTime(),s=new Date(o),u=Math.abs(s.getUTCFullYear()-1970);console.log("calculated Age"+u),u<18&&(console.log("not less than 18"),e.dob="")}},se=()=>{e.marital_status==2||e.marital_status==2?b.value=!0:b.value=!1},ie=()=>{e.nationality=="Other Nationality"?y.value=!0:y.value=!1},le=()=>{C.value==!1?(e.permanent_address_line_1=e.current_address_line_1,e.permanent_address_line_2=e.current_address_line_2,e.permanent_country=e.current_country,e.permanent_state=e.current_state,e.permanent_city=e.current_city,e.permanent_pincode=e.current_pincode):C.value==!0&&(e.permanent_address_line_1="",e.permanent_address_line_2="",e.permanent_country="",e.permanent_city="",e.permanent_state="",e.permanent_pincode="")};f({});const I=t(),p=()=>{let a=e.cic*50/100;console.log("Basic :"+Math.floor(a)),e.basic=Math.floor(a);let o=e.basic*50/100;e.hra=Math.floor(o),e.special_allowance=e.basic-e.hra,console.log(e.special_allowance),I.value=a+o+e.special_allowance,console.log("Actual gross"+I.value);let s=a+o+e.special_allowance;e.gross=Math.floor(s),console.log("Gross",Math.floor(s)),he(),setTimeout(()=>{O()},1e3),setTimeout(()=>{E()},1e3)},E=()=>{e.net_income=e.gross-e.epf_employee-e.esic_employee},O=()=>{e.total_ctc=e.gross+e.epf_employer_contribution+e.esic_employer_contribution+e.insurance+e.graduity,console.log("ctc"+e.total_ctc)},ce=()=>{let a=e.statutory_bonus,o=e.special_allowance;console.log(a,o),console.log(o-a),setTimeout(()=>{e.special_allowance=o-a,e.special_allowance<0&&(c.add({severity:"error",summary:" Special Allowance",detail:"Not less than zero",life:3e3}),p(),e.statutory_bonus="",e.child_education_allowance="",e.food_coupon="",e.lta="",e.other_allowance="")},1e3)},de=()=>{let a=e.statutory_bonus+e.child_education_allowance+e.food_coupon+e.other_allowance,o=e.special_allowance;console.log(a,o),console.log(o-a),setTimeout(()=>{e.special_allowance=o-a,e.special_allowance<0&&(c.add({severity:"error",summary:" Special Allowance",detail:"Not less than zero",life:3e3}),p(),e.statutory_bonus="",e.child_education_allowance="",e.food_coupon="",e.lta="",e.other_allowance="")},3e3)},_e=()=>{let a=e.child_education_allowance,o=e.special_allowance;console.log(a,o),setTimeout(()=>{e.special_allowance=o-a,e.special_allowance<0&&(c.add({severity:"error",summary:" Special Allowance",detail:"Not less than zero",life:3e3}),p(),e.statutory_bonus="",e.child_education_allowance="",e.food_coupon="",e.lta="",e.other_allowance="")},1100)},pe=()=>{let a=e.food_coupon,o=e.special_allowance;console.log(a,o),setTimeout(()=>{e.special_allowance=o-a,e.special_allowance<0&&(c.add({severity:"error",summary:" Special Allowance",detail:"Not less than zero",life:3e3}),p(),e.statutory_bonus="",e.child_education_allowance="",e.food_coupon="",e.lta="",e.other_allowance="")},1150)},ue=()=>{let a=e.lta,o=e.special_allowance;console.log(a,o),setTimeout(()=>{e.special_allowance=o-a,e.special_allowance<0&&(c.add({severity:"error",summary:" Special Allowance",detail:"Not less than zero",life:2e3}),p(),e.statutory_bonus="",e.child_education_allowance="",e.food_coupon="",e.lta="",e.other_allowance="")},1200)},me=()=>{let a=e.other_allowance,o=e.special_allowance;console.log(a,o),setTimeout(()=>{e.special_allowance=o-a,e.special_allowance<0&&(c.add({severity:"error",summary:" Special Allowance",detail:"Not less than zero",life:3e3}),p(),e.statutory_bonus="",e.child_education_allowance="",e.food_coupon="",e.lta="",e.other_allowance="")},1250)},fe=()=>{let a=e.total_ctc;console.log("total"+a);let o=parseInt(a)+parseInt(e.insurance);console.log("sum "+o),setTimeout(()=>{e.total_ctc=o},1e3)},ge=()=>{let a=e.total_ctc;console.log("total"+a);let o=parseInt(e.total_ctc)+parseInt(e.graduity);console.log(o),console.log(e.total_ctc),setTimeout(()=>{e.total_ctc=o},2e3)},he=()=>{let a=e.gross-e.hra,o=I.value;if(console.log("EpfCalculation:"+a),a<15e3)e.epf_employer_contribution=Math.floor(a*12/100),e.epf_employee=Math.floor(a*12/100);else if(a>15e3){let s=1800;e.epf_employee=s,e.epf_employer_contribution=s}if(o<=21e3)e.esic_employer_contribution=Math.floor(e.gross*3.25/100),e.esic_employee=Math.floor(e.gross*.75/100);else if(o>21e3){console.log(o);let s=0;e.esic_employee=s,e.esic_employer_contribution=s}},l=f({is_emp_code_quick:!1,is_emp_name_quick:!1,is_doj_quick:!1,is_mob_quick:!1,is_email_quick:!1,statutory:!1,child:!1,fdc:!1,lta:!1,other:!1,l1_code:!1,designation:!1,mobile:!1,spouse:!1,isDisableClientCode:!0}),k=t(!0);return{canShowLoading:h,employee_onboarding:e,getBasicDeps:te,clientCode:q,bankList:x,country:B,state:S,departmentDetails:P,Managerdetails:T,maritalDetails:V,bloodGroups:R,checkIsQuickOrNormal:w,family_details_disable:v,isSpouseDisable:b,spouseDisable:se,ForCopyAdrress:le,spouseGenderCheck:ne,fnCalculateAge:re,isNationalityVisible:y,NationalityCheck:ie,RequiredDocument:D,user_code_exists:F,is_ac_no_exists:N,is_mobile_no_exists:L,personal_mail_exists:Y,pan_card_exists:Q,isQuickOrBulkOnboarding:oe,populateQuickOnboardData:z,compensatory_calculation:p,net_calculation:E,gross_calculation:O,statutory_bonus:ce,special_allowance_cal:de,child_allowance:_e,food_coupon:pe,lta:ue,other_allowance:me,insurance:fe,graduity:ge,compensatoryCalWhileQuick:J,Sampledata:H,rules:j,submitForm:ae,getPersonalDocuments:Z,readonly:l,afterYears:W,beforeYears:X,compen_disable:k,dateOfBirth:ee}});export{qe as u};
