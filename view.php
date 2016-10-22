<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
	
	include "connect_to_DB.php";
	$mysqli = connect_db();
	
	// Part 2: Updata Data from table Users_info
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		if (isset($_POST['First'])) {
			$First = $_POST['First'];
		}			
		if (isset($_POST['Last'])) {
			$Last = $_POST['Last'];
		}
		if (isset($_POST['Email'])) {
			$Email = $_POST['Email'];
		}
		if (isset($_POST['Home'])) { 
			$Home=$_POST['Home']; 
			if (empty($_POST['Home'])) { 
				$Home = ""; 
			}
		}
		if (isset($_POST['Work'])) { 
			$Work=$_POST['Work'];	   
			if (empty($_POST['Work'])) { 
				$Work = ""; 
			}
		}
		if (isset($_POST['Cell'])) { 
			$Cell=$_POST['Cell'];
			if (empty($_POST['Cell'])) { 
				$Cell = ""; 
			}
		}
		if(isset($_POST['radioselector'])) {
			if ($_POST['radioselector'] == "value1") {
				$_POST['radioselector'] = $Home;
				$get = $_POST['radioselector'];   
			}
			if ($_POST['radioselector'] == "value2") {
				$_POST['radioselector'] = $Work;
				$get = $_POST['radioselector'];
			}
			if ($_POST['radioselector'] == "value3") {
				$_POST['radioselector'] = $Cell;
				$get = $_POST['radioselector'];
			}		
		}
		if (isset($_POST['Address1'])) { 
			$Address1=$_POST['Address1']; 
			if (empty($_POST['Address1'])) { 
				$Address1 = ""; 
			} 
		}
		if (isset($_POST['Address2'])) { 
			$Address2 = $_POST['Address2']; 
			if (empty($_POST['Address2'])) { 
				$Address2 = ""; 
			} 
		}
		if (isset($_POST['City'])) { 
			$City = $_POST['City']; 
			if (empty($_POST['City'])) { 
				$City = ""; 
			} 
		}
		if (isset($_POST['State'])) { 
			$State = $_POST['State']; 
			if (empty($_POST['State'])) { 
				$State = ""; 
			} 
		}
		if (isset($_POST['Zip'])) { 
			$Zip = $_POST['Zip']; 
			if (empty($_POST['Zip'])) { 
				$Zip = ""; 
			} 
		}
		if (isset($_POST['Country'])) { 
			$Country=$_POST['Country']; 
			if (empty($_POST['Country'])) { 
				$Country = ""; 
			} 
		}
		if (isset($_POST['Birthday'])) { 
			$Birthday = $_POST['Birthday']; 			
		}
		if (empty($_POST['First']) or empty($_POST['Last']) or empty($_POST['Email']) or empty($get) or empty($_POST['Birthday'])){
			if (empty($_POST['First'])) {
				$notice_first = 'Please, enter first name';
			}
			if (empty($_POST['Last'])) {
				$notice_last = 'Please, enter last name';
			}
			if (empty($_POST['Email'])) {
				$notice_email = 'Please, enter email';
			}
			if (empty($get)) {
				$notice_phone = 'Please, enter and choose phone ';
			}
			if (empty($_POST['Birthday'])) {
				$notice_birthday = 'Please, enter birthday';
			}
		} else { 
				$query ="UPDATE Users_info SET First='$First', Last='$Last', Email='$Email', Home='$Home', Work='$Work', Cell='$Cell', Best_phone='$get', Address1='$Address1', Address2='$Address2', City='$City', State='$State', Zip='$Zip', Country='$Country', Birthday='$Birthday' WHERE id='$id'";
				$result = mysqli_query($mysqli, $query) or die("Error " . mysqli_error($mysqli)); 
 
				if ($result)
					$info_update = 'Data update!';
					header("location: main_page.php?info_update=$info_update");
		}
	} 
		
	// Part 1: Select Data from table Users_info
	if (isset($_GET['view'])) {
		
		$view=$_GET['view'];
		$sql=("SELECT id,First,Last,Email,Home,Work,Cell,Address1,Address2,City,State,Zip,Country,Birthday FROM Users_info WHERE id = '$view'");
		
		if ($res=$mysqli->query($sql)) {
			$row=$res->fetch_row();	
			
			$id = $row[0];
			$First = $row[1];
			$Last = $row[2];
			$Email = $row[3];
			$Home = $row[4]; 
			$Work = $row[5]; 
			$Cell = $row[6]; 
			$Address1 = $row[7]; 
			$Address2 = $row[8]; 
			$City = $row[9]; 
			$State = $row[10]; 
			$Zip = $row[11]; 
			$Country = $row[12]; 
			$Birthday = $row[13];
			
			echo "<form method='post'>
				<p>
					<input type='hidden' name='id' value='$id'>
				</p>
			
				<p>
					<label>First:<br></label>
					<input name='First' value='$First' type='text' size='20' maxlength='20'>
					<label>*</label>";
					if (isset($notice_first)) {
						echo $notice_first;
						//unset ($_SESSION['First']);
					}
			echo "</p>
				<p>
					<label>Last:<br></label>
					<input name='Last' value='$Last' type='text' size='20' maxlength='20'>
					<label>*</label>";
					if (isset($notice_last)) {
						echo $notice_last;
						//unset ($_SESSION['First']);
					}
			echo "</p>
		  
				<p>
					<label>Email:<br></label>
					<input name='Email' value='$Email' type='email' size='20' maxlength='20'>
					<label>*</label>";
					if (isset($notice_email)) {
						echo $notice_email;
						//unset ($_SESSION['First']);
					}
			echo "</p>
		  
				<p>
					<label>Phone number *</label> &nbsp;";
					if (isset($notice_phone)) {
						echo $notice_phone;
						//unset ($_SESSION['First']);
					}
			echo "</p>
		  
				<p>
					<label for='R1'>Home:</label>
					<input type='Radio' name='radioselector' checked id='R1' value='value1'>
					<input name='Home' value='$Home' type='text' size='20' maxlength='20'>
				</p>
		  
				<p>
					<label for='R2'>Work:</label>
					<input type='Radio' name='radioselector' id='R2' value='value2'>
					<input name='Work' value='$Work' type='text' size='20' maxlength='20'>
				</p>
		  
				<p>
					<label for='R3'>Cell:</label>
					<input type='Radio' name='radioselector' id='R3' value='value3'>
					<input name='Cell' value='$Cell' type='text' size='20' maxlength='20'>
				</p>
		  
				<p>
					<label>Address1:<br></label>
					<input name='Address1' value='$Address1' type='text' size='20' maxlength='20'>
				</p>
		  
				<p>
					<label>Address2:<br></label>
					<input name='Address2' value='$Address2' type='text' size='20' maxlength='20'>
				</p>
		  
				<p>
					<label>City:<br></label>
					<input name='City' value='$City' type='text' size='20' maxlength='20'>
				</p>
		  
				<p>
					<label>State:<br></label>
					<input name='State' value='$State' type='text' size='20' maxlength='20'>
				</p>
		  
				<p>
					<label>Zip:<br></label>
					<input name='Zip' value='$Zip' type='text' size='20' maxlength='20'>
				</p>
		  
				<p>
					<label>Country:<br></label>
					<input name='Country' value='$Country' type='text' size='20' maxlength='20'>
				</p>
		  
				<p>
					<label>Birthday:<br></label>
					<input name='Birthday' value='$Birthday' type='date' size='20' maxlength='20'>
					<label>*</label>";
					if (isset($notice_birthday)) {
						echo $notice_birthday;
						//unset ($_SESSION['First']);
					}
			echo "</p>
	
				<p>
					<input type='submit' name='submit' value='DONE'> 
				</p>
		  
				<p>
					<a href='main_page.php'>Cancel</a>
				</p>
		  
				</form>";
		
			mysqli_free_result($res);			
					
		}
	} else {
		echo "<a href='main_page.php'>Error</a>" . $mysqli->error;
	}
	
	$mysqli->close();
	
	//var_dump ($row);	
?>