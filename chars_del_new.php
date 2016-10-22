<?php
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
		
		$login = str_replace(" ", "", $login);
		$password = str_replace(" ", "", $password);
		
		$char_array = array('stripslashes','htmlspecialchars','trim');
			
			foreach ($char_array as $value) {
				$login = $value($login);
				$password = $value($password);
			}
?>