<?
function getFolder($folder)
	{
	$folder = is_string($folder) ? $folder : "";
	if(strlen($folder) <= 0) return "";

	$folder             = str_replace(SERVER_ROOT, "",                   $folder);
	$folder             = str_replace(["\\", "\/"], DIRECTORY_SEPARATOR, $folder);
	$folderExplodeArray = explode(DIRECTORY_SEPARATOR, $folder);
	unset($folderExplodeArray[0]);

	return DIRECTORY_SEPARATOR.implode(DIRECTORY_SEPARATOR, $folderExplodeArray).DIRECTORY_SEPARATOR;
	}
function pre($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    return;
}
function _pre($array){
    echo '<pre>';
    var_dump($array);
    echo '</pre>';
    return;
}