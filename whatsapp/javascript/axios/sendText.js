const axios = require('axios');

const sendText = async () => {
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

  try {
    const response = await axios.post(url, data, { headers });
    console.log(response.data);
  } catch (error) {
    console.error(error);
  }
};

sendText();
