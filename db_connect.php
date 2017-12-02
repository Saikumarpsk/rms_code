<?php

	
	    if (!$link = mysql_connect('localhost', 'root', 'K@#L&*!)%')) 
	    {
		echo 'Could not connect to mysql';
		exit;
	    }

	    if (!mysql_select_db('demo_suneel', $link)) {
		echo 'Could not select database';
		exit;
	    }
?>
