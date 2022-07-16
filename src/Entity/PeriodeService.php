<?php

namespace App\Entity;

use App\Repository\PeriodeServiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeriodeServiceRepository::class)]
class PeriodeService
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $date_time_deb;

    #[ORM\Column(type: 'datetime')]
    private $date_time_fin;

    #[ORM\ManyToOne(targetEntity: Livreur::class, inversedBy: 'periodes')]
    #[ORM\JoinColumn(nullable: false)]
    private $livreur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateTimeDeb(): ?\DateTimeInterface
    {
        return $this->date_time_deb;
    }

    public function setDateTimeDeb(\DateTimeInterface $date_time_deb): self
    {
        $this->date_time_deb = $date_time_deb;

        return $this;
    }

    public function getDateTimeFin(): ?\DateTimeInterface
    {
        return $this->date_time_fin;
    }

    public function setDateTimeFin(\DateTimeInterface $date_time_fin): self
    {
        $this->date_time_fin = $date_time_fin;

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
}
