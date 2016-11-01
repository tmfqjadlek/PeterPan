<title>주문 결제</title>
<?
session_start();
$id=$_SESSION['userid'];

$num=$_GET[num];

include "../lib/dbconn.php";
?>
<head>
<meta charset="euc-kr">
<link  href="../css/checkout.css" rel="stylesheet" type="text/css" media="all">
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
</head>
<!-- 첫번째 상단 메뉴 -->
<? include "../menu/top_menu2.php"; ?>
<!-- 두번쨰 상단 메뉴 -->
<? include "../menu/main_meun2.php"; ?>
<?

include "../lib/dbconn.php";


$pro_name = $_POST[pro_name];
$pro_email = $_POST[pro_email];
$pro_hp = $_POST[pro_hp];
$pro_order_name = $_POST[pro_order_name];
$pro_order_hp = $_POST[pro_order_hp];
$pro_address1 = $_POST[pro_address1];
$pro_address2 = $_POST[pro_address2];
$content = $_POST[content];
$point = $_GET[point];
$order_name = $_POST[order_name];
$order_in = $_POST[order_in];
$order_by = $_POST[order_by];




	
?>




<style>
#inline-block{ display:inline-block;}
</style>

<script type="text/javascript">

	function ss()

{
  window.alert('주문이 취소 되었습니다.');
		 location.href = '../main.php';
}
function ccc()

{
  window.alert('주문이 완료 되었습니다.');
		 location.href = '../main.php';
}

</script>
<body>


<? 
if($order_by == "바로구매")
{

$cartnum = $_SESSION['num'];
$c_count = $_SESSION['c_count'];
$c_price = $_SESSION['c_price'];

$sql = "select * from   peterpan_product where num='$cartnum'";
$result = mysql_query($sql, $connect);



while($row = mysql_fetch_array($result))
{


	  $encoding = "euc-kr";
	  $charNumber = "20";
	  $subject = $row[name];
	  $cutExec = mb_strimwidth($subject, 0, $charNumber, "...", $encoding);

?><div class="container">
<div id="wrap"><div id="accordian">
	<div class="col-xs-12 col-sm-12 col-md-4 well well-sm" style="width: 1000px;">
		<div id="accordian">
			<legend style="font-size:33px;">주문정보 확인</legend>
				<div class="content" id="final_products">
					<div class="left" id="ordered">
						<div class="products" >
							<div class="product_image" >

						<img src="../admin_prod/data/<?=$row[file_copied_0]?>" width="100" /> 
						<?
}

						?>
							</div>
								<div class="product_details" >
									<span class="product_name" ><?= $cutExec?></span>
									<span class="quantity" ><?=$c_count?>개</span>
									<span class="price" ><?=number_format($c_price)?>원</span>
								</div>
						</div><!--end products-->
								<div class="totals">
									<span class="subtitle">주문액 <span id="sub_price"><?=number_format($c_price)?>원</span></span>
									<span class="subtitle">배송비 <span id="sub_ship"><?if  ($c_price  >= "70000")
	{?>
무료입니다


<? $total_record_o = 0 ;}

else

{
	$total_record_o =2500;
	?>

<?=  number_format($total_record_o)?>원
<?


}

?></span></span>	
<?if($point == 0)
	{?>
	<?}
	else
	{?>

<span class="subtitle">포인트 <span id="sub_ship"><?=$point?>사용</span></span>
	<?}?>
</div>


								<div class="final">
									<span class="title">총 주문액 <span id="calculated_total"><?=number_format($c_price   +$total_record_o- $point)?>원</span></span>
								</div>
							</div>
							<div class="right" id="reviewed" style="margin-left:0px">
								<div class="billing">
									<span class="title">주문자 :</span>
									<div class="address_reviewed">
										<span class="name"> <?= $pro_name;?><!--이름--></span>
										<span class="address" style="margin-top: 0px;"><?= $pro_email;?><!--메일--></span>
									
										<span class="phone"><?= $pro_hp;?><!--연락처--></span>
									</div>
								</div>
								
								<div class="shipping" style="margin-top: 20px;">
									<span class="title" >배송지 : </span>
									<div class="address_reviewed" >
										<span class="name"><?= $pro_order_name;?><!--이름--></span>
										<span class="address" style="margin-top: 0px;"><?= $pro_address1;?><!--주소--></span>
										<span class="location"><?= $pro_address2;?><!--상세주소--></span>
										<span class="phone"><?= $pro_order_hp;?><!--연락처--></span>
									</div>
								</div>

								<div class="payment">
									<span class="title" style="margin-top: 20px;">주문메세지 : </span>
									<div class="payment_reviewed" style="margin-top: 20px;">
										<span class="method"><?= $content;?></span>
									</div>
								</div>
								
								<div class="payment">
									<span class="title" style="margin-top: 20px;">결제 : </span>
									<div class="payment_reviewed" style="margin-top: 20px;">
										<span class="method"><?= $order_name;?></span>
										<span class="number_hidden">농협 301-0000-0000-31</span>
									</div>
								</div>

								<span id="inline-block">
									<a href="insert.php?
									name=<?=$pro_name?>&
									email=<?=$pro_email?>&
									hp=<?=$pro_hp?>&
									pro_order_name=<?=$pro_order_name?>&
									pro_order_hp=<?=$pro_order_hp?>&
									pro_address1=<?=$pro_address1?>&
                                    pro_address2=<?=$pro_address2?>&
									content=<?=$content?>&
									point=<?=$point?> &
									order_name=<?=$order_name?>&
									order_in=농협 301-0000-0000-31&
									order_by=<?=$order_by?>&
									cartnum=<?=$cartnum?>&
									c_count=<?=$c_count?>&
                                    c_price=<?=$c_price?>
					"><button class="btn btn-lg btn-primary btn-block" type="submit"  style="width: 200px;">
								주문하기
									</button></a>
								</span>&nbsp;&nbsp;&nbsp;&nbsp;

								<span id="inline-block">
									<a href="../main.php"><button class="btn btn-lg btn-primary btn-block" type="submit" onclick="" style="width: 200px;">
								주문취소
									</button></a>
								</span>
				</div>
		</div>
	</div>
</div>
</div>
	<?

}




