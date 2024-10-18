<?php

declare(strict_types=1);

namespace App\Application\CheckProxy;

use App\Application\CheckProxy\Dto\ProxyCheckResult;

interface ProxyCheckerInterface
{
    /**
     * @param array<string> $proxy
     * @return array<ProxyCheckResult>
     */
    public function check(array $proxy): array;
}
