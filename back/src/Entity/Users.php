<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="text")
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Mesage", mappedBy="User_id")
     */
    private $mesages;

    public function __construct()
    {
        $this->mesages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection|Mesage[]
     */
    public function getMesages(): Collection
    {
        return $this->mesages;
    }

    public function addMesage(Mesage $mesage): self
    {
        if (!$this->mesages->contains($mesage)) {
            $this->mesages[] = $mesage;
            $mesage->setUserId($this);
        }

        return $this;
    }

    public function removeMesage(Mesage $mesage): self
    {
        if ($this->mesages->contains($mesage)) {
            $this->mesages->removeElement($mesage);
            // set the owning side to null (unless already changed)
            if ($mesage->getUserId() === $this) {
                $mesage->setUserId(null);
            }
        }

        return $this;
    }
}
