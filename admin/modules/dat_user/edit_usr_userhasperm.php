<?
include('../../init.php');
include(LIB_PATH.'class.section.php');
include(LIB_PATH.'class.tab.php');


$action=table::decodeAction();

//$tab=new tab();

if($action['uid']==NO_UID) {
	if(user::curusr_getPermission("usr_user_perms")>=user::PERMISSION_FULL) {
		$content=table::getList('usr_resource','addToUser');
	}
} else {
	if(user::curusr_getPermission("usr_user_perms")>=user::PERMISSION_FULL) {
		$content=table::getForm('usr_userhasperm','default',false,$action['mode'],$action['uid'],new tabItem('Pseudo'),$action['foreign_uid']);
	}
}




//div::htm_mergeSiteContent($content,$tab->wrapContent());
div::htm_echoContent($content);


?>