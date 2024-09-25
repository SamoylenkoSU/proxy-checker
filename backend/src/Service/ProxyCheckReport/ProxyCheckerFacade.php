<?php

namespace App\Service\ProxyCheckReport;

use App\Repository\ProxyRepository;
use App\Service\ProxyChecker\ProxyChecker;
use Doctrine\ORM\EntityManagerInterface;

class ProxyCheckerFacade
{
    public function __construct(
        private ProxyRepository $proxyRepository,
        private ProxyChecker $proxyChecker,
        private EntityManagerInterface $entityManager
    ) {
    }

    public function check(int $proxyId): void
    {
        $proxy = $this->proxyRepository->find($proxyId);

        $result = $this->proxyChecker->check($proxy->getValue());

        $proxy
            ->setChecked(true)
            ->setActive($result->active)
            ->setType($result->type)
            ->setCountry($result->country)
            ->setCity($result->city)
            ->setExternalIp($result->externalIp)
            ->setTimeout($result->timeout);

        $this->entityManager->flush();
    }
}