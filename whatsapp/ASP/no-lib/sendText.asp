<%
Dim url
Dim jsonBody
Dim xmlhttp

url = "https://gateway.apibrasil.io/api/v2/whatsapp/sendText"
jsonBody = "{""number"": ""5531994359434"", ""text"": ""Muito top!""}"

Set xmlhttp = Server.CreateObject("MSXML2.ServerXMLHTTP")

xmlhttp.Open "POST", url, False
xmlhttp.setRequestHeader "Content-Type", "application/json"
xmlhttp.setRequestHeader "SecretKey", "OBTENHA_O_SEU_SECRET_TOKEN_NO_PAINEL"
xmlhttp.setRequestHeader "PublicToken", "OBTENHA_O_SEU_PUBLIC_TOKEN_NO_PAINEL"
xmlhttp.setRequestHeader "DeviceToken", "OBTENHA_O_SEU_DEVICE_TOKEN_NO_PAINEL"
xmlhttp.setRequestHeader "Authorization", "Bearer OBTENHA_O_SEU_TOKEN"

xmlhttp.Send jsonBody

Response.Write xmlhttp.responseText

Set xmlhttp = Nothing
%>
