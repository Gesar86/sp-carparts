<? global $_SYSTEM; ?>
<script>
	function resetCache(cacheType) {

		if (!confirm('<?=tr('Вы уверены, что хотите выполнить выбранное действие?', 'Common')?>')) {
			return false;
		}

		location.href = '<?=$_SYSTEM->REQUESTED_PAGE?>?fn=clearCache' + cacheType;

	}
</script>
<? if (!empty($messages)) { ?>
	<? foreach ($messages as $msg) { ?>
		<?= $msg ?>
	<? } ?>
<? } ?>

<table cellpadding="3" cellspacing="1" class="admin_edit_table">
	<tr>
		<td class="cache-name"><?= tr('Кэш аналогов', '_components_cache_settings') ?></td>
		<td class="cache-state"><?= trp('В кэше %s записей', '_components_cache_settings', $cacheAnalogsState) ?></td>
		<td class="cache-reset">
			<input type="submit" onclick="resetCache('Analogs')" value="<?= tr('Сбросить', 'Common') ?>"></td>
		<td class="info">
			<img src="/_sysimg/ar2/help.png" hspace="5" border="0" align="absmiddle" alt="<?= $msg = tr('Хранит в себе список аналогов и замен для искомого кода в различных режимах поиска. Сбрасывается по расписанию раз в час.', '_components_cache_settings'); ?>" title="<?= $msg ?>"/>
		</td>
	</tr>
	<tr>
		<td class="cache-name"><?= tr('Кэш первого шага поиска (производителей)', '_components_cache_settings') ?></td>
		<td class="cache-state"><?= trp('В кэше %s артикулов', '_components_cache_settings', $cacheProducersState) ?></td>
		<td class="cache-reset">
			<input type="submit" onclick="resetCache('Producers')" value="<?= tr('Сбросить', 'Common') ?>"></td>
		<td class="cache-info">
			<img src="/_sysimg/ar2/help.png" hspace="5" border="0" align="absmiddle" alt="<?= $msg = tr('Хранит в себе список производителей искомого артикула, одинаковый для всех клиентов. Сбрасывается по расписанию раз в час.', '_components_cache_settings'); ?>" title="<?= $msg ?>"/>
		</td>
	</tr>
	<tr>
		<td class="cache-name"><?= tr('Кэш изображений', '_components_cache_settings') ?></td>
		<td class="cache-state">
			<? if ($scanBrandsState) { ?>
				<? if ($scanBrandsState === 'mutex fail') { ?>
					<?= tr('Последний запуск сканирования блокирован. Попробуйте позже.', '_components_cache_settings') ?>
					<? unset($scanBrandsState); ?>
				<? } else { ?>
					<?= trp('Сканирование директории: %s', '_components_cache_settings', $scanBrandsState) ?>
				<? } ?>
			<? } else { ?>
				<? if ($scanBrandsLastDate) { ?>
					<?= trp('Последний раз сканирование выполнялось %s', '_components_cache_settings', date('d.m.Y H:i:s', strtotime($scanBrandsLastDate))) ?>
				<? } else { ?>
					<?= tr('Сканирование изображений пока что не выполнялось', '_components_cache_settings') ?>
				<? } ?>
			<? } ?>
		</td>
		<td class="cache-reset">
			<input <?= ($scanBrandsState ? 'disabled="disabled"' : '') ?> type="submit" onclick="resetCache('Images')" value="<?= tr('Сгенерировать заново', '_components_cache_settings') ?>">
		</td>
		<td class="cache-info">
			<img src="/_sysimg/ar2/help.png" hspace="5" border="0" align="absmiddle" alt="<?= $msg = tr('Информация о местоположении изображений, подхватываемых по артикулу и бренду хранится в БД, чтобы каждый раз не проверять существование множества различных файлов.', '_components_cache_settings'); ?>" title="<?= $msg ?>"/>
		</td>
	</tr>
	<tr>
		<td class="cache-name"><?= tr('Файлы предварительного просмотра изображений', '_components_cache_settings') ?></td>
		<td class="cache-state">
			<? if ($deleteThumbsState) { ?>
				<?= tr('Удаление файлов предварительного просмотра в процессе', '_components_cache_settings') ?>
			<? } else { ?>
				<? if ($deleteThumbsLastDate) { ?>
					<?= trp('Принудительно файлы предварительного просмотра последний раз удалялись %s', '_components_cache_settings', date('d.m.Y H:i:s', strtotime($deleteThumbsLastDate))) ?>
				<? } else { ?>
					<?= tr('Принудительно файлы предварительного просмотра не удалялись', '_components_cache_settings') ?>
				<? } ?>
			<? } ?>
		</td>
		<td class="cache-reset">
			<input type="submit" onclick="resetCache('Preview')" value="<?= tr('Удалить', 'Common') ?>"></td>
		<td class="cache-info">
			<img src="/_sysimg/ar2/help.png" hspace="5" border="0" align="absmiddle" alt="<?= $msg = tr('Эти файлы создаются, чтобы облегчить нагрузку на страницы с большим количеством изображений путем замены больших изображений на их уменьшенные копии. Автоматическое удаление через 30 дней после создания.', '_components_cache_settings'); ?>" title="<?= $msg ?>"/>
		</td>
	</tr>
	<tr>
		<td class="cache-name"><?= tr('PHP-кэш', '_components_cache_settings') ?></td>
		<td class="cache-state"></td>
		<td class="cache-reset">
			<input type="submit" onclick="resetCache('Php')" value="<?= tr('Сбросить', 'Common') ?>"></td>
		<td class="cache-info">
			<img src="/_sysimg/ar2/help.png" hspace="5" border="0" align="absmiddle" alt="<?= $msg = tr('PHP-кэш предназначен для кэширования готовых html-блоков и сбора одного пхп-шаблона из его составляющих. Настройки PHP-кэша по типам регулируются ниже.', '_components_cache_settings'); ?>" title="<?= $msg ?>"/>
		</td>
	</tr>
</table>
