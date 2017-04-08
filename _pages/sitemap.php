<h1><?=$_SYSTEM->REQUEST_MASK[page_title]?></h1>
<div class="sitemap">
		<?
		$query = "
			SELECT
				a.*
			FROM
				`$CONST[db_table_prefix]_objects_structure` as a,
				`$CONST[db_table_prefix]_objects_structure` as b
			WHERE
				b.str_name = 'left_menu' and
				a.str_left  >= b.str_left and
				a.str_right <= b.str_right and
				a.str_published = 'Y'
			ORDER BY
				a.str_left
		";
		
		$res = $_USER["adapter"]->query($query);
		$firstRow = false;
		while ($row = $_USER["adapter"]->fetch_row_assoc($res))
			{
			if (!$firstRow) 
				{
				$firstRow = $row;
				continue;
				}
			
			if ($row["str_title"] != '')
				{
				if ($row["str_url"] != '')
					{
					$item = '<a href="'.$row["str_url"].'">'.$row["str_title"].'</a>';	
					} else
					{
					$item = $row["str_title"];	
					}
				
				switch($row["str_level"] - $firstRow["str_level"])
					{
					case 1:
					
						echo '<h2>'.$item.'</h2>';
						break;
						
					case 2:
					
						echo '<li class="lev2">'.$item.'</li>';
						break;
						
					case 3:
					
						echo '<li class="lev3">'.$item.'</li>';
						break;
					}
				}
			}
		?>
		
</div>