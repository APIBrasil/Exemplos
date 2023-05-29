const url = 'https://cluster.apigratis.com/api/v1/whatsapp/sendText';
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
