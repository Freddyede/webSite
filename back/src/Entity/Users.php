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
class Users {
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
     * @ORM\OneToMany(targetEntity="App\Entity\Messages", mappedBy="users")
     */
    private $message;

    public function __construct()
    {
        $this->message = new ArrayCollection();
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

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $newPassword = hash('ripemd160',$password);
        $this->password = $newPassword;

        return $this;
    }

    /**
     * @return Collection|Messages[]
     */
    public function getMessage(): Collection
    {
        return $this->message;
    }

    public function addMessage(Messages $message): self
    {
        if (!$this->message->contains($message)) {
            $this->message[] = $message;
            $message->setUsers($this);
        }

        return $this;
    }

    public function removeMessage(Messages $message): self
    {
        if ($this->message->contains($message)) {
            $this->message->removeElement($message);
            // set the owning side to null (unless already changed)
            if ($message->getUsers() === $this) {
                $message->setUsers(null);
            }
        }

        return $this;
    }
}
