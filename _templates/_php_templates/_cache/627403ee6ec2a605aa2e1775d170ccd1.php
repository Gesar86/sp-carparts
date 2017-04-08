<h1><?=($MSG['RegistrationModule']['msg62'])?></h1>
<div id="registration_div">
<? if ($registration['messages']['registration_error_fields']) { ?>

	<?  ?><div class="error">
<?=$MSG['RegistrationModule']['msg63']?>
<?=$MSG['RegistrationModule']['msg66']?>
<?=($registration['messages']['registration_error_companyname_needed']?$MSG['RegistrationModule']['msg85']:'')?>
<?=($registration['messages']['registration_error_contact_first_name']?$MSG['RegistrationModule']['msg70']:'')?>
<?=($registration['messages']['registration_error_contact_patronymic_name']?$MSG['RegistrationModule']['msg86']:'')?>
<?=($registration['messages']['registration_error_contact_surname']?$MSG['RegistrationModule']['msg71']:'')?>
<?=($registration['messages']['registration_error_cst_city_name']?$MSG['RegistrationModule']['msg72']:'')?>
<?=($registration['messages']['registration_error_cst_city_code']?$MSG['RegistrationModule']['msg73']:'')?>
<?=($registration['messages']['registration_error_contact_phone']?$MSG['RegistrationModule']['msg74']:'')?>
<?=($registration['messages']['registration_error_incorect_contact_phone']?'<p><span id="form_required_field">' . tr('Данный контактный телефон уже используется на сайте.', 'RegistrationModule') . '</span></p>':'')?>
<?=($registration['messages']['registration_error_fax']?$MSG['RegistrationModule']['msg87']:'')?>
<?=($registration['messages']['registration_error_working_phone']?$MSG['RegistrationModule']['msg88']:'')?>
<?=($registration['messages']['registration_error_mobile_phone']?$MSG['RegistrationModule']['msg89']:'')?>
<?=($registration['messages']['registration_error_cst_email']?$MSG['RegistrationModule']['msg75']:'')?>
<?=($registration['messages']['registration_error_incorrect_email']?$MSG['RegistrationModule']['msg83']:'')?>
<?=($registration['messages']['registration_error_cst_icq']?$MSG['RegistrationModule']['msg90']:'')?>
<?=($registration['messages']['registration_error_cst_skype']?$MSG['RegistrationModule']['msg91']:'')?>
<?=($registration['messages']['registration_error_cst_csa_id']?$MSG['RegistrationModule']['msg76']:'')?>
<?=($registration['messages']['registration_error_pmk_id']?$MSG['RegistrationModule']['msg77']:'')?>
<?=($registration['messages']['registration_error_stc_id']?$MSG['RegistrationModule']['msg78']:'')?>
<?=($registration['messages']['registration_error_userlogin']?$MSG['RegistrationModule']['msg79']:'')?>
<?=($registration['messages']['registration_error_userpassword']?$MSG['RegistrationModule']['msg80']:'')?>
<?=($registration['messages']['registration_error_userpassword_repeat']?$MSG['RegistrationModule']['msg81']:'')?>
<?=($registration['messages']['registration_error_passwords_mismatch']?$MSG['RegistrationModule']['msg82']:'')?>
<?=($registration['messages']['registration_error_reg_hc_code']?$MSG['RegistrationModule']['msg83']:'')?>
<?=($registration['messages']['human_check_error']?$MSG['RegistrationModule']['msg65']:'')?>
<?=($registration['messages']['registration_error']?$MSG['RegistrationModule']['msg64']:'')?>
<?=($registration['messages']['registration_error_email']?$MSG['RegistrationModule']['msg69']:'')?>
</div>	<?  ?>

<? } elseif ($registration['messages']['registration_empty']) { ?>
	
	<?  ?><div class="error">
	<?=$MSG['RegistrationModule']['msg63']?>
	<?=$MSG['RegistrationModule']['msg66']?>
</div><?  ?>

<? } ?>

