<?
	session_start();
	$id=$_SESSION['userid'];
	include "../lib/dbconn.php";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http:www.w3.orf/TR/html/loose.dtd">
<html>
<title>회원탈퇴</title>
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

<!--form-->
	<!--<div style="margin-left:375px;;width:1170px;height:150px; 
	border-bottom: solid 1px #fe980f;
    border-top: solid 1px #fe980f;
    border-left: solid 1px #fe980f;
    border-right: solid 1px #fe980f;
	font-size:14px;">
						회원탈퇴와 동시에 포인트는 자동소멸 되며, 재가입을 하더라도 복구되지 않습니다.<br><br>
						그동안 홈페이지를 이용해주신 분들께 감사의 말씀을 전해드립니다.<br><br>
						아이디를 탈퇴하여도 작성한글은 사라지지 않습니다.<br><br>
						해당 게시물에 대한 삭제를 우너하는경우 받으시 탈퇴 전에 삭제해 주세요.</h4></div>-->
		<div class="container"style="
    margin-top: 50px;
    height: 350px;
    border-bottom: solid 2px #fe980f;
    border-top: solid 2px #fe980f;
    border-left: solid 2px #fe980f;
    border-right: solid 2px #fe980f;">

				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>회원탈퇴</h2>
						
						<form name="login_form" method="post" action="mypage_delete.php" >

							 <label for="login_id" class="login_id">회원아이디<strong class="sound_only"> </strong></label>

							<div name="id" id="login_id" required class="frm_input required" size="20" maxLength="20"><?=$id?></div>
							<br>

							<label for="login_pw" class="login_pw">비밀번호<strong class="sound_only"> </strong></label>

							<input type="password" name="pass" id="login_pw" required class="frm_input required" size="20" maxLength="20">
								
							<div> <input type="submit" value="회원탈퇴" name="submit" ></div>
							
						</form>
						<br><br>

            
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

