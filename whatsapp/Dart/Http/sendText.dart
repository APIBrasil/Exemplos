import 'package:http/http.dart' as http;
import 'dart:convert';

void main() async {
  var url = Uri.parse('https://gateway.apibrasil.io/api/v2/whatsapp/sendText');
  
  var headers = {
    'Content-Type': 'application/json',
    'SecretKey': 'OBTENHA_O_SEU_SECRET_TOKEN_NO_PAINEL',
    'PublicToken': 'OBTENHA_O_SEU_PUBLIC_TOKEN_NO_PAINEL',
    'DeviceToken': 'OBTENHA_O_SEU_DEVICE_TOKEN_NO_PAINEL',
    'Authorization': 'Bearer OBTENHA_O_SEU_TOKEN'
  };

  var data = {
    'number': '5531994359434',
    'text': 'Muito top!'
  };

  var response = await http.post(url, headers: headers, body: json.encode(data));

  if (response.statusCode == 200) {
    print(response.body);
  } else {
    print('Erro: ${response.statusCode}');
  }
}
