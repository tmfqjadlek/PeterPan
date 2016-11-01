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
<body style="height:1100px;">
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
					<h2 class="title text-center"style="margin-top: 20px;">매출조회</h2>
				
				<!--매출관리 카테고리별관리 버튼-->
				<?/*<a class="btnn" href ="" >매출 관리</a> &nbsp;
				<a class="btnn" href ="../total/admin_ca_total.php" style="width: 117px;">카테고리별 관리 </a> &nbsp; */?>
<?
	session_start();
	$page=$_GET[page];
	$num=$_GET[num];
	$table="peterpan_order";
 $date1 = $_GET[date1];
 $date2 = $_GET[date2];
$scale=10;
$mode = $_GET[mode];
include "../lib/dbconn.php";
?>

<?$userdate = $_GET[userdate];
$search = $_GET[search];

?>

	<? $today1 = date("Y-m-d"); ?>
	<?$today2 = date('Y-m-d', strtotime($userdate.'-0 day'));  ?>
	<?$today3 = date('Y-m-d', strtotime($search.' -0 day'));  ?>


<?$userdate1 = date('Y-m-d', strtotime($userdate.'-0 day'));  ?>
	<?$search1 = date('Y-m-d', strtotime($search.' -0 day'));  ?>
<?

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

	elseif($userdate){
		$sql = "select * from $table  WHERE  progress<>'입금대기' and order_day>='$userdate1'  and order_day <='$search1'
		
		
		order by order_day DESC ";
		}
else
{
	$sql = "select * from $table  WHERE  progress <>'입금대기' and order_day = '$today1' order by order_day ";

}

	$resultt = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($resultt); // 전체 글 수
	?>
<?$userdate = $_GET[userdate];
$search = $_GET[search];

?>

<table style="margin-bottom:-30px;">
<tr>
<td><form id="frm" action="admin_total.php?mode=days">
    <div style="margin-right: 30px;">날짜 입력&nbsp;:&nbsp;&nbsp;
	<input type="date" id="userdate" name="userdate" value="<?=$today2?>">&nbsp;&nbsp;&nbsp;~</div>

</td>
<td>
    <div>
	<input type="date" id="search" name="search" value="<?=$today3?>">
   <input type="submit" value="전송"></div>
</form>
</td>
</tr>
</table>


<br>
<br>



		<a class="btnn" href="admin_total.php?mode=30day" >1달전 </a>
		 <a class="btnn" href="admin_total.php?mode=90day" >3달전 </a>
         <a class="btnn" href="admin_total.php?mode=180day" >6달전 </a>
         <a class="btnn" href="admin_total.php?mode=270day" >9달전 </a>
         <a class="btnn" href="admin_total.php?mode=365day" >1년전 </a>	
	
<form  name="board_form" method="post" action="aaa.php"> 
			
<div id="list_search">
			<div id="list_search1">▷ 총 <?= $total_record ?> 개의 매출내역이 있습니다.  </div>
		</form>
</div>

</div>
<div id="wrapper">
	<div id="container" class="">
		<div class="tbl_head01 tbl_wrap">


			<table>
			<thead>
			<tr>
				<th scope="col" style="text-align:center; width: 150px;">주문일자</th>
				<th scope="col" style="text-align:center; width: 100px;">주문자</th>
					<th scope="col" style="text-align:center; width: 200px;">상품</th>
						<th scope="col" style="text-align:center; width: 102px;">주문건수</th>
				<th scope="col" style="text-align:center; width: 202px;">주문액</th>
				
			</tr>
			</thead>



			<tbody>

				<tr>
				<?

	
			while($rowwa = mysql_fetch_array($resultt))
{
	
	$sqls = "select * from peterpan_product where num  = '$rowwa[product_name]'";
			$resultst = mysql_query($sqls, $connect);

			$rowas = mysql_fetch_array($resultst); 
	
	?>
				<td class="td_alignc"><?=$rowwa[order_day]?></td>
				<td class="td_num"><?=$rowwa[order_name	]?></td>
					<td class="td_num" ><?=$rowas[name]?></td>
						<td class="td_num"><?=$rowwa[product_count]?></td>
				<td class="td_numcoupon"><?=number_format($rowwa[product_price])?>원</td>
			</tr>
				</tbody>
							<?
}
				?>
			<tfoot>

<?


IF($mode == "30day")
{
	$sql = "select sum(product_price) as total from $table  WHERE  progress<>'입금대기' and order_day  >= '$day30' order by order_day DESC ";	
}

else IF($mode == "90day")
{
	$sql = "select sum(product_price) as total from $table  WHERE  progress<>'입금대기' and order_day  >= '$day90' order by order_day DESC ";	
}
else IF($mode == "180day")
{
	$sql = "select sum(product_price) as total from $table  WHERE  progress<>'입금대기' and order_day  >= '$day180' order by order_day DESC ";	
}
else IF($mode == "270day")
{
	$sql = "select sum(product_price) as total from $table  WHERE  progress<>'입금대기' and order_day  >= '$day270' order by order_day DESC ";	
}
else IF($mode == "365day")
{
	$sql = "select sum(product_price) as total from $table  WHERE  progress<>'입금대기' and order_day  >= '$day365' order by order_day DESC ";	
}

	elseif($userdate){
		$sql = "select  sum(product_price) as total from $table  WHERE  progress<>'입금대기' and order_day>='$userdate1'  and order_day <='$search1'
		
		
		order by order_day DESC ";
		}

else
{
	$sql = "select sum(product_price) as total from $table  WHERE  progress<>'입금대기' and order_day  >= '$today1' order by order_day DESC ";

	
}
	
$resulttt = mysql_query($sql, $connect);
$rowww = mysql_fetch_array($resulttt);
$totalcount = $rowww['total']; 





IF($mode == "30day")
{
	$sql = "select sum(product_count) as total from $table  WHERE  progress<>'입금대기' and order_day  >= '$day30' order by order_day DESC ";	
}

else IF($mode == "90day")
{
	$sql = "select sum(product_count) as total from $table  WHERE  progress<>'입금대기' and order_day  >= '$day90' order by order_day DESC ";	
}
else IF($mode == "180day")
{
	$sql = "select sum(product_count) as total from $table  WHERE  progress<>'입금대기' and order_day  >= '$day180' order by order_day DESC ";	
}
else IF($mode == "270day")
{
	$sql = "select sum(product_count) as total from $table  WHERE  progress<>'입금대기' and order_day  >= '$day270' order by order_day DESC ";	
}
else IF($mode == "365day")
{
	$sql = "select sum(product_count) as total from $table  WHERE  progress<>'입금대기' and order_day  >= '$day365' order by order_day DESC ";	
}

	elseif($userdate){
		$sql = "select  sum(product_count) as total from $table  WHERE  progress<>'입금대기' and order_day>='$userdate1'  and order_day <='$search1'
		
		
		order by order_day DESC ";
		}

else
{
	$sql = "select sum(product_count) as total from $table  WHERE  progress<>'입금대기' and order_day  >= '$today1' order by order_day DESC ";

	
}
	
$resulttts = mysql_query($sql, $connect);
$rowwwsa = mysql_fetch_array($resulttts);
$totalcount = $rowwwsa['total']; 




?>
			<tr>

				<td>합계</td>
			

				<td colspan="2"></td>
					<td ><?=number_format($rowwwsa['total'])?>건</td>
				<td ><?=number_format($rowww['total'])?>원</td>
			

			</tr>

			</tfoot>

			</table>

		</div>
	</div>
</div>
</div> 
</div>
</section>

</body>
</html>
