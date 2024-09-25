<?php

namespace App\Messenger\Dispatcher;

use App\Entity\Proxy;
use App\Messenger\Messages\CheckProxyMessage;
use Symfony\Component\Messenger\MessageBusInterface;

class CheckProxyDispatcher
{
    public function __construct(
        private MessageBusInterface $messageBus,
    ) {
    }

    public function dispatch(Proxy $proxy): void
    {
        $message = new CheckProxyMessage(
            $proxy->getId()
        );

        $this->messageBus->dispatch($message);
    }
}