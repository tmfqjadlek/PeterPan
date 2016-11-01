<?
session_start();
 $view_arr = explode(",",$_COOKIE['goods_view']); 
if( array_search($_GET['Code'], $view_arr) === false) 
{ 
    setcookie("goods_view", $_COOKIE['goods_view'].",".$_GET['Code'].",".$_GET['CatNo'],time() + 86400,"/"); 
} 
?> 
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/concert.css" rel="stylesheet" type="text/css" media="all">

	<?

	$num=$_GET[num];
include "../lib/dbconn.php";
	
			


	$sql = "select * from peterpan_product where num=$num";



	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);  
	
	$prodnum=$row[num];
	$_SESSION['num']=$prodnum;

	if($prodnum == null)
	{
		$_SESSION['num1']=$prodnum;
	}

		

      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_pro_id     = $row[model];
	$item_pro_name     = $row[name];
	/*$item_pro_brand = $row[pro_brand];*/
	$item_pro_category = $row[category];
	  /*$pro_category = explode("/", $row[pro_category]);
	  $item_user = $pro_category[0];
	  $item_f_category = $pro_category[1];

	  $item_s_category = $pro_category[2];*/
	/*$item_manufacture     = $row[manufacture];*/
	$item_pro_content     = $row[content];
	$item_pro_price     = $row[price];
	$item_pro_count     = $row[count];
	$item_pro_point     = $row[point];
/*	$item_pro_manufacture_day     = $row[pro_manufacture_day];  */
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0];
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];


	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];


	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}
	
	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i]) 
		{
			$imageinfo = GetImageSize("../admin_prod/data/".$image_copied[$i]);

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

	$sql = "update peterpan_product set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>

	<? include "../menu/top_menu2.php"; ?>
<!-- 두번쨰 상단 메뉴 -->
    <? include "../menu/main_meun2.php"; ?>

 

	<section>
		<div class="container">
<!--<?include "../lib/todayview.asp";?>-->
	<form  name="itemForm" method="post" action="cart_save.php" enctype="multipart/form-data"> 
	<input type="hidden" name="mode" value="">
	<input type="hidden" name="page" value="<?=$page?>">
	<input type="hidden" name="i_idx" value="<?=$item_pro_id?>">
<input type="hidden" name="num" value="<?=$num?>">
	<input type="hidden" name="price" value="<?=$item_pro_price?>">

 <div class="col-sm-9 padding-right"style="margin-left:100px;">
	<div class="product-details"><!--product-details-->
		<div class="col-sm-5">
			<div class="view-product">

			<? $img_name = $image_copied[0];
			$img_name = "../admin_prod/data/".$img_name;
			$img_width = $image_width[0];?>
			<!-- <div style="margin-left:-200px;"> -->
			
			<?echo "<img src='$img_name'>"."<br><br>";
			?>
			</div>
			</div>


		<div class="col-sm-7" >
							<div class="product-information"style="
    padding-top: 30px;
    padding-bottom: 20px;
"><!--/product-information-->	
							<div id="intro1"><?= $number ?></div>
								<h2>상품명 : <?= $item_pro_name ?></h2>
								<p>카테고리 : <?= $item_pro_category ?></p>
								<span>
									<span><?= number_format($item_pro_price) ?>원</span>
								</span>
									<p>적릭금 : <?= number_format($item_pro_point) ?></p>
									<p><label>구매 수량 : </label>
									<input type="number" name="cart_count" onChange="caluate_item();" style="width:54px;" value="1">개</p>
       
	
									<p><label>총가격 : &nbsp;&nbsp;&nbsp;&nbsp;</label>
									<input type="text" name="cart_price" size="18"  style="width:104px;" value="<?=$item_pro_price?>" readOnly>원</p>
									<button type="button" class="btn btn-fefault cart" onClick="cart_save('cart');">
										
										장바구니
									</button>
									<button type="button" class="btn btn-fefault cart" onClick="cart_save('direct');">
									
										바로구매 
									</button>
									<button type="button" class="btn btn-fefault cart" onClick="location.href='prod_list.php?table=<?=$table?>&page=<?=$page?>';">
										
										목록
									</button>
							
								<p><b>등록일:</b> <?= $item_date ?></p>
								<p><b>조회수:</b> <?= $item_hit ?></p>
								<p><b>브랜드:</b> PETERPAN</p>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->

		<div id="intro14"><?= $item_pro_content ?></div>
<?
	for ($i=1; $i<3; $i++)
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];
			$img_name = "../admin_prod/data/".$img_name;
			$img_width = $image_width[$i];
			
			echo "<img src='$img_name' width='$img_width'>"."<br><br>";
		}
	}
