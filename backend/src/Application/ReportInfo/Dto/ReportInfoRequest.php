<?php

declare(strict_types=1);

namespace App\Application\ReportInfo\Dto;

readonly class ReportInfoRequest
{
    public function __construct(
        public int $reportId,
    ) {
    }
}
