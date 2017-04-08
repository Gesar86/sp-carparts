<?
$query = "select t_cat_name from catalogs_brands where t_id =" . (int)$_GET["url_t_id"] . " limit 1";
$res = $_USER["adapter"]->query($query);
$row = $_USER["adapter"]->fetch_row_assoc($res);

echo '<h1>Редактирование информации во всплывающем окне для ' . $row['t_cat_name'] . '</h1>';

$render = new HTML_DataRender();

$tc = new TagCollection();
$tableTag = & $tc->addTag("TABLE");
$tableTag->addAttribute("cellpadding", "3");
$tableTag->addAttribute("cellspacing", "1");
$tableTag->addAttribute("class", "admin_edit_table");

$editProcess = new EditTableProcess("catalogs_brands_url", $_USER['adapter'], $render);

$editForm = & $editProcess->createEditForm("500px", $tc);

$editForm->bindField(new TextBox("url_href", "@REQUEST", "125px"), "Ссылка");
$editForm->bindField(new TextAreaEditor("url_content", "@REQUEST", "125px"), "Содежание");
$editForm->bindField(new CheckBox("url_show", array("Y", "N"), "отображать?", "@POST||true"), "");
$editForm->bindField(new Hidden("url_t_id", (int)$_GET["url_t_id"]));

$columnsSet = array(
	"ссылка"      => "url_href",
	"содержание"  => "url_content",
	"отображать?" => "url_show"
);

$editTable = & $editProcess->createEditTable2_0($columnsSet, null, $tc);

$editTable->addSelectField("IF(url_show = 'Y','Да','Нет') as url_show");
$editTable->addCondition("url_t_id = '" . (int)$_GET["url_t_id"] . "'");

echo $editProcess->render();

echo '<a href="/admin/edit_brands/">Вернуться к списку брендов</a>';