<?php

namespace App\Entity;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\LivreurRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

#[ApiResource]
#[ORM\Entity(repositoryClass: LivreurRepository::class)]
class Livreur extends User
{
   
    #[ORM\Column(type: 'boolean')]
    private $disponibilite;

    #[ORM\Column(type: 'string')]
    private $Photo_permis;

    #[ORM\Column(type: 'string', length: 255)]
    private $CIN;

    #[ORM\ManyToOne(targetEntity: TrafficManager::class, inversedBy: 'livreurs')]
    #[ORM\JoinColumn(nullable: true)]
    private $traffic_manager;

    #[ORM\ManyToOne(targetEntity: Zone::class, inversedBy: 'livreurs_zone')]
    #[ORM\JoinColumn(nullable: false)]
    private $zone;

    #[ORM\OneToMany(mappedBy: 'livreur', targetEntity: Commande::class)]
    private $commandes;


    #[ORM\ManyToOne(targetEntity: Vehicule::class, inversedBy: 'livreurs')]
    #[ORM\JoinColumn(nullable: false)]
    private $vehicule;

  
    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }
   


    public function getPhotoPermis()
    {
        return $this->Photo_permis;
    }

    public function setPhotoPermis($Photo_permis): self
    {
        $this->Photo_permis = $Photo_permis;

        return $this;
    }

    public function getCIN(): ?string
    {
        return $this->CIN;
    }

    public function setCIN(string $CIN): self
    {
        $this->CIN = $CIN;

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

    public function getZone(): ?Zone
    {
        return $this->zone;
    }

    public function setZone(?Zone $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setLivreur($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getLivreur() === $this) {
                $commande->setLivreur(null);
            }
        }

        return $this;
        }

    public function isDisponibilite(): ?bool
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(bool $disponibilite): self
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }



    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    
}
