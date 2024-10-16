<?php

namespace App\Messenger\Messages;

readonly class BuildProxyReportMessage
{
    public function __construct(
        public int $id
    ) {
    }
}