<div class="card profile-box  flex-fill">
    <div class="card-body " style="padding:0px !important">
        <!-- <div class="card-img"> -->

        <div class="slideshow-container ">
            @foreach ($holidays as $day)
                <div class="slides fade-slider ">
                    <div class="numbertext text-white">View All</div>
                    <img src="{{ URL::asset('assets/images/holiday/'.$day->image) }}" class="w-100 h-100">
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