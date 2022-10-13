<?php

declare(strict_types=1);

namespace App\Catalog\Listing\Application\Search;

use App\Catalog\Listing\Domain\Model\Listing;
use App\Shared\Domain\Money\Money;

class SearchListingResponse
{
    /**
     * @param array<Listing> $listings
     *
     * @return array<SearchListingResponse>
     */
    public static function fromCollection(array $listings): array
    {
        return array_map([self::class, 'fromListing'], $listings);
    }

    public static function fromListing(Listing $listing): self
    {
        return new self(
            $listing->id()->value(),
            $listing->title(),
            $listing->price(),
        );
    }

    private function __construct(
        public readonly string $id,
        public readonly string $title,
        public readonly Money $price,
    ) {

    }
}
