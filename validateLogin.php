<?php

	//session_start();

	
	include './db_check.php';
    
    	include './db_connect.php';


	//Retrieving Form Fields

	$loginId = $_REQUEST["email"];

	$password =$_REQUEST["password"];

	$sql =  "select * from users_table where user_email_id  = '$loginId' and user_password = '$password' "; 

        $result = mysql_query($sql, $link);

        while($val1 = mysql_fetch_array($result))
        {
		$userId = $val1['user_id']; 
		$user_role = $val1['user_role'];
        }
	
	if(!empty($userId)){
		$_SESSION["user_id"] = $userId; 
		$_SESSION["user_role"] = $user_role; 
		header('Location:home.php'); 
	}else{
		$message = 'Wrong%20Username/Password';
		header('Location:index.php?message='.$message);
	}
	
?>
