<?
session_start();
$id=$_SESSION['userid'];
$pid = $_GET[model];
$c_price = $_GET[price];


// 1. 공통 인클루드 파일
	include "./lib/dbconn.php";

// 2. 로그인 하지 않은 회원은 로그인 페이지로 보내기
if(!$id){

   echo ("<script>
	     window.alert('로그인을 해주세요.');
		 location.href = 'main.php';
	</script>");
}




// 4. 장바구니에 적어 넣기
$sql = "insert into  peterpan_cart (id, pro_id, cart_count, cart_price) values ('$id', '$pid', '1', '.$c_price.')";
mysql_query($sql, $connect);
?>

<?

	echo("<script>
	     window.alert('장바구니에 담았습니다.');
		 location.href = './prod/cart.php';
	</script>");
  ?>