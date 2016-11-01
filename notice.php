
<? 

$table = "peterpan_notice";

include "./lib/dbconn.php";



$sql = "select * from $table ORDER BY regist_day  DESC LIMIT 5 ";


	$result = mysql_query($sql, $connect);

	
?>



<footer id="footer" style="margin-top:110px; background-color:white;"><!--Footer-->	
		<div class="footer-widget" style="margin-bottom:0px; margin-top:20px;">
			<div class="container">
				<div class="row">
				<!--공지사항 시작-->
					<div class="col-sm-2" style="padding-right: 100px;">
						<div class="single-widget">
							<h3>공지사항</h3>
							<hr>
							<?

 while($row = mysql_fetch_array($result))

{
	?>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="./notice/view.php?num=<?=$row[num]?>"><?=$row[subject]?></a></li><hr>	
							</ul>
							
<?
}

?>
						</div>
					</div><!--공지사항 끝-->
<!--후기 시작-->					

<? 

$table = "peterpan_review";

include "./lib/dbconn.php";



$sql = "select * from $table where file_name_0 <> ' ' ORDER BY hit  DESC LIMIT 3 ";


	$result = mysql_query($sql, $connect);

	
?><h3>후기</h3>
	<hr>			
				<?
			 while($row = mysql_fetch_array($result))

			{
				$img=$row[file_copied_0] ;
				

					$encoding = "euc-kr";
					$charNumber = "25";
					$subject = $row[subject];
					$cutExec = mb_strimwidth($subject, 0, $charNumber, "...", $encoding);

				?>		
				
				<div class="col-sm-2">
						<div class="single-widget">

							<ul class="nav nav-pills nav-stacked">
							
								<li>
								
										<a href="./community/view.php?num=<?=$row[num]?>"><img src="./community/data/<?=$row[file_copied_0]?>" width='150'height='100'></a>
								
										<a href="./community/view.php?num=<?=$row[num]?>"><?=$cutExec?></a>
									
										<a href="./community/view.php?num=<?=$row[num]?>"><?=$row[name]?>님</a>
										
								</li>	

							</ul>
						</div>

					</div>
<!--후기 끝-->
<?
}
?>
				</div>
			</div>
		</div>
	</footer>

</div>
