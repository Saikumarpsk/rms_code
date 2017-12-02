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
  }
$result = array();
array_push($result,$rows);

print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($link);
?> 

