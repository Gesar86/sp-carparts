<?
function getFilesArray($path, $random = false, $limit = 0) {

	$file_list = glob($path);
	$count_files = count($file_list);
	if ($count_files == 0) return false;
	if ($random) shuffle($file_list);
	if ($limit > 0) {
		for ($i = $limit; $i <= ($count_files - 1); $i++) {
			unset($file_list[$i]);
		}
	}

	return (count($file_list) > 0 ? $file_list : false);
}

function getCars($type, $limit = 2, $min_rand = 100, $max_rand = 250) {

	$fcars = getFilesArray($_SERVER['DOCUMENT_ROOT'] . "/images/cars/" . $type . "/cars/*.png", true, $limit);
	$facs = getFilesArray($_SERVER['DOCUMENT_ROOT'] . "/images/cars/" . $type . "/acs/*.png", true, $limit);
	$procPerCar = floor(100 / (($limit * 2) - 1)) - 2;
	if ($fcars or $facs) {
		$s = 0;
		for ($i = 0; $i <= ($limit - 1); $i++) {
			if ($i == ($limit - 1)) {
				$last_car = true;
			} else {
				$last_car = false;
			}
			if (!empty($fcars[$i])) {
				echo '<div class="rcar" style="right:' . $s . '%"><img src="' . str_replace($_SERVER['DOCUMENT_ROOT'], '', $fcars[$i]) . '" alt="" /></div>';
			}
			$s += $procPerCar; //rand(10,$procPerCar);
			if (!empty($facs[$i])) {
				echo '<div class="rcar" style="' . ($last_car ? 'left:0px;' : 'right:' . $s . '%') . '"><img src="' . str_replace($_SERVER['DOCUMENT_ROOT'], '', $facs[$i]) . '" alt="" /></div>';
			}
			$s += $procPerCar; //rand(10,$procPerCar);
		}
	}
}