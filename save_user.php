<?php
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
	  
	  session_start();
	   
	if (isset($_POST['submit'])) {
        $login = $_POST['login'];
		if ($login != "") {
			$_SESSION['log'] = $login;
		 }
	    $password = $_POST['password'];
		if ($password != "") {
			$_SESSION['pas'] = $password;
		 }
	    $password2 = $_POST['password2'];
		if ($password2 != "") {
			$_SESSION['pas2'] = $password2;
		}
			 
	    if (empty($_POST['login']) or empty($_POST['password']) or empty($_POST['password2'])) {
			if (empty($_POST['login'])) {
			$_SESSION['notice_login'] = 'Please, enter your login';
			}
			if (empty($_POST['password'])) {
			$_SESSION['notice_password'] = 'Please, enter your password';
			}
			if (empty($_POST['password2'])) {
			$_SESSION['notice_password2'] = 'Please, enter your password again';
			}
			header ("location: registration_page.php");
        }          
	    elseif ($_POST['password'] != $_POST['password2']) {
			$_SESSION['notice_correctpas'] = 'Passwords are not correct! Please, try again';
			header ("location: registration_page.php");
	    } else { 
			 include "chars_del_new.php";
			 
			 $password=md5($password);
			// connect to db 
			include "connect_to_DB.php";   
			$db = connect_db();
		
			// user verification of the existence of the same login
			$sql = 'SELECT * FROM Users WHERE login = "' . $_POST['login'] . '"';
			$query = mysqli_query($db, $sql);
			if (!$query) {
				$info_error = '<a href = "registration_page.php">Error</a>.';
			}

			if (mysqli_num_rows($query) != 0) {
				$_SESSION['notice_logreserved'] = 'Sorry, this login is reserved';
				//header ("location: registration_page.php?info_reserved=$info_reserved");
				header ("location: registration_page.php");
			} else {
				$query = "INSERT INTO `Users` (login, password)
				VALUES ('$login', '$password')";
				$result = mysqli_query($db, $query) or die(mysql_error());
                    
				$_SESSION['notice_regsuccess'] = 'You have successfully registered!';
				unset ($_SESSION['log'], $_SESSION['pas'], $_SESSION['pas2']);
				header ("location: index.php");
			}
	    }
	}
    $info_error = isset($info_error) ? $info_error : NULL;
    echo $info_error;
?>

