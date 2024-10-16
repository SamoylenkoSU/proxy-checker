<?php

declare(strict_types=1);

namespace App\Messenger\Handler;

use App\Messenger\Messages\BuildProxyReportMessage;
use App\Service\ProxyCheckReport\ProxyCheckerFacade;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class CheckProxyHandler
{
    public function __construct(
        private ProxyCheckerFacade $proxyChecker,
    ) {
    }

    public function __invoke(BuildProxyReportMessage $message): void
    {
        $this->proxyChecker->check($message->id);
    }
}
