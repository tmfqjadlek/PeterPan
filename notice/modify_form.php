<? 
	session_start(); 
		$num = $_GET[num];
	include "../lib/dbconn.php";
	$table = "peterpan_notice";


	$sql = "select * from $table where num='$num'";
	$result = mysql_query($sql, $connect);

	$row = mysql_fetch_array($result);       	
	$item_subject     = $row[subject];
	$item_content     = $row[content];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/greet.css" rel="stylesheet" type="text/css" media="all">
</head>

<body>

	<? include "../menu/top_menu2.php"; ?>

    <? include "../menu/main_meun2.php"; ?>

 <section>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 padding-right">
				<div class="features_items">      
					<h2 class="title text-center">공지사항</h2>
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>"> 
		<div id="write_form">
			<div class="write_line"></div>
			
				
		
			<div class="write_line"></div>
			<div id="write_row2"><div class="col1"> 제목   </div>
			                     <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row3" style="height:277px;"><div class="col1" style="height:275px;"> 내용   </div>
			                     <div class="col2"><textarea rows="15" cols="79" name="content" style="background-color:#FFFFFF"><?=$item_content?></textarea></div>
			</div>
			<div class="write_line"></div>
		</div>

		<div id="write_button"><input type="image" src="../img/save.png">&nbsp;
								<a href="list.php?page=<?=$page?>"><img src="../img/list.png"
								style="margin-top:-28px;"></a>
		</div>
		</form>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>