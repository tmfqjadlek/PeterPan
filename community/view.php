<? 
	session_start(); 
		$table = "peterpan_review";
	$id = $_SESSION['userid'];
	$num = $_GET[num];
	include "../lib/dbconn.php";

	$sql = "select * from $table where num='$num'";
	$result = mysql_query($sql, $connect);
    $row = mysql_fetch_array($result);       
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
	$item_hit     = $row[hit];
    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);
	$item_content = $row[content];
	$is_html      = $row[is_html];
	

	$image_name[0]   = $row[file_name_0];
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];


	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];
	

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}


	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i]) 
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);

			$image_width[$i] = $imageinfo[0];
			$image_height[$i] = $imageinfo[1];
			$image_type[$i]  = $imageinfo[2];

			if ($image_width[$i] > 785)
				$image_width[$i] = 785;
		}
		else
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}





	$new_hit = $item_hit + 1;
	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/qna.css" rel="stylesheet" type="text/css" media="all">
<script>
    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }

		
    }
	  function check_input()
    {

		document.ripple_form.submit();
    }
</script>
</script>
</head>

<body style="height:1200px;">

    <? include "../menu/top_menu2.php"; ?>
	
    <? include "../menu/main_meun2.php"; ?>


 <section>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 padding-right">
				<div class="features_items">      
					<h2 class="title text-center">후기게시판</h2>

		<div id="view_comment"> &nbsp;</div>

		<div id="view_title">
			<div id="view_title1"><?= $item_subject ?></div><div id="view_title2"><?= $item_name ?> | 조회 : <?= $item_hit ?>  
			                      | <?= $item_date ?> </div>	
		</div>

		<div id="view_content">

		<?
	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];
			$img_name = "./data/".$img_name;
			$img_width = $image_width[$i];
			
			echo "<img src='$img_name' width='$img_width'>"."<br><br>";
		}
	}
?>

			<?= $item_content ?>
		</div>





		<div id="view_button">
				<a href="list.php?table=<?=$table?>&page=<?=$page?>"><img src="../img/list.png"  ></a>&nbsp;
<? 
	if($id && ($id==$item_id))
	{
?>
				<a href="modify_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>"><img src="../img/modify.png" style="margin-left:0px;"></a>&nbsp;
	
<?
	}
?>
<? 
	if($id && ($id==$item_id)  ||$id=="admin")
	{
?>

				<a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')"><img src="../img/delete.png" style="margin-left:0px;"></a>&nbsp;
<?
	}
?>
<? 
	if($id)
	{
?>
				
				<a href="write_form.php?table=<?=$table?>"><img src="../img/wr.png" style="margin-left:0px;"></a>
<?
	}
?>
<? 
	if($id=="admin")
	{
?>
				<a href="write_form.php?table=<?=$table?>&mode=response&num=<?=$num?>&page=<?=$page?>"><img src="../img/dap.png" style="margin-left:0px;"></a>&nbsp;
		
<?
	}
?>


		</div>
		<div class="clear"></div>

		<div id="ripple">
<?
	    $sql = "select * from peterpan_review_ripple where parent='$item_num'";
	    $ripple_result = mysql_query($sql);

		while ($row_ripple = mysql_fetch_array($ripple_result))
		{
			$ripple_num     = $row_ripple[num];
			$ripple_id      = $row_ripple[id];
			$ripple_name    = $row_ripple[name];
			$ripple_content = str_replace("\n", "<br>", $row_ripple[content]);
			$ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
			$ripple_date    = $row_ripple[regist_day];
?>
			<div id="ripple_writer_title">
			<ul>
			<li id="writer_title1"><?=$ripple_name?></li>
			<li id="writer_title2"><?=$ripple_date?></li>
			<li id="writer_title3"> 
		      <? 
					if($id=="admin" || $id==$ripple_id)
			          echo "<a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num'>[삭제]</a>"; 
			  ?>
			</li>
			</ul>
			</div>
			<div id="ripple_content"><?=$ripple_content?></div>
			<div class="hor_line_ripple"></div>
<?
		}
?>			
			<form  name="ripple_form" method="post" action="insert_ripple.php?table=<?=$table?>&num=<?=$item_num?>">  
			<div id="ripple_box">
				<div id="ripple_box1">덧글</div>
				<div id="ripple_box2"><textarea rows="4" cols="80" name="ripple_content"></textarea>
				</div>
				<div id="ripple_box3"><a href="#"><img src="../img/save.png"  onclick="check_input()"></a></div>
			</div>
			</form>
		</div> <!-- end of ripple -->

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
