<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MeilleurCheminRepository;

#[ApiResource]
#[ORM\Entity(repositoryClass: MeilleurCheminRepository::class)]
class MeilleurChemin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $date_time;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description_probleme;

    #[ORM\OneToOne(mappedBy: 'meuilleur_chemin', targetEntity: Commande::class, cascade: ['persist', 'remove'])]
    private $commande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateTime(): ?\DateTimeInterface
    {
        return $this->date_time;
    }

    public function setDateTime(\DateTimeInterface $date_time): self
    {
        $this->date_time = $date_time;

        return $this;
    }

    public function getDescriptionProbleme(): ?string
    {
        return $this->description_probleme;
    }

    public function setDescriptionProbleme(?string $description_probleme): self
    {
        $this->description_probleme = $description_probleme;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(Commande $commande): self
    {
        // set the owning side of the relation if necessary
        if ($commande->getMeuilleurChemin() !== $this) {
            $commande->setMeuilleurChemin($this);
        }

        $this->commande = $commande;

        return $this;
    }
}
