<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table(name="order")
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 */
class Order
{
    /**
     * @var int
     *
     * @ORM\Column(name="idorder", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idorder;

    /**
     * @var int|null
     *
     * @ORM\Column(name="idclient", type="integer", nullable=true)
     */
    private $idclient;

    /**
     * @var string|null
     *
     * @ORM\Column(name="offre", type="string", length=45, nullable=true)
     */
    private $offre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="options", type="string", length=45, nullable=true)
     */
    private $options;

    /**
     * @var int|null
     *
     * @ORM\Column(name="price", type="integer", nullable=true)
     */
    private $price;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_order", type="date", nullable=true)
     */
    private $dateOrder;

    /**
     * @var int|null
     *
     * @ORM\Column(name="idscooter", type="integer", nullable=true)
     */
    private $idscooter;

    public function getIdorder(): ?int
    {
        return $this->idorder;
    }

    public function getIdclient(): ?int
    {
        return $this->idclient;
    }

    public function setIdclient(?int $idclient): self
    {
        $this->idclient = $idclient;

        return $this;
    }

    public function getOffre(): ?string
    {
        return $this->offre;
    }

    public function setOffre(?string $offre): self
    {
        $this->offre = $offre;

        return $this;
    }

    public function getOptions(): ?string
    {
        return $this->options;
    }

    public function setOptions(?string $options): self
    {
        $this->options = $options;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDateOrder(): ?\DateTimeInterface
    {
        return $this->dateOrder;
    }

    public function setDateOrder(?\DateTimeInterface $dateOrder): self
    {
        $this->dateOrder = $dateOrder;

        return $this;
    }

    public function getIdscooter(): ?int
    {
        return $this->idscooter;
    }

    public function setIdscooter(?int $idscooter): self
    {
        $this->idscooter = $idscooter;

        return $this;
    }


}
