<?php /* Smarty version 2.6.14, created on 2014-07-14 13:14:19
         compiled from /home/www/autocom.net.ua/www/_smarty/catalogs/catalog_list_main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', '/home/www/autocom.net.ua/www/_smarty/catalogs/catalog_list_main.tpl', 19, false),array('modifier', 'replace', '/home/www/autocom.net.ua/www/_smarty/catalogs/catalog_list_main.tpl', 30, false),)), $this); ?>
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
<?php if ($this->_tpl_vars['BRANDS'] != ''): ?>
	<?php echo smarty_function_math(array('equation' => "ceil(val)",'assign' => 'rows','val' => $this->_tpl_vars['sizeof_BRANDS']/4), $this);?>

	<div id="catalogs" class="flc">

	<ul class="leftside">
	<?php $_from = $this->_tpl_vars['BRANDS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['br'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['br']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['br']['iteration']++;
?>

 		<li<?php if ($this->_foreach['br']['iteration']%$this->_tpl_vars['rows'] == 0): ?> class="last"<?php endif; ?>>
			
				<?php if ($this->_tpl_vars['item']['1']['url_href'] || $this->_tpl_vars['item']['1']['url_content']): ?>
					<a href="<?php echo $this->_tpl_vars['script_url']; ?>
?n=<?php echo $this->_tpl_vars['item']['0']['t_id']; ?>
" rel="tecdoc_cat_dop" class="tecdoc_cat_dop" style="background-image:url('<?php echo $this->_tpl_vars['item']['0']['t_img']; ?>
')" target="_blank">
					
						<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('replace', true, $_tmp, "-BENZ", "") : smarty_modifier_replace($_tmp, "-BENZ", "")); ?>

					</a>
				<?php else: ?>
					<?php if ($this->_tpl_vars['item']['0']['url_href']): ?>
					<a href="<?php echo $this->_tpl_vars['item']['0']['url_href']; ?>
" style="background-image:url('<?php echo $this->_tpl_vars['item']['0']['t_img']; ?>
')" target="_blank">
					
						<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('replace', true, $_tmp, "-BENZ", "") : smarty_modifier_replace($_tmp, "-BENZ", "")); ?>
				
					</a>
					<?php endif; ?>
				<?php endif; ?>

		</li>
		
		<?php if (( $this->_foreach['br']['iteration']%$this->_tpl_vars['rows'] == 0 ) && ( $this->_foreach['br']['iteration'] != $this->_tpl_vars['sizeof_BRANDS'] )): ?>
		</ul><ul class="leftside">
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	</ul>
	
	</div>
<?php endif; ?>