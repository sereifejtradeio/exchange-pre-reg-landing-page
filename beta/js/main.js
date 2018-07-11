$( document ).ready(function() {

    //Resize video on window resize
    // $(window).resize(function(){
    //     var winWidth = $(document).width();
    //     var winHeight = $(document).height();
    //     $('#header-video').css('width', winWidth);
    //     $('#header-video').css('height', winHeight);
    // });

    $('#video-play-btn').click(function(){
        //openVideo();
    });

    $("#pre-register-btn").click(function() {
        $('html, body').animate({
            scrollTop: $("#section7").offset().top
        }, 2500);
    });

    function validateEmail(email){
        var regex=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email)
    }

    function validatePassword(password){
        var regex=/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[-+_!@#$%^&*.,?]).{8}/;
        return regex.test(password)
    }

    /* Pre-Register Form */
    $("#trading-revolution-register-btn").click(function(e) {
        e.preventDefault();

        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var confirmPassword = $('#confirm_password').val();
        var csrfToken = $('#csrf_token').val();
        var token = $("#g-recaptcha-response").val();
        var registrationSource = $('#registration_source').val();
        // var userLanguage = $('#user_language').val();
        var utmSource = $('#utm_source').val();
        var utmMedium = $('#utm_medium').val();
        var utmCampaign = $('#utm_campaign').val();
        var utmTerm = $('#utm_term').val();
        var utmContent = $('#utm_content').val();


        if (username == '') {
            $('#username').css({
                "border": "1px solid #d76468"
            });
            $('.username_error').show();
        } else {
            $('#username').css({
                "border": "1px solid rgba(0, 0, 0, 0.3)"
            });
            $('.username_error').hide();
        }

        if (email == '') {
            $('#email').css({
                "border": "1px solid #d76468"
            });
            $('.email_error').show();
        } else {
            $('#email').css({
                "border": "1px solid rgba(0, 0, 0, 0.3)"
            });
            $('.email_error').hide();
        }

        if (!validateEmail(email)) {
            $('#email').css({
                "border": "1px solid #d76468"
            });
            $('.email_error').show();
        } else {
            $('#email').css({
                "border": "1px solid rgba(0, 0, 0, 0.3)"
            });
            $('.email_error').hide();
        }

        if (password == '') {
            $('#password').css({
                "border": "1px solid #d76468"
            });
            $('.password_error').show();
        } else {
            $('#password').css({
                "border": "1px solid rgba(0, 0, 0, 0.3)"
            });
            $('.password_error').hide();
        }

        if (!validatePassword(password)) {
            $('#password').css({
                "border": "1px solid #d76468"
            });
            $('.password_error').show();
        } else {
            $('#password').css({
                "border": "1px solid rgba(0, 0, 0, 0.3)"
            });
            $('.password_error').hide();
        }

        if (confirmPassword == '') {
            $('#confirm_password').css({
                "border": "1px solid #d76468"
            });
            $('.confirm_password_error').show();
        } else {
            $('#confirm_password').css({
                "border": "1px solid rgba(0, 0, 0, 0.3)"
            });
            $('.confirm_password_error').hide();
        }

        if (!validatePassword(confirmPassword)) {
            $('#confirm_password').css({
                "border": "1px solid #d76468"
            });
            $('.confirm_password_error').show();
        } else {
            $('#confirm_password').css({
                "border": "1px solid rgba(0, 0, 0, 0.3)"
            });
            $('.confirm_password_error').hide();
        }

        if ((password != '' && confirmPassword != '') && (password != confirmPassword)) {
            $('#confirm_password').css({
                "border": "1px solid #d76468"
            });
            $('.passwords_do_not_match_error').show();
        } else if ((password != '' && confirmPassword != '') && (password == confirmPassword)) {
            $('#confirm_password').css({
                "border": "1px solid rgba(0, 0, 0, 0.3)"
            });
            $('.passwords_do_not_match_error').hide();
        }

        //Ajax call for form submission
        var dataString = 'username=' + username + '&email=' + email + '&password=' + password + '&confirm_password=' + confirmPassword + '&csrf_token=' + csrfToken + '&token=' + token + '&registrationSource=' + registrationSource + '&utmSource=' + utmSource + '&utmMedium=' + utmMedium + '&utmCampaign=' + utmCampaign + '&utmTerm=' + utmTerm + '&utmContent=' + utmContent;

        $.ajax({
            type: "POST",
            url: "ajax/pre-register.php",
            data: dataString,
            success: function(data) {

                $('#json-register-success').hide();

                var obj = jQuery.parseJSON(data);

                if (obj.error) {

                    grecaptcha.reset(recaptcha1);

                    $("#json-register-error").html('');

                    $("#json-register-error").append('*' + obj.error);

                    if (Array.isArray(obj.error)) {

                        $.each(obj.error, function(i, item) {

                            //$(".top_form_" + item.element + "_error").html('');

                            //$(".top_form_" + item.element + "_error").append('*' + item.message + '<br/>');

                            $("." + item.element + "_error").show();

                        });

                    } else {

                        $(".username_error").hide();
                        $(".email_error").hide();
                        $(".password_error").hide();
                        $(".confirm_password_error").hide();
                        $(".captcha_error").hide();

                        $("#json-register-error").html('');

                        $("#json-register-error").append('*' + obj.error);

                        if (username != '' && email != '' && password != '' && confirmPassword != '') {
                            $("#json-register-error").show();
                        }
                    }


                } else {

                    $(".username_error").hide();
                    $(".email_error").hide();
                    $(".password_error").hide();
                    $(".confirm_password_error").hide();
                    $(".captcha_error").hide();

                    $('#json-error-error').hide();
                    $('#json-error-success').hide();
                    $('#json-register-success').show();
                    $('#trading-revolution-form').each(function() {
                        this.reset();
                    });

                    //Google Tag Manager Data Layer Push Event
                    // window.dataLayer = window.dataLayer || [];
                    // window.dataLayer.push({
                    //     event: 'formSubmissionSuccess',
                    //     formId: 'TopForm',
                    //     formName: 'Airdrops May \'18'
                    // });
                    grecaptcha.reset(recaptcha1);

                }

            }
        });
    });

});


