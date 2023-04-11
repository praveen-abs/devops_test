<template>
   <div class="event-wrapper">
    <div class="mb-0 border-0 card">
        <div class="card-body">
            <div class="mb-3 f-18 text-primary" id=""> <span>Events</span>
            </div>
            <div class="center d-flex" style="height:210px">
<!--
                <?php $anyUpcoming_Current_Events = false; ?>
                @if ($dashboardEmployeeEventsData['hasData'] == 'true')
                    @foreach ($dashboardEmployeeEventsData['birthday'] as $employee)
                        <?php $text = null; ?>

                        @if (\Carbon\Carbon::parse($employee['dob'])->month == date('m'))
                            @if (\Carbon\Carbon::parse($employee['dob'])->day == date('d'))
                                <?php $text = 'Today'; ?>
                            @elseif  (\Carbon\Carbon::parse($employee['dob'])->day > date('d'))
                                <?php $text = 'Upcoming'; ?>
                            @endif
                        @elseif (\Carbon\Carbon::parse($employee['dob'])->month >= date('m'))
                            <?php $text = 'Upcoming'; ?>
                        @endif
                        @if ($text != null)
                            <?php $anyUpcoming_Current_Events = true; ?> -->
                        <div class="row d-flex " :style="{width:'100%'}">
                            <div class="col-sm-6 col-md-4 col-xxl-3 col-xl-3 col-lg-3" >
                                <div class="mb-3 card wishes_content topOrange-line" >
                                    <div class="card-body " >

                                        <!-- <p class="mb-1 text-right badge text-orange">{{ $text }}</p> -->
                                        <p class="mb-1 text-right badge text-orange">Upcoming</p>

                                        <!-- <?php
                                        $empAvatar = json_decode(getEmployeeAvatarOrShortName($employee->id));
                                        // dd($empAvatar->color);
                                        ?> -->
                                        <div class="mb-2 d-flex justify-content-center align-items-center" >
                                            <!-- @if ($empAvatar->type == 'shortname') -->
                                                <div
                                                    class=" img-xl  d-flex justify-content-center align-items-center   rounded <?php echo $empAvatar->color; ?>">
                                                    <span class="text-white fw-bold">
                                                        <!-- {{ $empAvatar->data }} -->
                                                    </span>
                                                </div>
                                            <!-- @elseif($empAvatar->type == 'avatar')
                                                <?php
                                                $imageURL = request()->getSchemeAndHttpHost() . '/images/' . $empAvatar->data;
                                                ?> -->

                                                <img class="rounded userShort_name img-xl" src="{{ $imageURL }}"
                                                    alt="" :style="{position:'relative',right:'35px'}">
                                            <!-- @endif -->
                                        </div>

                                        <div class="text-center">
                                            <p class=" text-muted">
                                                <!-- {{ $employee->name }} -->
                                            </p>
                                            <p class="f-12 text-orange program-day ">
                                                Lorem ipsum dolor si
                                                <!-- {{ \Carbon\Carbon::parse($employee['dob'])->format('jS M') }} -->
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

                            <div class="col-sm-6 col-md-4 col-xxl-3 col-xl-3 col-lg-3" >
                                <div class="mb-3 card wishes_content topOrange-line" >
                                    <div class="card-body " >


                                        <!-- <p class="mb-1 text-right badge text-orange">{{ $text }}</p> -->
                                        <p class="mb-1 text-right badge text-orange">Upcoming</p>

                                        <!-- <?php
                                        $empAvatar = json_decode(getEmployeeAvatarOrShortName($employee->id));
                                        // dd($empAvatar->color);
                                        ?> -->
                                        <div class="mb-2 d-flex justify-content-center align-items-center" >
                                            <!-- @if ($empAvatar->type == 'shortname') -->
                                                <div
                                                    class=" img-xl  d-flex justify-content-center align-items-center   rounded <?php echo $empAvatar->color; ?>">
                                                    <span class="text-white fw-bold">
                                                        <!-- {{ $empAvatar->data }} -->
                                                    </span>
                                                </div>
                                            <!-- @elseif($empAvatar->type == 'avatar')
                                                <?php
                                                $imageURL = request()->getSchemeAndHttpHost() . '/images/' . $empAvatar->data;
                                                ?> -->

                                                <img class="rounded userShort_name img-xl" src="{{ $imageURL }}"
                                                    alt="" :style="{position:'relative',right:'35px'}">
                                            <!-- @endif -->
                                        </div>

                                        <div class="text-center">
                                            <p class=" text-muted">
                                                <!-- {{ $employee->name }} -->
                                            </p>
                                            <p class="f-12 text-orange program-day ">
                                                Lorem ipsum dolor si
                                                <!-- {{ \Carbon\Carbon::parse($employee['dob'])->format('jS M') }} -->
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

                            <div class="col-sm-6 col-md-4 col-xxl-3 col-xl-3 col-lg-3" >
                                <div class="mb-3 card wishes_content topOrange-line" >
                                    <div class="card-body " >


                                        <!-- <p class="mb-1 text-right badge text-orange">{{ $text }}</p> -->
                                        <p class="mb-1 text-right badge text-orange">Upcoming</p>

                                        <!-- <?php
                                        $empAvatar = json_decode(getEmployeeAvatarOrShortName($employee->id));
                                        // dd($empAvatar->color);
                                        ?> -->
                                        <div class="mb-2 d-flex justify-content-center align-items-center" >
                                            <!-- @if ($empAvatar->type == 'shortname') -->
                                                <div
                                                    class=" img-xl  d-flex justify-content-center align-items-center   rounded <?php echo $empAvatar->color; ?>">
                                                    <span class="text-white fw-bold">
                                                        <!-- {{ $empAvatar->data }} -->
                                                    </span>
                                                </div>
                                            <!-- @elseif($empAvatar->type == 'avatar')
                                                <?php
                                                $imageURL = request()->getSchemeAndHttpHost() . '/images/' . $empAvatar->data;
                                                ?> -->

                                                <img class="rounded userShort_name img-xl" src="{{ $imageURL }}"
                                                    alt="" :style="{position:'relative',right:'35px'}">
                                            <!-- @endif -->
                                        </div>

                                        <div class="text-center">
                                            <p class=" text-muted">
                                                <!-- {{ $employee->name }} -->
                                            </p>
                                            <p class="f-12 text-orange program-day ">
                                                Lorem ipsum dolor si
                                                <!-- {{ \Carbon\Carbon::parse($employee['dob'])->format('jS M') }} -->
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

                            <div class="col-sm-6 col-md-4 col-xxl-3 col-xl-3 col-lg-3" >
                                <div class="mb-3 card wishes_content topOrange-line" >
                                    <div class="card-body " >


                                        <!-- <p class="mb-1 text-right badge text-orange">{{ $text }}</p> -->
                                        <p class="mb-1 text-right badge text-orange">Upcoming</p>

                                        <!-- <?php
                                        $empAvatar = json_decode(getEmployeeAvatarOrShortName($employee->id));
                                        // dd($empAvatar->color);
                                        ?> -->
                                        <div class="mb-2 d-flex justify-content-center align-items-center" >
                                            <!-- @if ($empAvatar->type == 'shortname') -->
                                                <div
                                                    class=" img-xl  d-flex justify-content-center align-items-center   rounded <?php echo $empAvatar->color; ?>">
                                                    <span class="text-white fw-bold">
                                                        <!-- {{ $empAvatar->data }} -->
                                                    </span>
                                                </div>
                                            <!-- @elseif($empAvatar->type == 'avatar')
                                                <?php
                                                $imageURL = request()->getSchemeAndHttpHost() . '/images/' . $empAvatar->data;
                                                ?> -->

                                                <img class="rounded userShort_name img-xl" src="{{ $imageURL }}"
                                                    alt="" :style="{position:'relative',right:'35px'}">
                                            <!-- @endif -->
                                        </div>

                                        <div class="text-center">
                                            <p class=" text-muted">
                                                <!-- {{ $employee->name }} -->
                                            </p>
                                            <p class="f-12 text-orange program-day ">
                                                Lorem ipsum dolor si
                                                <!-- {{ \Carbon\Carbon::parse($employee['dob'])->format('jS M') }} -->
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

                            <!-- </div>
                        @endif
                    @endforeach

                    @foreach ($dashboardEmployeeEventsData['work_anniversary'] as $employee)
                        <?php $text = null; ?>

                        @if (\Carbon\Carbon::parse($employee['doj'])->month == date('m'))
                            @if (\Carbon\Carbon::parse($employee['doj'])->day == date('d'))
                                <?php $text = 'Today'; ?>
                            @elseif  (\Carbon\Carbon::parse($employee['doj'])->day > date('d'))
                                <?php $text = 'Upcoming'; ?>
                            @endif
                        @elseif (\Carbon\Carbon::parse($employee['doj'])->month >= date('m'))
                            <?php $text = 'Upcoming'; ?>
                        @endif

                        @if ($text != null)
                            <?php $anyUpcoming_Current_Events = true; ?> -->



                            <!-- removed -->




                        <!-- @endif
                    @endforeach
                @else -->
                    <!-- Need to move the below code here when controller logic is fixed     -->



                <!-- @endif -->
<!--
                @if (empty($anyUpcoming_Current_Events))
                    <div
                        class="wishes-card-wrapper no-events d-flex align-items-center justify-content-center flex-column">
                        <img id="" src="{{ URL::asset('assets/images/event/cancel-event.png') }}" />
                        <span class="m-0 text-muted h6">No upcoming events
                        </span>
                    </div>
                @endif -->


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
</div>
</div>




</template>
