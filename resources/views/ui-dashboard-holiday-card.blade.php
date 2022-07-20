<div class="card profile-box card-top-border flex-fill">
    <div class="card-body ">
        <!-- <div class="card-img"> -->
            <!-- <img src="{{ URL::asset('assets/images/independence.jpg') }}" alt="" class="w-100 h-100"> -->
            <div class="slideshow-container">
                <div class="slides fade-slider">
                    <div class="numbertext">View All</div>
                    <img src="{{ URL::asset('assets/images/independence.jpg') }}" style="width:100%">
                    <div class="text">Holiday</div>
                </div>

                <div class="slides fade-slider">
                    <div class="numbertext">View All</div>
                    <img src="{{ URL::asset('assets/images/independence.jpg') }}" style="width:100%">
                    <div class="text">Holiday</div>
                </div>

                <div class="slides fade-slider">
                    <div class="numbertext">View All</div>
                    <img src="{{ URL::asset('assets/images/independence.jpg') }}" style="width:100%">
                    <div class="text">Holiday</div>
                </div>

                <a class="slide-prev" onclick="plusSlides(-1)">❮</a>
                <a class="slide-next" onclick="plusSlides(1)">❯</a>
                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span> 
                    <span class="dot" onclick="currentSlide(2)"></span> 
                    <span class="dot" onclick="currentSlide(3)"></span> 
                </div>
            </div>
        <!-- </div> -->
    </div>
</div>