<title>주문/배송</title>
<? 
session_start(); 
$id=$_SESSION['userid'];

$num=$_GET[num];
$cart = $_GET[cart];




			

			?>





<!doctype html>
<head>



<meta charset="euc-kr">
<link rel="stylesheet" type="text/css" href="../css/checkout.css" />
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<style>
#inline-block{ display:inline-block;}
</style>

<script type="text/javascript">
<!--

function check_input()

{
document.point.submit();
}

function order_input()
{
	if(!document.order.order_name.value)
	{
	alert("입금자명을 입력하세요");
		document.order.order_name.focus();
		return;
	}
document.order.submit();
}
//-->

</script>
<!-- 첫번째 상단 메뉴 -->
<? include "../menu/top_menu2.php"; ?>
<!-- 두번쨰 상단 메뉴 -->
<? include "../menu/main_meun2.php"; ?>
<?

include "../lib/dbconn.php";


$sql = "select * from  peterpan_member where id='$id'";
$result = mysql_query($sql, $connect);


$row = mysql_fetch_array($result);

$point = $_GET[point];
if($point > $row[point])
{
echo ("<script>
window.alert('포인트가 부족합니다');
   history.go(-1)

</script>");
}

?>

<section id="cart_items">
<div class="container">

<div id="wrap" style="margin-top:60px;">
<div id="accordian">
<div class="step" id="step1">
<div class="number">
<span>1</span>
</div>
<div class="title">
<h2>주문자 정보</h2>
</div>
</div>
<div class="content" id="email">
<form  name="order" action="order_by.php?point=<?=$point?>" method='POST'>
<div><h3>이름</h3>
<input type="text" name="pro_name" value="<?=$row[name]?>">
</div>

<div><h3>이메일</h3>
<input type="text" name="pro_email" value="<?=$row[email]?>">
</div>	

<div><h3>연락처</h3>
<input type="text" name="pro_hp" value="<?=$row[hp]?>">
</div>

</div>
<div class="step" id="step2">
<div class="number">
<span>2</span>
</div>
<div class="title">
<h2>배송지정보</h2>
</div>
</div>
<div class="content" id="address">


<div><h3>이름</h3>
<input type="text" name="pro_order_name" value="<?=$row[name]?>">
</div>

<div><h3>연락처</h3>
<input type="text" name="pro_order_hp" value="<?=$row[hp]?>">
</div>

<?
$address = explode("/", $row[address]);
$address1 = $address[0];
$address2 = $address[1];
?>
<div><h3>주소</h3>
<input type="text" name="pro_address1" value="<?=$address1?>">
</div>

<div><h3>상세주소</h3>
<input type="text" name="pro_address2" value="<?=$address2?>">
</div>	

<div><h3>주문메세지</h3>
<textarea name="content" id="content"></textarea>
</div>

</div>

<div class="step" id="step4">
<div class="number">
<span>3</span>
</div>
<div class="title">
<h2>무통장 입금</h2>
</div>
</div>
<div class="content" id="payment">
<div class="left credit_card">

<div><h3>입금자 성명</h3>
<input type="text" name="order_name" value="">
</div>
<div class="sec_num">
<div><h3>입금 정보</h3>
<input type="text" name="order_in" value="농협 : 301-0000-0000-31 김민지" disabled />
</div>
</div>

</div>
<div class="step" id="step3" style="width:105%;margin-left:-2.5%">
<div class="number">
<span>4</span>
</div>
<div class="title">
<h2>포인트 사용</h2>
</div>


</div>
<?

$cartnum = $_SESSION['num'];
$c_count = $_SESSION['c_count'];
$c_price = $_SESSION['c_price'];


$order = $_GET[order];

if($cartnum && $c_count && $c_price)
{?>
	<input type="hidden" name="order_by" value="바로구매">
<?}
else if($order)
{?>
<input type="hidden" name="order_by" value="장바구니구매" >
<?}
	?>
</form>


<div class="content" id="shipping">

	<form name="point" action="order.php" method='get'>

<div>


<input type="text" name="point" value="<?=$point?>">
<?
echo "현재포인트 :$row[point] "
?>

</div>
<a class="continue" href="#" onclick="check_input()" >포인트 사용</a>
</form>	
</div>
<div class="step" id="step5" style="width:105%;margin-left:-2.5%">
<div class="number">
<span>5</span>
</div>
<div class="title">
<h2>주문상품</h2>
</div>
</div>
<?

echo("<script>
	       if (self.name != 'reload') {
         self.name = 'reload';
         self.location.reload(true);
     }
     else self.name = ''; 
	</script>");

if($cartnum && $c_count && $c_price)
{
	

$sql = "select * from   peterpan_product where num='$cartnum'";
$result = mysql_query($sql, $connect);

while($row = mysql_fetch_array($result))
{

 $encoding = "euc-kr";
	  $charNumber = "20";
	  $subject = $row[name];
	  $cutExec = mb_strimwidth($subject, 0, $charNumber, "...", $encoding);
?>
<div class="content" id="final_products">
<div class="left" id="ordered">
<div class="products" style="width:500px;">
<div class="product_image" style="margin-left:-10px;">
<img src="../admin_prod/data/<?=$row[file_copied_0]?>" width="100"/>      <!--상품이미지-->
</div>

<div class="product_details">
<span class="product_name" style="width:250px;"><?=$cutExec?></span>
<span class="quantity" style="padding-right:30px; padding-left:20px;width:100px;"><?=$c_count?>개</span>
<span class="price" style="width:200px;"><?=number_format($c_price)?>원</span>
</div>	
</div></div></div>
<?
}



}
if($order)
{
unset($_SESSION['num']);
unset($_SESSION['c_count']);
unset($_SESSION['c_price']);

}


if(!$cartnum && !$c_count && !$c_price)
{




$sql = "select * from  peterpan_cart where id='$id'";
$result = mysql_query($sql, $connect);

while($row = mysql_fetch_array($result))
{
$sql = "select * from peterpan_product where model='$row[pro_id]'";
$resultt = mysql_query($sql, $connect);

$roww = mysql_fetch_array($resultt); 


	 $encoding = "euc-kr";
	  $charNumber = "20";
	  $subject = $roww[name];
	  $cutExec = mb_strimwidth($subject, 0, $charNumber, "...", $encoding);
?>
<div class="content" id="final_products">
<div class="left" id="ordered">
<div class="products" style="width:500px;">
<div class="product_image" style="margin-left:-10px;">
<img src="../admin_prod/data/<?=$roww[file_copied_0]?>" width="100"/>      <!--상품이미지-->
</div>

<div class="product_details">
<span class="product_name" style="width:250px;"><?=$cutExec?></span>
<span class="quantity" style="padding-right:30px; padding-left:20px; width:100px;"><?=$row[cart_count]?>개</span>
<span class="price" style="width:200px;"><?=number_format($roww[price]*$row[cart_count])?>원</span>
</div>	
</div></div></div>
<?

}
}



$sql = "select sum(cart_price) as total from  peterpan_cart where id = '$id'";
$resulttt = mysql_query($sql, $connect);
$rowww = mysql_fetch_array($resulttt);
$totalcount = $rowww['total'] +1; 


$total_record = mysql_num_rows($result);?>

<div class="totals">
<?if($cartnum && $c_count && $c_price)
{?>
<span class="subtitle">주문액 <span id="sub_price"><?=number_format($c_price )?>원</span></span>
	
	<span class="subtitle">배송비 <span id="sub_ship"><?if  ($c_price  >= "70000")
	{?>
무료입니다


<? $total_record_o = 0 ;}

else

{?>
<?=number_format($total_record *2500)?>원
<?}?></span></span>


<?
}
else{?>
<span class="subtitle">주문액 <span id="sub_price"><?=number_format($rowww['total'] )?>원</span></span>
		<span class="subtitle">배송비 <span id="sub_ship"><?if  ($rowww['total'] >= "70000")
{?>
무료입니다


<? $total_record_o = 0 ;}

else

{?>
<?=number_format($total_record *2500)?>원
<?}?></span></span>


<? 
}
$rowpoint =$row[point];

if($point)
{


?>
<span class="subtitle">포인트 <span id="sub_ship"><?=$point?>사용</span></span>
<?
}
?>
</div>

<div class="final">

<?if($cartnum && $c_count && $c_price)
{
	if($c_price  >="70000")
	{
	$by =0;
	}
$by = 2500;
	?>

<span class="title">총 주문액 <span id="calculated_total"><?=number_format($c_price +$by - $point)?>원</span></span>
<?
}

else
{ 
	if($rowww['total']>="70000")
	{
	$total_record =0;
	}
	$total_record_o = $total_record *2500?>
<span class="title">총 주문액 <span id="calculated_total"><?=number_format($rowww['total'] +$total_record_o - $point)?>원</span></span>
<?
}
?>

</div>
</div>

<div class="right" id="reviewed" style="border-bottom-width:50px; margin-bottom:30px;">
<div class="billing">

</div>

<br>



<script type="text/javascript">
<!--
	function ss()

{
  window.alert('주문이 취소 되었습니다.');
		 location.href = '../main.php';
}
//-->
</script>
 <span id="inline-block"><a class="big_button" id="" href="#"  onclick="ss()" style="width: 150px;height: 58px;">주문 취소</a></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <span id="inline-block"><a class="big_button" id="" href="#"  style=" width: 150px;height: 58px;" onclick="order_input()">전체 주문</a></span>
</div>


</div>

</div>