<? ob_clean(); ?>

<?  ?><style>
	#detail_info {
		padding: 10px;
	}

	.dinfo_head {
		line-height: 20px;
		margin-bottom: 10px;
	}

	.dinfo_producer {
		color: #dc120c;
		font-size: 16px;
		font-weight: bold;
		text-transform: uppercase;
	}

	.dinfo_article {
		color: #000000;
		font-size: 16px;
		font-weight: normal;
	}

	#dinfo_tabs {
		height: 37px;
		margin-bottom: 10px;
		overflow: hidden;
	}

	#dinfo_tabs li {
		background: #f0f0f0 url(/images/alt_tabs_n.png) top left repeat-x;
		display: block;
		float: left;
		padding: 0px 10px 0px 7px;
		line-height: 32px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		border-radius: 5px;
		
		position: relative;
		overflow: visible;
		z-index: 600;
		height: 32px;
		margin-right: 5px;
		border-bottom: #d4d4d4 1px solid;
		border-right: #d4d4d4 1px solid;
	}

	#dinfo_tabs li:hover,
	#dinfo_tabs li.active_tab {
		background: #ffd311 url(/images/catalog_tab_a.png) bottom left repeat-x;
	}

	#dinfo_tabs li .tab_act {
		position: absolute;
		background: url(/images/tab_act.png) no-repeat;
		width: 12px;
		height: 5px;
		top: 32px;
		left: 48%;
		z-index: 601;
		display: none;
	}

	#dinfo_tabs li:hover .tab_act,
	#dinfo_tabs li.active_tab .tab_act {
		display: block;
	}

	#dinfo_tabs a {
		font-size: 12px;
		font-weight: bold;
		color: #000000;
		text-decoration: none;
		background-repeat: no-repeat;
		background-position: left;
		padding: 0px 0px 0px 0px;
		display: block;
		width: auto;
		float: left;
		height: 32px;
		line-height: 32px;
	}

	#dinfo_tabs a span {
		color: #000000;
		font-weight: bold;
		font-size: 12px;
	}

	#dinfo_tabs a:hover span {
		border-bottom: transparent 2px solid;
	}

	.dinfo {
		width: 640px;
		overflow: hidden;
	}

	.dinfo_info_block {
		color: #000000;
		padding-left: 20px;
		vertical-align: top;
	}

	.dinfo_info_block th {
		background: #ececec;
		font-size: 16px;
		font-weight: bold;
		padding: 3px 0px;
	}

	.dinfo_info_block td {
		font-size: 12px;
		padding: 3px 0px;
	}

	.dinfo_info_block .dinfo_td_name {
		font-weight: bold;
		text-align: right;
		padding-right: 10px;
	}

	.dinfo_info_block .dinfo_td_value {

	}

	.dinfo_pictures_block {
		width: 275px;
		vertical-align: top;
	}

	#detail_picture_img {
		cursor: pointer;
	}

	#detail_picture_close {
		display: none;
		position: absolute;
		width: 30px;
		height: 30px;
		right: -15px;
		top: -15px;
		background: url(data:image/png;base64,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) no-repeat center;
		border: none;
	}

	#detail_picture {
		border: #cccccc 1px solid;
		background: #FFF;
		padding: 1px;
		position: relative;
	}
	
	#detail_picture img {
		max-height: 400px;
	}
	.detail_picture_preview {
		margin: 10px 10px 0px 0px;
		border: #b2b2b2 1px solid;
		padding: 1px;
		cursor: pointer;
	}

	.active_picture {
		border: #000000 1px solid;
	}

	.dapply {
		width: 100%;
		font-size: 12px;
		line-height: 12px;
		color: #2e2e2e;
	}

	.dapply th {
		text-align: left;
		font-weight: normal;
		padding: 5px;
		background: #ecedee url(/images/th_grad.png) top left repeat-x;
		color: #2e2e2e;
		font-size: 12px;
		border-left: #dddddd 1px solid;
		border-right: #dddddd 1px solid;
		vertical-align: top;
		line-height: 20px;
	}

	.dapply td {
		padding: 5px 10px;
		border: #dddddd 1px solid;
	}

	.dapply tr.odd td {
		background-color: #f8f8f8;
	}

	.dapply tr.even td {
		background-color: #fbfbfb;
	}

	.hide {
		display: none
	}

