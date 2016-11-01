<? 
	session_start(); 
	$id=$_SESSION['userid'];
	$mode=$_GET[mode];
	$num=$_GET[num];
	$page=$_GET[page];
	$find=$_POST[find];
	$search=$_POST[search];
	$table = "peterpan_order" ;
	$adminod = $_POST[adminod];
	$_SESSION['num']=$item_num;
		include "../lib/dbconn.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/admin_order.css" rel="stylesheet" type="text/css" media="all">
</head>
<style>
	
</style>
<body>
<!-- 첫번째 상단 메뉴 -->
    <? include "../menu/top_menu2.php"; ?>
<!-- 두번쨰 상단 메뉴 -->
    <? include "../menu/main_meun2.php"; ?>
<!-- 관리자 페이지 -->
    <? include "../menu/top_menu3.php"; ?>
	
<?$userdate = $_GET[userdate];
$search = $_GET[search];

?>

	<? $today1 = date("Y-m-d"); ?>
	<?$today2 = date('Y-m-d', strtotime($userdate.'-0 day'));  ?>
	<?$today3 = date('Y-m-d', strtotime($search.' -0 day'));  ?>


<?$userdate1 = date('Y-m-d', strtotime($userdate.'-0 day'));  ?>
	<?$search1 = date('Y-m-d', strtotime($search.' +1 day'));  ?>

	
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 padding-right">
				<div class="features_items">      
					<h2 class="title text-center"style="
    margin-top: 20px;
">주문관리</h2>
<table style="margin-bottom:-30px;">
<tr>
<td><form id="frm" action="adminorder.php?mode=days">
    <div style="margin-right: 30px;">날짜 입력&nbsp;:&nbsp;&nbsp;
	<input type="date" id="userdate" name="userdate" value="<?=$today2?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;~</div>

</td>
<td>
    <div>
	<input type="date" id="search" name="search" value="<?=$today3?>">
   <input type="submit" value="전송"></div>
</form>
</td>
</tr>
</table>
		<form  name="board_form" method="post" action=""> 
		<div id="list_search">
			
			
		</div>
		</form>
		<div class="clear"></div>

		<div id="list_top_titles">
			<ul>
				<li id="list_title1s">번호</li>
				<li id="list_title2s">상품사진</li>
				<li id="list_title3s" style="margin-left: 90px; margin-right: 70px;">상품명</li>
				<li id="list_title4s">주문자</li>
				<li id="list_title6s">수량</li>
				<li id="list_title7s" style="margin-right: 35px; margin-left: 35px;">가격</li>
				<li id="list_title10s"style="margin-right: 50px; margin-left: 50px;">주문일</li>
				<li id="list_title11s" style="margin-right: 20px;">진행상태</li>
				<li id="list_title12s">비고</li>
			</ul>		
		</div>
<?


if($userdate){
	$sql = "SELECT * FROM $table WHERE order_day BETWEEN '$userdate1' and '$search1' order by order_day DESC";
		}
		
		else{
     $sql = "SELECT * FROM $table order by num DESC " ;
		}
		
	 $result = mysql_query($sql, $connect);

	 while($row = mysql_fetch_array($result))
	 {		
			$num = $row[num];
			$pro_name = $row[product_name];
			$pro_price = $row[product_price];
			$pro_count = $row[product_count];
			$pro_progress = $row[progress];
			$pro_name = $row[product_name];
			$namee = $row[name];
			$order_day = $row[order_day];


			$sql = "select * from peterpan_product where num = '$pro_name'";
			$resultt = mysql_query($sql, $connect);

			$rowa = mysql_fetch_array($resultt); 

			
			$encoding = "euc-kr";
			$charNumber = "25";
			$subject = $rowa[name];
			$cutExec = mb_strimwidth($subject, 0, $charNumber, "...", $encoding);
			
?>
		<div id="list_contents">
			<div id="list_itemss">
			<div id="list_items2">
			<a href="../prod/view.php?num=<?=$rowa[num]?>"><img src=../admin_prod/data/<?=$rowa[file_copied_0]?> width="100"></a><br><br>
		</div>
				<div id="list_items1"><?=$num?></div>
				<div id="list_items4"></div>
				<div id="list_items5"style="width: 150px; margin-left: 90px; margin-right: 55px;"><?=$cutExec ?></div>
				<div id="list_items7" style="margin-left:-20px"><?=$namee ?></div>
				<div id="list_items8"style="width: 26px; margin-left: 50px;"><?=$pro_count ?></div>
				<div id="list_items9"style="width: 100px; margin-left: 0px;"><?=number_format($pro_price) ?></div>
				<div id="list_items10" style="margin-left: 10px; width: 120px;"><?=$order_day ?></div>
				<div id="list_items11">
				
					<?=$row[progress]?>
						
		</div>

<script type="text/javascript">
<!--
 
function ss()
		 {

	window.open('admin_insert.php?num=$num', '','scrollbars=no, toolbars=no,width=180,height=230')
		 }
//-->
</script>
				<div id="list_items12"> <?

if($row[progress] == "주문취소")
		 {
				echo "<a href='deletee.php?num=$num'>삭제</a>";
		 }


				echo "<a href='admin_insert.php?num=$num'            border='0'  target='_blank'>등록</a>";
				?></div>
				
			</div>
	<?
	 }
?>

	<div id="page_button">
		<div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp; 

			&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
				</div>
				<div id="button">
					<a href=""><img src="../img/list.png"></a>&nbsp;
					<a href=""><img src="../img/save.png"></a>
				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->
		<div class="clear"></div>
	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
