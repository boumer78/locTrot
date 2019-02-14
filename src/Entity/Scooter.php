<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Scooter
 *
 * @ORM\Table(name="scooter")
 * @ORM\Entity
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


}
