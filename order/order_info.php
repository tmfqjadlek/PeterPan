<?

$num = $_GET[num];
 $table = "peterpan_order";
 	include "../lib/dbconn.php";

   $sql = "SELECT * FROM $table where num = '$num' " ;

		
	 $result = mysql_query($sql, $connect);

	$roww = mysql_fetch_array($result);

echo $roww[bureum];


?>