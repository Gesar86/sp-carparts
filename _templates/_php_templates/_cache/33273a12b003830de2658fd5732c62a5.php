<? if ($_interface->domain) { ?>

	<?  ?><h1><?= $MSG['PositionListModule']['msg29'] ?></h1>

<?

if (is_array($positions)) {

	if (sizeof($positions['data']) > 0) {

		?>

		<? if ($positions['controls']) { ?>
			<div align="center">
				<? foreach ($positions['controls'] as $hdr_id => $control) { ?>

					<?= $control ?>

				<? } ?>
			</div>
		<? } ?>

		<table border="0" class="web_ar_datagrid" style="font-size: 11px" cellpadding="2">

			<tr>
				<? foreach ($positions['header'] as $hdr_id => $column) { ?>
					<? if ($column['visible'] == true) { ?>
						<th><?= $column['caption'] ?></th>
					<? } ?>
				<? } ?>
			</tr>

			<? foreach ($positions['data'] as $dat_id => $row) { ?>

				<? if ($row['pst_ord_id'] == '') { ?>

					<? $row['stt_style'] = 'background:#990000; color: #FFFFFF'; ?>
					<? $total_value = 1; ?>

				<? } else { ?>

					<? $total_value = 0; ?>

				<? } ?>

				<tr<?= ($row['stt_style'] != '' ? ' style="' . $row['stt_style'] . '"' : '') ?>>

					<? foreach ($positions['header'] as $hdr_id => $column) { ?>

						<? if ($column['visible'] == true) { ?>

							<td align="center">

								<? if ($hdr_id == "summ") { ?>

									<nobr><?= $row[$hdr_id] ?></nobr>

								<? } elseif ($hdr_id == "cost_per_weight") { ?>

									<? if (($row['pst_cost_per_weight'] > 0) && ($row['pst_weight'] == 0)) { ?>
										<nobr>+<?= $row[$hdr_id] ?>/<?= $MSG['PositionListModule']['msg48'] ?></nobr>
									<? } ?>

									<? if (($row['pst_weight']) && ($row['pst_weight'] > 0)) { ?>
										<img src="/_sysimg/ar2/weight.gif" border="0"
											 title="<?= $MSG['SearchModule']['msg19'] ?> = <?= number_format($row['pst_weight'], 3, '.', ' ') ?>"
											 alt="<?= $MSG['SearchModule']['msg19'] ?> = <?= number_format($row['pst_weight'], 3, '.', ' ') ?>"
											 hspace="2" align="absmiddle"/>
									<? } ?>

								<? } elseif ($hdr_id == "payed") { ?>

									<nobr><?= $row[$hdr_id] ?></nobr>

								<? } elseif ($hdr_id == "debt") { ?>

									<nobr><?= $row[$hdr_id] ?></nobr>

								<? } elseif ($hdr_id == "pst_article") { ?>

									<? if ($row['detail_change'] != "") { ?>
										<img src="/_sysimg/ar2/thinup.gif"
											 alt="<?= $MSG['SearchModule']['msg31'] ?> <?= $row['detail_change'] ?>"
											 title="<?= $MSG['SearchModule']['msg31'] ?> <?= $row['detail_change'] ?>"
											 hspace="2"/>
									<? } ?>

									<nobr>
										<? if ($row['pst_article_display'] != "") { ?>
											<?= $row['pst_article_display'] ?>
										<? } else { ?>
											<?= $row[$hdr_id] ?>
										<? } ?>
									</nobr>

								<? } elseif ($hdr_id == "pst_price") { ?>

									<? if (($row['pst_price'] == "") && ($total_value != 1)) { ?>

										<?= $MSG['PositionListModule']['msg44'] ?>

									<? } else { ?>

										<? if ($row['price_change'] != 0) { ?>
											<? $pimg_title = $MSG['PositionListModule']['msg32'] . ' ' . ($row['price_change'] > 0 ? $MSG['PositionListModule']['msg33'] : $MSG['PositionListModule']['msg34']) . ' ' . $MSG['PositionListModule']['msg35'] . ' ' . sprintf("%0.2f", abs($row['price_change'])); ?>
											<img
												src="/_sysimg/ar2/<?= ($row['price_change'] > 0 ? 'thinup' : 'thindown') ?>.gif"
												title="<?= $pimg_title ?>" alt="<?= $pimg_title ?>" hspace="2"/>
										<? } ?>

									<? } ?>

									<nobr><?= $row[$hdr_id] ?></nobr>

									<? if ($row['pst_phand'] != 0) { ?>

										<br/>
										<small><span id="phand"><?= $MSG['SearchModule']['msg20'] ?>&nbsp;<nobr><?= $row['pst_phand'] ?></nobr></span>
										</small>

									<? } ?>

								<? } elseif ($hdr_id == "pst_arrival_date") { ?>

									<? if ($row['term_change'] != 0) { ?>
										<? $timg_title = $MSG['PositionListModule']['msg32'] . ' ' . ($row['term_change'] > 0 ? $MSG['PositionListModule']['msg33'] : $MSG['PositionListModule']['msg34']) . ' ' . $MSG['PositionListModule']['msg36'] . ' ' . abs($row['term_change']); ?>
										<img
											src="/_sysimg/ar2/<?= ($row . term_change > 0) ? "thinup" : "thindown"; ?>.gif"
											title="<?= $timg_title ?>" alt="<?= $timg_title ?>" hspace="2"/>
									<? } ?>
									<nobr><?= $row[$hdr_id] ?></nobr>

								<? } elseif ($hdr_id == "pst_destination_display") { ?>

									<?= $row['pst_destination_display'] ?>

								<? } elseif ($hdr_id == "fl_return") { ?>
									<?  ?><? if ($row['fl_return']) { ?>
	<span class="ret_link_wrap" data-id="<?=$row['pst_id']?>"><a onclick="open_tbox_frame('/<?=($_interface->domain ? 'admin' : 'shop')?>/return-request/?fn=add<?=($_interface->domain ? '&from=dealer' : '')?>&pst_id=<?=$row['pst_id']?>', false, 390)" title="<?=($msg=tr("Подать запрос на возврат", 'position_returns'))?>" alt="<?=$msg?>"><img src="<?=imageExists('/ar2/new_return_request.gif')?>" /></a></span>
<? } elseif ($row['rss_name']) { ?>
	<span class="ret_link_wrap" data-id="<?=$row['pst_id']?>"><a onclick="open_tbox_frame('/<?=($_interface->domain ? 'admin' : 'shop')?>/return-request/?fn=state<?=($_interface->domain ? '&from=dealer' : '')?>&pst_id=<?=$row['pst_id']?>', false, 390)" title="<?=($msg=tr("Обсуждение по запросу", 'position_returns'))?>" alt="<?=$msg?>"><input type="submit" class="submitButton" value="<?=$row['rss_name'].($row['rrt_unread_msg'] ? ' ('.$row['rrt_unread_msg'].')' : '')?>" onclick="return false;"></a></span>
	<? if ($row['rss_confirm'] and $_interface->csUsePrintDocuments) { ?>
		<a name="print" href="/<?=($_interface->domain ? 'admin' : 'shop')?>/return-request/?fn=printSL<?=($_interface->domain ? '&from=dealer' : '')?>&pst_id=<?=$row['pst_id']?>" target="_blank"><img src="/_sysimg/print.gif"></a>
	<? } ?>
<? } ?><?  ?>
								<? } else { ?>

									<?= $row[$hdr_id] ?>

								<? } ?>

							</td>

						<? } ?>

					<? } ?>

				</tr>

			<? } ?>

		</table>

		<script language="JavaScript">

			function checkAll() {

				var checkboxes = new Array();
				var cancelPosArr = new Array();
				var k = 0;

				if (hasDOM) {
					checkboxes = document.getElementsByTagName('input');
				}
				else {
					checkboxes = document.all.tags('input');
				}
				if (checkboxes.length && checkboxes.length > 0) {

					for (i = 0; i < checkboxes.length; i++) {

						if (checkboxes[i].type == 'checkbox' && checkboxes[i].name.toString().indexOf('cancelPos') > -1 && checkboxes[i].checked == true) {

							cancelPosArr[k++] = checkboxes[i].value;

						}

					}

				}
				if (k == 0) {

					alert('<?=$MSG['PositionListModule']['msg37']?>');
					return false;

				} else {

					if (confirm('<?=$MSG['PositionListModule']['msg38']?>')) {

						return cancelPosArr;

					} else {

						return false;

					}
				}

			}

		</script>

	<? } else { ?>

		<p><?= $MSG['PositionListModule']['msg45'] ?></p>

	<? } ?>

<? } else { ?>

	<?= $positions ?>

<? } ?><?  ?>

<? } else { ?>

	<?  ?><? if ((!$GLOBALS['hideTitles']) && (!$_REQUEST['hideTitles'])) { ?>
	<h1><?= $MSG['PositionListModule']['msg29'] ?></h1>
<? } ?>

<?

if (empty($positions['messages'])) {

	?>

	<div class="replace_navigation">
		<?= $positions['controls']['pagination'] ?>
	</div>

	<? if ($positions['controls']) { ?>
		<div align="center">
			<? foreach ($positions['controls'] as $hdr_id => $control) { ?>

				<? if ($hdr_id != 'pagination') { ?>
					<?= $control ?>
				<? } ?>

			<? } ?>
		</div>
	<? } ?>

	<? if (!empty($PHP_TEMPLATE['captionFilter_' . $positions['info']['name']])) { ?>

	<? if (!empty($cancelForm)) { ?>
		<?= $cancelForm['validationScript'] ?>
		<form id="<?= $cancelForm['id'] ?>" name="<?= $cancelForm['name'] ?>" action="<?= $cancelForm['action'] ?>" method="<?= $cancelForm['method'] ?>" onsubmit="<?= $cancelForm['onsubmit'] ?>">
			<?= $cancelForm['fields']['cancelPos']['html'] ?>
			<?= $cancelForm['fields']['_prid']['html'] ?>
			<?= $cancelForm['fields']['subj']['html'] ?>
		</form>
	<? } ?>

	<? $captionFilter = & $PHP_TEMPLATE['captionFilter_' . $positions['info']['name']]; ?>
	<?= $captionFilter['validationScript'] ?>
	<form id="<?= $captionFilter['id'] ?>" name="<?= $captionFilter['name'] ?>" action="<?= $captionFilter['action'] ?>" method="<?= $captionFilter['method'] ?>" onsubmit="<?= $captionFilter['onsubmit'] ?>">
	<div class="table_filter_control flc">

		<div class="leftside">
			<span class="blackButton"><?= $cancelForm['fields']['actionButton']['html'] ?></span>
		</div>
		<div class="rightside">
			<span class="blackButton"><?= $captionFilter['fields']['filterSubmit_' . $positions['info']['name']]['html'] ?></span>
		</div>
		<div class="rightside">
			<?= $captionFilter['fields']['archive']['html'] ?>
		</div>
	</div>
	<? } ?>

	<? $data_align = array('left', 'center'); ?>

	

	<script type="text/javascript">
		window.addEvent('domready', function () {

			new Asset.css('/_syslib/squeezebox/squeezebox_info.css', {id: 'SqueezeBox', title: 'SqueezeBox'});

			SqueezeBox.assign($$('a[rel=state_info]'), {
				size: {x: 640, y: 520},
				ajaxOptions: {
					method: 'get'
				}
			});
		});
	</script>

	<table class="web_ar_datagrid <?= $positions['info']['name'] ?>" width="100%">

		<tr>
			<? $col_num = 0;
			$total_begin = 0; ?>
			<? foreach ($positions['header'] as $hdr_id => $column) { ?>
				<? if ($column['visible'] == true) { ?>
					<th class="col_<?= $hdr_id ?>">
						<nobr><?= $column['caption'] ?></nobr>
					</th>
					<? if ((empty($positions['total'][$hdr_id])) && ($total_begin == $col_num)) { ?>
						<? $total_begin++; ?>
					<? } ?>
					<? $col_num++; ?>
				<? } ?>
			<? } ?>
		</tr>

		<? if ($captionFilter) { ?>

			<tr class="filter_row">
				<? foreach ($positions['header'] as $hdr_id => $column) { ?>
					<? if ($column['visible'] == true) { ?>
						<td class="col_<?= $hdr_id ?>">
							<? if (!empty($captionFilter['fields'][$hdr_id])) { ?>
								<div class="caption_filter">
									<?= $captionFilter['fields'][$hdr_id]['html'] ?>
								</div>
							<? } ?>
						</td>
					<? } ?>
				<? } ?>
			</tr>

		<? } ?>

		<? if ((count($positions['data']) > 0)) { ?>
			<? foreach ($positions['data'] as $dat_id => $row) { ?>

				<? if ($row['pst_ord_id'] == '') { ?>

					<? $row['stt_style'] = 'background:#990000; color: #FFFFFF'; ?>
					<? $total_value = 1; ?>

				<? } else { ?>

					<? $total_value = 0; ?>

				<? } ?>

				<tr class="<?= toggleEvenOdd() ?>" <?= (!empty($row['stt_style']) ? 'style="' . $row['stt_style'] . '"' : '') ?>>
					<? $i = 0; ?>
					<? foreach ($positions['header'] as $hdr_id => $column) { ?>

						<? if ($column['visible'] == true) { ?>

							<td class="col_<?= $hdr_id ?>"
								align="<?= (!empty($data_align[$i]) ? $data_align[$i] : 'left') ?>" <?= (!empty($row['stt_style']) ? 'style="' . $row['stt_style'] . '"' : '') ?>>

								<? if ($hdr_id == "summ") { ?>

									<nobr><?= $row[$hdr_id] ?></nobr>

								<? } elseif ($hdr_id == "stt_name") { ?>

									<?= str_replace('/_sysimg/1x1.gif', '/_sysimg/order_states/00.png', $row[$hdr_id]) ?>

									<?

									if (!empty($_interface->csConfirmRequestState) && !empty($_interface->csConfirmedState) && !empty($_interface->csCancelStateValue) && ($row['pst_state_id'] == $_interface->csConfirmRequestState)) {
										$sLink = new cLink($_SERVER['REQUEST_URI'], '');
										$sLink->removeQueryParam("confirm_act_pos");
										$sLink->removeQueryParam("confirm_act");
										$sLink->addQueryParam("confirm_act_pos", $row['pst_id']);
										?>
										<div id="confirm_block_<?=$row['pst_id']?>" style="padding-top: 5px;">
											<a href="<?=$sLink->link?>&confirm_act=1" class="confirm_yes" onclick="loadContent('confirm_block_<?=$row['pst_id']?>', '<?=$sLink->link?>&confirm_act=1&ajax=1'); return false;"><img src="/_sysimg/yes.gif" title="<?=tr('Подтвердить', 'PositionListModule')?>" alt="<?=tr('Подтвердить', 'PositionListModule')?>" /></a>
											<a href="<?=$sLink->link?>&confirm_act=0" class="confirm_no" onclick="loadContent('confirm_block_<?=$row['pst_id']?>', '<?=$sLink->link?>&confirm_act=0&ajax=1'); return false;"><img src="/_sysimg/no.gif" title="<?=tr('Отказаться', 'PositionListModule')?>" alt="<?=tr('Отказаться', 'PositionListModule')?>" /></a>
										</div>
									<?
									}

									?>

								<? } elseif ($hdr_id == "cost_per_weight") { ?>

									<? if (($row['pst_cost_per_weight'] > 0) && ($row['pst_weight'] == 0)) { ?>
										<nobr>+<?= $row[$hdr_id] ?>/<?= $MSG['PositionListModule']['msg48'] ?></nobr>
									<? } ?>

									<? if (($row['pst_weight']) && ($row['pst_weight'] > 0)) { ?>
									<img src="/_sysimg/ar2/weight.gif" border="0" title="<?= $MSG['PositionListModule']['msg19'] ?> = <?= number_format($row['pst_weight'], 3, '.', ' ') ?>" alt="<?= $MSG['PositionListModule']['msg19'] ?> = <?= number_format($row['pst_weight'], 3, '.', ' ') ?>" hspace="2" align="absmiddle"/>
									<? } ?>

								<? } elseif ($hdr_id == "payed") { ?>

									<nobr><?= $row[$hdr_id] ?></nobr>

								<? } elseif ($hdr_id == "debt") { ?>

									<nobr><?= $row[$hdr_id] ?></nobr>

								<? } elseif ($hdr_id == "pst_article") { ?>

									<? if ($row['detail_change'] != "") { ?>
									<img src="/_sysimg/ar2/thinup.gif" alt="<?= $MSG['PositionListModule']['msg31'] ?> <?= $row['detail_change'] ?>" title="<?= $MSG['PositionListModule']['msg31'] ?> <?= $row['detail_change'] ?>" hspace="2"/>
									<? } ?>

									<nobr>
										<? if ($row['pst_article_display'] != "") { ?>
											<?= $row['pst_article_display'] ?>
										<? } else { ?>
											<?= $row[$hdr_id] ?>
										<? } ?>
									</nobr>

								<? } elseif ($hdr_id == "pst_price") { ?>

									<? if (($row['pst_price'] == "") && ($total_value != 1)) { ?>

										<?= $MSG['PositionListModule']['msg44'] ?>

									<? } else { ?>

										<? if ($row['price_change'] != 0) { ?>
											<? $pimg_title = $MSG['PositionListModule']['msg32'] . ' ' . ($row['price_change'] > 0 ? $MSG['PositionListModule']['msg33'] : $MSG['PositionListModule']['msg34']) . ' ' . $MSG['PositionListModule']['msg35'] . ' ' . sprintf("%0.2f", abs($row['price_change'])); ?>
										<img src="/_sysimg/ar2/<?= ($row['price_change'] > 0 ? 'thinup' : 'thindown') ?>.gif" title="<?= $pimg_title ?>" alt="<?= $pimg_title ?>" hspace="2"/>
										<? } ?>

									<? } ?>

									<nobr><?= $row[$hdr_id] ?></nobr>

									<? if ($row['pst_phand'] != 0) { ?>

										<br/>
										<small><span id="phand"><?= $MSG['PositionListModule']['msg20'] ?>&nbsp;<nobr><?= $row['pst_phand'] ?></nobr></span>
										</small>

									<? } ?>

								<? } elseif ($hdr_id == "pst_arrival_date") { ?>

									<? if ($row['term_change'] != 0) { ?>
										<? $timg_title = $MSG['PositionListModule']['msg32'] . ' ' . ($row['term_change'] > 0 ? $MSG['PositionListModule']['msg33'] : $MSG['PositionListModule']['msg34']) . ' ' . $MSG['PositionListModule']['msg36'] . ' ' . abs($row['term_change']); ?>
										<img
											src="/_sysimg/ar2/<?= ($row . term_change > 0) ? "thinup" : "thindown"; ?>.gif"
											title="<?= $timg_title ?>" alt="<?= $timg_title ?>" hspace="2"/>
									<? } ?>
									<nobr><?= $row[$hdr_id] ?></nobr>

								<? } elseif ($hdr_id == "pst_brand") { ?>

									<? if (strpos($row[$hdr_id], ',') === 0) {
										$row[$hdr_id] = trim(substr($row[$hdr_id], 1));
									}?>

									<?= $row[$hdr_id] ?>

								<? } elseif ($hdr_id == "fl_return") { ?>
									<?  ?><? if ($row['fl_return']) { ?>
	<span class="ret_link_wrap" data-id="<?=$row['pst_id']?>"><a onclick="open_tbox_frame('/<?=($_interface->domain ? 'admin' : 'shop')?>/return-request/?fn=add<?=($_interface->domain ? '&from=dealer' : '')?>&pst_id=<?=$row['pst_id']?>', false, 390)" title="<?=($msg=tr("Подать запрос на возврат", 'position_returns'))?>" alt="<?=$msg?>"><img src="<?=imageExists('/ar2/new_return_request.gif')?>" /></a></span>
<? } elseif ($row['rss_name']) { ?>
	<span class="ret_link_wrap" data-id="<?=$row['pst_id']?>"><a onclick="open_tbox_frame('/<?=($_interface->domain ? 'admin' : 'shop')?>/return-request/?fn=state<?=($_interface->domain ? '&from=dealer' : '')?>&pst_id=<?=$row['pst_id']?>', false, 390)" title="<?=($msg=tr("Обсуждение по запросу", 'position_returns'))?>" alt="<?=$msg?>"><input type="submit" class="submitButton" value="<?=$row['rss_name'].($row['rrt_unread_msg'] ? ' ('.$row['rrt_unread_msg'].')' : '')?>" onclick="return false;"></a></span>
	<? if ($row['rss_confirm'] and $_interface->csUsePrintDocuments) { ?>
		<a name="print" href="/<?=($_interface->domain ? 'admin' : 'shop')?>/return-request/?fn=printSL<?=($_interface->domain ? '&from=dealer' : '')?>&pst_id=<?=$row['pst_id']?>" target="_blank"><img src="/_sysimg/print.gif"></a>
	<? } ?>
<? } ?><?  ?>
								<? } else { ?>

									<?= $row[$hdr_id] ?>

								<? } ?>

							</td>

						<? } ?>
						<? $i++; ?>
					<? } ?>

				</tr>

			<? } ?>
		
			<? if (count($positions['total']) > 0) { ?>
				<tr class="row_total">
					<? if ($total_begin > 0) { ?>
						<td colspan="<?= $total_begin ?>" class="col_total"><?= $MSG['Common']['msg5'] ?></td>
					<? } ?>
					<? foreach ($positions['header'] as $hdr_id => $column) { ?>
						<? if (($column['visible'] != '1') or ((++$total_counter <= $total_begin) && ($total_begin != 0))) continue; ?>

						<td class="col_<?= $hdr_id ?>">
							<nobr><?= $positions['total'][$hdr_id] ?></nobr>
						</td>

					<? } ?>
				</tr>
			<? } ?>
		<? } else { ?>
			<tr class="<?= toggleEvenOdd() ?>">
				<td class="col_empty" colspan="<?= $col_num ?>" align="center"><?= $MSG['Common']['msg4'] ?></td>
			</tr>
		<? } ?>

	</table>

	

	<? if (!empty($PHP_TEMPLATE['captionFilter_' . $positions['info']['name']])) { ?>

	</form>

<? } ?>

	<script language="JavaScript">

		function checkAll() {

			var checkboxes = new Array();
			var cancelPosArr = new Array();
			var k = 0;

			if (hasDOM) {
				checkboxes = document.getElementsByTagName('input');
			}
			else {
				checkboxes = document.all.tags('input');
			}
			if (checkboxes.length && checkboxes.length > 0) {

				for (i = 0; i < checkboxes.length; i++) {

					if (checkboxes[i].type == 'checkbox' && checkboxes[i].name.toString().indexOf('cancelPos') > -1 && checkboxes[i].checked == true) {

						cancelPosArr[k++] = checkboxes[i].value;

					}

				}

			}
			if (k == 0) {

				alert('<?=$MSG['PositionListModule']['msg37']?>');
				return false;

			} else {

				if (confirm('<?=$MSG['PositionListModule']['msg38']?>')) {

					return cancelPosArr;

				} else {

					return false;

				}
			}

		}

	</script>
<? } else { ?>

	<? $process_messages = & $positions; ?>
	<?  ?><? if (count($process_messages['messages']) > 0) {
	
	foreach($process_messages['messages'] as $message) {
		
		echo $message;
		
	}

} ?><?  ?>

<? } ?><?  ?>

<? } ?>