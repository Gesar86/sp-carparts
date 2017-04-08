<? if ($_ajax_datagrid) {
	$web_ar_datagrid = & $order['fields']['basket']['html'];
	$web_ar_datagrid_source = & $order['sourceFields']['basket']['instance']->datasource;
	$data_align = array('left', 'left', 'left', 'center', 'left', 'right', 'left', 'left', 'left');
	$basket_page = 'make_order';
	 ?><?
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
?><? 

	return;
} ?>

<?= $MSG['MakeOrderModule']['msg68'] ?>

<? if ($order['messages']['registration_error_fields']) { ?>

	<?  ?><div class="error">
<?=$MSG['RegistrationModule']['msg63']?>
<?=$MSG['RegistrationModule']['msg66']?>
<?=($order['messages']['registration_error_passwords_mismatch']?$MSG['RegistrationModule']['msg82']:'')?>
<?=($order['messages']['registration_error_incorrect_email']?$MSG['RegistrationModule']['msg83']:'')?>
<?=($order['messages']['registration_error_companyname_needed']?$MSG['RegistrationModule']['msg85']:'')?>
<?=($order['messages']['registration_error_incorect_contact_phone']?'<p><span id="form_required_field">' . tr('Данный контактный телефон уже используется на сайте.', 'RegistrationModule') . '</span></p>':'')?>
<?=($order['messages']['human_check_error']?$MSG['RegistrationModule']['msg65']:'')?>
<?=($order['messages']['registration_error']?$MSG['RegistrationModule']['msg64']:'')?>
<?=($order['messages']['registration_error_email']?$MSG['RegistrationModule']['msg69']:'')?>
<?=($order['messages']['registration_error_userlogin']?$MSG['RegistrationModule']['msg79']:'')?>
</div><?  ?>

	<?  ?><div class="ar_form">
	<?=$order['validationScript']?>
	<form id="<?=$order['id']?>" name="<?=$order['name']?>" action="<?=$order['action']?>" method="<?=$order['method']?>" onsubmit="<?=$order['onsubmit']?>">
		<table class="web_ar_datagrid make_order">

			<? if($order['fields']['ord_contact_person']) { ?>

				<? if ($MESSAGE_CLIENT_DEALER === true) { ?>

					<div class="notice"><?=tr('Внимание! Вами формируется заказ на клиента торговой точки - дилера, но цена закупа позиций рассчитана как для торговых точек - филиалов. При необходимости, скорректируйте цены закупа вручную.', 'MakeOrderModule')?></div>

				<? } ?>

				<?  ?><tr>
	<td colspan="2"><h2 style="margin-top:10px;"><?= $MSG['MakeOrderModule']['msg69'] ?></h2></td>
</tr>

<? if ($order['fields']['ord_contact_person']) { ?>
<tr>
	<td class="fname">
		<nobr><?= $order['fields']['ord_contact_person']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $order['fields']['ord_contact_person']['html'] ?></td>
</tr>
<? } ?>

<? if ($order['fields']['ord_phones']) { ?>
<tr>
	<td class="fname">
		<nobr><?= $order['fields']['ord_phones']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $order['fields']['ord_phones']['html'] ?></td>
</tr>
<? } ?>

<? if ($order['fields']['ord_email']) { ?>
<tr>
	<td class="fname">
		<nobr><?= $order['fields']['ord_email']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $order['fields']['ord_email']['html'] ?></td>
</tr>
<? } ?>

<? if ($order['fields']['ord_need_validation']) { ?>

	<tr>
		<td colspan="2"><h2><?= $MSG['MakeOrderModule']['msg80'] ?></h2></td>
	</tr>

	<tr>
		<td class="fname" colspan="2">
			<div class="car_check_notify"><?= $MSG['MakeOrderModule']['msg81'] ?></div>
		</td>
	</tr>

	<tr>
		<td class="fname" style="line-height:35px;">
			<li><?= $MSG['MakeOrderModule']['msg82'] ?></li>
		</td>
		<td class="fvalue" style="line-height:35px;">
			<span class="form_required_field">* </span><?= $order['fields']['ord_need_validation']['html'] ?>
		</td>
	</tr>
	<? $csc_id_field = 'ord_csc_id'; ?>
	<? $car_in_table = true; ?>
	<? $car_hide_start = true; ?>
	<? $car_select_caption = '<li>' . $order['fields']['ord_csc_id']['caption'] . '</li>'; ?>
	<? $vin_requests = & $order; ?>

	<tbody id="ord_car_select">
	<?  ?><? if (empty($csc_id_field)) $csc_id_field = 'vin_csc_id'; ?><? if (empty($init_text)) $init_text = $MSG['Cars']['msg49']; ?><? if ($hide_empty_cars !== true) $hide_empty_cars = false; ?><? if ((count($customer_cars) > 0) or ($car_in_table && !$hide_empty_cars)) { ?>	<? if ($car_in_table) { ?>		<tr>		<td class="fname"><?= $car_select_caption ?></td>		<td class="fvalue">	<? } ?>	<input type="hidden" name="<?= $csc_id_field ?>" value="" id="<?= $csc_id_field ?>"/>	<div id="vin_csc_div" class="flc">		<ul id="vin_csc" class="slide_menu">			<li class="menu vin_car"><a href="#" onclick="return false;" id="car_active"><span><?= $init_text ?></span></a>				<ul class="car_links">					<li>						<div class="car_caption" onclick="setVinCar(<?= ($car_hide_start ? 0 : '') ?>); return false;" id="car_caption"><?= ($car_hide_start ? '<span>' . $MSG['Cars']['msg50'] . '</span>' : $MSG['Cars']['msg51']) ?></div>					</li>					<? if (count($customer_cars) > 0) { ?>						<? foreach ($customer_cars as $car) { ?>							<li>								<a href="#" onclick="setVinCar('<?= $car['csc_id'] ?>'); return false;" id="acar<?= $car['csc_id'] ?>"><span><?= $car['customer_car'] ?></span></a>								<div class="car_info">									<? if ($car['csc_date']) { ?>										<?= preg_replace('#^.*/#Uis', '', $car['csc_date']) ?> <?= $MSG['Cars']['msg52'] ?>,									<? } ?>									<? if ($car['csc_engine_power']) { ?>										<?= $car['csc_engine_power'] ?> <?= $MSG['Cars']['msg53'] ?>,									<? } ?>									<? if ($car['csc_engine_volume']) { ?>										<?= $car['csc_engine_volume'] ?> <?= $MSG['Cars']['msg54'] ?>,									<? } ?>									<? if ($car['csc_vin_code']) { ?>										<?= $car['csc_vin_code'] ?>									<? } ?>								</div>							</li>						<? } ?>					<? } ?>				</ul>			</li>		</ul>	</div>	<script type="text/javascript">		var myMenu_vin_csc;		window.addEvent('domready', function () {			myMenu_vin_csc = new MenuMatic({id: 'vin_csc', opacity: '100'});		});	</script>	<script type="text/javascript">		function setVinCar(id) {			$('<?=$csc_id_field?>').value = id;			$('csc_id').value = id;			if (id) {				$('car_active').innerHTML = $('acar' + id).innerHTML;				$('car_caption').innerHTML = '<span><?=$MSG['Cars']['msg50']?></span>';				if ($('form_add')) $('form_add').style.display = 'none';				<? if ((!$car_in_table) or ($show_car_info)) { ?>				$('car_info').load('/_ajax/car_info.html?cst_id=<?=$client[0]->sourceId?>&csc_id=' + id);				<? } ?>			} else {				$('car_active').innerHTML = '<span><?=$init_text?></span>';				$('car_caption').innerHTML = '<?=$MSG['Cars']['msg51']?>';				if ($('form_add')) $('form_add').style.display = 'block';				<? if ((!$car_in_table) or ($show_car_info)) { ?>				$('car_info').innerHTML = '';				<? } ?>			}			myMenu_vin_csc.hideAllSubMenusNow();		}	</script>	<? if ($car_in_table) { ?>		</td>		</tr>		<tr>			<td colspan="2">				<div id="car_info"></div>			</td>		</tr>	<? } else { ?>		<div id="car_info"></div>	<? } ?><? } ?><? if ($car_in_table) { ?>	<tr><td colspan="2"><? } ?>	<div id="form_add" class="ar_form">		<table class="vin_form">			<? if ($vin_requests['fields']['vin']) { ?>				<tr>					<td class="fname"><?= $vin_requests['fields']['vin']['caption'] ?></td>					<td class="fvalue" colspan="3"><?= $vin_requests['fields']['vin']['html'] ?></td>				</tr>			<? } ?>			<? if ($vin_requests['fields']['year'] or $vin_requests['fields']['month']) { ?>				<tr>					<? if ($vin_requests['fields']['year']) { ?>						<td class="fname"><?= $vin_requests['fields']['year']['caption'] ?></td>						<td class="fvalue"><?= $vin_requests['fields']['year']['html'] ?></td>					<? } ?>					<td class="fname"><?= $vin_requests['fields']['month']['caption'] ?></td>					<td class="fvalue"><?= $vin_requests['fields']['month']['html'] ?></td>				</tr>			<? } ?>			<? if ($vin_requests['fields']['brand'] or $vin_requests['fields']['model']) { ?>				<tr>					<? if ($vin_requests['fields']['brand']) { ?>						<td class="fname"><?= $vin_requests['fields']['brand']['caption'] ?></td>						<td class="fvalue"><?= $vin_requests['fields']['brand']['html'] ?></td>					<? } ?>					<td class="fname"><?= $vin_requests['fields']['model']['caption'] ?></td>					<td class="fvalue"><?= $vin_requests['fields']['model']['html'] ?></td>				</tr>			<? } ?>			<? if ($vin_requests['fields']['power'] or $vin_requests['fields']['volume']) { ?>				<tr>					<? if ($vin_requests['fields']['power']) { ?>						<td class="fname"><?= $vin_requests['fields']['power']['caption'] ?></td>						<td class="fvalue"><?= $vin_requests['fields']['power']['html'] ?></td>					<? } ?>					<td class="fname"><?= $vin_requests['fields']['volume']['caption'] ?></td>					<td class="fvalue"><?= $vin_requests['fields']['volume']['html'] ?></td>				</tr>			<? } ?>			<? if ($vin_requests['fields']['info']) { ?>				<tr>					<td class="fname"><?= $vin_requests['fields']['info']['caption'] ?></td>					<td class="fvalue" colspan="3"><?= $vin_requests['fields']['info']['html'] ?></td>				</tr>			<? } ?>		</table>		<?		$arAddFields = ['cylinders', 'valves', 'bdy_type_id', 'doors', 'engine', 'drive', 'transmission', 'transm_number', 'steering', 'abs', 'esp', 'booster', 'conditioner', 'catalyst'];		$showDetails = false;		foreach ($arAddFields as $field) {			if ($vin_requests['fields'][$field]['caption']) {				$showDetails = true;				break;			}		}		?>		<? if ($showDetails) { ?>			<div id="vin_ad">				<a href="#" onclick="return false;" id="a_vin_ad_fields"><span><?= $MSG['Cars']['msg55'] ?></span></a>			</div>			<div id="vin_ad_fields" style='height:0px;overflow:hidden;'>				<div id="vin_ad_fields_inner">					<table class="vin_form">						<tr>							<? if ($vin_requests['fields']['cylinders']) { ?>								<td class="fname"><?= $vin_requests['fields']['cylinders']['caption'] ?></td>								<td class="fvalue"><?= $vin_requests['fields']['cylinders']['html'] ?></td>							<? } ?>							<td class="fname"><?= $vin_requests['fields']['valves']['caption'] ?></td>							<td class="fvalue"><?= $vin_requests['fields']['valves']['html'] ?></td>						</tr>						<tr>							<? if ($vin_requests['fields']['bdy_type_id']) { ?>								<td class="fname"><?= $vin_requests['fields']['bdy_type_id']['caption'] ?></td>								<td class="fvalue"><?= $vin_requests['fields']['bdy_type_id']['html'] ?></td>							<? } ?>							<td class="fname"><?= $vin_requests['fields']['doors']['caption'] ?></td>							<td class="fvalue"><?= $vin_requests['fields']['doors']['html'] ?></td>						</tr>						<tr>							<? if ($vin_requests['fields']['engine']) { ?>								<td class="fname"><?= $vin_requests['fields']['engine']['caption'] ?></td>								<td class="fvalue"><?= $vin_requests['fields']['engine']['html'] ?></td>							<? } ?>							<td class="fname"><?= $vin_requests['fields']['drive']['caption'] ?></td>							<td class="fvalue"><?= $vin_requests['fields']['drive']['html'] ?></td>						</tr>						<tr>							<? if ($vin_requests['fields']['transmission']) { ?>								<td class="fname"><?= $vin_requests['fields']['transmission']['caption'] ?></td>								<td class="fvalue"><?= $vin_requests['fields']['transmission']['html'] ?></td>							<? } ?>							<td class="fname"><?= $vin_requests['fields']['transm_number']['caption'] ?></td>							<td class="fvalue"><?= $vin_requests['fields']['transm_number']['html'] ?></td>						</tr>						<? if ($vin_requests['fields']['steering']) { ?>							<tr>								<td class="fname"><?= $vin_requests['fields']['steering']['caption'] ?></td>								<td class="fvalue"><?= $vin_requests['fields']['steering']['html'] ?></td>								<td class="fname"></td>								<td class="fvalue"></td>							</tr>						<? } ?>						<tr>							<td class="fname"><?= $MSG['Cars']['msg56'] ?></td>							<td class="fvalue" colspan="3">								<?= $vin_requests['fields']['abs']['html'] ?>								<?= $vin_requests['fields']['esp']['html'] ?>								<?= $vin_requests['fields']['booster']['html'] ?>								<?= $vin_requests['fields']['conditioner']['html'] ?>								<?= $vin_requests['fields']['catalyst']['html'] ?>							</td>						</tr>					</table>				</div>			</div>			<script type="text/javascript">				window.addEvent('domready', function () {					var myAccordion = new Fx.Accordion($$('#a_vin_ad_fields'), $$('#vin_ad_fields'), {						opacity: false,						display: -1,						alwaysHide: true,						initialDisplayFx: false,						onActive: function (toggler, element) {							setTimeout(function () {								if (toggler.hasClass('active')) element.addClass('vis')							}, 1000);							toggler.addClass('active');						},						onBackground: function (toggler, element) {							toggler.removeClass('active');							if (element.hasClass('vis')) element.removeClass('vis');						}					});				});			</script>		<? } ?>	</div><? if ($car_hide_start) { ?>	<script type="text/javascript">		window.addEvent('domready', function () {			if ($('form_add')) $('form_add').style.display = 'none';		});	</script><? } ?><? if ($car_in_table) { ?>	</td></tr><? } ?><? if (!empty($_REQUEST['csc_id'])) { ?>	<script type="text/javascript">		window.addEvent('domready', function () {			if ($('csc_id')) setVinCar(<?=$_REQUEST['csc_id']?>);		});	</script><? } ?><?  ?>
	</tbody>

	<script type="text/javascript">
		window.addEvent('domready', function () {
			$('ord_car_select').style.display = 'none';
		});
	</script>
<? } ?>

<tr>
	<td colspan="2"><h2><?= $MSG['MakeOrderModule']['msg70'] ?></h2></td>
</tr>

<? if ($order['fields']['ord_pmk_id']) { ?>
<tr>
	<td class="fname"><?= $order['fields']['ord_pmk_id']['caption'] ?></td>
	<td class="fvalue"><?= $order['fields']['ord_pmk_id']['html'] ?></td>
</tr>
<? } ?>

<? if ($order['fields']['ord_pyr_id']) { ?>
<tr>
	<td class="fname"><?= $order['fields']['ord_pyr_id']['caption'] ?></td>
	<td class="fvalue"><?= $order['fields']['ord_pyr_id']['html'] ?></td>
</tr>
<? } ?>

<? if ($order['fields']['ord_dlv_id']) { ?>
<tr>
	<td class="fname">
		<nobr><?= $order['fields']['ord_dlv_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $order['fields']['ord_dlv_id']['html'] ?></td>
</tr>
<? } ?>

<tbody id="delivery">

<tr>
	<td colspan="2"><h2><?= $MSG['MakeOrderModule']['msg86'] ?></h2></td>
</tr>

<? if ($order['fields']['ord_address']) { ?>

	<tr>
		<td class="fname"><?= $order['fields']['ord_address']['caption'] ?></td>
		<td class="fvalue"><?= $order['fields']['ord_address']['html'] ?></td>
	</tr>

<? } else { ?>

<tr>
	<td class="fname"><?= $order['fields']['ord_add_id']['caption'] ?></td>
	<td class="fvalue"><?= $order['fields']['ord_add_id']['html'] ?></td>
</tr>
	<tbody id="delivery_new_address">

	<? $address_form = & $order; ?>
	<? $adr_prefix = 'ord_'; ?>
	<?  ?><? if ($address_form['fields'][$adr_prefix . 'add_recipient_name']) { ?>
<tr id="tr_add_recipient_name">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_recipient_name']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_recipient_name']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_country_id']) { ?>
<tr id="tr_add_country_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_country_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_country_id']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_region_id']) { ?>
<tr id="tr_add_region_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_region_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_region_id"><?= $address_form['fields'][$adr_prefix . 'add_region_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_city_id']) { ?>
<tr id="tr_add_city_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_city_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_city_id"><?= $address_form['fields'][$adr_prefix . 'add_city_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_district_id']) { ?>
<tr id="tr_add_district_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_district_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_district_id"><?= $address_form['fields'][$adr_prefix . 'add_district_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_address']) { ?>
<tr id="tr_add_address">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_address']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_address']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_postal_index']) { ?>
<tr id="tr_add_postal_index">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_postal_index']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_postal_index']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields']['add_info']) { ?>
<tr id="tr_add_info">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_info']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_info']['html'] ?></td>
</tr>
<? } ?><?  ?>
	<? $adr_prefix = ''; ?>

	</tbody>

