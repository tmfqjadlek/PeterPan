<meta charset="euc-kr">
<?
	$id=$_POST[id];
	$pass=$_POST[pass];
	$name=$_POST[name];
	$gender=$_POST[gender];


    $yyyy=$_POST[yyyy];
	$mm=$_POST[mm];
	$dd=$_POST[dd];
 
	

	$hp1=$_POST[hp1];
	$hp2=$_POST[hp2];
	$hp3=$_POST[hp3];


$address1=$_POST[address1];
	$address2=$_POST[address2];

	$email1=$_POST[email1];
	$email2=$_POST[email2];
    $hp_ok=$_POST[hp_ok];
	$email_ok=$_POST[email_ok];


	$hp=$hp1."-".$hp2."-".$hp3;
	$email=$email1."@".$email2;

	$date=$yyyy."-".$mm."-".$dd;


   $address=$address1."/".$address2;

	$regist_day=date("Y-m-d (H:i)");
	$ip=$_SERVER['REMOTE_ADDR'];
	$level ="0";


	include "../lib/dbconn.php"; 	

	$sql="select * from  peterpan_member where id='$id'";
	$result=mysql_query($sql, $connect);
	$exist_id=mysql_num_rows($result);

	if($exist_id)
	{
		echo("
		<script>
			window.alert('해당 아이디가 존재합니다.')
			history.go(-2)
		</script>
		");
		exit;
	}
	else
	{
		$sql="insert into  peterpan_member(id, pass, name, gender, date, hp, is_hp, address, email, is_email, level,
		 point, order_count, regist_day, ip)";
		$sql.="values('$id','$pass','$name','$gender', '$date','$hp', '$hp_ok', '$address', '$email','$email_ok',
		'$level','1',0,'$regist_day','$ip')";
		mysql_query($sql, $connect);
	}

	mysql_close();
	echo ("
	<script>
     window.alert('회원 가입 감사드립니다.')
		location.href='../main.php';
	</script>
	"); 
?>
