import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;

public class Main {
    public static void main(String[] args) {
        String url = "https://gateway.apibrasil.io/api/v2/whatsapp/sendText";
        String secretKey = "OBTENHA_O_SEU_SECRET_TOKEN_NO_PAINEL";
        String publicToken = "OBTENHA_O_SEU_PUBLIC_TOKEN_NO_PAINEL";
        String deviceToken = "OBTENHA_O_SEU_DEVICE_TOKEN_NO_PAINEL";
        String authorization = "Bearer OBTENHA_O_SEU_TOKEN";
        String number = "5531994359434";
        String text = "Muito top!";

        try {
            URL apiUrl = new URL(url);
            HttpURLConnection connection = (HttpURLConnection) apiUrl.openConnection();
            connection.setRequestMethod("POST");
            connection.setRequestProperty("Content-Type", "application/json");
            connection.setRequestProperty("SecretKey", secretKey);
            connection.setRequestProperty("PublicToken", publicToken);
            connection.setRequestProperty("DeviceToken", deviceToken);
            connection.setRequestProperty("Authorization", authorization);
            connection.setDoOutput(true);

            String payload = "{\"number\":\"" + number + "\",\"text\":\"" + text + "\"}";

            OutputStream outputStream = connection.getOutputStream();
            outputStream.write(payload.getBytes());
            outputStream.flush();

            if (connection.getResponseCode() == 200) {
                BufferedReader reader = new BufferedReader(new InputStreamReader(connection.getInputStream()));
                String line;
                StringBuilder response = new StringBuilder();

                while ((line = reader.readLine()) != null) {
                    response.append(line);
                }

                reader.close();
                System.out.println(response.toString());
           
