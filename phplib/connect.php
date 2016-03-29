<?php
		$host='localhost';
        $database='project';
        $user='root'; 
        $pswd=''; 

        $dbh = mysql_connect($host, $user, $pswd) or die("Не можу з'єднатися з MySQL.");
        mysql_select_db($database) or die("Не можу підключитись до бази даних.");
?>
