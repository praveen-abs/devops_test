<div class="card profile-box  flex-fill">
    <div class="card-body ">
        <!-- <div class="card-img"> -->

        <div class="slideshow-container">
            @foreach ($holidays as $day)
                <div class="slides fade-slider">
                    <div class="numbertext">View All</div>
                    <img src="{{ URL::asset('assets/images/fest'. $day->image) }}" class="w-100 h-100">
                    <div class="text">{{$day->holiday_name}}</div>
                </div>
                @endforeach
            
            <div class="d-flex">
                <a class="slide-next" onclick="plusSlides(1)"> <i class="ri-arrow-right-s-line"></i> </a>
                <a class="slide-prev" onclick="plusSlides(-1)"><i class="ri-arrow-left-s-line"></i></a>
            </div>
            <div style="text-align:center">
                @foreach ($holidays as $key => $day)
                <span class="dot" onclick="currentSlide({{$key+1}})"></span>
                @endforeach
            </div>
        </div>
        <!-- </div> -->
    </div>
</div>