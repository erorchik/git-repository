<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
	   
	session_start();

	if (!isset($_SESSION['login'])) {
		header ("location: index.php");
	}
?>
	<html>
		<head>
			<title>Confirm_delete</title>
		</head>
		<body>
			<p>
				<label>Do you want to delete this data?<br></label>
			</p>
		<?php 
			if (isset($_GET['del'])){
				$del = $_GET['del'];
				echo "<a href=delete_data.php?del=" . $del . ">YES</a>";
			}
		?>
           <p>
            <br> 
                <a href="main_page.php">NO</a> 
			</p>
		</body>
	</html>