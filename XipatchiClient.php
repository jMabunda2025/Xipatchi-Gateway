<?php
namespace Xipatchi;

class XipatchiClient
{
    private string $baseUrl;
    private string $token;

    public function __construct(string $baseUrl, string $token)
    {
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->token   = $token;
    }

    private function request(string $endpoint, array $data): array
    {
        $ch = curl_init("{$this->baseUrl}/{$endpoint}");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/x-www-form-urlencoded",
            "Authorization: Bearer {$this->token}"
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resposta = curl_exec($ch);
        curl_close($ch);

        $resultado = json_decode($resposta, true);
        return $resultado ?: ['success' => false, 'message' => 'Resposta inválida', 'data' => []];
    }

    public function processarPagamento(array $dados): array
    {
        return $this->request("payment/processarPagamento", $dados);
    }
}
