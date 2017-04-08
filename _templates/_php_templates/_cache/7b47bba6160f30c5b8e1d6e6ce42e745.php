<div class="notice">
<h2><?=tr('Информация о запросе', 'Common')?></h2>

<p><strong><?=tr('Автомобиль', 'Forms')?>:</strong> <?=$requestData['brand']?>, <?=$requestData['model']?>, <?=$requestData['month']?>/<?=$requestData['year']?>. <strong><?=tr('VIN', 'Forms')?>:</strong> <?=$requestData['vin']?></p>

<?
$params = [
	tr('двигатель', 'Forms') => $requestData['engine'],
	tr('тип кузова', 'Forms') => tr($requestData['body_name'], 'vin_body_types'),
	tr('привод', 'Forms') => tr($requestData['drive'], "VinRequestModule"),
	tr('цилиндров', 'Forms') => $requestData['cylinders'],
	tr('объем', 'Forms') => $requestData['volume'],
	tr('клапанов', 'Forms') => $requestData['valves'],
	tr('мощность', 'Forms') => $requestData['power'],
	tr('страна', 'Forms') => $requestData['country'],
	tr('руль', 'Forms') => ($requestData['steering_left'] == 1 ? tr("левый", 'Common') : "") . ($requestData['steering_right'] == 1 ? " ".tr("правый", 'Common') : ""),
	tr('тип кпп', 'Forms') => tr($requestData['transmission'], "VinRequestModule"),
	tr('номер кпп', 'Forms') => $requestData['transm_number'],
	tr('число передач', 'Forms') => $requestData['transm_count'],
	tr('кондиционер', 'Forms') => $requestData['conditioner'],
	tr('гидроусилитель', 'Forms') => $requestData['booster'],
	tr('ABS', 'Forms') => $requestData['abs'],
	tr('катализатор', 'Forms') => $requestData['catalyst'],
	tr('турбо', 'Forms') => $requestData['turbo'],
	tr('ASR', 'Forms') => $requestData['asr'],
	tr('ASD', 'Forms') => $requestData['ASD'],
	tr('ESP', 'Forms') => $requestData['esp'],
	tr('ETS', 'Forms') => $requestData['ets'],
];
$arYN = [
	tr('кондиционер', 'Forms'),
	tr('гидроусилитель', 'Forms'),
	tr('ABS', 'Forms'),
	tr('катализатор', 'Forms'),
	tr('турбо', 'Forms'),
	tr('ASR', 'Forms'),
	tr('ASD', 'Forms'),
	tr('ESP', 'Forms'),
	tr('ETS', 'Forms'),
];
foreach ($params as $key => $value) {
	if (!$value) {
		unset($params[$key]);
		continue;
	}
	if (in_array($key, $arYN)) {
		$params[$key] = $key;
	} else {
		$params[$key] = $key.': '.$value;
	}
}
if (!empty($params)) { ?>
	<p><?=implode(', ', $params)?></p>
<? } ?>
<? if ($requestData['info']) { ?>
	<p><strong><?=tr('Дополнительная информация', 'Common')?>:</strong><br><?=$requestData['info']?></p>
<? } ?>
</div>

<h2><?=tr('Позиции', 'Common')?></h2>

<?=$editTableRender?>
