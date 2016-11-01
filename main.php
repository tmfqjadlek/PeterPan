<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http:www.w3.orf/TR/html/loose.dtd">
<html lang="en">
<head>
    <meta charset="euc-kr">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<title>피터팬</title>
	<link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/font-awesome.min.css" rel="stylesheet">
    <link href="./css/prettyPhoto.css" rel="stylesheet">
    <link href="./css/price-range.css" rel="stylesheet">
    <link href="./css/animate.css" rel="stylesheet">
	<link href="./css/main.css" rel="stylesheet">
	<link href="./css/responsive.css" rel="stylesheet">
	<link href="./css/common.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

</head>

	<? include "./menu/top_menu1.php"; ?>

	<? include "./menu/main_meun1.php"; ?>

	<? include "./menu/slider.php"; ?>
	
		<? include "best.php"; ?>
<br><br><br><br>
		<? include "sale.php"; ?>
	
<div class=" container">.
	<style>
/* 떠다니는 메뉴 (Floating Menu) */
#floatdiv {
    position:fixed; _position:absolute; _z-index:-1;
    width:160px; /* 가로폭 조절*/
    overflow:hidden;
    right:45%;
    top:24%; /* 이미지 높이 조절 */
    background-color: transparent;
    margin-right: -730px; /* 좌우측 여백 조절 */
    padding:0;
}#floatdiv ul  { list-style: none; }
#floatdiv li  { margin-bottom: 2px; text-align: center; }
#floatdiv a   { color: #5D5D5D; border: 0; text-decoration: none; display: block; }
#floatdiv a:hover, #floatdiv .menu  { background-color: #5D5D5D; color: #fff; }
#floatdiv .menu, #floatdiv .last    { margin-bottom: 0px; }
</style>
<!--
<div id="todayview">
<? include "./lib/todayview1.asp"; ?>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
<!--
    function fnGetTodayGoods(page)
    {
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "/productProc.asp",
            data: { mode : "TODAYGOODS" , page : page },
            success: function(toDayGoods){
                $("#historybanner").html(toDayGoods);
            }
            ,error: function(){ 
                 
            }
        });   
    }
//
</script>
<? include "./lib/todayview2.asp"; ?>
</div>

<div id="floatdiv">

<ul>
<a>최근본상품</a>
<a href='./prod/cart.php' target=''><img src='./img/cart.png' /></a>
<a href='#' target=''><img src='./img/mypage.png' /></a>
<a href='#' target=''><img src='./img/delivery.png' /></a>

</ul>
</div>-->


		<? include "notice.php"; ?>
</div>	

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
								<li><a href="http://zmfdls.dothome.co.kr/peterpan/prod/prod_list.php?category=C1">피규어</a></li>
								<li><a href="http://zmfdls.dothome.co.kr/peterpan/prod/prod_list.php?category=C4">나노블럭</a></li>
								<li><a href="http://zmfdls.dothome.co.kr/peterpan/prod/prod_list.php?category=C7">드론</a></li>
								<li><a href="http://zmfdls.dothome.co.kr/peterpan/prod/prod_list.php?category=C9">인형</a></li>
								<li><a href="http://zmfdls.dothome.co.kr/peterpan/prod/prod_list.php?category=C5">레고블럭</a></li>
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
</html>
