<?php

namespace App\Entity;

use App\Repository\ReportRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;

#[ORM\Entity(repositoryClass: ReportRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Report
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private DateTimeImmutable $createdAt;

    /**
     * @var Collection<int, Proxy>
     */
    #[ORM\OneToMany(targetEntity: Proxy::class, mappedBy: 'report')]
    private Collection $proxies;

    #[ORM\PrePersist]
    public function onPrePersist(): void
    {
        $this->setCreatedAt(new DateTimeImmutable());
    }

    public function __construct()
    {
        $this->proxies = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<int, Proxy>
     */
    public function getProxies(): Collection
    {
        return $this->proxies;
    }
}
