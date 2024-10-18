<?php

declare(strict_types=1);

namespace App\Infrastructure\Messenger\Dispatcher;

use App\Application\BuildReport\BuildReportDispatcherInterface;
use App\Application\BuildReport\Dto\BuildReportCommand;
use App\Domain\Entity\Report;
use Symfony\Component\Messenger\MessageBusInterface;

class BuildReportDispatcher implements BuildReportDispatcherInterface
{
    public function __construct(
        private MessageBusInterface $messageBus,
    ) {
    }

    public function dispatch(Report $report): void
    {
        $message = new BuildReportCommand(
            $report->getId(),
        );

        $this->messageBus->dispatch($message);
    }
}
