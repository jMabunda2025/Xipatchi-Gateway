<?php
require_once __DIR__ . '/XipatchiClient.php';

use Xipatchi\XipatchiClient;

$token = "YOU_TOQUEN";
$client = new XipatchiClient("URL_BASE", $token);

$dados = [
    "cliente_id" => 2,
    "developer_id" => 1,
    "item_id"    => 1,
    "metodo"     => "mpesa",
    "mpesa"      => "841234567",
    "amount"     => 500
];

$resultado = $client->processarPagamento($dados);

header('Content-Type: application/json');
echo json_encode($resultado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);


