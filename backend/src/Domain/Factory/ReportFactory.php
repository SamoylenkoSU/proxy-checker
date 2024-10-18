<?php

declare(strict_types=1);

namespace App\Domain\Factory;

use App\Domain\Entity\Proxy;
use App\Domain\Entity\Report;

class ReportFactory
{
    /**
     * @param array<string> $proxies
     */
    public function create(array $proxies): Report
    {
        $report = new Report();

        foreach ($proxies as $proxy) {
            $report->addProxy(new Proxy(
                $proxy,
            ));
        }

        return $report;
    }
}
