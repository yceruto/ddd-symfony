<?php

declare(strict_types=1);

namespace App\Catalog\Listing\Domain\Model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embeddable;
use Doctrine\ORM\Mapping\Id;
use InvalidArgumentException;
use Symfony\Component\Uid\Uuid;

#[Embeddable]
class ListingId
{
    public static function create(): self
    {
        return new self('li_'.Uuid::v4()->toBase58());
    }

    public static function fromString(string $id): self
    {
        return new self($id);
    }

    public function value(): string
    {
        return $this->id;
    }

    private function __construct(
        #[Id] #[Column] private readonly string $id,
    ) {
        if (!str_starts_with($id, 'li_')) {
            throw new InvalidArgumentException('Wrong ID value.');
        }

        // validate the UUID value after the prefix "li_"
        //Uuid::isValid()
    }
}
