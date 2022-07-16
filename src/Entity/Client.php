<?php

namespace App\Entity;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ClientRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client extends User
{
      
    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Commande::class)]
    private $commandes;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: AvisProduit::class)]
    private $avisProduits;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: AvisRestaurant::class)]
    private $avisRestaurants;


    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->avisProduits = new ArrayCollection();
        $this->avisRestaurants = new ArrayCollection();
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
            $commande->setClient($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getClient() === $this) {
                $commande->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AvisProduit>
     */
    public function getAvisProduits(): Collection
    {
        return $this->avisProduits;
    }

    public function addAvisProduit(AvisProduit $avisProduit): self
    {
        if (!$this->avisProduits->contains($avisProduit)) {
            $this->avisProduits[] = $avisProduit;
            $avisProduit->setClient($this);
        }

        return $this;
    }

    public function removeAvisProduit(AvisProduit $avisProduit): self
    {
        if ($this->avisProduits->removeElement($avisProduit)) {
            // set the owning side to null (unless already changed)
            if ($avisProduit->getClient() === $this) {
                $avisProduit->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AvisRestaurant>
     */
    public function getAvisRestaurants(): Collection
    {
        return $this->avisRestaurants;
    }

    public function addAvisRestaurant(AvisRestaurant $avisRestaurant): self
    {
        if (!$this->avisRestaurants->contains($avisRestaurant)) {
            $this->avisRestaurants[] = $avisRestaurant;
            $avisRestaurant->setClient($this);
        }

        return $this;
    }

    public function removeAvisRestaurant(AvisRestaurant $avisRestaurant): self
    {
        if ($this->avisRestaurants->removeElement($avisRestaurant)) {
            // set the owning side to null (unless already changed)
            if ($avisRestaurant->getClient() === $this) {
                $avisRestaurant->setClient(null);
            }
        }

        return $this;
    }

    
}