<? if (($hide_deliveries == 'display: none') or ($order['sourceFields']['ord_add_id']['instance']->items[$order['sourceFields']['ord_add_id']['instance']->value[0]] > 0)) { ?>
	<script type="text/javascript">
		window.addEvent('domready', function () {
			$('delivery_new_address').style.display = 'none';
		});
	</script>
<? } ?>

<? } ?>
</tbody>

<? if ($order['fields']['ord_comment']) { ?>
<tr>
	<td class="fname">
		<nobr><?= $order['fields']['ord_comment']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $order['fields']['ord_comment']['html'] ?></td>
</tr>
<? } ?><?  ?>

			<? } ?>

			<? if ($order['fields']['company'] or $needRegistrationFlag === true) { ?>

				<?  ?><?= $order['fields']['__cst_id__']['html'] ?>

<? $registration = & $order ?>

	<tr id="tr_reg_prs_tp_cpt">
		<td colspan="2"><h2 style="margin-top:10px;"><?= $MSG['RegistrationModule']['msg96'] ?></h2></td>
	</tr>

	<tr id="tr_is_organization">
		<td colspan="2" class="fname"><?= $registration['fields']['is_organization']['html'] ?></td>
	</tr>

	<tr id="tr_reg_cnt_inf_cpt">
		<td colspan="2"><h2><?= $MSG['RegistrationModule']['msg56'] ?></h2></td>
	</tr>

	<tbody id="companyName">

	<? if ($registration['fields']['company']) { ?>

		<tr id="tr_company">
			<td class="fname">
				<span class="form_required_field"><?= $registration['fields']['company']['caption'] ?></span>
			</td>
			<td class="fvalue"><?= $registration['fields']['company']['html'] ?></td>
		</tr>

	<? } ?>

	</tbody>

<? if ($hideContactFields != 1) { ?>

	<? $address_form = & $registration; ?>
	<?  ?><? if ($address_form['fields'][$adr_prefix . 'add_recipient_name']) { ?>
<tr id="tr_add_recipient_name">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_recipient_name']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_recipient_name']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_country_id']) { ?>
<tr id="tr_add_country_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_country_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_country_id']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_region_id']) { ?>
<tr id="tr_add_region_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_region_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_region_id"><?= $address_form['fields'][$adr_prefix . 'add_region_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_city_id']) { ?>
<tr id="tr_add_city_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_city_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_city_id"><?= $address_form['fields'][$adr_prefix . 'add_city_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_district_id']) { ?>
<tr id="tr_add_district_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_district_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_district_id"><?= $address_form['fields'][$adr_prefix . 'add_district_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_address']) { ?>
<tr id="tr_add_address">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_address']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_address']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_postal_index']) { ?>
<tr id="tr_add_postal_index">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_postal_index']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_postal_index']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields']['add_info']) { ?>
<tr id="tr_add_info">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_info']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_info']['html'] ?></td>
</tr>
<? } ?><?  ?>

	<? if ($registration['fields']['contact_surname']) { ?>
		<tr id="tr_contact_surname">
			<td class="fname"><?= $registration['fields']['contact_surname']['caption'] ?></td>
			<td class="fvalue"><?= $registration['fields']['contact_surname']['html'] ?></td>
		</tr>
	<? } ?>

	<? if ($registration['fields']['contact_first_name']) { ?>
		<tr id="tr_contact_first_name">
			<td class="fname"><?= $registration['fields']['contact_first_name']['caption'] ?></td>
			<td class="fvalue"><?= $registration['fields']['contact_first_name']['html'] ?></td>
		</tr>
	<? } ?>

	<? if ($registration['fields']['contact_patronymic_name']) { ?>
		<tr id="tr_contact_patronymic_name">
			<td class="fname"><?= $registration['fields']['contact_patronymic_name']['caption'] ?></td>
			<td class="fvalue"><?= $registration['fields']['contact_patronymic_name']['html'] ?></td>
		</tr>
	<? } ?>

	<? if ($registration['fields']['contact_phone'] or $registration['fields']['fax']) { ?>
		<tr id="tr_contact_phone_fax">
			<td class="fname"><?= $registration['fields']['contact_phone']['caption'] ?><?= ($registration['fields']['fax']['html'] ? ($registration['fields']['contact_phone']['caption'] ? ', ' : '') . $registration['fields']['fax']['caption'] : '') ?></td>
			<td class="fvalue">
				<table>
					<tr>
						<? if ($registration['fields']['contact_phone']['html']) { ?>
							<td class="fvalue_child"><?= $registration['fields']['contact_phone']['html'] ?></td>
						<? } ?>
						<? if ($registration['fields']['fax']['html']) { ?>
							<td class="fvalue_child"><?= $registration['fields']['fax']['html'] ?></td>
						<? } ?>
					</tr>
				</table>
			</td>
		</tr>
	<? } ?>

	<? if ($registration['fields']['mobile_phone']) { ?>
		<tr id="tr_mobile_phone">
			<td class="fname"><?= $registration['fields']['mobile_phone']['caption'] ?></td>
			<td class="fvalue"><?= $registration['fields']['mobile_phone']['html'] ?></td>
		</tr>
	<? } ?>

	<? if ($registration['fields']['cst_email']) { ?>
		<tr id="tr_cst_email">
			<td class="fname"><?= $registration['fields']['cst_email']['caption'] ?></td>
			<td class="fvalue"><?= $registration['fields']['cst_email']['html'] ?></td>
		</tr>
	<? } ?>

	<? if ($registration['fields']['cst_icq'] or $registration['fields']['cst_skype']) { ?>
		<tr id="tr_cst_icq_cst_skype">
			<td class="fname"><?= $registration['fields']['cst_icq']['caption'] ?><?= ($registration['fields']['cst_skype']['html'] ? ($registration['fields']['cst_icq']['caption'] ? ', ' : '') . $registration['fields']['cst_skype']['caption'] : '') ?></td>
			<td class="fvalue">
				<table>
					<tr>
						<? if ($registration['fields']['cst_icq']['html']) { ?>
							<td class="fvalue_child"><?= $registration['fields']['cst_icq']['html'] ?></td>
						<? } ?>
						<? if ($registration['fields']['cst_skype']['html']) { ?>
							<td class="fvalue_child"><?= $registration['fields']['cst_skype']['html'] ?></td>
						<? } ?>
					</tr>
				</table>
			</td>
		</tr>
	<? } ?>

