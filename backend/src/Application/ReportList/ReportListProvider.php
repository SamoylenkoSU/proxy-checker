<?php

declare(strict_types=1);

namespace App\Application\ReportList;

use App\Domain\Repository\ReportRepositoryInterface;

class ReportListProvider
{
    public function __construct(
        private ReportRepositoryInterface $reportRepository,
    ) {
    }

    public function getList(): array
    {
        return $this->reportRepository->getList();
    }
}
