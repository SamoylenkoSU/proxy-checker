<?php

namespace App\Service\Sender;

use App\Service\Sender\Dto\CurlResponse;

class CurlSender
{
    /**
     * @param string[] $options
     * @return string
     */
    public function send(string $url, array $options = []): CurlResponse
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);

        foreach ($options as $key => $option) {
            curl_setopt($ch, $key, $option);
        }

        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $totalTime = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
        curl_close($ch);

        return new CurlResponse(
            $httpCode,
            $result,
            $totalTime,
        );
    }
}