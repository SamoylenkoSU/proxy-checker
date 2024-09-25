<?php

namespace App\Messenger\Handler;

use App\Messenger\Messages\CheckProxyMessage;
use App\Service\ProxyCheckReport\ProxyCheckerFacade;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class CheckProxyHandler
{
    public function __construct(
        private ProxyCheckerFacade $proxyChecker
    ) {
    }

    public function __invoke(CheckProxyMessage $message): void
    {
        $this->proxyChecker->check($message->id);
    }
}