<? } ?>

	<tr id="tr_cst_inf">
		<td colspan="2"><h2 style="margin-top: 15px"><?= $MSG['MakeOrderModule']['msg72'] ?></h2></td>
	</tr>

<? if ($order['fields']['cst_csa_id']) { ?>
	<tr id="tr_cst_csa_id">
		<td class="fname"><?= $order['fields']['cst_csa_id']['caption'] ?></td>
		<td class="fvalue"><?= $order['fields']['cst_csa_id']['html'] ?></td>
	</tr>
<? } ?>

<? if ($order['fields']['stc_id']) { ?>
	<tr id="tr_stc_id">
		<td class="fname"><?= $order['fields']['stc_id']['caption'] ?></td>
		<td class="fvalue"><?= $order['fields']['stc_id']['html'] ?></td>
	</tr>
<? } ?>

<? if ($order['fields']['pmk_id']) { ?>
	<tr id="tr_pmk_id">
		<td class="fname"><?= $order['fields']['pmk_id']['caption'] ?></td>
		<td class="fvalue">
			<div id="combo_pmk_id"><?= $order['fields']['pmk_id']['html'] ?></div>
		</td>
	</tr>
<? } ?>

<? if ($order['fields']['dlv_id']) { ?>
	<tr id="tr_dlv_id">
		<td class="fname"><?= $order['fields']['dlv_id']['caption'] ?></td>
		<td class="fvalue"><div id="combo_add_dlv_id"><?= $order['fields']['dlv_id']['html'] ?></div></td>
	</tr>
<? } ?>

	<tbody id="delivery">

	<tr>
		<td colspan="2"><h2 style="margin-top: 15px"><?= $MSG['MakeOrderModule']['msg86'] ?></h2></td>
	</tr>

	<tbody id="delivery_new_address">

	<? $address_form = & $order; ?>
	<? $adr_prefix = 'ord_'; ?>
	<?  ?><? if ($address_form['fields'][$adr_prefix . 'add_recipient_name']) { ?>
<tr id="tr_add_recipient_name">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_recipient_name']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_recipient_name']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_country_id']) { ?>
<tr id="tr_add_country_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_country_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_country_id']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_region_id']) { ?>
<tr id="tr_add_region_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_region_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_region_id"><?= $address_form['fields'][$adr_prefix . 'add_region_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_city_id']) { ?>
<tr id="tr_add_city_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_city_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_city_id"><?= $address_form['fields'][$adr_prefix . 'add_city_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_district_id']) { ?>
<tr id="tr_add_district_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_district_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_district_id"><?= $address_form['fields'][$adr_prefix . 'add_district_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_address']) { ?>
<tr id="tr_add_address">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_address']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_address']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_postal_index']) { ?>
<tr id="tr_add_postal_index">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_postal_index']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_postal_index']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields']['add_info']) { ?>
<tr id="tr_add_info">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_info']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_info']['html'] ?></td>
</tr>
<? } ?><?  ?>
	<? $adr_prefix = ''; ?>

	<? if ($order['fields']['ord_address']) { ?>
		<tr>
			<td class="fname">
				<nobr><?= $order['fields']['ord_address']['caption'] ?></nobr>
			</td>
			<td class="fvalue"><?= $order['fields']['ord_address']['html'] ?></td>
		</tr>
	<? } ?>

	</tbody>

	</tbody>

	<? if ($order['fields']['news_subscription']['html'] or $order['fields']['notify_subscription']['html'] or $order['fields']['sms_notify_subscription']['html']) { ?>
	<tr id="tr_notify_caption">
		<td colspan="2"><h2 style="margin-top: 15px"><?= $MSG['RegistrationModule']['msg102'] ?></h2></td>
	</tr>
	<? } ?>

	<? if ($order['fields']['news_subscription']['html'] or $order['fields']['notify_subscription']['html']) { ?>
	<tr id="tr_news_subscription">
		<td class="fname"><?= $order['fields']['news_subscription']['caption'] ?></td>
		<td class="fvalue">
			<table border="0">
				<tr>
					<td class="fvalue"><?= $order['fields']['news_subscription']['html'] ?></td>
					<td class="fvalue"><?= $order['fields']['notify_subscription']['html'] ?></td>
				</tr>
			</table>
		</td>
	</tr>
	<? } ?>

	<? if ($order['fields']['sms_notify_subscription']['html']) { ?>
	<tr id="tr_sms_notify_subscription">
		<td class="fname"><?= $order['fields']['sms_notify_subscription']['caption'] ?></td>
		<td class="fvalue">
			<table border="0">
				<tr>
					<td class="fvalue"><?= $order['fields']['sms_notify_subscription']['html'] ?></td>
					<td class="fvalue"></td>
				</tr>
			</table>
		</td>
	</tr>
	<? } ?>

