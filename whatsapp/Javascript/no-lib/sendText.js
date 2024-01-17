const url = 'https://gateway.apibrasil.io/api/v2/whatsapp/sendText';
const data = {
  number: '5531994359434',
  text: 'Muito top!'
};
const headers = {
  'Content-Type': 'application/json',
  'SecretKey': 'OBTENHA_O_SEU_SECRET_TOKEN_NO_PAINEL',
  'PublicToken': 'OBTENHA_O_SEU_PUBLIC_TOKEN_NO_PAINEL',
  'DeviceToken': 'OBTENHA_O_SEU_DEVICE_TOKEN_NO_PAINEL',
  'Authorization': 'Bearer OBTENHA_O_SEU_TOKEN'
};

fetch(url, {
    method: 'POST',
    headers: headers,
    body: JSON.stringify(data)
  })
  .then(response => response.json())
  .then(responseData => console.log(responseData))
  .catch(error => console.error(error));