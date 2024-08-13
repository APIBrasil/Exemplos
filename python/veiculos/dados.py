from apigratis.Service import Service
from dotenv import load_dotenv
import json, os

def whatsapp():

    load_dotenv()
    bearer = os.getenv("BEARER_TOKEN")

    dados = Service().vehicles(json.dumps({
        "action": "dados",
        "credentials": {
            "DeviceToken": "2445b404-63c2-48c1-aec7.....",
            "BearerToken": str(bearer)
        },
        "body":  {
            "placa": "OQH3A65"
        }
    }))

    print(dados)

if __name__ == "__main__":
    whatsapp()