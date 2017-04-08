<h1><?=$MSG['VinRequestModule']['msg70']?></h1>

<? if ($vin_requests['messages']['vin_success']) { ?>
	
	<?=$vin_requests['messages']['vin_success']?>

<? } else { ?>
	
	<?  ?><?
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
</div><?  ?>
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
</div><?  ?>
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

<? } ?><?  ?>

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

<? } ?><?  ?>

<? } ?>