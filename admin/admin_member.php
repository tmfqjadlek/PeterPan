<? 
	session_start(); 
	$id=$_SESSION['userid'];
	$mode=$_GET[mode];
	$num=$_GET[num];
	$regist_day=$_GET[regist_day];
	$page=$_GET[page];
	$find=$_POST[find];
	$search=$_POST[search];
	$table = "peterpan_member";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/admin_mem.css" rel="stylesheet" type="text/css" media="all">
</head>
<?
	include "../lib/dbconn.php";
	$scale=10;			// 한 화면에 표시되는 글 수

    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     location.href = 'admin_member.php'; 
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $find like '%$search%' order by regist_day desc";
	}
	else
	{
		$sql = "select * from $table order by regist_day desc";
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
<body style="height:1200px;">
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
					<h2 class="title text-center" style="
    margin-top: 20px;
">회원관리</h2>
		<form  name="board_form" method="post" action="admin_member.php?table=<?=$table?>&mode=search"> 
		<div id="list_search">
			<div id="list_search1">▷ 총 <?= $total_record ?> 명의 회원이 존재합니다 </div>
			
			<div id="list_search3">
				<select name="find">
                    <option value='id'>id</option>
                    <option value='name'>name</option>
                    <option value='nick'>nick</option>
				</select></div>
			<div id="list_search4"><input type="text" name="search"></div>
			<div id="list_search5"><input type="image" src="../img/sch.png">
			</div>

			<div id="list_search6"><a href =admin_member.php?mode=ss><img src="../img/admin_sch.png"></a></div>
		</div>
		</form>
		<div class="clear"></div>

		<div id="list_top_title">
			<ul>
				&nbsp;&nbsp;<li id="list_title1">번호</li>
				<li id="list_title2">아이디</li>&nbsp;&nbsp;
				<li id="list_title3">이름</li>&nbsp;&nbsp;
				<li id="list_title5">연락처</li>&nbsp;&nbsp;&nbsp;&nbsp;
				<li id="list_title6">이메일</li>&nbsp;&nbsp;&nbsp;&nbsp;
				<li id="list_title7">가입일</li>&nbsp;&nbsp;&nbsp;&nbsp;
				<li id="list_title8">연락처 수신동의</li>&nbsp;&nbsp;&nbsp;&nbsp; 
				<li id="list_title9">이메일 수신동의</li>&nbsp;&nbsp;
				<li id="list_title10">비고</li>&nbsp;&nbsp;
					
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
	 
	  $mem_num     = $row[num];
	  $mem_id     = $row[id];
	  $mem_pass     = $row[pass];
	  $mem_name = $row[name];
	  $mem_hp     = $row[hp];
	  $mem_email     = $row[email];
	  $mem_item_date     = $row[regist_day];
	  $mem_level     = $row[level];
	  $mem_item_date = substr($mem_item_date, 0, 10);  
	  $num=$row[id];

?>



			<div id="list_item">
				<div id="list_item1"> <?= $row[num] ?></div>
				<div id="list_item2">
				<a href =admin_member.php?mode=<?=$row[id]?>><?= $mem_id ?>
				</a></div>
				<div id="list_item3"><?= $mem_name ?></div>
				<div id="list_item4"><?= $mem_hp ?></div>
				<div id="list_item5"><?= $mem_email ?></div>
				<div id="list_item6"><?= $mem_item_date ?></div>
				
	
		
                	<div id="list_item7">
					
					<? 
					if($row[is_hp] == "y")
	   {
					echo "동의";
	   
	   }
					else
	   {
		 echo "미동의";

	   }
	   ?>
					</div>
						<div id="list_item8"><? 
					if($row[is_email] == "y")
	   {
					echo "동의";
	   
	   }
					else
	   {
		 echo "미동의";


	   }
	 
	   ?></div>

<div id="list_item9"><?
						if($id=="admin")
				            echo "<a href='delete.php?num=$mem_num'>삭제</a>";
					?></div>

			</div>
              

<?
	 
   	   $number--;
   }




 $sql = "select * from $table";
 $resulttt = mysql_query($sql, $connect);

?>
<?

if($mode == ss)
	{
		?>
<div id="hlist_top_title">
			<ul>
			&nbsp;&nbsp;<li id="hlist_title6">번호</li>
				&nbsp;&nbsp;<li id="hlist_title1">아이디</li>
				<li id="hlist_title3"><a href =admin_member.php?mode=bb>포인트</a></li>&nbsp;&nbsp;
				<li id="hlist_title4"><a href =admin_member.php?mode=qq>구매건수</a></li>&nbsp;&nbsp;
				<li id="hlist_title5"><a href =admin_member.php?mode=zz>구매가격</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
			
			</ul>		
	
		</div>
		<?
	}
		
$count =1;

while($rowww = mysql_fetch_array($resulttt))
{

if($mode == ss)
	{

?>
	<div id="hhlist_item">
	<div id="hhlist_item6"> <?= $rowww[num] ?></div>
     <div id="hhlist_item1"><?= $rowww[id] ?></div>
  <div id="hhlist_item3"><?=$rowww[point] ?></div>
    <div id="hhlist_item4"> <?= $rowww[order_count] ?></div>
  <div id="hhlist_item5"><?=  $rowww[order_price] ?></div>
</div>
<?

	}
 $count++;
}




 $sql = "select * from $table  where id =  '$mode'";
 $resultt = mysql_query($sql, $connect);


