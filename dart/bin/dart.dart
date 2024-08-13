// Exemplo de uso
void main() async {

  final whatsappService = WhatsAppService();
  final cpfService = CpfService();
  final smsService = SmsService();

  final request = ApiRequest(
    credentials: Credentials(
      deviceToken: 'YOUR_DEVICE_TOKEN',
      bearerToken: 'YOUR_BEARER_TOKEN',
    ),
    body: Body(
      text: 'Hello World for Dart',
      number: '5531994359434',
      timeTyping: 1,
    ),
  );

  try {

    // Enviar mensagem no WhatsApp
    final whatsappResponse = await whatsappService.sendText(request);
    print('Resposta do WhatsApp: ${jsonEncode(whatsappResponse)}');

    // Consultar CPF
    final cpfResponse = await cpfService.dados(request);
    print('Resposta do CPF: ${jsonEncode(cpfResponse)}');

    // Enviar SMS
    final smsResponse = await smsService.send(request);
    print('Resposta do SMS: ${jsonEncode(smsResponse)}');

  } catch (e) {
    print('Erro: $e');
  }
  
}