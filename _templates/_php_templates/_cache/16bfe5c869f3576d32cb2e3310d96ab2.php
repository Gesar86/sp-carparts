<? if ($_interface->domain) { ?>

	<?  ?><h1><?=$MSG['OrderListModule']['msg9']?></h1>

<? if (!is_array($orders)) { ?>
	
	<?=$orders?>
	
<? } else { ?>

	<? $web_ar_datagrid = &$orders; ?>
	<? $empty_message = $MSG['OrderListModule']['msg10']?>
	<? $data_align = array('center','center','center','center','center','center','center'); ?>
	<? $control_align = array('top','bottom'); ?>
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
	
<? } ?><?  ?>

<? } else { ?>

	<?  ?><? if ((!$GLOBALS['hideTitles']) && (!$_REQUEST['hideTitles'])) { ?>
<h1><?=$MSG['OrderListModule']['msg9']?></h1>
<? }?>

<? if (!is_array($orders)) { ?>
	
	<?=$orders?>
	
<? } else { ?>

	<? $web_ar_datagrid = &$orders; ?>
	
	<? $data_align = array('left','left','left','left','left','left','left'); ?>
	<? $control_align = array('top','bottom'); ?>

	<?  ?><div class="replace_navigation">
	<?= $web_ar_datagrid['controls']['pagination'] ?>
</div>
<? if (count($web_ar_datagrid['controls']) > 0) { ?>
	<? $i = 0; ?>
	<? foreach ($web_ar_datagrid['controls'] as $hdr_id => $control) { ?>

		<? if ($hdr_id == 'pagination') continue; ?>

		<? if ((empty($control_align[$i])) or ($control_align[$i] == 'top')) { ?>

			<div class="table_control"><?= $control ?></div>

		<? } ?>

		<? $i++; ?>

	<? } ?>
<? } ?>

<? if ((count($web_ar_datagrid['data']) > 0) or (empty($empty_message))) { ?>

	<? if (!empty($PHP_TEMPLATE['captionFilter_' . $web_ar_datagrid['info']['name']])) { ?>

		<? $captionFilter = & $PHP_TEMPLATE['captionFilter_' . $web_ar_datagrid['info']['name']]; ?>
		<?= $captionFilter['validationScript'] ?>
		<form id="<?= $captionFilter['id'] ?>" name="<?= $captionFilter['name'] ?>" action="<?= $captionFilter['action'] ?>" method="<?= $captionFilter['method'] ?>" onsubmit="<?= $captionFilter['onsubmit'] ?>">
		<div class="table_filter_control flc">
			<!--<div class="rightside">
				<?=$captionFilter['fields']['filterSubmit_'.$web_ar_datagrid['info']['name']]['html']?>
			</div>-->
		</div>

	<? } ?>

	<table class="web_ar_datagrid <?= $web_ar_datagrid['info']['name'] ?>" width="100%">
		<tr>
			<? $col_num = 0;
			$total_begin = 0; ?>
			<? foreach ($web_ar_datagrid['header'] as $hdr_id => $column) { ?>

				<? if ($column['visible'] != '1') continue; ?>

				<th class="col_<?= $hdr_id ?>">

					<? if (!empty($column['clm_info'])) { ?>
						<span class="tipz" title="<?= $column['clm_info'] ?>"></span>
					<? } ?>
					<?= $column['caption'] ?>

				</th>

				<? if ((empty($web_ar_datagrid['total'][$hdr_id])) && ($total_begin == $col_num)) { ?>
					<? $total_begin++; ?>
				<? } ?>

				<? $last_hdr_id = $hdr_id; ?>

				<? $col_num++; ?>
			<? } ?>
		</tr>

		<? if ($captionFilter) { ?>

			<tr class="filter_row">
				<? foreach ($web_ar_datagrid['header'] as $hdr_id => $column) { ?>

					<? if ($column['visible'] != '1') continue; ?>

					<td class="col_<?= $hdr_id ?>">
						<? if ($hdr_id == $last_hdr_id) { ?>
							<span
								class="rightside"><?= $captionFilter['fields']['filterSubmit_' . $web_ar_datagrid['info']['name']]['html'] ?></span>
						<? } ?>
						<? if (!empty($captionFilter['fields'][$hdr_id])) { ?>
							<div class="caption_filter">
								<?= $captionFilter['fields'][$hdr_id]['html'] ?>
							</div>
						<? } ?>

					</td>

				<? } ?>
			</tr>

		<? } ?>

		<? if ((count($web_ar_datagrid['data']) > 0)) { ?>
			<? foreach ($web_ar_datagrid['data'] as $row => $item) { ?>

				<tr class="<?= toggleEvenOdd() ?>">

					<? $i = 0; ?>
					<? foreach ($web_ar_datagrid['header'] as $hdr_id => $column) { ?>

						<? if ($column['visible'] != '1') continue; ?>

						<td class="col_<?= $hdr_id ?>"<?= (!empty($data_align[$i]) ? ' align="' . $data_align[$i] . '"' : '') ?>>

							<? if ($hdr_id == 'payment') { ?>

								<? if (!$item['is_archive'] and (isset($item['ord_summ_debt']) and $item['ord_summ_debt'] > 0)) { ?>

								<? $id = preg_replace('#^<select.*id="(.*)".*$#Uis', '$1', $item[$hdr_id]); ?>

								<?= str_replace('<select', '<select onchange="window.location=\'/shop/payments-online.html?dcm_id=' . md5($item['ord_dcm_id']) . '&pmk_id=\'+$(\'' . $id . '\').value"', $item[$hdr_id]) ?>

								<? } ?>

							<? } elseif($hdr_id == 'ord_id') { ?>

								<? if (!$item['is_archive']) { ?>
									<a href="<?=$docUrl?>?dcm_id=<?=md5($item['ord_dcm_id'])?>">
										<?= $item[$hdr_id] ?>
									</a>
								<? } else { ?>
									<?= $item[$hdr_id] ?>
								<? } ?>
								
							<? } elseif($hdr_id == 'ord_comment') { ?>

								<? if ($item['is_archive']) { ?>
									<?= $item[$hdr_id] ?><?=(trim($item['ord_comment']) ? ', з' : 'З')?>аказ архивный, функционал ограничен
								<? } else { ?>
									<?= $item[$hdr_id] ?>
								<? } ?>

							<? } else { ?>

								<?= $item[$hdr_id] ?>

							<? } ?>

						</td>

						<? $i++; ?>

					<? } ?>

				</tr>

			<? } ?>
			
			<? if (count($web_ar_datagrid['total']) > 0) { ?>
				<tr class="row_total">
					<? if ($total_begin > 0) { ?>
						<td colspan="<?= $total_begin ?>" class="col_total"><?= $MSG['Common']['msg5'] ?></td>
					<? } ?>
					<? foreach ($web_ar_datagrid['header'] as $hdr_id => $column) { ?>

						<? if (($column['visible'] != '1') or ((++$total_counter <= $total_begin) && ($total_begin != 0))) continue; ?>

						<td class="col_<?= $hdr_id ?>"><?= $web_ar_datagrid['total'][$hdr_id] ?></td>

					<? } ?>
				</tr>
			<? } ?>
		<? } else { ?>
			<tr class="<?= toggleEvenOdd() ?>">
				<td class="col_empty" colspan="<?= $col_num ?>" align="center"><?= $MSG['Common']['msg4'] ?></td>
			</tr>
		<? } ?>
	</table>
	<? if (!empty($PHP_TEMPLATE['captionFilter_' . $web_ar_datagrid['info']['name']])) { ?>

		</form>

	<? } ?>

<? } else { ?>

	<p><?= $empty_message ?></p>

<? } ?>

<? if (count($web_ar_datagrid['controls']) > 0) { ?>
	<? $i = 0; ?>
	<? foreach ($web_ar_datagrid['controls'] as $hdr_id => $control) { ?>

		<? if ($control_align[$i] == 'bottom') { ?>

			<div class="table_control"><?= $control ?></div>

		<? } ?>

		<? $i++; ?>

	<? } ?>
<? } ?><?  ?>
	
<? } ?><?  ?>

<? } ?>