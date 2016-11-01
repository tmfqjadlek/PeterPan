   <?session_start(); 
   $id=$_SESSION['userid'];
   $table = "peterpan_order";
   $mode=$_GET[mode];
   $search=$_POST[search];
   $find=$_POST[find];
   $bureum=$_GET[bureum];
   include "../lib/dbconn.php";
   ?>
 

	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">


<?$userdate = $_GET[userdate];
$search = $_GET[search];?>

<? $today1 = date("Y-m-d"); ?>
	<?$today2 = date('Y-m-d', strtotime($userdate.'-0 day'));  ?>
	<?$today3 = date('Y-m-d', strtotime($search.' -0 day'));  ?>


<?$userdate1 = date('Y-m-d', strtotime($userdate.'-0 day'));  ?>
	<?$search1 = date('Y-m-d', strtotime($search.' -0 day'));  ?>
<?	include "../lib/dbconn.php";
	$scale=10;			// 한 화면에 표시되는 글 수

 

?>

<head>
<meta charset="euc-kr">
</head>
<body>
<!-- 첫번째 상단 메뉴 -->
    <? include "../menu/top_menu2.php"; ?>
 <!-- 두번쨰 상단 메뉴 -->
    <? include "../menu/main_meun2.php"; ?>
<title>주문상품관리</title>
<section>
	<div class="container" >


<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb" style="margin-bottom: 50px;">
				  <li><a href="#">Home</a></li>
				  <li class="active">주문상품관리</li>
				</ol>
			</div>

<table>
<tr>
<td ><form id="frm" action="finishorder.php?mode=days">
    <div style="margin-top:15px;">날짜 입력&nbsp;:&nbsp;&nbsp;
	<input type="date" id="userdate" name="userdate" value="<?=$today2?>">&nbsp;&nbsp;&nbsp;&nbsp;~&nbsp;&nbsp;</div>

</td>
<td>
    <div>
	<input type="date" id="search" name="search" value="<?=$today3?>">
   <input type="submit" value="전송"></div>
</form>
</td>
</tr>
</table>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
						<td class="daya" align="center" width="200">날짜</td>
							<td class="imgg" align="" width="200"><div style="margin-left:10%;">사진</div></td>
							<td class="description"><div style="margin-left:-310%;">상품명</div></td>
							<td class="pricee" align="center"><div style="margin-left:-220%;">판매가격</div></td>
							<td class="quantity" align="center"><div style="margin-left:-180%;">수량</div></td>
							<td class="total1" align="center"><div style="margin-left:-300%;">주문금액</div></td>
							<td class="total2" align="center"><div style="margin-left:-180%;">주문처리상태</div></td>
							<td class="total3" ><div style="margin-left:-170%;">비고</div></td>
							<td></td>
						</tr>
					</thead>
					

<?
	if($userdate){
	$sql = "SELECT * FROM $table where id = '$id' and order_day>='$userdate1'  and order_day <='$search1' order by num DESC";


		}
		
		else{
     $sql = "SELECT * FROM $table where id = '$id'  order by num DESC " ;

		}
	 $result = mysql_query($sql, $connect);

	 while($roww = mysql_fetch_array($result))
	 {
			
			$pro_name = $roww[product_name];
			$pro_price = $roww[product_price];
			$pro_count = $roww[product_count];
			$pro_progress = $roww[progress];
			$pro_name = $roww[product_name];
					$dayy	=	$roww[order_day];
                     $dayy = date('Y-m-d');
					$dayyy = date('Y-m-d',strtotime($dayy.' +0 day'));
				
			$sql = "select * from peterpan_product where num  = '$pro_name'";
			$resultt = mysql_query($sql, $connect);

			$rowa = mysql_fetch_array($resultt); 

				$encoding = "euc-kr";
			$charNumber = "25";
			$subject = $rowa[name];
			$cutExec = mb_strimwidth($subject, 0, $charNumber, "...", $encoding);


?>
			<tbody>
						<tr>
						
						<td class="cart_product" >
						<div style="margin-top:20%;">
								<h4><?=$roww[order_day]?>
							</div>
							</td>
							
							
							<td class="cart_product">
							<div style="margin-left:80%;margin-top:-40%">
								<a href="../prod/view.php?num=<?=$rowa[num]?>"><img src=../admin_prod/data/<?=$rowa[file_copied_0]?> width="100"></a>
							</div>
							</td>
							
							
							<td class="cart_description">
							<div style="padding-left:35%;">
								<h4><a href="../prod/view.php?num=<?=$rowa[num]?>"><?=$cutExec ?>
							</a></h4>
							</div>
							</td>
							
							<td class="cart_price">
							<div style="margin-top:35%">
								<p><?=number_format($rowa[price])?></p>
							</div>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<div class="cart_quantity_button">
								<div style="margin-top:25%;margin-left:30%">
								<p>	<?= $pro_count ?>개 </p>
								</div>
								</div>
								</div>
							</td>
							<td class="cart_total">
							<div style="margin-top:15%">
								<p class="cart_total_price"><?=number_format($pro_price )?>원</p>
							</div>



							</td>
							<td class="cart_price">
							<div style="margin-top:15%">
								<p><?=$roww[progress]?></p>
								<?if($roww[progress] == "배달중")
								
								
		 {?>



<script type="text/javascript">

<!--
function popupOpen(){
	 var idx = "<?php echo $idx?>";
	var popUrl = "order_info.php?num=<?echo($roww[num]);?>)";	//팝업창에 출력될 페이지 URL
	var popOption = "width=370, height=360, resizable=no, scrollbars=no, status=no;";    //팝업창 옵션(optoin)
		window.open(popUrl,"",popOption);
	}
//-->
</script>
			<p><a href="javascript:popupOpen();">배송정보</a></p>

	 <?}?>
		

<script type="text/javascript">


function check_div(){
	var popUrl =  "order_info.php?num=<?=$roww[bureum]?>";	//팝업창에 출력될 페이지 URL
	var popOption = "width=370, height=360, resizable=no, scrollbars=no, status=no;";    //팝업창 옵션(optoin)
		window.open(popUrl,"",popOption);
	}

</script>

							</div>
							</td>
					<td class="cart_delete" >
							<div style="margin-left:20%">
							<?if($roww[progress] == "입금완료" || $roww[progress] == "입금대기")
		 {?>
						<a class="cart_quantity_delete" href="delete.php?num=<?=$roww[num]?>"><i class="fa fa-times">주문취소</i></a>
			 <?}
			 else
			 {?>

			 <?}?>
							</div>
							</td>
						</tr>

					</tbody>
									
					
					<?
				 }
?>

			

		</table>



			</div>
		</div>
	</section> 
	</div>
	</section>
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

</body>