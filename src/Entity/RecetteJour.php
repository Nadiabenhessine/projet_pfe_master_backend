<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\RecetteJourRepository;
use ApiPlatform\Core\Annotation\ApiResource;

#[ApiResource]
#[ORM\Entity(repositoryClass: RecetteJourRepository::class)]
class RecetteJour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\Column(type: 'float')]
    private $montant;

    #[ORM\Column(type: 'string', length: 500, nullable: true)]
    private $remarque;

    #[ORM\ManyToOne(targetEntity: TrafficManager::class, inversedBy: 'recetteJours')]
    #[ORM\JoinColumn(nullable: false)]
    private $traffic_manager;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

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

    public function getTrafficManager(): ?TrafficManager
    {
        return $this->traffic_manager;
    }

    public function setTrafficManager(?TrafficManager $traffic_manager): self
    {
        $this->traffic_manager = $traffic_manager;

        return $this;
    }
}
