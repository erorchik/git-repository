<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
       
	session_start();
	
	if (isset($_POST['login'])) {
		$login = $_POST['login'];
		if ($login != "") {
			$_SESSION['log_enter'] = $login;
		}
	}
	if (empty($_POST['login']) or empty($_POST['password'])) {
		if (empty($_POST['login'])) {
			$_SESSION['notice_log'] = 'Please, enter your login';
		}	
		if (empty($_POST['password'])) {
			$_SESSION['notice_pass'] = 'Please, enter your password';
		}
		header ("location: index.php");
	} else {		
		// connect to db 
		include "connect_to_DB.php";   
		$mysqli = connect_db();
        
		// checking login and password
		$login = $_POST['login'];
		$password = $_POST['password'];
			
		// chars delete
		include "chars_del_new.php";
			
		$password = md5($password);
		
		if ($res = $mysqli->query("SELECT id FROM Users Where login = '$login' AND password = '$password'")) {
			if ($res->fetch_array()) {
				$_SESSION['login'] = $login;
				//$_SESSION['password'] = $password;
					
				header ("location: main_page.php");
			} else {
				$_SESSION['notice_correct'] = 'Please, enter correct login or password';
				header ("location: index.php");
			}
		}
	}	
?>	