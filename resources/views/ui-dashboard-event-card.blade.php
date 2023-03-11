<div class="event-wrapper">
    <div class="card  border-0 mb-0">
        <div class="card-body">
            <div class=" mb-3  f-18 text-primary" id=""> <span>Events</span>
            </div>
            <div class="center d-flex" style="height:210px">

                <?php $anyUpcoming_Current_Events = false; ?>

                @if ($dashboardEmployeeEventsData['hasData'] == 'true')
                    @foreach ($dashboardEmployeeEventsData['birthday'] as $employee)
                        <?php $text = null; ?>

                        @if (
                            \Carbon\Carbon::parse($employee['dob'])->month == date('m') &&
                                \Carbon\Carbon::parse($employee['dob'])->day == date('d'))
                            <?php $text = 'Today'; ?>
                        @elseif (
                            \Carbon\Carbon::parse($employee['dob'])->month >= date('m') &&
                                \Carbon\Carbon::parse($employee['dob'])->day > date('d'))
                            <?php $text = 'Upcoming'; ?>
                        @endif
                        @if ($text != null)
                            <?php $anyUpcoming_Current_Events = true; ?>
                            <div class="col-sm-6 col-md-4 col-xxl-3 col-xl-3 col-lg-3">
                                <div class="card wishes_content  topOrange-line mb-3">
                                    <div class="card-body ">


                                        <p class="badge text-orange mb-1 text-right">{{ $text }}</p>

                                        <?php
                                        $empAvatar = json_decode(getEmployeeAvatarOrShortName($employee->id));
                                        // dd($empAvatar->color);
                                        ?>
                                        <div class="d-flex justify-content-center align-items-center mb-2">
                                            @if ($empAvatar->type == 'shortname')
                                                <div
                                                    class=" img-xl  d-flex justify-content-center align-items-center   rounded <?php echo $empAvatar->color; ?>">
                                                    <span class="text-white fw-bold">
                                                        {{ $empAvatar->data }}
                                                    </span>
                                                </div>
                                            @elseif($empAvatar->type == 'avatar')
                                                <?php
                                                $imageURL = request()->getSchemeAndHttpHost() . '/images/' . $empAvatar->data;
                                                ?>

                                                <img class=" userShort_name rounded img-xl" src="{{ $imageURL }}"
                                                    alt="">
                                            @endif
                                        </div>

                                        <div class="text-center">
                                            <p class=" text-muted ">
                                                {{ $employee->name }}
                                            </p>
                                            <p class="f-12  text-orange  program-day ">
                                                {{ \Carbon\Carbon::parse($employee['dob'])->format('jS M') }}
                                            </p>
                                        </div>
                                        <div class="row social_content">
                                            <div class="col-6 text-start">
                                                <i class="fa text-orange fa-birthday-cake"></i>
                                            </div>
                                            <div class="col-6 text-right">
                                                <button
                                                    class="outline-none p-2 shadow-lite rounded-circle msg_box bg-ash border-0 text-orange"
                                                    data-bs-target="#wishes_popup" data-bs-toggle="modal">
                                                    <i class=" f-15 fa fa-commenting-o "></i></button>
                                            </div>


                                        </div>


                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    @foreach ($dashboardEmployeeEventsData['work_anniversary'] as $employee)
                        <?php $text = null; ?>

                        @if (
                            \Carbon\Carbon::parse($employee['doj'])->month == date('m') &&
                                \Carbon\Carbon::parse($employee['doj'])->day == date('d'))
                            <?php $text = 'Today'; ?>
                        @elseif (
                            \Carbon\Carbon::parse($employee['doj'])->month >= date('m') &&
                                \Carbon\Carbon::parse($employee['doj'])->day > date('d'))
                            <?php $text = 'Upcoming'; ?>
                        @endif

                        @if ($text != null)
                            <?php $anyUpcoming_Current_Events = true; ?>
                            <div class="col-sm-6 col-md-4 col-xxl-3 col-xl-3 col-lg-3">
                                <div class="card wishes_content  borderTop-green mb-3">
                                    <div class="card-body ">



                                        <p class="badge text-green text-right">{{ $text }}</p>

                                        <?php
                                        $empAvatar = json_decode(getEmployeeAvatarOrShortName($employee->id));
                                        //dd($empAvatar);
                                        ?>
                                        <div class="d-flex justify-content-center align-items-center">
                                            @if ($empAvatar->type == 'shortname')
                                                <div
                                                    class=" img-xl mb-2 d-flex justify-content-center align-items-center   rounded <?php echo $empAvatar->color; ?>">
                                                    <span class="text-white fw-bold">
                                                        {{ $empAvatar->data }}
                                                    </span>
                                                </div>
                                            @elseif($empAvatar->type == 'avatar')
                                                <?php
                                                $imageURL = request()->getSchemeAndHttpHost() . '/images/' . $empAvatar->data;
                                                ?>
                                                <div
                                                    class="text-center
                                            mb-3">
                                                    <img class=" userShort_name rounded img-xl mb-2"
                                                        src="{{ $imageURL }}" alt="">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="text-center">
                                            <p class="fw-bold f-14 text-muted ">
                                                {{ $employee->name }}
                                            </p>
                                            <p class="f-12 fw-bold text-green  program-day ">
                                                {{ \Carbon\Carbon::parse($employee['dob'])->format('jS M') }}
                                            </p>
                                        </div>
                                        <div class="row social_content">
                                            <div class="col-6 text-start">
                                                <i class="text-green ri-shopping-bag-fill"></i>
                                            </div>
                                            <div class="col-6 text-right">
                                                <button
                                                    class="outline-none p-2 shadow-lite rounded-circle msg_box bg-ash border-0 text-green"
                                                    data-bs-target="#wishes_popup" data-bs-toggle="modal">
                                                    <i class=" f-15 fa fa-commenting-o "></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <!-- Need to move the below code here when controller logic is fixed     -->



                @endif

                @if (empty($anyUpcoming_Current_Events))
                    <div
                        class="wishes-card-wrapper no-events d-flex align-items-center justify-content-center flex-column">
                        <img id="" src="{{ URL::asset('assets/images/event/cancel-event.png') }}" />
                        <span class="text-muted h6  m-0">No upcoming events
                        </span>
                    </div>
                @endif

            </div>
        </div>
    </div>


    <div id="wishes_popup" class="modal  fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-md">
            <div class="modal-content">
                <div class="modal-header py-2 border-0">
                    <h6 class="modal-title ">
                        Wishes Text</h6>
                    <button type="button" class="close outline-none bg-transparent border-0 h3" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <p for="" class="text-muted f-14 fw-bold">Commants here</p> --}}
                    <textarea name="" id="" cols="" placeholder="Commants here...." rows="2"
                        class="resize-none form-control"></textarea>
                    <div class="text-end">
                        <button class="btn btn-border-orange mt-2" id=""><i class="fa fa-paper-plane me"
                                aria-hidden="true"></i> Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



