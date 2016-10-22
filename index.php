<?php
    session_start();

	if (isset($_SESSION['login'])) {
		header ("location: main_page.php");
	}
?>
	<html>
		<head>
			<meta charset="utf-8">
			<title>Login page</title>
		</head>
		<body>
			<h2>Login page</h2>
			<form action="autorized.php" method="post">
			<p>
				<label>LOGIN:<br></label>
				<?php
					if (isset($_SESSION['log_enter'])) {
						$log_enter = $_SESSION['log_enter'];
						echo "<input name='login' value='$log_enter' type='text' size='20' maxlength='20'>";
						unset ($_SESSION['log_enter']);
					} else {
					?>
				<input name="login" type="text" size="20" maxlength="20">
				<?php
						if (isset($_SESSION['notice_log'])) {
						echo ($_SESSION['notice_log']);
						unset($_SESSION['notice_log']); 
						}
					}
				?>
			</p>

			<p>
				<label>PASSWORD:<br></label>
				<input name="password" type="password" size="20" maxlength="20">
				<?php
					if (isset($_SESSION['notice_pass'])) {
						echo ($_SESSION['notice_pass']);
						unset($_SESSION['notice_pass']); 
					}
				?>
			</p>
				<?php
					if (isset($_SESSION['notice_correct'])) {
						echo ($_SESSION['notice_correct']);
						unset ($_SESSION['notice_correct']);
					}
					if (isset($_SESSION['notice_regsuccess'])) {
						echo ($_SESSION['notice_regsuccess']);
						unset ($_SESSION['notice_regsuccess']);
					}
				?>
			<p>
				<input type="submit" name="submit" value="Sign in">
				<br>
                <a href="registration_page.php">Registration</a> 
			</p>
		  
		</form>
		</body>
	</html>
