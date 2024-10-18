<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Infrastructure\Repository\ReportRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

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

    /** @var Collection<int, Proxy> */
    #[ORM\OneToMany(targetEntity: Proxy::class, mappedBy: 'report', cascade: ['persist'])]
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

    public function addProxy(Proxy $proxy): static
    {
        if (!$this->proxies->contains($proxy)) {
            $this->proxies->add($proxy);
            $proxy->setReport($this);
        }

        return $this;
    }

    public function removeProxy(Proxy $proxy): static
    {
        if ($this->proxies->removeElement($proxy)) {
            // set the owning side to null (unless already changed)
            if ($proxy->getReport() === $this) {
                $proxy->setReport(null);
            }
        }

        return $this;
    }
}
