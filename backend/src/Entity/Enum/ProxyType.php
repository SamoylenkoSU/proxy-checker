<?php

namespace App\Entity\Enum;

enum ProxyType: int
{
    case HTTP = 0;
    case HTTPS = 1;
    case SOCK5 = 2;
}
