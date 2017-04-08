<?php /* Smarty version 2.6.14, created on 2016-09-15 20:20:38
         compiled from /home/www/_LIB/_php_templates/content/tpl.user_menu.php */ ?>
<?php echo '<?'; ?>

$level = $CONTENT[0]['str_level'] + 1;
$left = $CONTENT[0]['str_left'];
$right = $CONTENT[0]['str_right'];
<?php echo '?>'; ?>

<ul id="user_menu" class="slide_menu">
	<li class="menu lk_but">
		<a href="<?php echo '<?='; ?>
 $CONTENT[0]['str_url'] <?php echo '?>'; ?>
" class="lk_but_a"><span><?php echo '<?='; ?>
 $MSG['LoginFormModule']['msg36'] <?php echo '?>'; ?>
</span></a>

		<ul class="links">
			<?php echo '<?'; ?>
 foreach ($CONTENT as $key => $item) { <?php echo '?>'; ?>

				<?php echo '<?'; ?>
 if ($item['str_level'] == $level and $item['str_left'] > $left and $item['str_right'] < $right) { <?php echo '?>'; ?>

					<li>
						<a href="<?php echo '<?='; ?>
 $item['str_url'] <?php echo '?>'; ?>
"<?php echo '<?='; ?>
 (!empty($item['str_metadata']['img']) ? ' style="background-image:url(' . $item['str_metadata']['img'] . ');"' : '') <?php echo '?>'; ?>
><?php echo '<?='; ?>
tr($item['str_title'], 'AdminLeftMenu')<?php echo '?>'; ?>
</a>
					</li>
				<?php echo '<?'; ?>
 } <?php echo '?>'; ?>

			<?php echo '<?'; ?>
 } <?php echo '?>'; ?>

		</ul>
	</li>
</ul>
<script type="text/javascript">
	window.addEvent('domready', function () {
		var myMenu = new MenuMatic({id: 'user_menu', opacity: '100'});
	});
</script>