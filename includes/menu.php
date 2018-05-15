<?php
$now = new DateTime();
$now->setTimezone(new DateTimeZone('Europe/Nicosia'));
$end = new DateTime('2017-11-26 01:00:00', new DateTimeZone('Europe/Nicosia'));
//$end = new DateTime('2017-11-25 01:00:00', new DateTimeZone('Europe/Nicosia'));

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';
?>

<style>
    .mob-menu .current {
        background-color: #4896d3 !important;
    }

    a.btn.btn--alt.menu-btn:hover {
        color: #425469;
        border-color: #425469;
        background-color: white;
    }

    /*.chat-mobile {*/
    /*display: none !important;*/
    /*}*/

    @media screen and (min-width: 768px) {
        a.btn.btn--alt.menu-btn {
            font-size: 19px;
            font-weight: 500 !important;
        }
    }

    @media screen and (max-width: 991px) {
        a.btn.btn--alt.menu-btn {
            display: block !important;;
            color: #00405b !important;
            padding: 1em 1.5em !important;;
            text-decoration: none !important;
            background: #35eaed !important;
            border-radius: 0px !important;
            border: none !important;
            border-bottom: 1px solid #222 !important;
            font-size: 17px;
            font-weight: 400 !important;
            font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
        }

        /*.chat-mobile {*/
        /*display: block !important;*/
        /*}*/
        /*#livechat-compact-container {*/
        /*display: none !important;*/
        /*}*/

    }

    a.btn.btn--alt.menu-btn {
        padding: 5px 10px 5px 10px;
        border: 2px solid #4996d2;
        color: white;
        background-color: #4996d2;
    }
</style>
<?php include('testlang.php') ?>