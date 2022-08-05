<div class="event-wrapper">
    <h5 class="text-primary"><b>Events</b></h5>
    <div class="row">
        <div class="col-sm-4 col-md-4 col-xl-4 col-lg-4">
            <div class="card profile-box flex-fill" style="border-top: 5px solid #E54E0D;">
                <!-- <div class="p-1 bg-danger" ></div> -->
                <div class="card-body ">
                @isset($date)
                @php 
                if($date != date('Y-m-d')){
                @endphp
                    <div class="wishes-card-wrapper">

                        <p class="text-muted  m-0"><i class="ri-cake-2-fill f-13 mr-2" style="color:#E54E0D;"></i> Happy
                            Birthday</p>
                        <div class="mt-2 ">
                            <div class="px-2 d-flex ">
                                <!-- <img src="{{ URL::asset('images/' . Auth::user()->avatar) }}"
                            class="img-round"> -->
                                <img src="{{ URL::asset('assets/images/event1.png') }}" alt="" class="img-round">
                                <h6 class=" text-primary mx-3 mt-3">{{auth()->user()->name}}</h6>
                            </div>
                            <p class="text-danger fw-bold text-right program-day " style="color:#E54E0D;">Today{{$date}}</p>
                        </div>
                        <i class="float-right bg-icon text-danger ri-cake-2-fill"></i>
                    </div>

                @php } @endphp
                @endisset
                </div>
            </div>
        </div>
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
     {{--    <div class="col-sm-4 col-md-4 col-xl-4 col-lg-4">
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
    </div>
</div>