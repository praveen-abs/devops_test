import axios from "axios";
import { defineStore } from "pinia";
import { ref } from "vue";

export const useAttendanceDashboardMainStore = defineStore("useAttendanceDashboardMainStore", () => {

    // Variable Declaration

    const canShowLoading = ref(false);

    const attendanceDashboardMainSource = ref()
    const attendanceOverview = ref()
    const attendanceDashboardWorkShiftSource = ref()
    const canShowShiftDetails = ref(false)
    const canShowAttendanceOverview = ref(false)
    const selectedAttendanceOverviewReport= ref()
    const currentlySelectedShiftDetails = ref([])
    const currentlySelectedShiftName = ref()
    const attendanceDashboardUpcoming = ref()
    const downloadShiftDetails = ref([])
    const downloadAttendanceOverviewDetails = ref([])
    const overallEmployeeCountForExceptionAnalytics = ref()
    const overallEmployeeCountForExceptionAnalyticsForGraph = ref([])
    const totalEmployeeInOrganization = ref()

    const chartDetails = ref([
        { label: 'Absent', backgroundColor: '#FFB1B8' ,count:null },
        { label: 'Present', backgroundColor: '#7A5EA2' ,count:null  },
        { label: 'Leave', backgroundColor: '#8D98B5',count:null  },
        { label: 'Late coming', backgroundColor: '#D9AA63',count:null },
        { label: 'Early going', backgroundColor: '#6BB7C0',count:null  },
        { label: 'Missed out punch', backgroundColor: '#000000' ,count:null },
        { label: 'Missed in punch', backgroundColor: '#000000' ,count:null },
    ])


    const getAttendanceDashboardMainSource = async () => {
        canShowLoading.value = true
        let url = '/get-attendance-dashboard'
        await axios.get(url).then(res => {
            attendanceOverview.value = res.data.attendance_overview

            totalEmployeeInOrganization.value = parseInt(attendanceOverview.value['present_count']) + parseInt(attendanceOverview.value['absent_count']) + parseInt(attendanceOverview.value['leave_emp_count'])
            console.log(" totalEmployeeInOrganization.value" + totalEmployeeInOrganization.value);
            chartDetails.value[0].count = parseInt(attendanceOverview.value['absent_count'])
            chartDetails.value[1].count = parseInt(attendanceOverview.value['present_count'])
            chartDetails.value[2].count = parseInt(attendanceOverview.value['leave_emp_count'])
            chartDetails.value[3].count = parseInt(attendanceOverview.value['lg_count'])
            chartDetails.value[4].count = parseInt(attendanceOverview.value['eg_count'])
            chartDetails.value[5].count = parseInt(attendanceOverview.value['mop_count'])
            chartDetails.value[6].count = parseInt(attendanceOverview.value['mip_count'])


            attendanceDashboardWorkShiftSource.value = res.data.work_shift
            // attendanceDashboardUpcoming.value = res.data.upcomings
            let obj = Object.entries(res.data.upcomings).map(item => {
                return {
                    title: item[0],
                    value: item[1]
                }
            })
            attendanceDashboardUpcoming.value = obj

            let graph = Object.entries(res.data.attendance_overview).map(item => {
                return {
                    title: item[0],
                    value: item[1]
                }
            })
            overallEmployeeCountForExceptionAnalytics.value = graph

            overallEmployeeCountForExceptionAnalytics.value.forEach(element => {
                if (overallEmployeeCountForExceptionAnalytics.value.length > overallEmployeeCountForExceptionAnalyticsForGraph.value.length) {
                    overallEmployeeCountForExceptionAnalyticsForGraph.value.push(element.value)
                }
            });
        }).finally(() => {
            canShowLoading.value = false
        })
    }


    return {
        canShowLoading,
        attendanceDashboardWorkShiftSource, getAttendanceDashboardMainSource,

        attendanceOverview, totalEmployeeInOrganization,chartDetails,

        canShowShiftDetails,canShowAttendanceOverview,selectedAttendanceOverviewReport, currentlySelectedShiftDetails, currentlySelectedShiftName, downloadShiftDetails,downloadAttendanceOverviewDetails,

        attendanceDashboardUpcoming, overallEmployeeCountForExceptionAnalytics, overallEmployeeCountForExceptionAnalyticsForGraph

    }
})
