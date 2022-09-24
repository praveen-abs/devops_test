<div class="event-wrapper">
    <div class="card profile-box border-0">
        <div class="card-body">
            <h6 class="text-primary">Events</h6>
            <div class="row">
                @if ($dashboardEmployeeEventsData['hasData'] == 'true')
                    @foreach ($dashboardEmployeeEventsData['birthday'] as $employee)
                        <div class="col-sm-6 col-md-6 col-xl-3 col-lg-3">
                            <div class="card profile-box flex-fill" style="border-top: 5px solid #E54E0D;">
                                <!-- <div class="p-1 bg-danger" ></div> -->
                                <div class="card-body ">
                                    <div class="wishes-card-wrapper">
                                        <p class="text-muted f-12 m-0"><i class="ri-cake-2-fill f-13 mr-2"
                                                style="color:#E54E0D;"></i> Happy
                                            Birthday</p>
                                        <div class="mt-2 ">
                                            <div class="px-2 d-flex ">
                                                <img src="{{ URL::asset('images/' . $employee->avatar) }}"
                                                    alt="" class="img-round">
                                                <p class=" text-primary fw-bold f-12 mx-3 mt-3">{{ $employee->name }}</p>
                                            </div>
                                            <p class="text-danger f-12 fw-bold text-right program-day "
                                                style="color:#E54E0D;">
                                                @if ($employee['dob'] == date('Y-m-d'))
                                                    Today
                                                @else
                                                    Upcoming
                                                @endif
                                                {{ $employee['dob'] }}
                                            </p>
                                        </div>
                                        <i class="float-right bg-icon text-danger ri-cake-2-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @foreach ($dashboardEmployeeEventsData['work_anniversary'] as $employee)
                        <div class="col-sm-6 col-md-6 col-xl-3 col-lg-3">
                            <div class="card profile-box flex-fill" style="border-top: 5px solid #037B5A;">
                                <div class="card-body ">
                                    <div class="wishes-card-wrapper">
                                        <p class="text-muted f-12   m-0"><i class=" f-12 mr-2 ri-shopping-bag-fill"
                                                style="color:#037B5A;"></i>
                                            Work Anniversary</p>
                                        <div class="mt-2 ">
                                            <div class="px-2 d-flex ">
                                                <img src="{{ URL::asset('images/' . $employee->avatar) }}"
                                                    alt="" class="img-round">
                                                <p class=" text-primary f-12 fw-bold mx-3 mt-3">{{ $employee->name }}</p>
                                            </div>
                                            <p class="fw-bold f-12 text-right program-day " style="color:#037B5A;">
                                                @if ($employee['doj'] == date('Y-m-d'))
                                                    Today
                                                @else
                                                    Upcoming
                                                @endif
                                                {{ $employee['doj'] }}
                                            </p>

                                        </div>
                                        <i class="float-right bg-icon  ri-shopping-bag-fill" style="color:#037B5A"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="col-sm-4 col-md-4 col-xl-4 col-lg-4">
                <div class="card profile-box flex-fill" style="border-top: 5px solid #037B5A;">
                    <!-- <div class="p-1 bg-danger" ></div> -->
                    <div class="card-body ">
                        <div class="wishes-card-wrapper">
                            <p class="text-muted  m-0"><i class=" f-13 mr-2 ri-shopping-bag-fill"></i> Work
                                Anniversary</p>
                            <div class="mt-2 ">
                                <div class="px-2 d-flex">
                                    <img src="{{ URL::asset('assets/images/event2.png') }}" alt="" class="img-round">
                <!-- <h6 class=" text-primary mx-3 mt-3">{{auth()->user()->name}}</h6> -->
                <h6 class=" text-primary mx-3 mt-3">Ray</h6>
            </div>
            <p class="fw-bold text-right program-day " style="color:#037B5A">Tomorrow</p>
        </div>
        <i class="float-right bg-icon  ri-shopping-bag-fill" style="color:#037B5A"></i>
    </div>

</div>
</div>
</div> --}}
                    {{-- <div class="col-sm-4 col-md-4 col-xl-4 col-lg-4">
            <div class="card profile-box flex-fill" style="border-top: 5px solid #B10856;">
                <!-- <div class="p-1 bg-danger" ></div> -->
                <div class="card-body ">
                    <div class="wishes-card-wrapper">
                        <p class="text-muted  m-0"><i class=" ri-hearts-fill f-13 mr-2"></i>Wedding
                            Anniversary</p>
                        <div class="mt-2  ">
                            <div class="px-2 d-flex">
                                <img src="{{ URL::asset('assets/images/event3.png') }}" alt="" class="img-round">
<!-- <h6 class=" text-primary mx-3 mt-3">{{auth()->user()->name}}</h6> -->
<h6 class=" text-primary mx-3 mt-3">Mosh</h6>
</div>
<p class="fw-bold text-right program-day" style="color:#B10856">09/07/2022</p>
</div>
<i class="float-right bg-icon  ri-hearts-fill" style="color:#B10856"></i>
</div>

</div>
</div>
</div> --}}
                @else
                    <div
                        class="wishes-card-wrapper no-events d-flex align-items-center justify-content-center flex-column">
                        <img id="" src="{{ URL::asset('assets/images/event/cancel-event.png') }}" />
                        <span class="text-muted h6  m-0">No upcoming events
                        </span>

                    </div>
            </div>
        </div>
    </div>
</div>
@endif
