<?php

namespace App\Messenger\Messages;

readonly class CheckProxyMessage
{
    public function __construct(
        public int $id
    ) {
    }
}