<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity('email',message:"l'email que vous avez indiqué est deja utilisé" )]
class User implements UserInterface , PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('user')]
    private ?int $id = null;


    #[Assert\NotBlank(message:" le saisie du email est obligatoire")]
    #[Assert\Email(message:" l'adresse mail n'est pas valide ")]
    #[ORM\Column(length: 255)]
    #[Groups('user')]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Groups('user')]

    #[Assert\NotBlank(message:" le saisie du nom est obligatoire")]
    private ?string $username = null;

    #[Assert\NotBlank(message:" le saisie du password est obligatoire")]
    #[Assert\Length( min:8, minMessage:"votre mot de passe doit avoir minumum 8 caractere")]
    #[Assert\EqualTo(propertyPath:"password")]
    #[ORM\Column(length: 255)]
   #[Groups('user')]
    private ?string $password = null;

     /**
     * @ORM\Column(type="boolean")
     */
    private $enabled = true;

    public function getEnabled()
    {
        return $this->enabled;
    }

    public function setEnabled($enabled)
    {
        $this->$enabled= $enabled;

        return $this;
    }


     /**
      *  @Assert\EqualTo(propertyPath = "password", message="Vous n'avez pas passé le même mot de passe !" )
     */
    private $confirm_password;

    public function getConfirmPassword()
    {
        return $this->confirm_password;
    }

    public function setConfirmPassword($confirm_password)
    {
        $this->confirm_password = $confirm_password;

        return $this;
    }
    #[ORM\Column(type: 'json')]
    #[Groups('user')]
    private $roles = [];

    #[ORM\Column(length: 65535)]
    #[Groups('user')]
    private $image;

    #[ORM\Column(length: 20 , nullable : true)]
    #[Groups('user')]
    private $type;

    #[ORM\Column(type : "float" , nullable : true)]
    #[Groups('user')]
    private $nombreproduitachetes;

    #[ORM\Column(type : "float" , nullable : true)]
    #[Groups('user')]
    private $nombreproduitpublier;

    #[ORM\Column(type : "float" , nullable : true)]
    #[Groups('user')]
    private $nombreproduitvendus;

    #[ORM\Column(type : "string" , length:100)]
    #[Groups('user')]
    private $resetToken;

    #[ORM\Column(length: 20 , nullable : true)]
    private $avis;

    #[Assert\NotBlank(message:" le saisie de l'Adresse est obligatoire")]
    #[ORM\Column(length: 500)]
    #[Groups('user')]
    private $adresse;

    #[Assert\NotBlank(message:"le saisie de  Numero est obligatoire")]
    #[ORM\Column(length: 50)]
    #[Groups('user')]
    private $numero;

    public function serialize(): array
    {
        return [
            'id' => $this->getId(),
            'username' => $this->getUsername(),
            'email' =>$this->getEmail(),
            'password'=>$this->getPassword(),
            'confirmerPassword'=>$this->getConfirmPassword(),
            'numero'=>$this->getNumero(),
            'adresse'=>$this->getAdresse(),
            'roles'=>$this->getRoles(),
            'image'=>$this->getImage(),
            'type'=>$this->getType(),
            'nombreproduitachetes'=>$this->getNombreproduitachetes(),
            'nombreproduitpublier'=>$this->getNombreproduitpublier(),
            'nombreproduitvendus'=>$this->getNombreproduitvendus(),
            'avis'=>$this->getAvis(),
            'restToken'=>$this->getResetToken()


            //'date' => $this->getDate(),
            // add additional properties here
        ];
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



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

  
   /**
     * The public representation of the user (e.g. a username, an email address, etc.)
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
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

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


    public function getResetToken(): string
    {
        return $this->resetToken;
    }

    public function setResetToken(string $resetToken): self
    {
        $this->resetToken= $resetToken;

        return $this;
    }

    /**
     * Returning a salt is only needed if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

}
