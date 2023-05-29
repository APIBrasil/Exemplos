import http.client
import json

conn = http.client.HTTPSConnection("cluster.apigratis.com")

payload = json.dumps({
  "number": "5531994359434",
  "text": "Muito top!"
})

headers = {
  'Content-Type': 'application/json',
  'SecretKey': 'OBTENHA_O_SEU_SECRET_TOKEN_NO_PAINEL',
  'PublicToken': 'OBTENHA_O_SEU_PUBLIC_TOKEN_NO_PAINEL',
  'DeviceToken': 'OBTENHA_O_SEU_DEVICE_TOKEN_NO_PAINEL',
  'Authorization': 'Bearer OBTENHA_O_SEU_TOKEN'
}

conn.request("POST", "/api/v1/whatsapp/sendText", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
