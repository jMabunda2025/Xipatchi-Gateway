# Xipatchi Gateway - Integração de Pagamentos

O **Xipatchi Gateway** é um serviço de API para processar pagamentos via M-Pesa e outros métodos.  
Este pacote fornece um cliente PHP simples e exemplos de integração.

---

## 🚀 Como começar

1. **Obtenha o seu token de desenvolvedor**  
   - Registre-se no gateway (`/developer/register`).  
   - Guarde o token gerado para autenticação.

2. **Inclua o cliente PHP**  
   - Copie `XipatchiClient.php` para o seu projeto.  
   - Instancie com a URL base e o token:

   ```php
   require_once 'XipatchiClient.php';
   use Xipatchi\XipatchiClient;

   $client = new XipatchiClient("https://api.xipatchi.com", "SEU_TOKEN");

3. **Envie um pagamento**
    ```php
    $dados = [
        "cliente_id" => 2,
        "item_id"    => 1,
        "metodo"     => "mpesa",
        "mpesa"      => "84123456",
        "amount"     => 50
    ];

    $resultado = $client->processarPagamento($dados);

    header('Content-Type: application/json');
    echo json_encode($resultado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

4. **Endpoints principais**
  POST /payment/processarPagamento → Processa um pagamento.

  POST /developer/register → Registra um novo desenvolvedor e gera token.

  POST /developer/validate → Valida token de acesso.

🔐 **Autenticação**
  Todas as requisições devem incluir o cabeçalho:
  
  Authorization: Bearer SEU_TOKEN

📦 **Resposta JSON**
  Exemplo de resposta de sucesso:
    {
      "success": true,
      "message": "✅ Pagamento confirmado pela M-Pesa.",
      "data": {
        "cliente_id": "2",
        "item_id": "1",
        "transaction": "cc2a41rjx1hl",
        "reference": null
      }
    }

  Exemplo de resposta de erro:
    {
      "success": false,
      "message": "❌ Falha no pagamento.",
      "data": {}
    }




