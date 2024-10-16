<?php

declare(strict_types=1);

namespace App\Messenger\Messages;

readonly class BuildProxyReportMessage
{
    public function __construct(
        public int $id,
    ) {
    }
}
