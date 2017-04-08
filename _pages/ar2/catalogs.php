<?
$techdoc_url = '/catalogs/';

$smarty = new MySmarty();

$smarty_template_cat_dop = "USER_SMARTY:/catalogs/catalog_cat_dop.tpl";

if (!$_REQUEST['n']) {

	if (preg_replace('/\?.*/', '', $_SERVER['REQUEST_URI']) == '/' or preg_replace('/\?.*/', '', $_SERVER['REQUEST_URI']) == '/search_all/') {
		$smarty_template = "USER_SMARTY:/catalogs/catalog_list_main.tpl";
		$where = "WHERE catalogs_brands.t_show_in_main = 'Y' and catalogs_brands.t_show = 'Y'";
	} else {
		$where = "WHERE catalogs_brands.t_show = 'Y'";
		$smarty_template = "USER_SMARTY:/catalogs/tecdoc.tpl";
	}

	$query = "
			SELECT 
			catalogs_brands.*,catalogs_brands_url.*
			FROM
			catalogs_brands
			Inner Join catalogs_brands_url ON catalogs_brands_url.url_t_id = catalogs_brands.t_id
		
			" . $where . "
			
			ORDER by catalogs_brands.t_cat_name
			 
			";

	$res = $_USER["adapter"]->query($query);

	$res_array = Array();

	while ($row = $_USER["adapter"]->fetch_row_assoc($res)) {
		$row['url_content'] = str_replace('{%ccatalog_url%}', $techdoc_url, $row['url_content']);
		$row['url_href'] = str_replace('{%ccatalog_url%}', $techdoc_url, $row['url_href']);

		$res_array[$row['t_cat_name']][] = $row;

	}

	$smarty->assign("script_url", $techdoc_url);
	$smarty->assign("sizeof_BRANDS", count($res_array));
	$smarty->assign("BRANDS", $res_array);

	echo $smarty->fetch($smarty_template);

} else {

	$query = "
			SELECT 
			catalogs_brands.*,catalogs_brands_url.*
			FROM
			catalogs_brands_url
			LEFT Join catalogs_brands ON catalogs_brands.t_id = catalogs_brands_url.url_t_id
			WHERE `url_t_id` = '" . (int)($_REQUEST['n']) . "' and `url_show` = 'Y'
		";

	$res = $_USER["adapter"]->query($query);

	$res_array = Array();

	while ($row = $_USER["adapter"]->fetch_row_assoc($res)) {
		$row['url_content'] = str_replace('{%ccatalog_url%}', $techdoc_url, $row['url_content']);
		$row['url_href'] = str_replace('{%ccatalog_url%}', $techdoc_url, $row['url_href']);
		$res_array[] = $row;
	}

	$smarty->assign("DATA", $res_array);

	ob_clean();
	echo $smarty->fetch($smarty_template_cat_dop);
	exit();

}