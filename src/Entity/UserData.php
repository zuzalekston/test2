<?php

namespace App\Entity;

use App\Repository\UserDataRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserDataRepository::class)
 */
class UserData
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $login;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="userData", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * Getter for id.
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Getter for firstname.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Setter for firstname.
     *
     * @return $this
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Getter for lastname.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Setter for lastname.
     *
     * @return $this
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Getter for login.
     */
    public function getLogin(): ?string
    {
        return $this->login;
    }

    /**
     * Setter for login.
     *
     * @return $this
     */
    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
