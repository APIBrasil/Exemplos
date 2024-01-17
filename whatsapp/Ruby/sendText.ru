require 'net/http'
require 'json'

url = URI.parse('https://gateway.apibrasil.io/api/v2/whatsapp/sendText')
http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true

secret_key = 'OBTENHA_O_SEU_SECRET_TOKEN_NO_PAINEL'
public_token = 'OBTENHA_O_SEU_PUBLIC_TOKEN_NO_PAINEL'
device_token = 'OBTENHA_O_SEU_DEVICE_TOKEN_NO_PAINEL'
authorization = 'Bearer OBTENHA_O_SEU_TOKEN'
number = '5531994359434'
text = 'Muito top!'

headers = {
  'Content-Type': 'application/json',
  'SecretKey': secret_key,
  'PublicToken': public_token,
  'DeviceToken': device_token,
  'Authorization': authorization
}

data = {
  number: number,
  text: text
}

request = Net::HTTP::Post.new(url.path, headers)
request.body = data.to_json

response = http.request(request)

if response.code == '200'
  puts response.body
else
  puts "Erro: #{response.code}"
end
