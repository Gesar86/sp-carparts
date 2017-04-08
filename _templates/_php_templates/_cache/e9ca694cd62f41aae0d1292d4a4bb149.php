<? if ($table_caption_cell['sorted']) { ?>
<table border="0"><tr><td><?=$table_caption_cell['aImg']->render($this)?></td><td><?=$table_caption_cell['a']->render($this)?></td></tr></table>
<? } else { ?>
<?=$table_caption_cell['caption']?>
<? } ?>