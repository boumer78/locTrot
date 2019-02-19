<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table("Offers")
 * @ORM\Entity(repositoryClass="App\Repository\OffersRepository")
 */
class Offers
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $offer_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;


    /**
     * @ORM\Column(type="string", length=50)
     */

    private $price;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $time_location;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $options;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pictures;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nb_scooter_total;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nb_scooter_available;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOfferName(): ?string
    {
        return $this->offer_name;
    }

    public function setOfferName(string $offer_name): self
    {
        $this->offer_name = $offer_name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription($description): self
    {
        $this->description = $description;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getTimeLocation(): ?string
    {
        return $this->time_location;
    }

    public function setTimeLocation(string $time_location): self
    {
        $this->time_location = $time_location;

        return $this;
    }

    public function getOptions(): ?string
    {
        return $this->options;
    }

    public function setOptions(string $options): self
    {
        $this->options = $options;

        return $this;
    }

    public function getPictures(): ?string
    {
        return $this->pictures;
    }

    public function setPictures(string $pictures): self
    {
        $this->pictures = $pictures;

        return $this;
    }

    public function getNbScooterTotal(): ?string
    {
        return $this->nb_scooter_total;
    }

    public function setNbScooterTotal(string $nb_scooter_total): self
    {
        $this->nb_scooter_total = $nb_scooter_total;

        return $this;
    }

    public function getNbScooterAvailable(): ?string
    {
        return $this->nb_scooter_available;
    }

    public function setNbScooterAvailable(string $nb_scooter_available): self
    {
        $this->nb_scooter_available = $nb_scooter_available;

        return $this;
    }
}