</style><?  ?>

	<link rel="stylesheet" type="text/css" href="/_css/main.css"/>

	<script type="text/javascript" src="/_syslib/mootools.js"></script>
	<script type="text/javascript" src="/_syslib/lib.common.js"></script>
	<script type="text/javascript" src="/_syslib/mootools-more.js"></script>

	<div id="detail_info">

		<div class="dinfo_head">
			<span class="dinfo_producer"><?= $DetailInfo['producer_name'] ?></span>
			<span class="dinfo_article"> <?= ($DetailInfo['code_src'] != '' ? $DetailInfo['code_src'] : $DetailInfo['code']) ?></span>
		</div>

		<?if ($tecdocInfo or $schemaUrl):?>
			<div id="dinfo_tabs" class="flc">
				<ul>
					<li class="active_tab" onclick="changeClass(this, 'dinfo')"><a href="javascript:void();"><?= $MSG['DetailInfoModule']['msg2'] ?></a><span class="tab_act"></span></li>
				<?if ($tecdocInfo):?>
					<li onclick="changeClass(this, 'dparams')"><a href="javascript:void();"><?= $MSG['DetailInfoModule']['msg20'] ?></a><span></span></li>
					<li onclick="changeClass(this, 'dapply')"><a href="javascript:void();"><?= $MSG['DetailInfoModule']['msg21'] ?></a><span></span></li>
					<?if (!empty($tecdocInfo['originalReplaces'])):?>
						<li onclick="changeClass(this, 'dreplace')"><a href="javascript:void();"><?= $MSG['DetailInfoModule']['msg28'] ?></a><span></span></li>
					<?endif;?>
				<?endif;?>
				<?if ($schemaUrl):?>
					<li onclick="changeClass(this, 'dschema')"><a href="javascript:void();"><?= tr('Посмотреть на схеме', 'DetailInfoModule') ?></a><span></span></li>
				<?endif;?>
					
				</ul>
			</div>
		<?endif;?>

		<div class="dinfo" id="dinfo_div">

			<? if ($info_error) { ?>

				<p><?= $MSG['DetailInfoModule']['msg7'] ?></p>

			<? } else { ?>

				<?  ?><script type="text/javascript">

	var resized = false;

	function setImg(key) {
		$('detail_picture_img').src = $('pict' + key).src;
		$$('.detail_picture_preview').removeClass('active_picture');
		$('dpict' + key).addClass('active_picture');
		resized = false;
	}

	function changeClass(elem, Tab) {
		
		$$('li.active_tab').each(function(el){
			el.removeClass('active_tab');
			el.getElement('span').removeClass('tab_act');
		});

		$$('.tab').each(function(el){
			el.addClass('hide');
		});

		elem.addClass('active_tab');
		elem.getElement('span').addClass('tab_act');

		document.id(Tab).removeClass('hide');
	}

	function resizeImage(elem) {

		var maxWidth = 640;
		var maxHeight = 410;
		var ratio = 0;

		var img = $('detail_picture');
		
		var width = img.getWidth();
		var height = img.getHeight();

		if(width > height){
			height = height * (maxWidth / width);
			width = maxWidth;

			if (height > maxHeight) {
				width = maxWidth * (maxHeight / height);
				height = maxHeight;
			}

		} else {
			width = width * (maxHeight / height);
			height = maxHeight;
		}

		var position = 'absolute';

		if (resized) {
			width = '270';
			height = null;
			position = 'initial';
			$('detail_picture_close').hide();
			resized = false;
		} else {
			position = 'absolute';
			$('detail_picture_close').show();
			resized = true;
		}

		var morph = new Fx.Morph(img, {
			onComplete: function(el){
				el.style.position = position;
			}
		});

		morph.start({
			'width' : width,
			'height' : height,
			'position' : 'absolute'
		})

		$('detail_picture_img').morph({
			'width' : width,
			'height' : height
		});
	}

	function clickAction() {

		frameFitting();

		try {
			clearInterval(timeout_a);
		} catch(err) {
			var timeout_a;
		}

		timeout_a = setInterval("frameFitting()",300);

	}

	function frameFitting() {
		
		$('dschema_frame').height = $('dschema_frame').contentWindow.document.documentElement.scrollHeight;
		
		var fWidth = $('dschema_frame').contentWindow.document.documentElement.scrollWidth;
		
		if (fWidth > 600) {
			
			$('dinfo_div').style.width = fWidth + 'px';
			$('dschema_frame').width = fWidth;
			try {
				$(parent.document).getElement('#sbox-window').getElement('iframe').width = fWidth + 30;
			} catch (e) {}
			try {
				$(parent.document).getElement('#sbox-window').style.width = (fWidth + 30) + 'px';
				console.log($(parent.document).getElement('#sbox-window').style.width);
			} catch (e) {}
			
		}

	}

</script><?  ?>

				<table width="100%" id="dinfo" class="tab">
					<tr>
						<td class="dinfo_pictures_block">
							<div class="flc">
								<? $show = false; ?>
								<? if (count($pictures) > 0) { ?>
									<? foreach ($pictures as $key => $picture) { ?>
										<? if (empty($picture)) continue; ?>

										<? $show = true; ?>

										<?
										//для удаленных картинок с сервиса надо переделать подсчет размера
										//http://stackoverflow.com/questions/4635936/super-fast-getimagesize-in-php
										list($imgWidth, $imgHeight, $imgType, $imgStr) = getimagesize($picture);
										
										if (strpos($picture, $CONST['site_root']) === false) {

											if (strpos($picture, '/home/') !== false) {
												//картинка из общей директории текдока
												$image = str_replace('/home', '', str_replace('/home/www', '', $picture));
											} else {
												//картинка с другого сервера
												$image = $picture;
											}

										//если не подключена библиотека img
										} elseif (!function_exists("imagecreatefromjpeg") && preg_match("/jpg$/", $picture)) {

											$pictureName = str_replace($CONST['site_root'], "", $picture);
											$image = $pictureName;

										//делаем превьюшку локальной картинки
										} else {

											if ($imgWidth > 500 || $imgHeight > 500) {

												$image = '/_phplib/images/module.thumbnail.php?image=' . encrypt($picture, 'ts_image') . '&thumbW=500&thumbH=500&mode=min&no_cache=1';

											} else {

												$image = '/_phplib/images/module.thumbnail.php?image=' . encrypt($picture, 'ts_image') . '&thumbW=' . $imgWidth . '&thumbH=' . $imgHeight . '&mode=no_scale&no_cache=1';

											}

										}
										?>

										<? if ($key == 0) { ?>
											<div id="detail_picture">
												<img src="<?= $image ?>" id="detail_picture_img" style="width:270px" alt="" title="" onclick="resizeImage(this)"/>
												<a id="detail_picture_close" href="javascript:void();" onclick="resizeImage(this)"></a>
											</div>
										<? } ?>

										<div id="dpict<?= $key ?>" class="leftside detail_picture_preview <?= ($key == 0 ? 'active_picture' : '') ?>">
											<img id="pict<?= $key ?>" src="<?= $image ?>" style="width:68px" alt="" title="" onclick="setImg(<?= $key ?>)"/>
										</div>

									<? } ?>

								<? } ?>
								<? if (!$show) { ?>
									<div id="detail_picture" style="height:150px; text-align:center; font-size: 12px; padding-top:120px;">
										<p><?= $MSG['ModulePicture']['msg9'] ?></p>
									</div>
								<? } ?>
							</div>
						</td>
						<td class="dinfo_info_block">
							<table width="100%">
								<tr>
									<th colspan="2"><?= $MSG['DetailInfoModule']['msg2'] ?></th>
								</tr>
								<tr>
									<td colspan="2"></td>
								</tr>
								<tr>
									<td class="dinfo_td_name"><?= $MSG['DetailInfoModule']['msg8'] ?></td>
									<td class="dinfo_td_value"><?= ($DetailInfo['code_src'] != '' ? $DetailInfo['code_src'] : $DetailInfo['code']) ?></td>
								</tr>
								<tr>
									<td class="dinfo_td_name"><?= $MSG['DetailInfoModule']['msg10'] ?></td>
									<td class="dinfo_td_value"><?= ($DetailInfo['detail_name'] != '' ? $DetailInfo['detail_name'] : '&nbsp;') ?></td>
								</tr>
								<tr>
									<td class="dinfo_td_name"><?= $MSG['DetailInfoModule']['msg9'] ?></td>
									<td class="dinfo_td_value"><?= $DetailInfo['producer_name'] ?></td>
								</tr>
								<tr>
									<td class="dinfo_td_name"><?= $MSG['DetailInfoModule']['msg11'] ?></td>
									<?
										if ($usePartInfoWeight) {
											$weight = (float)$DetailInfo['weight'] > 0 ? (float)$DetailInfo['weight'] : (float)$tecdocInfo['weight'];
										} else {
											$weight = (float)$DetailInfo['weight'];
										}
									?>
									<td class="dinfo_td_value"><?= ($weight > 0 ? number_format($weight, 3, '.', ' ') : '-') ?></td>
								</tr>
								<tr>
									<td class="dinfo_td_name"><?= $MSG['DetailInfoModule']['msg14'] ?></td>
									<td class="dinfo_td_value"><?= (round($PriceInfo['final_price_display'] * 100) / 100) ?></td>
								</tr>
								<tr>
									<td class="dinfo_td_name"><?= $MSG['DetailInfoModule']['msg15'] ?></td>
									<td class="dinfo_td_value">
										<? if ($PriceInfo['remains'] != '') { ?>

											<? if (w2u($PriceInfo['remains']) == 'есть') { ?>

												<img src="/images/check.gif"/>

											<? } else { ?>

												<?= $PriceInfo['remains'] ?>

											<? } ?>

										<? } else { ?>

											&nbsp;

										<? } ?>
									</td>
								</tr>
								<tr>
									<td class="dinfo_td_name"><?= $MSG['DetailInfoModule']['msg16'] ?></td>
									<td class="dinfo_td_value"><?= ($PriceInfo['min_quantity'] != '' ? $PriceInfo['min_quantity'] : '&nbsp;') ?></td>
								</tr>
								<? if((int)$PriceInfo['final_price'] != 0) { ?>
								<tr>
									<td class="dinfo_td_name"><?= $MSG['DetailInfoModule']['msg17'] ?></td>
									<td class="dinfo_td_value"><?= ($PriceInfo['term'] == 0 ? $MSG['DetailInfoModule']['msg15'] : $PriceInfo['term']) ?></td>
								</tr>
								<? } ?>
								<tr>
									<td class="dinfo_td_name"><?= $MSG['DetailInfoModule']['msg18'] ?></td>
									<td class="dinfo_td_value"><?= ($PriceInfo['refresh_date'] != '' ? $PriceInfo['refresh_date'] : '&nbsp;') ?></td>
								</tr>

								<? if ($PriceInfo['price_comment']): ?>
									<tr>
										<td colspan="2"></td>
									</tr>
									<tr>
										<th colspan="2"><?= $MSG['DetailInfoModule']['msg19'] ?></th>
									</tr>
									<tr>
										<td colspan="2" class="dinfo_td_value"><?= $PriceInfo['price_comment'] ?></td>
									</tr>
								<? endif ?>

								<? if ($DetailInfo['info']): ?>
									<tr>
										<td colspan="2"></td>
									</tr>
									<tr>
										<th colspan="2"><?= $MSG['DetailInfoModule']['msg12'] ?></th>
									</tr>
									<tr>
										<td colspan="2" class="dinfo_td_value"><?= $DetailInfo['info'] ?></td>
									</tr>
								<? endif ?>
							</table>
						</td>
					</tr>
				</table>

				<?if ($tecdocInfo):?>

					<table id="dparams" class="dapply hide tab">
						<tr>
							<th colspan="2"><strong><?= $MSG['DetailInfoModule']['msg35'] ?></strong></th>
						</tr>
						<tr class="even">
							<td><strong><?= $MSG['DetailInfoModule']['msg29'] ?></strong></td>
							<td><?=$tecdocInfo['code']?></td>
						<tr>
						<tr class="odd">
							<td><strong><?= $MSG['DetailInfoModule']['msg30'] ?></strong></td>
							<td><?=$tecdocInfo['brand']?></td>
						<tr>
						<tr class="even">
							<td><strong><?= $MSG['DetailInfoModule']['msg31'] ?></strong></td>
							<td><?=$tecdocInfo['name']?></td>
						<tr>
						<tr class="odd">
							<td><strong><?= $MSG['DetailInfoModule']['msg11'] ?></strong></td>
							<td><?=$tecdocInfo['weight']?></td>
						<tr>
						<tr class="even">
							<td><strong><?= $MSG['DetailInfoModule']['msg32'] ?></strong></td>
							<td><?=$tecdocInfo['prePacking']?></td>
						<tr>
						<tr class="odd">
							<td><strong><?= $MSG['DetailInfoModule']['msg33'] ?></strong></td>
							<td><?=$tecdocInfo['replaceCode']?></td>
						<tr>
						
						<?foreach ($tecdocInfo['parameters'] as $id => $param):?>
							<tr class="<?=($id % 2 == 0 ? "even" : "odd")?>">
								<td><strong><?=$param['name']?></strong></td>
								<td><?=$param['value']?></td>
							<tr>
						<?endforeach;?>

						<tr>
							<th colspan="2"><strong><?= $MSG['DetailInfoModule']['msg34'] ?></strong></th>
						</tr>
						<tr class="even">
							<td><strong><?= $MSG['DetailInfoModule']['msg30'] ?></strong></td>
							<td><?=$tecdocInfo['brandInfo']['key']?></td>
						<tr>
						<tr class="odd">
							<td><strong><?= $MSG['DetailInfoModule']['msg10'] ?></strong></td>
							<td><?=$tecdocInfo['brandInfo']['name']?></td>
						<tr>
						<tr class="even">
							<td><strong><?= $MSG['DetailInfoModule']['msg36'] ?></strong></td>
							<? $url = preg_replace('~^(http://|https://|//)~Uis', '', $tecdocInfo['brandInfo']['site']); ?>
							<td><a href="//<?=$url?>" rel="nofollow" target="_blank"><?=$url?></a></td>
						<tr>
						<?foreach ($tecdocInfo['brandInfo']['additional'] as $id => $info):?>
							<tr class="<?=($id % 2 == 0 ? "even" : "odd")?>">
								<td><strong><?=$info['name']?></strong></td>
								<td><?=$info['value']?></td>
							<tr>
						<?endforeach;?>

					</table>

					<table id="dapply" class="dapply hide tab">
						<tr>
							<th><?= $MSG['DetailInfoModule']['msg22'] ?></th>
							<th><?= $MSG['DetailInfoModule']['msg23'] ?></th>
							<th><?= $MSG['DetailInfoModule']['msg24'] ?></th>
							<th><?= $MSG['DetailInfoModule']['msg25'] ?></th>
							<th><?= $MSG['DetailInfoModule']['msg26'] ?></th>
							<th><?= $MSG['DetailInfoModule']['msg37'] ?></th>
						</tr>

						<?foreach($tecdocInfo['apply'] as $brand => $brandCarList):?>
							<th colspan="6"><strong><?=$brand?></strong></th>
							<?foreach($brandCarList as $car):?>
								<tr class="<?=($id % 2 == 0 ? "even" : "odd")?>">
									<td><?=$brand?> <?=$car['model']?> <?=$car['modif']?></td>
									<td><?=$car['dateFrom']?>-<?=$car['dateTo']?></td>
									<td><?=$car['kw']?></td>
									<td><?=$car['hp']?></td>
									<td><?=$car['cc']?></td>
									<td><?=tr($car['body'], 'SearchModule')?></td>
								</tr>
							<?endforeach;?>
						<?endforeach;?>
					</table>

					<table id="dreplace" class="dapply hide tab">
						<tr>
							<th><?= $MSG['DetailInfoModule']['msg30'] ?></th>
							<th><?= $MSG['DetailInfoModule']['msg8'] ?></th>
						</tr>
						<?foreach($tecdocInfo['originalReplaces'] as $id => $replace):?>
							<tr class="<?=($id % 2 == 0 ? "even" : "odd")?>">
								<td><?=$replace['brand']?></td>
								<td><?=implode(', ', $replace['codes']);?></td>
							</tr>
						<?endforeach;?>
					</table>

				<?endif;?>

				<?if ($schemaUrl):?>
					<div id="dschema" class="dschema hide tab">
						<iframe src="<?=$schemaUrl?>" height="200" width="100%" id="dschema_frame" name="dschema_frame" class="autoHeight" frameborder="0" scrolling="no" onload="clickAction();"></iframe>
					</div>
				<?endif;?>

			<? } ?>

		</div>

	</div>

	</body>
<? exit(); ?>