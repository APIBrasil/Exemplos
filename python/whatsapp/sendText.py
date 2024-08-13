from apigratis.Service import Service
from dotenv import load_dotenv
import json, os

def whatsapp():

    load_dotenv()
    bearer = os.getenv("BEARER_TOKEN")

    sendText = Service().whatsapp(json.dumps({
        "action": "sendText",
        "credentials": {
            "DeviceToken": "f937d7f6-7b36-4872-b666.....",
            "BearerToken": str(bearer)
        },
        "body": {
            "text": "Hello World for Python",
            "number": "5531994359434",
            "time_typing": 1
        }
    }))

    print(sendText)

if __name__ == "__main__":
    whatsapp()