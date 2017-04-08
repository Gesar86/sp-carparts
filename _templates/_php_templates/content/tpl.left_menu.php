<? 
$level = $CONTENT[0]['str_level'] + 1;
$left = $CONTENT[0]['str_left'];
$right = $CONTENT[0]['str_right'];
$activeKey = false;
$lic = 0;
global $_SYSTEM;
?>
<ul>
	<? foreach ($CONTENT as $key => $item) { ?>
		<? if ($item['str_level'] == $level and $item['str_left'] > $left and $item['str_right'] < $right) { ?>
			<?
			if ($_SYSTEM->REQUESTED_PAGE == $item['str_url'] and $item['str_url'] !== '/') {
				$activeKey = $lic;
			} else {
				foreach ($CONTENT as $ch_key => $ch_item) {
					if ($ch_item['str_level'] == $item['str_level']+1 and $ch_item['str_left'] > $item['str_left'] and $ch_item['str_right'] < $item['str_right']) {
						if ($_SYSTEM->REQUESTED_PAGE == $ch_item['str_url'] and $ch_item['str_url'] !== '/') {
							$activeKey = $lic;
						}
					}
				}
			}
			?>
			<? $lic++; ?>
			<li class="lev1">
				<a <?=((!empty($item['str_url']) and empty($item['has_childs']))?'href="'.$item['str_url'].'"':'')?> class="alev1"><?=tr($item['str_title'], 'AdminLeftMenu')?></a>
				<ul class="ulev2">
					<? if (!empty($item['has_childs'])) { ?>
						
							<?
							$p_level = $item['str_level'] + 1;
							$p_left = $item['str_left'];
							$p_right = $item['str_right'];
							?>
							<? foreach ($CONTENT as $ch_key => $ch_item) { ?>
								<? if ($ch_item['str_level'] == $p_level and $ch_item['str_left'] > $p_left and $ch_item['str_right'] < $p_right) { ?>
									<li class="<?=($_SYSTEM->REQUESTED_PAGE == $ch_item['str_url'] ? 'act' : '')?> <?=((!empty($CONTENT[$ch_key+1]['str_level'])) && ($CONTENT[$ch_key+1]['str_level']!=$ch_item['str_level'])?' last':'')?>"><a href="<?=$ch_item['str_url']?>"><?=tr($ch_item['str_title'], 'AdminLeftMenu')?></a></li>
								<? } ?>
							<? } ?>
						
					<? } ?>
				</ul>
			</li>
		<? } ?>
	<? } ?>
</ul>
<script type="text/javascript">
	window.addEvent('domready', function() {
		var myAccordion = new Fx.Accordion($$('#left_menu .alev1'), $$('#left_menu .ulev2'), {
			opacity: false,
			display: -1,
			<?=($activeKey === false ? '' : 'show: '.(int)$activeKey.',')?>
			alwaysHide: true,
			onActive: function(toggler, element) {
				var subLi = element.getElements('li');
				if (subLi.getLast() != null) {
					toggler.getParent('li').addClass('active');
				}
			},
			onBackground: function(toggler, element) {
				toggler.getParent('li').removeClass('active');
			}
		});
	});
</script>