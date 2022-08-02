<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

#[ApiResource]
#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $ref;

    #[ORM\Column(type: 'date')]
    private $date_commande;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $adresse_livraison;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $position_livraison;

  
    #[ORM\Column(type: 'date', nullable: true)]
    private $date_prevu_livraison;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $delai_livraion;

    #[ORM\Column(type: 'float', nullable: true)]
    private $frais_livraison;
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $remarque;

    #[ORM\ManyToOne(targetEntity: Livreur::class, inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private $livreur;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private $client;

    #[ORM\ManyToOne(targetEntity: Operateur::class, inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private $operateur;

    #[ORM\OneToOne(inversedBy: 'commande', targetEntity: MeilleurChemin::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $meuilleur_chemin;

    #[ORM\ManyToOne(targetEntity: EtatCommande::class, inversedBy: 'commandes')]
    private $etat_commande;

   
    public function __construct()
    {
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

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->date_commande;
    }

    public function setDateCommande(\DateTimeInterface $date_commande): self
    {
        $this->date_commande = $date_commande;

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

    public function getAdresseLivraison(): ?string
    {
        return $this->adresse_livraison;
    }

    public function setAdresseLivraison(?string $adresse_livraison): self
    {
        $this->adresse_livraison = $adresse_livraison;

        return $this;
    }

    public function getPositionLivraison(): ?string
    {
        return $this->position_livraison;
    }

    public function setPositionLivraison(?string $position_livraison): self
    {
        $this->position_livraison = $position_livraison;

        return $this;
    }

     public function getDatePrevuLivraison(): ?\DateTimeInterface
    {
        return $this->date_prevu_livraison;
    }

    public function setDatePrevuLivraison(?\DateTimeInterface $date_prevu_livraison): self
    {
        $this->date_prevu_livraison = $date_prevu_livraison;

        return $this;
    }

    public function getDelaiLivraion(): ?int
    {
        return $this->delai_livraion;
    }

    public function setDelaiLivraion(?int $delai_livraion): self
    {
        $this->delai_livraion = $delai_livraion;

        return $this;
    }

    public function getFraisLivraison(): ?float
    {
        return $this->frais_livraison;
    }

    public function setFraisLivraison(?float $frais_livraison): self
    {
        $this->frais_livraison = $frais_livraison;

        return $this;
    }

    public function getRemarque(): ?string
    {
        return $this->remarque;
    }

    public function setRemarque(?string $remarque): self
    {
        $this->remarque = $remarque;

        return $this;
    }

    public function getLivreur(): ?Livreur
    {
        return $this->livreur;
    }

    public function setLivreur(?Livreur $livreur): self
    {
        $this->livreur = $livreur;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

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

    public function getMeuilleurChemin(): ?MeilleurChemin
    {
        return $this->meuilleur_chemin;
    }

    public function setMeuilleurChemin(MeilleurChemin $meuilleur_chemin): self
    {
        $this->meuilleur_chemin = $meuilleur_chemin;

        return $this;
    }

    public function getEtatCommande(): ?EtatCommande
    {
        return $this->etat_commande;
    }

    public function setEtatCommande(?EtatCommande $etat_commande): self
    {
        $this->etat_commande = $etat_commande;

        return $this;
    }

}