<? if ($order['fields']['fake_percent']) { ?>

	<tr class="even" id="tr_fake_percent">
		<td class="fname">
			<?= $order['fields']['fake_percent']['caption'] ?><br/>
			<small><i><?= $MSG['RegistrationModule']['msg59'] ?></i></small>
		</td>
		<td class="fvalue"><?= $order['fields']['fake_percent']['html'] ?></td>
	</tr>

<? } ?>

	<tr id="tr_ord_comment">
		<td class="fname">
			<nobr><?= $order['fields']['ord_comment']['caption'] ?></nobr>
		</td>
		<td class="fvalue"><?= $order['fields']['ord_comment']['html'] ?></td>
	</tr>

<? if ($order['fields']['userlogin'] or $order['fields']['userpassword']) { ?>

	<tr id="tr_registration_user_login">
		<td colspan="2"><h2><?= $MSG['RegistrationModule']['msg60'] ?></h2></td>
	</tr>

	<? if ($order['fields']['userlogin']) { ?>
		<tr id="tr_userlogin">
			<td class="fname"><?= $order['fields']['userlogin']['caption'] ?></td>
			<td class="fvalue"><?= $order['fields']['userlogin']['html'] ?></td>
		</tr>
	<? } ?>

	<? if ($order['fields']['userpassword']) { ?>
		<tr id="tr_userpassword">
			<td class="fname"><?= $order['fields']['userpassword']['caption'] ?>
				<? if ($order['fields']['userpassword']['caption']) { ?>
					, <?= $order['fields']['userpassword_repeat']['caption'] ?>
				<? } ?>
			</td>
			<td class="fvalue">
				<table>
					<tr>
						<td class="fvalue_child"><?= $order['fields']['userpassword']['html'] ?></td>
						<td class="fvalue_child"><?= $order['fields']['userpassword_repeat']['html'] ?></td>
					</tr>
				</table>
			</td>
		</tr>
	<? } ?>

<? } ?>

	<tr id="tr_reg_hc_code">
		<td class="text_caption fname"><?= $order['fields']['reg_hc_code']['caption'] ?></td>
		<td class="fvalue">
			<table>
				<tr>
					<td class="fvalue_child"><?= $order['fields']['reg_hc_code']['html'] ?></td>
					<td class="fvalue_child"><?= $order['fields']['reg_hc_image']['html'] ?></td>
				</tr>
			</table>
		</td>
	</tr>

<? if ($hide_deliveries == 'display: none') { ?>
	<script type="text/javascript">
		window.addEvent('domready', function () {
			$('delivery').style.display = 'none';
			$('delivery_new_address').style.display = 'none';
		});
	</script>
<? } ?><?  ?>

			<? } ?>

		</table>

		<br />
		<br />
		<? $web_ar_datagrid = &$order['fields']['basket']['html']; ?>
		<? $web_ar_datagrid_source = &$order['sourceFields']['basket']['instance']->datasource; ?>
		<? $data_align = array('left','left','left','center','left','right','left','left','left'); ?>
		<? $basket_page = 'make_order';?>

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
		
		<?=$order['fields']['chPos']['html']?>
		<?  ?><script type="text/javascript">
		
				function calcDelivery() {		
					
					<? if (($order['fields']['ord_add_id']) or ($order['fields']['ord_add_city_id']) or ($order['fields']['ord_address'])) { ?>
	 		 
	 		 		formObj = document.forms['order'];
	 		 		dlv_idValue = formObj.ord_dlv_id?formObj.ord_dlv_id.value:formObj.dlv_id.value;
	 		 		add_idValue = formObj.ord_add_id?formObj.ord_add_id.value:"";
					
	 		 		add_city_idValue = formObj.ord_add_city_id?formObj.ord_add_city_id.value:"";
	 		 		add_district_idValue = formObj.ord_add_district_id?formObj.ord_add_district_id.value:"";
	 		 
					var url = "/_ajax/calcDelivery.html?dcm_id=" + <?=$order['sourceFields']['ord_dcm_id']['instance']->value?> + "&dlv_id=" + dlv_idValue + "&cty_id=" + add_city_idValue + "&dst_id=" + add_district_idValue + "&add_id=" + add_idValue + "&chPos=<?=$order['sourceFields']['chPos']['instance']->value?>";

					loadContent('deliveryDiv',url,false);
					
					if ($('deliveryDiv').innerHTML == '') {
						
						$('delivery_row').style.display = 'none';
						
					} else {
						
						$('delivery_row').style.display = 'table-row-group';
						
					}
					
					url = url +"&summ=<?=$SUMM_value?>";
					
					$('orderSumm').innerHTML = '<img src="/images/add_basket_loader.gif" alt="Расчёт цены..." title="Расчёт цены..." />';
					loadContent('orderSumm',url,true);

					<? } ?>

				}									
				
</script>

<div class="basket_controls_bottom flc">
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
	<? if ($order['fields']['OrderConfirm']) { ?>
		<div class="notify2">
			<span id="form_required_field">* </span><?=$order['fields']['OrderConfirm']['html']?>
		</div><br/>
	<? } ?>		
	<div class="rightside">
		<? if((!isset($MIN_ORDER_SUMM)) && (!isset($RESTRICT_DEBT_SUMM))) { ?>
			<?=$order['fields']['save_order']['html']?>
		<? } ?>
	</div>
	
	<div class="leftside">
		<?=$order['fields']['edit']['html']?>
		<?=$order['fields']['cancel']['html']?>
	</div>
</div>

<div class="backet_icons_comment">
		<ul>
			<li><?=$MSG['BasketModule']['msg51']?></li>
			<li><?=$MSG['BasketModule']['msg53']?></li>
		</ul>
