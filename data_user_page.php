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
    <meta charset="utf-8">
    <title>CotactDetails</title>
  </head>
  
  <body>
      <h2>ContactDetails</h2>
        <form action="save_user_data.php" method="post">
          <p>
            <label>First:<br></label>
			<?php
				if (isset($_SESSION['First'])) {
					$First = $_SESSION['First'];
					echo "<input name='First' value='$First' type='text' size='20' maxlength='20'>";
					unset ($_SESSION['First']);
				} else {
			?>
            <input name="First" type="text" size="20" maxlength="20">
			<label>* &nbsp; </label>
				<?php
					if (isset($_SESSION['notice_first'])) {
						echo ($_SESSION['notice_first']);
						unset ($_SESSION['notice_first']);
					}
				}
			?>
          </p>
		  
          <p>
            <label>Last:<br></label>
			<?php
				if (isset($_SESSION['Last'])) {
					$Last = $_SESSION['Last'];
					echo "<input name='Last' value='$Last' type='text' size='20' maxlength='20'>";
					unset ($_SESSION['Last']);
				} else {
			?>
            <input name="Last" type="text" size="20" maxlength="20">
			<label>* &nbsp; </label>
				<?php
					if (isset($_SESSION['notice_last'])) {
						echo ($_SESSION['notice_last']);
						unset ($_SESSION['notice_last']);
					}
				}
			?>
          </p>
		  
          <p>
            <label>Email:<br></label>
			<?php
				if (isset($_SESSION['Email'])) {
					$Email = $_SESSION['Email'];
					echo "<input name='Email' value='$Email' type='text' size='20' maxlength='20'>";
					unset ($_SESSION['Email']);
				} else {
			?>
            <input name="Email" type="email" size="20" maxlength="20">
			<label>* &nbsp; </label>
				<?php
					if (isset($_SESSION['notice_email'])) {
						echo ($_SESSION['notice_email']);
						unset ($_SESSION['notice_email']);
					}
				}
			?>
          </p>
		  
		  <p>
			<label>Phone number: * &nbsp; </label>
			<?php
				if (isset($_SESSION['notice_phone'])) {
					echo ($_SESSION['notice_phone']);
					unset ($_SESSION['notice_phone']);
				}
			?>
		  </p>
		  
          <p>
		    <label for="R1">Home:</label>
			<?php
				if (isset($_SESSION['Home'])) {
					$Home = $_SESSION['Home'];
					echo "<input type='Radio' name='radioselector' checked id='R1' value='value1'>";
					echo "<input name='Home' value='$Home' type='text' size='20' maxlength='20'>";
					unset ($_SESSION['Home']);
				} else {
			?>
            <input type="Radio" name="radioselector" checked id="R1" value="value1">
			<input name="Home" type="text" size="20" maxlength="20">
				<?php
					}
				?>
          </p>
		  
          <p>
		    <label for="R2">Work:</label>
			<?php
				if (isset($_SESSION['Work'])) {
					$Work = $_SESSION['Work'];
					echo "<input type='Radio' name='radioselector' checked id='R2' value='value2'>";
					echo "<input name='Work' value='$Work' type='text' size='20' maxlength='20'>";
					unset ($_SESSION['Work']);
				} else {
			?>
            <input type="Radio" name="radioselector" id="R2" value="value2">
	        <input name="Work" type="text" size="20" maxlength="20">
				<?php
					}
				?>
          </p>
		  
          <p>
		    <label for="R3">Cell:</label>
			<?php
				if (isset($_SESSION['Cell'])) {
					$Cell = $_SESSION['Cell'];
					echo "<input type='Radio' name='radioselector' checked id='R3' value='value3'>";
					echo "<input name='Cell' value='$Cell' type='text' size='20' maxlength='20'>";
					unset ($_SESSION['Cell']);
				} else {
			?>
            <input type="Radio" name="radioselector" id="R3" value="value3">
	        <input name="Cell" type="text" size="20" maxlength="20">
				<?php
					}
				?>
          </p>
		  
	      <p>
            <label>Address1:<br></label>
			<?php
				if (isset($_SESSION['Address1'])) {
					$Address1 = $_SESSION['Address1'];
					echo "<input name='Address1' value='$Address1' type='text' size='20' maxlength='20'>";
					unset ($_SESSION['Address1']);
				} else {
			?>
            <input name="Address1" type="text" size="20" maxlength="20">
				<?php
					}
				?>
          </p>
		  
          <p>
            <label>Address2:<br></label>
			<?php
				if (isset($_SESSION['Address2'])) {
					$Address2 = $_SESSION['Address2'];
					echo "<input name='Address2' value='$Address2' type='text' size='20' maxlength='20'>";
					unset ($_SESSION['Address2']);
				} else {
			?>
            <input name="Address2" type="text" size="20" maxlength="20">
				<?php
					}
				?>
          </p>
		  
          <p>
            <label>City:<br></label>
			<?php
				if (isset($_SESSION['City'])) {
					$City = $_SESSION['City'];
					echo "<input name='City' value='$City' type='text' size='20' maxlength='20'>";
					unset ($_SESSION['City']);
				} else {
			?>
            <input name="City" type="text" size="20" maxlength="20">
				<?php
					}
				?>
          </p>
		  
          <p>
            <label>State:<br></label>
			<?php
				if (isset($_SESSION['State'])) {
					$State = $_SESSION['State'];
					echo "<input name='State' value='$State' type='text' size='20' maxlength='20'>";
					unset ($_SESSION['State']);
				} else {
			?>
            <input name="State" type="text" size="20" maxlength="20">
				<?php
					}
				?>
          </p>
		  
          <p>
            <label>Zip:<br></label>
			<?php
				if (isset($_SESSION['Zip'])) {
					$Zip = $_SESSION['Zip'];
					echo "<input name='Zip' value='$Zip' type='text' size='20' maxlength='20'>";
					unset ($_SESSION['Zip']);
				} else {
			?>
            <input name="Zip" type="text" size="20" maxlength="20">
				<?php
					}
				?>
          </p>
		  
          <p>
			<label>Country:<br></label>
			<?php
				if (isset($_SESSION['Country'])) {
					$Country = $_SESSION['Country'];
					echo "<input name='Country' value='$Country' type='text' size='20' maxlength='20'>";
					unset ($_SESSION['Country']);
				} else {
			?>
            <input name="Country" type="text" size="20" maxlength="20">
				<?php
					}
				?>
          </p>
		  
          <p>
            <label>Birthday:<br></label>
			<?php
				if (isset($_SESSION['Birthday'])) {
					$Birthday = $_SESSION['Birthday'];
					echo "<input name='Birthday' value='$Birthday' type='text' size='20' maxlength='20'>";
					unset ($_SESSION['Birthday']);
				} else {
			?>
             <input name="Birthday" type="date" size="20" maxlength="20">
			 <label>* &nbsp; </label>
			<?php
					if (isset($_SESSION['notice_birthday'])) {
						echo ($_SESSION['notice_birthday']);
						unset ($_SESSION['notice_birthday']);
					}
				}
			?>
          </p>
	
          <p>
            <input type="submit" name="submit" value="DONE">
            <!--**** (type="submit") sends data to the page save_user_data.php ***** --> 
          </p>
		  
		  <p>
			<a href="main_page.php">Cancel</a>
		  </p>
		  
		</form>
  </body>
</html>