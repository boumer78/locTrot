<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clients
 *
 * @ORM\Table(name="clients")
 * @ORM\Entity
 */
class Clients
{
    /**
     * @var int
     *
     * @ORM\Column(name="idclients", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idclients;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lastname", type="string", length=45, nullable=true)
     */
    private $lastname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="firstname", type="string", length=45, nullable=true)
     */
    private $firstname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mail", type="string", length=45, nullable=true)
     */
    private $mail;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="register_date", type="date", nullable=true)
     */
    private $registerDate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="current_offre", type="integer", nullable=true)
     */
    private $currentOffre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;


}
