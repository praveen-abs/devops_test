<div class="modal fade" id="viewAllHolidays" tabindex="-1" aria-labelledby="viewAllHolidays" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content top-line">
            <div class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
                <h5 class="modal-title mb-1 text-primary" style="border-bottom:5px solid #d0d4e2;">
                    New Assign Goals</h5>
                <button type="button" class="close outline-none bg-transparent border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Festival</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($holidays) > 0)
                            @foreach($holidays as $holidayList)
                            <tr>
                                <td>{{ $holidayList->holiday_name }}</td>
                                <td>{{ date('d-m-Y', strtotime($holidayList->holiday_date)) }}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-border-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="card profile-box flex-fill line-0 border-0">
    <div class="card-body " style="padding:0px !important">
        <!-- <div class="card-img"> -->

        <div class="slideshow-container ">
            @foreach ($holidays as $day)
            <div class="slides fade-slider ">
                <div class="numbertext text-white" data-bs-toggle="modal" data-bs-target="#viewAllHolidays">View All</div>
                <img src="{{ URL::asset('assets/images/holiday/'.$day->image) }}" class="w-100">
                <div class="holiday-text text-center w-100 text-white ">
                    {{$day->holiday_name}}

                </div>
            </div>
            @endforeach

            <div class="d-flex">
                <a class="slide-next" onclick="plusSlides(1)"> <i class="ri-arrow-right-s-line text-white"></i> </a>
                <a class="slide-prev" onclick="plusSlides(-1)"><i class="ri-arrow-left-s-line text-white"></i></a>
            </div>
            <!-- <div class="text-center carousel-dots">
                @foreach ($holidays as $key => $day)
                <span class="dot" onclick="currentSlide({{$key+1}})"></span>
                @endforeach
            </div> -->
        </div>
        <!-- </div> -->
    </div>
</div>