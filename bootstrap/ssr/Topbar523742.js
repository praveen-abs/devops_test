import { ref, onMounted, resolveComponent, resolveDirective, mergeProps, unref, withCtx, createVNode, createTextVNode, openBlock, createBlock, Fragment, renderList, toDisplayString, useSSRContext } from "vue";
import { ssrRenderAttr, ssrInterpolate, ssrRenderAttrs, ssrGetDirectiveProps, ssrRenderList, ssrRenderStyle, ssrRenderComponent, ssrRenderClass } from "vue/server-renderer";
import axios from "axios";
import { u as useMainDashboardStore } from "./dashboard_service52374.js";
import { S as Service } from "./Service52374.js";
const _imports_0 = "/build/setting52374.svg";
const _imports_1 = "/build/notification52374.svg";
const _imports_2 = "/build/exit52374.svg";
const Topbar_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "Topbar",
  __ssrInlineRender: true,
  setup(__props) {
    const useDashboard = useMainDashboardStore();
    const service = Service();
    const visibleRight = ref(false);
    const query = ref("");
    const orgList = ref();
    const clientList = ref();
    const canShowLoading = ref(false);
    const canShowLogout = ref(false);
    ref([
      {
        id: 1,
        label: "Attendance",
        to: "attendance-timesheet"
      }
    ]);
    const currentlySelectedClient = ref();
    const getClientList = () => {
      axios.get("/clients-fetchAll").then((res) => {
        clientList.value = res.data;
      }).finally(() => {
      });
    };
    const getSessionClient = () => {
      axios.get("session-sessionselectedclient").then((res) => {
        console.log(res.data);
        currentlySelectedClient.value = res.data;
      });
    };
    function globalSearch(keyword, list) {
      const searchResults = list.filter(
        (item) => item.emp_name.toLowerCase().includes(keyword.toLowerCase()) || item.emp_code.toLowerCase().includes(keyword.toLowerCase())
      );
      return searchResults;
    }
    ref();
    const getOrgList = () => {
      axios.get("/vmt-activeemployees-fetchall").then((res) => {
        orgList.value = res.data;
      });
    };
    const notificationSource = ref();
    const getNotifications = () => {
      axios.get("/getNotifications").then((res) => {
        notificationSource.value = res.data.data;
      });
    };
    const readNotification = (notification_id) => {
      axios.post("/readNotification", {
        record_id: notification_id
      }).finally(() => {
        getNotifications();
      });
    };
    onMounted(() => {
      getOrgList();
      getClientList();
      getSessionClient();
      setTimeout(() => {
        canShowLoading.value = true;
      }, 2e3);
      getNotifications();
    });
    const colors = [
      "bg-orange-50",
      "bg-emerald-50",
      "bg-yellow-50",
      "bg-rose-50",
      "bg-cyan-50",
      "bg-amber-50",
      "bg-red-50",
      "bg-blue-50",
      "bg-pink-50",
      "bg-green-50",
      "bg-fuchsia-50"
    ];
    const getBackgroundColor = (index) => {
      console.log(index);
      return colors[index % colors.length];
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Sidebar = resolveComponent("Sidebar");
      const _directive_tooltip = resolveDirective("tooltip");
      _push(`<!--[-->`);
      if (canShowLoading.value) {
        _push(`<div class="bg-white h-[60px]"><div class="grid items-center justify-between grid-cols-12"><div class="relative col-span-4 px-2 py-2 mx-2 border-1 border-x-gray-300"><button class="text-black rounded focus:outline-none"><p class="text-left text-gray-600 text-md">Your organization</p>`);
        if (currentlySelectedClient.value) {
          _push(`<div class="flex justify-between items-center gap-2 py-0.5"><img${ssrRenderAttr("src", currentlySelectedClient.value.client_logo)} alt="" class="w-12 h-6">`);
          if (currentlySelectedClient.value.client_fullname.length <= 13) {
            _push(`<p class="px-2 text-sm font-semibold whitespace-nowrap">${ssrInterpolate(currentlySelectedClient.value.client_fullname)}</p>`);
          } else {
            _push(`<p${ssrRenderAttrs(mergeProps({ class: "font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, currentlySelectedClient.value.client_fullname)))}>${ssrInterpolate(currentlySelectedClient.value.client_fullname ? currentlySelectedClient.value.client_fullname.substring(
              0,
              13
            ) + ".." : "")}</p>`);
          }
          _push(`</div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</button>`);
        if (unref(service).current_user_role == 1 || unref(service).current_user_role == 2 || unref(service).current_user_role == 3 || unref(service).current_user_role == 4) {
          if (unref(useDashboard).canShowClients) {
            _push(`<div class="absolute z-20 w-11/12 bg-white rounded shadow-lg top-5 left-2 mt-14"><!--[-->`);
            ssrRenderList(clientList.value, (client) => {
              _push(`<div class="transition transform cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"><div class="flex items-center justify-between p-2 hover:bg-gray-200"><div class="cursor-pointer flex mx-2 align-center justify-between rounded-lg p-0.5"><div class="flex items-center justify-between gap-4 p-1 mx-2 border rounded" style="${ssrRenderStyle({ "height": "30px", "width": "30px" })}"><img${ssrRenderAttr("src", client.client_logo)} alt="" class="mh-100 mw-100">`);
              if (client.client_fullname.length <= 40) {
                _push(`<p class="px-2 text-sm font-semibold whitespace-nowrap">${ssrInterpolate(client.client_fullname)} ${ssrInterpolate(client.abs_client_code)}</p>`);
              } else {
                _push(`<p${ssrRenderAttrs(mergeProps({ class: "px-2 text-sm font-semibold whitespace-nowrap" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, client.client_fullname)))}>${ssrInterpolate(client.client_fullname ? client.client_fullname.substring(
                  0,
                  40
                ) + ".." : "")}</p>`);
              }
              _push(`</div></div>`);
              if (currentlySelectedClient.value ? currentlySelectedClient.value.id == client.id : "") {
                _push(`<div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 font-semibold text-green-600"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"></path></svg></div>`);
              } else {
                _push(`<!---->`);
              }
              _push(`</div></div>`);
            });
            _push(`<!--]--></div>`);
          } else {
            _push(`<!---->`);
          }
        } else {
          _push(`<!---->`);
        }
        _push(`</div><div class="relative col-span-4"><input type="text" name="" id="" class="border p-1.5 bg-gray-100 border-gray-300 rounded-lg w-full"${ssrRenderAttr("value", query.value)} placeholder="Search....">`);
        if (query.value) {
          _push(`<div class="absolute top-0 left-0 z-40 w-3/4 px-3 py-4 mt-16 overflow-x-scroll bg-white rounded shadow-lg"><!--[-->`);
          ssrRenderList(globalSearch(query.value, orgList.value ? orgList.value : []), (employee) => {
            _push(`<div class="w-full p-2 transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"><div class="flex"><p class="text-sm font-bold text-gray-900">${ssrInterpolate(employee.emp_name)} <span class="float-right text-xs font-bold text-gray-600">${ssrInterpolate(employee.emp_code)}</span></p></div><div><p class="text-xs text-gray-600">${ssrInterpolate(employee.emp_designation)}</p></div></div>`);
          });
          _push(`<!--]--></div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div><div class="flex justify-end col-span-4">`);
        if (unref(service).current_user_role == 2 || unref(service).current_user_role == 4) {
          _push(`<button${ssrRenderAttrs(mergeProps({ class: "p-2 mx-2 transition duration-700 ease-in-out transform bg-gray-100 rounded-full hover:bg-gray-200 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Settings")))}><img${ssrRenderAttr("src", _imports_0)} alt="" class="w-6 h-6"></button>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(useDashboard).canShowConfiguration) {
          _push(`<div class="absolute top-0 z-40 p-2 mt-16 bg-white rounded shadow-lg right-40 w-60"><a href="config-master" class="block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"> Master config</a><a href="clientOnboarding" class="block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"> Client onboarding</a><a href="document_preview" class="block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"> Document template</a><a href="documents_settings" class="block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"> Document settings</a><a href="attendance-leavesettings" class="block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"> Leave setting</a><a href="attendance_settings" class="block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"> Attendance setting</a><a href="investment_settings" class="block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"> Investment setting</a></div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`<button${ssrRenderAttrs(mergeProps({ class: "p-2 mx-2 transition duration-700 ease-in-out transform bg-gray-100 rounded-full animate-pulse hover:bg-gray-200 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Notification")))}><img${ssrRenderAttr("src", _imports_1)} alt="" class="w-6 h-6"></button><button${ssrRenderAttrs(mergeProps({ class: "p-2 transition duration-700 ease-in-out transform bg-gray-100 rounded-full hover:bg-gray-200 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Exit")))}><img${ssrRenderAttr("src", _imports_2)} alt="" class="w-6 h-6"></button><div class="relative mx-3"><button class="flex px-3 py-2 text-white transition duration-700 ease-in-out transform focus:outline-none hover:bg-gray-200 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"><p class="rounded-lg bg-blue-50 text-black font-semibold p-1.5 text-sm">${ssrInterpolate(unref(service).current_user_name ? unref(service).current_user_name.substring(0, 2) : "")}</p>`);
        if (unref(service).current_user_name ? unref(service).current_user_name.length <= 10 : "") {
          _push(`<p class="px-2 mx-2 my-auto text-sm font-semibold text-black whitespace-nowrap">${ssrInterpolate(unref(service).current_user_name ? unref(service).current_user_name : "")}</p>`);
        } else {
          _push(`<p class="font-semibold text-[12px] mx-2 whitespace-nowrap font-[&#39;Poppins&#39;] text-center text-black my-auto">${ssrInterpolate(unref(service).current_user_name ? unref(service).current_user_name.substring(0, 10) + ".." : "")}</p>`);
        }
        _push(`</button>`);
        if (unref(useDashboard).canShowCurrentEmployee) {
          _push(`<div class="absolute top-0 right-0 z-30 w-48 bg-white rounded shadow-lg mt-14"><a class="block w-full p-2 transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none" href="pages-profile-new ">View profile</a><a class="block w-full p-2 transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none">Log out</a></div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(ssrRenderComponent(_component_Sidebar, {
        visible: visibleRight.value,
        "onUpdate:visible": ($event) => visibleRight.value = $event,
        position: "right",
        class: "w-full"
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<p class="absolute left-0 mx-4 font-semibold fs-5"${_scopeId}><img${ssrRenderAttr("src", _imports_1)} alt="" class="w-6 h-6 animate-pulse"${_scopeId}> Notification </p>`);
          } else {
            return [
              createVNode("p", { class: "absolute left-0 mx-4 font-semibold fs-5" }, [
                createVNode("img", {
                  src: _imports_1,
                  alt: "",
                  class: "w-6 h-6 animate-pulse"
                }),
                createTextVNode(" Notification ")
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            if (notificationSource.value ? notificationSource.value.length > 0 : false) {
              _push2(`<!--[-->`);
              ssrRenderList(notificationSource.value, (notification, index) => {
                _push2(`<div class="${ssrRenderClass([`${getBackgroundColor(index)}`, "w-full p-2 px-2 my-2 rounded-lg"])}"${_scopeId}><div class="flex justify-between"${_scopeId}><div${_scopeId}><p class="font-semibold orange-median fs-6"${_scopeId}>${ssrInterpolate(notification.notification_title)}</p></div><div${_scopeId}><button${_scopeId}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"${_scopeId}><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"${_scopeId}></path></svg></button></div></div><p class="text-sm"${_scopeId}>${ssrInterpolate(notification.notification_body)}</p></div>`);
              });
              _push2(`<!--]-->`);
            } else {
              _push2(`<div class="w-full p-2 px-2 my-2 rounded-lg bg-red-50"${_scopeId}><p${_scopeId}>No notifications to display</p></div>`);
            }
          } else {
            return [
              (notificationSource.value ? notificationSource.value.length > 0 : false) ? (openBlock(true), createBlock(Fragment, { key: 0 }, renderList(notificationSource.value, (notification, index) => {
                return openBlock(), createBlock("div", {
                  class: ["w-full p-2 px-2 my-2 rounded-lg", `${getBackgroundColor(index)}`]
                }, [
                  createVNode("div", { class: "flex justify-between" }, [
                    createVNode("div", null, [
                      createVNode("p", { class: "font-semibold orange-median fs-6" }, toDisplayString(notification.notification_title), 1)
                    ]),
                    createVNode("div", null, [
                      createVNode("button", {
                        onClick: ($event) => readNotification(notification.id)
                      }, [
                        (openBlock(), createBlock("svg", {
                          xmlns: "http://www.w3.org/2000/svg",
                          fill: "none",
                          viewBox: "0 0 24 24",
                          "stroke-width": "1.5",
                          stroke: "currentColor",
                          class: "w-4 h-4"
                        }, [
                          createVNode("path", {
                            "stroke-linecap": "round",
                            "stroke-linejoin": "round",
                            d: "M6 18L18 6M6 6l12 12"
                          })
                        ]))
                      ], 8, ["onClick"])
                    ])
                  ]),
                  createVNode("p", { class: "text-sm" }, toDisplayString(notification.notification_body), 1)
                ], 2);
              }), 256)) : (openBlock(), createBlock("div", {
                key: 1,
                class: "w-full p-2 px-2 my-2 rounded-lg bg-red-50"
              }, [
                createVNode("p", null, "No notifications to display")
              ]))
            ];
          }
        }),
        _: 1
      }, _parent));
      if (canShowLogout.value) {
        _push(`<div class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true"><div class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-75"></div><div class="fixed inset-0 z-10 overflow-y-auto"><div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0"><div class="absolute z-50 p-8 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg shadow-2xl top-1/2 left-1/2"><h2 class="text-lg font-bold">Are you sure you want to do that?</h2><p class="mt-2 text-sm text-gray-500"> Do you really wish to log out? Any unsaved modifications will not be retained. </p><div class="flex justify-center gap-2 mt-4"><button type="button" class="px-4 py-2 text-sm font-medium text-green-600 rounded bg-green-50"> Yes, I&#39;m sure </button><button type="button" class="px-4 py-2 text-sm font-medium text-gray-600 rounded bg-gray-50"> No, go back </button></div></div></div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/Home/Topbar.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as _
};