?>
			<?= $item_content ?>
		</div>

<!--onClick="cart_save('direct');"-->
		</form>
		<script>
// 수량 검사 밑 총 가격 만드는 함수
function caluate_item()
{
    var f = document.itemForm;
    var cnt_obj = f.cart_count;    // 수량

    if(cnt_obj.value == ""){
        alert("구매수량을 입력해 주세요.");
        return false;
    }

	else if(cnt_obj.value == "0"){
        alert("구매수량을 정상적으로 입력해주세요.");
        return false;
    }
	
	
	
	else{
        // 숫자인지 검사
        for (var i = 0; i < cnt_obj.value.length; i++){

            if (cnt_obj.value.charAt(i) < '0' || cnt_obj.value.charAt(i) > '9'){ 
                alert("구매수량을 정상적으로 입력해주세요.");
                return false;
            }
        }
    }

    // 수량과 가격을 곱해 총가격은 만듬
    var price = parseInt(f.price.value) * parseInt(cnt_obj.value);

    f.cart_price.value = price;

    return true;
}

// 입력필드 검사함수
function cart_save(arg)
{
    // form 을 f 에 지정
    var f = document.itemForm;

    // 수량검사 후 장바구니담기인지 바로구매인지 값을 mode 에 저장 후 서브밋
    if(caluate_item()){
        f.mode.value = arg
        f.submit();
    }

}
</script>


		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->


				</div>
			</div>
		</div>
	</section>
	<footer id="footer"><!--Footer-->	
		<div class="footer-widget" style="margin-bottom:0px; margin-top:20px;">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li>고객은 안전거래를 위해 현금 등으로 결제시</li>
								<li>저희 쇼핑몰에서 가입한 구매안전 서비스</li>
								<li>(소비자피해 보상보험 서비스)를 이용하실 수 있습니다.</li>
								
							</ul>
							<h2>PETERPAN</h2>
							<ul class="nav nav-pills nav-stacked">
								<li>[426-701] 안산시 상록구 안산대로 155 진리관</li>
								<li>대표자:김민지 사업자등록번호:211-11-01010</li>
								<li>개인정보 보호 및 청소년 보호책임자:김민지</li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">피규어</a></li>
								<li><a href="#">나노블럭</a></li>
								<li><a href="#">드론</a></li>
								<li><a href="#">인형</a></li>
								<li><a href="#">레고블럭</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">이용약관</a></li>
								<li><a href="#">Privecy 정책</a></li>
								<li><a href="#">환불정책</a></li>
								<li><a href="#">결제시스템</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>PRODUCT</h2>
							<ul class="nav nav-pills nav-stacked">
								<li>평일 9 : 00 ~ 18 : 00 / 점심시간 12 : 00 ~ 13 : 00</li>
								<li>주말 및 공휴일은 1:1문의하기를 이용해주세요.</li>
								<li>업무가 시작되면 바로 처리해드립니다.</li>
								<li><a href="#">zmfdls@peterpan.co.kr</a></li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row" style="margin-top:20px;">
					<p class="pull-left">Copyright ⓒ 2016 PETERPAN Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a href="#">Themeum</a></span></p>
				</div>
			</div>
		</div>
	</footer><!--/Footer-->