<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\EchangeRepository;

/**
 * Echange
 *
 * @ORM\Table(name="echange", indexes={@ORM\Index(name="user", columns={"IdUtilisateur"})})
 * @ORM\Entity
 */
class Echange
{
    


}
