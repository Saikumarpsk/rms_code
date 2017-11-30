<?php

	session_start();

	
	//Include Files

	include("class/db_functions.php");

	include("class/dbConnection.php");


	//Retrieving Form Fields

	$loginId = $_REQUEST["email"];

	$password =$_REQUEST["password"];

	

	//Creating 'dbConnection' Object

	$dbObj = new dbConnection();

	$con = $dbObj->getConnection();

	//echo $con . "<br/>";

	

	if($con)

	{

		//echo "MySQL Server Connected<br/>";

		$dbResult = $dbObj->selectDatabase();

		if($dbResult)

		{

			//echo "Database Selected<br/>";

			//Creating 'admin' Object	

			$adminObj = new DB_Functions();

			$message = $adminObj->validateLogin($loginId,$password,$con);

			if($message == "Correct")

			{

				$userId = $adminObj->getAdminId($loginId,$con);

				//Creating Session Variable

				 $_SESSION["user_id"] = $userId; 

				header('Location:home.php');

			}

			else

			{

				header('Location:index.php?message='.$message);

			}

		}

		else

		{

			echo mysql_errno() . " : " . mysql_error();

		}

	}

	else

	{

		echo mysql_errno() . " : " . mysql_error();

	}

?>