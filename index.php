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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>trade.io - Beta Exchange Platform - &amp; Pre-Registration</title>
<meta name="robot" content="index,follow">
<meta name="copyright" content="Copyright © 2016 trade.io. All Rights Reserved.">
<meta name="author" content="">
<meta name="revisit-after" content="30">
<link rel="shortcut icon" type="image/x-icon" href="">

<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    
<link rel="stylesheet" type="text/css" href="css/forms.css" media="screen">
   
<!--Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    
<!--AOS library-->
<link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">

<!-- Jquery Framework -->
<script type="text/javascript" src="//code.jquery.com/jquery.min.js"></script>
    
<!--Particles Entrty-->
<script type="text/javascript" src="https://rawgit.com/JulianLaval/canvas-particle-network/master/particle-network.min.js"></script>
    
<!--Google reCaptcha-->
<script src="https://www.google.com/recaptcha/api.js?onload=myCallBack&render=explicit" async defer></script>
    
<!-- charts -->
<script type="text/javascript" src="js/Chart.js"></script>

<!-- transform2d -->
<script type="text/javascript" src="js/plugins/jquery.transform2d.js"></script>

<!-- transform3d -->
<script type="text/javascript" src="js/plugins/jquery.transform3d.js"></script>

<!-- Jquery Easing -->
<script type="text/javascript" src="js/easing.js"></script>

<!-- trade.io Checkout-->
<script type="text/javascript" src="dashboard/js/functions.js"></script>

<!-- Custom -->
<script type="text/javascript" src="js/custom.js"></script>

<!-- Waypoints -->
<script type="text/javascript" src="js/waypoints.min.js"></script>

<!-- trade.io API-->
<script type="text/javascript" src="api2/api.js"></script>
    
<!--AOS library-->
<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>

</head>
<body cz-shortcut-listen="true">

<div id="mobile-detection"></div>

<!-- notification -->
<!--<div class="popup-notification error font-semibold"></div>-->

<!-- popup overlay -->


<div id="video-sr-wrapper" style="display: none;">
<div id="video-sr" style="opacity: 0; transform: scale(0.9);">

	<iframe src="" width="1000" height="660" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>

</div>
</div>

<!-- the start of the website -->
<div class="stack">

	<!-- header -->
	<div id="header" style="opacity: 1;">

		<!-- navigation -->
		<div class="container logonav">

			<!-- logo -->
			<div id="logo" data-aos="fade-down" data-aos-delay="300"></div>
        <div class="socialbar">
 						<a data-aos="fade-down" href="https://web.facebook.com/trade.io/?_rdc=1&_rdr" target="_blank"><h3><i class="fab fa-facebook-f"></i></h3></a>
            <a data-aos="fade-down" data-aos-delay="300" href="https://twitter.com/tradetoken?lang=en" target="_blank"><h3><i class="fab fa-twitter"></i></h3></a>
            <a data-aos="fade-down" data-aos-delay="400" href="https://www.linkedin.com/company/trade-io/" target="_blank"><h3><i class="fab fa-linkedin"></i></h3></a>
        	  <a data-aos="fade-down" data-aos-delay="500" href="https://www.reddit.com/r/TradeIOICO/" target="_blank"><h3><i class="fab fa-reddit"></i></h3></a>
            <a data-aos="fade-down" data-aos-delay="600" href="https://t.me/TradeToken" target="_blank"><h3><i class="fab fa-telegram"></i></h3></a>
        </div>


		</div>

		<!-- header headline -->
		<div id="headline" data-aos="fade-down" data-aos-delay="300">
            
			<!-- big headline -->
			<span class="font-bold">THE FUTURE OF CRYPTO TRADING</span><br><span class="font-light" style="font-weight: 100;font-size:30px">IS NOW OPEN FOR PRE REGISTRATION</span>

            <!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
<!--
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
<script>
  hbspt.forms.create({
	portalId: "4371728",
	formId: "8818173b-5098-40d4-86e9-f9bb88d06fde"
});
</script>
-->
 <div class="login">
<!--	<h1>Pre-register Now</h1>-->
    <form method="post" class="RegisterForm" id="RegisterFormTop" action="">
        
        <div id="json-register-error"></div>
        
