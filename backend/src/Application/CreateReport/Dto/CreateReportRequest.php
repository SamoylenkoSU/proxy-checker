<?php

declare(strict_types=1);

namespace App\Application\CreateReport\Dto;

final class CreateReportRequest
{
    /**
     * @param array<string> $proxies
     */
    public function __construct(
        public array $proxies,
    ) {
    }
}
