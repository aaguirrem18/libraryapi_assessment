<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 */
class Book implements \JsonSerializable
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $autor;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $anno;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\categories", inversedBy="categorie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    public function __construct()
    {

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAutor(): ?string
    {
        return $this->autor;
    }

    public function setAutor(?string $autor): self
    {
        $this->autor = $autor;

        return $this;
    }

    public function getAnno(): ?int
    {
        return $this->anno;
    }

    public function setAnno(?int $anno): self
    {
        $this->anno = $anno;

        return $this;
    }

    public function getCategorie(): ?categories
    {
        return $this->categorie;
    }

    public function setCategorie(?categories $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }


    //
    // METHODS GENERATED WITHOUT SWAGGER
    // OPTION 2
    
    public function jsonSerialize(): array
    {
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'description'  => $this->description,
            'author'  => $this->autor,
            'anno'    => $this->anno,
            'categorie' => $this->getCategorie()->getName(),
        ];
    }


}
