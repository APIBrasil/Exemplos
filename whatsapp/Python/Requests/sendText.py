import requests

url = "https://cluster.apigratis.com/api/v1/whatsapp/sendText"
headers = {
    "Content-Type": "application/json",
    "SecretKey": "OBTENHA_O_SEU_SECRET_TOKEN_NO_PAINEL",
    "PublicToken": "OBTENHA_O_SEU_PUBLIC_TOKEN_NO_PAINEL",
    "DeviceToken": "OBTENHA_O_SEU_DEVICE_TOKEN_NO_PAINEL",
    "Authorization": "Bearer OBTENHA_O_SEU_TOKEN"
}
data = {
    "number": "5531994359434",
    "text": "Muito top!"
}

response = requests.post(url, headers=headers, json=data)

print(response.text)
