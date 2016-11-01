<%
        '오늘본상품 저장
        Sub ToDayGoodsSet(SG_CODE,SG_IMG,SG_URL)
            C_Goods = Request.Cookies("TodayGcode")
            C_Count = Request.Cookies("TodayGcode").count
            If C_Goods = "" OR C_Count = "" Then C_Count = 0
            If C_Count > 99 Then C_Count = 99 '100개까지 저장을 의미
 
            For c_cnt = 1 To C_Count Step 1  ' 중복 데이터 체크하여 추가 안함.
                If Request.Cookies("TodayGcode")("G" & c_cnt) = SG_CODE Then
                    Exit sub
                End If
            Next
 
            If InStr(C_Goods, "=" & SG_CODE) = 0 Then '저장된게 없으면 기존것은 배열에서 1씩 뒤로저장
                For c_cnt = C_Count To 1 Step -1
                Response.Cookies("TodayGcode")("G" & c_cnt + 1) = Request.Cookies("TodayGcode")("G" & c_cnt)
                Response.Cookies("TodayImg")("G" & c_cnt + 1) = Request.Cookies("TodayImg")("G" & c_cnt)
                Response.Cookies("TodayUrl")("G" & c_cnt + 1) = Request.Cookies("TodayUrl")("G" & c_cnt)
                Next
 
                '첫번째 배열에 신규상품 저장
                Response.Cookies("TodayGcode")("G1") = SG_CODE
                Response.Cookies("TodayImg")("G1") = SG_IMG
                Response.Cookies("TodayUrl")("G1") = SG_URL
            End If
 
            '쿠기 expires(만기)일 및 사용허용 도메인설정 만기일설정은 1일로 함
            NewDate = DateAdd("d", 1, Now())
            Response.Cookies("TodayGcode").expires = NewDate
            Response.Cookies("TodayGcode").path = "/"
            Response.Cookies("TodayGcode").Domain = Request.SERVERVARIABLES("SERVER_NAME")
            Response.Cookies("TodayImg").expires = NewDate
            Response.Cookies("TodayImg").path = "/"
            Response.Cookies("TodayImg").Domain = Request.SERVERVARIABLES("SERVER_NAME")
            Response.Cookies("TodayUrl").expires = NewDate
            Response.Cookies("TodayUrl").path = "/"
            Response.Cookies("TodayUrl").Domain = Request.SERVERVARIABLES("SERVER_NAME")
        End Sub
 
        ToDayGoodsSet productCode, Rs("postUrl") , Request.SERVERVARIABLES("HTTP_URL")   '함수호출 상품코드, 상품이미지
%>