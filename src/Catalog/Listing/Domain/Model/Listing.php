<?php

declare(strict_types=1);

namespace App\Catalog\Listing\Domain\Model;

use App\Shared\Domain\Money\Money;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embedded;
use Doctrine\ORM\Mapping\Entity;

#[Entity]
class Listing
{
    #[Embedded(columnPrefix: false)]
    protected readonly ListingId $id;

    #[Column]
    protected string $title;

    #[Embedded]
    protected Money $price;

    public static function create(ListingId $id, string $title, Money $price): self
    {
        $self = new self();
        $self->id = $id;
        $self->setTitle($title);
        $self->setPrice($price);

        // dispatch DomainEvent about creation ...

        return $self;
    }

    public function id(): ListingId
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function changeTitle(string $title): void
    {
        $this->setTitle($title);

        // dispatch DomainEvent about change ...
    }

    public function price(): Money
    {
        return $this->price;
    }

    public function changePrice(Money $price): void
    {
        $this->setPrice($price);

        // dispatch DomainEvent about change ...
    }

    private function setTitle(string $title): void
    {
        // invariance validation ...

        $this->title = $title;
    }

    private function setPrice(Money $price): void
    {
        // invariance validation ...

        $this->price = $price;
    }

    private function __construct()
    {
    }
}