<div id="json-register-success" style="display: none; color: #4F8A10; background-color: #DFF2BF; text-align: left; padding: 12px;">Thank you for registering!</div>
        
        <input type="hidden" name="csrf_token" id="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <input type="hidden" name="registration_source" id="registration_source" value="Pre-Registration">
        
        <div class="field-left top-username">
            <input type="text" name="top_form_username" id="top_form_username" placeholder="Username" required="required" />
            <div class="top_form_username_error"></div>
        </div>
        
        <div class="field-right top-email">
            <input type="email" name="top_form_email" id="top_form_email" placeholder="Email" required="required" />
            <div class="top_form_email_error"></div>
        </div>
        
        <div class="field-left top-password">
            <input type="password" name="top_form_password" id="top_form_password" placeholder="Password" required="required" />
            <div class="top_form_password_error"></div>
        </div>
        
        <div class="field-right top-confirm-password">
            <input type="password" name="top_form_confirm_password" id="top_form_confirm_password" placeholder="Retype Password" required="required" />
            <div class="top_form_confirm_password_error"></div>
            <div class="top_form_passwords_do_not_match_error"></div>
        </div>
        
        <div class="field-right top-captcha">
            <div class="g-recaptcha" data-sitekey="6Lehw1cUAAAAAA7blz3-HDTp4H_lsF547X1Hzjs8" id="gReCaptcha"></div>
            <div class="top_form_captcha_error"></div>
        </div>
        
        <div class="clearfix">
            <button type="submit" id="pre-register-top-btn" class="btn btn-primary btn-block btn-large">PRE-REGISTER</button>
        </div>
    </form>
</div>
            
		</div>

		<div id="opacity-extra"></div>

		<div id="play"></div>

		<div class="layer"></div>

		<div class="gradient-video"></div>

		<video playsinline="" autoplay="" muted="" loop="" poster="" id="bgvid">
		    <source src="https://cdn2.hubspot.net/hubfs/4371728/ExchangeContent/video/loop_2.webm" type="video/webm">
		    <source src="https://cdn2.hubspot.net/hubfs/4371728/ExchangeContent/video/loop_2.mp4" type="video/mp4">
		</video>

		<!-- template thumbnails wrapper
		<div id="template_thumb_wrapper">

			<div class="template_thumb">
				<div class="template_thumb_img" data-temp="1"></div>
			</div>
			<div class="template_thumb">
				<div class="template_thumb_img" data-temp="2"></div>
			</div>
			<div class="template_thumb">
				<div class="template_thumb_img" data-temp="3"></div>
			</div>
			<div class="template_thumb">
				<div class="template_thumb_img" data-temp="4"></div>
			</div>
			<div class="template_thumb">
				<div class="template_thumb_img" data-temp="5"></div>
			</div>

		</div>

		-->

	</div>

	<!-- header simulation -->
	<div id="header_blank"></div>

	<!-- introduction - 3 features -->
	<div id="introduction">
        <div id="particle-canvas">
  

        <h1>Be the first to sign up to</h1>
		<!-- the container that hold the features -->
		<ul class="clear-fix">
			<li class="states state_1" data-aos="fade-down">
                <h4><i class="fas fa-user-circle"></i></h4>
				<h3>Seamless Account Verification</h3>
				<p>Efficient onboarding of all new clients that won't leave you feeling frustrated and don't risk missing any trading opportunities.<br><br></p>
			</li>
			<li class="states state_2" data-aos="fade-down" data-aos-delay="300">
                <h4><i class="fas fa-phone-square"></i></h4>
				<h3>24/7 Responsive Support</h3>
				<p>Our support specialists are on call 24/7 by email, live chat, or telephone so you can get answers in minutes to any issues you might face.<br></p>
			</li>
			<li class="states state_4" data-aos="fade-down" data-aos-delay="600">
                <h4><i class="fas fa-exclamation-circle"></i></h4>
				<h3>No Deposit Fees</h3>
				<p>trade.io charges the lowest withdrawal fees in the market, nothing on deposits, and a flat 0.1% commission on each trade, so you can keep more of your money.</p>
			</li>
		</ul>
