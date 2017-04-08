<?
$_PG_rowsAtPage = 3;

include(__spellPATH("PHP_TEMPLATES_LIB:/content/_sysTables/module.table-template-func.php"));

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