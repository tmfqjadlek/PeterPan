<?
$id = $_GET['id'];
$id_sss = $_GET['id_sss'];
?>
<meta charset="euc-kr">

<script>
function recheck()
{
	window.open("check_id.php?id="+document.member_form.id.value,"IDcheck","left=300,top=400,width=300,height=200,scrollbars=no,resizable=yes");
}
function checkok()
{	
	
	location.href = "./member_form.php?id=<?echo($id);?>";
	window.close();
}


</script>
<?

	if(!$id)
	{
		echo("아이디를 입력하세요.");
	}
	else
	{
		include "../lib/dbconn.php";

		$sql="select * from  peterpan_member where id='$id'";

		$result=mysql_query($sql, $connect);
		$num_record=mysql_num_rows($result);

		if($num_record)
		{ 
?>
			<div check_ok><font color="orange" size="15">"<?=$id?>"</font></div><br>
			<form>
			아이디가 중복됩니다.<br>
			다른 아이디를 사용하세요.<br>
			<input type='text' name='id' color="orange" size="12">&nbsp&nbsp&nbsp<input type='submit' value='검색' onclick='recheck()'><br>
			</form>
<?
		}
		else
		{ 
?>
			<div check_ok2><font color="orange" size="15">"<?=$id?>"</font></div><br>
			<form name="member_form" method="post" action="member_form.php?id_sss=<?=$id?>">
			사용가능한 아이디입니다.</br>
			<input type='submit' value='사용하기' onclick='checkok()' ><br>
			</form>
<?
		}

		mysql_close();
	}
?>
