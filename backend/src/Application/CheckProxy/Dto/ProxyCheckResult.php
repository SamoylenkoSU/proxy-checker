<?php

declare(strict_types=1);

namespace App\Application\CheckProxy\Dto;

readonly class ProxyCheckResult
{
    public function __construct(
        public string $value,
        public bool $active,
        public ?ProxyDetail $detail = null,
    ) {
    }
}
