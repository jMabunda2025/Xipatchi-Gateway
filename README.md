
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
Para obter o SEU_TOKEN registe-se na plataforma do xipatchi e la sera gerado o token. Bas copia-lo para usar na integracao

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

$client = new XipatchiClient("SEU_TOKEN");

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

## 📜 Licença
MIT – livre para usar e contribuir.
```

---

👉 Este README é direto ao ponto: mostra **como autenticar**, **quais endpoints usar** e **um exemplo de integração em PHP**.
