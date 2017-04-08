<div class="actions_list">
{%php%}

  echo "<h1>".$this->_tpl_vars['CONTENT'][0]['str_title']."</h1>";

	include(__spellPATH("SMARTY_LIB:/content/_sysTables/module.table-template-func.php"));

	if ($validTable) {
		
		if ($_USER['adapter']->num_rows($data) > 0) {
		
			while ($row = $_USER['adapter']->fetch_row_assoc($data)) {
				$date = explode(' ',$row['datetime']);
				$row['russian_date'] = russian_date($date[0], 'array');
			{%/php%}
				
				<div class="actions">
					<div class="actions_date">{%php%}echo substr($row['russian_date']['month'],0,3){%/php%}<span>{%php%}echo $row['russian_date']['day']{%/php%}</span></div>
					<div class="actions_caption"><a href="/about/actions/{%php%}echo $row['id']{%/php%}/">{%php%}echo $row['caption']{%/php%}</a><br />{%php%}echo $row['short_text']{%/php%} <a href="/about/actions/{%php%}echo $row['id']{%/php%}/"></a></div>
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