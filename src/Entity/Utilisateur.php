<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UtilisateurRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[UniqueEntity('adresseemail',message:"l'email que vous avez indiqué est deja utilisé" )]
class Utilisateur  implements UserInterface , PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idUtilisateur;

    #[Assert\NotBlank(message:" le saisie du nom est obligatoire")]
    #[ORM\Column(length: 30)]
    private $nom;
    
    #[Assert\NotBlank(message:"le saisie du Prenom est obligatoire")]
    #[ORM\Column(length: 30)]
    private $prenom;

    #[Assert\NotBlank(message:"le saisie de  Numero est obligatoire")]
    #[ORM\Column(length: 50)]
    private $numero;

    #[Assert\NotBlank(message:" le saisie de l'Adresse est obligatoire")]
    #[ORM\Column(length: 500)]
    private $adresse;
   
    #[Assert\NotBlank(message:"le saisie de  mot de passe est obligatoire")]
    #[Assert\Length( min:8, minMessage:"votre mot de passe doit avoir minumum 8 caractere")]
    #[Assert\EqualTo(propertyPath:"password")]
    #[ORM\Column(length: 8)]
     /**
     * @var string The hashed password
     */
    private $motdepasse;

    #[Assert\NotBlank(message:"le saisie de  l'adresse mail est obligatoire")]
    #[Assert\Email(message:" l'adresse mail n'est pas valide ")]
    #[ORM\Column(length: 500)]
    private $adresseemail;
    
    #[ORM\Column(length: 65535)]
    private $image;

    #[ORM\Column(length: 20)]
    private $type;

    #[ORM\Column(type : "float" , nullable : true)]
    private $nombreproduitachetes;

    #[ORM\Column(type : "float" , nullable : true)]
    private $nombreproduitpublier;

    #[ORM\Column(type : "float" , nullable : true)]
    private $nombreproduitvendus;

    #[ORM\Column(length: 20)]
    private $avis;
    
    #[ORM\Column(type : "json")]
    private $roles= [];

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

   

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    
    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getMotdepasse(): ?string
    {
        return $this->motdepasse;
    }

    public function setMotdepasse(string $motdepasse): self
    {
        $this->motdepasse = $motdepasse;

        return $this;
    }

    public function getAdresseemail(): ?string
    {
        return $this->adresseemail;
    }

    public function setAdresseemail(string $adresseemail): self
    {
        $this->adresseemail = $adresseemail;

        return $this;
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNombreproduitachetes(): ?int
    {
        return $this->nombreproduitachetes;
    }

    public function setNombreproduitachetes(?int $nombreproduitachetes): self
    {
        $this->nombreproduitachetes = $nombreproduitachetes;

        return $this;
    }

    public function getNombreproduitpublier(): ?int
    {
        return $this->nombreproduitpublier;
    }

    public function setNombreproduitpublier(?int $nombreproduitpublier): self
    {
        $this->nombreproduitpublier = $nombreproduitpublier;

        return $this;
    }

    public function getNombreproduitvendus(): ?int
    {
        return $this->nombreproduitvendus;
    }

    public function setNombreproduitvendus(?int $nombreproduitvendus): self
    {
        $this->nombreproduitvendus = $nombreproduitvendus;

        return $this;
    }

    public function getAvis(): ?int
    {
        return $this->avis;
    }

    public function setAvis(?int $avis): self
    {
        $this->avis = $avis;

        return $this;
    }

  

      /**
         * @see UserInterface
         */
        public function getPassword(): string
        {
                return (string) $this->motdepasse;
        }

        /**
         * @see UserInterface
         */
        public function getSalt()
        {
                // not needed when using the "bcrypt" algorithm in security.yaml
        }

        /**
         * @see UserInterface
         */
        public function eraseCredentials()
        {
                // If you store any temporary, sensitive data on the user, clear it here
                // $this->plainPassword = null;
        }

         

        /**
         * A visual identifier that represents this user.
         *
         * @see UserInterface
         */
        public function getUsername(): string
        {
                return (string) $this->nom;
        }
   
        public function getUserIdentifier(): string
        {
            return (string) $this->adresseemail;
        }
       /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
}
