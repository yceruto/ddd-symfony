<?php

declare(strict_types=1);

namespace App\Catalog\Listing\Application\Search;

class SearchListingQuery
{
    public function __construct(
        public readonly array $filter = [],
    ) {
    }
}
