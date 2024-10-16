<?php

declare(strict_types=1);

namespace App\Service\ProxyChecker;

use ProxyCheckerApi\ProxyCheckerClient;

class ProxyCheckerClientFactory
{
    public function __construct(
        private readonly string $serviceUrl,
    ) {
    }

    public function __invoke(): ProxyCheckerClient
    {
        return new ProxyCheckerClient($this->serviceUrl, [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        ]);
    }
}
