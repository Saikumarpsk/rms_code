<?php 

	
    if (!$link = mysql_connect('localhost', 'root', 'root123')) 
    {
        echo 'Could not connect to mysql';
        exit;
    }
	   
    if (!mysql_select_db('demo_saran', $link)) {
        echo 'Could not select database';
        exit;
    }

    if(isset($_POST)  && $_POST['condition_type'] == 1 )
    {
        $cust_id=$_POST['cust_id']; 
        $sql =  "select * from customer_branch where customer_id = '$cust_id' "; 
        $result = mysql_query($sql, $link);

        while($val1 = mysql_fetch_array($result))
        {
                echo "<div>
                         <input type='checkbox' name=checkbox class='checkbox2'  value='".$val1["cust_name_local"] ." '>
                         <label for='checkbox1'>" .$val1["cust_name_local"] ." </label>

                </div>";

        }

    }
		
		
    if(isset($_POST)  && $_POST['condition_type'] == 2)
    {
        $cust_id=$_POST['cust_id'];
        $countries =$_POST['countries'];

        $array=explode(',',$countries);

        $unnecessary =array(1,'on','on');

        $result = array_diff($array,$unnecessary);

            //$contries =implode(',', $result);

        $contries="'" . implode ( "', '", $result ) . "'";



        $sql =  "select * from  asset_id_list where country_id in($contries) and customer_id = '$cust_id' ";
        $result = mysql_query($sql, $link);

        while($val1 = mysql_fetch_array($result))
        {
                echo "<div>
                         <input type='checkbox' name=checkbox class='checkbox2'   value='".$val1["field_id"] ." '>
                         <label for='checkbox1'>" .$val1["field_id"] ." </label>

                </div>";

        }

    }
		
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
                
                echo "<ul>                         
                         <input type='hidden' name=checkbox".$val1["asset_id"]." class='checkbox2'   value='".$val1["asset_id"] ." ' lat='".$val1["asset_loc_lat"]."' long='".$val1["asset_loc_long"]."' country_name='".$val1["country_id"]."'>
                         <li href='#'>" .$val1["asset_name"] ." </li>
                     </ul>";

        }

    }

		
			