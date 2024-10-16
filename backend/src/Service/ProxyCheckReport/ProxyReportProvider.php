<?php

declare(strict_types=1);

namespace App\Service\ProxyCheckReport;

use App\Entity\Report;
use App\Repository\ReportRepository;
use Exception;

class ProxyReportProvider
{
    public function __construct(
        private ReportRepository $reportRepository,
    ) {
    }

    public function getReport(int $id): Report
    {
        $report = $this->reportRepository->find($id);

        if (is_null($report)) {
            throw new Exception('Report not found');
        }

        return $report;
    }

    /**
     * @return array<Report>
     */
    public function getList(): array
    {
        return $this->reportRepository->findAll();
    }
}
