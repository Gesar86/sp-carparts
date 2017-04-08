<div class="news_list">
{%php%}

  echo "<h1>".$this->_tpl_vars['CONTENT'][0]['str_title']."</h1>";

	include(__spellPATH("SMARTY_LIB:/content/_sysTables/module.table-template-func.php"));

	if ($validTable) {
		
		echo $_PG_buffer;
		
		if ($_USER['adapter']->num_rows($data) > 0) {
			
			while ($row = $_USER['adapter']->fetch_row_assoc($data)) {
				$date = explode(' ',$row['datetime']);
				$row['russian_date'] = russian_date($date[0], 'array');
			{%/php%}
				
				<div class="news">
					<div class="news_date">{%php%}echo substr($row['russian_date']['month'],0,3){%/php%}<span>{%php%}echo $row['russian_date']['day']{%/php%}</span></div>
					<div class="news_caption"><a href="/about/news/{%php%}echo $row['id']{%/php%}/">{%php%}echo $row['caption']{%/php%}</a><br />{%php%}echo $row['short_text']{%/php%} <a href="/about/news/{%php%}echo $row['id']{%/php%}/"><img src="/images/news_arrow.png" alt="" title="" /></a></div>
				</div>
				
			{%php%}
			}

		} else {
				
			echo "<div class=\"pressListDate\">";
			
			echo $tableControls['_sysTableEmptyMessage']['str_text'];
			
			echo "</div>";
		
		}	
		
	}

{%/php%}
</div>