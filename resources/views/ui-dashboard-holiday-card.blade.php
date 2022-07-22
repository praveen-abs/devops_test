<div class="card profile-box card-top-border flex-fill">
    <div class="card-body ">
        <!-- <div class="card-img"> -->
            <!-- <img src="{{ URL::asset('assets/images/independence.jpg') }}" alt="" class="w-100 h-100"> -->
            <div class="slideshow-container">
                @foreach ($holidays as $day)
                <div class="slides fade-slider">
                    <div class="numbertext">View All</div>
                    <img src="{{ URL::asset('assets/images/holiday/'. $day->image) }}" style="width:100%">
                    <div class="text">{{$day->holiday_name}}</div>
                </div>
                @endforeach

                <a class="slide-prev" onclick="plusSlides(-1)">❮</a>
                <a class="slide-next" onclick="plusSlides(1)">❯</a>
                <div style="text-align:center">
                    @foreach ($holidays as $key => $day)
                    <span class="dot" onclick="currentSlide({{$key+1}})"></span> 
                    @endforeach
                </div>
            </div>
        <!-- </div> -->
    </div>
</div>