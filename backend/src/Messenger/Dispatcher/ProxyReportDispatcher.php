<?php

declare(strict_types=1);

namespace App\Messenger\Dispatcher;

use App\Entity\Report;
use App\Messenger\Messages\BuildProxyReportMessage;
use Symfony\Component\Messenger\MessageBusInterface;

class ProxyReportDispatcher
{
    public function __construct(
        private MessageBusInterface $messageBus,
    ) {
    }

    public function dispatch(Report $proxy): void
    {
        $message = new BuildProxyReportMessage(
            $proxy->getId(),
        );

        $this->messageBus->dispatch($message);
    }
}
