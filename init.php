<?php
session_start();

$rootDirName='ferienwallis';

function defSpecialDirs() {
	global $rootDirName;

	$scriptPath=$_SERVER['SCRIPT_NAME'];


	$scriptPath=substr($scriptPath,strpos($scriptPath,$rootDirName)+strlen($rootDirName));

	$lengthBevore=strlen($scriptPath);
	$scriptPath=str_replace("/","",$scriptPath);
	$lengthAfter=strlen($scriptPath);

	$backDirs=($lengthBevore-$lengthAfter)-1;

	if($backDirs>0) {
		$rootDir=str_repeat('../',$backDirs);
	}


	define('LIB_PATH',$rootDir."admin/library/");
	define('ROOT_DIR',$rootDir."admin/");
	define('MOD_DIR',$rootDir.'admin/modules/');
	define('TEMP_DIR',$rootDir.'admin/temp/');
	define('ICON_DIR',$rootDir.'admin/icons/');
}


$tad=defSpecialDirs();

require(ROOT_DIR."config.conf");

$TABLES=array();

include_once(LIB_PATH."class.div.php");
include_once(LIB_PATH."class.framework.php");
include_once(LIB_PATH."class.table.php");
include_once(LIB_PATH."class.module.php");
include_once(LIB_PATH."class.message.php");
require_once(LIB_PATH."class.db.php");
include_once(LIB_PATH."class.calendar.php");
include_once(LIB_PATH."class.ajax.php");
include_once(LIB_PATH."class.section.php");

$db=new MySQLDB();

//Datenbank-Verbindung aufgrund der Daten im $_CONFIG-Array aufbauen.
if($db->sql_pconnect($_CONFIG['MysqlDB']['server'], $_CONFIG['MysqlDB']['username'], $_CONFIG['MysqlDB']['password'])) {
	if(!$db->sql_select_db($_CONFIG['MysqlDB']['database'])){
		die(div::http_redirect(ROOT_DIR.'install.php'));
	}
} else {
	die(div::http_redirect(ROOT_DIR.'install.php'));
}

module::loadModules();


if(isset($_GET['lang'])) {
	$lang=$_GET['lang'];
} else {
	$language = explode(",", getenv("HTTP_ACCEPT_LANGUAGE")); 
    $language = substr(strtolower($language[0]),0,2);
    if($language=='fr' OR $language=='it') {$lang=$language;} else {$lang='de';}
}

/*if(!user::isLoggedIn()&&div::file_getRawFilename($_SERVER['SCRIPT_FILENAME'])!="login.php") {
	div::http_redirect(ROOT_DIR."login.php");
}*/

?>