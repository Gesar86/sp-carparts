<h1>Новости</h1>
<a href="/about/news/" class="pageLink">Перечень новостей</a>
{%strip%}

<div class="pageContent">

{%php%}

	include(__spellPATH("SMARTY_LIB:/content/_sysTables/module.detail-template-func.php"));
	
	if ($validRequest) {

  //echo "<h1>".$this->_tpl_vars['CONTENT'][0]['str_title']."</h1>";

	global $_SYSTEM;
	if (!isset($_SYSTEM->PROMO_PARTS["site_title"]["prm_content"])) $_SYSTEM->SITE_TITLE = $this->_tpl_vars['caption'];
	if (!isset($_SYSTEM->PROMO_PARTS["description"]["prm_content"])) $_SYSTEM->DESCRIPTION = $this->_tpl_vars['caption'];
	
	$date = explode(' ',$this->_tpl_vars['datetime']);
	$this->_tpl_vars['russian_date'] = russian_date($date[0], 'array');
{%/php%}
<br />
<div class="news">
	<div class="news_caption2"><h2>{%$caption%}</h2></div>
	{%if $full_text%}
		<div class="news_fulltext">
			{%eval var=$full_text %}
		</div>
	{%/if%}
	<div class="news_bottom_date">{%php%}echo _c_strftime('%d %B %Y', strtotime($this->_tpl_vars['datetime']));{%/php%}</div>
</div>

{%php%}

	}

{%/php%}

</div>

{%/strip%}