<? if ($registration['messages']['registration_success']) { ?>

	<?  ?><?=$MSG['RegistrationModule']['msg67']?>
<?=($registration['messages']['activation_code']?$MSG['RegistrationModule']['msg92']:'')?><?  ?>

<? } else { ?>

	<?  ?><?=$MSG['RegistrationModule']['msg61']?>
<p><?=$MSG['RegistrationModule']['msg68']?> <a href="mailto:<?=$admin_email?>"><?=$admin_email?></a></p>

<? if ($_interface->csActivationRequired) { ?>
<div id="registration_tabs" class="flc">
	<ul>
		<li class="tab_active"><?=$MSG['RegistrationModule']['msg93']?><span class="tab_act"></span></li>
		<li><?=$MSG['RegistrationModule']['msg94']?><span class="tab_act"></span></li>
		<li><?=$MSG['RegistrationModule']['msg95']?><span class="tab_act"></span></li>
	</ul>
</div>
<? } ?>

<div class="ar_form">
	<?  ?><?=$registration['validationScript']?>
<form id="<?=$registration['name']?>" name="<?=$registration['name']?>" action="<?=$registration['action']?>" method="<?=$registration['method']?>" onsubmit="<?=$registration['onsubmit']?>">

<?=$registration['fields']['subj']['html']?>
<?=$registration['fields']['_prid']['html']?>
<?=$registration['fields']['cst_created']['html']?>
		
<table class="web_ar_datagrid" cellpadding="3">

<?  ?><? if ($registration['fields']['company']['html'] or $registration['fields']['is_organization']['html']) { ?>
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

<?  ?><tr id="tr_registration_client_data">
	<td colspan="2"><h2><?= $MSG['RegistrationModule']['msg58'] ?></h2></td>
</tr>

<tr id="tr_cst_csa_id">
	<td class="fname"><?= $registration['fields']['cst_csa_id']['caption'] ?></td>
	<td class="fvalue"><?= $registration['fields']['cst_csa_id']['html'] ?></td>
</tr>

<tr id="tr_stc_id">
	<td class="fname"><?= $registration['fields']['stc_id']['caption'] ?></td>
	<td class="fvalue">
		<div id="combo_stc_id"><?= $registration['fields']['stc_id']['html'] ?></div>
	</td>
</tr>

<? if (!$_interface->csActivationRequired) { ?>
	<? if ($registration['fields']['dlv_id']) { ?>
	<tr id="tr_dlv_id">
		<td class="fname"><?= $registration['fields']['dlv_id']['caption'] ?></td>
		<td class="fvalue"><div id="combo_add_dlv_id"><?= $registration['fields']['dlv_id']['html'] ?></div></td>
	</tr>
	<? } ?>
	<? if ($registration['fields']['pmk_id']) { ?>
	<tr id="tr_pmk_id">
		<td class="fname"><?= $registration['fields']['pmk_id']['caption'] ?></td>
		<td class="fvalue"><div id="combo_pmk_id"><?= $registration['fields']['pmk_id']['html'] ?></div></td>
	</tr>
	<? } ?>
	<tr id="tr_news_subscription">
		<td class="fname"><?= $registration['fields']['news_subscription']['caption'] ?></td>
		<td class="fvalue">
			<table border="0">
				<tr>
					<td class="fvalue"><?= $registration['fields']['news_subscription']['html'] ?></td>
					<td class="fvalue"><?= $registration['fields']['notify_subscription']['html'] ?></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr id="tr_sms_notify_subscription">
		<td class="fname"><?= $registration['fields']['sms_notify_subscription']['caption'] ?></td>
		<td class="fvalue">
			<table border="0">
				<tr>
					<td class="fvalue"><?= $registration['fields']['sms_notify_subscription']['html'] ?></td>
					<td class="fvalue"></td>
				</tr>
			</table>
		</td>
	</tr>
<? } ?>

<? if ($registration['fields']['fake_percent']) { ?>

	<tr id="tr_fake_percent">
		<td class="fname"><?= $registration['fields']['fake_percent']['caption'] ?><br/>
			<small><i><?= $MSG['RegistrationModule']['msg59'] ?></i></small>
		</td>
		<td class="fvalue"><?= $registration['fields']['fake_percent']['html'] ?></td>
	</tr>

<? } ?><?  ?>

<?  ?><? if ($registration['fields']['userlogin'] or $registration['fields']['userpassword']) { ?>

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

<tr id="tr_reg_hc_code"><td class="fname"><?=$registration['fields']['reg_hc_code']['caption']?></td>
<td class="fvalue">
	<table>
		<tr>
			<td class="fvalue_child"><?=$registration['fields']['reg_hc_code']['html']?></td>
			<td class="fvalue_child"><?=$registration['fields']['reg_hc_image']['html']?></td>
		</tr>
	</table>
</td></tr>

<tr id="tr_register">
	<td class="fname"></td>
	<td class="fvalue"><br /><?=$registration['fields']['register']['html']?></td>
</tr>

</table>

</form><?  ?>
</div><?  ?>

<? } ?>
</div>