</div><?  ?>
		<?=$order['fields']['_prid']['html']?>
		<?=$order['fields']['subj']['html']?>
		<?=$order['fields']['ord_id']['html']?>
		<?=$order['fields']['ord_dcm_id']['html']?>
		<?=$order['fields']['ord_active']['html']?>
		<?=$order['fields']['ord_fixed']['html']?>
		<?=$order['fields']['hide_small_basket']['html']?>
		<?=$order['fields']['ord_source_id']['html']?>
		<?=$order['fields']['csc_id']['html']?>

		<script language="JavaScript">

			calcDelivery();

		</script>

	</form>
</div><?  ?>

<? } else { ?>

	<? if (!$ORDER_EMPTY): ?>

	<? if($order['name'] == 'order') { ?>

			<?  ?><div class="ar_form">
	<?=$order['validationScript']?>
	<form id="<?=$order['id']?>" name="<?=$order['name']?>" action="<?=$order['action']?>" method="<?=$order['method']?>" onsubmit="<?=$order['onsubmit']?>">
		<table class="web_ar_datagrid make_order">

			<? if($order['fields']['ord_contact_person']) { ?>

				<? if ($MESSAGE_CLIENT_DEALER === true) { ?>

					<div class="notice"><?=tr('Внимание! Вами формируется заказ на клиента торговой точки - дилера, но цена закупа позиций рассчитана как для торговых точек - филиалов. При необходимости, скорректируйте цены закупа вручную.', 'MakeOrderModule')?></div>

				<? } ?>

				<?  ?><tr>
	<td colspan="2"><h2 style="margin-top:10px;"><?= $MSG['MakeOrderModule']['msg69'] ?></h2></td>
</tr>

<? if ($order['fields']['ord_contact_person']) { ?>
<tr>
	<td class="fname">
		<nobr><?= $order['fields']['ord_contact_person']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $order['fields']['ord_contact_person']['html'] ?></td>
</tr>
<? } ?>

<? if ($order['fields']['ord_phones']) { ?>
<tr>
	<td class="fname">
		<nobr><?= $order['fields']['ord_phones']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $order['fields']['ord_phones']['html'] ?></td>
</tr>
<? } ?>

<? if ($order['fields']['ord_email']) { ?>
<tr>
	<td class="fname">
		<nobr><?= $order['fields']['ord_email']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $order['fields']['ord_email']['html'] ?></td>
</tr>
<? } ?>

<? if ($order['fields']['ord_need_validation']) { ?>

	<tr>
		<td colspan="2"><h2><?= $MSG['MakeOrderModule']['msg80'] ?></h2></td>
	</tr>

	<tr>
		<td class="fname" colspan="2">
			<div class="car_check_notify"><?= $MSG['MakeOrderModule']['msg81'] ?></div>
		</td>
	</tr>

	<tr>
		<td class="fname" style="line-height:35px;">
			<li><?= $MSG['MakeOrderModule']['msg82'] ?></li>
		</td>
		<td class="fvalue" style="line-height:35px;">
			<span class="form_required_field">* </span><?= $order['fields']['ord_need_validation']['html'] ?>
		</td>
	</tr>
	<? $csc_id_field = 'ord_csc_id'; ?>
	<? $car_in_table = true; ?>
	<? $car_hide_start = true; ?>
	<? $car_select_caption = '<li>' . $order['fields']['ord_csc_id']['caption'] . '</li>'; ?>
	<? $vin_requests = & $order; ?>

	<tbody id="ord_car_select">
	<?  ?><? if (empty($csc_id_field)) $csc_id_field = 'vin_csc_id'; ?><? if (empty($init_text)) $init_text = $MSG['Cars']['msg49']; ?><? if ($hide_empty_cars !== true) $hide_empty_cars = false; ?><? if ((count($customer_cars) > 0) or ($car_in_table && !$hide_empty_cars)) { ?>	<? if ($car_in_table) { ?>		<tr>		<td class="fname"><?= $car_select_caption ?></td>		<td class="fvalue">	<? } ?>	<input type="hidden" name="<?= $csc_id_field ?>" value="" id="<?= $csc_id_field ?>"/>	<div id="vin_csc_div" class="flc">		<ul id="vin_csc" class="slide_menu">			<li class="menu vin_car"><a href="#" onclick="return false;" id="car_active"><span><?= $init_text ?></span></a>				<ul class="car_links">					<li>						<div class="car_caption" onclick="setVinCar(<?= ($car_hide_start ? 0 : '') ?>); return false;" id="car_caption"><?= ($car_hide_start ? '<span>' . $MSG['Cars']['msg50'] . '</span>' : $MSG['Cars']['msg51']) ?></div>					</li>					<? if (count($customer_cars) > 0) { ?>						<? foreach ($customer_cars as $car) { ?>							<li>								<a href="#" onclick="setVinCar('<?= $car['csc_id'] ?>'); return false;" id="acar<?= $car['csc_id'] ?>"><span><?= $car['customer_car'] ?></span></a>								<div class="car_info">									<? if ($car['csc_date']) { ?>										<?= preg_replace('#^.*/#Uis', '', $car['csc_date']) ?> <?= $MSG['Cars']['msg52'] ?>,									<? } ?>									<? if ($car['csc_engine_power']) { ?>										<?= $car['csc_engine_power'] ?> <?= $MSG['Cars']['msg53'] ?>,									<? } ?>									<? if ($car['csc_engine_volume']) { ?>										<?= $car['csc_engine_volume'] ?> <?= $MSG['Cars']['msg54'] ?>,									<? } ?>									<? if ($car['csc_vin_code']) { ?>										<?= $car['csc_vin_code'] ?>									<? } ?>								</div>							</li>						<? } ?>					<? } ?>				</ul>			</li>		</ul>	</div>	<script type="text/javascript">		var myMenu_vin_csc;		window.addEvent('domready', function () {			myMenu_vin_csc = new MenuMatic({id: 'vin_csc', opacity: '100'});		});	</script>	<script type="text/javascript">		function setVinCar(id) {			$('<?=$csc_id_field?>').value = id;			$('csc_id').value = id;			if (id) {				$('car_active').innerHTML = $('acar' + id).innerHTML;				$('car_caption').innerHTML = '<span><?=$MSG['Cars']['msg50']?></span>';				if ($('form_add')) $('form_add').style.display = 'none';				<? if ((!$car_in_table) or ($show_car_info)) { ?>				$('car_info').load('/_ajax/car_info.html?cst_id=<?=$client[0]->sourceId?>&csc_id=' + id);				<? } ?>			} else {				$('car_active').innerHTML = '<span><?=$init_text?></span>';				$('car_caption').innerHTML = '<?=$MSG['Cars']['msg51']?>';				if ($('form_add')) $('form_add').style.display = 'block';				<? if ((!$car_in_table) or ($show_car_info)) { ?>				$('car_info').innerHTML = '';				<? } ?>			}			myMenu_vin_csc.hideAllSubMenusNow();		}	</script>	<? if ($car_in_table) { ?>		</td>		</tr>		<tr>			<td colspan="2">				<div id="car_info"></div>			</td>		</tr>	<? } else { ?>		<div id="car_info"></div>	<? } ?><? } ?><? if ($car_in_table) { ?>	<tr><td colspan="2"><? } ?>	<div id="form_add" class="ar_form">		<table class="vin_form">			<? if ($vin_requests['fields']['vin']) { ?>				<tr>					<td class="fname"><?= $vin_requests['fields']['vin']['caption'] ?></td>					<td class="fvalue" colspan="3"><?= $vin_requests['fields']['vin']['html'] ?></td>				</tr>			<? } ?>			<? if ($vin_requests['fields']['year'] or $vin_requests['fields']['month']) { ?>				<tr>					<? if ($vin_requests['fields']['year']) { ?>						<td class="fname"><?= $vin_requests['fields']['year']['caption'] ?></td>						<td class="fvalue"><?= $vin_requests['fields']['year']['html'] ?></td>					<? } ?>					<td class="fname"><?= $vin_requests['fields']['month']['caption'] ?></td>					<td class="fvalue"><?= $vin_requests['fields']['month']['html'] ?></td>				</tr>			<? } ?>			<? if ($vin_requests['fields']['brand'] or $vin_requests['fields']['model']) { ?>				<tr>					<? if ($vin_requests['fields']['brand']) { ?>						<td class="fname"><?= $vin_requests['fields']['brand']['caption'] ?></td>						<td class="fvalue"><?= $vin_requests['fields']['brand']['html'] ?></td>					<? } ?>					<td class="fname"><?= $vin_requests['fields']['model']['caption'] ?></td>					<td class="fvalue"><?= $vin_requests['fields']['model']['html'] ?></td>				</tr>			<? } ?>			<? if ($vin_requests['fields']['power'] or $vin_requests['fields']['volume']) { ?>				<tr>					<? if ($vin_requests['fields']['power']) { ?>						<td class="fname"><?= $vin_requests['fields']['power']['caption'] ?></td>						<td class="fvalue"><?= $vin_requests['fields']['power']['html'] ?></td>					<? } ?>					<td class="fname"><?= $vin_requests['fields']['volume']['caption'] ?></td>					<td class="fvalue"><?= $vin_requests['fields']['volume']['html'] ?></td>				</tr>			<? } ?>			<? if ($vin_requests['fields']['info']) { ?>				<tr>					<td class="fname"><?= $vin_requests['fields']['info']['caption'] ?></td>					<td class="fvalue" colspan="3"><?= $vin_requests['fields']['info']['html'] ?></td>				</tr>			<? } ?>		</table>		<?		$arAddFields = ['cylinders', 'valves', 'bdy_type_id', 'doors', 'engine', 'drive', 'transmission', 'transm_number', 'steering', 'abs', 'esp', 'booster', 'conditioner', 'catalyst'];		$showDetails = false;		foreach ($arAddFields as $field) {			if ($vin_requests['fields'][$field]['caption']) {				$showDetails = true;				break;			}		}		?>		<? if ($showDetails) { ?>			<div id="vin_ad">				<a href="#" onclick="return false;" id="a_vin_ad_fields"><span><?= $MSG['Cars']['msg55'] ?></span></a>			</div>			<div id="vin_ad_fields" style='height:0px;overflow:hidden;'>				<div id="vin_ad_fields_inner">					<table class="vin_form">						<tr>							<? if ($vin_requests['fields']['cylinders']) { ?>								<td class="fname"><?= $vin_requests['fields']['cylinders']['caption'] ?></td>								<td class="fvalue"><?= $vin_requests['fields']['cylinders']['html'] ?></td>							<? } ?>							<td class="fname"><?= $vin_requests['fields']['valves']['caption'] ?></td>							<td class="fvalue"><?= $vin_requests['fields']['valves']['html'] ?></td>						</tr>						<tr>							<? if ($vin_requests['fields']['bdy_type_id']) { ?>								<td class="fname"><?= $vin_requests['fields']['bdy_type_id']['caption'] ?></td>								<td class="fvalue"><?= $vin_requests['fields']['bdy_type_id']['html'] ?></td>							<? } ?>							<td class="fname"><?= $vin_requests['fields']['doors']['caption'] ?></td>							<td class="fvalue"><?= $vin_requests['fields']['doors']['html'] ?></td>						</tr>						<tr>							<? if ($vin_requests['fields']['engine']) { ?>								<td class="fname"><?= $vin_requests['fields']['engine']['caption'] ?></td>								<td class="fvalue"><?= $vin_requests['fields']['engine']['html'] ?></td>							<? } ?>							<td class="fname"><?= $vin_requests['fields']['drive']['caption'] ?></td>							<td class="fvalue"><?= $vin_requests['fields']['drive']['html'] ?></td>						</tr>						<tr>							<? if ($vin_requests['fields']['transmission']) { ?>								<td class="fname"><?= $vin_requests['fields']['transmission']['caption'] ?></td>								<td class="fvalue"><?= $vin_requests['fields']['transmission']['html'] ?></td>							<? } ?>							<td class="fname"><?= $vin_requests['fields']['transm_number']['caption'] ?></td>							<td class="fvalue"><?= $vin_requests['fields']['transm_number']['html'] ?></td>						</tr>						<? if ($vin_requests['fields']['steering']) { ?>							<tr>								<td class="fname"><?= $vin_requests['fields']['steering']['caption'] ?></td>								<td class="fvalue"><?= $vin_requests['fields']['steering']['html'] ?></td>								<td class="fname"></td>								<td class="fvalue"></td>							</tr>						<? } ?>						<tr>							<td class="fname"><?= $MSG['Cars']['msg56'] ?></td>							<td class="fvalue" colspan="3">								<?= $vin_requests['fields']['abs']['html'] ?>								<?= $vin_requests['fields']['esp']['html'] ?>								<?= $vin_requests['fields']['booster']['html'] ?>								<?= $vin_requests['fields']['conditioner']['html'] ?>								<?= $vin_requests['fields']['catalyst']['html'] ?>							</td>						</tr>					</table>				</div>			</div>			<script type="text/javascript">				window.addEvent('domready', function () {					var myAccordion = new Fx.Accordion($$('#a_vin_ad_fields'), $$('#vin_ad_fields'), {						opacity: false,						display: -1,						alwaysHide: true,						initialDisplayFx: false,						onActive: function (toggler, element) {							setTimeout(function () {								if (toggler.hasClass('active')) element.addClass('vis')							}, 1000);							toggler.addClass('active');						},						onBackground: function (toggler, element) {							toggler.removeClass('active');							if (element.hasClass('vis')) element.removeClass('vis');						}					});				});			</script>		<? } ?>	</div><? if ($car_hide_start) { ?>	<script type="text/javascript">		window.addEvent('domready', function () {			if ($('form_add')) $('form_add').style.display = 'none';		});	</script><? } ?><? if ($car_in_table) { ?>	</td></tr><? } ?><? if (!empty($_REQUEST['csc_id'])) { ?>	<script type="text/javascript">		window.addEvent('domready', function () {			if ($('csc_id')) setVinCar(<?=$_REQUEST['csc_id']?>);		});	</script><? } ?><?  ?>
	</tbody>

	<script type="text/javascript">
		window.addEvent('domready', function () {
			$('ord_car_select').style.display = 'none';
		});
	</script>
<? } ?>

<tr>
	<td colspan="2"><h2><?= $MSG['MakeOrderModule']['msg70'] ?></h2></td>
</tr>

<? if ($order['fields']['ord_pmk_id']) { ?>
<tr>
	<td class="fname"><?= $order['fields']['ord_pmk_id']['caption'] ?></td>
	<td class="fvalue"><?= $order['fields']['ord_pmk_id']['html'] ?></td>
</tr>
<? } ?>

<? if ($order['fields']['ord_pyr_id']) { ?>
<tr>
	<td class="fname"><?= $order['fields']['ord_pyr_id']['caption'] ?></td>
	<td class="fvalue"><?= $order['fields']['ord_pyr_id']['html'] ?></td>
</tr>
<? } ?>

<? if ($order['fields']['ord_dlv_id']) { ?>
<tr>
	<td class="fname">
		<nobr><?= $order['fields']['ord_dlv_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $order['fields']['ord_dlv_id']['html'] ?></td>
</tr>
<? } ?>

<tbody id="delivery">

<tr>
	<td colspan="2"><h2><?= $MSG['MakeOrderModule']['msg86'] ?></h2></td>
</tr>

<? if ($order['fields']['ord_address']) { ?>

	<tr>
		<td class="fname"><?= $order['fields']['ord_address']['caption'] ?></td>
		<td class="fvalue"><?= $order['fields']['ord_address']['html'] ?></td>
	</tr>

<? } else { ?>

<tr>
	<td class="fname"><?= $order['fields']['ord_add_id']['caption'] ?></td>
	<td class="fvalue"><?= $order['fields']['ord_add_id']['html'] ?></td>
</tr>
	<tbody id="delivery_new_address">

	<? $address_form = & $order; ?>
	<? $adr_prefix = 'ord_'; ?>
	<?  ?><? if ($address_form['fields'][$adr_prefix . 'add_recipient_name']) { ?>
<tr id="tr_add_recipient_name">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_recipient_name']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_recipient_name']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_country_id']) { ?>
<tr id="tr_add_country_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_country_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_country_id']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_region_id']) { ?>
<tr id="tr_add_region_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_region_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_region_id"><?= $address_form['fields'][$adr_prefix . 'add_region_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_city_id']) { ?>
<tr id="tr_add_city_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_city_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_city_id"><?= $address_form['fields'][$adr_prefix . 'add_city_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_district_id']) { ?>
<tr id="tr_add_district_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_district_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_district_id"><?= $address_form['fields'][$adr_prefix . 'add_district_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_address']) { ?>
<tr id="tr_add_address">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_address']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_address']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_postal_index']) { ?>
<tr id="tr_add_postal_index">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_postal_index']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_postal_index']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields']['add_info']) { ?>
<tr id="tr_add_info">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_info']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_info']['html'] ?></td>
</tr>
<? } ?><?  ?>
	<? $adr_prefix = ''; ?>

	</tbody>

<? if (($hide_deliveries == 'display: none') or ($order['sourceFields']['ord_add_id']['instance']->items[$order['sourceFields']['ord_add_id']['instance']->value[0]] > 0)) { ?>
	<script type="text/javascript">
		window.addEvent('domready', function () {
			$('delivery_new_address').style.display = 'none';
		});
	</script>
<? } ?>

<? } ?>
</tbody>

