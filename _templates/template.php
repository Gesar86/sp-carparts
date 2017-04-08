<?$currencies = $client->Interface->getCurrencyRate();
$curUSD = number_format((float)$currencies[2]['crt_rate'], 2, '.', ' ');
$curEURO = number_format((float)$currencies[3]['crt_rate'], 2, '.', ' ');
$nativeCur = $client->Interface->nativeCurInfo;$auth_client = ((int)$client->cst_category_id > 0 ? true : false);
$__BUFFER->AddContent('HEADER', '<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />');
$__BUFFER->AddContent('CUSTOM_HEADER', '<meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">');
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
    <div id="top_line" class="top-line">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-5 col-xs-4">
                    <input type="checkbox" id="menu">
                    <label for="menu" onclick>МЕНЮ САЙТА</label> <!-- иконка для маленьких экранов -->
                    <nav class="main-mnu" role="off-canvas">
                        <? NavigationPart("top_menu", "USER_PHP_TEMPLATES:/content/tpl.left_menu.php", "DR_PHP"); ?>
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
                <div class="col-sm-3">
                    <a href="/" class="logo">
                        <img src="img/logo.png" alt="Магазин автозапчастей sp-carparts">
                    </a>
                </div>
                <div class="col-sm-3">
                    <? ContentPart('top_description'); ?>
                </div>
                <div class="col-sm-3">
                    <? ContentPart('top_address'); ?>
                </div>
                <div class="col-sm-3">
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
                    <? NavigationPart("user_menu", "USER_PHP_TEMPLATES:/content/tpl.user_menu.php", "DR_PHP"); ?>
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
                <div class="col-md-9">
                    <? require_once(__spellPATH($_SYSTEM->LOADPAGE)); ?>
                    <? if (in_array($_SYSTEM->REQUESTED_PAGE, array('/', '/tyres_discs_search/'))) { ?>
                        <div id="act_news" class="flc">
                            <? ContentPart("actions", "USER_PHP_TEMPLATES:/content/tpl.actions-startup.php", "DR_PHP"); ?>
                            <? ContentPart("news", "USER_PHP_TEMPLATES:/content/tpl.news-startup.php", "DR_PHP"); ?>
                        </div>
                    <? } ?>
                </div>
            <? } else { ?>
                <?php if($_SERVER['REQUEST_URI'] == "/"){ ?>
                    <section class="main-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="warning_msg">Уважаемые клиенты! Каталог товаров находится в стадии разработки.
                                        <br>Для поиска деталей используйте строку ввода VIN-запроса.<br>
                                        С уважением, Администрания sp-carparts.com.ua</h3>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 col-sm-3 col-xs-6">
                                    <a href="/original_accessories" class="main-box-item origin-color">
                                        <i class="my my_k"></i>
                                        <p>Оригинальные аксессуары</p>
                                    </a>
                                </div>
                                <div class="col-md-2 col-sm-3 col-xs-6">
                                    <a href="#" class="main-box-item lighten-color">
                                        <i class="my my_i"></i>
                                        <p>Рестайлинг</p>
                                    </a>
                                </div>
                                <div class="col-md-4 col-sm-3 col-xs-6">
                                    <a href="#" class="main-box-item lighten-color">
                                        <i class="my my_e"></i>
                                        <p>Оригинальные масла</p>
                                    </a>
                                </div>
                                <div class="col-md-2 col-sm-3 col-xs-6">
                                    <a href="vin/form.html" class="main-box-item main-color">
                                        <i class="my my_a"></i>
                                        <p>VIN-запрос</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2 col-sm-9 col-xs-6">
                                    <a href="#" class="main-box-item lighten-color">
                                        <i class="my my_c"></i>
                                        <p>Аккумуляторы</p>
                                    </a>
                                </div>
                                <div class="col-md-2 col-sm-3 col-xs-6">
                                    <a href="#" class="main-box-item light-color">
                                        <i class="my my_j"></i>
                                        <p>Шины</p>
                                    </a>
                                </div>
                                <div class="col-md-4 col-sm-3 col-xs-6">
                                    <a href="#" class="main-box-item origin-color">
                                        <i class="my my_g"></i>
                                        <p>Контрактные двигателя</p>
                                    </a>
                                </div>
                                <div class="col-md-4 col-sm-9 col-xs-6">
                                    <a href="http://www.fps-catalog.com.ua/" target="_blank" class="main-box-item light-color">
                                        <i class="my my_h"></i>
                                        <p>Кузовные детали</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 col-sm-3 col-xs-6">
                                    <a href="#" class="main-box-item lighten-color">
                                        <i class="my my_f"></i>
                                        <p>Аксессуары</p>
                                    </a>
                                </div>
                                <div class="col-md-2 col-sm-3 col-xs-6">
                                    <a href="#" class="main-box-item lighten-color">
                                        <i class="my my_d"></i>
                                        <p>Шины</p>
                                    </a>
                                </div>
                                <div class="col-md-2 col-sm-3 col-xs-6">
                                    <a href="#" class="main-box-item origin-color">
                                        <i class="my my_b"></i>
                                        <p>Форсунки</p>
                                    </a>
                                </div>
                                <div class="col-md-4 col-sm-3 col-xs-6">
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
                                <? ContentPart("actions", "USER_PHP_TEMPLATES:/content/tpl.actions-startup.php", "DR_PHP"); ?>
                                <? ContentPart("news", "USER_PHP_TEMPLATES:/content/tpl.news-startup.php", "DR_PHP"); ?>
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
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="copyright_box">
                    <? ContentPart('copyright'); ?>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="copyright_box">
                    <div class="copyright_ts"><?php echo $CONST["copy"]; ?></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Google Analytics -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-88244860-1', 'auto');
    ga('send', 'pageview');
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter41274444 = new Ya.Metrika({
                    id:41274444,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });
        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";
        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript>
    <div>
        <img src="https://mc.yandex.ru/watch/41274444" style="position:absolute; left:-9999px;" alt="" />
    </div>
</noscript>	<!-- /Yandex.Metrika counter -->
</body>
