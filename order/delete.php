<?
   session_start();
   $table = "peterpan_order";
   $num=$_GET[num];
   include "../lib/dbconn.php";
	
   $sql = "update $table set progress ='주문취소' where num='$num'";
	
   mysql_query($sql, $connect);

   mysql_close();

   echo "
	   <script>
	   window.alert(' 주문이 취소되었습니다.')
	   location.href = 'finishorder.php';
	   </script>
	";
?>

