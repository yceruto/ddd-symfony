<?php

declare(strict_types=1);

namespace App\Catalog\Listing\Application\Search;

use App\Catalog\Listing\Domain\Model\Listing;
use App\Catalog\Listing\Domain\Model\ListingRepository;

class ListingSearcher
{
    public function __construct(
        private readonly ListingRepository $repository,
    ) {
    }

    /**
     * @return iterable<Listing>
     */
    public function search(array $filter): iterable
    {
        return $this->repository->all();
    }
}