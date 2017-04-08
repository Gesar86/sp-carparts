<?
$_PG_rowsAtPage = 1;

include(__spellPATH("PHP_TEMPLATES_LIB:/content/_sysTables/module.table-template-func.php"));

if ($_USER['adapter']->num_rows($data) > 0) {
	?>
	<div id="main_actions" class="leftside">
		<h1><?=tr('Акция', 'Template')?></h1>
		<?
		while ($row = $_USER['adapter']->fetch_row_assoc($data)) {
			$date = explode(' ', $row['datetime']);
			$row['date'] = universal_date($date[0], 'array');
			?>
			<div class="actions">
				<div class="actions_date"><?= substr($row['date']['month'], 0, 3) ?>
					<span><?= $row['date']['day'] ?></span>
				</div>
				<? if (!empty($row['img'])) { ?>
					<div class="actions_image">
						<a href="/about/actions/<?= $row['id'] ?>/">
							<img src="<?= $row['img'] ?>" alt="<?= $row['caption'] ?>" title="<?= $row['caption'] ?>"/>
						</a>
					</div>
				<? } ?>
				<? if (!empty($row['short_text'])) { ?>
					<div class="actions_caption">
						<a href="/about/actions/<?= $row['id'] ?>/"><?= $row['short_text'] ?></a>
					</div>
				<? } ?>
			</div>
		<?
		}
		?>
	</div>
<?
}
?>