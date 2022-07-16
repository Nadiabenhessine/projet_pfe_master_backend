<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReclamationRepository;
use ApiPlatform\Core\Annotation\ApiResource;

#[ApiResource]
#[ORM\Entity(repositoryClass: ReclamationRepository::class)]
class Reclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $date_time;

    #[ORM\Column(type: 'string', length: 500)]
    private $sujet;

    #[ORM\ManyToOne(targetEntity: TypeReclamation::class, inversedBy: 'reclamations')]
    #[ORM\JoinColumn(nullable: false)]
    private $type_reclamation;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'reclamations')]
    private $utilisateur;
 
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

    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    public function setSujet(string $sujet): self
    {
        $this->sujet = $sujet;

        return $this;
    }

    public function getTypeReclamation(): ?TypeReclamation
    {
        return $this->type_reclamation;
    }

    public function setTypeReclamation(?TypeReclamation $type_reclamation): self
    {
        $this->type_reclamation = $type_reclamation;

        return $this;
    }

    public function getUtilisateur(): ?User
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?User $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

   }
