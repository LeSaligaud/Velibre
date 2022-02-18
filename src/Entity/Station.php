<?php

namespace App\Entity;

use App\Repository\StationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StationRepository::class)]
class Station
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'float')]
    private $emplacement_lat;

    #[ORM\Column(type: 'float')]
    private $emplacement_lon;

    #[ORM\OneToMany(mappedBy: 'station', targetEntity: Velo::class)]
    private $velos;

    public function __construct()
    {
        $this->velos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmplacementLat(): ?float
    {
        return $this->emplacement_lat;
    }

    public function setEmplacementLat(float $emplacement_lat): self
    {
        $this->emplacement_lat = $emplacement_lat;

        return $this;
    }

    public function getEmplacementLon(): ?float
    {
        return $this->emplacement_lon;
    }

    public function setEmplacementLon(float $emplacement_lon): self
    {
        $this->emplacement_lon = $emplacement_lon;

        return $this;
    }

    /**
     * @return Collection|Velo[]
     */
    public function getVelos(): Collection
    {
        return $this->velos;
    }

    public function addVelo(Velo $velo): self
    {
        if (!$this->velos->contains($velo)) {
            $this->velos[] = $velo;
            $velo->setStation($this);
        }

        return $this;
    }

    public function removeVelo(Velo $velo): self
    {
        if ($this->velos->removeElement($velo)) {
            // set the owning side to null (unless already changed)
            if ($velo->getStation() === $this) {
                $velo->setStation(null);
            }
        }

        return $this;
    }
}
