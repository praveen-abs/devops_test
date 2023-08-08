import{u as R}from"./leave_apply_service-bfabe98f.js";import{d as U}from"./pinia-f8c56b28.js";import{a as d}from"./index-362795f3.js";import"./dayjs.min-2f06af28.js";import{S as j}from"./Service-6922984d.js";import{H as o,I as q,o as _,c as g,d as e,F as E,f as C,aj as v,h as B,l as D,t as k,at as F,g as T}from"./toastservice.esm-08a9bf8e.js";const $=U("useLeaveModuleStore",()=>{j();const y=o(!1),f=o(),s=o(),b=o(),p=o(),h=o(),m=o(),n=o(),x=o(),u=o(),l=o(),w=o(),S=o(!1),L=o({}),H=t=>{S.value=!0,console.log(t),L.value={...t},L.emp_name=t.name};async function V(){y.value=!0;let t="/get-employee-leave-balance";await d.get(t).then(a=>{console.log(a.data),f.value=a.data,s.value=a.data["Avalied Leaves"]}).finally(()=>{y.value=!1})}async function A(t,a,r){let i=0;await d.get(window.location.origin+"/currentUserCode ").then(c=>{i=c.data}),await d.post("/attendance/getEmployeeLeaveDetails",{user_code:i,filter_month:t,filter_year:a,filter_leave_status:r}).then(c=>{b.value=c.data.data,console.log("getEmployeeLeaveHistory() : "+c.data)})}async function I(t,a,r){let i=0;await d.get(window.location.origin+"/currentUserCode ").then(c=>{i=c.data}),d.post("/attendance/getTeamEmployeesLeaveDetails",{manager_code:i,filter_month:t,filter_year:a,filter_leave_status:r}).then(c=>{p.value=c.data.data,console.log("getTeamLeaveHistory() : "+c.data)})}async function M(t,a,r){d.post("/attendance/getAllEmployeesLeaveDetails",{filter_month:t,filter_year:a,filter_leave_status:r}).then(i=>{h.value=i.data.data,console.log("getOrgLeaveHistory() : "+i.data.data)})}async function N(t){d.post("/attendance/getLeaveInformation",{record_id:t}).then(a=>{w.value=a.data.data,console.log("getLeaveInformation() : "+a.data)})}async function P(t,a){u.value=!0,await d.post("/fetch-org-leaves-balance",{start_date:t,end_date:a}).then(r=>{m.value=r.data}).finally(()=>{u.value=!1})}async function O(t,a){u.value=!0,console.log(t,a),d.post("/fetch-team-leave-balance",{start_date:t,end_date:a}).then(r=>{l.value=r.data}).finally(()=>{u.value=!1})}return{canShowLoading:y,canShowLeaveDetails:S,setLeaveDetails:L,getLeaveDetails:H,array_employeeLeaveHistory:b,array_teamLeaveHistory:p,array_orgLeaveHistory:h,array_employeeLeaveBalance:f,array_employeeAvailedLeaveBalance:s,array_orgLeaveBalance:m,selectedStartDate:n,selectedEndDate:x,canshowloadingsrceen:u,arrayTermLeaveBalance:l,getEmployeeLeaveHistory:A,getTeamLeaveHistory:I,getAllEmployeesLeaveHistory:M,getLeaveInformation:N,getEmployeeLeaveBalance:V,getOrgLeaveBalance:P,getTermLeaveBalance:O}}),z={class:"w-full"},W={class:"mx-auto card top-line"},G={class:"card-body"},J=e("div",{class:"flex justify-between"},[e("h3",{class:"mx-2 my-2 font-semibold"},"Leave Type"),e("a",{href:"/attendance-leave-policydocument",id:"",class:"text-md font-medium border-1 border-orange-400 rounded-lg text-center bg-orange-400 text-white my-auto p-2 dark:text-white",role:"button","aria-expanded":"false"}," Leave Policy Explanation ")],-1),K={class:"grid gap-4 md:grid-cols-3 sm:grid-cols-6 xxl:grid-cols-6 xl:grid-cols-6 lg:grid-cols-6 my-4",style:{display:"grid"}},Q=["onClick"],X={class:"card-body"},Y={class:"text-sm h-10 font-bold text-center text-black dark:text-white"},Z={class:"mx-auto"},ee={class:"text-2xl font-bold text-center dark:text-white"},te=e("span",{class:"text-sm"},"days",-1),ae={class:"mx-auto my-4 card top-line"},oe={class:"card-body row"},le={class:"col-6"},se=e("div",null,[e("h3",{class:"mx-2 my-4 font-semibold"},"Set Range")],-1),ne={class:"mx-1 my-2 mb-3 row"},re=F('<div class="mb-3 col-md-1 col-sm-1 col-lg-4 col-xl-4 col-xxl-4 mb-md-0"><div class="form-group"><div class="floating"><label for="start" class="text-lg font-bold text-center text-black dark:text-white">Start Date</label><br><input class="border-1 my-1 border-orange-300 rounded-lg" type="date" name="" id=""></div></div></div><div class="mb-3 col-md-1 col-sm-1 col-lg-6 col-xl-4 col-xxl-5 mb-md-0"><div class="form-group"><div class="floating" style="text-align:center;"><label for="total" class="text-lg font-bold text-center text-black dark:text-white">Total Days</label></div></div></div><div class="mb-3 col-md-1 col-sm-1 col-lg-3 col-xl-4 col-xxl-3 mb-md-0"><div class="form-group"><div class="floating"><label for="end" class="text-lg font-bold text-center text-black dark:text-white">End Day</label><br><input class="border-1 my-1 border-orange-300 rounded-lg" placeholder="select" type="date" name="" id=""></div></div></div>',3),ce={class:"my-4 row"},de={class:""},ie={class:"form-group"},ve=e("div",{class:"my-2"},[e("h3",{class:"mx-2 my-2 font-semibold"},"Notify To")],-1),me={class:"row"},ue={class:"mt-6 text-right"},_e=["disabled"],ge={class:"col-6"},Le={__name:"leave_apply_v2",setup(y){const f=$(),s=R();q(()=>{s.get_leave_types()});const b=o(!1),p=o(!1),h=m=>{switch(console.log(m),""){case"Sick Leave / Casual Leave":console.log("Sick"),b.value=!0;break;case"Earned Leave":console.log("Earned"),p.value=!0;break;case"Maternity Leave":console.log("Maternity"),active.value=!0;break;case"Paternity Leave":active.value=!0,console.log("Paternity");break;case"On Duty":active.value=!0,console.log("earn");break;case"Compensatory Off":active.value=!0,console.log("Compensatory"),active.value=!0;break;case"Permission":active.value=!0,console.log("Permission");break}};return(m,n)=>{const x=T("Textarea"),u=T("Calendar");return _(),g("div",z,[e("div",W,[e("div",G,[J,e("div",K,[(_(!0),g(E,null,C(v(f).array_employeeLeaveBalance,l=>(_(),g("button",{class:"card p-2 rounded-lg border-1 border-orange-300 cursor-pointer focus:bg-green-100",key:l,onClick:w=>h(l)},[e("div",X,[e("h6",Y,k(l.leave_type),1),e("div",Z,[e("h6",ee,[D(k(l.avalied_leaves)+" ",1),te])])])],8,Q))),128))])])]),e("div",ae,[e("div",oe,[e("div",le,[se,e("div",ne,[re,e("div",ce,[e("div",de,[e("div",ie,[B(x,{autoResize:!0,rows:"3",cols:"90",placeholder:"Enter the Reason",modelValue:v(s).leave_data.leave_reason,"onUpdate:modelValue":n[0]||(n[0]=l=>v(s).leave_data.leave_reason=l),class:"form-control"},null,8,["modelValue"])])])]),ve,e("div",me,[(_(!0),g(E,null,C(v(s).leave_types,l=>(_(),g("div",{class:"p-1 mx-3 my-4 border-2 rounded-lg shadow-md col-lg-3 left-line col-md-3 col-xl-2",key:l.id}))),128))])]),e("div",ue,[e("button",{type:"button",class:"btn btn-border-primary",onClick:n[1]||(n[1]=l=>m.visible=!1)},"Cancel"),e("button",{type:"button",id:"btn_request_leave",class:"mx-4 btn btn-primary",disabled:!(v(s).leave_data.selected_leave.length>0&&v(s).leave_data.leave_reason),onClick:n[2]||(n[2]=(...l)=>v(s).Submit&&v(s).Submit(...l))}," Request Leave",8,_e)])]),e("div",ge,[B(u,{inline:!0,showWeek:!0,style:{"min-width":"100%"}})])])]),D(" "+k(m.active),1)])}}};export{Le as _,$ as u};
