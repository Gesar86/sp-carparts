<h1><?=$MSG['PayersModule']['msg28']?></h1>
<?if(!is_array($customer_payer)):?>
	<?=$customer_payer; return?>
<?endif?>

<? if ((is_array($customer_payer)) && ($customer_payer['messages'])) { ?>

	<? if ($customer_payer['messages']['edit_success']) { ?>
	
		<?=$MSG['PayersModule']['msg34']?>
		
	<? } elseif ($customer_payer['messages']['delete_success']) { ?>
	
		<?=$MSG['PayersModule']['msg35']?>
		
	<? } else { ?>

		<? $process_messages = &$customer_payer; ?>
		<?  ?><? if (count($process_messages['messages']) > 0) {
	
	foreach($process_messages['messages'] as $message) {
		
		echo $message;
		
	}

} ?><?  ?>
	
	<? } ?>

<? } elseif ($customer_payer['name'] == 'customer_payer') { ?>
	
	<?  ?><div class="ar_form"><?= $customer_payer['validationScript'] ?><form id="<?= $customer_payer['id'] ?>" name="<?= $customer_payer['name'] ?>" action="<?= $customer_payer['action'] ?>" method="<?= $customer_payer['method'] ?>" onsubmit="<?= $customer_payer['onsubmit'] ?>"><?= $customer_payer['fields']['_prid']['html'] ?><?= $customer_payer['fields']['subj']['html'] ?><?= $customer_payer['fields']['__pyr_id__']['html'] ?><?= $customer_payer['fields']['pyr_cst_id']['html'] ?><? $lng = $customer_payer['sourceFields']['tradeLng']['instance']->value; ?><table border="0" class="ar_form"><tr>	<td class="fname">		<?= $customer_payer['fields']['pyr_jur_type']['caption'] ?>	</td>	<td class="fvalue">		<?= $customer_payer['fields']['pyr_jur_type']['html'] ?>	</td></tr><tbody class="fieldset" id="phys"><tr>	<td class="fname">		<div id="phys_caption"<?= ($customer_payer['sourceFields']['pyr_jur_type']['instance']->value[0] == 'J' ? ' style="display:none;"' : '') ?>>			<span id="form_required_field"><?= $MSG['PayersModule']['msg32'] ?></span>		</div>		<div id="jurd_caption"<?= ($customer_payer['sourceFields']['pyr_jur_type']['instance']->value[0] != 'J' ? ' style="display:none;"' : '') ?>>			<span id="form_required_field"><?= $MSG['PayersModule']['msg31'] ?></span>		</div>	</td>	<td class="fvalue">		<?= $customer_payer['fields']['pyr_name']['html'] ?>	</td></tr><tr>	<td class="fname">		<?= $customer_payer['fields']['pyr_address']['caption'] ?>	</td>	<td class="fvalue">		<?= $customer_payer['fields']['pyr_address']['html'] ?>	</td></tr><? if ($lng == 'lv') { ?><tr>	<td class="fname">		<?= $customer_payer['fields']['pyr_license_number']['caption'] ?>	</td>	<td class="fvalue">		<?= $customer_payer['fields']['pyr_license_number']['html'] ?>	</td></tr><tr>	<td class="fname">		<?= $customer_payer['fields']['pyr_pvn']['caption'] ?>	</td>	<td class="fvalue">		<?= $customer_payer['fields']['pyr_pvn']['html'] ?>	</td></tr><tr>	<td class="fname">		<?= $customer_payer['fields']['pyr_rs']['caption'] ?>	</td>	<td class="fvalue">		<?= $customer_payer['fields']['pyr_rs']['html'] ?>	</td></tr><? if ($customer_payer['fields']['selectBank']) { ?>	<tr>		<td class="fname">			<?= $customer_payer['fields']['selectBank']['caption'] ?>		</td>		<td class="fvalue">			<?= $customer_payer['fields']['selectBank']['html'] ?>		</td>	</tr><? } ?><tbody id="manual_bank_data"><tr>	<td colspan="2" align="center" class="fname">		<?= $MSG['PayersModule']['msg33'] ?>	</td></tr><tr>	<td class="fname">		<?= $customer_payer['fields']['pyr_bank']['caption'] ?>	</td>	<td class="fvalue">		<?= $customer_payer['fields']['pyr_bank']['html'] ?>	</td></tr><tr>	<td class="fname">		<?= $customer_payer['fields']['pyr_bik']['caption'] ?>	</td>	<td class="fvalue">		<?= $customer_payer['fields']['pyr_bik']['html'] ?>	</td></tr></tbody><? } else { ?>	<tr>		<td class="fname">			<?= $customer_payer['fields']['pyr_inn']['caption'] ?>		</td>		<td class="fvalue">			<?= $customer_payer['fields']['pyr_inn']['html'] ?>		</td>	</tr><? } ?><tbody id="jurd"><tr>	<td class="fname">		<?= $customer_payer['fields']['pyr_orf_id']['caption'] ?>	</td>	<td class="fvalue">		<?= $customer_payer['fields']['pyr_orf_id']['html'] ?>	</td></tr><? if ($lng == 'lv') { ?>	<tr>		<td class="fname">			<?= $customer_payer['fields']['pyr_jur_address']['caption'] ?>		</td>		<td class="fvalue">			<?= $customer_payer['fields']['pyr_jur_address']['html'] ?>		</td>	</tr><? } else { ?>	<tr>		<td class="fname">			<?= $customer_payer['fields']['pyr_jur_address']['caption'] ?>		</td>		<td class="fvalue">			<?= $customer_payer['fields']['pyr_jur_address']['html'] ?>		</td>	</tr>	<tr>		<td class="fname">			<?= $customer_payer['fields']['pyr_kpp']['caption'] ?>		</td>		<td class="fvalue">			<?= $customer_payer['fields']['pyr_kpp']['html'] ?>		</td>	</tr>	<tr>		<td class="fname">			<?= $customer_payer['fields']['pyr_bank']['caption'] ?>		</td>		<td class="fvalue">			<?= $customer_payer['fields']['pyr_bank']['html'] ?>		</td>	</tr>	<tr>		<td class="fname">			<?= $customer_payer['fields']['pyr_bik']['caption'] ?>		</td>		<td class="fvalue">			<?= $customer_payer['fields']['pyr_bik']['html'] ?>		</td>	</tr>	<tr>		<td class="fname">			<?= $customer_payer['fields']['pyr_rs']['caption'] ?>		</td>		<td class="fvalue">			<?= $customer_payer['fields']['pyr_rs']['html'] ?>		</td>	</tr>	<tr>		<td class="fname">			<?= $customer_payer['fields']['pyr_ks']['caption'] ?>		</td>		<td class="fvalue">			<?= $customer_payer['fields']['pyr_ks']['html'] ?>		</td>	</tr>	<tr>		<td class="fname">			<?= $customer_payer['fields']['pyr_okpo']['caption'] ?>		</td>		<td class="fvalue">			<?= $customer_payer['fields']['pyr_okpo']['html'] ?>		</td>	</tr>	<tr>		<td class="fname">			<?= $customer_payer['fields']['pyr_ogrn']['caption'] ?>		</td>		<td class="fvalue">			<?= $customer_payer['fields']['pyr_ogrn']['html'] ?>		</td>	</tr><? } ?></tbody></tbody><tr>	<td class="fname"></td>	<td class="fvalue">		<?= $customer_payer['fields']['send']['html'] ?>	</td></tr></table><script type="text/javascript">	window.addEvent('domready', function () {		<? if (empty($customer_payer['sourceFields']['pyr_jur_type']['instance']->value[0])) { ?>		$('phys').style.display = 'none';		<? } ?>		<? if ($customer_payer['sourceFields']['pyr_jur_type']['instance']->value[0] != 'J') { ?>		$('jurd').style.display = 'none';		<? } ?>		try {			$('selectBank').change();		} catch (e) {		}	});</script></form></div><?  ?>
	
<? } else { ?>
	
	<? if (count($customer_payer['data']) <= 1) {
	
		unset($customer_payer['header']['delete']);
		unset($customer_payer['data'][0]['delete']);
		
	} ?>
	
	<? $web_ar_datagrid = &$customer_payer; ?>
	<? if ($explicitRegistration) {
	
		$empty_message = $MSG['PayersModule']['msg30'];
		
	} else {
	
		$empty_message = $MSG['PayersModule']['msg29'];
		
	} ?>

	<? $data_align = array('left','left','left','left','left','left','left','left'); ?>
	<?  ?>
<div class="flc">
<? if (count($web_ar_datagrid['controls'])>0) { ?>
	<? $i=0; ?>
	<? foreach ($web_ar_datagrid['controls'] as $hdr_id=>$control) { ?>

		<? if ((empty($control_align[$i])) or ($control_align[$i] == 'top')) { ?>

		<div class="table_control <?=($hdr_id=='pagination'?'rightside':'leftside')?>"><?=$control?></div>
		
		<? } ?>
		
		<? $i++; ?>

	<? } ?>
<? } ?>
</div>

<? if ((count($web_ar_datagrid['data']) > 0) or (empty($empty_message))) { ?>
	
	
	<? if (!empty($PHP_TEMPLATE['captionFilter_'.$web_ar_datagrid['info']['name']])) { ?>

		<? $captionFilter = &$PHP_TEMPLATE['captionFilter_'.$web_ar_datagrid['info']['name']]; ?>
		
		<?=$captionFilter['validationScript']?>
		<form id="<?=$captionFilter['id']?>" name="<?=$captionFilter['name']?>" action="<?=$captionFilter['action']?>" method="<?=$captionFilter['method']?>" onsubmit="<?=$captionFilter['onsubmit']?>">
		
		<? if (!$captionFilter['object']->settings['submitInTable']) { ?>
		
			<div class="table_filter_control flc">
				<div class="rightside">
					<?=$captionFilter['fields']['filterSubmit_'.$web_ar_datagrid['info']['name']]['html']?>
				</div>
			</div>
		
		<? } else { ?>
		
			<? foreach ($web_ar_datagrid['header'] as $hdr_id=>$column) {	?>
				
				<? if ($column['visible'] != '1') continue; ?>
				<? $last_hdr_id = $hdr_id; ?>
					
			<? } ?>
		
		<? } ?>
		
	<? } ?>

	<table class="web_ar_datagrid <?=$web_ar_datagrid['info']['name']?>" width="100%">
		<tr>
		<? $col_num = 0; $total_begin = 0; ?>
		<? foreach ($web_ar_datagrid['header'] as $hdr_id=>$column) {	?>
			
			<? if ($column['visible'] != '1') continue; ?>
			
			<th class="col_<?=$hdr_id?>">
				
				
				<? if (!empty($column['clm_info'])) { ?>
					<span class="tipz" title="<?=$column['clm_info']?>"></span>
				<? } ?>
				
				<?=$column['caption']?>

			</th>
			
			<? if ((empty($web_ar_datagrid['total'][$hdr_id])) && ($total_begin == $col_num)) { ?>
				<? $total_begin++; ?>
			<? } ?>
			
			<? $col_num++; ?>
		<? } ?>
		</tr>
		
		
		<? if ($captionFilter) { ?>
				
			<tr class="filter_row">
				<? foreach ($web_ar_datagrid['header'] as $hdr_id=>$column) {	?>
					
					<? if ($column['visible'] != '1') continue; ?>
					
					<td class="col_<?=$hdr_id?>">
						
						<? if (!empty($captionFilter['fields'][$hdr_id])) { ?>
							<div class="caption_filter">
								<?=$captionFilter['fields'][$hdr_id]['html']?>
							</div>
						<? } ?>
						
						
						<? if (($captionFilter) && ($captionFilter['object']->settings['submitInTable']) && ($hdr_id == $last_hdr_id)) { ?>
							<div class="caption_filter">
									<?=$captionFilter['fields']['filterSubmit_'.$web_ar_datagrid['info']['name']]['html']?>
							</div>
						<? } ?>
					</td>

				<? } ?>
			</tr>
				
		<? } ?>
		
		<? if ((count($web_ar_datagrid['data']) > 0)) { ?>
			<? foreach ($web_ar_datagrid['data'] as $row=>$item) { ?>
				
				<tr class="<?=toggleEvenOdd()?>">
					
					<? $i=0; ?>
					<? foreach ($web_ar_datagrid['header'] as $hdr_id=>$column) {	?>
					
						<? if ($column['visible'] != '1') continue; ?>
						
						<td class="col_<?=$hdr_id?>"<?=(!empty($data_align[$i])?' align="'.$data_align[$i].'"':'')?>><?=$item[$hdr_id]?></td>
						
						<? $i++; ?>
						
					<? } ?>
					
				</tr>
				
			<? } ?>
		<? } else { ?>
			<tr class="<?=toggleEvenOdd()?>">
				<td class="col_empty" colspan="<?=$col_num?>" align="center"><?=$MSG['Common']['msg4']?></td>
			</tr>
		<? } ?>
		
		
		<? if (count($web_ar_datagrid['total']) > 0) { ?>
			<tr class="row_total">
				<? if ($total_begin > 0) { ?>
					<td colspan="<?=$total_begin?>" class="col_total"><?=$MSG['Common']['msg5']?></td>
				<? } ?>
				<? foreach ($web_ar_datagrid['header'] as $hdr_id=>$column) {	?>
				
					<? if (($column['visible'] != '1') or ((++$total_counter <= $total_begin) && ($total_begin != 0))) continue; ?>
					
					<td class="col_<?=$hdr_id?>"><?=$web_ar_datagrid['total'][$hdr_id]?></td>
					
				<? } ?>
			</tr>
		<? } ?>
	</table>
	<? if (!empty($PHP_TEMPLATE['captionFilter_'.$web_ar_datagrid['info']['name']])) { ?>

	</form>

	<? } ?>

<? } else { ?>

	<p><?=$empty_message?></p>

<? } ?>


<? if (count($web_ar_datagrid['controls'])>0) { ?>
	<? $i=0; ?>
	<? foreach ($web_ar_datagrid['controls'] as $hdr_id=>$control) { ?>

		<? if ($control_align[$i] == 'bottom') { ?>

		<div class="table_control"><?=$control?></div>
		
		<? } ?>
		
		<? $i++; ?>

	<? } ?>
<? } ?><?  ?>
	
<? } ?>