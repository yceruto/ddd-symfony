<?php

declare(strict_types=1);

namespace App\Legacy\Entity;

use App\Shared\Domain\Money\Money;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embedded;
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

    #[Embedded]
    public Money $price;
}
