<?php


	class dbConnection

	{

		

		//Declaring Variables

		private $server = "localhost";

		private $userName = "root";

		private $password = "root123";

		private $database = "demo_saran"; 

		

		

		
		public function getConnection()

		{

		

			$con = mysql_connect($this->server,$this->userName,$this->password);

			return $con;

			

		}

		

		public function selectDatabase()

		{

		

			$con = $this->getConnection();

			$dbResult = mysql_select_db($this->database,$con);

			return $dbResult;

			

		}			

				

	}

?>
