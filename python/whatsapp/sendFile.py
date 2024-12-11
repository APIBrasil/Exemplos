from apigratis.Service import Service
from api_brasil import APIBrasilClient, WhatsAppApi
import json

BEARER_TOKEN = "token_aqui" ## Obtenha em apibrasil.com.br
WHATSAPP_DEVICE_TOKEN = "token_aqui" ## Obtenha em https://plataforma.apibrasil.com.br/myaccount/credentials


def whatsapp_v1():
    sendFile_response = Service().whatsapp(json.dumps({
        "action": "sendFile",
        "credentials": {
            "DeviceToken": WHATSAPP_DEVICE_TOKEN,
            "BearerToken": BEARER_TOKEN
        },
        "body":  {
            "path" : "https://apibrasil.io/img/capa.png",
            "number" : "5531900000000",
            "options" : {
                "caption": "Bem vindo a APIBrasil",
                "createChat": True,
                "filename": "arquivo X"
            }
        }
    }))

    print(sendFile_response)

def whatsapp_v2():
    api_client = APIBrasilClient(bearer_token=BEARER_TOKEN)
    whatsapp_api = WhatsAppApi(api_brasil_client=api_client,
                               device_token=WHATSAPP_DEVICE_TOKEN)
    
    api_response, status_code = whatsapp_api.send_file(file_path="https://apibrasil.io/img/capa.png",
                                                       file_description="Bem vindo a APIBrasil")

    print(status_code)
    print(api_response)

if __name__ == "__main__":
    whatsapp_v1()
    whatsapp_v2