import { ref, reactive, onMounted, resolveComponent, mergeProps, unref, withCtx, createVNode, useSSRContext, openBlock, createBlock, createCommentVNode, createTextVNode } from "vue";
import { ssrRenderAttrs, ssrRenderComponent, ssrRenderStyle, ssrRenderList, ssrInterpolate, ssrRenderAttr } from "vue/server-renderer";
import axios from "axios";
import { useToast } from "primevue/usetoast";
import dayjs from "dayjs";
import { defineStore } from "pinia";
import "moment";
import "dateformat";
import "primevue/api";
import "primevue/useconfirm";
const useHolidayStore = defineStore("useHolidayStore", () => {
  useToast();
  const canShowLoading = ref(false);
  const DialogAddNewHoliday = ref(false);
  const holidayData = ref();
  const arrayholidayMaster = ref();
  const arrayCreateNewList = ref();
  const activeHolidaysPage = ref(1);
  const arrayHolidaysList = ref();
  const CreateNewListDialog = ref(false);
  const editHoliday = ref(false);
  const storeeditID = ref();
  const addNewHoliday = reactive({
    FestivalTitle: "",
    Description: "",
    date: "",
    Holiday_Photo: ""
  });
  const CreateNewList = reactive({
    List_Name: "",
    ChooseTheHolidays: ""
  });
  const AssignToLocation = reactive({
    location: "",
    ChooseTheHolidays: ""
  });
  const chooseHolidaylist = reactive([]);
  const ChooseTheHolidays = ref();
  const selectedHolidays = reactive([]);
  let forms = new FormData();
  const avatar = ref();
  const FestivalPhoto = (e) => {
    if (e.target.files && e.target.files[0]) {
      addNewHoliday.Holiday_Photo = e.target.files[0];
      avatar.value = window.URL.createObjectURL(e.target.files[0]);
      console.log(addNewHoliday.Holiday_Photo);
      forms.append("file", addNewHoliday.Holiday_Photo);
      console.log(forms);
    }
  };
  const getHolidays = async () => {
    canShowLoading.value = true;
    await axios.get("/holiday/master-page").then((res) => {
      console.log(res.data);
      holidayData.value = res.data;
    }).finally(() => {
      canShowLoading.value = false;
    });
  };
  const sumbitAddNewHoliday = () => {
    DialogAddNewHoliday.value = false;
    let url = `holiday/create_holiday`;
    let form = new FormData();
    form.append("holiday_name", addNewHoliday.FestivalTitle);
    form.append("holiday_description", addNewHoliday.Description);
    form.append("holiday_date", addNewHoliday.date);
    form.append("holiday_image", addNewHoliday.Holiday_Photo);
    axios.post(url, form).then(() => {
    }).finally(() => {
      getHolidays();
    });
  };
  const getHolidaysMaster = async () => {
    await axios.get("http://localhost:3000/HolidayMaster").then((res) => {
      console.log(res.data);
      arrayholidayMaster.value = res.data;
    });
  };
  const getHolidaylist = async () => {
    await axios.get("/holidays/add_holidayslist").then((res) => {
      arrayHolidaysList.value = res.data;
    });
  };
  const getCreateNewList = async () => {
    await axios.get("/holidays/show_holidaysListDetails").then((res) => {
      console.log(res.data);
      arrayCreateNewList.value = res.data;
    });
  };
  const SubmitCreateNewList = () => {
    for (var key in ChooseTheHolidays.value) {
      let data = {
        "id": ChooseTheHolidays.value[key].id,
        "holiday": ChooseTheHolidays.value[key].holiday_name
      };
      selectedHolidays.push(data);
    }
    console.log(selectedHolidays);
    axios.post("holiday/create_holidaylist", {
      name: CreateNewList.List_Name,
      holiday_list_id: selectedHolidays
    }).then((res) => {
      res.data;
    }).finally(() => {
      getHolidays();
      CreateNewListDialog.value = false;
    });
  };
  const SubmitAddNewLocation = () => {
    axios.post("holiday/create_holidaylocation", {
      name: AssignToLocation.location,
      vmt_holidays_list_id: AssignToLocation.ChooseTheHolidays.id
    }).finally(() => {
    });
  };
  const getHolidayName = () => {
    console.log(ChooseTheHolidays.value);
  };
  async function RemoveHolidayList(data) {
    let holiday = {
      id: data.id,
      image_url: data.holiday_name
    };
    console.log(holiday.id);
    let url = `holidays/delete_holiday`;
    axios.post(
      url,
      holiday
    ).then(() => {
    }).finally(() => {
      getHolidays();
    });
  }
  function editHolidaylist(data) {
    editHoliday.value = true;
    console.log(data);
    storeeditID.value = data.id;
    addNewHoliday.FestivalTitle = data.holiday_name;
    addNewHoliday.Description = data.holiday_description;
    addNewHoliday.date = data.holiday_date;
    addNewHoliday.Holiday_Photo = data.image;
  }
  function sumbiteditHoliday() {
    let url = `holidays/update_holiday`;
    let form = new FormData();
    form.append("id", storeeditID.value);
    form.append("holiday_name", addNewHoliday.FestivalTitle);
    form.append("holiday_description", addNewHoliday.Description);
    form.append("holiday_date", addNewHoliday.date);
    form.append("holiday_image", addNewHoliday.Holiday_Photo);
    axios.post(url, form).then(() => {
    }).finally(() => {
      getHolidays();
    });
  }
  return {
    holidayData,
    activeHolidaysPage,
    CreateNewList,
    AssignToLocation,
    arrayholidayMaster,
    canShowLoading,
    addNewHoliday,
    chooseHolidaylist,
    arrayCreateNewList,
    arrayHolidaysList,
    CreateNewListDialog,
    DialogAddNewHoliday,
    getHolidays,
    SubmitCreateNewList,
    SubmitAddNewLocation,
    getHolidaysMaster,
    getHolidaylist,
    getHolidayName,
    ChooseTheHolidays,
    FestivalPhoto,
    sumbitAddNewHoliday,
    avatar,
    getCreateNewList,
    editHolidaylist,
    editHoliday,
    sumbiteditHoliday,
    RemoveHolidayList
  };
});
const _sfc_main$2 = {
  __name: "CreateNewHolidaysList",
  __ssrInlineRender: true,
  setup(__props) {
    const useStore = useHolidayStore();
    onMounted(async () => {
      await useStore.getCreateNewList();
      await useStore.getHolidaylist();
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Calendar = resolveComponent("Calendar");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_InputText = resolveComponent("InputText");
      const _component_MultiSelect = resolveComponent("MultiSelect");
      const _component_Button = resolveComponent("Button");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "card px-3" }, _attrs))}><div class="w-full d-flex justify-between my-4">`);
      _push(ssrRenderComponent(_component_Calendar, {
        modelValue: _ctx.date,
        "onUpdate:modelValue": ($event) => _ctx.date = $event
      }, null, _parent));
      _push(`<div class=""><button class="btn font-semibold border-orange-400 text-orange-500 mr-4 bg-transparent px-5">Cancel</button><button class="btn btn-orange ml-3 font-semibold"><i class="pi pi-plus-circle"></i><span class="pl-2 font-semibold text-white fs-6">Create New List</span></button></div></div><div class="card">`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(useStore).arrayCreateNewList,
        ref: "dt",
        dataKey: "id",
        paginator: true,
        rows: 10,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              header: "Holiday List",
              field: "name",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "no_of_holidays",
              header: "No of Holidays",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "location",
              header: "Location",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "json_popups_value.to_month",
              header: "Actions",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                header: "Holiday List",
                field: "name",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "no_of_holidays",
                header: "No of Holidays",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "location",
                header: "Location",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "json_popups_value.to_month",
                header: "Actions",
                style: { "min-width": "12rem" }
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        visible: unref(useStore).CreateNewListDialog,
        "onUpdate:visible": ($event) => unref(useStore).CreateNewListDialog = $event,
        modal: "",
        header: "Holiday ",
        style: [{ width: "38vw" }, { "border-top": "5px solid #002f56" }],
        class: "popup_card"
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h1 class="border-l-4 border-orange-400 fs-5 fw-bold pl-3"${_scopeId}>Create New List</h1></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h1", { class: "border-l-4 border-orange-400 fs-5 fw-bold pl-3" }, "Create New List")
              ])
            ];
          }
        }),
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<button class="btn border-orange-400 text-orange-500 fw-semibold py-2 px-5" style="${ssrRenderStyle({ "padding": "9px 20px !important" })}"${_scopeId}> Close</button>`);
            _push2(ssrRenderComponent(_component_Button, {
              label: "Create",
              class: "bg-orange-500 border-none",
              icon: "pi pi-plus-circle",
              onClick: unref(useStore).SubmitCreateNewList,
              autofocus: ""
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode("button", {
                class: "btn border-orange-400 text-orange-500 fw-semibold py-2 px-5",
                style: { "padding": "9px 20px !important" },
                onClick: ($event) => unref(useStore).CreateNewListDialog = false
              }, " Close", 8, ["onClick"]),
              createVNode(_component_Button, {
                label: "Create",
                class: "bg-orange-500 border-none",
                icon: "pi pi-plus-circle",
                onClick: unref(useStore).SubmitCreateNewList,
                autofocus: ""
              }, null, 8, ["onClick"])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="flex-column my-3 mx-5"${_scopeId}><div class="row d-flex align-items-center"${_scopeId}><div class="col"${_scopeId}><h1 class="text-gray-700 fs-4 font-semibold"${_scopeId}>Holiday List</h1></div><div class="col"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              class: "w-full h-12",
              modelValue: unref(useStore).CreateNewList.List_Name,
              "onUpdate:modelValue": ($event) => unref(useStore).CreateNewList.List_Name = $event
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class="row my-2 mb-4 d-flex align-items-center"${_scopeId}><div class="col"${_scopeId}><h1 class="text-gray-700 fs-4 font-semibold"${_scopeId}>Choose The Holidays</h1></div><div class="col"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_MultiSelect, {
              modelValue: unref(useStore).ChooseTheHolidays,
              "onUpdate:modelValue": ($event) => unref(useStore).ChooseTheHolidays = $event,
              options: unref(useStore).arrayHolidaysList,
              optionLabel: "holiday_name",
              placeholder: "Select Cities",
              maxSelectedLabels: 3,
              class: "w-full h-12",
              style: { "width": "245px !important" },
              onChange: ($event) => unref(useStore).getHolidayName()
            }, null, _parent2, _scopeId));
            _push2(`</div></div></div>`);
          } else {
            return [
              createVNode("div", { class: "flex-column my-3 mx-5" }, [
                createVNode("div", { class: "row d-flex align-items-center" }, [
                  createVNode("div", { class: "col" }, [
                    createVNode("h1", { class: "text-gray-700 fs-4 font-semibold" }, "Holiday List")
                  ]),
                  createVNode("div", { class: "col" }, [
                    createVNode(_component_InputText, {
                      type: "text",
                      class: "w-full h-12",
                      modelValue: unref(useStore).CreateNewList.List_Name,
                      "onUpdate:modelValue": ($event) => unref(useStore).CreateNewList.List_Name = $event
                    }, null, 8, ["modelValue", "onUpdate:modelValue"])
                  ])
                ]),
                createVNode("div", { class: "row my-2 mb-4 d-flex align-items-center" }, [
                  createVNode("div", { class: "col" }, [
                    createVNode("h1", { class: "text-gray-700 fs-4 font-semibold" }, "Choose The Holidays")
                  ]),
                  createVNode("div", { class: "col" }, [
                    createVNode(_component_MultiSelect, {
                      modelValue: unref(useStore).ChooseTheHolidays,
                      "onUpdate:modelValue": ($event) => unref(useStore).ChooseTheHolidays = $event,
                      options: unref(useStore).arrayHolidaysList,
                      optionLabel: "holiday_name",
                      placeholder: "Select Cities",
                      maxSelectedLabels: 3,
                      class: "w-full h-12",
                      style: { "width": "245px !important" },
                      onChange: ($event) => unref(useStore).getHolidayName()
                    }, null, 8, ["modelValue", "onUpdate:modelValue", "options", "onChange"])
                  ])
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: unref(useStore).canShowLoading,
        "onUpdate:visible": ($event) => unref(useStore).canShowLoading = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "25vw" },
        modal: true,
        closable: false,
        closeOnEscape: false
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_ProgressSpinner, {
              style: { "width": "50px", "height": "50px" },
              strokeWidth: "8",
              fill: "var(--surface-ground)",
              animationDuration: "2s",
              "aria-label": "Custom ProgressSpinner"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_ProgressSpinner, {
                style: { "width": "50px", "height": "50px" },
                strokeWidth: "8",
                fill: "var(--surface-ground)",
                animationDuration: "2s",
                "aria-label": "Custom ProgressSpinner"
              })
            ];
          }
        }),
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h5 style="${ssrRenderStyle({ "text-align": "center" })}"${_scopeId}>Please wait...</h5>`);
          } else {
            return [
              createVNode("h5", { style: { "text-align": "center" } }, "Please wait...")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div>`);
    };
  }
};
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/holidays/CreateNewHolidaysList.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const _sfc_main$1 = {
  __name: "Holidays_Master",
  __ssrInlineRender: true,
  setup(__props) {
    const useStore = useHolidayStore();
    const canshowAddNewLocation = ref(false);
    onMounted(async () => {
      await useStore.getHolidaysMaster();
    });
    const selectedRowdata = ref();
    ref();
    ref([
      { name: "TN_200", code: 1 },
      { name: "TN_201", code: 2 },
      { name: "TN_202", code: 3 },
      { name: "TN_203", code: 4 },
      { name: "TN_204", code: 5 }
    ]);
    const ViewHolidaysList = (val) => {
      selectedRowdata.value = val;
      useStore.activeHolidaysPage = 2;
      console.log(useStore.activeHolidaysPage);
      console.log(selectedRowdata.value);
      console.log("ViewHolidaysList");
    };
    const DeleteHolidayList = (val) => {
      selectedRowdata.value = val;
      console.log(selectedRowdata.value);
      console.log("DeleteHolidayList");
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Calendar = resolveComponent("Calendar");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Button = resolveComponent("Button");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_InputText = resolveComponent("InputText");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      _push(`<!--[-->`);
      if (unref(useStore).activeHolidaysPage === 2) {
        _push(`<div class="card"><div class="px-3"><div class="w-full d-flex justify-between my-4">`);
        _push(ssrRenderComponent(_component_Calendar, {
          modelValue: _ctx.date,
          "onUpdate:modelValue": ($event) => _ctx.date = $event
        }, null, _parent));
        _push(`<div class=""><button class="btn bg-blue-900 text-light fw-bold">View All Hoildays</button><button class="btn btn-orange ml-3 fw-bold"><i class="pi pi-plus-circle"></i><span class="pl-2 fw-bold fs-6">Add New Location</span></button></div></div>`);
        _push(ssrRenderComponent(_component_DataTable, {
          value: unref(useStore).arrayholidayMaster,
          ref: "dt",
          dataKey: "id",
          paginator: true,
          rows: 10,
          paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
          rowsPerPageOptions: [5, 10, 25],
          currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
          responsiveLayout: "scroll"
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(ssrRenderComponent(_component_Column, {
                field: "Location",
                header: "Location",
                style: { "min-width": "12rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                header: "Holidays List",
                field: "Holidays_List",
                style: { "min-width": "8rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "NoOfHolidays",
                header: "No of Holidays",
                style: { "min-width": "12rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                header: "Employees",
                field: "Employees",
                style: { "min-width": "8rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "Action",
                header: "Actions",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<span${_scopeId2}>`);
                    _push3(ssrRenderComponent(_component_Button, {
                      type: "button",
                      icon: "pi pi-eye",
                      class: "p-button-success Button",
                      label: "View",
                      onClick: ($event) => ViewHolidaysList(slotProps.data.Holidays_List),
                      style: { "height": "2.5em" }
                    }, null, _parent3, _scopeId2));
                    _push3(ssrRenderComponent(_component_Button, {
                      type: "button",
                      icon: "pi pi-trash",
                      class: "p-button-danger Button",
                      label: "Delete",
                      style: { "margin-left": "8px", "height": "2.5em" },
                      onClick: ($event) => DeleteHolidayList(slotProps.data.id, slotProps.data.Holidays_List)
                    }, null, _parent3, _scopeId2));
                    _push3(`</span>`);
                  } else {
                    return [
                      createVNode("span", null, [
                        createVNode(_component_Button, {
                          type: "button",
                          icon: "pi pi-eye",
                          class: "p-button-success Button",
                          label: "View",
                          onClick: ($event) => ViewHolidaysList(slotProps.data.Holidays_List),
                          style: { "height": "2.5em" }
                        }, null, 8, ["onClick"]),
                        createVNode(_component_Button, {
                          type: "button",
                          icon: "pi pi-trash",
                          class: "p-button-danger Button",
                          label: "Delete",
                          style: { "margin-left": "8px", "height": "2.5em" },
                          onClick: ($event) => DeleteHolidayList(slotProps.data.id, slotProps.data.Holidays_List)
                        }, null, 8, ["onClick"])
                      ])
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
            } else {
              return [
                createVNode(_component_Column, {
                  field: "Location",
                  header: "Location",
                  style: { "min-width": "12rem" }
                }),
                createVNode(_component_Column, {
                  header: "Holidays List",
                  field: "Holidays_List",
                  style: { "min-width": "8rem" }
                }),
                createVNode(_component_Column, {
                  field: "NoOfHolidays",
                  header: "No of Holidays",
                  style: { "min-width": "12rem" }
                }),
                createVNode(_component_Column, {
                  header: "Employees",
                  field: "Employees",
                  style: { "min-width": "8rem" }
                }),
                createVNode(_component_Column, {
                  field: "Action",
                  header: "Actions",
                  style: { "min-width": "12rem" }
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("span", null, [
                      createVNode(_component_Button, {
                        type: "button",
                        icon: "pi pi-eye",
                        class: "p-button-success Button",
                        label: "View",
                        onClick: ($event) => ViewHolidaysList(slotProps.data.Holidays_List),
                        style: { "height": "2.5em" }
                      }, null, 8, ["onClick"]),
                      createVNode(_component_Button, {
                        type: "button",
                        icon: "pi pi-trash",
                        class: "p-button-danger Button",
                        label: "Delete",
                        style: { "margin-left": "8px", "height": "2.5em" },
                        onClick: ($event) => DeleteHolidayList(slotProps.data.id, slotProps.data.Holidays_List)
                      }, null, 8, ["onClick"])
                    ])
                  ]),
                  _: 1
                })
              ];
            }
          }),
          _: 1
        }, _parent));
        _push(ssrRenderComponent(_component_Dialog, {
          visible: canshowAddNewLocation.value,
          "onUpdate:visible": ($event) => canshowAddNewLocation.value = $event,
          modal: "",
          header: "Holiday ",
          style: [{ width: "38vw" }, { "border-top": "5px solid #002f56" }],
          class: "popup_card"
        }, {
          header: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`<div${_scopeId}><h1 class="border-l-4 border-orange-400 fs-5 fw-bold pl-3"${_scopeId}>Assign To Location</h1></div>`);
            } else {
              return [
                createVNode("div", null, [
                  createVNode("h1", { class: "border-l-4 border-orange-400 fs-5 fw-bold pl-3" }, "Assign To Location")
                ])
              ];
            }
          }),
          footer: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(ssrRenderComponent(_component_Button, {
                label: "Cancel",
                class: "border-orange-400 text-orange-500 mr-4 bg-white",
                onClick: ($event) => _ctx.canshowDialog = false,
                text: ""
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Button, {
                label: "Create",
                class: "bg-orange-500 border-none",
                icon: "pi pi-plus-circle",
                onClick: unref(useStore).SubmitAddNewLocation,
                autofocus: ""
              }, null, _parent2, _scopeId));
            } else {
              return [
                createVNode(_component_Button, {
                  label: "Cancel",
                  class: "border-orange-400 text-orange-500 mr-4 bg-white",
                  onClick: ($event) => _ctx.canshowDialog = false,
                  text: ""
                }, null, 8, ["onClick"]),
                createVNode(_component_Button, {
                  label: "Create",
                  class: "bg-orange-500 border-none",
                  icon: "pi pi-plus-circle",
                  onClick: unref(useStore).SubmitAddNewLocation,
                  autofocus: ""
                }, null, 8, ["onClick"])
              ];
            }
          }),
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`<div class="flex-column my-3 mx-5"${_scopeId}><div style="${ssrRenderStyle({})}" class="w-full border h-48"${_scopeId}></div><div class="row d-flex align-items-center mt-4"${_scopeId}><div class="col-5"${_scopeId}><h1 class="text-gray-700 fs-5 font-semibold"${_scopeId}>Location</h1></div><div class="col"${_scopeId}>`);
              _push2(ssrRenderComponent(_component_InputText, {
                type: "text",
                class: "w-full h-12",
                modelValue: unref(useStore).AssignToLocation.location,
                "onUpdate:modelValue": ($event) => unref(useStore).AssignToLocation.location = $event
              }, null, _parent2, _scopeId));
              _push2(`</div></div><div class="row my-2 mb-4 d-flex align-items-center"${_scopeId}><div class="col-5"${_scopeId}><h1 class="text-gray-700 fs-5 font-semibold"${_scopeId}>Choose Holidays List</h1></div><div class="col"${_scopeId}>`);
              _push2(ssrRenderComponent(_component_Dropdown, {
                modelValue: unref(useStore).AssignToLocation.ChooseTheHolidays,
                "onUpdate:modelValue": ($event) => unref(useStore).AssignToLocation.ChooseTheHolidays = $event,
                options: unref(useStore).arrayCreateNewList,
                optionLabel: "name",
                placeholder: "",
                class: "w-full"
              }, null, _parent2, _scopeId));
              _push2(`</div></div></div>`);
            } else {
              return [
                createVNode("div", { class: "flex-column my-3 mx-5" }, [
                  createVNode("div", {
                    style: {},
                    class: "w-full border h-48"
                  }),
                  createVNode("div", { class: "row d-flex align-items-center mt-4" }, [
                    createVNode("div", { class: "col-5" }, [
                      createVNode("h1", { class: "text-gray-700 fs-5 font-semibold" }, "Location")
                    ]),
                    createVNode("div", { class: "col" }, [
                      createVNode(_component_InputText, {
                        type: "text",
                        class: "w-full h-12",
                        modelValue: unref(useStore).AssignToLocation.location,
                        "onUpdate:modelValue": ($event) => unref(useStore).AssignToLocation.location = $event
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])
                    ])
                  ]),
                  createVNode("div", { class: "row my-2 mb-4 d-flex align-items-center" }, [
                    createVNode("div", { class: "col-5" }, [
                      createVNode("h1", { class: "text-gray-700 fs-5 font-semibold" }, "Choose Holidays List")
                    ]),
                    createVNode("div", { class: "col" }, [
                      createVNode(_component_Dropdown, {
                        modelValue: unref(useStore).AssignToLocation.ChooseTheHolidays,
                        "onUpdate:modelValue": ($event) => unref(useStore).AssignToLocation.ChooseTheHolidays = $event,
                        options: unref(useStore).arrayCreateNewList,
                        optionLabel: "name",
                        placeholder: "",
                        class: "w-full"
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])
                    ])
                  ])
                ])
              ];
            }
          }),
          _: 1
        }, _parent));
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: unref(useStore).canShowLoading,
        "onUpdate:visible": ($event) => unref(useStore).canShowLoading = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "25vw" },
        modal: true,
        closable: false,
        closeOnEscape: false
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_ProgressSpinner, {
              style: { "width": "50px", "height": "50px" },
              strokeWidth: "8",
              fill: "var(--surface-ground)",
              animationDuration: "2s",
              "aria-label": "Custom ProgressSpinner"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_ProgressSpinner, {
                style: { "width": "50px", "height": "50px" },
                strokeWidth: "8",
                fill: "var(--surface-ground)",
                animationDuration: "2s",
                "aria-label": "Custom ProgressSpinner"
              })
            ];
          }
        }),
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h5 style="${ssrRenderStyle({ "text-align": "center" })}"${_scopeId}>Please wait...</h5>`);
          } else {
            return [
              createVNode("h5", { style: { "text-align": "center" } }, "Please wait...")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<div>`);
      _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
      _push(`</div><!--]-->`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/holidays/Holidays_Master.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const Holidays_Lists_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "Holidays_Lists",
  __ssrInlineRender: true,
  setup(__props) {
    const useStore = useHolidayStore();
    ref(false);
    const showconfirmationdialog = ref(false);
    const holidayremoveList = ref();
    ref(null);
    ref();
    useToast();
    onMounted(async () => {
      await useStore.getHolidays();
      await useStore.getHolidaylist();
    });
    async function removeholidaylist() {
      showconfirmationdialog.value = false;
      await useStore.RemoveHolidayList(holidayremoveList.value);
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_InputText = resolveComponent("InputText");
      const _component_MultiSelect = resolveComponent("MultiSelect");
      const _component_Button = resolveComponent("Button");
      const _component_Calendar = resolveComponent("Calendar");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "p-5 card main-body" }, _attrs))}>`);
      if (unref(useStore).activeHolidaysPage === 2) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="head-contant d_spc_bt d-flex flex-wrap"><h3 class="fs-4 fw-bold mb-3">Holiday Summary</h3><div class="holiday-settings-btns"><ul class="d-flex flex-wrap"><li><button class="add_new_holiday_btn bg-orange-500 text-white"><i class="pi pi-plus-circle"></i> <span class="fs-6 fw-semibold">Create New List</span></button></li></ul></div></div><div class="grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4" style="${ssrRenderStyle({ "display": "grid" })}"><!--[-->`);
      ssrRenderList(unref(useStore).holidayData, (holiday) => {
        _push(`<div><div class="col w-full mx-4"><div class="m-0 card-title d_spc_bt align-items-center w-full"><h3 class="fs-5">${ssrInterpolate(holiday.holiday_name)}</h3><span class="fs-6">${ssrInterpolate(unref(dayjs)(holiday.holiday_date).format("DD-MMM-YYYY"))}</span></div><div class="card clr-trans card-w h-48 w-full">`);
        if (holiday.image) {
          _push(`<img class="card-img-top"${ssrRenderAttr("src", `data:image/png;base64,${holiday.image}`)} srcset="" alt="">`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div></div>`);
      });
      _push(`<!--]--></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: unref(useStore).CreateNewListDialog,
        "onUpdate:visible": ($event) => unref(useStore).CreateNewListDialog = $event,
        modal: "",
        header: "Holiday ",
        style: [{ width: "38vw" }, { "border-top": "5px solid #002f56" }],
        class: "popup_card"
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h1 class="border-l-4 border-orange-400 fs-5 fw-bold pl-3"${_scopeId}>Create New List</h1></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h1", { class: "border-l-4 border-orange-400 fs-5 fw-bold pl-3" }, "Create New List")
              ])
            ];
          }
        }),
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<button class="btn border-orange-400 text-orange-500 fw-semibold py-2 px-5" style="${ssrRenderStyle({ "padding": "9px 20px !important" })}"${_scopeId}> Close</button>`);
            _push2(ssrRenderComponent(_component_Button, {
              label: "Create",
              class: "bg-orange-500 border-none",
              icon: "pi pi-plus-circle",
              onClick: unref(useStore).SubmitCreateNewList,
              autofocus: ""
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode("button", {
                class: "btn border-orange-400 text-orange-500 fw-semibold py-2 px-5",
                style: { "padding": "9px 20px !important" },
                onClick: ($event) => unref(useStore).CreateNewListDialog = false
              }, " Close", 8, ["onClick"]),
              createVNode(_component_Button, {
                label: "Create",
                class: "bg-orange-500 border-none",
                icon: "pi pi-plus-circle",
                onClick: unref(useStore).SubmitCreateNewList,
                autofocus: ""
              }, null, 8, ["onClick"])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="flex-column my-3 mx-5"${_scopeId}><div class="row d-flex align-items-center"${_scopeId}><div class="col"${_scopeId}><h1 class="text-gray-700 fs-4 font-semibold"${_scopeId}>Holiday List</h1></div><div class="col"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              class: "w-full h-12",
              modelValue: unref(useStore).CreateNewList.List_Name,
              "onUpdate:modelValue": ($event) => unref(useStore).CreateNewList.List_Name = $event
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class="row my-2 mb-4 d-flex align-items-center"${_scopeId}><div class="col"${_scopeId}><h1 class="text-gray-700 fs-4 font-semibold"${_scopeId}>Choose The Holidays</h1></div><div class="col"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_MultiSelect, {
              modelValue: unref(useStore).ChooseTheHolidays,
              "onUpdate:modelValue": ($event) => unref(useStore).ChooseTheHolidays = $event,
              options: unref(useStore).arrayHolidaysList,
              optionLabel: "holiday_name",
              placeholder: "Select Cities",
              maxSelectedLabels: 3,
              class: "w-full h-12",
              style: { "width": "245px !important" },
              onChange: ($event) => unref(useStore).getHolidayName()
            }, null, _parent2, _scopeId));
            _push2(`</div></div></div>`);
          } else {
            return [
              createVNode("div", { class: "flex-column my-3 mx-5" }, [
                createVNode("div", { class: "row d-flex align-items-center" }, [
                  createVNode("div", { class: "col" }, [
                    createVNode("h1", { class: "text-gray-700 fs-4 font-semibold" }, "Holiday List")
                  ]),
                  createVNode("div", { class: "col" }, [
                    createVNode(_component_InputText, {
                      type: "text",
                      class: "w-full h-12",
                      modelValue: unref(useStore).CreateNewList.List_Name,
                      "onUpdate:modelValue": ($event) => unref(useStore).CreateNewList.List_Name = $event
                    }, null, 8, ["modelValue", "onUpdate:modelValue"])
                  ])
                ]),
                createVNode("div", { class: "row my-2 mb-4 d-flex align-items-center" }, [
                  createVNode("div", { class: "col" }, [
                    createVNode("h1", { class: "text-gray-700 fs-4 font-semibold" }, "Choose The Holidays")
                  ]),
                  createVNode("div", { class: "col" }, [
                    createVNode(_component_MultiSelect, {
                      modelValue: unref(useStore).ChooseTheHolidays,
                      "onUpdate:modelValue": ($event) => unref(useStore).ChooseTheHolidays = $event,
                      options: unref(useStore).arrayHolidaysList,
                      optionLabel: "holiday_name",
                      placeholder: "Select Cities",
                      maxSelectedLabels: 3,
                      class: "w-full h-12",
                      style: { "width": "245px !important" },
                      onChange: ($event) => unref(useStore).getHolidayName()
                    }, null, 8, ["modelValue", "onUpdate:modelValue", "options", "onChange"])
                  ])
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        visible: unref(useStore).DialogAddNewHoliday,
        "onUpdate:visible": ($event) => unref(useStore).DialogAddNewHoliday = $event,
        modal: "",
        header: "Holiday ",
        style: { width: "25vw" },
        class: "popup_card"
      }, {
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<button class="btn border-orange-400 text-orange-500 fw-semibold py-2 px-5" style="${ssrRenderStyle({ "padding": "9px 20px !important" })}"${_scopeId}> Close</button>`);
            _push2(ssrRenderComponent(_component_Button, {
              label: "Submit",
              class: "bg-orange-500 border-none",
              icon: "pi pi-check",
              onClick: unref(useStore).sumbitAddNewHoliday,
              autofocus: ""
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode("button", {
                class: "btn border-orange-400 text-orange-500 fw-semibold py-2 px-5",
                style: { "padding": "9px 20px !important" },
                onClick: ($event) => unref(useStore).DialogAddNewHoliday = false
              }, " Close", 8, ["onClick"]),
              createVNode(_component_Button, {
                label: "Submit",
                class: "bg-orange-500 border-none",
                icon: "pi pi-check",
                onClick: unref(useStore).sumbitAddNewHoliday,
                autofocus: ""
              }, null, 8, ["onClick"])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="card upload_img h-48 w-full rounded-lg" style="${ssrRenderStyle({ "height": "150px", "min-width": "200px" })}"${_scopeId}><img class="z-0 w-full h-full rounded-lg border-0"${ssrRenderAttr("src", unref(useStore).avatar)} alt=""${_scopeId}><div class="img_overlay w-full position-absolute h-full z-10 rounded-lg bottom-0"${_scopeId}><label class="position-absolute d-flex justify-items-center align-items-end fs-5 h-10 z-50 text-white cursor-pointer" id="" for="uploadFestivalPhoto" style="${ssrRenderStyle({ "bottom": "10px", "right": "10px" })}"${_scopeId}><i class="pi pi-upload"${_scopeId}></i><h1 class="pl-2 text-orange-500"${_scopeId}>upload</h1></label><input type="file" name="" id="uploadFestivalPhoto" hidden${_scopeId}></div></div><div class="card-title"${_scopeId}><div class="flex gap-2 mt-5 flex-column"${_scopeId}><label for="username"${_scopeId}>Festival Title</label>`);
            _push2(ssrRenderComponent(_component_InputText, {
              id: "username",
              class: "h-10",
              modelValue: unref(useStore).addNewHoliday.FestivalTitle,
              "onUpdate:modelValue": ($event) => unref(useStore).addNewHoliday.FestivalTitle = $event,
              "aria-describedby": "username-help"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="flex gap-2 mt-5 flex-column"${_scopeId}><label for="username"${_scopeId}>Description</label>`);
            _push2(ssrRenderComponent(_component_InputText, {
              id: "username",
              class: "h-10",
              modelValue: unref(useStore).addNewHoliday.Description,
              "onUpdate:modelValue": ($event) => unref(useStore).addNewHoliday.Description = $event,
              "aria-describedby": "username-help"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="flex gap-2 mt-5 flex-column"${_scopeId}><label for="username"${_scopeId}>Date</label>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              modelValue: unref(useStore).addNewHoliday.date,
              "onUpdate:modelValue": ($event) => unref(useStore).addNewHoliday.date = $event,
              showIcon: "",
              class: "h-10 form-selects",
              dateFormat: "dd/mm/yy"
            }, null, _parent2, _scopeId));
            _push2(`</div></div>`);
          } else {
            return [
              createVNode("div", {
                class: "card upload_img h-48 w-full rounded-lg",
                style: { "height": "150px", "min-width": "200px" }
              }, [
                createVNode("img", {
                  class: "z-0 w-full h-full rounded-lg border-0",
                  src: unref(useStore).avatar,
                  alt: ""
                }, null, 8, ["src"]),
                createVNode("div", { class: "img_overlay w-full position-absolute h-full z-10 rounded-lg bottom-0" }, [
                  createVNode("label", {
                    class: "position-absolute d-flex justify-items-center align-items-end fs-5 h-10 z-50 text-white cursor-pointer",
                    id: "",
                    for: "uploadFestivalPhoto",
                    style: { "bottom": "10px", "right": "10px" }
                  }, [
                    createVNode("i", { class: "pi pi-upload" }),
                    createVNode("h1", { class: "pl-2 text-orange-500" }, "upload")
                  ]),
                  createVNode("input", {
                    type: "file",
                    name: "",
                    id: "uploadFestivalPhoto",
                    hidden: "",
                    onChange: ($event) => unref(useStore).FestivalPhoto($event)
                  }, null, 40, ["onChange"])
                ])
              ]),
              createVNode("div", { class: "card-title" }, [
                createVNode("div", { class: "flex gap-2 mt-5 flex-column" }, [
                  createVNode("label", { for: "username" }, "Festival Title"),
                  createVNode(_component_InputText, {
                    id: "username",
                    class: "h-10",
                    modelValue: unref(useStore).addNewHoliday.FestivalTitle,
                    "onUpdate:modelValue": ($event) => unref(useStore).addNewHoliday.FestivalTitle = $event,
                    "aria-describedby": "username-help"
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ]),
                createVNode("div", { class: "flex gap-2 mt-5 flex-column" }, [
                  createVNode("label", { for: "username" }, "Description"),
                  createVNode(_component_InputText, {
                    id: "username",
                    class: "h-10",
                    modelValue: unref(useStore).addNewHoliday.Description,
                    "onUpdate:modelValue": ($event) => unref(useStore).addNewHoliday.Description = $event,
                    "aria-describedby": "username-help"
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ]),
                createVNode("div", { class: "flex gap-2 mt-5 flex-column" }, [
                  createVNode("label", { for: "username" }, "Date"),
                  createVNode(_component_Calendar, {
                    modelValue: unref(useStore).addNewHoliday.date,
                    "onUpdate:modelValue": ($event) => unref(useStore).addNewHoliday.date = $event,
                    showIcon: "",
                    class: "h-10 form-selects",
                    dateFormat: "dd/mm/yy"
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        visible: unref(useStore).editHoliday,
        "onUpdate:visible": ($event) => unref(useStore).editHoliday = $event,
        modal: "",
        header: "Holiday ",
        style: { width: "25vw" },
        class: "popup_card"
      }, {
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<button class="btn border-orange-400 text-orange-500 fw-semibold py-2 px-5" style="${ssrRenderStyle({ "padding": "9px 20px !important" })}"${_scopeId}> Close</button>`);
            _push2(ssrRenderComponent(_component_Button, {
              label: "Submit",
              class: "btn bg-orange-500 border-none",
              icon: "pi pi-check",
              onClick: ($event) => unref(useStore).sumbiteditHoliday(unref(useStore).holidayData),
              autofocus: ""
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode("button", {
                class: "btn border-orange-400 text-orange-500 fw-semibold py-2 px-5",
                style: { "padding": "9px 20px !important" },
                onClick: ($event) => unref(useStore).editHoliday = false
              }, " Close", 8, ["onClick"]),
              createVNode(_component_Button, {
                label: "Submit",
                class: "btn bg-orange-500 border-none",
                icon: "pi pi-check",
                onClick: ($event) => unref(useStore).sumbiteditHoliday(unref(useStore).holidayData),
                autofocus: ""
              }, null, 8, ["onClick"])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="img_container upload_img position-relative rounded-lg" style="${ssrRenderStyle({ "height": "150px", "min-width": "200px", "box-shadow": "rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px" })}"${_scopeId}>`);
            if (unref(useStore).addNewHoliday.Holiday_Photo) {
              _push2(`<img class="card-img-top rounded-lg"${ssrRenderAttr("src", `data:image/png;base64,${unref(useStore).addNewHoliday.Holiday_Photo}`)} srcset="" alt=""${_scopeId}>`);
            } else {
              _push2(`<!---->`);
            }
            if (unref(useStore).avatar) {
              _push2(`<img class="rounded-lg z-0 position-absolute top-0 left-0"${ssrRenderAttr("src", unref(useStore).avatar)} alt="" style="${ssrRenderStyle({ "height": "150px", "min-width": "100%" })}"${_scopeId}>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`<div class="img_overlay w-full position-absolute h-full z-10 rounded-lg bottom-0"${_scopeId}><label class="position-absolute d-flex justify-items-center align-items-end fs-5 h-10 z-50 text-orange-500 cursor-pointer" id="" for="uploadFestivalPhoto" style="${ssrRenderStyle({ "bottom": "10px", "right": "10px" })}"${_scopeId}><i class="pi pi-upload"${_scopeId}></i><h1 class="pl-2 text-orange-500"${_scopeId}>upload</h1></label><input type="file" name="" id="uploadFestivalPhoto" hidden${_scopeId}></div></div><div class="card-title"${_scopeId}><div class="flex gap-2 mt-5 flex-column"${_scopeId}><label for="username"${_scopeId}>Festival Title</label>`);
            _push2(ssrRenderComponent(_component_InputText, {
              id: "username",
              class: "h-10",
              modelValue: unref(useStore).addNewHoliday.FestivalTitle,
              "onUpdate:modelValue": ($event) => unref(useStore).addNewHoliday.FestivalTitle = $event,
              "aria-describedby": "username-help"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="flex gap-2 mt-5 flex-column"${_scopeId}><label for="username"${_scopeId}>Description</label>`);
            _push2(ssrRenderComponent(_component_InputText, {
              id: "username",
              class: "h-10",
              modelValue: unref(useStore).addNewHoliday.Description,
              "onUpdate:modelValue": ($event) => unref(useStore).addNewHoliday.Description = $event,
              "aria-describedby": "username-help"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="flex gap-2 mt-5 flex-column"${_scopeId}><label for="date"${_scopeId}>Date</label>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              class: "form-selects h-10",
              modelValue: unref(useStore).addNewHoliday.date,
              "onUpdate:modelValue": ($event) => unref(useStore).addNewHoliday.date = $event,
              showIcon: "",
              dateFormat: "dd-mm-yy"
            }, null, _parent2, _scopeId));
            _push2(`</div></div>`);
          } else {
            return [
              createVNode("div", {
                class: "img_container upload_img position-relative rounded-lg",
                style: { "height": "150px", "min-width": "200px", "box-shadow": "rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px" }
              }, [
                unref(useStore).addNewHoliday.Holiday_Photo ? (openBlock(), createBlock("img", {
                  key: 0,
                  class: "card-img-top rounded-lg",
                  src: `data:image/png;base64,${unref(useStore).addNewHoliday.Holiday_Photo}`,
                  srcset: "",
                  alt: ""
                }, null, 8, ["src"])) : createCommentVNode("", true),
                unref(useStore).avatar ? (openBlock(), createBlock("img", {
                  key: 1,
                  class: "rounded-lg z-0 position-absolute top-0 left-0",
                  src: unref(useStore).avatar,
                  alt: "",
                  style: { "height": "150px", "min-width": "100%" }
                }, null, 8, ["src"])) : createCommentVNode("", true),
                createVNode("div", { class: "img_overlay w-full position-absolute h-full z-10 rounded-lg bottom-0" }, [
                  createVNode("label", {
                    class: "position-absolute d-flex justify-items-center align-items-end fs-5 h-10 z-50 text-orange-500 cursor-pointer",
                    id: "",
                    for: "uploadFestivalPhoto",
                    style: { "bottom": "10px", "right": "10px" }
                  }, [
                    createVNode("i", { class: "pi pi-upload" }),
                    createVNode("h1", { class: "pl-2 text-orange-500" }, "upload")
                  ]),
                  createVNode("input", {
                    type: "file",
                    name: "",
                    id: "uploadFestivalPhoto",
                    hidden: "",
                    onChange: ($event) => unref(useStore).FestivalPhoto($event)
                  }, null, 40, ["onChange"])
                ])
              ]),
              createVNode("div", { class: "card-title" }, [
                createVNode("div", { class: "flex gap-2 mt-5 flex-column" }, [
                  createVNode("label", { for: "username" }, "Festival Title"),
                  createVNode(_component_InputText, {
                    id: "username",
                    class: "h-10",
                    modelValue: unref(useStore).addNewHoliday.FestivalTitle,
                    "onUpdate:modelValue": ($event) => unref(useStore).addNewHoliday.FestivalTitle = $event,
                    "aria-describedby": "username-help"
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ]),
                createVNode("div", { class: "flex gap-2 mt-5 flex-column" }, [
                  createVNode("label", { for: "username" }, "Description"),
                  createVNode(_component_InputText, {
                    id: "username",
                    class: "h-10",
                    modelValue: unref(useStore).addNewHoliday.Description,
                    "onUpdate:modelValue": ($event) => unref(useStore).addNewHoliday.Description = $event,
                    "aria-describedby": "username-help"
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ]),
                createVNode("div", { class: "flex gap-2 mt-5 flex-column" }, [
                  createVNode("label", { for: "date" }, "Date"),
                  createVNode(_component_Calendar, {
                    class: "form-selects h-10",
                    modelValue: unref(useStore).addNewHoliday.date,
                    "onUpdate:modelValue": ($event) => unref(useStore).addNewHoliday.date = $event,
                    showIcon: "",
                    dateFormat: "dd-mm-yy"
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Confirmation",
        visible: showconfirmationdialog.value,
        "onUpdate:visible": ($event) => showconfirmationdialog.value = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "350px" },
        modal: true
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="confirmation-content"${_scopeId}><i class="mr-3 pi pi-exclamation-triangle" style="${ssrRenderStyle({ "font-size": "2rem" })}"${_scopeId}></i><span${_scopeId}>Are you sure you want to remove this holiday ? </span></div><div class="d-flex mt-11" style="${ssrRenderStyle({ "position": "relative", "right": "-180px", "width": "140px" })}"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Button, {
              class: "btn-primary py-2 mx-2",
              label: "Yes",
              icon: "pi pi-check",
              style: { width: "60px" },
              onClick: removeholidaylist,
              autofocus: ""
            }, null, _parent2, _scopeId));
            _push2(`<button class="btn btn-orange d-flex align-items-center"${_scopeId}><i class="px-1 pi pi-times"${_scopeId}></i> No</button></div>`);
          } else {
            return [
              createVNode("div", { class: "confirmation-content" }, [
                createVNode("i", {
                  class: "mr-3 pi pi-exclamation-triangle",
                  style: { "font-size": "2rem" }
                }),
                createVNode("span", null, "Are you sure you want to remove this holiday ? ")
              ]),
              createVNode("div", {
                class: "d-flex mt-11",
                style: { "position": "relative", "right": "-180px", "width": "140px" }
              }, [
                createVNode(_component_Button, {
                  class: "btn-primary py-2 mx-2",
                  label: "Yes",
                  icon: "pi pi-check",
                  style: { width: "60px" },
                  onClick: removeholidaylist,
                  autofocus: ""
                }),
                createVNode("button", {
                  class: "btn btn-orange d-flex align-items-center",
                  onClick: ($event) => showconfirmationdialog.value = false
                }, [
                  createVNode("i", { class: "px-1 pi pi-times" }),
                  createTextVNode(" No")
                ], 8, ["onClick"])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: unref(useStore).canShowLoading,
        "onUpdate:visible": ($event) => unref(useStore).canShowLoading = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "25vw" },
        modal: true,
        closable: false,
        closeOnEscape: false
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_ProgressSpinner, {
              style: { "width": "50px", "height": "50px" },
              strokeWidth: "8",
              fill: "var(--surface-ground)",
              animationDuration: "2s",
              "aria-label": "Custom ProgressSpinner"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_ProgressSpinner, {
                style: { "width": "50px", "height": "50px" },
                strokeWidth: "8",
                fill: "var(--surface-ground)",
                animationDuration: "2s",
                "aria-label": "Custom ProgressSpinner"
              })
            ];
          }
        }),
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h5 style="${ssrRenderStyle({ "text-align": "center" })}"${_scopeId}>Please wait...</h5>`);
          } else {
            return [
              createVNode("h5", { style: { "text-align": "center" } }, "Please wait...")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div>`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/holidays/Holidays_Lists.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as _,
  _sfc_main$1 as a,
  _sfc_main$2 as b
};
