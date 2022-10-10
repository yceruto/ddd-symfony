<?php

declare(strict_types=1);

namespace App\Legacy\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;

#[Entity]
class Listing
{
    #[Id]
    #[Column]
    public int $id;

    #[Column]
    public string $title;

    #[Column]
    public int $amount;

    #[Column]
    public string $currency;
}
