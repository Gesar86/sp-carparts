<?
global $CONST;
if (!$CONST['war55']) {
	$__BUFFER->addScript('/_syslib/squeezebox/squeezebox.js');
	$__BUFFER->addCSS('/_syslib/squeezebox/squeezebox.css');
}
?>

<?
$web_ar_datagrid = $basket['fields']['basket']['html'];
$web_ar_datagrid_source = $basket['sourceFields']['basket']['instance']->datasource;
$data_align = array('left', 'left', 'left', 'left', 'center', 'left', 'right', 'left', 'left', 'left');
?>

<h1><?= $MSG['BasketModule']['msg33']; ?></h1>

<?= $basket['validationScript'] ?>
<form id="<?= $basket['id'] ?>" name="<?= $basket['name'] ?>" action="<?= $basket['action'] ?>"
	  method="<?= $basket['method'] ?>" onsubmit="<?= $basket['onsubmit'] ?>">

<script language="JavaScript">

function customCheckBasket(arg) {

	var inputFields = new Array();

	if (arg.elements.length > 0) {				

		for (i=0; i < arg.elements.length; i++) {

			level2 : {

				nameStr = new String();
				nameStr = arg.elements[i].name;

				if (arg.elements[i].type == "text" && nameStr.indexOf('name')>=0) {

					clearReg = /[\s\t-]/;

					checkStr = new String();
					checkStr = arg.elements[i].value;
					checkStr.replace(clearReg);

					if (checkStr == "") {
					
						alert('<?=$_interface->MSG['BasketModule']['msg50']?>');
						arg.elements[i].focus();
						
						return false;

					}

				}			

			}	

		}

	}

	return true;

}
</script>
	<?  ?><div id="basket_controls_links" class="flc">
	<div class="leftside bcl1">
		<?=$addButtonLink?>
	</div>
	<div class="leftside bcl2">
		<script type="text/javascript">
	        function import2basket(e,skript_dest){
	        	var 
	            a=screen.availWidth,
	            b=screen.availHeight,
	            c=parseInt(a*0.8), 
	            d=parseInt(b*0.6);
	             
	            a=parseInt((a-c)/2);
	            b=parseInt((b-d)/2);
				
	            window.open((skript_dest||"/shop/import_to_basket.html")+"?script="+(e||""),"import2basket","width="+c+",height="+d+",toolbar=0,location=0,directories=0,menubar=0,scrollbars=yes,status=0,resizable=yes,top="+b+",screenY="+b+",left="+a+",screenX="+a).focus()
			};
	    </script>
		<?=$importButtonLink?>
	</div>
	<div class="rightside bcl3">
		<?if(!$BASKET_EMPTY):?>
			<?=$cancelButtonLink?>
		<?endif?>
	</div>
</div><?  ?>
	<? if (!$BASKET_EMPTY): ?>

		<div id="basket_table">
			<?  ?><?
$i = 0;
if (!empty($web_ar_datagrid['controls'])) {
	foreach ($web_ar_datagrid['controls'] as $hdr_id => $control) {
		if ((empty($control_align[$i])) or ($control_align[$i] == 'top')) {

			?><div class="table_control"><?= $control ?></div><?

		}
		$i++;
	}
}
?>

