<?php

namespace App\Entity;

use App\Repository\RestaurantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]
#[ORM\Entity(repositoryClass: RestaurantRepository::class)]
class Restaurant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $num_tel;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\OneToMany(mappedBy: 'restaurant', targetEntity: Produit::class, orphanRemoval: true)]
    private $produits;

    #[ORM\ManyToOne(inversedBy: 'restaurants')]
    private ?Ville $ville = null;

    #[ORM\ManyToOne(targetEntity: CategoriesRestaurant::class, inversedBy: 'restaurants')]
    #[ORM\JoinColumn(nullable: false)]
    private $categorie_restaurant;

    #[ORM\OneToMany(mappedBy: 'restaurant', targetEntity: Abonnement::class)]
    private $abonnements;

    #[ORM\OneToMany(mappedBy: 'restaurant', targetEntity: Operateur::class)]
    private $operateurs;

    #[ORM\OneToMany(mappedBy: 'restaurant', targetEntity: AvisRestaurant::class)]
    private $avisRestaurants;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $statu;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageUrl = null;

    

    
    public function __construct()
    {
        $this->produits = new ArrayCollection();
        $this->abonnements = new ArrayCollection();
        $this->operateurs = new ArrayCollection();
        $this->avisRestaurants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNumTel(): ?string
    {
        return $this->num_tel;
    }

    public function setNumTel(string $num_tel): self
    {
        $this->num_tel = $num_tel;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

  

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setRestaurant($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getRestaurant() === $this) {
                $produit->setRestaurant(null);
            }
        }

        return $this;
    }

    public function getCategorieRestaurant(): ?CategoriesRestaurant
    {
        return $this->categorie_restaurant;
    }

    public function setCategorieRestaurant(?CategoriesRestaurant $categorie_restaurant): self
    {
        $this->categorie_restaurant = $categorie_restaurant;

        return $this;
    }

    /**
     * @return Collection<int, Abonnement>
     */
    public function getAbonnements(): Collection
    {
        return $this->abonnements;
    }

    public function addAbonnement(Abonnement $abonnement): self
    {
        if (!$this->abonnements->contains($abonnement)) {
            $this->abonnements[] = $abonnement;
            $abonnement->setRestaurant($this);
        }

        return $this;
    }

    public function removeAbonnement(Abonnement $abonnement): self
    {
        if ($this->abonnements->removeElement($abonnement)) {
            // set the owning side to null (unless already changed)
            if ($abonnement->getRestaurant() === $this) {
                $abonnement->setRestaurant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Operateur>
     */
    public function getOperateurs(): Collection
    {
        return $this->operateurs;
    }

    public function addOperateur(Operateur $operateur): self
    {
        if (!$this->operateurs->contains($operateur)) {
            $this->operateurs[] = $operateur;
            $operateur->setRestaurant($this);
        }

        return $this;
    }

    public function removeOperateur(Operateur $operateur): self
    {
        if ($this->operateurs->removeElement($operateur)) {
            // set the owning side to null (unless already changed)
            if ($operateur->getRestaurant() === $this) {
                $operateur->setRestaurant(null);
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
            $avisRestaurant->setRestaurant($this);
        }

        return $this;
    }

    public function removeAvisRestaurant(AvisRestaurant $avisRestaurant): self
    {
        if ($this->avisRestaurants->removeElement($avisRestaurant)) {
            // set the owning side to null (unless already changed)
            if ($avisRestaurant->getRestaurant() === $this) {
                $avisRestaurant->setRestaurant(null);
            }
        }

        return $this;
    }

      public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
    public function __toString(){
        return $this->nom;
    }

    public function isStatu(): ?bool
    {
        return $this->statu;
    }

    public function setStatu(?bool $statu): self
    {
        $this->statu = $statu;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(?string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getVille(): ?Ville
    {
        return $this->ville;
    }

    public function setVille(?Ville $ville): self
    {
        $this->ville = $ville;

        return $this;
    }
}

