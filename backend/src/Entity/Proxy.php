<?php

namespace App\Entity;

use App\Entity\Enum\ProxyType;
use App\Repository\ProxyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProxyRepository::class)]
class Proxy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $value;

    #[ORM\ManyToOne(inversedBy: 'proxies')]
    #[ORM\JoinColumn(nullable: false)]
    private Report $report;

    #[ORM\Column(nullable: true, enumType: ProxyType::class)]
    private ?ProxyType $type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $country = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $externalIp = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 4, nullable: true)]
    private ?float $timeout = null;

    #[ORM\Column(nullable: true)]
    private ?bool $active = null;

    #[ORM\Column]
    private bool $checked = false;

    public function getId(): int
    {
        return $this->id;
    }

    public function __construct(
        Report $report,
        string $value,
    ) {
        $this->report = $report;
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getReport(): Report
    {
        return $this->report;
    }

    public function getType(): ?ProxyType
    {
        return $this->type;
    }

    public function setType(?ProxyType $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getExternalIp(): ?string
    {
        return $this->externalIp;
    }

    public function setExternalIp(?string $externalIp): static
    {
        $this->externalIp = $externalIp;
        return $this;
    }

    public function getTimeout(): ?float
    {
        return $this->timeout;
    }

    public function setTimeout(?float $timeout): static
    {
        $this->timeout = $timeout;
        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): static
    {
        $this->active = $active;
        return $this;
    }

    public function isChecked(): bool
    {
        return $this->checked;
    }

    public function setChecked(bool $checked): static
    {
        $this->checked = $checked;

        return $this;
    }
}