else
{
?>
<div class="container">
<div id="wrap"><div id="accordian">
	<div class="col-xs-12 col-sm-12 col-md-4 well well-sm" style="width: 1000px;">
		<div id="accordian">
			<legend style="font-size:33px;">주문정보 확인</legend>
				<div class="content" id="final_products">
					<div class="left" id="ordered">
<?

$sql = "select * from  peterpan_cart where id='$id'";
$result = mysql_query($sql, $connect);

while($row = mysql_fetch_array($result))
{

$sql = "select * from peterpan_product where model='$row[pro_id]'";
$resultt = mysql_query($sql, $connect);
$roww = mysql_fetch_array($resultt); 
	  $encoding = "euc-kr";
	  $charNumber = "23";
	  $subject = $roww[name];
	  $cutExec = mb_strimwidth($subject, 0, $charNumber, "...", $encoding);

?>
						<div class="products">
							<div class="product_image" style="margin-left:-5px;">
						<img src="../admin_prod/data/<?=$roww[file_copied_0]?>" width="100"/> 
							</div>
								<div class="product_details">
									<span class="product_name" ><?= $cutExec?></span>
									<span class="quantity" ><?=$row[cart_count]?>개</span>
									<span class="price" ><?=number_format($roww[price]*$row[cart_count])?>원</span>
								</div>
						</div><!--end products-->
						<?
}
						$sql = "select sum(cart_price) as total from  peterpan_cart where id = '$id'";
$resulttt = mysql_query($sql, $connect);
$rowww = mysql_fetch_array($resulttt);
$totalcount = $rowww['total'] +1; 

$total_record = mysql_num_rows($result);?>

					
								<div class="totals">
									<span class="subtitle">주문액 <span id="sub_price"><?=number_format($rowww['total'] )?>원</span></span>
									<span class="subtitle">배송비 <span id="sub_ship"><?if  ($rowww['total'] >= "70000")
	{?>
무료입니다


<? $total_record_o = 0 ;}

else

{?>
<?   $total_record_o=$total_record*2500;
echo number_format($total_record *2500);

?>원
<?}?></span></span>
<?if($point == 0)
	{?>
	<?}
	else
	{?>

<span class="subtitle">포인트 <span id="sub_ship"><?=$point?>사용</span></span>
	<?}?>
								</div>

								<div class="final">
									<span class="title">총 주문액 <span id="calculated_total"><?=number_format($rowww['total'] +$total_record_o - $point)?>원</span></span>
								</div>
							</div>
							<div class="right" id="reviewed"style="margin-left:0.001%">
								<div class="billing">
									<span class="title">주문자 :</span>
									<div class="address_reviewed">
										<span class="name"> <?= $pro_name;?><!--이름--></span>
										<span class="address" style="margin-top: 0px;"><?= $pro_email;?><!--메일--></span>
									
										<span class="phone"><?= $pro_hp;?><!--연락처--></span>
									</div>
								</div>
								
								<div class="shipping" style="margin-top: 20px;">
									<span class="title" >배송지 : </span>
									<div class="address_reviewed" >
										<span class="name"><?= $pro_order_name;?><!--이름--></span>
										<span class="address" style="margin-top: 0px;"><?= $pro_address1;?><!--주소--></span>
										<span class="location"><?= $pro_address2;?><!--상세주소--></span>
										<span class="phone"><?= $pro_order_hp;?><!--연락처--></span>
									</div>
								</div>

								<div class="payment">
									<span class="title" style="margin-top: 20px;">주문메세지 : </span>
									<div class="payment_reviewed" style="margin-top: 20px;">
										<span class="method"><?= $content;?></span>
									</div>
								</div>
								
								<div class="payment">
									<span class="title" style="margin-top: 20px;">결제 : </span>
									<div class="payment_reviewed" style="margin-top: 20px;">
										<span class="method"><?= $order_name;?></span>
										<span class="number_hidden">농협 301-0000-0000-31</span>
									</div>
								</div>
<?


$sql = "select * from  peterpan_cart where id='$id'";
$result = mysql_query($sql, $connect);

$row = mysql_fetch_array($result);



$sql = "select * from  peterpan_product where model='$row[pro_id]'";
$result = mysql_query($sql, $connect);

$rowa = mysql_fetch_array($result);

$sql = "select sum(cart_count) as total from  peterpan_cart where id = '$id'";
		$resulttt = mysql_query($sql, $connect);
		$rowwww = mysql_fetch_array($resulttt);
		$totalcount = $rowwww['total'] +1; 

?>
								<span id="inline-block">
									<a href="insert.php?
									name=<?=$pro_name?>&
									email=<?=$pro_email?>&
									hp=<?=$pro_hp?>&
									pro_order_name=<?=$pro_order_name?>&
									pro_order_hp=<?=$pro_order_hp?>&
									pro_address1=<?=$pro_address1?>&
                                    pro_address2=<?=$pro_address2?>&
									content=<?=$content?>&
									point=<?=$point?> &
									order_name=<?=$order_name?>&
									order_in=농협 301-0000-0000-31&
									order_by=<?=$order_by?>&


									cartnum=<?=$rowa[num]?>&
									c_count=<?= $rowwww['total']?>&
                                    c_price=<?=$rowww['total'] +$total_record_o - $point?>
									
									">
									

									
									
									<button class="btn btn-lg btn-primary btn-block" type="submit" onclick="ccc()" style="width: 200px;">
								주문하기
									</button></a>
								</span>&nbsp;&nbsp;&nbsp;&nbsp;




								<span id="inline-block">
									<a href="#"><button class="btn btn-lg btn-primary btn-block" type="submit" onclick="ss()" style="width: 200px;">
								주문취소
									</button></a>
								</span>
				</div>
		</div>
	</div>
</div>
</div>
	<?
}




	?>


							
</body>