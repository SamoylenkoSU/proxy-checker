<?php

declare(strict_types=1);

namespace App\Domain\Service;

use App\Domain\Entity\Report;
use App\Domain\Factory\ReportFactory;
use App\Domain\Repository\ReportRepositoryInterface;

class ProxyReportCreator
{
    public function __construct(
        private ReportFactory $reportFactory,
        private ReportRepositoryInterface $reportRepository,
    ) {
    }

    /**
     * @param array<string> $proxies
     */
    public function create(array $proxies): Report
    {
        $report = $this->reportFactory->create($proxies);

        $this->reportRepository->save($report);

        return $report;
    }
}
