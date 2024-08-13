from apigratis.Service import Service
from dotenv import load_dotenv
import json, os

def whatsapp():

    load_dotenv()
    bearer = os.getenv("BEARER_TOKEN")

    sendFile = Service().sms(json.dumps({
        "action": "send",
        "credentials": {
            "DeviceToken": "24ee6be2-f4f4-4a9a-9af9.....",
            "BearerToken": str(bearer)
        },
        "body":  {
            "number":"5531994359434",
            "message": "Ola mundo!"
        }
    }))

    print(sendFile)

if __name__ == "__main__":
    whatsapp()