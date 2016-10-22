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
			<title>Manager main page</title>
		</head>
   
		<body>
			<h2>MANAGEMENT MAIN PAGE</h2>
	        <div align="right"><h3><a href="logout.php">Logout</a></h3></div>
			<form action="data_user_page.php">
				<?php
					if (isset($_SESSION['notice_delsucces'])) {
						echo ($_SESSION['notice_delsucces']);
						unset ($_SESSION['notice_delsucces']);
					}
					if (isset($_GET['info_update'])) {
						echo ($_GET['info_update']);
					}
					if (isset($_SESSION['notice_savesuccess'])) {
						echo ($_SESSION['notice_savesuccess']);
						unset ($_SESSION['notice_savesuccess']);
					}
				?>
				<p>
					<input type="submit" name="submit" value="ADD">
				</p>	
			</form>
				
			<?php
				include "connect_to_DB.php";
				
				$login = $_SESSION['login'];
				$mysqli = connect_db();
				
				$max_records = 3;
				$limit_page = 2;
				$show_page = 1;
				
				if ($res = $mysqli->query("SELECT * FROM Users_info WHERE login = '$login'")) {
					//$row1 = $res->fetch_array();
					if ($res->num_rows != 0) {
						$total_result = $res->num_rows;
						$total_page = ceil($total_result / $max_records);
			
						if (isset($_GET['page']) && is_numeric($_GET['page'])) {
							$show_page = $_GET['page'];
							
							if ($show_page < 1) {
								$show_page = 1;
							}
							if ($show_page > $total_page) {
								$show_page = $total_page;
							}
							if ($show_page > 0 && $show_page <= $total_page) {
								$start = ($show_page - 1) * $max_records;
								$end = $start + $max_records;	
							}
						} else {
							$start = 0;
							$end = $max_records;
							}
					
			
						//display records in table
						echo "<div style='margin: 0 auto; width: 800px'>";
						echo "<table border='0' cellpadding='14'>";
						echo "<tr>
							 <th>First</th>
							 <th>Last</th>
							 <th>Email</th>
							 <th>Best Phone</th>
							 </tr>";
						
						for ($i = $start; $i < $end; $i++) {
							if ($i == $total_result) {
								break;
							}
							
							$res->data_seek($i);
							$row = $res->fetch_row();
							
							echo "<tr>";
							// First = $row[2]
							echo "<td>" . $row[2] . "</td>";
							// Last = $row[3]
							echo "<td>" . $row[3] . "</td>";
							// Email = $row[4]
							echo "<td>" . $row[4] . "</td>";
							// Best Phone = row[8]
							echo "<td>" . $row[8] . "</td>";
							// id = $row[0]
							echo "<td><a href=view.php?view=" . $row[0] . ">edit/view</a></td>";
							echo "<td><a href=confirm_del.php?del=" . $row[0] . "> delete </a></td>";
							echo "</tr>";
			
						}
						
						echo "</table>";
						echo "</div>";
						
						// display pagination
						echo "<p><b>View page: </b>";
							if ($show_page != 1) {
								echo '<a href="main_page.php?page=1"> FIRST </a> &nbsp';
							}
						    // display back
							if ($show_page != 1) {
								$back = $show_page - 1;
								echo '<a href="main_page.php?page=' . $back . '"> BACK </a> &nbsp';
							}
							
							if ($total_page > $limit_page + 1) {
								if ($show_page <= $limit_page) {
									for ($i = 1; $i <= $show_page + $limit_page; $i++) {
										if (isset($_GET['page']) && $_GET['page'] == $i) {
										echo $i . " &nbsp";
										} else {
											echo "<a href='main_page.php?page=$i'>" . $i . "</a > &nbsp";
										} 
									}
								}									
								if ($show_page - $limit_page > 0 && $show_page <= $total_page) {
									for ($i = $show_page - $limit_page; $i <= $show_page + $limit_page; $i++) {
										if (isset($_GET['page']) && $_GET['page'] == $i) {
											echo $i . " &nbsp";
											} else {
												echo "<a href='main_page.php?page=$i'>" . $i . "</a > &nbsp";
											}
										if ($i == $total_page) {
												break;
										}
									}  
								}																
							} else {
								for ($i = 1; $i <= $total_page; $i++) {
									if (isset($_GET['page']) && $_GET['page'] == $i) {
										echo $i . " &nbsp";
									} else {
										echo "<a href='main_page.php?page=$i'>" . $i . "</a > &nbsp";
									} 
								}
							}
							// display next
							if ($show_page != $total_page) {
								$next = $show_page + 1;
								echo '<a href="main_page.php?page=' . $next .'"> NEXT </a> &nbsp';
							}
							// display last
							if ($show_page != $total_page && $total_page > $limit_page + 1) {
								echo '<a href="main_page.php?page=' . $total_page . '"> LAST </a>';
							}
						echo "</p>";
					} else {
						echo "Your contact list is empty";
						}
				}
				/*} else{
					echo "Error: " . $mysqli->error;
				}*/
			?>

		</body>
	
	</html>