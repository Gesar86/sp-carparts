<?

require_once(__spellPATH("LIB:/projects/autoresource/search/module.search.php"));
require_once(__spellPATH("LIB:/projects/catalogs/lib.catalog.php"));
require_once(__spellPATH("LIB:/projects/catalogs/tecdoc/lib.tecdoc.php"));

$smarty_template = "SMARTY_LIB:/tecdoc/tecdoc.tpl";

$render = new Smarty_DataRender();

$page = new TecDocCatalog($_USER['adapter']);

$page->settings["DB_TECDOC"]["HOST"] = $CONST['db_host'];
$page->settings["DB_TECDOC"]["DB"] = $__AR2['tecdoc_db'];
$page->settings["DB_TECDOC"]["USER"] = $CONST["db_user"];
$page->settings["DB_TECDOC"]["PASSWORD"] = $CONST["db_password"];

$page->Process();

$buffer = $page->render($render, $smarty_template);

echo $buffer;