<?
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http:www.w3.orf/TR/html/loose.dtd">
<html>
<title>로그인</title>
<head>
<meta charset="euc-kr">
<link rel="stylesheet" media="all and (min-width: 481px)" >
<link rel="stylesheet" media="all and (max-width: 480px)" href="../css/media.css">
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


</head>
<style>
#inline-block{ display:inline-block;}
</style>
<body>
<style>
	#joinlogin button a {
		color : #ffffff;
	}
</style>
 <!-- 첫번째 상단 메뉴 -->
    <? include "../menu/top_menu2.php"; ?>
<!-- 두번쨰 상단 메뉴 -->
    <? include "../menu/main_meun2.php"; ?>
	<script src="../js/jquery.scrollUp.min.js"></script>
<section id="form"><!--form-->
		<div class="container"style="
    margin-top: 50px;
    height: 350px;
    border-bottom: solid 2px #fe980f;
    border-top: solid 2px #fe980f;
    border-left: solid 2px #fe980f;
    border-right: solid 2px #fe980f;">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>로그인</h2>
						<form name="login_form" method="post" action="login.php" >

							 <label for="login_id" class="login_id">회원아이디<strong class="sound_only"> </strong></label>

							<input type="text" name="id" id="login_id" required class="frm_input required" size="20" maxLength="20"/>

							<label for="login_pw" class="login_pw">비밀번호<strong class="sound_only"> </strong></label>

							<input type="password" name="pass" id="login_pw" required class="frm_input required" size="20" maxLength="20">

							 <span id="inline-block"><button type="submit" class="btn btn-default">로그인</button></span>&nbsp;&nbsp;

							
							 <span id="inline-block"><a href="../member/member.php"><button class="btn btn-default">메인으로 돌아가기</button></a></span>
					
						<br><br>
							<div class="btn btn-default">
								<a href="../member/member.php"><span id="inline-block">회원가입</a></div>
						</form>
						
					</div><!--/login form-->
					</div>
			</div>
		</div>
</section>



<!--
	   <div class = "bottom">
		 <? include "../menu/bottom.php"; ?>
		</div> -->

</div>
</div>
</body>
</html>

