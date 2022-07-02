<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/feather-icons/feather-icons.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/plugins/lord-icon-2.1.0.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins.min.js') }}"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

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
