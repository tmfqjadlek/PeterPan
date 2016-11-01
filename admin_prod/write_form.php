
<? 
	session_start(); 
	$table = "peterpan_product";
	$id=$_SESSION['id'];
	$num=$_GET[num];
	$mode=$_GET[mode];


	
	include "../lib/dbconn.php";

	if ($mode=="modify")
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);
		
		$row = mysql_fetch_array($result); 

		$model     = $row[model];
		$item_pro_name     = $row[name];
		$pro_category = explode("/", $row[category]);
		$item_user = $pro_category[0];
		$item_f_category = $pro_category[1];
		if($item_f_category=="커피"){
		$item_s_category1 = $pro_category[2];
		}
		else{
		$item_s_category2 = $pro_category[2];
		}
		$item_manufacture     = $row[manufacture];
		$item_pro_content     = $row[pro_content];
		$item_pro_price     = $row[price];
		$item_pro_count     = $row[count];
		$item_pro_point     = $row[point];
		$item_pro_sale		= $row[sale];
		$item_manufacture_day     = $row[manufacture_day];




		//$item_file_pro = $row[file_name_pro];
		
		//$copied_file_pro = $row[file_copied_pro];
		
		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/admin_pro.css" rel="stylesheet" type="text/css" media="all">
<style>
	#write_row7_2{
		display:none;
	}
</style>
<script>
  function check_input()
   {
      if (!document.board_form.pro_id.value)
      {
          alert("상품코드를 입력하세요!");    
          document.board_form.pro_id.focus();
          return;
      }
	 

      document.board_form.submit();
   }
</script>

</head>

<body>

    <? include "../menu/top_menu2.php"; ?>

    <? include "../menu/main_meun2.php"; ?>

	<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 padding-right">
				<div class="features_items">      
					<h2 class="title text-center">상품 등록</h2>

<?
	if($mode=="modify")
	{

?>
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
	else
	{
?>
		<form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
?>
		<div class="write_line"></div>
			<div id="write_row1"><div class="col1"> 모델명   </div>
			                     <div class="col2"><input type="text" name="pro_id" value="<?=$model?>"></input></div>
		</div>

		<div class="write_line"></div>
			<div id="write_row2"><div class="col1"> 상품명   </div>
			                     <div class="col2"><input type="text" name="pro_name" value="<?=$item_pro_name?>"></input></div>
		</div>

	
		
		<div id="write_form">
	
		<div class='write_line' ></div>
		<div id='write_row3'><div class='col1' > 카테고리 </div>
								 <div class='col2'>
								 <select id="write_row7_1" name="s_category1" style="height:28px;">
								<!--<div id="a a"></div>-->
							
					<option value="<?=$item_s_category1='피규어'?>">피규어</option>
					<option value="<?=$item_s_category1='커스텀피규어'?>">커스텀피규어 </option>
					<option value="<?=$item_s_category1='다이캐스터'?>">다이캐스터</option>
					<option value="<?=$item_s_category1='나노블럭'?>">나노블럭</option>
					<option value="<?=$item_s_category1='레고'?>">레고</option>


						<option value="<?=$item_s_category1='RC'?>">RC</option>
							<option value="<?=$item_s_category1='드론'?>">드론</option>
								<option value="<?=$item_s_category1='보드게임'?>">보드게임</option>
									<option value="<?=$item_s_category1='인형'?>">인형</option>
									<option value="<?=$item_s_category1='영화'?>">영화</option>
									<option value="<?=$item_s_category1='애니메이션'?>">애니메이션</option>
										<option value="<?=$item_s_category1='기타'?>">기타</option>
						</select>		
		</div>
		</div>
	



			<div id="write_row4"><div class="col1" > 수량   </div>
			                     <div class="col2"><input type="text" name="pro_count" value="<?=$item_pro_count?>"></input></div>
			</div>

			<div id="write_row5"><div class="col1" > 가격   </div>
			                     <div class="col2"><input type="text" name="pro_price" value="<?=$item_pro_price?>"></input></div>
			</div>
			<div class="write_line"></div>

			<div id="write_row6"><div class="col1"> 세일   </div>
			                     <div class="col2"><input type="text" name="pro_sale" value="<?=$item_pro_sale?>%"></input></div>
			</div>
			<div id="write_row7"><div class="col1"> 포인트   </div>
			                     <div class="col2"><input type="text" name="pro_point" value="<?=$item_pro_point?>"></input></div>
			</div>
			

	<div class="write_line"></div>
			<div id="write_row8" ><div class="col1" style="width:127px;"> 내용   </div>
			                     <div class="col2" style="margin-top:30px;margin-left:-122px;"><textarea rows="15" cols="79" name="pro_content"><?=$item_pro_content?></textarea></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row9" ><div class="col1" style="width:127px;"> 썸네일이미지   </div>
			                     <div class="col2" ><input type="file" name="upfile[]" value="<?=$item_file_[0]?>"></div>
			</div>
			<div class="clear"></div>
<? 	if ($mode=="modify" && $item_file_0)
	{
?>
			<div class="delete_ok" style="margin-left:377px;margin-top:-25px;"><?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제</div>
			<div class="clear"></div>
<?
	}
?>
			<div class="write_line"></div>
			<div id="write_row14" style="margin-top:-30px;"><div class="col1"> 제품이미지  </div>
			                     <div class="col2" ><input type="file" name="upfile[]"></div>
			</div>
<? 	if ($mode=="modify" && $item_file_1)
	{
?>
			<div class="delete_ok" style="width:700px;"><?=$item_file_1?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="1" > 삭제</div>
			<div class="clear"></div>
<?
	}
?>
			<div class="write_line"></div>
			<div class="clear"></div>
			<div id="write_row15" style="margin-top:-30px;"><div class="col1"> 택배이미지   </div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
			</div>
<? 	if ($mode=="modify" && $item_file_2)
	{
?>
			<div class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="2"> 삭제</div>
			<div class="clear"></div>
<?
	}
?>
			<div class="write_line"></div>

			<div class="clear"></div>
		</div>

		<div id="write_button"><a href="#"><img src="../img/wr.png" onclick="check_input()"></a>&nbsp;
								<a href="list.php?table=<?=$table?>&page=<?=$page?>"><img src="../img/list.png"></a>
		</div>

		</form>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->


</body>
</html>