while($roww = mysql_fetch_array($resultt))
{
	$aa = $roww[id];









if($aa == $mode)
{
?>

<div id="llist_top_title">
			<ul>
			<li id="llist_title1">아이디</li>&nbsp;&nbsp;
				&nbsp;&nbsp;<li id="llist_title6">이름</li>
				
				<li id="llist_title3">포인트</li>&nbsp;&nbsp;
				<li id="llist_title4">구매건수</li>&nbsp;&nbsp;
				<li id="llist_title5">구매가격</li>&nbsp;&nbsp;&nbsp;&nbsp;
			
			</ul>		
		</div>
<div id="llist_item">
<div id="llist_item1"> <?= $roww[id] ?></div>
 <div id="llist_item6"> <?= $roww[name] ?></div>
	   <div id="llist_item3"> <?= $roww[point] ?></div>
	   <div id="llist_item4"> <?= $roww[order_count] ?></div>
	   <div id="llist_item5"> <?= $roww[order_price] ?></div>
	   </div>
<?
}
}
?>
<?
	 $sql = "select * from $table  order by point DESC  ";
	  $resulta = mysql_query($sql, $connect);


if($mode == bb)
	{
		?>
<div id="hlist_top_title">
			<ul>
			&nbsp;&nbsp;<li id="hlist_title6">번호</li>
				&nbsp;&nbsp;<li id="hlist_title1">아이디</li>
				<li id="hlist_title3"><a href =admin_member.php?mode=bb>포인트</a></li>&nbsp;&nbsp;
				<li id="hlist_title4"><a href =admin_member.php?mode=qq>구매건수</a></li>&nbsp;&nbsp;
				<li id="hlist_title5"><a href =admin_member.php?mode=zz>구매가격</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
			
			</ul>		
	
		</div>
		<?
	}
		
$count =1;

while($rowa = mysql_fetch_array($resulta))
{

if($mode == bb)
	{

?>
	<div id="hhlist_item">
	<div id="hhlist_item6"> <?= $rowa[num] ?></div>
     <div id="hhlist_item1"><?= $rowa[id] ?></div>
  <div id="hhlist_item3"><?=$rowa[point] ?></div>
    <div id="hhlist_item4"> <?= $rowa[order_count] ?></div>
  <div id="hhlist_item5"><?=  number_format($rowa[order_price] ) ?></div>
</div>
<?

	}
 $count++;
}

	 $sql = "select * from $table  order by order_count DESC  ";
	  $resultaa = mysql_query($sql, $connect);


if($mode == qq)
	{
		?>
<div id="hlist_top_title">
			<ul>
			&nbsp;&nbsp;<li id="hlist_title6">번호</li>
				&nbsp;&nbsp;<li id="hlist_title1">아이디</li>
				<li id="hlist_title3"><a href =admin_member.php?mode=bb>포인트</a></li>&nbsp;&nbsp;
				<li id="hlist_title4"><a href =admin_member.php?mode=qq>구매건수</a></li>&nbsp;&nbsp;
				<li id="hlist_title5"><a href =admin_member.php?mode=zz>구매가격</a></a></li>&nbsp;&nbsp;&nbsp;&nbsp;
			
			</ul>		
	
		</div>
		<?
	}
		
$count =1;

while($rowaa = mysql_fetch_array($resultaa))
{

if($mode == qq)
	{

?>
	<div id="hhlist_item">
	<div id="hhlist_item6"> <?= $rowaa[num] ?></div>
     <div id="hhlist_item1"><?= $rowaa[id] ?></div>
  <div id="hhlist_item3"><?=$rowaa[point] ?></div>
    <div id="hhlist_item4"> <?= $rowaa[order_count] ?></div>
  <div id="hhlist_item5"><?=  number_format($rowaa[order_price] ) ?></div>
</div>
<?

	}
 $count++;
}

	 $sql = "select * from $table  order by order_price DESC  ";
	  $resultaaa = mysql_query($sql, $connect);


if($mode == zz)
	{
		?>
<div id="hlist_top_title">
			<ul>
			&nbsp;&nbsp;<li id="hlist_title6">번호</li>
				&nbsp;&nbsp;<li id="hlist_title1">아이디</li>
				<li id="hlist_title3"><a href =admin_member.php?mode=bb>포인트</a></li>&nbsp;&nbsp;
				<li id="hlist_title4"><a href =admin_member.php?mode=qq>구매건수</a></li>&nbsp;&nbsp;
				<li id="hlist_title5"><a href =admin_member.php?mode=zz>구매가격</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
			
			</ul>		
	
		</div>
		<?
	}
		
$count =1;

while($rowaaa = mysql_fetch_array($resultaaa))
{

if($mode == zz)
	{

?>
	<div id="hhlist_item">
	<div id="hhlist_item6"> <?= $rowaaa[num] ?></div>
     <div id="hhlist_item1"><?= $rowaaa[id] ?></div>
  <div id="hhlist_item3"><?=$rowaaa[point] ?></div>
    <div id="hhlist_item4"> <?= $rowaaa[order_count] ?></div>
  <div id="hhlist_item5"><?=  number_format($rowaaa[order_price] ) ?></div>
</div>
<?

	}
 $count++;
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
			echo "<a href='admin_member.php?table=$table&page=$i'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
				</div>
				<div id="button">
					<a href="admin_member.php?table=<?=$table?>&page=<?=$page?>"><img src="../img/list.png"></a>&nbsp;

				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->
		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
