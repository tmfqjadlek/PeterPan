<?
   session_start();
	$table = "peterpan_review";
	$num = $_GET[num];
   include "../lib/dbconn.php";

   $sql = "delete from $table where num = $num";
   mysql_query($sql, $connect);

   mysql_close();

   echo "
	   <script>
	    location.href = 'list.php?table=$table';
	   </script>
	";
?>

