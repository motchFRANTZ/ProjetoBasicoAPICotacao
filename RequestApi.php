<?php

class RequestApi
{
    private $response;

    public function __construct()
    {
        $this->response = $this->requisicao();
    }

    private function requisicao()
    {
        $url = 'https://economia.awesomeapi.com.br/last/USD-BRL,EUR-BRL,BTC-BRL';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            throw new Exception("cURL error: $error_msg");
        }

        curl_close($ch);

        return json_decode($response, true); // Decodifica JSON
    }

    public function getResponse()
    {
        return $this->response;
    }
}
?>
