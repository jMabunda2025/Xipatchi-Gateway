<?php
require_once __DIR__ . '/XipatchiClient.php';

use Xipatchi\XipatchiClient;

$token = "696f53ffd50b4963f6496c4ac5faeb2a587bd975828e89964e668a641d95c410";
$client = new XipatchiClient("http://localhost/xipatchi", $token);

$dados = [
    "cliente_id" => 2,
    "developer_id" => 1,
    "item_id"    => 1,
    "metodo"     => "mpesa",
    "mpesa"      => "842252999",
    "amount"     => 500
];

$resultado = $client->processarPagamento($dados);

header('Content-Type: application/json');
echo json_encode($resultado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

