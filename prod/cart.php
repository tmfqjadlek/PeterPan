<? 
	session_start(); 
	$id=$_SESSION['userid'];

	$num=$_GET[num];

?>

<!doctype html>
 <head>
  <meta charset="euc-kr">
  <title>장바구니</title>
<style>
#content #col2 {
	width:807px;
	height:2000px;
	min-height:558px;
	float:left;
	margin-left:15px;
	margin-top:55px;
/*	border:solid 1px #cccccc; */
}

#content #col2 #title{
	margin-top:30px;
	height:60px;
	margin-bottom:20px;
		border-bottom:solid 1px #BDBDBD;

}
#od {
	height:40px;
	padding:7px;  
	border-top:solid 3px #000000;
	
	background-color:#eeeeee;
	
	font-size:14px;
}

#od li {
	display:inline;
}

#od #od1 {
	width:100px;
	margin-left:15px;
}

#od #od2 {
	margin-left:130px;
}

#od #od3 {
	margin-left:140px;
}

#od #od4 {
	margin-left:40px;
}

#od #od5 {
	margin-left:40px;
}

#od #od6 {
	margin-left:40px;
}



#list_content {
	height:80px;
}
#odlist_item {
	height:30px;
	margin-top:2px;
	padding:40px; 

	
}

#odlist_item #odlist_item1{
	float:left;
	width:100px;
	margin-left:0px;
	text-align:center;
}

#odlist_item #odlist_item2{
	float:left;
	width:100px;
	margin-left:70px;
	text-align:center;
}

#odlist_item #odlist_item3{
	float:left;
	width:100px;
	margin-left:120px;
	text-align:center;
}

#odlist_item #odlist_item4{
	float:left;
	width:80px;
	margin-left:0px;
	text-align:center;
}

#odlist_item #odlist_item5{
	float:left;
	width:70px;
	margin-left:10px;
	text-align:center;
}

#odlist_item #odlist_item6{
	float:left;
	width:50px;
	margin-left:27px;
	text-align:center;
}
#con_odcharge {
	margin-top:10px;
	height:70px;
}
#odcharge {
	height:0px;
	margin-top:2px;
	padding:0px; 

	border-bottom:solid 1px #BDBDBD;
}

#odcharge #odcharge_item1{
    float: right;
    width: 230px;
    margin-left: -60px;
    padding-top: 45px;
    text-align: left;
}

#all_ord {
	margin-top:50px;
	height:215px;
	border-bottom:solid 3px #fe980f;
	border-top:solid 3px #fe980f;
	border-left:solid 3px #fe980f;
	border-right:solid 3px #fe980f;
}
#all_od {
	height:0px;
	margin-top:2px;
	padding:0px; 

	
}

#all_od #all_od1{
	
	width:500px;
	font-size:13px;

	padding-top:0px;
	
}
#all_od #all_od2{
	border-bottom:solid 1px #BDBDBD;
	width:250px;
	margin-left:520px;
	margin-top:-25px;
	text-align:left;
}
#all_od #all_od3{
	margin-top:20px;
	width:250px;
	margin-left:520px;
	border-bottom:solid 1px #BDBDBD;
	text-align:left;
}
#all_od #all_od4{
	margin-top:-65px;
	width:120px;
	margin-left:650px;
	text-align:right;
}
#all_od #all_od5{
	margin-top:22px;
	width:100px;
	margin-left:670px;
	text-align:right;
}

#all_od #all_od6{

	border-top:1px dashed #BDBDBD;
	margin-right:0px;
	margin-top:35px;
	padding-top:10px;
	text-align:center;
}

#all_od #all_od7{

	
	float:right;
	margin-right:170px;
	
	margin-top:-10px;
	padding-top:10px;
	text-align:center;
}

