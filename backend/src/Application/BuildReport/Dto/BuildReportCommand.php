<?php

declare(strict_types=1);

namespace App\Application\BuildReport\Dto;

readonly class BuildReportCommand
{
    public function __construct(
        public int $reportId,
    ) {
    }
}
