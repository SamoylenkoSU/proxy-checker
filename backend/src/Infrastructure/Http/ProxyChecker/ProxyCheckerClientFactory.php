<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\ProxyChecker;

use ProxyCheckerApi\ProxyCheckerClient;

readonly class ProxyCheckerClientFactory
{
    public function __construct(
        private string $serviceUrl,
    ) {
    }

    public function __invoke(): ProxyCheckerClient
    {
        return new ProxyCheckerClient($this->serviceUrl, [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        ]);
    }
}
