<?
   session_start();
   $table = "peterpan_member";
   $num=$_GET[num];
   include "../lib/dbconn.php";
	
   $sql = "delete from $table where num =$num";
   mysql_query($sql, $connect);

   mysql_close();

   echo "
	   <script>
	    location.href = 'admin_member.php?table=$table';
	   </script>
	";
?>

