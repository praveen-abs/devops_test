<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
{{-- if uncommented -> dropdown not working --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script> --}}

<script
			  src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

<script src="{{ URL::asset('assets/libs/swiper/swiper.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>

<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/feather-icons/feather-icons.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/plugins/lord-icon-2.1.0.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.min.js') }}" defer></script><!-- Vendor Script -->

<!-- Layout config Js -->
<script src="{{ URL::asset('assets/js/layout.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.common-toast-close').click(function() {
            $('.common-toast').toast('hide');
        });
        var resultToast = "<?= Session::get('result');  ?>";
        var alertToast = "<?= Session::get('alert');  ?>";

        if(resultToast != "" && alertToast != ""){

            if(alertToast == "success"){
                $("#result-toast-success").html(resultToast);
                $('.common-toast-success').toast('show');
            } else {
                $("#result-toast-error").html(resultToast);
                $('.common-toast-error').toast('show');
            }
        }
    });
</script>
@yield('script')
@yield('script-bottom')
