<meta charset="euc-kr">
<? session_start(); 
   $id=$_SESSION['userid'];
?>

<?
$bureum = $_GET[bureum];
		include "../lib/dbconn.php";

     $sql = "SELECT * FROM peterpan_order where id = '$id' " ;


		$result=mysql_query($sql, $connect);

		$roww = mysql_fetch_array($result);

		
echo $roww[bureum];