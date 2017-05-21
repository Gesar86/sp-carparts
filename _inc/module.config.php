<?

//	PROJECT SETTINGS

$CONST["project_name"] = "sp-carparts.com.ua";



//	DATABASE SETTINGS

$CONST["db_user"] = "tl_ar_autocom";

$CONST["db_password"] = "XrF6TbRJd9";

$CONST["db_name"] = "ar_autocom";

$CONST["db_host"] = "localhost";



//	AR2 SETTINGS

$CONST["autoprice_db"] = "autoprice_autocom";




//	SITE SETTINGS

$CONST["debug_mode"] = 0;



$CONST["default_css_table"][] = "/fonts.css";
$CONST["default_css_table"][] = "/font-awesome.min.css";
$CONST["default_css_table"][] = "/bootstrap.min.css";
$CONST["default_css_table"][] = "/ar2.css";
$CONST["default_css_table"][] = "/mavselect.css";
$CONST["default_css_table"][] = "/slide_menu.css";
$CONST["default_css_table"][] = "/style.css";
$CONST["default_css_table"][] = "/media.css";



//	CLIENT-SIDE LIBRARIES

if (strpos($_SERVER["REQUEST_URI"], "/admin/") === false) {




	$CONST["default_client_script"][] = "SYSLIB:/class.MavSelectBox.js";
	$CONST["default_client_script"][] = "/slide_menu.js";
	$CONST["default_client_script"][] = "/cf.js";
	$CONST["default_client_script"][] = "/jquery.magnific-popup.min.js";
	$CONST["default_client_script"][] = "/common.js";



	$CONST["replaceSelect"] = true;



}
