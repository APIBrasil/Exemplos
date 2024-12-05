from apigratis.Service import Service
from api_brasil import APIBrasilClient, VehiclesApi
from api_brasil.features.vehicles import Endpoints
import json

BEARER_TOKEN = "token_aqui" ## Obtenha em apibrasil.com.br
VEICULOS_DEVICE_TOKEN = "token_aqui" ## Obtenha em https://plataforma.apibrasil.com.br/myaccount/credentials


def veiculos_v1():
    dados = Service().vehicles(json.dumps({
        "action": "dados",
        "credentials": {
            "DeviceToken": VEICULOS_DEVICE_TOKEN,
            "BearerToken": BEARER_TOKEN
        },
        "body":  {
            "placa": "ABC1D34"
        }
    }))

    print(dados)

def veiculos_v2():
    api_client = APIBrasilClient(bearer_token=BEARER_TOKEN)
    api_veiculos = VehiclesApi(api_brasil_client=api_client, device_token=VEICULOS_DEVICE_TOKEN)

    api_veiculos.set_plate(plate="ABC1D34")

    api_response, status_code = api_veiculos.consulta(vechiles_api_endpoint=Endpoints.dados)

    print(status_code)
    print(api_response)
    

if __name__ == "__main__":
    veiculos_v1()
    veiculos_v2()