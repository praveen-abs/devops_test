<template>
    <div class="my-3 event-wrapper">
        <div class="mb-0 overflow-x-hidden overflow-y-auto border-0 card">
            <div class="card-body">
                <div class="mb-3 f-18 text-primary" id=""> <span class="text-primary font-semibold fs-5">Events</span>
                </div>
                <div class="grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-5 xl:grid-cols-5 lg:grid-cols-5"
                    style="display: grid;">
                    <div class="mb-3 card left-line" v-for="events in useDashboard.allEventSource" :key="events">
                        <div class="card-body flex">
                            <div>
                                <div class="text-left" style="width: 170px;">
                                    <p class=" text-muted fw-bold f-15" style="width: 210px;">
                                        {{ events.name }}
                                    </p>
                                    <p class="f-14 fw-bold text-orange program-day mt-2">
                                        {{ dayjs(events.dob).format('DD') }}th {{ dayjs(events.dob).format('MMM') }}
                                    </p>
                                </div>
                            </div>
                            <div>
                                <i style="font-size: 23px;
                                        transform: rotate(45deg);
                                        position: absolute;
                                        opacity: 0.4;
                                        margin-left: 28px;
                                        top: 3px;" class="fa text-orange fa-birthday-cake"></i>
                                <i style="font-size: 20px;
                                        position: absolute;
                                        margin-left: 30px;
                                        top: 20px;
                                        " class=" f-15 fa fa-commenting-o text-right my-5 cursor-pointer"
                                    data-bs-target="#wishes_popup" data-bs-toggle="modal"></i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="wishes_popup" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
            <div class="modal-content">
                <div class="py-2 border-0 modal-header">
                    <h6 class="modal-title ">
                        Wishes Text</h6>
                    <button type="button" class="bg-transparent border-0 outline-none close h3" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- {{-- <p for="" class="text-muted f-14 fw-bold">Commants here</p> --}} -->
                    <textarea name="" id="" cols="" placeholder="Commants here...." rows="2"
                        class="resize-none form-control"></textarea>
                    <div class="text-end">
                        <button class="mt-2 btn btn-border-orange" id=""><i class="fa fa-paper-plane me"
                                aria-hidden="true"></i> Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import dayjs from "dayjs";
import { ref } from "vue";
import { useMainDashboardStore } from "../stores/dashboard_service"

const useDashboard = useMainDashboardStore()

const width = ref('h-10')
</script>
