<?php

namespace App\Service\Sender\Dto;

readonly class CurlResponse
{
    public function __construct(
        public int $httpStatus,
        public string $output,
        public float $totalTime
    ) {
    }
}