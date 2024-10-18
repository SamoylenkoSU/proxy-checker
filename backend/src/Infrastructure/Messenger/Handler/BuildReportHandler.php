<?php

declare(strict_types=1);

namespace App\Infrastructure\Messenger\Handler;

use App\Application\BuildReport\BuildReportAction;
use App\Application\BuildReport\Dto\BuildReportCommand;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class BuildReportHandler
{
    public function __construct(
        private BuildReportAction $buildReportAction,
    ) {
    }

    public function __invoke(BuildReportCommand $command): void
    {
        $this->buildReportAction->buildReport($command);
    }
}
