<?
$level = $CONTENT[0]['str_level'] + 1;
$left = $CONTENT[0]['str_left'];
$right = $CONTENT[0]['str_right'];
?>
<ul id="user_menu" class="slide_menu">
	<li class="menu lk_but">
		<a href="<?= $CONTENT[0]['str_url'] ?>" class="lk_but_a"><span><?= $MSG['LoginFormModule']['msg36'] ?></span></a>

		<ul class="links">
			<? foreach ($CONTENT as $key => $item) { ?>
				<? if ($item['str_level'] == $level and $item['str_left'] > $left and $item['str_right'] < $right) { ?>
					<li>
						<a href="<?= $item['str_url'] ?>"<?= (!empty($item['str_metadata']['img']) ? ' style="background-image:url(' . $item['str_metadata']['img'] . ');"' : '') ?>><?=tr($item['str_title'], 'AdminLeftMenu')?></a>
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
