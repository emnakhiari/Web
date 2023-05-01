<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommandeRepository;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * 
     *
     * @ORM\Column(name="id_commande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommande;

    /**
     * 
     *
     * @ORM\Column(name="id_utilisateur", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idUtilisateur = NULL;

    /**
     * 
     *
     * @ORM\Column(name="id_produit", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idProduit = NULL;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date ;

    /**
     * 
     *
     * @ORM\Column(name="role", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: " le choix du role est obligatoire")]
    private $role = 'NULL';

    /**
     * 
     *
     * @ORM\Column(name="status", type="integer", nullable=true, options={"default"="NULL"})
     */
   
    private $status = NULL;

    /**
     * 
     *
     * @ORM\Column(name="id_livreur", type="integer", nullable=true, options={"default"="NULL"})
     */
    
    private $idLivreur = NULL;

    /**
     * 
     *
     * @ORM\Column(name="id_utilisateurA", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idUtilisateura = NULL;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_livraison", type="date", nullable=false)
     */
    #[Assert\NotBlank(message: " le choix de la date de livraison est obligatoire")]
    private $dateLivraison ;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_confirmation", type="date", nullable=false)
     */
    private $dateConfirmation ;

    public function getIdCommande(): ?int
    {
        return $this->idCommande;
    }

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?int $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    public function getIdProduit(): ?int
    {
        return $this->idProduit;
    }

    public function setIdProduit(?int $idProduit): self
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(?int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getIdLivreur(): ?int
    {
        return $this->idLivreur;
    }

    public function setIdLivreur(?int $idLivreur): self
    {
        $this->idLivreur = $idLivreur;

        return $this;
    }

    public function getIdUtilisateura(): ?int
    {
        return $this->idUtilisateura;
    }

    public function setIdUtilisateura(?int $idUtilisateura): self
    {
        $this->idUtilisateura = $idUtilisateura;

        return $this;
    }

    public function getDateLivraison(): ?\DateTimeInterface
    {
        return $this->dateLivraison;
    }

    public function setDateLivraison(?\DateTimeInterface $dateLivraison): self
    {
        $this->dateLivraison = $dateLivraison;

        return $this;
    }

    public function getDateConfirmation(): ?\DateTimeInterface
    {
        return $this->dateConfirmation;
    }

    public function setDateConfirmation(?\DateTimeInterface $dateConfirmation): self
    {
        $this->dateConfirmation = $dateConfirmation;

        return $this;
    }
}
