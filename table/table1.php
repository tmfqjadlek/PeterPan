<!doctype html>
 <head>
  <meta charset="euc-kr">
  <title>Document</title>
<style>
#content #col2 {
	width:807px;
	height:2000px;
	min-height:558px;
	float:left;
	margin-left:15px;
	margin-top:55px;
/*	border:solid 1px #cccccc; */
}

#content #col2 #title{
	margin-top:30px;
	height:60px;
	margin-bottom:20px;
		border-bottom:solid 1px #BDBDBD;

}
#od {
	height:40px;
	padding:7px;  
	border-top:solid 3px #000000;
	
	background-color:#eeeeee;
	
	font-size:14px;
}

#od li {
	display:inline;
}

#od #od1 {
	width:100px;
	margin-left:15px;
}

#od #od2 {
	margin-left:130px;
}

#od #od3 {
	margin-left:140px;
}

#od #od4 {
	margin-left:40px;
}

#od #od5 {
	margin-left:40px;
}

#od #od6 {
	margin-left:40px;
}



#list_content {
	height:80px;
}
#odlist_item {
	height:30px;
	margin-top:2px;
	padding:40px; 

	
}

#odlist_item #odlist_item1{
	float:left;
	width:100px;
	margin-left:0px;
	text-align:center;
}

#odlist_item #odlist_item2{
	float:left;
	width:100px;
	margin-left:70px;
	text-align:center;
}

#odlist_item #odlist_item3{
	float:left;
	width:100px;
	margin-left:120px;
	text-align:center;
}

#odlist_item #odlist_item4{
	float:left;
	width:80px;
	margin-left:0px;
	text-align:center;
}

#odlist_item #odlist_item5{
	float:left;
	width:70px;
	margin-left:10px;
	text-align:center;
}

#odlist_item #odlist_item6{
	float:left;
	width:50px;
	margin-left:27px;
	text-align:center;
}
#con_odcharge {
	margin-top:10px;
	height:70px;
	background-color:#eeeeee;
}
#odcharge {
	height:0px;
	margin-top:2px;
	padding:0px; 

	border-bottom:solid 1px #BDBDBD;
}

#odcharge #odcharge_item1{
	float:right;
	width:500px;
	margin-left:-60px;
	padding-top:25px;
	text-align:center;
}

#all_ord {
	margin-top:50px;
	height:220px;
	
	border-bottom:solid 3px #5D5D5D;
	border-top:solid 3px #5D5D5D;
	border-left:solid 3px #5D5D5D;
	border-right:solid 3px #5D5D5D;
}
#all_od {
	height:0px;
	margin-top:2px;
	padding:0px; 

	
}

#all_od #all_od1{
	
	width:500px;
	font-size:13px;
	margin-left:-170px;
	padding-top:0px;
	text-align:center;
}
#all_od #all_od2{
	border-bottom:solid 1px #BDBDBD;
	width:250px;
	margin-left:520px;
	margin-top:-25px;
	text-align:left;
}
#all_od #all_od3{
	margin-top:20px;
	width:250px;
	margin-left:520px;
	border-bottom:solid 1px #BDBDBD;
	text-align:left;
}
#all_od #all_od4{
	margin-top:-65px;
	width:120px;
	margin-left:650px;
	text-align:right;
}
#all_od #all_od5{
	margin-top:22px;
	width:100px;
	margin-left:670px;
	text-align:right;
}

#all_od #all_od6{

	border-top:2px dashed #8C8C8C;
	width:750px;
	margin-right:0px;
	margin-left:20px;
	margin-top:35px;
	padding-top:10px;
	text-align:center;
}

#all_od #all_od7{

	
	float:right;
	margin-right:170px;
	margin-left:20px;
	margin-top:-10px;
	padding-top:10px;
	text-align:center;
}

#all_od #all_od8{

	
	float:right;
	margin-right:-250px;
	margin-left:0px;
	font-size:20px;
	color:#FF0000;
	padding-top:10px;
	margin-top:-20px;
	text-align:center;
}


</style>
 </head>
 <body>
	  <div id="content">


	<div id="col2">        
		

	<!--	<div class="clear">주문자정보</div>
		<div id="allod_infor">
		<div id="od_infor" >
				<div id="od_infor1">이름</div>
				<div id="od_infor2">김슬범</div>
				<div id="od_infor3">이메일</div>
				<div id="od_infor4">이메일을 인풋박스로 가져옴</div>
				<div id="od_infor5">연락처</div>
				<div id="od_infor6">연락처을 인풋박스로 가져옴</div>
		</div>
		</div>

		<div class="clear">배송지정보</div>
		<div id="allod_infor">
		<div id="od_infor" >
				<div id="od_infor1">이름</div>
				<div id="od_infor2">김슬범</div>
				<div id="od_infor3">연락처1</div>
				<div id="od_infor4">연락처을 인풋박스로 가져옴</div>
				<div id="od_infor5">연락처2</div>
				<div id="od_infor6">연락처을 인풋박스로 가져옴</div>
				<div id="od_infor7">주소</div>
				<div id="od_infor8">주소를 인풋박스로 가져옴</div>
				<div id="od_infor9">상세주소</div>
				<div id="od_infor10">상세주소를 인풋박스로 가져옴</div>
				<div id="od_infor11">주문메세지</div>
				<div id="od_infor12">메세지를 인풋박스로 가져옴</div>
		</div>
		</div>
		<br>

		<br>
		<br>
		<div class="clear">무통장입금자면</div>
		<div id="allod_infor">
		<div id="od_infor" >
				<div id="od_infor1">이름</div>
				<div id="od_infor2">이름사용할인풋박스</div>
		</div>
		</div>
	
		<div class="clear">포인트사용</div>
		<div id="allod_infor">
		<div id="od_infor" >
				<div id="od_infor99">인풋박스</div>
				<div id="od_infor98">사용버튼</div>
		</div>
		</div>-->
		
		<div class="clear">장바구니에 들어있는 상품</div>

		<div id="od" >
			<ul>
				<li id="od1">상품코드</li>
				<li id="od2">상품정보</li>
				<li id="od3">판매가격</li>
				<li id="od4">수량</li>
				<li id="od5">주문금액</li>
				<li id="od6">포인트</li>

			</ul>		
		</div>

		<div id="list_content">
			<div id="odlist_item">
				<div id="odlist_item1">상품코드</div>
				<div id="odlist_item2">상품이미지</div>
				<div id="odlist_item3">가격</div>
				<div id="odlist_item4">수량</div>
				<div id="odlist_item5">주문금액</div>
				<div id="odlist_item6">포인트</div>
			</div>
		</div>
		<div id="con_odcharge">
			<div id="odcharge">
				<div id="odcharge_item1">업체 조건 배송 상품 금액 **원+배송비 ** = 총합계 **원</div>
			</div>
		</div>
		<div id="all_ord">
			<div id="all_od">
				<div id="all_od1"><h1>총주문금액</h1></div>
				<div id="all_od2">상품총금액</div>
				<div id="all_od3">배송비</div>
				<div id="all_od4">21000</div>
				<div id="all_od5">2500</div>
				<div id="all_od6"></div>
				<div id="all_od7"><h4>결제 예정금액</h4></div>
				<div id="all_od8"><h3>23500원</h3></div>
			</div>
		</div>









			<div>주문하기</div>
			<div>계속쇼핑하기</div>

	</div>
 </div>
</body>
</html>