#all_od #all_od8{

	
	float:right;
	margin-right:-250px;
	margin-left:0px;
	font-size:20px;
	color:#FF0000;
	padding-top:10px;
	margin-top:-20px;
	text-align:center;
}
.big_button {
  clear:both;
  display:block;
  width:30%;
  margin:0 auto;
  padding-top:15px;
  padding-bottom:10px;
  color:#fff;
  font-size:1.2em;
  text-decoration: none;
  background:#FE980F;
  text-align:center;
  border-bottom: 3px solid #f06d06;
  border-radius: 2px;
}

</style>
 </head>
 <body>
<!-- 첫번째 상단 메뉴 -->
    <? include "../menu/top_menu2.php"; ?>
 <!-- 두번쨰 상단 메뉴 -->
    <? include "../menu/main_meun2.php"; ?>



	<!--	<div class="clear">주문자정보</div>
		<div id="allod_infor">
		<div id="od_infor" >
				<div id="od_infor1">이름</div>
				<div id="od_infor2">김슬범</div>
				<div id="od_infor3">이메일</div>
				<div id="od_infor4">이메일을 인풋박스로 가져옴</div>
				<div id="od_infor5">연락처</div>
				<div id="od_infor6">연락처을 인풋박스로 가져옴</div>
		</div>
		</div>

		<div class="clear">배송지정보</div>
		<div id="allod_infor">
		<div id="od_infor" >
				<div id="od_infor1">이름</div>
				<div id="od_infor2">김슬범</div>
				<div id="od_infor3">연락처1</div>
				<div id="od_infor4">연락처을 인풋박스로 가져옴</div>
				<div id="od_infor5">연락처2</div>
				<div id="od_infor6">연락처을 인풋박스로 가져옴</div>
				<div id="od_infor7">주소</div>
				<div id="od_infor8">주소를 인풋박스로 가져옴</div>
				<div id="od_infor9">상세주소</div>
				<div id="od_infor10">상세주소를 인풋박스로 가져옴</div>
				<div id="od_infor11">주문메세지</div>
				<div id="od_infor12">메세지를 인풋박스로 가져옴</div>
		</div>
		</div>
		<br>

		<br>
		<br>
		<div class="clear">무통장입금자면</div>
		<div id="allod_infor">
		<div id="od_infor" >
				<div id="od_infor1">이름</div>
				<div id="od_infor2">이름사용할인풋박스</div>
		</div>
		</div>
	
		<div class="clear">포인트사용</div>
		<div id="allod_infor">
		<div id="od_infor" >
				<div id="od_infor99">인풋박스</div>
				<div id="od_infor98">사용버튼</div>
		</div>
		</div>-->
		
		

	<?	include "../lib/dbconn.php";

	  

	$sql = "select * from  peterpan_cart where id='$id'";
	$result = mysql_query($sql, $connect);
	?>


	


	</div>
 </div>
</body>
</html>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="../main.php">Home</a></li>
				  <li class="active">장바구니</li>
				</ol>
			</div>
			<div class="table-responsive cart_info" style="
    margin-bottom: 20px;
">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">사진</td>
							<td class="description">상품명</td>
							<td class="price">판매가격</td>
							<td class="quantity">수량</td>
							<td class="total">주문금액</td>
							<td class="total">포인트</td>
							<td class="total">비고</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?
						 while($row = mysql_fetch_array($result))

