<html>
<head> 
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/admin_pro.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/total.css" rel="stylesheet" type="text/css" media="all">
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
				
				<!--매출관리 카테고리별관리 버튼-->
				<a class="btnn" href ="../total/admin_total.php" >매출 관리</a> &nbsp;
				<a class="btnn" href ="../total/admin_ca_total.php" style="width: 117px;">카테고리별 관리 </a> &nbsp;
<?
	session_start();
	$page=$_GET[page];
	$num=$_GET[num];
	$table="peterpan_order";
 $date1 = $_GET[date1];
 $date2 = $_GET[date2];
$scale=10;
$mode = $_GET[mode];
?>
<?
include "../lib/dbconn.php";
$date2 = date('Y-m-d', strtotime($date2.' +1 day')); 

$day30 = date('Y-m-d', strtotime($nowday.' -30 day')); 
$day90 = date('Y-m-d', strtotime($nowday.' -90 day')); 
$day180 = date('Y-m-d', strtotime($nowday.' -180 day')); 
$day270 = date('Y-m-d', strtotime($nowday.' -270 day')); 
$day365 = date('Y-m-d', strtotime($nowday.' -365 day')); 
$nowday = date("Y-m-d (H:i)");




$ope = "select * from  $table where progress <> '입금대기'" ;

IF($mode == "30day")
{
	$sql = "select * from $table  WHERE  progress<>'입금대기' and order_day  >= '$day30' order by order_day DESC ";
	
}

	else if($mode == "90day")
{
	$sql = "select * from $table  WHERE  progress<>'입금대기' and order_day  >= '$day90' order by order_day DESC ";
}
	else if($mode == "180day")
{
	$sql = "select * from $table  WHERE  progress<>'입금대기' and order_day  >= '$day180' order by order_day DESC ";
}
	else if($mode == "270day")
{
	$sql = "select * from $table  WHERE  progress<>'입금대기' and order_day  >= '$day270' order by order_day DESC "; 
}
	else if($mode == "365day")
{
	$sql = "select * from $table  WHERE  progress<>'입금대기' and order_day  >= '$day365' order by order_day DESC ";
}
else
{
	$sql = "select * from $table  WHERE  progress <> '입금대기'  order by order_day ";

}

	$resultt = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($resultt); // 전체 글 수
	?>
<?$userdate = $_GET[userdate];
$search = $_GET[search];

?>

<table style="margin-bottom:-30px;">
<tr>
<td><form id="frm" action="adminorder.php?mode=days">
    <div style="margin-right: 30px;">날짜 입력&nbsp;:&nbsp;&nbsp;
	<input type="date" id="userdate" name="userdate" value="<?=$nowday?>">&nbsp;&nbsp;&nbsp;~</div>

</td>
<td>
    <div>
	<input type="date" id="search" name="search" value="<?=$nowday?>">
   <input type="submit" value="전송"></div>

</form>

</td>
</tr>
</table>
<section>
<div id="wrapper" style="height: 500px; width: 1300px;">
 <div id="container">
<div class="sidx">
    <section id="anc_sidx_ord">
        <h3 style="margin-bottom: 50px;">카테고리별 주문현황</h3>
			<div id="sidx_graph">
				<ul id="sidx_graph_price">
									<li><span></span>100</li>
									<li><span></span>90</li>
									<li><span></span>70</li>
									<li><span></span>50</li>
									<li><span></span>30</li>
									<li><span></span>10</li>
								</ul>
				<ul id="sidx_graph_area">
                     <li class="bg0" style="z-index:10">
					  <div class="graph order" title="10월 15일 주문: 0원" style="height: 50px;"></div>
					</li>
                      <li class="bg1" style="z-index:9">
						<div class="graph order" title="10월 16일 주문: 0원" style="height: 30px;"></div>
					  </li>
                      <li class="bg0" style="z-index:8">
						 <div class="graph order" title="10월 17일 주문: 0원" style="height: 15px;"></div>
					  </li>
                      <li class="bg1" style="z-index:7">
						 <div class="graph order" title="10월 18일 주문: 0원" style="height: 50px;"></div>
					  </li>
					  <li class="bg0" style="z-index:6">
						<div class="graph order" title="10월 19일 주문: 0원" style="height: 40px;"></div>
					  </li>
                       <li class="bg1" style="z-index:5">
						 <div class="graph order" title="10월 20일 주문: 0원" style="height: 30px;"></div>
						</li>
					<li class="bg0" style="z-index:4">
						<div class="graph order" title="10월 21일 주문: 0원" style="height: 5px;"></div>
					</li>
                            </ul>
            <ul id="sidx_graph_date">
                                <li><span></span>피규어</li>
                                <li><span></span>커스텀피규어</li>
                                <li><span></span>다이캐스터</li>
                                <li><span></span>나노블럭</li>
                                <li><span></span>레고</li>
                                <li><span></span>RC</li>
                                <li><span></span>드론</li>
								<li><span></span>보드게임</li>
								<li><span></span>인형</li>
								<li><span></span>영화</li>
								<li><span></span>애니메이션</li>
								<li><span></span>기타</li>
                            </ul>
            <div id="sidx_graph_legend">
                <span id="legend_order"></span> 주문
            </div>
        </div>
    </section>
    </div>
</div>
</div>
   </div>
</section>
