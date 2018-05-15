<?php

$uri = explode('?', $_SERVER['REQUEST_URI']);

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

$utm_source = isset($_GET['utm_source']) ? $_GET['utm_source'] : '';
$utm_campaign = isset($_GET['utm_campaign']) ?  $_GET['utm_campaign'] : '';
$utm_medium = isset($_GET['utm_medium']) ?  $_GET['utm_medium'] : '';
$utm_content = isset($_GET['utm_content']) ?  $_GET['utm_content'] : '';
$utm_term = isset($_GET['utm_term']) ?  $_GET['utm_term'] : '';

//$lang_uri = '?lang=' . $lang;
$lang_uri = '';
if ($utm_source != '') {
    $lang_uri .= '&utm_source=' . $utm_source;
}
if ($utm_campaign != '') {
    $lang_uri .= '&utm_campaign=' . $utm_campaign;
}
if ($utm_medium != '') {
    $lang_uri .= '&utm_medium=' . $utm_medium;
}
if ($utm_content != '') {
    $lang_uri .= '&utm_content=' . $utm_content;
}
if ($utm_term != '') {
    $lang_uri .= '&utm_term=' . $utm_term;
}

$selected_lang = '';
switch ($lang) {
    case 'ar':
        $selected_lang = '<li><span class="flag-icon flag-icon-ae"></span>&nbsp AR</li>';
        break;
    case 'cn':
        $selected_lang = '<li><span class="flag-icon flag-icon-cn"></span>&nbsp CN</li>';
        break;
    case 'es':
        $selected_lang = '<li><span class="flag-icon flag-icon-es"></span>&nbsp ES</li>';
        break;
    case 'id':
        $selected_lang = '<li><span class="flag-icon flag-icon-id"></span>&nbsp ID</li>';
        break;
    case 'jp':
        $selected_lang = '<li><span class="flag-icon flag-icon-jp"></span>&nbsp JP</li>';
        break;
    case 'ko':
        $selected_lang = '<li><span class="flag-icon flag-icon-kr"></span>&nbsp KO</li>';
        break;
    case 'ms':
        $selected_lang = '<li><span class="flag-icon flag-icon-my"></span>&nbsp MS</li>';
        break;
    case 'ru':
        $selected_lang = '<li><span class="flag-icon flag-icon-ru"></span>&nbsp RU</li>';
        break;
    case 'th':
        $selected_lang = '<li><span class="flag-icon flag-icon-th"></span>&nbsp TH</li>';
        break;
    case 'vi':
        $selected_lang = '<li><span class="flag-icon flag-icon-vn"></span>&nbsp VI</li>';
        break;
    case 'pt':
        $selected_lang = '<li><span class="flag-icon flag-icon-vn"></span>&nbsp PT</li>';
        break;
    default:
        $selected_lang = '<li><span class="flag-icon flag-icon-gb"></span>&nbsp EN</li>';
        break;
}

?>
<style>
    .mobile-language li.active span{
        padding: 0 1em;
        display: inline-block;
        color: #fff;
         border-bottom: none;
    }
    .mobile-language .lang-submenu li {
        background: #1a5973;
    }
</style>
<div class="mobile-language">
    <ul>
        <li class="active parentLi">
            <a href="#" class="caret"></a>
            <span class="language-switcher">
                  <img src="<?php echo '//'.$_SERVER['HTTP_HOST']; ?>/assets/img/layout/globe.svg" class="lang__icon" alt="Globe" width="28" height="28"/>&nbsp <?= L::language?>
                <img src="<?php echo '//'.$_SERVER['HTTP_HOST']; ?>/assets/img/layout/drop.svg" class="lang__icon-drop" alt="Globe" width="20" height="20"/>
                </span>
            <ul class="lang-submenu" style="display: none;width: 100%">
                <?php //echo $selected_lang ?>
                <li <?php echo ($lang == 'en' ? 'style="display:none;"' : ''); ?>><a href="<?=$uri[0] ?>?lang=en<?=$lang_uri ?>"><span class="flag-icon flag-icon-gb"></span>&nbsp EN</a></li>
                <li <?php echo ($lang == 'ar' ? 'style="display:none;"' : ''); ?>><a href="<?=$uri[0] ?>?lang=ar<?=$lang_uri ?>"><span class="flag-icon flag-icon-ae"></span>&nbsp AR</a></li>
                <li <?php echo ($lang == 'cn' ? 'style="display:none;"' : ''); ?>><a href="<?=$uri[0] ?>?lang=cn<?=$lang_uri ?>"><span class="flag-icon flag-icon-cn"></span>&nbsp CN</a></li>
                <li <?php echo ($lang == 'es' ? 'style="display:none;"' : ''); ?>><a href="<?=$uri[0] ?>?lang=es<?=$lang_uri ?>"><span class="flag-icon flag-icon-es"></span>&nbsp ES</a></li>
                <li <?php echo ($lang == 'id' ? 'style="display:none;"' : ''); ?>><a href="<?=$uri[0] ?>?lang=id<?=$lang_uri ?>"><span class="flag-icon flag-icon-id"></span>&nbsp ID</a></li>
                <li <?php echo ($lang == 'jp' ? 'style="display:none;"' : ''); ?>><a href="<?=$uri[0] ?>?lang=jp<?=$lang_uri ?>"><span class="flag-icon flag-icon-jp"></span>&nbsp JP</a></li>
                <li <?php echo ($lang == 'ko' ? 'style="display:none;"' : ''); ?>><a href="<?=$uri[0] ?>?lang=ko<?=$lang_uri ?>"><span class="flag-icon flag-icon-kr"></span>&nbsp KO</a></li>
                <li <?php echo ($lang == 'ms' ? 'style="display:none;"' : ''); ?>><a href="<?=$uri[0] ?>?lang=mm<?=$lang_uri ?>"><span class="flag-icon flag-icon-my"></span>&nbsp MS</a></li>
                <li <?php echo ($lang == 'ru' ? 'style="display:none;"' : ''); ?>><a href="<?=$uri[0] ?>?lang=ru<?=$lang_uri ?>"><span class="flag-icon flag-icon-ru"></span>&nbsp RU</a></li>
                <li <?php echo ($lang == 'th' ? 'style="display:none;"' : ''); ?>><a href="<?=$uri[0] ?>?lang=th<?=$lang_uri ?>"><span class="flag-icon flag-icon-th"></span>&nbsp TH</a></li>
                <li <?php echo ($lang == 'vi' ? 'style="display:none;"' : ''); ?>><a href="<?=$uri[0] ?>?lang=vi<?=$lang_uri ?>"><span class="flag-icon flag-icon-vn"></span>&nbsp VI</a></li>
                <li <?php echo ($lang == 'pt' ? 'style="display:none;"' : ''); ?>><a href="<?=$uri[0] ?>?lang=pt<?=$lang_uri ?>"><span class="flag-icon flag-icon-pt"></span>&nbsp PT</a></li>
            </ul>
        </li>
    </ul>
</div>