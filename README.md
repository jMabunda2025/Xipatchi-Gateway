

# Xipatchi Gateway

O **Xipatchi Gateway** permite que desenvolvedores processem pagamentos em Moçambique de forma simples e segura.  
Você só precisa integrar os arquivos fornecidos e consumir os endpoints com seu **token de acesso**.

---

## 🔑 Autenticação
Todos os pedidos exigem **Bearer Token**:
```http
Authorization: Bearer SEU_TOKEN
```

---

## 📡 Endpoints

### Registrar Desenvolvedor
Para obter o SEU_TOKEN registe-se na plataforma do Xipatchi.  
O token será gerado e deve ser usado na integração.

### Processar Pagamento
```http
POST /payment/processarPagamento
```
Body:
```json
{
  "developer_id": 1,
  "cliente_id": 10,
  "item_id": 5,
  "valor": 1000,
  "telefone": "25884xxxxxxx",
  "metodo": "mpesa"
}
```

Resposta:
```json
{
  "status": "success",
  "mensagem": "Pagamento processado com sucesso",
  "transaction_id": "TX123456"
}
```

---

## 📂 Exemplo de Integração em PHP

```php
require 'XipatchiClient.php';

$client = new XipatchiClient("https://api.xipatchi.com", "SEU_TOKEN");

// Processar pagamento
$resposta = $client->processarPagamento([
    "developer_id" => 1,
    "cliente_id"   => 10,
    "item_id"      => 5,
    "valor"        => 1000,
    "telefone"     => "25884xxxxxxx",
    "metodo"       => "mpesa"
]);

print_r($resposta);
```

---

## ⚙️ Instalação

### Clonar repositório
```bash
git clone https://github.com/jMabunda2025/Xipatchi-Gateway.git
cd Xipatchi-Gateway
```

### Instalar via Composer
No seu projeto PHP:
```bash
composer require jMabunda2025/xipatchi-gateway
```

Depois basta importar:
```php
require 'vendor/autoload.php';

use Xipatchi\XipatchiClient;
```

---

## 📜 Licença
MIT – livre para usar e contribuir.
