<noindex>
<div class="cat_dop">
<table border="0"  class="web_ar_datagrid brand_box" cellpadding="0" cellspacing="0">
	<tr>
		<td width="70" align="center" valign="top" class="cat_dop_img" style="padding-top:9px;"><img src="/_phplib/images/lite.preview.php?path={%$DATA.0.t_img%}&amp;w=45&amp;h=45" width="45" height="45" alt="" title="" /></td>
		<td valign="top" align="left" class="cat_dop_td" style="padding-top:10px;">
			<h1>Электронные каталоги запчастей {%$DATA.0.t_cat_name%}</h1>
			<div class="cat_dop_div" style="font-weight:bold;">Для подбора необходимых запчастей выберите каталог:</div>
			<ul class="wi">
			{%foreach key=key item=row from=$DATA%}
				{%if $row.url_href%}
					<li><a href="{%$row.url_href%}">{%$row.url_content%}</a></li>
				{%else%}
					<li>{%$row.url_content%}</li>
				{%/if%}
			{%/foreach%}
			</ul>
		</td>
	</tr>
</table>
</div>
</noindex>