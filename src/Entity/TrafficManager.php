<?php

namespace App\Entity;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TrafficManagerRepository;
use Doctrine\Common\Collections\ArrayCollection;

#[ApiResource]
#[ORM\Entity(repositoryClass: TrafficManagerRepository::class)]
class TrafficManager extends User
{
   
    #[ORM\OneToMany(mappedBy: 'traffic_manager', targetEntity: Livreur::class)]
    private $livreurs;

    #[ORM\OneToMany(mappedBy: 'traffic_manager', targetEntity: RecetteJour::class)]
    private $recetteJours;

    #[ORM\OneToMany(mappedBy: 'traffic_manager', targetEntity: Ville::class)]
    private $villes;



    public function __construct()
    {
        $this->livreurs = new ArrayCollection();
        $this->recetteJours = new ArrayCollection();
        $this->villes = new ArrayCollection();
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
            $this->livreurs[] = $livreur;
            $livreur->setTrafficManager($this);
        }

        return $this;
    }

    public function removeLivreur(Livreur $livreur): self
    {
        if ($this->livreurs->removeElement($livreur)) {
            // set the owning side to null (unless already changed)
            if ($livreur->getTrafficManager() === $this) {
                $livreur->setTrafficManager(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RecetteJour>
     */
    public function getRecetteJours(): Collection
    {
        return $this->recetteJours;
    }

    public function addRecetteJour(RecetteJour $recetteJour): self
    {
        if (!$this->recetteJours->contains($recetteJour)) {
            $this->recetteJours[] = $recetteJour;
            $recetteJour->setTrafficManager($this);
        }

        return $this;
    }

    public function removeRecetteJour(RecetteJour $recetteJour): self
    {
        if ($this->recetteJours->removeElement($recetteJour)) {
            // set the owning side to null (unless already changed)
            if ($recetteJour->getTrafficManager() === $this) {
                $recetteJour->setTrafficManager(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Ville>
     */
    public function getVilles(): Collection
    {
        return $this->villes;
    }

    public function addVille(Ville $ville): self
    {
        if (!$this->villes->contains($ville)) {
            $this->villes[] = $ville;
            $ville->setTrafficManager($this);
        }

        return $this;
    }

    public function removeVille(Ville $ville): self
    {
        if ($this->villes->removeElement($ville)) {
            // set the owning side to null (unless already changed)
            if ($ville->getTrafficManager() === $this) {
                $ville->setTrafficManager(null);
            }
        }

        return $this;
    }
}
