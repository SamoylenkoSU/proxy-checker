<?php

declare(strict_types=1);

namespace App\Service\ProxyChecker;

use App\Service\ProxyChecker\Dto\ProxyCheckResult;

interface ProxyCheckerInterface
{
    /**
     * @param array<string> $proxy
     * @return array<ProxyCheckResult>
     */
    public function check(array $proxy): array;
}
