<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Clients
 * @ORM\Table(name="clients")
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
*/
class Clients implements UserInterface
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
    /**
     * @ORM\Column(type="array")
     */

    private $roles = [];
    /**
     * A non-persisted field that's used to create the encoded password.
     *
     * @var string
     */
    private $plainPassword;
    /**
     *
     * @throws \Exception
     */


    public function construct()
    {
        $this->registerDate = new \DateTime();
    }
    public function getIdclients(): int

    {
        return $this->idclients;
    }
    /**
     * @param int $idclients
     */
    public function setIdclients(int $idclients): void
    {
        $this->idclients = $idclients;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     * @return Clients
     */
    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCurrentOffre(): ?int
    {
        return $this->currentOffre;
    }

    /**
     * @param int|null $currentOffre
     */
    public function setCurrentOffre(?int $currentOffre): void
    {
        $this->currentOffre = $currentOffre;
    }

    /**
     * @return \DateTime|null
     */
    public function getRegisterDate(): ?\DateTimeInterface
    {
        return $this->registerDate;
    }

    /**
     * @param \DateTimeInterface|null $registerDate
     */
    public function setRegisterDate(?\DateTimeInterface $registerDate): void
    {
        $this->registerDate = $registerDate;
    }

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * @param string|null $mail
     */
    public function setMail(?string $mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getRoles(): ?array
    {
        return $this->roles;
    }

    /**
     * @param mixed $roles
     * @return Clients
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->mail;
    }

    public function eraseCredentials()
    {
    }

    /**
     * @return string
     */
    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     */
    public function setPlainPassword(string $plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }


}
