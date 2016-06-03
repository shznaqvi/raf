<?php
     $db_name = 'raf';
	 $db_user = 'root';
	 $db_pass = 'abcd1234';
	 $db_host = 'localhost';
	
	// Open a connect to the database.
	// Make sure this is called on every page that needs to use the database.
	

	
		$connect_db = new mysqli( $db_host, $db_user, $db_pass, $db_name );

		
		$result = mysqli_query($connect_db,"SELECT * FROM tbldata");
		
		echo "<TABLE><tr>";
		echo "<th>mn_uchh</th>";
		echo "<th>mn_srv</th>";
		echo "<th>Cluster_Type</th>";
		echo "<th>wcode</th>";
		echo "<th>preg#</th>";
		echo "<th>mn_intdt0</th>";
		echo "<th>index</th>";
		echo "<th>sb_qc</th>";
		echo "<th>sb_qa</th>";
		echo "<th>sa_q2b</th>";
		echo "<th>sa_q2m</th>";
		echo "<th>sa_q2w</th>";
		echo "<th>sb_qd</th>";
		echo "<th>sb_qe1</th>";
		echo "<th>sb_qe2</th>";
		echo "<th>MatchSequence</th>";
		echo "<th>ps_i</th>";
		echo "<th>ps_c</th>";
		echo "<th>ps_l</th>";
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