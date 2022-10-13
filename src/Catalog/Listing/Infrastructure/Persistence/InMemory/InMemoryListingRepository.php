<?php

declare(strict_types=1);

namespace App\Catalog\Listing\Infrastructure\Persistence\InMemory;

use App\Catalog\Listing\Domain\Model\Listing;
use App\Catalog\Listing\Domain\Model\ListingRepository;

class InMemoryListingRepository implements ListingRepository
{
    /**
     * @var array<Listing>
     */
    private array $collection = [];

    public function add(Listing $listing): void
    {
        $this->collection[] = $listing;
    }

    public function all(): iterable
    {
        return $this->collection;
    }
}
