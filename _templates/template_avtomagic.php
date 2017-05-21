<?

$currencies = $client->Interface->getCurrencyRate();
$curUSD = number_format((float)$currencies[2]['crt_rate'], 2, '.', ' ');
$curEURO = number_format((float)$currencies[3]['crt_rate'], 2, '.', ' ');
$nativeCur = $client->Interface->nativeCurInfo;
$auth_client = ((int)$client->cst_category_id > 0 ? true : false);

$__BUFFER->AddContent('HEADER', '<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />');
$__BUFFER->AddContent('CUSTOM_HEADER', '<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="_css/header.min.css">');

?>

<script>
    function openbox(id,tt) {
        var div = document.getElementById(id);
        var tt_div = document.getElementById(tt);
        if(div.style.display == 'block') {
            div.style.display = 'none';
        }
        else {
            div.style.display = 'block';
        }
    }

</script>

<body>

<? require_once "_inner_templates/cars.php"; ?>
<!-- HEADER START -->

<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="logo-wrapper">
                    <a href="#" class="logo"><img src="img/avtomagic/logo-avtomagic.png" alt="avtomagic.com.ua"></a>
                </div>

            </div>
            <div class="col-sm-9">
                <div class="top-menu-wrapper">
                    <ul class="top-menu">

                        <? if ($auth_client) { ?>

                        <li><a href="#">Аккаунт</a></li>
                        <li><a href="#">Избранное</a></li>
                        <li><a href="#">Корзина</a></li>
                        <li><a href="#">Товары</a></li>

                        <?php } else { ?>

                        <li><a href="/registration.html">Регистрация</a></li>
                        <li><a href="#"  class="sign-in" onclick="openbox('wrap_popup');return false;">Войти</a></li>

                        <?php } ?>

                    </ul>
                </div>
                <div class="top-lang-curr-wrapper">
                    <div class="top-currency">
                        <label for="currency">Валюта:</label> <select name="abcselect" id="currency">
                            <option value="eur"><?= $curUSD ?><?= (($nativeCur['html_sign']) ? $nativeCur['html_sign'] : "руб.") ?></option>
                            <option value="usd"><?= $curEURO ?><?= (($nativeCur['html_sign']) ? $nativeCur['html_sign'] : "руб.") ?></option>
                        </select>
                    </div>
                    <div class="top-language">
                        <label for="language">Язык:</label> <select name="abcselect" id="language">
                            <option value="eur">ENG</option>
                            <option value="usd">РУС</option>
                        </select>
                    </div>
                </div>
                <div class="top-contact-search">
                    <div class="top-contacts">
                        <p class="phone"><span class="phone-desc">Узнать у менеджера</span> (000) 123 4567</p>
                        <span class="schedule">Пн-Пт с 8:00 до 18:00</span>
                    </div>
                    <div class="top-search">
                        <input type="text" value="Поиск по сайту">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="cat-title">Категории<i class="fa fa-bars" aria-hidden="true"></i></div>
            </div>
            <div class="col-sm-9 no-padding-left">
                <div class="main-menu"><? NavigationPart("user_menu", "PHP_TEMPLATES_LIB:/content/tpl.user_men2.php", "DR_PHP"); ?></div>
            </div>
        </div>
    </div>
</nav>

