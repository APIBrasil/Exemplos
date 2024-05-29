const url = 'https://gateway.apibrasil.io/api/v2/whatsapp/sendText';
const data = {
  number: '5531994359434',
  text: 'Muito top!'
};
const headers = {
  'Content-Type': 'application/json',
  'DeviceToken': 'OBTENHA_O_SEU_DEVICE_TOKEN_NO_PAINEL',
  'Authorization': 'Bearer OBTENHA_O_SEU_TOKEN'
};

$.ajax({
  url: url,
  type: 'POST',
  headers: headers,
  data: JSON.stringify(data),
  dataType: 'json',
  success: function(response) {
    console.log(response);
  },
  error: function(error) {
    console.error(error);
  }
});
