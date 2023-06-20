<template>
    <div class="my-3 event-wrapper">
        <div class="mb-0 overflow-x-hidden overflow-y-auto border-0 card" >
            <div class="card-body" >
                <div class="mb-3 f-18 text-primary" id=""> <span>Events</span>
                </div>
                <div class="grid gap-4 my-4 md:grid-cols-4 sm:grid-cols-4 xxl:grid-cols-5 xl:grid-cols-5 lg:grid-cols-5"
                    style="display: grid;">
                    <div class="mb-3 card wishes_content topOrange-line"  v-for="events in useDashboard.allEventSource" :key="events">
                        <div class="card-body ">
                            <p class="mb-1 text-right badge text-orange">Upcoming</p>
                            <div class="mb-2 d-flex justify-content-center align-items-center">
                                <!-- @if ($empAvatar->type == 'shortname') -->                            

                                <div
                                    class="rounded-xl img-xl d-flex justify-content-center align-items-center userShort_name">
                                    <span class="text-white fw-bold">
                                        <!-- {{ $empAvatar->data }} -->
                                    </span>
                                </div>
                                <!-- <img class="rounded userShort_name img-xl" src="" alt=""> -->
                            </div>

                            <div class="text-center">
                                <p class=" text-muted fw-bold f-14">
                                    {{ events.name }} 
                                </p>
                                <p class="f-12 fw-bold text-orange program-day ">
                                    {{ dayjs(events.dob).format('DD')}}th {{dayjs(events.dob).format('MMM')  }}
                                </p>
                            </div>
                            <div class="row social_content">
                                <div class="col-6 text-start">
                                    <i class="fa text-orange fa-birthday-cake"></i>
                                </div>
                                <div class="text-right col-6">
                                    <button
                                        class="p-2 border-0 outline-none shadow-lite rounded-circle msg_box bg-ash text-orange"
                                        data-bs-target="#wishes_popup" data-bs-toggle="modal">
                                        <i class=" f-15 fa fa-commenting-o"></i></button>
                                </div>
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
