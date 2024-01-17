using System;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;

class Program
{
    static async Task Main()
    {
        var url = "https://gateway.apibrasil.io/api/v2/whatsapp/sendText";
        
        var data = new
        {
            number = "5531994359434",
            text = "Muito top!"
        };

        var json = Newtonsoft.Json.JsonConvert.SerializeObject(data);
        var content = new StringContent(json, Encoding.UTF8, "application/json");

        using var client = new HttpClient();
        client.DefaultRequestHeaders.Add("SecretKey", "OBTENHA_O_SEU_SECRET_TOKEN_NO_PAINEL");
        client.DefaultRequestHeaders.Add("PublicToken", "OBTENHA_O_SEU_PUBLIC_TOKEN_NO_PAINEL");
        client.DefaultRequestHeaders.Add("DeviceToken", "OBTENHA_O_SEU_DEVICE_TOKEN_NO_PAINEL");
        client.DefaultRequestHeaders.Add("Authorization", "Bearer OBTENHA_O_SEU_TOKEN");

        var response = await client.PostAsync(url, content);

        if (response.IsSuccessStatusCode)
        {
            var responseBody = await response.Content.ReadAsStringAsync();
            Console.WriteLine(responseBody);
        }
        else
        {
            Console.WriteLine($"Erro: {response.StatusCode}");
        }
    }
}
