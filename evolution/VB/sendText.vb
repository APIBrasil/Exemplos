Imports System.Net
Imports System.IO

Module MainModule
    Sub Main()
        Dim url As String = "https://gateway.apibrasil.io/api/v2/evolution/message/sendText"
        Dim requestJson As String = "{""number"": ""5531994359434"",""options"": {""delay"": 1200,""presence"": ""composing""},""textMessage"": {""text"": ""Teste Evolution API, via APIBRASIL!""}}"
        Dim deviceToken As String = "1c6f531d-c785-4655-bb70....."
        Dim bearerToken As String = "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...."

        Dim wc As New WebClient()
        wc.Headers.Add("Content-Type", "application/json")
        wc.Headers.Add("DeviceToken", deviceToken)
        wc.Headers.Add("Authorization", bearerToken)

        Dim responseJson As String = wc.UploadString(url, "POST", requestJson)
        Console.WriteLine(responseJson)
    End Sub
End Module
