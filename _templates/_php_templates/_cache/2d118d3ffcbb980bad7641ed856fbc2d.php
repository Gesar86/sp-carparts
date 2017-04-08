<h1><?=$MSG['VinRequestModule']['msg70']?></h1>

<? if ($vin_requests['messages']['vin_success']) { ?>
	
	<?=$vin_requests['messages']['vin_success']?>

<? } else { ?>
	
	<?  ?><?if (strstr($_SERVER["HTTP_USER_AGENT"], "MSIE")) {	echo '<style type="text/css">.vin_form .fvalue{position:relative;padding-right:5px !important;}</style>';}?><div id="vin_page">	<?= $vin_requests['validationScript'] ?>	<form id="<?= $vin_requests['id'] ?>" name="<?= $vin_requests['name'] ?>" action="<?= $vin_requests['action'] ?>" method="<?= $vin_requests['method'] ?>" onsubmit="<?= $vin_requests['onsubmit'] ?>">		<?= $vin_requests['fields']['__cst_id__']['html'] ?>		<div>			<? if ($vin_requests['messages']['registration_error_fields']) { ?>				<?  ?><div class="error">
<?=$MSG['RegistrationModule']['msg63']?>
<?=$MSG['RegistrationModule']['msg66']?>
<?=($vin_requests['messages']['registration_error_passwords_mismatch']?$MSG['RegistrationModule']['msg82']:'')?>
<?=($vin_requests['messages']['registration_error_incorrect_email']?$MSG['RegistrationModule']['msg83']:'')?>
<?=($vin_requests['messages']['registration_error_companyname_needed']?$MSG['RegistrationModule']['msg85']:'')?>
<?=($vin_requests['messages']['registration_error_incorect_contact_phone']?'<p><span id="form_required_field">' . tr('Данный контактный телефон уже используется на сайте.', 'RegistrationModule') . '</span></p>':'')?>
<?=($vin_requests['messages']['human_check_error']?$MSG['RegistrationModule']['msg65']:'')?>
<?=($vin_requests['messages']['registration_error']?$MSG['RegistrationModule']['msg64']:'')?>
<?=($vin_requests['messages']['registration_error_email']?$MSG['RegistrationModule']['msg69']:'')?>
<?=($vin_requests['messages']['registration_error_userlogin']?$MSG['RegistrationModule']['msg79']:'')?>
</div><?  ?>			<? } ?>			<? if ($vin_requests['messages']['content_error']) { ?>				<div class="error">					<h2><?= $MSG['VinRequestModule']['msg73'] ?></h2>					<p><span id="form_required_field"><?= $MSG['VinRequestModule']['msg75'] ?></span></p>				</div>			<? } ?>		</div>		<table class="vin_car_select vin_form">			<? $car_in_table = true; ?>			<? $show_car_info = true; ?>			<? $hide_empty_cars = true; ?>			<? $init_text = $MSG['Cars']['msg50']; ?>			<? $car_select_caption = '<span class="form_required_field">' . $MSG['Cars']['msg49'] . '</span>'; ?>			<?  ?><? if (empty($csc_id_field)) $csc_id_field = 'vin_csc_id'; ?><? if (empty($init_text)) $init_text = $MSG['Cars']['msg49']; ?><? if ($hide_empty_cars !== true) $hide_empty_cars = false; ?><? if ((count($customer_cars) > 0) or ($car_in_table && !$hide_empty_cars)) { ?>	<? if ($car_in_table) { ?>		<tr>		<td class="fname"><?= $car_select_caption ?></td>		<td class="fvalue">	<? } ?>	<input type="hidden" name="<?= $csc_id_field ?>" value="" id="<?= $csc_id_field ?>"/>	<div id="vin_csc_div" class="flc">		<ul id="vin_csc" class="slide_menu">			<li class="menu vin_car"><a href="#" onclick="return false;" id="car_active"><span><?= $init_text ?></span></a>				<ul class="car_links">					<li>						<div class="car_caption" onclick="setVinCar(<?= ($car_hide_start ? 0 : '') ?>); return false;" id="car_caption"><?= ($car_hide_start ? '<span>' . $MSG['Cars']['msg50'] . '</span>' : $MSG['Cars']['msg51']) ?></div>					</li>					<? if (count($customer_cars) > 0) { ?>						<? foreach ($customer_cars as $car) { ?>							<li>								<a href="#" onclick="setVinCar('<?= $car['csc_id'] ?>'); return false;" id="acar<?= $car['csc_id'] ?>"><span><?= $car['customer_car'] ?></span></a>								<div class="car_info">									<? if ($car['csc_date']) { ?>										<?= preg_replace('#^.*/#Uis', '', $car['csc_date']) ?> <?= $MSG['Cars']['msg52'] ?>,									<? } ?>									<? if ($car['csc_engine_power']) { ?>										<?= $car['csc_engine_power'] ?> <?= $MSG['Cars']['msg53'] ?>,									<? } ?>									<? if ($car['csc_engine_volume']) { ?>										<?= $car['csc_engine_volume'] ?> <?= $MSG['Cars']['msg54'] ?>,									<? } ?>									<? if ($car['csc_vin_code']) { ?>										<?= $car['csc_vin_code'] ?>									<? } ?>								</div>							</li>						<? } ?>					<? } ?>				</ul>			</li>		</ul>	</div>	<script type="text/javascript">		var myMenu_vin_csc;		window.addEvent('domready', function () {			myMenu_vin_csc = new MenuMatic({id: 'vin_csc', opacity: '100'});		});	</script>	<script type="text/javascript">		function setVinCar(id) {			$('<?=$csc_id_field?>').value = id;			$('csc_id').value = id;			if (id) {				$('car_active').innerHTML = $('acar' + id).innerHTML;				$('car_caption').innerHTML = '<span><?=$MSG['Cars']['msg50']?></span>';				if ($('form_add')) $('form_add').style.display = 'none';				<? if ((!$car_in_table) or ($show_car_info)) { ?>				$('car_info').load('/_ajax/car_info.html?cst_id=<?=$client[0]->sourceId?>&csc_id=' + id);				<? } ?>			} else {				$('car_active').innerHTML = '<span><?=$init_text?></span>';				$('car_caption').innerHTML = '<?=$MSG['Cars']['msg51']?>';				if ($('form_add')) $('form_add').style.display = 'block';				<? if ((!$car_in_table) or ($show_car_info)) { ?>				$('car_info').innerHTML = '';				<? } ?>			}			myMenu_vin_csc.hideAllSubMenusNow();		}	</script>	<? if ($car_in_table) { ?>		</td>		</tr>		<tr>			<td colspan="2">				<div id="car_info"></div>			</td>		</tr>	<? } else { ?>		<div id="car_info"></div>	<? } ?><? } ?><? if ($car_in_table) { ?>	<tr><td colspan="2"><? } ?>	<div id="form_add" class="ar_form">		<table class="vin_form">			<? if ($vin_requests['fields']['vin']) { ?>				<tr>					<td class="fname"><?= $vin_requests['fields']['vin']['caption'] ?></td>					<td class="fvalue" colspan="3"><?= $vin_requests['fields']['vin']['html'] ?></td>				</tr>			<? } ?>			<? if ($vin_requests['fields']['year'] or $vin_requests['fields']['month']) { ?>				<tr>					<? if ($vin_requests['fields']['year']) { ?>						<td class="fname"><?= $vin_requests['fields']['year']['caption'] ?></td>						<td class="fvalue"><?= $vin_requests['fields']['year']['html'] ?></td>					<? } ?>					<td class="fname"><?= $vin_requests['fields']['month']['caption'] ?></td>					<td class="fvalue"><?= $vin_requests['fields']['month']['html'] ?></td>				</tr>			<? } ?>			<? if ($vin_requests['fields']['brand'] or $vin_requests['fields']['model']) { ?>				<tr>					<? if ($vin_requests['fields']['brand']) { ?>						<td class="fname"><?= $vin_requests['fields']['brand']['caption'] ?></td>						<td class="fvalue"><?= $vin_requests['fields']['brand']['html'] ?></td>					<? } ?>					<td class="fname"><?= $vin_requests['fields']['model']['caption'] ?></td>					<td class="fvalue"><?= $vin_requests['fields']['model']['html'] ?></td>				</tr>			<? } ?>			<? if ($vin_requests['fields']['power'] or $vin_requests['fields']['volume']) { ?>				<tr>					<? if ($vin_requests['fields']['power']) { ?>						<td class="fname"><?= $vin_requests['fields']['power']['caption'] ?></td>						<td class="fvalue"><?= $vin_requests['fields']['power']['html'] ?></td>					<? } ?>					<td class="fname"><?= $vin_requests['fields']['volume']['caption'] ?></td>					<td class="fvalue"><?= $vin_requests['fields']['volume']['html'] ?></td>				</tr>			<? } ?>			<? if ($vin_requests['fields']['info']) { ?>				<tr>					<td class="fname"><?= $vin_requests['fields']['info']['caption'] ?></td>					<td class="fvalue" colspan="3"><?= $vin_requests['fields']['info']['html'] ?></td>				</tr>			<? } ?>		</table>		<?		$arAddFields = ['cylinders', 'valves', 'bdy_type_id', 'doors', 'engine', 'drive', 'transmission', 'transm_number', 'steering', 'abs', 'esp', 'booster', 'conditioner', 'catalyst'];		$showDetails = false;		foreach ($arAddFields as $field) {			if ($vin_requests['fields'][$field]['caption']) {				$showDetails = true;				break;			}		}		?>		<? if ($showDetails) { ?>			<div id="vin_ad">				<a href="#" onclick="return false;" id="a_vin_ad_fields"><span><?= $MSG['Cars']['msg55'] ?></span></a>			</div>			<div id="vin_ad_fields" style='height:0px;overflow:hidden;'>				<div id="vin_ad_fields_inner">					<table class="vin_form">						<tr>							<? if ($vin_requests['fields']['cylinders']) { ?>								<td class="fname"><?= $vin_requests['fields']['cylinders']['caption'] ?></td>								<td class="fvalue"><?= $vin_requests['fields']['cylinders']['html'] ?></td>							<? } ?>							<td class="fname"><?= $vin_requests['fields']['valves']['caption'] ?></td>							<td class="fvalue"><?= $vin_requests['fields']['valves']['html'] ?></td>						</tr>						<tr>							<? if ($vin_requests['fields']['bdy_type_id']) { ?>								<td class="fname"><?= $vin_requests['fields']['bdy_type_id']['caption'] ?></td>								<td class="fvalue"><?= $vin_requests['fields']['bdy_type_id']['html'] ?></td>							<? } ?>							<td class="fname"><?= $vin_requests['fields']['doors']['caption'] ?></td>							<td class="fvalue"><?= $vin_requests['fields']['doors']['html'] ?></td>						</tr>						<tr>							<? if ($vin_requests['fields']['engine']) { ?>								<td class="fname"><?= $vin_requests['fields']['engine']['caption'] ?></td>								<td class="fvalue"><?= $vin_requests['fields']['engine']['html'] ?></td>							<? } ?>							<td class="fname"><?= $vin_requests['fields']['drive']['caption'] ?></td>							<td class="fvalue"><?= $vin_requests['fields']['drive']['html'] ?></td>						</tr>						<tr>							<? if ($vin_requests['fields']['transmission']) { ?>								<td class="fname"><?= $vin_requests['fields']['transmission']['caption'] ?></td>								<td class="fvalue"><?= $vin_requests['fields']['transmission']['html'] ?></td>							<? } ?>							<td class="fname"><?= $vin_requests['fields']['transm_number']['caption'] ?></td>							<td class="fvalue"><?= $vin_requests['fields']['transm_number']['html'] ?></td>						</tr>						<? if ($vin_requests['fields']['steering']) { ?>							<tr>								<td class="fname"><?= $vin_requests['fields']['steering']['caption'] ?></td>								<td class="fvalue"><?= $vin_requests['fields']['steering']['html'] ?></td>								<td class="fname"></td>								<td class="fvalue"></td>							</tr>						<? } ?>						<tr>							<td class="fname"><?= $MSG['Cars']['msg56'] ?></td>							<td class="fvalue" colspan="3">								<?= $vin_requests['fields']['abs']['html'] ?>								<?= $vin_requests['fields']['esp']['html'] ?>								<?= $vin_requests['fields']['booster']['html'] ?>								<?= $vin_requests['fields']['conditioner']['html'] ?>								<?= $vin_requests['fields']['catalyst']['html'] ?>							</td>						</tr>					</table>				</div>			</div>			<script type="text/javascript">				window.addEvent('domready', function () {					var myAccordion = new Fx.Accordion($$('#a_vin_ad_fields'), $$('#vin_ad_fields'), {						opacity: false,						display: -1,						alwaysHide: true,						initialDisplayFx: false,						onActive: function (toggler, element) {							setTimeout(function () {								if (toggler.hasClass('active')) element.addClass('vis')							}, 1000);							toggler.addClass('active');						},						onBackground: function (toggler, element) {							toggler.removeClass('active');							if (element.hasClass('vis')) element.removeClass('vis');						}					});				});			</script>		<? } ?>	</div><? if ($car_hide_start) { ?>	<script type="text/javascript">		window.addEvent('domready', function () {			if ($('form_add')) $('form_add').style.display = 'none';		});	</script><? } ?><? if ($car_in_table) { ?>	</td></tr><? } ?><? if (!empty($_REQUEST['csc_id'])) { ?>	<script type="text/javascript">		window.addEvent('domready', function () {			if ($('csc_id')) setVinCar(<?=$_REQUEST['csc_id']?>);		});	</script><? } ?><?  ?>		</table>		<?  ?><div id="vin_content">
<h3><?=$MSG['VinRequestModule']['msg41']?></h3>
<?=$MSG['VinRequestModule']['msg79']?>

<table border="0" id="partsTable" width="100%" class="web_ar_datagrid">
<tr>
	<th style="width:5px;">
		&nbsp;
	</th>
	<th width="200">
		<?=$vin_requests['fields']['dcc_name[]']['caption']?>
	</th>	
	<th width="110">
		<?=$vin_requests['fields']['dcc_article[]']['caption']?>
	</th>
	<th width="50">
		<?=$vin_requests['fields']['dcc_amount[]']['caption']?>
	</th>
	<th>
		<?=$vin_requests['fields']['dcc_comment[]']['caption']?>
	</th>
</tr>
<tr style="display: none">
	<td>
		<a href="#" onclick="deleteTableRow(this.parentElement.parentElement.rowIndex); return false;"><img src="/_sysimg/delete.png" alt="<?=$MSG['VinRequestModule']['msg81']?>" title="<?=$MSG['VinRequestModule']['msg81']?>" /></a>
	</td>
	<td>
		<?=$vin_requests['fields']['dcc_name[]']['html']?>
	</td>
	<td>
		<?=$vin_requests['fields']['dcc_article[]']['html']?>
	</td>
	<td>
		<?=$vin_requests['fields']['dcc_amount[]']['html']?>
	</td>
	<td>
		<?=$vin_requests['fields']['dcc_comment[]']['html']?>
	</td>
</tr>
<tr>
	<td>
		<a href="#" onclick="addTableRow(); return false;"><img src="/_sysimg/add2.png" alt="<?=$MSG['VinRequestModule']['msg80']?>" title="<?=$MSG['VinRequestModule']['msg80']?>" /></a>
	</td>
	<td colspan="4">
		<a href="#" onclick="addTableRow(); return false;"><span><?=$MSG['VinRequestModule']['msg80']?></span></a>
	</td>
</tr>
</table>
<table border="0" width="100%" class="web_ar_datagrid">

</table>

<script>

	function addTableRow() {
	
		pt 	= getElementById('partsTable');		
		row = pt.insertRow(pt.rows.length-1);
		
		for (i=0; i < pt.rows[1].cells.length; i++) {
		
			cell = row.insertCell(-1);
			cell.innerHTML = pt.rows[1].cells[i].innerHTML;
		
		}
					
	}
	
	function deleteTableRow(index) {
	
		pt 	= getElementById('partsTable');	
		pt.deleteRow(index);
	
	}
	
	addTableRow();

</script>
</div><?  ?>		<?		global $client;		?>		<? if ($client->isGuest) { ?>			<div id="registration_div">				<div class="ar_form">					<table class="web_ar_datagrid" cellpadding="3">						<? $registration = & $vin_requests; ?>						<?  ?><? if ($registration['fields']['company']['html'] or $registration['fields']['is_organization']['html']) { ?>
<tbody id="tr_registration_person_type">
<tr id="tr_reg_prs_tp_cpt">
	<td colspan="2"><h2><?= $MSG['RegistrationModule']['msg96'] ?></h2></td>
</tr>
<tr id="tr_is_organization">
	<td colspan="2" class="fname"><?= $registration['fields']['is_organization']['html'] ?></td>
</tr>
</tbody>
<tbody id="companyName">

<? if ($registration['fields']['company']) { ?>

	<tr id="tr_company">
		<td class="fname"><span class="form_required_field"><?= $registration['fields']['company']['caption'] ?></span>
		</td>
		<td class="fvalue"><?= $registration['fields']['company']['html'] ?></td>
	</tr>

<? } ?>

</tbody>
<? } ?>

<? if ($hideContactFields != 1) { ?>

	<tr id="tr_reg_cnt_inf_cpt">
		<td colspan="2"><h2><?= $MSG['RegistrationModule']['msg56'] ?></h2></td>
	</tr>

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

	<?  ?><?
$arConfigFields = [
	'contact_surname',
	'contact_first_name',
	'contact_patronymic_name',
	['contact_phone', 'fax'],
	'mobile_phone',
	'cst_email',
	['cst_icq', 'cst_skype'],
];
?><?  ?>

	<? $universalForm = &$registration; ?>
	<?  ?>
<? foreach ($arConfigFields as $configField) { ?>
	<? if (is_array($configField)) { ?>
		<? foreach ($configField as $subKey => $subField) { ?>
			<? if (!$universalForm['fields'][$subField]) { ?>
				<? unset($configField[$subKey]); ?>
			<? } ?>
		<? } ?>
		<? if (empty($configField)) { ?>
			<? continue; ?>
		<? } ?>
		<? if (count($configField) == 1) { ?>
			<? $configField = array_pop($configField); ?>
		<? } else { ?>
		<? } ?>
	<? } ?>
	<? if (is_array($configField)) { ?>
		<tr id="tr_is_<?=$configField?>">
			<td class="fname"><?= $universalForm['fields'][$configField[0]]['caption'] ?>, <?=$universalForm['fields'][$configField[1]]['caption']?></td>
			<td class="fvalue">
				<table>
					<tr>
						<td class="fvalue_child"><?= $universalForm['fields'][$configField[0]]['html'] ?></td>
						<td class="fvalue_child"><?= $universalForm['fields'][$configField[1]]['html'] ?></td>
					</tr>
				</table>
			</td>
		</tr>
	<? } else { ?>
		<? if ($universalForm['fields'][$configField]) { ?>
			<tr id="tr_<?=$configField?>">
				<td class="fname"><?= $universalForm['fields'][$configField]['caption'] ?></td>
				<td class="fvalue"><?= $universalForm['fields'][$configField]['html'] ?></td>
			</tr>
		<? } ?>
	<? } ?>
<? } ?>
<?  ?>

<? } ?><?  ?>						<tr id="tr_stc_id">							<td class="fname"><?= $registration['fields']['stc_id']['caption'] ?></td>							<td class="fvalue">								<div id="combo_stc_id"><?= $registration['fields']['stc_id']['html'] ?></div>							</td>						</tr>						<?  ?><? if ($registration['fields']['userlogin'] or $registration['fields']['userpassword']) { ?>

<tr id="tr_registration_user_login"><td colspan="2"><h2><?=$MSG['RegistrationModule']['msg60']?></h2></td></tr>

<? if ($registration['fields']['userlogin']) { ?>
<tr id="tr_userlogin"><td class="fname"><?=$registration['fields']['userlogin']['caption']?></td>
<td class="fvalue"><?=$registration['fields']['userlogin']['html']?></td></tr>
<? } ?>

<? if ($registration['fields']['userpassword']) { ?>
<tr id="tr_userpassword"><td class="fname"><?=$registration['fields']['userpassword']['caption']?>
<? if ($registration['fields']['userpassword']['caption']) { ?>
, <?=$registration['fields']['userpassword_repeat']['caption']?>
<? } ?>
</td>
	<td class="fvalue">
	<table>
		<tr>
			<td class="fvalue_child"><?=$registration['fields']['userpassword']['html']?></td>
			<td class="fvalue_child"><?=$registration['fields']['userpassword_repeat']['html']?></td>
		</tr>
	</table>
	</td>
</tr>
<? } ?>

<? } elseif ($registration['fields']['__cst_id__']) { ?>

	<?=$registration['fields']['__cst_id__']['html']?>

<? } ?><?  ?>						<tr id="tr_reg_hc_code">							<td class="fname"><?= $registration['fields']['reg_hc_code']['caption'] ?></td>							<td class="fvalue">								<table>									<tr>										<td class="fvalue_child"><?= $registration['fields']['reg_hc_code']['html'] ?></td>										<td class="fvalue_child"><?= $registration['fields']['reg_hc_image']['html'] ?></td>									</tr>								</table>							</td>						</tr>						<tr>							<td class="fname"></td>							<td class="fvalue"><br/><?= $registration['fields']['vin_send']['html'] ?></td>						</tr>					</table>				</div>			</div>		<? } else { ?>			<div class="ar_form">			<table class="vin_form" id="vin_form_contact_data">				<tr>					<td class="fname"><?= $vin_requests['fields']['contact']['caption'] ?></td>					<td class="fvalue"><?= $vin_requests['fields']['contact']['html'] ?></td>				</tr>				<tr>					<td class="fname"><?= $vin_requests['fields']['phone']['caption'] ?></td>					<td class="fvalue"><?= $vin_requests['fields']['phone']['html'] ?></td>				</tr>				<tr>					<td class="fname"><?= $vin_requests['fields']['email']['caption'] ?></td>					<td class="fvalue"><?= $vin_requests['fields']['email']['html'] ?></td>				</tr>				<tr>					<td class="fname"></td>					<td class="fvalue"><?= $vin_requests['fields']['vin_send']['html'] ?></td>				</tr>			</table>			</div>		<? } ?>		<?= $vin_requests['fields']['subj']['html'] ?>		<?= $vin_requests['fields']['_prid']['html'] ?>		<?= $vin_requests['fields']['date_received']['html'] ?>		<?= $vin_requests['fields']['cst_id']['html'] ?>		<?= $vin_requests['fields']['csc_id']['html'] ?>	</form></div><?  ?>

<? } ?>