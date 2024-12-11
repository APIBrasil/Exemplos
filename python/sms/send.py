from apigratis.Service import Service
from api_brasil import APIBrasilClient, SMSApi
import json


BEARER_TOKEN = "token_aqui" ## Obtenha em apibrasil.com.br
SMS_DEVICE_TOKEN = "token_aqui" ## Obtenha em https://plataforma.apibrasil.com.br/myaccount/credentials


def sms_v1():
    send_message_response = Service().sms(json.dumps({
        "action": "send",
        "credentials": {
            "DeviceToken": SMS_DEVICE_TOKEN,
            "BearerToken": BEARER_TOKEN
        },
        "body":  {
            "number":"550000000000",
            "message": "Ola mundo!"
        }
    }))

    print(send_message_response)

def sms_v2():
    api_client = APIBrasilClient(bearer_token=BEARER_TOKEN)
    
    sms = SMSApi(api_brasil_client=api_client, device_token=SMS_DEVICE_TOKEN)

    sms.set_phone_number("5500000000")

    api_response, status_code = sms.send(message="SMS enviado a partir da APIBrasil")

    print(status_code)
    print(api_response)

if __name__ == "__main__":
    sms_v1()
    sms_v2()