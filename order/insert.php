<? session_start(); 
$id=$_SESSION['userid'];
?>

<meta charset="euc-kr">
<?
include "../lib/dbconn.php"; 	


$point = 0;

	$table =  "peterpan_order";
	$id=$_SESSION['userid'];
	$name = $_GET['name'];
	$email = $_GET['email'];
	$hp = $_GET['hp'];
	$pro_order_name = $_GET['pro_order_name'];
	$pro_order_hp = $_GET['pro_order_hp'];
	$pro_address1 = $_GET['pro_address1'];
	$pro_address2 = $_GET['pro_address2'];
	$content = $_GET['content'];
	$point = $_GET[point];
	$order_name = $_GET['order_name'];
	$order_in = $_GET['order_in'];
	$order_by = $_GET['order_by'];




	if($order_by  == '바로구매')
	{
	$cartnum = $_GET[cartnum];
	$c_count = $_GET[c_count];
	$c_price = $_GET['c_price'] -$point;

$sqll = "select * from peterpan_product where num = '$cartnum' ";
	$resultt = mysql_query($sqll, $connect);
    $roww = mysql_fetch_array($resultt); 
$order_points = $roww[point] *$c_count ;





	}
	else
	{



		$order_by = '장바구니';
			
	}

$regist_day = date("Y-m-d");

	
	$pro_address = $pro_address1."/".$pro_address2;

	include "../lib/dbconn.php"; 	
		if($order_by  == '바로구매')
	{

	$sql="select * from  $table";
	$result=mysql_query($sql, $connect);


	
		$sql="insert into  $table(id, name, email, hp, order_name, order_hp, order_address, content, points,order_points,	 c_name, c_in, ordey_by,progress,bureum,product_name,product_count,product_price,order_day)";
		$sql.="values('$id','$name','$email','$hp', '$pro_order_name','$pro_order_hp', '$pro_address','$content','$point','$order_points','$order_name','$order_in','$order_by','입금대기','1','$cartnum','$c_count','$c_price' ,'$regist_day')";
		mysql_query($sql, $connect);
	}
else{
$sql = "select * from   peterpan_cart where id='$id'";
$result = mysql_query($sql, $connect);

while($row = mysql_fetch_array($result))
{
	$cartnum = $row[cart_num];
	$c_count = $row[cart_count];
	$c_price = $row[cart_price]-$point;

	$sqll = "select * from peterpan_product where num = '$cartnum' ";
	$resultt = mysql_query($sqll, $connect);
    $roww = mysql_fetch_array($resultt); 
$order_points = $roww[point] *$c_count ;

$sql="insert into  $table(id, name, email, hp, order_name, order_hp, order_address, content, points,order_points, c_name, c_in, ordey_by,progress,bureum,product_name,product_count,product_price,order_day)";


		$sql.="values('$id','$name','$email','$hp', '$pro_order_name','$pro_order_hp', '$pro_address','$content','$point','$order_points','$order_name','$order_in','$order_by','입금대기','1','$cartnum','$c_count','$c_price' ,'$regist_day')";
	mysql_query($sql, $connect);


}
}




$sqlls = "select * from peterpan_product where num = '$cartnum'";
	$resulstt = mysql_query($sqlls, $connect);
    $rowsssw = mysql_fetch_array($resulstt); 
	

	if($rowsssw[count] == 0)
	{
echo ("<script>
window.alert('상품재고가 부족합니다 죄송합니다');
   history.go(-2)

</script>");
	}
else
{

		$sql = "delete from  peterpan_cart where id ='$id'";
   mysql_query($sql, $connect);

   mysql_close();
	
echo ("
	<script>
     window.alert('구매가 완료되었습니다.')
		location.href='finishorder.php';
	</script>
	"); 
}

?>

