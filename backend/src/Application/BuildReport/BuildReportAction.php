<?php

declare(strict_types=1);

namespace App\Application\BuildReport;

use App\Application\BuildReport\Dto\BuildReportCommand;
use App\Application\CheckProxy\ProxyCheckerInterface;
use App\Domain\Entity\Proxy;
use App\Domain\Repository\ReportRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class BuildReportAction
{
    public function __construct(
        private ReportRepositoryInterface $reportRepository,
        private ProxyCheckerInterface $proxyChecker,
        private EntityManagerInterface $entityManager,
    ) {
    }

    public function buildReport(BuildReportCommand $command): void
    {
        $report = $this->reportRepository->find($command->reportId);

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
                ->setActive($item->active);

            if ($item->detail) {
                $proxy
                    ->setType($item->detail->type)
                    ->setExternalIp($item->detail->externalIp)
                    ->setTimeout($item->detail->timeout)
                    ->setCountry($item->detail->country)
                    ->setCity($item->detail->city);
            }
        }

        $this->entityManager->flush();
    }
}
