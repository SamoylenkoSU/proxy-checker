<?php

namespace App\Service\ProxyChecker;

use App\Service\ProxyChecker\Dto\ProxyCheckResult;
use App\Service\Sender\CurlSender;

class ProxyChecker
{
    public function __construct(
        private CurlSender $curlSender,
        private ProxyTypeDetector $proxyTypeDetector,
        private string $ipApiUrl = 'http://ip-api.com/json/'
    ) {
    }

    public function check(string $proxy): ProxyCheckResult
    {
        $checkup = $this->curlSender->send($this->ipApiUrl, [
            CURLOPT_TIMEOUT => 10,
        ]);

        if ($checkup->httpStatus !== 200) {
            throw new \Exception('Temporarily error. Ip server failed');
        }

        $proxyResponse = $this->curlSender->send($this->ipApiUrl, [
            CURLOPT_PROXY => $proxy,
            CURLOPT_TIMEOUT => 30,
        ]);

        if ($proxyResponse->httpStatus !== 200) {
            return new ProxyCheckResult(false);
        }

        $body = json_decode($proxyResponse->output, true);

        return new ProxyCheckResult(
            $proxyResponse->httpStatus === 200,
            $this->proxyTypeDetector->detect($this->ipApiUrl, $proxy),
            $body['country'] ?? null,
            $body['city'] ?? null,
            $body['query'] ?? null,
            $proxyResponse->totalTime * 1000
        );
    }
}