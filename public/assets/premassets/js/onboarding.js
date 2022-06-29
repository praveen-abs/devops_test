$(document).ready(function() {

    $('body').on('keyup', ".onboard-form", function() {
        var inputvalues = $(this).val();
        var data = $(this).attr('name');
        if ($(this).attr('pattern') != undefined && $(this).attr('pattern') != '' && inputvalues !=
            '') {
            var pattern = {
                'pan': /^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/,
                'aadhar': /^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$/,
                'passport': /^[a-zA-Z]{2}[0-9]{7}$/,
                'account': /^[0-9]{9,18}$/,
                'dl': /^(([A-Z]{2}[0-9]{2})( )|([A-Z]{2}-[0-9]{2}))((19|20)[0-9][0-9])[0-9]{7}$/,
                'gst': /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/,
                'alp-num': /^[a-zA-Z0-9]+$/,
                'alpha': /^[a-zA-Z]+$/,
            };
            var regex = $(this).attr('pattern');
            if (!pattern[regex].test(inputvalues)) {
                $('.' + data + '_label').addClass('patternErr');
            } else {
                $('.' + data + '_label').removeClass('patternErr');
            }
        }
    });

    $('body').on('click', '.validate', function() {
        $(this).removeClass('not-required');
    });

    $('body').on('keyup', '.validate', function() {
        var data = $(this).attr('name');
        if ($(this).val() == '') {
            $('.' + data + '_label').removeClass('patternErr');
        }
    });

    $('body').on('blur', '.validate', function() {
        if ($(this).val() == '') {
            $(this).addClass('not-required');
        } else {
            $(this).removeClass('not-required');
        }
    });

    $('body').on('blur', '.onboard-form', function() {
        var id = $(this).attr('name');
        if ($(this).val() == '') {
            $("label[for='" + id + "']").removeClass('empty');
        } else {
            $("label[for='" + id + "']").addClass('empty');
        }
        if ($("input[name='" + id + "']").valid()) {
            $("label[for='" + id + "']").removeClass('notvalid');
            $("input[name='" + id + "']").removeClass('notvalid');
        } else {
            $("label[for='" + id + "']").addClass('notvalid');
            $("input[name='" + id + "']").addClass('notvalid');
        }
    });

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    setProgressBar(current);

    $(".next").click(function() {
        current_fs = $('#' + $(this).attr('data'));
        var data = $(this).attr('data');
        const myArray = data.split("-");
        if ($('#form-' + myArray[1]).valid()) {
            next_fs = $('#' + $(this).attr('next'));
            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 500
            });
            // if ($(this).attr('url') != '') {
            //     window.location.href = $(this).attr('url');
            // }
            setProgressBar(++current);
            console.log(current);
        }
    });

    $(".previous").click(function() {
        current_fs = $('#' + $(this).attr('data'));
        previous_fs = $('#' + $(this).attr('prev'));
        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({
                    'opacity': opacity
                });
            },
            duration: 500
        });
        setProgressBar(--current);
    });

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
    }



    $(".submit").click(function() {
        return false;
    });

   


});
