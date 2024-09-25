<?php

namespace App\Entity\Enum;

enum ProxyType: int
{
    case HTTP = 1;
    case SOCK5 = 2;
}
