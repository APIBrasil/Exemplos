from apigratis.Service import Service
from dotenv import load_dotenv
import json, os

def whatsapp():
    
    load_dotenv()
    bearer = os.getenv("BEARER_TOKEN")

    sendFile = Service().whatsapp(json.dumps({
        "action": "sendFile",
        "credentials": {
            "DeviceToken": "f937d7f6-7b36-4872-b666.....",
            "BearerToken": str(bearer)
        },
        "body":  {
            "path" : "https://assets.nagios.com/downloads/nagiosxi/docs/Installing_The_XI_Linux_Agent.pdf",
            "number" : "5531994359434",
            "options" : {
                "caption": "texto do caption para arquivo",
                "createChat": True,
                "filename": "arquivo X"
            }
        }
    }))

    print(sendFile)

if __name__ == "__main__":
    whatsapp()