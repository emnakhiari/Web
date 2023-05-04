<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\FactureRepository;

/**
 * Facture
 *
 * @ORM\Table(name="facture", indexes={@ORM\Index(name="addtype", columns={"id_type_facture"}), @ORM\Index(name="d", columns={"id_produit"})})
 * @ORM\Entity
 */
class Facture
{
}