{
		$sql = "select * from peterpan_product where model='$row[pro_id]'";
	$resultt = mysql_query($sql, $connect);

    $roww = mysql_fetch_array($resultt); 

	
?>
						<tr>

							<td class="cart_product" style="margin-left:0px;">
								<a href="../prod/view.php?num=<?=$roww[num]?>"><img src=../admin_prod/data/<?=$roww[file_copied_0]?> width="100"></a>
							</td>
							<td class="cart_description">
								<h4><a href="../prod/view.php?num=<?=$roww[num]?>"><?=$row[pro_id]?></a></h4>
							</td>
							<td class="cart_price">
								<p><?=number_format($roww[price])?>원</p>
							</td>
							<td class="cart_price">
								<div class="cart_quantity_button">
							
								<p>	<?=$row[cart_count]?>개 </p>
								
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?=number_format($row[cart_count] * $roww[price]) ?>원</p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?=number_format($roww[point]*$row[cart_count] )?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="delete.php?num=<?=$row[num]?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>

												<?
}
		?>

					</tbody>
				</table>

						<div id="con_odcharge">
			<div id="odcharge"> <? $sql = "select sum(cart_price) as total from  peterpan_cart where id = '$id'";
		$resulttt = mysql_query($sql, $connect);
		$rowww = mysql_fetch_array($resulttt);
		$totalcount = $rowww['total'] +1; 


			 $total_record = mysql_num_rows($result);
			?>
				<div id="odcharge_item1">   
				
				<?if  ($rowww['total'] >= "70000")
				{?>
					배송비 무료입니다
				<?}
				
				else
				
				{?>
배송비 <?=number_format($total_record *2500)?>원
				<?}?>
				
				
				<Br>
				*7만원이상시 배송비는 무료입니다.</div>
			</div>
		</div>

	
		<div id="all_ord" style="
			margin-top: 20px;
			padding-top: 30px;">
			<div id="all_od">
				<div id="all_od1"><h3>총주문금액</h3></div>
				<div id="all_od2" style="margin-left: 450px;">상품총금액</div>
				<div id="all_od3" style="margin-left: 450px;">배송비</div>
				<div id="all_od4" style="margin-left: 550px;"><?=number_format($rowww['total'])?>원</div>
				<div id="all_od5" style="margin-left: 570px;"><?if  ($rowww['total'] >= "70000")
				{?>
					무료
				<? $total_record_o = 0;}
				
				else
				
				{
					
					 $total_record_o = $total_record *2500?>

 <?=

 number_format($total_record_o)?>원
				<?}?>
				</div>
				<div id="all_od6"></div>
				<div id="all_od7"><h4>결제 예정금액</h4></div>
				<div id="all_od8"><h3><?=number_format($rowww['total'] +$total_record_o)?> 원</h3></div>
			</div>
		</div>

			</div>


			
			<a class="big_button" id="" href="../order/order_ck.php?orderclick=<?=$rowww['total']?>">주문 하기</a>
			<br>
			<a class="big_button" id="" href="../prod/prod_list.php">계속쇼핑하기</a>
			
		</div>
	</section> <!--/#cart_items-->

	<footer id="footer" style="margin-top:80px;"><!--Footer-->	
		<div class="footer-widget" style="margin-bottom:0px; margin-top:20px;">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li>고객은 안전거래를 위해 현금 등으로 결제시</li>
								<li>저희 쇼핑몰에서 가입한 구매안전 서비스</li>
								<li>(소비자피해 보상보험 서비스)를 이용하실 수 있습니다.</li>
								
							</ul>
							<h2>PETERPAN</h2>
							<ul class="nav nav-pills nav-stacked">
								<li>[426-701] 안산시 상록구 안산대로 155 진리관</li>
								<li>대표자:김민지 사업자등록번호:211-11-01010</li>
								<li>개인정보 보호 및 청소년 보호책임자:김민지</li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">피규어</a></li>
								<li><a href="#">나노블럭</a></li>
								<li><a href="#">드론</a></li>
								<li><a href="#">인형</a></li>
								<li><a href="#">레고블럭</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">이용약관</a></li>
								<li><a href="#">Privecy 정책</a></li>
								<li><a href="#">환불정책</a></li>
								<li><a href="#">결제시스템</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>PRODUCT</h2>
							<ul class="nav nav-pills nav-stacked">
								<li>평일 9 : 00 ~ 18 : 00 / 점심시간 12 : 00 ~ 13 : 00</li>
								<li>주말 및 공휴일은 1:1문의하기를 이용해주세요.</li>
								<li>업무가 시작되면 바로 처리해드립니다.</li>
								<li><a href="#">zmfdls@peterpan.co.kr</a></li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row" style="margin-top:20px;">
					<p class="pull-left">Copyright ⓒ 2016 PETERPAN Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a href="#">Themeum</a></span></p>
				</div>
			</div>
		</div>
	</footer><!--/Footer-->
