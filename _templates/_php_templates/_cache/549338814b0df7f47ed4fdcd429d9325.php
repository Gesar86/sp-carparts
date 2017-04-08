<? if ($personal['messages']) { ?>

	<?  ?><?=($personal['messages']['success_message']?$personal['messages']['success_message']:'')?>
<?=($personal['messages']['success_password']?$personal['messages']['success_password']:'')?><?  ?>

<? } elseif ($personal['name'] == 'registration') { ?>

	<? $registration = & $personal; ?>

	<?  ?><h1><?=$MSG['PersonalInfoModule']['msg44']?></h1>

<div class="flc">
	<? if ($_interface->csRestrictDataChange == true) { ?>
	<div id="lk_warning" class="leftside">
		<?=$MSG['PersonalInfoModule']['msg48']?>
	</div>
	<? } ?>
	<div id="manager_message" class="leftside">
		<?=$MSG['PersonalInfoModule']['msg49']?> <?=$stockInfo['fullname']?><br />
		<a href="mailto:<?=$stockInfo['email']?>"><?=$MSG['PersonalInfoModule']['msg50']?></a>
	</div>
</div>

<div class="ar_form">

<? if ($_interface->csRestrictDataChange != true) { ?>

<?=$registration['validationScript']?>
<form id="<?=$registration['name']?>" name="<?=$registration['name']?>" action="<?=$registration['action']?>" method="<?=$registration['method']?>" onsubmit="<?=$registration['onsubmit']?>">

<?=$registration['fields']['subj']['html']?>
<?=$registration['fields']['_prid']['html']?>

<table class="web_ar_datagrid" cellpadding="3">

<?  ?><tr><td class="fname" colspan="2"><p><a href="/shop/personal/info.html"><?=$MSG['PersonalInfoModule']['msg14']?></a></p></td></tr>

<tbody id="companyName">

<? if ($registration['fields']['company']) { ?>
	
	<tr><td class="fname"><span class="form_required_field"><?=$registration['fields']['company']['caption']?></span></td>
	<td class="fvalue"><?=$registration['fields']['company']['html']?></td></tr>

<? } ?>

</tbody>

<? if ($hideContactFields != 1) { ?>

	<? $address_form = &$registration; ?>
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
	
	<tr><td class="fname"><?=$registration['fields']['contact_surname']['caption']?></td>
	<td class="fvalue"><?=$registration['fields']['contact_surname']['html']?></td></tr>
	
	<tr><td class="fname"><?=$registration['fields']['contact_first_name']['caption']?></td>
	<td class="fvalue"><?=$registration['fields']['contact_first_name']['html']?></td></tr>

	<tr><td class="fname"><?=$registration['fields']['contact_patronymic_name']['caption']?></td>
	<td class="fvalue"><?=$registration['fields']['contact_patronymic_name']['html']?></td></tr>

	<tr><td class="fname"><?=$registration['fields']['contact_phone']['caption']?>, <?=$registration['fields']['fax']['caption']?></td>
	<td class="fvalue">
		<table>
			<tr>
				<td class="fvalue_child"><?=$registration['fields']['contact_phone']['html']?></td>
				<td class="fvalue_child"><?=$registration['fields']['fax']['html']?></td>
			</tr>
		</table>
	</td>
	</tr>

	<tr><td class="fname"><?=$registration['fields']['mobile_phone']['caption']?></td>
	<td class="fvalue"><?=$registration['fields']['mobile_phone']['html']?></td></tr>

	<tr><td class="fname"><?=$registration['fields']['cst_email']['caption']?></td>
	<td class="fvalue"><?=$registration['fields']['cst_email']['html']?></td></tr>
	
	<tr><td class="fname"><?=$registration['fields']['cst_icq']['caption']?>, <?=$registration['fields']['cst_skype']['caption']?></td>
	<td class="fvalue">
		<table>
			<tr>
				<td class="fvalue_child"><?=$registration['fields']['cst_icq']['html']?></td>
				<td class="fvalue_child"><?=$registration['fields']['cst_skype']['html']?></td>
			</tr>
		</table>
	</td>
	</tr>

<? } ?><?  ?>

<tr>
	<td class="fname"></td>
	<td class="fvalue"><br /><?=$registration['fields']['register']['html']?></td>
</tr>

</table>

</form>

<? } else { ?>

<table class="web_ar_datagrid view_table" cellpadding="0">

<?  ?><tr><td class="fname" colspan="2"><p><a href="/shop/personal/info.html"><?=$MSG['PersonalInfoModule']['msg14']?></a></p></td></tr>

<? if ($registration['fields']['company']) { ?>
	
	<tr>
		<td class="fname"><nobr><?=$registration['fields']['company']['caption']?></nobr></td>
		<td class="fvalue"><?=$registration['sourceFields']['company']['instance']->items[$registration['sourceFields']['company']['instance']->value[0]]?></td>
	</tr>

<? } ?>

<? if ($hideContactFields != 1) { ?>

	<tr>
		<td class="fname"><nobr><?=$registration['fields']['add_recipient_name']['caption']?></nobr></td>
		<td class="fvalue"><?=$registration['sourceFields']['add_recipient_name']['instance']->items[$registration['sourceFields']['add_recipient_name']['instance']->value[0]]?></td>
	</tr>

	<tr>
		<td class="fname"><nobr><?=$registration['fields']['add_country_id']['caption']?></nobr></td>
		<td class="fvalue"><?=$registration['sourceFields']['add_country_id']['instance']->items[$registration['sourceFields']['add_country_id']['instance']->value[0]]?></td>
	</tr>

	<tr>
		<td class="fname"><nobr><?=$registration['fields']['add_region_id']['caption']?></nobr></td>
		<td class="fvalue"><div id="combo_add_region_id"><?=$registration['sourceFields']['add_region_id']['instance']->items[$registration['sourceFields']['add_region_id']['instance']->value[0]]?></div></td>
	</tr>

	<tr>
		<td class="fname"><nobr><?=$registration['fields']['add_city_id']['caption']?></nobr></td>
		<td class="fvalue"><div id="combo_add_city_id"><?=$registration['sourceFields']['add_city_id']['instance']->items[$registration['sourceFields']['add_city_id']['instance']->value[0]]?></div></td>
	</tr>
	
	<tr><td class="fname"><?=$registration['fields']['contact_surname']['caption']?></td>
	<td class="fvalue"><?=$registration['sourceFields']['contact_surname']['instance']->value?></td></tr>
	
	<tr><td class="fname"><?=$registration['fields']['contact_first_name']['caption']?></td>
	<td class="fvalue"><?=$registration['sourceFields']['contact_first_name']['instance']->value?></td></tr>

	<tr><td class="fname"><?=$registration['fields']['contact_patronymic_name']['caption']?></td>
	<td class="fvalue"><?=$registration['sourceFields']['contact_patronymic_name']['instance']->value?></td></tr>

	<tr><td class="fname"><?=$registration['fields']['contact_phone']['caption']?>, <?=$registration['fields']['fax']['caption']?></td>
	<td class="fvalue">
		<table>
			<tr>
				<td class="fvalue_child"><?=$registration['sourceFields']['contact_phone']['instance']->value?></td>
				<td class="fvalue_child"><?=$registration['sourceFields']['fax']['instance']->value?></td>
			</tr>
		</table>
	</td>
	</tr>

	<tr><td class="fname"><?=$registration['fields']['mobile_phone']['caption']?></td>
	<td class="fvalue"><?=$registration['sourceFields']['mobile_phone']['instance']->value?></td></tr>

	<tr><td class="fname"><?=$registration['fields']['cst_email']['caption']?></td>
	<td class="fvalue"><?=$registration['sourceFields']['cst_email']['instance']->value?></td></tr>
	
	<tr><td class="fname"><?=$registration['fields']['cst_icq']['caption']?>, <?=$registration['fields']['cst_skype']['caption']?></td>
	<td class="fvalue">
		<table>
			<tr>
				<td class="fvalue_child"><?=$registration['sourceFields']['cst_icq']['instance']->value?></td>
				<td class="fvalue_child"><?=$registration['sourceFields']['cst_skype']['instance']->value?></td>
			</tr>
		</table>
	</td>
	</tr>

<? } ?><?  ?>

</table>

<? } ?>
</div><?  ?>

<? } elseif ($personal['name'] == 'passwordForm') { ?>
	<? if (empty($csStrictRegistration)) {
		 ?><h1><?=$MSG['PersonalInfoModule']['msg45']?></h1>

<div class="ar_form">
<?=$personal['validationScript']?>
<form id="<?=$personal['id']?>" name="<?=$personal['name']?>" action="<?=$personal['action']?>" method="<?=$personal['method']?>" onsubmit="<?=$personal['onsubmit']?>">

<table border="0">
	<tr>
		<td class="fname" colspan="2">
		<p><a href="/shop/personal/info.html"><?=$MSG['PersonalInfoModule']['msg14']?></a></p>
		</td>
	</tr>
	<tr>
		<td class="fname">
		<?=$personal['fields']['userpassword_old']['caption']?>
		</td>
		<td class="fvalue">
		<?=$personal['fields']['userpassword_old']['html']?>
		</td>
	</tr>
	<tr>
		<td class="fname">
		<?=$personal['fields']['userpassword_new']['caption']?>
		</td>
		<td class="fvalue">
		<?=$personal['fields']['userpassword_new']['html']?>
		</td>
	</tr>
	<tr>
		<td class="fname">
		<?=$personal['fields']['userpassword_new_repeat']['caption']?>
		</td>
		<td class="fvalue">
		<?=$personal['fields']['userpassword_new_repeat']['html']?>
		</td>
	</tr>
	<tr>
		<td class="fname">
		
		</td>
		<td class="fvalue">
		<?=$personal['fields']['save_password']['html']?>
		</td>
	</tr>	
</table>

<?=$personal['fields']['subj']['html']?>
<?=$personal['fields']['_prid']['html']?>

</form>
</div><? 
	} else {
		echo $csStrictRegistration;
	}
	?>
<? } elseif ($personal['name'] == 'paydel') { ?>

	<?  ?><h1><?=$MSG['PersonalInfoModule']['msg47']?></h1>

<div class="ar_form">
<?=$personal['validationScript']?>
<form id="<?=$personal['id']?>" name="<?=$personal['name']?>" action="<?=$personal['action']?>" method="<?=$personal['method']?>" onsubmit="<?=$personal['onsubmit']?>">

<table border="0">
	<tr id="tr_go_lk">
		<td class="fname" colspan="2">
		<p><a href="/shop/personal/info.html"><?=$MSG['PersonalInfoModule']['msg14']?></a></p>
		</td>
	</tr>
	<tr id="tr_pmk_id">
		<td class="fname">
		<?=$personal['fields']['pmk_id']['caption']?>
		</td>
		<td class="fvalue">
		<?=$personal['fields']['pmk_id']['html']?>
		</td>
	</tr>
	<tr id="tr_dlv_id">
		<td class="fname">
		<?=$personal['fields']['dlv_id']['caption']?>
		</td>
		<td class="fvalue">
		<?=$personal['fields']['dlv_id']['html']?>
		</td>
	</tr>
	<tr id="tr_fake_percent">
		<td class="fname">
		<?=$personal['fields']['fake_percent']['caption']?>
		</td>
		<td class="fvalue">
		<?=$personal['fields']['fake_percent']['html']?>
		</td>
	</tr>
	<tr id="tr_register">
		<td class="fname">
		
		</td>
		<td class="fvalue">
		<?=$personal['fields']['register']['html']?>
		</td>
	</tr>	
</table>

<?=$personal['fields']['subj']['html']?>
<?=$personal['fields']['_prid']['html']?>

</form>
</div><?  ?>

<? } elseif ($personal['name'] == 'notifies') { ?>

	<?  ?><h1><?=$MSG['PersonalInfoModule']['msg51']?></h1>

<div class="ar_form">
<?=$personal['validationScript']?>
<form id="<?=$personal['id']?>" name="<?=$personal['name']?>" action="<?=$personal['action']?>" method="<?=$personal['method']?>" onsubmit="<?=$personal['onsubmit']?>">

<table border="0">
	<tr>
		<td class="fname" colspan="2">
		<p><a href="/shop/personal/info.html"><?=$MSG['PersonalInfoModule']['msg14']?></a></p>
		</td>
	</tr>
	<tr><td class="fname"><?=$personal['fields']['news_subscription']['caption']?></td>
		<td class="fvalue">

		<table border="0">

		<tr>
			<td class="fvalue"><?=$personal['fields']['news_subscription']['html']?></td>
			<td class="fvalue"><?=$personal['fields']['notify_subscription']['html']?></td>
		</tr>

		</table>

		</td>	

	</tr>

	<tr><td class="fname"><?=$personal['fields']['sms_notify_subscription']['caption']?></td>
			
		<td class="fvalue">

		<table border="0">

		<tr>
			<td class="fvalue"><?=$personal['fields']['sms_notify_subscription']['html']?></td>
			<td class="fvalue"></td>
		</tr>

		</table>

		</td>	

	</tr>
	<tr>
		<td class="fname">
		
		</td>
		<td class="fvalue">
		<?=$personal['fields']['register']['html']?>
		</td>
	</tr>	
</table>

<?=$personal['fields']['subj']['html']?>
<?=$personal['fields']['_prid']['html']?>

</form>
</div><?  ?>

<? } else { ?>

	<?  ?><h1><?= $MSG['PersonalInfoModule']['msg43'] ?></h1>
<div id="lk_div" class="flc">

	<div id="lk_links_div" class="leftside">

		<div class="lk_info">
			<div class="lk_caption" style="background-image:url(/images/lk_basket.png);"><a href="/shop/basket.html"><?= $MSG['PersonalInfoModule']['msg52'] ?></a></div>
			<div class="lk_basket">
				<?= $MSG['PersonalInfoModule']['msg53'] ?>: <span><?= $eshopBasket->waresCount() ?></span>
				<?= $MSG['PersonalInfoModule']['msg54'] ?>:
				<span><?= $eshopBasket->getSumm($eshopBasket->money->money[$_interface->displayedCurInfo['id']], (float)$eshopClient->fake_percent != 0 ? (100 + $eshopClient->fake_percent) / 100 : 1) ?></span>
			</div>
		</div>

		<div class="lk_info">
			<div class="lk_caption" style="background-image:url(/images/lk_account.png);"><?= $MSG['PersonalInfoModule']['msg55'] ?></div>
			<div class="flc">
				<ul>
					<li><?= $contactsLink ?></li>
					<li><?= $changePassword ?></li>
					<li><?= $changePayDelLink ?></li>
					<li><?= $changeNotifies ?></li>
					<li><a href="/shop/personal/payers.html"><?= $MSG['PersonalInfoModule']['msg56'] ?></a></li>
					<li><a href="/shop/personal/cars.html"><?= $MSG['PersonalInfoModule']['msg57'] ?></a></li>
					<li><a href="/shop/personal/delivery.html"><?= $MSG['PersonalInfoModule']['msg58'] ?></a></li>
				</ul>
			</div>
		</div>

		<div class="lk_info">
			<div class="lk_caption" style="background-image:url(/images/lk_orders.png);"><?= $MSG['PersonalInfoModule']['msg59'] ?></div>
			<div class="flc">
				<ul>
					<li><a href="/shop/myorders.html"><?= $MSG['PersonalInfoModule']['msg60'] ?></a></li>
					<li><a href="/shop/documents.html"><?= $MSG['PersonalInfoModule']['msg61'] ?></a></li>
					<li><a href="/shop/balance.html"><?= $MSG['PersonalInfoModule']['msg62'] ?></a></li>
				</ul>
			</div>
		</div>

		<div class="lk_info">
			<div class="lk_caption" style="background-image:url(/images/lk_vin.png);"><?= $MSG['PersonalInfoModule']['msg63'] ?></div>
			<div class="flc">
				<ul>
					<li><a href="/vin/form.html"><?= $MSG['PersonalInfoModule']['msg64'] ?></a></li>
					<li><a href="/shop/vin_requests.html"><?= $MSG['PersonalInfoModule']['msg65'] ?></a></li>
				</ul>
			</div>
		</div>

		<div class="lk_info">
			<div class="lk_caption" style="background-image:url(/images/lk_help.png);"><?= $MSG['PersonalInfoModule']['msg66'] ?></div>
			<div class="flc">
				<ul>
					<li><a href="#"><?= $MSG['PersonalInfoModule']['msg67'] ?></a></li>
					<li><a href="/message/"><?= $MSG['PersonalInfoModule']['msg68'] ?></a></li>
				</ul>
			</div>
		</div>

	</div>

	<div id="lk_rightinfo" class="leftside">

		<div id="lk_rinfo">
			<div class="lk_caption" style="background-image:url(/images/lk_info.png);"><?= $MSG['PersonalInfoModule']['msg69'] ?></div>
			<div class="flc">
				<div class="leftside iname"><?= $MSG['PersonalInfoModule']['msg70'] ?></div>
				<div class="leftside ivalue"><?= $eshopClient->cst_id ?></div>
			</div>
			<div class="flc" id="div_cst_name">
				<div class="leftside iname"><?= $MSG['PersonalInfoModule']['msg71'] ?></div>
				<div class="leftside ivalue"><?= $eshopClient->name ?></div>
			</div>
			<div class="flc" id="div_cst_fake_percent">
				<div class="leftside iname"><?= $MSG['PersonalInfoModule']['msg72'] ?></div>
				<div class="leftside ivalue"><?= (float)$eshopClient->fake_percent ?>%</div>
			</div>
			<div class="flc" id="div_mng_fullname">
				<div class="leftside iname"><?= $MSG['PersonalInfoModule']['msg73'] ?></div>
				<div class="leftside ivalue"><?= $stockInfo['fullname'] ?></div>
			</div>
			<div class="flc" id="div_stc_name">
				<div class="leftside iname"><?= $MSG['PersonalInfoModule']['msg74'] ?></div>
				<div class="leftside ivalue"><?= $stockInfo['stc_name'] ?></div>
			</div>
			<div class="flc" id="div_cst_max_debt">
				<div class="leftside iname"><?= $MSG['PersonalInfoModule']['msg75'] ?></div>
				<div class="leftside ivalue"><?= $eshopClient->max_debt ?></div>
			</div>
		</div>

		<div id="lk_rcontacts">
			<div class="lk_caption" style="background-image:url(/images/lk_contacts.png);"><?= $MSG['PersonalInfoModule']['msg76'] ?>
				<div id="lk_edit_link"><?= $changeLink ?></div>
			</div>
			<div class="flc" id="div_contact_surname">
				<div class="leftside iname"><?= $MSG['PersonalInfoModule']['msg77'] ?></div>
				<div class="leftside ivalue"><?= ($eshopClient->contact_surname . ' ' . $eshopClient->contact_first_name . ' ' . $eshopClient->contact_patronymic_name) ?></div>
			</div>
			<div class="flc" id="div_mobile_phone">
				<div class="leftside iname"><?= $MSG['PersonalInfoModule']['msg78'] ?></div>
				<div class="leftside ivalue">
					<span><?= $eshopClient->contact_phone ?><?= ($eshopClient->mobile_phone ? '<br />' . $eshopClient->mobile_phone : '') ?></span>
				</div>
			</div>
			<div class="flc" id="div_cst_email">
				<div class="leftside iname"><?= $MSG['PersonalInfoModule']['msg79'] ?></div>
				<div class="leftside ivalue">
					<a href="mailto:<?= $eshopClient->cst_email ?>"><?= $eshopClient->cst_email ?></a></div>
			</div>
			<div class="flc" id="div_cst_icq">
				<div class="leftside iname"><?= $MSG['PersonalInfoModule']['msg80'] ?></div>
				<div class="leftside ivalue"><?= $eshopClient->cst_icq ?></div>
			</div>
			<div class="flc" id="div_cst_skype">
				<div class="leftside iname"><?= $MSG['PersonalInfoModule']['msg81'] ?></div>
				<div class="leftside ivalue"><?= $eshopClient->cst_skype ?></div>
			</div>
		</div>

	</div>

</div><?  ?>

<? } ?>