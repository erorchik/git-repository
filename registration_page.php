<?php
	error_reporting(E_ALL);
    ini_set('display_errors', 1);
	session_start();
?>
<html>
    <head>
	    <meta charset="utf-8">
        <title>Registration</title>
    </head>
    <body>
        <h2>Registration</h2>
			<form action="save_user.php" method="post">
				<p>
					<label>LOGIN:<br></label>
					<?php
						if (isset($_SESSION['log'])) {
							$log = $_SESSION['log'];
							echo "<input name='login' value='$log' type='text' size='20' maxlength='20'>";
							unset ($_SESSION['log']);
						} else {
					?>
					<input name="login" type="text" size="20" maxlength="20">
					<?php
							if (isset($_SESSION['notice_login'])) {
								echo ($_SESSION['notice_login']);
								unset ($_SESSION['notice_login']);
							}
						}
					?>	
				</p>
				<p>
					<label>Please, Enter password:<br></label>
					<?php
						if (isset($_SESSION['pas'])) {
							$pas = $_SESSION['pas'];
							echo "<input name='password' value='$pas' type='password' size='20' maxlength='20'>";
							unset ($_SESSION['pas']);
						} else {
					?>
					<input name="password" type="password" size="20" maxlength="20">
					<?php
						if (isset($_SESSION['notice_password'])) {
							echo ($_SESSION['notice_password']);
							unset ($_SESSION['notice_password']);
						}
					}
					?>
				</p>
				<p>
					<label>Please, Enter password again:<br></label>
					<?php
						if (isset($_SESSION['pas2'])) {
							$pas2 = $_SESSION['pas2'];
							echo "<input name='password2' value='$pas2' type='password' size='20' maxlength='20'>";
							unset ($_SESSION['pas2']);
						} else {
					?>
					<input name="password2" type="password" size="20" maxlength="20">
					<?php
						if (isset($_SESSION['notice_password2'])) {
							echo ($_SESSION['notice_password2']);
							unset ($_SESSION['notice_password2']);
						}
					}
					?>
				</p>
					<?php
						if (isset($_SESSION['notice_correctpas'])) {
							echo ($_SESSION['notice_correctpas']);
							unset ($_SESSION['notice_correctpas']);
						}
						if (isset($_SESSION['notice_logreserved'])) {
							echo ($_SESSION['notice_logreserved']);
							unset ($_SESSION['notice_logreserved']);
						}
					?>
				<p>
					<input type="submit" name="submit" value="Save"> 
				</p>
				<p>
					<a href="main_page.php">Cancel</a>
				</p>
			</form>
    </body>
</html>