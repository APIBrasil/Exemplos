import 'dart:convert';
import 'package:apigratis_sdk_flutter/apigratis_sdk_flutter.dart';

void main() async {
  final whatsappService = WhatsAppService();
  final cpfService = CpfService();
  final smsService = SmsService();

  final whatsappRequest = ApiRequest<WhatsAppBody>(
    action: 'sendText',
    credentials: Credentials(
      deviceToken: 'your-device-token',
      bearerToken: 'your-bearer-token',
    ),
    body: WhatsAppBody(
      text: 'Hello World for Dart',
      number: '5531994359434',
      timeTyping: 1,
    ),
  );

  final cpfRequest = ApiRequest<CpfBody>(
    action: 'dados',
    credentials: Credentials(
      deviceToken: 'your-device-token',
      bearerToken: 'your-bearer-token',
    ),
    body: CpfBody(
      cpf: '12345678900',
    ),
  );

  final smsRequest = ApiRequest<SmsBody>(
    action: 'send',
    credentials: Credentials(
      deviceToken: 'your-device-token',
      bearerToken: 'your-bearer-token',
    ),
    body: SmsBody(
      message: 'Your verification code is 1234',
      phone: '5531994359434',
    ),
  );

  try {
    final whatsappResponse = await whatsappService.sendText(whatsappRequest);
    print('WhatsApp Response: ${jsonEncode(whatsappResponse)}');

    final cpfResponse = await cpfService.dados(cpfRequest);
    print('CPF Response: ${jsonEncode(cpfResponse)}');

    final smsResponse = await smsService.send(smsRequest);
    print('SMS Response: ${jsonEncode(smsResponse)}');
  } catch (e) {
    print('Error: $e');
  }
}
