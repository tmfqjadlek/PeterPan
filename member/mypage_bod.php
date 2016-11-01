<? 
	session_start(); 

			$page= $_GET[page];
			$page= $_GET[page];
	$id = $_SESSION['userid'];
	$table=$_GET[table];
	


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/admin_bod.css" rel="stylesheet" type="text/css" media="all">
</head>
<?
	include "../lib/dbconn.php";
	$scale=10;			// 한 화면에 표시되는 글 수

$mode = $_GET[mode];
if($mode=="mypage_bod")
{
 $search = $_GET[search];
 $find=$_GET[find];
}
else if($mode=="search")
{
 $search = $_POST[search];
 $find=$_POST[find];
}

    if ($mode=="search" || $mode=="mypage_bod")
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
	
$sql = "select * from peterpan_review where  $find like '%$search%' where id = '$id'";

	}
	else if($mode== "board1"){
		$sql = "SELECT * FROM peterpan_review where id = '$id'";
		$table = "peterpan_review";
		$tablesa = "community";
	}
	else if($mode== "board2"){
		$sql = "SELECT * FROM peterpan_QNA where id = '$id'";
			$table = "peterpan_QNA";
			$tablesa = "QnA";
	}
	else if($mode== "board3"){
		$sql = "SELECT * FROM peterpan_FAQ where id = '$id'";
			$table = "peterpan_FAQ";
			$tablesa = "FAQ";
	}
		else if($mode== "board4"){
		$sql = "SELECT * FROM peterpan_plan where id = '$id'";
			$table = "peterpan_plan";
			$tablesa = "plan";
	}
			else if($mode== "board5"){
		$sql = "SELECT * FROM peterpan_notice where id = '$id'";
			$table = "peterpan_notice";
			$tablesa = "notice";
	}

		else
	{
		$sql = "select * from peterpan_review where id = '$id'";
		$tablesa = "community";
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
<!-- 첫번째 상단 메뉴 -->
    <? include "../menu/top_menu2.php"; ?>
<!-- 두번쨰 상단 메뉴 -->
    <? include "../menu/main_meun2.php"; ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 padding-right">
				<div class="features_items">      
					<h2 class="title text-center"style="
    margin-top: 20px;
">내가 쓴 글</h2>
		<form  name="board_form" method="post" action="mypage_bod.php?&mode=search"> 
		<div id="list_search">
			<div id="list_search1">▷ 총 <?= $total_record ?> 개의 게시글가 있습니다.  </div>
			<div id="list_search2"></div>
			<div id="list_search3">
				<select name="find">
                    <option value='subject'>제목</option>
                    <option value='content'>내용</option>
                    <option value='nick'>글쓴이</option>
                
				</select></div>
			<div id="list_search4"><input type="text" name="search"></div>
			<div id="list_search5"><input type="image"  src="../img/sch.png"></div>
		</div>
		</form>
		</div>
		<a class="btnn" href ="mypage_bod.php?mode=board4" >키덜트 행사 </a> &nbsp;
				<a class="btnn" href ="mypage_bod.php?mode=board5" >공지사항 </a> &nbsp;
		<a class="btnn" href ="mypage_bod.php?mode=board1" >후기 게시판 </a>
		&nbsp; 
		<a class="btnn" href ="mypage_bod.php?mode=board2" >QnA </a>
		&nbsp; 
		<a class="btnn" href ="mypage_bod.php?mode=board3" >FaQ </a>
		&nbsp; 
		<!--<a href ="list.php?mode=board4">상품별 qna  </a>-->




		<div class="clear"></div>

		<div id="list_top_qatitle">
			<ul>
				<li id="list_qatitle1">번호</li>
				<li id="list_qatitle2">제목</li>
				<li id="list_qatitle3">글쓴이</li>
				<li id="list_qatitle4">등록일</li>

			</ul>		
		</div>

		<div id="list_content" style="hegiht:35px;">
<?		
$mode=$_GET[mode];
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10); 

	  if($mode== "board7")
	   {
		  $item_subject    = str_replace(" ", "&nbsp;", $row[content]);
	   }
	  else{
		$item_subject = str_replace(" ", "&nbsp;", $row[subject]);
	  }
	  	 $encoding = "euc-kr";
		$charNumber = "60";
		$subject = $item_subject;
		$cutExec = mb_strimwidth($subject, 0, $charNumber, "...", $encoding);
?>
			<div id="list_qitem">
				<div id="list_qa1"><?= $number ?></div>

				<div id="list_qa2"><a href="../<?=$tablesa?>/view.php?table=<?=$_GET[table]?>&num=<?=$item_num?>&page=<?=$page?>"><?= $cutExec ?></a></div>
				<div id="list_qa3"><?= $item_name ?></div>
				<div id="list_qa4"><?= $item_date ?></div>
				<?
				if($mode=="board7")
				{
					?>
				<div id="list_qa5">
			
				<?}
				else
				{
?>
				<?
				}				
?>
				
			</div>
<?
   	   $number--;
   }
?>
			<div id="page_button">
				<div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   $mode = $_GET[mode];
$search = $_GET[search];
if($mode=="" || $mode=="board1" || $mode=="board2" || $mode=="board3" || $mode=="board4"|| $mode=="board5")
{
	  for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='mypage_bod.php?table=$table&page=$i&mode=$mode'> $i </a>";
		}      
   }
}
else
{
if($mode=="mypage_bod")
{
$search2 = $_GET[search];
}
else if($mode=="search")
{
$search2 = $_POST[search];
}

   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			if($mode=="board1")
			{
			$search2 = $_GET[search];
			echo "<a href='mypage_bod.php?table=$table&page=$i&mode=board1&find=$find&search=$search2'> $i </a>";
			}
			else if($mode=="board2")
			{
			$search2 = $_GET[search];
			echo "<a href='mypage_bod.php?table=$table&page=$i&mode=board2&find=$find&search=$search2'> $i </a>";
			}
			else if($mode=="board3")
			{
			$search2 = $_GET[search];
			echo "<a href='mypage_bod.php?table=$table&page=$i&mode=board3&find=$find&search=$search2'> $i </a>";
			}
			/*else if($mode=="board4")
			{
			$search2 = $_GET[search];
			echo "<a href='list.php?table=$table&page=$i&mode=board4&find=$find&search=$search2'> $i </a>";
			}
			else
			{
			echo "<a href='list.php?table=$table&page=$i&mode=list&find=$find&search=$search2'> $i </a>";
			}*/
		}      
   }
}
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
				
				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->
		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
