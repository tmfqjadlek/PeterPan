<html>
<head>
</head>
<body>
<?
	session_start();
	$id=$_SESSION['userid'];
		include "../lib/dbconn.php";
		$num = $_GET[num];

		
$sql = "select * from  peterpan_order where num='$num'";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);   


		

$sqlt = "select * from peterpan_order  WHERE  progress<>'입금대기' and progress<>'주문취소' and id = '$row[id]' ";
	$result = mysql_query($sql, $connect);

    $rowaa = mysql_fetch_array($result);   


$sqlt = "select sum(order_points) as totals from peterpan_order  WHERE  progress<>'입금대기' and progress<>'주문취소' and id = '$row[id]' ";
$result = mysql_query($sqlt, $connect);
    $rotw = mysql_fetch_array($result);



$sql = "select * from  peterpan_member where id='$row[id]'";

	$result = mysql_query($sql, $connect);
    $roww = mysql_fetch_array($result);       
		$table =  peterpan_member;
$point =$roww[point	]-$rowaa[points] + $rowaa[order_points];
	
$sqll = "select sum(product_price) as total from peterpan_order  WHERE  progress<>'입금대기' and progress<>'주문취소' and id = '$row[id]' ";

$resulttt = mysql_query($sqll, $connect);
$rowww = mysql_fetch_array($resulttt);
$totalcount = $rowww['total']; 

$sqlll = "select * from peterpan_order  WHERE  progress<>'입금대기' and progress<>'주문취소' and id = '$row[id]' ";
$resultttt = mysql_query($sqlll, $connect);
	$total_record = mysql_num_rows($resultttt); 




if($row[progress] == "입금완료"){
	$sql = "update $table set order_count = '$total_record' ,order_price ='$totalcount',point ='$point' where id='$row[id]'";
}

if($row[progress] == "주문취소"){
	$sql = "update $table set order_count = '$total_record' ,order_price ='$totalcount' ,point ='$point' where id='$row[id]'";
}
	mysql_query($sql, $connect);

	mysql_close();    

		
		
		echo"
		<script>
   
	   location.href = 'updata1.php?num=$num';
	</script>";
	
?>


</body>
</html>