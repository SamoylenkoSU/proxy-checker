<?php

namespace App\Service\ProxyChecker;

use App\Entity\Enum\ProxyType;
use App\Service\Sender\CurlSender;

class ProxyTypeDetector
{
    public function __construct(
        private CurlSender $curlSender,
    ) {
    }

    public function detect(string $url, string $proxy): ProxyType
    {
        $response = $this->curlSender->send(
            $url,
            [
                CURLOPT_PROXY => $proxy,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_PROXYTYPE => CURLPROXY_HTTP
            ]
        );

        return $response->httpStatus === 200 ? ProxyType::HTTP : ProxyType::SOCK5;
    }
}