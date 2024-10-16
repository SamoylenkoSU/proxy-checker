<?php

declare(strict_types=1);

namespace App\Entity\Enum;

enum ProxyType: int
{
    case HTTP = 0;
    case HTTPS = 1;
    case SOCK5 = 2;
}
