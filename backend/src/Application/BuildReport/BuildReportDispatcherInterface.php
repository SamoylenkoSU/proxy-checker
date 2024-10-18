<?php

declare(strict_types=1);

namespace App\Application\BuildReport;

use App\Domain\Entity\Report;

interface BuildReportDispatcherInterface
{
    public function dispatch(Report $report): void;
}
