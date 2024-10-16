<?php

declare(strict_types=1);

namespace App\Service\ProxyCheckReport;

use App\Entity\Proxy;
use App\Repository\ReportRepository;
use App\Service\ProxyChecker\ProxyCheckerInterface;
use Doctrine\ORM\EntityManagerInterface;

class ProxyCheckerFacade
{
    public function __construct(
        private ReportRepository $reportRepository,
        private ProxyCheckerInterface $proxyChecker,
        private EntityManagerInterface $entityManager,
    ) {
    }

    public function check(int $report): void
    {
        $report = $this->reportRepository->find($report);

        $proxies = array_map(
            fn (Proxy $proxy) => $proxy->getValue(),
            $report->getProxies()->toArray(),
        );

        $checkResult = $this->proxyChecker->check($proxies);

        foreach ($checkResult as $item) {
            $proxy = $report->getProxies()->findFirst(
                fn (int $index, Proxy $element) => $element->getValue() === $item->value,
            );

            if (is_null($proxy)) {
                continue;
            }

            $proxy
                ->setChecked(true)
                ->setActive($item->active)
                ->setType($item->type)
                ->setCountry($item->country)
                ->setCity($item->city)
                ->setExternalIp($item->externalIp)
                ->setTimeout($item->timeout);
        }

        $this->entityManager->flush();
    }
}
