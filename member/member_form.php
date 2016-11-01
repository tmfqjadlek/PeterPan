<? 
	session_start(); 
	$id = $_GET['id'];
	$id_sss = $_POST['id'];
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="euc-kr">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all and (min-width: 481px)">
<link href="../css/member_1.css" rel="stylesheet" type="text/css" media="all and (min-width: 481px)">
<link rel="stylesheet" media="all and (max-width: 480px)" href="../css/media.css">
<style>
#inline-block{ display:inline-block;}
</style>
</head>
	<script>
function check_id()
{
	window.open("check_id.php?id="+document.member_form.id.value,"IDcheck","left=300,top=400,width=300,height=200,scrollbars=no,resizable=yes");
}

function check_input()
{
	if(!document.member_form.id.value)
	{
		alert("아이디를 입력하세요");
		document.member_form.id.focus();
		return;
	}

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

	if(document.member_form.gender[0].checked == false &&  document.member_form.gender[1].checked == false)
	{
		alert("성별을 체크해주세여");	
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
		document.member_form.address2.focus();
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

			if(!document.member_form.hp1.value)
	{
		alert("전화번호1 입력하세요");
		document.member_form.hp1.focus();
		return;
	}

		if(!document.member_form.hp2.value)
	{
		alert("전화번호2 입력하세요");
		document.member_form.hp2.focus();
		return;
	}

			if(!document.member_form.hp3.value)
	{
		alert("전화번호3 입력하세요");
		document.member_form.hp3.focus();
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
	document.member_form.hp1.value="";
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
</head>
<body>

<!-- 첫번째 상단 메뉴 -->
    <? include "../menu/top_menu2.php"; ?>
<!-- 두번쨰 상단 메뉴 -->
    <? include "../menu/main_meun2.php"; ?>
	</div>

		<form name="member_form" method="post" action="insert.php">
<!--   <div id="title">
		
		</div> -->
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 well well-sm" style="width: 772px;">
            <legend>회원가입</legend>
            <form action="member_form" method="post" class="form" role="form" action="insert.php">
            <div class="row">
                <div class="col-xs-6 col-md-6">
				<label for="">아아디</label>
                    <input class="form-control" name="id" placeholder="아이디" value="<?=$id_sss ?>" type="text" style="width: 326px;"required  />
						
			
				<br>
                <label for="">비밀번호</label> 
					<input class="form-control" name="pass"  type="password" required/><br>
				<label for="">비밀번호 확인</label> 
					<input class="form-control" name="pass_confirm" placeholder="비밀번호 확인" type="password" required/><br>
				<label for="">이름</label>
                    <input class="form-control" name="name" placeholder="이름" type="text"
                        required  style="width: 126px;"/><br>
					<label for="">성별</label><br>
					<label class="radio-inline">
					   <input type="radio" name="gender"  value="남자" required/>
				   남자
				 </label>
					 <label class="radio-inline">
						 <input type="radio" name="gender"  value="여자" required />
					여자
					 </label>
				</div>
				<button class="btn btn-lg btn-primary btn-block" onclick="check_id()" type="submit" style="width: 150px;height: 35px;margin-top: 22px;">
                아이디중복확인
					</button>
            </div><br>
			<label for="">주소</label>
			   <input class="form-control" name="address1" placeholder="주소"  style="width: 326px;" required /><br>
			    <label for="">상세주소</label>
				<input class="form-control" name="address2" placeholder="상세주소"  style="width: 226px;" required /><br>
            <label for="" >
                생년월일</label>
            <div class="row" style="width: 300px;">
                <div class="col-xs-4 col-md-4" >
                    <select name="yyyy" required  id="" placeholder='년' style="width: 86px;background-color:#FFFFFF;
				border-radius: 7px 7px 7px 7px;
				border-top:solid 1px #cccccc;
				border-left:solid 1px #cccccc;
				border-right:solid 1px #cccccc;
				border-bottom:solid 1px #cccccc;" >
					<option value="">연도
					<? $time = date('Y'); 
						for($i=$time; $i>=1900; $i--)
						
					echo "<option value ='$i'>".$i
					?>
					</select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select name="mm"  required id="" placeholder='월' style="width: 86px;background-color:#FFFFFF;
				border-radius: 7px 7px 7px 7px;
				border-top:solid 1px #cccccc;
				border-left:solid 1px #cccccc;
				border-right:solid 1px #cccccc;
				border-bottom:solid 1px #cccccc;">

					<option value="" >월
					<? for($i=1; $i<=12; $i++)
					
					echo "<option value ='$i'>".$i
					?>
					</select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select name="dd" required  id="" placeholder='일' style="width:86px;background-color:#FFFFFF;
				border-radius: 7px 7px 7px 7px;
				border-top:solid 1px #cccccc;
				border-left:solid 1px #cccccc;
				border-right:solid 1px #cccccc;
				border-bottom:solid 1px #cccccc;">
					<option value="" >일
					<? for($i=1; $i<=31; $i++)
					
					echo "<option value ='$i'>".$i
					?>
					</select>
                </div>
            </div><br>
            <label for="">
                전화번호</label>
           <div class="row" style="width: 300px;">
                <div class="col-xs-4 col-md-4">
                    <input class="form-control" type ="text" name="hp1"  required id="" placeholder='' style="width: 86px;"> 
                </div>
                <div class="col-xs-4 col-md-4">
                    <input class="form-control" type ="text" name="hp2"  required id="" placeholder='' style="width: 86px;"> 
                </div>
                <div class="col-xs-4 col-md-4">
                    <input class="form-control" type ="text" name="hp3"required  id="" placeholder='' style="width: 86px;"> 
                </div>
            </div></br>
			<label for="">이메일</label>
			<div class="row" style="width: 300px;">
                <div class="col-xs-4 col-md-4">
					<input class="form-control" name="email1" placeholder="이메일"  required type="email"style="width: 246px;" /><div style="margin-left:270px;margin-top:-25px;">@</div>
				</div>
				
				<div class="col-xs-4 col-md-4">
					<input class="form-control" name="email2" placeholder="이메일" required type="email" style="width: 246px; margin-left: 200px;"/> <br>	
			 </div> 
			 </div>
			<ul style="width: 500px;">
			<h4>SMS 수신동의</h4>&nbsp;&nbsp;&nbsp;
				
						
									<input type="checkbox" name="hp_ok" value="y" class="m_smss" >
									동의를 하시면 문자로 이벤트 정보를 받아보실수 있습니다.
									
		
			<br><br>
			<h4>이메일수신동의</h4>&nbsp;&nbsp;&nbsp;
						
							
								<input type="checkbox" name="email_ok" value="y" >
								동의를 하시면 문자로 이벤트 정보를 받아보실수 있습니다.
							
			</ul>
	
			 <span id="inline-block"><button class="btn btn-lg btn-primary btn-block" type="submit" onclick="check_input()"style="width: 200px;">
                회원가입
			</button></span>&nbsp;&nbsp;&nbsp;&nbsp;
			 <span id="inline-block"><button class="btn btn-lg btn-primary btn-block" type="submit" onclick="reset_form()"style="width: 200px;">
                다시쓰기
			</button></span>
			</div> <!-- end of join2 -->
			</form>
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
