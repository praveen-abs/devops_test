import { defineStore } from "pinia";
import axios from "axios";
import { S as Service } from "./Service-c5131e0f.mjs";
import { ref } from "vue";
import "autoprefixer";
const useMainDashboardStore = defineStore("mainDashboardStore", () => {
  const service = Service();
  const open = ref(false);
  const canShowTopbar = ref(false);
  const canShowClients = ref(false);
  const canShowOrganization = ref(false);
  const canShowConfiguration = ref(false);
  const canShowCurrentEmployee = ref(false);
  const currentDashboard = ref(0);
  const allEventSource = ref();
  const allNotificationSource = ref([]);
  const leaveBalancePerMonthSource = ref([]);
  const attenanceReportPerMonth = ref([]);
  const canShowLoading = ref(true);
  async function getMainDashboardData(month, year) {
    canShowLoading.value = true;
    await axios.get("/getAllNewDashboardDetails").then((response) => {
      allEventSource.value = response.data.all_events;
      leaveBalancePerMonthSource.value = response.data.leave_balance_per_month;
      attenanceReportPerMonth.value = response.data.attenance_report_permonth;
    }).finally(() => {
      canShowLoading.value = false;
    });
  }
  async function getAttendanceStatus(user_code, date) {
    await axios.get("/getAttendanceStatus", {
      user_code: "PLIPL068",
      date: "2023-06-26"
    }).then((response) => {
      console.log("getAttendanceStatus() : " + response.data);
    }).finally(() => {
    });
  }
  const getCurrentlyLoginUser = () => {
    return axios.get("/currentUserName");
  };
  const updateCheckin_out = (data) => {
    return axios.post("/performAttendanceCheckIn", data);
  };
  const fetch_leave_history = () => {
    return axios.get(
      "http://localhost:8000/fetch-leaverequests/employee/Approved,Rejected,Pending,Revoked,Withdrawn%20"
    );
  };
  const hrDashboardSource = ref();
  const orgEmployeeDetailCount = ref();
  const hrPendingRequestCount = ref();
  const overallEmployeeCount = ref();
  const overallEmployeeCountForGraph = ref([]);
  const getHrDashboardMainSource = () => {
    canShowLoading.value = true;
    axios.get("/get-employees_count-detail").then((res) => {
      console.log(res.data.pending_request_count);
      orgEmployeeDetailCount.value = res.data.employee_details_count;
      let obj = Object.entries(res.data.pending_request_count).map((item) => {
        return {
          title: item[0],
          value: item[1]
        };
      });
      hrPendingRequestCount.value = obj;
      let graph = Object.entries(res.data.graph_chart_count).map((item) => {
        return {
          title: item[0],
          value: item[1]
        };
      });
      overallEmployeeCount.value = graph;
      overallEmployeeCount.value.forEach((element) => {
        overallEmployeeCountForGraph.value.push(element.value);
      });
    }).finally(() => {
      canShowLoading.value = false;
    });
  };
  return {
    service,
    canShowLoading,
    open,
    canShowClients,
    canShowConfiguration,
    canShowCurrentEmployee,
    canShowOrganization,
    canShowTopbar,
    getCurrentlyLoginUser,
    getAttendanceStatus,
    getMainDashboardData,
    updateCheckin_out,
    fetch_leave_history,
    allEventSource,
    leaveBalancePerMonthSource,
    allNotificationSource,
    attenanceReportPerMonth,
    currentDashboard,
    getHrDashboardMainSource,
    hrDashboardSource,
    orgEmployeeDetailCount,
    hrPendingRequestCount,
    overallEmployeeCount,
    overallEmployeeCountForGraph
  };
});
export {
  useMainDashboardStore as u
};
