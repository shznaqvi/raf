<?php
ini_set('max_execution_time', 0); 

     $db_name = 'raf';
	 $db_user = 'root';
	 $db_pass = 'abcd1234';
	 $db_host = 'localhost';
	
	// Open a connect to the database.
	// Make sure this is called on every page that needs to use the database.
	

	
		$connect_db = new mysqli( $db_host, $db_user, $db_pass, $db_name );

		
		$result = mysqli_query($connect_db,"SELECT mn_uchh, mn_srv, wcode, preg, ps_l, pindex, max(mn_srv) as vc from tbldata group by mn_uchh, wcode having vc < 4 ");
		
		echo "<TABLE><tr>";
		echo "<th>Data/Time</th>";
		echo "<th>mn_uchh</th>";
		echo "<th>mn_srv</th>";
		echo "<th>wcode</th>";
		echo "<th>preg#</th>";
		echo "<th>ps_l</th>";
		echo "<th>index</th>";
		echo "</tr>";
while ($row = $result->fetch_assoc()) {
	
	echo "<tr>";			
				$sql = "SELECT mn_uchh, mn_srv mvc, wcode, preg, ps_l, pindex from tbldata where mn_uchh =".$row['mn_uchh']." AND wcode=".$row['wcode'];
				$preg_woman = mysqli_query($connect_db,$sql);
				while($visit = $preg_woman->fetch_assoc()){
				$mn_uchh = $visit['mn_uchh'];
				$mvc =$visit['mvc'];
				$preg = $visit['preg'];
				$pindex = $visit['pindex'];
					$wcode = $visit['wcode'];
					$last_visit = $visit['mvc'];
					if ($pindex == 2){
						$lost = 0;
						
					}else {
						$lost = 1;
						
					}
				
				}
					echo '<td>&nbsp;'.date('m/d/Y h:i:s a', time()).'&nbsp;</td>';
					echo '<td>&nbsp;'.$mn_uchh.'&nbsp;</td>';
					echo '<td>&nbsp;'.$mvc.'&nbsp;</td>';
					echo '<td>&nbsp;'.$wcode.'&nbsp;</td>';
					echo '<td>&nbsp;'.$preg.'&nbsp;</td>';
					if ($lost == 1){
					
					$sql ="UPDATE tbldata set ps_l=1 where mn_uchh=".$row['mn_uchh']." AND mn_srv=".$row['mn_srv']." AND wcode=".$row['wcode']." AND preg=".$row['preg'];
	if (mysqli_query($connect_db, $sql)) {
    echo '<td>&nbsp; LOST / Updated&nbsp;</td>';
} else {
    echo '<td>&nbsp; LOST / Updated&nbsp;' . mysqli_error($connect_db).'&nbsp;</td>';
}
					} else {
						echo '<td>&nbsp; Normal &nbsp;</td>';
					}
					echo '<td>&nbsp;'.$pindex.'&nbsp;</td>';				
				
				
				
				/* foreach ($visit = $preg_woman->fetch_assoc()){
					$mn_uchh = $visit['mn_uchh'];
					$wcode = $visit['wcode'];
					$last_visit = $visit['mn_srv']
					if ($visit['pindex'] == 2){
						$lost = 0;
					}
					
				} */
				

				
				echo "</tr>";
				
			}
			
			
			echo"</table>";
		
?>