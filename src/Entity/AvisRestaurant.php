<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AvisRestaurantRepository;

#[ApiResource]
#[ORM\Entity(repositoryClass: AvisRestaurantRepository::class)]
class AvisRestaurant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $date_time_avis;

    #[ORM\Column(type: 'string', length: 1024, nullable: true)]
    private $description;

    #[ORM\ManyToOne(targetEntity: Restaurant::class, inversedBy: 'avisRestaurants')]
    #[ORM\JoinColumn(nullable: false)]
    private $restaurant;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'avisRestaurants')]
    #[ORM\JoinColumn(nullable: false)]
    private $client;


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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

}
