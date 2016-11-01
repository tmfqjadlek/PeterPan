<html>
<head> 
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/admin_pro.css" rel="stylesheet" type="text/css" media="all">
<style>
.btnn {
                -moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
                -webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
                box-shadow:inset 0px 1px 0px 0px #ffffff;
                background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf) );
                background:-moz-linear-gradient( center top, #ededed 5%, #dfdfdf 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf');
                background-color:#ededed;
                -webkit-border-top-left-radius: 3px;
                -moz-border-radius-topleft: 3px;
                border-top-left-radius: 3px;
                -webkit-border-top-right-radius: 3px;
                -moz-border-radius-topright: 3px;
                border-top-right-radius: 3px;
                -webkit-border-bottom-right-radius: 3px;
                -moz-border-radius-bottomright: 3px;
                border-bottom-right-radius: 3px;
                -webkit-border-bottom-left-radius: 3px;
                -moz-border-radius-bottomleft: 3px;
                border-bottom-left-radius: 3px;
                text-indent:0;
                border:1px solid #dcdcdc;
                display:inline-block;
                color:#000000;
                padding: 0px 10px;
                margin-bottom: 8px;
                font-size:13px;
                width:110px;
                height:25px;
                line-height:25px;

                text-decoration:none;
                text-align:center;
                text-shadow:1px 1px 0px #ffffff;
            }
			.btnn:hover {
                background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed) );
                background:-moz-linear-gradient( center top, #dfdfdf 5%, #ededed 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed');
                background-color:#dfdfdf;
            }
			.btnn:active {
                position:relative;
                top:1px;
            }                
</style>
</head>
<body>
<!-- 첫번째 상단 메뉴 -->
    <? include "../menu/top_menu2.php"; ?>
<!-- 두번쨰 상단 메뉴 -->
    <? include "../menu/main_meun2.php"; ?>
<!-- 관리자 페이지 -->
    <? include "../menu/top_menu3.php"; ?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 padding-right">
				<div class="features_items">      
					<h2 class="title text-center"style="margin-top: 20px;">통계</h2>
<?
	session_start();
	$page=$_GET[page];
	$num=$_GET[num];
	$table="peterpan_order";
 $date1 = $_GET[date1];
 $date2 = $_GET[date2];
$scale=10;
?>
<?
include "../lib/dbconn.php";
$date2 = date('Y-m-d', strtotime($date2.' +1 day')); 
$sql = "select * from $table  where order_day>='$date1' and order_day<='$date2' order by order_num desc";
$day30 = date('Y-m-d', strtotime($nowday.' -30 day')); 
$day90 = date('Y-m-d', strtotime($nowday.' -90 day')); 
$day180 = date('Y-m-d', strtotime($nowday.' -180 day')); 
$day270 = date('Y-m-d', strtotime($nowday.' -270 day')); 
$day365 = date('Y-m-d', strtotime($nowday.' -365 day')); 
$nowday = date("Y-m-d (H:i)");


IF($mode == "30day")
{
$sql = "SELECT * FROM $table WHERE order_day BETWEEN '$day30' and '$nowday' order by order_day "; 
}

	else if($mode == "90day")
{
$sql = "SELECT * FROM $table WHERE order_day BETWEEN '$day90' and '$nowday' order by order_day "; 
}
	else if($mode == "180day")
{
$sql = "SELECT * FROM $table WHERE order_day BETWEEN '$day180' and '$nowday' order by order_day "; 
}
	else if($mode == "270day")
{
$sql = "SELECT * FROM $table WHERE order_day BETWEEN '$day270' and '$nowday' order by order_day "; 
}
	else if($mode == "365day")
{
$sql = "SELECT * FROM $table WHERE order_day BETWEEN '$day365' and '$nowday' order by order_day "; 
}

	else
	{
	$sql = "select * from system_order order by order_num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수
	?>
	<?
	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
	
?>
		<a class="btnn" href="admindashboard.php?mode=30day" >1달전 </a>
		 <a class="btnn" href="admindashboard.php?mode=90day" >3달전 </a>
         <a class="btnn" href="admindashboard.php?mode=180day" >6달전 </a>
         <a class="btnn" href="admindashboard.php?mode=270day" >9달전 </a>
         <a class="btnn" href="admindashboard.php?mode=365day" >1년전 </a>
			
<form  name="board_form" method="post" action="admindashboard.php"> 
			<div>판매내역</div>
<div id="list_search">
			<div id="list_search1">▷ 총 <?= $total_record ?> 개의 매출내역이 있습니다.  </div>
	

				<div>주문자 이름</div>
				<div>주문 금액</div>
				<div>주문 날짜</div>
			<?
			$sum = 0;
			for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $rowwa = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	  
	    $num     = $rowwa[num];
		$total = $rowwa[product_count] * $rowwa[product_price];
		echo "$total";
	 ?> 


		
			<?
   }
			?>
			
			</div>
		</form>
		</div> 
  </div> 
</div> 
</div>
</body>
</html>
