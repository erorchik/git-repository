<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
	
	session_start();
	
	if (!isset($_SESSION['login'])) {
		header ("location: index.php");
	}
	
	include "connect_to_DB.php";
	$mysqli = connect_db();
	
    if(isset($_GET['del'])) {
    $del = $_GET['del'];
	$sql = "DELETE FROM Users_info WHERE id = '$del'";
	$res = $mysqli->query($sql);
		if($res = TRUE){
		   $_SESSION['notice_delsucces'] = 'Succes! record deleted';
		   header ("location: main_page.php");
		}
    } else {
		echo "Error : ('. $mysqli->errno .') ". $mysqli->error; 
	}	
?>	