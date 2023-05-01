<?php

namespace App\Entity;

use App\Repository\SavedRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SavedRepository::class)]
class Saved
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: "veuillez ajouter l'image de l'article")]

    private ?string $image = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: "veuillez ajouter une desription de l'article")]
    #[Assert\Length(min:2,minMessage:"Votre champ ne contient pas {{
        limit }} caractères.")]
    #[Assert\Length(max:10,maxMessage:"Votre champ ne contient pas {{
        limit }} caractères.")]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "veuillez ajouter une desription de l'article")]
    #[Assert\Length(min:2,minMessage:"Votre champ ne contient pas {{
        limit }} caractères.")]
    #[Assert\Length(max:10,maxMessage:"Votre champ ne contient pas {{
        limit }} caractères.")]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "veuillez ajouter une desription de l'article")]
    #[Assert\Length(min:2,minMessage:"Votre champ ne contient pas {{
        limit }} caractères.")]
    #[Assert\Length(max:10,maxMessage:"Votre champ ne contient pas {{
        limit }} caractères.")]
    private ?string $categorie = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "veuillez ajouter le prix de l'article")]
    #[Assert\Length(min:2,minMessage:"Votre champ ne contient pas {{
        limit }} caractères.")]
    #[Assert\Length(max:10,maxMessage:"Votre champ ne contient pas {{
        limit }} caractères.")]
    #[Assert\Positive]

    private ?int $prix = null;

 
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }
 
    
   
}
