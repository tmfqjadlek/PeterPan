<? 
	session_start(); 
	$id=$_SESSION['id'];
	$mode=$_GET[mode];
	$num=$_GET[num];
	$page=$_GET[page];
	$find=$_GET[find];
	$search=$_GET[search];
	$table = "peterpan_product";
	$_SESSION['num']=$item_num;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/admin_pro.css" rel="stylesheet" type="text/css" media="all">

</head>

<?
	include "../lib/dbconn.php";
	$scale=10;			// 한 화면에 표시되는 글 수
	
  if ($search)
	{
		

		$sql = "select * from peterpan_product where $find like '%$search%' order by num desc";

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
					<h2 class="title text-center"style="
    margin-top: 20px;
">상품관리</h2>
		<form  name="board_form" method="GET" action="list.php"> 
		<div id="list_search">
			<div id="list_search1">▷ 총 <?= $total_record ?> 개의 상품이 있습니다.  </div>
			<div id="list_search3">
				<select name="find">
                    <option value='category'>카테고리</option>
                    <option value='name'>제품명</option>
                 
				</select></div>
			<div id="list_search4"><input type="text" name="search"></div>
			<div id="list_search5"><input type="image" src="../img/sch.png"></div>
		</div>
		</form>
		<div class="clear"></div>

		<div id="list_top_titles">
			<ul>
				<li id="list_title1s">번호</li>
				<li id="list_title2s">제품사진</li>
				<li id="list_title3s">제품명</li>
				<li id="list_title4s">카테고리</li>
				<li id="list_title5s">수량</li>
				<li id="list_title6s">가격</li>
				<li id="list_title7s">세일</li>
			
				<li id="list_title9s">판매량</li>
		
				<li id="list_title11s">조회수</li>
						<li id="list_title10s">등록일</li>

						<li id="list_title10s">비고</li>
			</ul>		
		</div>

		<div id="list_contents">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	  
	  $item_num     = $row[num];
	  $item_pro_id     = $row[model];
	  $item_pro_name     = $row[name];
	  $item_pro_brand = $row[category];
	

	
	  $item_pro_content     = $row[count];
	  $item_pro_price     = $row[price];
	  $item_pro_count     = $row[sale];
	  $item_pro_point     = $row[point];
	  $item_pro_sale     = $row[pro_sale];

	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	    $encoding = "euc-kr";
		$charNumber = "20";
		$subject = $item_pro_name;
		$cutExec = mb_strimwidth($subject, 0, $charNumber, "...", $encoding);
?>



			<div id="list_itemss">
			<div id="list_items2" style="margin-top:30px;margin-left:60px;">
			<?

			
	$image_name[0]   = $row[file_name_0];
		$image_copied[0] = $row[file_copied_0];
		$imageinfo = GetImageSize("./data/".$image_copied[0]);
		$image_width[0] = $imageinfo[0];
			$image_height[0] = $imageinfo[1];
			$image_type[0]  = $imageinfo[2];
		$img_name = $image_copied[0];
			$img_name = "./data/".$img_name;
			$img_width = $image_width[0];
				
			


			
			echo "<img src='$img_name' width='50'>"."<br><br>";
		?></div>
				
				<div id="list_items1"><?= $number ?></div>
			
				<div id="list_items4" style="margin-top:30px;"><a href="write_form.php?mode=modify&num=<?=$item_num?>&page=<?=$page?>&table=<?=$table?>"><?= $cutExec ?></a></div>
				
				<div id="list_items5"><?= $row[category] ?></div>
			
			
				<div id="list_items7"><?=  $row[count] ?></div>
				<div id="list_items8"><?= number_format($row[price]) ?></div>
				<div id="list_items9"><?=  $row[sale]?></div>
				<div id="list_items10"><?=  $row[product]?></div>
				<div id="list_items11"><?= $item_hit ?></div>
				<div id="list_items12"><?= $item_date ?></div>
				
				<div id="list_items13">
				<? 
						if($id=="admin")
				            echo "<a href='delete.php?num=$item_num?'>삭제</a>";
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
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
				</div>
				<div id="button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>"><img src="../img/list.png"></a>&nbsp;
<? 
	if($id)
	{
?>
		<a href="write_form.php?table=<?=$table?>"><img src="../img/save.png"></a>
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