<? if ($order['fields']['ord_comment']) { ?>
<tr>
	<td class="fname">
		<nobr><?= $order['fields']['ord_comment']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $order['fields']['ord_comment']['html'] ?></td>
</tr>
<? } ?><?  ?>

			<? } ?>

			<? if ($order['fields']['company'] or $needRegistrationFlag === true) { ?>

				<?  ?><?= $order['fields']['__cst_id__']['html'] ?>

<? $registration = & $order ?>

	<tr id="tr_reg_prs_tp_cpt">
		<td colspan="2"><h2 style="margin-top:10px;"><?= $MSG['RegistrationModule']['msg96'] ?></h2></td>
	</tr>

	<tr id="tr_is_organization">
		<td colspan="2" class="fname"><?= $registration['fields']['is_organization']['html'] ?></td>
	</tr>

	<tr id="tr_reg_cnt_inf_cpt">
		<td colspan="2"><h2><?= $MSG['RegistrationModule']['msg56'] ?></h2></td>
	</tr>

	<tbody id="companyName">

	<? if ($registration['fields']['company']) { ?>

		<tr id="tr_company">
			<td class="fname">
				<span class="form_required_field"><?= $registration['fields']['company']['caption'] ?></span>
			</td>
			<td class="fvalue"><?= $registration['fields']['company']['html'] ?></td>
		</tr>

	<? } ?>

	</tbody>

<? if ($hideContactFields != 1) { ?>

	<? $address_form = & $registration; ?>
	<?  ?><? if ($address_form['fields'][$adr_prefix . 'add_recipient_name']) { ?>
<tr id="tr_add_recipient_name">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_recipient_name']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_recipient_name']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_country_id']) { ?>
<tr id="tr_add_country_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_country_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_country_id']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_region_id']) { ?>
<tr id="tr_add_region_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_region_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_region_id"><?= $address_form['fields'][$adr_prefix . 'add_region_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_city_id']) { ?>
<tr id="tr_add_city_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_city_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_city_id"><?= $address_form['fields'][$adr_prefix . 'add_city_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_district_id']) { ?>
<tr id="tr_add_district_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_district_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_district_id"><?= $address_form['fields'][$adr_prefix . 'add_district_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_address']) { ?>
<tr id="tr_add_address">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_address']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_address']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_postal_index']) { ?>
<tr id="tr_add_postal_index">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_postal_index']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_postal_index']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields']['add_info']) { ?>
<tr id="tr_add_info">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_info']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_info']['html'] ?></td>
</tr>
<? } ?><?  ?>

	<? if ($registration['fields']['contact_surname']) { ?>
		<tr id="tr_contact_surname">
			<td class="fname"><?= $registration['fields']['contact_surname']['caption'] ?></td>
			<td class="fvalue"><?= $registration['fields']['contact_surname']['html'] ?></td>
		</tr>
	<? } ?>

	<? if ($registration['fields']['contact_first_name']) { ?>
		<tr id="tr_contact_first_name">
			<td class="fname"><?= $registration['fields']['contact_first_name']['caption'] ?></td>
			<td class="fvalue"><?= $registration['fields']['contact_first_name']['html'] ?></td>
		</tr>
	<? } ?>

	<? if ($registration['fields']['contact_patronymic_name']) { ?>
		<tr id="tr_contact_patronymic_name">
			<td class="fname"><?= $registration['fields']['contact_patronymic_name']['caption'] ?></td>
			<td class="fvalue"><?= $registration['fields']['contact_patronymic_name']['html'] ?></td>
		</tr>
	<? } ?>

	<? if ($registration['fields']['contact_phone'] or $registration['fields']['fax']) { ?>
		<tr id="tr_contact_phone_fax">
			<td class="fname"><?= $registration['fields']['contact_phone']['caption'] ?><?= ($registration['fields']['fax']['html'] ? ($registration['fields']['contact_phone']['caption'] ? ', ' : '') . $registration['fields']['fax']['caption'] : '') ?></td>
			<td class="fvalue">
				<table>
					<tr>
						<? if ($registration['fields']['contact_phone']['html']) { ?>
							<td class="fvalue_child"><?= $registration['fields']['contact_phone']['html'] ?></td>
						<? } ?>
						<? if ($registration['fields']['fax']['html']) { ?>
							<td class="fvalue_child"><?= $registration['fields']['fax']['html'] ?></td>
						<? } ?>
					</tr>
				</table>
			</td>
		</tr>
	<? } ?>

	<? if ($registration['fields']['mobile_phone']) { ?>
		<tr id="tr_mobile_phone">
			<td class="fname"><?= $registration['fields']['mobile_phone']['caption'] ?></td>
			<td class="fvalue"><?= $registration['fields']['mobile_phone']['html'] ?></td>
		</tr>
	<? } ?>

	<? if ($registration['fields']['cst_email']) { ?>
		<tr id="tr_cst_email">
			<td class="fname"><?= $registration['fields']['cst_email']['caption'] ?></td>
			<td class="fvalue"><?= $registration['fields']['cst_email']['html'] ?></td>
		</tr>
	<? } ?>

	<? if ($registration['fields']['cst_icq'] or $registration['fields']['cst_skype']) { ?>
		<tr id="tr_cst_icq_cst_skype">
			<td class="fname"><?= $registration['fields']['cst_icq']['caption'] ?><?= ($registration['fields']['cst_skype']['html'] ? ($registration['fields']['cst_icq']['caption'] ? ', ' : '') . $registration['fields']['cst_skype']['caption'] : '') ?></td>
			<td class="fvalue">
				<table>
					<tr>
						<? if ($registration['fields']['cst_icq']['html']) { ?>
							<td class="fvalue_child"><?= $registration['fields']['cst_icq']['html'] ?></td>
						<? } ?>
						<? if ($registration['fields']['cst_skype']['html']) { ?>
							<td class="fvalue_child"><?= $registration['fields']['cst_skype']['html'] ?></td>
						<? } ?>
					</tr>
				</table>
			</td>
		</tr>
	<? } ?>

