<?php

declare(strict_types=1);

namespace App\Service\ProxyCheckReport;

use App\Entity\Proxy;
use App\Entity\Report;
use App\Messenger\Dispatcher\ProxyReportDispatcher;
use Doctrine\ORM\EntityManagerInterface;

class ProxyReportCreator
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private ProxyReportDispatcher $proxyReportDispatcher,
    ) {
    }

    /**
     * @param array<string> $proxies
     */
    public function create(array $proxies): Report
    {
        $report = new Report();

        $this->entityManager->persist($report);

        foreach ($proxies as $proxy) {
            $proxy = new Proxy(
                $report,
                $proxy,
            );

            $this->entityManager->persist($proxy);
        }

        $this->entityManager->flush();

        $this->proxyReportDispatcher->dispatch($report);

        return $report;
    }
}
