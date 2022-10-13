<?php

declare(strict_types=1);

namespace App\Catalog\Listing\Application\Create;

use App\Catalog\Listing\Domain\Model\Listing;
use App\Catalog\Listing\Domain\Model\ListingId;
use App\Catalog\Listing\Domain\Model\ListingRepository;
use App\Shared\Domain\Money\Money;

class ListingCreator
{
    public function __construct(
        private readonly ListingRepository $repository,
    ) {
    }

    public function create(ListingId $id, string $title, Money $price): void
    {
        $listing = Listing::create($id, $title, $price);

        $this->repository->add($listing);

        // pull and dispatch domain events...
    }
}
