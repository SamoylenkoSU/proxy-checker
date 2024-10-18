<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Entity\Report;

interface ReportRepositoryInterface
{
    public function save(Report $report): void;

    /**
     * @return array<Report>
     */
    public function getList(): array;

    public function getById(int $id): ?Report;
}
