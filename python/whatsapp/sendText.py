from apigratis.Service import Service
from api_brasil import APIBrasilClient, WhatsAppApi
import json


BEARER_TOKEN = "token_aqui" ## Obtenha em apibrasil.com.br
WHATSAPP_DEVICE_TOKEN = "token_aqui" ## Obtenha em https://plataforma.apibrasil.com.br/myaccount/credentials


def whatsapp_v1():
    sendText_response = Service().whatsapp(json.dumps({
        "action": "sendText",
        "credentials": {
            "DeviceToken": WHATSAPP_DEVICE_TOKEN,
            "BearerToken": BEARER_TOKEN
        },
        "body": {
            "text": "Hello World from Python",
            "number": "5531900000000",
            "time_typing": 1
        }
    }))

    print(sendText_response)

def whatsapp_v2(): 
    api_client = APIBrasilClient(bearer_token=BEARER_TOKEN)
    whatsapp_client = WhatsAppApi(api_brasil_client=api_client, device_token=WHATSAPP_DEVICE_TOKEN)
    
    whatsapp_client.to_number("5531900000000")
    api_response, status_code = whatsapp_client.send_message(message="Hello World from Python")

    print(status_code)
    print(api_response)

if __name__ == "__main__":
    whatsapp_v1()
    whatsapp_v2

