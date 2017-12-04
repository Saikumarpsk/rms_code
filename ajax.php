<?php 

    include './db_connect.php';

	include './db_check.php';

    if(isset($_POST)  && $_POST['condition_type'] == 1 )
    {
	$user_type =$_SESSION['user_role']; 
	 if($user_type == 0)
	    {
		$user_id  = $_SESSION["user_id"]; 
		
		$cust_id = $_POST['cust_id']; 
		
		$sql =  "select * from customer_branch where customer_id = '$cust_id' and user_id = '$user_id' "; 
		
		$result = mysql_query($sql, $link);

		while($val1 = mysql_fetch_array($result))
		{
				echo "<div>
						 <input type='checkbox' name=checkbox class='checkbox2'  value='".$val1["cust_name_local"] ." '>
						 <label for='checkbox1'>" .$val1["cust_name_local"] ." </label>

				</div>";

		}
	}else{
		$cust_id=$_POST['cust_id']; 
		$sql =  "select * from customer_branch where customer_id = '$cust_id' group by cust_name_local"; 
		$result = mysql_query($sql, $link);

		while($val1 = mysql_fetch_array($result))
		{
		        echo "<div>
		                 <input type='checkbox' name=checkbox class='checkbox2'  value='".$val1["cust_name_local"] ." '>
		                 <label for='checkbox1'>" .$val1["cust_name_local"] ." </label>

		        </div>";

		}
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

        $contries="'" . implode ( "','", $result ) . "'";



        $sql =  "select * from  asset_id_list where country_id in($contries) and customer_id = '$cust_id' ";  
        $result = mysql_query($sql, $link);
        //print_r($result);die;
        while($val1 = mysql_fetch_array($result))
        {
                echo "<div>
                         <input type='checkbox' name=checkbox class='checkbox2'   value='".$val1["field_id"] ." '>
                         <label for='checkbox1'>" .$val1["field_id"] ." </label>

                </div>";

        }

    }
	
	
	
     if(isset($_POST)  && $_POST['condition_type'] == 3)
    {//print_r($_POST);die();
       
	//echo 'test';  die;
	$cust_id=$_POST['cust_id'];
	$countries =$_POST['fields'];
	$_SESSION['question'] = $countries; 
	//$_SESSION['final_custid'] = $_POST['cust_id'];
        
//print_r(implode("," ,$countries));die();
$result_string = "'" . str_replace(",", "','", $countries) . "'";

//print_r($_SESSION['question']);die();
 $sql =  "select * from  asset_id_list where field_id in($result_string) and customer_id = '$cust_id' ";

$results = mysql_query($sql,$link);
//print_r($result_string);
//print_r($sql);
//print_r($cust_id);
//die();

//print_r($result_string);die();
//$array=explode(',',$countries);
//$unnecessary =array(1,'on','on');

//$result = array_diff($array,$unnecessary);

//$contries =implode(',', $result);

//$fields ="'" . implode ( "', '", $result ) . "'"; 

//        $sql =  "select * from  asset_id_list where field_id in($result_string) and customer_id = '$cust_id' ";
//print_r($sql1);die();
//$result = mysql_query($sql, $link);
//      $lat = [];
//        $long = []; 
         while($val1 = mysql_fetch_array($results))
        {
                
//            $lat = $val1["asset_loc_lat"];
//           $long = $val1["asset_loc_long"];
               
                echo "<input type='hidden' name=checkbox".$val1["asset_id"]." class='checkbox2'   value='".$val1["asset_id"] ." ' lat='".$val1["asset_loc_lat"]."' long='".$val1["asset_loc_long"]."' country_name='".$val1["country_id"]."' asset_name='".$val1["asset_name"]."' marker_icon=0>
			<ul class='sidebar-menu' data-widget='tree'>  
                         <li> <a href='javascript:void(0);' onclick=comcheck('".$val1["asset_id"] ."')><i class='fa fa-circle-o text-green'></i><span>" .$val1["asset_name"] ."</span></a> </li>
                     </ul>";

        }

    }


	
