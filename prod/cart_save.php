<?
session_start();
$id=$_SESSION['userid'];
$mode=$_POST[mode];
$pid=$_POST[i_idx];
$c_count=$_POST[cart_count];
$c_price=$_POST[cart_price];
$prod_num=$_POST[prod_num];

$num=$_POST[num];

// 1. 공통 인클루드 파일
	include "../lib/dbconn.php";

// 2. 로그인 하지 않은 회원은 로그인 페이지로 보내기
if(!$id){

   echo("<script>
	     window.alert('로그인 해주세요.');
		  location.href = './prod_list.php';
		 </script>");
}

// 3. 넘어온 변수 검사
if($mode != "cart" && $mode != "direct"){
    alert("정상적인 접근이 아닙니다.");
}

if(!$_POST[i_idx]){
    alert("상품페이지에서 상품을 선택 후 구매해주세요.");
}

if(!is_numeric($_POST[cart_count])){
    alert("상품수량을 숫자로 입력해 주세요.");
}

// 4. 장바구니에 적어 넣기

?>

<?
// 5. 장바구니인지 바로구매인지에 따라서 이동
if($mode == "cart"){
	$sql = "insert into  peterpan_cart (id, pro_id, cart_count, cart_price,cart_num) values ('$id', '$pid', '.$c_count.', '.$c_price.','.$num.')";
mysql_query($sql, $connect);
	echo("<script>
	     window.alert('장바구니에 담았습니다.');
		  history.go(-1);
	</script>");
   // alert("장바구니에 담았습니다.","./cart.php");
}else if($mode == "direct"){
	$_SESSION['num']=$num;
	$_SESSION['c_count']=$c_count;
		$_SESSION['c_price']=$c_price;
	echo("<script>
	     window.alert('구매페이지로 이동합니다.');
		location.href = '../order/order.php?orderclick=1';
	</script>");
	 //alert("구매페이지로 이동합니다.","./order.php");
}else{
    alert("정상적인 접근이 아닙니다.");
}

?>