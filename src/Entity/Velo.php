<?php

namespace App\Entity;

use App\Repository\VeloRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VeloRepository::class)]
class Velo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'boolean')]
    private $est_reserve;

    #[ORM\ManyToOne(targetEntity: Station::class, inversedBy: 'velos')]
    private $station;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEstReserve(): ?bool
    {
        return $this->est_reserve;
    }

    public function setEstReserve(bool $est_reserve): self
    {
        $this->est_reserve = $est_reserve;

        return $this;
    }

    public function getStation(): ?Station
    {
        return $this->station;
    }

    public function setStation(?Station $station): self
    {
        $this->station = $station;

        return $this;
    }
}
