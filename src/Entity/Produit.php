<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]
#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $ref;

    #[ORM\Column(type: 'string', length: 255)]
    private $libelle;

    #[ORM\Column(type: 'blob')]
    private $photo;

    #[ORM\Column(type: 'float')]
    private $prix_vente;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\Column(type: 'integer')]
    private $quantite_dispo;

    #[ORM\Column(type: 'date')]
    private $date_ajout;

    #[ORM\ManyToOne(targetEntity: Operateur::class, inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private $operateur;

    #[ORM\ManyToOne(targetEntity: Restaurant::class, inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private $restaurant;

    #[ORM\ManyToOne(targetEntity: CategoriesProduit::class, inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private $categorie_produit;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: AvisProduit::class)]
    private $avisProduits;


    public function __construct()
    {
        $this->avisProduits = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
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

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPrixVente(): ?float
    {
        return $this->prix_vente;
    }

    public function setPrixVente(float $prix_vente): self
    {
        $this->prix_vente = $prix_vente;

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

    public function getQuantiteDispo(): ?int
    {
        return $this->quantite_dispo;
    }

    public function setQuantiteDispo(int $quantite_dispo): self
    {
        $this->quantite_dispo = $quantite_dispo;

        return $this;
    }

    public function getDateAjout(): ?\DateTimeInterface
    {
        return $this->date_ajout;
    }

    public function setDateAjout(\DateTimeInterface $date_ajout): self
    {
        $this->date_ajout = $date_ajout;

        return $this;
    }

    public function getOperateur(): ?Operateur
    {
        return $this->operateur;
    }

    public function setOperateur(?Operateur $operateur): self
    {
        $this->operateur = $operateur;

        return $this;
    }

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    public function getCategorieProduit(): ?CategoriesProduit
    {
        return $this->categorie_produit;
    }

    public function setCategorieProduit(?CategoriesProduit $categorie_produit): self
    {
        $this->categorie_produit = $categorie_produit;

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
            $avisProduit->setProduit($this);
        }

        return $this;
    }

    public function removeAvisProduit(AvisProduit $avisProduit): self
    {
        if ($this->avisProduits->removeElement($avisProduit)) {
            // set the owning side to null (unless already changed)
            if ($avisProduit->getProduit() === $this) {
                $avisProduit->setProduit(null);
            }
        }

        return $this;
    }

}
