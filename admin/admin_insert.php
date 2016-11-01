<html>
<head>
</head>
<?
$num =  $_GET[num];
?>
<form name="admin_insert" method="post" action="insert.php?num=<?=$num?>" enctype="multipart/form-data">
<div>
<select name="adminod">
<option value='주문취소'>주문취소</option>
                    <option value='입금신청'>입금신청</option>
                    <option value='입금완료'>입금완료</option>
					<option value='배달준비'>배달준비</option>
					<option value='배달중'>배달중</option>
                    <option value='배달완료'>배달완료</option>
				</select></div>
<input type="text" name="bureum">배송번호입력
				<div> <input type="submit" value="등록" name="submit" > 
				
				
				</div>
				</html>