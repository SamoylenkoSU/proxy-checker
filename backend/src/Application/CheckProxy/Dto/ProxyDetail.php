<?php

declare(strict_types=1);

namespace App\Application\CheckProxy\Dto;

use App\Domain\Entity\Enum\ProxyType;

readonly class ProxyDetail
{
    public function __construct(
        public ProxyType $type,
        public string $externalIp,
        public float $timeout,
        public ?string $country = null,
        public ?string $city = null,
    ) {
    }
}
