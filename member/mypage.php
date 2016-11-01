<head>
<meta charset="euc-kr">
<link href="css/main.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
</head>
<style>

#myshopMain {
    margin: 40px 0 0 -40px;
    border-top: 0px solid #333;
    border-bottom: 0px solid #333;
}
strong, b {
    font-weight: bold;
}
#myshopMain .shopMain {
    background: url(../img/bg_myshop1.gif) no-repeat center 25px;
    width: 270px;
    float: left;
    margin: 0 0 40px 40px;
}
#myshopMain .shopMain.order {
    background-image: url(../img/bg_myshop1.gif);
}
#myshopMain .shopMain.profile {
    background-image: url(../img/bg_myshop2.gif);
}
#myshopMain .shopMain.wishlist {
    background-image: url(../img/bg_myshop3.gif);
}
#myshopMain .shopMain.mileage {
    background-image: url(../img/bg_myshop4.gif);
}
#myshopMain .shopMain.coupon {
    background-image: url(../img/bg_myshop5.gif);
}
#myshopMain .shopMain.address {
    background-image: url(../img/bg_myshop6.gif);
}
#myshopMain .shopMain.deposits {
    background-image: url(../img/bg_myshop7.gif);
}
#myshopMain .shopMain.board {
    background-image: url(../img/bg_myshop8.gif);
}
#myshopMain .shopMain h3 a {
    text-decoration: none;
    color: #969696;
    font-family: arial;
    font-size: 12px;
    border: 1px solid #dcdcdc;
    display: block;
    padding: 70px 0 0 0;
    height: 110px;
    text-align: center;
    letter-spacing: 0.5px;
}
a {
    text-decoration: none;
    color: #000;
}
.displaynone {
    display: none;
}
.displaynone {
    display: none !important;
}
#wrap{
	position: relative; 
	width: 1200px; 
	margin: 30px auto 0; 
	padding: 0 50px;
}
.xans-myshop-bankbook ul {
    display: table;
    width: 100%;
    min-width: 756px;
    font-size: 10px;
    line-height: 0;
}
.xans-myshop-benefit {
    margin: 0 0 20px;
}
.xans-myshop-benefit .infoWrap {
    overflow: hidden;
    padding: 10px 10px 10px 90px;
    border: 1px solid #d9d9d9;
    color: #353535;
}
.xans-myshop-benefit .myThumb {
    float: left;
    margin: 0 0 0 -80px;
}
.xans-myshop-benefit .myInfo {
    padding: 8px 0 8px 20px;
    border-left: 1px solid #e8e8e8;
}
.xans-myshop-bankbook {
    overflow: hidden;
    padding: 15px 0 15px 10px;
    border: 1px solid #e8e8e8;
    background: #fff;
}
.xans-myshop-bankbook li {
    display: inline-block;
    position: relative;
    overflow: hidden;
    width: 50%;
    margin: 1px 0 2px;
    font-size: 12px;
    color: #353535;
    line-height: 24px;
    vertical-align: top;
    background: url(../img/ico_myshop.gif) no-repeat 40px 9px;
}
li {
    list-style: none;
}
.xans-myshop-bankbook li .title {
    float: left;
    width: 30%;
    padding: 0 0 0 49px;
    font-weight: normal;
    font-size: 11px;
}
.xans-myshop-bankbook li .use {
    color: #000;
}
.xans-myshop-bankbook li .data {
    float: right;
    width: 35%;
    padding: 0 72px 0 0;
    text-align: right;
    font-size: 12px;
}
#container {
    width: 1200px;
    margin: 0 auto;
}
</style>
<? session_start(); 
$table = "peterpan_order";
$id = $_SESSION['userid'];
$name = $_SESSION['username'];

include "../lib/dbconn.php";

?>
<!-- 첫번째 상단 메뉴 -->
    <? include "../menu/top_menu2.php"; ?>
 <!-- 두번쨰 상단 메뉴 -->
    <? include "../menu/main_meun2.php"; ?>
	<section>
	<div class="container" >

        <div id="contents">
            
<div class="xans-element- xans-layout xans-layout-logincheck ">
</div>
<div class="xans-element- xans-myshop xans-myshop-benefit">
<div class="infoWrap">

        <p class="myThumb">
			</p>
        <div class="myInfo">
            <p class="">저희 쇼핑몰을 이용해 주셔서 감사합니다. <strong class="name"><span><!--이름---------------------></span></strong><?=$name?> 님</p>
        </div>
     </div>
</div>

<?
	$sql = "select * from peterpan_member where id='$id'";
	$result = mysql_query($sql, $connect);
    $row = mysql_fetch_array($result);   

	$t_price = $row[order_price];
	$t_point = $row[point];
	$t_address = $row[address];
?>

<div class="xans-element- xans-myshop xans-myshop-bankbook" >
<ul>
<li>
            <strong class="title">
	<!--가용포인트-->ID</strong>
            <strong class="data use">&nbsp;<!--사용가능포인트--------------------><?=$id?></strong>
          
        </li>
        <li>
            <strong class="title">총포인트</strong>
            <strong class="data"> <!--총포인트-------------> <?=$t_point?></strong>
        </li>
        <li>
            <strong class="title">주소<!--사용한포인트---------------></strong>
            <strong class="data" style="width:380px;"><!--사용한포인트---------------><?=$t_address?></strong>
        </li>
        <li>
            <strong class="title">총주문액</strong>
            <strong class="data"><!--총주문액----------------><?=number_format($t_price)?>&nbsp;원</strong>
        </li>
    </ul>
</div>

	<div id="myshopMain" class="xans-element- xans-myshop xans-myshop-main "><div class="shopMain order">
        <h3><a href="../prod/cart.php"><strong>장바구니</strong></a></h3>      
    </div>

	<div class="shopMain profile">
        <h3><a href="../member/member_form_modify.php"><strong>정보수정</strong></a></h3>        
    </div>

	<div class="shopMain mileage">
        <h3><a href="../order/finishorder.php"><strong>주문/배송</strong></a></h3>
    </div>

	<div class="shopMain address">
        <h3><a href="mypage_delform.php"><strong>회원탈퇴</strong></a></h3>
    </div>

	<div class="shopMain board">
        <h3><a href="mypage_bod.php"><strong>내가쓴글보기</strong></a></h3>
    </div>
</div>
      
</section>
<footer id="footer" style="margin-top:150px;"><!--Footer-->	
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
