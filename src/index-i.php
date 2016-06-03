<?php
     $db_name = 'raf';
	 $db_user = 'root';
	 $db_pass = 'abcd1234';
	 $db_host = 'localhost';
	
	// Open a connect to the database.
	// Make sure this is called on every page that needs to use the database.
	

	
		$connect_db = new mysqli( $db_host, $db_user, $db_pass, $db_name );

		
		$result = mysqli_query($connect_db,"SELECT Distinct mn_uchh, wcode FROM tbldata where wcode = 1");
		
		echo "<TABLE>";
		
while ($row = $result->fetch_assoc()) {
	echo "<tr>";
			foreach ($row as $value){
				echo '<td>&nbsp;'.$value.'&nbsp;</td>';
				
			}
			echo "</tr>";
			}
			echo"</table>";
		
?>