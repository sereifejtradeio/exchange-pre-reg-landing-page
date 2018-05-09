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
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title>trade.io - Beta Exchange Platform - &amp; Pre-Registration</title>
      <meta name="robot" content="index,follow">
      <meta name="copyright" content="Copyright © 2018 trade.io. All Rights Reserved.">
      <meta name="author" content="">
      <meta name="revisit-after" content="30">
      <link rel="shortcut icon" type="image/x-icon" href="">
      <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
      <!--AOS library-->
      <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
      <!-- Jquery Framework -->
      <script type="text/javascript" src="//code.jquery.com/jquery.min.js"></script>
      <!-- Custom -->
      <script type="text/javascript" src="js/custom.js"></script>
      <!--AOS library-->
      <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
   </head>
   <body cz-shortcut-listen="true">
      
      <!-- the start of the website -->
      <div class="stack">
         <!-- header -->
         <div id="header" style="opacity: 1;">
            <!-- navigation -->
            <div class="container logonav">
               <!-- logo -->
               <div id="logo" data-aos="fade-down" data-aos-delay="300"></div>
               <div class="socialbar">
                  <a data-aos="fade-down" href="https://web.facebook.com/trade.io/?_rdc=1&_rdr" target="_blank">
                     <h3><i class="fab fa-facebook-f"></i></h3>
                  </a>
                  <a data-aos="fade-down" data-aos-delay="300" href="https://twitter.com/tradetoken?lang=en" target="_blank">
                     <h3><i class="fab fa-twitter"></i></h3>
                  </a>
                  <a data-aos="fade-down" data-aos-delay="400" href="https://www.linkedin.com/company/trade-io/" target="_blank">
                     <h3><i class="fab fa-linkedin"></i></h3>
                  </a>
                  <a data-aos="fade-down" data-aos-delay="500" href="https://www.reddit.com/r/TradeIOICO/" target="_blank">
                     <h3><i class="fab fa-reddit"></i></h3>
                  </a>
                  <a data-aos="fade-down" data-aos-delay="600" href="https://t.me/TradeToken" target="_blank">
                     <h3><i class="fab fa-telegram"></i></h3>
                  </a>
               </div>
            </div>
            <!-- header headline -->
         </div>
      </div>
   </body>
</html>