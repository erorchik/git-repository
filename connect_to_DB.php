<?php
	function connect_db() {
		$db = mysqli_connect('localhost', 'root', 'root' , 'Users');
		if (mysqli_connect_error($db)) {
			exit('No connection');
		}
	
	mysqli_query($db, "SET NAMES utf8");
	return $db;
	}
	 ?>