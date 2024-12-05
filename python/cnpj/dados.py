from apigratis.Service import Service # Versão a ser depreciada em breve
from api_brasil import APIBrasilClient, CNPJApi # Nova SDK

import json

BEARER_TOKEN = "token_aqui" ## Obtenha em apibrasil.com.br
CNPJ_DEVICE_TOKEN = "token_aqui" ## Obtenha em https://plataforma.apibrasil.com.br/myaccount/credentials

def cnpj_v1():

    dados = Service().cnpj(json.dumps({
        "action": "cnpj",
        "credentials": {
            "DeviceToken": CNPJ_DEVICE_TOKEN,
            "BearerToken": BEARER_TOKEN,
        },
        "body": {
            "cnpj": "44.959.669/0001-80",
        }
    }))

    print(dados)

def cnpj_v2():
    api_client = APIBrasilClient(
        bearer_token=BEARER_TOKEN 
    )
    cnpj_api = CNPJApi(api_brasil_client=api_client, device_token=CNPJ_DEVICE_TOKEN)

    cnpj_api.set_cnpj("44.959.669/0001-80")

    api_response, status_code = cnpj_api.consulta()

    print(status_code)
    print(api_response)

if __name__ == "__main__":
    cnpj_v1() # Chamando a versão 1 da SDK
    cnpj_v2() # Chamando a versão 2 da SDK