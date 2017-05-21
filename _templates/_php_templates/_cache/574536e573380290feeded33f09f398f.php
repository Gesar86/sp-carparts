<?
	
	 ?><?

$__search_results = $__search_results->value;

if ($SearchSetting['admin_search'] == 1) {

	if ($SearchSetting['csSearchTemplate'] == "groups") {

		 ?><? if (($SearchSetting['authUserSearchOnly'] != 1) || ($SearchSetting['cst_category_id'] >= 1) || ($SearchSetting['admin_search'] == 1)) { ?>

	<? if ($SearchSetting['empty_search']) { ?>

		<?  ?><h1><?=$AR_MSG['SearchModule']['msg1']?></h1>

<ul>

	<? if ($SearchSetting['search_from_catalog']) { ?>
	<li><p><a href="<?=$SearchSetting['catalog_search_url']?>"><?=$AR_MSG['SearchModule']['msg2']?></a></p>
	<? } ?>

	<li><nobr><?=$AR_MSG['SearchModule']['msg3']?></nobr></li>

	<? if ($SearchSetting['catalog_search']) { ?>
	<li><a href="<?=$SearchSetting['catalog_search_url']?>"><?=$AR_MSG['SearchModule']['msg6']?></a>
	<? } ?>

</ul><?  ?>
	
	<? } ?>

	<? if ($alternatives && !$__search_results && !$SearchSetting['empty_search']) { ?>

		<?  ?><h1><?=$AR_MSG['SearchModule']['msg1']?></h1>
	
	<? if ($SearchSetting['search_from_catalog']) { ?>
	<li><p><a href="<?=$SearchSetting['catalog_search_url']?>"><?=$AR_MSG['SearchModule']['msg2']?></a></p>
	<? } ?>

<table border="0" class="web_ar_datagrid">

<tr>

<? foreach ($alternatives['header'] as $hdr_id=>$column) { ?>

	<? if ($column['visible']==true) { ?>

	<th><?=$column['caption']?></th>

	<? } ?>

<? } ?>
</tr>

<? foreach ($alternatives['data'] as $dat_id=>$row) { ?>

<tr class="<?=($dat_id % 2 == 0?'even':'odd')?>">
	<? foreach ($alternatives['header'] as $hdr_id=>$column) { ?>
	
		<?
			switch ($hdr_id) {
				
				case 'brand':
				case 'action_alt': {
					$align = 'center';
				} break;
				default: {
					$align = 'left';
				} break;
				
			}
		?>
		
		<? if ($column['visible'] == true) { ?>
		<td align="<?=$align?>">
		<?=$row[$hdr_id]?>
		
		<? if ($hdr_id=='spare') { ?>
		
			<? if ($row['superseded_by']!='') { ?>
			<?=$row['code']?> - <?=$AR_MSG['SearchModule']['msg7']?><?=$row['superseded_by']?>
			<? } ?>
			
			<? if ($row['replacement_for']!='') { ?>
			<?=$row['code']?> - <?=$AR_MSG['SearchModule']['msg8']?><?=$row['replacement_for']?>
			<? } ?>

		<? } ?>
			
		</td>
		<? } ?>

	<? } ?>
</tr>

<? } ?>

</table><?  ?>

	<? } ?>

	<? if ($__search_results && !$SearchSetting['empty_search']) { ?>

		<? if (!$SearchSetting['admin_search']) { ?>

			<?  ?><table border="0" width="100%">

<tr>
<td>
<nobr><?=$AR_MSG['SearchModule']['msg1']?></nobr>
	
	<? if ($SearchSetting['catalog_search']) { ?>
	<li><a href="<?=$SearchSetting['catalog_search_url']?>"><?=$AR_MSG['SearchModule']['msg6']?></a>
	<? } ?>

</td><td align="right" valign="top">

<? if ($__search_results && !$SearchSetting['empty_search']) { ?>

<b><?=$AR_MSG['SearchModule']['msg9']?></b>&nbsp;<?=$cid?>

<? } ?>

</td>
<td valign="top" style="padding-left: 10px">
	
	<? if ($SearchSetting['groups_count'] > 1) { ?>
	
	<b><?=$AR_MSG['SearchModule']['msg41']?></b>&nbsp;
	
	<?
		$sLink = new cLink($_SERVER['REQUEST_URI'], '');
		$sLink->removeQueryParam("g");
	?>
	
	<select onchange="window.location.href = '<?=$sLink->link?>&g='+this.value">
	
	<? foreach ($alternatives as $dat_id=>$row) { ?>
	
			<option value="<?=$row['id']?>" <?=($_REQUEST['g']==$row['id']?'selected="selected"':'')?>>
				<?=$row['brand']?>
			</option>

	<? } ?>

	</select>
	
	<? } ?>

</td></tr>
</table>

<? if ($_SYSTEM->REQUESTED_PAGE != "/shop/basket_check.html") { ?>

<? $st_c = 0 ?>
<table border="0" cellpadding='1' cellspacing="0" width="100%" style="border-top: 1px solid #A0A0A0; border-bottom: 1px solid #A0A0A0">

<caption><?=$AR_MSG['SearchModule']['msg42']?></caption>

<? foreach ($searchStat as $key=>$searchN) { ?>

<? if ($st_c % 7 == 0) { ?><tr><? } ?>

<?
	$st_c++;
	$link = new cLink($_SERVER['REQUEST_URI'], '');
  
    $link->removeQueryParam("g");
    $link->removeQueryParam("article");

    $link->addQueryParam("article", $searchN['sse_search_number']);
?>

<td><a href="<?=$link?>"><b><?=$searchN['sse_search_number']?></b></a></td>

<? if ($st_c % 7 == 0) { ?><tr><? } ?>

<? } ?>

</table><br>

<? } ?><?  ?>

		<? } else { ?>

			<h1><?=$AR_MSG['SearchModule']['msg1']?></h1>

		<? } ?>

		<? if ($search_from_catalog) { ?>
			
			<li><p><a href="<?=$SearchSetting['catalog_search_url']?>"><?=$AR_MSG['SearchModule']['msg2']?></a></p></li>

		<? } ?>

		<? if ($SearchSetting['searchMode'] == "An") { ?>
			<div id="tree_searchmode_An">
				<?  ?>		
<style>

	body {
		font-size: 11px
	}

	.scol_0 {
		width: 600px;
	}
	
	.scol_1 {

		position: absolute;
		left: 100px;
		width: 150px;
		margin-right: 5px;
		vertical-align: top;

	}

	.scol_2 {
		position: absolute;
		left: 250px;
		width: 200px;
		margin-right: 5px;

	}
	
	.scol_3 {
		position: absolute;
		left: 400px;
		width: 300px;
		margin-right: 5px;

	}
	
	.scol_4 {

		width: 50px;
		margin-right: 5px;
		text-align: center;

	}
	
	.scol_5 {

		width: 30px;
		margin-right: 5px;
		text-align: center;

	}
	
	.searchBox {
		width: 100%;
		border: #B3E0FF solid 1px;
		background: #F9F9F9;
	}
	
	img {
		border: 0px;
	}
	
	a {
		text-decoration: none;
		cursor: hand;
	}
	
	
	a.normal {
		text-decoration: underline;
		cursor: hand;
	}
	
	div.analogTreeNode {
		width: 100%; padding-left: 50px;
		background: #FFFFFF;
	}
	
	div.analogTreeNode1 {
		width: 100%; padding-left: 50px;
		background: #A0A0A0;
	}
	
	div.analogTreeNode2 {
		width: 100%; padding-left: 50px;
		background: #C0C0C0;
	}
	
	div.analogTreeNode3	 {
		width: 100%; padding-left: 50px;
		background: #A0A0A0;
		color: #FFFFFF;
	}
	
</style>
	
	<script type="text/javascript" src="/_syslib/custom.dtree.js"></script>
	
	<script type="text/javascript">

	
		<?	$loopbackCheck = array(); ?>
		
		tecdocTree = new dTree('tecdocTree', '/images/ar2-tree');
		
		
<?

	$rowStr    = "<nobr><div class=\"analogTreeNode\">";
	
	$rowStr  .= "<span class=\"scol_0\">&nbsp;</span>";
	
	$rowStr  .= "<span class=\"scol_1\">".$SearchSetting['searchCodeInfo'][0]['code']."</span>";
	
	$rowStr  .= "<span class=\"scol_2\">".$SearchSetting['searchCodeInfo'][0]['prd_name']."</span>";
	
	$rowStr  .= "<span class=\"scol_3\">".$SearchSetting['searchCodeInfo'][0]['name']."</span>";
	
	$rowStr  .= "</div></nobr>";
	
	$rowStr = preg_replace("#[\r\n\t]+#Uis"," ",$rowStr);

	global $CMS_API;
	$href = $CMS_API->checkAccess("/admin/webavtr/analogs\.html");

	echo "tecdocTree.add(".$SearchSetting['searchCodeInfo'][0]['detail_id'].", -1, '$rowStr', ".($href ? "'/admin/webavtr/analogs.html?d1_code=".strip_tags($SearchSetting['searchCodeInfo'][0]['code'])."&prd1_name=".strip_tags($SearchSetting['searchCodeInfo'][0]['prd_name'])."&partSearch=1'" : "''").", '".$AR_MSG['SearchModule']['11']."', '_blank');";
	
		
		foreach ($__search_results['data'] as $dat_id=>$row) { 

				
			if ($row['detail_id'] != $row['cross_detail_id'] && !isset($loopbackCheck[$row['detail_id']])) {
					
				$rowStr    = "<div class=\"analogTreeNode".$row['cross_level']."\">";
	
				$rowStr  .= "<span class=\"scol_0\">&nbsp;</span>";	
				$rowStr  .= "<span class=\"scol_1\">&nbsp;".$row['article']."</span>";
				$rowStr  .= "<span class=\"scol_2\">".strtoupper($row['brand'])."</span>";
				$rowStr  .= "<span class=\"scol_3\">".$row['spare_info']."</span>";
				
				$rowStr  .= "</div></nobr>";
				
				$rowStr = preg_replace("#[\r\n\t]+#Uis"," ",$rowStr);
										
				echo "tecdocTree.add(".$row['detail_id'].", ".$row['cross_detail_id'].", '".$rowStr."', ".($href ? "'/admin/webavtr/analogs.html?d1_code=".strip_tags($row['article'])."&prd1_name=".strip_tags($row['brand'])."&partSearch=1'" : "''").", '".$AR_MSG['SearchModule']['11']."', '_blank');";
				
			}
			
			$loopbackCheck[$row['detail_id']] = 1;		
			
		} ?>
		
		document.write(tecdocTree);	
		

	</script><?  ?>
			</div>
			
		<? } else { ?>

			<? if ($__search_results['controls']) { ?>
				
				<?  ?><? foreach ($__search_results['controls'] as $hdr_id => $control) { ?>

	<div class="<?= ($hdr_id == "filter" ? 'notice' : '') ?>" style="padding-bottom: 0px;<?= ($hdr_id == "filter" ? 'min-width:1000px;' : '') ?>">
		<?= $control ?>
	</div>

<? } ?><?  ?>

			<? } ?>

			<?  ?><script type="text/javascript">

	function toggleRow(rowObj) {

		if (!rowObj.clicked) {

			if (rowObj.className != 'mouseover') {

				rowObj.saveStyle = rowObj.className;
				rowObj.className = 'mouseover';

			} else {

				rowObj.className = rowObj.saveStyle;
			}

		} else {

		}

	}

	function clickRow(rowObj) {

		if (rowObj.className != 'clicked') {

			if (!rowObj.saveStyle)
				rowObj.saveStyle = rowObj.className;

			rowObj.className = 'clicked';
			rowObj.clicked = true;

		} else {

			rowObj.className = 'mouseover';
			rowObj.clicked = false;

		}
	}

</script> 

<form action="<?=$SearchSetting['basketURL']?>" method="POST">

<? if ($SearchSetting['useOrderColumn'] == 1) { ?>

<input type="hidden" name="func" value="add">
<div class="searchPrderButton"><input type="submit" value="<?=$AR_MSG['SearchModule']['msg46']?>"></div><br>

<? } ?>

<table border="0" class="web_ar_datagrid" cellspacing="0">

<?  ?><tr>
	<? $columns = 0; ?>
	<? foreach ($__search_results['header'] as $hdr_id => $column) { ?>

		<? if ($column['visible'] == true) { ?>
			<? $columns++; ?>
			<th class="col_<?=$hdr_id?>"><?= $column['caption'] ?></th>
		<? } ?>

	<? } ?>
</tr><?  ?>

<?
$match_criteria = '';
$univers = '';
$oem = '';
$article = '';
$show_article = 1;
$show_brand = 1;
?>

<? $showDelivery = array(); ?>

<? foreach ($__search_results['data'] as $dat_id=>$row) { ?>
<?
if ($row['info_only'] == 1) {
	
	if (($SearchSetting['searchCode'] != $row['parsed_article']) or ($ZeroResultShown == 1)) {
	
		continue;
		
	} else {
		
		foreach ($__search_results['data'] as $dat_id2=>$row2) {
		
		    if (($row['parsed_article'] == $row2['parsed_article']) && ($dat_id != $dat_id2) && ($row2['info_only'] == 0)) { 
    			continue 2;
			}

		}
		
		$ZeroResultShown = 1;

	}

} 
?>
<? if (($article !== $row['parsed_article']) || ($row['brand'] !== $brand)) {
	$article = $row['parsed_article'];
	$brand = $row['brand'];
	$show_article = 1;
} else {
	$show_article = 0;
}
?>

<? if ($row['match_criteria'] != $match_criteria) {
	$show_article = 1;
	$match_criteria = $row['match_criteria'];
	
	if ($match_criteria == 0) { ?>
		
		<tr class="section">
			<td colspan="<?=$columns?>"><?=$AR_MSG['SearchModule']['msg43']?></td>
		</tr>
	
	<? }

} ?>

<? if (($row['univers'] != $univers) && ($match_criteria == 1)) { ?>
	
	<? $show_article = 1; ?>
	<? $univers = $row['univers']; ?>
	
	<? if ($univers != 0) { ?>
	
	<tr class="section">
		<td colspan="<?=$columns?>"><?=$AR_MSG['SearchModule.msg47']?></td>
	</tr>
	
	<? } ?>

<? } ?>

<? if (($row['oem'] != $oem) && ($match_criteria == 1) && ($row['univers'] == 0)) {
	$show_article = 1;
	$oem = $row['oem'];
	
	if ($oem == 0) { ?>
	
		<tr class="section">
			<td colspan="<?=$columns?>"><?=$AR_MSG['SearchModule']['msg44']?></td>
		</tr>
		
	<? } else { ?>
		
		<tr class="section">
			<td colspan="<?=$columns?>"><?=$AR_MSG['SearchModule']['msg45']?></td>
		</tr>
	
	<? }
} ?>

<?
 
if (($isProvider['provider_id'] == $row['provider_id']) && ($row['provider_id']>0)) { 
	$class = 'provider_row'; 
} elseif ($dat_id % 2 == 0) {
	$class = 'even';
} else {
	$class = 'odd';
}
?>

<tr <?=($row['sts_style']!=''?'class="lg" style="'.$row['sts_style'].'"':'class="'.$class.'"')?> onmouseover="toggleRow(this)" onmouseout="toggleRow(this)" onclick="clickRow(this)">

	<? foreach ($__search_results['header'] as $hdr_id=>$column) { ?>
		
		<? if ($column['visible']==true) { ?>
		
		<? 
			switch($hdr_id) {
				
				case 'spare_info':
				case 'article': 
				case 'prd_info_link': {
					$col_align = 'left';
				} break;
				
				case 'final_price':
				case 'customer_price':
				case 'dlv_weight_tax':
				case 'price_brutto': {
					$col_align = 'right';
				} break;
				
				default: {
					$col_align = 'center';
				}
				
			}
		?>

		<td class="col_<?=$hdr_id?>" align="<?= $col_align ?>" <?= ($show_article == 1 ? 'style="border-top: 1px solid #A0A0A0"' : '') ?>>
		
			<?  ?><? if ($hdr_id == 'spare_info') { ?>

	<? if ($show_article == 1) { ?>

		<? if ($row[$hdr_id] == '') { ?>
			&nbsp;
		<? } else { ?>
			<?= $row[$hdr_id] ?>
		<? } ?>

	<? } else { ?>
		&nbsp;
	<? } ?>

<? } elseif ($hdr_id == 'term') { ?>

	<? if ($row['term'] > 0) { ?>
		<?= $row[$hdr_id] ?>
	<? } elseif (($row['term'] == 0) && ($row['info_only'] != 1)) { ?>
		<?= $AR_MSG['SearchModule']['msg12'] ?>
	<? } elseif ($row['info_only'] == 1) { ?>
		-
	<? } ?>

<? } elseif ($hdr_id == 'evaluation') { ?>

	<? if (($row['info_only'] != 1) && ($SearchSetting['statShow'] == 1)) { ?>
		<a href="#" onclick="prov_stat = window.open('/shop/provider_stat.html?pv=<?= $row['provider_id'] ?>&t=<?= $row['term'] ?>', '', 'width=500,height=450'); prov_stat.focus();">
	<? } ?>

	<? if ($row['info_only'] != 1) { ?>
		<?= $row['evaluation'] ?>
	<? } ?>

	<? if (($row['info_only'] != 1) && ($SearchSetting['statShow'] == 1)) { ?>
		</a>
	<? } ?>

<? } elseif ($hdr_id == 'article') { ?>

	<? if ($show_article == 1) { ?>

		<span <?= ($row['parsed_article'] == $SearchSetting['searchCode'] ? 'class="web_ar_search_code"' : '') ?>>
			<nobr><?= $row['article'] ?></nobr>

			<? if ($row['superseded_by'] != '') { ?>

				<? $show_replacement_conditions = 1; ?>
				<span style="color: #990000"><sup>
						<a title="<?= $AR_MSG['SearchModule']['msg14'] ?> <?= $row['superseded_by'] ?>"
						   style="font-weight: bold; width: 10px; background: #990000; color: #FFFFFF; padding: 1px; cursor: default"><?= $AR_MSG['SearchModule']['msg48'] ?></a>
					</sup></span>

			<? } elseif ($row['replacement_for'] != '') { ?>

				<? $show_replacement_conditions = 1; ?>

				<span style="color: #990000"><sup>
						<a title="<?= $AR_MSG['SearchModule']['msg15'] ?> <?= $row['replacement_for'] ?>"
						   style="width: 10px; background: #000000; color: #FFFFFF; padding: 1px; cursor: default"><?= $AR_MSG['SearchModule']['msg49'] ?></a>
					</sup></span>
			<? } ?>
				
			</span>

	<? } else { ?>
		&nbsp;
	<? } ?>

<? } elseif ($hdr_id == 'prd_info_link') { ?>

	<? if ($show_article == 1) { ?>

		<div <?= ($row['brand_full_name'] != "" ? 'title="' . $row['brand_full_name'] . '"' : '') ?> <?= ($row['oem_brand'] == 1 ? 'class="web_ar_oem_brand"' : 'class="web_ar_brand"') ?>>
			<?=(!empty($row['prd_info_exist']) ? " <a href='/info/producers.html?prd=" . $row['prd_info_exist'] ."' target='_blank'>" . $row['prd_info_link'] . " </a>" : $row['prd_info_link']);?>
		</div>

	<? } else { ?>
		&nbsp;
	<? } ?>

<? } elseif ($hdr_id == 'remains') { ?>

	<? if (($row['remains'] == $AR_MSG['SearchModule']['msg16']) && ($row['info_only'] == 0)) { ?>

		<img src="/images/check.gif" title="<?= $AR_MSG['SearchModule']['msg16'] ?>"
			 alt="<?= $AR_MSG['SearchModule']['msg16'] ?>"/>

	<? } elseif (($SearchSetting['showExactRemains'] == 1) && ($row['remains'] != '')) { ?>

		<? if ($row['remains'] > 0) { ?>
			=<?= $row['remains'] ?>
		<? } else { ?>
			<?= $row['remains'] ?>
		<? } ?>

	<? } elseif ($row['remains'] > 0) { ?>
		<?= $row['remains'] ?>
	<? } else { ?>
		-
	<? } ?>
<? } elseif ($hdr_id == 'destination_display') { ?>

	<? if ($row['destination_display'] != "") { ?>
		<?= $row['destination_display'] ?>
	<? } else { ?>
		&nbsp;
	<? } ?>

<? } elseif ($hdr_id == 'action') { ?>

	<? if (($row['info_only'] != '1') || ($row['provider_price'] > 0)) { ?>
		<?= $row[$hdr_id] ?>
	<? } ?>

<? } elseif ($hdr_id == 'orderm') { ?>

	<? if (($row['info_only'] != '1') || ($row['provider_price'] > 0)) { ?>
		<?= $row[$hdr_id] ?>
	<? } ?>

<? } elseif ($hdr_id == 'min_quantity') { ?>

	<? if ($row['min_quantity'] > 0) { ?>
		<?= $row[$hdr_id] ?>
	<? } else { ?>
		&nbsp;
	<? } ?>

<? } elseif ($hdr_id == 'info') { ?>

	<? if ($show_article == 1) { ?>

		<?

		$detailInfo = array(
			"article" => $row['parsed_article'],
			"brand"   => $row['brand']
		);

		$detailLink = data2str($detailInfo, true, true);

		?>

		<a href="#"
		   onclick="window.open('/info/detail.html?sid=<?= $row['_search_id'] ?>&detailLink=<?= $detailLink ?>','','width=800,height=600,scrollbars=yes'); return false;"><img
				src="/images/info.gif" border="0" title="<?= $AR_MSG['SearchModule']['msg17'] ?>"
				alt="<?= $AR_MSG['SearchModule']['msg17'] ?>" hspace="1" align="absmiddle"/></a>

		<? if ($row['picture']) { ?>
			<a href="#"
			   onclick="window.open('/info/detail.html?sid=<?= $row['_search_id'] ?>&did=<?= $row['detail_id'] ?>&detailLink=<?= $detailLink ?>','','width=800,height=600,scrollbars=no');return false;"><img
					src="/images/picture.gif" border="0" title="<?= $AR_MSG['SearchModule']['msg18'] ?>"
					alt="<?= $AR_MSG['SearchModule']['msg18'] ?>" hspace="1" align="absmiddle"/></a>
		<? } ?>

		<? if ($row['weight'] && ($row['weight'] > 0)) { ?>
			<img src="/_sysimg/ar2/weight.gif" border="0"
				 title="<?= $AR_MSG['SearchModule']['msg19'] ?> = <?= number_format($row['weight'], 3, '.', ' ') ?>"
				 alt="<?= $AR_MSG['SearchModule']['msg19'] ?> = <?= number_format($row['weight'], 3, '.', ' ') ?>"
				 hspace="1" align="absmiddle"/>
		<? } ?>

	<? } else { ?>
		&nbsp;
	<? } ?>

<? } elseif ($hdr_id == 'price_brutto') { ?>

	<? if (($row['weight'] > 0) && ($row['cost_per_weight'] > 0)) { ?>

		<?= $row['price_brutto'] ?>

	<? } ?>

<? } elseif ($hdr_id == 'final_price') { ?>

	<? if ($row['provider_price'] == 0) { ?>
		-
	<? } elseif ($row['provider_price'] == '') { ?>
		-
	<? } else { ?>

		<nobr><?= $row[$hdr_id] ?>

		<sup>
			<font color="#990000">

				<?
				if (count($Deliveries) > 0) {
					foreach ($Deliveries as $dlv => $cur_dlv) {

						if ($cur_dlv['delivery_condition'] == $row['delivery_condition']) {

							if ((($row['weight'] == 0) and ($cur_dlv['tax'] > 0)) || ($cur_dlv['tax'] == 0) || ($cur_dlv['tax'] == '')) {

								if (!safeArrayKey($showDelivery, $row['delivery_condition'])) {
									$showDelivery[$row['delivery_condition']] = $cur_dlv;
								}

								echo array_search($row['delivery_condition'], array_keys($showDelivery)) + 1;

							}

						}

					}
				}
				?>

			</font>
		</sup>

		<? if (($row['cost_per_weight'] > 0) && (!empty($row['cost_per_weight_display'])) and empty($row['weight'])) { ?>
			+ <?= $row['cost_per_weight_display'] ?>/<?=tr('кг', 'Common')?>.
		<? } ?>

	<? } ?>
	</nobr>

	<? if ($row['phand_value'] != 0) { ?>

		<br/>
		<small><span id="phand"><?= $AR_MSG['SearchModule']['msg20'] ?>&nbsp;<nobr><?= $row['detail_phand'] ?></nobr></span>
		</small>

	<? } ?>

<? } elseif ($hdr_id == 'date') { ?>

	<? if (($row['info_only'] != '1') || ($row['provider_price'] > 0)) { ?>
		<?= $row[$hdr_id] ?>
	<? } else { ?>
		-
	<? } ?>

<? } else { ?>

	<?= $row[$hdr_id] ?>

<? } ?><?  ?>

		</td>
		
		<? } ?>

	<? } ?>
	
</tr>

<? } ?>

</table>

</form><?  ?>

			<? if ($__search_results['controls']) { ?>

				<? foreach ($__search_results['controls'] as $hdr_id=>$control) { ?>

					<? if ($hdr_id !== 'searchPages') { continue; } ?>
					<div class="<?=($hdr_id=="filter"?'notice':'')?>" style="padding-top: 0px; padding-bottom: 0px;<?=($hdr_id=="filter"?'min-width:1000px;':'')?>">
						<?=$control?>
					</div>

				<? } ?>

			<? } ?>

		<? } ?>

		<?  ?><? if (!$SearchSetting['admin_search']) { ?>

<noindex>
<p><small><a href="/shop/report_error.html?errid=E2&article=<?=$SearchSetting['dirtySearchCode']?>&brand=<?=$SearchSetting['searchBrand']?>"><img src="/_sysimg/info2.gif" align="absmiddle" hspace="5" border="0"/><?=$AR_MSG['SearchModule']['msg21']?></a></small></p>
</noindex>

<? if (($clientData['cst_category_id'] > 1) && !$clientData['retail']) { ?>

<div style="background: #D0D0D0; padding: 10px; margin-top: 10px; margin-bottom: 10px;">

<b><?=$AR_MSG['SearchModule']['msg22']?></b>

</div>

<? } ?>

<? } ?>

<?
	
	if (sizeof($showDelivery)>0 || $show_replacement_conditions) {
	$Deliveries = $showDelivery;
	$k = 0;
	
?>
<div class="notice"><b><?=$AR_MSG['SearchModule']['msg23']?></b>

<? foreach ($Deliveries as $dlv=>$delivery) { ?>

<? $k++; ?>	

<div style="padding: 10px">

<sup><font color="#990000"><?=$k?></font></sup>		
<?=$delivery['dlv_text']?>&nbsp;
</div>

<? } ?>

<? if ($show_replacement_conditions==1) { ?>

<div style="padding: 5px">
<span style="color: #990000"><sup>
			<a title="<?=$row['superseded_by']?>" style="font-weight: bold; width: 10px; background: #990000; color: #FFFFFF; padding: 1px; cursor: default"><?=$AR_MSG['SearchModule']['msg48']?></a>
			</sup></span>		
<?=$AR_MSG['SearchModule']['msg24']?>&nbsp;
</div>

<div style="padding: 5px">
<span style="color: #990000"><sup>
			<a title="<?=$row['replacement_for']?>" style="width: 10px; background: #000000; color: #FFFFFF; padding: 1px; cursor: default"><?=$AR_MSG['SearchModule']['msg49']?></a>
			</sup></span>	
<?=$AR_MSG['SearchModule']['msg25']?>&nbsp;
</div><br/>

<? } ?>

</div>

<? } ?><?  ?>

	<? } ?>

	<? if ($SearchSetting['invalid_search']) { ?>
		
		<?  ?><?=$AR_MSG['SearchModule']['msg26']?>
	<?=$AR_MSG['SearchModule']['msg27']?>
	<?=$AR_MSG['SearchModule']['msg28']?>
	<?=$AR_MSG['SearchModule']['msg29']?>
	<?=$AR_MSG['SearchModule']['msg30']?>
	<?=$AR_MSG['SearchModule']['msg31']?><?  ?>

	<? } ?>

<? } else { ?>
	
	<?  ?><h2><?=$AR_MSG['SearchModule']['msg39']?></h2>
	
<p><?=$AR_MSG['SearchModule']['msg40']?></p><?  ?>

<? } ?><? 

	} else {

		 ?><? if (($SearchSetting['authUserSearchOnly'] != 1) || ($SearchSetting['cst_category_id'] >= 1) || ($SearchSetting['admin_search'] == 1)) { ?>

	<? if ($SearchSetting['empty_search']) { ?>

		<?  ?><h1><?=$AR_MSG['SearchModule']['msg1']?></h1>

<ul>

	<? if ($SearchSetting['search_from_catalog']) { ?>
	<li><p><a href="<?=$SearchSetting['catalog_search_url']?>"><?=$AR_MSG['SearchModule']['msg2']?></a></p>
	<? } ?>

	<li><nobr><?=$AR_MSG['SearchModule']['msg3']?></nobr></li>

	<? if ($SearchSetting['catalog_search']) { ?>
	<li><a href="<?=$SearchSetting['catalog_search_url']?>"><?=$AR_MSG['SearchModule']['msg6']?></a>
	<? } ?>

</ul><?  ?>
	
	<? } ?>

	<? if ($alternatives && !$__search_results && !$SearchSetting['empty_search']) { ?>

		<?  ?><h1><?=$AR_MSG['SearchModule']['msg1']?></h1>
	
	<? if ($SearchSetting['search_from_catalog']) { ?>
	<li><p><a href="<?=$SearchSetting['catalog_search_url']?>"><?=$AR_MSG['SearchModule']['msg2']?></a></p>
	<? } ?>

<table border="0" class="web_ar_datagrid">

<tr>

<? foreach ($alternatives['header'] as $hdr_id=>$column) { ?>

	<? if ($column['visible']==true) { ?>

	<th><?=$column['caption']?></th>

	<? } ?>

<? } ?>
</tr>

<? foreach ($alternatives['data'] as $dat_id=>$row) { ?>

<tr class="<?=($dat_id % 2 == 0?'even':'odd')?>">
	<? foreach ($alternatives['header'] as $hdr_id=>$column) { ?>
	
		<?
			switch ($hdr_id) {
				
				case 'brand':
				case 'action_alt': {
					$align = 'center';
				} break;
				default: {
					$align = 'left';
				} break;
				
			}
		?>
		
		<? if ($column['visible'] == true) { ?>
		<td align="<?=$align?>">
		<?=$row[$hdr_id]?>
		
		<? if ($hdr_id=='spare') { ?>
		
			<? if ($row['superseded_by']!='') { ?>
			<?=$row['code']?> - <?=$AR_MSG['SearchModule']['msg7']?><?=$row['superseded_by']?>
			<? } ?>
			
			<? if ($row['replacement_for']!='') { ?>
			<?=$row['code']?> - <?=$AR_MSG['SearchModule']['msg8']?><?=$row['replacement_for']?>
			<? } ?>

		<? } ?>
			
		</td>
		<? } ?>

	<? } ?>
</tr>

<? } ?>

</table><?  ?>

	<? } ?>

	<? if ($__search_results && !$SearchSetting['empty_search']) { ?>

		<? if (!$SearchSetting['admin_search']) { ?>

			<?  ?><table border="0" width="100%">

<tr>
<td>
<nobr><?=$AR_MSG['SearchModule']['msg1']?></nobr>
	
	<? if ($SearchSetting['catalog_search']) { ?>
	<li><a href="<?=$SearchSetting['catalog_search_url']?>"><?=$AR_MSG['SearchModule']['msg6']?></a>
	<? } ?>

</td><td align="right" valign="top">

<? if ($__search_results && !$SearchSetting['empty_search']) { ?>

<b><?=$AR_MSG['SearchModule']['msg9']?></b>&nbsp;<?=$cid?>

<? } ?>

</td>
<td valign="top" style="padding-left: 10px">
	
	<? if ($SearchSetting['groups_count'] > 1) { ?>
	
	<b><?=$AR_MSG['SearchModule']['msg41']?></b>&nbsp;
	
	<?
		$sLink = new cLink($_SERVER['REQUEST_URI'], '');
		$sLink->removeQueryParam("g");
        $sLink->removeQueryParam("article");
	?>
	
	
	<select onchange="window.location.href = '<?=$sLink->link?>&g='+this.value.replace(/:.*$/,'')+'&article='+this.value.replace(/^.*:/,'')">
	
	<? foreach ($alternatives as $dat_id=>$row) { ?>
	
			<option value="<?=$row['id']?>:<?=$row['code']?>" <?=($_REQUEST['g']==$row['id']?'selected="selected"':'')?>>
				<?=$row['brand']?>
			</option>

	<? } ?>

	</select>
	
	<? } ?>

</td></tr>
</table>

<? if ($basket_check != 1) { ?>

<? $st_c = 0 ?>
<table border="0" cellpadding='1' cellspacing="0" width="100%" style="border-top: 1px solid #A0A0A0; border-bottom: 1px solid #A0A0A0">

<caption><?=$AR_MSG['SearchModule']['msg42']?></caption>

<? foreach ($searchStat as $key=>$searchN) { ?>

<? if ($st_c % 7 == 0) { ?><tr><? } ?>

<?
	$st_c++;
	$link = new cLink($_SERVER['REQUEST_URI'], '');
  
    $link->removeQueryParam("g");
    $link->removeQueryParam("article");

    $link->addQueryParam("article", $searchN['sse_search_number']);
?>
<td><a href="<?=$link?>"><b><?=$searchN['sse_search_number']?></b></a></td>
<? if ($st_c % 7 == 0) { ?><tr><? } ?>

<? } ?>

</table><br>

<? } ?><?  ?>

		<? } else { ?>

			<h1><?=$AR_MSG['SearchModule']['msg1']?></h1>

		<? } ?>

		<? if ($search_from_catalog) { ?>
			
			<li><p><a href="<?=$SearchSetting['catalog_search_url']?>"><?=$AR_MSG['SearchModule']['msg2']?></a></p></li>

		<? } ?>

		<? if ($SearchSetting['searchMode'] == "An") { ?>
			<div id="tree_searchmode_An">
				<?  ?>		
<style>

	body {
		font-size: 11px
	}

	.scol_0 {
		width: 600px;
	}
	
	.scol_1 {

		position: absolute;
		left: 100px;
		width: 150px;
		margin-right: 5px;
		vertical-align: top;

	}

	.scol_2 {
		position: absolute;
		left: 250px;
		width: 200px;
		margin-right: 5px;

	}
	
	.scol_3 {
		position: absolute;
		left: 400px;
		width: 300px;
		margin-right: 5px;

	}
	
	.scol_4 {

		width: 50px;
		margin-right: 5px;
		text-align: center;

	}
	
	.scol_5 {

		width: 30px;
		margin-right: 5px;
		text-align: center;

	}
	
	.searchBox {
		width: 100%;
		border: #B3E0FF solid 1px;
		background: #F9F9F9;
	}
	
	img {
		border: 0px;
	}
	
	a {
		text-decoration: none;
		cursor: hand;
	}
	
	
	a.normal {
		text-decoration: underline;
		cursor: hand;
	}
	
	div.analogTreeNode {
		width: 100%; padding-left: 50px;
		background: #FFFFFF;
	}
	
	div.analogTreeNode1 {
		width: 100%; padding-left: 50px;
		background: #A0A0A0;
	}
	
	div.analogTreeNode2 {
		width: 100%; padding-left: 50px;
		background: #C0C0C0;
	}
	
	div.analogTreeNode3	 {
		width: 100%; padding-left: 50px;
		background: #A0A0A0;
		color: #FFFFFF;
	}
	
</style>
	
	<script type="text/javascript" src="/_syslib/custom.dtree.js"></script>
	
	<script type="text/javascript">

	
		<?	$loopbackCheck = array(); ?>
		
		tecdocTree = new dTree('tecdocTree', '/images/ar2-tree');
		
		
<?

	$rowStr    = "<nobr><div class=\"analogTreeNode\">";
	
	$rowStr  .= "<span class=\"scol_0\">&nbsp;</span>";
	
	$rowStr  .= "<span class=\"scol_1\">".$SearchSetting['searchCodeInfo'][0]['code']."</span>";
	
	$rowStr  .= "<span class=\"scol_2\">".$SearchSetting['searchCodeInfo'][0]['prd_name']."</span>";
	
	$rowStr  .= "<span class=\"scol_3\">".$SearchSetting['searchCodeInfo'][0]['name']."</span>";
	
	$rowStr  .= "</div></nobr>";
	
	$rowStr = preg_replace("#[\r\n\t]+#Uis"," ",$rowStr);

	global $CMS_API;
	$href = $CMS_API->checkAccess("/admin/webavtr/analogs\.html");

	echo "tecdocTree.add(".$SearchSetting['searchCodeInfo'][0]['detail_id'].", -1, '$rowStr', ".($href ? "'/admin/webavtr/analogs.html?d1_code=".strip_tags($SearchSetting['searchCodeInfo'][0]['code'])."&prd1_name=".strip_tags($SearchSetting['searchCodeInfo'][0]['prd_name'])."&partSearch=1'" : "''").", '".$AR_MSG['SearchModule']['11']."', '_blank');";
	
		
		foreach ($__search_results['data'] as $dat_id=>$row) { 

				
			if ($row['detail_id'] != $row['cross_detail_id'] && !isset($loopbackCheck[$row['detail_id']])) {
					
				$rowStr    = "<div class=\"analogTreeNode".$row['cross_level']."\">";
	
				$rowStr  .= "<span class=\"scol_0\">&nbsp;</span>";	
				$rowStr  .= "<span class=\"scol_1\">&nbsp;".$row['article']."</span>";
				$rowStr  .= "<span class=\"scol_2\">".strtoupper($row['brand'])."</span>";
				$rowStr  .= "<span class=\"scol_3\">".$row['spare_info']."</span>";
				
				$rowStr  .= "</div></nobr>";
				
				$rowStr = preg_replace("#[\r\n\t]+#Uis"," ",$rowStr);
										
				echo "tecdocTree.add(".$row['detail_id'].", ".$row['cross_detail_id'].", '".$rowStr."', ".($href ? "'/admin/webavtr/analogs.html?d1_code=".strip_tags($row['article'])."&prd1_name=".strip_tags($row['brand'])."&partSearch=1'" : "''").", '".$AR_MSG['SearchModule']['11']."', '_blank');";
				
			}
			
			$loopbackCheck[$row['detail_id']] = 1;		
			
		} ?>
		
		document.write(tecdocTree);	
		

	</script><?  ?>
			</div>
			
		<? } else { ?>

			<? if ($__search_results['controls']) { ?>
				
				<?  ?><? foreach ($__search_results['controls'] as $hdr_id => $control) { ?>

	<div class="<?= ($hdr_id == "filter" ? 'notice' : '') ?>" style="padding-bottom: 0px;<?= ($hdr_id == "filter" ? 'min-width:1000px;' : '') ?>">
		<?= $control ?>
	</div>

<? } ?><?  ?>

			<? } ?>

			<?  ?><form action="<?=$SearchSetting['basketURL']?>" method="POST">

<? if ($SearchSetting['useOrderColumn'] == 1) { ?>

<input type="hidden" name="func" value="add">
<div class="searchPrderButton"><input type="submit" value="<?=$AR_MSG['SearchModule']['msg46']?>"></div><br>

<? } ?>

<table border="0" class="web_ar_datagrid" width="100%">

<?  ?><tr>
	<? foreach ($__search_results['header'] as $hdr_id => $column) { ?>

		<? if ($column['visible'] == true) { ?>
			<th class="col_<?=$hdr_id?>"><?= $column['caption'] ?></th>
		<? } ?>

	<? } ?>

	<? if ($basket_check) { ?>
		<th><?= $__search_results['header']['final_price_val']['caption'] ?></th>
		<th><?= $__search_results['header']['percent_term']['caption'] ?></th>
	<? } ?>
</tr><?  ?>

<? $showDelivery = array(); ?>

<? foreach ($__search_results['data'] as $dat_id=>$row) { ?>

<?
if ($row['info_only'] == 1) {
	
	if (($SearchSetting['searchCode'] != $row['parsed_article']) or ($ZeroResultShown == 1)) {
	
		continue;
		
	} else {
		
		foreach ($__search_results['data'] as $dat_id2=>$row2) {
		
		    if (($row['parsed_article'] == $row2['parsed_article']) && ($dat_id != $dat_id2) && ($row2['info_only'] == 0) && ($row['prd_info_link'] == $row2['prd_info_link'])) { 
    			continue 2;
			}

		}
		
		$ZeroResultShown = 1;

	}

} 
?>

<?
 
if (($isProvider['provider_id'] == $row['provider_id']) && ($row['provider_id']>0)) { 
	$class = 'provider_row'; 
} elseif ($dat_id % 2 == 0) {
	$class = 'even';
} else {
	$class = 'odd';
}
?>

<tr <?=($row['sts_style']!=''?'style="'.$row['sts_style'].'"':'class="'.$class.'"')?>>

	<? foreach ($__search_results['header'] as $hdr_id=>$column) { ?>
		
		<? if ($column['visible']==true) { ?>
		
		<? 
			switch($hdr_id) {
				
				case 'spare_info': {
					$col_align = 'left';
				} break;
				
				case 'final_price':
				case 'customer_price':
				case 'dlv_weight_tax':
				case 'price_brutto': {
					$col_align = 'right';
				} break;
				
				default: {
					$col_align = 'center';
				}
				
			}
		?>
		<td class="col_<?=$hdr_id?>" align="<?= $col_align ?>">
		
			<?  ?>

<? if ($hdr_id == 'term') { ?>

	<? if (($row['term'] > 0) && ($row['info_only'] == 0)) { ?>
		<?= $row[$hdr_id] ?>
	<? } elseif (($row['term'] == 0) && ($row['info_only'] != 1)) { ?>
		<?= $AR_MSG['SearchModule']['msg12'] ?>
	<? } elseif ($row['info_only'] == 1) { ?>
		-
	<? } ?>

<? } elseif ($hdr_id == 'evaluation') { ?>

	<? if (($row['info_only'] != 1) && ($SearchSetting['statShow'] == 1)) { ?>
		<a href="#" onclick="prov_stat = window.open('/shop/provider_stat.html?pv=<?= $row['provider_id'] ?>&t=<?= $row['term'] ?>', '', 'width=500,height=450'); prov_stat.focus();">
	<? } ?>

	<? if ($row['info_only'] != 1) { ?>
		<?= $row['evaluation'] ?>
	<? } ?>

	<? if (($row['info_only'] != 1) && ($SearchSetting['statShow'] == 1)) { ?>
		</a>
	<? } ?>
<? } elseif ($hdr_id == 'prd_info_link') { ?>

	<?=(!empty($row['prd_info_exist']) ? " <a href='/info/producers.html?prd=" . $row['prd_info_exist'] ."' target='_blank'>" . $row['prd_info_link'] . " </a>" : $row['prd_info_link']);?>

<? } elseif ($hdr_id == 'article') { ?>

	<span <?= ($row['parsed_article'] == $SearchSetting['searchCode'] ? 'class="web_ar_search_code"' : '') ?>>
		<nobr><?= $row['article'] ?></nobr>

		<? if ($row['superseded_by'] != '') { ?>

			<? $show_replacement_conditions = 1; ?>
			<span style="color: #990000"><sup>
					<a title="<?= $AR_MSG['SearchModule']['msg14'] ?> <?= $row['superseded_by'] ?>"
					   style="font-weight: bold; width: 10px; background: #990000; color: #FFFFFF; padding: 1px; cursor: default"><?= $AR_MSG['SearchModule']['msg48'] ?></a>
				</sup></span>

		<? } elseif ($row['replacement_for'] != '') { ?>

			<? $show_replacement_conditions = 1; ?>

			<span style="color: #990000"><sup>
					<a title="<?= $AR_MSG['SearchModule']['msg15'] ?> <?= $row['replacement_for'] ?>"
					   style="width: 10px; background: #000000; color: #FFFFFF; padding: 1px; cursor: default"><?= $AR_MSG['SearchModule']['msg49'] ?></a>
				</sup></span>
		<? } ?>
			
		</span>

<? } elseif ($hdr_id == 'brand') { ?>

	<div <?= ($row['brand_full_name'] != "" ? 'title="' . $row['brand_full_name'] . '"' : '') ?>>

		<? if ($row['oem_brand'] == 1) { ?>
			<span id="web_ar_oem_brand">
		<?= $row['brand'] ?>
		</span>
		<? } else { ?>
			<?= $row['brand'] ?>
		<? } ?>
	</div>

<? } elseif ($hdr_id == 'remains') { ?>

	<? if ($row['info_only'] == 0) { ?>

		<? if ($row['remains'] == $AR_MSG['SearchModule']['msg16']) { ?>
			<img src="/images/check.gif" title="<?= $AR_MSG['SearchModule']['msg16'] ?>"
				 alt="<?= $AR_MSG['SearchModule']['msg16'] ?>"/>
		<? } elseif (($SearchSetting['showExactRemains'] == 1) && ($row['remains'] != '')) { ?>
			<?= $row['remains'] ?>
		<? } elseif ($row['remains'] > 0) { ?>
			<?= $row['remains'] ?>
		<? } else { ?>
			-
		<? } ?>

	<? } else { ?>
		-
	<? } ?>

<? } elseif ($hdr_id == 'destination_display') { ?>

	<?= $row['destination_display'] ?>

<? } elseif ($hdr_id == 'action') { ?>

	<? if (($row['info_only'] != '1') || ($row['provider_price'] > 0)) { ?>
		<?= $row[$hdr_id] ?>
	<? } ?>

<? } elseif ($hdr_id == 'orderm') { ?>

	<? if (($row['info_only'] != '1') || ($row['provider_price'] > 0)) { ?>
		<?= $row[$hdr_id] ?>
	<? } ?>

<? } elseif ($hdr_id == 'min_quantity') { ?>

	<? if ($row['min_quantity'] > 0) { ?>
		<?= $row[$hdr_id] ?>
	<? } ?>

<? } elseif ($hdr_id == 'info') { ?>

	<?

	$detailInfo = array(
		"article" => $row['parsed_article'],
		"brand"   => $row['brand']
	);

	$detailLink = data2str($detailInfo, true, true);

	?>

	<a href="#"
	   onclick="window.open('/info/detail.html?sid=<?= $row['_search_id'] ?>&detailLink=<?= $detailLink ?>','','width=800,height=600,scrollbars=yes'); return false;"><img
			src="/images/info.gif" border="0" title="<?= $AR_MSG['SearchModule']['msg17'] ?>"
			alt="<?= $AR_MSG['SearchModule']['msg17'] ?>" hspace="1" align="absmiddle"/></a>

	<? if ($row['picture']) { ?>
		<a href="#"
		   onclick="window.open('/info/detail.html?sid=<?= $row['_search_id'] ?>&did=<?= $row['detail_id'] ?>&detailLink=<?= $detailLink ?>','','width=800,height=600,scrollbars=no');return false;"><img
				src="/images/picture.gif" border="0" title="<?= $AR_MSG['SearchModule']['msg18'] ?>"
				alt="<?= $AR_MSG['SearchModule']['msg18'] ?>" hspace="1" align="absmiddle"/></a>
	<? } ?>

	<? if ($row['weight'] && ($row['weight'] > 0)) { ?>
		<img src="/_sysimg/ar2/weight.gif" border="0"
			 title="<?= $AR_MSG['SearchModule']['msg19'] ?> = <?= number_format($row['weight'], 3, '.', ' ') ?>"
			 alt="<?= $AR_MSG['SearchModule']['msg19'] ?> = <?= number_format($row['weight'], 3, '.', ' ') ?>"
			 hspace="1" align="absmiddle"/>
	<? } ?>

<? } elseif ($hdr_id == 'price_brutto') { ?>

	<? if (($row['weight'] > 0) && ($row['cost_per_weight'] > 0)) { ?>

		<?= $row['price_brutto'] ?>

	<? } ?>

<? } elseif ($hdr_id == 'final_price') { ?>

	<? if ($row['provider_price'] == 0) { ?>
		-
	<? } elseif ($row['provider_price'] == '') { ?>
		-
	<? } else { ?>

		<? $final_price = $row[$hdr_id]; ?>
		<nobr><?= $row[$hdr_id] ?>

		<sup>
			<font color="#990000">

				<?
				if (count($Deliveries) > 0) {
					foreach ($Deliveries as $dlv => $cur_dlv) {

						if ($cur_dlv['delivery_condition'] == $row['delivery_condition']) {

							if ((($row['weight'] == 0) and ($cur_dlv['tax'] > 0)) || ($cur_dlv['tax'] == 0) || ($cur_dlv['tax'] == '')) {

								if (!safeArrayKey($showDelivery, $row['delivery_condition'])) {
									$showDelivery[$row['delivery_condition']] = $cur_dlv;
								}

								echo array_search($row['delivery_condition'], array_keys($showDelivery)) + 1;

							}

						}

					}
				}
				?>

			</font>
		</sup>

		<? if (($row['cost_per_weight'] > 0) && (!empty($row['cost_per_weight_display'])) and empty($row['weight'])) { ?>
			+ <?= $row['cost_per_weight_display'] ?>/<?=tr('кг', 'Common')?>.
		<? } ?>

	<? } ?>
	</nobr>

	<? if ($row['phand_value'] != 0) { ?>

		<br/>
		<small><span id="phand"><?= $AR_MSG['SearchModule']['msg20'] ?>&nbsp;<nobr><?= $row['detail_phand'] ?></nobr></span>
		</small>

	<? } ?>

<? } elseif ($hdr_id == 'date') { ?>

	<? if (($row['info_only'] != '1') || ($row['provider_price'] > 0)) { ?>
		<?= $row[$hdr_id] ?>
	<? } else { ?>
		-
	<? } ?>

<? } else { ?>

	<?= $row[$hdr_id] ?>

<? } ?><?  ?>

		</td>
		
		<? } ?>

	<? } ?>
	
	<? if ($basket_check == 1) { ?>
        <td align="right">
			<? if ($row['final_price_val'] && ($desire_price != 0)) { ?>
				<?=number_format((($row['final_price_val'] - $desire_price) / $desire_price *100), 2, '.', ' ')?>
			<? } ?>
		</td>
        <td align="right">
			<? if ($row['max_term'] && ($desire_term != 0)) { ?>
				<?=number_format((($row['max_term'] - $desire_term) / $desire_term *100), 2, '.', ' ')?>
			<? } elseif ($row['term'] && ($desire_term !=0 )) { ?>
				<?=number_format((($row['term'] - $desire_term) / $desire_term *100), 2, '.', ' ')?>
  	
            <? } ?>
        </td>
    <? } ?>
</tr>

<? } ?>

</table>

</form><?  ?>

			<? if ($__search_results['controls']) { ?>

				<? foreach ($__search_results['controls'] as $hdr_id=>$control) { ?>

					<? if ($hdr_id !== 'searchPages') { continue; } ?>
					<div class="<?=($hdr_id=="filter"?'notice':'')?>" style="padding-top: 0px; padding-bottom: 0px;<?=($hdr_id=="filter"?'min-width:1000px;':'')?>">
						<?=$control?>
					</div>

				<? } ?>

			<? } ?>

		<? } ?>

		<?  ?><? if (!$SearchSetting['admin_search']) { ?>

<noindex>
<p><small><a href="/shop/report_error.html?errid=E2&article=<?=$SearchSetting['dirtySearchCode']?>&brand=<?=$SearchSetting['searchBrand']?>"><img src="/_sysimg/info2.gif" align="absmiddle" hspace="5" border="0"/><?=$AR_MSG['SearchModule']['msg21']?></a></small></p>
</noindex>

<? if (($clientData['cst_category_id'] > 1) && !$clientData['retail']) { ?>

<div style="background: #D0D0D0; padding: 10px; margin-top: 10px; margin-bottom: 10px;">

<b><?=$AR_MSG['SearchModule']['msg22']?></b>

</div>

<? } ?>

<? } ?>

<?
	
	if (sizeof($showDelivery)>0 || $show_replacement_conditions) {
	$Deliveries = $showDelivery;
	$k = 0;
	
?>
<div class="notice"><b><?=$AR_MSG['SearchModule']['msg23']?></b>

<? foreach ($Deliveries as $dlv=>$delivery) { ?>

<? $k++; ?>	

<div style="padding: 10px">

<sup><font color="#990000"><?=$k?></font></sup>		
<?=$delivery['dlv_text']?>&nbsp;
</div>

<? } ?>

<? if ($show_replacement_conditions==1) { ?>

<div style="padding: 5px">
<span style="color: #990000"><sup>
			<a title="<?=$row['superseded_by']?>" style="font-weight: bold; width: 10px; background: #990000; color: #FFFFFF; padding: 1px; cursor: default"><?=$AR_MSG['SearchModule']['msg48']?></a>
			</sup></span>		
<?=$AR_MSG['SearchModule']['msg24']?>&nbsp;
</div>

<div style="padding: 5px">
<span style="color: #990000"><sup>
			<a title="<?=$row['replacement_for']?>" style="width: 10px; background: #000000; color: #FFFFFF; padding: 1px; cursor: default"><?=$AR_MSG['SearchModule']['msg49']?></a>
			</sup></span>	
<?=$AR_MSG['SearchModule']['msg25']?>&nbsp;
</div><br/>

<? } ?>

</div>

<? } ?><?  ?>

	<? } ?>

	<? if ($SearchSetting['invalid_search']) { ?>
		
		<?  ?><?=$AR_MSG['SearchModule']['msg26']?>
	<?=$AR_MSG['SearchModule']['msg27']?>
	<?=$AR_MSG['SearchModule']['msg28']?>
	<?=$AR_MSG['SearchModule']['msg29']?>
	<?=$AR_MSG['SearchModule']['msg30']?>
	<?=$AR_MSG['SearchModule']['msg31']?><?  ?>

	<? } ?>

<? } else { ?>
	
	<?  ?><h2><?=$AR_MSG['SearchModule']['msg39']?></h2>
	
<p><?=$AR_MSG['SearchModule']['msg40']?></p><?  ?>

<? } ?><? 

	}

} else {

	global $__BUFFER;
	$__BUFFER->addCSS('/_syslib/squeezebox/squeezebox_info.css');
	$__BUFFER->addScript('/_syslib/squeezebox/squeezebox.js');

	if ($SearchSetting['csSearchTemplate'] == "groups") {

		 ?><? if ($_SYSTEM->REQUESTED_PAGE == "/shop/basket_check.html") {

	$basket_check = '1';
	$desire_price = $_SESSION['basket']['control']['desire_price'];
	$desire_term = $_SESSION['basket']['control']['desire_term'];

} ?>
<? if (($SearchSetting['authUserSearchOnly'] != 1) || !$SearchSetting['isGuest'] || ($SearchSetting['admin_search'] == 1)) { ?>
	<? if ($SearchSetting['isGuest']) { ?>
		<div class="warning" style="width:auto;">
			<div class="warning_caption"><?= $AR_MSG['SearchModule']['msg55'] ?></div>
		</div>
	<? } ?>
	<h1><?= $AR_MSG['SearchModule']['msg1'] ?> <span class="search_code"><?= $SearchSetting['searchCode'] ?></span></h1>

	<? if ($SearchSetting['empty_search']) { ?>

		<?  ?><ul>

	<? if ($SearchSetting['search_from_catalog']) { ?>
	<li><p><a href="<?= $SearchSetting['catalog_search_url'] ?>"><?= $AR_MSG['SearchModule']['msg2'] ?></a></p>
		<? } ?>
	<li>
		<nobr><?= $AR_MSG['SearchModule']['msg3'] ?></nobr>
		<br/>
		<?= $AR_MSG['SearchModule']['msg4'] ?> <a href="/vin/form.html"><?= $AR_MSG['SearchModule']['msg5'] ?></a>.

		<? if ($SearchSetting['catalog_search']) { ?>
	<li><a href="<?= $SearchSetting['catalog_search_url'] ?>"><?= $AR_MSG['SearchModule']['msg6'] ?></a>
		<? } ?>

</ul><?  ?>

	<? } else { ?>

		<? if ($__search_results) { ?>

			<div id="search_top_controls" class="flc">

				<div id="st_left" class="leftside">
					<?  ?><?
if($alternatives['data']) {
	$alternatives = $alternatives['data'];
}
if(!empty($alternatives)) {
?>
<div id="alternatives_tabs" class="flc">
	<a href="#" id="alt_lar" class="alt_lar" style="display:none;"><img src="/images/alt_lar.png" alt="" title=""/></a>

	<ul id="alternatives_tabs_ul">
		<?

		if (count($alternatives) > 0) {

			$sLink = new cLink($_SERVER['REQUEST_URI'], '');
			$sLink->removeQueryParam("g");
			$sLink->removeQueryParam("brand");

			$i = 0;

			foreach ($alternatives as $key => $alt) {

				if ($_REQUEST['g'] == $alt['id']) {
					$alt_active = $i;
				}

				?>
				<li id="alt_g<?= $alt['id'] ?>" class="alt_item<?= ($_REQUEST['g'] == $alt['id'] || strtoupper($_REQUEST['brand']) == strtoupper($alt['brand']) ? ' tab_active' : '') ?>">
					<a href="<?= ($sLink->link . '&g=' . $alt['id']) ?>" class="alt_link" style="display: block;">
						<span class="tab_act"></span>
						<span class="alt_brand"><?= $alt['brand'] ?></span>
						<span class="alt_info" title="<?= $alt['spare_info'] ?>"><?= (strlen($alt['spare_info']) <= 15 ? $alt['spare_info'] : substr($alt['spare_info'], 0, 15) . '...') ?></span>
					</a>
				</li>
				<?
				$i++;
			}

		}
		?>
	</ul>
	<a href="#" id="alt_rar" class="alt_rar" style="display:none;"><img src="/images/alt_rar.png" alt="" title=""/></a>

	<?
	$group = ((int)$_REQUEST['g'] > 0 ? $_REQUEST['g'] - 1 : 0);
	$max_group = count($alternatives) - 1;

	$__BUFFER->addScript('/_syslib/class.TabLister.js');
	?>

	<script type="text/javascript">

		function initTabLister() {

			var cw = $('content_inner').getSize().x - $('st_right').getSize().x - 50;

			var TL = new TabLister({
				tab_active: <?=(int)$alt_active?>,
				tab_max: <?=(int)$max_group?>,
				container_width: cw,
				left_arrow_selector: 'alt_lar',
				right_arrow_selector: 'alt_rar',
				item_selector: '.alt_item'
			});

		}

	</script>

</div>
<? } ?><?  ?>
				</div>

				<div id="st_right" class="rightside">
					<div id="search_currency" class="flc">
				<span class="rightside"><?=$cid?></span><span class="rightside l1"><?=$AR_MSG['SearchModule']['msg9']?></span>
					</div>
					<div id="search_navigation" class="flc">
						<div class="rightside">
							<?= $__search_results['controls']['searchPages'] ?>
						</div>
					</div>
				</div>

			</div>

			<? if (!$admin_search) { ?>

				<?  ?><?  ?>

			<? } else { ?>

				<?= $AR_MSG['SearchModule']['msg1'] ?>

			<? } ?>

			<? if ($search_from_catalog) { ?>

			<li><p><a href="<?=$SearchSetting['catalog_search_url']?>"><?=$AR_MSG['SearchModule']['msg2']?></a></p></li>

			<? } ?>

			<? if ($SearchSetting['searchMode'] == "An") { ?>

				<?  ?>		
<style>

	body {
		font-size: 11px
	}

	.scol_0 {
		width: 600px;
	}
	
	.scol_1 {

		position: absolute;
		left: 100px;
		width: 150px;
		margin-right: 5px;
		vertical-align: top;

	}

	.scol_2 {
		position: absolute;
		left: 250px;
		width: 200px;
		margin-right: 5px;

	}
	
	.scol_3 {
		position: absolute;
		left: 400px;
		width: 300px;
		margin-right: 5px;

	}
	
	.scol_4 {

		width: 50px;
		margin-right: 5px;
		text-align: center;

	}
	
	.scol_5 {

		width: 30px;
		margin-right: 5px;
		text-align: center;

	}
	
	.searchBox {
		width: 100%;
		border: #B3E0FF solid 1px;
		background: #F9F9F9;
	}
	
	img {
		border: 0px;
	}
	
	a {
		text-decoration: none;
		cursor: hand;
	}
	
	
	a.normal {
		text-decoration: underline;
		cursor: hand;
	}
	
	div.analogTreeNode {
		width: 100%; padding-left: 50px;
		background: #FFFFFF;
	}
	
	div.analogTreeNode1 {
		width: 100%; padding-left: 50px;
		background: #A0A0A0;
	}
	
	div.analogTreeNode2 {
		width: 100%; padding-left: 50px;
		background: #C0C0C0;
	}
	
	div.analogTreeNode3	 {
		width: 100%; padding-left: 50px;
		background: #A0A0A0;
		color: #FFFFFF;
	}
	
</style>
	
	<script type="text/javascript" src="/_syslib/custom.dtree.js"></script>
	
	<script type="text/javascript">

	
		<?	$loopbackCheck = array(); ?>
		
		tecdocTree = new dTree('tecdocTree', '/images/ar2-tree');
		
		
<?

	$rowStr    = "<nobr><div class=\"analogTreeNode\">";
	
	$rowStr  .= "<span class=\"scol_0\">&nbsp;</span>";
	
	$rowStr  .= "<span class=\"scol_1\">".$SearchSetting['searchCodeInfo'][0]['code']."</span>";
	
	$rowStr  .= "<span class=\"scol_2\">".$SearchSetting['searchCodeInfo'][0]['prd_name']."</span>";
	
	$rowStr  .= "<span class=\"scol_3\">".$SearchSetting['searchCodeInfo'][0]['name']."</span>";
	
	$rowStr  .= "</div></nobr>";
	
	$rowStr = preg_replace("#[\r\n\t]+#Uis"," ",$rowStr);

	echo "tecdocTree.add(".$SearchSetting['searchCodeInfo'][0]['detail_id'].", -1, '$rowStr', '/admin/webavtr/analogs.html?d1_code=".strip_tags($SearchSetting['searchCodeInfo'][0]['code'])."&prd1_name=".strip_tags($SearchSetting['searchCodeInfo'][0]['prd_name'])."&partSearch=1', '".$AR_MSG['SearchModule']['11']."', '_blank');";
	
		
		foreach ($__search_results['data'] as $dat_id=>$row) { 

				
			if ($row['detail_id'] != $row['cross_detail_id'] && !isset($loopbackCheck[$row['detail_id']])) {
					
				$rowStr    = "<div class=\"analogTreeNode".$row['cross_level']."\">";
	
				$rowStr  .= "<span class=\"scol_0\">&nbsp;</span>";	
				$rowStr  .= "<span class=\"scol_1\">&nbsp;".$row['article']."</span>";
				$rowStr  .= "<span class=\"scol_2\">".strtoupper($row['brand'])."</span>";
				$rowStr  .= "<span class=\"scol_3\">".$row['spare_info']."</span>";
				
				$rowStr  .= "</div></nobr>";
				
				$rowStr = preg_replace("#[\r\n\t]+#Uis"," ",$rowStr);
										
				echo "tecdocTree.add(".$row['detail_id'].", ".$row['cross_detail_id'].", '".$rowStr."', '/admin/webavtr/analogs.html?d1_code=".strip_tags($row['article'])."&prd1_name=".strip_tags($row['brand'])."&partSearch=1', '".$AR_MSG['SearchModule']['11']."', '_blank');";
				
			}
			
			$loopbackCheck[$row['detail_id']] = 1;		
			
		} ?>
		
		document.write(tecdocTree);	
		

	</script><?  ?>

			<? } else { ?>

				<? if ($__search_results['controls']) { ?>

					<?  ?><? foreach ($__search_results['controls'] as $hdr_id=>$control) { ?>

<? if ($hdr_id == 'searchPages') continue; ?>

<div class="<?=($hdr_id=="filter"?'notice':'')?>" style="padding-top: 0px; padding-bottom: 0px">
	<?=$control?>
</div>

<? } ?><?  ?>

				<? } ?>

				<?  ?><?  ?><script type="text/javascript">

	function toggleRow(rowObj) {

		if (rowObj.clicked) {
			return;
		}

		if (jqWar(rowObj).hasClass('mouseover')) {
			jqWar(rowObj).removeClass('mouseover');
		} else {
			jqWar(rowObj).addClass('mouseover');
		}

	}

	function clickRow(rowObj) {

		if (jqWar(rowObj).hasClass('clicked')) {
			jqWar(rowObj).removeClass('clicked');
			rowObj.clicked = false;
		} else {
			jqWar(rowObj).addClass('clicked');
			rowObj.clicked = true;
		}

	}

	function fixedCaption() {

		if (!$('fixedSearchCaptionMain') || !$('search_table_caption_main')) {
			return;
		}

		$('fixedSearchCaptionMain').innerHTML = $('search_table_caption_main').innerHTML;
		$('fixedSearchCaption').innerHTML = '<table class="web_ar_datagrid" id="fixed_search_header">' + $('search_header').innerHTML + '</table>';
		$('fixedCaption').style.width = $('search_table_caption_main').getCoordinates().width + 'px';

		if (typeof ajaxSearch == "function") {
			$$('#fixedCaption a[href^=/search.html]').addEvent('click', function (el) {
				ajaxSearch(this.href);
				return false;
			});
		}

		$$('#fixed_search_header th').each(function (el, index) {
			parEl = $$('#search_header th')[index];
			el.style.width = (parEl.getSize().x - parEl.getStyle('borderLeftWidth').replace('px', '') - parEl.getStyle('borderRightWidth').replace('px', '') - parEl.getStyle('paddingLeft').replace('px', '') - parEl.getStyle('paddingRight').replace('px', '')) + 'px';
		});

	}

	function add_basket(id) {

		amount = $('amount' + id).value || 1;

		<? if ($SearchSetting['admin_search'] != 1) { ?>

			<? if ($_interface->csCheckRemainsInSearch) { ?>
				if (jqWar('#max_amount_' + id)) {
					maxAmount = jqWar('#max_amount_' + id).val().toFloat();
					if (maxAmount > 0 && maxAmount < amount.toFloat()) {
						msg = '<?=tr('Данный товар доступен только в количестве %s. Поместить в корзину заказ на доступное количество?', 'SearchModule')?>';
						msg = msg.replace('%s', maxAmount);
						if (!confirm(msg)) {
							return false;
						} else {
							amount = maxAmount;
						}
					}
				}
			<? } ?>

			var u = '/shop/basket.html?func=add&sid=' + id + '&amount=' + amount;
			if ($('action' + id)) {
				var url = '/_ajax/basket.html?func=add&sid=' + id + '&amount=' + amount;
				if ($('top-basket-count')||$('top-basket-count2')) {
					url = url+'&show=count';
				}
				$('action' + id).innerHTML = '<img src="/images/add_basket_loader.gif" alt="<?=tr('Добавление в корзину...', 'SearchModule')?>" title="<?=tr('Добавление в корзину...', 'SearchModule')?>" />';
				var lRequest = new Request({
					url: url,
					async: true,
					evalScripts: false,
					onSuccess: function (resp) {
						$('action' + id).innerHTML = '<span class="button button_to_basket">' +
									'<a href="/shop/basket.html" title="<?=tr('В корзину', 'SearchModule')?>">' +
										'<span class="basket_active_img"></span>' +
										'<span class="basket_items_count">' +
											amount +
										'</span>' +
									'</a>' +
								'</span>';
						if ($('user_top_links')) {
							$('user_top_links').style.display = 'block';
						}
						if ($('user_top_links2')) {
							$('user_top_links2').style.display = 'block';
						}
						if ($('top-basket-count')) {
							$('top-basket-count').innerHTML=resp;
						}
						if ($('top-basket-count2')) {
							$('top-basket-count2').innerHTML=resp;
						}
					}
				}).send();
			} else {
				window.location.href = u;
			}
		<? } else { ?>
			var u = '/admin/eshop/basket.html?func=add&sid=' + id + '&amount=' + amount;
			window.location.href = u;
		<? } ?>

		return false;

	}

	function horizontalFixedScroll(el, elPage) {
		var scrolled = 0,
			oldScrol = 0,
			el = (typeof el == 'string') ? document.getElementById(el) : el,
			elStyle,
			postiLeft,
			widthEl,
			widthFix,
			maxWidth;
		if (el) {
			elStyle = el.style;

			window.onresize = function () {
				widthFix = el.offsetWidth;
				if (widthFix == 0) return;
				elStyle.left = '';
				oldScrol = window.pageXOffset || document.documentElement.scrollLeft;
				widthEl = elPage.offsetWidth;
				if (widthFix != widthEl) {
					el.style.width = widthEl + 'px';
				}
				$$('#fixed_search_header th').each(function (th, index) {
					parEl = $$('#search_header th')[index];
					th.style.width = (parEl.getSize().x - parEl.getStyle('borderLeftWidth').replace('px', '') - parEl.getStyle('borderRightWidth').replace('px', '') - parEl.getStyle('paddingLeft').replace('px', '') - parEl.getStyle('paddingRight').replace('px', '')) + 'px';
				});
			}
			window.onscroll = function () {
				scrolled = window.pageXOffset || document.documentElement.scrollLeft;
				if (oldScrol == scrolled || el.offsetWidth == 0) {
					return;
				}
				postiLeft = (!elStyle.left) ? el.getBoundingClientRect().left : parseInt(elStyle.left, 10) || 0;
				elStyle.left = postiLeft - (scrolled - oldScrol) + 'px';
				oldScrol = scrolled;
			}
		}
	}

	function initSQBox() {

		new Asset.css('/_syslib/squeezebox/squeezebox_info.css', {id: 'SqueezeBox', title: 'SqueezeBox'});

		SqueezeBox.assign($$('a[rel=state_info]'), {
			size: {x: 520, y: 440},
			handler: 'iframe',
			ajaxOptions: {
				method: 'get'
			}
		});

		SqueezeBox.assign($$('a[rel=detail_info]'), {
			size: {x: 680, y: 520},
			handler: 'iframe',
			ajaxOptions: {
				method: 'get'
			}
		});

		<? if($SearchSetting['usePrdInfoSQBox']) :?>

			$$('a[rel=prd_info_link]').each(function (el, index) {

				var prd_id = el.getAttribute('data-prdId');

				el.href = '/info/producers_blank.html?prd=' + prd_id;

				SqueezeBox.assign(el, {
					size: {x: 680, y: 520},
					handler: 'iframe',
					ajaxOptions: {
						method: 'get'
					}
				});

			});

		<?endif?>

		horizontalFixedScroll('fixedCaption', $$('.search_results')[0]);

	}

</script><?  ?>

<?  ?><script language="JavaScript">

	function setScroll(type) {
		try {
			var captionHeight = getHeightForce($('fixedCaption'));
			var targetPosition = $(type + '_target').getPosition().y;
			scroll(0, targetPosition - captionHeight);
		} catch (e) {
		}
		return false;
	}

	function setFixedSearch(forced) {
		if (!$('search_table_caption_main')) {
			return;
		}
		if (($('page').getScroll().y > $('search_table_caption_main').getCoordinates().bottom) || forced) {
			$('fixedCaption').style.display = 'block';
			$('fs_term').value = $('term').value;
			if (!$('sort___search_results_by') || !$('fs_sort___search_results_by')) return;
			$('fs_sort___search_results_by').value = $('sort___search_results_by').value;
			$('fs_smode').value = $('smode').value;
		} else {
			$('fixedCaption').style.display = 'none';
		}
	}

	window.addEvent('scroll', function () {
		setFixedSearch(false);
	});

	function showFullGroup(id, flHide) {

		if (flHide) {
			jqWar('.showed.group'+id).addClass('hidden');
			jqWar('.showed.group'+id).removeClass('showed');
			jqWar('.group'+id+'.show-many .button-hide').hide();
			jqWar('.group'+id+'.show-many .button-show').show();
		} else {
			jqWar('.hidden.group'+id).addClass('showed');
			jqWar('.hidden.group'+id).removeClass('hidden');
			jqWar('.group'+id+'.show-many .button-show').hide();
			jqWar('.group'+id+'.show-many .button-hide').show();
		}

	}

	function tooggleGroup(id, el) {

		el = jqWar(el);
		if (el.hasClass('close')) {
			el.removeClass('close');
			el.attr('title', '<?=tr('Свернуть предложения', 'SearchModule')?>');
			el.attr('src', '/_sysimg/tree/openall.png');
			jqWar('.group'+id).removeClass('close-tr');
		} else {
			el.addClass('close');
			el.attr('title', '<?=tr('Развернуть предложения', 'SearchModule')?>');
			el.attr('src', '/_sysimg/tree/closeall.png');
			jqWar('.group'+id).addClass('close-tr');
			jqWar('.group'+id)[0].removeClass('close-tr');
		}

	}

</script>
<?  ?>

<link rel="stylesheet" type="text/css" href="/_syscss/autoresource/autoshop/search.css" />

<div style="display:none;"><img src="/images/add_basket_loader.gif"/></div>
<?
$assocBasketWares = array();
if (count($basketWares) > 0) {
	foreach ($basketWares as $basketValue) {
		$assocBasketWares[$basketValue['provider_id']][$basketValue['brand']][$basketValue['article']][(float)$basketValue['price_netto']][$basketValue['destination']][(int)$basketValue['term']][strval(round($basketValue['supplier_price_value'],2))] = ['amount' => $basketValue['amount']];
	}
}
?>

<?  ?><div id="fixedCaption" style="display:none;">
	<div style="background:#f5f6f5;">
		<div id="fixedSearchForm">
			<div id="fxsearch_form">
				<div id="fxsf_shad"></div>
				<form name="fxsearch_code" action="/search.html" method="GET">

					<div id="fxsearch_caption">
						<div class="leftside">
							<?=tr('searchDetailByArticle', 'Template')?>
						</div>
						<? if (!$SearchSetting['isGuest']) { ?>

							<div id="user_top_links2" class="rightside">
								<div class="flc">
									<a href="/shop/basket.html" style="background-image:url(/images/ti_basket.png)">
										<span><?=tr('basket', 'Template')?><span id="top-basket-count2"><?=(int)count($basketWares) ? ' ('.(int)count($basketWares).')' : ''?></span></span>

									</a>
									<a href="/shop/myorders.html" style="background-image:url(/images/ti_orders.png)"><span><?=tr('myOrders', 'Template')?></span></a>
								</div>
							</div>

						<? } else { ?>

							<div id="user_top_links2" class="rightside" style="display:<?= (!empty($client->sourceId) || (isset($basketWares) && (int)count($basketWares) > 0) ? 'block' : 'none') ?>">
								<div class="flc">
									<a href="/shop/basket.html" style="background-image:url(/images/ti_basket.png)"><span><?=tr('basket', 'Template')?><span id="top-basket-count2"><?=(int)count($basketWares) ? ' ('.(int)count($basketWares).')' : ''?></span></span></a>
								</div>
							</div>

						<? } ?>
					</div>

					<div id="fxsearch_line" class="flc">

						<div class="rightside">
							<div id="fxsearch_buttons" class="flc">
								<div class="leftside"><input type="submit" class="submitButton searchButton" name="search" value="<?=tr('searchButton', 'Template')?>" /></div>
							</div>
						</div>

						<div id="fxsearch_input">

							<? $empty_text = tr('exampleArticle', 'Template'); ?>
							<input class="TextBox<?= (empty($_REQUEST['article']) ? '_empty' : '') ?>" type="text" name="article" value="<?= (empty($_REQUEST['article']) ? $empty_text : htmlspecialchars($_REQUEST['article'], ENT_QUOTES)) ?>" onfocus="if (this.value == '<?= $empty_text ?>') {this.value = ''; this.className = 'TextBox_focus';}" onblur="if (this.value == '') {this.value = '<?= $empty_text ?>'; this.className = 'TextBox_empty';} else {this.className = 'TextBox';}"/>
							<input type="hidden" name="term" value="" id="fs_term"/>
							<input type="hidden" name="sort___search_results_by" value="" id="fs_sort___search_results_by"/>
							<input type="hidden" name="smode" value="" id="fs_smode"/>

						</div>

					</div>
				</form>

			</div>
		</div>
		<div id="fixedSearchCaptionMain" class="flc"></div>
		<div id="fixedSearchCaption"></div>
	</div>
	<div id="shadow" style="height:20px; background:url(/images/fixed_grad.png) top left repeat-x; style"></div>
</div><?  ?>

<form action="<?= $SearchSetting['basketURL'] ?>" method="POST">

<? if ($SearchSetting['useOrderColumn'] == 1) { ?>

	<input type="hidden" name="func" value="add">
	<div class="searchPrderButton"><input type="submit" value="<?= $AR_MSG['SearchModule']['msg46'] ?>"></div><br>

<? } ?>

<div id="search_table_caption_main" class="flc">
	<div class="leftside search_caption_left">
		<table class="search_table_black_caption">
			<tr>
				<th><?= $__search_results['header']['prd_info_link']['caption'] ?></th>
				<th><?= $__search_results['header']['article']['caption'] ?></th>
				<th><?= $__search_results['header']['spare_info']['caption'] ?></th>
			</tr>
		</table>
	</div>

	<div class="rightside search_caption_right">
		<span><strong><?=tr('Аналоги', 'SearchModule')?>:</strong></span>
		<span><a href="#orig" id="orig_link" onclick="return setScroll('orig');"><?=tr('оригинальные', 'SearchModule')?></a></span>
		<span><a href="#norig" id="norig_link" onclick="return setScroll('norig');"><?=tr('неоригинальные', 'SearchModule')?></a></span>
		<span><a href="#univers" id="univers_link" onclick="return setScroll('univers');"><?=tr('универсальные', 'SearchModule')?></a></span>
	</div>
</div>

<?
if ($SearchSetting['newGroupsTemplate']) {
	 ?><style>
	.new_article, .search_table_black_caption {
		display: none;
	}
	table.web_ar_datagrid .section_row td {
		padding-bottom: 10px!important;
	}
	#search_table_caption_main .search_caption_right {
		padding-top: 0;
		margin-top: -20px;
	}
	#search_top_controls #search_navigation .paginator {
		padding: 0;
	}
	.close-tr, .hidden, .button-hide {
		display: none;
	}
	.toggle-link-wrapper {
		width: 20px;
		text-align: left;
		display: inline-block;
		height: 16px;
	}
	.web_ar_oem_brand, .web_ar_brand {
		white-space: nowrap;
		overflow: hidden;
	}
	.web_ar_oem_brand img, .web_ar_brand img {
		margin-left: 0px!important;
		cursor: pointer;
	}
</style><? 
	$excludes_array = array('amount', 'weight', 'dlv_weight_tax');
} else {
	$excludes_array = array('prd_info_link', 'article', 'spare_info', 'amount', 'weight', 'dlv_weight_tax');
}
?>

<? $columns = 0; ?>
<? foreach ($__search_results['header'] as $hdr_id => $column) { ?>

	<? if (($column['visible'] != true) or (in_array($hdr_id, $excludes_array))) continue; ?>

	<? $columns++; ?>

<? } ?>

<table class="web_ar_datagrid search_results">
<?  ?><tbody id="search_header">
<tr class="caption_table">

	<? $columns = 0; ?>
	<? foreach ($__search_results['header'] as $hdr_id => $column) { ?>

		<? if (($column['visible'] != true) or (in_array($hdr_id, $excludes_array))) continue; ?>

		<? $columns++; ?>
		<th class="col_<?= $hdr_id ?>">
			<div style="position:relative">
				
				<? if (!empty($column['clm_info'])) { ?>
					<span class="tipz" title="<?= $column['clm_info'] ?>"></span>
				<? } ?>
				<?= $column['caption'] ?>
			</div>
		</th>

	<? } ?>


	<? if ($basket_check) { ?>
		<th><?= $__search_results['header']['final_price_val']['caption'] ?></th>
		<th><?= $__search_results['header']['percent_term']['caption'] ?></th>
		<? $columns += 2; ?>
	<? } ?>
</tr>
</tbody><?  ?>

<?
$match_criteria = '';
$univers = '';
$oem = '';
$article = '';
$show_article = 1;
$show_brand = 1;
$indexGroup = 0;
?>

<? $showDelivery = array(); ?>

<? foreach ($__search_results['data'] as $dat_id => $row) { ?>

	<?
	if ($row['info_only'] == 1) {

		if (($SearchSetting['searchCode'] != $row['parsed_article']) or ($ZeroResultShown == 1)) {

			continue;

		} else {

			foreach ($__search_results['data'] as $dat_id2 => $row2) {

				if (($row['parsed_article'] == $row2['parsed_article']) && ($dat_id != $dat_id2) && ($row2['info_only'] == 0)) {
					continue 2;
				}

			}

			$ZeroResultShown = 1;

		}

	}
	?>

	<? if (($article !== $row['parsed_article']) || ($row['brand'] !== $brand)) {
		$article = $row['parsed_article'];
		$brand = $row['brand'];
		$show_article = 1;
		$new_line = 1;
	} else {
		$show_article = 0;
		$new_line = 0;
	}
	$echoShowMany = false;
	$oldMC = false;
	?>

	<? if ($row['match_criteria'] != $match_criteria) {
		$show_article = 1;
		$new_line = 0;
		$match_criteria = $row['match_criteria'];

		if ($match_criteria == 0) { ?>

			<?  ?><? if ($SearchSetting['csAmountForGroup'] and $SearchSetting['csAmountForGroup'] < $counterRowsAB and !$echoShowMany) { ?>	<? $echoShowMany = true; ?>	<? $cntPred = $counterRowsAB-$_interface->csAmountForGroup; ?>	<? $textOpen = trp('Отобразить еще ' . str_replace($cntPred, '%s', declOfNum($cntPred, ['предложение', 'предложения', 'предложений'])), 'SearchModule', $cntPred); ?>	<? $textClose = trp('Скрыть ' . str_replace($cntPred, '%s', declOfNum($cntPred, ['предложение', 'предложения', 'предложений'])), 'SearchModule', $cntPred); ?>	<tr class="show-many group<?=$indexGroup.(($oldMC or !$match_criteria) ? '' : ' close-tr')?>">		<td colspan="<?=$columns?>"><input class="button-show" type="button" value="<?=$textOpen?>" onclick="showFullGroup(<?=$indexGroup?>, 0)"/><input class="button-hide" type="button" value="<?=$textClose?>" onclick="showFullGroup(<?=$indexGroup?>, 1)"/></td>	</tr><? } ?><?  ?>

			<tr class="section_row">
				<td colspan="<?= $columns ?>">
					<div class="flc">
						<span><?= $AR_MSG['SearchModule']['msg43'] ?></span>
					</div>
				</td>
			</tr>

		<? } else { $oldMC = true; }

	} ?>

	<? if (($row['univers'] != $univers) && ($match_criteria == 1)) { ?>

		<? $show_article = 1; ?>
		<? $new_line = 0; ?>
		<? $univers = $row['univers']; ?>

		<? if ($univers != 0) { ?>

			<?  ?><? if ($SearchSetting['csAmountForGroup'] and $SearchSetting['csAmountForGroup'] < $counterRowsAB and !$echoShowMany) { ?>	<? $echoShowMany = true; ?>	<? $cntPred = $counterRowsAB-$_interface->csAmountForGroup; ?>	<? $textOpen = trp('Отобразить еще ' . str_replace($cntPred, '%s', declOfNum($cntPred, ['предложение', 'предложения', 'предложений'])), 'SearchModule', $cntPred); ?>	<? $textClose = trp('Скрыть ' . str_replace($cntPred, '%s', declOfNum($cntPred, ['предложение', 'предложения', 'предложений'])), 'SearchModule', $cntPred); ?>	<tr class="show-many group<?=$indexGroup.(($oldMC or !$match_criteria) ? '' : ' close-tr')?>">		<td colspan="<?=$columns?>"><input class="button-show" type="button" value="<?=$textOpen?>" onclick="showFullGroup(<?=$indexGroup?>, 0)"/><input class="button-hide" type="button" value="<?=$textClose?>" onclick="showFullGroup(<?=$indexGroup?>, 1)"/></td>	</tr><? } ?><?  ?>

			<tr class="section_row">
				<td colspan="<?= $columns ?>">
					<div class="flc">
						<span><a name="univers1" id="univers_target"></a><?= $AR_MSG['SearchModule']['msg47'] ?></span>
					</div>
				</td>
			</tr>

		<? } ?>

	<? } ?>

	<? if (($row['oem'] != $oem) && ($match_criteria == 1) && ($row['univers'] == 0)) {

		$show_article = 1;
		$new_line = 0;
		$oem = $row['oem'];

		if ($oem == 0) { ?>

			<?  ?><? if ($SearchSetting['csAmountForGroup'] and $SearchSetting['csAmountForGroup'] < $counterRowsAB and !$echoShowMany) { ?>	<? $echoShowMany = true; ?>	<? $cntPred = $counterRowsAB-$_interface->csAmountForGroup; ?>	<? $textOpen = trp('Отобразить еще ' . str_replace($cntPred, '%s', declOfNum($cntPred, ['предложение', 'предложения', 'предложений'])), 'SearchModule', $cntPred); ?>	<? $textClose = trp('Скрыть ' . str_replace($cntPred, '%s', declOfNum($cntPred, ['предложение', 'предложения', 'предложений'])), 'SearchModule', $cntPred); ?>	<tr class="show-many group<?=$indexGroup.(($oldMC or !$match_criteria) ? '' : ' close-tr')?>">		<td colspan="<?=$columns?>"><input class="button-show" type="button" value="<?=$textOpen?>" onclick="showFullGroup(<?=$indexGroup?>, 0)"/><input class="button-hide" type="button" value="<?=$textClose?>" onclick="showFullGroup(<?=$indexGroup?>, 1)"/></td>	</tr><? } ?><?  ?>

			<tr class="section_row">
				<td colspan="<?= $columns ?>">
					<div class="flc">
						<span><a name="norig1" id="norig_target"></a><?= $AR_MSG['SearchModule']['msg44'] ?></span>
					</div>
				</td>
			</tr>

		<? } else { ?>

			<?  ?><? if ($SearchSetting['csAmountForGroup'] and $SearchSetting['csAmountForGroup'] < $counterRowsAB and !$echoShowMany) { ?>	<? $echoShowMany = true; ?>	<? $cntPred = $counterRowsAB-$_interface->csAmountForGroup; ?>	<? $textOpen = trp('Отобразить еще ' . str_replace($cntPred, '%s', declOfNum($cntPred, ['предложение', 'предложения', 'предложений'])), 'SearchModule', $cntPred); ?>	<? $textClose = trp('Скрыть ' . str_replace($cntPred, '%s', declOfNum($cntPred, ['предложение', 'предложения', 'предложений'])), 'SearchModule', $cntPred); ?>	<tr class="show-many group<?=$indexGroup.(($oldMC or !$match_criteria) ? '' : ' close-tr')?>">		<td colspan="<?=$columns?>"><input class="button-show" type="button" value="<?=$textOpen?>" onclick="showFullGroup(<?=$indexGroup?>, 0)"/><input class="button-hide" type="button" value="<?=$textClose?>" onclick="showFullGroup(<?=$indexGroup?>, 1)"/></td>	</tr><? } ?><?  ?>

			<tr class="section_row">
				<td colspan="<?= $columns ?>">
					<div class="flc">
						<span><a name="orig1" id="orig_target"></a><?= $AR_MSG['SearchModule']['msg45'] ?></span>
					</div>
				</td>
			</tr>

		<? }
	} ?>

	<?

	if (($isProvider['provider_id'] == $row['provider_id']) && ($row['provider_id'] > 0)) {
		$class = 'provider_row';
	} elseif ($dat_id % 2 == 0) {
		$class = 'even';
	} else {
		$class = 'odd';
	}

	if ($show_article) {

		 ?><? if ($SearchSetting['csAmountForGroup'] and $SearchSetting['csAmountForGroup'] < $counterRowsAB and !$echoShowMany) { ?>	<? $echoShowMany = true; ?>	<? $cntPred = $counterRowsAB-$_interface->csAmountForGroup; ?>	<? $textOpen = trp('Отобразить еще ' . str_replace($cntPred, '%s', declOfNum($cntPred, ['предложение', 'предложения', 'предложений'])), 'SearchModule', $cntPred); ?>	<? $textClose = trp('Скрыть ' . str_replace($cntPred, '%s', declOfNum($cntPred, ['предложение', 'предложения', 'предложений'])), 'SearchModule', $cntPred); ?>	<tr class="show-many group<?=$indexGroup.(($oldMC or !$match_criteria) ? '' : ' close-tr')?>">		<td colspan="<?=$columns?>"><input class="button-show" type="button" value="<?=$textOpen?>" onclick="showFullGroup(<?=$indexGroup?>, 0)"/><input class="button-hide" type="button" value="<?=$textClose?>" onclick="showFullGroup(<?=$indexGroup?>, 1)"/></td>	</tr><? } ?><? 

		$detailInfo = array(
			"article" => $row['parsed_article'],
			"brand"   => $row['brand']
		);
		$detailLink = data2str($detailInfo, true, true);
		$counterRowsAB = 0;
		$indexGroup++;

	}
	$counterRowsAB++;
	?>

	<? if (!$SearchSetting['newGroupsTemplate'] and $show_article) { ?>

		<tr class="new_article">
			<td colspan="<?= $columns ?>">
				<div class="group_art flc">
					<div class="leftside">
						<span class="brand">
							<?=
								(!empty($row['prd_info_exist']) ? " <a href='/info/producers.html?prd=" . $row['prd_info_exist'] ."' class='prd_info_link' rel='prd_info_link' data-prdId='" . $row['prd_info_exist'] . "'>" . $row['prd_info_link'] . " </a>" : $row['prd_info_link']);
							?>
						</span>|
						<span class="article">
							<? if ($SearchSetting['useProtectArticlesByImg']) { ?>
								<img src="<?= getThumbArticlePath($row['article']) ?>"/>
							<? } else { ?>
								<?= $row['article'] ?>
							<? } ?>

							<? if ($row['superseded_by'] != '') { ?>

								<? $show_replacement_conditions = 1; ?>
								<span class="superseded">
									<sup>
										<a title="<?= $AR_MSG['SearchModule']['msg14'] ?> <?= $row['superseded_by'] ?>"><?= $AR_MSG['SearchModule']['msg48'] ?></a>
									</sup>
								</span>

							<? } elseif ($row['replacement_for'] != '') { ?>

								<? $show_replacement_conditions = 1; ?>

								<span class="replacement">
									<sup>
										<a title="<?= $AR_MSG['SearchModule']['msg15'] ?> <?= $row['replacement_for'] ?>" style="width: 10px; background: #000000; color: #FFFFFF; padding: 1px; cursor: default"><?= $AR_MSG['SearchModule']['msg49'] ?></a>
									</sup>
								</span>
							<? } ?>
						</span>|
						<span><?= $row['spare_info'] ?></span>|
				<span class="info">

					<? if ($row['picture']) { ?>
						&nbsp;<a href="/info/detail.html?sid=<?= $row['_search_id'] ?>&detailLink=<?= $detailLink ?>" target="_blank" rel="detail_info"><img src="/images/picture.png" border="0" alt="<?= $AR_MSG['SearchModule']['msg18'] ?>" hspace="1" align="absmiddle"/></a>
					<? } ?>
					&nbsp;
					<? if (($row['weight']) && ($row['weight'] > 0)) { ?>
						<img src="/images/weight.png" border="0" title="<?= $AR_MSG['SearchModule']['msg19'] ?> = <?= $row['weight'] ?>" alt="<?= $AR_MSG['SearchModule']['msg19'] ?> = <?= $row['weight'] ?>" hspace="1" align="absmiddle"/>

					<? } ?>
				</span>
					</div>
				</div>
			</td>
		</tr>

	<? } ?>
	
	<tr data-index-group="<?=$indexGroup?>" class="<?= ($row['sts_style'] != '' ? 'lg' : $class)?> group<?=$indexGroup?><?=(($SearchSetting['csAmountForGroup'] and $SearchSetting['csAmountForGroup'] < $counterRowsAB) ? ' hidden' : '' ).((!$match_criteria or $show_article) ? '' : ' close-tr').($new_line ? ' new-line' : '')?>" <?=($row['sts_style'] != '' ? ' style="' . $row['sts_style'] . '"' : '')?> onmouseover="toggleRow(this)" onmouseout="toggleRow(this)" onclick="clickRow(this)">

		<? if ($SearchSetting['newGroupsTemplate']) { $show_article_real = $show_article; $show_article = 1; } ?>

		<? foreach ($__search_results['header'] as $hdr_id => $column) { ?>

			<? if (($column['visible'] != true) or (in_array($hdr_id, $excludes_array))) continue; ?>

			<?
			switch ($hdr_id) {

				case 'spare_info':
				case 'article':
				case 'prd_info_link':
					$col_align = 'left';
					break;

				case 'final_price':
				case 'customer_price':
				case 'dlv_weight_tax':
				case 'price_brutto':
					$col_align = 'right';
					break;

				default:
					$col_align = 'center';

			}
			?>

			<td align="<?= $col_align ?>" class="col_<?= $hdr_id ?>">

				<?  ?><? if ($hdr_id == 'spare_info') { ?>

	<? if ($show_article == 1) { ?>

		<? if ($row[$hdr_id] == '') { ?>
			&nbsp;
		<? } else { ?>
			<?= $row[$hdr_id] ?>
		<? } ?>

	<? } else { ?>
		&nbsp;
	<? } ?>

<? } elseif ($hdr_id == 'term') { ?>

	<? if ($row['term'] > 0) { ?>
		<?= $row[$hdr_id] ?>
	<? } elseif (($row['term'] == 0) && ($row['info_only'] != 1)) { ?>
		<?= $AR_MSG['SearchModule']['msg12'] ?>
	<? } elseif ($row['info_only'] == 1) { ?>
		-
	<? } ?>

<? } elseif ($hdr_id == 'evaluation') { ?>

	<? if (($row['info_only'] != 1) && ($SearchSetting['statShow'] == 1) && ($row["prv_show_stat"])) { ?>
		<a href="/shop/provider_stat.html?pv=<?= $row['provider_id'] ?>&t=<?= preg_replace('#<[^>]+>(.*)</[^>]+>#Uis', '$1', $row['term']) ?>&sid=<?= $row['_search_id'] ?>" target="_blank" rel="state_info">
	<? } ?>

	<? if ($row['info_only'] != 1) { ?>
		<? $evalArr = explode(' | ', $row['evaluation']); ?>
		<img src="/images/n<?= (int)$evalArr[0] ?>.png" alt="" title=""/><span> / </span><img
			src="/images/n<?= (int)$evalArr[1] ?>.png" alt="" title=""/>
	<? } ?>

	<? if (($row['info_only'] != 1) && ($SearchSetting['statShow'] == 1)) { ?>
		</a>
	<? } ?>

<? } elseif ($hdr_id == 'article') { ?>

	<? if ($show_article == 1) { ?>

		<span <?= ($row['parsed_article'] == $SearchSetting['searchCode'] ? 'class="web_ar_search_code"' : '') ?>>
			<nobr>

			<? if ($SearchSetting['useProtectArticlesByImg']) { ?>
				<img src="<?= getThumbArticlePath($row['article']) ?>"/>
			<? } else { ?>
				<?= $row['article'] ?>
			<? } ?>

			<? if ($row['superseded_by'] != '') { ?>

				<? $show_replacement_conditions = 1; ?>
				<span class="superseded">
				<sup>
					<a title="<?= $AR_MSG['SearchModule']['msg14'] ?> <?= $row['superseded_by'] ?>"><?= $AR_MSG['SearchModule']['msg48'] ?></a>
				</sup>
			</span>

			<? } elseif ($row['replacement_for'] != '') { ?>

				<? $show_replacement_conditions = 1; ?>
				<span class="replacement">
				<sup>
					<a title="<?= $AR_MSG['SearchModule']['msg15'] ?> <?= $row['replacement_for'] ?>"><?= $AR_MSG['SearchModule']['msg49'] ?></a>
				</sup>
			</span>

			<? } ?>

			</nobr>
		</span>

	<? } else { ?>
		&nbsp;
	<? } ?>

<? } elseif ($hdr_id == 'prd_info_link') { ?>

	<? if ($show_article == 1) { ?>

		<div <?= ($row['brand_full_name'] != "" ? 'title="' . $row['brand_full_name'] . '"' : '') ?> <?= ($row['oem_brand'] == 1 ? 'class="web_ar_oem_brand"' : 'class="web_ar_brand"') ?>>
		<? if ($SearchSetting['newGroupsTemplate']) { ?>
			<div class="toggle-link-wrapper">
				<? $next = array_keys($__search_results['data'])[array_search($dat_id, array_keys($__search_results['data']))+1]; ?>
				<? if ($show_article_real and $__search_results['data'][$next]['parsed_article'] === $row['parsed_article'] and $__search_results['data'][$next]['brand'] === $row['brand']) { ?>
					<img src="/_sysimg/tree/<?=($match_criteria ? 'close' : 'open')?>all.png" class="toggle-link <?=($match_criteria ? 'close' : '')?>" onclick="tooggleGroup(<?=$indexGroup?>, this)" id="toggle-link<?=$indexGroup?>" title="<?=($match_criteria ? tr('Развернуть предложения', 'SearchModule') : tr('Свернуть предложения', 'SearchModule'))?>"/>
				<? } ?>
			</div>
		<? } ?>

			<?=
				(!empty($row['prd_info_exist']) ? " <a href='/info/producers.html?prd=" . $row['prd_info_exist'] ."' class='prd_info_link' rel='prd_info_link' data-prdId='" . $row['prd_info_exist'] . "'>" . $row['prd_info_link'] . " </a>" : $row['prd_info_link']);
			?>
		</div>

	<? } else { ?>
		&nbsp;
	<? } ?>

<? } elseif ($hdr_id == 'remains') { ?>

	<? if (($row['remains'] == $AR_MSG['SearchModule']['msg16']) && ($row['info_only'] == 0)) { ?>

		<img src="/images/check.png" title="<?= $AR_MSG['SearchModule']['msg16'] ?>"
			 alt="<?= $AR_MSG['SearchModule']['msg16'] ?>"/>

	<? } elseif (($SearchSetting['showExactRemains'] == 1) && ($row['remains'] != '')) { ?>

		<? if ($row['remains'] > 0) { ?>
			=<?= $row['remains'] ?>
		<? } else { ?>
			<?= $row['remains'] ?>
		<? } ?>

	<? } elseif ($row['remains'] > 0) { ?>
		<?= $row['remains'] ?>
	<? } else { ?>
		-
	<? } ?>
<? } elseif ($hdr_id == 'destination_display') { ?>

	<? if ($row['destination_display'] != "") { ?>
		<?= $row['destination_display'] ?>
	<? } else { ?>
		&nbsp;
	<? } ?>

<? } elseif ($hdr_id == 'action') { ?>

	<? if (($row['info_only'] != '1') || ($row['provider_price'] > 0)) { ?>

		<? if (isset($assocBasketWares[$row['provider_id']][$row['brand']][$row['article']][(float)$row['final_netto_price']][$row['destination']][(int)$row['term']][strval(round($row['final_manager_price'],2))])) { ?>
			<span class="button button_to_basket">
				<a href="/shop/basket.html" title="<?=tr('В корзину', 'SearchModule')?>">
					<span class="basket_active_img"></span>
					<span class="basket_items_count">
						<?= $assocBasketWares[$row['provider_id']][$row['brand']][$row['article']][(float)$row['final_netto_price']][$row['destination']][(int)$row['term']][strval(round($row['final_manager_price'],2))]['amount'] ?>
					</span>
				</a>
			</span>
		<? } else { ?>
			<span id="action<?= $row['_search_id'] ?>"><?= $row['amount'] ?> <?= $row[$hdr_id] ?></span>
			<input type="hidden" id="max_amount_<?=$row['_search_id']?>" value="<?=($_interface->csLeadLettersToNumberForCheckRemains ? strToFloat($row['remains']) : (float)$row['remains'])?>"/>
		<? } ?>
	<? } ?>

<? } elseif ($hdr_id == 'orderm') { ?>

	<? if (($row['info_only'] != '1') || ($row['provider_price'] > 0)) { ?>
		<?= $row[$hdr_id] ?>
	<? } ?>

<? } elseif ($hdr_id == 'min_quantity') { ?>

	<? if ($row['min_quantity'] > 0) { ?>
		<?= $row[$hdr_id] ?>
	<? } else { ?>
		&nbsp;
	<? } ?>

<? } elseif ($hdr_id == 'info') { ?>

	<span class="info">
		<a href="/info/detail.html?sid=<?= $row['_search_id'] ?>&detailLink=<?= $detailLink ?>" target="_blank" rel="detail_info"><img src="/images/info.png" border="0" alt="<?= $AR_MSG['SearchModule']['msg17'] ?>" hspace="1" align="absmiddle"/></a>
		<? if ($SearchSetting['newGroupsTemplate']) { ?>
		<? if ($row['picture']) { ?>
			&nbsp;<a href="/info/detail.html?sid=<?= $row['_search_id'] ?>&detailLink=<?= $detailLink ?>" target="_blank" rel="detail_info"><img src="/images/picture.png" border="0" alt="<?= $AR_MSG['SearchModule']['msg18'] ?>" hspace="1" align="absmiddle"/></a>
		<? } ?>
		<? if (($row['weight']) && ($row['weight'] > 0)) { ?>
			&nbsp;<img src="/images/weight.png" border="0" title="<?= $AR_MSG['SearchModule']['msg19'] ?> = <?= $row['weight'] ?>" alt="<?= $AR_MSG['SearchModule']['msg19'] ?> = <?= $row['weight'] ?>" hspace="1" align="absmiddle"/>
		<? } ?>
		<? } ?>
	</span>

<? } elseif ($hdr_id == 'price_brutto') { ?>

	<? if (($row['weight'] > 0) && ($row['cost_per_weight'] > 0)) { ?>

		<?= $row['price_brutto'] ?>

	<? } ?>

<? } elseif ($hdr_id == 'final_price') { ?>

	<? if ($row['provider_price'] == 0) { ?>
		-
	<? } elseif ($row['provider_price'] == '') { ?>
		-
	<? } else { ?>

		<? $final_price = $row[$hdr_id]; ?>
		<nobr><?= $row[$hdr_id] ?>

		<sup>
			<font color="#990000">

				<?
				if (count($Deliveries) > 0) {
					foreach ($Deliveries as $dlv => $cur_dlv) {

						if ($cur_dlv['delivery_condition'] == $row['delivery_condition']) {

							if ((($row['weight'] == 0) and ($cur_dlv['tax'] > 0)) || ($cur_dlv['tax'] == 0) || ($cur_dlv['tax'] == '')) {

								if (!safeArrayKey($showDelivery, $row['delivery_condition'])) {
									$showDelivery[$row['delivery_condition']] = $cur_dlv;
								}

								echo array_search($row['delivery_condition'], array_keys($showDelivery)) + 1;

							}

						}

					}
				}
				?>

			</font>
		</sup>

		<? if (($row['cost_per_weight'] > 0) && (!empty($row['cost_per_weight_display'])) and empty($row['weight'])) { ?>
			+ <?= $row['cost_per_weight_display'] ?>/<?=tr('кг', 'Common')?>.
		<? } ?>

	<? } ?>
	</nobr>

	<? if ($row['phand_value'] != 0) { ?>

		<br/>
		<small><span id="phand"><?= $AR_MSG['SearchModule']['msg20'] ?>&nbsp;<nobr><?= $row['detail_phand'] ?></nobr></span>
		</small>

	<? } ?>

<? } elseif ($hdr_id == 'date') { ?>

	<? if (($row['info_only'] != '1') || ($row['provider_price'] > 0)) { ?>
		<?= $row[$hdr_id] ?>
	<? } else { ?>
		-
	<? } ?>

<? } else { ?>

	<?= $row[$hdr_id] ?>

<? } ?><?  ?>

			</td>

		<? } ?>

		<? if ($basket_check == 1) { ?>
			<td align="right">
				<? if ($row['final_price_val'] && ($desire_price != 0)) { ?>
					<?= number_format((($row['final_price_val'] - $desire_price) / $desire_price * 100), 2, '.', ' ') ?>
				<? } ?>
			</td>
			<td align="right">
				<? if ($row['max_term'] && ($desire_term != 0)) { ?>
					<?= number_format((($row['max_term'] - $desire_term) / $desire_term * 100), 2, '.', ' ') ?>
				<? } elseif ($row['term'] && ($desire_term != 0)) { ?>
					<?= number_format((($row['term'] - $desire_term) / $desire_term * 100), 2, '.', ' ') ?>

				<? } ?>
			</td>
		<? } ?>
	</tr>

<? }
if ($show_article and $indexGroup == 1){
	$oldMC = true;
     ?><? if ($SearchSetting['csAmountForGroup'] and $SearchSetting['csAmountForGroup'] < $counterRowsAB and !$echoShowMany) { ?>	<? $echoShowMany = true; ?>	<? $cntPred = $counterRowsAB-$_interface->csAmountForGroup; ?>	<? $textOpen = trp('Отобразить еще ' . str_replace($cntPred, '%s', declOfNum($cntPred, ['предложение', 'предложения', 'предложений'])), 'SearchModule', $cntPred); ?>	<? $textClose = trp('Скрыть ' . str_replace($cntPred, '%s', declOfNum($cntPred, ['предложение', 'предложения', 'предложений'])), 'SearchModule', $cntPred); ?>	<tr class="show-many group<?=$indexGroup.(($oldMC or !$match_criteria) ? '' : ' close-tr')?>">		<td colspan="<?=$columns?>"><input class="button-show" type="button" value="<?=$textOpen?>" onclick="showFullGroup(<?=$indexGroup?>, 0)"/><input class="button-hide" type="button" value="<?=$textClose?>" onclick="showFullGroup(<?=$indexGroup?>, 1)"/></td>	</tr><? } ?><? 
}
?>

<?  ?><? if ($SearchSetting['csAmountForGroup'] and $SearchSetting['csAmountForGroup'] < $counterRowsAB and !$echoShowMany) { ?>	<? $echoShowMany = true; ?>	<? $cntPred = $counterRowsAB-$_interface->csAmountForGroup; ?>	<? $textOpen = trp('Отобразить еще ' . str_replace($cntPred, '%s', declOfNum($cntPred, ['предложение', 'предложения', 'предложений'])), 'SearchModule', $cntPred); ?>	<? $textClose = trp('Скрыть ' . str_replace($cntPred, '%s', declOfNum($cntPred, ['предложение', 'предложения', 'предложений'])), 'SearchModule', $cntPred); ?>	<tr class="show-many group<?=$indexGroup.(($oldMC or !$match_criteria) ? '' : ' close-tr')?>">		<td colspan="<?=$columns?>"><input class="button-show" type="button" value="<?=$textOpen?>" onclick="showFullGroup(<?=$indexGroup?>, 0)"/><input class="button-hide" type="button" value="<?=$textClose?>" onclick="showFullGroup(<?=$indexGroup?>, 1)"/></td>	</tr><? } ?><?  ?>

</table>

</form><?  ?>

			<? } ?>

			<div class="flc">
				<div class="leftside">
					<? if ((int)$search_results_info['allCount'] > 0) { ?>
						<div id="search_stat">
							<span><?= $AR_MSG['SearchModule']['msg53'] ?></span>
							<?= sprintf($AR_MSG['SearchModule']['msg54'], $search_results_info['allCount'], $search_results_info['matchCount'], $search_results_info['analogsCount'], $search_results_info['universCount'], $search_results_info['minPrice'], $search_results_info['maxPrice']) ?>
						</div>
					<? } ?>
				</div>
				<div class="rightside">
					<div id="search_navigation" class="flc">
						<div class="rightside">
							<?= $__search_results['controls']['searchPages'] ?>
						</div>
					</div>
				</div>
			</div>

			<div class="flc" id="search_bottom_notifies">
				<?  ?><div class="leftside">
	<? if (!$SearchSetting['admin_search']) { ?>

		<? if ($clientData['retail']!==true) { ?>

			<div class="warning">
				<div class="warning_caption"><?= $AR_MSG['Forms']['msg5'] ?></div>
				<?= $AR_MSG['SearchModule']['msg22'] ?>
			</div>

		<? } ?>
		<? if ($SearchSetting['isGuest']) { ?>
			<div class="warning">
				<div class="warning_caption"><?= $AR_MSG['SearchModule']['msg55'] ?></div>
			</div>
		<?}?>
	<? } ?>

	<?

	if (sizeof($showDelivery) > 0 || $show_replacement_conditions) {
		$Deliveries = $showDelivery;
		$k = 0;

		?>
		<div class="warning">
			<div class="warning_caption"><?= $AR_MSG['SearchModule']['msg23'] ?></div>

			<? foreach ($Deliveries as $dlv => $delivery) { ?>

				<? $k++; ?>

				<div style="padding: 10px">

					<sup><font color="#990000"><?= $k ?></font></sup>
					<?= $delivery['dlv_text'] ?>&nbsp;
				</div>

			<? } ?>

			<? if ($show_replacement_conditions == 1) { ?>

				<div style="padding: 5px">
<span style="color: #990000"><sup>
		<a title="<?= $row['superseded_by'] ?>"
		   style="font-weight: bold; width: 10px; background: #990000; color: #FFFFFF; padding: 1px; cursor: default"><?= $AR_MSG['SearchModule']['msg48'] ?></a>
	</sup></span>
					<?= $AR_MSG['SearchModule']['msg24'] ?>&nbsp;
				</div>

				<div style="padding: 5px">
<span style="color: #990000"><sup>
		<a title="<?= $row['replacement_for'] ?>"
		   style="width: 10px; background: #000000; color: #FFFFFF; padding: 1px; cursor: default"><?= $AR_MSG['SearchModule']['msg49'] ?></a>
	</sup></span>
					<?= $AR_MSG['SearchModule']['msg25'] ?>&nbsp;
				</div><br/>

			<? } ?>

		</div>

	<? } ?>
</div>

<? if (!$SearchSetting['admin_search']) { ?>
	<noindex>
		<div class="leftside">
			<div id="search_error">
				<div class="secaption"><?= $AR_MSG['SearchModule']['msg50'] ?></div>
				<div class="setext"><?= $AR_MSG['SearchModule']['msg51'] ?></div>
				<a href="/shop/report_error.html?errid=E2&article=<?= $SearchSetting['searchCode'] ?>&brand=<?= $SearchSetting['searchBrand'] ?>"
				   class="submitButton"><?= $AR_MSG['SearchModule']['msg52'] ?></a>
			</div>
		</div>
	</noindex>

<? } ?><?  ?>
			</div>

		<? } elseif ($alternatives) { ?>
			<?  ?><table border="0" class="web_ar_datagrid search_alternatives">

<tr>

<? foreach ($alternatives['header'] as $hdr_id=>$column) { ?>

	<? if ($column['visible']==true) { ?>

	<th class="col_<?=$hdr_id?>"><?=$column['caption']?></th>

	<? } ?>

<? } ?>
</tr>

<? foreach ($alternatives['data'] as $dat_id=>$row) { ?>

<tr class="<?=($dat_id % 2 == 0?'even':'odd')?>">
	<? foreach ($alternatives['header'] as $hdr_id=>$column) { ?>
	
		<?
			switch ($hdr_id) {
				
				case 'brand':
				case 'action_alt': {
					$align = 'center';
				} break;
				default: {
					$align = 'left';
				} break;
				
			}
		?>
		
		<? if ($column['visible'] == true) { ?>
		<td align="<?=$align?>" class="col_<?=$hdr_id?>">
			<a href="<?=$_SERVER['REQUEST_URI']."&g=".$row['group_num']?>">
				<?=$row[$hdr_id]?>

				<? if ($hdr_id=='spare') { ?>

					<? if ($row['superseded_by']!='') { ?>
					<?=$row['code']?> - <?=$AR_MSG['SearchModule']['msg7']?><?=$row['superseded_by']?>
					<? } ?>

					<? if ($row['replacement_for']!='') { ?>
					<?=$row['code']?> - <?=$AR_MSG['SearchModule']['msg8']?><?=$row['replacement_for']?>
					<? } ?>

				<? } ?>
			</a>
		</td>
		<? } ?>

	<? } ?>
</tr>

<? } ?>

</table><?  ?>
		<? } ?>

		<? if ($SearchSetting['invalid_search']) { ?>

			<?  ?><?=$AR_MSG['SearchModule']['msg26']?>
	<?=$AR_MSG['SearchModule']['msg27']?>
	<?=$AR_MSG['SearchModule']['msg28']?>
	<?=$AR_MSG['SearchModule']['msg29']?>
	<?=$AR_MSG['SearchModule']['msg30']?>
	<?=$AR_MSG['SearchModule']['msg31']?><?  ?>

		<? } ?>

	<? } ?>

<? } else { ?>

	<?  ?><h2><?=$AR_MSG['SearchModule']['msg39']?></h2>
	
<p><?=$AR_MSG['SearchModule']['msg40']?></p><?  ?>

<? } ?><? 

	} else {

		 ?><? if ($_SYSTEM->REQUESTED_PAGE == "/shop/basket_check.html") {

	$basket_check = '1';
	$desire_price = $_SESSION['basket']['control']['desire_price'];
	$desire_term = $_SESSION['basket']['control']['desire_term'];

} ?>

<? if (($SearchSetting['authUserSearchOnly'] != 1) || !$SearchSetting['isGuest'] || ($SearchSetting['admin_search'] == 1)) { ?>
	<? if ($SearchSetting['isGuest']) { ?>
		<div class="warning" style="width:auto;">
			<div class="warning_caption"><?= $AR_MSG['SearchModule']['msg55'] ?></div>
		</div>
	<? } ?>
	<h1><?= $AR_MSG['SearchModule']['msg1'] ?> <span class="search_code"><?= $SearchSetting['searchCode'] ?></span></h1>

	<? if ($SearchSetting['empty_search']) { ?>

		<?  ?><ul>

	<? if ($SearchSetting['search_from_catalog']) { ?>
	<li><p><a href="<?= $SearchSetting['catalog_search_url'] ?>"><?= $AR_MSG['SearchModule']['msg2'] ?></a></p>
		<? } ?>
	<li>
		<nobr><?= $AR_MSG['SearchModule']['msg3'] ?></nobr>
		<br/>
		<?= $AR_MSG['SearchModule']['msg4'] ?> <a href="/vin/form.html"><?= $AR_MSG['SearchModule']['msg5'] ?></a>.

		<? if ($SearchSetting['catalog_search']) { ?>
	<li><a href="<?= $SearchSetting['catalog_search_url'] ?>"><?= $AR_MSG['SearchModule']['msg6'] ?></a>
		<? } ?>

</ul><?  ?>

	<? } else { ?>

	<? if ($__search_results && !$SearchSetting['empty_search']) { ?>

		<div id="search_top_controls" class="flc">

			<div id="st_left" class="leftside">
				<?  ?><?
if($alternatives['data']) {
	$alternatives = $alternatives['data'];
}
if(!empty($alternatives)) {
?>
<div id="alternatives_tabs" class="flc">
	<a href="#" id="alt_lar" class="alt_lar" style="display:none;"><img src="/images/alt_lar.png" alt="" title=""/></a>

	<ul id="alternatives_tabs_ul">
		<?

		if (count($alternatives) > 0) {

			$sLink = new cLink($_SERVER['REQUEST_URI'], '');
			$sLink->removeQueryParam("g");
			$sLink->removeQueryParam("brand");

			$i = 0;

			foreach ($alternatives as $key => $alt) {

				if ($_REQUEST['g'] == $alt['id']) {
					$alt_active = $i;
				}

				?>
				<li id="alt_g<?= $alt['id'] ?>" class="alt_item<?= ($_REQUEST['g'] == $alt['id'] || strtoupper($_REQUEST['brand']) == strtoupper($alt['brand']) ? ' tab_active' : '') ?>">
					<a href="<?= ($sLink->link . '&g=' . $alt['id']) ?>" class="alt_link" style="display: block;">
						<span class="tab_act"></span>
						<span class="alt_brand"><?= $alt['brand'] ?></span>
						<span class="alt_info" title="<?= $alt['spare_info'] ?>"><?= (strlen($alt['spare_info']) <= 15 ? $alt['spare_info'] : substr($alt['spare_info'], 0, 15) . '...') ?></span>
					</a>
				</li>
				<?
				$i++;
			}

		}
		?>
	</ul>
	<a href="#" id="alt_rar" class="alt_rar" style="display:none;"><img src="/images/alt_rar.png" alt="" title=""/></a>

	<?
	$group = ((int)$_REQUEST['g'] > 0 ? $_REQUEST['g'] - 1 : 0);
	$max_group = count($alternatives) - 1;

	$__BUFFER->addScript('/_syslib/class.TabLister.js');
	?>

	<script type="text/javascript">

		function initTabLister() {

			var cw = $('content_inner').getSize().x - $('st_right').getSize().x - 50;

			var TL = new TabLister({
				tab_active: <?=(int)$alt_active?>,
				tab_max: <?=(int)$max_group?>,
				container_width: cw,
				left_arrow_selector: 'alt_lar',
				right_arrow_selector: 'alt_rar',
				item_selector: '.alt_item'
			});

		}

	</script>

</div>
<? } ?><?  ?>
			</div>

			<div id="st_right" class="rightside">
				<div id="search_currency" class="flc">
				<span class="rightside"><?=$cid?></span><span class="rightside l1"><?=$AR_MSG['SearchModule']['msg9']?></span>
				</div>
				<div id="search_navigation" class="flc">
					<div class="rightside">
						<?= $__search_results['controls']['searchPages'] ?>
					</div>
				</div>
			</div>

		</div>

		<? if (!$admin_search) { ?>

			<?  ?><?  ?>

		<? } else { ?>

			<?= $AR_MSG['SearchModule']['msg1'] ?>

		<? } ?>

		<? if ($search_from_catalog) { ?>

			<li><p><a href="<?=$SearchSetting['catalog_search_url']?>"><?=$AR_MSG['SearchModule']['msg2']?></a></p></li>

		<? } ?>

		<? if ($SearchSetting['searchMode'] == "An") { ?>

			<?  ?>		
<style>

	body {
		font-size: 11px
	}

	.scol_0 {
		width: 600px;
	}
	
	.scol_1 {

		position: absolute;
		left: 100px;
		width: 150px;
		margin-right: 5px;
		vertical-align: top;

	}

	.scol_2 {
		position: absolute;
		left: 250px;
		width: 200px;
		margin-right: 5px;

	}
	
	.scol_3 {
		position: absolute;
		left: 400px;
		width: 300px;
		margin-right: 5px;

	}
	
	.scol_4 {

		width: 50px;
		margin-right: 5px;
		text-align: center;

	}
	
	.scol_5 {

		width: 30px;
		margin-right: 5px;
		text-align: center;

	}
	
	.searchBox {
		width: 100%;
		border: #B3E0FF solid 1px;
		background: #F9F9F9;
	}
	
	img {
		border: 0px;
	}
	
	a {
		text-decoration: none;
		cursor: hand;
	}
	
	
	a.normal {
		text-decoration: underline;
		cursor: hand;
	}
	
	div.analogTreeNode {
		width: 100%; padding-left: 50px;
		background: #FFFFFF;
	}
	
	div.analogTreeNode1 {
		width: 100%; padding-left: 50px;
		background: #A0A0A0;
	}
	
	div.analogTreeNode2 {
		width: 100%; padding-left: 50px;
		background: #C0C0C0;
	}
	
	div.analogTreeNode3	 {
		width: 100%; padding-left: 50px;
		background: #A0A0A0;
		color: #FFFFFF;
	}
	
</style>
	
	<script type="text/javascript" src="/_syslib/custom.dtree.js"></script>
	
	<script type="text/javascript">

	
		<?	$loopbackCheck = array(); ?>
		
		tecdocTree = new dTree('tecdocTree', '/images/ar2-tree');
		
		
<?

	$rowStr    = "<nobr><div class=\"analogTreeNode\">";
	
	$rowStr  .= "<span class=\"scol_0\">&nbsp;</span>";
	
	$rowStr  .= "<span class=\"scol_1\">".$SearchSetting['searchCodeInfo'][0]['code']."</span>";
	
	$rowStr  .= "<span class=\"scol_2\">".$SearchSetting['searchCodeInfo'][0]['prd_name']."</span>";
	
	$rowStr  .= "<span class=\"scol_3\">".$SearchSetting['searchCodeInfo'][0]['name']."</span>";
	
	$rowStr  .= "</div></nobr>";
	
	$rowStr = preg_replace("#[\r\n\t]+#Uis"," ",$rowStr);

	echo "tecdocTree.add(".$SearchSetting['searchCodeInfo'][0]['detail_id'].", -1, '$rowStr', '/admin/webavtr/analogs.html?d1_code=".strip_tags($SearchSetting['searchCodeInfo'][0]['code'])."&prd1_name=".strip_tags($SearchSetting['searchCodeInfo'][0]['prd_name'])."&partSearch=1', '".$AR_MSG['SearchModule']['11']."', '_blank');";
	
		
		foreach ($__search_results['data'] as $dat_id=>$row) { 

				
			if ($row['detail_id'] != $row['cross_detail_id'] && !isset($loopbackCheck[$row['detail_id']])) {
					
				$rowStr    = "<div class=\"analogTreeNode".$row['cross_level']."\">";
	
				$rowStr  .= "<span class=\"scol_0\">&nbsp;</span>";	
				$rowStr  .= "<span class=\"scol_1\">&nbsp;".$row['article']."</span>";
				$rowStr  .= "<span class=\"scol_2\">".strtoupper($row['brand'])."</span>";
				$rowStr  .= "<span class=\"scol_3\">".$row['spare_info']."</span>";
				
				$rowStr  .= "</div></nobr>";
				
				$rowStr = preg_replace("#[\r\n\t]+#Uis"," ",$rowStr);
										
				echo "tecdocTree.add(".$row['detail_id'].", ".$row['cross_detail_id'].", '".$rowStr."', '/admin/webavtr/analogs.html?d1_code=".strip_tags($row['article'])."&prd1_name=".strip_tags($row['brand'])."&partSearch=1', '".$AR_MSG['SearchModule']['11']."', '_blank');";
				
			}
			
			$loopbackCheck[$row['detail_id']] = 1;		
			
		} ?>
		
		document.write(tecdocTree);	
		

	</script><?  ?>

		<? } else { ?>

			<? if ($__search_results['controls']) { ?>

				<?  ?><? foreach ($__search_results['controls'] as $hdr_id=>$control) { ?>

<? if ($hdr_id == 'searchPages') continue; ?>

<div class="<?=($hdr_id=="filter"?'notice':'')?>" style="padding-top: 0px; padding-bottom: 0px">
	<?=$control?>
</div>

<? } ?><?  ?>

			<? } ?>

			<?  ?><?  ?><script type="text/javascript">

	function toggleRow(rowObj) {

		if (rowObj.clicked) {
			return;
		}

		if (jqWar(rowObj).hasClass('mouseover')) {
			jqWar(rowObj).removeClass('mouseover');
		} else {
			jqWar(rowObj).addClass('mouseover');
		}

	}

	function clickRow(rowObj) {

		if (jqWar(rowObj).hasClass('clicked')) {
			jqWar(rowObj).removeClass('clicked');
			rowObj.clicked = false;
		} else {
			jqWar(rowObj).addClass('clicked');
			rowObj.clicked = true;
		}

	}

	function fixedCaption() {

		if (!$('fixedSearchCaptionMain') || !$('search_table_caption_main')) {
			return;
		}

		$('fixedSearchCaptionMain').innerHTML = $('search_table_caption_main').innerHTML;
		$('fixedSearchCaption').innerHTML = '<table class="web_ar_datagrid" id="fixed_search_header">' + $('search_header').innerHTML + '</table>';
		$('fixedCaption').style.width = $('search_table_caption_main').getCoordinates().width + 'px';

		if (typeof ajaxSearch == "function") {
			$$('#fixedCaption a[href^=/search.html]').addEvent('click', function (el) {
				ajaxSearch(this.href);
				return false;
			});
		}

		$$('#fixed_search_header th').each(function (el, index) {
			parEl = $$('#search_header th')[index];
			el.style.width = (parEl.getSize().x - parEl.getStyle('borderLeftWidth').replace('px', '') - parEl.getStyle('borderRightWidth').replace('px', '') - parEl.getStyle('paddingLeft').replace('px', '') - parEl.getStyle('paddingRight').replace('px', '')) + 'px';
		});

	}

	function add_basket(id) {

		amount = $('amount' + id).value || 1;

		<? if ($SearchSetting['admin_search'] != 1) { ?>

			<? if ($_interface->csCheckRemainsInSearch) { ?>
				if (jqWar('#max_amount_' + id)) {
					maxAmount = jqWar('#max_amount_' + id).val().toFloat();
					if (maxAmount > 0 && maxAmount < amount.toFloat()) {
						msg = '<?=tr('Данный товар доступен только в количестве %s. Поместить в корзину заказ на доступное количество?', 'SearchModule')?>';
						msg = msg.replace('%s', maxAmount);
						if (!confirm(msg)) {
							return false;
						} else {
							amount = maxAmount;
						}
					}
				}
			<? } ?>

			var u = '/shop/basket.html?func=add&sid=' + id + '&amount=' + amount;
			if ($('action' + id)) {
				var url = '/_ajax/basket.html?func=add&sid=' + id + '&amount=' + amount;
				if ($('top-basket-count')||$('top-basket-count2')) {
					url = url+'&show=count';
				}
				$('action' + id).innerHTML = '<img src="/images/add_basket_loader.gif" alt="<?=tr('Добавление в корзину...', 'SearchModule')?>" title="<?=tr('Добавление в корзину...', 'SearchModule')?>" />';
				var lRequest = new Request({
					url: url,
					async: true,
					evalScripts: false,
					onSuccess: function (resp) {
						$('action' + id).innerHTML = '<span class="button button_to_basket">' +
									'<a href="/shop/basket.html" title="<?=tr('В корзину', 'SearchModule')?>">' +
										'<span class="basket_active_img"></span>' +
										'<span class="basket_items_count">' +
											amount +
										'</span>' +
									'</a>' +
								'</span>';
						if ($('user_top_links')) {
							$('user_top_links').style.display = 'block';
						}
						if ($('user_top_links2')) {
							$('user_top_links2').style.display = 'block';
						}
						if ($('top-basket-count')) {
							$('top-basket-count').innerHTML=resp;
						}
						if ($('top-basket-count2')) {
							$('top-basket-count2').innerHTML=resp;
						}
					}
				}).send();
			} else {
				window.location.href = u;
			}
		<? } else { ?>
			var u = '/admin/eshop/basket.html?func=add&sid=' + id + '&amount=' + amount;
			window.location.href = u;
		<? } ?>

		return false;

	}

	function horizontalFixedScroll(el, elPage) {
		var scrolled = 0,
			oldScrol = 0,
			el = (typeof el == 'string') ? document.getElementById(el) : el,
			elStyle,
			postiLeft,
			widthEl,
			widthFix,
			maxWidth;
		if (el) {
			elStyle = el.style;

			window.onresize = function () {
				widthFix = el.offsetWidth;
				if (widthFix == 0) return;
				elStyle.left = '';
				oldScrol = window.pageXOffset || document.documentElement.scrollLeft;
				widthEl = elPage.offsetWidth;
				if (widthFix != widthEl) {
					el.style.width = widthEl + 'px';
				}
				$$('#fixed_search_header th').each(function (th, index) {
					parEl = $$('#search_header th')[index];
					th.style.width = (parEl.getSize().x - parEl.getStyle('borderLeftWidth').replace('px', '') - parEl.getStyle('borderRightWidth').replace('px', '') - parEl.getStyle('paddingLeft').replace('px', '') - parEl.getStyle('paddingRight').replace('px', '')) + 'px';
				});
			}
			window.onscroll = function () {
				scrolled = window.pageXOffset || document.documentElement.scrollLeft;
				if (oldScrol == scrolled || el.offsetWidth == 0) {
					return;
				}
				postiLeft = (!elStyle.left) ? el.getBoundingClientRect().left : parseInt(elStyle.left, 10) || 0;
				elStyle.left = postiLeft - (scrolled - oldScrol) + 'px';
				oldScrol = scrolled;
			}
		}
	}

	function initSQBox() {

		new Asset.css('/_syslib/squeezebox/squeezebox_info.css', {id: 'SqueezeBox', title: 'SqueezeBox'});

		SqueezeBox.assign($$('a[rel=state_info]'), {
			size: {x: 520, y: 440},
			handler: 'iframe',
			ajaxOptions: {
				method: 'get'
			}
		});

		SqueezeBox.assign($$('a[rel=detail_info]'), {
			size: {x: 680, y: 520},
			handler: 'iframe',
			ajaxOptions: {
				method: 'get'
			}
		});

		<? if($SearchSetting['usePrdInfoSQBox']) :?>

			$$('a[rel=prd_info_link]').each(function (el, index) {

				var prd_id = el.getAttribute('data-prdId');

				el.href = '/info/producers_blank.html?prd=' + prd_id;

				SqueezeBox.assign(el, {
					size: {x: 680, y: 520},
					handler: 'iframe',
					ajaxOptions: {
						method: 'get'
					}
				});

			});

		<?endif?>

		horizontalFixedScroll('fixedCaption', $$('.search_results')[0]);

	}

</script><?  ?>

<link rel="stylesheet" type="text/css" href="/_syscss/autoresource/autoshop/search.css" />

<script language="JavaScript">

	window.addEvent('scroll', function() {
		if ($('page').getScroll().y > $('search_table_caption_main').getCoordinates().bottom) {
			$('fixedCaption').style.display = 'block';
			$('fs_term').value = $('term').value;
			$('fs_sort___search_results_by').value = $('sort___search_results_by').value;
			$('fs_smode').value = $('smode').value;
		} else {
			$('fixedCaption').style.display = 'none';
		}
	});
	
</script>
<div style="display:none;"><img src="/images/add_basket_loader.gif" /></div>
<?
$assocBasketWares = array();
if (count($basketWares) > 0) {
	foreach ($basketWares as $basketValue) {
		$assocBasketWares[$basketValue['provider_id']][$basketValue['brand']][$basketValue['article']][(float)$basketValue['price_netto']][$basketValue['destination']][(int)$basketValue['term']][strval(round($basketValue['supplier_price_value'],2))] = ['amount' => $basketValue['amount']];
	}
}
?>

<div id="fixedCaption" style="display:none;">
	<div style="background:#f5f6f5;">
		<div id="fixedSearchForm">
			<div id="fxsearch_form">
				<div id="fxsf_shad"></div>
				<form name="fxsearch_code" action="/search.html" method="GET">
				
					<div id="fxsearch_caption" >
						<div class="leftside">
							<?=tr('searchDetailByArticle', 'Template')?>
						</div>
						<? if (!$SearchSetting['isGuest']) { ?>
							
							<div id="user_top_links2" class="rightside">
								<div class="flc">
									<a href="/shop/basket.html" style="background-image:url(/images/ti_basket.png)">
										<span><?=tr('basket', 'Template')?><span id="top-basket-count2"><?=(int)count($basketWares) ? ' ('.(int)count($basketWares).')' : ''?></span></span>
									</a>
									<a href="/shop/myorders.html" style="background-image:url(/images/ti_orders.png)"><span><?=tr('myOrders', 'Template')?></span></a>
								</div>
							</div>

						<? } else { ?>
								
							<div id="user_top_links2" class="rightside" style="display:<?=(!empty($client->sourceId) || (int)count($basketWares) > 0?'block':'none')?>">
								<div class="flc">
									<a href="/shop/basket.html" style="background-image:url(/images/ti_basket.png)">
										<span><?=tr('basket', 'Template')?><span id="top-basket-count2"><?=(int)count($basketWares) ? ' ('.(int)count($basketWares).')' : ''?></span></span>
									</a>
								</div>
							</div>
							
						<? } ?>
					</div>
					
					<div id="fxsearch_line" class="flc">
					
						<div class="rightside">
							<div id="fxsearch_buttons" class="flc">
								<div class="leftside"><input type="submit" class="submitButton searchButton" name="search" value="<?=tr('searchButton', 'Template')?>" /></div>
							</div>
						</div>
						<div id="fxsearch_input">

							<? $empty_text = tr('exampleArticle', 'Template'); ?>
							<input class="TextBox<?=(empty($_REQUEST['article'])?'_empty':'')?>" type="text" name="article" value="<?=(empty($_REQUEST['article'])?$empty_text:$_REQUEST['article'])?>" onfocus="if (this.value == '<?=$empty_text?>') {this.value = ''; this.className = 'TextBox_focus';}" onblur="if (this.value == '') {this.value = '<?=$empty_text?>'; this.className = 'TextBox_empty';} else {this.className = 'TextBox';}" />
							<input type="hidden" name="term" value="" id="fs_term" />
							<input type="hidden" name="sort___search_results_by" value="" id="fs_sort___search_results_by" />
							<input type="hidden" name="smode" value="" id="fs_smode" />
							
						</div>
					
					</div>
				</form>

			</div>
		</div>
		<div id="fixedSearchCaptionMain" class="flc"></div>
		<div id="fixedSearchCaption"></div>
	</div>
	<div id="shadow" style="height:20px; background:url(/images/fixed_grad.png) top left repeat-x; style"></div>
</div>

<form action="<?=$SearchSetting['basketURL']?>" method="POST">

<? if ($SearchSetting['useOrderColumn'] == 1) { ?>

<input type="hidden" name="func" value="add">
<div class="searchPrderButton"><input type="submit" value="<?=$AR_MSG['SearchModule']['msg46']?>"></div><br>

<? } ?>

<div id="search_table_caption_main" class="flc">

</div>

<? $excludes_array = array('amount', 'weight', 'dlv_weight_tax'); ?>

<? $columns = 0; ?>
<? foreach ($__search_results['header'] as $hdr_id=>$column) { ?>
	
	<? if (($column['visible']!=true) or (in_array($hdr_id, $excludes_array))) continue; ?>

	<? $columns++; ?>

<? } ?>

<table class="web_ar_datagrid search_results">
<?  ?><tbody id="search_header">
<tr class="caption_table">

	<? $columns = 0; ?>
	<? foreach ($__search_results['header'] as $hdr_id => $column) { ?>

		<? if (($column['visible'] != true) or (in_array($hdr_id, $excludes_array))) continue; ?>

		<? $columns++; ?>
		<th class="col_<?= $hdr_id ?>">
			<div style="position:relative">
				
				<? if (!empty($column['clm_info'])) { ?>
					<span class="tipz" title="<?= $column['clm_info'] ?>"></span>
				<? } ?>
				<?= $column['caption'] ?>
			</div>
		</th>

	<? } ?>
	<? if ($basket_check) { ?>
		<th><?= $__search_results['header']['final_price_val']['caption'] ?></th>
		<th><?= $__search_results['header']['percent_term']['caption'] ?></th>
		<? $columns += 2; ?>
	<? } ?>
</tr>
</tbody><?  ?>

<? $showDelivery = array(); ?>

<? foreach ($__search_results['data'] as $dat_id=>$row) { ?>

<?
if ($row['info_only'] == 1) {
	
	if (($SearchSetting['searchCode'] != $row['parsed_article']) or ($ZeroResultShown == 1)) {
	
		continue;
		
	} else {
		
		foreach ($__search_results['data'] as $dat_id2=>$row2) {
		
		    if (($row['parsed_article'] == $row2['parsed_article']) && ($dat_id != $dat_id2) && ($row2['info_only'] == 0) && ($row['prd_info_link'] == $row2['prd_info_link'])) { 
    			continue 2;
			}

		}
		
		$ZeroResultShown = 1;

	}

} 
?>

<?
 
if (($isProvider['provider_id'] == $row['provider_id']) && ($row['provider_id']>0)) { 
	$class = 'provider_row'; 
} elseif ($dat_id % 2 == 0) {
	$class = 'even';
} else {
	$class = 'odd';
}
?>

<tr <?=($row['sts_style']!=''?'class="lg" style="'.$row['sts_style'].'"':'class="'.$class.'"')?> onmouseover="toggleRow(this)" onmouseout="toggleRow(this)" onclick="clickRow(this)">

	<? foreach ($__search_results['header'] as $hdr_id=>$column) { ?>
		
		<? if (($column['visible']!=true) or (in_array($hdr_id, $excludes_array))) continue; ?>
		
		<? 
			switch($hdr_id) {
				
				case 'spare_info':
				case 'article': 
				case 'prd_info_link': {
					$col_align = 'left';
				} break;
				
				case 'final_price':
				case 'customer_price':
				case 'dlv_weight_tax':
				case 'price_brutto': {
					$col_align = 'right';
				} break;
				
				default: {
					$col_align = 'center';
				}
				
			}
		?>
		<td align="<?=$col_align?>" class="col_<?=$hdr_id?>">
		
			<?  ?><? if ($hdr_id == 'spare_info') { ?>

	<? if ($row[$hdr_id] == '') { ?>
		&nbsp;
	<? } else { ?>
		<?= $row[$hdr_id] ?>
	<? } ?>
<? } elseif ($hdr_id == 'term') { ?>

	<? if ($row['term'] > 0) { ?>
		<?= $row[$hdr_id] ?>
	<? } elseif (($row['term'] == 0) && ($row['info_only'] != 1)) { ?>
		<?= $AR_MSG['SearchModule']['msg12'] ?>
	<? } elseif ($row['info_only'] == 1) { ?>
		-
	<? } ?>

<? } elseif ($hdr_id == 'evaluation') { ?>

	<? if (($row['info_only'] != 1) && ($SearchSetting['statShow'] == 1) && ($row["prv_show_stat"])) { ?>
		<a href="/shop/provider_stat.html?pv=<?= $row['provider_id'] ?>&t=<?= preg_replace('#<[^>]+>(.*)</[^>]+>#Uis', '$1', $row['term']) ?>&sid=<?= $row['_search_id'] ?>" target="_blank" rel="state_info">
	<? } ?>

	<? if ($row['info_only'] != 1) { ?>
		<? $evalArr = explode(' | ', $row['evaluation']); ?>
		<img src="/images/n<?= (int)$evalArr[0] ?>.png" alt="" title=""/><span> / </span><img
			src="/images/n<?= (int)$evalArr[1] ?>.png" alt="" title=""/>
	<? } ?>

	<? if (($row['info_only'] != 1) && ($SearchSetting['statShow'] == 1)) { ?>
		</a>
	<? } ?>

<? } elseif ($hdr_id == 'article') { ?>

	<span <?= ($row['parsed_article'] == $SearchSetting['searchCode'] ? 'class="web_ar_search_code"' : '') ?>>
		<nobr>

		<? if ($SearchSetting['useProtectArticlesByImg']) { ?>
			<img src="<?= getThumbArticlePath($row['article']) ?>"/>
		<? } else { ?>
			<?= $row['article'] ?>
		<? } ?>

		<? if ($row['superseded_by'] != '') { ?>

			<? $show_replacement_conditions = 1; ?>
			<span class="superseded">
				<sup>
					<a title="<?= $AR_MSG['SearchModule']['msg14'] ?> <?= $row['superseded_by'] ?>"><?= $AR_MSG['SearchModule']['msg48'] ?></a>
				</sup>
			</span>

		<? } elseif ($row['replacement_for'] != '') { ?>

			<? $show_replacement_conditions = 1; ?>
			<span class="replacement">
				<sup>
					<a title="<?= $AR_MSG['SearchModule']['msg15'] ?> <?= $row['replacement_for'] ?>"><?= $AR_MSG['SearchModule']['msg49'] ?></a>
				</sup>
			</span>

		<? } ?>

		</nobr>
	</span>

<? } elseif ($hdr_id == 'prd_info_link') { ?>

	<div <?= ($row['brand_full_name'] != "" ? 'title="' . $row['brand_full_name'] . '"' : '') ?> <?= ($row['oem_brand'] == 1 ? 'class="web_ar_oem_brand"' : 'class="web_ar_brand"') ?>>
		<?=
			(!empty($row['prd_info_exist']) ? " <a href='/info/producers.html?prd=" . $row['prd_info_exist'] ."' class='prd_info_link' rel='prd_info_link' data-prdId='" . $row['prd_info_exist'] . "'>" . $row['prd_info_link'] . " </a>" : $row['prd_info_link']);
		?>
	</div>

<? } elseif ($hdr_id == 'remains') { ?>

	<? if (($row['remains'] == $AR_MSG['SearchModule']['msg16']) && ($row['info_only'] == 0)) { ?>

		<img src="/images/check.png" title="<?= $AR_MSG['SearchModule']['msg16'] ?>"
			 alt="<?= $AR_MSG['SearchModule']['msg16'] ?>"/>

	<? } elseif (($SearchSetting['showExactRemains'] == 1) && ($row['remains'] != '')) { ?>

		<? if ($row['remains'] > 0) { ?>
			=<?= $row['remains'] ?>
		<? } else { ?>
			<?= $row['remains'] ?>
		<? } ?>

	<? } elseif ($row['remains'] > 0) { ?>
		<?= $row['remains'] ?>
	<? } else { ?>
		-
	<? } ?>
<? } elseif ($hdr_id == 'destination_display') { ?>

	<? if ($row['destination_display'] != "") { ?>
		<?= $row['destination_display'] ?>
	<? } else { ?>
		&nbsp;
	<? } ?>

<? } elseif ($hdr_id == 'action') { ?>

	<? if (($row['info_only'] != '1') || ($row['provider_price'] > 0)) { ?>

		<? if (isset($assocBasketWares[$row['provider_id']][$row['brand']][$row['article']][(float)$row['final_netto_price']][$row['destination']][(int)$row['term']][strval(round($row['final_manager_price'],2))])) { ?>
			<span class="button button_to_basket">
				<a href="/shop/basket.html" title="<?=tr('В корзину', 'SearchModule')?>">
					<span class="basket_active_img"></span>
					<span class="basket_items_count">
						<?= $assocBasketWares[$row['provider_id']][$row['brand']][$row['article']][(float)$row['final_netto_price']][$row['destination']][(int)$row['term']][strval(round($row['final_manager_price'],2))]['amount'] ?>
					</span>
				</a>
			</span>
		<? } else { ?>
			<span id="action<?= $row['_search_id'] ?>"><?= $row['amount'] ?> <?= $row[$hdr_id] ?></span>
			<input type="hidden" id="max_amount_<?=$row['_search_id']?>" value="<?=($_interface->csLeadLettersToNumberForCheckRemains ? strToFloat($row['remains']) : (float)$row['remains'])?>"/>
		<? } ?>
	<? } ?>

<? } elseif ($hdr_id == 'orderm') { ?>

	<? if (($row['info_only'] != '1') || ($row['provider_price'] > 0)) { ?>
		<?= $row[$hdr_id] ?>
	<? } ?>

<? } elseif ($hdr_id == 'min_quantity') { ?>

	<? if ($row['min_quantity'] > 0) { ?>
		<?= $row[$hdr_id] ?>
	<? } else { ?>
		&nbsp;
	<? } ?>

<? } elseif ($hdr_id == 'info') { ?>

	<span>
					<?
					$detailInfo = array(
						"article" => $row['parsed_article'],
						"brand"   => $row['brand']
					);

					$detailLink = data2str($detailInfo, true, true);
					?>

		<a href="/info/detail.html?sid=<?= $row['_search_id'] ?>&detailLink=<?= $detailLink ?>" target="_blank"
		   rel="detail_info"><img src="/images/info.png" border="0" alt="<?= $AR_MSG['SearchModule']['msg17'] ?>"
								  hspace="1" align="absmiddle"/></a>

		<? if ($row['picture']) { ?>
			&nbsp;<a href="/info/detail.html?sid=<?= $row['_search_id'] ?>&detailLink=<?= $detailLink ?>"
					 target="_blank" rel="detail_info"><img src="/images/picture.png" border="0"
															alt="<?= $AR_MSG['SearchModule']['msg18'] ?>" hspace="1"
															align="absmiddle"/></a>
		<? } ?>

		<? if (($row['weight']) && ($row['weight'] > 0)) { ?>
			<img src="/images/weight.png" border="0"
				 title="<?= $AR_MSG['SearchModule']['msg19'] ?> = <?= $row['weight'] ?>"
				 alt="<?= $AR_MSG['SearchModule']['msg19'] ?> = <?= $row['weight'] ?>" hspace="1" align="absmiddle"/>

		<? } ?>
				</span>

<? } elseif ($hdr_id == 'price_brutto') { ?>

	<? if (($row['weight'] > 0) && ($row['cost_per_weight'] > 0)) { ?>

		<?= $row['price_brutto'] ?>

	<? } ?>

<? } elseif ($hdr_id == 'final_price') { ?>

	<? if ($row['provider_price'] == 0) { ?>
		-
	<? } elseif ($row['provider_price'] == '') { ?>
		-
	<? } else { ?>

		<? $final_price = $row[$hdr_id]; ?>
		<nobr><?= $row[$hdr_id] ?>

		<sup>
			<font color="#990000">

				<?
				if (count($Deliveries) > 0) {
					foreach ($Deliveries as $dlv => $cur_dlv) {

						if ($cur_dlv['delivery_condition'] == $row['delivery_condition']) {

							if ((($row['weight'] == 0) and ($cur_dlv['tax'] > 0)) || ($cur_dlv['tax'] == 0) || ($cur_dlv['tax'] == '')) {

								if (!safeArrayKey($showDelivery, $row['delivery_condition'])) {
									$showDelivery[$row['delivery_condition']] = $cur_dlv;
								}

								echo array_search($row['delivery_condition'], array_keys($showDelivery)) + 1;

							}

						}

					}
				}
				?>

			</font>
		</sup>

		<? if (($row['cost_per_weight'] > 0) && (!empty($row['cost_per_weight_display'])) and empty($row['weight'])) { ?>
			+ <?= $row['cost_per_weight_display'] ?>/<?=tr('кг', 'Common')?>.
		<? } ?>

	<? } ?>
	</nobr>

	<? if ($row['phand_value'] != 0) { ?>

		<br/>
		<small><span id="phand"><?= $AR_MSG['SearchModule']['msg20'] ?>&nbsp;<nobr><?= $row['detail_phand'] ?></nobr></span>
		</small>

	<? } ?>

<? } elseif ($hdr_id == 'date') { ?>

	<? if (($row['info_only'] != '1') || ($row['provider_price'] > 0)) { ?>
		<?= $row[$hdr_id] ?>
	<? } else { ?>
		-
	<? } ?>

<? } else { ?>

	<?= $row[$hdr_id] ?>

<? } ?><?  ?>

		</td>
	<? } ?>
	
	<? if ($basket_check == 1) { ?>
        <td align="right">
			<? if ($row['final_price_val'] && ($desire_price != 0)) { ?>
				<?=number_format((($row['final_price_val'] - $desire_price) / $desire_price *100), 2, '.', ' ')?>
			<? } ?>
		</td>
        <td align="right">
			<? if ($row['max_term'] && ($desire_term != 0)) { ?>
				<?=number_format((($row['max_term'] - $desire_term) / $desire_term *100), 2, '.', ' ')?>
			<? } elseif ($row['term'] && ($desire_term !=0 )) { ?>
				<?=number_format((($row['term'] - $desire_term) / $desire_term *100), 2, '.', ' ')?>
  	
            <? } ?>
        </td>
    <? } ?>
</tr>

<? } ?>

</table>

</form><?  ?>

		<? } ?>

		<div class="flc">
			<div class="leftside">
				<? if ((int)$search_results_info['allCount'] > 0) { ?>
					<div id="search_stat">
						<span><?= $AR_MSG['SearchModule']['msg53'] ?></span>
						<?= sprintf($AR_MSG['SearchModule']['msg54'], $search_results_info['allCount'], $search_results_info['matchCount'], $search_results_info['analogsCount'], $search_results_info['universCount'], $search_results_info['minPrice'], $search_results_info['maxPrice']) ?>
					</div>
				<? } ?>
			</div>
			<div class="rightside">
				<div id="search_navigation" class="flc">
					<div class="rightside">
						<?= $__search_results['controls']['searchPages'] ?>
					</div>
				</div>
			</div>
		</div>

		<div class="flc" id="search_bottom_notifies">
			<?  ?><div class="leftside">
	<? if (!$SearchSetting['admin_search']) { ?>

		<? if ($clientData['retail']!==true) { ?>

			<div class="warning">
				<div class="warning_caption"><?= $AR_MSG['Forms']['msg5'] ?></div>
				<?= $AR_MSG['SearchModule']['msg22'] ?>
			</div>

		<? } ?>
		<? if ($SearchSetting['isGuest']) { ?>
			<div class="warning">
				<div class="warning_caption"><?= $AR_MSG['SearchModule']['msg55'] ?></div>
			</div>
		<?}?>
	<? } ?>

	<?

	if (sizeof($showDelivery) > 0 || $show_replacement_conditions) {
		$Deliveries = $showDelivery;
		$k = 0;

		?>
		<div class="warning">
			<div class="warning_caption"><?= $AR_MSG['SearchModule']['msg23'] ?></div>

			<? foreach ($Deliveries as $dlv => $delivery) { ?>

				<? $k++; ?>

				<div style="padding: 10px">

					<sup><font color="#990000"><?= $k ?></font></sup>
					<?= $delivery['dlv_text'] ?>&nbsp;
				</div>

			<? } ?>

			<? if ($show_replacement_conditions == 1) { ?>

				<div style="padding: 5px">
<span style="color: #990000"><sup>
		<a title="<?= $row['superseded_by'] ?>"
		   style="font-weight: bold; width: 10px; background: #990000; color: #FFFFFF; padding: 1px; cursor: default"><?= $AR_MSG['SearchModule']['msg48'] ?></a>
	</sup></span>
					<?= $AR_MSG['SearchModule']['msg24'] ?>&nbsp;
				</div>

				<div style="padding: 5px">
<span style="color: #990000"><sup>
		<a title="<?= $row['replacement_for'] ?>"
		   style="width: 10px; background: #000000; color: #FFFFFF; padding: 1px; cursor: default"><?= $AR_MSG['SearchModule']['msg49'] ?></a>
	</sup></span>
					<?= $AR_MSG['SearchModule']['msg25'] ?>&nbsp;
				</div><br/>

			<? } ?>

		</div>

	<? } ?>
</div>

<? if (!$SearchSetting['admin_search']) { ?>
	<noindex>
		<div class="leftside">
			<div id="search_error">
				<div class="secaption"><?= $AR_MSG['SearchModule']['msg50'] ?></div>
				<div class="setext"><?= $AR_MSG['SearchModule']['msg51'] ?></div>
				<a href="/shop/report_error.html?errid=E2&article=<?= $SearchSetting['searchCode'] ?>&brand=<?= $SearchSetting['searchBrand'] ?>"
				   class="submitButton"><?= $AR_MSG['SearchModule']['msg52'] ?></a>
			</div>
		</div>
	</noindex>

<? } ?><?  ?>
		</div>

	<? } elseif ($alternatives) { ?>
		<?  ?><table border="0" class="web_ar_datagrid search_alternatives">

<tr>

<? foreach ($alternatives['header'] as $hdr_id=>$column) { ?>

	<? if ($column['visible']==true) { ?>

	<th class="col_<?=$hdr_id?>"><?=$column['caption']?></th>

	<? } ?>

<? } ?>
</tr>

<? foreach ($alternatives['data'] as $dat_id=>$row) { ?>

<tr class="<?=($dat_id % 2 == 0?'even':'odd')?>">
	<? foreach ($alternatives['header'] as $hdr_id=>$column) { ?>
	
		<?
			switch ($hdr_id) {
				
				case 'brand':
				case 'action_alt': {
					$align = 'center';
				} break;
				default: {
					$align = 'left';
				} break;
				
			}
		?>
		
		<? if ($column['visible'] == true) { ?>
		<td align="<?=$align?>" class="col_<?=$hdr_id?>">
			<a href="<?=$_SERVER['REQUEST_URI']."&g=".$row['group_num']?>">
				<?=$row[$hdr_id]?>

				<? if ($hdr_id=='spare') { ?>

					<? if ($row['superseded_by']!='') { ?>
					<?=$row['code']?> - <?=$AR_MSG['SearchModule']['msg7']?><?=$row['superseded_by']?>
					<? } ?>

					<? if ($row['replacement_for']!='') { ?>
					<?=$row['code']?> - <?=$AR_MSG['SearchModule']['msg8']?><?=$row['replacement_for']?>
					<? } ?>

				<? } ?>
			</a>
		</td>
		<? } ?>

	<? } ?>
</tr>

<? } ?>

</table><?  ?>
	<? } ?>

	<? if ($SearchSetting['invalid_search']) { ?>

		<?  ?><?=$AR_MSG['SearchModule']['msg26']?>
	<?=$AR_MSG['SearchModule']['msg27']?>
	<?=$AR_MSG['SearchModule']['msg28']?>
	<?=$AR_MSG['SearchModule']['msg29']?>
	<?=$AR_MSG['SearchModule']['msg30']?>
	<?=$AR_MSG['SearchModule']['msg31']?><?  ?>

	<? } ?>

	<? } ?>

<? } else { ?>

	<?  ?><h2><?=$AR_MSG['SearchModule']['msg39']?></h2>
	
<p><?=$AR_MSG['SearchModule']['msg40']?></p><?  ?>

<? } ?><? 

	}

}
?>

<script type="text/javascript">

	function initScripts() {
		if (typeof setWidth == 'function') {
			setWidth();
		}
		if (typeof initSelect == 'function') {
			initSelect();
		}
		if (typeof initTabLister == 'function') {
			initTabLister();
		}
		if (typeof fixedCaption == 'function') {
			fixedCaption();
		}
		if (typeof initSQBox == 'function') {
			initSQBox();
		}
	}

	jqWar(document).ready(function () {
		setTimeout(initScripts, 500);
	});

</script>
<?if ($SearchSetting['admin_search'] == 1){?>
	<script>
		window.onload = function(){
			var forms = document.forms,
				leForm =forms.length,
				i = 0,
				form;
			for(i;i<leForm;i++){
				if(forms[i].action.indexOf('admin/eshop/basket.html')>-1){
					var form = forms[i];
					form.onsubmit = function(){
						var inputs = form.getElementsByTagName("input"),
							le = inputs.length,
							j = 0;
						for(j;j<le;j++){
							if(inputs[j].type == 'checkbox' && inputs[j].checked){
								return;
							}
						}
						alert('<?=tr('Пожалуйста, выберите позиции', 'SearchModule')?>');
						return false;
					}
				}
			}
		}
	</script>
<?}?><? 
	
?>