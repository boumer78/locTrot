<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table(name="order")
 * @ORM\Entity
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


}
