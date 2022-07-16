<?php

namespace App\Entity;

use App\Repository\AvisProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisProduitRepository::class)]
class AvisProduit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $date_time_avis;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;


    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'avisProduits')]
    #[ORM\JoinColumn(nullable: false)]
    private $client;

    #[ORM\ManyToOne(targetEntity: Produit::class, inversedBy: 'avisProduits')]
    private $produit;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateTimeAvis(): ?\DateTimeInterface
    {
        return $this->date_time_avis;
    }

    public function setDateTimeAvis(\DateTimeInterface $date_time_avis): self
    {
        $this->date_time_avis = $date_time_avis;

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

    

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    
}
