<HTML>
  <HEAD>
    <TITLE>Confirmation</TITLE> 
    <%
      Dim objNewMail
      Set objNewMail = Server.CreateObject("CDONTS.NewMail")
      Dim msgBody, Item
      msgBody = ""
      
      For Each Item In Request.Form
				If Item = "submit" Or Item = "recipient" Or Item = "subject" Or Item = "redirect" Then
					' Do nothing -- wait for next loop
				Else
					If Request.Form(Item).Count Then
						For intLoop = 1 To Request.Form(Item).Count
							msgBody = msgBody & Item & ": " & Request.Form(Item) & vbCrLf
							'Response.Write Item & ": " & Request.Form(Item) & "<BR>"
						Next
					Else
						msgBody = msgBody & Item & ": " & Request.Form(Item) & vbCrLf
						'Response.Write Item & ": " & Request.Form(Item) & "<BR>"
					End If
				End If
      Next
      
      If Request.Form("email") <> "" Then
				objNewMail.From = Request.Form("email")	
			Else
				objNewMail.From = "(Unknown Sender)"
      End If
      objNewMail.To = Request.Form("recipient")
      objNewMail.Subject = Request.Form("subject")
      objNewMail.Body = msgBody
      objNewMail.Send
      %>
  </HEAD>
  <BODY bgcolor="#FFFFFF" text="#000000" link="#000080" alink="#FF0000" vlink="#FF00FF">
    <META http-equiv="Refresh" content="2; url=<%=Request.Form("redirect")%>">
    <CENTER>
      <FONT face="Arial,Verdana,Helvetica,Sans Serif" size="-1">
        Form submittal successful!<BR>
        <A href="<%=Request.Form("redirect")%>">Click here to return</A>
      </FONT>
    </CENTER>
  </BODY>
</HTML>
