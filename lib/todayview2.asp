<%
If mode = "TODAYGOODS" Then
    page    = Request("page")
    T_Goods = Request.Cookies("TodayGcode")
    T_Count = Request.Cookies("TodayGcode").count
    If T_Goods = "" OR T_Count = "" Then T_Count = 0
    If T_Count > 99 Then T_Count = 99
 
    If T_Count / 4 <= 1 Then
        T_Count_page = 1
    Else
        T_Count_page = CInt(T_Count / 4) + 1
    End If
 
    fromCount = (page*4) - 3
    toCount = page * 4
 
    nextPage = page+1
    If nextPage > T_Count_page Then nextPage = T_Count_page
    prePage = page - 1
    If prePage < 1 Then prePage = 1
 
    %>
    <div class="head">
    ø¿¥√ ∫ª
ªÛ«∞(<%=T_Count%>)
    </div>
    <%
       For g_cnt = fromCount  To toCount
          TodayGcode = Request.Cookies("TodayGcode")("G" & g_cnt)
          TodayImg = Request.Cookies("TodayImg")("G" & g_cnt)
          TodayUrl = Request.Cookies("TodayUrl")("G" & g_cnt)
          If TodayUrl = "" Then TodayUrl = "#"
 
          %>
          <a href="<%=TodayUrl%>"><img src="<%=TodayImg%>" onError="this.src='/images/noimage.png';" /></a>
          <%
       Next
    %>
    <div style="text-align:center;"><a href="Javascript:fnGetTodayGoods(<%=prePage%>);"><span style="float:left;padding:6px;padding-top:0;">¢∏</span></a><%=page%>/<%=T_Count_page%><a href="Javascript:fnGetTodayGoods(<%=nextPage%>);"><span style="float:right;padding:6px;padding-top:0;">¢∫</span></a></div>
    <%
End If
%>