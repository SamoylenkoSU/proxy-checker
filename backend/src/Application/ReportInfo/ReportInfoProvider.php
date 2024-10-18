<?php

declare(strict_types=1);

namespace App\Application\ReportInfo;

use App\Application\ReportInfo\Dto\ReportInfoRequest;
use App\Domain\Entity\Report;
use App\Domain\Repository\ReportRepositoryInterface;
use Exception;

class ReportInfoProvider
{
    public function __construct(
        private ReportRepositoryInterface $reportRepository,
    ) {
    }

    public function getReport(ReportInfoRequest $request): Report
    {
        $report = $this->reportRepository->getById($request->reportId);

        if (is_null($report)) {
            throw new Exception('Report not found');
        }

        return $report;
    }
}
