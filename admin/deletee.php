<?
   session_start();
   $table = "peterpan_order";
   $num=$_GET[num];
   include "../lib/dbconn.php";
	
   $sql = "delete from $table where num =$num";
   mysql_query($sql, $connect);

   mysql_close();

   echo "
	   <script>
	    location.href = 'adminorder.php?table=$table';
	   </script>
	";
?>

