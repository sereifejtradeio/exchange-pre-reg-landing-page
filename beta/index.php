<?php
function check_start_session() {
    if(!session_id()) {
        session_start();
    }
}

function set_csrf_token() {
    $_SESSION['previous_csrf_token'] = $_SESSION['csrf_token'];
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

check_start_session();
set_csrf_token();

// Get utm parameters
$utm_source = filter_input(INPUT_GET, 'utm_source', FILTER_SANITIZE_ENCODED);
$utm_medium = filter_input(INPUT_GET, 'utm_medium', FILTER_SANITIZE_ENCODED);
$utm_campaign = filter_input(INPUT_GET, 'utm_campaign', FILTER_SANITIZE_ENCODED);
$utm_term = filter_input(INPUT_GET, 'utm_term', FILTER_SANITIZE_ENCODED);
$utm_content = filter_input(INPUT_GET, 'utm_content', FILTER_SANITIZE_ENCODED);

function getFullURL() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http';
    $full_url = $protocol."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    return $full_url;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>trade.io - Beta Exchange Platform - &amp; Pre-Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!--Google reCaptcha-->
    <script src="https://www.google.com/recaptcha/api.js?onload=myCallBack&render=explicit" async defer></script>
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,500,700" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/main.js" type="text/javascript"></script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WLHR9B4');</script>
    <!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WLHR9B4"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="row no-gutters" id="section1">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div id="header-video">
            <video playsinline="" autoplay="" muted="" loop="" poster="" id="bgvid">
                <source src="https://tradeio-marketing-cdn.azureedge.net/exchange-trade-io/loop_2.webm" type="video/webm">
                <source src="https://tradeio-marketing-cdn.azureedge.net/exchange-trade-io/loop_2.mp4" type="video/mp4">
            </video>
            <div class="container">
                <div class="row">
                    <h1>THE FUTURE OF <br/>CRYPTO TRADING</h1>
                    <h3>IS NOW OPEN FOR PRE REGISTRATION</h3>
                </div>
                <div class="row">

                    <script src="https://fast.wistia.com/embed/medias/mjb7ge00az.jsonp" async></script>
                    <script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>
                    <span class="wistia_embed wistia_async_mjb7ge00az popover=true popoverContent=link">
                        <a href="#"><div id="video-play-btn"></div></a></span>

                </div>
                <div class="row">
                    <div id="pre-register-btn"><button>Pre-Register</button></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row no-gutters" id="section2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="usp-container clearfix">
                    <div class="icon-container-left">
                        <div id="usp1-icon"></div>
                        <div id="usp1-line"></div>
                        <div class="circle-1">
                           <span>
                           </span>
                        </div>
                    </div>
                    <div class="ups-text-container-left">
                        <div class="usp-title text-align-left">
                            The industry's only fully<br/>
                            customizable platform
                        </div>
                        <div class="usp-description text-align-left">
                            With powerful flexibility you can create your perfect trading environment in just a few minutes after signing up, without compromising on performance or speed.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="usp-container clearfix">
                    <div class="icon-container-right">
                        <div id="usp2-icon"></div>
                        <div id="usp2-line"></div>
                        <div class="circle-2">
                           <span>
                           </span>
                        </div>
                    </div>
                    <div class="ups-text-container-right">
                        <div class="usp-title text-align-right">
                            The industry's only fully<br/>
                            customizable platform
                        </div>
                        <div class="usp-description text-align-right">
                            With powerful flexibility you can create your perfect trading environment in just a few minutes after signing up, without compromising on performance or speed.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-lg-12 col-md-12 col-sm-6">
            <div class="usp-line"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="usp-container clearfix">
                    <div class="icon-container-right">
                        <div id="usp3-icon"></div>
                        <div id="usp3-line"></div>
                        <div class="circle-reverse-3">
                           <span>
                           </span>
                        </div>
                    </div>
                    <div class="ups-text-container-right">
                        <div class="usp-title text-align-right">
                            The industry's only fully<br/>
                            customizable platform
                        </div>
                        <div class="usp-description text-align-right">
                            With powerful flexibility you can create your perfect trading environment in just a few minutes after signing up, without compromising on performance or speed.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="usp-container clearfix">
                    <div class="icon-container-left">
                        <div id="usp4-icon"></div>
                        <div id="usp4-line"></div>
                        <div class="circle-reverse-4">
                           <span>
                           </span>
                        </div>
                    </div>
                    <div class="ups-text-container-left">
                        <div class="usp-title text-align-left">
                            The industry's only fully<br/>
                            customizable platform
                        </div>
                        <div class="usp-description text-align-left">
                            With powerful flexibility you can create your perfect trading environment in just a few minutes after signing up, without compromising on performance or speed.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row no-gutters" id="section3">
    <div class="container padding-100">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="section-header-title">
                    <h1 class="blue-text-color">Be the first<br/>to sign up</h1>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="be-the-first-to-sign-up-usp-container">
                    <div id="usp-icon1"></div>
                    <div class="usp-icon1-title blue-text-color">Easy Account<br/>Verification</div>
                    <div class="usp-icon1-text blue-text-color">Efficient onboarding of all new clients. Less groan, more yay!</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="be-the-first-to-sign-up-usp-container">
                    <div id="usp-icon2"></div>
                    <div class="usp-icon2-title blue-text-color">24/7 Responsive<br/>Support</div>
                    <div class="usp-icon2-text blue-text-color">Our support specialists are on available 24/7 by email, or live chat, so you can get answers in minutes to any issues you might face.</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="be-the-first-to-sign-up-usp-container">
                    <div id="usp-icon3"></div>
                    <div class="usp-icon3-title blue-text-color">Secure Trading<br/>Environment</div>
                    <div class="usp-icon3-text blue-text-color">Multi-layered sign-in authentication and 24/7 monitoring by in-house cybersecurity team.</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row no-gutters infographic-bg" id="section4">
    <div class="container padding-100">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12"></div>
            <div class="col-lg-6 col-md-6 col-sm-12 why-you-will-love-our-exchange pull-right">
                <div id="why-you-will-love-our-exchange-container">
                    <div id="why-you-will-love-our-exchange-title">
                        <h1>Why you will love<br/> our exchange</h1>
                    </div>
                    <div id="why-you-will-love-our-exchange-points">
                        <ul>
                            <li>Clean and crisp layout</li>
                            <li>Customizable/Movable widgets</li>
                            <li>Create and save up to 10 preset layouts(multi-screen compatible)</li>
                            <li>Customizable profile, newsfeed, chat and more</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row no-gutters" id="section5">
    <div class="vignette dot">
        <div class="container padding-100">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="section-header-title">
                        <h1 class="white-text-color">WALKTRHOUGH OF OUR<br/>BETA EXCHANGE PLATFORM</h1>
                    </div>
                    <script src="https://fast.wistia.com/embed/medias/2ecti34i8s.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><span class="wistia_embed wistia_async_2ecti34i8s popover=true popoverContent=link"><a href="#"><div id="video-thumbnail"></div></a></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row no-gutters" id="section6">
    <div class="container padding-100">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="section-header-title">
                    <h1 class="white-text-color">Free Crypto Education</h1>
                </div>
                <div class="section-subheader-title">
                    <h3 class="white-text-color">EXCHANGE CRYPTO TRADING<br/>TRAINING SERIES</h3>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="education-video-container">
                    <div class="education-video-title">Researching The Coins</div>
                    <script src="https://fast.wistia.com/embed/medias/34dl1yxs5x.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding"><div class="wistia_responsive_wrapper"><span class="wistia_embed wistia_async_34dl1yxs5x popover=true popoverAnimateThumbnail=true popoverContent=link videoFoam=true"><a href="#"><div id="education-video1"></div></a></span></div></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="education-video-container">
                    <div class="education-video-title">Leaving The Trade</div>
                    <script src="https://fast.wistia.com/embed/medias/667oblhh00.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding"><div class="wistia_responsive_wrapper"><span class="wistia_embed wistia_async_667oblhh00 popover=true popoverAnimateThumbnail=true popoverContent=link videoFoam=true"><a href="#"><div id="education-video2"></div></a></span></div></div>

                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="education-video-container">
                    <div class="education-video-title">Trading Different Cryptocurrency Types</div>
                    <script src="https://fast.wistia.com/embed/medias/ewcmvqsj7z.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding"><div class="wistia_responsive_wrapper"><span class="wistia_embed wistia_async_ewcmvqsj7z popover=true popoverAnimateThumbnail=true popoverContent=link videoFoam=true"><a href="#"><div id="education-video3"></div></a></span></div></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row no-gutters" id="section7">
    <div class="container padding-top-100">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="section-header-title">
                    <h1 class="blue-text-color"> The trading revolution<br/>has begun! </h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div id="trading-revolution"></div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div id="trading-revolution-form-container">
                    <form action="" method="post" id="trading-revolution-form">
                        <div class="input-container">
                            <div id="json-register-error"></div>
                            <div id="json-register-success">Thank you for registering!</div>
                        </div>

                        <div class="input-container">
                            <input type="hidden" name="csrf_token" id="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                            <input type="hidden" name="registration_source" id="registration_source" value="<?php echo getFullURL();?>">
                            <input type="hidden" name="user_language" id="user_language" value="<?php echo $languageFullName[$lang]; ?>">
                            <input type="hidden" name="utm_source" id="utm_source" value="<?php echo $utm_source; ?>">
                            <input type="hidden" name="utm_medium" id="utm_medium" value="<?php echo $utm_medium; ?>">
                            <input type="hidden" name="utm_campaign" id="utm_campaign" value="<?php echo $utm_campaign; ?>">
                            <input type="hidden" name="utm_term" id="utm_term" value="<?php echo $utm_term; ?>">
                            <input type="hidden" name="utm_content" id="utm_content" value="<?php echo $utm_content; ?>">
                        </div>

                        <div class="input-container">
                            <h1 id="trading-revolution-pre-register-title">Pre-Register Now</h1>
                        </div>
                        <div class="input-container">
                            <label>Username</label><br/>
                            <input type="text" id="username" name="username"/>
                            <div class="username_error">*Username cannot be empty!</div>
                        </div>
                        <div class="input-container">
                            <label>Email</label><br/>
                            <input type="text" id="email" name="email"/>
                            <div class="email_error">*Email is invalid!</div>
                        </div>
                        <div class="input-container">
                            <label>Password</label><br/>
                            <input type="password" id="password" name="password"/>
                            <div class="password_error">*Password must have 8 chars, one lowercase, one uppercase, one number, and one special character!</div>
                        </div>
                        <div class="input-container">
                            <label>Re-type Password</label><br/>
                            <input type="password" id="confirm_password" name="confirm_password"/>
                            <div class="confirm_password_error">*Repeat Password must have 8 chars, one lowercase, one uppercase, one number, and one special character!</div>
                            <div class="passwords_do_not_match_error">*Password and Repeat password do not match!</div>
                        </div>
                        <div class="input-container">
                            <div class="g-recaptcha" data-sitekey="6Lehw1cUAAAAAA7blz3-HDTp4H_lsF547X1Hzjs8" id="gReCaptcha"></div>
                            <div class="captcha_error">Invalid Captcha!</div>
                        </div>
                        <div class="input-container">
                            <label></label><br/>
                            <div id="trading-revolution-register-btn"><button>Pre-Register</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row no-gutters" id="section8">
    <div class="container padding-100 c-fp-footer__symbolics">
        <div id="left-engine" class="c-fp-footer__corner is-left">
            <img src="images/left-footer-bg.png"/>
        </div>
        <div class="c-fp-footer__light is-left">
            <span></span>
        </div>
        <div id="center-engine">
            <div class="row no-gutters">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div id="trade-io-coin"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="contact-container text-center">
                        <a href="mailto:support@trade.io" class="support-email" target="_blank"><i class="icon fa fa-at"></i><span>support@trade.io</span></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="contact-container text-center">
                        <a href="#" class="support-telephone" target="_blank"><i class="icon fa fa-phone"></i><span>+86 159 0173 8554</span></a>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div id="footer-logo"></div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div id="copyright">© 2018 trade.io, All rights reserved.</div>
                </div>
            </div>
        </div>
        <div id="right-engine" class="c-fp-footer__corner is-right">
            <img src="images/right-footer-bg.png"/>
        </div>
        <div class="c-fp-footer__light is-right">
            <span></span>
        </div>
    </div>


    <div id="social-media-container">
        <a href="https://www.facebook.com/trade.io" target="_blank" rel="noopener"><div id="facebook-icon"></div></a>
        <a href="https://twitter.com/tradetoken" target="_blank" rel="noopener"><div id="twitter-icon"></div></a>
    </div>

</div>

<script>
    var recaptcha1;

    var myCallBack = function() {

        if( document.getElementById('gReCaptcha') !=null ) {
            //Render the recaptcha1 on the element with ID "recaptcha1"
            recaptcha1 = grecaptcha.render('gReCaptcha', {
                'sitekey' : '6Lehw1cUAAAAAA7blz3-HDTp4H_lsF547X1Hzjs8', //Replace this with your Site key
                'theme' : 'light'
            });
        }

    };
</script>
</body>
</html>