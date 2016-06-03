<?php
     $db_name = 'raf';
	 $db_user = 'root';
	 $db_pass = 'abcd1234';
	 $db_host = 'localhost';
	
	// Open a connect to the database.
	// Make sure this is called on every page that needs to use the database.
	

	
		$connect_db = new mysqli( $db_host, $db_user, $db_pass, $db_name );

		
		$result = mysqli_query($connect_db,"SELECT mn_uchh, mn_srv, wcode, preg, ps_l, count(mn_srv) as vc from tbldata group by mn_uchh, wcode having vc < 4 ");
		
		echo "<TABLE><tr>";
		echo "<th>mn_uchh</th>";
		echo "<th>mn_srv</th>";
		echo "<th>wcode</th>";
		echo "<th>preg#</th>";
		echo "<th>ps_l</th>";
		echo "<th>count</th>";
		echo "</tr>";
while ($row = $result->fetch_assoc()) {
	echo "<tr>";
			foreach ($row as $value){
				echo '<td>&nbsp;'.$value.'&nbsp;</td>';
				
			}
			echo "</tr>";
			}
			echo"</table>";
		
?>