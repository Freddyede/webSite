<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PagesRepository")
 */
class Pages
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $images;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $hyperLink;

    /**
     * @ORM\Column(type="text")
     */
    private $hyperLinkContent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImages(): ?string
    {
        return $this->images;
    }

    public function setImages(?string $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getHyperLink(): ?string
    {
        return $this->hyperLink;
    }

    public function setHyperLink(?string $hyperLink): self
    {
        $this->hyperLink = $hyperLink;

        return $this;
    }

    public function getHyperLinkContent(): ?string
    {
        return $this->hyperLinkContent;
    }

    public function setHyperLinkContent(string $hyperLinkContent): self
    {
        $this->hyperLinkContent = $hyperLinkContent;

        return $this;
    }
}
