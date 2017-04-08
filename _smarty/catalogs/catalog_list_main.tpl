<script type="text/javascript">	
		document.write('<scr'+'ipt type="text/javascript" src="/_syslib/mootools-more-old.js"></scr'+'ipt>');
		document.write('<scr'+'ipt type="text/javascript" src="/_syslib/squeezebox/squeezebox.js"></scr'+'ipt>');
		
		window.addEvent('domready', function() {
		
				new Asset.css('/_syslib/squeezebox/squeezebox_info.css', {id: 'SqueezeBox', title: 'SqueezeBox'});
		
				SqueezeBox.assign($$('a[rel=tecdoc_cat_dop]'), {
		        size: {x: 500, y: 190},
		        ajaxOptions: {
		            method: 'get' 
		        }
			    });		
		});
		
</script>
{%if $BRANDS != ''%}
	{%math equation="ceil(val)" assign="rows" val=$sizeof_BRANDS/4%}
	<div id="catalogs" class="flc">

	<ul class="leftside">
	{%foreach name=br key=key item=item from=$BRANDS%}

 		<li{%if $smarty.foreach.br.iteration%$rows == 0%} class="last"{%/if%}>
			
				{%if $item.1.url_href or $item.1.url_content%}
					<a href="{%$script_url%}?n={%$item.0.t_id%}" rel="tecdoc_cat_dop" class="tecdoc_cat_dop" style="background-image:url('{%$item.0.t_img%}')" target="_blank">
					
						{%$key|replace:"-BENZ":""%}
					</a>
				{%else%}
					{%if $item.0.url_href%}
					<a href="{%$item.0.url_href%}" style="background-image:url('{%$item.0.t_img%}')" target="_blank">
					
						{%$key|replace:"-BENZ":""%}				
					</a>
					{%/if%}
				{%/if%}

		</li>
		
		{%if ($smarty.foreach.br.iteration%$rows == 0) && ($smarty.foreach.br.iteration != $sizeof_BRANDS)%}
		</ul><ul class="leftside">
		{%/if%}
	{%/foreach%}
	</ul>
	
	</div>
{%/if%}