<? } ?>

	<tr id="tr_cst_inf">
		<td colspan="2"><h2 style="margin-top: 15px"><?= $MSG['MakeOrderModule']['msg72'] ?></h2></td>
	</tr>

<? if ($order['fields']['cst_csa_id']) { ?>
	<tr id="tr_cst_csa_id">
		<td class="fname"><?= $order['fields']['cst_csa_id']['caption'] ?></td>
		<td class="fvalue"><?= $order['fields']['cst_csa_id']['html'] ?></td>
	</tr>
<? } ?>

<? if ($order['fields']['stc_id']) { ?>
	<tr id="tr_stc_id">
		<td class="fname"><?= $order['fields']['stc_id']['caption'] ?></td>
		<td class="fvalue"><?= $order['fields']['stc_id']['html'] ?></td>
	</tr>
<? } ?>

<? if ($order['fields']['pmk_id']) { ?>
	<tr id="tr_pmk_id">
		<td class="fname"><?= $order['fields']['pmk_id']['caption'] ?></td>
		<td class="fvalue">
			<div id="combo_pmk_id"><?= $order['fields']['pmk_id']['html'] ?></div>
		</td>
	</tr>
<? } ?>

<? if ($order['fields']['dlv_id']) { ?>
	<tr id="tr_dlv_id">
		<td class="fname"><?= $order['fields']['dlv_id']['caption'] ?></td>
		<td class="fvalue"><div id="combo_add_dlv_id"><?= $order['fields']['dlv_id']['html'] ?></div></td>
	</tr>
<? } ?>

	<tbody id="delivery">

	<tr>
		<td colspan="2"><h2 style="margin-top: 15px"><?= $MSG['MakeOrderModule']['msg86'] ?></h2></td>
	</tr>

	<tbody id="delivery_new_address">

	<? $address_form = & $order; ?>
	<? $adr_prefix = 'ord_'; ?>
	<?  ?><? if ($address_form['fields'][$adr_prefix . 'add_recipient_name']) { ?>
<tr id="tr_add_recipient_name">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_recipient_name']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_recipient_name']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_country_id']) { ?>
<tr id="tr_add_country_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_country_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_country_id']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_region_id']) { ?>
<tr id="tr_add_region_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_region_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_region_id"><?= $address_form['fields'][$adr_prefix . 'add_region_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_city_id']) { ?>
<tr id="tr_add_city_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_city_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_city_id"><?= $address_form['fields'][$adr_prefix . 'add_city_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_district_id']) { ?>
<tr id="tr_add_district_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_district_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_district_id"><?= $address_form['fields'][$adr_prefix . 'add_district_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_address']) { ?>
<tr id="tr_add_address">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_address']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_address']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_postal_index']) { ?>
<tr id="tr_add_postal_index">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_postal_index']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_postal_index']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields']['add_info']) { ?>
<tr id="tr_add_info">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_info']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_info']['html'] ?></td>
</tr>
<? } ?><?  ?>
	<? $adr_prefix = ''; ?>

	<? if ($order['fields']['ord_address']) { ?>
		<tr>
			<td class="fname">
				<nobr><?= $order['fields']['ord_address']['caption'] ?></nobr>
			</td>
			<td class="fvalue"><?= $order['fields']['ord_address']['html'] ?></td>
		</tr>
	<? } ?>

	</tbody>

	</tbody>

	<? if ($order['fields']['news_subscription']['html'] or $order['fields']['notify_subscription']['html'] or $order['fields']['sms_notify_subscription']['html']) { ?>
	<tr id="tr_notify_caption">
		<td colspan="2"><h2 style="margin-top: 15px"><?= $MSG['RegistrationModule']['msg102'] ?></h2></td>
	</tr>
	<? } ?>

	<? if ($order['fields']['news_subscription']['html'] or $order['fields']['notify_subscription']['html']) { ?>
	<tr id="tr_news_subscription">
		<td class="fname"><?= $order['fields']['news_subscription']['caption'] ?></td>
		<td class="fvalue">
			<table border="0">
				<tr>
					<td class="fvalue"><?= $order['fields']['news_subscription']['html'] ?></td>
					<td class="fvalue"><?= $order['fields']['notify_subscription']['html'] ?></td>
				</tr>
			</table>
		</td>
	</tr>
	<? } ?>

	<? if ($order['fields']['sms_notify_subscription']['html']) { ?>
	<tr id="tr_sms_notify_subscription">
		<td class="fname"><?= $order['fields']['sms_notify_subscription']['caption'] ?></td>
		<td class="fvalue">
			<table border="0">
				<tr>
					<td class="fvalue"><?= $order['fields']['sms_notify_subscription']['html'] ?></td>
					<td class="fvalue"></td>
				</tr>
			</table>
		</td>
	</tr>
	<? } ?>

