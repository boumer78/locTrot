<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Scooter
 *
 * @ORM\Table(name="scooter")
 * @ORM\Entity(repositoryClass="App\Repository\ScooterRepository")
 */

class Scooter
{
    /**
     * @var int
     *
     * @ORM\Column(name="idscooter", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idscooter;

    /**
     * @var string|null
     *
     * @ORM\Column(name="scooter_name", type="string", length=45, nullable=true)
     */
    private $scooterName;
    /**
     * @var string|null
     *
     * @ORM\Column(name="scooter_model", type="string", length=45, nullable=true)
     */
    private $scooter_model;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="scooter_date_entry", type="date", nullable=true)
     */
    private $scooterDateEntry;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="scooter_date_next_maintenance", type="date", nullable=true)
     */
    private $scooterDateNextMaintenance;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="scooter_date_last_maintenance", type="date", nullable=true)
     */
    private $scooterDateLastMaintenance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="scooter_statement", type="string", length=45, nullable=true)
     */
    private $scooterStatement;

    public function getIdscooter(): ?int
    {
        return $this->idscooter;
    }

    public function getScooterName(): ?string
    {
        return $this->scooterName;
    }

    public function setScooterName(?string $scooterName): self
    {
        $this->scooterName = $scooterName;

        return $this;
    }

    public function getScooterDateEntry(): ?\DateTimeInterface
    {
        return $this->scooterDateEntry;
    }

    public function setScooterDateEntry(?\DateTimeInterface $scooterDateEntry): self
    {
        $this->scooterDateEntry = $scooterDateEntry;

        return $this;
    }

    public function getScooterDateNextMaintenance(): ?\DateTimeInterface
    {
        return $this->scooterDateNextMaintenance;
    }

    public function setScooterDateNextMaintenance(?\DateTimeInterface $scooterDateNextMaintenance): self
    {
        $this->scooterDateNextMaintenance = $scooterDateNextMaintenance;

        return $this;
    }

    public function getScooterDateLastMaintenance(): ?\DateTimeInterface
    {
        return $this->scooterDateLastMaintenance;
    }

    public function setScooterDateLastMaintenance(?\DateTimeInterface $scooterDateLastMaintenance): self
    {
        $this->scooterDateLastMaintenance = $scooterDateLastMaintenance;

        return $this;
    }

    public function getScooterStatement(): ?string
    {
        return $this->scooterStatement;
    }

    public function setScooterStatement(?string $scooterStatement): self
    {
        $this->scooterStatement = $scooterStatement;

        return $this;
    }


    /**
     * Scooter constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->scooterDateEntry = new \DateTime();
    }

    /**
     * @param int $idscooter
     */
    public function setIdscooter(int $idscooter): void
    {
        $this->idscooter = $idscooter;
    }

    /**
     * @return string|null
     */
    public function getScooterModel(): ?string
    {
        return $this->scooter_model;
    }

    /**
     * @param string|null $scooter_model
     */
    public function setScooterModel(?string $scooter_model): void
    {
        $this->scooter_model = $scooter_model;
    }


}
