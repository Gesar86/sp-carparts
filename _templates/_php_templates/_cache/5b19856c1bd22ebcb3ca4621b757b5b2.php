<h1><?=$MSG['CarsModule']['msg1']?></h1>

<? if ((is_array($customer_cars)) && ($customer_cars['messages'])) { ?>

	<? if ($customer_cars['messages']['edit_success']) { ?>
	
		<?=$MSG['CarsModule']['msg7']?>
		
	<? } elseif ($customer_cars['messages']['delete_success']) { ?>
	
		<?=$MSG['CarsModule']['msg8']?>
		
	<? } else { ?>

		<? $process_messages = &$customer_cars; ?>
		<?  ?><? if (count($process_messages['messages']) > 0) {
	
	foreach($process_messages['messages'] as $message) {
		
		echo $message;
		
	}

} ?><?  ?>
	
	<? } ?>

<? } elseif ($customer_cars['name'] == 'customer_cars') { ?>

	<?  ?><?= $customer_cars['validationScript'] ?><form id="<?= $customer_cars['id'] ?>" name="<?= $customer_cars['name'] ?>" action="<?= $customer_cars['action'] ?>" method="<?= $customer_cars['method'] ?>" onsubmit="<?= $customer_cars['onsubmit'] ?>">	<?= $customer_cars['fields']['_prid']['html'] ?>	<?= $customer_cars['fields']['subj']['html'] ?>	<?= $customer_cars['fields']['__csc_id__']['html'] ?>	<?= $customer_cars['fields']['csc_cst_id']['html'] ?>	<table class="vin_form">		<tr>			<td class="fname"><?= $customer_cars['fields']['csc_vin_code']['caption'] ?></td>			<td class="fvalue" colspan="3"><?= $customer_cars['fields']['csc_vin_code']['html'] ?></td>		</tr>		<tr>			<td class="fname"><?= $customer_cars['fields']['csc_year']['caption'] ?></td>			<td class="fvalue"><?= $customer_cars['fields']['csc_year']['html'] ?></td>			<td class="fname"><?= $customer_cars['fields']['csc_month']['caption'] ?></td>			<td class="fvalue"><?= $customer_cars['fields']['csc_month']['html'] ?></td>		</tr>		<tr>			<td class="fname"><?= $customer_cars['fields']['csc_brand']['caption'] ?></td>			<td class="fvalue"><?= $customer_cars['fields']['csc_brand']['html'] ?></td>			<td class="fname"><?= $customer_cars['fields']['csc_model']['caption'] ?></td>			<td class="fvalue"><?= $customer_cars['fields']['csc_model']['html'] ?></td>		</tr>		<tr>			<td class="fname"><?= $customer_cars['fields']['csc_engine_power']['caption'] ?></td>			<td class="fvalue"><?= $customer_cars['fields']['csc_engine_power']['html'] ?></td>			<td class="fname"><?= $customer_cars['fields']['csc_engine_volume']['caption'] ?></td>			<td class="fvalue"><?= $customer_cars['fields']['csc_engine_volume']['html'] ?></td>		</tr>		<tr>			<td class="fname"><?= $customer_cars['fields']['csc_more']['caption'] ?></td>			<td class="fvalue" colspan="3"><?= $customer_cars['fields']['csc_more']['html'] ?></td>		</tr>	</table>	<div id="vin_ad"><a href="#" onclick="return false;" id="a_vin_ad_fields"><span><?=tr('Подробные сведения', 'Cars')?></span></a></div>	<div id="vin_ad_fields" style='height:0px;overflow:hidden;'>		<div id="vin_ad_fields_inner">			<table class="vin_form">				<tr>					<td class="fname"><?= $customer_cars['fields']['csc_cylinders']['caption'] ?></td>					<td class="fvalue"><?= $customer_cars['fields']['csc_cylinders']['html'] ?></td>					<td class="fname"><?= $customer_cars['fields']['csc_valves']['caption'] ?></td>					<td class="fvalue"><?= $customer_cars['fields']['csc_valves']['html'] ?></td>				</tr>				<tr>					<td class="fname"><?= $customer_cars['fields']['csc_body']['caption'] ?></td>					<td class="fvalue"><?= $customer_cars['fields']['csc_body']['html'] ?></td>					<td class="fname"><?= $customer_cars['fields']['csc_doors']['caption'] ?></td>					<td class="fvalue"><?= $customer_cars['fields']['csc_doors']['html'] ?></td>				</tr>				<tr>					<td class="fname"><?= $customer_cars['fields']['csc_engine_type']['caption'] ?></td>					<td class="fvalue"><?= $customer_cars['fields']['csc_engine_type']['html'] ?></td>					<td class="fname"><?= $customer_cars['fields']['csc_drive']['caption'] ?></td>					<td class="fvalue"><?= $customer_cars['fields']['csc_drive']['html'] ?></td>				</tr>				<tr>					<td class="fname"><?= $customer_cars['fields']['csc_transmission_type']['caption'] ?></td>					<td class="fvalue"><?= $customer_cars['fields']['csc_transmission_type']['html'] ?></td>					<td class="fname"><?= $customer_cars['fields']['csc_transmission_code']['caption'] ?></td>					<td class="fvalue"><?= $customer_cars['fields']['csc_transmission_code']['html'] ?></td>				</tr>				<tr>					<td class="fname"><?= $customer_cars['fields']['csc_steering_wheel']['caption'] ?></td>					<td class="fvalue"><?= $customer_cars['fields']['csc_steering_wheel']['html'] ?></td>					<td class="fname"></td>					<td class="fvalue"></td>				</tr>				<tr>					<td class="fname"><?=tr('Опции комплектации', 'Cars')?></td>					<td class="fvalue" colspan="3">						<?= $customer_cars['fields']['csc_abs']['html'] ?>						<?= $customer_cars['fields']['csc_esp']['html'] ?>						<?= $customer_cars['fields']['csc_hyd_actuator']['html'] ?>						<?= $customer_cars['fields']['csc_conditioner']['html'] ?>						<?= $customer_cars['fields']['csc_catalyst']['html'] ?>					</td>				</tr>			</table>		</div>	</div>	<script type="text/javascript">		window.addEvent('domready', function () {			var myAccordion = new Fx.Accordion($$('#a_vin_ad_fields'), $$('#vin_ad_fields'), {				opacity: false,				display: -1,				alwaysHide: true,				initialDisplayFx: false,				onActive: function (toggler, element) {					setTimeout(function () {						if (toggler.hasClass('active')) element.addClass('vis')					}, 1000);					toggler.addClass('active');				},				onBackground: function (toggler, element) {					toggler.removeClass('active');					if (element.hasClass('vis')) element.removeClass('vis');				}			});		});	</script>	<table class="vin_form">		<tr>			<td class="fname"></td>			<td class="fvalue" colspan="3"><?= $customer_cars['fields']['car_send']['html'] ?></td>		</tr>	</table></form><?  ?>
	
<? } else { ?>

	<? $web_ar_datagrid = &$customer_cars; ?>
	<? $empty_message = $MSG['CarsModule']['msg2']?>
	<? $data_align = array('left','left','left','left'); ?>
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