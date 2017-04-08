<?
/**
 * класс настроек интерфейса
 *
 * Class LOCAL_InterfaceConfig
 */
class LOCAL_InterfaceConfig extends AutoResource_InterfaceConfig {

	function makeVinForm(&$vin, $client, $allNotRequired = false) {

		parent::makeVinForm($vin, $client, $allNotRequired);
		global $__AR2, $_USER;
		$vin->fields_assoc['power']['instance']->validators = array();
		$vin->fields_assoc['power']['required'] = false;
		$vin->fields_assoc['month']['instance']->validators = array();
		$vin->fields_assoc['month']['required'] = false;
		$vin->fields_assoc['model']['instance']->validators = array();
		$vin->fields_assoc['model']['required'] = false;
			
	}

function modifyClientPositionListColumns(&$columnsSet) {
		
$columnsSet["<a href=\"/shop/state_legend.html\" rel=\"state_info\">".$this->MSG['PositionListModule']['msg3']."</a>"][1] = new dtString("<a href=\"/shop/state_legend.html?pst_id=<%#pst_id%>\" rel=\"state_info\"><img src=\"<%#stt_icon%>\" hspace=3 align=absmiddle alt=\"<%#stt_name%>\" title=\"<%#stt_name%>\"><%#stt_name%></a>");
		
}
}