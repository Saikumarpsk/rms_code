<?php 

	include './db_connect.php';

	include './db_check.php';

	

	if ($_SERVER['PATH_INFO'] === "/countries") {
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
?>
		
			
