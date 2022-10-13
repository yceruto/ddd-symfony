<?php

declare(strict_types=1);

namespace App\Catalog\Listing\Application\Search;

use App\Shared\Domain\Bus\MessageHandler;

class SearchListingQueryHandler implements MessageHandler
{
    public function __construct(
        private readonly ListingSearcher $searcher,
    ) {
    }

    public function __invoke(SearchListingQuery $query): array
    {
        $listings = $this->searcher->search($query->filter);

        return SearchListingResponse::fromCollection($listings);
    }
}
