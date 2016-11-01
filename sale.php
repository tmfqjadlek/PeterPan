
<html>
<body>

<? 
$table = " peterpan_product";

include "./lib/dbconn.php";



$sql = "select * from $table where sale != 0    ORDER BY hit  DESC LIMIT 3 ";

	
	$result = mysql_query($sql, $connect);
	
		$encoding = "euc-kr";
		$charNumber = "20";
		$subject = $pro_name;
		$cutExec = mb_strimwidth($subject, 0, $charNumber, "...", $encoding);
	
?>
<!--<div class="col-sm-9 padding-right">
					<div class="features_items">-->
<div class=" container">
	<h2 class="title text-center">SALE Items</h2>
													<?
		 while($row = mysql_fetch_array($result))

		{
			$sale="0.$row[sale]";
			$pro_name     = $row[name];

			$encoding = "euc-kr";
		$charNumber = "30";
		$subject = $pro_name;
		$cutExec = mb_strimwidth($subject, 0, $charNumber, "...", $encoding);

			?>
							<div class="col-sm-4" style="position:relative;float:left;width:300px;margin-left:60px;">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
												<a href="./prod/view.php?num=<?=$row[num]?>"><img src =./admin_prod/data/<?=$row[file_copied_0]?> width="150"></a>
												<h2><a href="./prod/view.php?num=<?=$row[num]?>"><?=number_format($row[price])?>원</a><?=$row[sale]?>%</h2>
												<p><a href="./prod/view.php?num=<?=$row[num]?>"><?=$cutExec?></a></p>
												<a href="main_cart.php?model=<?=$row[model]?>&price=<?=$row[price]?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>장바구니에 담기</a>
											</div>
										</div>	
									</div>
								</div>
						
			<?	
				}
			?>
</div>			