<? if (count($web_ar_datagrid['data']) > 0) { ?>

	<? $hide_cols = array('weight_display', 'amount', 'info'); ?>
	<? $hide_captions = array('comment'); ?>

	<script type="text/javascript">
		function setTextFocus(el) {
			var ta = el.getElementsByTagName('textarea');
			try {
				ta[0].style.display = 'block';
				<? if ($basket_page=='make_order') { ?>
				ta[0].readOnly = true;
				<? } ?>
				ta[0].focus();
			} catch (e) {
			}
		}
		function hideTextFocus(el) {
			var ta = el.getElementsByTagName('textarea');
			try {
				if (ta[0].style.display == 'block') {
					ta[0].style.display = 'none';
				}
			} catch (e) {
			}
		}
	</script>
	<? $cntBeforePrice = $cntAll = 0; ?>
	<table id="web_ar_datagrid-<?= $web_ar_datagrid['info']['name'] ?>" border="0" cellpadding="3" cellspacing="1" class="web_ar_datagrid <?= $web_ar_datagrid['info']['name'] ?>" width="100%">
		<tr>
			<? foreach ($web_ar_datagrid['header'] as $hdr_id => $column) { ?>

				<? if (($column['visible'] != '1') or (in_array($hdr_id, $hide_cols))) continue; ?>
				<?
				if ($cntAll === $cntBeforePrice and $hdr_id !== 'price') {
					$cntBeforePrice++;
				}
				$cntAll++;
				?>
				<th class="col_<?= $hdr_id ?>"><?= (!in_array($hdr_id, $hide_captions) ? $column['caption'] : '') ?></th>

			<? } ?>
		</tr>

		<? foreach ($web_ar_datagrid['data'] as $row => $item) { ?>

			<tr class="<?= toggleEvenOdd() ?>">

				<? $i = 0; ?>

				<? foreach ($web_ar_datagrid['header'] as $hdr_id => $column) { ?>

					<? if (($column['visible'] != '1') or (in_array($hdr_id, $hide_cols))) continue; ?>

					<td class="col_<?= $hdr_id ?>"<?= (!empty($data_align[$i]) ? ' align="' . $data_align[$i] . '"' : '') ?>>

						<? if ($hdr_id == 'cost_per_weight_display') { ?>

							+ <?= $item[$hdr_id] ?> <?= (!empty($item['weight_display']) ? ' / ' . $item['weight_display'] . ' ' . $MSG['BasketModule']['msg19'] : '') ?>

						<? } elseif ($hdr_id == 'price') { ?>

							<nobr>
								<?=($item['manualAdd'] ? $item[$hdr_id] : ($item['price_display'] ? $item['price_display'] : $item[$hdr_id]))?> x <?= $item['amount'] ?>

								<? if (($item['min_quantity'] > 1) ) { ?>
									<?=str_replace('{%min_quantity%}', $item['min_quantity'], $MSG['BasketModule']['msg58'])?>
								<? } ?>
							</nobr>

						<? } elseif ($hdr_id == 'summ') { ?>

							<strong><?= $item[$hdr_id] ?></strong>
							
							<? if (($item['cost_per_weight_value'] > 0) && (empty($item['weight']))) { ?>

								<img src="/_sysimg/ar_check_price.png" alt="<?= $MSG['BasketModule']['msg41'] ?>" title="<?= $MSG['BasketModule']['msg41'] ?>" style="vertical-align:middle;"/>

							<? } ?>

						<? } elseif ($hdr_id == 'comment') { ?>

							<span class="basket_comment" onmouseover="setTextFocus(this); return false;" onmouseout="hideTextFocus(this); return false;"><img src="/_sysimg/ar_comment.png" alt="" title=""/>
							<?= $item[$hdr_id] ?>
						</span>

						<? } else { ?>

							<?
							if ($item['manualAdd'] != 1 and in_array($hdr_id, Array('brand', 'article', 'price'))) {
								echo $web_ar_datagrid_source[$row][$hdr_id];
							} else {
								echo $item[$hdr_id];
							}

							?>

						<? } ?>

					</td>

					<? $i++; ?>

				<? } ?>

			</tr>

		<? } ?>

		<? if ($basket_page == 'make_order') { ?>
			<tbody id="delivery_row" style="display:none;">
			<tr class="<?= toggleEvenOdd() ?>">
				<? $i = 0; ?>
				<? foreach ($web_ar_datagrid['header'] as $hdr_id => $column) { ?>

					<? if (($column['visible'] != '1') or (in_array($hdr_id, $hide_cols))) continue; ?>

					<td class="col_<?= $hdr_id ?>"<?= (!empty($data_align[$i]) ? ' align="' . $data_align[$i] . '"' : '') ?>>
						<? if ($hdr_id == 'name') { ?>
							<?= $MSG['MakeOrderModule']['msg64'] ?>
						<? } elseif ($hdr_id == 'summ') { ?>
							<span id="deliveryDiv"></span>
						<? } ?>
					</td>

					<? $i++; ?>

				<? } ?>
			</tr>
			</tbody>
		<? } ?>
		<tr class="even basket_summ_info">
			<td class="bsi_it" colspan="<?=$cntBeforePrice?>"><?= $MSG['BasketModule']['msg54'] ?></td>
			<td class="bsi_amount"><?= $AMOUNT_SUMM ?> <?= $MSG['BasketModule']['msg55'] ?></td>
			<td class="bsi_summ" colspan="<?=($cntAll - $cntBeforePrice - 1)?>">
				<span id="orderSumm"><?= $SUMM ?></span>
			</td>
		</tr>
	</table>

<? } else { ?>

	<p><?= $empty_message ?></p>

<? } ?>

