<?php
	
	if (isset($_POST['First'])) { 
	    $First = $_POST['First'];
		if ($First != "") {
			$_SESSION['First'] = $First;
		} else {
			$_SESSION['notice_first'] = 'Please, enter first name';  
		}    	  
	} 
	if (isset($_POST['Last'])) { 
	    $Last=$_POST['Last'];
		if ($Last != "") {
			$_SESSION['Last'] = $Last;
		} else {
			$_SESSION['notice_last'] = 'Please, enter last name'; 
		}		
	}
	if (isset($_POST['Email'])) { 
	    $Email=$_POST['Email']; 
		if ($Email != "") {
			$_SESSION['Email'] = $Email;
		} else {
			$_SESSION['notice_email'] = 'Please, enter email';
		} 
	}   
	if (isset($_POST['Home'])) { 
	    $Home=$_POST['Home'];
		if ($Home != "") {
			$_SESSION['Home'] = $Home;
		} else { 
		   $Home=""; 
		}
	}
	if (isset($_POST['Work'])) { 
	    $Work=$_POST['Work'];
		if ($Work != "") {
			$_SESSION['Work'] = $Work;
		} else { 
		   $Work=""; 
		}
	}
	if (isset($_POST['Cell'])) { 
		$Cell=$_POST['Cell'];
		if ($Cell != "") {
			$_SESSION['Cell'] = $Cell;
		} else { 
		   $Cell=""; 
		}
	}
	if (isset($_POST['radioselector'])) {
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
	if (empty($get)) {
		$_SESSION['notice_phone'] = 'Please, enter and choose the phone';
	} else {
		$info_error = 'Error! <a href="main_page.php"> Manager main page </a>.';
    }		
	if (isset($_POST['Address1'])) { 
		$Address1=$_POST['Address1'];
		if ($Address1 != "") {
			$_SESSION['Address1'] = $Address1;
		} else { 
		   $Address1=""; 
		} 
	}
	if (isset($_POST['Address2'])) { 
	    $Address2=$_POST['Address2'];
		if ($Address2 != "") {
			$_SESSION['Address2'] = $Address2;
		} else { 
		   $Address2=""; 
		} 
	}
	if (isset($_POST['City'])) { 
	    $City=$_POST['City'];
		if ($City != "") {
			$_SESSION['City'] = $City;
		} else { 
		   $City=""; 
		} 
	}
	if (isset($_POST['State'])) { 
	    $State=$_POST['State']; 
		if($State != "") { 
			$_SESSION['State'] = $State;
		} else {
		   $State=""; 
		} 
	}
	if (isset($_POST['Zip'])) { 
	    $Zip=$_POST['Zip']; 
		if($Zip != "") {
			$_SESSION['Zip'] = $Zip;
		} else {
		   $Zip="";  
		}
	}
	if (isset($_POST['Country'])) { 
	   $Country=$_POST['Country']; 
		if($Country != "") {
			$_SESSION['Country'] = $Country;
		} else {
		   $Country=""; 
		} 
	}
	if (isset($_POST['Birthday'])) { 
	    $Birthday=$_POST['Birthday'];
		if ($Birthday != "") {
			$_SESSION['Birthday'] = $Birthday;
		} else {
			$_SESSION['notice_birthday'] = 'Please, enter birthday'; 
		}			
	}
?>