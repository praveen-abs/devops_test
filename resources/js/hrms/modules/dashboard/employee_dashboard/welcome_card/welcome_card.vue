<template>
 <div class="border-0 card w-100 box-shadow-md">
    <div class="card-body">

        <div class="row">
            <div class="col-8 col-sm-8 col-md-8 col-xl-8 col-lg-8 col-xxl-8">
                <p class="fw-bold f-18 text-primary" id="greeting_text">
                -
                </p>
                <p class="my-1 fw-bold fs-16 text-orange">
                    <!-- {{ auth()->user()->name }} -->
                    {{ name }}
                </p>

                <div class="my-3"><i class="fa fa-sun-o me-3 text-warning" aria-hidden="true"></i>General Shift <label
                        class="switch-checkbox f-12 text-muted ms-3">
                        <input type="checkbox" id="checkin_function" class="f-13 text-muted" />
                            <!-- @if ($checked && $checked->checkin_time) @if ($checked->checkout_time)
                            @else
                            checked @endif
                            @endif> -->
                        <span class="slider-checkbox check-in round">
                            <span class="slider-checkbox-text">
                            </span>
                        </span>
                    </label>
                </div>
                <p class="f-12 text-muted " id="time_duration">Time Duration:
                    <!-- @if ($effective_hours)
                        <span class="test-primary f-12"> {{ $effective_hours }}</span>
                    @else
                        <span class="test-primary f-12"> {{ '-' }}</span>
                    @endif
                    </-> -->
                </p>
            </div>
            <div class="col-4 col-sm-4 col-md-4 col-xl-4 col-lg-4 col-xxl-4">
                <img src="{{ URL::asset('assets/images/dashboard/girl_walk.jpg') }}" class="" alt="girl-walk"
                    height="145px" width="100%">
            </div>
        </div>

    </div>
</div>

<!-- staticBackdrop Modal -->
<div class="modal fade" id="modal_checkin_confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="p-1 text-center modal-body">

                <div class="check-in-animate">
                    <lord-icon src="https://cdn.lordicon.com/dcfqtwxe.json" trigger="loop" delay="2000"
                        class="gliters" colors="primary:#1aff1a,secondary:#1aff1a">
                    </lord-icon>
                    <lord-icon src="https://cdn.lordicon.com/twopqjaj.json" trigger="loop" delay="2000"
                        class="entry-man"
                        colors="primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#30e849">
                    </lord-icon>
                </div>
                <div class="mt-2">
                    <!-- <h4 class="mb-2">Welcome {{ auth()->user()->name }}</h4> -->
                    <h4 class="mb-2">Welcome </h4>
                    <p class="mb-4 text-muted">Have a good day !</p>
                    <div class="gap-2 hstack justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-link link-success fw-medium"
                            data-bs-dismiss="modal">
                            <button type="button" class="btn btn-primary">
                                Close
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_checkout_confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="p-1 text-center modal-body">

                <div class="check-in-animate">
                    <lord-icon src="https://cdn.lordicon.com/dcfqtwxe.json" trigger="loop" delay="2000"
                        colors="primary:#ff3300,secondary:#ff3300" class="gliters">
                    </lord-icon>
                    <lord-icon src="https://cdn.lordicon.com/twopqjaj.json" trigger="loop" delay="2000"
                        class="entry-man"
                        colors="primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#e62e00">
                    </lord-icon>

                </div>
                <div class="mt-4">
                    <!-- <h4 class="mb-3">Bye {{ auth()->user()->name }}</h4> -->
                    <h4 class="mb-3">Bye </h4>
                    <p class="mb-4 text-muted"> See you tommorrow</p>
                    <div class="gap-2 hstack justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-link link-success fw-medium"
                            data-bs-dismiss="modal">
                            <button type="button" class="btn btn-primary">
                                Close
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</template>



<script setup>
import { onMounted, ref } from "vue";

onMounted(() => {
    console.log(data.value.name);
});

const name = ref("george")

const data = ref([
                { id: 1, name: 'george', img: 'https://cdn.icon-icons.com/icons2/1156/PNG/512/1486565573-microsoft-office_81557.png', des: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.Pariatur voluptatemLorem ' },
                { id: 1, name: 'Max', img: 'https://cdn.icon-icons.com/icons2/1156/PNG/512/1486565573-microsoft-office_81557.png', des: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.Pariatur voluptatemLorem ' },
])
</script>
