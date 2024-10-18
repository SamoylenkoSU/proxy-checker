<?php

declare(strict_types=1);

namespace App\Application\CreateReport\Dto;

final class CreateReportResponse
{
    public function __construct(
        public int $reportId,
    ) {
    }
}
