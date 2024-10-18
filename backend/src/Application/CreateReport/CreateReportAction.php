<?php

declare(strict_types=1);

namespace App\Application\CreateReport;

use App\Application\CreateReport\Dto\CreateReportRequest;
use App\Application\CreateReport\Dto\CreateReportResponse;
use App\Domain\Service\ProxyReportCreator;
use App\Infrastructure\Messenger\Dispatcher\BuildReportDispatcher;

class CreateReportAction
{
    public function __construct(
        private ProxyReportCreator $reportCreator,
        private BuildReportDispatcher $reportDispatcher,
    ) {
    }

    public function create(CreateReportRequest $request): CreateReportResponse
    {
        $report = $this->reportCreator->create($request->proxies);

        $this->reportDispatcher->dispatch($report);

        return new CreateReportResponse($report->getId());
    }
}