<?
$i = 0;
if (!empty($web_ar_datagrid['controls'])) {
	foreach ($web_ar_datagrid['controls'] as $hdr_id => $control) {
		if ($control_align[$i] == 'bottom') {

			?><div class="table_control"><?= $control ?></div><?

		 }
		$i++;
	}
}
?><?  ?>
		</div>

		<?  ?><?  ?><div class="basket_controls_bottom flc">
	<div class="leftside">
		
		<?if($MIN_ORDER_SUMM):?>
			
			<div class="warning">
				<div class="warning_caption"><?=$MSG['Forms']['msg5']?></div>
				<div class="warning_text"><?=$MSG['BasketModule']['msg39']?>: <span class="warning_value"><?=$MIN_ORDER_SUMM?></span>
				<br/><?=$MSG['BasketModule']['msg40']?>
				</div>
			</div>
		
		<?endif?>
		
		<?if($RESTRICT_FUND_REMAINS):?>
			
			<div class="warning">
				<div class="warning_caption"><?=$MSG['Forms']['msg5']?></div>
				<div class="warning_text"><?=$MSG['BasketModule']['msg46']?> <span class="warning_value"><?=$FUND_REMAINS?></span></div>
			</div>
			
		<?elseif($FUND_REMAINS):?>
			
			<div class="warning">
				<div class="warning_caption"><?=$MSG['Forms']['msg5']?></div>
				<div class="warning_text"><?=$MSG['BasketModule']['msg45']?> <span class="warning_value"><?=$FUND_REMAINS?></span></div>
			</div>
		
		<?elseif($RESTRICT_DEBT_SUMM):?>
			
			<div class="warning">
				<div class="warning_caption"><?=$MSG['Forms']['msg5']?></div>
				<div class="warning_text"><?=$MSG['BasketModule']['msg43']?> <span class="warning_value"><?=$MAX_DEBT_SUMM?></span></div>
			</div>

		<?elseif($MAX_DEBT_SUMM):?>
			
			<div class="warning">
				<div class="warning_caption"><?=$MSG['Forms']['msg5']?></div>
				<div class="warning_text"><?=$MSG['BasketModule']['msg42']?> <span class="warning_value"><?=$MAX_DEBT_SUMM?></span></div>
			</div>
			
		<?endif?>
	</div>
	<div class="rightside">
		<? if(!$MIN_ORDER_SUMM and !$RESTRICT_DEBT_SUMM): ?>
			<div class="orderButton"><?=$basket['fields']['save_order']['html']?></div>	
		<?endif?>
	</div>
	<div class="rightside">
		<?=$basket['fields']['save_amount']['html']?>
	</div>
</div><?  ?>

<div class="backet_icons_comment">
	<ul>
		<? if($USE_MIN_QUANTITY) { ?>
			<li><?= $MSG['BasketModule']['msg56'] ?></li>
		<? } ?>
		<li><?= $MSG['BasketModule']['msg51'] ?></li>
		<li><?= $MSG['BasketModule']['msg52'] ?></li>
		<li><?= $MSG['BasketModule']['msg53'] ?></li>
		<li><?= $MSG['BasketModule']['msg47'] ?> <?= $MaxBasketLife ?> <?= $MSG['BasketModule']['msg48'] ?> <?= $MSG['BasketModule']['msg49'] ?> <?= $BasketLife ?> <?= $MSG['BasketModule']['msg48'] ?></li>
	</ul>
</div><?  ?>

	<? else: ?>

		<?= $BASKET_EMPTY ?>

	<?endif ?>

</form>