<? if ($order['fields']['fake_percent']) { ?>

	<tr class="even" id="tr_fake_percent">
		<td class="fname">
			<?= $order['fields']['fake_percent']['caption'] ?><br/>
			<small><i><?= $MSG['RegistrationModule']['msg59'] ?></i></small>
		</td>
		<td class="fvalue"><?= $order['fields']['fake_percent']['html'] ?></td>
	</tr>

<? } ?>

	<tr id="tr_ord_comment">
		<td class="fname">
			<nobr><?= $order['fields']['ord_comment']['caption'] ?></nobr>
		</td>
		<td class="fvalue"><?= $order['fields']['ord_comment']['html'] ?></td>
	</tr>

<? if ($order['fields']['userlogin'] or $order['fields']['userpassword']) { ?>

	<tr id="tr_registration_user_login">
		<td colspan="2"><h2><?= $MSG['RegistrationModule']['msg60'] ?></h2></td>
	</tr>

	<? if ($order['fields']['userlogin']) { ?>
		<tr id="tr_userlogin">
			<td class="fname"><?= $order['fields']['userlogin']['caption'] ?></td>
			<td class="fvalue"><?= $order['fields']['userlogin']['html'] ?></td>
		</tr>
	<? } ?>

	<? if ($order['fields']['userpassword']) { ?>
		<tr id="tr_userpassword">
			<td class="fname"><?= $order['fields']['userpassword']['caption'] ?>
				<? if ($order['fields']['userpassword']['caption']) { ?>
					, <?= $order['fields']['userpassword_repeat']['caption'] ?>
				<? } ?>
			</td>
			<td class="fvalue">
				<table>
					<tr>
						<td class="fvalue_child"><?= $order['fields']['userpassword']['html'] ?></td>
						<td class="fvalue_child"><?= $order['fields']['userpassword_repeat']['html'] ?></td>
					</tr>
				</table>
			</td>
		</tr>
	<? } ?>

<? } ?>

	<tr id="tr_reg_hc_code">
		<td class="text_caption fname"><?= $order['fields']['reg_hc_code']['caption'] ?></td>
		<td class="fvalue">
			<table>
				<tr>
					<td class="fvalue_child"><?= $order['fields']['reg_hc_code']['html'] ?></td>
					<td class="fvalue_child"><?= $order['fields']['reg_hc_image']['html'] ?></td>
				</tr>
			</table>
		</td>
	</tr>

<? if ($hide_deliveries == 'display: none') { ?>
	<script type="text/javascript">
		window.addEvent('domready', function () {
			$('delivery').style.display = 'none';
			$('delivery_new_address').style.display = 'none';
		});
	</script>
<? } ?><?  ?>

			<? } ?>

		</table>

		<br />
		<br />
		<? $web_ar_datagrid = &$order['fields']['basket']['html']; ?>
		<? $web_ar_datagrid_source = &$order['sourceFields']['basket']['instance']->datasource; ?>
		<? $data_align = array('left','left','left','center','left','right','left','left','left'); ?>
		<? $basket_page = 'make_order';?>

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
		
		<?=$order['fields']['chPos']['html']?>
		<?  ?><script type="text/javascript">
		
				function calcDelivery() {		
					
					<? if (($order['fields']['ord_add_id']) or ($order['fields']['ord_add_city_id']) or ($order['fields']['ord_address'])) { ?>
	 		 
	 		 		formObj = document.forms['order'];
	 		 		dlv_idValue = formObj.ord_dlv_id?formObj.ord_dlv_id.value:formObj.dlv_id.value;
	 		 		add_idValue = formObj.ord_add_id?formObj.ord_add_id.value:"";
					
	 		 		add_city_idValue = formObj.ord_add_city_id?formObj.ord_add_city_id.value:"";
	 		 		add_district_idValue = formObj.ord_add_district_id?formObj.ord_add_district_id.value:"";
	 		 
					var url = "/_ajax/calcDelivery.html?dcm_id=" + <?=$order['sourceFields']['ord_dcm_id']['instance']->value?> + "&dlv_id=" + dlv_idValue + "&cty_id=" + add_city_idValue + "&dst_id=" + add_district_idValue + "&add_id=" + add_idValue + "&chPos=<?=$order['sourceFields']['chPos']['instance']->value?>";

					loadContent('deliveryDiv',url,false);
					
					if ($('deliveryDiv').innerHTML == '') {
						
						$('delivery_row').style.display = 'none';
						
					} else {
						
						$('delivery_row').style.display = 'table-row-group';
						
					}
					
					url = url +"&summ=<?=$SUMM_value?>";
					
					$('orderSumm').innerHTML = '<img src="/images/add_basket_loader.gif" alt="Расчёт цены..." title="Расчёт цены..." />';
					loadContent('orderSumm',url,true);

					<? } ?>

				}									
				
</script>

<div class="basket_controls_bottom flc">
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
	<? if ($order['fields']['OrderConfirm']) { ?>
		<div class="notify2">
			<span id="form_required_field">* </span><?=$order['fields']['OrderConfirm']['html']?>
		</div><br/>
	<? } ?>		
	<div class="rightside">
		<? if((!isset($MIN_ORDER_SUMM)) && (!isset($RESTRICT_DEBT_SUMM))) { ?>
			<?=$order['fields']['save_order']['html']?>
		<? } ?>
	</div>
	
	<div class="leftside">
		<?=$order['fields']['edit']['html']?>
		<?=$order['fields']['cancel']['html']?>
	</div>
</div>

<div class="backet_icons_comment">
		<ul>
			<li><?=$MSG['BasketModule']['msg51']?></li>
			<li><?=$MSG['BasketModule']['msg53']?></li>
		</ul>
</div><?  ?>
		<?=$order['fields']['_prid']['html']?>
		<?=$order['fields']['subj']['html']?>
		<?=$order['fields']['ord_id']['html']?>
		<?=$order['fields']['ord_dcm_id']['html']?>
		<?=$order['fields']['ord_active']['html']?>
		<?=$order['fields']['ord_fixed']['html']?>
		<?=$order['fields']['hide_small_basket']['html']?>
		<?=$order['fields']['ord_source_id']['html']?>
		<?=$order['fields']['csc_id']['html']?>

		<script language="JavaScript">

			calcDelivery();

		</script>

	</form>
</div><?  ?>

	<? } ?>

	<? $process_messages = &$order;?>
	<?  ?><? if (count($process_messages['messages']) > 0) {
	
	foreach($process_messages['messages'] as $message) {
		
		echo $message;
		
	}

} ?><?  ?>

	<? else: ?>
		<div class="warning">
			<div class="warning_caption"><?=$MSG['Forms']['msg5']?></div>
			<div class="warning_text"><?= $ORDER_EMPTY ?></div>
		</div>
	<?endif ?>

<? } ?>