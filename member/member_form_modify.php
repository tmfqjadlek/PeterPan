<title>정보수정</title>
<?
	session_start();
	$id=$_SESSION['userid'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http:www.w3.orf/TR/html/loose.dtd">
<head>
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/member.css" rel="stylesheet" type="text/css" media="all">
</head>
<script>

function check_input()
{


	if(!document.member_form.pass.value)
	{
		alert("비밀번호를 입력하세요");
		document.member_form.pass.focus();
		return;
	}

	if(!document.member_form.pass_confirm.value)
	{
		alert("비밀번호 확인을 입력하세요");
		document.member_form.pass_confirm.focus();
		return;
	}

	if(!document.member_form.name.value)
	{
		alert("이름을 입력하세요");
		document.member_form.name.focus();
		return;
	} 



if(!document.member_form.yyyy.value)
	{
		alert("생년 입력하세요");
		document.member_form.yyyy.focus();
		return;
	}

	if(!document.member_form.mm.value)
	{
		alert("월 입력하세요");
		document.member_form.mm.focus();
		return;
	}

	if(!document.member_form.dd.value)
	{
		alert("일 입력하세요");
		document.member_form.dd.focus();
		return;
	}

		if(!document.member_form.hp2.value)
	{                       
		alert("전화번로 입력하세요");
		document.member_form.hp2.focus();
		return;
	}

			if(!document.member_form.hp3.value)
	{
		alert("전화번로 입력하세요");
		document.member_form.hp3.focus();
		return;
	}

			if(!document.member_form.address1.value)
	{
		alert("주소를 입력하세요");
		document.member_form.address1.focus();
		return;
	}

				if(!document.member_form.address2.value)
	{
		alert("상세주소를 입력하세요");
		document.member_form.address1.focus();
		return;
	}



				if(!document.member_form.email1.value)
	{
		alert("이메일 아이디 입력하세요");
		document.member_form.email1.focus();
		return;
	}


	
				if(!document.member_form.email2.value)
	{
		alert("이메일 주소를 입력하세요");
		document.member_form.email2.focus();
		return;
	}

	if(document.member_form.pass.value!=document.member_form.pass_confirm.value)
	{
		alert("비밀번호가 일치하지 않습니다.\n 다시 입력해주세요.");
		document.member_form.pass.focus();
		document.member_form.pass.select();
		return;
	}

	document.member_form.submit();
}

function reset_form()
{
	document.member_form.id.value="";
	document.member_form.pass.value="";
	document.member_form.pass_confirm.value="";
	document.member_form.name.value="";
	document.member_form.gender.value="";
	document.member_form.hp1.value="010";
	document.member_form.hp2.value="";
	document.member_form.hp3.value="";
	document.member_form.yyyy.value="";
	document.member_form.mm.value="";
	document.member_form.dd.value="";
	document.member_form.address1.value="";
	document.member_form.address2.value="";
	document.member_form.id.focus();

	return;
}
</script>
<style>
#inline-block{ display:inline-block;}
</style>
<body>
<!-- 첫번째 상단 메뉴 -->
    <? include "../menu/top_menu2.php"; ?>
 <!-- 두번쨰 상단 메뉴 -->
    <? include "../menu/main_meun2.php"; ?>


<?
    include "../lib/dbconn.php";

    $sql = "select * from peterpan_member where id='$id'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);

    $hp = explode("-", $row[hp]);
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

	  $date = explode("-", $row[date]);
    $date1 = $date[0];
    $date2 = $date[1];
  $date3 = $date[2];


    $address = explode("/", $row[address]);
    $address1 = $address[0];
    $address2 = $address[1];
  

	
    mysql_close();
?>

<form name="member_form" method="post" action="insert_modify.php">
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 well well-sm" style="width: 772px;">
            <legend>정보수정</legend>
            <form action="#" method="post" class="form" role="form">
            <div class="row">
                <div class="col-xs-6 col-md-6">
				<label for="">아아디</label>
			
                    <input class="form-control" name="id" value="<?= $row[id]?>" type="text" style="width: 326px;"required autofocus /> 
				<br>
                <label for="">비밀번호</label> 
					<input class="form-control" name="pass" value="<?= $row[pass]?>" type="password" /><br>
				<label for="">비밀번호 확인</label> 
					<input class="form-control" name="pass_confirm" value="<?= $row[pass]?>" type="password" /><br>
				<label for="">이름</label>
                    <input class="form-control" name="name" value="<?= $row[name]?>" type="text"
                        required autofocus style="width: 126px;"/>
				
				</div>
            </div><br>
			<label for="">주소</label>
			   <input class="form-control" name="address1" value="<?=$address1?>"  style="width: 326px;" /><br>
			    <label for="">상세주소</label>
				<input class="form-control" name="address2" value="<?=$address2?>"  style="width: 226px;" /><br>
            <label for="">
                생년월일</label>
            <div class="row" style="width: 300px;">
                <div class="col-xs-4 col-md-4">
                    <input class="form-control" type ="text" name="yyyy"   id=""value="<?= $date1?>" style="width: 86px;"> 
                </div>
                <div class="col-xs-4 col-md-4">
                    <input class="form-control" type ="text" name="mm"   id="" value="<?= $date2?>" style="width: 86px;"> 
                </div>
                <div class="col-xs-4 col-md-4">
                    <input class="form-control" type ="text" name="dd"  id="" value="<?= $date3?>"style="width:86px;"> 
                </div>
            </div><br>
            <label for="">
                전화번호</label>
           <div class="row" style="width: 300px;">
                <div class="col-xs-4 col-md-4">
                    <input class="form-control" type ="text" name="hp1" value="<?=$hp1?>" style="width: 86px;"> 
                </div>
                <div class="col-xs-4 col-md-4">
                    <input class="form-control" type ="text" name="hp2" value="<?=$hp2?>" style="width: 86px;"> 
                </div>
                <div class="col-xs-4 col-md-4">
                    <input class="form-control" type ="text" name="hp3" value="<?=$hp3?>" style="width: 86px;"> 
                </div>
            </div></br>
			<label for="">이메일</label>
			<div class="row" style="width: 300px;">
                <div class="col-xs-4 col-md-4">

					<input class="form-control" name="email1" value="<?=$email1?>" type="email"style="width: 246px;" />		

				</div>

				<div class="col-xs-4 col-md-4">
					<input class="form-control" name="email2" value="<?=$email2?>" type="email" style="width: 246px; margin-left: 200px;"/> <br>	
			 </div> 
			 </div>

<ul style="width: 500px;">
			<h4>SMS 수신동의</h4>
				
						<?if($row[is_hp] == "y")
							{?>
								<input type="checkbox" name="hp_ok" value="y" class="m_smss"  checked="checked">
								 동의를 하시면 문자로 이벤트 정보를 받아보실수 있습니다.
							<?}
								else{
									?>
									<input type="checkbox" name="hp_ok" value="y" class="m_smss" >
									동의를 하시면 문자로 이벤트 정보를 받아보실수 있습니다.
								<?}
								?>		
		
				<br><br>
			<h4>이메일수신동의</h4>
						<?if($row[is_email] == "y")
							{?>
								<input type="checkbox" name="email_ok" value="y" checked="checked">
								 동의를 하시면 문자로 이벤트 정보를 받아보실수 있습니다.
								<?}
								else
								{?>
								<input type="checkbox" name="email_ok" value="y" >
								동의를 하시면 문자로 이벤트 정보를 받아보실수 있습니다.
								<?}?>
			</ul>
		
			<span id="inline-block"><button class="btn btn-lg btn-primary btn-block" type="submit" onclick="check_input()"style="width: 200px;">
                수정하기
			</button></span>&nbsp;&nbsp;&nbsp;&nbsp;
			 <span id="inline-block"><button class="btn btn-lg btn-primary btn-block" type="submit" onclick="reset_form()"style="width: 200px;">
                다시쓰기
			</button></span>
	
			</div> <!-- end of join2 -->
	
			<!-- end form_join-->

	    </form>
	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
<!--
  <div class = "bottom">
		 <? include "../menu/bottom.php"; ?>
		</div> -->
</div> <!-- end of wrap -->

</body>
</html>
