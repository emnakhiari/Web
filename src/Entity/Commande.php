<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommandeRepository;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private $idCommande;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_utilisateur", type="integer", nullable=true)
     */
    private $idUtilisateur;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_produit", type="integer", nullable=true)
     */
    private $idProduit;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    #[ORM\Column(length: 50)]
    private $role;

    /**
     * @var int|null
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_livreur", type="integer", nullable=true)
     */
    private $idLivreur;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_utilisateurA", type="integer", nullable=true)
     */
    private $idUtilisateura;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_livraison", type="date", nullable=true)
     */
    private $dateLivraison;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_confirmation", type="date", nullable=true)
     */
    private $dateConfirmation;

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
