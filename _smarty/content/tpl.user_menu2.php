<?

$level = $CONTENT[0]['str_level'] + 1;

$left = $CONTENT[0]['str_left'];

$right = $CONTENT[0]['str_right'];

?>

<ul id="user_menu" class="left_menu">

    <li class="menu lk_but">

        <div class="box-item account">
            <h4><a href="<?= $CONTENT[0]['str_url'] ?>" class="lk_but_a"><span><?= $MSG['LoginFormModule']['msg36'] ?></span></a></h4>
        </div>





        <ul class="menu-items">

            <? foreach ($CONTENT as $key => $item) { ?>

                <? if ($item['str_level'] == $level and $item['str_left'] > $left and $item['str_right'] < $right) { ?>

                    <li>
                        <a href="<?= $item['str_url'] ?>"><?=tr($item['str_title'], 'AdminLeftMenu')?></a>
                    </li>

                <? } ?>

            <? } ?>

        </ul>

    </li>

</ul>

<script type="text/javascript">

    window.addEvent('domready', function () {

        var myMenu = new MenuMatic({id: 'user_menu', opacity: '100'});

    });

</script>

