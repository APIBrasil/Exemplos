URL url = new URL("https://gateway.apibrasil.io/api/v2/whatsapp/sendText");
httpConnection = (HttpURLConnection)url.openConnection();
httpConnection.setRequestMethod("POST");
httpConnection.setDoOutput(true);
httpConnection.setRequestProperty("Content-Type", "application/json");
httpConnection.setRequestProperty("SecretKey", "SECRETKEY");
httpConnection.setRequestProperty("PublicToken", "PUBLICTOKEN");
httpConnection.setRequestProperty("DeviceToken", "DEVICETOKEN");
httpConnection.setRequestProperty("Authorization", "Bearer AUTHORIZATION");

String params = "{\"number\":\"" + "TELEFONE" + "\"," + 
    "\"text\":\"" + "MENSAGEM" + "\"" +
    "}";

byte[] out = params.getBytes(StandardCharsets.UTF_8);

OutputStream stream = httpConnection.getOutputStream();
stream.write(out);
