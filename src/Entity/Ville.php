<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\VilleRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

#[ApiResource]
#[ORM\Entity(repositoryClass: VilleRepository::class)]
class Ville
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $libelle;

    #[ORM\OneToMany(mappedBy: 'ville', targetEntity: Zone::class)]
    private $zones;

    #[ORM\ManyToOne(targetEntity: TrafficManager::class, inversedBy: 'villes')]
    private $traffic_manager;

    public function __construct()
    {
        $this->zones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, Zone>
     */
    public function getZones(): Collection
    {
        return $this->zones;
    }

    public function addZone(Zone $zone): self
    {
        if (!$this->zones->contains($zone)) {
            $this->zones[] = $zone;
            $zone->setVille($this);
        }

        return $this;
    }

    public function removeZone(Zone $zone): self
    {
        if ($this->zones->removeElement($zone)) {
            // set the owning side to null (unless already changed)
            if ($zone->getVille() === $this) {
                $zone->setVille(null);
            }
        }

        return $this;
    }

    public function getTrafficManager(): ?TrafficManager
    {
        return $this->traffic_manager;
    }

    public function setTrafficManager(?TrafficManager $traffic_manager): self
    {
        $this->traffic_manager = $traffic_manager;

        return $this;
    }
    public function __toString(){
        return $this->libelle;
    }
}
