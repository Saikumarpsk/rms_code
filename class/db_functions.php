<?php 
	
	class DB_Functions
	{
	
		
		public function checkLoginId($loginId,$con)
		{
			$sql1="select count(*) from users_table where user_email_id = '".$loginId."'";
			$recordSet1 = mysql_query($sql1,$con);
			$count1 = 0;
			while($row1 = mysql_fetch_array($recordSet1))
			{
				$count1 = $row1[0];
			}
			if($count1 == 1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		
		public function getAdminId($loginId,$con)
		{
			$sql2 = "select user_id from users_table where user_email_id = '".$loginId."'";
			$recordSet2 = mysql_query($sql2,$con);
			$adminId2 = 0;
			
			while($row2 = mysql_fetch_array($recordSet2))
			{
				$adminId2 = $row2["user_id"];
			}
			
			return $adminId2;
		}
		
		
		public function getCustomerDetailsByUserId($user_id,$con){
			$sql1 = "select * from user_mapping where user_id = ".$user_id ;
	 //echo $sql1;die();
			$recordSet1 = mysql_query($sql1,$con);
			while($row42 = mysql_fetch_array($recordSet1))
			{
				$customer_id = $row42["customer_id"];
			}
			return $customer_id;
		}	
		
		public function validateLogin($loginId,$password,$con)
		{
			$loginIdExistence = $this->checkLoginId($loginId,$con);
			if($loginIdExistence)
			{
				$sql4 = "select user_password from users_table where user_email_id = '".$loginId."'";
				$recordSet4 = mysql_query($sql4,$con);
				$dbPassword4;
				while($row4 = mysql_fetch_array($recordSet4))
				{
					$dbPassword4 = $row4["user_password"];
				}
				if($dbPassword4 == $password)
				{
					return "Correct";
				}
				else
				{
					return "Incorect%20Password";
				}
			}
			else
			{
				return "EmailId%20DoesNot%20Exits";
			}
		}
		
			
	}
?>