<%
T_Goods = Request.Cookies("TodayGcode")
T_Count = Request.Cookies("TodayGcode").count  
If T_Goods = "" OR T_Count = "" Then T_Count = 0
If T_Count > 99 Then T_Count = 99   
 
If T_Count / 4 <= 1 Then
    T_Count_page = 1
Else
    If CInt(T_Count mod 4) = 0 Then
        T_Count_page =  CInt(T_Count / 4)
    Else
        T_Count_page =  CInt(T_Count / 4) + 1
    End If
End If
 
%>
<div class="head">
오늘 본
상품(<%=T_Count%>)
</div>
<%
   For g_cnt = 1 To 4 ' 4개까지 노출
      TodayGcode = Request.Cookies("TodayGcode")("G" & g_cnt)
      TodayImg = Request.Cookies("TodayImg")("G" & g_cnt)
      TodayUrl = Request.Cookies("TodayUrl")("G" & g_cnt)
 
      %>
      <a href="<%=TodayUrl%>"><img src="<%=TodayImg%>" onError="this.src='/images/noimage.png';" /></a>
      <%
   Next
%>
<div style="text-align:center;"><a href="#"><span style="float:left;padding:6px;padding-top:0;">◀</span></a>1/<%=T_Count_page%><a href="Javascript:fnGetTodayGoods(2);"><span style="float:right;padding:6px;padding-top:0;">▶</span></a></div>
