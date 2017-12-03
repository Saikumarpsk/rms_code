<?php

	include './db_connect.php';

	include './db_check.php';

	if ($_SERVER['PATH_INFO'] === "/maplist") {
		if(isset($_POST)  && $_POST['condition_type'] == 3)
		    {
			$cust_id=$_POST['cust_id'];
			$countries =$_POST['fields'];

			$array=explode(',',$countries);

			$unnecessary =array(1,'on','on');

			$result = array_diff($array,$unnecessary);

		       //$contries =implode(',', $result);

			$fields ="'" . implode ( "', '", $result ) . "'"; 

			$sql =  "select * from  asset_id_list where field_id in($fields) and customer_id = '$cust_id' ";
			$result = mysql_query($sql, $link);
			$lat = [];
			$long = [];
			while($val1 = mysql_fetch_array($result))
			{
				
				$lat = $val1["asset_loc_lat"];
				$long = $val1["asset_loc_long"];
			       
				echo "<input type='hidden' name=checkbox".$val1["asset_id"]." class='checkbox2'   value='".$val1["asset_id"] ." ' lat='".$val1["asset_loc_lat"]."' long='".$val1["asset_loc_long"]."' country_name='".$val1["country_id"]."' asset_name='".$val1["asset_name"]."'>
					<ul class='sidebar-menu' data-widget='tree'>  
				         <li> <a href='#'><i class='fa fa-circle-o text-green'></i><span>" .$val1["asset_name"] ."</span></a> </li>
				     </ul>";

			}

		    }

	}

?>
