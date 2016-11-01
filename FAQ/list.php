<? 
	session_start(); 

	$page= $_GET[page];
	$num=$SESSION['num'];
	$id = $_SESSION['userid'];
	$table = "peterpan_FAQ";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="euc-kr">

<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/concert.css" rel="stylesheet" type="text/css" media="all">

</head>
<?
	include "../lib/dbconn.php";
	$scale=10;			// 한 화면에 표시되는 글 수

$mode = $_GET[mode];
if($mode=="list")
{
 $search = $_GET[search];
 $find=$_GET[find];
}
else if($mode=="search")
{
 $search = $_POST[search];
 $find=$_POST[find];
}

    if ($mode=="search" || $mode=="list")
	{
		if(!$search)  
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table  where  $find like '%$search%' order by num desc";
	}
	else if($mode== "QA1"){
		$sql = "SELECT * FROM $table WHERE category	 LIKE '회원가입/정보'  order by num desc";
		$find="subject";
	}
	else if($mode== "QA2"){
		$sql = "SELECT * FROM $table WHERE category	 LIKE '상품문의'  order by num desc";
		$find="subject";
	}

	else if($mode== "QA3"){
		$sql = "SELECT * FROM $table WHERE category	 LIKE '주문/결제'  order by num desc";
		$find="subject";
	}
	else if($mode== "QA4"){
		$sql = "SELECT * FROM $table WHERE category	 LIKE '배송관련'  order by num desc";
		$find="subject";
	}

	else if($mode== "QA5"){
		$sql = "SELECT * FROM $table WHERE category	 LIKE '포인트 관련'  order by num desc";
		$find="subject";
	}
	else if($mode== "QA6"){
		$sql = "SELECT * FROM $table WHERE category	 LIKE '기타'  order by num desc";
		$find="subject";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	
	$result = mysql_query($sql, $connect);
	
	$total_record = mysql_num_rows($result); // 전체 글 수

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

<body>

	
    <? include "../menu/top_menu2.php"; ?>

    <? include "../menu/main_meun2.php"; ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 padding-right">
				<div class="features_items">      
					<h2 class="title text-center">FaQ</h2>

		<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
		<div id="list_search">
			<div id="list_search1">▷ 총 <?= $total_record ?> 개의 FAQ가 있습니다.  </div>
			<div id="list_search2"></div>
			<div id="list_search3">
				<select name="find">
                    <option value='subject'>제목</option>
                    <option value='content'>내용</option>
                    <option value='nick'>글쓴이</option>
                
				</select></div>
			<div id="list_search4"><input type="text" name="search"></div>
			<div id="list_search5"><input type="image" src="../img/sch.png"></div>
		</div>
		</form>
		</div>
		 <a class="btnn" href="list.php?mode=QA1" >회원가입/정보 </a>
		 <a class="btnn" href="list.php?mode=QA2" >상품문의 </a>
         <a class="btnn" href="list.php?mode=QA3" >주문결제 </a>
         <a class="btnn" href="list.php?mode=QA4" >배송관련 </a>
         <a class="btnn" href="list.php?mode=QA5" >포인트 관련 </a>
		 <a class="btnn" href="list.php?mode=QA6" >기타 </a>

		 <div class="clear"></div>

		<div id="list_top_qatitle">
			<ul>
				<li id="list_qatitle1">번호</li>
				<li id="list_qatitle2">분류</li>
				<li id="list_qatitle3">제목</li>
				<li id="list_qatitle4">글쓴이</li>
				<li id="list_qatitle5">등록일</li>
			

			</ul>		
		</div>
		<div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
?>
			<div id="list_item">
				<div id="list_qa1"><?= $number ?></div>
				<div id="list_qa2"> <?= $row[category] ?></div>

				<div id="list_qa3" >
				<a href="view.php?
				table=<?=$table?>&
				num=<?=$item_num?>&
				page=<?=$page?>">
				<?= $item_subject ?>
				</a>
				</div>
				<div id="list_qa4"><?= $item_name ?></div>
				<div id="list_qa5"><?= $item_date ?></div>
				<div id="list_qa6">
			
				<?
				$sql = "select * from system_QA_ripple where parent='$item_num '";
	    $ripple_result = mysql_query($sql);
		$row_bb = mysql_fetch_array($ripple_result);

				?>
				</div>
				
			</div>
<?
   	   $number--;
   }
?>
			<div id="page_button">
				<div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
      $mode = $_GET[mode];
if($mode=="")
{
	  for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='list.php?table=$table&page=$i'> $i </a>";
		}      
   }
}
else
{
if($mode=="list")
{
$search2 = $_GET[search];
}
else if($mode=="search")
{
$search2 = $_POST[search];
}
else if($mode=="QA1")
{
$search2 = '회원가입/정보';
}

else if($mode=="QA2")
{
$search2 = '상품문의';
}

else if($mode=="QA3")
{
$search2 = '주문/결제';
}
else if($mode=="QA4")
{
$search2 = '배송관련';
}

else if($mode=="QA5")
{
$search2 = '포인트 관련';
}
else if($mode=="QA6")
{
$search2 = '기타';
}
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='list.php?table=$table&page=$i&mode=list&find=$find&search=$search2''> $i </a>";
		}      
   }
}
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
				</div>
				<div id="button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>"><img src="../img/list.png"></a>&nbsp;
<? 
	if($id =="admin" )
	{
?>
		<a href="write_form.php?table=<?=$table?>"><img src="../img/wr.png"></a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->
		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>