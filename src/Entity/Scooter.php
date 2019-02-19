<?php

namespace App\Entity;

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

    /**
     * Scooter constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->scooterDateEntry = new \DateTime();
    }

    /**
     * @return int
     */
    public function getIdscooter(): int
    {
        return $this->idscooter;
    }

    /**
     * @return string|null
     */
    public function getScooterName(): ?string
    {
        return $this->scooterName;
    }

    /**
     * @param string|null $scooterName
     */
    public function setScooterName(?string $scooterName): void
    {
        $this->scooterName = $scooterName;
    }

    /**
     * @return \DateTime|null
     */
    public function getScooterDateEntry(): ?\DateTime
    {
        return $this->scooterDateEntry;
    }

    /**
     * @param \DateTime|null $scooterDateEntry
     */
    public function setScooterDateEntry(?\DateTime $scooterDateEntry): void
    {
        $this->scooterDateEntry = $scooterDateEntry;
    }

    /**
     * @return \DateTime|null
     */
    public function getScooterDateNextMaintenance(): ?\DateTime
    {
        return $this->scooterDateNextMaintenance;
    }

    /**
     * @param \DateTime|null $scooterDateNextMaintenance
     */
    public function setScooterDateNextMaintenance(?\DateTime $scooterDateNextMaintenance): void
    {
        $this->scooterDateNextMaintenance = $scooterDateNextMaintenance;
    }

    /**
     * @return \DateTime|null
     */
    public function getScooterDateLastMaintenance(): ?\DateTime
    {
        return $this->scooterDateLastMaintenance;
    }

    /**
     * @param \DateTime|null $scooterDateLastMaintenance
     */
    public function setScooterDateLastMaintenance(?\DateTime $scooterDateLastMaintenance): void
    {
        $this->scooterDateLastMaintenance = $scooterDateLastMaintenance;
    }

    /**
     * @return string|null
     */
    public function getScooterStatement(): ?string
    {
        return $this->scooterStatement;
    }

    /**
     * @param string|null $scooterStatement
     */
    public function setScooterStatement(?string $scooterStatement): void
    {
        $this->scooterStatement = $scooterStatement;
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
