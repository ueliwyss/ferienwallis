<?php
$doNotLogin=true;
include ('init.php');
copy ( 'http://ferienwallis.com/admin/temp/db-backup-ferienwalliscom.sql' , $_SERVER['DOCUMENT_ROOT'].'/admin/temp/db-backup-ferienwalliscom.sql');
echo $db->view_array(run_sql_file("admin/temp/db-backup-ferienwalliscom.sql"));

function run_sql_file($location){
	//load file
	$content = file_get_contents($location);

	//delete comments
	$lines = explode("\n",$content);
	$commands = '';
	foreach($lines as $line){
		$line = trim($line);
		if( $line && substr($line,0,2)!='--'){
			$commands .= $line;
		}
	}

	str_replace('\n', '', $commands);
	//convert to array
	$commands = explode(";", $commands);

	//run commands
	$total = $success = 0;
	foreach($commands as $command){
		if(trim($command)){
			$success += (@mysql_query($command)==false ? 0 : 1);
			$total += 1;
		}
	}

	//return number of successful queries and total number of queries found
	return array(
			"success" => $success,
			"total" => $total
	);
}