<header>
    <div id="top_line" class="top-line">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-5 col-xs-4">
                    <input type="checkbox" id="menu">
                    <label for="menu" onclick>МЕНЮ</label>
                    <nav class="main-mnu" role="off-canvas">
                        <? NavigationPart("top_menu", "PHP_TEMPLATES_LIB:/content/tpl.left_menu.php", "DR_PHP"); ?>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-7 col-xs-8">
                    <ul class="reg">

                        <? if ($auth_client) { ?>

                            <li><a href="/shop/basket.html"><span>Корзина</span></a></li>
                            <li><a href="#" class="sign-in" onclick="openbox('wrap_popup');return false;">Личный кабинет</a></li>

                        <?php } else { ?>

                            <li><a href="/registration.html">Регистрация</a></li>
                            <li><a href="#"  class="sign-in" onclick="openbox('wrap_popup');return false;">Личный кабинет</a></li>

                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

        <!--<div id="top_currencies" class="leftside">

				Курсы: 1$ =

				<strong><?/*= $curUSD */?></strong> <?/*= (($nativeCur['html_sign']) ? $nativeCur['html_sign'] : "руб.") */?>

				<span>|</span>1€ =

				<strong><?/*= $curEURO */?></strong> <?/*= (($nativeCur['html_sign']) ? $nativeCur['html_sign'] : "руб.") */?>

			</div>-->

    </div>

    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="/" class="logo">
                        <img src="img/logo.png" alt="Магазин автозапчастей sp-carparts">
                    </a>
                </div>
                <div class="col-md-3">
                    <? ContentPart('top_description'); ?>
                </div>
                <div class="col-md-3">
                    <? ContentPart('top_address'); ?>
                </div>
                <div class="col-md-3">
                    <? ContentPart('top_phones'); ?>
                </div>
            </div>
        </div>
    </div>

    <div id="header_top" class="flc">

    </div>
    <!-- LOGIN POPUP -->
    <div style="position: relative; width: 100%; height: 100%; ">
        <div id="wrap_popup" class="login_popup" style="display: none">
            <div id="login_block" class="login_content">
                <i class="fa fa-times close" onclick="openbox('wrap_popup')"></i>

                <?php

                echo AutoResource_CallModule(

                    "LoginFormModule",
                    "module.login-form.php",
                    "DR_PHP"

                );

                ?>

            </div>
        </div>
    </div>

</header>
<!-- HEADER END -->
<!-- SEARCH START -->
<section class="search" id="search_form">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <? require_once "_inner_templates/search.php"; ?>

            </div>
        </div>
    </div>
</section>
<!-- SEARCH END -->
<!-- CONTENT START -->
<section class="content-wrapper">
    <div class="container">
        <div class="row">

            <? if ($auth_client) { ?>

                <div class="col-md-3">



                    <? if ($auth_client) { ?>

                        <div id="user_top_links" class="rightside" style="display:<?= (!empty($client->sourceId) ? 'block' : 'none') ?>">
                            <div class="flc">
                                <a href="/shop/basket.html" style="background-image:url(/images/ti_basket.png)"><span>Корзина</span></a>
                            </div>
                        </div>

                    <? } else { ?>

                        <div id="user_top_links" class="rightside" style="display:<?= (!empty($client->sourceId) ? 'block' : 'none') ?>">
                            <div class="flc">
                                <a href="/shop/basket.html" style="background-image:url(/images/ti_basket.png)"><span>Корзина</span></a>
                            </div>
                        </div>

                    <? } ?>

                </div>
                <div class="col-md-9 overflow-content">

                    <? require_once(__spellPATH($_SYSTEM->LOADPAGE)); ?>

                    <? if (in_array($_SYSTEM->REQUESTED_PAGE, array('/', '/tyres_discs_search/'))) { ?>

                        <div id="act_news" class="flc">

                            <? ContentPart("actions", "PHP_TEMPLATES_LIB:/content/tpl.actions-startup.php", "DR_PHP"); ?>
                            <? ContentPart("news", "PHP_TEMPLATES_LIB:/content/tpl.news-startup.php", "DR_PHP"); ?>

                        </div>

                    <? } ?>

                </div>

            <? } else { ?>

                <?php if($_SERVER['REQUEST_URI'] == "/"){ ?>

                    <section class="main-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="/original_accessories" class="main-box-item origin-color">
                                        <i class="my my_k"></i>
                                        <p>Оригинальные аксессуары</p>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="#" class="main-box-item lighten-color">
                                        <i class="my my_i"></i>
                                        <p>Рестайлинг</p>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="http://sp-carparts.com.ua/catalog.html" class="main-box-item lighten-color">
                                        <img src="../images/catalog/katalog-link.png" style="margin-top:10px" alt="Каталоги подбора запчастей">
                                        <p>Каталоги подбора запчастей</p>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="vin/form.html" class="main-box-item main-color">
                                        <i class="my my_a"></i>
                                        <p>VIN-запрос</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="#" class="main-box-item lighten-color">
                                        <i class="my my_c"></i>
                                        <p>Аккумуляторы</p>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="#" class="main-box-item light-color">
                                        <i class="my my_j"></i>
                                        <p>Шины</p>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="#" class="main-box-item origin-color">
                                        <i class="my my_g"></i>
                                        <p>Контрактные двигателя</p>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="#" class="main-box-item light-color">
                                        <i class="my my_h"></i>
                                        <p>Кузовные детали</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="#" class="main-box-item lighten-color">
                                        <i class="my my_f"></i>
                                        <p>Аксессуары</p>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="#" class="main-box-item lighten-color">
                                        <i class="my my_d"></i>
                                        <p>Шины</p>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="#" class="main-box-item origin-color">
                                        <i class="my my_b"></i>
                                        <p>Форсунки</p>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="#" class="main-box-item lighten-color">
                                        <i class="my my_l"></i>
                                        <p>Щетки стеклоочистители</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>

                <?php } else { ?>

                    <div class="col-md-8 col-md-offset-2">

                        <? require_once(__spellPATH($_SYSTEM->LOADPAGE)); ?>

                        <? if (in_array($_SYSTEM->REQUESTED_PAGE, array('/', '/tyres_discs_search/'))) { ?>

                            <div id="act_news" class="flc">

                                <? ContentPart("actions", "PHP_TEMPLATES_LIB:/content/tpl.actions-startup.php", "DR_PHP"); ?>
                                <? ContentPart("news", "PHP_TEMPLATES_LIB:/content/tpl.news-startup.php", "DR_PHP"); ?>

                            </div>

                        <? } ?>

                    </div>

                <?php } ?>
            <?php } ?>

        </div>
    </div>
</section>
<!-- CONTENT END -->
<!-- HIGHLIGHT START -->
<?php if($_SERVER['REQUEST_URI'] == "/"){ ?>
    <div class="shadow">
        <div class="container">
            <div class="shadow-top">
                <img src="../img/shadow-top.png" />
            </div>
        </div>
    </div>
    <section class="highlight">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <? ContentPart('highlight'); ?>

                </div>
            </div>
        </div>
    </section>
<?php } ?>
<!-- HIGHLIGHT END -->
<!-- FOOTER START -->
<footer>
    <div class="container">
        <div class="row">

            <? require_once "_inner_templates/footer.php"; ?>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="copyright_box">
                    <? ContentPart('copyright'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="copyright_box">
                    <div class="copyright_ts"><?php echo $CONST["copy"]; ?></div>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>