</div>
	</div>

	<!-- information about the dashboard -->
	<div id="dashboard" class="" >

		<div id="dashboard_left" data-aos="fade-up"></div>

		<div id="dashboard_right" data-aos="fade-down">

			<div class="textwrap" id="DashLight" >
				<h2><span></span>Why you will<br>
					love our exchange</h2>
                
                <ul class="exchange clear-fix" >
                    <li  data-aos-delay="0">Discover a clean and crisp canvas layout
                    </li>
                    <li data-aos-delay="100">Explore default widgets include charting, order book, trade history, balance, order history, chat 
                    </li>
                    <li  data-aos-delay="200">Save up to 10 of your own customized canvas layouts 
                    </li>
                    <li  data-aos-delay="300">Create custom profiles and avatars, & customizable RSS news feed 
                    </li>
                </ul>
                
                <br>
<!--				<a href="#" class="open_register font-semibold" style="text-transform: uppercase;">Register an account</a>-->
                
			</div>

		</div>

	</div>

	<div id="pes" class="">

		<div id="pes_left" data-aos="fade-down">

			<div class="textwrap pick">
				<!-- <img src="img/shopping_bag_icon.png"> -->
                
				<h2><i class="fas fa-cogs"></i></h2>
				<p>The industry's only fully customizable platform</p>
                <br>
                <p class="paragraph2">With powerful flexibility traders can create their perfect trading environment in just a few minutes after signing up, without compromising on performance or speed.</p>
			</div>

		</div>
		<div id="pes_middle" data-aos="fade-down" data-aos-delay="300">

			<div class="textwrap edit">
				<!-- <img src="img/settings_icon.png"> -->
				<h2><i class="fas fa-hand-pointer"></i></h2>
				<p>Technical indicators to help with your trading</p>
				<br>
                <p class="paragraph2">Our default charting widgets and other technical tools will allow you to review historical data that will help you to tailor your future trading strategy.  

</p>
			</div>

		</div>
		<div id="pes_right" data-aos="fade-down" data-aos-delay="600">

			<div class="textwrap send">
				<!-- <img src="img/send_icon.png"> -->
				<h2><i class="fas fa-plane"></i></h2>
				<p>Regular competitions and airdrops</p>
                <br>
                <p class="paragraph2">Register at no risk, and completely free, to be the first to find out about upcoming airdrops and regular promotions offering huge real prizes.</p>
                <div class="start_donut"></div>
			</div>

		</div>
        <div id="pes_right2" data-aos="fade-down" data-aos-delay="900">

			<div class="textwrap send2">
				<!-- <img src="img/send_icon.png"> -->
				<h2><i class="fas fa-server"></i></h2>
				<p>Worldwide servers for fast trading, no latency</p>
                <br>
                <p class="paragraph2">We understand that our clients need to trade with great power and great speed.  We utilise servers worldwide to keep latency to a minimum, wherever you choose to trade from.</p>
			</div>

		</div>

	</div>
  
  <div id="Walkthrough" data-aos="fade-up" data-aos-delay="1300">
    <br>
    <br>
    <h3>WALKTRHOUGH OF OUR BETA EXCHANGE PLATRFORM</h3>
    <br>
    <br>
    <div id="videobox">
    <div class="videoitem" style = "max-width: 1000px;padding: 0px;" data-aos="fade-down">
<!--         <h2>Researching The Coins</h2> -->
<div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><iframe src="https://fast.wistia.net/embed/iframe/2ecti34i8s?seo=false&videoFoam=true" title="Wistia video player" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%"></iframe></div></div>
<script src="https://fast.wistia.net/assets/external/E-v1.js" async></script>
     </div>
        </div>
    <br>
    <br>
    <br>
    </div>

<div id="Education" data-aos="fade-down">
    <br>
    <br>
    <h1>Free Crypto Education</h1>
    <h3>EXCHANGE CRYPTO TRADING TRAINING SERIES</h3>
    <br>
    <br>
    <div id="videobox">
    <div class="videoitem" data-aos="fade-down">
        <h2>Researching The Coins</h2>
