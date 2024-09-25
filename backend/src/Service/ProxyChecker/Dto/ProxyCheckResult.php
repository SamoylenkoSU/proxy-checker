<?php

namespace App\Service\ProxyChecker\Dto;

use App\Entity\Enum\ProxyType;

readonly class ProxyCheckResult
{
    public function __construct(
        public bool $active,
        public ?ProxyType $type = null,
        public ?string $country = null,
        public ?string $city = null,
        public ?string $externalIp = null,
        public ?float $timeout = null
    ) {
    }
}