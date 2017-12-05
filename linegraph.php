<?php

header('Content-type: application/json'); 
    include './db_check.php';
    
    include './db_connect.php';


 $asset_id = $_GET["id"];
//$asset_id = 1;
 if($_GET["id"] != '')
    {
	// Data for tag_drive_freq
	    $query = mysql_query("SELECT hour(date) as hr,tag_drive_freq FROM assets_monitor_data where Assets_id = '$asset_id' ORDER BY `hr`" ,$link ); 
	    $rows = array();
	    $rows['name'] = 'frequency';
	    while($tmp = mysql_fetch_array($query)) {
		$rows['data'][] = $tmp['tag_drive_freq'];
		$rows['hour'][] = $tmp['hr'];
	    }
		$qry = mysql_query("SELECT asset_name from  asset_id_list where asset_id = '$asset_id'" ,$link ); 
             while($tmp1 = mysql_fetch_array($qry)) {
		$rows['asset_name'] = $tmp1['asset_name'];
		
	    }
  }
$result = array();
array_push($result,$rows);

print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($link);
?> 

