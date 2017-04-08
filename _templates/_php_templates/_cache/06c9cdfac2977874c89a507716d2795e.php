<? if ($errors) { ?>
	
	<? $process_messages = &$errors;?>
	<?  ?><? if (count($process_messages['messages']) > 0) {
	
	foreach($process_messages['messages'] as $message) {
		
		echo $message;
		
	}

} ?><?  ?>
	
<? } else { ?>

<? if ($mode == 'documents_list') { ?>

   	<h1><?=$MSG['DocumentsModule']['msg9']?></h1>
	
	<? if ($documents) { ?>
	
	<? $web_ar_datagrid = &$documents; ?>
	<? $data_align = array('left','left','left','left'); ?>
	<? $control_align = array('top','bottom'); ?>
	
	<?  ?><div class="flc">
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
		<? $col_num = 0; ?>
		<? foreach ($web_ar_datagrid['header'] as $hdr_id=>$column) {	?>
			
			<? if (($column['visible'] != '1') or ($hdr_id=='print')) continue; ?>
			
			<th class="col_<?=$hdr_id?>">
				<? if (!empty($column['clm_info'])) { ?>
					<span class="tipz" title="<?=$column['clm_info']?>"></span>
				<? } ?>
					<?=$column['caption']?>
			</th>
			<? $col_num++; ?>
			
		<? } ?>
		</tr>
		
		<? if ($captionFilter) { ?>
				
			<tr class="filter_row">
				<? foreach ($web_ar_datagrid['header'] as $hdr_id=>$column) {	?>
					
					<? if (($column['visible'] != '1') or ($hdr_id=='print')) continue; ?>
					
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
		

		<?if (!empty($web_ar_datagrid['data'])) {
			foreach ($web_ar_datagrid['data'] as $row => $item) { ?>

				<tr class="<?= toggleEvenOdd() ?>">

					<? $i = 0; ?>
					<? foreach ($web_ar_datagrid['header'] as $hdr_id => $column) { ?>

						<? if (($column['visible'] != '1') or ($hdr_id == 'print')) continue; ?>

						<td class="col_<?= $hdr_id ?>"<?= (!empty($data_align[$i]) ? ' align="' . $data_align[$i] . '"' : '') ?>>
							<? if ($hdr_id == 'doc_dcm_id') { ?>
								<?= $item['print'] ?><?= $item[$hdr_id] ?>
							<? } else { ?>
								<?= $item[$hdr_id] ?>
							<? } ?>
						</td>

						<? $i++; ?>

					<? } ?>

				</tr>

			<? }
		} else { ?>
		<tr class="<?= toggleEvenOdd() ?>">
			<td class="col_empty" colspan="<?= $col_num ?>" align="center"><?= $MSG['Common']['msg4'] ?></td>
		</tr>
		<? } ?>
	</table>
	<? if (!empty($PHP_TEMPLATE['captionFilter_'.$web_ar_datagrid['info']['name']])) { ?>

	</form>

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
	
	<? $process_messages = &$documents_dialog;?>
	<?  ?><? if (count($process_messages['messages']) > 0) {
	
	foreach($process_messages['messages'] as $message) {
		
		echo $message;
		
	}

} ?><?  ?>

<? } else { ?>

    <h1><?=$MSG['DocumentsModule']['msg9']?></h1>
	
	<? if (strpos($_SERVER['HTTP_REFERER'],'myorders')!==false) { ?>
		<a href="/shop/myorders.html"><?=$MSG['DocumentsModule']['msg10']?></a>
	<? } else { ?>
		<a href="/shop/documents.html"><?=$MSG['DocumentsModule']['msg12']?></a>
	<? } ?>
	<br /><br />
    <?  ?><?=$documents_dialog['validationScript']?>
<form id="<?=$documents_dialog['id']?>" name="<?=$documents_dialog['name']?>" action="<?=$documents_dialog['action']?>" method="<?=$documents_dialog['method']?>" onsubmit="<?=$documents_dialog['onsubmit']?>">

<?=$documents_dialog['fields']['dcm_id']['html']?>
<?=$documents_dialog['fields']['pyr_cst_id']['html']?>
<?=$documents_dialog['fields']['bsp_id']['html']?>
<?=$documents_dialog['fields']['cst_id']['html']?>

<table border="0" cellpadding="10">
	<tr>
		<td valign="top" width="50%">

			<? $web_ar_datagrid = &$documents_dialog['fields']['documents']['html']; ?>
			<? $empty_message = $MSG['DocumentsModule']['msg13']?>
			<? $data_align = array('center','center','left'); ?>

			<? 	$i=0;
				foreach ($web_ar_datagrid['data'] as $rkey=>$row) {
					foreach($row as $key=>$value) {
					
						switch ($key) {
							
							case 'doc_dcm_id': {
								$web_ar_datagrid['data'][$rkey][$key] = '<nobr>'.$web_ar_datagrid['data'][$rkey][$key].'</nobr>';
							} break;
							
							case 'print': {
								if (($mode != 'documents_list') && (empty($web_ar_datagrid['data'][$rkey]['dcm_id']))) {
									$web_ar_datagrid['data'][$rkey][$key] = '<input id="d_dct_id_'.$i.'" type="checkbox" name="d_dct_id['.$i.']" value="'.$web_ar_datagrid['data'][$rkey]['dct_id'].'" class="checkBox" />';
								}
							} break;
							
							case 'doc_name': {
								if (($mode != 'documents_list') && (empty($web_ar_datagrid['data'][$rkey]['dcm_id']))) {
									$web_ar_datagrid['data'][$rkey][$key] = '<label for="d_dct_id_'.$i.'">'.$web_ar_datagrid['data'][$rkey][$key].'</label>';
								}
							} break;
							
							default: {
							
							} break;
							
						}
				
					}
					$i++;
				}
			?>

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

			<br/><center><?=$documents_dialog['fields']['send']['html']?></center>

		</td>

	<? if (($disableMakeDocuments != 1) && ($documents_dialog['fields']['pyr_id'])) { ?>
		
		<td valign="top" width="50%">
			
			<div id="doc_payer_form" class="ar_form">
			<table border="0" width="100%">
			
			<tr>
				<td width="33%" class="fname">
					<?=$documents_dialog['fields']['pyr_id']['caption']?>
				</td>
				<td width="67%" class="fvalue">
					<?=$documents_dialog['fields']['pyr_id']['html']?>
				</td>
			</tr>

			
			<? if ($documents_dialog['fields']['pyr_orf_id']) { ?>
				<tr>
				<td colspan="2" class="fname">
				<br />
				<p><b><?=$MSG['DocumentsModule']['msg11']?></b></p>
				</td>
				</tr>
			<? } ?>
			
			<? if (!$payer_view) { ?>

			
			<tr>
				<td class="fname">
					<?=$documents_dialog['fields']['pyr_orf_id']['caption']?>
				</td>
				<td class="fvalue">
					<?=$documents_dialog['fields']['pyr_orf_id']['html']?>
				</td>
			</tr>
			
			<tr>
				<td class="fname">
					<?=$documents_dialog['fields']['pyr_name']['caption']?>
				</td>
				<td class="fvalue">
					<?=$documents_dialog['fields']['pyr_name']['html']?>
				</td>
			</tr>
			
			<tr>
				<td class="fname">
					<?=$documents_dialog['fields']['pyr_jur_address']['caption']?>
				</td>
				<td class="fvalue">
					<?=$documents_dialog['fields']['pyr_jur_address']['html']?>
				</td>
			</tr>
			
			<tr>
				<td class="fname">
					<?=$documents_dialog['fields']['pyr_address']['caption']?>
				</td>
				<td class="fvalue">
					<?=$documents_dialog['fields']['pyr_address']['html']?>
				</td>
			</tr>
			
			<tr>
				<td class="fname">
					<?=$documents_dialog['fields']['pyr_inn']['caption']?>
				</td>
				<td class="fvalue">
					<?=$documents_dialog['fields']['pyr_inn']['html']?>
				</td>
			</tr>
			
			<? if ($documents_dialog['fields']['pyr_license_number']) { ?>
			<tr>
				<td class="fname">
					<?=$documents_dialog['fields']['pyr_license_number']['caption']?>
				</td>
				<td class="fvalue">
					<?=$documents_dialog['fields']['pyr_license_number']['html']?>
				</td>
			</tr>
			<? } ?>
			
			<tr>
				<td class="fname">
					<?=$documents_dialog['fields']['pyr_rs']['caption']?>
				</td>
				<td class="fvalue">
					<?=$documents_dialog['fields']['pyr_rs']['html']?>
				</td>
			</tr>
			
			<tr>
				<td class="fname">
					<?=$documents_dialog['fields']['pyr_ks']['caption']?>
				</td>
				<td class="fvalue">
					<?=$documents_dialog['fields']['pyr_ks']['html']?>
				</td>
			</tr>
			
			<tr>
				<td class="fname">
					<?=$documents_dialog['fields']['pyr_bank']['caption']?>
				</td>
				<td class="fvalue">
					<?=$documents_dialog['fields']['pyr_bank']['html']?>
				</td>
			</tr>
			
			<tr>
				<td class="fname">
					<?=$documents_dialog['fields']['pyr_bik']['caption']?>
				</td>
				<td class="fvalue">
					<?=$documents_dialog['fields']['pyr_bik']['html']?>
				</td>
			</tr>

			<? } else { ?>

				<tbody class="view_table">
				<? if (!empty($payer_view['orf_name'])) { ?>
				<tr>
					<td class="fname">
						<?=$MSG['PayersModule']['msg12']?>
					</td>
					<td class="fvalue">
						<?=$payer_view['orf_name']?>
					</td>
				</tr>
				<? } ?>
				
				<? if (!empty($payer_view['pyr_name'])) { ?>
				<tr>
					<td class="fname">
						<?=$MSG['PayersModule']['msg37']?>
					</td>
					<td class="fvalue">
						<?=$payer_view['pyr_name']?>
					</td>
				</tr>
				<? } ?>
				
				<? if (!empty($payer_view['pyr_jur_address'])) { ?>
				<tr>
					<td class="fname">
						<?=$MSG['PayersModule']['msg38']?>
					</td>
					<td class="fvalue">
						<?=$payer_view['pyr_jur_address']?>
					</td>
				</tr>
				<? } ?>
				
				<? if (!empty($payer_view['pyr_address'])) { ?>
				<tr>
					<td class="fname">
						<?=$MSG['PayersModule']['msg39']?>
					</td>
					<td class="fvalue">
						<?=$payer_view['pyr_address']?>
					</td>
				</tr>
				<? } ?>
				
				<? if (!empty($payer_view['pyr_inn'])) { ?>
				<tr>
					<td class="fname">
						<?=$MSG['PayersModule']['msg40']?>
					</td>
					<td class="fvalue">
						<?=$payer_view['pyr_inn']?>
					</td>
				</tr>
				<? } ?>
				
				<? if (!empty($payer_view['pyr_license_number'])) { ?>
				<tr>
					<td class="fname">
						<?=$MSG['PayersModule']['msg41']?>
					</td>
					<td class="fvalue">
						<?=$payer_view['pyr_license_number']?>
					</td>
				</tr>
				<? } ?>
				
				<? if (!empty($payer_view['pyr_rs'])) { ?>
				<tr>
					<td class="fname">
						<?=$MSG['PayersModule']['msg42']?>
					</td>
					<td class="fvalue">
						<?=$payer_view['pyr_rs']?>
					</td>
				</tr>
				<? } ?>
				
				<? if (!empty($payer_view['pyr_ks'])) { ?>
				<tr>
					<td class="fname">
						<?=$MSG['PayersModule']['msg43']?>
					</td>
					<td class="fvalue">
						<?=$payer_view['pyr_ks']?>
					</td>
				</tr>
				<? } ?>
				
				<? if (!empty($payer_view['pyr_bank'])) { ?>
				<tr>
					<td class="fname">
						<?=$MSG['PayersModule']['msg44']?>
					</td>
					<td class="fvalue">
						<?=$payer_view['pyr_bank']?>
					</td>
				</tr>
				<? } ?>
				
				<? if (!empty($payer_view['pyr_bik'])) { ?>
				<tr>
					<td class="fname">
						<?=$MSG['PayersModule']['msg45']?>
					</td>
					<td class="fvalue">
						<?=$payer_view['pyr_bik']?>
					</td>
				</tr>
				<? } ?>

				<? if (!empty($payer_view['pyr_ogrn'])) { ?>
					<tr>
						<td class="fname">
							<?= $MSG['PayersModule']['ogrnNum'] ?>
						</td>
						<td class="fvalue">
							<?= $payer_view['pyr_ogrn'] ?>
						</td>
					</tr>
				<? } ?>

				</tbody>
			
			<? } ?>
			</table>
			</div>
			
		</td>

	<? } ?>

	</tr>
</table>
</form><?  ?>

<? } ?>

<? } ?>