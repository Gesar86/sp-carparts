<div class="col-md-4 col-sm-3 col-xs-6">
    <h3>Наши магазины:</h3>
    <? require_once "stocks_list.php"; ?>
    <!-- Yandex.Metrika informer -->
    <br />
    <a class="informer" href="https://metrika.yandex.ru/stat/?id=41274444&amp;from=informer" target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/41274444/3_0_FFFFFFFF_EFEFEFFF_0_pageviews"	style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="41274444" data-lang="ru" /></a>
    <!-- /Yandex.Metrika informer -->
</div>
<div class="col-md-2 col-sm-3 col-xs-6">
    <h3>Покупателям</h3>
    <? NavigationPart("top_menu", "PHP_TEMPLATES_LIB:/content/tpl.left_menu.php", "DR_PHP"); ?>
</div>
<div class="col-md-2 col-sm-3 col-xs-6">
    <h3>Профиль:</h3>
    <ul class="reg">
        <li><a href="/registration.html">Регистрация</a></li>
        <li><a href="#" class="sign-in" onclick="openbox('wrap_popup');return false;">Личный кабинет</a></li>
    </ul></div><div class="col-md-3 col-md-offset-1 col-sm-3 col-xs-6">
    <div class="phone-bottom">
        <?
            ContentPart('footer_right');
        ?>
    </div>
</div>