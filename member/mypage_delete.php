<?
session_start();
	$table = "peterpan_member";
   include "../lib/dbconn.php";
   $id = $_SESSION['userid'];

   $sql = "delete from $table where id = '$id'";
   mysql_query($sql, $connect);

   mysql_close();

   echo("
       <script>
          alert('[탈퇴성공] 정상적으로 회원에서 탈퇴하셨습니다.');
        location.href = '../main.php'; 
		</script>
       ");
   unset($_SESSION['userid']);

?>




