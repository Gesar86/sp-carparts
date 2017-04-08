<h1><?=$MSG['VinListModule']['msg8']?></h1>

<? if ((is_array($vin_requests)) && ($vin_requests['messages'])) { ?>

	<? $process_messages = &$vin_requests; ?>
	<?  ?><? if (count($process_messages['messages']) > 0) {
	
	foreach($process_messages['messages'] as $message) {
		
		echo $message;
		
	}

} ?><?  ?>

<? } elseif ($vin_requests['name'] == 'vin_requests') { ?>
	
	<p><a href="/shop/vin_requests.html"><?=$MSG['VinListModule']['msg9']?></a></p>
	
	<?  ?><div id="car_info"><h3><?=$MSG['VinRequestModule']['msg76']?></h3><?  ?><div class="flc">	<div id="car_info_content">		<table class="vin_form">			<tr>				<td class="fname"><?= $MSG['VinRequestModule']['msg17'] ?></td>				<td class="fvalue" colspan="3"><?= $car['csc_vin_code'] ?></td>			</tr>			<?			preg_match('~((?P<month>[0-9]){2}[/.,\\-])?(?P<year>[0-9]{2,4})~', $car['csc_date'], $date);			if (empty($car['csc_year'])) $car['csc_year'] = $date['year'];			if (empty($car['csc_month'])) $car['csc_month'] = $date['month'];			?>			<tr>				<td class="fname"><?= $MSG['VinRequestModule']['msg15'] ?></td>				<td class="fvalue"><?= $car['csc_year'] ?></td>				<td class="fname"><?= $MSG['VinRequestModule']['msg16'] ?></td>				<td class="fvalue"><?= $car['csc_month'] ?></td>			</tr>			<tr>				<td class="fname"><?= $MSG['VinRequestModule']['msg13'] ?></td>				<td class="fvalue"><?= $car['csc_brand'] ?></td>				<td class="fname"><?= $MSG['VinRequestModule']['msg14'] ?></td>				<td class="fvalue"><?= $car['csc_model'] ?></td>			</tr>			<tr>				<td class="fname"><?= $MSG['VinRequestModule']['msg32'] ?></td>				<td class="fvalue"><?= $car['csc_engine_power'] ?></td>				<td class="fname"><?= $MSG['VinRequestModule']['msg30'] ?></td>				<td class="fvalue"><?= $car['csc_engine_volume'] ?></td>			</tr>			<tr>				<td class="fname"><?= $MSG['VinRequestModule']['msg40'] ?></td>				<td class="fvalue" colspan="3"><?= $car['csc_more'] ?></td>			</tr>		</table>		<div id="vin_ad">			<a href="#" onclick="return false;" id="a_vin_ad_fields"><span><?= $MSG['Cars']['msg55'] ?></span></a></div>		<div id="vin_ad_fields" style='height:0px;overflow:hidden;'>			<div id="vin_ad_fields_inner">				<table class="vin_form">					<tr>						<td class="fname"><?= $MSG['VinRequestModule']['msg29'] ?></td>						<td class="fvalue"><?= $car['csc_cylinders'] ?></td>						<td class="fname"><?= $MSG['VinRequestModule']['msg31'] ?></td>						<td class="fvalue"><?= $car['csc_valves'] ?></td>					</tr>					<tr>						<td class="fname"><?= $MSG['VinRequestModule']['msg19'] ?></td>						<td class="fvalue"><?=tr($car['csc_body'], 'vin_body_types')?></td>						<td class="fname"><?= $MSG['VinRequestModule']['msg20'] ?></td>						<td class="fvalue"><?= $car['csc_doors'] ?></td>					</tr>					<?					$engineDesc = array();					if ($car['csc_engine_code'] != "") $engineDesc[] = $car['csc_engine_code'];					if ($car['csc_engine_type'] != "") $engineDesc[] = $car['csc_engine_type'];					$car['engine'] = (sizeof($engineDesc) > 0 ? implode(" / ", $engineDesc) : "");					?>					<tr>						<td class="fname"><?= $MSG['VinRequestModule']['msg18'] ?></td>						<td class="fvalue"><?= $car['engine'] ?></td>						<td class="fname"><?= $MSG['VinRequestModule']['msg24'] ?></td>						<td class="fvalue"><?= $car['csc_drive'] ?></td>					</tr>					<tr>						<td class="fname"><?= $MSG['VinRequestModule']['msg37'] ?></td>						<td class="fvalue"><?= $car['csc_transmission_type'] ?></td>						<td class="fname"><?= $MSG['VinRequestModule']['msg38'] ?></td>						<td class="fvalue"><?= $car['csc_transmission_code'] ?></td>					</tr>					<tr>						<td class="fname"><?= $MSG['VinRequestModule']['msg64'] ?></td>						<td class="fvalue">							<? switch ($car['csc_steering_wheel']) {								case 'L':								{									?>									<?= $MSG['VinRequestModule']['msg2'] ?>								<?								}									break;								case 'R':								{									?>									<?= $MSG['VinRequestModule']['msg3'] ?>								<?								}									break;								default:									{									?>									<?= $car['csc_steering_wheel'] ?>									<?									}									break;							} ?>						</td>						<td class="fname"></td>						<td class="fvalue"></td>					</tr>					<tr>						<td class="fname"><?= $MSG['Cars']['msg56'] ?></td>						<td class="fvalue" colspan="3">							<?= (($car['csc_abs'] == 'Y' or $car['csc_abs'] == '1') ? '<span>ABS</span>' : '') ?>							<?= (($car['csc_esp'] == 'Y' or $car['csc_esp'] == '1') ? '<span>ESP</span>' : '') ?>							<?= (($car['csc_booster'] == 'Y' or $car['csc_booster'] == '1') ? '<span>' . $MSG['VinRequestModule']['msg26'] . '</span>' : '') ?>							<?= (($car['csc_conditioner'] == 'Y' or $car['csc_conditioner'] == '1') ? '<span>' . $MSG['VinRequestModule']['msg25'] . '</span>' : '') ?>							<?= (($car['csc_catalyst'] == 'Y' or $car['csc_catalyst'] == '1') ? '<span>' . $MSG['VinRequestModule']['msg27'] . '</span>' : '') ?>						</td>					</tr>				</table>			</div>		</div>		<script type="text/javascript">			window.addEvent('domready', function () {				var myAccordion = new Fx.Accordion($$('#a_vin_ad_fields'), $$('#vin_ad_fields'), {					opacity: false,					display: -1,					alwaysHide: true,					initialDisplayFx: false,					onActive: function (toggler, element) {						setTimeout(function () {							if (toggler.hasClass('active')) element.addClass('vis')						}, 1000);						toggler.addClass('active');					},					onBackground: function (toggler, element) {						toggler.removeClass('active');						if (element.hasClass('vis')) element.removeClass('vis');					}				});			});		</script>	</div></div><?  ?></div><div id="vin_content"><h3><?=$MSG['VinRequestModule']['msg41']?></h3>	<? if (count($vin_content) > 0) { ?>			<?  ?>	<table border="0" id="partsTable" width="100%" class="web_ar_datagrid">
	
		<tr>
		
		<th width="200">
			<nobr><?=$vin_requests['fields']['dcc_name[]']['caption']?></nobr>
		</th>	
		<th width="110">
			<nobr><?=$vin_requests['fields']['dcc_article[]']['caption']?></nobr>
		</th>
		<th width="110">
			<nobr><?=$vin_requests['fields']['dcc_brand[]']['caption']?></nobr>
		</th>
		<th width="110">
			<nobr><?=$vin_requests['fields']['dcc_price[]']['caption']?></nobr>
		</th>
		<th width="50">
			<nobr><?=$vin_requests['fields']['dcc_amount[]']['caption']?></nobr>
		</th>
		<th width="50">
			<nobr><?=$vin_requests['fields']['dcc_term[]']['caption']?></nobr>
		</th>
		<th width="150">
			<nobr><?=$vin_requests['fields']['dcc_comment[]']['caption']?></nobr>
		</th>	
		</tr>

		<? foreach($vin_content as $dcc) { ?>
		
		<tr>
			<td>
				<?=$dcc['dcc_name']?>
			</td>
			<td>
				<a href="/search.html?article=<?=$dcc['dcc_article']?>&sort___search_results_by=final_price&term=0&smode=A">
				<?=$dcc['dcc_article']?>
				</a>
			</td>
			<td>
				<?=$dcc['dcc_brand']?>
			</td>
			<td>
				<?=$dcc['dcc_price_display']?>
			</td>
			<td>
				<?=$dcc['dcc_amount']?>
			</td>
			<td>
				<?=$dcc['dcc_term']?>
			</td>
			<td>
				<?=$dcc['dcc_comment']?>
			</td>
		</tr>
		
		<? } ?>
	
	</table><?  ?>		<? } ?></div><br /><table border="0" class="view_table"><tr>	<td class="fname">	<?=$vin_requests['fields']['contact']['caption']?>	</td>	<td class="fvalue">	<?=$vin_requests['sourceFields']['contact']['instance']->value?>	</td></tr><tr>	<td class="fname">	<?=$vin_requests['fields']['phone']['caption']?>	</td>	<td class="fvalue">	<?=$vin_requests['sourceFields']['phone']['instance']->value?>	</td></tr><tr>	<td class="fname">	<?=$vin_requests['fields']['email']['caption']?>	</td>	<td class="fvalue">	<?=$vin_requests['sourceFields']['email']['instance']->value?>	</td></tr></table>	<br /><?  ?>
	
	<p><a href="/shop/vin_requests.html"><?=$MSG['VinListModule']['msg9']?></a></p>
	
<? } else { ?>

	<? $web_ar_datagrid = &$vin_requests; ?>
	<? $empty_message = $MSG['VinListModule']['msg12']?>
	<? $data_align = array('center','center','center','center','center','center','center'); ?>
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