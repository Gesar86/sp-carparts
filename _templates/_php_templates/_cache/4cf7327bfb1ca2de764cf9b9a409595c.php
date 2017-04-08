<?
$_PG_rowsAtPage = 3;

 ?><?
		$validTable = false;

		$_USER = &$GLOBALS['_USER'];
		$CONST = &$GLOBALS['CONST'];
		$_SYSTEM = &$GLOBALS['_SYSTEM'];

		if (!$tableObject) {
			
			$tableObject = $item?$item:$CONTENT[0];
			
		}

		$tableName = $_USER['adapter']->has_table($tableObject['str_name'])?
				$tableObject['str_name']:
				$CONST['db_table_prefix']."struc_table_".$tableObject['str_id'];
				

		if ($_USER['adapter']->has_table($tableName)) {
		
			$validTable = true;

			$_PG_rowsAtPage = (int)$_PG_rowsAtPage;

			$_PG = (int)$_PG;
		
			$query = "
			
			SELECT *
			FROM ".$CONST['db_table_prefix']."_meta_fields
			WHERE mf_table = '".$tableName."'
			ORDER BY mf_order
			
			";
			
			$data = $_USER['adapter']->query($query);
			$tableInfo = array();
			
			while ($output = $_USER['adapter']->fetch_row_assoc($data)) {
			
				$tableInfo[$output['mf_name']] = $output;
			
			}
			
			$orderFields = array();
			
			foreach ($tableInfo as $field => $info) {
				
				if ($info['mf_sort_field'] != 'N') {
					
					$orderFields[] = $field." ".$info['mf_sort_field'];
					
				}
				
			}
			
			$tableDBInfo = $_USER['adapter']->list_fields($tableName);
			
			$query = "
			
			SELECT *
			FROM `".$tableName."`

			WHERE 1 = 1
			
			".(in_array("domain", $tableDBInfo)?" AND '".$_SYSTEM->DOMAIN."' 
				REGEXP concat('^', COALESCE(domain, '.*'), '\$')":"")."
				
			".(in_array("lng", $tableDBInfo)?" AND '".$_SYSTEM->LNG."' = `lng`":"")."
			
			".(sizeof($orderFields)>0?"ORDER BY ".implode(", ", $orderFields):"");

		
//			__var_dump($query);
			
			if ($_PG_rowsAtPage > 0) {
				
				$_PG_object = new PaginationControl($query, $_USER['adapter'], $_PG_rowsAtPage);
				$data = $_PG_object->limitedResource();					
				
				$htmlRender = new HTML_DataRender();
			
				$_PG_buffer = $_PG_object->render($htmlRender);
				
			} else {
			
				$data = $_USER['adapter']->query($query);
					
			}			

			
			
			$tableControlContent = new SiteContent();
			$tableControlsData = $tableControlContent->getContentQuery($tableObject['str_id']);
			
			while ($output = $_USER['adapter']->fetch_row_assoc($tableControlsData)) {
				
				$tableControls[$output['str_name']] = $output;
				
			}
						
			switch (true) {
				
				case (preg_match("/\.htm(l)?$/i", $tableObject['str_url'])): {
					
					$switchType = "?id=";
					
				} break;
				
				default: {
					
					$switchType = preg_match("|/$|i", $tableObject['str_url'])?"":"/";
					
				} break;
								
			}

		}
			

?><? 

if ($_USER['adapter']->num_rows($data) > 0) {
	?>
	<div id="main_news" class="rightside">
		<h1><?=tr('Новости', 'AdminLeftMenu')?></h1>
		<?
		while ($row = $_USER['adapter']->fetch_row_assoc($data)) {
			$date = explode(' ', $row['datetime']);
			$row['date'] = universal_date($date[0], 'array');
			?>
			<div class="news">
				<div class="news_date"><?= substr($row['date']['month'], 0, 3) ?>
					<span><?= $row['date']['day'] ?></span>
				</div>
				<div class="news_caption">
					<a href="/about/news/<?= $row['id'] ?>/"><?= $row['caption'] ?></a>
					<?= $row['short_text'] ?>
					<a href="/about/news/<?= $row['id'] ?>/"><img src="/images/news_arrow.png" alt="" title=""/></a>
				</div>
			</div>
		<?
		}
		?>
	</div>
<?
}
?>