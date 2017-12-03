<?php

	include './db_connect.php';

	include './db_check.php';

	if ($_SERVER['PATH_INFO'] === "/maps") {
		if(isset($_POST)  && $_POST['condition_type'] == 3)
		    {print_r($_POST);
			$cust_id1 =$_POST['cust_id1'];
			$countries1 =$_POST['fields1'];

			$array1=explode(',',$countries1);

			$unnecessary1 =array(1,'on','on');

			$result1 = array_diff($array1,$unnecessary1);

		       //$contries =implode(',', $result);

			$fields1 ="'" . implode ( "', '", $result1 ) . "'"; 

			$sql1 =  "select * from  asset_id_list where field_id in($fields1) and customer_id = '$cust_id1' ";
			$result1 = mysql_query($sql1, $link);
			$lat = [];
			$long = [];
			while($val1 = mysql_fetch_array($result1))
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
