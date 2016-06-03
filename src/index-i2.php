<?php
ini_set('max_execution_time', 0); 

     $db_name = 'raf';
	 $db_user = 'root';
	 $db_pass = 'abcd1234';
	 $db_host = 'localhost';
	
	// Open a connect to the database.
	// Make sure this is called on every page that needs to use the database.
	

	
		$connect_db = new mysqli( $db_host, $db_user, $db_pass, $db_name );

		
		$result = mysqli_query($connect_db,'SELECT mn_uchh, mn_srv, wcode, preg FROM tbldata where pindex = 1 order by mn_uchh, wcode, preg, mn_srv');
		
echo "<TABLE><tr>";
echo "<th>mc_uchh</th>";		
echo "<th>mnsrv</th>";		
echo "<th>wcode</th>";		
echo "<th>preg#</th>";		
$mn_uchh = 0;
$mn_srv = 0;
$wcode = 0;
$preg = 0;
while ($row = $result->fetch_assoc()) {


	// Pregnancy Identified - New Woman
	if ($mn_uchh <> $row['mn_uchh']){
		$mn_uchh = $row['mn_uchh'];
		$mn_srv = $row['mn_srv'];
		$wcode = $row['wcode'];
		$preg = $row['preg'];
		echo $mn_uchh."&nbsp;".$mn_srv."&nbsp;".$wcode."&nbsp;".$preg."&nbsp; New Woman, New Household";
		$sql ="UPDATE tbldata set ps_i=1 where mn_uchh=".$row['mn_uchh']." AND mn_srv=".$row['mn_srv']." AND wcode=".$row['wcode']." AND preg=".$row['preg'];
	if (mysqli_query($connect_db, $sql)) {
    echo " Record updated successfully</br>";
} else {
    echo "Error updating record: " . mysqli_error($connect_db);
}
	
	}else {
		
		// Same Woman
		if ($wcode == $row['wcode']){
		
			// Pregnancy Continued
			if ($preg == $row['preg']){
			$mn_uchh = $row['mn_uchh'];
			$mn_srv = $row['mn_srv'];
			$wcode = $row['wcode'];
			$preg = $row['preg'];
					echo $mn_uchh."&nbsp;".$mn_srv."&nbsp;".$wcode."&nbsp;".$preg."&nbsp; Continued Pregnancy";

		$sql ="UPDATE tbldata set ps_c=1 where mn_uchh=".$row['mn_uchh']." AND mn_srv=".$row['mn_srv']." AND wcode=".$row['wcode']." AND preg=".$row['preg'];
	if (mysqli_query($connect_db, $sql)) {
    echo "Record updated successfully</br>";
} else {
    echo "Error updating record: " . mysqli_error($connect_db);
}			} 

			// New Pregnancy
			else {
			$mn_uchh = $row['mn_uchh'];
			$mn_srv = $row['mn_srv'];
			$wcode = $row['wcode'];
			$preg = $row['preg'];		
			echo $mn_uchh."&nbsp;".$mn_srv."&nbsp;".$wcode."&nbsp;".$preg."&nbsp; Second Pregnancy";

		$sql ="UPDATE tbldata set ps_i=1 where mn_uchh=".$row['mn_uchh']." AND mn_srv=".$row['mn_srv']." AND wcode=".$row['wcode']." AND preg=".$row['preg'];
	if (mysqli_query($connect_db, $sql)) {
    echo "Record updated successfully</br>";
} else {
    echo "Error updating record: " . mysqli_error($connect_db);
}			}
		}
		
		// New Woman - Same Household
		if ($wcode <> $row['wcode']){
			$mn_uchh = $row['mn_uchh'];
			$mn_srv = $row['mn_srv'];
			$wcode = $row['wcode'];
			$preg = $row['preg'];
		echo $mn_uchh."&nbsp;".$mn_srv."&nbsp;".$wcode."&nbsp;".$preg."&nbsp; New Woman, Same Household";

		$sql ="UPDATE tbldata set ps_i=1 where mn_uchh=".$row['mn_uchh']." AND mn_srv=".$row['mn_srv']." AND wcode=".$row['wcode']." AND preg=".$row['preg'];
	if (mysqli_query($connect_db, $sql)) {
    echo "Record updated successfully</br>";
} else {
    echo "Error updating record: " . mysqli_error($connect_db);
}
		}
		
	}
	
}	
$sql = 'update tbldata set ps_c=null, ps_i=null where pindex = 2';
if (mysqli_query($connect_db, $sql)) {
    echo "Record updated successfully</br>";
} else {
    echo "Error updating record: " . mysqli_error($connect_db);
}
?>