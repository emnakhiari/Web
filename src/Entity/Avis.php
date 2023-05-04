<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AvisRepository;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private $idAvis;

    #[ORM\Column(length: 20)]
    private $etoile;

    #[ORM\Column(length: 20)]
    private $raison;

    public function getIdAvis(): ?int
    {
        return $this->idAvis;
    }

    public function getEtoile(): ?string
    {
        return $this->etoile;
    }

    public function setEtoile(string $etoile): self
    {
        $this->etoile = $etoile;

        return $this;
    }

    public function getRaison(): ?string
    {
        return $this->raison;
    }

    public function setRaison(string $raison): self
    {
        $this->raison = $raison;

        return $this;
    }


}
