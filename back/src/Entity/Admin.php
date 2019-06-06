<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * @ORM\Entity(repositoryClass="App\Repository\AdminRepository")
 * @UniqueEntity(
 *     fields={"mail"},
 *          message="L'email que vous avez indiquez est déjà utilisée !"
 *      )
 */
class Admin implements UserInterface {
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $mail;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=8, minMessage = "Your first name must be at least {{ limit }} characters long")
     */
    private $password;
    /**
     * @Assert\EqualTo(propertyPath="password", message="Vous n'avez pas tapez le même mot de passe")
     */
    private $confirm_password;

    /**
     * @return mixed
     */
    public function getConfirmPassword()
    {
        return $this->confirm_password;
    }

    /**
     * @param mixed $confirm_password
     */
    public function setConfirmPassword($confirm_password): void
    {
        $this->confirm_password = $confirm_password;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getMail() {
        return $this->mail;
    }

    /**
     * @param string $mail
     * @return Admin
     */
    public function setMail(string $mail) {
        $this->mail = $mail;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserName() {
        return $this->userName;
    }

    /**
     * @param string $userName
     * @return Admin
     */
    public function setUserName(string $userName) {
        $this->userName = $userName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @param string $password
     * @return Admin
     */
    public function setPassword(string $password) {
        $this->password = $password;

        return $this;
    }

    public function eraseCredentials() {}

    public function getSalt(){}

    public function getRoles()
    {
        return ['ROLE_ADMIN'];
    }
}
