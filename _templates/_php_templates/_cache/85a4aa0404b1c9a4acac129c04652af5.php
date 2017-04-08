<?
if ($CONST['DOCTYPE_OFF'] !== true or ($CONST['DOCTYPE_ON'] === true and $CONST['DOCTYPE_OFF'] !== true)) {
	if (isset($CONST['DOCTYPE'])) {
		echo $CONST['DOCTYPE'];
	} else {
		if ($_SYSTEM->CHARSET == 'utf-8') {
			echo '<!DOCTYPE html>';
		}
	}
}
?>
<html<?= ($CONST["HtmlTagText"] ? ' ' . $CONST["HtmlTagText"] : '') ?>>
<head>
<?
global $__BUFFER, $CMS_API;

echo $__BUFFER->flushBuffer('CUSTOM_HEADER'); ?>
<?
if (!empty($_SYSTEM->SITE_TITLE)) {
	if (!$CONST['hide_meta_title']) {
?>
<meta name="title" content="<?= flushPageInfo($_SYSTEM->SITE_TITLE) ?>"/>
<?
	}
?>
<title><?= flushPageInfo($_SYSTEM->SITE_TITLE) ?></title>
<?
}

if (!empty($_SYSTEM->KEYWORDS)) {
?>
<meta name="keywords" content="<?= flushPageInfo($_SYSTEM->KEYWORDS) ?>"/>
<?
}

if (!empty($_SYSTEM->DESCRIPTION)) {
?>
<meta name="description" content="<?= flushPageInfo($_SYSTEM->DESCRIPTION) ?>"/>
<?
}

if (!empty($CONST['favicon']) || is_file($CONST['site_root'] . "/favicon.ico")) {
	$favicon = !empty($CONST['favicon']) ? $CONST['favicon'] : "/favicon.ico";
?>
<link rel="shortcut icon" href="<?= $favicon ?>" type="image/x-icon"/>
<link rel="icon" href="<?= $favicon ?>" type="image/x-icon"/>
<?
}

foreach((array)$CMS_API->arIosIcons as $icon) { ?>
<link rel="apple-touch-icon" <?=implode(' ', $icon)?>/>
<? }

if (!empty($_SYSTEM->CLASSIFICATION)) {
?>
<meta name="classification" content="<?= flushPageInfo($_SYSTEM->CLASSIFICATION) ?>"/>
<?
}

if (!empty($_SYSTEM->ADD_META_FIELDS)) {
	if (is_array($_SYSTEM->ADD_META_FIELDS) && count($_SYSTEM->ADD_META_FIELDS) > 0) {
		foreach ($_SYSTEM->ADD_META_FIELDS as $var => $value) {
			if ($var and $value) {
?>
<meta name="<?= $var ?>" content="<?= $value ?>"/>
<?
			}
		}
	}
}

if (!empty($_SYSTEM->ROBOTS)) {
?>
<meta name="robots" content="<?= $_SYSTEM->ROBOTS ?>"/>
<?
}

if (!empty($_SYSTEM->CHARSET)) {
?>
<meta http-equiv="Content-Type" content="text/html; charset=<?= $_SYSTEM->CHARSET ?>"/>
<?
}

//блок использования компрессора
//подключим компрессор
if ($CONST['compress_output'] == true) {
	include_once(__spellPATH("LIB_UN:/compressor/compressor.php"));
	$Compressor = new Compressor();
}

$all_scripts = $all_styles = array();
if (is_array($_SYSTEM->CLIENT_SCRIPT_LIBS)) {
	foreach ($_SYSTEM->CLIENT_SCRIPT_LIBS as $client_script) {
		if (!trim($client_script)) {
			continue;
		}
		switch (true) {
			case strpos($client_script, 'SYSLIB:') !== false:
				$all_scripts [] = str_replace('SYSLIB:', '/_syslib', $client_script);
				break;
			case strpos($client_script, CMS_API::getProtocol(). '://') !== false:
			case strpos($client_script, '//') === 0:
				$all_scripts [] = $client_script;
				break;
			default:
				$all_scripts [] = $CONST["site_sub_dir"] . $CONST["client_script_libs_dir"] . $client_script;
		}
	}
}
$temp_scriptsPathA = $__BUFFER->scripts_path;
$__BUFFER->scripts_path = array();
$__BUFFER->scripts = array();
$__BUFFER->__BUFFER['HEADER_SCRIPT'] = '';
if (is_array($temp_scriptsPathA)) $all_scripts = array_merge($all_scripts, $temp_scriptsPathA);

if ($CONST['compress_output'] == true) {
	foreach ($all_scripts as $client_script) $Compressor->js [] = $client_script;
	$__BUFFER->addScript($Compressor->LoadJs()); //формирование одной ссылки
} else {
	foreach ($all_scripts as $client_script) $__BUFFER->addScript($client_script);
}

//-------------------------------------------------------------------------
if (is_array($_SYSTEM->CSS_TABLES)) {
	foreach ($_SYSTEM->CSS_TABLES as $css) {
		if (!preg_match("/^SYSCSS:/", $css) and !preg_match("/^SYSLIB:/", $css)) {
			$css = $CONST["site_sub_dir"] . $CONST["css_dir"] . $css;
		} else {
			$css = preg_replace("/^SYSCSS:/", "/_syscss", $css);
			$css = preg_replace("/^SYSLIB:/", "/_syslib", $css);
		}
		$all_styles[] = $css;
	}
}
$temp_cssPathA = $__BUFFER->css_path;
$__BUFFER->css_path = array();
$__BUFFER->css = array();
$__BUFFER->__BUFFER['HEADER_STYLE'] = '';
if (is_array($temp_cssPathA)) $all_styles = array_merge($all_styles, $temp_cssPathA);
$__BUFFER->__BUFFER['HEADER_STYLE'] = '';
if ($CONST['compress_output'] == true) {
	foreach ($all_styles as $client_style) $Compressor->css[] = $client_style;
	$__BUFFER->addStyle($Compressor->LoadCss()); //формирование одной ссылки
} else {
	foreach ($all_styles as $client_style) $__BUFFER->addStyle($client_style);
}
//-------------------------------------------------------------------------

echo $__BUFFER->flushBuffer('HEADER');
echo $__BUFFER->flushBuffer('HEADER_STYLE');
echo $__BUFFER->flushBuffer('HEADER_SCRIPT');
echo $__BUFFER->flushBuffer('SCRIPT');
echo $__BUFFER->flushBuffer('BOTTOM_HEADER');

?>
<? if ($CONST['useNewTranslateScheme']) { ?>
	<script>
		var jsTr = {<?=$__BUFFER->flushTrJs()?>};
	</script>
<? } ?>
</head>
