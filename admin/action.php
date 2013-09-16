<?
include('init.php');


$action=div::http_getGP('action');

if($action=='SQLMut') {
	if($query=div::http_getGP('query')) {
		$result=$db->sql_query($query);
	} else {
		$uids=explode(",",div::http_getGP('uids'));
		$primaryKey=$db->getPrimaryKey(div::http_getGP('table'));

		$i=0;
		foreach($uids as $uid) {
			$where.= $primaryKey[0]."=".$uid;
			if(count($uids)-1!=$i) {
				$where.=' OR ';
			}
			$i++;
		}
		switch (strtoupper(div::http_getGP('method'))) {
			case 'DELETE':
				$db->exec_DELETEquery(div::http_getGP('table'),$where);
			break;
			case 'INSERT':
				$db->exec_INSERTquery(div::http_getGP('table'),div::decodeURLArray('values'));
			break;
			case 'UPDATE':
				$db->exec_UPDATEquery(div::http_getGP('table'),div::http_getGP('where'),div::decodeURLArray('values'));
		}
	}
} elseif($action=="sync") {
	if($uid=div::http_getGP('uid')) {
		if($uid=="all") {
			user::sync_all();
		} else {
			user::sync_synchronize($uid);
		}
	}
} elseif($action=="delete") {
	if($_GET['action']) {
		$data=$_GET;
	} else {
		$data=$_POST;
	}

	$i=0;
	foreach($data['uids'] as $uid) {
		$foreign_uid=$data['foreign_uids'][$i];
		switch (div::http_getGP('table')) {
			case 'usr_user': user::delete_user($uid);
				break;
			case 'usr_group': user::delete_group($uid);
				break;
			case 'usr_team': user::delete_team($uid);
				break;
			case 'usr_location': user::delete_location($uid);
				break;
			case 'usr_department': user::delete_department($uid);
				break;
			case 'usr_userhasperm': user::delete_userHasPerm($uid,$foreign_uid);
				break;
			case 'usr_useringroup': user::delete_userInGroup($uid,$foreign_uid);
				break;
			case 'usr_grouphasperm': user::delete_groupHasPerm($uid,$foreign_uid);
				break;
			case 'usr_teamhasperm': user::delete_teamHasPerm($uid,$foreign_uid);
				break;
			case 'usr_rollhasperm': user::delete_rollHasPerm($uid,$foreign_uid);
				break;
			case 'usr_sync': user::delete_sync($uid);
				break;
			case 'contract': ticket::delete_contract($uid);
				break;
			case 'album': gallery::delete_album($uid);
				break;
			case 'image': gallery::delete_image($uid);
				break;
			case 'guestbook': guestbook::delete_guestbookItem($uid);
				break;
			case 'contact': contact::delete_contact($uid);
				break;
			case 'concert': concert::delete_concert($uid);
				break;
			case 'appartment': appartment_price::delete_appartment($uid);
				break;
			case 'appartment_price': appartment_price::delete_appartment_price($uid);
				break;
			case 'appartment_season': appartment_price::delete_appartment_season($uid);
				break;
			case 'appartment_pricehasseason': appartment_price::delete_appartment_pricehasseason($uid,$foreign_uid);
				break;
			case 'appartment_reservation': appartment_reservaion::delete_appartment_reservation($uid);
				break;
		}
		$i++;
	}
} elseif($action=="ticket_changeSupportLevel") {


} elseif($action=="exec_func") {
	eval(div::http_getGP('func').";");
}



?>