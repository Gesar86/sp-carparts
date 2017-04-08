<h1>Редактирование брендов</h1>
<?

$render = new HTML_DataRender();

$tc = new TagCollection();

$tableTag = & $tc->addTag("TABLE");
$tableTag->addAttribute("cellpadding", "3");
$tableTag->addAttribute("cellspacing", "1");
$tableTag->addAttribute("class", "admin_edit_table");

$editProcess = new EditTableProcess("catalogs_brands", $_USER['adapter'], $render);

$editForm = & $editProcess->createEditForm("500px", $tc);

$editForm->bindField(new TextBox("t_cat_name", "@REQUEST", "125px"), "Имя каталога");

$editForm->bindField(new CheckBox("t_show_in_main", array("Y", "N"), "отображать на главной?", "@POST||true"), "");

$editForm->bindField(new CheckBox("t_show", array("Y", "N"), "отображать в каталоге?", "@POST||true"), "");

$exp = array("/^.*(\..*)$/", '1' . mktime() . "\\1");
$editForm->bindField(new FileBox("t_img", "700", $CONST['site_root'] . "/images/brands/", false, false, $exp, false, "", true, true, "/images/brands"), "изображение");

$tableTag->addAttribute("class", "admin_edit_table");

$photo = '<img src="/_phplib/images/lite.preview.php?path=<%#t_img%>&w=30&h=30"/>';

$columnsSet = array(
	"изображение"            => "img",
	"перейти"                => array("pict", new cLink("/admin/edit_url/?url_t_id=<%#t_id%>", "Редактировать информацию <br/>во всплывающем окне для <%#t_cat_name%>")),
	"бренд"                  => "t_cat_name",
	"отображать на главной?" => "t_show_in_main",
	"отображать в каталоге?" => "t_show"
);

$editTable = & $editProcess->createEditTable2_0($columnsSet, null, $tc);

$editTable->addSelectField("IF(NULLIF(t_img,'') IS NULL, '', CONCAT('<img src=\"/_phplib/images/lite.preview.php?path=',t_img,'&w=30&h=30\"/>')) as img");
$editTable->addSelectField("IF(t_show_in_main = 'Y','Да','Нет') as t_show_in_main");
$editTable->addSelectField("IF(t_show = 'Y','Да','Нет') as t_show");

$editTable->addOrderField("t_cat_name");

echo $editProcess->render();