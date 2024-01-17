#include <stdio.h>
#include <curl/curl.h>

int main(void)
{
    CURL *curl;
    CURLcode res;
    const char *url = "https://gateway.apibrasil.io/api/v2/whatsapp/sendText";
    const char *jsonBody = "{\"number\":\"5531994359434\",\"text\":\"Muito top!\"}";

    curl_global_init(CURL_GLOBAL_DEFAULT);

    curl = curl_easy_init();
    
    if (curl) {
        struct curl_slist *headers = NULL;
        headers = curl_slist_append(headers, "Content-Type: application/json");
        headers = curl_slist_append(headers, "SecretKey: OBTENHA_O_SEU_SECRET_TOKEN_NO_PAINEL");
        headers = curl_slist_append(headers, "PublicToken: OBTENHA_O_SEU_PUBLIC_TOKEN_NO_PAINEL");
        headers = curl_slist_append(headers, "DeviceToken: OBTENHA_O_SEU_DEVICE_TOKEN_NO_PAINEL");
        headers = curl_slist_append(headers, "Authorization: Bearer OBTENHA_O_SEU_TOKEN");

        curl_easy_setopt(curl, CURLOPT_URL, url);
        curl_easy_setopt(curl, CURLOPT_POST, 1L);
        curl_easy_setopt(curl, CURLOPT_POSTFIELDS, jsonBody);
        curl_easy_setopt(curl, CURLOPT_HTTPHEADER, headers);

        res = curl_easy_perform(curl);
        if (res != CURLE_OK)
            fprintf(stderr, "curl_easy_perform() failed: %s\n", curl_easy_strerror(res));

        curl_slist_free_all(headers);
        curl_easy_cleanup(curl);
    }

    curl_global_cleanup();

    return 0;
}
