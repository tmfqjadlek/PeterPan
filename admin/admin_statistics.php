<div id="statistics">
	<div id="counter">
	</div>

<!--###################################판매내역###########################################-->
	<?
// 1. 공통 인클루드 파일
session_start();
$id=$_SESSION['id'];
$num=$SESSION['num'];
$page=$_GET[page];
$table="peterpan_order";

 ?>
 <?
include "../lib/dbconn.php";


// 2. 로그인 하지 않은 회원은 로그인 페이지로 보내기


$scale=10;
$mode = $_GET[mode];
if($mode=="list")
{
	 $date1 = $_GET[date1];
 $date2 = $_GET[date2];
}
else if($mode=="search")
{
 $date1 = $_POST[date1];
 $date2 = $_POST[date2];
}
    if ($mode=="search" || $mode=="list")
	{	



		if(!$date1 || !$date2)  
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}
		$date2 = date('Y-m-d', strtotime($date2.' +1 day')); 

	$sql = "select * from $table  where order_day>='$date1' and order_day<='$date2' order by num desc";
	}
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
	$sql = "select * from peterpan_order order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수



?>

<a href ="admin_statistics.php?mode=30day"> 1달전</a>

<a href ="admin_statistics.php?mode=90day"> 3달전</a>

<a href ="admin_statistics.php?mode=180day"> 6달전</a>

<a href ="admin_statistics.php?mode=270day"> 9달전</a>

<a href ="admin_statistics.php?mode=365day"> 1년전</a>


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



/*// 4. 전체 주문 갯수 알아내기
$sql = "select count(*) as order_n from system_order where id='$id' ";
$total_count = sql_total($sql);


// 5. 페이지 출력 내용 만들기
$paging_str = paging($page, $page_row, $page_scale, $total_count, "");

// 6. 시작 열을 구함
$from_record = ($page - 1) * $page_row;

// 7. 구매목록 구하기
$query = "select * from m__order where 1 limit ".$from_record.", ".$page_row;
$result = mysql_query($query, $connect);*/

?>
<br/>
<table style="width:1000px;height:50px;border:5px #CCCCCC solid;">
    <tr>
        <td align="center" valign="middle" style="font-zise:15px;font-weight:bold;">판매내역</td>
    </tr>
</table>
<br/>
<form  name="board_form" method="post" action="admin_statistics.php?table=<?=$table?>&mode=search"> 
		<div id="list_search">
			<div id="list_search1">▷ 총 <?= $total_record ?> 개의 판매내역이 있습니다.  </div>
			<div id="list_search2"><img src="../img/select_search.gif"></div>
			<div id="list_search3"><input type="text" name="date1"></div>
			<div id="list_search4"><input type="text" name="date2"></div>
			<div id="list_search5"><input type="image" src="../img/list_search_button.GIF"></div>
		</div>
		</form>
<table style="width:1000px;height:50px;border:0px;">
<table cellspacing="1" style="width:1000px;height:50px;border:0px;background-color:#999999;">
    <tr>
        <td align="center" valign="middle" width="20%" style="height:30px;background-color:#CCCCCC;">주문번호</td>
        <td align="center" valign="middle" width="20%" style="height:30px;background-color:#CCCCCC;">주문자 이름</td>
        <td align="center" valign="middle" width="40%" style="height:30px;background-color:#CCCCCC;">주문금액</td>
        <td align="center" valign="middle" width="40%" style="height:30px;background-color:#CCCCCC;">주문일시</td>
    </tr>
<?
// 8.데이터 갯수화 총합 체크를 위한 변수 설정

$sql = "select * from  peterpan_oder where progress in ('결제완료')";
$sum = 0;



// 9.데이터가 있을 동안 반복해서 값을 한 줄씩 읽기
 for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	  
	  $num     = $row[num];

	  $c_name     = $row[c_name];
	  $order_total     = $row[product_price];
	  $sum += $row[product_price];
	  $progress     = $row[progress];
	  $order_day     = $row[order_day];



?>
    <tr>
        <td align="center" valign="middle" style="height:30px;background-color:#FFFFFF;"><?=$num?></td>
        <td align="center" valign="middle" style="height:30px;background-color:#FFFFFF;"><?=$c_name?></td>
        <td align="center" valign="middle" style="height:30px;background-color:#FFFFFF;"><a href="./order_detail2.php?pro_id=<?=$c_name?>&page=<?=$page?>"><?=number_format($order_total)?>원</a></td>
        <td align="center" valign="middle" style="height:30px;background-color:#FFFFFF;"><?=$order_day?></td>
    </tr>
<?

  
}

// 11.데이터가 하나도 없으면 
if($i == 0){
?>
    <tr>
        <td align="center" valign="middle" colspan="4" style="height:50px;background-color:#FFFFFF;">주문이 하나도 없습니다.</td>
    </tr>
<?
}
?>
    <tr>
        <td align="center" valign="middle" colspan="4" style="height:50px;background-color:#FFFFFF;">총 합 : <?=number_format($sum)?>원</td>
    </tr>
</table>
<br>

			<div id="page_button">
				<div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
<?
$mode = $_GET[mode];
if($mode=="list")
{
	 $date3 = $_GET[date1];
 $date4 = $_GET[date2];
}
else if($mode=="search")
{
 $date3 = $_POST[date1];
 $date4 = $_POST[date2];
}
$number--;
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='admin_statistics.php?table=$table&page=$i&mode=list&date1=$date3&date2=$date4'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
				</div>
</div>