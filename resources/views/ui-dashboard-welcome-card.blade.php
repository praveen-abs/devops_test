<div class="card profile-box flex-fill">
    <div class="card-body">
        <div class="d-flex">
            <div class="status-wrapper ">

                <!-- <img src="{{ URL::asset('images/' . Auth::user()->avatar) }}" > -->
                <img src="{{ URL::asset('images/' . Auth::user()->avatar) }}"
                    class="soc-det-img profile-img-round h-100 w-100">
                <!-- <img src="{{ URL::asset('assets/images/status-pic.png') }}" alt=""
                    class="profile-img-round"> -->

                <!-- <i class="ri-checkbox-blank-circle-fill status-circle"></i> -->

            </div>
            <div class="greet-wrap mx-3">
                <div class="d-felx ">
                    <!-- <h4>Welcome Back<b class="ml-1 text-primary">{{auth()->user()->name}}</b></h4> -->
                    <p class="text-muted ">Welcome Back<b
                            class="ml-1 text-primary">{{auth()->user()->name}}</b>
                    </p>

                    <p class="text-muted f-13 mt-1 m-0">{{date('d F Y')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-12 col-xl-12 mt-2 mb-4">
                <div class="d-flex align-items-center ">
                    <p class="f-13 w-50"><i class=" ri-sun-line text-warning mr-2"></i>General shift</p>
                    <p class="f-15">
                        <span>
                            <label class="switch-checkbox m-0">
                                <input type="checkbox" id="checkin_function" @if($checked && $checked->id) checked @endif>
                                <span class="slider-checkbox check-in round">
                                    <span class="slider-checkbox-text">
                                    </span>
                                </span>
                            </label>
                        </span>
                    @if ($checked && $checked->created_at)
                    <span id="check_timing" class="text-danger">{{round(abs(strtotime(date('Y-m-d H:i:s')) - strtotime($checked->created_at)) / 60,2)}}</span>
                    @endif
                    </p>
                </div>

            </div>

        </div>

    </div>
</div>