<div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><iframe src="https://fast.wistia.net/embed/iframe/7fe7gaerg5?seo=false&videoFoam=true" title="Wistia video player" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%"></iframe></div></div>
<script src="https://fast.wistia.net/assets/external/E-v1.js" async></script>
     </div>
    <div class="videoitem" data-aos="flip-up" data-aos-delay="300">
            <h2>Leaving The Trade</h2>
<div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><iframe src="https://fast.wistia.net/embed/iframe/lxoo8o7bvx?seo=false&videoFoam=true" title="Wistia video player" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%"></iframe></div></div>
<script src="https://fast.wistia.net/assets/external/E-v1.js" async></script>
     </div>
    <div class="videoitem" data-aos="flip-up" data-aos-delay="600">
            <h2>Trading Different Cryptocurrency Types</h2>
<div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><iframe src="https://fast.wistia.net/embed/iframe/tqowq3rgzy?seo=false&videoFoam=true" title="Wistia video player" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%"></iframe></div></div>
<script src="https://fast.wistia.net/assets/external/E-v1.js" async></script>
     </div>
        </div>
    <br>
    <br>
    <br>
    </div>

	<div id="footer" >

		<div id="register_footer">

			<div class="slogan" style="display: table;">
				<h2>The trading revolution has begun!</h2>
			</div>
<h2 id="registerText">Pre-Register Now</h2>
			<div id="register-logo" style="display: none;">
				<div class="logo-btm"><a href="#"><img src="../img/footer-logo.png"></a></div>
				<!-- <div class="register-btm"><a href="#" class="">Register a Free account</a></div> -->
			</div>
                        <!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
<!--
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
<script>
  hbspt.forms.create({
	portalId: "4371728",
	formId: "8818173b-5098-40d4-86e9-f9bb88d06fde"
});
</script>
-->
<div class="login">
	<h1>Pre-register Now</h1>
    <form method="post" class="RegisterForm">
    	<input type="text" name="u" placeholder="Name" required="required" />
        <input type="email" name="p" placeholder="Email" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">PRE-REGISTER</button>
    </form>
</div>
            
            
		</div>
        
        <div class="socialbar">
            <a data-aos="fade-down" href="https://web.facebook.com/trade.io/?_rdc=1&_rdr" target="_blank"><h3><i class="fab fa-facebook-f"></i></h3></a>
            <a data-aos="fade-down" data-aos-delay="300" href="https://twitter.com/tradetoken?lang=en" target="_blank"><h3><i class="fab fa-twitter"></i></h3></a>
            <a data-aos="fade-down" data-aos-delay="400" href="https://www.linkedin.com/company/trade-io/" target="_blank"><h3><i class="fab fa-linkedin"></i></h3></a>
        	  <a data-aos="fade-down" data-aos-delay="500" href="https://www.reddit.com/r/TradeIOICO/" target="_blank"><h3><i class="fab fa-reddit"></i></h3></a>
            <a data-aos="fade-down" data-aos-delay="600" href="https://t.me/TradeToken" target="_blank"><h3><i class="fab fa-telegram"></i></h3></a>
        </div>

        <div id="copyright">

			<div>
				© trade.io 2018 
			</div>

		</div>

	</div>

</div>
<script>
var recaptcha1;
var recaptcha2;

var myCallBack = function() {


    if( document.getElementById('gReCaptcha') !=null ) {
        //Render the recaptcha1 on the element with ID "recaptcha1"
        recaptcha1 = grecaptcha.render('gReCaptcha', {
          'sitekey' : '6Lehw1cUAAAAAA7blz3-HDTp4H_lsF547X1Hzjs8', //Replace this with your Site key
          'theme' : 'light'
        });
    }

    if( document.getElementById('gReCaptchaHorizontal') !=null ) {
        //Render the recaptcha2 on the element with ID "recaptcha2"
        recaptcha2 = grecaptcha.render('gReCaptchaHorizontal', {
          'sitekey' : '6Lehw1cUAAAAAA7blz3-HDTp4H_lsF547X1Hzjs8', //Replace this with your Site key
          'theme' : 'light'
        });
    }

};    
</script>
</body></html>