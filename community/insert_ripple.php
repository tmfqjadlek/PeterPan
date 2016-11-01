<?
   session_start();
   	$id = $_SESSION['userid'];
	$name = $_SESSION['username'];
	$ripple_content = $_POST[ripple_content];
	$num = $_GET[num];
?>
<meta charset="euc-kr">
<?
   if(!$id) {
     echo("
	   <script>
	     window.alert('로그인 후 이용하세요.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
   }   
   include "../lib/dbconn.php";       // dconn.php 파일을 불러옴

   $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

   // 레코드 삽입 명령
   $sql = "insert into  peterpan_review_ripple (parent, id, name, content, regist_day) ";
   $sql .= "values($num, '$id', '$name', '$ripple_content', '$regist_day')";    
   
   mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
   mysql_close();                // DB 연결 끊기

   echo "
	   <script>
	    location.href = 'view.php?table=$table&num=$num';
	   </script>
	";
?>

   
