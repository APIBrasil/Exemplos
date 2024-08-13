from apigratis.Service import Service
import json

def cnpj():

    dados = Service().cnpj(json.dumps({
        "action": "cnpj",
        "credentials": {
            "DeviceToken": "b85a1b33-95e2-413d-875d-c4d6267dd544",
            "BearerToken": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2dhdGV3YXkuYXBpYnJhc2lsLmlvL2FwaS92Mi9sb2dpbiIsImlhdCI6MTcyMzQ2NTkyNCwiZXhwIjoxNzU1MDAxOTI0LCJuYmYiOjE3MjM0NjU5MjQsImp0aSI6IldEMlVzTzBkTEM3NlJaanUiLCJzdWIiOiIyIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.UhNU8cVok-MBHsb84YiYgERYXgWnyI4vebbQvmmxSYU",
        },
        "body": {
            "cnpj": "44.959.669/0001-80",
        }
    }))

    print(dados)

if __name__ == "__main__":
    cnpj()