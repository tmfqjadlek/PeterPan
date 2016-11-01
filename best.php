
<? 
//making by Dabin
$table = " peterpan_product";

include "./lib/dbconn.php";


   
$sql = "select * from $table ORDER BY hit  DESC LIMIT 3 ";


	$result = mysql_query($sql, $connect);
	

	
?>

<!--	<div class="col-sm-9 padding-right" style="width:300px;height:413px;position:relative;">
				<div class="features_items" style="float:left;margin-left:300px;">-->
<div class=" container">
						<h2 class="title text-center" >Best Items</h2>
						<?

 while($row = mysql_fetch_array($result))

{

	$pro_name     = $row[name];

			$encoding = "euc-kr";
		$charNumber = "30";
		$subject = $pro_name;
		$cutExec = mb_strimwidth($subject, 0, $charNumber, "...", $encoding);

	?>		
					<div class="col-sm-4" style="position:relative;float:left;width:300px;height:385px;margin-left:60px;">
						<div class="product-image-wrapper" >
							<div class="single-products" >
								<div class="productinfo text-center" >

									<a href="./prod/view.php?num=<?=$row[num]?>" ><img src =./admin_prod/data/<?=$row[file_copied_0]?> width="150"></a>
										<h2><a href="./prod/view.php?num=<?=$row[num]?>"><?=number_format($row[price])?>¿ø</a></h2>
										<p><a href="./prod/view.php?num=<?=$row[num]?>"><?=$cutExec?></a></p>
									<a href="main_cart.php?model=<?=$row[model]?>&price=<?=$row[price]?>"  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Àå¹Ù±¸´Ï¿¡ ´ã±â</a>
								</div>
							</div>
						</div>	
					</div>
		
		
	<?	
		}
	?>

</div>
