<?php
     $db_name = 'raf';
	 $db_user = 'root';
	 $db_pass = 'abcd1234';
	 $db_host = 'localhost';
	
	// Open a connect to the database.
	// Make sure this is called on every page that needs to use the database.
	

	
		$connect_db = new mysqli( $db_host, $db_user, $db_pass, $db_name );

		
		$result = mysqli_query($connect_db,"SELECT mn_uchh, mn_srv, wcode, preg, ps_l, pindex, count(mn_srv) as vc from tbldata group by mn_uchh, wcode having vc < 4 ");
		
		echo "<TABLE><tr>";
		echo "<th>mn_uchh</th>";
		echo "<th>mn_srv</th>";
		echo "<th>wcode</th>";
		echo "<th>preg#</th>";
		echo "<th>ps_l</th>";
		echo "<th>index</th>";
		echo "</tr>";
while ($row = $result->fetch_assoc()) {
	
			foreach ($row as $value){
	echo "<tr>";			
				$sql = "SELECT mn_uchh, MAX(mn_srv) mvc, wcode, preg, ps_l, pindex from tbldata where mn_uchh =".$value['mn_uchh']." AND wcode=".$value['wcode'];
				$preg_woman = mysqli_query($connect_db,$sql);
				$visit = $preg_woman->fetch_assoc();
				foreach ($visit as $vrow){
					echo '<td>&nbsp;'.$vrow['mn_uchh'].'&nbsp;</td>';
					echo '<td>&nbsp;'.$vrow['mvc'].'&nbsp;</td>';
					echo '<td>&nbsp;'.$vrow['wcode'].'&nbsp;</td>';
					echo '<td>&nbsp;'.$vrow['preg'].'&nbsp;</td>';
					if ($vrow['pindex'] == 1){
					echo '<td>&nbsp; LOST &nbsp;</td>';
					} else {
						echo '<td>&nbsp; Normal &nbsp;</td>';
					}
					echo '<td>&nbsp;'.$vrow['pindex'].'&nbsp;</td>';				
			
				}
				
				/* foreach ($vrow = $preg_woman->fetch_assoc()){
					$mn_uchh = $vrow['mn_uchh'];
					$wcode = $vrow['wcode'];
					$last_visit = $vrow['mn_srv']
					if ($vrow['pindex'] == 2){
						$lost = 0;
					}
					
				} */
				
				
				
				echo "</tr>";
			}
			
			}
			echo"</table>";
		
?>