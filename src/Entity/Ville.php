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

    #[ORM\OneToMany(mappedBy: 'ville', targetEntity: Restaurant::class)]
    private Collection $restaurants;

    #[ORM\OneToMany(mappedBy: 'ville', targetEntity: Livreur::class)]
    private Collection $livreurs;

    public function __construct()
    {
        $this->zones = new ArrayCollection();
        $this->restaurants = new ArrayCollection();
        $this->livreurs = new ArrayCollection();
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

    /**
     * @return Collection<int, Restaurant>
     */
    public function getRestaurants(): Collection
    {
        return $this->restaurants;
    }

    public function addRestaurant(Restaurant $restaurant): self
    {
        if (!$this->restaurants->contains($restaurant)) {
            $this->restaurants->add($restaurant);
            $restaurant->setVille($this);
        }

        return $this;
    }

    public function removeRestaurant(Restaurant $restaurant): self
    {
        if ($this->restaurants->removeElement($restaurant)) {
            // set the owning side to null (unless already changed)
            if ($restaurant->getVille() === $this) {
                $restaurant->setVille(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Livreur>
     */
    public function getLivreurs(): Collection
    {
        return $this->livreurs;
    }

    public function addLivreur(Livreur $livreur): self
    {
        if (!$this->livreurs->contains($livreur)) {
            $this->livreurs->add($livreur);
            $livreur->setVille($this);
        }

        return $this;
    }

    public function removeLivreur(Livreur $livreur): self
    {
        if ($this->livreurs->removeElement($livreur)) {
            // set the owning side to null (unless already changed)
            if ($livreur->getVille() === $this) {
                $livreur->setVille(null);
            }
        }

        return $this;
    }
}
