<?

$orderclick =$_GET[orderclick];
if($orderclick == 0)
{
	echo ("<script>
window.alert('상품이 부족합니다');
 history.go(-1);
</script>");
}
else
{
echo"
		<script>

	   location.href = '../order/order.php?order=order&point=0';
	</script>";
}

?>